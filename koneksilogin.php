<?php
require 'koneksi.php';

$email = $_POST["email"];
$password = $_POST["password"];
$isAdmin = isset($_POST["admin"]); // Check if admin checkbox is checked

$query_sql = "SELECT * FROM registrasi WHERE email = '$email'";
$result = mysqli_query($conn, $query_sql);

if (!$result) {
    die("Error: " . mysqli_error($conn)); // Display error message if query fails
}

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama = $row["nama"];
    $username = $row["username"];
    $db_password = $row["password"]; // Get the password from the database

    // Check if the entered password matches the password from the database
    if ($password === $db_password) {
        session_start(); // Start the session
        $_SESSION["email"] = $email; // Store email in session variable
        $_SESSION["nama"] = $nama; // Store nama in session variable
        $_SESSION["username"] = $username; // Store username in session variable

        // Check if the user is attempting to log in as an admin
        if ($email === "admin@gmail.com") {
            if ($password === "admin" && $isAdmin) {
                $_SESSION["isAdmin"] = true; // Set session as admin
                header("Location: info.php");
                exit; // Stop execution after redirecting
            } else {
                // Display error message as pop-up and stay on the same page
                echo "<script>alert('Anda bukan admin atau tidak mencentang admin');</script>";
                // Redirect to login.php after showing the alert
                echo "<script>window.location.href='login.php';</script>";
                exit; // Stop execution after displaying pop-up
            }
        } else {
            if ($isAdmin) {
                // Display error message as pop-up and stay on the same page
                echo "<script>alert('Anda bukan admin');</script>";
                // Redirect to login.php after showing the alert
                echo "<script>window.location.href='login.php';</script>";
                exit; // Stop execution after displaying pop-up
            } else {
                header("Location: infopetani.php");
                exit; // Stop execution after redirecting
            }
        }
    } else {
        // Display error message as pop-up and stay on the same page
        echo "<script>alert('Email atau password salah, mohon periksa kembali');</script>";
        // Redirect to login.php after showing the alert
        echo "<script>window.location.href='login.php';</script>";
        exit; // Stop execution after displaying pop-up
    }
} else {
    // Display error message as pop-up and stay on the same page
    echo "<script>alert('Email atau password salah, mohon periksa kembali');</script>";
    // Redirect to login.php after showing the alert
    echo "<script>window.location.href='login.php';</script>";
    exit; // Stop execution after displaying pop-up
}
?>
