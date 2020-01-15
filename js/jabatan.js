// JABATAN EDIT  
$(".edit-nilai").click(function () {
    var id_jabatan = $(this).attr("id-jabatan");
    
    $.ajax({
      url: "../process/proses_adminJabatan.php",
      method: "post",
      data: {
        editJabatan: id_jabatan
      },
      success: function (data) {
        $("#edit-jabatan").html(data);
        $("#editJabatanModal").modal("show");
      }
    });
  });
// JABATAN EDIT  END