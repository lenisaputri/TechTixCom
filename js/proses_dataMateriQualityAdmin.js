// DATA MATERI Quality EDIT  
$(".edit-dataMateriQuality-admin").click(function () {
    var id_materiQualityEdit = $(this).attr("id_materiQualityEdit");

    $.ajax({
      url: "../process/proses_adminDataMateriQuality.php",
      method: "post",
      data: {
        editDataMateriQuality_idMateriQuality : id_materiQualityEdit,
      },
      success: function (data) {
        $("#id_materiQualityUpdate").val(id_materiQualityEdit);
        $("#edit-dataMateriQuality").html(data);
        $("#editDataMateriQualityModal").modal("show");
      }
    });
  });
// DATA MATERI Quality EDIT END

// DATA MATERI Quality HAPUS

$(".hapus-dataMateriQuality-admin").click(function () {
  var id_materi_quality = $(this).attr("id_materi_quality");
 
  $('#id_materiQualityHapus').val(id_materi_quality);
  $('#hapusDataMateriQualityModal').modal("show");
})

// DATA MATERI Quality HAPUS END