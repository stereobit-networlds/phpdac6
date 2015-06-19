<?php
$__DPCSEC['STITEMS_DPC']='1;1;1;1;1;1;2;2;9';

if ( (!defined("STITEMS_DPC")) && (seclevel('STITEMS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("STITEMS_DPC",true);

$__DPC['STITEMS_DPC'] = 'stitems';

$a = GetGlobal('controller')->require_dpc('nitobi/nitobi.lib.php');
require_once($a);

$b = GetGlobal('controller')->require_dpc('shop/rcitems.dpc.php');
require_once($b);

$c = GetGlobal('controller')->require_dpc('nitobi/nhandler.lib.php');
require_once($c);

$d = GetGlobal('controller')->require_dpc('shop/shcategories.dpc.php');
require_once($d);

$e = GetGlobal('controller')->require_dpc('images/wateresize.lib.php');
require_once($e);

$__EVENTS['STITEMS_DPC'][0]='stitems';
$__EVENTS['STITEMS_DPC'][1]='stvinput';
$__EVENTS['STITEMS_DPC'][2]='stvmodify';
$__EVENTS['STITEMS_DPC'][3]='stvdelete';
$__EVENTS['STITEMS_DPC'][4]='stvoffer';
$__EVENTS['STITEMS_DPC'][5]='stvactive';
$__EVENTS['STITEMS_DPC'][6]='stvphoto';
$__EVENTS['STITEMS_DPC'][7]='stvchphoto';
$__EVENTS['STITEMS_DPC'][8]='stvdelphoto';
$__EVENTS['STITEMS_DPC'][9]='stvrestorephoto';
$__EVENTS['STITEMS_DPC'][10]='stread';
$__EVENTS['STITEMS_DPC'][11]='stwrite';

$__ACTIONS['STITEMS_DPC'][0]='stitems';
$__ACTIONS['STITEMS_DPC'][1]='stvinput';
$__ACTIONS['STITEMS_DPC'][2]='stvmodify';
$__ACTIONS['STITEMS_DPC'][3]='stvdelete';
$__ACTIONS['STITEMS_DPC'][4]='stvoffer';
$__ACTIONS['STITEMS_DPC'][5]='stvactive';
$__ACTIONS['STITEMS_DPC'][6]='stvphoto';
$__ACTIONS['STITEMS_DPC'][7]='stvchphoto';
$__ACTIONS['STITEMS_DPC'][8]='stvdelphoto';
$__ACTIONS['STITEMS_DPC'][9]='stvrestorephoto';
$__ACTIONS['STITEMS_DPC'][10]='stread';
$__ACTIONS['STITEMS_DPC'][11]='stwrite';

$__LOCALE['STITEMS_DPC'][0]='STITEMS_DPC;Items;Προιόντα';
$__LOCALE['STITEMS_DPC'][1]='_type;Category;Κατηγορία';
$__LOCALE['STITEMS_DPC'][2]='_axia2;Cost_2;Κοστος 1';
$__LOCALE['STITEMS_DPC'][3]='_axia1;Cost_1;Τιμή';
$__LOCALE['STITEMS_DPC'][4]='_date1;Date;Ημ/νια';
$__LOCALE['STITEMS_DPC'][5]='_fipi;Horses;Ιπποι';
$__LOCALE['STITEMS_DPC'][6]='_km;Kilometers;Χλμ';
$__LOCALE['STITEMS_DPC'][7]='_color;Color;Χρώμα';
$__LOCALE['STITEMS_DPC'][8]='_etosk;Registration year;Ετος Κυκλ.';
$__LOCALE['STITEMS_DPC'][9]='_model;Model;Μοντέλο';
$__LOCALE['STITEMS_DPC'][10]='_marka;Marka;Μάρκα';
$__LOCALE['STITEMS_DPC'][11]='_aucdate;Auction start;Έναρξη δημοπράτησης';
$__LOCALE['STITEMS_DPC'][12]='_auctime;Auction end;Τέλος δημοπράτησης';
$__LOCALE['STITEMS_DPC'][13]='_synal2;Synal_2;Συναλλαγη 2';
$__LOCALE['STITEMS_DPC'][14]='_synal1;Synal_1;Συναλλαγη 1';
$__LOCALE['STITEMS_DPC'][15]='_thesi;Thesis;Θέση';
$__LOCALE['STITEMS_DPC'][16]='_arkyk;Registration number;Αριθμός κυκλοφορίας';
$__LOCALE['STITEMS_DPC'][17]='_kybismos;Kybismos;Κυβισμός';
$__LOCALE['STITEMS_DPC'][18]='_noumero;Number;Νούμερο';
$__LOCALE['STITEMS_DPC'][19]='_flg_pwl;Flg_PWL;Flg_PWL';
$__LOCALE['STITEMS_DPC'][20]='_numagor;Buy price;Ποσό αγοράς';
$__LOCALE['STITEMS_DPC'][21]='_flag;Flag;Flag';
$__LOCALE['STITEMS_DPC'][22]='_date2;Date_2;Ημ/νια 2';
$__LOCALE['STITEMS_DPC'][23]='_sxolia;Remarks;Σχόλια';
$__LOCALE['STITEMS_DPC'][24]='_id;ID;A/A';
$__LOCALE['STITEMS_DPC'][25]='_active;ACTIVE;Ενεργό';
$__LOCALE['STITEMS_DPC'][26]='_type2;Category;Κατηγορία';
$__LOCALE['STITEMS_DPC'][27]='_photo;Photo;Φωτο';
$__LOCALE['STITEMS_DPC'][28]='_type2;Type;Τύπος';
$__LOCALE['STITEMS_DPC'][29]='_RCITEMPHOTO;Upload file;Συνημένο είδους';
$__LOCALE['STITEMS_DPC'][30]='_add;Add Item;Εισαγωγή';
$__LOCALE['STITEMS_DPC'][31]='_edit;Edit Item;Μεταβολή';
$__LOCALE['STITEMS_DPC'][32]='_offer;Make it Offer;Ενεργοποίηση προσφοράς';
$__LOCALE['STITEMS_DPC'][33]='_recode;Recode;Recode';
$__LOCALE['STITEMS_DPC'][34]='_delete;Delete Item;Διαγραφή';
$__LOCALE['STITEMS_DPC'][35]='_mail;Mail Item;Ταχυδρομείο';
$__LOCALE['STITEMS_DPC'][36]='_code;Code;Κωδικός';
$__LOCALE['STITEMS_DPC'][37]='_axia;Cost;Τιμή';
$__LOCALE['STITEMS_DPC'][38]='_sysins;Insert date;Ημ/νια εισαγωγής';
$__LOCALE['STITEMS_DPC'][39]='_itmdescr;Item name;Περιγραφή';
$__LOCALE['STITEMS_DPC'][40]='_uniname1;MM1;MM1';
$__LOCALE['STITEMS_DPC'][41]='_uniname2;MM2;MM2';
$__LOCALE['STITEMS_DPC'][42]='_offer;Make offer;Είδος προσφοράς';
$__LOCALE['STITEMS_DPC'][43]='_axia3;Cost_3;Τιμή';
$__LOCALE['STITEMS_DPC'][44]='_percent;% Markup;% Επιβάρυνση';
$__LOCALE['STITEMS_DPC'][45]='_axiapc;% Markup;% Επιβάρυνση';
$__LOCALE['STITEMS_DPC'][46]='_itmname;Item name;Περιγραφή';
$__LOCALE['STITEMS_DPC'][47]='_cat;Category;Category';
$__LOCALE['STITEMS_DPC'][48]='_cat;Category;Category';
$__LOCALE['STITEMS_DPC'][49]='_cat1;Category 1;Category 1';
$__LOCALE['STITEMS_DPC'][50]='_cat2;Category 2;Category 2';
$__LOCALE['STITEMS_DPC'][51]='_cat3;Category 3;Category 3';
$__LOCALE['STITEMS_DPC'][52]='_cat4;Category 4;Category 4';
$__LOCALE['STITEMS_DPC'][53]='_cat0;Category 0;Category 0';

class stitems extends rcitems {
	
	var $hosted_path;
	var $encoding;
	
	function stitems() {
	  $GRX = GetGlobal('GRX');	  		
	  
      //rcitems::rcitems();	  
	
	  $this->debug_sql = true;	
	
	  $this->title = localize('STITEMS_DPC',getlocal());	
	  $this->msg = null;		 
	  $this->result = null;		
	  $this->path = paramload('SHELL','prpath'); 
	  $this->hosted_path = $this->path;	 	   
	  
	  $this->switch_db('panikidis2');	  
	  
	  //echo $this->hosted_path;
      $char_set  = remote_arrayload('SHELL','char_set',$this->hosted_path);	  
      $charset  = remote_paramload('SHELL','charset',$this->hosted_path);	 
	  
	  if (($charset=='utf-8') || ($charset=='utf8'))
	    $this->encoding = 'utf-8';
	  else  
	    $this->encoding = $char_set[getlocal()]; 	  
	  
	  $this->infolder = remote_paramload('ID','hostinpath',$this->hosted_path);	  
	  $this->thubpath = $this->hosted_path . $this->infolder . '/images/thub/';	  
	  $this->urlpath = remote_paramload('SHELL','urlpath',$this->hosted_path).$this->infolder.'/';		  
	  $this->urlbase = remote_paramload('SHELL','urlbase',$this->hosted_path).$this->infolder.'/';
	  
	  $this->defptp = '/images/thub/';
	  $this->ptp = remote_paramload('RCITEMS','respath',$this->hosted_path);
	  $this->publicthubpath = $this->ptp?'..'.$this->ptp:'..'.$this->defptp;	  
	  $this->imgpath = $this->ptp?'..'.$this->ptp:'..'.$this->defptp;
	  $this->defadptp = '/images/uphotos/';
      $this->adptp = remote_paramload('RCITEMS','adrespath',$this->hosted_path);	  
	  $this->img2path = $this->adptp?'..'.$this->adptp:'..'.$this->defadptp;	  
	  $this->imgpath2mail = $this->urlbase . $this->infolder . $this->ptp;//'/images/thub/';		  
	  $this->restype = remote_paramload('RCITEMS','restype',$this->hosted_path);//'.jpg';     	
	  
      $this->_grids[] = new nitobi("Items");	
	  
      if ($GRX) {    
          $this->delete_attach = loadTheme('dphoto',localize('_delete',getlocal())); 
          $this->restore_attach = loadTheme('rphoto',localize('_restore',getlocal()));		  
          $this->delete_item = loadTheme('ditem',localize('_delete',getlocal())); 
          $this->edit_item = loadTheme('eitem',localize('_edit',getlocal()));			  
          $this->offer_item = loadTheme('iitem',localize('_offer',getlocal())); 
          //$this->recode_vehicle = loadTheme('ritem',localize('_recode',getlocal()));	
          $this->add_item = loadTheme('aitem',localize('_add',getlocal())); 
          $this->mail_item = loadTheme('mailitem',localize('_mail',getlocal())); 		  
		  
		  $this->sep ='&nbsp;';// loadTheme('lsep');		  		  
      } 
      else { 
          $this->delete_attach = localize('_delete',getlocal()); 
          $this->restore_attach = localize('_restore',getlocal());		  
          $this->delete_item = localize('_delete',getlocal()); 
          $this->edit_item = localize('_edit',getlocal());			  
          $this->offer_item = localize('_offer',getlocal()); 
          //$this->recode_vehicle = loadTheme('rvehicle','show help');	
          $this->add_item = localize('_add',getlocal()); 
          $this->mail_item = localize('_mail',getlocal());		  
		  
		  $this->sep = "|";	
      }	
	  
	  //$this->image2add = paramload('RCITEMS','image2add'); 
      $this->image2add = remote_paramload('RCITEMS','image2add',$this->hosted_path);	  
	  //$this->image2sold = paramload('RCITEMS','image2sold'); 	  
      $this->image2sold = remote_paramload('RCITEMS','image2sold',$this->hosted_path);	
	  
	  
	  $this->previewx = remote_paramload('RCITEMS','previewx',$this->hosted_path);
	  $this->previewy = remote_paramload('RCITEMS','previewy',$this->hosted_path);
	  $this->graphx = remote_paramload('RCITEMS','graphx',$this->hosted_path);
	  $this->graphy = remote_paramload('RCITEMS','graphy',$this->hosted_path);	 
	    		    
	}
	
    function event($sAction) {
       $db = GetGlobal('db');			

       if (!$this->msg) {
  
	     switch ($sAction) {			 	 
		 
		    case 'stvchphoto'  :   $this->change_photo();
			                       break;
		    case 'stvdelphoto' :   $this->delete_photo();
			                       break;								   
		    case 'stvrestorephoto' : $this->make_sync_photo(GetReq('id'));
			                       break;									   
		    case 'stvphoto'    :   break;
		   
		    case 'stvinput'    :   break;
		    case 'stvmodify'   :   break;			
		    case 'stvdelete'   :   $this->delete_from_list(); 
			                       $this->nitobi_javascript(); 
			                       $this->sidewin(); 
			                       //$this->read_list();
			                       break;
								   
		    case 'stvoffer'    :   $this->import_to_offers(); 
			                       $this->nitobi_javascript();   
			                       //$this->read_list();
			                       break;	
								   
		    case 'stvactive'   :   $this->activate_list(); 
			                       //$this->read_list();
			                       break;
								   
		    case 'stwrite'     : $this->save_items_list();	
		                         break;
		    case 'stread'      : $this->read_items_list();	
		                         break;								   									   							   
						
	        case 'stitems'     :   
			default :              $this->nitobi_javascript(); 
			                       $this->sidewin(); 
			                       //$this->read_list(); 
                                   //$this->charts = new swfcharts;	
		                           //$this->hasgraph = $this->charts->create_chart_data('statisticscat',"where year >=2000 and attr1='".urldecode(GetReq('cat'))."'");
								   break;	
													
										  
         }
      }
    }	

    function action($action)  {
         $db = GetGlobal('db');		 

	     //$this->reset_db();
		 
		 $out = $this->title();
		 		 
	     switch ($action) {			 
							  		 
		    case 'stvchphoto'  :
			case 'stvdelphoto' :
			case 'stvrestorephoto':
		    case 'stvphoto'    :   $out .= $this->form_photo();
			                       break;		 
		    case 'stvinput'    :   $out .= $this->form_insert();
			                       break;
		    case 'stvmodify'   :   $out .= $this->form_modify();
			                       break;			
		    case 'stvdelete'   :   $out .= $this->list_items();
			                       break;
		    case 'stvoffer'    :   $out .= $this->list_items();
			                       break;			   
		    case 'stvactive'   :   $out .= $this->list_items();
			                       break;									   
								 			
	        case 'stitems'     :   
			default            :   $out .= $this->list_items();                       							
										  
         }		 

	     return ($out);
	}
	
	function nitobi_javascript() {
	
      if (iniload('JAVASCRIPT'))  {
	  
		   $template = $this->set_template();   		      
		   
	       $code = $this->init_grids();	     		

		   $code .= $this->_grids[0]->OnClick(17,'ItemDetails',$template);
	   
		   $js = new jscript;
		   $js->setloadparams("init()");
           $js->load_js('nitobi.grid.js');//javascript folder	 
           //$js->load_js('nitobi.grid.js',null,null,null,1); //local			   
           $js->load_js($code,"",1);			   
		   unset ($js);
	  }		
	}
	
	function set_template() {
	       $x = $this->previewx?$this->previewx:160;
		   $y = $this->previewy?$this->previewy:120;
	
			
	       $edit = seturl("t=stvmodify&cat=".GetReq('cat')."&rec=");
		   $add =  seturl("t=stvinput&cat=".GetReq('cat')."&sel=".GetReq('sel'));
		   $off =  seturl("t=stvoffer&cat=".GetReq('cat')."&rec=");	   
		   $del =  seturl("t=stvdelete&rec=");	
		   	   		   
		   $template .= "<A href=\"$edit'+i16+'\">".$this->edit_item."</A>". $this->sep;
		   $template .= "<A href=\"$add\">".$this->add_item."</A>". $this->sep;		   
		   $template .= "<A href=\"$del'+i16+'\">".$this->delete_item."</A>". $this->sep;		   		   		   			   
		   $template .= "<A href=\"$off'+i16+'\">".$this->offer_item."</A>". $this->sep;			   			   
		   $template .= "<br>";
		   
		   $template .= "<h4>'+update_stats_id(i0,i0,i3)+'</h4>";		   
	  						   			   
		   $template .= "<table width=\"100%\" class=\"group_win_body\">";	   
		   $template .= "<tr><td>".localize('_code',getlocal()).":</td><td><b>'+i0+'</b></td></tr>";	
		   $template .= "<tr><td>".localize('_sysins',getlocal()).":</td><td><b>'+i2+'</b></td></tr>";		
		   $template .= "<tr><td>".localize('_itmname',getlocal()).":</td><td><b>'+i3+'</b></td></tr>";
		   $template .= "<tr><td>".localize('_uniname1',getlocal()).":</td><td><b>'+i4+'</b></td></tr>";				   		   
		   $template .= "<tr><td>".localize('_uniname2',getlocal()).":</td><td><b>'+i5+'</b></td></tr>";		   		   
		   $template .= "<tr><td>".localize('_axia1',getlocal()).":</td><td><b>'+i6+'</b></td></tr>";		
		   $template .= "<tr><td>".localize('_cat0',getlocal()).":</td><td><b>'+i11+'</b></td></tr>";		
		   $template .= "<tr><td>".localize('_cat1',getlocal()).":</td><td><b>'+i12+'</b></td></tr>";				   		   
		   $template .= "<tr><td>".localize('_cat2',getlocal()).":</td><td><b>'+i13+'</b></td></tr>";	
		   $template .= "<tr><td>".localize('_cat3',getlocal()).":</td><td><b>'+i14+'</b></td></tr>";
		   $template .= "<tr><td>".localize('_cat4',getlocal()).":</td><td><b>'+i15+'</b></td></tr>";
		   		   		   
		   $template .= "<tr><td><A href=\"?t=cpvphoto&id='+i0+'\"><img src=\"$this->publicthubpath'+photo_name(i0)+'$this->restype\" width=$x height=$y></A>";	

		   $template .= "</td><td>'+i10+'</td></tr></table>";	     
		   //$template .= "'+i10+'"; //sxolia out of array
		   //$template .= "<h4>'+update_stats_id(i0,i0,i3)+'</h4>";		   
		   
		   return ($template);	
	}			

    //override
	function title() {
       $sFormErr = GetGlobal('sFormErr');

       //navigation status            
	   /*if (GetSessionParam('REMOTELOGIN')) 
	     $out = setNavigator(seturl("t=cpremotepanel","Remote Panel"),$this->title); 	 
	   else  
         $out = setNavigator(seturl("t=cp","Control Panel"),$this->title); 	
       */
       //error message
	   $out .= setError($sFormErr);
	   
	   return ($out);
	}
	
	
    function form_photo()  { 	
	
       $cat = GetReq('cat');		
       $sel = GetReq('sel');		
	   $id = GetReq('id');
	   $photo = $this->imgpath .  $id . $this->restype; 
	   $ppath = $this->urlpath. /*'/images/thub/'*/$this->ptp . $id . $this->restype;  //echo $ppath;
	   
         $filename = seturl("t=cpvchphoto&cat=".$cat."&id=".$id);			  
		
	     //upload file(s) form
         $uout  = "<FORM action=". "$filename" . " method=post ENCTYPE=\"multipart/form-data\" class=\"thin\">";
         $uout .= "<input type=\"hidden\" name=\"MAX_FILE_SIZE\" VALUE=\"".$this->MAXSIZE."\">"; //max file size option in bytes
         $uout .= "<FONT face=\"Arial, Helvetica, sans-serif\" size=1>"; 			 	   
         $uout .= localize('_RCITEMPHOTO',getlocal()) . ": <input type=FILE name=\"uploadfile\">";		    
		 
		 $uout .= "<select name=\"phototype\">";
		 $uout .= "<option>Default</option>";
		 $uout .= "<option>A</option>";		 
		 $uout .= "<option>B</option>";		 
		 $uout .= "<option>C</option>";		 
		 $uout .= "<option>D</option>";		 
		 $uout .= "<option>E</option>";		 
		 $uout .= "<option>F</option>";	
		 $uout .= "<option>G</option>";		 
		 $uout .= "<option>H</option>";		 
		 $uout .= "<option>I</option>";			 		 			 		 		 
		 $uout .= "</select>";
		  
         $uout .= "<input type=\"hidden\" name=\"FormName\" value=\"cpvchphoto\">"; 	
         $uout .= "<input type=\"hidden\" name=\"FormAction\" value=\"cpvchphoto\">&nbsp;";			
         $uout .= "<input type=\"submit\" name=\"Submit\" value=\"Μεταφόρτωση\">";		
         $uout .= "</FONT></FORM>"; 		   

	   //$out = $this->show_categories();	
	   
	   if (file_exists($ppath)) {
		 
		 $photos = "<img src=\"" . $photo . "\"  alt=\"". localize('_IMAGE',getlocal()) . "\">";// . "</A>";
		 $photos .= "<br>" . seturl("t=cpvrestorephoto&cat=" . $cat . "&id=" . $id,$this->restore_attach);
		 
		 //multiple photos
		 for($i='A';$i<='I';$i++) {
		   $photoid = $id;
		   $ad_photo = $this->img2path .  $photoid . $i . $this->restype;
		   $aditional_pic_file = $this->urlpath . '/images/uphotos/' . $photoid . $i . $this->restype;
		   //echo $aditional_pic_file;
		   if (file_exists($aditional_pic_file)) { 
		     $photos .= "<br><br><img src=\"" . $ad_photo . "\"  alt=\"". localize('_IMAGE',getlocal()) . "\">";// . "</A>";
			 $photos .= "<br>" . seturl("t=cpvdelphoto&photoid=" . $photoid . $i . "&cat=" . $cat .  "&id=" . $id,$this->delete_attach);
		   }	 
		 }
		 
	     $viewdata[] = $photos;
	     $viewattr[] = "left;50%";
		   
		  	
		
		 $wina = new window(localize('_RCITEMPHOTO',getlocal()),$uout);
		 $winout .= $wina->render("center::100%::0::group_dir_body::left::0::0::");
		 unset ($wina);			 			   		   
		  
	     $viewdata[] = $winout;//"&nbsp;";
	     $viewattr[] = "left;50%";		  
		   	   		   	   		   	   		   
		   
	     $myrec = new window('',$viewdata,$viewattr);
	     $out .= $myrec->render("center::100%::0::group_article_selected::left::5::5::");
	     unset ($viewdata);
	     unset ($viewattr);			 
	   }
	   else {
	   
	     $myrec = new window('Error',$uout);
	     $out .= $myrec->render("center::100%::0::group_article_selected::left::5::5::");	   
	   }
	   
	   $out .= "<br>" . seturl("t=cpitems&cat=".$cat."&sel=".$sel,"Επιστροφή"); 
	   	   
	   
	   return ($out);
	} 
	
	function change_photo() {
	
	     $id = GetReq('id');	
		 $ptype = GetParam('phototype');
		 
	     if (($_FILES['uploadfile']) && (strstr($_FILES['uploadfile']['type'],'jpeg')))  {

          $attachedfile = $_FILES['uploadfile'];
		  //print_r($attachedfile);
		  
		  if (in_array($ptype,array(0=>'A',1=>'B',2=>'C',3=>'D',4=>'E',5=>'F',6=>'G',7=>'H',8=>'I'))) {
		    $myfilename = $id .$ptype. '.jpg'; 
			//echo $myfilename,"<br>";	
			
            $myfilepath = $this->urlpath . /*'/images/uphotos/'*/$this->adptp . $myfilename;			
	        $thubpath = $this->urlpath . /*'/images/thub/'*/ $this->ptp;			  
	   	    $thubnail = $thubpath . $myfilename;//null;// NO THUB...yes...
			//echo '...',$ptype,'...';
		  }	
		  else {//create thubnail
		    $myfilename = $id . '.jpg'; //echo $myfilename,"<br>";	
		  
            $myfilepath = $this->urlpath . /*'/images/thub/'*/ $this->ptp . $myfilename;	
	        $thubpath = $this->urlpath . /*'/images/thub/'*/ $this->ptp;			  
	   	    $thubnail = $thubpath . $myfilename;
		  }
		  //echo $myfilepath;	
		  $watermarkpath = $this->path;		  
	   
	      //GD process ...add watermark + resize source photo
		  //echo 'GD',$watermarkpath.$this->image2add;
		  if (is_file($watermarkpath.$this->image2add)) {//echo 'ZZZZZ';
	        $process_img = new wateresize();
	        $process_img->loadimg($attachedfile['tmp_name'],0,0,'jpg',1,$watermarkpath,$this->image2add);
		    $process_img->set_jpg_quality($attachedfile['size']);
	        $ret = $process_img->saveimg($myfilepath,$thubnail);	
	        unset($process_img);		
		  }   
	      else
	        $ret = move_uploaded_file($attachedfile['tmp_name'],$myfilepath); 
			
		  return ($ret);
	     }
		 
		 return (false);		  	  
	} 
	
	function delete_photo() {
	    
		$photoid = GetReq('photoid');
	
        $pic_file = $this->urlpath . /*'/images/uphotos/'*/ $this->adptp . $photoid . $this->restype;
		if (file_exists($pic_file)) {
		  //echo "Delete $pic_file";
		  unlink($pic_file);
		}	
	} 	

    function form_insert()  { 	
	
       $cat_selected = GetReq('cat');		
       $subcat_selected = GetReq('subcat');			   
	
	   //$out = $this->show_categories();	
	   
       //<phpdac> dataforms.setform use myform+myform+5+5+20+100+0+0 </phpdac>
	   GetGlobal('controller')->calldpc_method('dataforms.setform use myform+myform+5+5+20+100+0+0');
       //<phpdac> dataforms.setformadv use 0+0+30+20 </phpdac>
	   GetGlobal('controller')->calldpc_method('dataforms.setformadv use 0+0+30+20+id');	  
       //<phpdac> dataforms.setformgoto use _LIST </phpdac>
	   
       //GetGlobal('controller')->calldpc_method('dataforms.set_id use id');	   
	   GetGlobal('controller')->calldpc_method('dataforms.setformgoto use DPCLINK:stvphoto:OK');	  
       //<phpdac> dataforms.getform use update.rccustomers+dataformsinsert,dataformsupdate,unsubscribe+Post+Clear++A,*B++id=39+dummy </phpdac>
	   
	   GetGlobal('controller')->calldpc_method('dataforms.setformtemplate use stitemsadd');		   
	   
       $fields = "code1,code2,code3,code4,code5,itmname,itmactive,itmfname,itmremark,itmdescr,itmfdescr,sysins,sysupd,uniida,uniname1,uniname2" .
                 ",uni1uni2,uni2uni1,ypoloipo1,ypoloipo2,price0,price1,cat0,cat1,cat2,cat3,cat4,active,price2,pricepc,p1,p2,p3,p4,p5";
				 
	   $farr = explode(',',$fields);
	   foreach ($farr as $t)
	     $title[] = localize($t,getlocal());
	   $titles = implode(',',$title);
				 
	   if ($cat_selected)
	     $subcat = get_selected_option_fromfile($cat_selected,'kategories',0) . '_opt';			 
	   else
	     $subcat = 'typos_opt';					 
 
	   $out .= GetGlobal('controller')->calldpc_method("dataforms.getform use insert.products+dataformsinsert+Post+Clear+$fields+$titles++dummy+dummy");	  
	   
       return ($out);
   }
   
    function form_modify()  { 	
	
	   $id = GetParam('rec');
	   $mycat = GetReq('cat');
	   
	   //$out = $this->show_categories();   
	   
	   //GET the subtype of record....
	   
       //<phpdac> dataforms.setform use myform+myform+5+5+20+100+0+0 </phpdac>
	   GetGlobal('controller')->calldpc_method('dataforms.setform use myform+myform+5+5+20+100+0+0');
       //<phpdac> dataforms.setformadv use 0+0+30+20 </phpdac>
	   GetGlobal('controller')->calldpc_method('dataforms.setformadv use 0+0+30+20');	  
       //<phpdac> dataforms.setformgoto use _LIST </phpdac>
	   GetGlobal('controller')->calldpc_method('dataforms.setformgoto use DPCLINK:stitems:OK');	  
       //<phpdac> dataforms.getform use update.rccustomers+dataformsinsert,dataformsupdate,unsubscribe+Post+Clear++A,*B++id=39+dummy </phpdac>
	   GetGlobal('controller')->calldpc_method('dataforms.setformtemplate use stitemsmod');	   
	   
       $fields = "code1,code2,code3,code4,code5,itmname,itmactive,itmfname,itmremark,itmdescr,itmfdescr,sysins,sysupd,uniida,uniname1,uniname2" .
                 ",uni1uni2,uni2uni1,ypoloipo1,ypoloipo2,price0,price1,cat0,cat1,cat2,cat3,cat4,active,price2,pricepc,p1,p2,p3,p4,p5";
				 
	   $farr = explode(',',$fields);
	   foreach ($farr as $t)
	     $title[] = localize($t,getlocal());
	   $titles = implode(',',$title);	 
		 
	
	   if ($mycat)
	     $subcat = get_selected_option_fromfile($mycat,'kategories',0) . '_opt';			 
	   else
	     $subcat = 'typos_opt';		 
		//echo $subcat;
				 	                                                                                                   																			//kybismos_opt
	   $out .= GetGlobal('controller')->calldpc_method("dataforms.getform use update.products+dataformsupdate+Post+Clear+$fields+$titles++id=$id+dummy");	  
	   
       return ($out);
   }   

	function delete_from_list() {
        $db = GetGlobal('db');	
	
	    $id = GetReq('rec');
		
		$sSQL = "select id from products where id=".$id;
	    $resultset = $db->Execute($sSQL,2);
	    $ret = $db->fetch_array_all($resultset);	
		$result = $ret[0];
		//print_r($result);
		
		if ($result[0]==-$id) {//negative id ...delete permament
		
          $sSQL = "DELETE FROM products WHERE id=" . $id;	
		  $this->msg = "Delete completed!";	
		}
		else {//pre-delete
		    $sSQL = "update products set active=0 WHERE id=" . $id;
		  	$this->msg = "Prepared to delete!";
			
			$pret = $this->make_sold_photo($id);
			if ($pret==false)
			  $this->msg .= "[MODIFY PHOTO ERROR!]";				
		}
		$ret = $db->Execute($sSQL,1);	
	    //echo $sSQL;		
	} 
	
	function make_sync_photo($id) {
	
	      $thubpath = $this->urlpath . $this->ptp;	
	      $spath = $this->urlpath . $this->adptp;
		  
	      $thubnail = $thubpath . $id. $this->restype;		
		  	
	      $mysource = remote_paramload('RCITEMS','syncurl',$this->hosted_path) . $id. $this->restype;				  			   
		  $mytarget = $spath . "/" . $id. $this->restype;	
		  
		  //HTML
          //$AgetHeaders = @get_headers($mysource);
          //if (preg_match("|200|", $AgetHeaders[0])) {	  
		  //FTP
		  //no need?????
		  //FILE
	      //if (file_exists($mytarget)) {
		    //$ret = @copy($mysource,$mytarget);//????????????
            //readfile('ftp://'.$ftp_user.':'.$ftp_pass.'@'.$ftp_host.'/'.$file); 			
			
			//ftp url
			$file = @fopen($mysource, 'rb');
			if (is_resource($file)) {
              $contents = '';
              while (!feof($file)) {
                $contents .= fread($handle, 8192);
              }
              fclose($file);
			
			  if ($contents)
			    $ret = file_put_contents($mytarget,$contents);

			  return ($ret);
			}
			
		  //}//ftp
		  
		  return false;		  		  
	}
	
   function make_sold_photo($id,$restore=null) {
   
	      $thubpath = $this->urlpath . /*'/images/thub/'*/ $this->ptp;	
	      $spath = $this->urlpath . /*'/images/uphotos/'*/ $this->adptp;
		  
		  $myfilepath = $spath . "/" . sprintf("%05s",$id). $this->restype;				  
		  $myfilepath_backup = $spath . "/_" . sprintf("%05s",$id). $this->restype;		  
	      $thubnail = $thubpath . sprintf("%05s",$id). $this->restype;			
	      $mytarget = $spath . sprintf("%05s",$id). $this->restype;			
	   
	   
	      if (file_exists($myfilepath)) {//copy source 
		  
		    if ($restore) {
			  if (is_file($myfilepath_backup))
			    @copy($myfilepath_backup,$myfilepath);
			}   
            else { 
			  //do backup
			  @copy($myfilepath,$myfilepath_backup);
		 
		      if (is_file($this->path.$this->image2sold)) {		 
	            $process_img = new wateresize();
	            $process_img->loadimg($myfilepath,'CENTER','MIDDLE','jpg',1,$this->path,$this->image2sold);
	            $ret = $process_img->saveimg($mytarget,$thubnail);	
	            unset($process_img);		   
			  }	
	     
		      return ($ret);
            }
	      }	
		   
		  return (false); 
    }	  
	
	function import_to_offers() {
        $db = GetGlobal('db');	
		
	    $sSQL = "select ".$this->getmapf('offer')." from products where id=".GetReq('rec');
		$ret = $db->Execute($sSQL,2);	 			
		
		switch ($ret->fields[0]) {
		  case 'yes' : $sw = 'no'; break;
		  case 'no'  : 
		  default    : $sw = 'yes';
		}
		//echo $sw,'>',$ret->fields[0];
	
	    $sSQL = "update products set ".$this->getmapf('offer')."='$sw' where id=".GetReq('rec');
		$db->Execute($sSQL,1);	 		
        //echo $sSQL;
		$this->msg = "Job completed!(Products offer status: $sw";		
	}
	
	function nvl($f) {
	  //echo $f,'>',"<br>";
	  
      return (isset($f)?$f:'0');	
	}
	
	function activate_list() {
       $db = GetGlobal('db');		
	
       foreach ($_POST as $name=>$value) {
	   
	     if (strstr($name,'record_')) {
		 
		   $p = explode('_',$name);
		   //echo "<br>",$p[1],':',$value;
		   
		   $selname = GetParam("active_vehicle_" . $p[1]);
		   //echo $selname,'--';
		   if ($selname!=null)//1 or 0 ..is the prev state now activate if is set...
		     $act[$p[1]] = 1;//$selname; 
		   else
		     $act[$p[1]] = 0;	
		 }  
	   }
	   //print_r($act);
	   foreach ($act as $id=>$val) {
	   
	     $sSQL = "update products set active=" . $val . " where id=" . $id;
		 //echo $sSQL,'<br>';
		 $ret = $db->Execute($sSQL,1);			 
	   }
	   
	   //create scroll list
	   $this->create_scroll_list($act);	
	}
   
	function list_items() {
	   $mycat = GetReq('cat');
	   
	   //$toprint .= $this->show_categories();
	   
	   if ($this->msg) $toprint .= $this->msg;	
	   if (GetReq('cat')) {
		  if (defined("RCCATEGORIES_DPC"))//text based cats
		    $toprint .= GetGlobal('controller')->calldpc_method('rccategories.show_categories use stitems+1');		
          elseif (defined("RCKATEGORIES_DPC"))	   //ERROR!!!!
		    $toprint .= GetGlobal('controller')->calldpc_method('rckategories.show_menu use stitems');		  
	     //$toprint .= $this->show_categories('cpitems',1);
       }		 
	   	   
	   $toprint .= $this->show_grids();
	   
	   //HIDDEN FIELD TO HOLD STATS ID FOR AJAX HANDLE
	   $out .= "<INPUT TYPE= \"hidden\" ID= \"statsid\" VALUE=\"0\" >";	
	   
	   $toprint .= $this->alphabetical();	
	   /*
	   $dater = new datepicker("/MDYT");	
	   $toprint .= $dater->renderspace(seturl("t=cpitems"),"cpitems");		 
	   unset($dater);		*/
	   
       $mywin = new window($this->title,$toprint);
       $out .= $mywin->render();	   	   	 		
	
	   return ($out);	
	} 
	
	function deltext($text) {
	
	   return "<del>".$text."</del>";
	}  
	
	//used in frontpage to build search selection list...
	function make_selection_list() {
	
	   $fmarkes = file_get_contents($this->hosted_path.'marka.opt');
	   //print_r($fmarkes);
	   
	   $markes = explode(",",$fmarkes);
	      
	   //foreach ($markes as $id=>$marka) {
	     //$ret .= "<option>" . $marka . "</option>";
		 //echo $marka,"<br>";
	   //} 
	   $ret = "<option selected>--- Επιλογή Μάρκας ---</option>";
	   
       $ret .= "<option>";//selected>";		   
	   $ret .= implode("</option><option>",$markes);
	   $ret .= "</option>";

	   return ($ret);
	}	
	
	function create_scroll_list($allow_array=null,$step=null) {
	
	    $id=0; $left = 0;
		if ($step==null) $step = 172;
	    $data = null;
		//print_r($allow_array);
	
        $mydir = dir($this->thubpath);
        while ($fileread = $mydir->read ()) { 
	
           if (stristr ($fileread,$this->restype)) {

              $title = str_replace ($this->restype, "", $fileread); 
			  $num = (int) $title;
			  
			  //if has no letters the pic (gallery) ans active=true
			  if ((is_numeric($title)) && ($allow_array[$num]==1)) {
			    $ctitle = $this->codeit($title,false);
                //$dfiles[$title] = $fileread; 
			  
			    $imgfile = $this->publicthubpath . $fileread; 
			    $itemurl = 'index.php?t=kshow&id='.$num;
			  
                $data .= "<a class=lowz href=\"$itemurl\"><img id=trimg$id class=trimg style=\"left:$left px;\" src='$imgfile' width=160 height=120 alt=\"$ctitle\"></a> 
                        <div style=\"left:$left px;\" class='trprotokola'>$ctitle</div>\r\n";			  
				$id+=1;		
				$left+=$step;
			  }		  
           }
        }
        $mydir->close ();
		
		//save
		$file = $this->thubpath . "scroll_list.lst"; //echo $file,'>';
	        
        if ($fp = @fopen ($file , "w")) {
	        //echo $file,"<br>";
                 fwrite ($fp, $data);
                 fclose ($fp);
				 return true;
        }
        else {
              $this->msg = "File creation error ($file)!\n";
		      //echo "File creation error ($filename)!<br>";
        }
		
		return false;				
	}			
	
	function alphabetical($command='stitems') {
	
	  $preparam = GetReq('alpha');
	  $cat = GetReq('cat');
	  
	  $ret .= seturl("t=$command","Αρχή") . "&nbsp;|";
	
	  for ($c=$preparam.'a';$c<$preparam.'z';$c++) {
	    $ret .= seturl("t=$command&cat=$cat&alpha=$c",$c) . "&nbsp;|";
	  }
	  //the last z !!!!!
	  $ret .= seturl("t=$command&cat=$cat&alpha=".$preparam."z",$preparam."z");
	  
      //$mywin = new window('',$ret);
      //$out = $mywin->render();	  
	  
	  return ($ret);
	}		
	
	function init_grids() {
        //disable alert !!!!!!!!!!!!		
		$out = "
function alert() {}\r\n 

function photo_name() {
  var str = arguments[0];

  id = 1000+str; 
  ret = id.substr(str.length-1);
  
  ret = str;

  return ret; 
}

function chr(c) { var h = c . toString (16);     h = unescape ('%'+h);return h;} 	  
	  
function code_it() {
  var str = arguments[0];

  seira = 'A';
  
  n = 1000000+str; 
  a = n.substr(str.length+3,3);
  x = chr(parseInt(a)+65);
  num = n.substr(str.length+4,3);
  
  code = seira+x+num;

  return code; 
}

function update_stats_id() {
  var str = arguments[0];
  var str1 = arguments[1];
  var str2 = arguments[2];
  
  
  statsid.value = str;
  //alert(statsid.value);
  sndReqArg('$this->ajaxLink'+statsid.value,'stats');
  
  return str1+' '+str2;
}
			
function init()
{
";
        foreach ($this->_grids as $n=>$g)
		  $out .= $g->init_grid($n);
	
        $out .= "\r\n}";
        return ($out);
	}
	
	function show_grids() {
	   //gets
	   $cat = rawurlencode(GetReq('cat'));	
	   $sel = GetReq('sel');
	   $alpha = GetReq('alpha');
	   //transformed posts !!!!
	   $apo = GetParam('apo');
	   $eos = GetParam('eos');	   
           $filter = GetParam('filter');
	
	   $grid0_get = seturl("t=stread&cat=$cat&sel=$sel&alpha=$alpha&apo=$apo&eos=$eos&filter=".$filter);//"shhandler.php?cat=$cat&sel=$sel&alpha=$alpha&apo=$apo&eos=$eos&filter=$filter";

	   $grid0_set = seturl("t=stwrite");//shhandler.php?t=shnsetitems";
	
	   //grid 0
	   $this->_grids[0]->set_text_column("AA",$this->getmapf('code'),"50","true");
	   $this->_grids[0]->set_text_column(localize('_active',getlocal()),"active","100","true","CHECKBOX","check_active","display","value",'101','0');	   
	   $this->_grids[0]->set_text_column(localize('_sysins',getlocal()),"sysins","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_itmname',getlocal()),"itmname","170","true");
	   $this->_grids[0]->set_text_column(localize('_uniname1',getlocal()),"uniname1","100","true");
	   $this->_grids[0]->set_text_column(localize('_uniname2',getlocal()),"uniname2","100","true");			
	   $this->_grids[0]->set_text_column(localize('_axia1',getlocal()),"price0","100","true");	
	   $this->_grids[0]->set_text_column(localize('_axia2',getlocal()),"price1","100","true");
	   $this->_grids[0]->set_text_column(localize('_axia3',getlocal()),"price2","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_percent',getlocal()),"pricepc","70","true");	   
	   $this->_grids[0]->set_text_column(localize('_itmdescr',getlocal()),"itmdescr","300","true","TEXTAREA");
	   
   /*    if (defined("RCCATEGORIES_DPC")) {//if all cats in one field
	   $this->_grids[0]->set_text_column(localize('_cat0',getlocal()),"cat0","150","true","LISTBOX","list_cats","cat","cat_id");
	   $this->_grids[0]->set_text_column(localize('_cat1',getlocal()),"cat1","150","true","LISTBOX","list_cats","cat","cat_id");
	   $this->_grids[0]->set_text_column(localize('_cat2',getlocal()),"cat2","150","true","LISTBOX","list_cats","cat","cat_id");	   	   	      	   	   	         	   	   	   	
	   $this->_grids[0]->set_text_column(localize('_cat3',getlocal()),"cat3","150","true","LISTBOX","list_cats","cat","cat_id");
	   $this->_grids[0]->set_text_column(localize('_cat4',getlocal()),"cat4","150","true","LISTBOX","list_cats","cat","cat_id");	   
	   $this->_grids[0]->set_text_column("Rec","id","50","true");		   
	   
	   $type = explode(",",file_get_contents($this->path . 'categories.opt'));	
	   
	   $this->_grids[0]->set_datasource("list_cats",$type,"cat_id","cat_id|cat",true);	   	   
	   }
       elseif (defined("RCKATEGORIES_DPC")) {*/	   
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat0","150","true");
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat1","150","true");
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat2","150","true");	   	   	      	   	   	         	   	   	   	
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat3","150","true");
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat4","150","true");	   
	   $this->_grids[0]->set_text_column("Rec","id","50","true");		   	   
	/*   }*/
	   
	   $this->_grids[0]->set_datasource("check_active",array('101'=>'Active','0'=>'Inactive'),null,"value|display",true);	   
	   	   		   	   	   
	   $datattr[] = $this->_grids[0]->set_grid_remote($grid0_get,$grid0_set,"500","460","livescrolling",17) . $this->searchinbrowser();							  
	   $viewattr[] = "left;50%";	   
	   
	   //grid 1 
	   //$wd .= GetGlobal('controller')->calldpc_method("rccustomers.show_grid");
	   
	   //businnes card	used to pass data from jscript
	   $add =  seturl("t=stvinput&cat=".GetReq('cat'));
	   //$imp =  seturl("t=cpvimport");
	   //$rcp =  seturl("t=cpvrecode");		   
	   $message = "<A href=\"$add\">".$this->add_item."</A>";//. $this->sep;
	   //$message.= "<A href=\"$imp\">".$this->import_item."</A>". $this->sep;		      		   
	   //$message.= "<A href=\"$rcp\">".$this->recode_item."</A>";	
	   
	    
	   $wd .= $this->_grids[0]->set_detail_div("ItemDetails",550,150,'F0F0FF',$message);
	   //$wd .= GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use stats");

       /*if ($this->hasgraph) {	   
		  $wd .= $this->show_graph('statisticscat','Category statistics',seturl('t=cpitems&cat='.$cat.'&p='.$p));
	   }	  
	   else
	      $wd .= "<h3>".localize('_GNAVAL',0)."</h3>";*/

	   $datattr[] = $wd;
	   $viewattr[] = "left;50%";
	   
	   $myw = new window('',$datattr,$viewattr);
	   $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
	   unset ($datattr);
	   unset ($viewattr);		   	
	   	
	   return ($ret);	
	}

	
	//called from cpcustromer	
	function show_grid($x=null,$y=null,$filter=null,$bfilter=null) {
	
	   $x = $x?$x:550;
	   $y = $y?$y:100;
	
       if ($filter) {
	     //gets
	     $cat = rawurlencode(GetReq('cat'));
	     $sel = GetReq('sel');   	   

             if ($bfilter)   	   
	       $grid1_get = seturl("t=stread&cat=$cat&sel=$sel&filter=".$bfilter);//shhandler.php?cat=$cat&sel=$sel&filter=".$bfilter;
             else
	       $grid1_get = seturl("t=stread&cat=$cat&sel=$sel");//"shhandler.php?cat=$cat&sel=$sel";
	   }	
	   else
	     $grid1_get = seturl("t=stread");//"shhandler.php";

	   $this->_grids[0]->set_text_column("AA",$this->getmapf('code'),"50","true");
	   $this->_grids[0]->set_text_column(localize('_active',getlocal()),"active","100","true","CHECKBOX","check_active","display","value",'101','0');	   	      
	   $this->_grids[0]->set_text_column(localize('_sysins',getlocal()),"sysins","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_itmname',getlocal()),"itmname","170","true");
	   $this->_grids[0]->set_text_column(localize('_uniname1',getlocal()),"uniname1","100","true");
	   $this->_grids[0]->set_text_column(localize('_uniname2',getlocal()),"uniname2","100","true");			
	   $this->_grids[0]->set_text_column(localize('_axia1',getlocal()),"price0","100","true");	
	   $this->_grids[0]->set_text_column(localize('_axia2',getlocal()),"price1","100","true");
	   $this->_grids[0]->set_text_column(localize('_axia3',getlocal()),"price2","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_percent',getlocal()),"pricepc","70","true");	   
	   $this->_grids[0]->set_text_column(localize('_itmdescr',getlocal()),"itmdescr","300","true","TEXTAREA");
	   
       /*if (defined("RCCATEGORIES_DPC")) { //if all cats in one field
	   $this->_grids[0]->set_text_column(localize('_cat0',getlocal()),"cat0","150","true","LISTBOX","list_cats","cat","cat_id");
	   $this->_grids[0]->set_text_column(localize('_cat1',getlocal()),"cat1","150","true","LISTBOX","list_cats","cat","cat_id");
	   $this->_grids[0]->set_text_column(localize('_cat2',getlocal()),"cat2","150","true","LISTBOX","list_cats","cat","cat_id");	   	   	      	   	   	         	   	   	   	
	   $this->_grids[0]->set_text_column(localize('_cat3',getlocal()),"cat3","150","true","LISTBOX","list_cats","cat","cat_id");
	   $this->_grids[0]->set_text_column(localize('_cat4',getlocal()),"cat4","150","true","LISTBOX","list_cats","cat","cat_id");	   
	   $this->_grids[0]->set_text_column("Rec","id","50","true");		   
	   
	   $type = explode(",",file_get_contents($this->path . 'categories.opt'));	
	   
	   $this->_grids[0]->set_datasource("list_cats",$type,"cat_id","cat_id|cat",true);	   	   
	   }
       elseif (defined("RCKATEGORIES_DPC")) {*/	   
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat0","150","true");
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat1","150","true");
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat2","150","true");	   	   	      	   	   	         	   	   	   	
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat3","150","true");
	   $this->_grids[0]->set_text_column(localize('_cat',getlocal()),"cat4","150","true");	   
	   $this->_grids[0]->set_text_column("Rec","id","50","true");		   	   
	   /*}*/
	   
	   $this->_grids[0]->set_datasource("check_active",array('101'=>'Active','0'=>'Inactive'),null,"value|display",true);	   
	   	   
	   $ret = $this->_grids[0]->set_grid_remote($grid1_get,null,"$x","$y","livescrolling",null,"false");							  
	
	   return ($ret);
	}	

	
	function sidewin() {

	    //$menu = $this->show_sub_tree('cpitems');
		//GetGlobal('controller')->calldpc_method('rcsidewin.set_show use '.$menu);	
		
		//if (!GetReq('cat')) { 
		
		  if (defined("RCCATEGORIES_DPC")) {//text based cats
		    if (!GetReq('cat'))//only when no cat sel else call other browser bellow
		      GetGlobal('controller')->calldpc_method('rcsidewin.set_show_calldpc use rccategories.show_tree PARAMS stitems');		
	      }		
          elseif (defined("RCKATEGORIES_DPC"))//sql based cats			
            GetGlobal('controller')->calldpc_method('rcsidewin.set_show_calldpc use rckategories.show_tree PARAMS stitems');					
	    //}	  
	}
	
	function get_items_list() {
       $db = GetGlobal('db');	
       $handler = new nhandler(17,'id','Desc');
	   	   
	   //mysqli specific to get greek chars from utf-8 mysql db over adodb using sqli driver
       //$db->_connectionID->set_charset("greek");
	   //$db->query("SET NAMES 'utf8'");
	   $testcat = 'ΜΗΧΑΝΕΣ ΓΡΑΦΕΙΟΥ';
	   $c1 = iconv('','ISO-8859-7','ΑΝΑΛΩΣΙΜΑ ΜΗΧΑΝΩΝΩ');
	   $c2 = rawurldecode('ΜΗΧΑΝΕΣ ΓΡΑΦΕΙΟΥ');
	   $c3 = "ΑΝΑΛΩ%";
	   //tranformed posts..
	   $apo = GetReq('apo'); //echo $apo;
	   $eos = GetReq('eos');	//echo $eos; 
       $filter = GetReq('filter');
	   
	   //geta 	  
	   if (GetReq('cat')!=null)
		    $cat = GetReq('cat');	
	   //if (GetReq('sel')!=null)
		 //   $sel = GetReq('sel');		
		
	   $whereClause = '';
	   
		  if (isset($_GET['p_id'])) {		
            $whereClause .= ' where id=' . $_GET['p_id'];				     
	   	  }
	   elseif ($filter) {

             $whereClause = " where (id like '%$filter%' or sysins like '%$filter%' or ".$this->getmapf('code')." like '%$filter%' or pricepc like '%$filter%' or price2 like '%$filter%' or itmname like '%$filter%' or itmfname like '%$filter%' or code2 like '%$filter%' or code3 like '%$filter%' or code4 like '%$filter%' or code5 like '%$filter%' or price0 like '%$filter%' or price1 like '%$filter%' or itmdescr like '%$filter%' or itmfdescr like '%$filter%' or itmremark like '%$filter%')";
           }	   
		  		
		  if (isset($cat)) {//echo $cat;
		    if ( (isset($_GET['p_id'])) || (isset($_GET['filter'])) ) $whereClause.=' and ';
		                         else $whereClause.=' where ';			  
			
		    if (defined("RCCATEGORIES_DPC")) {//text based cats
           /*   $whereClause .= '( cat0=' . $db->qstr(str_replace('_',' ',$cat));		  
			  $whereClause .= 'or cat1=' . $db->qstr(str_replace('_',' ',$cat));		  
			  $whereClause .= 'or cat2=' . $db->qstr(str_replace('_',' ',$cat));		 
			  $whereClause .= 'or cat3=' . $db->qstr(str_replace('_',' ',$cat));		   
			  $whereClause .= 'or cat4=' . $db->qstr(str_replace('_',' ',$cat)) . ') ';	*/

			  $cat_tree = explode('^',str_replace('_',' ',$cat)); 
/*if ($sel=str_replace('_',' ',GetReq('sel'))) {
$max = count($cat_tree)-1;
if ($sel!=$cat_tree[$max])
  $cat_tree[]=$sel;
}*/
		
			  if ($cat_tree[0])
			    $whereClause .= ' cat0=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[0])));		  
			  if ($cat_tree[1])	
			    $whereClause .= ' and cat1=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[1])));		 
			  if ($cat_tree[2])	
			    $whereClause .= ' and cat2=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[2])));		   
			  if ($cat_tree[3])	
			    $whereClause .= ' and cat3=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[3])));
			  if ($cat_tree[4])	
			    $whereClause .= ' and cat4=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[4])));		  
		    }
            elseif (defined("RCKATEGORIES_DPC")) {
			
			  $cat_tree = explode('^',str_replace('_',' ',$cat)); 
			
              //$whereClause .= '( cat0=' . $db->qstr(str_replace('_',' ',$cat_tree[0]));		  
			  if ($cat_tree[0])
			    $whereClause .= ' cat0=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[0])));		  
			  if ($cat_tree[1])	
			    $whereClause .= ' and cat1=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[1])));		 
			  if ($cat_tree[2])	
			    $whereClause .= ' and cat2=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[2])));		   
			  if ($cat_tree[3])	
			    $whereClause .= ' and cat3=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[3])));
			  /*if ($cat_tree[4])	
			    $whereClause .= ' and cat4=' . $db->qstr(rawurldecode(str_replace('_',' ',$cat_tree[4])));*/
								
			  //$whereClause .= ') ';		   
			  //$whereClause .= " cat1='".$c2."'";	
			}  
		  }		
		  
		  /*if (isset($sel)) {
		    if ((isset($cat)) || ((isset($_GET['p_id'])))) $whereClause.=' and ';
		                else $whereClause.=' where ';		  
            $whereClause .= ' cat1=' . $db->qstr($sel);		  
		  }	*/		    
	   
	      if ($letter=GetReq('alpha')) {
		    if (isset($cat) || isset($sel) || (isset($_GET['filter'])) || (isset($_GET['p_id']))) 
			  $whereClause.=' and ';
		    else $whereClause.=' where ';		  
	        $whereClause .= " ( itmname like '" . strtolower($letter) . "%' or " .
		                    " itmname like '" . strtoupper($letter) . "%')";	
			//marka is lookup table...???		 
		  }			 
				  
		  if ($apo) {
		    if (($letter) || (isset($cat)) || (isset($sel)) || (isset($_GET['filter'])) || (isset($_GET['p_id']))) 
			     $whereClause.=' and ';
		    else $whereClause.=' where ';
		    $whereClause.= "sysins>='" . convert_date(trim($apo),"-DMY",1) . "'";
		  }  
		  
		  if ($eos) {
		    if (($letter) || ($apo) || (isset($cat)) || isset($sel) || (isset($_GET['filter'])) || (isset($_GET['p_id']))) 
			     $whereClause.=' and ';
		    else $whereClause.=' where ';
		    $whereClause .= "sysins<='" . convert_date(trim($eos),"-DMY",1) . "'";						
		  } 				   
	     

	   /*if (isset($_GET['id'])) {
		 $whereClause=" WHERE p_id=".$_GET["id"]." ";
	   }*/ 
	   $lan = getlocal();	
       $name = $lan?'itmname':'itmfname';
       $descr = $lan?'itmdescr':'itmfdescr';	   
   
	   $sSQL .= "select id,sysins,code1,pricepc,price2,sysins,$name,uniname1,uniname2,active,code4," .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,$descr,".$this->getmapf('code')." from products ";
	   $sSQL .= $whereClause;
	   //$sSQL .= $this->datahandler->get_sql_order();
	   $sSQL .= " ORDER BY " . $this->sortColumn . " " . $this->sortDirection ." LIMIT ". $this->ordinalStart .",". ($this->pageSize) .";";
	   //echo $sSQL;	die();
	   
       $result = $db->Execute($sSQL,2);	
	   
	   //$order = " ORDER BY " . $this->sortColumn . " " . $this->sortDirection ." LIMIT ". $this->ordinalStart .",". ($this->pageSize) .";";
	   //$result = GetGlobal('controller')->calldpc_method("rcvehicles.select use $order");	   
	   
	   $names = array('id','sysins','code1','pricepc','price2','sysins',
	                  'itmname','uniname1','uniname2','active','code4',
					  'price0','price1','cat0','cat1','cat2','cat3','cat4','itmdescr',$this->getmapf('code'));			 			 
	   $handler->handle_output($db,$result,$names,'id',null,$this->encoding);
	   
	   //$ret = $this->handle_output($db,$result,$names,'p_id',true);	   
	   //echo trim($ret);	 	   	   
	   	
	}
	
	function save_items_list() {
       $db = GetGlobal('db');
       $handler = new nhandler(17,'id','Desc');	   		
	
	   //remove p_id=auto_inc field to insert a new rec
	   //no update after insert, if update done without refresh (id=null problem)
	   $names = array('id','sysins','code1','pricepc','price2','sysins',
	                  'itmname','uniname1','uniname2','active','code4',
					  'price0','price1','cat0','cat1','cat2','cat3','cat4','itmdescr',$this->getmapf('code'));			 			 
			 
	   $sql2run = $handler->handle_input(null,'products',$names,'id');		
	
       $db->Execute($sql2run,3,null,1);
	   
	   if (($this->debug_sql) && ($f = fopen($this->path . "nitobi.sql",'w+'))) {
	     fwrite($f,$sql2run,strlen($sql2run));
		 fclose($f);
	   }	
	}			
    
	//override
	function getmapf($name,$appname=null) {
      if ($appname) {
		 $this->hosted_path = $this->path . 'instances/' . $appname . '/' ;
	  }	
	  $path = $this->hosted_path;	
	
	  $map_t = remote_arrayload('RCITEMS','maptitle',$this->path);	
	  $map_f = remote_arrayload('RCITEMS','mapfields',$this->path);	  	
	
	  if (empty($map_t)) return null;	

	  foreach ($map_t as $id=>$elm)
	    if ($elm==$name) break;
				
	  //$id = key($this->map_t[$name]) ;
	  $ret = $map_f[$id];

	  return ($ret);
	}	
		
	function switch_db($appname=null) {
      if ($appname) {
		 $this->hosted_path = $this->path . 'instances/' . $appname . '/' ;
	  }
	  //else
      $path = $this->hosted_path;
      //echo $path,'-';
		  		  
	  	
      $_Dbtype   = remote_paramload('DATABASE','dbtype',$path);
      $_Dbname   = remote_paramload('DATABASE','dbname',$path);
      $_User     = remote_paramload('DATABASE','dbuser',$path);
      $_Password = remote_paramload('DATABASE','dbpwd',$path);
	  //echo $_Dbname,'<br>';
		  
      //return ;		  
  	  if ((stristr($_Dbtype,'mysql')) && (stristr($_Dbtype,'mysqli'))) {	
          //$ADODB_CACHE_DIR = paramload('SHELL','prpath') . paramload('DATABASE','pathcacheq');		
				
          $dbp = ADONewConnection($_Dbtype);
          $dbp->PConnect($_Host, $_User, $_Password, $_Dbname);
		  //echo 'ADODB loaded !';

          if ( ($cs=paramload('DATABASE','charset')) && (stristr($_Dbtype,'mysqli')) ) {
            $dbp->_connectionID->set_charset($cs);
			//echo 'z';
		  }	
			
		  SetGlobal('db',&$dbp);//global alias
	   }				
	}							

};
}
?>