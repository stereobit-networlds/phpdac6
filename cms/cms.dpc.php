<?php
$__DPCSEC['CMS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

//namespace cms;

function _v($v=null,$val=null) {
	return $v ? GetGlobal('controller')->calldpc_var($v, $val) : null;
}

function _m($m=null, $noerr=null) {
	return $m ? GetGlobal('controller')->calldpc_method($m, $noerr) : null;
}

function _m2($m=null, $params=array()) {
	$mf = $m ? explode('.', $m) : null;
	return empty($mf) ? null : call_user_func_array(array($mf[0], $mf[1]), $params);
	//call_user_func_array(array(__NAMESPACE__ . "\\" . $mf[0], $mf[1]), $params); //5.3.0 namespace
}

if ((!defined("CMS_DPC")) && (seclevel('CMS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CMS_DPC",true);

$__DPC['CMS_DPC'] = 'cms';

$a = GetGlobal('controller')->require_dpc('cms/fronthtmlpage.dpc.php');
require_once($a);

class cms extends fronthtmlpage {

    var $appname, $url, $tpath;
	var $seclevid, $userDemoIds;
	var $session_use_cookie, $protocol, $secprotocol, $sslpath;
	var $activeSSL, $encURLparam, $shellfn, $dothtml;
		
	function __construct() {
		
		fronthtmlpage::__construct();
		
		$this->appname = paramload('ID','instancename');		
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); //8 
		
		$this->tpath = $this->htmlpage; //fronthtmlpage	

		$this->session_use_cookie = paramload('SHELL','sessionusecookie');
		$this->protocol = paramload('SHELL','protocol');
		$this->secprotocol = paramload('SHELL','secureprotocol');  
		$this->sslpath  = paramload('SHELL','sslpath');	
		$this->activeSSL = paramload('SHELL','ssl');
        $this->encURLparam = paramload('SHELL','encodeurl');
		$this->shellfn = paramload('SHELL','filename');

		$this->dothtml = false; //true; //paramload('SHELL','rewritedothtml');		
	}
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}	

	public function isLevelUser($level=6) {
		return ($this->seclevid>=$level ? true : false);
	}

	
	//page cntrl logic url creator
	protected function getpurl($query=null, $title=null) {
	
		parse_str($query, $parts);
	  
		if (array_key_exists('t', $parts)) {
	  
			$pagename = $parts['t'];
			$url = $this->urlpath;
			
			if ($this->activeSSL)
				$url .= $this->sslpath;
			
			$url .= "/" . $pagename . ".php"; 

			if (file_exists($url))
				return ($pagename . ".php");
		}	
	  
		return false;
	} 	
	
	public function seturl($query=null, $title=null, $jscript=null, $norewrite=null) {   
   
		//look if ip is in ip pool	
		$ipool = arrayload('SHELL','ip'); 
		$ip = (in_array($_SERVER['HTTP_HOST'],$ipool)) ? $_SERVER['HTTP_HOST'] : $ipool[0]; //default  
  
        $name = $this->activeSSL ? $this->secprotocol . $ip . $this->sslpath : $this->protocol . $ip; 
                         
		//mv controller or page controller caller???
		$xurl = "/" . pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);

		//fun called by mv cntrl
		if ($this->shellfn == $xurl) {
		    //get page if exist..(t=page)!!!!!!!!!!!!!!!!!!!!!!!!!!
            if ($page = $this->getpurl($query, $title)) {
			    $name .= "/" . $page;//page cntrl
			    //echo "[",$name,"]<br>";
			}
			else						 
			    $name .= "/" . $this->shellfn;				
		}  		   
		else  
		    $name .= "/" . pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);  
						 
		//echo $name,"<br>";
						 
        if (isset($query)) {
            if ($query!="#") {
				if ($norewrite) {
					$url = $name . "?" . $query;
				}	
				elseif (strstr($query, '=')) { //NOT & (may t=) unparsed query
					/*parse query*/
					parse_str($query, $parts);
					$url =  /*$ip. '/' .*/ implode('/', $parts) . '/';
				}
				else  //already parsed query from this->url()
	                $url = $query; //as is
	        }  
	        else 
	            $url = "#"; 
        }				
        else  
            $url = $name; 
                         
        $out = $title ? "<a href='" . $url . "' $jscript>" . $title . "</a>" : $url;

		return ($out);
	}
	
	public function url($query=null, $title=null, $jscript=null, $dothtml=null) {
		$rewritedothtml = $dothtml ? $dothtml : $this->dothtml;
			
		/*.html handler for categories and items 
		
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteRule ^([^\.]+)/([^\.]+).html$ katalog.php?t=kshow&cat=$1&id=$2 [L]
		RewriteRule ^([^\.]+).html$ katalog.php?t=klist&cat=$1 [NC,L]
		*/
		if ($rewritedothtml) { 
		
			if (isset($query)) {

				parse_str($query, $parsed_params);
				$parsed_query =  implode('/', $parsed_params) . '/';
				$cpq = count($parsed_params); //count query params
				
				switch ($cpq) {
					case 3  : 	//t,cat,id
								$ret = (($parsed_params['id']) && ($parsed_params['cat'])) ?
										$parsed_params['cat'] . '/' . $parsed_params['id'] . '.html' :
										$this->seturl($parsed_query, $title, $jscript);
								break;	
					case 2  : 	//t,cat
								$ret = ($parsed_params['cat']) ?
										$parsed_params['cat'] . '.html' :
										$this->seturl($parsed_query, $title, $jscript);
								break;	
					case 1  : 	//t
					default :	$ret = $this->seturl($parsed_query, $title, $jscript);			
				}
				return ($ret);
			}
		}
		
		return $this->seturl($query, $title, $jscript);
	}
};
}
?>