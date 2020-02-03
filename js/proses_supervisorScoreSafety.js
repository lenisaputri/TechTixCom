$(".info-dataScoreSafety-supervisor").click(function () {
    var id_scoreSafetyInfo = $(this).attr("id_scoreSafetyInfo");

    $.ajax({
        url: "../process/proses_adminDataScoreSafety.php",
        method: "post",
        data: {
            infoDataScoreSafety_idScoreSafety: id_scoreSafetyInfo
        },
        success: function (data) {
            $("#info-dataScoreSafety").html(data);
            $("#infoDataScoreSafetyModal").modal("show");
        }
    });
});