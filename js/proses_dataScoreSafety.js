$(function () {
    $('#datepickerTanggalTraining').datepicker();
});

$(function () {
    $('#datepickerTanggalTrainingEdit').datepicker();
});

// DATA SCORE SAFETY EDIT  
$(".edit-dataScoreSafety-admin").click(function () {
    var id_scoreSafetyEdit = $(this).attr("id_scoreSafetyEdit");

    $.ajax({
        url: "../process/proses_adminDataScoreSafety.php",
        method: "post",
        data: {
            editDataScoreSafety_idScoreSafety: id_scoreSafetyEdit
        },
        success: function (data) {
            $("#id_scoreSafetyUpdate").val(id_scoreSafetyEdit);
            $("#edit-dataScoreSafety").html(data);
            $("#editDataScoreSafetyModal").modal("show");
        }
    });
});
// DATA SCORE SAFETY EDIT END

// DATA SCORE SAFETY HAPUS

$(".hapus-dataScoreSafety-admin").click(function () {
    var id_score_safety = $(this).attr("id_score_safety");

    $('#id_scoreSafetyHapus').val(id_score_safety);

    $('#hapusDataMateriSafetyModal').modal("show");
})

// DATA SCORE SAFETY HAPUS END

// DATA SCORE SAFETY LIHAT
$(".info-dataScoreSafety-admin").click(function () {
    var id_scoreSafetyInfo = $(this).attr("id_scoreSafetyInfo");

    $.ajax({
        url: "../process/proses_adminDataScoreSafety.php",
        method: "post",
        data: {
            infoDataScoreSafety_idScoreSafety: id_scoreSafetyInfo
        },
        success: function (data) {
            $("#info-dataScoreSafety").html(data);
            $("#infoDataScoreSafetyModal").modal("show");
        }
    });
});
// DATA SCORE SAFETY LIHAT END