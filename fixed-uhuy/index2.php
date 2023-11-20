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
        <form id="regForm" action="connection.php" method="post">
            <div class="form">
                <span class="title">Kemahasiswaan</span>
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
                    <label for="">Kegiatan di Luar Perkuliahan</label>
                    <select id="kegiatan_luarkampus" name="kegiatan_luarkampus[]" multiple>
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
                <!-- Next and Previous buttons -->
                <div style="overflow:auto;">
                    <div style="float:center;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </div>
            <div class="form">
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
                <!-- Next and Previous buttons -->
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </div>
            <div class="form">
                <span class="title">Kecemasan (Anxiety)</span>
                <div class="tab">
                    <div class="input-field">
                        <label for="">Seberapa sering kamu merasa panik?</label>
                        <!-- <input type="text" id="nim" name="nim" onchange="autofill()" placeholder="NIM" required> -->
                        <label for="">Seberapa sering kamu merasa gelisah?</label>
                        <label for="">Seberapa sering kamu merasa tidak memiliki gairah?</label>
                        <label for="">Seberapa sering kamu merasa tidak bisa tidur?</label>
                    </div>
                </div>
                <span class="title">Depresi (Depression)</span>
                <div class="tab">
                    <div class="input-field">
                        <label for="">Seberapa sering kamu merasa sedih?</label>
                        <label for="">Seberapa sering kamu merasa sangat kesepian?</label>
                        <label for="">Seberapa sering kamu tidak memiliki harapan?</label>
                        <label for="">Seberapa sering kamu merasa putus asa?</label>
                    </div>
                </div>
                <span class="title">Kehilangan kontrol perilaku (Lost of behavioral/emotional control)</span>
                <div class="tab">
                    <div class="input-field">
                        <label for="">Seberapa sering kamu kehilangan kesabaran?</label>
                        <label for="">Seberapa sering kamu marah jika ada orang yang menyinggung perasaanmu?</label>
                        <label for="">Seberapa sering kamu tidak memikirkan dampak dari perbuatan yang kamu lakukan?</label>
                        <label for="">Seberapa sering kamu akan marah ketika apa yang kamu inginkan tidak tercapai?</label>
                    </div>
                </div>
                <span class="title">Kepuasan hidup (Life satisfaction)</span>
                <div class="tab">
                    <div class="input-field">
                        <label for="">Seberapa sering kamu merasa bahagia dalam menjalani kehidupan ini?</label>
                        <label for="">Seberapa sering kamu merasa menikmati apa yang terjadi dalam kehidupan ini?</label>
                        <label for="">Seberapa sering kamu merasa bersyukur dalam melakukan aktivitas sehari-hari?</label>
                        <label for="">Seberapa sering kamu merasa mempunyai semangat dalam melakukan aktivitas sehari-hari?</label>
                    </div>
                </div>
                <span class="title">Kondisi emosional (Emotional ties)</span>
                <div class="tab">
                    <div class="input-field">
                        <label for="">Seberapa sering kamu mendapatkan motivasi?</label>
                        <label for="">Seberapa sering kamu merasakan kepedulian orang terdekat?</label>
                        <label for="">Seberapa sering kamu merasakan ketergantungan dengan orang terdekat?</label>
                        <label for="">Seberapa sering kamu memiliki kepercayaan dengan orang terdekat?</label>
                    </div>
                </div>
                <span class="title">Adanya perasaan positif secara umum (General positive effect)</span>
                <div class="tab">
                    <label for="">Seberapa sering kamu merasa bahagia ketika bisa membuat orangtuamu bangga?</label>
                    <label for="">Seberapa sering kamu merasa semua hal yang terjadi di hidup kamu merupakan pengalaman yang menyenangkan?</label>
                </div>
                <!-- Next and Previous buttons -->
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    </div>
                </div>
            </div>
            <div class="form">
                <span class="title">Coping Mechanism</span>
                <div class="tab">

                </div>
                <!-- Next and Previous buttons -->
                <div style="overflow:auto;">
                    <div style="float:right;">
                        <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                        <button type="button" id="nextBtn" onclick="nextPrev(1)">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <script>
            var currentForm = 0; // Current form is set to be the first form (0)
            showForm(currentForm); // Display the current form

            function showForm(n) {
                // This function will display the specified form of the form...
                var x = document.getElementsByClassName("form");
                x[n].style.display = "block";
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
                // This function will figure out which form to display
                var x = document.getElementsByClassName("form");
                // Exit the function if any field in the current form is invalid:
                if (n == 1 && !validateForm()) return false;
                // Hide the current form:
                x[currentForm].style.display = "none";
                // Increase or decrease the current form by 1:
                currentForm = currentForm + n;
                // if you have reached the end of the form...
                if (currentForm >= x.length) {
                    // ... the form gets submitted:
                    document.getElementById("regForm").submit();
                    return false;
                }
                // Otherwise, display the correct form:
                showForm(currentForm);
            }

            function validateForm() {
                // This function deals with validation of the form fields
                var x, y, i, valid = true;
                x = document.getElementsByClassName("form");
                y = x[currentForm].getElementsByTagName("input");
                // A loop that checks every input field in the current form:
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
                    document.getElementsByClassName("step")[currentForm].className += " finish";
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

<?php include('multiselect/footer.php') ?>