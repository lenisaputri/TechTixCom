// DATA OPERATOR EDIT  
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
// DATA OPERATOR EDIT END