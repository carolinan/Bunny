jQuery(document).ready(function($) {
	/* Thanks to: Keyboard Accessible Dropdown Menus
	Copyright 2013 Amy Hendrix (email : amy@amyhendrix.net), Graham Armfield (email : graham.armfield@coolfields.co.uk)
	License:      MIT
	Plugin URI:   http://github.com/sabreuse/accessible-menus
	*/
	
	$('#header-menu li').hover(
		function(){$(this).addClass("keyboard-dropdown");},
		function(){$(this).delay('250').removeClass("keyboard-dropdown");}
	);
	$('#header-menu li a').on('focus blur',
		function(){$(this).parents().toggleClass("keyboard-dropdown");}
	);
	
	$("#mobile-menu").click(function(){
		$(".nav-menu").toggle();
	});

});

/*Skip links http://www.nczonline.net/blog/2013/01/15/fixing-skip-to-content-links/ */
window.addEventListener("hashchange", function(event) {
    var element = document.getElementById(location.hash.substring(1));
    if (element) {
        if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
            element.tabIndex = -1;
        }
        element.focus();
    }
}, false); 
