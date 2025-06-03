<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Berita - SDN 3 Rejasari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --gradient-start: #56ab2f;
      --gradient-end: #a8e063;
      --bg-light: #f9fdf9;
      --text-dark: #212529;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: var(--bg-light);
    }

    .navbar {
      background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
    }

    .navbar-brand, .nav-link {
      color: white !important;
      font-weight: 500;
    }

    .nav-link.active {
      background-color: rgba(255, 255, 255, 0.2);
      border-radius: 5px;
      font-weight: bold;
    }

    .nav-link:hover {
      color: #2e7d32 !important;
      background-color: rgba(255, 255, 255, 0.15);
    }

    .card {
      border: none;
      border-radius: 16px;
      overflow: hidden;
      box-shadow: 0 8px 20px rgba(0,0,0,0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: scale(1.03);
      box-shadow: 0 12px 25px rgba(0,0,0,0.1);
    }

    .card-title {
      font-size: 1.2rem;
      font-weight: 600;
    }

    .card-text {
      color: #555;
    }

    .card-footer {
      background-color: #f0f0f0;
      font-size: 0.9rem;
    }

    footer {
      background: linear-gradient(to right, var(--gradient-start), var(--gradient-end));
      color: white;
      padding: 40px 0;
    }

    footer a {
      color: #f0f0f0;
      text-decoration: none;
    }

    footer a:hover {
      color: #ffffff;
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
        <li class="nav-item"><a class="nav-link text-white" href="ppdb.php">PPDB</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Konten Berita -->
<div class="container my-5">
  <h2 class="mb-4 text-center fw-semibold text-success">Berita Sekolah</h2>
  <div class="row g-4">
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
    while ($data = mysqli_fetch_assoc($query)) {
    ?>
      <div class="col-md-4">
        <div class="card h-100">
          <img src="<?= htmlspecialchars($data['gambar']) ?>" class="card-img-top" alt="Gambar Berita">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($data['judul']) ?></h5>
            <p class="card-text"><?= substr(strip_tags($data['isi']), 0, 100) ?>...</p>
            <a href="berita_detail.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-success mt-2">Selengkapnya <i class="bi bi-chevron-right"></i></a>
          </div>
          <div class="card-footer text-muted">
            <?= date("d F Y", strtotime($data['tanggal'])) ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-6 mb-3">
        <h5>SD Negeri 3 Rejasari</h5>
        <p>Jl. KH Mashuri no. 38, Rejasari, Purwokerto Barat<br>
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