<?php
// daftar.php (halaman pendaftaran mahasiswa)
require 'include/config.php'; // Mengimpor konfigurasi dari file config.php

// Periksa apakah formulir pendaftaran telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $no_telpon = $_POST["no_telpon"];
    $jurusan = $_POST["jurusan"];

    // Cek apakah username sudah digunakan
    $query = "SELECT * FROM login WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        // Hash password menggunakan password_hash() dengan algoritma bcrypt
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Tambahkan data ke tabel login
        $insertLoginQuery = "INSERT INTO login (username, password, level) VALUES ('$username', '$hashedPassword', 'mahasiswa')";
        mysqli_query($conn, $insertLoginQuery);

        // Dapatkan ID login terakhir yang ditambahkan
        $loginId = mysqli_insert_id($conn);

        // Tambahkan data ke tabel mahasiswa
        $insertMahasiswaQuery = "INSERT INTO mahasiswa (id_login, nama, email, no_telpon, jurusan) VALUES ('$loginId', '$nama', '$email', '$no_telpon', '$jurusan')";
        mysqli_query($conn, $insertMahasiswaQuery);

        // Redirect ke halaman login setelah pendaftaran berhasil
        header("Location: login.php");
        exit();
    } else {
        echo "Username sudah digunakan.";
    }
}
?>



<style>
    /* Style untuk container */
.login-container, .register-container {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f1f1f1;
    border: 1px solid #ccc;
    border-radius: 5px;
    text-align: center;
}

/* Style untuk judul */
h2 {
    margin-top: 0;
}

/* Style untuk form */
.form-group {
    margin-bottom: 10px;
    text-align: left;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="password"],
input[type="email"] {
    width: 100%;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

input[type="submit"] {
    width: 100%;
    padding: 8px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Style untuk tautan */
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>

<!-- Formulir pendaftaran HTML -->
<div class="register-container">
    <h2>Daftar Akun Mahasiswa</h2>
    <form method="POST" action="daftar.php">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="no_telpon">No. Telpon:</label>
            <input type="text" id="no_telpon" name="no_telpon" required>
        </div>
        <div class="form-group">
            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Daftar">
        </div>
    </form>
    <p>Udah punya akun? <a href="index.php">Login di sini</a></p>
</div>
