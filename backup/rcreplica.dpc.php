<?php
$__DPCSEC['RCREPLICA_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCREPLICA_DPC")) && (seclevel('RCREPLICA_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCREPLICA_DPC",true);

$__DPC['RCREPLICA_DPC'] = 'rcreplica';
 
$__EVENTS['RCREPLICA_DPC'][0]='cpreplica';
$__EVENTS['RCREPLICA_DPC'][1]='cpreplfile';
$__EVENTS['RCREPLICA_DPC'][2]='cpreplsql';
$__EVENTS['RCREPLICA_DPC'][3]='cpdorepfile';
$__EVENTS['RCREPLICA_DPC'][4]='cpdorepsql';
$__EVENTS['RCREPLICA_DPC'][5]='cprmaccfile';
$__EVENTS['RCREPLICA_DPC'][6]='cpdorepall';

$__ACTIONS['RCREPLICA_DPC'][0]='cpreplica';
$__ACTIONS['RCREPLICA_DPC'][1]='cpreplfile';
$__ACTIONS['RCREPLICA_DPC'][2]='cpreplsql';
$__ACTIONS['RCREPLICA_DPC'][3]='cpdorepfile';
$__ACTIONS['RCREPLICA_DPC'][4]='cpdorepsql';
$__ACTIONS['RCREPLICA_DPC'][5]='cprmaccfile';
$__ACTIONS['RCREPLICA_DPC'][6]='cpdorepall';

//$__DPCATTR['RCREPLICA_DPC']['cpreplica'] = 'cpreplica,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCREPLICA_DPC'][0]='RCREPLICA_DPC;Replication;Replication';
$__LOCALE['RCREPLICA_DPC'][1]='_stamp;Stamp;Stamp';
$__LOCALE['RCREPLICA_DPC'][2]='_status;Status;Κατάσταση';
$__LOCALE['RCREPLICA_DPC'][3]='_filepath;Object;Στοιχείο';
$__LOCALE['RCREPLICA_DPC'][4]='_filemod;Date modified;Ημερομηνία αλλαγής';
$__LOCALE['RCREPLICA_DPC'][5]='_results;Results;Αποτέλεσμα';
$__LOCALE['RCREPLICA_DPC'][6]='_code;Code;Κωδικός';
$__LOCALE['RCREPLICA_DPC'][7]='_id;ID;ID';
$__LOCALE['RCREPLICA_DPC'][8]='_save;Save;Αποθήκευση';
$__LOCALE['RCREPLICA_DPC'][9]='_date;Date;Ημερ.';
$__LOCALE['RCREPLICA_DPC'][10]='_time;Time;Ώρα';
$__LOCALE['RCREPLICA_DPC'][11]='_status;Status;Φάση';
$__LOCALE['RCREPLICA_DPC'][12]='_fid;id;id';
$__LOCALE['RCREPLICA_DPC'][13]='_savesql;Save;Save';
$__LOCALE['RCREPLICA_DPC'][14]='_SQL;SQL Query;SQL Query';
$__LOCALE['RCREPLICA_DPC'][15]='_xdate;X Date;X Date';
$__LOCALE['RCREPLICA_DPC'][16]='_ref;Reference;Reference';
$__LOCALE['RCREPLICA_DPC'][17]='_sqlres;Res;Res';
$__LOCALE['RCREPLICA_DPC'][18]='_query;Query;Query';

class rcreplica  {

    var $title, $path, $urlpath;
	var $seclevid, $userDemoIds;
	
	var $report_out, $email_out, $addresses;
		
	function __construct() {
	
		$this->path = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');
		$this->title = localize('RCREPLICA_DPC',getlocal());	 
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); 
		//echo $this->seclevid;

		//	Output to monitor (true or false)
		//		Recommend true for testing and FALSE for CRON
		$this->report_out = false;		
		//	Output as e-mail (true or false)
		//		Recommend false for testing and true for CRON
		$this->email_out = false;		
		//	E-mail address(es) to send reports of change
		//$addresses = array("balexiou@stereobit.com",);// "user2@domain2.com");
		$this->addresses = array("b.alexiou@stereobit.gr",);// "user2@domain2.com");		  
	}
	
    function event($event=null) {
	
	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;		 
	
	   switch ($event) {

		 case 'cpdorepall'   : break;
		 case 'cprmaccfile'  : $this->makeAccFile($this->urlpath.'/cgi-bin/'); break;
	   
		 case 'cpdorepsql'   : break;
		 case 'cpdorepfile'  : break;
		 case 'cpreplsql'    : echo $this->loadframe(null,'sql');
		                       die();	
		                       break;  	
		 case 'cpreplfile'   : echo $this->loadframe(null,'file');
		                       die();
							   break; 	   
	     case 'cpreplica'    :
		 default             :    
		                      
	   }
			
    }   
	
    function action($action=null) {
		
	  $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	  if ($login!='yes') return null;	
	 
	  switch ($action) {
		  
		 case 'cpdorepall'  : $out = $this->replicationMode(); break;
		 case 'cprmaccfile' : $out = $this->replicationMode(); break;		  
			
		 case 'cpdorepsql'  : break; 										  
		 case 'cpdorepfile' : $out = $this->scanReport('cgi-bin', 1, 0, true, urldecode(GetReq('date')));
							  break; 
		 case 'cpreplsql'   :						
		 case 'cpreplfile'  : 
							  break;					  
	     case 'cpreplica'   :

		 default            : $out = $this->replicationMode();
	  }	 

	  return ($out);
    }
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}	

	protected function replicationMode() {
		$mode = (GetReq('mode')=='sql') ? 'SQL' : 'Filesystem';
		
		$turl1 = seturl('t=cpreplica&mode=files');
		$turl2 = seturl('t=cpreplica&mode=sql');		
		$button = $this->createButton('Mode', array('Files'=>$turl1,
													'SQL'=>$turl2,
		                                            ));
													
		$turl1 = seturl('t=cpdorepall&backtrace=today');
		$turl2 = seturl('t=cpdorepall&backtrace=week');
		$turl3 = seturl('t=cpdorepall&backtrace=month');
		$turl4 = seturl('t=cprmaccfile');		
		$button .= $this->createButton('Actions', array('Run (today)'=>$turl1,
														'Run (week)'=>$turl2,
														'Run (month)'=>$turl3,
													   'Create acc file'=>$turl4,
		                                              ),'warning');
													  													   
		$content = (GetReq('mode')=='sql') ?
					$this->replica_sqlgrid(null,140,5,'r', true) :
					$this->replica_filegrid(null,140,5,'r', true) ;
					
		$ret = $this->window($mode, $button, $content);
		
		return ($ret);
	}	

	protected function loadframe($ajaxdiv=null, $mode=null) {
		$id = GetParam('id');
		$cmd = ($mode=='sql') ? 'cpdorepsql&date='.$id : 'cpdorepfile&date='.$id;
		$bodyurl = seturl("t=$cmd&iframe=1");
			
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"440px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}		
	
	protected function replica_filegrid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('RCREPLICA_DPC',getlocal()); 
		
		$backtrace = date("Y-m-d H:i:s", mktime(date('H'), date('i'), date('s'), date('n'), date('j')-30,date('Y')));

		$xsSQL = "select * from (SELECT id, stamp, status, file_path, file_last_mod FROM fshistory WHERE (status='ADDED' or status='ALTERED' or STATUS='DELETED') and file_path NOT LIKE 'FIRST SCAN%' and stamp > '$backtrace') as o";		
		//echo $xsSQL;  
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('_id',getlocal())."|2|0");	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+stamp|".localize('_stamp',getlocal())."|link|5|"."javascript:filedetails(\"{stamp}\");".'||');
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+status|".localize('_status',getlocal()).'|5|1');			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+file_path|".localize('_filepath',getlocal())."|19|1"); //"|link|5|"."javascript:cronjobs(\"{id}\");".'||');		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+file_last_mod|".localize('_filemod',getlocal())."|5|1|");
		
		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+fshistory+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}
	
	protected function replica_sqlgrid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('RCREPLICA_DPC',getlocal()); 	
		
		$backtrace = date("Y-m-d H:i:s", mktime(date('H'), date('i'), date('s'), date('n'), date('j')-30,date('Y')));

		//$xsSQL = "select * from (SELECT id, stamp, status, file_path, file_last_mod FROM fshistory WHERE (status='ADDED' or status='ALTERED' or STATUS='DELETED') and file_path NOT LIKE 'FIRST SCAN%' and stamp > '$backtrace') as o";		
		//echo $xsSQL;  
		$xsSQL = "SELECT * FROM (SELECT i.id,i.fid,i.time,i.date,i.execdate,i.status,i.sqlres,i.sqlquery,i.reference FROM syncsql i where i.reference='system' AND i.reference NOT LIKE 'replication' AND i.sqlquery NOT LIKE '%cron%') x";
		//echo $xsSQL;

		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+id|".localize('id',getlocal())."|2|0|");
        //GetGlobal('controller')->calldpc_method("mygrid.column use grid2+fid|".localize('fid',getlocal())."|2|0");
		//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+time|".localize('_date',getlocal())."|date|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+date|".localize('_date',getlocal())."|link|3|"."javascript:sqldetails({id});".'||');			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+execdate|".localize('_xdate',getlocal())."|3|0|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+status|".localize('_status',getlocal())."|1|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+sqlquery|".localize('_query',getlocal())."|25|1|");
	    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+sqlres|".localize('_sqlres',getlocal())."|2|0|");			
	    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+reference|".localize('_ref',getlocal())."|2|0|");
		
		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid2+syncsql+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}	

	
	protected function printCurrentDirRecursively($originDirectory, $printDistance=0, &$fh=null){
    
		//if($printDistance==0) @fwrite($fh, "\r\n");
		$leftWhiteSpace = "";
		//for ($i=0; $i < $printDistance; $i++)  $leftWhiteSpace = $leftWhiteSpace." ";
    
		$CurrentWorkingDirectory = dir($originDirectory);
		while($entry=$CurrentWorkingDirectory->read()){
			if($entry != "." && $entry != ".."){
				if(is_dir($originDirectory."\\".$entry)){
					@fwrite($fh, $leftWhiteSpace.$originDirectory."\\".$entry."\r\n");
					$this->printCurrentDirRecursively($originDirectory."\\".$entry, $printDistance+2, $fh);
				}
				/*else{
					@fwrite($fh, $leftWhiteSpace.$entry."\r\n");
				}*/
			}
		}
		$CurrentWorkingDirectory->close();
    
		//if($printDistance==0) @fwrite($fh, "\r\n");	
	}	
	
	protected function makeAccFile($startpath, $acc=null) {
		if (!$acc) $acc = 'system';
		$filename = $this->path . $acc . '.acc';
		$fh = fopen($filename, 'w');
		
		set_time_limit(180); 
		//$this->printCurrentDirRecursively($startpath, 0, $fh);	
		$this->readDirectories($startpath, $fh);

		$ret = @fclose($fh);	
		return $ret;
	}	
	
    protected function readDirectories($path=null, $fh) {
        $app_path = $this->urlpath . '/';			
	    static $dirname;
		$dirname .= $path .'/'; //goto next dir
		
		//$fh = @fopen($filename, 'w');
				
	    if (is_dir($app_path . $dirname)) {
		
          $mydir = dir($app_path . $dirname);
          while ($fileread = $mydir->read ()) {
		    if (($fileread!='.') && ($fileread!='..'))  {
  	            if (is_dir($app_path . $dirname."/".$fileread))  { 
					fwrite($fh, $app_path . $dirname."/".$fileread."\r\n");				 
					$this->readDirectories($fileread, $fh);
				}
				//else //if file do nothing
		    } 
	      }
	      $mydir->close();
		  $dirname = str_replace($path .'/','',$dirname);		  
        }
		
	    //$ret = @fclose($fh);
		return ($ret);
    }	
			
	
	protected function selectPath($acc=null) {
		if (!$acc) return ($this->urlpath);
		
		$accfile = $this->path . $acc . '.acc';
		
		if (is_readable($accfile)) {
			
			$datalines = file($accfile);
			
			$accindexfile = $this->path . $acc . 'idx';
			$idx = @file_get_contents($accindexfile);
			
			if ($idx) {
				
				foreach ($datalines as $l=>$line) {
					if (strcmp($line, $idx)==0) {
						$last = $l;
						break;
					}	
				}
				
				$next = (count($datalines)>=$last+1) ? $datalines[$last+1] : $datalines[0];
				@file_put_contents($accindexfile, $next);
				return ($next);
			}
			else {
				$first = $datalines[0];
				return ($first);
			}
		}
		
		return ($this->urlpath); 
	}

		
	public function scan($acc=null, $path=null, $skipdir=null, $reportout=false) {
		$db = GetGlobal('db');
		$repout = $reportout ? true : $this->report_out;
		
		$path = $this->selectPath();		
		
		@unlink($this->path . 'scanner.log');
		$log = fopen($this->path . 'scanner.log', "a");
		
		$testing = true; //false;
		$acct = $acc ? $acc : 'scanner';
		$scan_path_length = strlen($path);

	    ini_set('max_execution_time', 600);
	    ini_set('memory_limit','1024M');		
		
		//	Extensions to fetch
		//  	Example: $ext = array("php", "html", "htm", "js");   
		//	Recommended: An empty array will return ALL extensions 
		//		which is best for real security
		$ext_array = array();
		//	Make extensions lower case for scanner comparison
		$ext_array = array_map('strtolower',$ext_array);
		// 	extensions to omit
		//		An empty array will return all extensions
		//      *** The $excl_ext array can only contain elements *** 
		//		*** if $ext array above is empty *** 
		$excl_array = array('ftpquota','txt','swf','fla','ini'); //<< ini
		//	Make extensions lower case for scanner comparison
		$excl_array = array_map('strtolower',$excl_array);
		//	Scan extensionless files?
		$extensionless = false;
		// 	directories to ignore
		//		An empty array will check all directories in the SCAN_PATH tree
		$skip = is_array($skipdir) ? $skipdir : array();	
		//	$indent for report indent
		$indent = " &nbsp; &nbsp;";
		$indent2 = $indent . $indent;

		//	INITIALIZE
		//	Initialization of scanner variables and tables
		
		//	Clear and title the report variable before starting
		$report = "SuperScan File Check for $acct\r\n\r\n";
		//	Initialize the baseline array for the baseline table
		$baseline = array();		
		//	Initialize the current array for the current file scan
		$current = array();
		//	Intitialize the differences arrays 
		$added = array();
		$altered = array();
		$deleted = array();

		//	Limit first scan entries in history table

		//	Get date and time of last scan for report
		$last_scanned_records = $db->Execute("SELECT `scanned` FROM fsscanned WHERE `acct` = '$acct' ORDER BY `scanned` DESC LIMIT 1");
		//if ($last_scanned_records && 0 < mysqli_num_rows($last_scanned_records))
		if ($last_scanned = $last_scanned_records->fields[0])
		{
			//	Get last timestamp
			//while($last_datetime = @mysqli_fetch_assoc($last_scanned_records))
			//{
			//$last_scanned = $last_datetime['scanned'];
			$firstscan = false;
			//}
		} else {
			$firstscan = true;
			$count_baseline = 0;
		}

		//	Start timer (scan duration)
		$start = microtime(true);

		//	END OF INITIALIZE

		//	BASELINE
		// 	Read from database to obtain file paths, hash values and 
		//		last modified dates to compare against current files

		$baseline_results = $db->Execute("SELECT `file_path`, `file_hash`, `file_last_mod` FROM fsbaseline WHERE `acct` = '$acct' ORDER BY `file_path` ASC");

		if ($baseline_results) 
		{
			//while ($baseline_files = @mysqli_fetch_assoc($baseline_results))
			foreach ($baseline_results as $ib=>$baseline_files)	
			{
				$baseline[$baseline_files['file_path']] = array(
					'file_hash' => $baseline_files['file_hash'],
					'file_last_mod' => $baseline_files['file_last_mod']);
			}

			//	Get the count of baseline records
			$count_baseline = count($baseline);

			if (0 == $count_baseline) 
			//	Prior scanned results but empty baseline table
			{
				//	Check for database hack by checking $firstscan
				if (!$firstscan)
				{
					$report .= "Empty baseline table!\r\nPROBABLE HACK ATTACK\r\n(ALL files are missing/deleted)!\r\n\r\n";	
				}
			}
	
			$report .= "$count_baseline baseline files extracted from database.\r\n";
	
			//	Output number of baseline files for testing
			if ($testing) fwrite($log, "$count_baseline baseline files extracted from database.");
		}
		//	Baseline files read into baseline array and baseline_count made


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
				{
					$ext = '';
				} else {
					$ext = strtolower(pathinfo($iter->key(), PATHINFO_EXTENSION));
				}

				//	Check for allowed file extension OR
				//	$ext empty AND not excluded ext OR
				//	is not $extensionless (if prohibited)
				//	if ((!empty($ext_array)) || (empty($ext_array) && !in_array($ext, $excl_array, true)))
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

					//	IF file_path is not in baseline, file was ADDED
					if (!array_key_exists($file_path, $baseline))
					{
						$added[$file_path] = array('file_hash' => $current[$file_path]['file_hash'], 'file_last_mod' => $current[$file_path]['file_last_mod']);
			
						//	INSERT added record in baseline table
						$res = $db->Execute("INSERT INTO fsbaseline SET `file_path` = '$file_path', `file_hash` = '" . $added[$file_path]['file_hash'] . "', `file_last_mod` = '" . $added[$file_path]['file_last_mod'] . "', `acct` = '$acct'");
						if ($testing && (!$res)) fwrite($log, $db->error);

						//	INSERT added file record in history table
						//		EXCEPT if $firstscan (to prevent unnecessary records)
						if(!$firstscan) 
						{
							$res = $db->Execute("INSERT INTO fshistory SET `stamp` = '" . date('Y-m-d h:i:s') . "', `status` = 'Added', `file_path` = '$file_path', `hash_org` = 'Not Applicable', `hash_new` = '" . $added[$file_path]['file_hash'] . "', `file_last_mod` = '" . $added[$file_path]['file_last_mod'] . "', `acct` = '$acct'");
							if ($testing && (!$res)) fwrite($log, $db->error);
						}  else {
							//	First Scan entry into history table
							$res = $db->Execute("INSERT INTO fshistory SET `stamp` = '" . date('Y-m-d h:i:s') . "', `status` = 'Added', `file_path` = 'FIRST SCAN (file listings inhibited)', `hash_org` = 'Not Applicable', `hash_new` = 'Not Applicable', `file_last_mod` = 'Not Applicable', `acct` = '$acct'");
							if ($testing && (!$res)) fwrite($log, $db->error);
						}	//	End of handling $added array entry

					} else {

						//	IF file was ALTERED 
						if ($baseline[$file_path]['file_hash'] <> $current[$file_path]['file_hash'] || $baseline[$file_path]['file_last_mod'] <> $current[$file_path]['file_last_mod'])
						{
							$altered[$file_path] = array('hash_org' => $baseline[$file_path]['file_hash'], 'hash_new' => $current[$file_path]['file_hash'], 'file_last_mod' => $current[$file_path]['file_last_mod']);
				
							//	UPDATE altered record in baseline
							$res = $db->Execute("UPDATE fsbaseline SET `file_hash` = '" . $altered[$file_path]['hash_new'] . "', `file_last_mod` = '" . $altered[$file_path]['file_last_mod'] . "' WHERE `file_path` = '$file_path' AND `acct` = '$acct'");
							if ($testing && (!$res)) fwrite($log, $db->error);

							//	INSERT altered file info in history table
							$res = $db->Execute("INSERT INTO fshistory SET `stamp` = '" . date('Y-m-d h:i:s') . "', `status` = 'Altered', `file_path` = '$file_path', `hash_org` = '" . $altered[$file_path]['hash_org'] . "', `hash_new` = '" . $altered[$file_path]['hash_new'] . "', `file_last_mod` = '" . $altered[$file_path]['file_last_mod'] . "', `acct` = '$acct'");
							if ($testing && (!$res)) fwrite($log, $db->error);
						}
					}
				}	//	End of handling $altered array entry
			}	// End of handling $current record entry
			$iter->next();
		}//while
		
		
		//	DELETED
		//	Compare and generate $deleted array
		//	$deleted contains records where file_path 
		//		in $baseline but not in $current
		$deleted = array_diff_key($baseline, $current);
		//	Next line necessary for Windows
		$deleted = str_replace(chr(92),chr(47),$deleted);

		foreach($deleted as $key => $value)
		{
			//	Handle DELETEd file
			//	DELETE file from baseline table
			$res = $db->Execute("DELETE FROM fsbaseline WHERE `file_path` = '$key' LIMIT 1");
			if ($testing && (!$res)) 
			{
				fwrite($log, $db->error);
			} else {
				if ($testing) fwrite($log, "Deleted " . $key . "'s baseline record.");
			}

			//	Record deletion in history table
			$res = $db->Execute("INSERT INTO fshistory SET `stamp` = '" . date('Y-m-d h:i:s') . "', `status` = 'Deleted', `file_path` = '$key', `hash_org` = '" . $deleted[$key]['file_hash'] . "', `hash_new` = 'Not Applicable', `file_last_mod` = '" . $deleted[$key]['file_last_mod'] . "', `acct` = '$acct'");
			if ($testing && (!$res)) fwrite($log, $db->error);
		}
		//	End of Deleted file handling

		//	PREPARE Report 
	
		//	Get scan duration
		$elapsed = round(microtime(true) - $start, 5);
	
		//	Add count summary to report
		$count_current = count($current);
		$report .= "$count_current files collected in scan.\r\n";
		if (0 == $count_current)
		{
			//	ALL files are gone!
			$report .= "\r\nThere are NO files in the specified location.\r\n";
			if (!$firstscan) $report .= "This indicates a possible HACK ATTACK\r\nOR an incorrect path to the account's files\r\n";
		}

		$count_added = count($added);
		$report .= "$indent $count_added files ADDED to baseline.\r\n";
		if (!$firstscan)
		{
			foreach($added as $filename => $value) $report .= "$indent2 + " . substr($filename,$scan_path_length) . "\r\n";
		}

		$count_altered = count($altered);
		$report .= "$indent $count_altered ALTERED files updated.\r\n";
		foreach($altered as $filename => $value) $report .= "$indent2 " . chr(177) . " " . substr($filename,$scan_path_length) . "\r\n";

		$count_deleted = count($deleted);
		$report .= "$indent $count_deleted files DELETED from baseline.\r\n";
		foreach($deleted as $filename => $value) $report .= "$indent2 - " . substr($filename,$scan_path_length) . "\r\n";

		fwrite($log, "\r\n");

		$count_changes = $count_added + $count_altered + $count_deleted;	

		//	Completed update of history table for Unchanged

		if (0 == $count_changes)
		{  
			$path = "File structure is unchanged since last scan, script execution time $elapsed seconds.\r\nThe baseline contains $count_current files.\r\n";

			//	Update history table
			$res = $db->Execute("INSERT INTO fshistory SET `stamp` = '" . date('Y-m-d h:i:s') . "', `status` = 'Unchanged', `file_path` = '$path', `hash_org` = 'Not Applicable', `hash_new` = 'Not Applicable', `file_last_mod` = 'Not Applicable', `acct` = '$acct'");
			if ($testing && (!$res)) fwrite($log, $db->error);

			// update scanned table
			$res = $db->Execute("INSERT INTO fsscanned SET `scanned` = '" . date('Y-m-d h:i:s') . "', `changes` = '$count_changes', `acct` = '$acct'");  
			if ($testing && (!$res)) fwrite($log, $db->error);

			$report .= "File structure is unchanged since last scan.\r\n\r\nThe baseline now contains $count_current files.\r\n\r\nScan executed in $elapsed seconds.";
	
		} else {
	
			$res = $db->Execute("INSERT INTO fsscanned SET `scanned` = '" . date('Y-m-d h:i:s') . "', `changes` = '$count_changes', `acct` = '$acct'");  
			if ($testing && (!$res)) fwrite($log, $db->error);

			$report .= "\r\n\r\nSummary:\r\n
Baseline start: $count_baseline
Current Baseline: $count_current
Changes to baseline: $count_changes\r\n
$indent Added: $count_added
$indent Altered: $count_altered
$indent Deleted: $count_deleted.\r\n
Scan executed in $elapsed seconds.";
			if (0 < $count_changes) $report .= "\r\n\r\nIf you did not makes these changes, examine your files closely\r\nfor evidence of embedded hacker code or added hacker files.\r\n(WinMerge provides excellent comparisons)";
		}

		//	Clean-up history table and scanned table by deleting entries over 30 days old
		$res = $db->Execute("DELETE FROM fshistory WHERE `stamp` < DATE_SUB(NOW(), INTERVAL 30 DAY)");
		if ($testing && (!$res)) fwrite($log, "History table clean-up problem: " . $db->error . "<br />");

		$res = $db->Execute("DELETE FROM fsscanned WHERE `scanned` < DATE_SUB(NOW(), INTERVAL 30 DAY)");
		if ($testing && (!$res)) fwrite($log, "Scanned table clean-up problem: " . $db->error . "<br />");

		//	End of Report preparation and clean-up		
		
		//	OUTPUT Report
		
		//	E-mail Report
		if ($this->email_out && 0 < $count_changes)
		{
			$to =  (count($this->addresses)>1) ? implode(", ", $this->addresses) : $this->addresses[0];
			mail($to, "SuperScan Report for $acct",str_replace('&nbsp;',' ',$report)); 
		}

		if ($testing) fwrite($log, $report);

		//	Destroy tables (release to memory)
		$baseline = $current = $added = $altered = $deleted = array();

		$ret = fclose($log);
		
		if ($repout) 
			return(nl2br($report));
		else		
			return ($ret);	
	}
	
	public function scanReport($acc=null, $daysback=null, $minsback=null, $reportout=false, $date=null) {
		$db = GetGlobal('db');	
		$backtracedays = $daysback ? $daysback : 1;
		$backtracemins = $minsback ? $minsback : 0;
		$acct = $acc ? $acc : 'scanner';
		$repout = $reportout ? true : $this->report_out;
		
		$report = "Scan Report\r\n\r\n";
		
		//	Prepare scan report
		if ($date) { //as clicked by grid
			$backtrace = $date;
			$gthan = '>';// '<'; //less than ?
		}	
		else {
			$backtrace = date("Y-m-d H:i:s", mktime(date('H'), date('i')-$backtracemins, date('s'), date('n'), date('j')-$backtracedays,date('Y')));
			$gthan = '>'; //greater than
		}	

		$report .= "Scan log report for $acct file changes since ".$backtrace.":\r\n\r\n";	

		$results = $db->Execute("SELECT stamp, status, file_path, file_last_mod FROM fshistory WHERE acct = '$acct' AND stamp $gthan '$backtrace'");
		if (!$results)
		{
			$report .="No log entries available!\r\n ";
		} else {
			//while($result=mysqli_fetch_array($results))
			foreach ($results as $r=>$rec) 	
			{
				$report .= $rec['stamp']." =>  ".strtoupper($rec['status'])." =>  ".$rec['file_path']."\r\n";
			}
		}

		// OUTPUT Report
		if ($this->email_out)
		{
			$to = (count($this->addresses)>1) ? implode(", ", $this->addresses): $this->addresses[0];
			$mailed = mail($to, $acct . ' Integrity Monitor Log Report',$report); 
		}

		if ($repout) 
			return(nl2br($report));
		else
			return true;	
	}
	
	
	protected function createButton($name=null, $urls=null, $t=null, $s=null) {
		$type = $t ? $t : 'primary'; //danger /warning / info /success
		switch ($s) {
			case 'large' : $size = 'btn-large '; break;
			case 'small' : $size = 'btn-small '; break;
			case 'mini'  : $size = 'btn-mini '; break;
			default      : $size = null;
		}
		
		//$ret = "<button class=\"btn  btn-primary\" type=\"button\">Primary</button>";
		
		if (!empty($urls)) {
			foreach ($urls as $n=>$url)
				$links .= '<li><a href="'.$url.'">'.$n.'</a></li>';
			$lnk = '<ul class="dropdown-menu">'.$links.'</ul>';
		} 
		
		$ret = '
			<div class="btn-group">
                <button data-toggle="dropdown" class="btn '.$size.'btn-'.$type.' dropdown-toggle">'.$name.' <span class="caret"></span></button>
                '.$lnk.'
            </div>'; 
			
		return ($ret);
	}

	protected function window($title, $buttons, $content) {
		$ret = '	
		    <div class="row-fluid">
                <div class="span12">
                  <div class="widget red">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i> Replication: '.$title.'</h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                               <!--a href="javascript:;" class="icon-remove"></a-->
                           </span>
                        </div>
                        <div class="widget-body">
							<div class="btn-toolbar">
							'. $buttons .'
							<hr/><div id="rdetails"></div>
							</div>
							'.  $content .'
                        </div>
                  </div>
                </div>
            </div>
';
		return ($ret);
	}	


	
	
	//...replicate (zip now) differencial file system activity
	protected function difFiles($name=null, $download=false) {
		$db = GetGlobal('db');
		$backtrace = date("Y-m-d H:i:s", mktime(date('H'), date('i'), date('s'), date('n'), date('j')-30,date('Y')));

		static $zip; 
		$zip = new ZipArchive();
        $d = date('Ymd-Hi');
        $zname = $name ? $d.'-'.$name : $d.'-'.'backup.zip';			
		$zfilename = $this->path . "/uploads/" . $zname; //to save into
         
		if ($zip->open($zfilename, ZipArchive::CREATE)!==TRUE) {
            echo "Cannot open $zfilename";
			return false;
		}
		else {
			$sSQL = "SELECT id, stamp, status, file_path, file_last_mod FROM fshistory WHERE (status='ADDED' or status='ALTERED') and file_path NOT LIKE 'FIRST SCAN%' and stamp > '$backtrace'";
			$result = $db->Execute($sSQL);
		
			foreach ($result as $r=>$rec) {
				if (is_readable($rec['file_path']))  {   
				
					$f = str_replace($this->urlpath .'/', '', $rec['file_path']);
					$zip->addFile($rec['file_path'], $f);
					
					if (!$download) echo $f . '<br/>';
				}	
			}
			
			$zip->close();		  
		
			if ($download==true) {
				$dn = new DOWNLOADFILE($zfilename, 'application/zip');
				$ret = $dn->df_download();
				//return ($ret);	
			}	
			else 
				return true;		
		}
		
	}

	
	
	protected function writeLog($data = '') {
		if (empty($data)) return;

		$data = date('d-m-Y H:i:s')."\r\n" . $data . "\r\n----\r\n";
		$ret = file_put_contents($this->path . 'scanner.log', $data, FILE_APPEND | LOCK_EX);
		
		return $ret;
	}	
};
}
?>