<?php

$__DPCSEC['STUTPAY_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("STUTPAY_DPC")) && (seclevel('STUTPAY_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("STUTPAY_DPC",true);

$__DPC['STUTPAY_DPC'] = 'stutpay';

$d = GetGlobal('controller')->require_dpc('stereobit/rcutpay.dpc.php');
require_once($d); 

$e = GetGlobal('controller')->require_dpc('paypal/paybutton.lib.php');
require_once($e); 

//GetGlobal('controller')->get_parent('STUTPAY_DPC','PAYPAL_DPC');

$__EVENTS['STUTPAY_DPC'][0]='stutpay';
$__EVENTS['STUTPAY_DPC'][1]='process';
$__EVENTS['STUTPAY_DPC'][2]='payreturn';
$__EVENTS['STUTPAY_DPC'][3]='paycancel';
$__EVENTS['STUTPAY_DPC'][4]='payipn';
 
$__ACTIONS['STUTPAY_DPC'][0]='stutpay';
$__ACTIONS['STUTPAY_DPC'][1]='process';
$__ACTIONS['STUTPAY_DPC'][2]='payreturn';
$__ACTIONS['STUTPAY_DPC'][3]='paycancel';
$__ACTIONS['STUTPAY_DPC'][4]='payipn';


$__DPCATTR['STUTPAY_DPC']['STUTPAY'] = 'stutpay,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['STUTPAY_DPC'][0]='STUTPAY_DPC;Pay;Pay';   
 
class stutpay extends paypal {

   var $mycharset;

   function stutpay() {
   
      paypal::paypal();  
	 
	  $this->path = paramload('SHELL','prpath'); 
	 	 
 	  $this->title = localize('STUTPAY_DPC',getlocal());	
	  
	  $sandbox = remote_paramload('STUTPAY','sandbox',$this->path);
	  if ($sandbox)
       $this->p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
	  else  
       $this->p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
            
      $cp = remote_paramload('STUTPAY','controlpage',$this->path);       
      $page = $cp?$cp:$_SERVER['PHP_SELF'];
	  $inpath = paramload('ID','hostinpath');	  
      $this->this_script = 'http://'.$_SERVER['HTTP_HOST'].$inpath.'/'.$page;

      // if there is not action variable, set the default action of 'process'
      //if (empty($_GET['action'])) $_GET['action'] = 'process'; 
	  
      $this->title2show = GetParam('title');
      $this->transaction = GetParam('tid');
      //$this->amount = GetParam('amount');
	  
	  $charset = remote_arrayload('SHELL','charset',$this->path);	  
	  $char_set = remote_arrayload('SHELL','char_set',$this->path);
	  if ($charset)
	    $this->mycharset = $charset;
	  else
	    $this->mycharset = $char_set[getlocal()];	
		
	  //echo 'zzzz:',GetReq('t');	
	  if (GetReq('t')=='payipn') {
	    //echo '.......payipn';
        $status = $this->paypal_ipn();
		if ($status==true)
 	      $this->savelog("PAYPAL PAYMENT:IPN IN PROCEESS!!!");		
		else
		  $this->savelog("PAYPAL PAYMENT:IPN ERROR!!!");		
	  }
   }
   
   function event($event=null) {
     //echo ' event ';
     switch ($event) {  
       case 'payreturn': // Order was successful...
	                   $this->handle_Transaction('success');
					   $this->savelog("PAYPAL PAYMENT:SUCCESS!!!");
	                   break;
       case 'paycancel' : //$this->savelog("PAYPAL PAYMENT:CANCELED");	
	     	           $this->handle_Transaction('cancel');
					   $this->savelog("PAYPAL PAYMENT:CANCELED!!!");
	                   break;
       case 'payipn'    : // Paypal is calling page for IPN validation...	
                       $this->paypal_ipn();
		               if ($status==true)
 	                     $this->savelog("PAYPAL PAYMENT:IPN IN PROCEESS!!!");		
		               else
		                 $this->savelog("PAYPAL PAYMENT:IPN STATUS ERROR!!!");			
	                   break;
					   
       default       : 
	   case 'stutpay':
	   case 'process': $this->savelog("PAYPAL PAYMENT:INITIALIZE!!!");
	   
	                   $this->p->add_field('address_override', '1');
                       $cust_data = GetGlobal('controller')->calldpc_method("stutasks.get_customer_details use ".$this->transaction); 					   
					   $this->p->add_field('address1', $cust_data[4]);
					   $this->p->add_field('address2', $cust_data[5]);
					   $this->p->add_field('city', $cust_data[2]);
					   //$this->p->add_field('country', 'EUR'); //must be country code
					   $this->p->add_field('first_name', $cust_data[0]);
					   $this->p->add_field('last_name', $cust_data[1]);
					   $this->p->add_field('zip', $cust_data[6]);
					   
					   $this->p->add_field('charset', $this->mycharset);//choose based on site lang
					   
	                   $this->p->add_field('currency_code', 'EUR');
					   $this->p->add_field('invoice', $this->transaction );
	   	   
                       $this->p->add_field('business', $this->paypal_mail);//'YOUR PAYPAL (OR SANDBOX) EMAIL ADDRESS HERE!');
                       $this->p->add_field('return', $this->this_script.'?t=payreturn&type=invoice&key='.GetReq('key').'&tid='.$this->transaction); //back to invoice view
                       $this->p->add_field('cancel_return', $this->this_script.'?t=paycancel&type=invoice&key='.GetReq('key').'&tid='.$this->transaction); //back to invoice view
                       $this->p->add_field('notify_url', $this->this_script.'?t=payipn&type=invoice&key='.GetReq('key').'&tid='.$this->transaction);
                       
                       $name = GetGlobal('controller')->calldpc_method("stutasks.get_task_pay_title use ".$this->transaction);                       	      
                       $this->p->add_field('item_name', $name);
                       
                       $price = GetGlobal('controller')->calldpc_method("stutasks.get_task_pay_amount use ".$this->transaction);
                       $this->p->add_field('amount', $price); 					   
					   
                       $itemqty = GetGlobal('controller')->calldpc_method("stutasks.get_task_pay_qty use ".$this->transaction);
                       $this->p->add_field('quantity', $itemqty); 					   
					   
	                   if ($price>0) {	
                         $this->p->submit_paypal_post(); // submit the fields to paypal
					     die();
	                   }
					   break;		   
	 }
   }
   
   function action($action=null) {
     //echo ' action ';   
     switch ($action) {
		case 'payreturn' : echo GetGlobal('controller')->calldpc_method("stutasks.invoice_viewer use ".$this->transaction."+1");
		                   die();
		                 break;
		case 'paycancel'  : echo GetGlobal('controller')->calldpc_method("stutasks.invoice_viewer use ".$this->transaction);
		                    die();
		                 break;
		case 'payipn'     : $ret = null;//'Key:' . GetReq('key');//null;
		                 break; 
		case 'stutpay' :				 
	    case 'process' : //$ret = $this->error;//null;//must not have action, if error goto frontpage'Please wait processing...'; 
	    default        : $ret = seturl('t=',localize('_HOME',getlocal()));
		                 $ret .= $this->set_message('error');

	 } 
	 
	 return ($ret);
   }  
   
   function paypal_ipn() {
   
	                   if ($f = fopen($this->path."paypal_last_ipn.txt",'w+')) {
					       $pstr = GetReq('key').'\rInitialize...';
	                       fwrite($f,$pstr,strlen($pstr));
		                   fclose($f);
	                   }
					   //echo 'a';	 					   
                       if ($this->p->validate_ipn()) {
	                     if ($f = fopen($this->path."paypal_last_ipn.txt",'a+')) {
					       $pstr = GetReq('key').'\rValidated...';
	                       fwrite($f,$pstr,strlen($pstr));
		                   fclose($f);
	                     }		
						 //echo 'b';			   
	                     if ($this->verify_paypal_ipn()) {//to check mail ,txn_id
					   
					       if ($f = fopen($this->path."paypal_last_ipn.txt",'a+')) {
					         $pstr = GetReq('key').'\rVerified...';
	                         fwrite($f,$pstr,strlen($pstr));
		                     fclose($f);
	                       }
					       //echo 'c';
	                       $ret = $this->handle_Transaction('ipn');	
						 
	                       if ($f = fopen($this->path."paypal_last_ipn.txt",'a+')) {
					         //$pstr = implode('::',$_POST);
						     foreach ($_POST as $id=>$val)
						       $pstr .= "[".$id."]=".$val."\r";
	                         fwrite($f,$pstr,strlen($pstr));
		                     fclose($f);
	                       }
						   //echo 'd';						   					      	   
					     }	 
					   }	
					   
	  return ($ret);				   
   
   }
   
   function verify_paypal_ipn() {
	 
     if (($_POST['receiver_email']==$this->paypal_mail) && ($this->txnid_is_unique())) {
	   return true;	  
	 }  
	 
	 return false;
   } 
   
   function txnid_is_unique() {
     $db = GetGlobal('db');   
   
     //check ipn posts
     if ( (defined('SHTRANSACTIONS_DPC')) && (seclevel('SHTRANSACTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {
	 
       if (isset($_POST['txn_id'])) {
		 
         $isunique = GetGlobal('controller')->calldpc_method("shtransactions.checkPaypalTXNID use ".$_POST['txn_id']);	 
	   
	     if ($isunique)  {
           GetGlobal('controller')->calldpc_method("shtransactions.setTransactionStoreData use $id+costpt+".$_POST['payment_gross']);
           GetGlobal('controller')->calldpc_method("shtransactions.setTransactionStoreData use $id+type1+".$_POST['txn_id']);		 
	     }
	   
	     return ($isunique);	
	   }
	   return false;    
	 }
	 else //in case of no transaction modules return always true...
	   return true;
   } 
   
   function handle_Transaction($status) {

           $id = $this->transaction?$this->transaction:GetReq('tid');   

           switch ($status) {
               case 'ipn'    : $ret = GetGlobal('controller')->calldpc_method("stutasks.set_task_status use $id+21");
			                   //decativate in ipn in case of no return
							   if ($ret==true)
			                     $ret = GetGlobal('controller')->calldpc_method("stutasks.deactivate_task use " . $id);
                               break;
               case 'success': //GetGlobal('controller')->calldpc_method("stutasks.set_task_status use $id+22");
			                   //deactivate aggain for sure...
			                   $r1 = GetGlobal('controller')->calldpc_method("stutasks.deactivate_task use " . $id);
                               break;													
               case 'cancel' : $r1 = GetGlobal('controller')->calldpc_method("stutasks.set_task_status use $id+20");
                               break;
           }	   

           if ( (defined('SHTRANSACTIONS_DPC')) && (seclevel('SHTRANSACTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {

                switch ($status) {
                    case 'ipn'    : GetGlobal('controller')->calldpc_method("shtransactions.setTransactionStatus use $id+2");
                                    break;
                    case 'success': GetGlobal('controller')->calldpc_method("shtransactions.setTransactionStatus use $id+1");
                                    break;													
                    case 'cancel' : GetGlobal('controller')->calldpc_method("shtransactions.setTransactionStatus use $id+-1");
                                    break;
                }
           }
		   
		   return ($ret);
   }   
   
   
        function pay_now_button() {
			   
          $imagepath = 'http://'.$_SERVER['HTTP_HOST'].$inpath.'/images';			
		
		  $this->button = new PayPalButton;														//initiate the class instance
		  $this->button->accountemail = remote_paramload('PAYPAL','paypalmail',$this->path);//'jason@almost-anything.com.au';							//the account that is registered with paypal where money will be sent to
		  $this->button->custom = 'my custom passthrough variable'; 							//a custom string that gets passed through paypals pages, back to your IPN page and Return URL as $_POST['custom'] . useful for database id's or invoice numbers. WARNING: does have a max string limit, don't go over 150 chars to be safe
		  $this->button->currencycode = 'EUR';//'USD';													//currency code
		  $this->button->target = '_blank';														//Frame Name, usually '_blank','_self','_top' . Comment out to use current frame.
		  $this->button->class = 'paypalbutton';												//CSS class to apply to the button. Comes in very handy
		  $this->button->width = '150';															//button width in pixels. Will apply am Inline CSS Style to the button. Comment if not needed.
		  $this->button->image = $imagepath . '/paynow.jpg';						//image 150px x 50px that can be displayed on your paypal pages.
		  $this->button->buttonimage = $imagepath .'/paynow.jpg';									//img to use for this button
		  $this->button->buttontext = 'Proceed to Payment &gt; ';								//text to use if image not found or not specified
		  $this->button->askforaddress = false;													//wether to ask for mailing address or not
		  $this->button->return_url = $this->this_script.'?t=payreturn&type=invoice&key='.GetReq('key').'&tid='.$this->transaction;//'http://www.jc21.com/home/';								//url of the page users are sent to after successful payment
		  $this->button->ipn_url = $this->this_script.'?t=payipn&type=invoice&key='.GetReq('key').'&tid='.$this->transaction;//'http://www.jc21.com/paypal/';								//url of the IPN page (this overrides account settings, IF IPN has been setup at all.
		  $this->button->cancel_url = $this->this_script.'?t=paycancel&type=invoice&key='.GetReq('key').'&tid='.$this->transaction;//'http://www.jc21.com/'; 									//url of the page users are sent to if they cancel through the paypal process
   
		  //ITEMS
		  //Paypal buttons are different when you're selling 1 item and anything more than 1 item. My class takes care of this for you.
		  //Syntax: $button->AddItem(item_name,quantity,price,item_code,shipping,shipping2,handling,tax);
		  //Here are a few examples:
		  //$this->button->AddItem('Item Name','1','100.00','wsc001');							//1 quantity, no shipping, no handling, default tax.
		  //$this->button->AddItem('Item Name','1','100.00','wsc001','','','','0.00');			//1 quantity, no shipping, no handling, NO TAX
		  //$this->button->AddItem('Item Name','3','100.00','wsc001','10.00');					//3 quantities, $10.00 shipping, no handling, default tax.

          $this->button->AddItem($item_name,$qty,$price);
		  
		  $ret = $this->button->OutputButton();	   
		
		  return ($ret);		  			
        }         
   
};
}
?>