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
		
		$this->caller = $caller; //obj
		$this->callerName = get_class($caller);
		$this->pid = GetReq('pid');	
		$this->processName = 'process-' . $this->callerName;		

		if (strstr($p,',')) //process chain
			$this->proccesChain = explode(',', $p);
		else	
			$this->proccesChain[0] = $p;
		
		//print_r($this->proccesChain);
		if ((!$cmd) || ($cmd=='process')) //when no getreq t check at construct else after event
			$this->isFinished();
		
		//echo 'construct: ' . $this->processName . '<br/>';
		//is null
		//$this->processStack = (array) GetGlobal('controller')->getProcessStack();
	}
	
	public function event($event=null) {
		switch ($event) {
			
			case 'register': 	break;
			
			case 'process' :
			default        : 	//is loaded as lib
								//not executed (see sandbox)
								echo 'process z';
		}	
	}
	
	public function action($action=null) {
		switch ($action) {
			
			case 'register': 	$ret = null; 
								break;
			
			case 'process' :
			default        :	//is loaded as lib
								//not executed (see sandbox)
								$ret = 'process z';
		}

		return ($ret);	
	}		
	
	public function isFinished($event=null) {
		if (!$this->user) return false;
		
		$stack =  GetGlobal('controller')->getProcessStack(); 
		$processMethod = GetGlobal('processMethod');
		//echo $processMethod;		
		
		if ($this->debug) {
			echo '<br/>getEvent:' . $event;
			echo '<br/>getCaller:' . $this->callerName;
			echo '<br/>getChain:' . implode(',',$this->proccesChain);
			echo '<br/>getStack:';// . array_map(function($a) { return $a;}, $stack);;		
			print_r($stack);
		}
		
		switch ($processMethod) {
			
			case 'serialized' : //must be based on db data -> state
			
				//check execution state by saving the caller class name
			    //echo $this->callerName,':',GetSessionParam('pCallerName');
				if (($sCaller = GetSessionParam('pCallerName')) && ($this->callerName != $sCaller))
					return false;
				
				foreach ($this->proccesChain as $i=>$processInst) {
					//echo "<br/>$i $processInst<br/>";
					$c = new $processInst($this->caller, $this->callerName, $stack);
					if (!$c->isFinished($event)) {
						SetSessionParam('pCallerName', $this->callerName);
						return false;
					}	
				}
				//when true reset
				SetSessionParam('pCallerName', null); 
				break;
				
			case 'puzzled'    :
				$usClass = str_replace('-','_', $this->pid);
				//fetch specific process based on pid
				//echo 'puzzled:'.$event.':'.$this->pid;
				//try {
				if (class_exists($usClass)) {
					$c = new $usClass($this->caller, $this->callerName, $stack);
					if (!$c->isFinished($event)) return false;
				}	
				//catch(Exception $e){
				else {	
					die('Invalid process object');
					//echo 'Process Exception:' . $e->getMessage();
					//throw $e;
				}
				break;
			case 'balanced'   :			
			default           :
			
				foreach ($this->proccesChain as $i=>$processInst) {
					//echo "<br/>$i $processInst<br/>";
					$c = new $processInst($this->caller, $this->callerName, $stack);
					if (!$c->isFinished($event)) return false;
				}
		}

		return true;
	}
	
	public function getProcessName() {
		return $this->$processName;
	}

	//misc	
	
	protected function isLevelUser($level=1) {
		return ($this->seclevid >= $level) ? true : false;
	}	
	
	protected function validateUser($level=1) {
		//sql validation
		//...
	}	
	
	protected function loadLoginForm($event=null) {

		if (defined('CMSRT_DPC')) {
			//$ret = 'Load form:login';
			//$ret.= _m("cmsrt.select_template use login+1"); //cp path
			$tokens[] = GetGlobal('sFormErr');
			$ret.= _m('cmsrt._ct use qlogin+' . serialize($tokens));
		}
		else
			$ret = 'CMS form required:' . $formName;
		
		return $ret;
	}	
 
	public function _write($data=null) {
   
		if (!$length = strlen($data)) 
			return false;
 
	
		if ($fp = fopen($this->processName . '.txt.php', "w")) {	
			$bytes = fwrite($fp, $data, $length);
			fclose($fp);	   
			return ($bytes);
		}

		return false; 
	}
 
	public function _writeutf8($data=null) {
   
		if (!$length = strlen($data)) 
			return false;
	
		if ($fp = fopen($this->processName . '.txt.php', "wb")) {	
	
			fwrite($fp, pack("CCC",0xef,0xbb,0xbf)); 
			$bytes = fwrite($fp, $data, $length);
			fclose($fp);	   
			return ($bytes);
		}

		return false; 
	} 

 
	public function write2disk($data=null) {

        if ($fp = @fopen ($this->processName . '.txt.php', "a+")) {

            fwrite ($fp, $data);
            fclose ($fp);

            return true;
        }
        
        echo "File creation error ({$this->processName})!<br/>";
        return false;
	}  
};
}
?>