<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "20222_wp2_412021015";

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

?>