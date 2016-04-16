<?php
$__DPCSEC['RCVSTATS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCVSTATS_DPC")) && (seclevel('RCVSTATS_DPC',decode(GetSessionParam('UserSecID')))) ) {

define("RCVSTATS_DPC",true);

$__DPC['RCVSTATS_DPC'] = 'rcvstats';

$__EVENTS['RCVSTATS_DPC'][0]='cpvstats';
$__EVENTS['RCVSTATS_DPC'][1]='cpvstatsshow';
$__EVENTS['RCVSTATS_DPC'][2]='cpvmcstart';

$__ACTIONS['RCVSTATS_DPC'][0]='cpvstats';
$__ACTIONS['RCVSTATS_DPC'][1]='cpvstatsshow';
$__ACTIONS['RCVSTATS_DPC'][2]='cpvmcstart';

$__DPCATTR['RCVSTATS_DPC']['cpvstats'] = 'cpvstats,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCVSTATS_DPC'][0]='RCVSTATS_DPC;Statistics;Στατιστική';
$__LOCALE['RCVSTATS_DPC'][1]='_GNAVAL;Chart not available!;Στατιστική μή διαθέσιμη!';

class rcvstats  {

    var $title;
	var $_grids, $charts;
	var $ajaxLink;
	var $hasgraph;
	var $graphx, $graphy;
	
	var $mc, $cid, $hashtag;
		
	function rcvstats() {

	  $this->title = localize('RCVSTATS_DPC',getlocal());			

	  $this->ajaxLink = seturl('t=cpvstatsshow&statsid='); //for use with...	      

	  $this->hasgraph = false;
	  $this->graphx = remote_paramload('RCVSTATS','graphx',$this->path);
	  $this->graphy = remote_paramload('RCVSTATS','graphy',$this->path);
	  
	  //$u = $_SERVER['REQUEST_URI'].$_SERVER['QUERY_STRING']; //basename($_SERVER['REQUEST_URI']);
	  //echo $u;
	  
	  $this->hashtag = $_COOKIE['hashtag']; //fetch generic hashtag if any
	  $this->cid = $_COOKIE['cid']; //fetch mail campaign id	  
	  $this->mc = $_COOKIE['mc'];	//fetch client mail base64encoded
	  
	  $this->javascript(); //check for hash and save cookies	  
	}
	

    function event($event=null) {		 

	   switch ($event) {
		   
		 case 'cpvmcstart'  : $this->callback_update_first_referece_record();
							  die();// $this->mc.','.$this->cid.','.$this->hashtag);
							  break;

		 case 'cpvstatsshow': if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");
		                      if (!$cvid = GetParam('statsid')) $cvid=-1; 
		                      $this->charts = new swfcharts;	
		                      $this->hasgraph = $this->charts->create_chart_data('statistics',"where tid='".$cvid . "' and year>=2000");
							  break; 	   

	     case 'cpvstats'    :
		 default            : if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");
		                      $this->graph_javascript();		 
		                      $this->charts = new swfcharts;	
		                      $this->hasgraph = $this->charts->create_chart_data('statisticscat',"where year>=2000 and attr1='".urldecode(GetReq('cat'))."'");
	   }
		
    }   

    function action($action=null) {

	  switch ($action) {
		  
		 case 'cpvmcstart'  : break;  

		 case 'cpvstatsshow': if ($this->hasgraph)
		                        $out = $this->show_graph('statistics','Product statistics',$this->ajaxLink,'stats');
							  else
							    $out = "<h3>".localize('_GNAVAL',0)."</h3>";	
							  die('stats|'.$out); //ajax return
							  break; 
	     case 'cpvstats'    :

		 default            : $out .= $this->show_statistics();

	  }	 
	  return ($out);
    }

	
	function javascript() {
        if (iniload('JAVASCRIPT')) {
		
		    //became universal
           	$code = $this->createcookie_js();				
			
		    //return no js when tags already loaded 
			if (isset($this->hashtag) || (isset($this->cid) && isset($this->mc))) {}
			else {	
				$code.= $this->javascript_ajax();			
				$code.= $this->reference_js();		
			}	
			
		    $js = new jscript;
            $js->load_js($code,"",1);			   
		    unset ($js);		
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
	//$.get( "katalog.php?t=cpvmcstart", function( data ) { alert( "Data Loaded: " + data ); });
	sndUrl("katalog.php?t=cpvmcstart");
}
else { }		
';
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
    //http.onreadystatechange = handleResponse;
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
        document.getElementById(update[0]).innerHTML = update[1];
    }	
  }
}

EOF;

      return ($jscript);
   }		
	

	function graph_javascript() {

      if (iniload('JAVASCRIPT')) {
 		      
	       $code = $this->update_stats();			
		   $js = new jscript;	   
           $js->load_js($code,"",1);			   
		   unset ($js);

	  }		
	}
	
	protected function init_grids() {	
		$out = "
function update_stats_id() { var str = arguments[0]; var str1 = arguments[1];  var str2 = arguments[2]; statsid.value = str;
  sndReqArg('$this->ajaxLink'+statsid.value,'stats');
  return str1+' '+str2; }
";
		return ($out);
    }	

	function show_graph($xmlfile,$title=null,$url=null,$ajaxid=null,$xmax=null,$ymax=null) {
	  $gx = $this->graphx?$this->graphx:$xmax?$xmax:550;
	  $gy = $this->graphy?$this->graphy:$ymax?$ymax:250;
	 
      $ret = $title;
	  $ret .= $this->charts->show_chart($xmlfile,$gx,$gy,$url,$ajaxid);

	  return ($ret);
	}
	
	function show_statistics() {

	   //HIDDEN FIELD TO HOLD STATS ID FOR AJAX HANDLE
	   $out .= "<INPUT TYPE= \"hidden\" ID= \"statsid\" VALUE=\"0\" >";	   	    
	   return ($out);		   
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

	public function update_item_statistics($id) {
        $db = GetGlobal('db'); 
        $UserName = GetGlobal('UserName');	
		$name = $UserName ? decode($UserName) : session_id();

	    $currentdate = time();
	    $mydate = $db->qstr(date('Y-m-d h:i:s',$currentdate));		
	    $myday  = date('d',$currentdate);	
	    $mymonth= date('m',$currentdate);	
	    $myyear = date('Y',$currentdate);

		$ref = $this->cid ? $this->cid : ($this->hashtag ? $this->hashtag : '');
		$cmail = $this->mc ? base64_decode($this->mc) : '';		
						
		$sSQL = "insert into stats (date,day,month,year,tid,attr2,attr3,ref) values (";
		$sSQL.= $mydate . ",";
		$sSQL.= $myday . ",";
		$sSQL.= $mymonth . ",";
		$sSQL.= $myyear . ",";						
		$sSQL.= $db->qstr($id) . ',';
        $sSQL.= $db->qstr($name) . ','; 
		$sSQL.= $db->qstr($cmail) . ',';
		$sSQL.= $db->qstr($ref) . ")";
		//echo $sSQL;
		$db->Execute($sSQL,1);	 		
		if ($db->Affected_Rows()) 
		  return true;
		else 
		  return false;		
	}

	public function update_category_statistics($cat) {
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
		$sSQL.= $db->qstr($cat) . ",";		
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