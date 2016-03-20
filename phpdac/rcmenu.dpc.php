<?php
$__DPCSEC['RCMENU_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("RCMENU_DPC")) && (seclevel('RCMENU_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCMENU_DPC",true);

$__DPC['RCMENU_DPC'] = 'rcmenu';

$d = GetGlobal('controller')->require_dpc('shop/shmenu.dpc.php');
require_once($d);

$__EVENTS['RCMENU_DPC'][0]='cpmconfig';
$__EVENTS['RCMENU_DPC'][1]='cpmconfedit';
$__EVENTS['RCMENU_DPC'][2]='cpmconfdel';
$__EVENTS['RCMENU_DPC'][3]='cpmconfadd';
$__EVENTS['RCMENU_DPC'][4]='cpmsavenest';
$__EVENTS['RCMENU_DPC'][5]='cpmloadnest';

$__ACTIONS['RCMENU_DPC'][0]='cpmconfig';
$__ACTIONS['RCMENU_DPC'][1]='cpmconfedit';
$__ACTIONS['RCMENU_DPC'][2]='cpmconfdel';
$__ACTIONS['RCMENU_DPC'][3]='cpmconfadd';
$__ACTIONS['RCMENU_DPC'][4]='cpmsavenest';
$__ACTIONS['RCMENU_DPC'][5]='cpmloadnest';

$__LOCALE['RCMENU_DPC'][0]='RCMENU_DPC;Menu Configuration;Menu Configuration;';
$__LOCALE['RCMENU_DPC'][1]='_newelement;New element;Νέο στοιχείο;';
$__LOCALE['RCMENU_DPC'][2]='_presshere;Press here;Πατήστε εδώ για εισαγωγή;';
$__LOCALE['RCMENU_DPC'][3]='title;Title;Τίτλος;';
$__LOCALE['RCMENU_DPC'][4]='link;Url;Δεσμός Url;';


class rcmenu extends shmenu {

    var $crlf, $path, $title;
	var $t_config, $t_config0, $t_config1, $t_config2;
	var $edit_per_lan, $cptemplate;
	

    function __construct() {
	
	      parent::__construct();
	
	      $this->title = localize('RCMENU_DPC',getlocal());		
	
	      $os =  php_uname();//'>';
          $info = strtolower($os);// $_SERVER['HTTP_USER_AGENT'] );   
          $this->crlf = PHP_EOL; //( strpos( $info, "windows" ) === false ) ? "\n" : "\r\n" ;	
		  
          if ($remoteuser=GetSessionParam('REMOTELOGIN')) 
		    $this->path = paramload('SHELL','prpath')."instances/$remoteuser/";	
		  else 
		    $this->path = paramload('SHELL','prpath');		
	
	      $this->edit_per_lan = true; //false;
	
		  //get local config
		  $this->t_config = array();
		  $this->t_config = $this->read_config();
		  
		  if (GetReq('editmode')) {//default form colors	
		    global $config;
			$config['FORM']['element_bgcolor1'] = 'EEEEEE';
			$config['FORM']['element_bgcolor2'] = 'DDDDDD';			
		  }
		  
		  $this->cptemplate = remote_paramload('FRONTHTMLPAGE','cptemplate', $this->path);	
	}
	
    function event($event=null) {	
	
	   /////////////////////////////////////////////////////////////
	   if (GetSessionParam('LOGIN')!='yes') {//die("Not logged in!");//	
	     if (!GetReq('editmode'))		 
	       die("Not logged in!");//	
		 else
     	   //header("Location: cp.php?editmode=1&encoding=" . GetReq('encoding'));  
   	       die("Not logged in! <A href='../cp.php?editmode=1&encoding=".GetReq('encoding')."'>LOGIN</A>");//
	   }	   		   
	   /////////////////////////////////////////////////////////////		
	
       $sFormErr = GetGlobal('sFormErr');	    	    		  			    
  
       if (!$sFormErr) {   
  
	   switch ($event) {	
		case "cpmloadnest"      : //load list    
		                         $this->loadNestList(); die();
		                         break;	   
		case "cpmsavenest"      : //save list    
		                         $this->saveNestList(); die();
		                         break;
		case "cpmconfedit"      :     
		                         
		                         break;
		case "cpmconfdel"       :     
		                          
		                         break;
		case "cpmconfadd"       :     
		                          
		                         break;								 
		case "cpmconfig"       :     
		default               :
		                          
		                         break;								 
       }
      }
	  
	  if (GetReq('save')==1) {
	    //echo 'save';
	    $this->write_config();  
		$this->t_config = $this->read_config(); //re-read
	  }	 
	  elseif (GetReq('add')==1) {
	    //echo 'add';

		$this->paramset(GetParam('section'),GetParam('variable'),GetParam('value'));
		/*for ($z=0;$z<=2;$z++) {
			$tvar = 't_config'.$z;
            print "<pre>"; print_r($this->{$tvar}); print "</pre>";
		}*/	
	  
	    $this->write_config();  
		$this->t_config = $this->read_config(); //re-read
	  }		  
    }
  
    function action($action=null) {
	
	   if (!GetReq('editmode')) {	
	     if (GetSessionParam('REMOTELOGIN')) 
	       $out = setNavigator(seturl("t=cpremotepanel","Remote Panel"),$this->title); 	 
	     else  
           $out = setNavigator(seturl("t=cp","Control Panel"),$this->title);	
	   }	 

	   switch ($action) {	
	   
		case "cpmloadnest"      :break;	 	   
		case "cpmsavenest"      :break;	   

		case "cpmconfedit"      :     
		                         $out .= $this->show_configuration("Save","cpmconfig&save=1",false);
		                         break;
		case "cpmconfdel"       :     
		                          
		                         break;
		case "cpmconfadd"       :     
		                         $out .= $this->add_configuration("Add","cpmconfig&add=1");  
		                         break;								 						 
		case "cpmconfig"       :     
		default                :
		                         $out .= $this->show_configuration("Edit","cpmconfedit",true); 
		                         break;								 
       }
	 
	   return ($out);
    } 	
	
	function show_configuration($button_title,$action,$editable=false) {
	   $editmode = GetReq('editmode');
	   $myaction = seturl("t=".$action.'&editmode='.$editmode); 	
       $form = new form(localize('RCMENU_DPC',getlocal()), "RCMENU", FORM_METHOD_POST, $myaction);	
		 
	   //show params by language
	   if ($this->edit_per_lan) {
	       $lan = getlocal() ? getlocal() :'0';	   
	       $tvar = 't_config'.$lan;
	       $c_config = $this->$tvar;
	   }
       else
           $c_config = (array)$this->t_config; 	   
	
	   foreach ($c_config as $section=>$data) {
	   
	     if ($section) $form->addGroup($section,ucfirst(strtolower($section)));
		  	   
	     foreach ($data as $var=>$val) {
		    $sectionvar = $section .'-'. $var;
			$localize_var = localize($var,getlocal());
            $form->addElement($section,new form_element_text($localize_var,$sectionvar,$val,"forminput",60,255,$editable));
		 }
		 $newelement = localize("_newelement",getlocal());
		 $presshere = localize("_presshere",getlocal());
		 $form->addElement($section,new form_element_onlytext($newelement,seturl("t=cpmconfadd&section=$section&editmode=".$editmode,$presshere),"forminput"));
	   }
	   
	   // Adding a hidden field
       $form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("FormAction", "$action"));
 
	   // Showing the form
	   $fout = $form->getform(0,0,$button_title);	
	   
	   return ($fout);	   
	}
	
	function add_configuration($button_title,$action) {
	   $myaction = seturl("t=".$action.'&editmode='.GetReq('editmode')); 	
       $form = new form(localize('RCMENU_DPC',getlocal()), "RCMENU", FORM_METHOD_POST, $myaction);	
		
	   if ($section=GetReq('section')) {
	     $form->addGroup($section,ucfirst(strtolower($section)));		
		 
		 $data = $this->t_config[$section];
	     foreach ($data as $var=>$val) {
		 
            $form->addElement($section,new form_element_onlytext($var,$val,"forminput",20,255,0));
		 }
		 	
         $form->addElement($section,new form_element_text('variable','variable','variable',"forminput",20,255,0));		 	 
         $form->addElement($section,new form_element_text('value','value','value',"forminput",20,255,0));			 
		 
	     // Adding section as hidden field
         $form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("section", $section));		 
		 
	     // Adding a hidden field
         $form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("FormAction", "$action"));
       }	
	   
	   // Showing the form
	   $fout = $form->getform(0,0,$button_title);	
	   
	   return ($fout);		   	    
	}
	
	
	
    function paramload($section,$param) {
          $config = $this->t_config;//GetGlobal('config');

          if (is_array($config[$section]))     
	        return ($config[$section][$param]);

    }
	
	function paramset($section=null,$param=null,$value=null) {
	
	      //if param is of type foo.bar the section=foo param=bar
		  //echo $param;

		  $parts = explode('.',$param);
		  if ($parts[1]) {//if ok
			  //echo '.';
			  $param = $parts[1];
			  $section = strtoupper($parts[0]);
		  }	
	
          //set by language
		  if ($this->edit_per_lan) {
		  	$lan = getlocal() ? getlocal() :'0';	   
			
			if (strstr($value,$this->delimiter )) {
			  $parts = explode($this->delimiter ,$value);
			  foreach ($parts as $lan=>$val) {
			    $tvar = 't_config'.$lan;
	            $this->{$tvar}[$section][$param] = $val;
			  }
			}
			else {
			  for ($z=0;$z<=2;$z++) {
				$tvar = 't_config'.$z;
	            $this->{$tvar}[$section][$param] = $value;	
			  }	
			}
		  } 
		  else
	        $this->t_config[$section][$param] = $value;
		  //print_r($this->t_config);
	}

    function arrayload($section,$array) {
          $config = $this->t_config;//GetGlobal('config');
  
          if (is_array($config[$section]))
            $data = $config[$section][$array];
	
	      if ($data) return(explode(",",$data));
	      //return ($out);
    }
	
	function arrayset($section,$array,$serialized_array=null) {
	
	      $data = unserialize($serialized_array);
		  
	      if (is_array($data)) {
		  
		    $this->t_config[$section][$array] = implode(",",$data) . $this->crlf;
		  }
		  //else //common param
		    //$this->paramset($section,$array,$serialized_array);
	}
	
	function read_config() {
	     $filename = $this->path . "menu.ini";
	
		 if (file_exists($filename) && is_readable($filename)) {
	       $ret = parse_ini_file($filename,1,INI_SCANNER_RAW);

		   //select by language
		   if ($this->edit_per_lan) {
		        foreach ($ret as $section=>$param) {
				
					foreach ($param as $pt=>$pv) {
		              $pparts = explode($this->delimiter ,$pv); 
		              
					  foreach ($pparts as $i=>$pp) {
		                $retperlan[$i][$section][$pt] = $pp;
					  }
					}
		        }

                for ($z=0;$z<=2;$z++) {
				    $tvar = 't_config'.$z;
                    $this->$tvar = (array) $retperlan[$z];	
				}	
					
	            //echo '<pre>';
	            //print_r($this->t_config1);//print_r($retperlan);
		        //echo '</pre>';						
                					
		   }
		   
	       //print "<pre>"; print_r($ret); print "</pre>";
		   return ($ret);
		 }  
	}
	
	function write_config() {
	     //echo '<pre>';
	     //print_r($_POST);
		 //echo '</pre>';
		 
	     $filename = $this->path . "menu.ini";
	
		 if (file_exists($filename) && is_writeable($filename)) {
		 
		  //write by language ..merge
		  if ($this->edit_per_lan) {
		  
	        $lan = getlocal() ? getlocal() :'0';	   
	        $tvar = 't_config'.$lan;
	        $c_config = $this->$tvar;			
			
	        //echo '<pre>';
			//$tvar2 = 't_config0';//.$lan;
	        //print_r($this->$tvar);//print_r($retperlan);
		    //echo '</pre>';				
			
		    foreach ($c_config as $section=>$params) {
			 
			  $fileCONTENTS .= $this->crlf;
			  $fileCONTENTS .= '[' . strtoupper($section) . ']' . $this->crlf;
			
			  foreach ($params as $var=>$val) {
			    $sectionvar = $section .'-'. $var;
				
			    if ($newval=GetParam($sectionvar)) {
				  switch ($lan) {
				    case 2 : $lan_new_val = $this->t_config0[$section][$var].$this->delimiter .$this->t_config1[$section][$var].$this->delimiter .$newval;
					         break;
					case 1 : $lan_new_val = $this->t_config0[$section][$var].$this->delimiter .$newval.$this->delimiter .$this->t_config2[$section][$var];
					         break;
					case 0 :
					default: $lan_new_val = $newval.$this->delimiter .$this->t_config1[$section][$var].$this->delimiter .$this->t_config2[$section][$var];
				  }
				  //$fileCONTENTS .= $var . '=' . $newval . $this->crlf;
				  $fileCONTENTS .= $var . '=' . $lan_new_val . $this->crlf;

				}  
				else {//as is
				  $asis = $this->t_config0[$section][$var].$this->delimiter .$this->t_config1[$section][$var].$this->delimiter .$this->t_config2[$section][$var];
			      $fileCONTENTS .= $var . '=' . /*$val*/$asis . $this->crlf;
				}  
			  }
			}
		  }
		  else {   
		    foreach ($this->t_config as $section=>$params) {
			 
			  $fileCONTENTS .= $this->crlf;
			  $fileCONTENTS .= '[' . strtoupper($section) . ']' . $this->crlf;
			
			  foreach ($params as $var=>$val) {
			    $sectionvar = $section .'-'. $var;
				
			    if ($newval=GetParam($sectionvar))
				  $fileCONTENTS .= $var . '=' . $newval . $this->crlf;
				else //as is
			      $fileCONTENTS .= $var . '=' . $val . $this->crlf;
			  }
			}
		  }//else	
		  //echo $fileCONTENTS;
		  
		  //keep backup copy
		  @copy($filename, str_replace('.ini','._ni', $filename));
		  
          $hFile = fopen( $filename, "w+" );
          fwrite( $hFile, $fileCONTENTS );
          fclose( $hFile );		 	
		 }//if file exists
	}


	protected function writenest_config($nestarray=null, $file=null) {
		$data = $nestarray ? $nestarray : json_decode(GetParam('list'),true);//as come from ajax post
	    //$_conf = parse_ini_file($this->path."menu.ini",1,INI_SCANNER_RAW);		 
		//var_export($this->t_config);
		var_export($data);		
		$fileCONTENTS = null;
		
		$f = $file ? $file : "menu.ini";//"menu-nest.ini"; //test name
        $filename = $this->path . $f;
		if ($file)
		    $conf = @parse_ini_file($filename ,1 , INI_SCANNER_RAW);
		else
			$conf = (array)$this->t_config;
		
		if (!empty($data)) {

            foreach ($data as $i=>$id) {
			    if ($id['id']=='recycle-bin') continue; //drop
				
				$subCONTENTS = null;
				$submenu = $id['children'];
				
				if (is_array($submenu)) {//sub ids of nest
					
					foreach ($submenu as $ci=>$child) {
					    $si = ++$ci;
						//print_r($child);
						//echo '<br/>','aaaa';
						$var = explode('>', $child['id']);
						
						//d'n d' needs access top both conf files to transfer params from/to
						$_conf = $conf[$var[0]] ? $conf : $this->t_config;
						
						$_titles = ($var[1]=='title') ? 
									$_conf[$var[0]]['title'] :
									$_conf[$var[0].'-SUBMENU'][$var[1]] ;	
						$lid = str_replace('title','link',$var[1]);
						$_links = ($var[1]=='link') ? 
								   $_conf[$var[0]]['link'] :
								   $_conf[$var[0].'-SUBMENU'][str_replace('title','link',$var[1])] ;
                    
						//rearange title1,link1,title2,link2...					
						$subCONTENTS .= 'title'.$si.'=' . $_titles . $this->crlf;
						$subCONTENTS .= 'link'.$si.'=' . $_links . $this->crlf;	
					}	
				}
					
			    $section = explode('>', $id['id']);
				//d'n d' needs access top both conf files to transfer params from/to
				$_conf = $conf[$section[0]] ? $conf : $this->t_config;
				
				$fileCONTENTS .= $this->crlf;
				$fileCONTENTS .= '[' . $section[0] . ']' . $this->crlf;
							
				$_titles = ($section[1]=='title') ? 
				            $_conf[$section[0]]['title'] :
						    $_conf[$section[0].'-SUBMENU'][$section[1]] ;
				$fileCONTENTS .= 'title=' . $_titles . $this->crlf;						

				$_links = ($section[1]=='title') ? 
				          $_conf[$section[0]]['link'] :
						  $_conf[$section[0].'-SUBMENU'][$section[1]] ;
                $fileCONTENTS .= 'link=' . $_links . $this->crlf;						    
				
				$_spaces =  ($section[1]=='title') ?
				            $_conf[$section[0]]['spaces'] :
							null;
                $fileCONTENTS .= 'spaces=' . $_spaces . $this->crlf;				
				
				if ($subCONTENTS!=null) {
					$_submenu = ($this->edit_per_lan) ? 
					            $section[0] .'-SUBMENU,'.$section[0] .'-SUBMENU,'.$section[0] .'-SUBMENU' : 
					            $section[0] .'-SUBMENU'; 
					$fileCONTENTS .= 'submenu=' . $_submenu . $this->crlf;	
					$fileCONTENTS .= $this->crlf;
					$fileCONTENTS .= '[' . $section[0] .'-SUBMENU' . ']' . $this->crlf;
					$fileCONTENTS .= $subCONTENTS . $this->crlf;				
				}
            }	

			//keep backup copy
			@copy($filename, str_replace('.ini','._ni', $filename));
		  
			$hFile = fopen( $filename, "w+" );
			$ret = fwrite( $hFile, $fileCONTENTS );
			fclose( $hFile );			
		}	
		
		return ($ret);
	}	
	
	
	protected function loadNestList() {
    }
	
	protected function saveNestList() {
		$list = GetParam('list');
		@file_put_contents("menu.list", $list);		
		
		$menu = json_decode($list,true);//,false,5); //stdclass, depth 
		//var_export($menu);
		$w = $this->writenest_config($menu);
		$ret = $w ? "Saved" : "Not saved";
		
		//tmp menu
		$tmplist = GetParam('tmplist');
		@file_put_contents("menutmp.list", $tmplist);
		$tmpmenu = json_decode($tmplist,true);
		$tmp = $this->writenest_config($tmpmenu, "menutmp.ini");		
		
		echo $tmp ? $ret . " (1)" : $ret;
    }	
	
	protected function nestdditem($id,$name) {
		$ret = "<li class='dd-item' data-id='$id'>
                    <div class='dd-handle'>$name</div>
                </li>";
		return ($ret);		
	}
	
	protected function nestddgroup($id,$name,$group) {
		$ret = "<li class='dd-item' data-id='$id'>
					<div class='dd-handle'>$name</div>
					<ol class='dd-list'>
						$group
					</ol>
				</li>";
		return ($ret);	   
	}
	
	public function nestBuild($file=null) {
	    $lan = getlocal() ? getlocal() :'0';
	    if ($file) 
			$conf = @parse_ini_file($this->path.$file,1,INI_SCANNER_RAW);
		else
			$conf = $this->t_config;//$tvar;		
	
		if (!$conf) return;
		
		$n = null;
		
		foreach ($conf as $section=>$params) {

            if (substr($section,-8)=='-SUBMENU') continue; //bypass subs		
			
			$cn = null;
			if (isset($params['submenu'])) {
                //echo $section.'-SUBMENU';    
				foreach ($conf[$section.'-SUBMENU'] as $group=>$child) {
				    //echo $child,'<br/>';
					if (substr($group,0,5)=='title') {
						$nz = explode(',', $child);
						$name = $nz[$lan];
					    $cn .= $this->nestdditem($section.'>'.$group, $name);
					}	
				}
			}

			$nz = explode(',', $params['title']);
			$name = $nz[$lan];
			if ($cn)
				$n .= $this->nestddgroup($section.'>title', $name, $cn);
			else
				$n .= $this->nestdditem($section.'>title', $name);

		}    

		return $n;	
	}

};
}
?>