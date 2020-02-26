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