
$(document).ready(function(){

	// SMOOTH SCROLL
	
	$('div#navbar a:not(#home)').smoothScroll({
	    offset: -50
	});
	$('div#navbar a#home').smoothScroll({
		offset: 0
	});
	
	$('.scroll ').smoothScroll({
	    offset: -50
	});

	// DROPDOWN HIDE
	
	$('div.logowork').hide();
	$('div.printwork').hide();
	$('div.sketchwork').hide();
	$('select#sortwork').val('webwork');
	
	$('select#sortwork').change(function() {
	    $('div.webwork').hide();
	    $('div.logowork').hide();
	    $('div.printwork').hide();
	    $('div.sketchwork').hide();
	    $('div.' + $(this).val()).stop().fadeTo(600, 1);
	});

	// FADE CAPTION ON HOVER
	
	$('div.webwork, div.logowork, div.printwork, div.sketchwork').hover(function(){
		$(this).children('div.caption').stop().fadeTo(400, 1);
	},function(){
		$(this).children('div.caption').stop().fadeTo(600, 0);
	});
	
	$('div.caption').hide();
	
	// EXTERNAL LINKS
	
	jQuery("a[href^='http:']").not("[href*='mikekuzin.com']").attr('target','_blank');
	
	// SPAM BLOCKER
	
	$('a#email').each(function(){
		e = this.rel.replace('/','@').replace('site','mikekuzin.com');
		this.href = 'mailto:' + e;
		// $(this).text(e);
	});

	
	// NAV BAR ANIMATION
	
	
	   	var w = $(window).width();
	   	
	    var home = (w/2)-1421;
	   	var worksamples = (w/2)-1340;
	   	var capabilities = (w/2)-1245;
	   	var whoami = (w/2)-1165;
	   	var getintouch = (w/2)-1085;
	   	
	   	var lastclicked = 1421;
		
	    $('div#navbar_arrow').css({backgroundPosition: home +'px 0'});
	    
	    
	    
	    // FOOTER HEIGHT FIX
	    
	    //var h = $(window).height();
	    //$("div#contact").css("min-height", h - 334 +'px');
	
	
	
		// NAV BAR ANIMATION
		
		function isScrolledIntoView(elem) {
	        var docViewTop = $(window).scrollTop();
	        var docViewBottom = docViewTop + $(window).height();
	
	        var elemTop = $(elem).offset().top;
	        var elemBottom = elemTop + $(elem).height();
	
	        return ((elemBottom >= docViewTop) && (elemTop <= docViewBottom));
	    }
	
	    $(window).scroll(function() {
	        if(isScrolledIntoView('#home')) {
	        	$('div#navbar_arrow').stop().animate({backgroundPosition: home +'px 0'}, {duration:300});
	       		lastclicked = 1421;
	        } else if(isScrolledIntoView('#work')) {
	            $('div#navbar_arrow').stop().animate({backgroundPosition: worksamples +'px 0'}, {duration:300});
	       		lastclicked = 1340;
	        } else if(isScrolledIntoView('#capabilities')) {
	       		$('div#navbar_arrow').stop().animate({backgroundPosition: capabilities +'px 0'}, {duration:300});
	        	lastclicked = 1245;
	    	} else if(isScrolledIntoView('#about')) {
	    			$('div#navbar_arrow').stop().animate({backgroundPosition: whoami +'px 0'}, {duration:300});
	    		lastclicked = 1165;
	        } else {
	        	$('div#navbar_arrow').stop().animate({backgroundPosition: getintouch +'px 0'}, {duration:300});
	        	lastclicked = 1085;
	        }
	    });
	    
	    // FONT CHANGES ON SCROLL
	    
	   // $(window).scroll(function() {
	   // 	if(isScrolledIntoView('#home')) {
	   // 	$('#home').addClass('active');	    	
	   // 	} else if(isScrolledIntoView('#work')) {
	   // 	$('#work-samples').addClass('active');
	   // 	$('#capabilities-id','who-am-i','get-in-touch').removeClass('active'); 
	   // 	} else if(isScrolledIntoView('#capabilities')) {
	   // 	$('#capabilities-id').addClass('active');
	   // 	$('#work-samples','#home').removeClass('active'); 
	   // 	}
	   // });
	    
	    
		/* ---BROWSER RESIZE - NAVBAR FIX--------------- */
		
	    $(window).resize(function() {
	    	var w = $(window).width();
	    	
	    	var home = (w/2)-1421;
		   	var worksamples = (w/2)-1340;
		   	var capabilities = (w/2)-1245;
		   	var whoami = (w/2)-1165;
		   	var getintouch = (w/2)-1085;
	    	
			$('div#navbar_arrow').css({backgroundPosition: (w/2)-lastclicked +'px 0'});
			
			$(window).scroll(function() {
		        if(isScrolledIntoView('#home')) {
		        	$('div#navbar_arrow').stop().animate({backgroundPosition: home +'px 0'}, {duration:300});
		       		lastclicked = 1421;
		        } else if(isScrolledIntoView('#work')) {
		            $('div#navbar_arrow').stop().animate({backgroundPosition: worksamples +'px 0'}, {duration:300});
		       		lastclicked = 1340;
		        } else if(isScrolledIntoView('#capabilities')) {
		       		$('div#navbar_arrow').stop().animate({backgroundPosition: capabilities +'px 0'}, {duration:300});
		        	lastclicked = 1245;
	        	} else if(isScrolledIntoView('#about')) {
	        			$('div#navbar_arrow').stop().animate({backgroundPosition: whoami +'px 0'}, {duration:300});
	        		lastclicked = 1165;
		        } else {
		        	$('div#navbar_arrow').stop().animate({backgroundPosition: getintouch +'px 0'}, {duration:300});
		        	lastclicked = 1085;
		        }
	        });
	        
	        
		    // Footer height fix after resize
		    //var h = $(window).height();
	    	//$("div#contact").css("min-height", h - 700 +'px');
		    
	    });	
	// FANCYBOX
	
	$("a[rel=thumbs]").fancybox({
		'titleShow': true,
		'titlePosition'	: 'over'
	});
	
	// BUTTONS
	
	$('.btn').each(function(){
		var b = $(this);
		var tt = b.text() || b.val();
		
		if ($(':submit,:button',this)) {
			b = $('<a>').insertAfter(this). addClass(this.className).attr('id',this.id);
			$(this).remove();
		}
		
		b.text('').css({cursor:'pointer'}). prepend('<i></i>').append($('<span>').
		
		text(tt).append('<i></i><span></span>'));
		
			
	

	});
	
});