<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h1>Add Supplier</h1>
      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="addSupplier.php" method="post">
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