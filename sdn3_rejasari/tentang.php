<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tentang Sekolah - SDN 3 Rejasari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background: linear-gradient(to right, #e0f7fa, #ffffff);
      font-family: 'Segoe UI', sans-serif;
    }
    .section-icon {
      font-size: 2.5rem;
      color: #0d6efd;
    }
    .card-custom {
      background-color: rgba(255, 255, 255, 0.95);
      transition: transform 0.3s, box-shadow 0.3s;
      border-radius: 16px;
    }
    .card-custom:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }
    h2 {
      font-weight: 700;
    }
    footer {
      margin-top: auto;
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

<!-- Konten Tentang -->
<main class="flex-grow-1">
  <div class="container my-5">
    <h2 class="text-center" style="color: #56ab2f;">Tentang SD Negeri 3 Rejasari</h2>

    <div class="row g-4">
      <div class="col-md-4">
        <div class="card card-custom h-100 text-center p-4">
          <div class="card-body">
            <i class="bi bi-flag-fill section-icon mb-3" style="color: #56ab2f;"></i>
            <h5 class="card-title fw-bold">Visi</h5>
            <p class="card-text">Terwujudnya Pendidikan Yang Berakhlak Mulia, Berprestasi dan Berperilaku Hidup Sehat</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-custom h-100 text-center p-4">
          <div class="card-body">
            <i class="bi bi-lightbulb-fill section-icon mb-3" style="color: #56ab2f;"></i>
            <h5 class="card-title fw-bold">Misi</h5>
            <ol class="text-start">
              <li>Meningkatkan Ketaqwaan terhadap Tuhan YME</li>
              <li>Membiasakan Bersikap dan Berperilaku Baik</li>
              <li>Membudayakan sikap saling menghormati</li>
              <li>Meningkatkan Pembelajaran yang berkualitas</li>
              <li>Mewujudkan Siswa Untuk Berprestasi</li>
              <li>Membiasakan Pola Hidup Bersih dan Sehat</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-custom h-100 text-center p-4">
          <div class="card-body">
            <i class="bi bi-calendar-event-fill section-icon mb-3" style="color: #56ab2f;"></i>
            <h5 class="card-title fw-bold">Sejarah Singkat</h5>
            <p class="card-text">Didirikan pada tahun 1997, SD Negeri 3 Rejasari telah menjadi pilar pendidikan dasar di wilayah Rejasari dengan komitmen pada inovasi dan pembelajaran berkualitas.</p>
          </div>
        </div>
      </div>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>