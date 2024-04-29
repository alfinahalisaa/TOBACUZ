<?php
require 'koneksi.php';
$email = $_POST["email"];
$nama = $_POST["nama"];
$username = $_POST["username"];
$password = $_POST["password"];

$query_sql = "INSERT INTO registrasi (email, nama, username, password)
                values ('$email', '$nama', '$username','$password')";

if (mysqli_query($conn, $query_sql)) {
    header("Location: login.php");
} else {
    echo "Pendaftaran Gagal : " . mysqli_error($conn);
}
?>