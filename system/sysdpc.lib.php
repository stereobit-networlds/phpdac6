<?php
if (!defined("SYSDPC_DPC")) {
define("SYSDPC_DPC",true);

class sysdpc {

    private $_actions;
	private $_events;
	private $_attr;
	private $_security;
    private $systemdb;

    public function __construct() {
	
		$this->_events  = array();	  	
		$this->_actions = array();
		$this->_attr    = array();
		$this->_security= array();	  
    }
	
	//create a new dpc object (mode:batch)
	protected function _new($dpc,$type) {
      global $__DPC,$__DPCSEC,$__DPCMEM,$__ACTIONS,$__EVENTS,$__LOCALE,$__PARSECOM,
             $__BROWSECOM,$__BROWSEACT,$__PRIORITY,$__QUEUE,$__DPCATTR,$__DPCPROC;	  

	  global $activeDPC,$info,$xerror,$GRX,$argdpc; //IMPORTANT GLOBALS!!!
	  
	  global $__DPCOBJ; //holds objects of new approach of name of type xxx.yyy
	  global $__DPCID; //array of new name alias	  
	  
	  $__DPCMEM = GetGlobal('__DPCMEM');
	  $__DPC = GetGlobal('__DPC');
	  
	  //START THE OBJECT
      $parts = explode(".",trim($dpc)); 
	  $class = strtoupper($parts[1]).'_DPC';
	  
	  //update local table
      $this->make_local_table($class);		  
	  
	  if ((defined($class)) &&
	      (class_exists($__DPC[$class])) ) {
		//echo '>>>',strtoupper($parts[1]),'_DPC','=',$__DPC[strtoupper($parts[1]).'_DPC'];
	    $__DPCMEM[$class] =  & new $__DPC[$class];
		$__DPCOBJ[$dpc] =  & $__DPCMEM[$class];//alias of new name object array
		$__DPCID[$class] = $dpc; //new name index array		 
		
		SetGlobal("_DPCMEM",$__DPCMEM);
		
		return TRUE;
	  }	  
	
	  return FALSE; 	  		
	}	
	
	//create a new dpc object instance based on a dpc as is
	protected function _newinstance($instname,$dpc,$type) {
      global $__DPC,$__DPCSEC,$__DPCMEM,$__ACTIONS,$__EVENTS,$__LOCALE,$__PARSECOM,
             $__BROWSECOM,$__BROWSEACT,$__PRIORITY,$__QUEUE,$__DPCATTR,$__DPCPROC;	  

	  global $activeDPC,$info,$xerror,$GRX,$argdpc; //IMPORTANT GLOBALS!!!
	  
	  global $__DPCOBJ; //holds objects of new approach of name of type xxx.yyy
	  global $__DPCID; //array of new name alias	  
	  
	  $__DPCMEM = GetGlobal('__DPCMEM');
	  $__DPC = GetGlobal('__DPC');
	  
	  //START THE OBJECT
      $parts = explode(".",trim($dpc)); 
	  $class = strtoupper($parts[1]).'_DPC';
	  
	  $idpc = $parts[0].".".$instname;
	  $iclass = strtoupper($instname).'_DPC';
	  
	  //update local table
      //$this->make_local_table($class);		  
	  
	  if ((defined($class)) &&
	      (is_object($__DPCMEM[$class])) ) {
		  
		//echo '>>>',strtoupper($parts[1]),'_DPC','=',$__DPC[strtoupper($parts[1]).'_DPC'];
		//echo " ",$iclass,">>>",$idpc;
	    if ((!defined($iclass)) &&
	        (!isset($__DPCMEM[$iclass])) ) {		
		  
		  define($iclass,true); //define instance
		
	      $__DPCMEM[$iclass] =  & new $__DPC[$class];
		  $__DPCOBJ[$idpc] =  & $__DPCMEM[$iclass];//alias of new name object array
		  $__DPCID[$iclass] = $idpc; //new name index array		 
		
		  SetGlobal("_DPCMEM",$__DPCMEM);
		
		  return TRUE;
		}
		else
		  die("Instance error! Name conflicts,");  
	  }	  
	
	  return FALSE; 	  		
	}	
	
	//create a new dpc object instance based on a subclass of a dpc where construct diferrent	
	protected function _newinstance2($instname) {
      global $__DPC,$__DPCSEC,$__DPCMEM,$__ACTIONS,$__EVENTS,$__LOCALE,$__PARSECOM,
             $__BROWSECOM,$__BROWSEACT,$__PRIORITY,$__QUEUE,$__DPCATTR,$__DPCPROC;	  

	  global $activeDPC,$info,$xerror,$GRX,$argdpc; //IMPORTANT GLOBALS!!!
	  
	  global $__DPCOBJ; //holds objects of new approach of name of type xxx.yyy
	  global $__DPCID; //array of new name alias		
	
	  $idpc = $parts[0].".".$instname;
	  $iclass = strtoupper($instname).'_DPC';	
	
	  if ((!defined($iclass)) &&
	      (!isset($__DPCMEM[$iclass])) ) {		
		  
		  define($iclass,true); //define instance
		
	      $__DPCMEM[$iclass] =  & new $instname;
		  $__DPCOBJ[$idpc] =  & $__DPCMEM[$iclass];//alias of new name object array
		  $__DPCID[$iclass] = $idpc; //new name index array		 
		
		  SetGlobal("_DPCMEM",$__DPCMEM);
		  //echo "OK";
		  return TRUE;
	  }
      else
		  die("Instance error! Name conflicts,"); 	 	
	}	
   	
	//transfer events,action,attributes,locales from parent to child
	//it used when a dpc inherit from other dpc and
	//parent dpc just included where child dpc loaded by script 
	public function get_parent($parent,$child) {
	  
	  
	  $GLOBALS["__EVENTS"][$child] = $GLOBALS["__EVENTS"][$parent];
	  $GLOBALS["__EVENTS"][$parent] = array();
	  $GLOBALS["__ACTIONS"][$child] = $GLOBALS["__ACTIONS"][$parent];
	  $GLOBALS["__ACTIONS"][$parent] = array();
	  $GLOBALS["__DPCATTR"][$child] = $GLOBALS["__DPCATTR"][$parent];
	  $GLOBALS["__DPCATTR"][$parent] = array();	  
	  
	  //compatibility for script parser commands
	  $GLOBALS["__PARSECOM"][$child] = $GLOBALS["__PARSECOM"][$parent];
	  $GLOBALS["__PARSECOM"][$parent] = array();	  
	    
	  
	  //PARENT LOCALES TO MEMORY	  
	  $this->make_local_table($parent);
	}	
	
    //special fun to make all entries in locales root enabled
    protected function make_local_table($dpc=null,$debug=null) {
        $loc = GetGlobal('__LOCALE');
        $lr = GetGlobal('__DPCLOCALE');
   
	    //echo $dpc,">>><br>";
	    if (is_array($loc[$dpc])) {
		
	        foreach ($loc[$dpc] as $id=>$explain) {
	         $parts = explode(";",$explain);
		     $lr[$parts[0]] = $parts[1].";".$parts[2].";".$parts[3];
	        }		 
			
			if ($debug) {
	          echo $dpc,'<br>';
		      print_r($lr);
		      echo '<br>';
			}			
	    }
	 
	    SetGlobal('__DPCLOCALE',$lr);
    }
	
	function __destruct() {
	}
};
}

?>