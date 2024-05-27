<?php
// Mulai sesi
session_start();

// Cek apakah nama pengguna sudah diset dalam sesi
if(isset($_SESSION['username'])) {
    // Jika ya, simpan nama pengguna dalam variabel
    $username = $_SESSION['username'];
} else {
    // Jika tidak, arahkan pengguna kembali ke halaman login atau tampilkan pesan lainnya
    header("Location: login.php");
    exit; // Pastikan untuk menghentikan eksekusi skrip selanjutnya setelah melakukan redirect
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOBACUZ</title>
    <link rel="stylesheet" href="css/prediksipetani.css">
</head>
<style>
    .card-container{
        color: #0A2A19;
    }
</style>
<body>
    <header>
        <div class="header-container">
            <img src="asset/logo.png" alt="TOBACUZ Logo" class="logo">
            <span class="logo-text">TOBACUZ</span>
            <nav>
                <ul class="nav-menu">
                    <li><a href="infopetani.php">Info Tembakau</a></li>
                    <li><a href="prediksipetani.php" class="active" >Prediksi</a></li>
                    <li><a href="statistikpetani.php">Statistik</a></li>
                </ul>
            </nav>
            <a href="profilepetani.php">
                <img src="asset/profile.jpg" alt="Profile Picture" class="profile-picture">
            </a>
        </div>
    </header>
    <main>
        <div class="main-content">
            <div class="flex">
                <div class="left">
                    <h2>Hallo Petani!</h2>
                    <p>Jangan Lupa Update Informasi, ya!</p>
                    <h3>Harga Jenis Tembakau</h3>
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
    </main>
    <footer>
        <div class="footer-container">
            <p class="footer-text">&copy; 2024 TOBACUZ. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
    function redirectToPredictionPage() {
        // Mengarahkan pengguna ke halaman hasil prediksi
        window.location.href = "hasilpetani.php";
    }
    </script>
</body>
</html>
