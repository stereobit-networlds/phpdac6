<?php

require_once('cp/dpc2/system/pcntl.lib.php'); 

class cronscript {
	
	var $name, $prpath;

    function __construct($name=null) {

		$this->name = $name ? $name : 'cscript';
		$this->prpath = paramload('SHELL','prpath');
    }

    public function run($script=null) {
		if (!$script) {
			$this->writeLog('No script to run.');
			return false;	
		}
		
		$ret = null;
		
		if (class_exists('pcntl', true)) {
			
			$ret = eval($script);

			//test
			//$ret = $this->testscript();
		}
		return ($ret ? true : false);
    }
	
	protected function testscript() {
			$page = new pcntl('
super rcserver.rcssystem;
load_extension adodb refby _ADODB_; 
super database;
',1);				
			$db = GetGlobal('db');
			$now = date("Y-m-d H:m:s");
			$sSQL = "insert into syncsql (fid,status,date,execdate,sqlres,sqlquery,reference) values (1,1,'$now','$now',''," .
					$db->qstr(0) . "," . $db->qstr('cron') . ")"; 
			$ret = $db->Execute($sSQL,1);
			
			//$this->writeLog('Script:'.$sSQL;);	
			return ($ret);	
	}
	
	
	protected function writeLog($data = '') {
		if (empty($data)) return;

		$data = date('d-m-Y H:i:s')."\r\n" . $data . "\r\n----\r\n";
		$ret = file_put_contents($this->prpath . '/cron.log', $data, FILE_APPEND | LOCK_EX);
		
		return $ret;
	}	
}
?>