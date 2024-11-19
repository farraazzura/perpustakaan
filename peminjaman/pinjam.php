<?php
require '../config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_buku = $_POST['id_buku'];
    $id_anggota = $_POST['id_anggota'];
    $tanggal_pinjam = $_POST['tanggal_pinjam'];
    $tanggal_kembali = $_POST['tanggal_kembali'];

    $query = "INSERT INTO peminjaman (id_buku, id_anggota, tanggal_pinjam, tanggal_kembali, status_pengembalian)
              VALUES ('$id_buku', '$id_anggota', '$tanggal_pinjam', '$tanggal_kembali', 0)";

    if (mysqli_query($koneksi, $query)) {
        header("Location: laporan.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Peminjaman Buku</title>
</head>
<body>
    <h2>Peminjaman Buku</h2>
    <form method="POST">
        <label>ID Buku:</label>
        <input type="number" name="id_buku" required><br>
        <label>ID Anggota:</label>
        <input type="number" name="id_anggota" required><br>
        <label>Tanggal Pinjam:</label>
        <input type="date" name="tanggal_pinjam" required><br>
        <label>Tanggal Kembali:</label>
        <input type="date" name="tanggal_kembali" required><br>
        <button type="submit">Pinjam</button>
    </form>
</body>
</html>
