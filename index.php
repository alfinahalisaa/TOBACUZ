<!DOCTYPE html>
<html>
<head>
    <title>TOBACUZ</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">
</head>
<body>
    <header>
    <div class="header-container">
            <img src="asset/logo.png" alt="TOBACUZ Logo" class="logo">
            <span class="logo-text">TOBACUZ</span>
            <nav>
                <ul class="nav-menu">
                    <li><a href="index.php" class="active">Home</a></li>
                    <li><a href="index.php">About us</a></li>
                    <li><a href="regist.php">Contact Us</a></li>
                    <li><a href="regist.php">Sign Up</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="main-container">
            <h1>Welcome to TOBACUZ!</h1>
            <h2>Aplikasi ini memberikan Anda akses cepat dan akurat untuk memantau dan meramalkan harga tembakau. Dengan algoritma canggih dan data historis yang terperinci, Anda dapat membuat keputusan yang lebih baik dalam berinvestasi atau berdagang tembakau.</h2>
            <h2>Fitur Utama:</h2>
            <h2>1.Prediksi Harga: Dapatkan perkiraan harga!</h2>
            <h2>2.Grafik Interaktif: Pantau tren harga tembakau secara visual melalui grafik yang mudah dipahami.</h2>
            <h2>3.Informasi: Terima pembaruan terbaru mengenai informasi tembakau.</h2>
            <button class="get-started-button" onclick="redirectToLoginPage()">Get Started</button>
        </div>
        <div class="image-container">
            <img src="asset/Tobacco.png" alt="Tobacco" class="tobacco-image">
        </div>
    </main>
    <footer>
        <div class="footer-container">
            <p class="footer-text">&copy; 2024 TOBACUZ. All Rights Reserved.</p>
        </div>
    </footer>
    <script>
        function redirectToLoginPage() {
            window.location.href = "login.php";
        }
    </script>
</body>
</html>
