<?php
$__DPCSEC['FRONTHTMLPAGE_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if (!defined("FRONTHTMLPAGE_DPC")) {
define("FRONTHTMLPAGE_DPC",true);

$__DPC['FRONTHTMLPAGE_DPC'] = 'fronthtmlpage';

$__LOCALE['FRONTHTMLPAGE_DPC'][1]='_addspace;Limited space, add space;Πρόσθεσε χωρητικότητα';
$__LOCALE['FRONTHTMLPAGE_DPC'][2]='English;English;Αγγλικά';
$__LOCALE['FRONTHTMLPAGE_DPC'][3]='Greek;Greek;Ελληνικά';

class fronthtmlpage {

	var $t_fronthtmlpage;
	var $userLevelID;

	var $htmlfile, $htmlpage;
	var $argument;
	
	var $infolder, $urlpath, $url, $urltitle;
	var $modify; 

	var $charset;
	var $verbose;
	var $editmode_point;

	var $edithtml, $prpath;
	var $htmlext;
	
	static $staticpath;
	
	var $BASE_URL, $MC_ROOT, $MC_TEMPLATE, $MC_DEBUG, $MC_CURRENT_PAGE;
	var $language, $isolanguage;
	
	var $anel, $anel_signin;
	var $template, $cptemplate;
	var $preprocess;	
	 
	public function __construct($file=null) { 
	    $GRX = GetGlobal('GRX');
        $UserSecID = GetGlobal('UserSecID');			
	 
	    $this->t_fronthtmlpage = new ktimer;
	    $this->t_fronthtmlpage->start('fronthtmlpage'); 						

        $this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);  
		
        $this->prpath = paramload('SHELL','prpath');		
		
		$this->htmlpage = paramload('FRONTHTMLPAGE','path') ? paramload('FRONTHTMLPAGE','path') : 'html'; 
		$this->urlpath = paramload('SHELL','urlpath');			
		$this->urltitle = paramload('SHELL','urltitle');					
		
		$murl = arrayload('SHELL','ip');
        $this->url = (!empty($murl)) ? $murl[0] : paramload('SHELL','urlbase'); 			
		$this->infolder = paramload('ID','hostinpath');		
		
		//check if html file name based on action exist
		$cmd = GetParam('FormAction')?GetParam('FormAction'):GetReq('t');
		if ($cmd) {
			$mylan = getlocal() ? getlocal() : '0';
			$autofile = GetGlobal('UserID')? $cmd . '_in' . $mylan . '.html' : $cmd . $mylan . '.html';
		  
			$htmlfile = $this->urlpath . $this->infolder . '/cp/' . $this->htmlpage . "/" . $autofile;
			if (!is_readable($htmlfile)) //default
				$htmlfile = $this->urlpath . $this->infolder . '/cp/' . $this->htmlpage . "/" . $file;
		}
		else
			$htmlfile = $this->urlpath . $this->infolder . '/cp/' . $this->htmlpage . "/" . $file;
		//echo '>',$htmlfile;
		
		if (!is_readable($htmlfile)) {//check for parent file

			$cphtmlpath = "/../cp/$this->htmlpage/";
			$parentfile = $this->urlpath . $cphtmlpath . $file; 
			if (is_readable($parentfile)) 
				$this->htmlfile = $parentfile;
		}
		else {
			$cphtmlpath = $this->infolder . '/cp/' . $this->htmlpage;		
			$this->htmlfile = $htmlfile;//$this->urlpath . $this->infolder . '/cp/' . $this->htmlpage . "/" . $file; 
		}  
		
		//echo '>',$this->htmlfile;

		$p = explode(".",$file);
		//$this->argument = strtoupper($p[0]); //the name without ext		
		//in case of dot(.) in name
		$extension = array_pop($p);
		//now with the rest of array
		$pdotname = implode('.',$p);
		$this->argument = strtoupper($pdotname); //the name with dots and without ext		
		//echo $this->argument,'>';
	
		$this->session_use_cookie = paramload('SHELL','sessionusecookie');	
		
		$this->modify = urldecode(base64_decode(GetReq('modify')))=='stereobit' ? true : false;

        //choose encoding
        $char_set  = arrayload('SHELL','char_set');	  
        $charset  = paramload('SHELL','charset');	  		
		if (($charset=='utf-8') || ($charset=='utf8'))
		  $this->charset = 'utf-8';
		else  
	      $this->charset = $char_set[getlocal()]; 	  				
		    
		$this->verbose = remote_paramload('FRONTHTMLPAGE','verbose',$this->prpath); 
		
        if ($GRX)    
         $this->editmode_point  = loadTheme('editmode','e-Enterprise');
	    else
	  	 $this->editmode_point  = '[Edit Mode]';
		 
		$this->edithtml = remote_paramload('FRONTHTMLPAGE','edithtml',$this->prpath); 
		
		$htmlfile_extension = remote_paramload('FRONTHTMLPAGE','htmlext',$this->prpath);
        $this->htmlext = $htmlfile_extension ? $htmlfile_extension : '.htm'; 		
		
		self::$staticpath = paramload('SHELL','urlpath');
		
		$this->template = remote_paramload('FRONTHTMLPAGE','template',$this->prpath);
		$this->cptemplate = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->prpath);		
		
		$this->BASE_URL = $this->baseURL();
		//$this->MC_TEMPLATE = remote_paramload('FRONTHTMLPAGE','template',$this->prpath); 
		$this->MC_TEMPLATE = strstr($_SERVER[REQUEST_URI], 'cp/') ? //is in cp
							 $this->cptemplate : $this->template; 		
		$this->MC_ROOT = $this->mcRoot($this->MC_TEMPLATE);
		$this->MC_DEBUG = remote_paramload('FRONTHTMLPAGE','debug',$this->prpath);
		$this->MC_CURRENT_PAGE = null;
		
		$lans = arrayload('SHELL','languages');
		$this->language = $lans[getlocal()];		
		$isolans = arrayload('SHELL','isolangs');
		$this->isolanguage = $isolans[getlocal()];
		//echo $this->isolanguage,'>';	
		
        $this->anel = remote_paramload('FRONTHTMLPAGE','anel',$this->prpath); 		
		$this->anel_signin = remote_paramload('FRONTHTMLPAGE','anelsignin',$this->prpath); 		
		
		//problem returning part (outside html body)
		$this->preprocess = 0;//_v('pcntl.preprosess')		

		//date_default_timezone_set('Europe/Athens');

		//$this->javascript();	//moved to cmsrt
	}	
	
    public function render($actiondata) { 	

	    if ($this->modify) 
			$out = $this->modify_page();
 
        $out .= $this->process_html_file($actiondata, $this->modify);		  
	  		   	 
		//timer
		$this->t_fronthtmlpage->stop('fronthtmlpage');
	  	  		  
		return ($out);
    }	
	
	protected function process_html_file($data, $admin=null) {
		if ($admin) { 
			if ($this->anel) 
				$htmldata = $this->anel_panel(); //anel angular js
			elseif ($this->cptemplate)
				$htmldata = $this->cpanel_iframe();
			else
				$htmldata = 'cptemplate missing';	

			return ($htmldata);
		}
	  
		if (is_file($this->htmlfile)) { 
			$htmdata = file_get_contents($this->htmlfile);
			$this->process_javascript($htmdata, $pageout);		
			$ret = $this->process_commands($pageout);
			$ret = str_replace("<?". $this->argument ."?>",$data,$ret);
		  		
			if (!$this->session_use_cookie)
				$ret = $this->propagate_session($ret); 
		}
		else {
			global $_html;//standart name .... 
			if ($_html) {
				$this->process_javascript($_html, $pageout);
				$ret = $this->process_commands($pageout);	
		  
				if (!$this->session_use_cookie)
					$ret = $this->propagate_session($ret);			
			}
			else {
				$hfile = $this->htmlfile ? $this->htmlfile : 'none';	
				$ret = "Unknown html file (".$hfile.") or argument.\n" . $admlink;
			}  
		}	
		
		return ($ret);	
	}	

	public function process_commands($data,$is_serialized=null) {
	
		if ($is_serialized) 
			$data = unserialize($data);
	  
		$pattern = "@<phpdac.*?>(.*?)</phpdac>@";
		preg_match_all($pattern,$data,$matches);
	  
		foreach ($matches[1] as $r=>$cmd) {
			$ret = _m($cmd); //,1); //no error stop 					 
			$data = str_replace("<phpdac>".$cmd."</phpdac>",$ret,$data);
		}
	  
		return ($data);//as is
	}
	
	protected function process_javascript($data, &$pageout) {
	
		//call javascript 
		if (defined('JAVASCRIPT_DPC')) {		  

			_m('javascript.onLoad');
			$jret = _m('javascript.callJavaS');
			//echo $jret;
			//if ($jret) 
			$pageout = str_replace("</body>", $jret."</body>", $data); //body jqgrid problem 
		}	
	}

	protected function propagate_session($data,$ext='.php') {
	
		$ret = str_replace($ext.'?',$ext."?".SID."&",$data);//.php with args	
		$ret2 = str_replace($ext.'"',$ext."?".SID.'"',$ret);//.php without args
	  
		return ($ret2);
	}

	public function get_copyright($fromyear=null) {
	    $is_cropwiz = (GetSessionParam('LOGIN')=='yes') ? $this->app_crop_wizard() : null;
		$url = paramload('SHELL','urlbase');
	    $t = '<a href="'.$url.'">'.remote_paramload('INDEX','title',$this->prpath).'</a>';
		$y = $fromyear?$fromyear.'-'.date('Y'):date('Y');
	    $ret .= "&copy; $y, $t &nbsp;";// - All Rights Reserved. ";	  
		
		if (!$is_cropwiz)
		  $ret .= $this->get_admin_link();
				
		return ($ret);	
	}	

	public function get_admin_link($notheme=false) {	

		if (is_array($_GET)) {
		  foreach ($_GET as $i=>$t) {
		    if ( ($i!='action') && ($i!='turl') ) 
		      $newquery .= '&'.$i.'='.urlencode($t);
	      }
		}
		else 
		  $newquery = '&t=';		
		  
		$mynewquery = $newquery?$newquery:null;//'&t=';  
			
		$current_page = pathinfo($_SERVER['PHP_SELF']);//parse_url($_SERVER['PHP_SELF'],PHP_URL_PAGE);				
		$target_url = urlencode(encode($current_page['basename'] . "?".$mynewquery));		
        $admin_url = $this->infolder . "/".$current_page['basename'] . "?modify=".encode('stereobit')."&turl=".$target_url;		
		$icon_file = $this->urlpath.'/'.$this->infolder.'/images/editpage.png';
		
        SetSessionParam('authverify',1);		
				
		$ret .= $notheme ? seturl("modify=".urlencode(base64_encode('stereobit'))."&turl=".$target_url.$mynewquery):
		                   seturl("modify=".urlencode(base64_encode('stereobit'))."&turl=".$target_url.$mynewquery,$this->editmode_point); 	
		
		return ($ret);
	}
	
	protected function modify_page() {
	    //echo 'modify';
	}
	
	//demo admin
	public function get_admin_demo_link($editmode_point=null) {

		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;
       	
		if (is_array($_GET)) {
		  foreach ($_GET as $i=>$t) {
		    if ( ($i!='action') && ($i!='turl') ) 
		      $newquery .= '&'.$i.'='.urlencode($t);
	      }
		}
		else 
		  $newquery = '&t=';		
		  
		$mynewquery = $newquery ? $newquery : null;  
			
		$current_page = pathinfo($_SERVER['PHP_SELF']);			
		$target_url = urlencode(base64_encode($current_page['basename'] . "?".$mynewquery));		

		if ($editmode_point) {
			$img = "<img src='$editmode_point' />";
			$ret = "<a href='cp.php?turl=".$target_url ."' alt='e-Enterprise'>".$editmode_point."</a>"; 	
		}	
		else
            $ret = "cp.php?turl=".$target_url; 	
		
		return ($ret);
	}	

	protected function anel_panel($query=null) {
	    $encoding = $this->charset;
		$is_oversized = $this->app_is_oversized();
		$is_cpwizard = $this->app_cp_wizard();
		$is_cropwiz = (GetSessionParam('LOGIN')=='yes') ? $this->app_crop_wizard() : null;
		
		if (is_array($_GET)) {
		  foreach ($_GET as $i=>$t) {
		    if ( ($i!='pcntladmin') && ($i!='action') ) //??action //bypass pcntladmin=.. param for repoladn same url...
		      $newquery .= '&'.$i.'='.$t;
	      }
		}
		else 
		  $newquery = '&t=';		  
		  
	    $query = $query?$query:$newquery;
        $turl = urldecode(decode(GetReq('turl')));			
		$mc_page = $this->mc_parse_editurl($turl);		
        $this->MC_CURRENT_PAGE = $mc_page;		
		$file2edit = $this->MC_TEMPLATE ? $mc_page : strtolower($this->argument).$this->htmlext;
		
		//save params
		@file_put_contents('cp/.turl',urlencode(base64_encode($turl)),LOCK_EX);
		@file_put_contents('cp/.htmlfile',urlencode(base64_encode($file2edit)),LOCK_EX);
		
		$mainframe_url = 'http://' . $this->url . str_replace('.','#',$this->anel);	
			
		$fp = <<<EOF
<html>
  <head>
    <title>IU Webmaster redirect</title>
    <META http-equiv="refresh" content="0;URL=$mainframe_url">
  </head>
  <body bgcolor="#ffffff">
    <center>You will be redirected to the new cp location automatically in 1 second. </center>
  </body>
</html>

EOF;
	   
	   return ($fp);
	}

	//cpanel template iframe win
    protected function cpanel_iframe($query=null) {
	    $encoding = $this->charset;
		$is_oversized = $this->app_is_oversized();
		$is_cpwizard = $this->app_cp_wizard();
		$is_cropwiz = (GetSessionParam('LOGIN')=='yes') ? $this->app_crop_wizard() : null;
		
		if (is_array($_GET)) {
		  foreach ($_GET as $i=>$t) {
		    if ( ($i!='pcntladmin') && ($i!='action') ) //??action //bypass pcntladmin=.. param for repoladn same url...
		      $newquery .= '&'.$i.'='.$t;
	      }
		}
		else 
		  $newquery = '&t=';		  
		  
	    $query = $query?$query:$newquery;
        $turl = urldecode(decode(GetReq('turl')));			
		$mc_page = $this->mc_parse_editurl($turl);		
        $this->MC_CURRENT_PAGE = $mc_page;		
		$file2edit = $this->MC_TEMPLATE ? $mc_page : strtolower($this->argument).$this->htmlext;
		
		//save params
		@file_put_contents('cp/.turl',urlencode(base64_encode($turl)),LOCK_EX);
		@file_put_contents('cp/.htmlfile',urlencode(base64_encode($file2edit)),LOCK_EX);
		
		if (GetSessionParam('LOGIN')=='yes') {
			if (($this->argument) && ($this->edithtml)) {
				//edit html...
				if ($is_cpwizard)
				    $mainframe_url = "http://".$this->url;
				elseif ($is_cropwiz)	
					$mainframe_url = $turl; //$this->url;					
				else
				    $mainframe_url = $is_oversized ?
				                     $this->self_addspace(true) : 
				                     "cp/cpmhtmleditor.php?cke4=1&encoding=".$encoding."&htmlfile=" . urlencode(base64_encode($file2edit));
		    }						 
			else {
                if ($is_cpwizard)
				    $mainframe_url = "http://".$this->url;
				elseif ($is_cropwiz)	
					$mainframe_url = $turl; 					
				else			
				    $mainframe_url = $is_oversized ?
				                     $this->self_addspace(true) : 
						    		 "cp/cp.php?editmode=1&encoding=".$encoding."&turl=" . urlencode(base64_encode($turl));
			}					 
		}  
		else { 
		    if ($is_cpwizard)
				$mainframe_url = "http://".$this->url;
			else
			    $mainframe_url = $is_oversized ?
				                 $this->self_addspace(true) : 
							     "cp/cp.php?editmode=1&encoding=".$encoding."&turl=" . urlencode(base64_encode($turl));
								 //"cp/cpside.html";
	  	}
	
	    //loading text : http://stackoverflow.com/questions/8626638/how-to-display-loading-message-when-an-iframe-is-loading
		$fp = <<<EOF
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="EN"> 
<head> 
<title>e-Enterprise</title>
<meta http-equiv="Content-Type" content="text/html; charset=$encoding" />   
	<style type="text/css">
		body { margin: 0; overflow: hidden; }
		.mainframe { position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;  
					 /*background: url('data:image/svg+xml;charset=utf-8,<svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 100% 100%"><text fill="%23FF0000" x="50%" y="50%" font-family="\'Lucida Grande\', sans-serif" font-size="24" text-anchor="middle">Loading</text></svg>') 0px 0px no-repeat;*/
					 background:url(images/loading.gif) center center no-repeat; 
				   }	   
	</style>
</head> 
<body> 
<div class="mainframe">
<iframe id="mainFrame" name="mainFrame" src="$mainframe_url" frameborder="0" marginheight="0" marginwidth="0" width="100%" height="100%" scrolling="auto"></iframe> 
</div>
</body> 
</html>

EOF;
	   
	   return ($fp);
	}	
	
	
	protected function app_cp_wizard() {
	    $wizfile = $this->prpath . 'cpwizard.ini';
		
	    if (is_readable($wizfile)) { 
		    //$ret = @file_get_contents($wizfile);
		    return true;   
		}	

		return false;
	}
	
	protected function app_crop_wizard() {
	    $cropfile = $this->prpath . 'crop.ini';
		
	    if ((is_readable($cropfile)) || (GetReq('cropwiz'))) { 
		    //$ret = @file_get_contents($wizfile);
		    return true;   
		}	

		return false;
	}	

    protected function get_app_size() {
  
		$tsize = $this->cached_disk_size();
        $dsize = $this->cached_database_filesize();	
		$total_size = $tsize + $dsize;
 
		return ($total_size);
    }

    protected function app_is_oversized() {
  
        $allowed_size = is_readable($this->prpath .'/maxsize.conf.php') ?
	                    intval(@file_get_contents($this->prpath .'/maxsize.conf.php')) : 0;
						
		$current_size = $this->get_app_size();				
					   
		if ($allowed_size < $current_size)			   
		    return ($current_size);
		
        return false;		
    }  
	
	
    protected function bytesToSize1024($bytes, $precision = 2) {
        $unit = array('B','KB','MB','GB');
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
    }  
 
 
    protected function filesize_r($path){
		if (!file_exists($path)) return 0;
		
	    if (is_file($path)) return filesize($path);
		$ret = 0;
		
		$glob = glob($path."/*");
		
		if (is_array($glob)) {
			foreach(glob($path."/*") as $fn)
				$ret += $this->filesize_r($fn);
		}	
		return $ret;
    } 
  
    protected function cached_disk_size($path=null) {
		$path = $path ? $path : $this->urlpath; 
		$name = 'a';//strval(date('Ymd'));
		$tsize = $this->prpath . $name . '-tsize.size';
		$size = 0;

		if (is_readable($tsize)) {
	        //echo $tsize;
			$size = file_get_contents($tsize);

		}
		else {
            $size = $this->filesize_r($path);
			@file_put_contents($tsize, $size);
		}
	   
		return ($size);
    }
  
    protected function cached_database_filesize() {
		$db = GetGlobal('db'); 
		$size = 0;
	
		if ($db) {
			$name = 'a';//strval(date('Ymd'));
			$dsize = $this->prpath . $name . '-dsize.size';	
    
			if (is_readable($dsize)) {
				//echo $dsize;
				$size = file_get_contents($dsize);
			}
			else {
				$sSQL = "SHOW TABLE STATUS";
				$res = $db->Execute($sSQL,2);		
				$size = 0;

				if (!empty($res)) { 
					foreach ($res as $n=>$rec) {
						$size += $rec[ "Data_length" ] + $rec[ "Index_length" ];					
					}
				}
				@file_put_contents($dsize, $size);
			}	
		}	
		
		return ($size);
    }	
	
	protected function self_addspace($retlink=false) {
			
		$ret = $retlink ? 'cp/cp.php?t=cpupgrade&wf=addspace' :
			              "<h3><a href='cp/cp.php?t=cpupgrade&wf=addspace'>" . localize('_addspace', getlocal())."</a></h3>";				
			
		return ($ret);
	}	
	
	
	/********* PUBLIC FUNCS *********/
	
	public function combine_tokens($template, $toks, $execafter=null) {
	    //if (!is_array($tokens)) return ($template);		

		if (!$execafter) 
			$ret = $this->process_commands($template);	  		
		else
			$ret = $template;
		
		$tokens = $toks ? unserialize($toks) : array();
		$i=0;
		if (!empty($tokens)) {	
			foreach ($tokens as $i=>$tok) 
				$ret = str_replace("$".$i."$",$tok,$ret);
		}
		//clean unused token marks
		for ($x=$i;$x<40;$x++)
			$ret = str_replace("$".$x."$",'',$ret);
		
		if ($execafter) 
			$ret = $this->process_commands($ret);
		
		return ($ret);
	}
  
    public function is_tokens_var($var) {
  
		if (stristr($var,'<TOKENS>'))
		return true;
	  
		return false;	  
    } 
  
    public function subpage($tmpl,$dpc2call,$dmarks=null,$extra_attr=null,$verbose=null) {
         $dm = $dmarks?$dmarks:null;
		 $verb = $this->verbose ? $this->verbose : $verbose;
         
		 if ($extra_attr) {//string of val '0' or '1'
		   $tmpl_extra = str_replace($this->htmlext,$extra_attr.$this->htmlext,$tmpl);
		   $tfile = str_replace('.',getlocal().'.',$tmpl_extra);		   
		   
		   if ($this->MC_TEMPLATE)
		     $t = $this->prpath . $this->htmlpage . "/" . $this->MC_TEMPLATE . "/" . $tfile ;
		   else	 
		     $t = $this->urlpath . $this->infolder . '/cp/' . $this->htmlpage . "/" . $tfile ; 
		 }  
		 else {
		   $tfile = str_replace('.',getlocal().'.',$tmpl);
		   
		   if ($this->MC_TEMPLATE)
			 $t = $this->prpath . $this->htmlpage . "/" . $this->MC_TEMPLATE . "/" . $tfile ;		   
		   else	 
		     $t = $this->urlpath . $this->infolder . '/cp/' . $this->htmlpage . "/" . $tfile ;		   
		 }  
		   
		 if ($verb)			
		   echo $t,'<br>';
		   
	     if (is_readable($t)) {
		    $mytemplate = file_get_contents($t);	
			if ($verbose)
			  echo $t;
	     }
		 else {//parent root cp folder file
		  $cphtmlpath = "/../cp/$this->htmlpage/";
		  $parentfile = $this->urlpath . $cphtmlpath . str_replace('.',getlocal().'.',$tmpl); 
		  //echo 'z'.$parentfile;
		  if (is_readable($parentfile)) {
			$mytemplate = file_get_contents($parentfile);
			if ($verb)			
			  echo $parentfile,'<br>';
		  }		 
		 }  

		 //if var is encrypted tokens 
		 if ($this->is_tokens_var($dpc2call)) {//direct tokens val }
		   $tokens = explode('<TOKENS>',str_replace('<@>','+',$dpc2call));//(array) $this->detokenizer($dpc2call);
		 }
		 elseif (is_array($dpc2call)) {//direct call from calldpc_use_pointers
		   $tokens = (array) $dpc2call;
		 }
		 else {
		   $precall = str_replace('->',' use ',$dpc2call);
		   $call = str_replace('>','+',$precall);
 	       $tokens = _m($call);		 
		 
		   if ($verb)
		     echo $call,'<br><hr>';
		 }  
		 
		 $out = $this->combine_tokens($mytemplate,$tokens,$dm);		 

		 return ($out);
    }  
	
	
	public function included($fname=null, $uselans=null) {
	
	    if ($fname) {
		    if ($uselans) {
			    $lan = getlocal();
			    $name = str_replace('.',$lan.'.', $fname);
			}
			else
			    $name = $fname;
				
			$pathname = $this->urlpath . '/cp/'.$name;

			if (is_readable($pathname)) {
				$contents = @file_get_contents($pathname);
				//execute commands
				$ret = $this->process_commands($contents);
				return ($ret);
			}
        }	
        return null; 		
	}
	
	public function php_self($usedomain=null) {
	
	    if ($usedomain)
		  $ret = $this->url;
		  
	    $ret .= $_SERVER['REQUEST_URI'];// ? '/'.$_SERVER['REQUEST_URI'] : null;
		return urldecode($ret);
	    //return $_SERVER['PHP_SELF'];
    }

	public function nvl($param=null,$state1=null,$state2=null,$value=null) {
	    global ${$param};
		
	    $var = (stristr($param,'.')) ? _v($param) :
					(GetGlobal($param) ? GetGlobal($param) : (GetParam($param) ? GetParam($param) : $_SESSION[$param]));				
		
        if ($value) { 
			if (strstr($value, '|')) {
			    $nvalues = explode('|',$value); 
				$ret = (in_array($var, $nvalues)) ? $state1 : $state2; 
			}
			elseif (strstr($value, '.'))
				$ret = (_v($value)==$var) ? $state1 : $state2; 			
			else	
				$ret = ($value==$var) ? $state1 : $state2;   		
		}   
        else
           $ret = $var ? $state1 : $state2;
		   
		return ($ret);
    }
	
	public function nvltokens($token=null,$state1=null,$state2=null,$value=null) {
	    //always string compare...
		if ($value) {	
			if (strstr($value, '|')) {
			    $nvalues = explode('|',$value); 
				$ret = (in_array($token, $nvalues)) ? $state1 : $state2; 
			}
			elseif (strstr($value, '.'))
				$ret = (_v($value)==$token) ? $state1 : $state2;  	 			
			else		
				$ret = ($token==$value) ? $state1 : $state2;  	
		}	
        else		
           $ret = $token ? $state1 : $state2;
		   
		return ($ret);

    }	
	
	public function nvldecode($token=null,$state1=null,$state2=null,$value=null,$default=null) {

		if (is_numeric($value)) { 
            $ret = $default ? $default : (($token==$value) ? $state1 : $state2);			
		}   
		elseif ($value) {
			if (strstr($value, '|')) {
			    $nvalues = explode('|',$value); 
				$ret = $default ? $default : ((in_array($token, $nvalues)) ? $state1 : $state2); 
			}
			elseif (strstr($value, '.'))
				$ret = $default ? $default : ((_v($value)==$var) ? $state1 : $state2);   			
			else			
				$ret = $default ? $default : (($token==$value) ? $state1 : $state2);  	
		}	
        else 	
           $ret = $token ? $state1 : $state2;
  
		return ($ret);
    }		
	
	/*single dac cmds per state*/
	public function nvldac($param=null,$state1=null,$state2=null,$value=null) {
	    
	    $var = (stristr($param,'.')) ? _v($param) :
						(GetGlobal($param) ? GetGlobal($param) : (GetParam($param) ? GetParam($param) : $this->{$param}));		
		
        if ($value) { 
		    if (strstr($value, '|')) {
			    $nvalues = explode('|',$value); 
				$ret = (in_array($var, $nvalues)) ? _m(str_replace('::','+',$state1)) : _m(str_replace('::','+',$state2)); 
			}
			elseif (strstr($value, '.'))
				$ret = (_v($value)==$var) ? _m(str_replace('::','+',$state1)) : _m(str_replace('::','+',$state2));  		
			else
				$ret = ($value==$var) ? _m(str_replace('::','+',$state1)) : _m(str_replace('::','+',$state2));   		
		}		   
        else      
           $ret = $var ? _m(str_replace('::','+',$state1)) : _m(str_replace('::','+',$state2));				  

		return ($ret);

    }	
	
	/*split and execute multiple dac cmds*/
	protected function dacexec($dcmds=null) {
	    if (!$dcmds) return null;
		
	    $mcmds = explode('::',$dcmds);
		foreach ($mcmds as $c=>$cmd) { 
		
			$mycall = str_replace(array(':','|'),array(' use ','+'),$cmd);
			$ret .= _m($mycall);
		}  
		return ($ret);
	}
	
	/*multiple dac cmds per state*/
	public function nvldac2($param=null,$states1=null,$states2=null,$value=null) {

	    $var = (stristr($param,'.')) ? _v($param) : 
		                (GetGlobal($param) ? GetGlobal($param) : (GetParam($param) ? GetParam($param) : $this->{$param}));

        if ($value) {    
			if (strstr($value, '|')) {
			    $nvalues = explode('|',$value); 
				$ret = (in_array($var, $nvalues)) ? $this->dacexec($states1) : $this->dacexec($states2) ; 
			}
			elseif (strstr($value, '.'))
				$ret = (_v($value)==$var) ? $this->dacexec($states1) : $this->dacexec($states2) ;
			else		
				$ret = ($value==$var) ? $this->dacexec($states1) : $this->dacexec($states2) ;
		}						   
        else      
            $ret = $var ? $this->dacexec($states1) : $this->dacexec($states2) ;				  

		return ($ret);

    }	

    public function nvlfile($filename=null,$states1=null,$states2=null) {
	    if (!$filename) return null;
		
	    if (file_exists($filename))
			$ret = $this->dacexec($states1); 
		else	
		    $ret = $this->dacexec($states2);	
		return ($ret);	
	}
	
	//dummy dpc exec
	public function nvlnull() {
	    return ''; 
    }	
	
	//used in front page as login / logout
	public static function myf_button($title,$link=null,$image=null) {

	   $path = self::$staticpath;
	   
	   if (($image) && (is_readable($path."/images/".$image.".png"))) 
	      $imglink = "<a href=\"$link\" title='$title'><img src='images/".$image.".png'/></a>";
	   
	   if (preg_match('/MSIE/i',$_SERVER['HTTP_USER_AGENT'])) { 
	      //echo 'ie';
		  $_b = $imglink ? $imglink : "[$title]";
		  $ret = "&nbsp;<a href=\"$link\">$_b</a>&nbsp;";
		  return ($ret);
	   }	
	   
	   if ($imglink)
	       return ($imglink);
	
       //else button	
	   if ($link)
	      $ret = "<a href=\"$link\">";
		  
	   $ret .= "<input type=\"button\" class=\"myf_button\" value=\"".$title."\" />";
	   
	   if ($link)
          $ret .= "</a>";	   
		  
	   return ($ret);
	}		
	
	/*template engine functions*/
    public function getGlobal($param, $isSession=false) {
		if ($isSession) 
			return ($_SESSION[$param]);
  
		return ($GLOBALS[$param]);
    }

	public function setGlobal($param,$val=null,$isSession=false) {
	    if ($isSession) 
			$_SESSION[$param] = $val;
		else	
		    $GLOBALS[$param] = $val;
	}	
	
    public function getParam($param) {
		if ($_POST[$param]) 
			return ($_POST[$param]);
  
		return ($_GET[$param]);
    }		
	
	public function serverSTR($str=null) {
	    $server_str = $str ? $str : 'REQUEST_URI';
	    return htmlspecialchars($_SERVER[$str]);
	}
	
	public function baseURL($uri=null){
	    $request_uri = $uri ? $uri : $_SERVER['REQUEST_URI'];
		return sprintf(
			"%s://%s%s",
			isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME'],
			dirname($request_uri) /*$_SERVER['REQUEST_URI']*/
		);
	}

    public function mcRoot($tmplname=null) {
	   $tmplpath = $tmplname ? $tmplname : null;
	   
	   $this->MC_ROOT = $this->prpath . $this->htmlpage . "/" . $tmplpath; //dirname(__FILE__);
	   return ($this->MC_ROOT);
    }

	public function include_part($fname=null, $args=null, $uselans=null, $tmplname=null) {	
	    $tmpln = $tmplname ? $this->mcRoot($tmplname) . $fname : 
		                     $this->MC_TEMPLATE . $fname;
	    //echo 'INCLUDE_PART:'.$tmpln;
		$pattern = "@<(.*?)>@"; /*search for content params*/
		$arguments = explode('|',$args);
		//print_r($arguments);
		
	    if ($fname) {
		    if ($uselans) {
			    $lan = getlocal();
			    $pathname = $tmplname ? 
				            str_replace($tmplname, $tmplname.'/'.$lan, $tmpln) :
				            str_replace($this->MC_TEMPLATE, $this->MC_TEMPLATE.'/'.$lan, $tmpln);
			}
			else
			    $pathname = $tmpln;
				
			//echo 'INCLUDE_PART:'.$pathname;
			if (is_readable($pathname)) {
				/*if (defined('CCPP_VERSION')) {
					$config = null;
					$preprocessor = _v('pcntl.preprocessor'); 
					$contents = $preprocessor->execute($pathname, 0, false, true);
					//echo 'a>',$pathname;
				}
				else	*/			
					$contents = @file_get_contents($pathname);
				
				//replace content args
				if (!empty($arguments)) {
					preg_match_all($pattern,$contents,$matches);
					//print_r($matches);
					foreach ($matches[1] as $r=>$cmd) {
						//echo $cmd,'-',GetParam($cmd),"<br>";
						$arg = array_shift($arguments); //form 1st to last
						//echo $r,'->',$cmd,'->',$arg,'<br/>';
						$contents = str_replace('<arg'.$r.'>',$arg,$contents);
					}				
			    }
				
				//execute commands
				$ret = $this->process_commands($contents);
			
				return ($ret);
			}

        }	
		if ($this->MC_DEBUG)
			return ('<b>Invalid part:</b>'.$pathname);
		else	
			return null; 		
	}
	
	/*fname argument*/
	public function include_part_arg($fname=null, $args=null, $uselans=null, $tmplname=null) {
	    $pattern = "@<(.*?)>@"; /*search for fname params*/
	    preg_match_all($pattern,$fname,$matches);
	    //print_r($matches);
	  
        foreach ($matches[1] as $r=>$cmd) {
	      //echo $cmd,'-',GetParam($cmd),"<br>";
		  $arg = GetParam($cmd) ? GetParam($cmd) : GetGlobal($cmd);
		  $fname_arg = str_replace('<'.$cmd.'>',$arg,$fname);
	    }	
	
	    $tmpln = $tmplname ? $this->mcRoot($tmplname) . $fname_arg : 
		                     $this->MC_TEMPLATE . $fname_arg;
	    //echo 'INCLUDE_PART_ARG:'.$tmpln;
		$arguments = explode('|',$args);
		
	    if ($fname) {
		    if ($uselans) {
			    $lan = getlocal();
			    $pathname = $tmplname ? 
				            str_replace($tmplname, $tmplname.'/'.$lan, $tmpln) :
				            str_replace($this->MC_TEMPLATE, $this->MC_TEMPLATE.'/'.$lan, $tmpln);
			}
			else
			    $pathname = $tmpln;
				
			//echo 'INCLUDE_PART:'.$pathname;
			if (is_readable($pathname)) {
				
				/*if (defined('CCPP_VERSION')) {
					$config = null;
					$preprocessor = new CCPP($config, true); //new ccpp
					//$preprocessor = _v('pcntl.preprocessor'); 
					$contents = $preprocessor->execute($pathname, 0, false, true);
					//echo 'a>',$pathname;
				}
				else*/				
					$contents = @file_get_contents($pathname);
				
				//replace content args
				if (!empty($arguments)) {
					preg_match_all($pattern,$contents,$matches);
					//print_r($matches);
					foreach ($matches[1] as $r=>$cmd) {
						//echo $cmd,'-',GetParam($cmd),"<br>";
						$arg = array_shift($arguments); //form 1st to last
						$contents = str_replace('<arg'.$r.'>',$arg,$contents);
					}				
			    }				
			
			    //js 
			    $this->process_javascript($contents, $pageout);
				
				//execute commands
				$ret = $this->process_commands($pageout);
			
				return ($ret);
			}

        }	
		if ($this->MC_DEBUG)
		    return ('<b>Invalid part argument:</b>'.$pathname);
		else  
            return null; 		
	}	

	/*todo: read form external template file*/
	public function mcPages($retarray=false, $url=null) {
	    $ret = null;
	    $urlpagename = $url ? $url : 'index.php';
		$pages_list_file = $this->prpath.$this->htmlpage."/".$this->MC_TEMPLATE."/pages.ini";
		//echo $pages_list_file,'<br/>';
		if (is_readable($pages_list_file)) //in cp
		  $pages = @parse_ini_file($pages_list_file,false);//,INI_SCANNER_ROW); 
		else   
	      $pages = array(
		'home' => 'Home',
		'home-2' => 'Home Alt',
		'category-grid' => 'Category - Grid/List',
		'category-grid-2' => 'Category 2 - Grid/List',
		'single-product' => 'Single Product',
		'single-product-sidebar' => 'Single Product with Sidebar',
		'cart' => 'Shopping Cart',
		'checkout' => 'Checkout',
		'about' => 'About Us',
		'contact' => 'Contact Us',
		'blog' => 'Blog',
		'blog-fullwidth' => 'Blog Full Width',
		'blog-post' => 'Blog Post',
		'faq' => 'FAQ',
		'terms' => 'Terms & Conditions',
		'authentication' => 'Login/Register',
		'404' => '404',
		'wishlist' => 'Wishlist',
		'compare' => 'Product Comparison',
		'track-your-order' => 'Track your Order'
	    );	
		//print_r($pages);
		if ($retarray) return $pages;
		  
		foreach ( $pages as $key => $packagePage )
			$ret .=	'<li><a href="'.$urlpagename.'?mc_page='.$key.'&amp;style='. $_GET['style'].'">'.$packagePage.'</a></li>';
		return ($ret);
	}
	
	public function mcPagesChunk($chunk=0, $p=6, $url=null) {
	    $pageChunkes = array_chunk($this->mcPages(true), $p, true);
	    $urlpagename = $url ? $url : 'index.php';		
	    $ret = null;		
		
		foreach ( $pageChunkes[$chunk] as $key => $packagePage )
			$ret .=	'<li><a href="'.$urlpagename.'?mc_page='.$key.'&amp;style='. $_GET['style'].'">'.$packagePage.'</a></li>';
		return ($ret);		
	}
	
	public function mcSelectPage($id=null,$defpage=null,$tmplname=null,$forcet=null) {
	    $db = GetGlobal('db');
	    $pageid = $id ? $id : (GetReq('id') ? GetReq('id') : GetReq('cat'));
		$mc_page = GetReq('t') ? GetReq('t') : (isset($_GET['mc_page']) ? $_GET['mc_page'] : $defpage);
		$force_page = GetReq('t') ? GetReq('t') : $_GET['mc_page'];
		
		//override due to cptemplate
		$MC_TEMPLATE = $this->template; 
				
		$mctmpl = $tmplname ? $tmplname : $MC_TEMPLATE;
		
		if ($MC_TEMPLATE) {		
		
			$sSQL = 'select mcname from wftmpl where ';
			$sSQL.= ($pageid) ? 'mcid=' . '"' . $pageid . '" ' : 'mcid=' . '"' . $mc_page . '" ';
			$sSQL.= 'and mctmpl='. '"' . $mctmpl . '" ';

            //echo $sSQL;			  
			$result = $db->Execute($sSQL,2);
			$page = $result->fields['mcname'];
			
			if ($forcet)
				$ret = $force_page ? $force_page : $page;
			else
				$ret = $page ? $page : $mc_page;

            $this->MC_CURRENT_PAGE = $ret;
		    //echo $this->MC_CURRENT_PAGE;			
			return ($ret); 
		}
        $this->MC_CURRENT_PAGE = $mc_page;
		//echo $this->MC_CURRENT_PAGE;
        return ($mc_page);   		
	}
	
	public function mcSavePage($id=null,$mcpage=null,$tmplname=null) {
	    if ((!$id) || (!$mcpage)) return;
	    $db = GetGlobal('db');
		//$mctmpl = $tmplname ? $tmplname : $this->MC_TEMPLATE;
		
		//override due to cptemplate
		$MC_TEMPLATE = $this->template; 		
		
		$mctmpl = $tmplname ? $tmplname : $MC_TEMPLATE;
		
		if ($MC_TEMPLATE) {		
		
			$sSQL = 'select mcname from wftmpl where ';
			$sSQL.= 'mcid=' . '"' . $id . '" ';
			$sSQL.= 'and mctmpl='. '"' . $mctmpl . '" ';
            //echo $sSQL;			  
			$result = $db->Execute($sSQL,2);
			$current_page = $result->fields['mcname'];
			//echo $current_page,'>';
			if (!$current_page) {
				$sSQL = 'insert into wftmpl (mcid,mcname,mctmpl) values (';
				$sSQL.= "'".$id."',";
				$sSQL.= "'".$mcpage."',";
				$sSQL.= "'".$mctmpl."')";
			}
			else {
				$sSQL = 'update wftmpl set mcname="'. $mcpage .'" where';
				$sSQL.= " mcid='".$id."' and";
				$sSQL.= " mctmpl='".$mctmpl."'";			
			}
			$result = $db->Execute($sSQL);
			//echo $sSQL;
			return true;
		}
        
        return false;   		
	}	
	
	/*fetch t cmd from turl editmode*/
	public function mc_parse_editurl($turl=null) {
	    
	    if ($turl) {
			$pt = explode('?',$turl);
			parse_str($pt[1], $args);
			$query_page = ($args['t']!=null) ? $args['t'] . '.php' : $pt[0];
			$default_page = str_replace('.php','',$query_page);
											   
			/*sql select*/								
			$pageid = $args['id'] ? $args['id'] : ($args['cat'] ? $args['cat'] : ($args['t'] ? $args['t'] : $default_page));	
            $mc_page = $this->mcSelectPage($pageid, $default_page) . '.php';			
			//echo $mc_page;
			return ($mc_page);
		}
		return 'index.php';
	}	
	
	public function mc_read_files($path=null,$ext=null,$url=null,$retarray=null) {
	    $urlpagename = $url ? $url : 'index.php';
	    $path = $path ? $path : null;
		$ext = $ext ? $ext : 'php';

		//override due to cptemplate
		$MC_TEMPLATE = $this->template; 
		
		$bpath = $this->prpath.$this->htmlpage."/".$MC_TEMPLATE.'/'.$path;		
		
	    $mydir = dir($bpath);
		while ($fileread = $mydir->read ()) { 
			if (($fileread!='.') && ($fileread!='..')) {
				if (stristr($fileread,'.'.$ext))
                    $mcfiles[str_replace('.'.$ext,'',$fileread)] = str_replace('.'.$ext,'',$fileread); 				
            }
        }
        ksort($mcfiles);
        //return ($mcfiles);
		if ($retarray) return $mcfiles;
		  
		foreach ( $mcfiles as $mcf => $mcname )
			$ret .=	'<li><a href="'.$urlpagename.'?mc_page='.$mcf.'&amp;style='. $_GET['style'].'">'.$mcname.'</a></li>';
		return ($ret);		
	}
	
	public function current_language() {
		$loclan = localize($this->language, getlocal());
		return ($loclan);
    }	
	
	public function iso_language() {
		return ($this->isolanguage);
    }
	
	public function slocale($id=null) {
	    $ret = localize($id, getlocal());
		return ($ret ? $ret : '_loc_');
	}
	
	public function slocaleParam($param=null) {
		$id = GetGlobal($param) ? GetGlobal($param) : GetSessionParam($param); 
	    $ret = localize($id, getlocal());
		return ($ret ? $ret : '_loc_');
	}	
	
	
	//UTF-8
	
	public function strutf2iso($string=null,$encoding='ISO-8859-7') {
		$ret = iconv("UTF-8", 'ISO-8859-7', $string);	
		return ($ret);
	}	
	
	public function strutf2ascii($string=null) { //CP437,ASCII,CP1252
	    //echo 'source:'.$string;
		//$ret = iconv("UTF-8", 'ASCII//TRANSLIT', $string);	
		//$ret = mb_convert_encoding($string,'CP1252');
		$ret = urlencode($string);
		return ($ret);
	}
	
	public function strutf2md5($string=null) {
		$ret = md5($string);
		return ($ret);	
	}
	
	public function echostr($param=null) {
		if (stristr($param,'.')) //dpc var
		  $s = _v($param);
		else  
		  $s = GetGlobal($param) ? GetGlobal($param) : (GetParam($param) ? GetParam($param) : $param);		
		return ($s);
	}
	
    public function cpUsername() {
		$username = GetSessionParam('LoginName') ? GetSessionParam('LoginName') : $_POST['cpuser'];
		$p = explode('@', $username);
		$name =  $p[0];	
		
		return ($name);
    }	
	
    protected function javascript_ajax()  {
   
      $jscript = <<<EOF
function createRequestObject() {var ro; var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){ro = new ActiveXObject("Microsoft.XMLHTTP");} 
	else{ro = new XMLHttpRequest();} return ro;}
var http = createRequestObject();
function sndUrl(url) {http.open('get', url); http.send(null);}
function sndReqArg(url) {var params = url; http.open('post', params, true); http.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    http.setRequestHeader("encoding", "utf-8");	http.onreadystatechange = handleResponse; http.send(null);}
function handleResponse() {if(http.readyState == 4){
    var response = http.responseText;
    var update = new Array();
    response = response.replace( /^\s+/g, "" ); 
    response = response.replace( /\s+$/g, "" );		
    if(response.indexOf('|' != -1)) { /*alert(response); */ update = response.split('|');
        document.getElementById(update[0]).innerHTML = update[1];}}}

EOF;

      return ($jscript);
   }

	protected function createcookie_js() {
		
		$ret = '
function cc(name,value,days) {
    if (days) { var date = new Date(); date.setTime(date.getTime()+(days*24*60*60*1000)); var expires = "; expires="+date.toGMTString();} else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/; domain=.'.str_replace('www.','',$_SERVER['HTTP_HOST']).';" }
';
        return ($ret);
	}

	protected function javascript() {
        if (iniload('JAVASCRIPT')) {
           	$code = $this->createcookie_js();				
			$code.= $this->javascript_ajax();

		    $js = new jscript;
            $js->load_js($code,"",1);			   
		    unset ($js);		
     	}	  
	}	
};
}
?>