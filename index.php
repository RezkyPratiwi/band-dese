<?php include 'includes/header.php'; ?>
<?php include 'config/db.php'; ?>

<!-- Carousel Slider -->
<div id="bandCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php
    $query = "SELECT * FROM gallery ORDER BY id ASC LIMIT 5";
    $result = $conn->query($query);
    $active = true;

    if ($result && $result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        echo '<div class="carousel-item ' . ($active ? 'active' : '') . '">
                <img src="assets/images/' . htmlspecialchars($row['filename']) . '" class="d-block w-100 hero-img" alt="Slide Image">
                <div class="carousel-caption d-none d-md-block text-center">';
        
        if ($active) {
          echo '<h1 class="fw-bold text-white">Selamat Datang</h1>
                <h3 class="text-white mb-3">di Website Resmi Band D.E.S.E</h3>
                <p class="text-light">Dapatkan informasi event, penampilan, dan dokumentasi seru dari para dosen Telkom University Purwokerto.</p>
                <a href="events.php" class="btn btn-outline-light mt-2">Lihat Agenda</a>';
        }

        echo '  </div>
              </div>';
        $active = false;
      }
    } else {
      echo '<div class="carousel-item active">
              <img src="assets/images/default.jpg" class="d-block w-100 hero-img" alt="Default">
              <div class="carousel-caption d-none d-md-block text-center">
                <h5>Foto belum tersedia</h5>
              </div>
            </div>';
    }
    ?>
  </div>

  <!-- Carousel Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#bandCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#bandCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>



<!-- Highlight Event Section -->
<section class="container content-section">
  <h2 class="text-gold text-start mb-4">Jadwal Terdekat</h2>
  <div class="row justify-content-start">
    <?php
    $eventQuery = "SELECT * FROM events ORDER BY tanggal ASC LIMIT 3";
    $eventResult = $conn->query($eventQuery);

    if ($eventResult && $eventResult->num_rows > 0) {
      while ($event = $eventResult->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">
                <div class="card bg-dark text-white border-gold h-100">
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

  <div class="mt-3">
    <a href="events.php" class="btn btn-outline-gold">Lihat Semua Event</a>
  </div>
</section>

<hr class="section-divider">

<!-- Highlight Gallery Section -->
<section class="container content-section">
  <h2 class="text-gold text-center mb-4">Galeri Terbaru</h2>
  <div class="row justify-content-center">
    <?php
    $galleryQuery = "SELECT * FROM gallery ORDER BY id DESC LIMIT 3";
    $galleryResult = $conn->query($galleryQuery);

    if ($galleryResult && $galleryResult->num_rows > 0) {
      while ($gal = $galleryResult->fetch_assoc()) {
        echo '<div class="col-md-4 mb-4">
                <div class="card bg-dark border-gold">
                  <img src="assets/images/' . htmlspecialchars($gal['filename']) . '" 
                       class="card-img-top gallery-img" 
                       alt="Foto Galeri">
                </div>
              </div>';
      }
    } else {
      echo "<p class='text-center text-white'>Belum ada foto galeri tersedia.</p>";
    }
    ?>
  </div>

  <div class="text-center mt-3">
    <a href="gallery.php" class="btn btn-gold">Lihat Semua Galeri</a>
  </div>
</section>


<!-- Deskripsi Band D.E.S.E -->
<section class="container content-section">
  <hr class="section-divider">
  <h2 class="text-gold text-center mb-4">Tentang Band D.E.S.E</h2>
  <div class="row align-items-center justify-content-center">
    <div class="col-md-3 text-center mb-4 mb-md-0">
      <img src="assets/images/logo.png" alt="Logo Band D.E.S.E" class="img-fluid" style="max-height: 180px;">
    </div>
    <div class="col-md-8">
      <p class="text-white" style="font-size: 0.95rem; line-height: 1.7;">
        <strong>Band D.E.S.E</strong> (Dosen Engineering Software Entertainment) adalah grup musik unik yang digawangi oleh para dosen Program Studi <strong>S1 Software Engineering</strong> di <strong>Telkom University Purwokerto</strong>. Lebih dari sekadar pengajar, para personel band ini membuktikan bahwa kreativitas dan semangat berkarya tidak berhenti di ruang kelas.
      </p>
      <p class="text-white" style="font-size: 0.95rem; line-height: 1.7;">
        Dengan semangat <em>"Coding by Day, Jamming by Night"</em>, Band D.E.S.E tampil membawakan berbagai lagu dalam acara kampus, festival musik, hingga komunitas lokal. Mereka menggabungkan passion di bidang teknologi dan musik, menciptakan harmoni yang inspiratif bagi mahasiswa dan masyarakat.
      </p>
      <p class="text-white" style="font-size: 0.95rem; line-height: 1.7;">
        Setiap penampilan mereka bukan sekadar hiburan, tapi juga bukti nyata bahwa dunia edukasi dan seni dapat berpadu erat untuk menyalakan semangat kolaborasi dan inovasi lintas generasi.
      </p>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
