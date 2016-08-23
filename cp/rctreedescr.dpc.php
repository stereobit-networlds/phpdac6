<?php

$__DPCSEC['RCTREEDESCR_DPC']='1;1;1;1;1;1;2;2;9;9;9';

if ( (!defined("RCTREEDESCR_DPC")) && (seclevel('RCTREEDESCR_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCTREEDESCR_DPC",true);

$__DPC['RCTREEDESCR_DPC'] = 'rctreedescr';


$__EVENTS['RCTREEDESCR_DPC'][0]='cptreedescr';
$__EVENTS['RCTREEDESCR_DPC'][1]='cpsavetree';
$__EVENTS['RCTREEDESCR_DPC'][2]='cploadtree';
$__EVENTS['RCTREEDESCR_DPC'][3]='cptreeframe';
$__EVENTS['RCTREEDESCR_DPC'][4]='cptreeitems';
$__EVENTS['RCTREEDESCR_DPC'][5]='cptreeusers';

$__ACTIONS['RCTREEDESCR_DPC'][0]='cptreedescr';
$__ACTIONS['RCTREEDESCR_DPC'][1]='cpsavetree';
$__ACTIONS['RCTREEDESCR_DPC'][2]='cploadtree';
$__ACTIONS['RCTREEDESCR_DPC'][3]='cptreeframe';
$__ACTIONS['RCTREEDESCR_DPC'][4]='cptreeitems';
$__ACTIONS['RCTREEDESCR_DPC'][5]='cptreeusers';

$__LOCALE['RCTREEDESCR_DPC'][0]='RCTREEDESCR_DPC;Tree descriptor;Προσδιοριστικά χαρακτηριστικά';
$__LOCALE['RCTREEDESCR_DPC'][1]='_date;Date;Ημερ.';
$__LOCALE['RCTREEDESCR_DPC'][2]='_time;Time;Ώρα';
$__LOCALE['RCTREEDESCR_DPC'][3]='_qty;Quantity;Ποσότητα';
$__LOCALE['RCTREEDESCR_DPC'][4]='_items;Items;Είδη';
$__LOCALE['RCTREEDESCR_DPC'][5]='_active;Active;Ενεργό';
$__LOCALE['RCTREEDESCR_DPC'][6]='_title;Title;Τίτλος';
$__LOCALE['RCTREEDESCR_DPC'][7]='_descr;Description;Περιγραφή';
$__LOCALE['RCTREEDESCR_DPC'][8]='_xml;Xml;Xml';
$__LOCALE['RCTREEDESCR_DPC'][9]='_color;Color;Χρώμα';
$__LOCALE['RCTREEDESCR_DPC'][10]='_code;Code;Κωδικός';
$__LOCALE['RCTREEDESCR_DPC'][11]='_dimensions;Dimension;Διαστάσεις';
$__LOCALE['RCTREEDESCR_DPC'][12]='_size;Size;Μέγεθος';
$__LOCALE['RCTREEDESCR_DPC'][13]='_dimensions;Dimensions;Διαστάσεις';
$__LOCALE['RCTREEDESCR_DPC'][14]='_xmlcreate;Create XML;Δημιούργησε XML';
$__LOCALE['RCTREEDESCR_DPC'][15]='_xml;XML item;Είδος XML';
$__LOCALE['RCTREEDESCR_DPC'][16]='_manufacturer;Manufacturer;Κατασκευαστής';
$__LOCALE['RCTREEDESCR_DPC'][17]='_uniname1;Unit;Μον.μετρ.';
$__LOCALE['RCTREEDESCR_DPC'][18]='_ypoloipo1;Qty;Υπόλοιπο';
$__LOCALE['RCTREEDESCR_DPC'][19]='_price0;Price 1;Αξία 1';
$__LOCALE['RCTREEDESCR_DPC'][20]='_price1;Price 2;Αξία 2';
$__LOCALE['RCTREEDESCR_DPC'][21]='_treedescr;Tree descriptors;Προσδιοριστικά χαρακτηριστικά';
$__LOCALE['RCTREEDESCR_DPC'][22]='_treeattach;Map objects;Επισύναψη χαρακτηριστικού';
$__LOCALE['RCTREEDESCR_DPC'][23]='_items;Items;Προϊόντα';
$__LOCALE['RCTREEDESCR_DPC'][24]='_users;Users;Χρήστες';
$__LOCALE['RCTREEDESCR_DPC'][25]='_mode;Select;Επιλογή';
$__LOCALE['RCTREEDESCR_DPC'][26]='_cats;Categories;Κατηγορίες';
$__LOCALE['RCTREEDESCR_DPC'][27]='_ctgid;Id;A/A';
$__LOCALE['RCTREEDESCR_DPC'][28]='_ctgoutline;Branch;Κλαδί';
$__LOCALE['RCTREEDESCR_DPC'][29]='_ctgoutlnorder;Branch order;Ταξινόμηση';
$__LOCALE['RCTREEDESCR_DPC'][30]='_search;Search;Αναζητήσιμο';
$__LOCALE['RCTREEDESCR_DPC'][31]='_active;Active;Ενεργό';
$__LOCALE['RCTREEDESCR_DPC'][32]='_view;Show;Εμφανές';
$__LOCALE['RCTREEDESCR_DPC'][33]='_OK;Success;Επιτυχώς';
$__LOCALE['RCTREEDESCR_DPC'][34]='_cat0;Category 1;Κατηγορία 1';
$__LOCALE['RCTREEDESCR_DPC'][35]='_cat1;Category 2;Κατηγορία 2';
$__LOCALE['RCTREEDESCR_DPC'][36]='_cat2;Category 3;Κατηγορία 3';
$__LOCALE['RCTREEDESCR_DPC'][37]='_cat3;Category 4;Κατηγορία 4';
$__LOCALE['RCTREEDESCR_DPC'][38]='_cat4;Category 5;Κατηγορία 5';
$__LOCALE['RCTREEDESCR_DPC'][39]='_id;ID;ID';
$__LOCALE['RCTREEDESCR_DPC'][40]='_tree;Tree;Δέντρο';
$__LOCALE['RCTREEDESCR_DPC'][41]='_leaf;Childs;Παιδιά';
$__LOCALE['RCTREEDESCR_DPC'][42]='_rel;Relation;Σχέση';
$__LOCALE['RCTREEDESCR_DPC'][43]='_active;Active;Ενεργό';
$__LOCALE['RCTREEDESCR_DPC'][44]='_timein;Date;Ημερομηνία';
$__LOCALE['RCTREEDESCR_DPC'][45]='_id;ID;ID';
$__LOCALE['RCTREEDESCR_DPC'][46]='_title;Title;Τίτλος';
$__LOCALE['RCTREEDESCR_DPC'][47]='_descr;Description;Περιγραφή';
$__LOCALE['RCTREEDESCR_DPC'][48]='_code;Code;Κωδικός';
$__LOCALE['RCTREEDESCR_DPC'][49]='_parent;Parent;Σχέση';
$__LOCALE['RCTREEDESCR_DPC'][50]='_orderid;Order;Σειρά';
$__LOCALE['RCTREEDESCR_DPC'][51]='_title0;Title L1;Τίτλος L1';
$__LOCALE['RCTREEDESCR_DPC'][52]='_title1;Title L2;Τίτλος L2';
$__LOCALE['RCTREEDESCR_DPC'][53]='_title2;Title L3;Τίτλος L3';
$__LOCALE['RCTREEDESCR_DPC'][54]='_fields;Fields;Πεδία';

class rctreedescr {
	
	var $title, $prpath, $urlpath, $url;
	var $map_t, $map_f, $cseparator, $onlyincategory;
	var $listName;
	
	var $imgxval, $imgyval, $image_size_path;
	var $selected_items, $autoresize, $restype, $odd;	
	
	var $filename, $fields, $photodb, $sizeDB;
	var $owner, $fid, $echoSQL;

    function __construct() {
	  
		$this->prpath = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');	
		$this->url = paramload('SHELL','urlbase');
		$this->title = localize('RCTREEDESCR_DPC',getlocal());

		$this->owner = GetSessionParam('LoginName');	
		
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
		
		$this->photodb = remote_paramload('RCITEMS','photodb',$this->prpath);
		
		$ip = remote_paramload('RCTREEDESCR','imagepath',$this->prpath);
		$ipath = $ip ? $ip : '/images/';
		$ia = remote_paramload('RCTREEDESCR','imageabs',$this->prpath);
		if (!$ia) {
			$pt = remote_paramload('RCITEMS','phototype',$this->prpath);	
			$csize = remote_paramload('RCTREEDESCR','itemphotosize',$this->prpath);
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
		
		$this->selected_items = null;		
		
        $this->listName = 'mytreelist';
        $this->savedlist = GetSessionParam($this->listName) ? GetSessionParam($this->listName) : null;
	
		$this->fid = GetSessionParam('fid') ? GetSessionParam('fid') : GetReq('fid');
		$this->echoSQL = false; //true;
	}
	
    function event($event=null) {
	
	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;				

       if (!$this->msg) {
  
	     switch ($event) {
			 
			case 'cptreeframe'    : echo $this->loadframe();
		                            die(); 
			 
			case 'cptreeusers'    : //break;
			case 'cptreeitems'    : if ($fid = $this->fid) {
										SetSessionParam('fid', $fid); //save fid 
										//$fidparam = "&fid=" . $fid;
									}
			                        break;			 
			 
		    case 'cploadtree'     : //$this->savedlist = $this->loadList(); 
			                        break;			 
		 
		    case 'cpsavetree'     : $this->savedlist = $this->saveList();				
	                                break;									
			case 'cptreedescr'    :
			default               :							  
         }
      }
    }	

    function action($action=null)  {

	     $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	     if ($login!='yes') return null;		

	     switch ($action) {
			 
		   case 'cptreeframe'    :  break;	 
			 
		   case 'cptreeusers'    :  break;
		   case 'cptreeitems'    :  break;			 	 
		   
		   case 'cploadtree'     :  break;		   
		   
		   case 'cpsavetree'     :  $out = 'Filename:' . $this->filename . '<br/>';
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
								   
		   case 'cptreedescr'    :						   
		   default               :  $out = $this->gridMode();
		                           //$out = $this->savedlist;
		 }			 

	     return ($out);
	}
	
	
	protected function loadframe($mode=null) {
		$selectmode = $mode ? $mode : GetReq('mode');
		$id = GetReq('id');
		$fidparam = $this->fid ? "&fid=" . $this->fid : null;
		
		switch ($selectmode) {
			case 'users' : $bodyurl = seturl("t=cptreeusers&mode=users&id=". $id); break;
			case 'cats'  : $bodyurl = seturl("t=cptreeitems&mode=cats&id=". $id . $fidparam); break;
			case 'items' : $bodyurl = seturl("t=cptreeitems&mode=items&id=". $id . $fidparam); break;
			case 'tree'  : 
			default      : $bodyurl = seturl("t=cptreeitems&mode=tree&id=". $id . $fidparam);
		}
			
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"500px\"><p>Your browser does not support iframes</p></iframe>";    

		return ($frame); 
	}		
		
	protected function gridMode() {
		$mode = GetReq('mode') ? GetReq('mode') : 'tree';
        
		$turl0 = seturl('t=cptreedescr&mode=items');		
		$turl1 = seturl('t=cptreedescr&mode=cats');
		//$turl2 = seturl('t=cptreedescr&mode=users');
		$turl3 = seturl('t=cptreedescr&mode=tree');
		$button = $this->createButton(localize('_mode', getlocal()), 
										array(localize('_items', getlocal())=>$turl0,
											  localize('_cats', getlocal())=>$turl1,
										      //localize('_users', getlocal())=>$turl2,
											  localize('_tree', getlocal())=>$turl3,
		                                ),'success');		
																	
		switch ($mode) {
	        case 'tree'     : $content = $this->tree_grid(null,140,5,'r', true); break;
	        case 'cats'     : $content = $this->categories_grid(null,140,5,'r', true); break;
			case 'items'    : $content = $this->items_grid(null,140,5,'r', true); break;  
			default         : $content = $this->tree_grid(null,140,5,'r', true);
		}			
					
		$ret = $this->window(localize('_treedescr', getlocal()).': '.localize('_'.$mode, getlocal()), $button, $content);
		
		return ($ret);
	}	

	protected function tree_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_tree', getlocal()); 
		
        $xsSQL = "SELECT * from (select id,timein,active,tid,pid,tname,tdescr,tname0,tname1,tname2,items,users,orderid from ctree) o ";		   
					
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('id',getlocal())."|2|0|");		
		//GetGlobal('controller')->calldpc_method("mygrid.column use grid1+itmactive|".localize('_active',getlocal())."|2|0|");//"|boolean|1|1:0");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+active|".localize('_active',getlocal())."|boolean|1|1:0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+timein|".localize('_date',getlocal())."|5|0|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+tid|".localize('_code',getlocal())."|5|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+pid|".localize('_parent',getlocal())."|5|1|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+tname|".localize('_title',getlocal())."|link|10|"."javascript:ttree(\"{tid}\");".'||');	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+tdescr|".localize('_descr',getlocal())."|5|0|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+tname0|".localize('_title0',getlocal())."|5|1|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+tname1|".localize('_title1',getlocal())."|5|1|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+tname2|".localize('_title2',getlocal())."|5|1|");			
		//GetGlobal('controller')->calldpc_method("mygrid.column use grid1+manufacturer|".localize('_manufacturer',getlocal())."|5|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+items|".localize('_items',getlocal())."|boolean|1|1:0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+users|".localize('_users',getlocal())."|boolean|1|1:0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+orderid|".localize('_orderid',getlocal())."|2|1|");

		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+ctree+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}	
	
	protected function items_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_items', getlocal()); 
		
        $xsSQL = "SELECT * from (select id,sysins,code5,xml,itmactive,active,itmname,uniname1,ypoloipo1,price0,price1,manufacturer,size,color from products) o ";		   
		//code3,cat0,cat1,cat2,cat3,cat4,resources
		   							
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('id',getlocal())."|2|0|");//"|link|5|"."javascript:editform(\"{id}\");".'||');			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+itmactive|".localize('_active',getlocal())."|2|0|");//"|boolean|1|1:0");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+active|".localize('_active',getlocal())."|2|0|");//"|boolean|1|101:0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+sysins|".localize('_date',getlocal())."|5|0|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+code5|".localize('_code',getlocal())."|5|0|");	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+itmname|".localize('_title',getlocal())."|link|10|"."javascript:titems(\"{id}\");".'||');	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+uniname1|".localize('_uniname1',getlocal())."|5|0|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+ypoloipo1|".localize('_ypoloipo1',getlocal())."|5|1|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+price0|".localize('_price0',getlocal())."|5|1|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+price1|".localize('_price1',getlocal())."|5|1|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+manufacturer|".localize('_manufacturer',getlocal())."|5|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+size|".localize('_size',getlocal())."|5|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+color|".localize('_color',getlocal())."|5|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+xml|".localize('_xml',getlocal())."|link|2|"."javascript:tusers(\"{code5}\");".'||');

		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+products+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}

    protected function categories_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 440;
        $rows = $rows ? $rows : 18;
        $width = $width ? $width : null; //wide
        $mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;
		$title = localize('_cats', getlocal());							   
        $lan = getlocal()?getlocal():0;
	
		$myfields = 'id,ctgid,';
		$mytitles = localize('id',getlocal()) . ',' . localize('_ctgid',getlocal()) . ',';
		$myfields .= "cat1,cat2,cat3,cat4,cat{$lan}1,";
		$myfields .= "cat{$lan}2,cat{$lan}3,cat{$lan}4,cat{$lan}5,";
		$mytitles .= localize('_cat0',$lan).','.localize('_cat1',$lan).','.localize('_cat2',$lan).','.localize('_cat3',$lan).','.localize('_cat4',$lan).','.localize('_cat0',$lan).',';
		$mytitles .= localize('_cat1',getlocal()) .','.localize('_cat2',$lan).','.localize('_cat3',$lan).','.localize('_cat4',$lan).',';		
		
		$myfields .= 'active,view,search';
		$mytitles .= localize('_active',getlocal()) . ',' . localize('_view',getlocal()) . ',' . localize('_search',getlocal());
		
		$CS = $this->cseparator;

		$xsSQL = 'select * from (select '.$myfields . ' from categories) as o';
		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+id|".localize('_id',getlocal())."|2|1|");	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+ctgid|".localize('_ctgid',getlocal())."|2|1|");
		//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat1|".localize('_cat0',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat2|".localize('_cat1',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat3|".localize('_cat2',getlocal())."|5|1|");				
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat4|".localize('_cat3',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat5|".localize('_cat4',getlocal())."|5|1|");			
		//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat{$lan}1|".localize('_cat0',getlocal())."|link|10|"."javascript:tcats(\"{cat1}\");".'||');
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat{$lan}2|".localize('_cat1',getlocal())."|link|10|"."javascript:tcats(\"{cat2}\");".'||');
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat{$lan}3|".localize('_cat2',getlocal())."|link|10|"."javascript:tcats(\"{cat2}$CS{cat3}\");".'||');				
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat{$lan}4|".localize('_cat3',getlocal())."|link|10|"."javascript:tcats(\"{cat2}$CS{cat3}$CS{cat4}\");".'||');
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat{$lan}5|".localize('_cat4',getlocal())."|link|10|"."javascript:tcats(\"{cat2}$CS{cat3}$CS{cat4}$CS{cat5}\");".'||');
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+active|".localize('_active',getlocal()).'|boolean|1');	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+search|".localize('_search',getlocal()).'|boolean|1');	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+view|".localize('_view',getlocal()).'|boolean|1');	
		
		$out .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid2+categories+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width");
			
		return ($out);
	
    }	
	
	protected function createButton($name=null, $urls=null, $t=null, $s=null) {
		$type = $t ? $t : 'primary'; //danger /warning / info /success
		switch ($s) {
			case 'large' : $size = 'btn-large '; break;
			case 'small' : $size = 'btn-small '; break;
			case 'mini'  : $size = 'btn-mini '; break;
			default      : $size = null;
		}
		
		//$ret = "<button class=\"btn  btn-primary\" type=\"button\">Primary</button>";
		
		if (!empty($urls)) {
			foreach ($urls as $n=>$url)
				$links .= '<li><a href="'.$url.'">'.$n.'</a></li>';
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
							<hr/><div id="crmform"></div>
							</div>
							'.  $content .'
                        </div>
                  </div>
                </div>
            </div>
';
		return ($ret);
	}	
	
	public function currentSelectedTreeType() {
		$db = GetGlobal('db');		
		$tid = GetParam('id');
		
		$sSQL = 'select items,users from ctree where tid=' . $db->qstr($tid);
		$result = $db->Execute($sSQL);
		
		$isitemstype = $result->fields[0];
		$isuserstype = $result->fields[1];
		
		$ret = $isitemstype ? 1 : ($isuserstype ? 2 : 0);
		//echo $ret;
		return ($ret);
	}	
	
	public function currentSelectedTree() {
		$db = GetGlobal('db');		
		$lan = getlocal() ?  getlocal() : '0';
		$tid = GetParam('id');
		
		$sSQL = 'select tname, tname0, tname1, tname2 from ctree where tid=' . $db->qstr($tid);
		$result = $db->Execute($sSQL);
		
		$ret = $result->fields['tname'.$lan] ? $result->fields['tname'.$lan] : $result->fields[0];
		return ($ret);
	}
	
	//select field to display
	public function selectFieldUrl($field=null) {
		$t=GetReq('t');
		$id = GetReq('id');
		$mode = GetReq('mode');
		
		switch ($field) {
			case 'qty' :
			default    : $fid = $field ? $field : $this->getmapf('code');
		}
		
		$ret = seturl("t=$t&mode=$mode&id=$id&fid=". $fid);
		
		return ($ret);
	}
	
	public function selectFieldButton() {
		
		$turl0 = $this->selectFieldUrl('datein');		
		$turl1 = $this->selectFieldUrl('code1');
		$turl2 = $this->selectFieldUrl('code2');
		$turl3 = $this->selectFieldUrl('code3');
		$turl4 = $this->selectFieldUrl('code4');
		$turl5 = $this->selectFieldUrl('code5');		
		
		$turl6 = $this->selectFieldUrl('itmactive');
		$turl7 = $this->selectFieldUrl('active');
		$turl8 = $this->selectFieldUrl('uniname1');
		$turl9 = $this->selectFieldUrl('uniname2');
		$turl10 = $this->selectFieldUrl('price0');
		$turl11 = $this->selectFieldUrl('price1');
		
		$turl12 = $this->selectFieldUrl('id');
		
		$button = $this->createButton(localize('_fields', getlocal()), 
										array(localize('date', getlocal())=>$turl0,
										      localize('code0', getlocal())=>$turl12,
											  localize('code1', getlocal())=>$turl1,
										      localize('code2', getlocal())=>$turl2,
											  localize('code3', getlocal())=>$turl3,
											  localize('code4', getlocal())=>$turl4,
											  localize('code5', getlocal())=>$turl5,
											  localize('active', getlocal())=>$turl6,
										      localize('itmactive', getlocal())=>$turl7,
											  localize('uniname1', getlocal())=>$turl8,
											  localize('uniname2', getlocal())=>$turl9,
											  localize('price0', getlocal())=>$turl10,											  
											  localize('price1', getlocal())=>$turl11,
		                                ));//,'success');		
		
		return ($button);
	}	
	

	//exclude existed session items
    protected function getCurrentSessionList() {
		$db = GetGlobal('db');
	    $lan = getlocal();
	    $itmname = $lan ? 'itmname':'itmfname';
	    $itmdescr = $lan ? 'itmdescr':'itmfdescr';		
		$code = $this->fid ? $this->fid : $this->getmapf('code');
		
		$cpGet = GetGlobal('controller')->calldpc_var('rcpmenu.cpGet');

        switch (GetReq('mode')) { 
			case 'cats'  : $cat = GetReq('id'); break;
			case 'items' : $id = GetReq('id'); break;
			case 'tree'  :			
			default      : $id = $cpGet['id'];
					       $cat = $cpGet['cat'];	
		}		
		
		$sSQL = 'select id,'.$code.',' . $itmname .' from products where ';
		
		if ($id) {
			//$sSQL .= $code . '=' . $db->qstr($id);
			$sSQL .= 'id =' . $db->qstr($id);
		}	
		elseif ($cat) {
			
			$cat_tree = explode($this->cseparator,str_replace('_',' ',$cat));
			/////////////////////////////////// $db->qstr($this->replace_spchars($cat_tree[0],1))...
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
		
		//$sSQL .= " and itmactive>0 and active>0";			   
		$sSQL .= " ORDER BY " . $itmname;	//order unselected list by name	
		
		if ($this->echoSQL)
			echo $sSQL . '<br/>';
		
	    $resultset = $db->Execute($sSQL,2);	
		foreach ($resultset as $n=>$rec) {
			$ret[] = "<option value='".$rec['id']."'>". $rec[$code].'-'.$rec[$itmname]."</option>" ;
        }		

		return (implode('',$ret));	
	}
	
	//exclude existed tree map items and session items
    protected function getCurrentTreeList() {
		$db = GetGlobal('db');
	    $lan = getlocal();
	    $itmname = $lan ? 'itmname':'itmfname';
	    $itmdescr = $lan ? 'itmdescr':'itmfdescr';		
		$code = $this->fid ? $this->fid : $this->getmapf('code');
		$tid = GetParam('id');
		
		$cpGet = GetGlobal('controller')->calldpc_var('rcpmenu.cpGet');

        switch (GetReq('mode')) { 
			case 'cats'  : $cat = GetReq('id'); break;
			case 'items' : $id = GetReq('id'); break;
			case 'tree'  :			
			default      : $id = $cpGet['id'];
					       $cat = $cpGet['cat'];	
		}		
		
		$sSQL = 'select id,'.$code.',' . $itmname .' from products where ';
		
		if ($id) {
			$sSQL .= $code . '=' . $db->qstr($id);
		}	
		elseif ($cat) {
			
			$cat_tree = explode($this->cseparator,str_replace('_',' ',$cat));
			/////////////////////////////////// $db->qstr($this->replace_spchars($cat_tree[0],1))...
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
		
		//check session
        if (!empty($_POST[$this->listName]))    
            $plist = implode(',',$_POST[$this->listName]);

        if ($sl = GetSessionParam($this->listName)) 
			$plist .= ($plist ? ','. $sl : $sl);			
			
		if ($plist)
			$sSQL .= ' and id not in (' . $plist . ')';
		
		//check tree maps
		if (isset($tid)) {
			$treeSQL = "select code from ctreemap WHERE tid=" . $db->qstr($tid);
			$sSQL .= ' and id not in (' . $treeSQL . ')';
		}	
		
		//$sSQL .= " and itmactive>0 and active>0";			   
		$sSQL .= " ORDER BY " . $itmname;	//order unselected list by name	
		
		if ($this->echoSQL)
			echo $sSQL . '<br/>';
		
	    $resultset = $db->Execute($sSQL,2);	
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			$ret[] = "<option value='".$rec['id']."'>". $rec[$code].'-'.$rec[$itmname]."</option>" ;
        }		

		return (implode('',$ret));	
	}	

    public function getCurrentList() {
		
        switch (GetReq('mode')) { 
			case 'tree'  : $ret = $this->getCurrentTreeList(); break;		
			case 'cats'  : 
			case 'items' : 
			default      : $ret = $this->getCurrentSessionList();
		}	
		
		return ($ret);
    }	

	
	//include session items	
	protected function viewSessionList() {
		$db = GetGlobal('db');
	    $lan = getlocal();
	    $itmname = $lan ? 'itmname':'itmfname';
	    $itmdescr = $lan ? 'itmdescr':'itmfdescr';		
		$code = $this->fid ? $this->fid : $this->getmapf('code');
		
		if (!empty($_POST[$this->listName]))  
			$plist = implode(',', $_POST[$this->listName]);	
        else
			$plist = null;	
		
		$list = $this->savedlist ? $this->savedlist .','.$plist : $plist;
		if (!$list) return ;
		
		$sSQL = 'select id,'.$code.',' . $itmname .' from products where ';
		$sSQL .= ' id in (' . $this->savedlist . ')';
		//$sSQL .= " and itmactive>0 and active>0";			   
		$sSQL .= " ORDER BY FIELD(id,".  $this->savedlist .")";

		if ($this->echoSQL)
			echo $sSQL . '<br/>';
		
	    $resultset = $db->Execute($sSQL,2);	
		
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			$ret[] = "<option value='".$rec['id']."'>". $rec[$code].'-'.$rec[$itmname]."</option>" ;
        }		

		return (implode('',$ret));			
	}	
	
	//include tree map items or session items
	protected function viewTreeList() {
		$db = GetGlobal('db');
	    $lan = getlocal();
	    $itmname = $lan ? 'itmname':'itmfname';
	    $itmdescr = $lan ? 'itmdescr':'itmfdescr';		
		$code = $this->fid ? $this->fid : $this->getmapf('code');
		$tid = GetParam('id');
		
		$sSQL = 'select id,'.$code.',' . $itmname .' from products where ';
			
		//check session	
		if (!empty($_POST[$this->listName]))  
			$plist = implode(',', $_POST[$this->listName]);	
        else
			$plist = null;	
		
		$list = $this->savedlist ? $this->savedlist .','.$plist : $plist;
		if ($list)
			$sesSQL = ' id in (' . $this->savedlist . ')';
			
		//check tree maps
		if (isset($tid)) {
			$treeSQL = "select code from ctreemap WHERE tid=" . $db->qstr($tid);			
			$sSQL .= $sesSQL ? $sesSQL . ' OR id in (' . $treeSQL . ')' : ' id in (' . $treeSQL . ')';
		}
		else
			$sSQL .= $sesSQL;
			
		//$sSQL .= " and itmactive>0 and active>0";			   
		$sSQL .= " ORDER BY " . $code; //FIELD(id,".  $this->savedlist .")";

		if ($this->echoSQL)
			echo $sSQL . '<br/>';	
		
		$resultset = $db->Execute($sSQL,2);	
		
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			$ret[] = "<option value='".$rec['id']."'>". $rec[$code].'-'.$rec[$itmname]."</option>" ;
		}		
		
		return (implode('',$ret));				
	}

	public function viewList() {
		
        switch (GetReq('mode')) { 
			case 'tree'  : $ret = $this->viewTreeList(); break;		
			case 'cats'  : 
			case 'items' : 
			default      : $ret = $this->viewSessionList();	
		}			
			
		return ($ret);
	}	
	

	
	protected function get_selected_session_items($preset=null, $limit=null) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';	
        $codefield = $this->getmapf('code');
		$tid = $preset ? $preset : GetParam('id');	
		
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4,".
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,volume,".$this->getmapf('code').
				" from products WHERE ";

		if (isset($tid)) {
			$treeSQL = "select code from ctreemap WHERE tid=" . $db->qstr($tid);	
			$sSQL .=  ' id in (' . $treeSQL . ')';	
		}	
        else
			return null;
		
	    //$sSQL .= " and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY " . $codefield;//FIELD(id,".  $itemsIdList .")";
        $sSQL .= $limit ? " limit " . $limit : null;		
		
		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		if (empty($resultset)) return null;
		
		$ix =1;
		foreach ($resultset as $n=>$rec) {
		
		    $id = $rec[$codefield];
			
			$cat = $rec['cat0'] ? str_replace(' ','_',$rec['cat0']) : null;
			$cat .= $rec['cat1'] ? $this->cseparator . str_replace(' ','_',$rec['cat1']) : null;
			$cat .= $rec['cat2'] ? $this->cseparator . str_replace(' ','_',$rec['cat2']) : null;
			$cat .= $rec['cat3'] ? $this->cseparator . str_replace(' ','_',$rec['cat3']) : null;
			$cat .= $rec['cat4'] ? $this->cseparator . str_replace(' ','_',$rec['cat4']) : null;
			
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
	
	public function get_selected_items($preset=null, $asis=false) {
		
		$ret = $this->get_selected_session_items($preset, $asis);
		return ($ret);
	}		
	
	public function postSubmit($action, $title=null, $class=null) {
		if (!$action) return;
		$submit = $title ? $title : 'Submit';
		$cl = $class ? "class=\"$class\"" : null;
		 
		$id = GetReq('id'); 
		$c = "<INPUT type=\"hidden\" name=\"id\" value=\"{$id}\" />";
		$mode = GetReq('mode');
		$c .= "<INPUT type=\"hidden\" name=\"mode\" value=\"{$mode}\" />";
		
        $c .= "<INPUT type=\"submit\" name=\"submit\" value=\"" . $submit . "\" $cl />";  
        $c .= "<INPUT type=\"hidden\" name=\"FormName\" value=\"Treedescr\" />";		   
        $c .= "<INPUT type=\"hidden\" name=\"FormAction\" value=\"" . $action . "\" $cl />";
        return ($c);   		   
	}

	protected function saveTreeList($data=null) {
		$db = GetGlobal('db');		
		$tid = GetParam('id');
		$m=0;
		
		if ($data) {
			$ids = explode(',', $data);
			
			//insert if not in tree
			foreach ($ids as $i=>$item) {
				$existSQL = "select code from ctreemap WHERE code=" . $db->qstr($item) . " and tid=" . $db->qstr($tid);	
				$resultset = $db->Execute($existSQL);
				
				if ($this->echoSQL)	echo $existSQL;
				
				if ($resultset->fields[0]) {
					//dont insert
					if ($this->echoSQL)	echo '0<br/>';
					continue;
				}
				else {
					$sSQL = 'insert into ctreemap (tid, code) values';
					$sSQL .= ' ('. $db->qstr($tid) . ',' . $db->qstr($item) . ')';		   
					$db->Execute($sSQL);
					$m+=1;	
					if ($this->echoSQL) echo "1&nbsp;$sSQL<br/>";
				}
			}			
		}
		
		return ($m);
	}	
	
	protected function remTreeList($data=null) {
		$db = GetGlobal('db');		
		$tid = GetParam('id');
		$m=0;	
		
		if ($data) {
			$ids = explode(',', $data);
			
			//delete if not in post list
			$treeSQL = "select code from ctreemap WHERE tid=" . $db->qstr($tid);	
			$result = $db->Execute($treeSQL);
			if (!empty($result->fields)) {
				foreach ($result as $r=>$rec) {
					if (in_array($rec['code'], $ids)) {
						//dont remove
						//if ($this->echoSQL) echo '0<br/>';
						continue;						
					}
					else {
						$sSQL = 'delete from ctreemap where tid='. $db->qstr($tid) . ' and code=' . $db->qstr($rec['code']);		   
						$db->Execute($sSQL);
						$m+=1;	
						if ($this->echoSQL) echo "1&nbsp;$sSQL<br/>";						
					}
				}
			}
		}
		
		return ($m);
	}				
					
	
	protected function saveList() {
		$mode = GetParam('mode');		
		
		if (!empty($_POST[$this->listName])) { 
		
			$plist = implode(',', $_POST[$this->listName]); //post list
			$slist = GetSessionParam($this->listName); //current session list			
			$list = $slist ? $slist . ',' . $plist : $plist;
			
			switch (GetReq('mode')) { 
			
				case 'tree'  :  if ($this->currentSelectedTreeType()==1) { //items tree
									$this->remTreeList($plist); //remove post list
									$this->saveTreeList($list); //save list at table
									SetSessionParam($this->listName, ''); //reset session list
				                }	
								break;		
			
				case 'cats'  :
				case 'items' : 		
				default      :	SetSessionParam($this->listName, $list); //save session list
			}	
			
		}
		  
		return ($list);
	}	
	
	
	protected function getmapf($name) {
	
	  if (empty($this->map_t)) return 0;
	  
	  foreach ($this->map_t as $id=>$elm)
	    if ($elm==$name) break;
				
	  $ret = $this->map_f[$id];
	  return ($ret);
	}	

	protected function replace_spchars($string, $reverse=false) {
	
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
	
	  return ($ret);
	}		
					
};
}
?>