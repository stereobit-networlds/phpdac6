<?php
$__DPCSEC['RCMENU_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCMENU_DPC")) && (seclevel('RCMENU_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCMENU_DPC",true);

$__DPC['RCMENU_DPC'] = 'rcmenu';

$a = GetGlobal('controller')->require_dpc('gui/form.dpc.php');
require_once($a);

$d = GetGlobal('controller')->require_dpc('cms/cmsmenu.dpc.php');
require_once($d);

$__EVENTS['RCMENU_DPC'][0]='cpmconfig';
$__EVENTS['RCMENU_DPC'][1]='cpmconfedit';
$__EVENTS['RCMENU_DPC'][2]='cpmconfdel';
$__EVENTS['RCMENU_DPC'][3]='cpmconfadd';
$__EVENTS['RCMENU_DPC'][4]='cpmsavenest';
$__EVENTS['RCMENU_DPC'][5]='cpmloadnest';
$__EVENTS['RCMENU_DPC'][6]='cpmnewmenu';
$__EVENTS['RCMENU_DPC'][7]='cpmselectmenu';

$__ACTIONS['RCMENU_DPC'][0]='cpmconfig';
$__ACTIONS['RCMENU_DPC'][1]='cpmconfedit';
$__ACTIONS['RCMENU_DPC'][2]='cpmconfdel';
$__ACTIONS['RCMENU_DPC'][3]='cpmconfadd';
$__ACTIONS['RCMENU_DPC'][4]='cpmsavenest';
$__ACTIONS['RCMENU_DPC'][5]='cpmloadnest';
$__ACTIONS['RCMENU_DPC'][6]='cpmnewmenu';
$__ACTIONS['RCMENU_DPC'][7]='cpmselectmenu';

$__LOCALE['RCMENU_DPC'][0]='RCMENU_DPC;Menu Configuration;Menu Configuration;';
$__LOCALE['RCMENU_DPC'][1]='_newelement;New element;Νέο στοιχείο;';
$__LOCALE['RCMENU_DPC'][2]='_presshere;Press here;Πατήστε εδώ για εισαγωγή;';
$__LOCALE['RCMENU_DPC'][3]='title;Title;Τίτλος;';
$__LOCALE['RCMENU_DPC'][4]='link;Url;Δεσμός Url;';
$__LOCALE['RCMENU_DPC'][5]='_mainmenu;Main;Βασικό;';
$__LOCALE['RCMENU_DPC'][6]='_newmenu;New;Νέο;';
$__LOCALE['RCMENU_DPC'][7]='_menu;Menu;Μενού;';
$__LOCALE['RCMENU_DPC'][8]='_collapse;Collapse;Συρίκνωση;';
$__LOCALE['RCMENU_DPC'][9]='_expand;Expand;Επέκταση;';
$__LOCALE['RCMENU_DPC'][10]='_save;Save;Αποθήκευση;';
$__LOCALE['RCMENU_DPC'][11]='_currentmenu;Current;Τρέχον;';
$__LOCALE['RCMENU_DPC'][12]='_saved;Saved;Αποθηκεύτηκε;';
$__LOCALE['RCMENU_DPC'][13]='_notsaved;Not saved;Δεν αποθηκεύτηκε;';

class rcmenu extends cmsmenu {

    var $crlf, $path, $title;
	var $t_config, $t_config0, $t_config1, $t_config2;
	var $edit_per_lan, $cptemplate;
	
	var $selectedMenu;
	
    public function __construct() {
	
	    parent::__construct();
	
	    $this->title = localize('RCMENU_DPC',getlocal());		
	
	    $os =  php_uname();//'>';
        $info = strtolower($os);// $_SERVER['HTTP_USER_AGENT'] );   
        $this->crlf = PHP_EOL; //( strpos( $info, "windows" ) === false ) ? "\n" : "\r\n" ;	
		   
		$this->path = paramload('SHELL','prpath');				  
		$this->cptemplate = remote_paramload('FRONTHTMLPAGE','cptemplate', $this->path);	
		
	    $this->edit_per_lan = true; //false;
		$this->t_config = array();		
		$this->selectedMenu = GetParam('menu');		
	}
	
    public function event($event=null) {			
	
	   	$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;		
	    	    		  			    
		switch ($event) {	
		
		    case "cpmselectmenu"    :	break;
			case "cpmnewmenu"       :	break;
			
			case "cpmloadnest"      : 	$this->t_config = $this->read_config();
										$this->loadNestList(); die();
										break;	
											
			case "cpmsavenest"      : 	$this->t_config = $this->read_config();
										$this->saveNestList(); die();
										break;
											
			case "cpmconfedit"      :	
			case "cpmconfdel"       :	
			case "cpmconfadd"       :									 
			case "cpmconfig"        :     
			default                 :	$this->t_config = $this->read_config();
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
    }
  
    public function action($action=null) {
		
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;			

		switch ($action) {	
		
		    case "cpmselectmenu"    :	break;
			case "cpmnewmenu"       :	break;		
	   
			case "cpmloadnest"      :	break;	 	   
			case "cpmsavenest"      :	break;	   

			case "cpmconfedit"      :   $out = $this->show_configuration("Save","cpmconfig&save=1",false);
										break;
			case "cpmconfdel"       :	break;
			case "cpmconfadd"       :   $out = $this->add_configuration("Add","cpmconfig&add=1");  
										break;								 						 
			case "cpmconfig"        :     
			default                 :   $out = (GetParam('ismain')=='1') ? 
											$this->show_configuration("Edit","cpmconfedit",true) : null; 							 
		}
	 
		return ($out);
    } 	
	
	protected function show_configuration($button_title,$action,$editable=false) {
		$myaction = seturl("t=".$action); 	
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
				$form->addElement($section,new form_element_text($localize_var,$sectionvar,$val,"span6",60,255,$editable));
			}
			$newelement = localize("_newelement",getlocal());
			$presshere = localize("_presshere",getlocal());
			$form->addElement($section,new form_element_onlytext($newelement,seturl("t=cpmconfadd&section=$section",$presshere),"forminput"));
		}
	   
		// Adding a hidden field
		$form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("FormAction", "$action"));
		$form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("ismain", "1"));
 
		// Showing the form
		$fout = $form->getform(0,0,$button_title);	
	   
		return ($fout);	   
	}
	
	protected function add_configuration($button_title,$action) {
		$myaction = seturl("t=".$action); 	
		$form = new form(localize('RCMENU_DPC',getlocal()), "RCMENU", FORM_METHOD_POST, $myaction);	
		
		if ($section=GetReq('section')) {
			$form->addGroup($section,ucfirst(strtolower($section)));		
		 
			$data = $this->t_config[$section];
			foreach ($data as $var=>$val) 
				$form->addElement($section,new form_element_onlytext($var,$val,"span6",60,255,0));
		 	
			$form->addElement($section,new form_element_text('variable','variable','variable',"span6",60,255,0));		 	 
			$form->addElement($section,new form_element_text('value','value','value',"span6",60,255,0));			 
		 
			// Adding section as hidden field
			$form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("section", $section));		 
		 
			// Adding a hidden field
			$form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("FormAction", "$action"));
			$form->addElement		(FORM_GROUP_HIDDEN,		new form_element_hidden ("ismain", "1"));
		}	
	   
		// Showing the form
		$fout = $form->getform(0,0,$button_title);	
	   
		return ($fout);		   	    
	}
	
    public function paramload($section,$param) {
        $config = $this->t_config;

        if (is_array($config[$section]))     
	        return ($config[$section][$param]);

    }
	
	public function paramset($section=null,$param=null,$value=null) {
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

    public function arrayload($section,$array) {
        $config = $this->t_config;//GetGlobal('config');
  
        if (is_array($config[$section]))
            $data = $config[$section][$array];
	
	    if ($data) 
			return(explode(",",$data));
    }
	
	public function arrayset($section,$array,$serialized_array=null) {
	
	    $data = unserialize($serialized_array);
		  
	    if (is_array($data)) 
		    $this->t_config[$section][$array] = implode(",",$data) . $this->crlf;
		//else //common param
		    //$this->paramset($section,$array,$serialized_array);
	}
	
	protected function read_config() {
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
	
	protected function write_config() {
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
	
	/*2 level tree saver (language based)*/
	protected function writenest_config($nestarray=null, $file=null) {
		$data = $nestarray ? $nestarray : json_decode(GetParam('list'),true);//as come from ajax post		
		$ret = null;
		$lan = getlocal() ? getlocal() : '0';
		
		$csep = _v("cmsrt.cseparator");
		//var_export($data);	

		$f = $file ? $file : "menu$lan.ini";
        $filename = $this->path . $f;	
        $fileCONTENTS = null;
		if (!empty($data)) {

            foreach ($data as $i=>$id) {
			    if ($id['id']=='recycle-bin') continue; //drop
				
				$fileCONTENTS .= "[" . $id['id'] . "]" . $this->crlf;
				$fileCONTENTS .= "title=" . $id['name'] . $this->crlf; 
				$fileCONTENTS .= "link=" . str_replace($csep, '^', $id['value']) . $this->crlf;
				$fileCONTENTS .= "spaces=0". $this->crlf;
				if ($submenu = $id['submenu'])
					$fileCONTENTS .= "submenu=" . $submenu . $this->crlf;
				
				$subCONTENTS = null;
				$submenu_items = $id['children'];
				if (is_array($submenu_items)) {//sub ids of nest
					$subCONTENTS = $this->crlf;
					$subCONTENTS .= '['. $submenu . ']' . $this->crlf;
					foreach ($submenu_items as $ci=>$child) {
						$subCONTENTS .= "title$ci=" . $child['name'] . $this->crlf;						
						$subCONTENTS .= "link$ci=" . str_replace($csep, '^', $child['value']) . $this->crlf;						
					}
					$fileCONTENTS .= $subCONTENTS . $this->crlf;	
				}	
				$fileCONTENTS .= $this->crlf;
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
		//$list = GetParam('list');
		//@file_put_contents("menu.list", $list);		
		//$menu = json_decode($list,true);//,false,5); //stdclass, depth 
		//var_export($menu);
		
		$w = $this->writenest_config(); //$menu);
		$ret = $w ? localize('_saved', getlocal()) : localize('_notsaved', getlocal());
		echo $ret;
		
		//tmp menu
		/*$tmplist = GetParam('tmplist');
		@file_put_contents("menutmp.list", $tmplist);
		$tmpmenu = json_decode($tmplist,true);
		$tmp = $this->writenest_config($tmpmenu, "menutmp.ini");		
		
		echo $tmp ? $ret . " (1)" : $ret;
		*/
    }	
	
	protected function nestdditem($id,$name,$value=null,$submenu=null) {
		$ret = "<li class='dd-item' data-id='$id' data-name='$name' data-value='$value' data-submenu='$submenu'>
                    <div class='dd-handle'>$name</div>
                </li>";
		return ($ret);		
	}
	
	protected function nestddgroup($id,$name,$value=null,$submenu=null,$group=null) {
		$ret = "<li class='dd-item' data-id='$id' data-name='$name' data-value='$value' data-submenu='$submenu'>
					<div class='dd-handle'>$name</div>
					<ol class='dd-list'>
						$group
					</ol>
				</li>";
		return ($ret);	   
	}
	
	public function nestBuild($file=null, $isdb=false) {
		$n = null;
	    $lan = getlocal() ? getlocal() : '0';
		
	    if ($file) {
			$inifile = $this->path . $file . $lan . '.ini';
			$conf = @parse_ini_file($inifile, 1, INI_SCANNER_RAW);
		}	
		else
			$conf = $this->t_config;//$tvar;		
	
		if (!$conf) return;
		
		//echo '>' . $file;
		//return null; ///<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
		
		foreach ($conf as $section=>$params) {

            if (substr($section,-8)=='-SUBMENU') continue; //bypass subs		
			
			$cn = null;
			if (isset($params['submenu'])) {
                //echo $section.'-SUBMENU'; 
				$sb = explode(',', $params['submenu']);	
				$submenu = isset($sb[$lan]) ? $sb[$lan] : $params['submenu'];
				foreach ($conf[$submenu] as $group=>$child) {
				    //echo $child,'<br/>';
					if (substr($group,0,5)=='title') {
						$nz = explode(',', $child);
						$name = isset($nz[$lan]) ? $nz[$lan] : $child;
						
						$tl = explode(',', $conf[$section.'-SUBMENU'][str_replace('title','link',$group)]);
						$value = isset($tl[$lan]) ? $tl[$lan] : $conf[$section.'-SUBMENU'][str_replace('title','link',$group)]; 
						$linkvalue = $this->make_link($value);
						
						$cn .= $this->nestdditem($section.'-'.$name, $name, $linkvalue);
					}				
				}
			}

			$nz = explode(',', $params['title']);
			$name = isset($nz[$lan]) ? $nz[$lan] : $params['title'];
			$nl = explode(',', $params['link']);
			$value = isset($nl[$lan]) ? $nl[$lan] : $params['link'];
			if ($cn)
				$n .= $this->nestddgroup($section, $name, $value, $submenu, $cn);
			else
				$n .= $this->nestdditem($section, $name, $value, md5($section.$name).'-SUBMENU');

		}    

		return $n;	
	}
	
	
	
	public function currentMenuName() {
		return $this->selectedMenu ?  $this->selectedMenu : localize('_mainmenu', getlocal());
	}
	
	public function readSelectedMenu() {
		if ($this->selectedMenu) 
			return $this->nestBuild($this->selectedMenu);
		
		return $this->nestBuild(); 
	}
	
	public function readCurrentMenu() {
		$db = GetGlobal('db');
	    //$lan = getlocal();
	    $itmname = _v("cmsrt.itmname"); //$lan ? 'itmname' : 'itmfname';
	    $itmdescr = _v("cmsrt.itmdescr"); //$lan ? 'itmdescr' : 'itmfdescr';
		$csep = _v("cmsrt.cseparator");	
		$code = _m("cmsrt.getmapf use code");		
		
		$cpGet = _v('rcpmenu.cpGet');		
		
		if ($id = $cpGet['id']) {
			//current id item
			$sSQL = "select $code,$itmname,$itmdescr from products WHERE $code=" . $db->qstr($id);
			$res = $db->Execute($sSQL);
			
			$cat = $cpGet['cat'];
			$cats = explode($csep, $cat);
			$c = array_pop($cats);
			$_c = _m("cmsrt.replace_spchars use $c+1");
			
			//the cat item,link
			$a = $this->nestdditem($cat, $_c, "klist/$cat/", md5($cat).'-SUBMENU');
			//the item,link
			$b = $this->nestdditem($res->fields[0], $res->fields[1], "kshow/$cat/".$res->fields[0] .'/', md5($res->fields[0]).'-SUBMENU');
			
			return $a . $b;
		}
		elseif ($cat = $cpGet['cat']) {
			//current cat, cat items
			$sSQL = "select $code,$itmname,$itmdescr from products WHERE ";
			$cats = explode($csep, $cat);
			foreach ($cats as $i=>$c) {
				$_c[] = _m("cmsrt.replace_spchars use $c+1");
				$_s[] = "cat" . $i . "=" . $db->qstr($_c[$i]);
			}	
			$sSQL .= implode(' AND ', $_s);
			$sSQL .= " AND itmactive>0 AND active>0";	
			$sSQL .= _m("cmsrt.orderSQL");
			//echo $sSQL;
			
			$res = $db->Execute($sSQL);
			$catitems = null;
			foreach ($res as $i=>$item)
				$catitems .= $this->nestdditem($item[0], $item[1], "kshow/$cat/".$item[0] .'/', md5($item[0]).'-SUBMENU');
				
			$title = array_pop($_c);
			//the cat items tree
			$a = $this->nestddgroup($cat, $title, "klist/$cat/", md5($cat).'-SUBMENU', $catitems);			
			//just the cat link item
			$b = $this->nestdditem(array_pop($cats), $title, "klist/$cat/", md5($cat).'-SUBMENU');
			
			return $b . $a;
		}	
		//else //current conf of main menu
		return $this->nestBuild(); 	
	}
	
	protected function readMenuFiles() {
		$turl0 = seturl('t=cpmselectmenu&menu=items');		
		$turl1 = seturl('t=cpmselectmenu&menu=cats');
		$turl2 = seturl('t=cpmselectmenu&menu=rel');
		$turl3 = seturl('t=cpmselectmenu&menu=tree');
		$menu_array = array(localize('_items', getlocal())=>$turl0,
						  localize('_relatives', getlocal())=>$turl1,
						  localize('_cats', getlocal())=>$turl2,											  
						  localize('_tree', getlocal())=>$turl3,);
		return ($menu_array);					
	}
	
	public function menuButtonSelect() {
		//$mode = GetReq('mode') ? GetReq('mode') : 'menu';
	    $lan = getlocal() ? getlocal() : '0';
		$menufile = $this->path . 'menu' . $lan . '.ini';						  
		$basicmenu = is_readable($menufile) ? array(localize('_menu', getlocal())=>seturl('t=cpmselectmenu&menu=menu')) : array();				  
		
		$menus = array(); //$this->readMenuFiles();
		
		$turl99 = seturl('t=cpmconfig&ismain=1');
		$turl98 = seturl('t=cpmnewmenu');		
		$turl97 = seturl('t=cpmconfig');
		$stdcmd = array(localize('_newmenu', getlocal())=>$turl98,
						0=>'',											  
						localize('_mainmenu', getlocal())=>$turl99,
						localize('_currentmenu', getlocal())=>$turl97,
						1=>'',
		                );
		
		
		$button = $this->createButton(localize('_menu', getlocal()), array_merge($stdcmd, $basicmenu, $menus),'info');	
		return $button;									
																	
		/*switch ($mode) {
			
			default         : $content = $this->landpages_grid(null,140,5,'r', true); break;	
		}			
					
		$ret = $this->window(localize('RCCMSLANDP_DPC', getlocal()).': '.localize('_'.$mode, getlocal()), $button, $content);
		
		return ($ret);*/
	}	

	protected function createButton($name=null, $urls=null, $t=null, $s=null) {
		$type = $t ? $t : 'primary'; //danger /warning / info /success
		switch ($s) {
			case 'large' : $size = 'btn-large '; break;
			case 'small' : $size = 'btn-small '; break;
			case 'mini'  : $size = 'btn-mini '; break;
			default      : $size = null;
		}
		
		if (!empty($urls)) {
			foreach ($urls as $n=>$url)
				$links .= $url ? '<li><a href="'.$url.'">'.$n.'</a></li>' : '<li class="divider"></li>';
			$lnk = '<ul class="dropdown-menu">'.$links.'</ul>';
		} 
		
		$ret = '
			<div class="btn-group">
                <button data-toggle="dropdown" class="btn '.$size.'btn-'.$type.' dropdown-toggle">'.$name.' <span class="caret"></span></button>
                '.$lnk.'
            </div>'; 
			
		return ($ret);
	}	
	
	protected function window($title, $buttons, $content) {
		$ret = '	
		    <div class="row-fluid">
                <div class="span12">
                  <div class="widget red">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i> '.$title.'</h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                           </span>
                        </div>
                        <div class="widget-body">
							<div class="btn-toolbar">
							'. $buttons .'
							<hr/><div id="cmsframe"></div>
							</div>
							'.  $content .'
                        </div>
                  </div>
                </div>
            </div>
';
		return ($ret);
	}		

};
}
?>