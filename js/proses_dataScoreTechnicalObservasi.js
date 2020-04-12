$(function () {
  $('#datepickerTanggalPraktekTechnicalObservasi').datepicker();
});

$(function () {
  $('#datepickerTanggalPraktekTechnicalObservasiEdit').datepicker();
});

$(".edit-dataScoreTechnicalObservasi-admin").click(function () {
  var id_scoreTechnicalObservasiEdit = $(this).attr("id_scoreTechnicalObservasiEdit");

  $.ajax({
    url: "../process/proses_adminDataScoreTechnicalObservasi.php",
    method: "post",
    data: {
      editDataScoreTechnicalObservasi_idScoreTechnicalObservasi: id_scoreTechnicalObservasiEdit
    },
    success: function (data) {
      $("#id_scoreTechnicalObservasiUpdate").val(id_scoreTechnicalObservasiEdit);
      $("#edit-dataScoreTechnicalObservasi").html(data);
      $("#editDataScoreTechnicalObservasiModal").modal("show");
    }
  });
});

$(".hapus-dataScoreTechnicalObservasi-admin").click(function () {
  var id_score_technical_observasi = $(this).attr("id_score_technical_observasi");

  $('#id_scoreTechnicalObservasiHapus').val(id_score_technical_observasi);

  $('#hapusDataScoreTechnicalObservasiModal').modal("show");
});

$(".info-dataScoreTechnicalObservasi-admin").click(function () {
  var id_scoreTechnicalObservasiInfo = $(this).attr("id_scoreTechnicalObservasiInfo");

  $.ajax({
    url: "../process/proses_adminDataScoreTechnicalObservasi.php",
    method: "post",
    data: {
      infoDataScoreTechnicalObservasi_idScoreTechnicalObservasi: id_scoreTechnicalObservasiInfo
    },
    success: function (data) {
      $("#info-dataScoreTechnicalObservasi").html(data);
      $("#infoDataScoreTechnicalObservasiModal").modal("show");
    }
  });
});
