<?php
require "conn/db.php";

if(!isset( $_SESSION['user_id'] )) {
    echo 
    "<script>
    alert('Login First');
    location.replace('login.php');
    </script>";
  
  }

include "./Logic/AddLogic/AddProducts.php";
include "./Components/BS/Sidebar.php";
include "./Components/CreateComponent/AddProducts.php";
include "./Assets/CDN//script.php";
include "./Logic/JSLogic/img_preview_products.php";
?>



