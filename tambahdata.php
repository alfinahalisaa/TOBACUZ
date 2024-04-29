<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOBACUZ</title>
    <link rel="stylesheet" href="css/tambahdata.css">
    <style>
        /* CSS untuk alert */
        #alertBackground {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5); /* Latar belakang transparan */
            z-index: 1000; /* Meletakkan alert di atas konten lain */
        }

        #alertBox {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1001; /* Meletakkan alert di atas latar belakang */
            color: black; /* Warna teks hitam */
        }

        #alertButton {
            text-align: center;
            margin-top: 20px;
        }

        #alertButton button {
            margin: 0 10px;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        #alertButton button.ya {
            background-color: #f44336;
            color: white;
        }

        #alertButton button.tidak {
            background-color: #d9f310;
            color: white;
        }

        /* CSS untuk pop-up data tersimpan */
        #savedDataPopup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1001; /* Meletakkan pop-up di atas latar belakang */
            color: black; /* Warna teks hitam */
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
                    <li><a href="info.php">Informasi Harga</a></li>
                    <li><a href="prediksiadmin.php" class="active">Prediksi</a></li>
                    <li><a href="statistik.php">Statistik</a></li>
                </ul>
            </nav>
            <a href="profileadmin.php">
                <img src="asset/profile.jpg" alt="Profile Picture" class="profile-picture">
            </a>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Hallo Alfina!</h2>
            <p>Jangan Lupa Update Informasi, ya!</p>
            <form action="koneksitambahdata.php" method="POST">
            <div class="form-group">
                <label for="jenis">Jenis Tembakau</label>
                <input type="text" id="jenis" placeholder="Tambahkan jenis tembakau disini">
            </div>
            <div class="form-group">
                <label for="harga">Harga Tembakau</label>
                <input type="text" id="harga" placeholder="Tambahkan harga tembakau disini">
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal DD/MM/YY</label>
                <input type="date" id="tanggal">
            </div>
            <button class="btn-tambah" onclick="tambahData()">Tambah Data</button>
            <button class="btn-kembali" onclick="showAlert()">Kembali</button>
        </div>
    </main>
    <footer>
        <div class="footer-container">
            <p class="footer-text">&copy; 2024 TOBACUZ. All Rights Reserved.</p>
        </div>
    </footer>
    <div id="alertBackground"></div>
    <div id="alertBox">
        <div id="alertMessage">Apakah Anda yakin ingin menghapus data?</div>
        <div id="alertButton">
            <button class="ya" onclick="hapusData()">Ya</button>
            <button class="tidak" onclick="closeAlert()">Tidak</button>
        </div>
    </div>
    <div id="savedDataPopup">
        Data berhasil disimpan!
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Mendapatkan elemen input tanggal
            var tanggalInput = document.getElementById("tanggal");

            // Mendapatkan tanggal saat ini
            var currentDate = new Date();

            // Format tanggal dengan YYYY-MM-DD
            var formattedDate = currentDate.toISOString().split('T')[0];

            // Menetapkan nilai input tanggal ke tanggal saat ini
            tanggalInput.value = formattedDate;
        });

        function showAlert() {
            var alertBackground = document.getElementById("alertBackground");
            var alertBox = document.getElementById("alertBox");

            alertBackground.style.display = "block";
            alertBox.style.display = "block";
        }

        function closeAlert() {
            var alertBackground = document.getElementById("alertBackground");
            var alertBox = document.getElementById("alertBox");

            alertBackground.style.display = "none";
            alertBox.style.display = "none";
        }

        function hapusData() {
            // Kode untuk menghapus data (jika diperlukan)

            // Langsung kembali ke halaman prediksi
            window.location.href = "prediksiadmin.php";

            // Menutup alert
            closeAlert();
        }

        function tambahData() {
            // Kode untuk menambahkan data (sesuai kebutuhan)

            // Menampilkan pop-up data tersimpan
            var savedDataPopup = document.getElementById("savedDataPopup");
            savedDataPopup.style.display = "block";

            // Menutup pop-up setelah beberapa detik (misalnya 3 detik)
            setTimeout(function() {
                savedDataPopup.style.display = "none";
            }, 1000);
        }
    </script>
</body>
</html>
