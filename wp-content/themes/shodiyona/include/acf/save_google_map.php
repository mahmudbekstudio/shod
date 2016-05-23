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
		$map = get_field('map');
		$mapURL = THEME_PATH . '/maps/map_' . get_the_ID() . '.png';
		if(file_exists($mapURL)) {
			echo '<img src="' . get_bloginfo( 'template_directory' ) . '/maps/map_' . get_the_ID() . '.png' . '">';
		}
		?>

		<?php if(isset($map['address']) && $map['address'] != '') : ?>
		<img class="save-google-map-image" src="http://maps.googleapis.com/maps/api/staticmap?center=<?php echo urlencode($map['address']); ?>&zoom=14&scale=false&size=256x226&maptype=roadmap&format=png&visual_refresh=true&markers=size:small%7Ccolor:0xff0000%7Clabel:R%7C<?php echo urlencode($map['address']); ?>">
		<?php endif; ?>

		<button type="button" class="save-google-map acf-button">Generate Google Map</button>
		<script>
			(function($) {
				var saveGoogleMapInput = $('input[name="<?php echo $field['name'] ?>"]');
				//saveGoogleMapInput.addClass('hidden');
				var mapContainer = $('#acf-map');
				mapContainer.on('change', '.input-address', function() {
					var mapAddress = $.trim(mapContainer.find('.input-address').val());
					var mapLat = $.trim(mapContainer.find('.input-lat').val());
					var mapLng = $.trim(mapContainer.find('.input-lng').val());

					var mapUrl = 'https//maps.googleapis.com/maps/api/staticmap?center=' + mapAddress;
					mapUrl += '&zoom=14&size=256x226&maptype=roadmap&markers=color:red|label:R|' + mapLat + ',' + mapLng + '&key=AIzaSyCtjMo5SZD5YHfCgwElAiwd40-cBgFCNOI';
					saveGoogleMapInput.val(mapUrl);

				});

				if(!saveGoogleMapInput.val()) {
					$('.save-google-map').addClass('hidden');
				}

				$('.save-google-map-image').on('load', function() {
					var canvas = document.createElement('canvas');
					canvas.width = this.naturalWidth; // or 'width' if you want a special/scaled size
					canvas.height = this.naturalHeight; // or 'height' if you want a special/scaled size

					canvas.getContext('2d').drawImage(this, 0, 0);

					console.log(canvas.toDataURL('image/png'));

					// Get raw image data
					//callback(canvas.toDataURL('image/png').replace(/^data:image\/(png|jpg);base64,/, ''));

					// ... or get as Data URI
					//callback(canvas.toDataURL('image/png'));
				});

				$('.save-google-map').on('click', function() {
					var btn = $(this);
					var message = $('.save-google-map-message');
					var saveGoogleMapInputVal = saveGoogleMapInput.val();

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

						var mapUrl = 'https://maps.googleapis.com/maps/api/staticmap?center=' + mapAddress;
						mapUrl += '&format=png&scale=false&visual_refresh=true&zoom=14&size=256x226&maptype=roadmap&markers=color:red|label:R|' + mapLat + ',' + mapLng + '&key=AIzaSyCtjMo5SZD5YHfCgwElAiwd40-cBgFCNOI';
						saveGoogleMapInput.val(mapUrl);
						//btn.prop('disabled', true);
						//btn.closest('.field').append('<img src="' + mapUrl + '">');
						//$('.save-google-map-image').removeClass('hidden').attr('src', mapUrl);

						function getDataUri(url, callback) {
							var image = new Image();

							image.onload = function () {
								var canvas = document.createElement('canvas');
								canvas.width = this.naturalWidth; // or 'width' if you want a special/scaled size
								canvas.height = this.naturalHeight; // or 'height' if you want a special/scaled size

								canvas.getContext('2d').drawImage(this, 0, 0);

								// Get raw image data
								callback(canvas.toDataURL('image/png').replace(/^data:image\/(png|jpg);base64,/, ''));

								// ... or get as Data URI
								callback(canvas.toDataURL('image/png'));
							};

							image.src = url;//encodeURI(url).replace('%7C', '|');
						}

						// Usage
						getDataUri(mapUrl, function(dataUri) {
							//$('.save-google-map-image').removeClass('hidden').attr('src', mapUrl);
							console.log(dataUri);
						});

						/*$.ajax({
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
						});*/
					}
					return false;
				});
			})(jQuery);
		</script>
		<?
	}

}

new save_google_map();