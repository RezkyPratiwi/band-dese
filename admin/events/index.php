<?php
include '../includes/header.php';
include '../../config/db.php';

// Ambil data dari database
$result = $conn->query("SELECT * FROM events ORDER BY tanggal ASC");
?>

<div class="container py-4 text-white">
  <h2 class="text-gold mb-4">Manajemen Event</h2>
  <a href="tambah.php" class="btn btn-outline-light mb-3">+ Tambah Event</a>

  <table class="table table-dark table-bordered">
    <thead>
      <tr>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Lokasi</th>
        <th>Poster</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
          <td><?= htmlspecialchars($row['judul']) ?></td>
          <td><?= date('d M Y', strtotime($row['tanggal'])) ?></td>
          <td><?= htmlspecialchars($row['lokasi']) ?></td>
          <td>
            <?php if (!empty($row['poster'])) : ?>
              <img src="../../assets/images/posters/<?= htmlspecialchars($row['poster']) ?>" alt="Poster" style="height: 60px;">
            <?php else : ?>
              <em>Tidak ada</em>
            <?php endif; ?>
          </td>
          <td>
            <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-info">Edit</a>
            <a href="hapus.php?id=<?= $row['id'] ?>" onclick="return confirm('Yakin ingin menghapus event ini?')" class="btn btn-sm btn-danger">Hapus</a>
          </td>
        </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
</div>


