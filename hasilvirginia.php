<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOBACUZ</title>
    <link rel="stylesheet" href="css/hasil.css">
</head>
<style>
        /* Menambahkan jarak antara tombol */
        .btn-prediksi {
            margin-top: 10px; /* Anda dapat menyesuaikan nilai sesuai kebutuhan */
        }
</style>
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
            <h2>Hallo Admin!</h2>
            <p>Mau prediksi sampai tanggal berapa nih?</p>
            <form id="formTanggal">
                <div class="form-group">
                    <input type="date" id="inputTanggal" name="inputTanggal" min="2022-10-22" max="2023-12-30">
                    <button type="button" class="btn-prediksi" onclick="tampilkanHasilPrediksi()">Hasil Prediksi</button>
                    <div id="response"></div>
                </div>
            </form>
        </div>
    </main>
    <footer>
        <div class="footer-container">
            <p class="footer-text">&copy; 2024 TOBACUZ. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
        function convertToDate(str) {
            // Ubah string ke dalam format tanggal JavaScript
            var date = new Date(str);

            // Ambil tahun, bulan, dan tanggal dari objek tanggal
            var year = date.getFullYear();
            var month = ("0" + (date.getMonth() + 1)).slice(-2); // Tambahkan 1 karena bulan dimulai dari 0
            var day = ("0" + date.getDate()).slice(-2);

            // Gabungkan tahun, bulan, dan tanggal dalam format yang diinginkan
            var formattedDate = year + "-" + month + "-" + day;
            
            return formattedDate;
        }

        function tampilkanHasilPrediksi() {
            var tanggal = document.getElementById("inputTanggal").value;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.status == 200) {
                    var response = JSON.parse(this.responseText);
                    var data = response.data
                    var maxDate = convertToDate(response.max_date);                    
                    
                    document.getElementById("response").innerHTML = JSON.stringify(data);

                    document.getElementById("inputTanggal").setAttribute("min", maxDate);
                }
                else {
                    console.error("Request failed:", this.status); // Tampilkan pesan kesalahan di console
                }
            };
            xhttp.open("POST", "http://127.0.0.1:5001/endpoint", true);
            xhttp.setRequestHeader("Content-type", "application/json");
            xhttp.send(JSON.stringify({
                "tanggal": tanggal
            }));
        }
    </script>
</body>
</html>