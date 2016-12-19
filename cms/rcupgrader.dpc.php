<?php
$__DPCSEC['RCUPGRADER_DPC']='1;1;1;1;1;1;2;2;9;9;9';

if ( (!defined("RCUPGRADER_DPC")) && (seclevel('RCUPGRADER_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCUPGRADER_DPC",true);

$__DPC['RCUPGRADER_DPC'] = 'rcupgrader';

$__EVENTS['RCUPGRADER_DPC'][0]='cpupgrader';
$__EVENTS['RCUPGRADER_DPC'][1]='cpmupgrader';

$__ACTIONS['RCUPGRADER_DPC'][0]='cpupgrader';
$__ACTIONS['RCUPGRADER_DPC'][1]='cpmupgrader';

class rcupgrader {
	
	var $urlpath, $url, $prpath;	
    var $upgrade_root_path;
	var $upgdirs;	
	
	public function __construct() {
		
		$this->prpath = paramload('SHELL','prpath'); 
		$this->urlpath = paramload('SHELL','urlpath'); 
		$this->url = paramload('SHELL','urlbase'); 	
		
		$this->upgrade_root_path = getcwd() . '/upg';	
		
		$u = explode('/', $this->urlpath);
		$this->app = array_pop($u);
		
		$this->upgdirs = null;	
	}
	
	public function event($event=null) {
	
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;
	
	    switch ($event) {
			
		  case 'cpmupgrader': 	break;			
		
          case 'cpupgrader' : 
		  default           : 	
		                     
        }			
    }
	
	public function action($action=null) {		
		
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;
	
	    switch ($action) {	
		
		  case 'cpmupgrader':   break;		
							 	
          case 'cpupgrader' :
          default          	: 	$out = $this->runscan();
								
        }
		
        return ($out);

    }	
			
	public function fetchfile($version=null, $file=null) {
		if (!$file) return false;
		
		$f = $this->upgrade_root_path . $file;
		$fdata = @file_get_contents($f);
		
		return json_encode(array(0=>base64_encode($fdata)));
	}	
	
	public function runscan($version=null, $appname=null, $repout=false) {
		
		$upaths = $this->updatePath($version, $appname);
		if (empty($upaths)) return false;		
		
		foreach ($upaths as $dr=>$path) {
			$report .= $this->scan($path, null, $repout, $dr);
		}

		return ($report);
	}	
	
	protected function updatePath($version=null, $appname=null) {
		$path = $this->upgrade_root_path;		

		if ($appname) {
			$apppath = $path . '/' . $appname . '-ext/';
			if (is_dir($apppath)) {
				$ret['upg'] = $path . '/' . $appname . '-ext/';
				return ($ret);
			}	
		}	
		
		$ret['upg'] = $path .'/';	
		return ($ret);		
	}	
	
	protected function scan($path=null, $skipdir=null, $repout=false, $dirname=false) {
		$error = 0;
	
		if (!is_dir($path)) 
			return (nl2br("Invalid path ($dirname)\r\n"));
		
		$scan_path_length = strlen($path);

	    ini_set('max_execution_time', 600);
	    ini_set('memory_limit','1024M');		
		
		$ext_array = array();
		$ext_array = array_map('strtolower',$ext_array);
		$excl_array = array();//'ftpquota','txt','swf','fla','ini'); //<< ini
		$excl_array = array_map('strtolower',$excl_array);
		$extensionless = false;
		$skip = is_array($skipdir) ? $skipdir : array();	

		//	Clear and title the report variable before starting
		$report = "Scan File Check for $acct ($dirname)\r\n";	
		$current = array();
		$added = array();

		$count_baseline = 0;
		$start = microtime(true);

		//	SCAN		
		
		$dir = new RecursiveDirectoryIterator($path);
		$iter = new RecursiveIteratorIterator($dir);
		while ($iter->valid())
		{
			// 	Not in Dot AND not in $skip (prohibited) directories
			if (!$iter->isDot() && !(in_array($iter->getSubPath(), $skip)))
			{
				//	Get or set file extension ('' vs null)
				if (is_null(pathinfo($iter->key(), PATHINFO_EXTENSION)))
					$ext = '';
				else 
					$ext = strtolower(pathinfo($iter->key(), PATHINFO_EXTENSION));

				if (
					(in_array($ext, $ext_array, true)) ||	
					// in allowed extension array
					(empty($ext_array) && !in_array($ext, $excl_array, true)) ||	
					// OR NOT in excluded extension array
					(empty($ext) && $extensionless) )	
					// OR extensionless AND extensionless is allowed
				{
					$file_path = $iter->key();
					//	Ensure $file_path without \'s
					$file_path = str_replace(chr(92),chr(47),$file_path);
			
					//	Handle addition to $current array
					$current[$file_path] = array('file_hash' => hash_file("sha1", $file_path), 'file_last_mod' => date("Y-m-d H:i:s", filemtime($file_path)));

					//	IF file_path is newer file was ADDED
					if (is_readable($file_path)) {
						
						$updateFile = str_replace($this->upgrade_root_path, '', $file_path);
						$_updFile = $this->replace_pseudo_dir($updateFile);
						
					    //update list
						$added[] = array('file_hash' => $current[$file_path]['file_hash'], 'file_last_mod' => $current[$file_path]['file_last_mod'], 'update' => $_updFile);
					}
					else
						$error+=1;
				}	
			}	// End of handling $current record entry
			$iter->next();
		}//while
		
		

		//	PREPARE Report 
	
		//	Get scan duration
		$elapsed = round(microtime(true) - $start, 5);
	
		//	Add count summary to report
		$count_current = count($current);
		$report .= "$count_current files collected in scan.\r\n";
		if (0 == $count_current) {
			$report .= "\r\nThere are NO files in the specified location.\r\n";
		}
        else { 
			$count_added = count($added);
			$report .= "$count_added files ADDED to baseline.\r\n";
        }

		if ($count_added) {

			$report .= "\r\nSummary:
Current Baseline: $count_current
Added: $count_added
Errors: $error
Scan executed in $elapsed seconds.\r\n";
		}

		if ($repout) 
			return(nl2br($report));
		
		return ($error>0) ? json_encode(array(0=>"There is $error error(s) in upgrade list.")) : 
							json_encode($added);	
	}	
	
	//pseudo-dir replacement
	protected function replace_pseudo_dir($d) {
			
		if (strstr($d,'/home'))
			return str_replace('/home', '', $d);
		elseif (strstr($d,'/homefiles'))
			return str_replace('/homefiles', '', $d);		
		elseif (strstr($d,'/cpfiles'))
			return str_replace('/cpfiles', '', $d);
			
		return $d;
	}

	protected function serverRequest($file=null) {
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL,"http://www.xix.gr/upg.php");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, array('app'=>$this->app, 
												   'file'=>$file,
												   'tmpl'=>null,	
												  ));

		// receive server response ...
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$response = curl_exec ($ch);

		curl_close ($ch);

		$rdec = $response ? json_decode($response) : null;
		return (!empty($rdec)) ? $rdec : false;	
	}	

};
}
?>