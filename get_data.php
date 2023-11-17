<?php
// Koneksi ke database (sesuaikan dengan konfigurasi Anda)
$conn = mysqli_connect('localhost', 'root', '', 'statistika_kesehatan');

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil NIM dari parameter GET
$nim = isset($_GET['nim']) ? mysqli_real_escape_string($conn, $_GET['nim']) : '';

// Query untuk mengambil data berdasarkan NIM
$query = "SELECT nama FROM survey WHERE nim = '$nim'";
$result = mysqli_query($conn, $query);

// Ambil hasil query dan kembalikan dalam format JSON
$data = mysqli_fetch_assoc($result);
echo json_encode($data);

// Tutup koneksi
mysqli_close($conn);
?>
