$(".info-dataNilaiTechnicalOnline-operator").click(function () {
    var id_nilaiTechnicalOnlineOperatorInfo = $(this).attr("id_nilaiTechnicalOnlineOperatorInfo");

    $.ajax({
        url: "../process/proses_operatorScoreTechnical.php",
        method: "post",
        data: {
            infoDataScoreTechnicalOnlineOperator_idScoreTechnicalOnline: id_nilaiTechnicalOnlineOperatorInfo
        },
        success: function (data) {
            $("#info-dataNilaiTechnicalOnlineOperator").html(data);
            $("#infoDataNilaiTechnicalOnlineOperatorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiTechnicalOnline-operator").click(function () {
    var id_nilaiTechnicalOnlineOperatorSpider = $(this).attr("id_nilaiTechnicalOnlineOperatorSpider");

    $.ajax({
        url: "../process/proses_operatorScoreTechnical.php",
        method: "post",
        data: {
            spiderDataScoreTechnicalOnlineOperator_idScoreTechnicalOnline: id_nilaiTechnicalOnlineOperatorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiTechnicalOnlineOperator").html(data);
            $("#spiderDataNilaiTechnicalOnlineOperatorModal").modal("show");
        }
    });
});