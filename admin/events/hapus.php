<?php
include '../auth_check.php';
include '../../config/db.php';
include __DIR__ . '/includes/header.php'; 
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Cek apakah event ada
  $query = $conn->prepare("SELECT poster FROM events WHERE id = ?");
  $query->bind_param("i", $id);
  $query->execute();
  $result = $query->get_result();
  $event = $result->fetch_assoc();

  if ($event) {
    // Hapus file poster jika ada
    if (!empty($event['poster'])) {
      $posterPath = "../../assets/images/posters/" . $event['poster'];
      if (file_exists($posterPath)) {
        unlink($posterPath);
      }
    }

    // Hapus event dari database
    $delete = $conn->prepare("DELETE FROM events WHERE id = ?");
    $delete->bind_param("i", $id);
    $delete->execute();
  }
}

header("Location: index.php");
exit;
