<?php
session_start(); // Mulai session

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Redirect ke halaman login
header("Location: ../index.php");
exit();
?>
