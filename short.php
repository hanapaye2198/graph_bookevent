<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Shortest Path Route</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/css/style.css">
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
     <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
     <style>
          .body {
               margin: 0;
               padding: 0;
          }
     </style>
</head>

<body>
     <?php include 'navbar.php'; ?>

     <div id="map" style="width: 100%; height:100vh;">
     </div>


</body>

</html>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<script>
     const map = L.map('map').setView([7.091123069634382, 125.5084988219487], 11);
     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(map);
     const redIcon = new L.Icon({
          iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
     });
     const marker1 = L.marker([7.091123069634382, 125.5084988219487], {
          icon: redIcon
     }).addTo(map)
     marker1.bindPopup('Miyakis<br> Inland Resort.').openPopup();

     map.on('click', function(e) {
          const secondMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map)
          secondMarker.bindPopup('My Location').openPopup();
          L.Routing.control({
               waypoints: [
                    L.latLng(7.091123069634382, 125.5084988219487),
                    L.latLng(e.latlng.lat, e.latlng.lng)
               ],
               routeWhileDragging: true
          }).addTo(map);
     });
</script>