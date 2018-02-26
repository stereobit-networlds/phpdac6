<?php

require_once("agents/daemon.lib.php");
require_once("agents/timer.lib.php");
require_once("agents/resources.lib.php");
require_once("agents/scheduler.lib.php");

define ("GLEVEL", 1);   

   function _($str, $level=0, $crln=true) {

	    $cr = $crln ? PHP_EOL : null;
		if ($level<=GLEVEL)
			echo ucfirst($str) . $cr;
		
		_dump(date ("Y-m-d H:i:s :").$str.PHP_EOL,'a+','/dumpsrv-'.$_SERVER['COMPUTERNAME'].'.log');
   }
   
   function _dump($data=null,$mode=null,$filename=null) {
	   $m = $mode ? $mode : 'w';
	   $f = $filename ? $filename : '/dumpmem-'.$_SERVER['COMPUTERNAME'].'.log';

       if ($fp = @fopen (getcwd() . $f , $m)) {
           fwrite ($fp, $data);
           fclose ($fp);
           return true;
       }
       return false;
   }    

class kernelv2 {

   var $userLeveID, $verboseLevel;
   var $daemon_ip, $daemon_port, $daemon_type;
   var $dmn, $useprj, $agent, $dpcpath;
   
   var $shm_id, $dpc_shm_id, $dpc_addr, $dpc_length, $dpc_free;
   var $shared_buffer ,$shared_buffer_sepdata;
   var $usemem, $dataspace, $datastreams;
   
   var $scheduler, $resources, $timer;
   var $extra_space;
   
   function __construct($dtype=null,$ip='127.0.0.1',$port='19123') {
	  $UserSecID = GetGlobal('UserSecID');
      $this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);   
	  $argc = $GLOBALS['argc'];
      $argv = $GLOBALS['argv']; 

	  $this->verboseLevel = GLEVEL;	  
	  
	  $this->extra_space = 1024 * 10; //kb //1000;// per file
	  $this->dataspace = 1024000 * 1; //mb //50000;
		  
	  $this->dpcpath = $argv[1] ? ((substr($argv[1],0,1)!='-') ? $argv[1] : './') : './';
      //$dtype = $argv[1] ? $argv[1] : '';
	  $this->daemon_type = $argv[1] ? ((substr($argv[1],0,1)=='-') ? substr($argv[1],1) : '') : '';//str_replace("-","",$dtype);
	  $this->daemon_ip = $argv[2] ? $argv[2] : '127.0.0.1';//$ip;//'192.168.4.203';
	  $this->daemon_port = $argv[3] ? $argv[3] : '19123';//$port;//19123;
	  	  
	  _("Daemon repository at $this->daemon_ip:$this->daemon_port",1);
	  
 	  //REGISTER PHPRES (client side,resources) protocol...			
      require_once("agents/resstream.lib.php"); 
	  $phpdac_c = stream_wrapper_register("phpres5","c_resstream");
	  if (!$phpdac_c) _("Client resource protocol failed to registered!");
		         else _("Client resource protocol registered!",2); 	  

	  $this->timer = new timer($this);
	  
	  $this->shm_id= null;
	  $this->dpc_shm_id = null;
	  $this->dpc_attr = array();
	  $this->dpc_length = array();
	  $this->dpc_free = array();
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
	  /*if (is_resource($printout) &&
		  get_resource_type($printout)=='printer') {
	    printer_set_option($printout, PRINTER_MODE, 'RAW'); 
		
		$this->resources->set_resource($printer,$printout);
	  }	*/
	  $this->resources->set_resource('variable','myvalue');
	  	  
	  //init scheduler
	  $this->scheduler = new scheduler($this);
      //$this->scheduler->schedule('env.show_connections','every','20');		  	  		  
	  $this->scheduler->schedule('env.scheduleprint','every','20');	  
	  $this->scheduler->schedule('env.internalClient','every','50');	  		  
	  
	  if ($this->usemem) 
		  $this->startmemdpc();
	  
	  $this->startdaemon();
   }
   
   private function startdaemon() {
   
      $this->dmn = new daemon($this->daemon_type,true,$this);//'standalone',false);
      $this->dmn->setAddress ($this->daemon_ip);//'127.0.0.1');
      $this->dmn->setPort ($this->daemon_port);
      $this->dmn->Header = "PHPDAC5 Kernel v2, " . $this->daemon_ip . ':' . $this->daemon_port;

      $this->dmn->start ();  	
	  
      $this->dmn->setCommands (array ("help", "quit", "date", "shutdown","echo","silence",
	                                  "ver","use","agent","setagent","level","setlevel",
									  "getdpcmem","getdpcmemc","helo","run",
									  "print","getresource", "getresourcec", "showresources", 
									  "findresource", "findresourcec", "setresource", "delresource",
									  "checkschedules","showschedules", "setschedule", 
									  "who", "http", "***"));
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
	  $this->dmn->CommandAction ("setschedule", array($this,"command_handler"));
      $this->dmn->CommandAction ("who", array($this,"command_handler"));	  
	  $this->dmn->CommandAction ("http", array($this,"command_handler"));	  
	  	  	  	  	  
	  $this->dmn->CommandAction ("***", array($this,"phpdac_handler"));//handle everyting else...	  
	  
	  //init batch
	  $this->exebatchfile($this->dmn, 'kernel.ash', true);
      $this->dmn->listen(1); 	    	       
   }
   
   private function exebatchfile(&$dmn,$file=null,$w=false) {
	    if (!$file) return false;
		
		$batchfile = getcwd() . '/' . $file;
		
		if ((is_readable($batchfile)) && ($f = @file($batchfile))) {
			
			_('Init batch file: ' . $batchfile,1); 
			if (!empty($f)) {
			  //print_r($f);
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
                $dmn->Println (date ("Y-m-d H:i:s"));
                return true;
                break;
        case 'SHUTDOWN':
		        $dmn->changePrompt();
                $dmn->shutdown();
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
				
		case 'SETSCHEDULE' :
				$entry = $this->scheduler->schedule($arguments[0],$arguments[1],$arguments[2]);	
				$dmn->Println($entry);
				return true;
		        break;				
				
		case 'WHO':
		        $sessions = $this->show_connections(1);
				$dmn->Println($sessions);
				return true;
		        break;														
				
		case 'HTTP':
		        $data = $this->httpcl($arguments[0],$arguments[1],$arguments[2]);
				$this->savedpcmem($arguments[0],$data);
				$dmn->Println($data);
				
				return true;
		        break;				
      }
   }  
   
   //phpdac command dispatcher (all *** commands)
   public function phpdac_handler($command, $arguments, $dmn) {
   		
		//create command line from daemon			
		$shell_command = $command . " " . implode(' ',$arguments);			
					
		$dmn->Println($shell_command); 
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
	  _("Allocate shared memory segment... $space bytes",2);
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
		_("Save state",2);
		$data = $shm_max_mem ."@^@". serialize($this->dpc_addr) . 
		                      "@^@". serialize($this->dpc_length). 
							  "@^@". serialize($this->dpc_free). 
							  "@^@". serialize($this->shared_buffer); 

		fwrite($fd, $data);
		fclose($fd);      
		return true;
   }
   
   //fetch shared mem
   private function loaddpcmem($dpc) {
	    $dpc = $this->dehttpDpc($dpc);
	   
		if (isset($this->dpc_addr[$dpc])) {
   
			return 
			shmop_read($this->dpc_shm_id, 
	                   $this->dpc_addr[$dpc], 
			 	       $this->dpc_length[$dpc]);
        }
		return false; 	
   }   
   
   //save calls,urls etc into shared mem
   private function savedpcmem($dpc,&$data) {
	   $dpc = $this->dehttpDpc($dpc);
	   
	   if (isset($this->dpc_addr[$dpc])) {
			//rewrite
			//fetch dpc   
			$offset = $this->dpc_addr[$dpc];
			$length = $this->dpc_length[$dpc]; 
			$free = $this->dpc_free[$dpc];
			$rlength = intval($length - $free);
			$oldData = substr($this->shared_buffer,$offset,$length);		
		     
			if (isset($data)) {
			
			  //$dock_length = $length + $this->extra_space;			
			  $dataLength = strlen($data); 
			  $remaining = $length - $dataLength;
			  _("diff:" . $length.':'.$dataLength,1);
				
			  $hold = md5($oldData);	
			  $hnew = md5($data . str_repeat(' ',$remaining));
			  _("md5:" . $hold . ':'. $hnew,1);
						
			  if ($dataLength < $length) {
				//clean mem var
				$c = str_repeat(' ',$length);
				$this->shared_buffer = substr_replace($this->shared_buffer,$c,$offset,$length);	
 
				$data .=  str_repeat(' ',$remaining);
				$this->shared_buffer = substr_replace($this->shared_buffer,$data,$offset,$length);
				
				if(!$this->dpc_shm_id) 
					die("Shared memory segment error. System Halted.\n");
				else //data + extra spaces (cleaned)  
					$shm_bytes_written = shmop_write($this->dpc_shm_id, $data, $offset);
				
				//update free space and save state
				$this->dpc_free[$dpc] = $remaining;
				$this->savestate($shm_max);
				
				_("$dpc saved",1);
				_dump("SAVE\n\n\n\n" . $this->shared_buffer);
			  }
			  else
				die($dpc . " error, increase extra space!\n"); 
			
			}//if data			 
	   }
	   else { //write
	   
			if (!$data) return false;	
			_($data,3);
		
			$databytes = strlen($data);
			$sb = strlen($this->shared_buffer);
			
			if (($sb + $databytes + $this->extra_space) < 
				($this->shared_buffer_sepdata + $this->dataspace)) {
			
				//find index to start
				$offset = 0; //sb ??????????
				foreach ($this->dpc_length as $size)
					$offset += $size;
			  
				$this->dpc_addr[$dpc] = $offset;			
				$this->dpc_length[$dpc] = $databytes + $this->extra_space;
				$this->dpc_free[$dpc] = $this->extra_space;
			
				//add data space
				$this->shared_buffer .= $data;
				//add extra space for reloading
				$this->shared_buffer .= str_repeat(' ',$this->extra_space);
			  
				if(!$this->dpc_shm_id) 
					die("Shared memory segment error. System Halted.\n");
				else   
					$shm_bytes_written = shmop_write($this->dpc_shm_id, $data, $offset);
				
				$this->savestate($shm_max);
				
				_("$dpc Ok",1);
				_dump("LOAD\n\n\n\n" . $this->shared_buffer);
			}
			else	
				die($dpc . " error, increase data space!");		
		
			_("Data : " . $databytes, 2);	     
	   }
	   
	   return ($data);
   }    
   
   private function getdpcmem($dpc) {
	   $dpc = $this->dehttpDpc($dpc);
   
      /*if (isset($this->dpc_addr[$dpc])) {
   
        $my_dpc = shmop_read($this->dpc_shm_id, 
	                         $this->dpc_addr[$dpc], 
			  			     $this->dpc_length[$dpc]);
        if(!$my_dpc) 
          $ret = "$dpc : couldn't read from shared memory block\n";
	    else
          $ret = $my_dpc . 
				 $this->dpc_addr[$dpc] .':'.
				 $this->dpc_length[$dpc] .':'.
				 $this->dpc_free[$dpc] ."\n";
		  //echo $ret . "\n";
	  }
	  else
	    $ret = "Invalid dpc!";*/
	  if ($data = $this->loaddpcmem($dpc))
		  $ret = $data . 
			     $this->dpc_addr[$dpc] .':'.
				 $this->dpc_length[$dpc] .':'.
				 $this->dpc_free[$dpc] ."\n";
	  else
		  $ret = "Invalid dpc!";
	  
	  return ($ret);	      
   }	  
   
   //client version
   private function getdpcmemc($dpc) {
	  $dpc = $this->dehttpDpc($dpc);
	  $data = null; 	  

      if (isset($this->dpc_addr[$dpc])) {
		//fetch dpc   
		$offset = $this->dpc_addr[$dpc];
	    $length = $this->dpc_length[$dpc]; 
		$free = $this->dpc_free[$dpc];
		$rlength = intval($length - $free);
		$oldData = substr($this->shared_buffer,$offset,$length);		
		
        //echo "AAAAAAAAAAAAAAAAAAAAAA\n";
		//dpc and streams that exists in data area only
		if ($offset >= $this->shared_buffer_sepdata) {
 
			if (substr($dpc,0,4)==='www.') {
				//echo "111111111111111111111111\n";
				//include user/pass at url
				//$dpc = 'www.e-basis.gr/pdo.php';
				$user = 'info@e-basis.gr';
				$pass = "basis2012!@";
				
				if (!$this->scheduler->findschedule($dpc)) {
					$data = $this->httpcl($dpc,$user,$pass);
					_($data,3); //show new data
				}
				else {
					$data = null; //bypass
					_('Scheduled data stream:' . $dpc,1);
					_($data,3);
				}	
			}
			else {
				//echo "222222222222222222222222\n";
				//local storage reload  
				$sf = filesize($this->dpcpath . $dpc);
				_("Size:" . $rlength .':' . $sf,2);
				if ($rlength != $sf) {
					$data = @file_get_contents($this->dpcpath . $dpc); 
					_($data,3); 
				}	
				else
					$data = null; //bypass
			}	
			
			if (isset($data)) {
			
			  //$dock_length = $length + $this->extra_space;			
			  $dataLength = strlen($data); 
			  $remaining = $length - $dataLength;
			  _("diff:" . $length.':'.$dataLength,2);
				
			  $hold = md5($oldData);	
			  $hnew = md5($data . str_repeat(' ',$remaining));
			  _("md5:" . $hold . ':'. $hnew,2);
						
			  if ($dataLength < $length) {
				//clean mem var
				$c = str_repeat(' ',$length);
				$this->shared_buffer = substr_replace($this->shared_buffer,$c,$offset,$length);	
 
				$data .=  str_repeat(' ',$remaining);
				$this->shared_buffer = substr_replace($this->shared_buffer,$data,$offset,$length);
				
				if(!$this->dpc_shm_id) 
					die("Shared memory segment error. System Halted.\n");
				else //data + extra spaces (cleaned)  
					$shm_bytes_written = shmop_write($this->dpc_shm_id, $data, $offset);
				
				//update free space and save state
				$this->dpc_free[$dpc] = $remaining;
				$this->savestate($shm_max);
				
				_("$dpc updated",1);
				_dump("UPDATE\n\n\n\n" . $this->shared_buffer);
			  }
			  else
				die($dpc . " error, increase extra space!\n"); 
			
			}//if data
		}
		
		//else read mem
		_("$dpc read",2);
		$data = shmop_read($this->dpc_shm_id, 
	                       $offset, 
			  			   $length);
	  }
	  else { 
	    //fetch and save, new dpc or new data stream
	    if (is_readable($this->dpcpath . $dpc)) {
			//echo "BBBBBBBBBBBBBBBBBBBB\n";
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
		else  { //datastream 
			//echo "CCCCCCCCCCCCCCCCCCCC\n";
			//include user/pass at url
			//$dpc = 'www.e-basis.gr/pdo.php';
			$user = 'info@e-basis.gr';
			$pass = "basis2012!@";
			if (!$this->scheduler->findschedule($dpc)) 
				$data = $this->httpcl($dpc,$user,$pass);
			else
				$data = null; //bypass				
		}
		
		if (!$data) return false;	
		_($data,3);		
		
		$databytes = strlen($data);
		$sb = strlen($this->shared_buffer);
			
		if (($sb + $databytes + $this->extra_space) < 
		    ($this->shared_buffer_sepdata + $this->dataspace)) {
			
			//find index to start
			$offset = 0; //$sb ????
			foreach ($this->dpc_length as $size)
				$offset += $size;
			  
			$this->dpc_addr[$dpc] = $offset;			
			$this->dpc_length[$dpc] = $databytes + $this->extra_space;
			$this->dpc_free[$dpc] = $this->extra_space;
			
			//add data space
			$this->shared_buffer .= $data;
			//add extra space for reloading
			$this->shared_buffer .= str_repeat(' ',$this->extra_space);
			  
			if(!$this->dpc_shm_id) 
				die("Shared memory segment error. System Halted.\n");
			else   
				$shm_bytes_written = shmop_write($this->dpc_shm_id, $data, $offset);
				
			$this->savestate($shm_max);
				
			_("$dpc Ok",1);
			_dump("INSERT\n\n\n\n" . $this->shared_buffer);
		}
		else	
			die($dpc . " error, increase data space!");		
		
		_("Data : " . $databytes, 2);
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
	  
	  //delete id file //<<<<<<<<<<<<<<<<< recall ???
	  unlink("shm.id");
	  _("Deleting state..Ok!",2);   
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
   	
	   _("loading dpc modules...",2);	
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
			  $this->dpc_free[$dpcf] = $this->extra_space;
			  
			  $offset+=$this->dpc_length[$dpcf];
			  
			  //add data space
		      $this->shared_buffer .= $shared_dpc;
			  //add extra space for reloading
			  $this->shared_buffer .= str_repeat(' ',$this->extra_space);
			  
			  _($dpcf . " Ok",2);
		    }
		    else 
	          _($dpcf . " Error",2);
	 
		  }
	    }
	    //print $shared_buffer;
	    $totalbytes = strlen($this->shared_buffer);
	    _("\nTotal Bytes : ".$totalbytes,2);
		
		//print_r($this->dpc_addr);
		//print_r($this->dpc_length);
	  
        return $totalbytes; 
	  }
	  else
	    die("Dpc tree error. System Halted.\n"); 		
   }   	   
   
   
    //UTILS
	
	//for data streams dpc address extract args
	public function dehttpDpc($dpc) {
		
	  if (strstr($dpc,"\\")) { //data stream
			//cut cmd params
			$arg = explode("\\",$dpc);
			return $arg[1];
      }
	  return $dpc; //as is
    }   
	
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
	  
	  //else //echoed
	    //return ($ret);
    } 
	
    public function show_schedules() {
   
      $sh = $this->scheduler->showschedules();
	  
	  //save in resources
      $this->resources->set_resource('_schedules',serialize($sh));	  
	 
	  //return ($sh);
    }	
	
	public function internalClient($set=false) {
		$batch = $set ? $set : '';//pdo
		
		//start a client (auto)
		exec("start /D d:\php\bin agentds pdo");// -inetd");
	}

    public function scheduleprint() {
		
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
		_("Data : " . $databytes,2);
		*/
		_("SERVER print",1);
		_($this->show_connections(),1);
		_($this->show_schedules(),1);
			
		$totalbytes = strlen($this->shared_buffer);
	    _("Total buffer : ".$totalbytes. ', usage: ' . memory_get_usage(),1);
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
   
}
?>