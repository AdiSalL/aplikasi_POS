<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  $username   = filter_var(htmlspecialchars($_POST["username"]), FILTER_SANITIZE_SPECIAL_CHARS);
  $no_handphone = filter_var(htmlspecialchars($_POST["phone"]));
  $alamat = htmlspecialchars($_POST["address"]);



  if (!empty($_FILES["profile_user"]["name"])) {
      $target_dir = "Assets/Images/";
      $target_file = $target_dir . basename($_FILES["profile_user"]["name"]);
   
      $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      $allowed_file_ext = array("jpg", "png", "jpeg");

  
      if (!in_array($imageExt, $allowed_file_ext)) {
          $resMessage = array(
              "status" => "alert-danger",
              "message" => "Image not supported"
          );
      } elseif ($_FILES["profile_user"]["size"] > 2097152) { 
          $resMessage = array(
              "status" => "alert-danger",
              "message" => "File is too large. File should be less than 2MB"
          );
      } else {
          if (move_uploaded_file($_FILES["profile_user"]["tmp_name"], $target_file)) {
            $stmt = $pdo->prepare("INSERT INTO pelanggan (nama_pelanggan, no_handphone, alamat, img_cus) VALUES (?, ?, ?, ?)");
            $stmt->bindValue(1,  $username );
            $stmt->bindValue(2,   $no_handphone);
            $stmt->bindValue(3,$alamat);
            $stmt->bindValue(4 ,  $target_file);

              // var_dump($target_file);
              // die();
              if ($stmt->execute()) {
                  $resMessage = array(
                      "status" => "alert-success",
                      "message" => "Image uploaded successfully"
                  );
                  header("Location: customers.php");
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
?>
