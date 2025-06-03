<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM prestasi WHERE id = $id");
$data = mysqli_fetch_assoc($query);

// Proses update
if (isset($_POST['update'])) {
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $gambarBaru = $_FILES['gambar']['name'];
  $tmp = $_FILES['gambar']['tmp_name'];

  if ($gambarBaru) {
    move_uploaded_file($tmp, "images/$gambarBaru");
    $queryUpdate = "UPDATE prestasi SET judul='$judul', deskripsi='$deskripsi', gambar='$gambarBaru' WHERE id=$id";
  } else {
    $queryUpdate = "UPDATE prestasi SET judul='$judul', deskripsi='$deskripsi' WHERE id=$id";
  }

  mysqli_query($koneksi, $queryUpdate);
  header("Location: admin_prestasi.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Prestasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h3>Edit Prestasi</h3>
  <form action="" method="POST" enctype="multipart/form-data" class="p-3 border rounded">
    <div class="mb-3">
      <label for="judul" class="form-label">Judul</label>
      <input type="text" name="judul" id="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required><?= htmlspecialchars($data['deskripsi']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Gambar Saat Ini</label><br>
      <img src="images/<?= htmlspecialchars($data['gambar']) ?>" width="120" alt="Gambar Prestasi">
    </div>
    <div class="mb-3">
      <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
      <input type="file" name="gambar" id="gambar" class="form-control">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Simpan Perubahan</button>
    <a href="admin_prestasi.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>