<?php
$__DPCSEC['RCSLIDESHOW_DPC']='5;1;1;1;1;1;5;6;7;8;9';

if ((!defined("RCSLIDESHOW_DPC")) && (seclevel('RCSLIDESHOW_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCSLIDESHOW_DPC",true);

$__DPC['RCSLIDESHOW_DPC'] = 'rcslideshow';

$d = GetGlobal('controller')->require_dpc('cgi-bin/shop/shslideshow.dpc.php', paramload('SHELL','urlpath'));
require_once($d);

$__EVENTS['RCSLIDESHOW_DPC'][0]='cpsconfig';
$__EVENTS['RCSLIDESHOW_DPC'][1]='cpsconfedit';
$__EVENTS['RCSLIDESHOW_DPC'][2]='cpsconfdel';
$__EVENTS['RCSLIDESHOW_DPC'][3]='cpsconfadd';

$__ACTIONS['RCSLIDESHOW_DPC'][0]='cpsconfig';
$__ACTIONS['RCSLIDESHOW_DPC'][1]='cpsconfedit';
$__ACTIONS['RCSLIDESHOW_DPC'][2]='cpsconfdel';
$__ACTIONS['RCSLIDESHOW_DPC'][2]='cpsconfadd';

$__LOCALE['RCSLIDESHOW_DPC'][0]='RCSLIDESHOW_DPC;Slideshow Configuration;Slideshow Configuration;';
$__LOCALE['RCSLIDESHOW_DPC'][1]='_newelement;New element;Νέο στοιχείο;';
$__LOCALE['RCSLIDESHOW_DPC'][2]='_presshere;Press here;Πατήστε εδώ για εισαγωγή;';
$__LOCALE['RCSLIDESHOW_DPC'][3]='title;Title;Τίτλος;';
$__LOCALE['RCSLIDESHOW_DPC'][4]='link;Url;Δεσμός Url;';


class rcslideshow extends shslideshow {

    var $crlf, $path, $title, $urlpath, $url;
	var $t_config, $t_config0, $t_config1, $t_config2;
	var $edit_per_lan;
	var $cptemplate, $tabheaders;	

    function __construct() {
	
	      parent::__construct();
	
	      $this->title = localize('RCSLIDESHOW_DPC',getlocal());		
	
	      $os =  php_uname();//'>';
          $info = strtolower($os);// $_SERVER['HTTP_USER_AGENT'] );   
          $this->crlf = ( strpos( $info, "windows" ) === false ) ? "\n" : "\r\n" ;	
		  
		  $this->path = paramload('SHELL','prpath');		
		  $this->urlpath = paramload('SHELL','urlpath');		
		  $this->url = paramload('SHELL','urlbase');		
	
	      $this->edit_per_lan = true; //false;
	
		  //get local config
		  $this->t_config = array();
		  $this->t_config = $this->read_config();
		  
		  if (GetReq('editmode')) {//default form colors	
		    global $config;
			$config['FORM']['element_bgcolor1'] = 'EEEEEE';
			$config['FORM']['element_bgcolor2'] = 'DDDDDD';			
		  }
		  
		  $this->cptemplate = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->path);		  
		  $this->tabheaders = array();		  
	}
	
    function event($event=null) {	
	
	   	$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;		
	
  
	   switch ($event) {	

		case "cpsconfedit"      :     
		                         
		                         break;
		case "cpsconfdel"       :     
		                          
		                         break;
		case "cpsconfadd"       :     
		                          
		                         break;								 
		case "cpsconfig"       :     
		default               :
		                          
		                         break;								 
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
       $cpart = GetReq('cpart')?GetReq('cpart'):null;
	    $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;	   

	   switch ($action) {	

		case "cpsconfedit"      :     
		                         $out .= $this->edit_configuration("Save","cpsconfig&save=1", false, $cpart);
		                         break;
		case "cpsconfdel"       :     
		                          
		                         break;
		case "cpsconfadd"       :     
		                         $out .= $this->add_configuration("Add","cpsconfig&add=1");  
		                         break;								 
		case "cpsconfig"       :     
		default               :
		                         $out .= $this->show_configuration("Edit","cpsconfedit", true, $cpart); 
		                         break;								 
       }
	 
	   return ($out);
    } 	
	
	//to call from page
	public function tabheaders() {
		
        return (implode('',$this->tabheaders));
	}

	protected function setTabHeader($id, $title, $isactive=false) {
		
		$tmpl = $isactive ? 'tab-header-active' : 'tab-header';
        $data = $this->select_template($tmpl);
		$tokens[] = $id;
		$tokens[] = $title;
		
		$out = $this->combine_tokens($data,$tokens,true);
		return ($out);
	}

		
	protected function setTabBody($id, $body, $isactive=false) {
		
		$tmpl = $isactive ? 'tab-content-active' : 'tab-content';
        $data = $this->select_template($tmpl);
		$tokens[] = $id;
		$tokens[] = $body;
		
		$out = $this->combine_tokens($data,$tokens,true);
		return ($out);
	}

	protected function setTabInput($id, $name, $value=null, $etext=null) {
		
		$tmpl = 'tab-form-input';
        $data = $this->select_template($tmpl);
		$tokens[] = $name;		
		$tokens[] = $id;
		$tokens[] = $value;	
		$tokens[] = $etext;
		
		$out = $this->combine_tokens($data,$tokens,true);
		return ($out);
	}	

	protected function show_configuration($button_title,$action,$editable=false,$cpart=null) {
		
	   //show params by language
	   if ($this->edit_per_lan) {
	       $lan = getlocal() ? getlocal() :'0';	   
	       $tvar = 't_config'.$lan;
	       $c_config = $this->$tvar;
	   }
       else
           $c_config = (array)$this->t_config; 			


	   if ($cpart) {//partial config
	     foreach ($c_config as $section=>$data) {
	       if ($section==$cpart) { 
		     $url = "cpslideshow.php?t=cpsconfedit&cpart=".$section;
			 $tabname = ucfirst(strtolower($section)); //localize($section.'_DPC', getlocal());
			 $this->tabheaders[] = $this->setTabHeader(strtolower($section), $tabname, true);       
			 $b = null; //'<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button><hr/>';
	         foreach ($data as $var=>$val) {
			   $b .= $this->setTabInput(localize($var,getlocal()), ucfirst(strtolower($var)), $val, null);//ucfirst(strtolower($var)));
			   if (($var=='image') && is_readable($this->urlpath . $val))
				    $b .= "<img src='".$this->url. '/' . $val  . "' width='500'/>"; 
		     }				 
		     $b .= '<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button>';
		     $ret = $this->setTabBody(strtolower($section), $b, true);			 
		   }
	     }		 
	   }
	   else {//all config
	     $i=0; 
	     foreach ($c_config as $section=>$data) {
		   $url = "cpslideshow.php?t=cpsconfedit&cpart=".$section;
		   $tabname = ucfirst(strtolower($section)); //localize($section.'_DPC', getlocal());
		   $this->tabheaders[] = $this->setTabHeader(strtolower($section), $tabname, ($i==0 ? true : false)); 
		   $b = null;//'<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button><hr/>';
	       foreach ($data as $var=>$val) {
			 $b .= $this->setTabInput(localize($var,getlocal()), ucfirst(strtolower($var)), $val, null);//ucfirst(strtolower($var)));
			 if (($var=='image') && is_readable($this->urlpath . $val))
			    $b .= "<img src='".$this->url. '/' . $val  . "' width='500'/>"; 
		   }
		   $b .= '<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button>';
		   $ret .= $this->setTabBody(strtolower($section), $b, ($i==0 ? true : false));
		   $i+=1;
	     }
	   }
	   

	   return ($ret);
   
	}	
	
	protected function edit_configuration($button_title,$action,$editable=false, $cpart=null) {
	   $editmode = GetReq('editmode');
	   $myaction = seturl("t=".$action.'&editmode='.$editmode); 	
       $form = new form(localize('RCSLIDESHOW_DPC',getlocal()), "RCSLIDESHOW", FORM_METHOD_POST, $myaction);	
		 
	   //show params by language
	   if ($this->edit_per_lan) {
	       $lan = getlocal() ? getlocal() :'0';	   
	       $tvar = 't_config'.$lan;
	       $c_config = $this->$tvar;
	   }
       else
           $c_config = (array)$this->t_config; 

	   
	   if ($cpart) {//partial config
	     foreach ($c_config as $section=>$data) {
	       if ($section==$cpart) {
			$form->addGroup($section,ucfirst(strtolower($section)));   
			foreach ($data as $var=>$val) {
				$sectionvar = $section .'-'. $var;
				$localize_var = localize($var,getlocal());
				$form->addElement($section,new form_element_text($localize_var,$sectionvar,$val,"span11",60,255,$editable));
			}
			//$newelement = localize("_newelement",getlocal());
			//$presshere = localize("_presshere",getlocal());
			//$form->addElement($section,new form_element_onlytext($newelement,seturl("t=cpsconfadd&section=$section&editmode=".$editmode,$presshere),"span11"));
		   }
	     }	   
	   }
	   else {//all config	
	   foreach ($c_config as $section=>$data) {
	   
			if ($section) $form->addGroup($section,ucfirst(strtolower($section)));
		  	   
			foreach ($data as $var=>$val) {
				$sectionvar = $section .'-'. $var;
				$localize_var = localize($var,getlocal());
				$form->addElement($section,new form_element_text($localize_var,$sectionvar,$val,"span11",60,255,$editable));
			}
			//$newelement = localize("_newelement",getlocal());
			//$presshere = localize("_presshere",getlocal());
			//$form->addElement($section,new form_element_onlytext($newelement,seturl("t=cpsconfadd&section=$section&editmode=".$editmode,$presshere),"span11"));
	   }
	   }
	   
	   // Adding a hidden field
       $form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("FormAction", "$action"));
       
	   // Showing the form
	   $fout = $form->getform(0,0,$button_title);	
	   
	   return ($fout);	   
	}
	
	protected function add_configuration($button_title,$action) {
	   $myaction = seturl("t=".$action.'&editmode='.GetReq('editmode')); 	
       $form = new form(localize('RCSLIDESHOW_DPC',getlocal()), "RCSLIDESHOW", FORM_METHOD_POST, $myaction);	
		
	   if ($section=GetReq('section')) {
	     $form->addGroup($section,ucfirst(strtolower($section)));		
		 
		 $data = $this->t_config[$section];
	     foreach ($data as $var=>$val) {
		 
            $form->addElement($section,new form_element_onlytext($var,$val,"span11",20,255,0));
		 }
		 	
         $form->addElement($section,new form_element_text('variable','variable','variable',"span11",20,255,0));		 	 
         $form->addElement($section,new form_element_text('value','value','value',"span11",20,255,0));			 
		 
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
	     $filename = $this->path . "slideshow.ini";
	
		 if (file_exists($filename) && is_readable($filename)) {
	       $ret = parse_ini_file($filename,1);

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
	            //print_r($this->t_config0);//print_r($retperlan);
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
		 
	     $filename = $this->path . "slideshow.ini";
	
		 if (file_exists($filename) && is_writeable($filename)) {
		 
		  //write by language ..merge
		  if ($this->edit_per_lan) {
		  
	        $lan = getlocal() ? getlocal() :'0';	   
	        $tvar = 't_config'.$lan;
	        $c_config = $this->$tvar;					
			
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
	
	
	protected function select_template($tfile=null) {
		if (!$tfile) return;
	  
		$template = $tfile . '.htm';	
		$t = $this->path . 'html/'. $this->cptemplate .'/'. str_replace('.',getlocal().'.',$template) ;   
		if (is_readable($t)) 
			$mytemplate = file_get_contents($t);

		return ($mytemplate);	 
    }		
	
	//tokens method	
	protected function combine_tokens($template_contents, $tokens, $execafter=null) {
	
	    if (!is_array($tokens)) return;
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template_contents;
		  
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
            //echo $tok,'<br>';
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<30;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);
		//echo $ret;
		
		//execute after replace tokens
		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $retout = $fp->process_commands($ret);
		  unset ($fp);
          
		  return ($retout);
		}		
		
		return ($ret);
	}			

};
}
?>