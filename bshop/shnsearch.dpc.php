<?php

$__DPCSEC['SHNSEARCH_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ( (!defined("SHNSEARCH_DPC")) && (seclevel('SHNSEARCH_DPC',decode(GetSessionParam('UserSecID')))) ) {

define("SHNSEARCH_DPC",true);

$__DPC['SHNSEARCH_DPC'] = 'shnsearch';

$d = GetGlobal('controller')->require_dpc('shop/shsearch.dpc.php');
require_once($d);

GetGlobal('controller')->get_parent('SHSEARCH_DPC','SHNSEARCH_DPC');

$__EVENTS['SHNSEARCH_DPC'][4]='shnsearch';
$__EVENTS['SHNSEARCH_DPC'][5]='filter';

$__ACTIONS['SHNSEARCH_DPC'][4]='shnsearch';
$__ACTIONS['SHNSEARCH_DPC'][5]='filter';

$__LOCALE['SHNSEARCH_DPC'][0]='SHNSEARCH_DPC;Search;Αναζήτηση';
$__LOCALE['SHNSEARCH_DPC'][1]='_SEARCHIN;Search In:;Αναζήτηση σε:';
$__LOCALE['SHNSEARCH_DPC'][2]='_founded;items found;εγγραφές βρέθηκαν';
$__LOCALE['SHNSEARCH_DPC'][3]='_FILTERS;Product filters;Φίλτρο αναζήτησης';
$__LOCALE['SHNSEARCH_DPC'][4]='_BRANDS;Brands;Μάρκες';
$__LOCALE['SHNSEARCH_DPC'][5]='_ALL;All;Όλα';

class shnsearch extends shsearch {

    var $_combo, $text2find;
	var $path, $imageclick;
	var $textsearch, $searchpath, $searchfiletypes;
	var $attachsearch;
	
    var $tmpl_path, $tmpl_name;	
	var $cseparator, $replacepolicy;

	public function __construct() {

		shsearch::shsearch();

		$this->title = localize('SHNSEARCH_DPC',getlocal());
		$this->path = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');
		$this->inpath = paramload('ID','hostinpath');			  
		$this->imageclick = remote_paramload('SHNSEARCH','imageclick',$this->path);	

		$this->textsearch = remote_paramload('SHNSEARCH','textsearch',$this->path);	  
		$this->searchpath = remote_paramload('SHNSEARCH','searchpath',$this->path);	
		$this->attachsearch = remote_paramload('SHNSEARCH','attachsearch',$this->path);		  
		$ft = remote_arrayload('SHNSEARCH','filetypes',$this->path);	
		$fp = array('.htm','.txt');//htm includes html
		$this->searchfiletypes = $ft?$ft:$fp; 
	  
		$this->replacepolicy = remote_paramload('SHKATEGORIES','replacechar',$this->path);
		$csep = remote_paramload('SHKATEGORIES','csep',$this->path); 
		$this->cseparator = $csep ? $csep : '^';

		$this->tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->path);
		$this->tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->path); 	  
	}

	public function event($event=null) {

		$this->text2find = GetParam('Input') ? GetParam('Input') : GetReq('input'); 

		switch ($event) {
		  
			case 'filter'         :     $this->do_filter_search($this->text2find, GetReq('cat')); //getreq input
										break;		

			//cart
			case 'searchtopic'   :
			case 'addtocart'     :
			case 'removefromcart':		break;
			// 	  
	  
			case 'search' 		 :	  
			default 			 : 		$this->search_javascript();
		
										if ($this->text2find)//always here
											$this->do_quick_search($this->text2find,GetReq('cat'));
										else
											$this->do_search();//not used??.....
		} 
	}


	public function action($action=null) {
	
		switch ($action) {
		  
			case 'filter'         : $out = $this->form_search();
									break;			  
	  
			//cart
			case 'searchtopic'   :
			case 'addtocart'     :
			case 'removefromcart':	break;	
			// 	  
	  
			case 'search' 		:		
			default       		: 	$out = $this->form_search();
		}	
	  
		return ($out);
	}
	
	protected function search_javascript() {
		
		if (iniload('JAVASCRIPT')) {	
			$code2 = $this->js_make_search_url();	
			$js = new jscript;	
			$js->load_js($code2,"",1);			   
			unset ($js);
		}			   	   	     
	}

	public function show_combo($title=null,$preselcat=null,$isleaf=null) {

        $ret = _m('shkategories.show_combo_results use '.$title.'+'.$preselcat.'+'.$isleaf);
		return ($ret);
	}		
	
	//override
	public function do_quick_search($text2find,$comboselection=null) {
	
		_m('shkatalogmedia.do_quick_search use '.$text2find.'+'.$comboselection);
			  
	}
	
	public function do_filter_search($filter,$cat=null) {
	
		 _m('shkatalogmedia.do_filter_search use '.$filter.'+'.$cat);
	}	
	
	//override
	public function search_categories($text2find=null,$template=null) {
		
        $ret = _m('shkategories.search_tree use ' . $text2find ."+klist+".$template);//klist or seach in cat,= +search
			  
		return ($ret);	  
	}		
	
	//override
	public function list_catalog($imageclick=null,$cmd=null,$template=null) {
	
		$ret = _m('shkatalogmedia.list_katalog use '.$imageclick.'+'.$cmd.'+'.$template.'++1');

		return ($ret);	  
	}		
	
	//override
    public function form ($entry="",$cmd=null,$message=null)  {
		$entry = GetParam('input');
		$this->scase = GetParam('searchcase') ? true : false;
		$this->stype = GetParam('searchtype') ? GetParam('searchtype') : null;
	  
		$mycmd = $cmd?$cmd:'search';
		$filename = _m("cmsrt.seturl use t=$mycmd+++1"); //seturl("t=$mycmd");//&a=$a&g=$g");  
		$lan = getlocal()?getlocal():'0';
	  
		//template form
		$contents = _m('cmsrt.select_template use searchform');	   

	    $tokens[] = $this->stime . $message;
	    $tokens[] = "<FORM name='searchform' action=". $filename . " method=POST>" . //post 
		            "<INPUT type=\"text\" name=\"input\" value=\"$entry\" size=25 class=\"myf_input\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255); \">"; 
						
        if ($this->stype) {
			switch ($this->stype) {
				case $this->anyterms   : $tokens[] = "<SELECT name=searchtype class=\"myf_select\"> <OPTION selected>$this->anyterms<OPTION>$this->allterms<OPTION>$this->asphrase</OPTION></SELECT>"; break;
				case $this->allterms   : $tokens[] = "<SELECT name=searchtype class=\"myf_select\"> <OPTION>$this->anyterms<OPTION selected>$this->allterms<OPTION>$this->asphrase</OPTION></SELECT>";break;
				case $this->asphrase   : 
				default                : $tokens[] = "<SELECT name=searchtype class=\"myf_select\"> <OPTION>$this->anyterms<OPTION>$this->allterms<OPTION selected>$this->asphrase</OPTION></SELECT>";break;
			}
	    }
	    else 
			$tokens[] = "<SELECT name=searchtype class=\"myf_select\"> <OPTION selected>$this->anyterms<OPTION>$this->allterms<OPTION>$this->asphrase</OPTION></SELECT>";					
 
		   
        $check = $this->scase ? "checked" : "";
        $tokens[] = "<input type=\"hidden\" name=\"searchcase\" value=\"$check \"". $check . " class=\"myf_input\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255); \">";		   
		$tokens[] = "<input type=\"submit\" name=\"Submit\" class=\"myf_button\" value=\"$this->t_searchtitle\">" .
                    "<input type=\"hidden\" name=\"FormAction\" value=\"$mycmd\">" .
                    "</FORM>";		
		
		//search in cat form			
        $tokens[] = $this->searchin();							
	      
		$tokout = $this->combine_tokens($contents, $tokens);
		return ($tokout);    
    }
	
	//override
	public function form_search() {
		$typos = trim(GetParam('typos'));	
		$extras = trim(GetParam('extras'));
		$price = trim(GetParam('price'));
		$price2 = trim(GetParam('price2'));	   
		$this->msg = null;
	   
		$myimageclick = $this->imageclick ? $this->imageclick : null;		
		 	   
		$out = $this->form(null,'search',$msg);
	   
		//KATEGORIES SEARCH
		$out .= $this->search_categories($this->text2find,'searchcatres.htm');
		$out .= $this->list_catalog($myimageclick,'search&input='.$this->text2find,'searchres.htm');
	  
	    $f1 = _v('shkatalogmedia.max_selection');	    
	    $f2 = _v('shkategories.max_selection');	   	
		$f = $f1+$f2;	  
		
		return ($out);	
	}	
	
	protected function js_make_search_url() {
		$out = "
function get_sinput()
{
  var ret = document.searchform.input.value;
  return ret;
}
function get_scase()
{
  var ret = document.searchform.searchcase.value;
  return ret;
}
function get_stype()
{
  var ret = document.searchform.searchtype.value;
  return ret;
}
";

		return ($out);	
	}
	
	//override
	public function searchin($staticmenu=0) {
	
        $ret = _m('shkategories.show_combo_results use '.$title.'+'.$preselcat.'+'.$isleaf.'+search');
		
		return ($ret);
	}	
	
	//fieldstosearchin = array of db field names..(csv)
    public function findsql($terms,$fields2searchin,$appendsql=null,$stype=null,$scase=null) {
		$st = $stype?$stype:$this->stype;
		$sc = $scase?$scase:$this->scase;
		$extra_sql = null;

		if ($appendsql)//and /or
			$ret = ' ' . $appendsql . ' ';	
		 
		$fields = explode ("<@>", $fields2searchin); 		 
		 
		if (!empty($fields)) {	
	  
			$extra_codes = (array) $this->search_additional_files($terms);
			$extra2_codes = (array) $this->search_attachments($terms);
		   
			if ((!empty($extra_codes)) || (!empty($extra2_codes)))
				$extra_codes = array_merge($extra_codes,$extra2_codes);   
			//echo count($extra_codes),"<br>";		   
		   
			if (!empty($extra_codes)) {
				foreach ($extra_codes as $i=>$c) 
					$codesql[] = ' code3="'.$c.'"';
		   
				$extra_sql = ' or (';
				$extra_sql .= implode (' or ',$codesql); 
				$extra_sql .= ') ';
			}
   
		  
			switch ($st) {

				case $this->allterms : // AND
										$ret .= $this->mysql_AND($terms,$fields,$sc); 		
										break;
				case $this->asphrase : // AS IS
										$ret .= $this->mysql_ASIS($terms,$fields,$sc); 							
										break;																														  
				case $this->anyterms : // OR
				default              :		   
										$ret .= $this->mysql_OR($terms,$fields,$sc);
										break;								  
			}
		 
			if ($extra_sql) 
				$ret .= $extra_sql;
 	
			return ($ret);
		}//empty array

	    return null;	
	}
    
    ////////////////////////////////////////////////////////
    // this return true if all array of terms is in text
    ////////////////////////////////////////////////////////
    protected function mysql_AND($terms,$fields,$csence) {
	
		$words = explode (" ", $terms);	
		reset($fields);	  
	  
		foreach ($fields as $fid=>$fieldname) {
			reset($words);
			foreach ($words as $word_no => $word) {		
				if ($csence) 			  
					$data[$word_no] = $fieldname . " like '%" . $word . "%'"; 
				else
					$data[$word_no] = '(' . $fieldname . " like '%" . strtolower($word) . "%' OR " . $fieldname . " like '%" . strtoupper($word) . "%')"; 	
			}
		
			$data2[$fid] = '(' . implode(' AND ',$data) . ')';
		}
	  
		$ret = '(' . implode(' OR ',$data2) . ')';
	  
		return $ret;
    }

    ////////////////////////////////////////////////////////
    // this return true if one term of terms is in text
    ////////////////////////////////////////////////////////
    protected function mysql_OR($terms,$fields,$csence) {
	
		$words = explode (" ", $terms);	
		reset($words);  

		foreach ($words as $word_no => $word) {
			reset($fields);	  
			foreach ($fields as $fid=>$fieldname) {
				if ($csence) 		  
					$data[$fid] = $fieldname . " like '%" . $word . "%'";
				else	
					$data[$fid] = '(' . $fieldname . " like '%" . strtolower($word) . "%' OR " . $fieldname . " like '%" . strtoupper($word) . "%')";
			}
		
			$data2[$word_no] = '(' . implode(' OR ',$data) . ')';	
		}
  
		$ret = '(' . implode(' OR ',$data2) . ')';
   
		return ($ret);
    }

    ////////////////////////////////////////////////////////
    // this return true if one terms=text is in text as is
    ////////////////////////////////////////////////////////
    protected function mysql_ASIS($terms,$fields,$csence) {

		foreach ($fields as $fid=>$fieldname) {
		  
			if ($csence)  
				$data[] = $fieldname . " like '%" . $terms . "%'";
			else
				$data[] = '(' . $fieldname . " like '%" . strtolower($terms) . "%' OR " . $fieldname . " like '%" . strtoupper($terms) . "%')";
		  
		}	  
  
		$ret = '(' . implode(' OR ',$data) . ')';
    
		return $ret;
    }  
	
	
	protected function search_additional_files($terms=null) {
		$nullarray = array();	
	
		if (!$this->textsearch) return;
	
		if ($this->searchpath) {
			$myspath = $this->urlpath.$this->inpath.'/cp/'.$this->searchpath;

			if (is_dir($myspath)) {
	
				$mydir = dir($myspath);
		
				while ($fileread = $mydir->read ()) { 
          
					$first_letter = substr($fileread,0,1);

					if (is_numeric($first_letter)) { // only numbers
		   
						foreach ($this->searchfiletypes as $TEMPLATE_FILETYPE ) {
							if (stristr ($fileread,$TEMPLATE_FILETYPE)) {//get type of file
			    
								$content = file_get_contents($myspath .'/' . $fileread);
								if (stristr ($content,$terms)) {//get type of file
									//echo $fileread,"<br>";
									$np = explode('.',$fileread);
									$code = substr($np[0],0,-1); //extract language digit
									$ret[$code] = $code; //use key the code to not allow double codes
								} 
							}
						}
					}
				}
				$mydir->close ();

				if (empty($ret))
					return $nullarray;
		  
				return ($ret);	
			}  
		}

		return $nullarray; //no search
	}
	
	protected function search_attachments($terms=null) {
		$db = GetGlobal('db');	
		$lan = getlocal();
		$nullarray = array();
	
		if (!$this->attachsearch) return;
	  
		$sSQL = "select code from pattachments";	
		$sSQL .= " where lan=" . $lan . " and ( type LIKE '%";
		foreach ($this->searchfiletypes as $TEMPLATE_FILETYPE ) {
			$tf[] = $TEMPLATE_FILETYPE;
			//$sSQL .= " and type='" . $TEMPLATE_FILETYPE . "' ";
		}
		$sSQL .= implode("%' OR type LIKE '%", $tf);
		$sSQL .= "%') and data LIKE '%$terms%'";
		//echo $sSQL;	  
	  
		$result = $db->Execute($sSQL,2); 
	  
		if (empty($result))
			return $nullarray;
		
		foreach ($result as $n=>$rec)   
			$ret[$rec[0]] = $rec[0];

		return ($ret);	
	}	
	
	
	//FILTERS
	protected function filter($field=null, $template=null, $incategory=null, $cmd=null, $head=null) {	
		if (!$field) return;
	    $db = GetGlobal('db');		
        $filename = _m("cmsrt.seturl use t=$mycmd+++1"); 
	    $lan = getlocal()?getlocal():'0';
		$command = $cmd ? $cmd : 'search';
		$tokens = array(); 
		$r = array();		
	  
		$contents = _m("cmsrt.select_template use searchfilter");	
		
	    $sSQL = "SELECT DISTINCT ".$field.",count(id) from products WHERE ";			
        if ($incategory) {	
		    $cats = explode($this->cseparator, GetReq('cat'));
		    foreach ($cats as $c=>$mycat)
		      $s[] = 'cat'.$c ." ='" . $this->replace_spchars($mycat,1) . "'";		  	  
		}		

		$sSQL .= implode(" AND ", $s);
		$sSQL .= " and itmactive>0 and active>0";
		$sSQL .= " group by " . $field;  
	  
		$result = $db->Execute($sSQL,2); 
	  
		if (!empty($result)) {
			//print_r($result);
			foreach ($result as $n=>$t) {
				if (trim($t[0])!='') {
					$tokens[] = $t[0];
					$tokens[] = $t[1];
					$tokens[] = _m("cmsrt.url use t=$command&input=" . $t[0] . "cat=$cat" . GetReq('cat')); 
					$tokens[] = ($t[0]==GetReq('input')) ? 'checked="checked"' : null;
					$r[] = $template ? $this->combine_tokens($contents,$tokens) : $rec;	
					unset($tokens);		
                }				
			}	
		}
		
					
		//header
        if ($header) {		
			$tokens[] = localize('_ALL',getlocal());
			$tokens[] = '*';
			$tokens[] = _m("cmsrt.url use t=klist&cat=" . GetReq('cat'));
			$tokens[] = (!GetReq('input')) ? 'checked="checked"' : null;
			if ($template) $r[] = $this->combine_tokens($contents,$tokens);
			unset($tokens);
		}		
       
		$x = $template ? '' : '<br/>';
		$ret = (empty($r)) ? null : implode($x,$r);	
		return ($ret);   
	}
	
	//override / method	 $x$
	public function combine_tokens($template_contents,$tokens, $execafter=null) {
	
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
		//clean unused token marks
		for ($x=$i;$x<20;$x++)
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
		
	protected function replace_spchars($string, $reverse=false) {
		
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