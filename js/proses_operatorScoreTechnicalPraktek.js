$(".info-dataNilaiTechnicalPraktek-operator").click(function () {
    var id_nilaiTechnicalPraktekOperatorInfo = $(this).attr("id_nilaiTechnicalPraktekOperatorInfo");

    $.ajax({
        url: "../process/proses_operatorScoreTechnicalPraktek.php",
        method: "post",
        data: {
            infoDataScoreTechnicalPraktekOperator_idScoreTechnicalOperator: id_nilaiTechnicalPraktekOperatorInfo
        },
        success: function (data) {
            $("#info-dataNilaiTechnicalPraktekOperator").html(data);
            $("#infoDataNilaiTechnicalPraktekOperatorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiTechnicalPraktek-operator").click(function () {
    var id_nilaiTechnicalPraktekOperatorSpider = $(this).attr("id_nilaiTechnicalPraktekOperatorSpider");

    $.ajax({
        url: "../process/proses_operatorScoreTechnicalPraktek.php",
        method: "post",
        data: {
            spiderDataScoreTechnicalPraktekOperator_idScoreTechnicalOperator: id_nilaiTechnicalPraktekOperatorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiTechnicalPraktekOperator").html(data);
            $("#spiderDataNilaiTechnicalPraktekOperatorModal").modal("show");
        }
    });
});