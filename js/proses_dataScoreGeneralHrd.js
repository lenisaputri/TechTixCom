$(function () {
    $('#datepickerTanggalTrainingGeneralHrd').datepicker();
  });
  
  $(function () {
    $('#datepickerTanggalTrainingGeneralHrdEdit').datepicker();
  });
  
  $(".edit-dataScoreGeneralHrd-admin").click(function () {
    var id_scoreGeneralHrdEdit = $(this).attr("id_scoreGeneralHrdEdit");
  
    $.ajax({
      url: "../process/proses_adminDataScoreGeneralHrd.php",
      method: "post",
      data: {
        editDataScoreGeneralHrd_idScoreGeneralHrd: id_scoreGeneralHrdEdit
      },
      success: function (data) {
        $("#id_scoreGeneralHrdUpdate").val(id_scoreGeneralHrdEdit);
        $("#edit-dataScoreGeneralHrd").html(data);
        $("#editDataScoreGeneralHrdModal").modal("show");
      }
    });
  });
  
  $(".hapus-dataScoreGeneralHrd-admin").click(function () {
    var id_score_generalhrd = $(this).attr("id_score_generalhrd");
  
    $('#id_scoreGeneralHrdHapus').val(id_score_generalhrd);
  
    $('#hapusDataScoreGeneralHrdModal').modal("show");
  })
  
  $(".info-dataScoreGeneralHrd-admin").click(function () {
    var id_scoreGeneralHrdInfo = $(this).attr("id_scoreGeneralHrdInfo");
  
    $.ajax({
      url: "../process/proses_adminDataScoreGeneralHrd.php",
      method: "post",
      data: {
        infoDataScoreGeneralHrd_idScoreGeneralHrd: id_scoreGeneralHrdInfo
      },
      success: function (data) {
        $("#info-dataScoreGeneralHrd").html(data);
        $("#infoDataScoreGeneralHrdModal").modal("show");
      }
    });
  });