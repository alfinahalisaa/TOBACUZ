<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if email already exists
    $check_query = "SELECT * FROM registrasi WHERE email = '$email'";
    $result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email already exists. Please use a different email address');</script>";
        echo "<script>window.location.href='regist.php';</script>";
        exit();
    }

    // Prepare SQL statement to insert new registration
    $query_sql = "INSERT INTO registrasi (email, nama, username, password)
                VALUES ('$email', '$nama', '$username', '$password')";

    if (mysqli_query($conn, $query_sql)) {
        header("Location: login.php");
    } else {
        echo "Pendaftaran Gagal : " . mysqli_error($conn);
    }
} else {
    echo "Invalid request method.";
}

// Close connection if an error occurred before
mysqli_close($conn);
?>
