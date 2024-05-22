<?php
include 'header.php';
include '../conn.php';

$db = $conn;
$tableName = "schedule_list";
$col = ['id', 'title', 'description', 'start_datetime', 'end_datetime'];
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
                    <div class="row">
                         <div class="col-md-12">
                              <?php echo $deleteMsg ?? ''; ?>
                              <div class="card strpied-tabled-with-hover">
                                   <div class="card-header ">
                                        <h4 class="card-title">Visitors Logs</h4>
                                        <p class="card-category">Here is a subtitle for this table</p>
                                        <form method="post">
                                             <div class="sort">
                                                  <div class="row">
                                                       <div class="col">
                                                            <div class="form-group mb-2">
                                                                 <label for="start_datetime" class="control-label">Start</label>
                                                                 <input type="date" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                                                 <button class="btn btn-primary form-control-sm btn-fill rounded-5" name="sort" type="submit"><i class="fa fa-save"></i> Save</button>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                        </form>
                                        <div class="card-body table-full-width table-responsive">
                                             <table class="table table-hover table-striped">
                                                  <thead>
                                                       <th>ID</th>
                                                       <th>Name</th>
                                                       <th>Decription</th>
                                                       <th>Start Time</th>
                                                       <th>End Time</th>
                                                  </thead>
                                                  <tbody>
                                                       <?php
                                                       if (is_array($fetch_data)) {
                                                            $sn = 1;
                                                            foreach ($fetch_data as $data) { ?>
                                                                 <tr>
                                                                      <td><?php echo $sn; ?></td>
                                                                      <td><?php echo $data['title'] ?? ''; ?></td>
                                                                      <td><?php echo $data['description'] ?? ''; ?></td>
                                                                      <td><?php echo $data['start_datetime'] ?? ''; ?></td>
                                                                      <td><?php echo $data['end_datetime'] ?? ''; ?></td>

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
                                             <a href="printdata.php" class="w-100 btn btn-primary btn-fill">Convert to PDF</a>

                                        </div>
                                   </div>
                              </div>

                         </div>
                    </div>
               </div>
          </div>

</body>