<?php
$conn = mysqli_connect('localhost', 'root', '', 'p3l');

// Fetch portfolio data
function fetchPortfolios($conn)
{
    $query = "SELECT * FROM portofolio";
    return mysqli_query($conn, $query);
}

$portfolios = fetchPortfolios($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Villavi The Venue</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Header -->
    <header class="text-center py-3 bg-light">
        <p class="text-uppercase small">Tailoring extraordinary experiences for you</p>
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
        background-image: url('Content\ 3\ -\ Opening.jpg');
        height: 70vh;
        background-size: cover;
        background-position: center;
      ">
        <!-- <div
        class="container h-100 d-flex align-items-center justify-content-center"
      >
        <div>
          <h1>VILLAVI THE VENUE</h1>
          <p class="mb-4">Creating Unforgettable Moments with Purpose</p>
          <a href="#contact" class="btn btn-secondary">Start Planning</a>
        </div>
      </div> -->
    </section>

    <!-- Portfolio Gallery -->
    <div class="gallery1">
        <?php while ($row = mysqli_fetch_assoc($portfolios)) { ?>
            <div>
                <img src="<?php echo $row['gambar_porto']; ?>" alt="Portfolio Image">
            </div>
        <?php } ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js" defer></script>
</body>

</html>