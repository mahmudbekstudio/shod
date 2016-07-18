$(document).ready(function() {
	var swiperParams = {
		pagination: '.swiper-pagination',
		slidesPerView: 3,
		paginationClickable: true,
		spaceBetween: 30,
		freeMode: true
	};

	var swiper;

	$(window).on('resize', function() {
		var width = parseInt($(window).width());

		if(width >= 1185) {
			swiperParams.slidesPerView = 3;
		} else if(width >= 615) {
			swiperParams.slidesPerView = 2;
		} else {
			swiperParams.slidesPerView = 1;
		}

		if(swiper) {
			swiper.destroy();
		}

		swiper = new Swiper('.single-gallery-container', swiperParams);
	});

	$(window).trigger('resize');

	$('.single-gallery-slide-image').fancybox({
		openEffect	: 'none',
		closeEffect	: 'none'
	});
});