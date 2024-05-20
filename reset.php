<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/reset.css">
</head>
<body>
    <div class="container">
        <img src="asset/logo.png">
        <span class="welcome-text">Kamu lupa kata sandi? Sants! Reset Password Sekarang</span>
        <form action="koneksireset.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Masukkan email" required>
            <label for="new_password">Kata Sandi Baru</label>
            <input type="password" id="new_password" name="new_password" minlength="8" required placeholder="Masukkan kata sandi baru" required>
            <label for="confirm_password">Konfirmasi Kata Sandi Baru</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Konfirmasikan kata sandi baru" required>
            <button type="submit">Reset</button>
        </form>        
        <div class="links">
            <a href="login.php">Tidak jadi reset? Klik disini</a>
        </div>
    </div>
</body>
</html>
