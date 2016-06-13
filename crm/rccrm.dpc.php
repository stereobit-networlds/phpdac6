<?php
$__DPCSEC['RCCRM_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCCRM_DPC")) && (seclevel('RCCRM_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCRM_DPC",true);

$__DPC['RCCRM_DPC'] = 'rccrm';
 
$__EVENTS['RCCRM_DPC'][0]='cpcrm';
$__EVENTS['RCCRM_DPC'][1]='cpcrmcus';
$__EVENTS['RCCRM_DPC'][2]='cpcrmusers';
$__EVENTS['RCCRM_DPC'][3]='cpcrmshowcus';
$__EVENTS['RCCRM_DPC'][4]='cpcrmshowusr';
$__EVENTS['RCCRM_DPC'][5]='cpcrmdata';
$__EVENTS['RCCRM_DPC'][6]='cpcrmdetails';
$__EVENTS['RCCRM_DPC'][7]='cpcrmmoduledtl';
$__EVENTS['RCCRM_DPC'][8]='cpcrmrun';
$__EVENTS['RCCRM_DPC'][9]='cpcrmdashboard';

$__ACTIONS['RCCRM_DPC'][0]='cpcrm';
$__ACTIONS['RCCRM_DPC'][1]='cpcrmcus';
$__ACTIONS['RCCRM_DPC'][2]='cpcrmusers';
$__ACTIONS['RCCRM_DPC'][3]='cpcrmshowcus';
$__ACTIONS['RCCRM_DPC'][4]='cpcrmshowusr';
$__ACTIONS['RCCRM_DPC'][5]='cpcrmdata';
$__ACTIONS['RCCRM_DPC'][6]='cpcrmdetails';
$__ACTIONS['RCCRM_DPC'][7]='cpcrmmoduledtl';
$__ACTIONS['RCCRM_DPC'][8]='cpcrmrun';
$__ACTIONS['RCCRM_DPC'][9]='cpcrmdashboard';

//$__DPCATTR['RCCRM_DPC']['cpcrm'] = 'cpcrm,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCCRM_DPC'][0]='RCCRM_DPC;Crm;Crm';
$__LOCALE['RCCRM_DPC'][1]='_id;ID;ID';
$__LOCALE['RCCRM_DPC'][2]='_save;Save;Αποθήκευση';
$__LOCALE['RCCRM_DPC'][3]='_date;Date;Ημερ.';
$__LOCALE['RCCRM_DPC'][4]='_time;Time;Ώρα';
$__LOCALE['RCCRM_DPC'][5]='_customers;Customers;Πελάτες';
$__LOCALE['RCCRM_DPC'][6]='_users;Users;Χρήστες';
$__LOCALE['RCCRM_DPC'][7]='_campaigns;Campaigns;Καμπάνιες';
$__LOCALE['RCCRM_DPC'][8]='_ulist;Leads;Λίστες';
$__LOCALE['RCCRM_DPC'][9]='_failed;Fails;Αποτυχίες';
$__LOCALE['RCCRM_DPC'][10]='_listname;List name;Όνομα λίστας';
$__LOCALE['RCCRM_DPC'][11]='_mode;Search in;Αναζήτηση σε';
$__LOCALE['RCCRM_DPC'][12]='_reply;Replies;Απαντήσεις';
$__LOCALE['RCCRM_DPC'][13]='_subject;Subject;Θέμα';
$__LOCALE['RCCRM_DPC'][14]='_dateins;Start at;Εκκίνηση';
$__LOCALE['RCCRM_DPC'][15]='_dateupd;Updated;Ενημερώση';

$__LOCALE['RCCRM_DPC'][20]='_address;Address;Διεύθυνση';
$__LOCALE['RCCRM_DPC'][21]='_tel;Tel.;Τηλέφωνο';
$__LOCALE['RCCRM_DPC'][22]='_mob;Mobile;Κινητό';
$__LOCALE['RCCRM_DPC'][23]='_email;e-mail;e-mail';
$__LOCALE['RCCRM_DPC'][24]='_fax;Fax;Fax';
$__LOCALE['RCCRM_DPC'][25]='_TIMEZONE;Timezone;Ζωνη ωρας';
$__LOCALE['RCCRM_DPC'][26]='_fname;Contact person;Υπεύθυνος επικοινωνίας';
$__LOCALE['RCCRM_DPC'][27]='_lname;Title;Επωνυμια';
$__LOCALE['RCCRM_DPC'][28]='_username;Username;Χρήστης';
$__LOCALE['RCCRM_DPC'][29]='_password;Password;Κωδικός';
$__LOCALE['RCCRM_DPC'][30]='_notes;Notes;Σημειωσεις';
$__LOCALE['RCCRM_DPC'][31]='_subscribe;Subscriber;Συνδρομητης';
$__LOCALE['RCCRM_DPC'][32]='_seclevid;seclevid;seclevid';
$__LOCALE['RCCRM_DPC'][33]='_secparam;Param;Param';
$__LOCALE['RCCRM_DPC'][34]='_active;Active;Ενεργός';
$__LOCALE['RCCRM_DPC'][35]='_secparam;Param;Param';
$__LOCALE['RCCRM_DPC'][36]='_code;Code;Κωδικός';
$__LOCALE['RCCRM_DPC'][37]='_country;Country;Χώρα';
$__LOCALE['RCCRM_DPC'][38]='_timezone;Tmzone;Tmzone';
$__LOCALE['RCCRM_DPC'][39]='_language;Country;ΓλώσσαΧώρα';
$__LOCALE['RCCRM_DPC'][40]='_age;Age;Ηλικία';
$__LOCALE['RCCRM_DPC'][41]='_level;Level;Πρόσβαση';

$__LOCALE['RCCRM_DPC'][55]='_mail;e-mail;e-mail';
$__LOCALE['RCCRM_DPC'][56]='_name;Name;Όνομα';
$__LOCALE['RCCRM_DPC'][57]='_afm;Vat ID;ΑΦΜ';
$__LOCALE['RCCRM_DPC'][58]='_area;Area;Περιοχή';
$__LOCALE['RCCRM_DPC'][59]='_prfdescr;Occupation;Επάγγελμα';
$__LOCALE['RCCRM_DPC'][60]='_doy;DOY.;ΔΟΥ.';
$__LOCALE['RCCRM_DPC'][61]='_street;Street;Οδός';
$__LOCALE['RCCRM_DPC'][62]='_number;No;Αριθμος';
$__LOCALE['RCCRM_DPC'][63]='_city;City;Πόλη';
$__LOCALE['RCCRM_DPC'][64]='_attr1;P1;P1';
$__LOCALE['RCCRM_DPC'][65]='_attr2;P2;P2';
$__LOCALE['RCCRM_DPC'][66]='_attr3;P3;P3';
$__LOCALE['RCCRM_DPC'][67]='_attr4;P4;P4';
$__LOCALE['RCCRM_DPC'][68]='_custaddress;Addresses;Διευθύνσεις';
$__LOCALE['RCCRM_DPC'][69]='_active;Active;Ενεργός';
$__LOCALE['RCCRM_DPC'][70]='_code2;Code;Κωδικός';

class rccrm  {

    var $title, $path, $urlpath;
	var $seclevid, $userDemoIds;
	
	var $crmplus;
		
	function __construct() {
	
		$this->path = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');
		$this->title = localize('RCCRM_DPC',getlocal());	 
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); 		  
		
		$this->crmplus = false; /*must be loaded in php script to enable plus tree*/
	}
	
    function event($event=null) {
	
	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;		 
	
	   switch ($event) {
		   
		 case 'cpcrmrun'     : /*if ($crm_module = GetReq('mod')) {//module calls inside mod.showdetails
								$m = explode('.', $crm_module);
								GetGlobal('controller')->calldpc_method($m[0].".event use ".$m[1]);		
		                       }*/
		                       break;   
		   
		 case 'cpcrmmoduledtl' ://call module detail function
								echo $this->moduleGridDetails();
                                die();
		                        break;
		 case 'cpcrmdata'    : echo $this->loadsubframe();
		                       die();
		                       break;

		 case 'cpcrmdashboard' ://echo $this->loadsubframe(null, 'dashboard', true);
		                        //die(); 
		                        break;								   
							   						   
		 case 'cpcrmdetails' : break; 
		 
		 case 'cpcrmshowcus' : break; 										  
		 case 'cpcrmshowusr' : break; 		 
		 case 'cpcrmcus'     : echo $this->loadframe(null,'customers');
		                       die();	
		                       break;  	
		 case 'cpcrmusers'   : echo $this->loadframe(null,'users');
		                       die();
							   break; 	   
	     case 'cpcrm'        :
		 default             :    
		                      
	   }
			
    }   
	
    function action($action=null) {
		
	  $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	  if ($login!='yes') return null;	
	 
	  switch ($action) {	  
	  
		 case 'cpcrmrun'       : if ($crm_module = GetReq('mod')) //module calls inside mod.showdetails 
									$out = 	GetGlobal('controller')->calldpc_method($crm_module);		
							     break;  	  
			
		 case 'cpcrmmoduledtl' : break;	
		 case 'cpcrmdata'      : break; 
		 case 'cpcrmdashboard' : break;			 
		 case 'cpcrmdetails'   : $out = $this->moduleGrid(); break;	
		 case 'cpcrmshowcus'   : $out = $this->show(); break; 
		 case 'cpcrmshowusr'   : $out = $this->show(); break; 	 
		 case 'cpcrmcus'       :						
		 case 'cpcrmusers'     : break;					  
	     case 'cpcrm'          :
		 default               : $out = $this->crmMode();
	  }	 

	  return ($out);
    }
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}	

	protected function crmMode() {
		$mode = GetReq('mode') ? GetReq('mode') : 'users';
		
		$turl1 = seturl('t=cpcrm&mode=users');
		$turl2 = seturl('t=cpcrm&mode=customers');		
		$turl3 = seturl('t=cpcrm&mode=ulist');
		$turl4 = seturl('t=cpcrm&mode=campaigns');
		$button = $this->createButton(localize('_mode', getlocal()), 
										array(localize('_users', getlocal())=>$turl1,
									  		  localize('_customers', getlocal())=>$turl2,
											  localize('_ulist', getlocal())=>$turl3,
											  localize('_campaigns', getlocal())=>$turl4,
		                                ));
													

		switch ($mode) {
			case 'customers':	$content = $this->customers_grid(null,140,5,'r', true); break;
			case 'ulist'    :   $content = $this->ulist_grid(null,140,5,'e', true); break;
			case 'campaigns':   $content = $this->campaigns_grid(null,140,5,'r', true); break;			
			case 'users'    :   
			default         :   $content = $this->users_grid(null,140,5,'r', true); break;
		}			
					
		$ret = $this->window('e-CRM: '.localize('_'.$mode, getlocal()), $button, $content);
		
		return ($ret);
	}

	protected function show() {
		$id = GetReq('id');
		//$ret = 'ID:' . $id; //some 1st line message
		
		//$ret = $this->loadsubframe(null,'transactions'); //default action
		$ret = $this->loadsubframe(null,'dashboard', true); //default action
		
		return ($ret);
	}	

	protected function loadframe($ajaxdiv=null, $mode=null) {
		$id = GetParam('id');
		$cmd = ($mode=='customers') ? 'cpcrmshowcus&id='.$id : 'cpcrmshowusr&id='.$id;
		$bodyurl = seturl("t=$cmd&iframe=1");
			
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"460px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}	

	protected function loadsubframe($ajaxdiv=null, $mode=null, $isdashboard=false) {
		$module = $mode ? $mode : GetParam('module'); //module details
		$id = GetParam('id'); //crm email
		
		if (($isdashboard) || ($module=='dashboard'))
			$bodyurl = seturl("t=cpcrmdashboard&iframe=1&id=$id&module=$module");
		else
			$bodyurl = seturl("t=cpcrmdetails&iframe=1&id=$id&module=$module");
	
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"460px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}
	
	protected function moduleGrid($mode=null) {
		$module = $mode ? $mode : GetReq('module'); //details id
		
		/*
		$method = $module . '_grid';
		if (method_exists($this, $method)) 
			$ret = $this->$method(null,280,11,'r', true);
		else {*/
			//crm module
			$class = 'crm' . $module;
			$method = $module . '_grid'; 
			$ret = GetGlobal('controller')->calldpc_method("$class.$method use +360+15+r+1");
		//}	
		
		return ($ret);
	}		

	protected function moduleGridDetails() {
		$data = GetReq('data') ;
		$module = GetReq('module'); 
		//return ('>'.$module . ":" . $data. ':test');
		
		$class = 'crm' . $module;
		$method = 'showdetails'; 
		$ret = GetGlobal('controller')->calldpc_method("$class.$method use $data");		
		
		return ($ret);
	}
	
	
	protected function users_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_users', getlocal());//localize('RCCRM_DPC',getlocal()); 
		
        $xsSQL = "SELECT * from (select id,timein,code2,ageid,cntryid,lanid,timezone,email,notes,fname,lname,username,seclevid from users) o ";		   
		   
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('id',getlocal())."|5|0|||1");	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+timein|".localize('_date',getlocal())."|5|0|");	   
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+notes|".localize('_active',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+username|".localize('_username',getlocal())."|link|10|"."javascript:udetails(\"{username}\");".'||');						
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+fname|".localize('_fname',getlocal())."|19|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+lname|".localize('_lname',getlocal())."|19|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+ageid|".localize('_age',getlocal())."|2|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+cntryid|".localize('_country',getlocal())."|2|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+lanid|".localize('_language',getlocal())."|2|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+timezone|".localize('_timezone',getlocal())."|2|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+email|".localize('_email',getlocal())."|10|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+code2|".localize('_code',getlocal())."|10|0|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+seclevid|".localize('_level',getlocal())."|5|1|");
		   
		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+users+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}
	
	protected function customers_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_'.GetReq('mode'), getlocal());//localize('RCCRM_DPC',getlocal()); 	
		
		$xsSQL = "SELECT * FROM (SELECT id,timein,active,code2,name,afm,eforia,prfdescr,street,address,number,area,city,zip,voice1,voice2,fax,mail,attr1,attr2,attr3,attr4 FROM customers) x";
		//$out.= $xsSQL;
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+id|".localize('id',getlocal())."|5|0|||1");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+timein|".localize('_date',getlocal()). "|5|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+active|".localize('_active',getlocal())."|boolean|1|");	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+code2|".localize('_code2',getlocal())."|link|10|"."javascript:cdetails(\"{code2}\");".'||');
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+mail|".localize('_mail',getlocal())."|link|10|"."javascript:cdetails(\"{mail}\");".'||');		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+name|".localize('_name',getlocal())."|19|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+prfdescr|".localize('_prfdescr',getlocal())."|20|1|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+afm|".localize('_afm',getlocal())."|10|1|");
	    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+eforia|".localize('_doy',getlocal())."|10|1|");				
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+street|".localize('_street',getlocal())."|19|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+address|".localize('_address',getlocal())."|10|1");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+number|".localize('_number',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+area|".localize('_area',getlocal())."|10|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+city|".localize('_city',getlocal())."|10|1|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+zip|".localize('_zip',getlocal())."|10|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+voice1|".localize('_tel',getlocal())."|10|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+voice2|".localize('_tel',getlocal())."|10|1|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+fax|".localize('_fax',getlocal())."|10|1|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+attr1|".localize('_attr1',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+attr2|".localize('_attr2',getlocal())."|5|1|");							
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+attr3|".localize('_attr3',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+attr4|".localize('_attr4',getlocal())."|5|1|");
		
		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid2+customers+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}

	protected function ulist_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_'.GetReq('mode'), getlocal());//localize('RCCRM_DPC',getlocal()); 
		
		$xsSQL = "select * from (";
		$xsSQL.= "SELECT id,startdate,datein,active,failed,name,email,listname FROM ulists";
		$xsSQL .= ') as o';
		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('_id',getlocal())."|5|0");
        GetGlobal('controller')->calldpc_method("mygrid.column use grid1+email|".localize('_mail',getlocal())."|link|10|"."javascript:udetails(\"{email}\");".'||');
        GetGlobal('controller')->calldpc_method("mygrid.column use grid1+startdate|".localize('_dateins',getlocal()).'|10|0');		   
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+datein|".localize('_dateupd',getlocal())."|10|0|");			
        GetGlobal('controller')->calldpc_method("mygrid.column use grid1+name|".localize('_lname',getlocal()).'|19|1');	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+active|".localize('_active',getlocal()).'|boolean|0');	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+failed|".localize('_failed',getlocal()).'|5|0');	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+listname|".localize('_listname',getlocal()).'|10|0');			
		   
		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+ulists+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}	
	
	protected function campaigns_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_'.GetReq('mode'), getlocal());//localize('RCCRM_DPC',getlocal()); 
				   
		$xsSQL = "SELECT * from (select id,timein,receiver,subject,reply,status,mailstatus,cid from mailqueue) o ";		   
		   
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('id',getlocal())."|2|0|||1");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+timein|".localize('_date',getlocal())."|5|0|");	   
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+receiver|".localize('_mail',getlocal())."|link|10|"."javascript:udetails(\"{receiver}\");".'||');						
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+subject|".localize('_subject',getlocal())."|19|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+reply|".localize('_reply',getlocal())."|2|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+status|".localize('_status',getlocal())."|2|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+mailstatus|".localize('_failed',getlocal())."|2|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+cid|".localize('_cid',getlocal())."|10|1|");
		   
		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+mailqueue+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}	
	
	protected function createButton($name=null, $urls=null, $t=null, $s=null) {
		$type = $t ? $t : 'primary'; //danger /warning / info /success
		switch ($s) {
			case 'large' : $size = 'btn-large '; break;
			case 'small' : $size = 'btn-small '; break;
			case 'mini'  : $size = 'btn-mini '; break;
			default      : $size = null;
		}
		
		//$ret = "<button class=\"btn  btn-primary\" type=\"button\">Primary</button>";
		
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

	protected function window($title, $buttons, $content) {
		$ret = '	
		    <div class="row-fluid">
                <div class="span12">
                  <div class="widget red">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i> '.$title.'</h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                           </span>
                        </div>
                        <div class="widget-body">
							<div class="btn-toolbar">
							'. $buttons .'
							<hr/><div id="crmdetails"></div>
							</div>
							'.  $content .'
                        </div>
                  </div>
                </div>
            </div>
';
		return ($ret);
	}	
	
	public function actionTree() {
		$user = GetReq('id');
		if (!$user) return false;		
		
		$id = GetReq('id') ? "&id=" . $user : null ;
		$this->crmplus = (defined('CRMPLUS_DPC')) ? true : false; 
		
		$crmplustree = $this->crmplus ? '
										<li>
											<a data-value="gh_Repos" data-toggle="branch" class="tree-toggle closed" role="branch" href="#">Plus</a>
                                            <ul class="branch">
											<li><a href="#">Actions</a></li>
                                            <li><a href="javascript:subdetails(\'plus'.$id.'\')">Projects</a></li>
                                            <li>
                                                <a data-value="GitHub_Repos" data-toggle="branch" class="tree-toggle closed" role="branch" href="#">Automations</a>
                                                <ul class="branch">
                                                    <li><a href="#">Events</a></li>
                                                    <li><a href="#">Users</a></li>
                                                    <li><a href="#">Feedbacks</a></li>
                                                    <li><a href="#">Reports</a></li>
                                                    <li><a href="#">Sales</a></li>
                                                    <li><a href="#">Revenue</a></li>
                                                </ul>
                                            </li></ul>
                                        </li>' : null;		
		
		$ret = '	
                            <!--div class="actions">
                                <a class="btn btn-small btn-success" id="tree_2_collapse" href="javascript:;"> Collapse All</a>
                                <a class="btn btn-small btn-warning" id="tree_2_expand" href="javascript:;"> Expand All</a>
                            </div>
                            <div class="space10"></div-->
                            <ul id="tree_2" class="tree">
                                <li>
                                    <a data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle" data-role="branch" href="#">'.substr($user, 0, 9).'</a>
                                    <ul class="branch in">
										<li><a data-role="leaf" href="javascript:subdetails(\'dashboard'.$id.'\')"><i class="icon-user"></i> Dashboard</a></li>
                                        <li><a data-role="leaf" href="javascript:subdetails(\'inbox'.$id.'\')"><i class=" icon-book"></i> Inbox</a></li>
                                        <li><a data-role="leaf" href="javascript:subdetails(\'customer'.$id.'\')"><i class="icon-share"></i> Details</a></li>										
                                        <li><a data-role="leaf" href="javascript:subdetails(\'transactions'.$id.'\')"><i class=" icon-bullhorn"></i> Sales</a></li>
                                        <li><a data-role="leaf" href="javascript:subdetails(\'tasks'.$id.'\')"><i class="icon-tasks"></i> Tasks</a></li>
										<li><a data-role="leaf" href="javascript:subdetails(\'stats'.$id.'\')"><i class="icon-share"></i> Stats</a></li>
											
										'.$crmplustree.'		
										<li>
                                            <a id="nut3" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle closed" href="#">
                                                Templates
                                            </a>
                                            <ul class="branch">
                                                <li><a data-role="leaf" href="javascript:subdetails(\'forms'.$id.'\')"><i class="icon-cloud"></i> Forms</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-user-md"></i> Attach</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-retweet"></i> View</a></li>
                                            </ul>
                                        </li>
										
                                        <li>
                                            <a id="nut6" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle closed" href="#">
                                                Items
                                            </a>
                                            <ul class="branch">
                                                <li><a data-role="leaf" href="#"><i class="icon-tags"></i> Sales</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-magic"></i> Returns</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-user"></i> Offers</a></li>
												<li><a data-role="leaf" href="#"><i class="icon-magic"></i> Behaviors</a></li>
                                            </ul>
                                        </li>
										
                                        <li>
                                            <a id="nut8" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle closed" href="#">
                                                Reports
                                            </a>
                                            <ul class="branch">
                                                <li><a data-role="leaf" href="#"><i class="icon-tags"></i> Finance</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-magic"></i> ICT</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-user"></i> Human Resources</a></li>
                                            </ul>
                                        </li>										
                                    </ul>
                                </li>
                            </ul>		
';
		return ($ret);
	}
		

	public function actionTree2() {
		$ret = '
                            <div class="actions">
                                <a class="btn btn-small btn-success" id="tree_1_collapse" href="javascript:;"> Collapse All</a>
                                <a class="btn btn-small btn-warning" id="tree_1_expand" href="javascript:;"> Expand All</a>
                            </div>
                            <div class="space10"></div>
                            <ul id="tree_1" class="tree">
                                <li>
                                    <a data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle" data-role="branch" href="#">
                                        Bootstrap Tree
                                    </a>
                                    <ul class="branch in">
                                        <li>
                                            <a id="nut1" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle" href="#">
                                                Documents
                                            </a>
                                            <ul class="branch in">
                                                <li>
                                                    <a id="nut2" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle closed" href="#">
                                                        Finance
                                                    </a>
                                                    <ul class="branch">
                                                        <li><a data-role="leaf" href="#"><i class="icon-book"></i> Sale Revenue</a></li>
                                                        <li><a data-role="leaf" href="#"><i class="icon-fire"></i> Promotions</a></li>
                                                        <li><a data-role="leaf" href="#"><i class="icon-edit"></i> IPO</a></li>
                                                    </ul>
                                                </li>
                                                <li><a data-role="leaf" href="#"><i class="icon-magic"></i> ICT</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-user"></i> Human Resources</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a id="nut3" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle closed" href="#">
                                                Examples
                                            </a>
                                            <ul class="branch">
                                                <li><a data-role="leaf" href="#"><i class="icon-cloud"></i> Internal</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-user-md"></i> Client Base</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-retweet"></i> Product Base</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a id="nut4" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle" href="#">
                                                Tasks
                                            </a>
                                            <ul class="branch in">
                                                <li><a data-role="leaf" href="#"><i class="icon-suitcase"></i> Internal Projects</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-cloud-download"></i> Outsourcing</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-sitemap"></i> Bug Tracking</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a id="nut6" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle closed" href="#">
                                                Customers
                                            </a>
                                            <ul class="branch">
                                                <li><a data-role="leaf" href="#"><i class="icon-tags"></i> Finance</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-magic"></i> ICT</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-user"></i> Human Resources</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a id="nut8" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle closed" href="#">
                                                Reports
                                            </a>
                                            <ul class="branch">
                                                <li><a data-role="leaf" href="#"><i class="icon-tags"></i> Finance</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-magic"></i> ICT</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-user"></i> Human Resources</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a data-role="leaf" href="#">
                                                <i class="icon-share"></i> External Link
                                            </a>
                                        </li>
                                        <li>
                                            <a data-role="leaf" href="#">
                                                <i class="icon-share"></i> Another External Link
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
';
		return ($ret);
	}
	
	protected function writeLog($data = '') {
		if (empty($data)) return;

		$data = date('d-m-Y H:i:s')."\r\n" . $data . "\r\n----\r\n";
		$ret = file_put_contents($this->path . 'crm.log', $data, FILE_APPEND | LOCK_EX);
		
		return $ret;
	}	
};
}
?>