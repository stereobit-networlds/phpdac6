<?php
$__DPCSEC['CRMWISHCMP_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CRMWISHCMP_DPC")) && (seclevel('CRMWISHCMP_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CRMWISHCMP_DPC",true);

$__DPC['CRMWISHCMP_DPC'] = 'crmwishcmp';

$b = GetGlobal('controller')->require_dpc('crm/crmmodule.dpc.php');
require_once($b);

$__LOCALE['CRMWISHCMP_DPC'][0]='CRMWISHCMP_DPC;Compare;Συγκρίσεις';
$__LOCALE['CRMWISHCMP_DPC'][1]='_date;Date;Ημερ.';
$__LOCALE['CRMWISHCMP_DPC'][2]='_time;Time;Ώρα';
$__LOCALE['CRMWISHCMP_DPC'][3]='_qty;Quantity;Ποσότητα';
$__LOCALE['CRMWISHCMP_DPC'][4]='_items;Items;Είδη';
$__LOCALE['CRMWISHCMP_DPC'][5]='_active;Active;Ενεργό';
$__LOCALE['CRMWISHCMP_DPC'][6]='_title;Title;Τίτλος';
$__LOCALE['CRMWISHCMP_DPC'][7]='_descr;Description;Περιγραφή';
$__LOCALE['CRMWISHCMP_DPC'][8]='_xml;Xml;Xml';
$__LOCALE['CRMWISHCMP_DPC'][9]='_color;Color;Χρώμα';
$__LOCALE['CRMWISHCMP_DPC'][10]='_code;Code;Κωδικός';
$__LOCALE['CRMWISHCMP_DPC'][11]='_dimensions;Dimension;Διαστάσεις';
$__LOCALE['CRMWISHCMP_DPC'][12]='_size;Size;Μέγεθος';
$__LOCALE['CRMWISHCMP_DPC'][13]='_dimensions;Dimensions;Διαστάσεις';
$__LOCALE['CRMWISHCMP_DPC'][14]='_xmlcreate;Create XML;Δημιούργησε XML';
$__LOCALE['CRMWISHCMP_DPC'][15]='_xml;XML item;Είδος XML';
$__LOCALE['CRMWISHCMP_DPC'][16]='_manufacturer;Manufacturer;Κατασκευαστής';
$__LOCALE['CRMWISHCMP_DPC'][17]='_uniname1;Unit;Μον.μετρ.';
$__LOCALE['CRMWISHCMP_DPC'][18]='_ypoloipo1;Qty;Υπόλοιπο';
$__LOCALE['CRMWISHCMP_DPC'][19]='_price0;Price 1;Αξία 1';
$__LOCALE['CRMWISHCMP_DPC'][20]='_price1;Price 2;Αξία 2';
$__LOCALE['CRMWISHCMP_DPC'][21]='_name;Name;Όνομα';
$__LOCALE['CRMWISHCMP_DPC'][22]='_cat0;Category 1;Κατηγορία 1';
$__LOCALE['CRMWISHCMP_DPC'][23]='_cat1;Category 2;Κατηγορία 2';
$__LOCALE['CRMWISHCMP_DPC'][24]='_cat2;Category 3;Κατηγορία 3';
$__LOCALE['CRMWISHCMP_DPC'][25]='_cat3;Category 4;Κατηγορία 4';
$__LOCALE['CRMWISHCMP_DPC'][26]='_cat4;Category 5;Κατηγορία 5';

$__LOCALE['CRMWISHCMP_DPC'][30]='_transactions;Transactions;Συναλλαγές';
$__LOCALE['CRMWISHCMP_DPC'][31]='_date;Date;Ημερ.';
$__LOCALE['CRMWISHCMP_DPC'][32]='_time;Time;Ώρα';
$__LOCALE['CRMWISHCMP_DPC'][33]='_status;Status;Φάση';
$__LOCALE['CRMWISHCMP_DPC'][34]='_payway;Pay method;Πληρωμή';
$__LOCALE['CRMWISHCMP_DPC'][35]='_roadway;Delivery;Διανομή';
$__LOCALE['CRMWISHCMP_DPC'][36]='_qty;Qty;Ποσοτ.';
$__LOCALE['CRMWISHCMP_DPC'][37]='_cost;Cost A;Κόστος A';
$__LOCALE['CRMWISHCMP_DPC'][38]='_costpt;Cost B;Κόστος B';
$__LOCALE['CRMWISHCMP_DPC'][39]='_xxx;Cost B;Κόστος Β';
$__LOCALE['CRMWISHCMP_DPC'][40]='_user;User;Πελάτης';
$__LOCALE['CRMWISHCMP_DPC'][41]='Eurobank;Credit card;Πιστωτική κάρτα';  
$__LOCALE['CRMWISHCMP_DPC'][42]='Piraeus;Credit card;Πιστωτική κάρτα';  
$__LOCALE['CRMWISHCMP_DPC'][43]='Paypal;Credit card;Πιστωτική κάρτα';  
$__LOCALE['CRMWISHCMP_DPC'][44]='PayOnsite;Pay on site;Πληρωμή στο κατάστημά μας'; 
$__LOCALE['CRMWISHCMP_DPC'][45]='BankTransfer;Bank transfer;Κατάθεση σε τραπεζικό λογαριασμό'; 
$__LOCALE['CRMWISHCMP_DPC'][46]='PayOndelivery;Pay on delivery;Αντικαταβολή'; 
$__LOCALE['CRMWISHCMP_DPC'][47]='Invoice;Invoice;Τιμολόγιο'; 
$__LOCALE['CRMWISHCMP_DPC'][48]='Receipt;Receipt;Απόδειξη'; 
$__LOCALE['CRMWISHCMP_DPC'][49]='CompanyDelivery;Our Delivery Service;Διανομή με όχημα της εταιρείας'; 
$__LOCALE['CRMWISHCMP_DPC'][50]='Logistics;3d Party Logistic Service;Μεταφορική εταιρεία'; 
$__LOCALE['CRMWISHCMP_DPC'][51]='Courier;Courier;Courier'; 
$__LOCALE['CRMWISHCMP_DPC'][52]='CustomerDelivery;Self Service;Παραλαβή απο το κατάστημα μας'; 



class crmwishcmp extends crmmodule  {
		
	function __construct() {
	
	  crmmodule::__construct();
	}

	public function wishcmp_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $selected = urldecode(GetReq('id'));
		
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;	
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('CRMWISHCMP_DPC',getlocal());
	
	    if (defined('MYGRID_DPC')) {
			
			$xsSQL2 = "SELECT * FROM (SELECT w.recid,w.timein,w.tid,p.itmactive,p.active,p.itmname,p.sysins,p.cat0,p.cat1,p.cat2,p.cat3,p.cat4 FROM wishlist w, products p WHERE w.tid=p.code5 AND w.cid='$selected' and w.listname='compare') x";
			//echo $xsSQL2;
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+recid|".localize('id',getlocal())."|2|0|||1");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+timein|".localize('_date',getlocal()). "|5|0|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+tid|".localize('_code',getlocal())."|link|4|"."javascript:showdetails(\"{tid}~$selected\");".'||');
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid1+itmactive|".localize('_active',getlocal())."|2|0|");		
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+active|".localize('_active',getlocal())."|2|0|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+sysins|".localize('_date',getlocal())."|5|0|");		
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid1+code5|".localize('_code',getlocal())."|5|0|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+itmname|".localize('_title',getlocal())."|10|0|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+cat0|".localize('_cat0',getlocal())."|5|0|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+cat1|".localize('_cat1',getlocal())."|5|0|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+cat2|".localize('_cat2',getlocal())."|5|0|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+cat3|".localize('_cat3',getlocal())."|5|0|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+cat4|".localize('_cat4',getlocal())."|5|0|");	
			$ret .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+wishlist+$xsSQL2+$mode+$title+recid+$noctrl+1+$rows+$height+$width+1+1+1");

	    }
		else 
		   $ret .= 'Initialize jqgrid.';
        
        return ($ret);
  	
	}	
	
	
	//return array of purchased item's documents
	protected function getPurchased($id=null, $cid=null) {
       $db = GetGlobal('db');
	   
	   //search serialized data for id
	   $sSQL = "select tid from transactions " . 
	           "where tdata like'%" . $id ."%' and cid= " . $db->qstr($cid);
       $result = $db->Execute($sSQL,2);
	   //echo $sSQL;
	   
	   foreach ($result as $n=>$rec) {	
		 $ret[] = $rec['tid'];	
	   }
	   return $ret;   	   	
	}	
	
	protected function purchased_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $selected = urldecode(GetReq('id'));
		$s = explode('~', $selected);
		$id = $s[0];
		$cid = $s[1];

	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;	
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_transactions',getlocal());  
	
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
			
			$doclist = $this->getPurchased($id, $cid);
			if (!empty($doclist))
				$dSQL = ' AND i.tid in (' . implode(',', $doclist) . ')';
			else
				$dSQL = ' AND i.tid=0'; //dummy, null grid
			
			$xsSQL2 = "SELECT * FROM (SELECT DISTINCT i.recid,i.tid,i.cid,i.tdate,i.ttime,i.tstatus,$lookup1,$lookup2,i.qty,i.cost,i.costpt FROM transactions i WHERE i.cid='$cid' $dSQL) x";
			//echo $xsSQL2;

			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+recid|".localize('id',getlocal())."|5|0|||1|1");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+tid|".localize('id',getlocal())."|link|5|"."javascript:showdetails({tid});".'||');
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid3+cid|".localize('_user',getlocal())."|20|1|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+tdate|".localize('_date',getlocal())."|date|0|");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid3+ttime|".localize('_time',getlocal())."|9|0|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+tstatus|".localize('_status',getlocal())."|5|0|||||right");	
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid3+pw|".localize('_payway',getlocal())."|20|1|");			
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid3+rw|".localize('_roadway',getlocal())."|20|1|");
	        GetGlobal('controller')->calldpc_method("mygrid.column use grid3+qty|".localize('_qty',getlocal())."|5|0|||||right");				
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+cost|".localize('_cost',getlocal())."|5|0|||||right");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+costpt|".localize('_costpt',getlocal())."|5|0|||||right");
			
			$ret .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid3+transactions+$xsSQL2+$mode+$title+recid+$noctrl+1+$rows+$height+$width+1+1+1");

	    }
		else 
		   $ret .= 'Initialize jqgrid.';
        
        return ($ret);
  	
	}	
	
	public function purchased() {
		$out = $this->purchased_grid(null,250,10,'r',true);
		return ($out);
	}	

	public function showdetails($data=null) {
		
		//return ("details:" . $data);
		//echo $data.'>';
		
		//if ($data<50000) //tid is 1000... when item code start from 50000... (test do not use in production)
		if ((is_numeric($data)) && (intval($data)<50000))	
			$bodyurl = 'cptransactions.php?t=cptranslink&tid='.$data;
		else	
			$bodyurl = 'cpcrm.php?t=cpcrmrun&mod=crmwishcmp.purchased&id='.$data; 
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"350px\"><p>Your browser does not support iframes</p></iframe>";    

		return ($frame);		
	}	
	
};
}
?>