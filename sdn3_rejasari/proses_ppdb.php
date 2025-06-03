<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Menangani data form
    $nama_lengkap = mysqli_real_escape_string($koneksi, $_POST['nama_lengkap']);
    $nisn = mysqli_real_escape_string($koneksi, $_POST['nisn']);
    $tempat_lahir = mysqli_real_escape_string($koneksi, $_POST['tempat_lahir']);
    $tanggal_lahir = mysqli_real_escape_string($koneksi, $_POST['tanggal_lahir']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $asal_tk = mysqli_real_escape_string($koneksi, $_POST['asal_tk']);
    $nama_ortu = mysqli_real_escape_string($koneksi, $_POST['nama_ortu']);
    $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);

    // Menangani upload file
    $akta = $_FILES['akta'];
    $kk = $_FILES['kk'];
    $ijazah = $_FILES['ijazah'];

    // Cek dan proses file upload
    $allowed_types = ['pdf', 'jpg', 'jpeg', 'png'];
    $akta_ext = pathinfo($akta['name'], PATHINFO_EXTENSION);
    $kk_ext = pathinfo($kk['name'], PATHINFO_EXTENSION);
    $ijazah_ext = pathinfo($ijazah['name'], PATHINFO_EXTENSION);

    // Validasi ekstensi file
    if (!in_array($akta_ext, $allowed_types) || !in_array($kk_ext, $allowed_types) || !in_array($ijazah_ext, $allowed_types)) {
        die("Ekstensi file tidak diizinkan. Pastikan file yang diupload berformat PDF, JPG, JPEG, atau PNG.");
    }

    // Tentukan direktori untuk menyimpan file upload
    $upload_dir = 'uploads/';
    $akta_path = $upload_dir . basename($akta['name']);
    $kk_path = $upload_dir . basename($kk['name']);
    $ijazah_path = $upload_dir . basename($ijazah['name']);

    // Pindahkan file ke direktori
    if (!move_uploaded_file($akta['tmp_name'], $akta_path) || !move_uploaded_file($kk['tmp_name'], $kk_path) || !move_uploaded_file($ijazah['tmp_name'], $ijazah_path)) {
        die("Gagal mengupload file. Pastikan file yang diupload tidak terlalu besar.");
    }

    // Simpan data ke database
    $query = "INSERT INTO ppdb (nama_lengkap, nisn, tempat_lahir, tanggal_lahir, alamat, asal_tk, nama_ortu, no_hp, akta_file, kk_file, ijazah_file, tanggal_daftar)
              VALUES ('$nama_lengkap', '$nisn', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$asal_tk', '$nama_ortu', '$no_hp', '$akta_path', '$kk_path', '$ijazah_path', NOW())";

    if (mysqli_query($koneksi, $query)) {
        echo "Pendaftaran berhasil!";
    } else {
        echo "Gagal mendaftar: " . mysqli_error($koneksi);
    }
}
?>