<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SDN 3 Rejasari - Beranda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    :root {
      --primary: #0d6efd;
      --accent: #198754;
      --bg-light: #f8f9fa;
      --text-dark: #212529;
    }

    body {
      background-color: var(--bg-light);
      font-family: 'Segoe UI', sans-serif;
    }

    .navbar {
      background-color: var(--primary);
    }

    .navbar-brand, .navbar-nav .nav-link {
      color: white !important;
      font-weight: 500;
    }

    .hero-section {
      background: linear-gradient(90deg, #0d6efd 0%, #198754 100%);
      color: white;
      padding: 80px 0;
      text-align: center;
      border-radius: 0 0 30px 30px;
    }

    .hero-section h1 {
      font-size: 2.5rem;
      font-weight: 700;
    }

    .hero-section p {
      font-size: 1.1rem;
      margin-top: 10px;
    }

    .feature-card {
      background-color: white;
      border: none;
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 6px 20px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
    }

    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    footer {
      background-color: #343a40;
      color: #fff;
      padding: 20px 0;
    }

    footer a {
      color: #ccc;
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

<!-- Hero -->
<section class="hero-section">
  <div class="container">
    <h1>Selamat Datang di SD Negeri 3 Rejasari</h1>
    <p>Menciptakan generasi cerdas, berakhlak, dan berdaya saing tinggi.</p>
  </div>
</section>

<style>
.hero-section {
  background-image: url('images/guru.jpg'); /* Ganti dengan path gambar kamu */
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  padding: 150px 0; /* Sesuaikan tinggi area hero */
  color: white; /* Biar teks terlihat di atas gambar */
  text-align: center;
}

.hero-section::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(0, 0, 0, 0.5); /* Overlay gelap */
  z-index: 1;
}

.hero-section .container {
  position: relative;
  z-index: 2;
}

.hero-section {
  position: relative;
}

</style>

<!-- Sambutan Kepala Sekolah -->
<div class="container my-5">
  <div class="card shadow-sm border-0 rounded-4 p-4 bg-white">
    <div class="row align-items-center">
      <div class="col-md-3 text-center mb-3 mb-md-0">
        <div style="width: 225px; height: 225px; overflow: hidden; margin: 0 auto;">
          <img src="images/kepala.jpg" alt="Kepala Sekolah" 
               class="img-fluid shadow" 
               style="width: 100%; height: 100%; object-fit: cover;">
        </div>
      </div>
      <div class="col-md-9">
        <h5 class="fw-bold" style="color: #56ab2f;">Sambutan Kepala Sekolah</h5>
        <p class="mb-1"><em>Assalamu’alaikum Warahmatullahi Wabarakatuh,</em></p>
        <p>
          Selamat datang di website resmi SD Negeri 3 Rejasari. Kami berkomitmen untuk memberikan pendidikan yang unggul,
          berbasis karakter, dan teknologi. Melalui platform ini, kami berharap dapat menjalin komunikasi yang lebih baik
          antara sekolah, orang tua, dan masyarakat.
        </p>
        <p>Semoga informasi yang tersedia dapat memberikan manfaat dan kemudahan bagi seluruh pengunjung.</p>
        <p class="fw-bold mb-0">Akhmad Safrudin S.Pd<br><span class="text-muted">Kepala Sekolah</span></p>
      </div>
    </div>
  </div>
</div>

<!-- Fitur Utama -->
<div class="container my-5">
  <div class="row text-center g-4">
    <div class="col-md-4">
      <div class="feature-card">
        <i class="bi bi-people-fill display-4" style="color: #56ab2f;"></i>
        <h5 class="mt-3">Guru Berpengalaman</h5>
        <p>Pengajar kami profesional, berdedikasi, dan penuh semangat.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="feature-card">
        <i class="bi bi-book-fill display-4" style="color: #56ab2f;"></i>
        <h5 class="mt-3">Kurikulum Modern</h5>
        <p>Berbasis merdeka belajar yang mendorong kreativitas siswa.</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="feature-card">
        <i class="bi bi-building display-4" style="color: #56ab2f;"></i>
        <h5 class="mt-3">Fasilitas Lengkap</h5>
        <p>Lingkungan belajar yang aman, nyaman, dan inspiratif.</p>
      </div>
    </div>
  </div>
</div>

<!-- Berita Terbaru - Carousel -->
<div class="container my-5">
  <h4 class="text-center mb-4 fw-bold" style="color: #56ab2f;">Berita Terbaru</h4>

  <div id="beritaCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

    <!-- Indikator -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#beritaCarousel" data-bs-slide-to="0" class="active bg-success" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#beritaCarousel" data-bs-slide-to="1" class="bg-success" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#beritaCarousel" data-bs-slide-to="2" class="bg-success" aria-label="Slide 3"></button>
    </div>

    <!-- Slide -->
    <div class="carousel-inner rounded shadow-lg">

      <div class="carousel-item active">
        <img src="images/berita1.jpg" class="d-block w-100" alt="Berita 1" style="object-fit: cover; height: 420px;">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3 shadow">
          <h5 class="text-white fw-bold">Kegiatan Peringatan Hari Kartini</h5>
          <p>Siswa-siswi mengenakan pakaian adat dalam memperingati Hari Kartini 2025.</p>
          <small>Diposting: 21 April 2025</small><br>
          <a href="berita_detail.php?id=1" class="btn btn-success btn-sm mt-2 px-3" style="border-radius: 20px;">Baca Selengkapnya</a>
        </div>
      </div>

      <div class="carousel-item">
        <img src="images/berita2.jpg" class="d-block w-100" alt="Berita 2" style="object-fit: cover; height: 420px;">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3 shadow">
          <h5 class="text-white fw-bold">Kunjungan Dinas Pendidikan</h5>
          <p>Kunjungan dalam rangka akreditasi dari Dinas Pendidikan Banyumas.</p>
          <small>Diposting: 12 April 2025</small><br>
          <a href="berita_detail.php?id=2" class="btn btn-success btn-sm mt-2 px-3" style="border-radius: 20px;">Baca Selengkapnya</a>
        </div>
      </div>

      <div class="carousel-item">
        <img src="images/berita3.jpg" class="d-block w-100" alt="Berita 3" style="object-fit: cover; height: 420px;">
        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded-3 p-3 shadow">
          <h5 class="text-white fw-bold">Lomba Kebersihan Kelas</h5>
          <p>Lomba kebersihan dan penghijauan dalam rangka Hari Bumi.</p>
          <small>Diposting: 5 April 2025</small><br>
          <a href="berita_detail.php?id=3" class="btn btn-success btn-sm mt-2 px-3" style="border-radius: 20px;">Baca Selengkapnya</a>
        </div>
      </div>

    </div>

    <!-- Kontrol Navigasi -->
    <button class="carousel-control-prev" type="button" data-bs-target="#beritaCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: #56ab2f; border-radius: 50%; box-shadow: 0 0 10px rgba(0,0,0,0.5);"></span>
      <span class="visually-hidden">Sebelumnya</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#beritaCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: #56ab2f; border-radius: 50%; box-shadow: 0 0 10px rgba(0,0,0,0.5);"></span>
      <span class="visually-hidden">Selanjutnya</span>
    </button>
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