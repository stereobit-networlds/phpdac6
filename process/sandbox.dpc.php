<?php
$__DPCSEC['SANDBOX_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if (!defined("SANDBOX_DPC")) {
define("SANDBOX_DPC",true);

$__DPC['SANDBOX_DPC'] = 'sandbox';

$__EVENTS['SANDBOX_DPC'][0]= "sandbox";
$__EVENTS['SANDBOX_DPC'][1]= "process";
$__EVENTS['SANDBOX_DPC'][2]= "register";

$__ACTIONS['SANDBOX_DPC'][0]= "sandbox";
$__ACTIONS['SANDBOX_DPC'][1]= "process";
$__ACTIONS['SANDBOX_DPC'][2]= "register";

//included process dpc at page

class sandbox extends Process\process {

	protected $user, $seclevid; 
	var $status, $pid; //test

	public function __construct($p=null) {
		$UserName = GetGlobal('UserName');		
		$UserSecID = GetGlobal('UserSecID');
		$this->user = decode($UserName);			
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : 
							($_SESSION['ADMINSecID'] ? $_SESSION['ADMINSecID'] :
								(((decode($UserSecID))) ? (decode($UserSecID)) : 0));		
		
		$this->status = _v('shcart.status');
		$this->pid = GetReq('pid');	
		
		if ((defined('PROCESS_DPC')) && ($p))	{
			$this->process = new Process\process($this, $p, GetReq('t'));	
		}		
	}
	
	//called by controller after event
	public function processEvent($event=null) { 
		//echo 'Event:',$event;
		if ((defined('PROCESS_DPC')) &&
		    ($this->process instanceof Process\process)) { 
			$this->process->isFinished($event);
		}	
	}	
	
	public function event($event=null) {
		switch ($event) {
			
			case 'register': 	break;
			
			case 'sandbox' :
			case 'process' :
			default        : 	if (!$this->user) {
									if (defined('CMSLOGIN_DPC'))
										_m('cmslogin.event use cmslogin');
								}	
								else {
									
									//if invalid user in session
									//...									
									
									//if post form
									//...
									
									//echo '(' . $this->status . ')';
								}
								
		}	
	}
	
	public function action($action=null) {
		switch ($action) {
			
			case 'register': 	$ret = null; 
								break;
			
			case 'sandbox' :
			case 'process' :
			default        : 	if (!$this->user) {
									//login page
									//$ret = $this->loadLoginForm();
									if (defined('CMSLOGIN_DPC'))
										$ret = _m('cmslogin.action use cmslogin');
								}	
								else {
									
									//if invalid user in session
									//...									
									
									//if post form
									//...
								
									$ret = 'test'; 
								}	
		}

		return ($ret);	
	}	
		
};
}
?>	