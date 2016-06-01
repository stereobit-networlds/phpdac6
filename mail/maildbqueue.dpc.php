<?php

$__DPCSEC['MAILDBQUEUE_DPC']='1;1;1;1;1;1;1;1;1;1;1';
$__DPCSEC['_MAILQUEUEDAEMON']='9;1;1;1;1;1;2;2;9;9;9';

if ( (!defined("MAILDBQUEUE_DPC")) && (seclevel('MAILDBQUEUE_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("MAILDBQUEUE_DPC",true);

$__DPC['MAILDBQUEUE_DPC'] = 'maildbqueue';

$v = GetGlobal('controller')->require_dpc('crypt/ciphersaber.lib.php');
require_once($v); 
/*
$a = GetGlobal('controller')->require_dpc('nitobi/nitobi.lib.php');
require_once($a);

$b = GetGlobal('controller')->require_dpc('nitobi/nhandler.lib.php');
require_once($b);
*/

$__EVENTS['MAILDBQUEUE_DPC'][0]='cpmaildbqueue';
$__EVENTS['MAILDBQUEUE_DPC'][1]='cpngetqueue';
$__EVENTS['MAILDBQUEUE_DPC'][2]='cpnsetqueue';

$__ACTIONS['MAILDBQUEUE_DPC'][0]='cpmaildbqueue';
$__ACTIONS['MAILDBQUEUE_DPC'][1]='cpngetqueue';
$__ACTIONS['MAILDBQUEUE_DPC'][2]='cpnsetqueue';

$__LOCALE['MAILDBQUEUE_DPC'][0]='MAILDBQUEUE_DPC;Mail Queue;Mail Queue';
$__LOCALE['MAILDBQUEUE_DPC'][1]='_TIMEIN;In Date;��������';
$__LOCALE['MAILDBQUEUE_DPC'][2]='_TIMEOUT;Out Date;�������';
$__LOCALE['MAILDBQUEUE_DPC'][3]='_SENDER;From;���';
$__LOCALE['MAILDBQUEUE_DPC'][4]='_RECEIVER;To;��';
$__LOCALE['MAILDBQUEUE_DPC'][5]='_SUBJECT;Subject;����';
$__LOCALE['MAILDBQUEUE_DPC'][6]='_BODY;Body;�������';

class maildbqueue  {

    var $userLevelID;	
	var $result;
	var $path, $post, $msg, $urlpath, $url;
	var $inpath, $languages, $title, $default_lang;
	var $encoding;
	var $hosted_path, $app_pool;
	var $grids, $ajax_link, $has_graph;	
	var $trackmail, $trackapp;
	var $appname;	
	var $mail_encoding;
	
	var $thisapp;
	
	var $cpanelmailpath;

	function maildbqueue() {
	  $UserSecID = GetGlobal('UserSecID'); 	
      $this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);	 
	  
      $this->path = paramload('SHELL','prpath');  	
      $this->urlpath = paramload('SHELL','urlpath');
	  $murl = arrayload('SHELL','ip');
      $this->url = $murl[0]; 
	  $this->inpath = paramload('ID','hostinpath');		   
	  $this->title = localize('MAILDBQUEUE_DPC',getlocal());		  
	    
	  $this->languages = remote_arrayload('SHELL','languages',$this->path);
	  $this->default_lang = remote_paramload('SHELL','dlang',$this->path);
	  
	  $ba = remote_paramload('MAILDBQUEUE','batch',$this->path);
	  $this->batch = $ba?$ba:1;//1000;  //mails in queue pre batch
	  $this->auto_refresh = GetParam('refresh')?GetParam('refresh'):0;
	  $this->timeout = 3601+1000;//one hour+1000 sec

      $this->mail_encoding = remote_paramload('MAILDBQUEUE','encoding',$this->path);	  
	  
	  //$sitecharset = paramload('SHELL','charset');
	  //$this->charset = $sitecharset;	  
      $char_set  = arrayload('SHELL','char_set');	  
      $charset  = paramload('SHELL','charset');	  		
	  if ($charset=='utf-8')
	    $this->encoding = 'utf-8';
	  else  
	    $this->encoding = $char_set[getlocal()]; 
		
	  $this->hosted_path = $this->path;	  
	  
	  $appsinpool = remote_arrayload('MAILDBQUEUE','applications',$this->path);
	  $this->app_pool = (array) $appsinpool;
	  //array(0=>'art-time',1=>'panikidis2',2=>'audiophile-sounds',3=>'nathellas',4=>'hellascopy');
	  //extra apps
	  if ($extra_apps = @file_get_contents($this->path . 'mailqueue-apps.ini')) {
	      if (stristr($extra_apps,',')) { //many apps
		    $ea = explode(',',$extra_apps);
			foreach ($ea as $a=>$app)
				$this->app_pool[] = $app;  
		  }
          else //one app
            $this->app_pool[] = $extra_apps;   		  
	  }	  
	  
	  //$this->_grids[] = new nitobi("Mailqueue");	
	  //$this->ajaxLink = seturl('t=cpmailqueue&statsid='); //for use with...	 
	  //$this->hasgraph = false;	   
	  
	  $this->appname = null;//'rootapp';//paramload('ID','instancename');	  
	  //app side track vars
	  $track = remote_paramload('MAILDBQUEUE','track',$this->path);
	  $this->trackmail = $track?true:false;								    	  
	  //server-root app side vars
	  $this->trackapp = remote_arrayload('MAILDBQUEUE','apptrack',$this->path);	  
	  
	  $this->thisapp = paramload('ID','instancename');	
	  
	  $rootpath = paramload('RCCONTROLPANEL','rootpath', $this->prpath);
      $this->cpanelmailpath = $rootpath ? '/home/'.$rootpath.'/mail/' : '/home/stereobi/mail/';	 
	}
	
	function event($event=null) {		
	
		  	  
	   /////////////////////////////////////////////////////////////	
	   if (GetSessionParam('LOGIN')!='yes') die("Not logged in!");//	
	   /////////////////////////////////////////////////////////////			
	      
	
	    switch ($event) {
	      case 'cpngetqueue'        : 		 
	      case 'cpnsetqueue'        : 
		  case 'cpmaildbqueuejob'   : break;
		  default                   : 
		                            									
        }	
	}		
	
	function action($action=null) {
	
	   if (GetSessionParam('REMOTELOGIN')) 
	     $out = setNavigator(seturl("t=cpremotepanel","Remote Panel"),$this->title); 	  
	   else
        $out = setNavigator(seturl("t=cp","Control Panel"),$this->title);
		
	  
	    switch ($action) {
		
		  case 'cpmaildbqueuejob'  : 	  
		  case 'cpmaildbqueue'     : 
		  default                  : 
		                             
		                       
        }	  
	  
	    return ($out);
	}
					
		
    //excuted every hour sending mails to limit		
	function sendmail_daemon($limit=null,$forcelimits=null) {
        $db = GetGlobal('db'); 		
		//$limit = 2;//$limit?$limit:$this->batch;//batch in an hour or limit=3 in min		 
		$sumi = 0;
		 
		if ($forcelimits) {//calibrate mail send queue
		 
		   $boostlimits = $this->force_mail_limits($limit,$forcelimits);
		   echo 'BOOST LIMITS ARRAY:';
		   print_r($boostlimits);
		   
		   if (is_array($boostlimits))
		       $mylimit  = array_shift($boostlimits);//root app always 1st
		   else	   
               $mylimit = $limit;
		}
        else
           $mylimit = $limit;		 
		 
		 
		echo "\r\nROOTAPP=",$mylimit,"\r\n";
		 
		//first this db
		$sSQL = "select id,timein,active,sender,receiver,subject,body,altbody,cc,bcc,ishtml,encoding,origin,user,pass,name,server from mailqueue where active=1 order by id ";
		if ($limit>0)
		   $sSQL .= "limit " . $mylimit;//$limit
		else
		   $sSQL .= "limit " . $this->batch; //max batch if 0  
			 
	    //echo $sSQL . '<br>';			
	    $result = $db->Execute($sSQL,2);
	    if (!empty($result)) {		   
	       foreach ($result as $n=>$rec) {
		       $id = $rec['id'];	     
			   $from = $rec['sender'];//$user . '@' . $domain;
		       $to = $rec['receiver'];
		       $subject = $rec['subject'];
		       $body = $rec['body'];			 			 			 
		       $altbody = $rec['altbody'];				 
		       $cc = $rec['cc'];	
		       $bcc = $rec['bcc'];				 			 
		       $ishtml = $rec['ishtml'];	
			   
               //if (!$encoding = $this->mail_encoding)			   
		         //$encoding = $rec['encoding']?$rec['encoding']:$this->encoding;		    
		       $encoding = $rec['encoding'] ? $rec['encoding'] : ($this->mail_encoding ? $this->mail_encoding :$this->encoding);	
				 
		       $origin = $rec['origin'];	 
			   $user = $rec['user']; 			 		 
			   $pass = $rec['pass']; 
			   $name = $rec['name']; 
			   $server = $rec['server']; 			 			 			 
			 
   			   //server side root app depending tracking var..NOT FOR ROOT APP (appvar depends)
			     
               $error = $this->sendmail($from,$to,$subject,$body,$altbody,$cc,$bcc,$ishtml,$encoding,$user,$pass,$name,$server);			 
			   //update db
		       $datetime = date('Y-m-d h:s:m');
		       $active = 0;
		       $sSQL = "update mailqueue set timeout=".$db->qstr($datetime).
			           ",mailstatus=".$db->qstr($error).
			  		   ",active=" . $active .
					   " where id=" . $id;
	           //echo $sSQL . '<br>';			
	           $result = $db->Execute($sSQL,1);			 
		       //$meter += $result->Affected_Rows();				 
			 
			   $i+=1;
		   }
		   $sumi+=$i; //sum of messages of all app
		   $ret .= '[mailqueue]'.$i.' message(s) send from root application!';
	    }
		else {
		   $ret .= '[mailqueue]...no messages to send from root application!';		 		 
		   //in case of no message of prev app increase limit
		   $limit+=$limit;
		}  
		
        //SCAN FOR BOUNCED MAILS (this app)
        $ret .= $this->scanBounce($from, false, $mylimit);		
		
		 
		echo 'DAEMON LOOP:<pre>';		 
		print_r($this->app_pool);
		echo '</pre>';	  
		
		//after all other apps
		if (empty($this->app_pool)) return;
		
        foreach ($this->app_pool as $aid=>$ap) {
		 
		   //$this->switch_db($ap);
		   GetGlobal('controller')->calldpc_method('database.switch_db use '.$ap);		 
           //$ret = $ap;
           $db = GetGlobal('db'); 
		 
		   $i = 0;
		   $meter = 0;
		   
		   //get batch
		   $sSQL = "select id,timein,active,sender,receiver,subject,body,altbody,cc,bcc,ishtml,encoding,origin,user,pass,name,server from mailqueue where active=1 order by id ";
		   
		   if ($forcelimits) {
		     $force_limit = $boostlimits[$ap];
		     $mylimit = $force_limit; 
		     echo "\r\nFORCE LIMITS:".$ap.'='.$mylimit;
		   }
           else
             $mylimit = $limit;		   
		   
		   if ($mylimit>0)
		     $sSQL .= "limit " . $mylimit;
		   else  //boost return no value
		     $sSQL .= "limit " . $this->batch; //max batch if 0  			 
			 
		   //$ret .= $sSQL;	 
	       echo "\r\n".$ap.'-select:',$mylimit,'-',$this->batch,'-',$sSQL . "\r\n";			
	       $result = $db->Execute($sSQL,2);			 
		   //$mails2send = $result->Affected_Rows();		
		   //print_r($result);
		 
	       if (!empty($result)) {		   
	         foreach ($result as $n=>$rec) {
		       $id = $rec['id'];	     
			   $from = $rec['sender'];//$user . '@' . $domain;
		       $to = $rec['receiver'];
		       $subject = $rec['subject'];
		       $body = $rec['body'];			 			 			 
		       $altbody = $rec['altbody'];				 
		       $cc = $rec['cc'];	
		       $bcc = $rec['bcc'];				 			 
		       $ishtml = $rec['ishtml'];	
			   
               //if (!$encoding = $this->mail_encoding)			   
		         //$encoding = $rec['encoding']?$rec['encoding']:$this->encoding;	
			   $encoding = $rec['encoding'] ? $rec['encoding'] : ($this->mail_encoding ? $this->mail_encoding :$this->encoding);
			
		       $origin = $rec['origin'];	 
			   $user = $rec['user']; 			 		 
			   $pass = $rec['pass']; 
			   $name = $rec['name']; 
			   $server = $rec['server']; 		
			   
			   //server side root app depending tracking var		
	           if ($this->trackapp[$aid]) {
		         $ta[] = encode(date('Ymd-H:m:s'));
		         $ta[] = $from;
		         $ta[] = $ap;
		         $tc = implode('<DLM>',$ta);
		         $tid = rawurlencode(encode($tc));		 
		         $trackid = $tid;	
				 
	             $mybody = $this->add_tracker_to_mailbody($body,$trackid,$to,$ishtml);				 			   
			   }
			   else
			     $mybody = $body;
			   			   	 			 			
			   $datetime = date('Y-m-d h:s:m');
			   $active = 0;													
			   //echo '>',$encoding,'>',$mybody;
			   //if (checkmail($to)) {
			   if ($this->is_valid_email($to) === true) {
			        //echo $to,"\r\n";   
					$error = $this->sendmail($from,$to,$subject,$mybody,$altbody,$cc,$bcc,$ishtml,$encoding,$user,$pass,$name,$server);			 
					//update db
					$sSQL = "update mailqueue set timeout=".$db->qstr($datetime).
			           ",mailstatus=".$db->qstr($error).
			  		   ",active=" . $active .
					   " where id=" . $id;
					//echo $ap . '-update:'.$sSQL . "\r\n";					 
					//$meter += $result->Affected_Rows();				 
			 
					$i+=1;
			   }
			   else {//invalid email address...disable it
			        //echo $to,"\r\n";   
					$sSQL = "update mailqueue set status=-1,timeout=".$db->qstr($datetime).
			           ",mailstatus=".$db->qstr('Invalid email address').
			  		   ",active=" . $active .
					   " where id=" . $id;
					//echo $ap . '-update:'.$sSQL . "\r\n";						   
			   }
			   //exec
			   $result = $db->Execute($sSQL,1);
		     }
		     $sumi+=$i; //sum of messages of all app
		     $ret .= "\r\n[mailqueue]".$i.' message(s) send from application '. $ap ."!";
	       }		   	 
		   else {
		     $ret .= "\r\n[mailqueue]...no messages to send from application ". $ap .'!';
		     //in case of no message of prev app increase limit
		     $limit+=$limit;			 	
		   }	

           //SCAN FOR BOUNCED MAILS
           $ret .= $this->scanBounce($from, false, $mylimit);
		   
		}//app loop
		
		return ($ret);   
    }	
	
    function is_valid_email($email) {
		if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$",$email)) return true;
		else return false;
	}	
	
	//check mail queue to send more than limit
	function force_mail_limits($limit=null,$forcelimits=null) {
         $db = GetGlobal('db'); 	 
		 
		 //first this db
		 $sSQL = "select count('id') from mailqueue where active=1";// and origin like %demosoft%";
			 
	     //echo $sSQL . '<br>';			
	     $result = $db->Execute($sSQL,2);
	     if (!empty($result)) 
           $mail_pool['demosoft'] = $result->fields[0];
         else		  
           $mail_pool['demosoft'] = 0;

		 //after all other apps
		 if (!empty($this->app_pool)) {
           foreach ($this->app_pool as $aid=>$ap) {

		     GetGlobal('controller')->calldpc_method('database.switch_db use '.$ap);		 
             $db = GetGlobal('db');		

		     $sSQL = "select count('id') from mailqueue where active=1";// and origin like %$ap%";	
	         $result = $db->Execute($sSQL,2);
	         if (!empty($result)) 
               $mail_pool[$ap] = $result->fields[0];
             else		  
               $mail_pool[$ap] = 0;			 
		   }
		 } 
         echo 'LAST APP:'.$ap.'-mail-pool:'."\r\n<pre>";		 
		 print_r($mail_pool);
		 echo '</pre>';
		 $ret = $this->mail_limits_boost($mail_pool,$limit,$forcelimits);
        		   
		 return ($ret);		   
	}
	
	function mail_limits_boost($mail_pool=null,$limit=null,$forcelimits=null) {
	  //$mail_pool = array('demosoft'=>653,'wayoflife'=>0,'panikidis'=>345,'netko'=>5677,'stereobit'=>23,'demosoft1'=>63,'wayoflife1'=>0,'panikidis1'=>0,'netko1'=>5437,'stereobit1'=>0);
	  $x=0;
	  foreach ($mail_pool as $t=>$ti)
	    $x+=$ti;
	  if ($x==0) return; //no mails return	
	  	
	  
      $cpool = is_array($mail_pool)?count($mail_pool):null; //include root app	
	  //echo 'COUNT>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>',$cpool,'>>>><br>';	  
	  $maxinpool = 0;	
	  $loop = 0;
	  
	  if ($cpool) {
	  
	     //echo $maxinpool,'<br>mail_pool';
		 echo 'BOOST-INIT:<pre>';		 
		 print_r($mail_pool);
		 echo '</pre>';	  
	  
	     //make an array of mail limits ..app1=>0,app2=>20,app3=>0 
	     foreach ($mail_pool as $appname=>$mails2send) {
		   if ($mails2send>$limit) {
		     $ret[$appname] = $limit;
			 $maxinpool += $limit;
		   }	 
		   elseif ($mails2send<=$limit) {
		     $ret[$appname] = $mails2send;
			 $maxinpool += $mails2send;		   
		   }
		   else
		     $ret[$appname] = 0;
		 }		
		 
	     //echo $maxinpool,'ret<pre>';		 
		 //print_r($ret);
		 //echo '</pre>';
		 
		 if ($cpool>1) {	//root app plus 1
		   while (($maxinpool+$limit<=$forcelimits) && ($loop<100)) { //loop until forcelimit or loop...to not out of bound
		     $loop+=1;
		     reset($mail_pool); 
	         foreach ($mail_pool as $appname=>$mails2send) {
			 
			   //$prevappmails = prev($mail_pool);
			   $nextappmails = next($mail_pool);
			   //echo 'NEXT>>>>>>>>>>>>>>>>>>>>>>',$nextappmails,'<br>';
			   
               if ($nextappmails == 0)	{ //prev/next array element mails 2 send = 0 or false = 0 out of array...when 0 not exists		       	
			     if (($mails2send>=$limit) && ($ret[$appname]/*+$limit*/<=$mails2send) && ($maxinpool+$limit<=$forcelimits)) { //when have mails 2 send and not out of bound
			       $ret[$appname] += $limit;
				   $maxinpool += $limit;
				 } 
			   }
			   /*elseif ($nextappmails < $limit) { //prev/next array mails 2 send < limit
			     if (($mails2send>=($limit-$nextappmails)) && ($ret[$appname]+($limit-$nextappmails)<=$mails2send) && ($maxinpool+($limit-$nextappmails)<=$forcelimits)) { //when have mails 2 send and not out of bound
			       $ret[$appname] += ($limit-$nextappmails);
				   $maxinpool += ($limit-$nextappmails);
				 }
                 echo '++++++++++++++++++==',$nextappmails; 				 
			   }*/
		     }
		     $mail_pool = array_reverse($mail_pool);
			 
	         //echo $maxinpool,' ',$loop,' reverse:ret<pre>';		 
		     //print_r($ret);
		     //echo '</pre>';	
			 
		   } //while
		 }
         else {//only root app [0]
		   if ($mail_pool['demosoft']>$forcelimits) //more mails than forcelimit
		     $ret['demosoft'] = $forcelimits; //keep it in forcelimit
		   else	//<= small mails than forcelimit
		     $ret['demosoft'] = $mail_pool['demosoft']; //send all
         } 	
		 
	     //echo '<br>maxinpool',$maxinpool,'<br>>>>>>>>>>>>>>>>>>>>>>>>';
		 echo 'BOOST RESULT:<pre>';		 
		 print_r($ret);
	     echo '</pre>';		 
		 return ($ret); //array
	  }//mail_pool exist
	  
	  return null;
	}
	
	//send mail to db queue
	function sendmail_inqueue($from,$to,$subject,$mail_text='',$is_html=false) {
	   $ishtml = $is_html?$is_html:0;
       $sFormErr = GetGlobal('sFormErr');
	   $ccs = GetParam('cc'); //echo $ccs;		 	      
	   $bccs = GetParam('bcc');	//echo $bccs;	
	   $altbody = GetParam('alttext'); 
	   $origin = $this->path; 
	   $user = $pass = $name = $server = null; //default values
	    
	   //client side (app depended) tracking var		
	   if ($this->trackmail) {
		 
       		 
		 $trackid = $this->get_trackid($from,$to);		 
		 
		 if (!$ishtml) {
		   $ishtml = 1;		 
		   $html_mail_text = '<HTML><BODY>' . $mail_text . '</BODY></HTML>';
		   $body = $this->add_tracker_to_mailbody($html_mail_text,$trackid,$to,$ishtml);
		 }
		 else //already html body ...leave it as is
	       $body = $this->add_tracker_to_mailbody($mail_text,$trackid,$to,$ishtml);
	   }
	   else
	     $body = $mail_text;

       if ((checkmail($from)) && ($subject)) {//echo $to,'<br>';
	   
         //add to db...local table
		 $datetime = date('Y-m-d h:s:m');
		 $active = 1;
         if (($this->trackmail) && (isset($trackid))) 
		   $sSQL = "insert into mailqueue (timein,active,sender,receiver,subject,body,altbody,cc,bcc,ishtml,encoding,origin,user,pass,name,server,trackid) ";
		 else  		 
		   $sSQL = "insert into mailqueue (timein,active,sender,receiver,subject,body,altbody,cc,bcc,ishtml,encoding,origin,user,pass,name,server) ";
		   
		 $sSQL .=  "values (" .
				 $db->qstr($datetime) . "," . $active . "," .
		 	     $db->qstr(strtolower($from)) . "," . $db->qstr(strtolower($to)) . "," .
			     $db->qstr($subject) . "," . 
				 $db->qstr($body) . "," .
				 $db->qstr($altbody) . "," .				 
				 $db->qstr($ccs) . "," .
				 $db->qstr($bccs) . "," .
				 $ishtml . ",";
				 
		 if ($this->mail_encoding)
		   $sSQL .= $db->qstr($this->mail_encoding) . ",";
		 else  
		   $sSQL .= $db->qstr($this->encoding) . ",";
				   
		 $sSQL .= $db->qstr($origin) . "," .			 
				 $db->qstr($user) . "," .
				 $db->qstr($pass) .	"," .	
				 $db->qstr($name) . "," .
				 $db->qstr($server);
				 
         if (($this->trackmail) && (isset($trackid))) {
		    $sSQL .= "," . $db->qstr($trackid) . ")";
		 }
		 else				 					 
			$sSQL .= ")"; 
	     //echo $sSQL;			
	     $result = $db->Execute($sSQL,1);			 
		 $ret = $result->Affected_Rows();
					     	  	
  	     if (!$ret) {
		   SetGlobal('sFormErr',localize('_MLS2',getlocal()));	//send message ok
		   return true;
		 }         
		 else { 
		   SetGlobal('sFormErr',localize('_MLS9',getlocal()).'('.$err.')');	//error
		   setInfo($err);//$info); //smtp error = global info
		 }  
       }
       else 
	     SetGlobal('sFormErr',localize('_MLS4',getlocal()));
		 
	   return false;			 
	}
	
	//real send mail from db queue to mailer
    function sendmail($from,$to,$subject,$mail_text='',$altbody=null,$mycc=null,$mybcc=null,$ishtml=null,$encoding=null,$user=null,$pass=null,$name=null,$server=null) {
       $db = GetGlobal('db');	
       $sFormErr = GetGlobal('sFormErr');
	   if ($mycc) {
	     if (stristr($mycc,';'))	
	       $ccaddress = explode(';',$mycc);  
	     else
	       $ccaddress = array(0=>$mycc);
	   }	 
		 
	   if ($mybcc) {		 
	     if (stristr($mybcc,';'))		 	 
	       $bccaddress = explode(';',$mybcc); 	    
         else
	   	   $bccaddress = array(0=>$mybcc);	 
	   }  
       //if ((checkmail($to)) && ($subject)) {//echo $to,'<br>';
	   
       $smtpm = new smtpmail($encoding,$user,$pass,$name,$server);
	   //echo '>',$encoding,$user,$name,$pass,$server;
		   	   
       if ((defined('SMTP_PHPMAILER')) && (SMTP_PHPMAILER=='true')) {
		   //echo 'smtp';	
		   $smtpm->from($from,$name);		   
		   $smtpm->to($to);  
		   if (!empty($ccaddress)) {
		     foreach ($ccaddress as $cc) {
			   //echo $cc,'<br>';
			   if (trim($cc)) {
		         //$smtpm->cc($cc);//ONLY WIN32  
			     $smtpm->to($cc);
			   }
			 }  
		   }  	 
		   if (!empty($bccaddress)) {
		     foreach ($bccaddress as $bcc) {
			   //echo $bcc,'<br>';		
			   if (trim($bcc)) {	 
		         //$smtpm->bcc($bcc); //ONLY WIN32  
			     $smtpm->to($bcc);  
			   }	 
			 }  
		   }		   
		   $smtpm->subject($subject);
		   $smtpm->body($mail_text,$ishtml); 	//rawurldecode from db
		   
           # Optional alternate text-only body:
           $smtpm->smtp->AltBody = $altbody;	//rawurldecode from db
		   		 
		   # url images to Embeded images replacement
		   if (!empty($this->images)) {
		     foreach ($this->images as $a=>$image) {
		       if ($image) {
			     foreach ($this->imgtypes as $ext) {		 
			       if (strstr($image,$ext)) {
				     $myext = str_replace('.','',$ext);//without dot
                     $err .= $smtpm->smtp->AddEmbeddedImage($this->template_images_path . $image, "1", $image, "base64", "image/$myext");		 
				   }  
			     }
			   }  
		     }	  
		   }
           # Attached file containing this source code:
		   if (!empty($this->attachments)) {
		     foreach ($this->attachments as $a=>$attachment) {
		       if ($attachment) {
			     foreach ($this->doctypes as $ext) {		 
			       if (strstr($attachment,$ext)) {		
				     $myext = str_replace('.','',$ext);//without dot???? switch	 
                     $err .= $smtpm->smtp->AddAttachment($this->template_document_path . $attachment, $attachment, "base64", "text/plain");
				   }  
			     }
			   }  
		     }
		   }		   			   	   
	   }
       elseif ((defined('SENDMAIL_PHPMAILER')) && (SENDMAIL_PHPMAILER=='true')) { 	   
		   //echo 'phpmailer';
		   $smtpm->from($from,$this->mailname);		   
		   $smtpm->to($to);  
		   if (!empty($ccaddress)) {
		     foreach ($ccaddress as $cc) {
			   //echo $cc,'<br>';			 
			   if (trim($cc)) {			 
		         //$smtpm->cc($cc); //ONLY WIN32  
			     $smtpm->to($cc);
			   }	 
			 }  
		   }
		   if (!empty($bccaddress)) {
		     foreach ($bccaddress as $bcc) {
 			   //echo $bcc,'<br>';
			   if (trim($bcc)) {				   
		         //$smtpm->bcc($bcc);//ONLY WIN32   
			     $smtpm->to($bcc);
			   }	 
			 }  
		   }			    
		   $smtpm->subject($subject);
		   $smtpm->body($mail_text,$ishtml); 	//rawurldecode from db		
		   
           # Optional alternate text-only body:
           $smtpm->smtp->AltBody = $altbody;	//rawurldecode from db	 
		   
		   # url images to Embeded images replacement
		   if (!empty($this->images)) {
		     foreach ($this->images as $a=>$image) {
		       if ($image) {
			     foreach ($this->imgtypes as $ext) {		 
			       if (strstr($image,$ext)) {
				     $myext = str_replace('.','',$ext);//without dot
                     $err .= $smtpm->smtp->AddEmbeddedImage($this->template_images_path . $image, "1", $image, "base64", "image/$myext");		 
				   }  
			     }
			   }  
		     }	  
		   }
           # Attached file containing this source code:
		   if (!empty($this->attachments)) {
		     foreach ($this->attachments as $a=>$attachment) {
		       if ($attachment) {
			     foreach ($this->doctypes as $ext) {		 
			       if (strstr($attachment,$ext)) {		
				     $myext = str_replace('.','',$ext);//without dot???? switch	 
                     $err .= $smtpm->smtp->AddAttachment($this->template_document_path . $attachment, $attachment, "base64", "text/plain");
				   }  
			     }
			   }  
		     }
		   }		      
	  } 
	  else {
		   //echo 'default';	
		   $smtpm->to($to); 
		   $smtpm->from($from); 
		   $smtpm->subject($subject); //rawurldecode from db
		   $smtpm->body($mail_text);			   			   	    
	  }
			 
	  $err = $smtpm->smtpsend();
	  unset($smtpm);				 
		  			     	  	
  	  if ($err) 
		   return ($err); 
      //}
       //else 
	     //SetGlobal('sFormErr',localize('_MLS4',getlocal()));
		 
	   return (false);	 	   
  	   
    } 
	
	function add_tracker_to_mailbody($mailbody=null,$id=null,$receiver=null,$is_html=false) {
	
	   if (!$id) return;
	   
	   $i = rawurlencode(encode($id));
	
	   if ($receiver) {
	     $r = rawurlencode(encode($receiver));
	     $ret = "<img src=\"http://www.stereobit.gr/mtrack.php?i=$i&r=$r\" border=\"0\" width=\"1\" height=\"2\">";
	   }
	   else
	     $ret = "<img src=\"http://www.stereobit.gr/mtrack.php?i=$i\" border=\"0\" width=\"1\" height=\"2\">";
		 
	   if (($is_html) && (stristr($mailbody,'</BODY>')))
	     $out = str_replace('</BODY>',$ret.'</BODY>',$mailbody);
	   else
	     $out = $mailbody . $ret;	 	 
		 
	   return ($out);	 
	} 
	
	function sendmail_tracker() {
	
	   //$i = 'VhAMbVwyATdWSQkTUzQEHFcCUFAIRgJQUAdVAAg0VWABQV0TWWVcSVZADDBTMV1CVxgLJ1QsAVBWEQFTVBEDW1YCDHxcZAEGVmkJE1NkBCJXD1B8CDwCUlAFVRAIa1UjAVtdElkzXFpWXgwGU0FdUFcZCwxUGgFnVgQBVFQVAzNWFgw3XH8BDlZuCWNTVQQNVx5QUwg8AkNQBVVgCEFVIwFBXTlZVFxcVlEMBlM1XWBXDQswVB0BTlYTAUNUYQNIVgEMU1xCAQZWRAkTU1EEGlcbUFUIMAJMUABVJghvVQIBVl0QWUBcWlZODAFTY11jVx4LbFQ7AUlWBwFpVB4DdFYQDHxcQgEfVloJPlN3BG1XD1BOCFkCQ1AaVRAIZ1U9AVtdZFl1XElWRgwwU2RdNVcMC25UAgFXVhEBVFRhA2pWFQxBXDIBAlZFCRNTWgQoVwxQbAhnAk1QNVUHCHxVcQExXRVZRlxhVn8MM1NiXTBXHAtpVBABeFYaAUBUHwNDVhEMcFxDAQFWfAkaU04EDlcbUGwIXQJKUGRVCQhDVQUBOl1iWUBcOVZZDANTYl1mV2MLE1QXAUVWLwFmVDEDM1YWDGlcRgESVj8JGFNPBA5XY1BuCEkCUVAAVXQIP1UQ';
	   //$r = 'BGQMZ15pBzUDJllrX2MAKQBNUXQBdQdiUSJVNAdsB2RSOQB%2BDHkHM1VnW20%3D';
	
	   if (!$i = GetReq('i')) return;
	   	
	   //$di = rawurldecode($i); echo $di,'<br>';
	   //$dr = rawurldecode($r);
	   
	   $trackid = $i;//decode($i); echo $i,'<br>';
	   $receiver = $r;//decode($r);
	   
	   /*$p = explode('<DLM>',$id);
	   print_r($p);
	   if (!empty($p)) {
	       echo 'z';
	       $trackid = $p[0];
		   $sender = $p[1];
		   $app = $p[2];*/
	   $p = explode('@',$trackid);	   
	   if (!empty($p)) {	   
	   
	       $app = trim($p[1]);	   
		   //echo $app,'>';
		   if (($app) && ($app!=$this->thisapp))
		     $db = GetGlobal('controller')->calldpc_method('database.switch_db use '.$app.'++1');
		   else
		     $db = GetGlobal('db');//root db
			 
           $sSQL = "select id,trackid,reply from mailqueue where trackid=" . $db->qstr($trackid);			 	 
		   $result = $db->Execute($sSQL,2);
		   //echo $sSQL;
		   
		   if ($tid = $result->fields['trackid']) {//if trackid exist...
		     
			 $replies = intval($result->fields['reply'])+1;//addon replies
			 
             $sSQL = "update mailqueue set reply=$replies, status=1 where trackid=" . $db->qstr($trackid);			 	 
		     $result = $db->Execute($sSQL,1);
			 //echo $sSQL;		     
		   }
		   	 
	   }
	}
	
	function get_trackid($from,$to) {
	     //static $m = 0;
		 
		 $i = rand(1000,1999);//++$m;
	
		 /*$ta[] = encode(date('Ymd-H:m:s'));
		 $ta[] = $from;
		 $ta[] = $this->appname;
		 $tc = implode('<DLM>',$ta);
		 $tid = rawurlencode(encode($tc));*/
		 
		 //YmdHmsu u only at >5.2.2
		 $tid = date('YmdHms') . $i . 'a@' . $this->appname;		 
		 
		 return ($tid);	
	}	


	public function scanBounce($sender, $delete=false, $maxfiles=null) {
		$maxf = $maxfiles ? $maxfiles : $this->batch;
		//$maxbatch = 2400; //100*24
		$db = GetGlobal('db'); //for every app in cycle or def(this) app
		
		if (!$sender) return ("Scan bounce sender not exists \r\n");
		$mp = explode('@',$sender);
		$app_sendermailfolder = $mp[1] . '/' . str_replace('.','_',$mp[0]) . '/cur/';
		$senderfolder = $this->cpanelmailpath . $app_sendermailfolder;		
		$folder = is_dir($senderfolder) ? $senderfolder : null;
		echo "\r\nSender folder:" . $folder;
		if (!$folder) return false;
		
		//$daysback = mktime(0, 0, 0, date("m"), date("d"), date("Y"));
		$ret = null;
		
		$mfiles = scandir($folder, SCANDIR_SORT_DESCENDING); //desc
		if (empty($mfiles)) return ($folder . " : Empty\n");	
		
		$c = count($mfiles);
		$max = ($c<$maxf) ? $c : $maxf;		
		
		$bouncehandler = new Bouncehandler();
		
		for ($f=0;$f<=$max;$f++) {
			
			$file = $mfiles[$f];
			
			if ($file=='.' || $file=='..') continue; 
			
			$fsize = filesize($folder . $file);
			if  ($fsize<(1024*20)) { //20kb max
			
			  echo "\r\n" . $folder . ' : ' . $file;
			  $bounce = @file_get_contents($folder . $file);
			  $rep = $bouncehandler->parse_email($bounce); 
			  if ($a = $bouncehandler->is_a_bounce()) { 
				$to = $rep[0]['recipient'];
				
				$sSQL = "select failed from ulists where email=" . $db->qstr($to);
				$result = $db->Execute($sSQL,2);
		
				$xtimes = $result->fields[0] ? intval($result->fields[0])+1 : 1;
		
				$sSQL = 'update ulists set failed=' . $xtimes . " where email=" . $db->qstr($to);
				$result = $db->Execute($sSQL,1);

				//also update mailqueue (last sending mail)		
				$sSQL = "select id from mailqueue where active=0 and receiver=" . $db->qstr($to) . " order by id desc LIMIT 1";
				$result = $db->Execute($sSQL,2);
						
				$sSQL = "update mailqueue set status=-2, mailstatus='BOUNCE' where id=" . $result->fields[0];
				$result = $db->Execute($sSQL,1);

				$ret .= "\r\n" . $file;
				$ret .= " was last modified: " . date ("d m Y H:i:s.", filemtime($folder . $file));
				$ret .= " Send to: " . $to ."\r\n";
				if ($delete==true) {
					$ret .= "Deleted\r\n";
					unlink($folder . $mfiles[$f]);
				}				
			  }//is bounce
			}//filesize
		}
		return $ret;			
	}	

};
}		
?>