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
    <link rel="stylesheet" href="./assets/css/style.css">
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
                <img src="assets/images/VillaVi_Logo.jpg" alt="VillaVi Logo" height=50% width=50%>
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
                        <a class="nav-link" href="portfolio.php">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-portfolio">
        <div class="hero-content"></div>
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
            <img src="assets/images/VillaVi_Logo.png" alt="VillaVi Logo">
        </nav>
    </section>

    <footer class="copyright">
        <div class="copyright-content">
            <p>©2024 VillaVi The Venue | ALL RIGHTS RESERVED<br>
                | DESIGN BY GENERASI TATAP LAYAR</p>
        </div>
    </footer>

        <!-- Chipp Chat Widget -->
    <script>
        window.CHIPP_APP_URL = "https://villaviaiagent-32623.chipp.ai";
        window.CHIPP_APP_ID = 32623;
    </script>

    <link rel="stylesheet" href="https://storage.googleapis.com/chipp-chat-widget-assets/build/bundle.css" />

    <script defer src="https://storage.googleapis.com/chipp-chat-widget-assets/build/bundle.js"></script>


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