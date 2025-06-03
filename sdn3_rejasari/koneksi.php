<?php
$servername = "localhost";
$username = "root"; // default username di XAMPP
$password = ""; // default password di XAMPP (kosong)
$dbname = "sdn3_rejasari"; // sesuaikan dengan nama database Anda

// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}
?>