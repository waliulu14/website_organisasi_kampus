<?php include 'auth.php'; ?>
<?php include 'navbar.php'; ?>
<?php
include '../include/config.php';

$query = "SELECT * FROM devisi";
$result = mysqli_query($conn, $query);

// Check for query execution error
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Fetch the data and store it in the $divisi variable
$divisi = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="baner">
    <h1>PALADA</h1>
    <h2>Pencinta Alam UKRIDA</h2>
    <h3>Diresmikan pada tanggal 26 Januari 1991</h3>
</div>

<div class="divisi" id="dev-p1">
    <h2>Divisi PALADA</h2>
    <h3>Pembagian Kegiatan PALADA</h3>
    <div class="pro-cont">
        <?php foreach ($divisi as $row) : ?>
            <div class="dev">
                <img src="../admin/img/devisi/<?php echo $row['gambar']; ?>">
                <div class="des">
                    <span><?php echo $row['nama_devisi']; ?></span>
                    <h5><?php echo $row['deskripsi']; ?></h5>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<div class="baner1" id="dev-p2">
    <h2>HELLO GENK!</h2>
    <h4>PALADA</h4>
</div>

<?php include 'footer.php'; ?>
<script src="scrip.js"></script>
</body>
</html>
