<?php
require "conn/db.php";

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = htmlspecialchars($_POST["customers_name"]);
    $products = htmlspecialchars($_POST["products_name"]);
    $price = htmlspecialchars($_POST["products_price"]);
    $quantity = htmlspecialchars($_POST["products_quantity"]);
  
    if(!empty($username)) {
      try {
        $pdo->beginTransaction();
        $sql1 = "INSERT INTO pembelian(id_supplier) VALUES(:username)";
        $stmt1 = $pdo->prepare($sql1);
        $stmt1->bindValue(":username", $username);
        $stmt1->execute();
        
        $penjualanId = $pdo->lastInsertId();
        
        $sql2 = "INSERT INTO pembelian_barang(id_pembelian, id_barang, harga_barang, jumlah) VALUES(:id_penjualan, :id_barang, :harga_barang, :jumlah_barang)";
        $stmt2 = $pdo->prepare($sql2);
        
        $stmt2->bindValue(":id_penjualan", $penjualanId );
        $stmt2->bindValue(":id_barang", $products);
        $stmt2->bindValue(":harga_barang", $price);
        $stmt2->bindValue(":jumlah_barang", $quantity);
        $stmt2->execute();

        $pdo->commit();
        header("Location: penjualan.php");
      }catch(Exception $e){
        $pdo->rollBack();
        throw $e;
      }
  }

}


?>