<?php
$__DPCSEC['SHKATALOGMEDIA_DPC']='1;1;1;1;1;1;2;2;9;9;9';

if ( (!defined("SHKATALOGMEDIA_DPC")) && (seclevel('SHKATALOGMEDIA_DPC',decode(GetSessionParam('UserSecID')))) ) {

define("SHKATALOGMEDIA_DPC",true);

$__DPC['SHKATALOGMEDIA_DPC'] = 'shkatalogmedia';

$d = GetGlobal('controller')->require_dpc('cgi-bin/shop/shkatalog.dpc.php', paramload('SHELL','urlpath'));
require_once($d);

$e = GetGlobal('controller')->require_dpc('shell/pxml.lib.php');
require_once($e);

GetGlobal('controller')->get_parent('SHKATALOG_DPC','SHKATALOGMEDIA_DPC');

$__EVENTS['SHKATALOGMEDIA_DPC'][96]='sitemap';
$__EVENTS['SHKATALOGMEDIA_DPC'][97]='feed';
$__EVENTS['SHKATALOGMEDIA_DPC'][98]='showimage';
$__EVENTS['SHKATALOGMEDIA_DPC'][99]='shkatalogmedia';
$__EVENTS['SHKATALOGMEDIA_DPC'][100]='kfilter';
$__EVENTS['SHKATALOGMEDIA_DPC'][101]='xmlout';

$__ACTIONS['SHKATALOGMEDIA_DPC'][96]='sitemap';
$__ACTIONS['SHKATALOGMEDIA_DPC'][97]='feed';
$__ACTIONS['SHKATALOGMEDIA_DPC'][98]='showimage';
$__ACTIONS['SHKATALOGMEDIA_DPC'][99]='shkatalogmedia';
$__ACTIONS['SHKATALOGMEDIA_DPC'][100]='kfilter';
$__ACTIONS['SHKATALOGMEDIA_DPC'][101]='xmlout';

$__LOCALE['SHKATALOGMEDIA_DPC'][0]='SHKATALOGMEDIA_DPC;Catalogue;Καταλογος';
$__LOCALE['SHKATALOGMEDIA_DPC'][1]='pcs;pcs;τμχ';
$__LOCALE['SHKATALOGMEDIA_DPC'][2]='_array;Table;Ομάδα';
$__LOCALE['SHKATALOGMEDIA_DPC'][3]='_next;Next;Εμπρος';
$__LOCALE['SHKATALOGMEDIA_DPC'][4]='_prev;Prev;Πίσω';
$__LOCALE['SHKATALOGMEDIA_DPC'][5]='_recent;Recent;Πρόσφατα';
$__LOCALE['SHKATALOGMEDIA_DPC'][6]='_popular;Popular;Προτεινόμενα';
$__LOCALE['SHKATALOGMEDIA_DPC'][7]='_AVAILABILITY;Availability;Διαθεσιμότητα';
$__LOCALE['SHKATALOGMEDIA_DPC'][8]='_WEIGHT;Weight;Βάρος';
$__LOCALE['SHKATALOGMEDIA_DPC'][9]='_VOLUME;Volume;Όγκος';
$__LOCALE['SHKATALOGMEDIA_DPC'][10]='_DIMENSIONS;Dimensions;Διαστάσεις';
$__LOCALE['SHKATALOGMEDIA_DPC'][11]='_SIZE;Size;Μέγεθος';
$__LOCALE['SHKATALOGMEDIA_DPC'][12]='_COLOR;Color;Χρώμα';
$__LOCALE['SHKATALOGMEDIA_DPC'][13]='_DESCRIPTION;Description;Περιγραφή';
$__LOCALE['SHKATALOGMEDIA_DPC'][14]='_ADDITIONALINFO;Additional Informations;Λεπτομέριες';
$__LOCALE['SHKATALOGMEDIA_DPC'][15]='_REVIEWS;Reviews;Σχόλια';
$__LOCALE['SHKATALOGMEDIA_DPC'][16]='_WITHTAX;with tax;με ΦΠΑ';
$__LOCALE['SHKATALOGMEDIA_DPC'][17]='_NOTAX;net value;χωρίς ΦΠΑ';
$__LOCALE['SHKATALOGMEDIA_DPC'][18]='_MANUFACTURER;Manufacturer;Κατασκευαστής';

class shkatalogmedia extends shkatalog {

    var $title;
	var $resource, $xmax, $ymax, $allow_show_resource;
	var $url;
	var $onlyincategory;
	var $oneitemlist, $my_one_item;
	var $photodb;
	var $encoding, $feed_on;
	var $noloadjslightbox, $additional_files_perline;
	var $notreebrowser, $encodeimageid, $default_pager;
	var $asceding_class, $nav_on;
	var $pager_current_class;
	var $orderid, $sortdef, $bypass_order_list;
	var $isListView, $imgLargeDB, $imgMediumDB, $imgSmallDB;
	var $ogTags, $siteTitle, $httpurl;

	function shkatalogmedia() {

	  shkatalog::shkatalog();
	  
	  $murl = arrayload('SHELL','ip');
      $this->url = $murl[0];
      $this->httpurl = 	paramload('SHELL','urlbase');  

      $char_set  = arrayload('SHELL','char_set');	  
      $charset  = paramload('SHELL','charset');	  		
	  if (($charset=='utf-8') || ($charset=='utf8'))
	    $this->encoding = 'utf8';//must be utf8 not utf-8
	  else  
	    $this->encoding = $char_set[getlocal()]; 	  

      $this->title = localize('SHKATALOGMEDIA_DPC',getlocal());
	  $this->restype = $rt?$rt:$this->restype;	 //parent restype when no additional files....	  
	  
	  $rt = remote_arrayload('SHKATALOGMEDIA','restype',$this->path);
	  $rd = array('.jpg','.png');
	  $this->advrestype = $rt?$rt:$rd;	 //advanced retypes to support multiple files as .png .swf ....
	  
	  $this->onlyincategory = remote_paramload('SHKATALOGMEDIA','onlyincategory',$this->path);	
	  $this->oneitemlist = remote_paramload('SHKATALOGMEDIA','oneitemlist',$this->path);
	  $this->photodb = remote_paramload('SHKATALOGMEDIA','photodb',$this->path);
	  
	  $this->my_one_item = null;
	  $this->feed_on = remote_paramload('SHKATALOGMEDIA','feed',$this->path);
	  
	  $adfperline = remote_paramload('SHKATALOGMEDIA','addfilesperline',$this->path);
	  $this->additional_files_perline = $adfperline ? $adfperline : null;	//3
	  $this->notreebrowser = remote_paramload('SHKATALOGMEDIA','notreebrowser',$this->path);
	  $this->encodeimageid = remote_paramload('SHKATALOGMEDIA','encodeimageid',$this->path);
	  $this->default_pager = remote_paramload('SHKATALOG','pager',$this->path);	 
	  $aclass = remote_paramload('SHKATALOGMEDIA','ascedingclass',$this->path);
      $this->asceding_class = $aclass ? $aclass : 'myf_select_small';	  
	  $this->nav = remote_paramload('SHKATALOGMEDIA','catnav',$this->path);
	  $pagecurrentclass = remote_paramload('SHKATALOGMEDIA','pagecurrentclass',$this->path);
	  $this->pager_current_class = $pagecurrentclass ? $pagecurrentclass : ' class="current"';
	  
	  $sort = remote_paramload('SHKATALOGMEDIA','sortdef',$this->path);   
	  $asc = GetReq('asc')?GetReq('asc'):GetSessionParam('asc');
	  switch ($asc) {
	    case 1  : $this->sortdef = 'ASC'; break;
		case 2  : $this->sortdef = 'DESC'; break;
	    default : $this->sortdef = $sort ? $sort : 'ASC';
	  }		  
	  
	  $oid = remote_paramload('SHKATALOGMEDIA','orderid',$this->path);
	  $this->orderid = $oid ? $oid : 'orderid '.$this->sortdef;	  	  
	  
	  $bpsl = remote_paramload('SHKATALOGMEDIA','bypasssortlist',$this->path);
	  $this->bypass_order_list = $bpsl ? true : false;

	  $this->imgLargeDB = remote_paramload('SHKATALOGMEDIA','photobgDB',$this->path);	
	  $this->imgMediumDB = remote_paramload('SHKATALOGMEDIA','photomdDB',$this->path);
	  $this->imgSmallDB = remote_paramload('SHKATALOGMEDIA','photosmDB',$this->path);

      $this->isListView = $_COOKIE['viewmode']=='list' ? 1 : 0;
      
      $this->siteTitle = remote_paramload('SHELL','urltitle',$this->path);	
	  $this->siteTwitter = remote_paramload('INDEX','twitter', $this->path);	  
	  $this->siteFb = remote_paramload('INDEX','facebook', $this->path);
      $this->ogTags = null;	  
	  $this->twitTags = null;
    }
	
	function event($event=null) {
	
	    switch ($event) {
			
		  case 'sitemap'       : 
								 if ($dpc = GetReq('dpc')) {//special phpdac page..read
								   $dpccmd = str_replace(',','+',$dpc);	
                                   //echo '>',$dpccmd; 								   
								   GetGlobal('controller')->calldpc_method($dpccmd);		  
								 }  
		                      
								 $xml = $this->sitemap_feed(true);
								 die($xml);	//xml output
		                         break;		
		
		  case 'feed'          : if (GetReq('id'))
		                           $this->read_item();
								 elseif (GetReq('cat'))  
		                           $this->read_list();
								 else {//special phpdac page..read
								   $dpccmd = str_replace(',','+',GetReq('dpc'));	
                                   //echo '>',$dpccmd; 								   
								   GetGlobal('controller')->calldpc_method($dpccmd);		  
								 }  
								 $xml = $this->katalog_feed();
								 die($xml);	//xml output
		                         break;
								 
		  case 'xmlout'        : GetGlobal('controller')->calldpc_method("cmsvstats.update_category_statistics use ".GetReq('cat')."+xmlout"); //..to do also in cp chars etc //$this->replace_spchars(GetReq('cat'),1)."+xmlout");
		                         $this->xmlread_list();
								 $xml = $this->xml_feed();
								 die($xml);	//xml output
		                         break;
		  //cart override
	      case 'addtocart'     : $cartstr = explode(';', GetReq('a')); 
		                         $item = array_shift($cartstr); 
		                         GetGlobal('controller')->calldpc_method("cmsvstats.update_item_statistics use $item+cartin");
		                         break; 
		  case 'removefromcart': $cartstr = explode(';', GetReq('a'));
		                         $item = array_shift($cartstr);
		                         GetGlobal('controller')->calldpc_method("cmsvstats.update_item_statistics use $item+cartout");	                         
		                         break;		
		
		  case 'showimage'    : $this->show_photodb(GetReq('id'), GetReq('type'));

		  case 'kfilter'      : $filter = GetReq('input');
		                        $this->my_one_item = $this->fread_list($filter); 
								$_filter = $this->replace_spchars($filter,1);
								GetGlobal('controller')->calldpc_method("cmsvstats.update_category_statistics use $_filter+filter");		  
		                        break;		
		  case 'klist'        : $this->my_one_item = $this->read_list(); 
		                        GetGlobal('controller')->calldpc_method("cmsvstats.update_category_statistics use ".GetReq('cat'));//$this->replace_spchars(GetReq('cat'),1));		  
		                        break;	

		  case 'kshow'        : $this->read_item(); 
	                            GetGlobal('controller')->calldpc_method("cmsvstats.update_item_statistics use ".GetReq('id'));
                                break;
								
		  default             : shkatalog::event($event);
		}			
    }	
	
	function action($action=null) {

	    switch ($action) {
		
		  case 'sitemap'       :
		  case 'feed'          :
		  case 'xmlout'        :		  
		                         break;		
		
		  //cart override
	      case 'addtocart'     :
		  case 'removefromcart':
		                        if (($this->carthandler) || (GetSessionParam('fastpick')=='on')) {
		                          if ($cat=GetReq('cat')) {
								    //event
									$this->my_one_item = $this->read_list(); 							  							
									$out .= $this->list_katalog(0);											
								  }
								  else
								    $out = $this->default_action();
								}  
								else
								  $out = GetGlobal('controller')->calldpc_method("shcart.cartview");   
		                        break;			
		
          case 'kfilter'      :	if (in_array('beforeitemslist',$this->catbanner))//before
								  $out .= $this->show_category_banner();									  
								  								
		                        $out .= $this->list_katalog(0,'kfilter');		
								
								//banner down
								if (in_array('afteritemslist',$this->catbanner))//after
								  $out .= $this->show_category_banner();														 
								break;
								
		  case 'klist'        : if (in_array('beforeitemslist',$this->catbanner))//before
								  $out .= $this->show_category_banner();									  
								   								
		                        $out .= $this->list_katalog(0);		
								
								//banner down
								if (in_array('afteritemslist',$this->catbanner))//after
								  $out .= $this->show_category_banner();														 
								break;

		  case 'kshow'        : if (in_array('beforeitem',$this->catbanner))
		                          $out .= $this->show_category_banner();	
								  
		                        $out .= $this->show_item();
								
								if (in_array('afteritem',$this->catbanner))
		                          $out .= $this->show_category_banner();	
		                        break;									
		  
		  default             : //echo $action,'>';
		                        if ($action=='katalog')
		                            $out .= $this->default_action();
			                    else 
									$out .= shkatalog::action($action);		
		                         
		  
		}	
		
		return ($out);
    }	
	
	protected function default_action() {
	    $db = GetGlobal('db');	
		$order = GetReq('order')?GetReq('order'):GetSessionParam('order');
		$asc = GetReq('asc')?GetReq('asc'):GetSessionParam('asc');
		$page = GetReq('page')?GetReq('page'):0;	
		
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,".$this->getmapf('code')." from products ";
		$sSQL .= " WHERE itmactive>0 and active>0";			 
		//$sSQL .= ' ORDER BY';
		$itmnamesort = $this->bypass_order_list ? null : ",".$itmname;
		$sSQL .= " ORDER BY ". "{$this->orderid}";
		  
		switch ($order) {
		    case 1  : $sSQL .= $this->bypass_order_list ? null : ','.$itmname; break;
		    case 2  : $sSQL .= $this->bypass_order_list ? null : ','.'price0';break;  
		    case 3  : $sSQL .= $this->bypass_order_list ? null : ','.$this->getmapf('code'); break;//must be converted to the text equal????
		    case 4  : $sSQL .= $this->bypass_order_list ? null : ','.'cat0';break;			
		    case 5  : $sSQL .= $this->bypass_order_list ? null : ','.'cat1';break;
		    case 6  : $sSQL .= $this->bypass_order_list ? null : ','.'cat2';break;			
		    case 9  : $sSQL .= $this->bypass_order_list ? null : ','.'cat3';break;						
		    default : $sSQL .= $this->bypass_order_list ? null : ','.$this->get_order();
		}
		
		$sSQL .= $this->bypass_order_list ? null : " {$this->sortdef}";
		$sSQL .= " LIMIT 100";
								 
	    $this->result = $db->Execute($sSQL,2);
		$this->max_items = $db->Affected_Rows();
	    $this->max_selection = $this->get_max_result();								
		$group = null;
		$out .= $this->show_submenu('klist',1,$group,null,1);
			
		if (!$this->onlyincategory) 
		    $out .= $this->list_katalog(0);//null,'katalog',null,null,1); 
		
		return ($out);
	}
	
	//override handle cat/sub cat navigation
	/*function tree_browser() {
	  $cat = GetReq('cat'); 
	  
	  if ($this->notreebrowser)
	      return null;
	  
	  $out = $this->show_submenu('klist',1,null,null,1);  //submenu only
	  
	  return ($out);
	  
	}*/		

	
	//override
	function do_quick_search($text2find,$incategory=null) {
        $db = GetGlobal('db');	
		$page = GetReq('page')?GetReq('page'):0;
	    $asc = GetReq('asc')?GetReq('asc'):GetSessionParam('asc');
	    $order = GetReq('order')?GetReq('order'):GetSessionParam('order');		
		$stype = GetParam('searchtype'); //echo $stype;
		$scase = GetParam('searchcase'); //echo $scase;
		
		//$incategory = $incategory ? $incategory : GetGlobal('controller')->calldpc_var('shtags.tagcat');//!!!!!NO RESULT
		$incategory = $incategory ? $incategory : GetReq('cat');		
		
	    $lan = getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';						
		
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;	
		
		if ($text2find) {
			
		  GetGlobal('controller')->calldpc_method("cmsvstats.update_category_statistics use $text2find+search");				
		
		  $parts = explode(" ",$text2find);//get special words in text like code:  
	
	      $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,".
				$this->getmapf('code').	$lastprice . 
				" from products ";
		  	
		  $sSQL .= " where ";
		  
		  switch ($parts[0]) {
		  
		    case 'code:' :  $sSQL .= " ( ".$this->getmapf('code')." like '%" . $this->decodeit($parts[1]) . "%')";
			                break;
		  
		    default      : //normal search
		  
		    if (defined("SHNSEARCH_DPC")) {
              $sSQL .= '('. GetGlobal('controller')->calldpc_method('shnsearch.findsql use '.$text2find.'+'.$this->getmapf('code').'<@>'.$itmname.'<@>'.$itmdescr.'<@>itmremark++'.$stype.'+'.$scase);		  
            }
			else { 			  	
	          $sSQL .= '(' . " ( $itmname like '%" . strtolower($text2find) . "%' or " .
		               " $itmname like '%" . strtoupper($text2find) . "%')";	
		      $sSQL .= " or ";		   
	          $sSQL .= " ( $itmdescr like '%" . strtolower($text2find) . "%' or " .
		               " $itmdescr like '%" . strtoupper($text2find) . "%')";				 
		      $sSQL .= " or ";		   
	          $sSQL .= " ( itmremark like '%" . strtolower($text2find) . "%' or " .
		               " itmremark like '%" . strtoupper($text2find) . "%')";				 					 
		      $sSQL .= " or ";		   			 
	          $sSQL .= " ( ".$this->getmapf('code')." like '%" . strtolower($text2find) . "%' or " .
		               " ".$this->getmapf('code')." like '%" . strtoupper($text2find) . "%')";						 
		    }			   
	   				 
		  }//switch....................................................					
		  $sSQL .= ')' ;
		  
          if ($incategory) {	
		    $cats = explode($this->cseparator,$incategory);
		    foreach ($cats as $c=>$mycat)
		      $sSQL .= ' and cat'.$c ." ='" . $this->replace_spchars($mycat,1) . "'";		  	  
		  }
		   							  
		  $sSQL .= " and itmactive>0 and active>0";	
		  $search_sql = $sSQL;	
		  $itmnamesort = $this->bypass_order_list ? null : ",".$itmname;
		  $sSQL .= " ORDER BY ". "{$this->orderid}";			  
		  
		  switch ($order) {
		    case 1  : $sSQL .= $this->bypass_order_list ? null : ','.$itmname; break;
			case 2  : $sSQL .= $this->bypass_order_list ? null : ','.'price0';break;  
		    case 3  : $sSQL .= $this->bypass_order_list ? null : ','.$this->getmapf('code'); break;//must be converted to the text equal????
			case 4  : $sSQL .= $this->bypass_order_list ? null : ','.'cat1';break;			
			case 5  : $sSQL .= $this->bypass_order_list ? null : ','.'cat2';break;
			case 6  : $sSQL .= $this->bypass_order_list ? null : ','.'cat3';break;			
			case 9  : $sSQL .= $this->bypass_order_list ? null : ','.'cat4';break;						
		    default : $sSQL .= $this->bypass_order_list ? null : ','.$itmname;
		  }
		  
		  $sSQL .= $this->bypass_order_list ? null : " {$this->sortdef}";
		  
		  //LIMITED SEARCH
		  if ($this->pager) {
		    $p = $page * $this->pager;
		    $sSQL .= " LIMIT $p,".$this->pager; //page element count
		  }
		  
		  //echo $page,'>',$sSQL;		  
		  	  
	      $resultset = $db->Execute($sSQL,2); 
	      $this->result = $resultset; 
		  $this->meter = $db->Affected_Rows();
		  $this->max_items = $db->Affected_Rows();
	      $this->max_selection = $this->get_max_result($text2find);																			

	   	}
	}		
	
	
	function do_filter_search($text2find,$incategory=null) {
        $db = GetGlobal('db');	
		$page = GetReq('page')?GetReq('page'):0;
	    $asc = GetReq('asc')?GetReq('asc'):GetSessionParam('asc');
	    $order = GetReq('order')?GetReq('order'):GetSessionParam('order');		
		$stype = GetParam('searchtype'); //echo $stype;
		$scase = GetParam('searchcase'); //echo $scase;
		
		//$incategory = $incategory ? $incategory : GetGlobal('controller')->calldpc_var('shtags.tagcat');//!!!!!NO RESULT
		$incategory = $incategory ? $incategory : GetReq('cat');		
		
	    $lan = getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';						
		
		$lastprice = $this->getmapf('lastprice'); //?','.$this->getmapf('lastprice'):null;	
		
		if ($text2find) {
		
	      $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,".
				$this->getmapf('code').	$lastprice .
				" from products ";
		  	
		  $sSQL .= " where manufacturer='" . $this->replace_spchars($text2find,1) . "'";
		  
          if ($incategory) {	
		    $cats = explode($this->cseparator,$incategory);
		    foreach ($cats as $c=>$mycat)
		      $sSQL .= ' and cat'.$c ." ='" . $this->replace_spchars($mycat,1) . "'";		  	  
		  }
		   							  
		  $sSQL .= " and itmactive>0 and active>0";	
		  $search_sql = $sSQL;	
		  $itmnamesort = $this->bypass_order_list ? null : ",".$itmname;
		  $sSQL .= " ORDER BY ". "{$this->orderid}";			  
		  //echo 'do_filter_search:' . $sSQL . '<br/>';
		  
		  switch ($order) {
		    case 1  : $sSQL .= $this->bypass_order_list ? null : ','.$itmname; break;
			case 2  : $sSQL .= $this->bypass_order_list ? null : ','.'price0';break;  
		    case 3  : $sSQL .= $this->bypass_order_list ? null : ','.$this->getmapf('code'); break;//must be converted to the text equal????
			case 4  : $sSQL .= $this->bypass_order_list ? null : ','.'cat1';break;			
			case 5  : $sSQL .= $this->bypass_order_list ? null : ','.'cat2';break;
			case 6  : $sSQL .= $this->bypass_order_list ? null : ','.'cat3';break;			
			case 9  : $sSQL .= $this->bypass_order_list ? null : ','.'cat4';break;						
		    default : $sSQL .= $this->bypass_order_list ? null : ','.$itmname;
		  }
		  
		  $sSQL .= $this->bypass_order_list ? null : " {$this->sortdef}";
		  
		  //LIMITED SEARCH
		  if ($this->pager) {
		    $p = $page * $this->pager;
		    $sSQL .= " LIMIT $p,".$this->pager; //page element count
		  }
	  
	      $resultset = $db->Execute($sSQL,2); 
	      $this->result = $resultset; 
		  $this->meter = $db->Affected_Rows();
		  $this->max_items = $db->Affected_Rows();
	      $this->max_selection = $this->get_max_result($text2find);	
																	
	   	}
	}	
	
	//override
	function get_max_result($text2find=null,$filter=null) {
        $db = GetGlobal('db');
		$cat = GetReq('cat');	  
		if ($cat{0}=='-') {
		    $negative = true;
			$cat = substr($cat,1);//drop -
		}			
		$cat_tree = explode($this->cseparator, $cat);		
		$oper = $negative?' not like ':'='; 
		
	    $lan = getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';	
		$stype = GetParam('searchtype'); //echo $stype;
		$scase = GetParam('searchcase'); //echo $scase;					
				
		$sSQL = "select count(id) from products where ";
		
		if ($text2find) {
		
		  if (defined("SHNSEARCH_DPC")) {
			  $mytext = $filter ? $this->replace_spchars($text2find,1) : $text2find; //search by user or filter 
              $whereClause = GetGlobal('controller')->calldpc_method('shnsearch.findsql use '.$mytext.'+'.$this->getmapf('code').'<@>'.$itmname.'<@>'.$itmdescr.'<@>itmremark<@>manufacturer++'.$stype.'+'.$scase);		  
          }
		  else {		
			 $mytext = $filter ? $this->replace_spchars($text2find,1) : strtolower($text2find); //search by user or filter			  
	         $whereClause = " ( $itmname like '%" . $mytext . "%' or " .
		               " $itmname like '%" . $mytext . "%')";	
		     $whereClause .= " or ";		   
	         $whereClause .= " ( $itmdescr like '%" . $mytext . "%' or " .
		               " $itmdescr like '%" . $mytext . "%')";				 
		     $whereClause .= " or ";		   
	         $whereClause .= " ( itmremark like '%" . strtolower($text2find) . "%' or " .
		               " itmremark like '%" . $mytext . "%')";				 					 
		     $whereClause .= " or ";		   			 
	         $whereClause .= " ( ".$this->getmapf('code')." like '%" . $mytext . "%' or " .
		               " ".$this->getmapf('code')." like '%" . $mytext . "%')";								  		
		  }	
		  //search in cat...				  
          if ($cat_tree[0])
			    $whereClause .= ' and cat0'.$oper . $db->qstr($this->replace_spchars($cat_tree[0],1));		  
		  if ($cat_tree[1])	
		 	    $whereClause .= 'and cat1'.$oper . $db->qstr($this->replace_spchars($cat_tree[1],1));		 
		  if ($cat_tree[2])	
			    $whereClause .= 'and cat2'.$oper . $db->qstr($this->replace_spchars($cat_tree[2],1));		   
		  if ($cat_tree[3])	
			    $whereClause .= 'and cat3'.$oper . $db->qstr($this->replace_spchars($cat_tree[3],1));
		   						  
		}
		else {//katalog page
		      	  
		     if ($cat_tree[0])
			    $whereClause .= ' cat0'.$oper . $db->qstr($this->replace_spchars($cat_tree[0],1));	
			 elseif ($this->onlyincategory)
			 	$whereClause .= ' cat1=\'\' ';					  
		     if ($cat_tree[1])	
		 	    $whereClause .= ' and cat1'.$oper . $db->qstr($this->replace_spchars($cat_tree[1],1));
			 elseif ($this->onlyincategory)
			 	$whereClause .= ' and cat1=\'\' ';						 
		     if ($cat_tree[2])	
			    $whereClause .= ' and cat2'.$oper . $db->qstr($this->replace_spchars($cat_tree[2],1));		
			 elseif ($this->onlyincategory)
			 	$whereClause .= ' and cat2=\'\' ';				   
		     if ($cat_tree[3])	
			    $whereClause .= ' and cat3'.$oper . $db->qstr($this->replace_spchars($cat_tree[3],1));
			 elseif ($this->onlyincategory)
			 	$whereClause .= ' and cat3=\'\' ';				
		   		
		}
		    
		$sSQL .= $whereClause;		
		  if ($filter)
            $sSQL .= " and manufacturer=" . $db->qstr($this->replace_spchars($filter,1));		
		$sSQL .= " and itmactive>0 and active>0";
		//echo 'get_max_res:' . $sSQL . '<br/>';	 
		
	    $resultset = $db->Execute($sSQL,2);	
 	    $this->max_cat_items = $resultset->fields[0];//$db->Affected_Rows();			 					
		
		return ($this->max_cat_items);
	}	

	function show_photodb($itmcode=null, $stype=null, $type=null) {
      $db = GetGlobal('db');
	  if (!$itmcode) return;
	  $type = $type?$type:$this->restype;
	  	  
      $sSQL = "select data,type,code from pphotos ";
	  $sSQL .= " WHERE code='" . $itmcode . "'";
	  if (isset($type))
	    $sSQL .= " and type='". $type ."'";
	  if (isset($stype))
	    $sSQL .= " and stype='". $stype ."'";		
      //echo $sSQL;
	  
	  $resultset = $db->Execute($sSQL,2);	
	  $result = $resultset;	  
	  $mime_type = 'image/'.str_replace('.','',$result->fields['type']);
	  $mime_type = 'image/jpeg';
	  header('Content-type: ' . $mime_type);

	  if ($result->fields['code']) //photo exists
        echo base64_decode($result->fields['data']);
	  else {//additional photo or standart nopic
	    switch ($stype) {
			case 'LARGE' : echo file_get_contents(getcwd().'/images/photo_bg/nopic.jpg'); break;
			case 'MEDIUM': echo file_get_contents(getcwd().'/images/photo_md/nopic.jpg'); break;
			case 'SMALL' : echo file_get_contents(getcwd().'/images/photo_sm/nopic.jpg'); break;
			default      : echo file_get_contents(getcwd().'/images/photo_sm/nopic.jpg'); 
		}
      }  
	  
	  die();
	}	
	
	//override
	function get_photo_url($code, $photosize=null) {
      $db = GetGlobal('db');
	  if (!$code) return;  
	  //echo $photosize;
	  //when we have 3 type of scale image
	  switch ($photosize) {
	       case 3  : $tpath = $this->thubpath_large; 
		             $stype = $this->imgLargeDB ? $this->imgLargeDB : 'LARGE';
		             break;	   
	       case 2  : $tpath = $this->thubpath_medium; 
		             $stype = $this->imgMediumDB ? $this->imgMediumDB : 'MEDIUM';
		             break;	   
	       case 1  : $tpath = $this->thubpath_small;
                     $stype = $this->imgSmallDB ? $this->imgSmallDB : 'SMALL';		   
		             break;
	       default : $tpath = $this->thubpath;	
                     $stype = '';		   
	  }
	  
	  if ($interface = $this->photodb) { 
	     //echo $stype;
         if (is_numeric($interface))	  
	       $photo = seturl('t=showimage&id='.$code.'&type='.$stype);
		 else  
		   $photo = $interface . '?id='.$code.'&type='.$stype;
	  }
	  else {//ordinal image
	  
		 $code = $this->encode_image_id($code);			  
		 $pfile = $code;
	     $photo_file = $this->urlpath . '/' .$tpath . $pfile . $this->restype;	  
	     if (!file_exists($photo_file)) {
	       $photo = $tpath . 'nopic' . $this->restype;	
		 }
	     else {
	       $photo = $tpath . $pfile . $this->restype;	
		 }  
	   }
	   
	   return ($photo);	 	
	}	
	
	//override
	function list_photo($code,$x=100,$y=null,$imageclick=1,$mycat=null,$photosize=null,$clickphotosize=null,$altname=null) {
	   $page = GetReq('page')?GetReq('page'):0;		
	   $cat = $mycat?$mycat:GetReq('cat');  
	   $a_name = $altname ? $altname : $code;   
	   
	   $photo = $this->get_photo_url($code,$photosize);//define size
	   
	   	   
	    if (($imageclick==null) || ((is_numeric($imageclick)) && ($imageclick>=0))) {
	    
	     if ($imageclick==1) {//phot url	
	   
           $clickphoto = $clickphotosize?$this->get_photo_url($code,$clickphotosize):
		                                 $this->get_photo_url($code,$photosize);
		   
             $plink = "<A href=\"$photo\">";

			$lo = "<img src=\"" . $photo . "\"";
 			$lo.= $y ? "height=\"$y\"" : null; 
			$lo.= "border=\"0\" alt=\"$a_name". localize('_IMAGE',getlocal()) . "\">" . "</A>"; 
	        $ret = $plink . $lo;
		  }
		  elseif ($imageclick==2) {//product url
		  
            $myresource = "<img src=\"" . $photo . "\"";
			$myresource.= "alt=\"$a_name". localize('_IMAGE',getlocal()) . "\">";
		  
		    $purl = seturl("t=kshow"."&cat=".$cat."&id=".$code,null,null,null,null,$this->rewrite); 
		    $plink = "<A href=\"$purl\">";
            $ret = $plink . $myresource . "</A>";           
		  }
		  elseif ($imageclick==0) {//item link
		  
		    $myresource = "<img src=\"" . $photo . "\"";
			$myresource.= "alt=\"$a_name". localize('_IMAGE',getlocal()) . "\">";
		    $ret = seturl('t=kshow&cat='.$cat.'&page='.$page.'&id='.$code,$myresource,null,null,null,$this->rewrite);// . "</A>";
		  } 
		  else {//item link
		  
            $myresource = "<img src=\"" . $photo . "\"";
			$myresource.= "alt=\"$a_name". localize('_IMAGE',getlocal()) . "\">";		  
		    $ret = seturl('t=kshow&cat='.$cat.'&page='.$page.'&id='.$code,$myresource,null,null,null,$this->rewrite);// . "</A>";
		  } 
		}
		else {
		  $plink = "<a href=\"$imageclick\">";
          $ret = $plink . "<img src=\"" . $photo . "\"" . "></a>";           		
	    } 	   		
		
	    return ($ret);
	}				
	
	//override
	function read_list() {
        $db = GetGlobal('db');	
	    $asc = GetReq('asc')?GetReq('asc'):GetSessionParam('asc');
	    $order = GetReq('order')?GetReq('order'):GetSessionParam('order');	
		$page = GetReq('page')?GetReq('page'):0;
		$negative = false;
	    $lan = getlocal();
	    $mylan = $lan?$lan:'0';
	    $itmname = $mylan?'itmname':'itmfname';
	    $itmdescr = $mylan?'itmdescr':'itmfdescr';	
        $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;			
	    $f = $mylan; 	
		$cat = GetReq('cat');	

		if ($cat{0}=='-') {
		    $negative = true;
			$cat = substr($cat,1);//drop -
		}	 
		
		$oper = $negative?' not like ':'='; 			
		
		if ($cat!=null) {		   
		  
		  $cat_tree = explode($this->cseparator, $cat); 
			
		   
	      $sSQL = "select id,sysins,code1,pricepc,price2,sysupd,itmname,itmfname,uniname1,uniname2,active,code4," .
	              "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				  $this->getmapf('code'). $lastprice . ",weight,volume,dimensions,size,color,manufacturer,orderid" .
				  " from products ";
		  $sSQL .= " WHERE ";		   
		      	  
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
		   		
		    
		  $sSQL .= $whereClause;				 
		  $sSQL .= " and itmactive>0 and active>0";			   
		  $sSQL .= " ORDER BY {$this->orderid}";
		  
		  switch ($order) {
		      case 1  : $sSQL .= $this->bypass_order_list ? null : ','.$itmname; break;
			  case 2  : $sSQL .= $this->bypass_order_list ? null : ',price0';break;  
		      case 3  : $sSQL .= $this->bypass_order_list ? null : ','.$this->getmapf('code'); break;
			  case 4  : $sSQL .= $this->bypass_order_list ? null : ',cat0';break;			
			  case 5  : $sSQL .= $this->bypass_order_list ? null : ',cat1';break;
			  case 6  : $sSQL .= $this->bypass_order_list ? null : ',cat2';break;			
			  case 9  : $sSQL .= $this->bypass_order_list ? null : ',cat3';break;						
		      default : $sSQL .= $this->bypass_order_list ? null : ','.$itmname;
		  }
		  

		  $sSQL .= $this->bypass_order_list ? null : " {$this->sortdef}";
		  
		  if ($this->pager) {
		    $p = $page * $this->pager;
		    $sSQL .= " LIMIT $p,".$this->pager; //page element count
		  }
			
	      $resultset = $db->Execute($sSQL,2);
	      $this->result = $resultset; 
 	      $this->max_items = $db->Affected_Rows();//count($this->result);
	      
	      if ($this->max_items==1) {
			return ($this->result->fields[$this->getmapf('code')]); //to view the item without click on dir
		  }
		  else { 
	        $this->max_selection = $this->get_max_result();			
			return (null);
		  }	
		}
		
	}	
	
	/* filter */
	function fread_list($filter=null) {
        $db = GetGlobal('db');	
	    $asc = GetReq('asc')?GetReq('asc'):GetSessionParam('asc');
	    $order = GetReq('order')?GetReq('order'):GetSessionParam('order');	
		$page = GetReq('page')?GetReq('page'):0;
	    $lan = getlocal();
	    $mylan = $lan?$lan:'0';
	    $itmname = $mylan?'itmname':'itmfname';
	    $itmdescr = $mylan?'itmdescr':'itmfdescr';	
        $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;			
	    $f = $mylan; 
		$oper = '=';

		$cat = GetReq('cat');		
		
		if ($cat!=null) {		   
		  
		  $cat_tree = explode($this->cseparator,$cat); 
			
		   
	      $sSQL = "select id,sysins,code1,pricepc,price2,sysupd,itmname,itmfname,uniname1,uniname2,active,code4," .
	              "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				  $this->getmapf('code'). $lastprice . ",weight,volume,dimensions,size,color,manufacturer,orderid" .
				  " from products ";
		  $sSQL .= " WHERE ";		   
		      	  
		  if ($cat_tree[0])
		    $whereClause = ' cat0'.$oper . $db->qstr($this->replace_spchars($cat_tree[0],1));		
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
		   		
		    
		  $sSQL .= $whereClause;
		  
		  if ($filter)
            $sSQL .= " and manufacturer=" . $db->qstr($this->replace_spchars($filter,1));
		
		  $sSQL .= " and itmactive>0 and active>0";			   
		  $sSQL .= " ORDER BY {$this->orderid}";
		  
		  switch ($order) {
		      case 1  : $sSQL .= $this->bypass_order_list ? null : ','.$itmname; break;
			  case 2  : $sSQL .= $this->bypass_order_list ? null : ',price0';break;  
		      case 3  : $sSQL .= $this->bypass_order_list ? null : ','.$this->getmapf('code'); break;
			  case 4  : $sSQL .= $this->bypass_order_list ? null : ',cat0';break;			
			  case 5  : $sSQL .= $this->bypass_order_list ? null : ',cat1';break;
			  case 6  : $sSQL .= $this->bypass_order_list ? null : ',cat2';break;			
			  case 9  : $sSQL .= $this->bypass_order_list ? null : ',cat3';break;						
		      default : $sSQL .= $this->bypass_order_list ? null : ','.$itmname;
		  }
		  
		  $sSQL .= $this->bypass_order_list ? null : " {$this->sortdef}";
		  
		  if ($this->pager) {
		    $p = $page * $this->pager;
		    $sSQL .= " LIMIT $p,".$this->pager; //page element count
		  }
	      //echo 'fread_list:' . $sSQL . '<br/>';
		  
	      $resultset = $db->Execute($sSQL,2);
	      $this->result = $resultset; 
 	      $this->max_items = $db->Affected_Rows();//count($this->result);
	      
	      if ($this->max_items==1) {
			return ($this->result->fields[$this->getmapf('code')]); //to view the item without click on dir
		  }
		  else { 
	        $this->max_selection = $this->get_max_result(null, $filter);			
			return (null);
		  }	
		}
		
	}

	/* xml read */
	protected function xmlread_list() {
        $db = GetGlobal('db');	
	    $asc = GetReq('asc')?GetReq('asc'):GetSessionParam('asc');
	    $order = GetReq('order')?GetReq('order'):GetSessionParam('order');	
		$page = GetReq('page')?GetReq('page'):0;
		$negative = false;
	    $lan = getlocal();
	    $mylan = $lan?$lan:'0';
	    $itmname = $mylan?'itmname':'itmfname';
	    $itmdescr = $mylan?'itmdescr':'itmfdescr';	
        $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;			 	
		$cat = GetReq('cat');				
		$xmlitems = GetReq('xml');	
			
		if (!defined('RCXMLFEEDS_DPC')) return 'RCXMLFEEDS DPC not loaded'; //dpc cmds needed
		$sf = _v('rcxmlfeeds.select_fields'); //remote_arrayload('RCXMLFEEDS','selectfields',$this->path);			
		$myfields = implode(',', $sf);	
		$sSQL = "select id," . $myfields . " from products";
		
	    /*$sSQL = "select id,sysins,code1,pricepc,price2,sysupd,itmname,itmfname,uniname1,uniname2,active,code4," .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
		  	    $this->getmapf('code'). $lastprice . ",weight,volume,dimensions,size,color,manufacturer,orderid" .
				" from products ";*/
		$sSQL .= " WHERE ";	

		if ($cat!=null) {		   
		  
			$cat_tree = explode($this->cseparator, $cat); 		  
		      	  
			if ($cat_tree[0])
				$whereClause .= ' cat0='.$db->qstr($this->replace_spchars($cat_tree[0],1));		
			elseif ($this->onlyincategory)
				$whereClause .= ' (cat0 IS NULL OR cat0=\'\') ';				  
			if ($cat_tree[1])	
				$whereClause .= ' and cat1='.$db->qstr($this->replace_spchars($cat_tree[1],1));	
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat1 IS NULL OR cat1=\'\') ';	 
			if ($cat_tree[2])	
				$whereClause .= ' and cat2='.$db->qstr($this->replace_spchars($cat_tree[2],1));	
			elseif ($this->onlyincategory)
			 	$whereClause .= ' and (cat2 IS NULL OR cat2=\'\') ';		   
			if ($cat_tree[3])	
				$whereClause .= ' and cat3='.$db->qstr($this->replace_spchars($cat_tree[3],1));
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat3 IS NULL OR cat3=\'\') ';
		   		
		}   
		$sSQL .= $whereClause ? $whereClause . " AND " : null;
		  
		$sSQL .= $xmlitems ? "xml=1 and itmactive>0 and active>0" : "itmactive>0 and active>0";		  		   
		$sSQL .= " ORDER BY {$this->orderid}";

		//echo $sSQL;	
	    $this->result = $db->Execute($sSQL,2);
	}		
	
	//override
	function read_item($direction=null,$item_id=null) {
        $db = GetGlobal('db');	
		$item = $item_id ? $item_id : GetReq('id');
		$cat = GetReq('cat');		
        $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;			  	
		
	    $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code') .
				$lastprice .				
				",weight,volume,dimensions,size,color,manufacturer from products ";
				
		  $sSQL .= " WHERE ".$this->getmapf('code')."=";
		  $sSQL .= $this->codetype=='string' ? $db->qstr($item) : $item;
		  
		  if (($lock = $this->itemlockparam) && (!GetGlobal('UserID')))
		    $sSQL .=  ' and ' . $lock . ' is null';		  	  
	   
	   $sSQL .= " LIMIT 1";
	   
	   $resultset = $db->Execute($sSQL,2);
	   $this->result = $resultset; 	
 
       //update session last viewed items
       $vitems = (array) unserialize(GetSessionParam('lastvieweditems'));	   
	   $vitems[] = $item;
	   if (count($vitems)>12) 
		$itemout = array_shift($vitems);
	   	
	   
	   SetSessionParam('lastvieweditems',serialize($vitems));	   
	   
	   return ($resultset);   
	}		
	
	//override
	function show_paging($pagecmd=null,$mytemplate=null,$nopager=null) {
	   if ($nopager) return;
		
	   $cat = GetReq('cat'); // asis
	   $order = GetReq('order')?GetReq('order'):GetSessionParam('order');
	   $asc = GetReq('asc')?GetReq('asc'):GetSessionParam('asc');	
	   $t = GetReq('t'); 	
	   $page = GetReq('page')?GetReq('page'):0;
	   $pager = GetReq('pager')?GetReq('pager'):$this->pager;
	   
	   $pcmd = $pagecmd?$pagecmd:'klist';
		  
	   //echo '|paging>',$this->max_items,':',$this->max_cat_items,':',$this->max_selection;
	   
	   $mp = $this->max_cat_items;//$this->get_max_result(); //$this->max_selection
	   $max_page = floor($mp/$this->pager);//<<<<<<<<<<<<<<<-1;	 plus ceil  
	   //echo $max_page.">>>>".$mp.">>>>".$this->pager;
	   $cutter = 2;//5	 
	   
	   if ($mp<=$pager) return;  
	   $tmpl_file='fppager-button.htm';	   
	   $template_button = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$tmpl_file) ;	   
	   $tmplcontents = file_get_contents($template_button);	 
	    
	   if ($page<$max_page) {//&& ($mp<$pager)) { 

	     //next pages
		 $m = 0;
		 for($p=$page+1;$p<$max_page;$p++) {
		   if ($m<$cutter) {
                if ($pcmd=='kfilter') 				 
					$next_page_no = seturl('t='.$pcmd.'&cat='.$cat.'&input='.GetReq('input').'&page='.$p,$p+1,null,null,null,$this->rewrite);
              	else		
					$next_page_no = seturl('t='.$pcmd.'&cat='.$cat.'&page='.$p,$p+1,null,null,null,$this->rewrite);
				$next .= $this->combine_template($tmplcontents,'',$next_page_no);
		   }
		   $m+=1;
		 }	   
	   	 if (($next) && (!$tmplcontents)) $next .= "|";
	     $page_next = $page + 1;	
            if ($pcmd=='kfilter') 		 
				$next_label = seturl('t='.$pcmd.'&cat='.$cat.'&input='.GetReq('input').'&page='.$page_next,'&gt;',null,null,null,$this->rewrite);
			else	
				$next_label = seturl('t='.$pcmd.'&cat='.$cat.'&page='.$page_next,'&gt;',null,null,null,$this->rewrite);
			$next .= $this->combine_template($tmplcontents,'',$next_label);
	   }
	    
	   if ($page>0) {
	     $page_prev = $page - 1;
            if ($pcmd=='kfilter')		 
				$prev_label = seturl('t='.$pcmd.'&cat='.$cat.'&input='.GetReq('input').'&page='.$page_prev,'&lt;',null,null,null,$this->rewrite);		 
			else	
				$prev_label = seturl('t='.$pcmd.'&cat='.$cat.'&page='.$page_prev,'&lt;',null,null,null,$this->rewrite);		 
			$prev = $this->combine_template($tmplcontents,'',$prev_label);	
		 
         //prev pages
		 $m = $page-$cutter;
		 for($p=0;$p<$page;$p++) {
		   if ($p>=$m) {
			 if ($pcmd=='kfilter')  
				$prev_page_no = seturl('t='.$pcmd.'&cat='.$cat.'&input='.GetReq('input').'&page='.$p,$p+1,null,null,null,$this->rewrite);
			 else
				$prev_page_no = seturl('t='.$pcmd.'&cat='.$cat.'&page='.$p,$p+1,null,null,null,$this->rewrite);
			
				$prev .= $this->combine_template($tmplcontents,'',$prev_page_no);

		   }
		 }  
	   }	 
	   $cp = $page+1;
	   $current = $this->combine_template($tmplcontents, $this->pager_current_class ,"<a href=\"#\">$cp</a>");   
			
	     
	   //template
	   $template_file='fppager.htm';	   
	   $tfile = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template_file) ; 	
	   $page_titles = $prev . $current . $next;	
	   $contents = file_get_contents($tfile);	   		 	    		 
	   $ret = $this->combine_template($contents,$page_titles);	
	   
	   return ($ret);
	}	

	//override
	function show_asceding($cmd=null,$mytemplate=null,$style=null,$notview=null) {
	
	   if ($notview) return;
	   
	   $cat = GetReq('cat');
	   $t = GetReq('t');   
	   $cmd=$cmd?$cmd:'klist';
	   $asc = GetReq('asc') ? SetSessionParam('asc',GetReq('asc')) : GetSessionParam('asc');
	   $order = GetReq('order') ? SetSessionParam('order',GetReq('order') ) : GetSessionParam('order');	
	   $pager = GetReq('pager') ? SetSessionParam('pager',GetReq('pager')) : GetSessionParam('pager');		   	   
	   $a = localize('_title',getlocal());
	   $b = localize('_axia',getlocal());
	   $c = localize('_code',getlocal());	   
	   $data = array(1=>$a,2=>$b,3=>$c);
	   if ($this->deforder)
	     $do = 3;
	   else
	     $do = 1;	 
	   $selected_order = GetReq('order')?GetReq('order'):(GetSessionParam('order') ? GetSessionParam('order') : $do);
	   $combo_char = $this->make_combo(seturl('t='.$cmd.'&cat='.$cat.'&order=#'),$data,null,$selected_order,$style);
	   	      	   		   
	   //asc/desc
	   $a = localize('_asc',getlocal());
	   $b = localize('_desc',getlocal());
	   $data = array(1=>$a,2=>$b);
	   if ($this->defasc<0)
	     $da = 2;
	   else
	     $da = 1;	 
	   $selected_asc = GetReq('asc')?GetReq('asc') : (GetSessionParam('asc') ? GetSessionParam('asc') : $do);   
	   $combo_asceding = $this->make_combo(seturl('t='.$cmd.'&cat='.$cat.'&asc=#'),$data,null,$selected_asc,$style);
	   
	   //pager
	   $max = $this->max_selection;
	   
       $data2 = array();  	
	   for ($i=1;$i<4;$i++) {
	      $n = ($this->default_pager * $i);
          $data2[$n] = localize('_array',getlocal()).' '.$n;
       }		  
	   $combo_pager = $this->make_combo(seturl('t='.$cmd.'&cat='.$cat.'&pager=#'),$data2,null,$this->pager,$style);
	   	  		   
	   //template	   
	   $template_file='fpsort.htm';	   
	   $tfile = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template_file) ; 	
       
		$contents = file_get_contents($tfile);	 	   	   		 	      
	    $out = $this->combine_template($contents,localize('_order',getlocal()),$combo_char,$combo_asceding,$combo_pager);	     
	   
	   return ($out);	      
	}		
	
	//override
	function list_katalog($imageclick=null,$cmd=null,$template=null,$no_additional_info=null,$external_read=null,$photosize=null,$resources=null,$nopager=null,$nolinemax=null,$originfunction=null) {
	   $cmd = $cmd?$cmd:'klist';
	   $lan = getlocal();
	   $itmname = $lan?'itmname':'itmfname';
	   $itmdescr = $lan?'itmdescr':'itmfdescr';
	   $pz = $photosize?$photosize:1;		   
	   $xdist = $this->imagex?$this->imagex:100;
	   $ydist = $this->imagey?$this->imagey:null;//free y 75;	
       $cat = GetReq('cat');   
	   $custom_template=false;
	   $page = GetReq('page') ? GetReq('page') : 0;

	   $mylinemax = ($nolinemax) ? null : $this->linemax;   
	   $myimageclick = ($this->imageclick>0) ? 1 : $imageclick;
  
       if (($template) && (!stristr($template,'searchres'))) { /*custom template list*/
	     //echo $template;
		 $custom_template=true;
	     $tmpl = explode('.',$template);
	     $mytemplate = $this->select_template($tmpl[0],$cat);		
	   }
	   elseif (($template) && (stristr($template,'searchres'))) { /*search list*/
	     $tmpl = explode('.',$template);
		 //search template
	     $mytemplate = $this->select_template($tmpl[0],$cat);		
	     //list-table search alternative template
	     $mytemplate_alt = $this->select_template($tmpl[0].'-alt',$cat);	   
	   }
	   else { /*katalog list*/
	     //default template
	     $mytemplate = $this->select_template('fpkatalog',$cat);		
	     //list-table alternative template
	     $mytemplate_alt = $this->select_template('fpkatalog-alt',$cat);
	   }
       
       if ($this->oneitemlist) {
	     if (!$this->result->sql) { //AUTOMATED...when sql exist by prev query dont read a new
		   $is_one_item = $this->read_list(); //read records
	       if ($is_one_item) { 
	         //echo $is_one_item,'>';
		     $this->read_item(null,$is_one_item);
		     $out = $this->show_item();
		     return ($out);
	       }		   
		 }
		 elseif (!$external_read) { //event read the list..if not called by a phpdac page call
		   if ($itemcode = $this->my_one_item) {
	         //echo $this->my_one_item,'>';
		     $this->read_item(null,$itemcode);
		     $out = $this->show_item();
		     return ($out);		   
		   }	   
		 }		 
       } 	      
	   	
	   if (!empty($this->result)) {		   

		$pp = $this->read_policy();

		$records = $this->result;  
        $item_code = $this->getmapf('code');			
	
	    foreach ($this->result as $n=>$rec) {
		
		   $mem = memory_get_peak_usage(true);//memory_get_usage();
	   
           //$cat = $this->getkategories($rec);
		   $cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
		   $ucat = $cat;
		   
		   if ($rec[$pp]>0)  
		     $price = $this->spt($rec[$pp]); 
		   else 	 
		     $price = $this->zeroprice_msg;		
		 
			 if (defined("SHCART_DPC")) {
				$cart_code  = $rec[$this->getmapf('code')];
				$cart_title = $this->replace_cartchars($rec[$itmname]);
				$cart_group = $cat;
				$cart_page  = $page;
				$cart_descr = $this->replace_cartchars($rec[$itmdescr]);
				$cart_photo = $rec[$this->getmapf('code')];//$this->get_photo_url($rec[$this->getmapf('code')],$pz);
				$cart_price = $price;
				$cart_qty   = 1;//???				 
				$cart = GetGlobal('controller')->calldpc_method("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;+$cat+$cart_page",1);//'cart';
				$array_cart = $this->read_array_policy($rec[$item_code],$price,"$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty");	   
				$in_cart = GetGlobal('controller')->calldpc_method("shcart.getCartItemQty use ".$rec[$item_code]);
			 }	
			 else
                $cart = null;  			 
		   
		     $availability = $this->show_availability($rec['ypoloipo1']);	
		     $details = null;//seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code].'#DETAILS',$this->details_button,null,null,null,$this->rewrite);	   
             $detailink = null;//seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code].'#DETAILS',$this->details_button,null,null,null,$this->rewrite);		   
		     $itemlink = seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],null,null,null,null,$this->rewrite);
		     $itemlinkname = seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],$rec[$itmname],null,null,null,$this->rewrite);		   
		   		   
		  											 
		      $tokens[] = $itemlinkname;//$rec[$itmname];
			  $tokens[] = $rec[$itmdescr];
			  $tokens[] = $this->list_photo($rec[$item_code],$xdist,$ydist,$myimageclick,$ucat,$pz,null,$rec[$itmname]);
			  $units = $rec['uniname2'] ? 
			           localize($rec['uniname1'],getlocal()) .'/'. localize($rec['uniname2'],getlocal()):
					   localize($rec['uniname1'],getlocal());  
			  $tokens[] = $units;		  
			  
			  $tokens[] = $rec['itmremark'];
			  $tokens[] = number_format(floatval($price),$this->decimals,',','.');
			  $tokens[] = $cart;
			  $tokens[] = $availability;
			  $tokens[] = $details;
			  $tokens[] = $detailink;
			  $tokens[] = $rec[$item_code];
			  $tokens[] = $itemlink;	
			  
			  $tokens[] = $in_cart?$in_cart:'0';
			  $tokens[] = $array_cart;

              $tokens[] = $this->get_photo_url($rec[$item_code],$pz);	
              $tokens[] = $rec[$this->getmapf('lastprice')];	
              $tokens[] = $rec[$itmname]; 
			  
			  /*if (GetReq('id') || GetReq('cat') || ($originfunction))
			     $tokens[] = $this->get_xml_links(null,null,$originfunction);			  
			  else*/
                 $tokens[] = null;   

              $tokens[] = $this->item_has_discount($rec[$item_code]);
              $tokens[] = "addcart/$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty/$cat/$cart_page/";				  
		      
			  if (!$custom_template) {
                $items_grid[] = $this->combine_tokens($mytemplate, $tokens, true);//<<exec after tokens replace
                $items_list[] = $this->combine_tokens($mytemplate_alt, $tokens, true);//<<exec after tokens replace			  
			  }
			  else
			    $items_custom[] = $this->combine_tokens($mytemplate, $tokens, true);//<<exec after tokens replace
				
			  unset($tokens);			  	 				   	   	   	
		  }//foreach 
		  
		  if (!$custom_template) { 
            if (($mytemplate) && ($mytemplate_alt)) 	
              $toprint .= $this->make_table_list($items_grid, $items_list, 'fpkatalogtable', 'fpkataloglist');			
	        else
           	  $toprint .= $this->make_table($items, $mylinemax, 'fpkatalogtable');	  
			  
	        $toprint .= $this->show_paging($cmd,$mytemplate,$nopager);		  
		  }	
          else //custom template
		    $toprint .= (!empty($items_custom)) ? implode('',$items_custom) : null;
             		  
	   }//empty result


	   $out .= $toprint . $mem_msg;

	   return ($out);	
	}	
	
	//override
    function list_katalog_table($linemax=2,$imgx=null,$imgy=null,$imageclick=0,$showasc=0,$cmd=null,$template=null,$no_additional_info=null,$lang=null,$external_read=null,$photosize=null,$resources=null,$nopager=null,$originfunction=null,$notable=null) {
	   $cmd = $cmd?$cmd:'klist';	
	   $page = GetReq('page')?GetReq('page'):0;			   
	   $lan = $lang?$lang:getlocal();
	   $itmname = $lan?'itmname':'itmfname';
	   $itmdescr = $lan?'itmdescr':'itmfdescr';	   
	   $pz = $photosize?$photosize:1;
	   $xdist = ($imgx?$imgx:160);
	   $ydist = ($imgy?$imgy:120);
	   $cat = GetReq('cat');
	   $page = GetReq('page') ? GetReq('page') : 0;

	   if (remote_paramload('SHKATALOG','imageclick',$this->path)>0)
	     $myimageclick = 1;
	   else	 
	     $myimageclick = $imageclick;	   
	   
	   $mytemplate = $this->select_template($template,$cat,1);
	   
       if ($this->oneitemlist) {
	     if (!$this->result->sql) { //AUTOMATED...when sql exist by prev query dont read a new
		   $is_one_item = $this->read_list(); //read records
	       if ($is_one_item) { 
		     $this->read_item(null,$is_one_item);
		     $out = $this->show_item();
		     return ($out);
	       }		   
		 }
		 elseif (!$external_read) { //event read the list..if not called by a phpdac page call
		   if ($itemcode = $this->my_one_item) {
		     $this->read_item(null,$itemcode);
		     $out = $this->show_item();
		     return ($out);		   
		   }
		 }		 
       } 		   

	   if (!empty($this->result)) {
	   
        $pp = $this->read_policy();			
	
	    foreach ($this->result as $n=>$rec) {
		
		   $mem = memory_get_peak_usage(true);//memory_get_usage();
		   $item_code = $this->getmapf('code');
           //$cat = $this->getkategories($rec);	
		   $cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
		   $ucat = $cat;
		
		   if ($rec[$pp]>0) 
		     $price = $this->spt($rec[$pp]);	
		   else 	 
		     $price = $this->zeroprice_msg;
		   		   
			 if (defined("SHCART_DPC")) {
				$cart_qty   = 1;
				$cart_code  = $rec[$item_code];
				$cart_title = $this->replace_cartchars($rec[$itmname]);
				$cart_group = $cat;
				$cart_page  = $page;
				$cart_descr = $this->replace_cartchars($rec[$itmdescr]);
				$cart_photo = $rec[$item_code];//$this->get_photo_url($rec[$this->getmapf('code')],$pz);
				$cart_price = $price;				 
				$icon_cart  = GetGlobal('controller')->calldpc_method("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;+$cat+$cart_page",1);//'cart';
				$array_cart = $this->read_array_policy($rec[$item_code],$price,"$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty");	   
				$in_cart = GetGlobal('controller')->calldpc_method("shcart.getCartItemQty use ".$rec[$item_code]);
			 }	
			 else	
			    $icon_cart = null;
		   
		   $availability = $this->show_availability($rec['ypoloipo1']);		
		   $details = null;//seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code].'#DETAILS',$this->details_button,null,null,null,$this->rewrite);	   
           $detailink = null;//eturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code].'#DETAILS',$this->details_button,null,null,null,$this->rewrite);		   
		   $itemlink = seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],null,null,null,null,$this->rewrite);
		   $itemlinkname = seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],$rec[$itmname],null,null,null,$this->rewrite);			   
		   
		   
             //// tokens method												 
		     $tokens[] = $itemlinkname;//$rec[$itmname];
			 $tokens[] = $rec[$itmdescr];
			 $tokens[] = $this->list_photo($rec[$item_code],$xdist,$ydist,$myimageclick,$ucat,$pz,null,$rec[$itmname]);
			 $units = $rec['uniname2'] ? 
			          localize($rec['uniname1'],getlocal()).'/'.localize($rec['uniname2'],getlocal()) :
					  localize($rec['uniname1'],getlocal());  
			 $tokens[] = $units;// . $incart;			 
			 
			 $tokens[] = $rec['itmremark']; 
			 $tokens[] = number_format(floatval($price),$this->decimals,',','.');
			 $tokens[] = $icon_cart;
			 $tokens[] = $availability;
			 $tokens[] = $details;
			 $tokens[] = $detailink;
			 $tokens[] = $rec[$item_code];
			 $tokens[] = $itemlink;			
			 
			 $tokens[] = $in_cart ? $in_cart : '0';
			 $tokens[] = $array_cart;
			 
			 $tokens[] = $this->get_photo_url($rec[$item_code],$pz);
			 $tokens[] = $rec[$this->getmapf('lastprice')];
			 $tokens[] = $rec[$itmname]; 
			 
			 /*if (GetReq('id') || GetReq('cat') || ($originfunction))
			    $tokens[] = $this->get_xml_links(null,null,$originfunction);			  
			 else*/
                $tokens[] = null; 	

             $tokens[] = $this->item_has_discount($rec[$item_code]);
             $tokens[] = "addcart/$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty/$cat/$cart_page/";				 
			 			 	 
			 $items[] = $this->combine_tokens($mytemplate, $tokens, true);	
			 unset($tokens);													 
		   
		}//foreach	
	   
		if ($notable) {/*single product view called by phpdac funcs*/
		    $nt = (!empty($items)) ? implode('',$items) : null;
		    return ($nt);
		}	
		//else	
	    //make table			
		$ret .= $this->make_table($items, $linemax, 'fpkatalogtable');  	  
	      				
		if ($this->pager) 
		  $ret .= $this->show_paging($cmd,$mytemplate,$nopager);					
		
	   }
   	
	   if ((count($this->result)>0) && ($no_additional_info==null))   
	     $ret .= $this->show_availabillity_table(null,1);	   
   
	
	   return ($ret);	
    } 
	
	//overrided
	function show_item($template=null,$no_additional_info=null,$lang=null,$lnktype=1,$pcat=null,$boff=null,$tax=null) {
	   $lan = $lang?$lang:getlocal();
	   $itmname = $lan?'itmname':'itmfname';
	   $itmdescr = $lan?'itmdescr':'itmfdescr';
	   $page = GetReq('page')?GetReq('page'):0;	
	   $cat = $pcat?$pcat:GetReq('cat'); 	   	   
	   $id = GetReq('id');
	   $mytemplate = $this->select_template('fpitem',$cat);	 
	   if (count($this->result->fields)>1) {	
	   
		$pp = $this->read_policy();	   
		$item_code = $this->getmapf('code');
	   
		foreach ($this->result as $n=>$rec) {
			
           //$cat = $this->getkategories($rec);					 
		   $cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
		   
		   if ($rec[$pp]>0) 
		     $price = $this->spt($rec[$pp],$tax);
		   else 	 
		     $price = $this->zeroprice_msg;	
			 
		   //if ((GetGlobal('UserID')) || (seclevel('SHKATALOG_CART',$this->userLevelID))) {//logged in or sec ok
		     $cart_code = $rec[$item_code];
			 $cart_title = $this->replace_cartchars($rec[$itmname]);
			 $cart_group = $cat;
			 $cart_page = GetReq('page')?GetReq('page'):0;
			 $cart_descr = $this->replace_cartchars($rec[$itmdescr]);
			 $cart_photo = $rec[$item_code];//$this->get_photo_url($rec[$this->getmapf('code')],1);
			 $cart_price = $price;
			 $cart_qty = 1;//???
			 if (defined("SHCART_DPC")) {
				$in_cart = GetGlobal('controller')->calldpc_method("shcart.getCartItemQty use ".$rec[$item_code]); 
				$icon_cart = GetGlobal('controller')->calldpc_method("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;+$cat+$cart_page",1);//'cart';
				$array_cart = $this->read_array_policy($rec[$item_code],$price,"$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty");	   
				
			    $units = $rec['uniname2'] ? localize($rec['uniname1'],$lan).'/'.localize($rec['uniname2'],$lan):
				   						    localize($rec['uniname1'],$lan); 
                $lastprice = $this->getmapf('lastprice');											
			 }	
			 else
                $icon_cart = null;	
			
			 $itemlink = seturl('t=kshow&cat='.$cat.'&page='.$page.'&id='.$rec[$item_code],null,null,null,null,$this->rewrite); 
		     $availability = $this->show_availability($rec['ypoloipo1']);	 
		     $detailink = seturl("t=kshow&cat=$cat&page=$page&id=".$rec[$item_code],null,null,null,null,$this->rewrite).'#details';//,$this->details_button);		   
			 
	         $linkphoto = $this->list_photo($rec[$item_code],null,null,$lnktype,$cat,2,3,$rec[$itmname]);	

             $ahtml = $this->show_aditional_html_files($rec[$item_code]);			 
             $atext = "";//$this->show_aditional_txt_files($rec[$item_code]);				 		 		   			  
			 $afile = "";//$this->show_aditional_files($rec[$item_code],1,$rec[$itmname]);			 
			 $details = "";//$ahtml . $atext . $afile;
		 		   
             //// tokens method												 
		     $tokens[] = $rec[$itmname];
			 $tokens[] = $rec[$itmdescr];
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
			 
			 $tokens[] = $this->get_xml_links();
             $tokens[] = $this->item_has_discount($rec[$item_code]);
             $tokens[] = "addcart/$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty/$cat/$cart_page/";			 
			 
			 $tokens[] = $rec['code1'];
			 $tokens[] = $rec['code4'];
			 $tokens[] = $rec['resources']; //id=30
			 $tokens[] = $rec['ypoloipo1'];
			 $tokens[] = $rec['manufacturer'];	
			 
			 //print_r($tokens);
			 $out = $this->combine_tokens($mytemplate, $tokens, true);
			 
             $this->ogTags = $this->openGraphTags(array(0=>$this->siteTitle,
			                                            1=>$tokens[0],
														2=>$tokens[1],														
														3=>$this->httpurl .'/'. $itemlink,
														4=>$this->httpurl . $tokens[19],
												       )
												  );
			 
			 unset($tokens);	 
			 
		}//foreach	   
	   }//if recs
	   else {
		  if ($this->itemlockparam) 
		    $out = ($goto = $this->itemlockgoto) ? GetGlobal('controller')->calldpc_method($goto) : localize('_lockrec',getlocal());
		  else 
		    $out = localize('_norec',getlocal());
	   }	  	  	   
  	   
	   return ($out);	
	}		
	

    //overrided
	function show_aditional_files($id,$nojs=null,$altname=null,$tmpl=null) {
	     if (!$id) return;
	     $cat = GetReq('cat');
		 $title = $altname ? $altname : $id;
	     //$cat = $cat ? $cat : GetGlobal('controller')->calldpc_var('shtags.tagcat');
		 //$id = $id ? $id : GetGlobal('controller')->calldpc_var('shtags.tagitem');
		 $name = $id;
		 //if ($this->encodeimageid) //check inside func
		 $id = $this->encode_image_id($id); 
		 
	     $addfx = $this->addfx?$this->addfx:100;
	     $addfy = $this->addfy?$this->addfy:null;//free y size //75;	
	     $this->allow_show_resource = true; //enable it after show main item image		
	
	     $template= $tmpl ? $tmpl : 'fpitemaddfiles.htm';	   
	     $t = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template) ; 
		 $mytemplate = @file_get_contents($t);   	
         
         $slide_index = 1; //start at 1, 1=main image 		 
		 //multiple images
		 for($i='A';$i<='Z';$i++) {
		 
           $slide_index+=1;		 
		   
		   foreach ($this->advrestype as $restype) { 
		   //work with uphoto path only......
		   	   
		   $ad_photo_big = $this->imgpath .  $id . $i . $restype;
		   $aditional_pic_file = $this->urlpath .'/'. $this->imgpath . $id . $i . $restype;

		   if (file_exists($aditional_pic_file)) {//echo $aditional_pic_file,'<br/>';

			 switch ($restype) {
                
				default    : $addtional_photo_link = seturl('t=kshow&cat='.GetReq('cat').'&id='.GetReq('id').'&thub='.$i.'#photo');
			                 $plink = "<A href=\"$addtional_photo_link\">";				  
			 
			                 $lo = "<img src=\"" . $ad_photo_big . "\"";
							 $lo.= "border=\"0\" alt=\"". localize('_IMAGE',getlocal()) . "\">" . "</A>"; 
			                 $adnphoto = $plink . $lo;
			 
			                 $remarks = 'PHOTO';			 
                             $items[] =  $this->combine_template($mytemplate,$id.$i,'',$adnphoto,$remarks,$slide_index,$ad_photo_big,($slide_index-1));

			 
			 }//switch
			 			      			   
			 break;   
		   }//file exists
		   }//foreach	 
		 }//for		 
		 
	     $itemscount = count($items); 
		 if (($itemscount>0) && ($this->additional_files_perline>1))	 {
		   $out = $this->make_table($items, $this->additional_files_perline, 'fptreetable');	   
		 }
		 else 
		   $out = (!empty($items)) ? implode('',$items) : null; //without table template 

		 return ($out);		 
	}
	
	//overrwriiten
	function show_aditional_html_files($id) {	
         $db = GetGlobal('db');	
	     $lan = getlocal();
		 $slan =  ($this->one_attachment) ? $slan : ($lan ? $lan : '0'); 
		 
	     $code = $this->getmapf('code');	  
         $sSQL = "select data from pattachments ";
	     $sSQL .= " WHERE (type='.html' or type='.htm') and code='" . $id . "'";
	     if (isset($slan))
	       $sSQL .= " and lan=" . $slan;	
	  
	     $resultset = $db->Execute($sSQL,2);	
		 $ret = $resultset->fields['data'];   
		 
		 return ($ret);  		 
	}	
	
	
	function show_p($p,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';				
		$pz = $photosize?$photosize:1;	
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;		
	                                                                             
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE ";	
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $p." >0 and ".$p." IS NOT NULL and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->orderid}";
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",$itmname {$this->sortdef} " : "$itmname {$this->sortdef} ");
		$sSQL .= $items ? " LIMIT " . $items: null;			
	    //echo $sSQL,'<br>';
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_p use $p,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_p use $p,$items");
		  
		return ($out);	
	}		
	
	function show_pcat($p,$category=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';
		$mycat = $category ? $category : GetReq('cat');	   
		$cat = explode($this->cseparator,$mycat);			
		$pz = $photosize?$photosize:1;	
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;		
	                                                                             
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE ";	
		
		foreach ($cat as $i=>$c) {
		  $myc = $this->replace_spchars($c,1);		
		  $sSQL .= " cat{$i}='$myc' and ";	
		}  
		//only items inside category ..when category param not specified
	    if ((!$category) && ($this->onlyincategory)) {
		  $ii = $i+1;
		  $sSQL .= " (cat{$ii} IS NULL or cat{$ii}='') and ";		
		}  		
		
		if (($selected_item = GetReq('id')) && (!$xor)) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  
		//MULTIPLE CHECKS  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if ($selected_cat0 = $fields['cat0']) 
		  $sSQL .= "cat0 not like '" . $selected_cat0 . "' and ";		  
		  	
		if ($selected_cat1 = $fields['cat1']) 
		  $sSQL .= "cat1 not like '" . $selected_cat1 . "' and ";		 
		  		  
		if ($selected_cat2 = $fields['cat2']) 
		  $sSQL .= "cat2 not like '" . $selected_cat2 . "' and ";
		  
		if ($selected_cat3 = $fields['cat3']) 
		  $sSQL .= "cat3 not like '" . $selected_cat3 . "' and ";		
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $p." >0 and ".$p." IS NOT NULL and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->orderid} ";
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",$itmname {$this->sortdef} " : "$itmname {$this->sortdef} ");		
		$sSQL .= $items ? " LIMIT " . $items : null;			
	    //echo $sSQL,'<br>';
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_pcat use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_pcat use $p,$category,$items");
		  
		return ($out);	
	}

	function show_orderid($ascdesc=null,$category=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';
		$mycat = $category?$category:GetReq('cat');	//auto browse current cat	   
		$cat = explode($this->cseparator,$mycat);			
		$pz = $photosize?$photosize:1;	
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;		
	                                                                                //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE ";	
		
		foreach ($cat as $i=>$c) {
		  $myc = $this->replace_spchars($c,1);		
		  $sSQL .= " cat{$i}='$myc' and ";	
		}  
		//only items inside category ..when category param not specified
	    if ((!$category) && ($this->onlyincategory)) {
		  $ii = $i+1;
		  $sSQL .= " (cat{$ii} IS NULL or cat{$ii}='') and ";		
		}  		
		
		if (($selected_item = GetReq('id')) && (!$xor)) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  
		//MULTIPLE CHECKS  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if ($selected_cat0 = $fields['cat0']) 
		  $sSQL .= "cat0 not like '" . $selected_cat0 . "' and ";		  
		  	
		if ($selected_cat1 = $fields['cat1']) 
		  $sSQL .= "cat1 not like '" . $selected_cat1 . "' and ";		 
		  		  
		if ($selected_cat2 = $fields['cat2']) 
		  $sSQL .= "cat2 not like '" . $selected_cat2 . "' and ";
		  
		if ($selected_cat3 = $fields['cat3']) 
		  $sSQL .= "cat3 not like '" . $selected_cat3 . "' and ";		
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= "orderid >0 and orderid IS NOT NULL and itmactive>0 and active>0";	
		$mysort = $ascdesc ? ($ascdesc=='ASC'?'ASC':'DESC') : $this->sortdef; 
		$sSQL .= " ORDER BY orderid ";// $mysort ";//!!!!!=MUST ASC (=DEFAULT WHEN NOT WRITTEN )
		$sSQL .= $this->bypass_order_list ? null : ",$itmname $mysort ";//MUST DESC		
		$sSQL .= $items ? " LIMIT " . $items : null;			
	    //echo $sSQL,'<br>';
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_pcat use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_pcat use $p,$category,$items");
		  
		return ($out);	
	}	
	
	function show_orderidis($orderid=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';
		$mycat = $category?$category:GetReq('cat');	//auto browse current cat	   
		$cat = explode($this->cseparator,$mycat);			
		$pz = $photosize?$photosize:1;	
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;		
	                                                                                //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE ";		
			
		$sSQL .= "orderid = $orderid and orderid IS NOT NULL and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY orderid ";
		$sSQL .= $this->bypass_order_list ? null : ",$itmname {$this->sortdef} ";		
		$sSQL .= $items ? " LIMIT " . $items : null;			
	    //echo $sSQL,'<br>';
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_pcat use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_pcat use $p,$category,$items");
		  
		return ($out);	
	}	
	
	function show_resources($contition,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$ofield=null,$desc=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';				
		$pz = $photosize?$photosize:1;	
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;	
        $ordfield = $ofield ? $ofield : $itmname;
        $ascd = $desc ? "desc" : "asc"; 		
	                                                                                //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE ";	
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $contition."='".$this->toggler[1]."' and itmactive>0 and active>0";	
		//$sSQL .= " ORDER BY $itmname asc ";
		$sSQL .= " ORDER BY " . $ordfield . " ".  $ascd;
		$sSQL .= $items ? " LIMIT " . $items : null;			
	    //echo $sSQL,'<br>';
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null; //free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_resources use $contition,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,1,1,1,"shkatalogmedia.show_resources use $contition,$items");
		  
		return ($out);	
	}			
	 
	 
	function show_group($group,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';		
	    $date2check = time() - ($days * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);		
		$pz = $photosize?$photosize:1;	
        $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;				
	                                                                                //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE ";	
		 
		$sSQL .= $this->getmapf('code') . " in (" . $group .")";  //coma sep codes
		  		
		$sSQL .= " and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->orderid}";			
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",$itmname {$this->sortdef} " : "$itmname {$this->sortdef} ");
		$sSQL .= $items ? " LIMIT " . $items : null;		 
	    //echo $sSQL;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;//free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_special use $contition,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,null,$external_read,$pz,1,1,1,"shkatalogmedia.show_special use $contition,$items");
		  
		return ($out);	
	}	 
	 
	//override
	function show_special($contition,$items=10,$days=12,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';		
	    $date2check = time() - ($days * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);		
		$pz = $photosize?$photosize:1;	
        $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;				
	                                                                                //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE ";	
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $contition."='".$this->toggler[1]."' and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->orderid}";			
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",$itmname {$this->sortdef} " : "$itmname {$this->sortdef} ");
		$sSQL .= $items ? " LIMIT " . $items : null;		 
	    //echo $sSQL;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;//free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_special use $contition,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,null,$external_read,$pz,1,1,1,"shkatalogmedia.show_special use $contition,$items");
		  
		return ($out);	
	}	
	
	function show_special_online($field2check,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$key=null) {
        $db = GetGlobal('db');
		$dbbuffer = GetGlobal('_sqlbuffer');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';
		$pz = $photosize?$photosize:1;						
		$p = null;
        $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;			
		$table2check = 'products';
		$fields = $this->result->fields;				
		//print_r($fields);
		//echo $key,'>';
		
		if  ($p = GetReq($field2check)) {
	
		    $mode = 'uri';
	    } 
		elseif (($p = $fields[$field2check]) || (!empty($dbbuffer))) {//current query exist..default selection...querydepth = 0
		  
		    $mode = 'query'; //already executed query			  
		}
		else {
		  if ($key) {//default mode for origin function...	
		    $mode = null; 	// default 
		    $p = str_replace('_SLASH_','/',str_replace('_COMMA_',',',str_replace('_AMP_','&',$key))); //get data from origin func		
		  }
		  else {
		    //echo '>>>>>>>',$field2check,':',$p,':',$mode,'>>>>>>';
		    return;		
		  } 
		}
	    //echo '>>>>>>>',$field2check,':',$p,':',$mode,'>>>>>>';				
	                                                                                //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE (";	
		
		switch ($mode) {

		  case 'query':	//print_r($dbbuffer);
	                    $rbuf = array_reverse($dbbuffer);		  						
						//print_r($rbuf);
						$myselect = explode('products',$sSQL);	
						$a = trim($myselect[0]);	  
                        foreach ($rbuf as $bfid=>$bfdata) { 
			              $bfsql = explode('products',$bfdata['query']);//exclude where ..we want only select fields to be the same
						  $b = trim($bfsql[0]);
						  //echo '<br>',$bfid,'<br>',$b,':<br>',$a;						  
				          //if ($myselect[0]==$bfsql[0]) {//check identical queries
						  if (strcmp($a,$b)==0) {//check identical queries
                            //echo '<pre>';print_r($rbuf);echo '</pre>';						  
				            //echo '<br>TRUE<br>',$bfid,$bfdata['query'],'<br>',$myselect[0],'>>>>';
					        //override p val 
							//print_r($bfdata);
				            $p = $bfdata['data'][$field2check]; 
							$sp = str_replace('/','_SLASH_',str_replace(',','_COMMA_',str_replace('&','_AMP_',$p)));//url rewrite error '/'
                            $key = urlencode($sp);	//holds data pass as func origin arg								
							break;
				          }	
			            }						
						//$p = $rbuf[0]->data->$field2check;
		                $sSQL .= $field2check . "="  .(is_numeric($p)?$p:"'".$p."'"); 
		                break;
						
		  case 'uri'  :	$sSQL .= $field2check . "="  .(is_numeric($p)?$p:"'".$p."'");	  
		                break;	
		  
		  default     : $sSQL .= $field2check . "="  .(is_numeric($p)?$p:"'".$p."'");//arg special 
		                break;						
		} 
		
		//if ($advsql = $this->sql_search_relative_titles($fields[$itmdescr],'cat2'))
		  //$sSQL .= ' or ' . $this->getmapf('code') . ' in (' . $advsql . ')';		  		
		
		$sSQL .= ") and itmactive>0 and active>0";
		 	
		if ($selected_item = GetReq('id')) 
		  $sSQL .= " and " . $this->getmapf('code') . " not like '" . $selected_item . "'";
		  
		//MULTIPLE CHECKS  
		//if ($selected_cat = $fields['cat2']) 
		 // $sSQL .= " and " . "cat2 not like '" . $selected_cat . "'";		  		
		$sSQL .= " ORDER BY {$this->orderid}";
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",$itmname {$this->sortdef} " : "$itmname {$this->sortdef} ");		
		$sSQL .= $items ? " LIMIT " . $items : null;		
        //echo $mode;		
	    //echo '???',$sSQL,'---<hr>',$p;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;//free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,0,1,"shkatalogmedia.show_special_online use $field2check,$items,null,null,null,0,null,null,null,null,$key");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,0,1,1,"shkatalogmedia.show_special_online use $field2check,$items,null,null,null,0,null,null,null,null,$key");
		  		  
		return ($out);	
	}			
	
	//alias
	function show_relatives($key,$field2check=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
	
      $ret = show_special_online($field2check,$items,$linemax,$imgx,$imgy,$imageclick,$template,$ainfo,$external_read,$photosize,$key);	
	  return ($ret);
	}
	
	//??? NOT USED ????
	function sql_search_relative_titles($mastertitle,$field2check) {
        $db = GetGlobal('db');	
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';
		$remarks = 'itmremark';	
		$sqlout = null;		
	
	    $mt = explode(' ',trim($mastertitle));
        //print_r($mt);
        $sSQL = "select ".$this->getmapf('code')." from products where "; //whole words...
		  		
	    foreach ($mt as $i=>$lex) {
		
		  if (($la = trim($lex)) && (strlen($la)>4))  {//words max than 4 chars
		
		  $ulex = strtoupper($lex);
		  $dlex = strtolower($lex);
          
		  $sqlout[$lex] = "$itmname like '%$lex%' ";// or $itmdescr like '%$lex%' or $remarks like '%$lex%'";// or "; //as is
		  //$sSQL .= "$itmname like '% $ulex %' or $itmdescr like '% $ulex %' or $remarks like '% $ulex %' or "; //upper case		
		  //$sSQL .= "$itmname like '% $dlex %' or $itmdescr like '% $dlex %' or $remarks like '% $dlex %'"; //lower case		
		  
		  }//if lex
		} 
		
        //print_r($sqlout);  
		if ($sqlout) {
		  $sSQL .= implode(' or ',$sqlout);		  
		  return ($sSQL);
		}
		else
		  return null;
	} 
	
	function show_relative_sales($id,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
	   $myid = $id?$id:GetReq('id');
       $db = GetGlobal('db');		
	   $lan = $lang?$lang:getlocal();
	   $itmname = $lan?'itmname':'itmfname';
	   $itmdescr = $lan?'itmdescr':'itmfdescr';		
	   //$date2check = time() - ($days * 24 * 60 * 60);
	   //$entrydate = date('Y-m-d',$date2check);		
	   $pz = $photosize?$photosize:1;	  
       $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;		    
	
       if ( (defined('SHTRANSACTIONS_DPC')) && (seclevel('SHTRANSACTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {

	     $itemslist = GetGlobal('controller')->calldpc_method('shtransactions.getRelativeSales use '.$items.'+'.$myid);
	     //print_r($itemslist); //echo 'z';
		 
		 if (!empty($itemslist)) {
		 
           $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	               "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				   $this->getmapf('code') .
				   $lastprice .
				   " from products ";
		   $sSQL .= " WHERE (";	
		
		   foreach ($itemslist as $i=>$code)
		     $preSQL[] = $this->getmapf('code') . " = '" . $code ."'";
			 
		   $sSQL .= implode(' or ',$preSQL);
		  		
		   $sSQL .= ") and itmactive>0 and active>0";	
		   $sSQL .= " ORDER BY {$this->orderid} ";			
		   $sSQL .= $this->bypass_order_list ? null : 
		            ($this->orderid ? ",$itmname {$this->sortdef} " : "$itmname {$this->sortdef} ");		
		   $sSQL .= $items ? " LIMIT " . $items : null;
	       //echo $sSQL;
		
	       $resultset = $db->Execute($sSQL,2);	
		   $this->result = $resultset;
		
		   $xmax = $imgx?$imgx:100;
		   $ymax = $imgy?$imgy:null;//free y 75;		
		
		   if ($linemax>1)
		     $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_relative_sales use $myid,$items");
		   else  	
             $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,1,1,"shkatalogmedia.show_relative_sales use $myid,$items");
		 }	 		 		 
	   }
	   return ($out);  
	}
	
	//override
	function show_kategory_items($category=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$xor=null) {
        $db = GetGlobal('db');
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';			
		$mycat = $category?$category:GetReq('cat');	//auto browse current cat	   
		$cat = explode($this->cseparator,$mycat);		
		$pz = $photosize?$photosize:1;
        $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;			
				
		//auto browse current cat
		$fields = $this->result->fields; //prev query exclude cat		
	    //echo 'z'; print_r($fields);                                                                            //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,".
				$this->getmapf('code').
				$lastprice.
				" from products ";
		$sSQL .= " WHERE ";	
		foreach ($cat as $i=>$c) {
		  $myc = $this->replace_spchars($c,1);		
		  $sSQL .= " cat{$i}='$myc' and ";	
		}  
		//only items inside category ..when category param not specified
	    if ((!$category) && ($this->onlyincategory)) {
		  $ii = $i+1;
		  $sSQL .= " (cat{$ii} IS NULL or cat{$ii}='') and ";		
		}  		
		
		if (($selected_item = GetReq('id')) && (!$xor)) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  
		//MULTIPLE CHECKS  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		if ($selected_cat0 = $fields['cat0']) 
		  $sSQL .= "cat0 not like '" . $selected_cat0 . "' and ";		  
		  	
		if ($selected_cat1 = $fields['cat1']) 
		  $sSQL .= "cat1 not like '" . $selected_cat1 . "' and ";		 
		  		  
		if ($selected_cat2 = $fields['cat2']) 
		  $sSQL .= "cat2 not like '" . $selected_cat2 . "' and ";
		  
		if ($selected_cat3 = $fields['cat3']) 
		  $sSQL .= "cat3 not like '" . $selected_cat3 . "' and ";
		  		  		  
		  
		$sSQL .= "itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->orderid}";	
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",$itmname {$this->sortdef} " : "$itmname {$this->sortdef} ");		
		$sSQL .= $items ? " LIMIT " . $items : null;			
	    //echo $sSQL;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;//free y 75;	
		
		if ($linemax>1) 
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_kategory_items use $category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,1,1,"shkatalogmedia.show_kategory_items use $category,$items"); 
		  
		return ($out);	
	}		
	
	//for sitemap call
	function show_sitemap_items($category=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$xor=null) {
        $db = GetGlobal('db');
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';			
		$mycat = $category?$category:GetReq('cat');	//auto browse current cat	   
		$cat = explode($this->cseparator,$mycat);		
		$pz = $photosize?$photosize:1;
        $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;			
				
		//auto browse current cat
		$fields = $this->result->fields; //prev query exclude cat		
	    //echo 'z'; print_r($fields);                                                                            //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,".
				$this->getmapf('code').
				$lastprice.
				" from products ";
		$sSQL .= " WHERE ";		  		  
		$sSQL .= "itmactive>0 and active>0";	
		$sSQL .= " ORDER BY sysupd DESC LIMIT 2000";// . $items;	//<<<<<<		
	    //echo $sSQL;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;//free y 75;	
		
		if ($linemax>1) 
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_kategory_items use $category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,1,1,"shkatalogmedia.show_kategory_items use $category,$items"); 
		  
		return ($out);	
	}		
	
	function show_sitemap($template=null) {
       $db = GetGlobal('db');
	   //$lan = GetReq('lan')>=0?GetReq('lan'):getlocal();	//in case of post sitemap set lan param uri   
	   $lan = getlocal() ? getlocal() : '0';
	   $itmname = $lan?'itmname':'itmfname';
	   $itmdescr = $lan?'itmdescr':'itmfdescr';	 
	   $start = GetReq('start');
	   $headcat = GetReq('headcat')?GetReq('headcat'):"";	   
	   $meter = $start?$start-1:0;  
	   
	   return null; //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< DISABLED

       $mytemplate = $template ? $this->select_template($template) : null;	   
	   
	   	
       $sSQL = "select id,itmname,itmfname,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,".$this->getmapf('code')." from products ";
	   $sSQL .= " WHERE ";
	   $sSQL .= "itmactive>0 and active>0";	
	   //$sSQL .= " GROUP BY cat0,$itmname";
	   $sSQL .= " ORDER BY cat0,cat1,cat2,cat3,cat4,$itmname asc ";
	   $sSQL .= $start ? " LIMIT $start,10000" : " LIMIT 10000";			
	   //echo $sSQL;
		
	   $resultset = $db->Execute($sSQL,2);	
	   $result = $resultset;
		   
	   if (!empty($result)) {		   
	    
		if ($headcat)//next page start with headcat
  	      $out = '<h2>' . $this->replace_spchars($headcat,1) . '</h2><hr/>';
	
	    foreach ($result as $n=>$rec) {
		
		   //memory limit prevention
		   //echo 'mem limit 33554432:',memory_get_peak_usage(true);//memory_get_usage();
		   
		   /*$mem = memory_get_peak_usage(true);//memory_get_usage();
		   if ($mem>16000000) {
		     $np = $meter-1;
		     $nextpage = "<br><h2><a href='sitemap.php?start=$np&headcat=$headcat'> Next Page</a></h2>";
		     $out .= $nextpage;//'<br><h2>WARNING:Memory allocation failed, reduce page view limit!</h2>';
		     break;
		   }*/
		   //echo 'z';
		   if (!empty($rec)) {
		   
		     $meter+=1;
             $cat = $this->getkategories($rec,1,$lan,'klist');		 
             //$linkcat = $this->getkategories($rec,null);	
			 $linkcat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
			 		   
			 if (strtolower($headcat)!=strtolower($cat)) {//paging start
			   $headcat = $cat;
			   //echo $headcat;
			   if (strstr($headcat,'</a>'.$this->cseparator.'<a')) //link
			     $ret .= '<h2>' . str_replace('</a>'.$this->cseparator.'<a','</a>'.$this->rightarrow.'<a', $this->replace_spchars($headcat,1)) . '</h2><hr>';
			   else			   
			     $ret .= '<h2>' . str_replace($this->cseparator,$this->rightarrow,$this->replace_spchars($headcat,1)) . '</h2><hr>';
			 }
			 $title = $rec[$this->getmapf('code')] . "&nbsp;" . $rec[$itmname] /*. "&nbsp;" . $rec[$itmdescr] . "&nbsp;" .  $rec[$itmremark]*/;
			 
		     $itemlinkname = seturl('t=kshow&cat='.$linkcat.'&id='.$rec[$this->getmapf('code')],$title,null,null,null,$this->rewrite );		   
			 
			 if ($mytemplate) {
			    $tokens = array(); //reset 
				$tokens[] = $meter; 
				$tokens[] = $itemlinkname; 
				$tokens[] = $rec[$this->getmapf('code')];
				$tokens[] = $rec[$itmname];
                $ret .= $this->combine_tokens($mytemplate, $tokens);			 
			 }
			 else
			    $ret .= $meter . "&nbsp;" . $itemlinkname . "<br/>";	
		     //$ret .= "<hr>";		   
		   }
		 }
		 
		 if (($mytemplate) && (stristr($mytemplate,'<SPLIT/>')) && ($this->linemax)) {
		    $items = explode('<SPLIT/>',$ret); //<li> split..
			$out .= $this->make_table($items, $this->linemax, 'fpkatalogtable'); 
		 }
		 else
		    $out .= $ret;
	   }   
	   
       //feed links
       //$ret .= $this->get_xml_links(null,null,'shkatalogmedia.show_sitemap_items');		   
	   
	   return ($ret);		   		   	
	}
	
	function read_item_attr($item=null,$attr=null,$islink=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';				
		$pz = $photosize?$photosize:1;	
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;	
		
		if (!$item) 
		  $item = GetReq('id');	
		  //$item = GetGlobal('controller')->calldpc_var('shtags.tagitem');
		
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,volume,".
			    $this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE ";
		$sSQL .= $this->getmapf('code') . "= '" . $item ."'";
		//echo $sSQL;
	    $resultset = $db->Execute($sSQL,2);	
		$result = $resultset;
		//print_r($result);
	    foreach ($result as $n=>$rec) {
		  if ($islink) {
		    //$cat = $this->getkategories($rec);
			//$ucat = $cat;//urlencode($cat);
			$ucat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
		  	$itemlink = seturl('t=kshow&cat='.$ucat.'&id='.$rec[$this->getmapf('code')],$rec[$attr]);
			return ($itemlink);
		  }
		  else
		    return ($rec[$attr]);	
		}  									
	}
	
	function read_item_weight($itemsarray=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';				
		$pz = $photosize?$photosize:1;	
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;
		
		if (!$itemsarray) return;		
	                                                                                //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,volume,".
			    $this->getmapf('code').
				$lastprice .
				" from products ";
		$sSQL .= " WHERE ";	
		
        if (strstr($itemsarray,';')) {
		
		  $items = explode(';',$itemsarray);
		
		  foreach ($items as $code)
		    $tempSQL[] = $this->getmapf('code') . "= '" . $code ."'";
			
		  $sSQL .= implode(' OR ',$tempSQL);	
		} 
		else //one item
		  $sSQL .= $this->getmapf('code') . "= '" . $itemsarray ."'";
		  		
		
	    //echo $sSQL,'<br>';
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;//free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1);
		elseif ($linemax==1)  	
          $out = $this->list_katalog(null,null,$template,$ainfo,null,$external_read,$pz,1,null,$linemax);
		else {//return val
		  
		   foreach ($this->result as $n=>$rec) {
		     $out[$rec[$this->getmapf('code')]] = floatval($rec['weight']);
		   }
           //print_r($out);
		}  
		
		return ($out);	
	}		
	
	//override
	function show_last_viewed_items($items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null,$notable=null) {
        $db = GetGlobal('db');
        $UserName = GetGlobal('UserName');			
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';				
		
		$c = $category?$category:GetReq('cat');	//auto browse current cat
		//$c = $category ? $category : GetGlobal('controller')->calldpc_var('shtags.tagcat'); 
		
		$cat = explode($this->cseparator,$c);		
	    $date2check = time() - ($days * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);		
		$pz = $photosize?$photosize:1;
		$resources = 1;
			
		
        $sSQL = "select products.id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4,".
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,volume,".$this->getmapf('code').
				",stats.id,stats.tid from products, stats ";
		$sSQL .= " WHERE stats.tid=products.".$this->getmapf('code')." and products.itmactive>0 and products.active>0";				
		
		if ($UserName)
		  $sSQL .= " and (attr2='" . decode($UserName) . "' or attr2='". session_id() . "')";
		else  
		  $sSQL .= " and attr2='" . session_id() . "'";
		  
		$sSQL .= " GROUP BY stats.tid ORDER BY stats.id DESC limit " . $items;
		
		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		//print_r($resultset);
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;// free y 75;		
		
		//echo $nopager,'>',$photosize;

		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$resources,$nopager,null,$notable);
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$resources,$nopager,1);
		  
		return ($out);				
	}	
	
	/*session mode due to big stats*/
	function show_last_viewed_items_session($items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null,$notable=null) {
        $db = GetGlobal('db');
        $UserName = GetGlobal('UserName');			
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';				
		
		$c = $category?$category:GetReq('cat');	//auto browse current cat
		//$c = $category ? $category : GetGlobal('controller')->calldpc_var('shtags.tagcat'); 
		
		$cat = explode($this->cseparator,$c);		
	    $date2check = time() - ($days * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);		
		$pz = $photosize?$photosize:1;
		$resources = 1;

        $lastviewed = unserialize(GetSessionParam('lastvieweditems')); 
		if (!empty($lastviewed)) {	
			$ilist = implode("','",array_reverse($lastviewed));
		
			$sSQL = "select products.id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4,".
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,volume,".$this->getmapf('code').
				" from products";
			$sSQL .= " WHERE " . $this->getmapf('code')." in ('". $ilist ."') and itmactive>0 and active>0";				

			//echo $sSQL;	
			$resultset = $db->Execute($sSQL,2);	
			//print_r($resultset);
			$this->result = $resultset;
		
			$xmax = $imgx?$imgx:100;
			$ymax = $imgy?$imgy:null;// free y 75;		
		
			//echo $nopager,'>',$photosize;

			if ($linemax>1)
				$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$resources,$nopager,null,$notable);
			else  	
				$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$resources,$nopager,1);
		}
		
		return ($out);				
	}		
	
	//override
	function show_offers($items=10,$cat=null,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null,$notable=null) {
        $db = GetGlobal('db');
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';				
		
	    //$date2check = time() - ($days * 24 * 60 * 60);
	    //$entrydate = date('Y-m-d',$date2check);
		$pz = $photosize?$photosize:1;			
	                                                                                //,date1
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,".$this->getmapf('code')." from products ";
		$sSQL .= " WHERE ";	
		//echo $cat;
		if ($cat) {
		  $c = explode($this->cseparator, $this->replace_spchars($cat,1)); //print_r($cat);
		  foreach ($c as $cc=>$category)
			$sSQL .= "cat".$cc."='" . $category . "' and ";
	    }
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $this->getmapf('offer')."='".$this->toggler[1]."' and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY ". "{$this->orderid}";			
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",$itmname {$this->sortdef} " : "$itmname {$this->sortdef} ");		
		$sSQL .= $items ? " LIMIT " . $items : null;			
	    //echo $sSQL;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;// free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$resources,$nopager,null,$notable);
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$nopager,$linemax);
		  
		return ($out);	
	}	
		
	
    function katalog_feed($read_all=false, $off_categories=false, $off_items=false) {
      $db = GetGlobal('db');
	  $lan = getlocal();	  
	  $itmname = $lan?'itmname':'itmfname';
	  $itmdescr = $lan?'itmdescr':'itmfdescr';	  
      $format = GetReq('format')?GetReq('format'):'rss2';	
      //echo '>',$format;	
	  $code = $this->getmapf('code');
      $i=0;	  
	  $isutf8 = (stristr($this->encoding, 'utf8')) ? true : false;
	  //echo $isutf8,'>';
	  if ($read_all)
	    $this->read_all_items();

      $xml = new pxml();
      $xml->encoding = $this->encoding;	//must be utf8 not utf-8
	  //echo $this->encoding;
		  
      $this->xml_formater($xml,$format,1);	  

	  //categories  
	  if (!$off_categories) {
	  
      $ddir = $this->read_tree(GetReq('cat'),null,1);
	  
	  if (!empty($ddir)) {
	        foreach ($ddir as $g=>$lan_g) {
			
			       $cat = GetReq('cat');
				   $c = $cat ? $cat.$this->cseparator.$g : $g;
				   $cat_url = 'http://' . $this->url . '/' . seturl('t=klist&cat='. $c ,null,null,null,null,$this->rewrite);
			
		           $p[] = $g;
			       $p[] = $lan_g;//$isutf8 ? $lan_g : iconv($this->encoding, "UTF-8", $lan_g);
                   $p[] = $cat_url;			   
			       $p[] = $cat;//urlencode($cat);//GetReq('cat');//$cat;
			       $p[] = $lan_g;//$isutf8 ? $lan_g : iconv($this->encoding, "UTF-8", $lan_g);
			       $p[] = null;
			       $p[] = null;
				   $p[] = null;
				   $p[] = null;
				   $p[] = null;
				   $p[] = null;
				   $p[] = null;	
                   $p[] = null; 				   
				   
			       $this->xml_formater($xml,$format,null,$p);
				   unset($p);	//holds record data to pass it at xml formater				  	 
			 
			       $i+=1;
            }				   
	  }
	  }//off
	  
	  //items  
	  if (!$off_items) {
	  if (!empty($this->result)) {		  	
		
	    foreach ($this->result as $n=>$rec) {
			  
					//$cat = $this->getkategories($rec); //GetReq('cat')..no category in url..			  
					$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   

                   $price = number_format(floatval($price1),2);					 
			       //echo $price,'>';
				      			      		   
				   $item_url = 'http://' . $this->url . '/' . seturl('t=kshow&cat='.$cat.'&id='.$rec[$code],null,null,null,null,$this->rewrite);
                   if ($this->photodb)
				     $item_photo_url = 'http://' . $this->url . '/showphoto.php?id='.$rec[$code].'&type=LARGE';
				   else
				     $item_photo_url = 'http://' . $this->url . '/' . $this->img_large . '/' . $rec[$code] . $this->restype;
				   
				   
		           $p[] = $rec[$code];
			       $p[] = $rec[$itmname];
                   $p[] = $item_url;			   
			       $p[] = $cat;
			       $p[] = $rec[$itmdescr];
			       $p[] = $item_photo_url;
			       $p[] = $price;
				   $p[] = $rec['cat0'];
				   $p[] = $rec['cat1'];
				   $p[] = $rec['cat2'];
				   $p[] = $rec['cat3'];
				   $p[] = $rec['cat4'];	
                   $p[] = $rec['itmremark'];
				   
			       $this->xml_formater($xml,$format,null,$p);
				   unset($p);	//holds record data to pass it at xml formater				  	 
			 
			       $i+=1;	
			  
		}
	  } //else echo '--';
	  }//off

	  $data = $xml->getxml(1);
	  
	  return($data);	  
    }	
	
    function sitemap_feed($read_all=false) {
	  $db = GetGlobal('db');
      $i=0;	  
      $format = 'sitemap';	
	  $code = $this->getmapf('code');	  
	  $isutf8 = (stristr($this->encoding, 'utf-8')) ? true : false;
	  //echo $isutf8,'>';
	  //if ($read_all)
	    //$this->read_all_items();
       $sSQL = "select id,sysupd,cat0,cat1,cat2,cat3,cat4,".$code." from products ";
	   $sSQL .= " WHERE ";
	   $sSQL .= "itmactive>0 and active>0 ";	

	   $sSQL .= " ORDER BY id,sysupd DESC LIMIT 6000";// . $items;			
	   //echo $sSQL;
		
	   $resultset = $db->Execute($sSQL,2);			

      $xml = new pxml();
      $xml->encoding = $this->encoding;	
		  
      $this->xml_formater($xml,$format,1);	  
	  //echo 'z';
	  
	  //items  
	  if (!empty($resultset)) {		  	

	    foreach ($resultset as $n=>$rec) {
			//echo $n,'<br/>';  
			//$cat = $this->getkategories($rec);	      			      		   
			$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
			$item_url = 'http://' . $this->url . '/' . seturl('t=kshow&cat='.$cat.'&id='.$rec[$code],null,null,null,null,$this->rewrite);

		    $p[] = $item_url;
			//in case of 0000-00-00..is null
			$p[] = (substr($rec['sysupd'],0,1)!='0') ? array_shift(explode(' ',$rec['sysupd'])) : null;		   

			$this->xml_formater($xml,$format,null,$p);
			unset($p);	//holds record data to pass it at xml formater				  	 
			 
			$i+=1;	
            //if ($i==1111) break; //stop to test			
		}
	  } 

	  $data = $xml->getxml(1);
	  return($data);	  
    }		

	function xml_formater(& $xml,$format=null,$init=null,$params=null,$encoding=null) {
	
	      $date = date(DATE_RFC822);//'m-d-Y');
		  $cat_title = $this->getcurrentkategory();//iconv($this->encoding, "UTF-8", $this->getcurrentkategory());
	      $lan_descr = getlocal() ? 'gr' : 'en';
	   
	      if ($init) {
		  
		     if ($this->encoding)
			   $enc = $this->encoding;
			 else
			   $enc = $xml->charset;

             switch ($format) {
			   case 'sitemap' : $enc ='utf8';
			                    $xml->addtag('urlset',null,null,"xmlns=http://www.sitemaps.org/schemas/sitemap/0.9");							
                                break; 			   
	           case 'skroutz' : $enc ='utf8';
			                    $xml->addtag('skroutzstore',null,null,"url=$this->url|name=$xml->urltitle|encoding=$enc");							
	                            $xml->addtag('products','skroutzstore',null,null);
								break;
			   case 'rss1'    : echo 'rss1';
	   					        break; 								
			   case 'rss2'    : $enc ='utf-8';
			                    $xml->addtag('rss',null,null,"version=2.0");							
	                            $xml->addtag('channel','rss',$xml->urltitle,null);
	                            $xml->addtag('title','channel',$xml->urltitle.', '.$cat_title,null);								
	                            $xml->addtag('link','channel','http://' . $this->url,null);									
	                            $xml->addtag('description','channel',$xml->urltitle.', '.$cat_title,null);									
	                            $xml->addtag('language','channel',$lan_descr,null);									
	                            $xml->addtag('pubDate','channel',$date,null);									
	                            $xml->addtag('lastBuildDate','channel',$date,null);	
	                            $xml->addtag('docs','channel',null,null);																	
	                            $xml->addtag('generator','channel','stereobit.networlds PHPDAC 2.1',null);									
	                            $xml->addtag('managingEditor','channel',$xml->urltitle,null);									
	                            $xml->addtag('webMaster','channel',null,null);									
	                            $xml->addtag('ttl','channel','15',null);									
	   					        break; 
			   case 'atom'    : $enc ='utf-8';
			                    $xml->addtag('feed',null,null,"xmlns=http//www.w3.org/2005/Atom");							
	                            $xml->addtag('title','feed',$xml->urltitle,null);
	                            $xml->addtag('subtitle','feed',null,null);								
	                            $xml->addtag('link','feed','/',"href=http://".$this->url."/atom/|rel=self");									
	                            $xml->addtag('link','feed','/',"href=http://".$this->url);									
	                            $xml->addtag('id','feed',null,null);									
	                            $xml->addtag('updated','feed',null,null);									
	                            $xml->addtag('author','feed',$xml->urltitle,null);	
	                            $xml->addtag('name','author',$xml->urltitle,null);																	
	                            $xml->addtag('email','author',null,null);									
	   					        break; 								
               default        : $xml->addtag('default-xml',null,null,"url=$this->url|name=$xml->urltitle|encoding=$enc");							
	                            $xml->addtag('products','default-xml',null,null);
												
		     }		  
		     return 1;
		  }
		  else {
             //product loop xml tags 		  
             switch ($format) {
			   case 'sitemap' : 
			   $xml->addtag('url','urlset',null,null);
			   
               //$xml->addtag('name','url',$xml->cdata($params[1]),null); 
			   $xml->addtag('loc','url',$params[0],null); 
			   if ($params[1]) //in case of 0000-00-00..is null
				$xml->addtag('lastmod','url',$params[1],null);  			   
			   $xml->addtag('changefreq','url','daily',null); 
			   $xml->addtag('priority','url','0.5',null);
			   break;
			 
	           case 'skroutz' : 
			   $cats = explode($this->cseparator,$params[3]);	
			   $manufacturer = $this->replace_spchars(array_shift($cats),1);
			   $category = $this->replace_spchars($params[3],1);
			   $category = str_replace($this->cseparator,'/',$category);
	           $xf = ($this->itemfimagex?$this->itemfimagex:640);
	           $yf = ($this->itemfimagey?$this->itemfimagey:480);	
	           $xt = ($this->imagex?$this->imagex:160);
	           $yt = ($this->imagey?$this->imagey:120);				   		   
			   	  
               $xml->addtag('product','products',null,"id=".$params[0]);
			   
               $xml->addtag('name','product',$xml->cdata($params[1]),null);  //cdata val
               $xml->addtag('link','product',$params[2],null);  //http://... val
               $xml->addtag('price_with_vat','product',$params[6],null);  //price 11.11
               $xml->addtag('category','product',$xml->cdata($category),"id=".$params[3]); //cdata val = descr, id=code
               $xml->addtag('image','product',$params[5],"width=$xf|height=$yf");  //http://... image
               $xml->addtag('thumbnail','product',$params[5],"width=$xt|height=$yt");  //http://... thumbnail
               $xml->addtag('manufacturer','product',$xml->cdata($manufacturer),null);  //cdata val
               $xml->addtag('shipping','product',null,"type=accurate|currency=euro");  //ship cost 11.11
               $xml->addtag('sku','product','/',null);  //...
               $xml->addtag('ssku','product','/',null);  //...
               $xml->addtag('description','product',$xml->cdata($params[4]),null);  //cdata val		  
		       break;
			   case 'rss1'    : //echo 'rss1';
	   		   break; 								
			   case 'rss2'    : //echo 'rss2';
	           $xml->addtag('item','channel',null,null);				   
			   
               $xml->addtag('title','item',$xml->cdata($params[1]),null);				   
               $xml->addtag('link','item',$params[2],null);
               $xml->addtag('description','item',$xml->cdata($params[4]),null);				   			   				   			   
			   $xml->addtag('author','item',$xml->urltitle,null);
			   $xml->addtag('category','item',$xml->cdata($params[3]),null);
			   $xml->addtag('comments','item',$xml->cdata(strip_tags($params[12])),null);
               $xml->addtag('pubDate','item',$date,null);				   			   
               $xml->addtag('guid','item',$params[0],null);			   
	           break; 
			   case 'atom'    : //echo 'atom';
	           $xml->addtag('entry','feed',null,null);				   
			   
               $xml->addtag('title','entry',$params[1],null);				   
               $xml->addtag('link','entry',$params[2],null);
               $xml->addtag('id','entry',$params[0],null);				   			   				   			   
               $xml->addtag('updated','entry',$date,null);				   			   
               $xml->addtag('summary','entry',$params[4],null);				   
	   		   break; 
			   default ://seo links
               $xml->addtag('product','products',null,"id=");
			   
               $xml->addtag('name','product',$xml->cdata('name'),null);  //cdata val
               $xml->addtag('link','product',null,null);  //http://... val
               $xml->addtag('price_with_vat','product',null,null);  //price 11.11
               $xml->addtag('category','product',$xml->cdata('category'),"id=\"\""); //cdata val = descr, id=code
               $xml->addtag('image','product',null,"width=|height=");  //http://... image
               $xml->addtag('thumbnail','product',null,"width=|height=");  //http://... thumbnail
               $xml->addtag('manufacturer','product',$xml->cdata('manufacturer'),null);  //cdata val
               $xml->addtag('shipping','product',null,"type=|currency=");  //ship cost 11.11
               $xml->addtag('description','product',$xml->cdata('description'),null);  //cdata val		  			   
			 }
			 //dump xml  
			 //echo '<pre>';
			 //$xml->dumpxml();
			 //print_r($xml->index);
			 //echo '</pre>';
			 
		     return 1;
		  }
		  
		  return 0;
	}	

	function get_xml_links($mylan=null,$feed_id=null,$dpcfeed=null) {
	  $lan = $mylan?$mylan:getlocal();//by hand per htm 0,1 page
	  $lnk = array();
	  $id = GetReq('id');
	  $cat = GetReq('cat'); //echo $cat;
	  $page = GetReq('page')?GetReq('page'):'0';
	  $feed_cmd = $feed_id ? $feed_id : 'feed';	  
	  //echo $this->feed_on,'>';
	  //$dpcfeed = $dpcfeed?$dpcfeed:'shkatalogmedia.show_p use p3,999';//special phpdac page without params
	  
	  $mytemplate = $this->select_template('xml-links');
	  
      //RSS	
	  if (stristr($this->feed_on,'rss')) {
        if ($dpcfeed) //special phpdac page without params			  
		  $lnk['RSS'] = seturl("t=$feed_cmd&dpc=$dpcfeed&format=rss2",null,null,null,null,$this->rewrite);  
	    elseif ($id)
	      $lnk['RSS'] = seturl("t=$feed_cmd&cat=$cat&page=$page&id=$id&format=rss2",null,null,null,null,$this->rewrite);
	    elseif ($cat)
	      $lnk['RSS'] = seturl("t=$feed_cmd&cat=$cat&page=$page&format=rss2",null,null,null,null,$this->rewrite); 
		else  
		  $lnk['RSS'] = seturl("t=$feed_cmd&format=rss2",null,null,null,null,$this->rewrite); 
	  }
	  //ATOM
	  if (stristr($this->feed_on,'atom')) {	  
        if ($dpcfeed) //special phpdac page without params		  
		  $lnk['ATOM'] = seturl("t=$feed_cmd&dpc=$dpcfeed&format=atom",null,null,null,null,$this->rewrite);//special phpdac page without params		  
	    elseif ($id)
	      $lnk['ATOM'] = seturl("t=$feed_cmd&cat=$cat&page=$page&id=$id&format=atom",null,null,null,null,$this->rewrite);
	    elseif ($cat)
	      $lnk['ATOM'] = seturl("t=$feed_cmd&cat=$cat&page=$page&format=atom",null,null,null,null,$this->rewrite);	  
		else  
		  $lnk['ATOM'] = seturl("t=$feed_cmd&format=atom",null,null,null,null,$this->rewrite);	  
	  }	
	  //print_r($lnk);	

	  if (!empty($lnk)) {
	    foreach ($lnk as $t=>$w) {
	      //echo $w,$t,'<br>';	    
		  if ($w) {
		    $icon_file = $this->urlpath.'/'.$this->infolder.'/images/'.strtolower($t).'.png';
			//echo $icon_file,'>';
		    if (is_readable($icon_file)) 
				$mylink = "<img src=\"". $this->infolder.'/images/'.strtolower($t).'.png' ."\" border=\"0\" alt=\"$t\">";
			else 
				$mylink = $t;
			  
			if ($mytemplate)
				$tokens[] = "<A href=\"$w\">".$mylink."</A>";
            else				
	            $ret .= "<A href=\"$w\">".$mylink."</A>&nbsp;";
		  }	
		  //echo $ret,'<br>';
	    }
		
	    if (!empty($tokens))
			$out = $this->combine_tokens($mytemplate, $tokens);
	    else 
			$out = "<hr/>" . $ret;		
	  }

	  return ($out);  
	}	
	
    //read dir for rss page
	function read_all_items() {
       $db = GetGlobal('db');
	   $lan = GetReq('lan')>=0?GetReq('lan'):getlocal();	//in case of post sitemap set lan param uri   
	   $itmname = $lan?'itmname':'itmfname';
	   $itmdescr = $lan?'itmdescr':'itmfdescr';	 
	   $start = GetReq('start');
	   $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;	
	   	
       $sSQL2 = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code') . $lastprice . ",weight,volume,dimensions,size,color,manufacturer from products ";		
       $sSQL = "select id,itmname,itmfname,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,".$this->getmapf('code')." from products ";
	   $sSQL .= " WHERE ";
	   $sSQL .= "itmactive>0 and active>0 ";	
	   //$sSQL .= " GROUP BY cat0,$itmname";
	   $sSQL .= " ORDER BY cat0,cat1,cat2,cat3,cat4,$itmname asc ";
	   $sSQL .= $start ? " LIMIT $start,10000" : " LIMIT 10000";			
	   //echo $sSQL;
		
	   $resultset = $db->Execute($sSQL,2);	
	   // $result = $resultset;
	   $this->result = $resultset; 
 	   $this->max_items = $db->Affected_Rows();//count($this->result);	   
       return (null);//$this->max_items);		   
	}
	
	/* rcxml feed */
	protected function xml_feed() {
		$db = GetGlobal('db');
		$lan = getlocal();	  
		$itmname = $lan?'itmname':'itmfname';
		$itmdescr = $lan?'itmdescr':'itmfdescr';	  
		$format = GetReq('format') ? GetReq('format') : 'sitemap';		
		$code = $this->getmapf('code');	

		if (!defined('RCXMLFEEDS_DPC')) return 'RCXMLFEEDS DPC not loaded'; //dpc cmds needed
		$sf = _v('rcxmlfeeds.select_fields'); //remote_arrayload('RCXMLFEEDS','selectfields',$this->path); 
		$sp = _v('rcxmlfeeds.savepath'); //$this->urlpath . remote_paramload('RCXMLFEEDS','savepath',$this->path);
	    if (($format) && (is_readable($sp .'/'. $format.'.xht'))) {
	        $xmltemplate = @file_get_contents($sp .'/'. $format.'.xht');
			$xmltemplate_products = @file_get_contents($sp .'/'. $format.'.xhm');
			//echo '>SEE:',$xmltemplate_products;
		}
        else
            return false;		
		
		$imgxmlPath = _v('rcxmlfeeds.imgpath'); 
		$tokens = array();
		$items = array();		
		foreach ($this->result as $n=>$rec) {	
		    $tokens = array(); //reset 
			foreach ($sf as $i=>$f) {
				//$recarray[$f] = $rec[$f];
				$tokens[] = $rec[$f];
			} 
		    $id = $rec[$code];	
			$cat = $rec['cat0'] ? $rec['cat0'] : null;
			$cat .= $rec['cat1'] ? $this->cseparator.$rec['cat1'] : null;
			$cat .= $rec['cat2'] ? $this->cseparator.$rec['cat2'] : null;
			$cat .= $rec['cat3'] ? $this->cseparator.$rec['cat3'] : null;
			$cat .= $rec['cat4'] ? $this->cseparator.$rec['cat4'] : null;
			
			$_cat = _m('cmsrt.replace_spchars use '.$cat);//str_replace(' ','_', $cat);
	
			$tokens[] = 'http://' . $this->url . '/' . seturl('t=kshow&cat='.$_cat.'&id='.$id,null,null,null,null,1);
			$tokens[] = 'http://' . $this->url . '/' . $imgxmlPath . $id . $this->restype;
			$tokens[] = $cat;
			//if ($n==0) print_r($tokens);
			$items[] = $this->combine_tokens($xmltemplate_products, $tokens, true);					
		}
		
		//print_r($items);
		$tt = array();
		$tt[] = date('Y-m-d h:m'); 
		$tt[] = implode("", $items);
		$ret = $this->combine_tokens($xmltemplate, $tt, true);
		unset($tt);
		return ($ret);		
	}	
	
	function show_last_edited_items($items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$photosize=null,$nopager=null) {	
	     $limit = $items ? $items : 5;
         $db = GetGlobal('db');	
	     $lan = getlocal();
         $db = GetGlobal('db');		
		 $pz = $photosize?$photosize:1;		
		 $lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;	
		 
		 if ($this->one_attachment)
		   $slan = null;
		 else
		   $slan = $lan ? $lan : '0';
		 
	     $code = $this->getmapf('code');	  
		 
         $sSQL = "select code from pattachments ";
	     $sSQL .= " WHERE (type='.html' or type='.htm')";
	     if (isset($slan))
	       $sSQL .= " and lan=" . $slan;
		 $sSQL .= " ORDER BY id desc ";	
         $sSQL .= $items ? " LIMIT " . $items : null;		 
	     //echo $sSQL;
	  
	     $resultset = $db->Execute($sSQL,2);	
	     $result = $resultset;
	     //print_r($result);	
	     if ($exist = $db->Affected_Rows()) {
		   //echo 'sql';
		   $ret = $result->fields['data'];
		 }	
		 
         $sSQL2 = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
				$this->getmapf('code') . $lastprice . ",weight,volume,dimensions,size,color,manufacturer from products ";
		 $sSQL2 .= " WHERE ";
         foreach ($result as $n=>$rec) {
		    $or[] = $this->getmapf('code') ."='". $rec['code'] ."'";
         }
         $sSQL2 .= '(' . implode(' or ',$or) . ')'; 
		 $sSQL2 .= " and (itmactive>0 and active>0)";
		 $sSQL2 .= " ORDER BY " . $this->getmapf('code') . " desc LIMIT " . $items;			 
         //echo $sSQL2;
		 
	     $resultset = $db->Execute($sSQL2,2);	
		 $this->result = $resultset;		 
		 
		 if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$nopager);
		 else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$nopager,$linemax);
		  
		 return ($out);			 
	}	
	
	function item_var($field=null,$code=null, $photosize=null, $array=null) {	
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan ? 'itmname' : 'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';				
		$pz = $photosize?$photosize:1;	
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;		
		
		$itemcode = $code ? $code : GetReq('id');
	    $retfield = $field ? $field : $itmname;	                       
						   
        $sSQL = "select id,sysins,code1,pricepc,price2,sysupd,$itmname,uniname1,uniname2,active,code4," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,$itmdescr,itmremark,ypoloipo1,resources,weight,volume,dimensions,size,color,".
				$this->getmapf('code') . $lastprice . ",weight,volume,dimensions,size,color,manufacturer from products ";
		$sSQL .= " WHERE " . $this->getmapf('code') . "='" . $itemcode ."'";	
		
	    $resultset = $db->Execute($sSQL,2);	
		
		if (($retfield=='sysins') || ($retfield=='sysupd'))
			$ret = date("d-m-Y", strtotime($resultset->fields[$retfield]));
		else
			$ret = $resultset->fields[$retfield];
		
        $out = ($array) ? $resultset->fields : $ret;
		return ($out);	
	}	

	//select price type..overriten error when no cart
	function spt($price,$tax=null) {
      //echo $tax;
	  
	  if ($tax) {
        $p = $this->pricewithtax($price,$tax);	  
	  }
	  elseif ($this->is_reseller) {
	    $p = $price;
	  }	
	  elseif ((defined('SHCART_DPC')) && 
	         (GetGlobal('controller')->calldpc_var('shcart.showtaxretail'))) {//retal handl
	    $p = $this->pricewithtax($price,$tax);
	  }
	  else
	    $p = $price;		
	  //echo '>',$p;
	  return ($p);
	}
	
	//override multiple prices based on file array
	function read_array_policy($itemcode=null,$price=null,$cart_details=null,$policyqty=null) {
	  $cat = $pcat?$pcat:GetReq('cat');
	  $cart_page = GetReq('page')?GetReq('page'):0;	  	
	  $file = $this->path . $itemcode . '.txt'; //echo $file;
	  $cartd = explode(';',$cart_details);
	  //echo $file;
	  
	  if (is_readable($file)) {
	
	    $data_array = parse_ini_file($file,1);
	    //print_r($data_array);
		if ($policyqty) {
		  if (is_array($data_array['QTY'])) {
		    foreach ($data_array['QTY'] as $ix=>$ax) {
			  if ($policyqty>=$ax) {
			    //echo $ax,'>';
			    $pc = intval($data_array['PRICE'][$ix]);
			    $retprice = $price?$price+($price*$pc/100):$pc;
				//print_r($data_arra
			  }
			}
			return ($retprice);
		  }
		}
		else {
		  $style = $data_array['style'];
		  $titlesON = $data_array['titles'];
		  $elements = $titlesON?1:0;	
		  $template = $data_array['template']?$data_array['template']:'fpitempolicy';
		  
	      //loop template 
	      $loop_template= $template.".htm";
	      $tpl = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$loop_template) ;
	      if (is_readable($tpl)) {//file temaplate
		  
		    $mylooptemplate = file_get_contents($tpl);
			
			foreach ($data_array['PRICE'] as $ix=>$ax) {
			  $data[] = $data_array['QTY'][$ix];
	 
			  $cartd[8] = $price?$price+($price*$ax/100):$ax;//'22.23';
			  $cartd[9] = intval($data_array['QTY'][$ix]);//prev line //'12';
			  
		      $data[] =	number_format($cartd[8],$this->decimals,',','.');		  
			  
			  $cartout = implode(';',$cartd);
			  $data[] = GetGlobal('controller')->calldpc_method("shcart.showsymbol use $cartout;+$cat+$cart_page+0+".$cartd[9],1);
			  $data[] = $itemcode;
			  $data[] = "addcart/$cartout/$cat/0/";
			 
			  $body .= $this->combine_tokens($mylooptemplate,$data,true);	
			  //echo $body,'>';
			  unset($data);			  
			}		
	      }			  	  
          else { //standart template 
		    if (is_array($data_array['QTY'])) {
			  $percent = intval(100/(count($data_array['QTY'])+$elements)); //echo $percent;	
			  if ($titlesON) {				  
		        $viewdata[] = localize('_QTY',getlocal());//$i;
		        $viewattr[] = "right;$percent%";		  
			  }
		      foreach ($data_array['QTY'] as $ix=>$ax) {
				
		        $viewdata[] = $ax;
		        $viewattr[] = "right;$percent%";
			  } 
	          $myline = new window('',$viewdata,$viewattr);
	          $body = $myline->render($style);
	          unset ($viewdata); unset($viewattr);				 
		    }		
		
		    if (is_array($data_array['PRICE'])) {
			  $percent = intval(100/(count($data_array['PRICE'])+$elements)); //echo $percent;
			  if ($titlesON) {		  
		        $viewdata[] = localize('_PRICE',getlocal());//$i;
		        $viewattr[] = "right;$percent%";		  
			  }
		      foreach ($data_array['PRICE'] as $ix=>$ax) {
			    
			    $cartd[8] = $price?$price+($price*$ax/100):$ax;//'22.23';
				$cartd[9] = intval($data_array['QTY'][$ix]);//prev line //'12';
				//echo $cartd[9],'>';
				$cartout = implode(';',$cartd);
			    $icon_cart = GetGlobal('controller')->calldpc_method("shcart.showsymbol use $cartout;+$cat+$cart_page+0+".$cartd[9],1);

			    $val = number_format($cartd[8],$this->decimals,',','.');

		        $viewdata[] = /*'<del>'.$price.'</del><br/>'.*/$val . $icon_cart;
		        $viewattr[] = "right;$percent%";
			  } 
	          $myline = new window('',$viewdata,$viewattr);
	          $body .= $myline->render($style);
	          unset ($viewdata); unset($viewattr);				 
		    }
		  }//template
        }
		//echo $body;
		return ($body);  
	  }	
	}

	//read policy from item record or lookup
    protected function read_array_policy2($itemcode=null,$price=null,$cart_details=null,$qtyscale=null,$prcscale=null) {
		//$db = GetGlobal('db');	
		$cat = $pcat?$pcat:GetReq('cat');
		$cart_page = GetReq('page')?GetReq('page'):0;	  	
		$cartd = explode(';',$cart_details);
		$body = null;

		$qs = explode(',', $qtyscale); //5,10,15 qty
		$ps = explode(',', $prcscale); //-5.0,-8.0,-12.0 %- percent discount
        if (count($qs)!=count(ps)) return null;		
		
		$template = 'fpitempolicy';
		  
	    //loop template 
	    $loop_template= $template.".htm";
	    $tpl = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$loop_template) ;
		
	    if (is_readable($tpl)) {//file temaplate
		  
		    $mylooptemplate = file_get_contents($tpl);
			
			foreach ($ps as $ix=>$ax) {
			  $data[] = $qs[$ix];
	 
			  $cartd[8] = $price ? $price +($price*$ax/100) : $ax;//'22.23';
			  $cartd[9] = intval($qs[$ix]);//prev line //'12';
			  
		      $data[] =	number_format($cartd[8],$this->decimals,',','.');		  
			  
			  $cartout = implode(';',$cartd);
			  $data[] = GetGlobal('controller')->calldpc_method("shcart.showsymbol use $cartout;+$cat+$cart_page+0+".$cartd[9],1);
			  $data[] = $itemcode;
			  $data[] = "addcart/$cartout/$cat/0/";
			 
			  $body .= $this->combine_tokens($mylooptemplate,$data,true);	
			  //echo $body,'>';
			  unset($data);			  
			}		
	    }

        return ($body); 		
	}
	
	//override
	function show_availability($qty=null) {
		if (!$this->availability) 
			return 0;
		//echo $qty;
		$r_scale = array_reverse($this->availability,1);
		
		foreach ($r_scale as $i=>$s) {
			if (floatval($qty)>=floatval($s)) return ($i+1);
		}
		
		return 0;
	}	
	
	//override
	function show_availabillity_table($title=null,$plaisio=null) {
		return null; //disabled
	}	
	
	public function item_has_discount($id=null) {
		if (!$id) return false;
		$file = $this->path . $id . '.txt';
		
		if (is_readable($file)) 
		    return true;
			
		return false;	
	}
	
	/*two view methods for items */
	protected function make_table_list($items_table=null, $items_list=null, $template_table=null, $template_list=null) {
	    $toprint = null;
		$mytemplate_table = $this->select_template($template_table);
		$mytemplate_list = $this->select_template($template_list);
		$mytemplate_tablelist = $this->select_template('fpkatalog-grid-list');
		$tokens = array();
		
        if ($mytemplate_tablelist) { 
		
			$table_token[] = (!empty($items_table)) ? implode('',$items_table) : null; 
			//echo $table_token[0];
			$tokens[] = $this->combine_tokens($mytemplate_table, $table_token);

			$list_token[] = (!empty($items_list)) ? implode('',$items_list) : null; 
			//echo $list_token[0];
			$tokens[] = $this->combine_tokens($mytemplate_list, $list_token);
            //print_r($tokens);
			$toprint = $this->combine_tokens($mytemplate_tablelist, $tokens);
			//echo $toprint;
			unset ($tokens);
			unset ($table_token);
			unset ($list_token);
		}	
        return ($toprint); 		
    }	

	//FILTERS
	function filter($field=null, $template=null, $incategory=null, $cmd=null, $header=null) {	
		if (!$field) return;
		$baseurl = paramload('SHELL','urlbase') . '/'; //ie compatibility
		
	    $db = GetGlobal('db');		
        $filename = seturl("t=$mycmd");//&a=$a&g=$g");  
	    $lan = getlocal()?getlocal():'0';
		$command = $cmd ? $cmd : 'search';
	  
        //template form
	    $template_file='searchfilter.htm';	   
	    $tfile = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',$lan.'.',$template_file) ; 	
		$contents = @file_get_contents($tfile);	
		
		$tokens = array(); 
		$r = array();	
		
	    $sSQL = "SELECT DISTINCT ".$field.",count(id) from products WHERE ";			
        if ($incategory) {	
		    $cats = explode($this->cseparator, GetReq('cat'));
		    foreach ($cats as $c=>$mycat)
		      $s[] = 'cat'.$c ." ='" . $this->replace_spchars($mycat,1) . "'";		  	  
		}		

		$sSQL .= implode(" AND ", $s);
		$sSQL .= " and itmactive>0 and active>0";
		$sSQL .= " group by " . $field;
		//echo $sSQL;	  
	  
		$result = $db->Execute($sSQL,2); 
	  
		if (!empty($result)) {
			//print_r($result);
			foreach ($result as $n=>$t) {
				//print_r($t); 
				//echo $t[0];
				if (trim($t[0])!='') {
					$tokens[] = $t[0];
					$tokens[] = $t[1];
					$tokens[] = $baseurl . seturl('t='.$command.'&cat='.$this->replace_spchars(GetReq('cat')).'&input='.$this->replace_spchars($t[0]),null,null,null,null,true);
					$tokens[] = ($t[0]==GetReq('input')) ? 'checked="checked"' : null;
					$r[] = $template ? $this->combine_tokens($contents,$tokens) : $rec;	
					unset($tokens);		
                }				
			}	
		    
		}
		
		//header
        if ($header) {		
			$tokens[] = localize('_ALL',getlocal());
			$tokens[] = GetReq('input') ? '*' : $this->max_cat_items; //$this->max_items; //'*';
			$tokens[] = $baseurl . seturl('t=klist&cat='.GetReq('cat'),null,null,null,null,true);
			$tokens[] = (!GetReq('input')) ? 'checked="checked"' : null;
			if ($template) $r[] = $this->combine_tokens($contents,$tokens);
			unset($tokens);
		}			
       
		$x = $template ? '' : '<br/>';
		$ret = (empty($r)) ? null : implode($x,$r);	
		return ($ret);  
	}
	
	//override
	function replace_spchars($string, $reverse=false) {
	
		switch ($this->replacepolicy) {	
	
			case '_' : $ret = $reverse ?  str_replace('_',' ',$string) : str_replace(' ','_',$string); break;
			case '-' : $ret = $reverse ?  str_replace('-',' ',$string) : str_replace(' ','-',$string);break;
			default :	
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
	
	//override
	public function replace_cartchars($string) {
		if (!$string) return null;

		$g1 = array("'",',','"','+','/',' ','-&-');
		$g2 = array('_','~',"*","plus",":",'-','-n-');		
	  
		return str_replace($g1,$g2,$string);
	}
	
	protected function getkategoriesS($categories) {	
		$c = $this->cseparator;
					
		switch ($this->replacepolicy) {
			
			case '_' : $g1 = ' '; $g2 ='_'; break;
			case '-' : $g1 = ' '; $g2 ='-'; break;			
			default :
					$g1 = array("'",',','"','+','/',' ','-&-');
					$g2 = array('_','~',"*","plus",":",'-','-n-');		
		}
		
		if (empty($categories)) return null;
		foreach ($categories as $i=>$cat)
			if ($cat) $xc[] = str_replace($g1,$g2,$cat);
			
		$ret = implode($c, $xc);
		return ($ret);
	}
	
	protected function openGraphTags($tokens=null) {
		if (!$tokens) return null;
		
		//$self = GetGlobal('controller')->calldpc_method('fronthtmlpage.php_self');
		
		$ret = <<<EOF
				
		<meta property="og:site_name" content="$tokens[0]" />		
		<meta property="og:title" content="$tokens[1]" />
		<meta property="og:description" content="$tokens[2]" />
		<meta property="og:type" content="image/jpeg" />
		<meta property="og:url" content="$tokens[3]" />
		<meta property="og:image" content="$tokens[4]" />
EOF;

		$ret .= $this->twitterTags($tokens);
		$ret .= $this->ldTags($tokens);
		
        return $ret;
	}
	
	public function getOGTags() {
		
		return ($this->ogTags);
	}
	
	//The card type, which will be one of summary, summary_large_image, photo, gallery, product, app, or player			
	protected function twitterTags($tokens=null) {
		if (!$tokens) return null;
		
		$twitter = explode('/', $this->siteTwitter); //get last token
		$taddr = '@' . array_pop($twitter);
		
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
	
	protected function ldTags($tokens=null) {
		if (!$tokens) return null;
		
		$kw = GetGlobal('controller')->calldpc_method('shtags.get_page_info use keywords');
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
	
};			  
}
?>