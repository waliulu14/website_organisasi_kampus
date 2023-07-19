<?php
// devisi.php (halaman untuk menampilkan data divisi)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Query untuk mendapatkan semua data divisi
$query = "SELECT * FROM devisi";
$result = mysqli_query($conn, $query);

// Memeriksa apakah terdapat error saat menjalankan query
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Mengecek apakah ada data divisi yang ditemukan
if (mysqli_num_rows($result) > 0) {
    $divisi = mysqli_fetch_all($result, MYSQLI_ASSOC);
} else {
    $divisi = []; // Inisialisasi array kosong jika tidak ada data
}
?>

<?php include 'include/navbar.php'; ?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Divisi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Divisi</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <a href="tambah_divisi.php" class="btn btn-primary">Tambah Divisi</a>
                </div>
                <div class="card-body">
                    <?php if (!empty($divisi)) : ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Divisi</th>
                                        <th>Deskripsi</th>
                                        <th>Gambar</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($divisi as $row) : ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['nama_devisi']; ?></td>
                                            <td><?php echo $row['deskripsi']; ?></td>
                                            <td>
                                                <?php if (!empty($row['gambar'])) : ?>
                                                    <img src="img/devisi/<?php echo $row['gambar']; ?>" alt="Gambar Divisi" style="max-width: 100px; height: auto;">
                                                <?php else : ?>
                                                    <span>Tidak ada gambar</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="edit_divisi.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                <a href="hapus_divisi.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else : ?>
                        <div class="alert alert-info">Tidak ada data divisi yang tersedia.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php'; ?>
</div>
