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

	// Add Fixed Menu when page is ready & position > 300px
	const headerScroll = document.querySelector('.navigation-bar')
	const rect = headerScroll.getBoundingClientRect()
	const topDistance = Math.abs(rect.top)
	fixedMenu(topDistance)

})

// ADD & REMOVE "fixed-top" classes
window.onscroll = () => {
	const scroll = window.scrollY

	fixedMenu(scroll)
}

// Add Fixed Top Menu Navbar
function fixedMenu(scroll) {
	const headerScroll = document.querySelector('.navigation-bar')

	// Case: If scroll position > 300px
	if (scroll > 300) {
		headerScroll.classList.add('fixed-top')
	} else {
		headerScroll.classList.remove('fixed-top')
	}
}