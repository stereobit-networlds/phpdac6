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

        date_html = '<div class="date_month">' + date_month + '</div>'+
                    '<div class="date_day">' + date_day + '</div>' +
                    '<div class="date_year">' + date_year + '</div>';

    $('#date').html(date_html);

    var title, description;

    $('#navlink0, #navlink1, #navlink2, #navlink3, #navlink4, #navlink5, #navlink6, #navlinkA, #navlinkC').hover(
        function(){
            switch(this.id){
                case 'navlink0':
                    title = 'Home';
                    description = 'The Story of Kenneth Howard';
                    break;
                case 'navlink1':
                    title = 'Chapter 1';
                    description = 'Who is Von Dutch?';
                    break;
                case 'navlink2':
                    title = 'Chapter 2';
                    description = 'The Beginning';
                    break;
                case 'navlink3':
                    title = 'Chapter 3';
                    description = 'The Start of Kustom Kulture';
                    break;
                case 'navlink4':
                    title = 'Chapter 4';
                    description = 'The Von Dutch Brand Today';
                    break;
                case 'navlink5':
                    title = 'Chapter 5';
                    description = 'The Flying Eyeball';
                    break;
                case 'navlink6':
                    title = 'Chapter 6';
                    description = 'Von Dutch Lives On';
                    break;
                case 'navlinkA':
                    title = 'About';
                    description = 'About the Brand';
                    break;
                case 'navlinkC':
                    title = 'Contact';
                    description = 'Contact Us';
                    break;
                default:
                    title = 'Chapter n';
                    description = 'This is another description';
            }
            $('#chapter-title').html( title );
            $('#chapter-description').html('&#8226; ' + description + ' &#8226;');
            repositionOverlay('#' + this.id);
            $('#chapter-overlay').stop(true, true).fadeIn();
        },
        function(){
            $('#chapter-overlay').stop(true, true).fadeOut();
        }
    );


	$('#chapter0_1, #chapter1_1, #chapter1_2, #chapter1_3, #chapter1_4, #chapter1_5, #chapter1_6,' +
      '#chapter2_1, #chapter2_2, #chapter3_1, #chapter3_2, #chapter4_1, #chapter4_2,'+
      '#chapter5_1, #chapter5_2, #chapter6_1, #chapter6_2, #chapter6_3').bind('inview', function (event, visible) {
			if(visible){
			    $(this).addClass("inview");
			}
            else{
			    $(this).removeClass("inview");
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

	function Move(){
		var pos = $window.scrollTop();

        /* HOME */
		/*if($('#chapter0_1').hasClass("inview")){
            $('#chapter0_1').css({'backgroundPosition': firstPos(50, windowHeight, pos, 0, 0.2)});
            $('#chapter0_1 .pseudo-static-container').css({'backgroundPosition': moveUp(50, windowHeight, pos, 1400, 0.4)});

            repositionArrow('#navlink0');
		}*/

        /* CHAPTER 1 */
        /*if($('#chapter1_1').hasClass("inview")){
            $('#chapter1_1').css({'backgroundPosition': bgPos(50, windowHeight, pos, 1400, 0.3)});
            $('#chapter1_1 .pseudo-static-container').css({'backgroundPosition': moveUp(20, windowHeight, pos, 2800, 0.5)});
            $('#chapter1_1_2').css({'backgroundPosition': moveUp(70, windowHeight, pos, 2550, 0.8)});
            $('#chapter1_1_3').css({'backgroundPosition': moveUp(70, windowHeight, pos, 2680, 1.2)});

            repositionArrow('#navlink1');

        }
        if($('#chapter1_2').hasClass("inview")){
            $('#chapter1_2').css({'backgroundPosition': bgPos(50, windowHeight, pos, 2700, 0.3)});
            $('#chapter1_2_2').css({'backgroundPosition': moveUp(35, windowHeight, pos, 3690, 1.3)});
            $('#chapter1_2_3').css({'backgroundPosition': moveUp(53, windowHeight, pos, 3690, 2.0)});

        }
        if($('#chapter1_3').hasClass("inview")){
            $('#chapter1_3').css({'backgroundPosition': bgPos(50, windowHeight, pos, 3400, 0.3)});
            //$('#chapter1_3 .pseudo-static-container').css({'backgroundPosition': moveUp(20, windowHeight, pos, 4800, 0.5)});

            $('#chapter1_3_2').css({'backgroundPosition': moveUp(80, windowHeight, pos, 4650, 1.4)});
            $('#chapter1_3_3').css({'backgroundPosition': moveLeft(70, windowHeight, pos, 4910, 1.4, 60, 1.8)});
            $('#chapter1_3_4').css({'backgroundPosition': moveUp(80, windowHeight, pos, 5115, 1.4)});
        }
        if($('#chapter1_4').hasClass("inview")){
            $('#chapter1_4').css({'backgroundPosition': bgPos(50, windowHeight, pos, 5700, 0.5)});
        }
        if($('#chapter1_5').hasClass("inview")){
            $('#chapter1_5').css({'backgroundPosition': bgPos(50, windowHeight, pos, 6100, 0.5)});
        }
        if($('#chapter1_6').hasClass("inview")){
            $('#chapter1_6').css({'backgroundPosition': bgPos(50, windowHeight, pos, 7100, 0.5)});
        }*/

        /* chapter 2 */
        /*if($('#chapter2_1').hasClass("inview")){
            $('#chapter2_1').css({'backgroundPosition': bgPos(50, windowHeight, pos, 8700, 0.3)});

            $('#chapter2_1 .pseudo-static-container').css({'backgroundPosition': moveUp(70, windowHeight, pos, 9160, 0.5)});

            $('#chapter2_1_2').css({'backgroundPosition': moveUp(35, windowHeight, pos, 8860, 0.7)});
            $('#chapter2_1_3').css({'backgroundPosition': moveUp(15, windowHeight, pos, 8980, 1.0)});
            $('#chapter2_1_4').css({'backgroundPosition': moveUp(32, windowHeight, pos, 9100, 1.3)});
            $('#chapter2_1_5').css({'backgroundPosition': moveUp(20, windowHeight, pos, 9150, 1.6)});
            $('#chapter2_1_6').css({'backgroundPosition': moveUp(40, windowHeight, pos, 9230, 1.9)});

            repositionArrow('#navlink2');
        }
        if($('#chapter2_2').hasClass("inview")){
            $('#chapter2_2').css({'backgroundPosition': bgPos(50, windowHeight, pos, 9000, 0.3)});

            $('#chapter2_2 .pseudo-static-container').css({'backgroundPosition': moveUp(25, windowHeight, pos, 10500, 0.5)});

            $('#chapter2_2_2').css({'backgroundPosition': moveUp(70, windowHeight, pos, 10500, 0.1)});
            //$('#chapter2_2_3').css({'backgroundPosition': moveUp(100, windowHeight, pos, 11180, 1.8)});
            $('#chapter2_2_3').css({'backgroundPosition': moveLeft(60, windowHeight, pos, 11000, 0.3)});
        }*/

        /* chapter 3 */
        /*if($('#chapter3_1').hasClass("inview")){
            $('#chapter3_1').css({'backgroundPosition': bgPos(50, windowHeight, pos, 10500, 0.3)});

            $('#chapter3_1 .pseudo-static-container').css({'backgroundPosition': moveUp(75, windowHeight, pos, 11750, 0.5)});

            //$('#chapter3_1_2').css({'backgroundPosition': moveUp(25, windowHeight, pos, 11320, 1.3)});
            $('#chapter3_1_2').css({'backgroundPosition': moveRight(0.2, windowHeight, pos, 11700, 0.2, 30, 20)});

            repositionArrow('#navlink3');
        }
        if($('#chapter3_2').hasClass("inview")){
            $('#chapter3_2').css({'backgroundPosition': bgPos(50, windowHeight, pos, 12600, 0.3)});
            $('#chapter3_2_2').css({'backgroundPosition': moveUp(30, windowHeight, pos, 12230, 0.5)});
            $('#chapter3_2_3').css({'backgroundPosition': moveUp(30, windowHeight, pos, 13400, 0.3)});
            $('#chapter3_2_4').css({'backgroundPosition': moveUp(30, windowHeight, pos, 15500, 0.2)});
        }*/

        /* chapter 4 */
        /*if($('#chapter4_1').hasClass("inview")){
            $('#chapter4_1').css({'backgroundPosition': bgPos(50, windowHeight, pos, 13000, 0.3)});

            $('#chapter4_1 .pseudo-static-container').css({'backgroundPosition': moveUp(28, windowHeight, pos, 13660, 0.5)});

            $('#chapter4_1_2').css({'backgroundPosition': moveUp(72, windowHeight, pos, 13300, 1.8)});

            repositionArrow('#navlink4');
        }
        if($('#chapter4_2').hasClass("inview")){
            $('#chapter4_2').css({'backgroundPosition': moveLeft(50, windowHeight, pos, 14000, 0.3, 15)});

            $('#chapter4_2 .pseudo-static-container').css({'backgroundPosition': moveUp(20, windowHeight, pos, 15000, 0.5)});

            $('#chapter4_2_2').css({'backgroundPosition': moveUp(100, windowHeight, pos, 14600, 0.3)});
            $('#chapter4_2_3').css({'backgroundPosition': moveUp(100, windowHeight, pos, 14500, 0.4)});
        }*/

        /* chapter 5 */
        /*if($('#chapter5_1').hasClass("inview")){
            $('#chapter5_1').css({'backgroundPosition': bgPos(50, windowHeight, pos, 15500, 0.3)});
            $('#chapter5_1_3').css({'backgroundPosition': bgPos(80, windowHeight, pos, 16165, 0.5)});

            $('#chapter5_1 .pseudo-static-container').css({'backgroundPosition': moveLeft(75, windowHeight, pos, 16600, 0.5, 80)});

            $('#chapter5_1_2').css({'backgroundPosition': moveUp(20, windowHeight, pos, 15400, 0.1)});

            repositionArrow('#navlink5');
        }
        if($('#chapter5_2').hasClass("inview")){
            //$('#chapter5_2').css({'backgroundPosition': bgPos(50, windowHeight, pos, 17800, 0.3)});

            $('#chapter5_2 .pseudo-static-container').css({'backgroundPosition': moveRight(1, windowHeight, pos, 21500, 0.05, 50, 5)});

            $('#chapter5_2_2').css({'backgroundPosition': moveUp(70, windowHeight, pos, 20000, 0.1)});
            $('#chapter5_2_3').css({'backgroundPosition': moveUp(70, windowHeight, pos, 20000, 0.1)});
            $('#chapter5_2_4').css({'backgroundPosition': moveUp(85, windowHeight, pos, 17085, 1)});

        }*/

        /* chapter 6 */
        /*if($('#chapter6_1').hasClass("inview")){
            $('#chapter6_1').css({'backgroundPosition': bgPos(50, windowHeight, pos, 17100, 0.3)});

            $('#chapter6_1 .pseudo-static-container').css({'backgroundPosition': moveUp(75, windowHeight, pos, 18400, 0.5)});

            $('#chapter6_1_2').css({'backgroundPosition': moveUp(30, windowHeight, pos, 17950, 1.4)});
            $('#chapter6_1_3').css({'backgroundPosition': moveUp(32, windowHeight, pos, 17970, 1.8)});
            $('#chapter6_1_4').css({'backgroundPosition': moveUp(33.5, windowHeight, pos, 17970, 2.2)});

            repositionArrow('#navlink6');
        }
        if($('#chapter6_2').hasClass("inview")){
            $('#chapter6_2').css({'backgroundPosition': bgPos(50, windowHeight, pos, 18400, 0.3)});

            $('#chapter6_2 .pseudo-static-container').css({'backgroundPosition': moveUp(25, windowHeight, pos, 19200, 0.5)});

            $('#chapter6_2_2').css({'backgroundPosition': moveUp(75, windowHeight, pos, 19000, 1)});

        }*/
        /*if($('#chapter6_3').hasClass("inview")){
            $('#chapter6_3').css({'backgroundPosition': bgPos(50, windowHeight, pos, 21700, 0.3)});
        }*/
		
		if($('#chapter0_1').hasClass("inview")){
            $('#chapter0_1').css({'backgroundPosition': firstPos(50, windowHeight, pos, 0, 0.2)});
            $('#chapter0_1 .pseudo-static-container').css({'backgroundPosition': moveUp(50, windowHeight, pos, 1400, 0.4)});

            repositionArrow('#navlink0');
		}
		if($('#chapter1_1').hasClass("inview")){
            $('#chapter1_1').css({'backgroundPosition': firstPos(50, windowHeight, pos, 0, 0.2)});
            $('#chapter1_1 .pseudo-static-container').css({'backgroundPosition': moveUp(50, windowHeight, pos, 1400, 0.4)});

            repositionArrow('#navlink1');
		}
		if($('#chapter2_1').hasClass("inview")){
            $('#chapter2_1').css({'backgroundPosition': firstPos(50, windowHeight, pos, 0, 0.2)});
            $('#chapter2_1 .pseudo-static-container').css({'backgroundPosition': moveUp(50, windowHeight, pos, 1400, 0.4)});

            repositionArrow('#navlink2');
		}
		if($('#chapter3_1').hasClass("inview")){
            $('#chapter3_1').css({'backgroundPosition': firstPos(50, windowHeight, pos, 0, 0.2)});
            $('#chapter3_1 .pseudo-static-container').css({'backgroundPosition': moveUp(50, windowHeight, pos, 1400, 0.4)});

            repositionArrow('#navlink3');
		}
		if($('#chapter4_1').hasClass("inview")){
            $('#chapter4_1').css({'backgroundPosition': firstPos(50, windowHeight, pos, 0, 0.2)});
            $('#chapter4_1 .pseudo-static-container').css({'backgroundPosition': moveUp(50, windowHeight, pos, 1400, 0.4)});

            repositionArrow('#navlink4');
		}
		if($('#chapter5_1').hasClass("inview")){
            $('#chapter5_1').css({'backgroundPosition': firstPos(50, windowHeight, pos, 0, 0.2)});
            $('#chapter5_1 .pseudo-static-container').css({'backgroundPosition': moveUp(50, windowHeight, pos, 1400, 0.4)});

            repositionArrow('#navlink5');
		}
		
        if($('#chapter6_1').hasClass("inview")){
            $('#chapter6_1').css({'backgroundPosition': bgPos(50, windowHeight, pos, 4200, 0.3)});

            $('#chapter6_1 .pseudo-static-container').css({'backgroundPosition': moveUp(75, windowHeight, pos, 5000, 0.5)});

            $('#chapter6_1_2').css({'backgroundPosition': moveUp(30, windowHeight, pos, 4850, 1.4)});
            $('#chapter6_1_3').css({'backgroundPosition': moveUp(32, windowHeight, pos, 4680, 1.8)});
            $('#chapter6_1_4').css({'backgroundPosition': moveUp(33.5, windowHeight, pos, 4680, 2.2)});

            repositionArrow('#navlink6');
        }
        if($('#chapter6_2').hasClass("inview")){
            $('#chapter6_2').css({'backgroundPosition': bgPos(50, windowHeight, pos, 5400, 0.3)});

            $('#chapter6_2 .pseudo-static-container').css({'backgroundPosition': moveUp(25, windowHeight, pos, 5700, 0.5)});

            $('#chapter6_2_2').css({'backgroundPosition': moveUp(75, windowHeight, pos, 5500, 1)});

        }
	}

	RepositionNav();

	$window.resize(function(){
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
    var navHeight = $('#nav').height() / 2;
    var windowCenter = (windowHeight / 2);
    var newtop = windowCenter - navHeight;
    $('#nav').css({"top": newtop}); //set the new top position of the navigation list
}

function repositionArrow(elem){
    var $window = $(window);
    var windowHeight = $window.height(); //get the height of the window

    if(elem === '#navlinkA' || elem === '#navlinkC'){
        var navTop = $(elem).parent().parent().position().top;
        var linkTop = $(elem).parent().position().top;
        var arrowHeight = $('#nav-arrow').height() / 2;

        var newTop = navTop - arrowHeight + linkTop + 10;
    }
    else {
        var topId = '#nav';

        var navHeight = $( topId ).height();

        var navOffset = windowHeight /2 - navHeight/2;
        var linkTop = $(elem).position().top;
        var arrowHeight = $('#nav-arrow').height() / 2;

        //console.log(linkTop);
        var newTop = navOffset + linkTop - arrowHeight + 10;
    }


    $('#nav-arrow').css({"top": newTop}); //set the new top position of the navigation list
}

function repositionOverlay(elem){
    var $window = $(window);
    var windowHeight = $window.height(); //get the height of the window


    if(elem === '#navlinkA' || elem === '#navlinkC'){
        var navTop = $(elem).parent().parent().position().top;
        var linkTop = $(elem).parent().position().top;
        var arrowHeight = $('#chapter-overlay').height() / 2;

        var newTop = navTop - arrowHeight + linkTop -4;

    }
    else{
        var navHeight = $('#nav').height();

        var navOffset = windowHeight /2 - navHeight/2;
        var linkTop = $(elem).position().top;
        var arrowHeight = $('#chapter-overlay').height() / 2;

        //console.log(linkTop);
        var newTop = navOffset + linkTop - arrowHeight - 4;
    }

    $('#chapter-overlay').css({"top": newTop});
}