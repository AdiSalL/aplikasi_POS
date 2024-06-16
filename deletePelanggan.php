<?php
include "conn/db.php";
$idpelanggan = $_GET['id'];

$sql = "DELETE FROM pelanggan WHERE id_pelanggan = $idpelanggan";
$pdo->query($sql);

header("Location: customers.php");
?>
