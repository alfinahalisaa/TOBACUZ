<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('Password tidak sama');</script>";
        echo "<script>window.location.href='reset.php';</script>";
        exit();
    }

    // Set the password variable to the new password
    $password = $new_password;

    // Check if the email exists in the database
    $check_query = "SELECT * FROM registrasi WHERE email = ?";
    $check_stmt = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($check_stmt, "s", $email);
    mysqli_stmt_execute($check_stmt);
    mysqli_stmt_store_result($check_stmt);
    $num_rows = mysqli_stmt_num_rows($check_stmt);

    // If email doesn't exist, show a pop-up message
    if ($num_rows == 0) {
        echo "<script>alert('Kami tidak dapat menemukan pengguna dengan email ini!');</script>";
        echo "<script>window.location.href='reset.php';</script>";
        exit();
    }

    // Prepare SQL statement to update password
    $query_sql = "UPDATE registrasi SET password = ? WHERE email = ?";
    
    // Prepare and bind parameters
    $stmt = mysqli_prepare($conn, $query_sql);
    mysqli_stmt_bind_param($stmt, "ss", $password, $email);

    // Execute the statement
    if (mysqli_stmt_execute($stmt)) {
        // Close statement
        mysqli_stmt_close($stmt);
        // Close connection
        mysqli_close($conn);
        // Display success message
        echo "<script>alert('Password berhasil direset!');</script>";
        echo "<script>window.location.href='login.php';</script>"; // Redirect to login page
        exit(); // Ensure script execution stops after redirection
    } else {
        echo "Gagal mereset kata sandi: " . mysqli_error($conn);
    }

} else {
    echo "Invalid request method.";
}

// Close connection if an error occurred before
mysqli_close($conn);
?>
