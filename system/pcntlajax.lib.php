<?php
require_once("pcntl.lib.php");

define("PCNTLAJAX_DPC",true);
$__DPC['PCNTLAJAX_DPC'] = 'pcntlajax'; 

class pcntlajax extends pcntl {

	var $ajax_var; 

	public function __construct($code=null,$preprocess=null,$locales=null) { 

		parent::__construct($code,$preprocess,$locales);
	}
   
	public function __destruct() {		  
	  
		parent::__destruct();   
	}
   
}
?>