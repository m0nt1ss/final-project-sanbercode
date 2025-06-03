<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM guru WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);

    if (!$data) {
        header("Location: admin_guru.php");
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $nip = htmlspecialchars($_POST['nip']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);
    
    // Mengambil foto lama untuk dihapus jika diubah
    $foto_lama = $data['foto'];

    // Cek apakah ada foto baru
    if ($_FILES['foto']['error'] == 0) {
        // Upload foto baru
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $folder = 'images/';
        $ekstensi = pathinfo($foto, PATHINFO_EXTENSION);
        $nama_baru = uniqid() . '.' . $ekstensi;

        if (move_uploaded_file($tmp, $folder . $nama_baru)) {
            // Hapus foto lama jika ada
            unlink($folder . $foto_lama);
            $query = "UPDATE guru SET nama='$nama', nip='$nip', jabatan='$jabatan', deskripsi='$deskripsi', foto='$nama_baru' WHERE id='$id'";
        } else {
            $error = "Gagal mengupload foto.";
        }
    } else {
        // Jika foto tidak diubah, hanya update data lainnya
        $query = "UPDATE guru SET nama='$nama', nip='$nip', jabatan='$jabatan', deskripsi='$deskripsi' WHERE id='$id'";
    }

    if (mysqli_query($koneksi, $query)) {
        header("Location: admin_guru.php");
        exit;
    } else {
        $error = "Gagal memperbarui data.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Guru - Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5">
  <h3 class="mb-4">Edit Data Guru</h3>

  <?php if (isset($error)) { ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php } ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label class="form-label">Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
    </div>
    <div class="mb-3">
      <label class="form-label">NIP</label>
      <input type="text" name="nip" class="form-control" value="<?= htmlspecialchars($data['nip']) ?>" required>
    </div>
    <div class="mb-3">
    <label for="jabatan" class="form-label">Jabatan</label>
    <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?= htmlspecialchars($data['jabatan']) ?>">
  </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Deskripsi</label>
      <textarea name="deskripsi" class="form-control" rows="4"><?= isset($data['deskripsi']) ? htmlspecialchars($data['deskripsi']) : '' ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Foto</label><br>
      <img src="images/<?= htmlspecialchars($data['foto']) ?>" width="150" height="150" alt="Foto Guru" class="mb-3">
      <input type="file" name="foto" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="admin_guru.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>