<?php

$__DPCSEC['STDOWNLOAD_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("STDOWNLOAD_DPC")) && (seclevel('STDOWNLOAD_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("STDOWNLOAD_DPC",true);

$__DPC['STDOWNLOAD_DPC'] = 'stdownload';


$__EVENTS['STDOWNLOAD_DPC'][0]='stdownload';
$__EVENTS['STDOWNLOAD_DPC'][1]='I agree';
$__EVENTS['STDOWNLOAD_DPC'][2]='I don\'t agree';
 
$__ACTIONS['STDOWNLOAD_DPC'][0]='stdownload';
$__ACTIONS['STDOWNLOAD_DPC'][1]='I agree';
$__ACTIONS['STDOWNLOAD_DPC'][2]='I don\'t agree';

$__DPCATTR['STDOWNLOAD_DPC']['stdownload'] = 'stdownload,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['STDOWNLOAD_DPC'][0]='STDOWNLOAD_DPC;Download;Download';
$__LOCALE['STDOWNLOAD_DPC'][1]='_AGREE;Agree;Συμφωνω';
$__LOCALE['STDOWNLOAD_DPC'][2]='_DISAGREE;Disgree;Διαφωνω';

class stdownload  {

    var $path,$product_id,$title,$prpath,$downloadpath;
    var $message,$trymessage,$agreemessge,$notagreemessage;
	var $download_link,$download_path;
	var $ftype,$tellit;
	var $file_epithema;
	
	var $thanks_from_mail,$thanks_from_subject;
	var $urlpath, $ispublicdir, $wherethefileis;
	
	function stdownload($public=null,$path=null,$name=null) {
	
	    $this->path = paramload('SHELL','prpath');	
	
	    $this->thanks_from_mail = remote_paramload('STDOWNLOAD','thanksfrom',$this->path);
		$this->thanks_from_subject = remote_paramload('STDOWNLOAD','thanksubject',$this->path);
	
	    $mytype = remote_paramload('STDOWNLOAD','filetype',$this->path);
        $this->ftype = $mytype; //if null... whole filename	
		$this->tellit = remote_paramload('STDOWNLOAD','tellit',$this->path);

	    $this->download_link = null;
	    $this->prpath = paramload('SHELL','prpath');
	    $this->urlpath = paramload('SHELL','urlpath').'/';  
        $this->ispublicdir = $public?$public:remote_paramload('STDOWNLOAD','public',$this->path);  

		$this->download_path = $path?$path:remote_paramload('STDOWNLOAD','dirsource',$this->path);
		//echo $this->download_path;

	    //$this->downloadpath = $this->prpath . paramload('STDOWNLOAD','dir2copy');            

	    //echo $this->path;
		$this->file_epithema = remote_paramload('STDOWNLOAD','epithema',$this->path); //"_shareware";  

        if ($this->ispublicdir) 
           $this->wherethefileis = $this->urlpath . $this->download_path;
        else
           $this->wherethefileis = $this->prpath . $this->download_path;
		
	    $this->title = localize('STDOWNLOAD_DPC',getlocal());	
			
	    $this->myfile = $name?$name:GetReq('g');		

		$m = remote_paramload('STDOWNLOAD','message',$this->path);	
		$ff = $this->prpath.$m;
		if (is_file($ff)) {
		  $this->message = file_get_contents($ff);
		}
		else
		  $this->message = $m; //plain text		
		  
		$m2 = remote_paramload('STDOWNLOAD','trymessage',$this->path);	
		$ff2 = $this->prpath.$m2;
		if (is_file($ff2)) {
		  $this->trymessage = file_get_contents($ff2);
		}
		else
		  $this->trymessage = $m2; //plain text				  		  
		  
		$m3 = remote_paramload('STDOWNLOAD','agreemessage',$this->path);	
		$ff3 = $this->prpath.$m3;
		if (is_file($ff3)) {
		  $this->agreemessage = file_get_contents($ff3);
		}
		else
		  $this->agreemessage = $m3; //plain text	
		  
		$m4 = remote_paramload('STDOWNLOAD','notagreemessage',$this->path);	
		$ff4 = $this->prpath.$m4;
		if (is_file($ff4)) {
		  $this->notagreemessage = file_get_contents($ff4);
		}
		else
		  $this->notagreemessage = $m4; //plain text			  		  		  
	}
	
    function event($event=null) {
		
		//echo GetParam("FormAction"), ">>>>>";		
				
		switch ($event) {
		  case 'I agree'        : $this->get_file($this->myfile,1); 
		                          //$this->send_downloaded_mail($this->product_id); moved to action
								  $this->send_thanks_mail($this->myfile);
								  break;
          //case 'instant'        : break;
		  case 'I don\'t agree' : break;
		  case 'stdownload'     :  		  
		  default               :
		}		
    }
  
    function action($action=null) { 
     $file = GetReq('g');	 
     $out = setNavigator($this->title,"<B>" . $this->file . "</B>") ;	  	 
	 
	   
	   switch ($action) {
	   
		 case 'I agree'        : //if ($this->download_link) {moved into downloads funcs
		                           //$out .= $this->agreemessage; 
                                 $template = paramload('SHELL','prpath') . "download_generic_thanks.tpl";
		                         $out .= file_get_contents($template); 
								   
		                         //$out .= $this->show_product_link($this->product_id);
								   
   								 //$out .= $this->httpdownload($this->product_id);
								   
								 /*$template = paramload('SHELL','prpath') . "requirments.tpl";
		                         $out .= file_get_contents($template); 
								 $template = paramload('SHELL','prpath') . "trial_support.tpl";
		                         $out .= file_get_contents($template); */								   
								 //}
								 break;
		 case 'I don\'t agree' : $out .= $this->notagreemessage; 
		                         break;
								 
		 //case 'instant'        : $out .= $this->instant_download($this->myfile);
		  //                       break;						 		   
	         case 'stdownload'     :
	     default :  if ($file) {
	                  if (GetReq('instant'))
	                    $out .= $this->instant_download($this->myfile);
	                  else    
	                   $out .= $this->termsform();  
	                }   
	   }
	 
	 
	 return ($out);
    } 
	
  function termsform($cmd=null,$yescmd=null,$nocmd=null) {

     $sFormErr = GetGlobal('sFormErr');
     $mycmd = $cmd?$cmd:null;	 
     $my_yescmd = $yescmd?$yescmd:"I agree";     
     $my_nocmd = $nocmd?$nocmd:"I don't agree";      
     $myaction = seturl($mycmd."&g=".$this->myfile);   	
	 
	 $ret .= "<table width='70%'  border='1' align='center' cellpadding='5' cellspacing='0' bordercolor='#666666'>";
     $ret .= "<tr><td align='center' valign='middle' bgcolor='#F9F9FF'>";	
	 
     $ret .= "<form method=\""."POST"."\" name=\""."Download"."\" action=\"".$myaction."\" style=\"margin: 0px;\">";	     
     $ret .= "<textarea cols=65"." rows=14"." name=\""."terms"."\"readonly>".
	         file_get_contents($this->prpath."terms_trial.txt") .
	         "</textarea><BR>";
			 
	 $ret .= "<input type=\"hidden\" name=\"FormName\" value=\"Download\">"; 	  
	 
         $ret .= "<input type=submit value=\"" . localize('_AGREE',getlocal()) . "\" onclick=\"document.forms('Download').FormAction.value = '$my_yescmd';\">";
	 $ret .= "&nbsp;";
	 $ret .= "<input type=submit value=\"" . localize('_DISAGREE',getlocal()) . "\" onclick=\"document.forms('Download').FormAction.value = '$my_nocmd';\">"; 
	 
	 $ret .= "<input type=\"hidden\" value=\"null\" name=\"FormAction\"/>";	 
	 	 
     $ret .= "</form></tr></table>";

 
     return ($ret);
  }
  
  
  function get_file($filepath,$instant=0) {
  
     $file = $this->wherethefileis. $filepath . $this->file_epithema . $this->ftype; 
	 //echo $file;  
     if ($instant) {
	 
	   if (file_exists($file)) { 	 
         $this->download_link = true;//bypass copy for intant download
		 //for httpdownload
		 //GetGlobal('controller')->calldpc_method('httpdownload.set_filename use '.$file);		 
	   }	 
	   else
	     $this->download_link = false;
		 
	   return $this->download_link;		 
	 }
	 else
	   echo "File not exist!";
  }
  
  function get_file_info($file) {
   
      $selected_file = $file;
	  
	  //read the attributes
      $actfile = paramload('SHELL','prpath') . "product_details" . ".ini";							
	  //echo $actfile;
	 
      if ($pdetails=@parse_ini_file($actfile,1)) {
         
		 //print_r($pdetails);
		 
		 $myfile = $pdetails[$selected_file];
		 
		 if (is_array($myfile)) {
		   		 
		   return $myfile['shareware_details'];
		 }
      }
	  
      return (false);	  
  }  
  
  
  function show_remote_file_link($file,$cmd=null) {
  
     $mycmd = $cmd?$cmd:'stdownload';
  
     if (is_readable($this->path.$file)) {
     
           $details = $this->get_file_info($file); 
	   
	   $a[] = seturl("t=$mycmd&instant=1&g=$file",$file);
	   $b[] = "left;50%;";
	   
	   $a[] = $details?$details:"&nbsp;";
	   $b[] = "left;50%;";		   
	   
	   $w = new window("Download " . $file,$a,$b);//$link);
	   $ret = $w->render();
	   unset($w);
	   

	 }
	 else {
		$m = remote_paramload('STDOWNLOAD','error',$this->path);	
		$ff = $this->prpath.$m;
		if (is_file($ff)) {
		  $ret = file_get_contents($ff);
		}
		else
		  $ret = $m; //plain text
	 }
	 
	 return $ret;
  }  
  
  //no need the file to be public
  function instant_download($file) {
  
       $file = $this->wherethefileis . $file . $this->file_epithema . $this->ftype;	   
       $downloadfile = new DOWNLOADFILE($file);
	   
       /*$this->tell_by_mail("demo file downloaded",
	                      'support@re-coding.com',
		                  'billy@re-coding.com',
						  $file);	
						  
         $this->tell_by_sms("$product_id demo file downloaded.");*/	
		 
	   //inform bt mail and sms
	   $this->send_downloaded_mail($file);					     
	   
       if (!$downloadfile->df_download()) {
	     //echo "Sorry, we are experiencing technical difficulties downloading this file. Please report this error to Technical Support.";	   	   
		$m = remote_paramload('STDOWNLOAD','error',$this->path);	
		$ff = $this->prpath.$m;
		if (is_file($ff)) {
		  $ret = file_get_contents($ff);
		}
		else
		  $ret = $m; //plain text		 
	   }
	   //else
	     // $ret = "OK";	
//	   }
//	   else
//	     $ret = "Prohibited area!"; 
		 	   
	   return ($ret);
	   
  }
  
  //test new download method
  function httpdownload($file) {
  
   	   //extra security set form must be filled as session param
	   //to prevent cmd instant download without it.
	   //if (GetSessionParam('FORMSUBMITED')) {//&&
	      //(GetGlobal('controller')->calldpc_method('httpdownload.get_filename'))) {	  

         $file = $this->wherethefileis . $file . $this->file_epithema . $this->ftype;	  
	   $title = $this->get_product_info($file);		   
  
  
       if ($this->download_link) {  
         //$d = new httpdownload($file);
	     //$ret = $d->select_download_type();	   
		 //$ret = GetGlobal('controller')->calldpc_method('httpdownload.select_download_type');
		 $ret = GetGlobal('controller')->calldpc_method('httpdownload.set_download use NRSPEED');
		 //infoem by mail and sms
		 $this->send_downloaded_mail($file);
	   }
	   else
	     $ret = "ERROR:file not exist!";	 
	   
	   $w = new window($title,"<h2>".$ret."</h2>");//$link);
	   $out = $w->render();
	   unset($w);	
	   /*}
	   else
	     $out = "Prohibited area!"; */ 
	   
	   return ($out);
  }
  
  function send_downloaded_mail($product,$user=null) {
  
       if ($this->tellit) {
  
		$thema = $product . " shareware downloaded";//"Re-coding technologies ";
		
		//$template = paramload('SHELL','prpath') . "buy_mail_thanks.tpl";
		$body = $product . " shareware downloaded!"; //file_get_contents($template);
				
		$this->tell_by_mail($thema,
		                    (isset($user)?$user:GetSessionParam('FORMMAIL')),
						    $this->tellit,
							$body);	
							
        $this->tell_by_sms($thema);								
	  }							  
  }
  
  function send_thanks_mail($file,$to) {
  
    if (GetSessionParam('FORMMAIL')) {
  
	    $thema = $this->thanks_from_subject ." ". $file;
		
	    $template = $this->path . "download_mail_thanks.tpl";
	    $body = file_get_contents($template);
				
	    $this->tell_by_mail($thema,
		                  $this->thanks_from_mail,
						  $to,
						  $body);	
    }						    
  }
  
  function tell_by_mail($subject,$from,$to,$body) {
         

         $smtpm = new smtpmail;
         $smtpm->to = $to; 
         $smtpm->from = $from; 
         $smtpm->subject = $subject;
         $smtpm->body = $body;
         $mailerror = $smtpm->smtpsend();
         unset($smtpm);	
		 
		 if ($mailerror) echo "Error sending mail! ($mailerror)";
		 return ($mailerror);   
  } 
  
  function tell_by_sms($message) {
	
	    if (defined('SMSGUI_DPC'))
	      $ret = GetGlobal('controller')->calldpc_method('smsgui.sendsms use '.$message);		
  }      
  
};
}
?>