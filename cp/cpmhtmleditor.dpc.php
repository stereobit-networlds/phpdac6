<?php
$__DPCSEC['CPMHTMLEDITOR_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CPMHTMLEDITOR_DPC")) && (seclevel('CPMHTMLEDITOR_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CPMHTMLEDITOR_DPC",true);

$a = GetGlobal('controller')->require_dpc('images/wateresize.lib.php');
require_once($a);

$b= GetGlobal('controller')->require_dpc('images/SimpleImage.lib.php');
require_once($b);

$__DPC['CPMHTMLEDITOR_DPC'] = 'cpmhtmleditor';

$__EVENTS['CPMHTMLEDITOR_DPC'][0]='cpmhtmleditor';
$__EVENTS['CPMHTMLEDITOR_DPC'][1]='cpmdropzone';
$__EVENTS['CPMHTMLEDITOR_DPC'][2]='cpmvphoto';
$__EVENTS['CPMHTMLEDITOR_DPC'][3]='cpmvdel';
$__EVENTS['CPMHTMLEDITOR_DPC'][4]='cpmvphotoadddb';
$__EVENTS['CPMHTMLEDITOR_DPC'][5]='cpmvphotodeldb';
$__EVENTS['CPMHTMLEDITOR_DPC'][6]='cpmedititem';
$__EVENTS['CPMHTMLEDITOR_DPC'][6]='cpmnewitem';

$__ACTIONS['CPMHTMLEDITOR_DPC'][0]='cpmhtmleditor';
$__ACTIONS['CPMHTMLEDITOR_DPC'][1]='cpmdropzone';
$__ACTIONS['CPMHTMLEDITOR_DPC'][2]='cpmvphoto';
$__ACTIONS['CPMHTMLEDITOR_DPC'][3]='cpmvdel';
$__ACTIONS['CPMHTMLEDITOR_DPC'][4]='cpmvphotoadddb';
$__ACTIONS['CPMHTMLEDITOR_DPC'][5]='cpmvphotodeldb';
$__ACTIONS['CPMHTMLEDITOR_DPC'][6]='cpmedititem';
$__ACTIONS['CPMHTMLEDITOR_DPC'][7]='cpmnewitem';

//$__DPCATTR['CPMHTMLEDITOR_DPC']['cpmhtmleditor'] = 'cpmhtmleditor,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['CPMHTMLEDITOR_DPC'][0]='SHLOGIN_DPC;Login;Εισαγωγή';
$__LOCALE['CPMHTMLEDITOR_DPC'][1]='_submit;Save;Αποθήκευση';
$__LOCALE['CPMHTMLEDITOR_DPC'][2]='_title;Subject;Θέμα';
$__LOCALE['CPMHTMLEDITOR_DPC'][3]='_tags;Tags;Ετικέτες';
$__LOCALE['CPMHTMLEDITOR_DPC'][4]='_subject;My subject;Το θέμα μου';

class cpmhtmleditor {

	static $staticpath;
	var $encoding, $prpath, $template, $one_attachment, $slan;
	var $htmlfile, $ckeditor4, $cke4, $ckjs;
	var $urlpath, $urlbase, $msg;
	var $photodb, $restype, $cseparator;

	function __construct() {
	
		self::$staticpath = paramload('SHELL','urlpath');
	
		$this->urlpath = paramload('SHELL','urlpath');		  
		$this->urlbase = paramload('SHELL','urlbase');	
		
		$this->encoding = $_GET['encoding']?$_GET['encoding']:'utf-8';
		//echo '>',$encoding;
		$this->prpath = paramload('SHELL','prpath');
		$tmpl_path = remote_paramload('FRONTHTMLPAGE','template',$this->prpath);
		$this->template = $tmpl_path ? $tmpl_path .'/' : null;

		$this->one_attachment = remote_paramload('SHKATALOG','oneattach',$this->prpath);
		$lan = getlocal();
		$this->slan = ($this->one_attachment) ? null : ($lan?$lan:'0');

		//save editable file
		$this->htmlfile = urldecode(base64_decode($_GET['htmlfile']));
		//echo $htmlfile;
		/*if php editable file extend template path to pages path*/
		$this->template .= stristr($htmlfile,'.php') ? 
							(stristr($htmlfile,'index.php') ? null :'pages/') : 
							null;

		//ckeditor 4
		//$ckeditor4 = GetReq('cke4') ? GetReq('cke4') : false;
		$this->ckeditor4 = ((GetReq('cke4'))||($template)) ? /*true*/false : false; //<<<<
		$this->cke4_inline = $this->ckeditor4 ? true/*false*/ : false; 
		$this->ckjs = $this->ckeditor4 ? "http://stereobit.gr/ckeditor4/ckeditor.js" : "http://stereobit.gr/ckeditor/ckeditor.js";
	
	    $this->photodb = remote_paramload('RCITEMS','photodb',$this->prpath);
		$this->restype = remote_paramload('RCITEMS','restype',$this->prpath);
	    $this->msg = null;
		
		$csep = remote_paramload('RCITEMS','csep',$this->path); 
		$this->cseparator = $csep ? $csep : '^';			
	}	
	
	public function event($sEvent) {
	
		switch ($sEvent) {
			case 'cpmnewitem'     :
			case 'cpmedititem'    : $this->javascript();
								    break;
			
			case 'cpmvphotoadddb' : $this->add_photo2db(null,null,GetReq('size')); break;
			case 'cpmvphotodeldb' : $this->delete_photodb(GetReq('size')); break;
			
		    case 'cpmvdel'     :$this->delete_photo(); break;
			case 'cpmvphoto'   :break; 
		    case 'cpmdropzone' :$this->dropzone(); break; //fast-entry photo
			default 		   :$this->javascript();
								$this->raw_save();
		}
    }
	
	public function action($sAction) {
		switch ($sAction) {
		    case 'cpmnewitem'     :
		    case 'cpmedititem'    : $out = $this->editor();
			                        break;
		
			case 'cpmvphotoadddb' : 
			case 'cpmvphotodeldb' : 		
	
		    case 'cpmvdel'     :
		    case 'cpmvphoto'   : $out = $this->gallery(); break; 
			case 'cpmdropzone' : break;
			default 		   : $out = $this->editor();
		}	
		return ($out);
    }
	
	protected function raw_save() {
		if ((GetReq('savepart')) && ($file=GetParam('file'))) {

			//$p = explode('/',$htmlfile);
			//$fa = array_pop($p);
	
			//$file = GetParam('file');
	
			$mypartialfile = getcwd() . '/html/' . $template . $file;
			$data = GetParam('data') ? $this->unload_spath(GetParam('data')) : '';
			//$old_data = GetParam('olddata') ? $this->unload_spath(GetParam('olddata')) : '';
	
			//$mydfile = getcwd() . '/html/pdata.part';
			$myofile = getcwd() . '/html/'.$template.'podata.part';
     
			/*if ($old_data) {//keep initial data
	
			//check if data to save exists
			//if ($odata = @file_get_contents($myofile)) {
			//}
	   
			@file_put_contents($myofile,$old_data);	   
			} */  
	   
			if ($data) { //save modified data
				$message = null;
				//@file_put_contents($mydfile,$data);	 

				//if olddata and dif save...
				if (($odata = @file_get_contents($myofile)) && (strlen($odata)!=strlen($data))) {
					//keep backup
					$b = @copy($mypartialfile, str_replace(array('.htm','.php'),array('._htm','._php'),$mypartialfile));  
					//save it
					//$str = htmlentities($str, ENT_COMPAT, "UTF-8");
					$r = @file_put_contents($mypartialfile, str_replace($odata, $data, @file_get_contents($mypartialfile), $counter));
		   
					//remove compare file
					@unlink($myofile);
		   
					$message = $counter ? 'Saved ('.$file .')!' : 'Error: Not Saved ('.$file .')!';
				}
				else //save data to compare it...
					@file_put_contents($myofile,$data);	
			}   
	
			//$message .= $data ?	$data.' Saved ' : null; //null when olddata
			die($message);
		}
		elseif (($mc_page=GetReq('mc_page')) /*&& ($file=GetParam('file'))*/) {

			if ($turl=urldecode(base64_decode($_GET['turl']))) {
				$pt = explode('?',$turl);
				parse_str($pt[1], $args);
			}			
			$id = $args['id'] ? $args['id'] : ($args['cat'] ? $args['cat'] : str_replace('.php','',$pt[0]));
			$ret = GetGlobal('controller')->calldpc_method("fronthtmlpage.mcSavePage use $id+$mc_page+");
			//die($ret);
		}	
	}
	
	protected function ckeditor_javascript() {
		$_url= "cpmdpceditor.php?turl=" . urlencode(base64_encode($turl));

		if ($cke4_inline) {
			$ret =  "	   
function save_inline_data(data, oldData){
	
	//alert(data+'--'+oldData);
	
	//ajax call to replace part of conetent with the updated partial text submited here...
	//JSON.stringify(data)
	//sndReqArg('cpmhtmleditor.php?savepart=1&data='+escape(data)+'&olddata='+escape(oldData));	
	sndReqArg('cpmhtmleditor.php?savepart=1&file=$htmlfile&data='+escape(data));
}

/*function save_init_data(data){
	
	//alert('INIT:'+data);
	
	//ajax call to replace part of conetent with the updated partial text submited here...
	//JSON.stringify(data)
	sndReqArg('cpmhtmleditor.php?savepart=1&file=$htmlfile&olddata='+escape(data));	
}*/

/*
document.addEventListener('keydown', function (event) {
  var esc = event.which == 27,
      nl = event.which == 13,
      el = event.target,
      input = el.nodeName != 'INPUT' && el.nodeName != 'TEXTAREA',
      data = {};

  if (input) {
    if (esc) {
      // restore state
      document.execCommand('undo');
      el.blur();
    } 
	else if (nl) {
      // save
      //data[el.getAttribute('data-name')] = el.innerHTML;

      // we could send an ajax request to update the field
      //log(JSON.stringify(data));
	  save_inline_data(data);

      el.blur();
      event.preventDefault();
    }
  }
}, true);
*/
";	    
        }
		return ($ret);
	}
	
    protected function javascript() {
   
      if (iniload('JAVASCRIPT')) {
		 
		   $js = new jscript;
		   //$js->load_js($this->ckjs); //inline
           $js->load_js($this->ckeditor_javascript(),"",1);			   
		   unset ($js);
	  }   
    } 

	//generic html edit
    protected function render($file=null,$tempfile=null) {
		$id = GetParam('id');
		$type = GetParam('type') ? GetParam('type') : '.html'; //default type for text attachment
		$isTemplate = (substr($mydata,0,8)=='<!DOCTYPE') ? false : true; //html5 !!!!!	
      
		if (isset($_POST['htmltext'])) {
			if ($id) { //db	 
				$mytext = str_replace(' use','&nbsp;use',str_replace('+','<SYN>',$this->unload_spath(str_replace("'","\'",$_POST['htmltext'])))); //!!!!!!!!!!!!!!
				$save = GetGlobal('controller')->calldpc_method("rcitems.add_attachment_data use ".$id ."+". $type."+".$mytext);		 
				$mydata = GetGlobal('controller')->calldpc_method("rcitems.has_attachment2db use " . $id ."+$type+1"); 
			}
			else {//text
				$this->savefile($file,null);		 
				$mydata = file_get_contents($file);//$_POST['htmltext'];
			}		 
		}
		else {//load
			if ($id) { //db
				$mydata = GetGlobal('controller')->calldpc_method("rcitems.has_attachment2db use " . $id ."+$type+1"); 
			}
			else {//text
				if (($file) && is_readable($file)) {
					$mydata = file_get_contents($file);
				}  
				else
					$mydata = 'File not exist!' . " ($file)";			
			}	  
		}
	  
		$purl = $_SERVER['PHP_SELF'].'?encoding='.$_GET['encoding'].'&htmlfile='.$_GET['htmlfile'];
		$out = "<form name=\"htmlform\" action=\"".$purl."\" method=\"post\">";  

		$out .= $this->ckeditor($mydata, $isTemplate);
	
		$mytempfile = GetParam('tempfile')?	GetParam('tempfile') : $tempfile;	   
		$myfile = GetParam('file')?	GetParam('file') : $file;
		
		$out .= "<input type=\"hidden\" name=\"file2saveon\" value=\"" . $myfile . "\" />";	  
		$out .= "<input type=\"hidden\" name=\"filetemp\" value=\"" . $mytempfile . "\" />";	 
		$out .= "<input type=\"hidden\" name=\"id\" value=\"" . $id . "\" />";	 
		$out .= "<input type=\"hidden\" name=\"type\" value=\"" . $type . "\" />";		   
		$out .= "</form>";
      
		return ($out); 
    }	
	
	//new item
    protected function render_new() {
		$type = '.html'; //default type for text attachment
		$cpGet = GetGlobal('controller')->calldpc_var('rcpmenu.cpGet');
		$id = GetParam('id');
      
		if (isset($_POST['insert'])) { 
		
			$title = GetParam('title');
			$code = $this->replace_spchars($title);
			$tags = GetParam('tags') ;
			$text = GetParam('htmltext');
			$descr = substr(trim(strip_tags($text)),0,250).'...';
			$category = $this->replace_spchars($cpGet['cat'], 1);
			
			$save_attachment = GetGlobal('controller')->calldpc_method("rcitems.add_attachment_data use ".$code."+". $type."+".$text."+1");		
			$save_tags = GetGlobal('controller')->calldpc_method("rctags.add_tags_data use ".$code."+". $title."+".$descr."+".$tags);		
			$save_cat = GetGlobal('controller')->calldpc_method("rckategories.add_kategory_data use ".$category);		
			$save_item = GetGlobal('controller')->calldpc_method("rcitems.add_item_data use ".$code."+". $title."+".$descr."+".$category);		
			
			if (isset($_POST['htmltext'])) {
				$mytext = str_replace(' use','&nbsp;use',str_replace('+','<SYN>',$this->unload_spath(str_replace("'","\'",$_POST['htmltext'])))); //!!!!!!!!!!!!!!
				$save = GetGlobal('controller')->calldpc_method("rcitems.add_attachment_data use ".$code ."+". $type."+".$mytext);		 
				$mydata = GetGlobal('controller')->calldpc_method("rcitems.has_attachment2db use " . $code ."+$type+1"); 			
			}
		}
		else {//load
			$mydata = $id ? GetGlobal('controller')->calldpc_method("rcitems.has_attachment2db use " . $id ."+$type+1") : null; 	  
		}
	  
	  
		$purl = 'cpmhtmleditor.php';
		if (!$_POST['insert']) {	//hide when post fast
			$out = "<form name=\"htmlform\" action=\"".$purl."\" method=\"post\">";  
		}	
	  
		$out .= $this->ckeditor($mydata);
	
		if (!$_POST['insert']) {	//hide when post fast	 
			$out .= "<input type=\"hidden\" name=\"id\" value=\"" . $id . "\" />";	 	   
			$out .= "<input type=\"hidden\" name=\"insert\" value=\"1\" />";
			$out .= "<input type=\"hidden\" name=\"FormAction\" value=\"cpmnewitem\" />";			
			/*
			$out .= "<br/><br/>".localize('_title',getlocal()).":<input type=\"text\" name=\"title\" value=\"".localize('_subject',getlocal())."\" />";
			$out .= "<br/>".localize('_tags',getlocal()).":<input type=\"text\" name=\"tags\" value=\"".str_replace(array(' ','_','-'),array(',',' ',' '),$myid)."\" />";
			*/			
			$out .= '     <div class="space20"></div>
                                 <div class="row-fluid">
                                     <div class="feedback">
                                         <h3>'.localize('_title',getlocal()).'</h3>
                                         <p>'.localize('_tags',getlocal()).'</p>
                                         <div class="space20"></div>

                                             <!--div class="control-group">
                                                 <input type="text" placeholder="Name" class="span12">
                                             </div-->
                                             <div class="control-group ">
                                                 <input type="text" name="title" value="'.localize('_subject',getlocal()).'" class="span6 one-half">
                                                 <input type="text" name="tags" value="'.str_replace(array(' ','_','-'),array(',',' ',' '),$myid).'" class="span6">
                                             </div>
                                             <!--div class="control-group">
                                                 <textarea placeholder="Message" class="span12" rows="5"></textarea>
                                             </div-->
                                             <div class="text-center">
                                                 <button class="btn btn-success " name="ok" type="submit">'.localize('_submit',getlocal()).'</button>
                                             </div>
                                     </div>
                                 </div>';  
		
			$out .= "</form>";
			
		}//post fast hide
		elseif ($_POST['insert']) { //post fast seccond step, add photo

			if (defined('RCITEMS_DPC') && (($code)||($category))) {	
				$out .= GetGlobal('controller')->calldpc_method('rcitems.form_photo use 1+'.$category.'+'.$code.'+cpitems');
			}		
		}
      
		return ($out); 
    }	
	
	//edit item
    protected function render_edit() { 
		$type = '.html'; //default type for text attachment
		$cpGet = GetGlobal('controller')->calldpc_var('rcpmenu.cpGet');
		$id = GetParam('id') ? GetParam('id') : $cpGet['id'];		
      
		if (isset($_POST['id'])) { //post edit

			$title = GetParam('title');
			$code = $this->replace_spchars($title);
			$tags = GetParam('tags') ;
			$text = GetParam('htmltext');
			$descr = substr(trim(strip_tags($text)),0,250).'...';
			$category = $this->replace_spchars($cpGet['cat'], 1);
			
			$save_attachment = GetGlobal('controller')->calldpc_method("rcitems.add_attachment_data use ".$code."+". $type."+".$text."+1");		
			$save_tags = GetGlobal('controller')->calldpc_method("rctags.add_tags_data use ".$code."+". $title."+".$descr."+".$tags);		
			$save_cat = GetGlobal('controller')->calldpc_method("rckategories.add_kategory_data use ".$category);		
			$save_item = GetGlobal('controller')->calldpc_method("rcitems.add_item_data use ".$code."+". $title."+".$descr."+".$category);		
			
			if (isset($_POST['htmltext'])) {
				$mytext = str_replace(' use','&nbsp;use',str_replace('+','<SYN>',$this->unload_spath(str_replace("'","\'",$_POST['htmltext'])))); //!!!!!!!!!!!!!!
				$save = GetGlobal('controller')->calldpc_method("rcitems.add_attachment_data use ".$code ."+". $type."+".$mytext);		 
				$mydata = GetGlobal('controller')->calldpc_method("rcitems.has_attachment2db use " . $code ."+$type+1"); 			
			}
		}
		else {//load
		    $mydata = $id ? GetGlobal('controller')->calldpc_method("rcitems.has_attachment2db use " . $id ."+$type+1") : null; 
		}
	  
      
		$purl = 'cpmhtmleditor.php';
		$out = "<form name=\"htmlform\" action=\"".$purl."\" method=\"post\">";  
	    $out .= $this->ckeditor($mydata);
	
		/*
			$out .= "<br/><br/>".localize('_title',getlocal()).":<input type=\"text\" name=\"title\" value=\"".localize('_subject',getlocal())."\" />";
			$out .= "<br/>".localize('_tags',getlocal()).":<input type=\"text\" name=\"tags\" value=\"".str_replace(array(' ','_','-'),array(',',' ',' '),$myid)."\" />";
		*/
		$out .= "<input type=\"hidden\" name=\"id\" value=\"" . $id . "\" />";		  
		$out .= "<input type=\"hidden\" name=\"update\" value=\"1\" />";		
		$out .= "<input type=\"hidden\" name=\"FormAction\" value=\"cpmedititem\" />";
			
		$out .= '            <div class="space20"></div>
                                 <div class="row-fluid">
                                     <div class="feedback">
                                         <h3>'.localize('_title',getlocal()).'</h3>
                                         <p>'.localize('_tags',getlocal()).'</p>
                                         <div class="space20"></div>

                                             <!--div class="control-group">
                                                 <input type="text" placeholder="Name" class="span12">
                                             </div-->
                                             <div class="control-group ">
                                                 <input type="text" name="title" value="'.localize('_subject',getlocal()).'" class="span6 one-half">
                                                 <input type="text" name="tags" value="'.str_replace(array(' ','_','-'),array(',',' ',' '),$myid).'" class="span6">
                                             </div>
                                             <!--div class="control-group">
                                                 <textarea placeholder="Message" class="span12" rows="5"></textarea>
                                             </div-->
                                             <div class="text-center">
                                                 <button class="btn btn-success " name="ok" type="submit">'.localize('_submit',getlocal()).'</button>
                                             </div>
                                     </div>
                                 </div>';  
		
		$out .= "</form>";
      
		return ($out); 
    }

    public function editor($itemcode=null, $itemtype=null, $file = null) {
	    $cpGet = GetGlobal('controller')->calldpc_var('rcpmenu.cpGet');
	    $id = $itemcode ? $itemcode : GetReq('id'); //$cpGet['id']; //selected item
		$type = $itemtype ? $itemtype : (GetReq('type') ? GetReq('type') : null);//'.html'); //must be set by hand in url
		$htmlfile = $file ? $file : $this->htmlfile; 
		
		if (!empty($_POST)) {

		    if ($myfile = GetParam('file2saveon'))  
				$ret = $this->render($myfile);
			elseif ($insfast = GetParam('insert')) 
				$ret =  $this->render_new();
			else 	
				$ret =  $this->render_edit();		
		}
		else {
			if ($htmlfile) {
				$p = explode('/',$htmlfile);
				$fa = array_pop($p);
				$myfile = getcwd() . '/html/' . $this->template .  $fa;
				//$tempname = getcwd() . '/modify_html.tmp';
				$ret = $this->render($myfile);	  	  
			}			
			elseif ($id) 
				$ret = $this->render_edit();
			else
				$ret = $this->render_new();		
		}	
		return ($ret);
    }	

    protected function savefile($filename=null,$tempfile=null) {
        //echo $filename;
	 
	    if (GetSessionParam('LOGIN')!='yes') 
			die("Not logged in!");
			
        $this->write2disk($filename,$_POST['htmltext']); //save temp
             
        if ($tempfile)
            $this->write2disk($tempfile,$_POST['htmltext']); //save original
			  
    }

    protected function remove_spchars($text=null) {

		$p1 = str_replace("\'","'",$text);
		$p2 = str_replace('\"','"',$p1);

		return $p2;
    }

    protected function handle_phpdac_tags($text,$savemode=null) {

		if ($savemode==null) {//load
			$p1 = str_replace("<?","<phpdac5>",$text);
			$p2 = str_replace('?>','</phpdac5>',$p1);
		}
		else {//save mode
			$p1 = str_replace("<phpdac5>","<?",$text);
			$p2 = str_replace('</phpdac5>','?>',$p1);
		}

		return $p2;
    }

    protected function load_spath($text=null) {
	   //if ckfinder
	   //return ($text);

       $p1 = str_replace("images/","../images/",$text);

       $ret = $this->handle_phpdac_tags($p1);
       return ($ret);

    }

    protected function unload_spath($text=null) {
	   //if ckfinder
	   //return ($text);	

       $p1 = str_replace("../images/","images/",$text);

       $ret = $this->handle_phpdac_tags($p1,1);
       return ($ret);

    }

    protected function write2disk($file,$data=null) {

	    $indata = $this->remove_spchars($this->unload_spath($data));
		//keep a backup
		@copy($file, str_replace(array('.htm','.php'),array('._htm','._php'),$file));
		
        if ($fp = @fopen ($file , "w")) {
	        //echo $file,"<br>";
            fwrite ($fp, $indata);
            fclose ($fp);

            return true;
        }
        else {
            $this->msg = "File creation error ($file)!";
        }
        return false;

    }
	
	
	//IMAGES
	
	protected function watermark($s, $f) {
		$image2add = remote_paramload('RCITEMS','image2add',$this->path);
	
		if (is_file($s)) {
	        $process_img = new wateresize();
			$process_img->loadimg($s, 0, 0, 'jpg', 1, $this->urlpath, $this->image2add);
			$process_img->set_jpg_quality(filesize($s));
	        $ret = $process_img->saveimg($this->urlpath, $f);	
	        unset($process_img);		
		}   
	    else
			$ret = move_uploaded_file($s,$f);
				
	}

    protected function create_thumbnail($s, $file, $ptype, $uphotoid=null) {
	
        $restype = remote_paramload('RCITEMS','restype',$this->prpath);//'.jpg'; 				  			
		$autoresize = remote_arrayload('RCITEMS','autoresize',$this->prpath);
		
		//3 sized scaled images
		$photo_bg = remote_paramload('RCITEMS','photobgpath',$this->prpath);		  
		$img_large = $photo_bg ? $this->urlpath ."/images/$photo_bg/" : $thubpath;	  	  
		$photo_md = remote_paramload('RCITEMS','photomdpath',$this->prpath);		  
		$img_medium = $photo_md ? $this->urlpath ."/images/$photo_md/" : $thubpath;	  	  
		$photo_sm = remote_paramload('RCITEMS','photosmpath',$this->prpath);		  
		$img_small = $photo_sm ? $this->urlpath ."/images/$photo_sm/" : $thubpath;	  
		
		$f = $file . $restype;
		
		switch ($ptype) {
		
			  case 'SMALL' : //resize medium, small and save at once
                             if (!empty($autoresize)) {							 
                               $image = new SimpleImage();
                               $image->load($s);
							   						   
							   if ($dim_small = $autoresize[0]) {
                                 $image->resizeToWidth($dim_small);
                                 $image->save($img_small . $f);
								 //auto add to db
								 $this->add_photo2db($file,$restype,'SMALL');
                               }
                               return 1;							   
							 }							 
			                 break;
							 
			  case 'MEDIUM' ://resize medium, small and save at once
                             if (!empty($autoresize)) {							 
                               $image = new SimpleImage();
                               $image->load($s);
							   
							   if ($dim_medium = $autoresize[1]) {
                                 $image->resizeToWidth($dim_medium);
                                 $image->save($img_medium . $f);
								 //auto add to db
								 $this->add_photo2db($file,$restype,'MEDIUM');
							   }							   
							   if ($dim_small = $autoresize[0]) {
                                 $image->resizeToWidth($dim_small);
                                 $image->save($img_small . $myfilename);
								 //auto add to db
								 $this->add_photo2db($file,$restype,'SMALL');
                               }
                               return 1;							   
							 }
			                 break;
							 
			  case 'LARGE' : //resize large, medium and small and save at once	
                             if (!empty($autoresize)) {							 
                               $image = new SimpleImage();
                               $image->load($s);
							   
							   if ($dim_large = $autoresize[2]) {
                                 $image->resizeToWidth($dim_large);
                                 $image->save($img_large . $f);	
								 //auto add to db
								 $this->add_photo2db($file,$restype,'LARGE');
							   }								   
							   if ($dim_medium = $autoresize[1]) {
                                 $image->resizeToWidth($dim_medium);
                                 $image->save($img_medium . $f);	
								 //auto add to db
								 $this->add_photo2db($file,$restype,'MEDIUM');
							   }
							   if ($dim_small = $autoresize[0]) {
                                 $image->resizeToWidth($dim_small);
                                 $image->save($img_small . $f);	
								 //auto add to db
								 $this->add_photo2db($file,$restype,'SMALL');
							   }
                               return 1; 							   
							 }
			                 break;
							 							 							 
			  default      : //DEFAULT 1 sized photo
                             $path = $uphotoid ? 
							         $this->urlpath . remote_paramload('RCITEMS','adrespath',$this->prpath) : 
									 $this->urlpath . remote_paramload('RCITEMS','respath',$this->prpath);
							         
							 //resize large autoresize
                             if (!empty($autoresize)) {							 
                               $image = new SimpleImage();
                               $image->load($s);
							   						   
							   if ($dim_large = $autoresize[2]) {
                                 $image->resizeToWidth($dim_large);
                                 $image->save($path . $f);	
								 //auto add to db
								 $this->add_photo2db($file,$restype,'');
                               }
                               return 1;							   
							 }
                             else
								move_uploaded_file($s, $path . $f);
		}
    }	
	
	protected function encode_image_id($id=null) {
	    if (!$id) return null;
		$encodeimageid = remote_paramload('RCITEMS','encodeimageid',$this->prpath);	  				

		if ($this->encodeimageid) 
			$out = md5($id);
		else
		    $out = $id;
			
        return $out;
	}	
	
	//handle dropzone js form for pic uploading
	protected function dropzone($accepted_filetypes=null) {
	    $title = $_GET['title'] ? str_replace(' ','-',$_GET['title']) : 'title'; //posted item code
		$ds = DIRECTORY_SEPARATOR;  
		//$storeFolder = 'uploads'; 

		$restype = remote_paramload('RCITEMS','restype',$this->prpath);//'.jpg'; 				  		
        $phototype = remote_paramload('RCITEMS','phototype',$this->path);

		$mixphoto = remote_paramload('RCITEMS','mixphoto',$this->prpath);	 
		$photoquality = remote_paramload('RCITEMS','photoquality',$this->prpath);
	  
		$mixx = remote_paramload('RCITEMS','mixx',$this->prpath);	 
		$mixy = remote_paramload('RCITEMS','mixy',$this->prpath);	 	  
		$mixx = $mixx ? $mixx : 'CENTER';	 
		$mixy = $mixy ? $mixy : 'MIDDLE';		
		
		$rp = remote_paramload('RCITEMS','respath',$this->prpath);		
		$rrp = $rp ? $rp : '/images/thub/';
		$thubpath = $this->urlpath . $rrp;	  
		$rp2 = remote_paramload('RCITEMS','adrespath',$this->prpath);
		$rrp2 = $rp2 ? $rp2 : '/images/uphotos/';
		$uphotos = $this->urlpath . $rrp2;
		
 		$photo_sm = remote_paramload('RCITEMS','photosmpath',$this->prpath);		  
		$img_small = $photo_sm ? $this->urlpath ."/images/$photo_sm/" : $thubpath;	  
		
		if (!empty($_FILES)) {
     
			$tempFile = $_FILES['file']['tmp_name'];               
			//$targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  
			//$targetFile =  $targetPath. $_FILES['file']['name'];  
			$f = $_FILES['file']['name'];//$title . $restype;
			$targetFile =  $thubpath . $f;	
            //move_uploaded_file($tempFile,$targetFile); 
			//die();
			$targetName = $this->encode_image_id($title);			
			
            $targetMainPath = $phototype ? $img_small : $thubpath; 			
			$targetSecPath = $uphotos;
			$targetMainFile = $targetMainPath . $targetName; 
			$targetSecFile = $targetSecPath . $targetName; 
			
			if (is_readable($targetMainFile.$restype)) { //look if pic exist
			    //save at uphotos a,b,c..
				for ($iz='A';$iz<'Z';$iz++) {
					if (!is_readable($targetSecFile.$iz.$restype))
						break;
				}
				$targetName .= $iz; //'A';
				$this->create_thumbnail($tempFile, $targetName, null, $iz);
			}
			else {
			    //save at main path
				switch ($phototype) {
					case 1  : $this->create_thumbnail($tempFile, $targetName, 'SMALL'); break;
					case 2  : $this->create_thumbnail($tempFile, $targetName, 'MEDIUM'); break;
					default : $this->create_thumbnail($tempFile, $targetName, 'LARGE');
				}
			}
		}
		//file_put_contents($this->prpath.'dropzone.txt' ,$targetName);
		die();
	}
	
	protected function gallery($title=null) {
	    $_id = $title ? $title : GetReq('id'); 
		$name = $this->encode_image_id($_id);
		$ret = null;
		$id = 0;

		$xlink = 'cpmhtmleditor.php?t=cpmvdel&id='; 
		$restype = remote_paramload('RCITEMS','restype',$this->prpath);//'.jpg'; 				  		
	
		$photo_bg = remote_paramload('RCITEMS','photobgpath',$this->prpath);		  
		$img = "/images/$photo_bg/" . $name . $restype;
		$img_large = $photo_bg ? $this->urlpath . $img : null;	

        if ($this->photodb) {
			$add2db_url = seturl('t=cpmvphotoadddb&size=LARGE&id='.$name);
			$add2db_button = '<div class="mega-link mega-red"><a href="'.$add2db_url.'"><div class="mega-link mega-red"></div></a></div>';
			$del2db_url = seturl('t=cpmvphotodeldb&size=LARGE&id='.$name);
			$del2db_button = '<div class="mega-link mega-red"><a href="'.$del2db_url.'"><div class="mega-link mega-red"></div></a></div>';			
		}
		
		if (($img_large) && is_readable($img_large)) {
		    $id += 1;
			$ret = '<div class="mega-entry cat-large cat-all" id="mega-entry-'.$id.'" data-src="'.$img.'" data-lowsize="">
                        <div class="mega-covercaption mega-square-bottom mega-landscape-right mega-portrait-bottom mega-red">
                            <!-- The Content Part with Hidden Overflow Container -->
                            <div class="mega-title"><img src="img/gallery/icons/grid.png" alt="" style="float: left; padding-right: 15px;"/>'.$name.'</div>
                            <div class="mega-date">Lorem ipsun dolor</div>
                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...<br/><br/><a href="#">Read the whole story</a></p>
                        </div>
                        <!-- The Link Buttons -->
                        <div class="mega-coverbuttons">
							'.$add2db_button . $del2db_button.'
                            <div class="mega-link mega-red"><a href="'.$xlink.$name.'&type=LARGE"><div class="mega-link mega-red"></div></a></div>
                            <a class="fancybox" rel="group" href="'.$img.'" title="'.$name.'"><div class="mega-view mega-red"></div></a>
                        </div>
                    </div>';
		}
		
		$photo_md = remote_paramload('RCITEMS','photomdpath',$this->prpath);		  
		$img = "/images/$photo_md/" . $name . $restype;
		$img_medium = $photo_md ? $this->urlpath . $img : null;
		
        if ($this->photodb) {
			$add2db_url = seturl('t=cpmvphotoadddb&size=MEDIUM&id='.$name);
			$add2db_button = '<div class="mega-link mega-red"><a href="'.$add2db_url.'"><div class="mega-link mega-red"></div></a></div>';
			$del2db_url = seturl('t=cpmvphotodeldb&size=MEDIUM&id='.$name);
			$del2db_button = '<div class="mega-link mega-red"><a href="'.$del2db_url.'"><div class="mega-link mega-red"></div></a></div>';			
		}		
		
		if (($img_medium) && is_readable($img_medium)) {
		    $id += 1;
			$ret .= '<div class="mega-entry cat-medium cat-all" id="mega-entry-'.$id.'" data-src="'.$img.'" data-lowsize="">
                        <div class="mega-covercaption mega-square-bottom mega-landscape-right mega-portrait-bottom mega-red">
                            <!-- The Content Part with Hidden Overflow Container -->
                            <div class="mega-title"><img src="img/gallery/icons/grid.png" alt="" style="float: left; padding-right: 15px;"/>'.$name.'</div>
                            <div class="mega-date">Lorem ipsun dolor</div>
                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...<br/><br/><a href="#">Read the whole story</a></p>
                        </div>
                        <!-- The Link Buttons -->
                        <div class="mega-coverbuttons">
							'.$add2db_button . $del2db_button.'
                            <div class="mega-link mega-red"><a href="'.$xlink.$name.'&type=MEDIUM"><div class="mega-link mega-red"></div></a></div>
                            <a class="fancybox" rel="group" href="'.$img.'" title="'.$name.'"><div class="mega-view mega-red"></div></a>
                        </div>
                    </div>';		
		}
		
 		$photo_sm = remote_paramload('RCITEMS','photosmpath',$this->prpath);		  
		$img = "/images/$photo_sm/" . $name . $restype;
		$img_small = $photo_sm ? $this->urlpath . $img : null;
		
        if ($this->photodb) {
			$add2db_url = seturl('t=cpmvphotoadddb&size=SMALL&id='.$name);
			$add2db_button = '<div class="mega-link mega-red"><a href="'.$add2db_url.'"><div class="mega-link mega-red"></div></a></div>';
			$del2db_url = seturl('t=cpmvphotodeldb&size=SMALL&id='.$name);
			$del2db_button = '<div class="mega-link mega-red"><a href="'.$del2db_url.'"><div class="mega-link mega-red"></div></a></div>';			
		}		
		
		if (($img_small) && is_readable($img_small)) {
		    $id += 1;
			$ret .= '<div class="mega-entry cat-small cat-all" id="mega-entry-'.$id.'" data-src="'.$img.'" data-lowsize="">
                        <div class="mega-covercaption mega-square-bottom mega-landscape-right mega-portrait-bottom mega-red">
                            <!-- The Content Part with Hidden Overflow Container -->
                            <div class="mega-title"><img src="img/gallery/icons/grid.png" alt="" style="float: left; padding-right: 15px;"/>'.$name.'</div>
                            <div class="mega-date">Lorem ipsun dolor</div>
                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...<br/><br/><a href="#">Read the whole story</a></p>
                        </div>
                        <!-- The Link Buttons -->
                        <div class="mega-coverbuttons">
							'.$add2db_button . $del2db_button.'
                            <div class="mega-link mega-red"><a href="'.$xlink.$name.'&type=SMALL"><div class="mega-link mega-red"></div></a></div>
                            <a class="fancybox" rel="group" href="'.$img.'" title="'.$name.'"><div class="mega-view mega-red"></div></a>
                        </div>
                    </div>';		
		}
	
		$rp = remote_paramload('RCITEMS','respath',$this->prpath);		
		$rrp = $rp ? $rp : '/images/thub/';
		$img = $rrp . $name . $restype;
		$img_thub = $this->urlpath . $img;	

        if ($this->photodb) {
			$add2db_url = seturl('t=cpmvphotoadddb&size=&id='.$name);
			$add2db_button = '<div class="mega-link mega-red"><a href="'.$add2db_url.'"><div class="mega-link mega-red"></div></a></div>';
			$del2db_url = seturl('t=cpmvphotodeldb&size=&id='.$name);
			$del2db_button = '<div class="mega-link mega-red"><a href="'.$del2db_url.'"><div class="mega-link mega-red"></div></a></div>';			
		}	
		
		if (($img_thub) && is_readable($img_thub)) {
		    $id += 1;
			$ret .= '<div class="mega-entry cat-thumb cat-all" id="mega-entry-'.$id.'" data-src="'.$img.'" data-lowsize="">
                        <div class="mega-covercaption mega-square-bottom mega-landscape-right mega-portrait-bottom mega-red">
                            <!-- The Content Part with Hidden Overflow Container -->
                            <div class="mega-title"><img src="img/gallery/icons/grid.png" alt="" style="float: left; padding-right: 15px;"/>'.$name.'</div>
                            <div class="mega-date">Lorem ipsun dolor</div>
                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...<br/><br/><a href="#">Read the whole story</a></p>
                        </div>
                        <!-- The Link Buttons -->
                        <div class="mega-coverbuttons">
							'.$add2db_button.$del2db_button.'
                            <div class="mega-link mega-red"><a href="'.$xlink.$name.'&type=THUMB"><div class="mega-link mega-red"></div></a></div>
                            <a class="fancybox" rel="group" href="'.$img.'" title="'.$name.'"><div class="mega-view mega-red"></div></a>
                        </div>
                    </div>';		
		}
		
		$rp2 = remote_paramload('RCITEMS','adrespath',$this->prpath);
		$rrp2 = $rp2 ? $rp2 : '/images/uphotos/';
		for ($i='A';$i<'Z';$i++) {
		    $img = $rrp2 . $name . $i . $restype;
			$img_uphoto = $this->urlpath . $img;
			if (($img_uphoto) && is_readable($img_uphoto)) {
				$id += 1;
				$ret .= '<div class="mega-entry cat-uphotos cat-all" id="mega-entry-'.$id.'" data-src="'.$img.'" data-lowsize="">
                        <div class="mega-covercaption mega-square-bottom mega-landscape-right mega-portrait-bottom mega-red">
                            <!-- The Content Part with Hidden Overflow Container -->
                            <div class="mega-title"><img src="img/gallery/icons/grid.png" alt="" style="float: left; padding-right: 15px;"/>'.$name.'</div>
                            <div class="mega-date">Lorem ipsun dolor</div>
                            <p>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua...<br/><br/><a href="#">Read the whole story</a></p>
                        </div>
                        <!-- The Link Buttons -->
                        <div class="mega-coverbuttons">
                            <div class="mega-link mega-red"><a href="'.$xlink.$name.'&type=UPHOTO&uid='.$i.'"><div class="mega-link mega-red"></div></a></div>
                            <a class="fancybox" rel="group" href="'.$img.'" title="'.$name.'"><div class="mega-view mega-red"></div></a>
                        </div>
						</div>';			
			}
		}
		
		return ($ret);
	}
	
	function delete_photo($title=null) {
		$db = GetGlobal('db');
		$type = GetReq('type');  
		$id = $title ? $title : GetReq('id');
		$uid = null;
		
		$restype = remote_paramload('RCITEMS','restype',$this->prpath);//'.jpg'; 				  		
		  
		//3 sized scaled images
		$photo_bg = remote_paramload('RCITEMS','photobgpath',$this->prpath);		  
		$img_large = $photo_bg ? $this->urlpath ."/images/$photo_bg/" : $thubpath;	  	  
		$photo_md = remote_paramload('RCITEMS','photomdpath',$this->prpath);		  
		$img_medium = $photo_md ? $this->urlpath ."/images/$photo_md/" : $thubpath;	  	  
		$photo_sm = remote_paramload('RCITEMS','photosmpath',$this->prpath);		  
		$img_small = $photo_sm ? $this->urlpath ."/images/$photo_sm/" : $thubpath;	  
			  
		$rp = remote_paramload('RCITEMS','respath',$this->prpath);		
		$rrp = $rp ? $this->urlpath . $rp : $this->urlpath . '/images/thub/';
		$rp2 = remote_paramload('RCITEMS','adrespath',$this->prpath);
		$rrp2 = $rp2 ? $this->urlpath . $rp2 : $this->urlpath . '/images/uphotos/';
		
		switch ($type) {
		    case 'SMALL' : $w = $img_small; break;
			case 'MEDIUM': $w = $img_medium; break;
			case 'LARGE' : $w = $img_large; break;
			case 'THUMB' : $w = $rrp; break;
			case 'UPHOTO': $w = $rrp2; 
			               $uid = GetReq('uid');
			               break;
		    default      : $w = $rrp;
		}

        $pic_file = $w . $id . $uid . $restype;
		
		if (file_exists($pic_file)) {
		  unlink($pic_file);
		  return true;
		}  
		return false;
    }
	
	protected function delete_photodb($size=null) {
		$db = GetGlobal('db');
		$sizetype = $size ? $size : null;   
		$id = GetReq('id');
		

        $sSQL = "delete from pphotos ";
	    $sSQL .= " WHERE code='" . $id . "'";
	    if (isset($sizetype))
	      $sSQL .= " and stype='" . $sizetype . "'";
        else //is null
		  $sSQL .= " and stype=''";
		
        //echo $sSQL; 
	    $resultset = $db->Execute($sSQL);		
		return true;
	}

	protected function add_photo2db($itmcode,$type=null,$size=null) {
	  $itmcode = $itmcode ? $itmcode : GetReq('id');
      $db = GetGlobal('db');	
	  $type = $type ? $type : $this->restype;	  
      $myfilename = $itmcode . $this->restype;	

	  if (!$this->photodb) return;
	  
		//3 sized scaled images
		$photo_bg = remote_paramload('RCITEMS','photobgpath',$this->prpath);		  
		$img_large = $photo_bg ? $this->urlpath ."/images/$photo_bg/" : $thubpath;	  	  
		$photo_md = remote_paramload('RCITEMS','photomdpath',$this->prpath);		  
		$img_medium = $photo_md ? $this->urlpath ."/images/$photo_md/" : $thubpath;	  	  
		$photo_sm = remote_paramload('RCITEMS','photosmpath',$this->prpath);		  
		$img_small = $photo_sm ? $this->urlpath ."/images/$photo_sm/" : $thubpath;

		//DEFAULT 1 sized photo
        $path = $uphotoid ? remote_paramload('RCITEMS','adrespath',$this->prpath) : 
							remote_paramload('RCITEMS','respath',$this->prpath);		
	  
	  switch ($size) {
	    case "LARGE" :  $photo = $img_large . $myfilename; break;
	    case "MEDIUM":  $photo = $img_medium . $myfilename; break;
        case "SMALL" :  $photo = $img_small . $myfilename; break;
        default      :  $photo = $path . $myfilename;
                        $size = 'LARGE';		
	  }  

	  //echo $photo;	 
	  if (is_readable($photo)) {   
		$sSQL = "select code from pphotos ";
		$sSQL .= " WHERE code='" . $itmcode . "' and type='". $type . "' and stype='". $size ."'";
		//echo $sSQL;
	  
		$resultset = $db->Execute($sSQL,2);	
		$result = $resultset;
		$exist = $db->Affected_Rows();
	  
		$data = base64_encode(file_get_contents($photo));
	  
	    //65535 chars limit...
		//else keep the file version in images dir...
		if (strlen($data)<65535) {//cuted pic when max that 65535 (text field max width)
	  
			if ($exist) {
				$sSQL = "update pphotos set data='". $data ."'";
				$sSQL .= " WHERE code='" . $itmcode . "' and type='" . $type ."'";
				if (isset($size))
					$sSQL .= " and stype='" . $size . "'";		  		  
			}
			else 
				$sSQL = "insert into pphotos (data,type,code,stype) values ('". $data ."','" . $type ."','" . $itmcode ."','".$size."')";  	  
	
			//echo $sSQL;	
	  
			$db->Execute($sSQL,1);	
			$affected = $db->Affected_Rows();
	  
			if (($affected) && ($this->erase2db))
				unlink($photo); //<<<<<<<<<< !!!! DELETE	
			
		}//limit
		//else
		  // echo '65535 limit!';
	  }//is readable	
	  return ($affected);  	  
	}

	protected function show_photodb($itmcode=null, $stype=null, $type=null) {
      $db = GetGlobal('db');
	  if (!$itmcode) return;
	  $type = $type?$type:$this->restype;
	  	  
      $sSQL = "select data,type,code from pphotos ";
	  $sSQL .= " WHERE code='" . $itmcode . "'";
	  if (isset($type))
	    $sSQL .= " and type='". $type ."'";
	  if (isset($stype))
	    $sSQL .= " and stype='". $stype ."'";		

	  
	  $resultset = $db->Execute($sSQL,2);	
	  $result = $resultset;	  
	  
	  $mime_type = 'image/'.str_replace('.','',$result->fields['type']);
	  //$mime_type = 'image/jpeg';
	  echo $mime_type;
	  //header('Content-type: ' . $mime_type);

	  if ($result->fields['code']) //photo exists
        echo base64_decode($result->fields['data']);
	  else {//additional photo or standart nopic
	    echo null;
      }  
	  
	  die();
	}

	protected function photo2db($notexisted=null) {
      $db = GetGlobal('db');	
	  $i=0;

	  $code = $this->getmapf('code'); 
      $sSQL = "select id,".$code." from products where ";
	  
	  if ($id = GetReq('id')) 
	    $sSQL .= $code . "='" . $id . "' and ";	
	  elseif ($cat = GetReq('cat')) {
	    $cat_tree = explode($this->cseparator,$this->replace_spchars($cat,1));
		
		foreach ($cat_tree as $c=>$cc)
	      $whereClause[] = "cat$c=" . $db->qstr(rawurldecode($this->replace_spchars($cc,1)));	
		  
		$sSQL .= implode(' and ', $whereClause) . ' and ';	  	
	  }	
	  $sSQL .= " itmactive>0 and active>0";	
	  
	  if ($notexisted)
		$sSQL .= " and ". $code . " NOT IN (select code from pphotos)";		  
	  //echo $sSQL;
	  
	  $resultset = $db->Execute($sSQL,2);	
	  $result = $resultset;
	  //print_r($result);	
	  $max_items = $db->Affected_Rows();
	  //echo $max_items;  
	  $this->msg = 'Total items:'. $max_items . '<br>';
	  
	  if (!empty($result)) {		  
	    //echo $i,'>';
	    foreach ($result as $n=>$rec) {
		  //echo $this->attachpath,$rec[$code],'<br>';
		  if ($this->img_large) {//large,medium,small photos	
			
		    $i+= $this->add_photo2db($rec[$code],$this->restype,'SMALL');

		    $i+= $this->add_photo2db($rec[$code],$this->restype,'MEDIUM');

		    $i+= $this->add_photo2db($rec[$code],$this->restype,'LARGE');
          }
          else //one photo
		    $i+= $this->add_photo2db($rec[$code],$this->restype);
		}
	  } 
	  $this->msg .=  $i . ' photos added to dababase.';
	  
	  if (GetReq('editmode')) {
	    die($this->msg);
	  }
	}

	protected function has_photo2db($itmcode=null,$type=null,$stype=null) {
      $db = GetGlobal('db');	
  
      $sSQL = "select code from pphotos ";
	  $sSQL .= " WHERE code='" . $itmcode . "'";
	  if (isset($type))
	    $sSQL .= " and type='". $type ."'";
	  if (isset($stype))
	    $sSQL .= " and stype='". $stype ."'";		

	  //echo $sSQL;
	  $resultset = $db->Execute($sSQL,2);	
	  $result = $resultset;
	  //print_r($result);	
	  
	  $exist = $db->Affected_Rows();
    
	  if ($result->fields[0])//($exits) 
	    return true;
	  
	  return false;
	}	

	protected function ckeditor($mydata=null,$isTemplate=false) {
		$ckattr = $this->ckeditor4 ?
	           "fullpage : true, 
               filebrowserBrowseUrl : '/cp/ckfinder/ckfinder.html',
	           filebrowserImageBrowseUrl : '/cp/ckfinder/ckfinder.html?type=Images',
	           filebrowserFlashBrowseUrl : '/cp/ckfinder/ckfinder.html?type=Flash',
	           filebrowserUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	           filebrowserImageUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	           filebrowserFlashUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	           filebrowserWindowWidth : '1000',
 	           filebrowserWindowHeight : '700'"	  
	           : 
	           "skin : 'v2', 
			   fullpage : true, 
			   extraPlugins :'docprops',
               filebrowserBrowseUrl : '/cp/ckfinder/ckfinder.html',
	           filebrowserImageBrowseUrl : '/cp/ckfinder/ckfinder.html?type=Images',
	           filebrowserFlashBrowseUrl : '/cp/ckfinder/ckfinder.html?type=Flash',
	           filebrowserUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	           filebrowserImageUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	           filebrowserFlashUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	           filebrowserWindowWidth : '1000',
 	           filebrowserWindowHeight : '700'";
	 
		$out .= '<div>'; 
		$out .= "<textarea id='htmltext' name='htmltext'>".$this->load_spath($mydata)."</textarea>";	
		$out .= "<script type='text/javascript'> 
	           CKEDITOR.replace('htmltext',
			   {
               $ckattr		   
			   }		   
			   );";	 
        /*
		if ($isTemplate==false)	
			$out .= "			   
	           CKEDITOR.config.fullPage=true;";				   
		*/
		$maximize = 'minimize';	
		$out .= "		   
               CKEDITOR.config.entities = false;
               CKEDITOR.config.entities_greek = false;
               CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;			   
               CKEDITOR.on('instanceReady',
               function( evt )
               {
                  var editor = evt.editor;
                  editor.execCommand('$maximize');
               });
			   </script>"; 
		$out .= '</div>';

		return ($out);	
	}

	protected function replace_spchars($string, $reverse=false) {
	
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
	
};
}
?>