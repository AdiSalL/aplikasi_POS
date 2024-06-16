<?php
include_once "./conn/db.php";

include_once "./Components/BS/Sidebar.php";
include "./Assets/CDN/script.php";


?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="col">
    <h1>Home</h1>
    <?php 
    if(isset( $_SESSION['user_id'] )) {
      echo "Welcome " . $_SESSION['username'];
    
    }
    ?>
  </div>
</main>
