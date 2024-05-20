<?php
require 'koneksi.php';

// Ambil jenis tembakau dari request
$jenisTembakau = $_GET['jenisTembakau'];

// Buat query untuk mengambil informasi tembakau dari tabel informasi
$query = "SELECT informasi FROM informasi WHERE jenis = '$jenisTembakau'";
$result = mysqli_query($conn, $query);

// Cek apakah query berhasil dijalankan
if ($result) {
    // Ambil informasi tembakau dari hasil query
    $row = mysqli_fetch_assoc($result);
    $informasiTembakau = $row['informasi'];
    
    // Kembalikan informasi tembakau dalam format JSON
    echo json_encode(array('jenis' => $jenisTembakau, 'informasi' => $informasiTembakau));
} else {
    // Jika query gagal, kembalikan pesan error
    echo json_encode(array('error' => 'Gagal mengambil informasi tembakau.'));
}
?>
