// DATA MATERI SAFETY EDIT  
$(".edit-dataMateriSafety-admin").click(function () {
    var id_materiSafetyEdit = $(this).attr("id_materiSafetyEdit");

    $.ajax({
      url: "../process/proses_adminDataMateriSafety.php",
      method: "post",
      data: {
        editDataMateriSafety_idMateriSafety : id_materiSafetyEdit,
      },
      success: function (data) {
        $("#id_materiSafetyUpdate").val(id_materiSafetyEdit);
        $("#edit-dataMateriSafety").html(data);
        $("#editDataMateriSafetyModal").modal("show");
      }
    });
  });
// DATA MATERI SAFETY EDIT END

// DATA MATERI SAFETY HAPUS

$(".hapus-dataMateriSafety-admin").click(function () {
  var id_materi_safety = $(this).attr("id_materi_safety");
 
  $('#id_materiSafetyHapus').val(id_materi_safety);
  $('#hapusDataMateriSafetyModal').modal("show");
})

// DATA MATERI SAFETY HAPUS END

// DATA MATERI SAFETY Link EDIT  
$(".edit-dataMateriSafetyLink-admin").click(function () {
  var id_materiSafetyLinkEdit = $(this).attr("id_materiSafetyLinkEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriSafetyLink.php",
    method: "post",
    data: {
      editDataMateriSafetyLink_idMateriSafety : id_materiSafetyLinkEdit,
    },
    success: function (data) {
      $("#id_materiSafetyLinkUpdate").val(id_materiSafetyLinkEdit);
      $("#edit-dataMateriSafetyLink").html(data);
      $("#editDataMateriSafetyLinkModal").modal("show");
    }
  });
});
// DATA MATERI SAFETY EDIT Link END

// DATA MATERI SAFETY Link HAPUS

$(".hapus-dataMateriSafetyLink-admin").click(function () {
var id_materi_safety = $(this).attr("id_materi_safety");

$('#id_materiSafetyLinkHapus').val(id_materi_safety);
$('#hapusDataMateriSafetyLinkModal').modal("show");
})

// DATA MATERI SAFETY Link HAPUS END