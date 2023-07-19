<?php
// tambah_divisi.php (halaman untuk menambah data divisi)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Inisialisasi variabel pesan error
$error = '';

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan data yang diinputkan dari form
    $namaDivisi = $_POST['nama_divisi'];
    $deskripsi = $_POST['deskripsi'];

    // Memeriksa apakah gambar divisi telah diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        // Mendapatkan informasi file gambar
        $gambar = $_FILES['gambar'];
        $gambarName = $gambar['name'];
        $gambarTmp = $gambar['tmp_name'];

        // Memindahkan file gambar ke folder tujuan
        move_uploaded_file($gambarTmp, "img/devisi/$gambarName");
    } else {
        $gambarName = ''; // Mengeset nama gambar menjadi kosong jika tidak ada gambar yang diupload
    }

    // Menyimpan data divisi ke dalam tabel devisi
    $query = "INSERT INTO devisi (nama_devisi, deskripsi, gambar) VALUES ('$namaDivisi', '$deskripsi', '$gambarName')";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah data divisi berhasil disimpan
    if ($result) {
        // Mengalihkan pengguna ke halaman data divisi setelah berhasil menambahkan divisi
        header("Location: divisi.php");
        exit();
    } else {
        $error = "Gagal menambahkan divisi. Silakan coba lagi.";
    }
}

?>

<?php include 'include/navbar.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Divisi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="devisi.php">Data Divisi</a></li>
                <li class="breadcrumb-item active">Tambah Divisi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <a href="devisi.php" class="btn btn-primary">Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_divisi" class="form-label">Nama Divisi</label>
                            <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" required>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                    <?php if ($error) : ?>
                        <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php'; ?>
</div>
