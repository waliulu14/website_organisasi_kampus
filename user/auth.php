<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika pengguna belum login, redirect ke halaman login
    header("Location: ../login.php");
    exit();
}

?>



