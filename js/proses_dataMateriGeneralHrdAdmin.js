// DATA MATERI GENERAL HRD EDIT  
$(".edit-dataMateriGeneralHrd-admin").click(function () {
  var id_materiGeneralHrdEdit = $(this).attr("id_materiGeneralHrdEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriGeneralHrd.php",
    method: "post",
    data: {
      editDataMateriGeneralHrd_idMateriGeneralHrd: id_materiGeneralHrdEdit,
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

  $('#id_materiGeneralHrdHapus').val(id_materi_generalhrd2);
  $('#hapusDataMateriGeneralHrdModal').modal("show");
})

// DATA MATERI GeneralHrd HAPUS END

// DATA MATERI GeneralHrd Link EDIT  
$(".edit-dataMateriGeneralHrdLink-admin").click(function () {
  var id_materiGeneralHrdLinkEdit = $(this).attr("id_materiGeneralHrdLinkEdit");

  $.ajax({
    url: "../process/proses_adminDataMateriGeneralHrdLink.php",
    method: "post",
    data: {
      editDataMateriGeneralHrdLink_idMateriGeneralHrd: id_materiGeneralHrdLinkEdit,
    },
    success: function (data) {
      $("#id_materiGeneralHrdLinkUpdate").val(id_materiGeneralHrdLinkEdit);
      $("#edit-dataMateriGeneralHrdLink").html(data);
      $("#editDataMateriGeneralHrdLinkModal").modal("show");
    }
  });
});
// DATA MATERI GeneralHrd EDIT Link END

// DATA MATERI Quality Link HAPUS

$(".hapus-dataMateriQualityLink-admin").click(function () {
  var id_materi_quality = $(this).attr("id_materi_quality");

  $('#id_materiQualityLinkHapus').val(id_materi_quality);
  $('#hapusDataMateriQualityLinkModal').modal("show");
})

// DATA MATERI Quality Link HAPUS END