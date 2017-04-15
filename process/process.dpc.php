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

$__EVENTS['PROCESS_DPC'][0]= "process";

$__ACTIONS['PROCESS_DPC'][0]= "process";

class process {

	private $caller, $callerName, $proccesChain;
	protected $pid, $processName, $processStack;
	protected $user, $seclevid;

	var $debug;	

	public function __construct(& $caller, $p, $cmd=null) {
		$UserName = GetGlobal('UserName');		
		$UserSecID = GetGlobal('UserSecID');
		$this->user = decode($UserName);			
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : 
							($_SESSION['ADMINSecID'] ? $_SESSION['ADMINSecID'] :
								(((decode($UserSecID))) ? (decode($UserSecID)) : 0));		
		
		$this->debug = false;
		
		$this->caller = $caller;

		if (strstr($p,',')) //process chain
			$this->proccesChain = explode(',', $p);
		else	
			$this->proccesChain[0] = $p;
		
		//echo $this->caller->checkout;
		
		//list($childClass, $thecaller) = debug_backtrace(false, 2);
		//print_r($childClass);
		//print_r($thecaller); //[class] [function]			
		$this->callerName = get_class($caller);
		
		//print_r($this->proccesChain);
		if (!$cmd) //when no getreq t check at construct else after event
			$this->isFinished();
		
		$this->pid = GetReq('pid');	
		$this->processName = 'process-' . $this->callerName;
		//echo 'construct: ' . $this->processName . '<br/>';
		//is null
		//$this->processStack = (array) GetGlobal('controller')->getProcessStack();
	}
	
	public function event($event=null) {
		switch ($event) {
			
			case 'register': break;
			
			case 'process' :
			default        :
		}	
	}
	
	public function action($action=null) {
		switch ($action) {
			
			case 'register': $ret = null; break;
			
			case 'process' :
			default        :
		}

		return ($ret);	
	}	
	
	public function isLevelUser($level=1) {
		return ($this->seclevid >= $level) ? true : false;
	}	
	
	
	public function isFinished($event=null) {
		if ($this->debug) {
			echo '<br/>getEvent:' . $event;
			echo '<br/>getCaller:' . $this->callerName;
			echo '<br/>getChain:' . implode(',',$this->proccesChain);
			
			$stack =  GetGlobal('controller')->getProcessStack(); 
			echo '<br/>getStack:';// . array_map(function($a) { return $a;}, $stack);;		
			print_r($stack);
		}
		
		foreach ($this->proccesChain as $i=>$processInst) {
			//echo "<br/>$i $processInst<br/>";
			$c = new $processInst($this->caller, $this->callerName, $stack);
			if (!$c->isFinished($event)) return false;
		}
		
		return true;
	}
	
	
	
	public function getProcessName() {
		return $this->$processName;
	}	
	
 
	public static function _write($data=null) {
   
		if (!$length = strlen($data)) 
			return false;
 
	
		if ($fp = fopen($this->name.'.txt.php', "w")) {	
			$bytes = fwrite($fp, $data, $length);
			fclose($fp);	   
			return ($bytes);
		}

		return false; 
	}
 
	public static function _writeutf8($data=null) {
   
		if (!$length = strlen($data)) 
			return false;
	
		if ($fp = fopen(self::$processName.'.txt.php', "wb")) {	
	
			// Now UTF-8 - Add byte order mark 
			fwrite($f, pack("CCC",0xef,0xbb,0xbf)); 
	   
			$bytes = fwrite($fp, $data, $length);
			fclose($fp);	   
			return ($bytes);
		}

		return false; 
	} 

 
	public static function write2disk($data=null) {

        if ($fp = @fopen (self::$processName , "a+")) {

            fwrite ($fp, $data);
            fclose ($fp);

            return true;
        }
        
        echo "File creation error ({self::$processName})!<br/>";
        return false;
	}  
};
}
?>