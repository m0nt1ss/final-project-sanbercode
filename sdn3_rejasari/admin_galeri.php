<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$koneksi = new mysqli("localhost", "root", "", "sdn3_rejasari");

// Proses Tambah
if (isset($_POST['upload'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $lokasi = "images/" . $gambar;

    if (move_uploaded_file($tmp, $lokasi)) {
        $koneksi->query("INSERT INTO galeri (gambar, judul, deskripsi) VALUES ('$gambar', '$judul', '$deskripsi')");
    }
}

// Proses Hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $data = $koneksi->query("SELECT * FROM galeri WHERE id=$id")->fetch_assoc();
    unlink("images/" . $data['gambar']);
    $koneksi->query("DELETE FROM galeri WHERE id=$id");
    header("Location: admin_galeri.php");
}

// Proses Edit
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $gambarBaru = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];

    if ($gambarBaru != "") {
        $lokasi = "images/" . $gambarBaru;
        move_uploaded_file($tmp, $lokasi);

        $gambarLama = $koneksi->query("SELECT gambar FROM galeri WHERE id=$id")->fetch_assoc();
        unlink("images/" . $gambarLama['gambar']);

        $koneksi->query("UPDATE galeri SET gambar='$gambarBaru', judul='$judul', deskripsi='$deskripsi' WHERE id=$id");
    } else {
        $koneksi->query("UPDATE galeri SET judul='$judul', deskripsi='$deskripsi' WHERE id=$id");
    }

    header("Location: admin_galeri.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Galeri - SDN 3 Rejasari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #e0f7fa, #f1f8e9);
      font-family: 'Poppins', sans-serif;
      color: #333;
    }
    .navbar {
      background-color: #00C4CC;
    }
    .navbar .navbar-brand {
      font-weight: 600;
      font-size: 1.5rem;
      color: white;
    }
    .navbar .btn {
      color: white;
      border: 1px solid white;
    }
    .card-custom {
      border: none;
      border-radius: 1rem;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(8px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    .table thead {
      background-color: #00C4CC;
      color: white;
    }
    .btn-primary, .btn-warning, .btn-danger {
      border-radius: 30px;
      font-weight: 500;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <span class="navbar-brand">Kelola Galeri</span>
    <div class="ms-auto">
      <a href="admin_dashboard.php" class="btn btn-outline-light btn-sm me-2">Dashboard</a>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container my-5">
  <!-- Form Tambah -->
  <div class="card card-custom p-4 mb-4">
    <h5 class="mb-3">Tambah Foto Baru</h5>
    <form method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label class="form-label">Judul</label>
        <input type="text" name="judul" class="form-control" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="2" required></textarea>
      </div>
      <div class="mb-3">
        <label class="form-label">Gambar</label>
        <input type="file" name="gambar" class="form-control" required>
      </div>
      <button type="submit" name="upload" class="btn btn-primary">Upload</button>
    </form>
  </div>

  <!-- Tabel Galeri -->
  <div class="card card-custom p-4">
    <h5 class="mb-3">Daftar Galeri</h5>
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead>
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $data = $koneksi->query("SELECT * FROM galeri ORDER BY id DESC");
          while ($row = $data->fetch_assoc()):
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><img src="images/<?= $row['gambar'] ?>" width="100" class="rounded"></td>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['deskripsi'] ?></td>
            <td>
              <button class="btn btn-warning btn-sm mb-1" data-bs-toggle="modal" data-bs-target="#editModal<?= $row['id'] ?>"><i class="bi bi-pencil-fill"></i></button>
              <a href="?hapus=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></a>
            </td>
          </tr>

          <!-- Modal Edit -->
          <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1">
            <div class="modal-dialog">
              <form method="post" enctype="multipart/form-data" class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Edit Galeri</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  <input type="hidden" name="id" value="<?= $row['id'] ?>">
                  <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" name="judul" class="form-control" value="<?= $row['judul'] ?>" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" required><?= $row['deskripsi'] ?></textarea>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Ganti Gambar (Opsional)</label>
                    <input type="file" name="gambar" class="form-control">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>
          <?php endwhile ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>