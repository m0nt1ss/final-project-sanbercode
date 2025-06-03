<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Prestasi - SDN 3 Rejasari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    /* Footer styling */
    footer {
      background-color: #343a40;
      color: #fff;
      padding: 40px 0;
    }
    footer a {
      color: #ccc;
    }
    footer .social-icons a {
      font-size: 1.5rem;
      margin-right: 15px;
      color: white;
      transition: color 0.3s ease;
    }
    footer .social-icons a:hover {
      color: #0d6efd;
    }
    
    /* Card Hover Effect */
    .card {
      border-radius: 12px;
      overflow: hidden;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
      transition: transform 0.3s ease;
    }

    .card-img-top:hover {
      transform: scale(1.05);
    }

    .card-body h6 {
      font-size: 1.1rem;
      font-weight: bold;
    }

    /* Navbar styling */
    .navbar {
      padding: 1rem;
      background-color: #0d6efd;
    }
    .navbar-brand {
      color: white;
      font-weight: bold;
    }
    .navbar-nav .nav-link {
      color: white !important;
    }

    .navbar-toggler-icon {
      background-color: white;
    }

    /* Hero Section */
    .hero-section {
      background: linear-gradient(90deg, #0d6efd 0%, #198754 100%);
      color: white;
      padding: 60px 0;
      text-align: center;
    }

    .hero-section h1 {
      font-size: 3rem;
      font-weight: bold;
    }

    .hero-section p {
      font-size: 1.25rem;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="images/logo_diknas.png" alt="Logo Diknas" width="40" height="40" class="me-2">
    </a>
    <a class="navbar-brand" href="index.php">SDN 3 Rejasari</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="index.php" id="home">Beranda</a></li>
        <li class="nav-item"><a class="nav-link" href="tentang.php" id="about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="guru.php" id="guru">Guru</a></li>
        <li class="nav-item"><a class="nav-link" href="galeri.php" id="galeri">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="kontak.php" id="kontak">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="ppdb.php" id="ppdb">PPDB</a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
  const currentPath = window.location.pathname;
  const links = document.querySelectorAll('.nav-link');

  links.forEach(link => {
    if (currentPath.includes(link.getAttribute('href'))) {
      link.classList.add('active');
    }
  });
</script>

<style>
  .nav-link {
    position: relative;
    color: white !important;
    transition: color 0.3s ease, background-color 0.3s ease;
  }

  .nav-link.active {
    background-color: #0069d9;
    color: white !important;
    border-radius: 5px;
    padding: 8px 15px;
    font-weight: bold;
  }

  .nav-link:hover {
    color: #198754;
    background-color: rgba(25, 135, 84, 0.2);
    border-radius: 5px;
  }

  .nav-link {
    padding: 8px 15px; 
    border-radius: 5px;
  }
</style>

<!-- Hero Section -->
<section class="hero-section">
  <div class="container">
    <h1>Prestasi Sekolah</h1>
    <p>Berikut adalah prestasi terbaru yang diraih oleh siswa SDN 3 Rejasari</p>
  </div>
</section>

<!-- Prestasi Section -->
<div class="container my-5">
  <div class="row g-4">
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM prestasi ORDER BY tanggal DESC");
    while ($data = mysqli_fetch_assoc($query)) {
    ?>
    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <img src="<?= htmlspecialchars($data['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($data['judul']) ?>">
        <div class="card-body">
          <h6 class="card-title"><?= htmlspecialchars($data['judul']) ?></h6>
          <p class="card-text"><?= htmlspecialchars($data['deskripsi']) ?></p>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
</div>

<!-- Footer -->
<footer class="bg-primary text-white mt-5 py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-3">
        <h5>SD Negeri 3 Rejasari</h5>
        <p>Jl.KH Mashuri no 38. Rejasari Purwokerto Barat<br>
        Email: sdn3rejasaripwt_brt@yahoo.com<br></p>
      </div>
    </div>
    <hr class="bg-light">
    <p class="text-center mb-0">&copy; <?= date("Y") ?> SD Negeri 3 Rejasari. All rights reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>