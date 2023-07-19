<?php
require '../include/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM gallery WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect ke halaman activity.php setelah menghapus data
        header('Location: activity.php');
        exit;
    } else {
        // Tampilkan pesan error jika terjadi kesalahan
        die("Query error: " . mysqli_error($conn));
    }
}
?>
