<?php
// pendaftaran_anggota.php (halaman untuk menampilkan data pendaftaran anggota)
require '../include/config.php'; // Mengimpor konfigurasi dari file config.php

// Ambil data pendaftaran anggota dari tabel regis_anggota_organisasi dan devisi
$query = "SELECT ra.id, ra.nama, ra.nim, ra.jurusan, ra.angkatan, d.id AS id_devisi, d.nama_devisi, ra.foto, ra.keterangan FROM regis_anggota_organisasi ra INNER JOIN devisi d ON ra.id_devisi = d.id";
$result = mysqli_query($conn, $query);

// Error handling
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

?>

<?php include 'include/navbar.php'?>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Pendaftaran Anggota</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Pendaftaran Anggota</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Data Pendaftaran Anggota
                    </div>
                    <div class="card-body">
                        <?php if (mysqli_num_rows($result) > 0) : ?>
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIM</th>
                                        <th>Jurusan</th>
                                        <th>Angkatan</th>
                                        <th>Nama Devisi</th>
                                        <th>Foto</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['nama']; ?></td>
                                            <td><?php echo $row['nim']; ?></td>
                                            <td><?php echo $row['jurusan']; ?></td>
                                            <td><?php echo $row['angkatan']; ?></td>
                                            <td><?php echo $row['nama_devisi']; ?></td>
                                            <td><img src="../user/uploads/<?php echo $row['foto']; ?>" alt="Foto" width="100"></td>
                                            <td><?php echo $row['keterangan']; ?></td>
                                            <td>
                                                
                                                <a href="hapus_pendaftaran.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        <?php else : ?>
                            <p>Tidak ada data pendaftaran anggota.</p>
                        <?php endif; ?>
                   </div>
                </div>
            </div>
        </main>

        <?php include 'include/footer.php'?>
    </div>
