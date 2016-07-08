<?php
$__DPCSEC['RCCRMTRACE_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCCRMTRACE_DPC")) && (seclevel('RCCRMTRACE_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCRMTRACE_DPC",true);

$__DPC['RCCRMTRACE_DPC'] = 'rccrmtrace';
 
$__EVENTS['RCCRMTRACE_DPC'][0]='cpcrmtrace';
$__EVENTS['RCCRMTRACE_DPC'][1]='cpcrmprofile';
$__EVENTS['RCCRMTRACE_DPC'][2]='cpcrmbacktrace';

$__ACTIONS['RCCRMTRACE_DPC'][0]='cpcrmtrace';
$__ACTIONS['RCCRMTRACE_DPC'][1]='cpcrmprofile';
$__ACTIONS['RCCRMTRACE_DPC'][2]='cpcrmbacktrace';


//$__DPCATTR['RCCRMTRACE_DPC']['cpcrm'] = 'cpcrm,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCCRMTRACE_DPC'][0]='RCCRMTRACE_DPC;Crm trace;Crm trace';
$__LOCALE['RCCRMTRACE_DPC'][1]='_id;ID;ID';
$__LOCALE['RCCRMTRACE_DPC'][2]='_save;Save;Αποθήκευση';
$__LOCALE['RCCRMTRACE_DPC'][3]='_date;Date;Ημερ.';
$__LOCALE['RCCRMTRACE_DPC'][4]='_time;Time;Ώρα';
$__LOCALE['RCCRMTRACE_DPC'][5]='_customers;Customers;Πελάτες';
$__LOCALE['RCCRMTRACE_DPC'][6]='_users;Users;Χρήστες';
$__LOCALE['RCCRMTRACE_DPC'][7]='_campaigns;Campaigns;Καμπάνιες';
$__LOCALE['RCCRMTRACE_DPC'][8]='_ulist;Leads;Λίστες';
$__LOCALE['RCCRMTRACE_DPC'][9]='_failed;Fails;Αποτυχίες';
$__LOCALE['RCCRMTRACE_DPC'][10]='_listname;List name;Όνομα λίστας';
$__LOCALE['RCCRMTRACE_DPC'][11]='_mode;Search in;Αναζήτηση σε';
$__LOCALE['RCCRMTRACE_DPC'][12]='_reply;Replies;Απαντήσεις';
$__LOCALE['RCCRMTRACE_DPC'][13]='_subject;Subject;Θέμα';
$__LOCALE['RCCRMTRACE_DPC'][14]='_dateins;Start at;Εκκίνηση';
$__LOCALE['RCCRMTRACE_DPC'][15]='_dateupd;Updated;Ενημερώση';



class rccrmtrace  {

    var $title, $path, $urlpath;
	var $seclevid, $userDemoIds;
		
	function __construct() {
	
		$this->path = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');
		$this->title = localize('RCCRMTRACE_DPC',getlocal());	 
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); 		  
		
	}
	
    function event($event=null) {
	
	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;		 
	
	   switch ($event) {
		   	
		 case 'cpcrmprofile' :  	   
	     case 'cpcrmtrace'   :
		 default             :    
		                      
	   }
			
    }   
	
    function action($action=null) {
		
	  $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	  if ($login!='yes') return null;	
	 
	  switch ($action) {	  
	  					
		 case 'cpcrmprofile'   : break;					  
	     case 'cpcrmtrace'     :
		 default               : $out = null;
	  }	 

	  return ($out);
    }
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}	


};
}
?>