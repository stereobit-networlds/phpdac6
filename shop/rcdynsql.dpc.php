<?php
$__DPCSEC['RCDYNSQL_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("RCDYNSQL_DPC")) && (seclevel('RCDYNSQL_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCDYNSQL_DPC",true);

$__DPC['RCDYNSQL_DPC'] = 'rcdynsql';
 
$__EVENTS['RCDYNSQL_DPC'][0]='cpdynsql';
$__EVENTS['RCDYNSQL_DPC'][1]='cpsqlshow';
$__EVENTS['RCDYNSQL_DPC'][2]='cpsqlsave';
$__EVENTS['RCDYNSQL_DPC'][3]='cpdynview';
$__EVENTS['RCDYNSQL_DPC'][4]='cptransviewhtml';
$__EVENTS['RCDYNSQL_DPC'][5]='cploadframe';

$__ACTIONS['RCDYNSQL_DPC'][0]='cpdynsql';
$__ACTIONS['RCDYNSQL_DPC'][1]='cpsqlshow';
$__ACTIONS['RCDYNSQL_DPC'][2]='cpsqlsave';
$__ACTIONS['RCDYNSQL_DPC'][3]='cpdynview';
$__ACTIONS['RCDYNSQL_DPC'][4]='cptransviewhtml';
$__ACTIONS['RCDYNSQL_DPC'][5]='cploadframe';

$__DPCATTR['RCDYNSQL_DPC']['cpdynsql'] = 'cpdynsql,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCDYNSQL_DPC'][0]='RCDYNSQL_DPC;SyncSQL;Συγχρονισμός';
$__LOCALE['RCDYNSQL_DPC'][1]='_date;Date;Ημερ.';
$__LOCALE['RCDYNSQL_DPC'][2]='_time;Time;Ώρα';
$__LOCALE['RCDYNSQL_DPC'][3]='_status;Status;Φάση';
$__LOCALE['RCDYNSQL_DPC'][4]='_fid;id;id';
$__LOCALE['RCDYNSQL_DPC'][5]='_savesql;Save;Save';
$__LOCALE['RCDYNSQL_DPC'][6]='_SQL;SQL Query;SQL Query';
$__LOCALE['RCDYNSQL_DPC'][7]='_xdate;X Date;X Date';
$__LOCALE['RCDYNSQL_DPC'][8]='_ref;Reference;Reference';
$__LOCALE['RCDYNSQL_DPC'][9]='_sqlres;Res;Res';


class rcdynsql {

    var $reset_db, $title;
	var $_grids, $charts;
	var $ajaxLink;
	var $hasgraph, $hasgauge;
    var $status_sid, $status_sidexp;
		
	function rctransactions() {
	

      $this->path = paramload('SHELL','prpath');
     	
	  $this->title = localize('RCDYNSQL_DPC',getlocal());		
	  $this->reset_db = false;
	  
	  $this->ajaxLink = seturl('t=cpsqlshow&statsid='); //for use with...	      
	  
	  $this->hasgraph = false;
	  $this->hasgauge = false;	  
	  $this->graphx = remote_paramload('RCTRANSACTIONS','graphx',$this->path);
	  $this->graphy = remote_paramload('RCTRANSACTIONS','graphy',$this->path);

      $this->status_sid = arrayload('RCTRANSACTIONS','sid');  

      $this->status_exp = arrayload('RCTRANSACTIONS','sidexp'); 
           
	}
	
    function event($event=null) {
	
	   //ALLOW EXPRIRED APPS
	   /////////////////////////////////////////////////////////////
	   if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	
	   /////////////////////////////////////////////////////////////		 
	
	   switch ($event) {
	     case 'cpsqlsave'  : $this->save_sql_file(); 
		                     break;	   
		 case 'cpdynview'  : echo $this->form(GetReq('tid')); die();
		                     break;		   
		 case 'cploadframe': echo $this->loadframe('trans');
		                     die();
		                     break;		
							 
		 case 'cpsqlshow': if (!$cvid = GetParam('statsid')) $cvid=-1; 
		                      $this->charts = new swfcharts;	
		                      $this->hasgraph = $this->charts->create_chart_data('transcust','where cid='.$cvid);
							  break; 	   
	     case 'cpdynsql'    :
		 default            : //$this->grid_javascript();	   
		                      $this->charts = new swfcharts;	
		                      $this->hasgraph = $this->charts->create_chart_data('transactions',"");
							  $this->hasgauge = $this->charts->create_gauge_data('income',"where cid=0",null,1,400,300,'meter');
	   }
			
    }   
	
    function action($action=null) {
	 
	  switch ($action) {	  
	     case 'cpsqlsave'  : die($this->save_sql()); 
		                     break;
		 case 'cpdynview'  : break;
							 	  
		 case 'cpsqlshow': if ($this->hasgraph)
		                        $out = $this->show_graph('transcust','Customer Transactions',$this->ajaxLink,'stats');
							  else
							    $out = "<h3>".localize('_GNAVAL',0)."</h3>";	
							  die('stats|'.$out); //ajax return
							  break; 
	     case 'cpdynsql'    :

		 default            : $out .= $this->show_transactions();
	  }	 

	  return ($out);
    }
	
	/*function grid_javascript() {
      if (iniload('JAVASCRIPT')) {
		      		   
	       $code = $this->init_grids();			

		   $js = new jscript;	   
           $js->load_js($code,"",1);			   
		   unset ($js);
	  }		
	}*/

	function show_graph($xmlfile,$title,$url=null,$ajaxid=null,$xmax=null,$ymax=null) {
	  $gx = $this->graphx?$this->graphx:$xmax?$xmax:550;
	  $gy = $this->graphy?$this->graphy:$ymax?$ymax:250;	
	
	  $ret = $title; 	
	  $ret .= $this->charts->show_chart($xmlfile,$gx,$gy,$url,$ajaxid);
	  return ($ret);
	}
	
	function show_transactions() {
	
	   if ($this->msg) $out = $this->msg;

	   $out = $this->show_grids();	   	
	   
	   //HIDDEN FIELD TO HOLD STATS ID FOR AJAX HANDLE
	   $out .= "<INPUT TYPE= \"hidden\" ID= \"statsid\" VALUE=\"0\" >";	   	    
	  
	   return ($out);		   
	}		
	/*
	function init_grids() {

	    //$bodyurl = seturl("t=cptranslink&tid=");	
		$bodyurl = seturl("t=cploadframe&tid=");
	
        //disable alert !!!!!!!!!!!!		
		$out = "
function alert() {}\r\n 

function update_stats_id() {
  var str = arguments[0];
  var str1 = arguments[1];
  var str2 = arguments[2];
  
  
  statsid.value = str;
  //alert(statsid.value);
  sndReqArg('$this->ajaxLink'+statsid.value,'stats');
  
  return str1+' '+str2;
}

function show_body() {
  var str = arguments[0];
  var str1 = arguments[1];
  var str2 = arguments[2];  
  var taskid;
  var custid;
  
  taskid = str;  
  custid = str1;
  sndReqArg('$bodyurl'+taskid,'trans');
}
			
";
        $out .= "\r\n";
        return ($out);
	}*/
	
	function show_grid($x=null,$y=null,$filter=null,$bfilter=null) {

	
	    if (defined('MYGRID_DPC')) {
			
								  
			$lookup2 = "ELT(FIELD(i.status, 1,0),".
				                  "'".localize('1',getlocal())."',".
								  "'".localize('0',getlocal())."') as s";								  
		


			$xsSQL2 = "SELECT * FROM (SELECT i.id,i.fid,i.time,i.date,i.execdate,i.status,i.sqlres,i.reference FROM syncsql i order by i.id DESC) x";
				//echo $xsSQL2;

			//$out.= $xsSQL2;
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+id|".localize('id',getlocal())."|5|1|");
            GetGlobal('controller')->calldpc_method("mygrid.column use grid2+fid|".localize('fid',getlocal())."|link|5|"."javascript:show_body({id});".'||');
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+time|".localize('_date',getlocal())."|date|0|");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+date|".localize('_date',getlocal())."|date|0|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+execdate|".localize('_xdate',getlocal())."|date|0|");			
			GetGlobal('controller')->calldpc_method("mygrid.column use grid2+status|".localize('_status',getlocal())."|5|1|");
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tdate|".localize('_status',getlocal())."|boolean|1|EXECUTED:INSERTED");			
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tdate|".localize('_date',getlocal())."|date|0|");
		    //GetGlobal('controller')->calldpc_method("mygrid.column use grid2+ttime|".localize('_time',getlocal())."|9|0|");	
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tstatus|".localize('_status',getlocal())."|5|0|||||right");	
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+tstatus|".localize('_status',getlocal())."|link|10|"."javascript:show_body({tid});".'||');
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+sqlres|".localize('_sqlres',getlocal())."|20|1|");			
		    GetGlobal('controller')->calldpc_method("mygrid.column use grid2+reference|".localize('_ref',getlocal())."|20|1|");
	        //GetGlobal('controller')->calldpc_method("mygrid.column use grid2+qty|".localize('_qty',getlocal())."|5|0|||||right");				
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+cost|".localize('_cost',getlocal())."|5|0|||||right");
			//GetGlobal('controller')->calldpc_method("mygrid.column use grid2+costpt|".localize('_costpt',getlocal())."|5|0|||||right");
			$ret .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid2+syncsql+$xsSQL2+r+".localize('RCDYNSQL_DPC',getlocal())."+id+1+1+20+400+$x+0+1+1");

	    }
		else 
		   $ret .= 'Initialize jqgrid.';
        
        return ($ret);
  	
	}
	
	function show_grids() {
		
	   $ret = $this->show_grid();	
       //$ret .= GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use trans");
	   $ret .= "<div id='trans'></div>";
	   return ($ret);	
	}	
	
	protected function load_sql_file($id=null) {
		$db = GetGlobal('db'); 
		if (!$id) return;
		$sql = "select sqlquery from syncsql where id=".$id;
		$result = $db->Execute($sql);
		
		return ($result->fields['sqlquery']);
	}
	
	protected function save_sql_file() {
		$db = GetGlobal('db'); 
		if (!$id) return;
		$sql = "UPDATE syncsql SET sqlquery=" . $db->qstr(GetParam('sqlcmd')) . "where id=".GetParam('tid');
		//$result = $db->Execute($sql,2);
		//echo $sql; ///Cannot modify header information - headers already sent by (output started at /home/stereobi/public_html/cp/dpc/jqgrid/jqgrid.lib.php:180) in ...
		return (true);
	}

	protected function save_sql() {
       if (GetParam('tid'))
			return (GetParam('sqlcmd'));	
		
	} 	
	
	
    protected function form($id=null)  { 
	
       $filename = seturl("t=cpsqlsave&editmode=".GetReq('editmode'));      
    
       $toprint  = "<FORM action=". "$filename" . " method=post>";
       $toprint .= "<P><FONT face=\"Arial, Helvetica, sans-serif\" size=1>";
	   //$toprint .= "<STRONG>" . localize('_SQL',getlocal()) . "</STRONG><br>";
	   //$toprint .= "<INPUT type=\"text\" name=submail maxlenght=\"64\" size=25><br>"; 
	   //$toprint .= "<select name='xmlfeed' onChange='location=this.options[this.selectedIndex].value'>" .
				   //$opt . "</select>";
	   
       $toprint .= "<DIV class=\"monospace\"><TEXTAREA style=\"width:100%\" NAME=\"sqlcmd\" ROWS=18 cols=60 wrap=\"virtual\" >"; //readonly
	   $toprint .=  $this->load_sql_file($id);		 
       $toprint .= "</TEXTAREA></DIV><br>";	   
	   
 
       $toprint .= "<input type=\"hidden\" name=\"FormName\" value=\"savesql\">"; 
	   $toprint .= "<input type=\"hidden\" name=\"tid\" value=\"".$id."\">";
       $toprint .= "<INPUT type=\"submit\" name=\"submit\" value=\"" . localize('_savesql',getlocal()) . "\">&nbsp;";  
       $toprint .= "<INPUT type=\"hidden\" name=\"FormAction\" value=\"" . "cpsavesql" . "\">";	 	   
	   	    
       $toprint .= "</FONT></FORM>"; 

       return ($toprint);
    }		
	
	
	function loadframe($ajaxdiv=null) {
	    $bodyurl = seturl("t=cpdynview&tid=").GetReq('tid');
		$frame = "<html><head></head><iframe src =\"$bodyurl\" width=\"100%\" height=\"350px\"><p>Your browser does not support iframes</p></iframe></html>";    

		//$iframe = $this->form(GetReq('tid'));
		
		if ($ajaxdiv)
			return $ajaxdiv.'|'.$frame;//$out;	//'<p>'.$bodyurl.'</p>';
		else
			return ($frame);
	}
	
	function loadTransactionHtml($id) {
	
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
		
	
	function viewTransactionHtml($id=null) {
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