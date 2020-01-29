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

// DATA MATERI Technical HAPUS END

// DATA MATERI Technical Link EDIT  
$(".edit-dataMateriTechnicalLink-admin").click(function () {
var id_materiTechnicalLinkEdit = $(this).attr("id_materiTechnicalLinkEdit");

$.ajax({
  url: "../process/proses_adminDataMateriTechnicalLink.php",
  method: "post",
  data: {
    editDataMateriTechnicalLink_idMateriTechnical : id_materiTechnicalLinkEdit,
  },
  success: function (data) {
    $("#id_materiTechnicalLinkUpdate").val(id_materiTechnicalLinkEdit);
    $("#edit-dataMateriTechnicalLink").html(data);
    $("#editDataMateriTechnicalLinkModal").modal("show");
  }
});
});
// DATA MATERI Technical EDIT Link END

// DATA MATERI Technical Link HAPUS

$(".hapus-dataMateriTechnicalLink-admin").click(function () {
var id_materi_technical = $(this).attr("id_materi_technical");

$('#id_materiTechnicalLinkHapus').val(id_materi_technical);
$('#hapusDataMateriTechnicalLinkModal').modal("show");
})

// DATA MATERI Technical Link HAPUS END