<?php
$__DPCSEC['RCUTASKSHOW_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("RCUTASKSHOW_DPC")) && (seclevel('RCUTASKSHOW_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCUTASKSHOW_DPC",true);

$__DPC['RCUTASKSHOW_DPC'] = 'rcutaskshow';

$a = GetGlobal('controller')->require_dpc('nitobi/nitobi.lib.php');
require_once($a);

//$b = GetGlobal('controller')->require_dpc('shop/shusers.dpc.php');
//require_once($b);

$e = GetGlobal('controller')->require_dpc('paypal/paybutton.lib.php');
require_once($e); 


$__EVENTS['RCUTASKSHOW_DPC'][0]='cputaskshow';
$__EVENTS['RCUTASKSHOW_DPC'][1]='cputaskgraph';
$__EVENTS['RCUTASKSHOW_DPC'][2]='cputaskpreview';
$__EVENTS['RCUTASKSHOW_DPC'][3]='cputaskhandle';
$__EVENTS['RCUTASKSHOW_DPC'][4]='cpuinsertcus';
$__EVENTS['RCUTASKSHOW_DPC'][5]='cputrfdownload';

$__ACTIONS['RCUTASKSHOW_DPC'][0]='cputaskshow';
$__ACTIONS['RCUTASKSHOW_DPC'][1]='cputaskgraph';
$__ACTIONS['RCUTASKSHOW_DPC'][2]='cputaskpreview';
$__ACTIONS['RCUTASKSHOW_DPC'][3]='cputaskhandle';
$__ACTIONS['RCUTASKSHOW_DPC'][4]='cpuinsertcus';
$__ACTIONS['RCUTASKSHOW_DPC'][5]='cputrfdownload';

$__DPCATTR['RCUTASKSHOW_DPC']['cputaskshow'] = 'cputaskshow,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCUTASKSHOW_DPC'][0]='RCUTASKSHOW_DPC;Tasks;Tasks';

$__LOCALE['RCUTASKSHOW_DPC'][15]='_DETAILS;Details;Σχολια';
$__LOCALE['RCUTASKSHOW_DPC'][16]='_LOADPROTO;Load prototype;Πρωτοτυπο';
$__LOCALE['RCUTASKSHOW_DPC'][17]='_TASKDATE;Date;Ημερομηνια';
$__LOCALE['RCUTASKSHOW_DPC'][18]='_TASKDATESTART;Start;Αρχη';
$__LOCALE['RCUTASKSHOW_DPC'][19]='_TASKDATEEND;End;Τελος';
$__LOCALE['RCUTASKSHOW_DPC'][20]='_TASKNAME;Name;Ονομα';
$__LOCALE['RCUTASKSHOW_DPC'][21]='_TASKTEXT;Text;Κειμενο';
$__LOCALE['RCUTASKSHOW_DPC'][22]='_TASKHTML;Html;Html';
$__LOCALE['RCUTASKSHOW_DPC'][23]='_TASKATTACH;Attach;Συνημμενα';
$__LOCALE['RCUTASKSHOW_DPC'][24]='_HASINVOICE;Has Invoice;Εχει παραστατικο';
$__LOCALE['RCUTASKSHOW_DPC'][25]='_REQREPLY;Has Reply;Εχει απαντηση';
$__LOCALE['RCUTASKSHOW_DPC'][26]='_HASAPP;Has Application;Έχει εφαρμογη';
$__LOCALE['RCUTASKSHOW_DPC'][27]='_APPNAME;Application Name;Ονομα εφαρμογης';
$__LOCALE['RCUTASKSHOW_DPC'][28]='_APPLIST;Application List;Λιστα εφαρμογων';
$__LOCALE['RCUTASKSHOW_DPC'][29]='_HASSCHEDULE;Has schedule?;Δημιουργει επανάληψη?';
$__LOCALE['RCUTASKSHOW_DPC'][30]='_SCHTYPE;Schedule Type;Τυπος χρονοπρογραμματισμου';
$__LOCALE['RCUTASKSHOW_DPC'][31]='_SCHTIMES;Schedule Times;Φορες εκτελεσης';
$__LOCALE['RCUTASKSHOW_DPC'][32]='_SCHCOUNT;Schedule Count;Μετρητης χρονοπρογραμματισμου';
$__LOCALE['RCUTASKSHOW_DPC'][33]='_HASINFORM;Has Inform;Εχει ενημερωση';
$__LOCALE['RCUTASKSHOW_DPC'][34]='_INFTYPE;Inform Type;Τυπος ενημερωσης';
$__LOCALE['RCUTASKSHOW_DPC'][35]='_INFTIMES;Inform Times;Ποσες φορες';
$__LOCALE['RCUTASKSHOW_DPC'][36]='_INFCOUNT;Inform Count;Μετρητης ενημερωσης';
$__LOCALE['RCUTASKSHOW_DPC'][37]='_HASSUBSCRIBERS;Has subscribers;Εχει παραληπτες';
$__LOCALE['RCUTASKSHOW_DPC'][38]='_SUBSCRIBERS;Subscribers;Παραληπτες';
$__LOCALE['RCUTASKSHOW_DPC'][39]='_NOMOS;Area;Περιοχη';
$__LOCALE['RCUTASKSHOW_DPC'][40]='_ISPROTO;Save as prototype;Αποθήκευση ως προτυπο';
$__LOCALE['RCUTASKSHOW_DPC'][41]='_PROTONAME;Prototype name;Ονομα πρωτοτυπου';
$__LOCALE['RCUTASKSHOW_DPC'][42]='_PROTOTYPE;Prototype type;Τυπος πρωτοτυπου';
$__LOCALE['RCUTASKSHOW_DPC'][43]='_TASKEXECUTE;Execute Now;Εκτελεση τωρα';
$__LOCALE['RCUTASKSHOW_DPC'][44]='_INVNAME;Invoice name;Ονομα παραστατικου';
$__LOCALE['RCUTASKSHOW_DPC'][45]='_INVLIST;Invoice list;Λιστα παραστατικων';
$__LOCALE['RCUTASKSHOW_DPC'][46]='_REQNAME;Reply name;Ονομα υπογραφης';
$__LOCALE['RCUTASKSHOW_DPC'][47]='_REQLIST;Reply list;Λιστα υπογραφων';
$__LOCALE['RCUTASKSHOW_DPC'][48]='_TASKPARAMS;Parameters;Παραμετροι';
$__LOCALE['RCUTASKSHOW_DPC'][49]='_TASKSAVE;Save Task;Αποθήκευση';
$__LOCALE['RCUTASKSHOW_DPC'][50]='_HASDBSUBS;Has internal subscribers;Εχει εσωτερικους παραληπτες';
$__LOCALE['RCUTASKSHOW_DPC'][51]='_TDATE;Insert Date;Καταχωρηση';
$__LOCALE['RCUTASKSHOW_DPC'][52]='_TSTATUS;Status;Κατασταση';
$__LOCALE['RCUTASKSHOW_DPC'][53]='_TACTIVE;Active;Ενεργο';
$__LOCALE['RCUTASKSHOW_DPC'][54]='_TINDEX;Customer ID;Πελατης';
$__LOCALE['RCUTASKSHOW_DPC'][55]='_TREPLY;Reply;Απαντησεις';
$__LOCALE['RCUTASKSHOW_DPC'][56]='_TCUSTDATA;Customer Data;Δεδομενα Πελάτης';
$__LOCALE['RCUTASKSHOW_DPC'][57]='_TPARAMS;Parameters;Παράμετροι';
$__LOCALE['RCUTASKSHOW_DPC'][58]='_TASKUSER;User;Χρηστης';
$__LOCALE['RCUTASKSHOW_DPC'][59]='_ISCRITICAL;Is Critical;Εχει κρισιμότητα';
$__LOCALE['RCUTASKSHOW_DPC'][60]='_CRITICALVAL;Critical Value;Αριθμος κρισιμότητας';
$__LOCALE['RCUTASKSHOW_DPC'][61]='_INVCOST;Cost;κοστος';
$__LOCALE['RCUTASKSHOW_DPC'][62]='_INVITEMS;Items;Στοιχεια';
$__LOCALE['RCUTASKSHOW_DPC'][63]='_INVITEMSQTY;Qty;Ποσοτητα';
$__LOCALE['RCUTASKSHOW_DPC'][64]='_REQTTL;Reply TTL;Τέλος απάντησης';
$__LOCALE['RCUTASKSHOW_DPC'][65]='_HASREMOTEFILES;Has Server Files;Έχει απομακρυσμενα αρχεια';
$__LOCALE['RCUTASKSHOW_DPC'][66]='_REMOTEFILES;Server Files;Απομακρυσμενα αρχεια';
$__LOCALE['RCUTASKSHOW_DPC'][67]='_TASKCRITICAL;Critical Actions;Επείγοντα';
$__LOCALE['RCUTASKSHOW_DPC'][68]='_NONAME;No name;Αγνωστο';
$__LOCALE['RCUTASKSHOW_DPC'][69]='_view;View;Προβολη';
$__LOCALE['RCUTASKSHOW_DPC'][70]='_invoice;Invoice;Παραστατικο';
$__LOCALE['RCUTASKSHOW_DPC'][71]='_app;Application;Εφαρμογη';
$__LOCALE['RCUTASKSHOW_DPC'][72]='_rf;Remote Files;Αρχεια';
$__LOCALE['RCUTASKSHOW_DPC'][73]='_TASKTOEND;Ending Actions;Ληξεις';
$__LOCALE['RCUTASKSHOW_DPC'][74]='_TASKTOCOME;Upcomming Actions;Προσεχείς';
$__LOCALE['RCUTASKSHOW_DPC'][75]='_RETURN;Return;Επιστροφή';
$__LOCALE['RCUTASKSHOW_DPC'][76]='_TIMEZONE;Timezone;Ζωνη ωρας';
$__LOCALE['RCUTASKSHOW_DPC'][77]='_INSTANTDNLOAD;Instant Download;Αμεση μεταφόρτωση';
$__LOCALE['RCUTASKSHOW_DPC'][78]='_HASUSETERMS;Has Terms of use;Εχει Όρους χρησης';
$__LOCALE['RCUTASKSHOW_DPC'][79]='_ISPUBLICDIR;Is public dir;Κοινόχρηστη περιοχη';
$__LOCALE['RCUTASKSHOW_DPC'][80]='_ISUSERDIR;Is user dir;Περιοχη χρήσητη';
$__LOCALE['RCUTASKSHOW_DPC'][81]='_MUSTPAY;Must be paid;Αμεση εντολη πληρωμης';
$__LOCALE['RCUTASKSHOW_DPC'][82]='_ISCARTPRODUCT;Is cart product;Ειδος καλαθιου';
$__LOCALE['RCUTASKSHOW_DPC'][83]='_GOTOPRIORITY;Action priority;Προτεραιότητα ενέργεις';
$__LOCALE['RCUTASKSHOW_DPC'][84]='_paynow;Proceed to payment;Διαδικασία πληρωμης';

class rcutaskshow {

    var $title;
	var $carr;
	var $msg;
	var $path;
	
    var $reset_db;
	var $_grids, $charts;
	var $ajaxLink;
	var $hasgraph;
    var $status_sid, $status_sidexp;	
	var $new_customer;
	var $paynow_button,$app_button,$view_button,$rf_button;

	function rcutaskshow() {
	
	  $this->title = localize('RCUTASKSHOW_DPC',getlocal());		
	  $this->reset_db = false;
	  
	  $this->_grids[] = new nitobi("Tasks");	
      //$this->_grids[] = new nitobi("Tpay");		
	  
	  $this->ajaxLink = seturl('t=cptransshow&statsid='); //for use with...	      
	  //sndReqArg('index.php?t=existapp&application=meme2','existapp'
	  
	  $this->hasgraph = false;	
	  
      //if ($GRX) {
          $this->view_button = loadTheme('ditem',localize('_view',getlocal()));
          $this->invoice_button = loadTheme('eitem',localize('_invoice',getlocal()));
          $this->app_button = loadTheme('aitem',localize('_app',getlocal()));
          $this->rf_button = loadTheme('mailitem',localize('_rf',getlocal()));
		  
          $this->paynow_button = loadTheme('paynow',localize('_paynow',getlocal()));		  

		  $this->sep = "&nbsp;";//loadTheme('lsep');
      //}	
	  $this->new_customer = false;	  
	}
	
    function event($event=null) {
	
	   //ALLOW EXPRIRED APPS
	   /////////////////////////////////////////////////////////////
	   if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	
	   /////////////////////////////////////////////////////////////		 
	
	   switch ($event) {
		 case 'cptaskgraph': if (!$cvid = GetParam('statsid')) $cvid=-1; 
		                      $this->charts = new swfcharts;	
		                      $this->hasgraph = $this->charts->create_chart_data('taskstats','where tid='.$cvid);
							  break; 
                 
                 case 'cputrfdownload':$this->download_remote_file();
                                      die();
                                      break;  
		 case 'cpuinsertcus':    $this->new_customer = $this->insert_customer(GetReq('tid'));
                                 echo $this->task_handler(GetReq('tid'),GetReq('step'));	
		                         die();		 
		                         break;					  	   
		 case 'cputaskpreview': echo $this->preview_task(GetReq('tid'),null,null,GetReq('reply'));
		                       die();
	     case 'cputaskhandle'  : echo $this->task_handler(GetReq('tid'),GetReq('step'));	
		                       die();
	     case 'cputaskshow'    :
		 default            : $this->nitobi_javascript();
			                  $this->sidewin(); 		 
		                      if ($this->reset_db) $this->reset_db();
		                      $this->charts = new swfcharts;	
		                      $this->hasgraph = $this->charts->create_chart_data('taskcat',"where attr1='".urldecode(GetReq('cat'))."'");
	   }
			
    }   
	
    function action($action=null) {
	 
	  if (GetSessionParam('REMOTELOGIN')) 
	    $out = setNavigator(seturl("t=cpremotepanel","Remote Panel"),$this->title); 	 
	  else  
        $out = setNavigator(seturl("t=cp","Control Panel"),$this->title);	 	 
	  
	  switch ($action) {
	  
		 case 'cptaskgraph': if ($this->hasgraph)
		                        $out = $this->show_graph('taskstats',400,200);
							  else
							    $out = "<h3>".localize('_GNAVAL',0)."</h3>";	
							  die('stats|'.$out); //ajax return
							  break; 
                 case 'cputrfdownload': break;
		 case 'cpuinsertcus':
		                         break;							  
         case 'cputaskpreview' : break;
			 
	     case 'cputaskhandle'  : break;//$out .= $this->task_handler(GetReq('tid'),GetReq('step'));			 
	     case 'cputaskshow'    :
		 default            : $out .= $this->show_tasks();
	  }	 

	  return ($out);
    }
	
	function nitobi_javascript() {
      if (iniload('JAVASCRIPT')) {

		   $template = $this->set_template();   		      
		   
	       $code = $this->init_grids();			
		   $code .= $this->_grids[0]->OnClick(52,'TaskDetails',$template);
	   
		   $js = new jscript;
		   $js->setloadparams("init()");
           $js->load_js('nitobi.grid.js');		   
           $js->load_js($code,"",1);			   
		   unset ($js);
	  }		
	}
	
	function set_template() {
	   		                                  //22,36
		   $template .= "'+show_actions(i0,i12,i24,i39)+'";
		   //$template .= "<h4>'+update_stats_id(i0,i1,i3)+'</h4>";	
		   $template .= "<table width=\"100%\" class=\"group_win_body\"><tr><td>";	   
		   $template .= localize('_ID',getlocal()).":<b>'+i0+'</b></br>";	
		   $template .= localize('_TDATE',getlocal()).":<b>'+i2+'</b></br>";		
		   $template .= localize('_TASKDATESTART',getlocal()).":<b>'+i3+'</b></br>";		   
		   $template .= localize('_TASKDATEEND',getlocal()).":<b>'+i6+'</b></br>";		
		   $template .= localize('_TASKUSER',getlocal()).":<b>'+i7+'</b></br>";		
		   $template .= localize('_TASKNAME',getlocal()).":<b>'+i8+'</b></br>";				   		   
		   $template .= localize('_TASKTEXT',getlocal()).":<b>'+i9+'</b></br>";	
		   $template .= localize('_TASKHTML',getlocal()).":<b>'+i10+'</b></br>";				   		   
		   $template .= localize('_TASKATTACH',getlocal()).":<b>'+i11+'</b></br>";
		   $template .= localize('_HASINVOICE',getlocal()).":<b>'+i12+'</b></br>";		
		   $template .= "</td><td>&nbsp;";	
		   $template .= "</td></tr></table>";
		   $template .= "<table width=\"100%\" class=\"group_win_body\"><tr><td>";
	           $template .= "'+show_body(i0,i9,i10)+'";	     
                   $template .= "</td></tr></table>";
		   
		   return ($template);	
	}
	
	function show_graph($xmlfile,$x,$y) {
	
	  $ret = $this->charts->show_chart($xmlfile,$x,$y);
	  return ($ret);
	}		
	
	function show_tasks() {
	
	   if ($this->msg) $out = $this->msg;
	   
	   $toprint .= $this->show_grids();	
	   
       $mywin = new window($this->title,$toprint);
       $out .= $mywin->render();	
	   
	   //HIDDEN FIELD TO HOLD STATS ID FOR AJAX HANDLE
	   $out .= "<INPUT TYPE= \"hidden\" ID= \"statsid\" VALUE=\"0\" >";	   	    
	  
	   return ($out);		   
	}		
	
	function reset_db() {
        $db = GetGlobal('db'); 
	}
	
	function init_grids() {
	    $bodyurl = seturl("t=cputaskpreview"."&tid=");
	    $printit = seturl("t=cputaskpreview&reply=1"."&tid=");
	    $hasinvoice = seturl("t=cputaskhandle&type=invoice"."&tid=");	
	    $hasapp = seturl("t=cputaskhandle&type=app"."&tid=");	
	    $hasremotefiles = seturl("t=cputaskhandle&type=files"."&tid=");			

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
  
  //return str1+' '+str2;
}

function show_actions() {
  var str = arguments[0];
  var inv = arguments[1];
  var app = arguments[2];
  var rf = arguments[3];  
  var invurl,appurl,rfurl;
  var taskid;
  
  taskid = str;  
  invurl = '';
  appurl = '';
  rfurl = '';
  
  prnurl = '<A href=\"$printit'+taskid+'\">$this->view_button</A>&nbsp;';  
  if (inv=='1') invurl = '<A href=\"$hasinvoice'+taskid+'\">$this->invoice_button</A>&nbsp;';  
  if (app=='1') appurl = '<A href=\"$hasapp'+taskid+'\">$this->app_button</A>&nbsp;';  
  if (rf=='1') rfurl = '<A href=\"$hasremotefiles'+taskid+'\">$this->rf_button</A>&nbsp;';      
  
  return prnurl+'&nbsp;'+invurl+'&nbsp;'+appurl+'&nbsp;'+rfurl;
}

function show_body() {
  var str = arguments[0];
  var str1 = arguments[1];
  var str2 = arguments[2];  
  var taskid;
  
  taskid = str;  
  bodyurl = '$bodyurl'+taskid;
  
  ifr = '<iframe src =\"'+bodyurl+'\" width=\"100%\" height=\"400px\"><p>Your browser does not support iframes ('+str2+').</p>'+str1+'</iframe>';  
  return ifr;
}

function task_shortcut() {
var tid = arguments[0];
var inv = arguments[1];
var app = arguments[2];
var trf = arguments[3];
var txt = arguments[4];
var htm = arguments[5];
var mydiv = document.getElementById('TaskDetails');

mydiv.innerHTML = ''+show_actions(tid,inv,app,trf)+'<table width=\"100%\" class=\"group_win_body\"><tr><td>'+show_body(tid,txt,htm)+'</td></tr></table>';
}
			
function init()
{
";
        foreach ($this->_grids as $n=>$g)
		  $out .= $g->init_grid($n);
	
        $out .= "\r\n}";
        return ($out);
	}
	
	function show_grid($handler=null,$x=null,$y=null,$filter=null,$bfilter=null) {
	   $x = $x?$x:400;
	   $y = $y?$y:100;	
	   $mode = GetReq('mode');
	   $myhandler = $handler?$handler:'uthandler.php';
	   $grid0_get = $myhandler . "?t=utgetutasks&mode=$mode&all=1";
	   $grid0_set = $myhandler . "?t=utsetutasks&mode=$mode";	   

	   $this->_grids[0]->set_text_column("id","tid","50","true");
	   $this->_grids[0]->set_text_column(localize('_TDATE',getlocal()),"tdate","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_TASKDATE',getlocal()),"taskdate","100","true");
	   $this->_grids[0]->set_text_column(localize('_TASKDATESTART',getlocal()),"taskstart","100","true");
	   $this->_grids[0]->set_text_column(localize('_ISCRITICAL',getlocal()),"iscritical","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_CRITICALVAL',getlocal()),"criticalval","100","true");	
	   $this->_grids[0]->set_text_column(localize('_TASKDATEEND',getlocal()),"taskend","100","true");
	   $this->_grids[0]->set_text_column(localize('_TASKUSER',getlocal()),"taskuser","200","true");		   
	   $this->_grids[0]->set_text_column(localize('_TASKNAME',getlocal()),"taskname","200","true");
	   $this->_grids[0]->set_text_column(localize('_TASKTEXT',getlocal()),"tasktext","200","true");	   
	   $this->_grids[0]->set_text_column(localize('_TASKHTML',getlocal()),"taskhtml","100","true");
	   $this->_grids[0]->set_text_column(localize('_TASKATTACH',getlocal()),"taskattach","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_HASINVOICE',getlocal()),"hasinvoice","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_INVCOST',getlocal()),"invcost","100","true");
	   $this->_grids[0]->set_text_column(localize('_INVITEMS',getlocal()),"invitems","100","true");
	   $this->_grids[0]->set_text_column(localize('_INVITEMSQTY',getlocal()),"invitemsqty","100","true");
	   $this->_grids[0]->set_text_column(localize('_INVNAME',getlocal()),"invname","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_INVLIST',getlocal()),"invlist","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_MUSTPAY',getlocal()),"mustpay","100","true","CHECKBOX","yesno","display","value",'1','0');	
	   $this->_grids[0]->set_text_column(localize('_ISCARTPRODUCT',getlocal()),"iscartproduct","100","true","CHECKBOX","yesno","display","value",'1','0');			   
	   $this->_grids[0]->set_text_column(localize('_REQREPLY',getlocal()),"reqreply","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_REQTTL',getlocal()),"reqttl","100","true");
	   $this->_grids[0]->set_text_column(localize('_REQNAME',getlocal()),"reqname","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_REQLIST',getlocal()),"reqlist","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_HASAPP',getlocal()),"hasapp","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_APPNAME',getlocal()),"appname","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_APPLIST',getlocal()),"applist","100","true");	   	   
	   $this->_grids[0]->set_text_column(localize('_GOTOPRIORITY',getlocal()),"invlist","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_HASSCHEDULE',getlocal()),"hasschedule","100","true","CHECKBOX","yesno","display","value",'1','0');	   
	   $this->_grids[0]->set_text_column(localize('_SCHTYPE',getlocal()),"schtype","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_SCHTIMES',getlocal()),"schtimes","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_SCHCOUNT',getlocal()),"schcount","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_HASINFORM',getlocal()),"hasinform","100","true","CHECKBOX","yesno","display","value",'1','0');	
	   $this->_grids[0]->set_text_column(localize('_INFTYPE',getlocal()),"inftype","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_INFTIMES',getlocal()),"inftimes","100","true");	   
	   $this->_grids[0]->set_text_column(localize('_INFCOUNT',getlocal()),"infcount","100","true");	  	      	   
	   $this->_grids[0]->set_text_column(localize('_HASSUBSCRIBERS',getlocal()),"hassubscribers","100","true","CHECKBOX","yesno","display","value",'1','0');	   
	   $this->_grids[0]->set_text_column(localize('_SUBSCRIBERS',getlocal()),"subscribers","200","true");	
	   $this->_grids[0]->set_text_column(localize('_HASDBSUBS',getlocal()),"hasdbsubs","100","true","CHECKBOX","yesno","display","value",'1','0');	
	   $this->_grids[0]->set_text_column(localize('_HASREMOTEFILES',getlocal()),"hasremotefiles","100","true","CHECKBOX","yesno","display","value",'1','0');	   
	   $this->_grids[0]->set_text_column(localize('_REMOTEFILES',getlocal()),"remotefiles","200","true");	
	   $this->_grids[0]->set_text_column(localize('_NOMOS',getlocal()),"nomos","100","true");		      
	   $this->_grids[0]->set_text_column(localize('_INSTANTDNLOAD',getlocal()),"instantdnload","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_ISPUBLICDIR',getlocal()),"ispublicdir","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_ISUSERDIR',getlocal()),"isuserdir","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_HASUSETERMS',getlocal()),"hasuseterms","100","true","CHECKBOX","yesno","display","value",'1','0');	   	   	   	   	   
	   $this->_grids[0]->set_text_column(localize('_TACTIVE',getlocal()),"tactive","100","true","CHECKBOX","yesno","display","value",'1','0');		   
	   $this->_grids[0]->set_text_column(localize('_TSTATUS',getlocal()),"tstatus","100","true");
	   $this->_grids[0]->set_text_column(localize('_TREPLY',getlocal()),"treply","100","true");	   	   
	   $this->_grids[0]->set_text_column(localize('_TINDEX',getlocal()),"tindex","70","true");	     
	   $this->_grids[0]->set_text_column(localize('_TCUSTDATA',getlocal()),"tcustdata","200","true");
	   $this->_grids[0]->set_text_column(localize('_TPARAMS',getlocal()),"tparams","200","true");	   	    
	   $this->_grids[0]->set_text_column(localize('_TIMEZONE',getlocal()),"tmz","200","true");	   
	   
	   $this->_grids[0]->set_datasource("check_active",array('ACTIVE'=>'Active','0'=>'Inactive'),null,"value|display",true);
	   $this->_grids[0]->set_datasource("yesno",array('1'=>'Yes','0'=>'No'),null,"value|display",true);


	   
       $ret = $this->_grids[0]->set_grid_remote($grid0_get,$grid0_set,"$x","$y","livescrolling");
	  	   

	   return ($ret);
	}		
	
	function show_grids($handler=null) {
	   //gets
	   $cat = GetReq('cat');	
       $filter= GetParam('filter');
	   
	   //grid 0 
	   $datattr[] = $this->show_grid($handler,800,440,null,$filter) . 
	                $this->searchinbrowser() . 
					$this->show_view_modes() . 
					$this->show_tasks_details();					  
	   $viewattr[] = "left;50%";						
	   
	   $wd .= $this->_grids[0]->set_detail_div("TaskDetails",440,580,'F0F0FF',$message);
	   //NOT DPC WORK!!!!
	   //$wd .= GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use stats");
	   $datattr[] = $wd;
	   $viewattr[] = "left;50%";
	   
	   $myw = new window('',$datattr,$viewattr);
	   $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
	   unset ($datattr);
	   unset ($viewattr);		   	
	   	
	   return ($ret);	
	}	
	
	function sidewin() { 
	}

    function searchinbrowser() {
            $ret = "
           <form name=\"searchinbrowser\" method=\"post\" action=\"\">
           <input name=\"filter\" type=\"Text\" value=\"\" size=\"56\" maxlength=\"64\">
           <input name=\"Image\" type=\"Image\" src=\"../images/b_go.gif\" alt=\"\"    align=\"absmiddle\" width=\"22\" height=\"28\" hspace=\"10\" border=\"0\">
           </form>";

          $ret .= "<br>Last search: " . GetParam('filter');

          return ($ret);
    }
	
	function show_view_modes() {
	   $a = "Views:&nbsp;";	
	   $a .= seturl('t=cputaskshow','Default');
	   $a .= "&nbsp;|&nbsp;";
	   $a .= seturl('t=cputaskshow&mode=startup','Today to StartTask');	   
	   $a .= "&nbsp;|&nbsp;";	   
	   $a .= seturl('t=cputaskshow&mode=startdown','StartTask to Today');	   
	   $a .= "&nbsp;|&nbsp;";	
	   $a .= seturl('t=cputaskshow&mode=endup','Today to EndTask');	   
	   $a .= "&nbsp;|&nbsp;";	      
	   $a .= seturl('t=cputaskshow&mode=enddown','EndTask to Today');		
	   
	   return ($a);   
	}
	
	function show_tasks_details() {
	
	   $datattr[] =  $this->show_critical_user_tasks();
	   $viewattr[] = "left;33%";	   
	   $datattr[] = $this->show_ending_user_tasks(7);
	   $viewattr[] = "left;33%";
	   $datattr[] = $this->show_comming_user_tasks(7);
	   $viewattr[] = "left;34%";	   
	   
	   $myw = new window('',$datattr,$viewattr);
	   $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
	   unset ($myw);	   
	   unset ($datattr);
	   unset ($viewattr);		   		   	   
	
	   return ($ret);
	}
	
	//all user criticla task
	function show_critical_user_tasks($user=null) {
         $db = GetGlobal('db');  	
         $date_now = date('Y-m-d H:i:s');
		   
	
         //select active tasks	   
         $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
         $sSQL.= "invname,invlist,mustpay,iscartproduct,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,gotopriority,hasschedule,schtype,schtimes,schcount,";
         $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,instantdnload,ispublicdir,isuserdir,hasuseterms,tactive,tstatus,treply,";
         $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";
         $sSQL.= " where iscritical=1 and tactive=1 and taskstart<='". $date_now."' ORDER BY criticalval DESC";;
		 if ($user)
		   $sSQL .= " and user='$user'";		 
		   
         //echo $sSQL;	   
         $result = $db->Execute($sSQL,2);
		 $turl = null;
		 
         if (!empty($result->fields)) {
           $i=0;
           foreach ($result as $n=>$rec) {
		     $tid = $rec['tid']; 
		     $txt = '';//$rec['tasktext'];
		     $htm = '';//$rec['taskhtml'];
		     $inv = $rec['hasinvoice'];
		     $app = $rec['hasapp'];
		     $trf = $rec['hasremotefiles'];
             $title = $rec['taskname']?$rec['taskname']:localize('_NONAME',getlocal());
			 $turl .= "<li><A href=\"#\" onClick=\"task_shortcut($tid,$inv,$app,$trf,'$txt','$htm')\">" . $title . "</A></li>"; 	 			 		 	 	
             $i+=1;	   
           }    	
         }

         //$ret = "[$i] Critical Tasks!";
  	     $myw = new window(localize('_TASKCRITICAL',getlocal()),$turl);
	     $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
         unset($myw);
         return ($ret);	  	 
	}	
	
	//ending tasks
	function show_ending_user_tasks($daysbefore=null) {
         $db = GetGlobal('db');  	
		 
		 $dbef = $daysbefore?$daysbefore:15; //2 weeks
		 
	     $date2create = time() - ($dbef * 24 * 60 * 60);
	     $date_from = date('Y-m-d H:i:s',$date2create); 
		 //echo '<br>',$date_from,'<br>';
		 //$date_from = date('Y-m-d H:i:s');//.....		 
         $date_now = date('Y-m-d H:i:s');
	
         //select active tasks	   
         $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
         $sSQL.= "invname,invlist,mustpay,iscartproduct,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,gotopriority,hasschedule,schtype,schtimes,schcount,";
         $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,instantdnload,ispublicdir,isuserdir,hasuseterms,tactive,tstatus,treply,";
         $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";
         $sSQL.= "where tactive=1 and ((taskend>='".$date_from."' and taskend<='". $date_now."') or taskend=null or taskend='0000-00-00')";
         //echo $sSQL;	   
         $result = $db->Execute($sSQL,2);
		 $turl = null;
		 		 
         if (!empty($result->fields)) {
           $i=0;
           foreach ($result as $n=>$rec) {
		     $tid = $rec['tid']; 
		     $txt = '';//$rec['tasktext'];
		     $htm = '';//$rec['taskhtml'];
		     $inv = $rec['hasinvoice'];
		     $app = $rec['hasapp'];
		     $trf = $rec['hasremotefiles'];
             $title = $rec['taskname']?$rec['taskname']:localize('_NONAME',getlocal());
			 $turl .= "<li><A href=\"#\" onClick=\"task_shortcut($tid,$inv,$app,$trf,'$txt','$htm')\">" . $title . "</A></li>"; 				 
             $i+=1;	   
           }    	
         }
         //echo $i,$turl;
         //$ret = "[$i] Critical Tasks!";
  	     $myw = new window(localize('_TASKTOEND',getlocal()),$turl);
	     $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
         unset($myw);
         return ($ret);	 
	}	
	
	//comming tasks
	function show_comming_user_tasks($daysafter=null) {
         $db = GetGlobal('db');  	
		 
		 $dbef = $daysafter?$daysafter:15; //2 weeks
		 
	     $date2create = time() + ($dbef * 24 * 60 * 60);
	     $date_to = date('Y-m-d H:i:s',$date2create); 
		 //echo '<br>',$date_from,'<br>';
		 //$date_from = date('Y-m-d H:i:s');//.....		 
         $date_now = date('Y-m-d H:i:s');
	
         //select active tasks	   
         $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
         $sSQL.= "invname,invlist,mustpay,iscartproduct,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,gotopriority,hasschedule,schtype,schtimes,schcount,";
         $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,instantdnload,ispublicdir,isuserdir,hasuseterms,tactive,tstatus,treply,";
         $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";
         $sSQL.= "where tactive=1 and ((taskend>='".$date_now."' and taskend<='". $date_to."') or taskend=null or taskend='0000-00-00')";
         //echo $sSQL;	   
         $result = $db->Execute($sSQL,2);
		 $turl = null;
		 		 
         if (!empty($result->fields)) {
           $i=0;
           foreach ($result as $n=>$rec) {
		     $tid = $rec['tid']; 
		     $txt = '';//$rec['tasktext'];
		     $htm = '';//$rec['taskhtml'];
		     $inv = $rec['hasinvoice'];
		     $app = $rec['hasapp'];
		     $trf = $rec['hasremotefiles'];
             $title = $rec['taskname']?$rec['taskname']:localize('_NONAME',getlocal());
			 $turl .= "<li><A href=\"#\" onClick=\"task_shortcut($tid,$inv,$app,$trf,'$txt','$htm')\">" . $title . "</A></li>";  				 
             $i+=1;	   
           }    	
         }
         //echo $i,$turl;
         //$ret = "[$i] Critical Tasks!";
  	     $myw = new window(localize('_TASKTOCOME',getlocal()),$turl);
	     $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
         unset($myw);
         return ($ret);	 
	}

	function get_task_pay_amount($task) {
         $db = GetGlobal('db');   
         $costs = 0;
         $qtys = 1;     

         $sSQL = "select hasinvoice,invcost,invitems,invitemsqty ";
         $sSQL.= "from utasks ";
         $sSQL.= "where tid=".$task;

         $result = $db->Execute($sSQL,2);

	     if ($ic = $result->fields['invcost']) {		
	       if (stristr($ic,';'))
	         $costs = explode(';',$ic);
	       else
	         $costs = $ic; //one value	
	     }
	     if ($iq = $result->fields['invitemsqty']) {		
	       if (stristr($iq,';'))
	         $qtys = explode(';',$iq);
	       else
	         $qtys = $iq; //one value	
	     } 
 
         if (is_array($costs)) { //mutiple items
            foreach ($costs as $i=>$costs) {
              $ret+=($cost*$qtys[$i]);
            }   
         }
         else
           $ret = ($costs * $qtys);  //1 item        
        
         return ($ret);	
	}

	function get_task_pay_title($task) {
         $db = GetGlobal('db');   
         $items = 'item';
         $qtys = 1;     

         $sSQL = "select hasinvoice,invcost,invitems,invitemsqty ";
         $sSQL.= "from utasks ";
         $sSQL.= "where tid=".$task;

         $result = $db->Execute($sSQL,2);

	     if ($ic = $result->fields['invitems']) {		
	       if (stristr($ic,';'))
	         $items = explode(';',$ic);
	       else
	         $items = $ic; //one value	
	     }
	     if ($iq = $result->fields['invitemsqty']) {		
	       if (stristr($iq,';'))
	         $qtys = explode(';',$iq);
	       else
	         $qtys = $iq; //one value	
	     } 
 
         if (is_array($items)) { //mutiple items
            foreach ($items as $i=>$item) {
              $a[]= $item . ' x ' . $qtys[$i];
            }   
            $ret = implode(',',$a);
         }
         else
           $ret = $items .' x '. $qtys;  //1 item        
        
         return ($ret);	
	} 
	
	function get_task_pay_qty($task) {
         $db = GetGlobal('db');   
         $costs = 0;
         $qtys = 1;     

         $sSQL = "select hasinvoice,invcost,invitems,invitemsqty ";
         $sSQL.= "from utasks ";
         $sSQL.= "where tid=".$task;

         $result = $db->Execute($sSQL,2);
		 
		 if ($ret = $result->fields['invitemsqty'])
		   return $ret;
		 else
		   return 1;//default   	
		 
	}	 	  			

	function deactivate_task($task,$bypass=null) {
        $db = GetGlobal('db');       
		
		if (!$this->has_extras($task)||$bypass) {

          $sSQL = "update utasks set tactive=0 where tid=".$task; 
          $r = $db->Execute($sSQL,1); 
		  return true;
		}
        
        return (false);	
	}
	
	function set_task_status($task,$status=null) {
        $db = GetGlobal('db');       

		$status?$status:0;
        $sSQL = "update utasks set tstatus=$status where tid=".$task; 
        $r = $db->Execute($sSQL,1); 
     	
	}
	
	function get_task_status($task) {
        $db = GetGlobal('db');       

        $sSQL = "select tstatus from utasks where tid=".$task; 
        $r = $db->Execute($sSQL,2); 
        
        return ($r->fields['tstatus']);	
	}			
	
    function set_task_reply($task,$reply=null) {
        $db = GetGlobal('db');       

		$reply?$reply:0;
        $sSQL = "update utasks set treply=$reply where tid=".$task; 
        $r = $db->Execute($sSQL,1); 
        
        return ($reply);
    }
	
    function get_task_reply($task) {
        $db = GetGlobal('db');       

        $sSQL = "select treply from utasks where tid=".$task; 
        $r = $db->Execute($sSQL,2); 
        
        return ($r->fields['treply']);
    }	
	
	function get_customer_details($task) {
        $db = GetGlobal('db');       

        $sSQL = "select tcustdata from utasks where tid=".$task; 
        $r = $db->Execute($sSQL,2); 
		
		$ret = explode(';',$r->fields['tcustdata']);
        
        return ($ret);	
	}		
	
  //copied from rcutasks	
  function create_reply_button($taskid=null,$name=null,$url=null,$page=null,$cmd=null) {

    $name = $name?$name:'reply';
    $page = $page?$page:'controlpanel.php';
    $cmd = $cmd?$cmd:'';

    $urls = arrayload('SHELL','ip');
    $myurl = $urls[0];
    $url = $url?$url:$myurl;
    
    //$key = $this->create_key_tologin();    
    
    //$link = 'http://' . $url . '/' . $page . '?' . $cmd . '&taskid=' . $taskid . '&key=' . $key;
	$link = $page . '?' . $cmd . '&tid=' . $taskid;
    //echo $link,'<br>';

    //$button = "<input name=\"Submit\" type=\"submit\" onClick=\"MM_goToURL('parent','controlpanel.php?t=dologout');return document.MM_returnValue\" value=\"$name\">";
    $button = "<h2><a href=\"$link\">$name</a></h2>";
    
    return ($button);
  }	

  function create_task_body($template,$text) {  
  
	$mypathtemplate = paramload('SHELL','urlpath').'/cp/html/' . $template;
        if (is_readable($mypathtemplate)) {
	  $htmlp = explode('.',$template); 
	  $pname = $htmlp[0];
	  $pp = strtoupper($pname);
	  $repltext = "<?".$pp."?>";	
          $out = str_replace($repltext,$text,file_get_contents($mypathtemplate));		
        }
        else
          $out = "Missing file!";
	//echo $out;
    
    return ($out);	
  }

    function preview_task($task,$text=null,$html=null,$show_reply=null) {
        $db = GetGlobal('db');
        
        if ($text) {
          
          if ($html) 
            $ret = $this->create_task_body($html,$text);
          else
            $ret = $text;
        }
        else {
          $sSQL = "select tasktext,taskhtml,taskattach,reqreply,reqname from utasks where tid=".$task;
          $result = $db->Execute($sSQL,2);
          if ($myhtml=$result->fields['taskhtml']) {
		  
             if (($reply=$result->fields['reqreply']) && ($show_reply)) {
               $b = '<br><br>';
               $b .= $this->create_reply_button($task,$result->fields['reqname'],null,'cputaskshow.php','t=cputaskshow');
            }		  
            $ret = $this->create_task_body($myhtml,$result->fields['tasktext'].$b);
		  }	
          else
            $ret = $result->fields['tasktext'];
        }	


        return ($ret);
    }	
	
  function date2mysql($date) {
     //echo $date;   
     if (empty($date)) return '';
  
     $a = explode(' ',$date);
     $d = $a[0];
     $t = $a[1];
     
     $dp = explode('-',$d);
     $nd = $dp[2].'-'.sprintf('%02d',$dp[1]).'-'.$dp[0].' '.$t;
     //echo $nd,'<br>';
     return ($nd);
  }	
	
	function has_extras($task) {
        $db = GetGlobal('db');	
	
        $sSQL = "select hasinvoice,hasapp,hasremotefiles from utasks where tid=".$task;
        $result = $db->Execute($sSQL,2);
		
		//1 is for preview task = return as status
		
        if ($hasinv = $result->fields['hasinvoice']) 
          return (2);
        elseif ($hasapp = $result->fields['hasapp']) 
          return (3);		  
        elseif ($hasrf = $result->fields['hasremotefiles']) 
          return (4);		  
        else
          return (false);	  
	}	
	
	//check if main purpose of task commited
	function main_purpose_commited($task) {
        $db = GetGlobal('db');	
	
        $sSQL = "select hasinvoice,hasapp,hasremotefiles,gotopriority,tstatus,mustpay from utasks where tid=".$task;
        $result = $db->Execute($sSQL,2);	
		
		$priority = $result->fields['gotopriority'];
		$current_status = $result->fields['tstatus'];		
		$must_pay = $result->fields['mustpay'];		
		
		if ($priority==2) {//to pay invoice
		  if (($must_pay) && ($current_status>20)) //invoice payment		
		    $ret = true;
		  elseif (($must_pay==0) && ($current_status>=$priority)) 
		    $ret = true;		  
		  else
		    $ret = false;	
		}
		else { //all others
		  if ($current_status>=$priority)
		    $ret = true;
		  else
		    $ret = false;	
		}
		
        return ($ret);		
	}		
	
	function task_handler($task,$step=0) {
	   $type= GetReq('type');	
	  
	   switch ($type) {
	     case 'invoice' : $ret = $this->invoice_viewer($task);
		                  break;
	     case 'app' :     $ret = $this->application_viewer($task);
		                  break;
	     case 'files' :   $ret = $this->remote_file_viewer($task);
		                  break;	
						  
		 default : //nothing				  					  						  
	   }
	   
	   return ($ret);
	}	
	
	function remote_file_viewer($task) {
          $db = GetGlobal('db');	
	
          $sSQL = "select remotefiles,tasktext,taskhtml,taskattach,instantdnload,hasuseterms,ispublicdir,isuserdir,taskuser from utasks where tid=".$task;
          $result = $db->Execute($sSQL,2);	
	      $files = $result->fields['remotefiles'];
          $myhtml=$result->fields['taskhtml'];
		  $taskuser = $result->fields['taskuser'];		  

          $out = $result->fields['tasktext']."<br><br>"; 

		  //no need to console  
          $instant = 0;//$result->fields['instantdnload'];
          $hasterms = 0; //$result->fields['hasuseterms'];
	      $ispublicdir = $result->fields['ispublicdir'];
	      $isuserdir = $result->fields['isuserdir'];//user of task		  
		  $userpath = $isuserdir?$taskuser:null;
	
          $dnloader = new stdownload($ispublicdir,$userpath);
          //echo $files;
          if ($files) {
              if (stristr($files,';')) { //many files
                //print_r($files);
		        $rf = explode(';',$files);
		
		        foreach ($rf as $id=>$name) {
		           //show links
                   $out .= $dnloader->show_remote_file_link($name,'cputrfdownload');
                   //$dnloader->send_thanks_mail($name);
                   $out .= "<br>";  
                }
	          }
              else {//one file..download one click...
                if ($instant) {
	          $ret = $dnloader->instant_download($files);
                  return ($ret);
                }
                else 
                  $out .= $dnloader->show_remote_file_link($name,'cputrfdownload');
              }
           }
           else 
              $out .= "There is not remote files!";
         
	   $out .= seturl('t=cputaskshow&tid='.GetReq('tid'),localize('_RETURN',getlocal()));	
           //template
           if ($myhtml) 
              $ret = $this->create_task_body($myhtml,$out);  
           else
              $ret = $out;	

	   unset($dnloader);
	   return ($ret);
	}	
	
	function application_viewer($task,$return_expire=null,$cmdback=null) {
        $db = GetGlobal('db');	
		$date_now = date('Y-m-d H:i:s');
	    $centraldbpath = paramload('SHELL','dbgpath');
        $cmd = $cmdback?$cmdback:'t=cputaskshow&tid='.GetReq('tid');				
	
        $sSQL = "select appname,applist,tasktext,taskhtml,taskattach from utasks where tid=".$task;
        $result = $db->Execute($sSQL,2);	
		
        $standart_html = $result->fields['taskhtml'];
		$apptype = $result->fields['appname'];//type of app shop,erp...
		if (is_readable($mypathtemplate.$apptype.'.htm'))
		  $myhtml = $apptype.'.htm';
		elseif (is_readable($mypathtemplate.$apptype.'.html'))
		  $myhtml = $apptype.'.html';   
		else
		  $myhtml = $standart_html;  
		  
		$applist = $result->fields['applist'];//name of app
		$myapp = $applist;
		
		if ($myapp) {
		
		//find application when expire
	    $cdb = new sqlite($centraldbpath."softhost.db");		 
		$appdb = $cdb->dbp;
		
		$sSQL = "select id,appname,timezone,expire from applications "; 
		$sSQL .= " where appname='". $myapp . "'"; 
		  		
		  
		//echo $sSQL;
	    $resultset = $appdb->Execute($sSQL,2);  			 
	    $res = $appdb->fetch_array_all($resultset);			
		
		if ($return_expire) {
		  $today = date('d-m-Y H:i:s');		
		  $expiration = convert_date($res[0]['expire'],'-DMY'); //-YMD in mysql		
		  $result = date_diff($today,$expiration);
		  return ($result);	
		}

		//echo $date_now,'-----',$res[0]['expire'];
		//print_r($res);
		$today = date('d-m-Y H:i:s');
		$expiration = convert_date($res[0]['expire'],'-DMY'); //-YMD in mysql	
		//echo "<br>",$expiration,'--',$today;	
		$result = date_diff($today,$expiration);		
		//echo "<br>",$result;
		
		//---------- procced to renew
		$out = $result . " day(s) left!";
                $out .= "<br>";
                $out .= "<h3>" . $this->pay_now_link($task) . "</h3>";  
        }
		else
		  $out = "No application found!";

	$out .= "<br><br>" . seturl($cmd,localize('_RETURN',getlocal()));

        //template
        if ($myhtml) { 
          $ret = $this->create_task_body($myhtml,$out);
		}  
        else
          $ret = $out;	
		  
		return ($ret);  
	}	
	
	function invoice_viewer($task) {	
        $db = GetGlobal('db');	
	    $sFormErr = GetGlobal('sFormErr');			
		$date_now = date('Y-m-d H:i:s');
	    $back_link =  seturl('t=cputaskshow&tid='.GetReq('tid'),localize('_RETURN',getlocal()));								
			
		$expdays = $this->application_viewer($task,1); 		
	
        $sSQL = "select invcost,invitems,invitemsqty,invname,invlist,tcustdata,tindex,tasktext,taskhtml,taskattach,tstatus from utasks where tid=".$task;
        $result = $db->Execute($sSQL,2);	
				
		$usercode = $result->fields['tindex']; 	
		
		//--------------- invoice template over standart html
		$iname = $result->fields['invname']?$result->fields['invname']:'INVOICE'; 		
		$ilist = $result->fields['invlist']; 	
		
		//extra template
		$inv_template = $ilist;		
		//invoice details
		$paid = $this->invoice_paid_status($result->fields['tstatus']);		
		$paid_title = $paid?"PAID":"NOT PAID";
		$i_details = "<h4><br><br>Downloadable<br><br>$paid_title<br></h4>";
		
		//invoice header
		$invoice_text = "<h3>".$iname.str_repeat("&nbsp;",(50-strlen($iname))).
		                "No:".$task.str_repeat("&nbsp;",5).
						"Date:".$date_now."</h3><hr>";
		
		//--------------- customer
		$cdata = $result->fields['tcustdata'];
		//echo $cdata,'>';
		if (($sFormErr=="Ok")||(strlen($cdata)>11)||$paid) {//ok||;;;;;;;;
		  $customer = GetGlobal('controller')->calldpc_method('shcustomers.showcustomerdata use '.$usercode.'+code2');
		  $c_text .= $customer . "<br><br>";
		  
          $datattr[] =  $c_text;
          $viewattr[] = "left;70%";	
          $datattr[] =  $i_details;
          $viewattr[] = "left;30%";
	      $myw = new window('',$datattr,$viewattr);
	      $invoice_text .= $myw->render("center::100%::0::group_article_selected::left::3::3::");
		  unset ($myw);
	      unset ($datattr);
	      unset ($viewattr);			  
		}
		else { 
          //$invoice_text = "<br>Customer data missing!<br>";		
		  //$invoice_text .= $sFormErr;
		  $goto = 't=cpuinsertcus&type='.GetReq('type')."&tid=".GetReq('tid');
          $invoice_text .= "<br>Customer data missing! Please update informations now!<br>";					
          $invoice_text .= GetGlobal('controller')->calldpc_method('shcustomers.makeform use '.$tcustdata.'+1+cpuinsertcus++'.$goto);			  			
	    }
		
		$invoice_text .= "<hr>";						
        
				
		//--------------- lines
		if ($ic = $result->fields['invcost']) {		
		  if (stristr($ic,';'))
		    $costs = explode(';',$ic);
		  else
		    $costs = $ic; //one value	
		}

		if ($it = $result->fields['invitems']) {		
		  if (stristr($it,';'))
		    $items = explode(';',$it);
		  else
		    $items = $it; //one value	
		}		

		if ($iq = $result->fields['invitemsqty']) {		
		  if (stristr($iq,';'))
		    $qtys = explode(';',$iq);
		  else
		    $qtys = $iq; //one value	
		}		
		
		//header
	    $datattr[] =  "ID";
	    $viewattr[] = "left;5%";	   
	    $datattr[] = "ITEM";
	    $viewattr[] = "left;50%";
	    $datattr[] = "QTY";
	    $viewattr[] = "left;5%";	   
	    $datattr[] = "COST";
	    $viewattr[] = "left;20%";			
	    $datattr[] = "SUBTOTAL";
	    $viewattr[] = "left;20%";			
	   
	    $myw = new window('',$datattr,$viewattr);
	    $invoice_text .= $myw->render("center::100%::0::group_article_selected::left::3::3::");
		unset ($myw);
	    unset ($datattr);
	    unset ($viewattr);	
		
		$total = 0;						
		
		//data
		if (is_array($items)) {
		  foreach ($items as $id=>$item) {
		  
            $q = is_array($qtys[$id])?($qtys[$id]?$qtys[$id]:"0"):($qtys?$qtys:"0");
			$c = is_array($costs[$id])?($costs[$id]?$costs[$id]:"0"):($costs?$costs:"0");
			$s = ($q*$c);
		  
	        $datattr[] =  $id;
	        $viewattr[] = "left;5%";	   
	        $datattr[] = $items?$items:"&nbsp;";
	        $viewattr[] = "left;50%";
	        $datattr[] = $q;
	        $viewattr[] = "left;5%";	   
	        $datattr[] = $c;
	        $viewattr[] = "left;20%";
	        $datattr[] = $s;
	        $viewattr[] = "left;20%";							
	   
	        $myw = new window('',$datattr,$viewattr);
	        $lines .= $myw->render("center::100%::0::group_article_selected::left::3::3::");
			unset ($myw);
	        unset ($datattr);
	        unset ($viewattr);	
			
			$total += $s;			           
		  }
		  $invoice_text .= $lines;
		}
		else {//one item	
	      $datattr[] =  "1";
	      $viewattr[] = "left;5%";	   
	      $datattr[] = $items?$items:"&nbsp;";
	      $viewattr[] = "left;50%";
	      $datattr[] = $qtys?$qtys:"0";
	      $viewattr[] = "left;5%";	   
	      $datattr[] = $costs?$costs:"0";
	      $viewattr[] = "left;20%";
		  $s = ($qtys*$costs);
	      $datattr[] = $s;
	      $viewattr[] = "left;20%";			  	
		  		
	      $myw = new window('',$datattr,$viewattr);
	      $one_line = $myw->render("center::100%::0::group_article_selected::left::3::3::");
		  unset ($myw);
	      unset ($datattr);
	      unset ($viewattr);	
		  $invoice_text .= $one_line;	
		  
		  $total += $s;	  			
		}
		//------------- synola 
        $invoice_text .= str_repeat("<br>",5)."<hr>";		
	    $datattr[] =  "&nbsp;";
	    $viewattr[] = "left;5%";	   
	    $datattr[] = $back_link;//"&nbsp;";
	    $viewattr[] = "left;50%";
	    $datattr[] = "&nbsp;";
	    $viewattr[] = "left;5%";	
		if ($paid==false) //pay link
		  $pay = ($expdays!=null)?"<h3>".$this->pay_now_link($task)."</h3>":"&nbsp;";   
	    $datattr[] = $pay;
	    $viewattr[] = "left;20%";
	    $datattr[] = "<h3>TOTAL:".str_repeat("&nbsp;",2).$total."&nbsp;&euro;</h3>";
	    $viewattr[] = "left;20%";			  	
		  		
	    $myw = new window('',$datattr,$viewattr);
	    $footer = $myw->render("center::100%::0::group_article_selected::left::3::3::");
		unset ($myw);
	    unset ($datattr);
	    unset ($viewattr);	
		$invoice_text .= $footer;					
		
		
        //template
        if ($myhtml=$result->fields['taskhtml']) { 
		  $template = $inv_template?$inv_template:$myhtml;
          $ret = $this->create_task_body($template,$invoice_text);
		}  
        else
          $ret = $invoice_text;		
		
		return ($ret);	   	   
	}
	
	
	function insert_customer($task) {
        $db = GetGlobal('db');	
	    $ok = GetGlobal('controller')->calldpc_method('shcustomers.checkFields');			  			
	
		if (!$ok) {
			//get tindex
            $sSQL = "select tindex from utasks where tid=".$task;
            $result = $db->Execute($sSQL,2);		    
		    $usercode = $result->fields['tindex'];		
		    
			if (isset($usercode)) {
			  //register customer
		      GetGlobal('controller')->calldpc_method('shcustomers.insert use '.$usercode);		
			
			  //update user task			
			  $cdata = GetGlobal('controller')->calldpc_method('shcustomers.getcustomer use '.$usercode.'+code2');
			  //print_r($cdata);
			  
              //update user tcustdata with the new customer
              $sSQL = "update utasks set tcustdata='$cdata' where tid=".$task;
              $db->Execute($sSQL,1);				  
			  //echo $sSQL;
			}
			else {	
			  //create key
              $tindex = GetGlobal('controller')->calldpc_method('shcustomers.getmaxid');  			  
			  //register customer
		      GetGlobal('controller')->calldpc_method('shcustomers.insert use '.$tindex);	
			  
			  //update user task			
			  $cdata = GetGlobal('controller')->calldpc_method('shcustomers.getcustomer use '.$usercode.'+code2');
			  //print_r($cdata);			  				  
			  
              $sSQL = "update utasks set tindex=$tindex, tcustdata='$cdata' where tid=".$task;
              $db->Execute($sSQL,1);	
			  
			  //update user					
			  GetGlobal('controller')->calldpc_method('shusers.update_user_code use '.$tindex);			  
			}
						
			return (true);	  			
		}	
		return (false);
	}

        function download_remote_file() {
           $file = GetReq('g');

           $dnloader = new stdownload();
           $ret = $dnloader->instant_download($file);
           unset ($dnloader);

           return ($ret);  
        }

        function pay_now_link($task,$cmd=null,$payimage=null) {
           $cmd = $cmd?$cmd:'cpupaynow';

		   if ($payimage)
		     $ret = seturl("t=$cmd&tid=".$task.'&key='.GetREq('key'),$this->paynow_button);
		   else 
             $ret = seturl("t=$cmd&tid=".$task.'&key='.GetREq('key'),'PAY NOW');
           return ($ret);
        }
				
		
		function invoice_paid_status($status) {

		  if ($status>20) 
		    $ret = true;
		  else
		    $ret = false;
			
		  return ($ret);	
		}		
};
}	
?>