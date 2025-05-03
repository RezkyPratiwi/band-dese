<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<div class="container content-section">
  <h1 class="text-center mb-4 text-gold">Galeri Penampilan</h1>
  <div class="row">
    <?php
    $query = "SELECT * FROM gallery ORDER BY id DESC";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '
        <div class="col-md-4 mb-4">
          <div class="card bg-dark border-gold">
            <img src="assets/images/' . htmlspecialchars($row['filename']) . '" 
                 class="card-img-top gallery-img" 
                 alt="Foto Galeri">
          </div>
        </div>';
      }
    } else {
      echo "<p class='text-center text-white'>Galeri belum tersedia.</p>";
    }
    ?>
  </div>
</div>

<?php include 'includes/footer.php'; ?>

<style>
  .gallery-img {
    height: 250px;
    object-fit: cover;
    border: 2px solid #FFD700;
  }
</style>
