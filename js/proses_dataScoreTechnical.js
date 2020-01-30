$(function () {
  $('#datepickerTanggalTraining').datepicker();
});

$(function () {
  $('#datepickerTanggalTrainingEdit').datepicker();
});

// DATA SCORE Technical EDIT  
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
// DATA SCORE Technical EDIT END

// DATA SCORE Technical HAPUS

$(".hapus-dataScoreTechnical-admin").click(function () {
  var id_score_technical = $(this).attr("id_score_qulity");

  $('#id_scoreTechnicalHapus').val(id_score_technical);

  $('#hapusDataMateriTechnicalModal').modal("show");
})

// DATA SCORE Technical HAPUS END

// DATA SCORE Technical LIHAT
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
// DATA SCORE Technical LIHAT END

// DATA SCORE Technical EDIT DETAIL
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
// DATA SCORE Technical EDIT DETAIL END