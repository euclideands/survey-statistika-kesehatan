<?php
// php select option value from database

$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "statistika_kesehatan";

// connect to mysql database
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `survey`";

// for method 2
$result2 = mysqli_query($connect, $query);

$options = "<option value='' disabled selected>--- Your NIM ---</option>";

while($row2 = mysqli_fetch_array($result2))
{
    $options .= "<option>$row2[0]</option>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Test db</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <!-- NIM -->
    <select>
        <?php echo $options; ?>
    </select>
    <div class="input-field">
        <label>Nama Lengkap</label>
        <input type="text" placeholder="Ketikkan nama Anda" required>
    </div>
    <div class="input-field">
        <label>Status Akademik</label>
        <select required>
            <option value="" disabled selected>Gender</option>
            <option value="mahasiswa_aktif">Mahasiswa Aktif</option>
            <option value="cuti_studi">Cuti Studi</option>
            <option value="Mahasiswa_mbkm">Mahasiswa Program MBKM</option>
        </select>
    </div>
    <div class="input-field">
        <label for="kegiatan">Kegiatan</label>
        <select id="kegiatan" name="kegiatan[]" multiple required>
            <option value="" disabled selected>Pilih Kegiatanmu</option>
            <option value="bem">BEM</option>
            <option value="hima">HIMA</option>
            <option value="ukm">UKM</option>
        </select>
    </div>

</body>

</html>
