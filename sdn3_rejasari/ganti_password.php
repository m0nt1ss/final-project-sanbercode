<?php
session_start();
require 'koneksi.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}

$pesan = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['admin'];
    $password_lama = $_POST['password_lama'];
    $password_baru = $_POST['password_baru'];
    $konfirmasi = $_POST['konfirmasi_password'];

    $query = mysqli_query($koneksi, "SELECT password FROM admin WHERE username='$username'");
    $data = mysqli_fetch_assoc($query);

    if (password_verify($password_lama, $data['password'])) {
        if ($password_baru === $konfirmasi) {
            $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
            mysqli_query($koneksi, "UPDATE admin SET password='$password_hash' WHERE username='$username'");
            $pesan = "<div class='alert alert-success'>Password berhasil diganti.</div>";
        } else {
            $pesan = "<div class='alert alert-warning'>Konfirmasi password tidak cocok.</div>";
        }
    } else {
        $pesan = "<div class='alert alert-danger'>Password lama salah.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ganti Password</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
  <h2 class="mb-4">Ganti Password Admin</h2>
  <?= $pesan ?>
  <form method="post">
    <div class="mb-3">
      <label>Password Lama</label>
      <input type="password" name="password_lama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Password Baru</label>
      <input type="password" name="password_baru" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Konfirmasi Password Baru</label>
      <input type="password" name="konfirmasi_password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Ganti Password</button>
    <a href="admin_dashboard.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>