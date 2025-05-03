<?php
include 'auth_check.php'; // Cek login
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white p-4">
  <div class="container">
    <h1 class="mb-4">Selamat Datang, Admin</h1>
    <p>Silakan pilih menu untuk mengelola konten website:</p>

    <div class="row">
      <div class="col-md-4">
        <a href="gallery/index.php" class="btn btn-outline-light w-100 mb-3">Manajemen Galeri</a>
      </div>
      <div class="col-md-4">
        <a href="events/index.php" class="btn btn-outline-light w-100 mb-3">Manajemen Event</a>
      </div>
      <div class="col-md-4">
        <a href="logout.php" class="btn btn-danger w-100 mb-3">Logout</a>
      </div>
    </div>
  </div>
</body>
</html>
