$(".info-dataNilaiQuality-operator").click(function () {
    var id_nilaiQualityOperatorInfo = $(this).attr("id_nilaiQualityOperatorInfo");

    $.ajax({
        url: "../process/proses_operatorScoreQuality.php",
        method: "post",
        data: {
            infoDataScoreQualityOperator_idScoreQuality: id_nilaiQualityOperatorInfo
        },
        success: function (data) {
            $("#info-dataNilaiQualityOperator").html(data);
            $("#infoDataNilaiQualityOperatorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiQuality-operator").click(function () {
    var id_nilaiQualityOperatorSpider = $(this).attr("id_nilaiQualityOperatorSpider");

    $.ajax({
        url: "../process/proses_operatorScoreQuality.php",
        method: "post",
        data: {
            spiderDataScoreQualityOperator_idScoreQuality: id_nilaiQualityOperatorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiQualityOperator").html(data);
            $("#spiderDataNilaiQualityOperatorModal").modal("show");
        }
    });
});