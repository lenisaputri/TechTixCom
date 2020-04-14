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

    if (isset($_POST["tambahDataOperator"]) || isset($_POST["editDataOperator"]) || isset($_POST["hapusDataOperator"])){
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
            jenis_kelamin,
            waktu_tambah
        )

        values
        (  (select id_user from tabel_user where username='$_POST[usernameOperatorAdmin]'),
            '$_POST[jabatanOperatorAdmin]',
            '$_POST[namaOperatorAdmin]',
            '$_POST[nikOperatorAdmin]',
            '$nama_file',
            '$_POST[jkOperatorAdmin]',
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
                jenis_kelamin = '$_POST[jkOperatorAdmin2]',
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
                jenis_kelamin = '$_POST[jkOperatorAdmin2]',
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

        else if($_GET["module"] =="dataOperator" && $_GET["act"]=="hapus"){
            $delete=$_POST['id_user'];
            $idnya = $_POST['id_operator'];

            $queryDelete = "DELETE FROM tabel_operator WHERE id_operator='$idnya';";
            $queryDelete2 = "DELETE FROM tabel_user WHERE id_user='$delete';";

            if(mysqli_query($con,$queryDelete) && mysqli_query($con,$queryDelete2)){
                header('location:../module/index.php?module=' . $_GET["module"]);
            }

            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }

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
                                    <span class='far fa-eye input-group-text form-control' id='eyeOperator2' onclick='showPasswordOperator2();'></span>
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
                            <div class='input-group col-sm-10'>
                                <img src='".linkYAYAYA($rowEditOperator["foto"])."' id='fotoPrevOperatorAdmin2' height='200px' width='200px'>
                            </div>
                            <div class='col-md-2'></div>
                            <div class='col-md-10'>
                                <br>
                                <input id='fileid3' type='file' name='fileid3' onchange='preview_imagesOperator6(event);'  hidden />
                                <input id='buttonid3' type='button' value='Load Gambar' class='btn btn-loading btn-primary tmbl-loading ml-2'  />
                            </div>
                        </div>
                        <div class='col-sm-12'>
                            <div id='fileidOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>                       
                    </div>
                </div>
                <div class='col-sm-6'>
                    <div class='form-group row'>
                        <div class='col-sm-12 mb-3 mb-sm-0'>
                            <label class='col-sm-6 small d-flex flex-column justify-content-center' for='nik' style='font-weight: bold'>NIK</label>
                            <input type='text' class='form-control' placeholder='NIK OPERATOR' id='nikOperatorAdmin2' name='nikOperatorAdmin2' value='".$rowEditOperator["nik"]."' required />
                        </div>
                        <div class='col-sm-12'>
                            <div id='nikOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <div class='col-sm-12 mb-3 mb-sm-0'>
                            <label class='col-sm-6 small d-flex flex-column justify-content-center' for='nik' style='font-weight: bold'>NAMA LENGKAP</label>
                            <input type='text' class='form-control' placeholder='NAMA OPERATOR' id='namaOperatorAdmin2' name='namaOperatorAdmin2' value='".$rowEditOperator["nama_lengkap"]."' required />
                        </div>
                        <div class='col-sm-12'>
                            <div id='namaOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <div class='col-sm-12 mb-3 mb-sm-0'>
                            <label class='col-sm-6 small d-flex flex-column justify-content-center' for='password' style='font-weight: bold'>JENIS KELAMIN</label>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input form-control-user' type='radio' name='jkOperatorAdmin2' id='jkOperatorAdmin3' value='Laki-Laki'>
                                <label class='form-check-label' for='jkOperatorAdmin3'>Laki-Laki</label>
                            </div>
                            <div class='form-check form-check-inline'>
                                <input class='form-check-input' type='radio' name='jkOperatorAdmin2' id='jkOperatorAdmin4' value='Perempuan'>
                                <label class='form-check-label' for='jkOperatorAdmin4'>Perempuan</label>                                
                            </div>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <div class='col-sm-12 mb-3 mb-sm-0'>
                            <label class='col-sm-6 small d-flex flex-column justify-content-center' for='nik' style='font-weight: bold'>NAMA LENGKAP</label>
                            <select class='custom-select my-1 mr-sm-2' name='jabatanOperatorAdmin2'>".tampilJabatanEdit($con,$rowEditOperator["id_jabatan"])."</select>
                        </div>
                        <div class='col-sm-12'>
                            <div id='jabatanOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class='modal-footer border-0'>
                <button class='btn btn-danger' data-dismiss='modal'><i class='fa fa-times'></i> Tutup</button>
                <button class='btn btn-primary' name='editDataOperator' type='submit' onclick='ValidasiEditOperator(); preventDefaultActionOperator2(event);'><i class='fa fa-check'></i> Simpan</button>
            </div>
                      
                                        
            <script>
                document.getElementById('modail').addEventListener('load', setupOperator3());
                
                function setupOperator3() {
                    document.getElementById('buttonid3').addEventListener('click', openDialog2);
                    function openDialog2() {
                        document.getElementById('fileid3').click();
                    }
                }
            </script>
            ";
        echo $output;
        }
        
        else{
            echo $output.="Data Kosong";
        }
    }
?>