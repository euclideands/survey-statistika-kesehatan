<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script>
  $( function() {
    $( "#nim" ).autocomplete({
      source: "connect.php"
    });
  } );
</script>

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
        <input type="text" id="nim" name="nim" onchange="autofill()" required>
        <label for="">Nama</label>
        <input type="text" id="nama" name="nama" required value="" readonly>
        <label for="">Angkatan</label>
        <input type="text" id="angkatan" name="angkatan" required value="" readonly>
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
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Kegiatan keagamaan"> Kegiatan keagamaan
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Kegiatan sosial"> Kegiatan sosial
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Kegiatan olahraga"> Kegiatan olahraga
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Kegiatan seni"> Kegiatan seni

        <br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <script>
        $(function() {
            // Inisialisasi elemen autocomplete dengan sumber yang kosong
            $("#nim").autocomplete({
                source: [],
                minLength: 1,
                select: function(event, ui) {
                    autofill(ui.item.value);
                }
            });

            function autofill(nim) {
                $.ajax({
                    url: "connect.php",
                    method: "POST",
                    data: { nim: nim },
                    dataType: "JSON",
                    success: function(data) {
                        // Hanya mengisi nilai jika objek autofill tidak kosong
                        if (data.autofill && Object.keys(data.autofill).length !== 0) {
                            $('#nama').val(data.autofill.nama);
                            $('#angkatan').val(data.autofill.angkatan);
                        }
                    }
                });
            }

            // Load data autocomplete saat halaman pertama kali dibuka
            $.ajax({
                url: "connect.php",
                method: "POST",
                dataType: "JSON",
                success: function(data) {
                    // Set sumber autocomplete dengan data.autocomplete
                    $("#nim").autocomplete({
                        source: data.autocomplete,
                        minLength: 1,
                        select: function(event, ui) {
                            autofill(ui.item.value);
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>