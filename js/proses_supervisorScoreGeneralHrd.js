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

$(".spider-dataNilaiGeneralHrd-supervisor").click(function () {
    var id_nilaiGeneralHrdSupervisorSpider = $(this).attr("id_nilaiGeneralHrdSupervisorSpider");

    $.ajax({
        url: "../process/proses_supervisorScoreGeneralHrd.php",
        method: "post",
        data: {
            spiderDataScoreGeneralHrdSupervisor_idScoreGeneralHrd: id_nilaiGeneralHrdSupervisorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiGeneralHrdSupervisor").html(data);
            $("#spiderDataNilaiGeneralHrdSupervisorModal").modal("show");
        }
    });
});