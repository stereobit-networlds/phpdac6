<?php
$__DPCSEC['CMS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

function _v($v=null) {
	return $v ? GetGlobal('controller')->calldpc_var($v) : null;
}

function _m($m=null) {
	return $m ? GetGlobal('controller')->calldpc_method($m) : null;
}

if ((!defined("CMS_DPC")) && (seclevel('CMS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CMS_DPC",true);

$__DPC['CMS_DPC'] = 'cms';

$a = GetGlobal('controller')->require_dpc('cms/fronthtmlpage.dpc.php');
require_once($a);

class cms extends fronthtmlpage {

    var $appname, $url;
	var $seclevid, $userDemoIds;
	var $tpath, $template;
		
	function __construct() {
		
		fronthtmlpage::__construct();
		
		$this->appname = paramload('ID','instancename');		
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); //8 
		
		$this->tpath = $this->htmlpage; //remote_paramload('FRONTHTMLPAGE','path',$this->prpath);	
		//$this->template = remote_paramload('FRONTHTMLPAGE','template',$this->prpath);			
	}
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}	

	public function isLevelUser($level=6) {
		return ($this->seclevid>=$level ? true : false);
	}		
};
}
?>