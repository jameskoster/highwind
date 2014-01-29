(function ($) {

	// Wrap ampersands in span.ampersand
	$( 'p:contains('&')' ).each(function(){
		$( this ).html( $( this ).html().replace( /&amp;/, "<span class='ampersand'>&amp;</span>" ) );
	});

	$( 'table tr:nth-child(2n)' ).addClass( 'alt' );

}(jQuery));