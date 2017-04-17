<?php

class processInst extends Process\pstack {
	
	protected $processStepName, $processChain;
	protected $stack, $event; 
	
	public function __construct(& $caller, $callerName=null, $stack=null) {
				
		parent::__construct($caller); //not a name or stack in this
		
		$this->debug = true;//override;	
		
		//$this->event = null;
		$this->stack = (array) $stack; //GetGlobal('controller')->getProcessStack();
		//print_r($this->stack);	

		//$this->processChain = $this->getProcessChain();	
		//$this->processStepName = __CLASS__;	
		//echo $this->processStepName ,'-', implode(',',$this->processChain);		
	}
	
	
	public function isFinished($event=null) {
		if (!$this->isProcessUser($event)) return false;
		
		$this->event = $event;
		return true;
		
		/*		
		switch ($this->pMethod) {
			case 'puzzled'    :
			
			case 'serialized' :	if (!$this->isFinishedChain($event)) {
									echo 'serialized:halt ' . $this->caller;;
									return false;
								}	
								break;
			case 'balanced'   :			
			default           :	return true;
		}	
		
		return false;*/
	}

	/*public function isFinishedChain($event=null) {
		$this->event = $event;

		if ($this->getNextInChain())
			return false;
		
		return true;//$this->isFinished($event);
	}*/	
	
	public function nextStep($event=null) {
		if ($this->getProcessStepInfo('isNext')) {
			return $this->getProcessStepInfo('caller') .'.'. $this->getNextInChain() .
				   (($e = ($event ? $event : $this->getProcessStepInfo('event'))) ? ' use ' . $e : null);	
		}	
		elseif ($this->getProcessStepInfo('isNextS')) {
			return $this->getNextInStack() .
				   (($e = ($event ? $event : $this->getProcessStepInfo('event'))) ? ' use ' . $e : null);				
		}
		
		return false;	
	}
	
	public function prevStep($event=null) { 
		if ($this->getProcessStepInfo('isPrev')) {
			return $this->getProcessStepInfo('caller') .'.'. $this->getPrevInChain() .
				   (($e = ($event ? $event : $this->getProcessStepInfo('event'))) ? ' use ' . $e : null);	
		}	
		elseif ($this->getProcessStepInfo('isPrevS')) {
			return $this->getPrevInStack() .
				   (($e = ($event ? $event : $this->getProcessStepInfo('event'))) ? ' use ' . $e : null);				
		}
		
		return false;
	}	
	
	public function step($event=null) {
		return $this->getProcessStepInfo('caller') .'.'. $this->getProcessStepInfo('name') .
			   (($e = ($event ? $event : $this->event)) ? ' use ' . $e : null);	
	}	
	
	protected function getProcessStepName() {
		return $this->processStepName;
	}	
	
	//alias
	protected function getProcessChainName() {
		return $this->processStepName;
	}

	//caller.processname.event
	protected function getFullStepName() {
		return str_replace(' use ', '.', $this->step($e));
	}	
	
	protected function getProcessStepInfo($param=null) {
		//chain 
		$isLast = $this->isLastInChain();
		$isPrev = $this->isPrevInChain();
		$isNext = $this->isNextInChain();
		
		$cmax = $this->getChainCount();		
		$cid = $this->getChainId();
		
		//stack
		$isLastS = $this->isLastInStack();
		$isPrevS = $this->isPrevInStack();
		$isNextS = $this->isNextInStack();
		
		$smax = $this->getStackCount();		
		$sid = $this->getStackId();

		$pid = $this->isRunningProcess();	

		$c = array( 'name'=>$this->processStepName,
					'process'=>$this->processName,
					'caller'=>$this->callerName,
					'event'=>$this->event,	
					'method'=>$this->pMethod,
					'pid'=>$pid,
					'cid'=>$cid,
					'cmax'=>$cmax,
		            'isLast'=>$isLast,
					'isPrev'=>$isPrev,
					'isNext'=>$isNext,
					'sid'=>$sid,
					'smax'=>$smax,
		            'isLastS'=>$isLastS,
					'isPrevS'=>$isPrevS,
					'isNextS'=>$isNextS,
				);	
				
		return ($param) ? $c[$param] : $c;		
	}

	
	//chain methods	
	
	protected function getNextInChain() {
 		$chain = $this->getProcessChain();
		$thisID = $this->getChainId()-1; 
		//print_r($chain); echo $thisID;
		return $chain[$thisID+1]; 
	}

	protected function getPrevInChain() {
 		$chain = $this->getProcessChain();
		$thisID = $this->getChainId()-1;
		
		return $chain[$thisID-1];
	}		
	
	protected function isLastInChain() {
		if ($this->getChainId() == $this->getChainCount())
			return true;
		
		return false;
	}	
	
	protected function isPrevInChain() {
		if ($this->getChainId() > 1)
			return true;	
		
		return false;
	}	
	
	protected function isNextInChain() {
		if ($this->getChainId() < $this->getChainCount())
			return true;
		
		return false;
	}	
	

	protected function getChainCount() {
		return count($this->getProcessChain());
	}	
	
	protected function getChainId() {
 		$chain = $this->getProcessChain();
		
		foreach ($chain as $id=>$chainName) {
			//echo '<br/>',$this->processStepName ,':', $chainName;
			if ($this->processStepName == $chainName)
				return ($id + 1);
		}
		
		return 0;
	}	
	/*
	protected function getProcessChain() {
		//$stack = (array) GetGlobal('controller')->getProcessStack();
		
		foreach ($this->stack as $stackName=>$processChain) {

			$sName = $this->getCallerNameInStack($stackName);
			//echo '<br/>',$stackName , '>' , $sName , '>', $this->callerName;
			if ($sName == $this->callerName) {
				//print_r($processChain);
				return (array) $processChain;
			}	
		}
		
		return null;
	}	
	*/

	//stack methods
	protected function getNextInStack() {
 		//$stack = (array) GetGlobal('controller')->getProcessStack();
		$thisID = $this->getStackId()-1;	
		$i=0;
		foreach ($this->stack as $stackName=>$processChain) {
			if ($i==$thisID+1) {
				$sName = $this->getCallerNameInStack($stackName);
				return $sName .'.'. array_shift($processChain);
			}	
			$i+=1;	
		}
		return null;
	}

	protected function getPrevInStack() {
 		//$stack = (array) GetGlobal('controller')->getProcessStack();
		$thisID = $this->getStackId()-1;
		$i=0;
		foreach ($this->stack as $stackName=>$processChain) {
			if ($i==$thisID-1) {
				$sName = $this->getCallerNameInStack($stackName);
				return $sName .'.'. array_pop($processChain);
			}	
			$i+=1;		
		}
		return null;
	}	
 	
	
	protected function isLastInStack() {
		if ($this->getStackId() == $this->getStackCount())
			return true;
		
		return false;
	}	
	
	protected function isPrevInStack() {
		if ($this->getStackId() > 1)
			return true;	
		
		return false;
	}	
	
	protected function isNextInStack() {
		if ($this->getStackId() < $this->getStackCount())
			return true;
		
		return false;
	}	
	

	protected function getStackCount() {
		//$stack = (array) GetGlobal('controller')->getProcessStack();
		return count($this->stack);
	}	
	
	protected function getStackId() {
		//$stack = (array) GetGlobal('controller')->getProcessStack();
 		$kStack = array_keys($this->stack);
		
		foreach ($kStack as $id=>$stackName) {
			
			$sName = $this->getCallerNameInStack($stackName);
			//echo $stackName , '>' , $sName;
			if ($sName == $this->callerName)
				return ($id + 1);
		}
		
		return 0;
	}	

	//get the .part of dpc name
 	/*protected function getCallerNameInStack($stackElement=null) {
		if (!$stackElement) return null;
		
		$n = explode('.', $stackElement);
		return array_pop($n);
	}*/
	
	
	//misc	
	
	protected function isProcessUser($event=null, $level=1) {
		$e = $event ? $event : $this->event;
		$processName = str_replace(' use ', '.', $this->step($e));		
		
		//validate user of process 
		//$this->validateUser($this->user, $processName);
		
		return (($this->user) && ($this->isLevelUser($level))) ? 
			true : false;
	}			
	
	protected function loadForm($event=null) {
		$e = $event ? $event : $this->event;
		$formName = str_replace(' use ', '.', $this->step($e));

		if (defined('CMSRT_DPC')) {
			$ret = 'Load form:' . $formName;
			if (!$f = _m("cmsrt.select_template use $formName+1+p")) {
				//generic form without caller name
				$fn = explode('.', $formName);
				$f = _m("cmsrt.select_template use ". $fn[1] ."+1+p");
				$ret.= '/' . $fn[1];
			}
			$ret.= $f;
		}
		//else
			//$ret = 'CMS form required:' . $formName;
		
		return $ret;
	}

 
}
?>