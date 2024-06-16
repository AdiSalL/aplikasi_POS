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

    $nama_supplier = filter_var(htmlspecialchars($_POST["nama_supplier"]), FILTER_SANITIZE_SPECIAL_CHARS);
    $no_handphone = filter_var(htmlspecialchars($_POST["no_handphone"]));
    $address = htmlspecialchars($_POST["address"]);
    $id_supplier = $_POST["id_supplier"];


    if(!empty($nama_supplier) && !empty($no_handphone) && !empty($address)) {
        $stmt = $pdo->prepare("UPDATE supplier SET nama_supplier=?, no_handphone=?, alamat=? WHERE id_supplier = ?");
        $stmt->bindValue(1, $nama_supplier);
        $stmt->bindValue(2, $no_handphone);
        $stmt->bindValue(3, $address);
        $stmt->bindValue(4, $id_supplier);
        
        
        $stmt->execute();
        header("Location: supplier.php");
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
                    <form action="updateSupplier.php" method="post">
                            <div class="mb-3">
                                <label for="nama_supplier" class="form-label">Supplier Name</label>
                                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_handphone" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="no_handphone" name="no_handphone" required>
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="address" name="address"  required>
                            </div>
                            
                            <div class="mb-3" class="d-none" style="display: none;">
                                <label for="id_supplier" class="form-label">Products id</label>
                                <input type="text" class="form-control" id="id_supplier" name="id_supplier" min="1" value="<?php echo $_GET["id"]; ?>" required>
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Add Supplier">
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
</html>
