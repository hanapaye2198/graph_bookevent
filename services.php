<?php include  'header.php'; ?>
<style>
     .card-layout {
          display: flex;

          /* Put a card in the next row when previous cards take all width */
          flex-wrap: wrap;
          margin-top: 100px;
          margin-left: -0.25rem;
          margin-right: -0.25rem;
     }

     .card-layout__item {
          /* There will be 3 cards per row */
          flex-basis: 33.33333%;

          padding-left: 0.25rem;
          padding-right: 0.25rem;
     }

     .card {
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
          max-width: 300px;
          margin: auto;
          text-align: center;
          font-family: arial;
          box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
     }

     .price {
          color: grey;
          font-size: 22px;
     }

     .card button {
          border: none;
          outline: 0;
          padding: 12px;
          color: white;
          background-color: #000;
          text-align: center;
          cursor: pointer;
          width: 100%;
          font-size: 18px;
     }

     .card button:hover {
          opacity: 0.7;
     }

     /* The Modal (background) */
     .modal {
          display: none;
          /* Hidden by default */
          position: fixed;
          /* Stay in place */
          z-index: 1;
          /* Sit on top */
          left: 0;
          top: 0;
          width: 100%;
          /* Full width */
          height: 100%;
          /* Full height */
          overflow: auto;
          /* Enable scroll if needed */
          background-color: rgb(0, 0, 0);
          /* Fallback color */
          background-color: rgba(0, 0, 0, 0.4);
          /* Black w/ opacity */
     }

     /* Modal Content/Box */
     .modal-content {
          background-color: #fefefe;
          margin: 15% auto;
          /* 15% from the top and centered */
          padding: 20px;
          border: 1px solid #888;
          width: 43%;
          text-align: left;
          line-height: 20px;
          /* Could be more or less, depending on screen size */
     }

     .modal-content input{
          width: 520px;
          padding: 20px;
     }

     /* The Close Button */
     .close {
          color: #aaa;
          float: right;
          text-align: right;
          font-size: 28px;
          font-weight: bold;
     }

     .close:hover,
     .close:focus {
          color: black;
          text-decoration: none;
          cursor: pointer;
     }
</style>

<body>
    <?php include 'navbar.php'; ?>

    <div class="card-layout">
        <?php 
        include 'conn.php';
        $sql = "SELECT * FROM tbl_amenities";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $counter = 0;

        if(mysqli_num_rows($res) > 0){
            while($row){
                $id = $row['id'];
                $name = $row['room_name'];
                $price = $row['price'];
                $desc = $row['description'];

                // create a new row after every 3 cards
                if ($counter % 3 == 0) {
                    if ($counter > 0) {
                        echo '</div>'; // close the previous row
                    }
                    echo '<div class="card-row" style="width:100%; height: auto; padding:5px; display:flex;">';
                }
                ?>
                <div class="card-layout__item">
                    <div class="card">
                        <img src="img/2.jpg" alt="Denim Jeans" style="width:100%">
                        <h1><?php echo $name;?></h1>
                        <p class="price"><?php echo $price;?></p>
                        <p><?php echo $desc;?></p>
                        <p><button onclick="document.getElementById('myModal<?php echo $id;?>').style.display='block'">Open Modal</button></p>

                        <!-- The Modal -->
                        <div id="myModal<?php echo $id;?>" class="modal">
                            <div class="modal-content">
                                <span class="close" onclick="document.getElementById('myModal<?php echo $id;?>').style.display='none';">&times;</span>
                                <h1 >Book a room</h1>
                                <form method="POST">
                                   <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" required>
                                   </div>
                                   <br>
                                   <div class="form-group">
                                        <label for="phone" class="form-label">Phone number:</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your phone number">
                                   </div>

                                   <br>
                                   <div class="form-group">
                                        <label for="email">Email address:</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email" required>
                                   </div>
                                   <br>
                                   <div class="form-group">
                                        <label for="start-date">Start Date:</label>
                                        <input type="date" name="start_date" class="form-control" id="start-date" required>
                                   </div>
                                   <br>
                                   <div class="form-group">
                                        <label for="end-date">End Date:</label>
                                        <input type="date" name="end_date" class="form-control" id="end-date" required>
                                   </div>
                                   <br>
                                        <button type="submit" name="book" class="btn btn-primary">Book Now</button>
                                   </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    var modal<?php echo $id;?> = document.getElementById('myModal<?php echo $id;?>');
                    // When the user clicks anywhere outside of the modal, close it
                    window.onclick = function(event) {
                        if (event.target == modal<?php echo $id;?>) {
                            modal<?php echo $id;?>.style.display = "none";
                        }
                    }
                </script>
                <?php
                $counter++;
                $row = mysqli_fetch_assoc($res);
            }
            // close the final row if necessary
            if ($counter % 3 != 0 && $counter != 0) {
                echo '</div>';
            }
        }
        ?>
    </div>
    <?php
include 'conn.php'; // include your database connection file

if(isset($_POST['book'])){
    // get the form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    
    // prepare the SQL query
    $sql = "INSERT INTO booker_tbl (name, email, phone, start_date, end_date) VALUES ('$name', '$email', '$phone', '$start_date', '$end_date')";

    // execute the query
    if(mysqli_query($conn, $sql)){
        // booking saved successfully, redirect to a confirmation page
        echo "success";
    } else {
        // an error occurred while saving the booking, display an error message
        echo "fail";
    }
}

// close the database connection
mysqli_close($conn);
?>

</body>
