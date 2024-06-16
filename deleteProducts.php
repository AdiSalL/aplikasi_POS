<?php
include "conn/db.php";
$idBarang = $_GET['id'];

$sql = "DELETE FROM barang WHERE id_barang = $idBarang";
$pdo->query($sql);

header("Location: products.php");
?>
