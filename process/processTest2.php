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

		if ($this->runCode(1, $event)) {
			
			//$form = $this->callerName .'.'. $this->processStepName . ($event ? '.' . $event : null);			
			//$this->setFormStack($form);
			
			$this->stackRunStep(1);
			return true;
		};
		
		return false;
	}	
 
}
?>