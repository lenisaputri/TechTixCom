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
                                <input type="file" class="custom-file-input" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile"><?php echo $rowEditMateriSafety['file_materi']; ?></label>
                        <!-- <input type="file" class="form-control border-0" id="inputFile" name="fileMateri" > -->
                        <div class="col-sm-6">
                            <div id="fileMateriAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-1 mt-3 mt-sm-0">
                    <label class="d-flex flex-column justify-content-center" for="kategori_materi" style="font-weight: bold">ATAU</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control border-0" id="linkMateri" name="linkMateri" placeholder="Link Materi ..." style="width=100%">
                        <div class="col-sm-6">
                            <div id="linkMateriBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div> 
                </div>
                <?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="col-sm-5">
                        <input type="file" class="form-control border-0" id="inputFile" name="fileMateri">
                        <div class="col-sm-6">
                            <div id="fileMateriAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-1 mt-3 mt-sm-0">
                    <label class="d-flex flex-column justify-content-center" for="kategori_materi" style="font-weight: bold">ATAU</label>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control border-0" id="linkMateri" name="linkMateri" placeholder="Link Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["file_materi"]?>">
                        <div class="col-sm-6">
                            <div id="linkMateriBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div> 
                </div>
                <?php
                    }
                ?>
            </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="judulMateri" name="judulMateri" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["judul_materi"]?>" required>
                    <div class="col-sm-12">
                        <div id="judulMateriBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="kategoriMateri" name="kategoriMateri" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["kategori_materi"]?>" required>
                    <div class="col-sm-12">
                        <div id="kategoriMateriBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <textarea id="keteranganMateri" name="keteranganMateri" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0"><?=$rowEditMateriSafety["keterangan_materi"]?></textarea>
                    <div class="col-sm-12">
                        <div id="keteranganMateriBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
            </div>
            <?php
            $i++;
            }
        }
            ?>
            <hr>
                <div class="form-group">
                    <div class="modal-footer border-0">
                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                        <button class="btn btn-primary" name="editJabatanProses" type="submit" onclick="ValidasiEditJabatan();"><i class="fa fa-check"></i> Simpan</button>
                </div>
            <?php
  }
?>