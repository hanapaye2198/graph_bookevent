
  <?php
     include '../conn.php';

     // get the latitude and longitude coordinates from the AJAX request
     $lat = $_POST['latitude'];
     $lng = $_POST['longitude'];

     // insert the coordinates into the database
     $stmt = $conn->prepare('INSERT INTO tbl_coordinate (latitude, longitude) VALUES (?, ?)');
     $stmt->bind_param('dd', $lat, $lng);
     if ($stmt->execute()) {
          echo 'Coordinates saved successfully!';
     } else {
          echo 'Failed to save coordinates!';
     }
     $stmt->close(); 
     $conn->close();
