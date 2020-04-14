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

function ValidasiTambahScoreTechnicalObservasi() {
  var kategoriTechnicalObservasi = document.getElementById("kategoriTechnicalObservasi").value;
  var sftpObservasi = document.getElementById("sftpObservasi").value;
  var equipmentObservasi = document.getElementById("equipmentObservasi").value;
  var operationalObservasi = document.getElementById("operationalObservasi").value;
  var maintenObservasi = document.getElementById("maintenObservasi").value;
  var troubleObservasi = document.getElementById("troubleObservasi").value;
  var dateTechnicalObservasi = document.getElementById("dateTechnicalObservasi").value;

  if (kategoriTechnicalObservasi == "") {
    document.getElementById("kategoriTechnicalObservasiBlank").innerHTML = "*Masukkan Data Kategori Technical";
  }
  else if (kategoriTechnicalObservasi != "") {
    document.getElementById("kategoriTechnicalObservasiBlank").innerHTML = "";
  }

  if (sftpObservasi == "") {
    document.getElementById("sftpObservasiBlank").innerHTML = "*Masukkan Nilai SAFETY PROCEDURE";
  }
  else if (sftpObservasi != "") {
    document.getElementById("sftpObservasiBlank").innerHTML = "";
  }

  if (equipmentObservasi == "") {
    document.getElementById("equipmentObservasiBlank").innerHTML = "*Masukkan Nilai EQUIPMENT";
  }
  else if (equipmentObservasi != "") {
    document.getElementById("equipmentObservasiBlank").innerHTML = "";
  }

  if (operationalObservasi == "") {
    document.getElementById("operationalObservasiBlank").innerHTML = "*Masukkan Nilai OPERATIONAL PARAMETER";
  }
  else if (operationalObservasi != "") {
    document.getElementById("operationalObservasiBlank").innerHTML = "";
  }

  if (maintenObservasi == "") {
    document.getElementById("maintenObservasiBlank").innerHTML = "*Masukkan Nilai MAINTENANCE PARAMETER";
  }
  else if (maintenObservasi != "") {
    document.getElementById("maintenObservasiBlank").innerHTML = "";
  }

  if (troubleObservasi == "") {
    document.getElementById("troubleObservasiBlank").innerHTML = "*Masukkan Nilai TROUBLE SHOOTING";
  }
  else if (troubleObservasi != "") {
    document.getElementById("troubleObservasiBlank").innerHTML = "";
  }

  if (dateTechnicalObservasi == "") {
    document.getElementById("dateTechnicalObservasiBlank").innerHTML = "*Masukkan Data Tanggal Technical";
  }
  else if (dateTechnicalObservasi != "") {
    document.getElementById("dateTechnicalObservasiBlank").innerHTML = "";
  }
}

function ValidasiEditScoreTechnicalObservasi() {
  var kategoriTechnicalEditObservasi = document.getElementById("kategoriTechnicalEditObservasi").value;
  var sftpTechnicalEditObservasi = document.getElementById("sftpTechnicalEditObservasi").value;
  var equipmentTechnicalEditObservasi = document.getElementById("equipmentTechnicalEditObservasi").value;
  var operationalTechnicalEditObservasi = document.getElementById("operationalTechnicalEditObservasi").value;
  var maintenTechnicalEditObservasi = document.getElementById("maintenTechnicalEditObservasi").value;
  var troubleTechnicalEditObservasi = document.getElementById("troubleTechnicalEditObservasi").value;
  var dateTechnicalObservasiEdit = document.getElementById("dateTechnicalObservasiEdit").value;

  if (kategoriTechnicalEditObservasi == "") {
    document.getElementById("kategoriTechnicalEditObservasiBlank").innerHTML = "*Masukkan Data Kategori Technical";
  }
  else if (kategoriTechnicalEditObservasi != "") {
    document.getElementById("kategoriTechnicalEditObservasiBlank").innerHTML = "";
  }

  if (sftpTechnicalEditObservasi == "") {
    document.getElementById("sftpTechnicalEditObservasiBlank").innerHTML = "*Masukkan Nilai SAFETY PROCEDURE";
  }
  else if (sftpTechnicalEditObservasi != "") {
    document.getElementById("sftpTechnicalEditObservasiBlank").innerHTML = "";
  }

  if (equipmentTechnicalEditObservasi == "") {
    document.getElementById("equipmentTechnicalEditObservasiBlank").innerHTML = "*Masukkan Nilai EQUIPMENT";
  }
  else if (equipmentTechnicalEditObservasi != "") {
    document.getElementById("equipmentTechnicalEditObservasiBlank").innerHTML = "";
  }

  if (operationalTechnicalEditObservasi == "") {
    document.getElementById("operationalTechnicalEditObservasiBlank").innerHTML = "*Masukkan Nilai OPERATIONAL PARAMETER";
  }
  else if (operationalTechnicalEditObservasi != "") {
    document.getElementById("operationalTechnicalEditObservasiBlank").innerHTML = "";
  }

  if (maintenTechnicalEditObservasi == "") {
    document.getElementById("maintenTechnicalEditObservasiBlank").innerHTML = "*Masukkan Nilai MAINTENANCE PARAMETER";
  }
  else if (maintenTechnicalEditObservasi != "") {
    document.getElementById("maintenTechnicalEditObservasiBlank").innerHTML = "";
  }

  if (troubleTechnicalEditObservasi == "") {
    document.getElementById("troubleTechnicalEditObservasiBlank").innerHTML = "*Masukkan Nilai TROUBLE SHOOTING";
  }
  else if (troubleTechnicalEditObservasi != "") {
    document.getElementById("troubleTechnicalEditObservasiBlank").innerHTML = "";
  }

  if (dateTechnicalObservasiEdit == "") {
    document.getElementById("dateTechnicalObservasiEditBlank").innerHTML = "*Masukkan Data Tanggal Technical";
  }
  else if (dateTechnicalObservasiEdit != "") {
    document.getElementById("dateTechnicalObservasiEditBlank").innerHTML = "";
  }
}