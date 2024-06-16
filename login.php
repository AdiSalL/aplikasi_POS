<?php

include_once "./conn/db.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id_users'];
        $_SESSION['username'] = $user['username'];
        echo "Login successful!";
        header('Location: products.php');
        exit;
    } else {
        echo "Invalid username or password.";
    }
}


include "./Assets/CDN/script.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

<div class="container mt-5">
  <div class="row justify-content-center">
      <div class="col-md-6">
          <div class="card">
            <div class="card-header">
                  <h1>Login</h1>
            </div>
              <div class="card-body">
              <form action="login.php" method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                          <label for="username" class="form-label">User Name</label>
                          <input type="text" class="form-control" id="username" name="username" required>
                      </div>
                      <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password" required>
                      </div>
                      
                      <div class="d-grid">
                          <input type="submit" class="btn btn-primary" value="Login">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


