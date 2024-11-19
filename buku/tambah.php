<?php
require '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    $query = "INSERT INTO buku (judul, pengarang, penerbit, tahun_terbit, kategori, stok)
              VALUES ('$judul', '$pengarang', '$penerbit', '$tahun_terbit', '$kategori', '$stok')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: daftar.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku</h2>
    <form method="POST">
        <label>Judul:</label>
        <input type="text" name="judul" required><br>
        <label>Pengarang:</label>
        <input type="text" name="pengarang" required><br>
        <label>Penerbit:</label>
        <input type="text" name="penerbit" required><br>
        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" required><br>
        <label>Kategori:</label>
        <input type="text" name="kategori" required><br>
        <label>Stok:</label>
        <input type="number" name="stok" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
