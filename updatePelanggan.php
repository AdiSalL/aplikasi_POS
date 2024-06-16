<?php
require "conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
    echo 
    "<script>
    alert('Login First');
    location.replace('login.php');
    </script>";
  
  }

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username   = filter_var(htmlspecialchars($_POST["username"]), FILTER_SANITIZE_SPECIAL_CHARS);
  $no_handphone = filter_var(htmlspecialchars($_POST["phone"]));
  $alamat = htmlspecialchars($_POST["address"]);
  $id_user = $_POST["id_user"];


  if (!empty($_FILES["profile_user"]["name"])) {
      $target_dir = "Assets/Images/";
      $target_file = $target_dir . basename($_FILES["profile_user"]["name"]);
   
      $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $allowed_file_ext = array("jpg", "png", "jpeg");

  
      if (!in_array($imageExt, $allowed_file_ext)) {
          $resMessage = array(
              "status" => "alert-danger",
              "message" => "Image not supported"
          );
      } elseif ($_FILES["profile_user"]["size"] > 2097152) { 
          $resMessage = array(
              "status" => "alert-danger",
              "message" => "File is too large. File should be less than 2MB"
          );
      } else {
          if (move_uploaded_file($_FILES["profile_user"]["tmp_name"], $target_file)) {
            $stmt = $pdo->prepare("UPDATE pelanggan SET nama_pelanggan=?, no_handphone=?, alamat=?, img_cus = ? WHERE id_pelanggan = ?");
            $stmt->bindValue(1,  $username );
            $stmt->bindValue(2,   $no_handphone);
            $stmt->bindValue(3,$alamat);
            $stmt->bindValue(4 ,  $target_file);
            $stmt->bindValue(5, $id_user );
              // var_dump($target_file);
              // die();
              if ($stmt->execute()) {
                  $resMessage = array(
                      "status" => "alert-success",
                      "message" => "Image uploaded successfully"
                  );
                  header("Location: customers.php");
                  exit(); 
              }
          } else {
              $resMessage = array(
                  "status" => "alert-danger",
                  "message" => "Image couldn't be uploaded"
              );
          }
      }
  } else {
      $resMessage = array(
          "status" => "alert-danger",
          "message" => "Select an image to upload"
      );
  }
}


include_once "./Components/BS/Sidebar.php";
include "./Assets/CDN/script.php";

?>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h1>Update Customers</h1>
      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                  <div class="card-body">
                  <?php if(!empty($resMessage)):?>
                          <div class="alert<?= $resMessage['status']?>">
                            <p><?= $resMessage['message']?></p>
                          </div>
                        <?php endif?>
                  </div>
                    <div class="card-body">
                    <form action="updatePelanggan.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="username" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address"  required>
                            </div>
                            <div class="mb-3" style="display: none;">
                                <label for="id_user" class="form-label">Id</label>
                                <input type="text" class="form-control" id="id_user" name="id_user" value="<?= $_GET['id']?>"  required>
                            </div>
                            <div class="mb-3">
                            <div class="w-100 h-100 " style="overflow:hidden; ">
                                  <img src="..." class="figure-img rounded mx-auto d-block" width="200px" alt="" id="img-placeholder">
                                </div>
                                <label for="profile_user" class="form-label">Profile picture</label>
                                <input type="file" class="form-control" id="profile_user" name="profile_user" required>
                            </div>
                            
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Update Pelanggan">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small>&copy; 2024 Your Company</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
  </div>
</div>
<script src="bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      function readURL(input) {
        if(input.files && input.files[0]){
          let reader = new FileReader();
          reader.onload = function(e){
            $("#img-placeholder").attr("src", e.target.result);
          }
          reader.readAsDataURL(input.files[0]);
        }
      }
      $("#profile_user").change(function() {
        readURL(this);
      });
    </script>

</html>
