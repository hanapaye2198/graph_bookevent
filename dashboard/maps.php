<?php
include 'header.php';
?>

<body>
     <div class="container-fluid">
          <div class="row">
               <?php include 'sidebar.php'; ?>
               <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <div id="miyakiMapLoc" style="height: 500px; width:1000px;"></div>
               </div>
          </div>
     </div>
</body>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
     $(document).ready(function() {
          $('.js-example-basic-single').select2();
     });
</script>
<style>
      #miyakiMapLoc {
      height: calc(100vh - 100px); /* 100px for the header */
      position: absolute;
      top: 100px;
      right: 0;
      bottom: 0;
      left: 100px; /* width of the sidebar */
    }
</style>
<script>
     const miyakiMapLoc = L.map('miyakiMapLoc').setView([7.091123069634382, 125.5084988219487], 5);
     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(miyakiMapLoc);

     L.marker([7.091123069634382, 125.5084988219487]).addTo(miyakiMapLoc)
          .bindPopup('Miyaki Inland <br> Resport')
          .openPopup();
</script>
