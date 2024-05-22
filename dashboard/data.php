<?php include 'header.php'; ?>
<?php include '../conn.php';
// Assuming you have already established a database connection
$query = "SELECT name, age, gender, address, time_now FROM tbl_survey";
$result = $conn->query($query);

// Initialize arrays to hold the data
$time = array();
$name = array();
$ages = array();
$genders = array();
$addresses = array();

// Loop through the query result and store data in arrays
while ($row = $result->fetch_assoc()) {
     $name[] = $row['name'];
     $ages[] = $row['age'];
     $genders[] = $row['gender'];
     $addresses[] = $row['address'];
     $time[] = $row['time_now'];
}
$name_counts = array_count_values($name);
$age_counts = array_count_values($ages);
$gender_counts = array_count_values($genders);
$address_counts = array_count_values($addresses);
$time_counts = array_count_values($time);
?>

<body>
     <?php include 'sidebar.php'; ?>
     <div class="main-panel">
          <?php include 'navbar.php'; ?>
          <div class="content">
               <div class="container-fluid">
                    <div class="row">
                         <div class="col-6">
                              <div class="card ">
                                   <div class="card-header ">
                                        <h4 class="card-title">Age</h4>
                                   </div>
                                   <div class="card-body">
                                        <canvas id="chartAge"></canvas>
                                   </div>
                              </div>
                         </div>
                         <div class="col-6">
                              <div class="card ">
                                   <div class="card-header ">
                                        <h4 class="card-title">Gender</h4>
                                   </div>
                                   <div class="card-body">
                                        <canvas id="chartGender"></canvas>
                                   </div>
                              </div>
                         </div>

                    </div>
                    <div class="row">
                         <div class="col">
                              <div class="card ">
                                   <div class="card-header ">
                                        <h4 class="card-title">Address</h4>
                                   </div>
                                   <div class="card-body">
                                        <canvas id="chartAdd"></canvas>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col-6">
                              <div class="card">
                                   <div class="card-header">
                                        <h4 class="card-title">Addresses:</h4>
                                   </div>
                                   <div class="card-body">
                                        <table class="table table-hover table-striped">
                                             <thead>
                                                  <tr>
                                                       <th>Address</th>
                                                       <th>Count</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php foreach ($address_counts as $address => $count) : ?>
                                                       <tr>
                                                            <td><?php echo $address; ?></td>
                                                            <td><?php echo $count; ?></td>
                                                       </tr>
                                                  <?php endforeach; ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                         <div class="col-6">
                              <div class="card">
                                   <div class="card-header">
                                        <h4 class="card-title">Client Number:
                                             <span>
                                                  <?php echo count($address_counts); ?>
                                             </span>
                                        </h4>
                                   </div>
                                   <div class="card-body">
                                        <table class="table table-hover table-striped">
                                             <thead>
                                                  <tr>
                                                       <th>Name</th>
                                                       <th>Count</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php foreach ($name_counts as $name => $count) : ?>
                                                       <tr>
                                                            <td><?php echo $name; ?></td>
                                                            <td><?php echo $count; ?></td>
                                                       </tr>
                                                  <?php endforeach; ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
          <?php include 'footer.php'; ?>
          <script>
               //age
               const ctx = document.getElementById('chartAge').getContext('2d');
               const chartAge = new Chart(ctx, {
                    type: 'bar',
                    data: {
                         labels: <?php echo json_encode(array_keys($age_counts)); ?>,
                         datasets: [{
                              label: 'Age Distribution',
                              data: <?php echo json_encode(array_values($age_counts)); ?>,
                              backgroundColor: [
                                   '#EE2E31',
                                   '#FFB703',
                                   '#1741D7',
                                   '#f2d600',
                                   '#00f2da',
                                   '#F765A3',
                              ],
                              borderWidth: 1
                         }]
                    },
                    options: {
                         scales: {
                              yAxes: [{
                                   ticks: {
                                        beginAtZero: true
                                   }
                              }]
                         }
                    }
               });
               //Gender
               const crt = document.getElementById('chartGender').getContext('2d');
               const chartGender = new Chart(crt, {
                    type: 'bar',
                    data: {
                         labels: <?php echo json_encode(array_keys($gender_counts)); ?>,
                         datasets: [{
                              label: 'Gender Distribution',
                              data: <?php echo json_encode(array_values($gender_counts)); ?>,
                              backgroundColor: [
                                   '#F765A3',
                                   '#EE2E31',
                                   '#FFB703',
                                   '#1741D7',
                              ],
                              borderWidth: 1
                         }]
                    },
                    options: {
                         scales: {
                              yAxes: [{
                                   ticks: {
                                        beginAtZero: true
                                   }
                              }]
                         }
                    }
               });
               //address
               const adr = document.getElementById('chartAdd').getContext('2d');
               const chartAdd = new Chart(adr, {
                    type: 'bar',
                    data: {
                         labels: <?php echo json_encode(array_keys($address_counts)); ?>,
                         datasets: [{
                              label: 'Address Distribution',
                              data: <?php echo json_encode(array_values($address_counts)); ?>,
                              backgroundColor: [
                                   '#1741D7',
                                   '#FFB703',
                                   '#00f2da',
                                   '#f2d600',
                                   '#F765A3',
                                   '#EE2E31',
                              ],
                              borderWidth: 1
                         }]
                    },
                    options: {
                         scales: {
                              yAxes: [{
                                   ticks: {
                                        beginAtZero: true
                                   }
                              }]
                         }
                    }
               });
          </script>