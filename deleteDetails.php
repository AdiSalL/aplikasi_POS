<?php
include "conn/db.php";
$id_penjualan = $_GET['id'];
$id_barang = $_GET['id_barang'];
$sql = "DELETE FROM penjualan_barang  WHERE id_penjualan = $id_penjualan  AND id_barang = $id_barang";
$pdo->query($sql);
header("Location: penjualan.php");
?>