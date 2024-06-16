<?php
require __DIR__ . "conn/db.php";

if(!isset( $_SESSION['user_id'] )) {
    echo 
    "<script>
    alert('Login First');
    location.replace('login.php');
    </script>";
  
  }

include __DIR__ ."Logic/AddLogic/AddPelanggan.php";
include __DIR__ . "./Components/BS/Sidebar.php";
include __DIR__ ."./Assets/CDN/script.php";
include __DIR__ . "/Logic/JSLogic/Img_preview.php";
?>



