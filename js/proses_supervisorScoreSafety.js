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