<?php
// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "statistika_kesehatan";

$conn = new mysqli('localhost', 'root', '', 'statistika_kesehatan');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from the form
$nim = $_POST['nim'];
$answer = $_POST['answer'];
$status_akademik = $_POST['status_akademik'];
$kegiatan = implode(",", $_POST['kegiatan']); // Menggabungkan nilai dalam bentuk string dipisahkan koma

// Update the database with the answers
// Replace 'your_table' with your actual table name
$sql = "UPDATE survey SET nama = '$answer', status_akademik = '$status_akademik', kegiatan_luarkampus = '$kegiatan' WHERE nim = '$nim'";

if ($conn->query($sql) === TRUE) {
    echo "Jawaban berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
