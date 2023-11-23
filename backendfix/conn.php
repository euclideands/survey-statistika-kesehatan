<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "statistika_kesehatan";

$conn = mysqli_connect($hostname, $username, $password, $databaseName);

// nim
$query = "SELECT * FROM `superfix`";
$result = mysqli_query($conn, $query);
$options = "";
while($row2 = mysqli_fetch_array($result))
{
    $options = $options."<option>$row2[0]</option>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nim untuk autocomplete
    $nimForAutocomplete = isset($_POST['nim']) ? trim(strip_tags($_POST['nim'])) : '';
    $queryAutocomplete = mysqli_query($conn, "SELECT nim FROM superfix WHERE nim LIKE '%$nimForAutocomplete%'");

    $arrayAutocomplete = array();
    while ($dataAutocomplete = mysqli_fetch_assoc($queryAutocomplete)){
        $arrayAutocomplete[] = $dataAutocomplete['nim'];
    }

    // Nim untuk autofill
    $nimForAutofill = isset($_POST['nim']) ? $_POST['nim'] : '';
    $dataAutofill = array(); // Inisialisasi array untuk autofill
    if ($nimForAutofill != '') {
        $queryAutofill = mysqli_query($conn, "SELECT * FROM superfix WHERE nim='$nimForAutofill'");
        
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

    $gender = isset($_POST["gender"]) ? $_POST["gender"] : '';
    $usia = isset($_POST["usia"]) ? $_POST["usia"] : '';
    $asal_daerah = isset($_POST["asal_daerah"]) ? $_POST["asal_daerah"] : '';
    $tempat_tinggal = isset($_POST["tempat_tinggal"]) ? $_POST["tempat_tinggal"] : '';
    $pekerjaan = isset($_POST["pekerjaan"]) ? $_POST["pekerjaan"] : '';
    $pernikahan = isset($_POST["pernikahan"]) ? $_POST["pernikahan"] : '';

    $sql = "UPDATE superfix
        SET 
        status_akademik = '$status_akademik', 
        kipk = '$kipk', 
        beasiswa = '$beasiswa', 
        kegiatan_luarkampus = '$kegiatan',
        gender = '$gender',
        usia = '$usia',
        asal_daerah = '$asal_daerah',
        tempat_tinggal = '$tempat_tinggal',
        pekerjaan = '$pekerjaan',
        pernikahan = '$pernikahan',
        WHERE nim = '$nim'";
        
    $result=mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
        echo "Data berhasil diupdate";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
}

?>