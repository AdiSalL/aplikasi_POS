<?php 

if($_SERVER["REQUEST_METHOD"] === "POST"){

    $username = htmlspecialchars($_POST["customers_name"]);
    $products = $_POST["products_name"];
    $price = $_POST["products_price"];
    $quantity = $_POST["products_quantity"];



    if(!empty($username)) {
      try {
        $pdo->beginTransaction();
        $sql1 = "INSERT INTO penjualan(id_pelanggan) VALUES(:username)";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindValue(":username", $username);
        $stmt1->execute();
        $penjualanId = $pdo->lastInsertId();
          $sql2 = "INSERT INTO penjualan_barang(id_penjualan, id_barang, harga_barang, jumlah) VALUES(:id_penjualan, :id_barang, :harga_barang, :jumlah_barang)";
          $stmt2 = $pdo->prepare($sql2);
    
          foreach($products as $index => $product){ 
            $stmt2->bindValue(":id_penjualan", $penjualanId);
            $stmt2->bindValue(":id_barang", htmlspecialchars($product));
            $stmt2->bindValue(":harga_barang", htmlspecialchars($price[$index]));
            $stmt2->bindValue(":jumlah_barang", htmlspecialchars($quantity[$index]));
            $stmt2->execute();
  
          }

        $pdo->commit();
        header("Location: penjualan.php");
      }catch(Exception $e){
        $pdo->rollBack();
        throw $e;
      }
  }

}



?>