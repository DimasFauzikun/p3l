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
        background-image: url('Content\ 2\ -\ Opening.jpg');
        height: 70vh;
        background-size: cover;
        background-position: center;
      ">
    </section>

    <!-- Services Section -->
    <div class="container2 my-5">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="section">
                <div class="image">
                    <img src="<?php echo htmlspecialchars($row['gambar']); ?>" alt="<?php echo htmlspecialchars($row['title']); ?>">
                </div>
                <div class="content">
                    <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                    <p><?php echo nl2br(htmlspecialchars($row['deskripsi'])); ?></p>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- Wedding Package Section -->
    <div class="container3">
        <h1>WEDDING PACKAGE</h1>
        <div class="packages">
            <?php while ($row = mysqli_fetch_assoc($dataResult)) { ?>
                <div class="package">
                    <div class="image">
                        <img src="<?php echo $row['gambar_pk']; ?>" alt="<?php echo $row['title_pk']; ?>" />
                        <div class="overlay"><?php echo strtoupper($row['title_pk']); ?></div>
                    </div>
                    <h2><?php echo $row['title_pk']; ?></h2>
                    <p><?php echo $row['deskripsi_pk']; ?></p>
                    <p class="price">Paket untuk <strong><?php echo $row['pax']; ?> PAX</strong></p>
                    <button class="btn btn btn-secondary gray-button read-more-btn"
                        data-bs-toggle="modal"
                        data-bs-target="#readMoreModal"
                        data-title="<?php echo htmlspecialchars($row['title_pk']); ?>"
                        data-description="<?php echo htmlspecialchars($row['deskripsi_pk']); ?>"
                        data-image="<?php echo htmlspecialchars($row['gambar_paket']); ?>">Read More</button>
                </div>
            <?php } ?>
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
                    <button type="button" class="btn btn-secondary gray-button" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- di bawah -->
    <div class="center-container">
        <h1>Lorem Ipsum</h1>
        <p>
            There are many variations of passages of Lorem Ipsum available, but the
            majority have suffered alteration in some form, by injected humour, or
            randomised words which don't look even slightly believable.
        </p>
        <button class="inquiry-button">INQUIRY FORM</button>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const modal = document.getElementById("readMoreModal");
            const modalTitle = document.getElementById("modalTitle");
            const modalDescription = document.getElementById("modalDescription");
            const modalImage = document.getElementById("modalImage");

            document.querySelectorAll(".read-more-btn").forEach(function(button) {
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