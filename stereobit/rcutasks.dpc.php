<?php

$__DPCSEC['RCUTASKS_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("RCUTASKS_DPC")) && (seclevel('RCUTASKS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCUTASKS_DPC",true);

$__DPC['RCUTASKS_DPC'] = 'rcutasks';

$a = GetGlobal('controller')->require_dpc('nitobi/nitobi.lib.php');
require_once($a);

$b = GetGlobal('controller')->require_dpc('shop/shusers.dpc.php');
require_once($b);


$__EVENTS['RCUTASKS_DPC'][0]='cputasks';
$__EVENTS['RCUTASKS_DPC'][1]='deltask';
$__EVENTS['RCUTASKS_DPC'][2]='regutask';
$__EVENTS['RCUTASKS_DPC'][3]='cpcutsmail';
$__EVENTS['RCUTASKS_DPC'][4]='cpcutsmsend';
$__EVENTS['RCUTASKS_DPC'][5]='insutask';
$__EVENTS['RCUTASKS_DPC'][6]='updutask';
$__EVENTS['RCUTASKS_DPC'][7]='saveupdutask';
$__EVENTS['RCUTASKS_DPC'][8]='synctasks';

$__ACTIONS['RCUTASKS_DPC'][0]='cputasks';
$__ACTIONS['RCUTASKS_DPC'][1]='delutask';
$__ACTIONS['RCUTASKS_DPC'][2]='regutask';
$__ACTIONS['RCUTASKS_DPC'][3]='cpcusmail';
$__ACTIONS['RCUTASKS_DPC'][4]='cpcusmsend';
$__ACTIONS['RCUTASKS_DPC'][5]='insutask';
$__ACTIONS['RCUTASKS_DPC'][6]='updutask';
$__ACTIONS['RCUTASKS_DPC'][7]='saveupdutask';
$__ACTIONS['RCUTASKS_DPC'][8]='synctasks';

$__DPCATTR['RCUTASKS_DPC']['cputasks'] = 'cputasks,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCUTASKS_DPC'][0]='RCUTASKS_DPC;Add Task;Add Tasks';
$__LOCALE['RCUTASKS_DPC'][1]='_notes;Notes;Σημειωσεις';
$__LOCALE['RCUTASKS_DPC'][2]='_seclevid;SecLecvID;SecLevID';
$__LOCALE['RCUTASKS_DPC'][3]='_secparam;SecParam;SecParam';
$__LOCALE['RCUTASKS_DPC'][4]='_email;Email;Email';
$__LOCALE['RCUTASKS_DPC'][5]='_fname;First Name;Ονομα';
$__LOCALE['RCUTASKS_DPC'][6]='_lname;Last Name;Επώνυμο';
$__LOCALE['RCUTASKS_DPC'][7]='_subscribe;Subscribe;Συνδρομή';
$__LOCALE['RCUTASKS_DPC'][8]='_username;User;Χρήστης';
$__LOCALE['RCUTASKS_DPC'][9]='_password;Password;Password';
$__LOCALE['RCUTASKS_DPC'][10]='_address;Address;Διεύθυνση';
$__LOCALE['RCUTASKS_DPC'][11]='_tel;Tel.;Τηλέφωνο';
$__LOCALE['RCUTASKS_DPC'][12]='_mob;Mobile;Κινητό';
$__LOCALE['RCUTASKS_DPC'][13]='_mail;e-mail;e-mail';
$__LOCALE['RCUTASKS_DPC'][14]='_fax;Fax;Fax';
$__LOCALE['RCUTASKS_DPC'][15]='_DETAILS;Details;Σχολια';
$__LOCALE['RCUTASKS_DPC'][16]='_LOADPROTO;Load prototype;Πρωτοτυπο';
$__LOCALE['RCUTASKS_DPC'][17]='_TASKDATE;Date;Ημερομηνια';
$__LOCALE['RCUTASKS_DPC'][18]='_TASKDATESTART;Start;Αρχη';
$__LOCALE['RCUTASKS_DPC'][19]='_TASKDATEEND;End;Τελος';
$__LOCALE['RCUTASKS_DPC'][20]='_TASKNAME;Name;Ονομα';
$__LOCALE['RCUTASKS_DPC'][21]='_TASKTEXT;Text;Κειμενο';
$__LOCALE['RCUTASKS_DPC'][22]='_TASKHTML;Html;Html';
$__LOCALE['RCUTASKS_DPC'][23]='_TASKATTACH;Attach;Συνημμενα';
$__LOCALE['RCUTASKS_DPC'][24]='_HASINVOICE;Has Invoice;Εχει παραστατικο';
$__LOCALE['RCUTASKS_DPC'][25]='_REQREPLY;Has Reply;Εχει απαντηση';
$__LOCALE['RCUTASKS_DPC'][26]='_HASAPP;Has Application;Έχει εφαρμογη';
$__LOCALE['RCUTASKS_DPC'][27]='_APPNAME;Application Name;Ονομα εφαρμογης';
$__LOCALE['RCUTASKS_DPC'][28]='_APPLIST;Application List;Λιστα εφαρμογων';
$__LOCALE['RCUTASKS_DPC'][29]='_HASSCHEDULE;Has schedule?;Δημιουργει επανάληψη?';
$__LOCALE['RCUTASKS_DPC'][30]='_SCHTYPE;Schedule Type;Τυπος χρονοπρογραμματισμου';
$__LOCALE['RCUTASKS_DPC'][31]='_SCHTIMES;Schedule Times;Φορες εκτελεσης';
$__LOCALE['RCUTASKS_DPC'][32]='_SCHCOUNT;Schedule Count;Μετρητης χρονοπρογραμματισμου';
$__LOCALE['RCUTASKS_DPC'][33]='_HASINFORM;Has Inform;Εχει ενημερωση';
$__LOCALE['RCUTASKS_DPC'][34]='_INFTYPE;Inform Type;Τυπος ενημερωσης';
$__LOCALE['RCUTASKS_DPC'][35]='_INFTIMES;Inform Times;Ποσες φορες';
$__LOCALE['RCUTASKS_DPC'][36]='_INFCOUNT;Inform Count;Μετρητης ενημερωσης';
$__LOCALE['RCUTASKS_DPC'][37]='_HASSUBSCRIBERS;Has subscribers;Εχει παραληπτες';
$__LOCALE['RCUTASKS_DPC'][38]='_SUBSCRIBERS;Subscribers;Παραληπτες';
$__LOCALE['RCUTASKS_DPC'][39]='_NOMOS;Area;Περιοχη';
$__LOCALE['RCUTASKS_DPC'][40]='_ISPROTO;Save as prototype;Αποθήκευση ως προτυπο';
$__LOCALE['RCUTASKS_DPC'][41]='_PROTONAME;Prototype name;Ονομα πρωτοτυπου';
$__LOCALE['RCUTASKS_DPC'][42]='_PROTOTYPE;Prototype type;Τυπος πρωτοτυπου';
$__LOCALE['RCUTASKS_DPC'][43]='_TASKEXECUTE;Execute Now;Εκτελεση τωρα';
$__LOCALE['RCUTASKS_DPC'][44]='_INVNAME;Invoice name;Ονομα παραστατικου';
$__LOCALE['RCUTASKS_DPC'][45]='_INVLIST;Invoice list;Λιστα παραστατικων';
$__LOCALE['RCUTASKS_DPC'][46]='_REQNAME;Reply name;Ονομα υπογραφης';
$__LOCALE['RCUTASKS_DPC'][47]='_REQLIST;Reply list;Λιστα υπογραφων';
$__LOCALE['RCUTASKS_DPC'][48]='_TASKPARAMS;Parameters;Παραμετροι';
$__LOCALE['RCUTASKS_DPC'][49]='_TASKSAVE;Save Task;Αποθήκευση';
$__LOCALE['RCUTASKS_DPC'][50]='_HASDBSUBS;Has internal subscribers;Εχει εσωτερικους παραληπτες';
$__LOCALE['RCUTASKS_DPC'][51]='_TDATE;Insert Date;Καταχωρηση';
$__LOCALE['RCUTASKS_DPC'][52]='_TSTATUS;Status;Κατασταση';
$__LOCALE['RCUTASKS_DPC'][53]='_TACTIVE;Active;Ενεργο';
$__LOCALE['RCUTASKS_DPC'][54]='_TINDEX;Customer ID;Πελατης';
$__LOCALE['RCUTASKS_DPC'][55]='_TREPLY;Reply;Απαντησεις';
$__LOCALE['RCUTASKS_DPC'][56]='_TCUSTDATA;Customer Data;Δεδομενα Πελάτης';
$__LOCALE['RCUTASKS_DPC'][57]='_TPARAMS;Parameters;Παράμετροι';
$__LOCALE['RCUTASKS_DPC'][58]='_TASKUSER;User;Χρηστης';
$__LOCALE['RCUTASKS_DPC'][59]='_ISCRITICAL;Is Critical;Εχει κρισιμότητα';
$__LOCALE['RCUTASKS_DPC'][60]='_CRITICALVAL;Critical Value;Αριθμος κρισιμότητας';
$__LOCALE['RCUTASKS_DPC'][61]='_INVCOST;Cost;κοστος';
$__LOCALE['RCUTASKS_DPC'][62]='_INVITEMS;Items;Στοιχεια';
$__LOCALE['RCUTASKS_DPC'][63]='_INVITEMSQTY;Qty;Ποσοτητα';
$__LOCALE['RCUTASKS_DPC'][64]='_REQTTL;Reply TTL;Τέλος απάντησης';
$__LOCALE['RCUTASKS_DPC'][65]='_HASREMOTEFILES;Has Server Files;Έχει απομακρυσμενα αρχεια';
$__LOCALE['RCUTASKS_DPC'][66]='_REMOTEFILES;Server Files;Απομακρυσμενα αρχεια';
$__LOCALE['RCUTASKS_DPC'][67]='_TIMEZONE;Timezone;Ζωνη ωρας';
$__LOCALE['RCUTASKS_DPC'][68]='_SAVETMZ;Save Timezone;Αποθηκευση ζωνη ωρας';
$__LOCALE['RCUTASKS_DPC'][69]='_INSTANTDNLOAD;Instant Download;Αμεση μεταφόρτωση';
$__LOCALE['RCUTASKS_DPC'][70]='_HASUSETERMS;Has Terms of use;Εχει Όρους χρησης';
$__LOCALE['RCUTASKS_DPC'][71]='_ISPUBLICDIR;Is public dir;Κοινόχρηστη περιοχη';
$__LOCALE['RCUTASKS_DPC'][72]='_ISUSERDIR;Is user dir;Περιοχη χρήσητη';
$__LOCALE['RCUTASKS_DPC'][73]='_MUSTPAY;Must be paid;Αμεση εντολη πληρωμης';
$__LOCALE['RCUTASKS_DPC'][74]='_ISCARTPRODUCT;Is cart product;Ειδος καλαθιου';
$__LOCALE['RCUTASKS_DPC'][75]='_GOTOPRIORITY;Action priority;Προτεραιότητα ενέργεις';

class rcutasks extends shusers {

    var $title;
	var $carr;
	var $msg;
	var $path;
	var $post;
	var $maillink;
    var $task_customer,$task_cuscode,$task_usermail;

	var $_grids;
	var $informhostcomp;
	var $taskid, $replypage, $replycmd;
	var $urlpath, $inpath;
	
	var $scheduler_allow_execution, $informer_allow_execution;
	var $server_gmt, $dst;

	function rcutasks() {
	  $GRX = GetGlobal('GRX');
	  $this->title = localize('RCUTASKS_DPC',getlocal());
	  $this->carr = null;
	  $this->msg = null;

	  $this->path = paramload('SHELL','prpath');
	  $this->urlpath = paramload('SHELL','urlpath');
	  $this->inpath = paramload('ID','hostinpath');	  
	  $this->taskid = null;
	  
      $this->informhostcomp = remote_paramload('RCUTASKS','informhostmail',$this->path);	  	  
      $this->taskmailfrom = remote_paramload('RCUTASKS','taskmailfrom',$this->path);      
      $this->replypage = remote_paramload('RCUTASKS','replypage',$this->path);      
      $this->replycmd = remote_paramload('RCUTASKS','replycmd',$this->path);      	  	  

      $this->_grids[] = new nitobi("Users");
	  $this->_grids[] = new nitobi("Transactions");

	  $this->maillink = seturl('t=cpcusmail&<@>');

      if ($GRX) {
          $this->delete = loadTheme('ditem',localize('_delete',getlocal()));
          $this->edit = loadTheme('eitem',localize('_edit',getlocal()));
          //$this->import = loadTheme('ivehicle',localize('_import',getlocal()));
          //$this->recode = loadTheme('rvehicle',localize('_recode',getlocal()));
          $this->add = loadTheme('aitem',localize('_add',getlocal()));
          $this->mail = loadTheme('mailitem',localize('_mail',getlocal()));

		  $this->sep = "&nbsp;";//loadTheme('lsep');
      }
      else {
          $this->delete = localize('_delete',getlocal());
          $this->edit = localize('_edit',getlocal());
          //$this->import = localize('_import',getlocal());
          //$this->recode = loadTheme('rvehicle','show help');
          $this->add = localize('_add',getlocal());
          $this->mail = localize('_mail',getlocal());

		  $this->sep = "|";
      }
	  
	  //default values informer,scheduler allow execution (may be not exist scheduler,informer)
	  $this->scheduler_allow_execution = true;
	  $this->informer_allow_execution = true;	
	  
      $this->server_gmt = remote_paramload('RCUTASKS','servergmt',$this->path);  	    
	  $this->dst=1;// daylight ????? 
	}

    function event($event=null) {

	   /////////////////////////////////////////////////////////////
	   if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//
	   /////////////////////////////////////////////////////////////

	   switch ($event) {
	     case 'cpcutsmsend'  : $this->send_mail();
                              $this->nitobi_javascript();
		                      //$this->carr = $this->select_customers('all',null,GetReq('alpha'));//dummy param
		                      break;
	     case 'cpcutsmail'   :
		                      break;

	     case 'regutask' :    $this->get_customer_data();
 		                      $this->form_javascript();
 		                      $this->read_protos();
 		                      $this->read_html(); 
							  $this->read_applications();								  		                      
		                      break;
	     case 'insutask' :    $this->newtask = $this->insert_task();
		                      if ($this->newtask)
		                        $this->nitobi_javascript();
		                      else {  
		                        $this->form_javascript();
		                        $this->read_protos();
 		                        $this->read_html();		                        
								$this->read_applications();	
		                      }  
		                      break;
	     case 'updutask' :     $this->updrec = $this->getuserdata(null,GetReq('rec'),$this->actcode);
		                      break;
		 case 'saveupdutask' : $this->update();
		                      $this->nitobi_javascript();
		                      break;
	     case 'delutask' :     $this->_delete(GetReq('rec'),'code2');
		                      $this->nitobi_javascript();
							  break;
	     case 'synctasks':	    $this->msg = $this->synctasks(1);					  
	     case 'cputasks' :
		 default            : $this->nitobi_javascript();
		                      //$this->carr = $this->select_customers('all',null,GetReq('alpha'));//dummy param
	   }

    }

    function action($action=null) {

	  if (GetSessionParam('REMOTELOGIN'))
	     $out = setNavigator(seturl("t=cpremotepanel","Remote Panel"),$this->title);
	  else
         $out = setNavigator(seturl("t=cp","Control Panel"),$this->title);

	  switch ($action) {
	     case 'cpcusmsend'  : $out .= $this->show_users();
		                      break;
	     case 'cpcusmail'   : $out .= $this->show_mail();
		                      break;
	     case 'delutask'     : $out .= $this->show_users();
		                      break;
		 case 'regutask'     : $out .= $this->form();
		                      //$out .= $this->show_users();
							  //$out .= $this->regform(null,'insuser');
							  break;
	     case 'updutask' :     $out .= $this->regform($this->updrec,'saveupduser',1);
		                      break;
		 case 'saveupdutask' :
         case 'insutask'     :  if ($this->newtask)
                                   $out .= $this->show_users();
                                 else
                                   $out .= $this->form();   
                                 break;  
             case 'synctasks'    :                                 
	     case 'cputasks'     :
		 default            :
		                      $out .= $this->show_users();
	 }

	 return ($out);
    }

	function form_javascript() {
      if (iniload('JAVASCRIPT')) {

		   $js = new jscript;
           $js->load_js('ts_picker.js');	 
		   unset ($js);
	  }
	}	
	
	function nitobi_javascript() {
      if (iniload('JAVASCRIPT')) {

		   $template = $this->set_template();

	       $code = $this->init_grids();
		   $code .= $this->_grids[0]->OnClick(11,'Userdetails',$template,'Transactions','tindex',1);

		   $js = new jscript;
		   $js->setloadparams("init()");
           $js->load_js('nitobi.grid.js');		   
           $js->load_js($code,"",1);
		   unset ($js);
	  }
	}

	function set_template() {

	       $edit = seturl("t=updutask"."&rec=");
		   $add =  seturl("t=regutask&user=");
		   $add2 = "&cus=";
		   $add3 = "&usermail=";
		   $mail = seturl("t=cputsmail&rec=");

		   $template .= "<A href=\"$edit'+i0+'\">".$this->edit."</A>". $this->sep;
		   $template .= "<A href=\"$add'+i0+'$add2'+i1+'$add3'+i8+'\">".$this->add."</A>". $this->sep;
		   //$template .= "<A href=\"$del'+i0+'\">".$this->delete."</A>". $this->sep;
		   $template .= "<A href=\"$mail'+i0+'\">".$this->mail."</A>". $this->sep;
		   $template .= "<br>";

		   //customer
		   $template .= "<table width=\"100%\" class=\"group_win_body\"><tr><td width=\"30%\">";
		   $template .= localize('a/a',getlocal()).":</br>";
		   $template .= localize('_code',getlocal()).":</br>";
		   $template .= localize('_fname',getlocal()).":</br>";
		   $template .= localize('_lname',getlocal()).":</br>";
		   $template .= localize('_notes',getlocal()).":</br>";
		   $template .= localize('_seclevid',getlocal()).":</br>";
		   $template .= localize('_secparam',getlocal()).":</br>";
		   $template .= localize('_subscribe',getlocal()).":</br>";
		   $template .= localize('_email',getlocal()).":</br>";
		   $template .= localize('_username',getlocal()).":</br>";
		   $template .= localize('_password',getlocal()).":</br>";
		   $template .= "</td><td width=\"70%\">";
		   $template .= "'+i0+'<br>" . "'+i1+'<br>" . "'+i2+'<br>" . "'+i3+'<br>" .
		                "'+i4+'<br>" . "'+i5+'<br>" ."'+i6+'<br>" . "'+i7+'<br>" .
						"'+mailto(i8,5)+'<br>" . "'+i9+'" . "<br>'+i10+'<br>";
		   $template .= "</td></tr></table>";


		   return ($template);
	}

	function show_users() {
	   
       $out .= $this->commands();
           
	   if ($this->msg) $out .= $this->msg;
	   /*
	   $myadd = new window('',seturl("t=regcustomer","Register a new customer!"));
	   $toprint .= $myadd->render("center::100%::0::group_article_selected::right::0::0::");
	   unset ($myadd);
	   */
	   

	   $toprint .= $this->show_grids();

	   $toprint .= $this->alphabetical('cputasks');

	   $dater = new datepicker("/MDYT");
	   $toprint .= $dater->renderspace(seturl("t=cputasks"),"cputasks");
	   unset($dater);

       $mywin = new window($this->title,$toprint);
       $out .= $mywin->render();

	   return ($out);
	}

	function alphabetical($command='cpusers') {

	  $preparam = GetReq('alpha');

	  $ret .= seturl("t=$command","Home") . "&nbsp;|";

	  for ($c=$preparam.'a';$c<$preparam.'z';$c++) {
	    $ret .= seturl("t=$command&alpha=$c",$c) . "&nbsp;|";
	  }
	  //the last z !!!!!
	  $ret .= seturl("t=$command&alpha=".$preparam."z",$preparam."z");

      //$mywin = new window('',$ret);
      //$out = $mywin->render();

	  return ($ret);
	}

	function form($action=null) {

     $myaction = seturl("t=insutask&cus=".GetReq('cus'));
     

     if ($this->post==true) {

	   SetSessionParam('REGISTERED_TASK',1);
	 }
	 else { //show the form plus error if any

       //if (!$action) $out = setNavigator($this->title);

       $out .= setError($sFormErr . $this->msg);
	   $customer_data = GetGlobal('controller')->calldpc_method('shcustomers.showcustomerdata use '.GetReq('cus').'+code2');	   
	   //$out .= $customer_data;
	   //echo $customer_data,'---';
	   $utmz = $this->get_user_timezone(GetReq('user'),'id');
	   $mytimezone = $utmz?intval($utmz):2;//+2 = default
	   $timezone = GetParam('timezone')?GetParam('timezone'):$this->set_timezone_option($mytimezone,'timezones');
       //echo '>',$timezone;

	   $form = new form(localize('_ADDTASK',getlocal()), "regutask", FORM_METHOD_POST, $myaction, true);

	   $form->addGroup			("tmz",				"Timezone.");		   
	   $form->addGroup			("customer",		"Customer details.");	   
	   $form->addGroup			("task_d",			"Task Details.");
	   $form->addGroup			("task_dem",		"Task Demands."); 
	   $form->addGroup			("task_sh",			"Task Scheduler.");
	   $form->addGroup			("task_sub",		"Task Subscribers.");
	   $form->addGroup			("task_files",		"Task Files.");
	   $form->addGroup			("task_params",		"Task Parameters.");	 
	   $form->addGroup			("task_proto",		"Task prototyping.");	
	 
	   
	   $form->addElement		("tmz",		    new form_element_onlytext	(localize('_DETAILS',getlocal()),  "task text",""));	   	   
	   $form->addElement		("tmz",		    new form_element_combo_file (localize('_TIMEZONE',getlocal()),     "timezone",	    $timezone,				"forminput",	        0,0,	'timezones',1));	 	   
       $form->addElement		("tmz",			new form_element_radio		(localize('_SAVETMZ',getlocal()),   "savetimezone",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));	   
	   
	   $form->addElement		("customer",		new form_element_onlytext	(localize('_DETAILS',getlocal()),  $customer_data,""));	   	   
	   
	   $form->addElement		("task_d",		    new form_element_onlytext	(localize('_DETAILS',getlocal()),  "task text",""));	   
       $form->addElement		("task_d",		    new form_element_combo_file (localize('_LOADPROTO',getlocal()),     "loadproto",	    GetParam("loadproto"),				"forminput",	        0,0,	'task_prototypes',1));	   
	   $form->addElement		("task_d",		    new form_element_date		(localize('_TASKDATE',getlocal()),  "regutask","taskdate",		GetParam("taskdate"),				"forminput",16,	16,0));
	   $form->addElement		("task_d",		    new form_element_date		(localize('_TASKDATESTART',getlocal()),  "regutask","taskstart",	GetParam("taskstart"),	"forminput",	16,	16,0));	   
       $form->addElement		("task_d",		new form_element_radio		(localize('_ISCRITICAL',getlocal()),   "iscritical",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));	   
	   $form->addElement		("task_d",		new form_element_text		(localize('_CRITICALVAL',getlocal()),  "criticalval",			GetParam("invname"),		"forminput",		    20,				255,	0));		   
	   $form->addElement		("task_d",		    new form_element_date		(localize('_TASKDATEEND',getlocal()),  "regutask","taskend", GetParam("taskend"),				"forminput",			16,	16,0));	   	   
	   $form->addElement		("task_d",		    new form_element_text		(localize('_TASKNAME',getlocal()),  "taskname",		GetParam("taskname"),				"forminput",			50,				255,	0,0));	   
	   $form->addElement		("task_d",		    new form_element_textarea   (localize('_TASKTEXT',getlocal()),  "tasktext",		GetParam("tasktext"),				"formtextarea",			60,				9));
	   $form->addElement		("task_d",		    new form_element_combo_file (localize('_TASKHTML',getlocal()),     "taskhtml",	    GetParam("taskhtml"),				"forminput",	        0,0,	'task_html_bodies',1));	   
	   $form->addElement		("task_d",		    new form_element_combo_file (localize('_TASKATTACH',getlocal()),     "taskattach",	    GetParam("taskattach"),				"forminput",	    0,0,	'task_attach_files',1));	   	      

	   $form->addElement		("task_dem",		new form_element_onlytext	(localize('_DETAILS',getlocal()),  "demands text",""));
       $form->addElement		("task_dem",		new form_element_radio		(localize('_HASINVOICE',getlocal()),   "hasinvoice",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));
	   $form->addElement		("task_dem",		new form_element_text		(localize('_INVCOST',getlocal()),  "invcost",			GetParam("invcost"),		"forminput",		    20,				255,	0));
	   $form->addElement		("task_dem",		new form_element_text		(localize('_INVITEMS',getlocal()),  "invitems",			GetParam("invitems"),		"forminput",		    20,				255,	0));
	   $form->addElement		("task_dem",		new form_element_text		(localize('_INVITEMSQTY',getlocal()),  "invitemsqty",			GetParam("invitemsqty"),		"forminput",		    20,				255,	0));	   	   	       	
	   $form->addElement		("task_dem",		new form_element_text		(localize('_INVNAME',getlocal()),  "invname",			GetParam("invname"),		"forminput",		    20,				255,	0));	   
	   $form->addElement		("task_dem",		new form_element_combo_file (localize('_INVLIST',getlocal()),     "invlist",	    GetParam("invlist"),				"forminput",	        0,				0,	'Iask_invoice_list'));	   
	   $form->addElement		("task_dem",		new form_element_radio		(localize('_MUSTPAY',getlocal()),   "mustpay",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));	   
	   $form->addElement		("task_dem",		new form_element_radio		(localize('_ISCARTPRODUCT',getlocal()),   "iscartproduct",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));	   
       $form->addElement		("task_dem",		new form_element_radio		(localize('_REQREPLY',getlocal()),   "reqreply",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));	
	   $form->addElement		("task_dem",		new form_element_text		(localize('_REQTTL',getlocal()),  "reqttl",			GetParam("reqttl"),		"forminput",		    20,				255,	0));	      	   
	   $form->addElement		("task_dem",		new form_element_text		(localize('_REQNAME',getlocal()),  "reqname",			GetParam("reqname"),		"forminput",		    20,				255,	0));	   
	   $form->addElement		("task_dem",		new form_element_combo_file (localize('_REQLIST',getlocal()),     "reqlist",	    GetParam("reqlist"),				"forminput",	        0,				0,	'task_reply_list'));	   
       $form->addElement		("task_dem",		new form_element_radio		(localize('_HASAPP',getlocal()),   "hasapp",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));		   
	   $form->addElement		("task_dem",		new form_element_text		(localize('_APPNAME',getlocal()),  "appname",			GetParam("appname"),		"forminput",		    20,				255,	0));	   
	   $form->addElement		("task_dem",		new form_element_combo_file (localize('_APPLIST',getlocal()),     "applist",	    GetParam("applist"),				"forminput",	        0,				0,	'task_app_list',1));
	   $form->addElement		("task_dem",		new form_element_combo_file (localize('_GOTOPRIORITY',getlocal()),     "gotopriority",	    GetParam("gotopriority"),				"forminput",	        0,				0,	'task_list'));
	   
	   $form->addElement		("task_sh",			new form_element_onlytext	(localize('_DETAILS',getlocal()),  "schedule text",""));
       $form->addElement		("task_sh",			new form_element_radio		(localize('_HASSCHEDULE',getlocal()),   "hasschedule",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));		   
	   $form->addElement		("task_sh",			new form_element_text		(localize('_SCHTYPE',getlocal()),     "schtype",			GetParam("schtype"),				"forminput",	        20,				255,	0));	   
	   $form->addElement		("task_sh",			new form_element_text		(localize('_SCHTIMES',getlocal()),      "schtimes",	        GetParam("schtimes"),				"forminput",	        20,				255,	0));
	   $form->addElement		("task_sh",			new form_element_text		(localize('_SCHCOUNT',getlocal()),      "schcount",	        GetParam("schcount"),				"forminput",	        20,				255,	0));	   
		   
	   $form->addElement		("task_sh",			new form_element_onlytext	(localize('_DETAILS',getlocal()),  "inform text",""));		   
       $form->addElement		("task_sh",			new form_element_radio		(localize('_HASINFORM',getlocal()),   "hasinform",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));		   	   
	   $form->addElement		("task_sh",			new form_element_text		(localize('_INFTYPE',getlocal()),      "inftype",	        GetParam("inftype"),				"forminput",	        20,				255,	0));
	   $form->addElement		("task_sh",			new form_element_text		(localize('_INFTIMES',getlocal()),      "inftimes",	        GetParam("inftimes"),				"forminput",	        20,				255,	0));
	   $form->addElement		("task_sh",			new form_element_text		(localize('_INFCOUNT',getlocal()),      "infcount",	        GetParam("infcount"),				"forminput",	        20,				255,	0));	   

	   $form->addElement		("task_sub",		new form_element_onlytext	(localize('_DETAILS',getlocal()),  "subscribers text",""));	   
       $form->addElement		("task_sub",		new form_element_radio		(localize('_HASSUBSCRIBERS',getlocal()),   "hassubscribers",      1,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));		   	   	   
	   
       $_POST['subscribers'] = GetReq('usermail')?GetReq('usermail'):GetParam('subscribers');	   
	   $form->addElement		("task_sub",	    new form_element_textarea   (localize('_SUBSCRIBERS',getlocal()),  "subscribers",		GetParam("subscribers"),				"formtextarea",			60,				9));
       $form->addElement		("task_sub",		new form_element_radio		(localize('_HASDBSUBS',getlocal()),   "hasdbsubs",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));
	   
       $form->addElement		("task_files",		new form_element_radio		(localize('_HASREMOTEFILES',getlocal()),   "hasremotefiles",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));		   	   	   	   
	   $form->addElement		("task_files",	    new form_element_textarea   (localize('_REMOTEFILES',getlocal()),  "remotefiles",		GetParam("remotefiles"),				"formtextarea",			60,				9));       	   	   
	   $form->addElement		("task_files",		new form_element_greekmap	(localize('_NOMOS',getlocal()),     "regutask","nomos",GetParam("nomos"),"forminput",20,20,1));
	   $form->addElement		("task_files",		new form_element_radio		(localize('_INSTANTDNLOAD',getlocal()),   "instantdnload",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));
	   $form->addElement		("task_files",		new form_element_radio		(localize('_ISPUBLICDIR',getlocal()),   "ispublicdir",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));
	   $form->addElement		("task_files",		new form_element_radio		(localize('_ISUSERDIR',getlocal()),   "isuserdir",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));	   	   
	   $form->addElement		("task_files",	    new form_element_combo_file (localize('_HASUSETERMS',getlocal()),     "hasuseterms",	    GetParam("hasuseterms"),				"forminput",	        0,0,	'use_terms',1));	   
	   
	   $form->addElement		("task_params",		    new form_element_textarea   (localize('_TASKPARAMS',getlocal()),  "tparams",		GetParam("tparams"),				"formtextarea",			60,				9));
	   
	   $form->addElement		("task_proto",	    new form_element_onlytext	(localize('_DETAILS',getlocal()),  "proto text",""));	   	   
	   //dont save in proto saving	
       $form->addElement		("task_proto",		new form_element_radio		(localize('_ISPROTO',getlocal()),   "isproto",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));			   
	   $form->addElement		("task_proto",   	new form_element_text		(localize('_PROTONAME',getlocal()),     "protoname",			GetParam("protoname"),				"forminput",	        30,				255,	0));	   
	   $form->addElement		("task_proto",		new form_element_text		(localize('_PROTOTYPE',getlocal()),     "prototype",			GetParam("prototype"),				"forminput",	        30,				255,	0));	   	   	   		
	   $form->addElement		("task_proto",	    new form_element_onlytext	(localize('_DETAILS',getlocal()),  "execute text",""));	   	   	   
	   //execute now
       $form->addElement		("task_proto",		new form_element_radio		(localize('_TASKEXECUTE',getlocal()),  "taskexecute",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));			   
	   //dont save in proto saving		   
       $form->addElement		("task_proto",		new form_element_radio		(localize('_TASKSAVE',getlocal()),  "tasksave",      0,             "",   2, array ("0" => localize('_OXI',getlocal()), "1" => localize('_NAI',getlocal()))));	
	   // Adding a hidden field
       $form->addElement		(FORM_GROUP_HIDDEN,	new form_element_hidden ("cus_rec_data", $this->customer_rec?$this->customer_rec:GetParam('cus_rec_data')));	
       //$form->addElement		(FORM_GROUP_HIDDEN,	new form_element_hidden ("cus_show_data", $customer_data));		   
       $form->addElement		(FORM_GROUP_HIDDEN,	new form_element_hidden ("user_mail", GetReq('usermail')?GetReq('usermail'):GetParam('user_mail')));		   
       $form->addElement		(FORM_GROUP_HIDDEN,	new form_element_hidden ("cust_code", GetReq('cus')?GetReq('cus'):GetParam('cust_code')));		   

	      
	   if ($action)
	     $form->addElement		(FORM_GROUP_HIDDEN,	new form_element_hidden ("FormAction", $action));
	   else
	     $form->addElement		(FORM_GROUP_HIDDEN,	new form_element_hidden ("FormAction", "insutask"));

	   // Showing the form
	   $fout = $form->getform ();

	   //$fwin = new window(localize('AMAIL_DPC',getlocal()),$fout);
	   //$out .= $fwin->render();
	   //unset ($fwin);

	   $out .= $fout;

	   //$form->checkform();
	 }

     return ($out);
	}

	function commands() {	
	
	   $synctasks = seturl("t=synctasks","Sync Tasks");	
	   $newtask = seturl("t=regutask","New Task");		   
	
	   $links = $newtask . '|' . $synctasks;
	   
	   $myadd = new window('',$links);
	   $ret .= $myadd->render("center::100%::0::group_article_selected::right::0::0::");	   
	   unset ($myadd);  		   
 		 
	   return ($ret);		 
	}
	
    function get_country_from_ip() {

     $mycountry = GetGlobal('controller')->calldpc_method("country.find_country");
	 //return "Greece";
	 return ($mycountry);
    }

	function init_grids() {
        //disable alert !!!!!!!!!!!!
		$out = "
function alert() {}\r\n

function wish_list() {
  var str = arguments[0];

  if (str.substr(0,1)>0) x='ΠΩΛΗΣΗ'; else x='ΑΓΟΡΑ';

  var data = str.substr(1);
  databr = data.replace(/<@>/g, '<br>');

  ret = x+databr;

  return ret;
}

function mailto() {
  var mail = arguments[0];
  var veh = arguments[1];

  var data = '$this->maillink';
  link = data.replace(/<@>/, 'm='+mail+'&id='+veh);
  ret = '<A href=\''+link+'\'>'+mail+'</A>';

  return ret;
}

function init()
{
";
        foreach ($this->_grids as $n=>$g)
		  $out .= $g->init_grid($n);

        $out .= "\r\n}";
        return ($out);
	}

	function show_grids() { 
	   //gets
	   $alpha = GetReq('alpha');
	   //transformed posts !!!!
	   $apo = GetParam('apo');
	   $eos = GetParam('eos');
           $filter = GetParam('filter');


	   $grid0_get = "shhandler.php?t=shngetuserslist&alpha=$alpha&apo=$apo&eos=$eos&filter=$filter";
	   $grid0_set = "shhandler.php?t=shnsetusers";

	   $this->_grids[0]->set_text_column("ID","id","50","true");
	   $this->_grids[0]->set_text_column(localize('_code',getlocal()),"code2","70","true");
	   $this->_grids[0]->set_text_column(localize('_fname',getlocal()),"fname","150","true");
	   $this->_grids[0]->set_text_column(localize('_lname',getlocal()),"lname","150","true");
	   $this->_grids[0]->set_text_column(localize('_active',getlocal()),"notes","100","true","CHECKBOX","check_active","display","value",'ACTIVE','');
	   $this->_grids[0]->set_text_column(localize('_seclevid',getlocal()),"seclevid","100","true");
	   $this->_grids[0]->set_text_column(localize('_secparam',getlocal()),"secparam","100","true");
	   $this->_grids[0]->set_text_column(localize('_subscribe',getlocal()),"subscribe","100","true","CHECKBOX","check_subscriber","display","value",'1','0');
	   $this->_grids[0]->set_text_column(localize('_email',getlocal()),"email","150","true");
	   $this->_grids[0]->set_text_column(localize('_username',getlocal()),"username","150","true");
	   $this->_grids[0]->set_text_column(localize('_password',getlocal()),"password","150","true");

	   $this->_grids[0]->set_datasource("check_active",array('ACTIVE'=>'Active','0'=>'Inactive'),null,"value|display",true);
	   $this->_grids[0]->set_datasource("check_subscriber",array('1'=>'Active','0'=>'Inactive'),null,"value|display",true);


       $datattr[] = $this->_grids[0]->set_grid_remote($grid0_get,$grid0_set,"400","460","livescrolling",17) . $this->searchinbrowser();
	   $viewattr[] = "left;50%";

	   //details
	   //$add =  seturl("t=regutask");
	   //$message = "<A href=\"$add\">".$this->add."</A>";//. $this->sep;

	   $wd .= $this->_grids[0]->set_detail_div("UserDetails",400,260,'F0F0FF',$message);

	   //grid 1
	   //$wd .= GetGlobal('controller')->calldpc_method("rctransactions.show_grid use 400+150+1");
	   $wd .= $this->show_task_grid();

	   $datattr[] = $wd;
	   $viewattr[] = "left;50%";

	   $myw = new window('',$datattr,$viewattr);
	   $ret = $myw->render("center::100%::0::group_article_selected::left::3::3::");
	   unset ($datattr);
	   unset ($viewattr);

	   return ($ret);
	}

	//show the customers grid as vehicles lookup
	//called from cpvehicles
	function show_task_grid() {
	   $grid1_get = 'uthandler.php?t=utgetutasks';
	   $grid1_set = 'uthandler.php?t=utsetutasks';	   

	   $this->_grids[1]->set_text_column("id","tid","50","true");
	   $this->_grids[1]->set_text_column(localize('_TDATE',getlocal()),"tdate","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_TASKDATE',getlocal()),"taskdate","100","true");
	   $this->_grids[1]->set_text_column(localize('_TASKDATESTART',getlocal()),"taskstart","100","true");
	   $this->_grids[1]->set_text_column(localize('_ISCRITICAL',getlocal()),"iscritical","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[1]->set_text_column(localize('_CRITICALVAL',getlocal()),"criticalval","100","true");	   	   
	   $this->_grids[1]->set_text_column(localize('_TASKDATEEND',getlocal()),"taskend","100","true");
	   $this->_grids[1]->set_text_column(localize('_TASKUSER',getlocal()),"taskuser","200","true");		   
	   $this->_grids[1]->set_text_column(localize('_TASKNAME',getlocal()),"taskname","200","true");
	   $this->_grids[1]->set_text_column(localize('_TASKTEXT',getlocal()),"tasktext","200","true");	   
	   $this->_grids[1]->set_text_column(localize('_TASKHTML',getlocal()),"taskhtml","100","true");
	   $this->_grids[1]->set_text_column(localize('_TASKATTACH',getlocal()),"taskattach","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_HASINVOICE',getlocal()),"hasinvoice","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[1]->set_text_column(localize('_INVCOST',getlocal()),"invcost","100","true");
	   $this->_grids[1]->set_text_column(localize('_INVITEMS',getlocal()),"invitems","100","true");
	   $this->_grids[1]->set_text_column(localize('_INVITEMSQTY',getlocal()),"invitemsqty","100","true");	   	   	   
	   $this->_grids[1]->set_text_column(localize('_INVNAME',getlocal()),"invname","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_INVLIST',getlocal()),"invlist","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_MUSTPAY',getlocal()),"mustpay","100","true","CHECKBOX","yesno","display","value",'1','0');	
	   $this->_grids[1]->set_text_column(localize('_ISCARTPRODUCT',getlocal()),"iscartproduct","100","true","CHECKBOX","yesno","display","value",'1','0');		   	   
	   $this->_grids[1]->set_text_column(localize('_REQREPLY',getlocal()),"reqreply","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[1]->set_text_column(localize('_REQTTL',getlocal()),"reqttl","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_REQNAME',getlocal()),"reqname","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_REQLIST',getlocal()),"reqlist","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_HASAPP',getlocal()),"hasapp","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[1]->set_text_column(localize('_APPNAME',getlocal()),"appname","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_APPLIST',getlocal()),"applist","100","true");	   	   
	   $this->_grids[1]->set_text_column(localize('_GOTOPRIORITY',getlocal()),"invlist","100","true");		   
	   $this->_grids[1]->set_text_column(localize('_HASSCHEDULE',getlocal()),"hasschedule","100","true","CHECKBOX","yesno","display","value",'1','0');	   
	   $this->_grids[1]->set_text_column(localize('_SCHTYPE',getlocal()),"schtype","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_SCHTIMES',getlocal()),"schtimes","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_SCHCOUNT',getlocal()),"schcount","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_HASINFORM',getlocal()),"hasinform","100","true","CHECKBOX","yesno","display","value",'1','0');	
	   $this->_grids[1]->set_text_column(localize('_INFTYPE',getlocal()),"inftype","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_INFTIMES',getlocal()),"inftimes","100","true");	   
	   $this->_grids[1]->set_text_column(localize('_INFCOUNT',getlocal()),"infcount","100","true");	  	      	   
	   $this->_grids[1]->set_text_column(localize('_HASSUBSCRIBERS',getlocal()),"hassubscribers","100","true","CHECKBOX","yesno","display","value",'1','0');	   
	   $this->_grids[1]->set_text_column(localize('_SUBSCRIBERS',getlocal()),"subscribers","200","true");	
	   $this->_grids[1]->set_text_column(localize('_HASDBSUBS',getlocal()),"hasdbsubs","100","true","CHECKBOX","yesno","display","value",'1','0');	
	   $this->_grids[1]->set_text_column(localize('_HASREMOTEFILES',getlocal()),"hasremotefiles","100","true","CHECKBOX","yesno","display","value",'1','0');	   
	   $this->_grids[1]->set_text_column(localize('_REMOTEFILES',getlocal()),"remotefiles","200","true");		   
	   $this->_grids[1]->set_text_column(localize('_NOMOS',getlocal()),"nomos","100","true");		      
	   $this->_grids[1]->set_text_column(localize('_INSTANTDNLOAD',getlocal()),"instantdnload","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[1]->set_text_column(localize('_ISPUBLICDIR',getlocal()),"ispublicdir","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[1]->set_text_column(localize('_ISUSERDIR',getlocal()),"isuserdir","100","true","CHECKBOX","yesno","display","value",'1','0');
	   $this->_grids[1]->set_text_column(localize('_HASUSETERMS',getlocal()),"hasuseterms","100","true","CHECKBOX","yesno","display","value",'1','0');	   	   	   	   
	   $this->_grids[1]->set_text_column(localize('_TACTIVE',getlocal()),"tactive","100","true","CHECKBOX","yesno","display","value",'1','0');		   
	   $this->_grids[1]->set_text_column(localize('_TSTATUS',getlocal()),"tstatus","100","true");
	   $this->_grids[1]->set_text_column(localize('_TREPLY',getlocal()),"treply","100","true");	   	   
	   $this->_grids[1]->set_text_column(localize('_TINDEX',getlocal()),"tindex","70","true");	     
	   $this->_grids[1]->set_text_column(localize('_TCUSTDATA',getlocal()),"tcustdata","200","true");
	   $this->_grids[1]->set_text_column(localize('_TPARAMS',getlocal()),"tparams","200","true");	   	    
	   $this->_grids[1]->set_text_column(localize('_TIMEZONE',getlocal()),"tmz","100","true");		   
	   
	   $this->_grids[1]->set_datasource("check_active",array('ACTIVE'=>'Active','0'=>'Inactive'),null,"value|display",true);
	   $this->_grids[1]->set_datasource("yesno",array('1'=>'Yes','0'=>'No'),null,"value|display",true);


	   
       $ret = $this->_grids[1]->set_grid_remote($grid1_get,$grid1_set,"400","200","livescrolling",10);//,"false");
	  	   

	   return ($ret);
	}
	

	function show_mail() {
       $sFormErr = GetGlobal('sFormErr');
	   $sendto = GetReq('m');

	   if (defined('ABCMAIL_DPC')) {
	     $ret = $sFormErr;
	     $ret .= GetGlobal('controller')->calldpc_method('abcmail.create_mail use cpcusmsend+'.$sendto);
	   }

	   return ($ret);
	}
	
	function reset_db() {
	}

	function send_mail() {

	   if (!defined('ABCMAIL_DPC')) return;

	   $from = GetParam('from');
	   $to = GetParam('to');
	   $subject = GetParam('subject');
	   $body = GetParam('mail_text');

	   if ($res = GetGlobal('controller')->calldpc_method('abcmail.sendit use '.$from.'+'.$to.'+'.$subject.'+'.$body))
	     $this->mailmsg = "Send successfull";
	   else
	     $this->mailmsg = "Send failed";
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
		
	function get_customer_data() {
	    $myrec = GetReq('cus');
	
        //if ( (defined('SHCUSTOMERS_DPC')) && (seclevel('SHCUSTOMERS_DPC',decode(GetSessionParam('UserSecID')))) ) {
	          //$out .= setTitle(date('d/m/Y h:i:s A'),'right');	
		      $this->customer_rec = GetGlobal('controller')->calldpc_method('shcustomers.getcustomer use '.$myrec.'+code2');			  
			  //echo 'x',$myrec;
		//}	
		//print_r($this->customer_rec);  
	}
	
    function read_protos($to_open=null) { 

        $mydir = dir($this->path);
        while ($fileread = $mydir->read ()) { 

           if (stristr ($fileread,'.proto')) {

             $mypfiles[] = $fileread;
           }
        }
        $mydir->close ();
			   
        reset ($mypfiles); //reset
        
        if ($to_open) {//for read data
          //echo $mypfiles[$to_open-1];
		  
		  $myret = $mypfiles[$to_open-1];
		  if (stristr($myret,'--')) //it measn header --blabla---
		    $ret = $mytet;
		  else
		    $ret = null;	
          return ($ret);
        }
        else {//to make opt file
          //print_r($mypfiles);
          $mynewpfiles[] = '---Load Proto---;----Load Prototypes ----';           
          foreach ($mypfiles as $f)         
            $mynewpfiles[] = $f.';'.$f;
         $this->write2file('task_prototypes.opt',implode(',',$mynewpfiles));
        }
        //return ($this->dfiles);
    }	
    
    function read_html($to_open=null) { 
        $path = $this->urlpath.'/'.$this->inpath.'/cp/html';
        $mydir = dir($path);//echo $this->urlpath.'/cp/html';
		
		
        if ($to_open) {//for read data
		
		  $ret = $to_open;//@file_get_contents($path . '/'. $to_open); 
		
          //echo $mypfiles[$to_open-1];
          //return ($mypfiles[$to_open-1]);
		  
		 /* $myret .= $mypfiles[$to_open-1];
		  
		  if (!stristr($myret,'--')) //it measn header --blabla---
		    $ret = $mytet;
		  else
		    $ret = null;*/	
          return ($ret);		  
        }
		else {	//to make opt file	
		
          while ($fileread = $mydir->read ()) { 

           if ((stristr ($fileread,'.html')) || (stristr ($fileread,'.htm'))) {        

             $mypfiles[] = $fileread;
			 $myret .= $fileread;
           }
          }
          $mydir->close ();
			   
          reset ($mypfiles); //reset
        
          //print_r($mypfiles);
          $mynewpfiles[] = '---Load Html---;----Load Html ----';           
          foreach ($mypfiles as $f)         
            $mynewpfiles[] = $f.';'.$f;
          $this->write2file('task_html_bodies.opt',implode(',',$mynewpfiles));
       }
       //return ($this->dfiles);
    } 
	
	function read_applications($key=null,$letter=null) {
        //$db = GetGlobal('db');
	    $this->centraldbpath = paramload('SHELL','dbgpath');
	    //echo $this->centraldbpath."softhost.db";
	    $this->cdb = new sqlite($this->centraldbpath."softhost.db");		 
		$db = $this->cdb->dbp;
		
		$sSQL = "select id,appname,timezone,expire from applications ";
		
		if ($key) 
		  $sSQL .= " where ". $key . "=" . $db->qstr($id); 
		  
		if ($letter) {
		  if ($key) $sSQL .= " and ";
		       else $sSQL .= " where ";
		  $sSQL .= "(appname like '" . strtolower($letter) . "%' or " .
		            "appname like '" . strtoupper($letter) . "%')";
		}			
		  
		//echo $sSQL;
	    $resultset = $db->Execute($sSQL,2);  			 
	    $ret = $db->fetch_array_all($resultset);			  
		//print_r($ret);
		
		
		if ((isset($key))||(isset($letter))) {//get expire data
		  $dd = $ret[0]['expire'] . ' 00:00:00'; 
		  $expdate = $dd;
		  //echo $expdate;
		  return ($expdate); 
		}
		else { //create opt file
          $mynewpfiles[] = '---Applications---;----Applications----';           
          foreach ($ret as $i=>$rec) {         
            $mynewpfiles[] = $f.';'.$rec[1];
		  }   
          $this->write2file('task_app_list.opt',implode(',',$mynewpfiles));		 
		}  
	  
	    //return ($ret);	 		
	}		   
	
  function loadfromfile($filename) {
	 
	 $file = $this->path . $filename;
	 
     if ($fp = @fopen ($file , "r")) {
                 $ret = fread ($fp, filesize($file));
                 fclose ($fp);
     }
     else {
         $this->msg = "File reading error !\n";
		 echo "File reading error ($filename)!<br>";
     }	
	 
	 return ($ret);
  }

  
  function write2file($filename,$data) {
	 
	 $file = $this->path . $filename;
	 
     if ($fp = @fopen ($file , "w")) {
	    //echo $file,"<br>";
                 fwrite ($fp, $data);
                 fclose ($fp);
     }
     else {
         $this->msg = "File creation error !\n";
		 echo "File creation error ($filename)!<br>";
     }	
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
  
  function create_mail_body($taskid,$template,$text,$reqreply=null,$reqname=null,$gotopriority=null,$usermail=null,$custcode=null) {
  
    $req_reply = $reqreply?$reqreply:null;
    $req_name = $reqname?$reqname:null;	
    $goto_priority = $gotopriority?$gotopriority:null;	
  
    if ($req_reply) {
    
       $text .= '<br><br>';
       $text .= $this->create_reply_button($taskid,$req_name,null,'controlpanel.php','t=stutasks',$goto_priority,$usermail,$custcode);
    }
  
  
    //$template = paramload('SHELL','prpath') . $template;
	$mypathtemplate = $this->urlpath.'/'.$this->inpath.'/cp/html/' . $template;
	//echo $mypathtemplate;
	//echo file_get_contents($mypathtemplate);
    //$out = str_replace("##_LINK_##",$text,file_get_contents($mypathtemplate));
	$htmlp = explode('.',$template); 
	$pname = $htmlp[0];
	$pp = strtoupper($pname);
	//echo $pp;
	//echo $template;
	$repltext = "<?".$pp."?>";
	//echo '>',$repltext;
    //$out = str_replace("##_LINK_##",$text,file_get_contents($template));	
    $out = str_replace($repltext,$text,@file_get_contents($mypathtemplate));		
	//echo $out;
    
	//testing by send mypath template as data.....
    return (/*$mypathtemplate .*/ $out);	
  }	
  
  function send_task_mail($to,$subject,$body) {
  
    if (is_array($to)) {
      //print_r($to); 
      foreach ($to as $id=>$receiver) {
        $smtpm = new smtpmail;
        $smtpm->to = $receiver;
        $smtpm->from = $this->taskmailfrom;
        $smtpm->subject = $subject;
        $smtpm->body = $body;
        $mailerror[$receiver] = $smtpm->smtpsend();

        unset($smtpm); 
      }  
      return ($mailerror);     
    }
    else {
      $smtpm = new smtpmail;
      $smtpm->to = $to;
      $smtpm->from = $this->taskmailfrom;
      $smtpm->subject = $subject;
      $smtpm->body = $body;
      $mailerror = $smtpm->smtpsend();

      unset($smtpm); 
      return ($mailerror); 
    }
  }	  
  
  function save_task($executed=null,$params=null) {
    $db = GetGlobal('db');  
    //print_r($_POST);
  
    $exec = $executed?$executed:0;
	
    $extra_fields = ',tstatus,tactive,tindex,tcustdata,treply,tdate,taskuser,tmz';
    $extra_values = ",$exec,1,".$this->task_custcode.",'$this->task_customer'".",0,'". 
	                date('Y-m-d H:i:s')."','" . 
	                $this->task_usermail."','".
					$this->get_timezone($this->timezone)."'";
  
    $sSQL = "insert into utasks (" . implode(",",array_keys($_POST)) . $extra_fields .") values (";
    $i=0;
    foreach ($_POST as $f=>$v) {
	
	  if (is_array($params)) {
	    if ((array_key_exists($f,$params)) && (isset($params[$f]))){//replace data in record based in params
	      $mynewv = $params[$f];
		  //echo $mynewv;
		}  
	  }	
    
      if (stristr($v,':')) {//$i<3) { dates
        $vals[] = "'" . $this->date2mysql($mynewv?$mynewv:$v) . "'";        
      }
      else {  
      
        if ($v=='') {
          $vals[] = 'null';
        }
        elseif (($v!='0'&&$v!='1'))
          $vals[] = "'".addslashes($mynewv?$mynewv:$v)."'";   
        //elseif (stristr($f,'taskdate')||stristr($f,'taskstart')||stristr($f,'taskend')) //is date
          //$vals[] = "'" . $this->date2mysql($v) . "'";        
        else
          $vals[] = $mynewv?$mynewv:$v; 
      }
      
      $i+=1;     
	  $mynewv = null;
    }
    $sSQL .= implode(",",$vals) . $extra_values .")";
    //echo '<br>',$sSQL;
    
    $result = $db->Execute($sSQL,1);    
    //if ($result->hasAffectedRows>0) {
    
      $sql = "select max(tid) from utasks";//ORDER BY tid ASC LIMIT 1";
      $res = $db->Execute($sql,2);
      $taskid = $res->fields[0]; 
    /*}
    else {
      $this->msg .= "<br>Database error!<br>";
      $taskid = null;
    } */ 
    
    //echo 'taskid:',$taskid;
    return ($taskid);
  }
  
  function get_timezone($tmz) {
  
    if ($tmz) {
      $p = explode(' ',$tmz);
	  if (stristr($p[0],'-')) {
        $p1 = explode('-',$p[0]);	  
		$ret = "-".$p1[1];
		return ($ret);
	  }
	  elseif (stristr($p[0],'+')) {
        $p1 = explode('+',$p[0]);	
		$ret = $p1[1];//+ supposed
		return ($ret);		  
	  }
	  else
	    return '00:00';//Greenwich time
	}
	else
	  return null;  //none = 
  }
  
  function set_timezone_option($user_tmz,$option_file) {
    if ($user_tmz>0)
	  $tmz = 'GMT+'.sprintf("%02s",$user_tmz);
	elseif ($user_tmz<0)
	  $tmz = 'GMT-'.sprintf("%02s",abs($user_tmz));
	else    
	  $tmz = 'GMT';//gmt only = 0
	//echo $tmz,'>';    
    $filelines = file($this->path."/".$option_file.'.opt');
	
	foreach ($filelines as $i=>$line) {
	  //echo $line,'<br>';
	  if (stristr($line,$tmz)) {
	    $t = explode(';',$line);
	    return (trim($t[getlocal()]));
	  }	
	} 
	
	return 0; 
  }

function insert_task() {
   //echo '<pre>';
   //print_r($_POST);
   //echo '</pre>';   
   
   $c = array_shift($_POST);
   $cdata = explode(';',$c); //echo $c;
   $dummy_export = array_pop($cdata);     
   $this->task_customer_mail = array_pop($cdata);        
   
   $this->task_customer = $c;//explode(';',$c);
   $this->task_usermail = array_shift($_POST);   
   $this->task_custcode = array_shift($_POST);
   $act = array_shift($_POST);
   
   $this->timezone = array_shift($_POST);   
   $save_timezone = array_shift($_POST);  
   $load_proto = array_shift($_POST);
   $savetask = array_pop($_POST);    
   $execute = array_pop($_POST);   
   $proto_type = array_pop($_POST);
   $proto_name = array_pop($_POST);
   $isproto = array_pop($_POST);   
       
   
   if (!stristr($load_proto,'--')) {

         $_iPOST['cus_rec_data'] = $c;           
         $_iPOST['user_mail'] = $this->task_usermail;
         $_iPOST['cust_code'] = $this->task_custcode;
         $_iPOST['loadproto'] = 0;//$load_proto;   not to save just re-read post else execute or save as proto
   
         //$myproto_name = $this->read_protos($load_proto);
         $proto = $this->loadfromfile($load_proto);  //echo $load_proto; 
         $this->msg .= 'Load prototype...'.$load_proto;                  
         $_proto = (array) unserialize($proto);
         $_POST = $_iPOST+$_proto;        
                         
         //echo '<pre>';
         //print_r($_POST);
         //echo '</pre>';          
         return 0;   
   }
   else {
   
     if ($_POST['hasapp']) {
	    $exp_date = $this->read_applications(null,$_POST['appname']);
		$params['taskend'] = $exp_date;
	 }
   
     //save the task
	 if ($savetask) {
       $this->taskid = $this->save_task($execute,$params);
       $this->msg = $this->task_usermail . " has a task. ";  
	 }

     if ($execute) {//$this->msg .= "<".$_POST['gotopriority'].">";
       if ($tpl = $_POST['taskhtml'])
         $this->msg .= 'Using template...'.$tpl.'.';
       $this->msg .= 'Execute now...';
       //execute the task 
       if (isset($_POST['taskhtml'])) {
         $template = $_POST['taskhtml'];//$this->read_html($_POST['taskhtml']);//list contains names as keys now
         $body = $this->create_mail_body($this->taskid,$template,$_POST['tasktext'],$_POST['reqreply'],$_POST['reqname'],$_POST['gotopriority']);
         //echo $body;
       }
       else
         $body = $_POST['tasktext'];//plain text
       
       //send to customer official mail
       $mailerror = $this->send_task_mail($this->task_customer_mail,$_POST['taskname'],$body); 
       $this->msg .= "<br>".$this->task_customer_mail ." ". strip_tags($mailerror);         
       //send to original user
       if ($this->task_customer_mail!=$this->task_usermail) {
         $mailerror = $this->send_task_mail($this->task_usermail,$_POST['taskname'],$body); 
         $this->msg .= "<br>" .$this->task_usermail." ". strip_tags($mailerror);  
       }                     
       //send to subscribers
       if (($_POST['hassubscribers']) && (isset($_POST['subscribers']))) {       
         if (stristr($_POST['subscribers'],';')) {
           $to = explode(';',$_POST['subscribers']); 
         }
         else
           $to = $_POST['subscribers'];
         
         if ($to) {   
           $mailerror = $this->send_task_mail($to,$_POST['taskname'],$body);
           $smails .= $to.'<br>';
           if (is_array($mailerror)) {
             foreach ($mailerror as $receiver=>$error)
             $this->msg .= "<br>$receiver...".strip_tags($error);
           }
           else
             $this->msg .= "<br>" . strip_tags($mailerror);         
         }    
       }  
         
       //send to internal subscribers
       if ($_POST['hasdbsubs']) {
         $mydbsubs = $this->getuserssubscribersmail();
         //echo $mydbsubs;
         if (stristr($mydbsubs,';')) {
           $tosubs = explode(';',$mydbsubs); 
           //print_r($tosubs);
         }
         else
           $tosubs = $mydbsubs;
         
         if ($tosubs) {   
           $mailerror = $this->send_task_mail($tosubs,$_POST['taskname'],$body);         
           $smails .= $tosubs.'<br>';
           if (is_array($mailerror)) {
             //print_r($mailerror);
             foreach ($mailerror as $receiver=>$error)
              $this->msg .= "<br>$receiver...".strip_tags($error);
           }
           else
             $this->msg .= "<br>" . strip_tags($mailerror);        
         }    
       }    
       
         
       //send mail to host company
       $hostmail = $this->informhostcomp?$this->informhostcomp:'support@stereobit.net';
       $mailerror = $this->send_task_mail($hostmail,$_POST['taskname'],$body.$this->msg.'<br>'.$smails);//send msg log as mail to host comp and subs mails 
       $this->msg .= "<br>" .$hostmail.' '. strip_tags($mailerror);         
     }
	 
	 if ($save_timezone)
	   $this->set_user_timezone($this->timezone,$this->task_usermail,'username');//current user

     if ($isproto) {
       //save the prototype     
       $myproto = serialize($_POST);
       if (file_exists($this->path . $proto_name.'.proto')) {
         $this->msg .= 'Prototype not saved (name exist)';
         return 0;
       }  
       else {
         $this->write2file($proto_name.'.proto',$myproto);
         $this->msg .= "Saved as prototype.";
         return 1;
       }
     }
     else
       return 1;
   }

}

function create_reply_button($taskid=null,$name=null,$url=null,$page=null,$cmd=null,$goto_priority=null,$usermail=null,$custcode=null) {

    $name = $name?$name:'reply';
    $page = $page?$page:'controlpanel.php';
    $cmd = $cmd?$cmd:'';

    $urls = arrayload('SHELL','ip');
    $myurl = $urls[0];
    $url = $url?$url:$myurl;
    
    $key = $this->create_key_tologin($usermail,$custcode);    
    
	
	switch ($goto_priority) {
	  case 4 :  //files
                $link = 'http://' . $url . '/' . $page . '?t=stutaskhandle&type=files&tid=' . $taskid . '&key=' . $key;
				break;
	  case 3 :  //app
                $link = 'http://' . $url . '/' . $page . '?t=stutaskhandle&type=app&tid=' . $taskid . '&key=' . $key;					
				break;
	  case 2 :  //invoice
                $link = 'http://' . $url . '/' . $page . '?t=stutaskhandle&type=invoice&tid=' . $taskid . '&key=' . $key;					
				break;				
	  case 1 :  //view	
                $link = 'http://' . $url . '/' . $page . '?stutaskpreview' . '&tid=' . $taskid . '&key=' . $key;					
				break;		  		
	  default :  //control panel
                $link = 'http://' . $url . '/' . $page . '?' . $cmd . '&tid=' . $taskid . '&key=' . $key;
	}
    //echo $link,'<br>';

    //$button = "<input name=\"Submit\" type=\"submit\" onClick=\"MM_goToURL('parent','controlpanel.php?t=dologout');return document.MM_returnValue\" value=\"$name\">";
    $button = "<h2><a href=\"$link\">$name</a></h2>";
    
    return ($button);
}

function create_key_tologin($usermail=null,$custcode=null) {
    $db = GetGlobal('db');	
	
	$um = $usermail?$usermail:$this->task_usermail;
	$cc = $custcode?$custcode:$this->task_custcode;
	
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

function getuserssubscribersmail() {
    $db = GetGlobal('db');	
	   
    $sSQL .="SELECT email FROM users";	
    $sSQL .= " where lname='SUBSCRIBER' and subscribe=1";
	   
    $result = $db->Execute($sSQL,2);	
   
    if (count($result)>0) {		   
	     foreach ($result->fields as $n=>$mail) {	     
		   $ret[] = $mail;
	     }
    }
	   	 
    if (!empty($ret)) {  
	     $out = implode(';',$ret);
    }
	   
    return $out;	
}

	function set_task_status($task,$status=null) {
        $db = GetGlobal('db');       

		$status?$status:0;
        $sSQL = "update utasks set tstatus=$status where tid=".$task; 
        $r = $db->Execute($sSQL,1); 
     	
	}
	
	//deactivate only if repeating exist else hold on
	function deactivate_task($task,$recordOfTask) {
        $db = GetGlobal('db');       
		
		if ($this->main_purpose_commited($task,$recordOfTask)) {//user action ???
		  if (($this->scheduler_at_end($task,$recordOfTask)) && 
		      ($this->informer_at_end($task,$recordOfTask))) { 
            
			if ($this->task_expired($task,$recordOfTask)) {
              $sSQL = "update utasks set tactive=0 where tid=".$task; 
              $r = $db->Execute($sSQL,1);
			  
			  if ($db->Affected_Rows())  
		        return true;
			  else
			    return false;	
			}
		  }
		}
        
        return (false);	
	}
	
	//check if main purpose of task commited (by user of task)
	function main_purpose_commited($task,$recordOfTask) {	
		
		$priority = $recordOfTask['gotopriority'];
		$current_status = $recordOfTask['tstatus'];		
		$must_pay = $recordOfTask['mustpay'];						
		
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
	
	function scheduler_at_end($task,$recordOfTask) {
	
		$has_schedule = $recordOfTask['hasschedule'];		
		$type_schedule = $recordOfTask['schtype'];		
		$times_schedule = $recordOfTask['schtimes'];		
		$count_schedule = $recordOfTask['schcount'];	
		
		if ($has_schedule) {
		  if ($times_schedule==$count_schedule)
		    $ret = true;//means that scheduler is at end so  deactive 
		  else	
		    $ret = false;//means that scheduler is on the road so don't let deactivate
		}
		else
		  $ret = true;//means 1 time play so deactivate
		  
		return ($ret);  	
	}
	
	function informer_at_end($task,$recordOfTask) {
	
		$has_inform = $recordOfTask['hasinform'];			
		$type_inform = $recordOfTask['inftype'];		
		$times_inform = $recordOfTask['inftimes'];		
		$count_inform = $recordOfTask['infcount'];
		
		if ($has_inform) {
		  if ($times_inform==$count_inform)
		    $ret = true;//means that informer is at end so can deactivate
		  else	
		    $ret = false;//means that informer is on the road don't ley deactivate
		}
		else
		  $ret = true;//means 1 time play so deactivate
		  
		return ($ret);				
	}
	
	function task_expired($task, $recordOftask) {
       $date_now = date('Y-m-d H:i:s');	   
	   $taskend = $recordOfTask['taskend'];
	   
	   // set the default timezone to use. Available since PHP 5.1
       date_default_timezone_set('GMT'); //btpass server time
		
	   $mk_now = mktime();
	   if ($this->dst)
	     $mk_now += 60*60; //+1 hour

	   $mk_now_gmt = $mk_now - date('Z');//auto server offset val = 0 when GMT
		//convert taskend to datestamp
	   $ts = date_parse($taskend);
	   $mk_taskend = mktime($ts['hour'],$ts['minute'],$ts['second'],$ts['month'],$ts['day'],$ts['year']);
				   
	   if ($mk_now_gmt>$mk_taskend) //comapre in timestamps
	   //if ($date_now>$taskend)
	     return true;
	   else
	     return false;	 
	}		

function synctasks($localexec=null) {
    $db = GetGlobal('db');
    $msg = null;		
    
	if ($localexec!=null) {//bin file get in
	
	     //default values informer,scheduler allow execution (may be not exist scheduler,informer)
	     $this->scheduler_allow_execution = true;
	     $this->informer_allow_execution = true;	 	
	
	     //html out to mail
	     $html_start = '<html><head><title>synctasks</title></head><body>';
		 $html_end = '</body></html>';	   
	     $execbin = remote_paramload('RCUTASKS','binsyncfile',$this->path);
	     if (!$execbin) 
	       return($html_start.'<h2>Sevice Deactivated!</h2>'.$html_end);
    }
	else { 
	     //no html web exec
	     $html_start = null;
		 $html_end = null; 		 
	}			
	
	// set the default timezone to use. Available since PHP 5.1
    date_default_timezone_set('GMT'); //btpass server time
		
    $date_now = date('Y-m-d H:i:s');
	$mk_now = mktime();
	if ($this->dst)
	  $mk_now += 60*60; //+1 hour
	//time now - (-6)=time now +6 or time now - (6)
	//$mk_now_gmt = $mk_now - (intval($this->server_gmt) * 60 * 60); //server tmz became gmt mean time
	$mk_now_gmt = $mk_now - date('Z');//auto server offset val = 0 when GMT

				
    //select active tasks	   
    $sSQL = "select tid,tdate,taskdate,taskstart,iscritical,criticalval,taskend,taskuser,taskname,tasktext,taskhtml,taskattach,hasinvoice,invcost,invitems,invitemsqty,";
    $sSQL.= "invname,invlist,mustpay,iscartproduct,reqreply,reqttl,reqname,reqlist,hasapp,appname,applist,gotopriority,hasschedule,schtype,schtimes,schcount,";
    $sSQL.= "hasinform,inftype,inftimes,infcount,hassubscribers,subscribers,hasdbsubs,hasremotefiles,remotefiles,nomos,instantdnload,ispublicdir,isuserdir,hasuseterms,tactive,tstatus,treply,";
    $sSQL.= "tindex,tcustdata,tparams,tmz from utasks ";
    $sSQL.= " where tactive=1";// and taskstart<='". $date_now."'";;
    //$msg .=  $sSQL;	   
    $result = $db->Execute($sSQL,2);
    //$msg .= print_r($result,1); 
	reset($result);
    if (!empty($result)) {
      $i=0; $j=0;
      foreach ($result as $n=>$rec) {
	  
		//task tmz
		$tmz = explode(':',$rec['tmz']); 		
	    $mk_cln_tmz = intval($tmz[0]) * 60 * 60;//client tmz - hours * min * sec
        //time to check for task...gmt time +/- tmz of task
		$mk_task = $mk_now_gmt + $mk_cln_tmz;
		
        $msgloop  = '-------------------------------------------------------------------------------------------------------<br>';//null; 		
		$msgloop .= "Server Time      :" . date('Y-m-d H:i:s') . "<br>";
		$msgloop .= "GMT Time         :" . date('Y-m-d H:i:s',$mk_now_gmt) . "<br>";
		$msgloop .= "Local Time       :" . date('Y-m-d H:i:s',$mk_task) . "<br>";		
		$msgloop .= "Task Start Time  :" . $rec['taskstart'] . "<br>";
		$msgloop .= "Task End Time  :" . $rec['taskend'] . "<br>";		
		$msgloop .= "Last Run         :" . date('Y-m-d H:i:s',intval($rec['tparams'])) . "<br>";						
        
        $msgloop .= '-------------------------------------------------------------------------------------------------------<br>';//null;    
		//$msg .= print_r($rec,1);
        $msgloop .= '<br>'.$rec['tid'];
		
		//convert taskstart to datestamp
		$ts = date_parse($rec['taskstart']);
		$mk_ts = mktime($ts['hour'],$ts['minute'],$ts['second'],$ts['month'],$ts['day'],$ts['year']);
		
		//MAIN TIME CHECK..REPLACED SQL DATE COMPARE
		if ($mk_ts<=$mk_task) {//compare in timestamp
		//if ($rec['taskstart']<=date('Y-m-d H:i:s',$mk_task)) {
		
		  $msgloop .= "EXECUTED<br>";	
        
          //execute the task 
          if (isset($rec['taskhtml'])) {
             $msgloop .= "<br>-------------- Html body ------------<br>";   
             $body = $this->create_mail_body($rec['tid'],$rec['taskhtml'],$rec['tasktext'],
		                                     $rec['reqreply'],$rec['reqname'],$rec['gotopriotity'],
				  						     $rec['taskuser'],$rec['tindex']);
          }
          else {
             $msgloop .= "<br>-------------- Text body ------------<br>";		
             $body = $rec['tasktext'];//plain text                   
          }  
		  //echo body
		  //$msgloop .=  '<iframe src =\"'.'\" width=\"100%\" height=\"500px\"><p>Your browser does not support iframes.</p></iframe>';
		  //$msgloop .= '<textarea rows="20" cols="60">'.$body.'</textarea>';
		  //$msgloop .= $body;
		  $show_msg_body_only_to_admin = $body;
        
          //$msg .= $this->send_to_users($rec,$body);         
        
          if ($rec['reqreply']) {
            $msgloop .= $this->update_user_reply($rec['tid']); 
          }        
          if ($rec['hasinvoice']) {
            $msgloop .= $this->set_invoice($rec['tid'],$rec); 
          }
          if ($rec['hasremotefiles']) {
            $msgloop .= $this->set_remotefiles($rec['tid'],$rec);         
          }         
          if ($rec['hasapp']) {
            $msgloop .= $this->set_application($rec['appname']);         
          }      
          if ($rec['hasschedule']) {
            $msgloop .= $this->set_scheduler($mk_task,$rec['tid'],$rec);         
          }          
          if ($rec['hasinform']) {
            $msgloop .= $this->set_informer($mk_task,$rec['tid'],$rec);         
          } 
          /*if ($rec['hassubscribers']) {
		    if (($this->scheduler_allow_execution) || ($this->informer_allow_execution)) 
              $msgloop .= $this->send_to_subscribers($rec,$body);        
          }                 
          if ($rec['hasdbsubs']) {
		    if (($this->scheduler_allow_execution) || ($this->informer_allow_execution)) 
              $msgloop .= $this->send_to_mydbsubs($rec,$body);
          }*/
        
          $datatset[] = $rec['tid'];//?????
        
          //get basic purpose.....after check state then disable ...???
		  //check repeating inside to deactivate or not
 	      $s = $this->deactivate_task($rec['tid'],$rec);
		  $msgloop .= $s?'DEACTIVATED<br>':'ACTIVATED<br>';    
		
		
		  if ((($this->scheduler_allow_execution) && ($this->informer_allow_execution)) || 
		      (($this->scheduler_allow_execution) xor ($this->informer_allow_execution))) {		  		  
		    //send mail to users
            $msgloop .= $this->send_to_users($rec,$body);  
            if ($rec['hasdbsubs']) 
              $msgloop .= $this->send_to_mydbsubs($rec,$body);
            if ($rec['hasdbsubs']) 
              $msgloop .= $this->send_to_mydbsubs($rec,$body);			  					
		  
			$msgloop.= $this->task_executed($mk_task,$rec['tid'],$rec);
			
            //send mail to host company 		  
		    $msgloop.= $this->send_to_administrator($rec,$msgloop.$show_msg_body_only_to_admin);  
		  
		    $j+=1;               
          }//scheduler - informer
		}//date check
		     
        $i+=1;
		//print_r($rec);
		$msg .= $msgloop . '<br>';	   
      }    	
    }

    $ret .= str_replace('<br>','<br/>',$msg) . "<br>Tasks readed:[$i] <br> Tasks Executed:[$j]<br>Sync Tasks Finished!";
    return ($html_start.$ret.$html_end);
}

function task_executed($time,$recid,$rec) {
    $db = GetGlobal('db');	

    $msg = "<br>-------------- Task executed at ".date('Y-m-d H:i:s',$time)." ------------<br>";  
	
	//update tparams as last run
    $sSQL = "update utasks set tparams='$time' where tid=" . $recid; 
    //echo $sSQL;
    $msg .= $sSQL;
    $ret = $db->Execute($sSQL,1); 
		
    if ($db->Affected_Rows()) {
      $msg .= "<br>TRUE<br>";
    }	  
    else 
      $msg .= "<br>FALSE<br>";	
	
	return ($msg);
}

function set_invoice($recid,$rec) {

    $msg = "<br>-------------- Has Invoice ------------<br>";  
    $msg .= "Name:" . $rec['invname'] ."-List:" . $rec['invlist'] ."-Must Pay:" . $rec['mustpay'] . "<br>"; 
    $msg .= "Cost:" . $rec['invcost'] ."-Items:" . $rec['invitems'] ."-Qty:" . $rec['invitemsqty'] . "<br>"; 
	
	if ($rec['tstatus']==2)
	 $msg .= "NOT PAID!";
	elseif ($rec['tstatus']>20)
	 $msg .= "PAID!";   
	    
    return ($msg);
}

function set_application($appname) {
    $db = GetGlobal('db');
    
    //update application 
    $msg = "<br>-------------- Update application ------------<br>"; 
    $msg .= "App Type:" . $rec['appname'] ."-App Name:" . $rec['applist'];
	
	if ($rec['tstatus']==3)
	 $msg .= "APPLICABLE!";
	else
	 $msg .= "NOT APPLICABLE!"; 
	 	 	   
    return ($msg);
}


function set_remotefiles($recid,$rec) {

    $msg = "<br>-------------- Has Remote Files ------------<br>";  
    $msg .= str_replace(';','<br>',$rec['remotefiles']);
	
	if ($rec['tstatus']==4)
	 $msg .= "RECEIVED!";
	else
	 $msg .= "NOT RECEIVED!";  	 
    
    return ($msg);
}

function set_informer($time,$recid,$rec) {
    $db = GetGlobal('db');	
    
    if ($seconds = $rec['inftype']) {    
	
	  $this->informer_allow_execution = false; //if informer exist by default not aloow execution	
	
      $msg = "<br>-------------- Update informer ------------<br>"; 
      //change data by add number of secs (year/month/day/min) 
      
      if ($rec['infcount']<$rec['inftimes']) {
		
		//convert taskend to datestamp
		$ts = date_parse($rec['taskend']);
		$time_toend = mktime($ts['hour'],$ts['minute'],$ts['second'],$ts['month'],$ts['day'],$ts['year']);				
		
		$inf_time_tostart = $time_toend - (($rec['inftimes']-$rec['infcount'])*$seconds);
		//$time_last = $rec['tparams']?intval($rec['tparams']):0;
		$msg .= "UNTIL " . date('Y-m-d H:i:s',$inf_time_tostart) . "...<br>";						
			  
	    $time_now = $time;		
		$time_inbetween = $time_now - $inf_time_tostart;
		$infcount = $rec['infcount']+1;
		
		if ($time_now>=$inf_time_tostart) {
		//if ($time_inbetween>=0) {//$seconds)  {
		   //add count by 
		   $sSQL = "update utasks set infcount=$infcount where tid=" . $recid; 
           //echo $sSQL;
           $msg .= $sSQL;
           $ret = $db->Execute($sSQL,1); 
		
           if ($db->Affected_Rows()) {
             $msg .= "<br>TRUE<br>";
			 $this->informer_allow_execution = true;
		   }	  
           else 
             $msg .= "<br>FALSE<br>";		   
		} 
		else
		  $msg .= "<br>SLEEPING...<br>";				
     }
   }   
   return ($msg);
}

function set_scheduler($time,$recid,$rec) {
    $db = GetGlobal('db');
    
    if ($seconds = $rec['schtype']) {    
	
	  $this->scheduler_allow_execution = false; //if sceduler exist by default not aloow execution	
	
      $msg = "<br>-------------- Update scheduler ------------<br>"; 
      //change data by add number of secs (year/month/day/min) 
      
      if ($rec['schcount']<$rec['schtimes']) {		
			  
	    $time_now = $time;
		$time_last = $rec['tparams']?intval($rec['tparams']):0;
		$time_inbetween = $time_now - $time_last;
		$msg .= "UNTIL " . date('Y-m-d H:i:s',$time_last+$seconds) . "...<br>";
		$schcount = $rec['schcount']+1;
		//$msg .= '<<<<<<<<<<'.$time_inbetween.'-----'.$time_now.'>>>>>>>>>>>><br>';
		
		if ($time_inbetween>=$seconds)  {
		   //add count by 1....
		   $sSQL = "update utasks set schcount=$schcount where tid=" . $recid; 
           //echo $sSQL;
           $msg .= $sSQL;
           $ret = $db->Execute($sSQL,1); 
		
           if ($db->Affected_Rows()) {
             $msg .= "<br>TRUE<br>";
			 $this->scheduler_allow_execution = true;
		   }	  
           else 
             $msg .= "<br>FALSE<br>";		   
		} 
		else
		  $msg .= "<br>SLEEPING...<br>";		
     }   
   }  
   return ($msg);
}

function update_user_reply($recid) {
        $db = GetGlobal('db');       

        $msg = "<br>-------------- Update reply ------------<br>";//moved to user side scripts
        //$sSQL = "update utasks set treply=1 where tid=".$recid; 
        //$r = $db->Execute($sSQL,1); 
        
        return ($msg);
}

function send_to_users($rec,$what) {

       $cdata = explode(';',$rec['tcustdata']);
       $dummy_export = array_pop($cdata);     
       $task_customer_mail = array_pop($cdata);         
       
       $task_usermail = $rec['taskuser'];

       $msg = "<br>-------------- Send to users & company ------------<br>";
       //send to customer official mail
       $mailerror = $this->send_task_mail($task_customer_mail,'['.$rec['tid'].']'.$rec['taskname'],$what); 
       $msg .= "<br>".$task_customer_mail ." ". strip_tags($mailerror);         
       //send to original user
       if ($task_customer_mail!=$task_usermail) {
         $mailerror = $this->send_task_mail($task_usermail,'['.$rec['tid'].']'.$rec['taskname'],$what); 
         $msg .= "<br>" .$task_usermail." ". strip_tags($mailerror);  
       } 
       
       return ($msg);
}

function send_to_subscribers($rec,$what) {

       if (($rec['hassubscribers']) && ($rec['subscribers'])) {        
         $msg = "<br>-------------- Send to subscribers ------------<br>";       
         if (stristr($rec['subscribers'],';')) {
           $to = explode(';',$rec['subscribers']); 
         }
         else
           $to = $rec['subscribers'];
         
         if ($to) {   
		   if (is_array($to)) {
		     foreach ($to as $r=>$subscriber) {
               $mailerror[] = $this->send_task_mail($subscriber,'['.$rec['tid'].']'.$rec['taskname'],$what);
               $msg .= $subscriber.'<br>';
			 }   		   
		   }
		   else { 
             $mailerror = $this->send_task_mail($to,'['.$rec['tid'].']'.$rec['taskname'],$what);
             $msg .= $to.'<br>';
		   }
		   
           if (is_array($mailerror)) {
             foreach ($mailerror as $receiver=>$error)
             $msg .= "<br>$receiver...".strip_tags($error);
           }
           else
             $msg .= "<br>" . strip_tags($mailerror);         
         }    
       } 
       return ($msg);       
}

function send_to_mydbsubs($rec,$what) {
         
       if ($rec['hasdbsubs']) {         
         $taskmsg = "<br>-------------- Send to database subscribers ------------<br>";
         $mydbsubs = $this->getuserssubscribersmail();
         //echo $mydbsubs;
         if (stristr($mydbsubs,';')) {
           $tosubs = explode(';',$mydbsubs); 
           //print_r($tosubs);
         }
         else
           $tosubs = $mydbsubs;
         
         if ($tosubs) {   
           $mailerror = $this->send_task_mail($tosubs,'['.$rec['tid'].']'.$rec['taskname'],$what);         
           $taskmsg .= '<br>' .$tosubs.'<br>';
           if (is_array($mailerror)) {
             //print_r($mailerror);
             foreach ($mailerror as $receiver=>$error)
              $taskmsg .= "<br>$receiver...".strip_tags($error);
           }
           else
             $taskmsg .= "<br>" . strip_tags($mailerror);        
         }
       } 
       return ($taskmsg);
}

function send_to_administrator($rec,$what) {

          $taskmsg = "<br>-------------- Send to administrator ------------<br>";

          //send mail to host company
          $hostmail = $this->informhostcomp?$this->informhostcomp:'support@stereobit.net';
          $mailerror = $this->send_task_mail($hostmail,'['.$rec['tid'].']'.$rec['taskname'],$what);//send msg log as mail to host comp and subs mails 
          $taskmsg .= "<br>" .$hostmail.' '. strip_tags($mailerror); 
		  
          return ($taskmsg);		  
}
	
};
}
?>