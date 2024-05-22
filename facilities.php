<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Nearby facilities and landmarks</title>
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

     <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
     <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
     <script>
          const map = L.map('map').setView([7.091123069634382, 125.5084988219487], 11);

          // Add tile layer from OpenStreetMap
          L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
               attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(map);

          // Add marker for Miyaki's Inland Resort
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

          // Add markers for each nearby facility/landmark
     const blueIcon = new L.Icon({
          iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png',
          iconSize: [25, 41],
          iconAnchor: [12, 41],
          popupAnchor: [1, -34],
          shadowSize: [41, 41]
     });
     const nearbyFacilities = [
          {
               name: 'Davao Crocodile Park',
               location: [7.080365039996069, 125.6116428401517]
          },
          {
               name: 'Philippine Eagle Center',
               location: [7.102102085423811, 125.65446115615263]
          },
          {
               name: 'Eden Nature Park',
               location: [7.199021609480051, 125.33422523769572]
          },
          {
               name: 'SM Lanang Premier',
               location: [7.116127584461466, 125.63998985502563],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
               name: 'Davao International Airport',
               location: [7.130032760822432, 125.64763697058106],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
               name: 'San Pedro Cathedral',
               location: [7.0648255, 125.6070674],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
               name: 'Lon Wa Buddhist Temple',
               location: [7.087341811631875, 125.60794348584018],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
               name: 'Sta. Ana Wharf',
               location: [7.074360057171263, 125.63627988935816],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
               name: 'Davao Museum of History and Ethnography',
               location: [7.072746579318434, 125.60900165956855],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
               name: 'Felcris Centrale',
               location: [7.092420873053121, 125.6238464623359],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
               name: 'Museo Dabawenyo',
               location: [7.07275124206392, 125.60913715029229],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
               name: 'Roxas Night Market',
               location: [7.070448646865165, 125.61128191566663],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
               name: 'San Pedro Cathedral',
               location: [7.064985542931326, 125.60799385232717],
               icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {
          name: 'NCCC Mall',
          location: [7.071697355162737, 125.58932825207934],
          icon: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-blue.png'
          },
          {name: 'SM Lanang Premier', location: [7.116127584461466, 125.63998985502563]},
          {name: 'Davao International Airport', location: [7.129576082554957, 125.64534556811007]},
          {name: 'Abreeza Mall', location: [7.093618657661346, 125.61045172778085]},
          {name: 'People\'s Park', location: [7.070694738518086, 125.61013711780467]},
          {name: 'San Pedro Cathedral', location: [7.064975301546132, 125.6074948209037]},
          {name: 'Jack\'s Ridge', location: [7.080152821840378, 125.56892065288602]},
          {name: 'Crocodile Park', location: [7.135634746692887, 125.61870340735042]},
          {name: 'Philippine Eagle Center', location: [7.134533131475637, 125.65609679081016]},
          {name: 'Eden Nature Park', location: [7.213874517740234, 125.29622723161715]},
          {name: 'Malagos Garden Resort', location: [7.155049920774633, 125.40616214355182]},
          {name: 'Pearl Farm Beach Resort', location: [6.937021736840845, 125.59335737805758]},
          {name: 'Samal Island', location: [7.072989883994944, 125.72064782972852]},
          {name: 'Mount Apo', location: [7.004320865216319, 125.16216364866045]},
          {name: 'Lake Sebu', location: [6.229018655181388, 124.6427263634644]},
          {name: 'Hagimit Falls', location: [6.84967466309795, 125.22885369768497]},
          {name: 'T\'boli Museum', location: [6.284083307907296, 124.99098248353996]},
          {name: 'Kadayawan Festival', location: [7.064293317617023, 125.60991136436082]},
          {name: 'Apo View Hotel', location: [7.073489500928246, 125.61130598593838]},
          {name: 'SM City Davao', location: [7.060854249428666, 125.5886784767961]},
          {name: 'Gaisano Mall of Davao', location: [7.055578829417144, 125.59270540260397]},

     ];
     nearbyFacilities.forEach((facility) => {
          const marker = L.marker(facility.location, {
               icon: blueIcon
          }).addTo(map); 
          marker.bindPopup(`<b>${facility.name}</b>`).openPopup();
     });

</script>

</body>
</html>

