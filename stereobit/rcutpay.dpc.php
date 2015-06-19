<?php

$__DPCSEC['RCUTPAY_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("RCUTPAY_DPC")) && (seclevel('RCUTPAY_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCUTPAY_DPC",true);

$__DPC['RCUTPAY_DPC'] = 'rcutpay';

$d = GetGlobal('controller')->require_dpc('paypal/paypal.dpc.php');
require_once($d); 

GetGlobal('controller')->get_parent('RCUTPAY_DPC','PAYPAL_DPC');

$__EVENTS['RCUTPAY_DPC'][0]='rcutpay';
 
$__ACTIONS['RCUTPAY_DPC'][0]='rcutpay';


$__DPCATTR['RCUTPAY_DPC']['RCUTPAY'] = 'paypal,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCUTPAY_DPC'][0]='RCUTPAY_DPC;Pay;Pay';   
 
class rcutpay extends paypal {

   var $title;
   var $reset_database;
   var $paypal_data;
   
   var $transaction, $amount;
   var $error;
   var $path, $title2show;
   var $paypal_mail,$inform_ipn_mail;

   function rcutpay() {
   
     paypal::paypal();  
	 
 	 $this->title = localize('PAYPAL_DPC',getlocal());	
	 
	 $this->reset_database = false; 
	 //not used
	 $this->paypal_data = array(0=>'mc_gross',
		              1=>'address_status',
					  2=>'payer_id',
					  3=>'tax',
					  4=>'address_street',
					  5=>'payment_date',
					  6=>'payment_status',
					  7=>'charset',
					  8=>'address_zip',
					  9=>'first_name',
					  10=>'mc_fee',
					  11=>'address_country_code',
					  12=>'address_name',
					  13=>'notify_version',
					  14=>'custom',
					  15=>'payer_status',
					  16=>'business',
					  17=>'address_country',
					  18=>'address_city',
					  19=>'quantity',
					  20=>'verify_sign',
					  21=>'payer_email',
					  22=>'txn_id',
					  23=>'payment_type',
					  24=>'last_name',
					  25=>'address_state',
					  26=>'receiver_email',
					  27=>'receiver_id',
					  28=>'txn_type',
					  29=>'item_name',
					  30=>'mc_currency',
					  31=>'item_number',
					  32=>'test_ipn',
					  33=>'payment_gross',
					  34=>'shipping',
					  35=>'payment_fee',
					  36=>'receipt_id'
					  );	
					  
      //if (empty($_GET['action'])) $_GET['action'] = ""; echo $_GET['action'],">>>";//'process';   					   
	  
	  $this->transaction = GetSessionParam('paypalID');
	  $this->amount = GetSessionParam('amount');	
      $this->path = paramload('SHELL','prpath');
      $this->title2show =  remote_paramload('RCUTPAY','title',$this->path);
	  
	  $this->paypal_mail = remote_paramload('RCUTPAY','paypalmail',$this->path);	 
	  $this->inform_ipn_mail = remote_paramload('RCUTPAY','ipnmailto',$this->path);	  
	  
	 
	  $sandbox = remote_paramload('RCUTPAY','sandbox',$this->path);
	  if ($sandbox)
       $this->p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
	  else  
       $this->p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url
            
      // setup a variable for this script (ie: 'http://www.micahcarrick.com/paypal.php')
      $this->this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

      // if there is not action variable, set the default action of 'process'
      if (empty($_GET['action'])) $_GET['action'] = 'process';    	  
   }
   
   function event($event=null) {
   
     switch ($_GET['action']) { 
	 
	   case 'process': //default event....
	                   if ($this->reset_database) {
						   
						   $this->reset_db2('paypal_ipn',$this->paypal_data);	
						   $this->reset_db2('paypal_posts',$this->paypal_data);	
						   echo "Paypal tables reset successfully!\n";  
					   } 
	   
	   
                       $this->p->add_field('business', $this->paypal_mail);//'YOUR PAYPAL (OR SANDBOX) EMAIL ADDRESS HERE!');
                       $this->p->add_field('return', $this->this_script.'?action=success&'.SID);
                       $this->p->add_field('cancel_return', $this->this_script.'?action=cancel&'.SID);
                       $this->p->add_field('notify_url', $this->this_script.'?action=ipn&'.SID);	      
	 
	                   
	                   if ($this->set_product_info($this->title2show.$this->transaction,$this->amount)) {//set the product attributes
                         $this->p->submit_paypal_post(); // submit the fields to paypal
						 die();
	                   }
	                   else {
	                     $msg = "Product details error!"; //echo $msg;
                         $template = paramload('SHELL','prpath') . "paypal_error.tpl";
		                 $this->error = str_replace("##_LINK_##",$msg,file_get_contents($template));							 
						 //echo $this->error;
	                   }
	                   
					   break;	 
       case 'success': // Order was successful...
	                   $this->handle_Transaction('success');
	                   $this->get_paypal_posts(); //HAS NOT CONFIRMED BY IPN YET!!!!
					   
                       //extra security set payment = true as session param
	                   //to prevent cmd instant download from pickit!!!
	                   SetSessionParam('PAYMENTSUBMITED','secretpaymentnumber');					   
					   
					   $item = $this->paypal_post['item_name'];
					   //GetGlobal('controller')->calldpc_method("rcpickit.get_product use $item");
					   
					   //$this->register_customer();
					   
					   $this->send_downloaded_mail();
					   
	                   break;
       case 'cancel' : $this->savelog("PAYPAL PAYMENT:CANCELED");	
	     	           $this->handle_Transaction('cancel');
	                   break;
       case 'ipn'    : // Paypal is calling page for IPN validation...		
											      	   
                       if ($this->p->validate_ipn()) {
					     //echo "val";
                         //if ($this->reset_database) 
						   //$this->reset_db('paypal_ipn',$this->p->ipn_data);							   				   
					   
					     if ($this->verify_paypal_ipn()) {//to check mail ,txn_id
						   $this->handle_Transaction('ipn');					   						 
						   //$this->insert_ipn($this->p->ipn_data);
		                   //$this->procced_on_payment();//backend operations
						   $this->savelog("PAYPAL IPN:SUCCESS");
   		 		           $this->tell_ipn_by_mail();
						 }  
						 else {
						   $this->savelog("PAYPAL IPN:SUSPEND!!!!");
						   $this->tell_by_mail("Ipn suspended!!!",
						                       $this->p->ipn_data['payer_email'],
											   $this->inform_ipn_mail,
											   implode("\n",$this->p->ipn_data));						   
						 }  
						   
						 die();
                       }
	                   else {  
	                     $this->error = $this->p->last_error;//'Error during ipn.';
		                 $this->savelog("PAYPAL IPN:FAILED(".$this->error.")");							 
						 $this->tell_by_mail("Ipn validation problem",
						                       $this->p->ipn_data['payer_email'],
											   $this->inform_ipn_mail,
											   implode("\n",$this->p->ipn_data));
	                   }						                      
	                   break;
					   
       default       : if ($this->reset_database) {
						   
						   $this->reset_db2('paypal_ipn',$this->paypal_data);	
						   $this->reset_db2('paypal_posts',$this->paypal_data);	
						   echo "Paypal tables reset successfully!\n";  
					   } 
	 }
   }
   
   function action($action=null) {
   
     switch ($_GET['action']) {
	    case 'process' : $ret = $this->error;//null;//must not have action, if error goto frontpage'Please wait processing...'; 
		                 break;
		case 'success' : //$ret = 'Thank you for your order.'; 
		                 //if ($this->reset_database)
		                   //$this->reset_db('paypal_posts',$this->paypal_post);//start up db table!!!!!!!!!!
						 
		                 if ($this->verify_paypal_posts()) {
						   $this->insert_posts($this->paypal_post);
						   $ret = $this->procced_after_payment(); 
						   /*$this->tell_by_mail("Successful pay",
						                       $this->paypal_post['payer_email'],
											   $this->inform_ipn_mail,
											   implode("\n",$this->paypal_post));*/						    										   
						 }  
						 else {
						   $ret = $this->set_message('error');	  
						   $this->tell_by_mail("Verification problem",
						                       $this->paypal_post['payer_email'],
											   $this->inform_ipn_mail,
											   implode("\n",$this->paypal_post));
						 }  
		                 break;
		case 'cancel'  : //$ret = 'You cancel this transaction.'; 
		                 $ret = $this->set_message('cancel');			
		                 break;
		case 'ipn'     : $ret = $this->error . "(".$this->p->last_error.")"; 
		                 break; 
	    default        : $ret = null;//no action 
	 } 
	 
	 return ($ret);
   }
   
   function tell_ipn_by_mail() {

         // For this example, we'll just email ourselves ALL the data.
         $subject = 'Instant Payment Notification - Recieved Payment';
         $to = $this->inform_ipn_mail;//'YOUR EMAIL ADDRESS HERE';    //  your email
         $body =  "An instant payment notification was successfully recieved\n";
         $body .= "from ".$this->p->ipn_data['payer_email']." on ".date('m/d/Y');
         $body .= " at ".date('g:i A')."\n\nDetails:\n";
         
         foreach ($this->p->ipn_data as $key => $value) { $body .= "\n\r$key: $value"; }
		 
		 $this->tell_by_mail($subject,$this->p->ipn_data['payer_email'],$to,$body);   
   }
   
   //overwrite
   function get_paypal_posts() {
   
     //print_r($this->paypal_data);
     foreach ($_POST as $key => $value) { 
	   //echo "$key: $value<br>"; 
	   
	   //check to see if paypal data=columns in db exist
	   //in case of paypal change something in posts vars 
	   //record will not save in db 
	   if (in_array($key,$this->paypal_data))
	     $this->paypal_post[$key] = $value;
	   else {
	     //inform admin
	     $this->tell_by_mail("Paypal post field [$key] not recognized.",
		                     $this->inform_ipn_mail,
							 $this->inform_ipn_mail,
							 "Paypal service changed.");   
	   }	 
	 }   
   }  
   
   function verify_paypal_posts() {
   
     //echo $this->paypal_post['receiver_email']," ",$this->paypal_mail," ",$this->paypal_post['txn_id'];
     if (($this->paypal_post['receiver_email']==$this->paypal_mail) /*&&
	     ($this->exists_ipn($this->paypal_post['txn_id'])) DELAY PROBLEMS */)
	   return true;
	 else
	   return false;  	  
   } 
   
   function verify_paypal_ipn() {
	 
     if (($this->p->ipn_data['receiver_email']==$this->paypal_mail) &&
	     ($this->txnid_is_unique($this->p->ipn_data['txn_id']))) {
	   return true;	  
	 }  
	 
	 return false;
   }    
   
   //called once during proces at ipn and post return
   function reset_db($name, $data) {
        $db = GetGlobal('db'); 

        //delete table if exist
  	    $sSQL1 = "drop table $name";
        $db->Execute($sSQL1,1);
		$sSQL2 = "create table $name " .
                    "(id integer auto_increment primary key,
                     date DATETIME ";
					 
        foreach ($data as $key => $value)
		  $sSQL2 .= ", $key VARCHAR(128)";
					 
		$sSQL2 .= ")";																	
        $db->Execute($sSQL2,1);   
		//echo $sSQL2;					
    }
	//reset based on this->paypal_post
    function reset_db2($name, $data) {
        $db = GetGlobal('db'); 

        //delete table if exist
  	    $sSQL1 = "drop table $name";
        $db->Execute($sSQL1,1);
		$sSQL2 = "create table $name " .
                    "(id integer auto_increment primary key,
                     date DATETIME ";
					 
        foreach ($data as $key => $value)
		  $sSQL2 .= ", $value VARCHAR(128)";
					 
		$sSQL2 .= ")";																	
        $db->Execute($sSQL2,1);   
		//echo $sSQL2;					
    }	
	
	function insert_ipn($data)  {
        $db = GetGlobal('db'); 	
	
        $sSQL2 = "insert into paypal_ipn (" . "date";
		
        foreach ($data as $key => $value) {
		  //check to see if paypal data=columns in db exist
	      //in case of paypal change something in posts vars 
	      //record will not save in db 		
		  if (in_array($key,$this->paypal_data))
		    $sSQL2 .= ", $key";
		} 
		 
		$sSQL2 .= ") values (" . $db->qstr(date("F j, Y, g:i a"));	
		
        foreach ($data as $key => $value) {
		  //check to see if paypal data=columns in db exist
	      //in case of paypal change something in posts vars 
	      //record will not save in db 
	      if (in_array($key,$this->paypal_data))
		    $sSQL2 .= ", " . $db->qstr($value);
          else
		    $this->savelog("PAYPAL IPN ELEMENT MISSING:".$key."=".$value);				
		}  
		$sSQL2 .= ")";
																		
        $db->Execute($sSQL2,1);  	
		//echo $sSQL2;
	}
	
	function insert_posts($data)  {
        $db = GetGlobal('db'); 	
	
        $sSQL2 = "insert into paypal_posts (" . "date";
        foreach ($data as $key => $value) {
		  //check to see if paypal data=columns in db exist
	      //in case of paypal change something in posts vars 
	      //record will not save in db 		
		  if (in_array($key,$this->paypal_data))		
		    $sSQL2 .= ", $key";
		}  
		$sSQL2 .= ") values (" . $db->qstr(date("F j, Y, g:i a"));
		
			
        foreach ($data as $key => $value) {
		  //check to see if paypal data=columns in db exist
	      //in case of paypal change something in posts vars 
	      //record will not save in db 
	      if (in_array($key,$this->paypal_data))		
		    $sSQL2 .= ", " . $db->qstr($value);   
          else
		    $this->savelog("PAYPAL POST ELEMENT MISSING:".$key."=".$value);			
		}  
		$sSQL2 .= ")";
																		
        $db->Execute($sSQL2,1);  	
		//echo $sSQL2;
	}
	
   function exists_ipn($txn_id) {
       $db = GetGlobal('db');    
   
       if (isset($this->paypal_post['txn_id'])) {//is 0 for suspent/test
         $max = count($this->paypal_post)-1;
	     $i=0;
         $sSQL = "select txn_id from paypal_ipn where (";
	     /*foreach ($this->paypal_post as $key => $value) {
	     
		 if ($key!='payment_date') {
	       $sSQL .= $key . "=" . $db->qstr($value);
		   if ($i<$max) $sSQL .= " and "; 
		 }
		 $i+=1;
	     }	*/
	     $sSQL .= "txn_id=" .  $db->qstr($txn_id);
	     $sSQL .= ")";
	     //echo $sSQL;
	    	 
	     $resultset = $db->Execute($sSQL,2);  			 
	     $ret = $db->fetch_array($resultset);
	     //print_r($ret);
	     //echo $ret[0],">";	   
	   
	     return (isset($ret[0])? true:false);
	   }
	   
	   return false;
   }	
   
   function txnid_is_unique($txn_id) {
     $db = GetGlobal('db');   
   
     if (isset($this->p->ipn_data['txn_id'])) {//is 0 for suspent/test
	 
       $sSQL = "select txn_id from paypal_ipn where txn_id=";
	   $sSQL .= $db->qstr($txn_id);
	   //echo $sSQL;	 
	 
	   $resultset = $db->Execute($sSQL,2);  			 
	   $ret = $db->fetch_array($resultset);
	   //print_r($ret);
	   //echo $ret[0],">";	  			 
	   
	  /* if ($ret[0]==$txn_id)//exist
	     return false;
	   else //not exist
	     return true;	 */
	   
	   return (isset($ret[0])? false:true);	
	 }
	 return false;    
   }
   
   //overwrite
   function procced_after_payment() {//based on post data of success execution by paypal
     //print_r($this->paypal_post);
     //echo strtolower($this->paypal_post['payment_status']),">>>>";
	 //echo $this->paypal_post['payer_email'],">>>>";
     switch (strtolower($this->paypal_post['payment_status'])) {
	 
	   case 'completed' :   
	    $errorcode = null; 
		$this->savelog("PAYPAL PAYMENT:SUCCESS");
	    //$ret = $this->set_message('success');
        $ret .= $this->sell(); 
        $this->tell_by_sms("Successfull payment:" . $this->paypal_post['payer_email']);		  
	   break;
	   
	   //pending is my paypal problem not my customer
	   case 'pending'   : 
	     $errorcode = "Pending:".$this->paypal_post['pending_reason'];	 
	     $this->savelog("PAYPAL PAYMENT:PENDING");
		 //$ret = $this->set_message('success');//,$errorcode);//hide errorcode from customer
		 $ret .= $this->sell();
		 
		 $this->tell_by_mail("Pending payment",
		                     $this->paypal_post['payer_email'],
			 				 $this->inform_ipn_mail,
							 implode("\n",$this->paypal_post)); 
							 
	     $this->tell_by_sms("Pending payment:" . $this->paypal_post['payer_email']);							 
							 		 
	   break; 	
	      
	   //failed or other is my customer problem
	   case 'failed'    : 
	     $errorcode = "Failed";
	   default          : 
	     $this->savelog("PAYPAL PAYMENT:ERROR!!!");
	 	 $ret = $this->set_message('error');//,$errorcode);//hide errorcode from customer
		  
		 $this->tell_by_mail("Failed payment",
		                     $this->paypal_post['payer_email'],
			 				 $this->inform_ipn_mail,
							 implode("\n",$this->paypal_post));   	   				  						  						  
							 
         $this->tell_by_sms("Failed payment:" . $this->paypal_post['payer_email']);							 
	 }   
	   
	 return ($ret);     
   }   
   
   //overwrite
   function sell() {
   
		//show the link
		$item = $this->paypal_post['item_name'];
		//$myitem = $this->remove_title_from_transaction_no($item);
		
        if (defined('RCPICKIT_DPC')) 
		  $ret = GetGlobal('controller')->calldpc_method("rcpickit.show_product_link use $item");
        elseif (defined('SHCART_DPC')) 
		  $ret = GetGlobal('controller')->calldpc_method("shcart.finalize_cart use $item");//.$this->transaction);//$item");
		
		return ($ret);   
   }
   
   function register_customer() {
   
        $r[0] = $this->paypal_post['first_name'];//fname
		$r[1] = $this->paypal_post['last_name'];//lname 
		$r[2] = $this->paypal_post['address_name'];//fullname
		$r[3] = $this->paypal_post['address_street'];//address
		$r[4] = $this->paypal_post['address_zip'];//zip
		$r[5] = $this->paypal_post['address_city'];//city
		$r[6] = $this->paypal_post['address_state'];//state
		$r[7] = $this->paypal_post['address_country'];//country
		$r[8] = $this->paypal_post['payer_email'];//email
		$r[9] = $this->paypal_post['item_number'];//itemcode
		$r[10] = $this->paypal_post['item_name'];//itemname
		$r[11] = $this->paypal_post['payment_gross'];//payment
		
		$data = serialize($r); //pack
		$ret = GetGlobal('controller')->calldpc_method("rccustomers.insert use $data");
		
		$item = $this->paypal_post['item_name'];
        $clientmail = $this->paypal_post['payer_email'];		
		
		//send icode and thanx and details
	    if (defined('RCICODES_DPC')) {
		  $type = 'fullversion';
		  $expire = 2;
		  $icode = GetGlobal('controller')->calldpc_method("rcicodes.insert_icode use $item+$type+$clientmail+$expire");		
	    }	  
		
		$thema = paramload('SHELL','urltitle');//"Re-coding technologies ";
		
		$template = paramload('SHELL','prpath') . "buy_mail_thanks.tpl";
		$body =  file_get_contents($template);//"Thank you.\n" . 
		
	    if (defined('RCICODES_DPC')) {		
		   $body .= "Your invitation number is:".$icode.
				 "\nBy pressing " . seturl('t=seticode',"here") .
				 " you can download your item.";
		}		 
				
		$this->tell_by_mail($thema,
		                    $this->inform_ipn_mail,
						    $this->paypal_post['payer_email'],
							$body);				
   } 
   
    function send_downloaded_mail() {
  
       if ($this->inform_ipn_mail) {
  
		$thema = $this->paypal_post['item_name'] . " full version downloaded";//"Re-coding technologies ";
		
		//$template = paramload('SHELL','prpath') . "buy_mail_thanks.tpl";
		$body = $this->paypal_post['item_name'] . " items byed from " . $this->paypal_post['payer_email']; //file_get_contents($template);
				
		$this->tell_by_mail($thema,
		                    $this->paypal_post['payer_email'],
						    $this->inform_ipn_mail,
							$body);
							
	    $this->tell_by_sms($body);						
	  }							  
    }
	
	function tell_by_sms($message) {
	
	    if (defined('SMSGUI_DPC'))
	      $ret = GetGlobal('controller')->calldpc_method('smsgui.sendsms use '.$message);		
	}
	
   //override..get transaction number as name and amount as total price	
   function set_product_info($name,$price) {
   

	 if (($name) && (is_numeric($price)) && ($price>0)) {
		 
           $this->p->add_field('item_name', $name);
           $this->p->add_field('amount', $price);   		 
		   return true;
      }
	  
      return false;	  
   }	

   function handle_Transaction($status) {

           if ( (defined('SHTRANSACTIONS_DPC')) && (seclevel('SHTRANSACTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {
                
                $id = $this->transaction;

                switch ($status) {
                    case 'ipn'    : GetGlobal('controller')->calldpc_method("shtransactions.setTransactionStatus use $id+2");
                                    break;
                    case 'success': GetGlobal('controller')->calldpc_method("shtransactions.setTransactionStatus use $id+1");
                                    break;													
                    case 'cancel' : GetGlobal('controller')->calldpc_method("shtransactions.setTransactionStatus use $id+-1");
                                    break;
                }
           }
   }    
   
   //no need
   function remove_title_from_transaction_no($trans) {
   
     $ret = str_replace($this->title2show,'',$trans);
	 return $ret;
   } 
   
   //override   
   function tell_by_mail($subject,$from,$to,$body) {
         

         $smtpm = new smtpmail;
         $smtpm->to = $to; 
         $smtpm->from = $from; 
         $smtpm->subject = $subject;
         $smtpm->body = $body;
         $mailerror = $smtpm->smtpsend();
         unset($smtpm);	
		 
		 if ($mailerror) echo "Error sending mail:",$mailerror;
		 return ($mailerror);   
   }     
      	
}; 
} 
?>