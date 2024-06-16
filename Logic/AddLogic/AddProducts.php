<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $products_name = filter_var(htmlspecialchars($_POST["products_name"]), FILTER_SANITIZE_SPECIAL_CHARS);
    $products_price = filter_var(htmlspecialchars($_POST["products_price"]));
    $products_stocks = htmlspecialchars($_POST["products_stocks"]);


    if (!empty($_FILES["products_image"]["name"])) {
        $target_dir = "Assets/Images/";
        $target_file = $target_dir . basename($_FILES["products_image"]["name"]);
     
        $imageExt = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_file_ext = array("jpg", "png", "jpeg");

    
        if (!in_array($imageExt, $allowed_file_ext)) {
            $resMessage = array(
                "status" => "alert-danger",
                "message" => "Image not supported"
            );
        } elseif ($_FILES["products_image"]["size"] > 2097152) { 
            $resMessage = array(
                "status" => "alert-danger",
                "message" => "File is too large. File should be less than 2MB"
            );
        } else {
            if (move_uploaded_file($_FILES["products_image"]["tmp_name"], $target_file)) {
                $stmt = $pdo->prepare("INSERT INTO barang (nama_barang, harga_barang, stok_barang, img_products) VALUES (?, ?, ?, ?)");
                $stmt->bindValue(1, $products_name);
                $stmt->bindValue(2, $products_price);
                $stmt->bindValue(3, $products_stocks);
                $stmt->bindValue(4, $target_file);
                // var_dump($target_file);
                // die();
                if ($stmt->execute()) {
                    $resMessage = array(
                        "status" => "alert-success",
                        "message" => "Image uploaded successfully"
                    );
                    header("Location: products.php");
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