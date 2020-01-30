$(".edit-dataOperator-admin").click(function () {
    var id_userEdit = $(this).attr("id_userEdit");
    var id_operatorEdit = $(this).attr("id_operatorEdit");

    $.ajax({
        url: "../process/proses_adminDataOperator.php",
        method: "post",
        data: {
            editDataOperator_idUser: id_userEdit,
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

$(".hapus-dataOperator-admin").click(function () {
    var id_user = $(this).attr("id_user");
    var id_operator = $(this).attr("id_operator");
    $('#id_userHapus').val(id_user);
    $('#id_operatorHapus').val(id_operator);
    $('#hapusDataOperatorModal').modal("show");
})

function setupOperator2() {
    document.getElementById('buttonid2').addEventListener('click', openDialog);
    function openDialog() {
        document.getElementById('fileid2').click();
    }
}

function setupOperator3() {
    document.getElementById('buttonid3').addEventListener('click', openDialog2);
    function openDialog2() {
        document.getElementById('fileid3').click();
    }
}

function preview_imagesOperator22(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById("fotoPrevOperatorAdmin3");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function preview_imagesOperator6(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById("fotoPrevOperatorAdmin2");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

function preventDefaultActionOperator(event) {
    var input, file;
    input = document.getElementById("fileid2");
    file = input.files[0];
    if (file.size > 1000000) {
        event = event || window.event;
        document.getElementById("fileidOperatorAdminBlank").innerHTML = "*Ukuran melebihi 1 MB";
        if (event.preventDefault) {
            event.preventDefault();
        }
        else {
            event.returnValue = false;
        }
    }
    else if (file.size < 1000000) {
        document.getElementById("fileidOperatorAdminBlank").innerHTML = "";
    }
}

function preventDefaultActionOperator2(event) {
    var input2, file2;
    input2 = document.getElementById("fileid3")
    file2 = input2.files[0];
    if (file2.size > 1000000) {
        event = event || window.event;
        document.getElementById("fileidOperatorAdminBlank2").innerHTML = "*Ukuran melebihi 1 MB";
        if (event.preventDefault) {
            event.preventDefault();
        }
        else {
            event.returnValue = false;
        }
    }
    else if (file.size < 1000000) {
        document.getElementById("fileidOperatorAdminBlank2").innerHTML = "";
    }
}

function showPasswordOperator() {
    var password = document.getElementById("passwordOperatorAdmin");
    if (password.type == "password") {
        password.type = "text";
    } 
    else {
        password.type = "password";
    }

    var eye = document.getElementById("eyeOperator").classList;
    if (eye.contains("fa-eye")) {
        eye.remove("fa-eye");
        eye.add("fa-eye-slash");
    } 
    else {
        eye.remove("fa-eye-slash");
        eye.add("fa-eye");
    }
}

function showPasswordOperator2() {
    var password = document.getElementById("passwordOperatorAdmin2");
    if (password.type == "password") {
        password.type = "text";
    } 
    else {
        password.type = "password";
    }

    var eye = document.getElementById("eyeOperator2").classList;
    if (eye.contains("fa-eye")) {
        eye.remove("fa-eye");
        eye.add("fa-eye-slash");
    } 
    else {
        eye.remove("fa-eye-slash");
        eye.add("fa-eye");
    }
}

function ValidasiTambahOperator() {
    var usernameOperatorAdmin = document.getElementById("usernameOperatorAdmin").value;
    var passwordOperatorAdmin = document.getElementById("passwordOperatorAdmin").value;
    var fileid2 = document.getElementById("fileid2").value;
    var nikOperatorAdmin = document.getElementById("nikOperatorAdmin").value;
    var namaOperatorAdmin = document.getElementById("namaOperatorAdmin").value;

    if (usernameOperatorAdmin == "") {
        document.getElementById("usernameOperatorAdminBlank").innerHTML = "*Masukkan Username Operator";
    }
    else if (usernameOperatorAdmin != "") {
        document.getElementById("usernameOperatorAdminBlank").innerHTML = "";
    }

    if (passwordOperatorAdmin == "") {
        document.getElementById("passwordOperatorAdminBlank").innerHTML = "*Masukkan Password Operator";
    }
    else if (passwordOperatorAdmin != "") {
        document.getElementById("passwordOperatorAdminBlank").innerHTML = "";
    }

    if (fileid2 == "") {
        document.getElementById("fileidOperatorAdminBlank").innerHTML = "*Upload File Gambar Operator";
    }
    else if (fileid2 != "") {
        document.getElementById("fileidOperatorAdminBlank").innerHTML = "";
    }


    if (nikOperatorAdmin == "") {
        document.getElementById("nikOperatorAdminBlank").innerHTML = "*Masukkan NIK Operator";
    }
    else if (nikOperatorAdmin != "") {
        document.getElementById("nikOperatorAdminBlank").innerHTML = "";
    }

    if (namaOperatorAdmin == "") {
        document.getElementById("namaOperatorAdminBlank").innerHTML = "*Masukkan Nama Operator";
    }
    else if (namaOperatorAdmin != "") {
        document.getElementById("namaOperatorAdminBlank").innerHTML = "";
    }
}

function ValidasiEditOperator() {
    var usernameOperatorAdmin2 = document.getElementById("usernameOperatorAdmin2").value;
    var passwordOperatorAdmin2 = document.getElementById("passwordOperatorAdmin2").value;
    var nikOperatorAdmin2 = document.getElementById("nikOperatorAdmin2").value;
    var namaOperatorAdmin2 = document.getElementById("namaOperatorAdmin2").value;

    if (usernameOperatorAdmin2 == "") {
        document.getElementById("usernameOperatorAdminBlank2").innerHTML = "*Masukkan Username Operator";
    }
    else if (usernameOperatorAdmin2 != "") {
        document.getElementById("usernameOperatorAdminBlank2").innerHTML = "";
    }

    if (passwordOperatorAdmin2 == "") {
        document.getElementById("passwordOperatorAdminBlank2").innerHTML = "*Masukkan Password Operator";
    }
    else if (passwordOperatorAdmin2 != "") {
        document.getElementById("passwordOperatorAdminBlank2").innerHTML = "";
    }

    if (nikOperatorAdmin2 == "") {
        document.getElementById("nikOperatorAdminBlank2").innerHTML = "*Masukkan NIK Operator";
    }
    else if (nikOperatorAdmin2 != "") {
        document.getElementById("nikOperatorAdminBlank2").innerHTML = "";
    }

    if (namaOperatorAdmin2 == "") {
        document.getElementById("namaOperatorAdminBlank2").innerHTML = "*Masukkan Nama Operator";
    }
    else if (namaOperatorAdmin2 != "") {
        document.getElementById("namaOperatorAdminBlank2").innerHTML = "";
    }
}