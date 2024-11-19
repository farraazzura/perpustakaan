<?php
require '../config/koneksi.php';

// Ambil data buku berdasarkan ID
$id_buku = $_GET['id'];
$query = "SELECT * FROM buku WHERE id_buku = $id_buku";
$result = mysqli_query($koneksi, $query);
$buku = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    $updateQuery = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', 
                    tahun_terbit='$tahun_terbit', kategori='$kategori', stok='$stok'
                    WHERE id_buku=$id_buku";

    if (mysqli_query($koneksi, $updateQuery)) {
        header("Location: daftar.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Buku</title>
</head>
<body>
    <h2>Edit Buku</h2>
    <form method="POST">
        <label>Judul:</label>
        <input type="text" name="judul" value="<?php echo $buku['judul']; ?>" required><br>
        <label>Pengarang:</label>
        <input type="text" name="pengarang" value="<?php echo $buku['pengarang']; ?>" required><br>
        <label>Penerbit:</label>
        <input type="text" name="penerbit" value="<?php echo $buku['penerbit']; ?>" required><br>
        <label>Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" value="<?php echo $buku['tahun_terbit']; ?>" required><br>
        <label>Kategori:</label>
        <input type="text" name="kategori" value="<?php echo $buku['kategori']; ?>" required><br>
        <label>Stok:</label>
        <input type="number" name="stok" value="<?php echo $buku['stok']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
