<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>MIYAKIS INLAND RESORT</title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <!-- CSS Files -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
     <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
     <link rel="stylesheet" href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " />
     <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
     <link rel="stylesheet" href="../assets/css/dataTables.bootstrap.min.css">
     <link rel="stylesheet" href="../assets/css/bootstrap-social.css">
     <link rel="stylesheet" href="../assets/css/bootstrap-select.css">
     <link rel="stylesheet" href="../assets/css/fileinput.min.css">
     <link rel="stylesheet" href="../assets/css/awesome-bootstrap-checkbox.css">
     <link rel="stylesheet" href="../assets/css/style.css">
</head>


<?php
include '../conn.php';
$db = $conn;
$tableName = "tbl_survey";
$col = ['id', 'name', 'age', 'gender', 'address', 'time_now'];
$fetch_data = fetch_data($db, $tableName, $col);

function fetch_data($db, $tableName, $col)
{
     if (empty($db)) {
          $msg = "database connection error";
     } elseif (empty($col) || !is_array($col)) {
          $msg = "column name  must be defined as an indexed array";
     } elseif (empty($tableName)) {
          $msg = "table name must be defined";
     } else {
          $columnName = implode(", ", $col);
          $query = "SELECT " . $columnName . " FROM $tableName";

          // Check if the 'sort' button has been clicked
          if (isset($_POST['sort'])) {
               $start_datetime = $_POST['start_datetime'];
               $query .= " WHERE time_now >= '$start_datetime' ORDER BY time_now DESC";
          } else {
               $query .= " ORDER BY id DESC";
          }
          $result = $db->query($query);

          if ($result == true) {
               if ($result->num_rows > 0) {
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $msg = $row;
               } else {
                    $msg = "no data found";
               }
          } else {
               $msg = mysqli_error($db);
          }
     }
     return $msg;
}

?>

<body>
     <?php include 'sidebar.php'; ?>
     <div class="main-panel">
          <?php include 'navbar.php'; ?>
          <div class="content">
               <div class="container-fluid">
                    <div class="container-fluid">
                         <div class="row">
                              <div class="col-md-12">
                                   <h2 class="page-title" style="margin-top:4%">Manage Visitors</h2>
                                   <div class="panel panel-default">
                                        <div class="panel-heading">Select Date:</div>
                                        <div class="sort">
                                             <div class="row">
                                                  <div class="col">
                                                       <div class="form-group">
                                                            <input type="date" class="form-control col-md-1" name="start_datetime" id="start_datetime" required>
                                                            <button class="btn btn-success" name="sort" type="submit"><i class="fa fa-save"></i>Go</button>
                                                       </div>
                                                  </div>
                                             </div>
                                        </div>
                         
                                        <div class="panel-body">
                                             <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                  <thead>
                                                       <tr>
                                                            <th>ID.</th>
                                                            <th>Name</th>
                                                            <th>Age</th>
                                                            <th>Gender</th>
                                                            <th>Address</th>
                                                            <th>Time</th>
                                                            <th>Action</th>

                                                       </tr>
                                                  </thead>
                                                  <tfoot>
                                                       <tr>
                                                            <th>ID.</th>
                                                            <th>Name</th>
                                                            <th>Age</th>
                                                            <th>Gender</th>
                                                            <th>Address</th>
                                                            <th>Time</th>
                                                            <th colspan = 2>Action</th>
                                                       </tr>
                                                  </tfoot>
                                                  <tbody>
                                                       <?php
                                                       if (is_array($fetch_data)) {
                                                            $sn = 1;
                                                            foreach ($fetch_data as $data) { ?>
                                                                 <tr>
                                                                      <td><?php echo $sn; ?></td>
                                                                      <td style="display: none;"><?php echo $data['id'] ?></td>
                                                                      <td><?php echo $data['name'] ?? ''; ?></td>
                                                                      <td><?php echo $data['age'] ?? ''; ?></td>
                                                                      <td><?php echo $data['gender'] ?? ''; ?></td>
                                                                      <td><?php echo $data['address'] ?? ''; ?></td>
                                                                      <td><?php echo $data['time_now'] ?? ''; ?></td>
                                                                      <form action="" method="post">
                                                                      <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                                                      <td><button type="submit" name="del" class="btn btn-danger">Delete</button></td>
                                                                      </form>

                                                                      <form action="edit.php" method="post">
                                                                      <input type="hidden" name="id" value="<?php echo $data['id'] ?>">
                                                                      <td><button type="submit" name="edit" class="btn btn-primary" >Edit</button></td>
                                                                      </form>

                                                                 </tr>
                                                            <?php $sn++;
                                                            }
                                                       } else { ?>
                                                            <tr>
                                                                 <td colspan="5"><?php echo $fetch_data; ?></td>
                                                            </tr>
                                                       <?php } ?>

                                                  </tbody>
                                             </table>

                                             <?php

                                             if(isset($_POST['del'])){
                                                  $id = $_POST['id'];
                                                  $query = "DELETE FROM tbl_survey WHERE id = $id";
                                                  $res = mysqli_query($conn, $query);
                                             }

                                             ?>


                                        </div>
                                   </div>


                              </div>
                         </div>



                    </div>
               </div>
          </div>
          <!-- Loading Scripts -->
          <script src="../assets/js/jquery.min.js"></script>
          <script src="../assets/js/bootstrap-select.min.js"></script>
          <script src="../assets/js/bootstrap.min.js"></script>
          <script src="../assets/js/jquery.dataTables.min.js"></script>
          <script src="../assets/js/dataTables.bootstrap.min.js"></script>
          <script src="../assets/js/Chart.min.js"></script>
          <script src="../assets/js/fileinput.js"></script>
          <script src="../assets/js/chartData.js"></script>
          <script src="../assets/js/main.js"></script>
</body>

</html>