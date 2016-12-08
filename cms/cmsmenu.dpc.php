<?php
$__DPCSEC['CMSMENU_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CMSMENU_DPC")) && (seclevel('CMSMENU_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CMSMENU_DPC",true);

$__DPC['CMSMENU_DPC'] = 'cmsmenu';

$__EVENTS['CMSMENU_DPC'][1]='cmsmenu';
$__EVENTS['CMSMENU_DPC'][2]='menu';
$__EVENTS['CMSMENU_DPC'][3]='menu1';

$__ACTIONS['CMSMENU_DPC'][1]='cmsmenu';
$__ACTIONS['CMSMENU_DPC'][2]='menu';
$__ACTIONS['CMSMENU_DPC'][3]='menu1';

$__LOCALE['CMSMENU_DPC'][0]='CMSMENU_DPC;Menu;Menu';	   
	   
class cmsmenu {

	var $path, $urlpath, $inpath, $menufile;
	var $delimiter;
   
	var $tmpl_path, $tmpl_name;
	var $dropdown_class, $dropdown_class2;   
	
	public function __construct() {
		$UserName = GetGlobal('UserName');	
		$UserSecID = GetGlobal('UserSecID');
		$UserID = GetGlobal('UserID');		
		$this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);
		$this->username = decode($UserName);
		$this->userid = decode($UserID);
	   
		$this->path = paramload('SHELL','prpath');	   
		$this->urlpath = paramload('SHELL','urlpath');
		$this->inpath = paramload('ID','hostinpath');	
	  
		$this->menufile = $this->path . 'menu.ini';
		$this->delimiter = ',';
		
	    //SHMENU !!!
		$this->dropdown_class = remote_paramload('SHMENU','dropdownclass',$this->path);	   
		$this->dropdown_class2 = remote_paramload('SHMENU','dropdownclass2',$this->path);
	}
   

	public function event($event=null) {
   
       switch ($event) {
		 case 'cmsmenu'       :	
		 default              : 						
	   }
	}
   

	public function action($action=null) {

       switch ($action) {
		 case 'cmsmenu'       :						
		 default              : 
	   }
	   
	   return ($out);
	}   
   			

	public function render($menu_template=null,$glue_tag=null,$submenu_template=null) {
        $lan = getlocal() ? getlocal() : '0';
		$csep = _v("cmsrt.cseparator");
		$ret = null;		

        //echo $this->menufile;
		if (is_readable(str_replace('.ini', $lan.'.ini',$this->menufile))) //lan menu file
			$m = @parse_ini_file(str_replace('.ini', $lan.'.ini',$this->menufile), 1, INI_SCANNER_RAW);
		elseif (is_readable($this->menufile)) //default menu file
			$m = @parse_ini_file($this->menufile, 1, INI_SCANNER_RAW);
		  
		//print_r($m);
		if (!is_array($m)) return null;
		
		foreach ($m as $menu_item) {
			//menu items		
			if (isset($menu_item['title'])) { 		
		  
				$title = strstr($menu_item['title'], $this->delimiter) ? explode($this->delimiter ,$menu_item['title']) : $menu_item['title'];
				$_title = (is_array($title)) ? $title[$lan] : $title; 
				
				$link = strstr($menu_item['link'], $this->delimiter) ? explode($this->delimiter ,$menu_item['link']) : $menu_item['link']; 		  
				$_link = (is_array($link)) ? $link[$lan] : $link; 
				
				//spaces before and after title
				$spaces = strstr($menu_item['spaces'], $this->delimiter) ? explode($this->delimiter ,$menu_item['spaces']) : $menu_item['spaces']; 
				$sps[$_title.'-spaces'] = (is_array($spaces)) ? $spaces[$lan] : ($spaces ? $spaces : 0);

				//submenu
				$submenu = strstr($menu_item['submenu'], $this->delimiter) ? explode($this->delimiter ,$menu_item['submenu']) : $menu_item['submenu']; 
				$smu[$_title.'-submenu'] = (is_array($submenu)) ? $submenu[$lan] : ($submenu ? $submenu : null);
		
				//set title / link
				$menu[$_title] = $_link;
			}
		}
		
		//print_r($smu);
		//print_r($sps);
		//print_r($menu);
		
		
		if (!empty($menu)) {
			$mytemplate = $menu_template ? $menu_template : 'menu.htm';
			$subtemplate = $submenu_template ? $submenu_template : null;//$mytemplate;

            $tt = _m('cmsrt.select_template use ' . $mytemplate); 
				
            foreach ($menu as $name=>$url) {
				
			    $tokens = array(); //reset tokens
			    $murl = $url ? $this->make_link($url) : '#';
					
				/*if ($space_count = $sps[$name.'-spaces']) {
					$name_space = str_repeat('&nbsp;', $space_count) . $name . str_repeat('&nbsp;', $space_count);
					//echo $name.'-spaces>',$name_space,'>',$space_count,'<br>';
				}  
				else ...SPACES DISABLED...*/ 
					$name_space = $name;  	
                    
                if ($sub_menu = $smu[$name.'-submenu']) {
					
					if (stristr($sub_menu,'shkategories.')) {//phpdac cmd
						if (defined('SHKATEGORIES_DPC')) {
							$cmddac = str_replace('^', $csep, $sub_menu);
							$ret2 = _m($cmddac); //cat sep
							$tokens[] = $this->dropdown_class;//'dropdown'; 
						}
					}
					elseif (stristr($sub_menu,'.htm')) {//htm/php template file
						//echo 'a',$sub_menu;
						$mytemplate = _m('cmsrt.select_template use ' . str_replace('.htm','',$sub_menu));  
						$ret2 = $this->combine_tokens($mytemplate, array(0=>''), true);
						$tokens[] = $this->dropdown_class2;//'dropdown yamm-fw';
					}
					else {
						//echo 'b',$sub_menu;
						$_smenu = (array) $m[$sub_menu];
						$ret2 = $this->render_submenu($_smenu, $subtemplate, $glue_tag);
						$tokens[] = $this->dropdown_class;//'dropdown';
					}
					   
					//echo $ret2;
					//$menu_contents = $this->combine_tokens($tt,$tokens,true);
					//$ret .= str_replace('@SHMENU-SUBMENU@',$ret2,str_replace('@SHMENU-TITLE@',$name_space,str_replace('@SHMENU-LINK@',$murl,$menu_contents)));
					
					$tokens[] = $murl;
					$tokens[] = $name_space;
					$tokens[] = $ret2;
					$ret .= $this->combine_tokens($tt,$tokens,true);	
                } 					
				else {
					//$ret .= str_replace('@SHMENU-SUBMENU@','',str_replace('@SHMENU-TITLE@',$name_space,str_replace('@SHMENU-LINK@',$murl,$menu_contents)));
					
					$tokens[] = ''; //dummy
					$tokens[] = $murl;
					$tokens[] = $name_space;
					$tokens[] = ''; 
					$ret .= $this->combine_tokens($tt,$tokens,true);
				}	
			}	     
		}
		
		//echo $ret;
		return ($ret);
	}
   
	protected function render_submenu($smenu=null, $template=null, $glue_tag=null) {
        $lan = getlocal() ? getlocal() : '0';
        if (empty($smenu))
		   return;
		   
		foreach ($smenu as $m=>$v) {
		    $cv = strstr($v, $this->delimiter) ? explode($this->delimiter ,$v) : $v;
		
		    if (strstr($m,'title')) {
				$subm_titles[] = (is_array($cv)) ? $cv[$lan] : $cv;
			}   
			elseif (strstr($m,'link')) {
				$_cv = (is_array($cv)) ? $cv[$lan] : $cv;
				$subm_links[] = $this->make_link($_cv);
			}   
		}		   
		   
		//echo '>',$smenu;   
		//echo '<pre>';
		//print_r($subm_titles);  
		//print_r($subm_links);
		//echo '</pre>';
		
        $ret = null;
		$gstart = $glue_tag ? '<'.$glue_tag.'>' : null;
		$gend = $glue_tag ? '</'.$glue_tag.'>' : null;		
		
		if ($template) {
			$tmpl = _m('cmsrt.select_template use ' . $template);
			foreach ($subm_titles as $t=>$title) {
				$tokens = array();
				$tokens[] = $subm_links[$t];
				$tokens[] = $title;
				$out .= $this->combine_tokens($tmpl,$tokens,true);
			}	
		}
		else {
			foreach ($subm_titles as $t=>$title) {
				$line = "<a href='{$subm_links[$t]}'>$title</a>";
				$out .= $gstart . $line . $gend;
			}		
		}
 
	    return ($out);
    }
	
	//transform links for special chars
	protected function make_link($link=null) {
		$csep = _v("cmsrt.cseparator");
		
	    $ret = str_replace('@', '?t=', $link);
		$out = str_replace('^', $csep, $ret);
		return ($out);
	}
   
	//tokens method	
	protected function combine_tokens($template_contents,$tokens, $execafter=null) {
		
	    if (!is_array($tokens)) return;
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage();
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template_contents;
		  
	    foreach ($tokens as $i=>$tok) 
		    $ret = str_replace("$".$i."$",$tok,$ret);

		//clean unused token marks
		for ($x=$i;$x<20;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);


		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage();
		  $retout = $fp->process_commands($ret);
		  unset ($fp);
          
		  return ($retout);
		}		
		
		return ($ret);
	}   
   
};
}
?>