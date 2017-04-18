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

//$__EVENTS['PROCESS_DPC'][0]= "process";

//$__ACTIONS['PROCESS_DPC'][0]= "process";

class process extends pstack {

	protected $proccesChain;

	public function __construct(& $caller, $chain=null, $cmd=null) {

		parent::__construct($caller); //not a name or stack in this
		
		if (strstr($chain,',')) //process chain
			$this->proccesChain = explode(',', $chain);
		else	
			$this->proccesChain[0] = $chain;
		
		//when no getreq t check at construct else after event
		if ((!$cmd) || ($cmd=='process')) 
			$this->isFinished();
		
		//echo 'construct: ' . $this->processName . '<br/>';
	}
	/*
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
	*/
	public function isFinished($event=null) {
		if (!$this->user) return false;		
		if ($this->isClosedProcess()) return true;
		
		$stack =  GetGlobal('controller')->getProcessStack(); 

		if ($this->debug) {
			echo '<br/>getEvent:' . $event;
			echo '<br/>getCaller:' . $this->callerName;
			echo '<br/>getChain:' . implode(',',$this->proccesChain);
			echo '<br/>getStack:';// . array_map(function($a) { return $a;}, $stack);;		
			print_r($stack);
		}
		
		switch ($this->pMethod) {
			
			case 'puzzled'    :	
				/*if ($this->isClosedProcess()) {
					break;
				}*/
				
				//when running pid is the process run id
			    $us = ($this->isRunningProcess()) ?	$this->clp : $this->pid;
				
				//run specific process class
				$usClass = str_replace('-','_', $us);
				$inChain = in_array($usClass, $this->getProcessChain());		
				if ((class_exists($usClass)) && ($inChain)) {
					if (!$this->runInstance($usClass, $event)) 
						return false;	
				}	
				break;			
			
			case 'serialized' : 
				/*if ($this->isClosedProcess()) {
					break;
				}
				*/
			    if ($rid = $this->isRunningProcess()) {
					echo 'Running:' . $rid;
					//get next state call
					//$stateClass = ...
					//if (!$this->runInstance($stateClass, $event)) 
						return false;
				}	
				else { //static run
					//check execution state by saving the caller class name
					//echo $this->callerName,':',GetSessionParam('pCallerName');
					if (($sCaller = GetSessionParam('pCallerName')) && ($this->callerName != $sCaller))
						return false;
				
					foreach ($this->proccesChain as $i=>$processInst) {
						if (!$this->runInstance($processInst, $event)) { 
							SetSessionParam('pCallerName', $this->callerName);
							return false;
						}	
					}
					//when true reset
					SetSessionParam('pCallerName', null); 
				}
				break;
				
			case 'balanced'   :			
			default           :
				/*if ($this->isClosedProcess()) {
					break;
				}
				*/
				if ($rid = $this->isRunningProcess()) 
					echo 'Running:' . $rid;
		
				foreach ($this->proccesChain as $i=>$processInst) {
					if (!$this->runInstance($processInst, $event)) 
						return false;
				}
		}

		return true;
	}
	
	protected function runInstance($inst=null, $event=null) {
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