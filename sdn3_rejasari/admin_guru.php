<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

// Proses hapus
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $q = mysqli_query($koneksi, "SELECT foto FROM guru WHERE id=$id");
    $d = mysqli_fetch_assoc($q);
    if ($d && file_exists("images/" . $d['foto'])) {
        unlink("images/" . $d['foto']);
    }
    mysqli_query($koneksi, "DELETE FROM guru WHERE id=$id");
    header("Location: admin_guru.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Guru - SDN 3 Rejasari</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #e0f7fa, #f1f8e9);
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            background-color: #00C4CC;
        }
        .navbar .navbar-brand, .navbar .btn {
            color: white;
        }
        .card {
            border: none;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            padding: 2rem;
        }
        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }
        h2 {
            font-weight: 600;
            color: #007a7a;
        }
        .btn {
            border-radius: 30px;
            font-weight: 500;
        }
        table img {
            border-radius: 50%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
    <div class="container">
        <span class="navbar-brand fw-semibold">👩‍🏫 Kelola Guru</span>
        <div class="ms-auto">
            <a href="admin_dashboard.php" class="btn btn-outline-light btn-sm">
                <i class="bi bi-house-door-fill me-1"></i>Kembali ke Dashboard
            </a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="card">
        <h2 class="text-center mb-4">Kelola Data Guru</h2>

        <div class="d-flex justify-content-end mb-3">
            <a href="tambah_guru.php" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Tambah Guru
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Jabatan</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM guru");
                    while ($data = mysqli_fetch_assoc($query)) {
                    ?>
                        <tr>
                            <td class="text-center">
                                <img src="images/<?= htmlspecialchars($data['foto']) ?>" width="80" height="80">
                            </td>
                            <td><?= htmlspecialchars($data['nama']) ?></td>
                            <td><?= htmlspecialchars($data['nip']) ?></td>
                            <td><?= htmlspecialchars($data['jabatan']) ?></td>
                            <td><?= htmlspecialchars($data['deskripsi']) ?></td>
                            <td class="text-center">
                                <a href="edit_guru.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="admin_guru.php?hapus=<?= $data['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>