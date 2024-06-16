<?php
require "conn/db.php";
if(!isset( $_SESSION['user_id'] )) {
    echo 
    "<script>
    alert('Login First');
    location.replace('login.php');
    </script>";
  
  }
if($_SERVER["REQUEST_METHOD"] === "POST"){

    $products_name = filter_var(htmlspecialchars($_POST["products_name"]), FILTER_SANITIZE_SPECIAL_CHARS);
    $products_price = filter_var(htmlspecialchars($_POST["products_price"]));
    $products_stocks = htmlspecialchars($_POST["products_stocks"]);
    $products_id = $_POST["products_id"];



    if(!empty($products_name) && !empty($products_price) && !empty($products_stocks) && !empty($_FILES["products_image"]["name"])){
      $target_dir = "Assets/Images/";
      $target_file = $target_dir . basename($_FILES["products_image"]["name"]);
   
      $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $allowed_file_ext = array("jpg", "png", "jpeg");

  
      if (!in_array($imageExt, $allowed_file_ext)) {
          $resMessage = array(
              "status" => "alert-danger",
              "message" => "Image not supported"
          );
      } elseif ($_FILES["products_image"]["size"] > 2097152) { 
          $resMessage = array(
              "status" => "alert-danger",
              "message" => "File is too large. File should be less than 2MB"
          );
      } else {
          if (move_uploaded_file($_FILES["products_image"]["tmp_name"], $target_file)) {
              $stmt = $pdo->prepare("UPDATE barang SET nama_barang=?, harga_barang=?, stok_barang=?,img_products=? WHERE id_barang = ?");
              $stmt->bindValue(1, $products_name);
              $stmt->bindValue(2, $products_price);
              $stmt->bindValue(3, $products_stocks);
              $stmt->bindValue(4, $target_file);
              $stmt->bindValue(5, $products_id);
              // var_dump($target_file);
              // die();
              if ($stmt->execute()) {
                  $resMessage = array(
                      "status" => "alert-success",
                      "message" => "Image uploaded successfully"
                  );
                  header("Location: products.php");
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
      <h1>Update Products</h1>
      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">

                    <div class="card-body">
                        <form action="updateProducts.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="products_name" class="form-label">Products Name</label>
                                <input type="text" class="form-control" id="products_name" name="products_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="products_price" class="form-label">Products Price</label>
                                <input type="number" class="form-control" id="products_price" name="products_price"  min="500" max="999999999999" placeholder="RP." step="500" required>
                            </div>
                            <div class="mb-3">
                                <label for="products_stocks" class="form-label">Products Stock</label>
                                <input type="number" class="form-control" id="products_stocks" name="products_stocks" min="1" required>
                            </div>
                            <div class="mb-3" class="d-none" style="display: none;">
                                <label for="products_id" class="form-label">Products id</label>
                                <input type="text" class="form-control" id="products_id" name="products_id" min="1" value="<?php echo $_GET["id"]; ?>" required>
                            </div>
                            <div class="mb-3 d-flex flex-column ">
                                <div class="w-100 h-100 " style="overflow:hidden; ">
                                  <img src="..." class="figure-img rounded mx-auto d-block" width="200px" alt="" id="img-placeholder">
                                </div>
                                <div>
                                  <label for="products_image" class="form-label">Products Image</label>
                                  <input type="file" class="form-control" id="products_image" name="products_image">
                                </div>
                  
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Update Products">
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
      $("#products_image").change(function() {
        readURL(this);
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>
