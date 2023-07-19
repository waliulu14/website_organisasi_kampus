<?php
// datauser.php (halaman untuk menampilkan data pengguna)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Ambil data pengguna dari tabel mahasiswa
$query = "SELECT * FROM mahasiswa";
$result = mysqli_query($conn, $query);
?>

<?php include 'include/navbar.php'?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Pengguna</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Pengguna</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Pengguna
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Login</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. Telpon</th>
                                    <th>Jurusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['id_login']; ?></td>
                                        <td><?php echo $row['nama']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['no_telpon']; ?></td>
                                        <td><?php echo $row['jurusan']; ?></td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <?php include 'include/footer.php'?>
    </div>