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

	if(window.history.length == 1) {
		$('.back-prev-page').addClass('hide');
	}

	$('.back-prev-page').on('click', function() {
		window.history.back();
		return false;
	});

	var scrollXHR;
	var postsPaged = 1;
	$(window).scroll(function() {
		if(!scrollXHR && $(window).scrollTop() + $(window).height() >= $(document).height() - $('#footer').height())
		{
			$('.ajax-load').removeClass('hide');
			postsPaged++;

			scrollXHR = $.ajax({
				type: 'post',
				data: {postsPaged: postsPaged, ajaxLoad: true},
				success: function(data) {
					if($.trim(data)) {
						scrollXHR = null;
						$('.ajax-load').replaceWith(data);
					} else {
						$('.ajax-load').addClass('hide');
					}
				},
				error: function(xmlHttp, statusTxt, errorThrown) {
					scrollXHR = null;
					console.log(statusTxt);
				},
				dataType: 'html',
				async: true
			});
		}
	});

	$(document)
		.on('click', '.open-google-popup', function() {
			var link = $(this).attr('href');
			$.fancybox({
				'width'             : '75%',
				'maxHeight'            : '75%',
				'autoScale'         : false,
				'transitionIn'      : 'none',
				'transitionOut'     : 'none',
				'type'              : 'iframe',
				href: link,
				iframe     : {
					preload : false // this will prevent to place map off center
				}
			});
			return false;
		})
		.on('click', '.rating .fa', function() {
			var star = $(this);
			var list = star.closest('.rating').find('.fa');
			list.removeClass('active');
			var start = false;
			var starValue = 0;
			list.each(function() {
				var item = $(this);

				if(start || item[0] == star[0]) {
					item.addClass('active');
					start = true;
					starValue++;
				}
			});

			star.siblings('.rating-value').val(starValue);
		})
		.on('submit', '.send-form-ajax', function() {
			$(this).ajaxForm({
				beforeSubmit: function(formData, jqForm, options) {
					//
				},
				clearForm: true,
				data: {ajaxform: 1},
				dataType: 'json',
				error: function() {
					alert('Error.');
				},
				success: function(responseText, statusText, xhr, $form) {
					//
				},
				target: null
				//uploadProgress
			});
			return false;
		});

});
