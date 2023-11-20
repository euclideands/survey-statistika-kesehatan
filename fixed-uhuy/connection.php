<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "statistika_kesehatan";

$conn = mysqli_connect($hostname, $username, $password, $databaseName);

// nim
$query = "SELECT * FROM `test_fixed`";
$result = mysqli_query($conn, $query);
$options = "";
while($row2 = mysqli_fetch_array($result))
{
    $options = $options."<option>$row2[0]</option>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        // Hentikan eksekusi kode setelah mengeluarkan respons JSON
        exit;
    }
}

// Assuming $conn is a valid database connection
if (isset($_POST["submit"])) {
    // Retrieve and sanitize form data
    $nim = isset($_POST["nim"]) ? trim(strip_tags($_POST["nim"])) : '';
    $nama = isset($_POST["nama"]) ? ucfirst($_POST["nama"]) : '';
    $angkatan = isset($_POST["angkatan"]) ? $_POST["angkatan"] : '';
    $status_akademik = isset($_POST["status_akademik"]) ? $_POST["status_akademik"] : '';
    $kipk = isset($_POST["kipk"]) ? $_POST["kipk"] : '';
    $beasiswa = isset($_POST["beasiswa"]) ? $_POST["beasiswa"] : '';

    $kegiatan_luarkampus = isset($_POST["kegiatan_luarkampus"]) ? $_POST["kegiatan_luarkampus"] : array();
    $kegiatan = is_array($kegiatan_luarkampus) ? implode(',', $kegiatan_luarkampus) : '';

    $selected_value = isset($_POST["selected_value"]) ? $_POST["selected_value"] : array();
    $select = is_array($selected_value) ? implode(',', $selected_value) : '';

    $sql = "UPDATE test_fixed 
            SET status_akademik = '$status_akademik', kipk = '$kipk', beasiswa = '$beasiswa', kegiatan_luarkampus = '$kegiatan', selected_value='$select'
            WHERE nim = '$nim'";
    
    // Jika NIM tidak ada, gunakan INSERT untuk menambahkan data baru
    if ($conn->query($sql) === TRUE) {
    if ($conn->affected_rows == 0) {
    // Jika tidak ada baris yang terpengaruh, NIM tidak ditemukan, lakukan INSERT
    $sql_insert = "INSERT INTO test_fixed (nim, nama, angkatan, status_akademik, kipk, beasiswa, kegiatan_luarkampus, selected_value) VALUES ('$nim', '$nama', '$angkatan', '$status_akademik', '$kipk', '$beasiswa', '$kegiatan', '$select')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Data berhasil disimpan.";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
    } else {
    echo "Data berhasil diperbarui.";
    }
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>