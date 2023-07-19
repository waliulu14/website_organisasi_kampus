<?php
require '../include/config.php';

$query = "SELECT * FROM blog";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<?php include 'include/navbar.php'; ?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Blog</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Blog</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Blog
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <a href="add_blog.php" class="btn btn-primary">Tambah Data Blog</a>
                    </div>
                    <?php if (mysqli_num_rows($result) > 0) : ?>
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Konten</th>
                                    <th>Gambar</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><?php echo $row['konten']; ?></td>
                                        <td><img src="img/blog/<?php echo $row['gambar']; ?>" alt="Gambar Blog" style="max-width: 100px; height: auto;"></td>
                                        <td><a href="<?php echo $row['link']; ?>" target="_blank"><?php echo $row['link']; ?></a></td>
                                        <td>
                                            <a href="edit_blog.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                            <a href="delete_blog.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <p>Tidak ada data blog.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>

    <?php include 'include/footer.php'; ?>
</div>
