<?php
include 'koneksi.php';

$success = "";

// Hapus pesan jika diminta
if (isset($_GET['hapus'])) {
  $id = intval($_GET['hapus']);
  mysqli_query($koneksi, "DELETE FROM kontak WHERE id = $id");
  $success = "Pesan berhasil dihapus.";
}

// Ambil semua pesan
$result = mysqli_query($koneksi, "SELECT * FROM kontak ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin - Pesan Masuk</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    .navbar-brand {
      font-weight: 600;
      font-size: 1.5rem;
      color: white;
    }
    .card {
      border: none;
      border-radius: 1rem;
      padding: 2rem;
      background: #fff;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      margin-top: 2rem;
    }
    .table thead {
      background-color: #00C4CC;
      color: white;
    }
    .btn {
      border-radius: 30px;
      font-size: 0.9rem;
    }
    .alert {
      border-radius: 10px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <span class="navbar-brand">Pesan Masuk</span>
    <div class="ms-auto">
      <a href="admin_dashboard.php" class="btn btn-outline-light btn-sm">Kembali ke Dashboard</a>
    </div>
  </div>
</nav>

<div class="container">
  <div class="card">
    <h3 class="mb-4 text-center fw-bold text-primary">Pesan dari Pengunjung</h3>

    <?php if ($success): ?>
      <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>

    <div class="table-responsive">
      <table class="table table-hover align-middle text-center">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Tindakan</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)):
          ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td class="text-start"><?= nl2br(htmlspecialchars($row['pesan'])) ?></td>
            <td>
              <a href="mailto:<?= $row['email'] ?>?subject=Balasan dari SDN 3 Rejasari" class="btn btn-success btn-sm mb-1"><i class="bi bi-reply"></i> Balas</a>
              <a href="?hapus=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pesan ini?')"><i class="bi bi-trash"></i> Hapus</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>