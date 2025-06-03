<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data dari database
    $query = "DELETE FROM ppdb WHERE id = '$id'";
    if (mysqli_query($koneksi, $query)) {
        echo "<script>alert('Data berhasil dihapus'); window.location='admin_ppdb.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data'); window.location='admin_ppdb.php';</script>";
    }
}
?>