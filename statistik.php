<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOBACUZ</title>
    <link rel="stylesheet" href="css/statistik.css">
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* CSS untuk gaya alert */
        #alertBackground {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        #alertBox {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #FBBC04;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        /* CSS untuk gaya daftar tembakau */
        #alertBox ul {
            list-style-type: none;
            padding: 0;
        }

        #alertBox ul li {
            cursor: pointer;
            margin-bottom: 5px;
            padding: 5px 10px;
            border-radius: 5px;
        }

        #alertBox ul li:hover {
            background-color: #e0e0e0;
        }

        /* CSS untuk button tutup */
        #closeButton {
            background-color: #d42e2e;
            color: #ffffff;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #closeButton:hover {
            background-color: #16422F;
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
                    <li><a href="prediksiadmin.php">Prediksi</a></li>
                    <li><a href="statistik.php" class="active">Statistik</a></li>
                </ul>
            </nav>
            <a href="profileadmin.php">
                <img src="asset/profile.jpg" alt="Profile Picture" class="profile-picture">
            </a>
        </div>
    </header>
    <main>
        <section class="content">
            <h1>Hallo Alfina!</h1>
            <p>Yuk lihat statistik tembakau disini!</p>
            <div class="filter">
                <span class="filter-text">Tembakau Besuki</span>
                <button class="filter-btn" onclick="showAlert()">Filter Jenis Tembakau</button>
            </div>            
            <div class="chart-container">
                <canvas id="harga-chart"></canvas>
            </div>
            <div id="alertBackground"></div>
            <div id="alertBox">
                <p>Jenis-jenis Tembakau:</p>
                <ul>
                    <li onclick="selectTembakau('Tembakau Besuki')" style="background-color: rgba(255, 99, 132, 1);">Tembakau Besuki</li>
                    <li onclick="selectTembakau('Tembakau Temanggung')" style="background-color: rgba(54, 162, 235, 0.5);">Tembakau Temanggung</li>
                    <li onclick="selectTembakau('Tembakau Deli')" style="background-color: rgba(255, 206, 86, 0.5);">Tembakau Deli</li>
                    <li onclick="selectTembakau('Tembakau Garut')" style="background-color: rgba(75, 192, 192, 1);">Tembakau Garut</li>
                    <!-- Tambahkan jenis tembakau lainnya di sini -->
                </ul>
                <button id="closeButton" onclick="closeAlert()">Tutup</button>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <p class="footer-text">&copy; 2024 TOBACUZ. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Ambil referensi dari elemen canvas
        var ctx = document.getElementById('harga-chart').getContext('2d');

        var filterBtn = document.querySelector('.filter-btn');
        var filterText = document.querySelector('.filter-text');

        // Data harga tembakau untuk setiap jenis tembakau
        var hargaData = {
            'Tembakau Besuki': [125000, 200000, 150000, 135000],
            'Tembakau Temanggung': [120000, 180000, 145000, 130000],
            'Tembakau Deli': [130000, 190000, 155000, 140000],
            'Tembakau Garut': [135000, 200000, 170000, 145000]
            // Tambahkan data harga untuk jenis tembakau lainnya di sini
        };

        // Warna untuk setiap jenis tembakau
        var warnaTembakau = {
            'Tembakau Besuki': 'rgba(255, 99, 132, 1)',
            'Tembakau Temanggung': 'rgba(54, 162, 235, 1)',
            'Tembakau Deli': 'rgba(255, 206, 86, 1)',
            'Tembakau Garut': 'rgba(75, 192, 192, 1)'
            // Tambahkan warna untuk jenis tembakau lainnya di sini
        };

        // Buat chart
        var hargaChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2019', '2020', '2021', '2022'],
                datasets: [{
                    label: 'Harga',
                    data: hargaData['Tembakau Besuki'], // Gunakan data harga untuk Tembakau Besuki secara default
                    fill: false,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 2,
                    pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Tahun'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Harga'
                        },
                        beginAtZero: true
                    }
                }
            }
        });

        // Fungsi untuk menampilkan alert dengan daftar jenis tembakau
        function showAlert() {
            var alertBackground = document.getElementById("alertBackground");
            var alertBox = document.getElementById("alertBox");

            alertBackground.style.display = "block";
            alertBox.style.display = "block";
        }

        // Fungsi untuk menutup alert
        function closeAlert() {
            var alertBackground = document.getElementById("alertBackground");
            var alertBox = document.getElementById("alertBox");

            alertBackground.style.display = "none";
            alertBox.style.display = "none";
        }

        // Fungsi untuk memilih jenis tembakau dan menampilkan informasi di filter
        function selectTembakau(tembakau) {
            filterText.textContent = tembakau;
            updateChart(tembakau);
            closeAlert();
        }

        // Fungsi untuk memperbarui chart dengan data harga yang sesuai dengan jenis tembakau yang dipilih
        function updateChart(tembakau) {
            hargaChart.data.datasets[0].data = hargaData[tembakau];
            hargaChart.data.datasets[0].borderColor = warnaTembakau[tembakau];
            hargaChart.data.datasets[0].pointBackgroundColor = warnaTembakau[tembakau];
            hargaChart.update();
        }
    </script>
</body>
</html>
