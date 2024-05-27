
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
        .container{
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
        <form action="koneksiinformasi.php" method="POST">
            <div class="form-group">
                <label for="jenis">Jenis Tembakau</label>
                <input type="text" id="jenis" name="jenis">
            </div>
            <div class="form-group">
                <label for="informasi">Informasi Tembakau</label>
                <input type="text" id="informasi" name="informasi" >
            </div>
            <div>
            <button class="btn-tambah" type="submit">Tambah Informasi Data</button>
    </form>
            <button class="btn-kembali" type="button" onclick="showConfirmation()">Kembali</button>
        </div>
    </main>
    <footer>
        <div class="footer-container">
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
        document.addEventListener("DOMContentLoaded", function() {
            // // Mendapatkan elemen input tanggal
            // var tanggalInput = document.getElementById("tanggal");

            // // Mendapatkan tanggal saat ini
            // var currentDate = new Date();

            // // Format tanggal dengan YYYY-MM-DD
            // var formattedDate = currentDate.toISOString().split('T')[0];

            // // Menetapkan nilai input tanggal ke tanggal saat ini
            // tanggalInput.value = formattedDate;
        });

        function validateForm() {
            var jenis = document.getElementById("jenis").value;
            var informasi = document.getElementById("informasi").value;

            // Check if any of the fields is empty
            if (jenis === "" || informasi === "") {
                // Display alert if any field is empty
                alert("Semua kolom harus diisi!");
                return false; // Prevent form submission
            }
            return true; // Allow form submission if all fields are filled
        }

        // Add event listener to form submission
        document.querySelector("form").addEventListener("submit", function(event) {
            // Call validateForm function before form submission
            if (!validateForm()) {
                event.preventDefault(); // Prevent form submission if validation fails
            }
        });

        function showConfirmation() {
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
            // Redirect or do whatever you want when "Ya" is clicked
            window.location.href = "info.php";
        }
</script>
</body>
</html>
