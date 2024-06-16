
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h1>Add Buys</h1>
      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="addPembelian.php" method="post">
                        <div class="mb-3">
                                <label for="customers_name" class="form-label">Supplier Name</label>
                                <!-- <input type="text" class="form-control" id="products_name" name="products_name" required> -->
                                <select class="form-select" aria-label="Default select example" id="customers_name" name="customers_name">
                                    <option selected>Customers Name</option>
                                    <?php 
                                    $sql = "SELECT * FROM supplier";
                                    $stmt = $pdo->query($sql);
                                    $rows = $stmt->fetchAll();
                                    ?>
                                    <?php foreach($rows as $row):?>
                                    <option value="<?= $row["id_supplier"]?>"><?= $row["nama_supplier"]?></option>
                                      <?php endforeach?>
                                </select>
                        </div>
                            <div class="mb-3">
                                <label for="products_name" class="form-label">Products Name</label>
                                <!-- <input type="select" class="form-control" id="products_name" name="products_name" list="products" required> -->
                                <select class="form-select" aria-label="Default select example" id="products_name" name="products_name" >
                                    <option selected>Choose Products</option>
                                    <?php 
                                    $sql = "SELECT * FROM barang";
                                    $stmt = $pdo->query($sql);
                                    $rows = $stmt->fetchAll();
                                    ?>
                                    <?php foreach($rows as $row):?>
                                    <option value="<?= $row["id_barang"]?>"><?= $row["nama_barang"]?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="products_price" class="form-label">Products Price Pcs</label>
                                <!-- <input type="number" class="form-control" id="products_price" name="products_price"  min="500" max="999999999999" placeholder="RP." step="500" required> -->
                                <select class="form-select" aria-label="Default select example" id="products_price" name="products_price" >
                                    <option selected>Products Price Pcs</option>
                                    <?php 
                                    $sql = "SELECT * FROM barang";
                                    $stmt = $pdo->query($sql);
                                    $rows = $stmt->fetchAll();
                                    ?>
                                    <?php foreach($rows as $row):?>
                                            <option><?= $row["harga_barang"]?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="products_quantity" class="form-label">Products Stock</label>
                                <select class="form-select" aria-label="Default select example" id="products_quantity" name="products_quantity" >
                                    <option selected>Products Stok</option>
                                    <?php 
                                    $sql = "SELECT * FROM barang";
                                    $stmt = $pdo->query($sql);
                                    $rows = $stmt->fetchAll();
                                    ?>
                                    <?php foreach($rows as $row):?>
                                            <option><?= $row["stok_barang"]?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Add Buys    ">
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
</html>