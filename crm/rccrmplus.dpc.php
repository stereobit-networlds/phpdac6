<?php
$__DPCSEC['RCCRMPLUS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCCRMPLUS_DPC")) && (seclevel('RCCRMPLUS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCRMPLUS_DPC",true);

$__DPC['RCCRMPLUS_DPC'] = 'rccrmplus';

//$b = GetGlobal('controller')->require_dpc('crm/rccrm.dpc.php');
//require_once($b);

$__EVENTS['RCCRMPLUS_DPC'][0]='cpcrmplus';
$__EVENTS['RCCRMPLUS_DPC'][1]='cpcrmgant';
$__EVENTS['RCCRMPLUS_DPC'][2]='cpcrmshowgant';

$__ACTIONS['RCCRMPLUS_DPC'][0]='cpcrmplus';
$__ACTIONS['RCCRMPLUS_DPC'][1]='cpcrmgant';
$__ACTIONS['RCCRMPLUS_DPC'][2]='cpcrmshowgant';

$__LOCALE['RCCRMPLUS_DPC'][0]='RCCRMPLUS_DPC;Crm Plus;Crm Plus';
$__LOCALE['RCCRMPLUS_DPC'][1]='_date;Date;Ημερ.';
$__LOCALE['RCCRMPLUS_DPC'][2]='_time;Time;Ώρα';
$__LOCALE['RCCRMPLUS_DPC'][3]='_status;Status;Κατάσταση';
$__LOCALE['RCCRMPLUS_DPC'][4]='_user;User;Πελάτης';
$__LOCALE['RCCRMPLUS_DPC'][5]='_cid;cid;cid';


class rccrmplus extends rccrm  {
		
    /*var $title, $path, $urlpath;
	var $seclevid, $userDemoIds;*/
	
	function __construct() {
	
		/*$this->path = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');
		$this->title = localize('RCCRM_DPC',getlocal());	 
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); */

		rccrm::__construct();	
	}

    function event($event=null) {
	
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;		 
	
		switch ($event) {
		    
			case 'cpcrmshowgant': break;
			case 'cpcrmgant'    : echo $this->loadframe();
		                          die();
							      break;
			case 'cpcrmplus'    :
			default             :    
		                      
		}
			
    }   
	
    function action($action=null) {
		
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;	
	 
		switch ($action) {	

			case 'cpcrmshowgant': $out = $this->show(); break;	
			case 'cpcrmgant'    : break;
			case 'cpcrmplus'    :
			default             : $out = $this->crmPlusMode();
		}	 

		return ($out);
    }
	
	protected function crmPlusMode() {
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
													
		/*$turl1 = seturl('t=cpdorepall&backtrace=today'.$um);
		$turl2 = seturl('t=cpdorepall&backtrace=yesterday'.$um);
		$turl3 = seturl('t=cpdorepall&backtrace=week'.$um);
		$turl4 = seturl('t=cpdorepall&backtrace=month'.$um);
		$button .= $this->createButton('Actions', array('Run today'=>$turl1,
														'Run 1 day'=>$turl2,
														'Run week'=>$turl3,
														'Run 30 days'=>$turl4,
		                                              ),'warning');*/
													  													   
		//$content = (GetReq('mode')=='customers') ?
		switch ($mode) {
			case 'customers':	$content = $this->customers_grid(null,140,5,'r', true); break;
			case 'ulist'    :   $content = $this->ulist_grid(null,140,5,'e', true); break;
			case 'campaigns':   $content = $this->campaigns_grid(null,140,5,'r', true); break;			
			case 'users'    :   
			default         :   $content = $this->users_grid(null,140,5,'r', true); break;
		}			
					
		$ret = $this->window('e-CRM+: '.localize('_'.$mode, getlocal()), $button, $content);
		
		return ($ret);
	}	
	
	
	//override
	protected function loadframe($ajaxdiv=null, $mode=null) {
		$id = GetParam('id');
		$cmd = 'cpcrmshowgant&id='.$id ;//$mode not used
		$bodyurl = seturl("t=$cmd&iframe=1");
			
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"260px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}

	//override
	protected function show() {
		$id = GetReq('id');
		$title = 'ID:' . $id; 
		
		//$ret = $this->loadsubframe(null,'dashboard', true);
		$ret = GetGlobal('controller')->calldpc_method('mgantti.show_gantti');
		return ($ret);
	}		
	
};
}
?>