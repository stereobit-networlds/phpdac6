<?php

$__DPCSEC['RCAMAIL_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCAMAIL_DPC")) && (seclevel('RCAMAIL_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCAMAIL_DPC",true);

$__DPC['RCAMAIL_DPC'] = 'rcamail';

//require_once("amail.dpc.php");
$d = GetGlobal('controller')->require_dpc('mail/amail.dpc.php');
require_once($d); 

GetGlobal('controller')->get_parent('AMAIL_DPC','RCAMAIL_DPC');
 

$__ACTIONS['RCAMAIL_DPC'][0]='contact';

$__DPCATTR['RCAMAIL_DPC']['contact'] = 'contact,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCAMAIL_DPC'][0]='RCAMAIL_DPC;Contact;Επικοινωνία';
$__LOCALE['RCAMAIL_DPC'][1]='_RCSUBSE;Add yourself to our mailing list;Θέλω να λαμβάνω πληροφορίες για νέα προϊόντα μέσω ηλεκτρονικού ταχυδρομείου';
$__LOCALE['RCAMAIL_DPC'][2]='_PLAN;Programming languange;Γλώσσα προγραμματισμού';
$__LOCALE['RCAMAIL_DPC'][3]='_RCAMFALSE;Fields with (*) required!;Ακατάληλα δεδομένα!';
$__LOCALE['RCAMAIL_DPC'][4]='_OSYS;Operating system;Λειτουργικό συστημα';
$__LOCALE['RCAMAIL_DPC'][5]='_USERI;User Interface;Διεπαφή με τον χρήστη';
$__LOCALE['RCAMAIL_DPC'][6]='_DBENV;Database Environment;Βαση δεδομένων';
$__LOCALE['RCAMAIL_DPC'][7]='_RCAMTRANSFALSE;Transmition error!;Λαθος επικοινωνίας';

class rcamail extends advcontactmail{

    var $message, $from;
	
	function rcamail() {
		
		advcontactmail::advcontactmail();
		
	    $this->title = localize('RCAMAIL_DPC',getlocal());		
		
		$m = paramload('RCAMAIL','message');	
		$ff = paramload('SHELL','prpath').$m;
		if (is_file($ff)) {
		  $this->message = file_get_contents($ff);
		}
		else
		  $this->message = $m; //plain text
		  
		//echo paramload('SHELL','prpath').">>>";  
                              $this->from = paramload('RCAMAIL','from');
	}
	
	//overwrite
	function text2send() {
	
	   $head_text =    localize('_COMP',getlocal()) . ":" . GetParam("company") ."\r\n".
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
					   //"--------------------------------------------------------------------\r\n".					   
					   //localize('_PLAN',getlocal()) . ":" . get_selected_option_fromfile(GetParam("proglan"),'proglan') ."\r\n".
					   //localize('_OSYS',getlocal()) . ":" . get_selected_option_fromfile(GetParam("opersys"),'opersys') ."\r\n".
					   //localize('_USERI',getlocal()) . ":" . get_selected_option_fromfile(GetParam("userint"),'userint') ."\r\n".
					   //localize('_DBENV',getlocal()) . ":" . get_selected_option_fromfile(GetParam("dbenv"),'dbenv') ."\r\n".
                       //"--------------------------------------------------------------------\r\n".						   
					   localize('_SUBSCR',getlocal()) . ":" . GetParam("subscribe") ."\r\n".			   					   
					   localize('_SUBJECT',getlocal()) . ":" . GetParam("subject") ."\r\n";		
					   
       return $head_text;					   	
	}	 	
	
    //overwriten
    function event($action=null) {
	
       $sFormErr = GetGlobal('sFormErr');	  	    		  
	   
	   switch ($this->sendtype) {
	   
	     case 'html' : $submiteddata = str_replace("\r\n","<br/>",$this->text2send()) . "<br/>" .
		                               GetParam("mail_text");
		               break;
	   
	     case 'text' : 
	     default     :
	                   $submiteddata = "-----------------------------------------------<br/>".
	                                   str_replace("\r\n","<br/>",$this->text2send()) .					   
	                                   "------------------------------------------------<br/>".
					                   GetParam("mail_text") . "<br/>";
	   }				    
  
       if (!$sFormErr) {   
  
	   switch ($action) {	

		case "sendamail"  : if ((GetParam("company")) &&
		                        (checkmail(GetParam("email"))) /*&&
								(GetParam("subject"))*/) { 
							
							  //save to a text flat file	
							  $this->write2file(GetParam("company").";".
							                    GetParam("cperson").";".
												GetParam("activities").";".
												GetParam("address").";".
												GetParam("town").";".
												GetParam("zip").";".
												get_selected_option_fromfile(GetParam("country"),'country').";".
												GetParam("tel").";".
												GetParam("fax").";".
												GetParam("email").";".
												GetParam("web").";".
												//get_selected_option_fromfile(GetParam("proglan"),'proglan').";".
												//get_selected_option_fromfile(GetParam("opersys"),'opersys').";".
												//get_selected_option_fromfile(GetParam("userint"),'userint').";".
												//get_selected_option_fromfile(GetParam("dbenv"),'dbenv').";".
												GetParam("subscribe").";".
												GetParam("subject").";\r\n"
							                   );	
		
		                      //$this->post = $this->sendit(GetParam("email"),$this->sendaddress,GetParam("subject"),$submiteddata);
                              $smtpm = new smtpmail;
		                      $smtpm->to = $this->sendaddress; 
		                      $smtpm->from = GetParam("email"); 
		                      $smtpm->subject = GetParam("subject");
		                      $smtpm->body = $submiteddata;
		                      $error = $smtpm->smtpsend();
		                      unset($smtpm);							  
							  
							  //if ($this->post==true) {
							  if (!$error) {
							    $this->post = true;
	                            //verify
	                            if ($this->verify) { 
								  //$this->send_smtpmail($this->verify_address,GetParam("email"),$this->verify_subject,$this->verify_message);	 	
                                  $smtpm = new smtpmail;
		                          $smtpm->to = GetParam("email"); 
		                          $smtpm->from = $this->verify_address; 
		                          $smtpm->subject = $this->verify_subject;
		                          $smtpm->body = $this->verify_message;
		                          $err = $smtpm->smtpsend();
		                          unset($smtpm);									  
								}
							    //subscribe		
						        if (trim(GetParam('subscribe'))) 
								  $this->subscribe(GetParam("email"));	 
							  
							    $this->msg = localize('_AMTRUE',getlocal());
								
								//set session param that has contact
								SetSessionParam("FORMSUBMITED",1);
								//save user mail
								SetSessionParam("FORMMAIL",GetParam("email"));
							  }  
							  else {
  							    $this->msg = localize('_RCAMTRANSFALSE',getlocal())."<br>".$error;
								SetInfo($error);
							  }	
							}
							else
							  $this->msg = localize('_RCAMFALSE',getlocal());  
	                        break; 																											  						
       }
      }   
    }
  
    function action($action=null) {

	 $out = $this->advmailform();
	 
	 return ($out);
    } 
	  
  
  //ovewrwrite
  function advmailform() {

     $sFormErr = GetGlobal('sFormErr');
	 
     $myaction = seturl("");//"t=amail");   	
	 	 
     //error message
	 //if ($sFormErr==localize('_MLS2',getlocal())) { //send mail succesfully
	 //if ($this->msg==localize('_AMTRUE',getlocal())) {	
	 if ($this->post==true) {
	   
       $out = setNavigator($this->title);	   
	   
	   //$msg = localize('_AMTRUE',getlocal());
	   
	   /*$swin = new window(localize('AMAIL_DPC',getlocal()),$msg);
	   $out .= $swin->render("center::70%::0::group_win_body::center::0::0::");	
	   unset ($swin);*/
	   
	   $out .= $this->message;
	 }
	 else { //show the form plus error if any

       $out = setNavigator($this->title);
	 	 
       $out .= setError($sFormErr . $this->msg);
	   
	   
	   $form = new form(localize('_ADDEVENT',getlocal()), "amail", FORM_METHOD_POST, $myaction, true);
	
	   $form->addGroup			("personal",			"About you.");
	   //$form->addGroup			("technical",			"Tell us about your technology.");	   
	   $form->addGroup			("subscribe",			"Subscribe.");
	   $form->addGroup			("thema",				"Add comments.");	   
	   $form->addGroup			("warning",				"&nbsp;");	   
	   if ($this->info_message) 
	     $form->addGroup			("info",			"6.");		   

	   $form->addElement		("personal",			new form_element_text		(localize('_COMP',getlocal())."*",     "company",		GetParam("company"),				"forminput",	        40,				255,	0));
	   $form->addElement		("personal",			new form_element_text		(localize('_CPER',getlocal()),     "cperson",		GetParam("cperson"),				"forminput",	        20,				255,	0));
	   $form->addElement		("personal",			new form_element_text		(localize('_ACTV',getlocal()),     "activities",	GetParam("activities"),				"forminput",	        30,				255,	0));	   	   	   
	   $form->addElement		("personal",			new form_element_text		(localize('_ADDR',getlocal()),     "address",	    GetParam("address"),				"forminput",	        30,				255,	0));	
	   $form->addElement		("personal",			new form_element_text		(localize('_TOWN',getlocal()),     "town",	        GetParam("town"),				"forminput",	        20,				255,	0));
//	   $form->addElement		("personal",			new form_element_greekmap	(localize('_NOMOS',getlocal()),     "amail","nomos",GetParam("nomos"),"forminput",20,20,1));	   	
	   $form->addElement		("personal",			new form_element_text		(localize('_ZIP',getlocal()),      "zip",	        GetParam("zip"),				"forminput",	        20,				255,	0));
	   //$form->addElement		("personal",			new form_element_text		(localize('_CNTR',getlocal()),     "country",	    GetParam("country"),				"forminput",	        20,				255,	0));	
	   $form->addElement		("personal",			new form_element_combo_file (localize('_CNTR',getlocal()),     "country",	    $this->get_country_from_ip(),				"forminput",	        1,				0,	'country'));	
	   $form->addElement		("personal",			new form_element_text		(localize('_TEL',getlocal()),      "tel",	        GetParam("tel"),				"forminput",	        20,				255,	0));	
	   $form->addElement		("personal",			new form_element_text		(localize('_FAX',getlocal()),      "fax",	        GetParam("fax"),				"forminput",	        20,				255,	0));		   	   	   		   	   	   
	   $form->addElement		("personal",			new form_element_text		(localize('_MAIL',getlocal())."*",     "email",			GetParam("email"),				"forminput",	        30,				255,	0));
	   $form->addElement		("personal",			new form_element_text		(localize('_WEB',getlocal()),      "web",			"http://",		"forminput",		    20,				255,	0));
	   
	   //$form->addElement		("technical",			new form_element_combo_file (localize('_PLAN',getlocal()),     "proglan",	    GetParam("proglan"),				"forminput",	        5,				0,	'proglan'));	   
	   //$form->addElement		("technical",			new form_element_combo_file (localize('_OSYS',getlocal()),     "opersys",	    GetParam("opersys"),				"forminput",	        5,				0,	'opersys'));	   
	   //$form->addElement		("technical",			new form_element_combo_file (localize('_USERI',getlocal()),     "userint",	    GetParam("userint"),				"forminput",	        5,				0,	'userint'));	   
	   //$form->addElement		("technical",			new form_element_combo_file (localize('_DBENV',getlocal()),     "dbenv",	    GetParam("dbenv"),				"forminput",	        5,				0,	'dbenv'));	   
	   
	   //$form->addElement		("subscribe",			new form_element_text		(localize('_SYBSCR',getlocal()),   "subscribe",		"",				"forminput",	        20,				255,	0));
	   $form->addElement		("subscribe",			new form_element_radio		(localize('_RCSUBSE',getlocal()),   "subscribe",      1,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));	   
	   $form->addElement		("thema",			    new form_element_text		(localize('_SUBJECT',getlocal())."*",  "subject",		GetParam("subject"),				"forminput",			50,				255,	0));	
	   $form->addElement		("thema",			    new form_element_textarea   (localize('_MESSAGE',getlocal()),  "mail_text",		GetParam("mail_text"),				"formtextarea",			40,				9));		      
	   
	   $form->addElement		("warning",			    new form_element_onlytext	(localize('_WARNING',getlocal()),  localize('_FORMWARN',getlocal()),""));	   
	   
	   if ($this->info_message)	   
	     $form->addElement		("info",			    new form_element_onlytext	("",  $this->info_message,""));	   	   

	   // Adding a hidden field
	   $form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("FormAction", "sendamail"));
 
	   // Showing the form
	   $fout = $form->getform ();		
	   
	   //$fwin = new window(localize('AMAIL_DPC',getlocal()),$fout);
	   //$out .= $fwin->render();	
	   //unset ($fwin);	
	   
	   $out .= $fout;

	   //$form->checkform();	   
	 }
 
     return ($out);
  }  
  
  function get_country_from_ip() {
  
     $mycountry = GetGlobal('controller')->calldpc_method("country.find_country");
	 //return "Greece";
	 return ($mycountry);
  }
  
  function write2file($data) {
      
     $actfile = paramload('SHELL','prpath') . "rcmail" . ".csv";							
	 //echo $actfile;
	 
     if ($fp = @fopen ($actfile , "a+")) {
                 fwrite ($fp, $data);
                 fclose ($fp);
     }
     else {
         $this->msg = "File creation error !\n";
		 echo "File creation error!";
         //setInfo("File creation error !");
     }	
  }
  
};
}
?>