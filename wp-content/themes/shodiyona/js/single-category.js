$(document).ready(function() {
	var swiper = new Swiper('.single-gallery-container', {
		pagination: '.swiper-pagination',
		slidesPerView: 3,
		paginationClickable: true,
		spaceBetween: 30,
		freeMode: true
	});

	$('.single-gallery-slide-image').fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});