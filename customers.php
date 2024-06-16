<?php
include_once "./conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
  echo 
  "<script>
  alert('Login First');
  location.replace('login.php');
  </script>";

}
include_once "Components/BS/Sidebar.php";
include_once "./Assets/CDN/script.php";
include_once "Components/MainComponent/customers.php";
?>

