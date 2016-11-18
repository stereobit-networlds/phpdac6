<?php
$__DPCSEC['CMS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

function _v($v=null,$val=null) {
	return $v ? GetGlobal('controller')->calldpc_var($v, $val) : null;
}

function _m($m=null, $noerr=null) {
	return $m ? GetGlobal('controller')->calldpc_method($m, $noerr) : null;
}

if ((!defined("CMS_DPC")) && (seclevel('CMS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CMS_DPC",true);

$__DPC['CMS_DPC'] = 'cms';

$a = GetGlobal('controller')->require_dpc('cms/fronthtmlpage.dpc.php');
require_once($a);

class cms extends fronthtmlpage {

    var $appname, $url;
	var $seclevid, $userDemoIds;
	var $tpath, $template;
	
	var $session_use_cookie, $protocol, $secprotocol, $sslpath;
	var $activeSSL, $encURLparam;
		
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
	}
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}	

	public function isLevelUser($level=6) {
		return ($this->seclevid>=$level ? true : false);
	}

	protected function seturl($query=null, $title=null, $jscript=null, $ssl=0) { //,$sid=1,$rewrite=null) {
  
		$rewrite = true; //$rewrite ? $rewrite : paramload('SHELL','rewrite');
		//if ($this->session_use_cookie) $sid = 0; DISABLED SID  
  
		$subpath = pathinfo($_SERVER['PHP_SELF'],PATHINFO_DIRNAME);  
  
		$query_p = explode("|",$query); //holds path and ?pama=... in the form of xz/z/|t=1
		//print_r($query_p);
		if (isset($query_p[1])) {
			$query = $query_p[1];
			$subpath = $query_p[0];
		}	
		else 
			$query = $query_p[0];
		//echo $query,">>>";	
 
		if ($subpath=="\\") $subpath = null;  
  
		//look if ip is in ip pool	
		$ipool = arrayload('SHELL','ip'); 
		$ip = (in_array($_SERVER['HTTP_HOST'],$ipool)) ? $_SERVER['HTTP_HOST'] : $ipool[0]; //default  
  
        $name = (($this->activeSSL) && ($ssl)) ? $this->secprotocol . $ip . $this->sslpath : $this->protocol . $ip; 
                         
		//mv controller or page controller caller???
		$xurl = "/".pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);

		//fun called by mv cntrl
		if (paramload('SHELL','filename')==$xurl) {
		    //get page if exist..(t=page)!!!!!!!!!!!!!!!!!!!!!!!!!!
            if ($page = getpurl($query, $title, $ssl, $jscript, $ssl)) {
			    $name .= "/" . $page;//page cntrl
			    //echo "[",$name,"]<br>";
			}
			else						 
			    $name .= paramload('SHELL','filename');				
		}  		   
		else {//fun called by page cntrl  
			$mysubpath = ($subpath<>'/') ? $subpath.'/' : $subpath;
		    $name .= $mysubpath . pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME);  //double slash //....solved
			//echo $mysubpath,'>',pathinfo($_SERVER['PHP_SELF'],PATHINFO_BASENAME),'>';
		}  
						 
		//echo $name,"<br>";
						 
        if (isset($query)) {
            if ($query!="#") {
				//if ($rewrite) {
				    $aquery = explode('&',$query);
				    foreach ($aquery as $a=>$q) {
				        $aparam = explode('=',$q);
						$url .=  $aparam[1] .'/';
				    }
					//print_r($aquery);
					//echo $url,'<br>';
				/*}
				else {
	                $url = $name . "?"; //. $query;
	                $url.= $this->encURLparam ? encode_url($query, $this->encURLparam) : $query;
	                //if ($sid) $url .=  "&" . SID;
				}*/
	        }  
	        else 
	            $url = "#"; 
        }				
        else  
            $url = $name;//(isset($sid) ? $name . '?' . SID : $name; 
                         
        $out = $title ? "<a href='" . $url . "' $jscript>" . $title . "</a>" : $url;

		return ($out);
	}
	
	public function url($query=null, $title=null, $jscript=null, $ssl=0) {
		return $this->seturl($query, $title, $jscript, $ssl);
	}
};
}
?>