<?php
require '../include/config.php';

// Check if the 'id' parameter is received
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Check if the blog entry with the given ID exists in the database
    $query = "SELECT * FROM blog WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Check if the blog entry is found
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Form submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'];
            $konten = $_POST['konten'];
            $gambar = $_FILES['gambar']['name'];
            $gambar_tmp = $_FILES['gambar']['tmp_name'];
            $link = $_POST['link'];

            // If a new image is uploaded, update the image
            if ($gambar) {
                $gambar_path = "img/blog/" . $gambar;
                move_uploaded_file($gambar_tmp, $gambar_path);
            } else {
                // If no new image is uploaded, use the existing image
                $gambar = $row['gambar'];
            }

            // Update the blog entry in the database
            $updateQuery = "UPDATE blog SET judul = '$judul', konten = '$konten', gambar = '$gambar', link = '$link' WHERE id = $id";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                // Redirect to the blog page after successful update
                header("Location: blog.php");
                exit();
            } else {
                echo "Terjadi kesalahan saat memperbarui blog: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Blog entry not found.";
    }
} else {
    echo "ID parameter not found.";
}
?>

<?php include 'include/navbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Data Blog</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="blog.php">Data Blog</a></li>
                <li class="breadcrumb-item active">Edit Data Blog</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>
                    Edit Data Blog
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea class="form-control" id="konten" name="konten" rows="4" required><?php echo $row['konten']; ?></textarea>
                        </div>
                        <Here's the continuation of the code to create the form for editing a blog entry:

```php
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link" value="<?php echo $row['link']; ?>">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    </div>
    <br>

    <?php include 'include/footer.php'; ?>
</div>
