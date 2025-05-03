<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Panel - Band D.E.S.E</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --gold: #FFD700;
    }
    body {
      background-color: #121212;
      color: #f8f9fa;
      font-family: 'Segoe UI', sans-serif;
    }
    .navbar {
      background-color: #000;
    }
    .navbar-brand {
      color: var(--gold) !important;
      font-weight: bold;
    }
    .nav-link {
      color: #fff !important;
    }
    .nav-link:hover {
      color: var(--gold) !important;
    }
    .border-gold {
      border: 1px solid var(--gold);
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="/band-dese/admin/index.php">Band D.E.S.E Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav" aria-controls="adminNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="adminNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="/band-dese/admin/index.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="/band-dese/admin/events/index.php">Event</a></li>
        <li class="nav-item"><a class="nav-link" href="/band-dese/admin/gallery/index.php">Galeri</a></li>
        <li class="nav-item"><a class="nav-link" href="/band-dese/admin/logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
