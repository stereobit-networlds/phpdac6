<?php

$__DPCSEC['RCNEWSLETTER_DPC']='1;1;1;1;1;1;2;2;9';

if ( (!defined("RCNEWSLETTER_DPC")) && (seclevel('RCNEWSLETTER_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCNEWSLETTER_DPC",true);

$__DPC['RCNEWSLETTER_DPC'] = 'rcnewsletter';


$__EVENTS['RCNEWSLETTER_DPC'][0]='ns';
$__EVENTS['RCNEWSLETTER_DPC'][1]='cpnewsletter';
$__EVENTS['RCNEWSLETTER_DPC'][2]='cpnewscont';

$__ACTIONS['RCNEWSLETTER_DPC'][0]='ns';
$__ACTIONS['RCNEWSLETTER_DPC'][1]='cpnewsletter';
$__ACTIONS['RCNEWSLETTER_DPC'][2]='cpnewscont';

$__LOCALE['RCNEWSLETTER_DPC'][0]='RCNEWSLETTER_DPC;Newsletter;Newsletter';

class rcnewsletter {
	
	var $title, $prpath, $urlpath, $url;
	var $nspath, $ok;
	var $hashtag, $mc, $cid, $url2store;
	var $redir;

    function __construct() {
		
	  $this->prpath = paramload('SHELL','prpath');
      $this->urlpath = paramload('SHELL','urlpath');	
	  $this->url = paramload('SHELL','urlbase');
	  $this->title = localize('RCNEWSLETTER_DPC',getlocal());

      $this->nspath = $this->prpath . remote_paramload('FRONTHTMLPAGE','path', $this->prpath);
	  $pr = remote_paramload('RCNEWSLETTER','path', $this->prpath);
	  $this->redir = $pr ? $pr : '/subscribe/';
	  $this->url2store = $_SERVER['REQUEST_URI'];//.$_SERVER['QUERY_STRING']; //basename($_SERVER['REQUEST_URI']);
	  //echo $u	  
	  
	  $this->ok = false;
	  
	  //get or cookie
	  $this->hashtag = $_GET['ht'] ? $_GET['ht'] : $_COOKIE['hashtag']; //fetch generic hashtag if any
      $this->cid = $_GET['cid'] ? $_GET['cid'] : $_COOKIE['cid'];
      $this->mc = $_GET['r'] ? $_GET['r'] : $_COOKIE['mc']; //base64 encoded	  
	  
	  $this->javascript(); //check for hash and save cookies	
	}
	
    function event($event=null) {		

       if (!$this->msg) {
  
	     switch ($event) {
		 
		    case 'cpnewscont'     : echo $this->callback_update_html();
							        die();// $this->mc.','.$this->cid.','.$this->hashtag);
							        break;									
	        case 'cpnewsletter'   :
			case 'ns'             :
			default               :	//$this->ok = $this->reformNs();
                                    $this->update_url_statistics();	//after ajax callback		
         }
      }
    }	

    function action($action=null)  { 

	     switch ($action) {
		   case 'cpnewscont'     : break;	 
		   case 'cpnewsletter'   : break;
		   default               : $out = null;//($this->ok) ? null : die('writing error');
		 }			 

	     return ($out);
	}	
	
	function javascript() {
        if (iniload('JAVASCRIPT')) {
		
		    //became universal
           	$code = $this->createcookie_js();				
			
		    //return no js when tags already loaded 
			//if (isset($this->hashtag) || (isset($this->cid) && isset($this->mc))) {}
			//else {	
				$code.= $this->javascript_ajax();			
				$code.= $this->reference_js();		
			//}	
			
		    $js = new jscript;
            $js->load_js($code,"",1);			   
		    unset ($js);		
     	}	  
	}
	
	/*not to use with rcvstats */
	protected function createcookie_js() {
		
		$ret = '
function cc(name,value,days) {
    if (days) { var date = new Date(); date.setTime(date.getTime()+(days*24*60*60*1000)); var expires = "; expires="+date.toGMTString();} else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/; domain=.'.str_replace('www.','',$_SERVER['HTTP_HOST']).';" }
';
        return ($ret);
	}	
	
	protected function reference_js() {	
		//if value 1 means a redir reference hash to split in 2 (save ref for one day)
		//else is another type of hash (days keep ?)
		//create cookie is a part of shkatalogmedia js		
		//cc=createcookies of shkatalogmedia /not loaded yet
		$code = '		
if (window.location.hash) {
	var hash = window.location.hash.substring(1);
	var value = hash.split("|");
	if (value[1]!=null) { cc("cid",value[0],"1"); cc("mc",value[1],"1");} else cc("hashtag",hash,"1");
	//alert(value[0]);
	sndUrl("ns.php?t=cpnewscont&cid="+value[0]+"&r="+value[1]);
}
else { }		
';
//	window.location = "'.$this->redir.'"; 
		return ($code);
	}

    protected function javascript_ajax()  {
   
      $jscript = <<<EOF
function createRequestObject() {var ro; var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){ro = new ActiveXObject("Microsoft.XMLHTTP");} else{
        ro = new XMLHttpRequest();}
    return ro;}
var http = createRequestObject();
function sndUrl(url) {
    http.open('get', url+'&ajax=1');
    http.onreadystatechange = handleResponse;
    http.send(null);
}
function sndReqArg(url) {var params = url+'&ajax=1';
    http.open('post', params, true);
    http.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    http.setRequestHeader("encoding", "utf-8");	
    http.onreadystatechange = handleResponse;	
    http.send(null);
}
function handleResponse() {if(http.readyState == 4){
    var response = http.responseText;
    var update = new Array();
    response = response.replace( /^\s+/g, "" ); // strip leading 
    response = response.replace( /\s+$/g, "" ); // strip trailing		
    if(response.indexOf('|' != -1)) {
        //alert(response); 	
        update = response.split('|');
        //document.getElementById(update[0]).innerHTML = update[1];
		//alert(update[1]);
		window.location = update[1];
    }	
  }
}

EOF;

      return ($jscript);
   }	
	
	/*replace track data to the user details when come to see the web page of a mail*/
	/*replace by ajax call...due to hash problem*/
	protected function reformNs() {
		if (!$this->cid) return false;
		//echo $this->cid,'>';
		$sourcename = $this->nspath . '/' . $this->cid . '.html';
		
		if (!file_exists($sourcename)) //campaign file
			return false;
			
		$nsContents = @file_get_contents($sourcename);
		$newContent = str_replace(array('_CID_', '_TRACK_','<!--REMARK--><p>','</p><!--REMARK-->'), 
		                          array($this->cid, $this->mc, '<!--p>', '</p-->'), $nsContents);
		
		//create a copy 
		$filename = $this->nspath . '/' . $this->mc . '.html';
		if (!file_exists($filename))
			$nsContents = @file_put_contents($filename, $newContent, LOCK_EX);
		else
			$nsContents = 1; //exist
		
		return ($nsContents);
	}
	
	protected function callback_update_html() {
		if (!$this->cid) return ('nocid');
		$sourcename = $this->nspath . '/' . $this->cid . '.html';
		
		if (!file_exists($sourcename)) //campaign file
			return ('nocfile');
			
		$nsContents = @file_get_contents($sourcename);
		$newContent = str_replace(array('_CID_', '_TRACK_','<!--REMARK--><p>','</p><!--REMARK-->'), 
		                          array($this->cid, $this->mc, '<!--p>', '</p-->'), $nsContents);
								  
		//create a copy 
		$filename = $this->nspath . '/' . $this->mc . '.html';
		//if (!file_exists($filename)) //diff campaigns cids/client mail, needs to recreate the file every time
			$nsContents = @file_put_contents($filename, $newContent, LOCK_EX);
		//else
			//$nsContents = 1; //exist								  
		
		return ('1|ns.php?a='.urlencode($this->mc));		
	}
	
	protected function update_url_statistics() {
        $db = GetGlobal('db'); 

        $UserName = GetGlobal('UserName');		
		$name = $UserName ? decode($UserName) : session_id();			
	    $currentdate = time();
	    $mydate = $db->qstr(date('Y-m-d h:i:s',$currentdate));		
	    $myday  = date('d',$currentdate);	
	    $mymonth= date('m',$currentdate);	
	    $myyear = date('Y',$currentdate);	
		
		$ref = $this->cid ? $this->cid : '';
		$cmail = $this->mc ? base64_decode($this->mc) : ($this->hashtag ? $this->hashtag : '');

		$sSQL = "insert into stats (date,day,month,year,attr1,attr2,attr3, ref) values (";
		$sSQL.= $mydate . ",";
		$sSQL.= $myday . ",";
		$sSQL.= $mymonth . ",";
		$sSQL.= $myyear . ",";						
		$sSQL.= $db->qstr($this->url2store) . ",";		
		$sSQL.= $db->qstr($name) . ","; 
		$sSQL.= $db->qstr($cmail) . ",";
		$sSQL.= $db->qstr($ref) . ")";
		//echo $sSQL;		
		$db->Execute($sSQL,1);	 		

		if ($db->Affected_Rows()) {
		  return true;
		}  
		else 
		  return false;		
	}		
					
};
}
?>