jQuery(document).ready( function() {
	jQuery('.pickcolor').click(function(e) {
		colorPicker = jQuery(this).next('div');
		input = jQuery(this).prev('input');
	
		jQuery.farbtastic(jQuery(colorPicker), function(a) { jQuery(input).val(a).css('background', a); });
	
		colorPicker.show();
		e.preventDefault();
	
		jQuery(document).mousedown( function() { jQuery(colorPicker).hide(); });
	});
});