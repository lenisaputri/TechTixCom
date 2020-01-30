$(function () {
  $('#datepickerTanggalTraining').datepicker();
});

$(function () {
  $('#datepickerTanggalTrainingEdit').datepicker();
});

// DATA SCORE Quality EDIT  
$(".edit-dataScoreQuality-admin").click(function () {
  var id_scoreQualityEdit = $(this).attr("id_scoreQualityEdit");

  $.ajax({
      url: "../process/proses_adminDataScoreQuality.php",
      method: "post",
      data: {
          editDataScoreQuality_idScoreQuality: id_scoreQualityEdit
      },
      success: function (data) {
          $("#id_scoreQualityUpdate").val(id_scoreQualityEdit);
          $("#edit-dataScoreQuality").html(data);
          $("#editDataScoreQualityModal").modal("show");
      }
  });
});
// DATA SCORE Quality EDIT END

// DATA SCORE Quality HAPUS

$(".hapus-dataScoreQuality-admin").click(function () {
  var id_score_quality = $(this).attr("id_score_qulity");

  $('#id_scoreQualityHapus').val(id_score_quality);

  $('#hapusDataMateriQualityModal').modal("show");
})

// DATA SCORE Quality HAPUS END

// DATA SCORE Quality LIHAT
$(".info-dataScoreQuality-admin").click(function () {
  var id_scoreQualityInfo = $(this).attr("id_scoreQualityInfo");

  $.ajax({
      url: "../process/proses_adminDataScoreQuality.php",
      method: "post",
      data: {
          infoDataScoreQuality_idScoreQuality: id_scoreQualityInfo
      },
      success: function (data) {
          $("#info-dataScoreQuality").html(data);
          $("#infoDataScoreQualityModal").modal("show");
      }
  });
});
// DATA SCORE Quality LIHAT END

// DATA SCORE Quality EDIT DETAIL
$(".edit-dataScoreQualityDetail-admin").click(function () {
  var id_scoreQualityDetailEdit = $(this).attr("id_scoreQualityDetailEdit");

  $.ajax({
      url: "../process/proses_adminDataScoreQualityDetail.php",
      method: "post",
      data: {
          editDataScoreQualityDetail_idScoreQuality: id_scoreQualityDetailEdit
      },
      success: function (data) {
          $("#id_scoreQualityDetailUpdate").val(id_scoreQualityDetailEdit);
          $("#edit-dataScoreQualityDetail").html(data);
          $("#editDataScoreQualityDetailModal").modal("show");
      }
  });
});
// DATA SCORE Quality EDIT DETAIL END