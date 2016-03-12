<?php

$__DPCSEC['RCVSTATS_DPC']='1;1;1;1;1;1;1;1;1';



if ((!defined("RCVSTATS_DPC")) && (seclevel('RCVSTATS_DPC',decode(GetSessionParam('UserSecID')))) ) {

define("RCVSTATS_DPC",true);


$__DPC['RCVSTATS_DPC'] = 'rcvstats';


$a = GetGlobal('controller')->require_dpc('nitobi/nitobi.lib.php');
require_once($a);

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
  
	  //$this->_grids[] = new nitobi("Items");	//must initialized althouth it handled by vehicles dpc  		  	  
      //$this->_grids[] = new nitobi("ItemsStats");		

	  $this->ajaxLink = seturl('t=cpvstatsshow&statsid='); //for use with...	      

	  //sndReqArg('index.php?t=existapp&application=meme2','existapp'
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

	   //ALLOW EXPRIRED APPS
	   /////////////////////////////////////////////////////////////
	   //if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	moved per event
	   /////////////////////////////////////////////////////////////		 

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

		   //$template = $this->set_template();   		      
	       $code = $this->update_stats();			
		   
		   //$code .= $this->_grids[0]->OnClick(20,'StatisticDetails',$template,'VehicleStats','vid',19);
		   //REMOTE GRID ARRAY CALLED TO ENABLE onclick !!!!!
		   /*$vgrids = GetGlobal('controller')->calldpc_var('rcitems._grids');
		   $code .= $vgrids[0]->OnClick(17,'StatisticDetails',$template,'ItemsStats','tid',0);
            */ 
			
		   $js = new jscript;
		   //$js->setloadparams("init()");
           //$js->load_js('nitobi.grid.js');		   
		   
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

	   /*if ($this->msg) $out = $this->msg;

	   
	   if (GetReq('cat')) {
		  if (defined("RCCATEGORIES_DPC"))//text based cats
		    $toprint .= GetGlobal('controller')->calldpc_method('rccategories.show_categories use cpvstats+1');		
          elseif (defined("RCKATEGORIES_DPC"))	   //ERROR!!!!
		    $toprint .= GetGlobal('controller')->calldpc_method('rckategories.show_menu use cpvstats');		  
	     //$toprint .= $this->show_categories('cpitems',1);
       }

	   $toprint .= $this->show_grids();	
	   */
       $mywin = new window($this->title,$toprint);
       $out .= $mywin->render();	
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

	function update_item_statistics($id) {
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

	function update_category_statistics($cat) {
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

	function show_grids() {

	   //gets
	   $cat = GetReq('cat');	
       $filter = GetParam('filter');
	   //grid 0 
	   $datattr[] = GetGlobal('controller')->calldpc_method("rcitems.show_grid use 500+440+1+$filter") . $this->searchinbrowser();							  
	   $viewattr[] = "left;50%";	   	   
	   $grid0_get = "shhandler.php?t=shngetstats";
	   $grid0_set = "";	   
	   //grid 1
	   $this->_grids[1]->set_text_column("AA","id","50","true");   	   	      	   	   	         	   	   	   	
	   $this->_grids[1]->set_text_column("Date","date","100","true");	
	   $this->_grids[1]->set_text_column("Day","day","60","true");	
	   $this->_grids[1]->set_text_column("Month","month","60","true");		   	   	   
	   $this->_grids[1]->set_text_column("Year","year","60","true");		   
	   $this->_grids[1]->set_text_column("ItemID","tid","50","true");		   
	   $this->_grids[1]->set_text_column("Attr1","attr1","100","true");		   	   	   
	   $this->_grids[1]->set_text_column("Attr2","attr2","100","true");		   
	   $this->_grids[1]->set_text_column("Attr3","attr3","100","true");		   

	   $wd = $this->_grids[1]->set_grid_remote($grid0_get,$grid0_set,"550","220","livescrolling",10,"false");

	   //businnes card	used to pass data from jscript
	   //$message .= $this->charts->render('usage',400,250);
	   $wd .= $this->_grids[1]->set_detail_div("StatisticDetails",550,20,'F0F0FF',$message);
	   $wd .= GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use stats");
       if ($this->hasgraph) {
		   $wd .= $this->show_graph('statisticscat','Category statistics',seturl('t=cpvstats&cat='.$cat.'&p='.$p));
	   }	   
	   else
		   $wd .= "<h3>".localize('_GNAVAL',0)."</h3>";
	   $datattr[] = $wd;
	   $viewattr[] = "left;50%";

	   $myw = new window('',$datattr,$viewattr);
	   $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
	   unset ($datattr);
	   unset ($viewattr);		   	
	   return ($ret);	
	}	

	function sidewin() {
		  if (defined("RCCATEGORIES_DPC")) {//text based cats
		    if (!GetReq('cat'))//only when no cat sel else call other browser bellow
		      GetGlobal('controller')->calldpc_method('rcsidewin.set_show_calldpc use rccategories.show_tree PARAMS cpvstats');		
	      }		
          elseif (defined("RCKATEGORIES_DPC"))//sql based cats			
            GetGlobal('controller')->calldpc_method('rcsidewin.set_show_calldpc use rckategories.show_tree PARAMS cpvstats');					

	}	

    function searchinbrowser() {
        $ret = "
           <form name=\"searchinbrowser\" method=\"post\" action=\"\">
           <input name=\"filter\" type=\"Text\" value=\"\" size=\"56\" maxlength=\"64\">
           <input name=\"Image\" type=\"Image\" src=\"../images/b_go.gif\" alt=\"\"    align=\"absmiddle\" width=\"22\" height=\"28\" hspace=\"10\" border=\"0\">
           </form>";

        $ret .= "<br>Last search: " . GetParam('filter');



        return ($ret);

    }		
			
};
}
?>