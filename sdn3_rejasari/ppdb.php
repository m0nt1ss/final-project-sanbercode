<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>PPDB - SDN 3 Rejasari</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    body {
      background-color: #f5f9ff;
      font-family: 'Segoe UI', sans-serif;
    }
    .card {
      border-radius: 16px;
    }
    label {
      font-weight: 500;
    }
    .btn-success:hover {
      background-color: #157347;
    }
  </style>
</head>
<body>

<div class="container my-5">
  <h2 class="text-center text-primary mb-5"><i class="bi bi-person-plus-fill"></i> Penerimaan Peserta Didik Baru (PPDB)</h2>

  <div class="card p-4 mb-4 shadow-sm border-0 bg-white">
    <h5 class="mb-3 text-success"><i class="bi bi-info-circle-fill"></i> Informasi Pendaftaran</h5>
    <ul class="mb-0">
      <li><strong>Periode:</strong> 1 Juni – 30 Juni 2025</li>
      <li><strong>Usia:</strong> Minimal 6 tahun per 1 Juli 2025</li>
      <li><strong>Berkas:</strong> Fotokopi Akta, Kartu Keluarga, dan Ijazah TK</li>
    </ul>
  </div>

  <div class="card p-4 shadow-sm border-0 bg-white">
    <h5 class="mb-3 text-success"><i class="bi bi-pencil-square"></i> Formulir Pendaftaran</h5>
    <form action="proses_ppdb.php" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="nisn">NISN</label>
        <input type="text" name="nisn" id="nisn" class="form-control" required>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="tempat_lahir">Tempat Lahir</label>
          <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
        </div>
        <div class="col-md-6">
          <label for="tanggal_lahir">Tanggal Lahir</label>
          <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
        </div>
      </div>
      <div class="mb-3">
        <label for="alamat">Alamat Lengkap</label>
        <textarea name="alamat" id="alamat" class="form-control" rows="2" required></textarea>
      </div>
      <div class="mb-3">
        <label for="asal_tk">Asal TK</label>
        <input type="text" name="asal_tk" id="asal_tk" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="nama_ortu">Nama Orang Tua / Wali</label>
        <input type="text" name="nama_ortu" id="nama_ortu" class="form-control" required>
      </div>
      <div class="mb-4">
        <label for="no_hp">No. HP Orang Tua / Wali</label>
        <input type="text" name="no_hp" id="no_hp" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="akta">Upload Akta Kelahiran (PDF/JPG/PNG)</label>
        <input type="file" name="akta" id="akta" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
      </div>
      <div class="mb-3">
        <label for="kk">Upload Kartu Keluarga (PDF/JPG/PNG)</label>
        <input type="file" name="kk" id="kk" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
      </div>
      <div class="mb-4">
        <label for="ijazah">Upload Ijazah TK (PDF/JPG/PNG)</label>
        <input type="file" name="ijazah" id="ijazah" class="form-control" accept=".pdf,.jpg,.jpeg,.png" required>
      </div>

      <button type="submit" class="btn btn-success w-100 py-2"><i class="bi bi-send-fill"></i> Kirim Pendaftaran</button>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>