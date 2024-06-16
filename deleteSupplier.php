<?php
include "conn/db.php";
$idBarang = $_GET['id'];

$sql = "DELETE FROM supplier WHERE id_supplier = $idBarang";
$pdo->query($sql);

header("Location: products.php");
?>
