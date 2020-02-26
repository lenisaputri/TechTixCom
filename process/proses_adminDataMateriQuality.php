<?php
    include "../config/connection.php";

    if (isset($_POST["tambahDataMateriQuality"]) || isset($_POST["editDataMateriQuality"]) || isset($_POST["hapusDataMateriQuality"])){
        if($_GET["module"]=="dataMateriQuality" && $_GET["act"]=="tambah"){
            $nama_folder = "file";
            $tmp = $_FILES["fileMateriQuality"]["tmp_name"];
            $nama_file = $_FILES["fileMateriQuality"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");
                      
            $query2 = "INSERT INTO tabel_materi_quality (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )
            
            values(  
                '$_POST[kategoriMateriQuality]',
                '$_POST[judulMateriQuality]',
                '$_POST[keteranganMateriQuality]',
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
            
        } 
        else if($_GET["module"]=="dataMateriQuality" && $_GET["act"]=="edit"){
            $id_materiQualityUpdate = $_POST["id_materiQualityUpdate"];
            $nama_folder = "file";
            $tmp = $_FILES["fileMateriQuality2"]["tmp_name"];
            $namanya_file = $_FILES["fileMateriQuality2"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

            $query9 = "UPDATE tabel_materi_quality set kategori_materi = '$_POST[kategoriMateriQuality2]',
                    judul_materi = '$_POST[judulMateriQuality2]', keterangan_materi = '$_POST[keteranganMateriQuality2]',
                    file_materi = '$namanya_file', tipe = 'file' WHERE id_materi_quality = '$id_materiQualityUpdate'
            ";
            
            if(mysqli_query($con, $query9)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));           
            }
     
        } 
        else if($_GET["module"]=="dataMateriQuality" && $_GET["act"]=="hapus"){
            $HapusMateriQualityQuery="DELETE FROM tabel_materi_quality WHERE id_materi_quality ='$_POST[id_materi_quality]'";
            mysqli_query($con, $HapusMateriQualityQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
    }

    if(isset($_POST["editDataMateriQuality_idMateriQuality"])){
        $editMateriQuality = "SELECT * FROM tabel_materi_quality WHERE id_materi_quality = $_POST[editDataMateriQuality_idMateriQuality]";
        $resultEditMateriQuality = mysqli_query($con, $editMateriQuality);
    
        if(mysqli_num_rows($resultEditMateriQuality) > 0){
            $i = 1;
            while($rowEditMateriQuality=mysqli_fetch_assoc($resultEditMateriQuality)){
                ?>
                    <div class="form-group">
                        <input type="hidden" name="id_materiQualityUpdate" value="<?=$rowEditMateriQuality["id_materi_quality"]?>" > 
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="file" class="form-control border-0" id="fileMateriQuality2" name="fileMateriQuality2" required>
                                <label class="custom-file-label" for="fileMateriQuality2"><?php echo $rowEditMateriQuality['file_materi']; ?></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div id="fileMateriQualityBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="judulMateriQuality2" name="judulMateriQuality2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriQuality["judul_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="judulMateriQualityBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="kategoriMateriQuality2" name="kategoriMateriQuality2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriQuality["kategori_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="kategoriMateriQualityBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea id="keteranganMateriQuality2" name="keteranganMateriQuality2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0" required><?=$rowEditMateriQuality["keterangan_materi"]?></textarea>
                        <div class="col-sm-12">
                            <div id="keteranganMateriQualityBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>                
                <?php
                $i++;
            }
        }
        ?>                
            <div class="form-group">
                <div class="modal-footer border-0">
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button class="btn btn-primary" name="editDataMateriQuality" type="submit" onclick="ValidasiEditDataMateriQuality();"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        <?php
    }
?>