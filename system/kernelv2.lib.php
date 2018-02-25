<?php

require_once("agents/daemon.lib.php");
require_once("agents/timer.lib.php");
require_once("agents/resources.lib.php");
require_once("agents/scheduler.lib.php");

   $glevel = 1;
   function _($str, $level=0, $crln=true) {
	    global $glevel;
	    $cr = $crln ? PHP_EOL : null;
		if ($level<=$glevel)
			echo ucfirst($str) . $cr;
		
		//echo null;
   }
   
   function _dump($data=null,$mode=null,$filename=null) {
	   $m = $mode ? $mode : 'w';
	   $f = $filename ? $filename : '/dumpsrv.log';

       if ($fp = @fopen (getcwd() . $f , $m)) {
           fwrite ($fp, $data);
           fclose ($fp);
           return true;
       }
       return false;
   }    

class kernelv2 {

   var $userLeveID;
   var $daemon_ip, $daemon_port, $daemon_type;
   var $dmn, $useprj, $agent, $dpcpath;
   
   var $shm_id, $dpc_shm_id, $dpc_addr, $dpc_length;
   var $shared_buffer ,$shared_buffer_sepdata;
   var $usemem, $dataspace, $datastreams;
   
   var $scheduler, $resources, $timer;
   var $extra_space;
   
   function __construct($dtype=null,$ip='127.0.0.1',$port='19123') {
	  $UserSecID = GetGlobal('UserSecID');
      $this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);   
	  $argc = $GLOBALS['argc'];
      $argv = $GLOBALS['argv'];  
	  
	  $this->extra_space = 1024 * 10; //kb //1000;// per file
	  $this->dataspace = 1024000 * 1; //mb //50000;
		  
	  $this->dpcpath = $argv[1] ? ((substr($argv[1],0,1)!='-') ? $argv[1] : './') : './';
      //$dtype = $argv[1] ? $argv[1] : '';
	  $this->daemon_type = $argv[1] ? ((substr($argv[1],0,1)=='-') ? substr($argv[1],1) : '') : '';//str_replace("-","",$dtype);
	  $this->daemon_ip = $argv[2] ? $argv[2] : '127.0.0.1';//$ip;//'192.168.4.203';
	  $this->daemon_port = $argv[3] ? $argv[3] : '19123';//$port;//19123;
	  	  
	  _("Daemon repository at $this->daemon_ip:$this->daemon_port");
	  
 	  //REGISTER PHPRES (client side,resources) protocol...			
      require_once("agents/resstream.lib.php"); 
	  $phpdac_c = stream_wrapper_register("phpres5","c_resstream");
	  if (!$phpdac_c) _("Client resource protocol failed to registered!");
		         else _("Client resource protocol registered!"); 	  

	  $this->timer = new timer($this);
	  
	  $this->shm_id= null;
	  $this->dpc_shm_id = null;
	  $this->dpc_attr = array();
	  $this->dpc_length = array();
	  $this->shared_buffer = null;
	  $this->shared_buffer_sepdata = null;
	  $this->datastreams = array();
	  
	  $this->useprj = null;
	  $this->agent = 'SH';//default
	  $this->usemem = 1;
	  
	  //init resources
	  $this->resources = new resources($this);	 	  
	  //$printer = "\\\\hermes\\OkiML320";
	  //$printout = printer_open($printer);//true;
	  if (is_resource($printout) &&
		  get_resource_type($printout)=='printer') {
	    printer_set_option($printout, PRINTER_MODE, 'RAW'); 
		
		$this->resources->set_resource($printer,$printout);
	  }	
	  $this->resources->set_resource('variable','myvalue');
	  	  
	  //init scheduler
	  $this->scheduler = new scheduler($this);

	  //initialize task from ready-loaded agents
	  $this->scheduler->schedule('kernel.scheduleprint','every','50');	  		  
      //$this->scheduler->schedule('kernel.check_dpcs','every','35');	  		  	  
      $this->scheduler->schedule('kernel.show_connections','every','20');		  
	  
	  if ($this->usemem) 
		  $this->startmemdpc();
	  
	  $this->startdaemon();
   }
   
   function startdaemon() {
   
      $this->dmn = new daemon($this->daemon_type,true);//,$this->printout);//'standalone',false);
      $this->dmn->setAddress ($this->daemon_ip);//'127.0.0.1');
      $this->dmn->setPort ($this->daemon_port);
      $this->dmn->Header = "PHPDAC5 Kernel v2, " . $this->daemon_ip . ':' . $this->daemon_port;

      $this->dmn->start ();  	
	  
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
	  
      $this->dmn->listen (1); 	    	       
   }
   
   //general purpose commands
   public function command_handler ($command, $arguments, $dmn) {
	   
      switch ($command) {
        case 'HELP':
                $commands = implode (' ', $dmn->valid_commands);
                $dmn->Println ('Valid Commands: ');
                $dmn->Println ($dmn->valid_commands);
                return true;
                break;
        case 'QUIT':
		        $dmn->changePrompt();
				//only in inetd mode
				if ($this->daemon_type=='inetd') 
					$this->shutdown();
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
		        $ret = 'myuse';
                $dmn->Println ($ret);
                return true;
                break;		
				
		case 'SETAGENT' : 
		        SetGlobal('__USERAGENT',strtoupper($arguments[0]));		
		case 'AGENT':
		        $dmn->Println ('Agent is '.GetGlobal('__USERAGENT'));
                return true;
                break;
				
		case 'SETLEVEL' : 
				$this->userLevelID = $arguments[0]; 
				SetSessionParam("UserSecID",encode($arguments[0]));
		case 'LEVEL':
		        $dmn->Println ('Level is '.decode(GetSessionParam("UserSecID")));
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
   public function phpdac_handler($command, $arguments, $dmn) {
   		
		//create command line from daemon			
		$shell_command = $command . " " . implode(' ',$arguments);			
					
		$dmn->Println ($shell_command); 
		return true;  
   } 

   private function startmemdpc() {
   
	  _("Start",1);   
   
	  if (!extension_loaded('shmop')) 
		  dl('php_shmop.dll');

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

      ////////////////load dpc tree
      $shm_max = $this->load_dpc_tree();
	  //set separator from data space
	  $this->shared_buffer_sepdata = $shm_max;
	  
	  ///////////////allocate dpc tree
	  // Create shared memory block with system id if 0xff3
	  $space = $shm_max + $this->dataspace;
	  _("Allocate shared memory segment... $space bytes",1);
      $this->dpc_shm_id = shmop_open(0xfff, "c", 0644, $shm_max + $this->dataspace);
      if(!$this->dpc_shm_id) 
		die("Couldn't create shared memory segment. System Halted.\n");
	  else {  
        $shm_bytes_written = shmop_write($this->dpc_shm_id, $this->shared_buffer, 0);
        if($shm_bytes_written != $shm_max) {
          die("Couldn't write the entire length of data\n");
        }
		else	
		  $this->savestate($shm_max);	
	  }	   
   } 
   
   //save shared mem resource id and mem alloc arrays
   private function savestate($shm_max_mem) {
   
		$fd = @fopen( "shm.id", "w" );

		if (!$fd) {
            echo "shm_id not saved!!!\n";
			return false;
		}
		_("Save state",1);
		$data = $shm_max_mem ."^". serialize($this->dpc_addr) . 
		                      "^". serialize($this->dpc_length); 

		fwrite($fd, $data);
		fclose($fd);      
		return true;
   }
   
   private function getdpcmem($dpc) {
   
      if (isset($this->dpc_addr[$dpc])) {
   
        $my_dpc = shmop_read($this->dpc_shm_id, 
	                         $this->dpc_addr[$dpc], 
			  			     $this->dpc_length[$dpc]);
        if(!$my_dpc) 
          $ret = "$dpc : couldn't read from shared memory block\n";
	    else
          $ret = $my_dpc . $this->dpc_addr[$dpc].':'.$this->dpc_length[$dpc]."\n";
		  //echo $this->dpc_addr[$dpc],':',$this->dpc_length[$dpc],"\n";
	  }
	  else
	    $ret = "Invalid dpc!";
			
	  return ($ret);	      
   }
   
   //client version
   private function getdpcmemc($dpc) {
	  $data =null; 
	  $checkDataSize = false;
   
      if (isset($this->dpc_addr[$dpc])) {
		//fetch dpc  
        echo "AAAAAAAAAAAAAAAAAAAAAA\n";
		if ($this->dpc_addr[$dpc] > $this->shared_buffer_sepdata) {
			//in data area
			if (substr($dpc,0,4)==='www.') {
				echo "111111111111111111111111\n";
				//include user/pass at url
				//$dpc = 'www.e-basis.gr/pdo.php';
				$user = 'info@e-basis.gr';
				$pass = "basis2012!@";
				$data = $this->httpcl($dpc,$user,$pass);
				_($data,2); //show new data
			}
			else {
				echo "222222222222222222222222\n";
				//local storage reload
				/*$data = @file_get_contents($this->dpcpath . $dpc); 
				$checkDataSize = true;*/
				//_($data,1); //dont show data
			}	

			//checkDataSize
			if (($checkDataSize===true) && ($current_length!=$old_length)) {
			  $offset = $this->dpc_addr[$dpc];
			  //compute new length and remaing extra space
			  $old_length = $this->dpc_length[$dpc];
			  $current_length = strlen($data);
			  $dock_length = $old_length + $this->extra_space;
							
			  if ($current_length <= $dock_length) {
				//clean mem var
				$c = str_repeat(' ',$dock_length);
				$this->shared_buffer = substr_replace($this->shared_buffer,$c,$offset,$dock_length);	
				//compure remaining
				$remaining = $dock_length - $current_length; 
				$data .=  str_repeat(' ',$remaining);
				$this->shared_buffer = substr_replace($this->shared_buffer,$data,$offset,$dock_length);
				
				if(!$this->dpc_shm_id) 
					die("Shared memory segment error. System Halted.\n");
				else //data + extra spaces (cleaned)  
					$shm_bytes_written = shmop_write($this->dpc_shm_id, $data, $offset);
				
				//update length and state
				$this->dpc_length[$dpc] = $current_length;
				$this->savestate($shm_max);
				
				_("$dpc Ok!",1);
				_dump("UPDATE\n\n\n\n" . $this->shared_buffer);
			  }
			  else
				die($dpc . " error, increase extra space!\n"); 
		    }//checkDataSize;
		}
		//read
		$data = shmop_read($this->dpc_shm_id, 
	                       $this->dpc_addr[$dpc], 
			  			   $this->dpc_length[$dpc]);
	  }
	  else { 
	    //fetch and save, new dpc or new data stream
	    if (is_readable($this->dpcpath . $dpc)) {
			echo "BBBBBBBBBBBBBBBBBBBB\n";
			//remote storage
			/** // Create a stream
			$opts = array(
				'http'=>array(
					'method'=>"GET",
					'header'=>"Accept-language: en\r\n" .
							"Cookie: foo=bar\r\n"
				)
			);
			$context = stream_context_create($opts);
			// Open the file using the HTTP headers set above
			$file = file_get_contents('http://www.example.com/', false, $context);
			*/
			//https://raw.github.com/stereobit-networlds/phpdac6/master/
			//local storage
			$data = @file_get_contents($this->dpcpath . $dpc);
		}
		else  {
			echo "CCCCCCCCCCCCCCCCCCCC\n";
			//include user/pass at url
			$dpc = 'www.e-basis.gr/pdo.php';
			$user = 'info@e-basis.gr';
			$pass = "basis2012!@";
		    $data = $this->httpcl($dpc,$user,$pass);
			
			//$this->scheduleDataStream(); //cron...
		}
		_($data,2);
		
		if (!$data) return false;	
		
		//echo $data . "\n\n";
		$databytes = strlen($data);
		$sb = strlen($this->shared_buffer);
			
		if (($sb + $databytes + $this->extra_space) < 
		    ($this->shared_buffer_sepdata + $this->dataspace)) {
			
			//find index to start
			$offset = 0;
			foreach ($this->dpc_length as $size)
				$offset += $size;
			  
			$this->dpc_addr[$dpc] = $offset;			
			$this->dpc_length[$dpc] = $databytes+$this->extra_space;
			
			//add data space
			$this->shared_buffer .= $data;
			//add extra space for reloading
			$this->shared_buffer .= str_repeat(' ',$this->extra_space);
			  
			if(!$this->dpc_shm_id) 
				die("Shared memory segment error. System Halted.\n");
			else   
				$shm_bytes_written = shmop_write($this->dpc_shm_id, $data, $offset);
				
			$this->savestate($shm_max);
				
			_("$dpc Ok!",1);
			_dump("INSERT\n\n\n\n" . $this->shared_buffer);
		}
		else	
			_($dpc . " error, increase data space!",1);		
		
		_("Data : " . $databytes, 1);
	  }
			
	  return ($data);	      
   }   
   
   private function closememdpc() {
   
      //Now lets delete the block and close the shared memory segment
      /*if(!shmop_delete($this->shm_id)) {
        echo "Couldn't mark shared memory block for deletion.\n";
      }	  
      shmop_close($this->shm_id);  
	  $this->shm_id = null;
	  */
	  
      if(!shmop_delete($this->dpc_shm_id)) {
        _("Couldn't mark shared memory block for deletion",1);
      }	  
	  shmop_close($this->dpc_shm_id);	
	  $this->dpc_shm_id = null;   
	  
	  //delete id file
	  unlink("shm.id");
	  _("Deleting state..Ok!",1);   
   }
   
   private function shutdown() {
   
      $printout = $this->resources->get_resource('printer');   
   
	  if (is_resource($printout) &&
	      get_resource_type($printout)=='printer')
   	    printer_close($printout);	
   
	  _("\nShutdown....\n",1);
      if ($this->usemem) $this->closememdpc();
   }       
   
    //return pseudo pointer for comaptibility with agentds class
    function get_agent($agent,$serialized=null) {
	  
	  return $this;	   
    }
   
    //return pseudo pointer for comaptibility with agentds class   
    function update_agent(&$o_agent,$agent) {
   
      return true;
    }       
	
	
   //DPC DIR FUNCS	
   private function read_dpcs() {
   
        $dpath = $this->dpcpath;
		$selections = array('libs');//array('agents','tcp'); 
   
	    if (is_dir($dpath)) {
		
          $mydir = dir($dpath);
		 
          while ($fileread = $mydir->read ()) {
	   
           //read directories
		   //if (($fileread!='.') && ($fileread!='..'))  { //ALL
		   if (in_array($fileread, $selections)) { 

	          if (is_dir($dpath."/".$fileread)) {

                 $mysubdir = dir($dpath."/".$fileread);
                 while ($subfileread = $mysubdir->read ()) {	
				 
		           if (($subfileread!='.') && ($subfileread!='..'))  {
				   
                       if ((stristr ($subfileread,".dpc.php")) || 
					       (stristr ($subfileread,".lib.php")))  
				           $mydpc[] = $fileread."/".$subfileread;								     
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
   private function read_extensions() {
   
        $dpath = $this->dpcpath . "system/extensions";
   
	    if (is_dir($dpath)) {
		
          $mydir = dir($dpath);
		 
          while ($fileread = $mydir->read ()) {
	   
           //read directories
		   if (($fileread!='.') && ($fileread!='..'))  {

	          if (is_dir($dpath."/".$fileread)) {

                 $mysubdir = dir($dpath."/".$fileread);
                 while ($subfileread = $mysubdir->read ()) {	
				 
		           if (($subfileread!='.') && ($subfileread!='..'))  {
				   
                       if (stristr ($subfileread,".php")) 
				           $mydpcext[] = 'system/extensions/'.$fileread."/".$subfileread;							     
				   }
				 }
			  }
		   }
	      }
	      $mydir->close ();
        }
		return ($mydpcext);   
   }   
   
   private function load_dpc_tree() {
   	
	   _("loading dpc modules...",1);	
	   $libs = $this->read_dpcs();
	   //echo "loading dpc extensions...\n";	
	   //$exts = $this->read_extensions();
	   
	   if (is_array($exts)) 
		   $tree = array_merge($libs,$exts); 
	   else 
		   $tree = $libs;
	   //print_r($tree);  
	  
	   if ($tree) {
	   //print_r($tree);
	   //echo ".....\n";
	    $offset = 0;
	    foreach($tree as $dpc_id=>$dpc_mod) {
		  $dpcf = trim($dpc_mod);
	      if (($dpcf!='') && ($dpcf[0]!=';')) {
		
		    $shared_dpc = @file_get_contents($dpcf);

		    if ($shared_dpc) {
			  $this->dpc_addr[$dpcf] = $offset;			
			  $this->dpc_length[$dpcf] = strlen($shared_dpc)+$this->extra_space;
			  $offset+=$this->dpc_length[$dpcf];			
			  //add data space
		      $this->shared_buffer .= $shared_dpc;
			  //add extra space for reloading
			  $this->shared_buffer .= str_repeat(' ',$this->extra_space);
			  
			  _($dpcf . " Ok",1);
		    }
		    else 
	          _($dpcf . " Error",1);
	 
		  }
	    }
	    //print $shared_buffer;
	    $totalbytes = strlen($this->shared_buffer);
	    _("\nTotal Bytes : ".$totalbytes,1);
		
		//print_r($this->dpc_addr);
		//print_r($this->dpc_length);
	  
        return $totalbytes; 
	  }
	  else
	    die("Dpc tree error. System Halted.\n"); 		
   }   	   
   
   
    //UTILS
	
    public function prn($message) {
   
      $printout = $this->resources->get_resource('printer');
   
	  if (is_resource($printout) &&
		  get_resource_type($printout)=='printer')
	     printer_write($printout,$message."\n\r");  	 
    }
   
    public function show_connections($show=null) {
   
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

	private function scheduleDataStream() {
		$this->datastreams[$dpc] = "x"; //cron
		//...
		return true;
	}

    public function scheduleprint() {
		//start a client (auto)
		exec('start /D d:\php\bin agentds pdo');// pdo');// -inetd');
	
        $url = 'www.e-basis.gr/pdo.php';
		$user = 'info@e-basis.gr';
		$pass = "basis2012!@";
		//$data = $this->httpcl($url,$user,$pass);
		//if (isset($data)) {
		/*if ($data = $this->httpcl($url,$user,$pass)) {
			//$lines = explode('@;@', $data);
			//foreach ($lines as $line)
				//$jd[] = json_decode($line);
			//print_r($jd);
			echo $data . "\n\n";
			//$this->resources->set_resource('http',$data);
			
			  $offset = $this->shared_buffer_sepdata;
			  $this->dpc_addr[$url] = $offset;			
			  $this->dpc_length[$url] = strlen($data)+$this->extra_space;
			
			  //add data space
		      $this->shared_buffer .= $data;
			  //add extra space for reloading
			  $this->shared_buffer .= str_repeat(' ',$this->extra_space);
			  
			  if(!$this->dpc_shm_id) 
				die("Shared memory segment error. System Halted.\n");
			  else {  
				$shm_bytes_written = shmop_write($this->dpc_shm_id, $data, $offset);
				if ($shm_bytes_written < $this->dataspace) {
				  	$this->savestate($shm_max);
				    echo "PDO Ok!\n";	
				}
				else	
					echo "PDO Couldn't write the entire length of data\n";	
			  }		
			
			//start a client (auto)
			exec('start /D d:\php\bin agentds pdo');// -inetd');
		}
		
	      
        //printer_write($this->resources->get_resource('printer'), "SERVER print"."\n\r");  
		
		
		$databytes = strlen($data);	
		_("Data : " . $databytes,1);
		*/
		_("SERVER print");		
		$totalbytes = strlen($this->shared_buffer);
	    _("\nTotal Bytes : ".$totalbytes. '(' . memory_get_usage() .")",1);
		return true;
    } 	
   
	public function httpcl($url=null, $user=null,$password=null) {
		if (!$url) return null;
		
		require_once("tcp/sasl.lib.php");
		require_once("tcp/httpclient.lib.php");		
		
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
				
		echo "Opening connection to:\n",HtmlSpecialChars($arguments["HostName"]),"\n";
		flush();
		$error=$http->Open($arguments);
				
		if ($error=="") {
			echo "Sending request for page:\n";
			echo HtmlSpecialChars($arguments["RequestURI"]),"\n";
			if(strlen($user))
				echo "\nLogin:    ",$user,"\nPassword: ",str_repeat("*",strlen($password));
			echo "\n";
			flush();
			$error=$http->SendRequest($arguments);
			echo "\n";

			if($error=="") {
				echo "Request:\n\n".HtmlSpecialChars($http->request)."\n";
				echo "Request headers:\n\n";
				for(Reset($http->request_headers),$header=0;$header<count($http->request_headers);Next($http->request_headers),$header++)
				{
					$header_name=Key($http->request_headers);
					if(GetType($http->request_headers[$header_name])=="array")
					{
						for($header_value=0;$header_value<count($http->request_headers[$header_name]);$header_value++)
							echo $header_name.": ".$http->request_headers[$header_name][$header_value],"\r\n";
					}
					else
						echo $header_name.": ".$http->request_headers[$header_name],"\r\n";
				}
				echo "\n";
				flush();
				
				$headers=array();
				$error=$http->ReadReplyHeaders($headers);
				echo "\n";
				if($error=="")
				{
					echo "Response status code:\n".$http->response_status;
					switch($http->response_status)
					{
						case "301":
						case "302":
						case "303":
						case "307":
							echo " (redirect to ".$headers["location"].")\nSet the follow_redirect variable to handle redirect responses automatically.";
							break;
					}
					echo "\n";
					echo "Response headers:\n\n";
					for(Reset($headers),$header=0;$header<count($headers);Next($headers),$header++)
					{
						$header_name=Key($headers);
						if(GetType($headers[$header_name])=="array")
						{
							for($header_value=0;$header_value<count($headers[$header_name]);$header_value++)
								echo $header_name.": ".$headers[$header_name][$header_value],"\r\n";
						}
						else
							echo $header_name.": ".$headers[$header_name],"\r\n";
					}
					echo "\n";
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

					echo "\n";
					//flush();
				}
			}
			$http->Close();
			
		}
		if(strlen($error)) {
			echo "Error: ",$error,"\n";
			return null;	
		}

		return ($body);		
	}   
   
}
?>