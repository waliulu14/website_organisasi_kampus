<?php
// hapus_divisi.php (halaman untuk menghapus data divisi)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Cek apakah parameter ID tersedia
if (isset($_GET['id'])) {
    // Dapatkan ID divisi dari parameter
    $id = $_GET['id'];

    // Query untuk menghapus data divisi berdasarkan ID
    // Hapus data dari tabel "regis_anggota_organisasi" terlebih dahulu
    $deleteRegisQuery = "DELETE FROM regis_anggota_organisasi WHERE id_devisi = $id";
    $deleteRegisResult = mysqli_query($conn, $deleteRegisQuery);

    // Hapus data divisi dari tabel "devisi" jika data di tabel "regis_anggota_organisasi" sudah dihapus
    if ($deleteRegisResult) {
        $deleteDivisiQuery = "DELETE FROM devisi WHERE id = $id";
        $deleteDivisiResult = mysqli_query($conn, $deleteDivisiQuery);

        // Cek apakah divisi berhasil dihapus
        if ($deleteDivisiResult) {
            // Redirect kembali ke halaman divisi.php dengan pesan sukses
            header("Location: divisi.php?pesan=Data divisi berhasil dihapus.");
            exit();
        } else {
            // Redirect kembali ke halaman divisi.php dengan pesan error
            header("Location: divisi.php?pesan=Terjadi kesalahan. Data divisi gagal dihapus.");
            exit();
        }
    } else {
        // Redirect kembali ke halaman divisi.php dengan pesan error
        header("Location: divisi.php?pesan=Terjadi kesalahan. Data divisi gagal dihapus.");
        exit();
    }
} else {
    // Jika parameter ID tidak tersedia, redirect kembali ke halaman divisi.php
    header("Location: divisi.php");
    exit();
}
?>
