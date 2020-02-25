
$(".info-dataNilaiSafety-operator").click(function () {
    var id_nilaiSafetyOperatotInfo = $(this).attr("id_nilaiSafetyOperatotInfo");
    var tanggalTrainingOperator= $(this).attr("tanggalTrainingOperator");

    $.ajax({
        url: "../process/proses_operatorScoreSafety.php",
        method: "post",
        data: {
            infoDataScoreSafetyOperator_idScoreSafety: id_nilaiSafetyOperatotInfo,
            infoDataScoreSafetyOperator_tanggalTrainingOperator : tanggalTrainingOperator
        },
        success: function (data) {
            $("#info-dataNilaiSafetyOperator").html(data);
            $("#infoDataNilaiSafetyOperatorModal").modal("show");
        }
    });
});