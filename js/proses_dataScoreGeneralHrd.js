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
  var id_score_generalHrd = $(this).attr("id_score_generalHrd");

  $('#id_scoreGeneralHrdHapus').val(id_score_generalHrd);

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

$(".edit-dataScoreGeneralHrdDetail-admin").click(function () {
  var id_scoreGeneralHrdDetailEdit = $(this).attr("id_scoreGeneralHrdDetailEdit");

  $.ajax({
    url: "../process/proses_adminDataScoreGeneralHrdDetail.php",
    method: "post",
    data: {
      editDataScoreGeneralHrdDetail_idScoreGeneralHrd : id_scoreGeneralHrdDetailEdit
    },
    success: function (data) {
      $("#id_scoreGeneralHrdDetailUpdate").val(id_scoreGeneralHrdDetailEdit);
      $("#edit-dataScoreGeneralHrdDetail").html(data);
      $("#editDataScoreGeneralHrdDetailModal").modal("show");
    }
  });
});

$(".hapus-dataScoreGeneralHrdDetail-admin").click(function () {
  var id_score_generalHrd_detail = $(this).attr("id_score_generalHrd_detail");

  $('#id_scoreGeneralHrdDetailHapus').val(id_score_generalHrd_detail);

  $('#hapusDataScoreGeneralHrdDetailModal').modal("show");
})

function ValidasiTambahScoreGeneralHrd() {
  var poinGeneralHrd = document.getElementById("poinGeneralHrd").value;
  var nilaiGeneralHrd = document.getElementById("nilaiGeneralHrd").value;
  var dateGeneralHrd = document.getElementById("dateGeneralHrd").value;

  if (poinGeneralHrd == "") {
      document.getElementById("poinGeneralHrdBlank").innerHTML = "*Masukkan Data Total Poin General Hrd";
  }

  else if (poinGeneralHrd != "") {
      document.getElementById("poinGeneralHrdBlank").innerHTML = "";
  }
  if (nilaiGeneralHrd == "") {
      document.getElementById("nilaiGeneralHrdBlank").innerHTML = "*Masukkan Data Total Nilai General Hrd";
  }

  else if (nilaiGeneralHrd != "") {
      document.getElementById("nilaiGeneralHrdBlank").innerHTML = "";
  }
  if (dateGeneralHrd == "") {
      document.getElementById("dateGeneralHrdBlank").innerHTML = "*Masukkan Data Tanggal General Hrd";
  }

  else if (dateGeneralHrd != "") {
      document.getElementById("dateGeneralHrdBlank").innerHTML = "";
  }
}

function ValidasiEditScoreGeneralHrd() {
  var poinGeneralHrdEdit = document.getElementById("poinGeneralHrdEdit").value;
  var nilaiGeneralHrdEdit = document.getElementById("nilaiGeneralHrdEdit").value;
  var dateGeneralHrdEdit = document.getElementById("dateGeneralHrdEdit").value;

  if (poinGeneralHrdEdit == "") {
      document.getElementById("poinGeneralHrdEditBlank").innerHTML = "*Masukkan Data Total Poin General Hrd";
  }

  else if (poinGeneralHrdEdit != "") {
      document.getElementById("poinGeneralHrdEditBlank").innerHTML = "";
  }
  if (nilaiGeneralHrdEdit == "") {
      document.getElementById("nilaiGeneralHrdEditBlank").innerHTML = "*Masukkan Data Total Nilai General Hrd";
  }

  else if (nilaiGeneralHrdEdit != "") {
      document.getElementById("nilaiGeneralHrdEditBlank").innerHTML = "";
  }
  if (dateGeneralHrdEdit == "") {
      document.getElementById("dateGeneralHrdEditBlank").innerHTML = "*Masukkan Data Tanggal General Hrd";
  }

  else if (dateGeneralHrdEdit != "") {
      document.getElementById("dateGeneralHrdEditBlank").innerHTML = "";
  }
}

function ValidasiTambahScoreGeneralHrdDetail() {
  var cocDetail = document.getElementById("cocDetail").value;
  var pkbcabDetail = document.getElementById("pkbcabDetail").value;
  var perperusDetail = document.getElementById("perperusDetail").value;

  if (cocDetail == "") {
      document.getElementById("cocDetailBlank").innerHTML = "*Masukkan Nilai CODE OF CONDUCT";
  }

  else if (cocDetail != "") {
      document.getElementById("cocDetailBlank").innerHTML = "";
  }
  if (pkbcabDetail == "") {
      document.getElementById("pkbcabDetailBlank").innerHTML = "*Masukkan Nilai PKB, COMPENSATION & BENEFIT";
  }

  else if (pkbcabDetail != "") {
      document.getElementById("pkbcabDetailBlank").innerHTML = "";
  }
  if (perperusDetail == "") {
      document.getElementById("perperusDetailBlank").innerHTML = "*Masukkan Nilai PERATURAN PERUSAHAAN";
  }

  else if (perperusDetail != "") {
      document.getElementById("perperusDetailBlank").innerHTML = "";
  }
}

function ValidasiEditScoreGeneralHrdDetail() {
  var cocGeneralHrdEditDetail = document.getElementById("cocGeneralHrdEditDetail").value;
  var pkbcabGeneralHrdEditDetail = document.getElementById("pkbcabGeneralHrdEditDetail").value;
  var perperusGeneralHrdEditDetail = document.getElementById("perperusGeneralHrdEditDetail").value;

  if (cocGeneralHrdEditDetail == "") {
      document.getElementById("cocGeneralHrdEditDetailBlank").innerHTML = "*Masukkan Nilai CODE OF CONDUCT";
  }

  else if (cocGeneralHrdEditDetail != "") {
      document.getElementById("cocGeneralHrdEditDetailBlank").innerHTML = "";
  }
  if (pkbcabGeneralHrdEditDetail == "") {
      document.getElementById("pkbcabGeneralHrdEditDetailBlank").innerHTML = "*Masukkan Nilai PKB, COMPENSATION & BENEFIT";
  }

  else if (pkbcabGeneralHrdEditDetail != "") {
      document.getElementById("pkbcabGeneralHrdEditDetailBlank").innerHTML = "";
  }
  if (perperusGeneralHrdEditDetail == "") {
      document.getElementById("perperusGeneralHrdEditDetailBlank").innerHTML = "*Masukkan Nilai PERATURAN PERUSAHAAN";
  }

  else if (perperusGeneralHrdEditDetail != "") {
      document.getElementById("perperusGeneralHrdEditDetailBlank").innerHTML = "";
  }
}