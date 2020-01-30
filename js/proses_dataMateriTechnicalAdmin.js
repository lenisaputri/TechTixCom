$(".edit-dataMateriTechnical-admin").click(function () {
  var id_materiTechnicalEdit = $(this).attr("id_materiTechnicalEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriTechnical.php",
    method: "post",
    data: {
      editDataMateriTechnical_idMateriTechnical: id_materiTechnicalEdit,
    },
    success: function (data) {
      $("#id_materiTechnicalUpdate").val(id_materiTechnicalEdit);
      $("#edit-dataMateriTechnical").html(data);
      $("#editDataMateriTechnicalModal").modal("show");
    }
  });
});

$(".hapus-dataMateriTechnical-admin").click(function () {
  var id_materi_technical = $(this).attr("id_materi_technical");

  $('#id_materiTechnicalHapus').val(id_materi_technical);
  $('#hapusDataMateriTechnicalModal').modal("show");
})

$(".edit-dataMateriTechnicalLink-admin").click(function () {
  var id_materiTechnicalLinkEdit = $(this).attr("id_materiTechnicalLinkEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriTechnicalLink.php",
    method: "post",
    data: {
      editDataMateriTechnicalLink_idMateriTechnical: id_materiTechnicalLinkEdit,
    },
    success: function (data) {
      $("#id_materiTechnicalLinkUpdate").val(id_materiTechnicalLinkEdit);
      $("#edit-dataMateriTechnicalLink").html(data);
      $("#editDataMateriTechnicalLinkModal").modal("show");
    }
  });
});

$(".hapus-dataMateriTechnicalLink-admin").click(function () {
  var id_materi_technical = $(this).attr("id_materi_technical");

  $('#id_materiTechnicalLinkHapus').val(id_materi_technical);
  $('#hapusDataMateriTechnicalLinkModal').modal("show");
})

function ValidasiTambahDataMateriTechnical() {
  var fileMateriTechnical = document.getElementById("fileMateriTechnical").value;
  var judulMateriTechnical = document.getElementById("judulMateriTechnical").value;
  var kategoriMateriTechnical = document.getElementById("kategoriMateriTechnical").value;
  var keteranganMateriTechnical = document.getElementById("keteranganMateriTechnical").value;

  if (fileMateriTechnical == "") {
    document.getElementById("fileMateriTechnicalBlank").innerHTML = "*Masukkan File Technical";
  }

  else if (fileMateriTechnical != "") {
    document.getElementById("fileMateriTechnicalBlank").innerHTML = "";
  }


  if (judulMateriTechnical == "") {
    document.getElementById("judulMateriTechnicalBlank").innerHTML = "*Masukkan Judul Materi Technical";
  }

  else if (judulMateriTechnical != "") {
    document.getElementById("judulMateriTechnicalBlank").innerHTML = "";
  }

  if (kategoriMateriTechnical == "") {
    document.getElementById("kategoriMateriTechnicalBlank").innerHTML = "*Masukkan Kategori Materi Technical";
  }

  else if (kategoriMateriTechnical != "") {
    document.getElementById("kategoriMateriTechnicalBlank").innerHTML = "";
  }

  if (keteranganMateriTechnical == "") {
    document.getElementById("keteranganMateriTechnicalBlank").innerHTML = "*Masukkan Keterangan Materi Technical";
  }

  else if (keteranganMateriTechnical != "") {
    document.getElementById("keteranganMateriTechnicalBlank").innerHTML = "";
  }
}

function ValidasiEditDataMateriTechnical() {
  var fileMateriTechnical2 = document.getElementById("fileMateriTechnical2").value;
  var judulMateriTechnical2 = document.getElementById("judulMateriTechnical2").value;
  var kategoriMateriTechnical2 = document.getElementById("kategoriMateriTechnical2").value;
  var keteranganMateriTechnical2 = document.getElementById("keteranganMateriTechnical2").value;

  if (fileMateriTechnical2 == "") {
    document.getElementById("fileMateriTechnicalBlank2").innerHTML = "*Masukkan File Technical";
  }

  else if (fileMateriTechnical2 != "") {
    document.getElementById("fileMateriTechnicalBlank2").innerHTML = "";
  }


  if (judulMateriTechnical2 == "") {
    document.getElementById("judulMateriTechnicalBlank2").innerHTML = "*Masukkan Judul Materi Technical";
  }

  else if (judulMateriTechnical2 != "") {
    document.getElementById("judulMateriTechnicalBlank2").innerHTML = "";
  }

  if (kategoriMateriTechnical2 == "") {
    document.getElementById("kategoriMateriTechnicalBlank2").innerHTML = "*Masukkan Kategori Materi Technical";
  }

  else if (kategoriMateriTechnical2 != "") {
    document.getElementById("kategoriMateriTechnicalBlank2").innerHTML = "";
  }

  if (keteranganMateriTechnical2 == "") {
    document.getElementById("keteranganMateriTechnicalBlank2").innerHTML = "*Masukkan Keterangan Materi Technical";
  }

  else if (keteranganMateriTechnical2 != "") {
    document.getElementById("keteranganMateriTechnicalBlank2").innerHTML = "";
  }
}

function ValidasiTambahDataMateriTechnicalLink() {
  var linkMateriTechnicalLink = document.getElementById("linkMateriTechnicalLink").value;
  var judulMateriTechnicalLink = document.getElementById("judulMateriTechnicalLink").value;
  var kategoriMateriTechnicalLink = document.getElementById("kategoriMateriTechnicalLink").value;
  var keteranganMateriTechnicalLink = document.getElementById("keteranganMateriTechnicalLink").value;

  if (linkMateriTechnicalLink == "") {
    document.getElementById("linkMateriTechnicalLinkBlank").innerHTML = "*Masukkan Link Technical";
  }

  else if (linkMateriTechnicalLink != "") {
    document.getElementById("linkMateriTechnicalLinkBlank").innerHTML = "";
  }


  if (judulMateriTechnicalLink == "") {
    document.getElementById("judulMateriTechnicalLinkBlank").innerHTML = "*Masukkan Judul Materi Technical";
  }

  else if (judulMateriTechnicalLink != "") {
    document.getElementById("judulMateriTechnicalLinkBlank").innerHTML = "";
  }

  if (kategoriMateriTechnicalLink == "") {
    document.getElementById("kategoriMateriTechnicalLinkBlank").innerHTML = "*Masukkan Kategori Materi Technical";
  }

  else if (kategoriMateriTechnicalLink != "") {
    document.getElementById("kategoriMateriTechnicalLinkBlank").innerHTML = "";
  }

  if (keteranganMateriTechnicalLink == "") {
    document.getElementById("keteranganMateriTechnicalLinkBlank").innerHTML = "*Masukkan Keterangan Materi Technical";
  }

  else if (keteranganMateriTechnicalLink != "") {
    document.getElementById("keteranganMateriTechnicalLinkBlank").innerHTML = "";
  }
}

function ValidasiEditDataMateriTechnicalLink() {
  var linkMateriTechnicalLink2 = document.getElementById("linkMateriTechnicalLink2").value;
  var judulMateriTechnicalLink2 = document.getElementById("judulMateriTechnicalLink2").value;
  var kategoriMateriTechnicalLink2 = document.getElementById("kategoriMateriTechnicalLink2").value;
  var keteranganMateriTechnicalLink2 = document.getElementById("keteranganMateriTechnicalLink2").value;

  if (linkMateriTechnicalLink2 == "") {
    document.getElementById("linkMateriTechnicalLinkBlank2").innerHTML = "*Masukkan Link Technical";
  }

  else if (linkMateriTechnicalLink2 != "") {
    document.getElementById("linkMateriTechnicalLinkBlank2").innerHTML = "";
  }


  if (judulMateriTechnicalLink2 == "") {
    document.getElementById("judulMateriTechnicalLinkBlank2").innerHTML = "*Masukkan Judul Materi Technical";
  }

  else if (judulMateriTechnicalLink2 != "") {
    document.getElementById("judulMateriTechnicalLinkBlank2").innerHTML = "";
  }

  if (kategoriMateriTechnicalLink2 == "") {
    document.getElementById("kategoriMateriTechnicalLinkBlank2").innerHTML = "*Masukkan Kategori Materi Technical";
  }

  else if (kategoriMateriTechnicalLink2 != "") {
    document.getElementById("kategoriMateriTechnicalLinkBlank2").innerHTML = "";
  }

  if (keteranganMateriTechnicalLink2 == "") {
    document.getElementById("keteranganMateriTechnicalLinkBlank2").innerHTML = "*Masukkan Keterangan Materi Technical";
  }

  else if (keteranganMateriTechnicalLink2 != "") {
    document.getElementById("keteranganMateriTechnicalLinkBlank2").innerHTML = "";
  }
}