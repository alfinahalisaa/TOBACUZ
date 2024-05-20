<?php
require 'koneksi.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $jenis = $_POST["jenis"];
    $harga = $_POST["harga"];
    $tanggal = $_POST["tanggal"];

    // Prepare SQL statement
    $query_sql = "INSERT INTO tambahdata (jenis, harga, tanggal) VALUES (?, ?, ?)";
    
    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $query_sql);
    mysqli_stmt_bind_param($stmt, "sss", $jenis, $harga, $tanggal);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Close statement
        mysqli_stmt_close($stmt);
        // Close connection
        mysqli_close($conn);
        // Display pop-up message using JavaScript
        echo "<script>alert('Data berhasil disimpan!');</script>";
        // Redirect to tambahdata.php after showing the alert
        echo "<script>window.location.href='prediksiadmin.php';</script>";
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Gagal Tambah Data : " . mysqli_error($conn);
    }
}

// Close connection if an error occurred before
mysqli_close($conn);
?>
