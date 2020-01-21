// JABATAN EDIT  
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
// JABATAN EDIT END

//JABATAN HAPUS
$(".hapus-kategoriMateri").click(function() {
  var id_kategori_materi = $(this).attr("id-kategori-materi");
  $("#id_kategoriMateriHapus").val(id_kategori_materi);
  $("#hapusKategoriMateriModal").modal("show");
});
//JABATAN HAPUS END