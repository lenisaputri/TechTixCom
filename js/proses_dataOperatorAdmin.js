// JABATAN EDIT  
$(".edit-dataOperator-admin").click(function () {
    var id_userEdit = $(this).attr("id_userEdit");
    var id_operatorEdit= $(this).attr("id_operatorEdit");

    $.ajax({
      url: "../process/proses_adminDataOperator.php",
      method: "post",
      data: {
        editDataOperator_idUser : id_userEdit,
        editDataOperator_idOperator: id_operatorEdit
      },
      success: function (data) {
        $("#id_userUpdate").val(id_userEdit);
        $("#id_operatorUpdate").val(id_operatorEdit);
        $("#edit-dataOperator").html(data);
        $("#editDataOperatorModal").modal("show");
      }
    });
  });
// JABATAN EDIT END

function setup2() {
    document.getElementById('buttonid2').addEventListener('click', openDialog);
    function openDialog() {
        document.getElementById('fileid2').click();
    }
}

function preview_images22(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById("fotoPrevOperatorAdmin3");
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
        
        document.getElementById("fileidOperatorAdminBlank").innerHTML = "*Ukuran melebihi 1 MB";

        if(event.preventDefault){
            event.preventDefault();
        }
        else{
            event.returnValue = false;
        }
    }

    else if(file.size < 1000000){
        document.getElementById("fileidOperatorAdminBlank").innerHTML = "";
    }
}

// show password
function showPasswordOperator() {
    var password = document.getElementById("passwordOperatorAdmin");
    if (password.type == "password") {
      password.type = "text";
    } else {
      password.type = "password";
    }
  
    var eye = document.getElementById("eyeOperator").classList;
    if (eye.contains("fa-eye")) {
      eye.remove("fa-eye");
      eye.add("fa-eye-slash");
    } else {
      eye.remove("fa-eye-slash");
      eye.add("fa-eye");
    }
}

// show password2
function showPasswordOperator2() {
    var password = document.getElementById("passwordOperatorAdmin2");
    if (password.type == "password") {
      password.type = "text";
    } else {
      password.type = "password";
    }
  
    var eye = document.getElementById("eyeOperator").classList;
    if (eye.contains("fa-eye")) {
      eye.remove("fa-eye");
      eye.add("fa-eye-slash");
    } else {
      eye.remove("fa-eye-slash");
      eye.add("fa-eye");
    }
}

//VALIDASI TAMBAH
function ValidasiTambah(){
    var usernameOperatorAdmin = document.getElementById("usernameOperatorAdmin").value;
    var passwordOperatorAdmin = document.getElementById("passwordOperatorAdmin").value;
    var fileid2 = document.getElementById("fileid2").value;
    var nikOperatorAdmin = document.getElementById("nikOperatorAdmin").value;
    var namaOperatorAdmin = document.getElementById("namaOperatorAdmin").value;

    if(usernameOperatorAdmin==""){
        document.getElementById("usernameOperatorAdminBlank").innerHTML="*Masukkan Username Operator";
    }

    else if(usernameOperatorAdmin!=""){
        document.getElementById("usernameOperatorAdminBlank").innerHTML="";
    }
    
    if(passwordOperatorAdmin==""){
        document.getElementById("passwordOperatorAdminBlank").innerHTML="*Masukkan Password Operator";
    }

    else if(passwordOperatorAdmin!=""){
        document.getElementById("passwordOperatorAdminBlank").innerHTML="";
    }

    if(fileid2==""){
        document.getElementById("fileidOperatorAdminBlank").innerHTML="*Upload File Gambar Operator";
    }

    else if(fileid2!=""){
        document.getElementById("fileidOperatorAdminBlank").innerHTML="";
    }


    if(nikOperatorAdmin==""){
        document.getElementById("nikOperatorAdminBlank").innerHTML="*Masukkan NIK Operator";
    }

    else if(nikOperatorAdmin!=""){
        document.getElementById("nikOperatorAdminBlank").innerHTML="";
    }

    if(namaOperatorAdmin==""){
        document.getElementById("namaOperatorAdminBlank").innerHTML="*Masukkan Nama Operator";
    }

    else if(namaOperatorAdmin!=""){
        document.getElementById("namaOperatorAdminBlank").innerHTML="";
    }
}