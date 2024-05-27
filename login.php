<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/styleslogin.css">
</head>
<body>
    <div class="container">
        <img src="asset/logo.png">
        <span class="welcome-text">Selamat datang di Tobacuz!</span>
        <form action="koneksilogin.php" method="POST" onsubmit="return validateForm()">
            <label for="email">Email atau Nomor Telepon</label>
            <input type="text" id="email" name="email" placeholder="Masukkan email atau nomor telepon" required>
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
            <label for="admin">Apakah kamu adalah admin?</label>
            <input type="checkbox" id="admin" name="admin">
            <button type="submit">Masuk</button>
        </form>        
        <div class="links">
            <a href="reset.php">Lupa Kata Sandi? Reset Disini</a>
            <a href="regist.php">Belum Punya Akun? Daftar Disini</a>
        </div>
    </div>
    <script>
        function validateForm() {
            var email = document.getElementById("email").value;
            var password = document.getElementById("password").value;
            var isAdmin = document.getElementById("admin").checked;

            // Cek apakah email dan password sudah diisi
            if (email.trim() === "" || password.trim() === "") {
                alert("Mohon isi email dan password terlebih dahulu!");
                return false; // Berhenti eksekusi fungsi jika email atau password kosong
            }

            // Lanjutkan dengan login jika email dan password sudah diisi
            return true;
        }
    
            // Lanjutkan dengan login jika email dan password sudah diisi
        if (isAdmin) {
            window.location.href = "info.php"; // Masuk ke info.php jika dicentang
        } else {
            window.location.href = "infopetani.php"; // Masuk ke infopetani.php jika tidak dicentang
        }
        
    </script>
</body>
</html>
