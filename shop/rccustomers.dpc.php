<?php

$__DPCSEC['RCCUSTOMERS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCCUSTOMERS_DPC")) && (seclevel('RCCUSTOMERS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCUSTOMERS_DPC",true);

$__DPC['RCCUSTOMERS_DPC'] = 'rccustomers';

$b = GetGlobal('controller')->require_dpc('cgi-bin/shop/shcustomers.dpc.php', paramload('SHELL','urlpath'));
require_once($b);

$__EVENTS['RCCUSTOMERS_DPC'][0]='cpcustomers';
$__EVENTS['RCCUSTOMERS_DPC'][1]='delcustomer';
$__EVENTS['RCCUSTOMERS_DPC'][2]='regcustomer';
$__EVENTS['RCCUSTOMERS_DPC'][3]='cpcusmail';
$__EVENTS['RCCUSTOMERS_DPC'][4]='cpcusmsend';
$__EVENTS['RCCUSTOMERS_DPC'][5]='cpctype';
$__EVENTS['RCCUSTOMERS_DPC'][6]='insert2';
$__EVENTS['RCCUSTOMERS_DPC'][7]='signup3';
$__EVENTS['RCCUSTOMERS_DPC'][8]='updcustomer';
$__EVENTS['RCCUSTOMERS_DPC'][9]='saveupdcus';
$__EVENTS['RCCUSTOMERS_DPC'][10]='caddress';

$__ACTIONS['RCCUSTOMERS_DPC'][0]='cpcustomers';
$__ACTIONS['RCCUSTOMERS_DPC'][1]='delcustomer';
$__ACTIONS['RCCUSTOMERS_DPC'][2]='regcustomer';
$__ACTIONS['RCCUSTOMERS_DPC'][3]='cpcusmail';
$__ACTIONS['RCCUSTOMERS_DPC'][4]='cpcusmsend';
$__ACTIONS['RCCUSTOMERS_DPC'][5]='cpctype';
$__ACTIONS['RCCUSTOMERS_DPC'][6]='insert2';
$__ACTIONS['RCCUSTOMERS_DPC'][7]='signup3';
$__ACTIONS['RCCUSTOMERS_DPC'][8]='updcustomer';
$__ACTIONS['RCCUSTOMERS_DPC'][9]='saveupdcus';
$__ACTIONS['RCCUSTOMERS_DPC'][10]='caddress';

$__DPCATTR['RCCUSTOMERS_DPC']['cpcustomers'] = 'cpcustomers,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCCUSTOMERS_DPC'][0]='RCCUSTOMERS_DPC;Customers;Πελάτες';
$__LOCALE['RCCUSTOMERS_DPC'][1]='_reason;Reason;Αιτία';
$__LOCALE['RCCUSTOMERS_DPC'][2]='_cdate;Date in;Ημ/νία εισοδου';
$__LOCALE['RCCUSTOMERS_DPC'][3]='_price;Price;Τιμή';
$__LOCALE['RCCUSTOMERS_DPC'][4]='_ftype;Pay;Πληρωμή';
$__LOCALE['RCCUSTOMERS_DPC'][5]='_name1;First Name;Ονομα';
$__LOCALE['RCCUSTOMERS_DPC'][6]='_name2;Last Name;Επώνυμο';
$__LOCALE['RCCUSTOMERS_DPC'][7]='_kybismos;Kyb.;Κυβικα';
$__LOCALE['RCCUSTOMERS_DPC'][8]='_color;Color;Χρώμα';
$__LOCALE['RCCUSTOMERS_DPC'][9]='_extras;Extras;Εχτρα';
$__LOCALE['RCCUSTOMERS_DPC'][10]='_address;Address;Διεύθυνση';
$__LOCALE['RCCUSTOMERS_DPC'][11]='_tel;Tel.;Τηλέφωνο';
$__LOCALE['RCCUSTOMERS_DPC'][12]='_mob;Mobile;Κινητό';
$__LOCALE['RCCUSTOMERS_DPC'][13]='_mail;e-mail;e-mail';
$__LOCALE['RCCUSTOMERS_DPC'][14]='_fax;Fax;Fax';
$__LOCALE['RCCUSTOMERS_DPC'][15]='_ptype;Price type;Τύπος Τιμών';
$__LOCALE['RCCUSTOMERS_DPC'][16]='_name;Name;Όνομα';
$__LOCALE['RCCUSTOMERS_DPC'][17]='_afm;Vat ID;ΑΦΜ';
$__LOCALE['RCCUSTOMERS_DPC'][18]='_area;Area;Περιοχή';
$__LOCALE['RCCUSTOMERS_DPC'][19]='_prfdescr;Occupation;Επάγγελμα';
$__LOCALE['RCCUSTOMERS_DPC'][20]='_doy;DOY.;ΔΟΥ.';
$__LOCALE['RCCUSTOMERS_DPC'][21]='_street;Street;Οδός';
$__LOCALE['RCCUSTOMERS_DPC'][22]='_number;No;Αριθμος';
$__LOCALE['RCCUSTOMERS_DPC'][23]='_city;City;Πόλη';
$__LOCALE['RCCUSTOMERS_DPC'][24]='_attr1;P1;P1';
$__LOCALE['RCCUSTOMERS_DPC'][25]='_attr2;P2;P2';
$__LOCALE['RCCUSTOMERS_DPC'][26]='_attr3;P3;P3';
$__LOCALE['RCCUSTOMERS_DPC'][27]='_attr4;P4;P4';
$__LOCALE['RCCUSTOMERS_DPC'][28]='_custaddress;Addresses;Διευθύνσεις';
$__LOCALE['RCCUSTOMERS_DPC'][29]='_active;Active;Ενεργός';
$__LOCALE['RCCUSTOMERS_DPC'][30]='_code2;Code;Κωδικός';

class rccustomers extends shcustomers {

    var $title;
	var $carr;
	var $msg;
	var $path, $urlpath, $inpath;
	var $post;

	var $_grids;
	var $actcode;
	var $updrec;
	var $usemailasusername;

	function rccustomers() {
	  $GRX = GetGlobal('GRX');
	  $this->title = localize('RCCUSTOMERS_DPC',getlocal());
	  $this->carr = null;
	  $this->msg = null;
	  
	  shcustomers::__construct();

	  $this->path = paramload('SHELL','prpath'); 


         $this->delete = localize('_delete',getlocal());
         $this->edit = localize('_edit',getlocal());
         $this->add = localize('_add',getlocal());
         $this->mail = localize('_mail',getlocal());
         $this->type = localize('_ptype',getlocal());

		 $this->sep = "|";


		$acode = remote_paramload('RCCUSTOMERS','activecode',$this->path);

		$this->actcode = 'id';
	}

    function event($event=null) {

	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;

	   switch ($event) {
		   
	     case 'caddress'   : 
							  break;		   

         case "signup3"    :  if (!$this->checkFields())
		                        $this->insert();
 			                  break;

		 case 'cpctype'    :  $this->make_cus_type();
			                  break;
	     case 'cpcusmsend'  : $this->send_mail();
		                      break;
	     case 'cpcusmail'   :
		                      break;

	     case 'regcustomer' :
		                      break;
         case 'updcustomer' : $this->updrec = $this->getcustomer(GetReq('rec'),$this->actcode);
		                      break;
	     case 'saveupdcus'  : $this->update(GetReq('rec'),$this->actcode);
		                      break;
	     case 'delcustomer' : $this->delete_customer(GetReq('rec'),$this->actcode);
							  break;
	     case 'cpcustomers' :
		 default            : 
		                      
	   }

    }

    function action($action=null) {
		
	  $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	  if ($login!='yes') return null;	

	  switch ($action) {
		  
	     case 'caddress'    : $out .= $this->show_custaddress();
							  break;		  
	     case 'cpcusmsend'  : $out .= $this->show_customers();
		                      break;
	     case 'cpcusmail'   : $out .= $this->show_mail();
		                      break;
	     case 'delcustomer' : $out .= $this->show_customers();
		                      break;
		 case 'regcustomer' : 
							  $out .= $this->makeform(null,1,'signup3');
							  break;
		 case 'updcustomer' : 
							  $out .= $this->update_customer_form();
							  break;
		 case 'saveupdcus'  :
		 case 'signup3'     :
		 case 'cpctype'     :
	     case 'cpcustomers' :
		 default            :
		                      $out .= $this->show_customers();
	 }

	 return ($out);
    }
	
	
	protected function update_customer_form() {
	
	   //update form
       $goto = 't=cpcustomers&rec='.GetReq('rec').'&editmode=1&encoding='.GetReq('encoding');
	   $out = $this->makeform($this->updrec,1,'saveupdcus',1,$goto,1);	   

	   if (defined('RCTRANSACTIONS_DPC')) {
		//user transactions
		$out .= GetGlobal('controller')->calldpc_method("rctransactions.show_grid use +150+1");	   
		//$out .= GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use trans");	   
	   }
       return ($out); 
    }		

	function delete_customer($id,$key=null) {
        $db = GetGlobal('db');

		$sSQL = "delete from customers where ";
		if ($key)
		  $sSQL .= $key . "=" . $id;//'' must added to param
		else
		  $sSQL .= "email = " . $db->qstr($id);

        $db->Execute($sSQL,1);
	    //echo $sSQL;

		$this->msg = "Customer with $key=$id deleted!";
	}


	function show_customers() {
     	$sFormErr = GetGlobal('sFormErr');

	    if ($this->msg) 
			$out = $this->msg;

        $out .= $sFormErr;

	    if (defined('MYGRID_DPC')) {
		
			$xsSQL2 = "SELECT * FROM (SELECT id,timein,active,code2,name,afm,eforia,prfdescr,street,address,number,area,city,zip,voice1,voice2,fax,mail,attr1,attr2,attr3,attr4 FROM customers) x";
			//$out.= $xsSQL2;
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+id|".localize('id',getlocal())."|5|0|||1");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+timein|".localize('_date',getlocal()). "|link|0|".seturl('t=cptransactions&cusmail={code2}').'||');
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+active|".localize('_active',getlocal())."|boolean|1|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+code2|".localize('_code2',getlocal())."|10|0|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+name|".localize('_name',getlocal())."|30|1|");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+prfdescr|".localize('_prfdescr',getlocal())."|20|1|");			
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+afm|".localize('_afm',getlocal())."|10|1|");
	        GetGlobal('controller')->calldpc_method("mygrid.column use grid2+eforia|".localize('_doy',getlocal())."|20|1|");				
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+street|".localize('_street',getlocal())."|20|1|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+address|".localize('_address',getlocal())."|link|20|".seturl('t=caddress&id={code2}').'||');
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+number|".localize('_number',getlocal())."|5|1|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+area|".localize('_area',getlocal())."|10|1|");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+city|".localize('_city',getlocal())."|10|1|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+zip|".localize('_zip',getlocal())."|10|1|||1|1");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+voice1|".localize('_tel',getlocal())."|10|1|");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+voice2|".localize('_tel',getlocal())."|10|1|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+fax|".localize('_fax',getlocal())."|10|1|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+mail|".localize('_mail',getlocal())."|20|1|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+attr1|".localize('_attr1',getlocal())."|5|1|");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+attr2|".localize('_attr2',getlocal())."|5|1|");							
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+attr3|".localize('_attr3',getlocal())."|5|1|");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+attr4|".localize('_attr4',getlocal())."|5|1|");			
			$out .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid2+customers+$xsSQL2+d+".localize('RCCUSTOMERS_DPC',getlocal())."+id+0+1+25+600");

	    }
		else 
		   $out .= 'Initialize jqgrid.';
		   
        return ($out); 
	}
	
	function show_custaddress($id=null) {
        $id = GetReq('id');
		$wSQL = $id ?  "where ccode='$id'" : null;

	    if (defined('MYGRID_DPC')) {
		
			$xsSQL2 = "SELECT * FROM (SELECT id,ccode,active,address,area,zip,voice1,voice2,fax,mail FROM custaddress $wSQL) x";
			//$out.= $xsSQL2;
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+id|".localize('id',getlocal())."|5|0|||1");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+active|".localize('_active',getlocal())."|boolean|1|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+ccode|".localize('_code2',getlocal())."|20|0|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+address|".localize('_address',getlocal())."|20|1|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+area|".localize('_area',getlocal())."|10|1|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+zip|".localize('_zip',getlocal())."|10|1|||1|1");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+voice1|".localize('_tel',getlocal())."|10|1|");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+voice2|".localize('_tel',getlocal())."|10|1|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+fax|".localize('_fax',getlocal())."|10|1|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+mail|".localize('_mail',getlocal())."|20|1|");			
			$out .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid2+custaddress+$xsSQL2+d+".localize('_custaddress',getlocal())."+id+0+1+25+600");

	    }
		else 
		   $out .= 'Initialize jqgrid.';
		   
        return ($out); 
	}	

	function form($action=null) {

     $myaction = seturl("t=regcustomer");

     if ($this->post==true) {

	   SetSessionParam('REGISTERED_CUSTOMER',1);
	 }
	 else { 
       $out .= setError($sFormErr . $this->msg);

	   $form = new form(localize('_ADDEVENT',getlocal()), "regcustomer", FORM_METHOD_POST, $myaction, true);

	   $form->addGroup			("personal",			"Tell us about your self.");
	   //$form->addGroup			("technical",			"Tell us about your technology.");
	   $form->addGroup			("subscribe",			"Subscribe.");

	   $form->addElement		("personal",			new form_element_text		(localize('_COMP',getlocal())."*",     "company",		GetParam("company"),				"forminput",	        50,				255,	0));
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
	   //$form->addElement		("thema",			    new form_element_text		(localize('_SUBJECT',getlocal())."*",  "subject",		GetParam("subject"),				"forminput",			60,				255,	0));
	   //$form->addElement		("thema",			    new form_element_textarea   (localize('_MESSAGE',getlocal()),  "mail_text",		GetParam("mail_text"),				"formtextarea",			60,				9));

	   //$form->addElement		("warning",			    new form_element_onlytext	(localize('_WARNING',getlocal()),  localize('_FORMWARN',getlocal()),""));

	   //if ($this->info_message)
	     //$form->addElement		("info",			    new form_element_onlytext	("",  $this->info_message,""));

	   // Adding a hidden field
	   if ($action)
	     $form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("FormAction", $action));
	   else
	     $form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("FormAction", "regcustomer"));

	   // Showing the form
	   $fout = $form->getform ();

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

	function show_mail() {
       $sFormErr = GetGlobal('sFormErr');
	   $sendto = GetReq('m');

	   if (defined('ABCMAIL_DPC')) {
	     $ret = $sFormErr;
	     $ret .= GetGlobal('controller')->calldpc_method('abcmail.create_mail use cpcusmsend+'.$sendto);
	   }

	   return ($ret);
	}

	function send_mail() {

	   if (!defined('ABCMAIL_DPC')) return;

	   $from = GetParam('from');
	   $to = GetParam('to');
	   $subject = GetParam('subject');
	   $body = GetParam('mail_text');

	   if ($res = GetGlobal('controller')->calldpc_method('abcmail.sendit use '.$from.'+'.$to.'+'.$subject.'+'.$body))
	     $this->mailmsg = "Send successfull";
	   else
	     $this->mailmsg = "Send failed";
	}

	function make_cus_type() {
        $db = GetGlobal('db');
		$mycode = $this->actcode;

	    $sSQL = "select attr1 from customers where $mycode=".GetReq('rec');
		$ret = $db->Execute($sSQL,2);

		switch ($ret->fields[0]) {
		  case $this->reseller_attr  : $sw = ''; break;
		  default                    : $sw = $this->reseller_attr ;
		}
		//echo $sSQL,$sw,'>',$ret->fields[0];

	    $sSQL = "update customers set attr1="."'$sw' where $mycode=".GetReq('rec');
		$db->Execute($sSQL,1);
		//reset session of user
		$sSQL = "update users set sesdata='' where $mycode=".GetReq('rec');
		$db->Execute($sSQL,1);
        //echo $sSQL;
		$this->msg = "Job completed!(Customer type: $sw)";
	}
	
	//override
	function update($id=null,$fkey=null) {
	   $db = GetGlobal('db');
	   //$myfkey = $fkey?$fkey:$this->fkey;
	   //$key = decode(GetGlobal('UserName'));//security..foreign to user
	   
	   if ($error = $this->checkFields(null,$this->checkuseasterisk)) {
	       SetGlobal('sFormErr',$error);
	       return ($error);//false;//($error);
	   }		   

       if ($this->usemailasusername) {
	     if (GetParam('uname')) //= mail
		   $recfields = array('name','afm','eforia','prfdescr','address','area','zip','voice1','voice2','fax');
		 else
	       $recfields = array('name','afm','eforia','prfdescr','address','area','zip','voice1','voice2','fax','mail');
	   }
	   else
	     $recfields = array('code2','name','afm','eforia','prfdescr','address','area','zip','voice1','voice2','fax','mail');

	   if (!$id) {
	     //return (false);
		 SetGlobal('sFormErr',localize('_MSG20',getlocal()));
	   }	 

       $sSQL = "update customers set ";
	   $sSQL.= /*'code2='.$db->qstr(GetParam('code2')) . ',' .*/
	           'name='.$db->qstr(addslashes(GetParam('name'))) . ',' .
	           'afm='.$db->qstr(addslashes(GetParam('afm'))) . ',' .
	           'eforia='.$db->qstr(addslashes(GetParam('eforia'))) . ',' .
	           'prfdescr='.$db->qstr(addslashes(GetParam('prfdescr'))) . ',' .
	           'address='.$db->qstr(addslashes(GetParam('address'))) . ',' .
	           'area='.$db->qstr(addslashes(GetParam('area'))) . ',' .
	           'zip='.$db->qstr(addslashes(GetParam('zip'))) . ',' .
	           'voice1='.$db->qstr(addslashes(GetParam('voice1'))) . ',' .
	           'voice2='.$db->qstr(addslashes(GetParam('voice2'))) . ',' .
	           'fax='.$db->qstr(addslashes(GetParam('fax'))) . ',' .
	           'mail='.$db->qstr(addslashes(GetParam('mail')))  .
	           " where id=".$id;// . " and " . "code2=" . $db->qstr($key);

       //echo $sSQL;
	   //SetGlobal('sFormErr',$sSQL);
       $result = $db->Execute($sSQL,1);
	   //print_r($result->fields);
       if ($db->Affected_Rows()) {	   
         SetGlobal('sFormErr',"ok");
		 return true;
	   }
	   else {
		 echo $db->ErrorMsg();
		 SetGlobal('sFormErr',localize('_MSG20',getlocal()));
	   }	 

	   return false;//($result);
	}
	

};
}
?>