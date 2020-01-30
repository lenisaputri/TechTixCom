$(".edit-dataMateriQuality-admin").click(function () {
  var id_materiQualityEdit = $(this).attr("id_materiQualityEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriQuality.php",
    method: "post",
    data: {
      editDataMateriQuality_idMateriQuality: id_materiQualityEdit,
    },
    success: function (data) {
      $("#id_materiQualityUpdate").val(id_materiQualityEdit);
      $("#edit-dataMateriQuality").html(data);
      $("#editDataMateriQualityModal").modal("show");
    }
  });
});

$(".hapus-dataMateriQuality-admin").click(function () {
  var id_materi_quality = $(this).attr("id_materi_quality");

  $('#id_materiQualityHapus').val(id_materi_quality);
  $('#hapusDataMateriQualityModal').modal("show");
})

$(".edit-dataMateriQualityLink-admin").click(function () {
  var id_materiQualityLinkEdit = $(this).attr("id_materiQualityLinkEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriQualityLink.php",
    method: "post",
    data: {
      editDataMateriQualityLink_idMateriQuality: id_materiQualityLinkEdit,
    },
    success: function (data) {
      $("#id_materiQualityLinkUpdate").val(id_materiQualityLinkEdit);
      $("#edit-dataMateriQualityLink").html(data);
      $("#editDataMateriQualityLinkModal").modal("show");
    }
  });
});

$(".hapus-dataMateriQualityLink-admin").click(function () {
  var id_materi_quality = $(this).attr("id_materi_quality");

  $('#id_materiQualityLinkHapus').val(id_materi_quality);
  $('#hapusDataMateriQualityLinkModal').modal("show");
})

function ValidasiTambahDataMateriQuality() {
  var fileMateriQuality = document.getElementById("fileMateriQuality").value;
  var judulMateriQuality = document.getElementById("judulMateriQuality").value;
  var kategoriMateriQuality = document.getElementById("kategoriMateriQuality").value;
  var keteranganMateriQuality = document.getElementById("keteranganMateriQuality").value;

  if (fileMateriQuality == "") {
    document.getElementById("fileMateriQualityBlank").innerHTML = "*Masukkan File Quality";
  }

  else if (fileMateriQuality != "") {
    document.getElementById("fileMateriQualityBlank").innerHTML = "";
  }


  if (judulMateriQuality == "") {
    document.getElementById("judulMateriQualityBlank").innerHTML = "*Masukkan Judul Materi Quality";
  }

  else if (judulMateriQuality != "") {
    document.getElementById("judulMateriQualityBlank").innerHTML = "";
  }

  if (kategoriMateriQuality == "") {
    document.getElementById("kategoriMateriQualityBlank").innerHTML = "*Masukkan Kategori Materi Quality";
  }

  else if (kategoriMateriQuality != "") {
    document.getElementById("kategoriMateriQualityBlank").innerHTML = "";
  }

  if (keteranganMateriQuality == "") {
    document.getElementById("keteranganMateriQualityBlank").innerHTML = "*Masukkan Keterangan Materi Quality";
  }

  else if (keteranganMateriQuality != "") {
    document.getElementById("keteranganMateriQualityBlank").innerHTML = "";
  }
}

function ValidasiEditDataMateriQuality() {
  var fileMateriQuality2 = document.getElementById("fileMateriQuality2").value;
  var judulMateriQuality2 = document.getElementById("judulMateriQuality2").value;
  var kategoriMateriQuality2 = document.getElementById("kategoriMateriQuality2").value;
  var keteranganMateriQuality2 = document.getElementById("keteranganMateriQuality2").value;

  if (fileMateriQuality2 == "") {
    document.getElementById("fileMateriQualityBlank2").innerHTML = "*Masukkan File Quality";
  }

  else if (fileMateriQuality2 != "") {
    document.getElementById("fileMateriQualityBlank2").innerHTML = "";
  }


  if (judulMateriQuality2 == "") {
    document.getElementById("judulMateriQualityBlank2").innerHTML = "*Masukkan Judul Materi Quality";
  }

  else if (judulMateriQuality2 != "") {
    document.getElementById("judulMateriQualityBlank2").innerHTML = "";
  }

  if (kategoriMateriQuality2 == "") {
    document.getElementById("kategoriMateriQualityBlank2").innerHTML = "*Masukkan Kategori Materi Quality";
  }

  else if (kategoriMateriQuality2 != "") {
    document.getElementById("kategoriMateriQualityBlank2").innerHTML = "";
  }

  if (keteranganMateriQuality2 == "") {
    document.getElementById("keteranganMateriQualityBlank2").innerHTML = "*Masukkan Keterangan Materi Quality";
  }

  else if (keteranganMateriQuality2 != "") {
    document.getElementById("keteranganMateriQualityBlank2").innerHTML = "";
  }
}

function ValidasiTambahDataMateriQualityLink() {
  var linkMateriQualityLink = document.getElementById("linkMateriQualityLink").value;
  var judulMateriQualityLink = document.getElementById("judulMateriQualityLink").value;
  var kategoriMateriQualityLink = document.getElementById("kategoriMateriQualityLink").value;
  var keteranganMateriQualityLink = document.getElementById("keteranganMateriQualityLink").value;

  if (linkMateriQualityLink == "") {
    document.getElementById("linkMateriQualityLinkBlank").innerHTML = "*Masukkan Link Quality";
  }

  else if (linkMateriQualityLink!= "") {
    document.getElementById("linkMateriQualityLinkBlank").innerHTML = "";
  }


  if (judulMateriQualityLink == "") {
    document.getElementById("judulMateriQualityLinkBlank").innerHTML = "*Masukkan Judul Materi Quality";
  }

  else if (judulMateriQualityLink != "") {
    document.getElementById("judulMateriQualityLinkBlank").innerHTML = "";
  }

  if (kategoriMateriQualityLink == "") {
    document.getElementById("kategoriMateriQualityLinkBlank").innerHTML = "*Masukkan Kategori Materi Quality";
  }

  else if (kategoriMateriQualityLink != "") {
    document.getElementById("kategoriMateriQualityLinkBlank").innerHTML = "";
  }

  if (keteranganMateriQualityLink == "") {
    document.getElementById("keteranganMateriQualityLinkBlank").innerHTML = "*Masukkan Keterangan Materi Quality";
  }

  else if (keteranganMateriQualityLink != "") {
    document.getElementById("keteranganMateriQualityLinkBlank").innerHTML = "";
  }
}

function ValidasiEditDataMateriQualityLink() {
  var linkMateriQualityLink2 = document.getElementById("linkMateriQualityLink2").value;
  var judulMateriQualityLink2 = document.getElementById("judulMateriQualityLink2").value;
  var kategoriMateriQualityLink2 = document.getElementById("kategoriMateriQualityLink2").value;
  var keteranganMateriQualityLink2 = document.getElementById("keteranganMateriQualityLink2").value;

  if (linkMateriQualityLink2 == "") {
    document.getElementById("linkMateriQualityLinkBlank2").innerHTML = "*Masukkan Link Quality";
  }

  else if (linkMateriQualityLink2!= "") {
    document.getElementById("linkMateriQualityLinkBlank2").innerHTML = "";
  }


  if (judulMateriQualityLink2 == "") {
    document.getElementById("judulMateriQualityLinkBlank2").innerHTML = "*Masukkan Judul Materi Quality";
  }

  else if (judulMateriQualityLink2 != "") {
    document.getElementById("judulMateriQualityLinkBlank2").innerHTML = "";
  }

  if (kategoriMateriQualityLink2 == "") {
    document.getElementById("kategoriMateriQualityLinkBlank2").innerHTML = "*Masukkan Kategori Materi Quality";
  }

  else if (kategoriMateriQualityLink2 != "") {
    document.getElementById("kategoriMateriQualityLinkBlank2").innerHTML = "";
  }

  if (keteranganMateriQualityLink2 == "") {
    document.getElementById("keteranganMateriQualityLinkBlank2").innerHTML = "*Masukkan Keterangan Materi Quality";
  }

  else if (keteranganMateriQualityLink2 != "") {
    document.getElementById("keteranganMateriQualityLinkBlank2").innerHTML = "";
  }
}