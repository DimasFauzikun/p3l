<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'p3l') or die('connection failed');

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Hindari SQL Injection dengan menggunakan prepared statement
    $query = "SELECT * FROM akun_admin WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Jika data ditemukan, redirect ke admin.php
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: admin.php");
        exit();
    } else {
        // Jika tidak ditemukan, tampilkan pesan error atau lakukan tindakan lain
        echo "Login Gagal. Silakan coba lagi.";
    }
}

if (isset($_POST['daftarSubmit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $insert = mysqli_query($conn, "INSERT INTO admin(username, password) VALUES('$username','$password')") or die('query failed');

    if ($insert) {
        $message[] = '<span style="color: green;">Akun berhasil dibuat!</span>';
    } else {
        $message[] = '<span style="color: red;">Akun gagal dibuat.</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Login Admin</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" class="form-control" placeholder="Input username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Input password" required>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" value="Login" class="btn btn-primary btn-block">
                            </div>
                        </form>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <?php
                            if (isset($message)) {
                                foreach ($message as $msg) {
                                    echo '<p class="message">' . $msg . '</p>';
                                }
                            }
                            ?>
                            <!-- <div class="form-group">
                                <input type="submit" name="daftarSubmit" value="Daftar" class="btn btn-success btn-block">
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sertakan script Bootstrap dan jQuery jika diperlukan -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
<!-- #region -->