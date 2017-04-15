<?php
$environment = @parse_ini_file("phpdac5.ini");
$dpcpath = $environment['dpcpath'] ? $environment['dpcpath'] : 'dpc';

define(_APPNAME_,$environment['appname']);
define(_APPPATH_,$environment['apppath']);
define(_DPCTYPE_,$environment['dpctype']);
define(_PRJPATH_,$environment['prjpath']);
define(_DPCPATH_,$dpcpath);
define(_ISAPP_,$environment['app']); 

require_once("system.lib.php");	
require_once("parser.lib.php");
require_once("ktimer.lib.php");
require_once("azdgcrypt.lib.php"); 	    
require_once("ccpp.lib.php");
require_once("controller.lib.php");

define("PCNTL_DPC",true);
$__DPC['PCNTL_DPC'] = 'pcntl'; 

$__ACTIONS['PCNTL_DPC'][1]='index';
$__ACTIONS['PCNTL_DPC'][2]='default';

$__DPCSEC['_PCNTLADMIN']='9;1;1;1;1;1;1;9;9;9;9';

class pcntl extends controller {

	var $mytime, $myaction, $languange, $code, $myactive;
	var $file_name, $file_path, $file_extension;
	var $data, $fpdata, $root_page, $debug, $sysauth;
	var $fp, $lan, $cl, $local_security;
	var $preprocessor, $preprocess, $startProcess, $processStack;	

	public function __construct($code=null,$preprocess=null,$locales=null) { 

		session_start(); 
		$this->mytime = $this->getthemicrotime();    
		$xtime = $this->getthemicrotime(); 		
		date_default_timezone_set('Europe/Athens');
		
		controller::__construct();		
		
		$this->_loadinifiles(); 
		
		$this->root_page = 'index.php';//paramload('SHELL','filename');		
		$this->debug = false;// paramload('SHELL','debug');			
		//echo $this->root_page,'>',$this->debug;		
	  
		//register this
		$__DPCMEM = GetGlobal('__DPCMEM');		    	 
		$__DPCMEM['PCNTL_DPC'] =  &$this; 
		SetGlobal('__DPCMEM',$__DPCMEM);
	  		  
		$this->file_path = pathinfo($_SERVER['PHP_SELF'],PATHINFO_DIRNAME); 
		if ($this->file_path=="\\") 
			$this->file_path = null;   
		$this->file_info = pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);

		$p = explode (".",$this->file_info);		  
		$this->file_name = $p[0]; 
		$this->file_extension = $p[1];  
	  
		$lan = $locales ? $locales :(getlocal() ? getlocal() : 0);
		setlocal($lan);		 
	        
		//CCPP preprocessor
		$this->preprocess = $preprocess;   	  
	 
	    //process vars
		$this->processStack = array();
	    $this->startProcess = array();
		
		$this->local_security = array();
		$this->code = $code;		  
		$this->myaction = null;
		$this->my_excluded_action = null;
		
		//register self as global controller and dispatcher
		SetGlobal('controller',$this);
		//SetGlobal('dispatcher',$this);			
		
		$this->_loadapp();
		
		if ($this->debug) 
			echo "<!-- construct elapsed " . $this->getthemicrotime() - $xtime . " sec -->"; 	   	  		
	}
	
	protected function _loadinifiles() {
	  
		if (is_readable("config.ini.php")) {//in root	  
			include("config.ini.php");
			$config = @parse_ini_string($conf, 1, INI_SCANNER_NORMAL); 
			include("myconfig.txt.php");
			$myconfig = parse_ini_string($myconf, 1, INI_SCANNER_NORMAL);			
		}	
		elseif (is_readable("cp/config.ini.php")) {//in cp
			include("cp/config.ini.php");
			$config = @parse_ini_string($conf, 1, INI_SCANNER_NORMAL);
			include("cp/myconfig.txt.php");	
			$myconfig = parse_ini_string($myconf, 1, INI_SCANNER_NORMAL);		
		}		
		else
			die("Configuration error, config.ini not exist!");	

		//extra conf
		if (!empty($myconfig))
			$config = array_merge($config, $myconfig); 			
		
		SetGlobal('config',$config);   
	  	  
		//$this->preprocessor = new CCPP($config);
	}  	
   
	protected function _loadapp() {
		if (!isset($this->code)) return null;	
		
		$this->init();  
	  
		//pre-defined in page locales
		if (isset($locales)) 
			$this->localize($locales);	  

		$etime = $this->getthemicrotime();
		if ($this->my_excluded_action)
			$this->event($this->my_excluded_action);	 
		else
			$this->event($this->myaction);
		
		if ($this->debug) 
			echo "<!-- event elapsed " . $this->getthemicrotime() - $etime . " sec -->"; 		 	  
    }
	
	//overwrite
	public function init($c=null) {      
   
		$t = new ktimer;
	  
		$t->start('compile',1);		  
		$modules = $this->compile(); 
		$t->stop('compile');
		if ($this->debug) 
			echo "<!-- compile " . $t->value('compile') . ' sec -->';  	  
	  
		//INCLUDE FIRST
		$t->start('include');	
		if (!empty($modules)) {   	  
		foreach  ($modules as $id=>$dpc) {
	  
			if ( (!defined($dpc)) && ($this->seclevel($dpc)) ) {
				define($dpc,true);
				$modules_to_start[] = $dpc;
				//echo $dpc,'<br/>';
			}   
		}
		}//empty
		$t->stop('include');
		if ($this->debug) 
			echo "<!-- include " . $t->value('include') . ' sec -->'; 	   	 
     

		//dispacth or redirect...
		$this->myaction = $this->_getqueue(); 	
		
		if (is_array($modules_to_start)) {
			
			$t->start('new');			  
			foreach  ($modules_to_start as $id=>$dpc) { 
				$this->_new($dpc,'dpc');     
				//echo $dpc ,'<br/>';
			}	
			$t->stop('new');
			
			if ($this->debug) 
				echo "<!-- initialize (new) " . $t->value('new') . ' sec -->';	
	    }  	    	
    }
	
	private function processStack($dpc, $processes) {
	
		$this->processStack[$dpc] = $processes;
											
		foreach ($processes as $process)
			$this->startProcess[$dpc][] = $process;		
			
		return true;	
	}
	
	public function getProcessStack() {
		return (array) $this->processStack;
	}

    //overwrite..
    private function compile($code='', $preprocess=0) {   

        if ($this->preprocess==true) {
			
            $this->preprocessor = new CCPP(GetGlobal('config'));
			$code = $this->preprocessor->execute($this->code, 0, true);
			
			if ($file = explode(PHP_EOL,$code)) { 
				//clean php tags
				array_pop($file);//last line
				array_shift($file);//first line
			}			
	    }
	    else
			$file = explode(PHP_EOL,$this->code);
  
    
		//clean code by nulls and commends and hold it as array
		foreach ($file as $num=>$line) {
		    if ($trimedline = trim($line)) {
				if ((substr_compare($trimedline, '#',0,1)!=0) && 
				    (substr_compare($trimedline, '/',0,1)!=0)) {
					//echo $trimedline."<br>";
					$lines[] = $trimedline;					
				} 
			}
		}
		//print_r($lines);
		//implode lines because one line may have more than one cmds sep by ;
		$toktext = implode("",$lines);
		//tokenize
		$token = explode(";",$toktext);
        SetGlobal("__COMPILE",serialize($token)); //save the global....			
	   
	    try {	
			//then...read tokens  			
			foreach ($token as $tid=>$tcmd) {
			  
			    $part = explode(' ',$tcmd);
			    switch ($part[0]) {
			     case 'system'	: 	//include and load a set of system lib dpc
									$syslibs = explode(",",$part[1]);
									//print_r($syslibs);
									foreach ($syslibs as $lid=>$lib) {
										if (strstr($lib,'.')) 
											$this->calldpc($lib,'lib');//if . exist select from a spec dir
										else 
											$this->calldpc("system.$lib",'lib'); //else libs dir = default
									}		 
									break;			   
			   
			     case 'use'   	: 	//include and load a set of lib dpc
									$libs = explode(",",$part[1]);
									//print_r($libs);
									foreach ($libs as $lid=>$lib) {
										if (strstr($lib,'.')) 
											$this->calldpc($lib,'lib');//if . exist select from a spec dir
										else 
											$this->calldpc("libs.$lib",'lib'); //else libs dir = default
									}		 
									break;
				
				 case 'super' 	:	//include and load a set of dpc		
									$dpcs = explode(",",$part[1]);
									//print_r($dpcs);
									foreach ($dpcs as $did=>$dpc) {
										if (strstr($dpc,'.')) 
											$this->calldpc($dpc,'dpc');
								        else 
											$this->calldpc("$dpc.$dpc",'dpc');//same name for dir + class
									}		 
									break;		
								
				 case 'include' :	//include NOT load a set of dpc		
									$dpcs = explode(",",$part[1]);
									//print_r($dpcs);
									foreach ($dpcs as $did=>$dpc) {
										if (strstr($dpc,'.')) 
											$this->set_include($dpc,'dpc');
								        else 
											$this->set_include("$dpc.$dpc",'dpc');//same name for dir + class
									}		 
									break;	
								
				 case 'instance':	if ($m = $part[1]) {
										if (strstr($m,'->')) {
											$mp = explode('->',$m);
											$instanceDpc = array_shift($mp);
											if ($this->set_instance(trim($part[3]), $instanceDpc, implode(',',$mp))) {
												$idotDpc = (strstr($instanceDpc, '.')) ? $instanceDpc : 'instance.' . $instanceDpc;
												$dpcmods[] = $idotDpc;
												$this->processStack($idotDpc, $mp);			
											}
										}  
										else {
											if ($this->set_instance(trim($part[3]), trim($part[1]), null))
												$dpcmods[] = 'instance.' . $part[1];
										}
									}	
									break;
								 
			     case 'load_extension' : //include only NOT load a set of extensions dpc
									if (strstr(trim($part[1]),'.')) 
										$this->set_extension(trim($part[1]),trim($part[3]),1);
									else //. not exist				 
										$this->set_extension(trim($part[1]).".".trim($part[1]),trim($part[3]),1);
									break;	
								
				 case 'security':	$this->setlevel($part[1],$part[2],str_replace(':',';',$part[3]));
									break;									
								
				 case 'member'	: 	$dpcmods[] = $part[1];
									break;		
								
				 case 'dpccode' : 	echo $this->execute_dpc_code($part[1]);	break;																	  
				 case 'phpcode' : 	echo $this->execute_php_code($part[1]);	break;		
				 
				 case 'private' :	//loads dpc from private dir
									if ($m = $part[1]) {
										if (strstr($m,'->')) {
											$mp = explode('->',$m);
											$privateDpc = array_shift($mp);
											$this->set_include($privateDpc,'dpc',$part[2]);
											$dpcmods[] = $privateDpc;

											$this->processStack($privateDpc, $mp);			
										}  
										else {
											$this->set_include($part[1],'dpc',$part[2]);
											$dpcmods[] = $part[1];
										}	
									}	
									break; 		 
							  
				 case 'public'  : 	if ($m = $part[1]) {
										if (strstr($m,'->')) {
											$mp = explode('->',$m); 
											$publicDpc = array_shift($mp);
											$this->set_include($publicDpc,'dpc'); 
											$dpcmods[] = $publicDpc;
											
											$this->processStack($publicDpc, $mp);			
										}  
										else {
											$this->set_include($part[1],'dpc');	
											$dpcmods[] = $part[1]; 												 
										}	
									} 
									break;
								  
				 default        : 	if ($part[0]) { 
										if (substr($part[0], -1)==';') {
											eval('?><?php;'.$tcmd.'?><?php ');	
										}	
										else {
											eval('?><?php;'.$tcmd.'; ?><?php ');	
										}	
										//echo '<br/>EVAL:'.$tcmd.";";
									}
				                
			    }//switch
			    $i+=1; 
			}//foreach
	   
	    }
	    catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage() . PHP_EOL;
			throw $e;
		}
		//print_r($dpcmods);
	    return ($dpcmods); //return the array of included dpcs 
    }    
   
    public function execute_dpc_code($code) {
   
		$code_cmds = explode(';',$code);
		foreach ($code_cmds as $line=>$cmd) 
			$ret .= $this->calldpc_method($cmd,1);//1=no error			
	  
		return ($ret);
    }
   
    public function execute_php_code($code) {

		$ret = eval($code);
		return ($ret);
    }   
	
	//page controller :: DISPATCHER
	//if event/action not in executed dpc search other page controller
	//named as event/action or go to parent controller = shell
	//private (called by init after include dpcs)
	protected function _getqueue() {		   
		 
		if (array_key_exists('FormAction',$_POST)) {//POST:formaction
			//if post has & query cut it from post
			$postq = explode('&',$_POST['FormAction']);
			$ret = $postq[0];// $_POST['FormAction'];
		}  
		elseif (array_key_exists('t',$_GET)) {//GET:t
			//$ret = $cmd;
			$t = $_GET['t']; //echo $t,'>';
		  
			if ($t!=null) {//get t
				$ret = $_GET['t'];
			}	
			else {//redirect to root controller-page	  
				$current_page = pathinfo($_SERVER['PHP_SELF']);
				//echo $current_page['dirname'],">>>>",$this->file_path;
				//if is not the root-page-controller
				if ($this->root_page != $current_page['basename']) {

					$page = str_replace($this->file_path."/".$current_page['basename'],
			                      "/".$this->root_page,
								  $this->get_server_url());
					//echo $page;					  
					//extract '?t=' due to re-queue recursive error 					  
					$mypage = substr($page,0,strlen($this->root_page)+1);//echo $mypage; die();
					unset($_GET['t']);			
			  	  
					$this->redirect($_SERVER['HTTP_HOST'] . $mypage);				  
				}
				else 
					$ret = 'index';
			}	
		}  
		else //self name is the standart action 
			$ret = $this->file_name;

		if ($ret) {
		  
			//get the active dpc = this name default
			$this->myactive = $this->active($this->file_name);	  		  
			//if can't handled by standart=filename dpc 
			//print_r($this->get_dpcactions_array($this->myactive));
			if (!@in_array($ret,$this->get_dpcactions_array($this->myactive))) {
		      
				//check if ret can't handled also by ret dpc
				if (!@in_array($ret,$this->get_actions_array($ret))) {
					
					$this->myactive = $this->active($ret);//update myactive dpc			  
					$page = str_replace($this->file_name.".".$this->file_extension,
										$ret.".".$this->file_extension,
										$this->get_server_url());
					$this->redirect($_SERVER['HTTP_HOST'] . $page);
				}
			}	
			//echo $this->myactive,'>>>>';		  
        }
		else { //goto root page
			$page = str_replace($this->file_info,$this->root_page,$this->get_server_url());
			$this->redirect($_SERVER['HTTP_HOST'] . $page);		  
		} 
		
		return ($ret); //final return ret
    }
   	
	//public alias: used by dpcs (like frontpage!)
	public function getqueue() {
   
        return ($this->myaction);
	}	
   	
   
    public function render($theme=null,$lan=null,$cl=null,$fp=null) {      
   
		$atime = $this->getthemicrotime();  
	  	  
		$this->pre_render($theme,$lan,$cl,$fp);
	  
	    $hfp = new fronthtmlpage($fp,null,$appi);  
	    $ret = $hfp->render($this->data);
	    unset($hfp);

		if ($this->debug) 
			echo "<!-- action elapsed " . $this->getthemicrotime() - $atime .  " sec -->";  	    
	  
		return ($ret); 	   
	}
   
	protected function pre_render($theme=null,$lan=null,$cl=null,$fp=null) {
      
		if ($this->sysauth) {
			if (($realm = GetParam('AUTHENTICATE')) || ($realm = GetReq('auth'))/* ||
				($this->get_attribute($this->myactive,$this->myaction,13))*/) {  
		  
				if (!$realm) 
					$realm = "Generic authendication";  
				$this->authenticate($realm,$this->myaction);
			}	
		}
   
		//change languange !!!! gr/ en/ subdir to implement
		if (isset($lan)) 
			setlocal($lan);
				
		/*if ($this->get_attribute($this->myactive,$this->myaction,4)) {			   
		    $this->init();	
			if ($this->debug) 
				echo '<!-- ......re-init..... -->';
		}*/			  	
	  
		//get action
		$this->data = $this->action($this->myaction);     
    }
   
   
	//set security level at runtime
	public function setlevel($modulename,$plafon,$colonvals) {
		$sec2 = GetGlobal('__DPCSEC2'); //alternative array
		$sec2[$modulename] = $plafon . ";" . $colonvals;
		
		SetGlobal('__DPCSEC2',$sec2);
	 
		$this->local_security[$modulename] = $plafon . ";" . $colonvals;
	}
   
	//get security level at runtime
	protected function seclevel($modulename) {
		$levelofsec = decode(GetSessionParam('UserSecID'));
   
		$sec = GetGlobal('__DPCSEC');
		$sec2 = GetGlobal('__DPCSEC2');	 
		if (isset($sec[$modulename])) { 
			$parts = explode(";",$sec[$modulename]);
	 
			if ($parts[$levelofsec+1] >= $parts[0])
				return 1;//allow
			else
				return 0;//deny
		}
	 
		return 1; //default allow
	} 	   
   
	public function locale($alias,$val) {
		$__DPCLOCALE = GetGlobal('__DPCLOCALE');
	  
		if (isset($__DPCLOCALE[$alias])) {
			//echo "Locale ($alias) already defined!";
			return false;
		}  
	  
		$__DPCLOCALE[$alias] = $val;
		SetGlobal('__DPCLOCALE',$__DPCLOCALE);
	  
		return true;
	}
   
	//batch as param in construction (overwritible)
	protected function localize($array) {
		
		if (is_array($array)) {
			$__DPCLOCALE = GetGlobal('__DPCLOCALE');
	  
			foreach ($array as $id=>$val)
				$__DPCLOCALE[$id] = $val;
		
			SetGlobal('__DPCLOCALE',$__DPCLOCALE);
		}		
	}
   
	protected function getthemicrotime() {
   
		list($usec,$sec) = explode(" ",microtime());
		return ((float)$usec + (float)$sec);
	}    
  
	protected function redirect($url) {
   
	}
	
	protected function get_server_url() {
   
	    if (!ereg("Microsoft", $_SERVER["SERVER_SOFTWARE"])) {//APACHE
			$url = $_SERVER['REQUEST_URI'];//seems to be common with IIS ?????	   
	    }     
	    else //IIS
			$url = $_SERVER['URL'];
		 
	    return ($url);	 
    }
   
     
	protected function authenticate($realm,$action=null) {
	 
		if ($verified=GetSessionParam('authverify')==true) 
			return; //already verified!!!!
	 	 
		if ($_SERVER["AUTH_USER"] && $_SERVER["AUTH_PASSWORD"] && ereg("^Basic ", $_SERVER["HTTP_AUTHORIZATION"])) {
			list($_SERVER["AUTH_USER"], $_SERVER["AUTH_PASSWORD"]) = explode(":", base64_decode(substr($_SERVER["HTTP_AUTHORIZATION"], 6)));
		}
		elseif ($_SERVER["AUTH_USER"] && $_SERVER["AUTH_PASSWORD"] && ereg("^NTLM ", $_SERVER["HTTP_AUTHORIZATION"])) {
			list($_SERVER["AUTH_USER"], $_SERVER["AUTH_PASSWORD"]) = explode(":", base64_decode(substr($_SERVER["HTTP_AUTHORIZATION"], 6)));
		}	 
		$authenticated = false;
	 
		if ($_SERVER["AUTH_USER"] || $_SERVER["AUTH_PASSWORD"]) {
	   
			if (!ereg("Microsoft", $_SERVER["SERVER_SOFTWARE"])) {
				$auth_method = 'HTACCESS';
				$authenticated = $this->calldpc_method('rchtaccess.verify_user use '.$_SERVER["AUTH_USER"].'+'.$_SERVER["AUTH_PASSWORD"]);		 
			}	 
			else {
				$auth_method = 'NTLM'; 
				$authenticated = ($_SERVER["AUTH_USER"] == "test" && $_SERVER["AUTH_PASSWORD"] == "123");		 	 
			}
	   	 
			SetSessionParam('authmethod',$auth_method);
			SetSessionParam('authverify',$authenticated);	
		}
	 
		if (!$authenticated) {
	   
			switch ($auth_method) {
				case 'NTLM' : header("WWW-Authenticate: NTLM",false); break;
				case 'HTACCESS':
				default   :header("WWW-Authenticate: Basic realm=\"$realm\"");
			}
	   
			$statico = 1;
	   
			if (ereg("Microsoft", $_SERVER["SERVER_SOFTWARE"])) {
				header("Status: 401 Unauthorized");
			} else {
				header("HTTP/1.0 401 Unauthorized");
				echo "Access denied";
				exit;
			}
		}
	 
		if ($goto = GetReq('redirect'))
			$this->redirect($_SERVER['HTTP_HOST'].'/'.$goto);
	   
		return;   
	}

   
	//override to load dpc from priv dirs
	protected function set_include($dpc,$type,$myargdpc=null) {
		global $__DPC,$__DPCSEC,$__DPCMEM,$__ACTIONS,$__EVENTS,$__LOCALE,$__PARSECOM,
				$__BROWSECOM,$__BROWSEACT,$__PRIORITY,$__QUEUE,$__DPCATTR,$__DPCPROC;	  

		global $activeDPC,$info,$xerror,$GRX,$argdpc; 	 
	
		//echo $dpc,"<br/>";
		$argdpc = _DPCPATH_;//paramload('DIRECTIVES','dpc_type');
	  	 
		$_argdpc = $myargdpc ? paramload('SHELL','urlpath').$myargdpc : $argdpc;
		//echo $_argdpc,'<>';
		$includer = $_argdpc . "/" . str_replace(".","/",trim($dpc)) . "." . $type . ".php";

		try {
			require($includer);	//REQUIRE NOT REQUIRE ONCE DUE TO RE-INIT DPC	
		}
		catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
	  
		//update local table
		$parts = explode(".",trim($dpc)); 
		$class = strtoupper($parts[1]).'_DPC';	  
		$this->make_local_table($class);	  
	} 

	//override
	public function require_dpc($dpc, $cgipath=null) {

		$path = $cgipath ? $cgipath : _DPCPATH_;  
		$ret = $path . "/" . $dpc;
		
		return $ret;	
	} 

	


	//override
    protected function event($event,$dpc_init=null) {  
		if (!$event) return null;
		$__DPCMEM = GetGlobal('__DPCMEM');
		$__DPC = GetGlobal('__DPC');		 
		$__EVENTS = GetGlobal('__EVENTS');		    
		$__DPCPROC = GetGlobal('__DPCPROC');	
		$__DPCID = GetGlobal('__DPCID');	
		
		if (empty($__EVENTS)) return null;
		reset($__EVENTS); //print_r($__EVENTS);		
	   
		//$i = 1;
		//$step = 0;
		//$EVENT_QUEUE = array(); //holds multiple commands	      
	     	 
		foreach ($__EVENTS as $dpc_name => $command) {
			//check if allowed
		    if ((class_exists($__DPC[$dpc_name])) &&
				(seclevel($dpc_name, decode(GetSessionParam('UserSecID'))))) {	
				//check if action included in current dpc	
				if ((is_array($command)) && (in_array($event,$command))) {  
					//echo $dpc_name,$event,"<br>"; 		   
					$__DPCMEM[$dpc_name]->event($event);

					if (method_exists($__DPCMEM[$dpc_name],'processEvent')) {
						try {
							$__DPCMEM[$dpc_name]->processEvent($event);
							//echo $dpc_name ." has  processEvent method<br/>";
						}	
						catch(Exception $e){
							echo 'Process Exception:' . $e->getMessage();
							throw $e;
						}
					}				
		        }
			}  
		}

		return 0;   
    }	
	
	//override
    protected function action($action) {  
		if (!$action) return null;
	    $__DPCMEM = GetGlobal('__DPCMEM');
	    $__DPC = GetGlobal('__DPC');		 
        $__DPCPROC = GetGlobal('__DPCPROC');		    
        $__ACTIONS = GetGlobal('__ACTIONS');	
        $__DPCID = GetGlobal('__DPCID');			   	   		   	

		if (empty($__ACTIONS)) return null;
		reset($__ACTIONS);
		$ret = null;
		
		foreach ($__ACTIONS as $dpc_name => $command) {		
			//check if allowed
			if ((class_exists($__DPC[$dpc_name])) &&
			    (seclevel($dpc_name,decode(GetSessionParam('UserSecID'))))) {
				//check if action included in current dpc
				if ((is_array($command)) && (in_array($action,$command))) { 
   		       		//echo $dpc_name,$action,"<br>"; 
					$ret .= $__DPCMEM[$dpc_name]->action($action);  	 	    
				}
			} 
	    }	 
			   
		return ($ret); 	   	      
    }		
	
	
	//override
	protected function _new($dpc,$type) {
		global $__DPC,$__DPCSEC,$__DPCMEM,$__ACTIONS,$__EVENTS,$__LOCALE,$__PARSECOM,
				$__BROWSECOM,$__BROWSEACT,$__PRIORITY,$__QUEUE,$__DPCATTR,$__DPCPROC;	  
		global $activeDPC,$info,$xerror,$GRX,$argdpc; //IMPORTANT GLOBALS!!!
		global $__DPCOBJ; 
		global $__DPCID; 
	  
		$__DPCMEM = GetGlobal('__DPCMEM');
		$__DPC = GetGlobal('__DPC');
	  
		//START THE OBJECT
		$parts = explode(".",trim($dpc)); 
		$class = strtoupper($parts[1]).'_DPC';
	  
		//update local table
		$this->make_local_table($class);
		
		//print_r($this->startProcess);
		//echo $dpc,'>',$class;
		if (defined($class)) {
			
			//echo '<br/>>>>',strtoupper($parts[1]),'_DPC','=',$__DPC[strtoupper($parts[1]).'_DPC'];
			//print_r($this->startProcess);
			
			$processChain = array();
			foreach ($this->startProcess as $inDpc=>$processArray) {
				if ($inDpc==$dpc) {
					foreach ($processArray as $process)
						$processChain[] = $process;	
				}	
			}	
			//print_r($processChain);
			if (!empty($processChain))
				$pchain = implode(',',$processChain);

			//echo '<br/>' . $dpc . ':' . $pchain;
			if (class_exists($__DPC[$class])) {
				$__DPCMEM[$class] =  & new $__DPC[$class]($pchain);
				$__DPCOBJ[$dpc] =  & $__DPCMEM[$class];//alias of new name object array
				$__DPCID[$class] = $dpc; //new name index array		 
				SetGlobal("_DPCMEM",$__DPCMEM);
				return true;
			}
			elseif (is_string($__DPCMEM[$class])) {  //string class , instance
				//echo '<br/>>>>',strtoupper($parts[1]),'_DPC','=',$__DPC[strtoupper($parts[1]).'_DPC'];
				//echo $__DPCMEM[$class];
				@eval($__DPCMEM[$class]);
				
				$__DPCMEM[$class] =  & new $__DPC[$class]($pchain);
				$__DPCOBJ[$dpc] =  & $__DPCMEM[$class];//alias of new name object array
				$__DPCID[$class] = $dpc; //new name index array		 
				SetGlobal("_DPCMEM",$__DPCMEM);
				return true;
			}
			else {}
		}	  
	
		return false; 	  		
	}	

	//override
	protected function set_instance($dpc,$instname,$p=null) {
		global $__DPC,$__DPCSEC,$__DPCMEM,$__ACTIONS,$__EVENTS,$__LOCALE,$__PARSECOM,
				$__BROWSECOM,$__BROWSEACT,$__PRIORITY,$__QUEUE,$__DPCATTR,$__DPCPROC;	  

		global $activeDPC,$info,$xerror,$GRX,$argdpc; 	
	  
		$__DPC = GetGlobal('__DPC');	  
	  
		$parts = explode(".",trim($dpc)); 
		$parentclass = strtoupper($parts[1]).'_DPC';	 
		$idpc =  $__DPC[$parentclass];	
	  
		//if parent class not exist load it!
		if (!class_exists($idpc)) {
			$this->calldpc($dpc,'dpc');
			//$__DPC = GetGlobal('__DPC');//re-loadit afer include	
			//$idpc =  $__DPC[$parentclass];	  
		}		
	  
		if (class_exists($idpc)) {
	        //create instance as string extending a defined class 
			$x  = "class $instname extends $idpc" . ' {';
			$x .= "function __construct(\$p=null) {";
			$x .= "parent::__construct(\$p);";  	
			$x .= '}';
			$x .= '};';
	  
			//echo $x;
			//@eval($x); //moved at _new
			
			$iclass = strtoupper($instname).'_DPC';
			define($iclass,true); //define instance
			
			$__DPCMEM[$iclass] = $x;
			$__DPCID[$iclass] = $instname;				
			$__DPC[$iclass] = $instname;
			
			//$i = new $instname($p); //moved at _new
	
			return true;
		}
		//else
			//die("Error: There is not [$dpc] class to extend!");    	  
		
		return false;
	}	
   
	public function __destruct() {		  
	  
		if ($this->debug) 
			echo "<!-- Time elapsed " . $this->getthemicrotime() - $this->mytime . " sec -->"; 
		controller::__destruct();   
	}
   
}
?>