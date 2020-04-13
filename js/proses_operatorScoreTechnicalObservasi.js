$(".info-dataNilaiTechnicalObservasi-operator").click(function () {
    var id_nilaiTechnicalObservasiOperatorInfo = $(this).attr("id_nilaiTechnicalObservasiOperatorInfo");

    $.ajax({
        url: "../process/proses_operatorScoreTechnicalObservasi.php",
        method: "post",
        data: {
            infoDataScoreTechnicalObservasiOperator_idScoreTechnicalOperator: id_nilaiTechnicalObservasiOperatorInfo
        },
        success: function (data) {
            $("#info-dataNilaiTechnicalObservasiOperator").html(data);
            $("#infoDataNilaiTechnicalObservasiOperatorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiTechnicalObservasi-operator").click(function () {
    var id_nilaiTechnicalObservasiOperatorSpider = $(this).attr("id_nilaiTechnicalObservasiOperatorSpider");

    $.ajax({
        url: "../process/proses_operatorScoreTechnicalObservasi.php",
        method: "post",
        data: {
            spiderDataScoreTechnicalObservasiOperator_idScoreTechnicalOperator: id_nilaiTechnicalObservasiOperatorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiTechnicalObservasiOperator").html(data);
            $("#spiderDataNilaiTechnicalObservasiOperatorModal").modal("show");
        }
    });
});