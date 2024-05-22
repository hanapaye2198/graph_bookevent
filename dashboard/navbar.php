<?php include '../conn.php';
session_start();

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["email"])) {
     header("location: ../index.php");
     exit();
}
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg " color-on-scroll="500">
     <div class="container-fluid">
          <a class="navbar-brand" href="#pablo"> Dashboard </a>
          <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-bar burger-lines"></span>
               <span class="navbar-toggler-bar burger-lines"></span>
               <span class="navbar-toggler-bar burger-lines"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation" style="margin-left: 100px;">
               <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="no-icon"><?php echo $_SESSION["email"]; ?></span>
                         </a>
                         <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="logout.php">Logout</a>
                         </div>
                    </li>
               </ul>
          </div>
     </div>
</nav>
<!-- End Navbar -->