<?php
$__DPCSEC['CMS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CMS_DPC")) && (seclevel('CMS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CMS_DPC",true);

$__DPC['CMS_DPC'] = 'cms';

class cms {

    var $appname, $urlpath, $prpath, $url;
	var $seclevid, $userDemoIds;
	var $cptemplate;
		
	function __construct() {
		
		$this->appname = paramload('ID','instancename');		
	
		$this->urlpath = paramload('SHELL','urlpath');
		$this->url = paramload('SHELL','urlbase');	
		$this->prpath = paramload('SHELL','prpath'); 
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); //8 
		
	    $tmpl = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->path);  
	    $this->cptemplate = $tmpl ? $tmpl : 'metro';			
	}
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}		
};
}
?>