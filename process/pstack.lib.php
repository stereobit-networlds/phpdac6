<?php
namespace Process;

class pstack {
	
	protected $debug, $db, $pMethod, $user, $seclevid;
	protected $caller, $callerName, $processName; 
	protected $pid, $clp;
	
	static $formStack;
	
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

		self::$formStack = array();	
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
		
		//check if stack is already running (sid)
		/*$cSQL = "select sid from pstackrun where sid='$sid' LIMIT 1";
		$res = $db->Execute($cSQL);
		if ($res->fields[0]) return false; 		
		*/
		//put initial record indicates stack running id
		$sSQL = "insert into pstackrun (rid,sid,puser) values (";
		$sSQL.= "'$rid','$sid','{$this->user}')";
		$db->Execute($sSQL);
		
		//sendmail
		$mailbody = $this->getPageLink($rid,false,$pname);
		$subject = $pname. ':'. $rid;
		$this->mailto('sales@stereobit.gr','b.alexiou@stereobit.gr',$subject,$mailbody);		

		return ($rid); 
	}
	
	//update running stack step
	protected function stackRunSave($state, $chainid, $stackid) {
		$db = GetGlobal('db');
		$stack =  GetGlobal('controller')->getProcessStack();
		if (empty($stack)) return false;
		
		if (!$rid = $this->pid) return false; //not an run id
		$sid = md5(serialize($stack) .'|'. $this->pMethod);		

		//check if stack is registered
		$cSQL = "select sid from pstack where sid='$sid' LIMIT 1";
		$res = $db->Execute($cSQL);
		if (!$res->fields[0]) return false; 
		
		//check if stack is running (rid)
		$cSQL = "select rid from pstackrun where rid='$rid' LIMIT 1";
		$res = $db->Execute($cSQL);
		if (!$res->fields[0]) return false; 		
		
		//in case of puzzled method may need to not save (act as history)
		if (!$this->stackRunIsSaved($state, $chainid, $stackid)) {
			//put step record
			$sSQL = "insert into pstackrun (rid,sid,sstep,pstep,pstate,pobj,puser) values (";
			$sSQL.= "'$rid','$sid','$stackid','$chainid','$state','{$this->callerName}','{$this->user}')";
			$db->Execute($sSQL);
			//if affected rows return true
			
			//check for closed stack after runsave
			$ret = $this->isClosedStack();
		}
		
		return (true); 
	}	
	
	//not to rewrite in db
	protected function stackRunIsSaved($state, $chainid, $stackid) {
		$db = GetGlobal('db');		
		$stack =  GetGlobal('controller')->getProcessStack();
		if (empty($stack)) return false;
		
		if (!$rid = $this->pid) return false; //not an run id
		$sid = md5(serialize($stack) .'|'. $this->pMethod);
		
		$sSQL = "select rid from pstackrun ";
		$sSQL.= "where rid='$rid' and sid='$sid' and sstep=$stackid and pstep=$chainid ";
		$sSQL.= "and pstate=$state and pobj='{$this->callerName}' and puser='{$this->user}'";
		//echo $sSQL;
		$res = $db->Execute($sSQL);		
		
		return ($res->fields[0]) ? true : false;
	}
	
	//check all stack records
	protected function isClosedStack() {
		$db = GetGlobal('db');		
		$stack =  GetGlobal('controller')->getProcessStack();
		if (empty($stack)) return false;		
		
		if (!$rid = $this->pid) return false; //not a run id
		$sid = md5(serialize($stack) .'|'. $this->pMethod);
		
		if ($this->isRunningProcess())  {
			$stackid = 1;
			foreach ($stack as $caller=>$chain)	{
				//$s[$caller] = $chain;
				$sName = $this->getCallerNameInStack($caller);
				//echo '<br/>',$caller,':',$sName;
				foreach ($chain as $p=>$process) {
					$chainid = $p+1; //inc by 1
					//echo ':',$chainid,':',$process;
					$sSQL = "select rid from pstackrun where rid='$rid' and sid='$sid' ";
					$sSQL.= "and sstep=$stackid and pstep=$chainid and pstate=1 and pobj='$sName'";
					//echo '<br/>',$sSQL;
					$res = $db->Execute($sSQL);					
					if (!$res->fields[0]) return false;
				}
				$stackid+=1;
			}
			
			//put end record
			$sSQL = "insert into pstackend (rid,sid) values ('$rid','$sid')";
			$db->Execute($sSQL);
			
			//sendmail to process owner
			$this->processMail($rid .' is closed', $this->showProcess(null,99), true);
			
			//fire-up another instance of stack (repeat)
			if ($rid = $this->stackRun()) {
				//sendmail
				//$mailbody = $this->getPageLink($rid, false,$pname);
				//$subject = $pname. ':'. $rid;
				//$this->mailto('sales@stereobit.gr','b.alexiou@stereobit.gr',$subject,$mailbody);
			}
			
			return true;
		}
		
		return false;	
	}	
	
	//process
	
	protected function getProcessName() {
		return $this->processName;
	}	
	
	protected function getProcessStepName() {
		return $this->processStepName;
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

	//check pstackend table
	protected function isClosedProcess() {
		$db = GetGlobal('db');	
	
		//check if id is an ended process
		$cSQL = "select rid from pstackend where rid='{$this->pid}' LIMIT 1";
		$res = $db->Execute($cSQL);
		if ($res->fields[0]) 
			return ($res->fields[0]);

		return false; 	
	}		

	protected function showProcess($pid=null,$limit=1) {
		$db = GetGlobal('db');	
		$rid = $pid ? $pid : $this->pid;
	
		//fetch last running process record
		$pSQL = "select datein,sid,sstep,pstep,pstate,pobj,puser from pstackrun where rid='$rid' order by id DESC LIMIT $limit";
		$res = $db->Execute($pSQL);
		
		foreach ($res as $i=>$rec) {
			
			if ($this->isProcessUser($rec[6])) {
				$ret.= "date:" . date('d-m-Y h:i:s',strtotime($rec[0])) . '<br/>';
				$ret.= "sid:" . $rec[1] . '<br/>';
				$ret.= "sstep:" . $rec[2] . '<br/>';
				$ret.= "pstep:" . $rec[3] . ' (' . $this->getProcessById($rec[2], $rec[3]) . ')<br/>';
				$ret.= "pstate:" . $rec[4] . '<br/>';
				$ret.= "pobj:" . $rec[5] . '<br/>';
				$ret.= "puser:" . $rec[6] . '<br/><hr/>';
			}
			else
				$ret.= "another user<br/><hr/>";
		}	
		
		return ($ret); 		
	}	
	
	protected function showOpenProcess() {
		$db = GetGlobal('db');	
			
		//fetch open running process record
		$pSQL = "select datein,rid,sid,sstep,pstep,pstate,pobj,puser from pstackrun ";
		$pSQL.= "where rid NOT IN (select rid from pstackend) ";
		$pSQL.= "AND puser='{$this->user}' order by id DESC";
		$res = $db->Execute($pSQL);
		//echo $pSQL;
		
		foreach ($res as $i=>$rec) {
			$ret.= "date:" . date('d-m-Y h:i:s',strtotime($rec[0])) . '<br/>';
			$ret.= "rid:" . $rec[1] . '<br/>';			
			$ret.= "sid:" . $rec[2] . '<br/>';
			/*$ret.= "sstep:" . $rec[3] . '<br/>';
			$ret.= "pstep:" . $rec[4] . ' (' . $this->getProcessById($rec[2], $rec[3]) . ')<br/>';
			$ret.= "pstate:" . $rec[5] . '<br/>';
			$ret.= "pobj:" . $rec[6] . '<br/>';*/
			$ret.= "puser:" . $rec[7] . '<br/><hr/>';
		}	
		
		return ($ret); 		
	}	
	
	protected function showClosedProcess() {
		$db = GetGlobal('db');	
	
		//fetch closed process record
		$pSQL = "select datein,rid,sid,sstep,pstep,pstate,pobj,puser from pstackrun ";
		$pSQL.= "where pobj IS NULL AND rid IN (select rid from pstackend) ";
		$pSQL.= "AND puser='{$this->user}' order by id DESC";
		$res = $db->Execute($pSQL);
		//echo $pSQL;
		
		foreach ($res as $i=>$rec) {
			$ret.= "date:" . date('d-m-Y h:i:s',strtotime($rec[0])) . '<br/>';
			$ret.= "rid:" . $rec[1] . '<br/>';			
			$ret.= "sid:" . $rec[2] . '<br/>';
			/*$ret.= "sstep:" . $rec[3] . '<br/>';
			$ret.= "pstep:" . $rec[4] . ' (' . $this->getProcessById($rec[2], $rec[3]) . ')<br/>';
			$ret.= "pstate:" . $rec[5] . '<br/>';
			$ret.= "pobj:" . $rec[6] . '<br/>';*/
			$ret.= "puser:" . $rec[7] . '<br/><hr/>';
		}	
		
		return ($ret); 		
	}	
	
	protected function getProcessById($stackid=1, $chainid=1) {
		$stack = (array) GetGlobal('controller')->getProcessStack();
		$sid = 0;
		$cid = 0;
		foreach ($stack as $stackName=>$processChain) {
			if ($sid==$stackid-1) {
				foreach ($processChain as $process) {
					if ($cid==$chainid-1)
						return $process;
					$cid+=1;
				}
			}
			$sid+=1;
		}
		
		return $chainid;		
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
	
	//get the fire-up user
	protected function getProcessOwner() {
		$db = GetGlobal('db');	

		//check if there is startup running record
		$cSQL = "select puser from pstackrun where pobj IS NULL AND rid='{$this->pid}' LIMIT 1";
		$res = $db->Execute($cSQL);
		if ($res->fields[0]) 
			return ($res->fields[0]);
		
		return false; 
	}	

	//get the users included in ulist named as process step name
	protected function isProcessUser($user=null) {
		$db = GetGlobal('db');	
		$u = $user ? $user : $this->user;
		//test
		return 'vasalex21@gmail.com';
		
		if (!filter_var($u, FILTER_VALIDATE_EMAIL))
			return false;

		$cSQL = "select email from ulists where listname='{$this->processStepName}'";
		$res = $db->Execute($cSQL);
		
		foreach ($res as $i=>$rec) {
			if (strstr($u, $rec[0])==0)
				return true;
		}
		
		return false; 
	}	
	
	//ulist named as process mail send
	protected function processMail($subj=null, $body=null, $to=false) {	
		$db = GetGlobal('db');	
		$rid = $this->pid;
		$from = 'sales@stereobit.gr';
		$mailbody = $body ? $body : $this->getPageLink($rid,false,$pname);		
		$subject = $subj ? $subj : $pname .':'. $rid; 
		
		if ($to) {
			if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
				$toProcessOwner = $this->getProcessOwner();
				$err = $this->mailto($from,$toProcessOwner,$subject,$mailbody);
			}
			else	
				$err = $this->mailto($from,$to,$subject,$mailbody);
		}
		//else
		//check if mails exist for the process as ulist step name
		$cSQL = "select email from ulist where listname='{$this->processStepName}'";
		$res = $db->Execute($cSQL);
		foreach ($res as $i=>$rec) {
			//sendmail
			$err.= $this->mailto($from,$rec[0],$subject,$mailbody);
		}

		return (!$err) ? true : false; 	
	}	
	
	//misc		
	
	protected function isLevelUser($level=1) {
		return ($this->seclevid >= $level) ? true : false;
	}
	
	protected static function setFormStack($form=null) {
		//$this->formStack[] = $this->loadForm($event);
		//self::$formStack[] = $form; //$this->callerName .'.'. $this->processStepName . ($event ? '.'.$event : null);
		//$fs = GetGlobal('fs');
		global $fs;
		$fs[] = $form;

		return true;
	}
	
	protected static function getFormStack() {
		//if (empty(self::$formStack)) return null;
		//$fs = GetGlobal('fs');
		global $fs;
		if (empty($fs)) return null;
		//echo 'FormStack:<br/>';
		//foreach (self::$formStack as $form) {
		foreach ($fs as $form) {	
			//echo $form . '<br/>';
			$ret .= self::loadForm($form);
		}	
			
		return ($ret);
	}	
	
	protected static function loadForm($formName=null) {
		if (!$formName) return null;
		//$e = $event ? $event : null;
		//$formName = $this->callerName .'.'. $this->processStepName . ($event ? '.'.$event : null);	

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
		//return $f;
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

	protected function mailto($from=null,$to=null,$subject=null,$body=null) {

		if (defined('CMSRT_DPC')) {

			$err = _m("cmsrt.cmsmail use $from+$to+$subject+$body");
			return true;
		}
		elseif (defined('SMTPMAIL_DPC')) { 
		
	        $smtpm = new smtpmail;
		   
		    $smtpm->to($to); 
		    $smtpm->from($from); 
		    $smtpm->subject($subject);
		    $smtpm->body($body);	
			
			$err = $smtpm->smtpsend();		
			
			return true;
		}	
		
		return false;
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

	protected function getPageLink($rid=null, $url=false, &$processName=null) {
		$httpurl = (isset($_SERVER['HTTPS'])) ? 'https://' : 'http://';
		$httpurl.= (strstr($_SERVER['HTTP_HOST'], 'www')) ? $_SERVER['HTTP_HOST'] : 'www.' . $_SERVER['HTTP_HOST'];		
		$u = $url ? $url : $httpurl;//"http://www.stereobit.gr/";
		$n = pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);
		$p = explode('.', $n);
		
		if (strstr($p[0],'_')) {
			$pn = explode('_', $p[0]);
			$processName = localize($pn[1], getlocal());
			
			$link = $u . '/p/'. $pn[1] .'/';
			$link.= $rid ? $rid .'/' : null;
			return $link;
		}
		
		$processName = localize(array_shift($p), getlocal());
		$link = $u . '/process/';
		$link.= $rid ? $rid .'/' : null;		
		
		return ($link); 
 	}
	
	protected function getPageProcessName($rid=null, $url=false) {
		$u = $url ? $url : "http://www.stereobit.gr/";
		$n = pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);
		$p = explode('.', $n);
		
		if (strstr($p[0],'_')) 
			return localize($pn[1], getlocal());
			
		return localize(array_shift($p), getlocal());
 	}	
}
?>