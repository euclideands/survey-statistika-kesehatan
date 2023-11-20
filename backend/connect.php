<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "statistika_kesehatan";

$conn = mysqli_connect($hostname, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// nim
$query = "SELECT * FROM `test_fixed`";
$result = mysqli_query($conn, $query);
$options = "";
while($row2 = mysqli_fetch_array($result))
{
    $options = $options."<option>$row2[0]</option>";
}

// Nim untuk autocomplete
$nimForAutocomplete = isset($_POST['nim']) ? trim(strip_tags($_POST['nim'])) : '';
$queryAutocomplete = mysqli_query($conn, "SELECT nim FROM test_fixed WHERE nim LIKE '%$nimForAutocomplete%'");

$arrayAutocomplete = array();
while ($dataAutocomplete = mysqli_fetch_assoc($queryAutocomplete)){
    $arrayAutocomplete[] = $dataAutocomplete['nim'];
}

// Nim untuk autofill
$nimForAutofill = isset($_POST['nim']) ? $_POST['nim'] : '';
$dataAutofill = array(); // Inisialisasi array untuk autofill
if ($nimForAutofill != '') {
    $queryAutofill = mysqli_query($conn, "SELECT * FROM test_fixed WHERE nim='$nimForAutofill'");
    
    // Tambahkan kondisi untuk memeriksa apakah ada hasil dari kueri autofill sebelum menginisialisasi array
    if ($queryAutofill && mysqli_num_rows($queryAutofill) > 0) {
        $dataAutofill = mysqli_fetch_assoc($queryAutofill);
    }
}

// Buat objek respons hanya jika setidaknya ada satu elemen dalam salah satu array
if (!empty($arrayAutocomplete) || !empty($dataAutofill)) {
    $response = array(
        'autocomplete' => $arrayAutocomplete,
        'autofill' => $dataAutofill
    );

    // Keluarkan hasil sebagai JSON
    echo json_encode($response);
}

if (isset($_POST["submit"])) {
    $nim = stripslashes($_POST["nim"]);
    $status_akademik = isset($_POST["status_akademik"]) ? $_POST["status_akademik"] : '';
    $kipk = isset($_POST["kipk"]) ? $_POST["kipk"] : '';
    $beasiswa = isset($_POST["beasiswa"]) ? $_POST["beasiswa"] : '';
    
    // Inisialisasi $kegiatan_luarkampus sebagai array jika tidak ada input yang dichecked
    $kegiatan_luarkampus = isset($_POST["kegiatan_luarkampus"]) ? $_POST["kegiatan_luarkampus"] : array();

    $kegiatan = implode(",", $kegiatan_luarkampus);

    // // Print SQL statement for debugging
    // echo "SQL: UPDATE test_fixed SET status_akademik = '$status_akademik', kipk = '$kipk', beasiswa = '$beasiswa', kegiatan_luarkampus = '$kegiatan' WHERE nim = '$nim'";

    $sql = "UPDATE test_fixed SET status_akademik = '$status_akademik', kipk = '$kipk', beasiswa = '$beasiswa', kegiatan_luarkampus = '$kegiatan' WHERE nim = '$nim'";
    
    // if ($conn->query($sql) === TRUE) {
    //     echo "Jawaban berhasil disimpan.";
    // } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    // }
}
?>