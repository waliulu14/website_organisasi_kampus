<?php
// edit_pengurus.php (halaman untuk mengedit data pengurus)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Inisialisasi variabel dengan nilai awal kosong
$id = '';
$nama = '';
$angkatan = '';
$foto = '';
$pesan = '';

// Cek apakah parameter ID tersedia
if (isset($_GET['id'])) {
    // Dapatkan ID pengurus dari parameter
    $id = $_GET['id'];

    // Cek apakah form telah disubmit
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validasi dan sanitasi input
        $nama = $_POST['nama'];
        $angkatan = $_POST['angkatan'];

        // Check if a file is uploaded
        if (isset($_FILES['foto']) && $_FILES['foto']['name']) {
            $file = $_FILES['foto'];

            // Set the target directory for storing the file
            $targetDir = 'img/pengurus/';

            // Generate a unique file name to avoid conflicts
            $fileName = uniqid() . '_' . $file['name'];

            // Set the path where the file will be saved
            $targetPath = $targetDir . $fileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                // Delete the old file if it exists
                if ($foto && file_exists($foto)) {
                    unlink($foto);
                }

                // Update the 'foto' column in the database with the new file path
                $query = "UPDATE pengurus SET foto = '$targetPath' WHERE id = $id";
                $result = mysqli_query($conn, $query);

                // Check if the update was successful
                if ($result) {
                    // Redirect back to the pengurus.php page with a success message
                    header("Location: pengurus.php?pesan=Data pengurus berhasil diupdate.");
                    exit();
                } else {
                    // Delete the uploaded file since the update failed
                    unlink($targetPath);

                    // Redirect back to the pengurus.php page with an error message
                    header("Location: pengurus.php?pesan=Terjadi kesalahan. Data pengurus gagal diupdate.");
                    exit();
                }
            } else {
                // Redirect back to the pengurus.php page with an error message
                header("Location: pengurus.php?pesan=Terjadi kesalahan. Gagal mengupload foto.");
                exit();
            }
        } else {
            // Query untuk mengupdate data pengurus berdasarkan ID
            $query = "UPDATE pengurus SET nama = '$nama', angkatan = '$angkatan' WHERE id = $id";
            $result = mysqli_query($conn, $query);

            // Cek apakah pengurus berhasil diupdate
            if ($result) {
                // Redirect kembali ke halaman pengurus.php dengan pesan sukses
                header("Location: pengurus.php?pesan=Data pengurus berhasil diupdate.");
                exit();
            } else {
                // Redirect kembali ke halaman pengurus.php dengan pesan error
                header("Location: pengurus.php?pesan=Terjadi kesalahan. Data pengurus gagal diupdate.");
                exit();
            }
        }
    } else {
        // Query untuk mendapatkan data pengurus berdasarkan ID
        $query = "SELECT * FROM pengurus WHERE id = $id";
        $result = mysqli_query($conn, $query);

        // Cek apakah pengurus dengan ID tersebut ditemukan
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $nama = $row['nama'];
            $angkatan = $row['angkatan'];
            $foto = $row['foto'];
        } else {
            // Redirect kembali ke halaman pengurus.php jika pengurus tidak ditemukan
            header("Location: pengurus.php");
            exit();
        }
    }
} else {
    // Jika parameter ID tidak tersedia, redirect kembali ke halaman pengurus.php
    header("Location: pengurus.php");
    exit();
}
?>

<?php include 'include/navbar.php'?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Data Pengurus</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="pengurus.php">Data Pengurus</a></li>
                    <li class="breadcrumb-item active">Edit Data Pengurus</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user-edit me-1"></i>
                        Edit Data Pengurus
                    </div>
                    <div class="card-body">
                        <?php if ($pesan) : ?>
                            <div class="alert alert-info"><?php echo $pesan; ?></div>
                        <?php endif; ?>
                        <form method="POST" enctype="multipart/form-data" action="edit_pengurus.php?id=<?php echo $id; ?>">
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
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                            <?php if ($foto) : ?>
                                <div class="mb-3">
                                    <label for="currentFoto" class="form-label">Foto Saat Ini</label>
                                    <img src="<?php echo $foto; ?>" alt="Foto Pengurus" style="max-width: 100px; height: auto;">
                                </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>

        <?php include 'include/footer.php'?>
    </div>
