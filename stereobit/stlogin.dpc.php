<?php
$__DPCSEC['STLOGIN_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if (!defined("STLOGIN_DPC"))  {
define("STLOGIN_DPC",true);

$__DPC['STLOGIN_DPC'] = 'stlogin';

$a = GetGlobal('controller')->require_dpc('cgi-bin/stereobit/shlogin.dpc.php', getcwd());
require_once($a);

GetGlobal('controller')->get_parent('SHLOGIN_DPC','STLOGIN_DPC');

$__EVENTS['STLOGIN_DPC'][10]='shreg';

$__ACTIONS['STLOGIN_DPC'][10]='shreg';

$__DPCATTR['STLOGIN_DPC']['stlogin'] = 'stlogin,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['STLOGIN_DPC'][0]='STLOGIN_DPC;Login;Εισαγωγή';
$__LOCALE['STLOGIN_DPC'][1]='_back;Back;Επιστροφή';
$__LOCALE['STLOGIN_DPC'][2]='_RESETPASS;Reset password;Αλλαγή κωδικού';
$__LOCALE['STLOGIN_DPC'][3]='_mailmxerr;Wrong e-mail;Λανθασμένο e-mail';
$__LOCALE['STLOGIN_DPC'][4]='ok;A message sent to you. Please use the link to activate your account;Ένα μήνυμα στάλθηκε στο e-mail που δηλώσατε. Παρακαλώ ενεργοποιήστε τον λογαριασμό σας';

class stlogin extends shlogin {

	var $resetPass, $isLogin, $isRegistered;
	var $inactive_on_register;	
	var $tmpl_path, $tmpl_name;	
	
	var $recaptcha, $ssl;

	function __construct() {
		
	   shlogin::shlogin();	

	   $this->tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->path);
	   $this->tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->path);	   
	   
	   $this->resetPass = false;
	   $this->isLogin = false;
	   $this->isRegistered = false;
	   
	   $this->inactive_on_register = remote_paramload('SHUSERS','inactive_on_register',$this->path);	   
	   
	   //override
	   $this->logout_goto = remote_paramload('STLOGIN','logout_goto',$this->path);
	   $this->login_goto = remote_paramload('STLOGIN','login_goto',$this->path);		   
	   $this->after_goto = remote_paramload('STLOGIN','aftergoto',$this->path); 
	   $this->dpc_after_goto = GetSessionParam('afterlogingoto') ? GetSessionParam('afterlogingoto') : $this->after_goto;   
	   
	   $rp = remote_paramload('STLOGIN','recaptcha',$this->path);
	   $this->recaptcha = $rp ? true : false;
	   $this->ssl = (isset($_SERVER['HTTPS'])) ? true : false;
	   
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

            case 'shlogin'       : break;

			case "dologinajax"   :
            case "dologin"       :  
			                       $this->login_successfull = $this->do_login();
                                   if (($this->login_goto) && ($this->login_successfull)) {
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
									
			 default           :    shlogin::event($sAction);						
							 					 
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
							
			case "chpassajax" : die($this->formerror); break;

			default           : shlogin::action($action);	
		}

		return ($out);
	}	
	
	public function setMessage() {
		if (is_array($_POST)) {
			if (isReg()==1)
				$ret = localize('_welcome',getlocal());
			elseif (isLogin()==1)
				$ret = localize('_welcome',getlocal());
			elseif (isResetPass()==1)
				$ret = localize('_welcome',getlocal());			
			
			$ret = $this->formerror;
			return $ret;	
		}
		return false;
	}
	
	public function isReg() {
		if ($_POST['uname'] && $this->isRegistered==true) 
			return 1;
		elseif ($_POST['uname'] && $this->isRegistered==false)
			return -1;
		return 0;
	}	

	//special reg for cp
    protected function register() {
		$db = GetGlobal('db');
		$mode = $_POST['mode'];
		$fname = $_POST['fname'];
		$fn = explode(' ', $fname);
		$uname = $_POST['uname'];
		$pwd = $_POST['pwd'];
		$pwd2 = $_POST['pwd2'];
        $seclevid = $mode ? $mode : '1';

		//extra checks
	    if ((is_numeric($pwd)) && (strlen($pwd)<8)) {
		  $this->formerror = localize('Password does not match the complexity rules',getlocal());
		  SetGlobal('sFormErr',$this->formerror);				
		  return false;			
		}
        else {		
		  if ($pwd!=$pwd2) {
			$this->formerror = localize('Password does not match the confirm password',getlocal());
			SetGlobal('sFormErr',$this->formerror);				
			return false;
		  }		
		
		  if ($this->domain_exists($uname)) {
			$firstname = array_shift($fn);
			$lastname = implode(' ', $fn);
			
            $sSQL = "insert into users (code2,fname,lname,username,password,vpass,email,notes,seclevid)" .  
			        " values (" .
				    $db->qstr(addslashes($uname)) . "," . 
                    $db->qstr(addslashes($firstname)) . "," . //first name
			        $db->qstr(addslashes($lastname)) . "," . //rest as last name
                    $db->qstr(addslashes($uname)) . "," . 
                    $db->qstr(md5(addslashes($pwd))) . "," .
                    $db->qstr(md5(addslashes($pwd2))) . ",";

            if ($this->usemailasusername)
                $sSQL .= $db->qstr(addslashes($uname)) . ",";//email = usercode
		    else
                $sSQL .= $db->qstr(addslashes($uname)) . ",";
			
			$active = $this->inactive_on_register ? 'DELETED' : 'ACTIVE';
			
			$sSQL .= $db->qstr($active) . "," . $seclevid;
	        $sSQL .= ")";
            //echo $sSQL;
            $ret = $db->Execute($sSQL);	 //print_r($ret);

            if ($ret = $db->Affected_Rows()) {
				$this->formerror = localize('ok',getlocal());
				SetGlobal('sFormErr',localize('ok',getlocal()));		

				//respond
				/*if ($this->rtemplate) {
				    $data = $this->select_template($this->rtemplate);
					$tokens[] = $this->respondbody;
					$rbody = $this->combine_tokens($data,$tokens,true);
				}
				else
					$rbody = $this->respondbody;
			    $this->mailto($this->sendaddress,$m,$subject,$rbody,1,1);				
			    
				
				if (defined('SHFORM_DPC'))
					GetGlobal('controller')->calldpc_method('shform.subscribe use '.$username);
				*/
				$this->after_insert_task($uname, $pwd, $firstname, $lastname);
	
				$this->isRegistered = true;
				return true;
			}
			$this->formerror = localize('Error in Db',getlocal());
			SetGlobal('sFormErr',$this->formerror);			
			return false;	
		  }
		}  
		
		$this->isRegistered = false;
		$this->formerror = localize('_mailmxerr',getlocal());
		SetGlobal('sFormErr',$this->formerror);
		
		return false;
	}	

	protected function after_insert_task($username=null,$password=null,$fname=null,$lname=null) {

		//mail registration info to the company
		$this->tell_it = remote_paramload('SHUSERS','tellregisterto',$this->path);
		if ($this->tell_it) {
			$mytemplate = $this->select_template('userinserttell');
			$tokens = array();	
			$tokens[] = $username;	
			$tokens[] = $password;	
			$tokens[] = $fname;	
			$tokens[] = $lname;			  					
			
			$mailbody = $this->combine_tokens($mytemplate,$tokens);

			//$this->mailto(GetParam('eml'),$this->tell_it,localize('_UMAILSUBH',getlocal()),$mailbody);
			$ss = remote_paramload('SHUSERS','tellsubject',$this->path);
			$subject = localize($ss, getlocal());
			$mysubject = $subject ? $subject : localize('_UMAILSUBC',getlocal());
			$this->mailto($this->usemail2send,$this->tell_it,$mysubject,$mailbody);
		}	
	  
		//send username/password to user
		$this->it_sendfrom = remote_paramload('SHUSERS','sendusernamefrom',$this->path);
		if ($this->it_sendfrom) {
			$mytemplate = $this->select_template('userinsert');
			$hash = md5('stereobit9networlds8and7the6heart5breakers');
			$sectoken = urlencode(base64_encode($username.'|'.$hash));
			$account_enable_link = seturl('t=useractivate&sectoken='.$sectoken);

			$tokens = array(); //reset	
			$tokens[] = $username;	
			$tokens[] = $password;
			$tokens[] = $account_enable_link;		  
			
			$mailbody = $this->combine_tokens($mytemplate,$tokens);
			//echo $mailbody;
		
			$ss = remote_paramload('SHUSERS','tellsubject',$this->path);
			$subject = localize($ss, getlocal());

			$this->mailto($this->it_sendfrom,$username,$subject,$mailbody);	  	
	    }
	  
		if (defined('SHFORM_DPC'))
			GetGlobal('controller')->calldpc_method('shform.subscribe use '.$username);
		
		return true;

	}

	
	
	public function isLogin() {
		if ($_POST['Username'] && ($this->dologin==true)) 
			return 1;
		elseif ($_POST['Username'] && ($this->dologin==false))
			return -1;
		return 0;
	}	

	
	//overide
    public function do_login($user='',$pwd='') {
	   $db = GetGlobal('db');
	   $sFormErr = GetGlobal('sFormErr');
	   $UserName = GetGlobal('UserName');

       if (!$user) $sUsername = GetParam("Username");
	          else $sUsername = $user;
       if (!$pwd) $sPassword = GetParam("Password");
	         else $sPassword = $pwd;
			 
	   if ($this->valid_recaptcha()) {		 

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
	   
	   $this->isLogin = false;
	   
	   return false;
	}

	//override
    public function do_logout() {
      $UserName = GetGlobal('UserName');

      $un  = decode($UserName);
      $this->saveSession();
	}

	//override
    public function do_reenter_pasword($myusername=null) {
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
	
	//override
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
	
	protected function domain_exists($email, $record = 'MX'){
		list($user, $domain) = explode('@', $email);
		return checkdnsrr($domain, $record);
	} 	
	
	public function isResetPass() {
		if ($_POST['Username'] && $this->resetPass==true) 
			return 1;
		elseif ($_POST['Username'] && $this->resetPass==false)
			return -1;
		return 0;
	}		

	//override
	public function do_the_job() {
	   $db = GetGlobal('db');
	   $m = GetParam("Username");//////////////////"myemail"); //same as login form  
	   
       if ($this->valid_recaptcha()) {	 

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

       $this->resetPass = true;
	   
	   return false;
	}
	
	public function recaptcha() {
		if ((defined('RECAPTCHA_DPC')) && ($this->recaptcha==true)) {
	        $recaptcha = recaptcha_get_html($this->recaptcha_public_key, null, $this->ssl);	   
			return $recaptcha;
	    }	
		return false;
	}	
   
    //override
	public function valid_recaptcha() {
	 
	      if ((!defined('RECAPTCHA_DPC')) || ($this->recaptcha==false)) return true;
		  
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
		        $msg = "Incorrect recaptcha entry!";				
            }
		  }
		  else {
		    $ret = false;
		    $msg = "Recaptcha entry required!";			  
		  }
		  
		  $this->formerror = $msg;
		  SetGlobal('sFormErr',$msg);
		  
		  return ($ret);												
									 
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
	public function combine_tokens($template_contents, $tokens, $execafter=null) {
	
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