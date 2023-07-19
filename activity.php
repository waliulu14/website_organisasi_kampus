<?php
    include 'navbar.php'
?>


<div class="page-header">
    <h2>KEGIATAN-KEGIATAN PALADA</h2>
    <P></P>
</div>

<?php
require 'include/config.php';

// Fetch gallery activities from the database
$query = "SELECT * FROM gallery";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>
<style>.pro-cont .dev img {
    width: 300px;
    height: 200px;
}
</style>
<div class="divisi" id="dev-p1">
    <div class="pro-cont">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="dev" onclick="window.location.href='activity.php?id=<?php echo $row['id']; ?>';">
                <img src="admin/img/activity/<?php echo $row['foto']; ?>">
                <div class="des">
                    <span><?php echo $row['deskripsi']; ?></span>
                    <h5></h5>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


    
    <div class="baner1" id="dev-p2">
        <h2>HELLO GENK!</h2>
        <h4>PALADA</h4>
    </div>

<?php
    include('footer.php')
?>
    <script src="scrip.js"></script>
</body>
</html>