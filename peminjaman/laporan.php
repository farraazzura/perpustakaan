<?php
require '../config/koneksi.php';

$query = "SELECT peminjaman.*, buku.judul, anggota.nama 
          FROM peminjaman
          JOIN buku ON peminjaman.id_buku = buku.id_buku
          JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
</head>
<body>
    <h2>Laporan Peminjaman</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>Judul Buku</th>
                <th>Nama Anggota</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status Pengembalian</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['id_peminjaman']; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['tanggal_pinjam']; ?></td>
                <td><?php echo $row['tanggal_kembali']; ?></td>
                <td><?php echo $row['status_pengembalian'] ? 'Sudah Kembali' : 'Belum Kembali'; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
