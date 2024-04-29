<?php
require 'koneksi.php';
$jenis = $_POST["jenis"];
$harga = $_POST["harga"];
$tanggal = $_POST["tanggal"];

$query_sql = "INSERT INTO tambahdata (jenis, harga, tanggal)
                values ('$jenis', '$harga', '$tanggal')";

if (mysqli_query($conn, $query_sql)) {
    echo "Data berhasil ditambahkan!";
    header("Location: tambahdata.php");
} else {
    echo "Gagal Tambah Data : " . mysqli_error($conn);
}
?>
