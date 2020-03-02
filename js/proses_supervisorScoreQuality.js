$(".info-dataNilaiQuality-supervisor").click(function () {
    var id_nilaiQualitySupervisorInfo = $(this).attr("id_nilaiQualitySupervisorInfo");

    $.ajax({
        url: "../process/proses_supervisorScoreQuality.php",
        method: "post",
        data: {
            infoDataScoreQualitySupervisor_idScoreSupervisor: id_nilaiQualitySupervisorInfo
        },
        success: function (data) {
            $("#info-dataNilaiQualitySupervisor").html(data);
            $("#infoDataNilaiQualitySupervisorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiQuality-supervisor").click(function () {
    var id_nilaiQualitySupervisorSpider = $(this).attr("id_nilaiQualitySupervisorSpider");

    $.ajax({
        url: "../process/proses_supervisorScoreQuality.php",
        method: "post",
        data: {
            spiderDataScoreQualitySupervisor_idScoreQuality: id_nilaiQualitySupervisorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiQualitySupervisor").html(data);
            $("#spiderDataNilaiQualitySupervisorModal").modal("show");
        }
    });
});