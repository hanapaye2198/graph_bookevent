<?php
include 'conn.php';
session_start();
if (isset($_POST['submit'])) {
     $email = $_POST['email'];
     $password = $_POST['password'];
     $sql = "SELECT * FROM tbl_usr WHERE email = '$email' AND password = '$password'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
     $count = mysqli_num_rows($result);

     if ($count == 1) {
          $_SESSION['email'] = $email;
          header("Location: dashboard/index.php");
     } else {
          echo "<script type='text/javascript'>
          window.location.href = 'login.php';
          alert('wrong email or password')
          </script>";
     }
}

?>
<?php include 'header.php';
include 'navbar.php'; ?>
<div class="centerDiv">
     <div class="card">
          <div class="card-header">
               <h3>Login:</h3>
               <div class="form">
               </div>
               <div class="card-body">
                    <form class="form-signin" method="post" action="#" name="login">
                         <div class="row" style="margin-left:10px;">
                              <div class="row">
                                   <div class="col">
                                        <div class="form-floating">
                                             <input type="email" class="form-control" id="email" name="email" required placeholder="name@example.com">
                                             <label>Email address</label>
                                        </div>
                                   </div>
                              </div>
                              <div class="row" style="margin-top: 15px;">
                                   <div class="col">
                                        <div class="form-floating">
                                             <input type="password" class="form-control" id="password" name="password" required placeholder="password">
                                             <label>Password</label>
                                        </div>
                                   </div>
                              </div>
                              <div class="row" style="margin-left: -190px; margin-top: 15px;">
                                   <div class="col">
                                        <div class="checkbox">
                                             <label>
                                                  <input type="checkbox" value="remember-me"> Remember me
                                             </label>
                                        </div>
                                   </div>
                              </div>
                              <div class="row" style="margin-top: 15px;">
                                   <div class="col">
                                        <button type="submit" id="btn" value="submit" name="submit" class="w-100 btn btn-lg btn-primary">Submit</button>
                                   </div>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>