$(document).ready(function() {
	$('.slider').slider();
	$(".chosen-select").chosen({
		'display_disabled_options': false
	});

	$('.select-country-city').on('change', function() {
		var val = $(this).val();
		var districtSelect = $('.select-country-district');
		districtSelect.find('option').prop('disabled', true);
		for(var key in val) {
			districtSelect.find('option[data-parent="' + val[key] + '"]').prop('disabled', false);
		}
		districtSelect.trigger('chosen:updated');
	});
	$('.select-country-city').trigger('change');

	$('.category-filter-update').on('click', function() {
		var btn = $(this);
		btn.prop('disabled', true);
		var list = $('.category-items-list');
		list.children().addClass('hide');
		list.find('.ajax-load').removeClass('hide');

		btn.closest('.category-filter-wrapper').ajaxSubmit({'success': function(data) {
			btn.prop('disabled', false);
			list.html(data);
		}, "dataType": "html"});
		return false;
	});
});