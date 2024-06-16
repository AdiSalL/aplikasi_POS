
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h1>Add Products</h1>
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
                        <form action="addProducts.php" method="post" enctype="multipart/form-data">
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
                                <input type="submit" class="btn btn-primary" value="Add Products">
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