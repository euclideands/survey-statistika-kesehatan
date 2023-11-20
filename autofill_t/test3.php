<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr><td>NIM</td><td><input type="text" id="nim" onkeyup="autofill()"></td></tr>
        <tr><td>NAMA</td><td><input type="text" id="nama"></td></tr>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function autofill() {
            var nim = $("#nim").val();
            $.ajax({
                url: 'autofill-ajax.php',
                data: { nim: nim },
                dataType: 'json',
            }).done(function (data) {
                $('#nama').val(data.nama).prop('readonly', true);
            });
        }
    </script>
</body>
</html>
