<?php

$__DPCSEC['RCXMLFEEDS_DPC']='1;1;1;1;1;1;1;6;7;8;9';

if (!defined("RCXMLFEEDS_DPC")) {
define("RCXMLFEEDS_DPC",true);

$__DPC['RCXMLFEEDS_DPC'] = 'rcxmlfeeds';

$__EVENTS['RCXMLFEEDS_DPC'][0]='cpxmlfeeds';
$__EVENTS['RCXMLFEEDS_DPC'][1]='cpxmlcreate';

$__ACTIONS['RCXMLFEEDS_DPC'][0]='cpxmlfeeds';
$__ACTIONS['RCXMLFEEDS_DPC'][1]='cpxmlcreate';

$__LOCALE['RCXMLFEEDS_DPC'][0]='RCXMLFEEDS_DPC;XML feeds;XML feeds';
$__LOCALE['RCXMLFEEDS_DPC'][1]='_XMLFILE;XML file;XML file';
$__LOCALE['RCXMLFEEDS_DPC'][2]='_XMLITEMS;XML items;XML είδη';
$__LOCALE['RCXMLFEEDS_DPC'][3]='_dimensions;Dimension;Διαστάσεις';
$__LOCALE['RCXMLFEEDS_DPC'][4]='_size;Size;Μέγεθος';
$__LOCALE['RCXMLFEEDS_DPC'][5]='_dimensions;Dimensions;Διαστάσεις';
$__LOCALE['RCXMLFEEDS_DPC'][6]='_xmlcreate;Create XML;Δημιούργησε XML';
$__LOCALE['RCXMLFEEDS_DPC'][7]='_xml;XML item;Είδος XML';
$__LOCALE['RCXMLFEEDS_DPC'][8]='_manufacturer;Manufacturer;Κατασκευαστής';

class rcxmlfeeds {

    var $prpath, $title, $select_fields, $xmlindex, $cdate, $savepath;
	var $cseparator, $url, $imgpath, $map_t, $map_f, $restype;
	var $pricef, $pricevat, $decimal;

    function __construct() {
	  
	   $this->title = localize('RCXMLFEEDS_DPC',getlocal());	  
	  
	   $this->prpath = paramload('SHELL','prpath');
	   $this->urlpath = paramload('SHELL','urlpath');
	   
	   $this->xmlfiles = remote_arrayload('RCXMLFEEDS','files',$this->prpath); 
	   
	   $this->savepath = $this->urlpath . remote_paramload('RCXMLFEEDS','savepath',$this->prpath);
	   $this->imgpath = remote_paramload('RCXMLFEEDS','imgpath',$this->prpath);	   
	   
	   $this->select_fields = remote_arrayload('RCXMLFEEDS','selectfields',$this->prpath); 
       $this->xmlindex = remote_arrayload('RCXMLFEEDS','xmlindex',$this->prpath);	   	
	   
	   $this->cdate = date(DATE_RFC822);//'m-d-Y');
	   
       $csep = remote_paramload('RCXMLFEEDS','csep',$this->path); 
       $this->cseparator = $csep ? $csep : '^';	
	   
	   $this->pricef = remote_arrayload('RCXMLFEEDS','pricefields',$this->path); //not used
	   $this->pricevat = remote_arrayload('RCXMLFEEDS','pricevat',$this->path); //use inside templates <phpdac>rcxmlfeeds.pricewithtax use $8$+23</phpdac>
	   $this->decimal = remote_paramload('RCXMLFEEDS','decimal',$this->path);

       $murl = arrayload('SHELL','ip');
       $this->url = $murl[0]; 	 
	   $this->map_t = remote_arrayload('RCITEMS','maptitle',$this->path);	
	   $this->map_f = remote_arrayload('RCITEMS','mapfields',$this->path);
       $this->restype = remote_paramload('RCITEMS','restype',$this->path);	   
	}
	
    function event($event=null) {
	
	   /////////////////////////////////////////////////////////////
	   if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	
	   /////////////////////////////////////////////////////////////			

       if (!$this->msg) {
  
	     switch ($event) {
		 
		    case 'cpxmlcreate'  : $this->create_xml();
	                              break;
			default             :		
			                        						  
         }
      }
    }	

    function action($action=null)  { 


	     switch ($action) {
           case 'cpxmlcreate'  :
		   default             :
		                         $out .= $this->form();
		 }			 

	     return ($out);
	}	
	
	
	protected function create_xml() {
		//echo GetParam('xmlfeed'); 
		$f = explode('=', GetParam('xmlfeed'));
		$fl = array_pop($f);
		$file = $this->savepath .'/'. $fl . '.xml';
		
        //$ret = file_put_contents($file, '123', LOCK_EX);		
		$data = $this->create_data($fl);
		$ret = @file_put_contents($file, $data, LOCK_EX);
		
		return $ret;		
	}
	
	protected function load_xml_file() {
		if (GetParam('FormAction')) {
  		  $f = explode('=', GetParam('xmlfeed'));
		  $file = $this->savepath .'/'. array_pop($f) . '.xml';
		}
        else
          $file = $this->savepath .'/'. GetReq('xmlfeed') . '.xml';
	  
		return file_get_contents($file);
	}	
	
	
	protected function form() {
	
	    //if ($this->msg) $out = $this->msg;
	    /*
	    $commands = seturl("t=cpxmlfeeds&editmode=".GetReq('editmode'),"Reset Campaign") . '|'.  seturl("t=cpadvsubscribe&editmode=".GetReq('editmode'),"Subscribe");
	   
	    $myadd = new window('',$commands);
	    $out .= $myadd->render("center::100%::0::group_article_selected::right::0::0::");	   
	    unset ($myadd);  
	
	    */
        $out .= $this->xmlform(); 	   
	    $out .= $this->show_grids(1);  
	  
	    return ($out);		
	}	
	
    protected function xmlform()  { 	
	
	   if (GetParam('FormAction')) {
  		  $f = explode('=', GetParam('xmlfeed'));
		  $file = array_pop($f);
		}
        else
          $file = GetReq('xmlfeed');	   

       $opt = "<option value='#'>".localize('RCXMLFEEDS_DPC',getlocal())."</option>";	   
	   //$opt .= implode("</option><option>",$this->xmlfiles);
	   foreach ($this->xmlfiles as $i=>$v) {
		    $myvalue = str_replace('#',$i,seturl('t=cpxmlfeeds&xmlfeed='.$v)); 
			$opt .= "<option value=\"$myvalue\"".($v == $file ? " selected" : "").">$v</option>";		
	   }  
	   $opt .= "</option>";	
	
       $filename = seturl("t=cpxmlfeeds&editmode=".GetReq('editmode'));

	   /*$toprint = '<h2>'. localize('RCXMLFEEDS_DPC',getlocal());
       $toprint .= $file ? ' - ' . $file . '.xml' : '';		   
	   $toprint .=  '</h2>';*/
    
       $toprint .= "<FORM action=". "$filename" . " method=post>";
       $toprint .= "<P><FONT face=\"Arial, Helvetica, sans-serif\" size=1><STRONG>";
	   $toprint .= localize('_XMLFILE',getlocal());
	   $toprint .= "</STRONG><br>";
	   //$toprint .= "<INPUT type=\"text\" name=submail maxlenght=\"64\" size=25><br>"; 
	   $toprint .= "<select name='xmlfeed' onChange='location=this.options[this.selectedIndex].value'>" .
				   $opt . "</select>";
	   
       $toprint .= "<DIV class=\"monospace\"><TEXTAREA style=\"width:100%\" NAME=\"csvmails\" ROWS=10 cols=60 wrap=\"virtual\" readonly>";
	   $toprint .=  $this->load_xml_file();		 
       $toprint .= "</TEXTAREA></DIV><br>";	   
	   
 
       $toprint .= "<input type=\"hidden\" name=\"FormName\" value=\"xmlcreate\">"; 
       $toprint .= "<INPUT type=\"submit\" name=\"submit\" value=\"" . localize('_xmlcreate',getlocal()) . "\">&nbsp;";  
       $toprint .= "<INPUT type=\"hidden\" name=\"FormAction\" value=\"" . "cpxmlcreate" . "\">";	 	   
	   	    
       $toprint .= "</FONT></FORM>";	    

       return ($toprint);
    }		
	
	
	protected function show_grids() {

		    $title = str_replace(' ','_',localize('_XMLITEMS',getlocal()));
            $myfields = implode(',', $this->select_fields);	

			$sSQL = 'select * from (select id,'.$myfields . ' from products) as o';	   
		    //echo $sSQL;

			foreach ($this->select_fields as $i=>$f) {
				if (stristr($f,'active')) {
					$type = 'boolean';
					$edit = 0;
					$options = ($f=='itmactive') ? "1:0" : "101:0";	
					$align = 'left';
                    //$title = localize('_'.$f,getlocal());					
				}
				else {
					$type = 10;
					$edit = /*stristr($f,$this->xmlindex*/in_array($f, $this->xmlindex) ? 1 : 0;
					$options = null; 
					$align = 'left';
					//$title = stristr($f,$this->xmlindex) ? localize('_xmlindex',getlocal()) : localize('_'.$f,getlocal());
				}				
				GetGlobal('controller')->calldpc_method("mygrid.column use grid9+$f|".localize('_'.$f,getlocal())."|$type|$edit|$options|$link_option|$search|$hidden|$align");	
			}
			
		    $out .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid9+products+$sSQL+e+$title+id+1+1+20+400++0+1+1");
			
		
			return ($out);	
	}	
	
	
	protected function get_xml_items() {
        $db = GetGlobal('db');		
	    $lan = $lang?$lang:getlocal();
	    $itmname = $lan?'itmname':'itmfname';
	    $itmdescr = $lan?'itmdescr':'itmfdescr';
		
        /*$sSQL = "select id,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active,code4,".
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark,ypoloipo1,resources,weight,volume,".$this->getmapf('code').
				",stats.id,stats.tid from products";*/
		$myfields = implode(',', $this->select_fields);	

		$sSQL = "select id," . $myfields . " from products";			
		$sSQL .= " WHERE itmactive>0 and active>0 and " . $this->xmlindex[0] . "=1";//" IS NOT NULL"; //!!!				

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
		//print_r($resultset);
		foreach ($resultset as $n=>$rec) {
			
			foreach ($this->select_fields as $i=>$f) {
				$recarray[$f] = $rec[$f];
			} 
		    $id = $rec[$this->getmapf('code')];	
			$cat = $rec['cat0'] ? $rec['cat0'] : null;
			$cat .= $rec['cat1'] ? $this->cseparator.$rec['cat1'] : null;
			$cat .= $rec['cat2'] ? $this->cseparator.$rec['cat2'] : null;
			$cat .= $rec['cat3'] ? $this->cseparator.$rec['cat3'] : null;
			$cat .= $rec['cat4'] ? $this->cseparator.$rec['cat4'] : null;
			
			$recarray['itemurl'] = 'http://' . $this->url . '/' . seturl('t=kshow&cat='.$cat.'&id='.$id,null,null,null,null,1);
			$recarray['itemimg'] = 'http://' . $this->url . '/' . $this->imgpath . $id . $this->restype;
			$recarray['itemcat'] = $cat; /** <<<<<<<<<<<<<<<<<<<<<<<<<<< also add **/
			
			$ret_array[] = (array) $recarray;
		
		}
		
		return ($ret_array);		
	}		
	
	function create_data($template=null) {
		//echo 'a>'.$this->savepath .'/'. $template.'.xht';
		
	    if (($template) && (is_readable($this->savepath .'/'. $template.'.xht'))) {
	        $xmltemplate = @file_get_contents($this->savepath .'/'. $template.'.xht');
			$xmltemplate_products = @file_get_contents($this->savepath .'/'. $template.'.xhm');
			//echo '>SEE:',$xmltemplate_products;
		}
        else
            return false;			
		
	    $data = $this->get_xml_items();
		//print_r($data);
		//echo count($data); >1 ?
		$tokens = array();
		$items = array();
		foreach ($data as $n=>$rec) {
			
			foreach ($this->select_fields as $i=>$f) {
				$tokens[] = $rec[$f];
            }	
			$tokens[] = $rec['itemurl'];
			$tokens[] = $rec['itemimg'];
			$tokens[] = $rec['itemcat']; /** <<<<<<<<<<<<<<<<<<<<<<<<<<< also add **/
			//if ($n==0) print_r($tokens);
			$items[] = $this->combine_tokens($xmltemplate_products, $tokens, true);
            unset($tokens);						
		}	
		
		$tt = array();
		$tt[] = $this->cdate = date('Y-m-d h:m'); //$this->cdate;
		$tt[] = implode("", $items);
		$ret = $this->combine_tokens($xmltemplate, $tt, true);
		unset($tt);
		return ($ret);
	}	

	function combine_tokens($template_contents,$tokens, $execafter=null) {
	    //print_r($tokens); //<<<<<<<<<<<<<, test
	    if (!is_array($tokens)) return;
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);
          //$ret = GetGlobal('controller')->calldpc_method("fronthtmlpage.process_commands use ".$template_contents);		  		
		}		  		
		else
		  $ret = $template_contents;
		  
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
            //echo $tok,'<br>';
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<20;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);
		//echo $ret;
		
		//execute after replace tokens
		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $retout = $fp->process_commands($ret);
		  unset ($fp);
          //echo $retout;
		  return ($retout);
		}		
		
		return ($ret);
	}

	protected function getmapf($name) {
	
	  if (empty($this->map_t)) return 0;
	  
	  foreach ($this->map_t as $id=>$elm)
	    if ($elm==$name) break;
				
	  //$id = key($this->map_t[$name]) ;
	  $ret = $this->map_f[$id];
	  return ($ret);
	}
	
	
	
	public function fnum($n, $dec_digits, $dp=null, $tp=null) {
	  $dec = $dp ? $dp : $this->decimal;
      $ret = number_format(floatval($n),$dec_digits,$dec,$tp);
      return ($ret);	  
	}

	public function pricewithtax($price,$tax=null) {
	  //echo $price;
      if ($tax) {
          $mytax = (($price*$tax)/100);	
	      $value = ($price+$mytax);		  
	  }
	  else
	     $value = $price;
	 
	  $ret = $this->fnum($value,2,',');//'.'
	
	  return ($ret);
	}	
	
	//override from fronthtmlpage (use rcxmlfeeds.nvltokens)
	public function nvltokens($token=null,$state1=null,$state2=null,$value=null,$isdigit=null) {
		//echo '>',$token,':',$value,'<br/>';
		if (is_numeric($value) && ($isdigit==true)) 
           $ret = ($token==$value) ? $state1 : $state2;			
		elseif ($value) 
			$ret = ($token==$value) ? $state1 : $state2;  	
        else 	
           $ret = $token ? $state1 : $state2;
 
		   
		return ($ret);
    }		
};
}
?>