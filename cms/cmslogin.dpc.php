<?php
$__DPCSEC['CMSLOGIN_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CMSLOGIN_DPC")) && (seclevel('CMSLOGIN_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CMSLOGIN_DPC",true);

$__DPC['CMSLOGIN_DPC'] = 'cmslogin';

$__EVENTS['CMSLOGIN_DPC'][0]='cmslogin';
$__EVENTS['CMSLOGIN_DPC'][1]='dologin';
$__EVENTS['CMSLOGIN_DPC'][2]='dologout';
$__EVENTS['CMSLOGIN_DPC'][3]='rempwd';
$__EVENTS['CMSLOGIN_DPC'][4]='shremember';
$__EVENTS['CMSLOGIN_DPC'][5]='shcaptcha';
$__EVENTS['CMSLOGIN_DPC'][6]='chpass';
$__EVENTS['CMSLOGIN_DPC'][7]='shrememberajax';
$__EVENTS['CMSLOGIN_DPC'][8]='chpassajax';
$__EVENTS['CMSLOGIN_DPC'][9]='dologinajax';

$__ACTIONS['CMSLOGIN_DPC'][0]='cmslogin';
$__ACTIONS['CMSLOGIN_DPC'][1]='dologin';
$__ACTIONS['CMSLOGIN_DPC'][2]='dologout';
$__ACTIONS['CMSLOGIN_DPC'][3]='rempwd';
$__ACTIONS['CMSLOGIN_DPC'][4]='shremember';
$__ACTIONS['CMSLOGIN_DPC'][5]='shcaptcha';
$__ACTIONS['CMSLOGIN_DPC'][6]='chpass';
$__ACTIONS['CMSLOGIN_DPC'][7]='shrememberajax';
$__ACTIONS['CMSLOGIN_DPC'][8]='chpassajax';
$__ACTIONS['CMSLOGIN_DPC'][9]='dologinajax';

$__DPCATTR['CMSLOGIN_DPC']['cmslogin'] = 'cmslogin,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['CMSLOGIN_DPC'][0]='CMSLOGIN_DPC;Login;Εισαγωγή';
$__LOCALE['CMSLOGIN_DPC'][1]='_SHLOGOUT;Logout;Αποσύνδεση';
$__LOCALE['CMSLOGIN_DPC'][2]='SHLOGIN_CNF;Logout;Αποσύνδεση';
$__LOCALE['CMSLOGIN_DPC'][3]='SHLOGIN_UNK;Login;Εισαγωγή';
$__LOCALE['CMSLOGIN_DPC'][4]='_USERNAME;Username;Χρήστης';
$__LOCALE['CMSLOGIN_DPC'][5]='_PASSWORD;Password;Κωδικός';
$__LOCALE['CMSLOGIN_DPC'][6]='_WELLCOME;Welcome;Καλωσήρθες';
$__LOCALE['CMSLOGIN_DPC'][7]='_SEEYOU;See you next time;Τα λέμε';
$__LOCALE['CMSLOGIN_DPC'][8]='_MSG1;Incorrect data!;Λάθος στοιχεία!';
$__LOCALE['CMSLOGIN_DPC'][9]='_VERPASS;Verify password;Επαληθευση κωδικου';
$__LOCALE['CMSLOGIN_DPC'][10]='_PASSREMINDER;Please change your password!;Παρακαλω αλλαξτε τον κωδικό σας!';
$__LOCALE['CMSLOGIN_DPC'][11]='_VERPASSUCCESS;Password changed!;Επιτυχης αλλαγη κωδικου';
$__LOCALE['CMSLOGIN_DPC'][12]='_HERE;here;εδώ';
$__LOCALE['CMSLOGIN_DPC'][13]="_IFORGET;If you dont remember your password click ;Αν δεν θυμαστε τον κωδικο σας πατηστε";
$__LOCALE['CMSLOGIN_DPC'][14]='_PRESSHERE;Click here;Πατήστε εδώ';
$__LOCALE['CMSLOGIN_DPC'][15]='_MSG2;Username and Password send at your mail account!;Το όνομα χρήστη και ο κωδικός στάλθηκαν στο ηλεκτρονικό σας ταχυδρομείο!';
$__LOCALE['CMSLOGIN_DPC'][16]='_SENDCRE;Username and Password send at your mail account!;Το όνομα χρήστη και ο κωδικός στάλθηκαν στο ηλεκτρονικό σας ταχυδρομείο!';
$__LOCALE['CMSLOGIN_DPC'][17]='_UMAILREMSUBC;Account reset;Αλλαγή κωδικού χρήστη';
$__LOCALE['CMSLOGIN_DPC'][18]='_OK;Success;Επιτυχης εργασια';
$__LOCALE['CMSLOGIN_DPC'][19]='_OKREMINDER;Your account details has been send by e-mail.;Τα στοιχεία του λογαριασμού σας σταλθηκσν με e-mail.';
$__LOCALE['CMSLOGIN_DPC'][20]='_RESET;Reset;Αλλαγή';
$__LOCALE['CMSLOGIN_DPC'][21]='_RESETPASS;Reset password;Αλλαγή κωδικού';
$__LOCALE['CMSLOGIN_DPC'][22]="_MSG21;Password and verify password doesn't match!;Η επιβαιβαιωση κωδικου δεν συμφωνει με τον κωδικο σας.";
$__LOCALE['CMSLOGIN_DPC'][23]='_MSGPWD;Invalid password length, 8 characters required;Μη αποδεκτός κωδικός, 8 χαρακτήρες τουλάχιστον είναι απαραίτητοι';
$__LOCALE['CMSLOGIN_DPC'][24]='ok;An mail send to you. Follow the instruction in order to complete the process;Ένα email σταλθηκε στον λογαριασμό ηλ. ταχυδρομείου που δηλώσατε. Ακολουθήστε τις οδηγίες για την ολοκληρωση της διαδικασίας';
$__LOCALE['CMSLOGIN_DPC'][25]='_ok;Submit;Αποστολή';
$__LOCALE['CMSLOGIN_DPC'][26]='ok2;Password changed;Ο κωδικός άλλαξε';
$__LOCALE['CMSLOGIN_DPC'][27]='_ERRSECTOKEN;Invalid token;Λάνθασμένο στοιχείο';
$__LOCALE['CMSLOGIN_DPC'][28]='_NOTAFFECTED;Record not affected;Δεν έγινε η αλλαγή';
$__LOCALE['CMSLOGIN_DPC'][29]='_PLEASETEXT;Please fill out the information bellow and proceed;Παρακαλώ εισάγετε τα στοιχεία που ειναι απαραίτητα για την εισαγωγή στο σύστημα';
$__LOCALE['CMSLOGIN_DPC'][30]='_WELCOME2GO;Press here to proceed;Πατήστε εδώ για να συνεχίσετε την περιηγησή σας';
$__LOCALE['CMSLOGIN_DPC'][31]='_back;Back;Επιστροφή';

//cpmdbrec commands
$__LOCALE['CMSLOGIN_DPC'][80]='_exit;Exit;Έξοδος';
$__LOCALE['CMSLOGIN_DPC'][81]='_dashboard;Dashboard;Πίνακας ελέγχου';
$__LOCALE['CMSLOGIN_DPC'][82]='_logout;Logout;Αποσύνδεση';
$__LOCALE['CMSLOGIN_DPC'][83]='_rssfeeds;RSS Feeds;RSS Feeds';
$__LOCALE['CMSLOGIN_DPC'][84]='_edititemtext;Edit Item Text;Μεταβολή κειμένου';// (text) αντικειμένου';
$__LOCALE['CMSLOGIN_DPC'][85]='_deleteitemattachment;Delete Item Attachment;Διαγραφή συνημμένου';// είδους';
$__LOCALE['CMSLOGIN_DPC'][90]='_editcat;Edit Category;Μεταβολή κατηγορίας';
$__LOCALE['CMSLOGIN_DPC'][91]='_addcat;Add Category;Νέα Κατηγορία';
$__LOCALE['CMSLOGIN_DPC'][92]='_additem;Add Item;Νέο Είδος';
$__LOCALE['CMSLOGIN_DPC'][93]='_webstatistics;Statistics;Στατιστικά';
$__LOCALE['CMSLOGIN_DPC'][94]='_addcathtml;Add Category Html;Προσθήκη κειμένου';// κατηγορίας';
$__LOCALE['CMSLOGIN_DPC'][95]='_editcathtml;Edit Category Html;Μεταβολή κειμένου';// κατηγορίας';
$__LOCALE['CMSLOGIN_DPC'][96]='_edititem;Edit Item;Μεταβολή';// αντικειμένου';
$__LOCALE['CMSLOGIN_DPC'][97]='_edititemphoto;Edit Photo;Μεταβολή φωτογραφίας';// αντικειμένου';
$__LOCALE['CMSLOGIN_DPC'][98]='_edititemdbhtm;Edit Item Htm;Μεταβολή κειμένου';// (htm) αντικειμένου (db)';
$__LOCALE['CMSLOGIN_DPC'][99]='_edititemdbhtml;Edit Item Html;Μεταβολή κειμένου';// (html) αντικειμένου (db)';
$__LOCALE['CMSLOGIN_DPC'][100]='_edititemdbtext;Edit Item Text;Μεταβολή κειμένου';// (text) αντικειμένου (db)';
$__LOCALE['CMSLOGIN_DPC'][101]='_senditemmail;Send Text/Html e-mail;Αποστολή e-mail';
$__LOCALE['CMSLOGIN_DPC'][102]='_delitemattachment;Delete Text;Διαγραφή κειμένου';// (db)';
$__LOCALE['CMSLOGIN_DPC'][103]='_edititemtext;Edit Item Text;Μεταβολή κειμένου';// (text) αντικειμένου';
$__LOCALE['CMSLOGIN_DPC'][104]='_edititemhtm;Edit Item Htm;Μεταβολή κειμένου';// (htm) αντικειμένου';
$__LOCALE['CMSLOGIN_DPC'][105]='_edititemhtml;Edit Item Html;Μεταβολή κειμένου';// (html) αντικειμένου';
$__LOCALE['CMSLOGIN_DPC'][106]='_additemhtml;Add Item Html;Εισαγωγή κειμένου';// στο αντικείμενο';
$__LOCALE['CMSLOGIN_DPC'][107]='_transactions;Transactions;Συναλλαγές';
$__LOCALE['CMSLOGIN_DPC'][108]='_users;Users;Χρήστες';
$__LOCALE['CMSLOGIN_DPC'][109]='_itemattachments2db;Add Item(s) to Database;Μεταφορά κειμένων στην Β.Δ.';//βάση δεδομένων';
$__LOCALE['CMSLOGIN_DPC'][110]='_importdb;Import Database;Εισαγωγή βάσης δεδομένων';
$__LOCALE['CMSLOGIN_DPC'][111]='_config;Configuration;Ρυθμίσεις';
$__LOCALE['CMSLOGIN_DPC'][112]='_contactform;Contact Form;Φόρμα επικοινωνίας';
$__LOCALE['CMSLOGIN_DPC'][113]='_subscribers;Subscribers;Συνδρομητές';
$__LOCALE['CMSLOGIN_DPC'][114]='_sitemap;Sitemap;Χάρτης πλοήγησης';// αντικειμένων';
$__LOCALE['CMSLOGIN_DPC'][115]='_search;Search;Φόρμα Αναζήτησης';
$__LOCALE['CMSLOGIN_DPC'][116]='_upload;Upload files;Ανέβασμα αρχείων';
$__LOCALE['CMSLOGIN_DPC'][117]='_uploadid;Upload item files;Ανέβασμα αρχείων';// αντικειμένου';
$__LOCALE['CMSLOGIN_DPC'][118]='_uploadcat;Upload category files;Ανέβασμα αρχείων';// κατηγορίας';
$__LOCALE['CMSLOGIN_DPC'][119]='_syncphoto;Sync photos;Συγχρονισμός φωτογραφιών';
$__LOCALE['CMSLOGIN_DPC'][120]='_syncsql;Sync data;Συγχρονισμός δεδομένων';
$__LOCALE['CMSLOGIN_DPC'][121]='_dbphoto;Image in DB;Εικόνα στην βάση δεδομένων';
$__LOCALE['CMSLOGIN_DPC'][122]='_editctag;Category Tags;Tags κατηγορίας';
$__LOCALE['CMSLOGIN_DPC'][123]='_edititag;Item Tags;Tags είδους';
$__LOCALE['CMSLOGIN_DPC'][124]='_menu;Menu;Επιλογές Menu';
$__LOCALE['CMSLOGIN_DPC'][125]='_slideshow;Slideshow;Επιλογές Slideshow';

class cmslogin {

	var $userLevelID;
	var $msg;
	var $outpoint;
	var $sslscript;
	var $ses_prothema;
	var $ses_path;
	var $ssl;
    var $time_of_session;
	var $reseller_attr, $path;
	var $username, $userid;
    var $actcode;
    var $iname, $load_sesssion;
    var $after_goto, $dpc_after_goto,$login_successfull;
	var $login_goto,$logout_goto;  
	var $urlpath, $inpath;
	var $recaptcha_public_key, $recaptcha_private_key;	
	var $tmpl_path, $tmpl_name;	
	
	static $staticpath;

	function __construct() {
	    $sFormErr = GetGlobal('sFormErr');
	    $UserName = GetGlobal('UserName');
	    $UserSecID = GetGlobal('UserSecID');
	    $UserID = GetGlobal('UserID'); 
	    $GRX = GetGlobal('GRX');
	   
	    $this->username = decode($UserName);
	    $this->userid = decode($UserID);
        $this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);
	    $this->msg = $sFormErr;
	    $this->ssl = paramload('SHELL','ssl');
	    $this->outpoint = "|";
	   
	    self::$staticpath = paramload('SHELL','urlpath');

        $this->path = paramload('SHELL','prpath');
		 
	    $this->urlpath = paramload('SHELL','urlpath');
	    $this->inpath = paramload('ID','hostinpath');			 

	    $this->sslscript = "<script src=\"".paramload('SHLOGIN','sslscript')."\"></script>";
	    $this->ses_prothema = paramload('SHLOGIN','sespro');
	    $this->ses_path = paramload('SHELL','sespath');

        $this->must_reenter_password	= null;

	    $this->link = seturl("t=rempwd",localize("_HERE",getlocal()));
	    $this->message = localize("_IFORGET",getlocal());
	    $this->formerror = null;

	    $this->title = localize('CMSLOGIN_DPC',getlocal());
        $logintime = remote_paramload('SHLOGIN','logintime',$this->path);
	    $this->time_of_session = $logintime?$logintime:3600;//1 hour is default
	   
	    $this->reseller_attr = remote_paramload('SHLOGIN','reseller',$this->path); //DISABLED
	   
	    $this->accountmailfrom = remote_paramload('SHLOGIN','accountmailfrom',$this->path);

	    $acode = remote_paramload('RCCUSTOMERS','activecode',$this->path);
	    $this->actcode = $acode?$acode:'code2';

	    $this->iname = paramload('ID','instancename');
	    $this->load_session = remote_paramload('SHLOGIN','loadsession',$this->path);

	    $this->after_goto = remote_paramload('SHLOGIN','aftergoto',$this->path);
	    $this->dpc_after_goto = GetSessionParam('afterlogingoto')?GetSessionParam('afterlogingoto'):$this->after_goto;
	    $this->login_successfull = false;
	   
	    $this->logout_goto = remote_paramload('SHLOGIN','logout_goto',$this->path);
	    $this->login_goto = remote_paramload('SHLOGIN','login_goto',$this->path);	
	   
	    $this->recaptcha_public_key = remote_paramload('RECAPTCHA','pubkey',$this->path);							  
	    $this->recaptcha_private_key = remote_paramload('RECAPTCHA','privkey',$this->path);	      
	   
	    $this->tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->path);
	    $this->tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->path);	   
	   
        //timezone	   
        date_default_timezone_set('Europe/Athens');		   
	}

    function event($sAction) {
	    $__USERAGENT = GetGlobal('__USERAGENT');
	    $UserName = GetGlobal('UserName');
	    $param1 = GetGlobal('param1');
	    $param2 = GetGlobal('param2');
	   

        //if (!$this->msg) {

        switch($sAction)   {
		    case 'rempwd'        : break;
			case 'shrememberajax':
		    case 'shremember'    : $this->do_the_job(); 
			                       break;
		    case 'shcaptcha'     : $this->do_the_captcha(); break;
            case 'shlogin'       : break;

			case "dologinajax"   :
            case "dologin"       :  
			               switch ($__USERAGENT) {
	                          case 'HTML' :  $this->login_successfull = $this->do_login();
                                             if (($this->login_goto)&& ($this->login_successfull)) {
							                    if (!$this->dpc_after_goto)// inside code command
			                                      $this->refresh_page_js($this->login_goto);	
											 }	
																		  
							                 if (defined('UONLINE_DPC'))
											   GetGlobal('controller')->calldpc_method('uonline.isOnline');
											 break;
	                          case 'XML'  :
	                          case 'GTK'  :
							  case 'XUL'  :
		                      case 'CLI'  :
	                          case 'TEXT' :  $this->do_login($param1,$param2);
							                 break;
						   }
						   //reset database connection
						   $db = null;
                           break;

            case "dologout":  
			                switch ($__USERAGENT) {
	                          case 'HTML' : if (defined('UONLINE_DPC'))
    	                                      GetGlobal('controller')->calldpc_method('uonline.isOffline');
											  
                                            $this->do_logout();
											
                                            if ($this->logout_goto)
			                                  $this->refresh_page_js($this->logout_goto); 											
                                            break;
	                          case 'XML'  :
	                          case 'GTK'  :
							  case 'XUL'  :
		                      case 'CLI'  :
	                          case 'TEXT' : $this->do_logout();
							                break;
						   }
                           break;
			
             case "chpassajax" :			
			 case "chpass"     : $this->do_reenter_pasword(); 
			                     break;
							 					 
        }
        //}
	}

    function action($action=null)  {
	    $__USERAGENT = GetGlobal('__USERAGENT');
	    $sFormErr = GetGlobal('sFormErr');

        switch($action)   {
		
			case 'shrememberajax':if ($this->formerror!=localize("ok",getlocal()))
			                        die($this->formerror);
								  else
								    die(localize('_OKREMINDER', getlocal()));
			                      break;
								  
		    case 'rempwd'        :
		    case 'shremember'    :if ($this->formerror!=localize("ok",getlocal())) 
									$out .= $this->html_remform();	 
								  else //login  
									$out = $this->html_form(); 
								  break;
								 
		    case 'shcaptcha'   : $out .= $this->show_the_captcha(); break;
            case "shlogin"     : $out = $this->form(); break;

			case "dologinajax" : $gurl = $_POST['FormGoto'] ? $_POST['FormGoto'] : $this->login_goto;
			                     $goto = $gurl ? '<a href="'.$gurl.'">'.localize('_WELCOME2GO',getlocal()).'</a>' : null;
			                     die(localize('_WELLCOME',getlocal()) . ' ' . $goto); 
								 break;
								 
            case "dologin"     : //goto after login with ses param
								 if (($this->dpc_after_goto) && ($this->login_successfull)) {
									//echo $this->dpc_after_goto,'>';
									$mydpc = explode('.',$this->dpc_after_goto);//check security
									$mydpcname = strtoupper($mydpc[0]).'_DPC';				 
									if (seclevel($mydpcname,$this->userLevelID)) 
										$out .= GetGlobal('controller')->calldpc_method($this->dpc_after_goto);
									else
										$out .= $this->form();//default action  
									$this->dpc_after_goto = null;
									SetSessionParam('afterlogingoto','');
								 }
								 else 
									$out = $this->form(); 

								 break;

            case "dologout"    : $out = $this->form(); 
			                     break;
			
		    case "chpass"      : $out = $this->html_reset_pass();
			                     break;
							
			case "chpassajax"  : die($this->formerror); 
			                     break;				
		}

		return ($out);
	}		
	
    protected function refresh_page_js($goto) {
   
		if (iniload('JAVASCRIPT')) {

	       $code = $this->javascript($goto);
	   
		   $js = new jscript;
           $js->load_js($code,"",1);			   
		   unset ($js);
		}   
    }   
   
    //after login/logout goto...
    protected function javascript($goto) {
		$ret = "
function neu() { top.frames.location.href = \"$goto\"} window.setTimeout(\"neu()\",10);
";
		return ($ret);
    }   	

	protected function title() {
		$UserID = GetGlobal('UserID');

		$uid = decode($UserID);

		//navigation status
		if ($uid == "")
			$out = setNavigator(localize('CMSLOGIN_DPC',getlocal()));
		else
			$out = setNavigator(localize('_SHLOGOUT',getlocal()));

		return ($out);
	}

	public function html_form($tokensout=null) {
	    $sFormErr = GetGlobal('sFormErr');
	    $UserID = GetGlobal('UserID');
        $logonurl = seturl("t=dologin",0,1);	
		 
		if ($UserID) {

		    $t =  $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'.str_replace('.',getlocal().'.','logout.htm') ;

	        if (is_readable($t)) {
				$mytemplate = file_get_contents($t);
				$tokensout = 1;
            }	
		   
            if ($tokensout) {
				$tokens[] = seturl("t=dologout"); //link
				$tokens[] = localize('_SHLOGOUT',getlocal());
				$tokens[] = $this->myf_button(localize('_SHLOGOUT',getlocal()), seturl("t=dologout"));
			 
				$ret = $this->combine_tokens($mytemplate,$tokens);

		    }
		    else	
				$ret = $this->myf_button(localize('_SHLOGOUT',getlocal()), seturl("t=dologout")); 
			 	
		    return ($ret);
		}
		 
		//NOT FOR PASSWORDS FORM
	    /*if (defined('RECAPTCHA_DPC')) {
	         $recaptcha = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	   
			 //echo $recaptcha;
	    }	*/		 
		 
		$t =  $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'.str_replace('.',getlocal().'.','login.htm') ;

	    if (is_readable($t)) {
			$mytemplate = file_get_contents($t);
			$tokensout = 1;
        }		 	 

	    //SSL tm
	    if ($this->ssl) {
		    //$loginform .= $this->sslscript;
	        $sslwin = new window("",$this->sslscript);
	        $loginform .= $sslwin->render("center::100%::0::group_article_selected::right::0::0::");
	        unset ($sslwin);
	    }

        if ($tokensout) {
		    if (($sFormErr=='ok')||($sFormErr=='Ok')||($sFormErr=='OK')||($sFormErr=='OKREMINDER')) {//fix ok global msg
			  if (stristr($sFormErr,'ok'))
			    $tokens[] = localize('_OK', getlocal());
			  else
			    $tokens[] = localize('_OKREMINDER', getlocal());
			}  
			else
		      $tokens[] = $sFormErr;
		}
		else {	 
		 
		    $loginform .= $toprint = $this->title();
						   		 
		    if (($sFormErr=='ok')||($sFormErr=='Ok')||($sFormErr=='OK')||($sFormErr=='OKREMINDER')) {//fix ok global msg
			  if (stristr($sFormErr,'ok'))
			    $loginform .= localize('_OK', getlocal());
			  else
			    $loginform .= localize('_OKREMINDER', getlocal());			
			}
			else  //error message
	          $loginform .= setError($sFormErr);
		}				   
		//$loginform .= new captcha;
        
        if ($tokensout) {
		 
		    $tokens[] = "<form action=\"$logonurl\" method=\"POST\">";
		    $tokens[] = "<input type=\"text\" name=\"Username\" maxlenght=\"20\" class=\"myf_input\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255); \">" ;
		}
		else { 
            //login form
            $loginform .= "<form action=\"$logonurl\" method=\"POST\">";
						   		 
            $lf1[] = localize('_USERNAME',getlocal());
		    $lfat1[] = "right;20%;";
		    $lf1[] = "&nbsp;<input type=\"text\" name=\"Username\" maxlenght=\"20\">";
		    $lfat1[] = "left;80%";
		    $w1 = new window('',$lf1,$lfat1);  $loginform .= $w1->render("center::100%::0::group_article_selected::left::0::0::");   unset ($w1);
        } 		 
		 
        if ($tokensout) { 
		 
		    $tokens[] = "<input type=\"password\" name=\"Password\" maxlenght=\"20\" class=\"myf_input\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255); \">"; 	   
		    $tokens[] = "<input type=\"submit\" class=\"myf_button\" value=\"" . localize('CMSLOGIN_DPC',getlocal()) . "\">";
		   
		    $tokens[] =	//$recaptcha . NOT FOR PASSWORDS FORM 
                       "<input type=\"hidden\" name=\"FormName\" value=\"Login\">" .					   
		               "<input type=\"hidden\" name=\"FormAction\" value=\"dologin\">" .
		               "</form>";	
		}
		else { 		 
            $lf2[] = localize('_PASSWORD',getlocal());
		    $lfat2[] = "right;20%";
		    $lf2[] = "&nbsp;<input type=\"password\" name=\"Password\" maxlenght=\"20\">";
		    $lfat2[] = "left;80%";
		    $w2 = new window('',$lf2,$lfat2); $loginform .= $w2->render("center::100%::0::group_article_selected::left::0::0::"); unset ($w2);
						   
			$loginform .= $recaptcha;
            $loginform .= "<input type=\"hidden\" name=\"FormName\" value=\"Login\">";         
            $loginform .= "<input type=\"hidden\" name=\"FormAction\" value=\"dologin\">";
            $loginform .= "<input type=\"submit\" value=\"" . localize('CMSLOGIN_DPC',getlocal()) . "\">";
            $loginform .= "</form>";
		} 				   

        if ($tokensout) {
		 
			//i  forget my password....extension
			$tokens[] = $this->iforgotmypassword();
		   
			//return ($tokens);
			$ret = $this->combine_tokens($mytemplate,$tokens);
			return ($ret);
		}
		else {  		 
		    //i  forget my password....extension
			$loginform .= $this->iforgotmypassword();

            $data1[] = $loginform;
            $attr1[] = "center";

	        $swin = new window(localize('_SENLOGIN',getlocal()),$data1,$attr1);
	        $toprint .= $swin->render("center::40%::0::group_win_body::left::0::0::");
	        unset ($swin);

			return ($toprint);
		}				   
	}

    public function form($agent='HTML') {
	    $sFormErr = GetGlobal('sFormErr');
        $UserID = GetGlobal('UserID');
        $uid = decode($UserID);

        $sFileName = seturl("t=dologin");
        $logonurl = seturl("",0,1); //seturl("t=&a=&g=",0,1);
        $logoffurl = seturl();
	   
	    //in case of preint form after login
        if ($this->login_successfull) {
	   
			$t =  $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'.str_replace('.',getlocal().'.','welcome.htm') ;
			if (is_readable($t)) {
				$mytemplate = file_get_contents($t);
				return ($mytemplate);
			}
			else		   
				return (localize('_WELLCOME',getlocal()) .' '. decode(GetSessionParam('UserName')));
	    }	 

		switch ($agent) {
	        case 'HTML' : //template form
			              //$toprint = $this->title();
			default     :			   
			              $toprint = $this->html_form();
		                  break;
		}

        return ($toprint);
    }

    public function quickform($attr=null,$after_goto=null,$dpc_after_goto=null,$param_name=null,$param=null) {
		$winattr = $attr?$attr:"center::100%::0::group_win_body::left::0::0::";
		$UserID = GetGlobal('UserID');
		$uid = decode($UserID);
	   
		$t =  $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'.str_replace('.',getlocal().'.','qlogin.htm') ;

		if (is_readable($t)) {
			$mytemplate = file_get_contents($t);
			$tokensout = 1;
		}	   

		$this->after_goto = $after_goto?$after_goto:null;

		if ($dpc_after_goto) 
			SetSessionParam('afterlogingoto',str_replace('>','.',$dpc_after_goto));

        if ($this->after_goto) {
            $logonurl = seturl("t=".$this->after_goto."&$param_name=".$param,0,1);
            $this->after_goto = null;
        }
        else
            $logonurl = seturl("",0,1); //seturl("t=$a=&g=",0,1);
				  
		$logoffurl = seturl('t=dologout',localize('_SHLOGOUT',getlocal()));

		if (isset($UserID)) {
			if ($tokensout) {
				return null;
			}
			else {
				$myw = new window($logoffurl,null);
				$ret = $myw->render("center::100%::0::group_win_body::left::0::0::");
				unset ($myw);
				return($ret);
			}
	    }

        if ($tokensout) {
	   
			$tokens[] = "<form action=\"$logonurl\" method=\"POST\">";
			$tokens[] = "<input type=\"text\" name=\"Username\" maxlenght=\"50\" size=\"20\" class=\"myf_input_front\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255); \">";		 
			$tokens[] = "<input type=\"password\" name=\"Password\" maxlenght=\"50\" size=\"20\" class=\"myf_input_front\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255); \">";
			$tokens[] = "<input type=\"submit\" class=\"myf_button\" value=\"" . localize('CMSLOGIN_DPC',getlocal()) . "\">";
			$tokens[] = "<input type=\"hidden\" name=\"FormAction\" value=\"dologin\">" .
					 "<input type=\"hidden\" name=\"FormName\" value=\"Login\">" .
		             "</form>";
					 
			$ret = $this->combine_tokens($mytemplate,$tokens);
			return ($ret);					 
		             
		}
		else {
			$loginform = "<table>".
                    "<form action=\"$logonurl\" method=\"POST\">" .
                    "<tr><td>" .
                    localize('_USERNAME',getlocal()) . " :<br>" .
                    localize('_PASSWORD',getlocal()) . " :";

			if ( (defined('SHUSERS_DPC')) && (seclevel('SHUSERS_DPC',decode(GetSessionParam('UserSecID')))) ) {
				$loginform .= '<br>'.seturl('t=signup',localize('_SIGNUP',getlocal()));//GetGlobal('controller')->calldpc_method('shcustomers.register');
			}
			$loginform .= "</td><td>" .
                       "<input type=\"hidden\" name=\"FormName\" value=\"Login\"><br>" .
                       "<input type=\"text\" name=\"Username\" maxlenght=\"50\" size=\"20\" ><br>".
                       "<input type=\"password\" name=\"Password\" maxlenght=\"50\" size=\"20\" ><br>" .
                       "<input type=\"hidden\" name=\"FormAction\" value=\"dologin\">" .
                       "<input type=\"submit\" value=\"" . localize('CMSLOGIN_DPC',getlocal()) . "\">" .
                       "</td></tr></form></table>";
					   
			$toprint .= $loginform;

			$myw = new window($this->title,$toprint);
			$out = $myw->render("$winattr");
			unset ($myw);

			return ($out);
	    }	 
    }
	
	protected function isoldpass($username) {
	    $db = GetGlobal('db');
	   
	    $sSQL = "select password from users where username='".$username."'";// limit 1 desc";//multiple users last
	    $result = $db->Execute($sSQL,2);
	    $p = $result->fields['password'];

	    if (($p) && (strlen($p)<=10)) //user exist and pass <=10 chars
	        return true;
	
        return false;	
	}

    public function do_login($user='',$pwd='',$editmode=null) {
	    $db = GetGlobal('db');
	    $sFormErr = GetGlobal('sFormErr');
	    $UserName = GetGlobal('UserName');  
		
	    //recaptcha NOT FOR PASSWORDS FORM 
        //if ($this->valid_recaptcha()) {		   
	    //if ($db) {   		

        if (!$user) $sUsername = GetParam("Username", adText);
	        else $sUsername = $user;
			  
        if (!$pwd) $sPassword = GetParam("Password", adText);
	        else $sPassword = $pwd;

	    if (($sUsername) && ($sPassword)) {

	        if ($this->isoldpass($sUsername)) {//old way, old users with unencoded pass
				$sSQL = "SELECT ".$this->actcode.", sesid, notes, seclevid, clogon FROM users" . " WHERE username ='" .
					addslashes($sUsername) . "' AND password='" . addslashes($sPassword) . "'";
			}
			else {
				$sSQL = "SELECT ".$this->actcode.", sesid, notes, seclevid, clogon FROM users" . " WHERE username ='" .
					addslashes($sUsername) . "' AND password='" . md5(addslashes($sPassword)) . "'";		  
			}
 		  
		    if ($editmode)
				$sSQL .= " and seclevid>5";
			else 			
				$sSQL .= " and seclevid<=1"; //NOT ALLOW BACKEND CP USER TO LOGIN INTO FRONTEND

            $result = $db->Execute($sSQL,2);

			if (($result->fields[$this->actcode]) && (strcmp(trim($result->fields['notes']),"DELETED")!=0)) {
		  
		        if ($editmode) {
		            $_SESSION['LOGIN'] = 'yes';
					$GLOBALS['LOGIN'] = 'yes';					
		            SetSessionParam('LOGIN','yes');	
		            SetSessionParam('ADMIN','yes');	
				    SetSessionParam('ADMINSecID',$result->fields['seclevid']);
                    return true;								   
				}  

                if ($this->load_session)
				    $this->loadSession($sUsername);

                SetSessionParam("UserName", encode($sUsername));
				SetSessionParam("Password", encode($sPassword));//!!!!!
                SetSessionParam("UserID", encode($result->fields[$this->actcode]));
				$GLOBALS['UserID']=encode($result->fields[$this->actcode]);
                SetSessionParam("UserSecID", encode($result->fields['seclevid']));
							  
				if ((defined('SHCUSTOMERS_DPC')))   						  
	                GetGlobal('controller')->calldpc_method('shcustomers.is_reseller');		

			    //re-enter password flag
			    if ($result->fields['clogon']==1) {
				    $this->must_reenter_password=1;
					$chpass = seturl("t=chpass",localize('_PASSREMINDER',getlocal()),1,'',1);
					setInfo($chpass);
				}
				else
  		            setInfo(localize('_WELLCOME',getlocal()) . " " . $sUsername);

				//set cookie
				if (paramload('SHELL','cookies')) {
				    setcookie("cuser",$UserName,time()+$this->time_of_session);//,time()+3600,"","panikidis.gr",0);
					setcookie("csess",session_id(),time()+$this->time_of_session);
				}
				
				$this->update_login_statistics('login', $sUsername);
				
				//echo "login:",$sSQL;
				return true;
            }
            else {
				$this->update_login_statistics('login-failed', $sUsername);
				
				SetGlobal('sFormErr',localize('_MSG1',getlocal()));
				return false;
            }
	    }
	    //}//db	   
	    //}//recaptcha
	   
	    return false;
	}

    public function do_logout() {
		$UserName = GetGlobal('UserName');

		$un  = decode($UserName);
		$this->saveSession();

		setInfo(localize('_SEEYOU',getlocal()) . " $un ...");

		//zero cookie
		if (paramload('SHELL','cookies')) {
			setcookie("cuser","");
			setcookie("csess","");
		}
		
		$this->update_login_statistics('logout', $un);
	}
	
	public function getUserName() {
	    $UserName = GetGlobal('UserName');	
	    $ret = decode($UserName);
	  
	    return ($ret);
	}
	
	public function recaptcha() {
		if (defined('RECAPTCHA_DPC')) {
	        $recaptcha = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	   
			return $recaptcha;
	    }	
		return false;
	}	

    protected function do_reenter_pasword($myusername=null) {
	    $db = GetGlobal('db');
	    $sFormErr = GetGlobal('sFormErr');
	    $UserName = GetGlobal('UserName');

	    if ($id = GetParam('sectoken')) {//by mail link or form hidden element ajax call
		    $toks = explode('|',base64_decode(urldecode($id)));
		    $currentuser = $toks[0]; 
	    } 			   
	    else
	        $currentuser = $myusername ? $myusername : decode($UserName);
	   
	    if (!$currentuser) return false;
	   
	    $pwd = GetParam("Password");
	    $pwd2 = GetParam("vPassword");
       
	    if ($this->valid_recaptcha()) {
		if (($pwd!=null) && ($pwd2!=null)) {

			if ((strcmp($pwd,$pwd2)==0)) {
		 
				//extra checks
				if ((!is_numeric($pwd)) && (strlen($pwd)>=8)) {

					$sSQL = "UPDATE users set " .
							"password='" . md5(addslashes($pwd))  . "'," .
							"vpass='" . md5(addslashes($pwd2))  . "'," .
							"clogon=0";

					if (!$a) 
						$sSQL .= " WHERE username ='" . $currentuser . "'";
					else 
						$sSQL .= " WHERE ".$this->actcode." =" . $a;

					$db->Execute($sSQL,1);
					$this->formerror = localize('ok2',getlocal());
					SetGlobal('sFormErr',$this->formerror);
				}
				else {
					$this->formerror = localize('_MSGPWD',getlocal());
					SetGlobal('sFormErr',$this->formerror);	 	   
				} 		   
			}
			else {
				$this->formerror = localize('_MSG21',getlocal());
				SetGlobal('sFormErr',$this->formerror);
			}  
	   }
	   }//recaptcha
	}
	
    public function form_reset_pass($tokensout=null,$username=null) {
	    $sectoken = GetReq('sectoken') ? '&sectoken='.GetReq('sectoken') : null;
        $url = seturl("t=chpass".$sectoken,0,1);
	   
	    if (defined('RECAPTCHA_DPC')) 
	        $recaptcha = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	   
		
		if ($tokensout) 
		    $tokens[] = $this->formerror;
		else
            $loginform = $this->formerror;
		   
		if ($tokensout) {
		    $tokens[] = "<form action=\"$url\" method=\"POST\">";
		    $tokens[] = "<input type=\"password\" autocomplete=\"off\" name=\"Password\" maxlenght=\"50\" size=\"20\" class=\"myf_input\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255); \">";
		    $tokens[] = "<input type=\"password\" autocomplete=\"off\" name=\"vPassword\" maxlenght=\"50\" size=\"20\" class=\"myf_input\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255); \">";		   
		    $tokens[] = $recaptcha;		   
		    $tokens[] = "<input type=\"submit\" class=\"myf_button\" value=\"" . localize('_RESET',getlocal()) . "\">";

		    $tokens[] = "<input type=\"hidden\" name=\"FormAction\" value=\"chpass\">" .
		               "<input type=\"hidden\" name=\"username\" value=\"$username\">" .
		               "<input type=\"hidden\" name=\"FormName\" value=\"UserChPass\">".
					   "</form>";
            $tokens[] = GetReq('sectoken');//use in form hidden element ajax call					   
		}
		else {		   
            $loginform .= "<form action=\"$url\" method=\"POST\">";
            $loginform .= "<input type=\"hidden\" name=\"FormName\" value=\"RemLogin\">";
            //$loginform .= localize('_USERNAME',getlocal()) . " :<br><input type=\"text\" name=\"myusername\" maxlenght=\"50\" size=\"12\" ><br>";
            $lf0[] = localize('_PASSWORD',getlocal());
		    $lfat0[] = "right;40%;";
		    $lf0[] = "&nbsp;<input type=\"password\" autocomplete=\"off\" name=\"password\" maxlenght=\"20\" size=\"20\" >";
		    $lfat0[] = "left;60%";
		    $w0 = new window('',$lf0,$lfat0);  $loginform .= $w0->render("center::100%::0::group_article_selected::left::0::0::");   unset ($w0);
		  
            //$loginform .= localize('_MAIL',getlocal()) . " :<br><input type=\"text\" name=\"myemail\" maxlenght=\"50\" size=\"12\" ><br>";
            $lf1[] = localize('_VERPASS',getlocal());
	        $lfat1[] = "right;40%;";
		    $lf1[] = "&nbsp;<input type=\"password\" autocomplete=\"off\" name=\"VPassword\" maxlenght=\"50\" size=\"20\" >";
		    $lfat1[] = "left;60%";
		    $w1 = new window('',$lf1,$lfat1);  $loginform .= $w1->render("center::100%::0::group_article_selected::left::0::0::");   unset ($w1);

		    $loginform .= $recaptcha;
		  
            $loginform .= "<input type=\"hidden\" name=\"FormAction\" value=\"chpass\">";
		    $loginform .= "<input type=\"hidden\" name=\"username\" value=\"$username\">";
            $loginform .= "<input type=\"submit\" value=\"" . localize('_RESET',getlocal()) . "\">";
            $loginform .= "</form>";
      
            $toprint .= $loginform;

            $swin = new window(localize('_RESETPASS',getlocal()),$toprint);
            $out .= $swin->render();//"center::40%::0::group_win_body::left::0::0::");
	        unset ($swin);
		}//tokens		   
		 
	    if ($tokensout) 
	        return ($tokens); 		 
		  
	   return ($out);
    }	
	
	protected function html_reset_pass($editmode=null) {
	    $UserName = GetGlobal('UserName');
	   
	    if ($id = base64_decode(urldecode(GetReq('sectoken')))) {//by mail link
		    $toks = explode('|',$id);
		    $timestamp = time(); 
		    if (is_numeric($toks[1]) && (($timestamp-(intval($toks[1])))<3600)) {//timestamp < 1 hour
				$currentuser = $toks[0]; 
		    }	 
		    else {//timestamp is invalid	 
				$currentuser = null; 
				$this->formerror = localize('_ERRSECTOKEN',getlocal());
				SetGlobal('sFormErr',$this->formerror);
		    }	 
		    //echo $timestamp,intval($toks[1]),'>',$currentuser;
	    } 			   
	    elseif ($UserName)	   
			$currentuser = decode($UserName);	
	    else
			$currentuser = null;	   
	
	    if (($currentuser) && ($this->formerror!=localize('ok2',getlocal()))) {
			$toks = $this->form_reset_pass(1, $currentuser);
		
			$mydata = str_replace('+','<@>',implode('<TOKENS>',$toks));
		
			if (!$ret = GetGlobal('controller')->calldpc_method("fronthtmlpage.subpage use userchpass.htm+".$mydata)) 
				$ret = $this->form_reset_pass(null,$currentuser);
		  
		}	  
		else {//login
			if (!$editmode)
				$ret = $this->html_form(); 
	    }	
		  
	    return ($ret);  
	}		

	protected function saveSession() {
	    $db = GetGlobal('db');
	    $UserName = GetGlobal('UserName');

		$currentses = session_id();
		$currentuser = decode($UserName);
		$session_data = str_replace("\"","<@>",session_encode());
		//echo '>',$session_data;
		//save ses id
		$sSQL = "UPDATE users set sesid='" . $currentses .
                    "',sesdata='" . $session_data .
		       "' WHERE username ='" . $currentuser . "'" ;

		$db->Execute($sSQL,1);
	   
	    //unregister all selected session params
	    ResetSessionParams();

        //session_write_close();

        session_unset();

	    //session_destroy();
	}

	protected function loadSession($uname) {
		$db = GetGlobal('db');

	    $sSQL = "select sesdata from users where username='" . $uname ."'" ;
        $res = $db->Execute($sSQL,2);//null,1);

	    session_decode(str_replace("<@>","\"",$res->fields[0]));
    }

	public function is_reseller($leeid=null) {
	    $db = GetGlobal('db');

	    if ($leeid!=null)
			$id = $leeid;
	    else
			$id = decode(GetSessionParam('UserID'));

	    //if is in cuatomers table then....
	    if ($id) {
			$sSQL = "select attr1 from customers where ".$this->actcode."=" . $id;
			$result = $db->Execute($sSQL,2);

			if ($result->fields[0]==$this->reseller_attr) {//'ΧΟΝΔΡΙΚΗ') {
				//echo 'yes';
				SetSessionParam('RESELLER','true');
				return true;
			}
	    }

	    return false;
	}

	protected function iforgotmypassword() {

	    $ret = $this->message . "&nbsp;" . $this->link;
		return ($ret);
	}

    public function remform($tokensout=null) {

        $url = seturl("t=shremember",0,1);

  	    if ($this->formerror!=localize("ok", getlocal())) {//"ok") {
	   
			if (defined('RECAPTCHA_DPC')) 
				$recaptcha = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	   	   

			if ($this->ssl) {
				//$loginform .= $this->sslscript;
				$sslwin = new window("",$this->sslscript);
				$loginform .= $sslwin->render("center::100%::0::group_article_selected::right::0::0::");
				unset ($sslwin);
			}
         
			if ($tokensout) 
				$tokens[] = $this->formerror;
			else
				$loginform .= $this->formerror;

			if ($tokensout) {
				$tokens[] = "<form action=\"$url\" method=\"POST\">";
				$tokens[] = "<input type=\"text\" autocomplete=\"off\" name=\"myemail\" maxlenght=\"50\" size=\"20\" class=\"myf_input\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255); \">";
				$tokens[] = $recaptcha;		   
				$tokens[] = "<input type=\"submit\" class=\"myf_button\" value=\"" . localize("_ok",getlocal()) . "\">";

				$tokens[] = "<input type=\"hidden\" name=\"FormAction\" value=\"shremember\">" .
		               "<input type=\"hidden\" name=\"FormName\" value=\"RemLogin\">".
					   "</form>";
			}
			else {		   
				$loginform .= "<form action=\"$url\" method=\"POST\">";
				$loginform .= "<input type=\"hidden\" name=\"FormName\" value=\"RemLogin\">";

				$lf1[] = localize('_MAIL',getlocal());
				$lfat1[] = "right;40%;";
				$lf1[] = "&nbsp;<input type=\"text\" autocomplete=\"off\" name=\"myemail\" maxlenght=\"50\" size=\"20\" >";
				$lfat1[] = "left;60%";
				$w1 = new window('',$lf1,$lfat1);  $loginform .= $w1->render("center::100%::0::group_article_selected::left::0::0::");   unset ($w1);

				$loginform .= $recaptcha;
		  
				$loginform .= "<input type=\"hidden\" name=\"FormAction\" value=\"shremember\">";
				$loginform .= "<input type=\"submit\" value=\"" . localize("_ok",getlocal()) . "\">";
				$loginform .= "</form>";
      
				$toprint .= $loginform;

				$swin = new window(localize('CMSLOGIN_DPC',getlocal()),$toprint);
				$out .= $swin->render("center::40%::0::group_win_body::left::0::0::");
				unset ($swin);
			}//tokens
		 
			if ($tokensout) 
				return ($tokens); 
			else	 
				return ($out);		 
		}
		else {
			//echo 'OK';
			if (defined(_CAPTCHA_)) {
				//no press here...just showit in the page.
				//call the image
				$uc = seturl("t=sencaptcha&c=".encode($this->result));
				$winout .= "<img src=\"$uc\">";

				$swin = new window(localize('CMSLOGIN_DPC',getlocal()),$winout);
				$out .= $swin->render("center::40%::0::group_win_body::left::0::0::");
				unset ($swin);
			}
			elseif (defined('SMTPMAIL_DPC')) {
				//echo 'mailOK';		 
				$msg = localize('_SENDCRE',getlocal());		   
		   
				if ($tokensout) {
					$tokens[] = $msg;
			 
					//login tokens
					$tokens[] = "<form action=\"$logonurl\" method=\"POST\">".
		               "<input type=\"text\" name=\"Username\" maxlenght=\"20\">".
					   "<input type=\"hidden\" name=\"FormName\" value=\"Login\">";	
					$tokens[] = "<input type=\"password\" name=\"Password\" maxlenght=\"20\">".
		                 "<input type=\"hidden\" name=\"FormAction\" value=\"dologin\">";
					   
					$tokens[] = "<input type=\"submit\" value=\"" . localize('CMSLOGIN_DPC',getlocal()) . "\">".
					      "</form>";;					   		 
				}
				else {
					$swin = new window(localize('CMSLOGIN_DPC',getlocal()),$msg);
					$out .= $swin->render("center::40%::0::group_win_body::left::0::0::");
					unset ($swin);
				}	 
			}
			else {
				//echo 'textOK';
				//text ver
				$r = $this->result;
				if ($tokensout) {
					$tokens[] = $r;
				}
				else {		   
					$swin = new window(localize('CMSLOGIN_DPC',getlocal()),$r);
					$out .= $swin->render("center::40%::0::group_win_body::left::0::0::");
					unset ($swin);
				}	 
			}
		 
			if ($tokensout) 
				return ($tokens); 
			else	 
				return ($out);			 
	    }
    }
	
	public function html_remform() {
	
   		$toks = $this->remform(1);
		$mydata = str_replace('+','<@>',implode('<TOKENS>',$toks));
		
		if (!$ret = GetGlobal('controller')->calldpc_method("fronthtmlpage.subpage use remlogin.htm+".$mydata)) 
			$ret = $this->remform();
		  
		return ($ret);  
	}

	protected function do_the_job() {
	    $db = GetGlobal('db');
	    $u = GetParam("myusername");
	    $m = GetParam("myemail");  
	   
        if ($this->valid_recaptcha($norecaptcha)) {	 

			if (($m)) {// && (!$u)) {//mail only -> send username and password
				$sSQL = "SELECT username, password, notes FROM users WHERE " .
						"email='" . addslashes($m) . "' and username is not null";//not for subscribers// and seclevid>0";

				//echo "remember:",$sSQL;
				$result = $db->Execute($sSQL,2);

				if (($u=$result->fields['username']) && ($p=$result->fields['password'])
				/* &&
					(strcmp(trim($result->fields['notes']),"DELETED")!=0)*/) {

					//if ($this->tellit) {
					$tokens[] = $u;
					/*if ($this->isoldpass($u)) //(strlen($sPassword)<=10) //old way
					$tokens[] = $p;
					else	
					$tokens[] = base64_decode($p);*/
					//md5 pass can't decoded, just send link to reset
					$tokens[] = null; 
			  
					$timestamp = time(); 
					$sectoken = urlencode(base64_encode($u.'|'.$timestamp));
					$reset_url = seturl('t=chpass&sectoken='.$sectoken);
					$tokens[] = $reset_url;			  
				
					$sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
					if (!$mailbody = GetGlobal('controller')->calldpc_method("fronthtmlpage.subpage use userremind.htm+".$sd."+1")) {
		
						$mailcontent = "Account info:<br>" . $u . '/' . $p;

						$template = paramload('SHELL','prpath') . "insertusrusr.tpl";
						$mailbody = str_replace("##_LINK_##",$mailcontent,file_get_contents($template));
						$this->result = $mailbody;
					}
			   
					$from = $this->accountmailfrom;
					$this->mailto($from,$m,localize('_UMAILREMSUBC',getlocal()),$mailbody);

					$this->formerror = localize("ok", getlocal());
					
					$this->update_login_statistics('login-renew', $u);
				}
				else 
					$this->formerror = localize('_MSG1',getlocal());
			}
			else
				$this->formerror = localize('_MSG1',getlocal());
		    
			if ($this->formerror!='ok') 
				SetGlobal('sFormErr',$this->formerror);		   
			else 
				SetGlobal('sFormErr',"OKREMINDER");////$msg);
		 
	    }//recaptcha	      
	}

	protected function do_the_captcha() {

		//$this->captcha = new captcha();//strlen($this->result),'jpeg',$this->result);
		//$captcha->sent_header();
		//echo $captcha;
	}

	protected function show_the_captcha() {

	    $result = decode(GetReq('c'));
		$captcha = new captcha(strlen($result),'jpeg',$result);

		die();
	}

	public function is_logged_in() {

	    if (GetSessionParam('UserID'))
		    return true;

		return false;
	}

	public function mailto($from,$to,$subject=null,$body=null) {

		if ((defined('SMTPMAIL_DPC')) && (seclevel('SMTPMAIL_DPC',$this->UserLevelID)) ) {
		    $smtpm = new smtpmail;
		    $smtpm->to = $to;
			$smtpm->from = $from;
			$smtpm->subject = $subject;
			$smtpm->body = $body ;

			$mailerror = $smtpm->smtpsend();

			unset($smtpm);

			return ($mailerror);
		}
	}
	
	public function login_with_key($key=null,$code=null,$ischar=null) {
	    $db = GetGlobal('db');
		 	
	    if ($key) {
	  
			$pk = explode("~",$key);

			$sSQL = "SELECT ".$this->actcode.", sesid, notes, seclevid, clogon, username, password FROM users WHERE ";
			$sSQL.= $code?$code:$this->actcode;
			$sSQL.= "=";
			$sSQL.= $ischar?"'".$pk[0]."'":$pk[0];
			//echo $sSQL;

			//echo "login:",$sSQL;

			$result = $db->Execute($sSQL,2);
			//print_r($result->fields);
			$hash = $pk[1];
			$data = trim($result->fields['username']).":".trim($result->fields['password']);
			$hash2cmp = md5($data);
		  
			if (strcmp($hash,$hash2cmp)==0) {
		  
				if (/*($result->fields[$this->actcode]>0) &&*////PROBLEM
		         (strcmp(trim($result->fields['notes']),"DELETED")!=0)) {
					 
					$sUsername = $result->fields['username']; 
					 
					/*if ($editmode) {
						$_SESSION['LOGIN'] = 'yes';
						$GLOBALS['LOGIN'] = 'yes';					
						SetSessionParam('LOGIN','yes');	
						SetSessionParam('ADMIN','yes');	
						SetSessionParam('ADMINSecID',$result->fields['seclevid']);
						return true;								   
					} */ 

					if ($this->load_session)
						$this->loadSession($sUsername);

					SetSessionParam("UserName", encode($sUsername));
					SetSessionParam("UserID", encode($result->fields[$this->actcode]));
					$GLOBALS['UserID']=encode($result->fields[$this->actcode]);
					SetSessionParam("UserSecID", encode($result->fields['seclevid']));
							  
					if ((defined('SHCUSTOMERS_DPC')))   						  
						GetGlobal('controller')->calldpc_method('shcustomers.is_reseller');						 

			        //re-enter password flag
			        if ($result->fields['clogon']==1) {
					    $this->must_reenter_password=1;
						$chpass = seturl("t=chpass",localize('_PASSREMINDER',getlocal()),1,'',1);
						setInfo($chpass);
					}
					else
  		                setInfo(localize('_WELLCOME',getlocal()) . " " . $sUsername);

					//set cookie
					if (paramload('SHELL','cookies')) {
					    setcookie("cuser",$UserName,time()+$this->time_of_session);//,time()+3600,"","stereobit.gr",0);
						setcookie("csess",session_id(),time()+$this->time_of_session);
					}
					
					$this->update_login_statistics('login', $sUsername);
					
					//echo "login:",$sSQL;
					return (encode($sUsername));
				}
				else {
		            //setInfo(localize('_MSG1',getlocal()));
                    //$sFormErr = localize('_MSG1',getlocal());
				    SetGlobal('sFormErr',localize('_MSG1',getlocal()));
					return false;
                }  
		    }//hash validation	 
	  
	    }//is key
	    else
			return false;
    }
   
	protected function valid_recaptcha() {
	 
	    if (!defined('RECAPTCHA_DPC')) return true;
		  
		//print_r($_POST);
		  
        if ($_POST["recaptcha_response_field"]) {
            $resp = recaptcha_check_answer ($this->recaptcha_private_key,
                                            $_SERVER["REMOTE_ADDR"],
                                            $_POST["recaptcha_challenge_field"],
                                            $_POST["recaptcha_response_field"]);
											
            //print_r($resp);
            if ($resp->is_valid) {
                $error = null;//echo "You got it!";
				$ret = true;
            } 
			else {
                # set the error code so that we can display it
                $error = $resp->error;
				$ret = false;
		        $msg = '<br>' . "Incorrect recaptcha entry!";				
            }
		}
		else {
		    $ret = false;
		    $msg = '<br>' . "Recaptcha entry required!";			  
		}
		  
		$this->formerror = $msg;//'recaptcha error';
		SetGlobal('sFormErr',$msg);
		  
		return ($ret);																			 
    }     
   
	public function combine_tokens($template_contents,$tokens) {
	
	    if (!is_array($tokens)) return;
		
		if (defined('FRONTHTMLPAGE_DPC')) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);
          //$ret = GetGlobal('controller')->calldpc_method("fronthtmlpage.process_commands use ".$template_contents);		  		
		}		  		
		else
		  $ret = $template_contents;
		  
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
            //echo $tok,'<br>';
		    $ret = str_replace("$".$i,$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<10;$x++)
		  $ret = str_replace("$".$x,'',$ret);
		//echo $ret;
		return ($ret);
	}   

	public static function myf_button($title,$link=null,$image=null) {
	    //$browser = get_browser(null, true);
        //print_r($browser);	
        //echo $_SERVER['HTTP_USER_AGENT']; 
	    //echo '1';
	    $path = self::$staticpath;//$this->urlpath;//
	   
	    if (($image) && (is_readable($path."/images/".$image.".png"))) {
			//echo 'a';
			$imglink = "<a href=\"$link\" title='$title'><img src='images/".$image.".png'/></a>";
	    }
	   
	    if (preg_match('/MSIE/i',$_SERVER['HTTP_USER_AGENT'])) { 
			//echo 'ie';
			$_b = $imglink ? $imglink : "[$title]";
			$ret = "&nbsp;<a href=\"$link\">$_b</a>&nbsp;";
			return ($ret);
	    }	
	   
		if ($imglink)
	       return ($imglink);
	
		//else button	
		if ($link)
			$ret = "<a href=\"$link\">";
			
		$ret .= "<input type=\"button\" class=\"myf_button\" value=\"".$title."\" />";
	   
		if ($link)
			$ret .= "</a>";	   
		  
		return ($ret);
	}
	
	public function myf_login_logout($link=null,$glue=null) {
	
	    if ($UserID = GetGlobal('UserID')) {
	        $url = seturl("t=dologout",localize('_SHLOGOUT',getlocal()),null,null,null,true);
			$myfb = ($link) ? (($glue) ? '<'.$glue.'>'.$url.'</'.$glue.'>' : $url) :
			                  $this->myf_button(localize('_SHLOGOUT',getlocal()),'dologout/','_SHLOGOUT');
	    }
	    else {
		    $url = seturl("t=login",localize('CMSLOGIN_DPC',getlocal()),null,null,null,true);
		    $myfb = ($link) ? (($glue) ? '<'.$glue.'>'.$url.'</'.$glue.'>' : $url) :
			                  $this->myf_button(localize('CMSLOGIN_DPC',getlocal()),'login/','_SHLOGIN');
	    }
	   
	    return ($myfb);
	}
	
	protected function update_login_statistics($id, $user=null) {
        $db = GetGlobal('db'); 

	    $currentdate = time();	
	    $myday  = date('d',$currentdate);	
	    $mymonth= date('m',$currentdate);	
	    $myyear = date('Y',$currentdate);
						
		$sSQL = "insert into stats (day,month,year,attr1,attr3,REMOTE_ADDR,HTTP_X_FORWARDED_FOR) values (";
		$sSQL.= $myday . ",";
		$sSQL.= $mymonth . ",";
		$sSQL.= $myyear . ",";						
		$sSQL.= $db->qstr($id) . ',';
		$sSQL.= $db->qstr($user) . ',';
		$sSQL.= $db->qstr($_SERVER['REMOTE_ADDR']) . ",";
		$sSQL.= $db->qstr($_SERVER['HTTP_X_FORWARDED_FOR']) . ")";			

		$db->Execute($sSQL,1);	 
		
		if ($db->Affected_Rows()) 
			return true;
		else 
			return false;		
	}	
	
};
}
?>