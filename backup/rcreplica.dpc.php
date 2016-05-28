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
$__EVENTS['RCREPLICA_DPC'][5]='cpdorepall';

$__ACTIONS['RCREPLICA_DPC'][0]='cpreplica';
$__ACTIONS['RCREPLICA_DPC'][1]='cpreplfile';
$__ACTIONS['RCREPLICA_DPC'][2]='cpreplsql';
$__ACTIONS['RCREPLICA_DPC'][3]='cpdorepfile';
$__ACTIONS['RCREPLICA_DPC'][4]='cpdorepsql';
$__ACTIONS['RCREPLICA_DPC'][5]='cpdorepall';

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
		
	function __construct() {
	
		$this->path = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');
		$this->title = localize('RCREPLICA_DPC',getlocal());	 
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); 		  
	}
	
    function event($event=null) {
	
	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;		 
	
	   switch ($event) {

		 case 'cpdorepall'   : break;
	   
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
		$button .= $this->createButton('Actions', array('Run (today)'=>$turl1,
														'Run (week)'=>$turl2,
														'Run (month)'=>$turl3,
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

		$xsSQL = "SELECT * FROM (SELECT i.id,i.fid,i.time,i.date,i.execdate,i.status,i.sqlres,i.sqlquery,i.reference FROM syncsql i where i.reference='system' AND i.reference NOT LIKE 'replication' AND i.sqlquery NOT LIKE '%cron%') x";
		//echo $xsSQL;

		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+id|".localize('id',getlocal())."|2|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+date|".localize('_date',getlocal())."|link|3|"."javascript:sqldetails({id});".'||');			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+execdate|".localize('_xdate',getlocal())."|3|0|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+status|".localize('_status',getlocal())."|1|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+sqlquery|".localize('_query',getlocal())."|25|1|");
	    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+sqlres|".localize('_sqlres',getlocal())."|2|0|");			
	    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+reference|".localize('_ref',getlocal())."|2|0|");
		
		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid2+syncsql+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}	
			
	protected function scanReport($acc=null, $daysback=null, $minsback=null, $reportout=false, $date=null) {
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

	
	
	protected function writeLog($data = '') {
		if (empty($data)) return;

		$data = date('d-m-Y H:i:s')."\r\n" . $data . "\r\n----\r\n";
		$ret = file_put_contents($this->path . 'scanner.log', $data, FILE_APPEND | LOCK_EX);
		
		return $ret;
	}	
};
}
?>