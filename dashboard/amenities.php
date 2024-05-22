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
      <h1> Manage Amenities/Services</h1>
      <br>
      <div class="container">
  <form method="POST">
    <div class="form-group row">
      <label for="roomName" class="col-sm-1 col-form-label">Room Name:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" name="room" id="roomName" placeholder="Enter room name">
      </div>
      <label for="price" class="col-sm-1 col-form-label">Price:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" name="price" id="price" placeholder="Enter price">
      </div>
      <label for="description" class="col-sm-1 col-form-label">Description:</label>
      <div class="col-sm-2">
        <input type="text" class="form-control" name="desc" id="description" placeholder="Enter description">
      </div>
      <div class="col-sm-1">
        <button type="submit" name="add" class="btn btn-primary">Add</button>
      </div>
    </div>
    <?php

      if(isset($_POST['add'])){
        $room = $_POST['room'];
        $price = $_POST['price'];
        $desc = $_POST['desc'];
        $query = "INSERT INTO tbl_amenities (room_name, price, description) VALUES ('$room', '$price', '$desc')";
        $res = mysqli_query($conn, $query);
        
      }

    ?>
  </form>
  <table class="table"">
    <thead>
      <tr>
        <th>ID</th>
        <th>Room Name</th>
        <th>Price</th>
        <th>Description</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql = "SELECT * FROM tbl_amenities";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['room_name']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><?php echo $row['description']; ?></td>
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
        $que = "DELETE FROM tbl_amenities WHERE id = $id";
        $del_res = mysqli_query($conn, $que);
      }

      ?>
    </tbody>
  </table>
</div>


     </div>

