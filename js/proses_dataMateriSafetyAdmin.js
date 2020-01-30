$(".edit-dataMateriSafety-admin").click(function () {
  var id_materiSafetyEdit = $(this).attr("id_materiSafetyEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriSafety.php",
    method: "post",
    data: {
      editDataMateriSafety_idMateriSafety: id_materiSafetyEdit,
    },
    success: function (data) {
      $("#id_materiSafetyUpdate").val(id_materiSafetyEdit);
      $("#edit-dataMateriSafety").html(data);
      $("#editDataMateriSafetyModal").modal("show");
    }
  });
});

$(".hapus-dataMateriSafety-admin").click(function () {
  var id_materi_safety = $(this).attr("id_materi_safety");

  $('#id_materiSafetyHapus').val(id_materi_safety);
  $('#hapusDataMateriSafetyModal').modal("show");
})

$(".edit-dataMateriSafetyLink-admin").click(function () {
  var id_materiSafetyLinkEdit = $(this).attr("id_materiSafetyLinkEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriSafetyLink.php",
    method: "post",
    data: {
      editDataMateriSafetyLink_idMateriSafety: id_materiSafetyLinkEdit,
    },
    success: function (data) {
      $("#id_materiSafetyLinkUpdate").val(id_materiSafetyLinkEdit);
      $("#edit-dataMateriSafetyLink").html(data);
      $("#editDataMateriSafetyLinkModal").modal("show");
    }
  });
});

$(".hapus-dataMateriSafetyLink-admin").click(function () {
  var id_materi_safety = $(this).attr("id_materi_safety");

  $('#id_materiSafetyLinkHapus').val(id_materi_safety);
  $('#hapusDataMateriSafetyLinkModal').modal("show");
})


function ValidasiTambahDataMateriSafety() {
  var fileMateriSafety = document.getElementById("fileMateriSafety").value;
  var judulMateriSafety = document.getElementById("judulMateriSafety").value;
  var kategoriMateriSafety = document.getElementById("kategoriMateriSafety").value;
  var keteranganMateriSafety = document.getElementById("keteranganMateriSafety").value;

  if (fileMateriSafety == "") {
    document.getElementById("fileMateriSafetyBlank").innerHTML = "*Masukkan File Safety";
  }

  else if (fileMateriSafety != "") {
    document.getElementById("fileMateriSafetyBlank").innerHTML = "";
  }


  if (judulMateriSafety == "") {
    document.getElementById("judulMateriSafetyBlank").innerHTML = "*Masukkan Judul Materi Safety";
  }

  else if (judulMateriSafety != "") {
    document.getElementById("judulMateriSafetyBlank").innerHTML = "";
  }

  if (kategoriMateriSafety == "") {
    document.getElementById("kategoriMateriSafetyBlank").innerHTML = "*Masukkan Kategori Materi Safety";
  }

  else if (kategoriMateriSafety != "") {
    document.getElementById("kategoriMateriSafetyBlank").innerHTML = "";
  }

  if (keteranganMateriSafety == "") {
    document.getElementById("keteranganMateriSafetyBlank").innerHTML = "*Masukkan Keterangan Materi Safety";
  }

  else if (keteranganMateriSafety != "") {
    document.getElementById("keteranganMateriSafetyBlank").innerHTML = "";
  }
}

function ValidasiEditDataMateriSafety() {
  var fileMateriSafety2 = document.getElementById("fileMateriSafety2").value;
  var judulMateriSafety2 = document.getElementById("judulMateriSafety2").value;
  var kategoriMateriSafety2 = document.getElementById("kategoriMateriSafety2").value;
  var keteranganMateriSafety2 = document.getElementById("keteranganMateriSafety2").value;

  if (fileMateriSafety2 == "") {
    document.getElementById("fileMateriSafety2Blank").innerHTML = "*Masukkan File Safety";
  }

  else if (fileMateriSafety2 != "") {
    document.getElementById("fileMateriSafety2Blank").innerHTML = "";
  }


  if (judulMateriSafety2 == "") {
    document.getElementById("judulMateriSafety2Blank").innerHTML = "*Masukkan Judul Materi Safety";
  }

  else if (judulMateriSafety2 != "") {
    document.getElementById("judulMateriSafety2Blank").innerHTML = "";
  }

  if (kategoriMateriSafety2 == "") {
    document.getElementById("kategoriMateriSafety2Blank").innerHTML = "*Masukkan Kategori Materi Safety";
  }

  else if (kategoriMateriSafety2 != "") {
    document.getElementById("kategoriMateriSafety2Blank").innerHTML = "";
  }

  if (keteranganMateriSafety2 == "") {
    document.getElementById("keteranganMateriSafety2Blank").innerHTML = "*Masukkan Keterangan Materi Safety";
  }

  else if (keteranganMateriSafety2 != "") {
    document.getElementById("keteranganMateriSafety2Blank").innerHTML = "";
  }
}

function ValidasiTambahDataMateriSafetyLink() {
  var linkMateriSafetyLink = document.getElementById("linkMateriSafetyLink").value;
  var judulMateriSafetyLink = document.getElementById("judulMateriSafetyLink").value;
  var kategoriMateriSafetyLink = document.getElementById("kategoriMateriSafetyLink").value;
  var keteranganMateriSafetyLink = document.getElementById("keteranganMateriSafetyLink").value;

  if (linkMateriSafetyLink == "") {
    document.getElementById("linkMateriSafetyLinkBlank").innerHTML = "*Masukkan File Safety";
  }

  else if (linkMateriSafetyLink!= "") {
    document.getElementById("linkMateriSafetyLinkBlank").innerHTML = "";
  }


  if (judulMateriSafetyLink == "") {
    document.getElementById("judulMateriSafetyLinkBlank").innerHTML = "*Masukkan Judul Materi Safety";
  }

  else if (judulMateriSafetyLink != "") {
    document.getElementById("judulMateriSafetyLinkBlank").innerHTML = "";
  }

  if (kategoriMateriSafetyLink == "") {
    document.getElementById("kategoriMateriSafetyLinkBlank").innerHTML = "*Masukkan Kategori Materi Safety";
  }

  else if (kategoriMateriSafetyLink != "") {
    document.getElementById("kategoriMateriSafetyLinkBlank").innerHTML = "";
  }

  if (keteranganMateriSafetyLink == "") {
    document.getElementById("keteranganMateriSafetyLinkBlank").innerHTML = "*Masukkan Keterangan Materi Safety";
  }

  else if (keteranganMateriSafetyLink != "") {
    document.getElementById("keteranganMateriSafetyLinkBlank").innerHTML = "";
  }
}

function ValidasiEditDataMateriSafetyLink() {
  var linkMateriSafetyLink2 = document.getElementById("linkMateriSafetyLink2").value;
  var judulMateriSafetyLink2 = document.getElementById("judulMateriSafetyLink2").value;
  var kategoriMateriSafetyLink2 = document.getElementById("kategoriMateriSafetyLink2").value;
  var keteranganMateriSafetyLink2 = document.getElementById("keteranganMateriSafetyLink2").value;

  if (linkMateriSafetyLink2 == "") {
    document.getElementById("linkMateriSafetyLink2Blank").innerHTML = "*Masukkan File Safety";
  }

  else if (linkMateriSafetyLink2!= "") {
    document.getElementById("linkMateriSafetyLink2Blank").innerHTML = "";
  }


  if (judulMateriSafetyLink2 == "") {
    document.getElementById("judulMateriSafetyLink2Blank").innerHTML = "*Masukkan Judul Materi Safety";
  }

  else if (judulMateriSafetyLink2 != "") {
    document.getElementById("judulMateriSafetyLink2Blank").innerHTML = "";
  }

  if (kategoriMateriSafetyLink2 == "") {
    document.getElementById("kategoriMateriSafetyLink2Blank").innerHTML = "*Masukkan Kategori Materi Safety";
  }

  else if (kategoriMateriSafetyLink2 != "") {
    document.getElementById("kategoriMateriSafetyLink2Blank").innerHTML = "";
  }

  if (keteranganMateriSafetyLink2 == "") {
    document.getElementById("keteranganMateriSafetyLink2Blank").innerHTML = "*Masukkan Keterangan Materi Safety";
  }

  else if (keteranganMateriSafetyLink2 != "") {
    document.getElementById("keteranganMateriSafetyLink2Blank").innerHTML = "";
  }
}
