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

if (isset($_POST["tambahDataSupervisor"])){

    if($_GET["module"]=="dataSupervisor" && $_GET["act"]=="tambah"){

         $nama_folder = "img";
         $tmp = $_FILES["fileid2"]["tmp_name"];
         $nama_file = $_FILES["fileid2"]["name"];
         move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

     $query1 = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameSupervisorAdmin]',
         '$_POST[passwordSupervisorAdmin]',
         'supervisor'
     ); ";

     $query2 = "INSERT INTO tabel_supervisor (
         id_user,
         id_jabatan,
         nama,
         nik,
         foto,
         status_aktif,
         waktu_tambah
    )

     values
    (  (select id_user from tabel_user where username='$_POST[usernameSupervisorAdmin]'),
        '$_POST[jabatanSupervisorAdmin]',
        '$_POST[namaSupervisorAdmin]',
        '$_POST[nikSupervisorAdmin]',
        '$nama_file',
        '$_POST[statusSupervisorAdmin]',
        curdate()
    );";
    
        if(mysqli_query($con, $query1) AND mysqli_query($con, $query2)){ 
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
        else{            
            echo("Error description: " . mysqli_error($con));
        }
    } 

    // else if($_GET["module"] =="dataOperator" && $_GET["act"]=="edit"){
    //     $update = $_POST["id_userUpdate"];
    //     $id_operatorUpdate = $_POST["id_operatorUpdate"];
        
    //     $nama_folder = "img";
    //     $tmp = $_FILES["fileid3"]["tmp_name"];
    //     $namanya_file = $_FILES["fileid3"]["name"];
    //     move_uploaded_file($tmp, "../attachment/$nama_folder/$namanya_file");

    //     if($namanya_file!=""){
            
    //         $query9 = "UPDATE tabel_user 
    //         set username='$_POST[usernameOperatorAdmin2]',
    //         password='$_POST[passwordOperatorAdmin2]'
    //         where id_user= '$update';";

    //         $query10="UPDATE tabel_operator
    //         set id_jabatan = '$_POST[jabatanOperatorAdmin2]',
    //         nama = '$_POST[namaOperatorAdmin2]',
    //         nik = '$_POST[nikOperatorAdmin2]',
    //         foto = '$namanya_file',
    //         status_aktif = '$_POST[statusOperatorAdmin]',
    //         waktu_edit = curdate()
    //         where id_user='$update';";

    //         if(mysqli_query($con,$query9) && mysqli_query($con,$query10)){

    //             header('location:../module/index.php?module=' . $_GET["module"]);
    //         }

    //         else{            
    //             echo("Error description: " . mysqli_error($con));
    //         }
    //     }

    //     else if($namanya_file == ""){
    //         $query9 = "UPDATE tabel_user 
    //         set username='$_POST[usernameOperatorAdmin2]',
    //         password='$_POST[passwordOperatorAdmin2]'
    //         where id_user= '$update';";

    //         $query10="UPDATE tabel_operator
    //         set id_jabatan = '$_POST[jabatanOperatorAdmin2]',
    //         nama = '$_POST[namaOperatorAdmin2]',
    //         nik = '$_POST[nikOperatorAdmin2]',
    //         status_aktif = '$_POST[statusOperatorAdmin]',
    //         waktu_edit = curdate()
    //         where id_user='$update';";

    //         if(mysqli_query($con,$query9) && mysqli_query($con,$query10)){

    //             header('location:../module/index.php?module=' . $_GET["module"]);
    //         }

    //         else{            
    //             echo("Error description: " . mysqli_error($con));
    //         }
    //     }
    // }

    // else if($_GET["module"] =="dataOperator" && $_GET["act"]=="hapus"){
    //     $delete=$_POST['id_user'];
    //     $idnya = $_POST['id_operator'];

    //     $queryDelete = "DELETE FROM tabel_operator WHERE id_user='$idnya';";
    //     $queryDelete2 = "DELETE FROM tabel_user WHERE id_user='$delete';";

    //     if(mysqli_query($con,$queryDelete) && mysqli_query($con,$queryDelete2)){

    //         header('location:../module/index.php?module=' . $_GET["module"]);
    //     }

    //     else{            
    //         echo("Error description: " . mysqli_error($con));
    //     }
    // }
}

// MODAL EDIT SUPERVISOR
if(isset($_POST["editDataSupervisor_idSupervisor"])){
    $editSupervisor = "SELECT ts.*, ts.id_supervisor ,ts.nama AS nama_lengkap ,tj.*, tj.nama AS nama_jabatan, tu.* FROM tabel_supervisor ts,tabel_jabatan tj,tabel_user tu 
    WHERE ts.id_jabatan = tj.id_jabatan
    AND ts.id_user = tu.id_user 
    AND ts.id_supervisor = $_POST[editDataSupervisor_idSupervisor]";
    $resultEditSupervisor = mysqli_query($con, $editSupervisor);
  
    if(mysqli_num_rows($resultEditSupervisor) > 0){
      $rowEditSupervisor=mysqli_fetch_assoc($resultEditSupervisor);
        
        $output="";
        $output.="      
        <div class='row' id='modail'>
            <div class='col-sm-6'>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                        <input type='hidden' name='id_userUpdate' value=".$rowEditSupervisor["id_user"].">
                        <input type='hidden' name='id_operatorUpdate' value=".$rowEditSupervisor["id_supervisor"].">               
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='username' style='font-weight: bold'>USERNAME</label>
                        <input type='text' class='form-control' placeholder='USERNAME' id='usernameSupervisorAdmin2' name='usernameSupervisorAdmin2' value='".$rowEditSupervisor["username"]."' required />
                    </div>
                    <div class='col-sm-12'>
                        <div id='usernameSupervisorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='password' style='font-weight: bold'>PASSWORD</label>
                        <div class='input-group'>
                            <input type='password' class='form-control' placeholder='**********' name='passwordSupervisorAdmin2' id='passwordSupervisorAdmin2' placeholder='**********' value='".$rowEditSupervisor["password"]."' required />
                            <div class='input-group-append'>
                                <span class='far fa-eye input-group-text form-control' id='eyeSupervisor2' onclick='showPasswordSupervisor2();'></span>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-12'>
                        <div id='passwordSupervisorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='gambar' style='font-weight: bold'>GAMBAR</label>
                        <div class='input-group col-sm-10'>`
                            <img src='".linkYAYAYA($rowEditSupervisor["foto"])."' id='fotoPrevSupervisorAdmin2' height='200px' width='200px'>
                        </div>
                        <div class='col-md-2'></div>
                        <div class='col-md-10'>
                            <br>
                            <input id='fileid3' type='file' name='fileid3' onchange='preview_images6(event);'  hidden />
                            <input id='buttonid3' type='button' value='Load Gambar' class='btn btn-loading btn-primary tmbl-loading ml-2'  />
                        </div>
                        <div class='col-sm-12'>
                            <div id='fileidSupervisorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>                           
                    </div>
                 </div>
            </div>
            <div class='col-sm-6'>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='nik' style='font-weight: bold'>NIK</label>
                        <input type='text' class='form-control' placeholder='NIK SUPERVISOR' id='nikSupervisorAdmin2' name='nikSupervisorAdmin2' value='".$rowEditSupervisor["nik"]."' required />
                    </div>
                    <div class='col-sm-12'>
                        <div id='nikSupervisorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='nama' style='font-weight: bold'>NAMA LENGKAP</label>
                        <input type='text' class='form-control' placeholder='NAMA SUPERVISOR' id='namaSupervisorAdmin2' name='namaSupervisorAdmin2' value='".$rowEditSupervisor['nama_lengkap']."' required />
                    </div>
                    <div class='col-sm-12'>
                        <div id='namaSupervisorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0>
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='jabatan' style='font-weight: bold'>JABATAN</label>
                        <select class='custom-select my-1 mr-sm-2' name='jabatanSupervisorAdmin2'>".tampilJabatanEdit($con,$rowEditSupervisor["id_jabatan"])."</select>
                    </div>
                    <div class='col-sm-12'>
                        <div id='jabatanSupervisorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                    <label class='col-sm-6 small d-flex flex-column justify-content-center' for='password' style='font-weight: bold'>STATUS KARYAWAN</label>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input form-control-user' type='radio' name='statusSupervisorAdmin' id='statusSupervisorAdmin1' value='Aktif'>
                            <label class='form-check-label' for='statusSupervisorAdmin1'>Aktif</label>
                        </div>
                        <div class='form-check form-check-inline'>
                            <input class='form-check-input form-control-user' type='radio' name='statusSupervisorAdmin' id='statusSupervisorAdmin1' value='Non-Aktif'>
                            <label class='form-check-label' for='statusSupervisorAdmin2'>Non-Aktif</label>
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
                            <button class='btn btn-primary' name='editDataSupervisor' type='submit' onclick='ValidasiEdit(); preventDefaultAction2(event);><i class='fa fa-check'></i> Simpan</button>
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