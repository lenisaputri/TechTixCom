$(".edit-dataMateriGeneralHrd-admin").click(function () {
  var id_materiGeneralHrdEdit = $(this).attr("id_materiGeneralHrdEdit");
  $.ajax({
    url: "../process/proses_adminDataMateriGeneralHrd.php",
    method: "post",
    data: {
      editDataMateriGeneralHrd_idMateriGeneralHrd: id_materiGeneralHrdEdit,
    },
    success: function (data) {
      $("#id_materiGeneralHrdUpdate").val(id_materiGeneralHrdEdit);
      $("#edit-dataMateriGeneralHrd").html(data);
      $("#editDataMateriGeneralHrdModal").modal("show");
    }
  });
});

$(".hapus-dataMateriGeneralHrd-admin").click(function () {
  var id_materi_generalhrd = $(this).attr("id_materi_generalhrd");

  $('#id_materiGeneralHrdHapus').val(id_materi_generalhrd);
  $('#hapusDataMateriGeneralHrdModal').modal("show");
})


$(".edit-dataMateriGeneralHrdLink-admin").click(function () {
  var id_materiGeneralHrdLinkEdit = $(this).attr("id_materiGeneralHrdLinkEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriGeneralHrdLink.php",
    method: "post",
    data: {
      editDataMateriGeneralHrdLink_idMateriGeneralHrd: id_materiGeneralHrdLinkEdit,
    },
    success: function (data) {
      $("#id_materiGeneralHrdLinkUpdate").val(id_materiGeneralHrdLinkEdit);
      $("#edit-dataMateriGeneralHrdLink").html(data);
      $("#editDataMateriGeneralHrdLinkModal").modal("show");
    }
  });
});

$(".hapus-dataMateriGeneralHrdLink-admin").click(function () {
  var id_materi_generalhrd = $(this).attr("id_materi_generalhrd");

  $('#id_materiGeneralHrdLinkHapus').val(id_materi_generalhrd);
  $('#hapusDataMateriGeneralHrdLinkModal').modal("show");
})

function ValidasiTambahDataMateriGeneralHrd() {
  var fileMateriGeneralHrd = document.getElementById("fileMateriGeneralHrd").value;
  var judulMateriGeneralHrd = document.getElementById("judulMateriGeneralHrd").value;
  var kategoriMateriGeneralHrd = document.getElementById("kategoriMateriGeneralHrd").value;
  var keteranganMateriGeneralHrd = document.getElementById("keteranganMateriGeneralHrd").value;

  if (fileMateriGeneralHrd == "") {
    document.getElementById("fileMateriGeneralHrdBlank").innerHTML = "*Masukkan File Materi GeneralHrd";
  }

  else if (fileMateriGeneralHrd != "") {
    document.getElementById("fileMateriGeneralHrdBlank").innerHTML = "";
  }


  if (judulMateriGeneralHrd == "") {
    document.getElementById("judulMateriGeneralHrdBlank").innerHTML = "*Masukkan Judul Materi GeneralHrd";
  }

  else if (judulMateriGeneralHrd != "") {
    document.getElementById("judulMateriGeneralHrdBlank").innerHTML = "";
  }

  if (kategoriMateriGeneralHrd == "") {
    document.getElementById("kategoriMateriGeneralHrdBlank").innerHTML = "*Masukkan Kategori Materi GeneralHrd";
  }

  else if (kategoriMateriGeneralHrd != "") {
    document.getElementById("kategoriMateriGeneralHrdBlank").innerHTML = "";
  }

  if (keteranganMateriGeneralHrd == "") {
    document.getElementById("keteranganMateriGeneralHrdBlank").innerHTML = "*Masukkan Keterangan Materi GeneralHrd";
  }

  else if (keteranganMateriGeneralHrd != "") {
    document.getElementById("keteranganMateriGeneralHrdBlank").innerHTML = "";
  }
}

function ValidasiEditDataMateriGeneralHrd() {
  var fileMateriGeneralHrd2 = document.getElementById("fileMateriGeneralHrd2").value;
  var judulMateriGeneralHrd2 = document.getElementById("judulMateriGeneralHrd2").value;
  var kategoriMateriGeneralHrd2 = document.getElementById("kategoriMateriGeneralHrd2").value;
  var keteranganMateriGeneralHrd2 = document.getElementById("keteranganMateriGeneralHrd2").value;

  if (fileMateriGeneralHrd2 == "") {
    document.getElementById("fileMateriGeneralHrdBlank2").innerHTML = "*Masukkan File Materi GeneralHrd";
  }

  else if (fileMateriGeneralHrd2 != "") {
    document.getElementById("fileMateriGeneralHrdBlank2").innerHTML = "";
  }


  if (judulMateriGeneralHrd2 == "") {
    document.getElementById("judulMateriGeneralHrdBlank2").innerHTML = "*Masukkan Judul Materi GeneralHrd";
  }

  else if (judulMateriGeneralHrd2 != "") {
    document.getElementById("judulMateriGeneralHrdBlank2").innerHTML = "";
  }

  if (kategoriMateriGeneralHrd2 == "") {
    document.getElementById("kategoriMateriGeneralHrdBlank2").innerHTML = "*Masukkan Kategori Materi GeneralHrd";
  }

  else if (kategoriMateriGeneralHrd2 != "") {
    document.getElementById("kategoriMateriGeneralHrdBlank2").innerHTML = "";
  }

  if (keteranganMateriGeneralHrd2 == "") {
    document.getElementById("keteranganMateriGeneralHrdBlank2").innerHTML = "*Masukkan Keterangan Materi GeneralHrd";
  }

  else if (keteranganMateriGeneralHrd2 != "") {
    document.getElementById("keteranganMateriGeneralHrdBlank2").innerHTML = "";
  }
}

function ValidasiTambahDataMateriGeneralHrdLink() {
  var linkMateriLinkGeneralHrdLink = document.getElementById("linkMateriLinkGeneralHrdLink").value;
  var judulMateriGeneralHrdLink = document.getElementById("judulMateriGeneralHrdLink").value;
  var kategoriMateriGeneralHrdLink = document.getElementById("kategoriMateriGeneralHrdLink").value;
  var keteranganMateriGeneralHrdLink = document.getElementById("keteranganMateriGeneralHrdLink").value;

  if (linkMateriLinkGeneralHrdLink == "") {
    document.getElementById("linkMateriLinkGeneralHrdLinkBlank").innerHTML = "*Masukkan Link Materi GeneralHrd";
  }

  else if (linkMateriLinkGeneralHrdLink != "") {
    document.getElementById("linkMateriLinkGeneralHrdLinkBlank").innerHTML = "";
  }


  if (judulMateriGeneralHrdLink == "") {
    document.getElementById("judulMateriGeneralHrdLinkBlank").innerHTML = "*Masukkan Judul Materi GeneralHrd";
  }

  else if (judulMateriGeneralHrdLink != "") {
    document.getElementById("judulMateriGeneralHrdLinkBlank").innerHTML = "";
  }

  if (kategoriMateriGeneralHrdLink == "") {
    document.getElementById("kategoriMateriGeneralHrdLinkBlank").innerHTML = "*Masukkan Kategori Materi GeneralHrd";
  }

  else if (kategoriMateriGeneralHrdLink != "") {
    document.getElementById("kategoriMateriGeneralHrdLinkBlank").innerHTML = "";
  }

  if (keteranganMateriGeneralHrdLink == "") {
    document.getElementById("keteranganMateriGeneralHrdLinkBlank").innerHTML = "*Masukkan Keterangan Materi GeneralHrd";
  }

  else if (keteranganMateriGeneralHrdLink != "") {
    document.getElementById("keteranganMateriGeneralHrdLinkBlank").innerHTML = "";
  }
}

function ValidasiEditDataMateriGeneralHrdLink() {
  var linkMateriLinkGeneralHrdLink2 = document.getElementById("linkMateriLinkGeneralHrdLink2").value;
  var judulMateriGeneralHrdLink2 = document.getElementById("judulMateriGeneralHrdLink2").value;
  var kategoriMateriGeneralHrdLink2 = document.getElementById("kategoriMateriGeneralHrdLink2").value;
  var keteranganMateriGeneralHrdLink2 = document.getElementById("keteranganMateriGeneralHrdLink2").value;

  if (linkMateriLinkGeneralHrdLink2 == "") {
    document.getElementById("linkMateriLinkGeneralHrdLinkBlank2").innerHTML = "*Masukkan Link Materi GeneralHrd";
  }

  else if (linkMateriLinkGeneralHrdLink2 != "") {
    document.getElementById("linkMateriLinkGeneralHrdLinkBlank2").innerHTML = "";
  }


  if (judulMateriGeneralHrdLink2 == "") {
    document.getElementById("judulMateriGeneralHrdLinkBlank2").innerHTML = "*Masukkan Judul Materi GeneralHrd";
  }

  else if (judulMateriGeneralHrdLink2 != "") {
    document.getElementById("judulMateriGeneralHrdLinkBlank2").innerHTML = "";
  }

  if (kategoriMateriGeneralHrdLink2 == "") {
    document.getElementById("kategoriMateriGeneralHrdLinkBlank2").innerHTML = "*Masukkan Kategori Materi GeneralHrd";
  }

  else if (kategoriMateriGeneralHrdLink2 != "") {
    document.getElementById("kategoriMateriGeneralHrdLinkBlank2").innerHTML = "";
  }

  if (keteranganMateriGeneralHrdLink2 == "") {
    document.getElementById("keteranganMateriGeneralHrdLinkBlank2").innerHTML = "*Masukkan Keterangan Materi GeneralHrd";
  }

  else if (keteranganMateriGeneralHrdLink2 != "") {
    document.getElementById("keteranganMateriGeneralHrdLinkBlank2").innerHTML = "";
  }
}