<?php
include '../auth_check.php';
include '../../config/db.php';
include __DIR__ . '/includes/header.php'; ?>
$id = $_GET['id'];
$message = '';

<?php
$query = "SELECT * FROM events WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$event = $result->fetch_assoc();

if (!$event) {
  die("Event tidak ditemukan.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = $_POST['judul'];
  $tanggal = $_POST['tanggal'];
  $lokasi = $_POST['lokasi'];
  $poster = $event['poster'];

  // Upload poster baru jika ada
  if (!empty($_FILES['poster']['name'])) {
    $targetDir = "../../assets/images/posters/";
    $poster = time() . '_' . basename($_FILES["poster"]["name"]);
    $targetFile = $targetDir . $poster;
    move_uploaded_file($_FILES["poster"]["tmp_name"], $targetFile);
  }

  $update = $conn->prepare("UPDATE events SET judul=?, tanggal=?, lokasi=?, poster=? WHERE id=?");
  $update->bind_param("ssssi", $judul, $tanggal, $lokasi, $poster, $id);

  if ($update->execute()) {
    $message = "Event berhasil diperbarui.";
    // Refresh data
    $event['judul'] = $judul;
    $event['tanggal'] = $tanggal;
    $event['lokasi'] = $lokasi;
    $event['poster'] = $poster;
  } else {
    $message = "Gagal memperbarui event.";
  }

  $update->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Event</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white p-4">
  <h2 class="text-gold">Edit Event</h2>

  <?php if ($message): ?>
    <div class="alert alert-info"><?= $message ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="judul" class="form-label">Judul Event</label>
      <input type="text" name="judul" id="judul" value="<?= htmlspecialchars($event['judul']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="tanggal" class="form-label">Tanggal</label>
      <input type="date" name="tanggal" id="tanggal" value="<?= $event['tanggal'] ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="lokasi" class="form-label">Lokasi</label>
      <input type="text" name="lokasi" id="lokasi" value="<?= htmlspecialchars($event['lokasi']) ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label for="poster" class="form-label">Poster (opsional)</label>
      <?php if ($event['poster']): ?>
        <img src="../../assets/images/posters/<?= htmlspecialchars($event['poster']) ?>" class="img-fluid mb-2" style="max-height:200px;"><br>
      <?php endif; ?>
      <input type="file" name="poster" id="poster" class="form-control">
    </div>
    <button type="submit" class="btn btn-outline-light">Update</button>
    <a href="index.php" class="btn btn-secondary">Kembali</a>
  </form>
</body>
</html>

<style>
  .text-gold {
    color: #FFD700;
  }
</style>
