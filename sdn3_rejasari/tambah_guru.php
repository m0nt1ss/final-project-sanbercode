<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $nip = htmlspecialchars($_POST['nip']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    // Upload foto
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    $folder = 'images/';
    $ekstensi = pathinfo($foto, PATHINFO_EXTENSION);
    $nama_baru = uniqid() . '.' . $ekstensi;

    if (move_uploaded_file($tmp, $folder . $nama_baru)) {
        $query = "INSERT INTO guru (nama, nip, jabatan, deskripsi, foto)
                  VALUES ('$nama', '$nip', '$jabatan', '$deskripsi', '$nama_baru')";
        mysqli_query($koneksi, $query);
        header("Location: admin_guru.php");
        exit;
    } else {
        $error = "Gagal mengupload foto.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Guru - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h3 class="mb-4">Tambah Data Guru</h3>

  <?php if (isset($error)) { ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php } ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">NIP</label>
      <input type="text" name="nip" class="form-control" required>
    </div>
    <div class="mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <input type="text" name="jabatan" class="form-control" id="jabatan">
  </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4"><?= isset($data['deskripsi']) ? htmlspecialchars($data['deskripsi']) : '' ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Foto</label>
      <input type="file" name="foto" class="form-control" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="admin_guru.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>