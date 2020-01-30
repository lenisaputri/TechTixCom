$(function () {
    $('#datepickerTanggalTraining').datepicker();
});

$(function () {
    $('#datepickerTanggalTrainingEdit').datepicker();
});

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

$(".hapus-dataScoreSafety-admin").click(function () {
    var id_score_safety = $(this).attr("id_score_safety");

    $('#id_scoreSafetyHapus').val(id_score_safety);

    $('#hapusDataMateriSafetyModal').modal("show");
})

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

$(".edit-dataScoreSafetyDetail-admin").click(function () {
    var id_scoreSafetyDetailEdit = $(this).attr("id_scoreSafetyDetailEdit");

    $.ajax({
        url: "../process/proses_adminDataScoreSafetyDetail.php",
        method: "post",
        data: {
            editDataScoreSafetyDetail_idScoreSafety: id_scoreSafetyDetailEdit
        },
        success: function (data) {
            $("#id_scoreSafetyDetailUpdate").val(id_scoreSafetyDetailEdit);
            $("#edit-dataScoreSafetyDetail").html(data);
            $("#editDataScoreSafetyDetailModal").modal("show");
        }
    });
});

$(".hapus-dataScoreSafetyDetail-admin").click(function () {
    var id_score_safety_detail = $(this).attr("id_score_safety_detail");

    $('#id_scoreSafetyDetailHapus').val(id_score_safety_detail);

    $('#hapusDataScoreSafetyDetailModal').modal("show");
})