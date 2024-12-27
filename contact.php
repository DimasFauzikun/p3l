<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "p3l";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $service = isset($_POST['service']) ? implode(", ", $_POST['service']) : '';
  $package = $_POST['package'];
  $budget = preg_replace('/[^0-9]/', '', $_POST['budget']);
  $date = $_POST['date'];
  $details = $_POST['details'];

  if (!is_numeric($budget) || empty($budget)) {
    $message = "Budget harus berupa angka.";
  } else {
    // Periksa apakah tanggal sudah ada di database
    $stmt = $conn->prepare("SELECT COUNT(*) FROM contact WHERE date = ?");
    $stmt->bind_param("s", $date);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();

    if ($count > 0) {
      // Jika tanggal sudah terpakai, tampilkan SweetAlert
      echo "<script>
              setTimeout(() => {
                Swal.fire({
                  icon: 'error',
                  title: 'Tanggal Tidak Tersedia',
                  text: 'Tanggal ini sudah terpakai. Silakan pilih tanggal lain.',
                });
              }, 200);
            </script>";
    } else {
      // Simpan data jika tanggal belum terpakai
      $stmt = $conn->prepare("INSERT INTO contact (name, phone, email, address, service, package, budget, date, details) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssssss", $name, $phone, $email, $address, $service, $package, $budget, $date, $details);

      if ($stmt->execute()) {
        // Berhasil menyimpan data
        echo "<script>
                setTimeout(() => {
                  Swal.fire({
                    icon: 'success',
                    title: 'Data Berhasil Disimpan',
                    text: 'Terima kasih telah menghubungi kami.',
                  });
                }, 200);
              </script>";
      } else {
        // Gagal menyimpan data
        echo "<script>
                setTimeout(() => {
                  Swal.fire({
                    icon: 'error',
                    title: 'Kesalahan',
                    text: 'Terjadi kesalahan saat menyimpan data.',
                  });
                }, 200);
              </script>";
      }

      $stmt->close();
    }
  }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Villavi The Venue</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
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

  <!-- Left Section -->
  <div class="container-contact">
    <div class="left-section">
      <h2>GET IN TOUCH</h2>
      <form id="contactForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <?php if (!empty($message)) : ?>
          <p class="alert alert-success" id="phpMessage" style="display: none;">
            <?php echo $message; ?>
          </p>
        <?php endif; ?>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" required />

        <label for="phone">Phone</label>
        <input
          type="text"
          id="phone"
          name="phone"
          required
          oninput="validatePhone()" />
        <small id="phone-error" style="color: red; display: none;">Input harus berupa angka</small>


        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />

        <label for="address">Address</label>
        <input type="text" id="address" name="address" />

        <label for="service">Service</label>
        <div class="checkbox-group">
          <label>
            <input
              type="checkbox"
              id="wedding-organizer"
              name="service[]"
              value="Wedding Organizer"
              onclick="toggleWeddingPackages()" />
            Wedding Organizer
          </label>
          <label>
            <input type="checkbox" name="service[]" value="Photoshoot Services" /> Photoshoot Services
          </label>
          <label>
            <input type="checkbox" name="service[]" value="Venue for Shooting" /> Venue for Shooting
          </label>
          <label>
            <input type="checkbox" name="service[]" value="Event by Request" /> Event by Request
          </label>
        </div>

        <div id="wedding-packages-container" style="display: none;">
          <label for="package">Wedding Packages</label>
          <select id="package" name="package" class="package" required>
            <option value="" disabled selected hidden></option>
            <option value="THE INTIMATE ELEGANCE">THE INTIMATE ELEGANCE</option>
            <option value="THE RADIANCE ROYALE">THE RADIANCE ROYALE</option>
            <option value="THE IMPERIAL BLISS">THE IMPERIAL BLISS</option>
            <option value="THE CUSTOM">THE CUSTOM</option>
          </select>
        </div>



        <label for="budget">Estimated Event Budget</label>
        <input
          type="text"
          id="budget"
          name="budget"
          required
          placeholder="Rp 0"
          oninput="validateBudget()" />
        <small id="budget-error" style="color: red; display: none;">Input hanya bisa berupa angka</small>


        <label for="date">Event Date</label>
        <input type="date" id="date" name="date" required />

        <label for="details">Tell Us About Event</label>
        <textarea id="details" name="details" rows="4"></textarea>

        <button type="submit" class="btn-send">SEND</button>
      </form>
    </div>

    <!-- Left Section -->
    <div class="right-section">
      <img src="Rectangle 57.jpg" alt="Wedding Bouquet" class="wedding-img" />
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5876.085189989196!2d106.89287967645825!3d-6.31838019367101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed0991611a33%3A0xac0920869524750f!2sVillaVi!5e1!3m2!1sen!2sid!4v1734323499670!5m2!1sen!2sid" width="400" height="300" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
      <p>
        Terima kasih telah memilih VillaVi. Mari kita bekerja sama untuk menciptakan sesuatu yang istimewa dan penuh kenangan! <br> <br>
        Untuk informasi lebih lanjut, kirimkan email ke
        <a href="mailto:villavi.the.venue@gmail.com" class="email-link">villavi.the.venue@gmail.com</a>
        atau telepon kami di 0896-9647-6888. Kami akan dengan senang hati merespons Anda!
      </p>
      <p class="address">
        Jl. P.P.A No.8 11, RT.4/RW.4, Ceger, Kec. Cipayung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13820
      </p>
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
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>