<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Galeri Sekolah - SDN 3 Rejasari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .carousel-item img {
      object-fit: cover;
      height: 400px;
      width: 100%;
    }
  </style>
</head>
<body>

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
  background-color: #56ab2f;
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

<!-- Galeri -->
<div class="container mt-5">
  <h2 class="text-center" style="color: #56ab2f;">Galeri Sekolah</h2>
  <div class="row g-4">
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM galeri ORDER BY id DESC");
    while ($data = mysqli_fetch_assoc($query)) {
      echo '<div class="col-md-4 col-sm-6">';
      echo '<div class="card shadow-sm h-100">';
      echo '<img src="images/' . htmlspecialchars($data['gambar']) . '" class="card-img-top" alt="' . htmlspecialchars($data['judul']) . '" style="object-fit:cover; height:250px;">';
      echo '</div>';
      echo '</div>';
    }
    ?>
  </div>
</div>


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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
