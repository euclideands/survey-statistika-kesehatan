<?php
$conn = mysqli_connect("localhost", "id20176098_abilll", "UjiCoba123!", "id20176098_statistika_kesehatan");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data){
    global $conn;
    $nim = stripslashes($data["nim"]);
    $nama = ucwords(strtolower(stripslashes($data["nama"])));
    $result = mysqli_query($conn, "SELECT * FROM survey WHERE nim='$nim'");

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('WOY NIM ITU DAH KEREGIST');</script>";
        return false;
    }

    if (strlen($nim) !== 10) {
        echo "<script>
                alert('NIM harus terdiri dari 10 karakter!');
              </script>";
        return false;
    }

    mysqli_query($conn, "INSERT INTO survey VALUES('$nim', '$nama')");

    return mysqli_affected_rows($conn);
}
?>
