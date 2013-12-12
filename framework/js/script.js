(function ($) {
jQuery(document).ready(function($){

	/**
     * Fire Fitvids
     */
	jQuery( 'body' ).fitVids();


    /**
     * Navigation
     */

    // Add .parent class to appropriate menu items
    jQuery( 'ul.sub-menu' ).parent().addClass( 'parent' );


    // Add the 'show-nav' class to the body when the nav toggle is clicked
    jQuery( '.nav-toggle' ).click(function(e) {

        // Prevent default behaviour
        e.preventDefault();

        // Add the 'show-nav' class
        jQuery( 'body' ).toggleClass( 'show-nav' );

    });


    // Remove the 'show-nav' class from the body when the nav-close anchor is clicked
    jQuery('.nav-close').click(function(e) {

        // Prevent default behaviour
        e.preventDefault();

        // Remove the 'show-nav' class
        jQuery( 'body' ).removeClass( 'show-nav' );
    });


    // Remove the 'show-nav' class from the body when the use clicks (taps) outside #navigation
    var hasParent = function(el, id) {
        if (el) {
            do {
                if (el.id === id) {
                    return true;
                }
                if (el.nodeType === 9) {
                    break;
                }
            }
            while((el = el.parentNode));
        }
        return false;
    };

    if (jQuery(window).width() < 767) {
        if (jQuery('body')[0].addEventListener){
            document.addEventListener('touchstart', function(e) {
            if ( jQuery( 'body' ).hasClass( 'show-nav' ) && !hasParent( e.target, 'navigation' ) ) {
                // Prevent default behaviour
                e.preventDefault();

                // Remove the 'show-nav' class
                jQuery( 'body' ).removeClass( 'show-nav' );
            }
        }, false);
        } else if (jQuery('body')[0].attachEvent){
            document.attachEvent('ontouchstart', function(e) {
            if ( jQuery( 'body' ).hasClass( 'show-nav' ) && !hasParent( e.target, 'navigation' ) ) {
                // Prevent default behaviour
                e.preventDefault();

                // Remove the 'show-nav' class
                jQuery( 'body' ).removeClass( 'show-nav' );
            }
        });
        }
    }


    /**
     * Scroll to top
     */
    jQuery(function () {
        jQuery( '.back-to-top' ).click(function () {
            jQuery( 'body,html' ).animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
    $(window).scroll(function() {
        if ( $(this).scrollTop() > 200 ) {
            $( '.back-to-top' ).fadeIn();
        } else {
            $( '.back-to-top' ).fadeOut();
        }
    });

});
}(jQuery));