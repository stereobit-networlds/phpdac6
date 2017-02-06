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

    var $appname, $httpurl, $tpath;
	var $seclevid, $userDemoIds;
	var $session_use_cookie, $protocol, $secprotocol, $sslpath;
	var $activeSSL, $encURLparam, $shellfn, $dothtml;
		
	function __construct() {
		
		fronthtmlpage::__construct();
		
		$this->appname = paramload('ID','instancename');		
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); //8 
		
		$this->tpath = $this->htmlpage; //fronthtmlpage
		$this->httpurl = paramload('SHELL','protocol') . $this->url;	

		$this->session_use_cookie = paramload('SHELL','sessionusecookie');
		$this->protocol = paramload('SHELL','protocol');
		$this->secprotocol = paramload('SHELL','secureprotocol');  
		$this->sslpath  = paramload('SHELL','sslpath');	
		$this->activeSSL = paramload('SHELL','ssl');
        $this->encURLparam = paramload('SHELL','encodeurl');
		$this->shellfn = paramload('SHELL','filename');

		$this->dothtml = false; //true; //paramload('SHELL','rewritedothtml');		
		
		$this->loadVariables();
	}
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}	

	public function isLevelUser($level=6) {
		return ($this->seclevid>=$level ? true : false);
	}

    public function paramload($section,$param) {
		$config = GetGlobal('config');
		//echo $param;
		if ($ret = $config[$section][$param]) 
			return ($ret); 
    }

    public function arrayload($section,$array) {
		$config = GetGlobal('config');
  
		if ($data = $config[$section][$array]) 
			return(explode(",",$data));
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
	
	public function urlCanonical() {
		$ub = $this->paramload('SHELL', 'urlbase');		
		$canonical = $this->paramload('CMS', 'canonical'); //.html		
		
		if (($_GET['id']) && ($canonical)) {
			$ret = $ub . "/$cat/$id" . $canonical;
		}	
		elseif (($_GET['cat']) && ($canonical)) {
			$ret = $ub . "/$cat" . $canonical; 
		}
		else
			$ret = $ub . $this->php_self();
		
		return $ret;
	}
	
	protected function loadVariables() {
		$db = GetGlobal('db');
		$lan = getlocal();
		$currlang = $lan ? $lan : '0';
		$vars = null;
		
		global $__DPCLOCALE;
		
		if (!$variablesloaded = GetSessionParam('cmsvars')) {

			$sSQL = "select name,value,value0,value1,value2,translate,cookie,session,section,varname,usevarname from cmsvariables WHERE active=1";
			$res = $db->Execute($sSQL);
			
			foreach ($res as $i=>$rec) {
				//echo $rec['name'].':'.$rec['value'];
				$s = $rec['section'] ? $rec['section'] : 'VAR';
				$n = $rec['usevarname'] ? $rec['varname'] : $rec['name'];					
				$v = $rec['value'];				
				
				if ($rec['translate']==1) {
					//set translation variable
					$__DPCLOCALE[$n] = $rec['value0'] . ';' . $rec['value1'] . ';' . $rec['value2'];
				}
				elseif ($rec['cookie']==1) {
					//save as cookie
					//settheCookie($n, $v); //always DO NOT
				}
				elseif ($rec['session']==1) {
					//save in session
					//SetSessionParam($n, $v); //always DO NOT
				}
				else {
					//save as global var, config style global var
				    $vars[$s][$n] = $v;
				}
			}
			
			//extra variable conf
			if (!empty($vars)) {
				$config = array_merge(GetGlobal('config'), $vars); 			
				SetGlobal('config',$config); 
				//echo 'conf';
			}	

			//SetSessionParam('cmsvars', 1); //save loaded state DO NOT
			return true;
		}

		return false; //already loaded	
	}
	
	public function callVar($name=null, $section=null) {
		if (!$name) return null;
		$sec = $section ? $section : 'VAR';		
		
		//time based vars TTL //STR_TO_DATE('$dstart','%m-%d-%Y')
		$db = GetGlobal('db');
		$sSQL = "select value,start,stop,inodd,ineven,inday,inmonth,inyear,isvar,islocale,";
		$sSQL.= " DAY(NOW()) as day, MONTH(NOW()) as month, YEAR(NOW()) as year, NOW() as now from cmsvartimes";
		$sSQL.= " WHERE active=1 and name=" . $db->qstr($name);
		$sSQL.= " and NOW() BETWEEN start AND stop";
		$sSQL.= " order by datein DESC LIMIT 1"; //newest record
		$res = $db->Execute($sSQL);
		//echo $res->fields['day'];
		
		if ($value = $res->fields[0]) {
			$oddday = ($res->fields['day'] % 2 == 0) ? false : true;
			$oddmonth = ($res->fields['month'] % 2 == 0) ? false : true;	
			$oddyear = ($res->fields['year'] % 2 == 0) ? false : true;
			//echo $oddday,$sSQL;
			
			$varvalue = $res->fields['isvar'] ? $this->paramload($sec, $value) : $value;
			
			if (($res->fields['inday']) && ($res->fields['inodd']) && ($oddday==true)) {
				//echo 'odd day',$varvalue;
				return _m($varvalue);
			}
			elseif (($res->fields['inday']) && ($res->fields['ineven']) && ($oddday==false)) {
				//echo 'even day';
				return _m($varvalue);
			}
			elseif (($res->fields['inmonth']) && ($res->fields['inodd']) && ($oddmonth==true)) {
				//echo 'odd month';
				return _m($varvalue);
			}
			elseif (($res->fields['inmonth']) && ($res->fields['ineven']) && ($oddmonth==false)) {
				//echo 'even month';
				return _m($varvalue);
			}
			elseif (($res->fields['inyear']) && ($res->fields['inodd']) && ($oddyear==true)) {
				//echo 'odd year';
				return _m($varvalue);
			}
			elseif (($res->fields['inyear']) && ($res->fields['ineven']) && ($oddyear==false)) {
				//echo 'even year';
				return _m($varvalue);
			}
			else { //if odd and even is off
				//echo 'a';
				if ((!$res->fields['inodd']) && (!$res->fields['ineven']))
					return _m($varvalue); //always
			}	
			
			/*
			if ($res->fields['isvar']) {
				$varvalue = $this->paramload($sec, $value);
				return _m($varvalue);
			}	
			elseif ($res->fields['islocale']) {
				$varvalue = localize($value, getlocal());
				return ($varvalue);
			}	
			else
				$varvalue = $value; */
		}	
		//else 
		//standart vars, conf or locale values
		$varvalue = $this->paramload($sec, $name);
		
		//echo $varvalue;
		if ($varvalue) 
			return (strstr($varvalue, '.')) ? _m($varvalue) : localize($varvalue, getlocal());

		return null;	
	}
};
}
?>