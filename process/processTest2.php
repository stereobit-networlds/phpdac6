<?php

class processTest2 extends processInst {

    private $caller;
	
	public function __construct(& $caller) {
		echo 'hello process 2';
		
		$this->caller = $caller;
		//echo $this->caller->checkout;
	}
 
	//override 
	public function nextStep() {
		
	}
	
	//override
	public function isFinished() {

		return ($this->caller->status>1) ? true : false;
	}	
 
}
?>