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