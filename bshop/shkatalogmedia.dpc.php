<?php
$__DPCSEC['SHKATALOGMEDIA_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ( (!defined("SHKATALOGMEDIA_DPC")) && (seclevel('SHKATALOGMEDIA_DPC',decode(GetSessionParam('UserSecID')))) ) {

define("SHKATALOGMEDIA_DPC",true);

$__DPC['SHKATALOGMEDIA_DPC'] = 'shkatalogmedia';

$e = GetGlobal('controller')->require_dpc('shell/pxml.lib.php');
require_once($e);

$__EVENTS['SHKATALOGMEDIA_DPC'][0]='katalog';
$__EVENTS['SHKATALOGMEDIA_DPC'][1]='klist';
$__EVENTS['SHKATALOGMEDIA_DPC'][2]='kshow';
$__EVENTS['SHKATALOGMEDIA_DPC'][3]='knext';
$__EVENTS['SHKATALOGMEDIA_DPC'][4]='kprev';
$__EVENTS['SHKATALOGMEDIA_DPC'][5]='kprint';
$__EVENTS['SHKATALOGMEDIA_DPC'][6]='addtocart';     //continue with ..cart
$__EVENTS['SHKATALOGMEDIA_DPC'][7]='removefromcart';//continue with ..cart
$__EVENTS['SHKATALOGMEDIA_DPC'][8]='searchtopic';   //continue with ..browser
$__EVENTS['SHKATALOGMEDIA_DPC'][9]='lastentries';
$__EVENTS['SHKATALOGMEDIA_DPC'][96]='sitemap';
$__EVENTS['SHKATALOGMEDIA_DPC'][97]='feed';
$__EVENTS['SHKATALOGMEDIA_DPC'][98]='showimage';
$__EVENTS['SHKATALOGMEDIA_DPC'][99]='shkatalogmedia';
$__EVENTS['SHKATALOGMEDIA_DPC'][100]='kfilter';
$__EVENTS['SHKATALOGMEDIA_DPC'][101]='xmlout';

$__ACTIONS['SHKATALOGMEDIA_DPC'][0]='katalog';
$__ACTIONS['SHKATALOGMEDIA_DPC'][1]='klist';
$__ACTIONS['SHKATALOGMEDIA_DPC'][2]='kshow';
$__ACTIONS['SHKATALOGMEDIA_DPC'][3]='knext';
$__ACTIONS['SHKATALOGMEDIA_DPC'][4]='kprev';
$__ACTIONS['SHKATALOGMEDIA_DPC'][5]='kprint';
$__ACTIONS['SHKATALOGMEDIA_DPC'][6]='addtocart';     //continue with ..from cart
$__ACTIONS['SHKATALOGMEDIA_DPC'][7]='removefromcart';//continue with ..from cart
$__ACTIONS['SHKATALOGMEDIA_DPC'][8]='searchtopic';   //continue with ..from browser
$__ACTIONS['SHKATALOGMEDIA_DPC'][9]='lastentries';
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
$__LOCALE['SHKATALOGMEDIA_DPC'][19]='_code;Code;Κωδικός';
$__LOCALE['SHKATALOGMEDIA_DPC'][20]='_descr;Description;Περιγραφή';
$__LOCALE['SHKATALOGMEDIA_DPC'][21]='_axia;Cost;Τιμή';
$__LOCALE['SHKATALOGMEDIA_DPC'][22]='_uniname1;MM;ΜΜ';
$__LOCALE['SHKATALOGMEDIA_DPC'][23]='_order;Order by:;Ταξινόμηση:';
$__LOCALE['SHKATALOGMEDIA_DPC'][24]='_item;Item;Προιόν';
$__LOCALE['SHKATALOGMEDIA_DPC'][25]='_cat1;Detail 1;Χαρακτηριστικό 1';
$__LOCALE['SHKATALOGMEDIA_DPC'][26]='_next;Next;Επόμενο';
$__LOCALE['SHKATALOGMEDIA_DPC'][27]='_prev;Previous;Προηγούμενο';
$__LOCALE['SHKATALOGMEDIA_DPC'][28]='_offers;Offers;Προσφορές';
$__LOCALE['SHKATALOGMEDIA_DPC'][29]='_lastitems;New arrivals;Νέες αφίξεις';
$__LOCALE['SHKATALOGMEDIA_DPC'][30]='_gallery;Additional files;Συνημένα αρχεία';
$__LOCALE['SHKATALOGMEDIA_DPC'][31]='_availabillity;Product Availabillity;Διαθεσιμότητα προιόντων';
$__LOCALE['SHKATALOGMEDIA_DPC'][32]='_items;Items;Προιόντα';
$__LOCALE['SHKATALOGMEDIA_DPC'][33]='_asc;Asc;Αυξουσα';
$__LOCALE['SHKATALOGMEDIA_DPC'][34]='_desc;Desc;Φθινουσα';
$__LOCALE['SHKATALOGMEDIA_DPC'][35]='_first;First;Πρώτα';
$__LOCALE['SHKATALOGMEDIA_DPC'][36]='_all;All;Ολα';
$__LOCALE['SHKATALOGMEDIA_DPC'][37]='_nofound;Items not found;Δεν βρέθηκαν εγγραφές';
$__LOCALE['SHKATALOGMEDIA_DPC'][38]='_title;Title;Περιγραφή';
$__LOCALE['SHKATALOGMEDIA_DPC'][39]='_norecs;Record set is empty;Οι εγγραφές δεν υπάρχουν';
$__LOCALE['SHKATALOGMEDIA_DPC'][40]='_norec;Record not exist;Η εγγραφή δεν υπάρχει';
$__LOCALE['SHKATALOGMEDIA_DPC'][41]='_lockrec;Title;Η εγγραφή είναι κλειδωμένη';

class shkatalogmedia {
	
    var $max_items, $result, $path, $urlpath, $inpath;
	var $map_t, $map_f;
	var $pprice, $codetype;
	var $availability;	
    var $userLevelID;	
	var $is_reseller, $htmlpath;
	var $listcontrols;
	var $carthandler;	
	var $max_selection;
	
	var $itemfimagex,$itemfimagey,$imagex,$imagey, $itemimagex, $itemimagey;	
	var $imageclick, $linemax;
	var $thubpath_large, $thubpath_medium, $thubpath_small;
	var $myorderby, $asc, $deforder, $defasc;
    var $global_hide_asceding;
	var $addfx, $addfy;	
	var $asccombostyle;
	var $decimals;
	var $toggler, $catbanner, $itemlockparam, $itemlockgoto, $isitemlocked;	
	
    var $title;
	var $allow_show_resource;
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
	var $selectSQL, $fcode, $lastprice, $itmname, $itmdescr, $lan, $itmplpath;

	function __construct() {
		$GRX = GetGlobal('GRX');		
		$UserSecID = GetGlobal('UserSecID');	
	  
		$this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);	  
	
		$this->msg = null;
		$this->post = null;		  
		$this->path = paramload('SHELL','prpath');	//echo $this->path;
		$this->urlpath = paramload('SHELL','urlpath');
		$this->inpath = paramload('ID','hostinpath');		  
		$this->result = null;	 

		$this->imgpath = $this->inpath . '/images/uphotos/';  	  
		$this->thubpath = $this->inpath . '/images/thub/';
		$photo_bg = remote_paramload('SHKATALOG','photobgpath',$this->path);		  
		$this->thubpath_large = $photo_bg?$this->inpath . "/images/$photo_bg/":$this->inpath . '/images/thub/';	  	  
		$photo_md = remote_paramload('SHKATALOG','photomdpath',$this->path);		  
		$this->thubpath_medium = $photo_md?$this->inpath . "/images/$photo_md/":$this->inpath . '/images/thub/';	  	  
		$photo_sm = remote_paramload('SHKATALOG','photosmpath',$this->path);		  
		$this->thubpath_small = $photo_sm?$this->inpath . "/images/$photo_sm/":$this->inpath . '/images/thub/';	  	  	  	  
	  
		$rt = remote_paramload('SHKATALOG','restype',$this->path);
		$this->restype = $rt?$rt:'.jpg';
		//fp img xy
		$this->itemfimagex = remote_paramload('SHKATALOG','itemfimagex',$this->path);	
		$this->itemfimagey = remote_paramload('SHKATALOG','itemfimagey',$this->path); 
		//thumb xy
		$this->imagex = remote_paramload('SHKATALOG','imagex',$this->path);	
		$this->imagey = remote_paramload('SHKATALOG','imagey',$this->path);	  
		//item xy
		$this->itemimagex = remote_paramload('SHKATALOG','itemimagex',$this->path);	
		$this->itemimagey = remote_paramload('SHKATALOG','itemimagey',$this->path);

		$this->addfx = remote_paramload('SHKATALOG','addimagex',$this->path);	
		$this->addfy = remote_paramload('SHKATALOG','addimagey',$this->path);	  	  

		$this->imageclick = remote_paramload('SHKATALOG','imageclick',$this->path);
		$this->linemax = remote_paramload('SHKATALOG','itemsperline',$this->path); 	

		$this->htmlpath = $this->urlpath . $this->inpath . '/cp/html/';
		$this->pager = GetReq('pager')?GetReq('pager'): (GetSessionParam('pager')?GetSessionParam('pager') : remote_paramload('SHKATALOG','pager',$this->path));
		$this->zeroprice_msg = remote_paramload('SHKATALOG','zeroprice',$this->path);		  
	  
		$this->map_t = remote_arrayload('SHKATALOG','maptitle',$this->path);	
		$this->map_f = remote_arrayload('SHKATALOG','mapfields',$this->path);	
		$this->pprice = remote_arrayload('SHKATALOG','pricepolicy',$this->path);
		if (empty($this->pprice)){//default
			$this->pprice[0]='price0';
			$this->pprice[1]='price1';
		}

		$this->codetype = remote_paramload('SHKATALOG','codetype',$this->path);	  	
		$this->availability = remote_arrayload('SHKATALOG','qtyavail',$this->path);		  	
	  	  
		$this->is_reseller = GetSessionParam('RESELLER'); 
		$this->carthandler = remote_paramload('SHKATALOG','carthandler',$this->path);	
		$this->one_attachment = remote_paramload('SHKATALOG','oneattach',$this->path);
		$this->max_selection = null;	  
		$this->deforder = remote_paramload('SHKATALOG','deforder',$this->path);	
		$this->defasc = remote_paramload('SHKATALOG','defasc',$this->path);  
		$this->global_hide_asceding = remote_paramload('SHKATALOG','hideasc',$this->path);  
		$this->asccombostyle = remote_paramload('SHKATALOG','asccombostyle',$this->path);	

		$cb = remote_arrayload('SHKATALOG','categorybanner',$this->path);	 
		$this->catbanner = is_array($cb)?(array)$cb : remote_paramload('SHKATALOG','categorybanner',$this->path);	  
	  
		$this->itemlockparam = remote_paramload('SHKATALOG','itemlockparam',$this->path);
		$this->itemlockgoto = remote_paramload('SHKATALOG','itemlockgoto',$this->path);	
		$this->isitemlocked = false;  

		$this->set_order(); //reset ..init 

		$dec_num = remote_paramload('SHKATALOG','decimals',$this->path);
		$this->decimals = $dec_num?$dec_num:2;   
	   
		$toggle = remote_arrayload('SHKATALOG','toggler',$this->path);  
		$deftoggle = array(0=>'no',1=>'yes');
		if (!empty($toggle))
			$this->toggler = $toggle;
		else
			$this->toggler = $deftoggle;	  
	  
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
		$asc = GetReq('asc') ? GetReq('asc') : GetSessionParam('asc');
		switch ($asc) {
			case 1  : $this->sortdef = 'ASC'; break;
			case 2  : $this->sortdef = 'DESC'; break;
			default : $this->sortdef = $sort ? $sort : 'ASC';
		}	

		$this->fcode = $this->getmapf('code');
		$this->lastprice = $this->getmapf('lastprice') ? ','.$this->getmapf('lastprice') : ',xml';
	  
		$this->lan = getlocal() ? getlocal() : '0';
		$this->itmname = $this->lan ? 'itmname' : 'itmfname';
		$this->itmdescr = $this->lan ? 'itmdescr' : 'itmfdescr';		  
	  
		$oid = remote_paramload('SHKATALOGMEDIA','orderid',$this->path);
		$this->orderid = $oid ? $oid . ' ' . $this->sortdef : 'orderid ' . $this->sortdef;	  	  
	  
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
		$this->filterajax = false; //true;
	  
		$this->itmplpath = 'templates/';	  
	  
		$this->selectSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .
							"price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
							$this->fcode. $this->lastprice . ",weight,volume,dimensions,size,color,manufacturer,orderid,YEAR(sysins) as year,MONTH(sysins) as month,DAY(sysins) as day, DATE_FORMAT(sysins, '%h:%i') as time, DATE_FORMAT(sysins, '%b') as monthname," .
							"template,owner,itmactive from products ";					
    }
	
	public function event($event=null) {
	
	    switch ($event) {
			
			case 'sitemap'       : 	if ($dpc = GetReq('dpc')) {
										$dpccmd = str_replace(',','+',$dpc);							   
										_m($dpccmd);		  
									}  
		                      
									$xml = $this->sitemap_feed(true);
									die($xml);	//xml output
									break;		
		
			case 'feed'          :	if (GetReq('id'))
										$this->read_item();
									elseif (GetReq('cat'))  
										$this->read_list();
									else {
										$dpccmd = str_replace(',','+',GetReq('dpc'));								   
										_m($dpccmd);		  
									}  
									$xml = $this->katalog_feed();
									die($xml);	//xml output
									break;
								 
			case 'xmlout'        : _m("cmsvstats.update_category_statistics use ".GetReq('cat')."+xmlout"); //$this->replace_spchars(GetReq('cat'),1)."+xmlout");
									$this->xmlread_list();
									$xml = $this->xml_feed();
									die($xml);	//xml output
									break;
			//cart override
			case 'addtocart'     : 	$cartstr = explode(';', GetReq('a')); 
									$item = array_shift($cartstr); 
									_m("cmsvstats.update_item_statistics use $item+cartin");
									break; 
			case 'removefromcart': 	$cartstr = explode(';', GetReq('a'));
									$item = array_shift($cartstr);
									_m("cmsvstats.update_item_statistics use $item+cartout");	                         
									break;		
		
			case 'showimage'    : 	$this->show_photodb(GetReq('id'), GetReq('type'));

			case 'kfilter'      :	$filter = GetParam('input');
									$this->my_one_item = $this->fread_list($filter); 
									$_filter = $this->replace_spchars($filter,1);
									_m("cmsvstats.update_category_statistics use $_filter+filter");		  
									break;		
			case 'klist'        :   $this->javascript();
									$this->my_one_item = $this->read_list(); 
									_m("cmsvstats.update_category_statistics use ".GetReq('cat'));//$this->replace_spchars(GetReq('cat'),1));		  
									break;	

			case 'kshow'        :	$this->read_item(); 
									_m("cmsvstats.update_item_statistics use ".GetReq('id'));
									break;
								
			default             : 	//if (!GetReq('modify')) GetGlobal('controller')->calldpc_method("rcvstats.update_item_statistics use ".GetReq('id'));
		}			
    }	
	
	public function action($action=null) {

	    switch ($action) {
		
			case 'sitemap'       :
			case 'feed'          :
			case 'xmlout'        :		  
									break;		
		
			//cart override
			case 'addtocart'     :
			case 'removefromcart':
									if (($this->carthandler) || (GetSessionParam('fastpick')=='on')) {
										if (GetReq('cat')) {
											$this->my_one_item = $this->read_list(); 							  							
											$out .= $this->list_katalog(0);											
										}
										else
											$out = $this->default_action();
									}  
									else
										$out = _m("shcart.cartview");   
									break;			
		
			case 'kfilter'      :	if (in_array('beforeitemslist',$this->catbanner))//before
										$out .= _m('shkategories.show_category_banner');//$this->show_category_banner();									  
								  								
									if ($this->filterajax) {
										$section = $this->replace_spchars(GetReq('cat'),1);
										die($section .'|'.$this->list_katalog(0,'kfilter'));
									}	
									else	
										$out .= $this->list_katalog(0,'kfilter');		
								
									//banner down
									if (in_array('afteritemslist',$this->catbanner))//after
										$out .= $this->show_category_banner();														 
									break;
								
			case 'klist'        : 	if (in_array('beforeitemslist',$this->catbanner))//before
										$out .= _m('shkategories.show_category_banner');//$this->show_category_banner();									  
								   								
									$out .= $this->list_katalog(0);		
								
									//banner down
									if (in_array('afteritemslist',$this->catbanner))//after
										$out .= _m('shkategories.show_category_banner');//$this->show_category_banner();														 
									break;

			case 'kshow'        : 	if (in_array('beforeitem',$this->catbanner))
										$out .= _m('shkategories.show_category_banner');//$this->show_category_banner();	
								  
									$out .= $this->show_item();
								
									if (in_array('afteritem',$this->catbanner))
										$out .= _m('shkategories.show_category_banner');//$this->show_category_banner();	
									break;									
		  
			default             : 	if (!GetReq('modify')) $out .= $this->default_action();	
		  
		}	
		
		return ($out);
    }
	
	protected function js() {
		$cat = GetReq('cat');
		$baseurl = paramload('SHELL','urlbase') . '/';		
		$furl = $baseurl . _m('cmsrt.url use t=kfilter&cat=' . $this->replace_spchars($cat)); //seturl('t=kfilter&cat='.$this->replace_spchars($cat),null,null,null,null,true); 
		
		$js = "
function filter(f,div) { 
//alert(div+' '+f);
/*
\$('#'+div).html(\"<img src='images/loading.gif' alt='Loading'>\");			
\$.get('{$furl}'+f+'/', function(data) {\$('#'+div).html(data);});};
*/
$.ajax({
  url: '{$furl}'+f+'/',
  cache: false,
  success: function(html){
    $('#'+div).text(html);
  }
})};
";
		return ($js);
	}
	
	protected function scrolltop_javascript_code() {

		$jscroll = <<<SCROLLTOP
function ajaxcall(pdiv,purl) {
	var pdiv = pdiv ? pdiv : '#content_div';
	//console.log(pdiv+purl);
	$('#'+pdiv).html('<img src="images/loading.gif" alt="Loading">');
	$.get(purl,function(data) {	$('#'+pdiv).html(data);	});	
}				
//scroll smooth to top
function gotoTop() {
	//$("a[href='#top']").click(function() {
	$("html, body").animate({ scrollTop: 0 }, "slow");
	return false;
	//});
};

SCROLLTOP;

		return ($jscroll);
    }	
	
	
	protected function javascript() {
	
       if (iniload('JAVASCRIPT')) {
	   
	       $code = $this->js();
		   $code.= $this->scrolltop_javascript_code();
		   
		   $js = new jscript;	
           $js->load_js($code,null,1);		
		   unset ($js);
	   }	
	}		

	protected function orderSQL() {
		$order = GetReq('order') ? GetReq('order') : GetSessionParam('order');	
		$ppolicy = $this->is_reseller ? 'price0' : 'price1';
		
		if ($this->myorder) { //phpdac hack
			$sSQL = " ORDER BY ";	
			$sSQL .= $this->myorder .' '. ($this->myasc ? $this->myasc : $this->sortdef);		
			return ($sSQL);			
		}
		
		switch ($order) {
		    case 1  : $o = $this->bypass_order_list ? null : $this->itmname; break;
			case 2  : $o = $this->bypass_order_list ? null : $ppolicy; break;  
		    case 3  : $o = $this->bypass_order_list ? null : $this->fcode; break;
			case 4  : $o = $this->bypass_order_list ? null : 'cat0';break;			
			case 5  : $o = $this->bypass_order_list ? null : 'cat1';break;
			case 6  : $o = $this->bypass_order_list ? null : 'cat2';break;			
			case 9  : $o = $this->bypass_order_list ? null : 'cat3';break;						
		    default : $o = $this->bypass_order_list ? null : $this->itmname;
		}  

		$sSQL = " ORDER BY ";	
		$sSQL .= $o .' '. $this->sortdef ;//$this->bypass_order_list ? $this->orderid : $o .",". $this->orderid;		
		
		return ($sSQL);
	}	
	
	protected function default_action() {
	    $db = GetGlobal('db');	
		$page = GetReq('page') ? GetReq('page') : 0;	
		
        $sSQL = $this->selectSQL;				
		$sSQL .= " WHERE itmactive>0 and active>0";			 
		$sSQL .= $this->orderSQL();
		$sSQL .= " LIMIT 100";
								 
	    $this->result = $db->Execute($sSQL,2);
		$this->max_items = $db->Affected_Rows();
	    $this->max_selection = $this->get_max_result();								
		$group = null;
		$out .= $this->show_submenu('klist',1,$group,null,1);
			
		if (!$this->onlyincategory) 
		    $out .= $this->list_katalog(0);
		
		return ($out);
	}	

	//override
	public function do_quick_search($text2find,$incategory=null) {
        $db = GetGlobal('db');	
		$page = GetReq('page') ? GetReq('page') : 0;	
		$stype = GetParam('searchtype'); 
		$scase = GetParam('searchcase'); 
		$incategory = $incategory ? $incategory : GetReq('cat');								
		
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;	
		
		if ($text2find) {
			
			_m("cmsvstats.update_category_statistics use $text2find+search");				
		
			$parts = explode(" ",$text2find);//get special words in text like code:  
	
			$sSQL = $this->selectSQL;
			$sSQL .= " where ";
		  
			switch ($parts[0]) {
		  
				case 'code:' :  $sSQL .= " ( ".$this->fcode." like '%" . $this->decodeit($parts[1]) . "%')";
			                break;
				default      : //normal search
		  
							if (defined("SHNSEARCH_DPC")) {
								$sSQL .= '('. _m('shnsearch.findsql use '.$text2find.'+'.$this->fcode.'<@>'.$this->itmname.'<@>'.$this->itmdescr.'<@>itmremark++'.$stype.'+'.$scase);		  
							}
							else { 			  	
								$sSQL .= '(' . " ( {$this->itmname} like '%" . strtolower($text2find) . "%' or  {$this->itmname} like '%" . strtoupper($text2find) . "%')";	
								$sSQL .= " or ";		   
								$sSQL .= " ( {$this->itmdescr} like '%" . strtolower($text2find) . "%' or  {$this->itmdescr} like '%" . strtoupper($text2find) . "%')";				 
								$sSQL .= " or ";		   
								$sSQL .= " ( itmremark like '%" . strtolower($text2find) . "%' or  itmremark like '%" . strtoupper($text2find) . "%')";				 					 
								$sSQL .= " or ";		   			 
								$sSQL .= " ( ".$this->fcode." like '%" . strtolower($text2find) . "%' or  " . $this->fcode . " like '%" . strtoupper($text2find) . "%')";						 
							}			   
	   				 
			}			
			$sSQL .= ')' ;
		  
			if ($incategory) {	
				$cats = explode($this->sep(),$incategory);
				foreach ($cats as $c=>$mycat)
					$sSQL .= ' and cat'.$c ." ='" . $this->replace_spchars($mycat,1) . "'";		  	  
			}
		   							  
			$sSQL .= " and itmactive>0 and active>0";	
			$sSQL .= $this->orderSQL();
		  
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
	
	
	public function do_filter_search($text2find,$incategory=null) {
        $db = GetGlobal('db');	
		$page = GetReq('page') ? GetReq('page') : 0;	
		$incategory = $incategory ? $incategory : GetReq('cat');							
		
		if ($text2find) {
		
			$sSQL = $this->selectSQL;
			$sSQL .= " where manufacturer='" . $this->replace_spchars($text2find,1) . "'";
		  
			if ($incategory) {	
				$cats = explode($this->sep(),$incategory);
				foreach ($cats as $c=>$mycat)
					$sSQL .= ' and cat'.$c ." ='" . $this->replace_spchars($mycat,1) . "'";		  	  
			}
		   							 
			$sSQL .= " and itmactive>0 and active>0";	
			$sSQL .= $this->orderSQL();
		  
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
	protected function get_max_result($text2find=null,$filter=null) {
        $db = GetGlobal('db');
		$cat = GetReq('cat');	  
		if ($cat{0}=='-') {
		    $negative = true;
			$cat = substr($cat,1);//drop -
		}			
		$cat_tree = explode($this->sep(), $cat);		
		$oper = $negative?' not like ':'='; 	
		$stype = GetParam('searchtype');
		$scase = GetParam('searchcase');				
				
		$sSQL = "select count(id) from products where ";
		
		if ($text2find) {
		
			if (defined("SHNSEARCH_DPC")) {
				$mytext = $filter ? $this->replace_spchars($text2find,1) : $text2find; //search by user or filter 
				$whereClause = _m('shnsearch.findsql use '.$mytext.'+'.$this->fcode.'<@>'.$this->itmname.'<@>'.$this->itmdescr.'<@>itmremark<@>manufacturer++'.$stype.'+'.$scase);		  
			}
			else {		
				$mytext = $filter ? $this->replace_spchars($text2find,1) : strtolower($text2find); //search by user or filter			  
				$whereClause = " ( {$this->itmname} like '%" . $mytext . "%' or {$this->itmname} like '%" . $mytext . "%')";	
				$whereClause .= " or ";		   
				$whereClause .= " ( {$this->itmdescr} like '%" . $mytext . "%' or  {$this->itmdescr} like '%" . $mytext . "%')";				 
				$whereClause .= " or ";		   
				$whereClause .= " ( itmremark like '%" . strtolower($text2find) . "%' or itmremark like '%" . $mytext . "%')";				 					 
				$whereClause .= " or ";		   			 
				$whereClause .= " ( ".$this->fcode." like '%" . $mytext . "%' or " . $this->fcode . " like '%" . $mytext . "%')";								  		
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
		
	    $resultset = $db->Execute($sSQL,2);	
 	    $this->max_cat_items = $resultset->fields[0];//$db->Affected_Rows();			 					
		
		return ($this->max_cat_items);
	}	

	public function show_photodb($itmcode=null, $stype=null, $type=null) {
		$db = GetGlobal('db');
		if (!$itmcode) return;
		$type = $type ? $type : $this->restype;
	  	  
		$sSQL = "select data,type,code from pphotos  WHERE code='" . $itmcode . "'";
		if (isset($type))
			$sSQL .= " and type='". $type ."'";
		if (isset($stype))
			$sSQL .= " and stype='". $stype ."'";		
	  
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
	
	public function get_photo_url($code, $photosize=null) {
		$db = GetGlobal('db');
		if (!$code) return;  

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
			if (is_numeric($interface))	  
				$photo = _m("cmsrt.url use t=showimage&id=$code&type=$stype");//seturl('t=showimage&id='.$code.'&type='.$stype);
			else  
				$photo = $interface . '?id='.$code.'&type='.$stype;
		}
		else {//ordinal image
			$pfile = $this->encode_image_id($code); //_m('shkategories.encode_image_id use '.$code);
			$photo_file = $this->urlpath . '/' .$tpath . $pfile . $this->restype;	  
			$photo = (file_exists($photo_file)) ? $tpath . $pfile . $this->restype : $tpath . 'nopic' . $this->restype; 
	    }
	   
	    return ($photo);	 	
	}	
	
	protected function list_photo($code,$x=100,$y=null,$imageclick=1,$mycat=null,$photosize=null,$clickphotosize=null,$altname=null) {
		$page = GetReq('page')?GetReq('page'):0;		
		$cat = $mycat?$mycat:GetReq('cat');  
		$a_name = $altname ? $altname : $code;   
	   
		$photo = $this->get_photo_url($code,$photosize);//define size
	   
	   	   
	    if (($imageclick==null) || ((is_numeric($imageclick)) && ($imageclick>=0))) {
	    
			if ($imageclick==1) {//phot url	
				$clickphoto = $clickphotosize ? $this->get_photo_url($code,$clickphotosize) : $this->get_photo_url($code,$photosize);
				$plink = "<a href=\"$photo\">";
				$lo = "<img src=\"" . $photo . "\"";
				$lo.= $y ? "height=\"$y\"" : null; 
				$lo.= "border=\"0\" alt=\"$a_name". localize('_IMAGE',getlocal()) . "\">" . "</a>"; 
				$ret = $plink . $lo;
			}
			elseif ($imageclick==2) {//product url
				$myresource = "<img src=\"" . $photo . "\"";
				$myresource.= "alt=\"$a_name". localize('_IMAGE',getlocal()) . "\">";
		  
				$purl = _m("cmsrt.url use t=kshow&cat=$cat&id=$code"); 
				$plink = "<a href=\"$purl\">";
				$ret = $plink . $myresource . "</a>";           
			}
			elseif ($imageclick==0) {//item link
				$myresource = "<img src=\"" . $photo . "\"";
				$myresource.= "alt=\"$a_name". localize('_IMAGE',getlocal()) . "\">";
				$ret = _m("cmsrt.url use t=kshow&cat=$cat&page=$page&id=$code+" . $myresource); 
			} 
			else {//item link
				$myresource = "<img src=\"" . $photo . "\"";
				$myresource.= "alt=\"$a_name". localize('_IMAGE',getlocal()) . "\">";		  
				$ret = _m("cmsrt.url use t=kshow&cat=$cat&page=$page&id=$code+" . $myresource); 
			} 
		}
		else {
			$plink = "<a href=\"$imageclick\">";
			$ret = $plink . "<img src=\"" . $photo . "\"" . "></a>";           		
	    } 	   		
		
	    return ($ret);
	}				
	
	protected function read_list() {
        $db = GetGlobal('db');	
		$page = GetReq('page')?GetReq('page'):0;
		$negative = false;	
		$cat = GetReq('cat');	

		if ($cat{0}=='-') {
		    $negative = true;
			$cat = substr($cat,1);//drop -
		}	 
		
		$oper = $negative?' not like ':'='; 			
		
		if ($cat!=null) {		   
		  
			$cat_tree = explode($this->sep(), $cat); 
			
			$sSQL = $this->selectSQL;
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
			$sSQL .= $this->orderSQL();
		  
			if ($this->pager) {
				$p = $page * $this->pager;
				$sSQL .= " LIMIT $p,".$this->pager; //page element count
			}

			$resultset = $db->Execute($sSQL,2);
			$this->result = $resultset; 
			$this->max_items = $db->Affected_Rows();//count($this->result);
	      
			if ($this->max_items==1) 
				return ($this->result->fields[$this->fcode]); //to view the item without click on dir

	        $this->max_selection = $this->get_max_result();			
		}	
		
		return null;
	}	
	
	/* filter */
	protected function fread_list($filter=null) {
        $db = GetGlobal('db');	
		$page = GetReq('page')?GetReq('page'):0;			
	    $f = $this->lan; 
		$oper = '=';
		$cat = GetReq('cat');		
		
		if ($cat!=null) {		   
			$cat_tree = explode($this->sep(),$cat); 
			$sSQL = $this->selectSQL;
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

			$sSQL .= $this->orderSQL();
		  
			if ($this->pager) {
				$p = $page * $this->pager;
				$sSQL .= " LIMIT $p,".$this->pager; //page element count
			}
		  
			$resultset = $db->Execute($sSQL,2);
			$this->result = $resultset; 
			$this->max_items = $db->Affected_Rows();//count($this->result);
	      
			if ($this->max_items==1) 
				return ($this->result->fields[$this->fcode]); //to view the item without click on dir

	        $this->max_selection = $this->get_max_result(null, $filter);			
		}
		
		return null;
	}

	/* xml read */
	protected function xmlread_list() {
        $db = GetGlobal('db');	 	
		$cat = GetReq('cat');				
		$xmlitems = GetReq('xml');		
		
	    /*$sSQL = $this->selectSQL;*/
		if (!defined('RCXMLFEEDS_DPC')) return 'RCXMLFEEDS DPC not loaded'; //dpc cmds needed
		$sf = _v('rcxmlfeeds.select_fields'); //remote_arrayload('RCXMLFEEDS','selectfields',$this->path);			
		$myfields = implode(',', $sf);	
		$sSQL = "select id," . $myfields . " from products";		
		$sSQL .= " WHERE ";	

		if ($cat!=null) {		   
		  
			$cat_tree = explode($this->sep(), $cat); 		  
		      	  
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
		$sSQL .= " ORDER BY ".$this->itmname .' '. $this->sortdef; //$this->orderid;

	    $this->result = $db->Execute($sSQL,2);
	}		
	
	//override
	protected function read_item($direction=null,$item_id=null) {
        $db = GetGlobal('db');	
		$item = $item_id ? $item_id : GetReq('id');
		$cat = GetReq('cat');				  	
		
	    $sSQL = $this->selectSQL;	
		$sSQL .= " WHERE ".$this->fcode."=";
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
	
	protected function show_paging($pagecmd=null,$mytemplate=null,$nopager=null) {
	    if ($nopager) return;
		 
	    $cat = GetReq('cat'); // asis	
		$inp = GetParam('input');
	    $t = $inp ? 'search' : GetReq('t'); 	
	    $page = GetReq('page') ? GetReq('page') : 0;
	    $pager = GetReq('pager') ? GetReq('pager') : $this->pager;
	    $pcmd = $pagecmd ? $pagecmd : 'klist';
		  
	    //echo '|paging>',$this->max_items,':',$this->max_cat_items,':',$this->max_selection;
	    $mp = $this->max_cat_items;//$this->get_max_result(); //$this->max_selection
	    $max_page = floor($mp/$this->pager);//<<<<<<<<<<<<<<<-1;	 plus ceil  
	    //echo $max_page.">>>>".$mp.">>>>".$this->pager;
	    $cutter = 2;//5	 
	   
	    if ($mp<=$pager) return;  

	    $tmplcontents = $this->select_template('fppager-button');
	   
	    if ($page<$max_page) {//&& ($mp<$pager)) { 

			//next pages
			$m = 0;
			for($p=$page+1 ; $p<$max_page ; $p++) {
				if ($m<$cutter) {
					if (($pcmd=='filter') || ($pcmd=='search'))				 
						$next_page_no = _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&page=$p+" . strval($p+1)); //seturl('t='.$pcmd.'&input='.$inp.'&cat='.$cat.'&page='.$p,$p+1,null,null,null,true);					
					elseif ($pcmd=='kfilter')
						$next_page_no = _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$p+" . strval($p+1)); //seturl('t='.$pcmd.'&cat='.$cat.'&input='.$inp.'&page='.$p,$p+1,null,null,null,true);
					else		
						$next_page_no = _m("cmsrt.url use t=$pcmd&cat=$cat&page=$p+" . strval($p+1)); //seturl('t='.$pcmd.'&cat='.$cat.'&page='.$p,$p+1,null,null,null,true);
					$next .= $this->combine_template($tmplcontents,'',$next_page_no);
				}
				$m+=1;
			}	   
			if (($next) && (!$tmplcontents)) $next .= "|";
			$page_next = $page + 1;	
			if (($pcmd=='filter') || ($pcmd=='search'))	 		 
				$next_label = _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&page=$page_next+" . '&gt;');//seturl('t='.$pcmd.'&input='.$inp.'&cat='.$cat.'&page='.$page_next,'&gt;',null,null,null,true);			
			elseif ($pcmd=='kfilter')
				$next_label = _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$page_next+" . '&gt;');//seturl('t='.$pcmd.'&cat='.$cat.'&input='.$inp.'&page='.$page_next,'&gt;',null,null,null,true);
			else	
				$next_label = _m("cmsrt.url use t=$pcmd&cat=$cat&page=$page_next+" . '&gt;'); //seturl('t='.$pcmd.'&cat='.$cat.'&page='.$page_next,'&gt;',null,null,null,true);
			$next .= $this->combine_template($tmplcontents,'',$next_label);
		}
	    
	    if ($page>0) {
			$page_prev = $page - 1;
            if (($pcmd=='filter') || ($pcmd=='search'))			 
				$prev_label = _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&page=$page_prev+" . '&lt;'); //seturl('t='.$pcmd.'&input='.$inp.'&cat='.$cat.'&page='.$page_prev,'&lt;',null,null,null,true);				
            elseif ($pcmd=='kfilter') 
				$prev_label = _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$page_prev+" . '&lt;'); //seturl('t='.$pcmd.'&cat='.$cat.'&input='.$inp.'&page='.$page_prev,'&lt;',null,null,null,true);		 
			else	
				$prev_label = _m("cmsrt.url use t=$pcmd&cat=$cat&page=$page_prev+" . '&lt;'); //seturl('t='.$pcmd.'&cat='.$cat.'&page='.$page_prev,'&lt;',null,null,null,true);		 
			$prev = $this->combine_template($tmplcontents,'',$prev_label);	
		 
			//prev pages
			$m = $page-$cutter;
			for($p=0 ; $p<$page ; $p++) {
				if ($p>=$m) {
					if (($pcmd=='filter') || ($pcmd=='search'))	 
						$prev_page_no = _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&page=$p+" . strval($p+1)); //seturl('t='.$pcmd.'&input='.$inp.'&cat='.$cat.'&page='.$p,$p+1,null,null,null,true);					
					elseif ($pcmd=='kfilter') 
						$prev_page_no = _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$p+" . strval($p+1)); //seturl('t='.$pcmd.'&cat='.$cat.'&input='.$inp.'&page='.$p,$p+1,null,null,null,true);
					else
						$prev_page_no = _m("cmsrt.url use t=$pcmd&cat=$cat&page=$p+" . strval($p+1)); //seturl('t='.$pcmd.'&cat='.$cat.'&page='.$p,$p+1,null,null,null,true);
			
					$prev .= $this->combine_template($tmplcontents,'',$prev_page_no);
				}
			}  
	    }	 
	    $cp = $page+1;
	    $current = $this->combine_template($tmplcontents, $this->pager_current_class ,"<a href=\"#\">$cp</a>");   
			
	    $page_titles = $prev . $current . $next;	  	
        $contents = $this->select_template('fppager');	   
	    $ret = $this->combine_template($contents,$page_titles);	
	   
	    return ($ret);
	}	

	public function show_asceding($cmd=null,$mytemplate=null,$style=null,$notview=null) {
		if ($notview) return;
	   
		$cat = GetReq('cat');
		$inp = GetParam('input');
		$t = $inp ? 'search' : GetReq('t');   
		$cmd = $t ? $t : ($cmd ? $cmd : 'klist');
		$pager = GetReq('pager') ? SetSessionParam('pager',GetReq('pager')) : GetSessionParam('pager');
		$asc = GetReq('asc') ? SetSessionParam('asc',GetReq('asc')) : GetSessionParam('asc');
		$order = GetReq('order') ? SetSessionParam('order',GetReq('order') ) : GetSessionParam('order');	
		
		$a = localize('_title',getlocal());
		$b = localize('_axia',getlocal());
		$c = localize('_code',getlocal());	   
		$data = array(1=>$a,2=>$b,3=>$c);
		$do = ($this->deforder) ? 3 : 1;
 
		$url = (($cmd=='search') || ($cmd=='filter')) ? _m("cmsrt.seturl use t=$cmd&input=$inp&cat=$cat&order=#+++1") /*seturl('t='.$cmd.'&input='.$inp.'&cat='.$cat.'&order=#')*/ : 
		                                                _m("cmsrt.seturl use t=$cmd&cat=$cat&order=#+++1") /*seturl('t='.$cmd.'&cat='.$cat.'&order=#')*/ ;
		$selected_order = GetReq('order') ? GetReq('order') : (GetSessionParam('order') ? GetSessionParam('order') : $do);
		$combo_char = $this->make_combo($url,$data,null,$selected_order,$style);
	   	      	   		   
		//asc/desc
		$a = localize('_asc',getlocal());
		$b = localize('_desc',getlocal());
		$data = array(1=>$a,2=>$b);
		$da = ($this->defasc<0) ? 2 : 1;
 
        $url = (($cmd=='search') || ($cmd=='filter')) ? _m("cmsrt.seturl use t=$cmd&input=$inp&cat=$cat&asc=#+++1") /*seturl('t='.$cmd.'&input='.$inp.'&cat='.$cat.'&asc=#')*/ : 
		                                                _m("cmsrt.seturl use t=$cmd&cat=$cat&asc=#+++1") /*seturl('t='.$cmd.'&cat='.$cat.'&asc=#')*/ ;
		$selected_asc = GetReq('asc') ? GetReq('asc') : (GetSessionParam('asc') ? GetSessionParam('asc') : $do);   
		$combo_asceding = $this->make_combo($url,$data,null,$selected_asc,$style);
	   
		//pager
		$max = $this->max_selection;
	   
        $data2 = array();  	
	    for ($i=1;$i<4;$i++) {
			$n = ($this->default_pager * $i);
			$data2[$n] = localize('_array',getlocal()).' '.$n;
        }		  
		$url = (($cmd=='search') || ($cmd=='filter')) ? _m("cmsrt.seturl use t=$cmd&input=$inp&cat=$cat&pager=#+++1") /*seturl('t='.$cmd.'&input='.$inp.'&cat='.$cat.'&pager=#')*/ : 
		                                                _m("cmsrt.seturl use t=$cmd&cat=$cat&pager=#+++1") /*seturl('t='.$cmd.'&cat='.$cat.'&pager=#')*/ ;
	    $combo_pager = $this->make_combo($url,$data2,null,$this->pager,$style);
	   	  		    	   	   		 	      
	    $contents = $this->select_template('fpsort');
	    $out = $this->combine_template($contents,localize('_order',getlocal()),$combo_char,$combo_asceding,$combo_pager);	     
	   
	   return ($out);	      
	}		
	
	public function list_katalog($imageclick=null,$cmd=null,$template=null,$no_additional_info=null,$external_read=null,$photosize=null,$resources=null,$nopager=null,$nolinemax=null,$originfunction=null) {
	    $cmd = $cmd?$cmd:'klist';
	    $pz = $photosize?$photosize:1;		   
	    $xdist = $this->imagex?$this->imagex:100;
	    $ydist = $this->imagey?$this->imagey:null;//free y 75;	
        $cat = GetReq('cat');   
	    $custom_template=false;
	    $page = GetReq('page') ? GetReq('page') : 0;
	    $ogImage = array();

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
         $item_code = $this->fcode;			
	
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
				$cart_code  = $rec[$this->fcode];
				$cart_title = $this->replace_cartchars($rec[$this->itmname]);
				$cart_group = $cat;
				$cart_page  = $page;
				$cart_descr = $this->replace_cartchars($rec[$this->itmdescr]);
				$cart_photo = $rec[$this->fcode];//$this->get_photo_url($rec[$this->fcode],$pz);
				$cart_price = $price;
				$cart_qty   = 1;//???				 
				$cart = _m("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;+$cat+$cart_page",1);//'cart';
				$array_cart = $this->read_array_policy($rec[$item_code],$price,"$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty");	   
				$in_cart = _m("shcart.getCartItemQty use ".$rec[$item_code]);
			}	
			else
                $cart = null;  			 
		   
		    $availability = $this->show_availability($rec['ypoloipo1']);	
		    $details = null;
            $detailink = null;
		    $itemlink = _m("cmsrt.url use t=kshow&cat=$ucat&page=$page&id=".$rec[$item_code]); //seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],null,null,null,null,true);
		    $itemlinkname = _m("cmsrt.url use t=kshow&cat=$ucat&page=$page&id=" . $rec[$item_code] . "+". $rec[$this->itmname]); //seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],$rec[$this->itmname],null,null,null,true);		   
		   		   
		  											 
		    $tokens[] = $itemlinkname;//$rec[$this->itmname];
			$tokens[] = $rec[$this->itmdescr];
			$tokens[] = $this->list_photo($rec[$item_code],$xdist,$ydist,$myimageclick,$ucat,$pz,null,$rec[$this->itmname]);
			$units = $rec['uniname2'] ? localize($rec['uniname1'],getlocal()) .'/'. localize($rec['uniname2'],getlocal()):
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
            $tokens[] = $rec[$this->itmname]; 
			  
			/*if (GetReq('id') || GetReq('cat') || ($originfunction))
			     $tokens[] = $this->get_xml_links(null,null,$originfunction);			  
			else*/
                $tokens[] = null;   

            $tokens[] = $this->item_has_discount($rec[$item_code]);
            $tokens[] = "addcart/$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty/$cat/$cart_page/";				  
		      
			/*date time */
			$tokens[] = $rec['year'];
			$tokens[] = $rec['month'];
			$tokens[] = $rec['day'];
			$tokens[] = $rec['time'];
			$tokens[] = $rec['monthname'];
			  
			$tokens[] = $rec['template'];
			$tokens[] = $rec['owner'];			  
			$tokens[] = $rec['itmactive'];
			  
			if (!$custom_template) {
                $items_grid[] = $this->combine_tokens($mytemplate, $tokens, true);//<<exec after tokens replace
                $items_list[] = $this->combine_tokens($mytemplate_alt, $tokens, true);//<<exec after tokens replace			  
			}
			else
			    $items_custom[] = $this->combine_tokens($mytemplate, $tokens, true);//<<exec after tokens replace
			
			$ogimage[] = $this->get_photo_url($rec[$item_code],2);
			unset($tokens);			  	 				   	   	   	
		 }//foreach 
		  
		 if (!$custom_template) { 
            if (($mytemplate) && ($mytemplate_alt)) 	
				$toprint .= $this->make_table_list($items_grid, $items_list, 'fpkatalogtable', 'fpkataloglist', $cat);			
	        else
				$toprint .= $this->make_table($items, $mylinemax, 'fpkatalogtable', $cat);	  
			  
	        $toprint .= $this->show_paging($cmd,$mytemplate,$nopager);

			$this->ogTags = $this->openGraphTags(array(0=>$this->siteTitle,
		                                           1=>_m('shkategories.getcurrentkategory'),
												   2=>str_replace($this->sep(),' ',$this->replace_spchars($cat,1)),														
												   3=>$this->httpurl .'/klist/'. $cat . '/',
												   4=>$ogimage, /*$ogimage array of images (with no httpurl)!!*/
												  ));			
		 }	
         else //custom template
		    $toprint .= (!empty($items_custom)) ? implode('',$items_custom) : null;
             		  
	    }//empty result

	    $out .= $toprint;

	    return ($out);	
	}	
	
    protected function list_katalog_table($linemax=2,$imgx=null,$imgy=null,$imageclick=0,$showasc=0,$cmd=null,$template=null,$no_additional_info=null,$lang=null,$external_read=null,$photosize=null,$resources=null,$nopager=null,$originfunction=null,$notable=null) {
		$cmd = $cmd ? $cmd : 'klist';
		$page = GetReq('page') ? GetReq('page') : 0;	   
		$pz = $photosize ? $photosize : 1;
		$xdist = ($imgx?$imgx:160);
		$ydist = ($imgy?$imgy:120);
		$cat = GetReq('cat');
		$myimageclick = ($this->imageclick>0) ? 1 : $imageclick;	   
	   
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
			$item_code = $this->fcode;
			$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
			$ucat = $cat;
		
			if ($rec[$pp]>0) 
				$price = $this->spt($rec[$pp]);	
			else 	 
				$price = $this->zeroprice_msg;
		   		   
			if (defined("SHCART_DPC")) {
				$cart_qty   = 1;
				$cart_code  = $rec[$item_code];
				$cart_title = $this->replace_cartchars($rec[$this->itmname]);
				$cart_group = $cat;
				$cart_page  = $page;
				$cart_descr = $this->replace_cartchars($rec[$this->itmdescr]);
				$cart_photo = $rec[$item_code];//$this->get_photo_url($rec[$this->fcode],$pz);
				$cart_price = $price;				 
				$icon_cart  = _m("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;+$cat+$cart_page",1);//'cart';
				$array_cart = $this->read_array_policy($rec[$item_code],$price,"$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty");	   
				$in_cart = _m("shcart.getCartItemQty use ".$rec[$item_code]);
			}	
			else	
			    $icon_cart = null;
		   
			$availability = $this->show_availability($rec['ypoloipo1']);		
			$details = null;
			$detailink = null;		   
			$itemlink = _m("cmsrt.url use t=kshow&cat=$ucat&page=$page&id=".$rec[$item_code]); //seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],null,null,null,null,true);
			$itemlinkname = _m("cmsrt.url use t=kshow&cat=$ucat&page=$page&id=" . $rec[$item_code] . "+". $rec[$this->itmname]); //seturl('t=kshow&cat='.$ucat.'&page='.$page.'&id='.$rec[$item_code],$rec[$this->itmname],null,null,null,true);			   
		   
		   
            //// tokens method												 
		    $tokens[] = $itemlinkname;//$rec[$this->itmname];
			$tokens[] = $rec[$this->itmdescr];
			$tokens[] = $this->list_photo($rec[$item_code],$xdist,$ydist,$myimageclick,$ucat,$pz,null,$rec[$this->itmname]);
			$units = $rec['uniname2'] ? localize($rec['uniname1'],getlocal()).'/'.localize($rec['uniname2'],getlocal()) :
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
			$tokens[] = $rec[$this->itmname]; 
			 
			/*if (GetReq('id') || GetReq('cat') || ($originfunction))
			    $tokens[] = $this->get_xml_links(null,null,$originfunction);			  
			else*/
               $tokens[] = null; 	

            $tokens[] = $this->item_has_discount($rec[$item_code]);
            $tokens[] = "addcart/$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty/$cat/$cart_page/";				 
			 			
			/*date time */
			$tokens[] = $rec['year'];
			$tokens[] = $rec['month'];
			$tokens[] = $rec['day'];
			$tokens[] = $rec['time'];
			$tokens[] = $rec['monthname'];
			 
			$tokens[] = $rec['template'];
		    $tokens[] = $rec['owner'];	
            $tokens[] = $rec['itmactive'];			 
						
			$items[] = $this->combine_tokens($mytemplate, $tokens, true);	
			unset($tokens);													 
		   
		  }//foreach	
	   
		  if ($notable) {/*single product view called by phpdac funcs*/
				$nt = (!empty($items)) ? implode('',$items) : null;
				return ($nt);
		  }	
		  //else	
	      //make table			
		  $ret .= $this->make_table($items, $linemax, 'fpkatalogtable', $cat);  	  
	      				
		  if ($this->pager) 
			$ret .= $this->show_paging($cmd,$mytemplate,$nopager);					
		
	    }
   	
	    if ((count($this->result)>0) && ($no_additional_info==null))   
			$ret .= $this->show_availabillity_table(null,1);	   
   
	   return ($ret);	
    } 
	
	protected function show_item($template=null,$no_additional_info=null,$lang=null,$lnktype=1,$pcat=null,$boff=null,$tax=null) {
	    $cat = $pcat ? $pcat : GetReq('cat'); 	
        $page = GetReq('page') ? GetReq('page') : 0;		
	    $id = GetReq('id');
	    $ogimage = array();
	   
	    $mytemplate = $this->select_template('fpitem',$cat);	 
	   
	    if (count($this->result->fields)>1) {	
	   
		 $pp = $this->read_policy();	   
		 $item_code = $this->fcode;
	   
		 foreach ($this->result as $n=>$rec) {
						 
			$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
		   
			if ($rec[$pp]>0) 
				$price = $this->spt($rec[$pp],$tax);
			else 	 
				$price = $this->zeroprice_msg;	
		 
		    $cart_code = $rec[$item_code];
			$cart_title = $this->replace_cartchars($rec[$this->itmname]);
			$cart_group = $cat;
			$cart_page = GetReq('page')?GetReq('page'):0;
			$cart_descr = $this->replace_cartchars($rec[$this->itmdescr]);
			$cart_photo = $rec[$item_code];//$this->get_photo_url($rec[$this->fcode],1);
			$cart_price = $price;
			$cart_qty = 1;//???
			if (defined("SHCART_DPC")) {
				$in_cart = _m("shcart.getCartItemQty use ".$rec[$item_code]); 
				$icon_cart = _m("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;+$cat+$cart_page",1);//'cart';
				$array_cart = $this->read_array_policy($rec[$item_code],$price,"$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty");	   
				
			    $units = $rec['uniname2'] ? localize($rec['uniname1'],$lan).'/'.localize($rec['uniname2'],$lan):
				   						    localize($rec['uniname1'],$lan); 
                $lastprice = $this->getmapf('lastprice');											
			}	
			else
                $icon_cart = null;	
			
			$_u = _m("cmsrt.url use t=kshow&cat=$cat&page=$page&id=".$rec[$item_code]);
			$itemlink =  $_u; //seturl('t=kshow&cat='.$cat.'&page='.$page.'&id='.$rec[$item_code],null,null,null,null,true);  
		    $detailink = $_u . '#details'; //seturl("t=kshow&cat=$cat&page=$page&id=".$rec[$item_code],null,null,null,null,true).'#details';		   
			$availability = $this->show_availability($rec['ypoloipo1']);	
			 
	        $linkphoto = $this->list_photo($rec[$item_code],null,null,$lnktype,$cat,2,3,$rec[$this->itmname]);	

            $ahtml = $this->show_aditional_html_files($rec[$item_code]);			 
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
			 
			$tokens[] = $this->get_xml_links();
            $tokens[] = $this->item_has_discount($rec[$item_code]);
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

			$tokens[] = $rec['template'];
			$tokens[] = $rec['owner'];	
            $tokens[] = $rec['itmactive'];			 
			 
			//print_r($tokens);
		 	if ($itmpl = $rec['template'])
		 		$out = $this->_ct($this->itmplpath . $itmpl, serialize($tokens), true);
			else			 
				$out = $this->combine_tokens($mytemplate, $tokens, true);
			 
			$ogimage[] = $this->get_photo_url($rec[$item_code],2);
			 
			$this->ogTags = $this->openGraphTags(array(0=>$this->siteTitle,
													1=>$tokens[0],
													2=>$tokens[1],														
													3=>$this->httpurl .'/'. $itemlink,
													4=>$this->httpurl . str_replace('//','/','/'. $ogimage[0]),
													));				 
			 
			unset($tokens);	 
		 }//foreach	   
	    }//if recs
	    else {
		  if ($this->itemlockparam) 
		    $out = ($goto = $this->itemlockgoto) ? _m($goto) : localize('_lockrec',getlocal());
		  else 
		    $out = localize('_norec',getlocal());
	    }	   
  	   
	    return ($out);	
	}		
	

    //overrided
	public function show_aditional_files($id,$nojs=null,$altname=null,$tmpl=null) {
	    if (!$id) return;
	    $cat = GetReq('cat');
		$title = $altname ? $altname : $id;
		$name = $id;
		$id = $this->encode_image_id($id); //_m('shkategories.encode_image_id use '.$id);
		 
	    $addfx = $this->addfx?$this->addfx:100;
	    $addfy = $this->addfy?$this->addfy:null;//free y size //75;	
	    $this->allow_show_resource = true; //enable it after show main item image		
	
	    $template= $tmpl ? $tmpl : 'fpitemaddfiles.htm';	    	
		$mytemplate = $this->select_template($template);
         
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
                
				default    : $addtional_photo_link = _m("cmsrt.seturl use t=kshow&cat=$cat&id=" . GetReq('id') . "&thub=" . $i . "#photo+++1"); //seturl('t=kshow&cat='.GetReq('cat').'&id='.GetReq('id').'&thub='.$i.'#photo');
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
		if (($itemscount>0) && ($this->additional_files_perline>1))	 
		   $out = $this->make_table($items, $this->additional_files_perline, 'fptreetable', $cat);	 
		else 
		   $out = (!empty($items)) ? implode('',$items) : null; //without table template 

		return ($out);		 
	}
	
	//overrwriiten
	public function show_aditional_html_files($id) {	
        $db = GetGlobal('db');	
	    $lan = getlocal();
		$slan =  ($this->one_attachment) ? $slan : ($lan ? $lan : '0'); 
		 
	    $code = $this->fcode;	  
        $sSQL = "select data from pattachments ";
	    $sSQL .= " WHERE (type='.html' or type='.htm') and code='" . $id . "'";
	    if (isset($slan))
	       $sSQL .= " and lan=" . $slan;	
	  
	    $resultset = $db->Execute($sSQL,2);	
		$ret = $resultset->fields['data'];   
		 
		return ($ret);  		 
	}	
	
	
	public function show_p($p,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');					
		$pz = $photosize?$photosize:1;		
	                                                                             
        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $p." >0 and ".$p." IS NOT NULL and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->orderid}";
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",{$this->itmname} {$this->sortdef} " : "{$this->itmname} {$this->sortdef} ");
		$sSQL .= $items ? " LIMIT " . $items: null;			
		
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
	
	public function show_lastentries($items=10,$days=12,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$photosize=null,$nopager=null) {
        $db = GetGlobal('db');		
		$mydays = $days?$days:12;
	    $date2check = time() - ($mydays * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);
		$pz = $photosize?$photosize:1;			

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		$sSQL .= "sysins>='" . convert_date(trim($entrydate),"-DMY",1) . "' and ";
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= "itmactive>0 and active>0";	
		$sSQL .= " ORDER BY id desc LIMIT " . $items;			
	    //echo $sSQL;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;//free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$nopager);
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$nopager,$linemax);
		  
		return ($out);	
	}		
	
	public function show_kategory_offers($category=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null) {
        $db = GetGlobal('db');			
		$c = $category?$category:GetReq('cat');	//auto browse current cat
		$cat = explode($this->sep(),$c);			
		$pz = $photosize?$photosize:1;		

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		foreach ($cat as $i=>$c) {
		  $myc = $this->replace_spchars($c,1);
		  $sSQL .= " cat{$i}='$myc' and ";	
		}   
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->getmapf('code') . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $this->getmapf('offer')."='".$this->toggler[1]."' and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->itmname} asc LIMIT " . $items;			
	    //echo $sSQL;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;// free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$nopager);
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$nopager,$linemax);
		  
		return ($out);	
	}		
	
	public function show_pcat($p,$category=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
		$mycat = $category ? $category : GetReq('cat');	   			
		$pz = $photosize?$photosize:1;			
	                                                                             
        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		
		$cat = explode($this->sep(),$mycat);		
		foreach ($cat as $i=>$c) {
		  $myc = $this->replace_spchars($c,1);		
		  $sSQL .= " cat{$i}='$myc' and ";	
		}  
		//only items inside category ..when category param not specified
	    if ((!$category) && ($this->onlyincategory)) {
		  $ii = $i+1;
		  $sSQL .= " (cat{$ii} IS NULL or cat{$ii}='') and ";		
		}  		
		  
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
		  $sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $p." >0 and ".$p." IS NOT NULL and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->orderid} ";
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",{$this->itmname} {$this->sortdef} " : "{$this->itmname} {$this->sortdef} ");		
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
	
	public function show_lastincat($ascdesc=null,$category=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
		$mycat = $category?$category:GetReq('cat');	   		
		$pz = $photosize?$photosize:1;		

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		
		$cat = explode($this->sep(),$mycat);			
		foreach ($cat as $i=>$c) {
		  $myc = $this->replace_spchars($c,1);		
		  $sSQL .= " cat{$i}='$myc' and ";	
		}  
		//only items inside category ..when category param not specified
	    if ((!$category) && ($this->onlyincategory)) {
		  $ii = $i+1;
		  $sSQL .= " (cat{$ii} IS NULL or cat{$ii}='') and ";		
		}  		

		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= "itmactive>0 and active>0";	
		$mysort = ($ascdesc=='ASC') ? 'ASC' : 'DESC'; 
		$sSQL .= " ORDER BY datein " . $mysort;	
		$sSQL .= $items ? " LIMIT " . $items : null;			
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_lastincat use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_lastincat use $p,$category,$items");
		  
		return ($out);	
	}		

	public function show_orderid($ascdesc=null,$category=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
		$mycat = $category?$category:GetReq('cat');	//auto browse current cat	   		
		$pz = $photosize?$photosize:1;		

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		
		$cat = explode($this->sep(),$mycat);			
		foreach ($cat as $i=>$c) {
		  $myc = $this->replace_spchars($c,1);		
		  $sSQL .= " cat{$i}='$myc' and ";	
		}  
		//only items inside category ..when category param not specified
	    if ((!$category) && ($this->onlyincategory)) {
		  $ii = $i+1;
		  $sSQL .= " (cat{$ii} IS NULL or cat{$ii}='') and ";		
		}  		
		
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
		  $sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= "orderid >0 and orderid IS NOT NULL and itmactive>0 and active>0";	
		$mysort = $ascdesc ? ($ascdesc=='ASC'?'ASC':'DESC') : $this->sortdef; 
		$sSQL .= " ORDER BY orderid ";
		$sSQL .= $this->bypass_order_list ? null : ",{$this->itmname} $mysort ";	
		$sSQL .= $items ? " LIMIT " . $items : null;			
	    //echo $sSQL,'<br>';
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_orderid use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_orderid use $p,$category,$items");
		  
		return ($out);	
	}	
	
	public function show_orderidis($orderid=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
		$mycat = $category?$category:GetReq('cat');	   			
		$pz = $photosize?$photosize:1;			

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";		
			
		$sSQL .= "orderid = $orderid and orderid IS NOT NULL and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY orderid ";
		$sSQL .= $this->bypass_order_list ? null : ",{$this->itmname} {$this->sortdef} ";		
		$sSQL .= $items ? " LIMIT " . $items : null;			
	    //echo $sSQL,'<br>';
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_orderidis use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_orderidis use $p,$category,$items");
		  
		return ($out);	
	}	
	
	public function show_resources($contition,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$ofield=null,$desc=null) {
        $db = GetGlobal('db');					
		$pz = $photosize?$photosize:1;	
        $ordfield = $ofield ? $ofield : $this->itmname;
        $ascd = $desc ? "desc" : "asc"; 		

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $contition."='".$this->toggler[1]."' and itmactive>0 and active>0";	
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
	 
	 
	public function show_group($group,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');				
	    $date2check = time() - ($days * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);		
		$pz = $photosize?$photosize:1;	

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		 
		$sSQL .= $this->fcode . " in (" . $group .")";  //coma sep codes
		  		
		$sSQL .= " and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->orderid}";			
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",{$this->itmname} {$this->sortdef} " : "{$this->itmname} {$this->sortdef} ");
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
	public function show_special($contition,$items=10,$days=12,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');			
	    $date2check = time() - ($days * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);		
		$pz = $photosize?$photosize:1;	

        $sSQL = $this->selectSQL;				
		$sSQL .= " WHERE ";	
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $contition."='".$this->toggler[1]."' and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY {$this->orderid}";			
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",{$this->itmname} {$this->sortdef} " : "{$this->itmname} {$this->sortdef} ");
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
	
	public function show_special_online($field2check,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$key=null) {
        $db = GetGlobal('db');
		$dbbuffer = GetGlobal('_sqlbuffer');		
		$pz = $photosize?$photosize:1;						
		$p = null;			
		$table2check = 'products';
		$fields = $this->result->fields;				
		
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
		  else 
		    return;		
		}
				
        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE (";	
		
		switch ($mode) {

		  case 'query':	$rbuf = array_reverse($dbbuffer);		  						
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
		
		//if ($advsql = $this->sql_search_relative_titles($fields[$this->itmdescr],'cat2'))
		  //$sSQL .= ' or ' . $this->fcode . ' in (' . $advsql . ')';		  		
		
		$sSQL .= ") and itmactive>0 and active>0";
		 	
		if ($selected_item = GetReq('id')) 
		  $sSQL .= " and " . $this->fcode . " not like '" . $selected_item . "'";
		  
		//MULTIPLE CHECKS  
		//if ($selected_cat = $fields['cat2']) 
		 // $sSQL .= " and " . "cat2 not like '" . $selected_cat . "'";	
	 
		$sSQL .= " ORDER BY {$this->orderid}";
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",{$this->itmname} {$this->sortdef} " : "{$this->itmname} {$this->sortdef} ");		
		$sSQL .= $items ? " LIMIT " . $items : null;		
        //echo $mode;		
		
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
	public function show_relatives($key,$field2check=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
	
      $ret = show_special_online($field2check,$items,$linemax,$imgx,$imgy,$imageclick,$template,$ainfo,$external_read,$photosize,$key);	
	  return ($ret);
	}
	
	//??? NOT USED ????
	public function sql_search_relative_titles($mastertitle,$field2check) {
        $db = GetGlobal('db');	
		$remarks = 'itmremark';	
		$sqlout = null;		
	
	    $mt = explode(' ',trim($mastertitle));
        //print_r($mt);
        $sSQL = "select ".$this->fcode." from products where "; //whole words...
		  		
	    foreach ($mt as $i=>$lex) {
		
		  if (($la = trim($lex)) && (strlen($la)>4))  {//words max than 4 chars
		
		  $ulex = strtoupper($lex);
		  $dlex = strtolower($lex);
          
		  $sqlout[$lex] = "{$this->itmname} like '%$lex%' ";// or $this->itmdescr like '%$lex%' or $remarks like '%$lex%'";// or "; //as is
		  //$sSQL .= "{$this->itmname} like '% $ulex %' or $this->itmdescr like '% $ulex %' or $remarks like '% $ulex %' or "; //upper case		
		  //$sSQL .= "{$this->itmname} like '% $dlex %' or $this->itmdescr like '% $dlex %' or $remarks like '% $dlex %'"; //lower case		
		  
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
	
	public function show_relative_sales($id,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
		$myid = $id?$id:GetReq('id');
		$db = GetGlobal('db');			
		$pz = $photosize?$photosize:1;	  	    
	
		if ( (defined('SHTRANSACTIONS_DPC')) && (seclevel('SHTRANSACTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {

			$itemslist = _m('shtransactions.getRelativeSales use '.$items.'+'.$myid);
			//print_r($itemslist); //echo 'z';
		 
			if (!empty($itemslist)) {
		 
				$sSQL = $this->selectSQL;
				$sSQL .= " WHERE (";	
		
				foreach ($itemslist as $i=>$code)
					$preSQL[] = $this->fcode . " = '" . $code ."'";
			 
				$sSQL .= implode(' or ',$preSQL);
		  		
				$sSQL .= ") and itmactive>0 and active>0";	
				$sSQL .= " ORDER BY {$this->orderid} ";			
				$sSQL .= $this->bypass_order_list ? null : 
								($this->orderid ? ",{$this->itmname} {$this->sortdef} " : "{$this->itmname} {$this->sortdef} ");		
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
	public function show_kategory_items($category=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$xor=null) {
        $db = GetGlobal('db');			
		$mycat = $category?$category:GetReq('cat');	//auto browse current cat	   
		$cat = explode($this->sep(),$mycat);		
		$pz = $photosize?$photosize:1;		
				
		//auto browse current cat
		$fields = $this->result->fields; //prev query exclude cat
		
	    $sSQL = $this->selectSQL;
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
			$sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  
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
		         ($this->orderid ? ",{$this->itmname} {$this->sortdef} " : "{$this->itmname} {$this->sortdef} ");		
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
	public function show_sitemap_items($category=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$xor=null) {
        $db = GetGlobal('db');		
		$mycat = $category?$category:GetReq('cat');	//auto browse current cat	   
		$cat = explode($this->sep(),$mycat);		
		$pz = $photosize?$photosize:1;		
				
		//auto browse current cat
		$fields = $this->result->fields; //prev query exclude cat		
		
	    $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";		  		  
		$sSQL .= "itmactive>0 and active>0";	
		$sSQL .= " ORDER BY datein DESC LIMIT 2000";		
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
	
	public function show_sitemap($template=null) {
		$db = GetGlobal('db');
		$start = GetReq('start');
		$headcat = GetReq('headcat')?GetReq('headcat'):"";	   
		$meter = $start?$start-1:0; 
		$sep = $this->sep();	
	   
		return null; //<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<< DISABLED

		$mytemplate = $template ? $this->select_template($template) : null;	   
	   
	   	
		$sSQL = "select id,itmname,itmfname,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,".$this->fcode." from products ";
		$sSQL .= " WHERE ";
		$sSQL .= "itmactive>0 and active>0";	
		$sSQL .= " ORDER BY cat0,cat1,cat2,cat3,cat4,{$this->itmname} asc ";
		$sSQL .= $start ? " LIMIT $start,10000" : " LIMIT 10000";			
		//echo $sSQL;
		
		$resultset = $db->Execute($sSQL,2);	
		$result = $resultset;
		   
		if (!empty($result)) {		   
	    
			if ($headcat)//next page start with headcat
				$out = '<h2>' . $this->replace_spchars($headcat,1) . '</h2><hr/>';
	
			foreach ($result as $n=>$rec) {
		
				if (!empty($rec)) {
		   
					$meter+=1;
					$cat = $this->getkategories($rec,1,$this->lan,'klist');		 
					$linkcat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
			 		   
					if (strtolower($headcat)!=strtolower($cat)) {//paging start
						$headcat = $cat;
						//echo $headcat;
						if (strstr($headcat,'</a>'.$sep.'<a')) //link
							$ret .= '<h2>' . str_replace('</a>'.$sep.'<a','</a>'.$this->rightarrow.'<a', $this->replace_spchars($headcat,1)) . '</h2><hr>';
						else			   
							$ret .= '<h2>' . str_replace($sep,$this->rightarrow,$this->replace_spchars($headcat,1)) . '</h2><hr>';
					}
					$title = $rec[$this->fcode] . "&nbsp;" . $rec[$this->itmname];
			 
					$itemlinkname = _m("cmsrt.url use t=kshow&cat=$linkcat&id=".$rec[$this->fcode]."+".$title); //seturl('t=kshow&cat='.$linkcat.'&id='.$rec[$this->fcode],$title,null,null,null,true );		   
			 
					if ($mytemplate) {
						$tokens = array(); //reset 
						$tokens[] = $meter; 
						$tokens[] = $itemlinkname; 
						$tokens[] = $rec[$this->fcode];
						$tokens[] = $rec[$this->itmname];
						$ret .= $this->combine_tokens($mytemplate, $tokens);			 
					}
					else
						$ret .= $meter . "&nbsp;" . $itemlinkname . "<br/>";			   
				}
			}
		 
			if (($mytemplate) && (stristr($mytemplate,'<SPLIT/>')) && ($this->linemax)) {
				$items = explode('<SPLIT/>',$ret); //<li> split..
				$out .= $this->make_table($items, $this->linemax, 'fpkatalogtable', $cat); 
			}
			else
				$out .= $ret;
		}   
	   
		return ($ret);		   		   	
	}
	
	public function read_item_attr($item=null,$attr=null,$islink=null) {
        $db = GetGlobal('db');					
		
		if (!$item) 
			$item = GetReq('id');	
		
        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";
		$sSQL .= $this->fcode . "= '" . $item ."'";
	    $resultset = $db->Execute($sSQL,2);	
		$result = $resultset;

	    foreach ($result as $n=>$rec) {
			if ($islink) {
				$ucat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
				$itemlink = _m("cmsrt.url use t=kshow&cat=$ucat&id=". $rec[$this->fcode] ."+". $rec[$attr]); //seturl('t=kshow&cat='.$ucat.'&id='.$rec[$this->fcode],$rec[$attr]);
				return ($itemlink);
			}
			else
				return ($rec[$attr]);	
		}  									
	}
	
	public function read_item_weight($itemsarray=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');						
		$pz = $photosize?$photosize:1;	
		
		if (!$itemsarray) return;		

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	
		
        if (strstr($itemsarray,';')) {
		
			$items = explode(';',$itemsarray);
		
			foreach ($items as $code)
				$tempSQL[] = $this->fcode . "= '" . $code ."'";
			
			$sSQL .= implode(' OR ',$tempSQL);	
		} 
		else //one item
			$sSQL .= $this->fcode . "= '" . $itemsarray ."'";

	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;//free y 75;		
		
		if ($linemax>1)
			$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1);
		elseif ($linemax==1)  	
			$out = $this->list_katalog(null,null,$template,$ainfo,null,$external_read,$pz,1,null,$linemax);
		else {//return val
			foreach ($this->result as $n=>$rec) 
				$out[$rec[$this->fcode]] = floatval($rec['weight']);
		}  
		return ($out);	
	}		
	
	//override
	public function show_last_viewed_items($items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null,$notable=null) {
        $db = GetGlobal('db');
        $UserName = GetGlobal('UserName');							
		$c = $category?$category:GetReq('cat');
		
		$cat = explode($this->sep(),$c);		
	    $date2check = time() - ($days * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);		
		$pz = $photosize?$photosize:1;
		$resources = 1;
			
		
        $sSQL = "select products.id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4,".
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,volume,".$this->fcode.
				",stats.id,stats.tid from products, stats ";
		$sSQL .= " WHERE stats.tid=products.".$this->fcode." and products.itmactive>0 and products.active>0";				
		
		if ($UserName)
			$sSQL .= " and (attr2='" . decode($UserName) . "' or attr2='". session_id() . "')";
		else  
			$sSQL .= " and attr2='" . session_id() . "'";
		  
		$sSQL .= " GROUP BY stats.tid ORDER BY stats.id DESC limit " . $items;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx?$imgx:100;
		$ymax = $imgy?$imgy:null;// free y 75;		
		
		if ($linemax>1)
			$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$resources,$nopager,null,$notable);
		else  	
			$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$resources,$nopager,1);
		  
		return ($out);				
	}	
	
	/*session mode due to big stats*/
	public function show_last_viewed_items_session($items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null,$notable=null) {
        $db = GetGlobal('db');
        $UserName = GetGlobal('UserName');						
		$c = $category?$category:GetReq('cat');	
		
		$cat = explode($this->sep(),$c);		
	    $date2check = time() - ($days * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);		
		$pz = $photosize?$photosize:1;
		$resources = 1;

        $lastviewed = unserialize(GetSessionParam('lastvieweditems')); 
		if (!empty($lastviewed)) {	
			$ilist = implode("','",array_reverse($lastviewed));
		
			$sSQL = $this->selectSQL;
			$sSQL .= " WHERE " . $this->fcode." in ('". $ilist ."') and itmactive>0 and active>0";				

			$resultset = $db->Execute($sSQL,2);	
			$this->result = $resultset;
		
			$xmax = $imgx?$imgx:100;
			$ymax = $imgy?$imgy:null;// free y 75;		

			if ($linemax>1)
				$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$resources,$nopager,null,$notable);
			else  	
				$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$resources,$nopager,1);
		}
		
		return ($out);				
	}		
	
	//override
	public function show_offers($items=10,$cat=null,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null,$notable=null) {
        $db = GetGlobal('db');				
		$pz = $photosize?$photosize:1;			

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";	

		if ($cat) {
			$c = explode($this->sep(), $this->replace_spchars($cat,1)); //print_r($cat);
			foreach ($c as $cc=>$category)
				$sSQL .= "cat".$cc."='" . $category . "' and ";
	    }
		
		if ($selected_item = GetReq('id')) 
		  $sSQL .= $this->fcode . " not like '" . $selected_item ."' and ";
		  		
		$sSQL .= $this->getmapf('offer')."='".$this->toggler[1]."' and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY ". "{$this->orderid}";			
		$sSQL .= $this->bypass_order_list ? null : 
		         ($this->orderid ? ",{$this->itmname} {$this->sortdef} " : "{$this->itmname} {$this->sortdef} ");		
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
		
	
    public function katalog_feed($read_all=false, $off_categories=false, $off_items=false) {
		$db = GetGlobal('db');  
		$format = GetReq('format')?GetReq('format'):'rss2';	
		$code = $this->fcode;
		$i=0;	  
		$isutf8 = (stristr($this->encoding, 'utf8')) ? true : false;
		if ($read_all)
			$this->read_all_items();
	
		$sep = $this->sep();

		$xml = new pxml();
		$xml->encoding = $this->encoding;	//must be utf8 not utf-8
		  
		$this->xml_formater($xml,$format,1);	  

		//categories  
		if (!$off_categories) {
	  
			$ddir = _m("shkategories.read_tree use ".GetReq('cat')."++1"); //$this->read_tree(GetReq('cat'),null,1);
	  
			if (!empty($ddir)) {
				foreach ($ddir as $g=>$lan_g) {
			
			       $cat = GetReq('cat');
				   $c = $cat ? $cat . $sep . $g : $g;
				   $_u = _m("cmsrt.url use t=klist&cat=$c");
				   $cat_url = 'http://' . $this->url . '/' . $_u; //seturl('t=klist&cat='. $c ,null,null,null,null,true);
			
		           $p[] = $g;
			       $p[] = $lan_g;
                   $p[] = $cat_url;			   
			       $p[] = $cat;
			       $p[] = $lan_g;
			       $p[] = null;
			       $p[] = null;
				   $p[] = null;
				   $p[] = null;
				   $p[] = null;
				   $p[] = null;
				   $p[] = null;	
                   $p[] = null; 				   
				   
			       $this->xml_formater($xml,$format,null,$p);
				   unset($p);				  	 
			 
			       $i+=1;
				}				   
			}
		}//off
	  
		//items  
		if (!$off_items) {
			if (!empty($this->result)) {		  	
				foreach ($this->result as $n=>$rec) {
	  
					$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   

					$price = number_format(floatval($price1),2);					 
					//echo $price,'>';
				      		
                    $_u = _m("cmsrt.url use t=kshow&cat=$cat&id=". $rec[$code]);							
				    $item_url = 'http://' . $this->url . '/' . $_u; //seturl('t=kshow&cat='.$cat.'&id='.$rec[$code],null,null,null,null,true);
                    if ($this->photodb)
						$item_photo_url = 'http://' . $this->url . '/showphoto.php?id='.$rec[$code].'&type=LARGE';
				    else
						$item_photo_url = 'http://' . $this->url . '/' . $this->img_large . '/' . $rec[$code] . $this->restype;
				   
					$p[] = $rec[$code];
					$p[] = $rec[$this->itmname];
					$p[] = $item_url;			   
					$p[] = $cat;
					$p[] = $rec[$this->itmdescr];
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
	
    public function sitemap_feed($read_all=false) {
		$db = GetGlobal('db');
		$i=0;	  
		$format = 'sitemap';	
		$code = $this->fcode;	  
		$isutf8 = (stristr($this->encoding, 'utf-8')) ? true : false;

		$sSQL = "select id,sysupd,cat0,cat1,cat2,cat3,cat4,".$code." from products ";
		$sSQL .= " WHERE ";
		$sSQL .= "itmactive>0 and active>0 ";	
		$sSQL .= " ORDER BY id,sysupd DESC LIMIT 6000";			
		
		$resultset = $db->Execute($sSQL,2);			

		$xml = new pxml();
		$xml->encoding = $this->encoding;	
		  
		$this->xml_formater($xml,$format,1);	  
	  
		//items  
		if (!empty($resultset)) {		  	

			foreach ($resultset as $n=>$rec) {      			      		   
				$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
				$_u = _m("cmsrt.url use t=kshow&cat=$cat&id=". $rec[$code]);
				$item_url = 'http://' . $this->url . '/' . $_u; //seturl('t=kshow&cat='.$cat.'&id='.$rec[$code],null,null,null,null,true);

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

	protected function xml_formater(& $xml,$format=null,$init=null,$params=null,$encoding=null) {
	
	    $date = date(DATE_RFC822);//'m-d-Y');
		$cat_title = _m('shkategories.getcurrentkategory');
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
				case 'sitemap' :$xml->addtag('url','urlset',null,null);
								//$xml->addtag('name','url',$xml->cdata($params[1]),null); 
								$xml->addtag('loc','url',$params[0],null); 
								if ($params[1]) //in case of 0000-00-00..is null
									$xml->addtag('lastmod','url',$params[1],null);  			   
								$xml->addtag('changefreq','url','daily',null); 
								$xml->addtag('priority','url','0.5',null);
								break;
			 
	           case 'skroutz' : $cats = explode($this->sep() ,$params[3]);	
								$manufacturer = $this->replace_spchars(array_shift($cats),1);
								$category = $this->replace_spchars($params[3],1);
								$category = str_replace($this->sep() ,'/',$category);
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

	public function get_xml_links($mylan=null,$feed_id=null,$dpcfeed=null) {
		$lan = $mylan?$mylan:getlocal();//by hand per htm 0,1 page
		$lnk = array();
		$id = GetReq('id');
		$cat = GetReq('cat'); //echo $cat;
		$page = GetReq('page')?GetReq('page'):'0';
		$feed_cmd = $feed_id ? $feed_id : 'feed';	  

		$mytemplate = $this->select_template('xml-links');
	  
		//RSS	
		if (stristr($this->feed_on,'rss')) {
			if ($dpcfeed) //special phpdac page without params			  
				$lnk['RSS'] = _m("cmsrt.url use t=$feed_cmd&dpc=$dpcfeed&format=rss2"); //seturl("t=$feed_cmd&dpc=$dpcfeed&format=rss2",null,null,null,null,true);  
			elseif ($id)
				$lnk['RSS'] = _m("cmsrt.url use t=$feed_cmd&cat=$cat&page=$page&id=$id&format=rss2"); //seturl("t=$feed_cmd&cat=$cat&page=$page&id=$id&format=rss2",null,null,null,null,true);
			elseif ($cat)
				$lnk['RSS'] = _m("cmsrt.url use t=$feed_cmd&cat=$cat&page=$page&format=rss2"); //seturl("t=$feed_cmd&cat=$cat&page=$page&format=rss2",null,null,null,null,true); 
			else  
				$lnk['RSS'] = _m("cmsrt.url use t=$feed_cmd&format=rss2"); //seturl("t=$feed_cmd&format=rss2",null,null,null,null,true); 
		}
		//ATOM
		if (stristr($this->feed_on,'atom')) {	  
			if ($dpcfeed) //special phpdac page without params		  
				$lnk['ATOM'] = _m("cmsrt.url use t=$feed_cmd&dpc=$dpcfeed&format=atom"); //seturl("t=$feed_cmd&dpc=$dpcfeed&format=atom",null,null,null,null,true);//special phpdac page without params		  
			elseif ($id)
				$lnk['ATOM'] = _m("cmsrt.url use t=$feed_cmd&cat=$cat&page=$page&id=$id&format=atom"); //seturl("t=$feed_cmd&cat=$cat&page=$page&id=$id&format=atom",null,null,null,null,true);
			elseif ($cat)
				$lnk['ATOM'] = _m("cmsrt.url use t=$feed_cmd&cat=$cat&page=$page&format=atom"); //seturl("t=$feed_cmd&cat=$cat&page=$page&format=atom",null,null,null,null,true);	  
			else  
				$lnk['ATOM'] = _m("cmsrt.url use t=$feed_cmd&format=atom"); //seturl("t=$feed_cmd&format=atom",null,null,null,null,true);	  
		}		

		if (!empty($lnk)) {
			foreach ($lnk as $t=>$w) {    
				if ($w) {
					$icon_file = $this->urlpath.'/'.$this->infolder.'/images/'.strtolower($t).'.png';
					if (is_readable($icon_file)) 
						$mylink = "<img src=\"". $this->infolder.'/images/'.strtolower($t).'.png' ."\" border=\"0\" alt=\"$t\">";
					else 
						$mylink = $t;
			  
					$tokens[] = "<a href=\"$w\">".$mylink."</a>";
				}	
			}
		
			$out = $this->combine_tokens($mytemplate, $tokens);
		}

		return ($out);  
	}	
	
    //read dir for rss page
	protected function read_all_items() {
       $db = GetGlobal('db');
	   $lan = GetReq('lan')>=0 ? GetReq('lan') : getlocal();	//in case of post sitemap set lan param uri   
	   $start = GetReq('start');
	   	
       //$sSQL = $this->selectSQL;		
       $sSQL = "select id,itmname,itmfname,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,".$this->fcode." from products ";
	   $sSQL .= " WHERE ";
	   $sSQL .= "itmactive>0 and active>0 ";	

	   $sSQL .= " ORDER BY cat0,cat1,cat2,cat3,cat4,{$this->itmname} asc ";
	   $sSQL .= $start ? " LIMIT $start,10000" : " LIMIT 10000";			
	   //echo $sSQL;
		
	   $resultset = $db->Execute($sSQL,2);	
	   $this->result = $resultset; 
 	   $this->max_items = $db->Affected_Rows();//count($this->result);	   
       return (null);//$this->max_items);		   
	}
	
	/* rcxml feed */
	protected function xml_feed() {
		$db = GetGlobal('db');	  
		$format = GetReq('format') ? GetReq('format') : 'sitemap';		
		$code = $this->fcode;
		$sep = $this->sep();	

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
			$cat .= $rec['cat1'] ? $sep . $rec['cat1'] : null;
			$cat .= $rec['cat2'] ? $sep . $rec['cat2'] : null;
			$cat .= $rec['cat3'] ? $sep . $rec['cat3'] : null;
			$cat .= $rec['cat4'] ? $sep . $rec['cat4'] : null;
			
			$_cat = _m('cmsrt.replace_spchars use '.$cat);//str_replace(' ','_', $cat);
	
			$tokens[] = 'http://' . $this->url . '/' . _m("cmsrt.url use t=kshow&cat=$_cat&id=$id"); //seturl('t=kshow&cat='.$_cat.'&id='.$id,null,null,null,null,1);
			$tokens[] = 'http://' . $this->url . '/' . $imgxmlPath . $id . $this->restype;
			$tokens[] = $cat;
			//if ($n==0) print_r($tokens);
			$items[] = $this->combine_tokens($xmltemplate_products, $tokens, true);					
		}
		
		$tt = array();
		$tt[] = date('Y-m-d h:m'); 
		$tt[] = implode("", $items);
		$ret = $this->combine_tokens($xmltemplate, $tt, true);
		unset($tt);
		return ($ret);		
	}	
	
	public function show_last_edited_items($items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$photosize=null,$nopager=null) {	
	    $limit = $items ? $items : 5;
        $db = GetGlobal('db');	
	    $lan = getlocal();	
		$pz = $photosize?$photosize:1;		
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;	
		 
		if ($this->one_attachment)
			$slan = null;
		else
			$slan = $lan ? $lan : '0';
		 
	    $code = $this->fcode;	  
		 
        $sSQL = "select code from pattachments ";
	    $sSQL .= " WHERE (type='.html' or type='.htm')";
	    if (isset($slan))
			$sSQL .= " and lan=" . $slan;
		$sSQL .= " ORDER BY id desc ";	
        $sSQL .= $items ? " LIMIT " . $items : null;		 
	    //echo $sSQL;
	  
	    $resultset = $db->Execute($sSQL,2);	
	    $result = $resultset;
	    if ($exist = $db->Affected_Rows()) {
		   $ret = $result->fields['data'];
		}	
		 
        $sSQL2 = $this->selectSQL;
		$sSQL2 .= " WHERE ";
        foreach ($result as $n=>$rec) {
		    $or[] = $this->fcode ."='". $rec['code'] ."'";
        }
        $sSQL2 .= '(' . implode(' or ',$or) . ')'; 
		$sSQL2 .= " and (itmactive>0 and active>0)";
		$sSQL2 .= " ORDER BY " . $this->fcode . " desc LIMIT " . $items;			 
        //echo $sSQL2;
		 
	    $resultset = $db->Execute($sSQL2,2);	
		$this->result = $resultset;		 
		 
		if ($linemax>1)
			$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$nopager);
		else  	
			$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$nopager,$linemax);
		  
		return ($out);			 
	}	
	
	public function item_var($field=null,$code=null, $photosize=null, $array=null) {	
        $db = GetGlobal('db');					
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;		
		
		$itemcode = $code ? $code : GetReq('id');
	    $retfield = $field ? $field : $this->itmname;	                       
						   
        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE " . $this->fcode . "='" . $itemcode ."'";	
		
	    $resultset = $db->Execute($sSQL,2);	
		
		if (($retfield=='sysins') || ($retfield=='sysupd'))
			$ret = date("d-m-Y", strtotime($resultset->fields[$retfield]));
		else
			$ret = $resultset->fields[$retfield];
		
        $out = ($array) ? $resultset->fields : $ret;
		return ($out);	
	}	

	//select price type..overriten error when no cart
	public function spt($price,$tax=null) {

		if ($tax) 
			$p = $this->pricewithtax($price,$tax);	  
		elseif ($this->is_reseller) 
			$p = $price;
		elseif ((defined('SHCART_DPC')) && (_v('shcart.showtaxretail'))) 
			$p = $this->pricewithtax($price,$tax);
		else
			$p = $price;		

		return ($p);
	}
	
	//override multiple prices based on file array
	public function read_array_policy($itemcode=null,$price=null,$cart_details=null,$policyqty=null) {
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
						$pc = intval($data_array['PRICE'][$ix]);
						$retprice = $price?$price+($price*$pc/100):$pc;
					}
				}
				return ($retprice);
			}
		}
		else {
			$style = $data_array['style'];
			$titlesON = $data_array['titles'];
			$elements = $titlesON?1:0;	
			$template = $data_array['template'] ? $data_array['template'] : 'fpitempolicy';
		  
			$mylooptemplate = $this->select_template($template);
			
			foreach ($data_array['PRICE'] as $ix=>$ax) {
				$data[] = $data_array['QTY'][$ix];
				$cartd[8] = $price ? $price+($price*$ax/100) : $ax;
				$cartd[9] = intval($data_array['QTY'][$ix]);//prev line //'12';
				$data[] =	number_format($cartd[8],$this->decimals,',','.');		  
				$cartout = implode(';',$cartd);
				$data[] = _m("shcart.showsymbol use $cartout;+$cat+$cart_page+0+".$cartd[9],1);
				$data[] = $itemcode;
				$data[] = "addcart/$cartout/$cat/0/";
				$body .= $this->combine_tokens($mylooptemplate,$data,true);	
				unset($data);			  
			}		
        }
		//echo $body;
		return ($body);  
	  }	
	}

	//read policy from item record or lookup
    protected function read_array_policy2($itemcode=null,$price=null,$cart_details=null,$qtyscale=null,$prcscale=null) {	
		$cat = $pcat?$pcat:GetReq('cat');
		$cart_page = GetReq('page')?GetReq('page'):0;	  	
		$cartd = explode(';',$cart_details);
		$body = null;

		$qs = explode(',', $qtyscale); //5,10,15 qty
		$ps = explode(',', $prcscale); //-5.0,-8.0,-12.0 %- percent discount
        if (count($qs)!=count(ps)) return null;		
		
		$mylooptemplate = $this->select_template('fpitempolicy');
			
		foreach ($ps as $ix=>$ax) {
			$data[] = $qs[$ix];
	 
			$cartd[8] = $price ? $price +($price*$ax/100) : $ax;//'22.23';
			$cartd[9] = intval($qs[$ix]);//prev line //'12';
			  
		    $data[] = number_format($cartd[8],$this->decimals,',','.');		  
			  
			$cartout = implode(';',$cartd);
			$data[] = _m("shcart.showsymbol use $cartout;+$cat+$cart_page+0+".$cartd[9],1);
			$data[] = $itemcode;
			$data[] = "addcart/$cartout/$cat/0/";
			 
			$body .= $this->combine_tokens($mylooptemplate,$data,true);	

			unset($data);			  
		}		

        return ($body); 		
	}
	
	//override
	public function show_availability($qty=null) {
		if (!$this->availability) 
			return 0;

		$r_scale = array_reverse($this->availability,1);
		
		foreach ($r_scale as $i=>$s) 
			if (floatval($qty)>=floatval($s)) return ($i+1);

		return 0;
	}	
	
	//override
	public function show_availabillity_table($title=null,$plaisio=null) {
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
	protected function make_table_list($items_table=null, $items_list=null, $template_table=null, $template_list=null, $pcat=null) {
	    $cat = $pcat ? $pcat : GetReq('cat'); 		
		$mytemplate_table = $this->select_template($template_table, $cat);
		$mytemplate_list = $this->select_template($template_list, $cat);
		$mytemplate_tablelist = $this->select_template('fpkatalog-grid-list', $cat);
		$tokens = array();
		
        if ($mytemplate_tablelist) { 
		
			$table_token[] = (!empty($items_table)) ? implode('',$items_table) : null; 

			$tokens[] = $this->combine_tokens($mytemplate_table, $table_token);

			$list_token[] = (!empty($items_list)) ? implode('',$items_list) : null; 

			$tokens[] = $this->combine_tokens($mytemplate_list, $list_token);

			$toprint = $this->combine_tokens($mytemplate_tablelist, $tokens);

			unset ($tokens);
			unset ($table_token);
			unset ($list_token);
		}	
        return ($toprint); 		
    }	
	
	protected function make_table($items=null, $mylinemax=null, $template=null, $pcat=null) {
	    $cat = $pcat ? $pcat : GetReq('cat'); 	
		$mytemplate = $template ? $this->select_template($template, $cat) : null;

	    if ($items[0]) {
	        //make table
	        $itemscount = count($items);
	        $timestoloop = floor($itemscount/$mylinemax)+1;
	        $meter = 0;
			$linetoken = null;
			$tokens = array();
			
	        for ($i=0;$i<$timestoloop;$i++) {

				for ($j=0;$j<$mylinemax;$j++) {
					$linetoken .= $items[$meter];
					$meter+=1;	 
				}
				$tokens[] = $linetoken; 
                $toprint .= $this->combine_tokens($mytemplate, $tokens);					
				$linetoken = null; 
				$tokens = array();
  
	        }
		}	
        return ($toprint); 		
    }		

	//FILTERS
	function filter($field=null, $template=null, $incategory=null, $cmd=null, $header=null) {	
		if (!$field) return;
		
	    $db = GetGlobal('db');		
		$baseurl = paramload('SHELL','urlbase') . '/'; //ie compatibility		
		$command = $cmd ? $cmd : 'search';
		$stype = GetParam('searchtype');
		$scase = GetParam('searchcase');
		$cat = GetParam('cat');	
		if (!$cat) {
			
			return null;
			
			//no filter results when no cat, select cat
			/*$combo = _m('shkategories.getKategoryCombo use 1++++++++search+search-combo+1');
			return '<ul class="categories-filter animate-dropdown">
                <li class="dropdown">
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="#">'.localize('SHKATEGORIES_DPC', getlocal()).'</a>
                    <ul class="dropdown-menu" role="menu" >'.
					$combo.'
					</ul>
                </li>
            </ul>';*/
		}	
	  
		$contents = ($this->filterajax) ? $this->select_template('searchfilter-ajax') : $this->select_template('searchfilter');
		
		$tokens = array(); 
		$r = array();	
		
	    $sSQL = "SELECT DISTINCT ".$field.",count(id) from products WHERE ";			
        if ($incategory) {	
			$s = array();
		    $cats = $cat ? explode($this->sep(), $cat) : null;
			if (!empty($cats)) {
				foreach ($cats as $c=>$mycat)
					$s[] = 'cat'.$c ." ='" . $this->replace_spchars($mycat,1) . "'";		  	  
			}  
		}		
		$where = (!empty($s)) ? implode(" AND ", $s) : null;		
		
		if (($text2find = GetParam('input')) && (defined("SHNSEARCH_DPC"))) {
		   	$where .= $where ? ' AND ' : null;
            $where .= _m('shnsearch.findsql use '.$text2find.'+'.$this->fcode.'<@>'.$this->itmname.'<@>'.$this->itmdescr.'<@>itmremark++'.$stype.'+'.$scase);		  
        }		

		$sSQL .= $where ? $where . ' AND ' : null;
		$sSQL .= " itmactive>0 and active>0";
		$sSQL .= " group by " . $field;
		//echo $sSQL;	  
	  
		$result = $db->Execute($sSQL,2); 
	  
		if (!empty($result)) {
			
			foreach ($result as $n=>$t) {
				if (trim($t[0])!='') {
			        $f = $this->replace_spchars($t[0]);
					$section = $this->replace_spchars($cat,1);
					$url = $baseurl . _m("cmsrt.url use t=$command&cat=$cat&input=$f"); //seturl('t='.$command.'&cat='.$cat.'&input='.$f,null,null,null,null,true);
					$theurl = ($this->filterajax) ? /*"filter('{$f}', '{$section}')" "ajaxcall('$section','$url')"*/ "sndReqArg('$url','$section')" : $url;
					
					$tokens[] = $t[0];
					$tokens[] = $t[1];
					$tokens[] = $theurl;
					$tokens[] = ($t[0] == $this->replace_spchars(GetReq('input'),1)) ? 'checked="checked"' : null;
					$r[] = $this->combine_tokens($contents,$tokens);	
					unset($tokens);		
                }				
			}	   
		}
		
		//header
        if ($header) {		
			$tokens[] = localize('_ALL',getlocal());
			$tokens[] = GetReq('input') ? '*' : $this->max_cat_items; //$this->max_items; //'*';
			$tokens[] = $baseurl . _m("cmsrt.url use t=klist&cat=$cat"); //seturl('t=klist&cat='.$cat,null,null,null,null,true);
			$tokens[] = (!GetReq('input')) ? 'checked="checked"' : null;
			$r[] = $this->combine_tokens($contents,$tokens);
			unset($tokens);
		}			
       
		$ret = (empty($r)) ? null : implode('',$r);	
		return ($ret);  
	}
	
	protected function replace_spchars($string, $reverse=false) {
		
		$rp = _v('shkategories.replacepolicy');
	
		switch ($rp) {	
	
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
		$c = $this->sep();
					
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
	/* https://developers.facebook.com/docs/reference/opengraph/object-type/product/
  <meta property="product:original_price:amount"   content="Sample Original Price: " /> 
  <meta property="product:original_price:currency" content="Sample Original Price: " /> 
  <meta property="product:pretax_price:amount"     content="Sample Pre-tax Price: " /> 
  <meta property="product:pretax_price:currency"   content="Sample Pre-tax Price: " /> 
  <meta property="product:price:amount"            content="Sample Price: " /> 
  <meta property="product:price:currency"          content="Sample Price: " /> 
  <meta property="product:shipping_cost:amount"    content="Sample Shipping Cost: " /> 
  <meta property="product:shipping_cost:currency"  content="Sample Shipping Cost: " /> 
  <meta property="product:weight:value"            content="Sample Weight: Value" /> 
  <meta property="product:weight:units"            content="Sample Weight: Units" /> 
  <meta property="product:shipping_weight:value"   content="Sample Shipping Weight: Value" /> 
  <meta property="product:shipping_weight:units"   content="Sample Shipping Weight: Units" /> 
  <meta property="product:sale_price:amount"       content="Sample Sale Price: " /> 
  <meta property="product:sale_price:currency"     content="Sample Sale Price: " /> 
  <meta property="product:sale_price_dates:start"  content="Sample Sale Price Dates: Start" /> 
  <meta property="product:sale_price_dates:end"    content="Sample Sale Price Dates: End" />
*/  
	protected function openGraphTags($tokens=null) {
		if (!$tokens) return null;
		$localization = (getlocal()==1) ? 'el_gr' : 'en_us';
		
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
	
	
	//SHKATALOG
	
	public function make_combo($url2go,$values,$title=null,$selection=null,$style=null) {
	    $mystyle = $style?$style:$this->asccombostyle;
	
		$r = "<select name=\"".$name."\" class=\"".$mystyle."\"".( $size != 0 ? "size=\"".$size."\"" : "").
			  " onChange=\"location=this.options[this.selectedIndex].value\">";
			  
		if (!empty($values) && ($title)) 	  
			$r .= "<option value=''>---$name---</option>";	
		  
		foreach ($values as $i=>$v) {
		    $myvalue = str_replace('#',$i,$url2go); 
			$r .= "<option value=\"$myvalue\"".($i == $selection ? " selected" : "").">$v</option>";		
		}  
		
		$r .= "</select>";
				
		return ($r);  
	}		
	
	//set ordersing online using <phpdac>
	public function set_order($orderby=null,$asc=null) {

		$this->myorderby = $orderby ? $orderby : null;
		$this->myasc = $asc;  
	}

	public function read_policy($leeid=null) {
		 
		$v = $this->is_reseller ? $this->pprice[0] : $this->pprice[1]; 
		return ($v);
	}		
	
	public function pricewithtax($price,$tax=null) {
	
		if (defined('SHCART_DPC')) {
			$tax = _v('shcart.tax'); 
			$mytax = (($price*$tax)/100);	
			$value = ($price+$mytax);		  
		}
		elseif ($tax) {
			$mytax = (($price*$tax)/100);	
			$value = ($price+$mytax);		  
		}
		else
			$value = $price;
	
	  
		return ($value);
	}	
	
	public function getmapf($name) {
		$ch = null;
	
		if (empty($this->map_t)) return 0;	
	  
		foreach ($this->map_t as $id=>$elm) {	    
			if ($elm==$name) {
				$ch = $id;
				break;
			}  
		}			

		$ret = $this->map_f[$ch];
		return ($ret);
	}	

	//used by shcart to reupdate prices in login
	public function update_prices($cartitems) {
		$db = GetGlobal('db');
		$p_ret = null;
	   
		$items = unserialize($cartitems);
		$pfield = $this->read_policy();
	   
		if (is_array($items)) {
			foreach ($items as $prod_id => $product) {
				if (($product) && ($product!='x')) {	   
		  
					$param = explode(";",$product);		  
	   
					$sSQL = "select ".$pfield." from products ";
					$sSQL .= " WHERE ".$this->fcode."='".$param[0]."'";	   	   
					$result = $db->Execute($sSQL,2);	
			
					$p_ret[$param[0]] = $this->spt($result->fields[0]);
				}
			}
			return ($p_ret);  
		}

        return null;
	}
	
	public function encode_image_id($id=null) {
	    if (!$id) return null;
		$out = _m("cmsrt.encode_image_id use $id+".$this->encodeimageid); //$this->encodeimageid ? md5($id) : $id;
        return $out;
	}		

	protected function sep() {
		$s = _v('cmsrt.cseparator'); //$this->cseparator;
		return $s;
	}
	
	protected function select_template($tmpl=null,$cat=null,$hasext=null) {
		if (!$tmpl) return null;		
		return _m("shkategories.select_template use $tmpl+$cat+$hasext");
	}
	
	//tokens method	
	protected function combine_tokens($template_contents,$tokens, $execafter=null) {
		//$toks = serialize($tokens);
		//return _m("cmsrt.combine_tokens use $template_contents+$toks+$execafter");
	    if (!is_array($tokens)) return;
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
			$fp = new fronthtmlpage(null);
			$ret = $fp->process_commands($template_contents);
			unset ($fp);		  		
		}		  		
		else
			$ret = $template_contents;
		  
	    foreach ($tokens as $i=>$tok) {
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }

		for ($x=$i;$x<40;$x++)
			$ret = str_replace("$".$x."$",'',$ret);
		
		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
			$fp = new fronthtmlpage(null);
			$retout = $fp->process_commands($ret);
			unset ($fp);
          
			return ($retout);
		}		
		
		return ($ret);
	}	
	
	public function combine_template($template_contents,$p0=null,$p1=null,$p2=null,$p3=null,$p4=null,$p5=null,$p6=null,$p7=null,$p8=null,$p9=null) {
	
		$params = explode('<#>',"$p0<#>$p1<#>$p2<#>$p3<#>$p4<#>$p5<#>$p6<#>$p7<#>$p8<#>$p9");
		
		if (defined('FRONTHTMLPAGE_DPC')) {
			$fp = new fronthtmlpage(null);
			$ret = $fp->process_commands($template_contents);
			unset ($fp);		  		
		}		  		
		else
			$ret = $template_contents;

	    foreach ($params as $p=>$pp) 
			$ret = ($pp) ? str_replace("$".$p,$pp,$ret) : str_replace("$".$p,'',$ret);

		return ($ret);
	}			
	
};			  
}
?>