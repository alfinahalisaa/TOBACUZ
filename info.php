<?php
require 'koneksi.php';
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
    <link rel="stylesheet" href="css/info.css">
    <style>
        /* Style untuk card */
        .card {
            width: 100%;
            background-color: #FBBC04;
            padding: 20px;
            margin-bottom: 20px;
        }

        /* Style untuk tombol */
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        /* Style untuk card informasi */
        .info-card {
        width: 100%;
        background-color: #FBBC04;
        padding: 20px;
        margin-bottom: 20px;
        overflow-y: scroll; /* Tambahkan overflow-y: scroll; untuk dapat discroll */
        max-height: 300px; /* Atur ketinggian maksimum */
        color: #0A2A19;
        }

        .right .add-data-button {
            color: #0A2A19;
        }

        h4 {
            color: #0A2A19;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <img src="asset/logo.png" alt="TOBACUZ Logo" class="logo">
            <span class="logo-text">TOBACUZ</span>
            <nav>
                <ul class="nav-menu">
                    <li><a href="info.php" class="active">Info Tembakau</a></li>
                    <li><a href="prediksiadmin.php">Prediksi</a></li>
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
                    <h2>Hallo Admin</h2>
                    <p>Jangan Lupa Update Informasi, ya!</p>
                </div>
                <div class="right">
                    <button class="add-data-button" onclick="window.location.href='tambahinformasi.php';">Tambah Informasi</button>
                </div>
            </div>
            <!-- Card Informasi -->
            <div class="card-container" id="informasi">
                <div class="info-card" id="informasi_besuki" style="display:none;">
                </div>
                <div class="info-card" id="informasi_deli" style="display:none;">
                </div>
                <div class="info-card" id="informasi_virginia" style="display:none;">
                </div>
                <div class="info-card" id="informasi_temanggung" style="display:none;">
                </div>
                <div class="info-card" id="informasi_garut" style="display:none;">
                </div>
                <div class="info-card" id="informasi_madura" style="display:none;">
                </div>
            </div>
            <!-- Card Tembakau -->
            <div class="card-container">
                <div class="card" id="besuki">
                    <h4>Tembakau Besuki</h4>
                    <p class="button" onclick="showInfo('besuki')">Lihat Informasi</p>
                </div>
                <div class="card" id="deli">
                    <h4>Tembakau Deli</h4>
                    <p class="button" onclick="showInfo('deli')">Lihat Informasi</p>
                </div>
                <div class="card" id="virginia">
                    <h4>Tembakau Virginia</h4>
                    <p class="button" onclick="showInfo('virginia')">Lihat Informasi</p>
                </div>
                <div class="card" id="temanggung">
                    <h4>Tembakau Temanggung</h4>
                    <p class="button" onclick="showInfo('temanggung')">Lihat Informasi</p>
                </div>
                <div class="card" id="garut">
                    <h4>Tembakau Garut</h4>
                    <p class="button" onclick="showInfo('garut')">Lihat Informasi</p>
                </div>
                <div class="card" id="madura">
                    <h4>Tembakau Madura</h4>
                    <p class="button" onclick="showInfo('madura')">Lihat Informasi</p>
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
        function getInformasi(jenis) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var infoCardToShow = document.getElementById("informasi_" + jenis);
                    infoCardToShow.innerHTML = this.responseText;
                    infoCardToShow.style.display = "block";
                }
            };
            xhttp.open("GET", "get_informasi.php?jenis=" + jenis, true);
            xhttp.send();
        }

        function showInfo(cardId) {
            var allInfoCards = document.querySelectorAll("#informasi .info-card");
            allInfoCards.forEach(function(card) {
                card.style.display = "none";
            });

            getInformasi(cardId);
        }
        function showWelcomeMessage(username) {
            alert("Selamat datang " + username + "!");
        }

        // Panggil fungsi showWelcomeMessage saat halaman dimuat
        showWelcomeMessage("<?php echo $username; ?>");
    </script>
</body>
</html>
