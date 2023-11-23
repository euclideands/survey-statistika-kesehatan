<!DOCTYPE html>
<html>
<body>

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "tutorial";

$conn = mysqli_connect($hostname, $username, $password, $databaseName);

// nim
$query = "SELECT * FROM `surv`";
$result = mysqli_query($conn, $query);
$options = "";
while ($row2 = mysqli_fetch_array($result)) {
    $options = $options . "<option>$row2[0]</option>";
}

// Inisialisasi variabel untuk menentukan apakah form disubmit
$formSubmitted = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Set variabel formSubmitted menjadi true
    $formSubmitted = true;

    // Nim untuk autocomplete
    $nimForAutocomplete = isset($_POST['nim']) ? trim(strip_tags($_POST['nim'])) : '';
    $queryAutocomplete = mysqli_query($conn, "SELECT nim FROM surv WHERE nim LIKE '%$nimForAutocomplete%'");

    $arrayAutocomplete = array();
    while ($dataAutocomplete = mysqli_fetch_assoc($queryAutocomplete)) {
        $arrayAutocomplete[] = $dataAutocomplete['nim'];
    }

    // Nim untuk autofill
    $nimForAutofill = isset($_POST['nim']) ? $_POST['nim'] : '';
    $dataAutofill = array(); // Inisialisasi array untuk autofill
    if ($nimForAutofill != '') {
        $queryAutofill = mysqli_query($conn, "SELECT * FROM surv WHERE nim='$nimForAutofill'");

        // Tambahkan kondisi untuk memeriksa apakah ada hasil dari kueri autofill sebelum menginisialisasi array
        if ($queryAutofill && mysqli_num_rows($queryAutofill) > 0) {
            $dataAutofill = mysqli_fetch_assoc($queryAutofill);
        }
    }

    // Update the status_akademik, kipk, and beasiswa columns based on user input
    $nim = isset($_POST["nim"]) ? trim(strip_tags($_POST["nim"])) : '';
    $nama = isset($_POST["nama"]) ? ucfirst($_POST["nama"]) : '';
    $angkatan = isset($_POST["angkatan"]) ? $_POST["angkatan"] : '';
    $status_akademik = isset($_POST['status_akademik']) ? $_POST['status_akademik'] : '';
    $kipk = isset($_POST['kipk']) ? $_POST['kipk'] : '';
    $beasiswa = isset($_POST['beasiswa']) ? $_POST['beasiswa'] : '';
    $kegiatan_luarkampus = isset($_POST["kegiatan_luarkampus"]) ? $_POST["kegiatan_luarkampus"] : array();
    $kegiatan = is_array($kegiatan_luarkampus) ? implode(',', $kegiatan_luarkampus) : '';

    // $selectedCoping = isset($_POST['coping']) ? mysqli_real_escape_string($conn, $_POST['coping']) : '';
    // $otherCoping = isset($_POST['otherCoping']) ? mysqli_real_escape_string($conn, $_POST['otherCoping']) : '';

    // Check if the NIM exists in the database
    $checkQuery = "SELECT * FROM surv WHERE nim='$nim'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Update the existing record
        $updateQuery = "UPDATE surv SET 
            status_akademik='$status_akademik', 
            kipk='$kipk', 
            beasiswa='$beasiswa', 
            kegiatan_luarkampus='$kegiatan'
            WHERE nim='$nim'";

        $updateResult = mysqli_query($conn, $updateQuery);

        if($updateResult){
            ?>
            <div id="form"><span class="success"></span><h1>Survey Submitted</h1></div>
            <?php
            }
            else{
            ?>
            <div class="form"><h1>Oops!! Something went wrong.</h1></div>
            <?php
            }

    } else {
        // Insert a new record
        $insertQuery = "INSERT INTO surv (nim, nama, angkatan, status_akademik, kipk, beasiswa, kegiatan_luarkampus) 
        VALUES ('$nim', '$nama', '$angkatan', '$status_akademik', '$kipk', '$beasiswa', '$kegiatan')";
        
        $insertResult = mysqli_query($conn, $insertQuery);

        if($insertResult){
            ?>
            <div id="form"><span class="success"></span><h1>Survey Submitted</h1></div>
            <?php
            }
            else{
            ?>
            <div class="form"><h1>Oops!! Something went wrong.</h1></div>
            <?php
            }
        
    // // Update the database
    // $updateQuery = "UPDATE surv SET 
    // status_akademik='$status_akademik', 
    // kipk='$kipk', 
    // beasiswa='$beasiswa' 
    // kegiatan_luarkampus='$kegiatan'
    // WHERE nim='$nimForAutofill'";

    // $updateResult = mysqli_query($conn, $updateQuery);


    // if (!empty($arrayAutocomplete) || !empty($dataAutofill)) {
    //     $response = array(
    //         'autocomplete' => $arrayAutocomplete,
    //         'autofill' => $dataAutofill
    //     );

    //     // Keluarkan hasil sebagai JSON
    //     echo json_encode($response);
    //     // Hentikan eksekusi kode setelah mengeluarkan respons JSON
    // }

    // // Redirect ke halaman awal setelah pemrosesan form selesai
    // if ($formSubmitted) {
    //     header("Location: index2 - Copy.php");
    // }
}
}

?>


<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    /* background-color: #4070f4; */
    background-color: #f1f1f1;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

#form {
    position: relative;
    padding-top: 50px;
    padding-bottom: 60px;
    padding-left: 60px;
    padding-right: 60px;
    border-radius: 30px;
    margin: 0px 25px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    overflow-y: auto;
}

h1 {
    margin-top: 25px;
    text-align: center;  
}

.success {
      height: 30px;
      width: 17px;
      margin-left: 50%; 
	  display: inline-block;
      transform: rotate(45deg);
      border-bottom: 7px solid #4070f4;
      border-right: 7px solid #4070f4;
    }
 
</style>


</body>
</html>