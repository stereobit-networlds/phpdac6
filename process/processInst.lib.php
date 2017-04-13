<?php

class processInst {
	
	protected $name;
	
	public function __construct(& $caller) {
		//empty
		$this->name = 'processInst';
	}
	
	public function nextStep() {
		//empty
	}
	
	public function isFinished() {
		//empty
	}	
 
	protected function _write($data=null) {
   
		if (!$length = strlen($data)) 
			return false;
 
	
		if ($fp = fopen($this->name.'.txt.php', "w")) {	
			$bytes = fwrite($fp, $data, $length);
			fclose($fp);	   
			return ($bytes);
		}

		return false; 
	}
 
	protected function _writeutf8($data=null) {
   
		if (!$length = strlen($data)) 
			return false;
	
		if ($fp = fopen($this->name.'.txt.php', "wb")) {	
	
			// Now UTF-8 - Add byte order mark 
			fwrite($f, pack("CCC",0xef,0xbb,0xbf)); 
	   
			$bytes = fwrite($fp, $data, $length);
			fclose($fp);	   
			return ($bytes);
		}

		return false; 
	} 
 
}
?>