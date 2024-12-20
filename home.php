<?php
// home.php
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
  <header class="text-center py-3 bg-light">
    <p class="text-uppercase small">
      Tailoring extraordinary experiences for you
    </p>
  </header>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">VILLAVI THE VENUE</a>
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
        background-image: url('Rectangle\ 1.png');
        height: 70vh;
        background-size: cover;
        background-position: center;
      ">
    <div
      class="container h-100 d-flex align-items-center justify-content-center">
      <div>
        <h1 class="text-white custom-heading">VILLAVI THE VENUE</h1>
        <p class="text-white custom-text">Weddings and Events</p>
        <p class="text-white custom-text2">
          CREAFTING UNFORGETTABLE MOMENTS WITH PURPOSE
        </p>
        <a href="#contact" class="btn btn-secondary">Start Planning</a>
      </div>
    </div>

    <!-- Add these styles -->
    <style>
      .text-white {
        color: white;
      }

      .custom-heading {
        font-size: 3rem;
        /* Adjust this value to change the size of the heading */
      }

      .custom-text {
        font-size: 1.5rem;
        /* Adjust this value to change the size of the text */
      }
    </style>
  </section>

  <!-- About Section -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="text-center mb-4">
        <p class="lead">YOUR EVENT OUR EXPERTISE</p>
        <h2 class="text-secondary">Creating Moments</h2>
        <h2 class="text-secondary">That Last</h2>
        <p class="lead text-center text-wrap">
          so you can focus on enjoying the precious moments in your life.
        </p>
        <div class="custom-line-vertical my-3"></div>
        <!-- <p class="lead">Lorem Ipsum</p> -->
      </div>
      <p class="lead text-center text-wrap">
        Selama 5 tahun berpengalaman, tim kami telah membantu mewujudkan
        berbagai acara, mulai dari wedding organizer, event lamaran,
        gathering, anniversary, hingga foto catalog dan prewedding. Visi kami
        adalah menyediakan layanan yang dapat mengelola setiap kebutuhan acara
        pelanggan dengan harga yang kompetitif dan kualitas terbaik.
      </p>
      <p class="lead text-center text-wrap">
        Misi kami adalah menjadi penyedia acara pilihan utama, yang siap
        mewujudkan impian Anda pada hari yang istimewa!
      </p>
      <div class="d-flex justify-content-center">
        <a href="#contact" class="btn btn-secondary">
          MEET VILLAVI THE VENUE TEAM
        </a>
      </div>
    </div>
  </section>

  <!-- bootstrap version -->
  <section id="portfolio" class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img
            src="images/Rectangle 11.jpg"
            class="img-fluid rounded"
            alt="Image" />
        </div>
        <div class="col-md-6">
          <h3>SERVICE</h3>
          <h6>Our Event Vision</h6>
          <p>
            Kami menciptakan pengalaman yang menghasilkan kenangan unik dan
            luar biasa di setiap kesempatan. Setiap detail acara kami
            persiapkan dengan cermat untuk menciptakan pengalaman yang tak
            terlupakan. Setiap pernikahan dirancang sesuai dengan keinginan
            pelanggan, menjadikannya perayaan yang istimewa dan penuh makna
            pada momen-momen sentimental Anda.
          </p>
          <h6>Our Approach</h6>
          <p>
            Untuk menciptakan pengalaman yang lebih baik, kami percaya bahwa
            mendengarkan adalah langkah pertama yang penting. Kami bangga
            menawarkan pengalaman perencanaan yang mulus, memastikan setiap
            acara terlaksana dengan lancar, sempurna, dan elegan. Kelancaran
            acara dan kepuasan pelanggan adalah prioritas utama kami. Kami
            akan menjaga kesempurnaan acara, sehingga Anda dapat sepenuhnya
            menikmati perayaan bersama orang-orang tercinta
          </p>
          <button class="btn btn-secondary mt-3">Read More</button>
        </div>
      </div>
    </div>
  </section>

  <section id="portfolio2" class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <h3>PORTFOLIO</h3>
          <p>
            Bersama VillaVi, kami tidak hanya merencanakan pernikahan, tetapi
            juga menciptakan pengalaman yang tak terlupakan. Kami berkomitmen
            untuk memberikan yang terbaik, melampaui ekspektasi Anda, dan
            menjadikan hari istimewa Anda sebagai refleksi sejati dari cinta
            dan gaya Anda. Janji kami adalah mewujudkan visi Anda menjadi
            kenyataan yang spektakuler, memastikan setiap momen perayaan Anda
            penuh keajaiban dan kenangan yang abadi.
          </p>
          <button class="btn btn-secondary mt-3">Read More</button>
        </div>
        <div class="col-md-6">
          <img
            src="images/Rectangle 12.jpg"
            class="img-fluid rounded"
            alt="Image" />
        </div>
      </div>
    </div>
  </section>

  <!-- camera 360 -->

  <!-- lokasi -->
  <div>
    <iframe
      style="border: 0; width: 100%; height: 350px"
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5876.085189989196!2d106.89287967645825!3d-6.31838019367101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed0991611a33%3A0xac0920869524750f!2sVillaVi!5e1!3m2!1sen!2sid!4v1734323499670!5m2!1sen!2sid"
      width="600"
      height="450"
      style="border: 0"
      allowfullscreen=""
      loading="lazy"
      referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>

  <!-- Footer -->
  <footer>
    <nav>
      <ul class="navigation">
        <li><a href="home.html">HOME</a></li>
        <li><a href="about.html">ABOUT</a></li>
        <li><a href="services.html">SERVICES</a></li>
        <li><a href="portofolio.html">PORTFOLIO</a></li>
        <li><a href="contact.html">CONTACT</a></li>
      </ul>
      <ul class="social-links">
        <li><a href="#">EMAIL</a></li>
        <li><a href="#">INSTAGRAM</a></li>
        <li><a href="#">MAPS</a></li>
        <li><a href="#">WHATSAPP</a></li>
      </ul>
    </nav>
    <div class="title">
      <h1>VILLAVI THE VENUE</h1>
      <p>Weddings and Events</p>
    </div>
  </footer>

  <!-- Footer -->
  <footer class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="long-hr-container">
            <hr class="long-hr" />
          </div>
          <p>&copy;2024 Villavi The Venue | ALL RIGHTS RESERVED</p>
          <p>DESIGN BY GENERASI TATAP LAYAR</p>
        </div>
      </div>
    </div>
  </footer>

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