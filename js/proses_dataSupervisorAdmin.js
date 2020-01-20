// DATA SUPERVISOR EDIT  
$(".edit-dataSupervisor-admin").click(function () {
  var id_userEdit = $(this).attr("id_userEdit");
  var id_supervisorEdit= $(this).attr("id_supervisorEdit");

  $.ajax({
    url: "../process/proses_adminDataSupervisor.php",
    method: "post",
    data: {
      editDataSupervisor_idUser : id_userEdit,
      editDataSupervisor_idSupervisor: id_supervisorEdit
    },
    success: function (data) {
      $("#id_userUpdate").val(id_userEdit);
      $("#id_supervisorUpdate").val(id_supervisorEdit);
      $("#edit-dataSupervisor").html(data);
      $("#editDataSupervisorModal").modal("show");
    }
  });
});
// DATA SUPERVISOR EDIT END

// DATA SUPERVISOR HAPUS

$(".hapus-dataSupervisor-admin").click(function () {
  var id_user = $(this).attr("id_user");
  var id_supervisor = $(this).attr("id_supervisor");
  $('#id_userHapus').val(id_user);
  $('#id_supervisorHapus').val(id_supervisor);
  $('#hapusDataSupervisorModal').modal("show");
})

// DATA SUPERVISOR HAPUS END

// PROSES TAMBAH

function showPasswordSupervisor() {
  var password = document.getElementById("passwordSupervisorAdmin");
  if (password.type == "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
  
  var eye = document.getElementById("eyeSupervisor").classList;
    if (eye.contains("fa-eye")) {
      eye.remove("fa-eye");
      eye.add("fa-eye-slash");
    } else {
      eye.remove("fa-eye-slash");
      eye.add("fa-eye");
    }
}

function setup2() {
  document.getElementById('buttonid2').addEventListener('click', openDialog);
  function openDialog() {
      document.getElementById('fileid2').click();
  }
}

function preview_images22(event) {
  var reader = new FileReader();
  reader.onload = function() {
    var output = document.getElementById("fotoPrevSupervisorAdmin3");
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
}

function preventDefaultAction(event){

  var input, file;

  input = document.getElementById("fileid2");

  file = input.files[0];

  if(file.size > 1000000){
      
      event = event || window.event;
      
      document.getElementById("fileidSupervisorAdminBlank").innerHTML = "*Ukuran melebihi 1 MB";

      if(event.preventDefault){
          event.preventDefault();
      }
      else{
          event.returnValue = false;
      }
  }

  else if(file.size < 1000000){
      document.getElementById("fileidSupervisorAdminBlank").innerHTML = "";
  }
}

function ValidasiTambah(){
  var usernameSupervisorAdmin = document.getElementById("usernameSupervisorAdmin").value;
  var passwordSupervisorAdmin = document.getElementById("passwordSupervisorAdmin").value;
  var fileid2 = document.getElementById("fileid2").value;
  var nikSupervisorAdmin = document.getElementById("nikSupervisorAdmin").value;
  var namaSupervisorAdmin = document.getElementById("namaSupervisorAdmin").value;

  if(usernameSupervisorAdmin==""){
      document.getElementById("usernameSupervisorAdminBlank").innerHTML="*Masukkan Username Supervisor";
  }

  else if(usernameSupervisorAdmin!=""){
      document.getElementById("usernameOperatorAdminBlank").innerHTML="";
  }
  
  if(passwordSupervisorAdmin==""){
      document.getElementById("passwordSupervisorAdminBlank").innerHTML="*Masukkan Password Supervisor";
  }

  else if(passwordSupervisorAdmin!=""){
      document.getElementById("passwordSupervisorAdminBlank").innerHTML="";
  }

  if(fileid2==""){
      document.getElementById("fileidSupervisorAdminBlank").innerHTML="*Upload File Gambar Supervisor";
  }

  else if(fileid2!=""){
      document.getElementById("fileidSupervisorAdminBlank").innerHTML="";
  }


  if(nikSupervisorAdmin==""){
      document.getElementById("nikSupervisorAdminBlank").innerHTML="*Masukkan NIK Supervisor";
  }

  else if(nikSupervisorAdmin!=""){
      document.getElementById("nikSupervisorAdminBlank").innerHTML="";
  }

  if(namaSupervisorAdmin==""){
      document.getElementById("namaSupervisorAdminBlank").innerHTML="*Masukkan Nama Supervisor";
  }

  else if(namaSupervisorAdmin!=""){
      document.getElementById("namaSupervisorAdminBlank").innerHTML="";
  }
}

// PROSES TAMBAH END

//PROSES EDIT

function setup3() {
  document.getElementById('buttonid3').addEventListener('click', openDialog2);
  function openDialog2() {
      document.getElementById('fileid3').click();
  }
}

function preview_images6(event) {
  var reader = new FileReader();
  reader.onload = function() {
    var output = document.getElementById("fotoPrevSupervisorAdmin2");
    output.src = reader.result;
  };
  reader.readAsDataURL(event.target.files[0]);
}

function preventDefaultAction2(event){

  var input2, file2;

  input2 = document.getElementById("fileid3");

  file2 = input2.files[0];

  if(file2.size > 1000000){
      
      event = event || window.event;
      
      document.getElementById("fileidSupervisorAdminBlank2").innerHTML = "*Ukuran melebihi 1 MB";

      if(event.preventDefault){
          event.preventDefault();
      }
      else{
          event.returnValue = false;
      }
  }

  else if(file.size < 1000000){
      document.getElementById("fileidSupervisorAdminBlank2").innerHTML = "";
  }
}

function showPasswordOperator2() {
  var password = document.getElementById("passwordSupervisorAdmin2");
  if (password.type == "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }

  var eye = document.getElementById("eyeSupervisor2").classList;
  if (eye.contains("fa-eye")) {
    eye.remove("fa-eye");
    eye.add("fa-eye-slash");
  } else {
    eye.remove("fa-eye-slash");
    eye.add("fa-eye");
  }
}

function ValidasiEdit(){
  var usernameSupervisorAdmin2 = document.getElementById("usernameSupervisorAdmin2").value;
  var passwordSupervisorAdmin2 = document.getElementById("passwordSupervisorAdmin2").value;

  var nikSupervisorAdmin2 = document.getElementById("nikSupervisorAdmin2").value;
  var namaSupervisorAdmin2 = document.getElementById("namaSupervisorAdmin2").value;

  if(usernameSupervisorAdmin2==""){
      document.getElementById("usernameOperatorAdminBlank2").innerHTML="*Masukkan Username Supervisor";
  }

  else if(usernameSupervisorAdmin2!=""){
      document.getElementById("usernameSupervisorAdminBlank2").innerHTML="";
  }
  
  if(passwordSupervisorAdmin2==""){
      document.getElementById("passwordSupervisorAdminBlank2").innerHTML="*Masukkan Password Supervisor";
  }

  else if(passwordSupervisorAdmin2!=""){
      document.getElementById("passwordSupervisorAdminBlank2").innerHTML="";
  }

  if(nikSupervisorAdmin2==""){
      document.getElementById("nikSupervisorAdminBlank2").innerHTML="*Masukkan NIK Supervisor";
  }

  else if(nikSupervisorAdmin2!=""){
      document.getElementById("nikSupervisorAdminBlank2").innerHTML="";
  }

  if(namaSupervisorAdmin2==""){
      document.getElementById("namaSupervisorAdminBlank2").innerHTML="*Masukkan Nama Supervisor";
  }

  else if(namaSupervisorAdmin2!=""){
      document.getElementById("namaSupervisorAdminBlank2").innerHTML="";
  }
}

//PROSES EDIT END