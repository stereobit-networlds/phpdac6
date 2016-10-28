<?php
$__DPCSEC['SHKATEGORIES_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ( (!defined("SHKATEGORIES_DPC")) && (seclevel('SHKATEGORIES_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("SHKATEGORIES_DPC",true);

$__DPC['SHKATEGORIES_DPC'] = 'shkategories';

$__EVENTS['SHKATEGORIES_DPC'][0]='shkategories';
$__EVENTS['SHKATEGORIES_DPC'][1]='category';
$__EVENTS['SHKATEGORIES_DPC'][2]='openf';
$__EVENTS['SHKATEGORIES_DPC'][3]='kshow';
$__EVENTS['SHKATEGORIES_DPC'][4]='klist';

$__ACTIONS['SHKATEGORIES_DPC'][0]='shkategories';
$__ACTIONS['SHKATEGORIES_DPC'][1]='category';
$__ACTIONS['SHKATEGORIES_DPC'][2]='openf';
$__ACTIONS['SHKATEGORIES_DPC'][3]='kshow';
$__ACTIONS['SHKATEGORIES_DPC'][4]='klist';

$__LOCALE['SHKATEGORIES_DPC'][0]='SHKATEGORIES_DPC;Categories;Κατηγορίες';
$__LOCALE['SHKATEGORIES_DPC'][1]='SHSUBKATEGORIES_;Subcategories;Υποκατηγορίες';
$__LOCALE['SHKATEGORIES_DPC'][2]='_cfounded; categories found; κατηγορίες βρέθηκαν';

class shkategories {

    var $title, $path, $nav_on, $urlpath, $inpath;
	var $menu;
	var $title2;
	var $usetablelocales,$resourcepath,$resourcefilepath;
	var $depthview;
	var $selected_category;
	
	var $showcatbannerpath, $showcatimagepath;
	var $max_selection;
	var $rewrite, $notencodeurl;
	var $result_in_table;
	var $cseparator, $cat_result, $replacepolicy;
	var $imagex, $imagey;
	var $encodeimageid;
	var $tmpl_path, $tmpl_name;

	function shkategories() {
	  $GRX = GetGlobal('GRX');		
	
	  $this->title = localize('SHKATEGORIES_DPC',getlocal());	
	  $this->title2 = localize('SHSUBKATEGORIES_',getlocal());	  
	  
	  $this->path = paramload('SHELL','prpath');	
	  
	  $this->urlpath = paramload('SHELL','urlpath');
	  $this->inpath = paramload('ID','hostinpath');			  

      if ($GRX) {
			 $this->outpoint = loadTheme('point');
			 $this->bullet = loadTheme('bullet');
             $this->rightarrow = loadTheme('rarrow');
			 
			 if (remote_paramload('SHKATEGORIES','resources',$this->path)) {
               //$this->resourcepath = paramload('SHELL','urlbase') . paramload('DIRECTORY','resources');	 
               $ip = $_SERVER['HTTP_HOST'];
               $pr = paramload('SHELL','protocol');
               $subdir = paramload('ID','hostinpath');		   
			   $resources = remote_paramload('SHKATEGORIES','resources',$this->path);
	           $this->resourcepath = $pr . $ip . $subdir . $resources;	 			  
			   $this->resourcefilepath = $this->urlpath. $subdir . $resources;	 			    
			   $this->restype = remote_paramload('SHKATEGORIES','restype',$this->path);
			 }
			 else  
			   $this->resourcepath = null;
	  }
	  else {
			 $this->outpoint = "|";
			 $this->bullet = "&nbsp;";
	         $this->rightarrow = ">";
			 
             $this->resourcepath = null;	 
	  }	 
	  		   
      $this->home = localize(paramload('SHELL','rootalias'),getlocal()); 
	  $this->nav_on = remote_paramload('KATEGORIES','navigate',$this->path);
	  $this->menu = remote_paramload('SHKATEGORIES','menu',$this->path);	  
	  $this->usetablelocales = remote_paramload('SHKATEGORIES','locales',$this->path);	 
	  $this->depthview = remote_paramload('SHKATEGORIES','depthview',$this->path);	
	  
	  $this->showcatbannerpath = remote_paramload('SHKATEGORIES','catbannerpath',$this->path);	
	  $this->showcatimagepath = remote_paramload('SHKATEGORIES','catimagepath',$this->path);		  	  
	  
	  //$this->rewrite = remote_paramload('SHKATEGORIES','rewrite',$this->path); //DISABLED
	  $this->notencodeurl = remote_paramload('SHKATEGORIES','notencodeurl',$this->path);
	  $this->result_in_table = remote_paramload('SHKATEGORIES','resultintable',$this->path);
	  
	  $csep = remote_paramload('SHKATEGORIES','csep',$this->path); 
      $this->cseparator = $csep ? $csep : '^';	
	  //save as var for tags
	  $this->cat_result = null;
	  
	  //thumb xy ..overwriten by shkatalog/shkatlogmedia
	  $this->imagex = remote_paramload('SHKATEGORIES','imagex',$this->path);	
	  $this->imagey = remote_paramload('SHKATEGORIES','imagey',$this->path);	

	  //replace policy
	  $this->replacepolicy = remote_paramload('SHKATEGORIES','replacechar',$this->path);	
	  
	  $this->encodeimageid = remote_paramload('SHKATEGORIES','encodeimageid',$this->path);	  
	  $this->tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->path);
	  $this->tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->path);	
	  
	  //on all pages
      $this->search_javascript();		  
	}  
	
	function event($event=null) {
	
	    switch ($event) {
          case 'openf' : 
		                        break;			
          case 'shkategories' :
		  default             :								
        }					
    }
	
	function action($action=null) {	
	
	    switch ($action) {	
          case 'openf'        : 
		                        break;		
          case 'shkategories' :
		  default             :								  
		                        	
        }	
		
		return ($out);		
    }
	
	function search_javascript() {
	
      if (iniload('JAVASCRIPT')) {

	       $id = remote_paramload('SHKATEGORIES','idsearch',$this->path);	  
	  
	       $code2 = $this->js_make_search_url($id);	
		   $js = new jscript;	
           $js->load_js($code2,"",1);			   
		   unset ($js);
	  }			   	   	  
		   
	}	
	
	//for utf strings as products code..encode to digits for saving image
	public function encode_image_id($id=null) {
	    if (!$id) return null;
		$out = _m("cmsrt.encode_image_id use $id+".$this->encodeimageid); //$this->encodeimageid ? md5($id) : $id;
        return $out;
	}	
	
	function show_category_banner($template=null) {
       $db = GetGlobal('db');	
	   $cat = GetReq('cat');
	   $lan = getlocal()?getlocal():'0';
	   
	   $mytemplate = $template ? $this->select_template($template) : 
		                         $this->select_template('fpkatbanner');	   
	   
	   if ($this->showcatbannerpath) {		   
	     $catdepth = explode($this->cseparator,$cat);
	     $alsoseedir = $this->urlpath . $this->inpath . '/' . $this->showcatbannerpath;
	   
	     //from inside to outer cat ...  
	     while ($mycurrentsubcat = $this->replace_spchars(array_pop($catdepth))) {
 	  
           $sSQL = "select data from pattachments ";
	       $sSQL .= " WHERE (type='.html' or type='.htm') and code='" . $mycurrentsubcat . "'";
	       $sSQL .= " and (lan=" . $lan . ")";// or (lan=NULL)";	
	  
	       $resultset = $db->Execute($sSQL,2);	
	       $result = $resultset;

	       if ($exist = $db->Affected_Rows()) {
			 if ($mytemplate) {
			    $tok[] = $result->fields['data'];
			    $out .= $this->combine_tokens($mytemplate, $tok);
				return ($out);			 
			 }
			 else 
			   return ($result->fields['data']);
		   }		   
           else {			   
	         $nn = str_replace('/','-',$mycurrentsubcat); //replace title / with -	 
	         $catname = '/' . $nn . $lan . '.htm';

		     if (is_readable($alsoseedir.$catname)) {
		       $htmlret = file_get_contents($alsoseedir.$catname);
			   if ($mytemplate) {
			      $tok[] = $htmlret;
			      $out .= $this->combine_tokens($mytemplate, $tok);
				  return ($out);
			   }
			   else
			     return ($htmlret);
		     }
		     //} 
		   }	 
	       //$ret = 'banner';
		 }//while  
	   } 
	   return null; 
	}
	
	function show_category_image() {
	   $cat = GetReq('cat');
	   $t = GetReq('t');
	   
	   if ($this->showcatimagepath) {	
	   
	     if ($cat) {
	   	   
	     $catdepth = explode($this->cseparator,$cat);
	     $alsoseedir = $this->urlpath . $this->inpath . '/' . $this->showcatimagepath;

	     //from inside to outer cat ...  
	     while ($mycurrentsubcat = $this->replace_spchars(array_pop($catdepth))) {
	   
	       $nn = str_replace('/','-',$mycurrentsubcat); //replace title / with -
           
	       $catname = '/';
		   $catname.= $this->encode_image_id($nn);
		   $catname.= $this->restype;   

		   if (is_readable($alsoseedir.$catname)) {
		     $image = $this->showcatimagepath.$catname;
		     $htmlret = "<img src='$image' alt='' />";//file_get_contents($alsoseedir.$catname);
			 $ret = $htmlret;
			 return ($ret);
		   }
		   //echo 'image';
		 }//while
		   
		 }//if
		 else {
	       $tname = '/';
		   $tname.= $this->encode_image_id($tid);
		   $tname.= $this->restype; 
	  
		   if (is_readable($alsoseedir.$tname)) {
		     $image = $this->showcatimagepath.$tname;
		     $htmlret = "<img src='$image' alt='' />";//file_get_contents($alsoseedir.$catname);
			 $ret = $htmlret;
			 return ($ret);
		   }		 
		 }
	   } 
	   return null;//($ret);	 
	}	
	
	protected function get_image_icon($catcode=null) {	
        $alsoseedir = $this->urlpath . $this->inpath . '/' . $this->showcatimagepath;
		
        $x = $this->imagex ? "width=\"".$this->imagex."\"":null; 
        $y = $this->imagey ? "height=\"".$this->imagey."\"":null;			
		
	    if (!$catcode) {
		    $tname = 'nopic' . $this->restype ;
		}	
		else {
			  $tname = $this->encode_image_id($catcode);
			  $tname.= $this->restype; 	
		} 	
		
		if (is_readable($alsoseedir.$tname)) 
		     $image = $this->showcatimagepath.$tname;
		else 
		     $image = $this->showcatimagepath. 'nopic' . $this->restype ;
		
		$htmlret = "<img src='$image' $x $y>";
		$ret = $htmlret;
		return ($ret);		 
	}		
	
	//setof groups used by search to get def group per res for non view cats
	//group is null in this case
	//setofdepths is the real depth comes from
    function view_category($ddir,$type=1,$mode=0,$group=null,$cmd=null,$tokens=null,$setofgroups=null,$setofdepths=null,$template=null) {
	    //print_r($setofgroups);
		//echo $group;
	    //depthview
		$cdepth = $this->get_treedepth();
		
		if (($this->depthview) && ($this->depthview<=$cdepth)) {
		  //don't show
		  return;
		}
		 
        if ($ddir)  {
		   //print_r($ddir);
		
	       $mytemplate = $template ? $template : 'fpkatlist.htm';	
		   $tfile = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$mytemplate) ; 	
		   $t = $cmd ? $cmd : 'shkategories';
		   //$ti come into loop
				 
		   $i=0;	
		   $this->max_selection = 0;	
		   	   	 
           reset($ddir);
           foreach ($ddir as $line_num => $line) {	
		   					    
				 if (stristr($t,'input=')) { //ti replaces first search with result name
				   $text2find = GetParam('Input') ? GetParam('Input') : GetReq('input'); 
				   $ti = str_replace($text2find,$line,$t);
				 }
				 else
				   $ti = $t;
			 

				 $loctitle = $line;
				 $title = $loctitle;		
					
				 if (trim($group)!=null) {				  
				        $gr = $group . $this->cseparator . $this->replace_spchars($line_num); 
				 }		
				 else { 
					  $search_array_group = $setofgroups[$line_num];
					  if ($search_array_group) 			
					    $gr = $search_array_group . $this->cseparator . $this->replace_spchars($line_num);					
					  else
             	        $gr = $this->replace_spchars($line_num);					
				 }		

				  				  				  
				  
                  switch ($type) {
                    case  2 :  $mytokens[] =  seturl("t=$ti&cat=$gr",$loctitle,null,null,null,true) . "<br>";
							   break;
							   
                    case  3 :  $mytokens[] = seturl("t=$ti&cat=$gr","<B>".$loctitle."</B",null,null,null,true);
                               break;
							   
					case  4 :  $mytokens[] = seturl("t=$ti&cat=$gr","<B>" . $loctitle . "</B>",null,null,null,true);
					           break;

					case  1 : 
                    default : 
					             $mytokens[] = seturl("t=$ti&cat=$gr",$loctitle,null,null,null,true) . " " . $this->outpoint . " ";
								 $tok2[$i][] = seturl("t=$ti&cat=$gr",$loctitle,null,null,null,true) . " " . $this->outpoint . " ";
								 $tok2[$i][] = $gr; //cat name
								 $tok2[$i][] = $loctitle; //cat title
								 $tok2[$i][] = seturl("t=$ti&cat=$gr",null,null,null,null,true);//url
								 $tok2[$i][] = $this->get_image_icon($gr);//$this->show_category_image();//image
							   
							   
               }  
			   
			  $i+=1;
			  $this->max_selection+=1;
			  
	       }//foreach 
		   	  
		   $mydatatemplate = file_get_contents($tfile);
		   $tokret = $this->combine_n_tokens($mydatatemplate, $mytokens, $tok2);

		   return ($tokret);
		    
	   }
       
	}		
	
	function show_tree($cmd=null,$group=null,$treespaces='',$sp=0,$mode=0,$wordlength=19,$notheme=null,$stylesheet=null) {		
	   $cat = GetReq('cat'); //$this->replace_spchars(GetReq('cat'),1);
	   if (!$wordlength) $wordlength = 19;//for calldpc purposes
	   $mystylesheet = $stylesheet?$stylesheet:'group_category_title';	
	   $mystylesheet_selected = $mystylesheet . '_selected';   

	   static $cd = -1;
	      
	   $t = $cmd?$cmd:'shkategories';   
	   
	   $ptree = explode($this->cseparator,$cat); //print_r($ptree);
	   $depth = count($ptree)-1; //echo 'DEPTH:',$depth;  
	   $ddir = $this->read_tree($group);
 
	   $i=0;	 
       if ($ddir)  {	   
          reset($ddir);
          foreach ($ddir as $id => $line) {	
		    
		    if ($line) {
				
				$_id = $this->replace_spchars($id);
			
			    if (trim($group)!=null) {
			      $folder = $group . $this->cseparator . $id; 
			      $gr = $group . $this->cseparator . $_id;			   
			    }	
			    else {
			      $folder = $id;
			      $gr = $_id; 
			    }	
				

			 
			  $cgroup = $ptree[$cd+1]; 		 		
              $mycat = "$treespaces$this->outpoint <a href=\"" . seturl("t=$t&cat=$gr",null,null,null,null,true) . "\">";
			  $mycat .= summarize(($wordlength-$sp),$line);	
			  $mycat .= "</a>";
			  
			  $out .= $mycat . '<br>';

			  //if ($cgroup==$line) {
			  if (mb_strstr($cgroup,$_id)) {	  
			  	  $cd+=1;
				  if ($cd+1<$this->depthview) {//depth view param for hidden categories
				    $mysp=($cd+1) * 3;
				    $mytreespaces = str_repeat("&nbsp;",($cd+1)*3);	   
				    $out .= $this->show_tree($cmd,$folder,$mytreespaces,$mysp,$mode,$wordlength,$notheme);
				  }
			  }			  
			}//if line
			$i+=1;
		  }//foreach
	   }//if ddir	
	   
       return ($out); 			      
	}
	
	/*using accordion template*/
	function show_tree2($cmd=null,$group=null,$treespaces='',$sp=0,$mode=0,$wordlength=19,$notheme=null,$stylesheet=null,$template=null) {		
	   $cat = GetReq('cat'); //$this->replace_spchars(GetReq('cat'),1);
	   if (!$wordlength) $wordlength = 25;//for calldpc purposes
	   $mystylesheet = $stylesheet?$stylesheet:'group_category_title';	
	   $mystylesheet_selected = $mystylesheet . '_selected';	   
	   
       $tokens = array();
	   $template2 = 'fpkatnav-accordion-inner.htm';
	   $t2 = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template2) ;			 
	   $tmpl2_data = @file_get_contents($t2);  
	   
	   static $cd = -1;
	   	   
	   $t = $cmd?$cmd:'shkategories';	   
	   $ptree = explode($this->cseparator,$cat); 
	   $depth = count($ptree)-1;   
	   $ddir = $this->read_tree($group);
 
	   $i=0;	 
       if ($ddir)  {	   
          reset($ddir);
          foreach ($ddir as $id => $line) {	
		    
		    if ($line) {
				
				$_id = $this->replace_spchars($id);
			
			    if (trim($group)!=null) {
			      $folder = $group . $this->cseparator . $id; 
			      $gr = $this->replace_spchars($group) . $this->cseparator . $_id;		   
			    }	
			    else {
			      $folder = $id;
			      $gr = $_id;
			    }	
			  	
				//$gr = $current_leaf;		 
				$cgroup = $ptree[$cd+1]; 	 		

				$tokens[0] = $_id;
				$tokens[1] = summarize(($wordlength-$sp),$line);//accordion cat name
				$tokens[2] = null;//seturl("t=$t&cat=$gr",null,null,null,null,true); //url

				//if ($cgroup==$line) {
				if (mb_strstr($cgroup,$_id)) {
					$cd+=1;
					if ($cd+1<$this->depthview) {//depth view param for hidden categories
					    $subcat_tokens = $this->show_tree2($cmd,$folder,$mytreespaces,$mysp,$mode,$wordlength,$notheme,$mystylesheet,$template);
						$tokens[3] = 1;//isset($subcat_tokens) ? 1 : 0;//accordion expand-collapse
						$tokens[4] = isset($subcat_tokens) ? $this->combine_tokens($tmpl2_data,array('0'=>$_id,'1'=>$subcat_tokens)) : null;
						$tokens[5] = $group ? 1 : 0; //check for subtree
						$tokens[6] = seturl("t=$t&cat=$gr",null,null,null,null,true); 
						$out .= $this->combine_tokens($template,$tokens,true);
						unset($tokens);
						unset($subcat_tokens);
					}
				}//=group
				else {
				        $subcat_tokens = $mode ? $this->show_tree2($cmd,$folder,$mytreespaces,$mysp,$mode,$wordlength,$notheme,$mystylesheet,$template) : null;
				        $tokens[3] = $mode ? 1 : 0;//accordion no expland-colapse
						$tokens[4] =  isset($subcat_tokens) ? $this->combine_tokens($tmpl2_data,array('0'=>str_replace(' ','-',$line),'1'=>$subcat_tokens)) : null;
						$tokens[5] = $group ? 1 : 0; //check for subtree
						$tokens[6] = seturl("t=$t&cat=$gr",null,null,null,null,true); 
						
						if ($mode)
							$out .= $this->combine_tokens($template,$tokens,true);						
						else				   
							$out .= ($group) ? '<li>'.seturl("t=$t&cat=$gr",summarize(($wordlength-$sp),$line),null,null,null,true).'</li>' : null;										   					
						
						//print_r($tokens);	
						unset($tokens);
						unset($subcat_tokens);	
				}			  
			}//if line
			$i+=1;
		  }//foreach
	   }//if ddir	

       return ($out); 			      
	}	
	
	/*using accordion template version 3*/
	function show_tree3($cmd=null,$group=null,$treespaces='',$sp=0,$mode=0,$wordlength=19,$notheme=null,$stylesheet=null,$template=null) {		
	   $cat = GetReq('cat'); //$this->replace_spchars(GetReq('cat'),1);
	   if (!$wordlength) $wordlength = 25;//for calldpc purposes
	   $mystylesheet = $stylesheet?$stylesheet:'group_category_title';	
	   $mystylesheet_selected = $mystylesheet . '_selected';	   
	   
       $tokens = array();
	   $template2 = 'fpkatnav-accordion-inner.htm';
	   $t2 = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template2) ;			 
	   $tmpl2_data = @file_get_contents($t2);   
	   
	   static $cd = -1;

	   $t = $cmd ? $cmd : 'shkategories';	   
	   
	   $ptree = explode($this->cseparator,$cat); 
	   $depth = count($ptree)-1;  
	   $ddir = $this->read_tree($group);
 
	   $i=0;	 
       if ($ddir)  {   
          reset($ddir);
          foreach ($ddir as $id => $line) {	
		    
		    if ($line) {
				
				$_id = $this->replace_spchars($id);
			  
			    if (trim($group)!=null) {
			      $folder = $group . $this->cseparator . $id; 
			      $gr = $this->replace_spchars($group) . $this->cseparator . $_id;		   
			    }	
			    else {
			      $folder = $id;
			      $gr = $_id;
			    }	
						  		 
				$cgroup = $ptree[$cd+1]; 	 		

				$tokens[0] = $_id;//accordion id
				$tokens[1] = summarize(($wordlength-$sp),$line);//accordion cat name
				$tokens[2] = null;

				//if ($cgroup==$line) {
				if (mb_strstr($cgroup,$_id)) {	  
					$cd+=1;
					if ($cd+1<$this->depthview) {//depth view param for hidden categories
					    $subcat_tokens = $this->show_tree3($cmd,$folder,$mytreespaces,$mysp,$mode,$wordlength,$notheme,$mystylesheet,$template);
						$tokens[3] = 1;//isset($subcat_tokens) ? 1 : 0;//accordion expand-collapse
						$tokens[4] = isset($subcat_tokens) ? $this->combine_tokens($tmpl2_data,array('0'=>$_id,'1'=>$subcat_tokens)) : null;
						$tokens[5] = $group ? 1 : 0; //check for subtree
						$tokens[6] = seturl("t=$t&cat=$gr",null,null,null,null,true); //$gr; //current cat / link
						$out .= $this->combine_tokens($template,$tokens,true);
						unset($tokens);
						unset($subcat_tokens);

					}
				}//=group
				else {
				        $subcat_tokens = $mode ? $this->show_tree3($cmd,$folder,$mytreespaces,$mysp,$mode,$wordlength,$notheme,$mystylesheet,$template) : null;
				        $tokens[3] = $mode ? 1 : 0;//accordion no expland-colapse
						$tokens[4] =  isset($subcat_tokens) ? $this->combine_tokens($tmpl2_data,array('0'=>str_replace(' ','-',$line),'1'=>$subcat_tokens)) : null;
						$tokens[5] = $group ? 1 : 0; //check for subtree
						$tokens[6] = seturl("t=$t&cat=$gr",null,null,null,null,true); //$gr; //current cat / link
						
						if ($mode)
							$out .= $this->combine_tokens($template,$tokens,true);						
						else			   
							$out .= ($group) ? '<li>'.seturl("t=$t&cat=$gr",summarize(($wordlength-$sp),$line),null,null,null,true).'</li>' : null;										   					
						
						unset($tokens);
						unset($subcat_tokens);	
				}			  
			}//if line
			$i+=1;
		  }//foreach
		  
	   }//if ddir	

       return ($out); 			      
	}	
	
	
	//  SHOW SELECTED TREE FUNCTIONS
	function show_selected_branch($id,$line,$t=null,$myselcat=null,$expand=null,$stylesheet=null,$outpoint=null,$br=1,$template=null,$linkclass=null,$linksonly=null,$titlesonly=null,$idsonly=null) {
	       $mystylesheet = $stylesheet?$stylesheet:'group_category_title';	
	
           if ($template) { //template
	         $tmpl = explode('.',$template);
	         $mytemplate = $this->select_template($tmpl[0],$cat);		
	       }
	       else			   
  	         $mytemplate = $this->select_template('fpcatcolumn',$cat);			   
			  
		    if ($line) {	

			    if (trim($myselcat)!=null) {
			      $folder = $myselcat . $this->cseparator . $id; 
			      $gr = $this->replace_spchars($myselcat . $this->cseparator . $id);			   
			    }	
			    else {
			      $folder = $id;
			      $gr = $this->replace_spchars($id);
			    }	

			  if ($outpoint)
			    $mycat .= str_repeat('&nbsp;',$outpoint) . $this->outpoint;		  
              $mycat .= "<a href=\"" . seturl("t=$t&cat=$gr",null,null,null,null,true);
			  
			  if ($linkclass) 
			    $mycat .=  "\" class=\"$linkclass\">";
			  else 
			    $mycat .=  "\">";
				
			  $mycat .= $line;		
			  $mycat .= "</a>";	
		
			  $tokens[] = ($linksonly) ? seturl("t=$t&cat=$gr",null,null,null,null,true) :
				                        ($titlesonly ? $line : ($idsonly ? $id : $mycat));
			  $tokens[] = $id;//$winbody;
			  $out .= $this->combine_tokens($mytemplate, $tokens, true);					

			}//if  	 
		  
		return ($out);  
	}
	
    function show_selected_tree($cmd=null,$group=null,$showroot=null,$expand=null,$viewlevel=null,$stylesheet=null,$outpoint=null,$br=1,$template=null,$linkclass=null,$linksonly=null,$titlesonly=null,$idsonly=null) {
	  $mystylesheet = $stylesheet?$stylesheet:'group_category_title';	
      $myselcat = $group ? $group : GetReq('cat'); //$this->replace_spchars($group,1) : $this->replace_spchars(GetReq('cat'),1);	  

      static $cd = -1;
	  $wordlength = 19;//for calldpc purposes
	  $t = $cmd ? $cmd : 'klist';

	  $ptree = explode($this->cseparator,$myselcat); //print_r($ptree);
			  
	  if ($viewlevel) {
	    $depth = count($ptree);//-1 echo 'DEPTH:',$depth;
	    //echo $cat;    
		if ($depth>$viewlevel) {
		  foreach ($ptree as $p=>$pt) {
		    if ($p<$viewlevel) 
		      $pv[] = $pt;
		  }	
		  $myselcat = implode($this->cseparator,$pv);
		}
	  }
		    
	  if ($showroot) 
	    $ddir = $this->read_tree(null,null,1);
	  elseif ($myselcat) 	
	    $ddir = $this->read_tree($myselcat,null,1);	
		
	  $i=0;	 
      if ($ddir)  {	   
          reset($ddir);
          foreach ($ddir as $id => $line) {		  
            $out .= ($showroot) ? 
			        $this->show_selected_branch($id,$line,$t,null,$expand,$mystylesheet,$outpoint,$br,$template,$linkclass,$linksonly,$titlesonly,$idsonly):
					$this->show_selected_branch($id,$line,$t,$myselcat,$expand,$mystylesheet,$outpoint,$br,$template,$linkclass,$linksonly,$titlesonly,$idsonly);
			
			$i+=1; 
		  }//foreach				
	  }//if ddir
	  
	  return ($out);
    }	
	//.....  SHOW SELECTED TREE FUNCTIONS	
	
	
	function show_submenu($cmd=null,$viewtype=3,$group=null,$notheme=null, $rendertable=false) {
		$group = $group ? $group : GetReq('cat');//$this->replace_spchars(GetReq('cat'),1);	
	
		$result = $this->read_tree($group);	
		$out = $this->view_category($result,$viewtype,$mode,$group,$cmd); 
		
	    //table generation
	    if ($rendertable) {
	     if ($this->result_in_table) { 
			$categories = explode('<SPLIT/>',$out); //<li> split..
			$ret = $this->make_table($categories, $this->result_in_table, 'fptreetable');  	  
		 }
		 else
		    $ret = $out;
	    }
		
        return ($ret);				
	}	
	
    function show_menu($cmd=null,$viewtype=3,$viewtree=0,$group=null,$title=null,$tree=null,$template=null) { 
	    
		$group = $group ? $group : $this->replace_spchars(GetReq('cat'),1);	  				  
		
		if ($group) {
			
            $t = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template) ;
		   
	        $template1 = 'fpkatnav-accordion-group.htm';
	        $t1 = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template1) ;			 
			 
			switch ($viewtype) { 
				case 3  : /*experimental for unfolded kategories..*/
                case 2  : $stree[] = $this->show_tree3($cmd,null,'',0,1,60,1,null,@file_get_contents($t1));	break;	 			 
			    case 1  :
				default : $stree[] = $this->show_tree2($cmd,null,'',0,0,60,1,null,@file_get_contents($t1));		 
			}
			 
		    $mytemplate = file_get_contents($t);
            $out = $this->combine_tokens($mytemplate,$stree);			 
		}		
        return ($out);
    }			
	
	//read tree table
	function read_tree($g=null,$debug=null,$orderctg=null) {
       $db = GetGlobal('db');	
	   $lan = getlocal();
	   $mylan = $lan?$lan:'0'; 	   
	   $f = $mylan;   
	   $depth = 0;
	   
	   if (strlen(trim($g))>0) {
	     $group = explode($this->cseparator,$g);   //print_r($group);
	     $mg = count($group);
	     $depth = ($mg ? $mg : 0); //echo 'DEPTH:',$depth;
		 //if ($depth>3) return null; //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 		 
	   }

	   switch ($depth) {
	       case 1 : $sSQL = "select cat3,cat{$f}3,cat2,cat{$f}2 from categories where "; break;
		   case 2 : $sSQL = "select cat4,cat{$f}4,cat3,cat{$f}3,cat2,cat{$f}2 from categories where "; break;
		   case 3 : $sSQL = "select cat5,cat{$f}5,cat4,cat{$f}4,cat3,cat{$f}3,cat2,cat{$f}2 from categories where "; break;
		   case 4 : $sSQL = "select null from categories"; break;
		   default: $sSQL = "select cat2,cat{$f}2 from categories where "; break;
	   }
	   //$sSQL .= ' where '; 
	   switch ($depth) {
	       case 4 : 
	       case 3 : $sSQL .= "(cat4='" . $this->replace_spchars($group[2],1) . "' or cat{$f}4='" . $this->replace_spchars($group[2],1) . "') and ";
		   case 2 : $sSQL .= "(cat3='" . $this->replace_spchars($group[1],1) . "' or cat{$f}3='" . $this->replace_spchars($group[1],1) . "') and ";
		   case 1 : $sSQL .= "(cat2='" . $this->replace_spchars($group[0],1) . "' or cat{$f}2='" . $this->replace_spchars($group[0],1) . "') and "; //break;
		   default: $sSQL .= "ctgid>0 and active>0 and view>0";
	   } 	   
		 
	   $sSQL .= " order by ctgid"; /*ctgoutlnorder";//,ctgid asc"; ***************************/
		 
       if ($debug) echo $sSQL; 
	   
	   $result = $db->Execute($sSQL,2);
			   					   
	   if ($result) {      
		 foreach ($result as $i=>$rec) 
			if ($f = $rec[0]) $res[$f] = $rec[1]; 
  		   	
	     return ($this->distinct($res));
	   }

	}	

	function set_tree_path($array_path) {
	  
		$ret = null;
		$max = count($array_path);
		foreach ($array_path as $id=>$path) {
		  
		  if (trim($path)) {
		    if ($id==0) $ret .= $path; 
			       else $ret .= $this->cseparator . $path;
		  }    
		}
		
		return $ret;
	}	
	
    function isparent($group=null) {
	   
	    if ($this->alias) $group = $this->alias; 

		if (is_array($this->read_tree($group))) 
		  return true;

		return false;
	}			
	
    //get depth of group	
    function get_treedepth($group=null) {  
	
	    if (!$group) $group = GetReq('cat');
		$selection = GetReq('sel');
	
        $splitx = explode ($this->cseparator, $group);
		
	    if ($selection!=array_pop($splitx)) 
		    $cats = explode ($this->cseparator, $group.$this->cseparator.$selection);
		else
		    $cats = explode ($this->cseparator, $group);
		         

        return (count($cats)-1);
    }		
	
    function analyzedir($group,$startup=0,$isroot=false) {
	
	    //if executed at event...
		if (($this->cat_result) && ($isroot==false))
		    return ($this->cat_result);

        $sel = GetReq('sel');
	    $db = GetGlobal('db');	
	    $lan = getlocal();
	    $f = $lan?$lan:'0';			
		

        $adir = array();
		
	    if ($isroot) {
			$depth = 1;			
			$sSQL = "select distinct cat2,cat{$f}2 from categories where ";
			$sSQL .= "(ctgid>0 and active>0 and view>0) order by ctgid";
			//$sSQL .= "ctgid>0 order by ctgid";
			$result = $db->Execute($sSQL,2);
			
			if ($result) { 
				foreach ($result as $i=>$rec) {
					 $adir[$rec[0]] = $rec[1];
				}
				$ret_adir = $adir;
			}
		}
        else {
		    if ($startup) 
				$adir[] = $this->home; //set home
	  
			$splitx = explode ($this->cseparator, $group);   
		
		    $sSQL = "select distinct cat2,cat{$f}2,cat3,cat{$f}3,cat4,cat{$f}4,cat5,cat{$f}5 from categories where ";
			$depth = count($splitx)-1;
			switch ($depth) {
			  case 3  :$sSQL .= "cat5=\"".$this->replace_spchars($splitx[3],1)."\" and ";
			  case 2  :$sSQL .= "cat4=\"".$this->replace_spchars($splitx[2],1)."\" and ";
			  case 1  :$sSQL .= "cat3=\"".$this->replace_spchars($splitx[1],1)."\" and ";
			  case 0  :$sSQL .= "cat2=\"".$this->replace_spchars($splitx[0],1)."\""; 
			  default :
			}
			$sSQL .= " and (ctgid>0 and active>0 and view>0) order by ctgid";
			//$sSQL .= "ctgid>0 order by ctgid";
			$result = $db->Execute($sSQL,2);
			
			if ($result) {     
				for ($i=0;$i<=$depth;$i++) {
					$c = $i+2;
					if ($result->fields["cat{$f}{$c}"])
						$adir[$result->fields["cat{$c}"]] = $result->fields["cat{$f}{$c}"];			 
				} 
			}			  					

		
			//save as var for tags
			$this->cat_result = $adir;
			
			//depthview restiction	
			if ($this->depthview) {	
				$depthview = $this->depthview+$startup;
				$i=0;
				foreach ($adir as $a=>$b) {
					if ($i<$depthview) {
						$ret_adir[$a] = $b;
					}
					$i+=1;
				}	
			}  
			else
				$ret_adir = $adir;  				
		}	  
        
        //return ($adir);
		return ($ret_adir);
    }
	
    function view_analyzedir($cmd=null,$prefix=null,$startup=0,$nolinks=null,$isroot=false) { 	
		$t = ($cmd?$cmd:GetReq('t'));	
		$g = $this->replace_spchars(GetReq('cat'));
		$a = GetReq('a');	   	
		
		if ($prefix) 
          $mytokens[] = $prefix;

		//analyze dir		
        $adirs = $this->analyzedir($g,$startup, $isroot);	

        if (!empty($adirs)) {			
		
		    //startup meters
		    $max = count($adirs)-1; 
		    if ($startup) $m = 1;
		             else $m = 0;		
			$m2 = 0;		 	
		    foreach ($adirs as $id=>$cname) {	
			  if ($isroot) $curl = null; //reset
		      $locname = $cname;	
			  
    		  if ($m2<=$max) { //< .......... link last element 
			  
			    if ($m2==$max)
			      $title = "<b>$locname</b>";
				else  
				  $title = "$locname";			  
			  
                if ($cname != $this->home) {
				
		          if (($m2>$m)&&(!$isroot)) 
					  $curl .= $this->cseparator . $this->replace_spchars($id);
			      else 
					  $curl .= $this->replace_spchars($id);
					  
			      $mygroup = $curl;
			   
			      $a = seturl("t=$t&cat=$mygroup",null,null,null,null,true);
				  $b = "<a href=\"" . seturl("t=$t&cat=$mygroup",null,null,null,null,true) . "\">" . $locname . "</a>";
		        }	
	            else {
   	              $a = seturl("t=",null,null,null,null,true);
				  $b = "<a href=\"" . seturl("t=",null,null,null,null,true) . "\">" . $locname . "</a>";					
			    }
				
			    $ablink = ($nolinks) ? $a : $b;						  
				$mytokens[] = ($nolinks) ? $ablink.'@'.$locname.'@'.$mygroup : $ablink;				      
	
			  }	
		      else 
				$mytokens[] = $locname;				   
	  	
			  $m2+=1;	 
			}//foreach  
 
		}//adirs
		//echo '<pre>';
		//print_r($mytokens);
		//echo '</pre>';
		return ($mytokens);
    }	
	
	function getcurrentkategory($toplevel=null, $url=null) {
	  $g = $this->replace_spchars(GetReq('cat'));	
      $mycattree = $this->analyzedir($g);	
		
	  if (empty($mycattree)) return;
	  
	  if ($toplevel) {
	    switch ($toplevel) {
		  case 2  ://prevlevel
		           $dummy = array_pop($mycattree);
				   if (!$ret = array_pop($mycattree)) 	  
				     $ret = $dummy;	 
		           break;
          case 1  ://toplevel
		  default :if ($url) 
		              $ret = seturl('t=klist&cat='. GetReq('cat'),array_pop($mycattree),null,null,null,true);
                   else 
		              $ret = array_pop(array_reverse($mycattree));	  
		}
	  }	
	  else {//actual
	    if ($url) 
		  $ret = seturl('t=klist&cat='. GetReq('cat'),array_pop($mycattree),null,null,null,true);
        else	  
	      $ret = array_pop($mycattree);	  	
	  }
  
	  return ($ret);
	}	
	
    function tree_navigation($cmd=null,$prefix=null,$home=0,$dropdown_tmpl=null) {
	   $template = 'fpkatnav.htm';	   
	   $t = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template) ; 
	   $template1 = 'fpkatnav-element.htm';

		  $mytemplate = @file_get_contents($t);
		
	      //dropdown 2nd template
	      $t2 = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$dropdown_tmpl) ; 
          if (($dropdown_tmpl) && is_readable($t2)) {
		  
		  	$navdata = $this->view_analyzedir($cmd,$prefix,null,1);
			//print_r ($navdata);
			if (empty($navdata)) { //no dropdown
				//....
			}			
			else { // dropdown
			    //$mytemplate1 = file_get_contents($t1);
				$mytemplate2 = @file_get_contents($t2);
			
				foreach ($navdata as $n=>$data) {
					$tdata = explode('@',$data); 
					$tok[] = $tdata[0]; //url
					$tok[] = $tdata[1]; //title
					$tok[] = $tdata[2];
					$tok[] = ($n==count($navdata)-1) ? 1 : 0; 
					$navdata2[] = $this->combine_tokens($mytemplate2,$tok,true);
					unset($tok);
				}  
			  
				$out = $this->combine_tokens($mytemplate,$navdata2);
			}
          }
          else	{	  
		    $navdata = $this->view_analyzedir($cmd,$prefix,$home);
			$out = $this->combine_tokens($mytemplate,$navdata);
		  }	
		  
		  
		return ($out);
    }
	
	function tree_root_navigation($cmd=null,$prefix=null,$home=0,$dropdown_tmpl=null) {
	   $template = 'fpkatnav.htm';	   
	   $t = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template) ; 
	   $template1 = 'fpkatnav-element.htm';
       $mytemplate = @file_get_contents($t);
		
	      //dropdown 2nd template
	      $t2 = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$dropdown_tmpl) ; 
          if (($dropdown_tmpl) && is_readable($t2)) {
		  
		  	$navdata = $this->view_analyzedir($cmd,$prefix,null,null,true);
			$x = count($navdata)-1;   
			// dropdown
			//$mytemplate1 = file_get_contents($t1);
			$mytemplate2 = @file_get_contents($t2);
 
			foreach ($navdata as $n=>$data) {
				$tdata = explode('@',$data); 
				$tok[] = $tdata[0]; //url
				$tok[] = $tdata[1]; //title
				$tok[] = $tdata[2];
				//$tok[] = ($n==$x) ? 1 : 0; 
				$navdata2[] = $this->combine_tokens($mytemplate2,$tok,true);
				unset($tok);
				unset($tdata);
			}  
			//print_r($navdata2);  
			$out = $this->combine_tokens($mytemplate,array(0=>implode('',$navdata2)), true);

          }
          else	{	  
		    $navdata = $this->view_analyzedir($cmd,$prefix,$home);
			$out = $this->combine_tokens($mytemplate,$navdata);
		  }	
		  
		  
		return ($out);
    }		
		
	function distinct($arr) {
	  
	   if (is_array($arr)) {
	     $out = array_unique($arr);
		 
		 asort($out);
		 
		 return ($out);
	   }	 
	}
	
    function getgroup($localize=0) {
	
	    $group = GetReq("g");   

		$ret_a = explode($this->cseparator,$group);
		$max = count($ret_a)-1;
		

		  if (($clanguage=getlocal())!=$this->deflan)
		    $localizeit = localize($ret_a[$max],$clanguage);
		  else  
		    $localizeit = $ret_a[$max];			
		
		  return ($localizeit);	 
	
	}
	
    function getkategories($rec=null,$links=null,$lan=null,$cmd=null, $debug=false) {
	   $db = GetGlobal('db');
	   $cmd = $cmd?$cmd:'shkategories';
	   
		    $sSQL = "select distinct cat2,cat{$f}2,cat3,cat{$f}3,cat4,cat{$f}4,cat5,cat{$f}5 from categories where ";

			if (($rec['cat0']) && ($this->depthview>=1)) $sSQL .= "cat2='".$this->replace_spchars($rec['cat0'])."'"; 
			if (($rec['cat1']) && ($this->depthview>=2)) $sSQL .= "and cat3='".$this->replace_spchars($rec['cat1'])."'";
			if (($rec['cat2']) && ($this->depthview>=3)) $sSQL .= "and cat4='".$this->replace_spchars($rec['cat2'])."'";
			if (($rec['cat3']) && ($this->depthview>=4)) $sSQL .= "and cat5='".$this->replace_spchars($rec['cat3'])."'";			  			  			  

	        $result = $db->Execute($sSQL,2);	
	  					
		
		if ($lan) {
		  $_cat0 = $result->fields["cat{$f}2"]?$result->fields["cat{$f}2"]:$this->replace_spchars($rec['cat0']);
		  $_cat1 = $result->fields["cat{$f}3"]?$result->fields["cat{$f}3"]:$this->replace_spchars($rec['cat1']);
		  $_cat2 = $result->fields["cat{$f}4"]?$result->fields["cat{$f}4"]:$this->replace_spchars($rec['cat2']);
		  $_cat3 = $result->fields["cat{$f}5"]?$result->fields["cat{$f}5"]:$this->replace_spchars($rec['cat3']);
		}
		else {
		  $_cat0 = $result->fields["cat2"]?$result->fields["cat2"]:$this->replace_spchars($rec['cat0']);
		  $_cat1 = $result->fields["cat3"]?$result->fields["cat3"]:$this->replace_spchars($rec['cat1']);
		  $_cat2 = $result->fields["cat4"]?$result->fields["cat4"]:$this->replace_spchars($rec['cat2']);
		  $_cat3 = $result->fields["cat5"]?$result->fields["cat5"]:$this->replace_spchars($rec['cat3']);		
		}
								

                 if (($rec['cat0']) && ($this->depthview>=1)) {
				      if ($links)
					    $ck[0] = seturl("t=$cmd&cat=".$rec['cat0'],$_cat0,null,null,null,true);
					  else
                        $ck[0] = $_cat0;
				 }  	
				 	
                 if (($rec['cat1']) && ($this->depthview>=2)) {
				      if ($links)
					    $ck[1] = seturl("t=$cmd&cat=".$rec['cat0'].$this->cseparator.$rec['cat1'],$_cat1,null,null,null,true);
					  else				   
                        $ck[1] = $_cat1;
				 }		

                 if (($rec['cat2']) && ($this->depthview>=3)) {
				      if ($links)
					    $ck[2] = seturl("t=$cmd&cat=".$rec['cat0'].$this->cseparator.$rec['cat1'].$this->cseparator.$rec['cat2'],$_cat2,null,null,null,true);
					  else					 
                        $ck[2] = $_cat2;
				 }		  
 
                 if (($rec['cat3']) && ($this->depthview>=4)) {
				    if ($links)
					  $ck[3] = seturl("t=$cmd&cat=".$rec['cat0'].$this->cseparator.$rec['cat1'].$this->cseparator.$rec['cat2'].$this->cseparator.$rec['cat3'],$_cat3,null,null,null,true);
					else				 
                      $ck[3] = $_cat3;
				 }	
				   
                 if (($rec['cat4']) && ($this->depthview>=5)) {
				    if ($links)
					  $ck[4] = seturl("t=$cmd&cat=".$rec['cat0'].$this->cseparator.$rec['cat1'].$this->cseparator.$rec['cat2'].$this->cseparator.$rec['cat3'].$this->cseparator.$rec['cat4'],$this->replace_spchars($rec['cat4']),null,null,null,true);
					else				 
                      $ck[4] = $this->replace_spchars($rec['cat4']);
				 }	
				  	  	
                 if (!empty($ck))
                   $cat = implode($this->cseparator,$ck);//print_r($ck);
                 unset($ck); //reset ck

                 return ($cat);
    }	
	
	function search_tree($text2find=null,$cmd='shkategories',$template=null) {
       $db = GetGlobal('db');			
	   $cat2findin = GetReq('cat');
	   $meter=0;	
	   $viewtype=1;
	   $lan = getlocal();   
	   $mylan = $lan?$lan:'0';   
	   $f = $mylan; 
 	   
		 
	   if (!$text2find) return;	 
	
	   for($i=2;$i<=5;$i++) {
	   
         $sSQL = 'select ';   
		 
		   switch ($i) {
		     case 2 : $sSQL .= "cat2,cat{$f}2"; break;
		     case 3 : $sSQL .= "cat2,cat{$f}2,cat3,cat{$f}3"; break;
		     case 4 : $sSQL .= "cat2,cat{$f}2,cat3,cat{$f}3,cat4,cat{$f}4"; break;
		     case 4 : $sSQL .= "cat2,cat{$f}2,cat3,cat{$f}3,cat4,cat{$f}4,cat5,cat{$f}5"; break;		   
		   }

		 $sSQL.= ' from categories where ';
	     $sSQL.= "(cat{$f}$i like ". $db->qstr('%'.strtolower($text2find).'%') . ' or ' . "cat{$f}$i like ". $db->qstr('%'.strtoupper($text2find).'%');		   
         $sSQL .= ") and ctgid>0 and active>0 and view>0 and search>0";		 	 
	     $result = $db->Execute($sSQL,2);	
	   					   					   
	     if ($result) {      
         
	     while(!$result->EOF) {
		 
		   switch ($i) {
		     case 2 : $of = $result->fields['cat2']; $of2 = $result->fields["cat{$f}2"]; 
					  $dp = 0;
					  break;
		     case 3 : $of = $result->fields['cat3']; $of2 = $result->fields["cat{$f}3"]; 
			          if (($this->depthview) && ($this->depthview>=1)) 
					    if ($result->fields['cat2']) $group = $result->fields['cat2']; 	
					  else
					    $group = $result->fields['cat2']; 	
					  $dp = 1;
					  break;
		     case 4 : $of = $result->fields['cat4']; $of2 = $result->fields["cat{$f}4"]; 
			          if (($this->depthview) && ($this->depthview>=1)) {
					    if ($result->fields['cat2']) $group = $result->fields['cat2'];
					    $group.= (($result->fields['cat3']) && ($this->depthview>=2)) ? $this->cseparator . $result->fields['cat3'] : null; 
					  }
					  else
					    $group = $result->fields['cat2'] . $this->cseparator . $result->fields['cat3'];
					  $dp = 2;	
			          break;
		     case 5 : $of = $result->fields['cat5']; $of2 = $result->fields["cat{$f}5"]; 
			          if (($this->depthview) && ($this->depthview>=1)) {
					    if ($result->fields['cat2']) $group = $result->fields['cat2'];
					    $group.= (($result->fields['cat3']) && ($this->depthview>=2)) ? $this->cseparator . $result->fields['cat3'] : null; 
					    $group.= (($result->fields['cat4']) && ($this->depthview>=3)) ? $this->cseparator . $result->fields['cat4'] : null; 					  
					  }
					  else	
					    $group = $result->fields['cat2'] . $this->cseparator . $result->fields['cat3'] . $this->cseparator . $result->fields['cat4'];
					  $dp = 3;						
			          break;		   		   		   
		   }		 

		   if ($of) {
			   $res[$of] = $of2; 
			 if ($group) $gr[$of] = $group;
			 if ($dp) $dpp[$of] = $dp;

			 $hostcat  = $result->fields["cat{$f}2"]?$result->fields["cat{$f}2"].$this->bullet:null;
			 $hostcat .= $result->fields["cat{$f}3"]?$result->fields["cat{$f}3"].$this->bullet:null;
			 $hostcat .= $result->fields["cat{$f}4"]?$result->fields["cat{$f}4"].$this->bullet:null;
			 
			 $hcat[] = $hostcat;		   
			 
		   }
		   		   
		   $result->MoveNext();

	     }//while

	     if ($this->usetablelocales) 		 
           $data = $this->view_category($res,$viewtype,$mode,null,$cmd,null,$gr,$dpp,$template);
		 else
		   $data = $this->view_category($res,$viewtype,$mode,$group,$cmd,null,$gr,$dpp,$template);
   		 
		 if ($data) {

		   $mret[] = $data;
		   $meter+=1;
		 }
		 
		 unset($res); unset($result); unset($exists);
	     }//result
		 	   
	   }//for !!!!!!
	   
	   if (is_array($mret)) {
	     foreach ($mret as $i=>$d)
	       $ret .= $d;		 
	   }	   
	   
	   //table generation
	   if ($ret) {
	     if ($this->result_in_table) { 
			$categories = explode('<SPLIT/>',$ret); //<li> split..
			$out = $this->make_table($categories, $this->result_in_table, 'fptreetable');  	  
		 }
		 else
		    $out = $ret;
	   }
       return ($out);	   
	}
	

	//called by getCombo, getKategoryCombo without select
	function js_make_search_url($id=null) {
	    $id_element= $id ? $id : 'input';
		$out = "	
function gocatsearch(url)
{
  //alert('url:'+url);
  var ret = url+'&input='+document.getElementById('$id_element').value;
  window.location.href = ret;
}
";

      return ($out);	
	}	
	
	function getCombo ($cid,$name,$cat=null,$style="",$size=10,$multiple="",$values=null,$selection='',$cmd=null,$tmpl=null,$noselect=null) {
	    $t = GetReq('t');
		$mycmd = $cmd?$cmd:'klist';
		$goto = seturl("t=$mycmd&cat=");
		$selected_cat = $cat?$cat:GetReq('cat');
		$cats = explode($this->cseparator,$selected_cat);
	    //print_r($values);
		
		$template = $this->select_template($tmpl);
		//echo $tmpl,'>',$template;
		
		$r = "";
		$select = "<select name=\"".$name."\" class=\"".$style."\"".( $size != 0 ? "size=\"".$size."\"" : "");		
		$select .= ($cmd) ? " onChange=\"location=this.options[this.selectedIndex].value+'&input='+get_sinput()+'&searchtype='+get_stype()+'&searchcase='+get_scase()\"" : 
	                        " onChange=\"location=this.options[this.selectedIndex].value\""; 
		$select .= ">";
		if ($template) 
			$tokens[] = ($noselect) ? null : $select;		
		else
            $r = ($noselect) ? null : $select;		
			  
		if (!empty($values)) {
          //no head title when noselect		
		  if ($template) {
		    $option_tokens[] = null; 
			$option_tokens[] = $name;
			$option_tokens[] = 0;
			$options[] = ($noselect) ? null : $this->combine_tokens($template, $option_tokens);
            unset($option_tokens);		
		  }	
          else		  
			$r .= ($noselect) ? null : "<option value=''>---$name---</option>";
		  
		  while (list ($value, $title) = each ($values)) {
		  
		    if ($selected_cat) {
			  switch ($cid) {
			    case 1 : $myvalue = $goto . $value; break;
			    case 2 : $myvalue = $goto . $cats[0] . $this->cseparator . $value; break;
			    case 3 : $myvalue = $goto . $cats[0] . $this->cseparator . $cats[1] . $this->cseparator . $value; break;
			    case 4 : $myvalue = $goto . $cats[0] . $this->cseparator . $cats[1] . $this->cseparator . $cats[2] . $this->cseparator .$value; break;
			    case 5 : $myvalue = $goto . $cats[0] . $this->cseparator . $cats[1] . $this->cseparator . $cats[2] . $this->cseparator . $cats[3] .$this->cseparator. $value; break;
				default: $myvalue = $goto . $selected_cat . $this->cseparator . $value;
			  }
			}  
			else
			  $myvalue = $goto . $value;
			  
		    $loctitle = localize($title,getlocal());
			
			if ($template) {
				$option_tokens[] = ($noselect) ? "javascript:gocatsearch('$myvalue')" : $myvalue; 
				$option_tokens[] = $loctitle;
				$option_tokens[] = ($value == $selection ? 1 : 0);
				$options[] = $this->combine_tokens($template, $option_tokens);
				unset($option_tokens);		
			}	
			else				
				$r .= "<option value=\"$myvalue\"".($value == $selection ? " selected" : "").">$loctitle</option>";
		  }	
	    }

        if ($template) {
            $tokens[] = (!empty($options)) ? implode('',$options) : null;
			$tokens[] = ($noselect) ? null : "</select>";
			$ret = implode('',$tokens);
			//echo $ret;
			return ($ret);
		}
		else {
			$r .= ($noselect) ? null : "</select>";
			return $r;
		}	
	}
	
	function asksql($cat,$presel=null) {
       $db = GetGlobal('db');	
	   $selcat = GetReq('cat');
	   $lan = getlocal();
	   $mylan = $lan?$lan:'0';	   
	   	
	     
  	       $f = $mylan; 		
		   $mylancat = substr($cat,0,3). $f . substr($cat,-1); //echo $mylancat;
           $sSQL = "select $cat,$mylancat from categories where ctgid>0 and active>0 and view>0 and search>0";

		 
		 if ($presel) 
		   $sSQL .= ' and ' . $presel;

	     $result = $db->Execute($sSQL,2);	   	
	     if ($result) {      

	       while(!$result->EOF) {
		   
		       $f = $result->fields[0];
		       $ff = $result->fields[1];			   
		       if ($f) { 
			     if ($ff)
		           $data[$f] = $ff;
				 else
				   $data[$f] = $f;
			   }	 

		     $result->MoveNext();
		     $i+=1;
	       }   	
	       $mydata =  $this->distinct($data);
	     }	 

	     return ($mydata);
	}		
	
	function show_combo_results($title=null,$preselcat=null,$isleaf=null,$issearch=null) {
       $db = GetGlobal('db');	
	   $s1 = GetReq('s1');
	   $s2 = GetReq('s2');
	   $s3 = GetReq('s3');
	   $s4 = GetReq('s4');    
	   if ($issearch) {
	     $search_cmd = $issearch;
	   }
	   $cmd = $issearch?$search_cmd:'klist';
	   
	   $loctitle = localize($title,getlocal());
	   $mytitle = $loctitle?$loctitle:$this->title;
	   if ($isleaf)
	     $mytitle2 = $loctitle?$loctitle:$this->title2;
	   else
	     $mytitle2 = $this->title2;	 
	   
	   $cat = $preselcat?$preselcat:GetReq('cat');
	   $goto = $preselcat?seturl("t=$cmd&cat=".$preselcat):seturl("t=$cmd&cat=");	   
	   
	   $mydata = $this->asksql('cat2');
	   
	     $ret = "<form name=\"jumpy\">";
	   
	   if ($cat) {
	     $mycat = explode($this->cseparator,$cat);
		 //print_r($mycat);
	     
         if (!$isleaf) //dont show main combo when leaf (last cat)
		   $ret .= $this->getCombo(1,$mytitle,$cat,'myf_select',null,null,$mydata,$mycat[0],$search_cmd).'<br>';   	   
		 
	     if ($dv = $this->depthview) 	{
		   //echo $dv,'a';
		   if (($mycat[0])&&($dv>=2)) {
		   $mydata2 = $this->asksql('cat3',"cat2='$mycat[0]'");
		     if (!empty($mydata2))
		       $ret .= $this->getCombo(2,$mytitle2,$cat,'myf_select',null,null,$mydata2,$mycat[1],$search_cmd).'<br>';   	   
		     if (($mycat[1])&&($dv>=3)) {
		       $mydata3 = $this->asksql('cat4',"cat3='$mycat[1]' and cat2='$mycat[0]'");
			   if (!empty($mydata3))
		         $ret .= $this->getCombo(3,$mytitle2,$cat,'myf_select',null,null,$mydata3,$mycat[2],$search_cmd).'<br>'; 
		       if (($mycat[2])&&($dv>=4)) {
		         $mydata4 = $this->asksql('cat5',"cat4='$mycat[2]' and cat3='$mycat[1]' and cat2=$mycat[0]");
			     if (!empty($mydata4))
		           $ret .= $this->getCombo(4,$mytitle2,$cat,'myf_select',null,null,$mydata4,$mycat[3],$search_cmd); 		 		 
		       }
		     }
		   }		    		 
		 }
		 else {
		   if ($mycat[0]) {
		     $mydata2 = $this->asksql('cat3',"cat2='$mycat[0]'");
		     if (!empty($mydata2))
		       $ret .= $this->getCombo(2,$mytitle2,$cat,'myf_select',null,null,$mydata2,$mycat[1],$search_cmd).'<br>';   	   
		     if ($mycat[1]) {
		       $mydata3 = $this->asksql('cat4',"cat3='$mycat[1]' and cat2='$mycat[0]'");
			   if (!empty($mydata3))
		         $ret .= $this->getCombo(3,$mytitle2,$cat,'myf_select',null,null,$mydata3,$mycat[2],$search_cmd).'<br>'; 
		       if ($mycat[2]) {
		         $mydata4 = $this->asksql('cat5',"cat4='$mycat[2]' and cat3='$mycat[1]' and cat2=$mycat[0]");
			     if (!empty($mydata4))
		           $ret .= $this->getCombo(4,$mytitle2,$cat,'myf_select',null,null,$mydata4,$mycat[3],$search_cmd); 		 		 
		       }
		     }
		   }
		 }//depthview
	   }
	   else {	   
	     $ret .= $this->getCombo(1,$mytitle,$cat,'myf_select',null,null,$mydata,'',$search_cmd).'<br>';   
	     /*$ret .= $this->getCombo(2,'b','',null,null,null,'').'<br>'; 
	     $ret .= $this->getCombo(3,'c','',null,null,null,'').'<br>'; 
	     $ret .= $this->getCombo(4,'d','',null,null,null,'');*/
	   }
	   
	   $ret .= "</form>";
	   
	   return ($ret);
	}
  	
	public function getKategoryCombo($root,$name,$preselcat=null,$style="",$size=10,$multiple="",$values=null,$selection='',$cmd=null,$tmpl=null,$noselect=null) {
	   $search_cmd = $cmd ? $cmd : 'klist';
       $mytitle = $name ? $name : $this->title;	   
	   $cat = $preselcat ? $preselcat : GetReq('cat');
	   
	   if ($root) {/*always return default main categories*/
	      $mydata = $this->asksql("cat2");
	      $ret = $this->getCombo(1,$mytitle,$cat,'myf_select',null,null,$mydata,$mycat[0],$search_cmd,$tmpl,$noselect);   	   	
		  return ($ret);
	   }	   
	   
	   if ($cat) {
		$mycat = explode($this->cseparator,$cat);
	   
		foreach ($mycat as $m=>$mcat) {
		  if ($m<=count(mycat))
			$mcatpresel[] = "cat".($m+2)."='". $mycat[$m]."'"; 
		}  
		$ps = (!empty($mcatpresel)) ? implode(' and ',$mcatpresel) : null;	  
	   }	
	   
	   $mydata = $this->asksql("cat".(count($mycat)+2), $ps);
       $ret = $this->getCombo(count($mycat)+1,$mytitle,$cat,'myf_select',null,null,$mydata,$mycat[0],$search_cmd,$tmpl,$noselect);   	   	
	   
	   if ($ret==null) {
	      $mydata = $this->asksql("cat2");
	      $ret = $this->getCombo(1,$mytitle,$cat,'myf_select',null,null,$mydata,$mycat[0],$search_cmd,$tmpl,$noselect);   	   	
	   }	  
	   return ($ret);
	}
	
	//phpdac func
	//fetch names of categories based on proposal field (resources) - updated by rcitemrel (relatives)
	public function show_item_categories($rs, $template) {
		$db = GetGlobal('db');
		$id = GetReq('id');
		$lan = getlocal();   
	    $f = $lan ? $lan : '0';
		
		$fpath = $this->urlpath . '/' . $this->showcatimagepath;
		$tdata = $this->select_template($template,null,true); //echo $tdata,'>',$template;

		if ($rs) {
			$rscats = explode(',',$rs);
			$sSQL = "select cat2,cat{$f}2,cat3,cat{$f}3,cat4,cat{$f}4,cat5,cat{$f}5 from categories where ctgid in (" . $rs . ")";
			//echo $sSQL;
		    $res = $db->Execute($sSQL,2);
			foreach ($res as $i=>$rec) {
				$icat = array();
				if ($rec['cat2']) $icat[] = $rec['cat2'];
				if ($rec['cat3']) $icat[] = $rec['cat3'];
				if ($rec['cat4']) $icat[] = $rec['cat4'];
				if ($rec['cat5']) $icat[] = $rec['cat5'];
				$id = str_replace(' ', '_', implode($this->cseparator, $icat));
				$link = 'klist/' . $id .'/';
				$tcat = array();
				if ($rec["cat{$f}2"]) $tcat[] = $rec["cat{$f}2"];
				if ($rec["cat{$f}3"]) $tcat[] = $rec["cat{$f}3"];
				if ($rec["cat{$f}4"]) $tcat[] = $rec["cat{$f}4"];
				if ($rec["cat{$f}5"]) $tcat[] = $rec["cat{$f}5"];
				$title = implode($this->cseparator, $tcat);				
				if ($title) {
					$tokens[] = "<a href='$link'>$title</a>";
					$tokens[] = $link;	
					$tokens[] = is_readable($fpath . $id . $this->restype) ? 
					            $this->showcatimagepath . $this->encode_image_id($id) . $this->restype : null;
					$ret .= $this->combine_tokens($tdata, $tokens);
					unset($tokens);
				}	
			}			
			return ($ret);			
		}
		return false;
	}	
	
	//tokens method	
	function combine_tokens($template_contents,$tokens, $execafter=null) {
	
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
		for ($x=$i;$x<40;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);
		//echo $ret;
		
		//execute after replace tokens
		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $retout = $fp->process_commands($ret);
		  unset ($fp);
          
		  return ($retout);
		}		
		
		return ($ret);
	}
	
	//n tokens method
	function combine_n_tokens($template_contents,$tokens,$tokens2=null) {
	    if (!is_array($tokens)) return;
		
		if (defined('FRONTHTMLPAGE_DPC')) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template_contents;
		  
	    foreach ($tokens as $i=>$tok) {
			$n = str_replace('$N$',$tok,$ret);
			if (is_array($tokens2[$i])) {//mix combination
			   $nret .= $this->combine_tokens($n, $tokens2[$i]);
			}
			else
		      $nret .= $n;
	    }
		return ($nret);
	} 
	
	function select_template($tfile=null,$cat=null,$hasfileextension=null) {
	  $mytemplate = null;
	  
	  if (!$tfile) return;
	  
	  if ($hasfileextension)
	    $ext = null;
	  else
	    $ext = '.htm';
	  
	  if ($cat) {
	   $pcats = explode($this->cseparator,$cat);
	   
	   //template per category..search subcats..
	   foreach ($pcats as $c) {
         $ctemplate = $c.'@'.$tfile.$ext;
		 $ct = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$ctemplate) ;
		 if (is_readable($ct)) {
		   $mytemplate = file_get_contents($ct);
		   return ($mytemplate);
		 }  
	   }
	   
	  } 

	  $template = $tfile . $ext;	
	  $t = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$template) ; 
      $mytemplate = @file_get_contents($t);
	   	 
	  return ($mytemplate);	 
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
	
	function replace_spchars($string, $reverse=false) {
		
	  switch ($this->replacepolicy) {	
	
	    case '_' : $ret = $reverse ?  str_replace('_',' ',$string) : str_replace(' ','_',$string); break;
		case '-' : $ret = $reverse ?  str_replace('-',' ',$string) : str_replace(' ','-',$string);break;
	    default :
	    if ($reverse) {
			$g1 = array("'",'"','+','/',' ',' & ');
			$g2 = array('_',"*","plus",":",'-',' n ');		  
			$ret = str_replace($g2,$g1,$string);
	    }	 
	    else {
			$g1 = array("'",'"','+','/',' ','-&-');
			$g2 = array('_',"*","plus",":",'-','-n-');		  
			$ret = str_replace($g1,$g2,$string);
		}	
	  }
	  return ($ret);
	}	
	
};
}
?>