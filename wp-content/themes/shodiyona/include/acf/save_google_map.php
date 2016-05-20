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
		$mapURL = THEME_PATH . '/maps/map_' . get_the_ID() . '.png';
		if(file_exists($mapURL)) {
			echo '<img src="' . get_bloginfo( 'template_directory' ) . '/maps/map_' . get_the_ID() . '.png' . '">';
		}
		?>
		<button type="button" class="save-google-map acf-button">Generate Google Map</button>
		<script>
			(function($) {
				var saveGoogleMapInput = $('input[name="<?php echo $field['name'] ?>"]');
				//saveGoogleMapInput.addClass('hidden');
				$('.save-google-map').on('click', function() {
					var btn = $(this);
					var message = $('.save-google-map-message');
					var saveGoogleMapInputVal = saveGoogleMapInput.val();

					var mapContainer = $('#acf-map');
					var mapAddress = $.trim(mapContainer.find('.input-address').val());
					var mapLat = $.trim(mapContainer.find('.input-lat').val());
					var mapLng = $.trim(mapContainer.find('.input-lng').val());
					var postID = $('#post_ID').val();

					if(!mapAddress || !mapLat || !mapLng) {
						alert('Select address');
					} else {
						message.addClass('hidden');
						message.removeClass('updated');
						message.removeClass('error');
						message.html('');

						var mapUrl = 'http://maps.googleapis.com/maps/api/staticmap?center=' + mapAddress;
						mapUrl += '&zoom=14&size=256x226&maptype=roadmap&markers=color:red|label:R|' + mapLat + ',' + mapLng + '&key=AIzaSyCtjMo5SZD5YHfCgwElAiwd40-cBgFCNOI';
						saveGoogleMapInput.val(mapUrl);
						btn.prop('disabled', true);

						$.ajax({
							type: 'post',
							url: '/',
							data: {savegooglemap: mapUrl, 'postID': postID},
							success: function(data) {
								btn.prop('disabled', false);
								message.removeClass('hidden');
								if(data.error) {
									message.addClass('error');
									message.html(data.error);
								} else {
									message.addClass('updated');
									message.html(data.message);
									btn.before('<img src="' + data.image + '">');
								}
							},
							dataType: 'json'
						});
					}
					return false;
				});
			})(jQuery);
		</script>
		<?
	}

}

new save_google_map();