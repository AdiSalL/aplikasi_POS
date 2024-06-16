<?php
$username = "root";
$pwd = "";
$db = "aplikasi_toko_db";
$host = "localhost";

$dsn = "mysql:host=$host;dbname=$db;";

try {
    $pdo = new PDO($dsn, $username, $pwd);

}catch(PDOException $e) {
    echo $e->getMessage();
    return;
}

session_start();

