<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Form Jawaban</title>
</head>
<body>

    <div class="form-container">
        <form id="answerForm" action="connection.php" method="post">
            <label for="nim">Pilih NIM:</label>
            <select name="nim" id="nim">
                <!-- Populate dropdown options dynamically from the database -->
                <?php
                    // Connect to your database and fetch NIM values
                    // Replace 'your_database' and 'your_table' with your actual database and table names
                    $conn = new mysqli('localhost', 'root', '', 'statistika_kesehatan');
                    $result = $conn->query("SELECT nim FROM survey");

                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['nim'] . "'>" . $row['nim'] . "</option>";
                    }

                    $conn->close();
                ?>
            </select>

            <label for="answer">Jawaban Nomor 2:</label>
            <textarea name="answer" id="answer" rows="4" cols="50"></textarea>

            <label for="status_akademik">Status Akademik:</label>
            <div>
                <input type="radio" id="aktif" name="status_akademik" value="mahasiswa aktif">
                <label for="aktif">Mahasiswa Aktif</label>

                <input type="radio" id="cuti" name="status_akademik" value="mahasiswa cuti">
                <label for="cuti">Mahasiswa Cuti</label>

                <input type="radio" id="mbkm" name="status_akademik" value="mahasiswa program mbkm">
                <label for="mbkm">Mahasiswa Program MBKM</label>
            </div>

            <label for="kegiatan">Kegiatan Luar Kampus:</label>
            <select name="kegiatan[]" id="kegiatan" multiple>
                <option value="bem">BEM</option>
                <option value="hima">HIMA</option>
                <option value="ukm">UKM</option>
            </select>


            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>
