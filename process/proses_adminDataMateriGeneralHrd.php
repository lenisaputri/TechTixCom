<?php
    include "../config/connection.php";

    if (isset($_POST["tambahDataMateriGeneralHrd"]) || isset($_POST["editDataMateriGeneralHrd"]) || isset($_POST["hapusDataMateriGeneralHrd"])){
        if($_GET["module"]=="dataMateriGeneralHrd" && $_GET["act"]=="tambah"){
            $nama_folder = "file";
            $tmp = $_FILES["fileMateriGeneralHrd"]["tmp_name"];
            $nama_file = $_FILES["fileMateriGeneralHrd"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");
           
            $query2 = "INSERT INTO tabel_materi_generalhrd (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )
            
            values(  
                '$_POST[kategoriMateriGeneralHrd]',
                '$_POST[judulMateriGeneralHrd]',
                '$_POST[keteranganMateriGeneralHrd]',
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
        else if($_GET["module"]=="dataMateriGeneralHrd" && $_GET["act"]=="edit"){
            $id_materiGeneralHrdUpdate = $_POST["id_materiGeneralHrdUpdate"];
            $nama_folder = "file";
            $tmp = $_FILES["fileMateriGeneralHrd2"]["tmp_name"];
            $namanya_file = $_FILES["fileMateriGeneralHrd2"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

            
            $query9 = "UPDATE tabel_materi_generalhrd set kategori_materi = '$_POST[kategoriMateriGeneralHrd2]',
                    judul_materi = '$_POST[judulMateriGeneralHrd2]', keterangan_materi = '$_POST[keteranganMateriGeneralHrd2]',
                    file_materi = '$namanya_file', tipe = 'file' WHERE id_materi_generalhrd = '$id_materiGeneralHrdUpdate'
            ";
            
            if(mysqli_query($con, $query9)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));           
            } 
            
        } 
        else if($_GET["module"]=="dataMateriGeneralHrd" && $_GET["act"]=="hapus"){
            $HapusMateriGeneralHrdQuery="DELETE FROM tabel_materi_generalhrd WHERE id_materi_generalhrd ='$_POST[id_materi_generalhrd]'";
            mysqli_query($con, $HapusMateriGeneralHrdQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
    }

    if(isset($_POST["editDataMateriGeneralHrd_idMateriGeneralHrd"])){
        $editMateriGeneralHrd = "SELECT * FROM tabel_materi_generalhrd WHERE id_materi_generalhrd = $_POST[editDataMateriGeneralHrd_idMateriGeneralHrd]";
        $resultEditMateriGeneralHrd = mysqli_query($con, $editMateriGeneralHrd);
    
        if(mysqli_num_rows($resultEditMateriGeneralHrd) > 0){
            $i = 1;
            while($rowEditMateriGeneralHrd=mysqli_fetch_assoc($resultEditMateriGeneralHrd)){
                ?>
                <div class="form-group">
                    <input type="hidden" name="id_materiGeneralHrdUpdate" value="<?=$rowEditMateriGeneralHrd["id_materi_generalhrd"]?>" > 
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="file" class="form-control border-0" id="fileMateriGeneralHrd2" name="fileMateriGeneralHrd2" required>
                            <label class="custom-file-label" for="fileMateriGeneralHrd2"><?php echo $rowEditMateriGeneralHrd['file_materi']; ?></label>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div id="fileMateriGeneralHrdBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="judulMateriGeneralHrd2" name="judulMateriGeneralHrd2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriGeneralHrd["judul_materi"]?>" required>
                    <div class="col-sm-12">
                        <div id="judulMateriGeneralHrdBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="kategoriMateriGeneralHrd2" name="kategoriMateriGeneralHrd2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriGeneralHrd["kategori_materi"]?>" required>
                    <div class="col-sm-12">
                        <div id="kategoriMateriGeneralHrdBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <textarea id="keteranganMateriGeneralHrd2" name="keteranganMateriGeneralHrd2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0" required><?=$rowEditMateriGeneralHrd["keterangan_materi"]?></textarea>
                    <div class="col-sm-12">
                        <div id="keteranganMateriGeneralHrdBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
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
                    <button class="btn btn-primary" name="editDataMateriGeneralHrd" type="submit"  onclick="ValidasiEditDataMateriGeneralHrd();"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        <?php
    }
?>