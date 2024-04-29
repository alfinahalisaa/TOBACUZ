<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Daftar</button>
        </form>
        <div class="or">Atau Daftar Dengan</div>
        <a href="login.php">Sudah Punya Akun? Masuk Disini</a>
        <div class="social-login">
            <!-- Perbaiki tautan sosial media -->
            <a href="#"><img src="asset/google.png" alt="Google"></a>
            <a href="#"><img src="asset/fb.png" alt="Facebook"></a>
            <a href="#"><img src="asset/apple.png" alt="Apple"></a>
            <a href="#"><img src="asset/gmail.png" alt="Gmail"></a>
        </div>
    </div>
</body>
</html>