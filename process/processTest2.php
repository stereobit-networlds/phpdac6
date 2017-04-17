<?php

class processTest2 extends processInst {
		
	public function __construct(& $caller, $callerName, $stack=null) {

		parent::__construct($caller, $callerName, $stack);
		$this->processStepName = __CLASS__;
		
		//echo 'process 2:',$this->caller->status;
	}
 
	//override
	public function nextStep($event=null) {
		return parent::nextStep($event);
	}
	
	//override
	public function prevStep($event=null) {
		return parent::prevStep($event);
	}	
	
	//override
	public function isFinished($event=null) {
		
		
		if (!parent::isFinished($event)) {
			$this->stackRunStep();
			return false;
		}	

		return $this->runCode(1, $event);
		
		
		//...............................		
		
		
		if (parent::isFinished($event)) {
		
		//echo 'Process 2:',$event;
		//return ($this->caller->status>1) ? true : false;
		
		if ($this->caller->status>=1) {
			if ($this->caller->status==1) {
				if ($this->debug) {
				echo ($ps = $this->prevStep($event)) ? '<br/>Prev step:' . $ps : null;
				echo '<br/>Step:' . $this->step($event);
				echo ($ns = $this->nextStep($event)) ? '<br/>Next step:' . $ns : null ;
		
				echo '<pre>';
				print_r($this->getProcessStepInfo());
				echo '</pre>';	
				}
				
				echo $this->loadForm($event);
				
				$this->stackRunStep(1);
			}
			return true;
		}		
		}	
		$this->stackRunStep();
		return false;
	}	
 
}
?>