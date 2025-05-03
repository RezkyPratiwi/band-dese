<?php
include '../auth_check.php';
include '../../config/db.php';

 
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = $_POST['judul'];
  $tanggal = $_POST['tanggal'];
  $lokasi = $_POST['lokasi'];
  $poster = '';

  // Upload poster jika ada
  if (!empty($_FILES['poster']['name'])) {
    $targetDir = "../../assets/images/posters/";
    $poster = time() . '_' . basename($_FILES["poster"]["name"]);
    $targetFile = $targetDir . $poster;
    move_uploaded_file($_FILES["poster"]["tmp_name"], $targetFile);
  }

  $stmt = $conn->prepare("INSERT INTO events (judul, tanggal, lokasi, poster) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $judul, $tanggal, $lokasi, $poster);

  if ($stmt->execute()) {
    $message = "Event berhasil ditambahkan.";
  } else {
    $message = "Gagal menambahkan event.";
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white p-4">
  <h2 class="text-gold">Tambah Event Baru</h2>

  <?php if ($message): ?>
    <div class="alert alert-info"><?= $message ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data" class="mb-3">
    <div class="mb-3">
      <label for="judul" class="form-label">Judul Event</label>
      <input type="text" name="judul" id="judul" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" name="tanggal" id="tanggal" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="lokasi" class="form-label">Lokasi</label>
      <input type="text" name="lokasi" id="lokasi" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="poster" class="form-label">Poster (opsional)</label>
      <input type="file" name="poster" id="poster" class="form-control">
    </div>
    <button type="submit" class="btn btn-outline-light">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>

<style>
  .text-gold {
    color: #FFD700;
  }
</style>
