$(function () {
    $('#datepickerTanggalTraining').datepicker();
});

$(function () {
    $('#datepickerTanggalTrainingEdit').datepicker();
});

$(".edit-dataScoreGeneralHrd-admin").click(function () {
<<<<<<< HEAD
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
=======
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
>>>>>>> bed6eef7ee02f720dc8c4f3e9ceaa21b31f95724
});

$(".hapus-dataScoreGeneralHrd-admin").click(function () {
    var id_score_generalhrd = $(this).attr("id_score_generalhrd");

    $('#id_scoreGeneralHrdHapus').val(id_score_generalhrd);

    $('#hapusDataMateriGeneralHrdModal').modal("show");
})

$(".info-dataScoreGeneralHrd-admin").click(function () {
<<<<<<< HEAD
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
=======
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
>>>>>>> bed6eef7ee02f720dc8c4f3e9ceaa21b31f95724
});

$(".edit-dataScoreGeneralHrdDetail-admin").click(function () {
<<<<<<< HEAD
    var id_scoreGeneralHrdDetailEdit = $(this).attr("id_scoreGeneralHrdDetailEdit");

    $.ajax({
        url: "../process/proses_adminDataScoreGeneralHrdDetail.php",
        method: "post",
        data: {
            editDataScoreGeneralHrdDetail_idScoreGeneralHrd: id_scoreGeneralHrdDetailEdit
        },
        success: function (data) {
            $("#id_scoreGeneralHrdDetailUpdate").val(id_scoreGeneralHrdDetailEdit);
            $("#edit-dataScoreGeneralHrdDetail").html(data);
            $("#editDataScoreGeneralHrdDetailModal").modal("show");
        }
    });
});
// DATA SCORE GeneralHrd EDIT DETAIL END

// DATA SCORE GeneralHrd HAPUS DETAIL

$(".hapus-dataScoreGeneralHrdDetail-admin").click(function () {
    var id_score_generalhrd_detail = $(this).attr("id_score_generalhrd_detail");

    $('#id_scoreGeneralHrdDetailHapus').val(id_score_generalhrd_detail);

    $('#hapusDataScoreGeneralHrdDetailModal').modal("show");
})

// DATA SCORE GeneralHrd HAPUS DETAIL END
=======
  var id_scoreGeneralHrdDetailEdit = $(this).attr("id_scoreGeneralHrdDetailEdit");

  $.ajax({
    url: "../process/proses_adminDataScoreGeneralHrdDetail.php",
    method: "post",
    data: {
      editDataScoreGeneralHrdDetail_idScoreGeneralHrd: id_scoreGeneralHrdDetailEdit
    },
    success: function (data) {
      $("#id_scoreGeneralHrdDetailUpdate").val(id_scoreGeneralHrdDetailEdit);
      $("#edit-dataScoreGeneralHrdDetail").html(data);
      $("#editDataScoreGeneralHrdDetailModal").modal("show");
    }
  });
});
>>>>>>> bed6eef7ee02f720dc8c4f3e9ceaa21b31f95724
