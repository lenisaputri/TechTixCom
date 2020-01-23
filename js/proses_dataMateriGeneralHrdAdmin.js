// DATA MATERI GeneralHrd EDIT  
$(".edit-dataMateriGeneralHrd-admin").click(function () {
    var id_materiGeneralHrdEdit = $(this).attr("id_materiGeneralHrdEdit");

    $.ajax({
      url: "../process/proses_adminDataMateriGeneralHrd.php",
      method: "post",
      data: {
        editDataMateriGeneralHrd_idMateriGeneralHrd : id_materiGeneralHrdEdit,
      },
      success: function (data) {
        $("#id_materiGeneralHrdUpdate").val(id_materiGeneralHrdEdit);
        $("#edit-dataMateriGeneralHrd").html(data);
        $("#editDataMateriGeneralHrdModal").modal("show");
      }
    });
  });
// DATA MATERI GeneralHrd EDIT END

// DATA MATERI GeneralHrd HAPUS

$(".hapus-dataMateriGeneralHrd-admin").click(function () {
  var id_materi_generalhrd = $(this).attr("id_materi_generalhrd");
 
  $('#id_materiGeneralHrdHapus').val(id_materi_generalhrd);
  $('#hapusDataMateriGeneralHrdModal').modal("show");
})

// DATA MATERI v HAPUS END