<?php
$__DPCSEC['RCCRMPLUS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCCRMPLUS_DPC")) && (seclevel('RCCRMPLUS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCRMPLUS_DPC",true);

$__DPC['RCCRMPLUS_DPC'] = 'rccrmplus';

//$b = GetGlobal('controller')->require_dpc('crm/rccrm.dpc.php');
//require_once($b);

$__EVENTS['RCCRMPLUS_DPC'][0]='cpcrmplus';
$__EVENTS['RCCRMPLUS_DPC'][1]='cpcrmgant';
$__EVENTS['RCCRMPLUS_DPC'][2]='cpcrmshowgant';

$__ACTIONS['RCCRMPLUS_DPC'][0]='cpcrmplus';
$__ACTIONS['RCCRMPLUS_DPC'][1]='cpcrmgant';
$__ACTIONS['RCCRMPLUS_DPC'][2]='cpcrmshowgant';

$__LOCALE['RCCRMPLUS_DPC'][0]='RCCRMPLUS_DPC;Crm Plus;Crm Plus';
$__LOCALE['RCCRMPLUS_DPC'][1]='_date;Date;Ημερ.';
$__LOCALE['RCCRMPLUS_DPC'][2]='_time;Time;Ώρα';
$__LOCALE['RCCRMPLUS_DPC'][3]='_status;Status;Κατάσταση';
$__LOCALE['RCCRMPLUS_DPC'][4]='_user;User;Πελάτης';
$__LOCALE['RCCRMPLUS_DPC'][5]='_cid;cid;cid';

$__LOCALE['RCCRMPLUS_DPC'][6]='_crmplist;List;Λίστα';
$__LOCALE['RCCRMPLUS_DPC'][7]='_crmpgant;Gantt;Διάγραμμα';
$__LOCALE['RCCRMPLUS_DPC'][8]='_projects;Projects;Πλάνο';
$__LOCALE['RCCRMPLUS_DPC'][9]='_since;Since;Απο';


class rccrmplus extends rccrm  {
	
	function __construct() {

		rccrm::__construct();	
	}

    function event($event=null) {
	
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;		 
	
		switch ($event) {
		    
			case 'cpcrmshowgant': //$this->javascript(); 
			                      break;
			case 'cpcrmgant'    : echo $this->loadframe();
		                          die();
							      break;
			case 'cpcrmplus'    :
			default             :    
		                      
		}
			
    }   
	
    function action($action=null) {
		
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;	
	 
		switch ($action) {	

			case 'cpcrmshowgant': $out = $this->show(); 
			                      break;	
			case 'cpcrmgant'    : break;
			case 'cpcrmplus'    :
			default             : $out = $this->crmPlusMode();
		}	 

		return ($out);
    }
	
	protected function crmPlusMode() {
		$mode = GetReq('mode') ? GetReq('mode') : 'crmpgant'; //'projects';

		$turl0 = seturl('t=cpcrmplus&mode=users');		
		$turl1 = seturl('t=cpcrmplus&mode=crmpgant');
		$turl2 = seturl('t=cpcrmplus&mode=crmplist');
		$button = $this->createButton(localize('_projects', getlocal()), 
										array('New/Edit'=>$turl0,
										      'Gant'=>$turl1,
											  'List'=>$turl2,
		                                ),'success');		
		
										
		$turl1 = seturl('t=cpcrmplus&backtrace=today');
		$turl2 = seturl('t=cpcrmplus&backtrace=yesterday');
		$turl3 = seturl('t=cpcrmplus&backtrace=week');
		$turl4 = seturl('t=cpcrmplus&backtrace=month');
		$turl5 = seturl('t=cpcrmplus&backtrace=sixmonth');
		$button .= $this->createButton(localize('_since', getlocal()), 
										array('Today'=>$turl1,
											  '1 day'=>$turl2,
											  'Week'=>$turl3,
											  '30 days'=>$turl4,
											  '6 months'=>$turl5,
		                                ),'warning');
										
		if (($mode!='crmpgant') && ($mode!='crmplist'))	{
		$turl0 = seturl('t=cpcrmplus&mode=projects');
		$turl1 = seturl('t=cpcrmplus&mode=users');
		$turl2 = seturl('t=cpcrmplus&mode=customers');		
		$turl3 = seturl('t=cpcrmplus&mode=ulist');
		$turl4 = seturl('t=cpcrmplus&mode=campaigns');
		$button .= $this->createButton(localize('_mode', getlocal()), 
										array(/*localize('_projects', getlocal())=>$turl0,*/
										      localize('_users', getlocal())=>$turl1,
									  		  localize('_customers', getlocal())=>$turl2,
											  localize('_ulist', getlocal())=>$turl3,
											  localize('_campaigns', getlocal())=>$turl4,
		                                ));										
		}											  					
																		
		$content = null;//GetGlobal('controller')->calldpc_method('mgantti.render_sum');
		
		switch ($mode) {
			
			case 'crmpgant' :	$content .= GetGlobal('controller')->calldpc_method('crmacal.render use +1');
			                    $content .= GetGlobal('controller')->calldpc_method('crmgantti.render_sum'); 
			                    break;
			case 'crmplist' :   $content .= GetGlobal('controller')->calldpc_method('crmacal.render use +1');
			                    $content .= $this->projects_grid(null,140,5,'r', true); break;
			
			case 'customers':	$content .= $this->customers_grid(null,140,5,'r', true); break;
			case 'ulist'    :   $content .= $this->ulist_grid(null,140,5,'e', true); break;
			case 'campaigns':   $content .= $this->campaigns_grid(null,140,5,'r', true); break;			
			case 'users'    :   $content .= $this->users_grid(null,140,5,'r', true); break;
			//case 'projects' :   $content .= $this->projects_grid(null,140,5,'r', true); break;
			
			default         :   $content .= $this->users_grid(null,140,5,'r', true); 
		}			
					
		$ret = $this->window('e-CRM+: '.localize('_'.$mode, getlocal()), $button, $content);
		
		return ($ret);
	}	
	
	
	//override
	protected function loadframe($ajaxdiv=null, $mode=null) {
		$id = GetParam('id');
		$cmd = 'cpcrmshowgant&id='.$id ;//$mode not used
		$bodyurl = seturl("t=$cmd&iframe=1");
			
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"460px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}

	//override
	protected function show() {
		$id = GetReq('id');
		$title = 'ID:' . $id; 
		
		//$ret = $this->loadsubframe(null,'dashboard', true);
		
		/* render inside ganti for new acal when new project
		  $ret = GetGlobal('controller')->calldpc_method('crmacal.render use +1'); 
		*/
		$ret.= GetGlobal('controller')->calldpc_method('crmgantti.show_gantti use '.substr($id,0,9));
		
		return ($ret);
	}	

	/* call by html
	protected function javascript() {
		
		GetGlobal('controller')->calldpc_method('reservations.javascript');
		GetGlobal('controller')->calldpc_method('crmacal.javascript');
		GetGlobal('controller')->calldpc_method('crmgantti.javascript');	
	}*/	
	
	protected function projects_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_projects', getlocal()); 
		
        $xsSQL = "SELECT * from (select id,pid,owner,active,date,dateupd,title,descr,code,cat,start,end,class,resclass,type,plan,reswforward,hideusers,private,include,exclude,invsend,remsend,closed from projects) o ";		   
		   
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('id',getlocal())."|5|0|||1");	
		//GetGlobal('controller')->calldpc_method("mygrid.column use grid1+timein|".localize('_date',getlocal())."|5|0|");	   
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+pid|".localize('_pid',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+owner|".localize('_owner',getlocal())."|5|0|");						
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+active|".localize('_active',getlocal())."|boolean|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+date|".localize('_date',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+dateupd|".localize('_dateupd',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+title|".localize('_title',getlocal())."|10|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+descr|".localize('_descr',getlocal())."|19|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+code|".localize('_code',getlocal())."|link|10|"."javascript:$(\"#acal\").load(\"cpcrmplus.php?t=acalajax&projectid={id}&ptitle={title}&id={code}&date={start}\");".'||');
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+cat|".localize('_cat',getlocal())."|5|0|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+start|".localize('_start',getlocal())."|5|1|");			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+end|".localize('_end',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+class|".localize('_class',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+rescalss|".localize('_resclass',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+type|".localize('_type',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+plan|".localize('_plan',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+reswforward|".localize('_reswforward',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+hideusers|".localize('_hideusers',getlocal())."|boolean|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+private|".localize('_private',getlocal())."|boolean|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+include|".localize('_include',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+exclude|".localize('_exclude',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+invsend|".localize('_invsend',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+remsend|".localize('_remsend',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+closed|".localize('_closed',getlocal())."|boolean|1|");
		   
		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+projects+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}	
	
};
}
?>