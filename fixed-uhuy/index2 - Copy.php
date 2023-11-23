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
    <link rel="stylesheet" href="style2.css">
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
        .form-group label {
            display: flex;
        }
    </style>
</head>

<body>
    <form id="form" action="connection.php" method="post">
        <div class="header">
            <h1>Suvei Kesehatan Mental</h1>
            <!-- Circles which indicates the steps of the form: -->
            <div class="bullet">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </div>
        <span class="title">Data Mahasiswa</span>
        <div class="tab">
            <div class="input-field">
                <label for="">NIM</label>
                <input type="text" id="nim" name="nim" placeholder="nim" required>
            </div>
            <div class="input-field">
                <label for="">Nama</label>
                <input typ
                e="text" id="nama" name="nama" required value="" placeholder="nama" required>
            </div>
            <div class="input-field">
                <label for="">Angkatan</label>
                <input type="text" id="angkatan" name="angkatan" required value="" placeholder="angkatan" required>
            </div>
            <div class="input-field">
                <label for="" required>Status Akademik</label>
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
            <div class="form-group">
                <label for="">Kegiatan di Luar Perkuliahan</label>
                <select id="kegiatan_luarkampus" name="kegiatan_luarkampus[]" multiple required>
                    <option value="Organisasi Kemahasiswaan">Organisasi Kemahasiswaan</option>
                    <option value="UKM">UKM</option>
                    <option value="Klub Pengembangan Diri">Klub Pengembangan Diri</option>
                    <option value="Kegiatan Sosial">Kegiatan Sosial</option>
                    <option value="Kepanitiaan">Kepanitiaan</option>
                    <option value="Kursus">Kursus</option>
                    <option value="Kewirausahaan">Kewirausahaan</option>
                    <option value="Memancing">Memancing</option>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Kompetisi">Kompetisi</option>
                    <option value="Seminar atau Workshop">Seminar atau Workshop</option>
                    <option value="Organisasi Luar Kampus">Organisasi Luar Kampus</option>
                    <option value="Tidak Memiliki Kegiatan di Luar Perkuliahan">Tidak Memiliki Kegiatan di Luar Perkuliahan</option>
                </select>
            </div>
        </div>
        <span class="title">Demografi</span>
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
                <select class="" name="status_pernikahan" required>
                    <option value="" selected hidden>- select -</option>
                    <option value="Belum menikah">Belum menikah</option>
                    <option value="Menikah">Menikah</option>
                </select>
            </div>
        </div>
        <span class="title">Parameter Kesehatan Mental</span>
        <div class="tab">
            <div class="rb-box">
                <div id="rb-1" class="rb">
                    <h3>Kecemasan (Anxiety)</h3>
                    <h2>1: Sangat Tidak Setuju, 2: Tidak Setuju, 3: Netral, 4: Setuju, 5: Sangat Setuju</h2>
                </div>
                <div id="rb-2" class="rb">
                    <p>Seberapa sering kamu merasa panik?</p>
                    <input type="radio" name="p1" value="1" required>
                    <label for="">1</label>
                    <input type="radio" name="p1" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p1" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p1" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p1" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-3" class="rb">
                    <p>Seberapa sering kamu merasa gelisah?</p>
                    <input type="radio" name="p2" value="1" required>
                    <label for="">1</label>
                    <input type="radio" name="p2" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p2" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p2" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p2" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-4" class="rb">
                    <p>Seberapa sering kamu merasa tidak memiliki gairah?</p>
                    <input type="radio" name="p3" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p3" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p3" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p3" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p3" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-5" class="rb">
                    <p>Seberapa sering kamu merasa tidak bisa tidur?</p>
                    <input type="radio" name="p4" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p4" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p4" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p4" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p4" value="5">
                    <label for="">5</label>
                </div>
            </div>
            <div class="rb-box">
                <div id="rb-6" class="rb">
                    <h3>Depresi (Depression)</h3>
                </div>
                <div id="rb-7" class="rb">
                    <p>Seberapa sering kamu merasa sedih?</p>
                    <input type="radio" name="p5" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p5" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p5" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p5" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p5" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-8" class="rb">
                    <p>Seberapa sering kamu merasa sangat kesepian?</p>
                    <input type="radio" name="p6" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p6" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p6" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p6" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p6" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-9" class="rb">
                    <p>Seberapa sering kamu tidak memiliki harapan?</p>
                    <input type="radio" name="p7" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p7" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p7" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p7" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p7" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-10" class="rb">
                    <p>Seberapa sering kamu merasa putus asa?</p>
                    <input type="radio" name="p8" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p8" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p8" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p8" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p8" value="5">
                    <label for="">5</label>
                </div>
            </div>
            <div class="rb-box">
                <div id="rb-11" class="rb">
                    <h3>Kehilangan kontrol perilaku (Lost of behavioral/emotional control)</h3>
                </div>
                <div id="rb-12" class="rb">
                    <p>Seberapa sering kamu kehilangan kesabaran?</p>
                    <input type="radio" name="p9" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p9" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p9" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p9" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p9" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-13" class="rb">
                    <p>Seberapa sering kamu marah jika ada orang yang menyinggung perasaanmu?</p>
                    <input type="radio" name="p10" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p10" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p10" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p10" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p10" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-14" class="rb">
                    <p>Seberapa sering kamu tidak memikirkan dampak dari perbuatan yang kamu lakukan?</p>
                    <input type="radio" name="p11" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p11" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p11" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p11" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p11" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-15" class="rb">
                    <p>Seberapa sering kamu akan marah ketika apa yang kamu inginkan tidak tercapai?</p>
                    <input type="radio" name="p12" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p12" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p12" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p12" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p12" value="5">
                    <label for="">5</label>
                </div>
            </div>
            <div class="rb-box">
                <div id="rb-16" class="rb">
                    <h3>Kepuasan hidup (Life satisfaction)</h3>
                </div>
                <div id="rb-17" class="rb">
                    <p>Seberapa sering kamu merasa bahagia dalam menjalani kehidupan ini?</p>
                    <input type="radio" name="p13" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p13" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p13" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p13" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p13" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-18" class="rb">
                    <p>Seberapa sering kamu merasa menikmati apa yang terjadi dalam kehidupan ini?</p>
                    <input type="radio" name="p14" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p14" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p14" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p14" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p14" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-19" class="rb">
                    <p>Seberapa sering kamu merasa bersyukur dalam melakukan aktivitas sehari-hari?</p>
                    <input type="radio" name="p15" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p15" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p15" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p15" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p15" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-20" class="rb">
                    <p>Seberapa sering kamu merasa mempunyai semangat dalam melakukan aktivitas sehari-hari?</p>
                    <input type="radio" name="p16" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p16" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p16" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p16" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p16" value="5">
                    <label for="">5</label>
                </div>
            </div>
            <div class="rb-box">
                <div id="rb-21" class="rb">
                    <h3>Kondisi emosional (Emotional ties)</h3>
                </div>
                <div id="rb-22" class="rb">
                    <p>Seberapa sering kamu mendapatkan motivasi?</p>
                    <input type="radio" name="p17" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p17" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p17" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p17" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p17" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-23" class="rb">
                    <p>Seberapa sering kamu merasakan kepedulian orang terdekat?</p>
                    <input type="radio" name="p18" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p18" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p18" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p18" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p18" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-24" class="rb">
                    <p>Seberapa sering kamu merasakan ketergantungan dengan orang terdekat?</p>
                    <input type="radio" name="p19" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p19" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p19" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p19" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p19" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-25" class="rb">
                    <p>Seberapa sering kamu memiliki kepercayaan dengan orang terdekat?</p>
                    <input type="radio" name="p20" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p20" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p20" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p20" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p20" value="5">
                    <label for="">5</label>
                </div>
            </div>
            <div class="rb-box">
                <div id="rb-26" class="rb">
                    <h3>Adanya perasaan positif secara umum (General positive effect)</h3>
                </div>
                <div id="rb-27" class="rb">
                    <p>Seberapa sering kamu merasa bahagia ketika bisa membuat orangtuamu bangga?</p>
                    <input type="radio" name="p21" value="1">
                    <label for="">1</label>
                    <input type="radio" name="p21" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p21" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p21" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p21" value="5">
                    <label for="">5</label>
                </div>
                <div id="rb-28" class="rb">
                    <p>Seberapa sering kamu merasa semua hal yang terjadi di hidup kamu merupakan pengalaman yang menyenangkan?</p>
                    <input type="radio" name="p22" value="1" required>
                    <label for="">1</label>
                    <input type="radio" name="p22" value="2">
                    <label for="">2</label>
                    <input type="radio" name="p22" value="3">
                    <label for="">3</label>
                    <input type="radio" name="p22" value="4">
                    <label for="">4</label>
                    <input type="radio" name="p22" value="5">
                    <label for="">5</label>
                </div>
            </div>
        </div>
        <span class="title">Coping Mechanism</span>
        <div class="tab">
            <div class="cops">
                <label for="coping">Kegiatan berikut ini yang paling efektif mengatasi jika saya mengalami masalah kesehatan mental</label>
                <select id="coping" name="coping" required onchange="showInputField()">
                    <option value="" selected hidden>- select -</option>
                    <option value="Konsultasi dengan Psikiater">Konsultasi dengan Psikiater</option>
                    <option value="Mensyukuri keadaan">Mensyukuri keadaan</option>
                    <option value="Berpikir positif">Berpikir positif</option>
                    <option value="Menyalurkan hobi">Menyalurkan hobi</option>
                    <option value="Olahraga">Olahraga</option>
                    <option value="Makan makanan sehat">Makan makanan sehat</option>
                    <option value="Liburan">Liburan</option>
                    <option value="Terbuka kepada seseorang">Terbuka kepada seseorang</option>
                    <option value="Istirahat yang cukup">Istirahat yang cukup</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="otherCoping" id="otherCoping">
                <label for="otherCoping">Ketikkan lainnya di sini:</label>
                <input type="text" id="otherCoping" name="otherCoping">
            </div>
        </div>
        <!-- <div class="btn" style="float:right;">
            <div style="overflow:auto;">
                <div>
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    <button type="button" id="submitBtn" onclick="validateForm()">Submit</button>
                </div>
            </div>
        </div> -->
        <div class="btn" style="float:right;">
            <div style="overflow:auto;">
                <div>
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                </div>
            </div>
        </div>
    </form>
    <!-- ajax -->
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
    <!-- <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "flex";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script> -->
    <!-- <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            var titleSpans = document.getElementsByClassName("title");

            // Hide all tabs and title spans
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none";
                titleSpans[i].style.display = "none";
            }

            // Display the current tab and title span
            x[n].style.display = "flex";
            titleSpans[n].style.display = "inline";

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }

            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");

            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;

            // Hide the current tab and title span:
            x[currentTab].style.display = "none";
            document.getElementsByClassName("title")[currentTab].style.display = "none";

            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;

            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }

            // Otherwise, display the correct tab and title span:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");

            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }

            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }

            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script> -->
    <!-- gagal -->
    <!-- <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            var titleSpans = document.getElementsByClassName("title");

            // Hide all tabs and title spans
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none";
                titleSpans[i].style.display = "none";
            }

            // Display the current tab and title span
            x[n].style.display = "flex";
            titleSpans[n].style.display = "inline";

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }

            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n);
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");

            // Exit the function if any field in the current tab is invalid:
            if (n === 1 && !validateForm()) return false;

            // Hide the current tab and title span:
            x[currentTab].style.display = "none";
            document.getElementsByClassName("title")[currentTab].style.display = "none";

            // Increase or decrease the current tab by 1:
            currentTab += n;

            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }

            // Otherwise, display the correct tab and title span:
            showTab(currentTab);
        }


        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].querySelectorAll("input, select");

            // A loop that checks every input and select field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }

            // If the valid status is false, show an alert:
            if (!valid) {
                alert("Please fill in all required fields.");
            }

            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }

            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script> -->
    <!-- <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script> -->
    <!-- allert oke -->
    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "";
            var titleSpans = document.getElementsByClassName("title");
            // Hide all tabs and title spans
            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none";
                titleSpans[i].style.display = "none";
            }
            // Display the current tab and title span
            x[n].style.display = "flex";
            titleSpans[n].style.display = "inline";

            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            document.getElementsByClassName("title")[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("form").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input, select, textarea");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>
    <script>
        function showAlert(message) {
            var alertDiv = document.createElement('div');
            alertDiv.className = 'custom-alert';
            alertDiv.textContent = message;
            document.body.appendChild(alertDiv);
            setTimeout(function() {
                alertDiv.parentNode.removeChild(alertDiv);
            }, 3000); // Remove the alert after 3 seconds
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].querySelectorAll("input, select");

            // Check if it's the last tab
            var isLastTab = currentTab === x.length - 1;

            for (i = 0; i < y.length; i++) {
                // Exclude "otherCoping" class and, if it's the last tab, exclude validation for all inputs
                if (!(y[i].classList.contains("otherCoping") || (isLastTab && y[i].tagName.toLowerCase() === "input"))) {
                    if (y[i].value == "") {
                        y[i].classList.add("invalid");
                        valid = false;
                    }
                }
            }

            if (!valid) {
                showAlert("Please fill in all required fields.");
            }

            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }

            return valid;
        }
    </script>

    <!-- 
    <script>
        function showAlert(message) {
            var alertDiv = document.createElement('div');
            alertDiv.className = 'custom-alert';
            alertDiv.textContent = message;
            document.body.appendChild(alertDiv);
            setTimeout(function() {
                alertDiv.parentNode.removeChild(alertDiv);
            }, 3000); // Remove the alert after 3 seconds
        }

        function validateForm() {
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].querySelectorAll("input, select");

            for (i = 0; i < y.length; i++) {
                if (y[i].value == "") {
                    y[i].classList.add("invalid");
                    valid = false;
                }
            }

            if (!valid) {
                showAlert("Please fill in all required fields.");
            }

            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }

            return valid;
        }
    </script> -->
    <script>
        function showInputField() {
            var selectElement = document.getElementById('coping');
            var otherInput = document.getElementById('otherCoping');

            if (selectElement.value === 'Lainnya') {
                otherInput.classList.remove('hidden');
                otherInput.required = true;
            } else {
                otherInput.classList.add('hidden');
                otherInput.required = false;
            }
        }
    </script>

</body>

</html>

<?php include('multiselect/footer.php') ?>