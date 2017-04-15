<?php

class processdir_test1 extends processInst {
	
	public function __construct(& $caller, $callerName, $stack=null) {
		//echo 'hello process subdir test1';
		
		parent::__construct($caller, $callerName, $stack);
		$this->processStepName = __CLASS__;
		
		//echo 'process subdir test1:',$this->caller->status;
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
		
		parent::isFinished($event);
		
		//echo 'Process subdir test1:',$event;
		//return ($this->caller->status>2) ? true : false;
		
		if ($this->caller->status>=2) {
			if ($this->caller->status==2) {
				if ($this->debug) {
				echo ($ps = $this->prevStep($event)) ? '<br/>Prev step:' . $ps : null;
				echo '<br/>Step:' . $this->step($event);
				echo ($ns = $this->nextStep($event)) ? '<br/>Next step:' . $ns : null ;
							
				echo '<pre>';
				print_r($this->getProcessStepInfo());
				echo '</pre>';
				}
			}			
			return true;
		}		
		
		return false;		
	}	
 
}
?>