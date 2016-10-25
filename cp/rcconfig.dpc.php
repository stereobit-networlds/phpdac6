<?php
$__DPCSEC['RCCONFIG_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCCONFIG_DPC")) && (seclevel('RCCONFIG_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCONFIG_DPC",true);

$__DPC['RCCONFIG_DPC'] = 'rcconfig';

$__EVENTS['RCCONFIG_DPC'][0]='cpconfig';
$__EVENTS['RCCONFIG_DPC'][1]='cpconfedit';
$__EVENTS['RCCONFIG_DPC'][2]='cpconfdel';
$__EVENTS['RCCONFIG_DPC'][3]='cpconfadd';
$__EVENTS['RCCONFIG_DPC'][4]='cpconfmod';

$__ACTIONS['RCCONFIG_DPC'][0]='cpconfig';
$__ACTIONS['RCCONFIG_DPC'][1]='cpconfedit';
$__ACTIONS['RCCONFIG_DPC'][2]='cpconfdel';
$__ACTIONS['RCCONFIG_DPC'][3]='cpconfadd';
$__ACTIONS['RCCONFIG_DPC'][4]='cpconfmod';

$__LOCALE['RCCONFIG_DPC'][0]='RCCONFIG_DPC;Configuration;Configuration;';
$__LOCALE['RCCONFIG_DPC'][1]='SHFORM;Contact Form;Φόρμα επικοινωνίας;';
$__LOCALE['RCCONFIG_DPC'][2]='RCXMLFEEDS;Xml Feeds;Xml αρχεία;';
$__LOCALE['RCCONFIG_DPC'][3]='SHSUBSCRIBE;Subscription;Συνδρομές;';
$__LOCALE['RCCONFIG_DPC'][4]='SHKATALOG;Page view;Προβολή σελίδας;';
$__LOCALE['RCCONFIG_DPC'][5]='SHKATALOGMEDIA;Page view (ext.);Προβολή σελίδας (ext.);';
$__LOCALE['RCCONFIG_DPC'][6]='RCITEMREL;Item relations;Συσχετισμοί ειδών;';
$__LOCALE['RCCONFIG_DPC'][7]='RCSYNCSQL;SQL Syncs;Συγχρονισμοί SQL;';
$__LOCALE['RCCONFIG_DPC'][8]='RCTRANSSQL;Dynamic SQL;Δυναμική SQL;';
$__LOCALE['RCCONFIG_DPC'][9]='SHCART;Cart;Καλάθι;';
$__LOCALE['RCCONFIG_DPC'][10]='SHEUROBANK;Eurobank;Eurobank;';
$__LOCALE['RCCONFIG_DPC'][11]='SHPAYPAL;Paypal;Paypal;';
$__LOCALE['RCCONFIG_DPC'][12]='RCITEMS;Items (cp);Είδη (cp);';
$__LOCALE['RCCONFIG_DPC'][13]='SHLOGIN;Login;Login;';
$__LOCALE['RCCONFIG_DPC'][14]='SHUSERS;Users;Χρήστες;';
$__LOCALE['RCCONFIG_DPC'][15]='SHCUSTOMERS;Customers;Πελάτες;';
$__LOCALE['RCCONFIG_DPC'][16]='SHTRANSACTIONS;Transactions;Συναλλαγές;';
$__LOCALE['RCCONFIG_DPC'][17]='RCCUSTOMERS;Customers (cp);Πελάτες (cp);';
$__LOCALE['RCCONFIG_DPC'][18]='SHKATEGORIES;Categories;Κατηγορίες;';
$__LOCALE['RCCONFIG_DPC'][19]='SHMENU;Menu;Μενού;';
$__LOCALE['RCCONFIG_DPC'][20]='SHLANGS;Languages;Γλώσσες;';
$__LOCALE['RCCONFIG_DPC'][21]='RECAPTCHA;Recaptcha;Recaptcha;';
$__LOCALE['RCCONFIG_DPC'][22]='SHNSEARCH;Search;Αναζήτηση;';
$__LOCALE['RCCONFIG_DPC'][23]='SHDOWNLOAD;Downloads;Μεταφορτώσεις;';
$__LOCALE['RCCONFIG_DPC'][24]='RCSHSUBSCRIBERS;Subscribers (cp);Συνδρομητές (cp);';
$__LOCALE['RCCONFIG_DPC'][25]='RCSHSUBSQUEUE;Mail queue (cp);Αποστολές email(cp);';
$__LOCALE['RCCONFIG_DPC'][26]='RCBULKMAIL;Bulk mail (cp);Μαζικές αποστολές (cp);';
$__LOCALE['RCCONFIG_DPC'][27]='RCCOLLECTIONS;Collections;Συλλογές;';
$__LOCALE['RCCONFIG_DPC'][28]='SHTAGS;Tags;Tags;';
$__LOCALE['RCCONFIG_DPC'][29]='RCUSERS;Users (cp);Χρήστες (cp);';
$__LOCALE['RCCONFIG_DPC'][30]='FRONTHTMLPAGE;Page options;Ρυθμίσεις σελίδας;';
$__LOCALE['RCCONFIG_DPC'][31]='MEDIA-CENTER;Theme options;Ρυθμίσεις θέματος;';
$__LOCALE['RCCONFIG_DPC'][32]='CKEDITOR;CK Editor;Κειμενογράφος;';
$__LOCALE['RCCONFIG_DPC'][33]='SLIDESHOW;Slide show;Slide show;';
$__LOCALE['RCCONFIG_DPC'][34]='RCAWSTATS;AW stats;Στατιστικά aw;';
$__LOCALE['RCCONFIG_DPC'][35]='RCCONTROLPANEL;Control panel;Πίνακας ελέγχου;';
$__LOCALE['RCCONFIG_DPC'][36]='INDEX;My configuration;Οι ρυθμίσεις μου;';
$__LOCALE['RCCONFIG_DPC'][37]='ESHOP;e-shop;e-shop;';
$__LOCALE['RCCONFIG_DPC'][38]='RCSHSUBSQUEUE;Mail queue;Αποστολές email;';

//**************************************************************************
//WARNING :TO OVERWRITE CONFIG VALUES USE THIS CLASS AS SUPER IN PHP FILES
//**************************************************************************


class rcconfig {

    var $crlf, $path, $title;
	var $g_config;
	var $t_config;
	var $config; //merged 
	
	var $cptemplate, $tabheaders;
	var $seclevid;
	
    function __construct() {
	
	      $this->title = localize('RCCONFIG_DPC',getlocal());		
	
	      $os =  php_uname();//'>';
          $info = strtolower($os);// $_SERVER['HTTP_USER_AGENT'] );  
          $this->crlf = ( strpos( $info, "windows" ) === false ) ? "\n" : "\r\n" ;	
		  
		  $this->path = paramload('SHELL','prpath');		
		  $this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] :GetSessionParam('ADMINSecID');
	
	      //get global config
          $this->g_config = GetGlobal('config');	
		  //get local config
		  $this->t_config = array();
		  $this->t_config = $this->read_config();
		  //merge 2 configs
		  //$this->config = $this->merge_configurations($this->g_config,$this->t_config);		
		  
		  $this->config = $this->alt_merge_configurations();
		  
		  if (GetReq('editmode')) {//default form colors	
		    global $config;
			$config['FORM']['element_bgcolor1'] = 'EEEEEE';
			$config['FORM']['element_bgcolor2'] = 'DDDDDD';			
		  }
		  
		  //print_r($config);
		  
		  $this->cptemplate = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->path);		  
		  $this->tabheaders = array();
	}
	
    function event($event=null) {	
	
	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;	
	
  
	   switch ($event) {

        case "cpconfmod"       : 
		                         $this->paramset(null,GetReq('var'),GetReq('val'));
                                 break;	   

		case "cpconfedit"      :     
		                         
		                         break;
		case "cpconfdel"       :     
		                          
		                         break;
		case "cpconfadd"       :     
		                          
		                         break;								 							 
		case "cpconfig"       :     
		default               :
		                          
		                         break;								 
      }
	  
	  if (GetReq('save')==1) {
	    if ($this->backup_config()) {
	      $this->write_config();  
		  $this->t_config = $this->read_config(); //re-read
		}
		else 
		  echo 'backup conf failed!';
	  }	 
	  elseif (GetReq('add')==1) {
	    
		$this->paramset(GetParam('section'),GetParam('variable'),GetParam('value'));
	    if ($this->backup_config()) {
			$this->write_config();  
			$this->t_config = $this->read_config(); //re-read
		}
		else 
		  echo 'backup conf failed!';			
	  }
      elseif (GetReq('var'))  {//one value at cmd, silent
	    //&& ($value=GetReq('val')) && (isset($value))
	    if ($this->backup_config()) {
		    //echo 'z';
			$this->write_config();  
			$this->t_config = $this->read_config(); //re-read	  
		}
		else 
		  echo 'backup conf failed!';		
      } 	  
    }
  
    function action($action=null) {
	   $cpart = GetReq('cpart')?GetReq('cpart'):null;
	    $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;	   

	   switch ($action) {	
	   
        case "cpconfmod"       : $out .= $this->edit_configuration("Edit","cpconfedit",true,$cpart); 
                                 break;	  	   

		case "cpconfedit"      :     
		                         $out .= $this->edit_configuration("Save","cpconfig&save=1",false,$cpart);
		                         break;
		case "cpconfdel"       :     
		                          
		                         break;
		case "cpconfadd"       :     
		                         $out .= $this->add_configuration("Add","cpconfig&add=1",$cpart);  
		                         break;	
		case "cpconfig"       :     
		default               :
		                         $out .= $this->show_configuration("Edit","cpconfedit",true,$cpart); 
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
	
	protected function editButton($section) {
        $url = "cpconfig.php?t=cpconfedit&cpart=".$section;
		
		if (($section=='INDEX')&&($this->seclevid>=8))
			$ret = '<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button><hr/>';
		elseif ($this->seclevid==9)
			$ret = '<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button><hr/>';
		else
			$ret = null;

		return ($ret);	
	}
	
	function show_configuration($button_title,$action,$editable=false,$cpart=null) {
	   $myaction = seturl("t=".$action."&cpart=".$cpart."&editmode=".GetReq('editmode')); 	
       $lan = getlocal();
	   
	   if ($cpart) {//partial config
	     foreach ($this->t_config as $section=>$data) {
	       if ($section==$cpart) { 
		     //$url = "cpconfig.php?t=cpconfedit&cpart=".$section;
			 $tabname = ucfirst(localize($section, $lan));
			 $this->tabheaders[] = $this->setTabHeader(strtolower($section), $tabname, true);       
			 //$b = '<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button><hr/>';
			 $b = $this->editButton($section);
	         foreach ($data as $var=>$val) {
			   $b .= $this->setTabInput(localize($var,$lan), ucfirst(strtolower($var)), $val, null);//ucfirst(strtolower($var)));
		     }		 
		     //$b .= '<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button>';
			 $b .= $this->editButton($section);
		     $ret = $this->setTabBody(strtolower($section), $b, true);			 
		   }
	     }		 
	   }
	   else {//all config
	     $i=0; 
	     foreach ($this->t_config as $section=>$data) {
		   //$url = "cpconfig.php?t=cpconfedit&cpart=".$section;
		   $tabname = ucfirst(localize($section, $lan));
		   $this->tabheaders[] = $this->setTabHeader(strtolower($section), $tabname, ($i==0 ? true : false)); 
		   //$b = '<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button><hr/>';
		   $b = $this->editButton($section);
	       foreach ($data as $var=>$val) {
			 $b .= $this->setTabInput(localize($var,$lan), ucfirst(strtolower($var)), $val, null);//ucfirst(strtolower($var)));
		   }
		   //$b .= '<button onClick="location.href=\''.$url.'\'" class="btn btn-danger">Edit</button>';
		   $b .= $this->editButton($section);
		   $ret .= $this->setTabBody(strtolower($section), $b, ($i==0 ? true : false));
		   $i+=1;
	     }
	   }
	   
	   return ($ret);   
	}

	
	function edit_configuration($button_title,$action,$editable=false,$cpart=null) {
	   $lan = getlocal();
	   $myaction = seturl("t=".$action."&cpart=".$cpart."&editmode=".GetReq('editmode')); 	
       $form = new form(localize('RCCONFIG_DPC',getlocal()), "RCCONFIG", FORM_METHOD_POST, $myaction);	
	   
	   if ($cpart) {//partial config
	     foreach ($this->t_config as $section=>$data) {
	       if ($section==$cpart) { 
		     $form->addGroup($section,ucfirst(localize($section, $lan)));
		  	   
	         foreach ($data as $var=>$val) {
               $form->addElement($section,new form_element_text($var,strtolower($section).$var,$val,"span11",60,255,$editable));
		     }
		   }
		   $form->addElement($section,new form_element_onlytext("New element",seturl("t=cpconfadd&section=$section&cpart=$cpart&editmode=".GetReq('editmode'),'press here'),"span11"));
	     }	   
	   }
	   else {//all config
	     foreach ($this->t_config as $section=>$data) {
	       if ($section) 
		     $form->addGroup($section,ucfirst(localize($section, $lan)));
		  	   
	       foreach ($data as $var=>$val) {
             $form->addElement($section,new form_element_text($var,strtolower($section).$var,$val,"span11",60,255,$editable));
		   }
		 
		   $form->addElement($section,new form_element_onlytext("New element",seturl("t=cpconfadd&section=$section&cpart=$cpart&editmode=".GetReq('editmode'),'press here'),"span11"));
	     }
	   }
	   
	   // Adding a hidden field
       $form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("FormAction", "$action"));
 
	   // Showing the form
	   $fout = $form->getform(0,0,$button_title);	
	   
	   return ($fout);	   
	}
	
	function add_configuration($button_title,$action,$cpart=null) {
	   $myaction = seturl("t=".$action."&cpart=".$cpart."&editmode=".GetReq('editmode')); 	
       $form = new form(localize('RCCONFIG_DPC',getlocal()), "RCCONFIG", FORM_METHOD_POST, $myaction);	
	   $lan = getlocal();	
	   if ($section=GetReq('section')) {
	     $form->addGroup($section,ucfirst(localize($section, $lan)));		
		 
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
		  if (!$param) return false;

		  $parts = explode('.',$param);
		  if ($parts[1]) {//if ok
			  //echo '.';
			  $param = $parts[1];
			  $section = strtoupper($parts[0]);
		  }	
	
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
	
	     $filename = /*$this->path .*/ "myconfig.txt"; //relative and in the same dir
		 //echo $filename,'>';
		 //echo file_get_contents($filename);
	
		 if (file_exists($filename) && is_readable($filename)) {
	       $ret = parse_ini_file($filename,1);

	       //print "<pre>"; print_r($ret); print "</pre>";
		   return ($ret);
		 }  
	}
	
	function write_config() {
	
	     $filename = /*$this->path .*/ "myconfig.txt";
		 //echo '<pre>';
	     //print_r($this->t_config);
		 //echo '</pre><pre>';
		 //print_r($_POST);
		 //echo '</pre>';
		 //return null;
		 
		 if (file_exists($filename) && is_writeable($filename)) {
		 
		    foreach ($this->t_config as $section=>$params) {
			 
			  $fileCONTENTS .= $this->crlf;
			  $fileCONTENTS .= '[' . strtoupper($section) . ']' . $this->crlf;
			
			  foreach ($params as $var=>$val) {
			  
			    if ($newval=GetParam(strtolower($section).$var)) {
				  
				  $myval = ($newval=='null') ? ';null' : $newval; 
				  //if ($newval=='null') echo $myval,'<br/>';
				  $fileCONTENTS .= $var . '=' . $myval . $this->crlf;
				}  
				else //as is 
			      $fileCONTENTS .= $var . '=' . $val . $this->crlf;
			  }
			}
		    
			//echo $fileCONTENTS;
            $hFile = fopen( $filename, "w+" );
            fwrite( $hFile, $fileCONTENTS );
            fclose( $hFile );		 	
		 }
	} 
	
	//WARNING:NON EXISTING DATA CAN'T MERGED
	//item of section not exists in global config .. not transfered
	function merge_configurations($cnf1,$cnf2) {
	
	     if ((is_array($cnf1)) && (is_array($cnf2))) {
		 
		    //$mconfig = array_merge($cnf1,$cnf2);
			foreach ($cnf1 as $section=>$data) {
			  foreach ($data as $var=>$val) {
			  
			    if ((is_array($cnf2[$section])) && (array_key_exists($var,$cnf2[$section])))
				  $mconfig[$section][$var] = $cnf2[$section][$var];
				else
				  $mconfig[$section][$var] = $val;   
			  }
			}  
		 }
		 else
		    $mconfig = $cnf1;//default config (global)
			
	     SetGlobal('config',$mconfig); //set it global param
	     print "<pre>"; print_r($mconfig); print "</pre>";		 		
		 //echo paramload('TEST','test');
		 return ($mconfig);
	}
	
	//alternative merging/...faster
	//item of section not exists in global config .. TRANSFERED NOW!
	//WARNING : config array overwritten here
	function alt_merge_configurations() {
	    global $config;
		
		if (!is_array($this->t_config)) return;
	
	    foreach ($this->t_config as $section=>$data) {
		  foreach ($data as $var=>$val) {
		  
		    if ((is_array($config[$section])) && (array_key_exists($var,$config[$section])))
			  $config[$section][$var] = $val; 
			else
			  $config[$section][$var] = $val;  
		  }
		}
		
		//print "<pre>"; print_r($config); print "</pre>";	
		//echo '>',paramload('RCSREGISTER','verify');
		//echo '>',paramload('RCVEHICLESQUEUE','mailto');
		return ($config);
	} 

	public function backup_config() {	
	     $date = date('Ymd');
	
		 $filename = "myconfig.txt";	
		 $backup_filename = $date . "myconfig.txt";
		 $ret = @copy($filename, $backup_filename);
		 
		 return ($ret);
	}

	//one step write... called by wizard to save data to myconfig
	public function setconf($param=null, $value=null) {
	    if (!$param) return false;
		if (!stristr($param,'.')) return false;

		$this->paramset(null,$param,$value);	
	    if ($this->backup_config()) {

			$this->write_config();  
			$this->t_config = $this->read_config(); //re-read	no need ?  
			return true;
			//return ("Variable $param set with the value of $value");//
		}
		//else 
		  //echo 'backup conf failed!';		
		//return ("Variable $param not set with the value of $value");
		return false;
    } 	
	
	//one step read... called by wizard to save data to myconfig
	public function getconf($param=null) {
	    if (!$param) return false;
		if (!stristr($param,'.')) return false;
        $p = explode('.',$param);
		$section = $p[0];
		$pname = $p[1];
		
		$ret = $this->t_config[$section][$pname];	

		return ($ret ? $ret : false);
    } 	
	
	//called by rccontrolpanel to check expired services
	public function get_expirations($param=null) {
	   
	    foreach ($this->t_config as $section=>$data) {
		  foreach ($data as $var=>$val) {
	    
			if ($var=='expires') {
			    $exps[$section] = $val;
				//echo $section,'=',$val;
			}
          }			
	    }
		
		return (serialize($exps));
	}
	
	
	function select_template($tfile=null) {
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