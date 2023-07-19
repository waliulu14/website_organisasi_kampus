<?php
require '../include/config.php';

$query = "SELECT * FROM pengurus";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<?php include 'navbar.php'; ?>

<style>
    .card-img-top {
        width: 100%;
        height: 200px; /* Sesuaikan tinggi gambar yang diinginkan */
        object-fit: cover;
    }
</style>

<div class="page-header">
    <h2>Pengurus PALADA</h2>
    <p>Badan Pengurus PALADA</p>
</div>

<div class="divisi" id="dev-p1">
    <div class="pro-cont">
        <?php
        // Fetch and display the division data from the database
        while ($row = mysqli_fetch_assoc($result)) {
            $nama_divisi = $row['nama'];
            $deskripsi = $row ['angkatan'];
            $gambar = '../admin/' . $row['foto']; // Tambahkan 'admin/' sebelum nama gambar
            $divisi_id = $row['id'];

            echo '<div class="dev">';
            echo '<img src="' . $gambar . '" class="card-img-top" alt="Foto Pengurus">';
            echo '<div class="des">';
            echo '<span>' . $nama_divisi . '</span>';
            echo '<h5>' . $deskripsi . '</h5>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>

<div class="baner1" id="dev-p2">
    <h2>HELLO GENK!</h2>
    <h4>PALADA</h4>
</div>

<?php include('footer.php'); ?>

<script src="scrip.js"></script>
</body>
</html>
