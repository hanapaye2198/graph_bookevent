<?php
include "../conn.php";
include "header.php";

?>

<style>
  .container{
    width: 1000px;
    height: auto;
    padding: 20px;
    margin: 20px auto;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  }
</style>

<div class="container">

<h1>Update Data</h1>
<br>

<?php

include "../conn.php";

$idd = $_POST['id'];

$query = "SELECT * FROM tbl_survey WHERE id = '$idd'";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$id = $row['id'];
$name = $row['name'];
$age = $row['age'];
$gender = $row['gender'];
$address = $row['address'];

?>

<form method="post" action="edit-process.php">
<form method="post" action="process.php">
  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" class="form-control" id="name" value="<?php echo $name;?>" name="name" required>
  </div>
  <div class="form-group">
    <label for="age">Age:</label>
    <select class="form-control" id="age" name="age" required>
        <option value="<?php echo $age;?>"><?php echo $age;?></option>
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
  <div class="form-group">
    <label for="gender">Gender:</label>
    <select class="form-control" id="gender" name="gender" required>
    <option value="<?php echo $gender;?>"><?php echo $gender;?></option>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="lgbtq">LGBTQ</option>
      <option value="other">Other</option>
    </select>
  </div>
  <div class="form-group">
    <label for="address">Address:</label>
    <select class="form-control" id="address" name="address" required>
    <option value="<?php echo $address;?>"><?php echo $address;?></option>
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
  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
  <button type="submit" name="update" class="btn btn-primary">Update</button>
  <a href="table.php">Cancel</a>
</form>

</form>

<br>

</div>


