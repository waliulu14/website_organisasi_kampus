<?php
// edit_divisi.php (halaman untuk mengedit data divisi)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Memeriksa apakah parameter ID divisi telah diberikan melalui URL
if (!isset($_GET['id'])) {
    header("Location: devisi.php");
    exit();
}

// Mendapatkan ID divisi dari parameter URL
$idDivisi = $_GET['id'];

// Query untuk mendapatkan data divisi berdasarkan ID
$query = "SELECT * FROM devisi WHERE id = '$idDivisi'";
$result = mysqli_query($conn, $query);

// Memeriksa apakah terdapat error saat menjalankan query
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Memeriksa apakah data divisi dengan ID yang diberikan ada
if (mysqli_num_rows($result) === 0) {
    header("Location: devisi.php");
    exit();
}

// Mendapatkan data divisi yang akan diedit
$divisi = mysqli_fetch_assoc($result);

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

        // Menghapus gambar lama jika ada
        if (!empty($divisi['gambar'])) {
            unlink("img/devisi/" . $divisi['gambar']);
        }
    } else {
        $gambarName = $divisi['gambar']; // Menggunakan nama gambar yang lama jika tidak ada gambar yang diupload
    }

    // Mengupdate data divisi ke dalam tabel devisi
    $query = "UPDATE devisi SET nama_devisi = '$namaDivisi', deskripsi = '$deskripsi', gambar = '$gambarName' WHERE id = '$idDivisi'";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah data divisi berhasil diupdate
    if ($result) {
        // Mengalihkan pengguna ke halaman data divisi setelah berhasil mengedit divisi
        header("Location: divisi.php");
        exit();
    } else {
        $error = "Gagal mengedit divisi. Silakan coba lagi.";
    }
}

?>

<?php include 'include/navbar.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Divisi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="devisi.php">Data Divisi</a></li>
                <li class="breadcrumb-item active">Edit Divisi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <a href="devisi.php" class="btn btn-primary">Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nama_divisi" class="form-label">Nama Divisi</label>
                            <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" value="<?php echo $divisi['nama_devisi']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4"><?php echo $divisi['deskripsi']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <?php if (!empty($divisi['gambar'])) : ?>
                                <img src="img/devisi/<?php echo $divisi['gambar']; ?>" alt="Gambar Divisi" style="max-width: 200px; height: auto; margin-bottom: 10px;">
                            <?php endif; ?>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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
