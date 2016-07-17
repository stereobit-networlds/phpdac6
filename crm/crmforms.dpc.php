<?php
$__DPCSEC['CRMFORMS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CRMFORMS_DPC")) && (seclevel('CRMFORMS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CRMFORMS_DPC",true);

$__DPC['CRMFORMS_DPC'] = 'crmforms';

$b = GetGlobal('controller')->require_dpc('crm/crmmodule.dpc.php');
require_once($b);

$__LOCALE['CRMFORMS_DPC'][0]='CRMFORMS_DPC;Forms;Φόρμες';
$__LOCALE['CRMFORMS_DPC'][1]='_date;Date;Ημερ.';
$__LOCALE['CRMFORMS_DPC'][2]='_time;Time;Ώρα';
$__LOCALE['CRMFORMS_DPC'][3]='_status;Status;Κατάσταση';
$__LOCALE['CRMFORMS_DPC'][4]='_descr;Description;Περιγραφή';
$__LOCALE['CRMFORMS_DPC'][5]='_cat;Category;Κατηγορία';
$__LOCALE['CRMFORMS_DPC'][6]='_class;Class;Κλάση';
$__LOCALE['CRMFORMS_DPC'][7]='_code;Code;Κωδικός';
$__LOCALE['CRMFORMS_DPC'][8]='_title;Title;Τίτλος';


class crmforms extends crmmodule  {
	
	var $appname, $urkRedir, $isHostedApp; 
		
	function __construct() {
	
		crmmodule::__construct();
	  
		$this->appname = paramload('ID','instancename');
		$this->urlRedir = remote_paramload('RCBULKMAIL','urlredir', $this->path);
		$this->isHostedApp = remote_paramload('RCBULKMAIL','hostedapp', $this->path);		
	}

	public function forms_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $selected = urldecode(GetReq('id'));
		
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;	
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('CRMFORMS_DPC',getlocal()); // .'_'. str_replace('@','AT',$selected_cus); 
	
	    if (defined('MYGRID_DPC')) {
		
			$xSQL2 = "SELECT * from (select id,active,date,title,descr,code,class,type from crmforms where class='$selected') o ";		   
		   							
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('id',getlocal())."|2|1|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+active|".localize('_active',getlocal())."|boolean|1|");		
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+date|".localize('_date',getlocal())."|link|5|"."javascript:showdetails(\"{id}\");".'||');		
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+code|".localize('_code',getlocal())."|5|1|");		
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+title|".localize('_title',getlocal())."|10|1|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+descr|".localize('_descr',getlocal())."|19|1|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+class|".localize('_class',getlocal())."|5|1|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+type|".localize('_type',getlocal())."|5|1|");

			$ret .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+cform+$xSQL2+$mode+$title+id+$noctrl+1+$rows+$height+$width+1+1+1");

	    }
		else 
		   $ret .= 'Initialize jqgrid.';
        
        return ($ret);
  	
	}	
		
	public function showdetails($data=null) {
		
		//return ("details:" . $data);
		
	    $bodyurl = 'cpcrmforms.php?t=cpcrmformsubdetail&iframe=1&module=formhtml&id='.$data; 
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"350px\"><p>Your browser does not support iframes</p></iframe>";      

		return ($frame);		
	}	
	
	/*
	*  runtime methods to use as dropdown creator and form submiter
	*  for cp environment
	*/
	
	public function formsMenu($user, $class=null, $type=null, $style=null) {
		if ((!$user) || (!$class)) return null;
		
		if ($this->isdemoUser())
			return ($user); //not menu for not allowd users
		
		$db = GetGlobal('db');
		$lan = getlocal();
		
		$sSQL = "select id,title,descr from crmforms where class=" . $db->qstr($class);
		if ($type)
			$sSQL.= " and type=" . $db->qstr($type);
		//echo $sSQL;
		$res = $db->Execute($sSQL);
		
		foreach ($res as $i=>$rec) {
			$_title = localize($rec['title'], $lan);
			$dropdown[$_title] = seturl('t=cpcrmsend&id='.$rec['id'].'&user='.$user.'&subject='.$rec['title']);
		}
		
		$menu = $this->createButton($user, $dropdown, $style);
		
		return ($menu);		
	} 
	
	
	protected function createButton($name=null, $urls=null, $t=null, $s=null) {
		$type = $t ? $t : 'primary'; //danger /warning / info /success
		switch ($s) {
			case 'large' : $size = 'btn-large '; break;
			case 'small' : $size = 'btn-small '; break;
			case 'mini'  : $size = 'btn-mini '; break;
			default      : $size = null;
		}
		
		if (!empty($urls)) {
			foreach ($urls as $n=>$url)
				$links .= '<li><a href="'.$url.'">'.$n.'</a></li>';
			$lnk = '<ul class="dropdown-menu">'.$links.'</ul>';
		} 
		
		$ret = '
			<div class="btn-group">
                <button data-toggle="dropdown" class="btn '.$size.'btn-'.$type.' dropdown-toggle">'.$name.' <span class="caret"></span></button>
                '.$lnk.'
            </div>'; 
			
		return ($ret);
	}


	public function encUrl($url, $nohost=false) {
		if ($url) {
			
			if (($this->isHostedApp)&&($nohost==false)) {
				$burl = explode('/', $url);
				array_shift($burl); //shift http
				array_shift($burl); //shift //
				array_shift($burl); //www //
				$xurl = implode('/',$burl);
				$qry = 't=mt&a='.$this->appname.'_AMP_u=' . $xurl . '_AMP_cid=_CID_' . '_AMP_r=_TRACK_'; //CKEditor &amp; issue				
			}
			else {
				//$xurl = $url; //as is
				$qry = 't=mt&u=' . $url . '_AMP_cid=_CID_' . '_AMP_r=_TRACK_'; //CKEditor &amp; issue				
			}	
			
			$uredir = $this->urlRedir .'?'. $qry; //'?turl=' . $encoded_qry;
			return ($uredir); 
		}
		else
			return ('#');
	}	
};
}
?>