<?php

class processTest1 extends processInst {

	private $caller;
	
	public function __construct(& $caller) {
		echo 'hello process 1';
		
		$this->caller = $caller;
		//echo $this->caller->checkout;
	}
 
	//override
	public function nextStep() {
		
	}
	
	//override
	public function isFinished() {

		return ($this->caller->status>0) ? true : false;
	}	
 	
 
}
?>