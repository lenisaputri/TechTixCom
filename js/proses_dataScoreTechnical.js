$(function () {
  $('#datepickerTanggalTrainingTechnical').datepicker();
});

$(function () {
  $('#datepickerTanggalTrainingTechnicalEdit').datepicker();
});

$(".edit-dataScoreTechnical-admin").click(function () {
  var id_scoreTechnicalEdit = $(this).attr("id_scoreTechnicalEdit");

  $.ajax({
    url: "../process/proses_adminDataScoreTechnical.php",
    method: "post",
    data: {
      editDataScoreTechnical_idScoreTechnical: id_scoreTechnicalEdit
    },
    success: function (data) {
      $("#id_scoreTechnicalUpdate").val(id_scoreTechnicalEdit);
      $("#edit-dataScoreTechnical").html(data);
      $("#editDataScoreTechnicalModal").modal("show");
    }
  });
});

$(".hapus-dataScoreTechnical-admin").click(function () {
  var id_score_technical = $(this).attr("id_score_technical");

  $('#id_scoreTechnicalHapus').val(id_score_technical);

  $('#hapusDataMateriTechnicalModal').modal("show");
})

$(".info-dataScoreTechnical-admin").click(function () {
  var id_scoreTechnicalInfo = $(this).attr("id_scoreTechnicalInfo");

  $.ajax({
    url: "../process/proses_adminDataScoreTechnical.php",
    method: "post",
    data: {
      infoDataScoreTechnical_idScoreTechnical: id_scoreTechnicalInfo
    },
    success: function (data) {
      $("#info-dataScoreTechnical").html(data);
      $("#infoDataScoreTechnicalModal").modal("show");
    }
  });
});

$(".edit-dataScoreTechnicalDetail-admin").click(function () {
  var id_scoreTechnicalDetailEdit = $(this).attr("id_scoreTechnicalDetailEdit");

  $.ajax({
    url: "../process/proses_adminDataScoreTechnicalDetail.php",
    method: "post",
    data: {
      editDataScoreTechnicalDetail_idScoreTechnical: id_scoreTechnicalDetailEdit
    },
    success: function (data) {
      $("#id_scoreTechnicalDetailUpdate").val(id_scoreTechnicalDetailEdit);
      $("#edit-dataScoreTechnicalDetail").html(data);
      $("#editDataScoreTechnicalDetailModal").modal("show");
    }
  });
});

$(".hapus-dataScoreTechnicalDetail-admin").click(function () {
  var id_score_technical_detail = $(this).attr("id_score_technical_detail");

  $('#id_scoreTechnicalDetailHapus').val(id_score_technical_detail);

  $('#hapusDataScoreTechnicalDetailModal').modal("show");
})