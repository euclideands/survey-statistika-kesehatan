<?php
// Establish a connection to the SQL database
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "db_kes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user's information from the POST request
$nama_lengkap = $_POST['nama_lengkap'];
$nim = $_POST['nim'];
$status_akademik = $_POST['status-akademik'];
$tingkat_semester = $_POST['tingkat-semester'];
$status_penerimaan_kipk = $_POST['status-kipk'];
$status_penerimaan_beasiswa = $_POST['status-beasiswa'];
$kegiatan_luarkampus = $_POST['kegiatan'];

// Prepare and bind the SQL statement
$stmt = $conn->prepare("INSERT INTO survey_users (nama_lengkap, nim, status_akademik, tingkat_semester, status_penerimaan_kipk, status_penerimaan_beasiswa, kegiatan_luarkampus) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $nama_lengkap, $nim, $status_akademik, $tingkat_semester, $status_penerimaan_kipk, $status_penerimaan_beasiswa, $kegiatan_luarkampus);

// Execute the prepared statement
$stmt->execute();

// Close the statement and connection
$stmt->close();
$conn->close();
