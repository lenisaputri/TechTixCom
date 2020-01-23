<?php
include "../config/connection.php";

if (isset($_POST["tambahDataMateri"])){
    if($_GET["module"]=="dataMateriSafety" && $_GET["act"]=="tambah"){
        $nama_folder = "file";
        $tmp = $_FILES["fileMateri"]["tmp_name"];
        $nama_file = $_FILES["fileMateri"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");
        
        if (isset($nama_file)){
        
            $query2 = "INSERT INTO tabel_materi_safety (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )
        
            values
            (  '$_POST[kategoriMateri]',
               '$_POST[judulMateri]',
               '$_POST[keteranganMateri]',
               '$nama_file',
               'file',
               curdate()
            );";
           
            if(mysqli_query($con, $query2)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
               echo("Error description: " . mysqli_error($con));           
            }
        } else if(isset($_POST["linkMateri"])){
            $query3 = "INSERT INTO tabel_materi_safety (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )
        
            values
            (  '$_POST[kategoriMateri]',
               '$_POST[judulMateri]',
               '$_POST[keteranganMateri]',
               '$_POST[linkMateri]',
               'link',
               curdate()
            );";
           
            if(mysqli_query($con, $query3)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
               echo("Error description: " . mysqli_error($con));           
            }
        }
        
    }
}

// MODAL EDIT OPERATOR
if(isset($_POST["editDataOperator_idOperator"])){
    $editMateriSafety = "SELECT * FROM tabel_materi_safety";
    $resultEditMateriSafety = mysqli_query($con, $editMateriSafety);
  
    if(mysqli_num_rows($resultEditMateriSafety) > 0){
      $rowEditMateriSafety=mysqli_fetch_assoc($resultEditMateriSafety);
        
        $output="";
        $output.="      
        <div class='row' id='modail'>
            <div class='form-group'>
                <input type='hidden' name='id_materiSafetyUpdate' value=".$rowEditMateriSafety["id_materi_safety"].">      
                <input type='file' class='form-control border-0' id='inputGroupFile02' name='fileMateri2' src=".$rowEditMateriSafety["file_materi"].">
                
                <div class='col-sm-12'>
                    <div id='fileMateriAdminBlank' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
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
                            <img src='".linkYAYAYA($rowEditMateriSafety["foto"])."' id='fotoPrevOperatorAdmin2' height='200px' width='200px'>
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
                        <label class='col-sm-6 small d-flex flex-column justify-content-center' for='nik' style='font-weight: bold'>NAMA LENGKAP</label>
                        <select class='custom-select my-1 mr-sm-2' name='jabatanOperatorAdmin2'>".tampilJabatanEdit($con,$rowEditOperator["id_jabatan"])."</select>
                    </div>
                    <div class='col-sm-12'>
                        <div id='namaOperatorAdminBlank2' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
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
                            <input class='form-check-input form-control-user' type='radio' name='statusOperatorAdmin' id='statusOperatorAdmin1' value='Non-Aktif'>
                            <label class='form-check-label' for='statusOperatorAdmin2'>Non-Aktif</label>
                        </div>
                    </div>
                </div>
                <div class='form-group row'>
                    <div class='col-sm-12 mb-3 mb-sm-0'>
                        <div class='col-sm-4'></div>
                        <div class='col-sm-8'>
                            <div class='modal-footer border-0'>
                                <button class='btn btn-danger' data-dismiss='modal'><i class='fa fa-times'></i> Tutup</button>
                                <button class='btn btn-primary' name='editDataOperator' type='submit' onclick='ValidasiEditOperator(); preventDefaultActionOperator2(event);'><i class='fa fa-check'></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
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
  
    }else{
      echo $output.="Data Kosong";
    }
  }
?>