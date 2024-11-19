<?php
require '../config/koneksi.php';

$id_buku = $_GET['id'];

$query = "DELETE FROM buku WHERE id_buku = $id_buku";

if (mysqli_query($koneksi, $query)) {
    header("Location: daftar.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
