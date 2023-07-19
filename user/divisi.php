<?php
include 'navbar.php';

// Mendefinisikan nama file XML
$xmlFile = 'data.xml';

// Menginisialisasi objek SimpleXMLElement
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><divisions></divisions>');

include '../include/config.php';

$query = "SELECT * FROM devisi";
$result = mysqli_query($conn, $query);

// Check for query execution error
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

// Loop melalui hasil query dan menambahkan data ke elemen XML
while ($row = mysqli_fetch_assoc($result)) {
    $division = $xml->addChild('division');
    $division->addChild('id', $row['id']); // Menambahkan atribut id
    $division->addChild('nama_divisi', $row['nama_devisi']);
    $division->addChild('deskripsi', $row['deskripsi']);
    $division->addChild('gambar', $row['gambar']); // Menambahkan informasi gambar
}

// Menyimpan data XML ke file
$xml->asXML($xmlFile);

?>

<div class="page-header">
    <h2>Divisi PALADA</h2>
    <P>Pembagian Kegiatan PALADA</P>
</div>

<div class="divisi" id="dev-p1">
    <div class="pro-cont">
        <?php
        // Fetch and display the division data from the XML file
        $xmlData = simplexml_load_file($xmlFile);
        foreach ($xmlData->division as $division) {
            $nama_divisi = (string)$division->nama_divisi;
            $deskripsi = (string)$division->deskripsi;
            $gambar = (string)$division->gambar;
            $divisi_id = (string)$division->id; // Menambahkan definisi $divisi_id

            echo '<div class="dev" onclick="window.location.href=\'divisi-details.php?id=' . $divisi_id . '\';">';
            echo '<img src="../admin/img/devisi/' . $gambar . '">';
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

<?php
include('footer.php');
?>

<script src="scrip.js"></script>
</body>

</html>
