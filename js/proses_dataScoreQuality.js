$(function () {
  $('#datepickerTanggalTraining').datepicker();
});

$(function () {
  $('#datepickerTanggalTrainingEdit').datepicker();
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

    $('#hapusDataScoreQualityModall').modal("show");
});

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

$(".hapus-dataScoreQualityDetail-admin").click(function () {
  var id_score_quality_detail = $(this).attr("id_score_quality_detail");

  $('#id_scoreQualityDetailHapus').val(id_score_quality_detail);

  $('#hapusDataScoreQualityDetailModal').modal("show");
})

function ValidasiTambahScoreQuality() {
    var poinQuality = document.getElementById("poinQuality").value;
    var nilaiQuality = document.getElementById("nilaiQuality").value;
    var dateQuality = document.getElementById("dateQuality").value;

    if (poinQuality == "") {
        document.getElementById("poinQualityBlank").innerHTML = "*Masukkan Data Total Poin Quality";
    }

    else if (poinQuality != "") {
        document.getElementById("poinQualityBlank").innerHTML = "";
    }
    if (nilaiQuality == "") {
        document.getElementById("nilaiQualityBlank").innerHTML = "*Masukkan Data Total Nilai Quality";
    }

    else if (nilaiQuality != "") {
        document.getElementById("nilaiQualityBlank").innerHTML = "";
    }
    if (dateQuality == "") {
        document.getElementById("dateQualityBlank").innerHTML = "*Masukkan Data Tanggal Quality";
    }

    else if (dateQuality != "") {
        document.getElementById("dateQualityBlank").innerHTML = "";
    }
}

function ValidasiEditScoreQuality() {
    var poinQualityEdit = document.getElementById("poinQualityEdit").value;
    var nilaiQualityEdit = document.getElementById("nilaiQualityEdit").value;
    var dateQualityEdit = document.getElementById("dateQualityEdit").value;

    if (poinQualityEdit == "") {
        document.getElementById("poinQualityEditBlank").innerHTML = "*Masukkan Data Total Poin Quality";
    }

    else if (poinQualityEdit != "") {
        document.getElementById("poinQualityEditBlank").innerHTML = "";
    }
    if (nilaiQualityEdit == "") {
        document.getElementById("nilaiQualityEditBlank").innerHTML = "*Masukkan Data Total Nilai Quality";
    }

    else if (nilaiQualityEdit != "") {
        document.getElementById("nilaiQualityEditBlank").innerHTML = "";
    }
    if (dateQualityEdit == "") {
        document.getElementById("dateQualityEditBlank").innerHTML = "*Masukkan Data Tanggal Quality";
    }

    else if (dateQualityEdit != "") {
        document.getElementById("dateQualityEditBlank").innerHTML = "";
    }
}

function ValidasiTambahScoreQualityDetail() {
    var fssDetail = document.getElementById("fssDetail").value;
    var gmpDetail = document.getElementById("gmpDetail").value;
    var halalDetail = document.getElementById("halalDetail").value;

    if (fssDetail == "") {
        document.getElementById("fssDetailBlank").innerHTML = "*Masukkan Nilai FOOD SAFETY SYSTEM";
    }

    else if (fssDetail != "") {
        document.getElementById("fssDetailBlank").innerHTML = "";
    }
    if (gmpDetail == "") {
        document.getElementById("gmpDetailBlank").innerHTML = "*Masukkan Nilai GMP";
    }

    else if (gmpDetail != "") {
        document.getElementById("gmpDetailBlank").innerHTML = "";
    }
    if (halalDetail == "") {
        document.getElementById("halalDetailBlank").innerHTML = "*Masukkan Nilai HALAL";
    }

    else if (halalDetail != "") {
        document.getElementById("halalDetailBlank").innerHTML = "";
    }
}

function ValidasiEditScoreQualityDetail() {
    var fssQualityEditDetail = document.getElementById("fssQualityEditDetail").value;
    var gmpQualityEditDetail = document.getElementById("gmpQualityEditDetail").value;
    var halalQualityEditDetail = document.getElementById("halalQualityEditDetail").value;

    if (fssQualityEditDetail == "") {
        document.getElementById("fssQualityEditDetailBlank").innerHTML = "*Masukkan Nilai FOOD SAFETY SYSTEM";
    }

    else if (fssQualityEditDetail != "") {
        document.getElementById("fssQualityEditDetailBlank").innerHTML = "";
    }
    if (gmpQualityEditDetail == "") {
        document.getElementById("gmpQualityEditDetailBlank").innerHTML = "*Masukkan Nilai GMP";
    }

    else if (gmpQualityEditDetail != "") {
        document.getElementById("gmpQualityEditDetailBlank").innerHTML = "";
    }
    if (halalQualityEditDetail == "") {
        document.getElementById("halalQualityEditDetailBlank").innerHTML = "*Masukkan Nilai HALAL";
    }

    else if (halalQualityEditDetail != "") {
        document.getElementById("halalQualityEditDetailBlank").innerHTML = "";
    }
}