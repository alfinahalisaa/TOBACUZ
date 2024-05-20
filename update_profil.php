<?php
require 'koneksi.php';

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "db_users";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and update user information in the database
    $newUsername = $_POST["username"];
    $newEmail = $_POST["email"];
    $newNama = $_POST["nama"];

    // SQL to update user information
    $sql = "UPDATE registrasi SET username='$newUsername', email='$newEmail', nama='$newNama' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        // Update session variables with new information
        $_SESSION["username"] = $newUsername;
        $_SESSION["email"] = $newEmail;
        $_SESSION["nama"] = $newNama;
        
        // Redirect to profileadmin.php or display a success message
        header("Location: profileadmin.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
