<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <h1>Add User</h1>
      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="addPelanggan.php" method="post" enctype="multipart/form-data">
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
                            <div class="mb-3">
                            <div class="w-100 h-100 " style="overflow:hidden; ">
                                  <img src="..." class="figure-img rounded mx-auto d-block" width="200px" alt="" id="img-placeholder">
                                </div>
                                <label for="profile_user" class="form-label">Profile picture</label>
                                <input type="file" class="form-control" id="profile_user" name="profile_user" required>
                            </div>

                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Add Pelanggan">
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