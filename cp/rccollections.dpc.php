<?php

$__DPCSEC['RCCOLLECTIONS_DPC']='1;1;1;1;1;1;2;2;9';

if ( (!defined("RCCOLLECTIONS_DPC")) && (seclevel('RCCOLLECTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCOLLECTIONS_DPC",true);

$__DPC['RCCOLLECTIONS_DPC'] = 'rccollections';


$__EVENTS['RCCOLLECTIONS_DPC'][0]='cpcollections';
$__EVENTS['RCCOLLECTIONS_DPC'][1]='cpsavecol';
$__EVENTS['RCCOLLECTIONS_DPC'][2]='cploadcol';
$__EVENTS['RCCOLLECTIONS_DPC'][3]='cpsavexml';

$__ACTIONS['RCCOLLECTIONS_DPC'][0]='cpcollections';
$__ACTIONS['RCCOLLECTIONS_DPC'][1]='cpsavecol';
$__ACTIONS['RCCOLLECTIONS_DPC'][2]='cploadcol';
$__ACTIONS['RCCOLLECTIONS_DPC'][3]='cpsavexml';

$__LOCALE['RCCOLLECTIONS_DPC'][0]='RCCOLLECTIONS_DPC;Select items;Επιλογή ειδών';

class rccollections {
	
	var $title, $prpath, $urlpath, $url, $cat, $item;
	var $map_t, $map_f, $cseparator, $onlyincategory;
	var $listName;
	
	var $imgxval, $imgyval, $image_size_path;
	var $selected_items, $autoresize, $restype, $odd;	
	
	var $filename, $fields;

    function __construct() {
	  
		$this->prpath = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');	
		$this->url = paramload('SHELL','urlbase');
		$this->title = localize('RCCOLLECTIONS_DPC',getlocal());	
		
		$this->cat = GetParam('cat'); //GetReq('cat');	    
		$this->item = GetParam('id'); //GetReq('id');
		
		$this->map_t = remote_arrayload('RCITEMS','maptitle',$this->prpath);	
		$this->map_f = remote_arrayload('RCITEMS','mapfields',$this->prpath);		
		
		$csep = remote_paramload('RCITEMS','csep',$this->prpath); 
		$this->cseparator = $csep ? $csep : '^';	

		$this->onlyincategory = remote_paramload('SHKATALOGMEDIA','onlyincategory',$this->prpath);
		
		$this->autoresize = remote_arrayload('RCITEMS','autoresize',$this->prpath);
		$this->restype = remote_paramload('RCITEMS','restype',$this->prpath);
		$image_def_xsize = remote_paramload('RCEDITITEMS','imgdefsizex',$this->prpath);		
        $image_def_ysize = remote_paramload('RCEDITITEMS','imgdefsizey',$this->prpath);				
		$this->imgxval = $image_def_xsize ? $image_def_xsize : ((!empty($this->autoresize)) ? $this->autoresize[0] : 0);//90;//as it is
		$this->imgyval = $image_def_ysize ? $image_def_ysize : 0;//90; //as it is	
		
		$ip = remote_paramload('RCCOLLECTIONS','imagepath',$this->prpath);
		$ipath = $ip ? $ip : '/images/';
		$ia = remote_paramload('RCCOLLECTIONS','imageabs',$this->prpath);
		if (!$ia) {
			$pt = remote_paramload('RCITEMS','phototype',$this->prpath);	
			$phototype = $pt ? $pt : 0; 		
			switch ($phototype) {
				case 3  : $this->image_size_path = $ipath . remote_paramload('RCITEMS','photobgpath',$this->prpath); break;
				case 2  : $this->image_size_path = $ipath . remote_paramload('RCITEMS','photomdpath',$this->prpath); break;
				case 1  : $this->image_size_path = $ipath . remote_paramload('RCITEMS','photosmpath',$this->prpath); break;
				default : $this->image_size_path = $ipath . remote_paramload('RCITEMS','photobgpath',$this->prpath);
			}
        }
		else
			$this->image_size_path = $ipath; //absolute path		
		
		$this->selected_items = null;		
		
        $this->listName = 'mylist';
        $this->savedlist = GetSessionParam($this->listName) ? GetSessionParam($this->listName) : null;
		$this->filename = $this->prpath . $_POST['cname'] . '.col';
		
		$this->fields = array('code','itmname','itmdescr','itmremark','uniname1','price0','price1','cat','item_name_url','item_url','photo_url');
		$this->xmlfile = $_POST['xmlfile'];
        $this->listXMLName = 'myXMLlist';
        $this->savedXMLlist = GetSessionParam($this->listXMLName) ? GetSessionParam($this->listXMLName) : null;		
	}
	
    function event($event=null) {
	
	   /////////////////////////////////////////////////////////////
	   if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	
	   /////////////////////////////////////////////////////////////			

       if (!$this->msg) {
  
	     switch ($event) {
			 
            case 'cpsavexml'      : $this->savedXMLlist = $this->save_xml_file(); 
			                        break;				 
			 
		    case 'cploadcol'      : $this->savedlist = $this->loadList(); 
			                        break;			 
		 
		    case 'cpsavecol'      : $this->savedlist = $this->saveList();				
	                                break;									
			case 'cpcollections'  :
			default               :							  
         }
      }
    }	

    function action($action=null)  { 

	     switch ($action) {
           case 'cpsavexml'      : break;		 
		   
		   case 'cploadcol'      : break;		   
		   
		   case 'cpsavecol'      : $out = 'Filename:' . $this->filename . '<br/>';
		                           $out .= 'SessionList:' . $this->savedList . '<br/>';
								   $out .= implode('<br/>', $_POST);
								   $out .= implode('<br/>', array_keys($_POST));
		                           /*$out .= $this->listName . ':'; //implode('<br/>', $_POST); 
								   foreach ($_POST[$this->listName] as $s)
									$out .= $s.'|';
								   $out .= '<br/><br/>tlist:';	
								   foreach ($_POST['tlist'] as $t)
									$out .= $t.'|';	*/
		                           break;
		   default               : //$out = $this->savedlist;
		 }			 

	     return ($out);
	}
		
	
	protected function readPattern($template=null, $path=null) {
		$file = str_replace('-sub.htm', '', $template) . '.pattern.txt';
		//echo $file;
		if (is_readable($file))  {
			$pf = file($file);
			//search last edited line
			foreach ($pf as $line) {
				if (trim($line)) {
					$joins = explode(',', array_pop($pf)); 
					break;
				}
			}
			//rest lines
			foreach ($pf as $line) {
				$subtemplates .= trim($line);
			}
			$pattern[0] = explode(',', $subtemplates);
			$pattern[1] = (array) $joins;
			//print_r($pattern);
			return ($pattern);
		}	
		
		return null;
	}
	
	protected function get_selected_items() {
		
		if ($this->savedXMLlist) 
			$ret = $this->get_selected_XML_items();
		else	
			$ret = $this->get_selected_db_items(500);
		
		return ($ret);
	}	
	
	public function create_page_test($template=null, $imgw=null,$imgh=null,$tmplpath=null) {		
		$p = $this->readPattern($template);
		$pattern = (array) $p[0];
		$join = (array) $p[1];
		
		/*$p = array(0=>array(0=>'basis-xondriki-1-align-left-sub.htm',1=>'basis-xondriki-1-align-right-sub.htm'),1=>array(0=>'',1=>''));
		$pattern= $p[0];
		print_r($pattern);
		$join = array();*/		
		
        $this->selected_items = $this->get_selected_items(500);	
		
		foreach ($this->selected_items as $n=>$rec) {
		
			    $tokens[] = $rec['code'];
			    $tokens[] = $rec['itmname'];
				$tokens[] = $rec['itmdescr'];
				$tokens[] = $rec['itmremark'];
				$tokens[] = $rec['uniname1'];
				$tokens[] = $rec['price0'];
				$tokens[] = $rec['price1'];
				$tokens[] = $rec['cat0'];
				$tokens[] = $rec['cat1'];
				$tokens[] = $rec['cat2'];
				$tokens[] = $rec['cat3'];
				$tokens[] = $rec['cat4'];
				$tokens[] = $rec['item_name_url'];
				$tokens[] = (defined('RCBULKMAIL_DPC')) ? GetGlobal('controller')->calldpc_method('rcbulkmail.encUrl use '.$rec['item_url']) : $rec['item_url'];
				$tokens[] =  $rec['photo_url']; /*(defined('RCBULKMAIL_DPC')) ? GetGlobal('controller')->calldpc_method('rcbulkmail.encUrl use '.$rec['photo_url']) : $rec['photo_url'];*/
				$tokens[] = $rec['photo_html'];
				$tokens[] = $rec['photo_link'];
				$tokens[] = $rec['attachment'];
				$tokens[] = ($n % 2 == 0) ? '1' : '0'; //even  / odd	
				
				$childs[] = $tokens;
				unset($tokens);
		}
		/*echo '<pre>';
		print_r($this->selected_items);
		echo '</pre>';*/
        if ($cn=count($pattern)) {		
		$cc = array_chunk($childs, $cn);//, true);
		/*echo '<pre>';
		print_r($cc);
		echo '</pre>';*/

		foreach ($cc as $i=>$group) {
			foreach ($group as $j=>$child) {
				//echo $tmplpath . $pattern[$j] . '<br>';
			    $ret .= $this->ct($tmplpath . $pattern[$j], $child, true);
				if ($join[$j]) {
					 $ret = $this->ct($tmplpath . $join[$j], array(0=>$ret), true);
				}
			}
		}
        }
		return($ret);		
	}
	
	public function create_page($template=null, $tmplpath=null) {
		$pattern_method = false;
		
		$p = $this->readPattern($template);
		if (is_array($p)) {
			//print_r($p);
			$pattern = (array) $p[0];
			$join = (array) $p[1];				
			$pattern_method = true;
	    }
	    elseif (($template) && (is_readable($template)))  {
			
			/* //*** beware of twing file path of the instance ***
			if (defined('TWIGENGINE_DPC')) {
				$date = date('m.d.y');
				$x = 'notes123';//.var_export($invoice_tokens, true);
				$t = array('invoice'=>GetSessionParam('invway') .' '.$this->transaction_id,
						'mynotes'=>$x,
						'mydate'=>$date);
				$tokens = serialize($t);
				echo GetGlobal('controller')->calldpc_method('twigengine.render use '.$invoice_template.'++'.$tokens);
				//echo 'z';
				//die();
			}	*/			
			
			/*if (defined('CCPP_VERSION')) { //one template for all lines
				$preprocessor = GetGlobal('controller')->calldpc_var('pcntl.preprocessor'); 
				$template_data = $preprocessor->execute($template, 0, false, true);
			}
			else*/
				$template_data = @file_get_contents($template); 
        }
		else
			return null;

        $this->selected_items = $this->get_selected_items();	
		
		if (!empty($this->selected_items)) {
			$tokens = array();
			$items = array();		
			//..order array by key
			//ksort($this->selected_items);
					
			foreach ($this->selected_items as $n=>$rec) {
		        
			    //$ret.= $rec['itmname'].'<BR/>'; 
			    $tokens[] = $rec['code'];
			    $tokens[] = $rec['itmname'];
				$tokens[] = $rec['itmdescr'];
				$tokens[] = $rec['itmremark'];
				$tokens[] = $rec['uniname1'];
				$tokens[] = $rec['price0'];
				$tokens[] = $rec['price1'];
				$tokens[] = $rec['cat0'];
				$tokens[] = $rec['cat1'];
				$tokens[] = $rec['cat2'];
				$tokens[] = $rec['cat3'];
				$tokens[] = $rec['cat4'];
				$tokens[] = $rec['item_name_url'];
				$tokens[] = (defined('RCBULKMAIL_DPC')) ? GetGlobal('controller')->calldpc_method('rcbulkmail.encUrl use '.$rec['item_url']) : $rec['item_url'];
				$tokens[] =  $rec['photo_url']; /*(defined('RCBULKMAIL_DPC')) ? GetGlobal('controller')->calldpc_method('rcbulkmail.encUrl use '.$rec['photo_url']) : $rec['photo_url'];*/
				$tokens[] = $rec['photo_html'];
				$tokens[] = $rec['photo_link'];
				$tokens[] = $rec['attachment'];
				$tokens[] = ($n % 2 == 0) ? '1' : '0'; //even  / odd
				//print_r($tokens); 
				//echo '>',  ($n % 2 == 0) ? '1' : '0';
				$this->odd = ($n % 2 == 0) ? '0' : '1';
				
				/*if (defined('CCPP_VERSION')) { //override, customized per line
					//$config = array();
					if ($n % 2 == 0) 
						$config = array('LINE'=>array('ODD'=>null,'EVEN'=>1),'PRICE'=>array('ON'=>1,));
					else 
						$config = array('LINE'=>array('ODD'=>1,'EVEN'=>null),'PRICE'=>array('ON'=>1,));
					
					$preprocessor = new CCPP($config, true); //new ccpp
					$template_data = $preprocessor->execute($template_data, 0, true, true);
					unset($preprocessor);
				}*/			
				
				if ($pattern_method) /** pattern method **/
					$items[] = $tokens;
				else                   /** standart method **/
					$items[] = $this->combine_tokens($template_data, $tokens, true);
				
				unset($tokens);		
 	
			}//foreach
		 
			/** pattern method **/
			if ($pattern_method) {
				$out = null;
				$tts = array();
				$gr= array();
				$cc = array_chunk($items, count($pattern));//, true);
				foreach ($cc as $i=>$group) {
					foreach ($group as $j=>$child) {
						//echo $tmplpath . $pattern[$j] . '<br>';
						$tts[] = $this->ct($tmplpath . $pattern[$j], $child, true);
						if ($cmd = $join[$j]) {
							//echo $tmplpath . $join[$j] . '<br>';
							switch ($cmd) {
							    case '_break' : $out .= implode('', $tts); break;
								default       : $out .= $this->ct($tmplpath . $cmd, $tts, true);		
							} 
							unset($tts);
						}
					}
					$gr[] = (empty($tts)) ? $out : $out . implode('', $tts) ;
					unset($tts);
					$out = null;
				}
				$ret = implode('',$gr);
                $ret = $this->ct($template, array(0=>$ret), true);	
			}
			else
				$ret = implode('',$items);			 
		} 			
		return ($ret);
	}
	
	//when no create_page..just read items to show...
	function read_selected_items() {
		if ($this->savedXMLlist) 
			$this->selected_items = $this->get_selected_xml_items();
		else
			$this->selected_items = $this->get_selected_db_items(500);
		   	
		//..order array by key
		ksort($this->selected_items);			
	}	
	
	public function viewList() {
		if ($this->savedXMLlist) 
			$ret = $this->viewXmlList();
		else
			$ret = $this->viewDbList();		
		return ($ret);
	}

	public function viewCollection() {
		if ($this->savedXMLlist) 
			$ret = $this->viewXmlCollection();
		else
			$ret = $this->viewDbCollection();		
		return ($ret);		
    }		
	
	public function isCollection() {
		if ($this->savedXMLlist) {
			$s = unserialize($this->savedXMLlist);
			$ret = count($s);	
		}
		else {
			if ($c = $this->savedlist) {
				if (strstr($c, ',')) 
					$ret = count(explode(',', $c));
				else 
					$ret = 1;
			}
			else
				$ret = 0;
	    }	
		return ($ret);
	}		

    public function getCurrentList() {
		if ($this->savedXMLlist) 
			$ret = $this->getCurrentXmlList();
		else
			$ret = $this->getCurrentDbList();
		return ($ret);
    }
	
	protected function saveListInFile($data=null) {
		
		if ($_POST['cname']) { 
			$ret = @file_put_contents($this->filename, $data);
			return $ret;
		}
		return false;
	}	
	
	protected function saveList() {
		
		if ($xmlfile = $_POST['xmlload']) { 
		    //in case of xml loading (recycle saves until the end of field match)
			$this->load_xml_file($xmlfile,true);
		}
		elseif ($this->savedXMLlist) {
			//loaded xml record list, handle by removing items
			if (!empty($_POST[$this->listName])) { //mylist post array selector
				//print_r($_POST[$this->listName]);
				$xmlrecs = unserialize($this->savedXMLlist);
				foreach ($xmlrecs as $i=>$rec) {
					if (in_array($rec['code'],$_POST[$this->listName]))
						$newrec[] = $rec;
				}
				if (!empty($newrec)) {
					$this->savedXMLlist = serialize($newrec);
					SetSessionParam($this->listXMLName, $this->savedXMLlist); //re-save xml list as recordset
				}
			}
			else {	
				$this->savedXMLlist = null;
				SetSessionParam($this->listXMLName, $this->savedXMLlist); //clean xml list			
			}	
			
			return true;
		}
		else { //choose items from selected cat /id
		  if (!empty($_POST[$this->listName])) { 
			$plist = implode(',', $_POST[$this->listName]);
		
			$list = GetSessionParam($this->listName) ? GetSessionParam($this->listName) .','.$plist : $plist;
			SetSessionParam($this->listName, $list);
			
			$this->saveListInFile($list);
		  }
		  else {
			$list = null; //GetSessionParam($this->listName);
			SetSessionParam($this->listName, $list);
			
			$this->saveListInFile($list);
		  }
		  
		  return ($list);
        }
		return false;	
	}
	
	
	/************************ db item handler **********************/
	
    protected function getCurrentDbList() {
		$db = GetGlobal('db');
	    $lan = getlocal();
	    $itmname = $lan ? 'itmname':'itmfname';
	    $itmdescr = $lan ? 'itmdescr':'itmfdescr';		
		$code = $this->getmapf('code');
		
		$sSQL = 'select id,'.$code.',' . $itmname .' from products where ';
		
		if ($this->item) {
			$sSQL .= $code . '=' . $db->qstr($this->item);
		}	
		elseif ($this->cat) {
			
			$cat_tree = explode($this->cseparator,str_replace('_',' ',$this->cat));
			
			if ($cat_tree[0])
				$whereClause .= ' cat0=' . $db->qstr(str_replace('_',' ',$cat_tree[0]));		
			elseif ($this->onlyincategory)
				$whereClause .= ' (cat0 IS NULL OR cat0=\'\') ';				  
			if ($cat_tree[1])	
				$whereClause .= ' and cat1=' . $db->qstr(str_replace('_',' ',$cat_tree[1]));	
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat1 IS NULL OR cat1=\'\') ';	 
			if ($cat_tree[2])	
				$whereClause .= ' and cat2=' . $db->qstr(str_replace('_',' ',$cat_tree[2]));	
			elseif ($this->onlyincategory)
			 	$whereClause .= ' and (cat2 IS NULL OR cat2=\'\') ';		   
			if ($cat_tree[3])	
				$whereClause .= ' and cat3=' . $db->qstr(str_replace('_',' ',$cat_tree[3]));
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat3 IS NULL OR cat3=\'\') ';
		   		
		    
			$sSQL .= $whereClause;	

		}
        else
			return null;	
		
        if (!empty($_POST[$this->listName]))    
            $plist = implode(',',$_POST[$this->listName]);

        if ($sl = GetSessionParam($this->listName)) 
			$plist .= ($plist ? ','. $sl : $sl);			
			
		if ($plist)
			$sSQL .= ' and id not in (' . $plist . ')';
		$sSQL .= " and itmactive>0 and active>0";			   
		$sSQL .= " ORDER BY " . $itmname;		
		
		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			$ret[] = "<option value='".$rec['id']."'>". $rec[$code].'-'.$rec[$itmname]."</option>" ;
        }		

		return (implode('',$ret));	
	}		
		
	protected function viewDbList() {
		$db = GetGlobal('db');
	    $lan = getlocal();
	    $itmname = $lan ? 'itmname':'itmfname';
	    $itmdescr = $lan ? 'itmdescr':'itmfdescr';		
		$code = $this->getmapf('code');
		
		if (!empty($_POST[$this->listName]))  
			$plist = implode(',', $_POST[$this->listName]);	
        else
			$plist = null;	
		
		$list = $this->savedlist ? $this->savedlist .','.$plist : $plist;
		if (!$list) return ;
		
		$sSQL = 'select id,'.$code.',' . $itmname .' from products where ';
		$sSQL .= ' id in (' . $this->savedlist . ')';
		$sSQL .= " and itmactive>0 and active>0";			   
		$sSQL .= " ORDER BY " . $itmname;	

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			$ret[] = "<option value='".$rec['id']."'>". $rec[$code].'-'.$rec[$itmname]."</option>" ;
        }		

		return (implode('',$ret));			
	}	
	
	protected function viewDbCollection() {
		$db = GetGlobal('db');
	    $lan = getlocal();
	    $itmname = $lan ? 'itmname':'itmfname';
	    $itmdescr = $lan ? 'itmdescr':'itmfdescr';		
		$code = $this->getmapf('code');
		
		$sSQL = 'select id,'.$code.',' . $itmname .' from products where ';
		$sSQL .= ' id in (' . GetSessionParam($this->listName) . ')';
		$sSQL .= " and itmactive>0 and active>0";			   
		$sSQL .= " ORDER BY " . $itmname;	

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		
		//print_r($resultset);
		if ($resultset) {
			foreach ($resultset as $n=>$rec) {
				$ret[] = "<option value='".$rec['id']."'>". $rec[$code].'-'.$rec[$itmname]."</option>" ;
			}		
			return (implode('',$ret));
		}
		return false;	
	}		
	
	public function postSubmit($action, $title=null, $class=null) {
		if (!$action) return;
		$submit = $title ? $title : 'Submit';
		$cl = $class ? "class=\"$class\"" : null;
		 
		$c = "<INPUT type=\"hidden\" name=\"cat\" value=\"{$this->cat}\" />";
		$c .= "<INPUT type=\"hidden\" name=\"item\" value=\"{$this->id}\" />";	
		
        $c .= "<INPUT type=\"submit\" name=\"submit\" value=\"" . $submit . "\" $cl />";  
        $c .= "<INPUT type=\"hidden\" name=\"FormName\" value=\"Collections\" />";		   
        $c .= "<INPUT type=\"hidden\" name=\"FormAction\" value=\"" . $action . "\" $cl />";
        return ($c);   		   
	}

	protected function getmapf($name) {
	
	  if (empty($this->map_t)) return 0;
	  
	  foreach ($this->map_t as $id=>$elm)
	    if ($elm==$name) break;
				
	  $ret = $this->map_f[$id];
	  return ($ret);
	}
	
	protected function get_selected_db_items($items=10,$img_width=null, $img_height=null, $id=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';	
        $codefield = $this->getmapf('code');		
		
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4,".
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,volume,".$this->getmapf('code').
				" from products WHERE ";

		$sSQL .= /*$codefield .*/ "id in (" . GetSessionParam($this->listName) .")";
	    $sSQL .= " and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY orderid";
        $sSQL .= " limit " . $items;		
		
		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		//print_r($resultset);
		if (empty($resultset)) return null;
		
		$ix =1;
		foreach ($resultset as $n=>$rec) {
		
		    $id = $rec[$codefield];
			/*
		    //read posted data per item..
		    $out_of_list = GetParam($id) ? true : false;//remove from rendering list
			//if (GetParam($id)) continue;
		    $img_width = GetParam('imagex_'.$id) ? GetParam('imagex_'.$id) : $img_width;
		    $img_height = GetParam('imagey_'.$id) ? GetParam('imagey_'.$id) : $img_height;		
            $width = $img_width ? "width=\"$img_width\" " : null;
		    $height = $img_height ? "height=\"$img_height\" " : null;				
			*/
			
			$cat = $rec['cat0'] ? str_replace(' ','_',$rec['cat0']) : null;
			$cat .= $rec['cat1'] ? $this->cseparator . str_replace(' ','_',$rec['cat1']) : null;
			$cat .= $rec['cat2'] ? $this->cseparator . str_replace(' ','_',$rec['cat2']) : null;
			$cat .= $rec['cat3'] ? $this->cseparator . str_replace(' ','_',$rec['cat3']) : null;
			$cat .= $rec['cat4'] ? $this->cseparator . str_replace(' ','_',$rec['cat4']) : null;
			
			$item_url = $this->url . '/' . seturl('t=kshow&cat='.$cat.'&id='.$id,null,null,null,null,1);
			$item_name_url = seturl('t=kshow&cat='.$cat.'&id='.$id,$rec['itmname'],null,null,null,1);			   
		    $item_name_url_base = "<a href='$item_url'>".$rec['itmname']."</a>";
			
            /*if ($this->has_photo2db($id,$this->restype,'LARGE')) {
				$item_photo_url = 'http://' . $this->url . '/showphoto.php?id='.$id.'&type=LARGE';
				$item_photo_html = "<img src=\"" . $item_photo_url . "\" $width $height>";
				$item_photo_link = "<a href='$item_url'><img src=\"" . $item_photo_url . "\" $width $height></a>";
            }  		 
			else*/ 
			$imgfile = $this->urlpath . $this->image_size_path . '/' . $id . $this->restype;
			//echo '<br/>', $imgfile;
			if (file_exists($imgfile)) { 	 
				$item_photo_url = $this->url . $this->image_size_path . '/' . $id . $this->restype;
				$item_photo_html = "<img src=\"" . $item_photo_url . "\">";
				$item_photo_link = "<a href='$item_url'><img src=\"" . $item_photo_url . "\"></a>";
		    }

			//fetch extra html code 
            /*
			$attachment = $this->has_attachment2db($id,'.html', true);
            //replace relative path image/files with absolute path = url
            if (stristr($attachment,'src="images/'))
                $attachment = str_replace('src="images/','src="'.$this->url.'/images/');   			
		    */
			$attachment = null;
		    //$order_id = 'order_'.$id;
		    //$i = GetParam($order_id) ? GetParam($order_id) : $ix++;
			$i = $ix++;
			$ret_array[$i] = array(
			                /*'disabled'=>$out_of_list,*/
			                'code'=>$id,
			                'itmname'=>$rec[$itmname],
							'itmdescr'=>$rec[$itmdescr],
							'itmremark'=>$rec['itmremark'],
							'uniname1'=>$rec['uniname1'],
							'price0'=> number_format(floatval($rec['price0']),2,',','.'),
							'price1'=> number_format(floatval($rec['price1']),2,',','.'), 
							'cat0'=>$rec['cat0'],
							'cat1'=>$rec['cat1'],
							'cat2'=>$rec['cat2'],
							'cat3'=>$rec['cat3'],
							'cat4'=>$rec['cat4'],
							'item_url'=>$item_url,
							'item_name_url'=>$item_name_url_base,
							'photo_url'=>$item_photo_url,
							'photo_html'=>$item_photo_html,
							'photo_link'=>$item_photo_link,
							'attachment'=>$attachment,
							);
		}
		
		return ($ret_array);
	}		
	
	protected function show_select_collections($name, $taction=null, $ext=null, $class=null) {
		$col = GetReq('collection') ;
	
		$url = ($taction) ? seturl('t='.$taction.'&collection=',null,null,null,null) : 
		                    seturl('t=cploadcol&collection=',null,null,null,null);
		
		if (defined('RCFS_DPC')) {
			$path = $this->prpath;
			$myext = explode(',',$ext);
			$extensions = is_array($myext) ? $myext : array(0=>".png",1=>".gif",2=>".jpg");
			
			if (is_dir($path)) {
		
				$this->fs= new rcfs($path);
				$ddir = $this->fs->read_directory($path,$extensions); 

				if (!empty($ddir)) {
		  
					sort($ddir);	 
					
					$ret .= "<select name=\"$name\" onChange=\"location=this.options[this.selectedIndex].value\" $class>"; 
					$ret .= "<option value=\"\">Select...</option>";
					
					foreach ($ddir as $id=>$fname) {
						$parts = explode(".",$fname);
						$title = $parts[0];
						$parts2 = explode(".",$col);
						$selectedcol = $parts2[0];
						$selection = ($title == $selectedcol) ? " selected" : null;
						
						$ret .= "<option value=\"". $url . $fname. "\"". $selection .">$title</option>";		
					}	
		
					$ret .= "</select>";			    
				}
			}//empty dir
	    }  
		       
	    return ($ret);		
	}	
	
	public function viewCollectionsSelect() {
		
		$ret = $this->show_select_collections('mycollection', null, '.col', null);
		return ($ret);
	}		
	
	protected function loadList() {
		$colfile = $_GET['collection'];
		$list = @file_get_contents($this->prpath . $colfile);
		
		SetSessionParam($this->listName, $list);
		return $list;
	}
	
	/*************************** XML handler *************************************/
	
	protected function getCurrentXmlList() {
		return false; //not active when xml selections (only remove)
	}	
	
	protected function viewXmlList() {
		$xmlrecs = unserialize($this->savedXMLlist);
		if (!empty($xmlrecs)) {
			foreach ($xmlrecs as $i=>$rec) {
				//if ($i==0) print_r($rec);
				$ret[] = "<option value='".$rec['code']."'>". $rec['code'].'-'.$rec['itmname']."</option>" ;
			}		
			return (implode('',$ret));	
		}
		return null;
	}
	
	protected function viewXmlCollection() {
		$xmlrecs = unserialize($this->savedXMLlist);
		if (!empty($xmlrecs)) {
			foreach ($xmlrecs as $i=>$rec) {
				//if ($i==0) print_r($rec);
				$ret[] = "<option value='".$rec['code']."'>". $rec['code'].'-'.$rec['itmname']."</option>" ;
			}		
			return (implode('',$ret));	
		}		
	}	
	
	protected function get_selected_XML_items() {
		$xmlrecs = unserialize($this->savedXMLlist);
		return ($xmlrecs);
	}	
	
	protected function load_xml_file($file=null, $returnkeys=false) {
		if (!$file) $file = $this->prpath . 'temp.xml';//read cached file when no file submited (first time read)
		
		if (($response_xml_data = file_get_contents($file))===false){
			echo "Error fetching XML\n";
		} 
		else {
			libxml_use_internal_errors(true);
			$data = simplexml_load_string($response_xml_data, null, LIBXML_NOCDATA);
			if (!$data) {
				echo "Error loading XML\n";
				foreach(libxml_get_errors() as $error) {
					echo "\t", $error->message;
				}
			} 
			else {
				/*echo '<pre>';
				print_r($data);
				echo '</pre>';*/
				
				/*save temporary*/
				$ret = @file_put_contents($this->prpath . 'temp.xml', $response_xml_data);
				unlink ('temp.xlx'); //reset xlx
				
				/*if ($returnkeys==true) {
					$array = json_decode(json_encode($data), TRUE);
					echo '<pre>';
				    print_r($array['products']['product']);
				    echo '</pre>';
					//$attr = $data->{'products'}->product[0]->attributes();
				    //print_r($attr);
					//echo $data->{'products'}->product[0]->title;
					
					foreach ($array[products][product] as $p=>$product) {
						//print_r(array_keys($product));
						return (implode(',', array_keys($product))); //at first element
					}					

				}*/
				return ($ret);
			}
		}
		return false;
	}
	
	/*check fields already in couples */
	protected function fixarray() {
		$filename = $_POST['xmlfile'] ? $_POST['xmlfile'].'.xlx' : 'temp.xlx'; 
		$f = @file($this->prpath . $filename);
		
		if (is_array($f)) {
			foreach ($f as $a=>$line) {
			  if ($line) {
				$x = explode(',',$line);
				$fa[trim($x[0])] = trim($x[1]);
			  }
			}  
		}
		else
			$fa = array(); //empty
		//print_r($fa);
		return $fa;
	}	
	
	protected function readXMLKeys($r) {
		$fx = $this->fixarray();
		foreach ($r as $f=>$field) {
			//print_r($field);
			if (is_array($field)) 
				$ret .= $this->readXMLKeys($field);
			else {
				if (!in_array($f, $fx))
					$ret .= "<option value='$f'>$f -> $field</option>";
			}	
			if ($f>0) break;
		}			
		return ($ret);
	}
	
	public function viewXMLkeys() {		
		/*load temporary*/
		$response_xml_data = @file_get_contents($this->prpath . 'temp.xml');		
		$data = simplexml_load_string($response_xml_data, null, LIBXML_NOCDATA);
		if ($data) {
			$array = json_decode(json_encode($data), TRUE);	
			$ret = $this->readXMLKeys($array);
        }
		return ($ret);		
	}
	
	public function viewDBKeys() {
		$fx = $this->fixarray();
		foreach ($this->fields as $f=>$field) {
			if (!array_key_exists($field, $fx))
				$ret .= "<option value='$field'>$field</option>";
		}	
			
		return ($ret);	
	}
	
	protected function proccedXMLKeys($r, $keys, $id=0) {
		foreach ($r as $f=>$field) {
			if (is_array($field)) {
				$a = $this->proccedXMLKeys($field, $keys, $id+1);
				/*if ($id<2) {//test
					echo '<pre>';
					print_r(unserialize($a));
					echo '</pre>';
				}*/
				$rec .= (!empty($a)) ? serialize($a) . '<@>' : null;
			}	
			else {
				if (in_array($f, $keys)) {
					//echo $id,'-',$f,'=',$field,'<br/>';
					foreach ($keys as $k=>$key) {
						if ($f==$key) $rec[$k] = $field;
					}					
				}
			}
		}		
		return ($rec);
	}	
	
	protected function proceedXML($matchkeys=null,$xmldata=null) {
        if (!is_array($matchkeys)) return false;	
		/*prepare keys*/
		foreach ($matchkeys as $mkey) {
			$k = explode(',',$mkey);
			$keys[trim($k[0])] = trim($k[1]); //db field / xml field pair
		}	
		//print_r($keys);
		$data = simplexml_load_string($xmldata, null, LIBXML_NOCDATA);
		if ($data) {
			$array = json_decode(json_encode($data), TRUE);	
			
			$ret = $this->proccedXMLKeys($array, $keys, 0);
			$ds = explode('<@>',$ret);
			foreach ($ds as $i=>$serialarray) {
				$un = unserialize($serialarray);
				if (!empty($un))
					$rec[] = $un;
			}	
			//print_r($rec);
			$ret = serialize($rec);
			SetSessionParam($this->listXMLName, $ret); //save xml list as recordset
        }
		return ($ret);	//serialized	
	}	
	
	protected function save_xml_file() {
		$dbf = $_POST['dbfield'];
		$xmlf = $_POST['xmlfield'];
		//fire up when check is on after fields connection or xlx preset selection
		$go = $_POST['goxml'] ? true : ($_GET['xlx'] ? true : false);

		if ($file = $_POST['xmlfile']) { 
		    $filename = $file . '.xlx';
			@copy($this->prpath . 'temp.xlx', $this->prpath . $filename);
			@unlink ('temp.xlx'); //reset xlx
		}	
		else	
			$filename = 'temp.xlx';
		
		if (($dbf) && ($xmlf)) {
			$line =  $dbf . ',' . $xmlf."\r\n";
			$ret = file_put_contents($this->prpath . $filename, $line , FILE_APPEND);
			//echo 'save:' . $line . '<br>';	
		}	
		
		if ($go) {
			$xlxfile = $_POST['xmlfile'] ? $_POST['xmlfile'].'.xlx' : ($_GET['xlx'] ? $_GET['xlx'] : 'temp.xlx'); 
			$xmlfile = $_POST['xmlfile'] ? $_POST['xmlfile'].'.xml' : 'temp.xml';
			//echo 'proceed:' . @file_get_contents($this->prpath . $xlxfile);
			
			$ret = $this->proceedXML(file($this->prpath . $xlxfile), /*array*/
			                         @file_get_contents($this->prpath . $xmlfile)); /*raw xml data*/
			//return ($ret);	
		}		
		
		return ($ret);
	}
	
	public function postXMLSubmit($action, $title=null, $class=null) {
		if (!$action) return;
		$submit = $title ? $title : 'Submit';
		$cl = $class ? "class=\"$class\"" : null;
		 
		$c = "<INPUT type=\"hidden\" name=\"cat\" value=\"{$this->cat}\" />";
		$c .= "<INPUT type=\"hidden\" name=\"item\" value=\"{$this->id}\" />";	
		$c .= "<INPUT type=\"hidden\" name=\"xmlload\" value=\"1\" />";  //<< keep param active to load the xml process page at .php
		
        $c .= "<INPUT type=\"submit\" name=\"submit\" value=\"" . $submit . "\" $cl />";  
        $c .= "<INPUT type=\"hidden\" name=\"FormName\" value=\"XMLCollections\" />";		   
        $c .= "<INPUT type=\"hidden\" name=\"FormAction\" value=\"" . $action . "\" $cl />";
        return ($c);   		   
	}	
	
	protected function show_select_presets($name, $taction=null, $ext=null, $class=null) {
		$xlx = $_GET['xlx'] ;
	
		$url = ($taction) ? seturl('t='.$taction.'&xlx=',null,null,null,null) : 
		                    seturl('t=cpsavexml&xlx=',null,null,null,null);
		
		if (defined('RCFS_DPC')) {
			$path = $this->prpath;
			$myext = explode(',',$ext);
			$extensions = is_array($myext) ? $myext : array(0=>".png",1=>".gif",2=>".jpg");
			
			if (is_dir($path)) {
		
				$this->fs= new rcfs($path);
				$ddir = $this->fs->read_directory($path,$extensions); 

				if (!empty($ddir)) {
		  
					sort($ddir);	 
					
					$ret .= "<select name=\"$name\" onChange=\"location=this.options[this.selectedIndex].value\" $class>"; 
					$ret .= "<option value=\"\">Select...</option>";
					
					foreach ($ddir as $id=>$fname) {
						$parts = explode(".",$fname);
						$title = $parts[0];
						$parts2 = explode(".",$xlx);
						$selectedxlx = $parts2[0];
						$selection = ($title == $selectedxlx) ? " selected" : null;
						
						$ret .= "<option value=\"". $url . $fname. "\"". $selection .">$title</option>";		
					}	
		
					$ret .= "</select>";			    
				}
			}//empty dir
	    }  
		       
	    return ($ret);		
	}	
	
	public function viewXMLPresetsSelect() {
		
		$ret = $this->show_select_presets('mypreset', null, '.xlx', null);
		return ($ret);
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
	
	public function ct($template, $tokens, $execafter=null) {
	    //if (!is_array($tokens)) return;
		$template_contents = @file_get_contents($template);
		
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