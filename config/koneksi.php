<?php
$host = 'localhost';
$dbname = 'perpustakaan';  // Ganti dengan nama database Anda
$username = 'root';  // Ganti dengan username MySQL Anda
$password = '';      // Ganti dengan password MySQL Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>