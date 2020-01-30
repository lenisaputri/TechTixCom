<?php
    include "../config/connection.php";

    function linkYa($File){

        $ling = "";

        if($File == null){
            $ling = "../attachment/file/avatar.jpeg";
        }

        else if($File != null){
            $link = "../attachment/file/";

            $ling = ($link . $File);
            
        }

        return $ling;    
        
    }

    if (isset($_POST["tambahDataMateri"]) || isset($_POST["editDataMateriTechnical"]) || isset($_POST["hapusDataMateriTechnical"])){
        if($_GET["module"]=="dataMateriTechnical" && $_GET["act"]=="tambah"){
            $tipe = "";
            $nama_folder = "file";
            $tmp = $_FILES["fileMateri"]["tmp_name"];
            $nama_file = $_FILES["fileMateri"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");
            
            $query2 = "INSERT INTO tabel_materi_technical (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )
            
            values(  
                '$_POST[kategoriMateri]',
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
            
        } 
        else if($_GET["module"]=="dataMateriTechnical" && $_GET["act"]=="edit"){
            $id_materiTechnicalUpdate = $_POST["id_materiTechnicalUpdate"];
            $nama_folder = "file";
            $tmp = $_FILES["fileMateri2"]["tmp_name"];
            $namanya_file = $_FILES["fileMateri2"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");
            $query9 = "UPDATE tabel_materi_technical set kategori_materi = '$_POST[kategoriMateri2]',
                judul_materi = '$_POST[judulMateri2]', keterangan_materi = '$_POST[keteranganMateri2]',
                file_materi = '$namanya_file', tipe = 'file' WHERE id_materi_technical = '$id_materiTechnicalUpdate'
            ";
            
            if(mysqli_query($con, $query9)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));           
            }
        } 
        else if($_GET["module"]=="dataMateriTechnical" && $_GET["act"]=="hapus"){
            $HapusMateriTechnicalQuery="DELETE FROM tabel_materi_technical WHERE id_materi_technical ='$_POST[id_materi_technical]'";
            mysqli_query($con, $HapusMateriTechnicalQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
    }

    if(isset($_POST["editDataMateriTechnical_idMateriTechnical"])){
        $editMateriTechnical = "SELECT * FROM tabel_materi_technical WHERE id_materi_technical = $_POST[editDataMateriTechnical_idMateriTechnical]";
        $resultEditMateriTechnical = mysqli_query($con, $editMateriTechnical);
    
        if(mysqli_num_rows($resultEditMateriTechnical) > 0){
            $i = 1;
            while($rowEditMateriTechnical=mysqli_fetch_assoc($resultEditMateriTechnical)){
                ?>
                    <div class="form-group">
                        <input type="hidden" name="id_materiTechnicalUpdate" value="<?=$rowEditMateriTechnical["id_materi_technical"]?>" > 
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="file" class="form-control border-0" id="fileMateri2" name="fileMateri2">
                                <label class="custom-file-label" for="validatedCustomFile"><?php echo $rowEditMateriTechnical['file_materi']; ?></label>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="judulMateri2" name="judulMateri2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriTechnical["judul_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="judulMateri2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="kategoriMateri2" name="kategoriMateri2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriTechnical["kategori_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="kategoriMateri2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea id="keteranganMateri2" name="keteranganMateri2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0"><?=$rowEditMateriTechnical["keterangan_materi"]?></textarea>
                        <div class="col-sm-12">
                            <div id="keteranganMateri2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                            <button class="btn btn-primary" name="editDataMateriTechnical" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    </div>
                <?php
    }
?>