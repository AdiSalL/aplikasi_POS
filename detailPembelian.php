<?php
include "conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
    echo 
    "<script>
    alert('Login First');
    location.replace('login.php');
    </script>";
  
  }

include "Assets/CDN/script.php";
include "Components/BS/Sidebar.php";
include "Components/DetailComponent/detailPembelian.php";
?>

