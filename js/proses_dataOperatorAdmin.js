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