<?php

$__DPCSEC['RCCOLLECTIONS_DPC']='1;1;1;1;1;1;2;2;9';

if ( (!defined("RCCOLLECTIONS_DPC")) && (seclevel('RCCOLLECTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCOLLECTIONS_DPC",true);

$__DPC['RCCOLLECTIONS_DPC'] = 'rccollections';


$__EVENTS['RCCOLLECTIONS_DPC'][0]='cpcollections';
$__EVENTS['RCCOLLECTIONS_DPC'][1]='cpsavecol';
$__EVENTS['RCCOLLECTIONS_DPC'][2]='cpsubscribe';
$__EVENTS['RCCOLLECTIONS_DPC'][3]='cpadvsubscribe';

$__ACTIONS['RCCOLLECTIONS_DPC'][0]='cpcollections';
$__ACTIONS['RCCOLLECTIONS_DPC'][1]='cpsavecol';
$__ACTIONS['RCCOLLECTIONS_DPC'][2]='cpsubscribe';
$__ACTIONS['RCCOLLECTIONS_DPC'][3]='cpadvsubscribe';

$__LOCALE['RCCOLLECTIONS_DPC'][0]='RCCOLLECTIONS_DPC;Collection;Συλλογή';

class rccollections {
	
	var $title, $prpath, $urlpath, $url, $cat, $item;
	var $map_t, $map_f, $cseparator, $onlyincategory;
	var $listName;
	
	var $imgxval, $imgyval, $image_size_path;
	var $selected_items, $autoresize, $restype, $odd;	

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
	}
	
    function event($event=null) {
	
	   /////////////////////////////////////////////////////////////
	   if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	
	   /////////////////////////////////////////////////////////////			

       if (!$this->msg) {
  
	     switch ($event) {
		 
		    case 'cpsavecol'      : $this->savedlist = $this->saveList();				
	                                break;									
			case 'cpcollections'  :
			default               :							  
         }
      }
    }	

    function action($action=null)  { 

	     switch ($action) {
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

    public function getCurrentList() {
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
	
	protected function saveListInFile($data=null) {
		
		if ($_POST['cname']) { 
			
			$ret = @file_put_contents($this->filename, $data);
			
			return $ret;
		}
		
		return false;
	}	
	
	protected function saveList() {
		
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
	
	public function viewList() {
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
	
	public function viewCollection() {
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

	protected function getmapf($name) {
	
	  if (empty($this->map_t)) return 0;
	  
	  foreach ($this->map_t as $id=>$elm)
	    if ($elm==$name) break;
				
	  $ret = $this->map_f[$id];
	  return ($ret);
	}


    //rctedititems specs
	
	function get_selected_items($items=10,$img_width=null, $img_height=null, $id=null) {
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
			
		    //read posted data per item..
		    $out_of_list = GetParam($id) ? true : false;//remove from rendering list
			//if (GetParam($id)) continue;
		    $img_width = GetParam('imagex_'.$id) ? GetParam('imagex_'.$id) : $img_width;
		    $img_height = GetParam('imagey_'.$id) ? GetParam('imagey_'.$id) : $img_height;		
            $width = $img_width ? "width=\"$img_width\" " : null;
		    $height = $img_height ? "height=\"$img_height\" " : null;				
			
			
			$cat = $rec['cat0'] ? str_replace(' ','_',$rec['cat0']) : null;
			$cat .= $rec['cat1'] ? $this->cseparator . str_replace(' ','_',$rec['cat1']) : null;
			$cat .= $rec['cat2'] ? $this->cseparator . str_replace(' ','_',$rec['cat2']) : null;
			$cat .= $rec['cat3'] ? $this->cseparator . str_replace(' ','_',$rec['cat3']) : null;
			$cat .= $rec['cat4'] ? $this->cseparator . str_replace(' ','_',$rec['cat4']) : null;
			
			$item_url = /*'http://' .*/ $this->url . '/' . seturl('t=kshow&cat='.$cat.'&id='.$id,null,null,null,null,1);
			$item_name_url = seturl('t=kshow&cat='.$cat.'&id='.$id,$rec['itmname'],null,null,null,1);//$this->rewrite);			   
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
				$item_photo_url = /*'http://' .*/ $this->url . $this->image_size_path . '/' . $id . $this->restype;
				$item_photo_html = "<img src=\"" . $item_photo_url . "\" $width $height>";
				$item_photo_link = "<a href='$item_url'><img src=\"" . $item_photo_url . "\" $width $height></a>";
		    }

			//fetch extra html code 
            /*
			$attachment = $this->has_attachment2db($id,'.html', true);
            //replace relative path image/files with absolute path = url
            if (stristr($attachment,'src="images/'))
                $attachment = str_replace('src="images/','src="'.$this->url.'/images/');   			
		    */
			$attachment = null;
		    $order_id = 'order_'.$id;
		    $i = GetParam($order_id) ? GetParam($order_id) : $ix++;
			$ret_array[$i] = array(
			                'disabled'=>$out_of_list,
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
	
	public function create_page($template=null, $imgw=null,$imgh=null,$tmplpath=null) {
	    $imgxval = $imgw ? $imgw : $this->imgxval; 
		$imgyval = $imgh ? $imgh : $this->imgyval;	
		
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

        $this->selected_items = $this->get_selected_items(500,$imgxval,$imgyval);	
		
		if (!empty($this->selected_items)) {
			$tokens = array();
			$items = array();		
			//..order array by key
			ksort($this->selected_items);
					
			foreach ($this->selected_items as $n=>$rec) {
		
		      //is not out of rendering list
		      if ($rec['disabled']===false) {
		  
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
 
		      }//disabled item		
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

        $this->selected_items = $this->get_selected_items(500,$this->imgxval,$this->imgyval);
		   	
		//..order array by key
		ksort($this->selected_items);			
	}

	//redesign form
	function show_selected_items($submitname=null,$submitaction,$taction=null, $template=null, $xval=null, $yval=null) {
	    $submitname = localize("_reselect",getlocal());;//override
	    $xval = $xval ? $xval : $this->imgxval; 
		$yval = $yval ? $yval : $this->imgyval;
	    $myact = $taction ? $taction : 'cptedititems';
	    $myaction = seturl("t=$myact");
        $submitaction = $submitaction ? $submitaction :	'cptedititems';	
		//print_r($_POST);
		
		if (!empty($this->selected_items)) {		
			$ret = "<form method=\"post\" name=\"RCTEDITITEMS\" action=\"$myaction\">";
            
			foreach ($this->selected_items as $n=>$rec) {
			    $order = $n;//+1;
			    $id = $rec['code'];
			    //read posted data per item..
				$is_disbaled = $rec['disabled'];//is out of rendering list

				$selected = ($is_disbaled) ? 'checked':null;//remove from rendering list
			    $setxval = GetParam('imagex_'.$id) ? GetParam('imagex_'.$id) : $xval;
			    $setyval = GetParam('imagey_'.$id) ? GetParam('imagey_'.$id) : $yval;
				
				$recdata[] = "<input type=\"checkbox\" name=\"$id\" $selected>";
				$recdata[] = "<INPUT type=\"text\" name=order_$id value=\"$order\" maxlenght=\"3\" size=3>";
			    $recdata[] = "<INPUT type=\"text\" name=imagex_$id value=\"$setxval\" maxlenght=\"3\" size=3>";
			    $recdata[] = "<INPUT type=\"text\" name=imagey_$id value=\"$setyval\" maxlenght=\"3\" size=3>";
			    //$x = intval(100/count($recdata)); echo $x;
			    foreach ($rec as $i=>$recname) {
				    $recdata[] = $recname;
				    $recattr[] = "left;10%";
                }			
				$linewin = new window('',$recdata, $recattr);
				$ret .= $linewin->render("center::100%::0::group_article_selected::left::0::0::");	
				unset ($linewin);
                unset ($recdata);
                unset ($recattr); 				
	        }
			$ret .= "<hr><input type=submit value=\"$submitname\">";
	        $ret .= "<input type=\"hidden\" name=\"FormAction\" value=\"$submitaction\">"; 
			
            //save rcshsubsqueue mail params
            if ($template) 			
			    $ret .= "<input type=\"hidden\" name=\"template\" value=\"$template\">"; 
            /*if ($images=GetSessionParam('images')) 			
			    $ret .= "<input type=\"hidden\" name=\"template\" value=\"$images\">"; 				
            if ($attachments=GetSessionParam('attachments')) 			
			    $ret .= "<input type=\"hidden\" name=\"template\" value=\"$attachments\">";*/ 
				
            $ret .= "</form>";  
        }			
	    else
		    $ret = 'None';
			
	    return ($ret);		
	}
	
	public function isCollection() {
		$c = $this->savedlist;
		if ($c) {
			if (strstr($c, ',')) 
				$ret = count(explode(',', $c));
			else 
				$ret = 1;
		}
		else
			$ret = 0;
		
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