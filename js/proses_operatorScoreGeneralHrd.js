$(".info-dataNilaiGeneralHrd-operator").click(function () {
    var id_nilaiGeneralHrdOperatorInfo = $(this).attr("id_nilaiGeneralHrdOperatorInfo");

    $.ajax({
        url: "../process/proses_operatorScoreGeneralHrd.php",
        method: "post",
        data: {
            infoDataScoreGeneralHrdOperator_idScoreGeneralHrd: id_nilaiGeneralHrdOperatorInfo
        },
        success: function (data) {
            $("#info-dataNilaiGeneralHrdOperator").html(data);
            $("#infoDataNilaiGeneralHrdOperatorModal").modal("show");
        }
    });
});