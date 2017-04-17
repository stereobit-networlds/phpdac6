<?php
namespace Process;

class pstack {
	
	protected $debug, $db, $pMethod, $user, $seclevid;
	protected $caller, $callerName, $processName; 
	protected $pid, $clp;
	
	public function __construct(& $caller, $callerName=null, $stack=null) {
		$UserName = GetGlobal('UserName');		
		$UserSecID = GetGlobal('UserSecID');
		$this->user = decode($UserName);			
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : 
							($_SESSION['ADMINSecID'] ? $_SESSION['ADMINSecID'] :
								(((decode($UserSecID))) ? (decode($UserSecID)) : 0));		
					
		$this->debug = false;					
		$this->db = GetGlobal('db');
		$this->pMethod = GetGlobal('processMethod');
		
		$this->caller = $caller; //obj
		$this->callerName = get_class($caller);
		$this->processName = 'process-' . $this->callerName;		
		$this->pid = GetReq('pid');
		$this->clp = GetReq('clp');
		//echo $this->pid,'-',$this->pMethod,'>';	
	}
	
	protected function stackCalc($stack=null) {
		$s = $stack ? $stack : GetGlobal('controller')->getProcessStack();		
			
		return md5(serialize($s) .'|'. $this->pMethod);
	}	
	
	protected function stackView() {
		$stack =  GetGlobal('controller')->getProcessStack(); 
		if (empty($stack)) return;
		
		$thisFile = $_SERVER['PHP_SELF']; 
		$ret = $this->pMethod . $thisFile;
		
		foreach ($stack as $caller=>$chain)	
			$ret.= '<br/>'. $caller .'->'. implode('->', $chain);
		
		return ($ret);
	}
	
	protected function getProcessChain() {
		$stack = (array) GetGlobal('controller')->getProcessStack();
		
		foreach ($stack as $stackName=>$processChain) {
			$sName = $this->getCallerNameInStack($stackName);
			if ($sName == $this->callerName) 
				return (array) $processChain;
		}
		
		return null;
	}	
	
	//get the .part of dpc name
 	protected function getCallerNameInStack($stackElement=null) {
		if (!$stackElement) return null;
		
		$n = explode('.', $stackElement);
		return array_pop($n);
	}	
	
	protected function stackRegister() {
		$db = GetGlobal('db');
		$stack =  GetGlobal('controller')->getProcessStack();
		if (empty($stack)) return;
		
		$thisFile = $_SERVER['PHP_SELF'];	
		
		$sid = md5(serialize($stack) .'|'. $this->pMethod);
		
		//check if stack exist
		$cSQL = "select sid from pstack where sid='$sid' LIMIT 1";
		$res = $db->Execute($cSQL);
		if ($res->fields[0]) return -1; //stack exist
		
		//register stack with selected method
		$cid=0;
		foreach ($stack as $caller=>$chain)	{
			$cid+=1; //start at 1
			$cobj = $caller;
			$cprocess = implode(',', $chain);
			$sSQL = "insert into pstack (sid,cid,cobj,cprocess,cmethod,notes) values (";
			$sSQL.= "'$sid',$cid,'$cobj','$cprocess','{$this->pMethod}','$thisFile')";
			$db->Execute($sSQL);
		}
		return ($cid); //stack count
	}
	
	protected function stackRun() {
		$db = GetGlobal('db');
		$stack =  GetGlobal('controller')->getProcessStack();
		if (empty($stack)) return;
			
		$rid = md5(serialize($stack) .'|'. $this->pMethod . '|' . time());			
		$sid = md5(serialize($stack) .'|'. $this->pMethod);
		
		//check if stack is registered
		$cSQL = "select sid from pstack where sid='$sid' LIMIT 1";
		$res = $db->Execute($cSQL);
		if (!$res->fields[0]) return false; 
		
		//check if stack is running
		$cSQL = "select sid from pstackrun where sid='$sid' LIMIT 1";
		$res = $db->Execute($cSQL);
		if ($res->fields[0]) return false; 		
		
		//put initial record indicates stack running id
		$sSQL = "insert into pstackrun (rid,sid) values (";
		$sSQL.= "'$rid','$sid')";
		$db->Execute($sSQL);

		return ($rid); 
	}

	protected function isRunningProcess() {
		$db = GetGlobal('db');	

		//check if id is a running process
		$cSQL = "select rid from pstackrun where rid='{$this->pid}' LIMIT 1";
		$res = $db->Execute($cSQL);
		if ($res->fields[0]) 
			return ($res->fields[0]);
		
		return false; 			
	}

	protected function showProcess($pid=null,$limit=1) {
		$db = GetGlobal('db');	
		$id = $pid ? $pid : $this->pid;
	
		//fetch last running process record
		$pSQL = "select rid,sid,sstep,pstep,pstate,pobj from pstackrun where rid='$id' order by id DESC LIMIT $limit";
		$res = $db->Execute($pSQL);
		
		foreach ($res as $i=>$rec) {
			$ret.= "sid:" . $rec[1] . '<br/>';
			$ret.= "sstep:" . $rec[2] . '<br/>';
			$ret.= "pstep:" . $rec[3] . '<br/>';
			$ret.= "pstate:" . $rec[4] . '<br/>';
			$ret.= "pobj:" . $rec[5] . '<br/><hr/>';
		}	
		
		return ($ret); 		
	}		
		
		
	//misc	
	public function getProcessName() {
		return $this->$processName;
	}	
	
	protected function isLevelUser($level=1) {
		return ($this->seclevid >= $level) ? true : false;
	}	
	
	protected function validateUser($level=1) {
		//sql validation
		//...
	}	
	
	protected function loadLoginForm($event=null) {

		if (defined('CMSRT_DPC')) {
			//$ret = 'Load form:login';
			//$ret.= _m("cmsrt.select_template use login+1"); //cp path
			$tokens[] = GetGlobal('sFormErr');
			$ret.= _m('cmsrt._ct use qlogin+' . serialize($tokens));
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