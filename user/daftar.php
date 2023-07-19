<?php
session_start(); // Mulai session

require '../include/config.php'; // Include the file that contains database connection code

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    // Jika pengguna belum login, redirect ke halaman login
    header("Location: ../login.php");
    exit();
}

$queryDevisi = "SELECT * FROM devisi";
$resultDevisi = mysqli_query($conn, $queryDevisi);

// Periksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Tangkap data dari form
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $angkatan = $_POST['angkatan'];
    $id_devisi = $_POST['id_devisi'];
    $keterangan = $_POST['keterangan'];

    // Dapatkan id_mahasiswa dari session
    $id_mahasiswa = $_SESSION['user_id'];

    // Periksa apakah ada file yang diunggah
    if(isset($_FILES['foto'])){
        $file_name = $_FILES['foto']['name'];
        $file_size = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $file_type = $_FILES['foto']['type'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $extensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $extensions) === false) {
            $error_message = "Ekstensi file yang diunggah tidak diperbolehkan. Harap unggah file dengan ekstensi JPEG, JPG, atau PNG.";
        }

        if ($file_size > 2097152) {
            $error_message = "Ukuran file tidak boleh lebih dari 2MB";
        }

        if (empty($error_message) === true) {
            // Pindahkan file yang diunggah ke direktori yang ditentukan
            move_uploaded_file($file_tmp, "uploads/" . $file_name);

            // Query untuk memasukkan data ke dalam tabel
            $query = "INSERT INTO regis_anggota_organisasi (id_mahasiswa, nama, nim, jurusan, angkatan, id_devisi, foto, keterangan) VALUES ('$id_mahasiswa', '$nama', '$nim', '$jurusan', '$angkatan', '$id_devisi', '$file_name', '$keterangan')";

            // Eksekusi query
            if (mysqli_query($conn, $query)) {
                $success_message = "Anggota berhasil ditambahkan!";
            } else {
                $error_message = "Terjadi kesalahan: " . mysqli_error($conn);
            }
        }
    } else {
        $error_message = "Tidak ada file yang diunggah.";
    }
}
?>

<?php include 'navbar.php'; ?>

<div class="container">
    <h1>Daftar Anggota Organisasi</h1>

    <?php if (isset($success_message)) : ?>
    <div class="alert alert-success" role="alert"><?php echo $success_message; ?></div>
<?php endif; ?>

<?php if (isset($error_message)) : ?>
    <div class="alert alert-danger" role="alert"><?php echo $error_message; ?></div>
<?php endif; ?>

<form method="POST" action="" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
    </div>
    <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" required>
    </div>
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
    </div>
    <div class="mb-3">
        <label for="angkatan" class="form-label">Angkatan</label>
        <input type="text" class="form-control" id="angkatan" name="angkatan" required>
    </div>
    <div class="mb-3">
        <label for="id_devisi" class="form-label">Devisi</label>
        <select class="form-control" id="id_devisi" name="id_devisi" required>
            <?php while ($rowDevisi = mysqli_fetch_assoc($resultDevisi)) : ?>
                <option value="<?php echo $rowDevisi['id']; ?>"><?php echo $rowDevisi['nama_devisi']; ?></option>
            <?php endwhile; ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="foto" class="form-label">Foto</label>
        <input type="file" class="form-control" id="foto" name="foto" required>
    </div>
    <div class="mb-3">
        <label for="keterangan" class="form-label">Alasan Masuk Palada</label>
        <textarea class="form-control" id="keterangan" name="keterangan" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
</div>
<br>
<br>
<br>
<br>

<?php include 'footer.php'; ?>
<script src="scrip.js"></script>
</body>
</html>
