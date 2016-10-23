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
	var $recaptcha_public_key, $recaptcha_private_key;
	
	var $cntform, $cntformtitles, $checkuserasterisk, $asterisk;
	var $country_id, $post, $msg;
	
	var $tmpl_path, $tmpl_name;	
	
	function __construct() {
		
	    $this->title = localize('CMSFORM_DPC',getlocal());	
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
		
		$this->post = false;
		$this->msg = null;		

	    $this->tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->path);
	    $this->tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->path);	   
	   		
	}
	
    //overwriten
    function event($action=null) {
	   $db = GetGlobal('db');
	   
       $sFormErr = GetGlobal('sFormErr');	  	    		  	    
  
       if (!$sFormErr) {   
  
		switch ($action) {	
	   
			case "sendamailajax":
			case "sendamail"    :
						    if (!$err=$this->checkFields()) {		
							
								$email = GetParam("email");
								$subject = GetParam("subject");
								$message = GetParam("mail_text");
								$body = $this->text2send();										
								
								$sSQL = "insert into cform (email,subject,postform) values (" . 
								        $db->qstr(addslashes($email)) . "," . 
										$db->qstr(addslashes($subject)) . "," . 
										$db->qstr(addslashes($message)) . ")";
                                //echo $sSQL;
                                $ret = $db->Execute($sSQL);	 
							  
								//$this->mailto($this->sendaddress,$this->sendaddress,$subject,$message,1);							  
							  
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
								$this->msg = localize('_RCAMFALSE',getlocal());						
	                        break; 																											  						
		}
      }  	   
    }
  
    function action($action=null) {

		switch ($action) {
			case "sendamailajax"   : 	if ($this->post) 
											die(localize('_RCAMTRUE',getlocal())); 
	                                    else 
											die(localize('_RCAMFALSE',getlocal()));
										break;
			case "sendamail"       :              
			case 'contact'         :
			default                : 	$out = $this->advmailform();
		}
	 
		return ($out);
    } 
	  
	  
	function onok_message() {
	
	    /*$template = "contactformok.htm";
	    $t = $this->urlpath .'/' . $this->inpath . '/cp/html/'. str_replace('.',getlocal().'.',$template) ;
		//echo $t;
	    if (is_readable($t)) {		   
		  $mytemplate = file_get_contents($t);*/
			
		  $tokens[] = GetParam("company");		  
		  $tokens[] = GetParam("cperson");	
		  $tokens[] = GetParam("activities");	
		  $tokens[] = GetParam("address");	
		  $tokens[] = GetParam("town");	
		  $tokens[] = GetParam("zip");	
		  $tokens[] =  get_selected_option_fromfile(GetParam("country"),'country');
		  $tokens[] = GetParam("tel");	
		  $tokens[] = GetParam("fax");	
		  $tokens[] = GetParam("email");	
		  $tokens[] = GetParam("web");			  		  		  		  		  		  		  		  		  	
		  $tokens[] = GetParam("subscribe");			  
		  $tokens[] = GetParam("subject");	
		  $tokens[] = GetParam("mail_text");			  
			
		/*  $ret = $this->combine_tokens($mytemplate,$tokens);		
	    }*/
		
        $sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
		if (!$ret = GetGlobal('controller')->calldpc_method("fronthtmlpage.subpage use contactformok.htm+".$sd."+1")) {
		
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
	
	protected function text2send() {
	
	    /*$template = "contactformmail.htm";
	    $t = $this->urlpath .'/' . $this->inpath . '/cp/html/'. str_replace('.',getlocal().'.',$template) ;
		//echo $t;
	    if (is_readable($t)) {	
		  $mytemplate = file_get_contents($t);*/
			
		  $tokens[] = GetParam("company");		  
		  $tokens[] = GetParam("cperson");	
		  $tokens[] = GetParam("activities");	
		  $tokens[] = GetParam("address");	
		  $tokens[] = GetParam("town");	
		  $tokens[] = GetParam("zip");	
		  $tokens[] =  get_selected_option_fromfile(GetParam("country"),'country');
		  $tokens[] = GetParam("tel");	
		  $tokens[] = GetParam("fax");	
		  $tokens[] = GetParam("email");	
		  $tokens[] = GetParam("web");			  		  		  		  		  		  		  		  		  
		  $tokens[] = GetParam("subscribe");			  
		  $tokens[] = GetParam("subject");	
		  $tokens[] = GetParam("mail_text");			  
			
		 /* $ret = $this->combine_tokens($mytemplate,$tokens);			   
				  
	    }
		else {	*/
		
        $sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
		if (!$ret = _m("fronthtmlpage.subpage use contactformmail.htm+".$sd."+1")) {
				
	
	     $data =  localize('_COMP',getlocal()) . ":" . GetParam("company") ."\r\n".
				  localize('_CPER',getlocal()) . ":" . GetParam("cperson") ."\r\n".
				  localize('_ACTV',getlocal()) . ":" . GetParam("activities") ."\r\n".
				  localize('_ADDR',getlocal()) . ":" . GetParam("address") ."\r\n".
				  localize('_TOWN',getlocal()) . ":" . GetParam("town") ."\r\n".
				  localize('_ZIP',getlocal()) . ":" . GetParam("zip") ."\r\n". 
				  localize('_CNTR',getlocal()) . ":" . get_selected_option_fromfile(GetParam("country"),'country') ."\r\n". 
				  localize('_TEL',getlocal()) . ":" . GetParam("tel") ."\r\n". 
				  localize('_FAX',getlocal()) . ":" . GetParam("fax") ."\r\n". 					   					   					   
				  localize('_MAIL',getlocal()) . ":" . GetParam("email") ."\r\n".
				  localize('_WEB',getlocal()) . ":" . GetParam("web") ."\r\n".							   					   
				  localize('_SUBSCR',getlocal()) . ":" . GetParam("subscribe") ."\r\n".			   					   
				  localize('_SUBJECT',getlocal()) . ":" . GetParam("subject") ."\r\n".	
				  localize('_BODY',getlocal()) . ":" . GetParam("mail_text")."\r\n";	
				  
		  $ret = str_replace("\r\n","<br/>",$data);
	   }		
	   		   
       return ($ret);					   	
	}	 		  
  
	protected function advmailform() {
  
		$formtitles = remote_arrayload('SHFORM','formtitles',$this->path);
	 
		$title1 = $formtitles[0]?localize($formtitles[0],getlocal()):"Στοιχεία ενδιαφερομένου.";
		$title2 = $formtitles[1]?localize($formtitles[1],getlocal()):"Εγγραφή στην λίστα.";
		$title3 = $formtitles[2]?localize($formtitles[2],getlocal()):"Σχόλια.";
		$title4 = $formtitles[3]?localize($formtitles[3],getlocal()):"Στοιχεία ενδιαφερομένου.";	 	 	 

		$sFormErr = GetGlobal('sFormErr');
	 
		$myaction = seturl("t=");//"g=".GetReq('g'));//g=product id in case of try process   	

		if ($this->post==true) {
	   
	     $out .= $this->onok_message();
		}
		else { //show the form plus error if any
	 
			$formtemplate='cform.htm';	   
			$t =  $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'.str_replace('.',getlocal().'.',$formtemplate) ; 

			if (is_readable($t)) {
				$myform = file_get_contents($t);
	   
				if (defined('RECAPTCHA_DPC')) {
					$recaptcha = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	
					$myform = str_replace('<@RECAPTCHA@>',$recaptcha,$myform);		   
				}
	 
				$out .= $sFormErr . $this->msg;
				$out .= $myform; 
			}	 
			else {
				$tokens[] = $sFormErr . $this->msg . "<form method=\"POST\" action=\"" .$myaction. "\" name=\"amail\">";
				$tokens[] = "<input type=\"text\" name=\"company\" maxlength=\"50\" value=\"". ToHTML(GetParam("company")) . "\" size=\"30\" >";		  
				$tokens[] = "<input type=\"text\" name=\"cperson\" maxlength=\"50\" value=\"". ToHTML(GetParam("cperson")) . "\" size=\"30\" >";		  	
				$tokens[] = "<input type=\"text\" name=\"activities\" maxlength=\"50\" value=\"". ToHTML(GetParam("activities")) . "\" size=\"30\" >";		  
				$tokens[] = "<input type=\"text\" name=\"address\" maxlength=\"50\" value=\"". ToHTML(GetParam("address")) . "\" size=\"30\" >";		  	
				$tokens[] = "<input type=\"text\" name=\"town\" maxlength=\"50\" value=\"". ToHTML(GetParam("town")) . "\" size=\"30\" >";		  
				$tokens[] = "<input type=\"text\" name=\"zip\" maxlength=\"50\" value=\"". ToHTML(GetParam("zip")) . "\" size=\"30\" >";		  	
	   
				$cntr = GetParam("country")?GetParam("country"):$this->country_id; 
				$tokens[] =  "<select name=\"country\">".get_options_file('country',false,true,$cntr)."</select>";
	   
				$tokens[] = "<input type=\"text\" name=\"tel\" maxlength=\"50\" value=\"". ToHTML(GetParam("tel")) . "\" size=\"30\" >";		  	
				$tokens[] = "<input type=\"text\" name=\"fax\" maxlength=\"50\" value=\"". ToHTML(GetParam("fax")) . "\" size=\"30\" >";		  	
				$tokens[] = "<input type=\"text\" name=\"email\" maxlength=\"50\" value=\"". ToHTML(GetParam("email")) . "\" size=\"30\" >";		  	
				$tokens[] = "<input type=\"text\" name=\"web\" maxlength=\"50\" value=\"". ToHTML(GetParam("web")) . "\" size=\"30\" >";		  			  		  		  		  		  		  		  		  		  	
	   
				$statin = 'checked';
				$tokens[] = "<input type=\"checkbox\" name=\"subscribe\"". $statin . ">";			  
	   
				$tokens[] = "<input type=\"text\" name=\"subject\" maxlength=\"50\" value=\"". ToHTML(GetParam("subject")) . "\" size=\"30\" >";		  	
				$tokens[] = "<TEXTAREA name='mail_text' cols='50' rows='8' wrap='VIRTUAL'>" . GetParam("mail_text") . "</TEXTAREA>";	  
	   
				if (defined('RECAPTCHA_DPC')) {
					$tokens[] = recaptcha_get_html($this->recaptcha_public_key, $this->recaptcha_private_key);	   
				}
	   
				$tokens[] = "<input type=\"submit\" value=\"" . trim(localize('_POST',getlocal())) . "\">" .
							"<input type=\"hidden\" name=\"FormAction\" value=\"sendamail\">" .
							"</form>";	   
	   
				$sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
				$out = _m("fronthtmlpage.subpage use contactform.htm+".$sd."+1") ; 
	    
			}//cform
		}//no post
	   
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
	   
	   //extra checks	
		
	   //mail chek	 
	   if ((GetParam("email")) && (checkmail(GetParam("email"))==false))
		   $this->msg .= localize('_INVALIDMAIL',getlocal()) . "<br>";	
	   
	   }//recaptcha
	   
       return ($this->msg);
    }	   
			  
	 
	protected function valid_recaptcha() {
	 
	    if (!defined('RECAPTCHA_DPC')) return true;
		  
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
	
	    /*if ((defined('RCSSYSTEM_DPC')) && (!$instant)) { //no queue when no instant
			$ret = _m("rcssystem.sendit use $from+$to+$subject+$body++$ishtml");
        }
		else {*/
		    if (defined('SMTPMAIL_DPC'))  {
				 
				$smtpm = new smtpmail;
			   
				$smtpm->to($to); 
				$smtpm->from($from); 
				$smtpm->subject($subject);
				$smtpm->body($body);			   

				$mailerror = $smtpm->smtpsend();

				unset($smtpm);
			}
			else
				die('SMTP ERROR');
		//}	 
	}

	protected function update_statistics($id, $user=null) {
        if (defined('CMSVSTATS_DPC'))	
			return _m('cmsvstats.update_event_statistics use '.$id.'+'.$user);			
		
		return false;
	}	
  
	/*function combine_tokens($template_contents,$tokens) {
	
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
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<20;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);
		//echo $ret;
		return ($ret);
	}	*/  
  
};
}
?>