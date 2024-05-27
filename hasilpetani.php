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
    <link rel="stylesheet" href="css/hasil.css">
    <title>Prediction Table</title>
    <style>
    <style>
        .table-container {
                width: 80%;
                margin: 20px auto; /* Center the table and add margins */
            }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            color: black; /* Set font color to black */
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:nth-child(odd) {
            background-color: #e6ffe6;
        }
        tr:hover {
            background-color: #ddd;
        }
        input, button {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
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
                    <li><a href="infopetani.php">Informasi Tembakau</a></li>
                    <li><a href="prediksipetani.php" class="active">Prediksi</a></li>
                    <li><a href="statistikpetani.php">Statistik</a></li>
                </ul>
            </nav>
            <a href="profileadmin.php">
                <img src="asset/profile.jpg" alt="Profile Picture" class="profile-picture">
            </a>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Hallo Petani!</h2>
            <p>Mau prediksi sampai tanggal berapa nih?</p>
            <form id="formTanggal">
                <div class="form-group">
                    <input type="date" id="inputTanggal" name="inputTanggal" min="2024-01-01" max="2024-12-30">
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
            if (this.readyState == 4 && this.status == 200) {
                var response = JSON.parse(this.responseText);
                var data = response.data;
                var maxDate = convertToDate(response.max_date);

                // Create a table
                var table = document.createElement("table");
                var thead = document.createElement("thead");
                var tbody = document.createElement("tbody");

                // Define table headers
                var headers = ["Date", "Price"];
                var headerRow = document.createElement("tr");
                headers.forEach(function(header) {
                    var th = document.createElement("th");
                    th.textContent = header;
                    headerRow.appendChild(th);
                });
                thead.appendChild(headerRow);

                // Populate table rows with data
                data.forEach(function(item) {
                    var row = document.createElement("tr");

                    var dateCell = document.createElement("td");
                    dateCell.textContent = item.date;
                    row.appendChild(dateCell);

                    var priceCell = document.createElement("td");
                    priceCell.textContent = item.price;
                    row.appendChild(priceCell);

                    tbody.appendChild(row);
                });

                table.appendChild(thead);
                table.appendChild(tbody);

                // Clear previous response and display new table
                var responseContainer = document.getElementById("response");
                responseContainer.innerHTML = "";
                responseContainer.appendChild(table);

                // Update min date attribute for inputTanggal
                document.getElementById("inputTanggal").setAttribute("min", maxDate);
            } else if (this.readyState == 4) {
                console.error("Request failed:", this.status);
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