<?php
session_start();
require 'config/koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id_pengguna'])) {
    header("Location: login.php");
    exit;
}

// Ambil data untuk statistik
$totalBukuQuery = "SELECT COUNT(*) AS total_buku FROM buku";
$totalAnggotaQuery = "SELECT COUNT(*) AS total_anggota FROM anggota";
$totalPeminjamanQuery = "SELECT COUNT(*) AS total_peminjaman FROM peminjaman WHERE status_pengembalian = 0";
$totalPengembalianQuery = "SELECT COUNT(*) AS total_pengembalian FROM peminjaman WHERE status_pengembalian = 1";

$totalBuku = mysqli_fetch_assoc(mysqli_query($koneksi, $totalBukuQuery))['total_buku'];
$totalAnggota = mysqli_fetch_assoc(mysqli_query($koneksi, $totalAnggotaQuery))['total_anggota'];
$totalPeminjaman = mysqli_fetch_assoc(mysqli_query($koneksi, $totalPeminjamanQuery))['total_peminjaman'];
$totalPengembalian = mysqli_fetch_assoc(mysqli_query($koneksi, $totalPengembalianQuery))['total_pengembalian'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Perpustakaan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Dashboard Perpustakaan</h1>
        <div class="row mt-4">
            <!-- Statistik -->
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total Buku</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $totalBuku; ?></h5>
                        <p class="card-text">Jumlah buku yang tersedia di perpustakaan.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Anggota</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $totalAnggota; ?></h5>
                        <p class="card-text">Jumlah anggota perpustakaan yang terdaftar.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Peminjaman Aktif</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $totalPeminjaman; ?></h5>
                        <p class="card-text">Jumlah buku yang sedang dipinjam.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Pengembalian</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $totalPengembalian; ?></h5>
                        <p class="card-text">Jumlah buku yang telah dikembalikan.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigasi -->
        <div class="mt-4">
            <h3>Menu</h3>
            <div class="list-group">
                <a href="buku/daftar.php" class="list-group-item list-group-item-action">Manajemen Buku</a>
                <a href="anggota/daftar.php" class="list-group-item list-group-item-action">Manajemen Anggota</a>
                <a href="peminjaman/pinjam.php" class="list-group-item list-group-item-action">Peminjaman Buku</a>
                <a href="peminjaman/laporan.php" class="list-group-item list-group-item-action">Laporan Peminjaman</a>
                <a href="logout.php" class="list-group-item list-group-item-action text-danger">Logout</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
