<?php
$__DPCSEC['CMSRT_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CMSRT_DPC")) && (seclevel('CMSRT_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CMSRT_DPC",true);

$__DPC['CMSRT_DPC'] = 'cmsrt';

$__EVENTS['CMSRT_DPC'][0]='shlangs';
$__EVENTS['CMSRT_DPC'][1]='lang';
$__EVENTS['CMSRT_DPC'][2]='setlanguage';
//$__EVENTS['CMSRT_DPC'][3]='index';
//$__EVENTS['CMSRT_DPC'][3]='katalog';
//$__EVENTS['CMSRT_DPC'][4]='klist';
//$__EVENTS['CMSRT_DPC'][5]='kshow';

$__ACTIONS['CMSRT_DPC'][0]='shlangs';
$__ACTIONS['CMSRT_DPC'][1]='lang';
$__ACTIONS['CMSRT_DPC'][2]='setlanguage';
//$__ACTIONS['CMSRT_DPC'][3]='index';
$__ACTIONS['CMSRT_DPC'][3]='katalog';
$__ACTIONS['CMSRT_DPC'][4]='klist';
$__ACTIONS['CMSRT_DPC'][5]='kshow';

$__DPCATTR['CMSRT_DPC']['shlangs'] = 'shlangs,1,0,0,0,0,0,0,0,0,0,0,1';
$__DPCATTR['CMSRT_DPC']['lang'] = 'lang,0,0,0,0,0,0,0,0,0,0,1';
$__DPCATTR['CMSRT_DPC']['setlanguage'] = 'setlanguage,0,0,0,0,0,0,0,0,0,0,0';

$__LOCALE['CMSRT_DPC'][0]='SHLANGS_DPC;Languanges;Γλώσσα';

$a = GetGlobal('controller')->require_dpc('cms/cms.dpc.php');
require_once($a);

class cmsrt extends cms  {
	
	var $map_t, $map_f, $cseparator, $onlyincategory;
	var $imgxval, $imgyval, $image_size_path;
	var $autoresize, $restype, $replacepolicy;	
	var $items, $csvitems;
	
	var $lan_set, $selected_lan, $message;
	var $selectSQL, $codef, $lastprice, $pager;	
	var $lan, $itmname, $itmdescr, $itmeter;
	var $picbg, $picmd, $picsm, $home, $cat_result;
	var $ogTags, $twigTags, $siteTitle, $siteTwiter, $siteFb, $httpurl;	
	
	public function __construct() {
	
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
		
		$ip = remote_paramload('RCCOLLECTIONS','imagepath',$this->prpath); //???
		$ipath = $ip ? $ip : '/images/';
		
		$this->picbg = $ipath . remote_paramload('RCITEMS','photobgpath',$this->prpath);
		$this->picmd = $ipath . remote_paramload('RCITEMS','photomdpath',$this->prpath);
		$this->picsm = $ipath . remote_paramload('RCITEMS','photosmpath',$this->prpath);
		
		$ia = remote_paramload('RCCOLLECTIONS','imageabs',$this->prpath); //???
		if (!$ia) {
			$pt = remote_paramload('RCITEMS','phototype',$this->prpath);	
			$csize = null;//remote_paramload('RCCOLLECTIONS','itemphotosize',$this->prpath);
			$phototype = $csize ? $csize : ( $pt ? $pt : 0); 		
			switch ($phototype) {
				case 3  : $this->image_size_path = $this->picbg; $this->sizeDB = 'LARGE'; break;
				case 2  : $this->image_size_path = $this->picbg; $this->sizeDB = 'MEDIUM'; break;
				case 1  : $this->image_size_path = $this->picbg; $this->sizeDB = 'SMALL'; break;
				case 0  :
				default : $this->image_size_path = $this->picbg; $this->sizeDB = 'LARGE';
			}
        }
		else
			$this->image_size_path = $ipath; //absolute path
		
		$this->items = null;
		$this->csvitems = null;	

		$this->lan_set = arrayload('SHELL','languages');
		$this->message = remote_paramload('SHLANGS','message',$this->path);	

		$this->javascript();
		
		$this->httpurl = paramload('SHELL','urlbase');  		
		$this->home = localize(paramload('SHELL','rootalias'),getlocal());
		$this->cat_result = null;
		
		$this->siteTitle = remote_paramload('SHELL','urltitle',$this->path);	
		$this->siteTwitter = remote_paramload('INDEX','twitter', $this->path);	  
		$this->siteFb = remote_paramload('INDEX','facebook', $this->path);
		$this->ogTags = null;	  
		$this->twitTags = null;		
		
		$this->itmeter = 0;
		$this->lan = getlocal() ? getlocal() : '0';
		$this->itmname = $this->lan ? 'itmname' : 'itmfname';
		$this->itmdescr = $this->lan ? 'itmdescr' : 'itmfdescr';			
		$this->pager = GetReq('pager') ? GetReq('pager') : (GetSessionParam('pager') ? GetSessionParam('pager') : remote_paramload('SHKATALOG','pager',$this->prpath));		
		$this->fcode = $this->getmapf('code');
		$this->lastprice = $this->getmapf('lastprice') ? ','.$this->getmapf('lastprice') : ',xml';		
		$this->selectSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .
							"price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
							$this->fcode. $this->lastprice . ",weight,volume,dimensions,size,color,manufacturer,orderid,YEAR(sysins) as year,MONTH(sysins) as month,DAY(sysins) as day, DATE_FORMAT(sysins, '%h:%i') as time, DATE_FORMAT(sysins, '%b') as monthname" .
							" from products ";			
	}
	
	public function event($event=null) {
	    $param1 = GetGlobal('param1');	

		$this->refresh_page_js();
		
		//$this->get_data_info(); //????
		
		switch ($event) {
			case "lang"  		: $this->selected_lan = GetParam("langsel"); break;
			case "setlanguage"  : $this->selected_lan = $param1; break;
			
			//case 'kshow'        : if (defined('SHKATALOGMEDIA_DPC')) break; else $this->read_item(); break;
			//case 'klist'        : if (defined('SHKATALOGMEDIA_DPC')) break; else $this->read_list(); break;
			case "index"        : 
			default 			: //$this->read_list();
		}
	}
	
	public function action($action=null) { 
		switch ($action) {
			case "lang"         : setlocal($this->selected_lan);
		                          $out = $this->lan_set[$this->selected_lan]; 
								  break;
			case "setlanguage"  : //echo "Current language:",$this->lan_set[$this->selected_lan],"\n";  						
			
			case 'kshow'        : if (defined('SHKATALOGMEDIA_DPC')) break; else $this->read_item();
			                      $out = (defined('SHKATALOGMEDIA_DPC')) ? null : $this->show_item(); break;
			case 'klist'        : if (defined('SHKATALOGMEDIA_DPC')) break; else $this->read_list(); 
			                      $out = (defined('SHKATALOGMEDIA_DPC')) ? null : $this->list_katalog(0,'klist','fpkatalog',null,null,3); break;			
			case "index"        : 			
			default 		 	: //$out .= $this->list_katalog(0); //call by home page (frontpage func)
		}
		
		return ($out);
	}
	
	//overrite
	protected function javascript() {
        if (iniload('JAVASCRIPT')) {
           	$code = $this->createcookie_js();				
			$code.= $this->javascript_ajax();

		    $js = new jscript;
            $js->load_js($code,"",1);			   
		    unset ($js);		
     	}	  
	}		

    protected function refresh_page_js() {
   
		if (iniload('JAVASCRIPT')) {
			$code = $this->js_refresh();
	   
			$js = new jscript;
			$js->load_js($code,"",1);			   
			unset ($js);
		}   
    } 	
	
    //refresh to set lang
    function js_refresh() {
   
		$ret = " 
function neu() {top.frames.location.href = \"index.php\";} 
function goBack() { window.history.back() } 
goBack();
";	 
		return ($ret);
    }	
	
	
	protected function read_list() {
        $db = GetGlobal('db');	
		$page = GetReq('page') ? GetReq('page') : 0;
		$cat = GetReq('cat');	
		$oper = '='; 			
				     
		$cat_tree = explode($this->sep(), $cat); 
			
	    $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";		   
		
		if (($cat!=null) && (!is_numeric($cat))) {	//numeric check, when no cat but page - fix !!!!
			if ($cat_tree[0])
				$whereClause .= ' cat0'.$oper . $db->qstr($this->replace_spchars($cat_tree[0],1));		
			elseif ($this->onlyincategory)
				$whereClause .= ' (cat0 IS NULL OR cat0=\'\') ';				  
			if ($cat_tree[1])	
				$whereClause .= ' and cat1'.$oper . $db->qstr($this->replace_spchars($cat_tree[1],1));	
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat1 IS NULL OR cat1=\'\') ';	 
			if ($cat_tree[2])	
				$whereClause .= ' and cat2'.$oper . $db->qstr($this->replace_spchars($cat_tree[2],1));	
			elseif ($this->onlyincategory)
			 	$whereClause .= ' and (cat2 IS NULL OR cat2=\'\') ';		   
			if ($cat_tree[3])	
				$whereClause .= ' and cat3'.$oper . $db->qstr($this->replace_spchars($cat_tree[3],1));
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat3 IS NULL OR cat3=\'\') ';
		   		
		    	
		}	
		$sSQL .= $whereClause ? $whereClause . ' and ' : null;
		$sSQL .= " itmactive>0 and active>0";	
		$sSQL .= $this->orderSQL();
		  
		if ($this->pager) {
		    $p = $page * $this->pager;
		    $sSQL .= " LIMIT $p,".$this->pager; //page element count
		}
		//echo $sSQL;	
	    $this->result = $db->Execute($sSQL,2);
 	    $this->max_items = $db->Affected_Rows();//count($this->result);
	      
	    if ($this->max_items==1) {
			return ($this->result->fields[$this->fcode]); //to view the item without click on dir
		}
		else { 
	        //$this->max_selection = $this->get_max_result();			
			return (null);
		}		
	}		
	
	protected function list_katalog($imageclick=null,$cmd=null,$template=null,$no_additional_info=null,$external_read=null,$photosize=null,$resources=null,$nopager=null,$nolinemax=null,$originfunction=null) {
	    $cmd = $cmd ? $cmd : 'klist';
	    $pz = $photosize ? $photosize : 1;		   
	    $xdist = $this->imagex ? $this->imagex:100;
	    $ydist = $this->imagey ? $this->imagey:null;	
        $cat = GetReq('cat');   
	    $page = GetReq('page') ? GetReq('page') : 0;
	    $ogImage = array();

	    $mylinemax = ($nolinemax) ? null : $this->linemax;   
	    $myimageclick = ($this->imageclick>0) ? 1 : $imageclick;
  
        $t = $template ? $template : 'fpkatalog';
	    $mytemplate = $this->select_template($t);			      
	   	
	    if (!empty($this->result)) {		   

			//$pp = $this->read_policy();

			$item_code = $this->fcode;			
	
			foreach ($this->result as $n=>$rec) {
	   
				$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
				$ucat = $cat;
		        /*
				if ($rec[$pp]>0)  
					$price = $this->spt($rec[$pp]); 
				else*/ 	 
					$price = 0;//$this->zeroprice_msg;		
		 
				/*if (defined("SHCART_DPC")) {
					$cart_code  = $rec[$this->fcode];
					$cart_title = $this->replace_cartchars($rec[$this->itmname]);
					$cart_group = $cat;
					$cart_page  = $page;
					$cart_descr = $this->replace_cartchars($rec[$this->itmdescr]);
					$cart_photo = $rec[$this->fcode];//$this->get_photo_url($rec[$this->fcode],$pz);
					$cart_price = $price;
					$cart_qty   = 1;//???				 
					$cart = _m("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;+$cat+$cart_page",1);//'cart';
					$array_cart = null;//$this->read_array_policy($rec[$item_code],$price,"$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty");	   
					$in_cart = _m("shcart.getCartItemQty use ".$rec[$item_code]);
				}	
				else*/
					$cart = null;  			 
		   
				$availability = null; //$this->show_availability($rec['ypoloipo1']);	
				$details = null;
				$detailink = null;
				$itemlink = seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],null,null,null,null,true);
				$itemlinkname = seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],$rec[$this->itmname],null,null,null,true);		   
		   		   
		  											 
				$tokens[] = $itemlinkname;
				$tokens[] = $rec[$this->itmdescr];
				$tokens[] = $this->list_photo($rec[$item_code],$xdist,$ydist,$myimageclick,$ucat,$pz,null,$rec[$this->itmname]);
				$units = $rec['uniname2'] ? localize($rec['uniname1'],$this->lan) .'/'. localize($rec['uniname2'],$this->lan) :
											localize($rec['uniname1'],$this->lan);  
				$tokens[] = $units;		  
			  
				$tokens[] = $rec['itmremark'];
				$tokens[] = number_format(floatval($price),$this->decimals,',','.');
				$tokens[] = $cart;
				$tokens[] = $availability;
				$tokens[] = $details;
				$tokens[] = $detailink;
				$tokens[] = $rec[$item_code];
				$tokens[] = $itemlink;	
			  
				$tokens[] = $in_cart  ? $in_cart : '0';
				$tokens[] = $array_cart;

				$tokens[] = $this->get_photo_url($rec[$item_code],$pz);	
				$tokens[] = $rec[$this->getmapf('lastprice')];	
				$tokens[] = $rec[$this->itmname]; 
			  
                $tokens[] = null;   

				$tokens[] = null;//$this->item_has_discount($rec[$item_code]);
				$tokens[] = "addcart/$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty/$cat/$cart_page/";				  
		      
				/*date time */
				$tokens[] = $rec['year'];
				$tokens[] = $rec['month'];
				$tokens[] = $rec['day'];
				$tokens[] = $rec['time'];
				$tokens[] = $rec['monthname'];
				
                //print_r($tokens);
				$items[] = $this->combine_tokens($mytemplate, serialize($tokens), true);

				$ogimage[] = $this->get_photo_url($rec[$item_code],2);
				unset($tokens);			  	 				   	   	   	
			}//foreach 
		  

       	    $ret = implode('', $items);
	        //$ret.= $this->show_paging($cmd,$mytemplate,$nopager);

			$this->ogTags = $this->openGraphTags(array(0=>$this->siteTitle,
		                                           1=>$this->getcurrentkategory(), /*_m('shkategories.getcurrentkategory')*/
												   2=>str_replace($this->sep(),' ',$this->replace_spchars($cat,1)),														
												   3=>$this->httpurl .'/klist/'. $cat . '/',
												   4=>$ogimage, /*$ogimage array of images (with no httpurl)!!*/
												  ));			

            $this->itmeter = $n+1; 	//echo $this->itmeter;
	    }//empty result

	    return ($ret);	
	}		
	
	public function frontpage() {
		$this->read_list();
		return $this->list_katalog(0,'klist','fpkatalog',null,null,3);
	}
	
	public function nextpage() {
		$cat = GetReq('cat') ? GetReq('cat') : '0'; //dummy numeric		
		$page = ($this->itmeter < $this->pager) ? intval(GetReq('page')) : + intval(GetReq('page')) + 1;
		$next = seturl('t=klist&cat='.$cat.'&page='.$page,null,null,null,null,true);
		return ($next);
	}
	
	public function prevpage() {
		$cat = GetReq('cat') ? GetReq('cat') : '0'; //dummy numeric	
		$page = (GetReq('page')>0) ? intval(GetReq('page')) - 1 : 0;
		$prev = seturl('t=klist&cat='.$cat.'&page='.$page,null,null,null,null,true);
		return ($prev);
	}	
	
	public function isLastPage() {
		return ($this->itmeter < $this->pager) ? true : false;
	}
	
	protected function orderSQL() {
		$page = GetReq('page') ? GetReq('page') : 0;
		
		$sSQL = " ORDER BY id desc";	
		/*if ($this->pager) {
		    $p = $page * $this->pager;
		    $sSQL .= " LIMIT $p,". $this->pager; 
		}	*/	
		return ($sSQL);
	}
	
	protected function read_item($direction=null,$item_id=null) {
        $db = GetGlobal('db');	
		$item = $item_id ? $item_id : GetReq('id');
		$cat = GetReq('cat');				  	
		
	    $sSQL = $this->selectSQL;	
		$sSQL .= " WHERE ". $this->fcode . "=" . $db->qstr($item);	   
	    $sSQL .= " LIMIT 1";
	   
	    $resultset = $db->Execute($sSQL,2);
	    $this->result = $resultset; 	   
	   
	    return (null);//$resultset);   
	}		
	
	protected function show_item($template=null,$no_additional_info=null,$lang=null,$lnktype=1,$pcat=null,$boff=null,$tax=null) {
	    $cat = $pcat ? $pcat : GetReq('cat'); 	
        $page = GetReq('page') ? GetReq('page') : 0;		
	    $id = GetReq('id');
	    $ogimage = array();
	   
	    $mytemplate = $this->select_template('fpitem');	 
	   
	    if (count($this->result->fields)>1) {	
	   
			//$pp = $this->read_policy();	   
			$item_code = $this->fcode;
	   
			foreach ($this->result as $n=>$rec) {
						 
				$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
				/*
				if ($rec[$pp]>0) 
					$price = $this->spt($rec[$pp],$tax);
				else 	 
					$price = $this->zeroprice_msg;	
				*/
				$price = 0;
				$cart_code = $rec[$item_code];
				$cart_title = $this->replace_cartchars($rec[$this->itmname]);
				$cart_group = $cat;
				$cart_page = GetReq('page') ? GetReq('page') : 0;
				$cart_descr = $this->replace_cartchars($rec[$this->itmdescr]);
				$cart_photo = $rec[$item_code];
				$cart_price = $price;
				$cart_qty = 1;
				
				/*if (defined("SHCART_DPC")) {
					$in_cart = _m("shcart.getCartItemQty use ".$rec[$item_code]); 
					$icon_cart = _m("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;+$cat+$cart_page",1);//'cart';
					$array_cart = null;//$this->read_array_policy($rec[$item_code],$price,"$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty");	   
				
					$units = $rec['uniname2'] ? localize($rec['uniname1'],$lan).'/'.localize($rec['uniname2'],$lan):
												localize($rec['uniname1'],$lan); 
					$lastprice = $this->getmapf('lastprice');											
				}	
				else*/
					$icon_cart = null;	
			
				$itemlink = seturl('t=kshow&cat='.$cat.'&page='.$page.'&id='.$rec[$item_code],null,null,null,null,true); 
				$availability = null;//$this->show_availability($rec['ypoloipo1']);	 
				$detailink = seturl("t=kshow&cat=$cat&page=$page&id=".$rec[$item_code],null,null,null,null,true).'#details';		   
			 
				$linkphoto = $this->list_photo($rec[$item_code],null,null,$lnktype,$cat,2,3,$rec[$this->itmname]);	

				$ahtml = $this->get_attachment($rec[$item_code]) ;//show_aditional_html_files($rec[$item_code]);			 
				$atext = "";				 		 		   			  
				$afile = "";			 
				$details = "";//$ahtml . $atext . $afile;
		 		   
				//// tokens method												 
				$tokens[] = $rec[$this->itmname];
				$tokens[] = $rec[$this->itmdescr];
				$tokens[] = $linkphoto; 
				$tokens[] = $units;		 
				$tokens[] = $rec['itmremark'];
				$tokens[] = number_format(floatval($price),$this->decimals,',','.');
				$tokens[] = $icon_cart; //6
				$tokens[] = $availability;
				$tokens[] = $detailink;
				$tokens[] = $details;
				$tokens[] = $rec[$item_code];
				$tokens[] = $in_cart ? $in_cart : '0';
				$tokens[] = $array_cart;
				$tokens[] = $ahtml;
				$tokens[] = $atext;  			 
				$tokens[] = $afile;
			 
				$tokens[] = $rec[$lastprice];	
				$tokens[] = $this->get_photo_url($rec[$item_code],1);
				$tokens[] = $this->get_photo_url($rec[$item_code],2);			 
				$tokens[] = $this->get_photo_url($rec[$item_code],3);			 
			 
				$tokens[] = $rec['weight'];
				$tokens[] = $rec['volume'];
				$tokens[] = $rec['dimensions'];
				$tokens[] = $rec['size'];
				$tokens[] = $rec['color'];	
			 
				$tokens[] = null;//$this->get_xml_links();
				$tokens[] = null;//$this->item_has_discount($rec[$item_code]);
				$tokens[] = "addcart/$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty/$cat/$cart_page/";			 
			 
				$tokens[] = $rec['code1'];
				$tokens[] = $rec['code4'];
				$tokens[] = $rec['resources']; //id=30
				$tokens[] = $rec['ypoloipo1'];
				$tokens[] = $rec['manufacturer'];	
			 
				/*date time */
				$tokens[] = $rec['year'];
				$tokens[] = $rec['month'];
				$tokens[] = $rec['day'];
				$tokens[] = $rec['time'];
				$tokens[] = $rec['monthname'];			 
			 
				//print_r($tokens);
				$out = $this->combine_tokens($mytemplate, serialize($tokens), true);
			 
				$ogimage[] = $this->get_photo_url($rec[$item_code],2);
			 
				$this->ogTags = $this->openGraphTags(array(0=>$this->siteTitle,
														1=>$tokens[0],
														2=>$tokens[1],														
														3=>$this->httpurl .'/'. $itemlink,
														4=>$this->httpurl . str_replace('//','/','/'. $ogimage[0]),
													));				 
			 
				unset($tokens);	 
			}	   
	    }
   
	    return ($out);	
	}


    protected function get_data_info() { 
		$item = GetReq('id');	
		$cat = GetReq('cat');	

		$mytree = $this->cat_result;
		$thetree = (!empty($mytree))?implode(',',$mytree):null;		
		
	    if ($item) {
			$this->item = $this->result->fields[$this->itmname];
			$this->descr = $this->result->fields[$this->itmdescr];
			$this->price = null;//$this->result->fields[$ppol];
			$kwords = str_replace(' ',',',$this->item) . ',' ;
			$kwords.= $thetree;
			$this->keywords = str_replace(',,',',', $kwords);
		}
		elseif ($cat) {
			$cc = explode($this->sep(), $cat);
			$xcat = array_pop($cc);
			$this->item = (!empty($mytree))? array_pop($mytree) : $this->replace_spchars($xcat,1);
			$this->descr = $this->item .',' . $thetree;
			$this->price = null;
			$this->keywords = $this->item . ',' . $thetree;		
		}
        else { //front page
			$this->item = null;
			$this->descr = remote_paramload('INDEX','meta-description', $this->prpath);
			$this->price = null;
			$this->keywords = remote_paramload('INDEX','meta-keywords', $this->prpath);			
        }		
   }	
	
    public function get_page_info($key=null,$defkey=null) {
		$meta_title = ($defkey=='NULL') ? null : ($defkey ? $defkey : remote_paramload('INDEX','title', $this->prpath));
		$meta_descr = ($defkey=='NULL') ? null : ($defkey ? $defkey : remote_paramload('INDEX','meta-description', $this->prpath));
		$meta_keywords = ($defkey=='NULL') ? null : ($defkey ? $defkey : remote_paramload('INDEX','meta-keywords', $this->prpath));			
   	   
		if ($key=='item') 
			return ($this->item ? $this->item :$meta_title);	 
		elseif ($key=='descr')
			return ($this->descr ? $this->descr :$meta_descr);	
		elseif ($key=='keywords')
			return ($this->keywords ? $this->keywords :$meta_keywords);
		elseif ($key=='tag')
			return ($this->itmtag ? $this->itmtag :null);			 
		else 
			return (null);
    }
   
    protected function analyzedir($group,$startup=0,$isroot=false) {
	    $db = GetGlobal('db');	
	    $f = $this->lan;			
        $adir = array();
		
	    if ($isroot) {
			$depth = 1;			
			$sSQL = "select distinct cat2,cat{$f}2 from categories where ";
			$sSQL .= "(ctgid>0 and active>0 and view>0) order by ctgid";
			//$sSQL .= "ctgid>0 order by ctgid";
			$result = $db->Execute($sSQL,2);
			if ($result) { 
				foreach ($result as $i=>$rec) {
					 $adir[$rec[0]] = $rec[1];
				}
				$ret_adir = $adir;
			}
		}
        else {
		    if ($startup) 
				$adir[] = $this->home; //set home
	  
			$splitx = explode ($this->sep(), $group);   
		
		    $sSQL = "select distinct cat2,cat{$f}2,cat3,cat{$f}3,cat4,cat{$f}4,cat5,cat{$f}5 from categories where ";
			$depth = count($splitx)-1;
			switch ($depth) {
			  case 3  :$sSQL .= "cat5=\"".$this->replace_spchars($splitx[3],1)."\" and ";
			  case 2  :$sSQL .= "cat4=\"".$this->replace_spchars($splitx[2],1)."\" and ";
			  case 1  :$sSQL .= "cat3=\"".$this->replace_spchars($splitx[1],1)."\" and ";
			  case 0  :$sSQL .= "cat2=\"".$this->replace_spchars($splitx[0],1)."\""; 
			  default :
			}
			$sSQL .= " and (ctgid>0 and active>0 and view>0) order by ctgid";
			//$sSQL .= "ctgid>0 order by ctgid";
			$result = $db->Execute($sSQL,2);
			
			if ($result) {     
				for ($i=0;$i<=$depth;$i++) {
					$c = $i+2;
					if ($result->fields["cat{$f}{$c}"])
						$adir[$result->fields["cat{$c}"]] = $result->fields["cat{$f}{$c}"];			 
				} 
			}			  					

			//save as var for tags
			$this->cat_result = $adir;				
		}	  
        
        //return ($adir);
		return ($adir);
    }	

	protected function getcurrentkategory($toplevel=null, $url=null) {
	  $g = $this->replace_spchars(GetReq('cat'));	
      $mycattree = $this->analyzedir($g);	
		
	  if (empty($mycattree)) return;
	  
	  if ($toplevel) {
	    switch ($toplevel) {
		  case 2  ://prevlevel
		           $dummy = array_pop($mycattree);
				   if (!$ret = array_pop($mycattree)) 	  
				     $ret = $dummy;	 
		           break;
          case 1  ://toplevel
		  default :if ($url) 
		              $ret = seturl('t=klist&cat='. GetReq('cat'),array_pop($mycattree),null,null,null,true);
                   else 
		              $ret = array_pop(array_reverse($mycattree));	  
		}
	  }	
	  else {//actual
	    if ($url) 
		  $ret = seturl('t=klist&cat='. GetReq('cat'),array_pop($mycattree),null,null,null,true);
        else	  
	      $ret = array_pop($mycattree);	  	
	  }
  
	  return ($ret);
	}		

	protected function get_photo_url($code, $photosize=null) {
		$db = GetGlobal('db');
		if (!$code) return;  

		switch ($photosize) {
	       case 3  : $tpath = $this->picbg;
		             $stype = $this->imgLargeDB ? $this->imgLargeDB : 'LARGE';
		             break;	   
	       case 2  : $tpath = $this->picmd; 
		             $stype = $this->imgMediumDB ? $this->imgMediumDB : 'MEDIUM';
		             break;	   
	       case 1  : $tpath = $this->picsm;
                     $stype = $this->imgSmallDB ? $this->imgSmallDB : 'SMALL';		   
		             break;
	       default : $tpath = $this->picbg;	
                     $stype = '';		   
		}

		if ($interface = $this->photodb) { 
			if (is_numeric($interface))	  
				$photo = seturl('t=showimage&id='.$code.'&type='.$stype);
			else  
				$photo = $interface . '?id='.$code.'&type='.$stype;
		}
		else {//ordinal image
	  
			$code = $this->encode_image_id($code); //_m('shkategories.encode_image_id use '.$code);			  
			$pfile = $code;
			$photo_file = $this->urlpath . '/' .$tpath .'/'. $pfile . $this->restype;	  
			if (!file_exists($photo_file)) {
				$photo = $this->httpurl . $tpath . '/nopic' . $this->restype;	
			}
			else {
				$photo = $this->httpurl . $tpath . '/'. $pfile . $this->restype;	
			}  
	    }
	   
	    return ($photo);	 	
	}	
	
	protected function list_photo($code,$x=100,$y=null,$imageclick=1,$mycat=null,$photosize=null,$clickphotosize=null,$altname=null) {	
	   $cat = $mycat ? $mycat : GetReq('cat');  
	   $a_name = $altname ? $altname : $code;   
	   
	   $photo = $this->get_photo_url($code,$photosize);//define size
	   
	   	   
	    if (($imageclick==null) || ((is_numeric($imageclick)) && ($imageclick>=0))) {
	    
	     if ($imageclick==1) {//phot url	
	   
            $clickphoto = $clickphotosize ? $this->get_photo_url($code,$clickphotosize):
		                                   $this->get_photo_url($code,$photosize);
		   
            $plink = "<A href=\"$photo\">";

			$lo = "<img src=\"" . $photo . "\"";
 			$lo.= $y ? "height=\"$y\"" : null; 
			$lo.= "border=\"0\" alt=\"$a_name". localize('_IMAGE',$this->lan) . "\">" . "</A>"; 
	        $ret = $plink . $lo;
		  }
		  elseif ($imageclick==2) {//product url
		  
            $myresource = "<img src=\"" . $photo . "\"";
			$myresource.= "alt=\"$a_name". localize('_IMAGE',$this->lan) . "\">";
		  
		    $purl = seturl("t=kshow"."&cat=".$cat."&id=".$code,null,null,null,null,true); 
		    $plink = "<A href=\"$purl\">";
            $ret = $plink . $myresource . "</A>";           
		  }
		  elseif ($imageclick==0) {//item link
		  
		    $myresource = "<img src=\"" . $photo . "\"";
			$myresource.= "alt=\"$a_name". localize('_IMAGE',$this->lan) . "\">";
		    $ret = seturl('t=kshow&cat='.$cat.'&page='.$page.'&id='.$code,$myresource,null,null,null,true);// . "</A>";
		  } 
		  else {//item link
		  
            $myresource = "<img src=\"" . $photo . "\"";
			$myresource.= "alt=\"$a_name". localize('_IMAGE',$this->lan) . "\">";		  
		    $ret = seturl('t=kshow&cat='.$cat.'&page='.$page.'&id='.$code,$myresource,null,null,null,true);// . "</A>";
		  } 
		}
		else {
		  $plink = "<a href=\"$imageclick\">";
          $ret = $plink . "<img src=\"" . $photo . "\"" . "></a>";           		
	    } 	   		
		
	    return ($ret);
	}		

	public function replace_cartchars($string) {
		if (!$string) return null;

		$g1 = array("'",',','"','+','/',' ','-&-');
		$g2 = array('_','~',"*","plus",":",'-','-n-');		
	  
		return str_replace($g1,$g2,$string);
	}	
	
	protected function getkategoriesS($categories) {	
		if (empty($categories)) return null;	
		$c = $this->sep();
		$g1 = array("'",',','"','+','/',' ','-&-');
		$g2 = array('_','~',"*","plus",":",'-','-n-');		
		
		foreach ($categories as $i=>$cat)
			if ($cat) $xc[] = str_replace($g1,$g2,$cat);
			
		$ret = implode($c, $xc);
		return ($ret);
	}	
	
	protected function sep() {
		return $this->cseparator; 
	}	
	
	protected function openGraphTags($tokens=null) {
		if (!$tokens) return null;
		$localization = ($this->lan==1) ? 'el_gr' : 'en_us';
		
		//multiple images
		if (is_array($tokens[4])) { 
		    //print_r($tokens[4]);
			foreach ($tokens[4] as $i=>$img)
				$ogimage .= '
		<meta property="og:image" content="'.$this->httpurl . str_replace('//','/','/'.$img).'" />';
		}
		else
			$ogimage = '<meta property="og:image" content="'.$tokens[4].'" />
';
		
		$ret = <<<EOF
				
		<meta property="og:site_name" content="$tokens[0]" />		
		<meta property="og:title" content="$tokens[1]" />
		<meta property="og:description" content="$tokens[2]" />
		<meta property="og:type" content="product" />
		<meta property="og:url" content="$tokens[3]" />
	    <meta property="og:locale" content="$localization"/>		
		$ogimage
		
EOF;
		
        //extract first image or just one
        $img = is_array($tokens[4]) ? $this->httpurl . str_replace('//','/','/'.array_shift($tokens[4])) : $tokens[4];

        $ret .= $this->fbTags(array(0=>$tokens[0],1=>$tokens[1],2=>$tokens[2],3=>$tokens[3],4=>$img)) ;//$tokens);
		$ret .= $this->twitterTags(array(0=>$tokens[0],1=>$tokens[1],2=>$tokens[2],3=>$tokens[3],4=>$img)) ;//$tokens);
		$ret .= $this->ldTags(array(0=>$tokens[0],1=>$tokens[1],2=>$tokens[2],3=>$tokens[3],4=>$img)) ;//$tokens);
		
        return $ret;
	}
	
	public function getOGTags() {
		
		return ($this->ogTags);
	}
	
	//The card type, which will be one of summary, summary_large_image, photo, gallery, product, app, or player			
	protected function twitterTags($tokens=null) {
		if (!$tokens) return null;
		
		$twitter = explode('/', $this->siteTwitter); 
		$taddr = '@' . array_pop($twitter); //get last token
		
		$ret = <<<EOF
		
		<meta name="twitter:widgets:csp" content="on">
		<meta name="twitter:card" content="product">
		<meta name="twitter:site" content="$taddr">
		<meta name="twitter:domain" content="$tokens[0]">
		<meta name="twitter:title" content="$tokens[1]">
		<meta name="twitter:description" content="$tokens[2]">
		<meta name="twitter:image" content="$tokens[4]" />	
		
EOF;
        return $ret;
	}
	
	protected function fbTags($tokens=null) {
		if (!$tokens) return null;
		
		$fb = explode('/', $this->siteFb); 
		$fbaddr = array_pop($fb); //get last token
		
		$fbid = _v('cmslogin.facebook_id');
		
		$ret = <<<EOF
		
	    <meta property="fb:app_id" content="$fbid" />
		<meta property="fb:admins" content="$fbattr" />	
EOF;
        return $ret;
	}	
	
	protected function ldTags($tokens=null) {
		if (!$tokens) return null;
		
		$kw = _m('shtags.get_page_info use keywords');
		$keywords = str_replace(',""','' , '"' . str_replace(',', '","', $kw) . '"');
		
		$ret = <<<EOF
		
		<script type="application/ld+json">
		{
		"@context": "http://schema.org",
		"@type": "Product",
		"name": "$tokens[1]",
		"description: "$tokens[2]",
		"image:" "$tokens[4]", 
		"url": "$tokens[3]",
		"keywords": [$keywords]
		}
		</script>	
EOF;
        return $ret;
	}	
	
	
	public function show_lastincat($ascdesc=null,$category=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
		$mycat = $category ? $category : GetReq('cat');	   		
		$pz = $photosize ? $photosize : 1;		

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		
		$cat = explode($this->sep(),$mycat);			
		foreach ($cat as $i=>$c) {
		  $myc = $this->replace_spchars($c,1);		
		  $sSQL .= " cat{$i}='$myc' and ";	
		}  
		//only items inside category ..when category param not specified
	    /*if ((!$category) && ($this->onlyincategory)) {
		  $ii = $i+1;
		  $sSQL .= " (cat{$ii} IS NULL or cat{$ii}='') and ";		
		} */ 		

		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= "itmactive>0 and active>0";	
		$mysort = ($ascdesc=='ASC') ? 'ASC' : 'DESC'; 
		$sSQL .= " ORDER BY datein " . $mysort;	
		$sSQL .= $items ? " LIMIT " . $items : null;			
		//echo $sSQL;
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : 75;		
		
        $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"");
		  
		return ($out);	
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
				$ret = _m('twigengine.render use '.$tempfile.'++'.$tokens);
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
	    $itmname = $this->itmname;
	    $itmdescr = $this->itmdescr;	
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
							31=>localize($rec['monthname'], $this->lan),
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
		$slan = ($nolan) ? null : $this->lan;	  
	  		  
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
	public function ct($template, $toks=null, $execafter=null) {
		$db = GetGlobal('db'); 	

		$sSQL = "select data from cmstemplates where name=" . $db->qstr($template);
		$res = $db->Execute($sSQL);				
		$ret = base64_decode($res->fields['data']);					
		
		if (!$execafter)
			$ret = $this->process_commands($ret);		  		
		
		$tokens = $toks ? unserialize($toks) : array();
		$i=0;
		if (!empty($tokens)) {	 
			foreach ($tokens as $i=>$tok) 
				$ret = str_replace("$".$i."$",$tok,$ret);
		}
		//clean unused token marks
		for ($x=$i;$x<40;$x++)
			$ret = str_replace("$".$x."$",'',$ret);			
		
		if ($execafter)
			$ret = $this->process_commands($ret);	
		
		return ($ret);
	}
	
    //combine tokens with load tmpl data (file) inside	
	public function _ct($template, $toks=null, $execafter=null, $iscp=false) {
			
		$ret = $this->select_template($template, $iscp);					
		
		if (!$execafter)
			$ret = $this->process_commands($ret);		  			  		
		
		$tokens = $toks ? unserialize($toks) : array(); 
		$i=0;		
		if (!empty($tokens)) {	
			foreach ($tokens as $i=>$tok) 
				$ret = str_replace("$".$i."$",$tok,$ret);
		}
		//clean unused token marks
		for ($x=$i;$x<40;$x++)
			$ret = str_replace("$".$x."$",'',$ret);			
		
		if ($execafter)
			$ret = $this->process_commands($ret);		
		
		return ($ret);
	}	
	
	public function select_template($tfile=null, $iscp=false) {
		if (!$tfile) return;
	  
	    $path = $iscp ? $this->prpath . $this->tpath .'/'. $this->cptemplate .'/' : 
		                $this->prpath . $this->tpath .'/'. $this->template .'/' ; 
	    
		if (is_readable($path . $tfile.'.php')) {
			//unified languange php part page
			return @file_get_contents($path . $tfile . '.php'); 
		}

		return @file_get_contents($path . str_replace('.',$this->lan.'.',$tfile.'.htm')); 
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
}
?>