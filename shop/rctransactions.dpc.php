<?php
$__DPCSEC['RCTRANSACTIONS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCTRANSACTIONS_DPC")) && (seclevel('RCTRANSACTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCTRANSACTIONS_DPC",true);

$__DPC['RCTRANSACTIONS_DPC'] = 'rctransactions';

$d = GetGlobal('controller')->require_dpc('cgi-bin/shop/shtransactions.dpc.php', paramload('SHELL','urlpath'));
require_once($d);
 
$__EVENTS['RCTRANSACTIONS_DPC'][0]='cptransactions';
$__EVENTS['RCTRANSACTIONS_DPC'][1]='cptransshow';
$__EVENTS['RCTRANSACTIONS_DPC'][2]='cptranslink';
$__EVENTS['RCTRANSACTIONS_DPC'][3]='cptransview';
$__EVENTS['RCTRANSACTIONS_DPC'][4]='cptransviewhtml';
$__EVENTS['RCTRANSACTIONS_DPC'][5]='cploadframe';

$__ACTIONS['RCTRANSACTIONS_DPC'][0]='cptransactions';
$__ACTIONS['RCTRANSACTIONS_DPC'][1]='cptranssshow';
$__ACTIONS['RCTRANSACTIONS_DPC'][2]='cptranslink';
$__ACTIONS['RCTRANSACTIONS_DPC'][3]='cptransview';
$__ACTIONS['RCTRANSACTIONS_DPC'][4]='cptransviewhtml';
$__ACTIONS['RCTRANSACTIONS_DPC'][5]='cploadframe';

$__DPCATTR['RCTRANSACTIONS_DPC']['cptransactions'] = 'cptransactions,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCTRANSACTIONS_DPC'][0]='RCTRANSACTIONS_DPC;Transactions;Συναλλαγές';
$__LOCALE['RCTRANSACTIONS_DPC'][1]='_date;Date;Ημερ.';
$__LOCALE['RCTRANSACTIONS_DPC'][2]='_time;Time;Ώρα';
$__LOCALE['RCTRANSACTIONS_DPC'][3]='_status;Status;Φάση';
$__LOCALE['RCTRANSACTIONS_DPC'][4]='_payway;Pay method;Πληρωμή';
$__LOCALE['RCTRANSACTIONS_DPC'][5]='_roadway;Delivery;Διανομή';
$__LOCALE['RCTRANSACTIONS_DPC'][6]='_qty;Qty;Ποσοτ.';
$__LOCALE['RCTRANSACTIONS_DPC'][7]='_cost;Cost A;Κόστος A';
$__LOCALE['RCTRANSACTIONS_DPC'][8]='_costpt;Cost B;Κόστος B';
$__LOCALE['RCTRANSACTIONS_DPC'][9]='_xxx;Cost B;Κόστος Β';
$__LOCALE['RCTRANSACTIONS_DPC'][10]='_user;User;Πελάτης';

$__LOCALE['RCTRANSACTIONS_DPC'][28]='Eurobank;Credit card;Πιστωτική κάρτα'; //used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][29]='Piraeus;Credit card;Πιστωτική κάρτα'; //used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][30]='Paypal;Credit card;Πιστωτική κάρτα'; //used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][31]='PayOnsite;Pay on site;Πληρωμή στο κατάστημά μας';//used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][32]='BankTransfer;Bank transfer;Κατάθεση σε τραπεζικό λογαριασμό';//used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][33]='PayOndelivery;Pay on delivery;Αντικαταβολή';//used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][34]='Invoice;Invoice;Τιμολόγιο';//used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][35]='Receipt;Receipt;Απόδειξη';//used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][36]='CompanyDelivery;Our Delivery Service;Διανομή με όχημα της εταιρείας';//used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][37]='Logistics;3d Party Logistic Service;Μεταφορική εταιρεία';//used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][38]='Courier;Courier;Courier';//used by mchoice param
$__LOCALE['RCTRANSACTIONS_DPC'][39]='CustomerDelivery;Self Service;Παραλαβή απο το κατάστημα μας';//used by mchoice param


class rctransactions extends shtransactions {

    var $title, $path;
	var $charts;
	var $ajaxLink;
	var $hasgraph, $hasgauge;
    var $status_sid, $status_sidexp;
		
	function rctransactions() {
	
       shtransactions::shtransactions();

	   if ($tpath = paramload('RCTRANSACTIONS','path'))
	     $this->path = paramload('SHELL','prpath') . $tpath;
     	 
	  $this->title = localize('RCTRANSACTIONS_DPC',getlocal());		
	  
	  $this->ajaxLink = seturl('t=cptransshow&statsid='); //for use with...	      
	  
	  $this->hasgraph = false;
	  $this->hasgauge = false;	  
	  $this->graphx = remote_paramload('RCTRANSACTIONS','graphx',$this->path);
	  $this->graphy = remote_paramload('RCTRANSACTIONS','graphy',$this->path);

      $this->status_sid = arrayload('RCTRANSACTIONS','sid');  

      $this->status_exp = arrayload('RCTRANSACTIONS','sidexp'); 
           
	}
	
    function event($event=null) {
	
	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;		 
	
	   switch ($event) {
	     case 'cptransviewhtml' : echo $this->viewTransactionHtml();
		                          die();
		                        break;	   
		 case 'cptransview': 
		                     break;		   
		 case 'cptranslink': echo $this->show_transaction_data();//'trans');
		                     die();
		                     break;	   
		 case 'cploadframe': echo $this->loadframe('trans');
		                     die();
		                     break;								 
		 case 'cptransshow': if (!$cvid = GetParam('statsid')) $cvid=-1; 
		                      $this->charts = new swfcharts;	
		                      $this->hasgraph = $this->charts->create_chart_data('transcust','where cid='.$cvid);
							  break; 	   
	     case 'cptransactions':
		 default            :    
		                      $this->charts = new swfcharts;	
		                      $this->hasgraph = $this->charts->create_chart_data('transactions',"");
							  $this->hasgauge = $this->charts->create_gauge_data('income',"where cid=0",null,1,400,300,'meter');
	   }
			
    }   
	
    function action($action=null) {
		
	  $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	  if ($login!='yes') return null;	
	 
	  switch ($action) {
	     case 'cptransviewhtml' : //$out = $this->viewTransactionHtml();
		                        break;		  
		 case 'cptransview': $out = $this->viewTransactions();
		                     break;
							 	  
		 case 'cptranssshow': if ($this->hasgraph)
		                        $out = $this->show_graph('transcust','Customer Transactions',$this->ajaxLink,'stats');
							  else
							    $out = "<h3>".localize('_GNAVAL',0)."</h3>";	
							  die('stats|'.$out); //ajax return
							  break; 
	     case 'cptransactions'    :

		 default            : $out .= $this->show_transactions();
	  }	 

	  return ($out);
    }

	protected function show_graph($xmlfile,$title,$url=null,$ajaxid=null,$xmax=null,$ymax=null) {
	  $gx = $this->graphx?$this->graphx:$xmax?$xmax:550;
	  $gy = $this->graphy?$this->graphy:$ymax?$ymax:250;	
	
	  $ret = $title; 	
	  $ret .= $this->charts->show_chart($xmlfile,$gx,$gy,$url,$ajaxid);
	  return ($ret);
	}
	
	protected function show_transactions() {
	
	   if ($this->msg) $out = $this->msg;

	   $out = $this->show_grids();	   	
	   
	   //HIDDEN FIELD TO HOLD STATS ID FOR AJAX HANDLE
	   $out .= "<INPUT TYPE= \"hidden\" ID= \"statsid\" VALUE=\"0\" >";	   	    
	  
	   return ($out);		   
	}		
	
	public function show_grid($x=null,$y=null,$filter=null,$bfilter=null) {
	    $selected_cus = urldecode(GetReq('cusmail'));
	
	    if (defined('MYGRID_DPC')) {
			
			$lookup1 = "ELT(FIELD(i.payway, 'Eurobank','Piraeus','Paypal','BankTransfer','PayOnsite','PayOndelivery'),".
			                      "'".localize('Eurobank',getlocal())."',".
								  "'".localize('Piraeus',getlocal())."',".
								  "'".localize('Paypal',getlocal())."',".
			                      "'".localize('BankTransfer',getlocal())."',".
								  "'".localize('PayOnsite',getlocal())."',".
								  "'".localize('PayOndelivery',getlocal())."') as pw";			
								  
			$lookup2 = "ELT(FIELD(i.roadway, 'CompanyDelivery','CustomerDelivery','Logistics','Courier'),".
				                  "'".localize('CompanyDelivery',getlocal())."',".
					   		      "'".localize('CustomerDelivery',getlocal())."',".
								  "'".localize('Logistics',getlocal())."',".
								  "'".localize('Courier',getlocal())."') as rw";								  
		
		    if ($selected_cus) {
				//$xsSQL2= "CREATE TEMPORARY TABLE temp1 ENGINE=MEMORY "; 
				//$xsSQL2.= "as (select * from users where username='$selected_cus');";
				
				//$xsSQL2 = "SELECT * FROM (SELECT i.recid,i.tid,i.tdate,i.ttime,i.tstatus,i.payway,i.roadway,i.qty,i.cost,i.costpt,c.username FROM transactions i";
				//$xsSQL2.= " LEFT JOIN users c ON (c.code2 = i.cid AND c.code2='$selected_cus')) x";				
				
				$xsSQL2 = "SELECT * FROM (SELECT DISTINCT i.recid,i.tid,i.cid,i.tdate,i.ttime,i.tstatus,$lookup1,$lookup2,i.qty,i.cost,i.costpt FROM transactions i WHERE i.cid='$selected_cus') x";
				//echo $xsSQL2;
			}
			else {
				//$xsSQL2 = "SELECT * FROM (SELECT i.recid,i.tid,i.tdate,i.ttime,i.tstatus,i.payway,i.roadway,i.qty,i.cost,i.costpt,c.username FROM transactions i";
				//$xsSQL2.= " LEFT JOIN users c ON c.code2 = i.cid) x";
				
				$xsSQL2 = "SELECT * FROM (SELECT i.recid,i.tid,i.cid,i.tdate,i.ttime,i.tstatus,$lookup1,$lookup2,i.qty,i.cost,i.costpt FROM transactions i) x";
				//echo $xsSQL2;
			}
			//$out.= $xsSQL2;
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+recid|".localize('id',getlocal())."|5|0|||1|1");
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tid|".localize('id',getlocal())."|5|0|||0");
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tid|".localize('id',getlocal())."|5|0|||1|0");//"|link|5|".seturl('t=cptransviewhtml&editmode=1&tid={tid}').'||');
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tid|".localize('id',getlocal())."|link|5|"."javascript:show_body({tid});".'||');
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+username|".localize('_user',getlocal())."|10|0|||0|1");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cid|".localize('_user',getlocal())."|20|1|");
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tdate|".localize('_date',getlocal())."|boolean|1|ACTIVE:DELETED");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tdate|".localize('_date',getlocal())."|date|0|");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+ttime|".localize('_time',getlocal())."|9|0|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tstatus|".localize('_status',getlocal())."|5|0|||||right");	
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tstatus|".localize('_status',getlocal())."|link|10|"."javascript:show_body({tid});".'||');
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+pw|".localize('_payway',getlocal())."|20|1|");			
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+rw|".localize('_roadway',getlocal())."|20|1|");
	        GetGlobal('controller')->calldpc_method("mygrid.column use grid2+qty|".localize('_qty',getlocal())."|5|0|||||right");				
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cost|".localize('_cost',getlocal())."|5|0|||||right");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+costpt|".localize('_costpt',getlocal())."|5|0|||||right");
			$ret .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid2+customers+$xsSQL2+r+".localize('RCTRANSACTIONS_DPC',getlocal())."+recid+1+1+12+300+$x+0+1+1");

	    }
		else 
		   $ret .= 'Initialize jqgrid.';
        
        return ($ret);
  	
	}
	
	protected function show_grids() {
		
	   $ret = $this->show_grid();	
       //$ret .= GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use trans");	   
	   $ret .= "<div id='trans'></div>";
	   return ($ret);	
	}	
	
	
	protected function show_transaction_data() {//$ajaxdiv=null) {
      $db = GetGlobal('db'); 	
	  $tid = GetReq('tid');
	  $cid = GetReq('cid');
	  
	  $customer_data = GetGlobal('controller')->calldpc_method('shcustomers.showcustomerdata use '.$cid.'+code2');	
	
	  $sSQL = "select tdata,cost,costpt from transactions where tid=".$this->initial_word.$tid;
	  $result = $db->Execute($sSQL);
	  
	  if (!$out = $this->loadTransactionHtml($this->initial_word.$tid)) {	
	  
	    $cart_data = unserialize($result->fields['tdata']);
	    $cartshow = GetGlobal('controller')->calldpc_method('shcart.head');	  
	    //print_r($cart_data);
	    foreach ($cart_data as $cart_id=>$cart_val) {
	      $vals = explode(';',$cart_val);
	      //$cartshow .= GetGlobal('controller')->calldpc_method('shcart.viewcart use '.$vals[0].'+'.$vals[1].'++++++++'.$vals[8].'+'.$vals[9]);
		  $pvals = implode('+',$vals);
		  $cartshow .= GetGlobal('controller')->calldpc_method('shcart.viewcart use '.$pvals);
	    }
	  
	    $cartshow .= "<hr>".localize('_SUBTOTAL',getlocal()).':'.$result->fields['cost'].
	                 "<hr>".localize('_TOTAL',getlocal()).':'.$result->fields['costpt'];
	
	    $ret = $customer_data . $cartshow;// . $result->fields['tdata'] .'123';
	  
	
	    $headtitle = paramload('SHELL','urltitle');			
   	    $printpage = new phtml('../themes/style.css',$ret,"<B><h1>$headtitle</h1></B>");
        $out = $printpage->render();	
	    unset($printpage);	
	  }  

	     return ($out);
	}
	
	protected function loadframe($ajaxdiv=null) {
	    $bodyurl = seturl("t=cptranslink&tid=").GetReq('tid');
	
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"350px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv.'|'.$frame;//$out;	//'<p>'.$bodyurl.'</p>';
		else
			return ($frame);
	}
	
	protected function loadTransactionHtml($id) {
	
        $file = $this->path . $id . ".html"; 
	    //echo $file;
		if (is_readable($file)) {
          /*$fd = fopen($file, 'r');
          $ret = fread($fd, filesize($file));
          fclose($fd);   	*/
		  $ret = file_get_contents($file);
		
		  return ($ret);	
		}
		else
		  return false;
	} 		
		
	
	public function viewTransactionHtml($id=null) {
	    $id = $id?$id:GetReq('tid');
	
        $file = $this->path . $id . ".html"; 
	    //echo $file;
		if (is_readable($file)) {
		  $ret = file_get_contents($file);
		
		  return ($ret);	
		}
		else
		  return false;
	} 

};
}
?>