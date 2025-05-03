<?php
include '../includes/header.php'; // pastikan path ini sesuai struktur foldermu
include '../../config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $uploadDir = __DIR__ . '/../../assets/images/';
  $filename = basename($_FILES['image']['name']);
  $targetPath = $uploadDir . $filename;

  if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
    $conn->query("INSERT INTO gallery (filename) VALUES ('$filename')");
    header('Location: index.php');
    exit;
  } else {
    $error = "Gagal mengunggah file.";
  }
}
?>

<div class="container py-4 text-white">
  <h2 class="mb-4">Upload Foto Galeri</h2>

  <?php if (!empty($error)) : ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="image" class="form-label">Pilih Gambar</label>
      <input type="file" name="image" id="image" class="form-control" required>
    </div>
    <div class="d-flex gap-2">
      <button type="submit" class="btn btn-outline-gold">Upload</button>
      <a href="index.php" class="btn btn-outline-light">&larr; Kembali</a>
    </div>
  </form>
</div>



<style>
  .btn-outline-gold {
    color: #FFD700;
    border: 1.5px solid #FFD700;
    transition: 0.3s;
  }

  .btn-outline-gold:hover {
    background-color: #FFD700;
    color: #000;
  }
</style>
