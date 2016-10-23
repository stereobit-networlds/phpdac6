<?php

$__DPCSEC['SHFORM_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if (!defined("SHFORM_DPC")) {
define("SHFORM_DPC",true);

$__DPC['SHFORM_DPC'] = 'shform';

$__EVENTS['SHFORM_DPC'][0]='call';
$__EVENTS['SHFORM_DPC'][1]="sendamail";
$__EVENTS['SHFORM_DPC'][2]="sendamailajax";
$__EVENTS['SHFORM_DPC'][3]="contact";

$__ACTIONS['SHFORM_DPC'][0]='call';
$__ACTIONS['SHFORM_DPC'][1]="sendamail";
$__ACTIONS['SHFORM_DPC'][2]="sendamailajax";
$__ACTIONS['SHFORM_DPC'][3]="contact";

$__DPCATTR['SHFORM_DPC']['call'] = 'call,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['SHFORM_DPC'][0]='SHFORM_DPC;Form;Επικοινωνία';
$__LOCALE['SHFORM_DPC'][1]='_SHSUBSCRIBEMESG;Subscribe;Θέλω να λαμβάνω πληροφορίες μεσω ηλεκτρονικού ταχυδρομείου';
$__LOCALE['SHFORM_DPC'][2]='_SEC1;Section1;Προσωπικά στοιχεία';
$__LOCALE['SHFORM_DPC'][3]='_SEC2;Section2;Συνδρομή';
$__LOCALE['SHFORM_DPC'][4]='_SEC3;Section3;Θέμα';
$__LOCALE['SHFORM_DPC'][5]='_POST;Submit;Καταχώρηση';
$__LOCALE['SHFORM_DPC'][6]='_RCAMFALSE;Fields required!;Ακατάληλα δεδομένα!';
$__LOCALE['SHFORM_DPC'][7]='_COMPANY;Company;Εταιρεία';
$__LOCALE['SHFORM_DPC'][8]='_CPERSON;Contact person;Ονοματεπωνυμο';
$__LOCALE['SHFORM_DPC'][9]='_EMAIL;e-mail;e-mail';
$__LOCALE['SHFORM_DPC'][10]='_SUBJECT;Subject;Θέμα';
$__LOCALE['SHFORM_DPC'][11]='_BODY;Message;Κείμενο';
$__LOCALE['SHFORM_DPC'][12]='_MSG11;is required;είναι απαραίτητο';
$__LOCALE['SHFORM_DPC'][13]='_MSG12;The value in field;Η τιμή στο πεδίο';
$__LOCALE['SHFORM_DPC'][14]='_INVALIDMAIL;Invalid mail address;Άκυρο e-mail';
$__LOCALE['SHFORM_DPC'][15]='_NAME;Name;Ονοματεπωνυμο';
$__LOCALE['SHFORM_DPC'][16]='_RCAMTRUE;Email send!;Αποστολή επιτυχής!';

class shform {

    var $path, $urlpath, $inpath;
	var $recaptcha_public_key, $recaptcha_private_key;
	
	var $cntform, $cntformtitles, $checkuserasterisk, $asterisk;
	var $country_id, $post;
	
	var $tmpl_path, $tmpl_name;	
	var $respondsubject, $respondbody, $rtemplate;
	
	var $formerror, $cc;
	
	var $recaptcha;
	
	function __construct() {
		
	    $this->title = localize('SHFORM_DPC',getlocal());	
		$this->path = paramload('SHELL','prpath');
	    $this->urlpath = paramload('SHELL','urlpath');
	    $this->inpath = paramload('ID','hostinpath');					
		
		$this->sendaddress = remote_paramload('SHFORM','mail',$this->path);  	   	   	   
		$this->sendtype = remote_paramload('SHFORM','type',$this->path); 
		$this->verify = remote_paramload('SHFORM','verify',$this->path);			
		$this->verify_address = remote_paramload('SHFORM','verifymailer',$this->path);			
		$this->verify_subject = remote_paramload('SHFORM','vsubject',$this->path);		
		$this->verify_message = remote_paramload('SHFORM','vmsg',$this->path);
		$this->info_message = remote_paramload('SHFORM','vbody',$this->path);		
		
	    $this->cntform = remote_arrayload('SHFORM','cntform',$this->path);		   
	    $this->cntformtitles = remote_arrayload('SHFORM','cntformtitles',$this->path);		
	    $this->checkuseasterisk = remote_paramload('SHFORM','checkasterisk',$this->path);	 
	    $this->asterisk = $this->checkuseasterisk?'&nbsp;':'*'; //echo $this->asterisk,'>';		
		
		$this->recaptcha_public_key = remote_paramload('RECAPTCHA','pubkey',$this->path);							  
		$this->recaptcha_private_key = remote_paramload('RECAPTCHA','privkey',$this->path);		
		
		$this->country_id = remote_paramload('SHFORM','countryid',$this->path);
		$this->cc = remote_paramload('SHFORM','cc',$this->path);
		$this->respondsubject = remote_paramload('SHFORM','rsubject',$this->path);							  
		$this->respondbody = remote_paramload('SHFORM','rbody',$this->path);
		$this->rtemplate = remote_paramload('SHFORM','rtemplate',$this->path);
		
		$this->post=false;
		$this->formerror = null;
		
		$rp = remote_paramload('SHFORM','recaptcha',$this->path);
		$this->recaptcha = $rp ? true : false;

	    $this->tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->path);
	    $this->tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->path);	   
	   		
	}
	
    function event($action=null) {
	   $db = GetGlobal('db');
  
	   switch ($action) {	
	   
        case "sendamailajax"  :
		case "sendamail"      : 
	
						    //if (!$err=$this->checkFields()) {	
                            if ($this->valid_recaptcha()) {							
							  if (($m = GetParam("email")) && ($this->domain_exists($m))) {
							  
								$subject = GetParam("info");
								$body = addslashes(GetParam("cperson")) . ' ('. $m . ') - ' . $subject; 
								
								//inform me
								$this->mailto($this->sendaddress,$this->sendaddress,$subject,$body,1,1);							  
								if ($this->cc)
									$this->mailto($this->sendaddress,$this->cc,$subject,$body,1,1);							  
							  
							    //if (GetParam('checksub')) //!!!!!!
									$this->subscribe($m);
								
							    //respond
								if ($this->rtemplate) {
								    $data = $this->select_template($this->rtemplate);
									$tokens[] = $this->respondbody;
		
									$rbody = $this->combine_tokens($data,$tokens,true);
								}
								else
									$rbody = $this->respondbody;
								//inform client
							    $this->mailto($this->sendaddress,$m,$subject,$rbody,1,1);							  	 
								
								//set session param that has contact
								SetSessionParam("FORMSUBMITED",1);
								//save user mail
								SetSessionParam("FORMMAIL", $m);
								
								//inform db
	                            $sSQL = "insert into cform (email,subject,postform) values (" . 
										$db->qstr(addslashes($m)) . "," .
										$db->qstr(addslashes($subject)) . "," .
										$db->qstr($body) . ")";
                                //echo $sSQL;
                                $ret = $db->Execute($sSQL);
								
								//success msg
								$this->formerror = localize('Thank you, we will respond as soon as possible',getlocal());
								SetGlobal('sFormErr',$this->formerror); 
							  	$this->post = true;								
							  }
							  else {
								$this->formerror = localize('Please fill in all the required fields',getlocal());
								SetGlobal('sFormErr',$this->formerror);  
								$this->post = false;
							  }	
							} //recaptcha
							else {
								//$this->formerror = localize('Recaptcha entry required',getlocal());
								//SetGlobal('sFormErr',$this->formerror);
								//messages inside recaptcha check
								$this->post = false;
							}
	                        break; 																											  						
       }	   
    }
  
    function action($action=null) {

		switch ($action) {
			case "sendamailajax"   : if ($this->post) die(localize('_RCAMTRUE',getlocal())); 
	                                        else die(localize('_RCAMFALSE',getlocal()));
									  break;
			case "sendamail"       :              
			case 'contact'         :
			case 'call'            :
			default                :
		}
	 
		return ($out);
    } 
	
	protected function onok_message() {
		$tokens[] = GetParam("cperson");		
		$tokens[] = GetParam("email");	
		$tokens[] = GetParam("dLabel");			  
			
        $sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
		if (!$ret = _m("fronthtmlpage.subpage use contactformok.htm+".$sd."+1")) {
		
		//else {
		  $m = paramload('SHFORM','message');
			
		  $ff = $this->path . $m;
		  if (is_file($ff)) {
		    $ret = file_get_contents($ff);
		  }
		  else
		    $ret = $m; //plain text	
		} 
		//echo '>',$ret;
		return ($ret); 
	}
	
	public function isPost() {
		if ($_POST['email'] && $this->post==true) 
			return 1;
		elseif ($_POST['email'] && $this->post==false) 
			return -1;
		return 0;
	}
	 
    public function subscribe($mail=null) {
       if (defined('CMSSUBSCRIBE_DPC')) {
	  
	     _m('cmssubscribe.dosubscribe use '.$mail.'++0');
		 return true;
	   }
	   return false; 	   
    } 	
	 
	protected function domain_exists($email, $record = 'MX'){
		list($user, $domain) = explode('@', $email);
		return checkdnsrr($domain, $record);
	} 
	 
    protected function checkFields($bypass=null,$checkasterisk=null) {
	   $sFormErr = GetGlobal('sFormErr');
	   SetGlobal('sFormErr',"");	   

       if ($this->valid_recaptcha()) {	   
	   
	   if ($bypass) 
	     return null;		  
	   
	   $recfields = (array) $this->cntform;//custom fields
	   $titlefields = (array) $this->cntformtitles;
	   
       if (!$recfields) {

	      $recfields = array('company','cperson','email','subject','mail_text');
		  $titlefields = array('_COMPANY','_CPERSON','_EMAIL','_SUBJECT','_BODY'); 
       }	   
	   
	   //print_r($recfields);
	   
	   if ($checkasterisk) {
	     foreach ($recfields as $field_num => $fieldname) {
    		//$title = localize($titlefields[$field_num],getlocal());
			$titles = explode('/',remote_paramload('SHFORM',$fieldname,$this->path));
			$title = $titles[getlocal()];
	     	if (strstr($title,'*')) { //check by titile using *

              if(!strlen(GetParam(_with($fieldname)))) {
                $this->msg .= localize('_MSG12',getlocal()) . " <font color=\"red\">" .
		                     $title . "</font> " .
		                     localize('_MSG11',getlocal()) . "<br>";		  			
			  }
			}
		 }		   
	   }	
	   else { 
         foreach ($recfields as $field_num => $fieldname) {
           //echo $fieldname,'<br>';
           if(!strlen(GetParam(_with($fieldname)))) {
             $this->msg .= localize('_MSG12',getlocal()) . " <font color=\"red\">" .
		                  localize($titlefields[$field_num],getlocal()) . "</font> " .
		                  localize('_MSG11',getlocal()) . "<br>";
             //echo $fieldname;
           }
		 }	     
       }
	   
	   //extra checks	
		
	   //mail chek	 
	   if ((GetParam("email")) && (checkmail(GetParam("email"))==false))
		   $this->msg .= localize('_INVALIDMAIL',getlocal()) . "<br>";	
	   
	   }//recaptcha
	   
       return ($this->msg);
    }	   
	
	public function recaptcha() {
		if ((defined('RECAPTCHA_DPC')) && ($this->recaptcha==true)) {
	        $recaptcha = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	   
			return $recaptcha;
	    }	
		return false;
	}
			  
	 
	 protected function valid_recaptcha() {
	 
	    if ((!defined('RECAPTCHA_DPC')) || ($this->recaptcha==false)) return true;
		  
        if ($_POST["recaptcha_response_field"]) {
            $resp = recaptcha_check_answer ($this->recaptcha_private_key,
                                            $_SERVER["REMOTE_ADDR"],
                                            $_POST["recaptcha_challenge_field"],
                                            $_POST["recaptcha_response_field"]);
											
			if ($resp->is_valid) {
                $error = null;
				$ret = true;
            } 
			else {
				$ret = false;
		        $this->formerror = $resp->error;				
            }
		}
		else {
		    $ret = false;
		    $this->formerror = "Recaptcha entry required!";			  
		}
		  
		SetGlobal('sFormErr',$this->formerror);
		return ($ret);																		 
    }  
	 
	protected function mailto($from,$to,$subject=null,$body=null,$ishtml=false,$instant=false) {
				 
	    $smtpm = new smtpmail;
			   
	    $smtpm->to($to); 
	    $smtpm->from($from); 
	    $smtpm->subject($subject);
	    $smtpm->body($body);			   

	    $mailerror = $smtpm->smtpsend();

	    unset($smtpm);
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