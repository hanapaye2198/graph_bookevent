<?php
include "../conn.php";
    // other PHP code here

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $age = $_POST['age'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $sql = "UPDATE tbl_survey SET name = '$name', age = '$age', gender = '$gender', address = '$address' WHERE id = '$id'";
        $res = mysqli_query($conn, $sql);

        if($res){
            header("Location: table.php");
            echo "success";
            exit;
        } else {
            echo "Sorry, there was an error.";
        }
    }

?>