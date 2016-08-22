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

class rctreedescr {
	
	var $title, $prpath, $urlpath, $url;//, $cat, $item;
	var $map_t, $map_f, $cseparator, $onlyincategory;
	var $listName;
	
	var $imgxval, $imgyval, $image_size_path;
	var $selected_items, $autoresize, $restype, $odd;	
	
	var $filename, $fields, $photodb, $sizeDB;
	var $owner, $savecolpath;

    function __construct() {
	  
		$this->prpath = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');	
		$this->url = paramload('SHELL','urlbase');
		$this->title = localize('RCTREEDESCR_DPC',getlocal());

		$this->owner = GetSessionParam('LoginName');
        $this->savecolpath = remote_paramload('RCTREEDESCR','savecolpath',$this->prpath);		
		
		//$this->cat = GetParam('cat'); //GetReq('cat');	    
		//$this->item = GetParam('id'); //GetReq('id');
		
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
		//$this->filename = $this->prpath . $this->savecolpath . '/' . $_POST['cname'] . '.' . base64_encode($this->owner) . '.col';
		
		//$this->fields = array('code','itmname','itmdescr','itmremark','uniname1','price0','price1','cat','item_name_url','item_url','photo_url');
		//$this->xmlfile = $_POST['xmlfile'];
        //$this->listXMLName = 'mytreeXMLlist';
        //$this->savedXMLlist = GetSessionParam($this->listXMLName) ? GetSessionParam($this->listXMLName) : null;		
	}
	
    function event($event=null) {
	
	   /////////////////////////////////////////////////////////////
	   if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	
	   /////////////////////////////////////////////////////////////			

       if (!$this->msg) {
  
	     switch ($event) {
			 
			case 'cptreeframe'    : echo $this->loadframe();
		                            die(); 
			 
			case 'cptreeusers'    : break;
			case 'cptreeitems'    : break;
			
			 
            //case 'cpsavexml'      : //$this->savedXMLlist = $this->save_xml_file(); 
			                        //break;				 
			 
		    case 'cploadtree'     : $this->savedlist = $this->loadList(); 
			                        break;			 
		 
		    case 'cpsavetree'     : $this->savedlist = $this->saveList();				
	                                break;									
			case 'cptreedescr'    :
			default               :							  
         }
      }
    }	

    function action($action=null)  { 

	     switch ($action) {
			 
		   case 'cptreeframe'    : break;	 
			 
		   case 'cptreeusers'    : break;
		   case 'cptreeitems'    : break;			 
			 
           //case 'cpsavexml'      : break;		 
		   
		   case 'cploadtree'     : break;		   
		   
		   case 'cpsavetree'     : $out = 'Filename:' . $this->filename . '<br/>';
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
		   default               : $out = $this->gridMode();
		                           //$out = $this->savedlist;
		 }			 

	     return ($out);
	}
	
	
	protected function loadframe($mode=null) {
		$selectmode = $mode ? $mode : GetReq('mode');
		$id = GetReq('id');
		switch ($selectmode) {
			case 'users' : $bodyurl = seturl("t=cptreeusers&mode=users&id=".$id); break;
			case 'cats'  : $bodyurl = seturl("t=cptreeusers&mode=cats&id=".$id); break;
			case 'items' : $bodyurl = seturl("t=cptreeitems&mode=items&id=".$id); break;
			case 'tree'  : 
			default      : $bodyurl = seturl("t=cptreeitems&mode=tree&id=".$id);
		}
			
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"500px\"><p>Your browser does not support iframes</p></iframe>";    

		return ($frame); 
	}		
		
	protected function gridMode() {
		$mode = GetReq('mode') ? GetReq('mode') : 'items';
        
		$turl0 = seturl('t=cptreedescr&mode=items');		
		$turl1 = seturl('t=cptreedescr&mode=cats');
		//$turl2 = seturl('t=cptreedescr&mode=users');
		$turl3 = seturl('t=cptreedescr&mode=tree');
		$button = $this->createButton(localize('_mode', getlocal()), 
										array(localize('_items', getlocal())=>$turl0,
											  localize('_cats', getlocal())=>$turl1,
										      //localize('_users', getlocal())=>$turl2,
											  localize('_treedescr', getlocal())=>$turl3,
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
		$title = localize('_items', getlocal()); 
		
        $xsSQL = "SELECT * from (select id,sysins,code5,xml,itmactive,active,itmname,uniname1,ypoloipo1,price0,price1,manufacturer,size,color from products) o ";		   
					
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('id',getlocal())."|2|0|");//"|link|5|"."javascript:editform(\"{id}\");".'||');			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+itmactive|".localize('_active',getlocal())."|2|0|");//"|boolean|1|1:0");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+active|".localize('_active',getlocal())."|2|0|");//"|boolean|1|101:0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+sysins|".localize('_date',getlocal())."|5|0|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+code5|".localize('_code',getlocal())."|5|0|");	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+itmname|".localize('_title',getlocal())."|link|10|"."javascript:ttree\"{code5}\");".'||');	
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
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+itmname|".localize('_title',getlocal())."|link|10|"."javascript:titems(\"{code5}\");".'||');	
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
		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+id|".localize('_id',getlocal())."|5|1|");	
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+ctgid|".localize('_ctgid',getlocal())."|5|1|");
		//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat1|".localize('_cat0',getlocal())."|10|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat2|".localize('_cat1',getlocal())."|10|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat3|".localize('_cat2',getlocal())."|10|1|");				
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat4|".localize('_cat3',getlocal())."|10|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cat5|".localize('_cat4',getlocal())."|10|1|");			
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
	

	
	protected function get_selected_items($preset=null, $asis=false) {
		
		/*if ($this->savedXMLlist) 
			$ret = $this->get_selected_XML_items();
		else*/	
			$ret = $this->get_selected_db_items($preset, $asis);
		
		return ($ret);
	}	
	
	//when no create_page..just read items to show...
	public function read_selected_items($preset=null, $asis=false) {
		/*if ($this->savedXMLlist) 
			$this->selected_items = $this->get_selected_xml_items();
		else*/
			$this->selected_items = $this->get_selected_db_items($preset, $asis);
		   	
		//..order array by key
		ksort($this->selected_items);			
	}	
	
	public function viewList() {
		/*if ($this->savedXMLlist) 
			$ret = $this->viewXmlList();
		else*/
			$ret = $this->viewDbList();		
		return ($ret);
	}

	public function viewCollection() {
		/*if ($this->savedXMLlist) 
			$ret = $this->viewXmlCollection();
		else*/
			$ret = $this->viewDbCollection();		
		//return ($ret);		
    }		
	
	public function isCollection() {
		/*if ($this->savedXMLlist) {
			$s = unserialize($this->savedXMLlist);
			$ret = count($s);	
		}
		else {*/
			if ($c = $this->savedlist) {
				if (strstr($c, ',')) 
					$ret = count(explode(',', $c));
				else 
					$ret = 1;
			}
			else
				$ret = 0;
	    //}	
		return ($ret);
	}		

    public function getCurrentList() {
		/*if ($this->savedXMLlist) 
			$ret = $this->getCurrentXmlList();
		else*/
			$ret = $this->getCurrentDbList();
		return ($ret);
    }
	
	protected function saveListInFile($data=null) {
		
		if ($_POST['cname']) { 
		    if (!is_dir($this->prpath . $this->savecolpath))
				@mkdir($this->prpath . $this->savecolpath);
		
			$ret = @file_put_contents($this->filename, $data);
			return $ret;
		}
		return false;
	}	
	
	protected function saveList() {
		
		/*if ($xmlfile = $_POST['xmlload']) { 
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
		else {*/ //choose items from selected cat /id
		  if (!empty($_POST[$this->listName])) { 
			$plist = implode(',', $_POST[$this->listName]);
		
			$list = GetSessionParam($this->listName) ? GetSessionParam($this->listName) . ',' . $plist : $plist;
			SetSessionParam($this->listName, $list);
			
			$this->saveListInFile($list);
		  }
		  else {
			$list = null; //GetSessionParam($this->listName);
			SetSessionParam($this->listName, $list);
			
			$this->saveListInFile($list);
		  }
		  
		  return ($list);
        //}
		//return false;	
	}
	
	//called from rcbulmail
	public function saveSortedList($csvlist=null) {
		//echo $csvlist;
		$this->savedlist = $csvlist;
		SetSessionParam($this->listName, $csvlist);
		return true;
	}
	
	//called from rccrmtrace
	public function addtoList($itemcode=null) {
        if (!$itemcode) return false;
		$db = GetGlobal('db');	
		$code = $this->getmapf('code');		
		
		if (strstr($itemcode, ',')) { //list of codes, csv
			$sSQL = 'select id from products where ' . $code ." REGEXP " . $db->qstr(str_replace(',','|',$itemcode));
			$sSQL .= " and itmactive>0 and active>0";			   
			$resultset = $db->Execute($sSQL,2);	
			//echo $sSQL;
			foreach ($resultset as $i=>$rec)
				$c[] = $rec[0];
			$list = isset($this->savedlist) ?  $this->savedlist . "," . implode(',', $c) : implode(',', $c);
			SetSessionParam($this->listName, $list);	
		}
		else {
			$sSQL = 'select id from products where ' . $code ."=" . $db->qstr($itemcode);
			$sSQL .= " and itmactive>0 and active>0";			   
			$resultset = $db->Execute($sSQL,2);		

			if ($c = $resultset->fields[0]) {
				$list = isset($this->savedlist) ?  $this->savedlist . "," . $c : $c;
				SetSessionParam($this->listName, $list);
				return true;
			}
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
		
		$cpGet = GetGlobal('controller')->calldpc_var('rcpmenu.cpGet');	
		
		$sSQL = 'select id,'.$code.',' . $itmname .' from products where ';
		
		if ($id = $cpGet['id']) {
			$sSQL .= $code . '=' . $db->qstr($id);
		}	
		elseif ($cat = $cpGet['cat']) {
			
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
		$sSQL .= " and itmactive>0 and active>0";			   
		$sSQL .= " ORDER BY " . $itmname;	//order unselected list by name	
		
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
		$sSQL .= " ORDER BY FIELD(id,".  $this->savedlist .")";

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
		$sSQL .= " ORDER BY FIELD(id,".  GetSessionParam($this->listName) .")";

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
		 
		$id = GetReq('id'); 
		$c = "<INPUT type=\"hidden\" name=\"id\" value=\"{$id}\" />";
		$mode = GetReq('mode');
		$c .= "<INPUT type=\"hidden\" name=\"mode\" value=\"{$mode}\" />";
		
        $c .= "<INPUT type=\"submit\" name=\"submit\" value=\"" . $submit . "\" $cl />";  
        $c .= "<INPUT type=\"hidden\" name=\"FormName\" value=\"Treedescr\" />";		   
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
	
	protected function get_selected_db_items($preset=null, $asis=false) {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';	
        $codefield = $this->getmapf('code');

		if ($preset) {
			if ($asis==false) {
				$colext = '.' . base64_encode($this->owner) . '.col';
				$colfile = $preset . $colext;
				$itemsIdList = @file_get_contents($this->prpath . $this->savecolpath . '/'. $colfile);
			}
			else
				$itemsIdList = $preset;
			//SetSessionParam($this->listName, $itemsIdList); //dont save in mem
		}	
		else
			$itemsIdList = GetSessionParam($this->listName);
		
        $sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4,".
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,volume,".$this->getmapf('code').
				" from products WHERE ";

		$sSQL .= "id in (" . $itemsIdList .")";
	    $sSQL .= " and itmactive>0 and active>0";	
		$sSQL .= " ORDER BY FIELD(id,".  $itemsIdList .")";
        //$sSQL .= " limit " . $items;		
		
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
	/*
	protected function show_select_collections($name, $taction=null, $ext=null, $class=null) {
		$col = GetReq('collection') ;
	
		$url = ($taction) ? seturl('t='.$taction.'&collection=',null,null,null,null) : 
		                    seturl('t=cploadcol&collection=',null,null,null,null);
		
		if (defined('RCFS_DPC')) {
			$path = $this->prpath . $this->savecolpath . '/';
			$myext = explode(',',$ext);
			$extensions = is_array($myext) ? $myext : array(0=>".png",1=>".gif",2=>".jpg");
			//echo '>', print_r($extensions);
			
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
		$colext = '.' . base64_encode($this->owner) . '.col';
		$ret = $this->show_select_collections('mycollection', null, $colext, null);
		return ($ret);
	}		
	
	protected function loadList() {
		$colfile = $_GET['collection'];
		$list = @file_get_contents($this->prpath . $this->savecolpath . '/'. $colfile);
		
		SetSessionParam($this->listName, $list);
		return $list;
	}
	*/
	/*************************** XML handler *************************************/
	/*
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
				$ret = @file_put_contents($this->prpath . 'temp.xml', $response_xml_data);
				unlink ('temp.xlx'); //reset xlx
				
				return ($ret);
			}
		}
		return false;
	}
	
	//check fields already in couples 
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
			
			$ret = $this->proceedXML(file($this->prpath . $xlxfile), 
			                         @file_get_contents($this->prpath . $xmlfile));
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
	
	*/
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