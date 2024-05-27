<?php
session_start();
session_unset(); // Hapus semua variabel session
session_destroy(); // Hapus session
header("Location: login.php"); // Arahkan ke halaman login setelah logout
exit;
?>
