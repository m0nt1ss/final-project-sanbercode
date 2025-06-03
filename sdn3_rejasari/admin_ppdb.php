<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin PPDB - SDN 3 Rejasari</title>
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
      font-size: 0.85rem;
    }
    .table td, .table th {
      vertical-align: middle;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <span class="navbar-brand">Data Pendaftar PPDB</span>
    <div class="ms-auto">
      <a href="admin_dashboard.php" class="btn btn-outline-light btn-sm"><i class="bi bi-house-door-fill me-1"></i>Kembali ke Dashboard</a>
    </div>
  </div>
</nav>

<!-- Konten Utama -->
<div class="container">
  <div class="card">
    <h3 class="mb-4 text-center text-primary fw-bold">Daftar Pendaftar PPDB</h3>
    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle text-center">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>NISN</th>
            <th>Tempat, Tgl Lahir</th>
            <th>Alamat</th>
            <th>Asal TK</th>
            <th>Nama Orang Tua</th>
            <th>No. HP</th>
            <th>Tanggal Daftar</th>
            <th>Dokumen</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM ppdb ORDER BY tanggal_daftar DESC");
          while ($data = mysqli_fetch_assoc($query)) {
            $akta_file = 'uploads/' . $data['akta_file'];
            $kk_file = 'uploads/' . $data['kk_file'];
            $ijazah_file = 'uploads/' . $data['ijazah_file'];
            echo "<tr>
              <td>$no</td>
              <td>" . htmlspecialchars($data['nama_lengkap']) . "</td>
              <td>" . htmlspecialchars($data['nisn']) . "</td>
              <td>" . htmlspecialchars($data['tempat_lahir']) . ", " . htmlspecialchars($data['tanggal_lahir']) . "</td>
              <td>" . htmlspecialchars($data['alamat']) . "</td>
              <td>" . htmlspecialchars($data['asal_tk']) . "</td>
              <td>" . htmlspecialchars($data['nama_ortu']) . "</td>
              <td>" . htmlspecialchars($data['no_hp']) . "</td>
              <td>" . htmlspecialchars($data['tanggal_daftar']) . "</td>
              <td class='text-center'>";
              if (file_exists($akta_file)) {
                echo "<a href='$akta_file' target='_blank' class='btn btn-info btn-sm mb-1'><i class='bi bi-file-earmark-text'></i> Akta</a><br>";
              }
              if (file_exists($kk_file)) {
                echo "<a href='$kk_file' target='_blank' class='btn btn-info btn-sm mb-1'><i class='bi bi-file-earmark-text'></i> KK</a><br>";
              }
              if (file_exists($ijazah_file)) {
                echo "<a href='$ijazah_file' target='_blank' class='btn btn-info btn-sm mb-1'><i class='bi bi-file-earmark-text'></i> Ijazah</a>";
              }
            echo "</td>
              <td>
                <a href='hapus_ppdb.php?id={$data['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin hapus data ini?')\"><i class='bi bi-trash'></i> Hapus</a>
              </td>
            </tr>";
            $no++;
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>