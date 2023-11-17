<?php
$conn = mysqli_connect("localhost", "root", "", "statistika_kesehatan");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

$nim = $_GET['nim'];
$sql = mysqli_query($conn, "SELECT * FROM survey WHERE nim='$nim'");
$mhs = mysqli_fetch_array($sql);

// Hanya kirim data yang dibutuhkan
$data = array(
    'nama' => $mhs['nama']
);

// Set header sebagai JSON
header('Content-Type: application/json');

// Mengirimkan data sebagai JSON
echo json_encode($data);
?>
