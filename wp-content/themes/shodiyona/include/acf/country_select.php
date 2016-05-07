<?php
class select_country extends acf_field_text {

	function __construct()
	{
		// vars
		$this->name = 'select_country';
		$this->label = __("Select country");
		$this->category = __("Custom");
		$this->defaults = array(
			'default_value'	=>	'',
			'formatting' 	=>	'html',
			'maxlength'		=>	'',
			'placeholder'	=>	'',
			'prepend'		=>	'',
			'append'		=>	''
		);


		// do not delete!
		acf_field::__construct();
	}

	function create_field( $field )
	{
		parent::create_field($field);

		global $q_config, $countryList;
		$country = '';
		$region = '';
		$city = '';
		$district = '';
		foreach($countryList as $key=>$val) {
			$country .= '<option value="' . $key . '">' . Language::__($key) . '</option>';
			if(count($val) > 0) {
				foreach($val as $regionKey => $regionVal) {
					$region .= '<option value="' . $regionKey . '" data-country="' . $key . '">' . Language::__($regionKey) . '</option>';
					if(count($regionVal) > 0) {
						foreach($regionVal as $cityKey => $cityVal) {
							$city .= '<option value="' . $cityKey . '" data-country="' . $key . '" data-region="' . $regionKey . '">' . Language::__($cityKey) . '</option>';
							if(count($cityVal) > 0) {
								foreach($cityVal as $districtKey => $districtVal) {
									$district .= '<option value="' . $districtVal . '" data-country="' . $key . '" data-region="' . $regionKey . '" data-city="' . $cityKey . '">' . Language::__($districtVal) . '</option>';
								}
							}
						}
					}
				}
			}
		}
		echo '<select class="select-country-country">';
		echo '<option value="">' . Language::__('Select Country') . '</option>';
		echo $country;
		echo '</select>';

		echo '<select class="select-country-region hidden">';
		echo '<option value="">' . Language::__('Select Region') . '</option>';
		echo $region;
		echo '</select>';

		echo '<select class="select-country-city hidden">';
		echo '<option value="">' . Language::__('Select City') . '</option>';
		echo $city;
		echo '</select>';

		echo '<select class="select-country-district hidden">';
		echo '<option value="">' . Language::__('Select Dsitrict') . '</option>';
		echo $district;
		echo '</select>';
		?>
		<script>
			(function($) {
				var selectCountryInput = $('input[name="<?php echo $field['name']; ?>"]');
				var selectCountryVal = JSON.parse(selectCountryInput.val());
				console.log(selectCountryVal);
				selectCountryInput.addClass('hidden');
				$('.select-country-country').on('change', function() {
					var val = jQuery(this).val();
					var region = $('.select-country-region');
					var city = $('.select-country-city');
					var district = $('.select-country-district');

					region.addClass('hidden');
					city.addClass('hidden');
					district.addClass('hidden');

					region.find('[data-country]').addClass('hidden');
					city.find('[data-country]').addClass('hidden');
					district.find('[data-country]').addClass('hidden');

					region.val('');
					city.val('');
					district.val('');

					if(val != '') {
						region.removeClass('hidden');
						region.find('[data-country="' + val + '"]').removeClass('hidden');
					}

					var countryVal = {};
					countryVal['country'] = val;
					selectCountryInput.val(JSON.stringify(countryVal));
				});

				if(selectCountryVal.country) {
					$('.select-country-country').val(selectCountryVal.country);
				}
				$('.select-country-country').trigger('change');

				$('.select-country-region').on('change', function() {
					var val = jQuery(this).val();
					var city = $('.select-country-city');
					var district = $('.select-country-district');

					city.addClass('hidden');
					district.addClass('hidden');

					city.find('[data-country]').addClass('hidden');
					district.find('[data-country]').addClass('hidden');

					city.val('');
					district.val('');

					if(val != '') {
						city.removeClass('hidden');
						city.find('[data-region="' + val + '"]').removeClass('hidden');
					}

					var countryVal = {};
					countryVal['country'] = $('.select-country-country').val();
					countryVal['region'] = val;
					selectCountryInput.val(JSON.stringify(countryVal));
				});

				if(selectCountryVal.region) {
					$('.select-country-region').val(selectCountryVal.region).trigger('change');
				}

				$('.select-country-city').on('change', function() {
					var val = jQuery(this).val();
					var district = $('.select-country-district');

					district.addClass('hidden');

					district.find('[data-country]').addClass('hidden');

					district.val('');

					if(val != '') {
						district.removeClass('hidden');
						district.find('[data-city="' + val + '"]').removeClass('hidden');
					}

					var countryVal = {};
					countryVal['country'] = $('.select-country-country').val();
					countryVal['region'] = $('.select-country-region').val();
					countryVal['city'] = val;
					selectCountryInput.val(JSON.stringify(countryVal));
				});

				if(selectCountryVal.city) {
					$('.select-country-city').val(selectCountryVal.city).trigger('change');
				}

				$('.select-country-district').on('change', function() {
					var val = jQuery(this).val();
					var countryVal = {};
					countryVal['country'] = $('.select-country-country').val();
					countryVal['region'] = $('.select-country-region').val();
					countryVal['city'] = $('.select-country-city').val();
					countryVal['district'] = val;
					selectCountryInput.val(JSON.stringify(countryVal));
				});

				if(selectCountryVal.district) {
					$('.select-country-district').val(selectCountryVal.district).trigger('change');
				}
			})(jQuery);
		</script>
		<?php
	}

}

new select_country();