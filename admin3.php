<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect('localhost', 'root', '', 'p3l');

// Fungsi untuk menambahkan data
function tambahPackage($conn, $title, $deskripsi, $pax, $gambar, $overlay, $gambar_paket)
{
    $title = mysqli_real_escape_string($conn, $title);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
    $pax = mysqli_real_escape_string($conn, $pax);
    $gambar = mysqli_real_escape_string($conn, $gambar);
    $overlay = mysqli_real_escape_string($conn, $overlay);
    $gambar_paket = mysqli_real_escape_string($conn, $gambar_paket);

    $query = "INSERT INTO wedding_packages (title_pk, deskripsi_pk, pax, gambar_pk, overlay_text, gambar_paket) VALUES ('$title', '$deskripsi', '$pax', '$gambar', '$overlay', '$gambar_paket')";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Fungsi untuk menampilkan data
function tampilPackages($conn)
{
    $query = "SELECT * FROM wedding_packages";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Fungsi untuk mengedit data
function editPackage($conn, $id, $title, $deskripsi, $pax, $gambar, $overlay, $gambar_paket)
{
    $id = mysqli_real_escape_string($conn, $id);
    $title = mysqli_real_escape_string($conn, $title);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
    $pax = mysqli_real_escape_string($conn, $pax);
    $overlay = mysqli_real_escape_string($conn, $overlay);

    if (!empty($gambar)) {
        $query = "UPDATE wedding_packages SET title_pk='$title', deskripsi_pk='$deskripsi', pax='$pax', gambar_pk='$gambar', overlay_text='$overlay', gambar_paket='$gambar_paket' WHERE id='$id'";
    } else {
        $query = "UPDATE wedding_packages SET title_pk='$title', deskripsi_pk='$deskripsi', pax='$pax', overlay_text='$overlay', gambar_paket='$gambar_paket' WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Fungsi untuk menghapus data
function hapusPackage($conn, $id)
{
    $query = "DELETE FROM wedding_packages WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}


// Kode lama 
// Menangani form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tambah'])) {
        $title = $_POST['title_pk'];
        $deskripsi = $_POST['deskripsi_pk'];
        $pax = $_POST['pax'];
        $overlay = $_POST['overlay_text'];
        $gambar_paket = '';
        $gambar = '';

        // Proses upload gambar_paket
        if (!empty($_FILES['gambar_paket']['name'])) {
            $fileNamePaket = $_FILES['gambar_paket']['name'];
            $fileTmpPaket = $_FILES['gambar_paket']['tmp_name'];
            $fileDestinationPaket = 'uploads/' . $fileNamePaket;
            move_uploaded_file($fileTmpPaket, $fileDestinationPaket);
            $gambar_paket = $fileDestinationPaket;
        }

        $gambar = '';

        // Proses upload gambar_pk
        if (!empty($_FILES['gambar_pk']['name'])) {
            $fileName = $_FILES['gambar_pk']['name'];
            $fileTmpName = $_FILES['gambar_pk']['tmp_name'];
            $fileDestination = 'uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $gambar = $fileDestination;
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

             // Validasi hanya file PDF
            if (strtolower($fileExtension) === 'pdf') {
                $fileDestination = 'uploads/' . $fileName;
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $gambar = $fileDestination; // Simpan path file PDF
                } else {
                    echo "Error upload PDF file.";
                }
            } else {
                echo "File yang diupload hanya boleh PDF.";
            }
        }

        tambahPackage($conn, $title, $deskripsi, $pax, $gambar, $overlay, $gambar_paket);
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $title = $_POST['title_pk'];
        $deskripsi = $_POST['deskripsi_pk'];
        $pax = $_POST['pax'];
        $overlay = $_POST['overlay_text'];
        $gambar_paket = '';

        // Proses upload gambar_paket
        if (!empty($_FILES['gambar_paket']['name'])) {
            $fileNamePaket = $_FILES['gambar_paket']['name'];
            $fileTmpPaket = $_FILES['gambar_paket']['tmp_name'];
            $fileDestinationPaket = 'uploads/' . $fileNamePaket;
            move_uploaded_file($fileTmpPaket, $fileDestinationPaket);
            $gambar_paket = $fileDestinationPaket;
        }

        $gambar = '';

        // Proses upload gambar_pk
        if (!empty($_FILES['gambar_pk']['name'])) {
            $fileName = $_FILES['gambar_pk']['name'];
            $fileTmpName = $_FILES['gambar_pk']['tmp_name'];
            $fileDestination = 'uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $gambar = $fileDestination;
            $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

             // Validasi hanya file PDF
            if (strtolower($fileExtension) === 'pdf') {
                $fileDestination = 'uploads/' . $fileName;
                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    $gambar = $fileDestination; // Simpan path file PDF
                } else {
                    echo "Error upload PDF file.";
                }
            } else {
                echo "File yang diupload hanya boleh PDF.";
            }
        }

        editPackage($conn, $id, $title, $deskripsi, $pax, $gambar, $overlay, $gambar_paket);
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus'])) {
    hapusPackage($conn, $_POST['id']);
}

$dataResult = tampilPackages($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Wedding Packages</title>
    <style>
        body {
            margin-left: 280px;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background-color: #343a40;
            color: white;
            padding: 1rem;
            overflow-y: auto;
            transition: width 0.3s ease;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            margin-bottom: 10px;
        }

        .sidebar a.active {
            background-color: #007bff;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .content {
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        @media screen and (max-width: 768px) {
            body {
                margin-left: 0;
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .content {
                margin-left: 0;
            }

            .sidebar a {
                display: block;
                margin: 5px 0;
            }
        }

        @media screen and (max-width: 480px) {
            .sidebar {
                padding: 0.5rem;
            }

            .sidebar a {
                font-size: 14px;
            }

            .content {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-auto text-white text-decoration-none">
            <i class="fas fa-heartbeat fa-2x me-2"></i>
            <span class="fs-4">Admin Page</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="admin.php" class="nav-link text-white">
                    <i class="fas fa-calendar-alt me-2"></i> Data contact
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="admin2.php" class="nav-link text-white">
                    <i class="fas fa-calendar-alt me-2"></i> Services
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="admin3.php" class="nav-link active">
                    <i class="fas fa-calendar-alt me-2"></i> Wedding Packages
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="admin4.php" class="nav-link text-white">
                    <i class="fas fa-calendar-alt me-2"></i> portofolio
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="logout.php" class="nav-link text-white">
                    <i class="fas fa-calendar-alt me-2"></i> Log Out
                </a>
            </li>
        </ul>
        <hr>
    </div>

    <div class="container mt-5">
        <h2>Manage Wedding Packages</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <!-- Form Input -->
            <div class="mb-3">
                <input type="text" class="form-control" name="title_pk" placeholder="Title">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="deskripsi_pk" placeholder="Description" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <input type="number" class="form-control" name="pax" placeholder="PAX">
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="overlay_text" placeholder="Overlay Text">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="gambar_paket" accept=".jpg, .jpeg, .png">
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="gambar_pk" accept=".pdf">
            </div>
            <input type="submit" class="btn btn-primary" name="tambah" value="Add Package">
        </form>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>PAX</th>
                    <th>Overlay Text</th>
                    <th>Gambar Paket</th>
                    <th>Gambar PK</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($dataResult)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>

                        <td><?php echo htmlspecialchars($row['title_pk'], ENT_QUOTES, 'UTF-8'); ?></td>

                        <td><?php echo nl2br(htmlspecialchars($row['deskripsi_pk'], ENT_QUOTES, 'UTF-8')); ?></td>

                        <td><?php echo $row['pax']; ?></td>

                        <td><?php echo $row['overlay_text']; ?></td>

                        <td>
                        <?php if (!empty($row['gambar_paket'])) { ?>
                            <img src="<?php echo $row['gambar_paket']; ?>" alt="Gambar Paket" width="100">
                        <?php } else { ?>
                            <span>No Image</span>
                        <?php } ?>
                        </td>
                        <td>
                            <?php if (!empty($row['gambar_pk'])) { ?>
                                <?php if (pathinfo($row['gambar_pk'], PATHINFO_EXTENSION) === 'pdf') { ?>
                                    <a href="<?php echo $row['gambar_pk']; ?>" target="_blank">View PDF</a>
                                <?php } else { ?>
                                    <img src="<?php echo $row['gambar_pk']; ?>" alt="Gambar PK" width="100">
                                <?php } ?>
                            <?php } else { ?>
                                <span>No File</span>
                            <?php } ?>
                        </td>

                        <td>
                            <!-- Form Edit & Hapus -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="mb-2">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="title_pk" value="<?php echo $row['title_pk']; ?>">
                                </div>
                                <div class="mb-2">
                                    <textarea class="form-control" name="deskripsi_pk" rows="4"><?php echo $row['deskripsi_pk']; ?></textarea>
                                </div>
                                <div class="mb-2">
                                    <input type="number" class="form-control" name="pax" value="<?php echo $row['pax']; ?>">
                                </div>
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="overlay_text" value="<?php echo $row['overlay_text']; ?>">
                                </div>
                                <div class="mb-2">
                                    <input type="file" class="form-control" name="gambar_paket" accept=".jpg, .jpeg, .png">
                                </div>
                                <div class="mb-2">
                                    <input type="file" class="form-control" name="gambar_pk" accept=".pdf">
                                </div>
                                <input type="submit" class="btn btn-success" name="edit" value="Edit">
                            </form>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <input type="submit" class="btn btn-danger" name="hapus" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>