<?php
require '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    $query = "INSERT INTO anggota (nama, alamat, telepon, email) VALUES ('$nama', '$alamat', '$telepon', '$email')";
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
    <title>Tambah Anggota</title>
</head>
<body>
    <h2>Tambah Anggota</h2>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" required><br>
        <label>Alamat:</label>
        <textarea name="alamat" required></textarea><br>
        <label>Telepon:</label>
        <input type="text" name="telepon" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
