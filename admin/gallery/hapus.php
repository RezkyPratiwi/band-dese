<?php
include '../auth_check.php';
include '../../config/db.php';
include __DIR__ . '/includes/header.php'; 

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);

  // Ambil nama file berdasarkan ID
  $query = "SELECT filename FROM gallery WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $id);
  $stmt->execute();
  $stmt->bind_result($filename);
  $stmt->fetch();
  $stmt->close();

  if ($filename) {
    // Hapus file dari folder
    $filePath = '../../assets/images/' . $filename;
    if (file_exists($filePath)) {
      unlink($filePath);
    }

    // Hapus dari database
    $delete = $conn->prepare("DELETE FROM gallery WHERE id = ?");
    $delete->bind_param("i", $id);
    if ($delete->execute()) {
      header("Location: index.php?msg=deleted");
      exit();
    } else {
      echo "Gagal menghapus data dari database.";
    }
    $delete->close();
  } else {
    echo "Data tidak ditemukan.";
  }
} else {
  echo "ID tidak ditemukan.";
}
?>
