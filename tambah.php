<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
  $kode   = $_POST['kode_barang'];
    if (empty($kode)) {
    $kode = 'BRG-' . strtoupper(uniqid());
}
  $nama   = $_POST['nama_barang'];
  $jumlah = $_POST['jumlah'];
  $lokasi = $_POST['lokasi'];

  $query = mysqli_query($conn, "INSERT INTO barang (kode_barang, nama_barang, jumlah, lokasi) 
  VALUES ('$kode', '$nama', '$jumlah', '$lokasi')");

  if ($query) {
    header('Location: index.php');
  } else {
    echo "Gagal menyimpan data!";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h3 class="mb-4">➕ Tambah Barang</h3>
  <form method="POST">
    <div class="mb-3">
      <label>Kode Barang</label>
      <input type="text" name="kode_barang" class="form-control">
    </div>
    <div class="mb-3">
      <label>Nama Barang</label>
      <input type="text" name="nama_barang" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Jumlah</label>
      <input type="number" name="jumlah" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Lokasi</label>
      <input type="text" name="lokasi" class="form-control" required>
    </div>
    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
