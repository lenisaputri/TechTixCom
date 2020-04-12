$(".info-dataNilaiTechnicalPraktek-supervisor").click(function () {
    var id_nilaiTechnicalPraktekSupervisorInfo = $(this).attr("id_nilaiTechnicalPraktekSupervisorInfo");

    $.ajax({
        url: "../process/proses_supervisorScoreTechnicalPraktek.php",
        method: "post",
        data: {
            infoDataScoreTechnicalPraktekSupervisor_idScoreSupervisor: id_nilaiTechnicalPraktekSupervisorInfo
        },
        success: function (data) {
            $("#info-dataNilaiTechnicalPraktekSupervisor").html(data);
            $("#infoDataNilaiTechnicalPraktekSupervisorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiTechnicalPraktek-supervisor").click(function () {
    var id_nilaiTechnicalPraktekSupervisorSpider = $(this).attr("id_nilaiTechnicalPraktekSupervisorSpider");

    $.ajax({
        url: "../process/proses_supervisorScoreTechnicalPraktek.php",
        method: "post",
        data: {
            spiderDataScoreTechnicalPraktekSupervisor_idScoreTechnicalPraktek: id_nilaiTechnicalPraktekSupervisorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiTechnicalPraktekSupervisor").html(data);
            $("#spiderDataNilaiTechnicalPraktekSupervisorModal").modal("show");
        }
    });
});