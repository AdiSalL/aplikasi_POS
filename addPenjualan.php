<?php
require "conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
  echo 
  "<script>
  alert('Login First');
  location.replace('login.php');
  </script>";

}

include "Logic/AddLogic/AddPenjualan.php";
include "Components/BS/Sidebar.php";
include "Assets/CDN/script.php";
include "Components/CreateComponent/AddPenjualanForm.php";
include "Logic/JSLogic/add_penjualan.php";
?>

  </div>
</div>


 
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>

