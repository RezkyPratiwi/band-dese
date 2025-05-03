<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<div class="container content-section">
  <h2 class="text-gold text-start mb-4">Jadwal Event</h2> <!-- ubah jadi align kiri -->
  <div class="row justify-content-start"> <!-- ubah jadi justify-content-start -->
    <?php
    $eventQuery = "SELECT * FROM events ORDER BY tanggal ASC";
    $eventResult = $conn->query($eventQuery);

    if ($eventResult && $eventResult->num_rows > 0) {
      while ($event = $eventResult->fetch_assoc()) {
        echo '
        <div class="col-md-4 mb-4">
          <div class="card bg-dark text-white border-gold h-100">
            ' . (!empty($event['poster']) ? '<img src="assets/images/posters/' . htmlspecialchars($event['poster']) . '" class="card-img-top" alt="Poster Event">' : '') . '
            <div class="card-body">
              <h5 class="card-title text-gold">' . htmlspecialchars($event['judul']) . '</h5>
              <p class="card-text mb-1"><strong>Tanggal:</strong> ' . date('d M Y', strtotime($event['tanggal'])) . '</p>
              <p class="card-text"><strong>Lokasi:</strong> ' . htmlspecialchars($event['lokasi']) . '</p>
            </div>
          </div>
        </div>';
      }
    } else {
      echo "<p class='text-white'>Belum ada event yang tersedia.</p>";
    }
    ?>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
