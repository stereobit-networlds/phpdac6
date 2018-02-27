<?php
	//spl_autoload_register('agentds::ClassLoader');
	//spl_autoload_register('agentds::LibraryLoader');

	define ("GLEVEL", 1); 

	function _($str, $level=0, $crln=true) {
	    global $glevel;
	    $cr = $crln ? PHP_EOL : null;
		if ($level<=$glevel)
			echo ucfirst($str) . $cr;
		
		_dump(date ("Y-m-d H:i:s :").$str.PHP_EOL,'a+');
	}
   
	function _dump($data=null,$mode=null,$filename=null) {
	   $m = $mode ? $mode : 'w';
	   $f = $filename ? $filename : '/dumpagn-'.$_SERVER['COMPUTERNAME'].'.log';

        if ($fp = @fopen (getcwd() . $f , $m)) {
            fwrite ($fp, $data);
            fclose ($fp);
            return true;
        }
        return false;
	}   
   
class agentds {

   var $daemon_ip, $daemon_port, $daemon_type;
   var $dmn, $agent;
   
   var $agn_mem_type = 0;//shared 1 vs convensional
   var $agn_mem_store;
   
   var $shm_id, $agn_shm_id;
   var $agn_addr, $agn_length;
   var $shared_buffer;
   var $agn_attr;
   
   //environment vars
   var $env, $verboseLevel, $promptString;

   var $active_agent,$active_o_agent; 
   var $resources,$timer,$scheduler;
   
   var $gtk, $gtkds_conn;//handle gtkds connection
   var $window, $agentbox;  
   var $echoLevel, $ldscheme, $argbatch;
   public static $ldschemeS;   

   function __construct($dtype,$ip='127.0.0.1',$port='19125',$dacip='127.0.0.1',$dacport='19123') { 
	  $argc = $GLOBALS['argc'];
	  $argv = $GLOBALS['argv'];
	  //print_r($argv);
	  
	  $this->shm_id= null;
	  $this->agn_shm_id = null;
	  $this->agn_attr = array();
	  $this->agn_length = array();
	  $this->shared_buffer = null;
	  
	  $this->verboseLevel = GLEVEL;	  
	  $this->agent = 'SH';//default

	  //argv1 is daemon type -param or batchfile .ash
	  $this->argbatch = (substr($argv[1],0,1)!='-') ? $argv[1].'.ash' : '';
	  $this->daemon_type = (substr($argv[1],0,1)=='-') ? substr($argv[1],1) : ''; //$dtype
	  
	  $this->daemon_ip = $argv[2] ? $argv[2] : '127.0.0.1';//$ip;//'192.168.4.203';
	  $this->daemon_port = $argv[3] ? $argv[3] : '19125';//$port;//19123;
	  _("Phpagn5 client at $this->daemon_ip:$this->daemon_port");	  
	  
	  //dac server	
	  $this->phpdac_ip = $argv[5] ? $argv[5] : '127.0.0.1';//$dacip;
	  $this->phpdac_port = $argv[6] ? $argv[6] : '19123';//$dacport; 
	  _("Phpdac5 server at $this->phpdac_ip:$this->phpdac_port"); 
	    
 	  //REGISTER PHPDAC (client side)protocol.  
      require_once("system/dacstreamc.lib.php");			
	  //require_once($this->ldscheme . "/system/dacstreamc.lib.php"); 
	  $phpdac_c = stream_wrapper_register("phpdac5","c_dacstream");
	  if (!$phpdac_c) {
		  _("Client dac protocol failed to registered!");
		  die();
	  }	  
	  else _("Client dac protocol registered!");
	  
	  $this->ldscheme = "phpdac5://{$this->phpdac_ip}:{$this->phpdac_port}";
	  self::$ldschemeS = "phpdac5://". ($argv[5] ? $argv[5] : '127.0.0.1') .":". ($argv[6] ? $argv[6] : '19123');	
				
 	  //REGISTER PHPAGN (client side,interconnections) protocol.
      //require_once("agents/agnstreamc.lib.php");			
	  require_once($this->ldscheme . "/agents/agnstreamc.lib.php"); 
	  $phpdac_c = stream_wrapper_register("phpagn5","c_agnstream");
	  if (!$phpdac_c) {
		  _("Client agent protocol failed to registered!");
		  die();
	  }	  
	  else _("Client agent protocol registered!"); 	

 	  //REGISTER PHPRES (client side,resources) protocol.
      //require_once("agents/resstream.lib.php");			
      require_once($this->ldscheme . "/agents/resstream.lib.php"); 
	  $phpdac_c = stream_wrapper_register("phpres5","c_resstream");
	  if (!$phpdac_c) {
		  _("Client resource protocol failed to registered!");
		  die();
	  }	  
	  else 
		  _("Client resource protocol registered!"); 
				 				 
	  //INITIALIZE ENVIRONMENT
	  //var_dump($_SERVER);
	  //clear log
	  unlink('dumpagn-'.$_SERVER['COMPUTERNAME'].'.log');
		  
	  $this->env['name'] = $_SERVER['COMPUTERNAME'];  			 
	  $this->env['os'] = $_SERVER['OS'];	  
	  $this->env['domain'] = $_SERVER['USERDNSDOMAIN'];				 
	  $this->env['appdata'] = $_SERVER['APPDATA'];	  
	  $this->env['homepath'] = $_SERVER['HOMEPATH'];	  	
	  $this->env['host'] = $_SERVER['REMOTE_ADDR'];  
	  //var_dump($this->env);	

	  $this->promptString = 'phpagn5>';	
	  $this->echoLevel = 1;     	  
	  
	  //INITIALIZE AGENTS
	  $this->active_agent = null;
	  $this->active_o_agent = null;	
	  
	  $this->init_agents($this->phpdac_ip,$this->phpdac_port);
	  
	  /* LOADED AS AGENTS...removed from agents.exe as libs include
	  $this->timer = new timer;	
      //register_tick_function(array(&$time,"showtime"),true);	
	  $this->scheduler = new scheduler(&$this);		  			
	  
	  //init resources (loaded as lib agent)
	  $this->resources = new resources($this);	  
	  */		  
			
      //init printer	  
	  //$printer = "FinePrint pdfFactory Pro";
	  $printer = "\\\http://www.e-basis.gr\\e-Enterprise.printer";
	  $printout = @printer_open($printer);//true;
	  if (is_resource($printout) &&
		  get_resource_type($printout)=='printer') {
			  
	    printer_set_option($printout, PRINTER_MODE, 'RAW'); 
		$this->get_agent('resources')->set_resource($printer,$printout);
		_("printer:" . $printer . " connected.",1);
	  }
	  else
		_("printer:" . $printer . " error: Could not connect!",1);  
	  				
						  
	  //(starting at scheduler construction)
      //register_tick_function(array($this->get_agent('scheduler'),"checkschedules"),true);	  
	  //print_r($this->get_agent('scheduler'));
	  
	  //initialize task from already loaded agents (BEWARE TO LOAD THE DEFAULT AGENTS)
      $this->get_agent('scheduler')->schedule('env.show_connections','every','20'); 
  
	  //initialize GTk connector (for calling proc from this ($env) class ...purposes)
	  $this->gtk = ($argv[4]==='-gtk') ? true : false;
	  
	  if ($this->gtk) {
		  require_once($this->ldscheme . "/agents/gtklib.lib.php");  		
		  _("GTK connector loaded!");	  
		  $this->gtkds_conn = new gtkds_connector();
		
		  //////////////////////////////////// gtk win
		  require_once($this->ldscheme . "/agents/gtkds.lib.php");
		  //new gtkds($this,0);//connector init is off ..bellow loaded!		
	  }
	  
      require_once($this->ldscheme . "/agents/daemon.lib.php");
	  $this->startdaemon();  
	  
   }
   
   function destroy() {
	   if ($this->gtk) 
			Gtk::main_quit();
   }   
   
   function startdaemon() {
   
      $this->dmn = new daemon($this->daemon_type,true,$this);//'standalone',false);
	  //$this->dmn = new daemon('inetd',true);
	  //$this->dmn = new daemon('standalone',true);
	  //$this->dmn = new daemon('xyz',true);	  
      $this->dmn->setAddress ($this->daemon_ip);//'127.0.0.1');
      $this->dmn->setPort ($this->daemon_port);
      $this->dmn->Header = "PHPDAC5 Agent v2, at ". $this->env['name'] . ' ' . $this->daemon_ip .':'. $this->daemon_port;

      $this->dmn->start($this->promptString);  //this routine creates a socket	
	  
      $this->dmn->setCommands (array ("help", "quit", "date", "shutdown","echo","silence",
	                                  "ver", "callagent", "uncall", "callagentc", "call", "helo", "run", "net",
									  "create", "destroy", "show", "move", "accept", "print",  
									  "getresource", "getresourcec", "showresources", 
									  "findresource", "findresourcec", "setresource", "delresource",
									  "checkschedules", "showschedules", "setschedule",
									  "who", "http", "startgtk", "system", "batch", "***"));
      //list of valid commands that must be accepted by the server	
	  
      $this->dmn->CommandAction ("help", array($this,"command_handler")); //add callback
      $this->dmn->CommandAction ("quit", array($this,"command_handler")); // by calling 
      $this->dmn->CommandAction ("date", array($this,"command_handler")); //this routine
      $this->dmn->CommandAction ("shutdown", array($this,"command_handler"));
	  
      $this->dmn->CommandAction ("echo", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("silence", array($this,"command_handler"));		  
	  
      $this->dmn->CommandAction ("ver", array($this,"command_handler"));	  	
      $this->dmn->CommandAction ("callagent", array($this,"command_handler"));	
      $this->dmn->CommandAction ("call", array($this,"command_handler"));//alias	    
      $this->dmn->CommandAction ("uncall", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("callagentc", array($this,"command_handler"));//client version quit after		  
      $this->dmn->CommandAction ("helo", array($this,"command_handler"));	
      $this->dmn->CommandAction ("run", array($this,"command_handler"));
      $this->dmn->CommandAction ("net", array($this,"command_handler"));	  

      $this->dmn->CommandAction ("create", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("destroy", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("show", array($this,"command_handler"));
      $this->dmn->CommandAction ("move", array($this,"command_handler"));
      $this->dmn->CommandAction ("accept", array($this,"command_handler"));	  	  	  	
      $this->dmn->CommandAction ("print", array($this,"command_handler"));		  	   
      $this->dmn->CommandAction ("getresource", array($this,"command_handler"));	 	  	  
      $this->dmn->CommandAction ("getresourcec", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("showresources", array($this,"command_handler"));		  
      $this->dmn->CommandAction ("findresource", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("findresourcec", array($this,"command_handler"));			  
      $this->dmn->CommandAction ("setresource", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("delresource", array($this,"command_handler"));		  
      $this->dmn->CommandAction ("checkschedules", array($this,"command_handler"));	
      $this->dmn->CommandAction ("showschedules", array($this,"command_handler"));
	  $this->dmn->CommandAction ("setschedule", array($this,"command_handler"));
      $this->dmn->CommandAction ("who", array($this,"command_handler"));
	  $this->dmn->CommandAction ("http", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("startgtk", array($this,"command_handler"));	  
	  $this->dmn->CommandAction ("system", array($this,"command_handler"));
	  $this->dmn->CommandAction ("batch", array($this,"command_handler"));
	  
	  $this->dmn->CommandAction ("***", array(&$this,"agent_handler"));//handle everyting else...	  
	  
	  //now scheduler job
	  //$this->dmn->RegisterAction(array(&$this,'timer'));
	   
	  //dispatch batch
	  $this->exebatchfile($this->dmn, $this->argbatch, true);
	  
	  //listen
      $this->dmn->listen(1); 	    	       
   }
   
   private function exebatchfile(&$dmn,$file=null,$w=false) {
	    if ((!$file) || ($file=='.ash')) //empty argbatch 
			$file = 'init.ash';
		
		$batchfile = getcwd() . DIRECTORY_SEPARATOR . $file; 
		
		if ((is_readable($batchfile)) && ($f = @file($batchfile))) {
			
			if ($w)
			  _('Init batch file: ' . $batchfile);			
			
			if (!empty($f)) {
		      foreach ($f as $command_line) {
				if (trim($command_line)) {
					 //echo "-" . $command_line;
                     $dmn->dispatch($command_line,null);
                }
		      }		  
			}
			return true;	
		}
		return false;
   }   
   
   //general purpose commands
   public function command_handler ($command, $arguments, $dmn) {
   
     switch ($command) {
        case 'HELP':
                //commands are converted to uppercase by default. If you want to
                //disable this, look into tokenise().
                $commands = implode (' ', $dmn->valid_commands);
                $dmn->Println ('Valid Commands: ');
                $dmn->Println ($commands);
                return true;
                break;
        case 'QUIT':
		        $dmn->changePrompt();
				
				//only in inetd mode
				if ($this->daemon_type=='inetd') $this->shutdown();
                return false;
                break;
        case 'DATE':
                $dmn->Println (date ("Y-m-d H:i:s"));
                return true;
                break;
        case 'SHUTDOWN':
		        $dmn->changePrompt();
                $dmn->shutdown ();
				
				$this->shutdown();				
                exit;
                break;
				
        case 'ECHO':
                $dmn->setEcho($arguments[0]);
                return true;
                break;	
				
        case 'SILENCE':
                $dmn->setSilence($arguments[0]);
                return true;
                break;							
				
        case 'VER':
                $dmn->Println (implode(",",$arguments).':shell script engine V0.01 on PHP'.phpversion());
                return true;
                break;						
				
		case 'CALL'     ://alias		
		case 'CALLAGENT'://server version
		        $data = $this->call_agent($arguments[0],$dmn);
		        $dmn->Println ($data);
                return true;
                break;	
				
		case 'UNCALL'://server version
		        $data = $this->uncall_agent($dmn);
		        $dmn->Println ($data);
                return true;
                break;					
				
		case 'CALLAGENTC'://client version ... moves agent from server to client
		        $dmn->setEcho(0);//echo off
				//header from 1st command still appear...must set client silence off				
				$dmn->setSilence(1);//silence off...???
		        $data = $this->call_agentc($arguments[0]);
		        $dmn->Println ($data);
                return false;//and quit
                break;					
				
		case 'HELO':
                return false;
                break;		
				
		case 'RUN':
                return true;
                break;	

		case 'PRINT':
		        $this->prn($arguments[0],$arguments[1]);
                return true;
                break;				
				
		case 'NET':
		        if (method_exists($this,$arguments[0])) {
                  $data = $this->{$arguments[0]}($arguments[1],$arguments[2],$arguments[3]);		
		          $dmn->Println ($data);		        
				}
                return true;
                break;					
				
		case 'SHOW':
		        $dmn->Println($this->show_agents());
                return true;
                break;
				
		case 'CREATE':
		        $data = $this->create_agent($arguments[0],$arguments[1],$arguments[2],$arguments[3]);
		        $dmn->Println ($data);			
                return true;
                break;
				
		case 'DESTROY':
		        $data = $this->destroy_agent($arguments[0]);
		        $dmn->Println ($data);			
                return true;
                break;								
				
		case 'MOVE':
		        $data = $this->move_agentc($arguments[0],$arguments[1]);
		        $dmn->Println ($data);			
                return true;
                break;
				
		case 'ACCEPT':	
		        $data = $this->accept_agentc($arguments[0],$arguments[1],$arguments[2]);
		        $dmn->Println ($data);		
                return true;
                break;																	

		case 'GETRESOURCE' : //this resource
		        $resource = $this->get_agent('resources')->get_resource($arguments[0],$arguments[1]);
		        $dmn->Println ($resource);
				return true;
				//return false;//and quit				
		        break;										
				
		case 'GETRESOURCEC' : //phpdac5 resource
		        //$resource = $this->get_agent('resources')->get_resourcec($arguments[0],$this->phpdac_ip,$this->phpdac_port);
				$resource = file_get_contents($this->ldscheme .'/'. $arguments[0]);
				$dmn->Println ($resource);
				return true;
		        break;
				
		case 'SHOWRESOURCES':
		        $r = $this->get_agent('resources')->showresources();
				$dmn->Println ($r);
                return true;
                break;			
									 						
		case 'FINDRESOURCE':				
		case 'FINDRESOURCEC':
		        $r = $this->get_agent('resources')->findresource($arguments[0],1);
				$dmn->Println ($r);
                return true;
                break;	
				
		case 'SETRESOURCE':
		        $r = $this->get_agent('resources')->set_resource($arguments[0],$arguments[1]);
				$dmn->Println ($r);
                return true;
                break;		
				
		case 'DELRESOURCE':
		        $r = $this->get_agent('resources')->del_resource($arguments[0]);
				$dmn->Println ($r);
                return true;
                break;													
				
		case 'CHECKSCHEDULES':
		        $c = $this->get_agent('scheduler')->checkschedules();
				$dmn->Println ($c);
                return true;
                break;	
				
		case 'SHOWSCHEDULES':
		        $s = $this->get_agent('scheduler')->showschedules();
				$dmn->Println ($s);
                return true;
                break;

		case 'SETSCHEDULE' :
		        $sh = $this->get_agent('scheduler');
				$entry = $sh->schedule($arguments[0],$arguments[1],$arguments[2]);				
				$this->update_agent($sh,'scheduler');
				
				$dmn->Println($entry);
				return true;
		        break;
				
		case 'WHO':
		        $sessions = $this->show_connections(1,$arguments[0]);//$dmn->show_connections();
				$dmn->Println($sessions);
				return true;
		        break;	

		case 'HTTP':
		        $h = $this->httpcl($arguments[0],$arguments[1],$arguments[2]);
				$dmn->Println($h);
				return true;
		        break;					
				
		case 'STARTGTK':
		        if ($this->gtk) {
					_("Starting GTK Console...");
					new gtkds($this,0);
					$dmn->Println($c);
					return true;
				}
				
		        break;	

		case 'SYSTEM': 
				$ret = shell_exec($arguments[0]);	
				$dmn->Println ($ret);
				return true;
				break;

		case 'BATCH': 
				$this->exebatchfile($dmn,$arguments[0]);
				return true;
				break;
        }		
   }  
   
   //agent command dispatcher (all *** commands)
   public function agent_handler($command, $arguments, $dmn) {
   		
		//create command line from daemon			
		$shell_command = $command . " " . implode(' ',$arguments);			
		
		if (is_object($this->active_o_agent)) {
		  
		  if (method_exists($this->active_o_agent,$command))
		    $ret = $this->active_o_agent->$command($arguments[0],$arguments[1],$arguments[2]);
		  else
		    $ret = "Invalid command.\n\n" . 
					implode("\n",get_class_methods($this->active_o_agent)) . "\n";  
		  
		  $dmn->Println ($ret); 
		  return true;  
		}			
		else {			
		  $dmn->Println ($shell_command); 
		  return true;  
		}
   }   
   
   //buffer2 used as optional when reconf-clean mem  
   private function openmemagn($buffer,$buffer2=null) {
   
      $shm_max = strlen($buffer) + strlen($buffer2);
   
      if ($this->agn_mem_type==1) {//shared
   
        $this->agn_shm_id = shmop_open(0xfff, "c", 0644, $shm_max);
	  
        if(!$this->agn_shm_id) { 
          _("Couldn't create shared memory segment.");
		  _("System Halted.");
		  die();
		}  
	    else {  
          $shm_bytes_written = shmop_write($this->agn_shm_id, $buffer, 0);
          if($shm_bytes_written != $shm_max) {
            _("Couldn't write the entire length of data");
		    _($shm_max.":".$shm_bytes_written.">".$buffer);
          }
		  else {	
		    $this->shared_buffer = $buffer . $buffer2;
		    $this->savestate($shm_max);
	        //echo "Ok!\n";
		  }  		
	    }	 
	  }
	  else {//default
	    
		$this->agn_mem_store = $buffer . $buffer2; 
		$this->savestate($shm_max);
	    //echo $this->agn_mem_store," Ok!\n";		
	  }  
   }
   
   private function closememagn() {
   
      if ($this->agn_mem_type==1) {//shared	   
   	    if (!$this->agn_shm_id) return -1;
	  
        if(!shmop_delete($this->agn_shm_id)) {
          _("Couldn't mark shared memory block for deletion.");
        }	  
	  
	    shmop_close($this->agn_shm_id);	
	    $this->agn_shm_id = null;  
		
	  }

	  //delete id file
	  if (is_file('agn.id')) {
	    _("Deleting state...",2);
	    unlink("agn.id"); //!!!permisions denied when multiple agns
	  }
	  //echo "Ok!\n";   
   }   
   
   //save shared mem resource id and mem alloc arrays
   private function savestate($shm_max_mem) {
   
		$fd = @fopen( "agn.id", "w" );

		if (!$fd) {
            _("agn_id not saved!!!");
			return false;
		}

		_("Saving state.",2);
		$data = $shm_max_mem ."^". serialize($this->agn_addr) . 
		                      "^". serialize($this->agn_length); 

		fwrite($fd, $data);

		fclose($fd);      
		
		return true;
   }   
   
   private function addmemagn($agent,$agn_serialized) {
     
	  //if ($agent=='scheduler') {
      //echo "\n,.",strlen($this->shared_buffer)/*,$this->shared_buffer*/;
	  //echo "\n,.",strlen($this->agn_mem_store),$this->agn_mem_store;
	  //}
	  if ($this->agn_mem_type==1)   
        $a_index = strlen($this->shared_buffer); //echo $a_index,"\n";
	  else
	    $a_index = strlen($this->agn_mem_store);
	  
      $a_size = strlen($agn_serialized);
	  
      //extend agent info table
	  $this->agn_addr[$agent] = $a_index;			
	  $this->agn_length[$agent] = $a_size;		
	  _("New $agent ". $a_index.':'.$a_size,1);
	  //var_dump($this->agn_addr);
	  		
      $shm_max = $a_index + $a_size;	
	  if ($this->agn_mem_type==1) 	
	    $this->shared_buffer .= $agn_serialized;
	  else
	    $this->agn_mem_store .= $agn_serialized;	
	  
      if ($this->agn_mem_type==1) {//shared	  
	    //extend and add the new agent at sh mem
   	    if ($this->agn_shm_id) { 
	      _("Close shared memory segment",2);	  
	      $this->closememagn();	 
	      _("Re-allocate shared memory segment",2);
	      $this->openmemagn($this->shared_buffer); 	  
	    }
	    else {
          _("Allocate shared memory segment",2);
	      $this->openmemagn($this->shared_buffer); 	  	  
	    }
	  }
	  else {
	    _("Close standart memory segment",2);	  
	    $this->closememagn();	   
        _("Allocate standart memory segment",2);
	    $this->openmemagn($this->agn_mem_store);		
	  }	
   }
   
   private function updatememagn($agent,$agn_serialized) {
   
      //replace agent info table  
	  $a_index = $this->agn_addr[$agent];			
	  $a_old_size = $this->agn_length[$agent];		
	  //echo "Update old ",$a_index,':',$a_old_size,"\n";   
	  $a_new_size = strlen($agn_serialized);
	  //echo "update new ",$a_index,':',$a_new_size,"\n";	
	  
	  if ($a_old_size==$a_new_size) { //1st method
		
        if ($this->agn_mem_type==1) {//shared	  
		
          $this->shared_buffer = substr_replace($this->shared_buffer,$agn_serialized,$a_index,$a_old_size);    		
		  
	      //update and replace the new agent at sh mem
   	      if ($this->agn_shm_id) { 
	        _("Close shared memory segment",2);	  
	        $this->closememagn();	 
	        _("Re-allocate shared memory segment",2);
	        $this->openmemagn($this->shared_buffer); 	  
	      }
	      else {
            _("Allocate shared memory segment",2);
	        $this->openmemagn($this->shared_buffer); 	  	  
	      }
	    }
	    else {
		
          $this->agn_mem_store = substr_replace($this->agn_mem_store,$agn_serialized,$a_index,$a_old_size);    		
		
	      _("Close standart memory segment",2);	  
	      $this->closememagn();	   
          _("Allocate standart memory segment",2);
	      $this->openmemagn($this->agn_mem_store);		
	    }
		
		return true;			
	  }	
	  else
	    _("Dimension error!");
		
	  return false;	
   }
   
   private function removememagn($agent) {
   
      $a_index = $this->agn_addr[$agent];   
      $a_size = $this->agn_length[$agent];
	  _("Remove ". $agent.'>'.$a_index.':'.$a_size,2);		  
	  
	  $deleted_agent = str_repeat('x',$a_size);
	  
      if ($this->agn_mem_type==1) {//shared		
	  
	    //update shared buffer
        $this->shared_buffer = substr_replace($this->shared_buffer,$deleted_agent,$a_index,$a_size);	      
		
	    if (!shmop_write($this->agn_shm_id,$deleted_agent,$a_index)) {
	      _("[$agent] Couldn't mark shared memory block for writing.");
		  return false;
	    }  
	  }
	  else {
        //echo "\n",$this->agn_mem_store,"\n",strlen($this->agn_mem_store),"\n";	  
	    $this->agn_mem_store = substr_replace($this->agn_mem_store,$deleted_agent,$a_index,$a_size);
		//echo "\n",$this->agn_mem_store,"\n",strlen($this->agn_mem_store),"\n";
	  }
	  //if ckean remark this...
	  //unset($this->agn_addr[$agent]);
	  //unset($this->agn_length[$agent]);

	  if ($this->agn_mem_type==1) 
	    $this->cleanmemagn();
	  else 
	    $this->clean_mem_store();  	
	  
	  return true;
   }
   
   private function clean_mem_store() {
      $offset = 0;
	  //var_dump($this->agn_addr);
	  //var_dump($this->agn_length);	  
	  //echo "\n",$this->agn_mem_store,"\n",strlen($this->agn_mem_store),"\n";	
	  
	  reset($this->agn_addr);
      foreach ($this->agn_addr as $id=>$value) {

        $current_index = $value;				
	    $current_size = $this->agn_length[$id];		
		
		$s_agent = substr($this->agn_mem_store,$current_index,$current_size);
	    //echo '>',$s_agent,'<',strlen($s_agent); 		
		
		$removed_agent = str_repeat('x',$current_size);
		if ($s_agent==$removed_agent) {
		  //is a deleted agent
		  //echo "\nclean $id $current_index:$current_size\n";
		  $offset = strlen($s_agent);
		}
		else {
	      $a_size = $current_size;		
		  
		  $local_agn_addr[$id] = $current_index - $offset;
		  $local_agn_length[$id] = $a_size;
		  $local_agn_mem_store .= $s_agent;
		  
		  $a_index += $a_size;
		  $shm_max += $a_size;
		}
	  }
	  
	  //print_r($local_agn_addr);
	  //print_r($local_agn_length);

	  //$this->agn_mem_store = $local_agn_mem_store;
	  //echo strlen($this->agn_mem_store),">>>>>>>>\n";	  
	  
	  $this->agn_addr = (array)$local_agn_addr;
	  $this->agn_length = (array)$local_agn_length;
	  	    
	  $this->closememagn();	//reset shared buffer
	  $this->openmemagn('aek;',$local_agn_mem_store);
	  
	  //var_dump($this->agn_addr);
	  //var_dump($this->agn_length);		  
	  
   }
   
   private function cleanmemagn() {
   
	  $shm_max = 0;
	  
	  reset($this->agn_addr);
      foreach ($this->agn_addr as $id=>$value) {

        $current_index = $value;				
	    $current_size = $this->agn_length[$id];		
			
	    $s_agent = shmop_read($this->agn_shm_id,$current_index,$current_size); 

	    _('>'.$s_agent.'<'.strlen($s_agent)); 		
	    //$s_agent= substr($this->shared_buffer,$value,$current_size);
		
		$removed_agent = str_repeat('x',$current_size);
		if ($s_agent==$removed_agent) {
		  //is a deleted agent
		  _("removed",2);
		}
		else {
	      $a_size = $current_size;		
		  
		  $local_agn_addr[$id] = $current_index;
		  $local_agn_length[$id] = $a_size;
		  $local_shared_buffer .= $s_agent;
		  
		  $a_index += $a_size;
		  $shm_max += $a_size;
		}
	  }
	  //echo $local_shared_buffer;
	  //$this->shared_buffer = $local_shared_buffer;
	  $this->agn_addr = (array)$local_agn_addr;
	  $this->agn_length = (array)$local_agn_length;
	    
	  $this->closememagn();	//reset shared buffer
	  $this->openmemagn('aek;',$local_shared_buffer);  
   }
   
   /////////////////////////////////////////////// HI-LEVEL AGENT HANDLERS
   
   //reead file of agents to initialize
   private function init_agents($ip,$port) {   
   
	   $this->openmemagn('aek;');    
       _('Init agents file: ' . getcwd() . "/agentds.ini"); 
       if (!is_file(getcwd() ."/agentds.ini")) return -1;   
		  
       $code = @file_get_contents(getcwd() . "/agentds.ini");
	   
	   if ($file = explode("\n",$code)) {
			//clean code by nulls and commends
			foreach ($file as $num=>$line) {
			  $trimedline = trim($line);
		      if (($trimedline) && //check if empty line			  
			      ($trimedline[0]!="#")) {  //check comments        
			    
				 $lines[] = $trimedline;
			  }
			}
			//print_r($lines);
			//one line may have more than one cmds sep by ;
			$toktext = implode("",$lines);
			//tokenize
			$token = explode(";",$toktext);		

	        //then...read tokens  			
	        foreach ($token as $tid=>$tcmd) {
			  
			   $part = explode(' ',$tcmd);
			   switch ($part[0]) {	
			   
			     case 'system':	//run system cmds
				                $name = explode(".",trim($part[0]));
				                break;				  
								
			     case 'schedule'://run scheduled cmds
				                $this->get_agent('scheduler')->schedule($part[1],$part[2],$part[3]); 
				                break;
								
				 case 'library' : if ($part[1]) {

								  $name = explode(".",trim($part[1]));
								  $this->create_agent($name[1],$name[0],null,null,'lib',false);
								} 
				                break; 

				 case 'include' : if ($part[1]) {

								  $name = explode(".",trim($part[1]));
								  $this->create_agent($name[1],$name[0],null,null,'lib',true);
								} 
				                break;								
							  
				 default      : //create agents  
			  		            if ($part[0]) {
								  //$includer = "phpdac5://$ip:$port/" . str_replace(".","/",trim($part[0])) . "." . 'dpc' . ".php";
								  //$this->load_agent($includer,$part[0]);
								  
								  $name = explode(".",trim($part[0]));
								  $this->create_agent($name[1],$name[0]);//$part[1]);-RESIDENT disbaled
								} 
				                
			   }//switch
			   $i+=1; 
	        }//foreach		 
	   }
	   
	   return true;
   }  
   
   private function create_agent($agent,$domain=null,$include_ip=null,$as_name=null,$type='dpc',$includeonly=false) {
      global $__DPC;  
	  $dpc = $domain ? : 'agents';
   	  $class = strtoupper($agent).'_DPC';	  
	  //echo $class;
	  
	  if (defined($class)) {
		  _($agent . " exists!");
		  return true;
	  }	  
	  
      if (isset($include_ip))
	    require("phpdac5://$include_ip:$this->phpdac_port" . "/$dpc/$agent" . '.'.$type.'.php');    
	  else 
	    require("phpdac5://$this->phpdac_ip:$this->phpdac_port" . "/$dpc/$agent" . '.'.$type.'.php');    
	  
	  if (($type=='lib') && ($includeonly)) {
		  _('include library: '.$agent);
		  return true;
	  }	  
	  
	  $class = strtoupper($agent).'_DPC';	 
	  //echo $class;
	  if ((defined($class)) &&
	      (class_exists($__DPC[$class])) ) {
		try {
 
          $o_agent = & new $__DPC[$class]($this);//this is the class as environment
		  		  
		  if (is_object($o_agent)) {
		    $s_agent = serialize($o_agent); 
			
			if (isset($as_name)) {
		      $this->addmemagn($as_name,$s_agent);
			  _("Create agent:$agent as $as_name");//,0,false);//\n";			
			}
			else {
		      $this->addmemagn($agent,$s_agent);
			  _("Create agent:$agent");//,0,false);//,"\n";
			}  
            /* DISABLED
			if ($resident=='RESIDENT') {
			  $this->agn_attr[$agent] = $resident;
			  _(" -resident");
			}
			else
			  _(" ");	
	        */
	        //var_dump($this->agn_addr);
	        //var_dump($this->agn_length);	  
	        //echo "\n",substr($this->agn_mem_store,0,256),"\n",strlen($this->agn_mem_store),"\n";				
		  	//echo "NEW AGENT(".strlen($s_agent)."):" . get_class($o_agent) . '(' . memory_get_usage() .")\n";		
		    return true;
		  }
		  else {
            _('loading agent ..'.$agent."..failed!");
		    //return false;		  
		  }
		}
		catch (Exception $e) {
		  _("Agent ($agent) failed to initialize");
		} 
	  }
      //echo 'failed agent ..',$agent,"\n";
	  return false;	 	   
   } 
   
   private function destroy_agent($agent) {
   
	  $o_agent = $this->get_agent($agent);
	  
      //seems to load the 1st agent in case of invalid agent name   
	  if (is_object($o_agent) && ($this->active_agent!=$agent)) {   
     
	    if ($this->removememagn($agent)) {
		
		  $o_agent->destroy();
		
	      unset($this->agn_attr[$agent]);//RESIDENT ATTRIBUTE
	      _("[$agent] Destroyed");
		  
		  return true;
	    }	
	    else {
	      _("[$agent] NOT destroyed!");			
		  return false;
	    }	
	  
	  }
	  else
	    _("Invalid object or activated!");
   }
   
   
   function __wakeup() {
   
     //echo "WWWWWWWWWWWWW";
   }
   
   //update the object data in shared mem
   public function update_agent(&$o_agent,$agent) {
   
	  //var_dump($this->agn_addr);
	  //var_dump($this->agn_length);	  
	  //echo "\n",$this->agn_mem_store,"\n",strlen($this->agn_mem_store),"\n";   
      //echo "\n,.",strlen($this->shared_buffer),$this->shared_buffer;
	   
	  if (is_object($o_agent)) {
	  
	      $old_agent = $this->get_agent($agent,true);
          
		  //$o_agent->env = $this;
		  $s_agent = serialize($o_agent);    
		  
		  //if (strlen($old_agent)!=strlen($s_agent)) {
		  if (strcmp($old_agent,$s_agent)) {
		  
		    //echo '+++++',strcmp($old_agent,$s_agent),'++++'; 
		  
		    //1st method
		    //$this->updatememagn($agent,$s_agent);
		  
		    //2nd method
	        //remove and then insert 2ND METHOD
	  		//echo  strlen($this->agn_mem_store),">>>>>\n";			
	        $removed = $this->removememagn($agent);
	  		//echo  strlen($this->agn_mem_store),">>>>>\n";
   	        if ($removed) {//2nd method		
			  
		      $this->addmemagn($agent,$s_agent);
		      _('Update agent:'.$agent,2);			
		    }
		    else
		     _('Update agent:'.$agent."..failed!",2);
		  }
		  else
		    _('Update agent:'.$agent."..not neccesery!",2);	 
	  }
	  
	  //var_dump($this->agn_addr);
	  //var_dump($this->agn_length);	  
	  //echo "\n",$this->agn_mem_store,"\n",strlen($this->agn_mem_store),"\n";		  		
   } 
   
   //return object pointer of agent OR serialized string of agent
   public function get_agent($agent,$serialized=null) {

	  //echo $agent,"\n>>>>>>>>>>>>>";
      if (isset($this->agn_addr[$agent])) {
	  
	    $a_index = $this->agn_addr[$agent];
	    $a_size = $this->agn_length[$agent];
	    //echo $a_index,':',$a_size,"\n";
		//var_dump($this->agn_addr);
		//var_dump($this->agn_length);		
	  
        if ($this->agn_mem_type==1) {//shared	  
	      $s_agent = shmop_read($this->agn_shm_id,$a_index,$a_size); 
		}
		else {
		  $s_agent = substr($this->agn_mem_store,$a_index,$a_size);		
		}  
	    //echo '>',$s_agent,'<',strlen($s_agent); 

	    if ($serialized) {
		
		  //auto update ?????
		  
		  return ($s_agent);
		}
		else {  
		  $size = strlen($s_agent);
	      $o_agent = unserialize($s_agent);
	  
		  //auto update
		  $o_agent->env = &$this;
		  
		  //echo "get_agent($size):" . get_class($o_agent) . '(' . memory_get_usage() .")\n";
		  return ($o_agent);
		}  
	  }
	  
	  return null;	   
   }    
   
   //call agent's methods from cmd line!!!
   public function call_agent($agent,$daemon) {
   
		$o_agent = $this->get_agent($agent);
	  
        //seems to load the 1st agent in case of invalid agent name   
	    if (is_object($o_agent)) {
          //$daemon->changePrompt($agent.">");   
          if (method_exists($o_agent,'iam')) 
		    $ret = $o_agent->iam();
		  else 
		    $ret = "Ok!";
    
          $this->active_o_agent = $o_agent;
		  //var_dump(get_class_methods($this->active_o_agent));
		  $this->active_agent = $agent;
		  $daemon->changePrompt($agent.'>');
		
		  $ret = implode(".",get_class_methods($this->active_o_agent)) . "\n";
	    }
	    else {
	      //$this->active_o_agent = null;
	      $ret = "Invalid agent!";
	    }	
	
	  return ($ret);	      
   }
   
   //uncall agent from cmd
   private function uncall_agent($daemon) {
   
	  if (is_object($this->active_o_agent)) {   
	  
        $this->active_o_agent = null;
		$this->active_agent = null;	
		$daemon->changePrompt($this->promptString);	
  	    $ret = "Ok!";					  
	  }
	  else
	    $ret = "Invalid agent!";	
		
	  return ($ret);			  
   }
   
   //call agent from sh mem buffer (client version)
   //use local
   private function call_agentc($agent) {
   
		
		$s_agent = $this->get_agent($agent,1);
	  
	    //delete agent from host
		if ($this->agn_attr[$agent]!='RESIDENT')
	      $this->destroy_agent($agent);
	  	  
	    return ($s_agent);
   }
   
   //send agent to other agent station
   private function move_agentc($agent,$to) {
   }   
   
   //accept agent from other agent station
   //$from = ip:port
   private function accept_agentc($agent,$from,$include=null) {
   
      //get agent
      $f_agent = file_get_contents("phpagn5://$from:19125/" . $agent);//call callagentc from $from
	  $s_agent = substr($f_agent,68,strlen($f_agent)-68-1);//header of daemon OFF
      _('>'.$s_agent.'<');
	  /*for ($i=0;$i<68;$i++) {
	    echo ord($f_agent{$i}),'.';
		$x .= $f_agent{$i};
	  }	
	  echo $x;*/
	  
	  if (isset($s_agent)) {
	    //MUST BE INCLUDED TO UNSERIALZE OBJECTS
	    if (!isset($include)) {
		 if (isset($this->phpdac_ip)) 
		   $include = $this->phpdac_ip;
		 else
		   $include = $from;
		}   
        require("phpdac5://$include:19123/" . "agents/$agent." . 'dpc' . ".php");
	  	  
	    $o_agent = unserialize($s_agent);	  
      
	    if (is_object($o_agent)) {
          //$daemon->changePrompt($agent.">");   
          if (method_exists($o_agent,'iam')) 
		    $ret = $o_agent->iam();
		  else 
		    $ret = "Ok!";
		  
		  $this->addmemagn($agent,$s_agent);   
	    }
	    else
	      $ret = "Invalid agent!";	
	  }
	  else
	    $ret = "Invalid agent!";	
	  			
	  return ($ret);	   
   }
   
   private function show_agents() {
   
      if (!is_array($this->agn_addr)) return -1;
	  
      //var_dump($this->agn_addr);	  
	  //var_dump($this->agn_length);  
   
      foreach ($this->agn_addr as $agn=>$addr) {
	    _(PHP_EOL . $agn . $addr,1,false);
        if ($this->agn_mem_type==1) {//shared	  
	      $s_agent = shmop_read($this->agn_shm_id,$addr,$this->agn_length[$agn]);  
		}
		else {
          $s_agent = substr($this->agn_mem_store,$addr,$this->agn_length[$agn]);  		
		} 
		_($this->agn_addr[$agn].":".$this->agn_length[$agn],2);
		//echo $s_agent,"\n";
		
		$o_agent = unserialize($s_agent);	
		
	    if (is_object($o_agent)) {
          //$daemon->changePrompt($agent.">");   
          if (method_exists($o_agent,'iam')) 
		    $ret .= $o_agent->iam()."\n";
		  else 
		    $ret .= $agn." Ok!"."\n";
	    }
		else
		  $ret .= "Invalid agent!\n";		    
	  }
	  
	  return ($ret);
   }
   
   private function free_agents() {
   
      if ($this->gtk) {
		$this->gtkds_conn->set_async_code("
		foreach (\$this->agentbox->children() as \$num=>\$child) {
		   \$this->agentbox->remove(\$child);
		}	
	    ");		      
	  } 
      $this->closememagn();
   }
   
   public function prn($message=null,$doctitle=null) {
	  if (!$message) return false;
	  
      $pr = $this->get_agent('resources')->get_resource('printer');
      //$this->update_agent($this->get_agent('resources'),'resources');
	  if (is_resource($pr) &&
		  get_resource_type($pr)=='printer') {
		 printer_start_doc($pr, $doctitle);	  
	     printer_write($pr,$message."\n\r");  	 
		 //printer_end_doc($pr, $doctitle); //double print 0 bytes when enabled !!!!
		 _($message,1);
		 return true;
	  }
	  
	  _("printing error!",1);  
	  return false;
   }
   
   public function show_connections($show=null,$dacserver=null) {
   
      if ($dacserver) {//get sesions from phpdac server's daemon...
	    $sret = $this->get_agent('resources')->get_resourcec('_sessions',$this->phpdac_ip,$this->phpdac_port);
		$ret = unserialize($sret);
	  }
	  else {//get session from this agentds daemon
        $ret = $this->dmn->show_connections();
	  
	    //save in resources
        $this->get_agent('resources')->set_resource('_sessions',serialize($ret));		  
	  }
	  
	  if ($show) {
	    if (!empty($ret)) {
	      //print out
	      foreach ($ret as $session)
	        $out .= implode("-",$session). "\r\n";	  
		}  
		return ($out);  
	  }
	  else
	    return ($ret);
	  	
	  	
   }      
   
   
	public function httpcl($url=null, $user=null,$password=null) {
		if (!$url) return null;
		
		//require_once($this->ldscheme . "tcp/sasl.lib.php");
		//require_once($this->ldscheme . "tcp/httpclient.lib.php");		
		//include at agents.ini
		
		$http=new httpclient;
		$http->timeout=0;
		$http->data_timeout=0;
		$http->debug=0;//1
		$http->html_debug=0;//1				
		$http->user_agent="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)";
		$http->follow_redirect=0;
		$http->prefer_curl=0;
		//$user="info@e-basis.gr";
		//$password="basis2012!@";
		$realm="";       /* Authentication realm or domain      */
		$workstation=""; /* Workstation for NTLM authentication */
		$authentication=(strlen($user) ? UrlEncode($user).":".UrlEncode($password)."@" : "");
				
		$url="http://".$authentication.$url;//"www.php.net/";
				
		$error=$http->GetRequestArguments($url,$arguments);

		if(strlen($realm))
			$arguments["AuthRealm"]=$realm;

		if(strlen($workstation))
			$arguments["AuthWorkstation"]=$workstation;

		$http->authentication_mechanism=""; // force a given authentication mechanism;
		$arguments["Headers"]["Pragma"]="nocache";
				
		_("Opening connection to: " . HtmlSpecialChars($arguments["HostName"]),1);
		flush();
		$error=$http->Open($arguments);
				
		if ($error=="") {
			_("Sending request for page: " . HtmlSpecialChars($arguments["RequestURI"]),1);
			if(strlen($user))
				_("\nLogin:    ".$user."\nPassword: ".str_repeat("*",strlen($password)),2);
			_('',2);
			flush();
			$error=$http->SendRequest($arguments);
			_('',2);

			if($error=="") {
				_("Request:\n\n".HtmlSpecialChars($http->request),2);
				_("Request headers:\n",2);
				for(Reset($http->request_headers),$header=0;$header<count($http->request_headers);Next($http->request_headers),$header++)
				{
					$header_name=Key($http->request_headers);
					if(GetType($http->request_headers[$header_name])=="array")
					{
						for($header_value=0;$header_value<count($http->request_headers[$header_name]);$header_value++)
							_($header_name.": ".$http->request_headers[$header_name][$header_value],2);
					}
					else
						_($header_name.": ".$http->request_headers[$header_name],2);
				}
				_('',2);
				flush();
				
				$headers=array();
				$error=$http->ReadReplyHeaders($headers);
				_('',2);
				if($error=="")
				{
					_("Response status code:\n".$http->response_status,2);
					switch($http->response_status)
					{
						case "301":
						case "302":
						case "303":
						case "307":
							_(" (redirect to ".$headers["location"].")\nSet the follow_redirect variable to handle redirect responses automatically.",2);
							break;
					}
					_('');
					_("Response headers:\n",2);
					for(Reset($headers),$header=0;$header<count($headers);Next($headers),$header++)
					{
						$header_name=Key($headers);
						if(GetType($headers[$header_name])=="array")
						{
							for($header_value=0;$header_value<count($headers[$header_name]);$header_value++)
								_($header_name.": ".$headers[$header_name][$header_value],2);
						}
						else
							_($header_name.": ".$headers[$header_name],2);
					}
					_('',2);
					flush();
					
					//echo "Response body:\n\n";
					/*You can read the whole reply body at once or
					block by block to not exceed PHP memory limits.
					*/
					
					$error = $http->ReadWholeReplyBody($body);
					//if(strlen($error) == 0)
						//echo HtmlSpecialChars($body);
					
					/*for(;;)
					{
						$error=$http->ReadReplyBody($body,1000);
						if($error!="" || strlen($body)==0)
							break;
						//echo $body;//HtmlSpecialChars($body);
						//return...
					}*/

					_('',2);
					//flush();
				}
			}
			$http->Close();
			
		}
		
		if(strlen($error)) {
			_("Error: ".$error,1);
			return null;	
		}

		return ($body);		
	} 
	
	

   function shutdown() {
   
	  //unregister_tick_function($this->get_agent('scheduler'),'checkschedules');

	  //is agents now
	  //unset($this->timer);
	  //unset($this->scheduler);
	  	  
   
	  _("Shutdown...",1);
	  	
      $this->free_agents();
	  
	  //close printer	  
	  $printout = $this->get_agent('resources')->get_resource('printer');   		
	  if (is_resource($printout) &&
			get_resource_type($printout)=='printer')
			printer_close($printout);
			
   } 	
   
   function __destruct() {
	  //shmop_delete($this->dpc_agn_id);
   }

   public static function ClassLoader($className) {
	
        _("Trying to load dpc ". $className. ' via '. __METHOD__ ,1);
		
		try {
		    $class = str_replace(array('\\DPC\\','\\'), '/', $className);
            require_once(self::$ldschemeS . '/' . $class . '.dpc.php');  
			_("Class $className loaded!",1);
		} 
		catch (Exception $e) {
            _("\r\n File $className not exist!",1);
			//debug_print_backtrace();		
        }
		
        _("End of load ". $className. ' via '. __METHOD__. "()\r\n",1);		
    } 

   public static function LibraryLoader($className) {
	
        _("Trying to load lib ". $className. ' via '. __METHOD__ ,1);
		
		try {
		    $class = str_replace(array('\\LIB\\','\\'), '/', $className);
            require_once(self::$ldschemeS . '/' . $class . '.lib.php');  
			_("Class $className loaded!",1);
		} 
		catch (Exception $e) {
            _("\r\n File $className not exist!",1);
			//debug_print_backtrace();		
        }
		
        _("End of load ". $className. ' via '. __METHOD__. "()\r\n",1);		
    } 	

}

class rules {

   function rules() {
   }
   
   
};

?>