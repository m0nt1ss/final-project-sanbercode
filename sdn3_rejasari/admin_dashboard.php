<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin - SDN 3 Rejasari</title>
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
    .navbar .navbar-brand {
      font-weight: 600;
      font-size: 1.5rem;
      color: white;
    }
    .navbar .btn {
      color: white;
      border: 1px solid white;
    }
    .dashboard-title {
      font-size: 2rem;
      font-weight: 600;
      margin-bottom: 40px;
      color: #007a7a;
    }
    .card {
      border: none;
      border-radius: 1rem;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(8px);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    .card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }
    .card i {
      font-size: 2.8rem;
      margin-bottom: 10px;
    }
    .card-title {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 0.5rem;
    }
    .card p {
      font-size: 0.85rem;
      color: #666;
    }
    .btn-dashboard {
      border-radius: 30px;
      padding: 8px 20px;
      font-size: 0.85rem;
      font-weight: 500;
      text-transform: uppercase;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <span class="navbar-brand">Dashboard Admin</span>
    <div class="ms-auto">
      <a href="ganti_password.php" class="btn btn-outline-light btn-sm me-2">Ganti Password</a>
      <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container my-5">
  <div class="dashboard-title text-center">Selamat Datang, Admin!</div>
  <div class="row g-4 justify-content-center">

    <!-- Menu Pesan -->
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card text-center p-4">
        <i class="bi bi-envelope-fill text-primary"></i>
        <h5 class="card-title">Pesan Masuk</h5>
        <p>Lihat dan kelola pesan dari pengunjung.</p>
        <a href="admin_pesan.php" class="btn btn-primary btn-dashboard">Lihat Pesan</a>
      </div>
    </div>

    <!-- Menu PPDB -->
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card text-center p-4">
        <i class="bi bi-people-fill text-success"></i>
        <h5 class="card-title">Data PPDB</h5>
        <p>Kelola data pendaftar siswa baru.</p>
        <a href="admin_ppdb.php" class="btn btn-success btn-dashboard">Kelola PPDB</a>
      </div>
    </div>

    <!-- Menu Prestasi -->
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card text-center p-4">
        <i class="bi bi-award-fill text-warning"></i>
        <h5 class="card-title">Data Prestasi</h5>
        <p>Tambah, edit, dan hapus prestasi siswa.</p>
        <a href="admin_prestasi.php" class="btn btn-warning text-white btn-dashboard">Kelola Prestasi</a>
      </div>
    </div>

    <!-- Menu Berita -->
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card text-center p-4">
        <i class="bi bi-newspaper text-info"></i>
        <h5 class="card-title">Berita Sekolah</h5>
        <p>Kelola berita terbaru sekolah.</p>
        <a href="admin_berita.php" class="btn btn-info text-white btn-dashboard">Kelola Berita</a>
      </div>
    </div>

    <!-- Menu Galeri -->
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card text-center p-4">
        <i class="bi bi-images text-secondary"></i>
        <h5 class="card-title">Galeri Sekolah</h5>
        <p>Tambah dan kelola foto kegiatan sekolah.</p>
        <a href="admin_galeri.php" class="btn btn-secondary btn-dashboard">Kelola Galeri</a>
      </div>
    </div>

    <!-- Menu Data Guru -->
    <div class="col-sm-6 col-md-4 col-lg-3">
      <div class="card text-center p-4">
        <i class="bi bi-person-fill text-danger"></i>
        <h5 class="card-title">Data Guru</h5>
        <p>Tambah, edit, dan hapus data guru.</p>
        <a href="admin_guru.php" class="btn btn-danger btn-dashboard">Kelola Guru</a>
      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>