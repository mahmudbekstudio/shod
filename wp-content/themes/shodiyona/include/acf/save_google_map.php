<?php
class save_google_map extends acf_field_text {

	function __construct()
	{
		// vars
		$this->name = 'save_google_map';
		$this->label = __("Save google map");
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
		echo '<div class="save-google-map-message hidden"></div>';
		parent::create_field($field);
		?>
		<a href="" class="hidden open-google-map-link" target="_blank">Open google map in new tab</a>
		<script>
			(function($) {
				var saveGoogleMapInput = $('input[name="<?php echo $field['name'] ?>"]');
				saveGoogleMapInput.addClass('hidden');

				if(saveGoogleMapInput.val()) {
					$('.open-google-map-link').removeClass('hidden').attr('href', saveGoogleMapInput.val());
				}
				var mapContainer = $('#acf-map');
				mapContainer.on('change', '.input-address', function() {
					var mapAddress = $.trim(mapContainer.find('.input-address').val());
					var mapLat = $.trim(mapContainer.find('.input-lat').val());
					var mapLng = $.trim(mapContainer.find('.input-lng').val());

					var mapUrl = 'https://maps.googleapis.com/maps/api/staticmap?center=' + mapAddress;
					mapUrl += '&zoom=14&size=256x226&maptype=roadmap&markers=color:red|label:R|' + mapLat + ',' + mapLng;// + '&key=AIzaSyCtjMo5SZD5YHfCgwElAiwd40-cBgFCNOI'
					saveGoogleMapInput.val(mapUrl);
					$('.open-google-map-link').removeClass('hidden').attr('href', mapUrl);
				});
			})(jQuery);
		</script>
		<?
	}

}

new save_google_map();