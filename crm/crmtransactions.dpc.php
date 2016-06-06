<?php
$__DPCSEC['CRMTRANSACTIONS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CRMTRANSACTIONS_DPC")) && (seclevel('CRMTRANSACTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CRMTRANSACTIONS_DPC",true);

$__DPC['CRMTRANSACTIONS_DPC'] = 'crmtransactions';

$b = GetGlobal('controller')->require_dpc('crm/crmmodule.dpc.php');
require_once($b);

class crmtransactions extends crmmodule  {
		
	function __construct() {
	
	  crmmodule::__construct();
	}

	public function transactions_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $selected_cus = urldecode(GetReq('id'));
		
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;	
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('RCCRM_DPC',getlocal()); 		
	
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
				$xsSQL2 = "SELECT * FROM (SELECT DISTINCT i.recid,i.tid,i.cid,i.tdate,i.ttime,i.tstatus,$lookup1,$lookup2,i.qty,i.cost,i.costpt FROM transactions i WHERE i.cid='$selected_cus') x";
				//echo $xsSQL2;
			}
			else {
				$xsSQL2 = "SELECT * FROM (SELECT i.recid,i.tid,i.cid,i.tdate,i.ttime,i.tstatus,$lookup1,$lookup2,i.qty,i.cost,i.costpt FROM transactions i) x";
				//echo $xsSQL2;
			}

			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+recid|".localize('id',getlocal())."|5|0|||1|1");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+tid|".localize('id',getlocal())."|link|5|"."javascript:showdetails({tid});".'||');
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+cid|".localize('_user',getlocal())."|20|1|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+tdate|".localize('_date',getlocal())."|date|0|");
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid3+ttime|".localize('_time',getlocal())."|9|0|");	
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+tstatus|".localize('_status',getlocal())."|5|0|||||right");	
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid3+pw|".localize('_payway',getlocal())."|20|1|");			
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid3+rw|".localize('_roadway',getlocal())."|20|1|");
	        GetGlobal('controller')->calldpc_method("mygrid.column use grid3+qty|".localize('_qty',getlocal())."|5|0|||||right");				
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+cost|".localize('_cost',getlocal())."|5|0|||||right");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid3+costpt|".localize('_costpt',getlocal())."|5|0|||||right");
			
			$ret .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid3+transactions+$xsSQL2+$mode+$title+recid+$noctrl+1+$rows+$height+$width+0+1+1");

	    }
		else 
		   $ret .= 'Initialize jqgrid.';
        
        return ($ret);
  	
	}	
		
	public function showdetails($data=null) {
		
		return ("details:" . $data);
	}	
	
};
}
?>