<?php session_start(); ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(to right, #e0f7fa, #f1f8e9);
      font-family: 'Poppins', sans-serif;
      color: #333;
    }
    .card {
      border: none;
      border-radius: 1rem;
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(8px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
    }
    h4 {
      font-weight: 600;
      color: #007a7a;
    }
    .form-label {
      font-weight: 500;
    }
    .btn-primary {
      background-color: #00C4CC;
      border-color: #00C4CC;
      font-weight: 500;
      border-radius: 30px;
      text-transform: uppercase;
    }
    .btn-primary:hover {
      background-color: #00a9b0;
      border-color: #00a9b0;
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

<div class="card p-4" style="width: 100%; max-width: 400px;">
  <h4 class="text-center mb-4">Login Admin</h4>
  <form action="cek_login.php" method="POST">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" name="username" id="username" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" name="password" id="password" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
  </form>
</div>

</body>
</html>