<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM barang WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
  $kode   = $_POST['kode_barang'];
  $nama   = $_POST['nama_barang'];
  $jumlah = $_POST['jumlah'];
  $lokasi = $_POST['lokasi'];

  $query = mysqli_query($conn, "UPDATE barang SET 
    kode_barang='$kode', 
    nama_barang='$nama', 
    jumlah='$jumlah', 
    lokasi='$lokasi' 
    WHERE id=$id");

  if ($query) {
    header('Location: index.php');
  } else {
    echo "Gagal mengupdate data!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">✏️ Edit Barang</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Kode Barang</label>
      <input type="text" name="kode_barang" class="form-control" value="<?= $row['kode_barang']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" class="form-control" value="<?= $row['nama_barang']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" value="<?= $row['jumlah']; ?>" required>
    </div>
    <div class="mb-3">
      <label>Lokasi</label>
      <input type="text" name="lokasi" class="form-control" value="<?= $row['lokasi']; ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
