$(".info-dataNilaiTechnicalObservasi-supervisor").click(function () {
    var id_nilaiTechnicalObservasiSupervisorInfo = $(this).attr("id_nilaiTechnicalObservasiSupervisorInfo");

    $.ajax({
        url: "../process/proses_supervisorScoreTechnicalObservasi.php",
        method: "post",
        data: {
            infoDataScoreTechnicalObservasiSupervisor_idScoreSupervisor: id_nilaiTechnicalObservasiSupervisorInfo
        },
        success: function (data) {
            $("#info-dataNilaiTechnicalObservasiSupervisor").html(data);
            $("#infoDataNilaiTechnicalObservasiSupervisorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiTechnicalObservasi-supervisor").click(function () {
    var id_nilaiTechnicalObservasiSupervisorSpider = $(this).attr("id_nilaiTechnicalObservasiSupervisorSpider");

    $.ajax({
        url: "../process/proses_supervisorScoreTechnicalObservasi.php",
        method: "post",
        data: {
            spiderDataScoreTechnicalObservasiSupervisor_idScoreTechnicalObservasi: id_nilaiTechnicalObservasiSupervisorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiTechnicalObservasiSupervisor").html(data);
            $("#spiderDataNilaiTechnicalObservasiSupervisorModal").modal("show");
        }
    });
});