<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="css/regist.css">
</head>
<body>
    <div class="container">
        <img src="asset/logo.png" alt="Logo Tobacuz">
        <div class="welcome-text">Selamat datang di Tobacuz!</div>
        <form action="koneksiregist.php" method="POST"> <!-- Perbaiki action formulir -->
            <label for="email">Alamat Email</label>
            <input type="email" id="email" name="email" required>
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required> <!-- Perbaiki tipe input untuk nama -->
            <label for="username">Username</label>
            <input type="username" id="username" name="username" required>
            <label for="password">Kata Sandi (minimal 8 karakter)</label>
            <input type="password" id="password" name="password" minlength="8" required>
            <button type="submit">Daftar</button>
        </form>
        <div class="links">
            <a href="login.php">Sudah Punya Akun? Masuk Disini</a>
        </div>
    </div>
</body>
</html>