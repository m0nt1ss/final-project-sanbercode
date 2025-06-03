<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Guru - SDN 3 Rejasari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }

    .section-title {
      font-weight: 700;
      color: #0d6efd;
    }

    .card-guru {
      border: none;
      border-radius: 1.5rem;
      box-shadow: 0 8px 24px rgba(0,0,0,0.06);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      background: #ffffff;
    }

    .card-guru:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 30px rgba(0,0,0,0.1);
    }

    .guru-img {
      width: 160px;
      height: 160px;
      object-fit: cover;
      border-radius: 50%;
      margin: 20px auto 10px;
      border: 4px solid #fff;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.3s ease;
    }

    .guru-img:hover {
      transform: scale(1.05);
    }

    .guru-name {
      font-weight: 600;
      font-size: 1.25rem;
      margin-top: 10px;
      color: #212529;
    }

    .guru-role {
      font-size: 0.95rem;
      color: #6c757d;
    }

    .card-body p {
      font-size: 0.92rem;
      color: #495057;
    }

    footer {
      background-color: #0d6efd;
      color: white;
    }

    .nav-link.active {
      font-weight: bold;
    }

    .social-links a {
      color: white;
      text-decoration: none;
    }

    .social-links a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(to right, #56ab2f, #a8e063);">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="images/logo_diknas.png" alt="Logo Diknas" width="40" height="40" class="me-2">
    </a>
    <a class="navbar-brand fw-semibold" href="index.php">SDN 3 Rejasari</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link text-white" href="index.php">Beranda</a></li>

        <!-- Dropdown About -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            About
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="tentang.php">Visi, Misi & Sejarah Singkat</a></li>
            <li><a class="dropdown-item" href="berita.php">Berita Sekolah</a></li>
          </ul>
        </li>

        <li class="nav-item"><a class="nav-link text-white" href="guru.php">Guru</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="galeri.php">Galeri</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="kontak.php">Kontak</a></li>
        <li class="nav-item"><a class="nav-link text-white" href="maintenance.php">PPDB</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Script Penanda Active Link -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const currentPath = window.location.pathname;
    const links = document.querySelectorAll('.nav-link');

    links.forEach(link => {
      if (currentPath.includes(link.getAttribute('href'))) {
        link.classList.add('active');
      }
    });
  });
</script>

<!-- CSS untuk Hover & Active -->
<style>
  .nav-link {
    position: relative;
    color: white !important;
    transition: color 0.3s ease, background-color 0.3s ease;
    padding: 8px 15px;
    border-radius: 5px;
  }

  .nav-link.active {
    background-color: #56ab2f;
    color: white !important;
    font-weight: bold;
  }

  .nav-link:hover {
    color: #198754;
    background-color: rgba(25, 135, 84, 0.2);
  }
</style>

<!-- Data Guru -->
<main class="flex-grow-1">
  <div class="container py-5">
    <h2 class="text-center section-title mb-5" style="color: #56ab2f;">Daftar Guru SDN 3 Rejasari</h2>
    <div class="row g-4">
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM guru");
      while ($data = mysqli_fetch_assoc($query)) {
      ?>
      <div class="col-md-6 col-lg-4">
        <div class="card card-guru text-center p-4">
          <img src="images/<?= htmlspecialchars($data['foto']) ?>" class="guru-img" alt="Foto <?= htmlspecialchars($data['nama']) ?>">
          <div class="card-body">
            <h5 class="guru-name"><?= htmlspecialchars($data['nama']) ?></h5>
            <p><strong>NIP:</strong> <?= htmlspecialchars($data['nip']) ?></p>
            <?php if (!empty($data['deskripsi'])): ?>
              <p class="mt-2"><?= htmlspecialchars($data['deskripsi']) ?></p>
              <?php endif; ?>
              <?php if (!empty($data['jabatan'])): ?>
                <div class="guru-role"><i class="bi bi-person-fill"></i> <?= htmlspecialchars($data['jabatan']) ?></div>
                <?php endif; ?>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
</main>

<!-- Footer -->
<footer style="background: linear-gradient(to right, #56ab2f, #a8e063);" class="text-white mt-5 py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-3">
        <h5 class="fw-semibold">SD Negeri 3 Rejasari</h5>
        <p class="mb-0">Jl. KH Mashuri No. 38, Rejasari, Purwokerto Barat<br>
        Email: sdn3rejasaripwt_brt@yahoo.com</p>
      </div>
    </div>
    <hr class="bg-light">
    <p class="text-center mb-0">&copy; <?= date("Y") ?> SD Negeri 3 Rejasari. All rights reserved.</p>
  </div>
</footer>

<!-- Bootstrap JS hanya satu kali (pindah ke akhir file untuk performa) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>