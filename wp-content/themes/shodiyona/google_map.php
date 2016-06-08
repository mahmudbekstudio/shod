<!DOCTYPE html>
<html>
<head>
	<title><?php echo $address ?></title>
	<meta name="viewport" content="initial-scale=1.0">
	<meta charset="utf-8">
	<style>
		html, body {
			height: 100%;
			margin: 0;
			padding: 0;
		}
		#map {
			height: 100%;
		}
	</style>
</head>
<body>
<div id="map"></div>
<script>
	function initMap() {
		var myLatLng = {lat: <?php echo $lat ?>, lng: <?php echo $lng ?>};

		// Create a map object and specify the DOM element for display.
		var map = new google.maps.Map(document.getElementById('map'), {
			center: myLatLng,
			scrollwheel: false,
			zoom: 15
		});

		// Create a marker and set its position.
		var marker = new google.maps.Marker({
			map: map,
			position: myLatLng,
			title: '<?php echo $address ?>'
		});

	}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC_mcNfBKMZwbJ5kxrWNSr9j-O_SS5Q8hA&callback=initMap"><?php /*&signed_in=true*/ ?>
</script>
</body>
</html>