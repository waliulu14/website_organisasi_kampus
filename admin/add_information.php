<?php
require '../include/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];
    $link = $_POST['link'];

    // Tentukan lokasi penyimpanan file
    $gambar_path = "img/informasi/" . $gambar;

    // Upload gambar
    move_uploaded_file($gambar_tmp, $gambar_path);

    // Simpan data informasi ke database
    $insertQuery = "INSERT INTO informasi (judul, konten, gambar, link) VALUES ('$judul', '$konten', '$gambar', '$link')";
    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        // Redirect ke halaman informasi.php setelah berhasil menambahkan informasi
        header("Location: informasi.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat menambahkan informasi: " . mysqli_error($conn);
    }
}
?>

<?php include 'include/navbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Informasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="informasi.php">Data Informasi</a></li>
                <li class="breadcrumb-item active">Tambah Informasi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-plus me-1"></i>
                    Tambah Informasi
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" required>
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="form-label">Konten</label>
                            <textarea class="form-control" id="konten" name="konten" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" required>
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Link</label>
                            <input type="text" class="form-control" id="link" name="link">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php'; ?>
</div>
