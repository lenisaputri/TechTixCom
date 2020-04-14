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

function ValidasiTambahScoreTechnical() {
  var kategoriTechnical = document.getElementById("kategoriTechnical").value;
  var poinTechnical = document.getElementById("poinTechnical").value;
  var nilaiTechnical = document.getElementById("nilaiTechnical").value;
  var dateTechnical = document.getElementById("dateTechnical").value;

  if (kategoriTechnical == "") {
    document.getElementById("kategoriTechnicalBlank").innerHTML = "*Masukkan Data Kategori Technical";
  }
  else if (kategoriTechnical != "") {
    document.getElementById("kategoriTechnicalBlank").innerHTML = "";
  }

  if (poinTechnical == "") {
    document.getElementById("poinTechnicalBlank").innerHTML = "*Masukkan Data Total Poin Technical";
  }
  else if (poinTechnical != "") {
    document.getElementById("poinTechnicalBlank").innerHTML = "";
  }

  if (nilaiTechnical == "") {
    document.getElementById("nilaiTechnicalBlank").innerHTML = "*Masukkan Data Total Nilai Technical";
  }
  else if (nilaiTechnical != "") {
    document.getElementById("nilaiTechnicalBlank").innerHTML = "";
  }

  if (dateTechnical == "") {
    document.getElementById("dateTechnicalBlank").innerHTML = "*Masukkan Data Tanggal Technical";
  }
  else if (dateTechnical != "") {
    document.getElementById("dateTechnicalBlank").innerHTML = "";
  }
}

function ValidasiEditScoreTechnical() {
  var kategoriTechnicalEdit = document.getElementById("kategoriTechnicalEdit").value;
  var poinTechnicalEdit = document.getElementById("poinTechnicalEdit").value;
  var nilaiTechnicalEdit = document.getElementById("nilaiTechnicalEdit").value;
  var dateTechnicalEdit = document.getElementById("dateTechnicalEdit").value;

  if (kategoriTechnicalEdit == "") {
    document.getElementById("kategoriTechnicalEditBlank").innerHTML = "*Masukkan Data Kategori Technical";
  }
  else if (kategoriTechnicalEdit != "") {
    document.getElementById("kategoriTechnicalEditBlank").innerHTML = "";
  }

  if (poinTechnicalEdit == "") {
    document.getElementById("poinTechnicalEditBlank").innerHTML = "*Masukkan Data Total Poin Technical";
  }
  else if (poinTechnicalEdit != "") {
    document.getElementById("poinTechnicalEditBlank").innerHTML = "";
  }

  if (nilaiTechnicalEdit == "") {
    document.getElementById("nilaiTechnicalEditBlank").innerHTML = "*Masukkan Data Total Nilai Technical";
  }
  else if (nilaiTechnicalEdit != "") {
    document.getElementById("nilaiTechnicalEditBlank").innerHTML = "";
  }

  if (dateTechnicalEdit == "") {
    document.getElementById("dateTechnicalEditBlank").innerHTML = "*Masukkan Data Tanggal Technical";
  }
  else if (dateTechnicalEdit != "") {
    document.getElementById("dateTechnicalEditBlank").innerHTML = "";
  }
}

function ValidasiTambahScoreTechnicalDetail() {
  var sftpDetail = document.getElementById("sftpDetail").value;
  var equipmentDetail = document.getElementById("equipmentDetail").value;
  var operationalDetail = document.getElementById("operationalDetail").value;
  var maintenDetail = document.getElementById("maintenDetail").value;
  var troubleDetail = document.getElementById("troubleDetail").value;

  if (sftpDetail == "") {
    document.getElementById("sftpDetailBlank").innerHTML = "*Masukkan Nilai SAFETY PROCEDURE";
  }
  else if (sftpDetail != "") {
    document.getElementById("sftpDetailBlank").innerHTML = "";
  }

  if (equipmentDetail == "") {
    document.getElementById("equipmentDetailBlank").innerHTML = "*Masukkan Nilai EQUIPMENT";
  }
  else if (equipmentDetail != "") {
    document.getElementById("equipmentDetailBlank").innerHTML = "";
  }

  if (operationalDetail == "") {
    document.getElementById("operationalDetailBlank").innerHTML = "*Masukkan Nilai OPERATIONAL PARAMETER";
  }
  else if (operationalDetail != "") {
    document.getElementById("operationalDetailBlank").innerHTML = "";
  }

  if (maintenDetail == "") {
    document.getElementById("maintenDetailBlank").innerHTML = "*Masukkan Nilai MAINTENANCE PARAMETER";
  }
  else if (maintenDetail != "") {
    document.getElementById("maintenDetailBlank").innerHTML = "";
  }

  if (troubleDetail == "") {
    document.getElementById("troubleDetailBlank").innerHTML = "*Masukkan Nilai TROUBLE SHOOTING";
  }
  else if (troubleDetail != "") {
    document.getElementById("troubleDetailBlank").innerHTML = "";
  }
}

function ValidasiEditScoreTechnicalDetail() {
  var sftpTechnicalEditDetail = document.getElementById("sftpDetail").value;
  var equipmentTechnicalEditDetail = document.getElementById("equipmentDetail").value;
  var operationalTechnicalEditDetail = document.getElementById("operationalDetail").value;
  var maintenTechnicalEditDetail = document.getElementById("maintenDetail").value;
  var troubleTechnicalEditDetail = document.getElementById("troubleDetail").value;

  if (sftpTechnicalEditDetail == "") {
    document.getElementById("sftpTechnicalEditDetailBlank").innerHTML = "*Masukkan Nilai SAFETY PROCEDURE";
  }
  else if (sftpTechnicalEditDetail != "") {
    document.getElementById("sftpTechnicalEditDetailBlank").innerHTML = "";
  }

  if (equipmentTechnicalEditDetail == "") {
    document.getElementById("equipmentTechnicalEditDetailBlank").innerHTML = "*Masukkan Nilai EQUIPMENT";
  }
  else if (equipmentTechnicalEditDetail != "") {
    document.getElementById("equipmentTechnicalEditDetailBlank").innerHTML = "";
  }

  if (operationalTechnicalEditDetail == "") {
    document.getElementById("operationalTechnicalEditDetailBlank").innerHTML = "*Masukkan Nilai OPERATIONAL PARAMETER";
  }
  else if (operationalTechnicalEditDetail != "") {
    document.getElementById("operationalTechnicalEditDetailBlank").innerHTML = "";
  }

  if (maintenTechnicalEditDetail == "") {
    document.getElementById("maintenTechnicalEditDetailBlank").innerHTML = "*Masukkan Nilai MAINTENANCE PARAMETER";
  }
  else if (maintenTechnicalEditDetail != "") {
    document.getElementById("maintenTechnicalEditDetailBlank").innerHTML = "";
  }

  if (troubleTechnicalEditDetail == "") {
    document.getElementById("troubleTechnicalEditDetailBlank").innerHTML = "*Masukkan Nilai TROUBLE SHOOTING";
  }
  else if (troubleTechnicalEditDetail != "") {
    document.getElementById("troubleTechnicalEditDetailBlank").innerHTML = "";
  }
}