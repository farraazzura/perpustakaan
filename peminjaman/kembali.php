<?php
require '../config/koneksi.php';

// Ambil data peminjaman berdasarkan ID
$id_peminjaman = $_GET['id'];

$query = "SELECT peminjaman.*, buku.judul, anggota.nama 
          FROM peminjaman
          JOIN buku ON peminjaman.id_buku = buku.id_buku
          JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota
          WHERE id_peminjaman = $id_peminjaman";

$result = mysqli_query($koneksi, $query);
$peminjaman = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status_pengembalian = 1; // Status 1 berarti sudah dikembalikan

    // Update status pengembalian
    $updateQuery = "UPDATE peminjaman SET status_pengembalian = $status_pengembalian WHERE id_peminjaman = $id_peminjaman";
    if (mysqli_query($koneksi, $updateQuery)) {
        // Kembalikan stok buku
        $id_buku = $peminjaman['id_buku'];
        $updateStok = "UPDATE buku SET stok = stok + 1 WHERE id_buku = $id_buku";
        mysqli_query($koneksi, $updateStok);

        header("Location: laporan.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Buku</title>
</head>
<body>
    <h2>Pengembalian Buku</h2>
    <form method="POST">
        <p>Judul Buku: <?php echo $peminjaman['judul']; ?></p>
        <p>Nama Anggota: <?php echo $peminjaman['nama']; ?></p>
        <p>Tanggal Pinjam: <?php echo $peminjaman['tanggal_pinjam']; ?></p>
        <p>Tanggal Kembali: <?php echo $peminjaman['tanggal_kembali']; ?></p>
        <button type="submit">Kembalikan Buku</button>
    </form>
</body>
</html>
