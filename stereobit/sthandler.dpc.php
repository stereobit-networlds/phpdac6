<?php
$__DPCSEC['STHANDLER_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("STHANDLER_DPC")) && (seclevel('STHANDLER_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("STHANDLER_DPC",true);

$__DPC['STHANDLER_DPC'] = 'sthandler';

$z = GetGlobal('controller')->require_dpc('stereobit/uthandler.dpc.php');
require_once($z);


GetGlobal('controller')->get_parent('UTHANDLER_DPC','STHANDLER_DPC');

$__EVENTS['STHANDLER_DPC'][0]='sthandler';
$__EVENTS['STHANDLER_DPC'][10]='stugetree';

$__ACTIONS['STHANDLER_DPC'][0]='sthandler';
$__ACTIONS['STHANDLER_DPC'][10]='stugettree';

$__DPCATTR['STHANDLER_DPC']['sthandler'] = 'sthandler,1,0,0,0,0,0,0,0,0,0,0,1';


class sthandler extends uthandler {

    var $title;
	var $carr;
	var $msg;
	var $path;
	var $user;

	function sthandler() {
	
	  uthandler::uthandler();
	  //$this->encoding = 'UTF-8';	
	}


	/*function event($event=null) {
	
      uthandler::event($event);
	}*/	
	
	//override
	function event($event=null) {
	
	  	  //$key = GetReq('key');
		  //if (!$key) die();
	
       if ($key=GetReq('key')) {
	     //echo $key;
		 //if (!stristr('~',$key)) die("You are not a valid user! Please contact your network administrator!");	     
		 $pk = explode('~',$key);
		 $this->user = $pk[0];
		 //SetGlobal('UserName',$this->user);//???????
         //$username = GetGlobal('controller')->calldpc_method('shlogin.login_with_key use '.$key.'+email+1');
		 //$this->taskid = GetReq('taskid');		 
		 //$this->isreply = true;
	   }
	   else
	     die();
	   
	   //echo GetGlobal('UserName');
	   
	  //if ((GetGlobal('UserName')) || ($_COOKIE["cuser"])) {
	
	    switch ($event) {
		
          case 'stugettree':$this->sortColumn = 'taskstart';
		                    $this->sortDirection= 'Asc';
	                        $this->get_user_tree();		
                            break;
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
		                 default : $this->sortColumn = 'taskstart';
					   }
		               //$this->sortColumn = 'taskstart'; //<<<<view when start
			           $this->sortDirection= 'Desc';//'Asc';
	                   $this->get_user_tasks(GetReq('mode'),GetReq('localtime'),GetReq('actives'));
		               break;	  
	    }
	  //}
	  //else die(); 
	}	
	
	//override
	function get_user_tasks($mode=null,$localtime=null,$activetasks=null) {
       $db = GetGlobal('db');
       $filter = GetReq('filter');
	   $taskuser = $this->user;//decode(GetReq('key'));//GetReq('tuser')?GetReq('tuser'):'balexiou@panikidis.gr';//$this->user;
	   
	   if ($localtime) {
         date_default_timezone_set('GMT'); //btpass server time	   
	     $date_now = date('Y-m-d H:i:s',intval($localtime));
	   }	 
	   else {//default server time ....calculate local time	 
         $date_now = date('Y-m-d H:i:s');	   	    	   
	   }
	   
	   
	   $whereClause = " where taskuser='".$taskuser."' and ";
	   switch ($mode) {
	     case 'endup'   : $whereClause .= " taskend>='".$date_now."'"; 
		                    break;		   
	     case 'enddown' : $whereClause .= " taskend<='".$date_now."'"; 
		                    break;								
	     case 'startup' : $whereClause .= " taskstart>='".$date_now."'"; 
		                    break;	   
	     case 'startdown' : $whereClause .= " taskstart<='".$date_now."'";
		                    break;
		 default          : $whereClause .= " taskstart<='".$date_now."'";
	   }
	   
	   switch ($activetasks) {
	   
	      case  1 : $whereClause .= ' and tactive=1'; break;
		  case -1 : $whereClause .= ' and tactive=0'; break;
		  case  0 :
		  default : $whereClause .= null;
	   }
		 
	   //$sSQL .= "select tid,tindex,taskdate,taskstart,taskend,taskname,taskhtml,hasinvoice,reqreply,hasapp,hassubscribers,subscribers from utasks ";
         $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
         $sSQL.= "invname,invlist,mustpay,iscartproduct,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,gotopriority,hasschedule,schtype,schtimes,schcount,";
         $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,instantdnload,ispublicdir,isuserdir,hasuseterms,tactive,tstatus,treply,";
         $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";	   
	   $sSQL .= $whereClause;
	   $sSQL .= " ORDER BY " . $this->sortColumn . " " . $this->sortDirection ." LIMIT ". $this->ordinalStart .",". ($this->pageSize) .";"; //let sort by browser???
      // echo $sSQL;
	   //die($whereClause);	   
	   if ($f = fopen($this->path."/sthandler.txt",'w+')) {
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
	
	function get_user_tree() {
/*	
$ret = '  <?xml version="1.0" encoding="UTF-8" ?> 
- <root xml:lang="en" primaryfield="" fields="id|label|nodetype|haschildren">
  <e xk="2" a="2" b="Auland Islands" c="node" d="true" /> 
  <e xk="1" a="1" b="Afghanistan" c="node" d="true" /> 
  <e xk="3" a="3" b="Albania" c="node" d="true" /> 
  <e xk="4" a="4" b="Algeria" c="node" d="true" /> 
  <e xk="5" a="5" b="American Samoa" c="leaf" d="false" /> 
  <e xk="6" a="6" b="Andorra" c="node" d="true" /> 
  <e xk="7" a="7" b="Angola" c="node" d="true" /> 
  <e xk="8" a="8" b="Anguilla" c="leaf" d="false" /> 
  <e xk="9" a="9" b="Antigua and Barbuda" c="node" d="true" /> 
  <e xk="10" a="10" b="Argentina" c="node" d="true" /> 
  <e xk="11" a="11" b="Armenia" c="node" d="true" /> 
  <e xk="12" a="12" b="Aruba" c="leaf" d="false" /> 
  <e xk="13" a="13" b="Australia" c="node" d="true" /> 
  <e xk="14" a="14" b="Austria" c="leaf" d="false" /> 
  <e xk="15" a="15" b="Azerbaijan" c="node" d="true" /> 
  <e xk="16" a="16" b="Bahamas" c="node" d="true" /> 
  <e xk="17" a="17" b="Bahrain" c="node" d="true" /> 
  <e xk="18" a="18" b="Bangladesh" c="node" d="true" /> 
  <e xk="19" a="19" b="Barbados" c="node" d="true" /> 
  <e xk="20" a="20" b="Belarus" c="node" d="true" /> 
  <e xk="21" a="21" b="Belgium" c="node" d="true" /> 
  <e xk="22" a="22" b="Belize" c="node" d="true" />  
  </root>';
  die();*/	
	
       $db = GetGlobal('db');
       $filter = GetReq('filter');
	   $taskuser = $this->user;//decode(GetReq('key'));//GetReq('tuser')?GetReq('tuser'):'balexiou@panikidis.gr';//$this->user;
       $date_now = date('Y-m-d H:i:s');

	   $whereClause = " where taskuser='".$taskuser."' and ";
	   $whereClause .= " taskstart<='".$date_now."'";
		 
       $sSQL = "select tid from utasks ";	   
	   $sSQL .= $whereClause;
	   $sSQL .= " ORDER BY " . $this->sortColumn . " " . $this->sortDirection ." LIMIT ". $this->ordinalStart .",". ($this->pageSize) .";"; //let sort by browser???
      // echo $sSQL;
	   //die($whereClause);	   
	   if ($f = fopen($this->path."/sthandler.txt",'w+')) {
	       fwrite($f,$sSQL,strlen($sSQL));
		   fclose($f);
	   }	
	   	   
       $result = $db->Execute($sSQL,2);
	   
       $names= array('tid');         	   
	   $this->handle_output($db,$result,$names,'tid',null,$this->encoding);	
	}
};
}	
?>