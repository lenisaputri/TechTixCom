<?php
include "../config/connection.php";

function linkYAYAYA($Foto){

    $ling = "";

    if($Foto == null){
        $ling = "../attachment/img/avatar.jpeg";
    }

    else if($Foto != null){
        $link = "../attachment/img/";

        $ling = ($link . $Foto);
        
    }

    return $ling;    
    
}

function tampilJabatan($con){
    $jabatan="SELECT * FROM tabel_jabatan";
    $resultJabatan = mysqli_query($con, $jabatan);
    return $resultJabatan;
}

function tampilJabatanEdit($con, $id_jabatanEdit){
    $jabatan = "SELECT * FROM tabel_jabatan";
    $resultJabatan = mysqli_query($con, $jabatan);

    $output="";

    if(mysqli_num_rows($resultJabatan) > 0){
        while($rowJabatan=mysqli_fetch_assoc($resultJabatan)){
            if($rowJabatan["id_jabatan"]==$id_jabatanEdit){
                $output.="<option value='$rowJabatan[id_jabatan]' selected>".$rowJabatan["nama"]."</option>";
            }

            else{
                $output.="<option value='$rowJabatan[id_jabatan]'>$rowJabatan[nama]</option>";
            }
        }
    }

    return $output;
}

if (isset($_POST["tambahDataOperator"]) || isset($_POST["editDataOperator"])){

    if($_GET["module"]=="dataOperator" && $_GET["act"]=="tambah"){

         $nama_folder = "img";
         $tmp = $_FILES["fileid2"]["tmp_name"];
         $nama_file = $_FILES["fileid2"]["name"];
         move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

     $query1 = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameOperatorAdmin]',
         '$_POST[passwordOperatorAdmin]',
         'operator'
     ); ";

     $query2 = "INSERT INTO tabel_operator (
         id_user,
         id_jabatan,
         nama,
         nik,
         foto,
         status_aktif,
         waktu_tambah
    )

     values
    (  (select id_user from tabel_user where username='$_POST[usernameOperatorAdmin]'),
        '$_POST[jabatanOperatorAdmin]',
        '$_POST[namaOperatorAdmin]',
        '$_POST[nikOperatorAdmin]',
        '$nama_file',
        '$_POST[statusOperatorAdmin]',
        curdate()
    );";
    
        if(mysqli_query($con, $query1) AND mysqli_query($con, $query2)){ 
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
        else{            
            echo("Error description: " . mysqli_error($con));
        }
    } 

    else if($_GET["module"] =="dataOperator" && $_GET["act"]=="edit"){
        $update = $_POST["id_userUpdate"];
        $id_operatorUpdate = $_POST["id_operatorUpdate"];
        
        $nama_folder = "img";
        $tmp = $_FILES["fileid3"]["tmp_name"];
        $namanya_file = $_FILES["fileid3"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$namanya_file");

        if($namanya_file!=""){
            
            $query9 = "UPDATE tabel_user 
            set username='$_POST[usernameOperatorAdmin2]',
            password='$_POST[passwordOperatorAdmin2]'
            where id_user= '$update';";

            $query10="UPDATE tabel_operator
            set id_jabatan = '$_POST[jabatanOperatorAdmin2]',
            nama = '$_POST[namaOperatorAdmin2]',
            nik = '$_POST[nikOperatorAdmin2]',
            foto = '$namanya_file',
            status_aktif = '$_POST[statusOperatorAdmin]',
            waktu_edit = curdate()
            where id_user='$update';";

            if(mysqli_query($con,$query9) && mysqli_query($con,$query10)){

                header('location:../module/index.php?module=' . $_GET["module"]);
            }

            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }

        else if($namanya_file == ""){
            $query9 = "UPDATE tabel_user 
            set username='$_POST[usernameOperatorAdmin2]',
            password='$_POST[passwordOperatorAdmin2]'
            where id_user= '$update';";

            $query10="UPDATE tabel_operator
            set id_jabatan = '$_POST[jabatanOperatorAdmin2]',
            nama = '$_POST[namaOperatorAdmin2]',
            nik = '$_POST[nikOperatorAdmin2]',
            status_aktif = '$_POST[statusOperatorAdmin]',
            waktu_edit = curdate()
            where id_user='$update';";

            if(mysqli_query($con,$query9) && mysqli_query($con,$query10)){

                header('location:../module/index.php?module=' . $_GET["module"]);
            }

            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }
}


// Modal Edit Mahasiswa
if(isset($_POST["editDataOperator_idOperator"])){
    $editOperator = "SELECT tp.*, tp.id_operator ,tp.nama AS nama_lengkap ,tj.*, tj.nama AS nama_jabatan, tu.* FROM tabel_operator tp,tabel_jabatan tj,tabel_user tu 
    WHERE tp.id_jabatan = tj.id_jabatan
    AND tp.id_user = tu.id_user 
    AND tp.id_operator = $_POST[editDataOperator_idOperator]";
    $resultEditOperator = mysqli_query($con, $editOperator);
  
    if(mysqli_num_rows($resultEditOperator) > 0){
      $rowEditOperator=mysqli_fetch_assoc($resultEditOperator);
        
        $output="";
        $output.="      
        <div class='row' id='modail'>
            <div class='col-sm-6'>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                        <input type='hidden' name='id_userUpdate' value=".$rowEditOperator["id_user"].">
                        <input type='hidden' name='id_operatorUpdate' value=".$rowEditOperator["id_operator"].">               
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='username' style='font-weight: bold'>USERNAME</label>
                        <input type='text' class='form-control' placeholder='USERNAME' id='usernameOperatorAdmin2' name='usernameOperatorAdmin2' value='".$rowEditOperator["username"]."' required />
                    </div>
                    <div class='col-sm-12'>
                        <div id='usernameOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='password' style='font-weight: bold'>PASSWORD</label>
                        <div class='input-group'>
                            <input type='password' class='form-control' placeholder='**********' name='passwordOperatorAdmin2' id='passwordOperatorAdmin2' placeholder='**********' value='".$rowEditOperator["password"]."' required />
                            <div class='input-group-append'>
                                <span class='far fa-eye input-group-text form-control' id='eyeOperator' onclick='showPasswordOperator2();'></span>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-12'>
                        <div id='passwordOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='gambar' style='font-weight: bold'>GAMBAR</label>
                        <div class='input-group col-sm-10'>`
                            <img src='".linkYAYAYA($rowEditOperator["foto"])."' id='fotoPrevOperatorAdmin2' height='200px' width='200px'>
                        </div>
                        <div class='col-md-2'></div>
                        <div class='col-md-10'>
                            <br>
                            <input id='fileid3' type='file' name='fileid3' onchange='preview_images6(event);'  hidden />
                            <input id='buttonid3' type='button' value='Load Gambar' class='btn btn-loading btn-primary tmbl-loading ml-2'  />
                        </div>
                        <div class='col-sm-12'>
                            <div id='fileidOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>                           
                    </div>
                 </div>
            </div>
            <div class='col-sm-6'>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='nik' style='font-weight: bold'>NIK</label>
                        <input type='text' class='form-control' placeholder='NIK OPERATOR' id='nikOperatorAdmin2' name='nikOperatorAdmin2' value='".$rowEditOperator["nik"]."' required />
                    </div>
                    <div class='col-sm-12'>
                        <div id='nikOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='nama' style='font-weight: bold'>NAMA LENGKAP</label>
                        <input type='text' class='form-control' placeholder='NAMA OPERATOR' id='namaOperatorAdmin2' name='namaOperatorAdmin2' value='".$rowEditOperator['nama_lengkap']."' required />
                    </div>
                    <div class='col-sm-12'>
                        <div id='namaOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='jabatan' style='font-weight: bold'>JABATAN</label>
                        <select class='custom-select my-1 mr-sm-2' name='jabatanOperatorAdmin2'>".tampilJabatanEdit($con,$rowEditOperator["id_jabatan"])."</select>
                    </div>
                    <div class='col-sm-12'>
                        <div id='jabatanOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                    <label class='col-sm-6 small d-flex flex-column justify-content-center' for='password' style='font-weight: bold'>STATUS KARYAWAN</label>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input form-control-user' type='radio' name='statusOperatorAdmin' id='statusOperatorAdmin1' value='Aktif'>
                            <label class='form-check-label' for='statusOperatorAdmin1'>Aktif</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input form-control-user' type='radio' name='statusOperatorAdmin' id='statusOperatorAdmin1' value='Aktif'>
                            <label class='form-check-label' for='statusOperatorAdmin2'>Non-Aktif</label>
                        </div>
                    </div>
                </div>
           </div>
           <div class='form-group row'>
                <div class='col-sm-12 mb-3 mb-sm-0'>
                    <div class='col-sm-4'></div>
                    <div class='col-sm-8>
                        <div class='modal-footer border-0'>
                            <button class='btn btn-danger' data-dismiss='modal'><i class='fa fa-times'></i> Tutup</button>
                            <button class='btn btn-primary' name='editDataOperator' type='submit' onclick='ValidasiEdit(); preventDefaultAction2(event);><i class='fa fa-check'></i> Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                                      
        <script>
            document.getElementById('modail').addEventListener('load', setup3());
            
            function setup3() {
                document.getElementById('buttonid3').addEventListener('click', openDialog2);
                function openDialog2() {
                    document.getElementById('fileid3').click();
                }
            }
        </script>
        ";
    echo $output;
  
    }else{
      echo $output.="Data Kosong";
    }
  }

?>