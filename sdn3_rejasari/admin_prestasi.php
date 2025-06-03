<?php
include 'koneksi.php';

// Tambah Prestasi
if (isset($_POST['tambah'])) {
  $judul = $_POST['judul'];
  $deskripsi = $_POST['deskripsi'];
  $gambar = $_FILES['gambar']['name'];
  $tmp = $_FILES['gambar']['tmp_name'];

  if ($gambar) {
    move_uploaded_file($tmp, "images/$gambar");
    mysqli_query($koneksi, "INSERT INTO prestasi (judul, deskripsi, gambar) VALUES ('$judul', '$deskripsi', '$gambar')");
  }
  header("Location: admin_prestasi.php");
}

// Hapus Prestasi
if (isset($_GET['hapus'])) {
  $id = $_GET['hapus'];
  mysqli_query($koneksi, "DELETE FROM prestasi WHERE id = $id");
  header("Location: admin_prestasi.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin - Data Prestasi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #e0f7fa, #f1f8e9);
      font-family: 'Poppins', sans-serif;
    }
    .navbar {
      background-color: #00C4CC;
    }
    .navbar-brand {
      font-weight: 600;
      color: white;
      font-size: 1.5rem;
    }
    .card {
      border: none;
      border-radius: 1rem;
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
      margin-top: 1.5rem;
    }
    .card-header {
      border-radius: 1rem 1rem 0 0;
    }
    .btn {
      border-radius: 30px;
      font-size: 0.85rem;
    }
    img.img-thumbnail {
      border-radius: 0.75rem;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <span class="navbar-brand">Manajemen Data Prestasi</span>
    <div class="ms-auto">
      <a href="admin_dashboard.php" class="btn btn-outline-light btn-sm"><i class="bi bi-house-door-fill me-1"></i>Dashboard</a>
    </div>
  </div>
</nav>

<div class="container">
  <!-- Form Tambah Prestasi -->
  <div class="card">
    <div class="card-header bg-success text-white">
      <strong><i class="bi bi-plus-circle me-2"></i>Tambah Prestasi Baru</strong>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="judul" class="form-label">Judul Prestasi</label>
          <input type="text" name="judul" id="judul" class="form-control" required>
        </div>
        <div class="mb-3">
          <label for="deskripsi" class="form-label">Deskripsi</label>
          <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3" required></textarea>
        </div>
        <div class="mb-3">
          <label for="gambar" class="form-label">Gambar Prestasi</label>
          <input type="file" name="gambar" id="gambar" class="form-control" required>
        </div>
        <button type="submit" name="tambah" class="btn btn-success"><i class="bi bi-save"></i> Simpan Prestasi</button>
      </form>
    </div>
  </div>

  <!-- Tabel Data Prestasi -->
  <div class="card">
    <div class="card-header bg-primary text-white">
      <strong><i class="bi bi-trophy me-2"></i>Daftar Prestasi</strong>
    </div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle mb-0">
          <thead class="table-light text-center">
            <tr>
              <th style="width: 50px;">No</th>
              <th style="width: 100px;">Gambar</th>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th style="width: 160px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM prestasi ORDER BY id DESC");
            while ($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
              <td class="text-center"><?= $no++ ?></td>
              <td class="text-center">
                <img src="images/<?= htmlspecialchars($data['gambar']) ?>" width="80" class="img-thumbnail" alt="Gambar">
              </td>
              <td><?= htmlspecialchars($data['judul']) ?></td>
              <td><?= htmlspecialchars($data['deskripsi']) ?></td>
              <td class="text-center">
                <a href="edit_prestasi.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm mb-1"><i class="bi bi-pencil-square"></i> Edit</a>
                <a href="?hapus=<?= $data['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> Hapus</a>
              </td>
            </tr>
            <?php } ?>
            <?php if (mysqli_num_rows($query) == 0): ?>
            <tr>
              <td colspan="5" class="text-center text-muted">Belum ada data prestasi.</td>
            </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>