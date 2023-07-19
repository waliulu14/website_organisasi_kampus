<?php
require '../include/config.php';

// Periksa apakah parameter ID telah diterima
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Periksa apakah informasi dengan ID tersebut ada di database
    $query = "SELECT * FROM informasi WHERE id = $id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    // Periksa apakah informasi ditemukan
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        // Form submit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $judul = $_POST['judul'];
            $konten = $_POST['konten'];
            $gambar = $_FILES['gambar']['name'];
            $gambar_tmp = $_FILES['gambar']['tmp_name'];
            $gambar_path = "img/informasi/" . $gambar;
            $link = $_POST['link'];

            // Perbarui entri informasi di database
            $updateQuery = "UPDATE informasi SET judul = '$judul', konten = '$konten', gambar = '$gambar', link = '$link' WHERE id = $id";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                // Upload gambar baru jika ada yang diunggah
                if (!empty($gambar)) {
                    move_uploaded_file($gambar_tmp, $gambar_path);
                }

                // Redirect ke halaman informasi.php setelah berhasil memperbarui informasi
                header("Location: informasi.php");
                exit();
            } else {
                echo "Terjadi kesalahan saat memperbarui informasi: " . mysqli_error($conn);
            }
        }
    } else {
        echo "Informasi tidak ditemukan.";
    }
} else {
    echo "Parameter ID tidak ditemukan.";
}
?>

<?php include 'include/navbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Informasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="informasi.php">Data Informasi</a></li>
                <li class="breadcrumb-item active">Edit Informasi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-edit me-1"></i>
                    Edit Informasi
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $row['judul']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea class="form-control" id="konten" name="konten" rows="4"><?php echo $row['konten']; ?></textarea>

                        </div>
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

    <?php include 'include/footer.php'; ?>
</div>
