<?php
require '../include/config.php';

// Periksa apakah parameter ID telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus entri informasi dari tabel berdasarkan ID
    $deleteQuery = "DELETE FROM informasi WHERE id = $id";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Redirect ke halaman informasi.php setelah berhasil menghapus
        header("Location: informasi.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus informasi: " . mysqli_error($conn);
    }
} else {
    echo "Parameter ID tidak ditemukan.";
}
?>
