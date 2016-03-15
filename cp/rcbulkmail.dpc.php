<?php

$__DPCSEC['RCBULKMAIL_DPC']='1;1;1;1;1;1;2;2;9';

if ( (!defined("RCBULKMAIL_DPC")) && (seclevel('RCBULKMAIL_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCBULKMAIL_DPC",true);

$__DPC['RCBULKMAIL_DPC'] = 'rcbulkmail';

$v = GetGlobal('controller')->require_dpc('crypt/ciphersaber.lib.php');
require_once($v); 

$a = GetGlobal('controller')->require_dpc('libs/appkey.lib.php');
require_once($a);


$__EVENTS['RCBULKMAIL_DPC'][0]='cpbulkmail';
$__EVENTS['RCBULKMAIL_DPC'][1]='cpunsubscribe';
$__EVENTS['RCBULKMAIL_DPC'][2]='cpsubscribe';
$__EVENTS['RCBULKMAIL_DPC'][3]='cpadvsubscribe';
$__EVENTS['RCBULKMAIL_DPC'][4]='cpviewsubsqueue';
$__EVENTS['RCBULKMAIL_DPC'][5]='cploadframe';
$__EVENTS['RCBULKMAIL_DPC'][6]='cpmailbodyshow';
$__EVENTS['RCBULKMAIL_DPC'][7]='cpviewsubsqueueactiv';
$__EVENTS['RCBULKMAIL_DPC'][8]='cpactivatequeuerec';
$__EVENTS['RCBULKMAIL_DPC'][9]='cpdeactivatequeuerec';
$__EVENTS['RCBULKMAIL_DPC'][10]='cpsavemailadv';
$__EVENTS['RCBULKMAIL_DPC'][11]='cpsubsend';
$__EVENTS['RCBULKMAIL_DPC'][12]='cpsubloadhtmlmail';
$__EVENTS['RCBULKMAIL_DPC'][13]='cpviewcamp';
$__EVENTS['RCBULKMAIL_DPC'][14]='cppreviewcamp';
$__EVENTS['RCBULKMAIL_DPC'][15]='cpmailstats';
$__EVENTS['RCBULKMAIL_DPC'][16]='cpviewclicks';

$__ACTIONS['RCBULKMAIL_DPC'][0]='cpbulkmail';
$__ACTIONS['RCBULKMAIL_DPC'][1]='cpunsubscribe';
$__ACTIONS['RCBULKMAIL_DPC'][2]='cpsubscribe';
$__ACTIONS['RCBULKMAIL_DPC'][3]='cpadvsubscribe';
$__ACTIONS['RCBULKMAIL_DPC'][4]='cpviewsubsqueue';
$__ACTIONS['RCBULKMAIL_DPC'][5]='cploadframe';
$__ACTIONS['RCBULKMAIL_DPC'][6]='cpmailbodyshow';
$__ACTIONS['RCBULKMAIL_DPC'][7]='cpviewsubsqueueactiv';
$__ACTIONS['RCBULKMAIL_DPC'][8]='cpactivatequeuerec';
$__ACTIONS['RCBULKMAIL_DPC'][9]='cpdeactivatequeuerec';
$__ACTIONS['RCBULKMAIL_DPC'][10]='cpsavemailadv';
$__ACTIONS['RCBULKMAIL_DPC'][11]='cpsubsend';
$__ACTIONS['RCBULKMAIL_DPC'][12]='cpsubloadhtmlmail';
$__ACTIONS['RCBULKMAIL_DPC'][13]='cpviewcamp';
$__ACTIONS['RCBULKMAIL_DPC'][14]='cppreviewcamp';
$__ACTIONS['RCBULKMAIL_DPC'][15]='cpmailstats';
$__ACTIONS['RCBULKMAIL_DPC'][16]='cpviewclicks';

$__LOCALE['RCBULKMAIL_DPC'][0]='RCBULKMAIL_DPC;Mail queue;Mail queue';
$__LOCALE['RCBULKMAIL_DPC'][1]='_MASSSUBSCRIBE;Mass subscribe;Μαζική εγγραφή συνδρομητών';
$__LOCALE['RCBULKMAIL_DPC'][2]='_MAILCAMPAIGNS;Mail campaigns;Αποστολές σε συνδρομητές';
$__LOCALE['RCBULKMAIL_DPC'][3]='_active;Active;Ενεργό';
$__LOCALE['RCBULKMAIL_DPC'][4]='_sender;Sender;Αποστολέας';
$__LOCALE['RCBULKMAIL_DPC'][5]='_receiver;Receiver;Παραλήπτης';
$__LOCALE['RCBULKMAIL_DPC'][6]='_reply;Views;Εμφανίσεις';
$__LOCALE['RCBULKMAIL_DPC'][7]='_subject;Subject;Θέμα';
$__LOCALE['RCBULKMAIL_DPC'][8]='_id;Id;Α/Α';
$__LOCALE['RCBULKMAIL_DPC'][9]='_HTMLSELECTEDITEMS;Selected items;Επιλεγμένα αντικείμενα';
$__LOCALE['RCBULKMAIL_DPC'][10]='_inlist;List;Σε λίστα';
$__LOCALE['RCBULKMAIL_DPC'][11]='_sendtousers;Send to Users;Αποστολή σε χρήστες';
$__LOCALE['RCBULKMAIL_DPC'][12]='_sendtolists;Send to Lists;Αποστολη σε λίστες';
$__LOCALE['RCBULKMAIL_DPC'][13]='_savenewsletter;Save Newsletter;Αποθήκευση περιεχομένου';
$__LOCALE['RCBULKMAIL_DPC'][14]='_options;Options;Ρυθμίσεις';
$__LOCALE['RCBULKMAIL_DPC'][15]='_ACTIVE;Active;Ενεργό';
$__LOCALE['RCBULKMAIL_DPC'][16]='_LISTNAME;List;Όνομα λίστας';
$__LOCALE['RCBULKMAIL_DPC'][17]='_ID;Id;Α/Α';
$__LOCALE['RCBULKMAIL_DPC'][18]='_BULKSUBSCRIBE;Bulk subscribe;Μαζική εισαγωγή';
$__LOCALE['RCBULKMAIL_DPC'][19]='_MAILQUEUE;Mail list;Λίστα αποστολών';
$__LOCALE['RCBULKMAIL_DPC'][20]='_MAILQUEUEACTIVE;Active queue;Πρός αποστολή';
$__LOCALE['RCBULKMAIL_DPC'][21]='_SELECTITEMS;Select Items;Επιλογή στοιχείων';
$__LOCALE['RCBULKMAIL_DPC'][22]='_OPTIONS;Options;Επιλογές';
$__LOCALE['RCBULKMAIL_DPC'][23]='_status;Status;Κατάσταση';
$__LOCALE['RCBULKMAIL_DPC'][24]='_mailstatus;Reason;Αιτία';
$__LOCALE['RCBULKMAIL_DPC'][25]='_date;Date sent;Ημ. αποστολής';
$__LOCALE['RCBULKMAIL_DPC'][26]='_unsubscribe;Unsubscribe;Διαγραφή απο την λίστα';
$__LOCALE['RCBULKMAIL_DPC'][27]='_viewasweb;View as web page;Πατήστε εδώ για να δείτε την ιστοσελίδα';
$__LOCALE['RCBULKMAIL_DPC'][28]='_notifications;Notifications;Ειδοποιήσεις';
$__LOCALE['RCBULKMAIL_DPC'][29]='_viewallnotifications;View all notifications;Όλες οι ειδοποιήσεις';
$__LOCALE['RCBULKMAIL_DPC'][30]='_MAILCLICKS;Responses;Ανταπόκριση';
$__LOCALE['RCBULKMAIL_DPC'][31]='_dashboard;Dashboard;Στατιστικά';
$__LOCALE['RCBULKMAIL_DPC'][32]='_year;Year;Έτος';
$__LOCALE['RCBULKMAIL_DPC'][33]='_month;Month;Μήνας';

$__LOCALE['RCBULKMAIL_DPC'][40]='_statisticscat;Category Viewed/Month;Επισκεψιμότητα κατηγοριών';
$__LOCALE['RCBULKMAIL_DPC'][41]='_statistics;Items Viewed/Month;Επισκεψιμότητα ειδών';
$__LOCALE['RCBULKMAIL_DPC'][42]='_transactions;Transaction/Month;Συναλλαγές ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][43]='_applications;Applications Birth/Month;Νεές εφαρμογές ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][44]='_appexpires;Applications Expires/Month;Ληξεις εφαρμογών ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][45]='_mailqueue;Mail send/Month;Σταλθέντα e-mail ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][46]='_mailsendok;Mail Received/Month;Παρεληφθέντα e-mail ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][47]='_income;Income;Εισόδημα';
$__LOCALE['RCBULKMAIL_DPC'][48]='_moretrans;All transactions;Όλες οι συναλλαγές';

class rcbulkmail {
	
	var $title, $prpath, $urlpath, $url, $mtrackimg;
    var $trackmail, $overwrite_encoding, $encoding, $templatepath;
	var $mailname, $mailuser, $mailpass, $mailserver;
	var $ishtml, $mailbody, $template_ext, $template_images_path, $template;
	var $ulistselect, $messages, $cid, $savehtmlpath, $savehtmlurl;
	var $stats, $cpStats, $hasgraph, $goto, $refresh, $ajaxgraph, $objcall;
	var $sendOk, $iscollection;
	
	var $appname, $appkey, $cptemplate, $urlRedir, $urlRedir2, $webview, $nsPage;
		
    function __construct() {
	  
		$this->prpath = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');	
		$this->url = paramload('SHELL','urlbase');
		$this->title = localize('RCBULKMAIL_DPC',getlocal());	

		$tcode = remote_paramload('RCBULKMAIL','trackurl', $this->prpath);
		$this->mtrackimg = $tcode ? $tcode : "http://www.stereobit.gr/mtrack.php";
		$track = remote_paramload('RCBULKMAIL','track',$this->prpath);
	    $this->trackmail = $track ? true : false;		
		
		$this->mailname = remote_paramload('RCBULKMAIL','realm',$this->prpath);
		$this->mailuser = remote_paramload('RCBULKMAIL','user',$this->prpath);
		$this->mailpass = remote_paramload('RCBULKMAIL','password',$this->prpath);
		$this->mailserver = remote_paramload('RCBULKMAIL','server',$this->prpath);	
						
		$char_set  = arrayload('SHELL','char_set');	  
		$charset  = paramload('SHELL','charset');	  		
		if (($charset=='utf-8') || ($charset=='utf8'))
			$this->encoding = 'utf-8';
		else  
			$this->encoding = $char_set[getlocal()];
		
		$this->overwrite_encoding = remote_paramload('RCBULKMAIL','encoding',$this->prpath);
        $this->templatepath = $this->urlpath . remote_paramload('RCBULKMAIL','templatepath',$this->prpath);
		$tmplext = remote_paramload('RCBULKMAIL','tmplext', $this->prpath);
		$this->template_ext = $tmplext ? $tmplext : '.html';
		$tmplsubext = remote_paramload('RCBULKMAIL','tmplsubext', $this->prpath);
		$this->template_subext = $tmplsubext ? $tmplsubext : '-sub.htm';
		
		$ipath = remote_paramload('RCBULKMAIL','tmplpathimg',$this->prpath);
	    $this->template_images_path = $this->urlpath . $ipath;		
		$this->template = GetReq('stemplate') ? GetReq('stemplate') : GetSessionParam('stemplate');
		
		$this->ulistselect = GetReq('ulistselect') ? GetReq('ulistselect') : GetSessionParam('ulistselect');
		$this->ishtml = true;
		$this->mailbody = null;
		$this->cid = $_GET['cid'] ? $_GET['cid'] : $_POST['cid'];//no gereq,getparam may cid used by campaigns is in cookies
		
        //$defaultsavepath = remote_paramload('FRONTHTMLPAGE','path', $this->prpath);
		$tmplsavepath = remote_paramload('RCBULKMAIL','tmplsavepath', $this->prpath);		
		$this->nsPage = remote_paramload('RCBULKMAIL','webview', $this->prpath);
		$this->webview = $this->nsPage ? 1 : 0;
		
		$savepath = $tmplsavepath ? $tmplsavepath : null;//$defaultsavepath;
		$this->savehtmlpath = $savepath ? $this->urlpath . $savepath : null;
		$this->savehtmlurl = $savepath ? ($this->webview ? $this->url .'/'. $this->nsPage : $this->url . $savepath) : null;

		$this->appname = paramload('ID','instancename');
		$this->appkey = new appkey();			
		
		$this->messages = array(); //reset messages any time page reload		
		$this->stats = array();
		$this->cpStats = false;			
		
		//$this->ajaxgraph = 1;
		$this->refresh = GetReq('refresh')?GetReq('refresh'):60;//0
		$this->goto = seturl('t=cp&group='.GetReq('group'));//handle graph selections with no ajax
		$this->objcall = array();
		
		$this->urlRedir = remote_paramload('RCBULKMAIL','urlredir', $this->prpath);
		$this->urlRedir2 = remote_paramload('RCBULKMAIL','urlredir2', $this->prpath);
		
		$tmpl = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->prpath);  
	    $this->cptemplate = $tmpl ? $tmpl : 'metro';		

		//$timeZone = 'Europe/Athens';  // +2 hours !!! (cron must run at the same timezone)
	}
	
    function event($event=null) {
	
	    /////////////////////////////////////////////////////////////
	    if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	
	    /////////////////////////////////////////////////////////////			
  
		if (defined('RCCOLLECTIONS_DPC')) //used by wizard html page !!
			$this->iscollection = GetGlobal('controller')->calldpc_method('rccollection.isCollection');  
			
		//set message 
		//GetGlobal('controller')->calldpc_method("rccontrolpanel.setMessage use warning|test 123|1|#");						
		$this->percentofCamps();
  
	    switch ($event) {
			
		    case 'cpchartshow'	: if ($report = GetReq('report')) {//ajax call
									$this->hasgraph = GetGlobal('controller')->calldpc_method("swfcharts.create_chart_data use $report");
									$this->goto = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report='.$report.'&statsid=');
								  }
								  break;	

            case 'cpmailstats'     : $this->_js();
			                         $this->load_graph_objects();
									 $this->runstats();		
                                     break;			
			
	        case 'cpviewcamp'      : $this->load_campaign();
			                         break;			
									 
			case 'cppreviewcamp'   : die($this->preview_campaign());
			                         break;							 
			 
			case 'cpsubloadhtmlmail': if ($this->iscollection>0)
										$this->loadTemplate2(); 					  
									  else
										$this->loadTemplate();	
									  
			                          if ($this->ulistselect = GetReq('ulistselect')) 
											SetSessionParam('ulistselect', $this->ulistselect); 
                                      break;			
			 
			case 'cpsubscribe'    : $this->dosubscribe();
		                            $this->mass_subscribe();				
	                                break;
									
		    case 'cpunsubscribe'  : $this->dounsubscribe();				
	                                break;		 
			 
			case 'cpactivatequeuerec': $this->activate_queue_rec(); 
		                               //$this->grid_javascript();
		                               break;
									   
			case 'cpdeactivatequeuerec': $this->deactivate_queue_rec(); 
		                                 //$this->grid_javascript();
		                                 break;			 
			 
	        case 'cpmailbodyshow' : die($this->show_mailbody());
		                            break; 			 
			 
		    case 'cploadframe'    : echo $this->loadframe('mailbody');
								    die();
		                            break;
									
			case 'cpadvsubscribe' : break; 									
			
			case 'cpviewclicks'        :
            case 'cpviewsubsqueueactiv':
		    case 'cpviewsubsqueue'     : 				
	                                     break;	
										 
			case "cpsubsend"      :	$this->sendOk = $this->send_mails();
									SetSessionParam('messages',$this->messages);
									$this->runstats();
				                    break; 									 
			
	        case 'cpsavemailadv'  : $this->save_campaign();
									SetSessionParam('messages',$this->messages); //save messages
			                        break;
			case 'cpbulkmail'     :
			default               :	if ($this->template) {
				                        //also when returns in cp and template is selected
										if ($this->iscollection>0)
											$this->loadTemplate2(); //subtemp						  
										else
											$this->loadTemplate();						  
			                        }	
        }
		
		//when stats run (used by timeline fun call into breadcrumb)
		$this->cpStats = $this->isStats();		
    }	

    function action($action=null)  { 

	     switch ($action) {
			 
		    case 'cpchartshow': if ($this->hasgraph) {//ajax call
		                          $out = GetGlobal('controller')->calldpc_method("swfcharts.show_chart use " . GetReq('report') ."+500+240+$this->goto");								  
								}  
							    else
							      $out = localize('_GNAVAL',0);	

							    die(GetReq('report').'|'.$out); //ajax return
								break;	

            case 'cpmailstats'         :								
			 
			case 'cppreviewcamp'       : 
			case 'cpviewcamp'          : $out = null; 
			                             break;			 
			case 'cpunsubscribe'       :	 
			case 'cpsubscribe'         :			 
		    case 'cpadvsubscribe' 	   : $out .= $this->subscribeform(); 
										 break;			 
			 
		    case 'cpviewclicks'  	   : $out = $this->viewClicks(); 				
	                                     break;			 
			 
			case 'cpactivatequeuerec'  :
			case 'cpdeactivatequeuerec':			 
		    case 'cpviewsubsqueue'	   : $out = $this->viewMails(); 				
	                                     break;

			case 'cpviewsubsqueueactiv': $out = $this->viewMails(1); 
			                             break;	
										 
			case 'cpmailbodyshow' : break; 
			case 'cploadframe'    : break; 									 
			
			case 'cpsubloadhtmlmail':
	        case 'cpsubsend'      :	
            case 'cpsavemailadv'  :			
			case 'cpbulkmail'     :
		    default               : $out .= null;
		 }			 

	     return ($out);
	}
	
	/*disabled due to js on page*/
	protected function grid_javascript() {
	  //mygrid must be loaded to have sense (link on grid)
      if ((iniload('JAVASCRIPT')) && (defined('MYGRID_DPC'))) {

	       $code = $this->init_grids();			
		   $js = new jscript;
           $js->load_js($code,"",1);			   
		   unset ($js);
	  }		
	}	

	protected function init_grids() {

		$bodyurl = seturl("t=cploadframe&id=");
			
		$out = "
function show_body() {
  var taskid = arguments[0];
  var custid = arguments[1];  
  sndReqArg('$bodyurl'+taskid,'mailbody');
}		
";
        return ($out);
	}
	
	protected function dosubscribe($mail=null,$notell=null,$name=null) {
        $db = GetGlobal('db');
        $sFormErr = GetGlobal('sFormErr');	
        $name = $name ? $name : 'unknown'; 		
	    $ret = false;
	    $mail = $mail ? $mail : GetParam('submail');
		if (!$mail) return false;
	   
        $dtime = date('Y-m-d h:i:s');		
	
	    //if ($ulistname=GetParam('ulistname')) {
		//..only ulists..
		$ulistname = GetParam('ulistname') ? GetParam('ulistname') : 'default';
		    //ulist....
			if (checkmail($mail))  {
				$sSQL = "SELECT email FROM ulists where email=". $db->qstr($mail) . 
				        " and (listname='deleted' or listname=" . $db->qstr($ulistname) .")"; 
				$ret = $db->Execute($sSQL,2);
                if (empty($ret->fields[0])) {
					$sSQL = "insert into ulists (email,startdate,active,lid,listname,name) " .
							"values (" .
							$db->qstr(strtolower($mail)) . "," . $db->qstr($dtime) . "," .
							"1,1," . $db->qstr(strtolower($ulistname)) . "," .
							$db->qstr($name) . ")";  
					$db->Execute($sSQL,1);		    
			        //echo $sSQL;
					
					SetGlobal('sFormErr', localize('_MSG6',getlocal()));
			        if ((!$notell) && ($this->tell_it)) 
						$this->mailto($this->tell_from,$this->tell_it,'New Subscription',$mail);			     							  	 
			   
					$ret = true;					
                }				
			}
			else 
			    SetGlobal('sFormErr', localize('_MSG5',getlocal()));
	    //}
	    //else
		//..continue to unssubscribe from users table...
	    //parent::dounsubscribe($mail); 
	   
	    return $ret;	   	
	}

	protected function dounsubscribe($mail=null) {
        $db = GetGlobal('db');
        $sFormErr = GetGlobal('sFormErr');	
	    $mail = $mail ? $mail : GetParam('submail');
		$ulistname = GetParam('ulistname') ? GetParam('ulistname') : 'default';		
		if (!$mail) return false;  
		
			if (checkmail($mail))  {

				$sSQL = "delete from ulists where email=" . $db->qstr($mail) . ' and listname=' . $db->qstr($ulistname); 
				$result = $db->Execute($sSQL,1);
		        //echo $sSQL;
				SetGlobal('sFormErr',localize('_MSG8',getlocal()));
				setInfo(localize('_MSG8',getlocal()));
			}	
			else { 
				SetGlobal('sFormErr', localize('_MSG5',getlocal()));	  
				setInfo(localize('_MSG5',getlocal()));
			}				
		
	}	
	
	protected function subscribe_extracting_name($token=null) {
        $db = GetGlobal('db'); 
		if (!$token) return;	
		$matches = array();
					
	    //method 1 name <mail>
	    $pattern = "@<(.*?)>@";
	    preg_match($pattern,$token,$matches);
	    $extracted_mail = trim(strtolower($matches[1]));

		if (checkmail($extracted_mail)) {	  
		  if ($name = str_replace($extracted_mail,'',$token)) {
		    //echo $name,'<br>'
		    $name = str_replace('"','',$name);
		    $name = str_replace("'",'',$name);
		    $name = str_replace('<>','',$name);			
		  }
		  $s = $this->dosubscribe($extracted_mail,1,$name);
		  return ($s);	   
	    }
		else { //method 2 name [mail]
	      $pattern2 = "@[(.*?)]@";
	      preg_match($pattern2,$token,$matches);
	      //print_r($matches);
	      $extracted_mail = trim(strtolower($matches[1]));
		
		  //if ($s = $this->dosubscribe($extracted_mail,1)) {  
		  if (checkmail($extracted_mail)) {	  
		    if ($name = str_replace($extracted_mail,'',$token)) {		
		      $name = str_replace('"','',$name);
			  $name = str_replace("'",'',$name);
		      $name = str_replace('[]','',$name);			
		    }
		    $s = $this->dosubscribe($extracted_mail,1,$name);
		    return ($s);		   			   
	      }
		  else { //method 3 name mail
		    $mytokens = explode(' ',$token);
		    $name = trim($mytokens[0]);
		    $extracted_mail = trim(strtolower($mytokens[1])); 
		  
		    if (checkmail($extracted_mail)) {		
		      if ($name = str_replace($extracted_mail,'',$token)) {
		        $name = str_replace('"','',$name);
			    $name = str_replace("'",'',$name);
			  }	
		      $s = $this->dosubscribe($extracted_mail,1,$name);
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
	  set_time_limit(0);
	  foreach ($mymails as $i=>$tok) {
	    if ($doit = $this->dosubscribe(trim(strtolower($tok)),1)) {//is a mail address...
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
	  
	  set_time_limit(50);
	  $msg = $x . ' mails added, ';
	  $msg .= $x2 . ' mails updated from ' . count($mymails) . ', ';	  
	  $msg .= $n . ' names extracted,';	  
	  $msg .= $e . ' tokens not recognized.';	  
	  
	  SetGlobal('sFormErr', $msg);	  
	  setInfo($msg);	  
	}		

	protected function deactivate_queue_rec() {
         $db = GetGlobal('db');
         $rec = GetReq('rec'); 
	   	   
	     $sSQL = "update mailqueue set active=0,mailstatus='USER_CANCEL' where id=" . $rec;
		 //echo $sSQL;		 
				 
	     $res = $db->Execute($sSQL,1);	
	}	

	protected function activate_queue_rec() {
         $db = GetGlobal('db');
         $rec = GetReq('rec'); 
	   	   
	     $sSQL = "update mailqueue set active=1,mailstatus='USER_ACTIV' where id=" . $rec;
		 //echo $sSQL;		 
				 
	     $res = $db->Execute($sSQL,1);	
	}	

	//user table (deprecated)
    public function _isin($mail) {
       $db = GetGlobal('db');
	   
       $sSQL = "SELECT id,email,startdate FROM users";	
	   $sSQL .= " WHERE email=" . $db->qstr($mail) . " and subscribe>0"; 
		
	   $resultset = $db->Execute($sSQL,2);
	   //$ret = $db->fetch_array($resultset);	   
	   
	   //echo $mail,$sSQL;


	   if ($resultset->fields['email']==$mail) return (true);
	
       return (false);
    }	
	
	//ulists table
    public function isin($mail) {
       $db = GetGlobal('db');
	   
       $sSQL = "SELECT id,listname, name, email, datein, active FROM ulist";	
	   $sSQL .= " WHERE email=" . $db->qstr($mail); // . " and active>0"; 
		
	   $resultset = $db->Execute($sSQL,2);
	   //$ret = $db->fetch_array($resultset);	   
	   
	   //echo $mail,$sSQL;
	   if ($email = $resultset->fields['email']) {
         $ret = ($resultset->fields['active']==1) ? 1 : -1; //activeted - deactivated
	     return $ret;
       }		 
	
       return false; //not exist
    }	
	
	protected function loadframe($ajaxdiv=null) {
	    $bodyurl = seturl("t=cpmailbodyshow&id=".GetReq('id'));
	
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"350px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv.'|'.$frame;//$out;	//'<p>'.$bodyurl.'</p>';
		else
			return ($frame);
	}	
	
    protected function show_mailbody() {
		$db = GetGlobal('db'); 	
		$id = GetReq('id');
	  
		$sSQL = "select body from mailqueue where id=".$id;
		$result = $db->Execute($sSQL);
   
        $htmlbody = $result->fields['body'];

		return ($htmlbody);	  
    }	

	public function viewMails($active=null) {
		$active = $active?$active:GetReq('active');
		$isajax_window = GetReq('ajax') ? GetReq('ajax') : null;
		   	
	    //in case of preview in ajax win mygrid is not working so render browser
		//when paging goto fullscreesn and ajax req is not exist so can render mygid
		//also when active is 1 because sql can't select using where
		if ((!$active) && (!$isajax_window) && (defined('MYGRID_DPC'))) {
		    $title = str_replace(' ','_',localize('_MAILQUEUE',getlocal()));//NO SPACES !!!//localize('_MAILQUEUE',getlocal());
		   
	        $sSQL = "select * from (select id,active,timeout,receiver,subject,reply,status,mailstatus from mailqueue";
            $sSQL.= ') as o';  				
		   		   
		    //echo $sSQL;

		    GetGlobal('controller')->calldpc_method("mygrid.column use grid9+id|".localize('_id',getlocal())."|5|1|");
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid9+active|".localize('_active',getlocal())."|boolean|1|ACTIVE:NOT ACTIVE");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid9+active|".localize('_active',getlocal()).'|link|2|'.seturl('t=cpdeactivatequeuerec&editmode=1&rec={id}').'||');			
            //GetGlobal('controller')->calldpc_method("mygrid.column use grid9+receiver|".localize('_receiver',getlocal()).'|10|1');
			GetGlobal('controller')->calldpc_method("mygrid.column use grid9+receiver|".localize('_receiver',getlocal())."|link|10|"."javascript:show_body({id});".'||');
            GetGlobal('controller')->calldpc_method("mygrid.column use grid9+timeout|".localize('_date',getlocal()).'|date|1');		   
            //GetGlobal('controller')->calldpc_method("mygrid.column use grid9+subject|".localize('_subject',getlocal()).'|20|1');	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid9+subject|".localize('_subject',getlocal())."|link|20|".seturl('t=cpactivatequeuerec&editmode=1&rec={id}').'||');
		    //GetGlobal('controller')->calldpc_method("mygrid.column use grid9+active|".localize('_active',getlocal()).'|boolean|1');	
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid9+reply|".localize('_reply',getlocal()).'|5|1|||||right');	
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid9+status|".localize('_status',getlocal()).'|5|1|||||right');
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid9+mailstatus|".localize('_mailstatus',getlocal()).'|10|1');			
			
		    $out .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid9+mailqueue+$sSQL+r+$title+id+1+1+20+400++0+1+1");
			
			//mail body ajax renderer
			$out .= GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use mailbody");
		}
        else  
			$out .= null;
   		
		
	    return ($out);	
	}
	
	protected function ulistform($ulistname) {
        $db = GetGlobal('db');	
		$ulistname = 'grid1';//$ulistname ? $ulistname : 'default';
		
		if (defined('MYGRID_DPC')) { 
		   $sSQL = "select * from (";
		   $sSQL.= "SELECT u.id,u.startdate,u.active,u.name,u.email,u.listname FROM ulists u";
		   
		   //not selectable by typing listname...just search in grid
		   //$sSQL .= " where listname=" . $db->qstr($ulistname);
           //solving where using not in users !!!!!		   
		   //$sSQL.= " LEFT JOIN users c ON c.email <> u.email AND ";
           /*if ($ulistname=='default') 
				$sSQL .= "(u.listname='".$ulistname."' OR u.listname='')";
		   else
				$sSQL .= " u.listname='".$ulistname."'";*/
		   
           $sSQL .= ') as o';  		   
		   //echo $sSQL;
		   GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('_ID',getlocal()));
           GetGlobal('controller')->calldpc_method("mygrid.column use grid1+email|".localize('_SUBMAIL',getlocal()).'|10|1');
           GetGlobal('controller')->calldpc_method("mygrid.column use grid1+startdate|".localize('_SUBDATE',getlocal()).'|date|1');		   
           GetGlobal('controller')->calldpc_method("mygrid.column use grid1+name|".localize('_FNAME',getlocal()).'|20|1');	
		   GetGlobal('controller')->calldpc_method("mygrid.column use grid1+active|".localize('_ACTIVE',getlocal()).'|boolean|1');	
		   GetGlobal('controller')->calldpc_method("mygrid.column use grid1+listname|".localize('_LISTNAME',getlocal()).'|20|1');	
		   $out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+ulists+$sSQL+d+$ulistname+id+1+1+20+400++0+1+1");

		}	
		
	   	
	    return ($out);	
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
       /*
       $filename = seturl("t=cpsubscribe&editmode=".GetReq('editmode'));      
    
       $toprint  = "<FORM action=". "$filename" . " method=post>"; 
	   $toprint .= "<STRONG>E-mail:</STRONG><INPUT type=\"text\" name=\"submail\" maxlenght=\"64\" size=25>";	   
	   $toprint .= "<STRONG>UList name:</STRONG><input type=\"text\" name=\"ulistname\" maxlenght=\"80\" value=\"\">";
	   $toprint .= "<STRONG>Separator:</STRONG><INPUT type=\"text\" name=\"separator\" maxlenght=\"3\" size=3><br>";	   
	   
       $toprint .= "<DIV class=\"monospace\"><TEXTAREA style=\"width:100%\" NAME=\"csvmails\" ROWS=18 cols=60 wrap=\"virtual\">";
	   $toprint .=  GetParam('csvmails');		 
       $toprint .= "</TEXTAREA></DIV><br>";	   
	   

	   //$toprint .= "<input type=\"submit\" name=\"FormAction\" value=\"cpsubscribe\">&nbsp;"; 
       //$toprint .= "<input type=\"submit\" name=\"FormAction\" value=\"cpunsubscribe\">";	  
       $toprint .= "<input type=\"hidden\" name=\"FormName\" value=\"cpsubscribe\">"; 
       $toprint .= "<INPUT type=\"submit\" name=\"submit\" value=\"" . localize('_SUBSCR',getlocal()) . "\">&nbsp;";  
       $toprint .= "<INPUT type=\"hidden\" name=\"FormAction\" value=\"" . "cpsubscribe" . "\">";	 	   
	   	    
       $toprint .= "</FONT></FORM>";
	   
	   $data2[] = $toprint; 
  	   $attr2[] = "left";

	   $swin = new window(localize('_SUBSCR',getlocal()),$data2,$attr2);
	   $out .= $swin->render("center::100%::0::group_dir_body::left::0::0::");	
	   unset ($swin);	
	   REPLACED BY CP HTML PAGE FORM ELEMENTS*/

	   //ulist form
       $out .= $this->ulistform(GetParam('ulistname'));	   

       return ($out);
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
	
	function show_select_ulist($name, $taction=null, $class=null) {
		$db = GetGlobal('db');
			
		$sSQL = 'select distinct listname from ulists ';		   
		$sSQL .= " ORDER BY listname";	

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
	
		$url = ($taction) ? seturl('t='.$taction.'&ulistselect=',null,null,null,null) : 
		                    seturl('t=cpsubloadhtmlmail&ulistselect=',null,null,null,null);
		
	 
		$ret .= "<select name=\"$name\" onChange=\"location=this.options[this.selectedIndex].value\" $class>"; 
		$ret .= "<option value=\"\">Select...</option>";
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			$selection = ($rec[0] == $this->ulistselect) ? " selected" : null;
			$ret .= "<option value='".$url . $rec[0]."' $selection >". $rec[0]."</option>" ;
        }		
		
		//$ret .= $this->viewUList();		
		$ret .= "</select>";			    	
		       
	    return ($ret);		
	}	

	public function uListSelect() {
		
		$ret = $this->show_select_ulist('myulistselector', null, $this->template_ext, null);
		return ($ret);
	}			
	
	
	protected function show_files($ext=null) {

        if (defined('RCFS_DPC')) {
		   
	    $path = $this->templatepath;
		$myext = explode(',',$ext);
	    $extensions = is_array($myext) ? $myext : array(0=>".png",1=>".gif",2=>".jpg");
		$ret = null;
		
		if (is_dir($path)) {
			$this->fs= new rcfs($path);
			$ddir = $this->fs->read_directory($path,$extensions); 
			
			if (!empty($ddir)) {
		  
				sort($ddir);
				foreach ($ddir as $i=>$name) {
					$parts = explode(".",$name);
					//echo $name,'<br/>';
					$title = $parts[0];
					$ret .= "<option value=\"$name\">$title</option>";		
				}	 			    
			}
	    }  	   
	    }	  
	    
	    return ($ret);		
	}	
	
	public function viewTemplates() {
		
		$ret = $this->show_files($this->template_ext);
		return ($ret);
	}
	
	function show_select_files($name, $taction=null, $ext=null, $class=null) {
		$tmpl = GetReq('stemplate') ? GetReq('stemplate') : GetSessionParam('stemplate');
	
		$url = ($taction) ? seturl('t='.$taction.'&stemplate=1',null,null,null,null) : 
		                    seturl('t=cpsubloadhtmlmail&stemplate=',null,null,null,null);
		
		if (defined('RCFS_DPC')) {
			$path = $this->templatepath;
			$myext = explode(',',$ext);
			$extensions = is_array($myext) ? $myext : array(0=>".png",1=>".gif",2=>".jpg");
			
			if (is_dir($path)) {
		
				$this->fs= new rcfs($path);
				$ddir = $this->fs->read_directory($path,$extensions); 

				if (!empty($ddir)) {
		  
					sort($ddir);	 
					
					$ret .= "<select name=\"$name\" onChange=\"location=this.options[this.selectedIndex].value\" $class>"; 
					$ret .= "<option value=\"\">Select...</option>";
					
					foreach ($ddir as $id=>$fname) {
						$parts = explode(".",$fname);
						$title = $parts[0];
						$parts2 = explode(".",$tmpl);
						$template = $parts2[0];
						$selection = ($title == $template) ? " selected" : null;
						
						//reload template because alreaded selected
						//$this->mailbody = $this->loadData($tmpl);
						
						$ret .= "<option value=\"". $url . $fname. "\"". $selection .">$title</option>";		
					}	
		
					$ret .= "</select>";			    
				}
			}//empty dir
	    }  
		       
	    return ($ret);		
	}

	public function viewTemplateSelect() {
		
		$ret = $this->show_select_files('mytemplate', null, $this->template_ext, null);
		return ($ret);
	}	
	
	public function templateLoaded() {
		
		$tmpl = GetReq('stemplate') ? GetReq('stemplate') : GetSessionParam('stemplate');
		return (str_replace($this->template_ext ,'', $tmpl));
	}	
	
	
	protected function get_mail_body($tmpl=null) {
		$template = $tmpl ? $tmpl : GetReq('stemplate'); 
		$mailbody = null;

		//if ($this->iscollection>0) {			
		if (defined('RCCOLLECTIONS_DPC')) {
			//echo 'RCCOLLECTIONS_DPC';	
		    if ($template) {
				$template_file = $this->templatepath . $template;
				$mailbody = GetGlobal('controller')->calldpc_method("rccollections.create_page use ".$template_file.'+++'.$this->templatepath);
			}
			else
				$mailbody = GetGlobal('controller')->calldpc_method("rccollections.create_page");
		}					
		elseif (defined('RCTEDIT_DPC')) {//..STANDART BUILD KATALOG TO MAIL...//template engine
            //echo 'RCTEDIT_DPC';
		    if ($template) {
				$template_file = $this->templatepath . $template;
				$mailbody = GetGlobal('controller')->calldpc_method("rcitems.create_page use ".$template_file);
			}
			else
				$mailbody = GetGlobal('controller')->calldpc_method("rcitems.create_page");
		}				   
	 
		return ($mailbody);	 
	}		
	
	//subload template including collections
    public function loadData($template) {
		$path = $this->templatepath;	
		$data = null;	
		
		/*if (defined('CCPP_VERSION')) {
			$config = null;
			$preprocessor = GetGlobal('controller')->calldpc_var('pcntl.preprocessor'); //new CCPP($config);
			$data = $preprocessor->execute($path . $template, 0, false, true);
        }
        else*/		
			$data = @file_get_contents($path . $template); 
		
		$pageurl = $this->webview ? $this->encUrl($this->savehtmlurl):
		           $this->encUrl($this->savehtmlurl . $cid . '.html');
		$tokens[] = "[<a href='$pageurl'>".localize('_viewasweb',getlocal())."</a>]";
        $tokens[] = "<a href=\"" . $this->encUrl($this->url . '/unsubscribe/') ."\">".localize('_unsubscribe',getlocal())."</a>";		
			
		$data = $this->combine_tokens($data, $tokens, true);				
			 
		$sub_template = str_replace($this->template_ext,$this->template_subext,$template);
		//echo $path.$sub_template,'>';
			 
		//if sub template exist !!!!!!!!!!!!!!!!!!
		if (is_readable($path . $sub_template)) { 
		    $sub_data = $this->get_mail_body($sub_template);//<<selected items sub-template !!!!!!!!!!!!!!!!!!!!!!!!
		    //echo $sub_data,'>';
			$data = str_replace('<!--?'.$sub_template.'?-->',$sub_data,$data);	/**changed the subtemplate mask **/	   
		}
		/*else {//as is..
		    //$data = $this->get_mail_body();
			
			// only when no template...
			$data .= $this->spam_conditions_text(null,0,$this->ishtml);				
		}*/
		
		return ($data);		
	}		
	
	//load template including collections
    protected function loadTemplate2() {
		$path = $this->templatepath;
		$template = GetReq('stemplate') ? GetReq('stemplate') : GetSessionParam('stemplate');				
		   
		if (is_readable($path . $template)) {
		   
		    SetSessionParam('stemplate', $template); //save tmpl 
		   
		    $this->mailbody = $this->loadData($template);			
			
			return true;
		}
		return false;	  			
	}	
	
	protected function loadTemplate() {
		$path = $this->templatepath;
		$body = null;
		$template = GetReq('stemplate') ? GetReq('stemplate') : GetSessionParam('stemplate');
		
		if (is_readable($path . $template)) {
		  
			SetSessionParam('stemplate', $template); //save tmpl 
			
			/*if (defined('CCPP_VERSION')) {
				$config = null;
				$preprocessor = GetGlobal('controller')->calldpc_var('pcntl.preprocessor'); //new CCPP($config);
				$data = $preprocessor->execute($path . $template, 0, false, true);
			}
			else*/		
				$data = @file_get_contents($path . $template); 
			
		    $pageurl = $this->webview ? $this->encUrl($this->savehtmlurl):
		               $this->encUrl($this->savehtmlurl . $cid . '.html');
			$tokens[] = "[<a href='$pageurl'>".localize('_viewasweb',getlocal())."</a>]";
			$tokens[] = "<a href=\"" . $this->encUrl($this->url . '/unsubscribe/') ."\">".localize('_unsubscribe',getlocal())."</a>";
			
			$body = $this->combine_tokens($data, $tokens, true);			
		}	
		$this->mailbody = $body;
		
		return true;
	}	
	
	
	
	
	public function viewCampaigns() {
		$db = GetGlobal('db');
		
		$sSQL = 'select cdate,cid,title,timein from mailcamp where ';		   
		if ($text = GetParam('mail_text')) {
			$cid = md5($text . '|' . GetParam('subject') .'|'. GetParam('submail'));
			$sSQL .= " cid = " . $db->qstr($cid);	
			$sSQL .= GetParam('savecmp') ?  ' and active=1' : null; //temp camps without multiple selection
		}
        else		
			$sSQL .= " active=1";
		$sSQL .= " ORDER BY timein desc";	

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			$selection = ($rec[1] == $cid) ? " selected" : null;
			$ret[] = "<option value='".$rec[1]."' $selection>". $rec[2]."</option>" ;
        }		

		return (implode('',$ret));			
	}	
	
	function show_select_camp($name, $taction=null, $class=null) {
		$db = GetGlobal('db');
			
		$sSQL = 'select cdate,cid,title from mailcamp where ';
		if ($text = GetParam('mail_text')) {
			$cid = md5($text . '|' . GetParam('subject') .'|'. GetParam('submail')); //when new post
			$sSQL .= " cid = " . $db->qstr($cid);	
			$sSQL .= GetParam('savecmp') ?  ' and active=1' : null; //temp camps without multiple selection
		}
        else {		
		    $choose = "<option value=\"\">Select...</option>";
			$sSQL .= " active=1";
		}	
		$sSQL .= " ORDER BY cdate desc";

        $mycid = $cid ? $cid : $this->cid; /*new post or load camp request */ 		

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
	
		$url = ($taction) ? seturl('t='.$taction.'&cid=',null,null,null,null) : 
		                    seturl('t=cpviewcamp&cid=',null,null,null,null);
		
	 
		$ret .= "<select name=\"$name\" onChange=\"location=this.options[this.selectedIndex].value\" $class>"; 
		$ret .= $choose ? $choose : null; //"<option value=\"\">Select...</option>";
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			$selection = ($rec[1] == $mycid) ? " selected" : null;
			$ret .= "<option value='".$url . $rec[1]."' $selection >". $rec[2]."</option>" ;
        }		
		$ret .= "</select>";			    	
		       
	    return ($ret);		
	}		

    public function campaignSelect($action=null) {

		$ret = $this->show_select_camp('campaign', $action, 'class="span6 chzn-select" data-placeholder="Choose a Category" tabindex="1"');		
		return ($ret);
	}	
	
	protected function load_campaign() {
		$db = GetGlobal('db');
        if (!$this->cid) return false;
		
		$sSQL = 'select title,cdate,ulists from mailcamp where cid=';
        $sSQL .= $db->qstr($this->cid);	
        //echo $sSQL;		
		$resultset = $db->Execute($sSQL,2);
		//$rec = array_pop($resultset);
		foreach ($resultset as $n=>$rec) {
			SetParam('subject', $rec[0]); //make it global to used be html form
			SetParam('ulists', $rec[2]); //make it global to used be html form
		}	
		SetParam('from', $this->mailuser);//make it global to used be html form
		
		return ($rec[0]); //one rec
	}	
	
	protected function preview_campaign() {
		$db = GetGlobal('db');
        if (!$this->cid) die("");
		
		$sSQL = 'select body from mailcamp where cid=';
        $sSQL .= $db->qstr($this->cid);	
        //echo $sSQL;		
		$resultset = $db->Execute($sSQL,2);
		foreach ($resultset as $n=>$rec) 
			$text = base64_decode($rec[0]); 
		
		return ($text);
	}
	
    /*type : 0 save text as mail body /1 save collections as text to reproduce (offers, katalogs) */	
    protected function save_campaign($type=null) {
        $db = GetGlobal('db'); 
		//print_r($_POST);
        /*foreach ($_POST as $p=>$pp) {
			if ($p == 'mail_text')
				echo '';
			elseif ($p == 'ulistname')
			    print_r($_POST['ulistname']);
			else
				echo $p,'=>',$pp,'<br/>';
			
	    }*/	
		
		$ctype = $type ? $type : 0;
      
		$r = rand(000001, 999999);
				
        $cc = GetParam('from'); //from origin		
		$to = GetParam('submail'); //to origin
		$bcc = $this->getmails($to); //fetch mails plus 'to' origin
		
		$body = GetParam('mail_text');

	    $text = base64_encode($body);
		$title = GetParam('subject') ? GetParam('subject') : 'Campaign ' . $r;
		
		$date = date('Y-m-d h:m:s');
		$cid = md5(GetParam('mail_text') .'|'. GetParam('subject') .'|'. $to);
        $active = GetParam('savecmp') ? 1 : 0;	

		
		//arg / BECAME TOKEN..not for pattern method
		//add view as web page (not saved yet due to cid md5 creation on data in body)
		if (GetParam('webpagelink')) {
			
			$pageurl = $this->webview ? $this->encUrl($this->savehtmlurl):
			                            $this->encUrl($this->savehtmlurl . $cid . '.html');
			$plink = "[<a href='$pageurl'>".localize('_viewasweb',getlocal())."</a>]";
			$body = str_replace('</body>', $plink.'</body>', $body);						   	
		}

		//sign text /POSTED PARAM
		if ($sign_text = GetParam('sign')) 
			$body = str_replace('</body>',$sign_text .'</body>', $body);		
		
		//arg /sign mail at foot ..BECAME TOKEN..not for pattern method
		//if (GetParam('dosign')) { 
		if ($unlink = GetParam('unsubscribelink')) {
			//$un = localize('_unsubscribe',getlocal());
			//$sign_text = GetParam('sign');
			//$sign = $this->spam_conditions_text($sign_text, $un, $cid);
			//$body = str_replace('</body>',$sign .'</body>', $body);	
			$un = "<a href=\"" . $this->encUrl($this->url . '/unsubscribe/') ."\">".localize('_unsubscribe',getlocal())."</a>";			
			$body = str_replace('</body>',$un .'</body>', $body);		
		}		
					
		if (is_array($_POST['ulistname'])) {
		    $altl = implode(',', $_POST['ulistname']);  	
		}
		$lists = $this->ulistselect ? $this->ulistselect . ',' . $altl : $altl;
		SetParam('lists',$lists); //used by form
		
		if ($lists==null) {
			$this->messages[] = 'Campaign NOT saved (no receipients)';
			return false;
		}
		
		if (defined('RCCOLLECTIONS_DPC')) 
			$collection = GetGlobal('controller')->calldpc_var("rccollections.savedlist");
		else
			$collection = '';	
  
        $sSQL = "insert into mailcamp (cid,ctype,cdate,active,title,ulists,cc,bcc,template,body,collection) values (";
	    $sSQL .= $db->qstr($cid).",".
		         $ctype .",". 
				 $db->qstr($date).",$active,".
	             $db->qstr($title).",".
				 $db->qstr($lists).",".
				 $db->qstr($cc).",".
				 $db->qstr($bcc).",".
				 $db->qstr($this->template).",".
				 $db->qstr($text).",".
				 $db->qstr($collection).
				 ")"; 

		$result = $db->Execute($sSQL,1);
		
		if ($db->Affected_Rows()) {
			$this->messages[] = $active ? 'Campaign stored' : 'Campaign is temporary';
			
			//save the file
			if ($p = $this->savehtmlpath) {
				$s = @file_put_contents($p .'/'. $cid . '.html' , $body);	
				
				if ($s) 
					$this->messages[] = 'Saved as ' . $this->savehtmlurl . $cid . '.html';
				else
					$this->messages[] = $this->savehtmlurl . $cid . '.html NOT saved!';				
			}
			
			//reset camaign
			SetSessionParam('stemplate', '');
			$this->template=null;
			SetSessionParam('ulistselect', '');
			$this->mailbody = null;
			
			$this->cid = $cid; //hold cid in form after submit
			
			return (true);		
		}
		
		$this->messages[] = 'Campaign NOT saved';
		//echo $sSQL;
		
		return (false);		
	}
	

	
	public function getCmpMails($option=null) {
		$db = GetGlobal('db');
		
		$sSQL = 'select bcc from mailcamp where ';		   
		if ($text = GetParam('mail_text')) {
			$cid = md5($text . '|' . GetParam('subject') .'|'. GetParam('submail'));
			$sSQL .= " cid = " . $db->qstr($cid);	
		}
        else		
			$sSQL .= " cid=" . $db->qstr($this->cid);	

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			
			$csv = explode(';',$rec[0]);
			
			foreach ($csv as $m)
				$oret[] = $option ? "<option value='".$m."'>". $m."</option>" : $m;
        }		
		
		if (is_array($oret))
			$ret = $option ? implode('',$oret) : implode(';',$oret);
		
		return ($ret);
	}	
	
	
	protected  function get_mails_from_lists($listname=null) {
       $db = GetGlobal('db');	
	   $ulistname = $listname ? $listname : 'default';
	   $out = null; 
	   
	   $sSQL .= "SELECT email FROM ulists where listname=" . $db->qstr($ulistname); 
	   $sSQL .= " and active=1";
	   //echo $sSQL;	
       $result = $db->Execute($sSQL,2);
	   
	   if (count($result)>0) {		   
	     foreach ($result as $n=>$rec) {
            if ($m = $this->checkmail($rec['email'])) 		 
				$ret[] = $m;
		 }
	   }
	   
	   if (!empty($ret)) {  
	     $out = implode(';',$ret);
       }

	   return $out;		   
	}
	
	
	protected function checkmail($mail=null) {
		if (!$mail) return false;
		if (checkmail($mail))
			return ($mail);
		else 
			$this->messages[] = 'Invalid mail address ('. $mail .')';
		
		return false;	
	}
	
	public function viewMessages($template=null) {
		if (empty($this->messages)) return;
	    $t = ($template!=null) ? $this->select_template($template) : null;
		
		foreach ($this->messages as $m=>$message) {
			if ($t) 	
				$ret .= $this->combine_tokens($t, array(0=>$message));
			else
				$ret .= "<option value=\"$m\">$message</option>";
		}
		return ($ret);
	}

	protected function getmails($mail=null) {
        $db = GetGlobal('db');	
		$this->messages[] = 'Get mails...'; 
		
		$mails = $mail ? $mail : null;
		
		/*combo with reload func*/
	    if ($selectedlist = GetParam('myulistselector')) {
			$q = $mails ? ';' : null;
			$this->messages[] = 'Call mail list ' . $this->ulistselect;
			
			$mails .= $q . $this->get_mails_from_lists($this->ulistselect);	   
		}	
		
		/*multiple combo as alternatives */
		if ($altlist = $_POST['ulistname']) {
			$q = $mails ? ';' : null;
			if (is_array($altlist)) {
				$lm = null;
				foreach ($altlist as $i=>$list) {
				   $this->messages[] = 'Call mail list ' . $list; 	
				   $lm .= $q . $this->get_mails_from_lists($list);	//not mails ; check inside loop
				}   
				$mails .= $lm;
			}
			else {
				$this->messages[] = 'Call mail list ' . $altlist; 
				$mails .= $q . $this->get_mails_from_lists($altlist);			
			}	
		}
		
		/*csv addons */
		if ($csvlist = GetParam('csv')) { 
		    $q = $mails ? ';' : null;
		    $this->messages[] = 'Call csv mail list '; 
			
		    $m = explode(',', $csvlist);
			if (is_array($m)) {
				foreach ($m as $csvmail) {
                    if ($m = $this->checkmail($csvmail)) 					
						$mails .= $q . $m;
				}				
			}
			else {
			    $m = $this->checkmail($csvlist);	
				$mails .= $m  ? $q . $m : '';
			}			
		}
	   
	    /*app users checkbox*/
	    if ($users = $_POST['siteusers']) {
		    $q = $mails ? ';' : null;			
			$seclevid = 1;//GetParam('level'); //???
			$this->messages[] = 'Call user mail list ' . $seclevid;			
			 
			$sSQL .="SELECT email FROM users where";	
			$sSQL .= " seclevid=" . $seclevid . " and";	 
		    $sSQL .= " notes='ACTIVE'";	//NOT THE INACTIVE USERS   
			//echo $sSQL;	
			$result = $db->Execute($sSQL,2);	
	   
			if ($db->Affected_Rows()>0) {		   
				foreach ($result as $n=>$rec) {
                    if ($m = $this->checkmail($rec[0])) 					
						$ret[] = $m;
				}
			} 
			if (!empty($ret)) {  
				$mails .= $q . implode(';',$ret); 
			}
	    }
		
	    /*app customers checkbox*/
	    if ($users = $_POST['sitecusts']) {
		    $q = $mails ? ';' : null;			
			$this->messages[] = 'Call customers mail list ';			
			  
			$sSQL .="SELECT mail FROM customers ";	 
			//echo $sSQL;	
			$result = $db->Execute($sSQL,2);
	   
			if ($db->Affected_Rows()>0) {		   
				foreach ($result as $n=>$rec) {
                    if ($m = $this->checkmail($rec[0])) 					
						$ret[] = $m;
				}
			}
			if (!empty($ret)) {  
				$mails .= $q . implode(';',$ret); 
			}
	    }
		
		if ($mails) {
			$mcsv = explode(';', str_replace(';;', ';', $mails));
			//print_r($mcsv);
			//some clean
			foreach ($mcsv as $i=>$m)
				if ($m) $subs[] = $m;
				
			$uret = array_unique($subs);
			$this->messages[] = 'Extract duplicate mails';
			$ret = implode(';', $uret);
		}	
	     
	    return $ret;	
	}			
	
	protected function send_mails() {	  
        //check expiration key
        if ($this->appkey->isdefined('RCBULKMAIL')==false) {
	        $this->messages[] = "Failed, module expired.";
		    //return false;  //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< appkey --------------------------!!
	    }		 

		
		if (!empty($_POST['include'])) {
			
			if (!$_POST['cid']) {
				$this->messages[] = 'CID form error!';
				return false;
			}
			elseif (!$_POST['from']) {
				$this->messages[] = 'From mail field missing!';
				return false;
			}			
				
			
			$from = GetParam('from');
			//$to = GetParam('submail');	//not exist anymore   
			$subject = GetParam('subject');	
			
			if (is_readable($this->savehtmlpath .'/'. $_POST['cid'].'.html')) {
				
				$rawtext = @file_get_contents($this->savehtmlpath .'/'. $_POST['cid'].'.html'); //$this->mailbody; //not exist in this post			
				
				$body = $this->combine_tokens($rawtext, array('0'=>'dummy'), true); //no need in this stage !!!
				
				$subs = implode(';',$_POST['include']);
				//print_r($_POST['include']);
				$qty = count($subs) + 1;
				//$this->messages[] = 'Mail(s) to send :' . $qty;		
				$res = $this->sendit($from,$to,$subject,$body,$subs); 
				//print_r($this->messages);
				if (!$res)  
					$this->messages[] = "Sent failed";				
				
			    return ($res); 
			}
			else	
				$this->messages[] = 'File not exist ('. $this->savehtmlpath .'/'. $_POST['cid'] . '.html)';			
		}
		else		
		    $this->messages[] = "No receipients, send failed";
		
	    return false;   
	}	
	
	protected function sendit($from,$to,$subject,$mail_text='',$cc=null) {
	     if (!$mail_text) {
			 $this->messages[] = 'Failed: Empty content';	
			 return 0; 
		 }	 
		
		 $i = 0;
		 $meter = 0;

		 //$one_receipinet = $this->sendmail_inqueue($from,$to,$subject,$mail_text,$this->ishtml,$this->mailuser,$this->mailpass,$this->mailname,$this->mailserver);  
		 //also send an instand mail copy...
		 //$one_receipinet2 = $this->sendmail($from,$to,$subject,$mail_text,$this->ishtml); //!! disabled (not a 'to')
		 
		 if ($cc) {

			$mails = explode(";",$cc);//$mlist);

			foreach ($mails as $z=>$m) {
			  $meter += $this->sendmail_inqueue($from,$m,$subject,$mail_text,$this->ishtml,$this->mailuser,$this->mailpass,$this->mailname,$this->mailserver);
			  $i+=1;
			}
			
			$mtr = $meter ? $meter : 0;
			$this->messages[] = $mtr . ' mail(s) sent';// from ' . ($i) . ' mail(s) in queue';
			return ($i);	
		 }
		 /*else {
			$rcp = $one_receipinet ? $one_receipinet : 0;  
	        $this->messages[] = $rcp . ' mail sent from 1 mail in queue';		 
			 
		    $i = $one_receipinet;
		 } */ 
		 $this->messages[] = 'Send failed: NO receipients (cc)';
		 return (false);	
    }	
	
	//send mail to db queue
	protected function sendmail_inqueue($from,$to,$subject,$mail_text='',$is_html=false,$user=null,$pass=null,$name=null,$server=null) {
		$db = GetGlobal('db');		
		$ishtml = $is_html?$is_html:0;
		//$ccs = GetParam('cc'); //echo $ccs;		 	      
		//$bccs = GetParam('bcc');	//echo $bccs;	
		$altbody = GetParam('alttext'); 
		$origin = $this->prpath; 
		$encoding = $this->overwrite_encoding ? $this->overwrite_encoding : $this->encoding;
	   
		$cid = $_POST['cid']; //cid mark
		if (!$cid) {
		   $this->messages[] = 'CID Error.';	//error
		}	   
	   
		//client side (app depended) tracking var
		if ($this->trackmail) {
	     		 
			$trackid = $this->get_trackid($from,$to);
		 
			if (!$ishtml) {
				$ishtml = 1;
				$html_mail_text = '<HTML><BODY>' . $mail_text . '</BODY></HTML>';
				$body = $this->add_tracker_to_mailbody($html_mail_text,$trackid,$to,$ishtml);
			}
			else //already html body ...leave it as is		 
				$body = $this->add_tracker_to_mailbody($mail_text,$trackid,$to,$ishtml);

			$body = $this->add_urltracker_to_mailbody($body,$to,$cid);			
		}
		else {
			$body = $mail_text;	   
			$trackid = '';
		}	 
	   
		//echo 'z';
		if ((checkmail($to)) && ($subject)) {//echo $to,'<br>';
	   
			//add to db...local table
			$datetime = date('Y-m-d h:s:m');
			$active = 1;
		 
			$sSQL = "insert into mailqueue (timein,active,sender,receiver,subject,body,altbody,cc,bcc,ishtml,encoding,origin,user,pass,name,server,trackid,cid) ";
			$sSQL .=  "values (" .
				 $db->qstr($datetime) . "," . $active . "," .
		 	     $db->qstr(strtolower($from)) . "," . $db->qstr(strtolower($to)) . "," .
			     $db->qstr($subject) . "," . 
				 $db->qstr($body) . "," .
				 $db->qstr($altbody) . "," .				 
				 $db->qstr($ccs) . "," .
				 $db->qstr($bccs) . "," .
				 $ishtml . "," .
				 $db->qstr($encoding) . "," .
				 $db->qstr($origin) . "," .			 
				 $db->qstr($user) . "," .
				 $db->qstr($pass) .	"," .	
				 $db->qstr($name) . "," .
				 $db->qstr($server) . "," .
				 $db->qstr($trackid) . "," .
				 $db->qstr($cid) . ")";
	   
			//echo $sSQL,'<br>';			
			$result = $db->Execute($sSQL,1);			 
			$ret = $db->Affected_Rows();
					     	  	
			if ($ret) 
				return true;      
			else 
				$this->messages[] = '_MLS9' . localize('_MLS9',getlocal());	//error

		}
		else 
			$this->messages[] = "_MLS4: $subject : $to " . localize('_MLS4',getlocal());
 
		return false;			 
	}	
	
    protected function sendmail($from,$to,$subject,$mail_text='',$is_html=false) {
		$sFormErr = GetGlobal('sFormErr');
		$err = null;
		$ccs = GetParam('cc'); //echo $ccs;
	   
		if ($ccs)
			$ccaddress = explode(';',$ccs);		      
		$bccs = GetParam('bcc');	//echo $bccs;	 
		if ($ccs)
			$bccaddress = explode(';',$bccs);			 
		//global $info; //receives errors	 

		if ((checkmail($to)) && ($subject)) {//echo $to,'<br>';
	   
         $smtpm = new smtpmail($this->encoding,$this->mailuser,$this->mailpass,$this->mailname,$this->mailserver);
		   	   
         if ((SMTP_PHPMAILER=='true') || ($method=='SMTP')) {
		   //echo 'smtp';	
		   $smtpm->from($from,$this->mailname);		   
		   $smtpm->to($to);  
		   if (!empty($ccaddress)) {
		     foreach ($ccaddress as $cc) {
			   //echo $cc,'<br>';
			   if (trim($cc)) {
		         //$smtpm->cc($cc);//ONLY WIN32  
			     $smtpm->to($cc);
			   }
			 }  
		   }  	 
		   if (!empty($bccaddress)) {
		     foreach ($bccaddress as $bcc) {
			   //echo $bcc,'<br>';		
			   if (trim($bcc)) {	 
		         //$smtpm->bcc($bcc); //ONLY WIN32  
			     $smtpm->to($bcc);  
			   }	 
			 }  
		   }		   
		   $smtpm->subject($subject);
		   $smtpm->body($mail_text,$is_html);
		   
           # Optional alternate text-only body:
           $smtpm->smtp->AltBody = GetParam('alttext');		 
		   # url images to Embeded images replacement
		   if (!empty($this->images)) {
		     foreach ($this->images as $a=>$image) {
		       if ($image) {
			     foreach ($this->imgtypes as $ext) {		 
			       if (strstr($image,$ext)) {
				     $myext = str_replace('.','',$ext);//without dot
                     $err .= $smtpm->smtp->AddEmbeddedImage($this->template_images_path . $image, "1", $image, "base64", "image/$myext");		 
				   }  
			     }
			   }  
		     }	  
		   }
           # Attached file containing this source code:
		   if (!empty($this->attachments)) {
		     foreach ($this->attachments as $a=>$attachment) {
		       if ($attachment) {
			     foreach ($this->doctypes as $ext) {		 
			       if (strstr($attachment,$ext)) {		
				     $myext = str_replace('.','',$ext);//without dot???? switch	 
                     $err .= $smtpm->smtp->AddAttachment($this->template_document_path . $attachment, $attachment, "base64", "text/plain");
				   }  
			     }
			   }  
		     }
		   }		   			   	   
	     }
         elseif ((SENDMAIL_PHPMAILER=='true') || ($method=='SENDMAIL')) {	  	   
		   //echo 'phpmailer';
		   $smtpm->from($from,$this->mailname);		   
		   $smtpm->to($to);  
		   if (!empty($ccaddress)) {
		     foreach ($ccaddress as $cc) {
			   //echo $cc,'<br>';			 
			   if (trim($cc)) {			 
		         //$smtpm->cc($cc); //ONLY WIN32  
			     $smtpm->to($cc);
			   }	 
			 }  
		   }
		   if (!empty($bccaddress)) {
		     foreach ($bccaddress as $bcc) {
 			   //echo $bcc,'<br>';
			   if (trim($bcc)) {				   
		         //$smtpm->bcc($bcc);//ONLY WIN32   
			     $smtpm->to($bcc);
			   }	 
			 }  
		   }			    
		   $smtpm->subject($subject);
		   $smtpm->body($mail_text,$is_html);		
		   
           # Optional alternate text-only body:
           $smtpm->smtp->AltBody = GetParam('alttext');		 
		   # url images to Embeded images replacement
		   if (!empty($this->images)) {
		     foreach ($this->images as $a=>$image) {
		       if ($image) {
			     foreach ($this->imgtypes as $ext) {		 
			       if (strstr($image,$ext)) {
				     $myext = str_replace('.','',$ext);//without dot
                     $err .= $smtpm->smtp->AddEmbeddedImage($this->template_images_path . $image, "1", $image, "base64", "image/$myext");		 
				   }  
			     }
			   }  
		     }	  
		   }
           # Attached file containing this source code:
		   if (!empty($this->attachments)) {
		     foreach ($this->attachments as $a=>$attachment) {
		       if ($attachment) {
			     foreach ($this->doctypes as $ext) {		 
			       if (strstr($attachment,$ext)) {		
				     $myext = str_replace('.','',$ext);//without dot???? switch	 
                     $err .= $smtpm->smtp->AddAttachment($this->template_document_path . $attachment, $attachment, "base64", "text/plain");
				   }  
			     }
			   }  
		     }
		   }		      
		 } 
		 else {
		   //echo 'default';	
		   $smtpm->to($to); 
		   $smtpm->from($from); 
		   $smtpm->subject($subject);
		   $smtpm->body($mail_text);			   			   	    
		 }
			 
		 $err .= $smtpm->smtpsend();
		 unset($smtpm);				 
		  			     	  	
  	     if (!$err) {
			$this->messages[] = localize('_MLS2',getlocal());	//send message ok
			return true;
		 }         
		 else 
			$this->messages[] = localize('_MLS9',getlocal().'('.$err.')');	//error
		}
		else 
			$this->messages[] = "xx " . localize('_MLS4',getlocal());
		 
	   return (false);	  	   
    } 	
	
	protected function spam_conditions_text($text=null, $say=null, $cid) {
		$lan = getlocal();
		
		$unsubscribe_link = $say ? "<a href=\"" . $this->encUrl($this->url . '/unsubscribe/') ."\">".$say."</a>" : null; 
		/*
		$text0 = "<p>This e-mail can not be considered spam as long as we include: Contact information & remove instructions. 
If you have somehow gotten on this list in error, or for any other reason would like to be removed,  please click here $unsubscribe_link. 
This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. Any unauthorized disclosure, use of dissemination, either whole or partial, is prohibited.
(Relative as A5-270/2001 of European Council). $text</p>";
	  
		$text1 = "<p>Αυτο το e-mail δεν μπορει να θεωρηθεί spam εφόσον αναγράφονται τα στοιχεία του αποστολέα και διαδικασίες διαγραφής απο την λίστα παραληπτών.  
Αν είσαστε σε αυτή τη λίστα κατα λάθος ή για οποιονδήποτε άλλο λογο θέλετε να διαγραφεί το e-mail απο αυτή τη λίστα παραληπτών e-mail απλά πατήστε εδώ $unsubscribe_link.   
Το μήνυμα πληρεί τις προυποθέσεις της Ευρωπαικής Νομοθεσίας περί διαφημιστικών μηνυμάτων. Κάθε μήνυμα θα πρέπει να φέρει τα πλήρη στοιχεια του αποστολέα ευκρινώς και θα πρέπει να δίνει στο δέκτη τη δυνατότητα διαγραφής. 
(Directiva 2002/31/CE του Ευρωπαικού Κοινοβουλίου). $text</p>";	
        
        $ret = $lan ?  $text0 . $unsubscribe_link : $text1 . $unsubscribe_link;	
		*/
		//remark used to rename when webview (not to show as web page)
		$ret = "<!--REMARK--><p>" . $text .'&nbsp;'. $unsubscribe_link . "</p><!--REMARK-->";
		return ($ret);
    }		
	
	protected function add_tracker_to_mailbody($mailbody=null,$id=null,$receiver=null,$is_html=false) {
		if (!$id) return;
		$i = $id;
	
		if ($receiver) {
			$r = $receiver;
			$ret = "<img src=\"{$this->mtrackimg}?i=$i&r=$r\" border=\"0\" width=\"1\" height=\"1\"/>";
		}
		else
			$ret = "<img src=\"{$this->mtrackimg}?i=$i\" border=\"0\" width=\"1\" height=\"1\"/>";
		 
		if (($is_html) && (stristr($mailbody,'</BODY>'))) {
			if (strstr($mailbody,'</BODY>'))
				$out = str_replace('</BODY>',$ret.'</BODY>',$mailbody);
			else  
				$out = str_replace('</body>',$ret.'</body>',$mailbody);
		}	 
		else
			$out = $mailbody . $ret;	 	 
		 
		//echo '>',$is_html,$out;	 
		//@file_put_contents($this->prpath.'/trackcode.txt',$out);
		 
		return ($out);	 
	}	
	
	protected function get_trackid($from,$to) {
	
		$i = rand(100000,999999);//++$m;
		 	
		 /*$ta[] = encode(date('Ymd-H:m:s'));
		 $ta[] = $from;
		 $ta[] = $this->appname;
		 $tc = implode('<DLM>',$ta);
		 $tid = rawurlencode(encode($tc));*/
		 
		//YmdHmsu u only at >5.2.2		 
		$tid = date('YmdHms') .  $i . '@' . $this->appname;
		 
		return ($tid);	
	}
	
	public function encUrl($url) {
		if ($url) {
			
			//$key = '1234567890'; //hex2bin('000102030405060708090a0b0c0d0e0f101112131415161718191a1b1c1d1e1f');
			//$mycurl = $url."::".$cid."::".$this->baseurl;
			//$c = new cipherSaber();
			//$_url = $c->encrypt($mycurl, $key);
			
			$burl = explode('/', $url);
			array_shift($burl); //shift http
			array_shift($burl); //shift //
			array_shift($burl); //www //
			$xurl = implode('/',$burl);
			
			$qry = 'a='.$this->appname.'&u=' . $xurl . '&cid=_CID_' . '&r=_TRACK_';
			$uredir = $this->urlRedir .'?'. $qry; //'?turl=' . $encoded_qry;
			
			/*RewriteRule ^m/([^/]*)/([^/]*)/([^/]*)/([^/]*)/$ /mtrackurl.php?t=mtrack&a=$1&u=$2&cid=$3&r=$4 [L] */
			//$uredir = $this->urlRedir2 .'/'. $this->appname .'/'. str_replace('/','-', $xurl) . '/_CID_/_TRACK_/' ; // htaccess / problem
			
			return ($uredir);
		}
		else
			return ('#');
	}
	
	protected function add_urltracker_to_mailbody($mailbody=null,$id=null,$cid=null) {

		$ret = str_replace(array('_TRACK_','_CID_'), array(base64_encode($id), $cid), $mailbody);
		return ($ret);
	}
	

    public function ckeditorjs() {
		$ret = "
				<script type='text/javascript'>
	           CKEDITOR.replace('mail_text',
			   {
	           skin : 'office2003', 
			   fullpage : true, 
			   extraPlugins :'docprops',
               filebrowserBrowseUrl : '/cp/ckfinder/ckfinder.html',
	           filebrowserImageBrowseUrl : '/cp/ckfinder/ckfinder.html?type=Images',
	           filebrowserFlashBrowseUrl : '/cp/ckfinder/ckfinder.html?type=Flash',
	           filebrowserUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	           filebrowserImageUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	           filebrowserFlashUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	           filebrowserWindowWidth : '1000',
 	           filebrowserWindowHeight : '700'			   
			   }		   
			   );
			   CKEDITOR.config.fullPage = true;
               CKEDITOR.config.entities = false;
               CKEDITOR.config.entities_greek = false;
               CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;			   		
		       </script>		
";
		
		return ($ret);
	}	
			   //CKEDITOR.config.basicEntities = false;
			   //CKEDITOR.config.htmlEncodeOutput = false;	
	//...
	public function runSql($name, $sql, $retasis=false) {
		$db = GetGlobal('db');			
		if (!$sql) return 0;
		$resultset = $db->Execute($sql,2);
		foreach ($resultset as $n=>$rec) {
			if (n==0) {
				if ($retasis===false) { //save in stats and return int
					$this->stats[$name]['value'] = $rec[0]; 	 
					return intval($rec[0]); //must one rec	
				}
				else
					return ($rec[0]);
			}	
		}	
		
		return 0;
	}	
	
	protected function sqlDateRange($fieldname, $istimestamp=false, $and=false) {
		$sqland = $and ? ' AND' : null;
		if ($daterange = GetParam('rdate')) {//post
			$range = explode('-',$daterange);
			$dstart = str_replace('/','-',trim($range[0]));
			$dend = str_replace('/','-',trim($range[1]));
			if ($istimestamp)
				$dateSQL = $sqland . " DATE($fieldname) BETWEEN STR_TO_DATE('$dstart','%m-%d-%Y') AND STR_TO_DATE('$dend','%m-%d-%Y')";
			else			
				$dateSQL = $sqland . " $fieldname BETWEEN STR_TO_DATE('$dstart','%m-%d-%Y') AND STR_TO_DATE('$dend','%m-%d-%Y')";
			
			//$this->messages[] = 'Range selection:'.$daterange;			
		}				
		elseif ($y = GetReq('year')) {
			if ($m = GetReq('month')) { $mstart = $m; $mend = $m;} else { $mstart = '01'; $mend = '12';}
				
			if ($istimestamp)
				$dateSQL = $sqland . " DATE($fieldname) BETWEEN '$y-$mstart-01' AND '$y-$mend-31'";
			else
				$dateSQL = $sqland . " $fieldname BETWEEN '$y-$mstart-01' AND '$y-$mend-31'";
			
			//$this->messages[] = 'Combo selection:'.$m.'-'.$y;
		}	
        else
			$dateSQL = null;
		
		return ($dateSQL);
	}
	
	protected function runstats() {
		$db = GetGlobal('db');
		
		if ($this->cid) $sSQLcid = " and cid=" . $db->qstr($this->cid); 
		else $sSQLcid=null;
		
		$timein = $this->sqlDateRange('timein', true, true);

		$sSQL = "select count(id) from ulists where active=1";		
		$this->runSql('activeSubscribers', $sSQL);		
		$sSQL = "select count(id) from ulists where active=0";		
		$this->runSql('inactiveSubscribers', $sSQL);	
		$sSQL = "select count(id) from ulists";	
		$ts = $this->runSql('totalSubscribers', $sSQL);		
		
		$sSQL = "select count(id) from mailqueue where active=1" . $sSQLcid ;		
		$this->runSql('activeQueue', $sSQL);		
		$sSQL = "select count(id) from mailqueue where active=0" . $timein . $sSQLcid ;		
		$this->runSql('inactiveQueue', $sSQL);
		
		$sSQL = "select count(id) from mailqueue";	
		//$tq = $this->runSql('totalQueue', $sSQL); //all		
		if ($timein) $sSQL .= " where " . $this->sqlDateRange('timein', true); //where
		if ($this->cid) $sSQL .= ($timein) ? " and cid=" . $db->qstr($this->cid) :
		   							         " where cid=" . $db->qstr($this->cid);//where			
		$tq = $this->runSql('totalQueue', $sSQL); //		
		
		$sSQL = "select sum(reply) from mailqueue where active=0" . $timein . $sSQLcid ;	
		$this->runSql('repliedQueue', $sSQL);			
		$sSQL = "select count(id) from mailqueue where status IS NOT NULL and active=0" . $timein . $sSQLcid;  //on sent mails (active=0)	
		$sc = $this->runSql('succeed', $sSQL);
		$sSQL = "select count(id) from mailqueue where status IS NULL and active=0" . $timein . $sSQLcid;  //on sent mails (active=0)		
		$fl = $this->runSql('failed', $sSQL);	
				
		$sSQL = "SELECT COUNT(id) FROM mailcamp";	
		$this->runSql('campaigns', $sSQL);		
		$sSQL = "SELECT COUNT( DISTINCT (subject) ) FROM mailqueue";	
		$this->runSql('usedCampaigns', $sSQL);		
		$sSQL = "SELECT COUNT( DISTINCT (subject) ) FROM mailqueue where active=1";	
		$this->runSql('runningCampaigns', $sSQL);
		
		//percents on max values (directives)
		$max = 10000; //ulist max users
		//$ts = $this->getStats['totalSubscribers']; 
		$upercent = ($ts/$max)*100;
		$this->stats['percentSubscribersLeft']['value'] = intval($upercent);		
		
		$max = 599999; //mails remain to send
		$mpercent = round($tq*100/$max);
		$this->stats['percentMailsLeft']['value'] = intval($mpercent);		
		
		//percent of sends and replies (uniques=status)
		$rpercent = round($sc*100/$tq);
		$this->stats['percentSucceed']['value'] = intval($rpercent);

		//percent of failed sents
		$fpercent = round($fl*100/$tq);
		$this->stats['percentFailed']['value'] = intval($fpercent);	

		if ($this->cid) {
			$sSQL = "SELECT bcc FROM mailcamp WHERE cid=" . $db->qstr($this->cid);	
			$bcc = $this->runSql(null, $sSQL, true);	
            $subs = explode(';', $bcc);
   			$this->stats['totalSubscribers']['value'] = count($subs);  //overwrite after calc if cid
		}		
							
		//print_r($this->stats);							
        $this->messages[] = 'Stats completed.';
		return true;
	}
	
	public function getStats($section=null, $subsection=null) {
		if (!$section) return 0;
		$sb = $subsection ? $subsection : 'value';
		$n = intval($this->stats[$section][$sb]);
		
		return (number_format($n,0,',','.'));
	}	
	
	public function isStats() {
		return (!empty($this->stats) ? true : false);
	}
	
	/* % of process of active camps*/
	public function percentofCamps($template=null) {
		$db = GetGlobal('db');			
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		$timein = $this->sqlDateRange('timein', true, false);
		if ($timein) return null; //no current tasks when time range
		
		$sSQL = "SELECT cid,subject,AVG(active),MIN(timein),MAX(timein) AS a FROM mailqueue group by cid,subject order by a desc";
		$resultset = $db->Execute($sSQL,2);
		
		foreach ($resultset as $n=>$rec) {
		    if ($rec[2] > 0) { //float avg of actives (else must be 0)
				//if ($t) {
					
					$percent = (100-intval($rec[2]*100));
					
					if ($t) {
						$tokens[] = $rec[0];
						$tokens[] = seturl('t=cppreviewcamp&cid='.$rec[0], $rec[1]) . " (".$rec[3] . " > ...)";
						$tokens[] = $percent;
						$tokens[] = $rec[3];
						$tokens[] = $rec[4];
						$ret .= $this->combine_tokens($t, $tokens);
						unset($tokens);
					}
					else { 
						//send message 
						$mt = seturl('t=cppreviewcamp&cid='.$rec[0]);
						GetGlobal('controller')->calldpc_method("rccontrolpanel.setMessage use warning|$rec[1]|$percent|$mt");
					}	
				/*}
				else
					$ret[] = $rec[1]; //?? no mean*/
			}	
		}

		return ($ret);	
	}
	
	/* % of process of last deactived camps*/
	public function lastCamps($template=null, $limit=null) {
		$db = GetGlobal('db');			
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		$timein = $this->sqlDateRange('timein', true, false);
		$dateRangeSQL = $timein ? ' WHERE ' . $timein : null;
		
		$l = $limit ? $limit : 3;	
        $limitSQL = $timein ? ' LIMIT 30' : ($limit ? 'LIMIT '.$l : 'LIMIT 3'); 	
		
		$sSQL = "SELECT cid,subject,AVG(active),MIN(timeout),MAX(timeout) AS a FROM  mailqueue $dateRangeSQL GROUP BY cid,subject ORDER BY a DESC ".$limitSQL;
		//echo $sSQL;
		$resultset = $db->Execute($sSQL,2);
		foreach ($resultset as $n=>$rec) {
		    if ($rec[2] == 0) { //float avg of actives (must be 0)
				if ($t) {
					$tokens[] = $rec[0];
					$tokens[] = seturl('t=cppreviewcamp&cid='.$rec[0], $rec[1]) . " (".$rec[3]." > ".$rec[4].")";
					$tokens[] = (100-intval($rec[2]*100));
					$tokens[] = $rec[3];
					$tokens[] = $rec[4];					
					$ret .= $this->combine_tokens($t, $tokens);
					unset($tokens);
				}
				else
					$ret[] = $rec[1]; //?? no mean
			}	
		}

		return ($ret);	
	}	
	
	/* % of process of all the same cid camps (instances = replayed)*/
	public function instanceCamps($template=null, $limit=null) {
		if (!$cid = $_GET['cid']) return false;
		$db = GetGlobal('db');			
		$l = $limit ? $limit : 5;
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		$sSQL = "SELECT cid,subject, AVG(active),MIN(timeout),MAX(timeout) AS a FROM  mailqueue where cid='$cid' GROUP BY subject ORDER BY a DESC LIMIT ".$l;
		$resultset = $db->Execute($sSQL,2);
		//echo $sSQL;
		foreach ($resultset as $n=>$rec) {
		    //if ($rec[2] == 0) { //float avg of actives (else must be 0)
				if ($t) {
					$tokens[] = $rec[0];
					$tokens[] = seturl('t=cppreviewcamp&cid='.$rec[0], $rec[1]) . " (".$rec[3]." > ".$rec[4].")";
					$tokens[] = (100-intval($rec[2]*100));
					$tokens[] = $rec[3];
					$tokens[] = $rec[4];						
					$ret .= $this->combine_tokens($t, $tokens);
					unset($tokens);
				}
				else
					$ret[] = $rec[1]; //?? no mean
			//}	
		}

		return ($ret);	
	}	

	
	public function getClicks($template=null, $limit=null) {
		$db = GetGlobal('db');	
		$l = $limit ? $limit : 5;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		//$timein = $this->sqlDateRange('timein', true, false);
		//if ($timein) return null; //no current tasks when time range
		$refsql = $cid ? "and ref='$cid'" : null;
		
		//$sSQL = "SELECT stats.id,date,attr3,title FROM stats,mailcamp where stats.ref=mailcamp.cid $refsql order by date desc LIMIT " . $l;
		$sSQL = "SELECT stats.id,date,attr3,title FROM stats,mailcamp where stats.ref=mailcamp.cid $refsql order by id desc LIMIT " . $l;
		//echo $sSQL;
		$resultset = $db->Execute($sSQL,2);
		
		foreach ($resultset as $n=>$rec) {
			$tokens[] = $rec[1] . ' '. $rec[3];
			$tokens[] = $rec[2];
			$ret .= $this->combine_tokens($t, $tokens);
			unset($tokens);	
		}

		return ($ret);			
	}
	
	public function getClicksAll($template=null, $limit=null) {
		$db = GetGlobal('db');	
		$l = $limit ? $limit : 50;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		$sSQL = "SELECT stats.id,date,attr3,title,ref FROM stats,mailcamp where stats.ref=mailcamp.cid group by ref order by date desc LIMIT " . $l;
		$resultset = $db->Execute($sSQL,2);
		
		foreach ($resultset as $n=>$rec) {
			$tokens[] = $rec[1] . ' '. $rec[3];
			$tokens[] = $rec[2];
			$ret .= $this->combine_tokens($t, $tokens);
			unset($tokens);
		}

		return ($ret);	
	}
	
	public function viewClicks() {
		$active = $active?$active:GetReq('active');
		$isajax_window = GetReq('ajax') ? GetReq('ajax') : null;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;	

		$refsql = $cid ? "and ref='$cid'" : null;		
		   	
		if ((!$active) && (!$isajax_window) && (defined('MYGRID_DPC'))) {
		    $title = str_replace(' ','_',localize('_MAILCLICKS',getlocal()));//NO SPACES !!!//localize('_MAILQUEUE',getlocal());
		   
	        //$sSQL = "select * from (select id,active,timeout,receiver,subject,reply,status,mailstatus from mailqueue";
			$sSQL = "select * from (SELECT stats.id,date,attr3,title FROM stats,mailcamp where stats.ref=mailcamp.cid $refsql order by date desc";
            $sSQL.= ') as o';  				
		   		   
		    //echo $sSQL;

		    GetGlobal('controller')->calldpc_method("mygrid.column use grid9+id|".localize('_id',getlocal())."|5|1|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid9+date|".localize('_date',getlocal()).'|date|1');		   
            GetGlobal('controller')->calldpc_method("mygrid.column use grid9+attr3|".localize('_receiver',getlocal()).'|10|1');
            GetGlobal('controller')->calldpc_method("mygrid.column use grid9+title|".localize('_subject',getlocal()).'|20|1');	

		    $out .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid9+mailqueue+$sSQL+r+$title+id+1+1+20+400++0+1+1");
			
			//mail body ajax renderer
			$out .= GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use mailbody");
		}
        else  
			$out .= null;
   		
		
	    return ($out);	
	}	
	
	
	
	//load graphs urls to call
	protected function load_graph_objects() {
			  
        $this->objcall['mailqueue'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=mailqueue&statsid=');

	}	
	
    public function _show_charts() {
		//$stats = $this->_show_addon_tools(); //tools to enable
	    if (!empty($this->objcall)) {  
		 
 		    foreach ($this->objcall as $report=>$goto) {//goto not used in this case
                $title = localize("_$report",getlocal()); //title							 	   
				$ts = '
					<!-- BEGIN CHART PORTLET-->
                    <div class="widget ">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> '.$title.'</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <div id="'.$report.'"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END CHART PORTLET-->
';		
			}
		}
		return ($ts);//stats);		 
    }	
	
    public function select_timeline($template,$year=null, $month=null) {
		$year = GetParam('year') ? GetParam('year') : date('Y'); 
	    $month = GetParam('month') ? GetParam('month') : date('m');
		$daterange = GetParam('rdate');
		
		$t = ($template!=null) ? $this->select_template($template) : null;		
	    if ($t) {
			for ($y=2015;$y<=intval(date('Y'));$y++) {
				$yearsli .= '<li>'. seturl('t=cpmailstats&month='.$month.'&year='.$y, $y) .'</li>';
			}
		
			for ($m=1;$m<=12;$m++) {
				$mm = sprintf('%02d',$m);
				$monthsli .= '<li>' . seturl('t=cpmailstats&month='.$mm.'&year='.$year, $mm) .'</li>';
			}	  
	  
	        $posteddaterange = $daterange ? ' > ' . $daterange : ($year ? ' > ' . $month . ' ' . $year : null) ;
	  
			$tokens[] = localize('RCBULKMAIL_DPC',getlocal()) . $posteddaterange; 
			$tokens[] = $year;
			$tokens[] = $month;
			$tokens[] = localize('_year',getlocal());
			$tokens[] = $yearsli;
			$tokens[] = localize('_month',getlocal());			
			$tokens[] = $monthsli;	
            $tokens[] = $daterange;			
		
			$ret = $this->combine_tokens($t, $tokens); 				
     
			return ($ret);
		}
		
		return null;	
    }	  
	
	//JS ON PAGE
    protected function javascript_refresh($page,$timeout=null) {	 
	  /*
		$mytimeout = $timeout ? $timeout : 5000;//5 sec
        $mytimeout2= $timeout ? $timeout +2000 : 7000;//5 sec
	   
	    if (!empty($this->objcall)) {
	     $i = 0;
	     foreach ($this->objcall as $report=>$goto) {
	       $timeout = $mytimeout + (++$i*1000); //set delay 
           $ret .= "window.setInterval(\"sndReqArg('$goto'+statsid.value,'$report')\",$timeout);
";	 
         }
	    } 
	    return ($ret);*/
    }

    //JS ON PAGE
	protected function _js() {
        /*if (iniload('JAVASCRIPT')) {
	  
		   $js = new jscript;	  
		   //auto refresh
	       if ($refresh = $this->refresh)
             $code = $this->javascript_refresh(seturl('t=cpmailstats&refresh='.$refresh),$refresh*1000);  
		   
           $js->load_js($code,"",1);			   
		   unset ($js);		   
	    }*/	
	}
	
	
	function select_template($tfile=null) {
		if (!$tfile) return;
	  
		$template = $tfile . '.htm';	
		$t = $this->prpath . 'html/'. $this->cptemplate .'/'. str_replace('.',getlocal().'.',$template) ;   
		if (is_readable($t)) 
			$mytemplate = file_get_contents($t);

		return ($mytemplate);	 
    }	
	
	//tokens method	
	function combine_tokens($template, $tokens, $execafter=null) {
	    if (!is_array($tokens)) return;		

		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template;
		  
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
            //echo $tok,'<br>';
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<30;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);
		//echo $ret;
		
		//execute after replace tokens
		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $retout = $fp->process_commands($ret);
		  unset ($fp);
          
		  return ($retout);
		}		
		
		return ($ret);
	}
		
					
};
}
?>