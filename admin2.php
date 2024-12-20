<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect('localhost', 'root', '', 'p3l');

// Fungsi untuk menambahkan data
function tambahService($conn, $title, $deskripsi, $gambar)
{
    $title = mysqli_real_escape_string($conn, $title);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
    $gambar = mysqli_real_escape_string($conn, $gambar);

    $query = "INSERT INTO services (title, deskripsi, gambar) VALUES ('$title', '$deskripsi', '$gambar')";

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Fungsi untuk menampilkan data
function tampilServices($conn)
{
    $query = "SELECT * FROM services";
    $result = mysqli_query($conn, $query);
    return $result;
}

// Fungsi untuk mengedit data
function editService($conn, $id, $title, $deskripsi, $gambar)
{
    $id = mysqli_real_escape_string($conn, $id);
    $title = mysqli_real_escape_string($conn, $title);
    $deskripsi = mysqli_real_escape_string($conn, $deskripsi);
    $gambar = mysqli_real_escape_string($conn, $gambar);

    if (!empty($gambar)) {
        $query = "UPDATE services SET title='$title', deskripsi='$deskripsi', gambar='$gambar' WHERE id='$id'";
    } else {
        $query = "UPDATE services SET title='$title', deskripsi='$deskripsi' WHERE id='$id'";
    }

    if (mysqli_query($conn, $query)) {
        echo "Data berhasil diupdate.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Fungsi untuk menghapus data
function hapusService($conn, $id)
{
    $query = "DELETE FROM services WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

// Menangani form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tambah'])) {
        $title = $_POST['title'];
        $deskripsi = $_POST['deskripsi'];
        $gambar = '';

        if (!empty($_FILES['gambar']['name'])) {
            $fileName = $_FILES['gambar']['name'];
            $fileTmpName = $_FILES['gambar']['tmp_name'];
            $fileDestination = 'uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $gambar = $fileDestination;
        }

        tambahService($conn, $title, $deskripsi, $gambar);
    } elseif (isset($_POST['edit'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $deskripsi = $_POST['deskripsi'];
        $gambar = '';

        if (!empty($_FILES['gambar']['name'])) {
            $fileName = $_FILES['gambar']['name'];
            $fileTmpName = $_FILES['gambar']['tmp_name'];
            $fileDestination = 'uploads/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            $gambar = $fileDestination;
        }

        editService($conn, $id, $title, $deskripsi, $gambar);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus'])) {
    hapusService($conn, $_POST['id']);
}

$dataResult = tampilServices($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Services</title>
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
                <a href="admin2.php" class="nav-link active">
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
        <hr>
    </div>
    <div class="container mt-5">
        <h2>Manage Services</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="deskripsi" placeholder="Description" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <input type="file" class="form-control" name="gambar" id="gambar" accept=".jpg, .jpeg, .png">
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="tambah" value="Add Service">
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($dataResult)) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo nl2br($row['deskripsi']); ?></td>
                        <td><img src="<?php echo $row['gambar']; ?>" alt="Image" width="100"></td>
                        <td>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="mb-2">
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                <div class="mb-2">
                                    <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>">
                                </div>
                                <div class="mb-2">
                                    <textarea class="form-control" name="deskripsi" rows="4"><?php echo $row['deskripsi']; ?></textarea>
                                </div>
                                <div class="mb-2">
                                    <input type="file" class="form-control" name="gambar" id="gambar" accept=".jpg, .jpeg, .png">
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