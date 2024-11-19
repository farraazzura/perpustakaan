<?php
require '../config/koneksi.php';

$id_anggota = $_GET['id'];

$query = "DELETE FROM anggota WHERE id_anggota = $id_anggota";

if (mysqli_query($koneksi, $query)) {
    header("Location: daftar.php");
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
