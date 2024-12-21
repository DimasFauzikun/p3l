<?php
// about.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Villavi The Venue</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <!-- Header -->
  <header class="main-header">
    Tailoring extraordinary experiences for you
  </header>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="home.php">
        <img src="VillaVi_Logo.jpg" alt="VillaVi Logo" height=50% width=50%>
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="portofolio.php">Portfolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section
    class="hero-section text-center text-white"
    style="
        background-image: url('Content\ 1\ -\ Opening.jpg');
        height: 70vh;
        background-size: cover;
        background-position: center;
      "></section>

  <!-- about -->

  <div class="container my-5">
    <!-- Intro Section -->
    <div class="row align-items-center mb-5">
      <div class="col-md-6">
        <img
          src="images/Rectangle 87.jpg"
          alt="Introduction"
          class="img-fluid rounded" />
      </div>
      <div class="col-md-6">
        <h3>About Us</h3>
        <h2>VillaVi</h2>
        <h2>TheVenue</h2>
        <p>
          Selamat datang di VillaVi, tempat terbaik untuk menghadirkan momen istimewa Anda. Berdiri sejak Maret 2019, VillaVi hadir sebagai lebih dari sekadar ruang—kami adalah kanvas untuk menciptakan pengalaman yang tak terlupakan. Dengan konsep Garden Minimalis, kami menawarkan suasana yang tenang dan elegan, sempurna untuk berbagai acara privat dengan sentuhan outdoor.
        </p>
        <p>VillaVi melayani beragam kebutuhan acara, mulai dari pernikahan, lamaran, gathering, ulang tahun, anniversary, acara keluarga, seminar, hingga photoshoot katalog, prewedding, dan peluncuran produk. Apa pun jenis acara yang Anda impikan, kami siap membantu mewujudkannya dengan sempurna.</p>
        <p>Misi kami adalah memberikan layanan berkualitas tinggi dengan harga kompetitif, memastikan setiap detail acara Anda berjalan dengan lancar dan meninggalkan kesan mendalam. Dengan visi menjadi pilihan utama dalam lokasi dan perencanaan acara, kami berkomitmen untuk mendampingi Anda dalam setiap langkah, menghadirkan pengalaman terbaik yang melebihi harapan Anda.
          Percayakan momen spesial Anda pada VillaVi, di mana setiap detik berubah menjadi kenangan tak ternilai</p>
      </div>
    </div>

    <!-- Profiles Section -->
    <div class="container text-center mb-5">
      <h2>Our Team</h2>
    </div>

    <!-- Top Section -->
    <div class="container">
      <div class="row g-4 mb-5">
        <!-- Vikan Soraya (Owner) -->
        <div class="col-md-6 d-flex justify-content-center">
          <div class="team-card">
            <img src="images/Rectangle 91.jpg" class="team-img" alt="Vikan Soraya" />
            <h3 class="team-name">Vikan Soraya</h3>
            <p class="team-role">Owner</p>
          </div>
        </div>
        <!-- Tiara Malinda (General Manager) -->
        <div class="col-md-6 d-flex justify-content-center">
          <div class="team-card">
            <img src="images/Rectangle 95.jpg" class="team-img" alt="Tiara Malinda" />
            <h3 class="team-name">Tiara Malinda</h3>
            <p class="team-role">General Manager</p>
          </div>
        </div>
      </div>

      <!-- Bottom Section -->
      <div class="container mt-5">
        <div class="row g-4 justify-content-center">
          <!-- Raja (Operational Manager) -->
          <div class="col-md-4 d-flex justify-content-center">
            <div class="team-card">
              <div class="team-image-wrapper">
                <img src="images/Rectangle 98.jpg" class="team-img" alt="Raja" />
                <div class="team-name-overlay">Raja</div>
              </div>
              <p class="team-role-1">Operational Manager</p>
            </div>
          </div>

          <!-- Adjeng B (Marketing Manager) -->
          <div class="col-md-4 d-flex justify-content-center">
            <div class="team-card">
              <div class="team-image-wrapper">
                <img src="images/Rectangle 99.jpg" class="team-img" alt="Adjeng B" />
                <div class="team-name-overlay">Adjeng B</div>
              </div>
              <p class="team-role-1">Marketing Manager</p>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Footer -->
    <section id="footer" class="footer">
      <nav class="footer-container">
        <ul class="footer-navigation">
          <li><a href="home.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="services.php">SERVICES</a></li>
          <li><a href="portofolio.php">PORTFOLIO</a></li>
          <li><a href="contact.php">CONTACT</a></li>
        </ul>
        <ul class="social-links">
          <li><a href="mailto:villavithevenue@gmail.com">EMAIL</a></li>
          <li><a href="https://www.instagram.com/villavi.the.venue" target="_blank">INSTAGRAM</a></li>
          <li><a href="https://maps.app.goo.gl/N23mAheD9p1kQBAh8" target="_blank">MAPS</a></li>
          <li><a href="https://wa.me/6289696476888" target="_blank">WHATSAPP</a></li>
        </ul>

      </nav>
      <nav class="logo">
        <img src="VillaVi_Logo.png" alt="VillaVi Logo">
      </nav>
    </section>

    <footer class="copyright">
      <div class="copyright-content">
        <p>©2024 VillaVi The Venue | ALL RIGHTS RESERVED<br>
          | DESIGN BY GENERASI TATAP LAYAR</p>
      </div>
    </footer>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js" defer></script>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>