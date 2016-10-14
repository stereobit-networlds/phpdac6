<?php
$__DPCSEC['SHSUBSCRIBE_DPC']='1;1;1;1;1;1;2;2;9;9;9';

if ( (!defined("SHSUBSCRIBE_DPC")) && (seclevel('SHSUBSCRIBE_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("SHSUBSCRIBE_DPC",true);

$__DPC['SHSUBSCRIBE_DPC'] = 'shsubscribe';

$__EVENTS['SHSUBSCRIBE_DPC'][0]='shsubscribe';
$__EVENTS['SHSUBSCRIBE_DPC'][1]='unsubscribe';
$__EVENTS['SHSUBSCRIBE_DPC'][2]='subscribe';
$__EVENTS['SHSUBSCRIBE_DPC'][3]='advsubscribe';
$__EVENTS['SHSUBSCRIBE_DPC'][4]='subscribeajax';
$__EVENTS['SHSUBSCRIBE_DPC'][5]='unsubscribeajax';

$__ACTIONS['SHSUBSCRIBE_DPC'][0]='shsubscribe';
$__ACTIONS['SHSUBSCRIBE_DPC'][1]='unsubscribe';
$__ACTIONS['SHSUBSCRIBE_DPC'][2]='subscribe';
$__ACTIONS['SHSUBSCRIBE_DPC'][3]='advsubscribe';
$__ACTIONS['SHSUBSCRIBE_DPC'][4]='subscribeajax';
$__ACTIONS['SHSUBSCRIBE_DPC'][5]='unsubscribeajax';

$__LOCALE['SHSUBSCRIBE_DPC'][0]='SHSUBSCRIBE_DPC;Subscribe;Εγγραφή';
$__LOCALE['SHSUBSCRIBE_DPC'][1]='_SUBSCR;Subscribe;Εγγραφή';
$__LOCALE['SHSUBSCRIBE_DPC'][2]='_USUBSCR;Unsubscribe;Διαγραφή απο την λίστα';
$__LOCALE['SHSUBSCRIBE_DPC'][3]='_SUBSLIST;Subscribers List;Λίστα Συνδρομών';
$__LOCALE['SHSUBSCRIBE_DPC'][4]='_MSG2;Enter your e-mail:;Εισάγετε το e-mail σας:';
$__LOCALE['SHSUBSCRIBE_DPC'][5]='_MSG4;Advance subscription;Περισσότερα';
$__LOCALE['SHSUBSCRIBE_DPC'][6]='_MSG5;Invalid e-mail;Ακυρο e-mail';
$__LOCALE['SHSUBSCRIBE_DPC'][7]='_MSG6;Subscription successfull !;Επιτυχής εισαγωγή !';
$__LOCALE['SHSUBSCRIBE_DPC'][8]='_MSG7;Subscription is active !;Είστε ήδη καταχωρημένος';
$__LOCALE['SHSUBSCRIBE_DPC'][9]='_MSG8;Unsubscription successfull !;Επιτυχής εξαγωγή !';
$__LOCALE['SHSUBSCRIBE_DPC'][10]='_ERROR;Error !;Λάθος !';
$__LOCALE['SHSUBSCRIBE_DPC'][11]='_SUBSCRTEXT;Please send me mail informations about new products;Θέλω να λαμβάνω πληροφορίες για νέα προϊόντα μέσω ηλεκτρονικού ταχυδρομείου';
$__LOCALE['SHSUBSCRIBE_DPC'][12]='_SUBSCRWARN;Please check below to subscribe;Ενεργοποίηση συνδρομής';
$__LOCALE['SHSUBSCRIBE_DPC'][13]='_DERROR;Database Error;Δεν είναι δυνατή η εργασία αυτή τη στιγμή, προσπαθήστε αργότερα';
$__LOCALE['SHSUBSCRIBE_DPC'][14]='_SUBID;A/A;A/A';
$__LOCALE['SHSUBSCRIBE_DPC'][15]='_SUBMAIL;Mail Address;Ταχυδρομείο';
$__LOCALE['SHSUBSCRIBE_DPC'][16]='_SUBDATE;Subscription date;Ημερ. Εισαγωγής';
$__LOCALE['SHSUBSCRIBE_DPC'][17]='SUBSCRIBE_CNF;Subscribers List;Λίστα Συνδρομών';
$__LOCALE['SHSUBSCRIBE_DPC'][18]='_CLICKHERE; click here.; πατηστε εδω.';
$__LOCALE['SHSUBSCRIBE_DPC'][19]='Subscription enabled;Subscription enabled;Ενεργοποίηση συνδρομητή';
$__LOCALE['SHSUBSCRIBE_DPC'][20]='Subscription disabled;Subscription disabled;Απενεργοποίηση συνδρομητή';

$__PARSECOM['SHSUBSCRIBE_DPC']['quickform']='_QUICKSHSUBSCRIBE_';

class shsubscribe {
    var $path, $urlpath, $inpath;
    var $title,$msg;
	var $subject,$body;
	var $subject2,$body2;	
	var $tell_it, $tell_from;
	var $tell_user, $owner;
	var $tmpl_path, $tmpl_name;

	function shsubscribe() {
	
	  $this->title = localize('SHSUBSCRIBE_DPC',getlocal());	
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
	
    function event($sAction) {	

       if (!$this->msg) {
  
	     switch ($sAction) {
	        case 'subscribeajax'  ://subscribe 
			                          $this->dosubscribe();
	                                  break;											
	        case 'unsubscribeajax' ://unsubscribe
		                              $this->dounsubscribe();
	                                  break;			 
		 
	        case 'subscribe'  ://subscribe 
			                          $this->dosubscribe();
	                                  break;											
	        case 'unsubscribe' ://unsubscribe
		                              $this->dounsubscribe();
	                                  break;				  								  
         }
      }
    }	

    function action($action)  { 
	     //$this->reset_db();
		 $act = GetParam('act');
		 if (!$act) $act = 'subscribe';
		 
		 switch ($action) {
	        case 'subscribeajax'   :  die(GetGlobal('sFormErr'));
	                                  break;											
	        case 'unsubscribeajax' :  die(GetGlobal('sFormErr'));
	                                  break;			 
	        default :                 $out .= GetGlobal('sFormErr');
			                          $out .= $this->form();
         }
	     return ($out);
	}

    function form($action=null)  { 	
		$action = $action?$action:GetReq('t');	

		switch ($action) {	   
			case 'unsubscribe' : $stemplate= "unsubscribe.htm"; break;
			case 'subscribe'   :
			default : $stemplate= "subscribe.htm";
		}

		$template = $this->path . $this->tmpl_path .'/'. $this->tmpl_name .'/'. str_replace('.',getlocal().'.',$stemplate) ; 	
		$tokens = array();
		$mytemplate = file_get_contents($template);	
	
	    $filename = $action ? seturl("t=$action") : seturl("t=subscribe");      
       
		$tokens[] = "<FORM action=". "$filename" . " method=post>";		
		$tokens[] = "<INPUT type=\"input\" name=\"submail\" maxlenght=\"64\" size=\"25\" class=\"myf_input\"  onfocus=\"this.style.backgroundColor='#F5F5F5'\" onblur=\"this.style.backgroundColor='#FFFFFF'\" style=\"background-color: rgb(255, 255, 255);\" >";

		if ($action) {
	   
			$sub = localize('_SUBSCR',getlocal());
			$usub = localize('_USUBSCR',getlocal());	     
		 
			switch ($action) {
		   
				case 'unsubscribe' : $tokens[] = "<input type=\"submit\" class=\"myf_button\" value=\"$usub\"><input type=\"hidden\" name=\"FormAction\" value=\"$action\">";		   
					                 break;
				case 'subscribe'   :
				default            : $tokens[] = "<input type=\"submit\" class=\"myf_button\" value=\"$sub\"><input type=\"hidden\" name=\"FormAction\" value=\"$action\">";		   
			} 
		}	 
		else 
			$tokens[] = "<input type=\"submit\" class=\"myf_button\" name=\"FormAction\" value=\"subscribe\">&nbsp;<input type=\"submit\" class=\"myf_button\" name=\"FormAction\" value=\"unsubscribe\">";
	   
	    $tokens[] = "</FORM>";
		$tokens[] = GetGlobal('sFormErr');
		 
		$out .= $this->combine_tokens($mytemplate,$tokens);

        return ($out);
    }

	function message2go() {
	   
	    $out = $this->mesout . seturl("t=advsubscribe",localize('_CLICKHERE',getlocal()));
		return ($out);
	}	
	
	function checkmail($mail=null) {
		$valid = filter_var($mail, FILTER_VALIDATE_EMAIL);
		return ($valid);		
	}

	
	function dosubscribe($mail=null,$bypasscheck=null,$telltouser=null) {
       $db = GetGlobal('db');
       $sFormErr = GetGlobal('sFormErr');	
	   $name = $name ? $name : 'unknown';
	   $dlist = 'default';		
       $mail_tell_user = isset($telltouser)?$telltouser:$this->tell_user;	
	   $mail = $mail?$mail:GetParam('submail');	 
	   if (!$mail) return;	   
	   
       $dtime = date('Y-m-d h:i:s');	   	
	   
	   if ($this->checkmail($mail))  {

		  $sSQL = "SELECT email FROM ulists where email=". $db->qstr($mail) . " and listname='$dlist'"; 
		  
	      $ret = $db->Execute($sSQL,2);
		  $mymail = $ret->fields['email'];
		  
		  if ($mymail==$mail) {//is in db but already enabled or disabled  re-enable subscription
			   $sSQL = "update ulists set active=1 where listname='$dlist' and email=" . $db->qstr(strtolower($mail));  
			   $db->Execute($sSQL,1);		
			   if (!$bypasscheck)    
			     SetGlobal('sFormErr', localize('_MSG6',getlocal()));	
				 
               if ($this->tell_it) //tell to me
			     $this->mailto($this->tell_from,$this->tell_it,$this->subject,$mail);
				 			     							  
			   //tell to subscriber
		      if ($mail_tell_user>0) {		   
		         $tokens[] = $mail;	
                 $tokens[] = $mail; //dummy at leats 2 elements				   	
                 $sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
		         if ($mailbody = GetGlobal('controller')->calldpc_method("fronthtmlpage.subpage use subinsert.htm+".$sd."+1")) { 
				 				 
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
			     SetGlobal('sFormErr', localize('_MSG6',getlocal()));	
				 
			   //echo $sSQL;
               if ($this->tell_it) //tell to me
			     $this->mailto($this->tell_from,$this->tell_it,$this->subject,$mail);
				 			     							  
			   //tell to subscriber	   
		       $tokens[] = $mail;	
               $tokens[] = $mail; //dummy at leats 2 elements				   					 
               $sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
		       if ($mailbody = GetGlobal('controller')->calldpc_method("fronthtmlpage.subpage use subinsert.htm+".$sd."+1")) { 
				 
			     $this->mailto($this->tell_from,$mail,$this->subject,$mailbody);	 
			   }
			   else
			     $this->mailto($this->tell_from,$mail,$this->subject,$this->body);	 	 
		  }
	   }
	   else {
	     if (!$bypasscheck)
	       SetGlobal('sFormErr', localize('_MSG5',getlocal()));		   	 
	   }	   
	}
	
	function dounsubscribe($mail=null,$telltouser=null) {
       $db = GetGlobal('db');
       $sFormErr = GetGlobal('sFormErr');			
	   $mail_tell_user = isset($telltouser)?$telltouser:$this->tell_user;
	   $ulistname = GetParam('ulistname') ? GetParam('ulistname') : 'default';	    
	   $mail = $mail ? $mail : GetReq('submail'); 
	   if (!$mail) return;		   
	   
	   if ($this->checkmail($mail))  {

          //disable from ulists
		  if ($this->isin_ulists($mail, $ulistname)) {
			$sSQL = "update ulists set active=0 where email=" . $db->qstr($mail);
			$sSQL .= ' and listname=' . $db->qstr($ulistname); 
			$result = $db->Execute($sSQL,1);
            //echo $sSQL;
			SetGlobal('sFormErr',localize('_MSG8',getlocal()));
		  
			if ($this->tell_it) //tell to me
				$this->mailto($this->tell_from,$this->tell_it,$this->subject2,$mail);
				 			     							  
			//tell to subscriber   
			if ($mail_tell_user>0) {	
				$tokens[] = $mail;				
				$tokens[] = $mail; //dummy at leats 2 elements					
				$sd = str_replace('+','<@>',implode('<TOKENS>',$tokens));
				if ($mailbody = GetGlobal('controller')->calldpc_method("fronthtmlpage.subpage use subdelete.htm+".$sd."+1")) { 
				 			 
					$this->mailto($this->tell_from,$mail,$this->subject2,$mailbody);	 
				}
				else			   
					$this->mailto($this->tell_from,$mail,$this->subject2,$this->body2);			  
			}
		  }  
	   }
	   else 
	     SetGlobal('sFormErr', localize('_MSG5',getlocal()));	  
	}
	
    function isin($mail) {
       $db = GetGlobal('db');
	   
       $sSQL = "SELECT id,email,startdate FROM ulists";	
	   $sSQL .= " WHERE email=" . $db->qstr($mail) . " and active=1"; 
	   $resultset = $db->Execute($sSQL,2);
	   if ($resultset->fields['email']==$mail) return (true);
	
       return (false);
    }	
	
    function isin_ulists($mail, $list=null) {
       $db = GetGlobal('db');
	   $ulist = $list ? $list : 'default';
	   
       $sSQL = "SELECT email FROM ulists";	
	   $sSQL .= " WHERE listname='$ulist' and email=" . $db->qstr($mail); 
	   $resultset = $db->Execute($sSQL,2);

	   if ($resultset->fields['email']) 
		   return (true);
	
       return (false);
    }		
	
	function getmails($list=null) {
       $db = GetGlobal('db');	
	   $ulist = $list ? $list : 'default';	   
       $resultset = $db->Execute("select email from ulists where active=1 and listname='$ulist'");   

	   $ret = $db->fetch_array_all($resultset);
	   $out = implode(',',$ret);

	   return $out;	
	}
	
	function mailto($from,$to,$subject=null,$body=null,$ishtml=false,$instant=false) {
	
	    if ((defined('RCSSYSTEM_DPC')) && (!$instant)) { //no queue when no instant
		  $ret = GetGlobal('controller')->calldpc_method("rcssystem.sendit use $from+$to+$subject+$body++$ishtml");
        }
		else {
		     if ((defined('SMTPMAIL_DPC')) &&
				 (seclevel('SMTPMAIL_DPC',$this->UserLevelID)) ) {
		       $smtpm = new smtpmail;
			   
		       $smtpm->to($to); 
		       $smtpm->from($from); 
		       $smtpm->subject($subject);
		       $smtpm->body($body);			   

			   $mailerror = $smtpm->smtpsend();
			   unset($smtpm);
			   
			   if (!$mailerror) return (true);
			 }
		}
		
	    return (false);  			 
	}			
	
	//tokens method
	function combine_tokens($template_contents,$tokens) {
	
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