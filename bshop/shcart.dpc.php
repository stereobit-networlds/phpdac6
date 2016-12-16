<?php
$__DPCSEC['SHCART_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("SHCART_DPC")) && (seclevel('SHCART_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("SHCART_DPC",true);

$__DPC['SHCART_DPC'] = 'shcart';

$a = GetGlobal('controller')->require_dpc('bshop/storebuffer.lib.php');
require_once($a);

$b = GetGlobal('controller')->require_dpc('bshop/mchoice.dpc.php');
require_once($b);

$__LOCALE['SHCART_DPC'][99]='_SUBMITORDER2;Submit Order;Τέλος Συναλλαγής';

$__EVENTS['SHCART_DPC'][0]= localize('_CHKOUT',getlocal());
$__EVENTS['SHCART_DPC'][1]= localize('_ORDER',getlocal());
$__EVENTS['SHCART_DPC'][2]= localize('_RECALC',getlocal());
$__EVENTS['SHCART_DPC'][3]= localize('_SUBMITORDER',getlocal());	
$__EVENTS['SHCART_DPC'][4]= localize('_CANCELORDER',getlocal());
$__EVENTS['SHCART_DPC'][5]= "addtocart"; 					 	
$__EVENTS['SHCART_DPC'][6]= "removefromcart"; 
$__EVENTS['SHCART_DPC'][7]= "clearcart";
$__EVENTS['SHCART_DPC'][8]= "loadcart";
$__EVENTS['SHCART_DPC'][9]= "printcart";
$__EVENTS['SHCART_DPC'][10]= "transcart";
$__EVENTS['SHCART_DPC'][11]= "fastpick";
$__EVENTS['SHCART_DPC'][12]= "sship";
$__EVENTS['SHCART_DPC'][13]= "calc";
$__EVENTS['SHCART_DPC'][14]= localize('_SUBMITORDER2',getlocal());
$__EVENTS['SHCART_DPC'][15]= "cart-checkout";
$__EVENTS['SHCART_DPC'][16]= "cart-order";
$__EVENTS['SHCART_DPC'][17]= "cart-submit";
$__EVENTS['SHCART_DPC'][18]= "cart-cancel";
$__EVENTS['SHCART_DPC'][19]= "viewcart"; 

$__ACTIONS['SHCART_DPC'][0]= "viewcart";
$__ACTIONS['SHCART_DPC'][1]= "clearcart";
$__ACTIONS['SHCART_DPC'][2]= "loadcart"; 
$__ACTIONS['SHCART_DPC'][3]= "removefromcart";
$__ACTIONS['SHCART_DPC'][4]= "printcart";
$__ACTIONS['SHCART_DPC'][5]= localize('_CHKOUT',getlocal());
$__ACTIONS['SHCART_DPC'][6]= localize('_ORDER',getlocal());
$__ACTIONS['SHCART_DPC'][7]= localize('_RECALC',getlocal());
$__ACTIONS['SHCART_DPC'][8]= localize('_SUBMITORDER',getlocal());	
$__ACTIONS['SHCART_DPC'][9]= localize('_CANCELORDER',getlocal());	
$__ACTIONS['SHCART_DPC'][10]= 'transcart';
$__ACTIONS['SHCART_DPC'][11]= "fastpick";
$__ACTIONS['SHCART_DPC'][12]= "sship";
$__ACTIONS['SHCART_DPC'][13]= "calc";
$__ACTIONS['SHCART_DPC'][14]= localize('_SUBMITORDER2',getlocal());
$__ACTIONS['SHCART_DPC'][15]= "cart-checkout";
$__ACTIONS['SHCART_DPC'][16]= "cart-order";
$__ACTIONS['SHCART_DPC'][17]= "cart-submit";
$__ACTIONS['SHCART_DPC'][18]= "cart-cancel";
$__ACTIONS['SHCART_DPC'][19]= "viewcart"; 

$__DPCATTR['SHCART_DPC']['viewcart'] = 'viewcart,1,0,1,0,0,0,0,0,0'; 
$__DPCATTR['SHCART_DPC']['loadcart'] = 'loadcart,1,0,1,0,0,0,0,0,0'; 
$__DPCATTR['SHCART_DPC'][localize('_RECALC',getlocal())] = '_RECALC,1,0,1,0,0,0,0,0,0';
$__DPCATTR['SHCART_DPC'][localize('_CANCELORDER',getlocal())] = '_CANCELORDER,1,0,1,0,0,0,0,0,0';
$__DPCATTR['SHCART_DPC'][localize('_ORDER',getlocal())] = '_ORDER,1,0,1,0,0,0,0,0,0'; 
$__DPCATTR['SHCART_DPC'][localize('_SUBMITORDER',getlocal())] = '_SUBMITORDER,1,0,1,0,0,0,0,0,0';
$__DPCATTR['SHCART_DPC'][localize('_CHKOUT',getlocal())] = '_CHKOUT,1,0,1,0,0,0,0,0,0';
$__DPCATTR['SHCART_DPC']['addtocart'] = 'addtocart,0,0,0,0,0,1,0,0,1';
$__DPCATTR['SHCART_DPC']['removefromcart'] = 'removefromcart,0,0,0,0,0,1,0,0,1';
$__DPCATTR['SHCART_DPC'][localize('_SUBMITORDER2',getlocal())] = '_SUBMITORDER2,1,0,1,0,0,0,0,0,0';

$__LOCALE['SHCART_DPC'][0]='SHCART_DPC;My Cart;Καλάθι Αγορών';
$__LOCALE['SHCART_DPC'][1]='_GRANDTOTAL;Grand Total;Γενικό Σύνολο';
$__LOCALE['SHCART_DPC'][2]='loginorregister;Login or Register for a new account;Παρακαλώ προχωρείστε στις απαιτούμενες ενέργειες!';
$__LOCALE['SHCART_DPC'][3]='_IWAY;Notice of pay;Τυπος Παραστατικού';
$__LOCALE['SHCART_DPC'][4]='_INVOICE;Invoice;Τιμολόγιο';
$__LOCALE['SHCART_DPC'][5]='_APODEIXI;Receipt;Αποδειξη';
$__LOCALE['SHCART_DPC'][6]='_DELIVADDRESS;Delivery Address;Παράδοση σε αλλη διευθυνση';
$__LOCALE['SHCART_DPC'][7]='_TAX;Tax;ΦΠΑ';
$__LOCALE['SHCART_DPC'][8]='_NO;No;Οχι';
$__LOCALE['SHCART_DPC'][9]='_FASTPICK;Fast pick;Γρήγορη Συλλογή';
$__LOCALE['SHCART_DPC'][10]='_FASTPICKON;Fast pick is ON;Η Γρήγορη Συλλογή είναι ON';
$__LOCALE['SHCART_DPC'][11]='_FASTPICKOFF;Fast pick is OFF;Η Γρήγορη Συλλογή είναι OFF';
$__LOCALE['SHCART_DPC'][12]='_TOTAL;Subtotal;Σύνολο';
$__LOCALE['SHCART_DPC'][13]='_FCOST;Total;Πληρωτέο';
$__LOCALE['SHCART_DPC'][13]='_SHIPCOST;Shipping cost;Κόστος μεταφορικών';
$__LOCALE['SHCART_DPC'][14]='_SHIPWEIGHT;Weight;Τα αντικείμενα στο καλάθι σας ζυγίζουν';
$__LOCALE['SHCART_DPC'][15]='_KG;Kg;Κιλά';
$__LOCALE['SHCART_DPC'][16]='_SHIPZONE;Shipping Zone;Ζώνη αποστολής';
$__LOCALE['SHCART_DPC'][17]='_PARCELOF;Parcel;Δέμα βάρους';
$__LOCALE['SHCART_DPC'][18]='_CONTINUESHOP;Continue shopping;Συνέχισε τις αγορές';
$__LOCALE['SHCART_DPC'][19]='_CLEARCARTITEMS;Remove all items;Άδειασε το καλάθι';
$__LOCALE['SHCART_DPC'][20]='_ADDCARTITEM;Add item;Στο καλάθι';
$__LOCALE['SHCART_DPC'][21]='_REMCARTITEM;Remove;Διαγραφή';
$__LOCALE['SHCART_DPC'][22]='_SUBMITORDER2;Submit Order;Τέλος Συναλλαγής';
$__LOCALE['SHCART_DPC'][23]='_TRANSPRINT;Print;Εκτύπωση';
$__LOCALE['SHCART_DPC'][24]='_ORDERSUBJECT;Order No ;Παραγγελία No ';
$__LOCALE['SHCART_DPC'][25]='_MYCART;My Cart;Καλάθι';
$__LOCALE['SHCART_DPC'][26]='_VIEWCART;View cart;Καλάθι';
$__LOCALE['SHCART_DPC'][27]='_CHECKOUT;Checkout;Ταμείο';

$__LOCALE['SHCART_DPC'][28]='Eurobank;Credit card;Πιστωτική κάρτα'; //used by mchoice param
$__LOCALE['SHCART_DPC'][29]='Piraeus;Credit card;Πιστωτική κάρτα'; //used by mchoice param
$__LOCALE['SHCART_DPC'][30]='Paypal;Credit card;Πιστωτική κάρτα'; //used by mchoice param
$__LOCALE['SHCART_DPC'][31]='PayOnsite;Pay on site;Πληρωμή στο κατάστημά μας';//used by mchoice param
$__LOCALE['SHCART_DPC'][32]='BankTransfer;Bank transfer;Κατάθεση σε τραπεζικό λογαριασμό';//used by mchoice param
$__LOCALE['SHCART_DPC'][33]='PayOndelivery;Pay on delivery;Αντικαταβολή';//used by mchoice param
$__LOCALE['SHCART_DPC'][34]='Invoice;Invoice;Τιμολόγιο';//used by mchoice param
$__LOCALE['SHCART_DPC'][35]='Receipt;Receipt;Απόδειξη';//used by mchoice param
$__LOCALE['SHCART_DPC'][36]='CompanyDelivery;Our Delivery Service;Διανομή με όχημα της εταιρείας (εντός θεσσαλονίκης)';//used by mchoice param
$__LOCALE['SHCART_DPC'][37]='Logistics;3d Party Logistic Service;Μεταφορική εταιρεία';//used by mchoice param
$__LOCALE['SHCART_DPC'][38]='Courier;Courier;Courier';//used by mchoice param
$__LOCALE['SHCART_DPC'][39]='CustomerDelivery;Self Service;Παραλαβή απο το κατάστημα μας';//used by mchoice param

$__LOCALE['SHCART_DPC'][41]='_RESET;Reset;Καθαρισμός';
$__LOCALE['SHCART_DPC'][42]='_EMPTY;Empty;Αδειο';
$__LOCALE['SHCART_DPC'][43]='_BLN3;Clear Cart;Αδειασμα Καλαθιού';
$__LOCALE['SHCART_DPC'][44]='_BLN2;Remove from Cart;Αφαίρεση απο το Καλάθι';
$__LOCALE['SHCART_DPC'][45]='_BLN1;Add to Cart;Προσθήκη στο Καλάθι';
$__LOCALE['SHCART_DPC'][46]='_MSG16;Prices does not include taxes;Οι τιμές δεν συμπεριλαμβάνουν ΦΠΑ 19%';
$__LOCALE['SHCART_DPC'][47]='_MSG15;Your cart is full ! ! !;Το καλάθι σας είναι γεμάτο ! ! !';
$__LOCALE['SHCART_DPC'][48]='_MSG14;Your order submited successfully! Thank you!;Η παραγγελία σας εκτελέστηκε επιτυχώς !';
$__LOCALE['SHCART_DPC'][49]='_QTY;Qty;Τεμ.';
$__LOCALE['SHCART_DPC'][50]='_PRICE;Price;Τιμή';
$__LOCALE['SHCART_DPC'][51]='_DESCR;Description;Περιγραφή';
$__LOCALE['SHCART_DPC'][52]='_STOTAL;sTotal;Σύνολο';
$__LOCALE['SHCART_DPC'][53]='_TOTAL;Total;Σύνολο';
$__LOCALE['SHCART_DPC'][54]='_RECALC;Recalculate;Υπολογισμός';
$__LOCALE['SHCART_DPC'][55]='_CHKOUT;Check Out;Ταμείο';
$__LOCALE['SHCART_DPC'][56]='_ORDER;Order;Επιβεβαίωση';
$__LOCALE['SHCART_DPC'][57]='_CANCELORDER;Cancel;Ακύρωση';
$__LOCALE['SHCART_DPC'][58]='_SUBMITORDER;Submit Order;Ολοκλήρωση Συναλλαγής';
$__LOCALE['SHCART_DPC'][59]='_PRINT;Print;Εκτύπωση';
$__LOCALE['SHCART_DPC'][60]='_CLOSE;Close;Κλείσιμο';
$__LOCALE['SHCART_DPC'][61]="_ACCDENIED;Sorry you don't have the appropriate priviliges.;Δέν έχετε το απαραίτητο δικαίωμα.";
$__LOCALE['SHCART_DPC'][62]='_CONTENTS;Contents;Περιεχόμενα';
$__LOCALE['SHCART_DPC'][63]='_NOTAVAL;Not available;Μη διαθέσιμο';
$__LOCALE['SHCART_DPC'][64]='_TAX;Tax;Φόρος';
$__LOCALE['SHCART_DPC'][65]='_SHIPCOST;Shipping Cost;Έξοδα αποστολής';
$__LOCALE['SHCART_DPC'][66]='_DISCOUNT;Discount;Εκπτωση';
$__LOCALE['SHCART_DPC'][67]='_FCOST;Final cost;Πληρωτέο';
$__LOCALE['SHCART_DPC'][68]='_BOXTYPE;Box;Συσκ.';
$__LOCALE['SHCART_DPC'][69]='_CART;Shop Cart;Καλάθι Αγορών';
$__LOCALE['SHCART_DPC'][70]='_RWAY;Shipping:;Τρόπος Αποστολής';
$__LOCALE['SHCART_DPC'][71]='_RWAY1;By Car;Οδικώς';
$__LOCALE['SHCART_DPC'][72]='_RWAY2;Courier;Courier';
$__LOCALE['SHCART_DPC'][73]='_RWAY3;ELTA;ΕΛΤΑ';
$__LOCALE['SHCART_DPC'][74]='_PWAY;Pay with:;Τρόπος Πληρωμής';
$__LOCALE['SHCART_DPC'][75]='_PWAY1;Trust my account;Χρέωση του λογαριασμου μου';
$__LOCALE['SHCART_DPC'][76]='_PWAY2;Cash on delivery;Αντικαταβολή';
$__LOCALE['SHCART_DPC'][77]='_PWAY3;VISA;VISA';
$__LOCALE['SHCART_DPC'][78]='_ENDOK;Thank you! Your order submited successfully with Order No :;Ευχαριστούμε ! Η παραγγελία σας εκτελέστηκε επιτυχώς με αριθμό Παραγγελίας :';
$__LOCALE['SHCART_DPC'][79]='_SXOLIA;Comments;Σχόλια;';
$__LOCALE['SHCART_DPC'][80]='_CARTERROR;Error during transaction;Λαθος εκτελεσης;';
$__LOCALE['SHCART_DPC'][81]='_STOCKOUT; is out of stock!; δεν υπαρχει απόθεμα!;';
$__LOCALE['SHCART_DPC'][82]='_INPUTERR;Invalid entry!;Λανθασμένη ποσότητα!;';

$__PARSECOM['SHCART_DPC']['quickview']='_VIEWCART_';

$__DPCEXT['SHCART_DPC']='showsymbol';


class shcart extends storebuffer {

	var $uniname2, $status, $qtytotal;
	var $liveupdate, $moneysymbol, $maxcart;
	var $allowqtyover, $mailerror, $sxolia, $continue_button;
    var $rejectqty, $checkout, $order, $submit, $cancel, $recalc;
	var $detailqty, $stock_msg, $overitem, $ignoreqtyzero, $qtytototal,$total;
	var $path,$autopay, $mydiscount, $mytaxcost, $myfinalcost, $myshippingcost, $discount;

	var $urlpath, $inpath;
	var $todo, $quicktax,$showtaxretail,$is_reseller, $cartlinedetails, $notallowremove;
	var $cartloopdata, $looptotals, $shipcalcmethod, $s_enc, $t_enc, $itemclick, $imagex, $imagey;
	var $cartprintwin, $itemscount, $supershipping, $shipzone, $shipmethods, $parcelunit, $parcelweight;
    var $submit2, $url, $printout, $print_title;
	
    var $rewrite, $readonly, $minus, $plus, $removeitemclass, $maxlenght;
    var $twig_invoice_template_name, $appname, $mtrackimg; 
    var $agentIsIE, $baseurl, $fastpick, $continue_shopping_goto_cmd;	
	
	static $staticpath, $myf_button_class, $myf_button_submit_class;	
	
    public function __construct() {
		$UserName = GetGlobal('UserName');					
		
		storebuffer::storebuffer('cart');
		
		$this->title = localize('SHCART_DPC',getlocal());		
		
		self::$staticpath = paramload('SHELL','urlpath');
		$this->path = paramload('SHELL','prpath');
		$this->urlpath = paramload('SHELL','urlpath');
		$this->inpath = paramload('ID','hostinpath'); 
		$this->baseurl = paramload('SHELL','urlbase');
		
		$murl = arrayload('SHELL','ip');
		$this->url = $this->murl[0];			
		
		$senc = arrayload('SHELL','char_set'); 
		$c = getlocal() ? getlocal() : 0; 
		$this->s_enc = $senc[$c]; 
		$this->t_enc = paramload('SHELL','charset');	 		

		$this->minus = remote_paramload('SHCART','minusqtyclass',$this->path);
		$this->plus = remote_paramload('SHCART','plusqtyclass',$this->path);
		$this->removeitemclass = remote_paramload('SHCART','removeitemclass',$this->path);		
		$this->print_title = remote_paramload('SHCART','printtitle',$this->path); 			
		$this->cartlinedetails = remote_paramload('SHCART','cartlinedetails',$this->path);		
		$this->quicktax = remote_paramload('SHCART','viewtaxfp',$this->path);
		$this->showtaxretail = remote_paramload('SHCART','showtaxretail',$this->path);			
		$this->itemscount = remote_paramload('SHCART','itemscount',$this->path);		
		$this->supershipping = remote_paramload('SHCART','supershipping',$this->path);	
		$this->shipzone = remote_arrayload('SHCART','shipzone',$this->path);	   	  
		$this->shipmethods = remote_arrayload('SHCART','shipmethods',$this->path);
		$this->parcelunit = remote_arrayload('SHCART','parcelunit',$this->path);	   	  
		$this->parcelweight = remote_arrayload('SHCART','parcelweight',$this->path);		
		$this->carterror_mail = remote_paramload('SHCART','carterr',$this->path);
		$this->cartsend_mail = remote_paramload('SHCART','cartsender',$this->path);
		$this->cartreceive_mail = remote_paramload('SHCART','cartreceiver',$this->path); 		
		$this->itemclick = remote_paramload('SHCART','itemclick',$this->path);
		$this->imagex = remote_paramload('SHCART','imagex',$this->path);	
		$this->imagey = remote_paramload('SHCART','imagey',$this->path);	
		$this->cartprintwin = remote_arrayload('SHCART','printwin',$this->path);
		$this->uniname2 = remote_paramload('SHCART','uniname2',$this->path);
		$this->liveupdate = remote_paramload('SHCART','liveupdate',$this->path);
		$this->allowqtyover = remote_paramload('SHCART','allowqtyover',$this->path);
		$this->rejectqty = remote_paramload('SHCART','rejectzeroqty',$this->path);
		$this->detailqty = remote_paramload('SHCART','overqty2detail',$this->path);
		$this->ignoreqtyzero = remote_paramload('SHCART','ignoreqty0',$this->path);
		$this->maxqty = remote_paramload('SHCART','maxqty',$this->path);
		$this->autopay = (remote_paramload('SHCART','auto',$this->path)>0) ? 1 : null;
		$this->bypass_qty = (remote_paramload('SHCART','showqty',$this->path)>0) ? true : false;
		$this->readonly = remote_paramload('SHCART','qtyreadonly',$this->path);
		$this->continue_shopping_goto_cmd = remote_paramload('SHCART','continuegoto', $this->path); 
		
		$rw = remote_paramload('SHCART','rewrite',$this->path);
		$this->rewrite = $rw ? 1 : 0;		
	   
		$mxlen = remote_paramload('SHCART','maxlength',$this->path);
		$this->maxlength = $mxlen ? $mxlen : 3;	 		
		
		$dc = remote_paramload('SHCART','decimals',$this->path);
		$this->dec_num = $dc ? $dc : 2;
		$tx = remote_paramload('SHCART','taxcostpercent',$this->path);	   
		$this->tax = $tx ? $tx : null;
		
		//fixed shipping cost
		$sx = remote_paramload('SHCART','shipcost',$this->path);	   
		$this->shippingcost = GetSessionParam('shipcost') ? GetSessionParam('shipcost') : $sx;	   
		$this->shipcalcmethod = remote_arrayload('SHCART','shipcalcmethod',$this->path);

		//price per client else cart discount global
		$percentoffperclient = remote_arrayload('SHCART','priceoffperclient',$this->path);
		$this->discount  = $percentoffperclient[$this->userLevelID];
		//$this->discount = $discount?$discount:remote_arrayload('CART','discount',$this->path);

		$rm = remote_paramload('SHCART','notallowremove',$this->path);
		$this->notallowremove = $rm ? $rm : 0;	

		$this->twig_invoice_template_name = str_replace('.', getlocal() . '.', 'invoice.htm');
		//echo $this->twig_invoice_template_name; 
		
		$this->continue_button = 1; 	
		
        $this->checkout    = trim(localize('_CHKOUT',getlocal()));				 	
        $this->order       = trim(localize('_ORDER',getlocal()));
	    $this->submit      = trim(localize('_SUBMITORDER',getlocal()));
		$this->submit2 	   = trim(localize('_SUBMITORDER2',getlocal()));		
	    $this->cancel      = trim(localize('_CANCELORDER',getlocal()));
	    $this->recalc      = trim(localize('_RECALC',getlocal()));			
					
		$this->total = (double) 0.0;
  	    $this->qtytotal = GetSessionParam('qty_total');    
        $this->moneysymbol = "&" . paramload('CART','cursymbol') . ";";  
		$this->maxcart = paramload('CART','maxcart');	
		$this->mailerror = 0;
		$this->sxolia = null;	
		$this->stock_msg = null;
		$this->overitem = null;
		$this->todo = null;	
		$this->cartloopdata = null;   
		$this->looptotals = null;		

		$this->status = GetSessionParam('cartstatus') ? GetSessionParam('cartstatus') : 0;			
		$this->total = floatval(GetSessionParam('subtotal'));
		$this->myfinalcost = floatval(GetSessionParam('total'));
		$this->qty_total = GetSessionParam('qty_total');	   
		$this->myshippingcost = floatval(GetSessionParam('myshippingcost'));	   
		$this->mytaxcost = floatval(GetSessionParam('mytaxcost'));	
		$this->mydiscount = floatval(GetSessionParam('mydiscount'));		
		$this->printout = GetSessionParam('printout') ? GetSessionParam('printout') : null;	  
		$this->transaction_id = GetSessionParam('TransactionID') ? GetSessionParam('TransactionID') : null;
		$this->fastpick = GetSessionParam('fastpick') ? true : false;
		$this->is_reseller = GetSessionParam('RESELLER'); 		
	  
		if ($this->maxqty<0) // || ($this->readonly)) { //free style
			$this->javascript(); //ONLY WHEN DEFAULT VIEW EVENT ??	
			
		$useragent = $_SERVER["HTTP_USER_AGENT"];		
		$this->agentIsIE = (strpos($useragent, 'Trident') !== false) ? '1' : '0';	 //ie 11 
		
		$bc1= remote_paramload('SHCART','buttonclass',$this->path);
		$bc2 = remote_paramload('SHCART','buttonclass2',$this->path); /*single product view*/
		self::$myf_button_class = (($bc2) && (GetReq('id'))) ? $bc2 : $bc1;
	   
		$myf_submit = remote_paramload('SHCART','buttonclasssubmit',$this->path);
		self::$myf_button_submit_class = $myf_submit ? $myf_submit : 'myf_button';		  

	    $this->appname = paramload('ID','instancename');	
	    $tcode = remote_paramload('RCBULKMAIL','trackurl', $this->prpath);
	    $this->mtrackimg = $tcode ? $tcode : "http://www.stereobit.gr/mtrack.php";			
    }

    public function event($event) {

		switch ($event) {
			
			case "addtocart"     : 	$p = $this->addtocart();
									$this->jsDialog($this->replace_cartchars($p[1],true), localize('_BLN1', getlocal()));
									break;					 	
									
			case "removefromcart": 	$p = $this->remove(); 
									SetSessionParam('cartstatus',0); 
									$this->status = 0;

									$this->jsDialog($this->replace_cartchars($p[1],true), localize('_BLN2', getlocal()));	
									break;
									
			case "clearcart"     : 	$this->clear(); 
									SetSessionParam('cartstatus',0); 
									$this->status = 0;

									$this->jsDialog(localize('_BLN3', getlocal()), localize('_CART', getlocal()));	
									break;	
									
			case "loadcart"      : 	$this->loadcart(); 
									SetSessionParam('cartstatus',0); 
									$this->status = 0; 
									
									$this->jsDialog(localize('_BLN1', getlocal()), localize('_CART', getlocal()));
									break;			  
								 
			case $this->recalc   :
			case 'calc'          : 	//for auto select and calc reason
									SetSessionParam('cartstatus',0); 
									$this->recalculate(); 
									break;	  
	  
			case "sship"         :	break; //echo GetReq('czone'),'>'; 
			case "transcart" 	 :  break;			
	   
			case "printcart"     : 	$prn = $this->printorder();
									SetSessionParam('ordercart',null);//COMMENT IT, NOT RE-RENDER
									SetSessionParam('orderdetails',null);//COMMENT IT, NOT RE-RENDER
									echo $prn; 
									exit;
								 
			case $this->cancel   : 	SetSessionParam('cartstatus',0); 
									$this->status = 0; 
									$this->cancel_order(); 
								 
									if ($oncancel = remote_paramload('SHCART','cancelgoto',$this->path)) {
										$goto = $oncancel;
										header("Location: http://".$goto); 
										exit;
									}  
									break;								 
						
			case 'cart-checkout' : 
			case $this->checkout : 	if (!GetGlobal('UserID')) {
										$this->todo = 'loginorregister';
										$this->recalculate();
									}
									else {
										SetSessionParam('cartstatus',1); 
										$this->status = 1; 
										$this->recalculate();
										$this->loopcartdata = $this->loopcart();
										$this->looptotals = $this->foot();
									}  
									break;
			case 'cart-order'    :
			case $this->order    : 	SetSessionParam('cartstatus',2); 
									$this->status = 2; 
									$this->calculate_shipping();
									$this->loopcartdata = $this->loopcart();
									$this->looptotals = $this->foot();
									break;
			case 'cart-submit'   :						 
			case $this->submit2  : 
			case $this->submit   : 	SetSessionParam('cartstatus',3);
									$this->status = 3; 		  
									$this->calculate_shipping();		  
									$this->loopcartdata = $this->loopcart();
									$this->looptotals = $this->foot();

									$this->dispatch_pay_engines();									 
									break;
						 
			case "fastpick"      : 	if ($this->fastpick==false) {
										SetSessionParam('fastpick','on');
										$this->fastpick = true;
									}	
									else  {
										SetSessionParam('fastpick',null);
										$this->fastpick = false;
									}
									$msg = $this->fastpick ? localize('_FASTPICKON',getlocal()) : localize('_FASTPICKOFF',getlocal());
									$this->jsDialog($msg, localize('_CART', getlocal()));									
			case 'viewcart'      :						  
			default              : 	$this->loopcartdata = $this->loopcart();
									$this->looptotals = $this->foot();

		}     
    }

    public function action($act=null) {	

		switch ($act) {
			case "sship"     	:   $out .= $this->show_supershipping();
									break;
	   
			case "transcart" 	:   break;
							
			case 'searchtopic'	:	//handler from shkatalog
			case 'addtocart'  	:
			case 'removefromcart': 	break;							
		 
			case "fastpick" 	:	//$out = $this->fastpick ? localize('_FASTPICKON',getlocal()) : localize('_FASTPICKOFF',getlocal());
									$out .= $this->cartview();
									break;
		          
			default          	:	$out = $this->todo ? $this->todolist() : $this->cartview();
       }

	   return ($out);
    }
	
	protected function dispatch_pay_engines() {
		$payway = strtoupper(trim(GetSessionParam('payway')));//override 	
	  
		if (strcmp($payway,'PAYPAL')==0) {

			if (($this->status==3) && ($this->autopay>0)) {
				$this->submit_order(null, $this->twig_invoice_template_name);		  		  

				SetSessionParam('paypalID',$this->transaction_id);
		  
				if ($test2pay=remote_paramload('SHCART','test2pay',$this->path))//!!!!!TEST PAY FOR PAYPAL ETC..
					SetSessionParam('amount',$test2pay);
				else
					SetSessionParam('amount',$this->myfinalcost);

				//reset global params
				SetSessionParam('TransactionID',0);
				SetSessionParam('cartstatus',0); 
				$this->status = 0;		  

				header("Location: ".strtolower(GetSessionParam('payway')).'/');
				exit;
			}
		}
		elseif (strcmp($payway,'PIRAEUS')==0) {	

			if (($this->status==3) && ($this->autopay>0)) {

				$this->submit_order(null, $this->twig_invoice_template_name);		  

				SetSessionParam('piraeusID',$this->transaction_id);
		  
				if ($test2pay=remote_paramload('SHCART','test2pay',$this->path))//!!!!!TEST PAY FOR PAYPAL ETC..
					SetSessionParam('amount',$test2pay);
				else
					SetSessionParam('amount',$this->myfinalcost);

				//reset global params
				SetSessionParam('TransactionID',0);
				SetSessionParam('cartstatus',0); 
				$this->status = 0;		  
			
				header("Location: ".strtolower(GetSessionParam('payway')).'/');
				exit;
			}
		}
		elseif (strcmp($payway,'EUROBANK')==0) {
			
			if (($this->status==3) && ($this->autopay>0))  {

				$this->submit_order(null, $this->twig_invoice_template_name);		  

				SetSessionParam('eurobankID',$this->transaction_id);
		  
				if ($test2pay=remote_paramload('SHCART','test2pay',$this->path))//!!!!!TEST PAY FOR PAYPAL ETC..
					SetSessionParam('amount',$test2pay);
				else
					SetSessionParam('amount',$this->myfinalcost);

				//reset global params
				SetSessionParam('TransactionID',0);
				SetSessionParam('cartstatus',0); 
				$this->status = 0;		  

				//header("Location: ".strtolower(GetSessionParam('payway')).'.php');
				header("Location: ".strtolower(GetSessionParam('payway')).'/');
				exit;
			}
		}	  
		else { //simple order
	  
			$this->submit_order(1, $this->twig_invoice_template_name); 
	  
			SetSessionParam('amount',null);					 								 
			SetSessionParam('subtotal',0);
			SetSessionParam('total',0);
			SetSessionParam('roadway',null);
			SetSessionParam('payway',null);	
			SetSessionParam('addressway',null);
			SetSessionParam('customerway',null);								 	   		   
			SetSessionParam('invway',null);	
			SetSessionParam('sxolia',null);								 
			SetSessionParam('qty_total',null);
		} 
	}
	
	//called by input field onkeyup when free qty edit is on
	protected function js_compute_qty() {
        $url = $this->url . '/calc/'; 
	
		$out = "	
function computeqty(textbox,n)
{
  var textInput = Number(document.getElementById(textbox).value); var qty = textInput + n;  
  if (qty>0){var location = '$url'+textbox+'/'+qty+'/';	window.location.href = location;}	
}
function preselqty(id,step,limit)
{
  var presel = Number(document.getElementById(id).value);
  if ((step<0) && (presel>limit)) qty = presel + Number(step);
  else if ((step>0) && (presel<limit))qty = presel + Number(step);
  else qty = presel;  
}
function addtocart(id,cartdetails)
{
  var preselqty = Number(document.getElementById(id).value);
  var location = cartdetails+preselqty+'/';
  window.location.href = location;
};
";	
		return $out;
    }
	
	protected function javascript() {
	
		if (iniload('JAVASCRIPT')) {
			$code = $this->js_compute_qty();	
			$js = new jscript;	
			$js->load_js($code,"",1);			   
			unset ($js);
		}			   	   	     
	}	
	
	protected function jsDialog($text=null, $title=null) {
	
       if (defined('JSDIALOGSTREAM_DPC')) {
	   
			if ($text)	
				$code = _m("jsdialogstream.say use $text+$title++2000");
			else
				$code = _m('jsdialogstream.streamDialog use jsdtime');
		   
			$js = new jscript;	
			$js->load_js($code,null,1);		
			unset ($js);
	   }	
	}		

	public function addtocart($item=null,$qty=null) {
		$a = $item ? $item : GetReq('a');
		$params = explode(";",$a);	
	   
		//in case of browsing pages after addtocart procedure
		//url continues to execute addtocart (as friend cmd) without $a
		//..poping allways javascript alert(stock_message)
		//so check if param a exist to proceed.
		if ($a!='') {//echo $a,'>';
			if ($this->_count() < $this->maxcart) { //check cart maximum items

				$this->qty_total+=1;
				SetSessionParam('qty_total',$this->qty_total);
			
				$val = floatval(str_replace(',','.',$params[8]));
				$this->total = $this->total + $val;
				//echo '>',strval($params[8]),'+',$this->total;//,'+';print_r($params);//[8];
				SetSessionParam('total',$this->total);			
	   
				//get selected quantity number
				$preqty = GetParam("PRESELQTY");
				$preuni = GetParam("PRESELUNI");
				//echo $bypass_qty,'>';
				//if (!$this->bypass_qty) 
				//$preqty=$qty?$qty:(GetReq('qty')?GetReq('qty'):1);//1; //default qty when qty form not show
			  
				//preqty filed takes place when exist  
				$preqty = GetParam("PRESELQTY") ? GetParam("PRESELQTY") : ($qty ? $qty : (GetReq('qty')?GetReq('qty'):1));  
              
				if ((is_number($preqty)) && ($preqty>0)) {
					//echo $a;
					//$params = explode(";",$a); //moved up

					//if isset 2nd mm convert...
					if (($this->uniname2) && ($preuni==$params[11])) {
						if ($params[12])
							$preqty = ($preqty * $params[12]); //2nd mm
					}

					//check storage
					if ((!$this->ignoreqtyzero) && ($preqty>$params[14]) && ($this->allowqtyover)) {

						$stockout = ($params[14]-$preqty);
						$stock_message = $params[0].",".$params[1].localize('_STOCKOUT',getlocal()) . "(" . $stockout . ")";

						$preqty = $params[14];//set qty= max storage
						//echo "DIATHESIOMo:",$params[14];

						if (iniload('JAVASCRIPT')) {
							$code = "alert('$stock_message')";
							$js = new jscript;
							$js->load_js($code,"",1);
							unset ($js);
						}
						else
							setInfo($stock_message);
					}

					if ($preqty) {
						$params[9]= $preqty;
						$b = implode(";",$params);
						//echo $b;
						$this->addto($b);
					}
				}
				else {
					$input_message = localize('_INPUTERR',getlocal());
					if (iniload('JAVASCRIPT')) {
						$code = "alert('$input_message')";
						$js = new jscript;
						$js->load_js($code,"",1);
						unset ($js);
					}
					else
						setInfo($input_message);
				}

				SetSessionParam('cartstatus',0);
				$this->status = 0;

				if ($user = decode(GetGlobal('UserName')))
					$this->update_statistics('cart-add', $user);
			}
			else
				setInfo(localize('_MSG15',getlocal()));
		}//if $a
		 
		$this->quick_recalculate();//re-update prices and totals
		 
		return ($params); 
	}
	
	public function remove($id=null) {
        $myid = $id ? explode(';', $id) : explode(';', GetReq('a'));

        reset ($this->buffer);           
        foreach ($this->buffer as $buffer_num => $buffer_data) {		
			
		   $param = explode(";",$buffer_data);
		   
           if ($param[0] == $myid[0]) {
	             $this->qty_total-=$param[9];
			     SetSessionParam('qty_total',$this->qty_total);	
				 
	             $this->total-=($param[8]*$param[9]);//price * qty
			     SetSessionParam('total',$this->total);					 	   
		    
                 $this->buffer[$buffer_num] = "x";  
                 break;
           }                                   
        }                    
		$this->setStore();
		
		if ($user = decode(GetGlobal('UserName')))
			$this->update_statistics('cart-remove', $user);
		
 	    $this->quick_recalculate();	//re-update prices and totals	
		
		return ($myid);
	}

    public function isin($id) {

        reset ($this->buffer); 
        foreach ($this->buffer as $buffer_num => $buffer_data) {
		   $param = explode(";",$buffer_data);	
           if ($param[0] == $id) return true;                                    
        }                       
        return false;
    } 	
	
    public function submit_order($sendordermail=null, $invoice_template=null) {
		$myuser = GetGlobal('UserID');	
		$user = decode($myuser);
		$pways = remote_arrayload('SHCART','payways',$this->path);
		$rways = remote_arrayload('SHCART','roadways',$this->path);
		$payway = GetParam('payway')?GetParam('payway'):GetSessionParam('payway');
		$roadway = GetParam('roadway')?GetParam('roadway'):GetSessionParam('roadway');
		$invway = GetParam('invway')?GetParam('invway'):GetSessionParam('invway');	
		$sxolia = GetParam('sxolia')?GetParam('sxolia'):GetSessionParam('sxolia');

		/*when goto save transaction html, customer/user = mail of customer, problem when user mail,cus mail diff */
		/*search by customerway / cart customer selection*/
		$customer = GetSessionParam('customerway') ? GetSessionParam('customerway') : $user;
		$fkey = 	is_numeric($customer) ? 'id' : 'mail';  
	   
		if (!empty($pways))   
			$p = array_keys($pways,$payway);//print_r($p);
		if (!empty($rways))   	 
			$r = array_keys($rways,$roadway);//print_r($r); echo ' >';
	   
		$this->quick_recalculate();//re-update prices and totals
	   	   
		$qty = $this->qty_total;//getcartItems();
		$cost = str_replace(',','.',$this->total);//getcartTotal());
		$costpt = str_replace(',','.',$this->myfinalcost);//getcartSubtotal());
		//echo $this->qtytotal,'-',$this->total;

		if (defined('SHTRANSACTIONS_DPC'))  {
			$this->transaction_id = _m('shtransactions.saveTransaction use '.serialize($this->buffer)."+$user+$payway+$roadway+$qty+$cost+$costpt");
         
			if ($invoice_template) {
			
				$date = date('d.m.y');			
				//$invoice_tokens['invoice'] = $invway .' '.$this->transaction_id;
				$invoice_tokens['invoice'] = localize('_ORDERSUBJECT',getlocal()).' '.$this->transaction_id;
				$invoice_tokens['mynotes'] = $sxolia;
				$invoice_tokens['mydate'] = $date;	
				$invoice_tokens['payway'] = localize(GetSessionParam('payway'), getlocal()); 			
				$invoice_tokens['roadway'] = localize(GetSessionParam('roadway'), getlocal());
				$invoice_tokens['invway'] = localize(GetSessionParam('invway'), getlocal());
			  
				$tokens = serialize($invoice_tokens);
				//do it inside transaction func
				//$htmlout = _m('twigengine.render use '.$invoice_template.'++'.$tokens);
				_m('shtransactions.saveTransactionHtml use '.$this->transaction_id.'+'.$tokens.'+'.$invoice_template."+$customer+$fkey");	
				
				//save trid as printout var for print purposes
				$this->printout = $this->transaction_id;
				SetSessionParam('printout',$this->printout);			
			}
			else {
				$tokens[] = $this->transaction_id;
				$tokens[] = _m('shcustomers.showcustomerdata use ++cusdetails');
				$tokens[] = GetSessionParam('orderdetails');
				$tokens[] = GetSessionParam('ordercart');
				_m('shtransactions.saveTransactionHtml use '.$this->transaction_id.'+'.serialize($tokens).'+shcartprint.htm'."+$customer+$fkey");								 							 
			}		 
		}
		else
			$this->transaction_id = '1111';//dummy

		SetSessionParam('TransactionID',$this->transaction_id);

		if (($sendordermail) && ($this->transaction_id)) {

			$error = $this->goto_mailer($this->transaction_id, $this->twig_invoice_template_name);

			if (!$error) { 
			
			    $this->analytics();
				$this->logcart();
				$this->clear();

				$this->update_statistics('cart-submit', $user);
				
				//transport save
				if (defined('TRANSPORT_DPC')) 
					_m('transport.finalize use '.$this->transaction_id.'+'.$this->shippingcost);			
			}
		}
    }
	
	public function cancel_order() {

	}	

    protected function setuniname($id,$uni,$uA=null,$uB=null) {
		$uniname = $id ;
		$selecteduni = GetParam($uniname);
		if (!$selecteduni) $selecteduni = $uni;
		//print $id.">".$selectedqty."()";

		if (!$this->status) {	//only if status=0 else when cart status > 0 uniname change
			$out = "<SELECT class=\"myf_select_small\" name=\"$uniname\">";

			if ($selecteduni==$uA)
				$out .= "<OPTION selected>$uA";
			else
				$out .= "<OPTION>$uA";

			if ($selecteduni==$uB)
				$out .= "<OPTION selected>$uB";
			else
				$out .= "<OPTION>$uB";

			$out .= "</OPTION></SELECT>";
		}
		return ($out);
	}
	
    public function printorder($data=null,$invoice_template=null) {

	    //DO NOT RE-RENDER PRINT OUT..
	    if ($trid = $this->printout) {
			$out = _m('shtransactions.getTransactionHtml use '.$trid);
			SetSessionParam('printout',null); //reset
			return ($out);
		}
		
	    $headtitle = paramload('SHELL','urltitle');	
		$this->transaction_id = $this->transaction_id?$this->transaction_id:GetReq('trid');
				
	
		if (!$mystyle = remote_paramload('SHCART','printstyle',$this->path))
			$mystyle = 'themes/style.css';
		  
		if (!$mytitle = remote_paramload('SHCART','printtitle',$this->path)) {		
			$mytitle = "<h1>$headtitle | Order No:".$this->transaction_id."</h1>";
			$tokens[] = $this->transaction_id;
		}  
		else {
			$mytitle = "<h1>$mytitle | Order No:".$this->transaction_id."</h1>";
			$tokens[] = $this->transaction_id;
		}  
		
	    $bprint = _m('javascript.JS_function use js_printwin+'.localize('_PRINT',getlocal()));
        $tokens[] =  $bprint;			

        if ($invoice_template) { // && (is_readable($t))) {
		
			//init-reset tokens
			$invoice_tokens = array();
			$invoice_tokens['trid'] = $this->transaction_id;
			$invoice_tokens['sxolia'] = GetSessionParam('orderdetails');
            //$cus = GetSessionParam('customerway'); 			
			$invoice_tokens['cusdata'] = (array) _m("shcustomers.showcustomerdata use +++1");	  
			$invoice_tokens['cartdata'] = GetSessionParam('ordercart');		   
		    
			$x = 'notes123';//.var_export($invoice_tokens, true);
			$date = date('d.m.y');			
			//$invoice_tokens['invoice'] = GetSessionParam('invway') .' '.$this->transaction_id;
			$invoice_tokens['invoice'] = localize('_ORDERSUBJECT',getlocal()).' '.$this->transaction_id;
			$invoice_tokens['mynotes'] = GetSessionParam('sxolia');//$x;
		    $invoice_tokens['mydate'] = $date;				
				
		    if (defined('TWIGENGINE_DPC')) {
			    $date = date('m.d.y');
				$x = 'notes123';//.var_export($invoice_tokens, true);
			    $t = array('invoice'=>GetSessionParam('invway') .' '.$this->transaction_id,
				           'mynotes'=>$x,
						   'mydate'=>$date);
			    $tokens = serialize($t);
			    echo _m('twigengine.render use '.$invoice_template.'++'.$tokens);
				//echo 'z';
				die();
		    }
			else {
				$myprintcarttemplate = 	_m('cmsrt.select_template use shcartprint');	
			
				$out = $this->combine_tokens($myprintcarttemplate,$tokens,true);		
				$out .= '<!--end of document-->';		
			}
        }  		
	    else { 

			$myprintcarttemplate = _m('cmsrt.select_template use shcartprint');
		  
			$tokens[] = _m('shcustomers.showcustomerdata use ++cusdetails');
			$tokens[] = GetSessionParam('orderdetails');
			$tokens[] = GetSessionParam('ordercart');					  
			$out = $this->combine_tokens($myprintcarttemplate,$tokens,true);
	    }

		return ($out);
	}	

    public function recalculate($update_from_db=null) {

		$this->stock_msg = null;
		$this->overitem = null;
		$jcode = null;
	   
		$p_returned = _m('shkatalogmedia.update_prices use '.serialize($this->buffer));
	   
		$this->read_policy();	   
	   
		$this->qty_total = 0;
		SetSessionParam('qty_total',0);
		$this->total = 0;      

		$counter = 0; 
		foreach ($this->buffer as $prod_id => $product) {

			if (($product) && ($product!='x')) {
           
				$counter+=1;
				$param = explode(";",$product);
				$aa = $prod_id+1;// ???? echo $aa,"+++";
		   
				//selected quantity  ..get ? get : post when select is onChange
				$selectedqty = GetReq("Product$aa") ? GetReq("Product$aa") : 
								(GetParam("Product$aa") ? GetParam("Product$aa") : intval($param[9])); 
				//echo $selectedqty,">>";
				$this->qty_total += $selectedqty;
				$qty = $selectedqty;		   
				//selected uniname
				$selecteduni = GetParam("Uniname$aa");		   
		   
				//new prices when updated from db (live)
				if (is_array($p_returned) && isset($p_returned[$param[0]])) {
					
					$ap_price = _m("shkatalogmedia.read_array_policy use ". $param[0].'+'.$p_returned[$param[0]]."++".$selectedqty);			 		   			 
					$param[8] = $ap_price?$ap_price:$p_returned[$param[0]];		 
				}
				$p = floatval(str_replace(',','.',$param[8]));
				$this->total = $this->total+($qty*$p);

				//convert from 2nd mm
				if ($selecteduni) {
					if (($selecteduni==$param[11]) && ($param[12]))  //if selected = 2nd mm
						$selectedqty = ($selectedqty*$param[12]); //multiply by sxesh mm2
				}

				//check storage
				if ((!$this->ignoreqtyzero) && ($selectedqty>$param[14]) && ($this->allowqtyover)) { //enable - disable check over qty selection

					$stockout = ($param[14]-$selectedqty);
					$stock_message = $param[0] . ",". $this->replace_cartchars($param[1], true) . localize('_STOCKOUT',getlocal()) . "(" . $stockout . ")";
					$this->stock_msg .= $stock_message . "<br>";
					$jcode .= "alert('$stock_message');";

					//remark item
					$this->overitem[$prod_id] = 1;
					//pass cart messages to sxolia
					if ($this->detailqty)
						$this->sxolia .= $stock_message;

					$selectedqty = $param[14];//set qty= max store
					//echo "DIATHESIOMo:",$selectedqty,">>>";
				}

				if (($selectedqty)||isset($p_returned[$param[0]])) {//change qty or price from db
					//in case of no selectedqty
					if (!$selectedqty) $selectedqty = $param[9];//default as is
			  
					$this->buffer[$prod_id] = "$param[0];$param[1];$param[2];$param[3];$param[4];$param[5];$param[6];$param[7];$param[8];$selectedqty;$param[10];$param[11];$param[12];$param[13];$param[14];$param[15];";
				}
				else {
					if ($this->rejectqty)
						$this->buffer[$prod_id] = 'x';//=0 so delete it from list
				}
			}
		}
		
		$this->setStore();
	   
		if ((iniload('JAVASCRIPT')) && ($jcode)) {
		    $js = new jscript;
            $js->load_js($jcode,"",1);
		    unset ($js);
		}
	   
		if ($this->itemscount)
			SetSessionParam('qty_total',$counter);//items count
		else
			SetSessionParam('qty_total',$this->qty_total);//qty count 
		 
		$this->calculate_shipping();	 		 
	}

    public function showsymbol($id,$group,$page,$allowremove=null,$qty=null) {
		$myqty = $qty ? $qty : 1; 
		$param = explode(";",$id);

		$gr = $group;
		$ar = $id;

		$price = $param[8]; 
		$ypoA = $param[14];
		if (floatval(str_replace(",",".",$price))>0.001) {//check price
			//if ((!$this->ignoreqtyzero) && ($ypoA>0)) {//check availability..NOT WORK

			if (!($this->isin($param[0]))) {

				if ($this->bypass_qty) { //echo 'bypass_qty';
					$myaction = "addcart/$ar/$gr/$page/";

					$out = "<FORM method=\"POST\" action=\"";
					$out .= "$myaction";
					$out .= "\" name=\"PreSelectQty\">";
					$out .= $this->setquantity('PRESELQTY',1);

					if (($this->uniname2) && ($param[11]))
						$out .= "<br>" . $this->setuniname('PRESELUNI',$param[10],$param[10],$param[11]);

					$out .= $this->submit_qty_button;
					$out .= "</FORM>";
				}
				else
					$ml = "addcart/$ar/$gr/$page/$myqty/";
				
				$out = $this->myf_button(localize('_ADDCARTITEM',getlocal()),$ml,'_ADDCARTITEM');
			}
			else {
		   
				if (($this->notallowremove)&&(!$allowremove)) {//add again 		   	 		   
					$ml = "addcart/$ar/$gr/$page/$myqty/";			 
					$out = $this->myf_button(localize('_ADDCARTITEM',getlocal()),$ml,'_ADDCARTITEM');
				}	 
				else {//remove 		   	 		   
					$mr = "remcart/$ar/$gr/$page/";

					$out = $this->removeitemclass ? 
							"<a class='$this->removeitemclass' href='$mr'></a>" :
							$this->myf_button(localize('_REMCARTITEM',getlocal()),$mr,'_REMCARTITEM');    
				}	 
			}
			//}
			//else $out = $this->notavail;
		}
		else {
			if (!($this->isin($param[0]))) 
				$out = $this->myf_button(localize('_NOTAVAL',getlocal()),'#notavailable','_NOTAVAL');
			
			if ($allowremove) {
				$mr = "remcart/$ar/$gr/$page/";

				$out .= $this->removeitemclass ? 
						"<a class='$this->removeitemclass' href='$mr'></a>" :
						$this->myf_button(localize('_REMCARTITEM',getlocal()),$mr,'_REMCARTITEM');		
			}		
		}	

		return ($out);
	}


	public function cartview($trid=null,$status=null) {
		$cat = GetReq('cat');
		$UserName = decode(GetGlobal('UserName')); 
		if ($trid) //view case
			$this->transaction_id = $trid;
			
		$pview = $cmd ? $cmd : 'klist';
		$myaction = _m('cmsrt.url use t=viewcart'); 
		switch ($this->status) {
			case 1 : 	$myaction = _m('cmsrt.url use t=cart-order'); break;
			case 2 : 	$myaction = _m('cmsrt.url use t=cart-submit');	break;
			case 0 :			
			default : 	$myaction = _m('cmsrt.url use t=cart-checkout'); 
		}		
	   
		$payway = GetParam('payway')?GetParam('payway'):GetSessionParam('payway');
		$roadway = GetParam('roadway')?GetParam('roadway'):GetSessionParam('roadway');
		$invway = GetParam('invway')?GetParam('invway'):GetSessionParam('invway');	    
	   
		$status = $status ? $status : GetReq('status');
   
		if ($status) {
			$this->status = $status;
			$this->recalculate(1); 
		}	
	
		//in case of no event fist..calldpc view...   
		if (empty($this->loopcartdata)) 
			$this->loopcartdata = $this->loopcart();
		
		if (empty($this->looptotals)) 
			$this->looptotals = $this->foot();	     	   

		if ($this->status<3) {

			if ($this->notempty()) {
           		   
				$tokens[] = $myaction;

				if ($this->status==2) {

					//get customer data or register new customer
					if (defined('SHCUSTOMERS_DPC')) {
						$ret = _m('shcustomers.showcustomerdata use ++cusdetails');

						if ($ret) {
							$mydate = date('d/m/Y h:i:s A'); //$this->make_gmt_date();
							$tokens[] = $mydate;
							$tokens[] = $ret;
						}
						else {
							//in case of no customer data register now
							$out = _m('shcustomers.register');
							SetSessionParam('cartstatus',0);
							$this->status = 0;
							return ($out); //exit now
						}
					}
				}
				else {
					$tokens[] = null;
					$tokens[] = null;
				}
		   
				//loop cart
				$tokens[] = $this->loopcartdata;
				
				//footer
				$tokens[] = $this->looptotals;	   	   

				//calc
				$this->calculate_totals();
 
				switch ($this->status) {
			 
					case 1  : 	break;
						 
					case 2  :   SetSessionParam('ordercart',$this->quickview());
					
								$details  = '<br/>'.localize('_PWAY',getlocal()) . ':'. GetParam('payway');
								$details .= '<br/>'.localize('_RWAY',getlocal()) . ':'. GetParam('roadway');
								$details .= '<br/>'.localize('_IWAY',getlocal()) . ':'. GetParam('invway');	   
								$details .= '<br/>'.localize('_DELIVADDRESS',getlocal()) . ':'. GetParam('addressway');	   
								$details .= '<br/>'.localize('_SXOLIA',getlocal()) .':'. GetParam('sxolia');		   
								SetSessionParam('orderdetails',$details);
				
								break;
						 
					case 0  :	 
					default : 	
						    
				}
			 
				$tokens[] = null;
				$tokens[] = null;				 
			}
			else { //empty
				/*$tokens[] = null;//dummy token
				$tokens[] = null;
				$tokens[] = null;			 
				$tokens[] = $this->looptotals;*/ //not totals when empty
				$tokens[] = localize('_EMPTY',getlocal());	 		   
		  
			}
	    }
	    else {//status>=3
	   
			if (defined('SHCUSTOMERS_DPC')) 
				$ret = _m('shcustomers.showcustomerdata');
		  
			if (($this->transaction_id) && (!$this->mailerror)) {	 
		 
			    $tokens[] = $this->finalize_cart_success();
				
				if ($ret) {
				  $tokens[] = $this->transaction_id;
				  $tokens[] = $ret;				
				}
				else {//dummy tokens
		          $tokens[] = null;
		          $tokens[] = null;				
				}				
				$tokens[] = $this->loopcartdata;
				$tokens[] = $this->looptotals;											
			}
			else {		  
		  
			    $tokens[] = $this->finalize_cart_error();
				
				if ($ret) {
				  $tokens[] = $this->transaction_id;
				  $tokens[] = $ret;				
				}
				else {//dummy tokens
		          $tokens[] = null;
		          $tokens[] = null;				
				}				
				$tokens[] = $this->loopcartdata;
				$tokens[] = $this->looptotals;
			}

			//reset global params..								 
			SetSessionParam('TransactionID',0);
			SetSessionParam('cartstatus',0);
			$this->status = 0;
	    }
	   
		if ($this->notempty()) {
			
			$mycarttemplate = _m('cmsrt.select_template use shcart');
			
			if ($this->status>0) { 
				if (!$exist = _m("shcustomers.search_customer_id use code2='" .$UserName."'")) {
					$out .= _m("shcustomers.register");
					$this->status = 0;
					SetSessionParam('cartstatus',0);
				}	
				else
					$out .= $this->combine_tokens($mycarttemplate,$tokens,true);
			}
			else
				$out .= $this->combine_tokens($mycarttemplate,$tokens,true);
		}	
		else {	//empty 1 token 
			$emptycarttemplate = _m('cmsrt.select_template use shcartempty');
			$out = $this->combine_tokens($emptycarttemplate,$tokens,true);
		}		
	   
		return ($out);
	}
	
	protected function loopcart() {
	    if (empty($this->buffer)) return;
	
		$command = $this->itemclick ? $this->itemclick : GetReq('t');
		$status = $this->status ? strval($this->status) : '0';
		$ix = $this->imagex ? $this->imagex : 100;
	    $iy = $this->imagey ? $this->imagey : null; 
	    $ixw = $ix ? "width=".$ix : "width=".$ix;
	    $iyh = $iy ? "height=".$iy :null; //empty y=free dim	   
	   
		//$myloopcarttemplate = _m('cmsrt.select_template use shcart'.$status);
		$myloopcarttemplate = _m('cmsrt.select_template use shcartline'); //.php file, code inside
	   
        reset ($this->buffer);
	    $this->qty_total = 0;
	    $this->total = 0;	     	
	
        foreach ($this->buffer as $prod_id => $product) {

		    if (($product) && ($product!='x')) {
				$aa+=1;
				$param = explode(";",$product); 
				$cat = $param[4];
				$item = $param[1];
				$utitle = $this->replace_cartchars($item, true);				
				$link = _m("cmsrt.url use t=$command&cat=$cat&id=" . $param[0] ."+" . $utitle); 
			   
				$itemphoto = _m("shkatalogmedia.get_photo_url use ".$param[7].'+1');
				$linkimage = seturl("t=$command&cat=$cat&id=".$param[0], "<img src=\"" . $itemphoto . "\" $ixw $iyh alt=\"$item\">",null,null,null,true);
				
				$data[] = ($this->status==0) ? $linkimage : $aa; // . "&nbsp;" . $param[0];

				$details = $this->cartlinedetails ? ($param[6] ? '&nbsp;' . $this->replace_cartchars($param[6], true) : null) : null;	 
				
				switch ($this->status) {
					case 3  :  
					case 2  : 
					case 1  :	 $data[] = $utitle . $details; break; //$param[0] . "&nbsp;" . 				   
					case 0  : 
					default :	 $data[] = $link . $details;  break; //$param[0] . "<br/>" . 					
				}

				$data[] = ($this->status) ? null : $this->showsymbol($product,$param[4],$param[5],1);//<<allow remove here

				$price = floatval(str_replace(",",".",$param[8]));
				$sumtotal = ($param[9] * $price);
				$this->qty_total += $param[9];	 
				$this->total += $sumtotal;
			   
				$data[] = number_format($price,$this->dec_num,',','.') . $this->moneysymbol;

				$options = $this->setquantity("Product$aa",$param[9]);
				if (($this->uniname2) && ($param[11]))
					$options .= $this->setuniname("Uniname$aa",$param[10],$param[10],$param[11]);
				$data[] = $options;

				$data[] = $this->settotal("Product$aa",$price,$param[9]) . $this->moneysymbol;
				
				$data[] = _m("cmsrt.url use t=$command&cat=$cat&id=" . $param[0]);
				$data[] = $utitle;
				$data[] = $itemphoto;
				$data[] = $param[0];
               
			    $loopout .= $this->combine_tokens($myloopcarttemplate,$data,true);
				  
	            unset ($data);
		        unset ($param);
		    }
	    }
	   	   
	    return ($loopout);  	 	
	}
	
    public function settotal($id,$price,$qty) {	

		if (!$qty) $qty = 1;
      
		if ($price!=0) 
			$result = ($price*$qty);
		else
			$result = "--&nbsp;";
		 
		$ret = number_format(floatval($result),$this->dec_num,',','.');	 
		return ($ret);
	}	
	
	protected function logcart() {
		
		foreach ($this->buffer as $prod_id => $product) {
			if (($product) && ($product!='x')) {
				$cartstr = explode(';', $product);
				$item = $cartstr[0];
				_m("cmsvstats.update_item_statistics use $item+checkout");				
			}	
		}		 		
		return true;
	}
	
	public function loadcart($transid=null) {
	    $a = $transid ? $transid : GetReq('tid');
		$transdata = array();
		
		if (is_number($a)) {
			if (defined('SHTRANSACTIONS_DPC')) {

				$transdata = _m('shtransactions.getTransaction use '.$a);
			
				if ($transdata) {
					//unserialize data
					$decodetrans = unserialize($transdata);
			  
					foreach ($decodetrans as $i=>$trcartrec) {
						/**** add log records to stats ****/ 
						$cartstr = explode(';', $trcartrec);
						$item = $cartstr[0];
						_m("cmsvstats.update_item_statistics use $item+cartin");				
				  
						$this->buffer[] = $trcartrec;
					}	
			  
					$this->setStore();
					$this->colideCart();
			  
					return true;
				}
			}
		}
		
		return false;
	}	

	public function previewcart($id,$cmd=null,$template=null) {
        $pview = $cmd ? $cmd : 'kshow';
	    $status = $this->status ? strval($this->status) : '0';
	    $ix = $this->imagex ? $this->imagex : 100;
	    $iy = $this->imagey ? $this->imagey : null;//free y
	    $ixw = $ix ? "width=".$ix : "width=".$ix;
	    $iyh = $iy ? "height=".$iy : null; //empty y=free dim	   		
		
        $loopcart_template = $template ? $template : 'shcartline';		
		$myloopcarttemplate = _m('cmsrt.select_template use ' . $loopcart_template); //.php file, code inside

		if (is_number($id)) {

			$transdata = _m('shtransactions.getTransaction use '.$id);
			$buffer = unserialize($transdata);	
			
			if (!empty($buffer)) {
			  foreach ($buffer as $prod_id => $product) {

				if (($product) && ($product!='x')) {
					$aa+=1;
					$param = explode(";",$product); 
					$cat = $param[4];
					$item = $param[1];
					$utitle = $this->replace_cartchars($item, true);
					
					$addButton = $this->showsymbol($product,$param[4],$param[5],1);//<<allow remove here
					$link = _m("cmsrt.url use t=$pview&cat=$cat&id=" . $param[0] ."+" . $utitle); 
			   
					$itemphoto = _m("shkatalogmedia.get_photo_url use ".$param[7].'+1');
					$linkimage = seturl("t=$pview&cat=$cat&id=".$param[0], "<img src=\"" . $itemphoto . "\" $ixw $iyh alt=\"$item\">",null,null,null,true);	   
					$data[] = $linkimage;

					$details = $this->cartlinedetails ? ($param[6] ? '&nbsp;' . $this->replace_cartchars($param[6], true) : null) : null;					
					$data[] = $link . $details; //$param[0] . "<br/>" . 
					$data[] = $addButton;
                    $data[] = $param[9]; //qty
					
					$price = floatval(str_replace(",",".",$param[8]));
					$data[] = number_format($price,$this->dec_num,',','.') . $this->moneysymbol;					
					
					$ssum = floatval(str_replace(",",".",$price)) * intval($param[9]);	
					$merikosynolo = number_format($ssum,$this->dec_num,',','.') . $this->moneysymbol;		   
					$data[] = $merikosynolo;
					
					$data[] = _m("cmsrt.url use t=$pview&cat=$cat&id=" . $param[0]);
					$data[] = $utitle;
					$data[] = $itemphoto;	
					$data[] = $param[0];					
			   		   
					$loopout .= $this->combine_tokens($myloopcarttemplate,$data,true);
				
					unset ($data);
					unset ($param);
				}
			  }
			}
		}
	   	   
	    return ($loopout);  	 	
	}	

	public function goto_mailer($trid=null, $invoice_template=null, $invoice_subject=null) {
		
		$this->transaction_id = $trid ? $trid : $this->transaction_id;		
	
	    if ($mytrid = $this->printout) {
			$mailout = _m('shtransactions.getTransactionHtml use '.$mytrid);
		}
        else {		

			$template = $invoice_template ? str_replace('.htm', '', $invoice_template) : "shcartmail";
		  	
			$details  = '<br/>'.localize('_PWAY',getlocal()) .':'. GetSessionParam('payway');
			$details .= '<br/>'.localize('_RWAY',getlocal()) .':'. GetSessionParam('roadway');
			$details .= '<br/>'.localize('_IWAY',getlocal()) .':'. GetSessionParam('invway');	   
			$details .= '<br/>'.localize('_DELIVADDRESS',getlocal()) .':'. GetSessionParam('addressway');	   
			$details .= '<br/>'.localize('_SXOLIA',getlocal()) .':'. GetSessionParam('sxolia');		   	  

			if ($invoice_template) {
				//init tokens
				$invoice_tokens = array();
				$invoice_tokens['trid']       = $this->transaction_id;
				$invoice_tokens['payway']     = localize(GetSessionParam('payway'), getlocal());
				$invoice_tokens['roadway']    = localize(GetSessionParam('roadway'), getlocal());
				$invoice_tokens['invway']     = localize(GetSessionParam('invway'), getlocal());
				$invoice_tokens['addressway'] = GetSessionParam('addressway');
				$invoice_tokens['sxolia']     = GetSessionParam('sxolia');		   
				$invoice_tokens['cusdata']    = (array) _m('shcustomers.showcustomerdata use +++1');//array();	  
				$invoice_tokens['cartdata']   = (array) $this->quickview(true); //array of array lines		   
		    
				$x = 'notes123';//.var_export($invoice_tokens, true);
				$date = date('d.m.y');			
				//$invoice_tokens['invoice'] = GetSessionParam('invway') .' '.$this->transaction_id;
				$invoice_tokens['invoice'] = localize('_ORDERSUBJECT',getlocal()).' '.$this->transaction_id;
				$invoice_tokens['mynotes'] = GetSessionParam('sxolia');//$x;
				$invoice_tokens['mydate'] = $date;
				if (defined('TWIGENGINE_DPC')) {
			  
					$t = array('invoice'=>GetSessionParam('invway') .' '.$this->transaction_id,
								'mynotes'=>$x,
								'mydate'=>$date);
					$tokens = serialize($invoice_tokens);//$t);
					$mailout = _m('twigengine.render use '.$invoice_template.'++'.$tokens);
				}
				else {
	            
					$mycarttemplate = _m('cmsrt.select_template use ' . $template);		  
			
					$mailout .= $this->combine_tokens($mycarttemplate,$tokens,true);		
					$mailout .= '<!--end of document-->';	
				}
			}		  
			else {
				$tokens = array();
				$mycarttemplate = _m('cmsrt.select_template use ' . $template);
			
				//$tokens[] = $orderdataprint;	
				$tokens[] = $this->transaction_id;
				$tokens[] = _m('shcustomers.showcustomerdata use ++cusdetails');			
				$tokens[] = $details;
				$tokens[] = $this->quickview(); //no need to call session param ordercart

				$mailout = $this->combine_tokens($mycarttemplate,$tokens,true);		
				$mailout .= '<!--end of document-->';
			}
        }//printout		  
	   
	    if ($invoice_subject!=null) {
			$subject = $invoice_subject;
		}	
	    elseif ($ordermailsubject = remote_paramload('SHCART','ordermailsubject',$this->path)) {
	        $subject = str_replace('@',$this->transaction_id,$ordermailsubject);	   
		}
		else
		    $subject = localize('_ORDERSUBJECT',getlocal()) . $this->transaction_id;
			
		//MAIL THE ORDER TO HOST
 		$this->mailerror = $this->cart_mailto(null,$subject,$mailout);
		//TO CUSTOMER
		$usermail = decode(GetGlobal('UserID'));
 		$this->mailerror = $this->cart_mailto($usermail,$subject,$mailout);		    			  
		  
		return ($this->mailerror);
	}	
	
	public function payway() {
	    $pways = remote_arrayload('SHCART','payways',$this->path);
		if (!$pways) return null;
		   
		$defpay = remote_arrayload('SHCART','payway_default',$this->path);
		$default_pay = $defpay ? $defpay : 0;
        $payway = GetParam('payway')?GetParam('payway'):GetSessionParam('payway');		   
		   		   
		foreach ($pways as $i=>$w) {
		    $lans_titles = explode('/',$w);
			$choice = $lans_titles[getlocal()];
			$choices[] = $choice;
			 
			if (strcmp($choice,$payway)==0) 
				$default_pay = $i;
			else
				$default_pay = 0;  
		}
		$params = implode(',',$choices);

        switch ($this->status) {
			 case 1 :	$pp = new multichoice('payway',$params,$default_pay,false);
						$radios = $pp->render();
						unset($pp);
					 
						$subtokens[] = $radios;					 
						$s1 = $this->get_selection_text('payway',$subtokens);
						$tokens[] = $s1 ? $s1 : $subtokens;						 
						break;
	         case 3 :
		     case 2 :	$mypway = GetParam("payway")?GetParam("payway"):GetSessionParam("payway");
						//hold param
						SetSessionParam('payway',$mypway);	
						$subtokens[] = localize($mypway, getlocal());
						$s1 = $this->get_selection_text('payway',$subtokens);
						$tokens[] = $s1 ? $s1 :$subtokens;						 				 
						break;

			 default : 	$tokens[] = '&nbsp;';
		}

		return ($tokens);
	}	

	public function roadway() {
	    $ways = remote_arrayload('SHCART','roadways',$this->path);
		if (!$ways) return null;
		   
		$defway = remote_arrayload('SHCART','roadway_default',$this->path);
		$default_ship = $defway ? $defway : 0; 
		
		foreach ($ways as $i=>$w) {
		    $lans_titles = explode('/',$w);
		    $choices2[] = $lans_titles[getlocal()];
		}

	    $params = implode(',',$choices2);

        switch ($this->status) {
			 case 1 :	$pp = new multichoice('roadway',$params,$default_ship,false);
						$radios = $pp->render();
						unset($pp);
					 
						$subtokens[] = $radios;
						if ($message = remote_arrayload('SHCART','roadwaystext',$this->path)) 
							$subtokens[] = $message[getlocal()];
						else
							$subtokens[] = '&nbsp;';
					   
						$s1 = $this->get_selection_text('roadway',$subtokens);
						if ($s1) {
							$tokens[] = $s1;
							$tokens[] = '&nbsp;';//dummy							
						}	
						else 
							$tokens =  $subtokens;   					   					   
						break;
	         case 3 :
		     case 2 :	$myrway = GetParam("roadway")?GetParam("roadway"):GetSessionParam("roadway");
						//hold param
						SetSessionParam('roadway',$myrway);
					 
						$subtokens[] = localize($myrway, getlocal());
						$subtokens[] = '&nbsp;';
						$s1 = $this->get_selection_text('roadway',$subtokens);
						if ($s1) { 
							$tokens[] = $s1;
							$tokens[] = '&nbsp;';//dummy
						}	
						else 
							$tokens =  $subtokens;	 							 					 
						break;

			 default : $tokens[] = '&nbsp;';
			           $tokens[] = '&nbsp;';
		}

		return ($tokens);
	}
	
	public function invoiceway() {
		$ways = remote_arrayload('SHCART','invways',$this->path);
		$defway = remote_paramload('SHCART','invway_default',$this->path); 	
		$default_invoice = $defway ? $defway : 0;//override customers default invoice ??

		if (defined('SHCUSTOMERS_DPC'))  {
			$choose_invoice = _v('shcustomers.allow_inv_selection');
			$default_invoice = _v('shcustomers.invtype');
		}   
		   
		if (empty($ways)) {
			$ways[0] = localize('_APODEIXI',0).'/'.localize('_APODEIXI',1);//'_APODEIXI/_APODEIXI';
			$ways[1] = localize('_INVOICE',0).'/'.localize('_INVOICE',1);//'_INVOICE/_INVOICE';
		}

		foreach ($ways as $i=>$w) {
			$lans_titles = explode('/',$w);
			$choices2[] = $lans_titles[getlocal()];
		}

		$params = implode(',',$choices2);		   
		   
		switch ($this->status) {
			 case 1 : 	$pp = new multichoice('invway',$params,$default_invoice,false);
						$radios = $pp->render();
						unset($pp);

						$subtokens[] = $radios;		
						if ($message = remote_paramload('SHCART','invwaystext',$this->path)) 
							$subtokens[] = $message;
						else
							$subtokens[] = '&nbsp;';
					   
						$s1 = $this->get_selection_text('invoiceway',$subtokens);	
						if ($s1) { 
							$tokens[] = $s1;
							$tokens[] = '&nbsp;';//dummy
						}	
						else 
							$tokens =  $subtokens;   					   					   
						break;
	         case 3 :
		     case 2 :	$myiway = GetParam("invway")?GetParam("invway"):GetSessionParam("invway");
						SetSessionParam('invway',$myiway);
					 
						$subtokens[] = localize($myiway, getlocal());
						$subtokens[] = '&nbsp;';
					 
						$s1 = $this->get_selection_text('invoiceway',$subtokens);	
						if ($s1) { 
							$tokens[] = $s1;
							$tokens[] = '&nbsp;';//dummy
						}	
						else 
							$tokens =  $subtokens;	 					 
						break;

			 default : $tokens[] = '&nbsp;';
			           $tokens[] = '&nbsp;';
	    }		 
			 
	    return ($tokens);	   	
	}
	
	public function addressway() {
		   	   
        switch ($this->status) {
			 case 1 : if (defined('SHCUSTOMERS_DPC')) {
					    //$combo=0;
	                    if ($deliv = _m('shcustomers.showdeliveryaddress use addressway')) {
							$pp = new multichoice('addressway',str_replace('<COMMA>',',',$deliv),null,false);
							$con = $pp->render();
							unset($pp);					
							$choice = $con;	
						}
						$addnewlink = _m('shcustomers.addnewdeliverylink use shcart>cartview');
	                  }
					  else
					    $con = "<input class=\"myf_input\" type=\"text\" name=\"addressway\" maxlenght=\"255\" value=\"\">"; 			 
					    
					  $subtokens[] = $con;
					  $subtokens[] = $addnewlink;						
					  
   		             if ($message = remote_paramload('SHCART','addresswaystext',$this->path)) {
		               $out .= $message;
					   $subtokens[] = $message;
					 }
					 else
					   $subtokens[] = '&nbsp;';
					   
					 $s1 = $this->get_selection_text('addressway',$subtokens);	
					 if ($s1) { 
						$tokens[] = $s1;
						$tokens[] = '&nbsp;';//dummy
						$tokens[] = '&nbsp;';//dummy
					 }	
					 else 
					    $tokens =  $subtokens;	   
		             break;
	         case 3 :					 	 
		     case 2 :$myiway = GetParam("addressway") ? GetParam("addressway") : GetSessionParam("addressway");
                     SetSessionParam('addressway',$myiway);		
					 
					 $subtokens[] = $myiway;
					 $subtokens[] = '&nbsp;';
					 $subtokens[] = '&nbsp;';
					 
					 $s1 = $this->get_selection_text('addressway',$subtokens);	
					 if ($s1) { 
						$tokens[] = $s1;
						$tokens[] = '&nbsp;';//dummy
						$tokens[] = '&nbsp;';//dummy
					 }	
					 else 
					    $tokens =  $subtokens;
					 			 
			         break;

			 default : $tokens[] = '&nbsp;';
					   $tokens[] = '&nbsp;';
					   $tokens[] = '&nbsp;';
			           $out = null;					  	 
			 	 
	    }
	   
	    return ($tokens);
	}
	
	public function customerway() {
		   	   
        switch ($this->status) {
			 case 1 :
			   	      if (defined('SHCUSTOMERS_DPC')) {
						$combo=1;
	                    if ($cus = _m('shcustomers.showcustomers use customerway+'.$combo)) {
						  if ($combo) {
						    $choice = $cus;
						  }
						  else {
						    $pp = new multichoice('customerway',str_replace('<COMMA>',',',$cus),null,false);
					        $con = $pp->render();
					        unset($pp);						
							
							$choice = $con;
						  }
						}	
						$addnewlink = _m('shcustomers.addnewcustomerlink use shcart>cartview');    

						$subtokens[] = $choice;
						$subtokens[] = $addnewlink;
						
 						  
   		                if ($message = remote_paramload('SHCART','customerwaystext',$this->path)) {		
						  $subtokens[] = $message;
						}
						else
						  $subtokens[] = '&nbsp;';
						  
						$s1 = $this->get_selection_text('customerway',$subtokens,1,localize('_CUSTOMERSLIST',getlocal()),true);	
						if ($s1) { 
							$tokens[] = $s1;
							$tokens[] = '&nbsp;';//dummy
							$tokens[] = '&nbsp;';//dummy
						}	
						else 
							$tokens =  $subtokens;
						  				
					 }	 
		             break;
	         case 3 :					 	 
		     case 2 :$mycway = GetParam("customerway") ? GetParam("customerway") : GetSessionParam("customerway");
                     SetSessionParam('customerway',$mycway);	

					 $subtokens[] = _m('shcustomers.showcustomers use customerway++++'.$mycway);
					 $subtokens[] = '&nbsp;';
					 $subtokens[] = '&nbsp;';
					 
					 $s1 = $this->get_selection_text('customerway',$subtokens,1,localize('_CUSTOMERSLIST',getlocal()),true);	
					 if ($s1) { 
						$tokens[] = $s1;
						$tokens[] = '&nbsp;';//dummy
						$tokens[] = '&nbsp;';//dummy
					 }	
					 else 
						$tokens =  $subtokens;						 				 
			         break;

			 default : $tokens[] = '&nbsp;';
			           $tokens[] = '&nbsp;';
					   $tokens[] = '&nbsp;'; 
			           $out = null;					  	 	 	 
	    }
	   
	    return ($tokens);
	}	
	
	public function comments() {
	
        switch ($this->status) {
			case 1  :	$subtokens[] = "<input class=\"myf_input\" type=\"text\" name=\"sxolia\" maxlenght=\"255\" value=\"$this->sxolia\">";
						$s1 = $this->get_selection_text('sxolia',$subtokens);	
						$tokens[] = $s1 ? $s1 : $subtokens;	  
						break;
	        case 3  :	$subtokens[] = GetSessionParam("sxolia");
						$s1 = $this->get_selection_text('sxolia',$subtokens);	
						$tokens[] = $s1 ? $s1 : $subtokens;
						break;
		    case 2  :	$sxolia = GetParam("sxolia") ? GetParam("sxolia") : GetSessionParam("sxolia");
						$subtokens[] = $sxolia;
						$s1 = $this->get_selection_text('sxolia',$subtokens);	
						$tokens[] = $s1 ? $s1 : $subtokens;					 
						//hold param
						SetSessionParam('sxolia',$sxolia);					 
						break;		     
					 
			default : 	$tokens[] = '&nbsp;';
						$out = null;
		   }	 
		   
		   return ($tokens); 	
	}

	//call from tmpls to add sxolia 
    public function	addRemarks($text=null,$append=null) {
		$sxolia = GetSessionParam('sxolia'); 
		if ($append==true)
			SetSessionParam('sxolia', $sxolia.$text);
		else
			SetSessionParam('sxolia', $text);
		
		return null;
	}
	
	//call from tmpls to del sxolia 
    public function	delRemarks() {
		
		SetSessionParam('sxolia', '');
		return null;
	}	
	
	protected function get_selection_text($id,$params=null) {

		$mytemplate = _m('cmsrt.select_template use ' . $id);
		$out = $this->combine_tokens($mytemplate,$params,true);
		return ($out);	   	    	
	}	
	
	protected function calculate_shipping() {
		$ways = remote_arrayload('SHCART','roadways',$this->path);
		//print_r($ways);
		//echo 'a';
		if (!$ways) return null;	
		//echo 'b';
		$wp = $ways[0];
		$w = explode('/',$wp);
		$roadway = array_pop($w);
		$shipway = GetParam("roadway") ? //no table in greek
						(getlocal() ? //if in greek, get the english descr
								str_replace('/'.GetParam("roadway"),'',$ways[0]) ://standart english descr 0array ??? 
								GetParam("roadway")
						) :
						(GetSessionParam("roadway") ? 
								GetSessionParam("roadway") : 
								$roadway  //standart english descr ??? 0array
						);	
		//echo 'b',$shipway;
		if ($this->supershipping) {
			//echo 'c';
			$cartweight = $this->weightCart();
			//echo '>',$cartweight; 
		
			$this->shippingcost = $this->calc_supershipping($cartweight,$shipway);
			SetSessionParam('shipcost',$this->shippingcost);
			//echo 'ship calc result:',$result;
			return ($this->shippingcost);
		 
		}
		else {//standart method	
			//echo 'd';
			foreach ($ways as $wid=>$way) {
				if (stristr($way,$shipway)) {
					$id = $wid;
				}
			}		
			$rfile = 'roadway'.$id.'.ini';
			//echo '>',$rfile;
			$file = $this->path . $rfile; //strtolower($shipway) . '.ini';
			if (is_readable($file)) {
				$data = parse_ini_file($file,1);
				//print_r($data);
		
				$method = $this->shipcalcmethod[$id];//per ship selection
		
				/*RECURSION... one func calls another..DISABLE*/
				//$this->quick_recalculate();	//to update totals and prices..	
		
				switch ($method) {
		
					case 2 ://use weight as param..invoke sql
							break;
		
					case 1 ://use items num as param
							$selector = floatval($this->qtytotal);
							break;
		
					case 0 :
					default: //using price as param
							$selector = floatval($this->total);
				}
		
				//echo $selector,'>';
				foreach ($data as $shipkey=>$shiparams) {
					$rcost = floatval($shipkey);
					//echo '<br>',$selector,'<=',$rcost;
					if ($selector<=$rcost){
						$result = floatval($shiparams['cost']);
						break;
					}  
				}
		
				$this->shippingcost += $result;
				//echo $this->shippingcost,'>';
				SetSessionParam('shipcost',$this->shippingcost);
			}
		}//method
		return ($result);
	}


    protected function calculate_totals() {

        $data[] = number_format(floatval($this->total),$this->dec_num,',','.');

	    if ($this->discount) 
			$this->mydiscount = ($this->total*$this->discount)/100;
		else 
			$this->mydiscount = 0;
		 
		if ($this->shippingcost) 
			$this->myshippingcost = $this->shippingcost;		 
	   
		if (($this->tax) && ($this->status)) {
			//($this->is_reseller)) {//is or not reseller calculate tax except if status <3
			$this->mytaxcost = (($this->total-$this->mydiscount)*$this->tax)/100;//+$this->myshippingcost
		}
		else
			$this->mytaxcost = 0;

		$this->myfinalcost = ($this->total+$this->mytaxcost+$this->myshippingcost)-$this->mydiscount;
	   	   
		$ret = number_format(floatval($this->myfinalcost),$this->dec_num,',','.');						

	   return ($ret);
    }

    protected function print_button() {
	    $aftersubmitgoto = remote_paramload('SHCART','aftersubmitgoto',$this->path);
	
	    $title = localize('_TRANSPRINT',getlocal());
		$translink = 'printcart/';
		$ret = $this->myf_button(localize('_TRANSPRINT',getlocal()),$translink,'_TRANSPRINT');
	    
	    //VIEW TRANSACTIONS
		if ((defined('SHTRANSACTIONS_DPC'))) {
			//$out .= _m('shtransactions.viewTransactions');
			$lnk1 = _m('cmsrt.url use t=transview'); 
			$trans_button = '&nbsp;'.$this->myf_button(localize('_TRANSLIST',getlocal()),$lnk1);
		} 			
			
		return ($ret . $trans_button);
    }
	
	protected function finalize_cart_success($transno=null) {
		$UserName = decode(GetGlobal('UserName'));		
	
		$this->update_statistics('cart-purchase', $UserName);	
		
	    $aftersubmitgoto = remote_paramload('SHCART','aftersubmitgoto',$this->path);
        $goto = $aftersubmitgoto?$aftersubmitgoto:GetSessionParam('aftersubmitgoto');
		
	    //in case of paypal return
	    $tr_id = $this->transaction_id ? $this->transaction_id : $transno;
		$tokens[] = $tr_id; 	

        $payway = GetParam('payway')?GetParam('payway'):GetSessionParam('payway');
        $roadway = GetParam('roadway')?GetParam('roadway'):GetSessionParam('roadway');
        $invway = GetParam('invway')?GetParam('invway'):GetSessionParam('invway');	   
        $addressway = GetParam('addressway')?GetParam('addressway'):GetSessionParam('addressway');	   
        $sxolia = GetParam('sxolia')?GetParam('sxolia'):GetSessionParam('sxolia');		   

		$myst = remote_paramload('SHCART','onsuccessgototitle',$this->path);
        $onsuccess = explode('/',$myst); 
		$onsuccesstitle = $onsuccess[getlocal()];
		$goto_title = $onsuccesstitle ? $onsuccesstitle : localize('_HOME',getlocal());

		$gobutton =  _m('cmsrt.url use t=' . $goto . '+' . $goto_title); 
				
		$tokens[] = $this->print_button();		
		$tokens[] = $gobutton; 

		$mycarttemplate = _m('cmsrt.select_template use shcartsuccess');	
		$out = $this->combine_tokens($mycarttemplate,$tokens,true);

		return ($out);
	}

	protected function finalize_cart_error($transno=null) {
		$UserName = decode(GetGlobal('UserName'));		
	
		$this->update_statistics('cart-error', $UserName);		

	    //in case of paypal return
	    $tr_id = $this->transaction_id ? $this->transaction_id : $transno;

		if ($this->mailerror) {
			//change status of transaction
            if (defined('SHTRANSACTIONS_DPC')) 
		        _m('shtransactions.setTransactionStatus use '.$this->transaction_id."+3");
			
			$error = $this->mailerror;//echo $error;
		}

		if (!$this->transaction_id) 
			$error .= "/Invalid transaction id.";

		$msg = localize('_TRANSERROR',getlocal()) . "&nbsp;" . "<a href='contact.php'>$this->carterror_mail</a>";					 

		$tokens[] = $msg; 			
		$tokens[] = $error;
		
		$mycarttemplate = _m('cmsrt.select_template use shcarterror');
		$out = $this->combine_tokens($mycarttemplate,$tokens,true);	

		return ($out);
	}
	
	public function read_policy() {

		$this->discount = $this->get_user_price_policy($this->userid);
		return ($this->discount);
	}

	protected function get_user_price_policy($leeid=null) {
		$db = GetGlobal('db');
		$reseller = GetSessionParam('RESELLER');

		if ($this->leeid!=null)
			$id = $leeid;
		else
			$id = decode(GetSessionParam('UserID'));

		if ($id) {
			$sSQL = "select EKPTOSH from PPOLICY where CODE2=" . $id ;
			$result = $db->Execute($sSQL);

			if ($percent = $result->fields[0]) 
				return ($percent);
			else 
				return ($reseller=='true') ? $this->discount : 0;
	   }

	   return false;
	}	
	
	public function quickview($ret_tokens=false, $template1=null, $template2=null) {		
		 
		if ($this->notempty()) {
			
			$template = $template1 ? $template1 : 'fpcartline';	
			$mytemplate = _m('cmsrt.select_template use ' . str_replace('.htm', '', $template));
		
			$template2 = $template2 ? $template2 : 'fpcart';
			$mytemplate2 = _m('cmsrt.select_template use ' . str_replace('.htm', '', $template2));
	  
			$ret = '';
			foreach ($this->buffer as $prod_id => $product) {

				if (($product) && ($product!='x')) {
		 
					$toks = array();//reset line
			 
					$aa+=1;
					$param = explode(";",$product);
					$cat = $param[4];
					$itemdescr = $this->replace_cartchars($param[1], true);
					$id = $param[0];			   
					
					$toks[] = $prod_id+1;
					$toks[] = $id;
					$toks[] = _m("cmsrt.url use t=kshow&cat=$cat&id=$id+" . $itemdescr); 
					$toks[] = number_format(floatval($param[8]),$this->dec_num,',','.');
					$toks[] = $param[9];
					
					$sum = floatval($param[8])*floatval($param[9]);//$param[11];
					$toks[] = number_format($sum,$this->dec_num,',','.') . $this->moneysymbol;
					
					$toks[] = _m("shkatalogmedia.get_photo_url use ".$id.'+1');
			   
					if ($ret_tokens) 
						return $toks;	 
					else	
						$ret .= $this->combine_tokens($mytemplate,$toks,true);
				}  
			}			
		}				 

		$out = $this->combine_tokens($mytemplate2, array(0=>$ret, 1=>$this->myquickcartfoot()));

		return ($out);
	}

    protected function quick_recalculate() {

		$p_returned = _m('shkatalogmedia.update_prices use '.serialize($this->buffer));	
	   
	    $this->read_policy();		   
	   
	    $this->qty_total = 0;
	    SetSessionParam('qty_total',0);
	    $this->total = 0;
	   
	    $counter = 0;
        foreach ($this->buffer as $prod_id => $product) {
			if (($product) && ($product!='x')) {
           
				$counter+=1;
				$param = explode(";",$product);
		   
				$qty = $param[9];		   
				$selectedqty = intval($param[9]);
		   
				$this->qty_total += intval($qty);
		   
				//new prices when updated from db (live)
				if (is_array($p_returned) && isset($p_returned[$param[0]])) {

					$ap_price = _m("shkatalogmedia.read_array_policy use ". $param[0].'+'.$p_returned[$param[0]]."++".$selectedqty);			 		   			 			 		   
					$param[8] = $ap_price ? $ap_price : $p_returned[$param[0]];
				}		   
		   
				$p = floatval(str_replace(',','.',$param[8]));
				$this->total = $this->total+($qty*$p); 
			}
	    }

	    if ($this->itemscount)
			SetSessionParam('qty_total',$counter);//items count
	    else
			SetSessionParam('qty_total',$this->qty_total);//qty count
		 
	    $this->colideCart();	 
	    $this->calculate_shipping();			  
	}

	public function foot($token=null) {
	
		$this->quick_recalculate();
	   
		$_ttc =  number_format(floatval($this->total),$this->dec_num,',','.'). $this->moneysymbol;
		$tokens[] = $_ttc; 

		if (!$this->status) {	
	     
			SetSessionParam('subtotal',$this->total);   
			SetSessionParam('total',$this->total);	//the same	 
		 
			if ((($this->tax) && ($this->is_reseller)) ||
				(($this->tax) && (!$this->showtaxretail))) {
			 
				$this->mytaxcost = (($this->total-$this->mydiscount)*$this->tax)/100;//($this->total*$this->tax)/100;//+$this->shippingcost
		   
				$_tdisc = null;
				$tokens[] = $_tdisc;//dummy token discount
			  
				$_txcost =  number_format(floatval($this->mytaxcost),$this->dec_num,',','.'). $this->moneysymbol;		   
				$tokens[] = $_txcost;		 	   		   
			}
			else 
				$tokens[] = '';	
		 
			//fill array with empty tokens when not all fields are active
			for ($x=count($tokens);$x<26;$x++) //6<<include details
				$tokens[] = '';		 
	    }
	    else {
		 
			if ($this->discount) {
				$_tdisc = number_format(floatval($this->discountt),$this->dec_num,',','.'). $this->moneysymbol;		   
				$tokens[] = $_tdisc;
			} 
			else 
				$tokens[] = '';		 
		  	 		 	   
			if ((($this->tax) && ($this->is_reseller)) ||
				(($this->tax) && (!$this->showtaxretail))) {
			
				$this->mytaxcost = (($this->total-$this->mydiscount)*$this->tax)/100;//($this->total*$this->tax)/100;//+$this->shippingcost
			
				$_txxcost = number_format(floatval($this->mytaxcost),$this->dec_num,',','.'). $this->moneysymbol;		   
				$tokens[] = $_txxcost;		   
			}
			else
				$tokens[] = '';	
		 
			if ($this->shippingcost) {   
				$_shcost = number_format(floatval($this->shippingcost),$this->dec_num,',','.'). $this->moneysymbol;		   
				$tokens[] = $_shcost;		   
			}
			else
				$tokens[] = '';			 
		  		 
			//final cost
			if (($this->discount) || ($this->shippingcost) || ($this->tax)) {
		 
				$finalcost = ($this->total+$this->mytaxcost+$this->shippingcost)-$this->mydiscount;
		 
				$_ffcost = number_format(floatval($finalcost),$this->dec_num,',','.'). $this->moneysymbol;		   
				$tokens[] = $_ffcost;
		   
				SetSessionParam('subtotal',$this->total);   
				SetSessionParam('total',$finalcost);	//the final cost			   	 
			}
			else
				$tokens[] = '';	
		 
		    foreach ($this->customerway() as $t=>$tt)
				$tokens[] = $tt;
			foreach ($this->invoiceway() as $t=>$tt)
				$tokens[] = $tt;
			foreach ($this->roadway() as $t=>$tt)
				$tokens[] = $tt;
			foreach ($this->payway() as $t=>$tt)
				$tokens[] = $tt;
				
			if (!$nodeliv = remote_paramload('SHCART','nodelivery',$this->path)) {			 
				foreach ($this->addressway(true) as $t=>$tt)
					$tokens[] = $tt;
			}	
			if (!$nocomm = remote_paramload('SHCART','nocomments',$this->path)) {		 
				foreach ($this->comments() as $t=>$tt)
					$tokens[] = $tt;
			}			   
	    } 

		$out = _m('cmsrt._ct use shcartfooter+' . serialize($tokens) . '+1');
		return ($out);
	}	

	public function myquickcartfoot() {

		$this->quick_recalculate();
				
		$_ttc =  number_format(floatval($this->total),$this->dec_num,',','.'). $this->moneysymbol;
		$tokens[] = $_ttc; 			

		//rest sums 
		if ($this->discount) {
            $_tdisc = number_format(floatval($this->discountt),$this->dec_num,',','.'). $this->moneysymbol;		   
		    $tokens[] = $_tdisc;
		} 
		else
		    $tokens[] = '';		   

	   
		if ((($this->tax) && ($this->quicktax) && ($this->is_reseller)) ||
			(($this->tax) && ($this->quicktax) && (!$this->showtaxretail))) {
		   
			$this->mytaxcost = ((($this->total)*$this->tax)/100);//($this->total*$this->tax)/100;
		   
			$_ttd = number_format(floatval($this->mytaxcost),$this->dec_num,',','.'). $this->moneysymbol;
			$tokens[] = $_ttd;  			
		   
		    $grandtotal = $this->total + $this->mytaxcost;
		   
			$_ttg = number_format(floatval($grandtotal),$this->dec_num,',','.'). $this->moneysymbol;
			$tokens[] = $_ttg;  				
		}
		else
		    $tokens[] = '';	
		
	    if ($this->shippingcost) { 
			//echo 'sc:',$this->shippingcost;

            $_shcost = number_format(floatval($this->shippingcost),$this->dec_num,',','.'). $this->moneysymbol;		   
		    $tokens[] = $_shcost;
			/*
			if ($this->supershipping) {//link
		     //echo 'ss:',$this->supershipping;
             $data2[] = "<B>" . seturl('t=sship',localize('_SHIPCOST',getlocal())) . " :</B>";		   
		    */
	    }
        else
			$tokens[] = '';			 
		  		 
		//final cost
		if (($this->discount) || ($this->shippingcost) || ($this->tax)) {
		 
			$finalcost = ($this->total+$this->mytaxcost+$this->shippingcost)-$this->mydiscount;
		 
            $_ffcost = number_format(floatval($finalcost),$this->dec_num,',','.'). $this->moneysymbol;		   
		    $tokens[] = $_ffcost;

			SetSessionParam('subtotal',$this->total);   
			SetSessionParam('total',$finalcost);	//the final cost			   	 
		}
		else
			$tokens[] = '';		   
	   

		$out = _m('cmsrt._ct use fpcartfooter+' . serialize($tokens) . '+1');
		
		return ($out);
	}

	protected function todolist() {
	 
		$mytemplate = _m('cmsrt.select_template use ' . $this->todo);
		 
		switch ($this->todo) {

			case 'loginorregister' :if (defined('CMSLOGIN_DPC')) 
										$a = _m("cmslogin.quickform use +viewcart+shcart>cartview+status+1");  

									if (defined('SHUSERS_DPC')) 
										$b = _m("shusers.regform");
									
									$c = $this->quickview();									
									
								    $res = $a . $b; //any return data
								    if ($res) {
										$tokens[] = $a;
										$tokens[] = $b;
										$tokens[] = $c;
									
										$ret = $this->combine_tokens($mytemplate,$tokens,true);								
									} 
								    else
										$ret = $this->cartview();//default view										 
									break;
			case 'unknownlogin' :	break;
			case 'login'        :   break;
	   }

	   return ($ret);
	}
	
	public function getcartTotal($noformat=null, $tax=null) {
	   
		$val = GetSessionParam('total');
		$taxval = (!$this->status) ? ((floatval($val)*$this->tax)/100) : 0; /*0 when status>0 is recalc inside */
		$sval = ($tax) ? ($val+$taxval) : $val;
	   
		$ret = $noformat ? floatval($sval) : number_format(floatval($sval),$this->dec_num,',','.');	
		return ($ret);
	}
		
	public function getcartSubtotal($noformat=null) {
	   
		$val = GetSessionParam('subtotal');   
		$ret = $noformat ? floatval($val) : number_format(floatval($val),$this->dec_num,',','.');		   
		return ($ret);	
	}
	
	public function getcartItems() {
	   
		$itm = GetSessionParam('qty_total');
		$ret = $itm?$itm:'0';
		return ($ret);	
	}
	
	public function getCartItemQty($id=null) {
		$qtymeter = 0;
		if (!$id) return;
	
		foreach ($this->buffer as $i=>$rec) {
			$data = explode(';',$rec);
			if ($data[0]==$id) {
				$qtymeter+=$data[9];
			}
		}
		return ($qtymeter);
	}	
	
	protected function colideCart() {
		if (empty($this->buffer)) return;
	
		foreach ($this->buffer as $i=>$rec) {
			if ($rec!='x') {
				$data = explode(';',$rec);
				$cs = $data[0].';'.$data[1].';'.$data[2].';'.$data[3].';'.$data[4].';'.$data[5].';'.$data[6].';'.$data[7].';';
				$tempbuffer[$cs] = intval($tempbuffer[$cs])+intval($data[9]).';'.$data[8];
			}
		}	

		if (!empty($tempbuffer)) {
			unset($this->buffer);
			foreach ($tempbuffer as $trec=>$qtyandprice) {

				$params = explode(';',$qtyandprice);
				$this->buffer[] = $trec . $params[1] .';'. $params[0] .';;;;;;;';
			}		
		}	
	  
		$this->setStore();    
	}
	
	protected function show_supershipping() {
		$db = GetGlobal('db');
		$shipway = GetParam("roadway")?GetParam("roadway"):GetSessionParam("roadway");
		//$mymethod = strtolower(trim(str_replace(' ','',$shipway)));
	  
		$weight = $this->weightCart();
		$user_country_id = _m('shuser.get_user_country');
		$czone = GetReq('czone')?GetReq('czone'):$user_country_id;	  
		$cservice = GetReq('cservice');
		$mymethod = strtolower(trim(str_replace(' ','',$cservice))) ?
	              strtolower(trim(str_replace(' ','',$cservice))) :
				  strtolower(trim(str_replace(' ','',$shipway)));	 
		$hr = false;	  
	  
		if ((!$weight) || (!$shipway) || (!$mymethod)) return;	  
	  	  
		$sSQL = "select id,weight,cost from " . $mymethod . " where ";
	  
		$zone = $this->get_country_shipzone($czone);
	  
		if ($zone) {
			if (stristr($zone,'|')) {
				//multiple record zones zone1,zone2 
				$myzones = explode('|',$zone);
				foreach ($myzones as $z=>$zn)
					$tempSQL[] =  'zone=' ."'" . $zn . "'";
		  
				$sSQL .= '(' . implode(' OR ',$tempSQL) . ')';  		
			}
			else
			$sSQL .= 'zone=' ."'" . $zone . "'"; //multiple zones zone1,zone2 per method=service		
		}
		/*elseif (!empty($this->shipzone)) {//old config sets

		foreach ($this->shipzone as $i=>$zone)
		  $tempSQL[] =  'zone=' ."'" . $zone . "'";
		  
		$sSQL .= '(' . implode(' OR ',$tempSQL) . ')';  
		}*/
		$sSQL .=" order by weight"; //desc  when <=weight
		//echo $sSQL;
	  
		$gourl1 = _m('cmsrt.url use t=sship&cservice='.$cservice); 
		$countries = "<select class=\"myf_select_small\" name=\"czone\" onChange=\"location='$gourl1&czone='+this.options[this.selectedIndex].value\">".
	               get_options_file('country',false,true,$czone).
				   "</select>";
		$services = implode(',',$this->shipmethods); 	

		$gourl2 = _m('cmsrt.url use t=sship&czone='.$czone); 
		/*$methods = "<select name=\"cservice\" onChange=\"location='$gourl2&cservice='+this.options[this.selectedIndex].value\">".
	               get_options_file('country',false,true,$cservice).
				   "</select>";*/
		$methods = "<select class=\"myf_select_small\" name=\"cservice\" onChange=\"location='$gourl2&cservice='+this.options[this.selectedIndex].value\">";
		foreach ($this->shipmethods as $i=>$v) {

	        if (stristr($v,'/')) {
			  $vv = explode('/',$v);
			  $title = $vv[getlocal()];
			  $methods .= "<option value=\"$vv[0]\"".($vv[0] == $cservice ? " selected" : "").">$title</option>";
			}
			else
			  $methods .= "<option value=\"$v\"".($v == $cservice ? " selected" : "").">$v</option>";		
		}  
		$methods .= "</select>";				   
				   
		$out .= '<span>'.
	           localize('_SHIPWEIGHT',getlocal()) . 
			   '&nbsp;:&nbsp;'.
			   $weight.localize('_KG',getlocal()).
			   '&nbsp;|&nbsp;'.
			   localize('_SHIPZONE',getlocal()).
			   '&nbsp;:&nbsp;'. 
			   $countries .
			   '&nbsp;&nbsp;'.
			   $methods;
			   '</span>';
		$out .= '<hr>';
	  
		if (!$zone) 
			return ($out); //no result
	  
		$resultset = $db->Execute($sSQL,2);	
		$result = $resultset;
		//print_r($resultset);
		foreach ($result as $n=>$rec) {
	  
			/*if ($rec['weight']>=$weight) {
				$out .= $rec['weight'].'|'.$rec['cost'];		 
			}
			else {
				$out .= $rec['weight'].'|'.$rec['cost'];
			}
			$out .= '<hr>';*/
			$field[] = /*($n+1) .*/ "1&nbsp;" . localize('_PARCELOF',getlocal());
			$attr[] = 'left;40%';
		 
			$sweight = number_format(floatval($rec['weight']),$this->dec_num,',','.');
		 
			$field[] = $sweight . "&nbsp;" . localize('_KG',getlocal());
			$attr[] = 'right;30%';	

			$scost = number_format(floatval($rec['cost']),$this->dec_num,',','.');
							
			$field[] = $scost . "&nbsp;" . $this->moneysymbol;
			$attr[] = 'right;30%';	

			$w1 = new window('',$field,$attr);  
			$out .= $w1->render("center::100%::0::group_article::left::0::0::");		 
			if (($rec['weight']>=$weight) && ($hr==false)) {
				//echo $rec['weight'],'-',$weight;		 
				$hr = true;
				$out .= '<hr>';
			}
			//$ww = round($weight,0); echo $ww,'>';
			//if (floatval($rec['weight']) == floatval($ww))
			//  $out .= $w1->render("center::100%::0::group_article_selected::left::0::0::"); 
			//else
			//  $out .= $w1->render("center::100%::0::group_article::left::0::0::"); 
			unset($field);
			unset($attr);
			unset($w1); 		 	 
		}
		return ($out);  
	}
	
	protected function get_country_shipzone($cid) {
		$db = GetGlobal('db');	
	  
		if ($cid>=0) {
			$id = $cid+1;//plus 1 to find rec	   
			$sSQL = "select zone from pcountry where id=".$id;
			$resultset = $db->Execute($sSQL,2);	
			$result = $resultset;	
          
			$ret = $resultset->fields[0];
			//echo $sSQL,$ret;
			return ($ret);		  
		}
	}
	
	protected function calc_supershipping($weight=null, $method=null) {
		$db = GetGlobal('db');
		$mymethod = $method ? $method : $this->shipmethods[0]; //default 0 shipmethods
		$user_country_id = _m('shuser.get_user_country');
		$czone = /*GetReq('czone')?GetReq('czone'):*/$user_country_id;
	  
		$zone = $this->get_country_shipzone($czone);	  
	  
		if ((!$weight) || (!$method)) {
			return;//'No weight or no method!');
		} 	
	  	  
		$mymethod = strtolower(trim(str_replace(' ','',$method)));	
	  
		//print_r($this->shipzone);
	  
		//echo '>',$method,'-',$weight;
		$sSQL = "select cost from " . $mymethod . " where weight>=" . $weight;
	  
		if ($zone) { //table defined zones pre country
			if (stristr($zone,'|')) {
				//multiple record zones zone1,zone2 
				$myzones = explode('|',$zone);
				foreach ($myzones as $z=>$zn)
					$tempSQL[] =  'zone=' ."'" . $zn . "'";
		  
				$sSQL .= ' and (' . implode(' OR ',$tempSQL) . ')';  		
			}
			else
				$sSQL .= ' and zone=' ."'" . $zone . "'"; 	  
		}
		elseif (!empty($this->shipzone)) { //myconfig entry

			foreach ($this->shipzone as $i=>$zone)
				$tempSQL[] =  'zone=' ."'" . $zone . "'";
		  
			$sSQL .= ' and (' . implode(' OR ',$tempSQL) . ')';  
		}
		$sSQL .=" order by weight"; //desc  when <=weight
		//echo $sSQL;
	  
		$resultset = $db->Execute($sSQL,2);	
		$result = $resultset;
	  
		if ($result) {
			foreach ($result as $n=>$rec)
				return $rec['cost'];  
		}	
	  
		return 0;
	}
	
	protected function weightParcel($sumqty=null) {
		if (($sumqty) && (!empty($this->parcelunit))) {
			//echo '>',$sumqty;
			foreach ($this->parcelunit as $i=>$u) {
				if ($sumqty<=intval($u)) {
					$ret = floatval($this->parcelweight[$i]);
					//echo '>',$ret;
					return ($ret);
				} 	
			}
		} 	
		return 0;	
	}
	
	protected function weightCart() {	
		$total_weight = 0;
		$total_qty = 0;	  
	
		if (empty($this->buffer)) return;
	
		//echo '<pre>';
		//print_r($this->buffer);
		//echo '</pre>';	
	
		foreach ($this->buffer as $i=>$rec) {
			if ($rec!='x') {
				$data = explode(';',$rec);
				$cs = $data[0].';'.$data[1].';'.$data[2].';'.$data[3].';'.$data[4].';'.$data[5].';'.$data[6].';'.$data[7].';';
				$tempbuffer[$data[0]] = $data[9];
				$itemscodes[] = $data[0];
			}
		}
	  
		if (!empty($itemscodes)) {
	   
			$weights = _m('shkatalogmedia.read_item_weight use '.implode(';',$itemscodes));	

			//print_r($tempbuffer); print_r($weights);
			foreach ($tempbuffer as $code=>$qty) {
				$total_weight+= floatval($weights[$code])*$qty;
				$total_qty+= $qty;
			}  
		  
			//extra parcel weight...  
			$total_weight+= $this->weightParcel($total_qty);
		
			//echo $total_weight;
			return ($total_weight);
		}
	  
		return null; 
	}	
	
    public function setquantity($id,$qty=null) {

		$r = $this->readonly ? 'readonly' : null;

		$qtyname = $id ;
		$myqty = is_numeric($qty) ? $qty : 0;
		$selectedqty = GetParam($qtyname) ? GetParam($qtyname) : $myqty;
	  
		if (!$this->status) { //only if status=0 else when cart status > 0 qty change
	  
			if (($this->maxqty<0) || ($this->readonly)) { //free style
		    
				$onchange = "onkeyup=computeqty('$qtyname',0)"; 
				$onclickadd = "onclick=computeqty('$qtyname',1)";
				$onclickreduce = "onclick=computeqty('$qtyname',-1)";
			
				$out = $this->minus ? "<a class='$this->minus' href='#reduce' $onclickreduce></a>" : null;
				$out.= "<input id=\"$qtyname\" name=\"$qtyname\" $onchange value=\"$selectedqty\" size=\"{$this->maxlength}\" maxlength=\"{$this->maxlength}\" $r >";//<<4 max lenght of qty		  
				$out.= $this->plus ? "<a class='$this->plus' href='#add' $onclickadd></a>" : null;
			}
			else { //combo style
		  
				$url_location = $this->url . '/calc/'; 
		  
				$out = "<SELECT class=\"myf_select_tiny\" name=\"$qtyname\" "; //>"
				$out .= "onChange=\"location='$url_location'+'$qtyname'+'/'+this.options[this.selectedIndex].value+'/'\">"; 
				//$out .= "onChange=\"this.form.submit()\">";
				for ($j=1;$j<=$this->maxqty;$j++) {
					if (($selectedqty) && ($selectedqty==$j)) 
						$out .= "<OPTION value='$j' selected>$j";
					else $out .= "<OPTION value='$j'>$j";
				}  
				$out .= "</OPTION></SELECT>";
			}	
		}
		else
			$out = $qty; 
		  
		return ($out);
	}	

    public function price_with_tax($price=null) {
		if (!$price) return '0,00';
		$myprice = floatval(str_replace(array('.',','),array('','.'),$price));
		
		//echo $price,':',$myprice,'*',$this->tax,'/100<br/>';
		$vat = ((($myprice)*$this->tax)/100);
		$vatprice = $myprice + $vat;
		
		$value = number_format(floatval($vatprice),$this->dec_num,',','.');
		$ret = $value . $this->moneysymbol;
        return ($ret);	
    }

	/*ver 2 as shkatalogmedia */
	public function pricewithtax($price,$tax=null) {
	
		if ($tax) {
			$mytax = (($price*$tax)/100);	
			$value = ($price+$mytax);		  
		}
		elseif ($tax = $this->tax) {
			$mytax = (($price*$tax)/100);	
			$value = ($price+$mytax);		  
		}		
		else
			$value = $price;
	
		return ($value);
	}		
	
	protected function cart_mailto($to=null,$subject=null,$body=null) {
	    $from = $this->cartsend_mail;
	    $to = $to ? $to : $this->cartreceive_mail;
		  
	    if (defined('SMTPMAIL_DPC')) {
			
			$trackid = $this->get_trackid($from,$to);
			$mbody = $this->add_tracker_to_mailbody($body,$trackid,$to,1);				
				 
	        $smtpm = new smtpmail;
		   
		    $smtpm->to($to); 
		    $smtpm->from($from); 
		    $smtpm->subject($subject);
		    $smtpm->body($mbody);			   

			$mailerror = $smtpm->smtpsend();
			
			$this->save_outbox($from, $to, $subject, $body, $trackid);

			unset($smtpm);
		}
	    else
	        echo "Mail not send! (smtp not loaded)";		
		  
		  return ($mailerror);	   	
	}
	
	//send mail to db queue
	protected function save_outbox($from,$to,$subject,$body=null, $trackid=null) {
		$db = GetGlobal('db');		
		$ishtml = 1;
		$origin = 'cart'; 
		$datetime = date('Y-m-d h:s:m');
		$active = 0; 		
		
		$sSQL = "insert into mailqueue (timein,timeout,active,sender,receiver,subject,body,origin,cid) ";
		$sSQL .=  "values (" .
			 $db->qstr($datetime) . "," . 
			 $db->qstr($datetime) . "," . 
			 $active . "," .
		     $db->qstr(strtolower($from)) . "," . 
			 $db->qstr(strtolower($to)) . "," .
		     $db->qstr($subject) . "," . 
			 $db->qstr($body) . "," .
			 $db->qstr($origin) . "," .				 
			 $db->qstr($trackid) . ")";
			 		
		$result = $db->Execute($sSQL,1);			 

		return (true);			 
	}	

	protected function get_trackid($from,$to) {
	
		$i = rand(100000,999999);//++$m;	 
		$tid = date('YmdHms') .  $i . '@' . $this->appname;
		 
		return ($tid);	
	}	
	
	protected function add_tracker_to_mailbody($mailbody=null,$id=null,$receiver=null,$is_html=false) {
		if (!$id) return;
		$i = $id;
	
		if ($receiver) {
			$r = $receiver;
			$ret = "<img src=\"{$this->mtrackimg}?i=$i&r=$r\" border=\"0\" width=\"1\" height=\"1\"/>";
		}
		else
			$ret = "<img src=\"{$this->mtrackimg}?i=$i\" border=\"0\" width=\"1\" height=\"1\"/>";
		 
		if (($is_html) && (stristr($mailbody,'</BODY>'))) {
			if (strstr($mailbody,'</BODY>'))
				$out = str_replace('</BODY>',$ret.'</BODY>',$mailbody);
			else  
				$out = str_replace('</body>',$ret.'</body>',$mailbody);
		}	 
		else
			$out = $mailbody . $ret;	 	 
		 
		return ($out);	 
	}	

	protected function update_statistics($id, $user=null) {
        if (defined('CMSVSTATS_DPC'))	
			return _m('cmsvstats.update_event_statistics use '.$id.'+'.$user);			
		
		return false;
	}			
	
		

	/*call from shcartsuccess tmpl for analytics*/
	public function postSubmitScript() {
		$ret = "/* post submit script */";
		return ($ret);
	}

	protected function submitScript() {
		$ret = "/* submit analytics script */";
		
		//$amount = GetSessionParam('amount'); //this->myfinalcost					 								 
		//$subtotal = GetSessionParam('subtotal'); //$this->total
		//$total = GetSessionParam('total'); //this->myfinalcost
		$roadway = GetSessionParam('roadway');
		$payway = GetSessionParam('payway');	
		$addressway = GetSessionParam('addressway');
		$customerway = GetSessionParam('customerway');								 	   		   
		$invway = GetSessionParam('invway');	
		$sxolia = GetSessionParam('sxolia');								 
		$qtytotal =	GetSessionParam('qty_total');	

		$ordertotal = str_replace(',', '.', $this->myfinalcost);
		$ordersubtotal = str_replace(',', '.', $this->total);
		$orderdiscount = $this->discount ? str_replace(',', '.', $this->discount) : '0.0';
		$shipcost = $this->shippingcost ? str_replace(',', '.', $this->shippingcost) : '0.0';
		$taxcost = $this->mytaxcost ? str_replace(',', '.', $this->mytaxcost) : '0.0';
		
		$trid = GetSessionParam('TransactionID') ;//$this->transaction_id		
		
		$tokens = array(0=>$trid, 
		                1=>number_format(floatval($ordertotal),$this->dec_num), 
		                2=>number_format(floatval($ordersubtotal),$this->dec_num), 
						3=>number_format(floatval($shipcost),$this->dec_num), 
						4=>number_format(floatval($discount),$this->dec_num), 
						5=>number_format(floatval($taxcost),$this->dec_num),
						);	
						

		$ret .= _m('cmsrt._ct use cart-js-analytics+' . serialize($tokens) . '+1');
		
		//$template2 = _m('cmsrt.select_template use cart-js-item-analytics');
		$tokens = array();
		foreach ($this->buffer as $prod_id => $product) {
			if (($product) && ($product!='x')) {
				
				$toks = explode(';', $product);	
				$tokens[0] = $toks[0]; //item code
				$tokens[1] = addslashes($this->replace_cartchars($toks[1]), true); //item title
				$tokens[8] = number_format(floatval($toks[8]),$this->dec_num); //item net price 
				$tokens[9] = $toks[9]; //qty
				//extra order tokens
				$tokens[19] = $trid; //max combine no
				
				//$ret .= $this->combine_tokens2($template2,$tokens,true);
				$ret .= _m('cmsrt._ct use cart-js-item-analytics+' . serialize($tokens) . '+1');
				unset($tokens);
			}	
		}		
		
		return ($ret);		

	}
    /*call from this submit_order */
	protected function analytics() {
	
		if (iniload('JAVASCRIPT')) {
			$code = $this->submitScript();	
			$js = new jscript;	
			$js->load_js($code,"",1);			   
			unset ($js);
		}			   	   	     
	}	
	
	
	
	
	public static function myf_button($title,$link=null,$image=null) {

	    $path = self::$staticpath;
	    $bc = self::$myf_button_class;
	   
	    if (($image) && (is_readable($path."/images/".$image.".png"))) {
			$imglink = "<a href=\"$link\" title='$title'><img src='images/".$image.".png'/></a>";
		}
	   
		if (preg_match('/MSIE/i',$_SERVER['HTTP_USER_AGENT'])) { 
			$_b = $imglink ? $imglink : "[$title]";
			$ret = "&nbsp;<a href=\"$link\">$_b</a>&nbsp;";
			return ($ret);
		}	
	   
		if ($imglink)
			return ($imglink);
	
		//else button	
		if ($link)
			$ret = "<a href=\"$link\">";
		  
		$ret .= "<input type=\"button\" class=\"".$bc."\" value=\"".$title."\" />";
	   
		if ($link)
			$ret .= "</a>";	   
		  
		return ($ret);
	}
	
	protected function replace_cartchars($string, $reverse=false) {
		if (!$string) return null;

		$g1 = array("'",',','"','+','/',' ','-&-');
		$g2 = array('_','~',"*","plus",":",'-','-n-');		
	  
		return $reverse ? str_replace($g2,$g1,$string) : str_replace($g1,$g2,$string);
	}	
	
	protected function combine_tokens(&$template_contents, $tokens, $execafter=null) {
	    if (!is_array($tokens)) return;
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
			$fp = new fronthtmlpage(null);
			$ret = $fp->process_commands($template_contents);
			unset ($fp);		  		
		}		  		
		else
			$ret = $template_contents;
		  
	    foreach ($tokens as $i=>$tok) {
		    $ret = str_replace("$".$i."$",$tok,$ret);
	    }

		for ($x=$i;$x<40;$x++)
			$ret = str_replace("$".$x."$",'',$ret);
		
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