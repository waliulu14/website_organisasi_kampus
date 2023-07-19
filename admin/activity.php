<?php
require '../include/config.php';

$query = "SELECT * FROM gallery";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<?php include 'include/navbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Aktivitas</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Aktivitas</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Aktivitas
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="add_activity.php" class="btn btn-primary">Tambah Data Aktivitas</a>
                    </div>
                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Foto</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><img src="img/activity/<?php echo $row['foto']; ?>" alt="Foto Aktivitas" style="max-width: 100px; height: auto;"></td>
                                        <td><?php echo $row['deskripsi']; ?></td>
                                        <td>
                                            
                                            <a href="delete_activity.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Tidak ada data aktivitas.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php'; ?>
</div>
