// DATA MATERI QUALITY EDIT  
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

// DATA MATERI Quality Link EDIT  
$(".edit-dataMateriQualityLink-admin").click(function () {
var id_materiQualityLinkEdit = $(this).attr("id_materiQualityLinkEdit");

$.ajax({
  url: "../process/proses_adminDataMateriQualityLink.php",
  method: "post",
  data: {
    editDataMateriQualityLink_idMateriQuality : id_materiQualityLinkEdit,
  },
  success: function (data) {
    $("#id_materiQualityLinkUpdate").val(id_materiQualityLinkEdit);
    $("#edit-dataMateriQualityLink").html(data);
    $("#editDataMateriQualityLinkModal").modal("show");
  }
});
});
// DATA MATERI Quality EDIT Link END

// DATA MATERI Quality Link HAPUS

$(".hapus-dataMateriQualityLink-admin").click(function () {
var id_materi_quality = $(this).attr("id_materi_quality");

$('#id_materiQualityLinkHapus').val(id_materi_quality);
$('#hapusDataMateriQualityLinkModal').modal("show");
})

// DATA MATERI Quality Link HAPUS END