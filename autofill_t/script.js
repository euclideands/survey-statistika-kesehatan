function fillName() {
    var selectedNIM = $("#nimSelect").val();

    // Cetak ke konsol untuk memastikan nilai NIM yang diambil dengan benar
    console.log("Selected NIM: " + selectedNIM);

    // Kirim permintaan ke server dengan AJAX
    $.ajax({
        type: "POST",
        url: "get_nama.php",
        data: { nim: selectedNIM },
        success: function(response) {
            // Isi otomatis kolom nama dengan hasil dari server
            $("#namaInput").val(response);
        }
    });
}
