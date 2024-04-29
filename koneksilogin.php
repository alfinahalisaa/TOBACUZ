<?php
require 'koneksi.php';
$email = $_POST["email"];
$password = $_POST["password"];
$isAdmin = isset($_POST["admin"]); // Periksa apakah admin di-centang

$query_sql = "SELECT * FROM registrasi
              WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $query_sql);

if (!$result) {
    die("Error: " . mysqli_error($conn)); // Tampilkan pesan error jika query gagal
}

if (mysqli_num_rows($result) > 0) {
    if ($isAdmin) {
        header("Location: info.php");
    } else {
        header("Location: infopetani.php");
    }
    exit; // Hentikan eksekusi setelah mengalihkan
} else {
    // Tampilkan pesan kesalahan sebagai pop-up dan alihkan kembali ke halaman login
    echo "<script>alert('Email atau Password Anda salah.');</script>";
    header("Location: login.php");
}
?>
