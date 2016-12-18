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
	
	var $urlpath, $url, $prpath, $isrootapp;	
    var $upgrade_root_path, $update_root_path;
	var $upgdirs;	
	
	public function __construct() {
		
		$this->prpath = paramload('SHELL','prpath'); 
		$this->urlpath = paramload('SHELL','urlpath'); 
		$this->url = paramload('SHELL','urlbase'); 	
		
		$murl = arrayload('SHELL','ip');
        $this->url = $murl[0];
		
		$this->isrootapp = remote_paramload('RCCONTROLPANEL', 'isrootapp', $this->prpath) ? true : false;
		$this->templatePath = remote_paramload('FRONTHTMLPAGE', 'path', $this->prpath);		
		
		$upgpath = '/upg'; //$this->isrootapp ? 'upgrade-app/' : '../../cp/upgrade-app/';
		$this->upgrade_root_path = getcwd() . $upgpath;	
		
		$updpath = $this->isrootapp ? 'update-app/' : '../../cp/update-app/';
		$this->update_root_path = $this->prpath . $updpath;
		
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
		
		return json_encode(array(0=>'yes'));
	}	
	
	public function runscan($version=null, $repout=false) {
		
		$upaths = $this->updatePath($version);
		if (empty($upaths)) return false;		
		
		foreach ($upaths as $dr=>$path) {
			$report .= $this->scan($path, null, $repout, $dr);
			//$report .= '<hr/>';
		}
		//$report .= "<button onClick='start(\"{$this->app}\")' class='btn btn-danger'>Start</button><br/>" ;		
		
		return ($report);
	}	
	
	protected function updatePath($version=null) {

		$path = $this->upgrade_root_path;
		$ret['upg'] = $path .'/';	

		return ($ret);
		
		//////////////////////////////
		
		if (is_dir($path . $this->app . '-ext')) { //if app dir exclusive (=appname + '-ext') see dir for updates
			$ret = array(0=>$path . $this->app . '-ext',	
						 1=>$this->prpath . 'replication',
						);
		}
		else {
			$upgdirs = is_file($path . 'dir.upg') ? file($path . 'dir.upg') : array();
			foreach ($upgdirs as $dirline) {
				if ($l = trim($dirline))
					$ret[] = $path . $l;
			}
		}					
		return ($ret);			
	}	
	
	protected function scan($path=null, $skipdir=null, $reportout=false, $dirname=false) {
	
		$repout = $reportout ? $reportout : (GetReq('report') ? true : false);
	
		//$_p = explode('/',$path);
        //$saypath = array_pop($_p);

		//$dpath = GetReq('upgpath') ? base64_decode(GetReq('upgpath')) :  false;	
		//$exec = (($dpath==$path) || ($ajaxid)) ? true : false;	

		//save step file for ajax or reset
		//$aj = ($ajaxid>0) ? @file_put_contents($this->prpath . $this->app . '.app', strval($ajaxid), LOCK_EX) : @unlink($this->prpath . $this->app . '.app');		
		
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
					$updateFile = str_replace($this->upgrade_root_path, '', $file_path);
					$_updFile = $this->replace_pseudo_dir($updateFile);
					//if ((is_readable($_updFile)) && (filemtime($_updFile) < filemtime($file_path))) {	
					    //update
						$added[] = array('file_hash' => $current[$file_path]['file_hash'], 'file_last_mod' => $current[$file_path]['file_last_mod'], 'update' => $_updFile);
					/*}
					elseif (!is_readable($_updFile)) {
						if (strstr($_updFile, '.conf')) {
							$conf = $this->prpath . 'myconfig.txt';
							if (filemtime($conf) < filemtime($file_path))
								$added[$file_path] = array('file_hash' => $current[$file_path]['file_hash'], 'file_last_mod' => $current[$file_path]['file_last_mod'], 'update' => $_updFile);					
						}
						elseif (strstr($_updFile, '.sql')) {
							$dbupd = $this->prpath. 'sqlupgrade.txt';
							if (filemtime($dbupd) < filemtime($file_path))
								$added[$file_path] = array('file_hash' => $current[$file_path]['file_hash'], 'file_last_mod' => $current[$file_path]['file_last_mod'], 'update' => $_updFile);							
						}
						else //new	
							$added[$file_path] = array('file_hash' => $current[$file_path]['file_hash'], 'file_last_mod' => $current[$file_path]['file_last_mod'], 'update' => $_updFile);					
					}
					else {} //do nothing*/
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
			/*foreach($added as $filename => $value) { 	
				if ($exec) {
					$report .= $this->_update($filename, $value['update'], true);
				}	
			}*/	
        }

		if ($count_added) {
			$url = seturl("t=cpupgrade&upgpath=".base64_encode($path));
			$button = "<a href=\"$url\" class=\"btn btn-danger\">Upgrade</a>";
			$cmd = null;//$exec ? null : $button;//seturl('t=cpupgrade&upgpath='.base64_encode($path), '[Upgrade]');
			
			$report .= "\r\nSummary:
Current Baseline: $count_current
Added: $count_added $cmd
Scan executed in $elapsed seconds.\r\n";
		}

		//	Destroy tables (release to memory)
		//$baseline = $current = $added = array();

		//log
		//if ($ajaxid>0)
			//$log = @file_put_contents($this->prpath . $this->app . '.log', $report, LOCK_EX | FILE_APPEND);		
		
		if ($repout) 
			return(nl2br($report));
		
		return (json_encode($added));//(true);	
	}

	protected function _update($source, $dest, $mkdir=false) {
		
		if (strstr($source,'replication')) {//prpath replication dir
		    if (strstr($source,'.sql')) //must be admindb
				$ret = $this->_execsql($source);	
			else
				$ret = $this->_copy($source, $dest, $mkdir);
			
			@unlink($source);	
		}			
		elseif (strstr($source,'.sql')) //common update, must be admindb
			$ret = $this->_execsql($source);
		elseif (strstr($source,'.conf')) //update ini
			$ret = $this->_execini($source);			
		else //common update copy 
			$ret = $this->_copy($source, $dest, $mkdir);
		
		return ($ret);
	}
	
	protected function _copy($source, $dest, $mkdir=false) {
		if ($mkdir) @mkdir(dirname($dest), 0777, true);
		//echo $source,'-',$dest,'<br/>';
		$ret = copy($source, $dest);		
		return ($ret ? '*' : false);
	}
	
	protected function _execsql($sqlfile) {
		$db = GetGlobal('db');
		
		$sql = @file_get_contents($sqlfile);		
		if ($sql) {
			//db->Execute($sql);
			//return $sql;
			
			$sql_parts = explode(';',$sql);
			$queries = 0; 
			foreach ($sql_parts as $i=>$sSQL) {
				$ret = $db->Execute($sSQL,1);			  
				$queries+=1;
			}	
			$ret = file_put_contents($this->prpath . 'sqlupgrade.txt', $sql);
			return $queries . ' queries executed.';			
		}
		return false;
	}
	
	protected function _execini($inifile) {
		$inif = $this->prpath . 'myconfig.txt';
		@copy($inif, str_replace('.txt', '._xt', $inif)); //backup
		
		$inidata = @file_get_contents($inifile);
		$fp = new fronthtmlpage(null);
		$pini = $fp->process_commands($inidata);
		unset ($fp);
		
		$inif_local = $this->prpath . 'ini.local';		
		@file_put_contents($inif_local, $pini); //copy local		
		
		$ini_array = parse_ini_file($inif_local, true, INI_SCANNER_RAW);
		
		if (!empty($ini_array)) {
		    $i = 0;
		    foreach ($ini_array as $s=>$section) {
				foreach ($section as $var=>$val) {
					$variable = strtolower($s) . '.' . strtolower($var); 
					$a = _m("rcconfig.setconf use $variable+".$val);		
					$i+=1;	
				}
			}
			return $i;
		}
		return false;
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
												   'tmpl'=>$this->templatePath,	
												  ));
            //"postvar1=value1&postvar2=value2&postvar3=value3");

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