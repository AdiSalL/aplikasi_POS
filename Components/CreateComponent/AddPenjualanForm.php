

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h1>Add Sales</h1>
      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="addPenjualan.php"  method="post" id="addPenjualanForm" class="mb-3">
                        <div class="mb-3">
                                <label for="customers_name" class="form-label">Customers Name</label>
                                <!-- <input type="text" class="form-control" id="products_name" name="products_name" required> -->
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
                                  <select class='form-select' name='products_name[]' id="0" onchange="choose_product(this)" required>
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
                                <input type="number" class="form-control" id="products_quantity" name="products_quantity[]" min="1" required>
                              </div>
                            </div> 
                         
                            <div class="mt-3 d-flex gap-1 justify-content-between items-center">
                              <a href="#"  class="btn btn-primary w-100 add_item_btn">Add Products</a>
                            </div>
                        </div>
                        
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Add Sales">
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