jQuery(function($) {
	'use strict';

	document.addEventListener('DOMContentLoaded', function() {

		// IE Hack
		if (navigator.userAgent.indexOf("MSIE") > -1) {
			document.body.classList.add("ie");
		}

	});

    // Cookie
    // tarteaucitron.init({
    //     "hashtag": "#tarteaucitron", /* Ouverture automatique du panel avec le hashtag */
		// 		"cookieName": "tartaucitron", /* Cookie name */
		// 		"AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
    //     "highPrivacy": false, /* désactiver le consentement implicite (en naviguant) ? */
    //     "orientation": "bottom", /* le bandeau doit être en haut (top) ou en bas (bottom) ? */
    //     "adblocker": false, /* Afficher un message si un adblocker est détecté */
    //     "showAlertSmall": false, /* afficher le petit bandeau en bas à droite ? */
    //     "cookieslist": false, /* Afficher la liste des cookies installés ? */
    //     "removeCredit": false, /* supprimer le lien vers la source ? */
    //     "privacyUrl": "", /* Privacy policy url */
    // });
    // /* GOOGLE ANALYTICS */
    // tarteaucitron.user.analyticsUa = 'UA-XXXXXXXX-X';
    // tarteaucitron.user.analyticsMore = function () { /* add here your optionnal _ga.push() */ };
    // (tarteaucitron.job = tarteaucitron.job || []).push('analytics');

    // hauteurPage();

    toggleMenu();

    subMenuDisplay();

    subMenuOpen();

    // General
    scrollMenu();

    // En cas de redimensionnement de la fenetre
    $(window).on('resize', function() {
        // hauteurPage();
        subMenuDisplay();
    });

    $(document).ready(function() {
        $('a[data-mfp-src]').magnificPopup({type: 'image'});

		var scroll = new SmoothScroll('a[href*="#"]:not(.noscroll)',{offset:120});
    });

    $(window).scroll(function() {
        scrollMenu();
    });
    
    slider();
});


/* Redimensionne colonne de droite */
function hauteurPage(){
	// if (!$('body').hasClass('home')) {
		var heightEcran = $(window).height();
		var heightMain = $("main#main").height();
		var heightContent = heightMain;

		if ($("main#main section#head").length) {
			var heightBreadcrumb = $("main#main section#head").height();
			var heightContent = heightMain + heightBreadcrumb;
		}
		
		if(heightContent < (heightEcran - 158)){
			$("main#main").height(heightEcran - 158);
			// $("body").css("overflow", "hidden");
		} else {
			$("main#main").height("");
		}
	// }
}

/* Affiche le menu en mode responsive */
function toggleMenu() {
	$('#navigation nav a.mobile-menu').on('click', function(e) {
		e.preventDefault();
		$('ul#menu').slideToggle();
		$('#navigation nav').toggleClass('active');
	});
}

function subMenuDisplay() {
	
	if($(window).width() > 1073) {
		$('header #navigation nav ul#menu').css('display','block');
		if ($('header #navigation nav').hasClass('active')) {
			$('header #navigation nav').removeClass('active');
		}
	} else {
		if (!$('header #navigation nav').hasClass('active')) {
			$('header #navigation nav ul#menu').css('display','none');
		}
	}
}

function subMenuOpen() {

	$('#navigation nav li.menu-item-has-children a').on('click',function(e) {
		if($(window).width() <= 1073) {
			if($(this).next('ul').length) {
				$(this).next('ul').stop().slideToggle();
				e.preventDefault();
			}
		} else {
			if($('html.touch').length) {
				if($(this).next('ul').length) {
					e.preventDefault();
				}
			}
		}
	});
	
	$('#navigation nav li.menu-item-has-children').on('mouseenter', function(e) {
		if($(window).width() > 1073) {
			$(this).addClass('active');
		}
	});
	$('#navigation nav li.menu-item-has-children').on('mouseleave', function(e) {
		e.preventDefault();
		if($(window).width() > 1073) {
			$(this).removeClass('active');
		}
	});
}

function scrollMenu() {
	var windowTop = $(window).scrollTop();
	
	if(windowTop > 150) {
		$('body').addClass('scroll');
	} else {
		$('body').removeClass('scroll');
	}
}


/* FLEXSLIDER */
function slider() {
    if ($('.flexslider').length) {
    	$('.flexslider').each(function() {
			var animation = 'slide';
			var slideshowSpeed = 8000;
    		
    		if ($(this).hasClass('fade')) {
    			var animation = 'fade';
    			var slideshowSpeed = 6000;
    		} else {
    			var animation = 'slide';
    			var slideshowSpeed = 8000;
    		}

	        $(this).flexslider({
	            animation: animation,
	            animationLoop: true,
	            controlNav: true,
	            directionNav: true,
	            slideshowSpeed: slideshowSpeed,
	            start: function() {
	                $('.flex-direction-nav').wrap('<div class="custom-navigation"></div>');
	                $('.flex-control-nav').remove();
	                $('.flex-direction-nav a').addClass('noscroll');
	            },
	            before: function() {
	                $('.flex-direction-nav').fadeOut();
	                $('.slides .projet').fadeOut();
	                $('.slides .projet').fadeIn();
	                $('.flex-direction-nav').fadeIn();
	            }
	        });
    	});
    }
}