<?php
// login.php (halaman login)
require 'include/config.php'; // Mengimpor konfigurasi dari file config.php

// Periksa apakah formulir login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Lakukan query untuk memeriksa kredensial pengguna
    $query = "SELECT * FROM login WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row["password"];
        $level = $row["level"];

        // Verifikasi password dengan password_verify()
        if (password_verify($password, $hashedPassword)) {
            // Mulai sesi dan tetapkan nilai user_id
            session_start();
            $_SESSION['user_id'] = $row['id'];

            // Tentukan halaman yang sesuai berdasarkan level
            if ($level == "mahasiswa") {
                header("Location: user/index.php");
                exit();
            } elseif ($level == "admin") {
                header("Location: admin/index.php");
                exit();
            }
        } else {
            $error_message = "Username atau password salah.";
        }
    } else {
        $error_message = "Username atau password salah.";
    }
}
?>
<!-- login.php (halaman login) -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="style.css"> <!-- Mengimpor file CSS -->
    <style>
        /* style.css */
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .login-container {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 10px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 8px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="login-container">
    <h2>Login</h2>
    <?php if (isset($error_message)) : ?>
        <div class="alert alert-danger" role="alert"><?php echo $error_message; ?></div>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Login">
        </div>
    </form>
    <p>Belum punya akun? <a href="daftar.php">Daftar di sini</a></p>
</div>
</body>
</html>
