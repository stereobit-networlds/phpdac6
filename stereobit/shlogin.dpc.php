<?php
$__DPCSEC['SHLOGIN_DPC']='1;1;1;1;1;1;1;1;1;1';

if ((!defined("SHLOGIN_DPC")) && (seclevel('SHLOGIN_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("SHLOGIN_DPC",true);

$__DPC['SHLOGIN_DPC'] = 'shlogin';

$a = GetGlobal('controller')->require_dpc('shop/shlogin.dpc.php');
require_once($a);

GetGlobal('controller')->get_parent('SHLOGIN_DPC','STLOGIN_DPC');

$__EVENTS['SHLOGIN_DPC'][0]='shlogin';
$__EVENTS['SHLOGIN_DPC'][1]='dologin';
$__EVENTS['SHLOGIN_DPC'][2]='dologout';
$__EVENTS['SHLOGIN_DPC'][3]='rempwd';
$__EVENTS['SHLOGIN_DPC'][4]='shremember';
$__EVENTS['SHLOGIN_DPC'][5]='shcaptcha';
$__EVENTS['SHLOGIN_DPC'][6]='chpass';
$__EVENTS['SHLOGIN_DPC'][7]='shrememberajax';
$__EVENTS['SHLOGIN_DPC'][8]='chpassajax';
$__EVENTS['SHLOGIN_DPC'][9]='dologinajax';
$__EVENTS['SHLOGIN_DPC'][10]='shreg';

$__ACTIONS['SHLOGIN_DPC'][0]='shlogin';
$__ACTIONS['SHLOGIN_DPC'][1]='dologin';
$__ACTIONS['SHLOGIN_DPC'][2]='dologout';
$__ACTIONS['SHLOGIN_DPC'][3]='rempwd';
$__ACTIONS['SHLOGIN_DPC'][4]='shremember';
$__ACTIONS['SHLOGIN_DPC'][5]='shcaptcha';
$__ACTIONS['SHLOGIN_DPC'][6]='chpass';
$__ACTIONS['SHLOGIN_DPC'][7]='shrememberajax';
$__ACTIONS['SHLOGIN_DPC'][8]='chpassajax';
$__ACTIONS['SHLOGIN_DPC'][9]='dologinajax';
$__ACTIONS['SHLOGIN_DPC'][10]='shreg';

$__DPCATTR['SHLOGIN_DPC']['shlogin'] = 'shlogin,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['SHLOGIN_DPC'][0]='SHLOGIN_DPC;Login;Εισαγωγή';
$__LOCALE['SHLOGIN_DPC'][1]='_SHLOGOUT;Logout;Αποσύνδεση';
$__LOCALE['SHLOGIN_DPC'][2]='SHLOGIN_CNF;Logout;Αποσύνδεση';
$__LOCALE['SHLOGIN_DPC'][3]='SHLOGIN_UNK;Login;Εισαγωγή';
$__LOCALE['SHLOGIN_DPC'][4]='_USERNAME;Username;Χρήστης';
$__LOCALE['SHLOGIN_DPC'][5]='_PASSWORD;Password;Κωδικός';
$__LOCALE['SHLOGIN_DPC'][6]='_WELLCOME;Welcome;Καλωσήρθες';
$__LOCALE['SHLOGIN_DPC'][7]='_SEEYOU;See you next time;Τα λέμε';
$__LOCALE['SHLOGIN_DPC'][8]='_MSG1;Incorrect data!;Λάθος στοιχεία!';
$__LOCALE['SHLOGIN_DPC'][9]='_VERPASS;Verify password;Επαληθευση κωδικου';
$__LOCALE['SHLOGIN_DPC'][10]='_PASSREMINDER;Please change your password!;Παρακαλω αλλαξτε τον κωδικό σας!';
$__LOCALE['SHLOGIN_DPC'][11]='_VERPASSUCCESS;Password changed!;Επιτυχης αλλαγη κωδικου';
$__LOCALE['SHLOGIN_DPC'][12]='_HERE;here;εδώ';
$__LOCALE['SHLOGIN_DPC'][13]="_IFORGET;If you dont remember your password click ;Αν δεν θυμαστε τον κωδικο σας πατηστε";
$__LOCALE['SHLOGIN_DPC'][14]='_PRESSHERE;Click here;Πατήστε εδώ';
$__LOCALE['SHLOGIN_DPC'][15]='_MSG2;Username and Password send at your mail account!;Το όνομα χρήστη και ο κωδικός στάλθηκαν στο ηλεκτρονικό σας ταχυδρομείο!';
$__LOCALE['SHLOGIN_DPC'][16]='_SENDCRE;Username and Password send at your mail account!;Το όνομα χρήστη και ο κωδικός στάλθηκαν στο ηλεκτρονικό σας ταχυδρομείο!';
$__LOCALE['SHLOGIN_DPC'][17]='_UMAILREMSUBC;Account reset;Αλλαγή κωδικού χρήστη';
$__LOCALE['SHLOGIN_DPC'][18]='_OK;Success;Επιτυχης εργασια';
$__LOCALE['SHLOGIN_DPC'][19]='_OKREMINDER;Your account details has been send by e-mail.;Τα στοιχεία του λογαριασμού σας σταλθηκσν με e-mail.';
$__LOCALE['SHLOGIN_DPC'][20]='_RESET;Reset;Αλλαγή';
$__LOCALE['SHLOGIN_DPC'][21]='_RESETPASS;Reset password;Αλλαγή κωδικού';
$__LOCALE['SHLOGIN_DPC'][22]="_MSG21;Password and verify password doesn't match!;Η επιβαιβαιωση κωδικου δεν συμφωνει με τον κωδικο σας.";
$__LOCALE['SHLOGIN_DPC'][23]='_MSGPWD;Invalid password length, 8 characters required;Μη αποδεκτός κωδικός, 8 χαρακτήρες τουλάχιστον είναι απαραίτητοι';
$__LOCALE['SHLOGIN_DPC'][24]='ok;An mail send to you. Follow the instruction in order to complete the process;Ένα email σταλθηκε στον λογαριασμό ηλ. ταχυδρομείου που δηλώσατε. Ακολουθήστε τις οδηγίες για την ολοκληρωση της διαδικασίας';
$__LOCALE['SHLOGIN_DPC'][25]='_ok;Submit;Αποστολή';
$__LOCALE['SHLOGIN_DPC'][26]='ok2;Password changed;Ο κωδικός άλλαξε';
$__LOCALE['SHLOGIN_DPC'][27]='_ERRSECTOKEN;Invalid token;Λάνθασμένο στοιχείο';
$__LOCALE['SHLOGIN_DPC'][28]='_NOTAFFECTED;Record not affected;Δεν έγινε η αλλαγή';
$__LOCALE['SHLOGIN_DPC'][29]='_PLEASETEXT;Please fill out the information bellow and proceed;Παρακαλώ εισάγετε τα στοιχεία που ειναι απαραίτητα για την εισαγωγή στο σύστημα';
$__LOCALE['SHLOGIN_DPC'][30]='_WELCOME2GO;Press here to proceed;Πατήστε εδώ για να συνεχίσετε την περιηγησή σας';
$__LOCALE['SHLOGIN_DPC'][31]='_back;Back;Επιστροφή';

class shlogin {

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
	var $resetPass, $isLogin;	
	var $tmpl_path, $tmpl_name;	
	
	static $staticpath;

	function shlogin() {
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

	   if ($remoteuser=GetSessionParam('REMOTELOGIN'))
	     $this->path = paramload('SHELL','prpath')."instances/$remoteuser/";
	   else
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

	   $this->title = localize('SHLOGIN_DPC',getlocal());
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
	   
	   $this->resetPass = false;
	   $this->isLogin = false;
	   
       //timezone	   
       date_default_timezone_set('Europe/Athens');		   
	}

    function event($sAction) {

         switch($sAction)   {
			case 'shreg'         : $this->register();
			                       break;
		    case 'rempwd'        : break;
			case 'shrememberajax':
		    case 'shremember'    : $this->do_the_job(); 
			                       break;
		    case 'shcaptcha'     : $this->do_the_captcha(); break;
            case 'shlogin'       : break;

			case "dologinajax"   :
            case "dologin"       :  
			                       $this->login_successfull = $this->do_login();
                                   if (($this->login_goto)&& ($this->login_successfull)) {
							            if (!$this->dpc_after_goto)// inside code command
			                                $this->refresh_page_js($this->login_goto);	
									}	
																		  
							        if (defined('UONLINE_DPC'))
									   GetGlobal('controller')->calldpc_method('uonline.isOnline');
									break;

            case "dologout"      :  
	                                if (defined('UONLINE_DPC'))
    	                                GetGlobal('controller')->calldpc_method('uonline.isOffline');
											  
                                    $this->do_logout();
											
                                    if ($this->logout_goto)
			                            $this->refresh_page_js($this->logout_goto); 											
                                    break;
			
             case "chpassajax" :			
			 case "chpass"     : 
								    $this->do_reenter_pasword(); 
			                        break;
							 					 
          }
	}

    function action($action=null)  {

        switch($action)   {
		    case 'shreg'         : break;
		
			case 'shrememberajax':if ($this->formerror!=localize("ok",getlocal()))
			                        die($this->formerror);
								  else
								    die(localize('_OKREMINDER', getlocal()));
			                      break;
								  
		    case 'rempwd'        :
		    case 'shremember'    : 
			                       break;
		    case 'shcaptcha'     : $out .= $this->show_the_captcha(); break;
            case "shlogin"       : break;

			case "dologinajax"   : $gurl = $_POST['FormGoto'] ? $_POST['FormGoto'] : $this->login_goto;
			                       $goto = $gurl ? '<a href="'.$gurl.'">'.localize('_WELCOME2GO',getlocal()).'</a>' : null;
			                       die($goto); 
								   break;
            case "dologin"       :
								 //goto after login with ses param
								 if (($this->dpc_after_goto) && ($this->login_successfull)) {
								    //echo $this->dpc_after_goto,'>';
								    $mydpc = explode('.',$this->dpc_after_goto);//check security
									$mydpcname = strtoupper($mydpc[0]).'_DPC';	
									
									if (seclevel($mydpcname,$this->userLevelID)) 
										$out .= GetGlobal('controller')->calldpc_method($this->dpc_after_goto);
 
									$this->dpc_after_goto = null;
									SetSessionParam('afterlogingoto','');
								 }

								break;

            case "dologout"   : break;
			
		    case "chpass"     : $out = $this->html_reset_pass();
			                    break;
							
			case "chpassajax" : die($this->formerror); break;				
		}

		return ($out);
	}	
	
    function refresh_page_js($goto) {
   
      if (iniload('JAVASCRIPT')) {

	       $code = $this->javascript($goto);
	   
		   $js = new jscript;
           $js->load_js($code,"",1);			   
		   unset ($js);
	  }   
    }   
   
    //after login/logout goto...
    function javascript($goto) {
   
      $ret = "function neu(){top.frames.location.href = \"$goto\"} window.setTimeout(\"neu()\",10);";
	  return ($ret);
    }   	

	function isoldpass($username) {
	   $db = GetGlobal('db');
	   
	   $sSQL = "select password from users where username='".$username."'";// limit 1 desc";//multiple users last
	   $result = $db->Execute($sSQL,2);
	   $p = $result->fields['password'];
	   //echo $p,$sSQL,strlen($p);
	   if (($p) && (strlen($p)<=10)) //user exist and pass <=10 chars
	      return true;
	
       return false;	
	}
	
	public function isLogin() {
		//print_r($_POST);
		if ($_POST['Username'] && $this->dologin==true) {
			//echo 'z';
			return 1;
		}
		return 0;
	}	

    function do_login($user='',$pwd='') {
	   $db = GetGlobal('db');
	   $sFormErr = GetGlobal('sFormErr');
	   $UserName = GetGlobal('UserName');

       if (!$user) $sUsername = GetParam("Username");
	          else $sUsername = $user;
       if (!$pwd) $sPassword = GetParam("Password");
	         else $sPassword = $pwd;
			 
	   if ($this->valid_recaptcha($norecaptcha)) {		 

	   if (($sUsername) && ($sPassword)) {

		  $sSQL = "SELECT ".$this->actcode.", sesid, notes, seclevid, clogon FROM users" . " WHERE username ='" .
				addslashes($sUsername) . "' AND password='" . md5(addslashes($sPassword)) . "'";		  
          
          $result = $db->Execute($sSQL,2);
		  //print_r($result->fields);

          if (($result->fields[$this->actcode]) && (strcmp(trim($result->fields['notes']),"DELETED")!=0)) {
		  
				if (intval($result->fields['seclevid'])>=5) { 	 //echo 'admin';
		            $_SESSION['LOGIN'] = 'yes';
					$GLOBALS['LOGIN'] = 'yes';
		            SetSessionParam('ADMIN','yes');	
				    SetSessionParam('ADMINSecID',$result->fields['seclevid']);
					SetSessionParam("LoginName", $sUsername); //un-encoded	
				}  
                //else {
                if ($this->load_session)
				    $this->loadSession($sUsername);
		        //}
                SetSessionParam("UserName", encode($sUsername)); 
                SetSessionParam("UserID", encode($result->fields[$this->actcode]));
				$GLOBALS['UserID']=encode($result->fields[$this->actcode]);
                SetSessionParam("UserSecID", encode($result->fields['seclevid']));
				$GLOBALS['ADMINSecID']= $result->fields['seclevid'];
				SetSessionParam('ADMINSecID',$result->fields['seclevid']);	
								
				$this->isLogin = true;
				
				return true;
           }
	   }
	   } //recaptcha
	   
	   return false;
	}

    function do_logout() {
      $UserName = GetGlobal('UserName');

      $un  = decode($UserName);
      $this->saveSession();
	}
	
	function getUserName() {
	  $UserName = GetGlobal('UserName');	
	  
	  $ret = decode($UserName);
	  
	  return ($ret);
	}

    function do_reenter_pasword($myusername=null) {
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

	     if  ((strcmp($pwd,$pwd2)==0)) {
		 
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

	        //echo $sSQL;

            $db->Execute($sSQL,1);
            //if($db->Affected_Rows()) 
				$this->formerror = localize('ok2',getlocal());//"ok2";
	        //else //same pass goes here
				//$this->formerror = localize('_NOTAFFECTED',getlocal());
			 
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
	
    function form_reset_pass($tokensout=null,$username=null) {
	   $sectoken = GetReq('sectoken') ? '&sectoken='.GetReq('sectoken') : null;
       $url = seturl("t=chpass".$sectoken,0,1);
		  
	   //if ((!$currentuser) || ($this->formerror!=localize('ok2',getlocal()))) {
	   
	     if (defined('RECAPTCHA_DPC')) {
	         $recaptcha = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	   
	     }	
		 if ($tokensout) {
		   $tokens[] = $this->formerror;
		 }
		 else
           $loginform .= $this->formerror;
		   
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
       //}
		  
	   return ($out);
    }	
	
	public function recaptcha() {
		if (defined('RECAPTCHA_DPC')) {
	        $recaptcha = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	   
			return $recaptcha;
	    }	
		return false;
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
		  
	   return ($ret);  
	}		

	protected function saveSession() {
	   $db = GetGlobal('db');
	   $UserName = GetGlobal('UserName');
	   
	   if ($db) {

		$currentses = session_id();
		$currentuser = decode($UserName);
		$session_data = str_replace("\"","<@>",session_encode());
		$sSQL = "UPDATE users set sesid='" . $currentses .
                    "',sesdata='" . $session_data .
		       "' WHERE username ='" . $currentuser . "'" ;

		$db->Execute($sSQL,1);
       }
	   
	   //unregister all selected session params
	   ResetSessionParams();

       session_unset();
	}

	protected function loadSession($uname) {
	   $db = GetGlobal('db');


	   $sSQL = "select sesdata from users where username='" . $uname ."'" ;
       $res = $db->Execute($sSQL,2);//null,1);

	   session_decode(str_replace("<@>","\"",$res->fields[0]));
    }
	
	protected function domain_exists($email, $record = 'MX'){
		list($user, $domain) = explode('@', $email);
		return checkdnsrr($domain, $record);
	} 	
	
	public function isResetPass() {
		//print_r($_POST);
		if ($_POST['Username'] && $this->resetPass==true) {
			//echo 'z';
			return 1;
		}
		return 0;
	}		

	protected function do_the_job() {
	   $db = GetGlobal('db');
	   $m = GetParam("Username");//////////////////"myemail"); //same as login form  
	   
       if ($this->valid_recaptcha($norecaptcha)) {	 

		if ($this->domain_exists($m)) {
	       $sSQL = "SELECT username, password, notes FROM users WHERE email='" . addslashes($m) ."'";

	       //echo "remember:",$sSQL;
           $result = $db->Execute($sSQL,2);

           if (($u=$result->fields['username']) && ($p=$result->fields['password'])) {
	
			   $tokens[] = $u;
               $tokens[] = null; 
			  
			   $timestamp = time(); 
			   $sectoken = urlencode(base64_encode($u.'|'.$timestamp));
	           $reset_url = seturl('t=chpass&sectoken='.$sectoken);
               $tokens[] = $reset_url;			  
				
			   $data = $this->select_template('userremind');
			   $mailbody = $this->combine_tokens($data,$tokens,true);
			   
		       $from = $this->accountmailfrom;
	           $this->mailto($from,$m,localize('_UMAILREMSUBC',getlocal()),$mailbody);
			   
			   $this->resetPass = true;
			   
			   return true;	
		   }
		 } 
	   }//recaptcha	       
	   return false;
	}

	function do_the_captcha() {

	}

	function show_the_captcha() {

	       $result = decode(GetReq('c'));
		   $captcha = new captcha(strlen($result),'jpeg',$result);

		   die();
	}

	function is_logged_in() {

	      if (GetSessionParam('UserID'))
		    return true;

		  return false;
	}

	protected function mailto($from,$to,$subject=null,$body=null) {

		       $smtpm = new smtpmail;
		       $smtpm->to = $to;
			   $smtpm->from = $from;
			   $smtpm->subject = $subject;
			   $smtpm->body = $body ;

			   $mailerror = $smtpm->smtpsend();
			   //echo '>',$mailerror;

			   unset($smtpm);

			   return ($mailerror);
	}
	
	function login_with_key($key=null,$code=null,$ischar=null) {
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
		  
		  if (strcmp($hash,$hash2cmp)==0) {//echo 'zzzz2';
		  
          
             if (/*($result->fields[$this->actcode]>0) &&*////PROBLEM
		         (strcmp(trim($result->fields['notes']),"DELETED")!=0)) {//echo 'zzzz';

                             if ($this->load_session)
							  $this->loadSession($sUsername);

							  $_POST['UserName'] = encode($sUsername);
							  
                              SetSessionParam("UserName", encode($sUsername));
							  SetSessionParam("Password", encode($sPassword));//!!!!!
                              SetSessionParam("UserID", encode($result->fields[$this->actcode]));
							  $GLOBALS['UserID']=encode($result->fields[$this->actcode]);
                              SetSessionParam("UserSecID", encode($result->fields['seclevid']));

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
   
	 function valid_recaptcha() {
	 
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
	 
	
	//special reg for cp
    protected function register() {
		
	}	
   
	protected function select_template($tfile=null) {
		if (!$tfile) return;
	  
		$template = $tfile . '.htm';	
		$t = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template) ;   
		//echo $t,'>';
		if (is_readable($t)) 
			$mytemplate = file_get_contents($t);

		return ($mytemplate);	 
    }		
	
	//tokens method	
	protected function combine_tokens($template_contents, $tokens, $execafter=null) {
	
	    if (!is_array($tokens)) return;
		
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