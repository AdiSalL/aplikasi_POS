<?php 
require "conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
  echo 
  "<script>
  alert('Login First');
  location.replace('login.php');
  </script>";

}
require  "conn/db.php";
include_once "Logic/AddLogic/AddPembelian.php";
include_once "Components/BS/Sidebar.php";
include_once "Components/CreateComponent/AddPembelian.php";
include_once "./Assets/CDN/script.php";
?>



