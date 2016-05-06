$(document).ready(function(){
	$(function () {
		$.scrollUp({
	        scrollName: 'scrollUp', // Element ID
	        scrollDistance: 300, // Distance from top/bottom before showing element (px)
	        scrollFrom: 'top', // 'top' or 'bottom'
	        scrollSpeed: 300, // Speed back to top (ms)
	        easingType: 'linear', // Scroll to top easing (see http://easings.net/)
	        animation: 'fade', // Fade, slide, none
	        animationSpeed: 200, // Animation in speed (ms)
	        scrollTrigger: false, // Set a custom triggering element. Can be an HTML string or jQuery object
					//scrollTarget: false, // Set a custom target element for scrolling to the top
	        scrollText: '<i class="fa fa-angle-up"></i>', // Text for element, can contain HTML
	        scrollTitle: false, // Set a custom <a> title if required.
	        scrollImg: false, // Set true to use image
	        activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
	        zIndex: 2147483647 // Z-Index for the overlay
		});
	});

	$('.material-menu-list').materialmenu();

	var swiper = new Swiper('.swiper-container', {
		pagination: '.swiper-pagination',
		paginationClickable: true,
		slidesPerView: 'auto',
		nextButton: '.swiper-button-next',
		prevButton: '.swiper-button-prev',
		loop: true,
		spaceBetween: 30,
		//autoplay: 3000,
		autoplayDisableOnInteraction: false
	});

	$('.currency-list').on('click', 'a', function() {
		var currency = $(this).data('currency');
		$.cookie('currencyCode', currency, { expires: 30, path: '/'});
		window.location.reload();
		return false;
	});

	$('.back-prev-page').on('click', function() {
		window.history.back();
		return false;
	});

});
