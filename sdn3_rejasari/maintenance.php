<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Maintenance Mode</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #56ab2f, #a8e063);
      color: white;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
    }

    .card {
      background: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.2);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      padding: 3rem;
      max-width: 500px;
      text-align: center;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }

    .logo {
      width: 80px;
      height: 80px;
      margin: 0 auto 1rem auto;
      display: block;
    }

    .spinner-border {
      width: 3rem;
      height: 3rem;
      margin: 0 auto 1.5rem auto;
      display: block;
    }

    h1 {
      font-size: 2.5rem;
      font-weight: 600;
    }

    p {
      font-size: 1.1rem;
      margin-top: 1rem;
    }

    .btn-home {
      margin-top: 2rem;
      background-color: #ffffff;
      color: #56ab2f;
      border: none;
      font-weight: 600;
      padding: 10px 25px;
      border-radius: 30px;
      transition: 0.3s ease;
    }

    .btn-home:hover {
      background-color: #f0f0f0;
      color: #4a9628;
    }

    .footer {
      position: absolute;
      bottom: 15px;
      text-align: center;
      width: 100%;
      font-size: 0.9rem;
      opacity: 0.8;
    }
  </style>
</head>
<body>

  <div class="card">
    <img src="https://img.icons8.com/ios-filled/100/ffffff/maintenance.png" class="logo" alt="Maintenance Icon">
    <div class="spinner-border text-light" role="status"></div>
    <h1>Kami Akan Segera Kembali!</h1>
    <p>Laman PPDB kami saat ini sedang menjalani pemeliharaan terjadwal.<br>Silakan periksa kembali nanti. Terima kasih atas kesabaran Anda!</p>
    
    <a href="index.php" class="btn btn-home mt-3">Kembali ke Beranda</a>
  </div>

  <div class="footer">
    &copy; <?php echo date("Y"); ?> SD Negeri 3 Rejasari.
  </div>

</body>
</html>