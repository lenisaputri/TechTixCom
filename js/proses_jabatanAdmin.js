$(".edit-jabatan").click(function () {
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

$(".hapus-jabatan").click(function () {
  var id_jabatan = $(this).attr("id-jabatan");
  $("#id_jabatanHapus").val(id_jabatan);
  $("#hapusJabatanModal").modal("show");
});

function ValidasiTambahJabatan() {
  var nama = document.getElementById("nama").value;

  if (nama == "") {
    document.getElementById("namaBlank").innerHTML = "*Masukkan Data Jabatan";
  }

  else if (nama != "") {
    document.getElementById("namaBlank").innerHTML = "";
  }
}

function ValidasiEditJabatan() {
  var nama2 = document.getElementById("nama2").value;

  if (nama2 == "") {
    document.getElementById("nama2Blank").innerHTML = "*Masukkan Data Jabatan";
  }

  else if (nama2 != "") {
    document.getElementById("nama2Blank").innerHTML = "";
  }
}