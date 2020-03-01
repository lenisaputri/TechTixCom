$(".info-dataNilaiGeneralHrd-supervisor").click(function () {
    var id_nilaiGeneralHrdSupervisorInfo = $(this).attr("id_nilaiGeneralHrdSupervisorInfo");

    $.ajax({
        url: "../process/proses_supervisorScoreGeneralHrd.php",
        method: "post",
        data: {
            infoDataScoreGeneralHrdSupervisor_idScoreSupervisor: id_nilaiGeneralHrdSupervisorInfo
        },
        success: function (data) {
            $("#info-dataNilaiGeneralHrdSupervisor").html(data);
            $("#infoDataNilaiGeneralHrdSupervisorModal").modal("show");
        }
    });
});