<?php
include "../config/connection.php";

if (isset($_POST["tambahDataMateri"])){
    if($_GET["module"]=="dataMateriGeneralHrd" && $_GET["act"]=="tambah"){
        $nama_folder = "file";
        $tmp = $_FILES["fileMateri"]["tmp_name"];
        $nama_file = $_FILES["fileMateri"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");
        
        if (isset($nama_file)){
        
            $query2 = "INSERT INTO tabel_materi_generalhrd (
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
            $query3 = "INSERT INTO tabel_materi_generalhrd (
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
if(isset($_POST["editDataMateriGeneralHrd_idMateriGeneralHrd"])){
    $editMateriGeneralHrd = "SELECT * FROM tabel_materi_generalhrd";
    $resultEditMateriGeneralHrd = mysqli_query($con, $editMateriGeneralHrd);
  
    if(mysqli_num_rows($resultEditMateriGeneralHrd) > 0){
      $rowEditMateriGeneralHrd=mysqli_fetch_assoc($resultEditMateriGeneralHrd);
        
        $output="";
        $output.="      
        <div class='row' id='modail'>
            <div class='form-group'>
                <input type='hidden' name='id_materiGeneralHrdUpdate' value=".$rowEditMateriGeneralHrd["id_materi_generalhrd"].">      
                <div class='row'>
                    <div class='col-sm-5'>
                        <input type='file' class='form-control border-0' id='inputFile2' name='fileMateri'>
                        <div class='col-sm-6'>
                            <div id='fileMateriAdminBlank' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>
                    </div>
                    <div class='col-sm-1 mt-3 mt-sm-0'>
                    <label class='d-flex flex-column justify-content-center' for='kategori_materi' style='font-weight: bold'>ATAU</label>
                    </div>
                    <div class='col-sm-6'>
                        <input type='text' class='form-control border-0' id='linkMateri' name='linkMateri' placeholder='Link Materi ...' style='width=100%'>
                        <div class='col-sm-6'>
                            <div id='linkMateriBlank' class='col-sm-12 small d-flex flex-column justify-content-center text-danger'></div>
                        </div>
                    </div> 
                </div>
                
                
            </div>

        </div>
        ";
    echo $output;
  
    }else{
      echo $output.="Data Kosong";
    }
  }
?>