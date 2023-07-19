<?php 
    include 'navbar.php';
?>



<?php
require '../include/config.php';

$query = "SELECT * FROM informasi";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>
<style>
    .card-img-top {
        width: 100%;
        height: 200px; /* Sesuaikan tinggi gambar yang diinginkan */
        object-fit: cover;
    }
     h3{
        color: #fff;
    }
</style>


<div id="layoutSidenav_content">
    <main>
        <!-- <div class="container-fluid px-4"> -->
            <div class="page-header">
                <h2>Informasi PALADA</h2>
                <h3>Informasi Terkini PALADA</h3>
            </div>

            <section class="blog">
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <div class="blog-box">
                        <div class="blog-img">
                            <img src="../admin/img/informasi/<?php echo $row['gambar']; ?>">
                        </div>
                        <div class="blog-details">
                            <h4><?php echo $row['judul']; ?></h4>
                            <p><?php echo $row['konten']; ?></p>
                            <a href="<?php echo $row['link']; ?>">Selengkapnya</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </section>

          
        </div>
    </main>

   
</div>


    
    <div class="baner1" id="dev-p2">
        <h2>HELLO GENK!</h2>
        <h4>PALADA</h4>
    </div>

<?php 
    include('footer.php');
?>
    <script src="scrip.js"></script>
</body>
</html>