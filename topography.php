<!DOCTYPE html>
<html>
<head>
	<title>Topographic Map with Leaflet</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
	<style>
		body {
			padding: 0;
			margin: 0;
		}

		#map {
			position: absolute;
			top: 0;
			bottom: 0;
			right: 0;
			left: 0;
		}
	</style>
</head>
<body>
<?php include 'navbar.php'; ?>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/gh/GitHubRiccardo/Leaflet.TileLayer.GeoTIFF/L.TileLayer.GeoTIFF.js"></script>
<script>
	var map = L.map('map').setView([7.091123069634382, 125.5084988219487], 15);

	L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
		maxZoom: 17,
		attribution: 'Map data &copy; <a href="https://opentopomap.org/about">OpenTopoMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>'
	}).addTo(map);

	L.marker([7.091123069634382, 125.5084988219487]).addTo(map)
		.bindPopup('Miyaki Resort')
		.openPopup();

	var tiffLayer = new L.TileLayer.GeoTIFF('https://your-geotiff-file-url.tif', {
		band: 0, // this selects which band to use for visualization (if your file contains multiple bands)
		displayMin: 0, // this sets the minimum value to display (useful for adjusting color ramp)
		displayMax: 1000, // this sets the maximum value to display (useful for adjusting color ramp)
		colorScale: 'viridis', // this sets the color scale to use for visualization
	}).addTo(map);
</script>

</body>
</html>
