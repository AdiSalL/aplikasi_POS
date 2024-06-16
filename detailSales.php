<?php
include "conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
  echo 
  "<script>
  alert('Login First');
  location.replace('login.php');
  </script>";

}
include "conn/db.php";
include "Components/BS/Sidebar.php";
include "Assets/CDN/script.php";
include "Components/DetailComponent/detailSales.php";
?>


  