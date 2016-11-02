<?php
$__DPCSEC['CMSVSTATS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CMSVSTATS_DPC")) && (seclevel('CMSVSTATS_DPC',decode(GetSessionParam('UserSecID')))) ) {

define("CMSVSTATS_DPC",true);

$__DPC['CMSVSTATS_DPC'] = 'cmsvstats';

$__EVENTS['CMSVSTATS_DPC'][0]='cmsvstats';
$__EVENTS['CMSVSTATS_DPC'][1]='cmsvmcstart';

$__ACTIONS['CMSVSTATS_DPC'][0]='cmsvstats';
$__ACTIONS['CMSVSTATS_DPC'][1]='cmsvmcstart';

$__DPCATTR['CMSVSTATS_DPC']['cmsvstats'] = 'cmsvstats,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['CMSVSTATS_DPC'][0]='CMSVSTATS_DPC;Statistics;Στατιστική';

class cmsvstats  {

    var $title;
	var $mc, $cid, $hashtag;
		
	function __construct() {

	  $this->title = localize('CMSVSTATS_DPC',getlocal());			
	  
	  $this->hashtag = $_COOKIE['hashtag']; //fetch generic hashtag if any
	  $this->cid = $_COOKIE['cid']; //fetch mail campaign id	  
	  $this->mc = $_COOKIE['mc'];	//fetch client mail base64encoded
	  
	  $this->javascript(); //check for hash and save cookies	  
	}
	

    function event($event=null) {		 

	   switch ($event) {
		   
		 case 'cmsvmcstart'  : $this->callback_update_first_referece_record();
							  die();// $this->mc.','.$this->cid.','.$this->hashtag);
							  break; 

	     case 'cmsvstats'   :
		 default            : 
	   }
		
    }   

    function action($action=null) {

	  switch ($action) {
		  
		 case 'cmsvmcstart' : break;  
	     case 'cmsvstats'   :
		 default            : $out .= $this->show_statistics();

	  }	 
	  return ($out);
    }

	
	function javascript() {
        if (iniload('JAVASCRIPT')) {
		
		    //became universal
           	//$code = $this->createcookie_js();	//fronthtmlpage universal			
			
		    //return no js when tags already loaded 
			if (isset($this->hashtag) || (isset($this->cid) && isset($this->mc))) {}
			else {	
				//$code.= $this->javascript_ajax();	//fronthtmlpage universal
				$code.= $this->reference_js();			
		
				$js = new jscript;
				$js->load_js($code,"",1);			   
				unset ($js);		
			}	
     	}	  
	}
	
	protected function createcookie_js() {
		
		$ret = '
function cc(name,value,days) {
    if (days) { var date = new Date(); date.setTime(date.getTime()+(days*24*60*60*1000)); var expires = "; expires="+date.toGMTString();} else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/; domain=.'.str_replace('www.','',$_SERVER['HTTP_HOST']).';" }
';
        return ($ret);
	}
	
	//save hasg tag comming from redirection page mtrackurl at root app
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
	sndUrl("katalog.php?t=cmsvmcstart");
}
else { }		
';
		return ($code);
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
	
	
	
	//hash can't fetched for first time by php (not yet saved in cookies)
	//this function update the last rec were no tag info = first in tags history
	//run once when cookie set
	protected function callback_update_first_referece_record() {
        $db = GetGlobal('db'); 
        $UserName = GetGlobal('UserName');	
		$name = $UserName ? decode($UserName) : session_id();
		$ref = $this->cid ? $this->cid : ($this->hashtag ? $this->hashtag : '');
		$cmail = $this->mc ? base64_decode($this->mc) : '';		
		$day = date('d'); $month = date('m'); $year = date('Y');
		$sSQL = "select id from stats where attr2=" . $db->qstr($name) . " and (attr3='' or ref='') ";
		$sSQL.= "and year='$year' and month='$month' and day='$day' order by id desc LIMIT 1";
     	$res = $db->Execute($sSQL,2);
        if (!empty($res->fields)) {
			$sSQL = "update stats set attr3=".$db->qstr($cmail).", ref=".$db->qstr($ref)." where id=".$res->fields[0];
			//echo $sSQL;
			$db->Execute($sSQL,1);	 		
			if ($db->Affected_Rows()) 
				return true;
        }	
		return false;			
	}	

	public function update_item_statistics($id, $attr1=null, $iref=null) {
        $db = GetGlobal('db'); 
        $UserName = GetGlobal('UserName');	
		$name = $UserName ? decode($UserName) : session_id();
		
		if (GetSessionParam('ADMIN'))
			return false;

	    $currentdate = time();
	    $mydate = $db->qstr(date('Y-m-d h:i:s',$currentdate));		
	    $myday  = date('d',$currentdate);	
	    $mymonth= date('m',$currentdate);	
	    $myyear = date('Y',$currentdate);

		$ref = $this->cid ? $this->cid : ($this->hashtag ? $this->hashtag : ($iref ? $iref : ''));
		$cmail = $this->mc ? base64_decode($this->mc) : '';		
						
		//$sSQL = "insert into stats (date,day,month,year,tid,attr2,attr3,ref,attr1,REMOTE_ADDR,HTTP_X_FORWARDED_FOR) values (";
		$sSQL = "insert into stats (day,month,year,tid,attr2,attr3,ref,attr1,REMOTE_ADDR,HTTP_X_FORWARDED_FOR,HTTP_USER_AGENT) values (";
		//$sSQL.= $mydate . ",";
		$sSQL.= $myday . ",";
		$sSQL.= $mymonth . ",";
		$sSQL.= $myyear . ",";						
		$sSQL.= $db->qstr($id) . ',';
        $sSQL.= $db->qstr($name) . ','; 
		$sSQL.= $db->qstr($cmail) . ',';
		$sSQL.= $db->qstr($ref) . ",";		
		$sSQL.= $db->qstr($attr1) . ",";
		$sSQL.= $db->qstr($_SERVER['REMOTE_ADDR']) . ",";
		$sSQL.= $db->qstr($_SERVER['HTTP_X_FORWARDED_FOR']) . ","; 
		$sSQL.= $db->qstr($_SERVER['HTTP_USER_AGENT']). ")";			
		//echo $sSQL;
		$db->Execute($sSQL,1);	 		
		if ($db->Affected_Rows()) 
		  return true;
		else 
		  return false;		
	}

	public function update_category_statistics($cat, $tid=null, $iref=null) {
        $db = GetGlobal('db'); 
		
		if (GetSessionParam('ADMIN'))
			return false;		

        $UserName = GetGlobal('UserName');		
		$name = $UserName ? decode($UserName) : session_id();			
	    $currentdate = time();
	    $mydate = $db->qstr(date('Y-m-d h:i:s',$currentdate));		
	    $myday  = date('d',$currentdate);	
	    $mymonth= date('m',$currentdate);	
	    $myyear = date('Y',$currentdate);	
		
		$ref = $this->cid ? $this->cid : ($this->hashtag ? $this->hashtag : ($iref ? $iref : ''));
		$cmail = $this->mc ? base64_decode($this->mc) : '';

		$sSQL = "insert into stats (day,month,year,attr1,attr2,attr3,ref,tid,REMOTE_ADDR,HTTP_X_FORWARDED_FOR,HTTP_USER_AGENT) values (";
		//$sSQL.= $mydate . ",";
		$sSQL.= $myday . ",";
		$sSQL.= $mymonth . ",";
		$sSQL.= $myyear . ",";						
		$sSQL.= $db->qstr($cat) . ",";		
		$sSQL.= $db->qstr($name) . ","; 
		$sSQL.= $db->qstr($cmail) . ",";
		$sSQL.= $db->qstr($ref) . ",";		
		$sSQL.= $db->qstr($tid) . ",";
		$sSQL.= $db->qstr($_SERVER['REMOTE_ADDR']) . ",";
		$sSQL.= $db->qstr($_SERVER['HTTP_X_FORWARDED_FOR']) . ","; 
		$sSQL.= $db->qstr($_SERVER['HTTP_USER_AGENT']). ")";	
		//echo $sSQL;		
		$db->Execute($sSQL,1);	 		

		if ($db->Affected_Rows()) {
		  return true;
		}  
		else 
		  return false;		
	}	

	public function update_page_statistics($id, $attr1=null, $iref=null) {
        $db = GetGlobal('db'); 
        $UserName = GetGlobal('UserName');	
		$name = $UserName ? decode($UserName) : session_id();
		
		if (GetSessionParam('ADMIN'))
			return false;		
	
	    $currentdate = time();
	    $myday  = date('d',$currentdate);	
	    $mymonth= date('m',$currentdate);	
	    $myyear = date('Y',$currentdate);

		$ref = $this->cid ? $this->cid : ($this->hashtag ? $this->hashtag : ($iref ? $iref : ''));
		$cmail = $this->mc ? base64_decode($this->mc) : '';		
						
		$sSQL = "insert into stats (day,month,year,tid,attr2,attr3,ref,attr1,REMOTE_ADDR,HTTP_X_FORWARDED_FOR,HTTP_USER_AGENT) values (";
		$sSQL.= $myday . ",";
		$sSQL.= $mymonth . ",";
		$sSQL.= $myyear . ",";						
		$sSQL.= $db->qstr($id) . ',';
        $sSQL.= $db->qstr($name) . ','; 
		$sSQL.= $db->qstr($cmail) . ',';
		$sSQL.= $db->qstr($ref) . ",";		
		$sSQL.= $db->qstr($attr1) . ",";
		$sSQL.= $db->qstr($_SERVER['REMOTE_ADDR']) . ",";
		$sSQL.= $db->qstr($_SERVER['HTTP_X_FORWARDED_FOR']) . ","; 
		$sSQL.= $db->qstr($_SERVER['HTTP_USER_AGENT']). ")";			
		//echo $sSQL;
		$db->Execute($sSQL,1);	 		
		if ($db->Affected_Rows()) 
		  return true;
		else 
		  return false;		
	}

	public function update_action_statistics($id, $user=null) {
        $db = GetGlobal('db'); 
		
		if (GetSessionParam('ADMIN'))
			return false;		

	    $currentdate = time();	
	    $myday  = date('d',$currentdate);	
	    $mymonth= date('m',$currentdate);	
	    $myyear = date('Y',$currentdate);
						
		$sSQL = "insert into stats (day,month,year,tid,attr1,attr3,REMOTE_ADDR,HTTP_X_FORWARDED_FOR,HTTP_USER_AGENT) values (";
		$sSQL.= $myday . ",";
		$sSQL.= $mymonth . ",";
		$sSQL.= $myyear . ",";						
		$sSQL.= $db->qstr('action') . ',';		
		$sSQL.= $db->qstr($id) . ',';
		$sSQL.= $db->qstr($user) . ',';
		$sSQL.= $db->qstr($_SERVER['REMOTE_ADDR']) . ",";
		$sSQL.= $db->qstr($_SERVER['HTTP_X_FORWARDED_FOR']) . ","; 
		$sSQL.= $db->qstr($_SERVER['HTTP_USER_AGENT']). ")";				

		$db->Execute($sSQL,1);	 
		
		if ($db->Affected_Rows()) 
			return true;
		else 
			return false;		
	}	
	
	public function update_event_statistics($id, $user=null) {
        $db = GetGlobal('db'); 
		
		if (GetSessionParam('ADMIN'))
			return false;		

	    $currentdate = time();	
	    $myday  = date('d',$currentdate);	
	    $mymonth= date('m',$currentdate);	
	    $myyear = date('Y',$currentdate);
						
		$sSQL = "insert into stats (day,month,year,tid,attr1,attr3,REMOTE_ADDR,HTTP_X_FORWARDED_FOR,HTTP_USER_AGENT) values (";
		$sSQL.= $myday . ",";
		$sSQL.= $mymonth . ",";
		$sSQL.= $myyear . ",";						
		$sSQL.= $db->qstr('event') . ',';		
		$sSQL.= $db->qstr($id) . ',';
		$sSQL.= $db->qstr($user) . ',';
		$sSQL.= $db->qstr($_SERVER['REMOTE_ADDR']) . ",";
		$sSQL.= $db->qstr($_SERVER['HTTP_X_FORWARDED_FOR']) . ","; 
		$sSQL.= $db->qstr($_SERVER['HTTP_USER_AGENT']). ")";				

		$db->Execute($sSQL,1);	 
		
		if ($db->Affected_Rows()) 
			return true;
		else 
			return false;		
	}	
};
}
?>