<?php
include_once "./conn/db.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users (username, password) VALUES (:username, :password)';
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['username' => $username, 'password' => $password])) {
        echo 'User registered successfully';
    } else {
        echo 'Error registering user';
    }
}

include_once "./Components/BS/Sidebar.php";
include "./Assets/CDN/script.php";
?>


<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

      <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                  <div class="card-header">
                        <h1>Register</h1>
                  </div>
                    <div class="card-body">
                    <form action="register.php" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="username" class="form-label">User Name</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            
                            <div class="d-grid">
                                <input type="submit" class="btn btn-primary" value="Register">
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