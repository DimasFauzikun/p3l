<?php
$conn = mysqli_connect('localhost', 'root', '', 'p3l');

if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Ambil data dari tabel services
$query = "SELECT * FROM services";
$result = mysqli_query($conn, $query);

// Ambil data dari tabel wedding_packages
function tampilPackages($conn)
{
    $query = "SELECT * FROM wedding_packages";
    $result = mysqli_query($conn, $query);
    return $result;
}

$dataResult = tampilPackages($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Villavi The Venue</title>
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
    <section class="hero-service">
        <div class="hero-content"></div>
    </section>


    <!-- Services Section -->
    <div class="available-service">
        <div class="content-service">
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <div class="services-section">
                    <div class="images-services">
                        <img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                    </div>
                    <div class="text-services-content">
                        <h1><?php echo htmlspecialchars($row['title']); ?></h1>
                        <p><?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- Wedding Package Section -->
    <div class="wedding-package">
        <h1>WEDDING PACKAGE</h1>
        <div class="package-list">
            <?php while ($row = mysqli_fetch_assoc($dataResult)) { ?>
                <div class="package-wedding">
                    <div class="image">
                        <img src="<?php echo $row['gambar_pk']; ?>" alt="<?php echo $row['title_pk']; ?>" />
                        <div class="overlay"><?php echo strtoupper($row['title_pk']); ?></div>
                    </div>
                    <h2><?php echo $row['title_pk']; ?></h2>
                    <p><?php echo $row['deskripsi_pk']; ?></p>
                    <p class="price">Paket untuk <strong><?php echo $row['pax']; ?> PAX</strong></p>
                    <button class="wedding-package-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#readMoreModal"
                        data-title="<?php echo htmlspecialchars($row['title_pk']); ?>"
                        data-description="<?php echo htmlspecialchars($row['deskripsi_pk']); ?>"
                        data-image="<?php echo htmlspecialchars($row['gambar_paket']); ?>">
                        Detail Lengkap
                    </button>
                </div>
            <?php } ?>

            <!-- custom -->
            <div class="package-wedding">
                <div class="image">
                    <img src="/uploads/Rectangle 82.jpg" alt="Package Title 2" />
                    <div class="overlay">THE CUSTOM</div>
                </div>
                <h2>THE CUSTOM</h2>
                <p>THE CUSTOM Perayaan fleksibel yang dirancang khusus sesuai keinginan Anda, dengan layanan dan detail yang dapat disesuaikan untuk menciptakan momen yang sempurna.</p>
                <!-- <p class="price">Paket untuk <strong>100 PAX</strong></p> -->
                <button class="wedding-package-btn" onclick="window.location.href='contact.php';">
                    Hubungi Kami
                </button> 
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="readMoreModal" tabindex="-1" aria-labelledby="readMoreModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="readMoreModalLabel">Package Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Package Image" class="img-fluid mb-3" />
                    <h2 id="modalTitle"></h2>
                    <p id="modalDescription"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="modal-btn" data-bs-dismiss="modal">Close</button>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("readMoreModal");
            const modalTitle = document.getElementById("modalTitle");
            const modalDescription = document.getElementById("modalDescription");
            const modalImage = document.getElementById("modalImage");

            document.querySelectorAll(".wedding-package-btn").forEach(function(button) {
                button.addEventListener("click", function() {
                    const title = this.getAttribute("data-title");
                    const description = this.getAttribute("data-description");
                    const image = this.getAttribute("data-image");

                    modalTitle.textContent = title;
                    modalDescription.textContent = description;
                    modalImage.src = image;
                });
            });
        });
    </script>
</body>

</html>