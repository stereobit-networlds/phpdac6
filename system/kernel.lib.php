<?php

//require_once("socketconnector.lib.php"); //no needed anymore

//require_once("daemon.lib.php"); //load the same lib (agent)
require_once("agents/daemon.lib.php");
require_once("agents/timer.lib.php");
require_once("agents/resources.lib.php");
require_once("agents/scheduler.lib.php");

class kernel {

   var $userLeveID;
   var $daemon_ip;
   var $daemon_port;
   var $daemon_type;
   var $dmn;
   var $use;
   var $mysh;
   var $agent;
   
   var $shm_id;
   var $dpc_shm_id;
   
   var $dpc_addr;
   var $dpc_length;
   var $shared_buffer;
   var $usemem;
   
   var $scheduler, $resources, $timer;
   var $extra_space;
   
   function kernel($dtype,$ip='127.0.0.1',$port='19123') {
	  $UserSecID = GetGlobal('UserSecID');
      $this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);   
	  $argc = $GLOBALS['argc'];
      $argv = $GLOBALS['argv'];  
	  
	  $this->extra_space = 1000;
	  
      $dtype = $argv[1] ? $argv[1] : '';
	  //if (($dtype == '-inetd') || ($dtype=='-standalone'))
	  $this->daemon_type = str_replace("-","",$dtype);
	  $this->daemon_ip = $argv[2] ? $argv[2] : '127.0.0.1';//$ip;//'192.168.4.203';
	  $this->daemon_port = $argv[3] ? $argv[3] : '19123';//$port;//19123;
	  	  
	  echo("Daemon repository at $this->daemon_ip:$this->daemon_port\n");
	  
 	  //REGISTER PHPRES (client side,resources) protocol...			
      require_once("agents/resstream.lib.php"); 
	  $phpdac_c = stream_wrapper_register("phpres5","c_resstream");
	  if (!$phpdac_c) echo("Client resource protocol failed to registered!\n");
		         else echo("Client resource protocol registered!\n"); 	  

	  $this->timer = new timer($this);
	  
	  $this->scheduler = new scheduler($this);
	  //$this->scheduler->schedule('kernel.scheduleprint','every','20');	  		  
      //$this->scheduler->schedule('kernel.check_dpcs','every','200');	  		  	  

	  //init resources
	  $this->resources = new resources($this);	 	  
	  
	  //$printer = "\\\\hermes\\OkiML320";
	  //$printout = printer_open($printer);//true;
	  if (is_resource($printout) &&
		  get_resource_type($printout)=='printer') {
	    printer_set_option($printout, PRINTER_MODE, 'RAW'); 
		
		$this->resources->set_resource($printer,$printout);
	  }	
	  
	  $this->resources->set_resource('variable','value');
	  
	  $this->shm_id= null;
	  $this->dpc_shm_id = null;
	  $this->dpc_attr = array();
	  $this->dpc_length = array();
	  $this->shared_buffer = null;
	  
	  $this->use = null;
	  $this->agent = 'SH';//default
	  $this->usemem = 1;
	  
	  //called in schedules!!!!!
      //register_tick_function(array(&$this->scheduler,"checkschedules"),true);		  	  
	  
	  //initialize task from already loaded agents (BEWARE TO LOAD THE DEFAULT AGENTS)
      $this->scheduler->schedule('kernel.show_connections','every','20');		  
	  
	  if ($this->usemem) $this->startmemdpc();
	  $this->startdaemon();
   }
   
   function startdaemon() {
   
      $this->dmn = new daemon($this->daemon_type,true);//,$this->printout);//'standalone',false);
      $this->dmn->setAddress ($this->daemon_ip);//'127.0.0.1');
      $this->dmn->setPort ($this->daemon_port);
      $this->dmn->Header = "PHPDAC5 Kernel v2, " . $this->daemon_ip . ':' . $this->daemon_port;

      $this->dmn->start ();  //this routine creates a socket	
	  
      $this->dmn->setCommands (array ("help", "quit", "date", "shutdown","echo","silence",
	                                  "ver","use","agent","setagent","level","setlevel",
									  "getdpcmem","getdpcmemc","helo","run",
									  "print","getresource", "getresourcec", "showresources", 
									  "findresource", "findresourcec", "setresource", "delresource",
									  "checkschedules","showschedules", "who",
									  "***"));
      //list of valid commands that must be accepted by the server	
	  
      $this->dmn->CommandAction ("help", array($this,"command_handler")); //add callback
      $this->dmn->CommandAction ("quit", array($this,"command_handler")); // by calling 
      $this->dmn->CommandAction ("date", array($this,"command_handler")); //this routine
      $this->dmn->CommandAction ("shutdown", array($this,"command_handler"));
	  
      $this->dmn->CommandAction ("echo", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("silence", array($this,"command_handler"));		  
	  
      $this->dmn->CommandAction ("ver", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("use", array($this,"command_handler"));	
      $this->dmn->CommandAction ("agent", array($this,"command_handler"));
      $this->dmn->CommandAction ("setagent", array($this,"command_handler"));	  	  
      $this->dmn->CommandAction ("level", array($this,"command_handler"));
      $this->dmn->CommandAction ("setlevel", array($this,"command_handler"));
      $this->dmn->CommandAction ("getdpcmem", array($this,"command_handler"));	  
      $this->dmn->CommandAction ("getdpcmemc", array($this,"command_handler"));//client version quit after		  
      $this->dmn->CommandAction ("helo", array($this,"command_handler"));	
      $this->dmn->CommandAction ("run", array($this,"command_handler"));
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
      $this->dmn->CommandAction ("who", array($this,"command_handler"));	  
	  	  	  	  	  
	  $this->dmn->CommandAction ("***", array($this,"phpdac_handler"));//handle everyting else...	  
	  
      $this->dmn->listen (1); //from here... your program will enter an endless loop
      //until manually broken. This example contains a shutdown command that
      //would shutdown this daemon.	    	       
   }
   
   //general purpose commands
   function command_handler ($command, $arguments, $dmn) {
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
                $dmn->Println (date ("H:i:s d/m/Y"));
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
                $dmn->Println (implode(",",$arguments).':shell script engine V0.05 on PHP'.phpversion());
                return true;
                break;				
				
        case 'USE':
		        $ret = $this->use_project($arguments[0],$arguments[1]);
                $dmn->Println ($ret);
                return true;
                break;		
				
		case 'SETAGENT' : SetGlobal('__USERAGENT',strtoupper($arguments[0]));		
		case 'AGENT':
		        $dmn->Println ('Agent is '.GetGlobal('__USERAGENT'));
                return true;
                break;
				
		case 'SETLEVEL' : $this->userLevelID = $arguments[0]; 
				          SetSessionParam("UserSecID",encode($arguments[0]));
		case 'LEVEL':
		        $dmn->Println ('Level is '.decode(GetSessionParam("UserSecID")));//$this->userLevelID);
                return true;
                break;				
				
		case 'GETDPCMEM'://server version
		        $data = $this->getdpcmem($arguments[0]);
		        $dmn->Println ($data);
                return true;
                break;	
				
		case 'GETDPCMEMC'://client version
		        $dmn->setEcho(0);//echo off
				//header from 1st command still appear...must set client silence off				
				$dmn->setSilence(1);//silence off...???
		        $data = $this->getdpcmemc($arguments[0]);
		        $dmn->Println (trim($data));
                return false;//and quit
                break;					
				
		case 'HELO':
                return false;
                break;		
				
		case 'RUN':
                return true;
                break;							
				
		case 'PRINT':
		        $this->prn(implode(" ",$arguments));
                return true;
                break;	
				
		case 'GETRESOURCE' :
		        $dmn->setEcho(0);//echo off
				$dmn->setSilence(1);//silence off...???
		        $resource = $this->resources->get_resource($arguments[0],1);
		        $dmn->Println ($resource);
		        //return ($resource);
				return false;//and quit
		        break; 
				
		case 'GETRESOURCEC' :
		        $resource = $this->resources->get_resourcec($arguments[0],$arguments[1],$arguments[2]);
		        $dmn->Println ($resource);
				return true;
		        break;				
				
		case 'SHOWRESOURCES':
		        $r = $this->resources->showresources();
				$dmn->Println ($r);
                return true;
                break;	
				
		case 'FINDRESOURCE':				
		case 'FINDRESOURCEC':
		        $r = $this->resources->findresource($arguments[0],1);
				$dmn->Println ($r);
                return true;
                break;					
				
		case 'SETRESOURCE':
		        $r = $this->resources->set_resource($arguments[0],$arguments[1]);
				$dmn->Println ($r);
                return true;
                break;											
				
		case 'DELRESOURCE':
		        $r = $this->resources->del_resource($arguments[0]);
				$dmn->Println ($r);
                return true;
                break;						
				
		case 'CHECKSCHEDULES':
		        $c = $this->scheduler->checkschedules();
				$dmn->Println ($c);
                return true;
                break;	
				
		case 'SHOWSCHEDULES':
		        $s = $this->scheduler->showschedules();
				$dmn->Println ($s);
                return true;
                break;	
				
		case 'WHO':
		        $sessions = $this->show_connections(1);//$dmn->show_connections();
				$dmn->Println($sessions);
				return true;
		        break;														
        }
   }  
   
   //phpdac command dispatcher (all *** commands)
   function phpdac_handler($command, $arguments, $dmn) {
   		
		//create command line from daemon			
		$shell_command = $command . " " . implode(' ',$arguments);			
		
		/*if ($this->use) {			
          $mysh = new shell('SH',$shell_command);
          $ret = $mysh->render();
	      unset($mysh);    
		}*/
		
		SetGlobal('param1',$arguments[0]); //echo $param1;
		SetGlobal('param2',$arguments[1]); //echo $param2;
		SetGlobal('cmdline',trim($shell_command)); //whole line		
		
		if (is_object($this->mysh)) {
		
          GetGlobal('controller')->event($command);
		  GetGlobal('controller')->reset($command);	//re-init dpc if need
		  $ret = GetGlobal('controller')->action($command); 		  
		  
		  $dmn->Println ($ret); 
		  return true;  
		}			
		else {			
		  $dmn->Println ($shell_command); 
		  return true;  
		}
   } 

   
   function use_project($proj=null,$path=null) {
   
       if (isset($path) && isset($proj)) {
	   
	   $initst = array('project'=>$proj);
       $prj = $initst['project']; //echo $prj;	 
	   $config = @parse_ini_file($path.$proj."/config.ini",1); //print_r($config);
	   $theme = @parse_ini_file($path.$proj."/maptheme.ini");
	   //make these vars globals
	   SetGlobal('initst',$initst);
	   SetGlobal('prj',array('project'=>$argv[2]));
	   SetGlobal('config',$config);
	   SetGlobal('theme',$theme);	   
		 
       if (iniload('SHELL')) { 

         require_once("shell/shell.lib.php"); 	 
	 
         if ((!is_array($initst)) || 
             (!is_array($config)) || 
             (!is_array($theme))) $ret = 'Invalid configuration!';	
		 else {
		   $this->use = $proj;
		   $this->dmn->changePrompt($proj.'@phpdac5>');
		   
           //it must not affected by setagent		   
		   $this->mysh = new shell('SH');//must be allways init as sh
		   
    	   @session_start(); //echo "start1";
		   
		   $ret ='ok!';
		   return ($ret);		   
		 }  
	 		   	  
       }
	   else 
	     $ret = 'shell required!';	
		 	   
	   }
	   else
	     $ret = 'Invalid parameters!';
		 
	   $this->mysh = null;	 
		 
	   $this->use = null;
	   $this->dmn->changePrompt();//default		 
	   return ($ret);	 
   }
   
   function read_dpcs() {
   
        $dpath = "./";//"c:/php/webos/dpc";
   
	    if (is_dir($dpath)) {
		
          $mydir = dir($dpath);
		 
          while ($fileread = $mydir->read ()) {
	   
           //read directories
		   //if (($fileread!='.') && ($fileread!='..'))  { //ALL
		   if ($fileread=='agents') { //ONLY AGENTS

	          if (is_dir($dpath."/".$fileread)) {

                 $mysubdir = dir($dpath."/".$fileread);
                 while ($subfileread = $mysubdir->read ()) {	
				 
		           if (($subfileread!='.') && ($subfileread!='..'))  {
				   
                       if (((stristr ($subfileread,".dpc.php")) || 
					        (stristr ($subfileread,".lib.php"))) &&
				            (!stristr ($subfileread,"-")) && //= versioned file
							(!stristr ($subfileread,"~"))) { //=opened file
				           $mydpc[] = $fileread."/".$subfileread;
			           }								     
				   }
				 }
			  }
		   }
	      }
	      $mydir->close ();
        }
		//print_r($mydpc);
		return ($mydpc);   
   }
   
   //UNDER CONSTRUCTION: all php files must be readed (memory!! in large libs)
   function read_extensions() {
   
        $dpath = "./system/extensions";//"c:/php/webos/dpc";
   
	    if (is_dir($dpath)) {
		
          $mydir = dir($dpath);
		 
          while ($fileread = $mydir->read ()) {
	   
           //read directories
		   if (($fileread!='.') && ($fileread!='..'))  {

	          if (is_dir($dpath."/".$fileread)) {

                 $mysubdir = dir($dpath."/".$fileread);
                 while ($subfileread = $mysubdir->read ()) {	
				 
		           if (($subfileread!='.') && ($subfileread!='..'))  {
				   
                       if ((stristr ($subfileread,".php")) && //all php extensions
				           (!stristr ($subfileread,"-")) && //= versioned file
						   (!stristr ($subfileread,"~"))) { //=opened file
				           $mydpcext[] = 'system/extensions/'.$fileread."/".$subfileread;
			           }								     
				   }
				 }
			  }
		   }
	      }
	      $mydir->close ();
        }
		return ($mydpcext);   
   }   
   
   function load_dpc_tree() {
   	
	   echo "loading dpc modules...\n";	
	   $libs = $this->read_dpcs();
	   //echo "loading dpc extensions...\n";	
	   //$exts = $this->read_extensions();
	   
	   if (is_array($exts)) $tree = array_merge($libs,$exts); 
	                   else $tree = $libs;
	   //print_r($tree);  
	  
	   if ($libs) {
	   //print_r($libs);
	   //echo ".....\n";
	    $offset = 0;
	    foreach($tree as $dpc_id=>$dpc_mod) {
		  $dpcf = trim($dpc_mod);
	      if (($dpcf!='') && ($dpcf[0]!=';')) {
		
		    //$modules[] = $dpc_mod; 
		    $shared_dpc = file_get_contents($dpcf);
			              //$this->getfile(trim($dpc_mod)); old
		    if ($shared_dpc) {
			  $this->dpc_addr[$dpcf] = $offset;			
			  $this->dpc_length[$dpcf] = strlen($shared_dpc)+$this->extra_space;
			  $offset+=$this->dpc_length[$dpcf];			
			  //add data space
		      $this->shared_buffer .= $shared_dpc;
			  //add extra space for reloading
			  $this->shared_buffer .= str_repeat(' ',$this->extra_space);
			  
			  echo $dpcf . " Ok\n";
		    }
		    else {
	          echo $dpcf . " Error\n";
		    }	 
		  }
	    }
	    //print $shared_buffer;
	    $totalbytes = strlen($this->shared_buffer);
	    echo "\nTotal Bytes : ",$totalbytes,"\n";
		
		//print_r($this->dpc_addr);
		//print_r($this->dpc_length);
	  
        return $totalbytes; 
	  }
	  else
	    die("Dpc tree error. System Halted.\n"); 		
   }    
   
  /* function getfile($modfile) {

     $myfile = file ($modfile);

     foreach ($myfile as $line_num => $line) {  
    
       if ($line) {
         $out .= $line;    //read line
       }
     }
     return $out; 
   }*/ 
   
   function startmemdpc() {
   
	  echo "Start..\n";   
   
      //load_dl('php_shmop',paramload('SHELL','os'));//<<<<
	  if (!extension_loaded('shmop')) dl('php_shmop.dll');

      // Create 100 bytes shared memory block with system id if 0xff3
      /*$this->shm_id = shmop_open(0xff3, "c", 0644, 100);
      if(!$this->shm_id) {
        echo "Couldn't create shared memory segment\n";
      }

      // Get shared memory block's size
      $shm_size = shmop_size($this->shm_id);
      echo "SHM Block Size: ".$shm_size. " has been created.\n";

      // Lets write a test string into shared memory
      $shm_bytes_written = shmop_write($this->shm_id, "my shared memory block", 0);
      if($shm_bytes_written != strlen("my shared memory block")) {
        echo "Couldn't write the entire length of data\n";
      }

      // Now lets read the string back
      $my_string = shmop_read($this->shm_id, 0, $shm_size);
      if(!$my_string) {
        echo "Couldn't read from shared memory block\n";
      }
      echo "The data inside shared memory was: ".$my_string."\n";
      */

      ///////////////////////////////////////////////////load dpc tree
      $shm_max = $this->load_dpc_tree();
	  ///////////////////////////////////////////////allocate dpc tree
	  // Create shared memory block with system id if 0xff3
	  echo "Allocate shared memory segment ...";
      $this->dpc_shm_id = shmop_open(0xfff, "c", 0644, $shm_max);
      if(!$this->dpc_shm_id) 
        die("Couldn't create shared memory segment. System Halted.\n");
	  else {  
        $shm_bytes_written = shmop_write($this->dpc_shm_id, $this->shared_buffer, 0);
        if($shm_bytes_written != $shm_max) {
          echo "Couldn't write the entire length of data\n";
        }
		else	
		  $this->savestate($shm_max);
	      echo "Ok!\n";		
	  }	   
   } 
   
   //save shared mem resource id and mem alloc arrays
   function savestate($shm_max_mem) {
   
		$fd = @fopen( "shm.id", "w" );

		if (!$fd) {
            echo "shm_id not saved!!!\n";
			return false;
		}
		echo "Saving state...";
		$data = $shm_max_mem ."^". serialize($this->dpc_addr) . 
		                      "^". serialize($this->dpc_length); 

		fwrite($fd, $data);

		fclose($fd);      
		
		return true;
   }
   
   function getdpcmem($dpc) {
   
      if (isset($this->dpc_addr[$dpc])) {
   
        $my_dpc = shmop_read($this->dpc_shm_id, 
	                         $this->dpc_addr[$dpc], 
			  			     $this->dpc_length[$dpc]);
        if(!$my_dpc) 
          $ret = "Couldn't read from shared memory block the $dpc\n";
	    else
          $ret = $my_dpc . $this->dpc_addr[$dpc].':'.$this->dpc_length[$dpc]."\n";
		  //echo $this->dpc_addr[$dpc],':',$this->dpc_length[$dpc],"\n";
	  }
	  else
	    $ret = "Invalid dpc!";
			
	  return ($ret);	      
   }
   //client version
   function getdpcmemc($dpc) {
   
      if (isset($this->dpc_addr[$dpc])) {
   
        $my_dpc = shmop_read($this->dpc_shm_id, 
	                         $this->dpc_addr[$dpc], 
			  			     $this->dpc_length[$dpc]);

        $ret = $my_dpc;// . $this->dpc_addr[$dpc].':'.$this->dpc_length[$dpc]."\n";
		  //echo $this->dpc_addr[$dpc],':',$this->dpc_length[$dpc],"\n";
	  }
			
	  return ($ret);	      
   }   
   
   function closememdpc() {
   
      //Now lets delete the block and close the shared memory segment
      /*if(!shmop_delete($this->shm_id)) {
        echo "Couldn't mark shared memory block for deletion.\n";
      }	  
      shmop_close($this->shm_id);  
	  $this->shm_id = null;
	  */
	  
      if(!shmop_delete($this->dpc_shm_id)) {
        echo "Couldn't mark shared memory block for deletion.\n";
      }	  
	  shmop_close($this->dpc_shm_id);	
	  $this->dpc_shm_id = null;   
	  
	  //delete id file
	  echo "Deleting state..";
	  unlink("shm.id");
	  echo "Ok!\n";   
   }
   
   function shutdown() {
   
      $printout = $this->resources->get_resource('printer');   
   
	  if (is_resource($printout) &&
	      get_resource_type($printout)=='printer')
   	    printer_close($printout);	
   
	  echo "\nShutdown....\n";
      if ($this->usemem) $this->closememdpc();
   }
   
   function prn($message) {
   
      $printout = $this->resources->get_resource('printer');
   
	  if (is_resource($printout) &&
		  get_resource_type($printout)=='printer')
	     printer_write($printout,$message."\n\r");  	 
   }
   
   function show_connections($show=null) {
   
      $ret = $this->dmn->show_connections();
	  
	  //save in resources
      $this->resources->set_resource('_sessions',serialize($ret));	  
	  
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
   
   //return pseudo pointer for comaptibility with agentds class
   function get_agent($agent,$serialized=null) {
	  
	  return $this;	   
   }
   
   //return pseudo pointer for comaptibility with agentds class   
   function update_agent(&$o_agent,$agent) {
   
      return true;
   }       
   
    function scheduleprint() {
	     
      printer_write($this->resources->get_resource('printer'),
	                "SERVER print"."\n\r");  
		
    } 
	
	//check dpc modules for source editing!!!!(dif in size)
	//check if a new file added in dir also
	function check_dpcs() {
	
	   echo "check dpc modules...\n";	
	   $libs = $this->read_dpcs();
	   //echo "loading dpc extensions...\n";	
	   //$exts = $this->read_extensions();
	   
	   if (is_array($exts)) $tree = array_merge($libs,$exts); 
	                   else $tree = $libs;
	   //print_r($tree);  
	  
	   if ($libs) {
	   //print_r($libs);
	   //echo ".....\n";
	    $offset = 0;
	    foreach($tree as $dpc_id=>$dpc_mod) {
		  $dpcf = trim($dpc_mod);
	      if (($dpcf!='') && ($dpcf[0]!=';')) {
		
		    //$modules[] = $dpc_mod; 
			if (is_file($dpcf)) {
		      $checked_dpc_size = filesize($dpcf)+$this->extra_space;
			  
		      if ($checked_dpc_size) {
			    if ($checked_dpc_size!=$this->dpc_length[$dpcf]) {
			      $ret .= $dpcf . " Changed\n";
				  $this->load_dpc_at_runtime($dpcf);
			    }	
			    else	
			      $ret .= $dpcf . " Ok\n";
		      }
		      else {
	            $ret .= $dpcf . " Missing\n";
		      }
			}
			else {
	          $ret .= $dpcf . " New entry\n";
			  $this->load_dpc_at_runtime($dpcf);
		    }
			  	 
		  }
	    }
	  
	    $this->prn($ret);
		echo $ret;
	  
        return true; 
	  }
	  else
	    return false; 		
	}
	
   function load_dpc_at_runtime($dpcf) {
       
	    if (is_file($dpcf)) { 
   
		    $shared_dpc = file_get_contents($dpcf);
			
		    if ($shared_dpc) {
			
			  if ($offset = $this->dpc_addr[$dpcf]) {//exist
			    $this->dpc_addr[$dpcf] = $offset; //the same
				//compute new lenght and remaing extra space
				$old_length = $this->dpc_length[$dpcf];
				$current_length = strlen($shared_dpc);
				$dock_lenght = $old_length + $this->extra_space;
				if ($current_length<=$dock_lenght) {
				
				  $remaining = $dock_lenght - $current_lenght; 
			      //$this->dpc_length[$dpcf] = $current_length+$remaining;//ALLWAYS SAME
				  $data = $shared_dpc . str_repeat(' ',$remaining);
				  $this->shared_buffer = substr_replace($this->shared_buffer,$data,$offset,$dock_length);
				}
				else
				  echo $dpcf . " Error: increase extra space!";  
			  }
			  else {//add new
			    $offset = strlen($this->shared_buffer); //at the end
			    $this->dpc_addr[$dpcf] = $offset;			
			    $this->dpc_length[$dpcf] = strlen($shared_dpc)+$this->extra_space;
			    $offset+=$this->dpc_length[$dpcf];			
			    //add data space
		        $this->shared_buffer .= $shared_dpc;
			    //add extra space for reloading
			    $this->shared_buffer .= str_repeat(' ',$this->extra_space);
			  }
			  echo $dpcf . " Ok\n";
			  $ret = "Ok!";
		    }
		    else {
	          echo $dpcf . " Error\n";
			  $ret = "Error!";
		    }	
			
	        //print $shared_buffer;
	        $totalbytes = strlen($this->shared_buffer);
	        echo "\nTotal Bytes : ",$totalbytes,"\n";
			
            if ($this->usemem) $this->closememdpc(); //destroy
	  
	        $shm_max = $totalbytes; 
	  			
	        echo "Allocate shared memory segment ..."; //create
            $this->dpc_shm_id = shmop_open(0xfff, "c", 0644, $shm_max);
            if(!$this->dpc_shm_id) 
              die("Couldn't create shared memory segment. System Halted.\n");
	        else {  
              $shm_bytes_written = shmop_write($this->dpc_shm_id, $this->shared_buffer, 0);
              if($shm_bytes_written != $shm_max) {
                echo "Couldn't write the entire length of data\n";
              }
		      else	
		        $this->savestate($shm_max);
	          echo "Ok!\n";			 						
			}
			//return ($totalbytes);
			return ($ret);
		}
		
		return false;			   
   }  	  
   
   /////////////////////////////////////////////////////////////////// 
   //start kernel 
   function start_old() {
   
	  echo "Start..\n";   
   
      //load_dl('php_shmop',paramload('SHELL','os'));//<<<<
	  if (!extension_loaded('shmop')) dl('php_shmop.dll');

      // Create 100 bytes shared memory block with system id if 0xff3
      $shm_id = shmop_open(0xff3, "c", 0644, 100);
      if(!$shm_id) {
        echo "Couldn't create shared memory segment\n";
      }

      // Get shared memory block's size
      $shm_size = shmop_size($shm_id);
      echo "SHM Block Size: ".$shm_size. " has been created.\n";

      // Lets write a test string into shared memory
      $shm_bytes_written = shmop_write($shm_id, "my shared memory block", 0);
      if($shm_bytes_written != strlen("my shared memory block")) {
        echo "Couldn't write the entire length of data\n";
      }

      // Now lets read the string back
      $my_string = shmop_read($shm_id, 0, $shm_size);
      if(!$my_string) {
        echo "Couldn't read from shared memory block\n";
      }
      echo "The data inside shared memory was: ".$my_string."\n";


      ///////////////////////////////////////////////////load dpc tree
      $dpctree = $this->load_dpc_tree();
	  ///////////////////////////////////////////////allocate dpc tree
	  // Create shared memory block with system id if 0xff3
	  echo "Allocate shared memory segment ...";
      $dpc_shm_id = shmop_open(0xfff, "c", 0644, $dpctree);
      if(!$dpc_shm_id) 
        die("Couldn't create shared memory segment. System Halted.\n");
	  else {  
        $shm_bytes_written = shmop_write($shm_id, "my dpc tree", 0);
        if($shm_bytes_written != strlen("my 2 shared memory block")) {
          echo "Couldn't write the entire length of data\n";
        }
		else	
	      echo "Ok!\n";		
	  }	
		
      /////////////////////////////////////////////////////////////////
	  echo "\nOpening port....";	  
	  $scon = new socket_connector;
	  if (!$scon->opensocket("127.0.0.1",19123)) {
        die("\nError oppening port !\n");// $errstr ($errno)\n");
	  }
	  else {
	    echo "Ok!";    
	    $scon->writetosocket("GET http://127.0.0.1/webmail/action.func?t=hello HTTP/1.1\r\nHost: 127.0.0.1\r\n\r\n");
        //echo $scon->ReadAll();			  
	  }
	  	
	  echo "\nRunning....\n";
   
	  do {	

	    echo date('y-m-d h:m:s',time()) . ">";

        //echo $cd;//scon->readall(); 
	  }
	  while ((trim(fgets(fopen("php://stdin","r"),256)))!='q');// || 
	        // ($cd = $scon->readfromsocket(128)));	
			 
	  echo "\nClose port...";
      //@fclose ($fp);
	  $scon->closesocket();
	  unset($scon);
	  echo "Ok!";
	  
	  echo "\nShutdown....\n";
	  //////////////////////////////////////////////////////   shutdown
      //Now lets delete the block and close the shared memory segment
      if(!shmop_delete($shm_id)) {
        echo "Couldn't mark shared memory block for deletion.\n";
      }	  
      shmop_close($shm_id);   
	  
      if(!shmop_delete($dpc_shm_id)) {
        echo "Couldn't mark shared memory block for deletion.\n";
      }	  
	  shmop_close($dpc_shm_id);	  
	  
	  die("\nExit....\n");   
   }   
   
}
?>