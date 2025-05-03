<?php
include '../auth_check.php';
include '../../config/db.php';

if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit;
}
include __DIR__ . '/includes/header.php'; 

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM gallery WHERE id = $id");
$row = $result->fetch_assoc();

if (!$row) {
  echo "Foto tidak ditemukan.";
  exit;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $filename = $_FILES['foto']['name'];
  $tmpname = $_FILES['foto']['tmp_name'];

  if ($filename) {
    $target_dir = '../../assets/images/';
    $target_file = $target_dir . basename($filename);

    if (move_uploaded_file($tmpname, $target_file)) {
      // Hapus file lama
      $old_path = $target_dir . $row['filename'];
      if (file_exists($old_path)) {
        unlink($old_path);
      }

      // Update ke database
      $stmt = $conn->prepare("UPDATE gallery SET filename = ? WHERE id = ?");
      $stmt->bind_param("si", $filename, $id);
      $stmt->execute();

      $message = 'Foto berhasil diperbarui.';
      // Refresh data
      $row['filename'] = $filename;
    } else {
      $message = 'Gagal mengunggah file baru.';
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Foto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white p-4">
  <h2 class="text-gold">Edit Foto Galeri</h2>
  <a href="index.php" class="btn btn-outline-light mb-3">← Kembali</a>

  <?php if ($message): ?>
    <div class="alert alert-info"><?= $message ?></div>
  <?php endif; ?>

  <div class="mb-3">
    <label>Foto Saat Ini:</label><br>
    <img src="../../assets/images/<?= $row['filename'] ?>" alt="Preview" style="max-height:200px;" class="mb-3">
  </div>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="foto" class="form-label">Ganti Foto</label>
      <input type="file" name="foto" id="foto" class="form-control">
    </div>
    <button type="submit" class="btn btn-gold">Simpan Perubahan</button>
  </form>
</body>
</html>

<style>
  .text-gold {
    color: #FFD700;
  }
  .btn-gold {
    background-color: #FFD700;
    color: #000;
    border: none;
  }
  .btn-gold:hover {
    background-color: #e5c100;
  }
</style>
