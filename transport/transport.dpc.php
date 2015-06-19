<?php
//if (defined("DATABASE_DPC")) {

$__DPCSEC['TRANSPORT_DPC']='1;1;1;2;2;2;2;2;9';
$__DPCSEC['TRANSPADMIN_']='2;1;1;1;1;1;2;2;9';
$__DPCSEC['TRANSPCANCEL_']='2;1;2;2;2;2;2;2;9';

if ((!defined("TRANSPORT_DPC")) && (seclevel('TRANSPORT_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("TRANSPORT_DPC",true);

$__DPC['TRANSPORT_DPC'] = 'transport';

$__EVENTS['TRANSPORT_DPC'][0]='transport';
$__EVENTS['TRANSPORT_DPC'][1]='searchtransport';
$__EVENTS['TRANSPORT_DPC'][2]=localize('_TRANSPEND',getlocal());
$__EVENTS['TRANSPORT_DPC'][3]=localize('_TRANSPCANC',getlocal());
$__EVENTS['TRANSPORT_DPC'][4]=localize('_TRANSPPROC',getlocal());
$__EVENTS['TRANSPORT_DPC'][5]=localize('_TRANSPDELL',getlocal());
$__EVENTS['TRANSPORT_DPC'][6]='transviewtransport';

$__ACTIONS['TRANSPORT_DPC'][0]='transport';
$__ACTIONS['TRANSPORT_DPC'][1]='searchtransport';
$__ACTIONS['TRANSPORT_DPC'][2]=localize('_TRANSPEND',getlocal());
$__ACTIONS['TRANSPORT_DPC'][3]=localize('_TRANSPCANC',getlocal());
$__ACTIONS['TRANSPORT_DPC'][4]=localize('_TRANSPPROC',getlocal());
$__ACTIONS['TRANSPORT_DPC'][5]=localize('_TRANSPDELL',getlocal());
$__ACTIONS['TRANSPORT_DPC'][7]='transviewtransport';

$__DPCATTR['TRANSPORT_DPC']['transport'] = 'transport,1,0,1'; 
$__DPCATTR['TRANSPORT_DPC']['searchtrans'] = 'searchtransport,1,0,1';
$__DPCATTR['TRANSPORT_DPC'][localize('_TRANSPEND',getlocal())] = '_TRANSPEND,1,0,1,0,0,0,0,0,0';
$__DPCATTR['TRANSPORT_DPC'][localize('_TRANSPCANC',getlocal())] = '_TRANSPCANC,1,0,1,0,0,0,0,0,0';
$__DPCATTR['TRANSPORT_DPC'][localize('_TRANSPPROC',getlocal())] = '_TRANSPPROC,1,0,1,0,0,0,0,0,0';
$__DPCATTR['TRANSPORT_DPC'][localize('_TRANSPDELL',getlocal())] = '_TRANSPPROC,1,0,1,0,0,0,0,0,0';

$__LOCALE['TRANSPORT_DPC'][0]='_TRANSPEND;Procceded;Εκτελεσμένη';
$__LOCALE['TRANSPORT_DPC'][1]='_TRANSPCANC;Canceled;Ακυρη';
$__LOCALE['TRANSPORT_DPC'][2]='_TRANSPPROC;In Procces;Εκκρεμής';
$__LOCALE['TRANSPORT_DPC'][3]='_TRANSPSTAT;Status;Κατάσταση';
$__LOCALE['TRANSPORT_DPC'][4]='_TRANSPNUM;Order No;Αριθμός διανομής';
$__LOCALE['TRANSPORT_DPC'][5]='_TRANSPDATA;Transaction data;Στοιχεία διανομής';
$__LOCALE['TRANSPORT_DPC'][6]='_TRANSPINFO;All data are important for a successfull transport ! !;Όλα τα στοιχεία πρέπει να είναι σωστά συμπληρωμένα ! !';
$__LOCALE['TRANSPORT_DPC'][7]='_TRANSPPRINT;Print Transport;Εκτύπωση διανομής';
$__LOCALE['TRANSPORT_DPC'][8]='_TRANSPERROR;Transaction not successfull. Please try later or inform us at ;Η διανομή δεν εκτελέστηκε. Παρακαλώ δοκιμάστε αργότερα ή ενημερώστε μας στο';
$__LOCALE['TRANSPORT_DPC'][9]='_TRANSPOK;Thank you! Your transport submited successfully with Order No :;Ευχαριστούμε ! Η διανομή σας αποθηκεύτηκε επιτυχώς με αριθμό διανομής:';
$__LOCALE['TRANSPORT_DPC'][10]='_TRANSPSEARCH;Search Transport;Αναζήτηση διανομής';
$__LOCALE['TRANSPORT_DPC'][11]='_TRANSPLIST;Transport List;Λίστα διανομών';
$__LOCALE['TRANSPORT_DPC'][12]='_TRANSPORT;Transport;Διανομή';
$__LOCALE['TRANSPORT_DPC'][13]='TRANSPORTS_CNF;Transports List;Λίστα διανομών';
$__LOCALE['TRANSPORT_DPC'][14]='_TRANSPERR;Not submited;Μη απεσταλμενη';
$__LOCALE['TRANSPORT_DPC'][15]='_TRANSPDELL;Deleted;Διεγραμμενη';
$__LOCALE['TRANSPORT_DPC'][16]='_TRANSPEMPTY;No Transport;Δεν υπάρχουν διανομές';

$__LOCALE['TRANSPORT_DPC'][17]='_loading;Loading;Περίμενε';
$__LOCALE['TRANSPORT_DPC'][18]='_driving;Driving;Οδηγώντας';
$__LOCALE['TRANSPORT_DPC'][19]='_walking;Walking;Περπατώντας';
$__LOCALE['TRANSPORT_DPC'][20]='_bicycling;Bicycling;Με ποδήλατο';
$__LOCALE['TRANSPORT_DPC'][21]='_transit;Transit;Με ολα';
$__LOCALE['TRANSPORT_DPC'][22]='_yrh;You are here;Είσαι εδώ';
$__LOCALE['TRANSPORT_DPC'][23]='_dih;Destination is here;Πηγαίνεις εδώ';
$__LOCALE['TRANSPORT_DPC'][24]='_give;Give;Παίρνεις';
$__LOCALE['TRANSPORT_DPC'][25]='_take;Take;Δίνεις';
$__LOCALE['TRANSPORT_DPC'][26]='_action;Action;Ενέργεια';
$__LOCALE['TRANSPORT_DPC'][27]='_qty;Qty;Ποσ.';
$__LOCALE['TRANSPORT_DPC'][28]='_inmap;Map;Θέση';
$__LOCALE['TRANSPORT_DPC'][29]='_date;Date;Ημ/νια';
$__LOCALE['TRANSPORT_DPC'][30]='_name;Title;Τίτλος';
$__LOCALE['TRANSPORT_DPC'][31]='_go;Go;Πήγαινε';
$__LOCALE['TRANSPORT_DPC'][32]='_selectdriving;How;Πως';
$__LOCALE['TRANSPORT_DPC'][33]='_do;Status;Κατάσταση';

class transport {

	var $userLevelID;
	var $username;
	var $userid;
	var $pagenum;
	var $searchtext;
    var $storetype;	
	var $path;
	var $admint;
	var $status0,$status1,$status2,$status3,$status4;
	var $details, $tcounter;
        var $initial_word;

	function __construct() {
	    $UserName = GetGlobal('UserName');	
	    $UserSecID = GetGlobal('UserSecID');
	    $UserID = GetGlobal('UserID');			

        $this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);
	    $this->username = decode($UserName);
	    $this->userid = decode($UserID);
	   
	    $this->pagenum = 30;
	    $this->searchtext = trim(GetParam("transpnum"));
	   
	    $this->status0 = localize('_TRANSPPROC',getlocal());
	    $this->status1 = localize('_TRANSPEND',getlocal());
	    $this->status2 = localize('_TRANSPCANC',getlocal());
	    $this->status3 = localize('_TRANSPERR',getlocal());	//not submited   
	    $this->status4 = localize('_TRANSPDELL',getlocal());	//deleted 	   

	    $this->tcounter = paramload('TRANSPORT','counter') ? paramload('TRANSPORT','counter') : 0;
	    $this->storetype = paramload('TRANSPORT','storetype');
	    $this->path = paramload('SHELL','prpath') . paramload('TRANSPORT','path');	
	    //echo $this->path;   
	    $this->details = paramload('TRANSPORT','details');
	   
	    $this->admint = 0;

        $this->initial_word = paramload('TRANSPORT','trid');
	   
	    //extension must be already loaded
        if (($this->storetype=='xml') && (!defined(_PHPXMLDUMPER_))) 
	     die ("TRANSPORT_DPC:Extension missing!");	

		if ($UserName) {
			$this->javascript();
		}				 
	}
	
	function event($evn) {
	   $a = GetReq('a');
	   
	   switch ($evn) {
	   
	     case 'transviewtransport' : die($this->get_trdata(GetReq('id')));
		                             break;	
	   
	     case "searchtransport"  : SetReq('a',$this->searchtext); break;
		 case $this->status0 : $this->modifyTransportStatus(0); break;		 
		 case $this->status1 : $this->modifyTransportStatus(1); break;		 
		 case $this->status2 : $this->modifyTransportStatus(2); break;
		 //case $this->status3 : $this->modifyTransportStatus(3); NO NEED ..PRODUCED by MAIL ERROR
		 case $this->status4 : $this->modifyTransportStatus(4); break;		 		 			 
		 
		 case 'transport':
		 default :
	   }
	}	
	
    function action($action=null)  { 

	   switch ($action) {	
		 case 'transport':
		 default :	
        //$ret = setNavigator(localize('_TRANSPLIST',getlocal()));
        $ret = $this->get_trdata();//$this->viewTransports();
		
		//use template
		$tokens = array(0=>$ret,1=>localize('_transport',getlocal()));
		$template = 'transport.htm';
		$t = $this->urlpath .'/' . $this->infolder . '/cp/html/'. str_replace('.',getlocal().'.',$template) ;
		if (is_readable($t)) 
			$tdata = @file_get_contents($t);			
	   
		if (($tdata) && (!empty($tokens))) 		
			$out = $this->combine_tokens2($tdata, $tokens, true);
		else
			$out = $ret;
       }			

	   return ($out);
	}
	
	protected function javascript() {
	
       if (iniload('JAVASCRIPT')) {
	   
	        $code = $this->javascript_code();
			
		    $js = new jscript;
			
            //v3 maps
			if (!defined('XIXUSWER_DPC')) {
				$geolanguage = getlocal() ? 'el' : 'en';
				$v3url = 'http://maps.google.com/maps/api/js?sensor=false&language='.$geolanguage;
				//$v3url = 'http://maps.google.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyDgNfkKVLswLHyY4tpCT7oJQjIBDVLpoYs&language='.$geolanguage;  			
				$js->load_js($v3url,null,null,null,true);		   		   		   
			}
			
            $js->load_js($code,null,1);//,null,null,true); //no obf		   			   
		    unset ($js);
	   }	
	}		
	
	protected function javascript_code()  {
	    $ajaxurl = seturl("t=");
		$Loading = localize('_loading',getlocal());	
		$youarehere = localize('_yrh',getlocal());
		$destination = localize('_dih',getlocal());
		
		$jscode = <<<JSTRANS
		
function viewTransactionTransport(trid) {
  holder=document.getElementById('transview_'+trid)
  holder.style.height='1px';
  holder.style.width='100%';

  $('#message_p_'+trid).html('<img src="images/loading.gif" alt="Loading"> {$Loading}').slideDown('fast');  
  
  $.get('{$ajaxurl}transviewtransport&id='+trid, function(data)
  {
		$('#message_p_'+trid).html(data);
		$('#transview_'+trid).html('');
  });  
};			

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;	

var start;
var end;
	
function userTransportTo(id, email, name, lati, long, details, pdiv, divmap, divdir)
{ 
    directionsDisplay = new google.maps.DirectionsRenderer();
  
	var pdiv = pdiv ? '#'+pdiv : '#user_show_message_p';
	var divdir = divdir ? divdir : 'phoca_dir';
	var divmap = divmap ? divmap : 'mapholder';
	mapholder=document.getElementById(divmap);
	mapholder.style.height='250px';
	mapholder.style.width='100%';

	$(pdiv).html('<h2>'+name+'</h2>'+email);
	
	start = new google.maps.LatLng(ulatitude,ulongitude);
	end = new google.maps.LatLng(lati,long);
	
    var myOptions={
	  center:end,zoom:14,
	  mapTypeId:google.maps.MapTypeId.ROADMAP,
	  mapTypeControl:false,
	  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
    };
    var map =new google.maps.Map(document.getElementById(divmap),myOptions);
    //var marker=new google.maps.Marker({position:start,map:map,title:"{$youarehere}"});
	var marker=new google.maps.Marker({position:end,map:map,title:"{$destination}"});
      
    directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById(divdir));	
}		

function calcRoute(tid, waypoints) {

	var selectedMode = document.getElementById('mode_'+tid).value;
	if (selectedMode=='0') return false;
	
	var waypts = [];
	
	if (waypoints) {
	  if (waypoints.indexOf(':') >= 0) {
		var wparray = waypoints.split(':');
	    //alert(wparray);
		for (i=0;i<wparray.length;i++) {
		
		    var point = wparray[i];
			//alert(point);
	        var p = point.split(',');
	        var wpoint = new google.maps.LatLng(p[0],p[1]);		
		
			waypts.push({
			  location:wpoint,
			  stopover:true
			});
		}
	  }
	  else {//one element
	    //alert(waypoints);
	    var p = waypoints.split(',');
	    var wpoint = new google.maps.LatLng(p[0],p[1]);
	  
		waypts.push({
		  location:wpoint,
		  stopover:true
		});	  
	  }
	  
	  var request = {
		origin:start,
		destination:end,
		waypoints: waypts,
        optimizeWaypoints: true,
		travelMode: google.maps.TravelMode[selectedMode]
	  };	  
    }	
	else {
	  var request = {
		origin:start,
		destination:end,
		travelMode: google.maps.TravelMode[selectedMode]
	  };
	}
	
	directionsService.route(request, function(response, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(response);
		}
	});	
}
JSTRANS;
		
		return ($jscode);
	}	
	

	protected function get_trdata($id=null, $all=false) {
	    $db = GetGlobal('db');
	    $UserName = GetGlobal('UserName');	
		if (!$UserName) return false;
		
		$user = decode($UserName);	
		$tid = $id ? $id : GetReq('id');
		
		$clickuser = localize('_inmap',getlocal());
		$give = localize('_give',getlocal());
		$take = localize('_take',getlocal());
		$act = localize('_action',getlocal());
		$qty = localize('_qty',getlocal());
		$inmap = localize('_inmap',getlocal());
		$tdate = localize('_date',getlocal());
		$cname = localize('_name',getlocal());
		$go = localize('_go',getlocal());
		$do = localize('_do',getlocal());
		
		$sSQL .= " SELECT id,date,code,name,qty,value,owner,longitude,latitude,verify,receiver FROM trdata WHERE";
		$sSQL .= ($tid) ? " tid={$tid}" : null; 
		$sSQL .= " AND cid='{$user}'";
		//$sSQL .= " ORDER BY latitude,longitude";
		//echo $sSQL,'<br/><br/>';
		$result = $db->Execute($sSQL,2);

		if (!empty($result)) {		
		
		  $ret = "<p id='transport_message_p_{$tid}'></p>";		  
		  $ret .= "<div id='transport_mapholder_{$tid}'></div>";		
		  $ret .= "<!--div id='transport_directions_{$tid}'></div-->";
		  $ret .= "<table id=\"trdata_table\"><tr><th>$tdate</th><th>$cname</th><th>$act</th><th>$qty</th><th>$inmap</th><th>$go</th><th>$do</th></tr>";
		  
		  $waypoints = array();
		  foreach ($result as $r=>$rec) {	  
		  
		    if (($lat = $rec['latitude']) && ($lon = $rec['longitude'])) {
			
				$waypoints[] = $lat.','.$lon;
				
				$jscmd = "userTransportTo(\"{$rec['id']}\",\"{$rec['owner']}\",\"{$rec['name']}\",{$lat},{$lon},0,\"transport_message_p_{$tid}\",\"transport_mapholder_{$tid}\",\"transport_directions_{$tid}\")"; 
				$map_button = "<button class='btn btn-small' id='user_{$rec['id']}' onclick='$jscmd'>{$clickuser}</button>";
				
				if ($rec['code']=='transport') //calc waypoints (always last when no order by)
					$travel_mode = $this->travel_mode_select($tid, $jscmd, $waypoints);			   
				else //one by one
					$travel_mode = $this->travel_mode_select($tid, $jscmd);//, $waypoints);			   	
            }
			else {
			    $map_button = 'disabled';
				$travel_mode = 'disabled';
			}
			
			$action = ($rec['value']>0) ? 
			           $give : (($rec['value']<0) ? $take : '-');
					   
			$do_mode = ($rec['verify']) ? "<i class='icon-exchange'></i>&nbsp;<i class='icon-check'></i>&nbsp;" : 
						                  "<i class='icon-exchange'></i>&nbsp;";
			$do_mode.= $f ? "<i class='icon-cog'></i>&nbsp;" : null;							
			
	        $ret .= '<tr><td>' .
				    $r .' '. date('d-m-Y',strtotime($rec['date'])) . 
				    '</td><td>' . 
				    $rec['code'] . '-'. seturl('t=kshow&cat=&id='.$rec['code'],$rec['name']) .//no category //,null,null,null,1) . 
				    '</td><td>' . 
					$action . 
					'</td><td>' . 
					$rec['qty'] .
					'</td><td>' .	
					$map_button . 
					'</td><td>' .
					$travel_mode .
				    '</td><td>' .
					$do_mode .					
				    '</td></tr>';
		  }
		  $ret.= '</table>';
        } 
		return ($ret);		
	}	
	
	protected function travel_mode_select($tid, $jscmd=null, $waypoints=null) {
	   //if (!$tid) return false;
	   //echo $waypoints,'<br/>';
	   //print_r($waypoints);
	   $wp = (!empty($waypoints)) ? implode(':',$waypoints) : null;
	   //echo $wp;
	   $js = $jscmd ? "{$jscmd};calcRoute({$tid},\"{$wp}\");" : 
	                  "calcRoute({$tid},\"{$wp}\");";
	   
	   $select_travel = localize('_selectdriving',getlocal());
	   $Driving = localize('_driving',getlocal());
	   $Walking = localize('_walking',getlocal());
	   $Bicycling = localize('_bicycling',getlocal());
	   $Transit = localize('_transit',getlocal());
	   
	   $tmode = "  
<!--div id='panel'-->
    <!--b>Mode of Travel: </b-->
    <select id='mode_{$tid}' onchange='$js'>
	  <option value='0'>$select_travel</option>
      <option value='DRIVING'>$Driving</option>
      <option value='WALKING'>$Walking</option>
      <option value='BICYCLING'>$Bicycling</option>
      <option value='TRANSIT'>$Transit</option>
    </select>
    <!--/div-->";
		return ($tmode);
	}
	
	function generate_id() {
       $db = GetGlobal('db');

	   if ($this->storetype=='DB') {  //db
	   
	     $sSQL = "select count(*) from transports";
	     $res = $db->Execute($sSQL,null,1);
		  
		 if ($db->model=='ADODB') 
	       $out = $res->fields[0]+1;//RecordCount()+1;
		 else //sqlite
		   //$out = $res[0]+1;//$data[0]+1;
         $out = $res->fields[0]+1;//$data[0]+1;

		 //echo $out,'>>>';
       }
	   else {//xml and txt
	   
         $dumper = new PHP_XML_Dumper('ID');
		 $id = $dumper->xml2php($this->path . "id.".$this->storetype); 
		 //WARNING: file id.xml must pre-exist as blank xml file;
		 if (!$id[0]) {
		   $res[0] = 1;
           $dumper->php2xml($res, $this->path . "id.".$this->storetype);		 
		 }
		 else {
		   $res[0] = $id[0]+1;
           $dumper->php2xml($res, $this->path . "id.".$this->storetype);		 		   
		 }   
	     unset($dumper);	
		 $out = $res[0];	 
	   }
	   //print $out;	
	   return ($out);
	}	
	
	//bulk modifications
	function modifytransportStatus($state) {
       $db = GetGlobal('db');
	   
	   if ($this->storetype=='DB') {  //db	   
	   
	     $i = 0;
	     $sSQL = "select tid from transports";
	     $res = $db->Execute($sSQL); 	   
	   
	     while(!$res->EOF) {
	       $tran = GetParam($res->fields[0]);
	       if ($tran) {
		     //$tr[] = $tran;
		   
		     $sSQL2 = "update transports set tstatus=" . $db->qstr($state) .
		              " where tid=" . $db->qstr($tran);
     	     $result = $db->Execute($sSQL2);
		     if ($result) $i+=1;	
		   }
	       $res->MoveNext();		 
	     }
	     setInfo($i." rows affected.");
	     //print_r($tr);
	   }
	   else { //xml and txt
	   
         if (is_dir($this->path)) {
           $i=0;
           $mydir = dir($this->path); //echo 'PATH:',$fpath;

           while ($fileread = $mydir->read()) {//echo $fileread,"<br>";
             if ((!is_dir($fpath.$fileread)) && ($fileread!='.') && 
			                                    ($fileread!='..') && 
												($fileread!='id.'.$this->storetype) && 
												(strstr($fileread,'.'.$this->storetype))) {	   
	     
			   $parts = explode("_",$fileread);	 
		       $tran = GetParam($parts[1]);
	           if ($tran) {
			     $i+=1;
				 
				 $parts[2] = $state . "." . $this->storetype;
				 $newname = implode("_",$parts);
				 //echo $newname,"<br>";
				 rename($this->path.$fileread,$this->path.$newname);			 
		       }
		     }	 
		   }  
	     }
         $mydir->close();	
		 setInfo($i." transports affected.");	   
	   }
	}

	function saveTransport($data=null,$user=null,$payway=null,$roadway=null,$qty=null,$cost=null,$costpt=null) {
       $db = GetGlobal('db');
       $myqty = $qty?$qty:0;
       $mycost = $cost?$cost:0;
       $mycostpt = $costpt?$costpt:0;

       $ret = 0;
	   
	   $myuser = $user?$user:$this->userid; 
	   //echo $myuser,'>>';
			 
       $theid   = $this->generate_id();

	   if (($theid) && ($myuser)) {
          $id = $theid + $this->tcounter;
		  $myid = $this->initial_word . $id;  
	      //$mydate = date('d/m/Y');//get_date("d/m/y");
          $mydate = date('Y/m/d'); //mysql...
	      $mytime = date('h:i:s A');//get_date("h:n");
	      $mydata = $data;
		  
	      if ($this->storetype=='DB') { 
             $sSQL = "insert into transports (tid,cid,tdate,ttime,tdata,tstatus,payway,roadway,qty,cost,costpt) values " .
                 "(" .
		         $db->qstr($myid) . "," .
		         $db->qstr($myuser) . "," .
		         $db->qstr($mydate) . "," .
		         $db->qstr($mytime) . "," .
		         $db->qstr($mydata) . "," . 
		         "0," .
		         $db->qstr($payway) . "," . 
		         $db->qstr($roadway) . "," .
		         $myqty . "," .
		         $mycost . "," .
		         $mycostpt . ")";				 				 				 

	         $res = $db->Execute($sSQL,1);

		     //echo $sSQL;
		     //print $db->Affected_Rows();
			 //echo '>>>>',$res;

             if ($db->Affected_Rows()) $ret = $id;
	                             else $ret = 0;

	       }
           elseif ($this->storetype=='xml') {// XML
	   
             $dumper = new PHP_XML_Dumper('transport');
             $dumper->php2xml(unserialize($data), $this->path . $this->username . "_" . //user
			                                      $id . "_" . //transaction id
												  "0" . ".xml"); //state		 
	         unset($dumper);
		 
		     $ret = $id;
	       }
		   else { //default txt
		   
		     $tfile = $this->path . $this->username . "_" . //user
			                        $id . "_" . //transaction id
								    "0" . ".txt";
		   
	         if ($fp = fopen ($tfile , "w")) {
               fwrite ($fp, $data);
               fclose ($fp);						  
             }		   
		   
		     $ret = $id;		   
		   }
		   
	   }
	   //print $ret;

	   return ($ret);
	}
	
	function viewTransports() {
       $db = GetGlobal('db');
	   $a = GetReq('a');
	   
	   $apo = GetParam('apo'); //echo $apo;
	   $eos = GetParam('eos');	//echo $eos;   

       $myaction = seturl("t=transport");	   
	   
       if (seclevel('TRANSPADMIN_',$this->userLevelID)) {
	     $this->admint=1;
         $out .= "<form method=\"POST\" action=\"";
         $out .= "$myaction";
         $out .= "\" name=\"Transport\">";		 
	   }
	   elseif (seclevel('TRANSPCANCEL_',$this->userLevelID)) { 
	     $this->admint=2;	   
         $out .= "<form method=\"POST\" action=\"";
         $out .= "$myaction";
         $out .= "\" name=\"Transport\">";		   
	   }
		
	   if ($this->storetype=='DB') {  //db	 		
		 
	     if ($this->admint==1) {
		   $sSQL = "select recid,tid,recid,tstatus,tdate,ttime from transports"; 
		   if ($apo) $sSQL .= " where tdate>='" . trim(reverse_datetime($apo)) . "'";
		   if ($eos) $sSQL .= " and tdate<='" . trim(reverse_datetime($eos)) . "'";
		 }  
	     else {
		   $sSQL = "select recid,tid,recid,tstatus,tdate,ttime from transports where cid=" . $db->qstr($this->userid); //user only transactions
		   if ($apo) $sSQL .= " and tdate>='" . trim(reverse_datetime($apo)) . "'";
		   if ($eos) $sSQL .= " and tdate<='" . trim(reverse_datetime($eos)) . "'";		   
		 }  
				
		 
         $browser = new browseSQL(localize('_TRANSPLIST',getlocal()));
	     $out .= $browser->render($db,$sSQL,"transports","transport",$this->pagenum,$this,1,0,1,0); //do not search internal because of form conflict
	     unset ($browser);	
		 	 
		 $buttons = true;
	   }
	   else { //xml and txt
        
         if (is_dir($this->path)) {
           $i=1;
           $mydir = dir($this->path); //echo 'PATH:',$fpath;

           while ($fileread = $mydir->read()) {//echo $fileread,"<br>";
             if ((!is_dir($fpath.$fileread)) && ($fileread!='.') && 
			                                    ($fileread!='..') && 
												($fileread!='id.'.$this->storetype) && 
												(strstr($fileread,'.'.$this->storetype))) {
																					
			   //echo $fileread;
               $st = stat($this->path.$fileread);
			   $date = date("d-m-Y",$st[9]); //echo $date,":";
			   $time = date("H:i:s",$st[9]); //echo $time,">";
			   $datetime = $date." ".$time;
			   
			   //CHECK DATES ////////////
			   if ($apo) {
				 $checkdate=true;//enable check date
				 if (date_diff($apo,$datetime,"s")>=0) $dateOK=1;
				 else $dateOK=0;
				 
                 //echo $apo,"::::",$datetime,"<br>";				 
			   }
			   else 
			     $checkdate=false;	//disable check date
				  
 		       if ($eos) {
                 $checkdate=true; //enable check date
				 if (($dateOK) && (date_diff($datetime,$eos,"s")>=0)) $dateOK=1;				 
				 else $dateOK=0;				 
				 
				 //echo $eos,"::::",$datetime;
			   }	 
			   //not need to disable chack date becaouse of prev check on if
			   /////////////////////////
			   
			   $tdata = explode("_",str_replace(".".$this->storetype,"",$fileread));
			   $record = $i++.";".$tdata[1].";".$tdata[1].";".$tdata[2].";".$date.";".$time;
			   if ($this->admint==1) {
			   
			     if ($checkdate) {
				   if ($dateOK) $ret[]= $record; //all transactions
				 }
				 else
                   $ret[]= $record; //all transactions
			   }	 
			   else { 
			     if (($tdata[0]==$this->username) && ($tdata[2]!=4)) { 
				 
				   if ($checkdate) {
				     if ($dateOK)  $ret[] = $record; //owned transaction and not deleted
				   }
				   else
				     $ret[] = $record; //owned transaction and not deleted
				 }  
			   }	 
			 }
           }

           $mydir->close();
		   
           //browse
		   //print_r($ret); 
		   if (count($ret)>0) {
             $browser = new browse($ret,
		                           localize('_TRANSPLIST',getlocal()),
				   			       $this->getpage($ret,$this->searchtext));
	         $out .= $browser->render("transport",$this->pagenum,$this,1,0,1,0);
	         unset ($browser);		
			 
   		     $buttons = true;			 	   
		   }
		   else {
             //empty message
	         //$w = new window(localize('_TRANSLIST',getlocal()),localize('_TRANSEMPTY',getlocal()));
	         //$out .= $w->render("center::100%::0::group_win_body::left::0::0::");//" ::100%::0::group_form_headtitle::center;100%;::");
             $w = new msgBox(localize('_TRANSPEMPTY',getlocal()),"OKOnly",localize('_TRANSPLIST',getlocal())); 
             $links = array(seturl(''));
             $w->makeLinks($links);			 
             $out .= $w->render();				 
	         unset($w);		   
		   }
         }		      
	   }		 
		 
	   if (($buttons) && ($this->admint)) {
		     if ($this->admint==1) {
	           $out .= "<input type=\"submit\" name=\"FormAction\" value=\"$this->status0\">&nbsp;";		 
	           $out .= "<input type=\"submit\" name=\"FormAction\" value=\"$this->status1\">&nbsp;";
			   $out .= "<input type=\"submit\" name=\"FormAction\" value=\"$this->status2\">&nbsp;";			   
			   $out .= "<input type=\"submit\" name=\"FormAction\" value=\"$this->status4\">";			   
			 }
			 elseif ($this->admint==2) {
			   $out .= "<input type=\"submit\" name=\"FormAction\" value=\"$this->status2\">&nbsp;";
			   $out .= "<input type=\"submit\" name=\"FormAction\" value=\"$this->status4\">";			   
			 }
			 
             $out .= "<input type=\"hidden\" name=\"FormName\" value=\"Transport\">";
             $out .= "</FORM>";			 		   
			 	
	   }  
	   		 
	   if ($buttons) {
	   
	      $out .= $this->searchform();	    
		 
		  $dater = new datepicker();	
		  $out .= $dater->renderspace(seturl("t=transport&a=$a"),"transport");		 
		  unset($dater);
	   }	 
						
	   
	   return ($out);
	}
	
	function getpage($array,$id){
	
	   if (count($array)>0) {
         //while(list ($num, $data) = each ($array)) {
         foreach ($array as $num => $data) {
		    $msplit = explode(";",$data);
			if ($msplit[1]==$id) return floor(($num+1) / $this->pagenum)+1;
		 }	  
		 
		 return 1;
	   }	 
	}
	
	function getTransport($trid) {
       $db = GetGlobal('db');
	   
	   if ($this->storetype=='DB') {  //db	
	   	   
	     $sSQL = "select * from transports where recid=" . $db->qstr($trid);
	     $res = $db->Execute($sSQL);
	     //print_r ($res->fields[5]);
	     if ($res) { 
	       $out = $res->fields[5]; 
		   return ($out);
	     }
	   }
	   elseif ($this->storetype=='xml') { //xml
		 
         if (is_dir($this->path)) {
           $i=1;
           $mydir = dir($this->path); //echo 'PATH:',$fpath;

           while ($fileread = $mydir->read()) {//echo $fileread,"<br>";
             if ((!is_dir($fpath.$fileread)) && ($fileread!='.') && 
			                                    ($fileread!='..') && 
												($fileread!='id.xml') && 
												(strstr($fileread,'.xml'))) {	   
	     
		       //$transxmlfile = $this->path . $this->username . "_" . $trid . "_" . "0" . ".xml";
	           if (stristr($fileread,$trid)) {
			     //echo $fileread;
                 $dumper = new PHP_XML_Dumper('transport');
                 $out = $dumper->xml2php($this->path.$fileread); 	 
	             unset($dumper);
				 $mydir->close();					 
			     return (serialize($out));	//deserialized from caller (compatibility with db)	   
		       }
		     }	 
		   }  
	     }
         $mydir->close();		 
	   }
	   else { //default txt
	   
         if (is_dir($this->path)) {
           $i=1;
           $mydir = dir($this->path); //echo 'PATH:',$fpath;

           while ($fileread = $mydir->read()) {//echo $fileread,"<br>";
             if ((!is_dir($fpath.$fileread)) && ($fileread!='.') && 
			                                    ($fileread!='..') && 
												($fileread!='id.xml') && 
												(strstr($fileread,'.txt'))) {	   
	     
		       //$transxmlfile = $this->path . $this->username . "_" . $trid . "_" . "0" . ".xml";
	           if (stristr($fileread,$trid)) {
			     //echo $fileread;
                 if ($fp = fopen ($this->path.$fileread , "r")) {
                   $out = fread ($fp, filesize($this->path.$fileread));
                   fclose ($fp);		
				   $mydir->close();				 	 
			       return ($out);		   
				 }
				 else
				   $mydir->close();				 	 
		       }
		     }	 
		   }  
	     }
         $mydir->close();		   
	   }	 
	}
	
	function getTransportOwner($trid) {
       $db = GetGlobal('db');
	   
	   if ($this->storetype=='DB') {  //db		   
	   
	     $sSQL = "select * from transports where recid=" . $db->qstr($trid);
	     $res = $db->Execute($sSQL);
	     //print $res->fields[2];
	     if ($res) { 
	       $out = $res->fields[2]; 
		   return ($out);
	     }
	   }	 
	   else {   //xml and txt
	   
         if (is_dir($this->path)) {
           $i=1;
           $mydir = dir($this->path); //echo 'PATH:',$fpath;

           while ($fileread = $mydir->read()) {//echo $fileread,"<br>";
             if ((!is_dir($fpath.$fileread)) && ($fileread!='.') && 
			                                    ($fileread!='..') && 
												($fileread!='id.'.$this->storetype) && 
												(strstr($fileread,'.'.$this->storetype))) {	   
	     
		       //$transxmlfile = $this->path . $this->username . "_" . $trid . "_" . "0" . ".xml";
	           if (stristr($fileread,$trid)) {
		         $transxml = explode("_",$fileread);
			     $out = $transxml[0];
                 $mydir->close();			   
			     return ($out);
		       }
		     }	 
		   }  
	     }
         $mydir->close();			 
	   }
	}  	
	
	function getTransportRecord($trid) {
       $db = GetGlobal('db');
	   
	   if ($this->storetype=='DB') {  //db	   
	     $sSQL = "select * from transports where recid=" . $db->qstr($trid);
	     $res = $db->Execute($sSQL);
	     //print_r ($res->fields[5]);
	     return ($res->fields); 
	   }
	   elseif ($this->storetype=='xml') { //xml
         if (is_dir($this->path)) {
           $i=1;
           $mydir = dir($this->path); //echo 'PATH:',$fpath;

           while ($fileread = $mydir->read()) {//echo $fileread,"<br>";
             if ((!is_dir($fpath.$fileread)) && ($fileread!='.') && 
			                                    ($fileread!='..') && 
												($fileread!='id.xml') && 
												(strstr($fileread,'.xml'))) {	   
	     
		       //$transxmlfile = $this->path . $this->username . "_" . $trid . "_" . "0" . ".xml";
	           if (stristr($fileread,$trid)) {
			   
                 $dumper = new PHP_XML_Dumper('transport');
                 $out = $dumper->xml2php($fileread); 	 
	             unset($dumper);
                 $mydir->close();				 
			     return (serialize($out));	//deserialized from caller (compatibility with db)		   
		       }
		     }	 
		   }  
	     }
         $mydir->close();		   
	   }	
	   else { //default txt
         if (is_dir($this->path)) {
           $i=1;
           $mydir = dir($this->path); //echo 'PATH:',$fpath;

           while ($fileread = $mydir->read()) {//echo $fileread,"<br>";
             if ((!is_dir($fpath.$fileread)) && ($fileread!='.') && 
			                                    ($fileread!='..') && 
												($fileread!='id.xml') && 
												(strstr($fileread,'.txt'))) {	   
	     
		       //$transxmlfile = $this->path . $this->username . "_" . $trid . "_" . "0" . ".xml";
	           if (stristr($fileread,$trid)) {
			   
                 if ($fp = fopen ($fileread , "r")) {
                   $out = fread ($fp, filesize($fileread));
                   fclose ($fp);	
                   $mydir->close();				 
			       return (serialize($out));			   
				 }
				 else
				   $mydir->close();	    
		       }
		     }	 
		   }  
	     }
         $mydir->close();		   
	   } 
	}		
	
	function setTransportStatus($trid,$state) {
       $db = GetGlobal('db');
	   
	   if ($this->storetype=='DB') {  //db		   
	     $sSQL = "update transports set tstatus=" . $state .
	             " where recid=" . $trid;
         $result = $db->Execute($sSQL);
		
	     //print $sSQL;
	     //print $db->Affected_Rows() . ">>>>";
         if ($db->Affected_Rows()) return true;
	                          else return false;   	   
	   }
	   else {//echo "XML";  //xml and txt
	   
         if (is_dir($this->path)) {
           $i=1;
           $mydir = dir($this->path); //echo 'PATH:',$fpath;

           while ($fileread = $mydir->read()) {//echo $fileread,"<br>";
             if ((!is_dir($fpath.$fileread)) && ($fileread!='.') && 
			                                    ($fileread!='..') && 
												($fileread!='id.'.$this->storetype) && 
												(strstr($fileread,'.'.$this->storetype))) {	   
	     
	           if (stristr($fileread,$trid)) {
			     //echo $fileread;
				 $parts = explode("_",$fileread);
				 $parts[2] = $state . "." . $this->storetype;
				 $newname = implode("_",$parts);
				 //echo $newname;
				 rename($this->path.$fileread,$this->path.$newname);
				 $mydir->close();		   
				 return (true);
		       }
		     }	 
		   }  
	     }
         $mydir->close();		     
	   }						  
	}
	
	//?????
	function loadnextTransport() {
       $db = GetGlobal('db');
	   
	   if ($this->storetype=='DB') {  //db		   
	   
	     $sSQL = "select * from transports where tstatus=0 LIMIT 1"; 
	     $res = $db->Execute($sSQL);
     
	     //print $res->fields[0].">>>>";
	   
	     if ($res->fields) return ($res->fields[0]);	
	                  else return 0; //=end of transactions
	   }
	   else { //xml and txt
	     //.....
	   }				  
	}	
	
    function searchform()  {

      $filename = seturl("t=transport");//&a=&g=&p=");      

      $toprint  = "<FORM action=". $filename . " method=post class=\"thin\">";
      $toprint .= "<P><FONT face=\"Arial, Helvetica, sans-serif\" size=1><STRONG>";
	  $toprint .= localize('_TRANSPSEARCH',getlocal()) . ":";
	  $toprint .= "</STRONG> <INPUT name=transpnum size=15></FONT>";
      $toprint .= "<FONT face=\"Arial, Helvetica, sans-serif\" size=1>";

	  $toprint .= "<input type=\"submit\" name=\"Submit\" value=\"Ok\">"; 
      $toprint .= "<input type=\"hidden\" name=\"FormAction\" value=\"searchtransport\">";
      $toprint .= "</FONT></FORM>";
	   
	  $data2[] = $toprint; 
  	  $attr2[] = "left";

	  $swin = new window('',$data2,$attr2);
	  $out .= $swin->render("center::100%::0::group_dir_body::left::0::0::");	
	  unset ($swin);

      return ($out);
    }	
	
	function details($id,$storebuffer='sencart') {
	   
	   if ($storebuffer)
	     $ret = GetGlobal('controller')->calldpc_method($storebuffer.'.previewcart use '.$id.'+transview');
	   return ($ret);
	}
	
    function browse($packdata,$view) {
	
	   $data = explode("||",$packdata); //print_r($data);
	
       $out = $this->viewtransp($data[0],$data[1],$data[2],$data[3],$data[4],$data[5]);

	   return ($out);
	}		
	
    function viewtransp($id,$fname,$lname,$status,$ddate,$dtime) {
	   $p = GetReq('p');
	   $a = GetReq('a');
	   
	   $link = seturl("t=loadcart&a=$lname&g=&p=$p" , $fname);
	   
       if ($this->admint>0) {//==1) {
			   //print checkbox 
			   $data[] = "<input type=\"checkbox\" name=\"" . $fname . 
			                                  "\" value=\"" . $fname . "\">"; 
	           $attr[] = "left;1%";											  
	   }
	   /*elseif ($this->admint==2) {
			   //print checkbox only if status!=1
			   $data[] = "<input type=\"checkbox\" name=\"" . $fname . 
			                                  "\" value=\"" . $fname . "\">"; 
	           $attr[] = "left;1%";											  
	   }	*/											  	   
	   
							  
       if ($this->details) {//disable cancel and delete form buttons due to form elements in details????
	     $mydata = $this->details($lname);
	     $cartwin = new window2($id,$mydata,null,1,null,'HIDE');
	     $data[] = $cartwin->render("center::100%::0::group_dir_body::left::0::0::");
	     unset ($cartwin);		   
		 $attr[] = "left;10%";
	   }	
	   else {
	     $data[] = $id;
	     $attr[] = "left;10%";	   
	   }
	   	   
	   $data[] = $link;   
	   $attr[] = "left;30%";
	   
	   switch ($status) {
			  case 0 : $data[] = $this->status0; break;
			  case 1 : $data[] = $this->status1; break;	
			  case 2 : $data[] = $this->status2; break;				  		  
			  case 3 : $data[] = $this->status3; break;
			  case 4 : $data[] = $this->status4; break;
	   }	     
	   $attr[] = "left;30%";		   
	   
	   $data[] = $ddate;   
	   $attr[] = "left;15%";
	   
	   $data[] = $dtime;   
	   $attr[] = "left;15%";	      

	   $myarticle = new window('',$data,$attr);
	   
       if (($a) && (stristr($fname,$a))) $out = $myarticle->render("center::100%::0::group_article_body::left::0::0::");
                                    else $out = $myarticle->render("center::100%::0::group_article_selected::left::0::0::");
	   unset ($data);
	   unset ($attr);
	   
	 /*  if ($this->details) {
	     $mydata = $this->details($lname);
	     $cartwin = new window2($id,$mydata,null,1,null,'HIDE');
	     $out .= $cartwin->render("center::100%::0::group_dir_body::left::0::0::");
	     unset ($cartwin);		   
	   }	 */

	   return ($out);
	}	
	
	function headtitle() {
	   $p = GetReq('p');
	   $t = GetReq('t');
	   $sort = GetReq('sort');  
	
       $data[] = seturl("t=$t&a=&g=1&p=$p&sort=$sort&col=0" ,  "A/A" );
	   $attr[] = "left;10%";							  
	   $data[] = seturl("t=$t&a=&g=2&p=$p&sort=$sort&col=1" , localize('_TRANSPORT',getlocal()) );
	   $attr[] = "left;30%";
	   $data[] = seturl("t=$t&a=&g=3&p=$p&sort=$sort&col=2" , localize('_TRANSPSTAT',getlocal()) );
	   $attr[] = "left;30%";
	   $data[] = seturl("t=$t&a=&g=4&p=$p&sort=$sort&col=3" , localize('_DATE',getlocal()) );
	   $attr[] = "left;15%";
	   $data[] = seturl("t=$t&a=&g=4&p=$p&sort=$sort&col=4" , localize('_TIME',getlocal()) );
	   $attr[] = "left;15%";	   

  	   $mytitle = new window('',$data,$attr);
	   $out = $mytitle->render(" ::100%::0::group_form_headtitle::center;100%;::");
	   unset ($data);
	   unset ($attr);	
	   
	   return ($out);
	}	
	
	//cart finalize
	public function finalize($trid=null, $trprice=null) {
	    $db = GetGlobal('db');
	    $UserName = GetGlobal('UserName');
		if ((!$UserName) || (!$trid)) return false;
	    $user = decode($UserName);
		
		$query .= "SELECT weight,volume,value,qty,isservice FROM trdata WHERE tid='{$trid}'";
		$result = $db->Execute($query,2);		
		
		if (!empty($result)) {
		  
		    $sum_weight = 0;
			$sum_volume = 0;
			$sum_qty = 0;
			$sum_value = 0;
			$pid = 0; //transport project ...
			$code = 'transport'; //transport item code
			$owner = ($trprice) ? null : $user;//when cost let future owner else self delivery 
			$name = 'Transport'; //transport name
			
			if (($owner) && (defined('XIXUSER_DPC'))) { 
				$location = GetGlobal('controller')->calldpc_method('xixuser.get_user_location use '.$owner);
				$xy = explode(',',$location);
				$latitude = $xy[0];
				$longitude = $xy[1];						
			}
			else {
				$latitude = 0;
				$longitude = 0;
			}				
			 
		    foreach ($result as $r=>$rec) {
				$sum_weight += (float) $rec['weight']; 
				$sum_volume += (float) $rec['volume'];
				$sum_value  += $rec['value'];
				if (!$rec['isservice'])
					$sum_qty += $rec['qty'];
		    }
			
			$query = "INSERT INTO trdata SET isservice=1,pid=$pid,";
			$query.= "code='".$code ."',";
			$query.= "weight={$sum_weight},";
			$query.= "volume={$sum_volume},";
			$query.= "latitude=".$latitude.",";
			$query.= "longitude=".$longitude.",";			
			$query.= "owner='".$owner."',"; 					
			$query.= "name='" .$name."',";	

			//transport shipping price from cart or cart cost
			/*$price = GetSessionParam('shipcost') ? 
			         GetSessionParam('shipcost') :
					 $sum_value;*/			
			$price = $trprice ? $trprice : 0; //0 when self transport		 
			$query.= "value=" .$price.",";			
			$query.= "qty=".$sum_qty.",";
			$query.= "cid='".$user."',";			
			$query.= "tid='".$trid."'";					
					
			$insert = $db->Execute($query,1);
			$affected = $db->Affected_Rows();			
			//echo $query;
			return ($affected ? true : false);
		}	
	
		return false;
	}	
	
	//tokens method	 $x$
	protected function combine_tokens2($template_contents,$tokens, $execafter=null) {
	
	    if (!is_array($tokens)) return;
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);
          //$ret = GetGlobal('controller')->calldpc_method("fronthtmlpage.process_commands use ".$template_contents);		  		
		}		  		
		else
		  $ret = $template_contents;
		  
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
            //echo $tok,'<br>';
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<20;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);
		//echo $ret;
		
		//execute after replace tokens
		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $retout = $fp->process_commands($ret);
		  unset ($fp);
          
		  return ($retout);
		}		
		
		return ($ret);
	}		

};
}
//}
//else die("DATABASE DPC REQUIRED!");
?>