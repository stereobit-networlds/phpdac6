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

require_once(GetGlobal('controller')->require_dpc('process/pstack.lib.php'));
require_once(GetGlobal('controller')->require_dpc('process/processInst.lib.php'));

$__EVENTS['PROCESS_DPC'][0]= "process";

$__ACTIONS['PROCESS_DPC'][0]= "process";

class process extends pstack {

	protected $proccesChain, $processStack;

	public function __construct(& $caller, $p=null, $cmd=null) {

		parent::__construct($caller); //not a name or stack in this
		
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

		if ($this->debug) {
			echo '<br/>getEvent:' . $event;
			echo '<br/>getCaller:' . $this->callerName;
			echo '<br/>getChain:' . implode(',',$this->proccesChain);
			echo '<br/>getStack:';// . array_map(function($a) { return $a;}, $stack);;		
			print_r($stack);
		}
		
		switch ($this->pMethod) {
			
			case 'serialized' : //must be based on db data -> state
			
				//check execution state by saving the caller class name
			    //echo $this->callerName,':',GetSessionParam('pCallerName');
				if (($sCaller = GetSessionParam('pCallerName')) && ($this->callerName != $sCaller))
					return false;
				
				foreach ($this->proccesChain as $i=>$processInst) {
					//echo "<br/>$i $processInst<br/>";
					//$c = new $processInst($this->caller, $this->callerName, $stack);
					//if (!$c->isFinished($event)) {
					if (!$this->runInstance($processInst)) { 
						SetSessionParam('pCallerName', $this->callerName);
						return false;
					}	
				}
				//when true reset
				SetSessionParam('pCallerName', null); 
				break;
				
			case 'puzzled'    :	
				//run specific process class
			    if ($rid = $this->isRunningProcess()) {
					$us = $this->clp; 
					echo 'Running:' . $rid;
				}	
				else 
					$us = $this->pid;
				
				$usClass = str_replace('-','_', $us);
				$inChain = in_array($usClass, $this->getProcessChain());		
				if ((class_exists($usClass)) && ($inChain)) {
					/*try {
						$c = new $usClass($this->caller, $this->callerName, $stack);
						if (!$c->isFinished($event)) return false;
					}	
					catch(Exception $e){
						//echo 'Process Exception:' . $e->getMessage();
						throw $e;
					}*/
					if (!$this->runInstance($usClass)) 
						return false;	
				}	
				break;
				
			case 'balanced'   :			
			default           :
			
				foreach ($this->proccesChain as $i=>$processInst) {
					//echo "<br/>$i $processInst<br/>";
					//$c = new $processInst($this->caller, $this->callerName, $stack);
					//if (!$c->isFinished($event)) return false;
					if (!$this->runInstance($processInst)) 
						return false;
				}
		}

		return true;
	}
	
	protected function runInstance($inst=null) {
		if (!$inst) die('No instance to run!');		
		$stack =  GetGlobal('controller')->getProcessStack();			
		
		try {
			$c = new $inst($this->caller, $this->callerName, $stack);
			if ($c->isFinished($event)) 
				return true;
		}	
		catch(Exception $e){
			//echo 'Process Exception:' . $e->getMessage();
			throw $e;
		}

		return false;	
	}
 
};
}
?>