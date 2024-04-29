<!DOCTYPE html>
<html>
<head>
    <title>TOBACUZ</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script>
        function redirectToLoginPage() {
            window.location.href = "login.php";
        }
    </script>
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
            <h1>MAKE YOUR TOBACCO PRODUCTS QUALITY FROM HERE, Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque eget ligula vitae nisi tincidunt dapibus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas</h1>
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
</body>
</html>
