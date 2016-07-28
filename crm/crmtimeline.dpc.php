<?php
$__DPCSEC['CRMTIMELINE_DPC']='1;1;1;1;1;1;1;1;1;1;1';

if ((!defined("CRMTIMELINE_DPC")) && (seclevel('CRMTIMELINE_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("CRMTIMELINE_DPC",true);

$__DPC['CRMTIMELINE_DPC'] = 'crmtimeline';

$b = GetGlobal('controller')->require_dpc('crm/crmmodule.dpc.php');
require_once($b);

$__LOCALE['CRMTIMELINE_DPC'][0]='CRMTIMELINE_DPC;Timeline;Χρονοροή';
$__LOCALE['CRMTIMELINE_DPC'][1]='_date;Date;Ημερ.';
$__LOCALE['CRMTIMELINE_DPC'][2]='_time;Time;Ώρα';
$__LOCALE['CRMTIMELINE_DPC'][3]='_status;Status;Κατάσταση';
$__LOCALE['CRMTIMELINE_DPC'][4]='_views;Views;Ιστορικό επισκέψεων';
$__LOCALE['CRMTIMELINE_DPC'][5]='_actions;Actions;Επιλογές';
$__LOCALE['CRMTIMELINE_DPC'][6]='_itemin;Item viewed;Προβολή είδους';
$__LOCALE['CRMTIMELINE_DPC'][7]='_categorin;Category viewed;Προβολή κατηγορίας';
$__LOCALE['CRMTIMELINE_DPC'][8]='_searchin;Search;Αναζήτηση';
$__LOCALE['CRMTIMELINE_DPC'][9]='_cartin;In cart;Προσθήκη στο καλάθι';
$__LOCALE['CRMTIMELINE_DPC'][10]='_cartout;Out from cartcid;Αφαίρεση απο το καλάθι';
$__LOCALE['CRMTIMELINE_DPC'][11]='_checkout;Purchase;Αγορά';
$__LOCALE['CRMTIMELINE_DPC'][12]='_filters;Filter;Φίλτρο';
$__LOCALE['CRMTIMELINE_DPC'][13]='_allin;All;Όλα';
$__LOCALE['CRMTIMELINE_DPC'][14]='_filterin;Select filter;Φίλτρο προβολής';
$__LOCALE['CRMTIMELINE_DPC'][15]='_button;More;Περισσότερα';
$__LOCALE['CRMTIMELINE_DPC'][16]='_details;Details;Λεπτομέριες';
$__LOCALE['CRMTIMELINE_DPC'][17]='_view;Views;Προβολές';
$__LOCALE['CRMTIMELINE_DPC'][18]='_favorites;Recommended;Προτιμήσεις';
$__LOCALE['CRMTIMELINE_DPC'][19]='_addfav;Add recommendation;Προσθήκη προτίμησης';
$__LOCALE['CRMTIMELINE_DPC'][20]='_remfav;Remove recommendation;Αφαίρεση προτίμησης';
$__LOCALE['CRMTIMELINE_DPC'][21]='_purchases;Purchaces;Αγορές ειδών';
$__LOCALE['CRMTIMELINE_DPC'][22]='_viewpage;View;Προβολή';
$__LOCALE['CRMTIMELINE_DPC'][23]='_reference;Reference;Πηγή';
$__LOCALE['CRMTIMELINE_DPC'][24]='_addoffer;Οffer recommendation;Είδος προσφοράς';
$__LOCALE['CRMTIMELINE_DPC'][25]='_addcoll;Add in collection;Είδος συλλογής';

class crmtimeline extends crmmodule  {
	
	var $url;
		
	function __construct() {
	
		crmmodule::__construct();
	  
		$murl = arrayload('SHELL','ip');
        $this->url = (!empty($murl)) ? $murl[0] : paramload('SHELL','urlbase');
	}

	public function timeline_grid($width=null, $height=null, $rows=null, $mode=null, $noctrl=false) {
	    $selected = urldecode(GetReq('id'));
		
	    $height = $height ? $height : 800;
        $rows = $rows ? $rows : 36;
        $width = $width ? $width : null; //wide	
		$mode = $mode ? $mode : 'd';
		$noctrl = $noctrl ? 0 : 1;	
	    $lan = getlocal() ? getlocal() : 0;  
		$title = localize('CRMTIMELINE_DPC',getlocal()); // .'_'. str_replace('@','AT',$selected_cus); 
	
	    if (defined('MYGRID_DPC')) {
			
			$xSQL2 = "select id,date,email from cform where email='$selected'";	
		
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+id|".localize('_id',getlocal())."|2|0");
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+date|".localize('_date',getlocal())."|link|10|"."javascript:showdetails({id});".'||');
			GetGlobal('controller')->calldpc_method("mygrid.column use grid1+email|".localize('_email',getlocal())."|5|0|");
			
			$ret .= GetGlobal('controller')->calldpc_method("mygrid.grid use grid1+cform+$xSQL2+$mode+$title+id+$noctrl+1+$rows+$height+$width+1+1+1");

	    }
		else 
		   $ret .= 'Initialize jqgrid.';
        
        return ($ret);
  	
	}	
		
	public function showdetails($data=null) {
		
		//return ("details:" . $data);
		
	    $bodyurl = 'cpform.php?t=cpviewsubmitedform&id='.$data; 
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"350px\"><p>Your browser does not support iframes</p></iframe>";      

		return ($frame);		
	}	
	
	protected function loadframe($ajaxdiv=null) {
		$id = GetParam('id');
		$cmd = 'cpcrm.php?t=cpcrmshowusr&id='. $id . '&iframe=1';
		$bodyurl = $cmd; //seturl("t=$cmd&iframe=1");
	
		$frame = "<iframe src =\"$bodyurl\" width=\"100%\" height=\"520px\"><p>Your browser does not support iframes</p></iframe>";    

		if ($ajaxdiv)
			return $ajaxdiv. '|' . $frame;
		else
			return ($frame); 
	}	
	
	
	public function showTimeline($template=null, $color=null, $icon=null, $time=null) {
		$db = GetGlobal('db');
		$c = $color ? $color : 'gray';
		$ic = $icon ? $icon : 'icon-time';
		$time = $time ? $time : date('Y-m-d H:i');
		$mode = GetReq('mode');
		
		if ($v = GetParam('v')) {
			if (strstr($v,'|')) list ($visitor, $visitorIP) = explode('|', $v);
			else $visitor = $v;	
		}
		else 
			return;			

		$timein = GetGlobal('controller')->calldpc_method('rccontrolpanel.sqlDateRange use date+1+1');

		if ($visitorIP) $iSQL = " REMOTE_ADDR=" . $db->qstr($visitorIP);		
		if (($visitor) && filter_var($visitor, FILTER_VALIDATE_EMAIL))
			$vSQL = "(attr2=" . $db->qstr($visitor) . " or attr3=" . $db->qstr($visitor) . ($iSQL ? " or " . $iSQL : null) . ")"; 
		elseif (($visitor) && filter_var($visitor, FILTER_VALIDATE_IP))
			$vSQL = " REMOTE_ADDR=" . $db->qstr($visitor);
		else 
			$vSQL = $iSQL ? $iSQL : null;				
				

		$sSQL = "select DATE_FORMAT(date, '%d-%m-%Y %H:%i') as datetime, DATE_FORMAT(date, '%d-%m-%Y') as date, DATE_FORMAT(date, '%H:%i') as time, tid, attr1, attr2, attr3, ref, REMOTE_ADDR from stats where ";				
		switch ($mode) {
			case 1  : $sSQL .= "tid IS NOT NULL AND tid NOT REGEXP 'search|filter' AND attr1 IS NULL AND "; break;
			case 2  : $sSQL .= "attr1 IS NOT NULL AND attr1 NOT REGEXP 'cartin|cartout|checkout' AND tid IS NULL AND "; break;
			case 3  : $sSQL .= "tid='search' AND "; break;
			case 4  : $sSQL .= "tid='filter' AND "; break;
			case 5  : $sSQL .= "attr1='cartin' AND "; break;			
			case 6  : $sSQL .= "attr1='cartout' AND "; break;			
			case 7  : $sSQL .= "attr1='checkout' AND "; break;			
			case 0  :
			default : $sSQL .= ""; 
		}
		$sSQL.= $vSQL . $timein;
		$sSQL.= " order by id desc LIMIT 100";
		//echo $sSQL;
		$result = $db->Execute($sSQL);	
			
		if ($result) {
			$t = GetGlobal('controller')->calldpc_method('rccontrolpanel.select_template use '.$template);
				
			$meter = 0;	
			
			foreach ($result as $i=>$rec) {
				$item = null;
				$link = null;
				$details = null;
				$itemcode = null;
				
				switch ($rec['tid']) {
					case 'search' : $c = 'orange'; 
									$title = localize('_searchin', getlocal()); 
					                $item = $rec['attr1']; 
									$link = $this->url . "/search/{$rec['attr1']}/";
									break;
					case 'filter' : $c = 'blue'; 
									$title = localize('_filter', getlocal());	
					                $item = $rec['attr1']; 
									$link = $this->url . "/filter/{$rec['attr1']}/";
									break;
					default       : if ($itemcode = $rec['tid']) {
										$c = 'purple'; 
										$title = localize('_itemin', getlocal());
										$item = $rec['tid'] . ' ' . GetGlobal('controller')->calldpc_method('rccontrolpanel.getItemName use '.$rec['tid']);
										$link = $this->url . "/kshow/0/0/{$rec['tid']}/"; //seturl('t=kshow&id='.$rec['tid']);
									}	
					
					                switch ($rec['attr1']) {
										case 'cartin'  : $c = 'green'; 
														 $title = localize('_cartin', getlocal());
										                 $item = $rec['tid'] . ' ' . GetGlobal('controller')->calldpc_method('rccontrolpanel.getItemName use '.$rec['tid']); 
														 $link = $this->url . "/kshow/0/0/{$rec['tid']}/";
														 break;
										case 'cartout' : $c = 'red';   
										                 $title = localize('_cartout', getlocal());
										                 $item = $rec['tid'] . ' ' . GetGlobal('controller')->calldpc_method('rccontrolpanel.getItemName use '.$rec['tid']); 
														 $link = $this->url . "/kshow/0/0/{$rec['tid']}/";
														 break;
										case 'checkout': $c = 'gray';  
										                 $title = localize('_checkout', getlocal());
										                 $item = $rec['tid'] . ' ' . GetGlobal('controller')->calldpc_method('rccontrolpanel.getItemName use '.$rec['tid']); break;
														 $link = $this->url . "/kshow/0/0/{$rec['tid']}/";
										default        : if ($rec['attr1']) {
															$c = 'yellow'; 
															$title = localize('_categorin', getlocal());
															$item = str_replace('_', ' ', $rec['attr1']);
															$link = $this->url . "/klist/{$rec['attr1']}/"; //seturl('t=klist&cat='.$rec['attr1']);
										                 }	
					                } 
				}
				
				
				//common for all
				if ((defined('CRMFORMS_DPC')) && (filter_var($visitor, FILTER_VALIDATE_EMAIL)))
					$details =	GetGlobal('controller')->calldpc_method("crmforms.formsMenu use ".$visitor."+crmdoc") . "&nbsp;";
					
				//if link	
				if ($link) {
					//$ulink = base64_encode(urlencode($link.'|300')); //height 300				
					//$details = $this->actionButton(localize('_view', getlocal()), "javascript:$('#urldetails{$meter}').load('cpcrmtrace.php?t=cpcrmframe&url={$ulink}');", null, true);				
					
					$ulink = (strstr($link, 'http://')) ? $link : 'http://' . $link;
					$details .= $this->actionButton(localize('_viewpage', getlocal()), $ulink, null, true);	
				}	
				
				//if itemcode
				if (($itemcode) && (filter_var($visitor, FILTER_VALIDATE_EMAIL))) {
					//not ip based client and itemcode
					//$ulink = $this->makeCrmURL("cpcrm.php?t=cpcrmdetails&iframe=1&id=$visitor&module=wishfav",300); //height 300
					//$details .= $this->actionButton(localize('_details', getlocal()), "javascript:$('#urldetails{$meter}').load('cpcrmtrace.php?t=cpcrmframe&url={$ulink}');");//, 'crmdetails'.$meter);
					$details .= $this->timelineMenu($visitor, $meter, $itemcode);	
				}
				//else	
					$details .= $rec['attr3'] ? localize('_reference', getlocal()).':' . GetGlobal('controller')->calldpc_method('rccontrolpanel.getRefName use '.$rec['ref']) .' ('.$rec['REMOTE_ADDR']. ')' : ' ip:' . $rec['REMOTE_ADDR'];
				
				$details .= "<div id=\"urldetails{$meter}\"></div>"; //last (common)
								
				$tokens = array($c, $ic, $rec['datetime'], $rec['date'], $rec['time'], $title, $item, $details);//, $div); 
				
				if ($template)
					$ret .= $this->combine_tokens($t, $tokens);
				else
					$ret[] = $tokens;	
				
				$meter+=1;
			}	
		}	
		
		return ($ret);
	}	
	
	protected function makeCrmURL($url, $frameheight=null) {
		if (!$url) return false;
		$h = $frameheight ? "|$frameheight" : null; //"|300";
		$ulink = base64_encode(urlencode($url.$h));
		return ($ulink);
	}

	protected function actionButton($title=null, $href=null, $div=null, $targetblank=false) {
		$t = $title ? $title : localize('_button', getlocal());
		$hf = $href ? $href : '#';
		$tb = $targetblank ? " target='_blanc' " : null;
		$ret = "<a class=\"btn\" href=\"$hf\" $tb>$t <i class=\"icon-circle-arrow-right\"></i></a>&nbsp;";
		if ($div)
			$ret .= "<div id=\"$div\"></div>";
		
		return ($ret);
	}
	
	protected function timelineMenu($visitor, $meter=0, $itemcode=null) {
		$l = getlocal();
		
		$links = array(localize('_views',     $l)=>"javascript:$('#urldetails{$meter}').load('cpcrmtrace.php?t=cpcrmframe&url=".$this->makeCrmURL("cpcrm.php?t=cpcrmdetails&iframe=1&id={$visitor}&module=itemstats", 450)."');",
					   localize('_purchases', $l)=>"javascript:$('#urldetails{$meter}').load('cpcrmtrace.php?t=cpcrmframe&url=".$this->makeCrmURL("cpcrm.php?t=cpcrmdetails&iframe=1&id={$visitor}&module=purchases", 450)."');",
					   localize('_favorites', $l)=>"javascript:$('#urldetails{$meter}').load('cpcrmtrace.php?t=cpcrmframe&url=".$this->makeCrmURL("cpcrm.php?t=cpcrmdetails&iframe=1&id={$visitor}&module=wishfav", 450)."');",					   
					   '0'=>'',
					   localize('_addfav',    $l)=>"javascript:$('#urldetails{$meter}').load('cpcrmtrace.php?t=cpcrmaddfav&item={$itemcode}&v={$visitor}');",
					   localize('_remfav',    $l)=>"javascript:$('#urldetails{$meter}').load('cpcrmtrace.php?t=cpcrmremfav&item={$itemcode}&v={$visitor}');",
					   '1'=>'',
					   localize('_addoffer',  $l)=>"javascript:$('#urldetails{$meter}').load('cpcrmtrace.php?t=cpcrmaddoffer&item={$itemcode}&v={$visitor}');",
					   localize('_addcoll',   $l)=>"javascript:$('#urldetails{$meter}').load('cpcrmtrace.php?t=cpcrmaddcol&item={$itemcode}&v={$visitor}');",
		              );
		
		$button = $this->timelineButton(localize('_actions', $l), $links);
		return ($button);
	}
	
	protected function timelineButton($title=null, $actionButtons=null) {
		if (empty($actionButtons)) return null;
		$t = $title ? $title : localize('_button', getlocal());		
		
		$button = $this->createButton($t, $actionButtons, 'warning');	
										
		return ($button);								
	}

	public function selectTimelineButton() {
		$l = getlocal();
		$daterange = GetGlobal('controller')->calldpc_method('rccrmtrace.getDateRange');
		$v = GetParam('v') ? "v=" . urldecode(GetParam('v')) : null;
		
		$turl0 = seturl('t=cpcrmtimeline&mode=0&').$v.'&'.$daterange;
		$turl1 = seturl('t=cpcrmtimeline&mode=1&').$v.'&'.$daterange;
		$turl2 = seturl('t=cpcrmtimeline&mode=2&').$v.'&'.$daterange;		
		$turl3 = seturl('t=cpcrmtimeline&mode=3&').$v.'&'.$daterange;		
		$turl4 = seturl('t=cpcrmtimeline&mode=4&').$v.'&'.$daterange;
		$turl5 = seturl('t=cpcrmtimeline&mode=5&').$v.'&'.$daterange;
		$turl6 = seturl('t=cpcrmtimeline&mode=6&').$v.'&'.$daterange;		
		$turl7 = seturl('t=cpcrmtimeline&mode=7&').$v.'&'.$daterange;		
		$button = $this->createButton(localize('_filterin', getlocal()), 
										array(localize('_itemin',    $l)=>$turl1,
										      localize('_categorin', $l)=>$turl2,
									  		  localize('_searchin',  $l)=>$turl3,
											  localize('_filters',   $l)=>$turl4,
											  localize('_cartin',    $l)=>$turl5,
											  localize('_cartout',   $l)=>$turl6,
											  localize('_checkout',  $l)=>$turl7,
											  localize('_allin',     $l)=>$turl0,			
		                                ));	
										
		return ($button);								
	}	
	
	protected function createButton($name=null, $urls=null, $t=null, $s=null) {
		$type = $t ? $t : 'primary'; //danger /warning / info /success
		switch ($s) {
			case 'large' : $size = 'btn-large '; break;
			case 'small' : $size = 'btn-small '; break;
			case 'mini'  : $size = 'btn-mini '; break;
			default      : $size = null;
		}
		
		if (!empty($urls)) {
			foreach ($urls as $n=>$url)
				$links .= $url ? '<li><a href="'.$url.'">'.$n.'</a></li>' : '<li class="divider"></li>';
			$lnk = '<ul class="dropdown-menu">'.$links.'</ul>';
		} 
		
		$ret = '
			<div class="btn-group">
                <button data-toggle="dropdown" class="btn '.$size.'btn-'.$type.' dropdown-toggle">'.$name.' <span class="caret"></span></button>
                '.$lnk.'
            </div>'; 
			
		return ($ret);
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