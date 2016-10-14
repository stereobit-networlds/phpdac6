<?php
$__DPCSEC['CMSRT_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CMSRT_DPC")) && (seclevel('CMSRT_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CMSRT_DPC",true);

$__DPC['CMSRT_DPC'] = 'cmsrt';

$a = GetGlobal('controller')->require_dpc('cms/cms.dpc.php');
require_once($a);

class cmsrt extends cms  {
	
	var $map_t, $map_f, $cseparator, $onlyincategory;
	var $imgxval, $imgyval, $image_size_path;
	var $autoresize, $restype, $replacepolicy;	
	var $items, $csvitems;
	
	function __construct() {
	
		cms::__construct();
	  
		$this->owner = GetSessionParam('LoginName');	
		
		$this->map_t = remote_arrayload('RCITEMS','maptitle',$this->prpath);	
		$this->map_f = remote_arrayload('RCITEMS','mapfields',$this->prpath);		
		
		$csep = remote_paramload('RCITEMS','csep',$this->prpath); 
		$this->cseparator = $csep ? $csep : '^';	
		$this->onlyincategory = remote_paramload('SHKATALOGMEDIA','onlyincategory',$this->prpath);
		$this->replacepolicy = remote_paramload('SHKATEGORIES','replacechar',$this->prpath);		
		
		$this->autoresize = remote_arrayload('RCITEMS','autoresize',$this->prpath);
		$this->restype = remote_paramload('RCITEMS','restype',$this->prpath);
		$image_def_xsize = remote_paramload('RCEDITITEMS','imgdefsizex',$this->prpath);		
        $image_def_ysize = remote_paramload('RCEDITITEMS','imgdefsizey',$this->prpath);				
		$this->imgxval = $image_def_xsize ? $image_def_xsize : ((!empty($this->autoresize)) ? $this->autoresize[0] : 0);//90;//as it is
		$this->imgyval = $image_def_ysize ? $image_def_ysize : 0;//90; //as it is	
		
		$this->photodb = remote_paramload('RCITEMS','photodb',$this->prpath);
		
		$ip = remote_paramload('RCCOLLECTIONS','imagepath',$this->prpath);
		$ipath = $ip ? $ip : '/images/';
		$ia = remote_paramload('RCCOLLECTIONS','imageabs',$this->prpath);
		if (!$ia) {
			$pt = remote_paramload('RCITEMS','phototype',$this->prpath);	
			$csize = null;//remote_paramload('RCCOLLECTIONS','itemphotosize',$this->prpath);
			$phototype = $csize ? $csize : ( $pt ? $pt : 0); 		
			switch ($phototype) {
				case 3  : $this->image_size_path = $ipath . remote_paramload('RCITEMS','photobgpath',$this->prpath); $this->sizeDB = 'LARGE'; break;
				case 2  : $this->image_size_path = $ipath . remote_paramload('RCITEMS','photomdpath',$this->prpath); $this->sizeDB = 'MEDIUM'; break;
				case 1  : $this->image_size_path = $ipath . remote_paramload('RCITEMS','photosmpath',$this->prpath); $this->sizeDB = 'SMALL'; break;
				case 0  :
				default : $this->image_size_path = $ipath . remote_paramload('RCITEMS','photobgpath',$this->prpath); $this->sizeDB = 'LARGE';
			}
        }
		else
			$this->image_size_path = $ipath; //absolute path
		
		$this->items = null;
		$this->csvitems = null;			
	}
	
	public function renderTemplate($id=null, $items=null, $fsave=null) {
		$db = GetGlobal('db');		
		if (!$id) return null;
	
		$sSQL = "select id,name,descr,data,code,script,objects from cmstemplates where ";
		$sSQL.= is_numeric($id) ? "id=" . $id : "name=$id";
		//echo $sSQL;
		$res = $db->Execute($sSQL);			
		$form = base64_decode($res->fields['data']);		
		$code = base64_decode($res->fields['code']);
		$script = base64_decode($res->fields['script']);
		$objects = $items ? $items : $res->fields['objects'];
		$template = $res->fields['name'];
		$descr = $res->fields['descr'];
		
		if (strstr($code, '>|')) { //pattern code
			$ret = $this->renderPattern($template, $form, $code, $script, $objects, $fsave);
		}
		else 
		    $ret = $this->renderTwing($template, $form, $code, $script, $objects, $fsave);	
	
		return ($ret);
		
	}

	protected function renderPattern($template, $form=null, $code=null, $script=null, $items=null, $fsave=null) {
		$db = GetGlobal('db');	
		if (!$template) return false;
		
		$this->items = $this->get_items($items);
		//print_r($this->items);
		
		if (strstr($code, '>|')) {
		//if ($code)  {
			$pf = explode('>|',$code);
			
			//search last edited line
			foreach ($pf as $line) {
				if (trim($line)) {
					$joins = explode(',', array_pop($pf)); 
					break;
				}
			}
			
			//rest lines
			foreach ($pf as $line) 
				$subtemplates .= trim($line);

			$_pattern[0] = explode(',', $subtemplates);
			$_pattern[1] = (array) $joins;			

			//render pattern
			if ((!empty($this->items)) && (!empty($_pattern[1]))) {
				$pattern = (array) $_pattern[0];
				$join = (array) $_pattern[1];				

				//render
				$out = null;
				$tts = array();
				$gr = array();
				$itms = array();
				$cc = array_chunk($this->items, count($pattern));//, true);

				foreach ($cc as $i=>$group) {
					foreach ($group as $j=>$child) {
						//echo $pattern[$j] . '<br>';
						$tts[] = $this->ct($pattern[$j], serialize($child), true);
						if ($cmd = trim($join[$j])) {
							//echo $join[$j] . '<br>';
							switch ($cmd) {
							    case '_break' : $out .= implode('', $tts); break;
								default       : $out .= $this->ct($cmd, serialize($tts), true);		
							} 
							unset($tts);
						}
					}
					$gr[] = (empty($tts)) ? $out : $out . implode('', $tts) ;
					unset($tts);
					$out = null;
				}
			}//has pattern data
		}//has pattern
		
		$sSQL = "select data,class from cmstemplates where name=" . $db->qstr($template.'-sub');
		$res = $db->Execute($sSQL);
		//echo $sSQL;	
		if (isset($res->fields['data'])) {			
			$itms[] = (!empty($gr)) ? implode('',$gr) : null; 
			if (!empty($itms))			
				$ret = $this->combine_tokens(base64_decode($res->fields['data']), serialize($itms), true);
		}	
		else
			$ret = (!empty($gr)) ? implode('',$gr) : null;
		
		//echo $template.'-sub:' . $ret;				
		$data = ($ret) ? str_replace('<!--?'.$template.'-sub'.'?-->', $ret, $form) : $form;
		
		if ($script) {
			//create dynamic phpdac page		
			if ($fsave) {
				//save template file with pattern data
				$saved = @file_put_contents($this->urlpath .'/cp/'.$this->tpath."/".$res->fields['class'].'/pages/'.$fsave, 
				   		  preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $data));
						  
				$page = $script; //script data		  
			}	
			else
				$page = $data; //generated data		
		}
		else {
			//create static page
			$page = $data; //generated data
		}
		
		if ($fsave) {
			$ret = @file_put_contents($this->urlpath . '/' . $fsave, 
			        preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $page));
			return $ret;
		}	
		else
			return $page;			
	}

	protected function getcsvItems($items=null) {
		if (!is_array($items)) return false;

		//csv array of fields
		foreach ($items as $i=>$rec) {
			$ritems[] = implode(';', $rec);
		}	
			
		return $ritems; 	
	}	

	protected function renderTwing($template, $form=null, $code=null, $script=null, $items=null, $fsave=null) {
		$db = GetGlobal('db');	
		if (!$template) return false;		
		
		if (defined('TWIGENGINE_DPC')) {
				
			//save db form into temp file
			$tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->prpath);
			$tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->prpath);
			$twigpath = $this->prpath . $tmpl_path .'/'. $tmpl_name .'/';	
			$tempfile = 'crmform-cache-' . urlencode(base64_encode($template)) . '.html';

			if (@file_put_contents($twigpath . $tempfile, $form)) {
				
				//csvitems var
				$this->csvitems = $this->getcsvitems($this->get_items($items));

				$t = array('mydate'=>date('m.d.y'));
							
				$tokens = serialize($t);
				$ret = GetGlobal('controller')->calldpc_method('twigengine.render use '.$tempfile.'++'.$tokens);
			}
			else
				$ret = 'twig cache error!';
		}
		else 
			$ret = $form;

		if ($script) {
			//create dynamic phpdac page
			$page = $data;
		}
		else {
			//create static page
			$page = $data;
		}
		
		if ($fsave) {
			$ret = @file_put_contents($this->urlpath . '/' . $fsave, 
			        preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $page));
			return $ret;
		}	
		else
			return $page;		
		
		return ($ret);
	}
	
	
	protected function _get_items($preset=null, $limit=null) {
        $db = GetGlobal('db');		
	    $lan = $lang ? $lang : getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';	
        $codefield = $this->getmapf('code');
		$lastprice = $this->getmapf('lastprice');
		$tid = GetReq('id') ? GetReq('id') : $preset; //$preset ? $preset : GetReq('id');	
		
        $sSQL = "select id,datein,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4,".
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,".
				"volume,dimensions,size,color,manufacturer,xml,orderid,YEAR(sysins) as year,MONTH(sysins) as month,DAY(sysins) as day, DATE_FORMAT(sysins, '%h:%i') as time, DATE_FORMAT(sysins, '%b') as monthname," . 
				$this->getmapf('code') . " from products WHERE ";
	
		if (isset($tid)) {
			if (strstr($tid, '.')) { //tree id
				$treeSQL = "select code from ctreemap WHERE tid=" . $db->qstr($tid);	
				$sSQL .=  ' id in (' . $treeSQL . ')';	
			} 
			else
				$sSQL .=  (strstr($tid, ',')) ?  ' id in (' . $tid . ')' : 'id='.$tid;		
		}	
        else
			return null;
		
	    //$sSQL .= " and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY " . "FIELD(id,".  $tid .")"; //$codefield; //orderid
        $sSQL .= $limit ? " limit " . $limit : null;		
		
		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		if (empty($resultset)) return null;
		
		$ix =1;
		foreach ($resultset as $n=>$rec) {
		
		    $id = $rec[$codefield];
			
			$cat = $rec['cat0'] ? $this->replace_spchars($rec['cat0']) : null; 
			$cat .= $rec['cat1'] ? $this->cseparator . $this->replace_spchars($rec['cat1']) : null;
			$cat .= $rec['cat2'] ? $this->cseparator . $this->replace_spchars($rec['cat2']) : null;
			$cat .= $rec['cat3'] ? $this->cseparator . $this->replace_spchars($rec['cat3']) : null;
			$cat .= $rec['cat4'] ? $this->cseparator . $this->replace_spchars($rec['cat4']) : null;
			
			$item_url = $this->url . '/' . seturl('t=kshow&cat='.$cat.'&id='.$id,null,null,null,null,1);
			$item_name_url = seturl('t=kshow&cat='.$cat.'&id='.$id,$rec['itmname'],null,null,null,1);			   
		    $item_name_url_base = "<a href='$item_url'>".$rec['itmname']."</a>";
			
			$imgfile = $this->urlpath . $this->image_size_path . '/' . $id . $this->restype;

			if (file_exists($imgfile)) 	 
				$item_photo_url = $this->url . $this->image_size_path . '/' . $id . $this->restype;
			else 
				$item_photo_url = $this->url .'/'. $this->photodb . '?id='.$id.'&stype='.$this->sizeDB;

			$item_photo_html = "<img src=\"" . $item_photo_url . "\">";
			$item_photo_link = "<a href='$item_url'><img src=\"" . $item_photo_url . "\"></a>";			

			$attachment = null;
			$i = $ix++;
			$ret_array[$i] = array(
			                0=>$id,
			                1=>$rec[$itmname],
							2=>$rec[$itmdescr],
							3=>$rec['itmremark'],
							4=>$rec['uniname1'],
							5=> number_format(floatval($rec['price0']),2,',','.'),
							6=> number_format(floatval($rec['price1']),2,',','.'), 
							7=>$rec['cat0'],
							8=>$rec['cat1'],
							9=>$rec['cat2'],
							10=>$rec['cat3'],
							11=>$rec['cat4'],
							12=>$item_url,
							13=>$item_name_url_base,
							14=>$item_photo_url,
							15=>$item_photo_html,
							16=>$item_photo_link,
							17=>$rec[$codefield],
							18=>$rec[$lastprice],
							19=>$rec['ypoloipo1'],
							20=>$rec['resources'],
							21=>$rec['weight'],
							22=>$rec['volume'],
							23=>$rec['dimensions'],
							24=>$rec['size'],
							25=>$rec['color'],
			                26=>$rec['manufacturer'],
							27=>$rec['year'],			
							28=>$rec['month'],
							29=>$rec['day'],
							30=>$rec['time'],
							31=>localize($rec['monthname'], $lan),
							);							
		}
		
		return ($ret_array);
	}		
	
	public function get_items($preset=null, $asis=false) {
		
		$ret = $this->_get_items($preset, $asis);
		return ($ret);
	}		

	
	public function get_attachment($itmcode=null,$type=null,$nolan=null) {
		$db = GetGlobal('db');	
		$lan = getlocal(); 
		$slan = ($nolan) ? null : ($lan ? $lan : '0');	  
	  		  
		$sSQL = "select data,type from pattachments ";
		$sSQL .= " WHERE code='" . $itmcode . "'";
		if (isset($type))
			$sSQL .= " and type='". $type ."'";
		if (isset($slan))
			$sSQL .= " and lan=" . $slan;	
		//echo $sSQL;
	  
		$result = $db->Execute($sSQL);	
	  
		return ($result->fields[0]);
	}	
	
    //combine tokens with load tmpl data inside	
	public function ct($template, $toks, $execafter=null) {
		$db = GetGlobal('db');
		$tokens = (array) unserialize($toks); //array(0=>'a',1=>'test'); 	
		//print_r($tokens);
        //return;
		//sub template data into html/body text
		$sSQL = "select data from cmstemplates where name=" . $db->qstr($template);
		$res = $db->Execute($sSQL);				
		$template_contents = base64_decode($res->fields['data']);		
	    if (!is_array($tokens)) return ($template_contents);			
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template_contents; 
		 		 
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<40;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);	
		
		//execute after replace tokens
		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $retout = $fp->process_commands($ret);
		  unset ($fp);
          
		  return ($retout);
		}		
		
		return ($ret);
	}

	//tokens method	
	public function combine_tokens($template, $toks, $execafter=null) {
		$tokens = (array) unserialize($toks);
	    if (!is_array($tokens)) return ($template);		

		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template;
		  
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
            //echo $tok,'<br>';
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<40;$x++)
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
	
	public function select_template($tfile=null, $iscp=false) {
		if (!$tfile) return;
	  
		$template = $tfile . '.htm';	
		$cpt = $this->prpath . $this->tpath .'/'. $this->cptemplate .'/'. str_replace('.',getlocal().'.',$template) ;   
		$fpt = $this->prpath . $this->tpath .'/'. $this->template .'/'. str_replace('.',getlocal().'.',$template) ;
		$t = $iscp ? $cpt : $fpt;

		if (is_readable($t)) 
			$mytemplate = file_get_contents($t);

		return ($mytemplate);	 
    }	

	public function createButton($name=null, $urls=null, $t=null, $s=null) {
		$type = $t ? $t : 'primary'; //danger /warning / info /success
		switch ($s) {
			case 'large' : $size = 'btn-large '; break;
			case 'small' : $size = 'btn-small '; break;
			case 'mini'  : $size = 'btn-mini '; break;
			default      : $size = null;
		}
		$u = unserialize($urls);
		if (!empty($u)) {
			foreach ($u as $n=>$url)
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
	
	public function encode_image_id($id=null, $encode=null) {
	    if (!$id) return null;
		$out = $encode ? md5($id) : $id;
        return $out;
	}		
	
	public function getmapf($name) {
	
	  if (empty($this->map_t)) return 0;
	  
	  foreach ($this->map_t as $id=>$elm)
	    if ($elm==$name) break;
				
	  $ret = $this->map_f[$id];
	  return ($ret);
	}	
	
	public function getItemCode($id=null) {
		$db = GetGlobal('db');		
		if (!$id) return null;			
		
		$code = $this->getmapf("code");
		$objSQL = "select $code from products WHERE id=" . $id;
		
		$oret = $db->Execute($objSQL);
		return ($oret->fields[0]);			
	}	

	public function nformat($n, $dec=0) {
		return (number_format($n,$dec,',','.'));
	}		

	public function replace_spchars($string, $reverse=false) {
		
		switch ($this->replacepolicy) {	
	
			case '_' : $ret = $reverse ?  str_replace('_',' ',$string) : str_replace(' ','_',$string); break;
			case '-' : $ret = $reverse ?  str_replace('-',' ',$string) : str_replace(' ','-',$string);break;
			default  :	
			if ($reverse) {
				$g1 = array("'",',','"','+','/',' ',' & ');
				$g2 = array('_','~',"*","plus",":",'-',' n ');		  
				$ret = str_replace($g2,$g1,$string);
			}	 
			else {
				$g1 = array("'",',','"','+','/',' ','-&-');
				$g2 = array('_','~',"*","plus",":",'-','-n-');		  
				$ret = str_replace($g1,$g2,$string);
			}	
	    }
		return ($ret);
	}	
	
};

function _v($v=null) {
	return $v ? GetGlobal('controller')->calldpc_var($v) : null;
}

function _m($m=null) {
	return $m ? GetGlobal('controller')->calldpc_method($m) : null;
}

}
?>