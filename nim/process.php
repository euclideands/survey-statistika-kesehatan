<?php
session_start();

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "statistika_kesehatan";
$con = mysqli_connect($hostname, $username, $password, $databaseName);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['save_data'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $status_akademik = $_POST['status_akademik'];
    $kegiatan_luarkampus = implode(", ", $_POST['kegiatan_luarkampus']);

    $query = "INSERT INTO survey (nim, nama, status_akademik, kegiatan_luarkampus) 
              VALUES ('$nim', '$nama', '$status_akademik', '$kegiatan_luarkampus')";

    if (mysqli_query($con, $query)) {
        $_SESSION['status'] = "Data berhasil disimpan!";
    } else {
        $_SESSION['status'] = "Error: " . $query . "<br>" . mysqli_error($con);
    }

    header("Location: index.php");
    exit();
}

mysqli_close($con);
?>
