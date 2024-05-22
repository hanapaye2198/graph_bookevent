<?php
@include 'header.php';
@include 'conn.php';

if (isset($_POST['submit'])) {

     $age = mysqli_real_escape_string($conn, $_POST['age']);
     $gender = mysqli_real_escape_string($conn, $_POST['gender']);
     $address = mysqli_real_escape_string($conn, $_POST['address']);

     if (empty($age) || empty($gender) || empty($address)) {
          die("Error: ALL FIELDS ARE REQUIRED");
     }
     // $name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : "visitor";
     $name = empty($_POST['name']) ? 'visitor' : mysqli_real_escape_string($conn, $_POST['name']);
     $sql = "INSERT INTO tbl_survey(name, age, gender, address, time_now) VALUES ('$name', '$age', '$gender', '$address', NOW())";
     if (mysqli_query($conn, $sql)) {
          echo "<script type='text/javascript'>
           window.location.href = 'index.php';
          alert('New record created successfully');
          </script>";
     } else {
          echo "Error: " . $sql . "<br>" . mysqli_error($conn);
     }
}
mysqli_close($conn);
?>

<body>
     <?php include 'navbar.php'; ?>
     <main>

          <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
               <div class="carousel-indicators">
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
               </div>
               <div class="carousel-inner">
                    <div class="carousel-item active">
                         <img class="bd-placeholder-img" width="100%" height="mx-auto" src="img/1.jpg" alt="miyaki">
                         <div class="container">
                              <div class="carousel-caption text-start">
                                   <h1 style="color:black;">Example headline.</h1>
                                   <p style="color:black;">Some representative placeholder content for the first slide of the carousel.</p>
                                   <p><a class="btn btn-lg btn-warning" href="short.php">Shortest Route</a></p>
                              </div>
                         </div>
                    </div>
                    <div class="carousel-item">
                         <img class="bd-placeholder-img" width="100%" height="mx-auto" src="img/2.jpg" alt="miyaki">
                         <div class="container">
                              <div class="carousel-caption">
                                   <h1 style="color:white;">Another example headline.</h1>
                                   <p style="color:white;">Some representative placeholder content for the second slide of the carousel.</p>
                                   <p><a class="btn btn-lg btn-warning" href="#">Disatance to Nearby Facilities</a></p>
                              </div>
                         </div>
                    </div>
                    <div class="carousel-item text-end">
                         <img class="bd-placeholder-img" width="100%" height="mx-auto" src="img/3.jpg" alt="miyaki">
                         <div class="container">
                              <div class="carousel-caption">
                                   <h1 style="color:white;">One more for good measure.</h1>
                                   <p style="color:white;">Some representative placeholder content for the third slide of this carousel.</p>
                                   <p><a class="btn btn-lg btn-warning" href="topography.php">Topography</a></p>
                              </div>
                         </div>
                    </div>
               </div>
               <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
               </button>
               <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
               </button>
          </div>
          <div class="container marketing">

               <!-- Three columns of text below the carousel -->
               <div class="row">
                    <div class="col-lg-4">
                         <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="img/1.jpg" alt="">
                         <h2 class="fw-normal">Shortest Path </h2>
                         <p>Some representative placeholder content for the three columns of text below the carousel. This is the
                              first column.</p>
                         <p><a class="btn btn-secondary" href="short.php">Shortest Path &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                         <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="img/2.jpg" alt="">
                         <h2 class="fw-normal">Amenities/Services</h2>
                         <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second
                              column.</p>
                         <p><a class="btn btn-secondary" href="services.php">Amenities/Services &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4">
                         <img class="bd-placeholder-img rounded-circle" width="140" height="140" src="img/3.jpg" alt="">
                         <h2 class="fw-normal">Topography</h2>
                         <p>And lastly this, the third column of representative placeholder content.</p>
                         <p><a class="btn btn-secondary" href="#">Topography &raquo;</a></p>
                    </div><!-- /.col-lg-4 -->
               </div><!-- /.row -->


               <!-- START THE FEATURETTES -->

               <hr class="featurette-divider">

               <div class="row featurette">
                    <div class="col-md-7 order-md-2">
                         <div class="card">
                              <div class="card-header">
                                   <h1>Welcome Visitors and Clients</h1>
                              </div>
                              <div class="card-body">
                                   <form id="form" action="" method="post">
                                        <div class="row">
                                             <div class="col">
                                                  <label for="">Name</label>
                                                  <input type="text" class="form-control" id="name" name="name" placeholder="Optional">
                                             </div>
                                        </div>
                                        <div class="row" style="margin-top:10px;">
                                             <div class="col">
                                                  <label for="">Gender</label>
                                                  <select class="form-control" name="gender" id="gender" placeholder="Gender" required>
                                                       <option value="">Selecti Option</option>
                                                       <option value="Male">Male</option>
                                                       <option value="Female">Female</option>
                                                       <option value="LGBTQ">LGBTQ</option>
                                                       <option value="Other">Other</option>
                                                  </select> 
                                             </div>
                                             <div class="col">
                                                  <label for="">Age</label>
                                                  <select class="form-control" name="age" id="age" placeholder="Age" required>
                                                       <option value="">Select Age</option>
                                                       <option value="0-17">0-17</option>
                                                       <option value="18-24">18-24</option>
                                                       <option value="25-34">25-34</option>
                                                       <option value="35-44">35-44</option>
                                                       <option value="45-54">45-54</option>
                                                       <option value="55+">55-60</option>
                                                       <option value="55+">60+</option>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="row" style="margin-top:10px;">
                                             <div class="col">
                                                  <label for="">Address</label>
                                                  <select class="form-control js-example-basic-single" id="address" name="address" placeholder="Address" required>
                                                       <option value="">Select Barangay</option>
                                                       <option value="Agdao">Agdao</option>
                                                       <option value="Bago Aplaya">Bago Aplaya</option>
                                                       <option value="Baliok">Baliok</option>
                                                       <option value="Buhangin">Buhangin</option>
                                                       <option value="Bunawan">Bunawan</option>
                                                       <option value="Calinan">Calinan</option>
                                                       <option value="Carmen">Carmen</option>
                                                       <option value="Catigan">Catigan</option>
                                                       <option value="Daliao">Daliao</option>
                                                       <option value="Dumoy">Dumoy</option>
                                                       <option value="Ecoland">Ecoland</option>
                                                       <option value="Gov. Paciano Bangoy">Gov. Paciano Bangoy</option>
                                                       <option value="Indangan">Indangan</option>
                                                       <option value="Lubogan">Lubogan</option>
                                                       <option value="Ma-a">Ma-a</option>
                                                       <option value="Maa">Maa</option>
                                                       <option value="Magtuod">Magtuod</option>
                                                       <option value="Malabog">Malabog</option>
                                                       <option value="Mandug">Mandug</option>
                                                       <option value="Matina">Matina</option>
                                                       <option value="Pampanga">Pampanga</option>
                                                       <option value="Panacan">Panacan</option>
                                                       <option value="Riverside">Riverside</option>
                                                       <option value="Sasa">Sasa</option>
                                                       <option value="SIR">SIR</option>
                                                       <option value="Talomo">Talomo</option>
                                                       <option value="Tibungco">Tibungco</option>
                                                       <option value="Toril">Toril</option>
                                                       <option value="Tugbok">Tugbok</option>
                                                  </select>
                                             </div>
                                        </div>
                                        <div class="row" style="margin-top:20px;">
                                             <div class="col">
                                                  <button type="submit" name="submit" class="w-100 btn btn-lg btn-primary">Submit</button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>

                    </div>
                    <div class="col-md-5 order-md-1">
                         <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" src="img/logo.png" alt="">

                    </div>
               </div>

               <hr class="featurette-divider">

               <div class="row featurette">
                    <div class="col-md-7">
                         <h2 class="featurette-heading fw-normal lh-1">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
                         <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really
                              intended to be actually read, simply here to give you a better view of what this would look like
                              with some actual content. Your content.</p>
                    </div>
                    <div class="col-md-5">
                         <div id="miyakiMapLoc" style="width:500px; height:500px;">

                         </div>
                    </div>
               </div>

               <hr class="featurette-divider">

               <!-- /END THE FEATURETTES -->

          </div><!-- /.container -->

          <!-- FOOTER -->
          <div class="container">
               <footer class="py-5">
                    <div class="row">
                         <div class="col-6 col-md-2 mb-3">
                              <h5>Section</h5>
                              <ul class="nav flex-column">
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                              </ul>
                         </div>

                         <div class="col-6 col-md-2 mb-3">
                              <h5>Section</h5>
                              <ul class="nav flex-column">
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                              </ul>
                         </div>

                         <div class="col-6 col-md-2 mb-3">
                              <h5>Section</h5>
                              <ul class="nav flex-column">
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Home</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Features</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">Pricing</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">FAQs</a></li>
                                   <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-muted">About</a></li>
                              </ul>
                         </div>

                         <div class="col-md-5 offset-md-1 mb-3">
                              <form>
                                   <h5>Subscribe to our newsletter</h5>
                                   <p>Monthly digest of what's new and exciting from us.</p>
                                   <div class="d-flex flex-column flex-sm-row w-100 gap-2">
                                        <label for="newsletter1" class="visually-hidden">Email address</label>
                                        <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                                        <button class="btn btn-primary" type="button">Subscribe</button>
                                   </div>
                              </form>
                         </div>
                    </div>

                    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                         <p>&copy; 2022 Company, Inc. All rights reserved.</p>
                         <ul class="list-unstyled d-flex">
                              <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                             <use xlink:href="#twitter" />
                                        </svg></a></li>
                              <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                             <use xlink:href="#instagram" />
                                        </svg></a></li>
                              <li class="ms-3"><a class="link-dark" href="#"><svg class="bi" width="24" height="24">
                                             <use xlink:href="#facebook" />
                                        </svg></a></li>
                         </ul>
                    </div>
               </footer>
     </main>
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
<script>
     const miyakiMapLoc = L.map('miyakiMapLoc').setView([7.091123069634382, 125.5084988219487], 13);
     L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
     }).addTo(miyakiMapLoc);

     L.marker([7.091123069634382, 125.5084988219487]).addTo(miyakiMapLoc)
          .bindPopup('Miyaki Inland <br> Resport')
          .openPopup();
</script>

</html>