<?php
// Misalnya, pada halaman prediksi.php
session_start();

// Cek apakah pengguna adalah admin atau bukan
if(isset($_SESSION['username']) && ($_SESSION['isAdmin']) && $_SESSION['isAdmin'] === true) {
    $username = $_SESSION['username'];
} else {
    // Lakukan tindakan untuk pengguna biasa atau arahkan ke halaman lain
    // Contoh:
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOBACUZ</title>
    <link rel="stylesheet" href="css/prediksiadmin.css">
</head>
<body>
    <header>
        <div class="header-container">
            <img src="asset/logo.png" alt="TOBACUZ Logo" class="logo">
            <span class="logo-text">TOBACUZ</span>
            <nav>
                <ul class="nav-menu">
                    <li><a href="info.php">Info Tembakau</a></li>
                    <li><a href="prediksiadmin.php" class = "active">Prediksi</a></li>
                    <li><a href="statistik.php">Statistik</a></li>
                </ul>
            </nav>
            <a href="profileadmin.php">
                <img src="asset/profile.jpg" alt="Profile Picture" class="profile-picture">
            </a>
        </div>
    </header>
    <main>
        <div class="main-content">
            <div class="flex">
                <div class="left">
                    <h2>Hallo Alfina!</h2>
                    <p>Jangan Lupa Update Informasi, ya!</p>
                    <h3>Harga Jenis Tembakau</h3>
                </div>
                <div class="right">
                    <button class="add-data-button" onclick="window.location.href='tambahdata.php';">Tambah Data</button>
                </div>
            </div>
            <div class="card-container">
                <div class="card">
                    <h4>Tembakau Virginia</h4>
                    <p class="button" onclick=redirectToPredictionPage() >Lihat Hasil Prediksi</p>
                    <h4>Klik untuk lihat prediksi</h4>
                </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-container">
            <p class="footer-text">&copy; 2024 TOBACUZ. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
    function redirectToPredictionPage() {
        // Mengarahkan pengguna ke halaman hasil prediksi
        window.location.href = "hasilvirginia.php";
    }
    </script>
</body>
</html>
