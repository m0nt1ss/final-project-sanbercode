<?php
include 'koneksi.php';
$pass = password_hash("admin123", PASSWORD_DEFAULT);
mysqli_query($koneksi, "INSERT INTO admin (username, password) VALUES ('admin', '$pass')");
echo "Admin berhasil dibuat.";
?>
