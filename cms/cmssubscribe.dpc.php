<?php
$__DPCSEC['CMSSUBSCRIBE_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if (!defined("CMSSUBSCRIBE_DPC")) {
define("CMSSUBSCRIBE_DPC",true);

$__DPC['CMSSUBSCRIBE_DPC'] = 'cmssubscribe';

$__EVENTS['CMSSUBSCRIBE_DPC'][0]='cmssubscribe';
$__EVENTS['CMSSUBSCRIBE_DPC'][1]='unsubscribe';
$__EVENTS['CMSSUBSCRIBE_DPC'][2]='subscribe';
$__EVENTS['CMSSUBSCRIBE_DPC'][3]='advsubscribe';
$__EVENTS['CMSSUBSCRIBE_DPC'][4]='subscribeajax';
$__EVENTS['CMSSUBSCRIBE_DPC'][5]='unsubscribeajax';
$__EVENTS['CMSSUBSCRIBE_DPC'][6]='shsubscribe'; //copmatibility

$__ACTIONS['CMSSUBSCRIBE_DPC'][0]='cmssubscribe';
$__ACTIONS['CMSSUBSCRIBE_DPC'][1]='unsubscribe';
$__ACTIONS['CMSSUBSCRIBE_DPC'][2]='subscribe';
$__ACTIONS['CMSSUBSCRIBE_DPC'][3]='advsubscribe';
$__ACTIONS['CMSSUBSCRIBE_DPC'][4]='subscribeajax';
$__ACTIONS['CMSSUBSCRIBE_DPC'][5]='unsubscribeajax';
$__ACTIONS['CMSSUBSCRIBE_DPC'][6]='shsubscribe'; //compatibility

$__LOCALE['CMSSUBSCRIBE_DPC'][0]='CMSSUBSCRIBE_DPC;Subscribe;Εγγραφή';
$__LOCALE['CMSSUBSCRIBE_DPC'][1]='_SUBSCR;Subscribe;Εγγραφή';
$__LOCALE['CMSSUBSCRIBE_DPC'][2]='_USUBSCR;Unsubscribe;Διαγραφή απο την λίστα';
$__LOCALE['CMSSUBSCRIBE_DPC'][3]='_SUBSLIST;Subscribers List;Λίστα Συνδρομών';
$__LOCALE['CMSSUBSCRIBE_DPC'][4]='_MSG2;Enter your e-mail:;Εισάγετε το e-mail σας:';
$__LOCALE['CMSSUBSCRIBE_DPC'][5]='_MSG4;Advance subscription;Περισσότερα';
$__LOCALE['CMSSUBSCRIBE_DPC'][6]='_MSG5;Invalid e-mail;Ακυρο e-mail';
$__LOCALE['CMSSUBSCRIBE_DPC'][7]='_MSG6;Subscription successfull !;Επιτυχής εισαγωγή !';
$__LOCALE['CMSSUBSCRIBE_DPC'][8]='_MSG7;Subscription is active !;Είστε ήδη καταχωρημένος';
$__LOCALE['CMSSUBSCRIBE_DPC'][9]='_MSG8;Unsubscription successfull !;Επιτυχής εξαγωγή !';
$__LOCALE['CMSSUBSCRIBE_DPC'][10]='_ERROR;Error !;Λάθος !';
$__LOCALE['CMSSUBSCRIBE_DPC'][11]='_SUBSCRTEXT;Please send me mail informations about new products;Θέλω να λαμβάνω πληροφορίες για νέα προϊόντα μέσω ηλεκτρονικού ταχυδρομείου';
$__LOCALE['CMSSUBSCRIBE_DPC'][12]='_SUBSCRWARN;Please check below to subscribe;Ενεργοποίηση συνδρομής';
$__LOCALE['CMSSUBSCRIBE_DPC'][13]='_DERROR;Database Error;Δεν είναι δυνατή η εργασία αυτή τη στιγμή, προσπαθήστε αργότερα';
$__LOCALE['CMSSUBSCRIBE_DPC'][14]='_SUBID;A/A;A/A';
$__LOCALE['CMSSUBSCRIBE_DPC'][15]='_SUBMAIL;Mail Address;Ταχυδρομείο';
$__LOCALE['CMSSUBSCRIBE_DPC'][16]='_SUBDATE;Subscription date;Ημερ. Εισαγωγής';
$__LOCALE['CMSSUBSCRIBE_DPC'][17]='SUBSCRIBE_CNF;Subscribers List;Λίστα Συνδρομών';
$__LOCALE['CMSSUBSCRIBE_DPC'][18]='_CLICKHERE; click here.; πατηστε εδω.';
$__LOCALE['CMSSUBSCRIBE_DPC'][19]='Subscription enabled;Subscription enabled;Ενεργοποίηση συνδρομητή';
$__LOCALE['CMSSUBSCRIBE_DPC'][20]='Subscription disabled;Subscription disabled;Απενεργοποίηση συνδρομητή';

$__PARSECOM['CMSSUBSCRIBE_DPC']['quickform']='_QUICKSHSUBSCRIBE_';

class cmssubscribe {
    var $path, $urlpath, $inpath;
    var $title,$msg;
	var $subject,$body;
	var $subject2,$body2;	
	var $tell_it, $tell_from;
	var $tell_user, $owner;
	var $tmpl_path, $tmpl_name;

	function __construct() {
	
	  $this->title = localize('CMSSUBSCRIBE_DPC',getlocal());	
	  $this->msg = null;	
      $this->path = paramload('SHELL','prpath');  	
	  
	  $this->urlpath = paramload('SHELL','urlpath');
	  $this->inpath = paramload('ID','hostinpath');		   
	  
	  $this->t_advsubscr = localize('_MSG4',getlocal());
	  $this->mesout = paramload('SHSUBSCRIBE','umsg');	
	  $this->t_entermail = paramload('SHSUBSCRIBE','say');
	  
	  $this->domain = paramload('SHSUBSCRIBE','domain');
	  $this->tell_it = remote_paramload('SHSUBSCRIBE','tellsubscriptionto',$this->path);
	  $this->tell_from = remote_paramload('SHSUBSCRIBE','tellsubscriptionfrom',$this->path);
	  
      $s1 = remote_paramload('SHSUBSCRIBE','subjecttotell',$this->path);//'New Subscription' 	   
	  $this->subject = localize($s1, getlocal()); 		    	    	   
	  $s2 = remote_paramload('SHSUBSCRIBE','subjecttotellatdel',$this->path);//'New Subscription' 	   
	  $this->subject2 = localize($s2, getlocal());
	  	  
	  $this->body = remote_paramload('SHSUBSCRIBE','bodytotell',$this->path);	  
	  $this->body2 = remote_paramload('SHSUBSCRIBE','bodytotellatdel',$this->path);		
	  
	  $this->tell_user = remote_paramload('SHSUBSCRIBE','telluser',$this->path);  
	  $this->owner = $this->tell_user; //remote_paramload('SHSUBSCRIBE','telluser',$this->path);  
	  
	  $this->tmpl_path = remote_paramload('FRONTHTMLPAGE','path',$this->path);
	  $this->tmpl_name = remote_paramload('FRONTHTMLPAGE','template',$this->path);	  
	}
	
    function event($event) {	
  
	    switch ($event) {
	        case 'subscribeajax'   :  $this->dosubscribe(); break;											
	        case 'unsubscribeajax' :  $this->dounsubscribe(); break;			 
		 
	        case 'subscribe'       :  $this->dosubscribe(); break;											
	        case 'unsubscribe'     :  $this->dounsubscribe();
	                                  break;				  								  
									  
			default                :
        }
    }	

    function action($action)  { 

		 switch ($action) {
	        case 'subscribeajax'   :  die(GetGlobal('sFormErr')); break;											
	        case 'unsubscribeajax' :  die(GetGlobal('sFormErr')); break;
			
	        case 'subscribe'       : 										
	        case 'unsubscribe'     :  			
	        default 			   :  $f = (GetParam('FormAction')) ? GetParam('FormAction') : (GetReq('t') ? GetReq('t') : null);
			                          $out = $this->form($f); 
         }
		 
	     return ($out);
	}

    protected function form($action=null)  { 	
        
		switch ($action) {	   
			case 'unsubscribe' : $stemplate= "unsubscribe.htm"; break;
			case 'subscribe'   :
			default 		   : $stemplate= "subscribe.htm";
		}

		$template = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$stemplate) ; 	
		$mytemplate = file_get_contents($template);	

		$tokens = array();		
		$tokens[] = $this->msg;		 
		$out .= $this->combine_tokens($mytemplate,$tokens);

        return ($out);
    }
	
	protected function checkmail($mail=null) {
		$valid = filter_var($mail, FILTER_VALIDATE_EMAIL);
		return ($valid);		
	}

	protected function update_statistics($id, $user=null) {
        if (defined('CMSVSTATS_DPC'))	
			return _m('cmsvstats.update_event_statistics use '.$id.'+'.$user);			
		
		return false;
	}

	
	protected function dosubscribe($mail=null,$bypasscheck=null,$telltouser=null) {
       $db = GetGlobal('db');
	   $name = $name ? $name : 'unknown';
	   $dlist = 'default';		
       $mail_tell_user = isset($telltouser)?$telltouser:$this->tell_user;	
	   $mail = $mail ? $mail : GetParam('submail');	 
	   if (!$mail) return;	   
	   
       $dtime = date('Y-m-d h:i:s');	   	
	   
	   if ($this->checkmail($mail))  {

		  $sSQL = "SELECT email FROM ulists where email=". $db->qstr($mail) . " and listname='$dlist'"; 
		  
	      $ret = $db->Execute($sSQL,2);
		  $mymail = $ret->fields['email'];
		  
		  if ($mymail==$mail) {//is in db but already enabled or disabled  re-enable subscription
			   $sSQL = "update ulists set active=1 where listname='$dlist' and email=" . $db->qstr(strtolower($mail));  
			   $db->Execute($sSQL,1);
			   //echo $sSQL;		
			   if (!$bypasscheck)    
			     $this->msg =  localize('_MSG6',getlocal());	
				 
               if ($this->tell_it) //tell to me
			     $this->mailto($this->tell_from,$this->tell_it,$this->subject,$mail);
				 			     							  
			   //tell to subscriber
		      if ($mail_tell_user>0) {		   
		         $tokens[] = $mail;	
                 $tokens[] = $mail; //dummy at leats 2 elements				   	
                 $sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
		         if ($mailbody = _m("fronthtmlpage.subpage use subinsert.htm+".$sd."+1")) { 
				 				 
			       $this->mailto($this->tell_from,$mail,$this->subject,$mailbody);	 
			     }
			     else			   
			       $this->mailto($this->tell_from,$mail,$this->subject,$this->body);					 	  
			  }	  
		  }		  
          else {
	
			   $sSQL = "insert into ulists (email,startdate,active,lid,listname,name,owner) " .
						"values (" .
						$db->qstr(strtolower($mail)) . "," . $db->qstr($dtime) . "," .
						"1,1,'$dlist'," . $db->qstr($name) . ",". $db->qstr($this->owner). ")";   			   
			   $db->Execute($sSQL,1);	
			   
			   if (!$bypasscheck)	    
			     $this->msg = localize('_MSG6',getlocal());	
				 
			   //echo $sSQL;
               if ($this->tell_it) //tell to me
			     $this->mailto($this->tell_from,$this->tell_it,$this->subject,$mail);
				 			     							  
			   //tell to subscriber	   
		       $tokens[] = $mail;	
               $tokens[] = $mail; //dummy at leats 2 elements				   					 
               $sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
		       if ($mailbody = _m("fronthtmlpage.subpage use subinsert.htm+".$sd."+1")) { 
				 
			     $this->mailto($this->tell_from,$mail,$this->subject,$mailbody);	 
			   }
			   else
			     $this->mailto($this->tell_from,$mail,$this->subject,$this->body);	 	 
		  }
		  
		  $this->update_statistics('subscribe', $mail);
	   }
	   else {
			if (!$bypasscheck)
				$this->msg = localize('_MSG5',getlocal());		   	 
	   }	   
	}
	
	protected function dounsubscribe($mail=null,$telltouser=null) {
       $db = GetGlobal('db');	
	   $mail_tell_user = isset($telltouser)?$telltouser:$this->tell_user;
	   $ulistname = GetParam('ulistname') ? GetParam('ulistname') : 'default';	    
	   $mail = $mail ? $mail : GetReq('submail'); 
	   if (!$mail) return;		   
	   
	   if ($this->checkmail($mail))  {

          //disable from ulists
		  //if ($this->isin_ulists($mail, $ulistname)) { //!!!!!!!!!!!!!!!! not a known list name
			$sSQL = "update ulists set active=0 where email=" . $db->qstr($mail);
			//$sSQL .= ' and listname=' . $db->qstr($ulistname);  //from all the lists !!!!!(nwsletter have to include the list while unsub)
			$result = $db->Execute($sSQL,1);
            //echo $sSQL;
			$this->msg = localize('_MSG8',getlocal());
		    
			if ($this->tell_it) //tell to me
				$this->mailto($this->tell_from,$this->tell_it,$this->subject2,$mail);
				 			     							  
			//tell to subscriber   
			if ($mail_tell_user>0) {	
				$tokens[] = $mail;				
				$tokens[] = $mail; //dummy at leats 2 elements					
				$sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
				if ($mailbody = _m("fronthtmlpage.subpage use subdelete.htm+".$sd."+1")) { 
				 			 
					$this->mailto($this->tell_from,$mail,$this->subject2,$mailbody);	 
				}
				else			   
					$this->mailto($this->tell_from,$mail,$this->subject2,$this->body2);			  
			}
			
			$this->update_statistics('unsubscribe', $mail);
		  //}  
	   }
	   else 
			$this->msg = localize('_MSG5',getlocal());	  
	}
	
    protected function isin($mail) {
       $db = GetGlobal('db');
	   
       $sSQL = "SELECT id,email,startdate FROM ulists";	
	   $sSQL .= " WHERE email=" . $db->qstr($mail) . " and active=1"; 
	   $resultset = $db->Execute($sSQL,2);
	   if ($resultset->fields['email']==$mail) return (true);
	
       return (false);
    }	
	
    protected function isin_ulists($mail, $list=null) {
       $db = GetGlobal('db');
	   $ulist = $list ? $list : 'default';
	   
       $sSQL = "SELECT email FROM ulists";	
	   $sSQL .= " WHERE listname='$ulist' and email=" . $db->qstr($mail); 
	   $resultset = $db->Execute($sSQL,2);

	   if ($resultset->fields['email']) 
		   return (true);
	
       return (false);
    }		
	
	protected function getmails($list=null) {
       $db = GetGlobal('db');	
	   $ulist = $list ? $list : 'default';	   
       $resultset = $db->Execute("select email from ulists where active=1 and listname='$ulist'");   

	   $ret = $db->fetch_array_all($resultset);
	   $out = implode(',',$ret);

	   return $out;	
	}
	
	protected function mailto($from,$to,$subject=null,$body=null,$ishtml=false,$instant=false) {
	
	    /*if ((defined('RCSSYSTEM_DPC')) && (!$instant)) { //no queue when no instant
		  $ret = _m("rcssystem.sendit use $from+$to+$subject+$body++$ishtml");
        }
		else {*/
		    if (defined('SMTPMAIL_DPC'))  {
		       $smtpm = new smtpmail;
			   
		       $smtpm->to($to); 
		       $smtpm->from($from); 
		       $smtpm->subject($subject);
		       $smtpm->body($body);			   

			   $mailerror = $smtpm->smtpsend();
			   unset($smtpm);
			   
			   if (!$mailerror) return (true);
			}
			else
				die('SMTP ERROR!');		
		//}
		
	    return (false);  			 
	}			
	
	//tokens method
	protected function combine_tokens($template_contents,$tokens) {
	
	    if (!is_array($tokens)) return;
		
		if (defined('FRONTHTMLPAGE_DPC')) {
		  $fp = new fronthtmlpage(null);
		  $ret = $fp->process_commands($template_contents);
		  unset ($fp);		  		
		}		  		
		else
		  $ret = $template_contents;
		  
	    foreach ($tokens as $i=>$tok) {
		    $ret = str_replace("$".$i,$tok,$ret);
	    }
		
		//clean unused token marks
		for ($x=$i;$x<10;$x++)
		  $ret = str_replace("$".$x,'',$ret);
	  
		return ($ret);
	} 				

};
}
?>