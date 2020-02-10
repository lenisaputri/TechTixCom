$(".info-detailScoreSafety-supervisor").click(function () {
    var id_scoreSafetySupervisor = $(this).attr("id_scoreSafetySupervisor");

    $.ajax({
        url: "../process/proses_supervisorScoreSafety.php",
        method: "post",
        data: {
            infoDetailScoreSafetySupervisor_idScoreSafety: id_scoreSafetySupervisor
        },
        success: function (data) {
            $("#info-dataScoreSafety").html(data);
        }
    });
});