<?php

$__DPCSEC['RCBULKMAIL_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ( (!defined("RCBULKMAIL_DPC")) && (seclevel('RCBULKMAIL_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCBULKMAIL_DPC",true);

$__DPC['RCBULKMAIL_DPC'] = 'rcbulkmail';

$v = GetGlobal('controller')->require_dpc('crypt/ciphersaber.lib.php');
require_once($v); 

$a = GetGlobal('controller')->require_dpc('libs/appkey.lib.php');
require_once($a);


$__EVENTS['RCBULKMAIL_DPC'][0]='cpbulkmail';
/*$__EVENTS['RCBULKMAIL_DPC'][1]='cpunsubscribe';
$__EVENTS['RCBULKMAIL_DPC'][2]='cpsubscribe';
$__EVENTS['RCBULKMAIL_DPC'][3]='cpadvsubscribe';
$__EVENTS['RCBULKMAIL_DPC'][4]='cpviewsubsqueue';
$__EVENTS['RCBULKMAIL_DPC'][5]='cploadframe';
$__EVENTS['RCBULKMAIL_DPC'][6]='cpmailbodyshow';
$__EVENTS['RCBULKMAIL_DPC'][7]='cpviewsubsqueueactiv';
$__EVENTS['RCBULKMAIL_DPC'][8]='cpactivatequeuerec';
$__EVENTS['RCBULKMAIL_DPC'][9]='cpdeactivatequeuerec';*/
$__EVENTS['RCBULKMAIL_DPC'][10]='cpsavemailadv';
$__EVENTS['RCBULKMAIL_DPC'][11]='cpsubsend';
$__EVENTS['RCBULKMAIL_DPC'][12]='cpsubloadhtmlmail';
$__EVENTS['RCBULKMAIL_DPC'][13]='cpviewcamp';
$__EVENTS['RCBULKMAIL_DPC'][14]='cppreviewcamp';
$__EVENTS['RCBULKMAIL_DPC'][15]='cpmailstats';
$__EVENTS['RCBULKMAIL_DPC'][16]='cpviewclicks';
$__EVENTS['RCBULKMAIL_DPC'][17]='cpviewtrace';
//$__EVENTS['RCBULKMAIL_DPC'][18]='cp'; //cp when fist page
$__EVENTS['RCBULKMAIL_DPC'][19]='cpcampcontent';
$__EVENTS['RCBULKMAIL_DPC'][20]='cpdeletecamp';
$__EVENTS['RCBULKMAIL_DPC'][21]='cptemplatenew';
$__EVENTS['RCBULKMAIL_DPC'][22]='cptemplatesav';

$__ACTIONS['RCBULKMAIL_DPC'][0]='cpbulkmail';
/*$__ACTIONS['RCBULKMAIL_DPC'][1]='cpunsubscribe';
$__ACTIONS['RCBULKMAIL_DPC'][2]='cpsubscribe';
$__ACTIONS['RCBULKMAIL_DPC'][3]='cpadvsubscribe';
$__ACTIONS['RCBULKMAIL_DPC'][4]='cpviewsubsqueue';
$__ACTIONS['RCBULKMAIL_DPC'][5]='cploadframe';
$__ACTIONS['RCBULKMAIL_DPC'][6]='cpmailbodyshow';
$__ACTIONS['RCBULKMAIL_DPC'][7]='cpviewsubsqueueactiv';
$__ACTIONS['RCBULKMAIL_DPC'][8]='cpactivatequeuerec';
$__ACTIONS['RCBULKMAIL_DPC'][9]='cpdeactivatequeuerec';*/
$__ACTIONS['RCBULKMAIL_DPC'][10]='cpsavemailadv';
$__ACTIONS['RCBULKMAIL_DPC'][11]='cpsubsend';
$__ACTIONS['RCBULKMAIL_DPC'][12]='cpsubloadhtmlmail';
$__ACTIONS['RCBULKMAIL_DPC'][13]='cpviewcamp';
$__ACTIONS['RCBULKMAIL_DPC'][14]='cppreviewcamp';
$__ACTIONS['RCBULKMAIL_DPC'][15]='cpmailstats';
$__ACTIONS['RCBULKMAIL_DPC'][16]='cpviewclicks';
$__ACTIONS['RCBULKMAIL_DPC'][17]='cpviewtrace';
//$__ACTIONS['RCBULKMAIL_DPC'][18]='cp'; //cp when first page
$__ACTIONS['RCBULKMAIL_DPC'][19]='cpcampcontent';
$__ACTIONS['RCBULKMAIL_DPC'][20]='cpdeletecamp';
$__ACTIONS['RCBULKMAIL_DPC'][21]='cptemplatenew';
$__ACTIONS['RCBULKMAIL_DPC'][22]='cptemplatesav';

$__LOCALE['RCBULKMAIL_DPC'][0]='RCBULKMAIL_DPC;Mail queue;Mail queue';
$__LOCALE['RCBULKMAIL_DPC'][1]='_campaigns;Campaigns;Καμπάνιες';
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
$__LOCALE['RCBULKMAIL_DPC'][18]='_email;e-Mail;e-Mail';
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
$__LOCALE['RCBULKMAIL_DPC'][30]='_owner;Owner;Owner';
$__LOCALE['RCBULKMAIL_DPC'][31]='_dashboard;Dashboard;Στατιστικά';
$__LOCALE['RCBULKMAIL_DPC'][32]='_year;Year;Έτος';
$__LOCALE['RCBULKMAIL_DPC'][33]='_month;Month;Μήνας';
$__LOCALE['RCBULKMAIL_DPC'][34]='_here;here;εδώ';
$__LOCALE['RCBULKMAIL_DPC'][35]='_cid;Campaign;Καμπάνια';
$__LOCALE['RCBULKMAIL_DPC'][36]='_MAILTRACE;Actions;Ενέργειες';
$__LOCALE['RCBULKMAIL_DPC'][37]='_msgsuccess;Mail sent;Το μήνυμα στάλθηκε επιτυχώς';
$__LOCALE['RCBULKMAIL_DPC'][38]='_msgerror;Sent error;Το μήνυμα απέτυχε να σταλθεί';
$__LOCALE['RCBULKMAIL_DPC'][39]='_delcamp;Campaign deleted;Επιτυχής διαγραφή';
$__LOCALE['RCBULKMAIL_DPC'][40]='_template;Template;Template';
$__LOCALE['RCBULKMAIL_DPC'][41]='_collection;Collection;Collection';
$__LOCALE['RCBULKMAIL_DPC'][42]='_transactions;Transaction/Month;Συναλλαγές ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][43]='_applications;Applications Birth/Month;Νεές εφαρμογές ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][44]='_appexpires;Applications Expires/Month;Ληξεις εφαρμογών ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][45]='_mailqueue;Mail send/Month;Σταλθέντα e-mail ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][46]='_mailsendok;Mail Received/Month;Παρεληφθέντα e-mail ανα μήνα';
$__LOCALE['RCBULKMAIL_DPC'][47]='_income;Income;Εισόδημα';
$__LOCALE['RCBULKMAIL_DPC'][48]='_moretrans;All transactions;Όλες οι συναλλαγές';
$__LOCALE['RCBULKMAIL_DPC'][49]='_list;List;Λίστα';
$__LOCALE['RCBULKMAIL_DPC'][50]='_campaign;Campaign;Καμπάνια';
$__LOCALE['RCBULKMAIL_DPC'][51]='_code;Item;Κωδικός';
$__LOCALE['RCBULKMAIL_DPC'][52]='_category;Category;Κατηγορία';
$__LOCALE['RCBULKMAIL_DPC'][53]='_outoflist;out of list;εξήχθει απο';
$__LOCALE['RCBULKMAIL_DPC'][54]='_FAILED;Bounce;Bounce';

class rcbulkmail {
	
	var $title, $prpath, $urlpath, $url, $mtrackimg;
    var $trackmail, $overwrite_encoding, $encoding, $templatepath;
	var $mailname, $mailuser, $mailpass, $mailserver;
	var $ishtml, $mailbody, $template_ext, $template_images_path, $template;
	var $ulistselect, $messages, $cid, $savehtmlpath, $savehtmlurl;
	var $stats, $cpStats, $hasgraph, $goto, $refresh, $ajaxgraph, $objcall;
	var $sendOk, $iscollection, $disable_settings, $user_realm;
	
	var $appname, $appkey, $cptemplate, $urlRedir, $urlRedir2, $webview, $nsPage;
	var $owner, $seclevid, $isHostedApp;
	
	var $userDemoIds, $crmLevel, $maxinpvars, $batchid, $ckeditver;
	var $newtemplatebody, $saved, $savedname, $newsubtemplatebody, $newpatternbody;
		
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
		$this->cid = $_GET['cid'] ? $_GET['cid'] : $_POST['xcid']; //XCID for POST //no gereq,getparam may cid used by campaigns is in cookies
		
        //$defaultsavepath = remote_paramload('FRONTHTMLPAGE','path', $this->prpath);
		$tmplsavepath = remote_paramload('RCBULKMAIL','tmplsavepath', $this->prpath);		
		$this->nsPage = remote_paramload('RCBULKMAIL','webview', $this->prpath);
		$this->webview = $this->nsPage ? 1 : 0;
		
		$savepath = $tmplsavepath ? $tmplsavepath : null;//$defaultsavepath;
		$this->savehtmlpath = $savepath ? $this->urlpath . $savepath : null;
		$this->savehtmlurl = $savepath ? ($this->webview ? $this->url .'/'. $this->nsPage : $this->url . $savepath) : null;

		$this->appname = paramload('ID','instancename');
		$this->appkey = new appkey();			
		
		$this->messages = array(); //reset messages any time page reload - local msg system
		/*$this->stats = array();
		$this->cpStats = false;			
		
		//$this->refresh = GetReq('refresh')?GetReq('refresh'):60;//0
		$this->gotourl = seturl('t=cp&group='.GetReq('group'));//handle graph selections with no ajax
		$this->objcall = array();
		*/
		$this->urlRedir = remote_paramload('RCBULKMAIL','urlredir', $this->prpath);
		$this->urlRedir2 = remote_paramload('RCBULKMAIL','urlredir2', $this->prpath);
		
		$tmpl = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->prpath);  
	    $this->cptemplate = $tmpl ? $tmpl : 'metro';	

		$settings = remote_paramload('RCBULKMAIL','settingsdisable', $this->prpath);		
		$this->disable_settings = $settings ? true : false; //form disable
		$this->user_realm = remote_paramload('RCBULKMAIL','userrealm', $this->prpath);
		
		$this->owner = $_POST['Username'] ? $_POST['Username'] : GetSessionParam('LoginName'); //decode(GetSessionParam('UserName'));	
		$this->seclevid = GetSessionParam('ADMINSecID');			

		$this->isHostedApp = remote_paramload('RCBULKMAIL','hostedapp', $this->prpath);
		//echo '>', GetSessionParam('LoginName').'<br/>'.GetSessionParam('UserName').'<br/>'.decode(GetSessionParam('UserName'));
		//$timeZone = 'Europe/Athens';  // +2 hours !!! (cron must run at the same timezone)
		
		$this->sendOk = 0; //false unitl bid decrease to 0
		$this->batchid = GetParam('bid') ? GetParam('bid') : 0; //as reade by post form when send submit
		
		$this->userDemoIds = array(5,6,7); //remote_arrayload('RCBULKMAIL','demouser', $this->prpath);
		$this->crmLevel = 9;
		$this->maxinpvars = 1; //ini_get('max_input_vars') - 50; //DEPEND ON SRV AND DEFINES THE BATCH OUTPUT
		
		$ckeditorVersion = remote_paramload('RCBULKMAIL','ckeditor',$this->prpath);		
		$this->ckeditver = $ckeditorVersion ? $ckeditorVersion : 4; //default version 4
		//override ckeditver
		$this->ckeditver = (($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? 3 : 4; //depends on select or edit/new template
				
		
		$this->newtemplatebody = null;	
		$this->newsubtemplatebody = null;
		$this->newpatternbody = null;
		$this->saved = false;
        $this->savedname = null;
		$this->iscollection = false;	
	}
	
    function event($event=null) {
	
	    $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;
		
		if (defined('RCCOLLECTIONS_DPC')) //used by wizard html page !!
			$this->iscollection = GetGlobal('controller')->calldpc_method('rccollection.isCollection');  		
			
		//set message (in actions, dpc call error)
		//GetGlobal('controller')->calldpc_method("rccontrolpanel.setTask use info|test 123|1|#");						
		//$this->percentofCamps();		//<<<<<<<<<<<<<<<<<<<<<<<<<<<??? use with new rccontrolpanel		
  
	    switch ($event) {
			
			case 'cptemplatenew': $this->newcopyTemplate(); 
			                      break;
								  
			case 'cptemplatesav': $this->saved = $this->saveTemplate(); 
								  $this->newcopyTemplate();	//load
								  break;
			
	        case 'cpdeletecamp'    : $this->delete_campaign();
			                         break;								
	        case 'cpviewcamp'      : $this->load_campaign(true);
			                         break;			
									 
			case 'cppreviewcamp'   : break;
			case 'cpcampcontent'   : die($this->preview_campaign());
			                         break;							 
			 
			case 'cpsubloadhtmlmail': if ($this->iscollection>0) {
                                        //print_r($_POST);
				                        //check for sort post
										if (!empty($_POST['colsort'])) { 
											$slist = implode(',', $_POST['colsort']);	
											GetGlobal('controller')->calldpc_method("rccollections.saveSortedlist use " . $slist);
										}
										
										$this->loadTemplate2(); 	
			                          }										
									  else
										$this->loadTemplate();	
									  
			                          if ($this->ulistselect = GetReq('ulistselect')) 
											SetSessionParam('ulistselect', $this->ulistselect); 
                                      break;			
									  
			case "cpsubsend"      :	$this->sendOk = $this->send_mails();
									//echo 'sendOK:',$this->sendOk;
									SetSessionParam('messages',$this->messages);
									
									$this->load_campaign();
				                    break; 									 
			
	        case 'cpsavemailadv'  : $this->save_campaign();
									SetSessionParam('messages',$this->messages); //save messages
			                        break;
									
			//case 'cp'             :	//$this->runstats(); //when first page and need to run stats					
			case 'cpbulkmail'     :
			default               :	if ($this->template) {
				                        //also when returns in cp and template is selected
										if ($this->iscollection>0)
											$this->loadTemplate2(); //subtemp						  
										else
											$this->loadTemplate();						  
			                        }									
        }			
			
    }	

    function action($action=null)  { 	

        $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;
		
	    switch ($action) {
			
			case 'cptemplatesav'       :  $out = ($this->saved==true) ? "Saved" : null; break;
			case 'cptemplatenew'       :  break;									 
			case 'cpsubloadhtmlmail'   :
            case 'cpsavemailadv'       :		
			case 'cpsubsend'           :
			case 'cpcampcontent'       : 
            case 'cpdeletecamp'        :
			case 'cppreviewcamp'       : 
			case 'cpviewcamp'          : $out = $this->campaigns_grid(null,140,5,'r', true);  break;
			case 'cpbulkmail'          : 
		    default                    : 
		}			
		
        return ($out);
	}
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}
	
	public function isLevelUser($level=6) {
		return ($this->seclevid>=$level ? true : false);
	}	
	
	public function isCrmUser() {
		return ($this->seclevid>=$this->crmLevel ? true : false);
	}		
	
	/*disable settings in form*/
	public function disableSettings() {
		
		$ret = $this->disable_settings ? 'disabled' : null; //form disable
		return ($ret);
	}
	
	protected function domain_exists($email, $record = 'MX'){
		list($user, $domain) = explode('@', $email);
		return checkdnsrr($domain, $record);
	} 

    protected function _checkmail($data) {

		/*if( !eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" . "@([a-z0-9]+([\.-][a-z0-9]{1,})+)*$", $data, $regs) )  
			return false;*/
		
        $ret = filter_var($data, FILTER_VALIDATE_EMAIL);
		return ($ret);  
	}
	
	
	protected function campaigns_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_campaigns', getlocal()); 
		
        $xsSQL = "SELECT * from (select id,timein,ctype,cdate,active,title,ulists,cc,template,collection,owner,cid from mailcamp) o ";		   
		   
		_m("mygrid.column use grid1+id|".localize('id',getlocal())."|2|0|||1");	
		//_m("mygrid.column use grid1+timein|".localize('_date',getlocal())."|5|0|");	   		
		_m("mygrid.column use grid1+cdate|".localize('_date',getlocal())."|5|0|");		
		_m("mygrid.column use grid1+active|".localize('_active',getlocal())."|2|1|");
		_m("mygrid.column use grid1+cc|".localize('_email',getlocal())."|link|0|"."cpuliststats.php?t=cpadvsubscribe&cid={cid}".'||');
		_m("mygrid.column use grid1+title|".localize('_subject',getlocal())."|link|15|"."cpbulkmail.php?t=cpviewcamp&cid={cid}".'||'); //."javascript:cid(\"{cid}\");".'||');						
		_m("mygrid.column use grid1+ctype|".localize('_type',getlocal())."|2|1|");		
		_m("mygrid.column use grid1+ulists|".localize('_LISTNAME',getlocal())."|link|1|"."cpulists.php?t=cpadvsubscribe".'||');
		_m("mygrid.column use grid1+template|".localize('_template',getlocal())."|5|1|");
		//_m("mygrid.column use grid1+collection|".localize('_collection',getlocal())."|5|1|");
		_m("mygrid.column use grid1+owner|".localize('_owner',getlocal())."|5|0|");
		_m("mygrid.column use grid1+cid|".localize('_cid',getlocal())."|5|0|");
		   
		$out = _m("mygrid.grid use grid1+mailcamp+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
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
		$tmpl = $this->savedname ? $this->savedname :
				(GetReq('stemplate') ? GetReq('stemplate') : GetSessionParam('stemplate'));
	
		$url = ($taction) ? seturl('t='.$taction.'&stemplate=',null,null,null,null) : 
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
					$ret .= "<option value=\"$url\">Select...</option>";
					
					foreach ($ddir as $id=>$fname) {
						$parts = explode(".",$fname);
						$title = $parts[0];
						$parts2 = explode(".",$tmpl);
						$template = $parts2[0];
						$selection = ($title == $template) ? " selected" : null;
						
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
	
	public function viewTemplateCopy() {
		
		$ret = $this->show_select_files('mytemplate', 'cptemplatenew', $this->template_ext, null);
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
				$mailbody = GetGlobal('controller')->calldpc_method("rccollections.create_page use ".$template_file.'+'.$this->templatepath);
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
		
		$data = @file_get_contents($path . $template); 
						 
		$sub_template = str_replace($this->template_ext,$this->template_subext,$template);
		//echo $path.$sub_template,'>';
			 
		//if sub template exist 
		if (is_readable($path . $sub_template)) { 
		    $sub_data = $this->get_mail_body($sub_template);//<<selected items sub-template !!!!!!!!!!!!!!!!!!!!!!!!
		    //echo $sub_data,'>';
			$data = str_replace('<!--?'.$sub_template.'?-->',$sub_data,$data);	/**changed the subtemplate mask **/	   
		}

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
		$template = GetReq('stemplate') ? GetReq('stemplate') : GetSessionParam('stemplate');
		
		if (($template) && (is_readable($path . $template))) {
		  
			SetSessionParam('stemplate', $template); //save tmpl 
			
			$this->mailbody = @file_get_contents($path . $template); 			
			return true;			
		}	
		return false;
	}	
	
	/*copied or new template design*/
	protected function newcopyTemplate() {
		$path = $this->templatepath;
		$template = $this->savedname ? $this->savedname : GetReq('stemplate');

		if (($template) && (is_readable($path . $template))) {

			$this->newtemplatebody = @file_get_contents($path . $template); 

            //subtemplate loading
			$sub_template = str_replace($this->template_ext, $this->template_subext, $template);
			if (is_readable($path . $sub_template))
				$this->newsubtemplatebody = @file_get_contents($path . $sub_template);
			
			//pattern loading
			$pattern_file = str_replace($this->template_subext, '', $sub_template) . '.pattern.txt';
			if (is_readable($path . $sub_template))
				$this->newpatternbody = @file_get_contents($path . $pattern_file);
			
			return true;			
		}	
		//else (not a selected template -ignore session name when create new template)
		//reset template name
		SetSessionParam('stemplate', '');
		$this->template=null;		
		
		return false;
	}	

	public function renderTemplate() {
		$path = $this->templatepath;
		$template = GetReq('stemplate');
		$file = str_replace($this->template_ext, '', $template) . '.pattern.txt';
		//echo $file;
		
		if (is_readable($path . $file))  {
			$pf = file($path . $file);
			//search last edited line
			foreach ($pf as $line) {
				if (trim($line)) {
					$joins = explode(',', array_pop($pf)); 
					break;
				}
			}
			//rest lines
			foreach ($pf as $line) {
				$subtemplates .= trim($line);
			}
			$_pattern[0] = explode(',', $subtemplates);
			$_pattern[1] = (array) $joins;
			//print_r($_pattern);
			//return ($_pattern);
			
			//render pattern
			if (is_array($_pattern)) {
				$pattern = (array) $_pattern[0];
				$join = (array) $_pattern[1];				
				
				//make pseudo-items arrray
				$maxitm = count($pattern);
				for($i=1;$i<=$maxitm;$i++)
					$items[] = array(0=>$i, 1=>'test item title'.$i, 2=>'test decr'.$i, 14=>'http://placehold.it/680x300');
				//print_r($items);
				
				//render
				$out = null;
				$tts = array();
				$gr = array();
				$itms = array();
				$cc = array_chunk($items, count($pattern));//, true);

				foreach ($cc as $i=>$group) {
					foreach ($group as $j=>$child) {
						//echo $path . $pattern[$j] . '<br>';
						$tts[] = $this->ct($path . $pattern[$j], $child, true);
						if ($cmd = $join[$j]) {
							//echo $path . $join[$j] . '<br>';
							switch ($cmd) {
							    case '_break' : $out .= implode('', $tts); break;
								default       : $out .= $this->ct($path . $cmd, $tts, true);		
							} 
							unset($tts);
						}
					}
					$gr[] = (empty($tts)) ? $out : $out . implode('', $tts) ;
					unset($tts);
					$out = null;
				}
			}//has pattern data
		}//has pattern
		
		$subtemplate = str_replace($this->template_ext, $this->template_subext, $template);
		if ($subtemplatedata = @file_get_contents($path . $subtemplate)) {
			
			$itms[] = (!empty($gr)) ? implode('',$gr) : null;
			if (!empty($itms))
				$ret = $this->combine_tokens($subtemplatedata, $itms, true);				
		}	
		else
			$ret = (!empty($gr)) ? implode('',$gr) : null;
						
		$templatedata = @file_get_contents($path . $template);
		$data = ($ret) ? str_replace('<!--?'.$subtemplate.'?-->', $ret, $templatedata) : $templatedata;
					
		if ($data) {				
			$path2save = ($this->isDemoUser()) ? $this->urlpath . '/' : $this->prpath;
			@file_put_contents($path2save . '_pview.html', $data, LOCK_EX);

			$frame = "<iframe src =\"_pview.html\" width=\"100%\" height=\"540px\"><p>Your browser does not support iframes</p></iframe>";    	
			return ($frame);	
		}

		return null;
	}	
	
	protected function saveTemplate() {
		$path = $this->templatepath;
		$template_name = GetParam('tmplname');
		if (!$template_name) return false;
		
		$this->savedname = stristr($template_name, '.html') ? $template_name : $template_name . '.html';
		
		$preghref = '/<a(.*)href="([^"]*)"(.*)>/';
		$pregCallback = function ($m) { 
			if (stristr($m[2], 'phpdac'))	
				return "<a{$m[1]}href=\"{$m[2]}\"{$m[3]}>"; //as is
			else
				return	"<a{$m[1]}href=\"<phpdac>rcbulkmail.encUrl use {$m[2]}+1</phpdac>\"{$m[3]}>";
		};		

		//if (is_readable($path . $this->savedname)) {
		if ($template = GetParam('template_text')) {	

			if ($this->isDemoUser()) 	
				$text = preg_replace_callback($preghref, $pregCallback, $template);
			else 	  
				$text = preg_replace_callback($preghref, $pregCallback, $template);	
		
		    //save pattern
			$pattern_file = str_replace($this->template_ext, '', $this->savedname) . '.pattern.txt';
			if ($pattern = GetParam('pattern_text'))
				$ret = @file_put_contents($path . $pattern_file, $pattern, LOCK_EX);
			
			//save subtemplate
			$subtemplate_file = str_replace($this->template_ext, $this->template_subext, $this->savedname);
			if ($subtemplate = GetParam('subtemplate_text'))
				$ret = @file_put_contents($path . $subtemplate_file, $subtemplate, LOCK_EX);			
		
		    //save template
			if ($template_copy = GetParam('stemplate')) //as stored in html form
				$subtemplate_copy = str_replace($this->template_ext, $this->template_subext, $template_copy);
			
			//in case of copy, replace subtemplate name
			$this->newtemplatebody = str_replace('<!--?'.$subtemplate_copy.'?-->', '<!--?'.$subtemplate_file.'?-->', $text); 
			$ret = @file_put_contents($path . $this->savedname, $this->newtemplatebody, LOCK_EX); 

			return ($ret);			
		}	
		
		return false;
	}		
	
	public function userRealm() {
       $db = GetGlobal('db');	
	
	   if ($UserName) {
		    $sSQL = 'select fname from users where username=' . $db->qstr($this->owner);
			//echo $sSQL;
			$result = $db->Execute($sSQL,2);
			return ($result->fields[0]);
	   }
	   return false;
	}
	
	////build when post a new campaign or fetch existed
	protected function _CID($a=null, $b=null, $c=null) {
		
		if ($a && $b && $c) { //build
			$cid = md5($a . '|' . $b .'|'. $c);
		}
		else {
			if ($text = GetParam('mail_text')) //new posted campaign
				$cid = md5($text . '|' . GetParam('subject') .'|'. GetParam('submail'));
			else //existed		
				$cid = $this->cid;	
				
		return ($cid);		
	}	
	
	public function viewCampaigns() {
		$db = GetGlobal('db');	
		
		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'owner=' . $db->qstr($this->owner);		
		
		$sSQL = 'select cdate,cid,title,timein from mailcamp where ' . $ownerSQL . ' and ';		   
		if ($text = GetParam('mail_text')) {
			//$cid = md5($text . '|' . GetParam('subject') .'|'. GetParam('submail'));
			$cid = $this->_CID($text, GetParam('subject'), GetParam('submail'));
			$sSQL .= "cid = " . $db->qstr($cid);	
			$sSQL .= GetParam('savecmp') ?  ' and active=1' : null; //temp camps without multiple selection
		}
        else		
			$sSQL .= "active=1";
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

		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'owner=' . $db->qstr($this->owner) . ' and ';			

		$sSQL = 'select cdate,cid,title from mailcamp where ' . $ownerSQL ;
		if ($text = GetParam('mail_text')) {
			//$cid = md5($text . '|' . GetParam('subject') .'|'. GetParam('submail')); //when new post
			$cid = $this->_CID($text, GetParam('subject'), GetParam('submail')); //when new post
			$sSQL .= " cid = " . $db->qstr($cid);	
			$sSQL .= GetParam('savecmp') ?  ' and active=1' : null; //temp camps without multiple selection
		}
        else {		
		    $choose = "<option value=\"\">Select...</option>";
			$sSQL .= " active=1";
		}	
		$sSQL .= " ORDER BY cdate desc";

        $mycid = $cid ? $cid : $this->cid; //new post or load camp request  		

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
	
		$url = ($taction) ? seturl('t='.$taction.'&cid=',null,null,null,null) : 
		                    seturl('t=cpviewcamp&cid=',null,null,null,null);
		
	 
		$ret .= "<select name=\"$name\" onChange=\"location=this.options[this.selectedIndex].value\" $class>"; 
		$ret .= $choose ? $choose : null; //"<option value=\"\">Select...</option>";
		//print_r($resultset);
		
		if (empty($resultset)) return null;
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
	
	protected function load_campaign($reset=false) {
		$db = GetGlobal('db');		
        if (!$this->cid) return false;
		
		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'owner=' . $db->qstr($this->owner);	
		$cidSQL = $ownerSQL ? 'and cid='.$db->qstr($this->cid) : 'cid='.$db->qstr($this->cid);	
		/*
		if ($reset) {
			//fetch ulists from bcc to cc
			$rSQL = "update mailcamp set ulists=bcc where " . $ownerSQL . $cidSQL; 
			$db->Execute($rSQL);
			$rSQL = "update mailcamp set bcc='' where " . $ownerSQL . $cidSQL; 			
			$db->Execute($rSQL);			
			
			$this->messages[] = 'Reload campaign';			
		}
		*/
		$sSQL = 'select title,cdate,ulists,cc,bcc,user,pass,server from mailcamp where '. $ownerSQL . $cidSQL;
		$res = $db->Execute($sSQL);
		
		SetParam('subject', $res->fields[0]); //make it global to used be html form
		SetParam('ulists', $res->fields[2]); //
		SetParam('from', $res->fields[3]); // from cc
		SetParam('bcc', $res->fields[4]); // bcc saved as hidden xbcc
			
		//make it global to used be html form (hide default settings)
		if ($res->fields[5]!=$this->mailuser) SetParam('user', $res->fields[5]); //alternative mail user
		if ($res->fields[6]!=$this->mailpass) SetParam('pass', $res->fields[6]); //alternative mail pass
		if ($res->fields[7]!=$this->mailserver) SetParam('server', $res->fields[7]); //alternative mail server
		
		//fetch user realm from users
		$realm = $this->userRealm();		
		$m_realm = $realm ? $realm : $this->mailname; 
		SetParam('realm', $m_realm);

		return ($rec[0]); //one rec
	}			
	
	protected function preview_campaign() {
		$db = GetGlobal('db');	
        if (!$this->cid) return false; //die("CID error");
		
		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'owner=' . $db->qstr($this->owner);
        $cidSQL = $ownerSQL ? 'and cid='.$db->qstr($this->cid) : 'cid='.$db->qstr($this->cid);	
		
		$sSQL = 'select body from mailcamp where '. $ownerSQL . $cidSQL;
        //echo $sSQL;		
		
		$result = $db->Execute($sSQL,2);
		$text = base64_decode($result->fields[0]); 
		
		return ($text);
	}
	
	protected function delete_campaign() {
		$db = GetGlobal('db');	
        if (!$this->cid) return false; //die("CID error");
		
		if ($this->isDemoUser()) {
			$this->messages[] = "Campaign NOT deleted (demo user).";//localize('_delcamp', getlocal());
			return true;
		}	
		
		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'owner=' . $db->qstr($this->owner);
        $cidSQL = $ownerSQL ? 'and cid='.$db->qstr($this->cid) : 'cid='.$db->qstr($this->cid);	
		
		$sSQL = 'update mailcamp set active=0 where '. $ownerSQL . $cidSQL;
        //echo $sSQL;		
		
		$resultset = $db->Execute($sSQL,1);
		
		if ($db->Affected_Rows()) {
			$this->messages[] = localize('_delcamp', getlocal());
			return true;
		}	
		
		return false;
	}	
	
    /*type : 0 save text as mail body /1 save collections as text to reproduce (offers, katalogs) */	
    protected function save_campaign($type=null) {
        $db = GetGlobal('db'); 	
		$rtokens= null;
		$ctype = $type ? $type : 0;
		$r = rand(000001, 999999);
				
        $cc = GetParam('from'); //from origin		
		$to = GetParam('submail'); //to origin
		
		$bcc = null;//$this->getmails($to, true); //fetch mails plus 'to' origin //DISABLED
		$ulists = $this->getmails($to, false, ',');
		if (!$ulists) {
			$this->messages[] = 'Campaign NOT saved (no receipients)';
			return false;
		}	
		SetParam('taglists',$ulists); //used by form
		
		$m_user = GetParam('user') ? GetParam('user') : $this->mailuser; //user origin
		$m_pass = GetParam('pass') ? GetParam('pass') : $this->mailpass;//pass origin
		$m_server = GetParam('server') ? GetParam('server') : $this->mailserver; //server origin
		//make it global to used be html form (hide default settings)
		if ($m_user!=$this->mailuser) SetParam('user', $m_user); 
		if ($m_pass!=$this->mailpass) SetParam('pass', $m_pass);
		if ($m_server!=$this->mailserver) SetParam('server', $m_server);
        //fetch user realm from users
        $realm = $this->userRealm();		
		$m_realm = $realm ? $realm : $this->mailname; 
		SetParam('realm', $m_realm);
		
		$body = GetParam('mail_text');
		$title = GetParam('subject') ? GetParam('subject') : 'Campaign ' . $r;
		
		$date = date('Y-m-d H:m:s');
		//$cid = md5($body .'|'. $title .'|'. $to);
		$cid = $this->_CID($body, $title, $to);
        $active = GetParam('savecmp') ? 1 : 0;	
		
		if ($viewashtml = GetParam('webviewlink')) {
			$pageurl = $this->webview ? $this->encUrl($this->savehtmlurl):
										$this->encUrl($this->savehtmlurl . $cid . '.html');
			$plink = "<a href='$pageurl'>".localize('_here',getlocal())."</a>";	
			
			$text = str_replace('_WEBLINK_',$plink, GetParam('webviewtext'));	//replace special words		
			$rtext = $this->add_remarks_to_hide($text); //add remark to easilly remove 
			//if use tokens place at atoken
			if ($hastokens = GetParam('usetokens')) 
				$rtokens[0] = $this->add_remarks_to_hide($text); 
			else  //else at end of body
				$body = str_replace('</body>',$rtext .'</body>', $body);							   	
		}
		else
			$rtokens[0] = ''; //dummy token to replace if $0$ exist in page
		
		if ($unsublink = GetParam('unsubscribelink')) {
			$unlink = "<a href=\"" . $this->encUrl($this->url . '/unsubscribe/') ."\">".localize('_here',getlocal())."</a>";			
			
			$text = str_replace(array('_UNSUBSCRIBE_','_MAILSENDER_'),array($unlink, $cc), GetParam('unsubscribetext'));			
			$rtext = $this->add_remarks_to_hide($text);
			//if use tokens place at atoken
			if ($hastokens = GetParam('usetokens'))
				$rtokens[1] = $this->add_remarks_to_hide($text);
			else //else at end of body
				$body = str_replace('</body>',$rtext .'</body>', $body);		
		}
		else
			$rtokens[1] = ''; //dummy token to replace if $1$ exist in page
		
		$body =  $this->combine_tokens($body, $rtokens); //in case of tokens	
		
		
		if (defined('RCCOLLECTIONS_DPC')) 
			$collection = GetGlobal('controller')->calldpc_var("rccollections.savedlist");
		else
			$collection = '';	
  
        $sSQL = "insert into mailcamp (cid,ctype,cdate,active,title,ulists,cc,bcc,template,body,collection,owner,user,pass,name,server) values (";
	    $sSQL .= $db->qstr($cid).",".
		         $ctype .",". 
				 $db->qstr($date).",$active,".
	             $db->qstr($title).",".
				 $db->qstr($ulists).",".
				 $db->qstr($cc).",".
				 $db->qstr($bcc).",".
				 $db->qstr($this->template).",".
				 $db->qstr(base64_encode($body)).",".
				 $db->qstr($collection).",".
				 $db->qstr($this->owner).",".
				 $db->qstr($m_user).",".
				 $db->qstr($m_pass).",".
				 $db->qstr($m_realm).",".
				 $db->qstr($m_server).				 
				 ")"; 
        //echo $sSQL;
		$result = $db->Execute($sSQL,1);
		
		if ($db->Affected_Rows()) {
			$this->messages[] = $active ? 'Campaign stored' : 'Campaign is temporary';
			
			//save the file
			if ($p = $this->savehtmlpath) {
				$s = @file_put_contents($p .'/'. $cid . '.html' , $body, LOCK_EX);	
				
				if ($s) 
					$this->messages[] = 'Saved as ' . $this->savehtmlurl . $cid . '.html';
				else
					$this->messages[] = $this->savehtmlurl . $cid . '.html NOT saved!';				
			}
			
			//reset campaign
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
		
		$cid = $this->_CID(GetParam('mail_text'), GetParam('subject'), GetParam('submail'));
		
		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'owner=' . $db->qstr($this->owner);
        $cidSQL = $ownerSQL ? 'and cid='.$db->qstr($cid) : 'cid='.$db->qstr($cid);			
		
		$sSQL = 'select ulists from mailcamp where '. $ownerSQL . $cidSQL;
		$res = $db->Execute($sSQL);
		
		$c = $res->fields[0];
		$list = strstr($c, ',') ? explode(',',$c) : array(0=>$c);
		foreach ($list as $m)
			$oret[] = $option ? "<option value='".$m."'>". $m."</option>" : $m;
        		
		if (is_array($oret))
			$ret = $option ? implode('',$oret) : implode(';',$oret);
		
		return ($ret);		
		
		/*$db = GetGlobal('db');
		
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
		//foreach ($resultset as $n=>$rec) {
		
        $bcc = $resultset->fields[0];		
		$csv = explode(';', $bcc); //$rec[0]);
		$nfm = intval(count($csv));
		$this->messages[] =  'Mails in campaign :' . $nfm;
		$bid = ceil( $nfm / $this->maxinpvars); //static batchid always in max val
		
		//also must reduce input array by the mails that already send (here)
		if (GetParam('FormAction')) { //means that there is post to send
			$index = ($bid - $this->batchid);//+1;
			$lim = $this->maxinpvars * $index;
			//echo 'index:',$index,' bid:',$bid,' batchid:',$this->batchid,' lim:',$lim ; 
			foreach ($csv as $i=>$m) {
				if ($i >= $lim) //check for mail list bigger than max input vars
					$oret[] = $option ? "<option value='".$m."'>". $m."</option>" : $m;
			}	
		}	
		else {
			foreach ($csv as $m)
				$oret[] = $option ? "<option value='".$m."'>". $m."</option>" : $m;
        }		
		
		if (is_array($oret))
			$ret = $option ? implode('',$oret) : implode(';',$oret);
		
		return ($ret);*/
	}	
	
	
	protected function get_mails_from_lists($listname=null, $retarray=false) {
		$db = GetGlobal('db');	
		$ulistname = $listname ? $listname : 'default';
		$out = null; 
	   
		$sSQL .= "SELECT email FROM ulists where listname=" . $db->qstr($ulistname); 
		$sSQL .= " and active=1";
		//echo $sSQL;	
		$result = $db->Execute($sSQL,2);
	   
		if (count($result)>0) {		   
			foreach ($result as $n=>$rec) {
				if ($m = $this->checkmail(trim($rec['email']))) 		 
					$ret[] = trim($m);
			}
		}
	   
		if (!empty($ret)) {  
	        if ($retarray)
				return (array_unique($ret));
			else		
				return (implode(';',$ret));
		}

		return false;		   
	}
	
	
	protected function checkmail($mail=null) {
		if (!$mail) return false;
		
		if ($this->_checkmail($mail))
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

	protected function csvTrim($mail=null) {
		$ret = str_replace(array("\r\n", "\r", "\n", " "), array("","","",""), $mail);
		return $ret;
	}
	
	
	//demo user allow 3max csv list
	protected function getmails($mail=null, $fetchlist=false, $sep=null) {
        $db = GetGlobal('db');	
		$this->messages[] = 'Get mails...'; 
		$ret = null;
		$_s = $sep ? $sep : ';';
		
		$mails = $mail ? $mail : null;
		
		/*combo with reload func*/
	    if ((!$this->isDemoUser()) && ($selectedlist = $_POST['myulistselector'])) {
			$this->messages[] = 'Call mail list ' . $this->ulistselect;
			
			$_ulistselect = $fetchlist ? $this->get_mails_from_lists($this->ulistselect) : $this->ulistselect; //just the name
			$mails .= $_s .  $_ulistselect; 	   
		}	
		
		/*multiple combo as alternatives */
		if ((!$this->isDemoUser()) && ($altlist = $_POST['ulistname'])) {
			if (is_array($altlist)) {
				$lm = null;
				foreach ($altlist as $i=>$list) {
				   $this->messages[] = 'Call mail list ' . $list; 	
				   $_list = $fetchlist ? $this->get_mails_from_lists($list) : $list; //just the name
				   $lm .= $_s . $_list;
				}   
				$mails .= $lm;
			}
			else {
				$this->messages[] = 'Call mail list ' . $altlist; 
				$_list = $fetchlist ? $this->get_mails_from_lists($altlist) : $altlist; //just the name
				$mails .= $_s . $_list;			
			}	
		}
		
		/*csv addons */
		if ($csvlist = $_POST['csv']) { 
		    $this->messages[] = 'Call csv mail list '; 
			
		    $m = explode(',', $csvlist); //comma sep value
			if (is_array($m)) {
				
			  if ($this->isDemoUser())  { //demo user
			    $max = (count($m)<2) ? count($m) : 2; //max 3 addresess (2csv+'to')
				for ($i=0;$i<$max;$i++) { 
					$tcsvMail = $this->csvTrim($m[$i]);
                    if ($ml = $this->checkmail($tcsvMail)) 					
						$mails .= $_s . $ml;
				}	
			  }
			  else {	
				foreach ($m as $csvmail) {
					$tcsvMail = $this->csvTrim($csvmail);
                    if ($ml = $this->checkmail($tcsvMail)) 					
						$mails .= $_s . $ml;
				}	
              }				
			}
			else {  //one address
				$tcsvList = $this->csvTrim($csvlist); 
			    $ml = $this->checkmail($tcsvList);	
				$mails .= $ml  ? $_s . $tcsvList : '';
			}			
		}
	   
	    /*app users checkbox*/
	    if ((!$this->isDemoUser()) && ($users = $_POST['siteusers'])) {		
			$seclevid = 1;
			$this->messages[] = 'Call user mail list ' . $seclevid;			
			 
			$sSQL .="SELECT email FROM users where";	
			$sSQL .= " seclevid=" . $seclevid; //1 SEC LEVEL USERS
		    $sSQL .= " and notes='ACTIVE'";	//NOT THE INACTIVE USERS   

			$result = $db->Execute($sSQL,2);	
	   
			if ($db->Affected_Rows()>0) {		   
				foreach ($result as $n=>$rec) {
                    if ($m = $this->checkmail(trim($rec[0]))) 					
						$ret[] = $m;
				}
			} 
			if (!empty($ret)) {  
				$mails .= $_s . implode($_s,$ret); 
			}
	    }
		
	    /*app customers checkbox*/
	    if ((!$this->isDemoUser()) &&($users = $_POST['sitecusts'])) {
		
			$this->messages[] = 'Call customers mail list ';			
			  
			$sSQL .="SELECT mail FROM customers ";	 
			$result = $db->Execute($sSQL,2);
	   
			if ($db->Affected_Rows()>0) {		   
				foreach ($result as $n=>$rec) {
                    if ($m = $this->checkmail(trim($rec[0]))) 					
						$ret[] = $m;
				}
			}
			if (!empty($ret)) {  
				$mails .= $_s . implode($_s,$ret); 
			}
	    }
		
		if ($mails) {
			$mcsv = explode($_s, str_replace($_s . $_s, $_s, $mails)); //clean ;;->;
			//print_r($mcsv);
			//some clean
			foreach ($mcsv as $i=>$m)
				if ($m) $subs[] = $m;
				
			$uret = array_unique($subs);
			$this->messages[] = 'Extract duplicate mails';
			$ret = implode($_s, $uret);
		}	
	    //echo $ret,'>'; 
	    return $ret;	
	}			
	
	/*on resend or batch send */
	protected function batch_campaign($xcid=null, $step=1, $ulist=null, $segment=null, $bcc=null) {
		$db = GetGlobal('db');		
		$cid = $xcid ? $xcid : $this->cid;
        if (!$cid) return false;
		
		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'owner=' . $db->qstr($this->owner);	
		$cidSQL = $ownerSQL ? 'and cid='.$db->qstr($this->cid) : 'cid='.$db->qstr($this->cid);	
		
		$sSQL = 'update mailcamp set active=1, ctype=' . $step; //enable by updat if not enabled
		if (($ulist) && ($segment)) {//email or ulist
			//remove tag from ulists and move to bcc
			$sSQL .= ", ulists= REPLACE(ulists, " . $db->qstr($segment) . ", '')" ;
			//modify bcc tag
			$mybcc = $bcc ? $bcc .','.$segment : $segment;
			$sSQL .= ", bcc=" . $db->qstr($mybcc);
		}
		$sSQL .= ' where '. $ownerSQL . $cidSQL;
        //echo $sSQL;		
		
		$resultset = $db->Execute($sSQL);

		return true;
	}	
	
	protected function send_mails() {	  
        //check expiration key
        if ($this->appkey->isdefined('RCBULKMAIL')==false) {
	        //$this->messages[] = "Failed, module expired.";
		    //return false;  //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< appkey --------------------------!!
	    }

		if (!$cid = $this->cid) { //jqgrid present (select cid,.. zero on post)
			$this->messages[] = 'CID form error!';
			return false;		
        }
		if (!$from = GetParam('from')) {
			$this->messages[] = 'From field missing!';
			return false;
		}		
		if (!$subject = GetParam('subject')) {
			$this->messages[] = 'Subject field missing!';
			return false;
		}				
		
		if (GetParam('include')) {
			
			if (is_readable($this->savehtmlpath .'/'. $cid.'.html')) {
				
				$rawtext = @file_get_contents($this->savehtmlpath .'/'. $cid.'.html'); //$this->mailbody; //not exist in this post			
				$res = $this->sendit($from, $subject, $rawtext, $cid); 
				if (!$res) 
					$this->messages[] = $this->batchid ? "Batch send" : "Send failed";				
				
				return ($res); 
			}
			else $this->messages[] = 'File not exist ('. $this->savehtmlpath .'/'. $cid . '.html)';			
		}
		else $this->messages[] = "No recipients, send failed";
		
	    return false;   
	}	
	
	protected function sendit($from,$subject,$mail_text='',$cid=null) {
	    if (!$mail_text) {
		    $this->messages[] = 'Failed: Empty content';	
			return 0; 
		}	 
		
		$i = 0;
		$meter = 0;
		$mailuser = GetParam('user') ? GetParam('user') : $this->mailuser;
		$mailpass = GetParam('pass') ? GetParam('pass') : $this->mailpass;
		$mailserver = GetParam('server') ? GetParam('server') : $this->mailserver;
		$mailname = GetParam('realm') ? GetParam('realm') : $this->mailname; //a per user submit (realm)
		$from = $mailuser ? $mailuser : $from; //replace sender when another server settings ? 
		
		$bcc = GetParam('xbcc');
		$inc = GetParam('include'); 
		//echo $inc;
		//clean to from remaing commas while batch move names
		for ($i=0;$i<strlen($inc);$i++) 
			$to = (substr($inc,0,1)==',') ? substr($inc, 1) : $inc;
		$cc = $to ? (strstr($to ,',') ? explode(',', $inc) : array(0=>$to)) : null; //ulist csv text or one element
        //echo $to; print_r($cc);echo $bcc;
    
		if ($cc) {		
		
			set_time_limit(120); 
		
			foreach ($cc as $z=>$m) {
		
				if ($ismail = filter_var($m, FILTER_VALIDATE_EMAIL)) {
		
					//test (create batch) 					
					if ($z==$this->maxinpvars) { //one by one
						$bid = $this->maxinpvars;;
						break 1;	
					}	
					
					$text = str_replace('_SUBSCRIBER_', $m, $mail_text); 	
					$meter += ($z<3) ?  $this->sendmail_instant($from,$m,$subject,$text,$this->ishtml,$mailuser,$mailpass,$mailname,$mailserver) :
										$this->sendmail_inqueue($from,$m,$subject,$text,$this->ishtml,$mailuser,$mailpass,$mailname,$mailserver);
					$i=1; //batch					
				}
				else {//list name
				    if ($m) {
					$bcc = null;//$this->get_mails_from_lists($m, true);
					echo 'List:'.$m;
					
					if (!empty($bcc)) {
						foreach ($bcc as $z1=>$m1) {
							
							//break if num of mails bigger than a number (create batch) 					
							if ($z1==$this->maxinpvars) { 
								$bid = $this->maxinpvars;
								break 2;								
							}
							$text = str_replace('_SUBSCRIBER_', $m1, $mail_text); 	
							$meter += $this->sendmail_inqueue($from,$m1,$subject,$text,$this->ishtml,$mailuser,$mailpass,$mailname,$mailserver);								
						}
						$i+=1; //batch
					}
					}//empty string
				}
				$this->batch_campaign($cid ,1, $to, $m, $bcc); 
			}	
			
			set_time_limit(ini_get('max_execution_time'));	//return to default			
					
		} 
		else $this->messages[] =  'Send failed: NO receipients (cc)';
	
		$this->messages[] = $meter . ' mail(s) sent';		
				
		$this->batchid = $bid ? $bid : 0;				
		return ($bid ? false : true);
    }	
	
	//send mail to db queue
	protected function sendmail_inqueue($from,$to,$subject,$mail_text='',$is_html=false,$user=null,$pass=null,$name=null,$server=null) {
		$db = GetGlobal('db');		
		$ishtml = $is_html?$is_html:0;
		$altbody = null;
		$origin = $this->prpath; 
		$encoding = $this->overwrite_encoding ? $this->overwrite_encoding : $this->encoding;
		$datetime = date('Y-m-d h:s:m');
		$active = 1;		
		$cid = $this->cid; 
		
		//test
		return 1; //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	   
		//tracking var
		if ($this->trackmail) {
	     		 
			$trackid = $this->get_trackid($from,$to);
		 
			if (!$ishtml) {
				$ishtml = 1;
				$html_mail_text = '<html><body>' . $mail_text . '</body></html>';
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
	    
		$sSQL = "insert into mailqueue (timein,active,sender,receiver,subject,body,altbody,cc,bcc,ishtml,encoding,origin,user,pass,name,server,trackid,cid,owner) ";
		$sSQL .=  "values (" .
			 $db->qstr($datetime) . "," . 
			 $active . "," .
		     $db->qstr(strtolower($from)) . "," . 
			 $db->qstr(strtolower($to)) . "," .
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
			 $db->qstr($cid) . "," .
			 $db->qstr($this->owner) . ")";
			 
		//echo $sSQL,'<br>';			
		$result = $db->Execute($sSQL,1);			 
		$ret = $db->Affected_Rows();    
 
		return ($ret);			 
	}	
	
	//send mail to db queue
	protected function sendmail_instant($from,$to,$subject,$mail_text='',$is_html=false,$user=null,$pass=null,$name=null,$server=null) {
		$db = GetGlobal('db');		
		$ishtml = $is_html?$is_html:0;
		$altbody = null;
		$origin = $this->prpath; 
		$encoding = $this->overwrite_encoding ? $this->overwrite_encoding : $this->encoding;
		$datetime = date('Y-m-d h:s:m');
		$active = 0; 		
		$cid = $this->cid; 
	   
		//tracking var
		if ($this->trackmail) {
	     		 
			$trackid = $this->get_trackid($from,$to);
		 
			if (!$ishtml) {
				$ishtml = 1;
				$html_mail_text = '<html><body>' . $mail_text . '</body></html>';
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
		
		//inseert as deactivated queue tasks (to keep track)
		$sSQL = "insert into mailqueue (timein,timeout,active,sender,receiver,subject,body,altbody,cc,bcc,ishtml,encoding,origin,user,pass,name,server,trackid,cid,owner) ";
		$sSQL .=  "values (" .
			 $db->qstr($datetime) . "," . 
			 $db->qstr($datetime) . "," . //timeout = timein
			 $active . "," .
		     $db->qstr(strtolower($from)) . "," . 
			 $db->qstr(strtolower($to)) . "," .
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
			 $db->qstr($cid) . "," .
			 $db->qstr($this->owner) . ")";
			 
		//echo $sSQL,'<br>';			
		$result = $db->Execute($sSQL,1);			 
		$ret = $db->Affected_Rows();   		

		$ret = $this->sendmail($from,$to,$subject,$body,$this->ishtml,$user,$pass,$name,$server);		
 
		return ($ret);			 
	}	
	
    protected function sendmail($from,$to,$subject,$mail_text='',$is_html=false) {
		$sFormErr = GetGlobal('sFormErr');
		$err = null; 

		if (($this->_checkmail($to)) && ($subject)) {//echo $to,'<br>';
	   
         $smtpm = new smtpmail($this->encoding,$this->mailuser,$this->mailpass,$this->mailname,$this->mailserver);
		   	   
         if ((SMTP_PHPMAILER=='true') || ($method=='SMTP')) {
	       //echo 'smtp';
		   $smtpm->from($from,$this->mailname);		   
		   $smtpm->to($to);  
		   $smtpm->subject($subject);
		   $smtpm->body($mail_text,$is_html);		   			   	   
	     }
         elseif ((SENDMAIL_PHPMAILER=='true') || ($method=='SENDMAIL')) {	  	   
		   //echo 'phpmailer';
		   $smtpm->from($from,$this->mailname);		   
		   $smtpm->to($to);  			    
		   $smtpm->subject($subject);
		   $smtpm->body($mail_text,$is_html);		  		      
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
			$this->messages[] = localize('_msgsuccess',getlocal());	//send message ok
			return true;
		 }         
		 else 
			$this->messages[] = "Error: " . $err;	//error
		}
		else 
			$this->messages[] = localize('_msgerror',getlocal());
		 
	   return (false);	  	   
    } 	
	
	/*when web view hide texts */
	protected function add_remarks_to_hide($text=null) {
		//remark used to rename when webview (not to show as web page)
		$ret = "<!--REMARK--><p>" . $text. "</p><!--REMARK-->";
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
	
	public function spam_conditions_text() {
		$lan = getlocal() ? 1 : 0;
		
		$text0 = "This e-mail sent to _SUBSCRIBER_ from _MAILSENDER_. This e-mail can not be considered spam as long as we include: Contact information & remove instructions. 
If you have somehow gotten on this list in error, or for any other reason would like to be removed, please click _UNSUBSCRIBE_. 
This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. Any unauthorized disclosure, use of dissemination, either whole or partial, is prohibited.
(Relative as A5-270/2001 of European Council).";
	  
		$text1 = "Αυτο το e-mail στάλθηκε στον λογαριασμό ηλ. ταχυδρομείου _SUBSCRIBER_ από τον λογαριασμό _MAILSENDER_. Δεν μπορει να θεωρηθεί spam εφόσον αναγράφονται τα στοιχεία του αποστολέα και διαδικασίες διαγραφής απο την λίστα παραληπτών.  
Αν είσαστε σε αυτή τη λίστα κατα λάθος ή για οποιονδήποτε άλλο λογο θέλετε να διαγραφεί το e-mail απο αυτή τη λίστα παραληπτών e-mail απλά πατήστε _UNSUBSCRIBE_.   
Το μήνυμα πληρεί τις προυποθέσεις της Ευρωπαικής Νομοθεσίας περί διαφημιστικών μηνυμάτων. Κάθε μήνυμα θα πρέπει να φέρει τα πλήρη στοιχεια του αποστολέα ευκρινώς και θα πρέπει να δίνει στο δέκτη τη δυνατότητα διαγραφής. 
(Directiva 2002/31/CE του Ευρωπαικού Κοινοβουλίου).";	

        $ret = $lan ? $text1 : $text0;	
		return ($ret);
    }		
	
	public function encUrl($url, $nohost=false) {
		if ($url) {
			
			if (($this->isHostedApp)&&($nohost==false)) {
				$burl = explode('/', $url);
				array_shift($burl); //shift http
				array_shift($burl); //shift //
				array_shift($burl); //www //
				$xurl = implode('/',$burl);
				//$qry = 'a='.$this->appname.'&u=' . $xurl . '&cid=_CID_' . '&r=_TRACK_';
				$qry = 't=mt&a='.$this->appname.'_AMP_u=' . $xurl . '_AMP_cid=_CID_' . '_AMP_r=_TRACK_'; //CKEditor &amp; issue				
			}
			else {
				//$xurl = $url; //as is
				$qry = 't=mt&u=' . $url . '_AMP_cid=_CID_' . '_AMP_r=_TRACK_'; //CKEditor &amp; issue				
			}	
			
			$uredir = $this->urlRedir .'?'. $qry; //'?turl=' . $encoded_qry;
			
			/*RewriteRule ^m/([^/]*)/([^/]*)/([^/]*)/([^/]*)/$ /mtrackurl.php?t=mtrack&a=$1&u=$2&cid=$3&r=$4 [L] */
			//$uredir = $this->urlRedir2 .'/'. $this->appname .'/'. str_replace('/','-', $xurl) . '/_CID_/_TRACK_/' ; // htaccess / problem
			
			return ($uredir); 
		}
		else
			return ('#');
	}
	
	protected function add_urltracker_to_mailbody($mailbody=null,$id=null,$cid=null) {

		$ret = str_replace(array('_TRACK_','_CID_','_AMP_'), array(base64_encode($id), $cid, "&"), $mailbody);
		return ($ret);
	}
	

    public function ckeditorjs($element=null, $maxmininit=false, $disable=false) {
		//CKEDITOR.config.basicEntities = false;
		//CKEDITOR.config.htmlEncodeOutput = false;	
	    //...		
		//ckeditor attributes depend on template edit new / mail text
		//$readonly = (($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? 0 : 1;  
		$readonly = $disable ? 1 : 0;  
	
        //$element_name = (($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? 'template_text' : 'mail_text';	
		$element_name = $element ? $element : ((($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? 'template_text' : 'mail_text');
		
		//minmax only when select for new/edit not when select for mail sent
		//$minmax = (($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? ($_GET['stemplate'] ? 'maximize' : 'minimize') : 'minimize' ;
		$minmax = $maxmininit ? $maxmininit : ($_GET['stemplate'] ? 'maximize' : 'minimize') ;
		//echo $minmax;	
		
	    $ckattr = ($this->ckeditver==4) ?
	           "fullpage : true,"	  
	           : 
	           "skin : 'v2', 
			   fullpage : true, 
			   extraPlugins :'docprops',";		
		
		$ret = "
			<script type='text/javascript'>
	           CKEDITOR.replace('$element_name',
			   {
				$ckattr	
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
			   CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
			   CKEDITOR.config.forcePasteAsPlainText = false; // default so content won't be manipulated on load
			   CKEDITOR.config.fullPage = true;
               CKEDITOR.config.entities = false;
			   CKEDITOR.config.basicEntities = false;
			   CKEDITOR.config.entities_greek = false;
			   CKEDITOR.config.entities_latin = false;
			   CKEDITOR.config.entities_additional = '';
			   CKEDITOR.config.htmlEncodeOutput = false;
			   CKEDITOR.config.entities_processNumerical = false;
			   CKEDITOR.config.fillEmptyBlocks = function (element) {
				return true; // DON'T DO ANYTHING!!!!!
               };
			   CKEDITOR.config.allowedContent = true; // don't filter my data	
			   CKEDITOR.config.protectedSource.push( /<phpdac[\s\S]*?\/phpdac>/g );
			   CKEDITOR.on('instanceReady',
               function( evt )
               {
                  var editor = evt.editor;
                  editor.execCommand('$minmax');
				  editor.setReadOnly($readonly);
               });			   
		    </script>		
";
		return ($ret);
	}	

	protected function select_template($tfile=null) {
		if (!$tfile) return;
	  
		$template = $tfile . '.htm';	
		$t = $this->prpath . 'html/'. $this->cptemplate .'/'. str_replace('.',getlocal().'.',$template) ;   
		if (is_readable($t)) 
			$mytemplate = file_get_contents($t);

		return ($mytemplate);	 
    }	
	
	//tokens method	
	protected function combine_tokens($template, $tokens, $execafter=null) {
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
	
    //combine tokens with load tmpl data inside	
	public function ct($template, $tokens, $execafter=null) {
	    //if (!is_array($tokens)) return;
		$template_contents = @file_get_contents($template);
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template_contents; 
		  
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