<?php
namespace Process;

class foo {
    static public function test($name) {
        //print '[['. $name .']]';
    }
	
    static public function autoload($class)  {	

        if (0 !== strpos($class, 'process')) 
            return;
		
        //echo dirname(__FILE__).'/'.str_replace(array('_', "\0"), array('/', ''), $class).'.php';
        if (file_exists($file = dirname(__FILE__).'/'.str_replace(array('_', "\0"), array('/', ''), $class).'.php')) {
            require $file;
        }
    }
}

ini_set('unserialize_callback_func', 'spl_autoload_call');
spl_autoload_register(__NAMESPACE__ .'\foo::autoload');

$__DPCSEC['PROCESS_DPC']='1;1;1;1;1;1;1;1;1;1;1';
if (!defined("PROCESS_DPC")) {
define("PROCESS_DPC",true);

$__DPC['PROCESS_DPC'] = 'process';

//require_once(_r('process/processInst.lib.php')); //not when include this in dpc
require_once(GetGlobal('controller')->require_dpc('process/processInst.lib.php'));

class process {

	private $caller, $proccesChain, $name;

	public function __construct(& $caller, $p, $cmd=null) {

		$this->name = 'process';
		$this->caller = $caller;
		
		if (strstr($p,',')) //process chain
			$this->proccesChain = explode(',', $p);
		else	
			$this->proccesChain[0] = $p;
		
		//print_r($this->proccesChain);
		/*foreach ($this->proccesChain as $processInst) {
			$c = new $processInst($caller);
			if (!$c->isFinished()) break;	
		}*/
		
		if (!$cmd) //when no getreq t check at construct else after event
			$this->isFinished();
		
		//echo $this->caller->checkout;
		
		//list($childClass, $thecaller) = debug_backtrace(false, 2);
		//print_r($childClass);
		//print_r($thecaller); //[class] [function]		
	}
	
	public function isFinished($event=null) {
		//echo 'getEvent:' . $event;
		foreach ($this->proccesChain as $processInst) {
			$c = new $processInst($this->caller);
			if (!$c->isFinished()) return false;
		}
		
		return true;
	}
 
	public function _write($data=null) {
   
		if (!$length = strlen($data)) 
			return false;
 
	
		if ($fp = fopen($this->name.'.txt.php', "w")) {	
			$bytes = fwrite($fp, $data, $length);
			fclose($fp);	   
			return ($bytes);
		}

		return false; 
	}
 
	public function _writeutf8($data=null) {
   
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

 
	public function write2disk($file,$data=null) {

        if ($fp = @fopen ($file , "a+")) {
			//echo $file,"<br>";
            fwrite ($fp, $data);
            fclose ($fp);

            return true;
        }
        
        echo "File creation error ($file)!<br>";
        return false;
	}  
};
}
?>