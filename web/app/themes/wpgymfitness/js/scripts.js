jQuery(document).ready(($) => {

	// Make the Main menu responsive
	$('#menu-main-navigation').slicknav({
		// appendTo: '.site-header'
	})

	// Run Bx Slider on Testimonials
	$('.testimonials-list').bxSlider({
		controls: false,
		mode: 'fade',
	})

});