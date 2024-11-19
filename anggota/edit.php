<?php
require '../config/koneksi.php';

// Ambil data anggota berdasarkan ID
$id_anggota = $_GET['id'];
$query = "SELECT * FROM anggota WHERE id_anggota = $id_anggota";
$result = mysqli_query($koneksi, $query);
$anggota = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $email = $_POST['email'];

    $updateQuery = "UPDATE anggota SET nama='$nama', alamat='$alamat', telepon='$telepon', email='$email' WHERE id_anggota=$id_anggota";

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
    <title>Edit Anggota</title>
</head>
<body>
    <h2>Edit Anggota</h2>
    <form method="POST">
        <label>Nama:</label>
        <input type="text" name="nama" value="<?php echo $anggota['nama']; ?>" required><br>
        <label>Alamat:</label>
        <textarea name="alamat" required><?php echo $anggota['alamat']; ?></textarea><br>
        <label>Telepon:</label>
        <input type="text" name="telepon" value="<?php echo $anggota['telepon']; ?>" required><br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $anggota['email']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
