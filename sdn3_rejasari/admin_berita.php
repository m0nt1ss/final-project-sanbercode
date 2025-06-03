<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

// Tambah Berita
if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $gambar_path = "images/" . $gambar;
    move_uploaded_file($gambar_tmp, $gambar_path);

    $query = "INSERT INTO berita (judul, isi, gambar) VALUES ('$judul', '$isi', '$gambar_path')";
    mysqli_query($koneksi, $query);
    header("Location: admin_berita.php");
}

// Hapus Berita
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $query = "DELETE FROM berita WHERE id = $id";
    mysqli_query($koneksi, $query);
    header("Location: admin_berita.php");
}

// Edit Berita
if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];

    if ($gambar) {
        $gambar_path = "images/" . $gambar;
        move_uploaded_file($gambar_tmp, $gambar_path);
        $query = "UPDATE berita SET judul = '$judul', isi = '$isi', gambar = '$gambar_path' WHERE id = $id";
    } else {
        $query = "UPDATE berita SET judul = '$judul', isi = '$isi' WHERE id = $id";
    }
    mysqli_query($koneksi, $query);
    header("Location: admin_berita.php");
}

$query = mysqli_query($koneksi, "SELECT * FROM berita ORDER BY tanggal DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Berita - Admin SDN 3 Rejasari</title>
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
        .card-custom {
            border: none;
            border-radius: 1rem;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
        }
        .card-custom:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        }
        .btn-dashboard {
            border-radius: 30px;
            padding: 6px 18px;
            font-size: 0.85rem;
            font-weight: 500;
            text-transform: uppercase;
        }
        .form-control, .form-label {
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg shadow-sm">
  <div class="container">
    <span class="navbar-brand fw-semibold">📢 Kelola Berita</span>
    <div class="ms-auto">
      <a href="admin_dashboard.php" class="btn btn-outline-light btn-sm"><i class="bi bi-house-door-fill me-1"></i>Kembali ke Dashboard</a>
    </div>
  </div>
</nav>

<div class="container my-5">
    <!-- Form Tambah Berita -->
    <div class="card card-custom p-4 mb-5">
        <h5 class="mb-4 text-primary">➕ Tambah Berita Baru</h5>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi Berita</label>
                <textarea class="form-control" name="isi" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Upload Gambar</label>
                <input type="file" class="form-control" name="gambar" required onchange="previewGambar(event)">
                <img id="preview" class="img-thumbnail mt-3 d-none" style="max-width: 200px;">
            </div>
            <button type="submit" name="tambah" class="btn btn-success btn-dashboard">Simpan Berita</button>
        </form>
    </div>

    <!-- Daftar Berita -->
    <div class="row g-4">
        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
            <div class="col-md-4">
                <div class="card card-custom h-100">
                    <img src="<?= htmlspecialchars($data['gambar']) ?>" class="card-img-top" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= htmlspecialchars($data['judul']) ?></h5>
                        <p class="card-text small"><?= substr(strip_tags($data['isi']), 0, 100) ?>...</p>
                    </div>
                    <div class="card-footer bg-white border-0 d-flex justify-content-between">
                        <small class="text-muted"><?= date("d F Y", strtotime($data['tanggal'])) ?></small>
                        <div class="d-flex gap-2">
                            <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?= $data['id'] ?>">Edit</button>
                            <a href="admin_berita.php?hapus=<?= $data['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit -->
            <div class="modal fade" id="editModal<?= $data['id'] ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content card-custom">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title">Edit Berita</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3">
                                    <label class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul" value="<?= htmlspecialchars($data['judul']) ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Isi</label>
                                    <textarea class="form-control" name="isi" rows="4" required><?= htmlspecialchars($data['isi']) ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar (Opsional)</label>
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" name="edit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<script>
function previewGambar(event) {
    const input = event.target;
    const preview = document.getElementById('preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('d-none');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>