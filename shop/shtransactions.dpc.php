<?php

$__DPCSEC['SHTRANSACTIONS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("SHTRANSACTIONS_DPC")) && (seclevel('SHTRANSACTIONS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("SHTRANSACTIONS_DPC",true);

$__DPC['SHTRANSACTIONS_DPC'] = 'shtransactions';


$d = GetGlobal('controller')->require_dpc('transactions/transactions.dpc.php');
require_once($d);

//in case of page cntrl pxml not exist so load
$d = GetGlobal('controller')->require_dpc('shell/pxml.lib.php');
require_once($d);


//this transfer all actions,commands,attr from parent to child and parent disabled(=null)
//it is important for inherit to still procced the commands of parent
GetGlobal('controller')->get_parent('TRANSACTIONS_DPC','SHTRANSACTIONS_DPC');

$__EVENTS['SHTRANSACTIONS_DPC'][6]='transviewhtml';
$__EVENTS['SHTRANSACTIONS_DPC'][7]='cancelorder';

$__ACTIONS['SHTRANSACTIONS_DPC'][6]='transviewhtml';
$__ACTIONS['SHTRANSACTIONS_DPC'][7]='cancelorder';

//overwrite for cmd line purpose
$__LOCALE['SHTRANSACTIONS_DPC'][0]='SHTRANSACTIONS_CNF;Transaction List;Λίστα Συναλλαγών';	   
$__LOCALE['SHTRANSACTIONS_DPC'][1]='_COST;Cost;Κόστος';	
$__LOCALE['SHTRANSACTIONS_DPC'][2]='_LOADCART;Load;Στο καλάθι';	
$__LOCALE['SHTRANSACTIONS_DPC'][3]='_PREVIEWCART;Preview;Προβολή';	
$__LOCALE['SHTRANSACTIONS_DPC'][4]='_CANCELTRANS;Cancel;Ακύρωση';	
$__LOCALE['SHTRANSACTIONS_DPC'][5]='_trhostcancel;Cancel by host;Ακυρώθηκε απο τον παραλήπτη';	
$__LOCALE['SHTRANSACTIONS_DPC'][6]='_trtranscancel;Cancel by user;Ακυρώθηκε απο τον χρήστη';	
$__LOCALE['SHTRANSACTIONS_DPC'][7]='_trusercancel;Canceled;Ακυρώθηκε';
$__LOCALE['SHTRANSACTIONS_DPC'][8]='_trinprocess;In process;Σε επεξεργασία';
$__LOCALE['SHTRANSACTIONS_DPC'][9]='_trintransport;Ready to delivery;Προς διανομή';
$__LOCALE['SHTRANSACTIONS_DPC'][10]='_trsubmited;Submited;Παρελήφθει';
$__LOCALE['SHTRANSACTIONS_DPC'][11]='_trinhand;Delivered;Ολοκληρώθηκε';
$__LOCALE['SHTRANSACTIONS_DPC'][12]='_mailcancelbody;Canceled transaction;Ακύρωση παραγγελίας';
$__LOCALE['SHTRANSACTIONS_DPC'][13]='_mailcancelsubject;Canceled transaction;Ακύρωση παραγγελίας';
	   
class shtransactions extends transactions {

   var $path, $prpath;
   var $initial_word;
   
   static $staticpath, $myf_button_class; 

   var $tmpl_path, $tmpl_name;   

   function shtransactions() {
   
       transactions::transactions();
	   
	   self::$staticpath = paramload('SHELL','urlpath');
	   $this->prpath = paramload('SHELL','prpath');
	   
	   //override if exist
	   if ($tpath = paramload('SHTRANSACTIONS','path'))
	     $this->path = $this->prpath . $tpath;	

       $this->initial_word = remote_paramload('SHTRANSACTIONS','trid',$this->prpath);  
	   //echo $this->initial_word,'>';
	   $this->tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->prpath);
	   $this->tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->prpath);	   	   	   
	   
	   $bc = remote_paramload('SHTRANSACTIONS','buttonclass',$this->prpath); 
	   self::$myf_button_class = $bc ? $bc : 'myf_button';
	   	   
   }
   
   //override
   function event($event=null) {
   
       switch ($event) {
		 case 'cancelorder'   : $this->cancelOrder(GetReq('tid')); break;   
		   
	     case 'transviewhtml' : $this->viewTransactionHtml();
		                        die();
		                        break;
								
		 default              : transactions::event($event);						
	   }
   }
   
   //override
   function action($action=null)  { 

		switch ($action) {
			
			case 'cancelorder' : 
			
			default            : $out .= $this->viewTransactions();
		} 

		return ($out);
   }   
   
   //overwrite
   function saveTransaction($data='',$user='',$payway=null,$roadway=null,$qty=null,$cost=null,$costpt=null) {
   
      //execute default save and get id
      $id = transactions::saveTransaction($data,$user,$payway,$roadway,$qty,$cost,$costpt);
   
      //save xml file
      $xml = new pxml();

	  $xml->addtag('ORDER',null,null,"id=".$id);							
	  $xml->addtag('XUL','ORDER',null,null); 
      $xml->addtag('GTKWINDOW','XUL',null,null);
							
	  $ret = $xml->getxml();
	  $this->save2disk($id,$ret);
	  
	  unset($xml);   
							
	  return ($id);						
   }
   
   function save2disk($id,$data) {
   
      $file = $this->path . $id . ".xml"; 
	  //echo $file,$data;
      $fd = fopen($file, 'w');
      fwrite($fd, $data);
      fclose($fd);   
   }

    //override use tid instead of recid in db mode
	function setTransactionStatus($trid,$state) {
		$db = GetGlobal('db');
	   
	    $sSQL = "update transactions set tstatus=" . $state .
	             " where tid='" . $this->initial_word. $trid ."'";
        $result = $db->Execute($sSQL);
		

        if ($db->Affected_Rows()) 
			return true;
	    else 
			return false;   	   
				  
	}
	
	function getTransactionStatus($trid) {
       $db = GetGlobal('db');
	   
	   $sSQL = "select tstatus from transactions" . 
	           " where tid='" . $this->initial_word. $trid ."'";
       $result = $db->Execute($sSQL);	
	   
	   $ret = $result->field['tstatus'];
	   return ($ret);
	}
	
	function setTransactionStoreData($trid,$fieldname,$value=null) {
       $db = GetGlobal('db');
	   	   
	   $sSQL = "update transactions set $fieldname='" . $value .
	           "' where tid='" . $this->initial_word. $trid ."'";
       $result = $db->Execute($sSQL);
		
       if ($db->Affected_Rows()) 
	     return true;
	   else 
	     return false;   	   
	}
	
	function getTransactionStoreData($fieldname,$trid) {
       $db = GetGlobal('db');
	   	   
	   $sSQL = "select $fieldname from transactions " .
	           "where tid='" . $this->initial_word. $trid ."'";
       $result = $db->Execute($sSQL);
		
       $ret = $result->fields[$fieldname]; 
	   return $ret;   	   
	}	 
	
	//called by shpaypal to check txn_id
	function checkPaypalTXNID($txnid) {
       $db = GetGlobal('db');
	   	   
       $sSQL = "select type1 from transactions where payway='PAYPAL' and type1=";
	   $sSQL .= $db->qstr($txnid);
       $result = $db->Execute($sSQL);
		
       if ($result->fields['type1']) 
	     return false;
	   else 
	     return true;	
	} 
	
	//called by shpiraeus to check txn_id
	function checkPiraeusTicket($txnid) {
       $db = GetGlobal('db');
	   	   
       $sSQL = "select type1 from transactions where payway='PIRAEUS' and type1=";
	   $sSQL .= $db->qstr($txnid);
       $result = $db->Execute($sSQL);
		
       if ($result->fields['type1']) 
	     return false;
	   else 
	     return true; 	
	} 
	
	//replace 2 func above
	function is_unique($id,$fieldnametocheck=null,$valtocheck=null,$field=null) {
       $db = GetGlobal('db');
	   
	   $f = $field ? 'type2':'type1';
	
       $sSQL = "select $f from transactions where ";
	   
	   if ($fieldnametocheck)
	     $sSQL .= $fieldnametocheck."=" . $db->qstr($valtocheck) . " and ";
	   
	   $f . "=" . $db->qstr($id);
		 
	   $sSQL .= $db->qstr($txnid);
       $result = $db->Execute($sSQL);
		
       if ($result->fields[$f]) 
	     return false;//exist ???
	   else 
	     return true;// not exist ok  		
	}	 
	
	function saveTransactionHtml($id, $data, $template=null,$user=null,$fkey=null) {
		$file = $this->path . $id . ".html"; 
		//echo $file,'>',$template;//,$data;
		
		if (defined('TWIGENGINE_DPC')) {
		
			$dd = GetGlobal('controller')->calldpc_method('twigengine.render use '.$template.'++'.$data);
        }
        else {  		
		
			//d must be serialized array of tokens when template	
			$d = unserialize($data);		
		
			if ($template) {
				//printout template
				$printcart_template = $template;
				$tm = $this->prpath . 'html/'. str_replace('.',getlocal().'.',$printcart_template) ;
				//echo $tm;
			} 		
		
			if (($tm) && (is_readable($tm))) {
				//echo $tm;
				$myprintcarttemplate = file_get_contents($tm);
		  
				//tokens=array=d seems to not come ok..so recall
				$tokens[] = GetGlobal('controller')->calldpc_var('shcart.transaction_id');//$this->transaction_id;
				if (iniload('JAVASCRIPT'))
					$tokens[] = GetGlobal('controller')->calldpc_method('javascript.JS_function use js_printwin+'.localize('_PRINT',getlocal()));
				else
					$tokens[] = '&nbsp;';//dummy
				
				//echo $user,'>',$fkey;
				$tokens[] = GetGlobal('controller')->calldpc_method("shcustomers.showcustomerdata use $user+$fkey+cusdetails.htm");
				$tokens[] = GetSessionParam('orderdetails');
				$tokens[] = GetSessionParam('ordercart');
		  
				$dd = $this->combine_tokens($myprintcarttemplate,$tokens,true);		
			}
			else {
				$headtitle = paramload('SHELL','urltitle');			
				$hpage = new phtml('../themes/style.css',$d,"<B><h1>$headtitle</h1></B>");
				$dd = $hpage->render();
				unset($hpage);		
			}
		}//if
		
        $fd = fopen($file, 'w');
        fwrite($fd, $dd, strlen($dd));
        fclose($fd);   		
	} 
	
	function getTransactionHtml($id) {
        $file = $this->path . $id . ".html"; 

		if (!$this->isTransOwner($id)) {
		  $ret = 'Invalid transaction id'; 		
		  return ($ret);
		}		
		
	    if (is_readable($file)) {
		
		  $ret = file_get_contents($file);
		}
		else
		  $ret = 'file not exist!';  
		
		return ($ret);		
	} 	
	
	//override
	function getTransaction($trid) {
       $db = GetGlobal('db');
	   
	   if ($this->storetype=='DB') {  //db	
	   	   
	     $sSQL = "select tdata from transactions where tid=" . $db->qstr($trid);
	     $res = $db->Execute($sSQL);

	     if ($res) { 
	       $out = $res->fields[0]; 
		   return ($out);
	     }
	   }
	} 
	
	
	//return array of relative sales id's
	function getRelativeSales($limit=null,$id=null) {
       $db = GetGlobal('db');
	   $id = $id?$id:GetReq('id');
	   
	   //search serialized data for id
	   $sSQL = "select tid,tdata from transactions " .
	           "where tdata like'%" . $id ."%' order by tid desc";
       $result = $db->Execute($sSQL,2);
	   //echo $sSQL;
	   
	   foreach ($result as $n=>$rec) {	
         $tdata = $rec['tdata'];
		 
		 if ($tdata) {
		   $cdata = unserialize($tdata);
		   if (count($cdata)>1) {//if many items
		     foreach ($cdata as $i=>$buffer_data) {
		 
		       $param = explode(";",$buffer_data);
		       if ($param[0] != $id) 
		         $ret[] = $param[0]; //save code
			 
		       if (count($ret)>$limit) break; //limit to fetch	 
		     }	 
		   }
		 } 
	   }
	   return $ret;   	   	
	}	
	
	protected function cancelOrder($trid) {
		$db = GetGlobal('db');
		if (!$this->isTransOwner($trid)) {
		  echo 'Invalid tranascrion id';
		  die();		
		}	   	   
		   
		$sSQL = "update transactions set tstatus=-2 where tid='" . $this->initial_word . $trid ."'";
        $result = $db->Execute($sSQL);
		
        if ($db->Affected_Rows()) { 
		  
		    //send mail to host
		    $s = localize('_mailcancelsubject', getlocal()) . ' ' . $trid;
			$b = $this->getTransactionHtml($trid);
		    $this->mailto(null,$s,$b);
		
			return true;
		}	
		else 
			return false;   	   
	}	
	
	protected function mailto($mto=null,$subject=null,$body=null,$template=null) {
        $UserName = GetGlobal('UserName');	
	    $to = $mto ? $mto : decode($UserName);	
		if (!$UserName) return false;
		  
        if ($template) {
			$t =  $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'.str_replace('.',getlocal().'.',$template) ;
			$mytemplate = file_get_contents($t);
		
			$tokens[] = $body ? $body : localize('_mailcancelbody', getlocal());			  					
			$mailbody = $this->combine_tokens($mytemplate,$tokens);
		}
		else	
			$mailbody = $body ? $body : localize('_mailcancelbody', getlocal());			  					
		
		$mailsubject = $subject ? $subject : localize('_mailcancelsubject', getlocal());
		
		$from = _v('shusers.usemail2send');
	    $ret = _m('shusers.mailto use '.$from.'+'.$to.'+'.$mailsubject.'+'.$mailbody);
		
		return ($ret);
	} 	
	
	
	function getTransactionsList() {
       $db = GetGlobal('db');
       $UserName = GetGlobal('UserName');	
	   $name = $UserName?decode($UserName):null;		   
	   
	   if (!$name) return;
	   	
	   if ($this->storetype=='DB') {  //db	
	   	   
	     $sSQL = "select tid,tdate,ttime,tstatus,payway,roadway,cost,costpt from transactions where cid=" . $db->qstr($name) . 
		         "order by tid DESC";				 
				 
	     $res = $db->Execute($sSQL,2);
	     //print_r ($res->fields[5]);
		 $i=0;
	     if (!empty($res)) { 
	       foreach ($res as $n=>$rec) {
				$i+=1;
				$transtbl[] = $rec[0].";".$rec[3].";".$rec[4]."/".$rec[5].";".$rec[1]." / ".$rec[2].";" .	
							number_format($rec[7],2,',','.');		   
		   }
		   
           //browse
		   //print_r($transtbl); 
		   $ppager = GetReq('pl')?GetReq('pl'):10;
           $browser = new browse($transtbl,null,$this->getpage($transtbl,$this->searchtext));
	       $out .= $browser->render("transview",$ppager,$this,1,0,0,0);
	       unset ($browser);	
		      
	     }
		 else {
           //empty message
	       $w = new window(null,localize('_EMPTY',getlocal()));
	       $out .= $w->render("center::40%::0::group_win_body::left::0::0::");//" ::100%::0::group_form_headtitle::center;100%;::");
	       unset($w);

		 }		 
	   }	
	   
	   return ($out);
	} 	
	
	//override
	function viewTransactions() {
       $db = GetGlobal('db');
	   $a = GetReq('a');
       $UserName = GetGlobal('UserName');	   
	   
	   if (!$UserName) {
	     if (defined('CMSLOGIN_DPC')) {
		   GetGlobal('controller')->calldpc_method("cmslogin.login_javascript"); 	 
		   $out = GetGlobal('controller')->calldpc_method("cmslogin.quickform use +transview+shtransactions>viewTransactions");		   
		 }  
	     elseif (defined('SHLOGIN_DPC')) 
		   $out = GetGlobal('controller')->calldpc_method("shlogin.quickform use +transview+shtransactions>viewTransactions");
	     //else
	       //$out = ("You must be logged in to view this page.");
		   
		 return ($out);  
	   }	 
	   
	   $apo = GetParam('apo'); //echo $apo;
	   $eos = GetParam('eos');	//echo $eos;   

       $myaction = seturl("t=transview");	   
	   
       if (seclevel('TRANSADMIN_',$this->userLevelID)) {
	     $this->admint=1;
         $out .= "<form method=\"POST\" action=\"";
         $out .= "$myaction";
         $out .= "\" name=\"Transview\">";		 
	   }
	   elseif (seclevel('TRANSCANCEL_',$this->userLevelID)) { 
	     $this->admint=2;	   
         $out .= "<form method=\"POST\" action=\"";
         $out .= "$myaction";
         $out .= "\" name=\"Transview\">";		   
	   }
	   else {
         $out .= "<form method=\"POST\" action=\"";
         $out .= "$myaction";
         $out .= "\" name=\"Transview\">";		   
	   }

	 
	   $out .= $this->getTransactionsList();	 
		 
	   if ($this->admint) {
             $out .= "<input type=\"hidden\" name=\"FormName\" value=\"Transview\">";
             $out .= "</FORM>";			 		   	 	
	   }  	
	   
	   return ($out);
	}	
	
	//overide
	function details($id,$template=null) {
	   
	   if (defined('SHCART_DPC')) 
	     $ret = GetGlobal('controller')->calldpc_method('shcart.previewcart use '.$id.'++'.$template);
		 
	   return ($ret);
	}
	
	function viewTransactionHtml($id=null) {
	    $id = $id?$id:GetReq('tid');
		
		if (!$this->isTransOwner($id)) {
		  echo 'Invalid tranascrion id';
		  die();		
		}
	
        $file = $this->path . $id . ".html"; 
	    //echo $file;
		if (is_readable($file)) {
		  $ret = file_get_contents($file);
		
		  //return ($ret);	
		  echo $ret;
		  die();
		}
		else
		  return false;
	} 		
	
	//override
    function viewtrans($id,$status,$payway,$datetime,$trtotal,$dummy=null) {
	   
		$link = 'trload/'.$id.'/';
		$cload_button = $this->myf_button(localize('_LOADCART',getlocal()),$link);
	   
		if (is_readable($this->path . $id . ".html")) {	
			$lnk = 'trview/'.$id.'/';
			$preview_button = $this->myf_button(localize('_PREVIEWCART',getlocal()),$lnk);
		}
		else 
			$preview_button = null;		  

		//line details
		$_template = 'fptransline.htm';
		$_t = $this->prpath . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$_template) ;
		
		$linetemplate = file_get_contents($_t);
		$tokens[] = $this->details($id,'shcartpreview'); //use template for line
		$line = $this->combine_tokens($linetemplate,$tokens);

		//line			
		$mtemplate='fptrans.htm';
		$mt = $this->prpath . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$mtemplate) ;

		$data[] = $id;
		$data[] = $payway;
		$data[] = $datetime;
		$data[] = $trtotal;
		$data[] = $dummy;	
		$data[] = $cload_button;
		$data[] = $preview_button;

		switch ($status) {	
		    case -3    : $trstatus = localize('_trhostcancel', getlocal()); break;
		    case -2    : $trstatus = localize('_trtranscancel', getlocal()); break;
		    case -1    : $trstatus = localize('_trusercancel', getlocal()); break;
		
		    case 3     : $trstatus = localize('_trinhand', getlocal()); break;
		    case 2     : $trstatus = localize('_trintransport', getlocal()); break;
		    case 1     : $trstatus = localize('_trinprocess', getlocal()); break;
			case 0     : 
			default    : $trstatus = localize('_trsubmited', getlocal());			
		}	
		
		if ($status>=0) {
			$cancelnk = 'trcancel/'.$id.'/';
			$cancel_button = $this->myf_button(localize('_CANCELTRANS',getlocal()),$cancelnk);	
			$data[] = $trstatus;
			$data[] = $cancel_button;
		}	
		else {
			$data[] = $trstatus;
			$data[] = null;
		}	
		
		$data[] = $line;
		
		$mytemplate = file_get_contents($mt);
		$out = $this->combine_tokens($mytemplate,$data);		
			
	    return ($out);
	}
	
	//security function to not vew trans of other users
	function isTransOwner($id=null) {
       $db = GetGlobal('db');
	   $id = $id?$id:GetReq('tid');
	   $myuser = GetGlobal('UserID');	
       $user = $myuser ? decode($myuser) : null;
	   
	   //search serialized data for id
	   $sSQL = "select tid from transactions" .
	           " where tid=" . $db->qstr($id) . ' and cid=' . $db->qstr($user);
       $result = $db->Execute($sSQL,2);
	   //echo $sSQL;
	   
	   if ($result->fields['tid']==$id)
	       return true;
		   
	   return false;	   
    }	   
		
	//override
	function headtitle() {
	   $p = GetReq('p');
	   $t = GetReq('t');
	   $sort = GetReq('sort');  
	
       $data[] = seturl("t=$t&a=&g=1&p=$p&sort=$sort&col=0" ,  "Id" );
	   $attr[] = "left;5%";							  
	   $data[] = seturl("t=$t&a=&g=2&p=$p&sort=$sort&col=1" , localize('_TRANSACTION',getlocal()) );
	   $attr[] = "center;20%";
	   $data[] = seturl("t=$t&a=&g=3&p=$p&sort=$sort&col=2" , localize('_TRANSTAT',getlocal()) );
	   $attr[] = "center;50%";
	   $data[] = seturl("t=$t&a=&g=4&p=$p&sort=$sort&col=3" , localize('_DATE',getlocal()) );
	   $attr[] = "center;20%";
	   $data[] = seturl("t=$t&a=&g=4&p=$p&sort=$sort&col=4" , localize('_COST',getlocal()) );
	   $attr[] = "center;10%";	 

	   $mtemplate='fptrans.htm';
	   $mt = $this->prpath . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$mtemplate) ;
	   //echo $t,'>';
	   if (($mtemplate) && is_readable($mt)) {
	   
		//$mytemplate = file_get_contents($mt);
		//$out = $this->combine_tokens($mytemplate,$data);
		return null;//deactivate
	   }	   
	   else {	   

  	    $mytitle = new window('',$data,$attr);
	    $out = $mytitle->render(" ::100%::0::group_form_headtitle::center;100%;::");
	    unset ($data);
	    unset ($attr);
       }	   
	   
	   return ($out);
	}	

	//tokens method	 $x
	function combine_tokens($template_contents,$tokens, $execafter=null) {
	
	    if (!is_array($tokens)) return;
		
		if ((!$execafter) && (defined('FRONTHTMLPAGE_DPC'))) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);
          //$ret = GetGlobal('controller')->calldpc_method("fronthtmlpage.process_commands use ".$template_contents);		  		
		}		  		
		else
		  $ret = $template_contents;
		  
		//echo $ret;
	    foreach ($tokens as $i=>$tok) {
            //echo $tok,'<br>';
		    $ret = str_replace("$".$i,$tok,$ret);
	    }
		//clean unused token marks
		for ($x=$i;$x<20;$x++)
		  $ret = str_replace("$".$x,'',$ret);
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
	
	protected static function myf_button($title,$link=null,$image=null) {
	   $path = self::$staticpath;//$this->urlpath;//
	   $bc = self::$myf_button_class;
	   
	   if (($image) && (is_readable($path."/images/".$image.".png"))) {
	      //echo 'a';
	      $imglink = "<a href=\"$link\" title='$title'><img src='images/".$image.".png'/></a>";
	   }
	   
	   if (preg_match('/MSIE/i',$_SERVER['HTTP_USER_AGENT'])) { 
	      //echo 'ie';
		  $_b = $imglink ? $imglink : "[$title]";
		  $ret = "&nbsp;<a href=\"$link\">$_b</a>&nbsp;";
		  return ($ret);
	   }	
	   
	   if ($imglink)
	       return ($imglink);
	
       //else button	
	   if ($link)
	      $ret = "<a href=\"$link\">";
		  
	   $ret .= "<input type=\"button\" class=\"$bc\" value=\"".$title."\" />";
	   
	   if ($link)
          $ret .= "</a>";	   
		  
	   return ($ret);
	}	
	
};
}
?>