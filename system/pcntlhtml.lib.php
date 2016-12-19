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

	var $mytime;
	var $myaction;
	var $languange;
	var $code;
	var $myactive;
	var $file_name,$file_path,$file_extension;
	var $data,$fpdata;
	var $root_page; 
	var $debug;
	var $fp,$lan,$cl;
	var $sysauth;
	var $local_security;
	var $preprocessor, $preprocess;     

	public function __construct($code=null,$preprocess=null,$locales=null) { 
	
		session_start(); 
		$this->mytime = $this->getthemicrotime();    
		$xtime = $this->getthemicrotime(); 		
		date_default_timezone_set('Europe/Athens');
   
		$this->root_page = paramload('SHELL','filename');
		$this->debug = paramload('SHELL','debug');
		
		$this->_loadinifiles(); 
	  
		controller::__construct('ON');//yes dac,no dacpost...	
	  
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
	 
		$this->local_security = array();
		$this->code = $code;		  
		$this->myaction = null;
		$this->my_excluded_action = null;
		
		//register self as global controller and dispatcher
		SetGlobal('controller',$this);
		SetGlobal('dispatcher',$this);		
		
		$this->_loadapp();
		
		if ($this->debug) 
			echo "<!-- construct elapsed: ".$this->getthemicrotime() - $xtime . " sec -->"; 
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
	  
		$this->preprocessor = new CCPP($config);	  
    }  	
   
	protected function _loadapp() {
		if (!isset($this->code)) return null;
		
		$this->init();  
	  
		//pre-defined in page locales
		if (isset($locales)) $this->localize($locales);	  

		$etime = $this->getthemicrotime();
		if ($this->my_excluded_action)
			$this->event($this->my_excluded_action);	 
		else
			$this->event($this->myaction);
		
		if ($this->debug) 
			echo "<!-- event elapsed: " . $this->getthemicrotime() - $etime . " sec -->"; 		 	  
    } 
	
	//overwrite
	public function init($c=null) {      
   
		$t = new ktimer;
	  
		$t->start('compile',1);		  
		$modules = $this->compile(); 
		$t->stop('compile');
		if ($this->debug) 
			echo "<!-- compile " . $t->value('compile') . ' sec -->';  	  
	
		//NO NEED POST CODE...
		/*$t->start('postcode',1);	  
		$this->read_post_code(); //get batch readed post code as array to call after...
		$t->stop('postcode');	  
		echo "postcode " , $t->value('postcode');	  */
	  
		//INCLUDE FIRST
		$t->start('include');	
		if (!empty($modules)) {   	  
		foreach  ($modules as $id=>$dpc) {
	  
			if ( (!defined($dpc)) && ($this->seclevel($dpc)) ) {
				define($dpc,true);
				$modules_to_start[] = $dpc;

				//post construct code
				if (is_array(GetGlobal('__POSTCODE'))) {		 
					$construct_function = create_function("$dpc",$this->get_code_of('construct',$dpc));
					$construct_function($dpc);		    
				}
			}   
		}
		}//empty
		$t->stop('include');
		if ($this->debug) 
			echo "<!-- include " . $t->value('include') . ' sec -->';	 	   	 
   
		//INSTANCE PROJECT CASE
		/*$is_instance = paramload('ID','isinstance');
		if ($is_instance) //must be include the clientdpc module
			$cdpc = new clientdpc;	*/	  

		//dispacth or redirect...
		//$this->myaction = $this->_getqueue(); 	

		if (is_array($modules_to_start)) {
			$t->start('new');			  
			foreach  ($modules_to_start as $id=>$dpc) {

				/*if (is_object($cdpc)) {
		   
					if ($cdpc->is_client_dpc($dpc))
						$this->_new($dpc,'dpc');   
					else {
						session_start();
						session_unset();
						session_destroy();//kill the session
						die("$dpc not supported or expired!");
					}  
				}
				else*/
					$this->_new($dpc,'dpc');     
			}	 	 
			$t->stop('new');
			if ($this->debug) 
				echo "<!-- initialize (new) " . $t->value('new') . ' sec -->';	
	    }  	    	
    }	
	
    //overwrite..
    private function compile($code='', $preprocess=0) {   

        if ($this->preprocess==true) {

			$code = $this->preprocessor->execute($this->code, 0, true);
			//echo $code;
			/*eval('?><?php;'.$mcode.'?><?php ');// . '----<br/>';	*/
			//echo 'CCPP';
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
			     case 'system': //include and load a set of system lib dpc
				                $syslibs = explode(",",$part[1]);
						        //print_r($syslibs);
								foreach ($syslibs as $lid=>$lib) {
								  if (strstr($lib,'.')) 
								    $this->calldpc($lib,'lib');//if . exist select from a spec dir
								  else 
								    $this->calldpc("system.$lib",'lib'); //else libs dir = default
								}		 
				                break;			   
			   
			     case 'use'   : //include and load a set of lib dpc
				                $libs = explode(",",$part[1]);
						        //print_r($libs);
								foreach ($libs as $lid=>$lib) {
								  if (strstr($lib,'.')) 
								    $this->calldpc($lib,'lib');//if . exist select from a spec dir
								  else 
								    $this->calldpc("libs.$lib",'lib'); //else libs dir = default
								}		 
				                break;
				
				 case 'super' :	//include and load a set of dpc		
				                $dpcs = explode(",",$part[1]);
						        //print_r($dpcs);
								foreach ($dpcs as $did=>$dpc) {
								  if (strstr($dpc,'.')) $this->calldpc($dpc,'dpc');
								                   else $this->calldpc("$dpc.$dpc",'dpc');//same name for dir + class
								}		 
				                break;		
								
				 case 'include' ://include NOT load a set of dpc		
				                $dpcs = explode(",",$part[1]);
						        //print_r($dpcs);
								foreach ($dpcs as $did=>$dpc) {
								  if (strstr($dpc,'.')) $this->set_include($dpc,'dpc');
								                   else $this->set_include("$dpc.$dpc",'dpc');//same name for dir + class
								}		 
				                break;	
								
				 case 'instance':if (strstr(trim($part[3]),'.'))		
				                   $this->set_instance($part[3],$part[1],$part[5]);
                                 else //. not exist				 
				                   $this->set_instance(trim($part[3]).".".trim($part[3]),$part[1],$part[5]);													 	
							     break;
								 
			     case 'load_extension' : //include only NOT load a set of extensions dpc
								if (strstr(trim($part[1]),'.')) 
								  $this->set_extension(trim($part[1]),trim($part[3]),1);
								else //. not exist				 
				                  $this->set_extension(trim($part[1]).".".trim($part[1]),trim($part[3]),1);
				                break;	
								
				 case 'security': 
				                  $this->setlevel($part[1],$part[2],str_replace(':',';',$part[3]));
				                  break;									
								
				 case 'member': $dpcmods[] = $part[1];
				                break;		
								
				 case 'dpccode'  : echo $this->execute_dpc_code($part[1]);	break;																	  
				 case 'phpcode'  : echo $this->execute_php_code($part[1]);	break;		
				 
				 case 'private'  ://loads dpc from private dir
				                  $this->set_include($part[1],'dpc',$part[2]);
				                  $dpcmods[] = $part[1];
				                  break; 		 
							  
				 case 'public'   : //only include and save dpc modules to load th objects by shell			  
			  		              if ($part[1]) {
								    $this->set_include($part[1],'dpc');
								    //  calldpc_include($part[0],'dpc');	
					                $dpcmods[] = $part[1]; //hold dpc names												 
								  } 
								  break;
								  
				 default         : if ($part[0]) { 
				                     if (substr($part[0], -1)==';') {
									    eval('?><?php;'.$tcmd.'?><?php ');
										//echo '<br/>EVAL:'.$tcmd;	
									  }	
									  else {
										eval('?><?php;'.$tcmd.'; ?><?php ');
									    //echo '<br/>EVAL:'.$tcmd.";";	
									  }	
                                   }
				                
			   }//switch
			   $i+=1; 
			}//foreach
	   
	    }
	    catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), PHP_EOL;
		}
		
	    return ($dpcmods); //return the array of included dpcs 
    }    
   
    public function execute_dpc_code($code) {
   
		$code_cmds = explode(';',$code);
		foreach ($code_cmds as $line=>$cmd) 
			$ret .= GetGlobal('controller')->calldpc_method($cmd,1);//1=no error			
	  
		return ($ret);
    }
   
    public function execute_php_code($code) {

		$ret = eval($code);
		return ($ret);
    }   
	
    protected function _getqueue() {
       //DISABLED IN THIS
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
			echo "<!-- action elapsed: " . $this->getthemicrotime() - $atime .  " sec -->"; 	    
	  
		return ($ret); 	   
	}
   
	protected function pre_render($theme=null,$lan=null,$cl=null,$fp=null) {
      
		if ($this->sysauth) {
			if (($realm = GetParam('AUTHENTICATE')) || ($realm = GetReq('auth')) ||
				($this->get_attribute($this->myactive,$this->myaction,13))) {  
		  
				if (!$realm) 
					$realm = "Generic authendication";  
				$this->authenticate($realm,$this->myaction);
			}	
		}
   
		//change languange
		if (isset($lan)) 
			setlocal($lan);
				
		if ($this->get_attribute($this->myactive,$this->myaction,4)) {			   
		    $this->init();	
			if ($this->debug) 
				echo '<!-- ......re-init..... -->';
		}			  	
	  
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
				$authenticated = GetGlobal('controller')->calldpc_method('rchtaccess.verify_user use '.$_SERVER["AUTH_USER"].'+'.$_SERVER["AUTH_PASSWORD"]);		 
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
	
		//echo $dpc,"\n";
		$argdpc = _DPCPATH_;//paramload('DIRECTIVES','dpc_type');
	  	 
		if ($this->shm) {
			if (GetGlobal('__USERAGENT')=='HTML')
				$includer = "phpdac5://127.0.0.1:19123/" . str_replace(".","/",trim($dpc)) . "." . $type . ".php";
			else
				$includer = "phpdac://" . str_replace(".","/",trim($dpc)) . "." . $type . ".php";  
		}	
		else {
			$_argdpc = $myargdpc?paramload('SHELL','urlpath').$myargdpc:$argdpc;
			//echo $_argdpc,'<>';
			$includer = $_argdpc . "/" . str_replace(".","/",trim($dpc)) . "." . $type . ".php";
		}	
	  
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

		if ($this->shm) {
			if (GetGlobal('__USERAGENT')=='HTML')
				$ret = "phpdac5://127.0.0.1:19123/".$dpc;
			else	  
				$ret = "phpdac://".$dpc;
		}	
		else {
			$path = $cgipath ? $cgipath : _DPCPATH_;  
			$ret = $path . "/" . $dpc;
		}	
		
		return $ret;	
	} 	
    
   
	public function __destruct() {		  
	  
		if ($this->debug) 
			echo "<!-- Time elapsed: " . $this->getthemicrotime() - $this->mytime . " sec -->"; 
		
		controller::__destruct();   
	}
   
}
?>