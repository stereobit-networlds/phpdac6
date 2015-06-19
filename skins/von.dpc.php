<?php

$__DPCSEC['VON_DPC']='1;1;1;1;1;1;1;1;1';

if ((!defined("VON_DPC")) && (seclevel('VON_DPC',decode(GetSessionParam('UserSecID')))) ) {
define("VON_DPC",true);

$__DPC['VON_DPC'] = 'von';

$__EVENTS['VON_DPC'][0]='von';
$__EVENTS['VON_DPC'][1]='skinon';
$__EVENTS['VON_DPC'][2]='skinoff';

$__ACTIONS['VON_DPC'][0]='von';
$__ACTIONS['VON_DPC'][1]='skinon';
$__ACTIONS['VON_DPC'][2]='skinoff';

$__DPCATTR['VON_DPC']['von'] = 'von,1,0,1'; 

$__LOCALE['VON_DPC'][0]='VON_DPC;Von;Von';
$__LOCALE['VON_DPC'][1]='_home;Home;Αρχή';
$__LOCALE['VON_DPC'][2]='_chapter;Chapter;Ενότητα';
$__LOCALE['VON_DPC'][3]='_about;About;Σχετικά';
$__LOCALE['VON_DPC'][4]='_contact;Contact;Επικοινωνία';
$__LOCALE['VON_DPC'][5]='_ch6text1;Latest XIXs;Τελευταία ΧΙΧς';
$__LOCALE['VON_DPC'][6]='_ch6text2;Latest views;Τελευταίες προβολές';
$__LOCALE['VON_DPC'][7]='_ch6text3;Menu;Επιλογές';
$__LOCALE['VON_DPC'][8]='_exitskin;Disable skin;Απενεργοποίηση θέματος';
$__LOCALE['VON_DPC'][9]='_skinmenu;Menu (on/off);Επιλογές (on/off)';

class von {

	var $userLevelID;
	var $username;
	var $userid, $urlpath, $cseparator;
	
	var $ipath, $inav, $skin, $animations;
	var $_hnav, $_enav;

	function __construct() {
	    $UserName = GetGlobal('UserName');	
	    $UserSecID = GetGlobal('UserSecID');
	    $UserID = GetGlobal('UserID');			

        $this->userLevelID = (((decode($UserSecID))) ? (decode($UserSecID)) : 0);
	    $this->username = decode($UserName);
	    $this->userid = decode($UserID);
		
		//not in ajax calls..faster load
		if (!GetReq('ajax')) { 		
			$this->urlpath = paramload('SHELL','urlpath');
			$csep = remote_paramload('SHKATEGORIES','csep',$this->path); 
			$this->cseparator = $csep ? $csep : '^';	
	   
			//$this->ipath = 'javascripts/von/images/'; 
			$this->ipath = $this->select_skin('images/von/'); 
			$this->inav = array();
			$this->skin = GetSessionParam('skin') ? GetSessionParam('skin') : null; //off
			$this->_hnav = $_COOKIE['_hnav'] ? $_COOKIE['_hnav'] : 0; //off
			$this->_enav = $_COOKIE['_enav'] ? $_COOKIE['_enav'] : 0; //off
		    //print_r($_COOKIE);
			$this->animations = false;

			$this->javascript();
		}	 
	}
	
	function event($event) {
	   
	   switch ($event) {
	   
		 case 'skinon' : $this->skin_on(); break;
		 case 'skinoff': $this->skin_off(); break;	   
		 case 'von'    :
		 default       :
	   }
	}	
	
    function action($action=null)  { 

	   switch ($action) {	
		 case 'skinon' :
		 case 'skinoff':	   
		 case 'von'    :
		 default       : $out = null;	
       }			

	   //$out = $this->nav();
	   return ($out);
	}
	
	protected function select_skin($default_skin=null) {
	    $cat = GetReq('cat');
		$skin_path = $default_skin ? $default_skin : 'images/von/';
		$catskin = $this->urlpath .'/'. $default_skin;
		
		if ($cat) {
			$cats = explode($this->cseparator,$cat);
		
			while ($cskin = array_shift($cats)) {
				$catskin .= $cskin .'/';
				//echo (is_dir($catskin)) ? $catskin .'><br/>' : $catskin .'<br/>';
				$skin_path = (is_dir($catskin)) ? $skin_path . $cskin .'/' : $skin_path;
				//echo $skin_path,'-----------<br/>';	
			}
		}	
		return ($skin_path);
		//return ('images/von/');
	}
	
	public function skin_on() {
	
	    //disbale skin for current session
		if (GetSessionParam('skin')=='off')
			return false;
			
		$this->skin = 1; //skin is on (call var from dpc..)
		SetSessionParam('skin','von'); //<<<SET THE SKIN AS GLOBAL PARAM
		return true;			
	}
	
	public function skin_off() {
		$this->skin = null; 
		SetSessionParam('skin','off'); //<<<SET THE SKIN AS GLOBAL PARAM
		return true;			
	}	
	
	protected function javascript() {

	    $this->animations = GetGlobal('controller')->calldpc_var('fronthtmlpage.global_css_animations');
		if (!$this->animations) return false; //mobile version without skin
		
        if (iniload('JAVASCRIPT')) {

		    //$this->skin = 1; //skin is on (call var from dpc..)
			//SetSessionParam('skin','von'); //<<<SET THE SKIN AS GLOBAL PARAM
			if ($this->skin_on()) {
						
				$js = new jscript;
			
				//put into javascript root dir 
				$js->load_css('javascripts/von/css/vonstyle.css');
            
				//put into javascript root dir			
				//$js->load_js('von/common.js'); //inline
				$js->load_js('von/jquery.inview.js');
				$js->load_js('von/jquery.scrollTo-1.4.2-min.js');			
				$js->load_js('von/jquery.localscroll-1.2.7-min.js');
				//$js->load_js('von/wyz6ivr.js');	
				//$js->load_js('http://use.typekit.com/wyz6ivr.js',null,null,null,true);	
			
				//$code = $this->javascript_common_code();//moved after load...
				$code = $this->javascript_code();			
				$js->load_js($code,null,1);//,null,null,true); //no obf		   			   
				unset ($js);
			}//skin
	    }	
	}		
	
	protected function javascript_code() {
	
	    $global_css_animations = $this->animations ? '1' : '0';	
	    $keep_id = GetReq('id') ? 'id='.GetReq('id').'&cat='.GetReq('cat') : 'cat='.GetReq('cat');
	    $ajaxurl = seturl($keep_id."&t=");	   
	
	    //return null;
	    $code = <<<JCODE
	   
        /*var mobile = navigator.userAgent.match(/(iPhone|iPod|iPad|blackberry|android|htc|lg|midp|mmp|mobile|nokia|opera mini|palm|pocket|psp|sgh|smartphone|symbian|treo mini|Playstation Portable|SonyEricsson|Samsung|MobileExplorer|PalmSource|Benq|Windows Phone|Windows Mobile|IEMobile|Windows CE|Nintendo Wii)/i);

        if (mobile || (jQuery.browser.msie && parseInt(jQuery.browser.version) < 8)) {
            document.location = "m/";
        }*/

		/*try{Typekit.load();}catch(e){}*/

		var hnav = $.cookie('_hnav') ? 1 : {$this->_hnav};//$.cookie('_hnav');
		var enav = $.cookie('_enav') ? 1 : {$this->_enav};//$.cookie('_enav');
		console.log(hnav+'hnav'+enav+'enav');
		
		function hnav_hide()
		{			
			$('#hnav-container').removeClass('hnav_fadein');
			$('#hnav-container').css('opacity', '0');
			$('#hnav-container').css('display', 'none');
		};	
		
		function hnav_fadein()
		{
		    //toggle show/hide
			if($('#hnav-container').hasClass('hnav_fadein')){		
			
				$.cookie('_hnav',null);
				console.log('off_hnav');
			
				hnav_hide();
			}
			else {
			
			  $.cookie('_hnav', 1, { path: '/' });
			  console.log('on_hnav');			
			
			  setTimeout(function()
			  {
				
				if({$global_css_animations} == 1)
				{
					$('#hnav-container').css('display','block');
					$('#hnav-container').addClass('hnav_fadein');
				}
				else
				{
					$('#hnav-container').animate({ opacity: 1 }, 250);
				}
			  }, 1);
			}  
		};	

		function enav_hide()
		{
				
			$('#enav-container').removeClass('enav_fadein');
			$('#enav-container').css('opacity', '0');
			$('#enav-container').css('display', 'none');
		};	
		
		function enav_fadein()
		{
		    //toggle show/hide
			if ($('#enav-container').hasClass('enav_fadein')){		
			
				$.cookie('_enav',null);
				console.log('off_enav');	
			
				enav_hide();
			}
			else {
				$.cookie('_enav', 1, { path: '/' });
				console.log('on_enav');
					
			    $('#enav-explore-load').html('<img src="images/loading.gif">');
				
                //fetch data 
                $.get('{$ajaxurl}tree_past_navigation&cmd=klist&prefix=&home=0&ajax=xixcp_div', function(data) { 				
					
					if({$global_css_animations} == 1)
					{
						$('#enav-container').css('display','block');
						$('#enav-container').addClass('enav_fadein');
					}
					else
					{
						$('#enav-container').animate({ opacity: 1 }, 250);
					}				
				
					$('#enav-explore').html(data);
					$('#enav-explore-load').html('');
				});	
			}  
		};		

		$(document).ready(function(){
		
            $('#nav').localScroll(700);		
			
			//setTimeout(hnav_fadein(), 15000);
			var hnav = $.cookie('_hnav');
			console.log(hnav);
			if (hnav) hnav_fadein(); 
			
			var enav = $.cookie('_enav');
			console.log(enav);
			if (enav) enav_fadein(); 
        });		
JCODE;
		return ($code);
	}
	
	//load after rendering !!!
	protected function javascript_after_rendering() {

		if (!$this->animations) return false; //mobile version without skin
		
		if (iniload('JAVASCRIPT')) {
			$js = new jscript;
	
			//return script code added to nav code at the end of page
			$code = $this->javascript_common_code();		
			//$ret = '<script>'. $code . '</script>';	   			   
			$ret = '<script>'. $js->obfuscate($code) . '</script>';	   			   
		    unset ($js);			
		}				
        return ($ret);		
	}		
	
	protected function javascript_common_code() {
        $about = localize('_about',getlocal());
		$menu = localize('_skinmenu',getlocal());
		$home = localize('_home',getlocal());
		$exitskin = localize('_exitskin',getlocal());
		$contact = localize('_contact',getlocal());	
		$chapter = localize('_chapter',getlocal());
		$ch6text1 = localize('_ch6text1',getlocal());
		$ch6text2 = localize('_ch6text2',getlocal());
		$ch6text3 = localize('_ch6text3',getlocal());	

	    $commoncode = '
$(function() {

	var $window = $(window);

	var windowHeight = $window.height();

    var monthNames = new Array(
        "January","February","March","April","May","June","July",
        "August","September","October","November","December");

    var D = new Date(),
        date_day = D.getDate(),
        date_month = monthNames[D.getMonth()],
        date_year = D.getFullYear();

        date_html = \'<div class="date_month">\' + date_month + \'</div>\'+
                    \'<div class="date_day">\' + date_day + \'</div>\' +
                    \'<div class="date_year">\' + date_year + \'</div>\';

    /*$(\'#date\').html(date_html);*/

    var title, description;

    $(\'#navlink0, #navlink1, #navlink2, #navlink3, #navlink4, #navlink5, #navlink6, #navlink62, #navlink63, #navlinkA, #navlinkC\').hover(
        function(){
            switch(this.id){';
			
		foreach ($this->inav as $n=>$v) {
		
		    $title = ($v) ? $chapter. ' '.$v : $home;
		     
			$commoncode .= "
                case 'navlink{$v}':
                    title = '{$title}';
                    description = '{$v}';
                    break;
";					
		}
		
		$commoncode .= "
                case 'navlink6':
                    title = '{$chapter} X';
                    description = '{$ch6text1}';
                    break;		
                case 'navlink62':
                    title = '{$chapter} Y';
                    description = '{$ch6text2}';
                    break;
                case 'navlink63':
                    title = '{$chapter} Z';
                    description = '{$ch6text3}';
                    break;					
                case 'navlinkA':
                    title = '{$exitskin}';
                    description = '{$exitskin}';
                    break;
                case 'navlinkC':
                    title = '{$contact}';
                    description = '{$contact}';
                    break;
";
		$commoncode .= '			
                default:
                    title = \'Chapter !\';
                    description = \'Description\';
            }
            $(\'#chapter-title\').html( title );
            $(\'#chapter-description\').html(\'&#8226; \' + description + \' &#8226;\');
            repositionOverlay(\'#\' + this.id);
            $(\'#chapter-overlay\').stop(true, true).fadeIn();
        },
        function(){
            $(\'#chapter-overlay\').stop(true, true).fadeOut();
        }
    );


	$(\'#chapter0_1, #chapter1_1, #chapter1_2, #chapter1_3, #chapter1_4, #chapter1_5, #chapter1_6,\' +
      \'#chapter2_1, #chapter2_2, #chapter3_1, #chapter3_2, #chapter4_1, #chapter4_2,\'+
      \'#chapter5_1, #chapter5_2, #chapter6_1, #chapter6_2, #chapter6_3\').bind(\'inview\', function (event, visible) {
			if(visible){
			    $(this).addClass("inview");
				//console.log(\'add inview:\'+this.id);
			}
            else{
			    $(this).removeClass("inview");
				//console.log(\'rem inview:\'+this.id);
			}
		}
    );

	/*arguments:
		x = horizontal position of background in %
		windowHeight = height of the viewport
		pos = position of the scrollbar
		adjuster = adjust the position of the background
		inertia = how fast the background moves in relation to scrolling
	*/

    function firstPos(x, windowHeight, pos, adjuster, inertia){
        //console.log(x + "% " + (-((pos) - adjuster) * inertia)  + "px");
        return x + "% " + (-((pos) - adjuster) * inertia)  + "px";
    }

    function bgPos(x, windowHeight, pos, adjuster, inertia){
        //console.log(x + "% " + (-((windowHeight + pos) - adjuster) * inertia)  + "px");
        //return x + "% " + (-((windowHeight + pos) - adjuster ) * inertia)  + "px";
        return x + "% " + (-((windowHeight + pos) - adjuster + (900-windowHeight)) * inertia)  + "px";
    }

    function moveUp(x, windowHeight, pos, adjuster, inertia){
        //console.log(x + "% " + (-((windowHeight + pos) - adjuster) * inertia)  + "px");
        return x + "% " + (-((windowHeight + pos) - adjuster + (900-windowHeight)) * inertia)  + "px";
    }

    function marginTop(x, windowHeight, pos, adjuster, inertia){
        //console.log(x + "% " + (-((windowHeight + pos) - adjuster) * inertia)  + "px");
        return (-((windowHeight + pos) - adjuster + (900-windowHeight)) * inertia)  + "px";
    }

    function moveLeft(x, windowHeight, pos, adjuster, inertia, minXPercent, xInertia){
        var minXPercent = minXPercent || 100;
        var xInertia = xInertia || 1.5;
        //console.log(x + "% " + (-((windowHeight + pos) - adjuster) * inertia)  + "px");
        var newx = x / Math.pow(pos/adjuster, xInertia);

        if(newx <= minXPercent){
            newx = minXPercent;
        }
        return newx + "% " + (-((windowHeight + pos) - adjuster + (900-windowHeight)) * inertia)  + "px";
    }

    function moveRight(x, windowHeight, pos, adjuster, inertia, maxXPercent, xInertia){
        var maxXPercent = maxXPercent || 100;
        var xInertia = xInertia || 1.5;

        //console.log(x + "% " + (-((windowHeight + pos) - adjuster) * inertia)  + "px");
        var newx = 80 * Math.pow(pos/adjuster, xInertia) / x;


        if(newx >= maxXPercent){
            newx = maxXPercent;
        }
        return newx + "% " + (-((windowHeight + pos) - adjuster + (900-windowHeight)) * inertia)  + "px";
    }
';

		$commoncode .= "
	function ChaptersInit() {
	
		$('#chapter0_1').css('background', 'url({$this->ipath}ch0_bg01.jpg) 50% 0 no-repeat fixed');
		$('#chapter1_1').css('background', 'url({$this->ipath}ch1_bg01.jpg) 50% 0 no-repeat fixed');
		$('#chapter2_1').css('background', 'url({$this->ipath}ch2_bg01.jpg) 50% 0 no-repeat fixed');
		$('#chapter3_1').css('background', 'url({$this->ipath}ch3_bg01.jpg) 50% 0 no-repeat fixed');
		$('#chapter4_1').css('background', 'url({$this->ipath}ch4_bg01.jpg) 50% 0 no-repeat fixed');
		$('#chapter5_1').css('background', 'url({$this->ipath}ch5_bg01.jpg) 50% 0 no-repeat fixed');
		$('#chapter6_1').css('background', 'url({$this->ipath}ch6_bg01.jpg) 50% 0 no-repeat fixed');
		$('#chapter6_2').css('background', 'url({$this->ipath}ch6_bg02.jpg) 50% 0 no-repeat fixed');				
		$('#chapter6_3').css('background', 'url({$this->ipath}ch6_bg03.jpg) 50% 0 no-repeat fixed');
		
		$('#chapter6_1_2').css('background', 'url({$this->ipath}ch6_graphic01b.jpg) 70% 0 no-repeat fixed');
		$('#chapter6_1_3').css('background', 'url({$this->ipath}ch6_graphic01c.jpg) 70% 0 no-repeat fixed');
		$('#chapter6_1_4').css('background', 'url({$this->ipath}ch6_graphic01d.jpg) 70% 0 no-repeat fixed');
		
		$('#chapter6_2_2').css('background', 'url({$this->ipath}ch6_graphic02b.png) 70% 0 no-repeat fixed');
	}			
";

		$commoncode .= '
	function ChaptersResize() {
		
	    var height = $window.height();
	
		$("#chapter0_1").css("height", height+"px");
		$("#chapter0_1").css("overflow", "auto");
		
		$("#chapter1_1").css("height", height+"px");
		$("#chapter1_1").css("overflow", "auto");
		
		$("#chapter2_1").css("height", height+"px");
		$("#chapter2_1").css("overflow", "auto");

		$("#chapter3_1").css("height", height+"px");
		$("#chapter3_1").css("overflow", "auto");

		$("#chapter4_1").css("height", height+"px");
		$("#chapter4_1").css("overflow", "auto");

		$("#chapter5_1").css("height", height+"px");
		$("#chapter5_1").css("overflow", "auto");

		$("#chapter6_1").css("height", height+"px");
		$("#chapter6_1").css("overflow", "auto");

		$("#chapter6_2").css("height", height+"px");
		$("#chapter6_2").css("overflow", "auto");		
		
        /* 6-3 last chapter is fixed 200px */		
	}

	function Move(){
		var pos = $window.scrollTop();
';	

		foreach ($this->inav as $n=>$v) {		
		
			$commoncode .= /*($v>0) ?*/ "
		if ($('#chapter{$v}_1').hasClass(\"inview\")) {
            $('#chapter{$v}_1').css({'backgroundPosition': firstPos(50, windowHeight, pos, ({$v}*windowHeight), 0.2)});
            $('#chapter{$v}_1 .pseudo-static-container').css({'backgroundPosition': moveUp(50, windowHeight, pos, ({$v}*windowHeight)+windowHeight, 0.4)});

            repositionArrow('#navlink{$v}');
		}
";// : "if ($('#chapter{$v}_1').hasClass(\"inview\")) { repositionArrow('#navlink{$v}');} ";
		}	
		
		$commoncode .= "
        if($('#chapter6_1').hasClass(\"inview\")){
            $('#chapter6_1').css({'backgroundPosition': bgPos(50, windowHeight, pos, ({$v}*windowHeight)+windowHeight, 0.3)});

            $('#chapter6_1 .pseudo-static-container').css({'backgroundPosition': moveUp(75, windowHeight, pos, ({$v}*windowHeight)+(windowHeight*2), 0.5)});

            $('#chapter6_1_2').css({'backgroundPosition': moveUp(30, windowHeight, pos, ({$v}*windowHeight)+(windowHeight*2), 1.4)});
            $('#chapter6_1_3').css({'backgroundPosition': moveUp(32, windowHeight, pos, ({$v}*windowHeight)+(windowHeight*2), 1.8)});
            $('#chapter6_1_4').css({'backgroundPosition': moveUp(33.5, windowHeight, pos, ({$v}*windowHeight)+(windowHeight*2), 2.2)});

            repositionArrow('#navlink6');
        }
        if($('#chapter6_2').hasClass(\"inview\")){
            $('#chapter6_2').css({'backgroundPosition': bgPos(50, windowHeight, pos, ({$v}*windowHeight)+(windowHeight*2), 0.3)});

            $('#chapter6_2 .pseudo-static-container').css({'backgroundPosition': moveUp(25, windowHeight, pos, ({$v}*windowHeight)+(windowHeight*3), 0.5)});

            $('#chapter6_2_2').css({'backgroundPosition': moveUp(75, windowHeight, pos, ({$v}*windowHeight)+(windowHeight*3), 1)});
			
			repositionArrow('#navlink62');
        }
		if($('#chapter6_3').hasClass(\"inview\")){
			repositionArrow('#navlink63');
		}
	
";
		$commoncode .= '
	}

	ChaptersInit();		
	ChaptersResize();	
	RepositionNav();
	repositionArrow(\'#navlink0\');

	$window.resize(function(){
	
		ChaptersResize();
		Move();
		RepositionNav();
	});

	$window.scroll(function(){
		Move();
	});

});


function RepositionNav(){
    var $window = $(window);
    var windowHeight = $window.height(); //get the height of the window
    var navHeight = $(\'#nav\').height() / 2;
    var windowCenter = (windowHeight / 2);
    var newtop = windowCenter - navHeight;
    $(\'#nav\').css({"top": newtop}); //set the new top position of the navigation list
}

function repositionArrow(elem){
    var $window = $(window);
    var windowHeight = $window.height(); //get the height of the window

    if(elem === \'#navlinkA\' || elem === \'#navlinkC\'){
        var navTop = $(elem).parent().parent().position().top;
        var linkTop = $(elem).parent().position().top;
        var arrowHeight = $(\'#nav-arrow\').height() / 2;

        var newTop = navTop - arrowHeight + linkTop + 10;
    }
    else {
        var topId = \'#nav\';

        var navHeight = $( topId ).height();

        var navOffset = windowHeight /2 - navHeight/2;
        var linkTop = $(elem).position().top;
        var arrowHeight = $(\'#nav-arrow\').height() / 2;

        //console.log(linkTop);
        var newTop = navOffset + linkTop - arrowHeight + 10;
    }


    $(\'#nav-arrow\').css({"top": newTop}); //set the new top position of the navigation list
}

function repositionOverlay(elem){
    var $window = $(window);
    var windowHeight = $window.height(); //get the height of the window


    if(elem === \'#navlinkA\' || elem === \'#navlinkC\'){
        var navTop = $(elem).parent().parent().position().top;
        var linkTop = $(elem).parent().position().top;
        var arrowHeight = $(\'#chapter-overlay\').height() / 2;

        var newTop = navTop - arrowHeight + linkTop -4;

    }
    else{
        var navHeight = $(\'#nav\').height();

        var navOffset = windowHeight /2 - navHeight/2;
        var linkTop = $(elem).position().top;
        var arrowHeight = $(\'#chapter-overlay\').height() / 2;

        //console.log(linkTop);
        var newTop = navOffset + linkTop - arrowHeight - 4;
    }

    $(\'#chapter-overlay\').css({"top": newTop});
}	   
';		
	   return ($commoncode);	
    }	
	
	public function nav() {
	
	    $page = $_SERVER['REQUEST_URI'];//'index.php';
		$skinoff = seturl('t=skinoff');
		
        $about = localize('_about',getlocal());
		$menu = localize('_skinmenu',getlocal());
		$home = localize('_home',getlocal());		
		$exitskin = localize('_exitskin',getlocal());
		$contact = localize('_contact',getlocal());	
		$chapter = localize('_chapter',getlocal());
		$ch6text1 = localize('_ch6text1',getlocal());
		$ch6text2 = localize('_ch6text2',getlocal());
		$ch6text3 = localize('_ch6text3',getlocal());		
	
		$nav = "
<div id='nav-container'>
    <ul id='nav-top'>
		<li><a href='{$page}#' onClick='hnav_fadein();return false;' title='{$menu}' id='menu'>M</a></li>
		<li><a href='{$page}#' onClick='enav_fadein();return false;' title='{$menu}' id='menu'>E</a></li>
    </ul>
	
    <ul id='nav'>
        <!--li class='nobg'><img src='{$this->ipath}menu_ch.png' /></li-->";
        
		foreach ($this->inav as $n=>$v) {
		    
			$class = ($v) ? null : "class='home'";
			$title = ($v) ? $chapter .' '.$v : $home;
			$nav .= "<li {$class}><a href='{$page}#chapter{$v}_1' title='{$title}' id='navlink{$v}'>{$v}</a></li>";
		}	
		
		$nav .= <<<NAV
		<li><a href='{$page}#chapter6_1' title='{$ch6text1}' id='navlink6'>A</a></li>		
		<li><a href='{$page}#chapter6_2' title='{$ch6text2}' id='navlink62'>B</a></li>
		<li><a href='{$page}#chapter6_3' title='{$ch6text3}' id='navlink63'>C</a></li>
    </ul>

    <ul id="nav-bottom">
        <li><a href="contact.php" id="navlinkC" title="{$contact}">@</a></li>
        <li><a href="{$skinoff}" id="navlinkA" title="{$exitskin}">X</a></li>		
    </ul>

    <div id="nav-arrow"></div>

    <div id="chapter-overlay" style="display: none;">
        <div id="chapter-title"></div>
        <div id="chapter-description"></div>
    </div>
</div>		
NAV;

        //hnav..can be loaded by html file
		//$nav .= $this->hnav();
		$nav .= $this->enav();

        //calc javascript
		$nav .= $this->javascript_after_rendering();
		
		return ($nav);
    }	
	
	//horizontal menu navigator
	public function hnav($pcall=null,$ecall=null,$zcall=null) {
	    //echo '<br/><br/>'; 
	   
		$header = "
<div id='hnav-container' class='hnav-main-navigation' style='display:none;'>
    <ul id='hnav' class='hnav_menu'>	   
		{$this->get_content_from_params($pcall)}
		{$this->get_content_from_params($ecall)}
		{$this->get_content_from_params($zcall)}	   
	</ul>
</div>	
";	   
	   return ($header);
	}
	
	//horizontal menu explorer navigator
	public function enav() {

		/*$explore_data = defined('SHKATALOGMEDIA_DPC') ?
		                GetGlobal('controller')->calldpc_method('shkatalogedia.tree_navigation use klist++1+'.GetReq('cat').'+1') :
						null;
	    if ($explore_data)*/
		$header = "
<div id='enav-container' class='enav-main-navigation' style='display:none;'>
    <div id='enav-explore-load'></div>
    <ul id='enav'>	   
		<div id='enav-explore'></div>
	</ul>
</div>	
";	   
	   return ($header);
	}	
	
	//always on screen navigation
	public function inav($div=null,$x=null,$y=null,$bottom=null,$pcall=null,$ecall=null,$zcall=null) {
		$div = $div ? $div : 'inav';
	    $x = $x ? $x : 15;
		$y = $y ? $y : 10;
		$xm = $bottom ? 'right' : 'left';
		$ym = $bottom ? 'bottom' : 'top';
	    
		$inline = "		
<div id='{$div}'>
	{$this->get_content_from_params($pcall)}
	{$this->get_content_from_params($ecall)}
	{$this->get_content_from_params($zcall)}		
</div>		
<script>
$('#{$div}').css('z-index', '999');
$('#{$div}').css('position', 'fixed');
$('#{$div}').css('{$xm}', '{$x}px');
$('#{$div}').css('{$ym}', '{$y}px');
</script>
";		
		return ($inline);
	}

	protected function get_content_from_params($call=null,$br=false,$debug=false) {
	    if (!$call) return;
		$br = $br ? '<br>' : null;
		
		//if ($debug)	echo '>>>>>debug:';
		
		if (defined(strtoupper(array_shift(explode('.',$call))).'_DPC')) {
		    //if ($debug)	echo $call;
		
			$mycall = str_replace(array(':','|'),array(' use ','+'),$call);
		    //echo $mycall,'<br/>';
		
			$content = GetGlobal('controller')->calldpc_method($mycall);	
			//if ($debug)	echo $content;
			return ($br.$content);
		}	
		else
			$content = str_replace(array('<@','@>'),array('<?','?>'),$call);
			
	    return ($content);
    }	
	
	public function chapter($chapter=null,$pcall=null,$ecall=null,$zcall=null,$mcall=null) {	
	    $c = $chapter ? $chapter : '0';
		
		$br = ($c>0) ? true : false;//br when chapter >0
		$this->inav[] = $c;
		
		$ch = <<<CH
	<div id="chapter{$c}_1" class="chapter">
        <div class="pseudo-static-container" style="background-image:url({$this->ipath}bg{$c}.jpg);">
		{$this->get_content_from_params($pcall,$br)}
		{$this->get_content_from_params($ecall,$br)}
		{$this->get_content_from_params($zcall,$br)}
		{$this->get_content_from_params($mcall,$br)}
		</div>
    </div>	
CH;
		return ($ch);	
	}		

	public function header_chapter($pcall=null,$ecall=null,$zcall=null,$mcall=null) {
	
	    $this->inav[] = '0';
	
		$ch0 = <<<CH0
    <div id="chapter0_1" class="chapter">
        <div class="pseudo-static-container" style="background-image:url({$this->ipath}header.png)">
		{$this->get_content_from_params($pcall)}
		{$this->get_content_from_params($ecall)}
		{$this->get_content_from_params($zcall)}		
		{$this->get_content_from_params($mcall)}
		</div>
    </div>		
CH0;
		return ($ch0);	
	}	
	
	public function footer_chapter($pcall=null,$ecall=null,$zcall=null) {
		
		$ch6 = <<<CH6
    <div id="chapter6_1" class="chapter">
        <div id="chapter6_1_2" class="dynamic-img"></div>
        <div id="chapter6_1_3" class="dynamic-img"></div>
        <div id="chapter6_1_4" class="dynamic-img"></div>

        <div class="pseudo-static-container" style="background-image:url({$this->ipath}ch6_graphic01a.png)">
            {$this->get_content_from_params($zcall, true)}
		</div>
    </div>
    <div id="chapter6_2" class="chapter">
        <div id="chapter6_2_2" class="dynamic-img"></div>
        <div class="pseudo-static-container" style="background-image:url({$this->ipath}ch6_graphic02a.png)">
		    {$this->get_content_from_params($ecall, true)}
		</div>
    </div>
    <div id="chapter6_3" class="chapter">
        <div class="static-container">
            <img src="{$this->ipath}ch6_graphic03b.png" height="113" width="241" style="margin-top:50px" />
        </div>
		{$this->get_content_from_params($pcall, true)}
    </div>	
CH6;
		return ($ch6);	
	}		
};
}
?>	