// DATA MATERI Technical EDIT  
$(".edit-dataMateriTechnical-admin").click(function () {
    var id_materiTechnicalEdit = $(this).attr("id_materiTechnicalEdit");

    $.ajax({
      url: "../process/proses_adminDataMateriTechnical.php",
      method: "post",
      data: {
        editDataMateriTechnical_idMateriTechnical : id_materiTechnicalEdit,
      },
      success: function (data) {
        $("#id_materiTechnicalUpdate").val(id_materiTechnicalEdit);
        $("#edit-dataMateriTechnical").html(data);
        $("#editDataMateriTechnicalModal").modal("show");
      }
    });
  });
// DATA MATERI Technical EDIT END

// DATA MATERI Technical HAPUS

$(".hapus-dataMateriTechnical-admin").click(function () {
  var id_materi_technical = $(this).attr("id_materi_technical");
 
  $('#id_materiTechnicalHapus').val(id_materi_technical);
  $('#hapusDataMateriTechnicalModal').modal("show");
})

// DATA MATERI v HAPUS END