$(".edit-kategoriMateri").click(function () {
  var id_kategori_materi = $(this).attr("id-kategori-materi");

  $.ajax({
    url: "../process/proses_adminKategoriMateri.php",
    method: "post",
    data: {
      editKategoriMateri: id_kategori_materi
    },
    success: function (data) {
      $("#edit-kategoriMateri").html(data);
      $("#editKategoriMateriModal").modal("show");
    }
  });
});

$(".hapus-kategoriMateri").click(function () {
  var id_kategori_materi = $(this).attr("id-kategori-materi");
  $("#id_kategoriMateriHapus").val(id_kategori_materi);
  $("#hapusKategoriMateriModal").modal("show");
});

function ValidasiTambahKategoriMateri() {
  var kategori_materi = document.getElementById("kategori_materi").value;

  if (kategori_materi == "") {
    document.getElementById("kategori_materiBlank").innerHTML = "*Masukkan Data Kategori Materi";
  }

  else if (kategori_materi != "") {
    document.getElementById("kategori_materiBlank").innerHTML = "";
  }
}

function ValidasiEditKategoriMateri() {
  var kategori_materi2 = document.getElementById("kategori_materi2").value;

  if (kategori_materi2 == "") {
    document.getElementById("kategori_materi2Blank").innerHTML = "*Masukkan Data Kategori Materi";
  }

  else if (kategori_materi2 != "") {
    document.getElementById("kategori_materi2Blank").innerHTML = "";
  }
}