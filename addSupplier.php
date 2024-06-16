<?php
require "conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
    echo 
    "<script>
    alert('Login First');
    location.replace('login.php');
    </script>";
  
  }
require "conn/db.php";
include "./Logic/AddLogic/AddSupplier.php";
include "./Components/BS/Sidebar.php";
include "./Components/CreateComponent/AddSupplierForm.php";
include "./Assets/CDN/script.php";
?>




