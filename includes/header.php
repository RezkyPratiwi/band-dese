<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Band D.E.S.E</title>

  <!-- Bootstrap & Google Fonts -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    :root {
      --gold: #FFD700;
      --dark: #000;
    }

    body, html {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: 'Poppins', sans-serif;
        background-color: #121212;
        background-image: linear-gradient(to bottom, rgb(75, 67, 0), #000);
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
}

    .navbar {
      background-color: transparent;
      transition: background-color 0.3s ease;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 1000;
    }

    .navbar.scrolled {
      background-color: rgba(0, 0, 0, 0.85) !important;
    }

    .navbar-brand {
      font-weight: bold;
      color: var(--gold) !important;
    }

    .nav-link {
      color: #fff !important;
      margin-left: 15px;
    }

    .nav-link:hover {
      color: var(--gold) !important;
    }

    .text-gold {
      color: var(--gold);
    }

    .btn-gold {
      color: gray;
      border: none;
    }

    .btn-gold:hover {
      color: white;
    }

    .btn-outline-gold {
      color: var(--gold);
      background-color: transparent;
      border: 1.5px solid var(--gold);
      transition: 0.3s ease;
    }

    .btn-outline-gold:hover {
      background-color: var(--gold);
      color: #000;
    }
    .hero-img {
    height: 100vh;
    object-fit: cover;
    }

    .carousel-caption {
    top: 50%;
    transform: translateY(-50%);
    position: absolute;
    z-index: 10;
    text-shadow: 1px 1px 2px #000;
    }

    .content-section {
      padding-top: 60px;
      padding-bottom: 40px;
    }

    .gallery-img {
      height: 250px;
      object-fit: cover;
    }

    .section-divider {
      border: none;
      border-top: 2px solid var(--gold);
      width: 100%;
      margin: 40px auto 10px;
      opacity: 0.5;
    }

    .card-img-top {
      height: 500px;
      object-fit: cover;
      border-bottom: 2px solid #FFD700;
    }

    .carousel-caption h1, h3, p {
      text-shadow: 1px 1px 2px #000;
    }
  </style>
</head>

<body class="d-flex flex-column min-vh-100">

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand" href="index.php">Band D.E.S.E</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="events.php">Event</a></li>
        <li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Scroll Effect Script -->
<script>
  window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    navbar.classList.toggle('scrolled', window.scrollY > 50);
  });
</script>
