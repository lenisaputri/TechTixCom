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

    if (isset($_POST["tambahDataMateriSafety"]) || isset($_POST["editDataMateriSafety"]) || isset($_POST["hapusDataMateriSafety"])){
        if($_GET["module"]=="dataMateriSafety" && $_GET["act"]=="tambah"){
            $tipe = "";
            $nama_folder = "file";
            $tmp = $_FILES["fileMateriSafety"]["tmp_name"];
            $nama_file = $_FILES["fileMateriSafety"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");            
            $query2 = "INSERT INTO tabel_materi_safety (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )
            
            values(  
                '$_POST[kategoriMateriSafety]',
                '$_POST[judulMateriSafety]',
                '$_POST[keteranganMateriSafety]',
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
        else if($_GET["module"]=="dataMateriSafety" && $_GET["act"]=="edit"){
            $id_materiSafetyUpdate = $_POST["id_materiSafetyUpdate"];
            $nama_folder = "file";
            $tmp = $_FILES["fileMateriSafety2"]["tmp_name"];
            $namanya_file = $_FILES["fileMateriSafety2"]["name"];
            move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");
            $query9 = "UPDATE tabel_materi_safety set kategori_materi = '$_POST[kategoriMateriSafety2]',
                judul_materi = '$_POST[judulMateriSafety2]', keterangan_materi = '$_POST[keteranganMateriSafety2]',
                file_materi = '$namanya_file', tipe = 'file' WHERE id_materi_safety = '$id_materiSafetyUpdate'
            ";
            
            if(mysqli_query($con, $query9)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));           
            }
        } 
        else if($_GET["module"]=="dataMateriSafety" && $_GET["act"]=="hapus"){
            $HapusMateriSafetyQuery="DELETE FROM tabel_materi_safety WHERE id_materi_safety ='$_POST[id_materi_safety]'";
            mysqli_query($con, $HapusMateriSafetyQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
    }

    if(isset($_POST["editDataMateriSafety_idMateriSafety"])){
        $editMateriSafety = "SELECT * FROM tabel_materi_safety WHERE id_materi_safety = $_POST[editDataMateriSafety_idMateriSafety]";
        $resultEditMateriSafety = mysqli_query($con, $editMateriSafety);
    
        if(mysqli_num_rows($resultEditMateriSafety) > 0){
            $i = 1;
            while($rowEditMateriSafety=mysqli_fetch_assoc($resultEditMateriSafety)){
                ?>
                    <div class="form-group">
                        <input type="hidden" name="id_materiSafetyUpdate" value="<?=$rowEditMateriSafety["id_materi_safety"]?>" > 
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="file" class="form-control border-0" id="fileMateriSafety2" name="fileMateriSafety2" required>
                                <label class="custom-file-label" for="fileMateriSafety2"><?php echo $rowEditMateriSafety['file_materi']; ?></label>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div id="fileMateriSafety2Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="judulMateriSafety2" name="judulMateriSafety2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["judul_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="judulMateriSafety2Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="kategoriMateriSafety2" name="kategoriMateriSafety2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["kategori_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="kategoriMateriSafety2Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea id="keteranganMateriSafety2" name="keteranganMateriSafety2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0" required><?=$rowEditMateriSafety["keterangan_materi"]?></textarea>
                        <div class="col-sm-12">
                            <div id="keteranganMateriSafety2Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
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
                            <button class="btn btn-primary" name="editDataMateriSafety" type="submit" onclick="ValidasiEditDataMateriSafety();"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    </div>
                <?php
    }
?>