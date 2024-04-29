<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOBACUZ</title>
    <link rel="stylesheet" href="css/profileadmin.css">
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
                    <li><a href="prediksiadmin.php" class = "active">Prediksi</a></li>
                    <li><a href="statistik.php">Statistik</a></li>
                </ul>
            </nav>
            <a href="profileadmin.php">
                <img src="asset/profile.jpg" alt="Profile Picture" class="profile-picture">
            </a>
        </div>
    </header>
    <main class="main">
        <div class="profile">
            <h2>Hallo Alfina!</h2>
            <p>Senang bisa mengenalmu!</p>
            <div class="user-details">
                <div class="detail">
                    <div class="card">
                        <label class="label">Username</label>
                        <input type="text" id="username" class="value card" value="Alfina Halisa Firdhaus" disabled>
                    </div>
                </div>
                <div class="detail">
                    <div class="card">
                        <label class="label">Email</label>
                        <input type="email" id="email" class="value card" value="Alfinahalisa19@gmail.com" disabled>
                    </div>
                </div>
                <div class="detail">
                    <div class="card">
                        <label class="label">Bio</label>
                        <textarea id="bio" class="value card" disabled>Aku adalah salah satu admin dari website ini, senang mengenal kalian semua!</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <button class="edit-profile" onclick="editProfile()">Edit Profile</button>
            <button class="save-profile" onclick="saveProfile()" style="display: none;">Simpan</button>
            <button class="logout" onclick="showAlert()">Logout</button>
        </div>
    </main>
    <footer class="footer">
        <div class="footer-content">
            <p class="footer-text">&copy; 2024 TOBACUZ. All Rights Reserved.</p>
        </div>
    </footer>
    <div id="alertBackground"></div>
    <div id="alertBox">
        <div id="alertMessage">Apakah Anda yakin ingin keluar?</div>
        <div id="alertButton">
            <button class="ya" onclick="keluar()">Ya</button>
            <button class="tidak" onclick="closeAlert()">Tidak</button>
        </div>
    </div>
    <script>
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

        function keluar() {
            // Kode untuk menghapus data (jika diperlukan)

            // Langsung kembali ke halaman prediksi
            window.location.href = "index.php";

            // Menutup alert
            closeAlert();
        }

        function editProfile() {
            var usernameInput = document.getElementById("username");
            var emailInput = document.getElementById("email");
            var bioInput = document.getElementById("bio");

            usernameInput.disabled = false;
            emailInput.disabled = false;
            bioInput.disabled = false;

            // Menampilkan tombol Simpan dan menyembunyikan tombol Edit Profile
            document.querySelector('.edit-profile').style.display = 'none';
            document.querySelector('.save-profile').style.display = 'inline-block';
        }

        function saveProfile() {
            var usernameInput = document.getElementById("username");
            var emailInput = document.getElementById("email");
            var bioInput = document.getElementById("bio");

            // Simpan data yang diubah (kamu dapat menambahkan kode untuk menyimpan data ke server di sini)

            // Menonaktifkan input dan menampilkan kembali tombol Edit Profile
            usernameInput.disabled = true;
            emailInput.disabled = true;
            bioInput.disabled = true;

            // Menampilkan kembali tombol Edit Profile dan menyembunyikan tombol Simpan
            document.querySelector('.edit-profile').style.display = 'inline-block';
            document.querySelector('.save-profile').style.display = 'none';
        }
    </script>
</body>
</html>
