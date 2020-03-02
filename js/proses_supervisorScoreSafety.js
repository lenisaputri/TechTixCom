$(".info-dataNilaiSafety-supervisor").click(function () {
    var id_nilaiSafetySupervisorInfo = $(this).attr("id_nilaiSafetySupervisorInfo");

    $.ajax({
        url: "../process/proses_supervisorScoreSafety.php",
        method: "post",
        data: {
            infoDataScoreSafetySupervisor_idScoreSupervisor: id_nilaiSafetySupervisorInfo
        },
        success: function (data) {
            $("#info-dataNilaiSafetySupervisor").html(data);
            $("#infoDataNilaiSafetySupervisorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiSafety-supervisor").click(function () {
    var id_nilaiSafetySupervisorSpider = $(this).attr("id_nilaiSafetySupervisorSpider");

    $.ajax({
        url: "../process/proses_supervisorScoreSafety.php",
        method: "post",
        data: {
            spiderDataScoreSafetySupervisor_idScoreSafety: id_nilaiSafetySupervisorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiSafetySupervisor").html(data);
            $("#spiderDataNilaiSafetySupervisorModal").modal("show");
        }
    });
});