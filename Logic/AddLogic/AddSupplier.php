<?php 



if($_SERVER["REQUEST_METHOD"] === "POST"){

    $nama_supplier   = filter_var(htmlspecialchars($_POST["nama_supplier"]), FILTER_SANITIZE_SPECIAL_CHARS);
    $no_handphone = filter_var(htmlspecialchars($_POST["no_handphone"]));
    $alamat = htmlspecialchars($_POST["address"]);

    if(!empty($nama_supplier) || !empty($nama_supplier) || !empty($nama_supplier)) {
        $stmt = $pdo->prepare("INSERT INTO supplier (nama_supplier, no_handphone, alamat) VALUES (?, ?, ?)");
        $stmt->bindValue(1, $nama_supplier);
        $stmt->bindValue(2, $no_handphone);
        $stmt->bindValue(3, $alamat);
        
        $stmt->execute();
        header("Location: supplier.php");
    }

}


?>