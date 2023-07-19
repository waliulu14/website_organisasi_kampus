<?php
require '../include/config.php';

// Jika form disubmit, lakukan penyimpanan data ke database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $foto = $_FILES['foto']['name'];
    $deskripsi = $_POST['deskripsi'];

    // Upload foto ke folder yang diinginkan
    $targetDirectory = 'img/activity/';
    $targetPath = $targetDirectory . $foto;
    move_uploaded_file($_FILES['foto']['tmp_name'], $targetPath);

    // Simpan data ke database
    $query = "INSERT INTO gallery (foto, deskripsi) VALUES ('$foto', '$deskripsi')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect ke halaman data aktivitas setelah berhasil disimpan
        header('Location: activity.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<?php include 'include/navbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Data Aktivitas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="activity.php">Data Aktivitas</a></li>
                <li class="breadcrumb-item active">Tambah Data Aktivitas</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Data Aktivitas
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="activity.php" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php'; ?>
</div>
