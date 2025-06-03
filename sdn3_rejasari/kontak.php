<?php
include 'koneksi.php';

$success = "";
$error = "";

// Proses simpan form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $pesan = mysqli_real_escape_string($koneksi, $_POST['pesan']);    

    if ($nama && $email && $pesan) {
        $sql = "INSERT INTO kontak (nama, email, pesan) VALUES ('$nama', '$email', '$pesan')";
        if (mysqli_query($koneksi, $sql)) {
            $success = "Pesan berhasil dikirim.";
        } else {
            $error = "Gagal menyimpan pesan.";
        }
    } else {
        $error = "Semua field harus diisi.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kontak - SDN 3 Rejasari</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background: #f4f7fc;
      font-family: 'Segoe UI', sans-serif;
    }
    .form-card {
      background: #fff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.1);
      animation: fadeIn 0.4s ease-in-out;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(20px);}
      to {opacity: 1; transform: translateY(0);}
    }
    label {
      font-weight: 500;
    }
    .text-green {
      color: #56ab2f !important;
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

<!-- Form Kontak -->
<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-lg-6">
      <div class="form-card">
        <h3 class="text-center text-green mb-4"><i class="bi bi-envelope-paper-heart"></i> Hubungi Kami</h3>

        <?php if ($success): ?>
          <div class="alert alert-success"><i class="bi bi-check-circle"></i> <?= $success ?></div>
        <?php elseif ($error): ?>
          <div class="alert alert-danger"><i class="bi bi-exclamation-circle"></i> <?= $error ?></div>
        <?php endif; ?>

        <form method="POST">
          <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email Aktif</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>
          </div>
          <div class="mb-3">
            <label for="pesan" class="form-label">Isi Pesan</label>
            <textarea name="pesan" id="pesan" rows="5" class="form-control" placeholder="Tulis pesan Anda di sini..." required></textarea>
          </div>
          <button type="submit" class="btn w-100" style="background-color: #56ab2f; color: white;">
            <i class="bi bi-send-fill"></i> Kirim Pesan</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Lokasi SDN 3 Rejasari -->
<div class="container mt-5 mb-5" style="max-width: 700px;">
  <h4 class="text-center mb-4 fw-bold text-success">
    <i class="bi bi-geo-alt-fill"></i> Lokasi SDN 3 Rejasari
  </h4>

  <!-- Peta Google Maps -->
  <div class="rounded-4 shadow mb-4 border border-success border-opacity-50" style="height: 400px; overflow: hidden;">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.5551754799383!2d109.215123214778!3d-7.836247294372134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65311f1fb5f6e7%3A0x4a1a594c0ae4c0b6!2sRejasari%2C%20Purwokerto%20Barat%2C%20Kabupaten%20Banyumas%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1714728859935!5m2!1sid!2sid" 
      style="border:0; width:100%; height:100%;" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>

  <!-- Tombol Google Maps -->
  <div class="text-center">
    <a href="https://maps.app.goo.gl/mwAN8BigpEvwcXUx6" target="_blank" 
       class="btn btn-success rounded-pill px-4 py-2 shadow-sm"
       style="background: linear-gradient(to right, #56ab2f, #a8e063); border: none;">
      <i class="bi bi-geo-alt"></i> Buka di Google Maps
    </a>
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