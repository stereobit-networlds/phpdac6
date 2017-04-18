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
		if (!$this->isProcessUser()) 
			return false;
		
		$this->event = $event;
		return true;
	}	
	
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

	//alias
	protected function getProcessChainName() {
		return $this->getProcessStepName();
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
		$isclosed = $this->isClosedProcess();

		$c = array( 'name'=>$this->processStepName,
					'process'=>$this->processName,
					'caller'=>$this->callerName,
					'event'=>$this->event,	
					'method'=>$this->pMethod,
					'closed'=>$isclosed,
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
	
	//update running stack step
	protected function stackRunStep($state=null) {	
	
		if ($this->isRunningProcess())  {
			
			$cid = $this->getChainId();
			$sid = $this->getStackId();
			$pstate = $state ? 1 : 0;	
		
			$ret = $this->stackRunSave($pstate, $cid, $sid);
			return ($ret);
		}	
		
		return true;
	}
	
	//misc	
	
	protected function debug() {
		if ($this->debug) {
			echo ($ps = $this->prevStep($event)) ? '<br/>Prev step:' . $ps : null;
			echo '<br/>Step:' . $this->step($event);
			echo ($ns = $this->nextStep($event)) ? '<br/>Next step:' . $ns : null ;
							
			echo '<pre>';
			print_r($this->getProcessStepInfo());
			echo '</pre>';
		}		
	}
	
	//test
	protected function runCode($status=0, $e=null) {
		
		$code = "<? 
\$event = '$e'; 
if (\$this->caller->status>=$status) { 
	if (\$this->caller->status==$status) {
		
		\$this->debug();
	}
	return true; 
}	
return false; 
?>";
		$ret = $this->dCompile($code);

		return ($ret);
	}	
	
	protected function dCompile($data=null) {
		if (!$data) return null;
		
		if (substr($data, -2) == '?>') {
			$data = '?>' . $data . ((substr($data, -2) == '?>') ? '<?php ' : '');
			return eval($data);				
		}
		elseif (substr($data, -8) == '/phpdac>') {
			return _m(substr($data,8,-9));
		}
		else
			return ($data);		
	}			
 
}
?>