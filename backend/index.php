<?php
include 'connect.php';
include('multiselect/header.php');
?>

<!DOCTYPE html>
<html>
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
            source: "connect.php"
        });
    });
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Test</title>
</head>

<style media="screen">
    label {
        display: block;
    }
</style>

<script>
    function showOptions(e) {
        let divOptions = document.getElementById("divOptions");
        if (divOptions.style.display == "none" || divOptions.style.display == "") {
            divOptions.style.display = "inline-block";
        } else {
            divOptions.style.display = "none";
        }
    }

    function clickMe(e) {
        console.log('click me');
        e.stopPropagation();
    }

    function hideOptions(e) {
        let divOptions = document.getElementById("divOptions");

        if (divOptions.contains(e.target)) {
            divOptions.style.display = "inline-block";
        } else {
            divOptions.style.display = "none";
        }
    }
</script>

<body>
    <form action="" class="" method="post" autocomplete="off">
        <label for="">NIM</label>
        <input type="text" id="nim" name="nim" onchange="autofill()" required>
        <label for="">Nama</label>
        <input type="text" id="nama" name="nama" required value="">
        <label for="">Angkatan</label>
        <input type="number" id="angkatan" name="angkatan" required value="">
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

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dynamic Input Field</title>
            <style>
                .hidden {
                    display: none;
                }
            </style>
        </head>

        <body>

            <div class="input-field">
                <label for="testla">Jenis Kelamin</label>
                <select id="testla" name="testla" required onchange="showInputField()" required>
                    <option value="" selected hidden>- select -</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div id="otherInput" class="input-field hidden">
                <label for="other">Lainnya</label>
                <input type="text" id="other" name="other" onchange="showInputField()">
                <script>
                    function showInputField() {
                        var selectElement = document.getElementById('testla');
                        var otherInput = document.getElementById('otherInput');

                        if (selectElement.value === 'Lainnya') {
                            otherInput.classList.remove('hidden');
                            otherInput.setAttribute('required', true);
                        } else {
                            otherInput.classList.add('hidden');
                            otherInput.removeAttribute('required');
                        }
                    }
                </script>
            </div>

            <!-- <script>
                function showInputField() {
                    var selectElement = document.getElementById('testla');
                    var otherInput = document.getElementById('otherInput');

                    if (selectElement.value === 'Lainnya') {
                        otherInput.classList.remove('hidden');
                        otherInput.setAttribute('required', true);
                    } else {
                        otherInput.classList.add('hidden');
                        otherInput.removeAttribute('required');
                        otherInput.value = 'ya';
                    }
                }
            </script> -->

            <div class="input-field">
                <label for="coping">Kegiatan berikut ini yang paling efektif mengatasi jika saya mengalami masalah kesehatan mental</label>
                <select id="coping" name="coping" required onchange="showInputField()" required>
                    <option value="" selected hidden>- select -</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div id="otherCoping" class="input-field hidden">
                <label for="otherCoping">Lainnya:</label>
                <input type="text" id="otherCoping" name="otherCoping" onchange="showInputField()">
            </div>

            <style>
                .quest {
                    display: flex;
                    flex-direction: column;
                    align-items: flex-end;
                }

                .quest div {
                    display: flex;
                    align-items: center;
                }

                .quest input {
                    margin-right: 5px;
                    /* Jarak antara radio button dan teks */
                }
            </style>

        </body>

        </html>


        <br>
        <button type="submit" name="submit">Submit</button>
    </form>

    <br><br>
    <div style="margin:10px 0px 0px 0px;">
        <a class="btn btn-default read-more" style="background:#3399ff;color:white" href="http://www.phpzag.com/multi-select-dropdown-with-checkbox-using-bootstrap-jquery-and-php" title="">Back to Tutorial</a>
    </div>
    <?php include('multiselect/footer.php'); ?>

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

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let checkbox = document.querySelectorAll("#divOptions input");
            let inputCheckbox = document.getElementById("inputCheckbox");

            for (let i = 0; i < checkbox.length; i++) {
                checkbox[i].addEventListener("change", (e) => {
                    if (e.target.checked == true) {
                        if (inputCheckbox.value == "") {
                            inputCheckbox.value = checkbox[i].value;
                        } else {
                            inputCheckbox.value += `,${checkbox[i].value}`;
                        }
                    } else {
                        let values = inputCheckbox.value.split(",");

                        for (let r = 0; r < values.length; r++) {
                            if (values[r] == e.target.value) {
                                values.splice(r, 1);
                            }
                        }
                        inputCheckbox.value = values;
                    }
                });
            }
        });
    </script>

    <script>
        function showInputField() {
            var selectElement = document.getElementById('coping');
            var otherInput = document.getElementById('otherCoping');

            if (selectElement.value === 'Lainnya') {
                otherInput.classList.remove('hidden');
                otherInput.setAttribute('required', true);
            } else {
                otherInput.classList.add('hidden');
                otherInput.removeAttribute('required');
            }
        }
    </script>


    <style>
        .rb-box {
            width: 100%;
            /* max-width: 420px; */
            /* margin: 50px auto; */
            padding: 1.3em;
            background: #fff;
            border-radius: .75em;
            -webkit-filter: drop-shadow(1px 2px 5px rgba(0, 0, 0, .1));
            filter: drop-shadow(1px 2px 5px rgba(0, 0, 0, .1));
            box-shadow:
                /* 0 2px 2px rgba(243,49,128,.5), */
                0 0px 5px rgba(243, 49, 128, .15),
                0 0px 4px rgba(0, 0, 0, .35),
                0 5px 20px rgba(243, 49, 128, .25),
                0 15px 50px rgba(243, 49, 128, .75),
                /* inset 0 0 15px rgba(255,255,255,.05); */
        }

        /* Custom Radio Button */
        p {
            font-size: 14px;
            margin-left: 10px;
        }

        /* .rb {
    padding: 16px 0;
    text-align: left;
    background: #f44336;
    border-radius: .3em;
  } */

        .rb-tab {
            display: inline-block;
            position: relative;
            /* width: 20%; */
            padding: 15px;
            margin-right: 5px;
            margin-left: 10px;
        }

        .rb-txt {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 10px;
            color: #2e2e2e;
        }

        .rb-spot {
            position: absolute;
            width: 25px;
            height: 25px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: transparent;
            border: 3px solid #bbbbbb;
            border-radius: 100%;
            cursor: pointer;
            transition: ease .5s;
        }

        .rb-tab-active .rb-spot {
            /* background: rgba(0,0,0,.35); */
            border: 3px solid #4070f4;
        }
    </style>
</body>

</html>