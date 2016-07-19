<?php

$__DPCSEC['RCCRMOFFERS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ( (!defined("RCCRMOFFERS_DPC")) && (seclevel('RCCRMOFFERS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCRMOFFERS_DPC",true);

$__DPC['RCCRMOFFERS_DPC'] = 'rccrmoffers';

$v = GetGlobal('controller')->require_dpc('crypt/ciphersaber.lib.php');
require_once($v); 

$a = GetGlobal('controller')->require_dpc('libs/appkey.lib.php');
require_once($a);


$__EVENTS['RCCRMOFFERS_DPC'][0]='cpcrmoffers';
$__EVENTS['RCCRMOFFERS_DPC'][1]='cploadframe';
$__EVENTS['RCCRMOFFERS_DPC'][2]='cpmailbodyshow';
$__EVENTS['RCCRMOFFERS_DPC'][3]='cpsavedocument';
$__EVENTS['RCCRMOFFERS_DPC'][4]='cpsenddocument';
$__EVENTS['RCCRMOFFERS_DPC'][5]='cpsortcollection';
$__EVENTS['RCCRMOFFERS_DPC'][6]='cpaddcollection';
$__EVENTS['RCCRMOFFERS_DPC'][7]='cpviewcamp';
$__EVENTS['RCCRMOFFERS_DPC'][8]='cppreviewcamp';
$__EVENTS['RCCRMOFFERS_DPC'][9]='cpcampcontent';

$__ACTIONS['RCCRMOFFERS_DPC'][0]='cpcrmoffers';
$__ACTIONS['RCCRMOFFERS_DPC'][1]='cploadframe';
$__ACTIONS['RCCRMOFFERS_DPC'][2]='cpmailbodyshow';
$__ACTIONS['RCCRMOFFERS_DPC'][3]='cpsavedocument';
$__ACTIONS['RCCRMOFFERS_DPC'][4]='cpsenddocument';
$__ACTIONS['RCCRMOFFERS_DPC'][5]='cpsortcollection';
$__ACTIONS['RCCRMOFFERS_DPC'][6]='cpaddcollection';
$__ACTIONS['RCCRMOFFERS_DPC'][7]='cpviewcamp';
$__ACTIONS['RCCRMOFFERS_DPC'][8]='cppreviewcamp';
$__ACTIONS['RCCRMOFFERS_DPC'][9]='cpcampcontent';

$__LOCALE['RCCRMOFFERS_DPC'][0]='RCCRMOFFERS_DPC;Crm create offer;Crm σύνταξη προσφοράς';
$__LOCALE['RCCRMOFFERS_DPC'][1]='_MASSSUBSCRIBE;Mass subscribe;Μαζική εγγραφή συνδρομητών';
$__LOCALE['RCCRMOFFERS_DPC'][2]='_MAILCAMPAIGNS;Mail campaigns;Αποστολές σε συνδρομητές';
$__LOCALE['RCCRMOFFERS_DPC'][3]='_active;Active;Ενεργό';
$__LOCALE['RCCRMOFFERS_DPC'][4]='_sender;Sender;Αποστολέας';
$__LOCALE['RCCRMOFFERS_DPC'][5]='_receiver;Receiver;Παραλήπτης';
$__LOCALE['RCCRMOFFERS_DPC'][6]='_reply;Views;Εμφανίσεις';
$__LOCALE['RCCRMOFFERS_DPC'][7]='_subject;Subject;Θέμα';
$__LOCALE['RCCRMOFFERS_DPC'][8]='_id;Id;Α/Α';
$__LOCALE['RCCRMOFFERS_DPC'][9]='_wlists;Lists;Λίστες';
$__LOCALE['RCCRMOFFERS_DPC'][10]='_inlist;List;Σε λίστα';
$__LOCALE['RCCRMOFFERS_DPC'][11]='_sendtousers;Send to Users;Αποστολή σε χρήστες';
$__LOCALE['RCCRMOFFERS_DPC'][12]='_sendtolists;Send to Lists;Αποστολη σε λίστες';
$__LOCALE['RCCRMOFFERS_DPC'][13]='_savenewsletter;Save Newsletter;Αποθήκευση περιεχομένου';
$__LOCALE['RCCRMOFFERS_DPC'][14]='_options;Options;Ρυθμίσεις';
$__LOCALE['RCCRMOFFERS_DPC'][15]='_ACTIVE;Active;Ενεργό';
$__LOCALE['RCCRMOFFERS_DPC'][16]='_LISTNAME;List;Όνομα λίστας';
$__LOCALE['RCCRMOFFERS_DPC'][17]='_ID;Id;Α/Α';
$__LOCALE['RCCRMOFFERS_DPC'][18]='_BULKSUBSCRIBE;Bulk subscribe;Μαζική εισαγωγή';
$__LOCALE['RCCRMOFFERS_DPC'][19]='_MAILQUEUE;Mail list;Λίστα αποστολών';
$__LOCALE['RCCRMOFFERS_DPC'][20]='_MAILQUEUEACTIVE;Active queue;Πρός αποστολή';
$__LOCALE['RCCRMOFFERS_DPC'][21]='_SELECTITEMS;Select Items;Επιλογή στοιχείων';
$__LOCALE['RCCRMOFFERS_DPC'][22]='_OPTIONS;Options;Επιλογές';
$__LOCALE['RCCRMOFFERS_DPC'][23]='_status;Status;Κατάσταση';
$__LOCALE['RCCRMOFFERS_DPC'][24]='_mailstatus;Reason;Αιτία';
$__LOCALE['RCCRMOFFERS_DPC'][25]='_date;Date sent;Ημ. αποστολής';
$__LOCALE['RCCRMOFFERS_DPC'][26]='_unsubscribe;Unsubscribe;Διαγραφή απο την λίστα';
$__LOCALE['RCCRMOFFERS_DPC'][27]='_viewasweb;View as web page;Πατήστε εδώ για να δείτε την ιστοσελίδα';
$__LOCALE['RCCRMOFFERS_DPC'][28]='_notifications;Notifications;Ειδοποιήσεις';
$__LOCALE['RCCRMOFFERS_DPC'][29]='_viewallnotifications;View all notifications;Όλες οι ειδοποιήσεις';
$__LOCALE['RCCRMOFFERS_DPC'][30]='_MAILCLICKS;Responses;Ανταπόκριση';
$__LOCALE['RCCRMOFFERS_DPC'][31]='_dashboard;Dashboard;Στατιστικά';
$__LOCALE['RCCRMOFFERS_DPC'][32]='_year;Year;Έτος';
$__LOCALE['RCCRMOFFERS_DPC'][33]='_month;Month;Μήνας';
$__LOCALE['RCCRMOFFERS_DPC'][34]='_here;here;εδώ';
$__LOCALE['RCCRMOFFERS_DPC'][35]='_docid;Document;Έγγραφο';
$__LOCALE['RCCRMOFFERS_DPC'][36]='_MAILTRACE;Actions;Ενέργειες';
$__LOCALE['RCCRMOFFERS_DPC'][37]='_msgsuccess;Mail sent;Το μήνυμα στάλθηκε επιτυχώς';
$__LOCALE['RCCRMOFFERS_DPC'][38]='_msgerror;Sent error;Το μήνυμα απέτυχε να σταλθεί';
$__LOCALE['RCCRMOFFERS_DPC'][39]='_delcamp;Campaign deleted;Επιτυχής διαγραφή';

$__LOCALE['RCCRMOFFERS_DPC'][40]='_statisticscat;Category Viewed/Month;Επισκεψιμότητα κατηγοριών';
$__LOCALE['RCCRMOFFERS_DPC'][41]='_statistics;Items Viewed/Month;Επισκεψιμότητα ειδών';
$__LOCALE['RCCRMOFFERS_DPC'][42]='_transactions;Transaction/Month;Συναλλαγές ανα μήνα';
$__LOCALE['RCCRMOFFERS_DPC'][43]='_applications;Applications Birth/Month;Νεές εφαρμογές ανα μήνα';
$__LOCALE['RCCRMOFFERS_DPC'][44]='_appexpires;Applications Expires/Month;Ληξεις εφαρμογών ανα μήνα';
$__LOCALE['RCCRMOFFERS_DPC'][45]='_mailqueue;Mail send/Month;Σταλθέντα e-mail ανα μήνα';
$__LOCALE['RCCRMOFFERS_DPC'][46]='_mailsendok;Mail Received/Month;Παρεληφθέντα e-mail ανα μήνα';
$__LOCALE['RCCRMOFFERS_DPC'][47]='_income;Income;Εισόδημα';
$__LOCALE['RCCRMOFFERS_DPC'][48]='_moretrans;All transactions;Όλες οι συναλλαγές';
$__LOCALE['RCCRMOFFERS_DPC'][49]='_list;List;Λίστα';
$__LOCALE['RCCRMOFFERS_DPC'][50]='_campaign;Campaign;Καμπάνια';
$__LOCALE['RCCRMOFFERS_DPC'][51]='_code;Item;Κωδικός';
$__LOCALE['RCCRMOFFERS_DPC'][52]='_category;Category;Κατηγορία';
$__LOCALE['RCCRMOFFERS_DPC'][53]='_outoflist;out of list;εξήχθει απο';
$__LOCALE['RCCRMOFFERS_DPC'][54]='_FAILED;Bounce;Bounce';

class rccrmoffers {
	
	var $title, $prpath, $urlpath, $url, $mtrackimg;
    var $trackmail, $overwrite_encoding, $encoding, $templatepath;
	var $mailname, $mailuser, $mailpass, $mailserver, $user_realm;
	var $ishtml, $mailbody, $template_ext, $template_images_path, $template;
	var $messages, $disable_settings, $document, $doctitle;
	
	var $appname, $appkey, $cptemplate, $urlRedir;
	var $owner, $seclevid, $isHostedApp;
	
	var $userDemoIds, $ckeditver;
	var $visitor, $items, $csvitems;
		
    function __construct() {
	  
		$this->prpath = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');	
		$this->url = paramload('SHELL','urlbase');
		$this->title = localize('RCCRMOFFERS_DPC',getlocal());	

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
		
		$this->ishtml = true;
		$this->document = null;
	
		$this->appname = paramload('ID','instancename');
		$this->appkey = new appkey();			
		
		$this->messages = array(); //reset messages any time page reload - local msg system
		
		$this->urlRedir = remote_paramload('RCBULKMAIL','urlredir', $this->prpath);
		
		$tmpl = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->prpath);  
	    $this->cptemplate = $tmpl ? $tmpl : 'metro';	

		$settings = remote_paramload('RCBULKMAIL','settingsdisable', $this->prpath);		
		$this->disable_settings = $settings ? true : false; //form disable
		$this->user_realm = remote_paramload('RCBULKMAIL','userrealm', $this->prpath);
		
		$this->owner = $_POST['Username'] ? $_POST['Username'] : GetSessionParam('LoginName'); //decode(GetSessionParam('UserName'));	
		$this->seclevid = GetSessionParam('ADMINSecID');			

		$this->isHostedApp = remote_paramload('RCBULKMAIL','hostedapp', $this->prpath);
		$this->userDemoIds = array(5,6,7); //remote_arrayload('RCBULKMAIL','demouser', $this->prpath);
		
		$ckeditorVersion = remote_paramload('RCBULKMAIL','ckeditor',$this->prpath);		
		$this->ckeditver = $ckeditorVersion ? $ckeditorVersion : 4; //default version 4
		//override ckeditver
		$this->ckeditver = (($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? 3 : 4; //depends on select or edit/new template

		$this->visitor = GetParam('v');
		$this->items = null;	
		$this->csvitems = null;
		$this->doctitle = null;
	}
	
    function event($event=null) {
	
	    $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;

	    switch ($event) {
								
	        case 'cpviewcamp'      : //$this->load_campaign();
			                         break;			
									 
			case 'cppreviewcamp'   : break;
			case 'cpcampcontent'   : //die($this->preview_campaign());
			                         break;							 
			
			case 'cpaddcollection' : $this->addListToCollection(); //no break;
			case 'cpsortcollection': if (!empty($_POST['colsort'])) { 
										$slist = implode(',', $_POST['colsort']);	
										GetGlobal('controller')->calldpc_method("rccollections.saveSortedlist use " . $slist);
									  }
									  $this->loadTemplate(); 	
                                      break;			
			 	 
			 
	        case 'cpmailbodyshow' : die($this->show_mailbody());
		                            break; 			 
			 
		    case 'cploadframe'    : echo $this->loadframe('mailbody');
								    die();
		                            break;
									
										 
			case "cpsenddocument" :	$this->send_document();
									SetSessionParam('messages',$this->messages);
				                    break; 									 
			
	        case 'cpsavedocument' : $this->save_document();
									SetSessionParam('messages',$this->messages); 
			                        break;
														
			case 'cpcrmoffers'    :
			default               :	if ($this->template) 
										$this->loadTemplate();						  								
        }			
			
    }	

    function action($action=null)  { 	

        $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;
		
	    switch ($action) {										 
										 
			case 'cpmailbodyshow'      :
			case 'cploadframe'         :  									 
			
			case 'cpaddcollection'     :
			case 'cpsortcollection'    :
            case 'cpsavedocument'      :		
			case 'cpsenddocument'      :
			case 'cpcampcontent'       : 
			case 'cppreviewcamp'       : 
			case 'cpviewcamp'          : 
			case 'cpcrmoffers'         : 
		    default                    : $out = null;
		}		
		
        return ($out);
	}
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
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

		if( !eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" . "@([a-z0-9]+([\.-][a-z0-9]{1,})+)*$", $data, $regs) )  
			return false;

		return true;  
	}
	
	protected function checkmail($mail=null) {
		if (!$mail) return false;
		
		if ($this->_checkmail($mail))
			return ($mail);
		else 
			$this->messages[] = 'Invalid mail address ('. $mail .')';
		
		return false;	
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
	
	public function postSubmit($action, $title=null, $class=null) {
		if (!$action) return;
		$submit = $title ? $title : 'Submit';
		$cl = $class ? "class=\"$class\"" : null;
		 
        $c .= "<button type=\"submit\" name=\"submit\" value=\"" . $submit . "\" $cl />";  
        $c .= "<INPUT type=\"hidden\" name=\"FormName\" value=\"OfferInsert\" />";		   
        $c .= "<INPUT type=\"hidden\" name=\"FormAction\" value=\"" . $action . "\" $cl />";
        return ($c);   		   
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
		else {
			
			$db = GetGlobal('db');
		
			$sSQL = "select id,title,descr from crmforms where active=1 and type='1'"; //and class='crmform' 
			$res = $db->Execute($sSQL);
		
			foreach ($res as $i=>$rec) {
				$ret .= "<option value=\"". $url . $rec['title']. "\"". $selection .">{$rec['title']}</option>";
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
	
		$visitorUrl = '&v=' . $this->visitor;
		$url = ($taction) ? seturl('t='.$taction.$visitorUrl.'&stemplate=',null,null,null,null) : 
		                    seturl('t=cpcrmoffers'.$visitorUrl.'&stemplate=',null,null,null,null);
		
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
		else {
			
			$db = GetGlobal('db');
		
			$sSQL = "select id,title,descr from crmforms where active=1 and type='1'"; // and class='crmform' 
			$res = $db->Execute($sSQL);
		
			$ret = "<select name=\"$name\" onChange=\"location=this.options[this.selectedIndex].value\" $class>"; 
			$ret .= "<option value=\"$url\">Select...</option>";		
			foreach ($res as $i=>$rec) {
				$ret .= "<option value=\"". $url . $rec['title']. "\"". $selection .">{$rec['title']}</option>";
			}
			$ret .= "</select>";	
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
		
		if (defined('RCCOLLECTIONS_DPC')) {
		    if ($template) {
				$template_file = $this->templatepath . $template;
				$mailbody = GetGlobal('controller')->calldpc_method("rccollections.create_page use ".$template_file.'+'.$this->templatepath);
			}
			else
				$mailbody = GetGlobal('controller')->calldpc_method("rccollections.create_page");
		}									   
	 
		return ($mailbody);	 
	}		
	
	//subload template including collections
    public function loadData($template) {
		$data = null;		
		
		if (defined('RCFS_DPC')) {
			$path = $this->templatepath;		
		    $sub_template = str_replace($this->template_ext,$this->template_subext,$template);			
			$data = @file_get_contents($path . $template); 			 
			 
			//if sub template exist 
			if (is_readable($path . $sub_template)) { 
				$sub_data = $this->get_mail_body($sub_template);
				$data = str_replace('<!--?'.$sub_template.'?-->',$sub_data,$data);		   
			}
		}	
		else {
			//$data = $this->renderForm($template, GetGlobal('controller')->calldpc_method("rccollections.get_collected_items")); 
			
			//with visitor (price selection)
			if (defined('RCCOLLECTIONS_DPC')) 
				$this->items = GetGlobal('controller')->calldpc_method("rccollections.get_collected_items use ". $this->visitor);
			$data = $this->renderForm($template, $this->items); 
			
			//with visitor and preset (collection must have at least one item in this phase)
			//$data = $this->renderForm($template, GetGlobal('controller')->calldpc_method("rccollections.get_collected_items use ". $this->visitor . '+test50')); 
			//with visitor and source preset (collection must have at least one item in this phase)
			//$data = $this->renderForm($template, GetGlobal('controller')->calldpc_method("rccollections.get_collected_items use ". $this->visitor . '+4,5,6,7+1'));			
		}
		return ($data);		
	}		
	
    protected function loadTemplate() {
		$template = GetReq('stemplate') ? GetReq('stemplate') : GetSessionParam('stemplate');
		
		if (defined('RCFS_DPC')) {
			$path = $this->templatepath;				
		   
			if (is_readable($path . $template)) {
		   
				SetSessionParam('stemplate', $template); //save tmpl 
				$this->document = $this->loadData($template);			
				return true;
			}
		}	
		else {
			
			$this->document = $this->loadData($template);//base64_decode($res->fields['formdata']);

			SetSessionParam('stemplate', $template); //save tmpl			
			return true;	
		}			
		return false;	  			
	}	


	protected function renderPattern($template, $form=null, $code=null, $items=null, $test=false) {
		$db = GetGlobal('db');	
		if (!$template) return false;
		
		if (strstr($code, '>|')) {
		//if ($code)  {
			$pf = explode('>|',$code);
			
			//search last edited line
			foreach ($pf as $line) {
				if (trim($line)) {
					$joins = explode(',', array_pop($pf)); 
					break;
				}
			}
			
			//rest lines
			foreach ($pf as $line) 
				$subtemplates .= trim($line);

			$_pattern[0] = explode(',', $subtemplates);
			$_pattern[1] = (array) $joins;
			
			//make pseudo-items arrray
			if ((!$items) && ($test)) { 
				$maxitm = count($_pattern[0]);
				for($i=1;$i<=$maxitm;$i++)
					$items[] = array(0=>$i, 1=>'test item title'.$i, 2=>'test decr'.$i, 14=>'http://placehold.it/680x300');			
		    }	
			//render pattern
			if ((!empty($items)) && (is_array($_pattern))) {
				$pattern = (array) $_pattern[0];
				$join = (array) $_pattern[1];				

				//render
				$out = null;
				$tts = array();
				$gr = array();
				$itms = array();
				$cc = array_chunk($items, count($pattern));//, true);

				foreach ($cc as $i=>$group) {
					foreach ($group as $j=>$child) {
						//echo $pattern[$j] . '<br>';
						$tts[] = $this->ct($pattern[$j], $child, true);
						if ($cmd = trim($join[$j])) {
							//echo $join[$j] . '<br>';
							switch ($cmd) {
							    case '_break' : $out .= implode('', $tts); break;
								default       : $out .= $this->ct($cmd, $tts, true);		
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
		
		$sSQL = "select formdata from crmforms where title=" . $db->qstr($template.'-sub');
		$res = $db->Execute($sSQL);
		//echo $sSQL;	
		if (isset($res->fields['formdata'])) {			
			$itms[] = (!empty($gr)) ? implode('',$gr) : null; 
			if (!empty($itms))			
				$ret = $this->combine_tokens(base64_decode($res->fields['formdata']), $itms, true);
		}	
		else
			$ret = (!empty($gr)) ? implode('',$gr) : null;
		
		//echo $template.'-sub:' . $ret;				
		$data = ($ret) ? str_replace('<!--?'.$template.'-sub'.'?-->', $ret, $form) : $form;
		
		return $data;		
	}
	
	protected function getcsvItems($items=null) {
		if (!is_array($items)) return false;
		
		//csv array of fields
		foreach ($items as $i=>$rec)
			$ritems[] = implode(';', $rec);
			
		return $ritems; 	
	}	

	protected function renderTwing($doctitle=null, $template, $form=null, $code=null, $items=null) {
		$db = GetGlobal('db');	
		if (!$template) return false;	
		$docdescr = $doctitle ? $doctitle : 'Document'; 	
		
		if (defined('TWIGENGINE_DPC')) {
				
			//save db form into temp file
			$tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->prpath);
			$tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->prpath);
			$twigpath = $this->prpath . $tmpl_path .'/'. $tmpl_name .'/';	
			$tempfile = 'crmform-cache-' . base64_encode($template) . '.html';
				
			if (@file_put_contents($twigpath . $tempfile, $form)) {
				
				//csvitems var
				$this->csvitems = $this->getcsvItems($items);

				$t = array('invoice'=>$docdescr,
							'mynotes'=>'notes 123',
							'mydate'=>date('m.d.y'));
							
				$tokens = serialize($t);
				$ret = GetGlobal('controller')->calldpc_method('twigengine.render use '.$tempfile.'++'.$tokens);
			}
			else
				$ret = 'twig cache error!';
		}
		else 
			$ret = $form;		
		
		return ($ret);
	}	
    
	public function renderForm($title=null, $items=null, $test=false) {
		$db = GetGlobal('db');		
		if (!$title) return null;	
		$sSQL = "select id,title,descr,formdata,codedata from crmforms where title=" . $db->qstr($title);
		//echo $sSQL;
		$res = $db->Execute($sSQL);			
		$form = base64_decode($res->fields['formdata']);		
		$code = base64_decode($res->fields['codedata']);
		$template = $res->fields['title'];
		$this->doctitle = $docdescr = $res->fields['descr'];
		
		if (strstr($code, '>|')) { //pattern code
			$ret = $this->renderPattern($template, $form, $code, $items, $test);
		}
		else 
		    $ret = $this->renderTwing($docdescr, $template, $form, $code, $items);	
	
		return ($ret);
		
	}
	
	/*used inside crm twig docs*/
	public function getContact() {
		$db = GetGlobal('db');
		$visitor = GetReq('v') ? GetReq('v') : null;
		if (!$visitor) return false;
		
		$record = ';;;;;';
		
		//crm contact (default)
		$sSQL = "select email,firstname,lastname,address,country,occupation from crmcontacts ";		   
		$sSQL.= "WHERE email=" . $db->qstr($visitor);
		$result = $db->Execute($sSQL);
		
		if (!$result->fields[0]) { //search for customer data
		
			$sSQL1 = "select mail,name,afm,address,city,prfdescr from customers ";
			$sSQL1.= "WHERE mail=" . $db->qstr($visitor) . " OR code2=" . $db->qstr($visitor) . " order by active desc"; //active first		   
			$result = $db->Execute($sSQL1);
			$this->ref = 'customer'; 

			if (!$result->fields[0]) { //search for user data
		
				$sSQL2 = "select email,fname,lname,notes,username from users ";
				$sSQL2.= "WHERE username=" . $db->qstr($visitor) . " OR email=" . $db->qstr($visitor) . " order by notes asc"; //ACTIVE note first		   
				$result = $db->Execute($sSQL2);			
				$this->ref = 'user';
			}
		}
		
		if (!empty($result->fields)) {
			foreach ($result->fields as $i=>$f) 
				$record .= is_numeric($i) ? $f . ';' : null;
		}
		
		return $record;
	}
	
	/*add wishlist listID to collection */
	public function addListToCollection($list=null, $v=null) {	
		$db = GetGlobal('db');
		$listID = GetReq('list') ?  GetReq('list') : ($list ? $list : 'crm');
		$visitor = GetReq('v') ? GetReq('v') : ($v ? $v : null);
		
		if (($listID) && (defined('RCCOLLECTIONS_DPC'))) {

			$sSQL = "select tid from wishlist where cid=" . $db->qstr($visitor);
			$sSQL.= " and listname=" . $db->qstr($listID);
			$res = $db->Execute($sSQL);
			foreach ($res as $i=>$rec) 
				$codes[] = $rec[0];
				
			GetGlobal('controller')->calldpc_method("rccollections.addtoList use " . implode(',', $codes));

			$ret = localize('_addcollection', getlocal()) . ' list:' . $listID;// . " [$visitor]";
			return ($ret);
		}
        
		return false;	
	}	
	
	public function buttonListToCollection() {
		$db = GetGlobal('db');
		$l = getlocal();
		$visitor = GetReq('v') ? GetReq('v') : null;
		
		if (($visitor) && (defined('RCCOLLECTIONS_DPC'))) {
			
			$sSQL = "select DISTINCT listname from wishlist where cid=" . $db->qstr($visitor);
			$res = $db->Execute($sSQL);
			foreach ($res as $i=>$rec) 
				$curls[localize($rec[0], $l)] = seturl("t=cpaddcollection&v=$visitor&list=".$rec[0]);			
			
			$button = $this->createButton(localize('_wlists', getlocal()), $curls);//, 'success');	
			return $button;								
		}	
		
		return null;
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
	
    /*type : 0 save text as mail body /1 save collections as text to reproduce (offers, katalogs) */	
    protected function save_document() {
        $db = GetGlobal('db'); 	
		$rtokens = null;
		$ctype = 0;//$type ? $type : 0;
		$r = rand(000001, 999999);
		
		//print_r($_POST);
        $from = GetParam('from'); //from origin = $this->mailuser		
		$to = $this->visitor; //GetParam('to'); //to origin = $this->visitor
		if ($this->checkmail($to)==false) return false;
		
		$body = GetParam('document');
		$title = GetParam('subject') ? GetParam('subject') : 'Document ' . $r; //!!!!!
		$template = GetSessionParam('stemplate');
		
		if (defined('RCCOLLECTIONS_DPC')) {
			$collection = GetGlobal('controller')->calldpc_var("rccollections.savedlist");
			$items = GetGlobal('controller')->calldpc_method("rccollections.get_collected_items use ". $this->visitor);
			$csvitems = $this->getcsvItems($items);
		}	
		
		$docid = md5($body .'|'. $r .'|'. $to);
		
		//if ($viewashtml = GetParam('webviewlink')) {
		$rtokens[0] = ''; //dummy token to replace if $0$ exist in page
		
		if ($unsublink = GetParam('unsubscribelink')) {
			$unlink = "<a href=\"" . $this->encUrl($this->url . '/unsubscribe/') ."\">".localize('_here',getlocal())."</a>";			
			
			$text = str_replace(array('_UNSUBSCRIBE_','_MAILSENDER_','_SUBSCRIBER_'),array($unlink, $from, $to), GetParam('unsubscribetext'));			
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
  
		//save to campaigns
		$date = date('Y-m-d H:m:s');
		$ctype = 1;
		$active = 0;
		$ulists = 'crm';
        $sSQL = "insert into mailcamp (cid,ctype,cdate,active,title,ulists,cc,bcc,template,body,collection,owner,user,pass,name,server) values (";
	    $sSQL .= $db->qstr($docid).",".
		         $ctype .",". 
				 $db->qstr($date).",$active,".
	             $db->qstr($title).",".
				 $db->qstr($ulists).",".
				 $db->qstr($this->mailuser).",".
				 $db->qstr($this->visitor).",".
				 $db->qstr($template).",".
				 $db->qstr(base64_encode($body)).",".
				 $db->qstr($collection).",".
				 $db->qstr($this->owner).",".
				 $db->qstr($this->mailuser).",".
				 $db->qstr($this->mailpass).",".
				 $db->qstr($this->mailname).",".
				 $db->qstr($this->mailserver).				 
				 ")"; 
        //echo $sSQL;
		$result = $db->Execute($sSQL,1);  
  
        //save to crm docs
        $sSQL = "insert into crmdocs (docid,title,from,to,crmform,contents,items,owner) values (";
	    $sSQL .= $db->qstr($docid).",".
		         $db->qstr($title).",".
				 $db->qstr($from).",".
				 $db->qstr($to).",".
				 $db->qstr($template).",".
				 $db->qstr(base64_encode($body)).",".
				 $db->qstr(serialize($csvitems)).",".
				 $db->qstr($this->owner).			 
				 ")"; 
        //echo $sSQL;
		$result2 = true;//$db->Execute($sSQL,1);	
				
		if (($result) && ($result2)) { 
			$this->messages[] = 'Document saved';
			
			//save items
			//$this->save_items($docid, $items);
			
			//send document
			$this->send_document($docid, $this->mailuser, $to, $title, $body);

			//reset vars
			SetSessionParam('stemplate', '');
			$this->template = null;
			$this->document = null;
			//$this->messages = null;
			//SetSessionParam('messages','');			
			$this->document = null;
			
			return (true);		
		}
		
		$this->messages[] = 'Document NOT saved';
				
		return (false);		
	}

	protected function save_items($docid, $items=null) {
		if (empty($items)) return false;
		
		//fetch sent items collection
		if (defined('RCCOLLECTIONS_DPC')) {		
			$this->items = GetGlobal('controller')->calldpc_method("rccollections.get_collected_items use ". $this->visitor);	
		
			foreach ($this->items as $i=>$rec) {
				//...
				echo $i;
				$sSQL = "insert into crmdocitems (docid,code,from,to,crmform,contents,items,owner) values (";
				$sSQL .= $db->qstr($docid).",". 
				        $db->qstr($title).",".
						$db->qstr($from).",".
						$db->qstr($to).",".
						$db->qstr($template).",".
						$db->qstr(base64_encode($body)).",".
						$db->qstr('collection').",".
						$db->qstr($this->owner).			 
						")"; 
				//echo $sSQL;
				//$result = $db->Execute($sSQL,1);				
			}
			
			$this->messages[] = 'Items saved';
			return true;
		}
		return false;
	}
	
	protected function send_document($docid, $from, $to, $subject, $body) {	  
        //check expiration key
        if ($this->appkey->isdefined('RCCRMOFFERS_DPC')==false) {
	        $this->messages[] = "Failed, module expired.";
		    //return false;  //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< appkey --------------------------!!
	    }
					
		$res = $this->sendit($docid, $from, $to, $subject, $body); 				
		if ($res) $this->messages[] = 'Document sent';
		
		return ($res); 
	}	
	
	protected function sendit($docid, $from, $to, $subject, $body=null) {
	    if (!$body) {
		    $this->messages[] = 'Failed: Empty content';	
			return 0; 
		}	 
		
		$meter = 0;
		if ($this->checkmail($to)) {				
			if ($sendnow = GetParam('sendnow')) {	
				$meter = $this->sendmail_instant($docid, $from,$to,$subject,$body,$this->ishtml,$this->mailuser,$this->mailpass,$this->mailname,$this->mailserver);
				$this->messages[] =  'Mail sent to '.$to;
			}	
			else { 		
				$meter = $this->sendmail_inqueue($docid, $from,$to,$subject,$body,$this->ishtml,$this->mailuser,$this->mailpass,$this->mailname,$this->mailserver);			
				$this->messages[] =  'Mail NOT sent to '.$to;
			}	
		} 
		else 
			$this->messages[] =  'Send failed';

		$mtr = $meter ? $meter : 0;		
		$this->messages[] = $mtr . ' mail(s) sent';	

		return ($meter);							
    }	
	
	//send mail to db queue
	protected function sendmail_inqueue($docid, $from,$to,$subject,$mail_text='',$is_html=false,$user=null,$pass=null,$name=null,$server=null) {
		$db = GetGlobal('db');		
		$ishtml = $is_html?$is_html:0;
		$altbody = null;
		$origin = 'crm';//$this->prpath; 
		$encoding = $this->overwrite_encoding ? $this->overwrite_encoding : $this->encoding;
		$datetime = date('Y-m-d h:s:m');
		$active = 1;	
	   
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

			$body = $this->add_urltracker_to_mailbody($body,$to,$docid);			
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
			 $db->qstr($docid) . "," .
			 $db->qstr($this->owner) . ")";
			 
		//echo $sSQL,'inqueue<br>';			
		$result = $db->Execute($sSQL,1);			 
		$ret = $db->Affected_Rows();    
 
		return ($ret);			 
	}	
	
	//send mail to db queue
	protected function sendmail_instant($docid, $from,$to,$subject,$mail_text='',$is_html=false,$user=null,$pass=null,$name=null,$server=null) {
		$db = GetGlobal('db');		
		$ishtml = $is_html?$is_html:0;
		$altbody = null;
		$origin = 'crm';//$this->prpath; 
		$encoding = $this->overwrite_encoding ? $this->overwrite_encoding : $this->encoding;
		$datetime = date('Y-m-d h:s:m');
		$active = 0; 		
	   
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

			$body = $this->add_urltracker_to_mailbody($body,$to,$docid);			
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
			 $db->qstr($docid) . "," .
			 $db->qstr($this->owner) . ")";
			 
		//echo $sSQL,'instant<br>';			
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
		   if (!empty($ccaddress)) {
		     foreach ($ccaddress as $cc) {
			   if (trim($cc)) {
		         //$smtpm->cc($cc);//ONLY WIN32  
			     $smtpm->to($cc);
			   }
			 }  
		   }  	 
		   if (!empty($bccaddress)) {
		     foreach ($bccaddress as $bcc) {		
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
	
	protected function add_remarks_to_hide($text=null) {
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
				$qry = 't=mt&a='.$this->appname.'_AMP_u=' . $xurl . '_AMP_cid=_CID_' . '_AMP_r=_TRACK_'; //CKEditor &amp; issue				
			}
			else 
				$qry = 't=mt&u=' . $url . '_AMP_cid=_CID_' . '_AMP_r=_TRACK_'; //CKEditor &amp; issue				
			
			$uredir = $this->urlRedir .'?'. $qry; 
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
		$readonly = $disable ? 1 : 0;  
		$element_name = $element ? $element : 'document';
		
		//minmax only when select for new/edit not when select for mail sent
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
	
	protected function createButton($name=null, $urls=null, $t=null, $s=null) {
		$type = $t ? $t : 'primary'; //danger /warning / info /success
		switch ($s) {
			case 'large' : $size = 'btn-large '; break;
			case 'small' : $size = 'btn-small '; break;
			case 'mini'  : $size = 'btn-mini '; break;
			default      : $size = null;
		}
		
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

	protected function select_template($tfile=null) {
		if (!$tfile) return;
	  
		$template = $tfile . '.htm';	
		$t = $this->prpath . 'html/'. $this->cptemplate .'/'. str_replace('.',getlocal().'.',$template) ;   
		if (is_readable($t)) 
			$mytemplate = file_get_contents($t);

		return ($mytemplate);	 
    }	
	
    //combine tokens with load tmpl data inside	
	public function ct($template, $tokens, $execafter=null) {
	    //if (!is_array($tokens)) return;
		$db = GetGlobal('db');		
		
		//type 2 sub template data into html/body text
		$sSQL = "select formdata from crmforms where type=2 and title=" . $db->qstr($template);
		$res = $db->Execute($sSQL);			
		$template_contents = base64_decode($res->fields['formdata']);		
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template_contents; 
		  
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<30;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);		
		
		//execute after replace tokens
		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $retout = $fp->process_commands($ret);
		  unset ($fp);
          
		  return ($retout);
		}		
		
		return ($ret);
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
	
};
}
?>