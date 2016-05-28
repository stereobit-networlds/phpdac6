<?php
$__DPCSEC['RCBACKUP_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCBACKUP_DPC")) && (seclevel('RCBACKUP_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCBACKUP_DPC",true);

$__DPC['RCBACKUP_DPC'] = 'rcbackup';
 
$__EVENTS['RCBACKUP_DPC'][0]='cpbackup';
$__EVENTS['RCBACKUP_DPC'][1]='cpbackupdtl';
$__EVENTS['RCBACKUP_DPC'][2]='cpbackupsh';
$__EVENTS['RCBACKUP_DPC'][3]='cpbackupget';
$__EVENTS['RCBACKUP_DPC'][4]='cpbackupsave';

$__ACTIONS['RCBACKUP_DPC'][0]='cpbackup';
$__ACTIONS['RCBACKUP_DPC'][1]='cpbackupdtl';
$__ACTIONS['RCBACKUP_DPC'][2]='cpbackupsh';
$__ACTIONS['RCBACKUP_DPC'][3]='cpbackupget';
$__ACTIONS['RCBACKUP_DPC'][4]='cpbackupsave';

//$__DPCATTR['RCBACKUP_DPC']['cpbackup'] = 'cpbackup,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCBACKUP_DPC'][0]='RCBACKUP_DPC;Backup;Backup';
$__LOCALE['RCBACKUP_DPC'][1]='_stamp;Stamp;Stamp';
$__LOCALE['RCBACKUP_DPC'][2]='_name;Name;Ονομασία';
$__LOCALE['RCBACKUP_DPC'][3]='_filepath;Object;Στοιχείο';
$__LOCALE['RCBACKUP_DPC'][4]='_filedate;Date created;Ημερομηνία';
$__LOCALE['RCBACKUP_DPC'][5]='_results;Results;Αποτέλεσμα';
$__LOCALE['RCBACKUP_DPC'][6]='_code;Code;Κωδικός';
$__LOCALE['RCBACKUP_DPC'][7]='_id;ID;ID';
$__LOCALE['RCBACKUP_DPC'][8]='_save;Save;Αποθήκευση';

class rcbackup  {

    var $title, $path, $urlpath;
	var $seclevid, $userDemoIds;
	
	var $report_out, $email_out, $addresses;
		
	function __construct() {
	
		$this->path = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');
		$this->title = localize('RCBACKUP_DPC',getlocal());	 
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); 
		//echo $this->seclevid;
		$this->owner = $_POST['Username'] ? $_POST['Username'] : GetSessionParam('LoginName');

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
		 case 'cpbackupsave' : $file = $this->downloadFile(); die($file);	
		                       break;  		   
		   							   
		 case 'cpbackupget'  : $this->download($this->urlpath . urldecode(GetReq('file')));
							   //die();
							   break;	
							 
		 case 'cpbackupsh'   : break;
		 case 'cpbackupdtl'  : echo $this->loadframe();
		                       die();
							   break; 	   
	     case 'cpbackup'     :
		 default             :    
		                      
	   }
			
    }   
	
    function action($action=null) {
		
	  $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	  if ($login!='yes') return null;	
	 
	  switch ($action) {
		 
         case 'cpbackupget'   : break;			 
			
		 case 'cpbackupsave'  : break; 										  
		 case 'cpbackupsh'    : //$out = $this->scanReport('cgi-bin', 1, 0, true, urldecode(GetReq('date')));
								$out = $this->downloadReport(GetReq('id'));
							    break; 
		 case 'cpbackupdtl' : 
							  break;					  
	     case 'cpbackup'    :

		 default            : $grid = $this->backup_grid(null,140,5,'r', true);
							  $btn = $this->getFilesButtons();		 
							  $out = $this->window($btn, $grid);
	  }	 

	  return ($out);
    }
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}		

	protected function loadframe($ajaxdiv=null) {
		$id = GetParam('id');
		$bodyurl = seturl("t=cpbackupsh&iframe=1&id=$id");
			
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"240px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}		
	
	protected function backup_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('RCBACKUP_DPC',getlocal()); //localize('_items', $lan);	
		
		//$backtrace = date("Y-m-d H:i:s", mktime(date('H'), date('i'), date('s'), date('n'), date('j')-30,date('Y')));

		$xsSQL = "select * from (SELECT id, stamp, name, file_path, file_created FROM fsbackup) as o";		
		//echo $xsSQL;  
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('_id',getlocal())."|2|0");	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+stamp|".localize('_stamp',getlocal()). '|5|1|'); //"|link|5|"."javascript:bdetails(\"{id}\");".'||');			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+name|".localize('_name',getlocal())."|link|5|"."javascript:bdetails(\"{id}\");".'||');		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+file_path|".localize('_filepath',getlocal())."|19|1"); 		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+file_created|".localize('_filedate',getlocal())."|5|1|");
	
		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+fsbackup+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}		

		
	public function scan($acc=null, $path=null, $skipdir=null, $reportout=false) {
		if (!$path)	$path = $this->urlpath . '/';
		$db = GetGlobal('db');
		$repout = $reportout ? true : $this->report_out;
		
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
	
	
    public function backup_directory($path=null, $name=null, $download=false, $ziprecur=false) {
	
        $app_path = $this->urlpath . '/';			
	
	    static $dirname;
		$dirname .= $path .'/'; //goto next dir
		static $zip; 
		$zip = new ZipArchive();
		
        $d = date('Ymd-Hi');
        $zname = $name ? /*$d.'-'.*/$name.'.zip' : /*$d.'-'.*/'backup.zip';			
		$zfilename = $this->path . "/uploads/" . $zname; //to save into
         
		if ($zip->open($zfilename, ZipArchive::CREATE)!==TRUE) {
            die("cannot open $zfilename");//false;
        }			
		
	    if (is_dir($app_path . $dirname)) {
		
		  //if (!$ziprecur)
		    $zip->addEmptyDir(str_replace('../','',$dirname));//clean ..
		   
          $mydir = dir($app_path . $dirname);
		 
			
          while ($fileread = $mydir->read ()) {
		   if (($fileread!='.') && ($fileread!='..'))  {   
  	             if (!is_dir($app_path . $dirname."/".$fileread))  {   
					$zip->addFile($app_path . $dirname."/".$fileread, str_replace('../','',$dirname).$fileread); //to sub path
				 }
				 else //recursion
				    $x = $this->backup_directory($fileread, $name, $download, true);
		   } 
	      }
	      $mydir->close ();
		  //goto prev dir
		  $dirname = str_replace($path .'/','',$dirname);
		  
		  if (!$ziprecur) {
			$ret .= "numfiles: " . $zip->numFiles . "<br/>";
			$ret .= "status:" . $zip->status . "<br/>";
		  }
		  
		  if (!$ziprecur) {
			$zip->close();	
			$this->savefsBackup($name, $zfilename);
		  }	
        }
		
		if ((!$ziprecur) && ($download==true)) {
		    $dn = new DOWNLOADFILE($zfilename);
			$ret = $dn->df_download();
		}
		
        //echo $ret;
		return ($ret);
    }

   //zip directory without recursion
    public function backup_directory_norec($path=null, $name=null, $download=false) {

        $app_path = $this->urlpath . '/';	
	
        $d = date('Ymd-Hi');
		$zpath = $path ? $path : '';
        $zname = $name ? /*$d.'-'.*/$name.'.zip' : /*$d.'-'.*/'backup.zip';
		$dirname = $app_path . '/' . $zpath;
		
	    if (is_dir($dirname)) {
		   
          $mydir = dir($dirname);
		  
		  $zip = new ZipArchive();
		  $zfilename = $this->path . "/uploads/" . $zname; //to save into
         
		  if ($zip->open($zfilename, ZipArchive::CREATE)!==TRUE) {
              return "cannot open $zfilename";//false;
          }		  

          while ($fileread = $mydir->read ()) {
		   if (($fileread!='.') && ($fileread!='..'))  {   
  	             if (!is_dir($fileread))  {   
                    $zip->addFile($dirname."/".$fileread, $fileread); //or basename of full path					
				 }
		   } 
	      }
	      $mydir->close ();
		  
          $ret = "numfiles: " . $zip->numFiles . "<br/>";
          $ret .= "status:" . $zip->status . "<br/>";
		  
		  $zip->close();
		  $this->savefsBackup($name, $zfilename);		  
        }
		
		if ($download==true) {
		    $dn = new DOWNLOADFILE($zfilename);
			$ret = $dn->df_download();
		}
		

		return ($ret);
    } 	
	
    public function backup_dbtable($table=null, $name=null, $download=false) {
		$db = GetGlobal('db');  
		$d = date('Ymd-Hi');
	    $meter = 0;
		$m = 0;
		$zname = $name ? /*$d.'-'.*/$name.'.zip' : /*$d.'-'.*/'dbasecsv.zip';
		if (!$table) return false;
		
		$con = mysql_connect(remote_paramload('DATABASE','dbhost', $this->path), 
		                      remote_paramload('DATABASE','dbuser', $this->path),
							  remote_paramload('DATABASE','dbpwd', $this->path));
		if ($con) {	

  	      $zip = new ZipArchive();		
		  $zfilename = $this->path . "/uploads/" . $zname; //to save into
         
		  if ($zip->open($zfilename, ZipArchive::CREATE)!==TRUE) {
              $download=false;//die("cannot open $zfilename");//false;
			  $ret = 'Zip error!';
          }				
							  
		  mysql_select_db(remote_paramload('DATABASE','dbname', $this->path));	
		  //mysql_query("SET NAMES utf8");
		  $charset = remote_paramload('DATABASE','charset', $this->path);
		  mysql_query("SET NAMES ".$charset);//'utf8'");
		  
	      if (stristr($table,'|')) //multitable
		    $tables = explode('|',$table);
		  else
			$tables[] = $table; //one table

          foreach ($tables as $t=>$tbl) {	
            $ztablename = $this->path . "/uploads/" . $d.'-'.$tbl . '.csv';		
            
			$result = mysql_query("SELECT * FROM " . $tbl);
            if ($result) {	
			
			  $fh = fopen($ztablename, 'w');
			  
			  // Now UTF-8 - Add byte order mark / UTF8 BOM
			  //if (($this->encoding=='utf-8') || ($this->encoding=='utf8'))
				fwrite($fh, pack("CCC",0xef,0xbb,0xbf)); 
			  
			  /* insert field values into data.txt */			
			  while ($row = mysql_fetch_array($result)) {          
				$last = end($row);          
				$num = mysql_num_fields($result) ;    
				for($i = 0; $i < $num; $i++) {
				
				    //NULL VALUES..0 zeros ???
				    //$cell = $row[$i] ? $row[$i] : 'null';
					
					fwrite($fh, $row[$i]);                      
					//fwrite($fh, mb_convert_encoding($row[$i], 'UTF-8', 'GREEK'));
					//fwrite($fh, iconv("UTF-8", "ISO-8859-7", $row[$i]));
					
					if ($row[$i] != $last)
						fwrite($fh, "; "); //,
				}                                                                 
				fwrite($fh, PHP_EOL);//"\n");
			  }
			  @fclose($fh);	
			  
			  $zip->addFile($ztablename, $tbl . '.csv');
				
              $meter+=1;
			}
			/*// MUST BE ADMIN TO EXPORT TEXT
			  $sSQL = "SELECT itmname,itmactive INTO OUTFILE '".$ztablename[$t]."'
  FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"'
  LINES TERMINATED BY '\\n'
  FROM " . $tbl;
            //echo $sSQL;  
			$result = $db->Execute($sSQL,2);*/
						 
          }
		  $ret .= $meter . ' tables exported.';
		  $zip->close();	
		  $this->savefsBackup($name, $zfilename);
		  
		  if ($download==true) {
		  
		    $dn = new DOWNLOADFILE($zfilename);
			$ret = $dn->df_download();
		  }	  
		}  
        else 
		  $ret = 'No connection';		  
		  
        return ($ret);		
    }

	
	protected function download($file) {
		
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}		
		
	}
	
	
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
			$this->savefsBackup($zname, $zfilename);	
		
			if ($download==true) {
				$dn = new DOWNLOADFILE($zfilename, 'application/zip');
				$ret = $dn->df_download();
				//return ($ret);	
			}	
			else 
				return true;		
		}
		
	}
	
    protected function difTable($table=null, $name=null, $download=false) {
		$db = GetGlobal('db');  
		$d = date('Ymd-Hi');
	    $meter = 0;
		$m = 0;
		$zname = $name ? /*$d.'-'.*/$name : /*$d.'-'.*/ $table . '.zip';
		if (!$table) return false;
		
  	    $zip = new ZipArchive();		
		$zfilename = $this->path . "/uploads/" . $zname; //to save into
         
		if ($zip->open($zfilename, ZipArchive::CREATE)!==TRUE) {
		    echo 'Zip error!';
			return false;
        }				
		else {					  
	
            $ztablename = $this->path . "/uploads/" . $d.'-'. $table . '.csv';		
            
			$result = $db->Execute("SELECT * FROM " . $table);// . " WHERE timestamp...");
            if ($result) {	
			
			  $fh = fopen($ztablename, 'w');
			  
			  // Now UTF-8 - Add byte order mark / UTF8 BOM
			  //if (($this->encoding=='utf-8') || ($this->encoding=='utf8'))
			  fwrite($fh, pack("CCC",0xef,0xbb,0xbf)); 
			         
			  foreach ($result as $r=>$rec) {
				for($i = 0; $i < count($rec); $i++) {
					fwrite($fh, $rec[$i] . ';');//implode(';', $rec));
				//foreach ($rec as $i=>$field) {	
				    //NULL VALUES..0 zeros ???
				    //$cell = $row[$i] ? $row[$i] : 'null';
					//is_numeric($i) ? fwrite($fh, $field . ';') : null;
				}                                                                 
				fwrite($fh, PHP_EOL);//"\n");
			  }
			  @fclose($fh);	
			  
			  $zip->addFile($ztablename, $table . '.csv');
			}
						 
			if ($zip->close())	{
				@unlink($ztablename); //for big files delete csv data
				$this->savefsBackup($zname, $zfilename);
			}	
			
			if ($download==true) {
		  
				//$dn = new DOWNLOADFILE($zfilename);
				//$ret = $dn->df_download();
				//return ($ret);
				
				/*header("Pragma: no-cache"); 
				header("Expires: 0"); 
				header("Content-type: application/zip");
				header("Content-Disposition: attachment; filename=\"". $zname ."\"");
				//header("Content-Length: ". filesize($zfilename));				
				$handle = fopen($zfilename, "rb");
				while (!feof($handle)){
					echo fread($handle, 8192);
				}
				fclose($handle);
				exit;	*/
				
				$this->download($zfilename);
			}	
			else
				return true;		
		}	
    }	

	protected function difPics($path=null, $name=null, $download=false) {
		$db = GetGlobal('db');
		$backtrace = date("Y-m-d H:i:s", mktime(date('H'), date('i'), date('s'), date('n'), date('j')-30,date('Y')));

		static $zip; 
		$zip = new ZipArchive();
        $d = date('Ymd-Hi');
        $zname = $name ? /*$d.'-'.*/$name : /*$d.'-'.*/'backup.zip';			
		$zfilename = $this->path . "/uploads/" . $zname; //to save into
         
		if ($zip->open($zfilename, ZipArchive::CREATE)!==TRUE) {
            echo "Cannot open $zfilename";
			return false;
		}
		else {
		
			$picpath = $this->urlpath . realpath($path); //<<< urlpath /this->path = cp
			if (is_dir($picpath)) {
				$source = $picpath;
				if (is_dir($source)) {
					$files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($source), RecursiveIteratorIterator::SELF_FIRST);
					foreach ($files as $file) {
						$file = realpath($file);
						if (is_dir($file)) {
							$zip->addEmptyDir(str_replace($source . '/', '', $file . '/'));
						} else if (is_file($file)) {
							$zip->addFromString(str_replace($source . '/', '', $file), file_get_contents($file));
						}
					}
				} else if (is_file($source)) {
					$zip->addFromString(basename($source), file_get_contents($source));
				}			
			
				$zip->close();	
				$this->savefsBackup($zname, $zfilename);
		
				if ($download==true) {
					$dn = new DOWNLOADFILE($zfilename, 'application/zip');
					$ret = $dn->df_download();
					//return ($ret);	
				}	
				else 
					return true;
			}
			else {
				echo "Not a path ($this->path . $path)";
				return false;	
			}	
		}
		
	}	
	
	protected function downloadFile() {
		$mode = GetReq('mode');
		
		//ini_set('max_execution_time', 600);
		//ini_set('memory_limit','1024M');

		set_time_limit(180); 	
		
		switch ($mode) {
			case 'system': $path = GetReq('cp'); //GetReq('path');
						   $p = explode('/', '/'.$path); // / at start in case of one level
						   $name = array_pop($p);	
			               $ret = $this->backup_directory($path, $name);
						   break;	
			case 'dir'   : $path = GetReq('path');
						   $p = explode('/', '/'.$path); // / at start in case of one level	
						   $name = array_pop($p);	
						   $ret = $this->backup_directory($path, $name);
			               break;
			case 'pics'  : $path = GetReq('path');
						   $p = explode('/', $path);	
						   $name = array_pop($p);	
						   $ret = $this->backup_directory_norec($path, $name);
			               break;
			case 'table' : $table = GetReq('table');
						   $ret = $this->difTable($table, null, true);
			               break;  
			case 'files' :
			default      : $ret = $this->difFiles(null, true);
		}
		
		return($ret);
	}
	
	
	protected function getFilesButtons() {
		
		$furl1 = seturl('t=cpbackupsave&mode=files');
		$furl2 = seturl('t=cpbackupsave&mode=dir&path=files');
		$furl3 = seturl('t=cpbackupsave&mode=dir&path=newsletters');
		$button = $this->createButton('Documents', array('Scanned files'=>$furl1,
														 'Public files'=>$furl2,
														 'Newsletters'=>$furl3,
													));
		
		$turl1 = seturl('t=cpbackupsave&mode=table&table=users');
		$turl2 = seturl('t=cpbackupsave&mode=table&table=ulists');		
		$button .= $this->createButton('Persons', array('Users'=>$turl1,
													   'e-Mails'=>$turl2,
		                                                ),'success');
		$turl1 = seturl('t=cpbackupsave&mode=table&table=customers');
		$turl2 = seturl('t=cpbackupsave&mode=table&table=custaddress');														  
		$button .= $this->createButton('Clients', array('Customers'=>$turl1,
													    'Addresses'=>$turl2,
		                                                ),'warning');
													  
		$turl1 = seturl('t=cpbackupsave&mode=table&table=products');													  
		$turl2 = seturl('t=cpbackupsave&mode=table&table=categories');
		$turl3 = seturl('t=cpbackupsave&mode=table&table=transactions');
		$button .= $this->createButton('Inventory', array('Products'=>$turl1,
													      'Categories'=>$turl2,
														  'Transactions'=>$turl3,
		                                                  ),'info');	

		$turl1 = seturl('t=cpbackupsave&mode=pics&path=images/photo_sm');													  
		$turl2 = seturl('t=cpbackupsave&mode=pics&path=images/photo_md');
		$turl3 = seturl('t=cpbackupsave&mode=pics&path=images/photo_bg');		
		$turl4 = seturl('t=cpbackupsave&mode=pics&path=images');
		$turl5 = seturl('t=cpbackupsave&mode=pics&path=images/thub');
		$turl6 = seturl('t=cpbackupsave&mode=pics&path=images/uphotos');
		$turl7 = seturl('t=cpbackupsave&mode=pics&path=images/catfiles');
		$button .= $this->createButton('Images', array('Small'=>$turl1,
													   'Medium'=>$turl2,
													   'Large'=>$turl3,
													   'Root'=>$turl4,
													   'Thumb'=>$turl5,
													   'Uphotos'=>$turl6,
													   'Category'=>$turl7,
		                                               ));															  
		if ($this->isDemoUser()) {}											   
		else {
		$turl1 = seturl('t=cpbackupsave&mode=system&cp=cp');													  
		$turl2 = seturl('t=cpbackupsave&mode=system&cp=cp/html/metro');
		$turl3 = seturl('t=cpbackupsave&mode=system&cp=cp/transactions');		
		$button .= $this->createButton('System', array('Root'=>$turl1,
													   'Dashboard'=>$turl2,
													   'Transactions'=>$turl3,
		                                               ),'warning');
		}
		return ($button);
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
				$links .= '<li><a href="'.$url.'" target="_blank">'.$n.'</a></li>';
			$lnk = '<ul class="dropdown-menu">'.$links.'</ul>';
		} 
		
		$ret = '
			<div class="btn-group">
                <button data-toggle="dropdown" class="btn '.$size.'btn-'.$type.' dropdown-toggle">'.$name.' <span class="caret"></span></button>
                '.$lnk.'
            </div>'; 
			
		return ($ret);
	}

	protected function window($buttons, $content) {
		$ret = '	
		    <div class="row-fluid">
                <div class="span12">
                  <div class="widget red">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i> Downloads</h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                               <a href="javascript:;" class="icon-remove"></a>
                           </span>
                        </div>
                        <div class="widget-body">
							<div class="btn-toolbar">
							'.$buttons .'
							<hr/><div id="bdetails"></div>
							</div>
							'.$content.'
                        </div>
                  </div>
                </div>
            </div>
';
		return ($ret);
	}	

    protected function bytesToSize1024($bytes, $precision = 2) {
        $unit = array('B','KB','MB','GB');
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
    } 	
	
	protected function downloadReport($id) {
		$db = GetGlobal('db');
		$sSQL = "select name, stamp, file_path, hash, file_created from fsbackup where id=".$id;
		//echo $sSQL;
		$res = $db->Execute($sSQL);
		if ($res) {
			
			$url = paramload('SHELL', 'urlname');
			
			$out .= "<br/>File name:" . "<a href=\"".$url.$res->fields[2]."\">".$res->fields[0]."</a>";;
			$out .= "<br/>File stamp:" . $res->fields[1];
			$out .= "<br/>File path:" . $this->bytesToSize1024(filesize($this->urlpath.$res->fields[2]));
			$out .= "<br/>File size:" . $res->fields[2];
			$out .= "<br/>File hash:" . $res->fields[3];
			$out .= "<br/>Created at:" . $res->fields[4];
			return ($out);
		}
		
		return false;
	}
	
	protected function savefsBackup($name, $file_path) {
		$db = GetGlobal('db');
		if ((!$file_path) || (!$name)) return false;
		$acct = $this->owner ? $this->owner : 'system';
		$current = array('file_hash' => hash_file("sha1", $file_path), 'file_created' => date("Y-m-d H:i:s", filemtime($file_path)));
		
		$sfpath = str_replace($this->urlpath, '', str_replace('//','/',$file_path)); //hide root and '//'
		$res = $db->Execute("INSERT INTO fsbackup SET `stamp` = '" . date('Y-m-d h:i:s') . "', `name` = '$name', `file_path` = '$sfpath', `hash` = '" . $current['file_hash'] . "', `file_created` = '" . $current['file_created'] . "', `acct` = '$acct'");
		
		return ($res);
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