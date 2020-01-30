function showFilesSize(event) {
    var masukan, fail;
    masukan = document.getElementById("foto");
    failPath = masukan.value;
    var yangBoleh = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    fail = masukan.files[0];

    var passwordBaru2 = document.getElementById("passwordBaru").value;
    var konfirmasiPassword2 = document.getElementById("konfirmasiPassword").value;
    var passwordLama2 = document.getElementById("passwordLama").value;
    var passwordLamaKonfirmasi = document.getElementById("passwordModal").value;

    event = event || window.event;

    if (failPath != "") {
        if (passwordLama2 != "") {
            if (passwordBaru2 != "") {
                if (konfirmasiPassword2 != "") {
                    if (!yangBoleh.exec(failPath)) {
                        document.getElementById("Blank").innerHTML = "* Ekstensi file tidak sesuai";
                        if (event.preventDefault) {
                            event.preventDefault();
                        }
                        else {
                            event.returnValue = false;
                        }
                    }
                    else {
                        if (fail.size < 1000000) {
                            if (passwordLama2 == passwordLamaKonfirmasi) {
                                if (passwordBaru2 == konfirmasiPassword2) {
                                    document.getElementById("Blank").innerHTML = "";
                                }
                                else if (passwordBaru2 != konfirmasiPassword2) {
                                    document.getElementById("Blank").innerHTML = "* Konfirmasi password tidak sesuai";
                                    if (event.preventDefault) {
                                        event.preventDefault();
                                    }
                                    else {
                                        event.returnValue = false;
                                    }
                                }
                            }
                            else if (passwordLama2 != passwordLamaKonfirmasi) {
                                document.getElementById("Blank").innerHTML = "* Password lama tidak sesuai";
                                if (event.preventDefault) {
                                    event.preventDefault();
                                }
                                else {
                                    event.returnValue = false;
                                }
                            }
                        }
                        else if (fail.size > 1000000) {
                            document.getElementById("Blank").innerHTML = "* Ukuran foto melebihi 1 MB";
                            if (event.preventDefault) {
                                event.preventDefault();
                            }
                            else {
                                event.returnValue = false;
                            }
                        }
                    }
                }
                else if (konfirmasiPassword2 == "") {
                    document.getElementById("Blank").innerHTML = "* Konfirmasi password tidak diisi";
                    if (event.preventDefault) {
                        event.preventDefault();
                    }
                    else {
                        event.returnValue = false;
                    }
                }
            }
            else if (passwordBaru2 == "") {
                document.getElementById("Blank").innerHTML = "* Password baru tidak diisi";
                if (event.preventDefault) {
                    event.preventDefault();
                }
                else {
                    event.returnValue = false;
                }
            }
        }
        else if (passwordLama2 == "") {
            if (!yangBoleh.exec(failPath)) {
                document.getElementById("Blank").innerHTML = "* Ekstensi file tidak sesuai";
                if (event.preventDefault) {
                    event.preventDefault();
                }
                else {
                    event.returnValue = false;
                }
            }
            else {
                if (fail.size < 1000000) {
                    document.getElementById("Blank").innerHTML = "";
                }
                else if (fail.size > 1000000) {
                    document.getElementById("Blank").innerHTML = "* Ukuran foto melebihi 1 MB";
                    if (event.preventDefault) {
                        event.preventDefault();
                    }
                    else {
                        event.returnValue = false;
                    }
                }
            }
        }
    }
    else if (failPath == "") {
        if (passwordLama2 != "") {
            if (passwordBaru2 != "") {
                if (konfirmasiPassword2 != "") {
                    if (passwordLama2 == passwordLamaKonfirmasi) {
                        if (passwordBaru2 == konfirmasiPassword2) {
                            document.getElementById("Blank").innerHTML = "";
                        }
                        else if (passwordBaru2 != konfirmasiPassword2) {
                            document.getElementById("Blank").innerHTML = "* Konfirmasi password tidak sesuai";
                            if (event.preventDefault) {
                                event.preventDefault();
                            }
                            else {
                                event.returnValue = false;
                            }
                        }
                    }
                    else if (passwordLama2 != passwordLamaKonfirmasi) {
                        document.getElementById("Blank").innerHTML = "* Password lama tidak sesuai";

                        if (event.preventDefault) {
                            event.preventDefault();
                        }
                        else {
                            event.returnValue = false;
                        }
                    }
                }
                else if (konfirmasiPassword2 == "") {
                    document.getElementById("Blank").innerHTML = "* Konfirmasi password tidak diisi";
                    if (event.preventDefault) {
                        event.preventDefault();
                    }
                    else {
                        event.returnValue = false;
                    }
                }
            }
            else if (passwordBaru2 == "") {
                document.getElementById("Blank").innerHTML = "* Password baru tidak diisi";
                if (event.preventDefault) {
                    event.preventDefault();
                }
                else {
                    event.returnValue = false;
                }
            }
        }
        else if (passwordLama2 == "") {
            document.getElementById("Blank").innerHTML = "* Tidak ada data yang diisi";
            if (event.preventDefault) {
                event.preventDefault();
            }
            else {
                event.returnValue = false;
            }
        }
    }
}

function reset_Blank() {
    var foto = document.getElementById("foto").value;
    var passwordLama = document.getElementById("passwordLama").value;
    var passwordBaru = document.getElementById("passwordBaru").value;
    var konfirmasiPassword = document.getElementById("konfirmasiPassword").value;

    if (
        foto != "" &&
        passwordLama != "" &&
        passwordBaru != "" &&
        konfirmasiPassword != ""
    ) {
        document.getElementById("Blank").innerHTML = "";
    }
}

function reset_Size() {
    var input, file;
    input = document.getElementById("foto");
    file = input.files[0];
    if (file.size < 8000000) {
        document.getElementById("fotoSize").innerHTML = "";
    }
}

function reset_Check() {
    var input = document.getElementById("foto");
    var filePath = input.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

    if (allowedExtensions.exec(filePath)) {
        document.getElementById("fotoType").innerHTML = "";
        fileInput.value = "";
        return true;
    }
}

function preview_image(event) {
    var reader = new FileReader();
    reader.onload = function () {
        var output = document.getElementById("fotoPrev");
        output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
}

$(function () {
    $('[data-toggle="popover"]').popover();
});

function showPasswordLama() {
    var password = document.getElementById("passwordLama");
    if (password.type == "password") {
        password.type = "text";
    }
    else {
        password.type = "password";
    }

    var eye = document.getElementById("eyeA").classList;
    if (eye.contains("fa-eye")) {
        eye.remove("fa-eye");
        eye.add("fa-eye-slash");
    }
    else {
        eye.remove("fa-eye-slash");
        eye.add("fa-eye");
    }
}

function showPasswordBaru() {
    var password = document.getElementById("passwordBaru");
    if (password.type == "password") {
        password.type = "text";
    }
    else {
        password.type = "password";
    }

    var eye = document.getElementById("eyeB").classList;
    if (eye.contains("fa-eye")) {
        eye.remove("fa-eye");
        eye.add("fa-eye-slash");
    }
    else {
        eye.remove("fa-eye-slash");
        eye.add("fa-eye");
    }
}

function showPasswordKonfirmasi() {
    var password = document.getElementById("konfirmasiPassword");
    if (password.type == "password") {
        password.type = "text";
    }
    else {
        password.type = "password";
    }

    var eye = document.getElementById("eyeC").classList;
    if (eye.contains("fa-eye")) {
        eye.remove("fa-eye");
        eye.add("fa-eye-slash");
    }
    else {
        eye.remove("fa-eye-slash");
        eye.add("fa-eye");
    }
}