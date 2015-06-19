<?php
$__DPCSEC['STUTASKS_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("STUTASKS_DPC")) && (seclevel('STUTASKS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("STUTASKS_DPC",true);

$__DPC['STUTASKS_DPC'] = 'stutasks';

$a = GetGlobal('controller')->require_dpc('stereobit/rcutaskshow.dpc.php');
require_once($a);

//$b = GetGlobal('controller')->require_dpc('shop/shusers.dpc.php');
//require_once($b);


$__EVENTS['STUTASKS_DPC'][0]='stutasks';
$__EVENTS['STUTASKS_DPC'][1]='stutaskshow';
$__EVENTS['STUTASKS_DPC'][2]='stutaskhandle';
$__EVENTS['STUTASKS_DPC'][3]='stuinsertcus';
$__EVENTS['STUTASKS_DPC'][4]='studownload';
$__EVENTS['STUTASKS_DPC'][5]='studownloadtermsyes';
$__EVENTS['STUTASKS_DPC'][6]='stumailbox';
$__EVENTS['STUTASKS_DPC'][7]='stutool';

$__ACTIONS['STUTASKS_DPC'][0]='stutasks';
$__ACTIONS['STUTASKS_DPC'][1]='stutaskshow';
$__ACTIONS['STUTASKS_DPC'][2]='stutaskhandle';
$__ACTIONS['STUTASKS_DPC'][3]='stuinsertcus';
$__ACTIONS['STUTASKS_DPC'][4]='studownload';
$__ACTIONS['STUTASKS_DPC'][5]='studownloadtermsyes';
$__ACTIONS['STUTASKS_DPC'][6]='stumailbox';
$__ACTIONS['STUTASKS_DPC'][7]='stutool';

$__DPCATTR['STUTASKS_DPC']['stutasks'] = 'stutasks,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['STUTASKS_DPC'][0]='STUTASKS_DPC;Tasks;Αναθέσεις';
$__LOCALE['STUTASKS_DPC'][1]='_TASKDATESTART;Start;Αρχή';
$__LOCALE['STUTASKS_DPC'][2]='_TASKDATEEND;End;Τελος';
$__LOCALE['STUTASKS_DPC'][3]='_TASKNAME;Task;Εργασία';
$__LOCALE['STUTASKS_DPC'][4]='_TASKTEXT;Remarks;Σχόλια';
$__LOCALE['STUTASKS_DPC'][5]='_TASKCRITICAL;Critical Actions;Επείγοντα';
$__LOCALE['STUTASKS_DPC'][6]='_TASKTOEND;Ending Actions;Ληξεις';
$__LOCALE['STUTASKS_DPC'][7]='_TDATE;Date;Ημερομηνια';
$__LOCALE['STUTASKS_DPC'][8]='_NONAME;No name;Αγνωστο';
$__LOCALE['STUTASKS_DPC'][9]='_view;View;Προβολη';
$__LOCALE['STUTASKS_DPC'][10]='_invoice;Invoice;Παραστατικο';
$__LOCALE['STUTASKS_DPC'][11]='_app;Application;Εφαρμογη';
$__LOCALE['STUTASKS_DPC'][12]='_rf;Remote Files;Αρχεια';
$__LOCALE['STUTASKS_DPC'][13]='_TASKTOCOME;Upcomming Actions;Προσεχείς';
$__LOCALE['STUTASKS_DPC'][14]='_RETURN;Return;Επιστροφή';
$__LOCALE['STUTASKS_DPC'][15]='_LOGERR;You are not a valid user! Please contact your service administrator!;Αγνωστος χρησητης. Παρακαλω ενημερωστε την αρμοδια υπηρεσια';
$__LOCALE['STUTASKS_DPC'][16]='_PAYRETURNMSG;If the invoice seems unpaid,please wait and press...;Αν το παραστατικο φαινετε απληρωτο, πατηστε...';
$__LOCALE['STUTASKS_DPC'][17]='_REFRESH;Refresh;Ανανεωση';
$__LOCALE['STUTASKS_DPC'][18]='_OTHERTASKS;Other Tasks;Άλλες εργασίες';
$__LOCALE['STUTASKS_DPC'][19]='_INVALIDREPLY;Invalid reply. Task Expired!;Ακυρη απάντηση. Η εργασία εχει λήξει!';

class stutasks extends rcutaskshow {

    var $title;
	var $carr;
	var $msg;
	var $path;
	
	var $_grids, $charts;
	var $ajaxLink;
	var $hasgraph;
    var $status_sid, $status_sidexp;	
	var $taskid, $user;
	var $isreply; 
	var $hasterms, $terms_accept;
	
	var $_calndr,$_callout,$_tree;
	var $dst, $key, $clickbymail;
	var $vertical_view;
	
	var $username,$userid;
	var $tools;

	function stutasks() {
	  $UserSecID = GetGlobal('UserSecID');
	  $sFormErr = GetGlobal('sFormErr');
	  $UserName = GetGlobal('UserName');
	  $UserID = GetGlobal('UserID');

	  $this->username = $UserName?decode($UserName):null;		   	
	  $this->userid = $UserID?decode($UserID):null;	
	
	  rcutaskshow::rcutaskshow();
	  $this->title = localize('STUTASKS_DPC',getlocal());		
	  
	  //first click-load of page..default =null
	  $this->clickbymail = GetSessionParam('mclick');
      $this->isreply = null; //disabled ..used clickbymail  
	  $this->taskid = GetReq('tid');//null;   
	  $key = urldecode(GetReq('key'));
	  if ($key)
	     $this->key = $key;
	  elseif ($_SESSION['Key'])	 
	     $this->key = $_SESSION['Key'];		
	  else
	     $this->key = $this->create_key();	 
		 
	  $pk = explode('~',$this->key);
	  $this->user = $pk[0];		    
	  
      //if ($GRX) {
          $this->view_button = loadTheme('ditem',localize('_view',getlocal()));
          $this->invoice_button = loadTheme('eitem',localize('_invoice',getlocal()));
          $this->app_button = loadTheme('aitem',localize('_app',getlocal()));
          $this->rf_button = loadTheme('mailitem',localize('_rf',getlocal()));

		  $this->sep = "&nbsp;";//loadTheme('lsep');
      //}
        $this->terms_accept = false;	
		
	  $this->_calndr = new nitobi("Calendar");		  
	  $this->_callout = new nitobi("Callout");		  
	  $this->_tree = new nitobi("Tree");
	  
	  $this->dst = 1;// daylight ????? 
	  $this->vertical_view = 1;  
	  
	  $this->tools = array('Lime Survey'=>'limesurvey','XCalendar'=>'xcalendar');
	  
	}  
	
    function event($event=null) {
	
	   //ALLOW EXPRIRED APPS
	   /////////////////////////////////////////////////////////////
	   //if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	
	   /////////////////////////////////////////////////////////////		 
	   //echo 'reply:',$this->isreply;
       if (($this->key) && (!$this->clickbymail)) {
	     echo $this->key;
		 //if (!stristr($key,'~')) die("You are not a valid user! Please contact your network administrator!");	     
		 $pk = explode('~',$this->key);
		 $this->user = $pk[0];
		 SetGlobal('UserName',$this->user);//to have the val in this complilation (session val go to to the next )						  		 
									 
         $username = GetGlobal('controller')->calldpc_method('shlogin.login_with_key use '.$key.'+email+1');
		 //if ($username) {
		 $this->taskid = GetReq('tid');		 
		 $this->isreply = false;
		 //print_r($_SESSION);
	     $UserSecID = GetGlobal('UserSecID');
	     $UserName = GetGlobal('UserName');
	     $UserID = GetGlobal('UserID');
		 
         SetSessionParam("UserName", $this->user);
         SetSessionParam("Key", $this->key);			 
         SetSessionParam("mclick", 1);			 
		 
	     $this->userid = decode($UserID);	 
		 //}
		 
		 //update treply counting clicks by mail
         $tr = $this->get_task_reply($this->taskid);	
         $this->set_task_reply($this->taskid,($tr+1));		 
	   }
	   
	   //echo GetGlobal('UserName');
	   
	   if ((GetGlobal('UserName')) || ($_COOKIE["cuser"])) {
	     switch ($event) {
		     case 'stutool'     :
	         case 'stumailbox'  : 
	                              break; 
	         case 'studownload'  :$this->download_remote_file();
                                  die();
	                              break; 
		     case 'stuinsertcus': $this->new_customer = $this->insert_customer($this->taskid);
                                  echo $this->task_handler($this->taskid,GetReq('step'));	
		                          die();		 
		                          break;	  
	         case 'studownloadtermsyes':$this->terms_accept = true;	                            
	         case 'stutaskhandle'  :    if ($this->valid_task_reply_ttl($this->taskid)) {  
			                              echo $this->task_handler($this->taskid,GetReq('step'));	
		                                  die();	
										}
										else
										  die(localize('_INVALIDREPLY',getlocal()));
		                                break;     
		     case 'stutaskshow'    :  if ($this->valid_task_reply_ttl($this->taskid)) {
			                            echo $this->preview_task($this->taskid,null,null,GetReq('reply'));
		                                die();
								      }	
								      else
										die(localize('_INVALIDREPLY',getlocal()));
							          break; 	   
	         case 'stutasks'    : //if (($this->isreply) /*&& ($this->valid_task_reply_ttl($this->taskid))*/) 
		                          //  $this->set_task_reply($this->taskid,1);
								  //else
					                //die(localize('_INVALIDREPLY',getlocal()));			    	
		     default            : $this->nitobi_javascript();
		                        
	     }
	   }
	   else {
	     $loginerrmsg = localize('_LOGERR',getlocal());	
		 die($loginerrmsg);
	     //die("You are not a valid user! Please contact your service administrator!");			
	   }	 
    }   
	
    function action($action=null) {
	 
	 /* if (GetSessionParam('REMOTELOGIN')) 
	    $out = setNavigator(seturl("t=cpremotepanel","Remote Panel"),$this->title); 	 
	  else  
        $out = setNavigator(seturl("","Control Panel"),$this->title);	*/ 	 
	  
	  switch ($action) {
	     case 'stutool'     : $out .= $this->show_user_tool(GetReq('tool'));
	                              break;	  	  
	     case 'stumailbox'  : $out .= $this->show_user_mailbox();
	                              break;	  
	     case 'studownloadtermsyes':
	                              break;	  
	     case 'studownload'  :
	                             break; 	  
		 case 'stuinsertcus':
		                         break;		  
	     case 'stutaskhandle'  : break;	  
		 case 'stutaskshow': 
							  break; 
	     case 'stutasks'    :

		 default            : $out .= $this->show_user_tasks();
	  }	 

	  return ($out);
    }
	
	//override
	function nitobi_javascript() {
      if (iniload('JAVASCRIPT')) {

		   $template = $this->set_template();   		      
		   
	       $code = $this->init_grids();			
		   $code .= $this->_grids[0]->OnClick(52,'TaskDetails',$template);		   
	   
		   $js = new jscript;
		   $js->setloadparams("init()");
           $js->load_js('nitobi.toolkit.js');			   
           $js->load_js('nitobi.grid_new.js');				   
           $js->load_js('nitobi.calendar.js');		   
           $js->load_js('nitobi.callout.js');			   
           $js->load_js('nitobi.tree.js');		   
		   
           $js->load_js($code,"",1);			   
		   unset ($js);
	  }		
	}	
	
	function show_user_tasks() {
	
	   if ($this->msg) $out = $this->msg;
	   
	   //goto priority handle this ????
	   /*if (($tid = GetReq('tid')) && ($key = GetReq('key'))) {//has click a mail msg
	     //show actions and bosy for specific tid
	     //show_actions(tid,inv,app,trf)+'<table width=\"100%\" class=\"group_win_body\"><tr><td>'+show_body(tid,txt,htm)+'</td></tr></table>
		 //$toprint .= setNavigator(seturl("","Control Panel"),seturl("t=stutasks&key=".GetReq('key'),$this->title));
		 $toprint .= $this->task_actions($tid);
		 $toprint .= $this->show_body($tid);	
	   }
	   else*/
	     $toprint .= $this->show_grids();//'sthandler.php');	
	   
       $mywin = new window(/*$this->title*/null,$toprint);
       $out .= $mywin->render();	
	   
	   //HIDDEN FIELD TO HOLD STATS ID FOR AJAX HANDLE
	   $out .= "<INPUT TYPE= \"hidden\" ID= \"statsid\" VALUE=\"0\" >";	   	    
	  
	   return ($out);		   
	}			
	
	function show_user_mailbox() {
	   
	    $mailurl = '/rcubemail';
	
        $ret = "<iframe src =\"".$mailurl."\" width=\"100%\" height=\"500px\"><p>Your browser does not support iframes.</p></iframe>";  	
		return ($ret);
	}
	
	function show_user_tool($tool=null) {
	   
	    $toolurl = '/'.$tool;
	
        $ret = "<iframe src =\"".$toolurl."\" width=\"100%\" height=\"500px\"><p>Your browser does not support iframes.</p></iframe>";  	
		return ($ret);
	}	
	
	//override
	function set_template() {

		   $template .= "'+show_actions(i0,i12,i24,i39)+'";			   			   	
		   $template .= "<table width=\"100%\" class=\"group_win_body\"><tr><td>";
		   $template .= "'+show_body(i0,i9,i10)+'";		   	
		   $template .= "</td></tr></table>";	     
	   
		   return ($template);	
	}	
	
	//override
	function show_grid($handler=null,$x=null,$y=null,$filter=null,$bfilter=null) {
	   $x = $x?$x:400;
	   $y = $y?$y:100;	
	   $myhandler = $handler?$handler:'sthandler.php';	   
	   //$grid0_get = $handler.'?t=utgetutasks&tuser='.$this->user;
	   $mode = GetReq('mode');
	   $active_tasks = GetReq('actives')?GetReq('actives'):1;
	   $ulocaltime = $this->get_user_localtime();
	   //echo $ulocaltime,'>',date('Y-m-d H:i:s',$ulocaltime);
	   //$ulocaltime = date('Y-m-d H:i:s',$ulocaltime);
	   
	   if ($this->vertical_view) {
	     $sxs = "130";
		 $hxs = "400";
	   }
	   else {
	     $sxs = "70";
		 $hxs = "300";
	   }	 
	   	   
	   $grid0_get = $handler."?t=utgetutasks&mode=$mode&actives=$active_tasks&localtime=$ulocaltime&key=".GetReq('key');	   
	   $grid0_set = null;//$handler.'?t=utsetutasks';	   

	   $this->_grids[0]->set_text_column("id","tid","50","true");
	   $this->_grids[0]->set_text_column(localize('_TDATE',getlocal()),"tdate",$sxs,"true");//,"yyyy.MM.dd G 'at' hh:mm:ss z",1);	   
	   $this->_grids[0]->set_text_column(localize('_TASKDATE',getlocal()),"taskdate","1","false");//,"yyyy.MM.dd G 'at' hh:mm:ss z",1);
	   $this->_grids[0]->set_text_column(localize('_TASKDATESTART',getlocal()),"taskstart",$sxs,"true");//,"yyyy.MM.dd G 'at' hh:mm:ss z",1);
	   $this->_grids[0]->set_text_column(localize('_ISCRITICAL',getlocal()),"iscritical","1","false","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_CRITICALVAL',getlocal()),"criticalval","1","false");		   
	   $this->_grids[0]->set_text_column(localize('_TASKDATEEND',getlocal()),"taskend",$sxs,"true");//,"yyyy.MM.dd G 'at' hh:mm:ss z",1);
	   $this->_grids[0]->set_text_column(localize('_TASKUSER',getlocal()),"taskuser","1","false");		   
	   $this->_grids[0]->set_text_column(localize('_TASKNAME',getlocal()),"taskname",$hxs,"false");
	   $this->_grids[0]->set_text_column(localize('_TASKTEXT',getlocal()),"tasktext","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_TASKHTML',getlocal()),"taskhtml","1","false");
	   $this->_grids[0]->set_text_column(localize('_TASKATTACH',getlocal()),"taskattach","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_HASINVOICE',getlocal()),"hasinvoice","1","false");//,"CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_INVCOST',getlocal()),"invcost","1","false");
	   $this->_grids[0]->set_text_column(localize('_INVITEMS',getlocal()),"invitems","1","false");
	   $this->_grids[0]->set_text_column(localize('_INVITEMSQTY',getlocal()),"invitemsqty","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_INVNAME',getlocal()),"invname","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_INVLIST',getlocal()),"invlist","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_MUSTPAY',getlocal()),"mustpay","1","false");//,"CHECKBOX","yesno","display","value",'1','0');	
	   $this->_grids[0]->set_text_column(localize('_ISCARTPRODUCT',getlocal()),"iscartproduct","1","false");//,"CHECKBOX","yesno","display","value",'1','0');			   	   
	   $this->_grids[0]->set_text_column(localize('_REQREPLY',getlocal()),"reqreply","1","false");//,"CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_REQTTL',getlocal()),"reqttl","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_REQNAME',getlocal()),"reqname","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_REQLIST',getlocal()),"reqlist","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_HASAPP',getlocal()),"hasapp","1","false");//,"CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_APPNAME',getlocal()),"appname","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_APPLIST',getlocal()),"applist","1","false");	   	   
	   $this->_grids[0]->set_text_column(localize('_GOTOPRIORITY',getlocal()),"invlist","1","false");	   	   
	   $this->_grids[0]->set_text_column(localize('_HASSCHEDULE',getlocal()),"hasschedule","1","false");//,"CHECKBOX","yesno","display","value",'1','0');	   
	   $this->_grids[0]->set_text_column(localize('_SCHTYPE',getlocal()),"schtype","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_SCHTIMES',getlocal()),"schtimes","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_SCHCOUNT',getlocal()),"schcount","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_HASINFORM',getlocal()),"hasinform","1","false");//,"CHECKBOX","yesno","display","value",'1','0');	
	   $this->_grids[0]->set_text_column(localize('_INFTYPE',getlocal()),"inftype","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_INFTIMES',getlocal()),"inftimes","1","false");	   
	   $this->_grids[0]->set_text_column(localize('_INFCOUNT',getlocal()),"infcount","1","false");	  	      	   
	   $this->_grids[0]->set_text_column(localize('_HASSUBSCRIBERS',getlocal()),"hassubscribers","1","false");//,"CHECKBOX","yesno","display","value",'1','0');	   
	   $this->_grids[0]->set_text_column(localize('_SUBSCRIBERS',getlocal()),"subscribers","1","false");	
	   $this->_grids[0]->set_text_column(localize('_HASDBSUBS',getlocal()),"hasdbsubs","1","false");//,"CHECKBOX","yesno","display","value",'1','0');	
	   $this->_grids[0]->set_text_column(localize('_HASREMOTEFILES',getlocal()),"hasremotefiles","1","false");//,"CHECKBOX","yesno","display","value",'1','0');	   
	   $this->_grids[0]->set_text_column(localize('_REMOTEFILES',getlocal()),"remotefiles","1","false");		   
	   $this->_grids[0]->set_text_column(localize('_NOMOS',getlocal()),"nomos","1","false");		      
	   $this->_grids[0]->set_text_column(localize('_INSTANTDNLOAD',getlocal()),"instantdnload","1","false");//,"CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_ISPUBLICDIR',getlocal()),"ispublicdir","1","false");//,"CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_ISUSERDIR',getlocal()),"isuserdir","1","false");//,"CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_HASUSETERMS',getlocal()),"hasuseterms","1","false");//,"CHECKBOX","yesno","display","value",'1','0');	   	   	   	   	   
	   $this->_grids[0]->set_text_column(localize('_TACTIVE',getlocal()),"tactive","1","false");//,"CHECKBOX","yesno","display","value",'1','0');		   
	   $this->_grids[0]->set_text_column(localize('_TSTATUS',getlocal()),"tstatus","1","false");
	   $this->_grids[0]->set_text_column(localize('_TREPLY',getlocal()),"treply","1","false");	   	   
	   $this->_grids[0]->set_text_column(localize('_TINDEX',getlocal()),"tindex","1","false");	     
	   $this->_grids[0]->set_text_column(localize('_TCUSTDATA',getlocal()),"tcustdata","1","false");
	   $this->_grids[0]->set_text_column(localize('_TPARAMS',getlocal()),"tparams","1","false");	  	    
	   $this->_grids[0]->set_text_column(localize('_TIMEZONE',getlocal()),"tmz","1","false");		   
	   
	   //$this->_grids[0]->set_datasource("check_active",array('ACTIVE'=>'Active','0'=>'Inactive'),null,"value|display",true);
	   $this->_grids[0]->set_datasource("yesno",array('1'=>'Yes','0'=>'No'),null,"value|display",true);


	   //no update null,false at the end
       //$ret = $this->_grids[0]->set_grid_remote($grid0_get,$grid0_set,"$x","$y","livescrolling",null,"false");
       $ret = $this->_grids[0]->set_grid_remote_new($grid0_get,$grid0_set,"$x","$y","livescrolling",2,false,false,false,true);       
	  	   

	   return ($ret);
	}			
	
	//override
	function show_grids() {
	   //gets
       $filter= GetParam('filter');
	   $message = null;	   
	   
	   if ($this->vertical_view) {
	     
		  $up = $this->show_grid('sthandler.php',860,120,null,$filter);//. $this->searchinbrowser();
		  $dn = $this->_grids[0]->set_detail_div("TaskDetails",860,290,'F0F0FF',$message);
		  
	      $datattr[] = $up . $dn;
	      $viewattr[] = "left;100%";								  
	   }
	   else {
	   //grid 0 
	   $datattr[] = $this->show_grid('sthandler.php',440,580,null,$filter);//. $this->searchinbrowser();					  
	   $viewattr[] = "left;50%";						
	   
	   $wd .= $this->_grids[0]->set_detail_div("TaskDetails",440,580,'F0F0FF',$message);
	   //NOT DPC WORK!!!!
	   //$wd .= GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use stats");
	   $datattr[] = $wd;
	   $viewattr[] = "left;50%";
	   }
	   
	   $myw = new window('',$datattr,$viewattr);
	   $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
	   unset ($datattr);
	   unset ($viewattr);	
	      	
	   	
	   return ($ret);	
	}		
	
	//override
	//one user critical tasks
	function show_critical_user_tasks() {
         $db = GetGlobal('db');  	
         $date_now = date('Y-m-d H:i:s',$this->get_user_localtime());
	
         //select active tasks	   
         $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
         $sSQL.= "invname,invlist,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,hasschedule,schtype,schtimes,schcount,";
         $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,tactive,tstatus,treply,";
         $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";
         $sSQL.= "where taskuser='".$this->user."' and iscritical=1 and tactive=1 and taskstart<='". $date_now."' ORDER BY criticalval DESC";;
         //echo $sSQL;	   
         $result = $db->Execute($sSQL,2);
		 $turl = null;
		 		 
         if (!empty($result->fields)) {
           $i=0;
           foreach ($result as $n=>$rec) {
		     $tid = $rec['tid']; 
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
  	     $myw = new window(localize('_TASKCRITICAL',getlocal()),$turl);
	     $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
         unset($myw);
         return ($ret);	 
	}	
	
	//override
	function show_ending_user_tasks($daysbefore=null) {
         $db = GetGlobal('db');  	
		 
		 $dbef = $daysbefore?$daysbefore:1; //1 day ago
		 
	     $date2create = $this->get_user_localtime() - ($dbef * 24 * 60 * 60);
	     $date_from = date('Y-m-d H:i:s',$date2create); 
		 //echo '<br>',$date_from,'<br>';
		 //$date_from = date('Y-m-d H:i:s');//.....		 
         $date_now = date('Y-m-d H:i:s',$this->get_user_localtime()+24*60*60); //plus 1 day
	
         //select active tasks	   
         $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
         $sSQL.= "invname,invlist,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,hasschedule,schtype,schtimes,schcount,";
         $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,tactive,tstatus,treply,";
         $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";
         $sSQL.= "where taskuser='".$this->user."' and tactive=1 and ((taskend>='".$date_from."' and taskend<='". $date_now."') or taskend=null or taskend='0000-00-00')";
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
	
	//override
	function show_comming_user_tasks($daysafter=null) {
         $db = GetGlobal('db');  	
		 
		 $dbef = $daysafter?$daysafter:1; //1 day ago
		 
	     $date2create = $this->get_user_localtime() + ($dbef * 24 * 60 * 60);
	     $date_to = date('Y-m-d H:i:s',$date2create); 
		 //echo '<br>',$date_from,'<br>';
		 //$date_from = date('Y-m-d H:i:s');//.....		 
         $date_now = date('Y-m-d H:i:s',$this->get_user_localtime());
	
         //select active tasks	   
         $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
         $sSQL.= "invname,invlist,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,hasschedule,schtype,schtimes,schcount,";
         $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,tactive,tstatus,treply,";
         $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";
         $sSQL.= "where taskuser='".$this->user."' and tactive=1 and ((taskend>='".$date_now."' and taskend<='". $date_to."') or taskend=null or taskend='0000-00-00')";
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
	
	function show_additional_user_options() {
	     //echo "<pre>";
	     //print_r($_SESSION);
		 //echo "</pre>";
		 $key = GetReq('key'); 
	     if (!$key)  $key = $_SESSION['Key'];//GetSessionParam('Key');
	     //echo '>',$key;
	     switch (GetReq('actives')) {
		   
		    case -1 : $ret .= '<li>' . seturl('t=stutasks&actives=1&key='.$key,'Active tasks') . '</li>';
		              break;
		    case 1  : $ret .= '<li>' . seturl('t=stutasks&actives=-1&key='.$key,'Finished tasks') . '</li>';
			          break;
			default : if (GetReq('t'))//click by mail
			            $ret .= '<li>' . seturl('t=stutasks&actives=-1&key='.$key,'Finished tasks') . '</li>';
					  else //control panel returns	
					    $ret .= '<li>' . seturl('t=stutasks&actives=1&key='.$key,'Active tasks') . '</li>';
		 } 
	
	     if ( (defined('SHCUSTOMERS_DPC')) && 
		      (seclevel('SHCUSTOMERS_DPC',decode(GetSessionParam('UserSecID')))) ) {
			  
		      //if (seclevel('STCUSTOMERSMNG_',$this->userLevelID)) {
                $uid = $this->userid;
                $ret .= '<li>' . seturl("t=signup2&a=$uid&key=".$key , 'Modify master details.' ) . '</li>';			 
			  //}			  
		 }	  
		 
	     if ( (defined('SHUSERS_DPC')) && 
		      (seclevel('SHUSERS_DPC',decode(GetSessionParam('UserSecID')))) ) {
			  
              $uid = $this->userid;			  
			  //$ret .= '<li>Modify user.</li>';
			  //$ret .= '<li>Add user.</li>';	
			  $ret .= '<li>' . seturl("t=signup&a=$uid&key=".$key , 'Modify user.' ) . '</li>';				  		  
			  $ret .= '<li>' . seturl("t=signup&a=$uid&key=".$key , 'Add user.' ) . '</li>';			 
		 }	
		 
	     if ( (defined('SHTRANSACTIONS_DPC')) && 
		      (seclevel('SHTRANSACTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {
			  
			  $ret .= '<li>Show user transactions list.</li>';		  
		 }
		 
	     if ( (defined('SHSUBSCRIBE_DPC')) && 
		      (seclevel('SHSUBSCRIBE_DPC',decode(GetSessionParam('UserSecID')))) ) {
			  
			  $ret .= '<li>Subscribe/Unsubscribe.</li>';		  
		 }
		 
	     //if ( (defined('SHCUSTOMERS_DPC')) && 
		   //   (seclevel('SHCUSTOMERS_DPC',decode(GetSessionParam('UserSecID')))) ) {
			  
		      //if (seclevel('STCUSTOMERSMNG_',$this->userLevelID)) {
                $uid = $this->userid;
                $ret .= '<li>' . seturl("t=stumailbox&a=$uid&key=".$key , 'My Mailbox.' ) . '</li>';			 
			  //}			  
		 //}		 		 
		 
		 foreach ($this->tools as $name=>$tool)
		   $ret .= '<li>' . seturl("t=stutool&tool=$tool&a=$uid&key=".$key , $name.'.' ) . '</li>';			 
		 
  	     $myw = new window(localize('_OTHERTASKS',getlocal()),$ret);
	     $wret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
         unset($myw);
         return ($wret);	 		 		 		 
	 
	}
	
	function valid_task_reply_ttl($task=null) {
         $db = GetGlobal('db');  
		 
		 if (!$task) return true;//true if no task	
		 		 
         $user_time = $this->get_user_localtime();//date('Y-m-d H:i:s',$this->get_user_localtime());
		 $user_gmt_diff = $this->get_user_gmt_diff();
		 $gmt_user_time = $user_time + $user_gmt_diff;
	
         //select active task	   
         $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
         $sSQL.= "invname,invlist,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,hasschedule,schtype,schtimes,schcount,";
         $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,tactive,tstatus,treply,";
         $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";
         $sSQL.= "where taskuser='".$this->user."' and tactive=1 and tid=".$task;
         //echo $sSQL;	   
         $result = $db->Execute($sSQL,2);
		 $turl = null;
		 		 
         if (!empty($result->fields)) {
            $reqttl = $result->fields['reqttl'];
			if (intval($reqttl)>0) {//if ttl exist
			  $taskstart = $result->fields['taskstart'];//TTL from task start...no
			  $taskend = $result->fields['taskend'];//TTL extend task end			  
		      //convert taskstart to datestamp
		      $ts = date_parse($taskend);
		      $mk_ts = mktime($ts['hour'],$ts['minute'],$ts['second'],$ts['month'],$ts['day'],$ts['year']);			
			
		      //task tmz
		      $tmz = explode(':',$result->fields['tmz']); 		
	          $mk_task_diff = intval($tmz[0]) * 60 * 60;//client tmz - hours * min * sec
			  $gmt_task_end_time = $mk_ts + $mk_task_diff; 			
			
			  //ttl = task start time client time + reqttl
			  $gmt_task_req_ttl = $gmt_task_end_time + intval($reqttl);
			  //echo 'task date GMT:',date('Y-m-d H:i:s',$gmt_task_req_ttl),'<br>User date GMT:',date('Y-m-d H:i:s',$gmt_user_time);
			  if ($gmt_task_req_ttl>=$gmt_user_time)
			    return true;
			  else
			    return false;      	
		    }
			else
			  return true;//ttl no exist so it is valid always		
         }
		 else
		   return false;//false if no active

	}			
	
	function get_user_name() {
	
	        $u = $this->user;
	     
            ////////////////////////////////////////////////////////////////// calendar test		 
            //$ret .= $this->_calndr->set_datepicker_input('Calendar');		 
            $calendar = $this->_calndr->set_datepicker_calendar('Calendar','onClickCalndr','yyyy-MM-dd',1,2);	
            ////////////////////////////////////////////////////////////////// tree test			
			//$tree = $this->_tree->set_tree('sthandler.php?t=stugettree&key='.GetReq('key'),'folders',300,100);
			
			$staticdata = '
	<ntb:children>
		<ntb:node label="A node (without any children)">
			<ntb:children></ntb:children>
		</ntb:node>
		<ntb:node label="A leaf (no possibility of children)"></ntb:node>
		<ntb:node label="A node (with children)" expanded="false">
			<ntb:children>
				<ntb:node label="A leaf"></ntb:node>
				<ntb:node label="A node">
					<ntb:children>
						<ntb:node label="A node">
							<ntb:children></ntb:children>
						</ntb:node>
						<ntb:node label="A leaf"></ntb:node>
						<ntb:node label="A node">
							<ntb:children>
								<ntb:node label="A leaf"></ntb:node>
							</ntb:children>
						</ntb:node>
					</ntb:children>
				</ntb:node>
				<ntb:node label="A leaf"></ntb:node>
				<ntb:node label="A node">
					<ntb:children>
						<ntb:node label="A leaf"></ntb:node>
						<ntb:node label="A node">
							<ntb:children></ntb:children>
						</ntb:node>
						<ntb:node label="A leaf"></ntb:node>
						<ntb:node label="A node">
							<ntb:children>
								<ntb:node label="A leaf"></ntb:node>
							</ntb:children>
						</ntb:node>
					</ntb:children>
				</ntb:node>
			</ntb:children>
		</ntb:node>
	</ntb:children>';
	
			$tree = $this->_tree->set_tree_static($staticdata,'folders',360,100);	
            
            $ret .= '~'.$u.$calendar.$tree;
         	     
	    return ($ret);
	}
	
	//override to add js
	function init_grids() {
	
            //calendar localization 
	    $days = array('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday');
	    foreach ($days as $day)
	      $d[] = localize($day,getlocal());
	    $dret = "['" . implode("','",$d) . "']";  
	    
	    foreach ($days as $mind) {
	      $mn = localize($mind,getlocal());	    
	      $md[] = substr($mn,0,2);	    
	    }  
	    $mdret = "['" . implode("','",$md) . "']"; 	   	    
	      
	    $months = array('January','February','March','April','May','June','July','August','September','October','November','December');
	    foreach ($months as $month)
	      $m[] = localize($month,getlocal());	    
	    $mret = "['" . implode("','",$m) . "']"; 	
	         
	      

	  	
	    $key = GetReq('key');
	    $bodyurl = seturl("t=stutaskshow&key=".$key."&tid=");
	    $printit = seturl("t=stutaskshow&reply=1&key=".$key."&tid=");
	    $hasinvoice = seturl("t=stutaskhandle&type=invoice&key=".$key."&tid=");	
	    $hasapp = seturl("t=stutaskhandle&type=app&key=".$key."&tid=");	
	    $hasremotefiles = seturl("t=stutaskhandle&type=files&key=".$key."&tid=");								
		
		//callout js
		$out = $this->_callout->callout_init(100,100,'Test','test....','xp','0','TaskDetails',100);
		//tree js
		$out .= $this->_tree->tree_init();//dummy at the time		
		
		$out .= "
//function alert() {}\r\n
nitobi.calendar.DatePicker.longMonthNames = $mret; 
nitobi.calendar.DatePicker.longDayNames = $dret;
nitobi.calendar.DatePicker.minDayNames = $mdret;

function onClickCalndr(calendar)
{
 var date = calendar.getSelectedDate().toString();
 //var d = date.substring(0, date.indexOf(\"00:00:00\"));
 //alert(date);
 runCallout();

 //var rsGrid = nitobi.getGrid('Tasks');
 //rsGrid.bind();
}

function setGridSize(width, height)
{
 var rsGrid = nitobi.getGrid('Tasks');
 rsGrid.resize(width, height);
}


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
  
  ifr = '<iframe src =\"'+bodyurl+'\" width=\"100%\" height=\"500px\"><p>Your browser does not support iframes ('+str2+').</p>'+str1+'</iframe>';  
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
var datePicker = nitobi.loadComponent(\"Calendar\"); //manual loading
var tree = nitobi.loadComponent(\"Tree\"); //manual loading
";
        foreach ($this->_grids as $n=>$g)
		  $out .= $g->init_grid_new($n);
	
        $out .= "\r\n}";
        return ($out);
	}	
	
	//php version of js .. to show task actions buttons	
	function task_actions($tid=null) {
        $db = GetGlobal('db');	
	    $key = GetReq('key');
	    $bodyurl = seturl("t=stutaskshow&key=".$key."&tid=");
	    $printit = seturl("t=stutaskshow&reply=1&key=".$key."&tid=");
	    $hasinvoice = seturl("t=stutaskhandle&type=invoice&key=".$key."&tid=");	
	    $hasapp = seturl("t=stutaskhandle&type=app&key=".$key."&tid=");	
	    $hasremotefiles = seturl("t=stutaskhandle&type=files&key=".$key."&tid=");			
	
	    if ($tid) {
		
           //select attributes of selected task	   
           $sSQL = "select hasinvoice,hasapp,hasremotefiles,";
           $sSQL.= "taskname,tid,tindex,tcustdata,tparams from utasks ";
           $sSQL.= "where tid=".$tid;
           //echo $sSQL;	   
           $result = $db->Execute($sSQL,2);
		   $turl = null;
		 		 
           if (!empty($result->fields)) {
             $i=0;
             foreach ($result as $n=>$rec) {
		       $tid = $rec['tid']; 
		       //$txt = '';//$rec['tasktext'];
		       //$htm = '';//$rec['taskhtml'];
		       $inv = $rec['hasinvoice'];
		       $app = $rec['hasapp'];
		       $rf = $rec['hasremotefiles'];
               $title = $rec['taskname']?$rec['taskname']:localize('_NONAME',getlocal());
			   //$turl .= "<li><A href=\"#\" onClick=\"task_shortcut($tid,$inv,$app,$rf,'$txt','$htm')\">" . $title . "</A></li>"; 				  					 
               $i+=1;	   
             }    	
           }		
		
           $prnurl = "<A href=\"$printit".$tid."\">$this->view_button</A>&nbsp;";  
           if ($inv=='1') 
		     $invurl = "<A href=\"$hasinvoice".$tid."\">$this->invoice_button</A>&nbsp;";  
		   else
		     $invurl = null;	 
           if ($app=='1') 
		     $appurl = "<A href=\"$hasapp".$tid."\">$this->app_button</A>&nbsp;";  
		   else
		     $appurl = null;	 
           if ($rf=='1')  
		     $rfurl = "<A href=\"$hasremotefiles".$tid."\">$this->rf_button</A>&nbsp;"; 		
		   else
		     $rfurl = null;	 
		
		   
		   $tem = "<h2>" . $title . "</h2><br>" . $prnurl . $invurl . $appurl . $rfurl;
		}
	    else   
		   $tem = null;
		  
		   
		 return ($tem);
	}
	
	//php version of js .. to show body in iframe
	function show_body($tid=null) {
        $db = GetGlobal('db');	
	    $key = GetReq('key');	
	    $bodyurl = seturl("t=stutaskshow&key=".$key."&tid=".$tid);	
	
	    if ($tid) {
		
           //select attributes of selected task	   
           $sSQL = "select tasktexte,taskhtml,";
           $sSQL.= "taskname,tid,tindex,tcustdata,tparams from utasks ";
           $sSQL.= "where tid=".$tid;
           //echo $sSQL;	   
           $result = $db->Execute($sSQL,2);
		   $turl = null;	
           if (!empty($result->fields)) {
             $i=0;
             foreach ($result as $n=>$rec) {
		       $tid = $rec['tid']; 
		       $txt = '';//$rec['tasktext'];
		       $htm = '';//$rec['taskhtml'];
		       //$inv = $rec['hasinvoice'];
		       //$app = $rec['hasapp'];
		       //$rf = $rec['hasremotefiles'];
               $title = $rec['taskname']?$rec['taskname']:localize('_NONAME',getlocal());
			   //$turl .= "<li><A href=\"#\" onClick=\"task_shortcut($tid,$inv,$app,$rf,'$txt','$htm')\">" . $title . "</A></li>"; 				  					 
               $i+=1;	   
             }    	
           }		   	
  
           $ret = '<iframe src =\"'.$bodyurl.'\" width=\"100%\" height=\"500px\"><p>Your browser does not support iframes ('+str2+').</p>'+str1+'</iframe>';  
		}
		else
		  $ret = null;
		  
		return ($ret);  
	}
	
	//override
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
               $b .= $this->create_reply_button($task,$result->fields['reqname'],null,'controlpanel.php','t=stutasks&key='.GetReq('key'));
            }			  
            $ret = $this->create_task_body($myhtml,$result->fields['tasktext'].$b);
		  }	
          else
            $ret = $result->fields['tasktext'];
        }
 
		$this->set_task_status($task,1); //read commited
		$this->set_task_reply($task,1);//reply commited
		$this->deactivate_task($task); //deactivate task		

        return ($ret);
    }	
	
	//override
	function task_handler($task,$step=0) {
	  $type= GetReq('type');
	   
	  //$this->set_task_reply($task,1);//reply commited
   	  $this->deactivate_task($task); //deactivate task .... only if main purpose commited (see has_extras overiden here)	   
	
	   switch ($type) {
	     case 'invoice' : $this->set_task_status($task,2);
	                      $ret = $this->invoice_viewer($task);
		                  break;
	     case 'app' :     $this->set_task_status($task,3);
	                      $ret = $this->application_viewer($task,null,'t=stutasks&tid='.$task.'&key='.GetReq('key'));
		                  break;
	     case 'files' :   if ($this->application_viewer($task,1)<0) {//app expired 
	                            $this->set_task_status($task,3);
		                    $ret = $this->application_viewer($task,null,'t=stutasks&tid='.$task.'&key='.GetReq('key'));
		                  }  
		                  else {
		                    $this->set_task_status($task,4);
		                    $ret = $this->remote_file_viewer($task);
		                  }  
		                  break;	
		 //view is out of handler (see task status.deactivation inside procedure)				  
		 default :    	  		  					  						  
	   }
	   
	   return ($ret);
	}
	
	//override	
	function set_task_status($task,$status=null) {
        $db = GetGlobal('db'); 
		$status = $status?$status:0;

		$mystatus = $this->get_task_status($task);

        //paid tasks can't change the status		
		/*if ($mystatus>20) { //paid
		  $status = $mystatus; //as is
		}*/

        if ($status>$mystatus) { //only in new status is bigger than ol status
          //e.g : app viewed task can't be set as just readed!
          $sSQL = "update utasks set tstatus=$status where tid=".$task; 
          $r = $db->Execute($sSQL,1); 
          if ($db->Affected_Rows()) 
              return true;
          else
		      return false;     	  
        }        
	}
	
	//override
	function deactivate_task($task,$bypass=null) {
        $db = GetGlobal('db');       
		
		//if (!$this->has_extras($task)||$bypass) {
		if ($this->main_purpose_commited($task)||$bypass) {

          $sSQL = "update utasks set tactive=0 where tid=".$task; 
          $r = $db->Execute($sSQL,1); 
          if ($db->Affected_Rows()) 
              return true;
          else
		      return false; 
		}
        
        return (false);	
	}	
	
	//override.. called by decativate_task ...????????
	function has_extras($task) {
        $db = GetGlobal('db');	
	
        $sSQL = "select hasinvoice,hasapp,hasremotefiles,gotopriority,tstatus,mustpay from utasks where tid=".$task;
        $result = $db->Execute($sSQL,2);
		
		$priority = $result->fields['gotopriority'];
		$current_status = $result->fields['tstatus'];		
		$must_pay = $result->fields['mustpay'];			
		
		$ret = $priority; //0 means has no extras,1 =view,2...
		
        if ($hasinv = $result->fields['hasinvoice']) { 
		  if ($priority==2) {
		    if ((($must_pay) && ($current_status<21)) //must be paid
                 || ($current_status<2)) //must be check invoice
              $ret = 2;				
		  }	
		}
		  
        if ($hasapp = $result->fields['hasapp']) {
		  if (($priority==3) && ($current_status<3)) //must be check app
            $ret = 3;
		}
		  
        if ($hasrf = $result->fields['hasremotefiles']) { 
		  if (($priority==4) && ($current_status<4)) //files must be get
            $ret = 4;					  
		}  
		
        return ($ret);	  
	}				
	
	//override
	function remote_file_viewer($task) {
          $db = GetGlobal('db');
                  	
	
          $sSQL = "select remotefiles,tasktext,taskhtml,taskattach,instantdnload,hasuseterms,ispublicdir,isuserdir,taskuser from utasks where tid=".$task;
          $result = $db->Execute($sSQL,2);	
	      $files = $result->fields['remotefiles'];
          $myhtml=$result->fields['taskhtml'];
		  $taskuser = $result->fields['taskuser'];

          $out = $result->fields['tasktext']."<br><br>"; 

          $instant = $result->fields['instantdnload'];//0; //for one file
          $hasterms = $result->fields['hasuseterms'];//1; //if not set instant for all files when previewd else terms first
	      $ispublicdir = $result->fields['ispublicdir'];
	      $isuserdir = $result->fields['isuserdir'];	  
		  $userpath = $isuserdir?$taskuser:null;
	
          $dnloader = new stdownload($ispublicdir,$userpath);
          //echo $files;
          if ($files) {
              
            if (($hasterms) && (!$this->terms_accept)) {
			
	          $out .= $dnloader->termsform('t=stutaskhandle&type=files&tid='.GetReq('tid').'&key='.GetReq('key'),'studownloadtermsyes','stutasks');                                                        
            }
            else {
              if (stristr($files,';')) { //many files
                //print_r($files);
		        $rf = explode(';',$files);
		
		        foreach ($rf as $id=>$name) {

                   $out .= $dnloader->show_remote_file_link($name,'studownload&tid='.GetReq('tid').'&key='.GetReq('key'));
                   //$dnloader->send_thanks_mail($name,$this->user);
                   $out .= "<br>";  
                }
	          }
              else {//one file..download one click...
                if ($instant) {
	              $ret = $dnloader->instant_download($files);
	              return ($ret);
	            }  
                else
                  $out .= $dnloader->show_remote_file_link($name,'studownload&tid='.GetReq('tid').'&key='.GetReq('key'));
              }
            } //has terms 
           }
           else 
              $out .= "There is not remote files!";
    
	   unset($dnloader);
	   
	   $out .= seturl('t=stutasks&tid='.GetReq('tid').'&key='.GetReq('key'),localize('_RETURN',getlocal()));
       //template
       if ($myhtml) 
          $ret = $this->create_task_body($myhtml,$out);  
       else
          $ret = $out;		   

	   return ($ret);
	}		
	
	//override
	function application_viewer($task,$return_expire=null,$cmdback=null) {
        $db = GetGlobal('db');	
		$date_now = date('Y-m-d H:i:s');
	    $centraldbpath = paramload('SHELL','dbgpath');
        $cmd = $cmdback?$cmdback:'t=cputaskshow&tid='.GetReq('tid');	
	    $mypathtemplate = paramload('SHELL','urlpath').'/cp/html/';					
	
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
		
		  if ($res[0]['expire']) {//valid app
		  
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
            $out .= "<h3>" . $this->pay_now_link($task,'stutpay') . "</h3>";  
	      }
		  else {//not valid app		
		    if ($return_expire) 
		      return (-1);//hust to procced payment without app 
			
		    $out = "No valid application found!";		  
		  }
        }
		else {//has app
		  if ($return_expire) 
		    return (-1);//hust to procced payment without app 
			
		  $out = "No application found!";
		}  

	    $out .= "<br><br>" . seturl($cmd,localize('_RETURN',getlocal()));

        //template
        if ($myhtml) { 
          $ret = $this->create_task_body($myhtml,$out);
		}  
        else
          $ret = $out;	
		  
		return ($ret);  
	}	
	
	//override..input unkown customer
	//if payreturn =1 then add refresh button to change invoice status after payment ..weaiting ipn
	function invoice_viewer($task,$payreturn=null) {	
        $db = GetGlobal('db');		
		$payreturn = $payreturn?$payreturn:GetReq('payreturn');
	    $sFormErr = GetGlobal('sFormErr');		
		$date_now = date('Y-m-d H:i:s');
	    $back_link =  seturl('t=stutasks&tid='.GetReq('tid').'&key='.GetReq('key'),localize('_RETURN',getlocal()));
							
        if (iniload('JAVASCRIPT')) {	
		  //$js = new jscript;
	      $bclose = GetGlobal('controller')->calldpc_method('javascript.JS_function use js_closewin+'.localize('_CLOSE',getlocal()));
		            //$js->JS_function("js_closewin",localize('_CLOSE',getlocal())); 
	      $bprint = GetGlobal('controller')->calldpc_method('javascript.JS_function use js_printwin+'.localize('_PRINT',getlocal()));
		            //$js->JS_function("js_printwin",localize('_PRINT',getlocal()));									 
          //unset ($js);
	   	  $back_link.= '&nbsp;' . $bclose . '&nbsp;' . $bprint;
		}		
		
		//if has app return exp day else -1 ..to proceed payment witoaut app...

		$expdays = $this->application_viewer($task,1); 			
	
        $sSQL = "select invcost,invitems,invitemsqty,invname,invlist,tcustdata,tindex,tasktext,taskhtml,taskattach,tstatus from utasks where tid=".$task;
        $result = $db->Execute($sSQL,2);	
		//print_r($result->fields);
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
		if (($sFormErr=="Ok")||(strlen($cdata)>11)||$paid) {
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
		else { //register it.......
		  //$invoice_text .= $sFormErr;		
		  $goto = seturl('t=stuinsertcus&type='.GetReq('type')."&tid=".GetReq('tid'));
          $invoice_text .= "<br>Customer data missing! Please update informations now!<br>";					
          $invoice_text .= GetGlobal('controller')->calldpc_method('shcustomers.makeform use '.$tcustdata.'+1+stuinsertcus++'.$goto);	   				
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
	    
		
		if (($sFormErr=="Ok")||(strlen($cdata)>11)) {  
		  if ($paid==false) {
			if ($payreturn) {
			  $paynow .= localize('_PAYRETURNMSG',getlocal());
			  $refresh = "t=stutaskhandle&type=invoice&key=".GetReq('key')."&tid=".GetReq('tid').'&payreturn=1';
			  $paynow .= seturl($refresh,localize('_REFRESH',getlocal()));
			}
			$paynow .= ($expdays!=null)?"<h3>".$this->pay_now_link($task,'stutpay',1)."</h3>":"&nbsp;";
			$datattr[] = $paynow;
		  }	
		}
		else
		  $datattr[] = "&nbsp;"; 
		  
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
	
	//override to sen thanks mail
    function download_remote_file() {
           $file = GetReq('g');

           $dnloader = new stdownload();
           $dnloader->send_thanks_mail($file,$this->user);           
           $ret = $dnloader->instant_download($file);
           unset ($dnloader);

           return ($ret);  
    }
	
    function get_user_localtime() {
	
	     // set the default timezone to use. Available since PHP 5.1
         date_default_timezone_set('GMT'); //btpass server time
	     $mk_now = mktime();
		 //echo 'server now:',date('Y-m-d H:i:s',$mk_now);
	     //if ($this->dst)
	        $mk_now += 60*60; //+1 hour
	     $mk_now_gmt = $mk_now - date('Z');//auto server offset val = 0 when GMT
	     //get timezone
	     $user_tmz = 2;//GetGlobal('controller')->calldpc_method('shusers.get_user_timezone');
		 		
	     $mk_cln_tmz = intval($user_tmz) * 60 * 60;//client tmz - hours * min * sec	 
	     $user_local_time = $mk_now_gmt + $mk_cln_tmz;
         //$date_now = date('Y-m-d H:i:s',$user_local_time);
		 
		 return ($user_local_time); //return time in secs from 1970
	}        
	
	//return gmt diff (+/-) in ticks
	function get_user_gmt_diff() {
	
	     //get timezone
	     $user_tmz = 2;//GetGlobal('controller')->calldpc_method('shusers.get_user_timezone');
		 		
	     $mk_cln_tmz = intval($user_tmz) * 60 * 60;//client tmz - hours * min * sec	 
	     return ($mk_cln_tmz);	
	}
	
  //when key not provided then create it	
  function create_key($usermail=null,$custcode=null) {
    $db = GetGlobal('db');	
	
	$um = $usermail?$usermail:$this->username;
	$cc = $custcode?$custcode:$this->userid;
	
    //find username and password of current user	   
    $sSQL .="SELECT username,password FROM users";	
    $sSQL .= " where email='$um' and code2='$cc'";
    //echo $sSQL;	   
    $result = $db->Execute($sSQL,2);	
   
    $un = $result->fields['username'];
    $pw = $result->fields['password'];
    
    $string = "$un:$pw";
    //echo $string;
    
    //make it md5 in url
    $key = $um. '~'.md5($string);
    
    //$key = '1234567890';

    return (urlencode($key));
  }	
};
}	
?>