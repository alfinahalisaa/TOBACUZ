<?php
require 'koneksi.php';

$jenis = $_GET['jenis'];

$sql = "SELECT informasi FROM informasi WHERE jenis = '$jenis'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['informasi'];
} else {
    echo "Informasi tidak tersedia untuk jenis tembakau ini.";
}
?>
