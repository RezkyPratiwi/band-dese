<?php
include '../includes/header.php';
include '../../config/db.php';
?>

<div class="container py-4 text-white">
  <h2 class="mb-4 text-gold">Manajemen Galeri</h2>
  <a href="upload.php" class="btn btn-outline-light mb-3">+ Tambah Foto</a>

  <div class="row">
    <?php
    $result = $conn->query("SELECT * FROM gallery ORDER BY id DESC");
    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-md-3 mb-4">
          <div class="card bg-dark border-gold">
            <img src="../../assets/images/' . htmlspecialchars($row['filename']) . '" class="card-img-top gallery-img" alt="Galeri">
            <div class="card-body text-center">
              <a href="hapus.php?id=' . $row['id'] . '" onclick="return confirm(\'Hapus foto ini?\')" class="btn btn-sm btn-danger">Hapus</a>
            </div>
          </div>
        </div>';
      }
    } else {
      echo '<p class="text-white">Belum ada foto galeri tersedia.</p>';
    }
    ?>
  </div>
</div>


<style>
  .gallery-img {
    height: 200px;
    object-fit: cover;
    border-bottom: 2px solid #FFD700;
  }

  .border-gold {
    border: 1.5px solid #FFD700;
  }

  .text-gold {
    color: #FFD700;
  }
</style>

