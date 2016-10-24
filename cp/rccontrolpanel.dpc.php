<?php

$__DPCSEC['RCCONTROLPANEL_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if (!defined("RCCONTROLPANEL_DPC")) { // && (seclevel('RCCONTROLPANEL_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCCONTROLPANEL_DPC",true);

$__DPC['RCCONTROLPANEL_DPC'] = 'rccontrolpanel';

$a = GetGlobal('controller')->require_dpc('libs/appkey.lib.php');
require_once($a);
 
$__EVENTS['RCCONTROLPANEL_DPC'][0]='cp';
$__EVENTS['RCCONTROLPANEL_DPC'][1]='cplogout';
$__EVENTS['RCCONTROLPANEL_DPC'][2]='cplogin';
$__EVENTS['RCCONTROLPANEL_DPC'][3]='cpinfo';
$__EVENTS['RCCONTROLPANEL_DPC'][4]='cpchartshow';
$__EVENTS['RCCONTROLPANEL_DPC'][5]='cptasks';
$__EVENTS['RCCONTROLPANEL_DPC'][6]='cpmessages';
$__EVENTS['RCCONTROLPANEL_DPC'][7]='cpzbackup';
$__EVENTS['RCCONTROLPANEL_DPC'][8]='cpdelMessage';
$__EVENTS['RCCONTROLPANEL_DPC'][9]='cpshowMessages';
$__EVENTS['RCCONTROLPANEL_DPC'][10]='cpsysMessages';
$__EVENTS['RCCONTROLPANEL_DPC'][11]='cpitemVisits';
$__EVENTS['RCCONTROLPANEL_DPC'][12]='cpcatVisits';
$__EVENTS['RCCONTROLPANEL_DPC'][13]='cpinbox';
$__EVENTS['RCCONTROLPANEL_DPC'][14]='cpinboxno';
$__EVENTS['RCCONTROLPANEL_DPC'][15]='cpmessagesno';
$__EVENTS['RCCONTROLPANEL_DPC'][16]='cptasksno';

$__ACTIONS['RCCONTROLPANEL_DPC'][0]='cp';
$__ACTIONS['RCCONTROLPANEL_DPC'][1]='cplogout';
$__ACTIONS['RCCONTROLPANEL_DPC'][2]='cplogin';
$__ACTIONS['RCCONTROLPANEL_DPC'][3]='cpinfo';
$__ACTIONS['RCCONTROLPANEL_DPC'][4]='cpchartshow';
$__ACTIONS['RCCONTROLPANEL_DPC'][5]='cptasks';
$__ACTIONS['RCCONTROLPANEL_DPC'][6]='cpmessages';
$__ACTIONS['RCCONTROLPANEL_DPC'][7]='cpzbackup';
$__ACTIONS['RCCONTROLPANEL_DPC'][8]='cpdelMessage';
$__ACTIONS['RCCONTROLPANEL_DPC'][9]='cpshowMessages';
$__ACTIONS['RCCONTROLPANEL_DPC'][10]='cpsysMessages';
$__ACTIONS['RCCONTROLPANEL_DPC'][11]='cpitemVisits';
$__ACTIONS['RCCONTROLPANEL_DPC'][12]='cpcatVisits';
$__ACTIONS['RCCONTROLPANEL_DPC'][13]='cpinbox';
$__ACTIONS['RCCONTROLPANEL_DPC'][14]='cpinboxno';
$__ACTIONS['RCCONTROLPANEL_DPC'][15]='cpmessagesno';
$__ACTIONS['RCCONTROLPANEL_DPC'][16]='cptasksno';

//$__DPCATTR['RCCONTROLPANEL_DPC']['cp'] = 'cp,1,0,0,0,0,0,0,0,0,0,0,1';

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
$__LOCALE['RCCONTROLPANEL_DPC'][16]='_revenue;Revenue;Αξία';
$__LOCALE['RCCONTROLPANEL_DPC'][17]='_inactives;Inactives;Μη ενεργά';
$__LOCALE['RCCONTROLPANEL_DPC'][18]='_actives;Actives;Ενεργά';
$__LOCALE['RCCONTROLPANEL_DPC'][19]='_resources;Resources;Κατανάλωση χώρου';
$__LOCALE['RCCONTROLPANEL_DPC'][20]='_total;Total;Σύνολο';
$__LOCALE['RCCONTROLPANEL_DPC'][21]='_alerts;Alerts;Ειδοποιήσεις';
$__LOCALE['RCCONTROLPANEL_DPC'][22]='_MENU7;Orders;Κινήσεις';
$__LOCALE['RCCONTROLPANEL_DPC'][23]='_add_categories;Upload Categories;Εισαγωγή κατηγοριών';
$__LOCALE['RCCONTROLPANEL_DPC'][24]='_add_products;Upload Products;Εισαγωγή ειδών';

$__LOCALE['RCCONTROLPANEL_DPC'][25]='_google_addwords;Google Adwords;Google Adwords';
$__LOCALE['RCCONTROLPANEL_DPC'][26]='_upload_logo;Upload logo;Αλλαγή λογοτύπου';
$__LOCALE['RCCONTROLPANEL_DPC'][27]='_add_recaptcha;ReCaptcha;ReCaptcha';
$__LOCALE['RCCONTROLPANEL_DPC'][28]='_update;Update;Αναβάθμιση';
$__LOCALE['RCCONTROLPANEL_DPC'][29]='_backup;Backup;Αποθήκευση';
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
$__LOCALE['RCCONTROLPANEL_DPC'][64]='_edititemtext;Edit Item Text;Μεταβολή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][65]='_deleteitemattachment;Delete Item Attachment;Διαγραφή συνημμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][66]='_editcat;Edit Category;Μεταβολή κατηγορίας';
$__LOCALE['RCCONTROLPANEL_DPC'][67]='_addcat;Add Category;Νέα Κατηγορία';
$__LOCALE['RCCONTROLPANEL_DPC'][68]='_additem;Add Item;Νέο Είδος';
$__LOCALE['RCCONTROLPANEL_DPC'][69]='_webstatistics;Statistics;Στατιστικά';
$__LOCALE['RCCONTROLPANEL_DPC'][70]='_addcathtml;Add Category Html;Προσθήκη κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][71]='_editcathtml;Edit Category Html;Μεταβολή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][72]='_edititem;Edit Item;Μεταβολή είδους';
$__LOCALE['RCCONTROLPANEL_DPC'][73]='_edititemphoto;Edit Photo;Μεταβολή φωτογραφίας';
$__LOCALE['RCCONTROLPANEL_DPC'][74]='_edititemdbhtm;Edit Item Htm;Μεταβολή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][75]='_edititemdbhtml;Edit Item Html;Μεταβολή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][76]='_edititemdbtext;Edit Item Text;Μεταβολή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][77]='_senditemmail;Send e-mail;Αποστολή e-mail';
$__LOCALE['RCCONTROLPANEL_DPC'][78]='_delitemattachment;Delete Text;Διαγραφή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][79]='_edititemtext;Edit Item Text;Μεταβολή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][80]='_edititemhtm;Edit Item Htm;Μεταβολή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][81]='_edititemhtml;Edit Item Html;Μεταβολή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][82]='_additemhtml;Add Item Html;Εισαγωγή κειμένου';
$__LOCALE['RCCONTROLPANEL_DPC'][83]='_transactions;Transactions;Συναλλαγές';
$__LOCALE['RCCONTROLPANEL_DPC'][84]='_users;Users;Χρήστες';
$__LOCALE['RCCONTROLPANEL_DPC'][85]='_itemattachments2db;Add Items to DB;Μεταφορά κειμένων στην Β.Δ.';
$__LOCALE['RCCONTROLPANEL_DPC'][86]='_importdb;Import;Εισαγωγή';
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
$__LOCALE['RCCONTROLPANEL_DPC'][100]='_menu;Menu;Μενού';
$__LOCALE['RCCONTROLPANEL_DPC'][101]='_slideshow;Slideshow;Slideshow';
$__LOCALE['RCCONTROLPANEL_DPC'][102]='_ckfinder;Upload files;Upload αρχείων';
$__LOCALE['RCCONTROLPANEL_DPC'][103]='_webmail;Web Mail;Web Mail';
$__LOCALE['RCCONTROLPANEL_DPC'][104]='_editpage;Edit Page;Επεξεργασία σελίδας';
$__LOCALE['RCCONTROLPANEL_DPC'][105]='_rempass;Forgotten password;Ανάκτηση κωδικού';
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
$__LOCALE['RCCONTROLPANEL_DPC'][131]='_bmailqueue;Responds;Απαντήσεις';
$__LOCALE['RCCONTROLPANEL_DPC'][132]='_bmailqueueadd;Subscribers;Λίστες';
$__LOCALE['RCCONTROLPANEL_DPC'][133]='_bmailsend;Send;Αποστολή';
$__LOCALE['RCCONTROLPANEL_DPC'][134]='_bmail;e-Mail;e-Mail';
$__LOCALE['RCCONTROLPANEL_DPC'][135]='_bmailstats;Statistics;Στατιστική';
$__LOCALE['RCCONTROLPANEL_DPC'][136]='_bmailcamp;Campaigns;Καμπάνιες';
$__LOCALE['RCCONTROLPANEL_DPC'][137]='_ITEMCOLLECTION;Select items;Επιλογή ειδών';
$__LOCALE['RCCONTROLPANEL_DPC'][138]='_GNAVAL;Empty;Μη διαθέσιμο';
$__LOCALE['RCCONTROLPANEL_DPC'][139]='_caddress;Addresses;Διευθύνσεις';
$__LOCALE['RCCONTROLPANEL_DPC'][140]='_susers;Superusers;Διαχειριστές';
$__LOCALE['RCCONTROLPANEL_DPC'][141]='_mins;minutes;λεπτά';
$__LOCALE['RCCONTROLPANEL_DPC'][142]='_hrs;hours;ώρες';
$__LOCALE['RCCONTROLPANEL_DPC'][143]='_days;days;ημέρες';
$__LOCALE['RCCONTROLPANEL_DPC'][144]='_ago;ago;πριν';
$__LOCALE['RCCONTROLPANEL_DPC'][145]='_error;Error;Λάθος';
$__LOCALE['RCCONTROLPANEL_DPC'][146]='_warning;Warning;Προειδοποίηση';
$__LOCALE['RCCONTROLPANEL_DPC'][147]='_important;Important;Σημαντικό';
$__LOCALE['RCCONTROLPANEL_DPC'][148]='_info;Info;Πληροφορία';
$__LOCALE['RCCONTROLPANEL_DPC'][149]='_success;Success;Επιτυχία';
$__LOCALE['RCCONTROLPANEL_DPC'][150]='_message;Message;Μήνυμα';
$__LOCALE['RCCONTROLPANEL_DPC'][151]='_messages;Messages;Μηνύματα';
$__LOCALE['RCCONTROLPANEL_DPC'][152]='_viewallmessages;All messages;Όλα τα μηνύματα';
$__LOCALE['RCCONTROLPANEL_DPC'][153]='_sec;Sec;δευτερόλεπτα';
$__LOCALE['RCCONTROLPANEL_DPC'][154]='_date;Date;Ημερομηνία';
$__LOCALE['RCCONTROLPANEL_DPC'][155]='_type;Type;Τύπος';
$__LOCALE['RCCONTROLPANEL_DPC'][156]='_sale;Invoice created;Παραστατικό πώλησης';
$__LOCALE['RCCONTROLPANEL_DPC'][157]='_installprinter;Install printer;Εγκατάσταση printer';
$__LOCALE['RCCONTROLPANEL_DPC'][158]='_system;System;System';
$__LOCALE['RCCONTROLPANEL_DPC'][159]='_sysmessages;Messages;Μηνύματα';
$__LOCALE['RCCONTROLPANEL_DPC'][160]='_visits;Visits;Επισκέπτες';
$__LOCALE['RCCONTROLPANEL_DPC'][161]='_attr1;Category;Κατηγορία';
$__LOCALE['RCCONTROLPANEL_DPC'][162]='_attr2;Visitor;Επισκέπτης';
$__LOCALE['RCCONTROLPANEL_DPC'][163]='_attr3;Visitor;Επισκέπτης';
$__LOCALE['RCCONTROLPANEL_DPC'][164]='_ip;Ip;Ip';
$__LOCALE['RCCONTROLPANEL_DPC'][165]='_tid;Item;Είδος';
$__LOCALE['RCCONTROLPANEL_DPC'][166]='minute;minute;λεπτό';
$__LOCALE['RCCONTROLPANEL_DPC'][167]='minutes;minutes;λεπτά';
$__LOCALE['RCCONTROLPANEL_DPC'][168]='hour;hour;ώρα';
$__LOCALE['RCCONTROLPANEL_DPC'][169]='hours;hours;ώρες';
$__LOCALE['RCCONTROLPANEL_DPC'][170]='day;day;ημέρα';
$__LOCALE['RCCONTROLPANEL_DPC'][171]='days;days;ημέρες';
$__LOCALE['RCCONTROLPANEL_DPC'][172]='month;month;μήνα';
$__LOCALE['RCCONTROLPANEL_DPC'][173]='months;months;μήνες';
$__LOCALE['RCCONTROLPANEL_DPC'][174]='year;year;έτος';
$__LOCALE['RCCONTROLPANEL_DPC'][175]='years;years;έτη';
$__LOCALE['RCCONTROLPANEL_DPC'][176]='second;second;δεύτερόλεπτο';
$__LOCALE['RCCONTROLPANEL_DPC'][177]='seconds;seconds;δευτερόλεπτα';
$__LOCALE['RCCONTROLPANEL_DPC'][178]='_inactiveuser;Inactive user;Μη ενεργός χρήστης';
$__LOCALE['RCCONTROLPANEL_DPC'][179]='_newactiveuser;New user;Νέος χρήστης';
$__LOCALE['RCCONTROLPANEL_DPC'][180]='_formsubmit;Message;Μηνυμα';
$__LOCALE['RCCONTROLPANEL_DPC'][181]='_unsubinbox;Unsubscribed;Διεγράφη';
$__LOCALE['RCCONTROLPANEL_DPC'][182]='_subinbox;Subscribed;Εγγράφθηκε';
$__LOCALE['RCCONTROLPANEL_DPC'][183]='_login;Login;Login';
$__LOCALE['RCCONTROLPANEL_DPC'][184]='_fblogin;Login (fb);Login (fb)';
$__LOCALE['RCCONTROLPANEL_DPC'][185]='_reginbox;Registration;Εγγραφή';
$__LOCALE['RCCONTROLPANEL_DPC'][186]='_actinbox;Activation;Ενεργοποίηση';

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
	var $turl, $cpGet, $turldecoded, $messages, $tasks;
	var $owner, $seclevid, $cseparator, $map_t, $map_f;
	var $userDemoIds, $crmLevel;
	
	var $rootapp_path, $tool_path;
		
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
		
		$this->owner = $_POST['Username'] ? $_POST['Username'] : GetSessionParam('LoginName');
		$this->seclevid = $GLOBALS['ADMINSecID'] ? $GLOBALS['ADMINSecID'] : $_SESSION['ADMINSecID'];
		
		$this->goto = seturl('t=cp&group='.GetReq('group'));//handle graph selections with no ajax
		
        //READ ENVIRONMENT ATTR
		if ($_SESSION['LOGIN']=='yes') //first time logged in session is not set and constructy has executed!!!!
			$this->environment = $_SESSION['env'] ? $_SESSION['env'] : $this->read_env_file(true);		
		//print_r($this->environment);
		
		//awstats cp window
		$awurl = remote_paramload('RCAWSTATS','file',$this->prpath);
		$this->awstats_url = $awurl ? $awurl :
		                     ((!empty($this->murl)) ? array_pop($this->murl) : str_replace('www.','',$_ENV["HTTP_HOST"]));		
		
		$this->appkey = new appkey();	
		
		$this->rootapp_path = remote_paramload('RCCONTROLPANEL','rootpath',$this->prpath); //'stereobi'; //XIX !!!!
		
		$toolp = remote_paramload('RCCONTROLPANEL','toolpath',$this->prpath);
		$this->tool_path = $toolp ? $toolp : '../../cp/'; //ususaly 2 leveles back from apps (root app must set to /)
		
		$this->messages = GetSessionParam('cpMessages') ? GetSessionParam('cpMessages') : array();
		$this->tasks = GetSessionParam('cpTasks') ? GetSessionParam('cpTasks') : array();
		$this->inbox = GetSessionParam('cpInbox') ? GetSessionParam('cpInbox') : array();		
		
		$this->cptemplate = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->prpath); //metro !!!!
		
		$this->stats = array();
		$this->cpStats = false;
		
		$this->map_t = remote_arrayload('RCITEMS','maptitle',$this->path);	
		$this->map_f = remote_arrayload('RCITEMS','mapfields',$this->path);		
		$csep = remote_paramload('RCITEMS','csep',$this->path); 
        $this->cseparator = $csep ? $csep : '^';		
		
		$this->userDemoIds = array(6,7); //remote_arrayload('RCBULKMAIL','demouser', $this->prpath);
		$this->crmLevel = 9;
				
		//ini_set('max_input_vars', '3000'); //NOT ALLOWED ADD IT TO .HTACCESS
	}
	 	
    function event($sAction) {    	  
	
	   $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	   if ($login!='yes') return null;	
	   
	   $this->autoupdate();	  //!!!!! 
  
	   switch ($sAction) {
	   
	     case 'cpzbackup' : break;
							 
		 case 'cpchartshow': if ($report = GetReq('report')) {//ajax call
		                       $this->hasgraph = _m("swfcharts.create_chart_data use $report");
							   $this->goto = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report='.$report.'&statsid=');
							 }
							 break;

		 case 'cpinboxno'  : //ajax call
							 $tsk = $this->getInboxTotal();
							 die($tsk);
		                     break;							 
		 case 'cpinbox'    : $tsk = $this->getInbox();
							 die($tsk);
							 break;								 

		 case 'cptasksno'  : $this->site_stats();  
		                     if (defined('RCULISTSTATS')) 
								_m('rculiststats.percentofCamps');//task dropdown, set task
		                     $tsk = $this->getTasksTotal();
							 die($tsk);
							 break;	 							 
		 case 'cptasks'    : $this->site_stats(); 
		                     //if (defined('RCULISTSTATS')) NOT 2nd time 
								//_m('rculiststats.percentofCamps');//task dropdown, set task
		                     $tsk = $this->getTasks();
							 die($tsk);
							 break;	   
							 
		 case 'cpmessagesno':$msgs = $this->getMessagesTotal();
							 die($msgs);
							 break;	 							 
		 case 'cpmessages' : $msgs = $this->getMessages();
							 die($msgs);
							 break;	 

		 case 'cpdelMessage': //ajax call
		                     $msgs = $this->storeMessage();
							 die('cpmessages|'.$msgs);
							 break;	

         case 'cpshowMessages' : break;							 
         case 'cpsysMessages'  : break;				 
         case 'cpitemVisits'   : break;							 
         case 'cpcatVisists'   : break;			 
	   	
         case "cplogout"    : $this->logout();
		                     break;
		 case "cplogin"     :$valid = $this->verify_login();
		                     //$this->javascript();							  
							
		 case "cpinfo"      ://ajax call
							 $this->site_stats();  //run stats
							 echo $this->cpinfo($_GET['s']);
							 die();
		                     break;
							 
		 case "cp"          :
		 default         	:
		                     
       }  

    }
  
    function action($sAction) {

	    $login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
	    if ($login!='yes') return null;
	   
	    switch ($sAction) {
		    
			case 'cpzbackup'   : $out = $this->zip_directory(GetReq('zname'),GetReq('zpath'));
			                     break;
		  
		    case 'cpchartshow' : if ($this->hasgraph)//ajax call
		                           $out = _m("swfcharts.show_chart use " . GetReq('report') ."+500+240+$this->goto");								  
							     else
							       $out = "<h3>".localize('_GNAVAL',0)."</h3>";	
							     die(GetReq('report').'|'.$out); //ajax return
								 break;
								 
			case 'cpinboxno'   :					 
			case 'cpinbox'     : 
			case 'cptasksno'   : 
			case 'cptasks'     : 
			case 'cpmessagesno': 
		    case 'cpmessages'  : 
		    case 'cpdelMessage': break;	
			case 'cpshowMessages' : $out = $this->viewPastMessages(); break;				
			case 'cpsysMessages'  : $out = $this->viewSystemMessages(); break;			
			case 'cpitemVisits': $out = $this->viewItemVisits(); break;
			case 'cpcatVisits' : $out = $this->viewCatVisits(); break;			
		  	case "cpinfo"      : break;    
			case "cp"          :	
			default            : $this->getTURL(); //save param for use by metro cp
			
								 $this->site_stats();
		 
							     $this->set_addons_list();
							     $this->load_graph_objects();
			
							 	 $this->_show_update_tools();
							 	 $this->_show_addon_tools();
			  
		} 		 		  

		$this->cpStats = $this->isStats(); 	 
				
	    return ($out);
    } 
	
	public function isDemoUser() {
		return (in_array($this->seclevid, $this->userDemoIds));
	}	
	
	public function isLevelUser($level=6) {
		return ($this->seclevid>=$level ? true : false);
	}	
	
	public function isCrmUser() {
		return ($this->seclevid>=$this->crmLevel ? true : false);
	}		
	
	//save param for use by metro cp
	protected function getTURL() {
		$postedTURL = $_POST['turl'] ? $_POST['turl'] : $_GET['turl']; 
		
		if ($postedTURL) {//a post from login screen
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
		elseif ($turl = $_SESSION['turl']) {//GetSessionParam('turl')) {
			$this->turl = $turl;
			$this->turldecoded = GetSessionParam('turldecoded');
			$this->cpGet = unserialize(base64_decode($_SESSION['cpGet']));			
			//echo 'insession:',print_r($_POST); print_r($this->cpGet);
			return true;
		} 
		
		return false;
	}
	
	//called by footer html
	public function javascript() {		
	
		$js = <<<EOF
		
function createRequestObject() {var ro; var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{ro = new XMLHttpRequest();} return ro;}
var http = createRequestObject();
function sndReqArg(url) { var params = url+'&ajax=1'; http.open('post', params, true); http.setRequestHeader("Content-Type", "text/html; charset=utf-8");
    http.setRequestHeader("encoding", "utf-8");	 http.onreadystatechange = handleResponse;	http.send(null);}
function handleResponse() {if(http.readyState == 4){
	    var response = http.responseText;
        var update = new Array();
        response = response.replace( /^\s+/g, "" );  
        response = response.replace( /\s+$/g, "" ); 
        if(response.indexOf('|' != -1)) { update = response.split('|');
            document.getElementById(update[0]).innerHTML = update[1];
        }}}  		
		function init(){ inbox(); } 	

function inbox()
{
	$.ajax({
	  url: 'cp.php?t=cpinboxno',
	  type: 'GET',
	  success:function(data) {			
			$('#cpinboxno').html(data);
			setTimeout(function() { 
			  $.ajax({
				url: 'cp.php?t=cpinbox',
				type: 'GET',
				success:function(indata) {
					$('#cpinbox').html(indata);
					setTimeout(function() { 
					  $.ajax({
						url: 'cp.php?t=cpmessagesno',
						type: 'GET',
						success:function(mdata) {
							$('#cpmessagesno').html(mdata);
							setTimeout(function() { 
							  $.ajax({
								url: 'cp.php?t=cpmessages',
								type: 'GET',
								success:function(msdata) {
									$('#cpmessages').html(msdata);
									setTimeout(function() { 
									  $.ajax({
										url: 'cp.php?t=cptasksno',
										type: 'GET',
										success:function(tdata) {
											$('#cptasksno').html(tdata);
											setTimeout(function() { 
											  $.ajax({
												url: 'cp.php?t=cptasks',
												type: 'GET',
												success:function(tsdata) {
													$('#cptasks').html(tsdata);
												}
											  });
											}, 50);											
										}
									  });
									}, 40);									
								}
							  });
							}, 30);							
						}
					  });
					}, 20); 					
				}
			  });
			}, 10);  
	  }
	}); 
}

$(document).ready(function(){
	inbox();
	window.setInterval("inbox()",60100);	
});	
EOF;

		return $js;
	}	  

  
    protected function _show_addons() {//$template=false) { 
      $winh = 'SHOW';
	
      if (!empty($this->environment)) {    
      foreach ($this->environment as $mod=>$val) {
	    
		if ($val) {//enabled
		   $module = strtolower($mod);
		   switch ($module) {
		       case 'dashboard' : $text=null; break; //bypass
			   case 'ckfinder'  : $text=null; break; //bypass
			   
			   case 'edithtml'  : //$text = $this->edit_html_files(false);//true); //cke4
			                      //$winh = 'HIDE';
			                      break; 
			   
			   case 'menu'      : $text=null; break; //bypass

		       case 'awstats'   : //$text = "<a href='cgi-bin/awstats.php'>Awstats</a>";
							   $url = "cgi-bin/awstats.pl?config=". $this->awstats_url ."&framename=mainright#top";
					           $text .= "<IFRAME SRC=\"$url\" TITLE=\"awstats\" WIDTH=100% HEIGHT=400>
										<!-- Alternate content for non-supporting browsers -->
										<H2>Awstats</H2>
										<H3>iframe is not suported in your browser!</H3>
										</IFRAME>";	
                               //$winh = 'SHOW';										
			                   break;			   
		       case 'siwapp' : $text = "<a href='../siwapp/'>Siwapp</a>"; 
			                   /*$url = "http://".str_replace('www.','',$_ENV["HTTP_HOST"])."/siwapp/";			   
					           $text .= "<IFRAME SRC=\"$url\" TITLE=\"siwapp\" WIDTH=100% HEIGHT=400>
										<!-- Alternate content for non-supporting browsers -->
										<H2>Siwapp</H2>
										<H3>iframe is not suported in your browser!</H3>
										</IFRAME>";	*/
							   //$winh = 'SHOW';			
			                   break;
		       default       : $text = null;
			                   //$winh = 'SHOW';
		   }
		  
		   if ($text) {
		    //echo $text,'<br/>';
			$mtitle = localize('_'.$module, getlocal());
		    $tool_url = "help/$module/";
			$this->stats['Addons']['url'][] = $tool_url;
			$this->stats['Addons']['href'][] = $text;
			$_more = localize('_more',getlocal());
		    $ao = '<div class="msg-time-chat">
                        <a class="message-img" href="'.$tool_url.'"><img alt="" src="images/'.$module.'.png" class="avatar"></a>
                        <div class="message-body msg-in">
                            <span class="arrow"></span>
                            <div class="text">
                                <p>'.$text.'</p>
								<!--p class="attribution"><a href="/help/'.$module.'/">'.$_more.'</a> at 1:55pm, 13th April 2013</p-->
                            </div>
                        </div>
                   </div>';
			$this->stats['Addons']['html'] .= $ao;
		   }		   
		}  
      }		
	  }//if

      return ($addons);	
    }
  
    protected function _show_addon_tools() {
	  $sl = ($this->seclevid>1) ? intval($this->seclevid)-1 : 1;
	  //$sl = $this->seclevid;
	  //echo $sl;
      //print_r($this->environment);
      //print_r($this->tools);echo $seclevelid;
	
      if (!empty($this->tools)) {    
      foreach ($this->tools as $tool=>$u_ison) {
	    $peruser_ison = explode(',',$u_ison);
		$ison = $peruser_ison[$sl];
		
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
										$message = localize('_uninstalleshop',getlocal());
			                            if ($valid = $this->is_valid_eshop()) {//uninstall
										 
											$message .= ' ('.$valid.')';
									
										    //you can unistall before expired
											if ($e1 = $this->call_wizard_url('uninstalleshop')) 
											  $text = "<a href='$e1'>".$message."</a>"; 	
											else
 										      $text = "Unknown tool.";
										}
                                        else {//uninstall
										    if ($e1 = $this->call_wizard_url('uninstalleshop')) 
											  $text = "<a href='$e1'>".$message."</a>"; 	
											else
 										      $text = "Unknown tool.";
                                        }										
                                        break;
               case 'ckfinder':         $text = "CKfinder installed"; break;
               case 'ieditor' :         $text = "IEditor installed"; break;
			   case 'printer' :         $text = "Printer installed"; break;
			   case 'awstats' :         $text = "AWStats installed"; break;	
			   
			   case 'edit_htmlfiles':   //$text = $this->edit_html_files(false, true, true);
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
		elseif ((!empty($this->environment)) && (array_key_exists(strtoupper($tool),$this->environment)) && 
		        ($this->environment[strtoupper($tool)]==0)) {
					
			//installed tool no privilege
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
               case 'printer' :          if ((!is_dir($this->prpath.'/printer')) &&
			                                ($e1 = $this->call_wizard_url('printer'))) 
											$text = "<a href='$e1'>".localize('_installprinter',getlocal())."</a>"; 	
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
		
		$upgrade_root_path = $this->prpath . $this->tool_path . 'upgrade-app/';	
		$update_root_path = $this->prpath . $this->tool_path . 'update-app/'; 
		
		$r_path = $isupdate ? $update_root_path : $upgrade_root_path;
		
	    $inifile = $r_path . "cpwizard-".$addon.".ini";
		$target_inifile = $this->prpath . "cpwizard-".$addon.".ini";
		$installed_inifile = str_replace('.ini','._ni',$target_inifile);
		//echo $inifile,'<br/>';
		
		if ((is_readable($target_inifile)) || ((is_readable($inifile)))){//already copied or fetch from root app

            /*$url = $isupdate ? seturl('t=cpwupdate&wf='.$addon) : 
			                   seturl('t=cpupgrade&wf='.$addon);*/
			//in case of update url is the same...as upgrade
            $url = 'cpupgrade.php?wf='.$addon; //seturl('t=cpupgrade&wf='.$addon);			
		}
        else
            $url = false; 		
			
        return ($url);		
    }
  
    //read update ini files
    function read_update_directory() {
  
		$dirname = $this->prpath . $this->tool_path . 'update-app/';
  
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
  
  
  
  
 	public function sqlDateRange($fieldname, $istimestamp=false, $and=false) {
		$sqland = $and ? ' AND' : null;
		if ($daterange = GetParam('rdate')) {//post
			$range = explode('-',$daterange);
			$dstart = str_replace('/','-',trim($range[0]));
			$dend = str_replace('/','-',trim($range[1]));
			if ($istimestamp)
				$dateSQL = $sqland . " DATE($fieldname) BETWEEN STR_TO_DATE('$dstart','%m-%d-%Y') AND STR_TO_DATE('$dend','%m-%d-%Y')";
			else			
				$dateSQL = $sqland . " $fieldname BETWEEN STR_TO_DATE('$dstart','%m-%d-%Y') AND STR_TO_DATE('$dend','%m-%d-%Y')";		
		}				
		elseif ($y = GetReq('year')) {
			if ($m = GetReq('month')) { $mstart = $m; $mend = $m;} else { $mstart = '01'; $mend = '12';}
			$daysofmonth = cal_days_in_month(CAL_GREGORIAN, $m, $y);
				
			if ($istimestamp)
				$dateSQL = $sqland . " DATE($fieldname) BETWEEN '$y-$mstart-01' AND '$y-$mend-$daysofmonth'";
			else
				$dateSQL = $sqland . " $fieldname BETWEEN '$y-$mstart-01' AND '$y-$mend-$daysofmonth'";
		}	
        else {
			//always this year by default
			//$mstart = '01'; $mend = '12';
			//always this month by default
			$mstart = date('m'); $mend = date('m');
			$y = date('Y');
			$daysofmonth = date('t');
			
			if ($istimestamp)
				$dateSQL = $sqland . " DATE($fieldname) BETWEEN '$y-$mstart-01' AND '$y-$mend-$daysofmonth'";
			else
				$dateSQL = $sqland . " $fieldname BETWEEN '$y-$mstart-01' AND '$y-$mend-$daysofmonth'";	
            //echo $dateSQL;			
		}	
		
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
			$this->setTask('danger|Upgrade your hosting plan|99');		
		
        if ($id = $this->cpGet['id']) {
			//return (0); //test bypass
			$timeins = $this->sqlDateRange('date', true, true);	
			
			//stats
			$sSQL = "select count(id) from stats where tid='$id' " . $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['value'] = $this->nformat($res->fields[0]);		

			$sSQL = "select distinct count(attr2) from stats where tid='$id' " . $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['unique'] = $this->nformat($res->fields[0]);				
			
			$sSQL = "select count(id) from stats where tid='$id' and attr1='cartin'" . $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['cartin'] = $this->nformat($res->fields[0]);	

			$sSQL = "select count(id) from stats where tid='$id' and attr1='cartout'" . $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['cartout'] = $this->nformat($res->fields[0]);
	
	        //wishlists
			$sSQL = "select count(recid) from wishlist where tid='$id' and listname='wishlist'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['wishlist'] = $this->nformat($res->fields[0]);

			$sSQL = "select count(recid) from wishlist where tid='$id' and listname='compares'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['compares'] = $this->nformat($res->fields[0]);		

			$sSQL = "select count(recid) from wishlist where tid='$id' and listname='favorites'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['favorites'] = $this->nformat($res->fields[0]);	

			$sSQL = "select count(recid) from wishlist where tid='$id'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['wishall'] = $this->nformat($res->fields[0]);
			
			//ypoloipo
			$sSQL = "select ypoloipo1 from products where ". $this->getmapf('code') ."='$id'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Item']['ypoloipo1'] = $this->nformat($res->fields[0]);
			
			//return (0); //test bypass
			
			//transactions
			$timeins = $this->sqlDateRange('tdate', false, true);
			
			$sSQL = "select count(recid) from transactions where tstatus>=0 and tdata like '%$id%'" . $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Purchase']['transactions'] = $this->nformat($res->fields[0]);

			$sSQL = "select tdata from transactions where tstatus>=0 and tdata like '%$id%'" . $timeins;
			$result = $db->Execute($sSQL,2);
			//echo $sSQL;	   
			$counter = 0;
			$qty = 0;
			$value = 0;
			foreach ($result as $n=>$rec) {	
				$tdata = $rec['tdata'];
				if ($tdata) {
					$cdata = unserialize($tdata);
					foreach ($cdata as $i=>$buffer_data) {
						$param = explode(";",$buffer_data);
						if ($param[0]==$id) {
							$counter += 1;
							$qty += $param[9];
							$value += $param[9] * floatval(str_replace(',','.',$param[8]));
							//echo "<br/>" . $param[9]. ' * '.$param[8];
						}  	
					}	 
				} 
			} 
			$this->stats['Purchase']['orders'] = $this->nformat($counter);	
			$this->stats['Purchase']['qty'] = $this->nformat($qty);
			$this->stats['Purchase']['value'] = $this->nformat($value, 2);

		}
		elseif ($cat = $this->cpGet['cat']) {
			//return (0); //test bypass
			$timeins = $this->sqlDateRange('date', true, true);	
			
			//stats (category)
			$sSQL = "select count(id) from stats where attr1='$cat' " . $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['value'] = $this->nformat($res->fields[0]);			
			
			$sSQL = "select distinct count(attr2) from stats where attr1='$cat' " . $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Visits']['unique'] = $this->nformat($res->fields[0]);	


			/**** find category's items ***/
			$activecode = 	$this->getmapf('code');
			$mcat = explode($this->cseparator, $cat);
			foreach ($mcat as $c=>$category)
				$catSQL .= " AND cat$c = " . $db->qstr(_m("cmsrt.replace_spchars use $category+1"));
			
			//items
			$sSQL = "select $activecode from products where active>0 AND itmactive>0 " . $catSQL;
			$result = $db->Execute($sSQL,2);
			foreach ($result as $i=>$rec) $items[] = $rec[0];
			$this->stats['Items']['active'] = count($items);
			
			$sSQL = "select count($activecode) from products where (active=0 OR itmactive=0) " . $catSQL;
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['inactive'] = $this->nformat($res->fields[0]);				

	        //stats (items)
			$sSQL = "select count(id) from stats where tid in ('" . implode("','", $items) . "') " . $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['visits'] = $this->nformat($res->fields[0]);				
			
			//wishlists
			$sSQL = "select count(recid) from wishlist where tid in ('" . implode("','", $items) . "') ";
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['wishall'] = $this->nformat($res->fields[0]);
			
			//return (0); //test bypass
			
			//transactions
			$timeins = $this->sqlDateRange('tdate', false, true);
			
			$sSQL = "select count(recid) from transactions where tstatus>=0 and tdata REGEXP '". implode('|', $items) ."'" . $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['transactions'] = $this->nformat($res->fields[0]);

			$sSQL = "select tdata from transactions where tstatus>=0 and tdata REGEXP '". implode('|', $items) ."'" . $timeins;
			$result = $db->Execute($sSQL,2);
			//echo $sSQL;	   
			$counter = 0;
			$qty = 0;
			$value = 0;
			foreach ($result as $n=>$rec) {	
				$tdata = $rec['tdata'];
				if ($tdata) {
					$cdata = unserialize($tdata);
					foreach ($cdata as $i=>$buffer_data) {
						$param = explode(";",$buffer_data);
						if (in_array($param[0], $items)) {
							$counter += 1;
							$qty += $param[9];
							$value += $param[9] * floatval(str_replace(',','.',$param[8]));
							//echo "<br/>" . $param[9]. ' * '.$param[8];
						}  	
					}	 
				} 
			} 
			$this->stats['Items']['orders'] = $this->nformat($counter);	
			$this->stats['Items']['qty'] = $this->nformat($qty);
			$this->stats['Items']['income'] = $this->nformat($value, 2);			
		}		
		else {
			//users items lists etc
            $sSQL = "select count(id) from users";
			$res = $db->Execute($sSQL,2);
            $this->stats['Users']['value'] = $this->nformat($res->fields[0]);			
			
            $sSQL = "select count(id) from users where subscribe=1"; /** default label in ulist **/
			$res = $db->Execute($sSQL,2);	
            $this->stats['Users']['Subscribers'] = $this->nformat($res->fields[0]);
			
            $sSQL = "select count(id) from customers";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Users']['customers'] = $this->nformat($res->fields[0]);			
			
            $sSQL = "select count(id) from ulists";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Mail']['maillist'] = $this->nformat($res->fields[0]);			

            $sSQL = "select count(id) from pphotos where stype='SMALL'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['DbPicSmall'] = $this->nformat($res->fields[0]);			
			
            $sSQL = "select count(id) from pphotos where stype='MEDIUM'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['DbPicMedium'] = $this->nformat($res->fields[0]);			
			
            $sSQL = "select count(id) from pphotos where stype='LARGE'";
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['DbPicLarge'] = $this->nformat($res->fields[0]);
			
            $sSQL = "select count(id) from pattachments";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Items']['Attachments'] = $this->nformat($res->fields[0]);			
			
            //products
            $timeins = $this->sqlDateRange('sysins', false, false);	
			$where = $timeins ? ' where ' : null;
		    //$sSQL = "select id,substr(sysins,1,4) as year,substr(sysins,6,2) as month from products where substr(sysins,1,4)='$year' and substr(sysins,6,2)='$month'";
			$sSQL = "select count(id) from products where" . $where .  $timeins;
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['insert'] = $this->nformat($res->fields[0]);			
					
			$timeupd = $this->sqlDateRange('sysupd', false, false);			 
			$where = $timeupd ? ' where ' : null;
		    //$sSQL = "select id,substr(sysupd,1,4) as year,substr(sysupd,6,2) as month from products where substr(sysupd,1,4)='$year' and substr(sysupd,6,2)='$month'";
			$sSQL = "select count(id) from products" . $where . $timeupd;
			$res = $db->Execute($sSQL,2);
            $this->stats['Items']['update'] = $this->nformat($res->fields[0]);			
								
            $sSQL = "select count(id) from products where itmactive=1 and active=101";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Items']['active'] = $this->nformat($res->fields[0]);			
						
            $sSQL = "select count(id) from products where (itmactive=0 and active=0) or (itmactive is null and active is null)";//or...
			$res = $db->Execute($sSQL,2);	
            $this->stats['Items']['inactive'] = $this->nformat($res->fields[0]);			
						
            $sSQL = "select count(id) from products";
			$res = $db->Execute($sSQL,2);	
            $this->stats['Items']['value'] = $this->nformat($res->fields[0]);


			//transactions
			$timein = $this->sqlDateRange('tdate', false, true);
			$sSQL = "select count(recid) from transactions where tstatus>=0 " . $timein;
			//echo $sSQL;
			$res = $db->Execute($sSQL,2);
			$this->stats['Transactions']['value'] = $res->fields[0] ? $this->nformat($res->fields[0]) : 0;			
			
		    $sSQL = "select sum(cost),sum(costpt) from transactions where tstatus>=0 " . $timein;
			//echo $sSQL;	
			$res = $db->Execute($sSQL,2);
			$this->stats['Transactions']['revenuenet'] = $this->nformat($res->fields[0],2);
			$this->stats['Transactions']['revenue'] = $this->nformat($res->fields[1],2);			
			$this->stats['Transactions']['tax'] = $this->nformat((floatval($res->fields[1]) - floatval($res->fields[0])),2);			
			
			//mail, campaigns
			$timein = $this->sqlDateRange('timein', true, true);			
		    $sSQL = "select count(id) from mailqueue where active=0 " . $timein;
			$res = $db->Execute($sSQL,2);
            //$this->stats['Mail']['sent'] = $this->nformat($res->fields[0]);		
			$this->stats['Mail']['value'] = $this->nformat($res->fields[0]);		
			
			$sSQL = "select count(id) from mailqueue where active=1 " . $timein;
			$res = $db->Execute($sSQL,2);
            $this->stats['Mail']['send'] = $this->nformat($res->fields[0]);				

		    $sSQL = "select count(id) from mailcamp where active=1 " . $timein;
			$res = $db->Execute($sSQL,2);
            $this->stats['Mail']['campaigns'] = $this->nformat($res->fields[0]);			
			
			return (0); //test bypass			

			//synsql
			$timein = $this->sqlDateRange('time', true, true);//false);			 
			//$where = $timein ? ' where ' : null;
			//$sSQL = "select count(id), sum(CHAR_LENGTH(sqlquery)) from syncsql" . $where . $timein;
			$sSQL = "select count(id), sum(CHAR_LENGTH(sqlquery)) from syncsql where reference NOT LIKE 'system' and reference NOT LIKE 'cron' " . $timein;
			$res = $db->Execute($sSQL,2);
			
            $this->stats['Sync']['value'] = $this->nformat($res->fields[0]);		
			$this->stats['Sync']['bytes'] = $this->bytesToSize1024($res->fields[1],1); //$chars_send,1);
			
			$timein = $this->sqlDateRange('time', true, true);			 
			$sSQL = "select count(id) from syncsql where status <> 1 " . $timein;
			$res = $db->Execute($sSQL,2);			
			$this->stats['Sync']['noexec'] = $this->nformat($res->fields[0]); 			
			
			//mail campaigns
			$timein = $this->sqlDateRange('timein', true, false);
            $where = $timein ? ' where ' : null;			
			$sSQL = "select count(id), sum(CHAR_LENGTH(body)) from mailqueue" . $where . $timein;
			//echo $sSQL;
			$res = $db->Execute($sSQL,2);
			
			$this->stats['Mail']['value'] = $this->nformat($res->fields[0]); 
			$this->stats['Mail']['bytes'] = $this->bytesToSize1024($res->fields[1],1); //$chars_send,1);		

		    $sSQL = "select count(id) from mailqueue " . $where . $timein;;
			$res = $db->Execute($sSQL,2);
            $this->stats['Mail']['value'] = $this->nformat($res->fields[0]);			

		}  

        return (1);     	
    }
	
	protected function nformat($n, $dec=0) {
		return (number_format($n,$dec,',','.'));
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
	
    protected function cached_mail_size($cahcetime=null) {
	   $path = '/home/'.$this->rootapp_path.'/mail/' . str_replace('www.','',$this->url);
       $name = 'a';//strval(date('Ymd'));
       $msize = $this->prpath . $name . '-msize.size';
	   $size = 0;
	   
	   $filemtime = @filemtime($msize);
	   $cache_life = $cahcetime ? $cahcetime : 86400; //1 day
	   
       if ((is_readable($msize)) && (time() - $filemtime <= $cache_life)) {
	        //echo $msize;
			$size = @file_get_contents($msize);

	   }
	   else { 
            $size = $this->filesize_r($path);
			@file_put_contents($msize, $size);
	   }
	   
	   return ($size);
    }	
  	
	
    protected function cached_disk_size($cahcetime=null) {
  	   $path = $this->application_path; 
       $name = 'a';//strval(date('Ymd'));
       $tsize = $this->prpath . $name . '-tsize.size';
	   $size = 0;
	   
	   $filemtime = @filemtime($tsize);
	   $cache_life = $cahcetime ? $cahcetime : 86400; //1 day
	   
       if ((is_readable($tsize)) && (time() - $filemtime <= $cache_life)) {	   
	        //echo $tsize;
			$size = @file_get_contents($tsize);

	   }
	   else {
            $size = $this->filesize_r($path);
			@file_put_contents($tsize, $size);
	   }
	   
	   return ($size);
    }	
	
    protected function cached_database_filesize($cahcetime=null) {
      $db = GetGlobal('db'); 
      $name = 'a'; //strval(date('Ymd'));
      $dsize = $this->prpath . $name . '-dsize.size';	
	
	  $filemtime = @filemtime($dsize);
	  $cache_life = $cahcetime ? $cahcetime : 86400; //1 day
	   
      if ((is_readable($dsize)) && (time() - $filemtime <= $cache_life)) {
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
		
		$msize = $this->cached_mail_size();
		$msize2 = $this->bytesToSize1024($msize,1);

		$this->stats['Diskspace']['mailbox'] = $msize2;	
				
		$tsize = $this->cached_disk_size();
		$tsize2 = $this->bytesToSize1024($tsize,1);
		
		$this->stats['Diskspace']['hd'] = $tsize2;
			
        $dsize = $this->cached_database_filesize();	
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
			$this->setTask('danger|'. $this->stats['Diskspace']['remainsizepercent'] .'% of size in use|'.$this->stats['Diskspace']['remainsizepercent'].'|#');	
		elseif ($this->stats['Diskspace']['remainsizepercent'] > 80) 
			$this->setTask('warning|'. $this->stats['Diskspace']['remainsizepercent'] .'% of size in use|'.$this->stats['Diskspace']['remainsizepercent'].'|#');	
		elseif ($this->stats['Diskspace']['remainsizepercent'] > 70) 
			$this->setTask('info|'. $this->stats['Diskspace']['remainsizepercent'] .'% of size in use|'.$this->stats['Diskspace']['remainsizepercent'].'|#');			

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
		$diffdir = $this->prpath . $this->tool_path . 'upgrade-app/cgi-bin/shop/';
		
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
		$diffdir = $this->prpath . $this->tool_path . 'upgrade-app/cp/';
		
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
		
		$exps = _m("rcconfig.get_expirations");
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
		$this->tools['add_domainname'] = '0,0,0,0,0,0,0,0,1';
		$this->tools['maildbqueue'] = '0,0,0,0,0,0,0,0,1';
		$this->tools['item_photo'] = '0,0,0,0,0,0,0,0,1';
		//$this->tools['uninstall_maildbqueue'] = '0,0,0,0,0,0,0,1,1';
		//$this->tools['add_addwords'] = '0,0,0,0,0,0,0,1,1';					 		
		//$this->tools['jqgrid'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['ieditor'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['printer'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['ckfinder'] = '0,0,0,0,0,0,0,0,1';//priv for setup

		$this->tools['edit_htmlfiles'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['cpimages'] = '0,0,0,0,0,0,0,1,1';
		$this->tools['awstats'] = '0,0,0,0,0,0,0,1,1';
		
		//keys
		$this->tools['addkey'] = '0,0,0,0,0,0,0,1,1';//no priv for setup
		$this->tools['genkey'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['validatekey'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['backup'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		$this->tools['eshop'] = '0,0,0,0,0,0,0,0,1';//priv for setup
		//$this->tools['uninstalleshop'] = '0,0,0,0,0,0,0,0,1';//priv for setup		
			
	}  
  
   //public::(called also from wizards)
   public function parse_environment($save_session=false) {	   
	$sl = ($this->seclevid>1) ? intval($this->seclevid)-1 : 1;
	
    if ($ret = $_SESSION['env']) {
	    //echo 'insession';
		//print_r($ret);
		$GLOBALS['ADMINSecID'] = null; // for security erase the global leave the sessionid
	    return ($ret);
	}    

	//$myenvfile = /*$this->prpath .*/ 'cp.ini';
	//$ini = @parse_ini_file($myenvfile ,false, INI_SCANNER_RAW);	
    $ini = @parse_ini_file($this->prpath . "cp.ini");
	if (!$ini) die('Environment error!');	
	
	//print_r($ini); 
	foreach ($ini as $env=>$val) {
	    if (stristr($val,',')) {
		    $uenv = explode(',',$val);
			$ret[$env] = $uenv[$sl];  
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
		$t = GetReq('t') ? GetReq('t') : 'cp';
		$year = GetParam('year') ? GetParam('year') : date('Y'); 
	    $month = GetParam('month') ? GetParam('month') : date('m');
		$daterange = GetParam('rdate');
			
	    if ($template) {
			
			$tdata = $this->select_template($template);
			
			for ($y=2015;$y<=intval(date('Y'));$y++) {
				$yearsli .= '<li>'. seturl('t='.$t.'&month='.$month.'&year='.$y, $y) .'</li>';
			}
		
			for ($m=1;$m<=12;$m++) {
				$mm = sprintf('%02d',$m);
				$monthsli .= '<li>' . seturl('t='.$t.'&month='.$mm.'&year='.$year, $mm) .'</li>';
			}	  
			
			//call cpGet from rcpmenu not this (only def action)
			$cpGet = _v('rcpmenu.cpGet');	
			if ($id = $cpGet['id'])
				$section = ' &gt ' . $this->getItemName($id);
			elseif ($cat = $cpGet['cat'])
				$section = ' &gt ' . str_replace($this->cseparator, ' &gt ', _m("cmsrt.replace_spchars use $cat+1"));
			else
				$section = null;
	  
	        $posteddaterange = $daterange ? ' &gt ' . $daterange : ($year ? ' &gt ' . $month . ' ' . $year : null) ;
	  
			$tokens[] = localize('RCCONTROLPANEL_DPC',getlocal()) . $section . $posteddaterange; 
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

	/* cp header messages and tasks */ 	
	public function getMessagesTotal() {
		//$ret = (empty($this->messages)) ? 0 : count($this->messages);
		$db = GetGlobal('db');	
		$sSQL = "SELECT count(id) from stats where tid='action' and DATE(date) BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 1 DAY ) ) AND DATE ( NOW() )order by date desc";
		$result = $db->Execute($sSQL);		
		$ret = $result->fields[0];
		
		return ($ret>10) ? '10' : strval($ret);		
	}	

	public function getMessages($limit=null) {
		$db = GetGlobal('db');	
		$lim = $limit ? $limit : 10;
		//$tdata = $this->select_template('dropdown-inbox-message');
		
		$sSQL = "SELECT date,tid,attr1,attr3 from stats where tid='action' and DATE(date) BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 1 DAY ) ) AND DATE ( NOW() ) order by date desc limit " . $lim;
		$resultset = $db->Execute($sSQL);
		
		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {		
			
			switch ($rec['attr1']) {
				case 'fblogin'     : $text = localize('_fblogin',getlocal()); $cmd = 'cpusers.php'; $tmpl = 'dropdown-notification-info'; break;
				case 'fblogout'    : $text = localize('_logout',getlocal()); $cmd = 'cpusers.php'; $tmpl = 'dropdown-notification-important'; break;				
				case 'login'       : $text = localize('_login',getlocal()); $cmd = 'cpusers.php'; $tmpl = 'dropdown-notification-info'; break; 
				case 'logout'      : $text = localize('_logout',getlocal()); $cmd = 'cpusers.php'; $tmpl = 'dropdown-notification-important'; break;
				case 'xyz'         : $text = localize('_formsubmit',getlocal()); $cmd = 'cpform.php'; $tmpl = 'dropdown-notification-success'; break;
				default            : $text = null;  $cmd = 'cpform.php'; $tmpl = 'dropdown-notification-warning'; 
			}
			//if (!$text) continue;
			
			$tokens[] = $rec['attr3'] . ' ' . $text;
			$tokens[] = $this->timeSayWhen(strtotime($rec[0]));			
			$tokens[] = $cmd;
			
			$tdata = $this->select_template($tmpl);
			$ret .= $this->combine_tokens($tdata, $tokens, true);
			unset($tokens);	
		}
		
		return ($ret);			
	}		

	public function getMessages_OLD($limit=null) {
		if (empty($this->messages)) return null;
		//print_r($this->messages);
		$tokens = array(); 
		$lim = $limit ? $limit : 6;
		$msgs = array_reverse($this->messages, true);
		$i = 0;
		foreach ($msgs as $n=>$m) {
			
			$tokens = explode('|', $m); 
			$tokens[] = $n; //add hash (for future deletes of msg)
			
			switch (array_shift($tokens)) { //rest is msg|time|action + hash of msg
				case 'important' : $tmpl = 'dropdown-notification-important'; break;
				case 'success'   : $tmpl = 'dropdown-notification-success'; break;
				case 'warning'   : $tmpl = 'dropdown-notification-warning'; break;
				case 'error'     : $tmpl = 'dropdown-notification-error'; break;
				case 'info'      :
				default          : $tmpl = 'dropdown-notification-info';
				
			}
			$tdata = $this->select_template($tmpl);
			$ret .= $this->combine_tokens($tdata, $tokens, true);
			unset($tokens);	
			$i+=1;
			if ($i>$lim) break;
		}
		
		return ($ret);			
	}	
	
	/*delete msg from queue return rest-ajax*/
	public function storeMessage($limit=null) {
		$db = GetGlobal('db');	
		if (empty($this->messages)) return null;
		if (!$h = GetReq('hash')) return null;
		//print_r($this->messages);
		$tokens = array(); 
		$lim = $limit ? $limit : 6;
		
		//insert message into db
		$sSQL = "insert into cpmessages (hash, msg, type, owner) values (";
		$sSQL.= $db->qstr($h) . ",";
		$sSQL.= $db->qstr(GetReq('msg')) . ",";
		$sSQL.= $db->qstr(GetReq('type')) . ",";
		$sSQL.= $db->qstr($this->owner);
		$sSQL.= ")";
		//echo $sSQL;
		$result = $db->Execute($sSQL,1);			 
		$ret = $db->Affected_Rows(); 
		
		if ($ret) {
		
		  //delete msg from session
		  $nm = array();
		  foreach ($this->messages as $hash=>$message) {
			if ($h!=$hash) $nm[$hash] = $message;
		  }
		  $this->messages = (empty($nm)) ? null : $nm;
		  SetSessionParam('cpMessages', $nm);
		  if (empty($nm)) return null;
		
		  //send out rest queue
		  $msgs = array_reverse($nm, true);
		  $i = 0;
		  foreach ($msgs as $n=>$m) {
			$tokens = explode('|', $m); 
			switch (array_shift($tokens)) {
				case 'important' : $tmpl = 'dropdown-notification-important'; break;
				case 'success'   : $tmpl = 'dropdown-notification-success'; break;
				case 'warning'   : $tmpl = 'dropdown-notification-warning'; break;
				case 'error'     : $tmpl = 'dropdown-notification-error'; break;
				case 'info'      :
				default          : $tmpl = 'dropdown-notification-info';
				
			}
			$tdata = $this->select_template($tmpl);
			$ret .= $this->combine_tokens($tdata, $tokens, true);
			unset($tokens);	
			$i+=1;
			if ($i>$lim) break;
		  }
		
		}//insert to db
		
		return ($ret);			
	}	
	
	public function setMessage($message=null, $daysback=null) {
		$db = GetGlobal('db');
		if (!$message) return false;
		
		$interval = $daysback ? $daysback : 90;
		$id = explode('|',$message);
		$hash = md5($id[0].$id[1]);
		
		//search in db for deleted msg
		$sSQL = "select hash from cpmessages where hash=" . $db->qstr($hash) . ' and owner=' . $db->qstr($this->owner);
		//of last 3 month
		$sSQl.= " and DATE(date) BETWEEN DATE( DATE_SUB( NOW() , INTERVAL $interval DAY ) ) AND DATE ( NOW() )";// order by DATE(date) desc";
		$result = $db->Execute($sSQL,1);			 
		//$ret = $db->Affected_Rows(); 
		//if ($result->fields[0]) echo $sSQL;
		//if message has viewed (isin db) return
        if ($result->fields[0]) return false;
		
		//add the message if not already in session		
		//if (array_key_exists($hash, $this->messages)) { /* in session */}
		//else {
			$this->messages[$hash] = $message;
			SetSessionParam('cpMessages', $this->messages);
			return true;
		//}
		//return false;	
	}
	
	public function viewMessages($template=null) {
		if (empty($this->messages)) return;
		$rtokens = array();
		
		if ((defined('CRMFORMS_DPC')) && ($this->isCrmUser())) {
			$template = 'crm-' . $template;
			$crm = true;
		}
		else
			$crm = false;
		
		//$msgs = array_reverse($this->messages, true);
        
		foreach ($this->messages as $hash=>$message) {
			//echo $message;
			$tokens = explode('|', $message); 
			$status = $tokens[0]; //used as template (important|error...)
			$rtokens[] = $tokens[1]; //msg
			$rtokens[] = $tokens[2]; //time
			$rtokens[] = $tokens[3] ? $tokens[3] : '#'; //link
			$rtokens[] = $hash; //hash when link to delete
			
			$rtokens[] = $tokens[4] ? 
			   (((filter_var($tokens[4], FILTER_VALIDATE_EMAIL)) && $crm) ? _m("crmforms.formsMenu use ".$tokens[4]."+crmdoc") : null) : null;
			
			$st = $status ? '-' . $status : null;
			$statusTmpl = str_replace($template, $template.$st ,$template);
			$t = ($template!=null) ? $this->select_template($statusTmpl) : null;
			
			$ret .= $t ? $this->combine_tokens($t, $rtokens) :
				         "<option value=\"$hash\">".$rtokens[0]."</option>";
			
			unset($rtokens);
		}
		//echo $ret;
		return ($ret);
	}	
	
	protected function viewPastMessages() {
		$db = GetGlobal('db');	
		$ownerSQL = ($this->seclevid==9) ? null : 'where owner=' . $db->qstr($this->owner); 		
		   	
		if (defined('MYGRID_DPC')) {
		    $title = str_replace(' ','_',localize('_messages',getlocal()));
		   
			$sSQL = "select * from (SELECT id,date,type,msg FROM cpmessages $ownerSQL order by date desc";
            $sSQL.= ') as o';  				

		    _m("mygrid.column use grid9+id|".localize('_id',getlocal())."|5|1|");
			_m("mygrid.column use grid9+date|".localize('_date',getlocal()).'|5|1');		   
            _m("mygrid.column use grid9+type|".localize('_type',getlocal()).'|10|1');
            _m("mygrid.column use grid9+msg|".localize('_message',getlocal()).'|20|1');			

		    $out .= _m("mygrid.grid use grid9+cpmessages+$sSQL+r+$title+id+1+1+25+600++0+1+1");
		}
        else  
			$out .= null;
   		
	    return ($out);	
	}	
	
	
	public function viewSysMessages($template=null) {
		$db = GetGlobal('db');
		
		$sSQL = "SELECT id,msg,date,hash FROM cpmessages where type='system' or type='cron' or type= 'analyzer' order by id desc LIMIT 4";
        $result = $db->Execute($sSQL);
		if (!$result) return ;
		
		foreach ($result as $i=>$rec) {
			//$status = 'important';
			$rtokens = array();
			$rtokens[] = $rec[1]; //msg
			$rtokens[] = $this->timeSayWhen(strtotime($rec[2])); //time
			$rtokens[] = $this->isLevelUser(8) ? 'cp.php?t=cpsysMessages' :'#'; //link
			$rtokens[] = $rec[3]; //hash
			
			$st = $status ? '-' . $status : null;
			$statusTmpl = str_replace($template, $template.$st ,$template);
			$t = ($template!=null) ? $this->select_template($statusTmpl) : null;
			
			$ret .= $t ? $this->combine_tokens($t, $rtokens) :
			             "<option value=\"$hash\">".$rtokens[1]."</option>"; 
			
			unset($rtokens);
		}
		//echo $ret;
		return ($ret);
	}	
	
	protected function viewSystemMessages() {
		$db = GetGlobal('db');		
		$ownerSQL = ($this->seclevid==9) ? null : 'where owner=' . $db->qstr($this->owner); 		
		   	
		if (defined('MYGRID_DPC')) {
		    $title = str_replace(' ','_',localize('_messages',getlocal()));
		   
			$sSQL = "select * from (SELECT id,date,type,msg FROM cpmessages where type='system' or type='cron' or type= 'analyzer' order by id desc";
            $sSQL.= ') as o';  				

		    _m("mygrid.column use grid9+id|".localize('_id',getlocal())."|5|1|");
			_m("mygrid.column use grid9+date|".localize('_date',getlocal()).'|5|1');		   
            _m("mygrid.column use grid9+type|".localize('_type',getlocal()).'|10|1');
            _m("mygrid.column use grid9+msg|".localize('_message',getlocal()).'|20|1');			

		    $out .= _m("mygrid.grid use grid9+cpmessages+$sSQL+r+$title+id+1+1+25+600++0+1+1");
		}
        else  
			$out .= null;
		
	    return ($out);	
	}		
	
	
	
	public function getTasksTotal() { 
		//print_r($this->tasks);
		$ret = (empty($this->tasks)) ? null : strval(count($this->tasks));
		return $ret;		
	}		

	public function getTasks($limit=null) {
		if (empty($this->tasks)) return null;
		//print_r($this->tasks);
		$tokens = array(); 
		$lim = $limit ? $limit : 6;
		$msgs = array_reverse($this->tasks, true);
		$i = 0;
		foreach ($msgs as $n=>$m) {
			$tokens = explode('|', $m); 
			switch (array_shift($tokens)) {
				case 'active'    : $tmpl = 'dropdown-task-progress-active'; break;
				case 'success'   : $tmpl = 'dropdown-task-progress-success'; break;
				case 'warning'   : $tmpl = 'dropdown-task-progress-warning'; break;
				case 'danger'    : $tmpl = 'dropdown-task-progress-danger'; break;
				case 'info'      :
				default          : $tmpl = 'dropdown-task-progress-info';
				
			}
			$tdata = $this->select_template($tmpl);
			$ret .= $this->combine_tokens($tdata, $tokens, true);
			unset($tokens);	
			$i+=1;
			if ($i>$lim) break;
		}
		
		return ($ret);			
	}	
	
	public function setTask($task=null) {
		if (!$task) return false;
		$id = explode('|',$task);
		$hash = md5($id[0].$id[1]);
		
		//if (array_key_exists($hash, $this->tasks)) {}
		//else {
			$this->tasks[$hash] = $task;
			SetSessionParam('cpTasks', $this->tasks);
			return true;
		//}
		//return false;	
	}
	
	public function viewTasks($template=null) {
		if (empty($this->tasks)) return;
	    $t = ($template!=null) ? $this->select_template($template) : null;
		//$msgs = array_reverse($this->tasks, true);

		foreach ($this->tasks as $t=>$task) {
			$tokens = explode('|', $task); 
			//$tsk = $tokens[1];
			if ($t) 	
				$ret .= $this->combine_tokens($t, array_shift($tokens)); //array(0=>$tsk));
			else
				$ret .= "<option value=\"$t\">$tsk</option>";
		}
		return ($ret);
	}	
	
	public function setInbox($message=null) {
		$db = GetGlobal('db');
		if (!$message) return false;
		
		$interval = $daysback ? $daysback : 90;
		$id = explode('|',$message);
		$hash = md5($id[0].$id[1]);
		
		//add the message if not already in session		
		//if (array_key_exists($hash, $this->inbox)) { /* in session */}
		//else {
			$this->inbox[$hash] = $message;
			SetSessionParam('cpInbox', $this->inbox);
			return true;
		//}
		//return false;	
	}	
	
	/* cp header inbox */ 	
	public function getInboxTotal() {
		//$ret = (empty($this->inbox)) ? 0 : count($this->inbox);
		$db = GetGlobal('db');	
		$sSQL = "SELECT count(id) from stats where tid='event' and DATE(date) BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 1 DAY ) ) AND DATE ( NOW() ) order by date desc";
		$result = $db->Execute($sSQL);		
		$ret = $result->fields[0];
		
		return ($ret>10) ? '10' : strval($ret);		
	}

	public function getInbox_OLD($limit=null) {
		if (empty($this->inbox)) return null;
		$tokens = array(); 
		$lim = $limit ? $limit : 10;
		$msgs = array_reverse($this->inbox, true);
		$i = 0;
		
		$tdata = $this->select_template('dropdown-inbox-message');
		
		foreach ($msgs as $n=>$m) {
			
			$tokens = explode('|', $m); 
			$tokens[] = $n; 
			
			$ret .= $this->combine_tokens($tdata, $tokens, true);
			unset($tokens);	
			$i+=1;
			if ($i>$lim) break;
		}
		
		return ($ret);			
	}
	
	public function getInbox($limit=null) {
		$db = GetGlobal('db');	
		$lim = $limit ? $limit : 10;
		$tdata = $this->select_template('dropdown-inbox-message');
		
		$sSQL = "SELECT date,tid,attr1,attr3 from stats where tid='event' and DATE(date) BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 1 DAY ) ) AND DATE ( NOW() ) order by date desc limit " . $lim;
		$resultset = $db->Execute($sSQL);
		
		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {		
			
			$tokens[] = $rec['attr3']; 
			
			switch ($rec['attr1']) {
				case 'registration': $text = localize('_reginbox',getlocal()); $cmd = 'cpusers.php'; break; 
				case 'activation'  : $text = localize('_actinbox',getlocal()); $cmd = 'cpusers.php'; break; 
				case 'subscribe'   : $text = localize('_subinbox',getlocal()); $cmd = 'cpsubscribers.php'; break; 
				case 'unsubscribe' : $text = localize('_unsubinbox',getlocal()); $cmd = 'cpsubscribers.php'; break; 
				case 'cart-submit' : $text = localize('_sale',getlocal()); $cmd = 'cptransactions.php'; break;
				case 'contact'     : $text = localize('_formsubmit',getlocal()); $cmd = 'cpform.php'; break;
				default            : $text = null; 
			}
			//if (!$text) continue;
			
			$tokens[] = $text;
			$tokens[] = $this->timeSayWhen(strtotime($rec[0]));			
			$tokens[] = $cmd;
			
			$ret .= $this->combine_tokens($tdata, $tokens, true);
			unset($tokens);	
		}
		
		return ($ret);			
	}		
	

	/*sales today as cp messages (1 days back)*/
	/*public function getSalesToday($template=null, $limit=null) {
		$db = GetGlobal('db');	
		$l = $limit ? $limit : 5;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		$text = localize('_sale',getlocal());
		
		$sSQL = "SELECT timein,cid,tid FROM transactions where tstatus>=0 and timein BETWEEN DATE_SUB( NOW() , INTERVAL 1 DAY ) AND NOW() order by timein desc LIMIT " . $l;
		$resultset = $db->Execute($sSQL,2);
		
		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {
			$saytime = $this->timeSayWhen(strtotime($rec['timein']));
			$msg = "success|" . $rec['cid'] .", ". $text .' '. $rec['tid'] . "|$saytime|cptransactions.php|".$rec['cid'];
			$this->setMessage($msg);
		}

		return ($ret);			
	}
	
	public function getFormSubmit() {
		$db = GetGlobal('db');
		$text = localize('_formsubmit',getlocal());
		$sSQL = "select email,date from cform where DATE(date) BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 10 DAY ) ) AND DATE ( NOW() ) order by DATE(date) desc";
		$result = $db->Execute($sSQL,2);
		//echo $sSQL;
		foreach ($result as $i=>$rec) {
			$saytime = $this->timeSayWhen(strtotime($rec[1]));
			$msg = "info|" . $text .' '. $rec[0] . "|$saytime|cpform.php|".$rec[0];
			$this->setMessage($msg);
		}
		return null;
	} 	*/
	
	//last month check 
	public function getInactiveUsers() {
		if (!defined('RCCONTROLPANEL_DPC')) return false;
		$db = GetGlobal('db');
		$text = localize('_inactiveuser',getlocal());
		$sSQL = "select username,timein from users where notes='DELETED' and DATE(timein) BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 30 DAY ) ) AND DATE ( NOW() ) order by DATE(timein) desc";
		$result = $db->Execute($sSQL,2);
		
		foreach ($result as $i=>$rec) {
			$saytime = $this->timeSayWhen(strtotime($rec[1]));
			$msg = "warning|" . $text .' '. $rec[0] . "|$saytime|cpusers.php|".$rec[0];
			$this->setMessage($msg);
		}
		return null;
	} 
	
	//last month check 
	public function getActiveUsers() {
		if (!defined('RCCONTROLPANEL_DPC')) return false;
		$db = GetGlobal('db');
		$text = localize('_newactiveuser',getlocal());
		$sSQL = "select username,timein from users where notes='ACTIVE' and DATE(timein) BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 10 DAY ) ) AND DATE ( NOW() ) order by DATE(timein) desc";
		$result = $db->Execute($sSQL,2);
		
		foreach ($result as $i=>$rec) {
			$saytime = $this->timeSayWhen(strtotime($rec[1]));
			$msg = "success|" . $text .' '. $rec[0] . "|$saytime|cpusers.php|".$rec[0];
			$this->setMessage($msg);
		}
		return null;
	} 	

	public function viewItemStatistics($template=null) {
		$db = GetGlobal('db');
		$id = $this->cpGet['id'];
		
		if ((defined('CRMFORMS_DPC')) && ($this->isCrmUser())) {
			$template = 'crm-' . $template;
			$crm = true;
		}
		else
			$crm = false;		
		
		$t = $template ? $this->select_template($template) : null;//'alert-important';		
		
        $timein = $this->sqlDateRange('date', true, true);			
		
		$sSQL = "SELECT id,date,DATE_FORMAT(date, '%d-%m-%Y') as day,attr2,attr3,REMOTE_ADDR FROM stats where tid='$id' $timein group by day,attr2,attr3,REMOTE_ADDR order by id desc LIMIT 100";
		//echo $sSQL;
        $result = $db->Execute($sSQL);
		if (!$result) return ;
		
		foreach ($result as $i=>$rec) {
			$rtokens = array();
			$visitor = $this->checkmail($rec['attr3']) ? $rec['attr3'] : 
							( $this->checkmail($rec['attr2']) ? $rec['attr2'] : $rec['REMOTE_ADDR']);
			
			$rtokens[] = $rec['attr3'] ? $rec['attr3'] . " (" . $rec['REMOTE_ADDR'] . ")" : 
			                             $rec['attr2'] . " (" . $rec['REMOTE_ADDR'] . ")"; 
			$rtokens[] = $this->timeSayWhen(strtotime($rec['date'])); 
			$rtokens[] = $crm ? 'cpcrmtrace.php?t=cpcrmprofile&v='.$visitor : '#'; //link
			$rtokens[] = null;//$rec[3]; //hash
			
			$rtokens[] = ((filter_var($visitor, FILTER_VALIDATE_EMAIL)) && $crm) ? _m("crmforms.formsMenu use ".$visitor."+crmdoc") : null;
						
			
			$ret .= $t ? $this->combine_tokens($t, $rtokens) : 
			             "<option value=\"$hash\">".$rtokens[1]."</option>";
			
			unset($rtokens);
		}
		//echo $ret;
		return ($ret);
	}	
	
	protected function viewItemVisits() {
		$db = GetGlobal('db');	
		
		$cpGet = _v('rcpmenu.cpGet');
		$id = $cpGet['id']; 	
		   	
		if (defined('MYGRID_DPC')) {
		    $title = localize('_visits',getlocal());
		   
			$sSQL = "select * from (SELECT id,date,tid,attr2,attr3,REMOTE_ADDR FROM stats WHERE tid='$id'";
            $sSQL.= ') as o';  
			//echo $sSQL;	

		    _m("mygrid.column use grid9+id|".localize('_id',getlocal())."|5|0|");
			_m("mygrid.column use grid9+date|".localize('_date',getlocal()).'|5|0');		   
            _m("mygrid.column use grid9+tid|".localize('_tid',getlocal()).'|5|0');
            _m("mygrid.column use grid9+attr2|".localize('_attr2',getlocal()).'|10|0');			
            _m("mygrid.column use grid9+attr3|".localize('_attr3',getlocal()).'|10|0');
            _m("mygrid.column use grid9+REMOTE_ADDR|".localize('_ip',getlocal()).'|10|0');			

		    $out .= _m("mygrid.grid use grid9+mailqueue+$sSQL+r+$title+id+1+1+25+600++1+1+1");
		}
        else  
			$out .= null;
		
	    return ($out);	
	}		

	public function viewCategoryStatistics($template=null) {
		$db = GetGlobal('db');
		$cat = $this->cpGet['cat'];
		
		if ((defined('CRMFORMS_DPC')) && ($this->isCrmUser())) {
			$template = 'crm-' . $template;
			$crm = true;
		}
		else
			$crm = false;		
		
		$t = $template ? $this->select_template($template) : null;//'alert-important';		
		
        $timein = $this->sqlDateRange('date', true, true);			
		
		$sSQL = "SELECT id,date,DATE_FORMAT(date, '%d-%m-%Y') as day,attr2,attr3,REMOTE_ADDR FROM stats where attr1='$cat' $timein group by day,attr2,attr3,REMOTE_ADDR order by id desc LIMIT 100";
		//echo $sSQL;
        $result = $db->Execute($sSQL);
		if (!$result) return ;
		
		foreach ($result as $i=>$rec) {
			$rtokens = array();
			$visitor = $this->checkmail($rec['attr3']) ? $rec['attr3'] : 
							($this->checkmail($rec['attr2']) ? $rec['attr2'] : $rec['REMOTE_ADDR']);
							
			$rtokens[] = $rec['attr3'] ? $rec['attr3'] . " (" . $rec['REMOTE_ADDR'] . ")" : 
			                             $rec['attr2'] . " (" . $rec['REMOTE_ADDR'] . ")"; 
			$rtokens[] = $this->timeSayWhen(strtotime($rec['date'])); 
			$rtokens[] = $crm ? 'cpcrmtrace.php?t=cpcrmprofile&v='.$visitor : '#'; //link
			$rtokens[] = null;//$rec[3]; //hash
			
			$rtokens[] =  ((filter_var($visitor, FILTER_VALIDATE_EMAIL)) && $crm) ? _m("crmforms.formsMenu use ".$visitor."+crmdoc") : null;
						
			
			$ret .= $t ? $this->combine_tokens($t, $rtokens) : 
			             "<option value=\"$hash\">".$rtokens[1]."</option>";
			
			unset($rtokens);
		}
		//echo $ret;
		return ($ret);
	}	
	
	protected function viewCatVisits() {
		$db = GetGlobal('db');
		
		$cpGet = _v('rcpmenu.cpGet');
		$cat = $cpGet['cat']; 	
		   	
		if (defined('MYGRID_DPC')) {
		    $title = localize('_visits',getlocal());
		   
			$sSQL = "select * from (SELECT id,date,attr1,attr2,attr3,REMOTE_ADDR FROM stats WHERE attr1='$cat'";
            $sSQL.= ') as o';  
			//echo $sSQL;	

		    _m("mygrid.column use grid9+id|".localize('_id',getlocal())."|5|0|");
			_m("mygrid.column use grid9+date|".localize('_date',getlocal()).'|5|0');		   
            _m("mygrid.column use grid9+attr1|".localize('_attr1',getlocal()).'|10|0');
            _m("mygrid.column use grid9+attr2|".localize('_attr2',getlocal()).'|10|0');			
            _m("mygrid.column use grid9+attr3|".localize('_attr3',getlocal()).'|10|0');
            _m("mygrid.column use grid9+REMOTE_ADDR|".localize('_ip',getlocal()).'|10|0');			

		    $out .= _m("mygrid.grid use grid9+stats+$sSQL+r+$title+id+1+1+25+600++1+1+1");
		}
        else  
			$out .= null;
		
	    return ($out);	
	}		
	
	public function timeSayWhen($ptime=null) {
		$etime = time() - $ptime;

		if ($etime < 1)
			return '1 ' . localize('second', getlocal());

		$a = array( 365 * 24 * 60 * 60  =>  'year',
					 30 * 24 * 60 * 60  =>  'month',
						  24 * 60 * 60  =>  'day',
							   60 * 60  =>  'hour',
                                    60  =>  'minute',
                                     1  =>  'second'
                  );
		$a_plural = array( 'year'   => 'years',
                           'month'  => 'months',
                           'day'    => 'days',
                           'hour'   => 'hours',
                           'minute' => 'minutes',
                           'second' => 'seconds'
                        );

		foreach ($a as $secs => $str) {
			$d = $etime / $secs;
			if ($d >= 1) {
				$r = round($d);
				$a = localize($a_plural[$str], getlocal());
				$b = localize($str, getlocal());
				return $r . ' ' . ($r > 1 ? $a : $b);// . ' ago';
			}
		}
	}	
	
	//called by page as json array...(NOT USED)
	public function jsTour($elements=null, $pos=null) {
		
		$el = explode(',',$elements);
		$ps = explode(',',$pos);
		
		foreach ($el as $i=>$e) {
			$tt[] = array('element'=>$e,
			              'tooltip'=>localize('_tooltip-'.$e,getlocal()),
						  'position'=>$ps[$i],
						  'text'=>localize('_text-'.$e,getlocal()),
						  );
		}
		//print_r($tt);
		//echo json_encode($tt);
		
		$ret = "[
		      { element : '.metro-nav', 'tooltip' : 'Metro style buttons', 'position' : 'T', 'text' : '<h3>Metro</h3><p>View all critial data in one view summarized by category. Every button is clickable and shows details about its data category</p>'  },
              { element : '.metro-nav-block.nav-light-blue', 'tooltip' : 'Star reading this first', 'position' : 'TL', 'text' : '<h3>jSON structure</h3><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae mattis mi, quis imperdiet arcu. Nulla egestas mauris id velit ullamcorper aliquam. Proin faucibus volutpat justo, non faucibus massa dapibus ut. Sed mauris neque, aliquam vitae convallis eget, feugiat quis tortor. Suspendisse eleifend, nisl quis consequat tincidunt, erat nisi fringilla nisl, adipiscing venenatis arcu nibh in magna. Mauris sit amet lectus adipiscing, mattis augue a, adipiscing felis. Fusce tellus orci, venenatis in libero ac, molestie aliquam tortor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>' },
              { element : '.widget.purple', 'tooltip' : 'This can be used inside the body or head', 'position' : 'TR', 'text' : '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae mattis mi, quis imperdiet arcu. Nulla egestas mauris id velit ullamcorper aliquam. Proin faucibus volutpat justo, non faucibus massa dapibus ut. Sed mauris neque, aliquam vitae convallis eget, feugiat quis tortor. Suspendisse eleifend, nisl quis consequat tincidunt, erat nisi fringilla nisl, adipiscing venenatis arcu nibh in magna. Mauris sit amet lectus adipiscing, mattis augue a, adipiscing felis. Fusce tellus orci, venenatis in libero ac, molestie aliquam tortor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>' },
              { element : '.controls', 'tooltip' : 'Or can be used into a click event', 'position' : 'BL' },
              { element : '.easy-pie-chart', 'tooltip' : 'The data section it is very important', 'position' : 'B', 'text' : '<h3>Data</h3><p>It is a attribute that contains every the texts and configurations that the plugin use</p>' },
              { element : '.update-btn', 'tooltip' : 'Use a selector!', 'position' : 'L', 'controlsPosition' : 'BR' },
              { element : '.icon-download', 'tooltip' : 'Like this', 'position' : 'T' },
              { element : '.widget.orange', 'tooltip' : 'This can be HTML! (be standard, pls)', 'position' : 'R' },
              { element : '#reservation', 'tooltip' : 'Oops! I just forgot myself configuration!', 'position' : 'R' },
              { element : '.divider-vertical', 'tooltip' : 'Backgrounds and more!', 'position' : 'B', 'text' : '<p>Use rgba() because it looks really nice</p>' },
              { element : '.nav.top-menu', 'tooltip' : 'Very soon...', 'position' : 'B', 'text' : '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae mattis mi, quis imperdiet arcu. Nulla egestas mauris id velit ullamcorper aliquam. Proin faucibus volutpat justo, non faucibus massa dapibus ut. Sed mauris neque, aliquam vitae convallis eget, feugiat quis tortor. Suspendisse eleifend, nisl quis consequat tincidunt, erat nisi fringilla nisl, adipiscing venenatis arcu nibh in magna. Mauris sit amet lectus adipiscing, mattis augue a, adipiscing felis. Fusce tellus orci, venenatis in libero ac, molestie aliquam tortor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>' },
              { element : '.sidebar-menu', 'tooltip' : 'Please use it', 'position' : 'R' },
              { element : '.dropdown-toggle.element', 'tooltip' : 'fork it', 'position' : 'B', 'text' : '<h1>That\'s all!</h1><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec vitae mattis mi, quis imperdiet arcu. Nulla egestas mauris id velit ullamcorper aliquam. Proin faucibus volutpat justo, non faucibus massa dapibus ut. Sed mauris neque, aliquam vitae convallis eget, feugiat quis tortor. Suspendisse eleifend, nisl quis consequat tincidunt, erat nisi fringilla nisl, adipiscing venenatis arcu nibh in magna. Mauris sit amet lectus adipiscing, mattis augue a, adipiscing felis. Fusce tellus orci, venenatis in libero ac, molestie aliquam tortor. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>' }	
			 ] 
		";
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

	public function getmapf($name) {
	
		if (empty($this->map_t)) return 0;
	  
		foreach ($this->map_t as $id=>$elm)
			if ($elm==$name) break;
				
		//$id = key($this->map_t[$name]) ;
		$ret = $this->map_f[$id];
		return ($ret);
	}	
	
	public function getItemName($id) {
		if (!$id) return null;
		$db = GetGlobal('db');
		$lan = getlocal();
		$name = $lan ? 'itmname' : 'itmfname';
		
		$sSQL = "select $name from products where " . $this->getmapf('code') . "=" . $db->qstr($id);
		$res = $db->Execute($sSQL,2);
        return $res->fields[0];		
	}
	
	public function getItemActiveCode($id) {
		if (!$id) return null;
		$db = GetGlobal('db');
		$lan = getlocal();
		$code = $this->getmapf('code');
		
		$sSQL = "select $code from products where id=" . $id;
		$res = $db->Execute($sSQL,2);
        return $res->fields[0];		
	}	
	
	public function getRefName($id) {
		if (!$id) return null;
		$db = GetGlobal('db');
		
		$sSQL = "select title from mailcamp where cid=" . $db->qstr($id);
		$res = $db->Execute($sSQL,2);
        return $res->fields[0];		
	}	
	
    public function checkmail($data) {
		return (filter_var($data, FILTER_VALIDATE_EMAIL) ? true : false);
	}	
	
};
}
?>