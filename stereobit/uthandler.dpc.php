<?php
$__DPCSEC['UTHANDLER_DPC']='1;1;1;1;1;1;2;2;9';

if ( (!defined("UTHANDLER_DPC")) && (seclevel('UTHANDLER_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("UTHANDLER_DPC",true);

$__DPC['UTHANDLER_DPC'] = 'uthandler';

$z = GetGlobal('controller')->require_dpc('nitobi/nhandler.lib.php');
require_once($z);

//$e = GetGlobal('controller')->require_dpc('nitobi/nitobi.xml.php');
//require_once($e);

$__EVENTS['UTHANDLER_DPC'][0]='uthandler';
$__EVENTS['UTHANDLER_DPC'][1]='utgetutasks';
$__EVENTS['UTHANDLER_DPC'][2]='utsetutasks';


$__ACTIONS['UTHANDLER_DPC'][0]='uthandler';
$__ACTIONS['UTHANDLER_DPC'][1]='utgetutasks';
$__ACTIONS['UTHANDLER_DPC'][2]='utsetutasks';


class uthandler extends nhandler  {

    var $debug_sql;
	var $encoding;

    function uthandler() {
	
	  nhandler::nhandler(17,'id','Asc');

      $this->debug_sql = true;
	  $this->encoding = 'UTF-8';
	  $this->path = paramload('SHELL','prpath');
    }
	
	function event($event=null) {
	
	  switch ($event) {
	  
	    case 'utsetutasks':$this->save_user_tasks(); break;

        case 'utgetutasks':
		default       :switch (GetReq('mode')) { 
	                     case 'endup'   : $this->sortColumn = 'taskend'; 
		                    break;		   
	                     case 'enddown' : $this->sortColumn = 'taskend';
		                    break;								
	                     case 'startup' : $this->sortColumn = 'taskstart';
		                    break;	   
	                     case 'startdown' :$this->sortColumn = 'taskstart';
		                     break;		
		                 default : $this->sortColumn = 'tdate';
					   }
			           $this->sortDirection= 'Desc';
	                   $this->get_user_tasks(GetReq('mode'));
		               break;	  
	  }
	}
	
	function action($action=null) {
	
      //none
	}
	
	
	function get_user_tasks($mode=null) {
       $db = GetGlobal('db');
       $filter = GetReq('filter');
       $date_now = date('Y-m-d H:i:s');	   

	   $whereClause='';

	   if (!isset($_GET['all'])) {
	     if (isset($_GET['tindex'])) {
		   $whereClause=" WHERE tindex=".$_GET["tindex"]." ";
	     }
	     else
	       $whereClause=" WHERE tindex=-1";//fetch nothing
	   }
	   elseif ($filter) {
             $whereClause = " where (taskname like '%$filter%')";
       }
       else {
	     $whereClause = " where";//taskuser='".$taskuser."' and ";
	     switch ($mode) {
	       case 'endup'   : $whereClause .= " taskend>='".$date_now."'"; 
		                    break;		   
	       case 'enddown' : $whereClause .= " taskend<='".$date_now."'"; 
		                    break;								
	       case 'startup' : $whereClause .= " taskstart>='".$date_now."'"; 
		                    break;	   
	       case 'startdown' :$whereClause .= " taskstart<='".$date_now."'";
		                     break;
		   default          : $whereClause = null;
	     }	   
	   }	 
		 
	   //$sSQL .= "select tid,tindex,taskdate,taskstart,taskend,taskname,taskhtml,hasinvoice,reqreply,hasapp,hassubscribers,subscribers from utasks ";
         $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
         $sSQL.= "invname,invlist,mustpay,iscartproduct,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,gotopriority,hasschedule,schtype,schtimes,schcount,";
         $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,instantdnload,ispublicdir,isuserdir,hasuseterms,tactive,tstatus,treply,";
           $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";	   
	   $sSQL .= $whereClause;
	   $sSQL .= " ORDER BY " . $this->sortColumn . " " . $this->sortDirection ." LIMIT ". $this->ordinalStart .",". ($this->pageSize) .";"; //let sort by browser???
       //echo $sSQL;
	   //die($whereClause);
	   
	   if ($f = fopen($this->path."/uthandler.txt",'w+')) {
	       fwrite($f,$sSQL,strlen($sSQL));
		   fclose($f);
	   }			   
       $result = $db->Execute($sSQL,2);
	   
      /*if (defined(_ADODB_))
	    $nrows = $db->Affected_Rows();
	  else
	    $nrows = $db->num_Rows($db);	   
	   echo '>'.$nrows;*/	   
	   //print_r($result->fields); die();
	   //$names = array('tid','tindex','taskdate','taskstart','taskend','taskname','taskhtml','hasinvoice','reqreply','hasapp','hassubscribers','subscribers');
       $names= array('tid','tdate','taskdate','taskstart','iscritical','criticalval','taskend','taskuser','taskname','tasktext','taskhtml','taskattach','hasinvoice','invcost','invitems','invitemsqty','invname','invlist','mustpay','iscartproduct','reqreply','reqttl','reqname','reqlist','hasapp','appname','applist','gotopriority','hasschedule','schtype','schtimes','schcount','hasinform','inftype','inftimes','infcount','hassubscribers','subscribers','hasdbsubs','hasremotefiles','remotefiles','nomos','instantdnload','ispublicdir','isuserdir','hasuseterms','tactive','tstatus','treply','tindex','tcustdata','tparams','tmz');         	   
	   $this->handle_output($db,$result,$names,'tid',null,$this->encoding);	   	
    } 
	
	function save_user_tasks() {
       $db = GetGlobal('db');		
	
	   //remove p_id=auto_inc field to insert a new rec
	   //no update after insert, if update done without refresh (id=null problem)
	   //$names = array('tid','tindex','taskdate','taskstart','taskend','taskname','taskhtml','hasinvoice','reqreply','hasapp','hassubscribers','subscribers');		 		   
       $names= array('tid','tdate','taskdate','taskstart','iscritical','criticalval','taskend','taskuser','taskname','tasktext','taskhtml','taskattach','hasinvoice','invcost','invitems','invitemsqty','invname','invlist','mustpay','iscartproduct','reqreply','reqttl','reqname','reqlist','hasapp','appname','applist','gotopriority','hasschedule','schtype','schtimes','schcount','hasinform','inftype','inftimes','infcount','hassubscribers','subscribers','hasdbsubs','hasremotefiles','remotefiles','nomos','instantdnload','ispublicdir','isuserdir','hasuseterms','tactive','tstatus','treply','tindex','tcustdata','tparams','tmz');         	   
			 
	   $sql2run = $this->handle_input(null,'utasks',$names,'tid');		
	
       $db->Execute($sql2run,3,null,1);
	   
	   if (($this->debug_sql) && ($f = fopen($this->path . "nitobi.sql",'w+'))) {
	     fwrite($f,$sql2run,strlen($sql2run));
		 fclose($f);
	   }	
	}	
};
}
?>