<?php

class processInst {
	
	protected $processStepName, $processChain;
	protected $caller, $callerName, $stack, $processName;
	protected $user, $seclevid, $event; 

	var $debug;	
	
	public function __construct(& $caller, $callerName, $stack=null) {
		$UserName = GetGlobal('UserName');		
		$UserSecID = GetGlobal('UserSecID');
		$this->user = decode($UserName);			
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : 
							($_SESSION['ADMINSecID'] ? $_SESSION['ADMINSecID'] :
								(((decode($UserSecID))) ? (decode($UserSecID)) : 0));		
								
		$this->debug = true;//false;	
		
		$this->caller = $caller;
		$this->callerName = $callerName; 
		$this->processName = 'process-' . $this->callerName;
		//echo $this->callerName;
		//$this->event = null;
	
		$this->stack = (array) $stack; //GetGlobal('controller')->getProcessStack();
		//print_r($this->stack);	

		//$k = array_keys($this->stack);
		//$this->cName = $this->getCallerNameInStack($k[0]);
		//echo $k[0] , '>' , $this->cName, '>';		
		//echo $this->getStackId() ,'->', $this->getStackCount();
		
		//$this->processChain = $this->getProcessChain();	
		//$this->processStepName = __CLASS__;	
		//echo $this->processStepName ,'-', implode(',',$this->processChain);		
	}
	
	
	public function isFinished($event=null) {
		if (!$this->isProcessUser($event)) return false;
		
		$this->event = $event;
		return true;
		
		/*
		$processMethod = GetGlobal('processMethod');
		//echo $processMethod;		
		
		switch ($processMethod) {
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

		$c = array( 'name'=>$this->processStepName,
					'process'=>$this->processName,
					'caller'=>$this->callerName,
					'event'=>$this->event,					
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
 	protected function getCallerNameInStack($stackElement=null) {
		if (!$stackElement) return null;
		
		$n = explode('.', $stackElement);
		return array_pop($n);
	}
	
	
	//misc
	
	protected function isProcessUser($event=null, $level=1) {
		$e = $event ? $event : $this->event;
		$processName = str_replace(' use ', '.', $this->step($e));		
		
		//validate user of process 
		//$this->validateUser($this->user, $processName);
		
		return (($this->user) && ($this->isLevelUser($level))) ? 
			true : false;
	}	
	
	protected function isLevelUser($level=1) {
		return ($this->seclevid >= $level) ? true : false;
	}			
	
	protected function loadForm($event=null) {
		$e = $event ? $event : $this->event;
		$formName = str_replace(' use ', '.', $this->step($e));

		if (defined('CMSRT_DPC')) {
			$ret = 'Load form:' . $formName;
			$ret.= _m("cmsrt.select_template use $formName+1");
		}
		else
			$ret = 'CMS form required:' . $formName;
		
		return $ret;
	}
 
	protected function _write($data=null) {
   
		if (!$length = strlen($data)) 
			return false;
 
		if ($fp = fopen($this->processName . '.txt.php', "w")) {	
			$bytes = fwrite($fp, $data, $length);
			fclose($fp);	   
			return ($bytes);
		}

		return false; 
	}
 
	protected function _writeutf8($data=null) {
   
		if (!$length = strlen($data)) 
			return false;
	
		if ($fp = fopen($this->processName . '.txt.php', "wb")) {	
	
			fwrite($fp, pack("CCC",0xef,0xbb,0xbf)); 
			$bytes = fwrite($fp, $data, $length);
			fclose($fp);	   
			return ($bytes);
		}

		return false; 
	} 

 
	protected function write2disk($data=null) {

        if ($fp = @fopen ($this->processName . '.txt.php', "a+")) {

            fwrite ($fp, $data);
            fclose ($fp);

            return true;
        }
        
        echo "File creation error ({$this->processName})!<br/>";
        return false;
	} 
 
}
?>