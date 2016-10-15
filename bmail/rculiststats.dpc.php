<?php

$__DPCSEC['RCULISTSTATS_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("RCULISTSTATS_DPC")) && (seclevel('RCULISTSTATS_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("RCULISTSTATS_DPC",true);

$__DPC['RCULISTSTATS_DPC'] = 'rculiststats';

$__EVENTS['RCULISTSTATS_DPC'][0]='cpuliststats';
$__EVENTS['RCULISTSTATS_DPC'][1]='cpulframe';
$__EVENTS['RCULISTSTATS_DPC'][2]='cpsubscribe';
$__EVENTS['RCULISTSTATS_DPC'][3]='cpunsubscribe';
$__EVENTS['RCULISTSTATS_DPC'][4]='cpadvsubscribe';
$__EVENTS['RCULISTSTATS_DPC'][5]='cploadframe';
$__EVENTS['RCULISTSTATS_DPC'][6]='cpmailbodyshow';
$__EVENTS['RCULISTSTATS_DPC'][7]='cpviewsubsqueueactiv';
$__EVENTS['RCULISTSTATS_DPC'][8]='cpactivatequeuerec';
$__EVENTS['RCULISTSTATS_DPC'][9]='cpdeactivatequeuerec';
$__EVENTS['RCULISTSTATS_DPC'][10]='cpviewtrace';
$__EVENTS['RCULISTSTATS_DPC'][11]='cpviewclicks';

$__ACTIONS['RCULISTSTATS_DPC'][0]='cpuliststats';
$__ACTIONS['RCULISTSTATS_DPC'][1]='cpulframe';
$__ACTIONS['RCULISTSTATS_DPC'][2]='cpsubscribe';
$__ACTIONS['RCULISTSTATS_DPC'][3]='cpunsubscribe';
$__ACTIONS['RCULISTSTATS_DPC'][4]='cpadvsubscribe';
$__ACTIONS['RCULISTSTATS_DPC'][5]='cploadframe';
$__ACTIONS['RCULISTSTATS_DPC'][6]='cpmailbodyshow';
$__ACTIONS['RCULISTSTATS_DPC'][7]='cpviewsubsqueueactiv';
$__ACTIONS['RCULISTSTATS_DPC'][8]='cpactivatequeuerec';
$__ACTIONS['RCULISTSTATS_DPC'][9]='cpdeactivatequeuerec';
$__ACTIONS['RCULISTSTATS_DPC'][10]='cpviewtrace';
$__ACTIONS['RCULISTSTATS_DPC'][11]='cpviewclicks';

$__DPCATTR['RCULISTSTATS_DPC']['cpuliststats'] = 'cpuliststats,1,0,0,0,0,0,0,0,0,0,0,1';

$__LOCALE['RCULISTSTATS_DPC'][0]='RCULISTSTATS_DPC;Statistics;Στατιστική';
$__LOCALE['RCULISTSTATS_DPC'][1]='_viewallnotifications;View all notifications;Όλες οι ειδοποιήσεις';
/*
$__LOCALE['RCULISTSTATS_DPC'][2]='_MAILCAMPAIGNS;Mail campaigns;Αποστολές σε συνδρομητές';
$__LOCALE['RCULISTSTATS_DPC'][3]='_active;Active;Ενεργό';
$__LOCALE['RCULISTSTATS_DPC'][4]='_sender;Sender;Αποστολέας';
$__LOCALE['RCULISTSTATS_DPC'][5]='_receiver;Receiver;Παραλήπτης';
$__LOCALE['RCULISTSTATS_DPC'][6]='_reply;Views;Εμφανίσεις';
$__LOCALE['RCULISTSTATS_DPC'][7]='_subject;Subject;Θέμα';
$__LOCALE['RCULISTSTATS_DPC'][8]='_id;Id;Α/Α';
$__LOCALE['RCULISTSTATS_DPC'][9]='_MAILQUEUE;Mail list;Λίστα αποστολών';
$__LOCALE['RCULISTSTATS_DPC'][10]='_status;Status;Κατάσταση';
$__LOCALE['RCULISTSTATS_DPC'][11]='_cid;Campaign;Καμπάνια';
$__LOCALE['RCULISTSTATS_DPC'][12]='_MAILCLICKS;Responses;Ανταπόκριση';
$__LOCALE['RCULISTSTATS_DPC'][13]='_MAILTRACE;Actions;Ενέργειες';
$__LOCALE['RCULISTSTATS_DPC'][14]='_code;Item;Κωδικός';
$__LOCALE['RCULISTSTATS_DPC'][15]='_category;Category;Κατηγορία';
$__LOCALE['RCULISTSTATS_DPC'][16]='_mailstatus;Reason;Αιτία';
*/
class rculiststats  {

    var $title, $urlpath, $prpath, $seclevid, $userDemoIds;
	var $savehtmlpath, $cid, $messages, $stats, $cpStats, $owner, $cptemplate;

	public function __construct() {
		$GRX = GetGlobal('GRX');
		$this->title = localize('RCULISTSTATS_DPC',getlocal());
		$this->prpath = paramload('SHELL','prpath'); 
		$this->urlpath = paramload('SHELL','urlpath');

		$tmpl = remote_paramload('FRONTHTMLPAGE','cptemplate',$this->prpath);  
	    $this->cptemplate = $tmpl ? $tmpl : 'metro';		
		
		$tmplsavepath = remote_paramload('RCBULKMAIL','tmplsavepath', $this->prpath);
		$savepath = $tmplsavepath ? $tmplsavepath : null;//$defaultsavepath;
		$this->savehtmlpath = $savepath ? $this->urlpath . $savepath : null;		
		
		$this->seclevid = GetSessionParam('ADMINSecID');
		$this->userDemoIds = array(5,6,7); //remote_arrayload('RCBULKMAIL','demouser', $this->prpath);
		$this->owner = $_POST['Username'] ? $_POST['Username'] : GetSessionParam('LoginName'); //decode(GetSessionParam('UserName'));		
		
		$this->cid = $_GET['cid'] ? $_GET['cid'] : $_POST['cid'];
		
		$this->messages = array(); //reset messages any time page reload - local msg system
		$this->stats = array();
		$this->cpStats = false;			
	}

    public function event($event=null) {

		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;
		
		//set message (in actions, dpc call error)
		//_m("rccontrolpanel.setTask use info|test 123|1|#");						
		$this->percentofCamps();		//<<<<<<<<<<<<<<<<<<<<<<<<<<<??? use with new rccontrolpanel		

		switch ($event) {				
			
			case 'cpuliststats'  :
			default              :  //as first tme loged in stats must be calced at action
			                        //$this->load_graph_objects();
									//$this->runstats();                   
		}
    }

    public function action($action=null) {
		
		$login = $GLOBALS['LOGIN'] ? $GLOBALS['LOGIN'] : $_SESSION['LOGIN'];
		if ($login!='yes') return null;	

		switch ($action) {
			
			
						
			case 'cpuliststats'   	   :
			default          		   : //$this->load_graph_objects();
			                             $this->runstats();	
		}
		
		//when stats run (used by timeline fun call into breadcrumb)
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
	
	
	public function viewMessages($template=null) {
		if (empty($this->messages)) return;
	    $t = ($template!=null) ? $this->select_template($template) : null;
		
		foreach ($this->messages as $m=>$message) {
			if ($t) 	
				$ret .= $this->combine_tokens($t, array(0=>$message));
			else
				$ret .= "<option value=\"$m\">$message</option>";
		}
		return ($ret);
	}	
	
	protected function show_select_camp($name, $taction=null, $class=null) {
		$db = GetGlobal('db');		

		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'owner=' . $db->qstr($this->owner) . ' and ';			

		$sSQL = 'select cdate,cid,title from mailcamp where ' . $ownerSQL ;
		if ($text = GetParam('mail_text')) {
			$cid = md5($text . '|' . GetParam('subject') .'|'. GetParam('submail')); //when new post
			$sSQL .= " cid = " . $db->qstr($cid);	
			$sSQL .= GetParam('savecmp') ?  ' and active=1' : null; //temp camps without multiple selection
		}
        else {		
		    $choose = "<option value=\"\">Select...</option>";
			$sSQL .= " active=1";
		}	
		$sSQL .= " ORDER BY cdate desc";

        $mycid = $cid ? $cid : $this->cid; /*new post or load camp request */ 		

		//echo $sSQL;	
	    $resultset = $db->Execute($sSQL,2);	
	
		$url = ($taction) ? seturl('t='.$taction.'&cid=',null,null,null,null) : 
		                    seturl('t=cpviewcamp&cid=',null,null,null,null);
		
	 
		$ret .= "<select name=\"$name\" onChange=\"location=this.options[this.selectedIndex].value\" $class>"; 
		$ret .= $choose ? $choose : null; //"<option value=\"\">Select...</option>";
		//print_r($resultset);
		
		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {
			$selection = ($rec[1] == $mycid) ? " selected" : null;
			$ret .= "<option value='".$url . $rec[1]."' $selection >". $rec[2]."</option>" ;
        }		
		$ret .= "</select>";			    	
		       
	    return ($ret);		
	}		

    public function campaignSelect($action=null) {

		$ret = $this->show_select_camp('campaign', $action, 'class="span6 chzn-select" data-placeholder="Choose a Category" tabindex="1"');		
		return ($ret);
	}		
	
	
	
	public function runSql($name, $sql, $retasis=false) {
		$db = GetGlobal('db');			
		if (!$sql) return 0;
		$resultset = $db->Execute($sql,2);
		
		if ($retasis==false) { //save in stats and return int
			$this->stats[$name]['value'] = $resultset->fields[0];	
			return intval($resultset->fields[0]); 	
		}
		
		return ($resultset->fields[0]);
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
        else {
			//$dateSQL = null; 
			
			//always this year by default
			$mstart = '01'; $mend = '12';
			$y = date('Y');
			if ($istimestamp)
				$dateSQL = $sqland . " DATE($fieldname) BETWEEN '$y-$mstart-01' AND '$y-$mend-31'";
			else
				$dateSQL = $sqland . " $fieldname BETWEEN '$y-$mstart-01' AND '$y-$mend-31'";	
            //echo $dateSQL;			
		}	
		
		return ($dateSQL);
	}
	
	protected function runstats() {
		$db = GetGlobal('db');
		
		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : ' and owner=' . $db->qstr($this->owner);		
		
		if ($this->cid) $sSQLcid = " and cid=" . $db->qstr($this->cid); 
		else $sSQLcid=null;
		
		$timein = $this->sqlDateRange('timein', true, true);

		$sSQL = "select count(id) from ulists where active=1";		
		$this->runSql('activeSubscribers', $sSQL);		
		$sSQL = "select count(id) from ulists where active=0";		
		$this->runSql('inactiveSubscribers', $sSQL);	
		$sSQL = "select count(id) from ulists";	
		//echo $sSQL;
		$ts = $this->runSql('totalSubscribers', $sSQL);		
		//echo $ts;
		$sSQL = "select count(id) from mailqueue where active=1" . $ownerSQL .$sSQLcid ;		
		$this->runSql('activeQueue', $sSQL);		
		$sSQL = "select count(id) from mailqueue where active=0" . $ownerSQL . $timein . $sSQLcid ;		
		$this->runSql('inactiveQueue', $sSQL);
		
		$sSQL = "select count(id) from mailqueue";	
		//$tq = $this->runSql('totalQueue', $sSQL); //all			
		if ($timein) $sSQL .= " where " . $this->sqlDateRange('timein', true); //where
		if ($this->cid) $sSQL .= ($timein) ? " and cid=" . $db->qstr($this->cid) :
		   							         " where cid=" . $db->qstr($this->cid);//where			
		if ($ownerSQL) $sSQL .= ($timein) ? $ownerSQL : ($this->cid ? $ownerSQL : str_replace('and','where',$ownerSQL));									 
		$tq = $this->runSql('totalQueue', $sSQL); 		
		
		$sSQL = "select sum(reply) from mailqueue where status>0 and active=0" . $ownerSQL . $timein . $sSQLcid ;	
		$this->runSql('repliedQueue', $sSQL);			
		$sSQL = "select count(id) from mailqueue where status>0 and active=0" . $ownerSQL . $timein . $sSQLcid;  //on sent mails (active=0)	
		$sc = $this->runSql('succeed', $sSQL);
		$sSQL = "select count(id) from mailqueue where status IS NULL and active=0" . $ownerSQL . $timein . $sSQLcid;  //on sent mails (active=0)		
		$ul = $this->runSql('unread', $sSQL);	
		$sSQL = "select count(id) from mailqueue where status=-1 and active=0" . $ownerSQL . $timein . $sSQLcid;  //on sent mails (active=0)		
		$bl = $this->runSql('badmail', $sSQL);			
		$sSQL = "select count(id) from mailqueue where status=-2 and active=0" . $ownerSQL . $timein . $sSQLcid;  //on sent mails (active=0)		
		$fl = $this->runSql('bounced', $sSQL);			
		$sSQL = "select count(id) from mailqueue where active=1" . $ownerSQL . $timein . $sSQLcid;  //on sent mails (active=0)		
		$sl = $this->runSql('notsentyet', $sSQL);			
				
		$sSQL = "SELECT COUNT(id) FROM mailcamp";	
		$sSQL.= $ownerSQL ? str_replace('and','where',$ownerSQL) : null;
		$this->runSql('campaigns', $sSQL);		
		$sSQL = "SELECT COUNT( DISTINCT (subject) ) FROM mailqueue";
		$sSQL.= $ownerSQL ? str_replace('and','where',$ownerSQL) : null;	
		$this->runSql('usedCampaigns', $sSQL);		
		$sSQL = "SELECT COUNT( DISTINCT (subject) ) FROM mailqueue where active=1" . $ownerSQL;	
		$this->runSql('runningCampaigns', $sSQL);

		//percent of sends and replies (uniques=status)
		$rpercent = round($sc*100/$tq);
		$this->stats['percentSucceed']['value'] = intval($rpercent);

		//percent of unread sents
		$upercent = round($ul*100/$tq);
		$this->stats['percentUnread']['value'] = intval($upercent);	
		
		//percent of failed sents
		$this->stats['failed']['value'] = $bl + $fl;	
		$fpercent = round(($bl+$fl)*100/$tq);
		$this->stats['percentFailed']['value'] = intval($fpercent);		

		//percent of have to sent
		$spercent = round($sl*100/$tq);
		$this->stats['percentUnsend']['value'] = intval($spercent);			

		if ($this->cid) {
			$sSQL = "SELECT bcc FROM mailcamp WHERE cid=" . $db->qstr($this->cid) . $ownerSQL;	
			$bcc = $this->runSql(null, $sSQL, true);	
            $subs = explode(';', $bcc);
   			$this->stats['totalSubscribers']['value'] = count($subs);  //overwrite after calc if cid
			//echo $sSQL;
		}		
							
		//print_r($this->stats);							
        $this->messages[] = 'Stats completed.';
		return true;
	}
	
	public function getStats($section=null, $subsection=null) {
		if (!$section) return 0;
		$sb = $subsection ? $subsection : 'value';
		$n = intval($this->stats[$section][$sb]);
		
		return (number_format($n,0,',','.'));
	}	
	
	public function isStats() {
		return (!empty($this->stats) ? true : false);
	}
	
	/* % of process of active camps*/
	public function percentofCamps($template=null) {
		$db = GetGlobal('db');			
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		//get params also here due to fp call for rccontrol panel (login 1st)
		$this->owner = $_POST['Username'] ? $_POST['Username'] : GetSessionParam('LoginName'); //decode(GetSessionParam('UserName'));	
		$this->seclevid = GetSessionParam('ADMINSecID');			
		
		//all as 9 user or only owned		
		$ownerSQL = ($this->seclevid==9) ? null : 'WHERE owner=' . $db->qstr($this->owner);	
		$timein = ($ownerSQL) ? $this->sqlDateRange('timein', true, true) : 
							    $this->sqlDateRange('timein', true, false);
		$dateRangeSQL = $timein ? (($ownerSQL) ? $timein : 'WHERE ' . $timein) : null;
		
		$sSQL = "SELECT cid,subject,AVG(active),MIN(timein),MAX(timein) AS a FROM mailqueue $ownerSQL $dateRangeSQL group by cid,subject order by a desc";
		$resultset = $db->Execute($sSQL,2);
		//echo $sSQL, $resultset->fields[1];
		
		if (empty($resultset->fields)) return null;
		foreach ($resultset as $n=>$rec) {
		    if ($rec[2] > 0) { //float avg of actives (else must be 0)

					$percent = (100-intval($rec[2]*100));
					
					if ($t) {
						$tokens[] = $rec[0];
						$tokens[] = $rec[1];
						$tokens[] = $percent;
						$tokens[] = $rec[3];
						$tokens[] = '...'; //$rec[4];
						$ret .= $this->combine_tokens($t, $tokens);
						unset($tokens);
					}
					else { 
						//send message 
						$mt = seturl('t=cppreviewcamp&cid='.$rec[0]);
						_m("rccontrolpanel.setTask use danger|$rec[1]|$percent|$mt");
					}	
			}	
		}

		return ($ret);	
	}		
	
	/* % of process of last deactived camps*/
	public function lastCamps($template=null, $limit=null) {
		$db = GetGlobal('db');		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		//get params also here due to fp call for rccontrol panel (login 1st)
		$this->owner = $_POST['Username'] ? $_POST['Username'] : GetSessionParam('LoginName'); 
		$this->seclevid = GetSessionParam('ADMINSecID');			
		
		//all as 9 user or only owned	
		$ownerSQL = ($this->seclevid==9) ? null : 'WHERE owner=' . $db->qstr($this->owner); 
		$timein = ($ownerSQL) ? $this->sqlDateRange('timein', true, true) : 
							    $this->sqlDateRange('timein', true, false);
		$dateRangeSQL = $timein ? (($ownerSQL) ? $timein : 'WHERE ' . $timein) : null;
		
		$l = $limit ? $limit : 3;	
        $limitSQL = $limit ? 'LIMIT '.$l : 'LIMIT 3'; 	
		
		$sSQL = "SELECT cid,subject,AVG(active),MIN(timeout),MAX(timeout) AS a FROM mailqueue $ownerSQL $dateRangeSQL GROUP BY cid,subject ORDER BY a DESC ".$limitSQL;
		//echo $sSQL;
		$resultset = $db->Execute($sSQL,2);
		
		if (empty($resultset->fields)) return null;
		foreach ($resultset as $n=>$rec) {
		    if ($rec[2] == 0) { //float avg of actives (must be 0)
				if ($t) {
					$tokens[] = $rec[0];
					$tokens[] = $rec[1];
					$tokens[] = (100-intval($rec[2]*100));
					$tokens[] = $rec[3];
					$tokens[] = $rec[4];					
					$ret .= $this->combine_tokens($t, $tokens);
					unset($tokens);
				}
				else
					$ret[] = $rec[1]; //?? no mean
			}	
		}

		return ($ret);	
	}	
	
	/* % of process of all the same cid camps (instances = replayed)*/
	public function instanceCamps($template=null, $limit=null) {
		if (!$cid = $_GET['cid']) return false;
		$db = GetGlobal('db');			
		$l = $limit ? $limit : 5;
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		$sSQL = "SELECT cid,subject, AVG(active),MIN(timeout),MAX(timeout) AS a FROM  mailqueue where cid='$cid' GROUP BY subject ORDER BY a DESC LIMIT ".$l;
		$resultset = $db->Execute($sSQL,2);
		//echo $sSQL;
		foreach ($resultset as $n=>$rec) {
		    //if ($rec[2] == 0) { //float avg of actives (else must be 0)
				if ($t) {
					$tokens[] = $rec[0];
					$tokens[] = $rec[1];
					$tokens[] = (100-intval($rec[2]*100));
					$tokens[] = $rec[3];
					$tokens[] = $rec[4];						
					$ret .= $this->combine_tokens($t, $tokens);
					unset($tokens);
				}
				else
					$ret[] = $rec[1]; //?? no mean
			//}	
		}

		return ($ret);	
	}	
	
	public function getViews($template=null, $limit=null) {
		$db = GetGlobal('db');	
		$l = $limit ? $limit : 5;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;	
		
		if ((defined('CRMFORMS_DPC')) && ($this->isCrmUser())) {
			$template = 'crm-' . $template;
			$crm = true;
		}
		else
			$crm = false;
		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		$refsql = $cid ? "and mailqueue.cid='$cid'" : null;		
		
		//all as 9 user or only owned
		$ownerSQL = ($this->seclevid==9) ? null : 'and mailcamp.owner=' . $db->qstr($this->owner); 		
		
		$sSQL = "SELECT mailqueue.id,timeout,receiver,title FROM mailqueue,mailcamp where mailqueue.cid=mailcamp.cid $refsql $ownerSQL and mailqueue.active=0 and status=1 order by mailqueue.id desc LIMIT " . $l;
		//echo $sSQL;
		$resultset = $db->Execute($sSQL,2);
		
		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {
			$tokens[] = $rec[1] . ' '. $rec[3];
			$tokens[] = $crm ?	_m("crmforms.formsMenu use ".$rec[2]."+crmdoc") : $rec[2];
			
			$ret .= $this->combine_tokens($t, $tokens);
			unset($tokens);	
		}

		return ($ret);			
	}	
	
	public function getMailBounce($template=null, $limit=null) {
		$db = GetGlobal('db');	
		$l = $limit ? $limit : 5;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		$refsql = $cid ? "and mailqueue.cid='$cid'" : null;
				
		//all as 9 user or only owned
		$ownerSQL = ($this->seclevid==9) ? null : 'and mailcamp.owner=' . $db->qstr($this->owner); 		
		
		$sSQL = "SELECT mailqueue.id,timeout,receiver,title FROM mailqueue,mailcamp where mailqueue.cid=mailcamp.cid $refsql $ownerSQL and mailqueue.active=0 and status<0 order by mailqueue.id desc LIMIT " . $l;
		//echo $sSQL;
		$resultset = $db->Execute($sSQL,2);
		
		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {
			$tokens[] = $rec[1] . ' '. $rec[3];
			$tokens[] = $rec[2];
			$ret .= $this->combine_tokens($t, $tokens);
			unset($tokens);	
		}

		return ($ret);			
	}	
	
	public function getClicks($template=null, $limit=null) {
		$db = GetGlobal('db');	
		$l = $limit ? $limit : 5;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;	
		
		if ((defined('CRMFORMS_DPC')) && ($this->isCrmUser())) {
			$template = 'crm-' . $template;
			$crm = true;
		}
		else
			$crm = false;
		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		//$timein = $this->sqlDateRange('timein', true, false);
		//if ($timein) return null; //no current tasks when time range
		$refsql = $cid ? "and ref='$cid'" : null;
		
		//all as 9 user or only owned	
		$ownerSQL = ($this->seclevid==9) ? null : 'and mailcamp.owner=' . $db->qstr($this->owner); 		
		
		//$sSQL = "SELECT stats.id,date,attr3,title FROM stats,mailcamp where stats.ref=mailcamp.cid $refsql order by date desc LIMIT " . $l;
		$sSQL = "SELECT stats.id,date,attr3,title FROM stats,mailcamp where stats.ref=mailcamp.cid $refsql $ownerSQL order by stats.id desc LIMIT " . $l;
		//echo $sSQL;
		$resultset = $db->Execute($sSQL,2);
		
		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {
			$tokens[] = $rec[1] . ' '. $rec[3];
			$tokens[] = $crm ?	_m("crmforms.formsMenu use ".$rec[2]."+crmdoc") : $rec[2];
			
			$ret .= $this->combine_tokens($t, $tokens);
			unset($tokens);	
		}

		return ($ret);			
	}
	
	public function getClicksAll($template=null, $limit=null) {
		$db = GetGlobal('db');	
		$l = $limit ? $limit : 50;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		$sSQL = "SELECT stats.id,date,attr3,title,ref FROM stats,mailcamp where stats.ref=mailcamp.cid group by ref order by date desc LIMIT " . $l;
		$resultset = $db->Execute($sSQL,2);
		
		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {
			$tokens[] = $rec[1] . ' '. $rec[3];
			$tokens[] = $rec[2];
			$ret .= $this->combine_tokens($t, $tokens);
			unset($tokens);
		}

		return ($ret);	
	}	

	/*unsubscribers 1 month before*/
	public function getUnsubs($template=null, $limit=null) {
		$db = GetGlobal('db');	
		$l = $limit ? $limit : 5;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		//$timein = $this->sqlDateRange('timein', true, false);
		//if ($timein) return null; //no current tasks when time range
		$refsql = null; //$cid ? "and ref='$cid'" : null;
		
		//all as 9 user or only owned
		$ownerSQL = ($this->seclevid==9) ? null : null;//'and ulists.owner=' . $db->qstr($this->owner); 		
		
		$lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
		
		$sSQL = "SELECT datein,listname,email FROM ulists where active=0 and (datein>$lastmonth) $refsql $ownerSQL order by datein desc LIMIT " . $l;
		$resultset = $db->Execute($sSQL,2);

		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {
			$tokens[] = date('d-m-Y G:i',strtotime($rec[0])) . ' '. $rec[1];
			$tokens[] = $rec[2];
			$ret .= $this->combine_tokens($t, $tokens);
			unset($tokens);	
		}

		return ($ret);			
	}	
	
	/*unsubscribers today as cp messages */
	public function getUnsubsToday($template=null, $limit=null) {
		$db = GetGlobal('db');	
		$l = $limit ? $limit : 5;
		$cid = $_GET['cid'] ? $_GET['cid'] : null;		
		$t = ($template!=null) ? $this->select_template($template) : null;
		$tokens = array();
		
		//$timein = $this->sqlDateRange('timein', true, false);
		//if ($timein) return null; //no current tasks when time range
		$refsql = null; //$cid ? "and ref='$cid'" : null;
		
		//all as 9 user or only owned
		$ownerSQL = ($this->seclevid==9) ? null : null;//'and ulists.owner=' . $db->qstr($this->owner); 		
		
		$lastday = mktime(0, 0, 0, date("m"), date("d")-1,   date("Y"));
		$text = localize('_outoflist',getlocal());
		
		$sSQL = "SELECT datein,listname,email FROM ulists where active=0 and (datein>$lastday) $refsql $ownerSQL order by datein desc LIMIT " . $l;
		$resultset = $db->Execute($sSQL,2);
		
		if (empty($resultset)) return null;
		foreach ($resultset as $n=>$rec) {

			$msg = "warning|" . $rec[2] .", ". $text .' '. $rec[1] . " (" .date("d-m-Y G:i", strtotime($rec[0])). ")";
			_m("rccontrolpanel.setMessage use ".$msg);
		}

		return ($ret);			
	}	
	
	//load graphs urls to call DISABLED
	/*protected function load_graph_objects() {
			  
        $this->objcall['mailqueue'] = seturl('t=cpchartshow&group='.GetReq('group').'&ai=1&report=mailqueue&statsid=');

	}	
	
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
    }*/

    public function select_timeline($template,$year=null, $month=null) {
		$year = GetParam('year') ? GetParam('year') : date('Y'); 
	    $month = GetParam('month') ? GetParam('month') : date('m');
		$daterange = GetParam('rdate');
		
		$t = ($template!=null) ? $this->select_template($template) : null;		
	    if ($t) {
			for ($y=2015;$y<=intval(date('Y'));$y++) {
				$yearsli .= '<li>'. seturl('t=cpmailstats&month='.$month.'&year='.$y, $y) .'</li>';
			}
		
			for ($m=1;$m<=12;$m++) {
				$mm = sprintf('%02d',$m);
				$monthsli .= '<li>' . seturl('t=cpmailstats&month='.$mm.'&year='.$year, $mm) .'</li>';
			}	  
	  
	        $posteddaterange = $daterange ? ' > ' . $daterange : ($year ? ' > ' . $month . ' ' . $year : null) ;
	  
			$tokens[] = localize('RCULISTSTATS_DPC',getlocal()) . $posteddaterange; 
			$tokens[] = $year;
			$tokens[] = $month;
			$tokens[] = localize('_year',getlocal());
			$tokens[] = $yearsli;
			$tokens[] = localize('_month',getlocal());			
			$tokens[] = $monthsli;	
            $tokens[] = $daterange;			
		
			$ret = $this->combine_tokens($t, $tokens); 				
     
			return ($ret);
		}
		
		return null;	
    }	  
	
	protected function nformat($n, $dec=0) {
		return (number_format($n,$dec,',','.'));
	}		

	protected function select_template($tfile=null) {
		if (!$tfile) return;
	  
		$template = $tfile . '.htm';	
		$t = $this->prpath . 'html/'. $this->cptemplate .'/'. str_replace('.',getlocal().'.',$template) ;   
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