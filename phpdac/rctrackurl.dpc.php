<?php

$__DPCSEC['RCTRACKURL_DPC']='1;1;1;1;1;1;1;1;1';


if ((!defined("RCTRACKURL_DPC")) && (seclevel('RCTRACKURL_DPC',decode(GetSessionParam('UserSecID')))) ) {

define("RCTRACKURL_DPC",true);


$__DPC['RCTRACKURL_DPC'] = 'rctrackurl';

$__EVENTS['RCTRACKURL_DPC'][0]='mtrackurl';
$__EVENTS['RCTRACKURL_DPC'][1]='cptrackurl';

$__ACTIONS['RCTRACKURL_DPC'][0]='mtrackurl';
$__ACTIONS['RCTRACKURL_DPC'][1]='cptrackurl';

$__DPCATTR['RCTRACKURL_DPC']['cptrackurl'] = 'cptrackurl,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCTRACKURL_DPC'][0]='RCTRACKURL_DPC;Track;Track';

class rctrackurl  {

    var $reset_db, $title;
	var $_grids, $charts;
	var $ajaxLink;
	var $hasgraph;
	var $graphx, $graphy;
	
	var $prpath, $location;
		
	function __construct() {
		
	  $this->prpath = paramload('SHELL','prpath');	
	  $this->location = null;

	  $this->title = localize('RCTRACKURL_DPC',getlocal());			
	  $this->ajaxLink = seturl('t=cpvstatsshow&statsid='); //for use with...	      

	  //sndReqArg('index.php?t=existapp&application=meme2','existapp'
	  $this->hasgraph = false;
	  $this->graphx = remote_paramload('RCTRACKURL','graphx',$this->path);
	  $this->graphy = remote_paramload('RCTRACKURL','graphy',$this->path);

	}

	

    function event($event=null) { 

	   switch ($event) {

		 case 'cptrackurl'  : 
							  break; 	   

	     case 'mtrack'      :
		 default            : //$this->javascript();
		                      $this->urlTracker();
	   }
		
    }   

    function action($action=null) {

	  switch ($action) {

		 case 'cptrackurl'  : /*if ($this->hasgraph)
		                        $out = $this->show_graph('statistics','Product statistics',$this->ajaxLink,'stats');
							  else
							    $out = "<h3>".localize('_GNAVAL',0)."</h3>";	
							  die('stats|'.$out); //ajax return*/
							  break; 
	     case 'mtrack  '    :

		 default            : //$out .= $this->show_statistics();

	  }	 
	  return ($out);
    }

	
	protected function javascript() {
        if (iniload('JAVASCRIPT')) {
		
           	$code = $this->redirect_js();	
			
		    $js = new jscript;
            $js->load_js($code,"",1);			   
		    unset ($js);		
     	}	  
	}
	
	protected function redirect_js($location) {
		$ret ="window.location = '$this->location';";
	
        return ($ret);	
	}
	
	public function urlTracker() {
		//print_r($_GET);
		$u = $_GET['u'];     //url to go
		$cid = $_GET['cid']; //mail campaign id
		$a = $_GET['a'];     //app name
		$r = $_GET['r'];     //base64 dont decode...
		
		//when a, fire up redir js to start mail client monitoring
		if ($a) {
		
			$hosted_path = $this->prpath . '../' . $a . '/cp/' ;
			$appurl  = remote_paramload('SHELL','urlbase',$hosted_path,1);
		
			$url = $appurl .'/'. $u . '#' . $cid.'|'.$r;
			//$url = $appurl .'/'. str_replace('-','/',$u) . '#' . $cid.'|'.$r; //htaccess / problem
			$this->location = $url;
			$this->javascript();
			//$link = "<a href='$url'>".$url."</a>";
			//echo $link;
		}
		//... write something to db ???
		if (!$i = GetReq('i')) return;
	   	
		//$di = rawurldecode($i); echo $di,'<br>';
		//$dr = rawurldecode($r);
	   
		$trackid = $i;//decode($i); echo $i,'<br>';
		$receiver = $r;//decode($r);
	   
		/*$p = explode('<DLM>',$id);
		print_r($p);
		if (!empty($p)) {
	       echo 'z';
	       $trackid = $p[0];
		   $sender = $p[1];
		   $app = $p[2];*/
		$p = explode('@',$trackid);	   
		if (!empty($p)) {	   
	   
	       $app = trim($p[1]);	   
		   //echo $app,'>';
		   if ($app)
		     $db = GetGlobal('controller')->calldpc_method('database.switch_db use '.$app.'++1');
		   else
		     $db = GetGlobal('db');//root db
			 
           $sSQL = "select id,trackid,reply from mailqueue where trackid=" . $db->qstr($trackid);			 	 
		   $result = $db->Execute($sSQL,2);
		   //echo $sSQL;
		   
		   if ($tid = $result->fields['trackid']) {//if trackid exist...
		     
			 $replies = intval($result->fields['reply'])+1;//addon replies
			 
             $sSQL = "update mailqueue set reply=$replies, status=1 where trackid=" . $db->qstr($trackid);			 	 
		     $result = $db->Execute($sSQL,1);
			 //echo $sSQL;		     
		   }
		   	 
		}
	}	
};
}
?>	