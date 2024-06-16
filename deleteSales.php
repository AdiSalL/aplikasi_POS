<?php
include "conn/db.php";
$id_penjualan = $_GET["id"];
$sql = "SET FOREIGN_KEY_CHECKS=0";
$pdo->query($sql);

$sql ="DELETE FROM  penjualan  WHERE id_penjualan = :id_penjualan ";
$stmt = $pdo->prepare($sql);
$stmt->execute(["id_penjualan" => $id_penjualan]);

$sql = "SET FOREIGN_KEY_CHECKS=0";
$pdo->query($sql);


header("Location: penjualan.php");
exit();




?>