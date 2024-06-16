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

    $username = htmlspecialchars($_POST["customers_name"]);
    $id_customers = $_POST["customers_id"];
    $products = $_POST["products_name"];
    $price = $_POST["products_price"];
    $quantity = $_POST["products_quantity"];
    $penjualanId = $_POST["id_sales"];

    if(!empty($username)) {
      try {
        $pdo->beginTransaction();
        $sql1 = "UPDATE penjualan SET id_pelanggan = :username WHERE id_penjualan = :id_customers";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindValue(":username", $username);
        $stmt1->bindValue(":id_customers",$id_customers);
        $stmt1->execute(); 

        $sql2 = "INSERT INTO penjualan_barang(id_penjualan, id_barang, harga_barang, jumlah) VALUES(:id_penjualan, :id_barang, :harga_barang, :jumlah_barang)";
          $stmt2 = $pdo->prepare($sql2);
    
          foreach($products as $index => $product){ 
            $stmt2->bindValue(":id_penjualan", $penjualanId);
            $stmt2->bindValue(":id_barang", htmlspecialchars($product));
            $stmt2->bindValue(":harga_barang", htmlspecialchars($price[$index]));
            $stmt2->bindValue(":jumlah_barang", htmlspecialchars($quantity[$index]));
            $stmt2->execute();
  
          }

        header("Location: penjualan.php");
        $pdo->commit();
      }catch(PDOException $e){
        if ($e->getCode() == 23000) {
          echo "<script>
          alert('Error: Duplicate entry for id_barang.');
             window.location.href = 'penjualan.php';
          </script>";
      } else {
          echo "<script>alert('Error: " . $e->getMessage() . "');
             window.location.href = 'penjualan.php';
          </script>";
      }$pdo->rollBack();
        throw $e;
      }
   
}
}

include_once "./Components/BS/Sidebar.php";
include "./Assets/CDN/script.php";



?>


    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h1>Update Sales</h1>
      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="updateSales.php"  method="post" id="addPenjualanForm" class="mb-3">
                        <div class="mb-3">
                                <label for="customers_name" class="form-label">Customers Name</label>
                                <!-- <input type="text" class="form-control" id="products_name" name="products_name" > -->
                                <select class="form-select" aria-label="Default select example" id="customers_name" name="customers_name">
                                    <?php 
                                    $sql = "SELECT * FROM pelanggan";
                                    $stmt = $pdo->query($sql);
                                    $rows = $stmt->fetchAll();
                                    ?>
                                    <?php foreach($rows as $row):?>
                                    <option value="<?= $row["id_pelanggan"]?>"><?= $row["nama_pelanggan"]?></option>
                                      <?php endforeach?>
                                    
                                </select>
                                <select class="form-select d-none" aria-label="Default select example" id="customers_id" name="customers_id">
                                    <option value="<?= $_GET["id"]?>"><?= $_GET["id"]?></option>
                                
                                </select>
                        </div>
                        <div  class="mb-3 row" id="list_select_product">
                             <div class="row" id="row_select_product">
                              <div class="col w-100">
                                <label for="products_name" class="form-label">Products
                                  <?php 
                                      $sql = "SELECT * FROM barang";
                                      $stmt = $pdo->query($sql);
                                      $rows = $stmt->fetchAll();
                                    ?>
                                  <select class='form-select' name='products_name[]' id="0" onchange="choose_product(this)" >
                                        <option></option>
                                        <?php foreach($rows as $row): ?>
                                          <option value='<?=$row['id_barang']?>' data-price="<?= $row['harga_barang'] ?> "><?= $row['nama_barang'] ?></option>
                                        <?php endforeach;?>
                                      
                                  </select>
                                  <select class='form-select d-none' name='id_sales' id="0" onchange="choose_product(this)" >
                                          <option value='<?=$_GET['id']?>' data-price="<?=$_GET['id'] ?> "><?= $_GET['id'] ?></option>
                                  </select>
                                </label>
                              </div>
                              <div class="col">
                                  <div>Harga</div>
                                  <div class="dispay_harga"></div> 
                                  <input type="hidden" name="products_price[]">
                              </div>
                              <div class="col">
                                <label for="products_quantity" class="form-label">Products quantity</label>
                                <input type="number" class="form-control" id="products_quantity" name="products_quantity[]" min="1" >
                              </div>
                            </div> 
                         
                            <div class="mt-3 d-flex gap-1 justify-content-between items-center">
                              <a href="#"  class="btn btn-primary w-100 add_item_btn">Add Products</a>
                            </div>
                        </div>
                        
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Update Customers">
                            </div>
                        </form>
                        <div class="alert alert-danger d-none" role="alert" id="alert">
  cant have same values on products. 
</div>
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
   let counter = 1;
      $(document).ready(function() {
        $(".add_item_btn").click(function(e){
          $("#list_select_product").prepend(`<div class="row" id="row_select_product">
                              <div class="col w-100">
                                <label for="products_name" class="form-label">Products
                                  <?php 
                                      $sql = "SELECT * FROM barang";
                                      $stmt = $pdo->query($sql);
                                      $rows = $stmt->fetchAll();
                                    ?>
                                  <select class='form-select' name='products_name[]' id='${counter++}' onchange="choose_product(this)" >
                                        <option></option>
                                        <?php foreach($rows as $row): ?>
                                          <option value='<?=$row['id_barang']?>' data-price="<?= $row['harga_barang'] ?> "><?= $row['nama_barang'] ?></option>
                                        <?php endforeach;?>
                                      
                                  </select>
                                </label>
                              </div>
                              <div class="col">
                                  <div>Harga</div>
                                  <div class="dispay_harga"></div> 
                                  <input type="hidden" name="products_price[]">
                              </div>
                              <div class="col">
                                <label for="products_quantity" class="form-label">Products quantity</label>
                                <input type="number" class="form-control" id="products_quantity" name="products_quantity[]" min="1" >
                              </div>
                             
                         
                            <div class="mt-3 d-flex gap-1 justify-content-between items-center">
                              <a href="#" class="btn btn-danger w-100 rmv_item_btn">Remove Products</a>
                            </div>
                            </div> `)
        })
        
        $(document).on("click", ".rmv_item_btn", function(e){
          let row_item = $(this).parent().parent();
          $(row_item).remove();
        })


    })
      function choose_product(e) {
        console.log(e)
        let value = e.value;
        let text = e.options[e.selectedIndex].getAttribute('data-price');
        let parent = (e.parentNode.parentNode.parentNode.getElementsByClassName('dispay_harga').item(0).innerText = text)
        parent = (e.parentNode.parentNode.parentNode.getElementsByTagName('input').item(0).value = text)
      
      }

      function checkDuplicates(e) {
        let selectProducts = document.querySelectorAll("#list_select_product select");
        let selectedOptions = [];

        selectProducts.forEach(select => {
          let selectedOption = select.value;

          if (selectedOptions.includes(selectedOption)) {
            e.preventDefault();
            // alert("Cannot have the same value in multiple selects");
            let alert = document.getElementById("alert");
            alert.classList.remove("d-none")
            return;
        }
        
        selectedOptions.push(selectedOption);
        })
      }
      let form = document.getElementById("addPenjualanForm");
      form.addEventListener("submit", checkDuplicates);

 </script>
 
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script src="dashboard.js"></script></body>
</html>

