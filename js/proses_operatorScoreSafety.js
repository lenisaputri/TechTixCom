$(".info-dataNilaiSafety-operator").click(function () {
    var id_nilaiSafetyOperatotInfo = $(this).attr("id_nilaiSafetyOperatotInfo");

    $.ajax({
        url: "../process/proses_operatorScoreSafety.php",
        method: "post",
        data: {
            infoDataScoreSafetyOperator_idScoreSafety: id_nilaiSafetyOperatotInfo
        },
        success: function (data) {
            $("#info-dataNilaiSafetyOperator").html(data);
            $("#infoDataNilaiSafetyOperatorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiSafety-operator").click(function () {
    var id_nilaiSafetyOperatorSpider = $(this).attr("id_nilaiSafetyOperatorSpider");

    $.ajax({
        url: "../process/proses_operatorScoreSafety.php",
        method: "post",
        data: {
            spiderDataScoreSafetyOperator_idScoreSafety: id_nilaiSafetyOperatorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiSafetyOperator").html(data);
            $("#spiderDataNilaiSafetyOperatorModal").modal("show");
        }
    });
});