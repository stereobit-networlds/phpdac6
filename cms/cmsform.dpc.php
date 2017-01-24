<?php

$__DPCSEC['CMSFORM_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CMSFORM_DPC")) && (seclevel('CMSFORM_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CMSFORM_DPC",true);

$__DPC['CMSFORM_DPC'] = 'cmsform';

$__EVENTS['CMSFORM_DPC'][0]='cmsform';
$__EVENTS['CMSFORM_DPC'][1]='contact';
$__EVENTS['CMSFORM_DPC'][2]="sendamail";
$__EVENTS['CMSFORM_DPC'][3]="sendamailajax";

$__ACTIONS['CMSFORM_DPC'][0]='cmsform';
$__ACTIONS['CMSFORM_DPC'][1]='contact';
$__ACTIONS['CMSFORM_DPC'][2]="sendamail";
$__ACTIONS['CMSFORM_DPC'][3]="sendamailajax";

$__DPCATTR['CMSFORM_DPC']['cmsform'] = 'cmsform,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['CMSFORM_DPC'][0]='CMSFORM_DPC;Form;Επικοινωνία';
$__LOCALE['CMSFORM_DPC'][1]='_SHSUBSCRIBEMESG;Subscribe;Θέλω να λαμβάνω πληροφορίες μεσω ηλεκτρονικού ταχυδρομείου';
$__LOCALE['CMSFORM_DPC'][2]='_SEC1;Section1;Προσωπικά στοιχεία';
$__LOCALE['CMSFORM_DPC'][3]='_SEC2;Section2;Συνδρομή';
$__LOCALE['CMSFORM_DPC'][4]='_SEC3;Section3;Θέμα';
$__LOCALE['CMSFORM_DPC'][5]='_POST;Submit;Καταχώρηση';
$__LOCALE['CMSFORM_DPC'][6]='_RCAMFALSE;Fields required!;Ακατάληλα δεδομένα!';
$__LOCALE['CMSFORM_DPC'][7]='_COMPANY;Company;Εταιρεία';
$__LOCALE['CMSFORM_DPC'][8]='_CPERSON;Contact person;Ονοματεπωνυμο';
$__LOCALE['CMSFORM_DPC'][9]='_EMAIL;e-mail;e-mail';
$__LOCALE['CMSFORM_DPC'][10]='_SUBJECT;Subject;Θέμα';
$__LOCALE['CMSFORM_DPC'][11]='_BODY;Message;Κείμενο';
$__LOCALE['CMSFORM_DPC'][12]='_MSG11;is required;είναι απαραίτητο';
$__LOCALE['CMSFORM_DPC'][13]='_MSG12;The value in field;Η τιμή στο πεδίο';
$__LOCALE['CMSFORM_DPC'][14]='_INVALIDMAIL;Invalid mail address;Άκυρο e-mail';
$__LOCALE['CMSFORM_DPC'][15]='_NAME;Name;Ονοματεπωνυμο';
$__LOCALE['CMSFORM_DPC'][16]='_RCAMTRUE;Email send!;Αποστολή επιτυχής!';

$__LOCALE['CMSFORM_DPC'][17]='_OXI;No;Οχι';
$__LOCALE['CMSFORM_DPC'][18]='_NAI;Yes;Ναι';
$__LOCALE['CMSFORM_DPC'][19]='_TOWN;Town;Πόλη';
$__LOCALE['CMSFORM_DPC'][20]='_ZIP;Zip;Ταχ. κωδικός';
$__LOCALE['CMSFORM_DPC'][21]='_CNTR;Country;Χώρα';
$__LOCALE['CMSFORM_DPC'][22]='_COMP;Name;Επωνυμία';
$__LOCALE['CMSFORM_DPC'][23]='_CPER;Contact Person;Υπεύθυνος επικοινωνίας';
$__LOCALE['CMSFORM_DPC'][24]='_ACTV;Activities;Δραστηριότητα';
$__LOCALE['CMSFORM_DPC'][25]='_ADDR;Address;Διευθυνση';
$__LOCALE['CMSFORM_DPC'][26]='_WEB;Web;Ιστοσελίδα';
$__LOCALE['CMSFORM_DPC'][27]='_MAIL;e-mail;Ηλεκτρονικό ταχυδρομείο';
$__LOCALE['CMSFORM_DPC'][28]='_SUBSE;Please send me mail informations about new products;Θέλω να λαμβάνω πληροφορίες για νέα προϊόντα μέσω ηλεκτρονικού ταχυδρομείου';
$__LOCALE['CMSFORM_DPC'][29]='_AMTRUE;Succsessfull transmition!;Επιτυχής επικοινωνία!';
$__LOCALE['CMSFORM_DPC'][30]='_AMFALSE;Unknown data!;Ακατάληλα δεδομένα!';
$__LOCALE['CMSFORM_DPC'][31]='_FORMWARN;Fields with (*) required.;Τα πεδία με αστερίσκο (*) ειναι απαραίτητα.';
$__LOCALE['CMSFORM_DPC'][32]='_WARNING;Warning;Προειδοποίηση';
$__LOCALE['CMSFORM_DPC'][33]='_NOMOS;State;Νομός';

class cmsform {

    var $path, $urlpath, $inpath;
	var $recaptcha_public_key, $recaptcha_private_key, $userecaptcha;
	
	var $cntform, $cntformtitles, $checkuserasterisk, $asterisk;
	var $country_id, $post, $msg;
	
	var $tmpl_path, $tmpl_name;	
	
	public function __construct() {
		
	    $this->title = localize('CMSFORM_DPC',getlocal());	
		$this->path = paramload('SHELL','prpath');
	    $this->urlpath = paramload('SHELL','urlpath');
	    $this->inpath = paramload('ID','hostinpath');					
		
		$this->sendaddress = remote_paramload('CMSFORM','mail',$this->path);  	   	   	   
		$this->sendtype = remote_paramload('CMSFORM','type',$this->path); 
		$this->verify = remote_paramload('CMSFORM','verify',$this->path);			
		$this->verify_address = remote_paramload('CMSFORM','verifymailer',$this->path);			
		$this->verify_subject = remote_paramload('CMSFORM','vsubject',$this->path);		
		$this->verify_message = remote_paramload('CMSFORM','vmsg',$this->path);
		$this->info_message = remote_paramload('CMSFORM','vbody',$this->path);		
		
	    $this->cntform = remote_arrayload('CMSFORM','cntform',$this->path);		   
	    $this->cntformtitles = remote_arrayload('CMSFORM','cntformtitles',$this->path);		
	    $this->checkuseasterisk = remote_paramload('CMSFORM','checkasterisk',$this->path);	 
	    $this->asterisk = $this->checkuseasterisk?'&nbsp;':'*'; //echo $this->asterisk,'>';		
		
		$this->recaptcha_public_key = remote_paramload('RECAPTCHA','pubkey',$this->path);							  
		$this->recaptcha_private_key = remote_paramload('RECAPTCHA','privkey',$this->path);		
		$this->userecaptcha = remote_paramload('CMSFORM','recaptcha',$this->path);
		
		$this->country_id = remote_paramload('CMSFORM','countryid',$this->path);
		
		$this->post = false;
		$this->msg = null;		

	    $this->tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->path);
	    $this->tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->path);	   
	   		
	}
	
    //overwriten
    public function event($action=null) {
	   $db = GetGlobal('db');
	   
       $sFormErr = GetGlobal('sFormErr');	  	    		  	    
  
       if (!$sFormErr) {   
  
		switch ($action) {	
	   
			case "sendamailajax":
			case "sendamail"    :
						    if (!$err = $this->checkFields()) {		
							
							    $cperson = GetParam($this->cntform[0]);
								$email = GetParam($this->cntform[1]); 
								$subject = $cperson ? $cperson . ' - ' . GetParam($this->cntform[2]) : GetParam($this->cntform[2]); 
								$message = GetParam($this->cntform[3]); 
								$body = $message; 										
								
								$sSQL = "insert into cform (email,subject,postform) values (" . 
								        $db->qstr(addslashes($email)) . "," . 
										$db->qstr(addslashes($subject)) . "," . 
										$db->qstr(addslashes($message)) . ")";
                                //echo $sSQL;
                                $ret = $db->Execute($sSQL);	 
								
								$mailinsubject = $subject . ' (' . $email . ')';
								$this->mailto($this->sendaddress,$this->sendaddress,$mailinsubject,$message,1);							  
							  
								$this->post = true;
								$this->update_statistics('contact', $email);
									
								//verify
								if ($this->verify) 
									$this->mailto($this->verify_address,$email,$this->verify_subject,$this->verify_message,1);								  									  

								//subscribe		
								if (trim(GetParam('subscribe'))) 
									$this->subscribe($email);	 
							  
								$this->msg = localize('_AMTRUE',getlocal());
								
								//set session param that has contact
								SetSessionParam("FORMSUBMITED",1);
								//save user mail
								SetSessionParam("FORMMAIL",$email); //use for something...	
							}
							else 
								$this->msg = $err;						
							
	                        break; 																											  						
		}
      }  	   
    }
  
    public function action($action=null) {

		switch ($action) {
			case "sendamailajax"   : 	if ($this->post) 
											die(localize('_RCAMTRUE',getlocal())); 
	                                    else 
											die(localize('_RCAMFALSE',getlocal()));
										break;
			case "sendamail"       :              
			case 'contact'         :
			default                : 	$out = $this->mailform();
		}
	 
		return ($out);
    }  		  
  
	protected function mailform() {
		$sFormErr = GetGlobal('sFormErr');
	 
		/*if ($this->post==true) {
	   
			$out = $this->msg;
		}
		else { */
	 
			$myform = _m('cmsrt._ct use cform');
	   
			if (defined('RECAPTCHA_DPC')) {
				$recaptcha = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	
				$myform = str_replace('<@RECAPTCHA@>',$recaptcha,$myform);		   
			}
	 
			//$out .= $sFormErr . $this->msg;
			$out .= $myform; 
		//}
	   
		return ($out);
	}
	 
    public function subscribe($mail=null) {

		if (defined('CMSSUBSCRIBE_DPC')) 
			_m('cmssubscribe.dosubscribe use '.$mail.'++0');
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
	   
	   if ($checkasterisk) {
	     foreach ($recfields as $field_num => $fieldname) {

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

           if(!strlen(GetParam(_with($fieldname)))) {
             $this->msg .= localize('_MSG12',getlocal()) . " <font color=\"red\">" .
		                  localize($titlefields[$field_num],getlocal()) . "</font> " .
		                  localize('_MSG11',getlocal()) . "<br>";
           }
		 }	     
       }
	   
	   //mail chek	 
	   if ((GetParam("email")) && (checkmail(GetParam("email"))==false))
		   $this->msg .= localize('_INVALIDMAIL',getlocal()) . "<br>";	
	   
	   }
	   
       return ($this->msg);
    }	   
			  
	 
	protected function valid_recaptcha() {
	 
	    if ((!defined('RECAPTCHA_DPC')) || (!$this->userecaptcha)) return true;
		  
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
		        $this->msg .= "Incorrect recaptcha entry!";				
            }
		}
		else {
		    $ret = false;
		    $this->msg .= "Recaptcha entry required!";			  
		}

		return ($ret);												
									 
    }  
	 
	protected function mailto($from,$to,$subject=null,$body=null,$ishtml=false,$instant=false) {
	
		if (defined('SMTPMAIL_DPC'))  {
				 
			$smtpm = new smtpmail;
			   
			$smtpm->to($to); 
			$smtpm->from($from); 
			$smtpm->subject($subject);
			$smtpm->body($body);			   

			$mailerror = $smtpm->smtpsend();
			unset($smtpm);
			return ($mailerror);
		}
		else
			die('SMTP ERROR');
	}

	protected function update_statistics($id, $user=null) {
        if (defined('CMSVSTATS_DPC'))	
			return _m('cmsvstats.update_event_statistics use '.$id.'+'.$user);			
		
		return false;
	}	
  
};
}
?>