<?php
// add_pengurus.php (halaman untuk menambahkan data pengurus)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Inisialisasi variabel dengan nilai awal kosong
$nama = '';
$angkatan = '';
$pesan = '';

// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi dan sanitasi input
    $nama = $_POST['nama'];
    $angkatan = $_POST['angkatan'];

    // Periksa apakah file foto diunggah dengan sukses
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        // Tentukan direktori tempat menyimpan file foto
        $targetDir = "img/pengurus/";
        $targetFile = $targetDir . basename($_FILES['foto']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Cek apakah file adalah gambar
        $check = getimagesize($_FILES['foto']['tmp_name']);
        if ($check !== false) {
            // Tentukan ukuran file maksimum
            $maxFileSize = 2 * 1024 * 1024; // 2MB

            // Cek ukuran file
            if ($_FILES['foto']['size'] <= $maxFileSize) {
                // Cek jenis file gambar yang diizinkan
                if ($imageFileType === 'jpg' || $imageFileType === 'jpeg' || $imageFileType === 'png') {
                    // Pindahkan file foto ke direktori tujuan
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $targetFile)) {
                        // Query untuk menambahkan data pengurus ke tabel pengurus
                        $query = "INSERT INTO pengurus (nama, angkatan, foto) VALUES ('$nama', '$angkatan', '$targetFile')";
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            $pesan = "Data pengurus berhasil ditambahkan.";
                            $nama = '';
                            $angkatan = '';
                        } else {
                            $pesan = "Terjadi kesalahan. Data pengurus gagal ditambahkan.";
                        }
                    } else {
                        $pesan = "Terjadi kesalahan saat mengunggah file foto.";
                    }
                } else {
                    $pesan = "Jenis file foto yang diunggah tidak diizinkan. Harap unggah file dengan format JPG, JPEG, atau PNG.";
                }
            } else {
                $pesan = "Ukuran file foto melebihi batas maksimum. Harap unggah file dengan ukuran maksimal 2MB.";
            }
        } else {
            $pesan = "File yang diunggah bukan merupakan file gambar. Harap unggah file dengan format JPG, JPEG, atau PNG.";
        }
    } else {
        $pesan = "Terjadi kesalahan saat mengunggah file foto.";
    }
}
?>

<?php include 'include/navbar.php'?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Pengurus</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tambah Data Pengurus</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user-plus me-1"></i>
                        Tambah Data Pengurus
                    </div>
                    <div class="card-body">
                        <?php if ($pesan) : ?>
                            <div class="alert alert-info"><?php echo $pesan; ?></div>
                        <?php endif; ?>
                        <form method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="angkatan" class="form-label">Angkatan</label>
                                <input type="text" class="form-control" id="angkatan" name="angkatan" value="<?php echo $angkatan; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php include 'include/footer.php'?>
    </div>
