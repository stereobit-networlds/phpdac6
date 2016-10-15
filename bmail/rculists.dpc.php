<?php

$__DPCSEC['RCULISTS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCULISTS_DPC")) && (seclevel('RCULISTS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCULISTS_DPC",true);

$__DPC['RCULISTS_DPC'] = 'rculists';

$__EVENTS['RCULISTS_DPC'][0]='cpulists';
$__EVENTS['RCULISTS_DPC'][1]='cpulframe';
$__EVENTS['RCULISTS_DPC'][2]='cpsubscribe';
$__EVENTS['RCULISTS_DPC'][3]='cpunsubscribe';
$__EVENTS['RCULISTS_DPC'][4]='cpadvsubscribe';
$__EVENTS['RCULISTS_DPC'][5]='cploadframe';
$__EVENTS['RCULISTS_DPC'][6]='cpmailbodyshow';
$__EVENTS['RCULISTS_DPC'][7]='cpviewsubsqueueactiv';
$__EVENTS['RCULISTS_DPC'][8]='cpactivatequeuerec';
$__EVENTS['RCULISTS_DPC'][9]='cpdeactivatequeuerec';
$__EVENTS['RCULISTS_DPC'][10]='cpviewtrace';
$__EVENTS['RCULISTS_DPC'][11]='cpviewclicks';

$__ACTIONS['RCULISTS_DPC'][0]='cpulists';
$__ACTIONS['RCULISTS_DPC'][1]='cpulframe';
$__ACTIONS['RCULISTS_DPC'][2]='cpsubscribe';
$__ACTIONS['RCULISTS_DPC'][3]='cpunsubscribe';
$__ACTIONS['RCULISTS_DPC'][4]='cpadvsubscribe';
$__ACTIONS['RCULISTS_DPC'][5]='cploadframe';
$__ACTIONS['RCULISTS_DPC'][6]='cpmailbodyshow';
$__ACTIONS['RCULISTS_DPC'][7]='cpviewsubsqueueactiv';
$__ACTIONS['RCULISTS_DPC'][8]='cpactivatequeuerec';
$__ACTIONS['RCULISTS_DPC'][9]='cpdeactivatequeuerec';
$__ACTIONS['RCULISTS_DPC'][10]='cpviewtrace';
$__ACTIONS['RCULISTS_DPC'][11]='cpviewclicks';

$__DPCATTR['RCULISTS_DPC']['cpulists'] = 'cpulists,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCULISTS_DPC'][0]='RCULISTS_DPC;Queue;Αποστολές';
$__LOCALE['RCULISTS_DPC'][1]='_MASSSUBSCRIBE;Mass subscribe;Μαζική εγγραφή συνδρομητών';
$__LOCALE['RCULISTS_DPC'][2]='_MAILCAMPAIGNS;Mail campaigns;Αποστολές σε συνδρομητές';
$__LOCALE['RCULISTS_DPC'][3]='_active;Active;Ενεργό';
$__LOCALE['RCULISTS_DPC'][4]='_sender;Sender;Αποστολέας';
$__LOCALE['RCULISTS_DPC'][5]='_receiver;Receiver;Παραλήπτης';
$__LOCALE['RCULISTS_DPC'][6]='_reply;Views;Εμφανίσεις';
$__LOCALE['RCULISTS_DPC'][7]='_subject;Subject;Θέμα';
$__LOCALE['RCULISTS_DPC'][8]='_id;Id;Α/Α';
$__LOCALE['RCULISTS_DPC'][9]='_MAILQUEUE;Mail list;Λίστα αποστολών';
$__LOCALE['RCULISTS_DPC'][10]='_status;Status;Κατάσταση';
$__LOCALE['RCULISTS_DPC'][11]='_cid;Campaign;Καμπάνια';
$__LOCALE['RCULISTS_DPC'][12]='_MAILCLICKS;Responses;Ανταπόκριση';
$__LOCALE['RCULISTS_DPC'][13]='_MAILTRACE;Actions;Ενέργειες';
$__LOCALE['RCULISTS_DPC'][14]='_code;Item;Κωδικός';
$__LOCALE['RCULISTS_DPC'][15]='_category;Category;Κατηγορία';
$__LOCALE['RCULISTS_DPC'][16]='_mailstatus;Reason;Αιτία';

class rculists  {

    var $title, $urlpath, $path, $seclevid, $userDemoIds;
	var $savehtmlpath;

	public function __construct() {
		$GRX = GetGlobal('GRX');
		$this->title = localize('RCULISTS_DPC',getlocal());
		$this->prpath = paramload('SHELL','prpath'); 
		$this->urlpath = paramload('SHELL','urlpath');	
		
		$tmplsavepath = remote_paramload('RCBULKMAIL','tmplsavepath', $this->prpath);
		$savepath = $tmplsavepath ? $tmplsavepath : null;//$defaultsavepath;
		$this->savehtmlpath = $savepath ? $this->urlpath . $savepath : null;		
		
		$this->seclevid = GetSessionParam('ADMINSecID');
		$this->userDemoIds = array(5,6,7); //remote_arrayload('RCBULKMAIL','demouser', $this->prpath);		
	}

    public function event($event=null) {

		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;

		switch ($event) {	

			case 'cpsubscribe'    		: 	$this->dosubscribe();
											$this->mass_subscribe();				
											break;
									
		    case 'cpunsubscribe'  		: 	$this->dounsubscribe();				
											break;										
			case 'cpadvsubscribe' 		: 	break; 					
			case 'cpviewclicks'         :	break;
	        case 'cpviewtrace'          :   break;			
			 
	        case 'cpmailbodyshow' 		: 	die($this->show_mailbody());
											break;			
			
		    case 'cploadframe'    		:  	echo $this->loadframe('tracebody');
											die();
											break;			
			
			case 'cpulframe' 		 	:   echo $this->loadtrace('tracebody');
											die();
											break;

			case 'cpviewsubsqueueactiv' :   break;			
			
			case 'cpactivatequeuerec'   :	$this->activate_queue_rec(); //ajax call
											die('tracebody|<h1>Enabled</h1>');
											break;
									   
			case 'cpdeactivatequeuerec' :	$this->deactivate_queue_rec(); //ajax call
											die('tracebody|<h1>Disabled</h1>');
											break;				
			
			case 'cpulists'  :
			default          :                    
		}
    }

    public function action($action=null) {
		
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;	

		switch ($action) {
			
			case 'cpunsubscribe'       :	 
			case 'cpsubscribe'         :			 
		    case 'cpadvsubscribe' 	   : $out = $this->subscribeform(); 
										 break;	
										 
		    case 'cpviewclicks'  	   : $out = $this->viewClicks(); 				
	                                     break;			 
			
			case 'cpviewtrace'         : $out = $this->viewTrace($_GET['m'], $_GET['cid']);
                                         break; 											 
			
			case 'cpmailbodyshow'      :
			case 'cploadframe'         : 
			case 'cpulframe' 		   : break;
			
			case 'cpviewsubsqueueactiv': $out = $this->viewMails(1); 
			                             break;				
			case 'cpactivatequeuerec'  :
			case 'cpdeactivatequeuerec':			
			case 'cpulists'  		   :
			default          		   : $out = $this->viewMails();
		}

		return ($out);
    }

	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}	
	
	protected function viewClicks() {
		$db = GetGlobal('db');	
		$active = $active ? $active : GetReq('active');
		$isajax_window = GetReq('ajax') ? GetReq('ajax') : null;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;	

		$refsql = $cid ? "and ref='$cid'" : null;
		$ownerSQL = ($this->seclevid==9) ? null : 'and mailcamp.owner=' . $db->qstr($this->owner); 		
		   	
		if (/*(!$active) && (!$isajax_window) &&*/ (defined('MYGRID_DPC'))) {
		    $title = str_replace(' ','_',localize('_MAILCLICKS',getlocal()));
		   
			$sSQL = "select * from (SELECT stats.id,date,tid,attr1,attr3,title FROM stats,mailcamp where stats.ref=mailcamp.cid $refsql $ownerSQL order by date desc";
            $sSQL.= ') as o';  				

		    _m("mygrid.column use grid9+id|".localize('_id',getlocal())."|5|1|");
			_m("mygrid.column use grid9+date|".localize('_date',getlocal()).'|10|1');		   
            _m("mygrid.column use grid9+attr3|".localize('_receiver',getlocal()).'|10|1');
            _m("mygrid.column use grid9+title|".localize('_campaign',getlocal()).'|20|1');	
			_m("mygrid.column use grid9+tid|".localize('_code',getlocal()).'|10|1');
            _m("mygrid.column use grid9+attr1|".localize('_category',getlocal()).'|20|1');			

		    $out .= _m("mygrid.grid use grid9+mailqueue+$sSQL+r+$title+id+1+1+11+260++0+1+1");
			
			//mail body ajax renderer
			//$out = "<div id='mailbody'></div>";
		}
        else  
			$out = null;
   		
	    return ($out);	
	}	
	
	//not used
	protected function loadclicks($ajaxdiv=null) {
	    $bodyurl = seturl("t=cpviewclicks&m=".GetReq('m')."&cid=".GetReq('cid'));
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"350px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv.'|'.$frame;
		else
			return ($frame);
	}		
	
	protected function viewTrace($mail=null, $cid=null) {
		if (!$mail) return null;
		$email = urldecode($mail);

		if (defined('MYGRID_DPC')) {
		    $title = str_replace(' ','_',localize('_MAILTRACE',getlocal()));
		   
			if ($cid) $cID = " and ref='$cid'";		   
	        $sSQL = "select * from (select id,date,tid,attr1 from stats where attr3='$email' $cID order by id";
            $sSQL.= ') as o';  				

		    _m("mygrid.column use grid9+id|".localize('_id',getlocal())."|5|1|");
			_m("mygrid.column use grid9+date|".localize('_date',getlocal()).'|date|5');				
            _m("mygrid.column use grid9+tid|".localize('_code',getlocal()).'|10|1');
            _m("mygrid.column use grid9+attr1|".localize('_category',getlocal()).'|30|1');			
			
			//view body ajax renderer
			$out .= "<div id='clickbody'></div>";			
			
		    $out .= _m("mygrid.grid use grid9+mailqueue+$sSQL+r+$title+id+1+1+11+260++1+1+1");
		}
        else  
			$out = null;
   		
	    return ($out);	
	}		

	protected function loadtrace($ajaxdiv=null) {
	    $bodyurl = seturl("t=cpviewtrace&m=".GetReq('m')."&cid=".GetReq('cid'));
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"350px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv.'|'.$frame;
		else
			return ($frame);
	}	
	
	protected function viewMails($active=null) {
		$active = $active ? $active : GetReq('active');
		$isajax_window = GetReq('ajax') ? GetReq('ajax') : null;
		   	
		if (defined('MYGRID_DPC')) {
		    $title = str_replace(' ','_',localize('_MAILQUEUE',getlocal()));
		   
	        $sSQL = "select * from (select id,active,timeout,receiver,subject,reply,status,mailstatus,cid from mailqueue";
            $sSQL.= ') as o';  				
		   		   
		    _m("mygrid.column use grid9+id|".localize('_id',getlocal())."|2|1|");
		    _m("mygrid.column use grid9+active|".localize('_active',getlocal()).'|link|2|'."javascript:disable({id});".'||');			
            _m("mygrid.column use grid9+timeout|".localize('_date',getlocal())."|link|5|"."javascript:enable({id});".'||'); //.'|date|1');				
			_m("mygrid.column use grid9+receiver|".localize('_receiver',getlocal())."|link|5|". "javascript:show_trace(\"{receiver}\",\"{cid}\");".'||'); //seturl('t=cpviewtrace&m={receiver}&cid={cid}').'||');	   
			_m("mygrid.column use grid9+subject|".localize('_subject',getlocal())."|link|15|"."javascript:show_body(\"{cid}\");".'||'); //.seturl('t=cpactivatequeuerec&rec={id}').'||');	
		    _m("mygrid.column use grid9+reply|".localize('_reply',getlocal()).'|2|1|||||right');	
		    _m("mygrid.column use grid9+status|".localize('_status',getlocal()).'|2|1|||||right');
		    _m("mygrid.column use grid9+mailstatus|".localize('_mailstatus',getlocal()).'|2|1');	
            _m("mygrid.column use grid9+cid|".localize('_cid',getlocal())."|link|5|"); 
			
			//trace/mail body ajax renderer
			$out = "<div id='tracebody'></div>";			
			
		    $out .= _m("mygrid.grid use grid9+mailqueue+$sSQL+r+$title+id+1+1+16+400++0+1+1");
			
			//mail body ajax renderer
			//$out .= "<div id='mailbody'></div>";
		}
        else  
			$out = null;
   		
	    return ($out);	
	}		
	
	protected function loadframe($ajaxdiv=null) {
	    $bodyurl = seturl("t=cpmailbodyshow&id=".GetReq('id'));
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"350px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv.'|'.$frame;
		else
			return ($frame);
	}	
	
    protected function show_mailbody() {
		$db = GetGlobal('db'); 	
		$cid = GetReq('id');
	    /* DISABLED HTML DB
		$sSQL = "select body from mailqueue where id=".$cid;
		$result = $db->Execute($sSQL);
        $htmlbody = $result->fields['body'];
		*/
		
		//$htmlbody = @file_get_contents($this->savehtmlpath .'/'. $cid . '.html');
		
        if (!$cid) die("CID error");
		
		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'owner=' . $db->qstr($this->owner);
        $cidSQL = $ownerSQL ? 'and cid='.$db->qstr($cid) : 'cid='.$db->qstr($cid);	
		
		$sSQL = 'select body from mailcamp where '. $ownerSQL . $cidSQL;
        //echo $sSQL;		
		
		$result = $db->Execute($sSQL,2);
		$htmlbody = base64_decode($result->fields[0]); 		

		return ($htmlbody);	  
    }

	protected function deactivate_queue_rec() {
         $db = GetGlobal('db');
         $rec = GetReq('rec'); 
	   	   
	     $sSQL = "update mailqueue set active=0,mailstatus='USER_CANCEL' where id=" . $rec;	  
	     $res = $db->Execute($sSQL,1);	
	}	

	protected function activate_queue_rec() {
         $db = GetGlobal('db');
         $rec = GetReq('rec'); 
	   	   
	     $sSQL = "update mailqueue set active=1,mailstatus='USER_ACTIV' where id=" . $rec;
	     $res = $db->Execute($sSQL,1);	
	}	


	public function postSubmit($action, $title=null, $class=null) {
		if (!$action) return;
		$submit = $title ? $title : 'Submit';
		$cl = $class ? "class=\"$class\"" : null;
		 
        $c .= "<button type=\"submit\" name=\"submit\" value=\"" . $submit . "\" $cl />";  
        $c .= "<INPUT type=\"hidden\" name=\"FormName\" value=\"MailBulkInsert\" />";		   
        $c .= "<INPUT type=\"hidden\" name=\"FormAction\" value=\"" . $action . "\" $cl />";
        return ($c);   		   
	}	
	
    protected function subscribeform()  { 		
	    if ($this->isDemoUser())  //deny list from demo users
			$out = "[List view kept hidden]";
		else {	
			//$out .= $this->ulistform(GetParam('ulistname'));
			$bodyurl = 'cpsubscribers.php?t=cpsubsframe';; 
			$out = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"320px\"><p>Your browser does not support iframes</p></iframe>";      
		}	
        return ($out);
    }		

	protected function dosubscribe($mail=null,$name=null) {
        $db = GetGlobal('db');
        $sFormErr = GetGlobal('sFormErr');	
        $name = $name ? $name : 'unknown'; 		
	    $ret = false;
	    $mail = $mail ? $mail : GetParam('submail');
		if (!$mail) return false;
	   
        $dtime = date('Y-m-d h:i:s');		
	
		//when a new name of a list keep the new name else selected ulist else default
		$ulistname = GetParam('ulistname') ? GetParam('ulistname') : (GetParam('ulist') ? GetParam('ulist') : 'default');

		if ($this->_checkmail($mail))  {
			$sSQL = "SELECT email,active FROM ulists where email=". $db->qstr($mail) . 
			        " and listname=" . $db->qstr($ulistname); 
			$ret = $db->Execute($sSQL,2);
				
            if (empty($ret->fields[0])) {
				
				$sSQL = "insert into ulists (email,startdate,active,lid,listname,name,owner) " .
						"values (" .
						$db->qstr(strtolower($mail)) . "," . $db->qstr($dtime) . "," .
						"1,1," . 
						$db->qstr(strtolower($ulistname)) . "," .
						$db->qstr($name) . "," .
						$db->qstr($this->owner) . 
						")";  
				$db->Execute($sSQL,1);		    
				$ret = true;					
            }
			else {
				//update (as is active or inactive)
			}	
		}
		else 
		    SetGlobal('sFormErr', localize('_MSG5',getlocal()));
	   
	    return $ret;	   	
	}

	protected function dounsubscribe($mail=null) {
        $db = GetGlobal('db');
        $sFormErr = GetGlobal('sFormErr');	
	    $mail = $mail ? $mail : GetParam('submail');
		$ulistname = GetParam('ulistname') ? GetParam('ulistname') : 'default';		
		if (!$mail) return false;  
		
		if ($this->_checkmail($mail))  {

			$sSQL = "update ulists set active=0 where email=" . $db->qstr($mail) . ' and listname=' . $db->qstr($ulistname); 
			$result = $db->Execute($sSQL,1);
		    //echo $sSQL;
			return true;
		}	
				
        return false;		
	}	
	
	protected function subscribe_extracting_name($token=null) {
        $db = GetGlobal('db'); 
		if (!$token) return;	
		$matches = array();
					
	    //method 1 name <mail>
	    $pattern = "@<(.*?)>@";
	    preg_match($pattern,$token,$matches);
	    $extracted_mail = trim(strtolower($matches[1]));

		if ($this->_checkmail($extracted_mail)) {	  
		  if ($name = str_replace($extracted_mail,'',$token)) {
		    //echo $name,'<br>'
		    $name = str_replace('"','',$name);
		    $name = str_replace("'",'',$name);
		    $name = str_replace('<>','',$name);			
		  }
		  $s = $this->dosubscribe($extracted_mail,$name);
		  return ($s);	   
	    }
		else { //method 2 name [mail]
	      $pattern2 = "@[(.*?)]@";
	      preg_match($pattern2,$token,$matches);
	      //print_r($matches);
	      $extracted_mail = trim(strtolower($matches[1]));
		 
		  if ($this->_checkmail($extracted_mail)) {	  
		    if ($name = str_replace($extracted_mail,'',$token)) {		
		      $name = str_replace('"','',$name);
			  $name = str_replace("'",'',$name);
		      $name = str_replace('[]','',$name);			
		    }
		    $s = $this->dosubscribe($extracted_mail,$name);
		    return ($s);		   			   
	      }
		  else { //method 3 name mail
		    $mytokens = explode(' ',$token);
		    $name = trim($mytokens[0]);
		    $extracted_mail = trim(strtolower($mytokens[1])); 
		  
		    if ($this->_checkmail($extracted_mail)) {		
		      if ($name = str_replace($extracted_mail,'',$token)) {
		        $name = str_replace('"','',$name);
			    $name = str_replace("'",'',$name);
			  }	
		      $s = $this->dosubscribe($extracted_mail,$name);
		      return ($s);	   
			}  
	      }		  
		}

        return false;
	}		
	
	protected function mass_subscribe() {
	  //print_r($_POST);
	  $mailtext = GetParam('csvmails');	  
	  $separator = GetParam('separator') ? GetParam('separator') : ',';
	  if (!$mailtext) return;
	  
	  $mymails = explode($separator,$mailtext);
	  //print_r($mymails);
	  $x=0; $x2=0;
	  $n=0;
	  $e=0;
	  set_time_limit(120);
	  foreach ($mymails as $i=>$tok) {
	    if ($doit = $this->dosubscribe(trim(strtolower($tok)))) {//is a mail address...
		  if ($doit>0) 
		    $x+=1;
		  elseif ($doit<0) 
		    $x2+=1;
		}  
		else {//..is a combo mail/name
		
		  $doit_2 = $this->subscribe_extracting_name($tok);
		  
		  if ($doit_2) {
		    $n+=1;
		    if ($doit_2>0) 
		      $x+=1;
		    elseif ($doit_2<0)
		      $x2+=1;			
			else
			  $e+=1;    
		  }
		  else		
		    $e+=1; 
	    }	
	  }
	  set_time_limit(ini_get('max_execution_time'));
	  
	  $msg = $x . ' mails added, ';
	  $msg .= $x2 . ' mails updated from ' . count($mymails) . ', ';	  
	  $msg .= $n . ' names extracted,';	  
	  $msg .= $e . ' tokens not recognized.';	  
	  
	  SetGlobal('sFormErr', $msg);	  
	  	
	}	

	public function viewUList($exclude_selected=false) {
		$db = GetGlobal('db');
		
		$sSQL = 'select distinct listname from ulists ';		   
		if ($exclude_selected)
			$sSQL .= " where listname <> " . $db->qstr($this->ulistselect);	
		$sSQL .= " ORDER BY listname";	

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			$ret  .= "<option value='".$rec[0]."'>". $rec[0]."</option>" ;
        }		
        
		return ($ret);			
	}	



    protected function _checkmail($data) {

		if( !eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" . "@([a-z0-9]+([\.-][a-z0-9]{1,})+)*$", $data, $regs) )  
			return false;

		return true;  
	}	

};
}
?>