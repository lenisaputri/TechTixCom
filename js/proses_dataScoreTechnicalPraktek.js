$(function () {
  $('#datepickerTanggalPraktekTechnicalPraktek').datepicker();
});

$(function () {
  $('#datepickerTanggalPraktekTechnicalPraktekEdit').datepicker();
});

$(".edit-dataScoreTechnicalPraktek-admin").click(function () {
  var id_scoreTechnicalPraktekEdit = $(this).attr("id_scoreTechnicalPraktekEdit");

  $.ajax({
    url: "../process/proses_adminDataScoreTechnicalPraktek.php",
    method: "post",
    data: {
      editDataScoreTechnicalPraktek_idScoreTechnicalPraktek: id_scoreTechnicalPraktekEdit
    },
    success: function (data) {
      $("#id_scoreTechnicalPraktekUpdate").val(id_scoreTechnicalPraktekEdit);
      $("#edit-dataScoreTechnicalPraktek").html(data);
      $("#editDataScoreTechnicalPraktekModal").modal("show");
    }
  });
});

$(".hapus-dataScoreTechnicalPraktek-admin").click(function () {
  var id_score_technical_praktek = $(this).attr("id_score_technical_praktek");

  $('#id_scoreTechnicalPraktekHapus').val(id_score_technical_praktek);

  $('#hapusDataScoreTechnicalPraktekModal').modal("show");
});

$(".info-dataScoreTechnicalPraktek-admin").click(function () {
  var id_scoreTechnicalPraktekInfo = $(this).attr("id_scoreTechnicalPraktekInfo");

  $.ajax({
    url: "../process/proses_adminDataScoreTechnicalPraktek.php",
    method: "post",
    data: {
      infoDataScoreTechnicalPraktek_idScoreTechnicalPraktek: id_scoreTechnicalPraktekInfo
    },
    success: function (data) {
      $("#info-dataScoreTechnicalPraktek").html(data);
      $("#infoDataScoreTechnicalPraktekModal").modal("show");
    }
  });
});
