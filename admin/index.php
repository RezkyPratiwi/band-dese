<?php
include 'auth_check.php';
include '../config/db.php';

// Ambil data ringkasan
$eventCount = $conn->query("SELECT COUNT(*) AS total FROM events")->fetch_assoc()['total'];
$galleryCount = $conn->query("SELECT COUNT(*) AS total FROM gallery")->fetch_assoc()['total'];
?>

<?php include 'includes/header.php'; ?>

<div class="container py-4 text-white">
  <h2 class="mb-4">Dashboard Admin</h2>

  <div class="row">
    <div class="col-md-6">
      <div class="card bg-dark border-gold mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Event</h5>
          <p class="card-text fs-4"><?= $eventCount ?></p>
          <a href="events/index.php" class="btn btn-outline-light">Kelola Event</a>
        </div>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card bg-dark border-gold mb-3">
        <div class="card-body">
          <h5 class="card-title">Total Galeri</h5>
          <p class="card-text fs-4"><?= $galleryCount ?></p>
          <a href="gallery/index.php" class="btn btn-outline-light">Kelola Galeri</a>
        </div>
      </div>
    </div>
  </div>
</div>


