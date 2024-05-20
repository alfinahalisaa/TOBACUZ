<?php
// Start session
session_start();

// Check if session variables are set
if (isset($_SESSION["username"], $_SESSION["nama"], $_SESSION["email"])) {
    $username = $_SESSION["username"];
    $nama = $_SESSION["nama"];
    $email = $_SESSION["email"];
} else {
    // Redirect to login page if user is not logged in or not an admin
    header("Location: login.php");
    exit;
}

$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "db_users";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and update user information in the database
    $newUsername = $_POST["username"];
    $newEmail = $_POST["email"];
    $newNama = $_POST["nama"];

    // SQL to update user information
    $sql = "UPDATE registrasi SET username='$newUsername', email='$newEmail', nama='$newNama' WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        // Update session variables with new information
        $_SESSION["username"] = $newUsername;
        $_SESSION["email"] = $newEmail;
        $_SESSION["nama"] = $newNama;
        
        // Redirect to profileadmin.php or display a success message
        header("Location: profileadmin.php");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOBACUZ</title>
    <link rel="stylesheet" href="css/profileadmin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <img src="asset/logo.png" alt="TOBACUZ Logo" class="logo">
            <span class="logo-text">TOBACUZ</span>
            <nav>
                <ul class="nav-menu">
                    <li><a href="infopetani.php">Info Tembakau</a></li>
                    <li><a href="prediksipetani.php" class = "active">Prediksi</a></li>
                    <li><a href="statistikpetani.php">Statistik</a></li>
                </ul>
            </nav>
            <a href="profilepetani.php">
                <img src="asset/profile.jpg" alt="Profile Picture" class="profile-picture">
            </a>
        </div>
    </header>
    <main class="main">
        <div class="profile">
            <h2>Hallo Alfina!</h2>
            <p>Senang bisa mengenalmu!</p>
            <div class="user-details">
                <div class="detail">
                    <div class="card">
                        <label class="label">Username</label>
                        <input type="text" id="username" class="value card" value="<?php echo $username; ?>" disabled>
                    </div>
                </div>
                <div class="detail">
                    <div class="card">
                        <label class="label">Email</label>
                        <input type="email" id="email" class="value card" value="<?php echo $email; ?>" disabled>
                    </div>
                </div>
                <div class="detail">
                    <div class="card">
                        <label class="label">Nama</label>
                        <input type="text" id="nama" class="value card" value="<?php echo $nama; ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
        <div class="actions">
            <button class="edit-profile" onclick="editProfile()">Edit Profile</button>
            <button class="save-profile" onclick="saveProfile()" style="display: none;">Simpan</button>
            <button class="logout" onclick="showAlert()">Logout</button>
            <input type="hidden" id="id" value=""> <!-- Tambahkan input hidden untuk menyimpan ID pengguna -->
    </main>
    <footer class="footer">
        <div class="footer-content">
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
        function showAlert() {
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
            // Hapus sesi
            window.location.href = "logout.php";
        }

        function editProfile() {
            // Aktifkan input untuk mengedit
            document.getElementById("username").disabled = false;
            document.getElementById("email").disabled = false;
            document.getElementById("nama").disabled = false;

            // Sembunyikan tombol edit, tampilkan tombol simpan
            document.querySelector(".edit-profile").style.display = "none";
            document.querySelector(".save-profile").style.display = "block";
        }

        function saveProfile() {
            // Ambil nilai yang diedit
            var newUsername = document.getElementById("username").value;
            var newEmail = document.getElementById("email").value;
            var newNama = document.getElementById("nama").value;

            // Validasi agar data tidak boleh kosong
            if (newUsername.trim() === "" || newEmail.trim() === "" || newNama.trim() === "") {
                alert("Data tidak boleh kosong!");
                return; // Berhenti eksekusi fungsi jika data kosong
            }

            // Kirim data yang diedit ke server menggunakan AJAX
            $.ajax({
                type: "POST",
                url: "profileadmin.php", // Ganti dengan nama file PHP yang sama dengan halaman ini
                data: {
                    username: newUsername,
                    email: newEmail,
                    nama: newNama
                },
                success: function(response) {
                    // Reload halaman setelah pembaruan berhasil
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error("Error updating profile:", error);
                }
            });
        }
    </script>
</body>
</html>
