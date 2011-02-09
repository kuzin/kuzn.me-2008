
/*                                     JQUERY ON DOC READY
__________________________________________________________
*/

$(document).ready(function(){



	/* ---SMOOTH SCROLL----------------------------- */
	
	$('div#navbar a').smoothScroll({
        afterScroll: function() {
        	/* location.hash = this.hash; */
        }
    });
    
    $('div#bio a').smoothScroll({
        afterScroll: function() {
        	/* location.hash = this.hash; */
        }
    });



	/* ---NAV BAR ANIMATION------------------------- */

   	var w = $(window).width();
   	
   	var thisguy = (w/2)-1421;
   	var mywork = (w/2)-1325;
   	var whaticando = (w/2)-1213;
   	var messageme = (w/2)-1091;
   	
   	var lastclicked = 1421;
	
    $('div#navbar').css({backgroundPosition: thisguy +'px 0'});
    
    
    
    /* ---FOOTER HEIGHT FIX------------------------- */
    
    var h = $(window).height();
    $("div#contact").css("min-height", h - 334 +'px');



	/* ---NAV BAR ANIMATION------------------------- */
	
	function isScrolledIntoView(elem) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();

        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(elem).height();

        return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom));
    }

    $(window).scroll(function() {
        if(isScrolledIntoView('#about')) {
        	$('div#navbar').stop().animate({backgroundPosition: thisguy +'px 0'}, {duration:300});
       		lastclicked = 1421;
        } else if(isScrolledIntoView('#work')) {
            $('div#navbar').stop().animate({backgroundPosition: mywork +'px 0'}, {duration:300});
       		lastclicked = 1325;
        } else if(isScrolledIntoView('#services')) {
       		$('div#navbar').stop().animate({backgroundPosition: whaticando +'px 0'}, {duration:300});
        	lastclicked = 1213;
        } else {
        	$('div#navbar').stop().animate({backgroundPosition: messageme +'px 0'}, {duration:300});
        	lastclicked = 1091;
        }
    });



	/* ---BROWSER RESIZE - NAVBAR FIX--------------- */
	
    $(window).resize(function() {
    	var w = $(window).width();
    	
    	var thisguy = (w/2)-1421;
	   	var mywork = (w/2)-1325;
	   	var whaticando = (w/2)-1213;
	   	var messageme = (w/2)-1091;
    	
		$('div#navbar').css({backgroundPosition: (w/2)-lastclicked +'px 0'});
		
		$(window).scroll(function() {
	        if(isScrolledIntoView('#about')) {
	        	$('div#navbar').stop().animate({backgroundPosition: thisguy +'px 0'}, {duration:300});
	       		lastclicked = 1421;
	        } else if(isScrolledIntoView('#work')) {
	            $('div#navbar').stop().animate({backgroundPosition: mywork +'px 0'}, {duration:300});
	       		lastclicked = 1325;
	        } else if(isScrolledIntoView('#services')) {
	       		$('div#navbar').stop().animate({backgroundPosition: whaticando +'px 0'}, {duration:300});
	        	lastclicked = 1213;
	        } else {
	        	$('div#navbar').stop().animate({backgroundPosition: messageme +'px 0'}, {duration:300});
	        	lastclicked = 1091;
	        }
        });
        
        
	    // Footer height fix after resize
	    var h = $(window).height();
    	$("div#contact").css("min-height", h - 334 +'px');
	    
    });



	/* ---HOMEPAGE FANCYBOX------------------------- */
	
	$("a[rel=thumbs]").fancybox({
		'titleShow': true,
		'titlePosition'	: 'over'
	});



	/* ---SORT WORK DROPDOWN------------------------ */

	$('div.logowork').hide();
	$('select#sortwork').val('webwork');
	
	$('select#sortwork').change(function() {
	    $('div.webwork').hide();
	    $('div.logowork').hide();
	    $('div.' + $(this).val()).stop().fadeTo(600, 1);
	});



	/* ---FADE CAPTION ON HOVER--------------------- */	

	$('div.webwork, div.logowork').hover(function(){
		$(this).children('div.caption').stop().fadeTo(400, 1);
	},function(){
		$(this).children('div.caption').stop().fadeTo(600, 0);
	});
	
	$('div.caption').hide();



	/* ---ALL EXTERNAL LINKS OPEN IN NEW WINDOW----- */	
	
	jQuery("a[href^='http:']").not("[href*='danklammer.com']").attr('target','_blank');



	/* ---SPAM BLOCKER------------------------------ */	

	$('a#email').each(function(){
		e = this.rel.replace('/','@').replace('site','danklammer.com');
		this.href = 'mailto:' + e;
		// $(this).text(e);
	});
});




