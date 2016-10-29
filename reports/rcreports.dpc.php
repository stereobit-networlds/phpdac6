<?php
$__DPCSEC['RCREPORTS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCREPORTS_DPC")) && (seclevel('RCREPORTS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCREPORTS_DPC",true);

$__DPC['RCREPORTS_DPC'] = 'rcreports';
 
$__EVENTS['RCREPORTS_DPC'][0]='cpreports';
$__EVENTS['RCREPORTS_DPC'][1]='cprepshow';
$__EVENTS['RCREPORTS_DPC'][2]='cprepframe';
$__EVENTS['RCREPORTS_DPC'][3]='cprepcode';
$__EVENTS['RCREPORTS_DPC'][4]='cprepcodesave';
$__EVENTS['RCREPORTS_DPC'][5]='cprepcrm';

$__ACTIONS['RCREPORTS_DPC'][0]='cpreports';
$__ACTIONS['RCREPORTS_DPC'][1]='cprepshow';
$__ACTIONS['RCREPORTS_DPC'][2]='cprepframe';
$__ACTIONS['RCREPORTS_DPC'][3]='cprepcode';
$__ACTIONS['RCREPORTS_DPC'][4]='cprepcodesave';
$__ACTIONS['RCREPORTS_DPC'][5]='cprepcrm';


$__LOCALE['RCREPORTS_DPC'][0]='RCREPORTS_DPC;Reports;Αναφορές';
$__LOCALE['RCREPORTS_DPC'][1]='_description;Description;Περιγραφή';
$__LOCALE['RCREPORTS_DPC'][6]='_date;Date;Ημερομηνία';
$__LOCALE['RCREPORTS_DPC'][7]='_results;Results;Αποτέλεσμα';
$__LOCALE['RCREPORTS_DPC'][8]='_pid;pid;pid';
$__LOCALE['RCREPORTS_DPC'][10]='_code;SQL;SQL';
$__LOCALE['RCREPORTS_DPC'][11]='_id;ID;ID';
$__LOCALE['RCREPORTS_DPC'][12]='_title;Title;Τίτλος';
$__LOCALE['RCREPORTS_DPC'][13]='_type;Type;Τύπος';
$__LOCALE['RCREPORTS_DPC'][15]='_save;Execute;Εκτέλεση';

class rcreports  {

    var $title, $path;
	var $seclevid, $userDemoIds;
		
	function __construct() {
	
	  $this->path = paramload('SHELL','prpath');
	  $this->title = localize('RCREPORTS_DPC',getlocal());	 
	  
	  $this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
	  $this->userDemoIds = array(5,6,7); //8 
	  //echo $this->seclevid;  
	}
	
    function event($event=null) {
	
	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;		 
	
	   switch ($event) {
		 case 'cprepcrm'     : break; 		   
		   
		 case 'cprepcodesave': $this->save_report_code();	
		                       break;  		   
		   							   
		 case 'cprepcode'    : die();
							 
		 case 'cprepshow'    : break;
		 case 'cprepframe'   : echo $this->loadframe();
		                       die();
							   break; 	   
	     case 'cpreports'    :
		 default             :    
		                      
	   }
			
    }   
	
    function action($action=null) {
		
	  $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	  if ($login!='yes') return null;	
	 
	  switch ($action) {
		 case 'cprepcrm'      : /*crm report call*/
								$out = $this->crm_results_grid(null,250,10,'r', true); 
								//$out .= $this->codeform();
								$out .= $this->show_code_results();
		                        break;	
		 
		 case 'cprepcodesave' : 										  
		 case 'cprepshow'     : $out = $this->results_grid(null,140,5,'r', true); 
								$out .= $this->codeform();
								$out .= $this->show_code_results();
							    break; 
		 case 'cprepframe'    : break;					  
	     case 'cpreports'     :

		 default            : $out .= "<div id='report'></div>";
		                      $out .= $this->reports_grid(null,140,5,'d', true);	
							  
	  }	 

	  return ($out);
    }
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}		

	protected function loadframe($ajaxdiv=null) {
		$id = GetParam('id');
		$bodyurl = seturl("t=cprepshow&iframe=1&id=$id");
			
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"540px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}		
	
	protected function reports_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;				   
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('RCREPORTS_DPC',getlocal()); 

        $myfields = "id,timein,title,description,rgroup,scode";  		
		
		$xsSQL = 'select * from (select '.$myfields . ' from reports) as o';
		  
		_m("mygrid.column use grid1+id|".localize('_id',getlocal())."|2|0");	
		_m("mygrid.column use grid1+timein|".localize('_date',getlocal())."|link|2|"."javascript:report(\"{id}\");".'||');			
		_m("mygrid.column use grid1+title|".localize('_title',getlocal())."|5|1"); 
		_m("mygrid.column use grid1+description|".localize('_description',getlocal())."|10|1|");
		_m("mygrid.column use grid1+rgroup|".localize('_type',getlocal()).'|5|1');		
		_m("mygrid.column use grid1+scode|".localize('_code',getlocal()).'|20|1');	
	
		$out = _m("mygrid.grid use grid1+reports+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width");
		
		return ($out);  	
	}
	
	
	protected function loadsubframe($ajaxdiv=null) {
		$id=GetParam('id');		
	    $bodyurl = seturl("t=cprepcode&iframe=1&id=$id");
	
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"260px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}			
	
	
    protected function results_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {		
	    $height = $height ? $height : 440;
        $rows = $rows ? $rows : 18;
        $width = $width ? $width : null; //wide
        $mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;					
        $lan = getlocal() ? getlocal() : 0;
		$title = localize('_results', $lan);	
		
		$id = GetParam('id');
		if ($_POST['id']) return; //null when post code = execute		

		list($xsSQL, $fields, $table) = $this->load_report_sql($id); 
		
		if ($fields) { //not necessery except if set column attributes
			$_fields = explode(',',$fields);
			foreach ($_fields as $i=>$f) {
				switch ($f) {
					case 'id' : $length = 2; break;
					default   : $length = 5;
				}
				//echo $f . $length . '<br/>';
				_m("mygrid.column use grid1+$f|".localize($f,getlocal())."|$length|0|");		
			}	
		}
		
		$out .= _m("mygrid.grid use grid1+$table+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width");//+0+1+1");
		
	    return ($out);
    }		
	
	
    protected function codeform($id=null)  { 
	    $id = GetParam('id');	
        $filename = seturl("t=cprepcodesave");//&id=".$id);  
        $readonly = $this->isDemoUser() ? 'readonly' : null;  		
    
        $toprint  = "<FORM id=\"form1\" action=". "$filename" . " method=post>";
        $toprint .= "<P><FONT face=\"Arial, Helvetica, sans-serif\" size=1>";	   
        $toprint .= "<DIV class=\"monospace\"><TEXTAREA wrap='virtual' id='crondata' style=\"width:100%\" NAME=\"repcode\" ROWS=15 cols=60 wrap=\"virtual\" $readonly>"; 
	    $toprint .=  $this->load_report_code($id);		 
        $toprint .= "</TEXTAREA></DIV>";	   
	   
        if (!$this->isDemoUser()) {
			$toprint .= "<input type=\"hidden\" name=\"FormName\" value=\"savejobcode\">"; 
			$toprint .= "<input type=\"hidden\" name=\"id\" value=\"".$id."\">";
			$toprint .= "<INPUT type=\"submit\" name=\"submit\" value=\"" . localize('_save',getlocal()) . "\">&nbsp;";  
			$toprint .= "<INPUT type=\"hidden\" name=\"FormAction\" value=\"" . "cprepcodesave" . "\">";	 	   
	   	}    
        $toprint .= "</FONT></FORM>"; 

       return ($toprint);
    }	

	protected function load_report_code($id) {
		$db = GetGlobal('db'); 
		if (!$id) return;
		$sql = "select code from reports where id=".$id;
		$result = $db->Execute($sql);
		
		return ($result->fields['code']);		
	}		
	
	protected function save_report_code() {
		$db = GetGlobal('db'); 
		if (!$id=GetParam('id')) return;
		$sql = "UPDATE reports SET code=" . $db->qstr(GetParam('repcode')) . "where id=".$id;
		$result = $db->Execute($sql);

		return (true);		
	}	

	protected function load_report_sql($id) {
		$db = GetGlobal('db'); 
		if (!$id) return;
		
		$sql = "select scode from reports where id=".$id;
		//echo $sql;
		$result = $db->Execute($sql);
		
		if ($mysql = $result->fields['scode']) {
			$phrases = explode(' ', $mysql);
		    if (stristr($mysql, 'where')) {
				foreach ($phrases as $p) {
					if (strstr($p,'where')) break;
					$table = $p;	
				}	
			}
			else 
				$table = array_pop($phrases);
			
			//echo $table;
			//print_r($phrases);
			
			//rest tokens
			$tokens = array_reverse($phrases);
			foreach ($tokens as $p) { //csv fields without spaces
				if (strstr($p,'select')) break;
				$fields = $p;	
			}
			//echo $fields;
			
			return array($mysql, $fields, $table);		
		}
		return false;
	}		
	
	
	protected function show_code_results($rid=null, $silence=false) {
		$db = GetGlobal('db'); 
		$id = $rid ? $rid : GetParam('id');
		if (!$id) return;
		
		$postedCode = GetParam('repcode');	
		$retline = array();
		$header = '<h2>' . localize('_results',getlocal()) . '</h2>';
		$footer = '<hr/>';
		
		$sql = "select scode,code from reports where id=".$id;
		$result = $db->Execute($sql);	

		$_code = $postedCode ? $postedCode : $result->fields['code'];
		
		if ($daccode = $_code) {	
			$mysql = $result->fields['scode'];
			if ($mysql) {
				$res = $db->Execute($mysql);
				//echo $mysql;
				foreach ($res as $i=>$rec) { //for every result line

					$daccode = $_code; //reset
					
				    foreach ($rec as $name=>$value) {//for each numeric field replace code
						if (is_numeric($name))
							$daccode = str_replace('@'.$name, $value, $daccode);
				    }
					//when field replacment done then execute code
					if ($codex = eval($daccode))
						$retline[] = $codex;
				}
				
				$ret = $silence ? null : $header . implode('<br/>',$retline) . $footer .  $mysql;
				return ($ret);
			}
		}
		return false;
	}
	
    protected function crm_results_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $height = $height ? $height : 440;
        $rows = $rows ? $rows : 18;
        $width = $width ? $width : null; //wide
        $mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;					
        $lan = getlocal() ? getlocal() : 0;
		$title = localize('_results', $lan);			
		
		$id = GetParam('id'); //as come from crm click
		if (strstr($id,'~')) {
			$parts = explode('~', $id);
			$_id = $parts[0];
			$email = $parts[1]; //crm id
			$where = " email='$email'";
		}
		else {
			$_id = $id;
			$where = null;
		}	

		list($xsSQL, $fields, $table) = $this->load_report_sql($_id); 
		
		if ($where) 
			//$xsSQL .= strstr($xsSQL,' where ') ? ' and ' . $where : ' where ' . $where; //group by issue
			if (strstr($xsSQL,' where ')) 
				$xsSQL  = str_replace(' where ', ' where '.$where.' and ',$xsSQL); 
			else
				$xsSQL .= ' where ' . $where;
        //echo $xsSQL;
		
		if ($fields) { //not necessery except if set column attributes
			$_fields = explode(',',$fields);
			foreach ($_fields as $i=>$f) {
				switch ($f) {
					case 'id' : $length = 2; break;
					default   : $length = 5;
				}
				//echo $f . $length . '<br/>';
				_m("mygrid.column use grid1+$f|".localize($f,getlocal())."|$length|0|");		
			}	
		}
		
		$out .= _m("mygrid.grid use grid1+$table+$xsSQL+$mode+$title+id+$noctrl+1+$rows+$height+$width");//+0+1+1");
		
	    return ($out);
    }	
	
	protected function getIdFromName($name) {
		$db = GetGlobal('db'); 		
		$sSQL = 'select id from reports where title='.$db->qstr($name);
		$res = $db->Execute($sSQL);
		
		return ($res->fields[0]);
	}
	
	public function test($name=null) {
		return $name;
	}		
	
	public function execute_report($name=null) {
		$db = GetGlobal('db'); 		
		if (!$name) return false;
		
		$id = $this->getIdFromName($name);
		//list($xsSQL, $fields, $table) = $this->load_report_sql($id); 
		//$res = $db->Execute($xsSQL);
		$ret = $this->show_code_results($id, true);
		
		return true;
	}
	
};
}
?>