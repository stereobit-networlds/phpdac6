<?php
$__DPCSEC['RCCRMFORMS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCCRMFORMS_DPC")) && (seclevel('RCCRMFORMS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCRMFORMS_DPC",true);

$__DPC['RCCRMFORMS_DPC'] = 'rccrmforms';

$__EVENTS['RCCRMFORMS_DPC'][0]='cpcrmforms';
$__EVENTS['RCCRMFORMS_DPC'][1]='cpcrmfshow';
$__EVENTS['RCCRMFORMS_DPC'][2]='cpcrmshowform';
$__EVENTS['RCCRMFORMS_DPC'][3]='cpcrmformdetail';
$__EVENTS['RCCRMFORMS_DPC'][4]='cpcrmformdata';
$__EVENTS['RCCRMFORMS_DPC'][5]='cpcrmformsubdetail';

$__ACTIONS['RCCRMFORMS_DPC'][0]='cpcrmforms';
$__ACTIONS['RCCRMFORMS_DPC'][1]='cpcrmfshow';
$__ACTIONS['RCCRMFORMS_DPC'][2]='cpcrmshowform';
$__ACTIONS['RCCRMFORMS_DPC'][3]='cpcrmformdetail';
$__ACTIONS['RCCRMFORMS_DPC'][4]='cpcrmformdata';
$__ACTIONS['RCCRMFORMS_DPC'][5]='cpcrmformsubdetail';

$__LOCALE['RCCRMFORMS_DPC'][0]='RCCRMFORMS_DPC;Crm forms;Crm forms';
$__LOCALE['RCCRMFORMS_DPC'][1]='_date;Date;Ημερ.';
$__LOCALE['RCCRMFORMS_DPC'][2]='_time;Time;Ώρα';
$__LOCALE['RCCRMFORMS_DPC'][3]='_forms;Forms;Φόρμες';
$__LOCALE['RCCRMFORMS_DPC'][4]='_owner;Owner;Καταχώρητης';
$__LOCALE['RCCRMFORMS_DPC'][5]='_active;Active;Ενεργό';
$__LOCALE['RCCRMFORMS_DPC'][6]='_title;Title;Τίτλος';
$__LOCALE['RCCRMFORMS_DPC'][7]='_descr;Description;Περιγραφή';
$__LOCALE['RCCRMFORMS_DPC'][8]='_cat;Category;Κατηγορία';
$__LOCALE['RCCRMFORMS_DPC'][9]='_class;Class;Κλάση';
$__LOCALE['RCCRMFORMS_DPC'][10]='_code;Code;Κωδικός';


class rccrmforms {
	
    var $title, $path, $urlpath;
	var $seclevid, $userDemoIds;
	
	var $crmplus, $ckeditver;	
	
	function __construct() {

		$this->path = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');
		$this->title = localize('RCCRM_DPC',getlocal());	 
	  
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		$this->userDemoIds = array(5,6,7,8); 		  
		
		$this->crmplus = false;	
		$this->ckeditver = 3;
	}

    function event($event=null) {
	
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;		 
	
		switch ($event) {
			case 'cpcrmformsubdetail': break;				
			
			case 'cpcrmformdata': echo $this->loadsubframe();
		                          die();
		                          break;
							   
			case 'cpcrmformdetail':
			                      break;		
			case 'cpcrmshowform': break;
			case 'cpcrmfshow'   : echo $this->loadframe();
		                          die();
							      break;
			case 'cpcrmforms'   :
			default             :    
		                      
		}
			
    }   
	
    function action($action=null) {
		
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;	
	 
		switch ($action) {	
			case 'cpcrmformsubdetail': $out = $this->showFormDetail(); 
			                           break;		
		
		    case 'cpcrmformdata': break;
			
			case 'cpcrmformdetail': 
			                      break;
			case 'cpcrmshowform': $out = $this->show(); 
			                      break;	
			case 'cpcrmfshow'   : break;
			case 'cpcrmforms'   :
			default             : $out = $this->crmFormsMode();
		}	 

		return ($out);
    }
	
	protected function crmFormsMode() {
		$mode = GetReq('mode') ? GetReq('mode') : 'forms';
        
		$turl0 = seturl('t=cpcrmforms&mode=messages');		
		$turl1 = seturl('t=cpcrmforms&mode=offers');
		$button = $this->createButton(localize('_forms', getlocal()), 
										array(localize('_messages', getlocal())=>$turl0,
										      localize('_offers', getlocal())=>$turl1,
		                                ),'success');		
																	
		switch ($mode) {
			
			case 'messages' :
			case 'offers'   :
			case 'forms'    :   
			default         :   $content = $this->forms_grid(null,140,5,'d', true); 
		}			
					
		$ret = $this->window('e-CRM: '.localize('_'.$mode, getlocal()), $button, $content);
		
		return ($ret);
	}	
	
	protected function loadframe($ajaxdiv=null, $mode=null) {
		$id = GetParam('id');
		$cmd = 'cpcrmshowform&id='.$id ;//$mode not used
		$bodyurl = seturl("t=$cmd&iframe=1");
			
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"460px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}
	
	protected function loadsubframe($ajaxdiv=null, $module=null, $init=false) {
		$module = $module ? $module : GetParam('module'); //module details
		$id = GetParam('id'); //form id
		
		if ($init)
			$bodyurl = seturl("t=cpcrmformdetail&iframe=1&id=$id&module=$module");
		else
			$bodyurl = seturl("t=cpcrmformsubdetail&iframe=1&id=$id&module=$module");
	
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"460px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}	

	protected function show() {
		$id = GetReq('id');
		$title = 'ID:' . $id; 
		$ret = null; //$title; //test
		
		$ret = $this->loadsubframe(null,'formhtml', true);
		
		return ($ret);
	}	
	
	protected function showFormDetail() {
		$module = GetReq('module');// ? GetReq('module') : 'formhtml';
		
		switch ($module) {
			case 'formcode' :
			case 'formhtml' :
			default         :
		}
		
		return ($ret);
	}
	
	protected function fetchField($id=null, $field=null) {
		if ((!$id) || (!$field)) return null;
		
		$db = GetGlobal('db');
		$sSQL = "select $field from crmforms where id=".$id;
		//echo $sSQL;
		$res = $db->Execute($sSQL);
		return $res->fields[0];
	}
	
	protected function saveFormData($id, $data=null) {
		if ((!$id) || (!$data)) return null;
		
		$db = GetGlobal('db');
		$sSQL = "update crmforms set formdata=" . $db->qstr($data);
		$sSQL.= " where id=" . $id;
		$res = $db->Execute($sSQL);
		return $res->fields[0];
	}	
	
	public function fetchFormData() {
		$id = GetParam('id');
		
		if (isset($_POST['formdata'])) 
			$ret = $this->saveFormData($id, base64_encode($_POST['formdata']));
		
		return base64_decode($this->fetchField($id, 'formdata'));
	}
	
	protected function saveCodeData($id, $data=null) {
		if ((!$id) || (!$data)) return null;
		
		$db = GetGlobal('db');
		$sSQL = "update crmforms set codedata=" . $db->qstr($data);
		$sSQL.= " where id=" . $id;
		//echo $sSQL;
		$res = $db->Execute($sSQL);
		return $res->fields[0];
	}		
	
	public function fetchCodeData() {
		$id = GetParam('id');
		
		if (isset($_POST['codedata'])) 
			$ret = $this->saveCodeData($id, base64_encode($_POST['codedata']));
		
		return base64_decode($this->fetchField($id, 'codedata'));
	}	
	
	protected function forms_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('_forms', getlocal()); 
		
        $xsSQL = "SELECT * from (select id,active,date,title,descr,code,class,type from crmforms) o ";		   
		   							
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('id',getlocal())."|2|0|");//"|link|5|"."javascript:editform(\"{id}\");".'||');			
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+active|".localize('_active',getlocal())."|boolean|1|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+date|".localize('_date',getlocal())."|link|5|"."javascript:editform(\"{id}\");".'||'); //"|5|0|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+code|".localize('_code',getlocal())."|5|1|");		
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+title|".localize('_title',getlocal())."|10|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+descr|".localize('_descr',getlocal())."|19|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+class|".localize('_class',getlocal())."|5|1|");
		GetGlobal('controller')->calldpc_method("mygrid.column use grid1+type|".localize('_type',getlocal())."|5|1|");

		$out = GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+crmforms+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width+0+1+1");
		
		return ($out);  	
	}	
	
	protected function createButton($name=null, $urls=null, $t=null, $s=null) {
		$type = $t ? $t : 'primary'; //danger /warning / info /success
		switch ($s) {
			case 'large' : $size = 'btn-large '; break;
			case 'small' : $size = 'btn-small '; break;
			case 'mini'  : $size = 'btn-mini '; break;
			default      : $size = null;
		}
		
		//$ret = "<button class=\"btn  btn-primary\" type=\"button\">Primary</button>";
		
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
	
	
	protected function window($title, $buttons, $content) {
		$ret = '	
		    <div class="row-fluid">
                <div class="span12">
                  <div class="widget red">
                        <div class="widget-title">
                           <h4><i class="icon-reorder"></i> '.$title.'</h4>
                           <span class="tools">
                               <a href="javascript:;" class="icon-chevron-down"></a>
                           </span>
                        </div>
                        <div class="widget-body">
							<div class="btn-toolbar">
							'. $buttons .'
							<hr/><div id="crmform"></div>
							</div>
							'.  $content .'
                        </div>
                  </div>
                </div>
            </div>
';
		return ($ret);
	}	
	
	public function formsTree() {
		if (!GetReq('id')) return false;		
		
		$id = "&id=" . GetReq('id');
		$this->crmplus = (defined('CRMPLUS_DPC')) ? true : false;
		$treeTitle = $this->fetchField(GetReq('id'), 'code');
		
		$crmplustree = $this->crmplus ? '
										<li>
											<a data-value="gh_Repos" data-toggle="branch" class="tree-toggle closed" role="branch" href="#">Plus</a>
                                            <ul class="branch">
											<li><a href="#">Actions</a></li>
                                            <li><a href="javascript:subdetails(\'plus'.$id.'\')">Projects</a></li>
                                            <li>
                                                <a data-value="GitHub_Repos" data-toggle="branch" class="tree-toggle closed" role="branch" href="#">Automations</a>
                                                <ul class="branch">
                                                    <li><a href="#">Events</a></li>
                                                    <li><a href="#">Users</a></li>
                                                    <li><a href="#">Feedbacks</a></li>
                                                    <li><a href="#">Reports</a></li>
                                                    <li><a href="#">Sales</a></li>
                                                    <li><a href="#">Revenue</a></li>
                                                </ul>
                                            </li></ul>
                                        </li>' : null;		
		
		$ret = '	
                            <ul id="tree_2" class="tree">
                                <li>
                                    <a data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle" data-role="branch" href="#">'.substr($treeTitle, 0, 9).'</a>
                                    <ul class="branch in">
										<li><a data-role="leaf" href="javascript:subdetails(\'formhtml'.$id.'\')"><i class="icon-user"></i> Html</a></li>
                                        <li><a data-role="leaf" href="javascript:subdetails(\'formcode'.$id.'\')"><i class=" icon-book"></i> Code</a></li>
                                        <li><a data-role="leaf" href="javascript:subdetails(\'users'.$id.'\')"><i class="icon-share"></i> Users</a></li>										
                                        <li><a data-role="leaf" href="javascript:subdetails(\'customers'.$id.'\')"><i class=" icon-bullhorn"></i> Customers</a></li>
                                        <li><a data-role="leaf" href="javascript:subdetails(\'items'.$id.'\')"><i class="icon-tasks"></i> Items</a></li>
										<li><a data-role="leaf" href="javascript:subdetails(\'tasks'.$id.'\')"><i class="icon-share"></i> Tasks</a></li>
											
										'.$crmplustree.'		
										<li>
                                            <a id="nut3" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle closed" href="#">
                                                Templates
                                            </a>
                                            <ul class="branch">
                                                <li><a data-role="leaf" href="#"><i class="icon-cloud"></i> New</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-user-md"></i> Attach</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-retweet"></i> View</a></li>
                                            </ul>
                                        </li>
										
                                        <li>
                                            <a id="nut6" data-value="Bootstrap_Tree" data-toggle="branch" class="tree-toggle closed" href="#">
                                                Items
                                            </a>
                                            <ul class="branch">
                                                <li><a data-role="leaf" href="#"><i class="icon-tags"></i> Select</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-magic"></i> Collect</a></li>
                                                <li><a data-role="leaf" href="#"><i class="icon-user"></i> Offers</a></li>
												<li><a data-role="leaf" href="#"><i class="icon-magic"></i> Specials</a></li>
                                            </ul>
                                        </li>										
                                    </ul>
                                </li>
                            </ul>		
';
		return ($ret);
	}
		
    public function ckeditorjs($element=null, $maxmininit=false, $disable=false) {
		//CKEDITOR.config.basicEntities = false;
		//CKEDITOR.config.htmlEncodeOutput = false;	
	    //...		
		//ckeditor attributes depend on template edit new / mail text
		//$readonly = (($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? 0 : 1;  
		$readonly = $disable ? 1 : 0;  
	
        //$element_name = (($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? 'template_text' : 'mail_text';	
		$element_name = $element; // ? $element : ((($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? 'template_text' : 'mail_text');
		
		//minmax only when select for new/edit not when select for mail sent
		//$minmax = (($_GET['t']=='cptemplatenew')||($_GET['t']=='cptemplatesav')) ? ($_GET['stemplate'] ? 'maximize' : 'minimize') : 'minimize' ;
		$minmax = $maxmininit ? $maxmininit : ($_GET['stemplate'] ? 'maximize' : 'minimize') ;
		//echo $minmax;	
		
	    $ckattr = ($this->ckeditver==4) ?
	           "fullpage : true,"	  
	           : 
	           "skin : 'v2', 
			   fullpage : true, 
			   extraPlugins :'docprops',";		
		
		$ret = "
			<script type='text/javascript'>
	           CKEDITOR.replace('$element_name',
			   {
				$ckattr	
				filebrowserBrowseUrl : '/cp/ckfinder/ckfinder.html',
	            filebrowserImageBrowseUrl : '/cp/ckfinder/ckfinder.html?type=Images',
	            filebrowserFlashBrowseUrl : '/cp/ckfinder/ckfinder.html?type=Flash',
	            filebrowserUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	            filebrowserImageUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
	            filebrowserFlashUploadUrl : '/cp/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
	            filebrowserWindowWidth : '1000',
 	            filebrowserWindowHeight : '700'				
			   }		   
			   );
			   CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
			   CKEDITOR.config.forcePasteAsPlainText = false; // default so content won't be manipulated on load
			   CKEDITOR.config.fullPage = true;
               CKEDITOR.config.entities = false;
			   CKEDITOR.config.basicEntities = false;
			   CKEDITOR.config.entities_greek = false;
			   CKEDITOR.config.entities_latin = false;
			   CKEDITOR.config.entities_additional = '';
			   CKEDITOR.config.htmlEncodeOutput = false;
			   CKEDITOR.config.entities_processNumerical = false;
			   CKEDITOR.config.fillEmptyBlocks = function (element) {
				return true; // DON'T DO ANYTHING!!!!!
               };
			   CKEDITOR.config.allowedContent = true; // don't filter my data	
			   CKEDITOR.config.protectedSource.push( /<phpdac[\s\S]*?\/phpdac>/g );
			   CKEDITOR.on('instanceReady',
               function( evt )
               {
                  var editor = evt.editor;
                  editor.execCommand('$minmax');
				  editor.setReadOnly($readonly);
               });			   
		    </script>		
";
		//     CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
		return ($ret);
	}		
	
};
}
?>