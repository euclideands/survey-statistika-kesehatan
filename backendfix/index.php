<?php
include 'conn.php';
include 'header.php';
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
    <script src="script.js"></script>
    <script>
        $(function() {
            $("#nim").autocomplete({
                source: "conn.php"
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
    <form id="form" action="conn.php" method="post">
        <div class="header">
            <h1>Suvei Kesehatan Mental</h1>
            <!-- Circles which indicates the steps of the form: -->
            <div class="bullet">
                <span class="step"></span>
                <span class="step"></span>
            </div>
        </div>
        <span class="title">Data Mahasiswa</span>
        <div class="tab">
            <div class="input-field">
                <label for="">NIM</label>
                <input type="text" id="nim" name="nim" onchange="autofill()" placeholder="nim" required>
            </div>
            <div class="input-field">
                <label for="">Nama</label>
                <input type="text" id="nama" name="nama" required value="" placeholder="nama" required>
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
        <div class="btn" style="overflow:auto;">
            <div style="overflow:auto;">
                <div>
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                    <button type="submit" name="submit">Submit</button>
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
                    url: "conn.php",
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
                url: "conn.php",
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

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            var titleSpans = document.getElementsByClassName("title");
            var submitBtnContainer = document.getElementById("submitBtnContainer");

            for (var i = 0; i < x.length; i++) {
                x[i].style.display = "none";
                titleSpans[i].style.display = "none";
            }

            x[n].style.display = "flex";
            titleSpans[n].style.display = "inline";

            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }

            if (n == (x.length - 1)) {
                // If it's the last tab, show the submit button container
                submitBtnContainer.style.display = "block";
                // Hide the "Next" button
                document.getElementById("nextBtn").style.display = "none";
            } else {
                submitBtnContainer.style.display = "none";
                // Show the "Next" button
                document.getElementById("nextBtn").style.display = "inline";
            }

            fixStepIndicator(n);
        }


        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");

            if (n == 1 && !validateForm()) return false;

            x[currentTab].style.display = "none";
            document.getElementsByClassName("title")[currentTab].style.display = "none";
            currentTab = currentTab + n;

            if (currentTab >= x.length) {
                document.getElementById("form").submit();
                return false;
            }

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
    </script>
    <script>
        function showInputField() {
            var selectElement = document.getElementById('coping');
            var otherInput = document.getElementById('otherCoping');

            if (selectElement.value === 'Lainnya') {
                otherInput.classList.remove('hidden');
                // otherInput.setAttribute('required', true);
            } else {
                otherInput.classList.add('hidden');
                // otherInput.removeAttribute('required');
            }
        }
    </script>

</body>

</html>

<?php include('footer.php') ?>