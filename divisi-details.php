<?php
include 'include/config.php';

// Check if the division ID is provided in the URL
if (isset($_GET['id'])) {
    $divisionId = $_GET['id'];

    // Query to fetch the division details based on the ID
    $query = "SELECT * FROM devisi WHERE id = '$divisionId'";
    $result = mysqli_query($conn, $query);

    // Check for query execution error
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    // Fetch the division data
    $row = mysqli_fetch_assoc($result);

    // Check if division exists
    if ($row) {
        $nama_devisi = $row['nama_devisi'];
        $deskripsi = $row['deskripsi'];
        $gambar = $row['gambar'];

        // Create XML structure
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><division></division>');
        $xml->addChild('nama_devisi', $nama_devisi);
        $xml->addChild('deskripsi', $deskripsi);
        $xml->addChild('gambar', $gambar);

        // Save XML to file
        $xmlFile = 'division-data.xml';
        $xml->asXML($xmlFile);
    } else {
        // Division not found, redirect to a different page or show an error message
        header("Location: division-not-found.php");
        exit();
    }
} else {
    // Division ID not provided, redirect to a different page or show an error message
    header("Location: division-not-found.php");
    exit();
}
?>

<?php include 'navbar.php'; ?>

<div class="page-header">
    <h2>Divisi PALADA</h2>
    <P><?php echo $nama_devisi; ?></P>
</div>

<div class="prodetails" id="section-p1">
    <div class="single-pro-images">
        <img src="admin/img/devisi/<?php echo $gambar; ?>" width="100%" id="MainImg">
        <div class="small-img-group">
            <!-- Additional images if needed -->
        </div>
    </div>

    <div class="signle-pro-details">
        <h6>Home/Palada</h6>
        <h4><?php echo $nama_devisi; ?></h4>

        <span><?php echo $deskripsi; ?></span>
    </div>
</div>

<?php 
    include('footer.php');
?>

<script src="scrip.js"></script>
</body>
</html>
