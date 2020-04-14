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

function ValidasiTambahScoreTechnicalPraktek() {
  var kategoriTechnicalPraktek = document.getElementById("kategoriTechnicalPraktek").value;
  var sftpPraktek = document.getElementById("sftpPraktek").value;
  var equipmentPraktek = document.getElementById("equipmentPraktek").value;
  var operationalPraktek = document.getElementById("operationalPraktek").value;
  var maintenPraktek = document.getElementById("maintenPraktek").value;
  var troublePraktek = document.getElementById("troublePraktek").value;
  var dateTechnicalPraktek = document.getElementById("dateTechnicalPraktek").value;

  if (kategoriTechnicalPraktek == "") {
    document.getElementById("kategoriTechnicalPraktekBlank").innerHTML = "*Masukkan Data Kategori Technical";
  }
  else if (kategoriTechnicalPraktek != "") {
    document.getElementById("kategoriTechnicalPraktekBlank").innerHTML = "";
  }

  if (sftpPraktek == "") {
    document.getElementById("sftpPraktekBlank").innerHTML = "*Masukkan Nilai SAFETY PROCEDURE";
  }
  else if (sftpPraktek != "") {
    document.getElementById("sftpPraktekBlank").innerHTML = "";
  }

  if (equipmentPraktek == "") {
    document.getElementById("equipmentPraktekBlank").innerHTML = "*Masukkan Nilai EQUIPMENT";
  }
  else if (equipmentPraktek != "") {
    document.getElementById("equipmentPraktekBlank").innerHTML = "";
  }

  if (operationalPraktek == "") {
    document.getElementById("operationalPraktekBlank").innerHTML = "*Masukkan Nilai OPERATIONAL PARAMETER";
  }
  else if (operationalPraktek != "") {
    document.getElementById("operationalPraktekBlank").innerHTML = "";
  }

  if (maintenPraktek == "") {
    document.getElementById("maintenPraktekBlank").innerHTML = "*Masukkan Nilai MAINTENANCE PARAMETER";
  }
  else if (maintenPraktek != "") {
    document.getElementById("maintenPraktekBlank").innerHTML = "";
  }

  if (troublePraktek == "") {
    document.getElementById("troublePraktekBlank").innerHTML = "*Masukkan Nilai TROUBLE SHOOTING";
  }
  else if (troublePraktek!= "") {
    document.getElementById("troublePraktekBlank").innerHTML = "";
  }

  if (dateTechnicalPraktek == "") {
    document.getElementById("dateTechnicalPraktekBlank").innerHTML = "*Masukkan Data Tanggal Technical";
  }
  else if (dateTechnicalPraktek != "") {
    document.getElementById("dateTechnicalPraktekBlank").innerHTML = "";
  }
}

function ValidasiEditScoreTechnicalPraktek() {
  var kategoriTechnicalEditPraktek = document.getElementById("kategoriTechnicalEditPraktek").value;
  var sftpTechnicalEditPraktek = document.getElementById("sftpTechnicalEditPraktek").value;
  var equipmentTechnicalEditPraktek = document.getElementById("equipmentTechnicalEditPraktek").value;
  var operationalTechnicalEditPraktek = document.getElementById("operationalTechnicalEditPraktek").value;
  var maintenTechnicalEditPraktek = document.getElementById("maintenTechnicalEditPraktek").value;
  var troubleTechnicalEditPraktek = document.getElementById("troubleTechnicalEditPraktek").value;
  var dateTechnicalPraktekEdit = document.getElementById("dateTechnicalPraktekEdit").value;

  if (kategoriTechnicalEditPraktek == "") {
    document.getElementById("kategoriTechnicalEditPraktekBlank").innerHTML = "*Masukkan Data Kategori Technical";
  }
  else if (kategoriTechnicalEditPraktek != "") {
    document.getElementById("kategoriTechnicalEditPraktekBlank").innerHTML = "";
  }

  if (sftpTechnicalEditPraktek == "") {
    document.getElementById("sftpTechnicalEditPraktekBlank").innerHTML = "*Masukkan Nilai SAFETY PROCEDURE";
  }
  else if (sftpTechnicalEditPraktek != "") {
    document.getElementById("sftpTechnicalEditPraktekBlank").innerHTML = "";
  }

  if (equipmentTechnicalEditPraktek == "") {
    document.getElementById("equipmentTechnicalEditPraktekBlank").innerHTML = "*Masukkan Nilai EQUIPMENT";
  }
  else if (equipmentTechnicalEditPraktek != "") {
    document.getElementById("equipmentTechnicalEditPraktekBlank").innerHTML = "";
  }

  if (operationalTechnicalEditPraktek == "") {
    document.getElementById("operationalTechnicalEditPraktekBlank").innerHTML = "*Masukkan Nilai OPERATIONAL PARAMETER";
  }
  else if (operationalTechnicalEditOPraktek != "") {
    document.getElementById("operationalTechnicalEditPraktekBlank").innerHTML = "";
  }

  if (maintenTechnicalEditPraktek == "") {
    document.getElementById("maintenTechnicalEditPraktekBlank").innerHTML = "*Masukkan Nilai MAINTENANCE PARAMETER";
  }
  else if (maintenTechnicalEditPraktek != "") {
    document.getElementById("maintenTechnicalEditPraktekBlank").innerHTML = "";
  }

  if (troubleTechnicalEditPraktek == "") {
    document.getElementById("troubleTechnicalEditPraktekBlank").innerHTML = "*Masukkan Nilai TROUBLE SHOOTING";
  }
  else if (troubleTechnicalEditPraktek != "") {
    document.getElementById("troubleTechnicalEditPraktekBlank").innerHTML = "";
  }

  if (dateTechnicalPraktekEdit == "") {
    document.getElementById("dateTechnicalPraktekEditBlank").innerHTML = "*Masukkan Data Tanggal Technical";
  }
  else if (dateTechnicalPraktekEdit != "") {
    document.getElementById("dateTechnicalPraktekEditBlank").innerHTML = "";
  }
}