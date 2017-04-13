<?php

class processdir_test1 extends processInst {

    private $caller;
	
	public function __construct(& $caller) {
		echo 'hello process subdir test1';
		
		$this->caller = $caller;
		//echo $this->caller->checkout;
	}
 
	//override
	public function nextStep() {
		
	}
	
	//override
	public function isFinished() {

		return ($this->caller->status>2) ? true : false;
	}	
 
}
?>