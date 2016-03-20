<?php

$__DPCSEC['RCCONTROLPANEL_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("RCCONTROLPANEL_DPC")) && (seclevel('RCCONTROLPANEL_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCONTROLPANEL_DPC",true);

$__DPC['RCCONTROLPANEL_DPC'] = 'rccontrolpanel';

$a = GetGlobal('controller')->require_dpc('libs/appkey.lib.php');
require_once($a);
 
$__EVENTS['RCCONTROLPANEL_DPC'][0]='cp';
$__EVENTS['RCCONTROLPANEL_DPC'][1]='cplogout';
$__EVENTS['RCCONTROLPANEL_DPC'][2]='cplogin';
$__EVENTS['RCCONTROLPANEL_DPC'][3]='cpinfo';
$__EVENTS['RCCONTROLPANEL_DPC'][4]='cpchartshow';
$__EVENTS['RCCONTROLPANEL_DPC'][5]='cpmenushow';
$__EVENTS['RCCONTROLPANEL_DPC'][6]='cpgaugeshow';
$__EVENTS['RCCONTROLPANEL_DPC'][7]='cpzbackup';

$__ACTIONS['RCCONTROLPANEL_DPC'][0]='cp';
$__ACTIONS['RCCONTROLPANEL_DPC'][1]='cplogout';
$__ACTIONS['RCCONTROLPANEL_DPC'][2]='cplogin';
$__ACTIONS['RCCONTROLPANEL_DPC'][3]='cpinfo';
$__ACTIONS['RCCONTROLPANEL_DPC'][4]='cpchartshow';
$__ACTIONS['RCCONTROLPANEL_DPC'][5]='cpmenushow';
$__ACTIONS['RCCONTROLPANEL_DPC'][6]='cpgaugeshow';
$__ACTIONS['RCCONTROLPANEL_DPC'][7]='cpzbackup';

$__DPCATTR['RCCONTROLPANEL_DPC']['cp'] = 'cp,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCCONTROLPANEL_DPC'][0]='RCCONTROLPANEL_DPC;Control Panel;Control Panel';
$__LOCALE['RCCONTROLPANEL_DPC'][1]='_BACKCP;Back;Επιστροφή';
$__LOCALE['RCCONTROLPANEL_DPC'][2]='_DASHBOARD;CP Dashboard;Πινακας Ελεγχου';
$__LOCALE['RCCONTROLPANEL_DPC'][3]='_MENU;General info;Βασικές πληροφορίες';
$__LOCALE['RCCONTROLPANEL_DPC'][4]='_statisticscat;Category Viewed/Month;Επισκεψιμότητα κατηγοριών';
$__LOCALE['RCCONTROLPANEL_DPC'][5]='_statistics;Items Viewed/Month;Επισκεψιμότητα ειδών';
$__LOCALE['RCCONTROLPANEL_DPC'][6]='_transactions;Transaction/Month;Συναλλαγές ανα μήνα';
$__LOCALE['RCCONTROLPANEL_DPC'][7]='_applications;Applications Birth/Month;Νεές εφαρμογές ανα μήνα';
$__LOCALE['RCCONTROLPANEL_DPC'][8]='_appexpires;Applications Expires/Month;Ληξεις εφαρμογών ανα μήνα';
$__LOCALE['RCCONTROLPANEL_DPC'][9]='_mailqueue;Mail send/Month;Σταλθέντα e-mail ανα μήνα';
$__LOCALE['RCCONTROLPANEL_DPC'][10]='_mailsendok;Mail Received/Month;Παρεληφθέντα e-mail ανα μήνα';
$__LOCALE['RCCONTROLPANEL_DPC'][11]='_income;Income;Εισόδημα';
$__LOCALE['RCCONTROLPANEL_DPC'][12]='_moretrans;All transactions;Όλες οι συναλλαγές';

//cpmdbrec commands
$__LOCALE['RCCONTROLPANEL_DPC'][13]='_awstats;Web statistics;Στατιστικά';
$__LOCALE['RCCONTROLPANEL_DPC'][14]='_google_analytics;Google Analytics;Στατιστικά Google';
$__LOCALE['RCCONTROLPANEL_DPC'][15]='_siwapp;Siwapp;Siwapp τιμολόγηση';
$__LOCALE['RCCONTROLPANEL_DPC'][16]='_MENU1;Size;Μέγεθος';
$__LOCALE['RCCONTROLPANEL_DPC'][17]='_MENU2;People;Συναλλασόμενοι';
$__LOCALE['RCCONTROLPANEL_DPC'][18]='_MENU3;Photos & attachments;Φωτογραφίες και έγγραφα';
$__LOCALE['RCCONTROLPANEL_DPC'][19]='_MENU4;Inventory;Αποθήκη';
$__LOCALE['RCCONTROLPANEL_DPC'][20]='_MENU5;Synchronize;Συγχρονισμοί';
$__LOCALE['RCCONTROLPANEL_DPC'][21]='_MENU6;Newsletters;Αποστολές';
$__LOCALE['RCCONTROLPANEL_DPC'][22]='_MENU7;Orders;Κινήσεις';
$__LOCALE['RCCONTROLPANEL_DPC'][23]='_add_categories;Upload Categories;Εισαγωγή κατηγοριών';
$__LOCALE['RCCONTROLPANEL_DPC'][24]='_add_products;Upload Products;Εισαγωγή ειδών';

$__LOCALE['RCCONTROLPANEL_DPC'][25]='_google_addwords;Google Adwords;Google Adwords';
$__LOCALE['RCCONTROLPANEL_DPC'][26]='_upload_logo;Upload logo;Αλλαγή λογοτύπου';
$__LOCALE['RCCONTROLPANEL_DPC'][27]='_add_recaptcha;ReCaptcha;ReCaptcha';
$__LOCALE['RCCONTROLPANEL_DPC'][28]='_update;Update;Αναβάθμιση';
$__LOCALE['RCCONTROLPANEL_DPC'][29]='_backup;Backup;Αποθήκευση δεδομένων';
$__LOCALE['RCCONTROLPANEL_DPC'][30]='_backup_content;Backup contents;Αποθήκευση στοιχείων';
$__LOCALE['RCCONTROLPANEL_DPC'][31]='_maildbqueue;Newsletters & mailing lists;Μαζικές αποστολές e-mails';
$__LOCALE['RCCONTROLPANEL_DPC'][32]='_sendnewsletters;Enable newsletter mailing list feature;Ενεργοποίηση μαζικών αποστολών e-mails';
$__LOCALE['RCCONTROLPANEL_DPC'][33]='_TWEETSRSS;Feeds & tweets;Ενημέρωση';
$__LOCALE['RCCONTROLPANEL_DPC'][34]='_add_domainname;Domain name;Domain name';
$__LOCALE['RCCONTROLPANEL_DPC'][35]='_customers;Customers;Πελάτες';
$__LOCALE['RCCONTROLPANEL_DPC'][36]='_installeshop;Install e-shop;Εγκατάσταση e-shop';
$__LOCALE['RCCONTROLPANEL_DPC'][37]='_uninstalleshop;Uninstall e-shop;Κατάργηση e-shop';
$__LOCALE['RCCONTROLPANEL_DPC'][38]='_eshop;e-shop module;e-shop πρόσθετο';
$__LOCALE['RCCONTROLPANEL_DPC'][39]='_install;Install;Εγκατάσταση';
$__LOCALE['RCCONTROLPANEL_DPC'][40]='_ckfinder;CKfinder;CKfinder';
$__LOCALE['RCCONTROLPANEL_DPC'][41]='_jqgrid;JQgrid;JQgrid';
$__LOCALE['RCCONTROLPANEL_DPC'][42]='_ieditor;IEditor;IEditor';
$__LOCALE['RCCONTROLPANEL_DPC'][43]='_addons;Addons;Πρόσθετα';
$__LOCALE['RCCONTROLPANEL_DPC'][44]='_edit_htmlfiles;Edit system files;Επεξεργασία αρχείων συστήματος';
$__LOCALE['RCCONTROLPANEL_DPC'][45]='_addspace;Limited space, add space;Πρόσθεσε χωρητικότητα';
$__LOCALE['RCCONTROLPANEL_DPC'][46]='_ago;after expiration;που έληξε';
$__LOCALE['RCCONTROLPANEL_DPC'][47]='_fromnow;before expire;πρίν τη λήξη';
$__LOCALE['RCCONTROLPANEL_DPC'][48]='_modified;modified;Ενημερώθηκε';
$__LOCALE['RCCONTROLPANEL_DPC'][49]='_ago2;ago;πρίν';
$__LOCALE['RCCONTROLPANEL_DPC'][50]='_fromnow2;from now;μετά';
$__LOCALE['RCCONTROLPANEL_DPC'][51]='_cpimages;Update icons;Ενημέρωση εικονιδίων';
$__LOCALE['RCCONTROLPANEL_DPC'][52]='_addkey;Add key;Εισαγωγή κλειδιού';
$__LOCALE['RCCONTROLPANEL_DPC'][53]='_genkey;Gen key;Δημιουργία κλειδιού';
$__LOCALE['RCCONTROLPANEL_DPC'][54]='_validatekey;Validate key;Έλεγχος κλειδιού';
$__LOCALE['RCCONTROLPANEL_DPC'][55]='_desendnewsletters;Uninstall newsletter feature;Απεγκατάσταση μαζικών αποστολών e-mails';
$__LOCALE['RCCONTROLPANEL_DPC'][56]='_newsletters;Newsletter feature installed;Αποστολή e-mails εγκατεστημένο';
$__LOCALE['RCCONTROLPANEL_DPC'][57]='_year;Year;Έτος';
$__LOCALE['RCCONTROLPANEL_DPC'][58]='_month;Month;Μήνας';
$__LOCALE['RCCONTROLPANEL_DPC'][59]='_more;More...;Περισσότερα...';

$__LOCALE['RCCONTROLPANEL_DPC'][60]='_exit;Exit;Έξοδος';
$__LOCALE['RCCONTROLPANEL_DPC'][61]='_dashboard;Dashboard;Πίνακας ελέγχου';
$__LOCALE['RCCONTROLPANEL_DPC'][62]='_logout;Logout;Αποσύνδεση';
$__LOCALE['RCCONTROLPANEL_DPC'][63]='_rssfeeds;RSS Feeds;RSS Feeds';
$__LOCALE['RCCONTROLPANEL_DPC'][64]='_edititemtext;Edit Item Text;Μεταβολή κειμένου';// (text) αντικειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][65]='_deleteitemattachment;Delete Item Attachment;Διαγραφή συνημμένου';// είδους';
$__LOCALE['RCCONTROLPANEL_DPC'][66]='_editcat;Edit Category;Μεταβολή κατηγορίας';
$__LOCALE['RCCONTROLPANEL_DPC'][67]='_addcat;Add Category;Νέα Κατηγορία';
$__LOCALE['RCCONTROLPANEL_DPC'][68]='_additem;Add Item;Νέο Είδος';
$__LOCALE['RCCONTROLPANEL_DPC'][69]='_webstatistics;Statistics;Στατιστικά';
$__LOCALE['RCCONTROLPANEL_DPC'][70]='_addcathtml;Add Category Html;Προσθήκη κειμένου';// κατηγορίας';
$__LOCALE['RCCONTROLPANEL_DPC'][71]='_editcathtml;Edit Category Html;Μεταβολή κειμένου';// κατηγορίας';
$__LOCALE['RCCONTROLPANEL_DPC'][72]='_edititem;Edit Item;Μεταβολή είδους';// αντικειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][73]='_edititemphoto;Edit Photo;Μεταβολή φωτογραφίας';// αντικειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][74]='_edititemdbhtm;Edit Item Htm;Μεταβολή κειμένου';// (htm) αντικειμένου (db)';
$__LOCALE['RCCONTROLPANEL_DPC'][75]='_edititemdbhtml;Edit Item Html;Μεταβολή κειμένου';// (html) αντικειμένου (db)';
$__LOCALE['RCCONTROLPANEL_DPC'][76]='_edititemdbtext;Edit Item Text;Μεταβολή κειμένου';// (text) αντικειμένου (db)';
$__LOCALE['RCCONTROLPANEL_DPC'][77]='_senditemmail;Send e-mail;Αποστολή e-mail';
$__LOCALE['RCCONTROLPANEL_DPC'][78]='_delitemattachment;Delete Text;Διαγραφή κειμένου';// (db)';
$__LOCALE['RCCONTROLPANEL_DPC'][79]='_edititemtext;Edit Item Text;Μεταβολή κειμένου';// (text) αντικειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][80]='_edititemhtm;Edit Item Htm;Μεταβολή κειμένου';// (htm) αντικειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][81]='_edititemhtml;Edit Item Html;Μεταβολή κειμένου';// (html) αντικειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][82]='_additemhtml;Add Item Html;Εισαγωγή κειμένου';// στο αντικείμενο';
$__LOCALE['RCCONTROLPANEL_DPC'][83]='_transactions;Transactions;Συναλλαγές';
$__LOCALE['RCCONTROLPANEL_DPC'][84]='_users;Users;Χρήστες';
$__LOCALE['RCCONTROLPANEL_DPC'][85]='_itemattachments2db;Add Items to DB;Μεταφορά κειμένων στην Β.Δ.';//βάση δεδομένων';
$__LOCALE['RCCONTROLPANEL_DPC'][86]='_importdb;Import Database;Εισαγωγή βάσης δεδομένων';
$__LOCALE['RCCONTROLPANEL_DPC'][87]='_config;Configuration;Ρυθμίσεις';
$__LOCALE['RCCONTROLPANEL_DPC'][88]='_contactform;Contact Form;Φόρμα επικοινωνίας';
$__LOCALE['RCCONTROLPANEL_DPC'][89]='_subscribers;Subscribers;Συνδρομητές';
$__LOCALE['RCCONTROLPANEL_DPC'][90]='_sitemap;Sitemap;Χάρτης πλοήγησης';// αντικειμένων';
$__LOCALE['RCCONTROLPANEL_DPC'][91]='_search;Search;Φόρμα Αναζήτησης';
$__LOCALE['RCCONTROLPANEL_DPC'][92]='_upload;Upload files;Ανέβασμα αρχείων';
$__LOCALE['RCCONTROLPANEL_DPC'][93]='_uploadid;Upload item files;Ανέβασμα αρχείων';// αντικειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][94]='_uploadcat;Upload category files;Ανέβασμα αρχείων';// κατηγορίας';
$__LOCALE['RCCONTROLPANEL_DPC'][95]='_syncphoto;Sync photos;Συγχρονισμός φωτογραφιών';
$__LOCALE['RCCONTROLPANEL_DPC'][96]='_syncsql;Sync data;Συγχρονισμός δεδομένων';
$__LOCALE['RCCONTROLPANEL_DPC'][97]='_dbphoto;Image in DB;Εικόνα στην βάση δεδομένων';
$__LOCALE['RCCONTROLPANEL_DPC'][98]='_editctag;Category Tags;Tags κατηγορίας';
$__LOCALE['RCCONTROLPANEL_DPC'][99]='_edititag;Item Tags;Tags είδους';
$__LOCALE['RCCONTROLPANEL_DPC'][100]='_menu;Menu;Επιλογές';
$__LOCALE['RCCONTROLPANEL_DPC'][101]='_slideshow;Slideshow;Επιλογές Slideshow';
$__LOCALE['RCCONTROLPANEL_DPC'][102]='_ckfinder;Upload files;Upload αρχείων';
$__LOCALE['RCCONTROLPANEL_DPC'][103]='_webmail;Web Mail;Web Mail';
$__LOCALE['RCCONTROLPANEL_DPC'][104]='_editpage;Edit Page;Επεξεργασία σελίδας';
$__LOCALE['RCCONTROLPANEL_DPC'][105]='_rempass;Forgotten password;Υπενθύμιση κωδικού';
$__LOCALE['RCCONTROLPANEL_DPC'][106]='_chpass;Change password;Αλλαγή κωδικού';
$__LOCALE['RCCONTROLPANEL_DPC'][107]='_cphelp;Ηelp;Βοήθεια';
$__LOCALE['RCCONTROLPANEL_DPC'][108]='_cpupgrade;Upgrade;Αναβάθμιση';
$__LOCALE['RCCONTROLPANEL_DPC'][109]='_cpwizard;Enable wizard;Οδηγός εγκατάστασης';
$__LOCALE['RCCONTROLPANEL_DPC'][110]='_cpdhtmlon;Windows mode;Πλοήγηση Windows';
$__LOCALE['RCCONTROLPANEL_DPC'][111]='_cpdhtmloff;Frames mode;Πλοήγηση Frames';
$__LOCALE['RCCONTROLPANEL_DPC'][112]='_cpcropwiz;Crop wizard;Crop wizard';
$__LOCALE['RCCONTROLPANEL_DPC'][113]='_OPTIONS;Options;Επιλογές';
$__LOCALE['RCCONTROLPANEL_DPC'][114]='_ADD;Add;Προσθήκη';
$__LOCALE['RCCONTROLPANEL_DPC'][115]='_CATEGORY;Category;Κατηγορία';
$__LOCALE['RCCONTROLPANEL_DPC'][116]='_ITEM;Item;Είδος';
$__LOCALE['RCCONTROLPANEL_DPC'][117]='_SETTINGS;Settings;Ρυθμίσεις';
$__LOCALE['RCCONTROLPANEL_DPC'][118]='_customers;Customers;Πελάτες';
$__LOCALE['RCCONTROLPANEL_DPC'][119]='_EDITHTML;Edit Html;Σελίδες Html';
$__LOCALE['RCCONTROLPANEL_DPC'][120]='_SELECTHTML;Select Html;Επιλογή Html';
$__LOCALE['RCCONTROLPANEL_DPC'][121]='_ADDFAST;Add item;Εισαγωγή είδους';
$__LOCALE['RCCONTROLPANEL_DPC'][122]='_addtag;Add Tag;Εισαγωγή Ετικέτας';
$__LOCALE['RCCONTROLPANEL_DPC'][123]='_back;Back;Επιστροφή';
$__LOCALE['RCCONTROLPANEL_DPC'][124]='_mailqueue;Mail queue;Μαζικές Αποστολές';
$__LOCALE['RCCONTROLPANEL_DPC'][125]='_ENTITIES;Entities;Στοιχεία';
$__LOCALE['RCCONTROLPANEL_DPC'][126]='_categories;Sections;Κατηγορίες';
$__LOCALE['RCCONTROLPANEL_DPC'][127]='_items;Items;Αντικείμενα';
$__LOCALE['RCCONTROLPANEL_DPC'][128]='_configmenu;Config menu;Ρυθμίσεις menu';
$__LOCALE['RCCONTROLPANEL_DPC'][129]='_xmlfeeds;XML feeds;XML feeds';
$__LOCALE['RCCONTROLPANEL_DPC'][130]='_dynsql;SQL Syncs;Συγχρονισμοί';
$__LOCALE['RCCONTROLPANEL_DPC'][131]='_bmailqueue;Mail queue;Διανομές';
$__LOCALE['RCCONTROLPANEL_DPC'][132]='_bmailqueueadd;Subscribers;Εισαγωγή';
$__LOCALE['RCCONTROLPANEL_DPC'][133]='_bmailsend;Send;Αποστολή';
$__LOCALE['RCCONTROLPANEL_DPC'][134]='_bmail;e-Mail;e-Mail';
$__LOCALE['RCCONTROLPANEL_DPC'][135]='_bmailstats;Statistics;Στατιστική';
$__LOCALE['RCCONTROLPANEL_DPC'][136]='_bmailcamp;Campaigns;Θέματα';
$__LOCALE['RCCONTROLPANEL_DPC'][137]='_ITEMCOLLECTION;Select items;Επιλογή ειδών';
$__LOCALE['RCCONTROLPANEL_DPC'][138]='_GNAVAL;Empty;Μη διαθέσιμο';

class rccontrolpanel {

	var $title,$cmd,$subpath,$path,$dbpath,$prpath;
	var $dashboard, $cp0_tabtype, $cpn_tabtype;
	
	var $charts, $hasgraph, $goto, $ajaxgraph, $refresh, $objcall, $objgauge, $hasgauge;
	var $charset;
	var $editmode;
	var $application_path;	
	var $environment, $url, $murl, $urlpath;
	var $dhtml, $tools, $has_eshop;
	var $appkey, $awstats_url;
	var $cptemplate, $stats, $cpStats;
	var $turl, $cpGet, $turldecoded, $messages;
	
	var $rootapp_path;
		
	function rccontrolpanel() {
		
	    $this->title = localize('RCCONTROLPANEL_DPC',getlocal());
        $this->urlpath = paramload('SHELL','urlpath');		
		$this->subpath = $this->urlpath . "/cp";
		//$this->prpath = paramload('SHELL','urlpath') . $this->subpath;//??		
		$this->path = paramload('SHELL','urlpath') . $this->subpath;   		
		//echo $this->path; global $config; print_r($config);
		$this->dbpath = paramload('SHELL','dbgpath');
		
		$this->prpath = paramload('SHELL','prpath');	
        $this->application_path = paramload('SHELL','urlpath');			
		//echo $this->prpath;
		
		$this->murl = arrayload('SHELL','ip');
        $this->url = $this->murl[0]; 			
		$this->editmode = GetReq('editmode');
		
        //choose encoding
        $char_set  = arrayload('SHELL','char_set');	  
        $charset  = paramload('SHELL','charset');	  		
		if (($charset=='utf-8') || ($charset=='utf8'))
		  $this->charset = 'utf-8';
		else  
	      $this->charset = $char_set[getlocal()]; 		
		
		
		$au = remote_paramload('RCCONTROLPANEL','autoupdate',$this->prpath);
        $this->autoupdate = $au?$au:3600;
		$this->dashboard = null;
		
		$this->ajaxgraph=1;
		$this->refresh = GetReq('refresh')?GetReq('refresh'):60;//0
		$this->goto = seturl('t=cp&group='.GetReq('group'));//handle graph selections with no ajax
		
        //READ ENVIRONMENT ATTR
		if ($_SESSION['LOGIN']=='yes')
			$this->environment = $_SESSION['env'] ? $_SESSION['env'] : $this->read_env_file(true);		
		//print_r($this->environment);
		
		//$this->load_graph_objects();
		
		//awstats cp window
        //$url = "cgi-bin/awstats.pl?config=".str_replace('www.','',$_ENV["HTTP_HOST"])."&framename=mainright#top";			   
		//get last murl element = site.stereobit.gr 
		$awurl = remote_paramload('RCAWSTATS','file',$this->prpath);
		$this->awstats_url = $awurl ? $awurl :
		                     ((!empty($this->murl)) ? array_pop($this->murl) : str_replace('www.','',$_ENV["HTTP_HOST"]));		
		
		$this->appkey = new appkey();	
		$this->rootapp_path = 'stereobi'; //XIX !!!!
		
		$this->messages = GetSessionParam('cpMessages') ? GetSessionParam('cpMessages') : array();
		$this->cptemplate = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->prpath); //metro !!!!
		
		$this->stats = array();
		$this->cpStats = false;
		/*if ($this->cptemplate) {
			//***$this->templatepanel(true); //always
			//$this->_show_update_tools();
			//$this->cpStats = $this->isStats();
		}*/		
	}
	 	
    function event($sAction) {    	  
	
	   /////////////////////////////////////////////////////////////
	   //if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	//re-login //!!!!
	   /////////////////////////////////////////////////////////////		
	   
	   //if (GetGlobal('login') || (GetSessionParam('LOGIN')=='yes')) {
		   
	   $this->autoupdate();	  //!!!!! 	  		  			      
  
	   switch ($sAction) {
	   
	     case 'cpzbackup' : break;
	   
		 /*case 'cpmenushow':  $this->hasmenu = $this->read_directory($this->path);
							 break; */
							 
		 case 'cpchartshow': if ($report = GetReq('report')) {//ajax call
		                       $this->hasgraph = GetGlobal('controller')->calldpc_method("swfcharts.create_chart_data use $report");
							   $this->goto = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report='.$report.'&statsid=');
							 }
							 break;
							 							 	   
		 /*case 'cpgaugeshow': if ($report = GetReq('report')) {//ajax call
		                       //$this->load_graph_objects();
		                       $this->hasgauge = GetGlobal('controller')->calldpc_method("swfcharts.create_gauge_data use $report+where cid=0++1+400+300+meter");
							   $this->goto = seturl('t=cpgaugeshow&group='.GetReq('group').'&ai=1&report='.$report.'&statsid=');
							 }
							 break;	*/   
	   	
         case "cplogout"    : $this->logout();
		                     break;
		 case "cplogin"     :$valid = $this->verify_login();
		                     //$this->javascript();							  
							
		 case "cpinfo"      :if (GetSessionParam('LOGIN')=='yes') {//ajax call
								$this->site_stats();  //run stats
								echo $this->cpinfo($_GET['s']);// .'>>>'. $_GET['s']; 
								die();
							 }
		                     break;
							 
		 case "cp"          :
		 default         	://if ($this->cptemplate) {
								$this->set_addons_list();
								$this->load_graph_objects();
		                     /*}
                             elseif (GetSessionParam('LOGIN')=='yes') { 
								//$this->javascript();	
								$this->read_directory($this->path);//echo $this->path;
							  
								//$this->load_graph_objects();
								$this->set_addons_list();
							 }*/
		                     break;				 
       } 
	   //}//if
    }
  
    function action($sAction) {
		   
	    switch ($sAction) {
		    
			case 'cpzbackup' : $out = $this->zip_directory(GetReq('zname'),GetReq('zpath'));
			                   break;
		  
		    /*case 'cpmenushow': if ($this->hasmenu) //ajax call
		                          //$out = $this->show_directory_iconstable(4,3);
								  $out = $this->ajax_menu(4,3);//,null,1); //xmlout
							    else
							      $out = "<h3>".localize('_GNAVAL',0)."</h3>";	

							    die('menu|'.$out); //ajax return
								break;	*/	  
		  
		    case 'cpchartshow': if ($this->hasgraph) {//ajax call
		                          $out = GetGlobal('controller')->calldpc_method("swfcharts.show_chart use " . GetReq('report') ."+500+240+$this->goto");								  
								}  
							    else
							      $out = "<h3>".localize('_GNAVAL',0)."</h3>";	

							    die(GetReq('report').'|'.$out); //ajax return
								break;
								
		    /*case 'cpgaugeshow': if ($this->hasgauge) {//ajax call
		                          $out = GetGlobal('controller')->calldpc_method("swfcharts.show_gauge use ". GetReq('report') ."+400+300");								  
								}  
							    else
							      $out = "<h3>".localize('_GNAVAL',0)."</h3>";	

							    die(GetReq('report').'|'.$out); //ajax return
								break;*/										  
		  	case "cpinfo"      : break;    
			case "cp"          :	
			default            : $this->getTURL(); //save param for use by metro cp
			
                      			 //if ($this->cptemplate) {
			                        //echo 'a'; //not always executed but ony ehwn in dashboard
									//if ((GetReq('t')=='cp')||(!GetReq('t'))) 
										//$this->templatepanel(); 
									$this->site_stats();
									$this->_show_update_tools();
									$this->_show_addon_tools();
									$this->cpStats = $this->isStats();
								 //}	
			                    /* else
									$out .= $this->controlpanel(4,3,$this->editmode); */
			  
		} 		 		  
	  //}  
	
	  return ($out);
    } 
	
	//save param for use by metro cp
	protected function getTURL() {
		$postedTURL = $_POST['turl'] ? $_POST['turl'] : $_GET['turl']; 
		
		if ($turl = $_SESSION['turl']) {//GetSessionParam('turl')) {
			$this->turl = $turl;
			$this->turldecoded = GetSessionParam('turldecoded');
			$this->cpGet = unserialize(base64_decode($_SESSION['cpGet']));			
			//echo 'insession:',print_r($_POST); print_r($this->cpGet);
			return true;
		} 
        //elseif ($_GET['turl']) { //for the first time in cp
		elseif ($postedTURL) {//a post from login screen
		    $this->turl = $postedTURL ;
			$this->turldecoded = str_replace('_&_', '_%26_', base64_decode($postedTURL)); 	
			$urlquery = parse_url($this->turldecoded); 
			parse_str($urlquery['query'], $getp); 	
			$this->cpGet = $getp;

			//echo $qquery;
			//print_r($urlquery);		
			//print_r($getp);
		
			SetSessionParam('turl', $postedTURL);		
			SetSessionParam('turldecoded', $this->turldecoded);
			SetSessionParam('cpGet', base64_encode(serialize($this->cpGet)));
			
			return true;	
	    }
		else {
			
		}
		
		return false;
	}
	/*
	function javascript() {
      if (iniload('JAVASCRIPT')) {
	  
		   $js = new jscript;	  
	        
		   //auto refresh
	       if ($refresh = $this->refresh)
             $code = $this->javascript_refresh(seturl('t=cp&refresh='.$refresh),$refresh*1000);  

           if ($this->ajaxgraph) {		   
	         $code .= $this->ajaxinitjscall();
		     $js->setloadparams("init();");//call menu ajax		   		   		   		   
		   }
		   
           $js->load_js($code,"",1);			   
		   unset ($js);		   
	  }	
	}
	
	function ajaxinitjscall() {
        $gotomenu = seturl('t=cpmenushow&group='.GetReq('group').'&ai=1&&statsid=');				
	
		$out = "
function init()
{		 
  sndReqArg('$gotomenu'+statsid.value,'menu'); 		
}		
";					
        return ($out);
	}
	
    function javascript_refresh($page,$timeout=null) {	 
	  
     $mytimeout=$timeout?$timeout:5000;//5 sec
     $mytimeout2=$timeout?$timeout+2000:7000;//5 sec
     
     if ($this->ajaxgraph) {
	   
	   if (!empty($this->objcall)) {
	     $i = 0;
	     foreach ($this->objcall as $report=>$goto) {
	       $timeout = $mytimeout + (++$i*1000); //set delay 
           $ret .= "window.setInterval(\"sndReqArg('$goto'+statsid.value,'$report')\",$timeout);
";	 
         }
	   }
	   if (!empty($this->objgauge)) {
	     $j = 0;
	     foreach ($this->objgauge as $report=>$goto) {
	       $timeout = $mytimeout + (++$j*1500); //set delay 
           $ret .= "window.setInterval(\"sndReqArg('$goto'+statsid.value,'$report')\",$timeout);
";	 
         }	 
	   }  
	 }
	 else {
       $ret = "
function neu()
{	
	top.frames.location.href = \"$page\"
}
window.setTimeout(\"neu()\",$mytimeout);
";
	 }
	 return ($ret);
    }	*/			  
	  
    protected function controlpanel($type=4,$linemax=3,$nav_off=null,$win_off=null) {
	 
		 $site_panel = $this->site_stats();
		   
		 $win1 = new window2(localize("_MENU",getlocal()),$site_panel,null,1,null,'SHOW',null,1);
	     $panel = $win1->render();
		 unset ($win1);		   


		 //multicolumn view	
		 
         //middle panel	..if dhtml show middle column else add in left panel					
		 $middle_panel =  ($this->dhtml) ?
		                  $this->_show_charts() . 
		                  $this->_show_gauges() :
						  null;
		 
		 //right panel
         $right_panel = $this->_show_addon_tools(true);
		 $right_panel .= ($this->dhtml) ? null : $this->_show_charts() . $this->_show_gauges();			   				
		 
		 //left panel
		 $left_panel = $this->_show_update_tools() . $panel;
		 //$left_panel .= ($this->dhtml) ? null : $this->_show_charts() . $this->_show_gauges();			   
		 $left_panel .= $this->_show_addons();
		 //$left_panel .= $this->_show_tweets_rss();
		 
	     $data1[] = $left_panel;
         $attr1[] = isset($right_panel) ? (isset($middle_panel) ? "left;35%" : "left;50%") : "left;100%";	    
		
		 if (isset($middle_panel)) { 
			$data1[] = $middle_panel;
			$attr1[] = isset($right_panel) ? "left;30%" : "left;50%";
		 }
		
		 if (isset($right_panel)) { 
			$data1[] = $right_panel;//$stats;//ts			
			$attr1[] = isset($middle_panel) ? "left;35%" : "left;50%";
		 }
		 
	     $swin = new window(localize("_DASHBOARD",getlocal()),$data1,$attr1);
	     $out .= $swin->render("center::100%::0::::center::0::2::");		 
	     //$swin = new window("Control Panel",$panel);
	     //$out .= $swin->render("center::50%::0::group_win_body::center::0::0::");	
	     unset ($swin);
		 
	     //HIDDEN FIELD TO HOLD STATS ID FOR AJAX HANDLE
	     $out .= "<INPUT TYPE= \"hidden\" ID= \"statsid\" VALUE=\"0\" >";	  		 			   		 
	 
         return ($out);	 
    } 
  
  
    protected function _show_addons($template=false) {  //?????
      $winh = 'SHOW';
	
      if (!empty($this->environment)) {    
      foreach ($this->environment as $mod=>$val) {
	    
		if ($val) {//enabled
		   $module = strtolower($mod);
		   switch ($module) {
		       case 'dashboard' : $text=null; break; //bypass
			   case 'ckfinder'  : $text=null; break; //bypass
			   
			   case 'edithtml'  : $text = $this->edit_html_files(false);//true); //cke4
			                      $winh = 'HIDE';
			                      break; 
			   
			   case 'menu'      : $text=null; break; //bypass

		       case 'awstats'   : //$text = "<a href='cgi-bin/awstats.php'>Awstats</a>";
							   $url = "cgi-bin/awstats.pl?config=". $this->awstats_url ."&framename=mainright#top";
					           $text .= "<IFRAME SRC=\"$url\" TITLE=\"awstats\" WIDTH=100% HEIGHT=400>
										<!-- Alternate content for non-supporting browsers -->
										<H2>Awstats</H2>
										<H3>iframe is not suported in your browser!</H3>
										</IFRAME>";	
                               $winh = 'SHOW';										
			                   break;			   
		       case 'siwapp' : $text = "<a href='../siwapp/'>Siwapp</a>"; 
			                   /*$url = "http://".str_replace('www.','',$_ENV["HTTP_HOST"])."/siwapp/";			   
					           $text .= "<IFRAME SRC=\"$url\" TITLE=\"siwapp\" WIDTH=100% HEIGHT=400>
										<!-- Alternate content for non-supporting browsers -->
										<H2>Siwapp</H2>
										<H3>iframe is not suported in your browser!</H3>
										</IFRAME>";	*/
							   $winh = 'SHOW';			
			                   break;
		       default       : $text = null;//$val;
			                   $winh = 'SHOW';
		   }
		  
		   if ($text) {
		     $mtitle = localize('_'.$module, getlocal());
		     $win1 = new window2($mtitle,$text,null,1,null,$winh,null,1);
             $addons .= $win1->render();
             unset ($win1);
		   }
		}  
      }		
	  }//if

      return ($addons);	
    }
  
    protected function _show_addon_tools() {

      $seclevid = GetSessionParam('ADMINSecID');   
      //print_r($this->environment);
      //print_r($this->tools);echo $seclevelid;
	
      if (!empty($this->tools)) {    
      foreach ($this->tools as $tool=>$u_ison) {
	    $peruser_ison = explode(',',$u_ison);
		$ison = $peruser_ison[$seclevid-1];
		
        $text = null;
		$mytool = strtolower($tool);
		//echo $tool,'<br/>';		   
		
		$e1 = null;//init pre tool
		
		//if (($ison>0) && ($this->environment[strtoupper($tool)]>0)) {//(isset($this->environment[strtoupper($tool)]))) {//enabled
		if ($this->environment[strtoupper($tool)]>0) { //enabled tool
	       //echo $tool,'<br/>';	
		   switch ($mytool) {
		       case 'google_addwords'  : $text = "<a href='../analyr/'>Go to addwords</a>"; 
			                             break;		   
										 
		       case 'google_analytics' : if (is_readable($this->prpath.'ganalytics.html')) 
											$url = "ganalytics.html";
										 else 
											$url = "http://analytics.google.com";	   
					                     $text .= "<IFRAME SRC=\"$url\" TITLE=\"analytics\" WIDTH=100% HEIGHT=400>
										<!-- Alternate content for non-supporting browsers -->
										<H2>Google analytics</H2>
							   			<H3>iframe is not suported in your browser!</H3>
										</IFRAME>";									
			                             break;	
			   case 'add_categories':   if (defined('RCIMPORTDB_DPC')) {
			                                $text = GetGlobal('controller')->calldpc_method('rcimportdb.upload_database_form use +++1');
										}	
			                            else
											$text = "<a href='cpimportdb.php?editmode=1&encoding=".$this->charset."'>Upload categories</a>"; 
			                            break;
               case 'add_products'  :	if (defined('RCIMPORTDB_DPC')) {
			                                $text = GetGlobal('controller')->calldpc_method('rcimportdb.upload_database_form use +++1');
										}	
			                            else
											$text = "<a href='cpimportdb.php?editmode=1&encoding=".$this->charset."'>Upload products</a>"; 
			                            break;	
			   case 'upload_logo'   :	if (defined('RCUPLOAD_DPC')) {
			                                $text = GetGlobal('controller')->calldpc_method('rcupload.advanced_uploadform use +logo.png++images+');
											$text .= GetGlobal('controller')->calldpc_method('rcupload.advanced_uploadform use +pointer.png++images+');
											$text .= GetGlobal('controller')->calldpc_method('rcupload.advanced_uploadform use +favicon.ico');
										}	
			                            else
											$text = "<a href='cpupload.php?editmode=1&encoding=utf-8'><img src='../images/logo.png'/></a>"; 
			                            break;	
               case 'add_recaptcha' :  	//$text = "<a href='cpupload.php?editmode=1&encoding=utf-8'>reCAPTCHA ON!</a>";
			                            $text = "Recaptcha feature installed";
                                        break;			   
               case 'backup'        :  	//always repeat...
			                            if ($e1 = $this->call_wizard_url('backup')) 
											$text = "<a href='$e1'>".localize('_backup_content',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";
                                        break;	
			   //case 'uninstall_maildbqueue'   :							
               case 'maildbqueue'   :   if ($valid = $this->is_valid_newsletter()) {
										    $text = localize('_newsletters' ,getlocal());//"Newsletter feature installed"; 
											$text .= ' ('.$valid.')';
										}
                                        else {//uninstall
											if ($e1 = $this->call_wizard_url('uninstall_maildbqueue')) 
												$text = "<a href='$e1'>".localize('_desendnewsletters',getlocal())."</a>"; 	
											else
												$text = "Unknown tool.";										
                                        }										
                                        break;	
               case 'add_domainname':  	
			                            $text = "Domain name ($this->url) installed. ";
										//if ($e1 = $this->call_wizard_url('add_domainname'))
                                          //  $text .= "<a href='$e1'>Re-change.</a>"; 										
                                        break;

			   //case 'uninstalleshop'   :							
               case 'eshop'   :         //$text = "e-shop feature installed"; break;
			                            if ($valid = $this->is_valid_eshop()) {//uninstall
										 
										    $message = localize('_uninstalleshop',getlocal());
											$message .= ' ('.$valid.')';
											
										    //you can unistall before expired
											if ($e1 = $this->call_wizard_url('uninstalleshop')) 
											  $text = "<a href='$e1'>".$message."</a>"; 	
											else
 										      $text = "Unknown tool.";
										}
                                        /*else {//re-install
											if ($e1 = $this->call_wizard_url('eshop')) 
											  $text = "<a href='$e1'>".localize('_installeshop',getlocal())."</a>"; 	
											else
 										      $text = "Unknown tool.";										
                                        }*/
                                        else {//uninstall
										    if ($e1 = $this->call_wizard_url('uninstalleshop')) 
											  $text = "<a href='$e1'>".$message."</a>"; 	
											else
 										      $text = "Unknown tool.";
                                        }										
                                        break;
               case 'ckfinder':         $text = "CKfinder installed"; break;
               case 'ieditor' :         $text = "IEditor installed"; break;
               case 'jqgrid'  :         $text = "JQgrid installed"; break;
			   case 'awstats' :         $text = "AWStats installed"; break;	
			   
			   case 'edit_htmlfiles':   $text = $this->edit_html_files(false, true, true);
			                            break; 
               case 'addkey'        :  	//always repeat...
			                            if ($e1 = $this->call_wizard_url('addkey')) 
											$text = "<a href='$e1'>".localize('_addkey',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";
                                        break;	
			   case 'genkey'        :  	//always repeat...
			                            if ($e1 = $this->call_wizard_url('genkey')) 
											$text = "<a href='$e1'>".localize('_genkey',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";
                                        break;	
               case 'validatekey'  :  	//always repeat...
			                            if ($e1 = $this->call_wizard_url('validatekey')) 
											$text = "<a href='$e1'>".localize('_validatekey',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";
                                        break;	
               case 'cpimages'     :  	//always repeat...
			                            if ($e1 = $this->call_wizard_url('cpimages')) 
											$text = "<a href='$e1'>".localize('_cpimages',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";
                                        break;											
		       default              :   //nothing
			                            $text = null;
		   }
		}
		//elseif (($ison>0) && (array_key_exists(strtoupper($tool),$this->environment))) {//($this->environment[strtoupper($tool)]==0)) {
		elseif ((array_key_exists(strtoupper($tool),$this->environment)) && 
		        ($this->environment[strtoupper($tool)]==0)) {//installed tool no privilege
		   //no priviledge
		   //do nothing...
		   //echo '<br/>',$tool,$seclevid,'>';
		}
        elseif ($ison>0) {//disabled tool..enable it, if local privilege is on
		   //echo $mytool.'<br/>';
		   switch ($mytool) {
		       case 'google_addwords'  : if ($e1 = $this->call_wizard_url('google_addwords'))
											$text = "<a href='$e1'>Enable addwords</a>"; 
										 else
 										    $text = "Unknown tool."; 
			                             break;		   
										 
		       case 'google_analytics' : if ($e1 = $this->call_wizard_url('google_analytics'))
											$text = "<a href='$e1'>Enable analytics</a>"; 
										 else
 										    $text = "Unknown tool.";
			                             break;
			   							 
			   case 'add_categories':    if ($e1 = $this->call_wizard_url('add_categories'))
											$text = "<a href='$e1'>Upload categories</a>"; 
										 else
 										    $text = "Unknown tool.";
			                             break;
               case 'add_products'  :    if ($e1 = $this->call_wizard_url('add_products'))
											$text = "<a href='$e1'>Upload products</a>"; 
										 else
 										    $text = "Unknown tool.";
			                             break;
               case 'upload_logo'   :    if ($e1 = $this->call_wizard_url('upload_logo')) {
											//$text = "<a href='$e1'>Change logo</a>"; 
											$text = "<a href='$e1'>Upload logo</a>";//<img src='../images/logo.png'/></a>"; 												
										 }	
										 else
 										    $text = "Unknown tool.";
			                             break;									
               case 'add_recaptcha'  :	 if ($e1 = $this->call_wizard_url('add_recaptcha')) 
											$text = "<a href='$e1'>Add recaptcha entry feature</a>"; 	
										 else
 										    $text = "Unknown tool.";									 
										 break;
               case 'backup'         :	 if ($e1 = $this->call_wizard_url('backup')) 
											$text = "<a href='$e1'>".localize('_backup_content',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";									 
										 break;	
			   case 'maildbqueue'    :	if ($e1 = $this->call_wizard_url('maildbqueue')) 
											$text = "<a href='$e1'>".localize('_sendnewsletters',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";									 
										 break;	
               case 'add_domainname' :	 if ($e1 = $this->call_wizard_url('add_domainname')) 
											$text = "<a href='$e1'>Change domain name</a>"; 	
										 else
 										    $text = "Unknown tool.";									 
										 break;	
			   case 'eshop'          :	if ($e1 = $this->call_wizard_url('eshop')) 
											$text = "<a href='$e1'>".localize('_installeshop',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";									 
										 break;	
               case 'ckfinder':          if ((!is_dir($this->prpath.'/ckfinder')) && 
			                                 ($e1 = $this->call_wizard_url('ckfinder'))) 
											$text = "<a href='$e1'>".localize('_install',getlocal())."</a>"; 	
										 else
 										    $text = null;									 
										 break;	
               case 'ieditor' :          if ((!is_dir($this->prpath.'/ieditor')) &&
			                                ($e1 = $this->call_wizard_url('ieditor'))) 
											$text = "<a href='$e1'>".localize('_install',getlocal())."</a>"; 	
										 else
 										    $text = null;									 
										 break;	
               case 'jqgrid'  :          //echo $this->urlpath.'/javascripts/jqgrid';
			                             if ((!is_dir($this->urlpath.'/javascripts/jqgrid')) &&
			                                ($e1 = $this->call_wizard_url('jqgrid'))) 
											$text = "<a href='$e1'>".localize('_install',getlocal())."</a>"; 	
										 else
 										    $text = null;									 
										 break;	
               case 'awstats' :          if ($e1 = $this->call_wizard_url('awstats')) 
											$text = "<a href='$e1'>Enable AWStats</a>"; 	
										 else
 										    $text = "Unknown tool.";
										 break;	
										 
               case 'edit_htmlfiles'   : if ($e1 = $this->call_wizard_url('edit_htmlfiles')) 
											$text = "<a href='$e1'>Edit html files</a>"; 	
										 else
 										    $text = "Unknown tool.";									 
										 break;	
			   case 'addkey'        :  	//always repeat...
			                            if ($e1 = $this->call_wizard_url('addkey')) 
											$text = "<a href='$e1'>".localize('_addkey',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";
                                        break;	
			   case 'genkey'        :  	//always repeat...
			                            if ($e1 = $this->call_wizard_url('genkey')) 
											$text = "<a href='$e1'>".localize('_genkey',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";
                                        break;	
               case 'validatekey'  :  	//always repeat...
			                            if ($e1 = $this->call_wizard_url('validatekey')) 
											$text = "<a href='$e1'>".localize('_validatekey',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";
                                        break;	
               case 'cpimages'     :  	//always repeat...
			                            if ($e1 = $this->call_wizard_url('cpimages')) 
											$text = "<a href='$e1'>".localize('_cpimages',getlocal())."</a>"; 	
										 else
 										    $text = "Unknown tool.";
                                        break;											
		       default                 : //nothing
			                             $text = null;
		   }		
        }
        //else disabled tool...		
		
		if ($text) {
		    //echo $text,'<br/>';
		    $tool_url = $text ? ($e1 ? $e1 : "help/$mytool/") : null;
			$this->stats['Addons']['url'][] = $tool_url;
			$this->stats['Addons']['href'][] = $text;
			$_more = localize('_more',getlocal());
		    $ao = '<div class="msg-time-chat">
                        <a class="message-img" href="'.$tool_url.'"><img alt="" src="images/'.$mytool.'.png" class="avatar"></a>
                        <div class="message-body msg-in">
                            <span class="arrow"></span>
                            <div class="text">
                                <p>'.$text.'</p>
								<!--p class="attribution"><a href="/help/'.$mytool.'/">'.$_more.'</a> at 1:55pm, 13th April 2013</p-->
                            </div>
                        </div>
                   </div>';
			$this->stats['Addons']['html'] .= $ao;
		}		
      }	//foreach	
	  }//if
	

	  return true;

    }	
  
    //check if eshop exist and is valid
    protected function is_valid_eshop() {
   	  
		$timekey = remote_paramload('SHCART','expires',$this->prpath);
		//echo $timekey;
		if ($timekey) {
			//$timeleft = $this->appkey->decode_key($timekey, 'SHCART', true);
			$date = $this->appkey->decode_key($timekey, 'SHCART');

			//if ($timeleft>0) {
			if ($date) {
				$daystosay = 30 * 24 * 60 *60; //30 days			
			    //if ($timeleft<($daystosay))//x days or negative=expired
			        //return true;
					
				$now = time();
				$diff = strtotime($date) - $now;
				//if ($diff<($daystosay)) {//x days or negative=expired					
					$ret = $this->appkey->nicetime($date); 
					//echo $ret;
					return ($ret);//true with text
				//}	
			}		
		}
	  
	    return false;
    } 

    //check if newsletter feature is valid
    protected function is_valid_newsletter() {
   	  
		//installed mailqueue key
		$timekey = remote_paramload('RCBULKMAIL','expires',$this->prpath);

		if ($timekey) {
			$date = $this->appkey->decode_key($timekey, 'RCBULKMAIL'); 

			if ($date) {
				$daystosay = 30 * 24 * 60 *60; //30 days			
					
				$now = time();
				$diff = strtotime($date) - $now;
				//if ($diff<($daystosay)) {//x days or negative=expired					
					$ret = $this->appkey->nicetime($date); 
					//echo $ret;
					return ($ret);//true with text
				//}	
			}		
		}

	    return false;
    }	
  
  
    protected function _show_update_tools() {   
        $text = 'update';
		$u = null;
		//check for time limited services
		$index = 0;
		if (($codeexpires = $this->get_code_expirations()) && (!empty($codeexpires))) {
		    foreach ($codeexpires as $section=>$exp_text) {
                $module = $section .'_DPC';
				$mod = localize($module, getlocal());
				$update_key_url = $this->call_wizard_url('addkey');//, true);	//is upgrade			

					$this->stats['Update']['value'] = ++$index;
				    $this->stats['Update']['url'][] = $update_key_url;
					$this->stats['Update']['href'][] = $exp_text;
					$html = '<li>
                                <span class="label label-warning"><i class="icon-bell"></i></span>
                                    <span><a href="'.$update_key_url.'">'.$exp_text.'</a></span>
                                    <div class="pull-right">
                                        <span class="small italic ">'.date("F d Y H:i:s.").'</span>
                                    </div>
                             </li>';
					if ($index<9) $this->stats['Update']['html'] .= $html;	
                    $notify = ' <li>
                                   <a href="#">
                                       <div class="task-info">
                                         <div class="desc">'.$exp_text.'</div>
                                         <div class="percent">44%</div>
                                       </div>
                                       <div class="progress progress-striped active no-margin-bot">
                                           <div class="bar" style="width: 44%;"></div>
                                       </div>
                                   </a>
                               </li>'; 
                    if ($index<5) $this->stats['Update']['notify'] .= $notify;							   
			}
		}		
		
		//check for dpc upgrade
		if (($dpc2copy = $this->get_dpc_modules()) && (!empty($dpc2copy))) {
		    foreach ($dpc2copy as $d=>$dpc) {
				//automated dpc update
				$update_dpc_url = $this->call_wizard_url('dpcmod');//, true);	//is upgrade			
				    $this->stats['Update']['value'] = ++$index;
					$this->stats['Update']['url'][] = $update_dpc_url;
					$this->stats['Update']['href'][] = $dpc;
					$html = '<li>
                                <span class="label label-success"><i class="icon-bullhorn"></i></span>
                                    <span><a href="'.$update_dpc_url.'">'.$dpc.'</a></span>
                                    <div class="pull-right">
                                        <span class="small italic ">'.date("F d Y H:i:s.").'</span>
                                    </div>
                             </li>';
					if ($index<9) $this->stats['Update']['html'] .= $html;
                    $notify = ' <li>
                                   <a href="#">
                                       <div class="task-info">
                                         <div class="desc">'.$dpc.'</div>
                                         <div class="percent">44%</div>
                                       </div>
                                       <div class="progress progress-striped active no-margin-bot">
                                           <div class="bar" style="width: 44%;"></div>
                                       </div>
                                   </a>
                               </li>'; 
                    if ($index<5) $this->stats['Update']['notify'] .= $notify;					
			}	
		}
		
		//check for dac pages to upgrade
		if (($phpdac2copy = $this->get_dac_pages()) && (!empty($phpdac2copy))) {
		    foreach ($phpdac2copy as $p=>$dac) {
				//automated dpc update
				$update_dac_url = $this->call_wizard_url('dacpage');//, true);	//is upgrade			
				    $this->stats['Update']['value'] = ++$index;
					$this->stats['Update']['url'][] = $update_dac_url;
					$this->stats['Update']['href'][] = $dac;
					$html = '<li>
                                <span class="label label-important"><i class="icon-bullhorn"></i></span>
                                    <span><a href="'.$update_dac_url.'">'.ucfirst(strtolower($dac)).'</a></span>
                                    <div class="pull-right">
                                        <span class="small italic ">'.date("F d Y H:i:s.").'</span>
                                    </div>
                             </li>';
					if ($index<9) $this->stats['Update']['html'] .= $html;
                    $notify = ' <li>
                                   <a href="#">
                                       <div class="task-info">
                                         <div class="desc">'.ucfirst(strtolower($dac)).'</div>
                                         <div class="percent">44%</div>
                                       </div>
                                       <div class="progress progress-striped active no-margin-bot">
                                           <div class="bar" style="width: 44%;"></div>
                                       </div>
                                   </a>
                               </li>'; 
                    if ($index<5) $this->stats['Update']['notify'] .= $notify;					
			}	
		}	
		
		//check for free space
		if ($this->free_space() < (100*1024*1024)) { //get more in MB..100MB
		    //automated add space
		    $update_url = $this->call_wizard_url('addspace');//, true);	//is upgrade			
			    $this->stats['Update']['value'] = ++$index;
				$this->stats['Update']['url'][] = localize('_addspace', getlocal());
				$this->stats['Update']['href'][] = $update_url;
				$html = '<li>
                            <span class="label label-important"><i class=" icon-bug"></i></span>
                            <span><a href="'.$update_url.'">'.localize('_addspace', getlocal()).'</a></span>
                            <div class="pull-right">
                                <span class="small italic ">'.date("F d Y H:i:s.").'</span>
                            </div>
                        </li>';
				if ($index<9) $this->stats['Update']['html'] .= $html;
                $notify = ' <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">'.localize('_addspace', getlocal()).'</div>
                                        <div class="percent">44%</div>
                                    </div>
                                    <div class="progress progress-striped active no-margin-bot">
                                        <div class="bar" style="width: 44%;"></div>
                                    </div>
                                </a>
                            </li>'; 
                if ($index<5) $this->stats['Update']['notify'] .= $notify;
		}
		
	    $updates = $this->read_update_directory();
		if (!empty($updates)) {
		    arsort($updates);
		    foreach ($updates as $update=>$udatecreated) {
			    //$u .= $udatecreated . '&nbsp;';
				
                $update_url = $this->call_wizard_url($update, true);
				    $this->stats['Update']['value'] = ++$index;
					$this->stats['Update']['url'][] = str_replace('_',' ',ucfirst($update));
					$this->stats['Update']['href'][] = $update_url;
					$html = '<li>
                                <span class="label label-warning"><i class="icon-bullhorn"></i></span>
                                    <span><a href="'.$update_url.'">'.str_replace('_',' ',ucfirst($update)).'</a></span>
                                    <div class="pull-right">
                                        <span class="small italic ">'.date("F d Y H:i:s.", $udatecreated).'</span>
                                    </div>
                             </li>';
					if ($index<9) $this->stats['Update']['html'] .= $html;
					$notify = ' <li>
                                <a href="#">
                                    <div class="task-info">
                                        <div class="desc">'.str_replace('_',' ',ucfirst($update)).'</div>
                                        <div class="percent">44%</div>
                                    </div>
                                    <div class="progress progress-striped active no-margin-bot">
                                        <div class="bar" style="width: 44%;"></div>
                                    </div>
                                </a>
                            </li>'; 
					if ($index<5) $this->stats['Update']['notify'] .= $notify;					
			}	
		}

		return true;
    }
  
    //as call_upgrade_ini into rcuwizard dpc
    //in case of update must be also here for wizard to play..
    //in case of update is only for read and history reasons
    protected function call_wizard_url($addon=null,$isupdate=false) {
        if (!$addon) return false;
		
		$upgrade_root_path = $this->prpath . '/../../cp/upgrade-app/';	
		$update_root_path = $this->prpath . '/../../cp/update-app/'; 
		
		$r_path = $isupdate ? $update_root_path : $upgrade_root_path;
		
	    $inifile = $r_path . "/cpwizard-".$addon.".ini";
		$target_inifile = $this->prpath . "/cpwizard-".$addon.".ini";
		$installed_inifile = str_replace('.ini','._ni',$target_inifile);
		//echo $inifile;
		
		if ((is_readable($target_inifile)) || ((is_readable($inifile)))){//already copied or fetch from root app

            /*$url = $isupdate ? seturl('t=cpwupdate&wf='.$addon) : 
			                   seturl('t=cpupgrade&wf='.$addon);*/
			//in case of update url is the same...as upgrade
            $url = seturl('t=cpupgrade&wf='.$addon);			
		}
        else
            $url = false; 		
			
        return ($url);		
    }
  
    //read update ini files
    function read_update_directory() {
  
		$dirname = $this->prpath . '/../../cp/update-app/';
  
        //echo $dirname;
	    if (is_dir($dirname)) {
          $mydir = dir($dirname);
		 
          while ($fileread = $mydir->read ()) {
	        
		   if (($fileread!='.') && ($fileread!='..'))  {
		   
                 //echo "<br>",$fileread;	   
	             //read cpwizard- files
  	             if ((stristr ($fileread,".ini")) &&
				     ((substr($fileread,0,9))=='cpwizard-') && //not already updated  	   
					 (!is_readable($this->prpath.'/'.str_replace('.ini','._ni',$fileread)))) { 
                      
					  $p = explode('-',$fileread);
					  $update_name = str_replace('.ini','',$p[1]);
		              $ddir[$update_name] = filectime($dirname . $fileread);						
					}
		   } 
	      }
	      $mydir->close ();
        }

		return ($ddir);
    }  
  
    //zip directory
    function zip_directory($path=null, $name=null) {
        $d = date('Ymd-Hi');
		$zpath = $path ? $path : '';
        $zname = $name ? $d.'-'.$name : $d.'-'.'backup.zip'; 
		$dirname = $this->prpath . '/' . $zpath;
  
        //echo $dirname;
	    if (is_dir($dirname)) {
          $mydir = dir($dirname);
		  
		  $zip = new ZipArchive();
		  $zfilename = $this->prpath . "/uploads/" . $zname; //to save into

		  if ($zip->open($zfilename, ZipArchive::CREATE)!==TRUE) {
            return false;
          }		  
		 
          while ($fileread = $mydir->read ()) {
	        
		   if (($fileread!='.') && ($fileread!='..'))  {
		   
                 //echo "<br>",$fileread;	   
	             //read cpwizard- files
  	             if (!is_dir($fileread))  { 
                      
                    $zip->addFile($dirname."/".$fileread, $fileread);						
				 }
		   } 
	      }
	      $mydir->close ();
		  
          $ret = "numfiles: " . $zip->numFiles . "\n";
          $ret .= "status:" . $zip->status . "\n";
          $zip->close();		  
        }

		return ($ret);
    }    			
  
   /* function logincp_form($nav_off=null,$tokens=null) {
	
	    if (!$nav_off) 
		  $out = setNavigator($this->title);
	 
	    if ($this->editmode)
		  $filename = seturl("t=cp&editmode=1",0,1);
		else
          $filename = seturl("t=cp",0,1);
	  	
		if ($tokens) {
		  $token[] = "<FORM action=". $filename . " method=post class=\"thin\">" . 
                      "<input type=\"text\" name=\"cpuser\" value=\"\" size=\"32\" maxlength=\"128\">";		  
		}  
		else {
          $toprint  = "<FORM action=". $filename . " method=post class=\"thin\">";
	      $toprint .= "<STRONG>Username:</STRONG>"; 
          $toprint .= "<input type=\"text\" name=\"cpuser\" value=\"\" size=\"32\" maxlength=\"128\"><br>";  		
		}
		
		if ($tokens) {
          $token[] = "<input type=\"password\" name=\"cppass\" value=\"\" size=\"32\" maxlength=\"128\">";		
		}
		else {
          $toprint .= "<STRONG>Password:</STRONG>"; 
	      $toprint .= "<input type=\"password\" name=\"cppass\" value=\"\" size=\"32\" maxlength=\"128\"><br>";
        }
		
		if ($tokens) {
	      $token[] = "<input type=\"submit\" name=\"Submit\" value=\"Ok\">" .
                     "<input type=\"hidden\" name=\"FormAction\" value=\"cplogin\">" .
		             "<input type=\"hidden\" name=\"AUTHENTICATE\" value=\"Login\">" .	
                     "</FORM>";	
				   
		  return ($token);		   		
		}
		else {
	      $toprint .= "<input type=\"submit\" name=\"Submit\" value=\"Ok\">"; 
          $toprint .= "<input type=\"hidden\" name=\"FormAction\" value=\"cplogin\">";
		
		  //enable AUTH
		  $toprint .= "<input type=\"hidden\" name=\"AUTHENTICATE\" value=\"Login\">";
				
          $toprint .= "</FORM>";	   
		
		
	      $swin = new window("Login",$toprint);
	      $out .= $swin->render("center::50%::0::group_dir_body::left::0::0::");	
	      unset ($swin);

          return ($out);
		}
    } 
  
    function verify_login() {
		//in case of instance app login goto root db
		$mydb = & GetGlobal('controller')->calldpc_method('database.switch_db use +1+1');  
	
		$db = GetGlobal('db');  
  
		if (($user=GetParam('cpuser')) && ($pwd=GetParam('cppass'))) {
	
			//get running application info
			$is_instance_app = paramload('ID','isinstance');
			//echo $is_instance_app; 
			$appname = paramload('ID','instancename');
			//echo '>',$appname;
	  
			//INSERT ROOT USER
			//$sins = "insert into dpcmodules (user,pwd,appname) values ('root','rootvk7dp','root')";
			//$result = $db->Execute($sins,1);	  
	   
			$sSQL .= "select user,pwd,appname from dpcmodules where user='$user' and pwd='$pwd' and active=1";
			$result = $mydb->Execute($sSQL,2);	
			//echo $sSQL;
			//print_r($result);
	  
			//if username & password exists
			if (($result->fields[0]==$user) && ($result->fields[1]==$pwd)) {
	  
				//restore app db
				GetGlobal('controller')->calldpc_method('database.switch_db');//null = this app// use '.$appname); 	  

				//must be instance and appname be correct
				if (($is_instance_app) && ($result->fields[2]==$appname)) {
				  SetSessionParam('LOGIN','yes');	
				  SetSessionParam('USER',$user);	
				  return true;
				}//else is no instance (root app) appname=root  
				elseif ((!$is_instance_app) && ($result->fields[2]=='root')) {
				  SetSessionParam('LOGIN','yes');	
				  SetSessionParam('USER',$user);	
				  SetSessionParam('ADMIN','yes');
				  return true;
				}  
				else
				  return false;
			}	
		}	
		return false;
    } */
  
	public function get_user_name($nopro=0) {
	  if ((GetSessionParam('LOGIN')) && ($user=GetSessionParam('USER')))
	    return ($user);	
	  
	  return false;	  
	}

  
    protected function autoupdate() {
		
     //echo $_SERVER['PHP_SELF'];
	 /*$rf = file_get_contents('http://www.stereobit.com/cp/cp.php');
	 $hf = file_get_contents($this->path .'/cp.php');
	 if (strlen($rf)!=strlen($hf)) {
	   echo 'must update...';
	 }*/
    }
  
	
    public function getencoding() {
	  return ($this->charset);
    }
  
    protected function logout() {
  
		SetSessionParam('LOGIN',null);
		SetSessionParam('USER',null);
		SetSessionParam('env',null);
		//SetSessionParam('ADMIN',null); //to not propagated!?just close navigator window
		
		SetSessionParam('turl', null);		
		SetSessionParam('turldecoded', null);
		SetSessionParam('cpGet', null);		
    }
  
  
  
  
 	protected function sqlDateRange($fieldname, $istimestamp=false, $and=false) {
		$sqland = $and ? ' AND' : null;
		if ($daterange = GetParam('rdate')) {//post
			$range = explode('-',$daterange);
			$dstart = str_replace('/','-',trim($range[0]));
			$dend = str_replace('/','-',trim($range[1]));
			if ($istimestamp)
				$dateSQL = $sqland . " DATE($fieldname) BETWEEN STR_TO_DATE('$dstart','%m-%d-%Y') AND STR_TO_DATE('$dend','%m-%d-%Y')";
			else			
				$dateSQL = $sqland . " $fieldname BETWEEN STR_TO_DATE('$dstart','%m-%d-%Y') AND STR_TO_DATE('$dend','%m-%d-%Y')";
			
			//$this->messages[] = 'Range selection:'.$daterange;			
		}				
		elseif ($y = GetReq('year')) {
			if ($m = GetReq('month')) { $mstart = $m; $mend = $m;} else { $mstart = '01'; $mend = '12';}
				
			if ($istimestamp)
				$dateSQL = $sqland . " DATE($fieldname) BETWEEN '$y-$mstart-01' AND '$y-$mend-31'";
			else
				$dateSQL = $sqland . " $fieldname BETWEEN '$y-$mstart-01' AND '$y-$mend-31'";
			
			//$this->messages[] = 'Combo selection:'.$m.'-'.$y;
		}	
        else
			$dateSQL = null;
		
		return ($dateSQL);
	} 
  
    protected function site_stats() {
		$db = GetGlobal('db'); 	
		$path = $this->application_path;
        $year = GetParam('year') ? GetParam('year') : date('Y'); 
	    $month = GetParam('month') ? GetParam('month') : date('m');		
			
		$fs = $this->free_space();
		//if $total_size<0 ...goto upgrade.....		
		if ($fs < 0)
			$this->setMessage('warning|Upgrade your hosting plan');		
		

		
        if (defined('RCKATEGORIES_DPC')) { //	//SHUSERS / SHCUSTOMERS
	
            $sSQL = "select count(id) from users";
			$res = $db->Execute($sSQL,2);
            $this->stats['Users']['value'] = $res->fields[0];			
			
            $sSQL = "select count(id) from users where subscribe=1"; /** default label in ulist **/
			$res = $db->Execute($sSQL,2);	
            $this->stats['Users']['Subscribers'] = $res->fields[0];
			
            $sSQL = "select count(id) from customers";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Users']['customers'] = $res->fields[0];			
			
            $sSQL = "select count(id) from ulists";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Mail']['maillist'] = $res->fields[0];			

            $sSQL = "select count(id) from pphotos where stype='SMALL'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['DbPicSmall'] = $res->fields[0];			
			
            $sSQL = "select count(id) from pphotos where stype='MEDIUM'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['DbPicMedium'] = $res->fields[0];			
			
            $sSQL = "select count(id) from pphotos where stype='LARGE'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['DbPicLarge'] = $res->fields[0];
			
            $sSQL = "select count(id) from pattachments";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Items']['Attachments'] = $res->fields[0];			
			
		}  
        if (defined('RCITEMS_DPC')) {
            $timeins = $this->sqlDateRange('sysins', false, false);	
			$where = $timeins ? ' where ' : null;
		    //$sSQL = "select id,substr(sysins,1,4) as year,substr(sysins,6,2) as month from products where substr(sysins,1,4)='$year' and substr(sysins,6,2)='$month'";
			$sSQL = "select count(id) from products where" . $where .  $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['insert'] = $res->fields[0];			
					
			$timeupd = $this->sqlDateRange('sysupd', false, false);			 
			$where = $timeupd ? ' where ' : null;
		    //$sSQL = "select id,substr(sysupd,1,4) as year,substr(sysupd,6,2) as month from products where substr(sysupd,1,4)='$year' and substr(sysupd,6,2)='$month'";
			$sSQL = "select count(id) from products" . $where . $timeupd;
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['update'] = $res->fields[0];			
								
            $sSQL = "select count(id) from products where itmactive=1 and active=101";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Items']['active'] = $res->fields[0];			
						
            $sSQL = "select count(id) from products where (itmactive=0 and active=0) or (itmactive is null and active is null)";//or...
			$res = $db->Execute($sSQL,2);	
            $this->stats['Items']['inactive'] = $res->fields[0];			
						
            $sSQL = "select count(id) from products";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Items']['value'] = $res->fields[0];			
		} 
        if (defined('RCITEMS_DPC')) {//???????SYNC DPC
		    /*$sSQL = "select id,status,sqlres,sqlquery,substr(date,1,4) as year,substr(date,6,2) as month from syncsql where substr(date,1,4)='$year' and substr(date,6,2)='$month'";
			$res = $db->Execute($sSQL,2);
			$i=0;
			$chars_send = 0;
			$noexec_syncs = 0;
			if (!empty($res)) { 
				foreach ($res as $n=>$rec) {
				    $i+=1;
                    $chars_send += strlen($rec['sqlquery']);
                    if (!$rec['status']) 
                        $noexec_syncs+=1;					
				}
			}*/
			$timein = $this->sqlDateRange('time', true, false);			 
			$where = $timein ? ' where ' : null;
			$sSQL = "select count(id), sum(CHAR_LENGTH(sqlquery)) from syncsql" . $where . $timein;
			$res = $db->Execute($sSQL,2);
			
            $this->stats['Sync']['value'] = $res->fields[0]; //$i;			
			$this->stats['Sync']['bytes'] = $this->bytesToSize1024($res->fields[1],1); //$chars_send,1);
			
			$timein = $this->sqlDateRange('time', true, true);			 
			$sSQL = "select count(id) from syncsql where status IS NOT NULL " . $timein;
			$res = $db->Execute($sSQL,2);			
			$this->stats['Sync']['noexec'] = $res->fields[0]; //$noexec_syncs;			
			
		    /*$sSQL = "select count(id) from syncsql where substr(date,1,4)='$year'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Sync']['value'] = $res->fields[0];*/	
		}  		
        if (defined('RCBULKMAIL_DPC')) {
		    /*$sSQL = "select id,body,active,status,mailstatus,sender,receiver,substr(timeout,1,4) as year,substr(timeout,6,2) as month from mailqueue where substr(timeout,1,4)='$year' and substr(timeout,6,2)='$month'";
			$sSQL .= " and active=0";
			$res = $db->Execute($sSQL,2);
			$i=0;
			$chars_send = 0;
			if (!empty($res)) { 
				foreach ($res as $n=>$rec) {
				    $i+=1;
                    $chars_send += strlen($rec['body']);				
				}
			}*/
			$timein = $this->sqlDateRange('timein', true, false);
            $where = $timein ? ' where ' : null;			
			$sSQL = "select count(id), sum(CHAR_LENGTH(body)) from mailqueue" . $where . $timein;
			//echo $sSQL;
			$res = $db->Execute($sSQL,2);
			
			$this->stats['Mail']['value'] = $res->fields[0]; //$i;
			$this->stats['Mail']['bytes'] = $this->bytesToSize1024($res->fields[1],1); //$chars_send,1);
			
		    $sSQL = "select count(id) from mailqueue where active=0";
			$res = $db->Execute($sSQL,2);
            $this->stats['Mail']['sent'] = $res->fields[0];			

		    $sSQL = "select count(id) from mailqueue where active=1";
			$res = $db->Execute($sSQL,2);
            $this->stats['Mail']['value'] = $res->fields[0];
					
			$timein = $this->sqlDateRange('timein', true, true);				
		    //$sSQL = "select count(id) from mailqueue where substr(timeout,1,4)='$year' and active=0";
			$sSQL = "select count(id) from mailqueue where active=0 " . $timein;
			$res = $db->Execute($sSQL,2);
            $this->stats['Mail']['send'] = $res->fields[0];
			
		    $sSQL = "select count(id) from mailcamp where active=1";
			$res = $db->Execute($sSQL,2);
            $this->stats['Mail']['campaigns'] = $res->fields[0];				
		}  
		if (defined('RCTRANSACTIONS_DPC')) { //!!!! to be implemented as cp call
		    $tbl_g = array();
            //trans list, last 5 		
			$ret_g = GetGlobal('controller')->calldpc_method("rctransactions.getTransactionsList use 5");
			//more...
			//$tbutton = seturl('t=cptransview&editmode=1',localize("_moretrans",getlocal()));  
			//$tbutton = seturl('t=cptransactions&editmode=1',localize("_moretrans",getlocal()));  
			//if (!$tok) {			
				$tbutton = "<a href='cptransactions.php'>".localize("_moretrans",getlocal())."</a>"; //error in jqgid.lib ..output strarted...!!!
				/*$wint = new window(localize(null,getlocal()),$tbutton);
				$ret_g .= $wint->render();
				unset ($wint);
				$tbl_g[] = $this->icon("images/file_icon.png",'cptransactions.php',localize("_moretrans",getlocal()),4);
				*/
			//}
            //summary per month 		
		    /*$sSQL = "select tid,cid,tstatus,cost,costpt,payway,roadway,substr(tdate,1,4) as year,substr(tdate,6,2) as month from transactions where substr(tdate,1,4)='$year' and substr(tdate,6,2)='$month'";
			$res = $db->Execute($sSQL,2);
			$i=0;
			$pay_send = 0;
			$paynet_send = 0;
			if (!empty($res)) { 
				foreach ($res as $n=>$rec) {
				    $i+=1;
                    $paynet_send += floatval($rec['cost']);
                    $pay_send += floatval($rec['costpt']);					
				}
			}	
			$this->stats['Transactions']['subtotal'] = $i;
			$this->stats['Transactions']['revenue'] = sprintf("%01.2f", $pay_send);
			$this->stats['Transactions']['revenuenet'] = sprintf("%01.2f", $paynet_send);	*/		
			
			$timein = $this->sqlDateRange('tdate', false, false);
			$where = $timein ? ' where ' : null;
			//$sSQL = "select count(recid) from transactions where substr(tdate,1,4)='$year'";
			$sSQL = "select count(id) from transactions" . $where . $timein;
			$res = $db->Execute($sSQL,2);
			$this->stats['Transactions']['value'] = $res->fields[0] ? $res->fields[0] : 0;			
			
		    //$sSQL = "select sum(cost),sum(costpt) from transactions where substr(tdate,1,4)='$year'";
		    $sSQL = "select sum(cost),sum(costpt) from transactions" . $where . $timein;	
			$res = $db->Execute($sSQL,2);
			$this->stats['Transactions']['revenuenet'] = sprintf("%01.2f", $res->fields[0]);
			$this->stats['Transactions']['revenue'] = sprintf("%01.2f", $res->fields[1]);			
			$this->stats['Transactions']['tax'] = sprintf("%01.2f", floatval($res->fields[1]) - floatval($res->fields[0]));
		}  

        return ($ret);     	
    }
	
    protected function bytesToSize1024($bytes, $precision = 2) {
        $unit = array('B','KB','MB','GB');
        return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
    }  
 
 
    protected function filesize_r($path){
		if (!file_exists($path)) 
			return 0;
		
	    if (is_file($path)) 
			return filesize($path);
			
		$ret = 0;
		
		$glob = glob($path."/*");
		
		if (is_array($glob)) {
			foreach(glob($path."/*") as $fn)
				$ret += $this->filesize_r($fn);
		}	
		return $ret;

    } 
	
    protected function cached_mail_size($year=null, $month=null) {
	   // /home/stereobi/mail/domain
	   $path = '/home/'.$this->rootapp_path.'/mail/' . str_replace('www.','',$this->url);
  	   //$path = $this->prpath . '../../../../mail/' . str_replace('www.','',$this->url); // ./mail/domainname
	   //echo $path,'>>>';
       $name = strval(date('Ymd'));
       $msize = $this->prpath . $name . '-msize.size';
	   $size = 0;
	   
	   if (($year) && ($month)) {
			$selected_name = sprintf('%04d',$year) . sprintf('%02d',$month);
			for ($d=31;$d>0;$d--) {
				$search_selected_name = $selected_name . sprintf('%02d',$d);
				if (is_readable($this->prpath . $search_selected_name . '-msize.size'))
					$msize = $this->prpath . $search_selected_name . '-msize.size';
			}
	   }
	   //else msize of today...
       if (is_readable($msize)) {
	        //echo $msize;
			$size = @file_get_contents($msize);

	   }
	   else {
            $size = $this->filesize_r($path);
			@file_put_contents($msize, $size);
	   }
	   
	   return ($size);
    }	
  	
	
    protected function cached_disk_size($year=null, $month=null) {
  	   $path = $this->application_path; 
       $name = strval(date('Ymd'));
       $tsize = $this->prpath . $name . '-tsize.size';
	   $size = 0;
	   
	   if (($year) && ($month)) {	
			$selected_name = sprintf('%04d',$year) . sprintf('%02d',$month);
			for ($d=31;$d>0;$d--) {
				$search_selected_name = $selected_name . sprintf('%02d',$d);
				if (is_readable($this->prpath . $search_selected_name . '-tsize.size'))
						$tsize = $this->prpath . $search_selected_name . '-tsize.size';
			}
	   }		
	   //else tsize of today...
       if (is_readable($tsize)) {
	        //echo $tsize;
			$size = @file_get_contents($tsize);

	   }
	   else {
            $size = $this->filesize_r($path);
			@file_put_contents($tsize, $size);
	   }
	   
	   return ($size);
    }	
	
    protected function cached_database_filesize($year=null, $month=null) {
      $db = GetGlobal('db'); 
      $name = strval(date('Ymd'));
      $dsize = $this->prpath . $name . '-dsize.size';	
	
	  if (($year) && ($month)) {
			$selected_name = sprintf('%04d',$year) . sprintf('%02d',$month);
			for ($d=1;$d<31;$d++) {
				$search_selected_name = $selected_name . sprintf('%02d',$d);
				if (is_readable($this->prpath . $search_selected_name . '-dsize.size'))
					$tsize = $this->prpath . $search_selected_name . '-dsize.size';
			}	
      }
	  //else tsize of today...
      if (is_readable($dsize)) {
	    //echo $dsize;
		$size = @file_get_contents($dsize);

	  }
	  else {
		//$result = mysql_query( “SHOW TABLE STATUS” );
		$sSQL = "SHOW TABLE STATUS";
		$res = $db->Execute($sSQL,2);		
		//print_r($res);
		$size = 0;
		/*while( $row = mysql_fetch_array( $result ) ) {  
        $dbsize += $row[ "Data_length" ] + $row[ "Index_length" ];
		} */
		if (!empty($res)) { 
			foreach ($res as $n=>$rec) {
				$size += $rec[ "Data_length" ] + $rec[ "Index_length" ];					
			}
		}
		@file_put_contents($dsize, $size);
	  }	
		
	  return ($size);
    }	
	
	//get the free space
	protected function free_space() {
        $year = GetParam('year') ? GetParam('year') : date('Y'); 
	    $month = GetParam('month') ? GetParam('month') : date('m');			
		
		$msize = $this->cached_mail_size($year, $month);
		$msize2 = $this->bytesToSize1024($msize,1);

		$this->stats['Diskspace']['mailbox'] = $msize2;	
				
		$tsize = $this->cached_disk_size($year, $month);
		$tsize2 = $this->bytesToSize1024($tsize,1);
		
		$this->stats['Diskspace']['hd'] = $tsize2;
			
        $dsize = $this->cached_database_filesize($year, $month);	
		$dsize2 = $this->bytesToSize1024($dsize,1);	

		$this->stats['Diskspace']['db'] = $dsize2;
			
		$total_size = $tsize + $dsize + $msize;
		$stotal = $this->bytesToSize1024($total_size,1);

		$this->stats['Diskspace']['value'] = $stotal;
			
		//alowed size
		$rtotal = intval(@file_get_contents($this->prpath .'maxsize.conf.php')); //????????????????????????
		//echo 'Size allowed:',$rtotal;
		$allowed_size = $this->bytesToSize1024($rtotal,1);
		
		$this->stats['Diskspace']['size'] = $allowed_size;
			
		//remaind size
		$remain_size = intval($rtotal - $total_size);
		$rmtotal = $this->bytesToSize1024($remain_size,1);

		$this->stats['Diskspace']['remain'] = $rmtotal;		
		//echo 'Size remain:',$remain_size;
		
		//% remaining total size / space allowed
		$this->stats['Diskspace']['remainsizepercent'] = round($total_size*100/$rtotal);
		//% db size / space used
		$this->stats['Diskspace']['remaindbpercent'] = round($dsize*100/$total_size);
		//% mailbox size / used
		$this->stats['Diskspace']['remainmxpercent'] = round($msize*100/$total_size);
		//% hd size /space used
		$this->stats['Diskspace']['remainhdpercent'] = round($tsize*100/$total_size);	

		/*size % used check */
		if ($this->stats['Diskspace']['remainsizepercent'] > 90) 
			$this->setMessage('warning|'. $this->stats['Diskspace']['remainsizepercent'] .'% of size remain');	
		elseif ($this->stats['Diskspace']['remainsizepercent'] > 80) 
			$this->setMessage('important|'. $this->stats['Diskspace']['remainsizepercent'] .'% of size remain');	
		elseif ($this->stats['Diskspace']['remainsizepercent'] > 70) 
			$this->setMessage('info|'. $this->stats['Diskspace']['remainsizepercent'] .'% of size remain');			

		return ($remain_size);	
	}
	
	protected function cpinfo($s=null) {

		switch ($s) {
			case 'users'        : $ret = "<h2>Users</h2>"; 
								  $ret .= '<p>Total users:'.$this->getStats('Users');  
								  $ret .= '</p>';	
			                      break;
			case 'customers'    : $ret = "<h2>Customers</h2>"; 
								  $ret .= '<p>Total customers:'.$this->getStats('Users','customers');  
								  $ret .= '</p>';
			                      break;
			case 'ulists'       : $ret = "<h2>Mailing Lists</h2>";
								  $ret .= '<p>Total subscribers:'.$this->getStats('Mail','maillist');  
								  $ret .= '</p>';		
			                      break;
			case 'mails'        : $ret = "<h2>Mails</h2>"; 
								  $ret .= '<p><br>Total mails:'.$this->getStats('Mail');  
								  $ret .= '<br>Mails to send:'.$this->getStats('Mail','send'); 
			                      $ret .= '<br>Mails sent:'.$this->getStats('Mail','sent');
								  $ret .= '<br>Data sent:'.$this->getStats('Mail','bytes') .'</p>';
			                      break;
			case 'camps'        : $ret = "<h2>Campaigns</h2>";
								  $ret .= '<p>Total campaigns:'.$this->getStats('Mail','campaigns');  
								  $ret .= '</p>';			
			                      break;
			case 'items'        : $ret = "<h2>Items</h2>";
			                      $ret .= '<p>Total items:'.$this->getStats('Items');  
								  $ret .= '<br>Active items:'.$this->getStats('Items','active'); 
			                      $ret .= '<br>Inactive items:'.$this->getStats('Items','inactive'); 
								  $ret .= '<br>Inactive items:'.$this->getStats('Items','insert');
								  $ret .= '<br>Inactive items:'.$this->getStats('Items','update') . '<hr/>';
								  $ret .= 'Syncs:'.$this->getStats('Sync');  
								  $ret .= '<br>Errors:'.$this->getStats('Sync','noexec'); 
			                      $ret .= '<br>Traffic:'.$this->getStats('Sync','bytes') .'</p>';
			                      break;
			case 'transactions' : $ret = "<h2>Transactions</h2>";
			                      $ret .= '<p>Transactions:'.$this->getStats('Transactions');  
								  $ret .= '<br>Revenue (net):'.$this->getStats('Transactions', 'revenuenet'); 
			                      $ret .= '<br>Revenue:'.$this->getStats('Transactions','revenue');
								  $ret .= '<br>Tax:'.$this->getStats('Transactions','tax') .'</p>';  
			                      break;
			default             : $ret = "<h2>Info</h2>";
								  $ret .= '<p>Disk space used:'.$this->getStats('Diskspace');  
								  $ret .= '<br>HD size:'.$this->getStats('Diskspace','hd'); 
								  $ret .= '<br>DB size:'.$this->getStats('Diskspace','db'); 
								  $ret .= '<br>MX size:'.$this->getStats('Diskspace','mailbox') . '<hr>'; 
			                      $ret .= 'Max space:'.$this->getStats('Diskspace','size') ;
								  $ret .= '<br>Free space:'.$this->getStats('Diskspace','remain') .'</p>';	
		}
		
		return ("cpinfo|".$ret);
	}
	
	protected function set_space($space_in_mb) {
	    $spacefile = $this->prpath . '/maxsize.conf.php';
	    
	    $space = intval($space_in_mb * 1024 * 1024);
		$ok = @file_put_contents($spacefile ,$space);
		
		return ($ok);
	}
	
	//return dpc array for update
	protected function get_dpc_modules() {
	    //read priv dpc dir
		//compare with root dir
		//return array of newer
		$dirname = $this->urlpath . '/cgi-bin/shop/';
		$diffdir = $this->prpath . '/../../cp/upgrade-app/cgi-bin/shop/';
		
		if (is_dir($dirname)) {
			$mydir = dir($dirname);
			while ($fileread = $mydir->read ()) {
				if (($fileread!='.') && ($fileread!='..') && (!is_dir($fileread)))  {
				
				    $sourcetime = @filemtime($dirname.$fileread);
					$targettime = @filemtime($diffdir.$fileread);
					
					if ((is_readable($diffdir.$fileread)) && 
					    ($sourcetime<$targettime)) {
						
						$datemod = date('Y-m-d H:i', $targettime);
						$ret[$fileread] = str_replace('.php','.mod',$fileread) .
						                  '&nbsp;' . localize('_modified',getlocal()) . 
						                  '&nbsp;' . $this->appkey->nicetime($datemod, localize('_ago2',getlocal()));
					}		
				}
			}
            return (!empty($ret) ? $ret : null);			
		}   
		return false;
	}
	
	//return dac pages array for update
	protected function get_dac_pages() {
	    //read priv dpc dir
		//compare with root dir
		//return array of newer
		$dirname = $this->prpath . '/';
		$diffdir = $this->prpath . '/../../cp/upgrade-app/cp/';
		
		if (is_dir($dirname)) {
			$mydir = dir($dirname);
			while ($fileread = $mydir->read ()) {
				if (($fileread!='.') && ($fileread!='..') && (!is_dir($fileread)))  {
				
				    $sourcetime = @filemtime($dirname.$fileread);
					$targettime = @filemtime($diffdir.$fileread);
					
					if ((is_readable($diffdir.$fileread)) && 
					    ($sourcetime<$targettime)) {
						
						$datemod = date('Y-m-d H:i', $targettime);
						$ret[$fileread] = str_replace('.php','.dac',$fileread) .
						                  '&nbsp;' . localize('_modified',getlocal()) . 
						                  '&nbsp;' . $this->appkey->nicetime($datemod, localize('_ago2',getlocal()));
					}				
				}
			}
            return (!empty($ret) ? $ret : null);  			
		}   
		return false;
	}	
	
	protected function get_code_expirations() {
	    //read myconfig specific expiration codes
		//compare dates
		//return array of expirations
		if (!defined('RCCONFIG_DPC')) return false;
		
		$exps = GetGlobal('controller')->calldpc_method("rcconfig.get_expirations");
		$uexps = unserialize($exps);
		if (!empty($uexps)) {
			foreach ($uexps as $section=>$key) {
			    $date = $this->appkey->decode_key($key, $section);
				//echo $section,'--->',$key,'--->',$date,'--->','2013-12-14 10:36';
				if ($date) {
				    $now = time();
				    $diff = strtotime($date) - $now;
					$daystosay = 30 * 24 * 60 *60; //30 days
					if ($diff<($daystosay)) //x days or negative=expired					
						$e[$section] = $this->appkey->nicetime($date); 
				}	
			}
			//print_r($e);
			return ($e);
		}
		
		return false;	
	}
  
	protected function set_addons_list() {
	
		$this->tools['google_analytics'] = '0,0,0,0,0,0,0,1,1';
		$this->tools['add_recaptcha'] = '0,0,0,0,0,0,0,1,1';
		$this->tools['upload_logo'] = '0,0,0,0,0,0,0,1,1';
		$this->tools['add_domainname'] = '0,0,0,0,0,0,0,1,1';
		$this->tools['maildbqueue'] = '0,0,0,0,0,0,0,0,1';
		$this->tools['item_photo'] = '0,0,0,0,0,0,0,1,1';
		//$this->tools['uninstall_maildbqueue'] = '0,0,0,0,0,0,0,1,1';
		//$this->tools['add_addwords'] = '0,0,0,0,0,0,0,1,1';					 
		if ($this->environment['IMPORTDB']>0) {					 
			$this->tools['add_categories']='0,0,0,0,0,0,0,1,1';
			$this->tools['add_products']='0,0,0,0,0,0,0,1,1';
			//print_r($this->tools);
		}
		
		$this->tools['jqgrid'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['ieditor'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['ckfinder'] = '0,0,0,0,0,0,0,0,1';//priv for setup

		$this->tools['edit_htmlfiles'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['cpimages'] = '0,0,0,0,0,0,0,1,1';
		$this->tools['awstats'] = '0,0,0,0,0,0,0,1,1';
		
		//keys
		$this->tools['addkey'] = '0,0,0,0,0,0,0,1,1';//no priv for setup
		$this->tools['genkey'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['validatekey'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		
		/*if ($this->environment['BACKUP']) //has been installed..read string cp.ini???
		  $this->tools['backup'] = '0,0,0,0,0,0,1,1,1'; 
		else //when has no installed the right to install is up to 9 secid*/
		//handled by installed secid if installed
		$this->tools['backup'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		
		$this->tools['eshop'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		//$this->tools['uninstalleshop'] = '0,0,0,0,0,0,0,0,1';//priv for setup		
			
	}  
  

   protected function parse_environment($save_session=false) {	   
	$adminsecid = $_SESSION['ADMINSecID'] ? $_SESSION['ADMINSecID'] : $GLOBALS['ADMINSecID'];
	$this->seclevid = ($adminsecid>1) ? intval($adminsecid)-1 : 1;
	//echo 'ADMINSecID:'.$GLOBALS['ADMINSecID'].':'.$adminsecid.':'.$this->seclevid;
	
    if ($ret = $_SESSION['env']) {
	    //echo 'insession';
		//print_r($ret);
		$GLOBALS['ADMINSecID'] = null; // for securuty erase the global leave the sessionid
	    return ($ret);
	}    

	//$myenvfile = /*$this->prpath .*/ 'cp.ini';
	//$ini = @parse_ini_file($myenvfile ,false, INI_SCANNER_RAW);	
    $ini = @parse_ini_file("cp.ini");
	if (!$ini) die('Environment error!');	
	
	//print_r($ini); 
	foreach ($ini as $env=>$val) {
	    if (stristr($val,',')) {
		    $uenv = explode(',',$val);
			$ret[$env] = $uenv[$this->seclevid];  
		}
		else
		    $ret[$env] = $val;
	}

	if (($save_session) && (!$_SESSION['env'])) 
		SetSessionParam('env', $ret); 		
	
	//print_r($ret);
	return ($ret);
   }   	

	//read environment cp file
	protected function read_env_file($save_session=false) {

		$ret = $this->parse_environment($save_session);	
		return ($ret);
    } 
	
	
    public function select_timeline($template=null, $year=null, $month=null) {
		$year = GetParam('year') ? GetParam('year') : date('Y'); 
	    $month = GetParam('month') ? GetParam('month') : date('m');
		$daterange = GetParam('rdate');
			
	    if ($template) {
			
			$tdata = $this->select_template($template);
			
			for ($y=2015;$y<=intval(date('Y'));$y++) {
				$yearsli .= '<li>'. seturl('t=cp&month='.$month.'&year='.$y, $y) .'</li>';
			}
		
			for ($m=1;$m<=12;$m++) {
				$mm = sprintf('%02d',$m);
				$monthsli .= '<li>' . seturl('t=cp&month='.$mm.'&year='.$year, $mm) .'</li>';
			}	  
	  
	        $posteddaterange = $daterange ? ' > ' . $daterange : ($year ? ' > ' . $month . ' ' . $year : null) ;
	  
			$tokens[] = localize('RCCONTROLPANEL_DPC',getlocal()) . $posteddaterange; 
			$tokens[] = $year;
			$tokens[] = $month;
			$tokens[] = localize('_year',getlocal());
			$tokens[] = $yearsli;
			$tokens[] = localize('_month',getlocal());			
			$tokens[] = $monthsli;	
            $tokens[] = $daterange;			
		
			$ret = $this->combine_tokens($tdata, $tokens); 				
     
			return ($ret);
		}
		
		return null;	
    }

	
	//load graphs urls to call
	protected function load_graph_objects() {
		
        if (defined('RCKATEGORIES_DPC'))		  
			$this->objcall['statisticscat'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=statisticscat&statsid=');
		
        if (defined('RCITEMS_DPC'))		  
			$this->objcall['statistics'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=statistics&statsid=');
		
		if (defined('RCTRANSACTIONS_DPC')) {
			$this->objcall['transactions'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=transactions&statsid=');  		  
			//$this->objcall['users'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=users&statsid=');  		  
			//$this->objcall['subscribers'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=subscribers&statsid=');  		  
		}  
		
		if (defined('RCUSERS_DPC')) {
			$this->objcall['users'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=users&statsid=');  		  
			$this->objcall['subscribers'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=subscribers&statsid='); 		
		}
		
		if (defined('RCBULKMAIL_DPC'))	  
			$this->objcall['mailqueue'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=mailqueue&statsid=');

	}	
	/*
    protected function _show_charts() {
		//$stats = $this->_show_addon_tools(); //tools to enable
	    if (!empty($this->objcall)) {  
		 
 		    foreach ($this->objcall as $report=>$goto) {//goto not used in this case
                $title = localize("_$report",getlocal()); //title
		        if ($this->ajaxgraph)  {//ajax
			        $ts = GetGlobal('controller')->calldpc_method("ajax.setajaxdiv use $report");
			    }
		        elseif ($transtats = GetGlobal('controller')->calldpc_method("swfcharts.create_chart_data use transactions")) {
			        $ts = GetGlobal('controller')->calldpc_method("swfcharts.show_chart use $report+500+240+$this->goto");
			    }						
			    $win1 = new window2($title,$ts,null,1,null,'SHOW',null,1);
	            $stats .= $win1->render();
		        unset ($win1);								 	   
			}
		}

		return ($stats);		 
    }
  
	*/
	
	/* all charts together */
    public function _show_charts() {

	    if (!empty($this->objcall)) {  
		 
 		    foreach ($this->objcall as $report=>$goto) {//goto not used in this case
                $title = localize("_$report",getlocal()); //title							 	   
				$ts = '
					<!-- BEGIN CHART PORTLET-->
                    <div class="widget ">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> '.$title.'</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <div id="'.$report.'"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END CHART PORTLET-->
';		
			}
		}
		return ($ts);//stats);		 
    }	
	
	/* chart one by one */
    public function showChart($report=null) {

	    if ($this->objcall[$report]) {  
		 
            $title = localize("_$report",getlocal()); //title							 	   
			$ts = '
					<!-- BEGIN CHART PORTLET-->
                    <div class="widget ">
                        <div class="widget-title">
                            <h4><i class="icon-reorder"></i> '.$title.'</h4>
                            <span class="tools">
                                <a href="javascript:;" class="icon-chevron-down"></a>
                                <a href="javascript:;" class="icon-remove"></a>
                            </span>
                        </div>
                        <div class="widget-body">
                            <div class="text-center">
                                <div id="'.$report.'"></div>
                            </div>
                        </div>
                    </div>
                    <!-- END CHART PORTLET-->
';		
		}
		return ($ts);//stats);		 
    }	
	
	public function getStats($section=null, $subsection=null) {
		if (!$section) return 0;
		//print_r($this->stats);//[$section]);
		//echo $section,'>',$subsection;
		$sb = $subsection ? $subsection : 'value';
		return ($this->stats[$section][$sb]);
	}	
	
	public function isStats() {
		return (!empty($this->stats) ? true : false);
	}
	
	public function getMessagesTotal() {
		//print_r($this->messages);
		$ret = (empty($this->messages)) ? null : count($this->messages);
		return $ret;		
	}		

	/* cp header */ 
	public function getMessages($template=null, $limit=null) {
		if (empty($this->messages)) return null;
		$tokens = array(); 
		$msgs = array_reverse($this->messages, true);
		$i = 0;
		foreach ($msgs as $n=>$m) {
			$tokens = explode('|', $m); 
			switch (array_shift($tokens)) {
				case 'important' : $tmpl = 'dropdown-task-progress-active'; break;
				case 'success'   : $tmpl = 'dropdown-task-progress-active'; break;
				case 'warning'   : $tmpl = 'dropdown-task-progress-danger'; break;
				case 'info'      :
				default          : $tmpl = 'dropdown-task-progress-danger';
				
			}
			$tdata = $this->select_template($tmpl, 'metro');  //<<<<<<<<<<<<<<<<<<<<<<< !!clear when became default skin
			$ret .= $this->combine_tokens($tdata, $tokens, true);
			unset($tokens);	
			$i+=1;
			if ($i>10) break;
		}
		
		return ($ret);			
	}	
	
	public function setMessage($message=null) {
		if (!$message) return false;
		$id = explode('|',$message);
		$hash = md5($id[0].$id[1]);
		
		if (array_key_exists($hash, $this->messages)) {}
		else {
			$this->messages[$hash] = $message;
			SetSessionParam('cpMessages', $this->messages);
			return true;
		}
		return false;	
	}
	
	public function viewMessages($template=null) {
		if (empty($this->messages)) return;
	    $t = ($template!=null) ? $this->select_template($template) : null;
		//$msgs = array_reverse($this->messages, true);

		foreach ($this->messages as $m=>$message) {
			$tokens = explode('|', $message); 
			$message = $tokens[1];
			if ($t) 	
				$ret .= $this->combine_tokens($t, array(0=>$message));
			else
				$ret .= "<option value=\"$m\">$message</option>";
		}
		return ($ret);
	}	
	
	function select_template($tfile=null, $path=null) {
		if (!$tfile) return;
		$cppath = $path ? $path : $this->cptemplate;
	  
		$template = $tfile . '.htm';	
		$t = $this->prpath . 'html/'. $cppath .'/'. str_replace('.',getlocal().'.',$template) ;   
		if (is_readable($t)) 
			$mytemplate = file_get_contents($t);

		return ($mytemplate);	 
    }		
  
	//tokens method	
	protected function combine_tokens($template, $tokens, $execafter=null) {
	    if (!is_array($tokens)) return;		

		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template;
		  
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
            //echo $tok,'<br>';
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<30;$x++)
		  $ret = str_replace("$".$x."$",'',$ret);
		//echo $ret;
		
		//execute after replace tokens
		if (($execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $retout = $fp->process_commands($ret);
		  unset ($fp);
          
		  return ($retout);
		}		
		
		return ($ret);
	} 	
	
};
}
?>