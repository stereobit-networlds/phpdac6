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
$__EVENTS['SHKATALOGMEDIA_DPC'][10]='sitemap';
$__EVENTS['SHKATALOGMEDIA_DPC'][11]='feed';
$__EVENTS['SHKATALOGMEDIA_DPC'][12]='showimage';
$__EVENTS['SHKATALOGMEDIA_DPC'][13]='shkatalogmedia';
$__EVENTS['SHKATALOGMEDIA_DPC'][14]='kfilter';
$__EVENTS['SHKATALOGMEDIA_DPC'][15]='xmlout';
$__EVENTS['SHKATALOGMEDIA_DPC'][16]='ktree';

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
$__ACTIONS['SHKATALOGMEDIA_DPC'][10]='sitemap';
$__ACTIONS['SHKATALOGMEDIA_DPC'][11]='feed';
$__ACTIONS['SHKATALOGMEDIA_DPC'][12]='showimage';
$__ACTIONS['SHKATALOGMEDIA_DPC'][13]='shkatalogmedia';
$__ACTIONS['SHKATALOGMEDIA_DPC'][14]='kfilter';
$__ACTIONS['SHKATALOGMEDIA_DPC'][15]='xmlout';
$__ACTIONS['SHKATALOGMEDIA_DPC'][16]='ktree';

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
$__LOCALE['SHKATALOGMEDIA_DPC'][41]='_lockrec;Locked record;Η εγγραφή είναι κλειδωμένη';
$__LOCALE['SHKATALOGMEDIA_DPC'][42]='_brands;Brands;Κατασκευαστές';
$__LOCALE['SHKATALOGMEDIA_DPC'][43]='_price;Price;Τιμή';
$__LOCALE['SHKATALOGMEDIA_DPC'][44]='_filter;Filter;Φίλτρο';
$__LOCALE['SHKATALOGMEDIA_DPC'][45]='_incart;Already in cart %d items;Έχετε στο καλάθι %d τεμάχια;';
$__LOCALE['SHKATALOGMEDIA_DPC'][46]='_cartmsg;Cart message;Ενημέρωση;';

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
	var $max_price, $min_price, $loyalty;

	public function __construct() {	
		$UserSecID = GetGlobal('UserSecID');	
		$this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);	  
	
		$this->msg = null;
		$this->post = null;		  
		$this->path = paramload('SHELL','prpath');	//echo $this->path;
		$this->urlpath = paramload('SHELL','urlpath');
		$this->inpath = paramload('ID','hostinpath');		  
		$this->result = null;
		$this->lan = getlocal() ? getlocal() : '0';

		$murl = arrayload('SHELL','ip');
		$this->url = $murl[0];
		$this->httpurl = paramload('SHELL','urlbase');  

		$char_set  = arrayload('SHELL','char_set');	  
		$charset  = paramload('SHELL','charset');	  		
		if (($charset=='utf-8') || ($charset=='utf8'))
			$this->encoding = 'utf8';//must be utf8 not utf-8
		else  
			$this->encoding = $char_set[$this->lan]; 		

		$this->imgpath = $this->inpath . '/images/uphotos/';  	  
		$this->thubpath = $this->inpath . '/images/thub/';
		$photo_bg = remote_paramload('SHKATALOG','photobgpath',$this->path);		  
		$this->thubpath_large = $photo_bg ? $this->inpath . "/images/$photo_bg/":$this->inpath . '/images/thub/';	  	  
		$photo_md = remote_paramload('SHKATALOG','photomdpath',$this->path);		  
		$this->thubpath_medium = $photo_md ? $this->inpath . "/images/$photo_md/":$this->inpath . '/images/thub/';	  	  
		$photo_sm = remote_paramload('SHKATALOG','photosmpath',$this->path);		  
		$this->thubpath_small = $photo_sm ? $this->inpath . "/images/$photo_sm/":$this->inpath . '/images/thub/';	  	  	  	  
	  
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
		$this->decimals = $dec_num ? $dec_num : 2;   
	   
		$toggle = remote_arrayload('SHKATALOG','toggler',$this->path);  
		$deftoggle = array(0=>'no',1=>'yes');
		$this->toggler = (!empty($toggle)) ? $toggle : $deftoggle;	  	  

		$this->title = localize('SHKATALOGMEDIA_DPC',$this->lan);
		$this->restype = $rt ? $rt : $this->restype;	 //parent restype when no additional files....	  
	  
		$rt = remote_arrayload('SHKATALOGMEDIA','restype',$this->path);
		$rd = array('.jpg','.png');
		$this->advrestype = $rt ? $rt : $rd;	 //advanced retypes to support multiple files as .png .swf ....
	  
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
		$this->filterajax = true;
		
		$this->min_price = 0;
		$this->max_price = 0;
		
		$this->loyalty = _m('cmsrt.paramload use ESHOP+loyalty');
	  
		$this->itmplpath = 'templates/'; //item page templates dir	
	  
		$this->selectSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4," .
							"price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,".
							$this->fcode. $this->lastprice . ",weight,volume,dimensions,size,color,manufacturer,orderid,YEAR(sysins) as year,MONTH(sysins) as month,DAY(sysins) as day, DATE_FORMAT(sysins, '%h:%i') as time, DATE_FORMAT(sysins, '%b') as monthname," .
							"template,owner,itmactive,p1,p2,p3,p4,p5,code2,code3 from products ";					
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
								 
			case 'xmlout'        :  _m("cmsvstats.update_category_statistics use ".GetReq('cat')."+xmlout"); 
									$this->xmlread_list();
									$xml = $this->xml_feed();
									die($xml);	//xml output
									break;
			//cart override
			case 'addtocart'     : 	if ($this->userLevelID < 5) {
										$cartstr = explode(';', GetReq('a')); 
										$item = $cartstr[0]; 
										_m("cmsvstats.update_item_statistics use $item+cartin");
									}
									if (_v("shcart.fastpick")) {
										//double empty msg
										//$this->jsDialog($this->replace_cartchars($cartstr[1],true), localize('_BLN1', $this->lan));									
										$this->javascript(); //katalog filters
									}	
									break; 
									
			case 'removefromcart': 	if ($this->userLevelID < 5) {
										$cartstr = explode(';', GetReq('a'));
										$item = $cartstr[0];
										_m("cmsvstats.update_item_statistics use $item+cartout");
									}	
									
									//double empty msg
									//if (_v("shcart.fastpick"))
										//$this->jsDialog($this->replace_cartchars($cartstr[1], true), localize('_BLN2', $this->lan) . ' (-)');									
									break;		
		
			case 'showimage'    : 	$this->show_photodb(GetReq('id'), GetReq('type'));

			case 'kfilter'      :	$this->my_one_item = $this->fread_list(); 
									
									if ($this->userLevelID < 5) {
										$_filter = $this->replace_spchars($filter,1);
										_m("cmsvstats.update_category_statistics use $_filter+filter");		  
									}
									
									$this->javascript();
									break;	
									
			case 'ktree'      :		$this->my_one_item = $this->tread_list(); 
									/*
									if ($this->userLevelID < 5) {
										$_filter = $this->replace_spchars($filter,1);
										_m("cmsvstats.update_category_statistics use $_filter+filter");		  
									}*/	
									break;			
									
			case 'klist'        :   $this->my_one_item = $this->read_list(); 
									if ($this->userLevelID < 5) 
										_m("cmsvstats.update_category_statistics use ".GetReq('cat'));		  
									
									$this->javascript();
									break;	

			case 'kshow'        :	$realID = $this->read_item(); 
			
									$incart = _m("shcart.getCartItemQty use " . $realID);
									if ($incart) {
										$this->jsDialog(sprintf(localize('_incart', $this->lan), $incart), 
														localize('_cartmsg', $this->lan));
									}				
									
									if ($this->userLevelID < 5) 
										_m("cmsvstats.update_item_statistics use ". $realID);
									break;
								
			default             : 	
		}			
    }	
	
	public function action($action=null) {

	    switch ($action) {
		
			case 'sitemap'       :
			case 'feed'          :
			case 'xmlout'        :		  
									break;		
		
			//cart override
			case 'removefromcart':  $out = _m("shcart.cartview");   
									break;
									
			case 'addtocart'     :  //echo GetSessionParam('fastpick');
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
		
			case 'kfilter'      :	//$page = GetReq('page');
			                        if ($this->filterajax) {//} && (!$page)) {
										//$cats = explode($this->sep(), GetReq('cat'));	
										//$section = 'page-' . array_pop($cats);
										//die($section .'|'.$this->list_katalog(0,'kfilter'));
										die($this->list_katalog(0,'kfilter'));
									}	
									else	
										$out .= $this->list_katalog(0,'kfilter');																 
									break;
									
			case 'ktree'      	:	if ($this->filterajax) {
										//$cats = explode($this->sep(), GetReq('cat'));	
										//$section = 'page-' . array_pop($cats);
										//die($section .'|'.$this->list_katalog(0,'ktree'));
										die($this->list_katalog(0,'ktree'));
									}	
									else
										$out = $this->list_katalog(0,'klist');	
									break;
								
			case 'klist'        : 	if ($page = GetReq('page')) { //ajax
										die($this->list_katalog(0,'klist'));
									}
									else {
										if (in_array('beforeitemslist',$this->catbanner))//before
											$out .= _m('shkategories.show_category_banner');									  
								   								
										$out .= $this->list_katalog(0);		
								
										//banner down
										if (in_array('afteritemslist',$this->catbanner))//after
											$out .= _m('shkategories.show_category_banner');														 
									}	
									break;

			case 'kshow'        : 	if (in_array('beforeitem',$this->catbanner))
										$out .= _m('shkategories.show_category_banner');	
								  
									$out .= $this->show_item();
								
									if (in_array('afteritem',$this->catbanner))
										$out .= _m('shkategories.show_category_banner');	
									break;									
		  
			default             : 	if (!GetReq('modify')) $out .= $this->default_action();	
		  
		}	
		
		return ($out);
    }
	
	protected function jsFilter() {
		//$cat = GetReq('cat');
		//$furl = $this->httpurl . '/' . _m("cmsrt.url use t=kfilter&cat=$cat"); 		
		
		$js = <<<JSFILTER
function filter(url,div,fname) {
	var checkedItems = fname ? 
		$('input:checkbox[name='+fname+']:checked').map(function() { return $(this).val().toString(); } ).get().join(",") : null;
	//alert(url+checkedItems+'/');
	
	ajaxCall(url+checkedItems+'/',div,1);
	//gotoTop(div);	
}
JSFILTER;

		return ($js);
	}
	
	protected function jsPrice() {
		//echo $this->max_selection;
		//if ($this->max_selection<=1) return null;			
		$cat = GetReq('cat');
		$min = $this->min_price ? round($this->min_price, 0, PHP_ROUND_HALF_DOWN) : 0; //100;
		$max = $this->max_price ? ceil($this->max_price) : 10; //700;
		$diff = ($max - $min);
		$step = ($diff<=100) ? 1 : 10;//($max-$min) / 10;
		$input = is_numeric(GetParam('input')) ? explode('.', GetParam('input')) : array('0','0');				
		$purl = $this->httpurl . '/' . _m("cmsrt.url use t=kfilter&cat=$cat"); 
		
		//ajax div
		$pcats = explode($this->sep(), $cat); 
		$section = 'page-' . array_pop($pcats); 		
		
		$location = ($this->filterajax) ? 
						"ajaxCall('$purl'+value+'/','$section',1);" :
						"window.location='$purl'+value+'/';";
		
		$js = "
$('.price-slider').on('slideStop', function(slideEvt) {
	var p = $('.price-slider').val();
	var value = p.replace(',', '.');
	$location
});
$(document).ready(function () {
	if ($('.price-slider').length > 0) {
		var v0 = parseInt('{$input[0]}') ? {$input[0]} : {$min};
		var v1 = parseInt('{$input[1]}') ? {$input[1]} : {$max};
        $('.price-slider').slider({
            min: {$min},
            max: {$max},
            step: {$step},
            value: [v0, v1],
            handle: 'square'
        });
    }
});
";
		return ($js);
	}	
	
	protected function scrolltop_javascript_code() {

		$jscroll = <<<SCROLLTOP
function ajaxCall(url,div,goto) {
	$.ajax({ url: url, cache: false, success: function(html){
		$('#'+div).html(html);
		echo.render(); /*-- lazy loading render --*/  
	}})
	if (goto) gotoTop(div);  
}				
//scroll smooth to top
function gotoTop(div) {
	var sw = (div) ? $('#'+div).offset().top : 0;
	$("html, body").animate({ scrollTop: sw }, "slow");
	/*-- lazy loading render --*/
	//setTimeout(function() { echo.render();},5000);
	return true;
};

echo.init({
  offset: 100,
  throttle: 250,	
  unload: false,	
  callback: function(element, op) {
    /*if(op === 'load') {
      element.classList.add('loaded');
    } else {
      element.classList.remove('loaded');
    }
	console.log(element+' '+op);*/
  }
});

SCROLLTOP;

		return ($jscroll);
    }	
	
	public function javascript() {
	
       if (iniload('JAVASCRIPT')) {
	   
	        $code = $this->jsFilter();
			$code.= $this->jsPrice();
		    $code.= $this->scrolltop_javascript_code();
		   
		    $js = new jscript;	
            $js->load_js($code,null,1);		
		    unset ($js);
	   }	
	}		

	protected function jsDialog($text=null, $title=null) {
	
       if (defined('JSDIALOGSTREAM_DPC')) {
	   
			if ($text)	
				$code = _m("jsdialogstream.say use $text+$title++2000");
			else	
				$code = _m('jsdialogstream.streamDialog use jsdtime');
		   
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
		$sSQL .= $o .' '. $this->sortdef ;	
		
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
	    $this->get_max_result();		
		
		if (!$this->onlyincategory) 
		    $out .= $this->list_katalog(0);
		
		return ($out);
	}	

	public function do_quick_search($text2find) {
        $db = GetGlobal('db');	
		$page = GetReq('page') ? GetReq('page') : 0;	
		$stype = GetParam('searchtype'); 
		$scase = GetParam('searchcase'); 
		$incategory = GetReq('cat');								
		/*$lastprice = $this->getmapf('lastprice') ? 
						',' . $this->getmapf('lastprice') : null;	
		*/
		if (($text2find) && ($text2find!='*')) {
			$ut = urldecode($text2find);
			$parts = explode(" ",$text2find);//get special words in text like code:  			
			
			_m("cmsvstats.update_category_statistics use $ut+search");				
		
			switch ($parts[0]) {
		  
				case 'code:' :  $where = " ( ".$this->fcode." like '%" . $this->decodeit($parts[1]) . "%')";
								break;
								
				default      : 	//normal search
								if (defined("SHNSEARCH_DPC")) {
									
									$sfields = array(0=>$this->fcode,
													1=>$this->itmname,
													2=>$this->itmdescr,
													3=>'itmremark',
													4=>'manufacturer',
													5=>'code4',
													6=>'code3',
												);
									$serialf = serialize($sfields);									
									$where = '('. _m("shnsearch.findsql use $text2find+$serialf+$stype+$scase") . ')';		  
								}
								else { 			  	
									$where = '(' . " ( {$this->itmname} like '%" . strtolower($text2find) . "%' or  {$this->itmname} like '%" . strtoupper($text2find) . "%')";	
									$where .= " or ";		   
									$where .= " ( {$this->itmdescr} like '%" . strtolower($text2find) . "%' or  {$this->itmdescr} like '%" . strtoupper($text2find) . "%')";				 
									$where .= " or ";		   
									$where .= " ( itmremark like '%" . strtolower($text2find) . "%' or  itmremark like '%" . strtoupper($text2find) . "%')";				 					 
									$where .= " or ";		   			 
									$where .= " ( ".$this->fcode." like '%" . strtolower($text2find) . "%' or  " . $this->fcode . " like '%" . strtoupper($text2find) . "%')";						 
									$where.= ')' ;
								}			   
	   				 
			}				
	   	}
		
		$sSQL = $this->selectSQL;
		$sSQL.= $where ? ' where ' . $where : ' where ';
		
		if ($incategory) {	
			$cats = stristr($incategory, $this->sep()) ? explode($this->sep(),$incategory) : array(0=>$incategory);
			foreach ($cats as $c=>$mycat)
				$s[] = 'cat'.$c ."=" . $db->qstr($this->replace_spchars($mycat,1));		  	  
			$catSQL = implode (' and ', $s);	
		}
		$sSQL.= $catSQL ? ($where ? ' and ' . $catSQL . ' and ' : $catSQL . ' and ' ) : ($where ? ' and ' : null);   							  
		$sSQL.= " itmactive>0 and active>0";	
		$sSQL.= $this->orderSQL();
		  
		//LIMITED SEARCH
		if ($this->pager) {
			$p = $page * $this->pager;
			$sSQL .= " LIMIT $p,".$this->pager; //page element count
		}
 
		$resultset = $db->Execute($sSQL,2); 
		$this->result = $resultset; 
		$this->meter = $db->Affected_Rows();
		$this->max_items = $db->Affected_Rows();
		$this->get_max_result($ut);		
	}		
	
	
	public function do_filter_search($text2find) {
        $db = GetGlobal('db');	
		$page = GetReq('page') ? GetReq('page') : 0;	
		$incategory = GetReq('cat');							
		
		if ($text2find) {
		
			$sSQL = $this->selectSQL;
			
			if (is_numeric($text2find)) {
				
				$_f = $this->read_policy();
				$_prices = explode('.', $text2find);
				$sSQL .= " where (" . 
						 $_f . ">=" . $this->spt($_prices[0]) . " and " .
						 $_f . "<=" . $this->spt($_prices[1]) . ") ";
			}
			else			
				$sSQL .= " where manufacturer=" . $db->qstr($text2find);
		  
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
			$this->get_max_result($text2find);																
	   	}
	}	
	
	protected function get_max_result($text2find=null,$filter=null) {
        $db = GetGlobal('db');
		$cat = GetReq('cat');	  		
		$cat_tree = explode($this->sep(), $cat);		
		$stype = GetParam('searchtype');
		$scase = GetParam('searchcase');

		$price = $this->read_policy();	
				
		$sSQL = "select count(id),min($price),max($price) from products where ";
		
		if ($text2find) {
		
			if (defined("SHNSEARCH_DPC")) {
				
				$mytext = $filter ? $this->replace_spchars($text2find,1) : $text2find; //search by user or filter
				
				$sfields = array(0=>$this->fcode,
								 1=>$this->itmname,
								 2=>$this->itmdescr,
								 3=>'itmremark',
								 4=>'manufacturer',
								 5=>'code4',
								 6=>'code3',
								);
				$serialf = serialize($sfields);
				$whereClause = _m("shnsearch.findsql use $mytext+$serialf+$stype+$scase");						  
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
			    $whereClause .= ' and cat0=' . $db->qstr($this->replace_spchars($cat_tree[0],1));		  
			if ($cat_tree[1])	
		 	    $whereClause .= 'and cat1=' . $db->qstr($this->replace_spchars($cat_tree[1],1));		 
			if ($cat_tree[2])	
			    $whereClause .= 'and cat2=' . $db->qstr($this->replace_spchars($cat_tree[2],1));		   
			if ($cat_tree[3])	
			    $whereClause .= 'and cat3=' . $db->qstr($this->replace_spchars($cat_tree[3],1));
		   						  
		}
		else {//katalog page	  
		    if ($cat_tree[0])
			    $whereClause .= ' cat0=' . $db->qstr($this->replace_spchars($cat_tree[0],1));	
			elseif ($this->onlyincategory)
			 	$whereClause .= ' cat1=\'\' ';					  
		    if ($cat_tree[1])	
		 	    $whereClause .= ' and cat1=' . $db->qstr($this->replace_spchars($cat_tree[1],1));
			elseif ($this->onlyincategory)
			 	$whereClause .= ' and cat1=\'\' ';						 
		    if ($cat_tree[2])	
			    $whereClause .= ' and cat2=' . $db->qstr($this->replace_spchars($cat_tree[2],1));		
			elseif ($this->onlyincategory)
			 	$whereClause .= ' and cat2=\'\' ';				   
		    if ($cat_tree[3])	
			    $whereClause .= ' and cat3=' . $db->qstr($this->replace_spchars($cat_tree[3],1));
			elseif ($this->onlyincategory)
			 	$whereClause .= ' and cat3=\'\' ';				   		
		}
		    
		$sSQL .= $whereClause;		
		
		if ($filter) {
			if (is_numeric($filter)) {
				//DISABLE TO NOT RE-FILTER	
				$_f = $this->read_policy();
				$_prices = explode('.', $filter);
				$sSQL .= " and (" . 
						 $_f . ">=" . $this->spt($_prices[0]) . " and " .
						 $_f . "<=" . $this->spt($_prices[1]) . ") "; 
			}
			else {		
				if (strstr($filter, ',')) {
					//multiple values
					$fl = explode(',', $filter);
					foreach ($fl as $feaf)
						$flf[] = "manufacturer='$feaf'";
					$sSQL .= ' and (' . implode(' OR ', $flf) . ')';	
				}
				else //single value
					$sSQL .= " and manufacturer=" . $db->qstr($filter);		
			}	
		}	
		$sSQL .= " and itmactive>0 and active>0";
	    $resultset = $db->Execute($sSQL);	
        $this->max_selection = $resultset->fields[0] ? $resultset->fields[0] : 0;
		
		/*min max prices (select without price filter) NOT RE-FILTERING*/
		$sSQL = "select count(id),min($price),max($price) from products where " . $whereClause;
		$sSQL .= " and itmactive>0 and active>0";	
	    $resultset = $db->Execute($sSQL);
		$this->min_price = $resultset->fields[1] ? $resultset->fields[1] : 0;
		$this->max_price = $resultset->fields[2] ? $resultset->fields[2] : 5000;
		//echo $sSQL;
		//echo $this->max_selection .',' . $this->min_price . '-' . $this->max_price;
		
		return ($this->max_selection);
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
				case 'LARGE' : echo @file_get_contents(getcwd().'/images/photo_bg/nopic.jpg'); break;
				case 'MEDIUM': echo @file_get_contents(getcwd().'/images/photo_md/nopic.jpg'); break;
				case 'SMALL' : echo @file_get_contents(getcwd().'/images/photo_sm/nopic.jpg'); break;
				default      : echo @file_get_contents(getcwd().'/images/photo_sm/nopic.jpg'); 
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
				$photo = _m("cmsrt.seturl use t=showimage&id=$code&type=$stype");
			else  
				$photo = '/' . $interface . '?id='.$code.'&type='.$stype;
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
		$cat = $mycat ? $mycat : GetReq('cat');  
		$a_name = $altname ? $altname : $code;   
	   
		$photo = $this->get_photo_url($code,$photosize);//define size
	   
	   	   
	    if (($imageclick==null) || ((is_numeric($imageclick)) && ($imageclick>=0))) {
	    
			if ($imageclick==1) {//phot url	
				$clickphoto = $clickphotosize ? $this->get_photo_url($code,$clickphotosize) : $this->get_photo_url($code,$photosize);
				$plink = "<a href=\"$photo\">";
				$lo = "<img src=\"" . $photo . "\"";
				$lo.= $y ? "height=\"$y\"" : null; 
				$lo.= "border=\"0\" alt=\"$a_name". localize('_IMAGE',$this->lan) . "\">" . "</a>"; 
				$ret = $plink . $lo;
			}
			elseif ($imageclick==2) {//product url
				$myresource = "<img src=\"" . $photo . "\"";
				$myresource.= "alt=\"$a_name". localize('_IMAGE',$this->lan) . "\">";
		  
				$purl = _m("cmsrt.url use t=kshow&cat=$cat&id=$code"); 
				$plink = "<a href=\"$purl\">";
				$ret = $plink . $myresource . "</a>";           
			}
			elseif ($imageclick==0) {//item link
				$myresource = "<img src=\"" . $photo . "\"";
				$myresource.= "alt=\"$a_name". localize('_IMAGE',$this->lan) . "\">";
				$ret = _m("cmsrt.url use t=kshow&cat=$cat&page=$page&id=$code+" . $myresource); 
			} 
			else {//item link
				$myresource = "<img src=\"" . $photo . "\"";
				$myresource.= "alt=\"$a_name". localize('_IMAGE',$this->lan) . "\">";		  
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
		$page = GetReq('page') ? GetReq('page') : 0;		

		if ($cat = GetReq('cat')) {		   
		  
			$cat_tree = explode($this->sep(), $cat); 
			
			$sSQL = $this->selectSQL;
			$sSQL .= " WHERE ";		   
		      	  
			if ($cat_tree[0])
				$whereClause .= ' cat0=' . $db->qstr($this->replace_spchars($cat_tree[0],1));		
			elseif ($this->onlyincategory)
				$whereClause .= ' (cat0 IS NULL OR cat0=\'\') ';				  
			if ($cat_tree[1])	
				$whereClause .= ' and cat1=' . $db->qstr($this->replace_spchars($cat_tree[1],1));	
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat1 IS NULL OR cat1=\'\') ';	 
			if ($cat_tree[2])	
				$whereClause .= ' and cat2=' . $db->qstr($this->replace_spchars($cat_tree[2],1));	
			elseif ($this->onlyincategory)
			 	$whereClause .= ' and (cat2 IS NULL OR cat2=\'\') ';		   
			if ($cat_tree[3])	
				$whereClause .= ' and cat3=' . $db->qstr($this->replace_spchars($cat_tree[3],1));
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
			
	        $this->get_max_result();				
	      
			if ($this->max_items==1) 
				return ($this->result->fields[$this->fcode]); //to view the item without click on dir		
		}	
		
		return null;
	}	
	
	/* filter */
	protected function fread_list() {
        $db = GetGlobal('db');	
		$page = GetReq('page') ? GetReq('page') : 0;			
		$cat = GetReq('cat');	
		$filter = GetParam('input');	
		
		if ($cat!=null) {		   
			$cat_tree = explode($this->sep(),$cat); 
			$sSQL = $this->selectSQL;
			$sSQL .= " WHERE ";		   
		      	  
			if ($cat_tree[0])
				$whereClause = ' cat0=' . $db->qstr($this->replace_spchars($cat_tree[0],1));		
			elseif ($this->onlyincategory)
				$whereClause .= ' (cat0 IS NULL OR cat0=\'\') ';				  
			if ($cat_tree[1])	
				$whereClause .= ' and cat1=' . $db->qstr($this->replace_spchars($cat_tree[1],1));	
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat1 IS NULL OR cat1=\'\') ';	 
			if ($cat_tree[2])	
				$whereClause .= ' and cat2=' . $db->qstr($this->replace_spchars($cat_tree[2],1));	
			elseif ($this->onlyincategory)
			 	$whereClause .= ' and (cat2 IS NULL OR cat2=\'\') ';		   
			if ($cat_tree[3])	
				$whereClause .= ' and cat3=' . $db->qstr($this->replace_spchars($cat_tree[3],1));
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat3 IS NULL OR cat3=\'\') ';
		   		
			$sSQL .= $whereClause;
		  
			if ($filter) {
				if (is_numeric($filter)) {
					$_f = $this->read_policy();
					$_prices = explode('.', $filter);
					$sSQL .= " and (" . 
							 $_f . ">=" . $this->spt($_prices[0]) . " and " .
							 $_f . "<=" . $this->spt($_prices[1]) . ") ";
				}
				else { 
					if (strstr($filter, ',')) {
						//multiple values
						$fl = explode(',', $filter);
						foreach ($fl as $feaf)
							$flf[] = "manufacturer='$feaf'";
						$sSQL .= ' and (' . implode(' OR ', $flf) . ')';	
					}
					else //single value
						$sSQL .= " and manufacturer=" . $db->qstr($filter);
				}	
			}
			$sSQL .= " and itmactive>0 and active>0";	
			$sSQL .= $this->orderSQL();
		  
			if ($this->pager) {
				$p = $page * $this->pager;
				$sSQL .= " LIMIT $p,".$this->pager; //page element count
			}
		  
			$resultset = $db->Execute($sSQL,2);
			$this->result = $resultset; 
			$this->max_items = $db->Affected_Rows();//count($this->result);
			
		    $this->get_max_result(null, $filter);		
			//$this->max_selection = $db->Affected_Rows();
	      
			if ($this->max_items==1) 
				return ($this->result->fields[$this->fcode]); //to view the item without click on dir			
		}
		
		return null;
	}

	/* tree read */
	protected function tread_list() {
        $db = GetGlobal('db');	
		$page = GetReq('page') ? GetReq('page') : 0;			
		$cat = GetReq('cat');
		$treeid = GetParam('treeid');
		
		//not a filter cmd = common cat read
		if (!$treeid) 
			return $this->read_list();
			
		list($treename, $treeleaf) = explode(':', $treeid);
		if ($treeleaf) {
			if (strstr($treeleaf, ',')) {
				//multiple values
				$tl = explode(',', $treeleaf);
				foreach ($tl as $leaf)
					$tlf[] = "ctreemap.tid='$leaf'";
				$tleafs = '(' . implode(' OR ', $tlf) . ')';	
			}
			else //single value
				$tleafs = "ctreemap.tid='$treeleaf'";
		}	
		else //not a filter value = common cat read
			return $this->read_list();	
		
		if ($cat!=null) {		   
			$cat_tree = explode($this->sep(),$cat); 
			$sSQL = str_replace(array(' id,', 'orderid,'), 
								array(' products.id,','products.orderid,'),
								$this->selectSQL);
			$sSQL .= ",ctreemap WHERE ctreemap.code=products.id and ";		   
			$sSQL .= $tleafs; //"ctreemap.tid='$treeleaf'";
		      	  
			if ($cat_tree[0])
				$whereClause = ' and cat0=' . $db->qstr($this->replace_spchars($cat_tree[0],1));		
			elseif ($this->onlyincategory)
				$whereClause .= ' (and cat0 IS NULL OR cat0=\'\') ';				  
			if ($cat_tree[1])	
				$whereClause .= ' and cat1=' . $db->qstr($this->replace_spchars($cat_tree[1],1));	
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat1 IS NULL OR cat1=\'\') ';	 
			if ($cat_tree[2])	
				$whereClause .= ' and cat2=' . $db->qstr($this->replace_spchars($cat_tree[2],1));	
			elseif ($this->onlyincategory)
			 	$whereClause .= ' and (cat2 IS NULL OR cat2=\'\') ';		   
			if ($cat_tree[3])	
				$whereClause .= ' and cat3=' . $db->qstr($this->replace_spchars($cat_tree[3],1));
			elseif ($this->onlyincategory)
				$whereClause .= ' and (cat3 IS NULL OR cat3=\'\') ';
		   		
			$sSQL .= $whereClause;
			$sSQL .= " and itmactive>0 and active>0";	
			$sSQL .= $this->orderSQL();
			/* ALL							
			if ($this->pager) {
				$p = $page * $this->pager;
				$sSQL .= " LIMIT $p,".$this->pager; //page element count
			}
		    */
			$resultset = $db->Execute($sSQL,2);
			$this->result = $resultset; 
			$this->max_items = $db->Affected_Rows();//count($this->result);
			
		    //$this->get_max_result(null, $filter);	
			$this->max_selection = $db->Affected_Rows();	
	      
			if ($this->max_items==1) 
				return ($this->result->fields[$this->fcode]); //to view the item without click on dir			
		}
		
		return null;
	}	
	
	/* xml read */
	protected function xmlread_list() {
        $db = GetGlobal('db');	 	
		$cat = GetReq('cat');				
		$xmlitems = GetReq('xml');		
		
	    $sSQL = $this->selectSQL;		
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
	
	protected function read_item($item_id=null) {
        $db = GetGlobal('db');	
		$item = $item_id ? $item_id : GetReq('id');
		$cat = GetReq('cat');
		$aliasID = _m("cmsrt.useUrlAlias");		
		
	    $sSQL = $this->selectSQL;	
		$sSQL .= " WHERE " . $this->fcode . "=" . $db->qstr($item);
		//$sSQL .= ($this->codetype=='string') ? $db->qstr($item) : $item; //DISABLED
		//extra code (url alias)
		$sSQL .= ($aliasID) ? " OR {$aliasID}=" . $db->qstr($this->stralias($item)) : null;
		  
		if (($lock = $this->itemlockparam) && (!GetGlobal('UserID')))
		    $sSQL .=  ' and ' . $lock . ' is null';		  	  
	   
	    $sSQL .= " LIMIT 1";
	   
	    $resultset = $db->Execute($sSQL,2);
	    $this->result = $resultset; 	
 
        //update session last viewed items
        $vitems = (array) unserialize(GetSessionParam('lastvieweditems'));	   
		//store default item code
	    $vitems[] = ($aliasID) ? $resultset->fields[$this->fcode] : $item;
	    if (count($vitems)>12) 
			$itemout = array_shift($vitems);
	   	
	    SetSessionParam('lastvieweditems',serialize($vitems));	   
	   
	    //return ($resultset); 
		return ($resultset->fields[$this->fcode]); //real code	
	}

	protected function pPage($p, $label, $cmd, $inp=null, $div=null) {
	    $cat = GetReq('cat');
	    $pcmd = $cmd ? $cmd : 'klist';		
		
		switch ($pcmd) {
			case 'ktree'  : $treeid = GetParam('treeid');
			                if ($this->filterajax) {
								$url = ($treeid) ? $this->httpurl . "/ktree/$cat/$treeid/$p/" :
												   _m("cmsrt.url use t=klist&cat=$cat&page=$p");
								$ret = "<a href=\"javascript:void()\" onClick=\"ajaxCall('$url','$div',1)\">" . strval($label) . "</a>";
							}	
							else
								$ret = ($treeid) ? _m("cmsrt.url use t=$pcmd&cat=$cat&treeid=$treeid&page=$p+" . strval($label)) :
												   _m("cmsrt.url use t=klist&cat=$cat&page=$p");
			                break;
							
			case 'kfilter': if ($this->filterajax) {
								$url = $this->httpurl .'/';
								$url.= ($inp) ? _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$p") :
												_m("cmsrt.url use t=klist&cat=$cat&page=$p");
								$ret = "<a href=\"javascript:void()\" onClick=\"ajaxCall('$url','$div',1)\">" . strval($label) . "</a>";
							}
							else
								$ret = ($inp) ? _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$p+" . strval($label)) :
												_m("cmsrt.url use t=klist&cat=$cat&page=$p");
							break;
							
			case 'filter' : 
			case 'search' : if ($p>0) {
								//ajax paging
								$url = $this->httpurl .'/';
								$url.= ($inp) ? _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&&page=$p") :
												_m("cmsrt.url use t=klist&cat=$cat&page=$p");
								$ret = "<a href=\"javascript:void()\" onClick=\"ajaxCall('$url','$div',1)\">" . strval($label) . "</a>";
							}
							else
								$ret =  ($inp) ? _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&page=$p+" . strval($label)) :
												 _m("cmsrt.url use t=klist&cat=$cat&page=$p");
			                break;
			default       : if ($p>0) {
								//ajax paging
								$url = $this->httpurl .'/';
								$url.= _m("cmsrt.url use t=$pcmd&cat=$cat&page=$p");
								$ret = "<a href=\"javascript:void()\" onClick=\"ajaxCall('$url','$div',1)\">" . strval($label) . "</a>";
							}
							else
								$ret = _m("cmsrt.url use t=$pcmd&cat=$cat&page=$p+" . strval($label));
		}
		
		return ($ret);
	}
	
	protected function show_paging($pagecmd=null,$mytemplate=null,$nopager=null) {
	    if ($nopager) return;
		 
	    $cat = GetReq('cat'); // asis	
		$inp = GetParam('input');
	    $t = $inp ? 'search' : GetReq('t'); 	
	    $page = GetReq('page') ? GetReq('page') : 0;
	    $pager = GetReq('pager') ? GetReq('pager') : $this->pager;
	    $pcmd = $pagecmd ? $pagecmd : 'klist';
		
		//ajax div
		$pcats = explode($this->sep(), $cat); 
		$section = 'page-' . array_pop($pcats);		
		  
	    //echo '|paging>',$this->max_items,':',$this->max_selection;
	    $mp = $this->max_selection;
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
					/*
					if (($pcmd=='filter') || ($pcmd=='search'))				 
						$next_page_no = _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&page=$p+" . strval($p+1)); 				
					elseif ($pcmd=='kfilter')
						$next_page_no = _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$p+" . strval($p+1)); 
					else		
						$next_page_no = _m("cmsrt.url use t=$pcmd&cat=$cat&page=$p+" . strval($p+1)); 
					*/
					$next_page_no = $this->pPage($p, $p+1, $pcmd, $inp, $section);
					$next .= $this->combine_tokens($tmplcontents, array(0=>'',1=>$next_page_no));
				}
				$m+=1;
			}	   
			if (($next) && (!$tmplcontents)) $next .= "|";
			/*$page_next = $page + 1;	
			if (($pcmd=='filter') || ($pcmd=='search'))	 		 
				$next_label = _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&page=$page_next+" . '&gt;');			
			elseif ($pcmd=='kfilter')
				$next_label = _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$page_next+" . '&gt;');
			else	
				$next_label = _m("cmsrt.url use t=$pcmd&cat=$cat&page=$page_next+" . '&gt;'); 
			*/
			$next_label = $this->pPage($page+1, '&gt;', $pcmd, $inp, $section);
			$next .= $this->combine_tokens($tmplcontents, array(0=>'',1=>$next_label));
		}
	    
	    if ($page>0) {
			/*$page_prev = $page - 1;
            if (($pcmd=='filter') || ($pcmd=='search'))			 
				$prev_label = _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&page=$page_prev+" . '&lt;'); 				
            elseif ($pcmd=='kfilter') 
				$prev_label = _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$page_prev+" . '&lt;'); 		 
			else	
				$prev_label = _m("cmsrt.url use t=$pcmd&cat=$cat&page=$page_prev+" . '&lt;'); 	 
			*/
			$prev_label = $this->pPage($page-1, '&lt;', $pcmd, $inp, $section);
			$prev = $this->combine_tokens($tmplcontents, array(0=>'',1=>$prev_label));	
		 
			//prev pages
			$m = $page-$cutter;
			for($p=0 ; $p<$page ; $p++) {
				if ($p>=$m) {
					/*if (($pcmd=='filter') || ($pcmd=='search'))	 
						$prev_page_no = _m("cmsrt.url use t=$pcmd&input=$inp&cat=$cat&page=$p+" . strval($p+1)); 				
					elseif ($pcmd=='kfilter') 
						$prev_page_no = _m("cmsrt.url use t=$pcmd&cat=$cat&input=$inp&page=$p+" . strval($p+1)); 
					else
						$prev_page_no = _m("cmsrt.url use t=$pcmd&cat=$cat&page=$p+" . strval($p+1)); 
					*/
					$prev_page_no = $this->pPage($p, $p+1, $pcmd, $inp, $section);
					$prev .= $this->combine_tokens($tmplcontents, array(0=>'',1=>$prev_page_no));
				}
			}  
	    }
		
	    $cpnum = $page+1;
		$currentpage = "<a href=\"javascript:gotoTop()\">$cpnum</a>";
	    $current = $this->combine_tokens($tmplcontents, array(0=>$this->pager_current_class ,1=>$currentpage));   
			
	    $page_titles = $prev . $current . $next;	  	
        $contents = $this->select_template('fppager');	   
	    $ret = $this->combine_tokens($contents, array(0=>$page_titles),true);	
	   
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
		
		$a = localize('_title', $this->lan);
		$b = localize('_axia', $this->lan);
		$c = localize('_code', $this->lan);	   
		$data = array(1=>$a,2=>$b,3=>$c);
		$do = ($this->deforder) ? 3 : 1;
 
		$url = (($cmd=='search') || ($cmd=='filter')) ? _m("cmsrt.seturl use t=$cmd&input=$inp&cat=$cat&order=#+++1")  : 
		                                                _m("cmsrt.seturl use t=$cmd&cat=$cat&order=#+++1")  ;
		$selected_order = GetReq('order') ? GetReq('order') : (GetSessionParam('order') ? GetSessionParam('order') : $do);
		$combo_char = $this->make_combo($url,$data,null,$selected_order,$style);
	   	      	   		   
		//asc/desc
		$a = localize('_asc', $this->lan);
		$b = localize('_desc', $this->lan);
		$data = array(1=>$a,2=>$b);
		$da = ($this->defasc<0) ? 2 : 1;
 
        $url = (($cmd=='search') || ($cmd=='filter')) ? _m("cmsrt.seturl use t=$cmd&input=$inp&cat=$cat&asc=#+++1")  : 
		                                                _m("cmsrt.seturl use t=$cmd&cat=$cat&asc=#+++1")  ;
		$selected_asc = GetReq('asc') ? GetReq('asc') : (GetSessionParam('asc') ? GetSessionParam('asc') : $do);   
		$combo_asceding = $this->make_combo($url,$data,null,$selected_asc,$style);
	   
		//pager
		$max = $this->max_selection;
	   
        $data2 = array();  	
	    for ($i=1;$i<4;$i++) {
			$n = ($this->default_pager * $i);
			$data2[$n] = localize('_array',$this->lan).' '.$n;
        }		  
		$url = (($cmd=='search') || ($cmd=='filter')) ? _m("cmsrt.seturl use t=$cmd&input=$inp&cat=$cat&pager=#+++1")  : 
		                                                _m("cmsrt.seturl use t=$cmd&cat=$cat&pager=#+++1")  ;
	    $combo_pager = $this->make_combo($url,$data2,null,$this->pager,$style);
	   	  		    	   	   		 	      
	    $contents = $this->select_template('fpsort');
		$tokens = array(0=>localize('_order',$this->lan), 1=>$combo_char, 2=>$combo_asceding, 3=>$combo_pager);
	    $out = $this->combine_tokens($contents, $tokens, true);	     
	   
	   return ($out);	      
	}		
	
	public function list_katalog($imageclick=null,$cmd=null,$template=null,$no_additional_info=null,$external_read=null,$photosize=null,$resources=null,$nopager=null,$nolinemax=null,$originfunction=null) {
	    $cmd = $cmd ? $cmd : 'klist';
	    $pz = $photosize ? $photosize : 1;		   	
        $cat = GetReq('cat');   
	    $custom_template = false;
	    $ogImage = array();

	    $mylinemax = ($nolinemax) ? null : $this->linemax;   
  
        if ($template) {  /*custom template list*/
			$custom_template = true;
			$tmpl = explode('.',$template);
			$mytemplate = $this->select_template($tmpl[0],$cat);		
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
					$this->read_item($is_one_item);
					$out = $this->show_item();
					return ($out);
				}		   
			}
			elseif (!$external_read) { //event read the list..if not called by a phpdac page call
				if ($itemcode = $this->my_one_item) {
					$this->read_item($itemcode);
					$out = $this->show_item();
					return ($out);		   
				}	   
			}		 
        } 	      
	   	
	    //if (!empty($this->result)) {		   
		if (count($this->result->fields)>1) {

			$aliasID = _m("cmsrt.useUrlAlias");
			$pp = $this->read_policy(); 
			
			foreach ($this->result as $n=>$rec) {
		
				$mem = memory_get_peak_usage(true);//memory_get_usage();
				
				$tokens = $this->tokenizeRecord($rec, $pp, true, $aliasID, $pz);
			  
				if (!$custom_template) {
					$items_grid[] = $this->combine_tokens($mytemplate, $tokens, true);
					$items_list[] = $this->combine_tokens($mytemplate_alt, $tokens, true);		  
				}
				else
					$items_custom[] = $this->combine_tokens($mytemplate, $tokens, true);
			
				$ogimage[] = $this->get_photo_url($rec[$this->fcode],2);
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
		else {
			if ($template = _m('cmsrt.select_template use emptyrecs')) {
				
				$tokens = array(0=>localize('_norec',$this->lan));
				$toprint .= $this->combine_tokens($template, $tokens, true);
			}
			//else
				//$toprint .= localize('_norec',$this->lan);			
		}

	    $out .= $toprint;

	    return ($out);	
	}	
	
    protected function list_katalog_table($linemax=2,$imgx=null,$imgy=null,$imageclick=0,$showasc=0,$cmd=null,$template=null,$no_additional_info=null,$lang=null,$external_read=null,$photosize=null,$resources=null,$nopager=null,$originfunction=null,$notable=null) {
		$cmd = $cmd ? $cmd : 'klist';	   
		$pz = $photosize ? $photosize : 1;
		$cat = GetReq('cat');	   
	   
		$mytemplate = $this->select_template($template,$cat);
	   
		if ($this->oneitemlist) {
			if (!$this->result->sql) { //AUTOMATED...when sql exist by prev query dont read a new
				$is_one_item = $this->read_list(); //read records
				if ($is_one_item) { 
					$this->read_item($is_one_item);
					$out = $this->show_item();
					return ($out);
				}		   
			}
			elseif (!$external_read) { //event read the list..if not called by a phpdac page call
				if ($itemcode = $this->my_one_item) {
					$this->read_item($itemcode);
					$out = $this->show_item();
					return ($out);		   
				}
			}		 
        } 		   

		if (!empty($this->result)) {
	   
			$pp = $this->read_policy();
	
			foreach ($this->result as $n=>$rec) {
		
				$mem = memory_get_peak_usage(true);//memory_get_usage();
				
				$tokens = $this->tokenizeRecord($rec, $pp, true, false, $pz);				
				$items[] = $this->combine_tokens($mytemplate, $tokens, true);	
				unset($tokens);													 
		   
			}//foreach	
	   
			if ($notable) {/*single product view called by phpdac funcs*/
				$nt = (!empty($items)) ? implode('', $items) : null;
				return ($nt);
			}	
			//else	
			//make table			
			$ret .= $this->make_table($items, $linemax, 'fpkatalogtable', $cat);  	  
	      				
			if ($this->pager) 
				$ret .= $this->show_paging($cmd,$mytemplate,$nopager);					
	    }	   
   
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
		 
		 //url alias or canonical	
		 $aliasID = _m("cmsrt.useUrlAlias");		
		 $aliasExt = _v("cmsrt.aliasExt");
	   
		 foreach ($this->result as $n=>$rec) {
			 
		    $id2 = $aliasID ? ($rec[$aliasID] ? $this->stralias($rec[$aliasID]) : $rec[$this->fcode]) : $rec[$this->fcode]; 			 
						 
			$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
		   	$price = ($rec[$pp]>0) ? $this->spt($rec[$pp]) : $this->zeroprice_msg;
	
		    $cart_code = $rec[$item_code];
			$cart_title = $this->replace_cartchars($rec[$this->itmname]);
			$cart_group = $cat;
			$cart_page = GetReq('page') ? GetReq('page') : 0;
			$cart_descr = $this->replace_cartchars($rec[$this->itmdescr]);
			$cart_photo = $rec[$item_code];//$this->get_photo_url($rec[$this->fcode],1);
			$cart_price = $price;
			$cart_qty = 1;//???
			if (defined("SHCART_DPC")) {
				$in_cart = _m("shcart.getCartItemQty use ".$rec[$item_code]); 
				//$icon_cart = _m("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;+$cat+$cart_page",1);
				$icon_cart = _m("shcart.showsymbol use $cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty;",1);
				$array_cart = $this->read_qty_policy($rec[$item_code],$price,"$cart_code;$cart_title;$path;$MYtemplate;$cart_group;$cart_page;;$cart_photo;$cart_price;$cart_qty");	   
				
			    $units = $rec['uniname2'] ? localize($rec['uniname1'],$lan).'/'.localize($rec['uniname2'],$lan):
				   						    localize($rec['uniname1'],$lan); 
                $lastprice = $this->getmapf('lastprice');											
			}	
			else
                $icon_cart = null;	
			
			$_u = _m("cmsrt.url use t=kshow&cat=$cat&id=".$rec[$item_code]);
			$itemlink =  $this->httpurl . '/' . $_u; 
		    $detailink = $this->httpurl . '/' . $_u . '#details'; 	   
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
			$tokens[] = $icon_cart;      //6
			$tokens[] = $availability;
			$tokens[] = ($aliasID) ? $this->httpurl ."/$cat/$id2" . $aliasExt . '#details' : $detailink;	
			$tokens[] = $details;
			$tokens[] = $rec[$item_code]; //10
			 
			$tokens[] = $in_cart ? $in_cart : '0';
			$tokens[] = $array_cart;

            $tokens[] = $ahtml;
			$tokens[] = $atext;  			 
			$tokens[] = $afile;
			 
            $tokens[] = $rec[$lastprice];	
            $tokens[] = $this->get_photo_url($rec[$item_code],1);
            $tokens[] = $this->get_photo_url($rec[$item_code],2);			 
			$tokens[] = $this->get_photo_url($rec[$item_code],3);			 
			 
			$tokens[] = $rec['weight'];  //20
			$tokens[] = $rec['volume'];
			$tokens[] = $rec['dimensions'];
			$tokens[] = $rec['size'];
			$tokens[] = $rec['color'];	
			 
			$tokens[] = $this->get_xml_links(); //$cat ?
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
            $tokens[] = $rec['itmactive'];	//40

			$tokens[] = $this->item_has_points($rec[$item_code]);

			$tokens[] = $rec['p1']; 
			$tokens[] = $rec['p2']; 
			$tokens[] = $rec['p3'];
			$tokens[] = $rec['p4'];
			$tokens[] = $rec['p5'];			
			 
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
				$out = ($goto = $this->itemlockgoto) ? _m($goto) : localize('_lockrec',$this->lan);
			else { 
				if ($template = _m('cmsrt.select_template use emptyrec')) {
				
					$tokens = array(0=>localize('_norec',$this->lan));
					$out = $this->combine_tokens($template, $tokens, true);
				}
				else
					$out = localize('_norec',$this->lan);
			}	
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
	
	    $template= $tmpl ? $tmpl : 'fpitemaddfiles';	    	
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
                
					default:$addtional_photo_link = _m("cmsrt.seturl use t=kshow&cat=$cat&id=" . GetReq('id') . "&thub=" . $i . "#photo+++1"); 
			                $plink = "<a href=\"$addtional_photo_link\">";				  
			                $lo = "<img src=\"" . $ad_photo_big . "\" border=\"0\" alt=\"". localize('_IMAGE',$this->lan) . "\">" . "</a>"; 
			                $adnphoto = $plink . $lo;
			 
			                $remarks = 'PHOTO';			 
							$tokens = array(0=>$id.$i,
											1=>'',
											2=>$adnphoto,
											3=>$remarks,
											4=>$slide_index,
											5=>$ad_photo_big,
											6=>$slide_index-1,
											);
                            $items[] =  $this->combine_tokens($mytemplate,$tokens, true);

			 
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
		$slan =  ($this->one_attachment) ? $slan : $this->lan; 
		 
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
		$pz = $photosize ? $photosize : 1;		
	                                                                             
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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;		
		
		if ($linemax>1)
			$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_p use $p,$items");
		else  	
			$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_p use $p,$items");
		  
		return ($out);	
	}		
	
	public function show_lastentries($items=10,$days=12,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$photosize=null,$nopager=null) {
        $db = GetGlobal('db');		
		$mydays = $days ? $days : 12;
	    $date2check = time() - ($mydays * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);
		$pz = $photosize ? $photosize : 1;			

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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;//free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$nopager);
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$nopager,$linemax);
		  
		return ($out);	
	}		
	
	public function show_kategory_offers($category=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null) {
        $db = GetGlobal('db');			
		$c = $category ? $category : GetReq('cat');
		$cat = explode($this->sep(),$c);			
		$pz = $photosize ? $photosize : 1;		

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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;// free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$nopager);
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$nopager,$linemax);
		  
		return ($out);	
	}		
	
	public function show_pcat($p,$category=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_pcat use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_pcat use $p,$category,$items");
		  
		return ($out);	
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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_lastincat use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_lastincat use $p,$category,$items");
		  
		return ($out);	
	}		

	public function show_orderid($ascdesc=null,$category=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_orderid use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_orderid use $p,$category,$items");
		  
		return ($out);	
	}	
	
	public function show_orderidis($orderid=null,$items=10,$linemax=null,$imgx=100,$imgy=75,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');		
		$mycat = $category ? $category : GetReq('cat');	   			
		$pz = $photosize ? $photosize : 1;			

        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";		
			
		$sSQL .= "orderid = $orderid and orderid IS NOT NULL and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY orderid ";
		$sSQL .= $this->bypass_order_list ? null : ",{$this->itmname} {$this->sortdef} ";		
		$sSQL .= $items ? " LIMIT " . $items : null;			
	    //echo $sSQL,'<br>';
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_orderidis use $p,$category,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,null,$linemax,"shkatalogmedia.show_orderidis use $p,$category,$items");
		  
		return ($out);	
	}	
	
	public function show_resources($contition,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$ofield=null,$desc=null) {
        $db = GetGlobal('db');					
		$pz = $photosize ? $photosize : 1;	
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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null; //free y 75;		
		
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
		$pz = $photosize ? $photosize : 1;	

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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;//free y 75;		
		
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
		$pz = $photosize ? $photosize : 1;	

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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;//free y 75;		
		
		if ($linemax>1)
		  $out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_special use $contition,$items");
		else  	
          $out = $this->list_katalog(null,null,$template,$ainfo,null,$external_read,$pz,1,1,1,"shkatalogmedia.show_special use $contition,$items");
		  
		return ($out);	
	}	
	
	public function show_special_online($field2check,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$key=null) {
        $db = GetGlobal('db');
		$dbbuffer = GetGlobal('_sqlbuffer');		
		$pz = $photosize ? $photosize : 1;						
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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;//free y 75;		
		
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
		$db = GetGlobal('db');	
		$myid = $id ? $id : GetReq('id');		
		$pz = $photosize ? $photosize : 1;	  	    
	
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
		
				$xmax = $imgx ? $imgx : 100;
				$ymax = $imgy ? $imgy : null;//free y 75;		
		
				if ($linemax>1)
					$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_relative_sales use $myid,$items");
				else  	
					$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,1,1,"shkatalogmedia.show_relative_sales use $myid,$items");
			}	 		 		 
		}
		return ($out);  
	}
	
	public function show_kategory_items($category=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$xor=null) {
        $db = GetGlobal('db');			
		$mycat = $category ? $category : GetReq('cat');		   
		$cat = explode($this->sep(),$mycat);		
		$pz = $photosize ? $photosize : 1;		
				
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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;//free y 75;	
		
		if ($linemax>1) 
			$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,1,1,"shkatalogmedia.show_kategory_items use $category,$items");
		else  	
			$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,null,1,1,"shkatalogmedia.show_kategory_items use $category,$items"); 
		  
		return ($out);	
	}		
	
	public function show_offers($items=10,$cat=null,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null,$notable=null) {
        $db = GetGlobal('db');				
		$pz = $photosize ? $photosize : 1;			

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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;// free y 75;		
		
		if ($linemax>1)
			$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$resources,$nopager,null,$notable);
		else  	
			$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$nopager,$linemax);
		  
		return ($out);	
	}	
	
	public function show_menu_items($menu=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$xor=null) {
        $db = GetGlobal('db');	
		$pz = $photosize ? $photosize : 1;			
		
		if (defined('CMSMENU_DPC')) {
			
			$list = _m('cmsmenu.readMenuElements use ' . $menu);
			if (empty($list)) return null;
			$menulist = implode("','",$list);
			
			$sSQL = $this->selectSQL;
			$sSQL .= " WHERE ";	
			$sSQL .= $this->fcode . " in ('". $menulist ."') and itmactive>0 and active>0";
			$sSQL .= " ORDER BY FIELD({$this->fcode}, '". $menulist ."')";
			$sSQL .= $items ? " LIMIT " . $items : null;	
			//echo $sSQL;
			$resultset = $db->Execute($sSQL);	
			$this->result = $resultset;
		
			$xmax = $imgx ? $imgx : 100;
			$ymax = $imgy ? $imgy : null;// free y 75;		
		
			if ($linemax>1)
				$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$resources,$nopager,null,$notable);
			else  	
				$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$nopager,$linemax);		
		}
		
		return ($out);
	}		
	
	public function show_last_viewed_items_session($items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null,$notable=null) {
        $db = GetGlobal('db');
        $UserName = GetGlobal('UserName');						
		$c = $category ? $category : GetReq('cat');	
		
		$cat = explode($this->sep(),$c);		
	    $date2check = time() - ($days * 24 * 60 * 60);
	    $entrydate = date('Y-m-d',$date2check);		
		$pz = $photosize ? $photosize : 1;
		$resources = 1;

        $lastviewed = unserialize(GetSessionParam('lastvieweditems')); 
		if (!empty($lastviewed)) {	
			$ilist = implode("','",array_reverse($lastviewed));
		
			$sSQL = $this->selectSQL;
			$sSQL .= " WHERE " . $this->fcode." in ('". $ilist ."')";
			$sSQL .= " and itmactive>0 and active>0";				

			$resultset = $db->Execute($sSQL,2);	
			$this->result = $resultset;
		
			$xmax = $imgx ? $imgx : 100;
			$ymax = $imgy ? $imgy : null;// free y 75;		

			if ($linemax>1)
				$out = $this->list_katalog_table($linemax,$xmax,$ymax,$imageclick,0,null,$template,$ainfo,null,$external_read,$pz,$resources,$nopager,null,$notable);
			else  	
				$out = $this->list_katalog(null,null,$template,$ainfo,$external_read,$pz,$resources,$nopager,1);
		}
		
		return ($out);				
	}	
	
	//alias
	public function show_last_viewed_items($items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$nopager=null,$notable=null) {
		
		return $this->show_last_viewed_items_session($items,$linemax,$imgx,$imgy,$imageclick,$template,$ainfo,$external_read,$photosize,$nopager,$notable);
	}	
	
	public function show_last_edited_items($items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$photosize=null,$nopager=null) {	
	    $limit = $items ? $items : 5;
        $db = GetGlobal('db');	
		$pz = $photosize?$photosize:1;		
		$lastprice = $this->getmapf('lastprice')?','.$this->getmapf('lastprice'):null;	
		 
		if ($this->one_attachment)
			$slan = null;
		else
			$slan = $this->lan;
		 
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

	//for sitemap call
	public function show_sitemap_items($category=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null,$xor=null) {
        $db = GetGlobal('db');		
		$mycat = $category ? $category : GetReq('cat');	   
		$cat = explode($this->sep(),$mycat);		
		$pz = $photosize ? $photosize : 1;		
				
		//auto browse current cat
		$fields = $this->result->fields; //prev query exclude cat		
		
	    $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";		  		  
		$sSQL .= "itmactive>0 and active>0";	
		$sSQL .= " ORDER BY datein DESC LIMIT 2000";		
	    //echo $sSQL;
		
	    $resultset = $db->Execute($sSQL,2);	
		$this->result = $resultset;
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;//free y 75;	
		
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
		$meter = $start ? $start-1 : 0; 
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
			 
					$itemlinkname = _m("cmsrt.url use t=kshow&cat=$linkcat&id=".$rec[$this->fcode]."+".$title); 		   
			 
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
	
	public function read_item_attr($code=null,$attr=null,$islink=null) {
        $db = GetGlobal('db');					
		$item = $code ? $code : GetReq('id');	
		
        $sSQL = $this->selectSQL;
		$sSQL .= " WHERE ";
		$sSQL .= $this->fcode . "= '" . $item ."'";
	    $resultset = $db->Execute($sSQL,2);	
		$result = $resultset;

	    foreach ($result as $n=>$rec) {
			if ($islink) {
				$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));	      			      		   
				$itemlink = _m("cmsrt.url use t=kshow&cat=$cat&id=". $rec[$this->fcode] ."+". $rec[$attr]); 
				return ($itemlink);
			}
			else
				return ($rec[$attr]);	
		}  									
	}
	
	public function read_item_weight($itemsarray=null,$items=10,$linemax=null,$imgx=100,$imgy=null,$imageclick=0,$template=null,$ainfo=null,$external_read=null,$photosize=null) {
        $db = GetGlobal('db');						
		$pz = $photosize ? $photosize : 1;	
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
		
		$xmax = $imgx ? $imgx : 100;
		$ymax = $imgy ? $imgy : null;//free y 75;		
		
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
	
	
	//XML FEEDS
	
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
				   $cat_url = $this->httpurl . '/' . $_u; 
			
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
				    $item_url = $this->httpurl . '/' . $_u; 
                    if ($this->photodb)
						$item_photo_url = $this->httpurl . '/showphoto.php?id='.$rec[$code].'&type=LARGE';
				    else
						$item_photo_url = $this->httpurl . '/' . $this->img_large . '/' . $rec[$code] . $this->restype;
				   
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
				$item_url = $this->httpurl . '/' . $_u; 

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
			                    $xml->addtag('skroutzstore',null,null,"url={$this->httpurl}|name=$xml->urltitle|encoding=$enc");							
	                            $xml->addtag('products','skroutzstore',null,null);
								break;
				case 'rss1'    : echo 'rss1';
	   					        break; 								
				case 'rss2'    : $enc ='utf-8';
			                    $xml->addtag('rss',null,null,"version=2.0");							
	                            $xml->addtag('channel','rss',$xml->urltitle,null);
	                            $xml->addtag('title','channel',$xml->urltitle.', '.$cat_title,null);								
	                            $xml->addtag('link','channel',$this->httpurl,null);									
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
	                            $xml->addtag('link','feed','/',"href=" . $this->httpurl . "/atom/|rel=self");									
	                            $xml->addtag('link','feed','/',"href=" . $this->httpurl);									
	                            $xml->addtag('id','feed',null,null);									
	                            $xml->addtag('updated','feed',null,null);									
	                            $xml->addtag('author','feed',$xml->urltitle,null);	
	                            $xml->addtag('name','author',$xml->urltitle,null);																	
	                            $xml->addtag('email','author',null,null);									
	   					        break; 								
				default        : $xml->addtag('default-xml',null,null,"url={$this->httpurl}|name=$xml->urltitle|encoding=$enc");							
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
		$lan = $mylan ? $mylan : getlocal();
		$lnk = array();
		$id = GetReq('id');
		$cat = GetReq('cat'); //echo $cat;
		$page = GetReq('page') ? GetReq('page') : '0';
		$feed_cmd = $feed_id ? $feed_id : 'feed';	  

		$mytemplate = $this->select_template('xml-links');
	  
		//RSS	
		if (stristr($this->feed_on,'rss')) {
			if ($dpcfeed) //special phpdac page without params			  
				$lnk['RSS'] = _m("cmsrt.url use t=$feed_cmd&dpc=$dpcfeed&format=rss2"); 
			elseif ($id)
				$lnk['RSS'] = _m("cmsrt.url use t=$feed_cmd&cat=$cat&page=$page&id=$id&format=rss2"); 
			elseif ($cat)
				$lnk['RSS'] = _m("cmsrt.url use t=$feed_cmd&cat=$cat&page=$page&format=rss2"); 
			else  
				$lnk['RSS'] = _m("cmsrt.url use t=$feed_cmd&format=rss2"); 
		}
		//ATOM
		if (stristr($this->feed_on,'atom')) {	  
			if ($dpcfeed) //special phpdac page without params		  
				$lnk['ATOM'] = _m("cmsrt.url use t=$feed_cmd&dpc=$dpcfeed&format=atom"); 
			elseif ($id)
				$lnk['ATOM'] = _m("cmsrt.url use t=$feed_cmd&cat=$cat&page=$page&id=$id&format=atom"); 
			elseif ($cat)
				$lnk['ATOM'] = _m("cmsrt.url use t=$feed_cmd&cat=$cat&page=$page&format=atom"); 
			else  
				$lnk['ATOM'] = _m("cmsrt.url use t=$feed_cmd&format=atom"); 	  
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
	   $lan = GetReq('lan')>=0 ? GetReq('lan') : $this->lan;	//in case of post sitemap set lan param uri   
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
		$format = GetReq('format') ? GetReq('format') : 'sitemap';			

		$xmltemplate = $this->select_template($format);
		$xmltemplate_products = $this->select_template($format . '-items');
		$imgxmlPath = _m('cmsrt.paramload use CMS+xmlpics'); //else use img token	
		
		//$aliasID = _m("cmsrt.useUrlAlias");
		$aliasID = false; //DISABLED
 
		$items = array();
		
		$pp = $this->read_policy(); 
	    	
		foreach ($this->result as $n=>$rec) {	
			
			$tokens = $this->tokenizeRecord($rec, $pp, null, $aliasID, 2, $imgxmlPath);
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

	protected function tokenizeRecord($rec, $priceID=null, $cart=null, $aliasID=false, $imgsize=1, $otherimgpath=null) {
		if (!$rec) return null;
		$tokens = array(); 
		$pp = $priceID ? $priceID : 'price1';
		
		//url alias or canonical	
		$id2 = $aliasID ? ($rec[$aliasID] ? $this->stralias($rec[$aliasID]) : $rec[$this->fcode]) : $rec[$this->fcode]; 		
		$aliasExt = _v("cmsrt.aliasExt");
			
		$cat = $this->getkategoriesS(array(0=>$rec['cat0'],1=>$rec['cat1'],2=>$rec['cat2'],3=>$rec['cat3'],4=>$rec['cat4']));
		$price = ($rec[$pp]>0) ? $this->spt($rec[$pp]) : $this->zeroprice_msg;
		$availability = $this->show_availability($rec['ypoloipo1']);	
		$details = null;
        $detailink = $this->httpurl . '/' . _m("cmsrt.url use t=kshow&cat=$cat&id=".$rec[$this->fcode]) . '#details';
		$itemlink = $this->httpurl . '/' . _m("cmsrt.url use t=kshow&cat=$cat&id=".$rec[$this->fcode]); 
		$itemlinkname = _m("cmsrt.url use t=kshow&cat=$cat&id=" . $rec[$this->fcode] . "+". $rec[$this->itmname]);
			
		//tokens
		$tokens[] = $itemlinkname; //***use href token 11 / name token 16
		$tokens[] = $rec[$this->itmdescr];
		$tokens[] = $this->list_photo($rec[$this->fcode],null,null,1,$cat,$imgsize,null,$rec[$this->itmname]);
		$units = $rec['uniname2'] ? localize($rec['uniname1'], $this->lan) .' / '. localize($rec['uniname2'], $this->lan):
										localize($rec['uniname1'], $this->lan);  
		$tokens[] = $units;		  
			  
		$tokens[] = $rec['itmremark'];
		$tokens[] = number_format(floatval($price),$this->decimals,',','.');
			
		if (($cart==true) && (defined("SHCART_DPC"))) {
			$page = $_GET['page'] ? $_GET['page'] : 0;

			$cartstr = $rec[$this->fcode].';'.
						$this->replace_cartchars($rec[$this->itmname]).';;;'.
						$cat.';'.$page.';;'.$rec[$this->fcode].';'.$price.';1;';				
							
			$tokens[] = _m("shcart.showsymbol use $cartstr",1);			
		}	
		else
            $tokens[] = null;			
			
		$tokens[] = $availability;
		$tokens[] = $details;
		$tokens[] = $detailink;
		$tokens[] = $rec[$this->fcode]; //10
			
		$tokens[] = ($aliasID) ? $this->httpurl ."/$cat/$id2" . $aliasExt : 
							     $itemlink;	
			  
		$tokens[] = (($cart==true) && (defined("SHCART_DPC"))) ?
						_m("shcart.getCartItemQty use ".$rec[$this->fcode]) : '0';
		$tokens[] = (($cart==true) && (defined("SHCART_DPC"))) ? 
						$this->read_qty_policy($rec[$this->fcode],$price,"$cart_code;$cart_title;;;$cat;$cart_page;;$cart_photo;$cart_price;$cart_qty",1) : null;

        $tokens[] = ($otherimgpath) ?
		            $this->httpurl . '/' . $otherimgpath . $rec[$this->fcode] . $this->restype :
		            $this->httpurl . $this->get_photo_url($rec[$this->fcode], $imgsize);	
						
        $tokens[] = $rec[$this->getmapf('lastprice')];	
        $tokens[] = $rec[$this->itmname]; 
        $tokens[] = _m("cmsrt.replace_spchars use $cat+1");  

        $tokens[] = $this->item_has_discount($rec[$this->fcode]);
			
		$cart_title = $this->replace_cartchars($rec[$this->itmname]);
        $tokens[] = $this->httpurl . "/addcart/{$rec[$this->fcode]};$cart_title;;;$cat;0;;{$rec[$this->fcode]};$price;1/$cat/1/";				  
		      
		/*date time */
		$tokens[] = $rec['year'];  //20
		$tokens[] = $rec['month'];
		$tokens[] = $rec['day'];
		$tokens[] = $rec['time'];
		$tokens[] = $rec['monthname']; 
			  
		$tokens[] = $rec['template'];
		$tokens[] = $rec['owner'];			  
		$tokens[] = $rec['itmactive'];
			
		$tokens[] = $this->item_has_points($rec[$this->fcode]);
			
		$tokens[] = $rec['p1']; 
		$tokens[] = $rec['p2']; //30
		$tokens[] = $rec['p3'];
		$tokens[] = $rec['p4'];
		$tokens[] = $rec['p5'];
			
		$tokens[] = $rec['weight'];
		$tokens[] = $rec['volume'];
		$tokens[] = $rec['dimensions'];
		$tokens[] = $rec['size'];
		$tokens[] = $rec['color'];				
		$tokens[] = $rec['manufacturer'];

		$tokens[] = $rec['code1']; //40
		$tokens[] = $rec['code2'];				
		$tokens[] = $rec['code3'];			
		$tokens[] = $rec['code4'];	
		$tokens[] = $rec['resources']; 
		$tokens[] = $rec['ypoloipo1'] ;
		$tokens[] = $rec['ypoloipo1'] ? '1' : '0';				
			
		$pwt = $this->pricewithtax($price, _v('shcart.tax'));
		$tokens[] = number_format($pwt, $this->decimals,',','.'); //(floatval($price)*24/100)+floatval($price)
				
		return ($tokens);
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
	
	//FILTERS
	//manufacturer standart item field
	public function filter($field=null, $template=null, $incategory=null, $cmd=null, $header=null) {	
		if (!$field) return;
		
	    $db = GetGlobal('db');		
		$baseurl = $this->httpurl . '/'; //ie compatibility		
		$command = $cmd ? $cmd : 'search';
		$stype = GetParam('searchtype');
		$scase = GetParam('searchcase');
		$cat = GetParam('cat');	
		$input = GetReq('input');
		
		if (!$cat) {
			
			return null;
			
			//no filter results when no cat, select cat
			/*$combo = _m('shkategories.getKategoryCombo use 1++++++++search+search-combo+1');
			return '<ul class="categories-filter animate-dropdown">
                <li class="dropdown">
                    <a class="dropdown-toggle"  data-toggle="dropdown" href="#">'.localize('SHKATEGORIES_DPC', $this->lan).'</a>
                    <ul class="dropdown-menu" role="menu" >'.
					$combo.'
					</ul>
                </li>
            </ul>';*/
		}	
	  
		$contents = ($this->filterajax) ? $this->select_template('searchfilter-ajax') : $this->select_template('searchfilter');
		//$contents = $this->select_template('searchfilter');
		
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
		
		if ((defined("SHNSEARCH_DPC")) && ($input)) {
			
		   	$where .= $where ? ' AND ' : null;
			
			$sfields = array(0=>$this->fcode,
							 1=>$this->itmname,
							 2=>$this->itmdescr,
							 3=>'itmremark',
							 /*4=>'manufacturer',*/
							);
			$serialf = serialize($sfields);			
			$where .= _m("shnsearch.findsql use $input+$serialf+$stype+$scase");		  
        }		

		$sSQL .= $where ? $where . ' AND ' : null;
		$sSQL .= " itmactive>0 and active>0";
		$sSQL .= " group by " . $field;
		//echo $sSQL;	  
	  
		$result = $db->Execute($sSQL,2); 
	  
		if (!empty($result)) {
			//ajax div
			$pcats = explode($this->sep(), $cat); 
			$section = 'page-' . array_pop($pcats); 
			
			$tokens = array(); 
			$r = array();				
			foreach ($result as $n=>$t) {
				if (trim($t[0])!='') {
			        $f = $this->replace_spchars($t[0]);
					//$url = $baseurl . _m("cmsrt.url use t=$command&cat=$cat&input=$f"); 
					//$theurl = ($this->filterajax) ? "filter('{$url}', '{$section}')" : $url;
					//$theurl = $url;
					$url = $this->httpurl . "/$command/$cat/"; 
					$theurl = ($this->filterajax) ? "filter('$url','$section','filter0')" : $url;
										
					$tokens[] = $t[0];
					$tokens[] = $t[1];
					$tokens[] = $theurl;
					$tokens[] = ($t[0] == $this->replace_spchars($input,1)) ? 'checked="checked"' : null;
					$r[] = $this->combine_tokens($contents,$tokens);	
					unset($tokens);		
                }				
			}	   
			
			//header and not ajax
			if ((!$this->filterajax) && ($header)) {	
				$tokens[] = localize('_ALL',$this->lan);
				$tokens[] = $input ? '*' : $this->max_selection;
				$tokens[] = $baseurl . _m("cmsrt.url use t=klist&cat=$cat");
				$tokens[] = (!$input) ? 'checked="checked"' : null;
				$r[] = $this->combine_tokens($contents,$tokens);
				unset($tokens);
			}				
		}		
       
		$ret = (empty($r)) ? null : implode('',$r);	
		return ($ret);  
	}	
	
	//view on current item selection and tree groups
	public function filterExt($treename=null) {	
	    $db = GetGlobal('db');	
        if (!$treename) return null;			
		$seltreeid = GetReq('treeid');		
		if (!$cat = GetParam('cat'))
			return null;

		$content = $this->select_template('extfilter');			
		$linecontent = ($this->filterajax) ? 
						$this->select_template('extfilterline-ajax') :
					    $this->select_template('extfilterline') ;

		$sSQL = "select tname,tname{$this->lan},active,tid from ctree where active=1 and tname='$treename'";
		$res = $db->Execute($sSQL);
			
		if (!$active = $res->fields[2]) 
			return null;
		
		$parent = $res->fields[3];
		
		$toks[] = $res->fields[1] ? $res->fields[1] : $res->fields[0];								
		
		$s = array();
	    $cats = $cat ? explode($this->sep(), $cat) : null;
		if (!empty($cats)) {
			foreach ($cats as $c=>$mycat)
				$s[] = 'cat'.$c ." ='" . $this->replace_spchars($mycat,1) . "'";		  	  
		}  
		$subwhere = (!empty($s)) ? implode(" AND ", $s) : null;			
		$where = ($subwhere) ? 
					$subwhere . " AND itmactive>0 and active>0" : 
					" itmactive>0 and active>0";	
		
		$sSQL = "select ctree.tid,ctree.tname,ctree.tname{$this->lan} from ctreemap,ctree where ";
		$sSQL.= "code IN (select id from products where $where) ";
		$sSQL.= "and ctreemap.tid=ctree.tid and ctree.pid='$parent' group by ctree.tid order by ctree.orderid,ctree.id";
		//echo $sSQL;
		$res = $db->Execute($sSQL); 

		if (!empty($res)) {
			//ajax div
			$pcats = explode($this->sep(), $cat); 
			$section = 'page-' . array_pop($pcats); 
			//single name for one filter applied url
			//or common name for all filters applied url			
			$treename = 'filter1';		
			
			$tokens = array(); 			
			$r = array();			
			foreach ($res as $n=>$rec) {
				$treeid = $treename . ':' . $rec[0]; //0
				//$url = $this->httpurl . '/' . _m("cmsrt.url use t=ktree&cat=$cat&treeid=$treeid");
				//$theurl = ($this->filterajax) ? "sndReqArg('$url','$section')" : $url;
				$url = $this->httpurl . "/ktree/$cat/$treename:";
				$theurl = ($this->filterajax) ? "filter('$url','$section','$treename')" : $url .'/';
							
				$tokens[0] = $rec[2] ? $rec[2] : $rec[1]; //title
				$tokens[1] = $rec[0]; //value
				$tokens[2] = $theurl; //ajax url
				$tokens[3] = ($rec[1] == $seltreeid) ? 'checked="checked"' : null;
				$tokens[4] = $treename; 
				$r[] = $this->combine_tokens($linecontent,$tokens);	
				unset($tokens);					
			}	

			if (!empty($r)) {
				$toks[] = implode('',$r);	
				$ret = $this->combine_tokens($content,$toks);
				unset($toks);	  			
			}	
		}
		
		return ($ret); 
    }
	
	//all tree groups, view in any category
	public function filterExtAll() {
	    $db = GetGlobal('db');			
		if (!$cat = GetParam('cat'))
			return null;
		
		$content = $this->select_template('extfilter');			
		$linecontent = ($this->filterajax) ? 
						$this->select_template('extfilterline-ajax') :
					    $this->select_template('extfilterline') ;	
		
		$sSQL = "select tid,tname,tname{$this->lan} from ctree where ";
		$sSQL.= "active=1 and pid='0' and items=1 ";
		$sSQL.= "order by orderid";
		//echo $sSQL;
		$res = $db->Execute($sSQL); 
		if (!empty($res)) {
			foreach ($res as $n=>$rec) {			
				$groupname = $rec[1];
				$toks[] = $rec[2] ? $rec[2] : $rec[1];
				
				$sSQL = "select tid,tname,tname{$this->lan} from ctree where ";
				$sSQL.= "active=1 and pid='{$rec[0]}' and items=1 ";
				$sSQL.= "order by orderid";
				//echo $sSQL;
				$res = $db->Execute($sSQL);
				if (!empty($res)) {
					
					$r = array();
					foreach ($res as $n=>$rec) {
						$treeid = $groupname . ':' . $rec[0]; 
						$url = $this->httpurl . '/' . _m("cmsrt.url use t=ktree&cat=$cat&treeid=$treeid");
						//$theurl = ($this->filterajax) ? "sndReqArg('$url','$section')" : $url;
						$theurl = ($this->filterajax) ? "filter('$url','$section','$groupname')" : $url;
										
						$tokens[0] = $rec[2] ? $rec[2] : $rec[1];
						$tokens[1] = '*';
						$tokens[2] = $theurl;	
						$tokens[3] = ($rec[1] == $seltreeid) ? 'checked="checked"' : null;
						$tokens[4] = $groupname;
						$r[] = $this->combine_tokens($linecontent,$tokens);	
						unset($tokens);							
					}
					
					$toks[] = (empty($r)) ? null : implode('',$r);	
					$ret .= $this->combine_tokens($content,$toks);					
					unset($toks);
				}		
			}			
		}
		
		return ($ret);	
	}

	

	//CART PRICE QTY POLICY	
	
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

	//select price type..overriten error when no cart
	public function spt($price,$tax=null) {

		if ($tax) 
			$p = $this->pricewithtax($price, $tax);	  
		elseif ($this->is_reseller) 
			$p = $price;
		elseif ((defined('SHCART_DPC')) && (_v('shcart.showtaxretail'))) 
			$p = $this->pricewithtax($price, _v('shcart.tax'));
		else
			$p = $price;		

		return ($p);
	}
	
	public function read_policy($leeid=null) {
		 
		$v = $this->is_reseller ? $this->pprice[0] : $this->pprice[1]; 
		return ($v);
	}			
	
	public function read_qty_policy($itemcode=null,$price=null,$cart_details=null,$policyqty=null) {
		$db = GetGlobal('db');		
		$cat = GetReq('cat');
		$cart_page = GetReq('page') ? GetReq('page') : 0;	  	
		$cartd = explode(';',$cart_details);		

		$sSQL = "select data from ppolicyres where ispoints=0 and code=" . $db->qstr($itemcode);
		$res = $db->Execute($sSQL);
	
		if ($res->fields[0]) {	  
	
			$data_array = @parse_ini_string(base64_decode($res->fields[0]), 1, INI_SCANNER_RAW);
			//print_r($data_array);
			if ($policyqty) {
				if (is_array($data_array['QTY'])) {
					foreach ($data_array['QTY'] as $ix=>$ax) {
						if ($policyqty>=$ax) {
							$pc = intval($data_array['PRICE'][$ix]);
							$retprice = $price ? $price+($price*$pc/100) : $pc;
						}
					}
					return ($retprice);
				}
			}
			else {  //2nd item cart pick
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
					//$data[] = _m("shcart.showsymbol use $cartout;+$cat+$cart_page+0+".$cartd[9],1);
					$data[] = _m("shcart.showsymbol use $cartout;+0+".$cartd[9],1);
					$data[] = $itemcode;
					$data[] = "addcart/$cartout/$cat/0/";
					$body .= $this->combine_tokens($mylooptemplate,$data,true);	
					unset($data);			  
				}		
				//echo $body;
				return ($body); 				
			} 
		}	
		
		return null;
	}	
	
	public function read_point_policy($id=null) {
		if (!$id) return 0;		
		$db = GetGlobal('db');

		$sSQL = "select data from ppolicyres where ispoints=1 and code=" . $db->qstr($id);
		$res = $db->Execute($sSQL);

		if ($data = base64_decode($res->fields[0])) {
			return _m('cmsrt.phpcode use ' . $data);
		}
			
		return 0;		
	}			
	
	public function item_has_points($id=null) {
		if ((!$this->loyalty) || (!$id)) return null;	

		return $this->read_point_policy($id);	
	}	
	
	public function item_has_discount($id=null) {
		if (!$id) return false;
		$db = GetGlobal('db');

		$sSQL = "select data from ppolicyres where ispoints=0 and code=" . $db->qstr($id);
		$res = $db->Execute($sSQL);

		if ($data = base64_decode($res->fields[0])) {	
			return true;
		}

		/*$file = $this->path . $id . '.txt';
		
		if (is_readable($file)) 
		    return true;*/
			
		return false;	
	}	
	
	
	
	
	//set ordersing online using <phpdac>
	public function set_order($orderby=null,$asc=null) {

		$this->myorderby = $orderby ? $orderby : null;
		$this->myasc = $asc;  
	}
		
	public function show_availability($qty=null) {
		if (!$this->availability) 
			return 0;

		$r_scale = array_reverse($this->availability,1);
		
		foreach ($r_scale as $i=>$s) 
			if (floatval($qty)>=floatval($s)) return ($i+1);

		return 0;
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
	
	public function replace_cartchars($string, $reverse=false) {
		if (!$string) return null;

		$g1 = array("'",',','"','+','/',' ','-&-');
		$g2 = array('_','~',"*","plus",":",'-','-n-');		
	  
		return $reverse ? str_replace($g2,$g1,$string) : str_replace($g1,$g2,$string);
	}	
	
	public function stralias($string) {
		if (!$string) return null;

		$g1 = array("'",',','"','+','/',' ','&','.');
		$g2 = array('-','-',"-","-","-",'-','-','-');		
	  
		$str = str_replace($g1,$g2,$string);
		return ($str);
		
		$ret = trim(preg_replace('/\s\s+/', '-', $str));
		return ($ret);
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

	public function fnum($n, $dec_digits, $dp=null, $tp=null) {
	  $dec = $dp ? $dp : $this->decimals;
      $ret = number_format(floatval($n),$dec_digits,$dec,$tp);
      return ($ret);	  
	}	
	
	public function pricewithtax($price,$tax=null) {
	
		if ($tax) {
			$mytax = ((floatval($price) * $tax)/100);	
			$value = (floatval($price) + $mytax);		  
		}
		else {
			if (defined('SHCART_DPC')) {
				$tax = _v('shcart.tax'); 
				$mytax = ((floatval($price) * $tax)/100);	
				$value = (floatval($price) + $mytax);		  
			}
			else		
				$value = floatval($price);
		}	
	
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
	
	public function encode_image_id($id=null) {
	    if (!$id) return null;
		$out = _m("cmsrt.encode_image_id use $id+".$this->encodeimageid); //$this->encodeimageid ? md5($id) : $id;
        return $out;
	}		

	protected function sep() {
		$s = _v('cmsrt.cseparator'); //$this->cseparator;
		return $s;
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
	
	/*cat based select */
	protected function select_template($tmpl=null,$cat=null) {
		if (!$tmpl) return null;		
		return _m("shkategories.select_template use $tmpl+$cat");
	}
	
	//tokens method	
	protected function combine_tokens(&$template_contents, $tokens, $execafter=null) {
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

		for ($x=$i;$x<60;$x++)
			$ret = str_replace("$".$x."$",'',$ret);
		
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