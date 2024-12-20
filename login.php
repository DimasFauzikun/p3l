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
        echo "<script>alert('Login Gagal. Silakan coba lagi.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f9f9f9;
        }

        .login-container {
            width: 350px;
            background-color: #fff;
            padding: 50px;
            border-radius: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-container h2 {
            text-align: center;
            color: #4a4a8f;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #4a4a8f;
        }

        .form-group input[type="text"],
        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #6a6de6;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .form-group input[type="submit"]:hover {
            background-color: #585bc3;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .form-options a {
            color: #6a6de6;
            text-decoration: none;
            font-size: 14px;
        }

        .form-options a:hover {
            text-decoration: underline;
        }

        .form-options input[type="checkbox"] {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h2>Login</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-options">
                <div>
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#">Forgot?</a>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Login">
            </div>
        </form>
    </div>
</body>

</html>