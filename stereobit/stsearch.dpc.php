<?php

$__DPCSEC['STSEARCH_DPC']='1;1;1;1;1;1;2;2;9';

if ( (!defined("STSEARCH_DPC")) && (seclevel('STSEARCH_DPC',decode(GetSessionParam('UserSecID')))) ) {

define("STSEARCH_DPC",true);

$__DPC['STSEARCH_DPC'] = 'stsearch';

$d = GetGlobal('controller')->require_dpc('shop/shnsearch.dpc.php');
require_once($d);

$e = GetGlobal('controller')->require_dpc('nitobi/nitobi.lib.php');
require_once($e);

GetGlobal('controller')->get_parent('SHNSEARCH_DPC','STSEARCH_DPC');

$__EVENTS['STSEARCH_DPC'][5]='stsearch';

$__ACTIONS['STEARCH_DPC'][5]='stsearch';

$__LOCALE['STSEARCH_DPC'][0]='STSEARCH_DPC;Search;Αναζήτηση';
$__LOCALE['STSEARCH_DPC'][1]='_SEARCHIN;Search In:;Αναζήτηση σε:';
$__LOCALE['STSEARCH_DPC'][2]='_founded;items found;εγγραφές βρέθηκαν';

class stsearch extends shnsearch {

    var $_combo, $text2find;
	var $path, $imageclick;
	var $textsearch, $searchpath, $searchfiletypes;
	var $search_result;
	var $hosted_path;
	var $app_pool, $res_pool, $cat_pool, $items_pool;

	function stsearch() {

	  shnsearch::shnsearch();

      $this->title = localize('STSEARCH_DPC',getlocal());
	  $this->path = paramload('SHELL','prpath');
	  $this->urlpath = paramload('SHELL','urlpath');
	  $this->inpath = paramload('ID','hostinpath');			  
	  
	  //$this->_combo[0] = new nitobi("SubscribersList");
      //$this->nitobi_javascript();	
	  $this->imageclick = remote_paramload('STSEARCH','imageclick',$this->path);	

	  $this->textsearch = remote_paramload('STSEARCH','textsearch',$this->path);	  
	  $this->searchpath = remote_paramload('STSEARCH','searchpath',$this->path);	
	  $ft = remote_arrayload('STSEARCH','filetypes',$this->path);	
	  $fp = array('.htm','.txt');//htm includes html
	  $this->searchfiletypes = $ft?$ft:$fp;  
	  
	  $this->app_pool = array(0=>'art-time',1=>'panikidis2',2=>'audiophile-sounds',3=>'nathellas',4=>'hellascopy');
	  $this->hosted_path = $this->path;
	  $this->res_pool = array();
	  $this->cat_pool = array();	
	  $this->items_pool = array();		    
	}

	function event($event=null) {

	  $this->text2find = GetParam('Input')?GetParam('Input'):GetReq('input'); 
	  //echo $this->text2find,'>';
	  switch ($event) {

		//cart
	     case 'searchtopic'   :
	     case 'addtocart'     :
		 case 'removefromcart':		break;
		// 	  
	  
	    case 'search'         :	  
		default               : $this->search_javascript();
		
		                        if ($this->text2find) {
								  
								  foreach ($this->app_pool as $aid=>$ap) {
								     $this->switch_db($ap);
									 //$this->do_search_categories($this->text2find);//app db
									 $this->do_quick_search($this->text2find,$ap);//app db
								  }
								}  
		                        
	  } 
	}


	function action($action=null) {
	
	  switch ($action) {
	  
		//cart
	     case 'searchtopic'   :
	     case 'addtocart'     :
		 case 'removefromcart':	break;	
		// 	  
	  
	    case 'search' :		
		default       : $out = $this->form_search();
	  }	
	  
	  return ($out);
	}
	
	function search_javascript() {
      if (iniload('JAVASCRIPT')) {	
	  
	       $code2 = $this->js_make_search_url();	
		   $js = new jscript;	
           $js->load_js($code2,"",1);			   
		   unset ($js);
	  }			   	   	  
		   
	}

	function nitobi_javascript() {

      if (iniload('JAVASCRIPT')) {

		   //$template = $this->set_template();   		      

	       $code = $this->init_combo();					   	

		   //$code .= $this->_grids[0]->OnClick(22,'QueueDetails',$template,'Vehicles','p_id',0);

		   $js = new jscript;

		   //$js->setloadparams("init()"); //added in html

           //$js->load_js('nitobi.grid.js');		   	   

           $js->load_js('nitobi.toolkit.js');				   		   
           $js->load_js('nitobi.combo.js');		   		   
           $js->load_js($code,"",1);			   			   

		   unset ($js);
	  }		
	}	


	function init_combo() {

        //disable alert !!!!!!!!!!!!		

		$out = "

function alert() {}\r\n 


function init()

{

";

	   if (!empty($this->_combo)) {	  
        foreach ($this->_combo as $n1=>$g1) {
		  if (is_object($g1))
		    $out .= $g1->init_combo($n1);		 
		}
	   }	   
       $out .= "\r\n}";

       return ($out);
	}		

	

	function show_combo($title=null,$preselcat=null,$isleaf=null) {
       //NITOBI

	   /* $this->_combo[0]->set_combo_column_img('images/b_go.gif',16,1);	
	    $this->_combo[0]->set_combo_column('color',170,0);
	    $this->_combo[0]->set_combo_column('',200,2);


	    //STATIC MODE

	    $file = paramload('SHELL','prpath') . "colors.opt";
	    $names = array('color','image','email');	 
	    $data = explode(",",file_get_contents($file));	

	    foreach ($data as $id=>$rec) {
	     $mydata[] = array(trim($rec),'images/b_go.gif','xxx');
	    }

	    $this->_combo[0]->set_combo_data($mydata,implode("|",$names));					

	    //$ret = $this->_combo[0]->set_combo();

        $ret .= $this->_combo[0]->set_combo("175","360","300","",'unbound');	*/
		
		
		//INTERNAL
		if (defined("SHKATEGORIES_DPC"))//sql based cats			
          $ret = GetGlobal('controller')->calldpc_method('shkategories.show_combo_results use '.$title.'+'.$preselcat.'+'.$isleaf);
			 
		
		//$ret .='zzzz';		

		return ($ret);

	}	
		
	
    function do_search_categories($text2find=null) {
       $db = GetGlobal('db');
	   $cmd = 'klist';			
	   $cat2findin = GetReq('cat');
	   $meter=0;	
	   $lan = getlocal();   
	   $mylan = $lan?$lan:'0';	   
       if ($this->usetablelocales)
	     $f = $mylan; 
	   else
	     $f = null; //duplicate select!!!cat123 as index, 01,11 as lang	  	   
		 
	   if (!$text2find) return;	 
	
	   for($i=2;$i<=5;$i++) {//echo $i,'<br>';
	   
         $sSQL = '(select ';//cat2,cat3,cat4,cat5 from categories where ';	   
	     if ($this->usetablelocales) {		 
		   switch ($i) {
		     case 2 : $sSQL .= "cat2,cat{$f}2"; break;
		     case 3 : $sSQL .= "cat2,cat{$f}2,cat3,cat{$f}3"; break;
		     case 4 : $sSQL .= "cat2,cat{$f}2,cat3,cat{$f}3,cat4,cat{$f}4"; break;
		     case 4 : 
			 default: $sSQL .= "cat2,cat{$f}2,cat3,cat{$f}3,cat4,cat{$f}4,cat5,cat{$f}5"; break;		   
		   }
		 }
		 else {
		   switch ($i) {
		     case 2 : $sSQL .= 'cat2'; break;
		     case 3 : $sSQL .= 'cat2,cat3'; break;
		     case 4 : $sSQL .= 'cat2,cat3,cat4'; break;
		     case 5 : 
			 default: $sSQL .= 'cat2,cat3,cat4,cat5'; break;		   		   		   
		   }		 
		 }
		 $sSQL.= ' from categories where ';
		 
	     if ($this->usetablelocales) {
	       $sSQL.= "(cat{$f}$i like ". $db->qstr('%'.strtolower($text2find).'%') . ' or ' . "cat{$f}$i like ". $db->qstr('%'.strtoupper($text2find).'%');		 
	     }	   
		 else {
	       $sSQL.= "(cat$i like ". $db->qstr('%'.strtolower($text2find).'%') . ' or ' . "cat$i like ". $db->qstr('%'.strtoupper($text2find).'%');
	   	 }  	   	   
         $sSQL .= ") and ctgid>0 and active>0 and view>0 and search>0 )";
		 
		 //$sSQLa = $sSQL;		
		 $result = $db->Execute($sSQL,2);  
		 
	     if ($result) { 		 
         while(!$result->EOF) {
		 
		   switch ($i) {
		     case 2 : $of = $result->fields['cat2']; $of2 = $result->fields["cat{$f}2"]; 
			          //$group = null; //..main cat..
					  $dp = 0;
					  break;
		     case 3 : $of = $result->fields['cat3']; $of2 = $result->fields["cat{$f}3"]; 
			          if (($this->depthview) && ($this->depthview>=1)) {
					    if ($result->fields['cat2']) $group = $result->fields['cat2']; 
						//echo $this->depthview,'-----',$result->fields['cat2'],':',$result->fields['cat3'],'<br>';	
					  }	
					  else
					    $group = $result->fields['cat2']; 	
					  $dp = 1;
					  break;
		     case 4 : $of = $result->fields['cat4']; $of2 = $result->fields["cat{$f}4"]; 
			          if (($this->depthview) && ($this->depthview>=1)) {
					    if ($result->fields['cat2']) $group = $result->fields['cat2'];
					    $group.= (($result->fields['cat3']) && ($this->depthview>=2)) ? '^' . $result->fields['cat3'] : null; 
					  }
					  else
					    $group = $result->fields['cat2'] . '^' . $result->fields['cat3'];
					  $dp = 2;	
			          break;
		     case 5 : $of = $result->fields['cat5']; $of2 = $result->fields["cat{$f}5"]; 
			          if (($this->depthview) && ($this->depthview>=1)) {
					    if ($result->fields['cat2']) $group = $result->fields['cat2'];// . '^' . $result->fields['cat3'] . '^' . $result->fields['cat4'];
					    $group.= (($result->fields['cat3']) && ($this->depthview>=2)) ? '^' . $result->fields['cat3'] : null; 
					    $group.= (($result->fields['cat4']) && ($this->depthview>=3)) ? '^' . $result->fields['cat4'] : null; 					  
						//echo $this->depthview,'--'.$group,'<br>';
					  }
					  else	
					    $group = $result->fields['cat2'] . '^' . $result->fields['cat3'] . '^' . $result->fields['cat4'];
					  $dp = 3;						
			          break;		   		   		   
		   }		 
		   //$f = $result->fields['cat2'];
		   //$_g = implode("^",array_reverse($result->fields)); //echo $_g,"<br>";
		   
	       //if (($this->exclude) && (trim($f)) && (!in_array(trim($_g),$this->exclude)) ) 
		   if ($of) {
	         if ($this->usetablelocales) 
			   $res[$of] = $of2; //echo $of,'<br>';
			 else  
		       $res[$of] = $of; //echo $of,'<br>';
			 //echo $of,'>',$of2,'<br>';  
			 if ($group) $gr[$of] = $group;
			 if ($dp) $dpp[$of] = $dp;
			 //print_r($gr);
			 $hostcat  = $result->fields["cat{$f}2"]?$result->fields["cat{$f}2"].$this->bullet:null;
			 $hostcat .= $result->fields["cat{$f}3"]?$result->fields["cat{$f}3"].$this->bullet:null;
			 $hostcat .= $result->fields["cat{$f}4"]?$result->fields["cat{$f}4"].$this->bullet:null;
			 //$hostcat .= $result->fields['cat5']?$result->fields['cat5']:null;
			 
			 $hcat[] = $hostcat;		   
			 
		   }
		   		   
		   $result->MoveNext();
		   //$i+=1;
	     }//while		 
		 
	     if ($this->usetablelocales) 		 
           $data = $this->view_category($res,$viewtype,$mode,null/*$group*/,$cmd,null,$gr,$dpp);
		 else
		   $data = $this->view_category($res,$viewtype,$mode,$group,$cmd,null,$gr,$dpp);
		 //print_r($res);
		 //$ret .= $data?$data.'<hr>':null; 	   		 
		 if ($data) {
		   //print_r($hcat);
		   //$ret .= $data .'(' . $hostcat . ')' . '<hr>';
		   $mret[] = '<hr>' . $data;// . '<hr>';
		   $meter+=1;
		 }
		 
		 unset($res); unset($result); unset($exists);
		 }//if result		 
	   }//for
	   
	   if (is_array($mret)) {
	     foreach ($mret as $i=>$d)
	       $ret .= $d;		 
	   }
	   	   		 
	   
	   //return ($ret);
	   $this->cat_pool[] = $ret;
	}	
	
    function view_category($ddir,$type=1,$mode=0,$group=null,$cmd=null,$tokens=null,$setofgroups=null,$setofdepths=null) {
		 
        if ($ddir)  {//print_r($ddir);
		
	       $template='fpkatlist.htm';	   
	       $tfile = $this->urlpath .'/' . $this->inpath . '/cp/html/'. str_replace('.',getlocal().'.',$template) ; 	

           $this->outpoint . "&nbsp;"; 	 
		   	  
		   $t = $cmd?$cmd:'shkategories';//$this->dirview;
				 
		   $i=0;		 
           reset($ddir);
           foreach ($ddir as $line_num => $line) {	//echo $line;						    
			 
				  //localization............................
                 if ($this->usetablelocales) {
				      $loctitle = $line;
					
				      $title = $loctitle;		
					
				      if (trim($group)!=null) {				  
				        $gr = rawurlencode(str_replace(' ','_',$group . "^" . $line_num));		   
				      }		
				      else { 
					    $search_array_group = $setofgroups[$line_num];
					    if ($search_array_group) {	
						  //print_r($search_array_group);					
						  $gr = rawurlencode(str_replace(' ','_',$search_array_group));					
						}  
						else
             	          $gr = rawurlencode(str_replace(' ','_',$line_num));					
				      }		 
				  }
				  else {
				    //echo $line_num,'--',$line,'<br>';
				    if (($clanguage=getlocal())!=$this->deflan)
				      $loctitle = localize($line_num,$clanguage);
				    else  
				      $loctitle = $line_num;	
				  
				    $title = $line_num;		
		  
				    if (trim($group)!=null) 
				      $gr = rawurlencode(str_replace(' ','_',$group . "^" . $line));		   
				    else  
             	      $gr = rawurlencode(str_replace(' ','_',$line)); 
                  }
				  				  				  
				  
                  if ($tokens)
				    $mytokens[] = "<A href='" . $this->getUrl($this->app_pool[$appid-1]) . '?t=klist&cat='.$gr . "'>$loctitle</A>". $this->outpoint ;
					 //seturl("t=$t&cat=$gr&p=1",$loctitle) . " " . $this->outpoint . " ";
				  else
				    $to_be_print .= "<A href='" . $this->getUrl($this->app_pool[$appid-1]) . '?t=klist&cat='.$gr . "'>$loctitle</A>". $this->outpoint ;
					 //seturl("t=$t&cat=$gr&p=1",$loctitle) . " " . $this->outpoint . " ";

			  $i+=1;
	       }//foreach 
		   
           if ($tokens) {
             //print_r($mytokens);
		     //echo $template,':',$tfile; 		  
			 $mytemplate = file_get_contents($tfile); 
		     $tokret = $this->combine_n_tokens($mytemplate,$mytokens);
			 return ($tokret);
		   }
		   else 
		     return ($to_be_print);		   
		    
	   }
	}	
	
	//override
	function search_categories() {
	  //print_r($this->cat_pool);
	  foreach($this->cat_pool as $cp)
	    $ret .= $cp;
		
      return ($ret);		 
	}
	 			
	
	//override
	function do_quick_search($text2find,$appname=null) {
        $db = GetGlobal('db');		
		$stype = GetParam('searchtype'); //echo $stype;
		$scase = GetParam('searchcase'); //echo $scase;								

		if ($text2find) {  
	
	      $sSQL = "select id,code1,code2,code3,code4,code5,sysins,code1,pricepc,price2,sysins,itmname,itmfname,uniname1,uniname2,active," .// from abcproducts";// .
	            "price0,price1,cat0,cat1,cat2,cat3,cat4,itmdescr,itmfdescr,itmremark from products ";
		  	
		  $sSQL .= " where ";
		  $sSQL .= $this->findsql($text2find,'itmname<@>itmfname<@>itmdescr<@>itmfdescr<@>itmremark',null,$stype,$scase);			   							  
		  $sSQL .= " and itmactive>0 and active>0";	
		  
		  //echo $sSQL,'<br>';		  
		  	
		  //echo $sSQL;		  
	      $resultset = $db->Execute($sSQL,2); 
	   	  //print_r($resultset);
	      $this->result = $resultset; 
		  $this->res_pool[$appname] = $resultset; //save pool of results for any db in loop																			
	   	}
	}		
		
		
	
	function show_results($imageclick=null,$cmd=null,$template=null,$no_additional_info=null,$external_read=null,$photosize=null) {
	   $cmd = $cmd?$cmd:'klist';
	   $lan = getlocal();
	   $itmname = $lan?'itmname':'itmfname';
	   $itmdescr = $lan?'itmdescr':'itmfdescr';
	   $pz = $photosize?$photosize:1;		   
	   $xdist = ($this->imagex?$this->imagex:100);
	   $ydist = ($this->imagey?$this->imagey:75);		   
       /*if (!$cat=GetReq('cat')) 
	     $createcats=1; 
	   else 
	     $createcats=$catcrt;	   */	 
	   
	   if ($this->imageclick>0)
	     $myimageclick = 1;
	   else	 
	     $myimageclick = $imageclick;
		   
	   $template='fpkatalog.htm';	   
	   $t = $this->urlpath .'/' . $this->inpath . '/cp/html/'. str_replace('.',getlocal().'.',$template) ; 
	   //echo $t,'>';
	   if (($template) && is_readable($t)) {
	     //echo $template,'>';
		 $mytemplate = file_get_contents($t);
		 //$html = $this->combine_template($template,'a','b','c','d','e');
		 //echo $html;
	   }
	   
	   reset($this->res_pool);		   
	   reset($this->app_pool);
	   $ai = 0;
	   foreach ($this->res_pool as $app=>$result) {
		// echo $appid,$ai,'<br>'; 	   
	    if (!empty($result)) {
	     foreach ($result as $n=>$rec) {
		
		   //memory limit prevention
		   //echo 'mem limit 33554432:',memory_get_peak_usage(true);//memory_get_usage();
		   $mem = memory_get_peak_usage(true);//memory_get_usage();
		   if ($mem>16000000) {
		     $mem_msg = '<br><h2>WARNING:Memory allocation failed, reduce page view limit!</h2>';
		     break;
		   }	 
				   
		   //echo $this->app_pool[$appid],'<br>';
		   //echo $this->getUrl($this->app_pool[$appid]),'<br>>';
		   	
		   $details = null;//seturl("t=kshow&id=".$rec[$this->getmapf('code')]."&cat=$cat&page=$page",$this->details_button);	   
		   $detailink = null;//seturl("t=kshow&id=".$rec[$this->getmapf('code')]."&cat=$cat&page=$page".'#DETAILS',$this->details_button);		   
		   
		   if ($rec['itmname']) {
		     $itmname = $rec['itmname'];					   	   	   
		     $itemlink =  $this->getUrl($app) . '?t=kshow&cat='.$cat.'&id='.$rec[$this->getmapf('code',$app)];
		     $itemlinkname = "<A href='" . $this->getUrl($app) . '?t=kshow&cat='.$cat.'&id='.$rec[$this->getmapf('code',$app)] . "'>".$itmname."</A>";		   
		   		   
		     $itm =  "<b>" . ($rec['itmname']?$itemlinkname:"&nbsp;") . "</b><br>" . 
			                 ($rec['itmdescr']?$rec['itmdescr']:"&nbsp;");
		   }
		   else {
		     $itmname = $rec['itmfname'];		   
		     $itemlink =  $this->getUrl($app) . '?t=kshow&cat='.$cat.'&id='.$rec[$this->getmapf('code',$app)];
		     $itemlinkname = "<A href='" . $this->getUrl($app) . '?t=kshow&cat='.$cat.'&id='.$rec[$this->getmapf('code',$app)] . "'>".$itmname."</A>";		   
		   		   
		     $itm =  "<b>" . ($rec['itmfname']?$itemlinkname:"&nbsp;") . "</b><br>" . 
			                 ($rec['itmfdescr']?$rec['itmfdescr']:"&nbsp;");		   
		   }					 
		  
	       $myrec = new window('',$itm);
	       $mywin = $myrec->render("center::100%::0::group_article_selected::left::5::5::");
		   		  
		   //store in pool 
		   $this->items_pool[$itmname] = $mywin;				   		   
		   
	       unset ($myrec);
	       unset ($mywin);		   	   		   	   		   	   		   		
					
	     }//foreach
		}//if res  
		$ai+=1;
	   }//pool
	   
	   //print_r($this->items_pool);	
	}
	
	//override
	function list_catalog($imageclick=null,$cmd=null) {
			  
	      $this->show_results($imageclick,'search&input='.$this->text2find); //app db			  
		  
		  ksort($this->items_pool);
		  
		  foreach ($this->items_pool as $k=>$item)
		    $ret .= $item;
			  
		  return ($ret);	  
	}			
	
	//override
    function form ($entry="",$cmd=null)  {
	  $entry = GetParam('input');
	  $this->scase = GetParam('searchcase')?true:false;
	  $this->stype = GetParam('searchtype')?GetParam('searchtype'):null;
	  
      $mycmd = $cmd?$cmd:'search';
      $filename = seturl("t=$mycmd");//&a=$a&g=$g");  
	  $lan = getlocal()?getlocal():'0';
      //template
	  $template_file='searchform.htm';	   
	  $tfile = $this->urlpath .'/' . $this->inpath . '/cp/html/'. str_replace('.',$lan.'.',$template_file) ; 	

      //in thios case mytemplate disbled
	  //echo $tfile;
      if (is_readable($tfile)) {
		 $contents = file_get_contents($tfile);	   
	     $template = 1;	     
	  }	 
	        

      //print statistics
	  if ($template) 
	    $tokens[] = $this->stime;
	  else		  
	    $out = $this->stime;

	  if ($template) { 
	    $tokens[] = "<FORM name='searchform' action=". $filename . " method=POST>" . //post 
		            "<INPUT type=\"text\" name=\"input\" value=\"$entry\" size=25>"; 
					
					
        if ($this->stype) {
	      switch ($this->stype) {
		    case $this->anyterms   : $tokens[] = "<SELECT name=searchtype> <OPTION selected>$this->anyterms<OPTION>$this->allterms<OPTION>$this->asphrase</OPTION></SELECT>"; break;
		    case $this->allterms   : $tokens[] = "<SELECT name=searchtype> <OPTION>$this->anyterms<OPTION selected>$this->allterms<OPTION>$this->asphrase</OPTION></SELECT>";break;
		    case $this->asphrase   : 
			default                : $tokens[] = "<SELECT name=searchtype> <OPTION>$this->anyterms<OPTION>$this->allterms<OPTION selected>$this->asphrase</OPTION></SELECT>";break;
	      }
	    }
	    else
		   $tokens[] = "<SELECT name=searchtype> <OPTION>$this->anyterms<OPTION>$this->allterms<OPTION selected>$this->asphrase</OPTION></SELECT>";					
		   
        if ($this->scase) $check = "checked"; else $check = "";
        $tokens[] = "<input type=\"checkbox\" name=\"searchcase\" value=\"$check \"". $check . ">";		   
		
		$tokens[] = "<input type=\"submit\" name=\"Submit\" value=\"$this->t_searchtitle\">" .
                    "<input type=\"hidden\" name=\"FormAction\" value=\"$mycmd\">" .
                    "</FORM>";		
		
		//search in cat form			
        $tokens[] = $this->searchin();							
	  }	
	  else {			
        $toprint  = "<FORM name='searchform' action=". $filename . " method=POST>";//post
	  
        $field1[] = $this->t_searchtitle . ":";
	    $attr1[] = "right;50%";	  
        $field1[] = "<INPUT type=\"text\" name=\"input\" value=\"$entry\" size=25>";
	    $attr1[] = "left;50%";
	  
	    $w1 = new window('',$field1,$attr1);  $toprint .= $w1->render("center::100%::0::group_article_selected::left::0::0::");   unset ($field1);  unset ($attr1); unset ($w1);
	  
        $field2[] = $this->t_sttype . ":";
	    $attr2[] = "right;50%";	  
        if ($this->stype) {
	      switch ($this->stype) {
		    case $this->anyterms   : $field2[] = "<SELECT name=searchtype> <OPTION selected>$this->anyterms<OPTION>$this->allterms<OPTION>$this->asphrase</OPTION></SELECT>"; break;
		    case $this->allterms   : $field2[] = "<SELECT name=searchtype> <OPTION>$this->anyterms<OPTION selected>$this->allterms<OPTION>$this->asphrase</OPTION></SELECT>";break;
		    case $this->asphrase   : $field2[] = "<SELECT name=searchtype> <OPTION>$this->anyterms<OPTION>$this->allterms<OPTION selected>$this->asphrase</OPTION></SELECT>";break;
	      }
	    }
	    else
		   $field2[] = "<SELECT name=searchtype> <OPTION>$this->anyterms<OPTION>$this->allterms<OPTION selected>$this->asphrase</OPTION></SELECT>";
	    $attr2[] = "left;50%";
	    $w2 = new window('',$field2,$attr2);  $toprint .= $w2->render("center::100%::0::group_article_selected::left::0::0::");   unset ($field2);  unset ($attr2); unset ($w2);
		  	      
        //check case sencitive param
        $field3[] = $this->t_casesence . ":";	  
	    $attr3[] = "right;50%";		  
        if ($this->scase) $check = "checked"; else $check = "";
        $field3[] = "<input type=\"checkbox\" name=\"searchcase\" value=\"$check \"". $check . ">";
	    $attr3[] = "left;50%";		  
	    $w3 = new window('',$field3,$attr3);  $toprint .= $w3->render("center::100%::0::group_article_selected::left::0::0::");   unset ($field3);  unset ($attr3); unset ($w3);

       /* $field4[] = "&nbsp";	  
	    $attr4[] = "right;50%";		  		   
        $field4[] = $this->searchin();
	    $attr4[] = "left;50%";		  
	    $w4 = new window('',$field4,$attr4);  $toprint .= $w4->render("center::100%::0::group_article_selected::left::0::0::");   unset ($field4);  unset ($attr4); unset ($w4);	 		
	  */
	    $toprint .= "<input type=\"submit\" name=\"Submit\" value=\"$this->t_searchtitle\">"; 
        $toprint .= "<input type=\"hidden\" name=\"FormAction\" value=\"$mycmd\">";
        $toprint .= "</FORM>";
	   
	    $data2[] = $toprint; 
  	    $attr2[] = "left";

	    $swin = new window(localize('_SEARCH',getlocal()),$data2,$attr2);
	    $out .= $swin->render("center::100%::0::group_dir_body::left::0::0::");	
	    unset ($swin);
		
		//2nd form search in cats
        $catform[] = localize('_SEARCHIN',getlocal());//"&nbsp";	  
	    $attrform[] = "right;50%";		  		   
        $catform[] = $this->searchin();
	    $attrform[] = "left;50%";		  
	    $cform = new window(localize('_SEARCHIN',getlocal()),$catform,$attrform);  
		$out .= $cform->render("center::100%::0::group_dir_body::left::0::0::");   
		unset ($cform);  	 		
	  		
	  }	

	  if ($template) {	 		 	      
		$tokout = $this->combine_tokens($contents,$tokens);
		return ($tokout);    
	  }
	  else 		  
        return ($out);
    }
	
	//override
	function form_search() {
	   $typos = trim(GetParam('typos'));	
	   $extras = trim(GetParam('extras'));
	   $price = trim(GetParam('price'));
	   $price2 = trim(GetParam('price2'));	   
	
       //$out =  setNavigator($this->title . "&nbsp;(" . $this->msg . ")");	
	   
	   //KATEGORIES SEARCH
	   $out .= $this->search_categories($this->text2find);
		 	   
	   //$out .= $this->list_katalog_table(2,null,null,0,1);
	   $out .= $this->list_catalog($this->imageclick,'search&input='.$this->text2find); 
	   
       if ($this->meter) 
	     $out .= "<hr>";
	   
	   $out .= $this->form(null,'search');
	

	   
	   return ($out);	
	}	
	
	//override
	function searchin() {
	
		//INTERNAL
		if (defined("SHKATEGORIES_DPC")) {//sql based cats			
          $ret = GetGlobal('controller')->calldpc_method('shkategories.show_combo_results use '.$title.'+'.$preselcat.'+'.$isleaf.'+search');
	    }		
		
		return ($ret);
	}			
	
	
	function search_additional_files($terms=null) {
	
	  if (!$this->textsearch) return;
	
	  if ($this->searchpath) {
	    $myspath = $this->urlpath.$this->inpath.'/cp/'.$this->searchpath;
		//echo $myspath,"<br>";
	    if (is_dir($myspath)) {
	
          $mydir = dir($myspath);
		
          while ($fileread = $mydir->read ()) { 
          
		   $first_letter = substr($fileread,0,1);
		   //cut no addtitional files 
		   //if (($first_letter!='_') && ($first_letter!='c')) {
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
		   }//first letter check
		  }
          $mydir->close ();

          //print_r($this->dfiles);
          return ($ret);	
		}  
   	  }
	  else 
		return; //no search
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
	
	function getmapf($name,$appname=null) {
      if ($appname) {
		 $this->hosted_path = $this->path . 'instances/' . $appname . '/' ;
	  }	
	  $path = $this->hosted_path;	
	
	  $map_t = remote_arrayload('SHKATALOG','maptitle',$path);	
	  $map_f = remote_arrayload('SHKATALOG','mapfields',$path);	
	
	  if (empty($map_t)) return null;	

	  foreach ($map_t as $id=>$elm)
	    if ($elm==$name) break;
				
	  //$id = key($this->map_t[$name]) ;
	  $ret = $map_f[$id];

	  return ($ret);
	}
	
	function getUrl($appname=null) {
      if ($appname) 
		$this->hosted_path = $this->path . 'instances/' . $appname . '/' ;	
		 
	  $path = $this->hosted_path;
	  
	  $inpath = remote_paramload('ID','hostinpath',$path) .'/';	  
	  $urlpath = remote_paramload('SHELL','urlbase',$path) . $inpath;
	  
	  //$ret = str_replace("//","/",$urlpath);
	  
	  return ($urlpath);	
	}	
	

};
}
?>