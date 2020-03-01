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