<?php
?>

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
  <section class="hero">
    <div class="hero-content">
      <h1 class="main-text">
        <span class="title">VILLAVI THE VENUE</span>
        <br>
        <span class="subtitle">Weddings and Events</span>
      </h1>
      <br><br>
      <p class="description">CREATING UNFORGETTABLE MOMENTS WITH PURPOSE</p>
      <a href="#about" class="hero-btn">START EXPLORE</a>
    </div>
  </section>

  <!-- About Section -->
  <section id="about" class="about">
    <div class="container-about">
      <div class="text-center">
        <p class="head-text">YOUR EVENT OUR EXPERTISE</p>
        <h1 class="head-text2">Creating Moments<br>That Last</h1>
        <p class="head-text3">so you can focus on enjoying the precious moments in your life.</p>
      </div>
      <div class="d-flex justify-content-center" style="height: 150px; margin-top: 29px; margin-bottom: 29px;">
        <div class="vr"></div>
      </div>
      <div class="text-center wrap-text">
        <p>Selama 5 tahun berpengalaman,
          tim kami telah membantu mewujudkan berbagai acara, mulai dari wedding organizer,
          event lamaran, gathering, anniversary, hingga foto catalog dan prewedding.
          Visi kami adalah menyediakan layanan yang dapat mengelola setiap kebutuhan
          acara pelanggan dengan harga yang kompetitif dan kualitas terbaik.
          <br><br>
          Misi kami adalah menjadi penyedia acara pilihan utama,
          yang siap mewujudkan impian Anda pada hari yang istimewa!
        </p>
      </div>
      <br>
      <a href="about.php" class="about-btn">MEET VILLAVI THE VENUE TEAM</a>
    </div>
  </section>

  <!-- Service Section-->
  <section id="services" class="services">
    <div class="container-service">
      <div class="items-primary"> <!-- Buat gambar-->
        <img src="assets/images/Mainservice_Banner.jpg">
      </div>
      <div class="items-secondary"> <!-- Buat teks-->
        <div class="head-text">
          <h1>OUR SERVICES</h1>
        </div>
        <div class="content">
          <p class="sub-head-content">Our Event Vision</p>
          <p class="main-text">Kami menciptakan pengalaman yang menghasilkan kenangan unik dan luar biasa di setiap kesempatan.
            Setiap detail acara kami persiapkan dengan cermat untuk menciptakan pengalaman yang tak terlupakan.
            Setiap pernikahan dirancang sesuai dengan keinginan pelanggan, menjadikannya perayaan yang istimewa
            dan penuh makna pada momen-momen sentimental Anda.</p>
          <p class="sub-head-content">Our Approach</p>
          <p class="main-text">Untuk menciptakan pengalaman yang lebih baik, kami percaya bahwa mendengarkan adalah langkah pertama yang penting.
            Kami bangga menawarkan pengalaman perencanaan yang mulus, memastikan setiap acara terlaksana dengan lancar, sempurna, dan elegan.
            Kelancaran acara dan kepuasan pelanggan adalah prioritas utama kami.
            Kami akan menjaga kesempurnaan acara, sehingga Anda dapat sepenuhnya menikmati perayaan bersama orang-orang tercinta</p>
          <br><br>
          <a href="services.php" class="service-btn">OUR SERVICE</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section-->
  <section id="portfolio" class="portfolio">
    <div class="container-portfolio">
      <div class="items-secondary">
        <div class="head-text">
          <h1>PORTFOLIO</h1>
        </div>
        <div class="content">
          <p class="main-text">Bersama VillaVi, kami tidak hanya merencanakan pernikahan, tetapi juga menciptakan pengalaman yang tak terlupakan. 
            Kami berkomitmen untuk memberikan yang terbaik, melampaui ekspektasi Anda, dan menjadikan hari istimewa Anda sebagai refleksi sejati dari cinta dan gaya Anda. 
            Setiap Janji kami adalah mewujudkan visi Anda menjadi kenyataan yang spektakuler, memastikan setiap momen perayaan Anda penuh keajaiban dan kenangan yang abadi.</p>
          <br><br>
          <a href="portofolio.php" class="portfolio-btn">OUR PORTFOLIO</a>
        </div>
      </div>
      <div class="items-primary">
        <img src="assets/images/Mainportfolio_Banner.jpg" alt="Portfolio Images">
      </div>
    </div>
  </section>

  <!-- Camera 360 Section -->
  <section id="camera-360" class="camera-360">
    <canvas id="viewerCanvas"></canvas>
  </section>

  <script type="module">
    import * as THREE from 'https://cdn.jsdelivr.net/npm/three@0.152.2/build/three.module.js';

    // Inisialisasi renderer
    const canvas = document.getElementById('viewerCanvas');
    const renderer = new THREE.WebGLRenderer({
      canvas
    });
    renderer.setSize(window.innerWidth, window.innerHeight);

    // Membuat scene dan camera
    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.set(0, 0, 0.1); // Sedikit offset untuk pengalaman 360

    // Tambahkan tekstur panorama sebagai material ke bola
    const textureLoader = new THREE.TextureLoader();
    textureLoader.load('/assets/images/360-image.jpeg', (texture) => {
      const sphereGeometry = new THREE.SphereGeometry(50, 60, 40); // Bola besar
      const sphereMaterial = new THREE.MeshBasicMaterial({
        map: texture,
        side: THREE.BackSide, // Membuat tekstur terlihat dari dalam bola
      });

      const sphere = new THREE.Mesh(sphereGeometry, sphereMaterial);
      scene.add(sphere);
    });

    // Variabel untuk interaksi mouse
    let isDragging = false;
    let prevMouseX = 0;
    let prevMouseY = 0;

    // Fungsi animasi
    function animate() {
      renderer.render(scene, camera);
      requestAnimationFrame(animate);
    }
    animate();

    // Event listener untuk kontrol mouse
    canvas.addEventListener('mousedown', (event) => {
      isDragging = true;
      prevMouseX = event.clientX;
      prevMouseY = event.clientY;
    });

    canvas.addEventListener('mousemove', (event) => {
      if (isDragging) {
        const deltaX = event.clientX - prevMouseX;
        const deltaY = event.clientY - prevMouseY;

        // Rotasi kamera berdasarkan pergerakan mouse
        camera.rotation.y -= deltaX * 0.002;
        camera.rotation.x -= deltaY * 0.002;

        // Membatasi rotasi vertikal agar tidak terlalu ekstrem
        camera.rotation.x = Math.max(-Math.PI / 2, Math.min(Math.PI / 2, camera.rotation.x));

        prevMouseX = event.clientX;
        prevMouseY = event.clientY;
      }
    });

    canvas.addEventListener('mouseup', () => {
      isDragging = false;
    });

    canvas.addEventListener('mouseleave', () => {
      isDragging = false;
    });

    // Responsif terhadap perubahan ukuran layar
    window.addEventListener('resize', () => {
      renderer.setSize(window.innerWidth, window.innerHeight);
      camera.aspect = window.innerWidth / window.innerHeight;
      camera.updateProjectionMatrix();
    });
  </script>


  <!-- Location Section -->
  <section id="location" class="location">
    <div class="location">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5876.085189989196!2d106.89287967645825!3d-6.31838019367101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed0991611a33%3A0xac0920869524750f!2sVillaVi!5e1!3m2!1sen!2sid!4v1734323499670!5m2!1sen!2sid"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        allowfullscreen="">
      </iframe>
    </div>
  </section>

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
    <a href="home.php" class="logo">
      <img src="VillaVi_Logo.png" alt="VillaVi Logo">
    </a>
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