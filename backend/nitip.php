<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Test</title>
</head>
<style media="screen">
    label{
        display: block;
    }
</style>
<body>
    <form action="" class="" method="post" autocomplete="off">
        <label for="">NIM</label>
        <select id="nim" name="nim" required value="" onchange="autofill()">
            <option value="" selected hidden>-Select-</option>
            <?php echo $options;?>
        </select>

        <!-- <input type="text" id="nim" name="nim" required value="" onkeyup=autofill()> -->
        
        <label for="">Nama</label>
        <input type="text" id="nama" name="nama" required value="" readonly>
        <label for="">Angkatan</label>
        <input type="text" id="angkatan" name="angkatan" required value="" readonly>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">
            function autofill() {
                var nim = $("#nim").val();
                $.ajax({
                    url: 'connect.php',
                    data: 'nim='+nim,
                    method: 'post',
                    dataType: 'json',
                }).success(function(data){
                    var json = data,
                    obj = JSON.parse(json);
                    $('#nama').val(obj.nama);
                    $('#angkatan').val(obj.angkatan);
                });
            }
        </script>

        <!-- <script type="text/javascript">
        function autofill() {
            var nim = $("#nim").val();
            $.ajax({
                url: 'connect.php',
                data: 'nim='+nim
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#nama').val(obj.nama)
                $('#angkatan').val(obj.angkatan);
            });
        }
        </script> -->

        <label for="">Status Akademik</label>
        <select class="" name="status_akademik" required>
            <option value="" selected hidden>-Select-</option>
            <option value="Mahasiswa aktif">Mahasiswa aktif</option>
            <option value="Cuti studi">Cuti studi</option>
            <option value="Mahasiswa MBKM">Mahasiswa MBKM</option>
        </select>
        <label for="">Status penerimaan KIPK</label>
        <select class="" name="kipk" required>
            <option value="" selected hidden>-Select-</option>
            <option value="Penerima KIPK">Penerima KIPK</option>
            <option value="Tidak menerima KIPK">Tidak menerima KIPK</option>
        </select>
        <label for="">Status penerimaan beasiswa</label>
        <select class="" name="beasiswa" required>
            <option value="" selected hidden>-Select-</option>
            <option value="Penerima beasiswa">Penerima beasiswa</option>
            <option value="Tidak menerima beasiswa">Tidak menerima beasiswa</option>
        </select>
        <label for="">Kegiatan di luar perkuliahan</label>
        <input type="checkbox" name="kegiatan_luarkampus[]" value="BEM KM"> BEM KM
        <input type="checkbox" name="kegiatan_luarkampus[]" value="BEM Fakultas"> BEM Fakultas
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Hima"> Hima
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Unit Kegiatan Mahasiswa (tingkat kampus/fakultas/jurusan)"> Unit Kegiatan Mahasiswa (tingkat kampus/fakultas/jurusan)
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Asosiasi mahasiswa (klub/kelompok studi)"> Asosiasi mahasiswa (klub/kelompok studi)
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Volunteer dalam kampus"> Volunteer dalam kampus
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Volunteer luar kampus"> Volunteer luar kampus
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Organisasi luar kampus"> Organisasi luar kampus



        <!-- <label for="">Age</label>
        <input type="number" name="age" required value="">
        <label for="">Country</label>
        <select class="" name="country" required>
            <option value="" selected hidden>-Select Country-</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="India">India</option>
            <option value="Pakistan">Pakistan</option>
            <option value="Nepal">Nepal</option>
            <option value="Bhutan">Bhutan</option>
            <option value="Sri Lanka">Sri Lanka</option>
        </select>
        <label for="">Gender</label>
        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female" required> Female
        <label for="">Languages</label>
        <input type="checkbox" name="languages[]" value="English"> English
        <input type="checkbox" name="languages[]" value="Indonesia"> Indonesia
        <input type="checkbox" name="languages[]" value="Spanish"> Spanish
        <input type="checkbox" name="languages[]" value="Japanese"> Japanese -->
        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>






<?php
include 'index.php';

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "statistika_kesehatan";

$conn = mysqli_connect($hostname, $username, $password, $databaseName);

$nim_query = "SELECT * FROM 'test_fixed'";

// pilihan nim
$result = mysqli_query($conn, $nim_query);
$options = "";
while($row = mysqli_fetch_array($result))
{
    $options = $options."<option>$row[1]</option>";
}

// autofill
$nim = $_POST['nim'];
$sql = mysqli_query($conn, "SELECT * FROM test_fixed WHERE nim='$nim'");
$mhs = mysqli_fetch_array($sql);

// Hanya kirim data yang dibutuhkan
$data = array(
    'nama' => $mhs['nama'],
    'angkatan' => $mhs['angkatan']
);

// Mengirimkan data sebagai JSON
echo json_encode($data);


// if(isset($_POST["submit"])){
//     $nim = stripslashes($_POST["nim"]);
//     $nama = ucwords(strtolower(stripslashes($_POST["nama"])));
//     $angkatan = $_POST["angkatan"];

//     // $languages = $_POST["languages"];
//     // $language = "";
//     // foreach($languages as $row){
//     //     $language .= $row . ",";
//     // }

//     $query = "INSERT INTO test_fixed (nim, nama, angkatan) VALUES ('$nim', '$nama', '$angkatan')";
//     mysqli_query($conn, $query);
//     echo
//     "
//     <script>
//         alert('Data has been saved');
//         document.location.href = 'index.php';
//     </script>";
// }


// // Nim untuk autocomplete
// $nimForAutocomplete = isset($_POST['nim']) ? trim(strip_tags($_POST['nim'])) : '';
// $queryAutocomplete = mysqli_query($conn, "SELECT nim FROM test_fixed WHERE nim LIKE '%$nimForAutocomplete%'");

// $arrayAutocomplete = array();
// while ($dataAutocomplete = mysqli_fetch_assoc($queryAutocomplete)){
//     $arrayAutocomplete[] = $dataAutocomplete['nim'];
// }

// // Nim untuk autofill
// $nimForAutofill = isset($_POST['nim']) ? $_POST['nim'] : '';
// $dataAutofill = array(); // Inisialisasi array untuk autofill
// if ($nimForAutocomplete != '') {
//     $queryAutofill = mysqli_query($conn, "SELECT * FROM test_fixed WHERE nim='$nimForAutofill'");
//     $dataAutofill = mysqli_fetch_assoc($queryAutofill);
// };

// // Gabungkan data dalam satu objek
// $response = array(
//     'autocomplete' => $arrayAutocomplete,
//     'autofill' => $dataAutofill
// );

// // Keluarkan hasil sebagai JSON
// echo json_encode($response);

// // autocomplete
// $nim = isset($_POST['nim']) ? trim(strip_tags($_POST['nim'])) : '';
// $query = mysqli_query($conn, "SELECT nim FROM test_fixed WHERE nim LIKE '%$nim%'");

// $array = array();
// while ($data = mysqli_fetch_assoc($query)){
//     $array[] = $data['nim'];
// }

// echo json_encode($array);


// // autofill
// $nim = isset($_POST['nim']) ? $_POST['nim'] : '';
// if ($nim != '') {
//     $query = mysqli_query($conn, "SELECT * FROM test_fixed WHERE nim='$nim'");
//     $data = mysqli_fetch_assoc($query);
//     echo json_encode($data);
// };

// $nim = $_POST['nim'];
// $query = mysqli_query($conn, "SELECT * FROM test_fixed WHERE nim='$nim'");
// $data = mysqli_fetch_array($query);
// echo json_encode($data);

// $this->form_validation->set_rules('nim', 'nama', 'angkatan');
// function autofill(){
//     $nim = $_POST['nim'];
//     $s = "SELECT nama FROM test_fixed WHERE nim='$nim'";
// $res = $this->db->query($s)->row_array(); // intinya memasukan jquery row_array
// echo json_encode($res);
// }

// <!-- <script>
// function autofill() {
//     var nim = $("#nim").val();
//     $.ajax({
//         url: "connect.php",
//         method: "POST",
//         data: {nim:nim},
//         dataType: "JSON",
//         success: function(data){
//             $('#nama').val(data.nama);
//             $('#angkatan').val(data.angkatan);
//         }
//     })
// }
// </script> -->

// <!-- <label for="">NIM</label>
// <select id="nim" name="nim" onchange="autofill()" required>
//     <option value="" selected hidden>-Select-</option>
//     <?php echo $options;?
// </select>

?>