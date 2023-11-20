<?php
include 'connection.php';
include 'multiselect/header.php';
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Survey Statistika Kesehatan</title>
    <link rel="stylesheet" href="style.css">
    <script src="scripts.js" defer></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
    <script src="multiselect/script.js"></script>
    <script>
        $(function() {
            $("#nim").autocomplete({
                source: "connection.php"
            });
        });
    </script>

    <style media="screen">
        label {
            display: block;
        }
    </style>

</head>

<body>
    <div class="container">
        <form id="regForm" action="connection.php" method="post" autocomplete="off">
            <span class="title">Kemahasiswaan</span>
            <!-- One "tab" for each step in the form: -->
            <div class="tab">
                <div class="input-field">
                    <label for="">NIM</label>
                    <input type="text" id="nim" name="nim" onchange="autofill()" placeholder="NIM" required>
                </div>
                <div class="input-field">
                    <label for="">Nama</label>
                    <input type="text" id="nama" name="nama" required value="" placeholder="nama" readonly>
                </div>
                <div class="input-field">
                    <label for="">Angkatan</label>
                    <input type="text" id="angkatan" name="angkatan" required value="" placeholder="angkatan" readonly>
                </div>
                <div class="input-field">
                    <label for="">Status Akademik</label>
                    <select class="" name="status_akademik" required>
                        <option value="" selected hidden>- select -</option>
                        <option value="Mahasiswa aktif">Mahasiswa aktif</option>
                        <option value="Cuti studi">Cuti studi</option>
                        <option value="Mahasiswa MBKM">Mahasiswa MBKM</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="">Status KIPK</label>
                    <select class="" name="kipk" required>
                        <option value="" selected hidden>- select -</option>
                        <option value="Penerima KIPK">Penerima KIPK</option>
                        <option value="Tidak menerima KIPK">Tidak menerima KIPK</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="">Status Beasiswa</label>
                    <select class="" name="beasiswa" required>
                        <option value="" selected hidden>- select -</option>
                        <option value="Penerima beasiswa">Penerima beasiswa</option>
                        <option value="Tidak menerima beasiswa">Tidak menerima beasiswa</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="">Chhose</label>
                <select id="languages" name="selected_value[]" multiple>
                    <option value="php">PHP</option>
                    <option value="python">Python</option>
                    <option value="javascript">JavaScript</option>
                    <option value="java">Java</option>
                    <option value="c">C</option>
                    <option value="sql">SQL</option>
                    <option value="ruby">Ruby</option>
                    <option value=".net">.Net</option>
                </select>
            </div>
            <!-- <label for="">Kegiatan di luar perkuliahan</label>
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Organisasi Kemahasiswaan"> Organisasi Kemahasiswaan
        <input type="checkbox" name="kegiatan_luarkampus[]" value="UKM"> UKM
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Kepanitiaan"> Kepanitiaan
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Komunitas"> Komunitas
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Kegiatan Sosial"> Kegiatan Sosial
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Kursus"> Kursus
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Kewirausahaan"> Kewirausahaan
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Olahraga"> Olahraga
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Gaming"> Gaming
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Kompetisi"> Kompetisi
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Seminar atau Workshop"> Seminar atau Workshop
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Organisasi Luar Kampus"> Organisasi Luar Kampus
        <input type="checkbox" name="kegiatan_luarkampus[]" value="Tidak Memiliki Kegiatan di Luar Perkuliahan"> Tidak Memiliki Kegiatan di Luar Perkuliahan -->
            <div class="tab">
                <div class="input-field">
                    <label for="">Jenis Kelamin</label>
                    <select class="" name="gender" required>
                        <option value="" selected hidden>- select -</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="">Usia</label>
                    <input type="number" id="usia" name="usia" placeholder="usia" required>
                </div>
                <div class="input-field">
                    <label for="">Asal Daerah</label>
                    <select class="" name="asal_daerah" required>
                        <option value="" selected hidden>- select -</option>
                        <option value="Daerah Semarang">Daerah Semarang</option>
                        <option value="Daerah Luar Semarang">Daerah Luar Semarang</option>
                        <option value="Daerah Luar Negri">Daerah Luar Negri</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="">Tempat Tinggal</label>
                    <select class="" name="tempat_tinggal" required>
                        <option value="" selected hidden>- select -</option>
                        <option value="Tinggal di asrama kampus">Tinggal di asrama kampus</option>
                        <option value="Tinggal di rumah sewa">Tinggal di rumah sewa</option>
                        <option value="Tinggal bersama keluarga">Tinggal bersama keluarga</option>
                        <option value="Tinggal di rumah sendiri">Tinggal di rumah sendiri</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="">Status Pekerjaan</label>
                    <select class="" name="pekerjaan" required>
                        <option value="" selected hidden>- select -</option>
                        <option value="Bekerja paruh waktu">Bekerja paruh waktu</option>
                        <option value="Bekerja penuh waktu">Bekerja penuh waktu</option>
                        <option value="Tidak bekerja">Tidak bekerja</option>
                    </select>
                </div>
                <div class="input-field">
                    <label for="">Status Pernikahan</label>
                    <select class="" name="pernikahan" required>
                        <option value="" selected hidden>- select -</option>
                        <option value="Sudah Menikah">Sudah Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                    </select>

                </div>
            </div>

            

        </form>
    </div>
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
                    url: "connection.php",
                    method: "POST",
                    data: {
                        nim: nim
                    },
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
                url: "connection.php",
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

<?php include('multiselect/footer.php'); ?>