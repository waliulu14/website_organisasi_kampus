<?php
require '../include/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data pendaftaran anggota berdasarkan ID
    $query = "DELETE FROM regis_anggota_organisasi WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    // Error handling
    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Redirect ke halaman pendaftaran anggota setelah menghapus data
    header("Location: dafta.php");
    exit();
}
?>
