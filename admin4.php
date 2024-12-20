<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect('localhost', 'root', '', 'p3l');

// Fungsi untuk menambahkan data
function tambahService($conn, $gambar_porto)
{
    $gambar_porto = mysqli_real_escape_string($conn, $gambar_porto);

    $query = "INSERT INTO portofolio (gambar_porto) VALUES ('$gambar_porto')";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Fungsi untuk menampilkan data
function tampilportofolio($conn)
{
    $query = "SELECT * FROM portofolio";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Fungsi untuk mengedit data
function editService($conn, $id, $gambar_porto)
{
    $id = mysqli_real_escape_string($conn, $id);
    $gambar_porto = mysqli_real_escape_string($conn, $gambar_porto);

    $query = "UPDATE portofolio SET gambar_porto='$gambar_porto' WHERE id='$id'";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Fungsi untuk menghapus data
function hapusService($conn, $id)
{
    $query = "DELETE FROM portofolio WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Menangani form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tambah'])) {
        $gambar_porto = '';

        if (!empty($_FILES['gambar_porto']['name'])) {
            $fileName = $_FILES['gambar_porto']['name'];
            $fileTmpName = $_FILES['gambar_porto']['tmp_name'];
            $fileDestination = 'uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $gambar_porto = $fileDestination;
        }

        tambahService($conn, $gambar_porto);
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $gambar_porto = '';

        if (!empty($_FILES['gambar_porto']['name'])) {
            $fileName = $_FILES['gambar_porto']['name'];
            $fileTmpName = $_FILES['gambar_porto']['tmp_name'];
            $fileDestination = 'uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $gambar_porto = $fileDestination;
        }

        editService($conn, $id, $gambar_porto);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus'])) {
    hapusService($conn, $_POST['id']);
}

$dataResult = tampilportofolio($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin portofolio</title>
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
                <a href="admin3.php" class="nav-link text-white">
                    <i class="fas fa-calendar-alt me-2"></i> Wedding Packages
                </a>
            </li>
        </ul>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="admin4.php" class="nav-link active">
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
        <h2>Manage portofolio</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="file" class="form-control" name="gambar_porto" id="gambar_porto" accept=".jpg, .jpeg, .png">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="tambah" value="Add Service">
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($dataResult)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><img src="<?php echo $row['gambar_porto']; ?>" alt="Image" width="100"></td>
                        <td>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="mb-2">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="mb-2">
                                    <input type="file" class="form-control" name="gambar_porto" id="gambar_porto" accept=".jpg, .jpeg, .png">
                                </div>
                                <div class="mb-2">
                                    <input type="submit" class="btn btn-success" name="edit" value="Edit">
                                </div>
                            </form>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" onsubmit="return confirm('Are you sure?');">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="mb-2">
                                    <input type="submit" class="btn btn-danger" name="hapus" value="Delete">
                                </div>
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