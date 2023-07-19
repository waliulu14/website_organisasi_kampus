<?php
require '../include/config.php';

// Check if the 'id' parameter is received
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the blog entry with the given ID from the database
    $deleteQuery = "DELETE FROM blog WHERE id = $id";
    $deleteResult = mysqli_query($conn, $deleteQuery);

    if ($deleteResult) {
        // Redirect to the blog page after successful deletion
        header("Location: blog.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menghapus blog: " . mysqli_error($conn);
    }
} else {
    echo "ID parameter not found.";
}
?>
