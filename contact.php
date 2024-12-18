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
    $stmt = $conn->prepare("INSERT INTO contact (name, phone, email, address, service, package, budget, date, details) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $name, $phone, $email, $address, $service, $package, $budget, $date, $details);

    if ($stmt->execute()) {
      $message = "Data berhasil disimpan!";
    } else {
      $message = "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
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
  <header class="text-center py-3 bg-light">
    <p class="text-uppercase small">Tailoring extraordinary experiences for you</p>
  </header>

  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">VILLAVI THE VENUE</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
          <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="portofolio.html">Portfolio</a></li>
          <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container4">
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
        <input type="text" id="phone" name="phone" required />

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required />

        <label for="address">Address</label>
        <input type="text" id="address" name="address" />

        <label for="service">Service</label>
        <div class="checkbox-group">
          <label><input type="checkbox" name="service[]" value="Wedding Organizer" /> Wedding Organizer</label>
          <label><input type="checkbox" name="service[]" value="Photoshoot Services" /> Photoshoot Services</label>
          <label><input type="checkbox" name="service[]" value="Venue for Shooting" /> Venue for Shooting</label>
          <label><input type="checkbox" name="service[]" value="Event by Request" /> Event by Request</label>
        </div>

        <label for="package">Wedding Packages*</label>
        <select id="package" name="package" required>
          <option value="" disabled selected>Select</option>
          <option value="THE INTIMATE ELEGANCE">THE INTIMATE ELEGANCE</option>
          <option value="THE RADIANCE ROYALE">THE RADIANCE ROYALE</option>
          <option value="THE IMPERIAL BLISS">THE IMPERIAL BLISS</option>
          <option value="THE CUSTOM">THE CUSTOM</option>
        </select>

        <label for="budget">Estimated Event Budget</label>
        <input type="text" id="budget" name="budget" required placeholder="Rp 0" oninput="formatCurrency(this)" />

        <label for="date">Event Date</label>
        <input type="date" id="date" name="date" required />

        <label for="details">Tell Us About Event</label>
        <textarea id="details" name="details" rows="4"></textarea>

        <button type="submit" class="btn-send">SEND</button>
      </form>
    </div>

    <div class="right-section">
      <img src="Rectangle 57.jpg" alt="Wedding Bouquet" class="wedding-img" />
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5876.085189989196!2d106.89287967645825!3d-6.31838019367101!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69ed0991611a33%3A0xac0920869524750f!2sVillaVi!5e1!3m2!1sen!2sid!4v1734323499670!5m2!1sen!2sid" width="400" height="300" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
      <p>
        Terima kasih telah memilih layanan kami. Untuk informasi lebih lanjut,
        hubungi kami di
        <a href="mailto:email@example.com">email@example.com</a> atau telepon
        +62 812-3456-7890.
      </p>
    </div>
  </div>

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>