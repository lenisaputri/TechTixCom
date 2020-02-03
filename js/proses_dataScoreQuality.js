$(function () {
  $('#datepickerTanggalTrainingQuality').datepicker();
});

$(function () {
  $('#datepickerTanggalTrainingQualityEdit').datepicker();
});

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

$(".hapus-dataScoreQuality-admin").click(function () {
  var id_score_quality = $(this).attr("id_score_quality");

  $('#id_scoreQualityHapus').val(id_score_quality);

  $('#hapusDataScoreQualityModal').modal("show");
})

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

$(".edit-dataScoreQualityDetail-admin").click(function () {
  var id_scoreQualityDetailEdit = $(this).attr("id_scoreQualityDetailEdit");

  $.ajax({
    url: "../proses_adminDataScoreQualityDetail.php",
    method: "post",
    data: {
      editDataScoreQuality_idScoreQuality: id_scoreQualityDetailEdit
    },
    success: function (data) {
      $("#id_scoreQualityDetailUpdate").val(id_scoreQualityDetailEdit);
      $("#edit-dataScoreSafetyDetail").html(data);
      $("editDataScoreSafetyDetailModal").modal("show");
    }
  });
});

$(".hapus-dataScoreQualityDetail-admin").click(function () {
  var id_score_quality_detail = $(this).attr("id_score_quality_detail");

  $('#id_scoreQualityHapus').val(id_score_quality_detail);

  $('#hapusDataScoreQualityDetailModel').modal("show");
})