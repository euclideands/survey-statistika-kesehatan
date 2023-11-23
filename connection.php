<!DOCTYPE html>
<html>
<body>

<?php
$hostname = "localhost";
$username = "id21551281_staterkom";
$password = "Staterkom21!";
$databaseName = "id21551281_tutorial";

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

    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $usia = isset($_POST['usia']) ? $_POST['usia'] : '';
    $asal_daerah = isset($_POST['asal_daerah']) ? $_POST['asal_daerah'] : '';
    $tempat_tinggal = isset($_POST['tempat_tinggal']) ? $_POST['tempat_tinggal'] : '';
    $pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';
    $status_pernikahan = isset($_POST['status_pernikahan']) ? $_POST['status_pernikahan'] : '';

    $p1 = isset($_POST['p1']) ? $_POST['p1'] : '';
    $p2 = isset($_POST['p2']) ? $_POST['p2'] : '';
    $p3 = isset($_POST['p3']) ? $_POST['p3'] : '';
    $p4 = isset($_POST['p4']) ? $_POST['p4'] : '';
    $p5 = isset($_POST['p5']) ? $_POST['p5'] : '';
    $p6 = isset($_POST['p6']) ? $_POST['p6'] : '';
    $p7 = isset($_POST['p7']) ? $_POST['p7'] : '';
    $p8 = isset($_POST['p8']) ? $_POST['p8'] : '';
    $p9 = isset($_POST['p9']) ? $_POST['p9'] : '';
    $p10 = isset($_POST['p10']) ? $_POST['p10'] : '';
    $p11 = isset($_POST['p11']) ? $_POST['p11'] : '';
    $p12 = isset($_POST['p12']) ? $_POST['p12'] : '';
    $p13 = isset($_POST['p13']) ? $_POST['p13'] : '';
    $p14 = isset($_POST['p14']) ? $_POST['p14'] : '';
    $p15 = isset($_POST['p15']) ? $_POST['p15'] : '';
    $p16 = isset($_POST['p16']) ? $_POST['p16'] : '';
    $p17 = isset($_POST['p17']) ? $_POST['p17'] : '';
    $p18 = isset($_POST['p18']) ? $_POST['p18'] : '';
    $p19 = isset($_POST['p19']) ? $_POST['p19'] : '';
    $p20 = isset($_POST['p20']) ? $_POST['p20'] : '';
    $p21 = isset($_POST['p21']) ? $_POST['p21'] : '';
    $p22 = isset($_POST['p22']) ? $_POST['p22'] : '';

    $coping = isset($_POST["coping"]) ? $_POST["coping"] : '';
    $otherCoping = isset($_POST["otherCoping"]) ? $_POST["otherCoping"] : '';

    // Check if the NIM exists in the database
    $checkQuery = "SELECT * FROM surv WHERE nim='$nim'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Update the existing record
        $updateQuery = "UPDATE surv SET 
            status_akademik='$status_akademik', 
            kipk='$kipk', 
            beasiswa='$beasiswa', 
            kegiatan_luarkampus='$kegiatan',

            gender=$gender,
            usia=$usia,
            asal_daerah=$asal_daerah,
            tempat_tinggal=$tempat_tinggal,
            pekerjaan=$pekerjaan,
            status_pernikahan=$status_pernikahan,

            p1=$p1,
            p2=$p2,
            p3=$p3,
            p4=$p4,
            p5=$p5,
            p6=$p6,
            p7=$p7,
            p8=$p8,
            p9=$p9,
            p10=$p10,
            p11=$p11,
            p12=$p12,
            p13=$p13,
            p14=$p14,
            p15=$p15,
            p16=$p16,
            p17=$p17,
            p18=$p18,
            p19=$p19,
            p20=$p20,
            p21=$p21,
            p22=$p22,

            coping=$coping,
            otherCoping=$otherCoping

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
        $insertQuery = "INSERT INTO surv (
            nim, 
            nama, 
            angkatan, 
            status_akademik, 
            kipk, 
            beasiswa, 
            kegiatan_luarkampus,
            gender,
            usia,
            asal_daerah,
            tempat_tinggal,
            pekerjaan,
            status_pernikahan,
            p1,
            p2,
            p3,
            p4,
            p5,
            p6,
            p7,
            p8,
            p9,
            p10,
            p11,
            p12,
            p13,
            p14,
            p15,
            p16,
            p17,
            p18,
            p19,
            p20,
            p21,
            p22,
            coping,
            otherCoping) 
        VALUES (
            '$nim', 
            '$nama', 
            '$angkatan', 
            '$status_akademik', 
            '$kipk',
            '$beasiswa', 
            '$kegiatan',
            '$gender',
            '$usia',
            '$asal_daerah',
            '$tempat_tinggal',
            '$pekerjaan',
            '$status_pernikahan',
            '$p1',
            '$p2',
            '$p3',
            '$p4',
            '$p5',
            '$p6',
            '$p7',
            '$p8',
            '$p9',
            '$p10',
            '$p11',
            '$p12',
            '$p13',
            '$p14',
            '$p15',
            '$p16',
            '$p17',
            '$p18',
            '$p19',
            '$p20',
            '$p21',
            '$p22',
            '$coping',
            '$otherCoping')";
        
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