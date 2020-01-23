<?php
include "../config/connection.php";

if (isset($_POST["tambahDataMateri"]) || isset($_POST["editDataMateriSafety"]) || isset($_POST["hapusDataMateriSafety"])){
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
        
    } else if($_GET["module"]=="dataMateriSafety" && $_GET["act"]=="edit"){
        $id_materiSafetyUpdate = $_POST["id_materiSafetyUpdate"];

        $nama_folder = "file";
        $tmp = $_FILES["fileMateri2"]["tmp_name"];
        $namanya_file = $_FILES["fileMateri2"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

        if (isset($namanya_file)){

            $query9 = "UPDATE tabel_materi_safety set kategori_materi = '$_POST[kategoriMateri2]',
            judul_materi = '$_POST[judulMateri2]', keterangan_materi = '$_POST[keteranganMateri2]',
            file_materi = '$namanya_file', tipe = 'file' WHERE id_materi_safety = '$id_materiSafetyUpdate'
            ";
           
            if(mysqli_query($con, $query9)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
               echo("Error description: " . mysqli_error($con));           
            }
        } else if(isset($_POST["linkMateri2"])){
            $query10 = "UPDATE tabel_materi_safety set kategori_materi = '$_POST[kategoriMateri2]',
            judul_materi = '$_POST[judulMateri2]', keterangan_materi = '$_POST[keteranganMateri2]',
            file_materi = '$_POST[linkMateri2]', tipe = 'file' WHERE id_materi_safety = '$id_materiSafetyUpdate'
            ";
           
            if(mysqli_query($con, $query10)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
               echo("Error description: " . mysqli_error($con));           
            }
        }
    } else if($_GET["module"]=="dataMateriSafety" && $_GET["act"]=="hapus"){
        $HapusMateriSafetyQuery="DELETE FROM tabel_materi_safety WHERE id_materi_safety ='$_POST[id_materi_safety]'";
        mysqli_query($con, $HapusMateriSafetyQuery);
        header('location:../module/index.php?module=' . $_GET["module"]);
    }
}

// MODAL EDIT OPERATOR
if(isset($_POST["editDataMateriSafety_idMateriSafety"])){
    $editMateriSafety = "SELECT * FROM tabel_materi_safety WHERE id_materi_safety = $_POST[editDataMateriSafety_idMateriSafety]";
    $resultEditMateriSafety = mysqli_query($con, $editMateriSafety);
  
    if(mysqli_num_rows($resultEditMateriSafety) > 0){
        $i = 1;
        while($rowEditMateriSafety=mysqli_fetch_assoc($resultEditMateriSafety)){
            ?>
            <div class="form-group">
                <input type="hidden" name="id_materiSafetyUpdate" value="<?=$rowEditMateriSafety["id_materi_safety"]?>" > 
                <?php
                    if($rowEditMateriSafety["tipe"] == "file"){
                        ?>
                        <div class="row">
                            <div class="col-sm-5">
                                <input type="file" class="custom-file-input" id="fileMateri2" name="fileMateri2">
                                <label class="custom-file-label" for="validatedCustomFile"><?php echo $rowEditMateriSafety['file_materi']; ?></label>
                        <!-- <input type="file" class="form-control border-0" id="inputFile" name="fileMateri" > -->
                        <div class="col-sm-6">
                            <div id="fileMateri2AdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-1 mt-3 mt-sm-0">
                    <label class="d-flex flex-column justify-content-center" for="atau" style="font-weight: bold">ATAU</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control border-0" id="linkMateri2" name="linkMateri2" placeholder="Link Materi ..." style="width=100%">
                        <div class="col-sm-6">
                            <div id="linkMateri2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div> 
                </div>
                <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="col-sm-5">
                        <input type="file" class="form-control border-0" id="inputFile" name="fileMateri2">
                        <div class="col-sm-6">
                            <div id="fileMateri2AdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-1 mt-3 mt-sm-0">
                    <label class="d-flex flex-column justify-content-center" for="atau" style="font-weight: bold">ATAU</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control border-0" id="linkMateri2" name="linkMateri2" placeholder="Link Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["file_materi"]?>">
                        <div class="col-sm-6">
                            <div id="linkMateri2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div> 
                </div>
                <?php
                    }
                ?>
            </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="judulMateri2" name="judulMateri2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["judul_materi"]?>" required>
                    <div class="col-sm-12">
                        <div id="judulMateri2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="kategoriMateri2" name="kategoriMateri2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["kategori_materi"]?>" required>
                    <div class="col-sm-12">
                        <div id="kategoriMateri2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <textarea id="keteranganMateri2" name="keteranganMateri2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0"><?=$rowEditMateriSafety["keterangan_materi"]?></textarea>
                    <div class="col-sm-12">
                        <div id="keteranganMateri2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
            </div>
            <?php
            $i++;
            }
        }
            ?>
            
                <div class="form-group">
                    <div class="modal-footer border-0">
                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                        <button class="btn btn-primary" name="editDataMateriSafety" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            <?php
  }
?>