$(".info-dataNilaiTechnicalOnline-supervisor").click(function () {
    var id_nilaiTechnicalOnlineSupervisorInfo = $(this).attr("id_nilaiTechnicalOnlineSupervisorInfo");

    $.ajax({
        url: "../process/proses_supervisorScoreTechnical.php",
        method: "post",
        data: {
            infoDataScoreTechnicalOnlineSupervisor_idScoreSupervisor: id_nilaiTechnicalOnlineSupervisorInfo
        },
        success: function (data) {
            $("#info-dataNilaiTechnicalOnlineSupervisor").html(data);
            $("#infoDataNilaiTechnicalOnlineSupervisorModal").modal("show");
        }
    });
});

$(".spider-dataNilaiTechnicalOnline-supervisor").click(function () {
    var id_nilaiTechnicalOnlineSupervisorSpider = $(this).attr("id_nilaiTechnicalOnlineSupervisorSpider");

    $.ajax({
        url: "../process/proses_supervisorScoreTechnical.php",
        method: "post",
        data: {
            spiderDataScoreTechnicalOnlineSupervisor_idScoreTechnicalOnline: id_nilaiTechnicalOnlineSupervisorSpider
        },
        success: function (data) {
            $("#spider-dataNilaiTechnicalOnlineSupervisor").html(data);
            $("#spiderDataNilaiTechnicalOnlineSupervisorModal").modal("show");
        }
    });
});