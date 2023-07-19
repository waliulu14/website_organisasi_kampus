<?php
// hapus_pengurus.php (halaman untuk menghapus data pengurus)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Pastikan parameter ID tersedia
if (isset($_GET['id'])) {
    // Dapatkan ID pengurus dari parameter
    $id = $_GET['id'];

    // Query untuk menghapus pengurus berdasarkan ID
    $query = "DELETE FROM pengurus WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Cek apakah pengurus berhasil dihapus
    if ($result) {
        // Redirect kembali ke halaman pengurus.php dengan pesan sukses
        header("Location: pengurus.php?pesan=Data pengurus berhasil dihapus.");
        exit();
    } else {
        // Redirect kembali ke halaman pengurus.php dengan pesan error
        header("Location: pengurus.php?pesan=Terjadi kesalahan. Data pengurus gagal dihapus.");
        exit();
    }
} else {
    // Jika parameter ID tidak tersedia, redirect kembali ke halaman pengurus.php
    header("Location: pengurus.php");
    exit();
}
