<?php include '../conn.php';
include 'header.php'; ?> 

<body>
     <?php include 'sidebar.php'; ?>
     <style>
      #am{
        top: 30px; 
        left: 40px;
        position: fixed;
        overflow-y: auto;
        width: 80%;
        height: 100%;
      }
      textarea{
        resize: none;
      }
      .table{
        width: 100%;
      }
     </style>
     <div class="col-sm-10 col-sm-offset-3 col-md-5 col-md-offset-2 main" id="am">
      <h1> Manage Booking</h1>
      <br>
      
  <table class="table"">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Start date</th>
        <th>End date</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM booker_tbl";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['start_date']; ?></td>
          <td><?php echo $row['end_date']; ?></td>
          <form method="post">
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          <td><button name="del" class="btn btn-danger">Delete</button></td>
          </form>
        </tr>
        <?php
      }
      ?>
      <?php

      if(isset($_POST['del'])){
        $id = $_POST['id'];
        $que = "DELETE FROM booker_tbl WHERE id = $id";
        $del_res = mysqli_query($conn, $que);
      }

      ?>
    </tbody>
  </table>
</div>


     </div>

