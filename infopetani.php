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
                    <li><a href="infopetani.php" class="active">Info Tembakau</a></li>
                    <li><a href="prediksipetani.php">Prediksi</a></li>
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
                </div>
            </div>
            <div class="card-container" id="informasi">
                <div class="info-card" id="informasi_besuki" style="display:none;">
                    <h4>Informasi Tembakau Besuki Voor-Oogst</h4>
                    <p>Ini adalah informasi tentang Tembakau Besuki Voor-Oogst: <?php echo $informasi; ?></p>
                </div>
                <div class="info-card" id="informasi_deli" style="display:none;">
                    <h4>Informasi Tembakau Deli</h4>
                    <p>Ini adalah informasi tentang Tembakau Deli.</p>
                </div>
                <div class="info-card" id="informasi_virginia" style="display:none;">
                    <h4>Informasi Tembakau Virginia-Vorstenlanden</h4>
                    <p>Ini adalah informasi tentang Tembakau Virginia-Vorstenlanden.</p>
                </div>
                <div class="info-card" id="informasi_srintil_temanggung" style="display:none;">
                    <h4>Informasi Tembakau Srintil-Temanggung</h4>
                    <p>Ini adalah informasi tentang Tembakau Srintil-Temanggung.</p>
                </div>
                <div class="info-card" id="informasi_garut" style="display:none;">
                    <h4>Informasi Tembakau Garut</h4>
                    <p>Ini adalah informasi tentang Tembakau Garut.</p>
                </div>
                <div class="info-card" id="informasi_madura" style="display:none;">
                    <h4>Informasi Tembakau Madura</h4>
                    <p>Ini adalah informasi tentang Tembakau Madura.</p>
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
                <div class="card" id="srintil_temanggung">
                    <h4>Tembakau Srintil-Temanggung</h4>
                    <p class="button" onclick="showInfo('srintil_temanggung')">Lihat Informasi</p>
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
        function showInfo(cardId) {
            // Semua card informasi tembakau disembunyikan
            var allInfoCards = document.querySelectorAll("#informasi .info-card");
            allInfoCards.forEach(function(card) {
                card.style.display = "none";
            });

            // Card informasi yang sesuai dengan card yang ditekan ditampilkan
            var infoCardToShow = document.getElementById("informasi_" + cardId);
            infoCardToShow.style.display = "block";
        }

        // Fungsi untuk menampilkan pesan selamat datang
        function showWelcomeMessage(username) {
            alert("Selamat datang " + username + "!");
        }

        // Panggil fungsi showWelcomeMessage saat halaman dimuat
        showWelcomeMessage("<?php echo $username; ?>");
    </script>
</body>
</html>
