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