<?php
    include "../config/connection.php";

    if (isset($_POST["tambahDataMateriSafetyLink"]) || isset($_POST["editDataMateriSafetyLink"]) || isset($_POST["hapusDataMateriSafetyLink"])){
        if($_GET["module"]=="dataMateriSafetyLink" && $_GET["act"]=="tambah"){           
            $query2 = "INSERT INTO tabel_materi_safety (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )
            
            VALUES(  
                '$_POST[kategoriMateriSafetyLink]',
                '$_POST[judulMateriSafetyLink]',
                '$_POST[keteranganMateriSafetyLink]',
                '$_POST[linkMateriSafety]',
                'link',
                curdate()
            );";
            
            if(mysqli_query($con, $query2)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));           
            }
        }
        else if($_GET["module"]=="dataMateriSafetyLink" && $_GET["act"]=="edit"){
            $id_materiSafetyLinkUpdate = $_POST["id_materiSafetyLinkUpdate"];
            $query10 = "UPDATE tabel_materi_safety set kategori_materi = '$_POST[kategoriMateriSafetyLink2]',
                judul_materi = '$_POST[judulMateriSafetyLink2]', keterangan_materi = '$_POST[keteranganMateriSafetyLink2]',
                file_materi = '$_POST[linkMateriSafetyLink2]', tipe = 'link' WHERE id_materi_safety = '$id_materiSafetyLinkUpdate'
            ";
            
            if(mysqli_query($con, $query10)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));           
            }
        } 
        else if($_GET["module"]=="dataMateriSafetyLink" && $_GET["act"]=="hapus"){
            $HapusMateriSafetyQuery="DELETE FROM tabel_materi_safety WHERE id_materi_safety ='$_POST[id_materi_safety]'";
            mysqli_query($con, $HapusMateriSafetyQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
    }

    if(isset($_POST["editDataMateriSafetyLink_idMateriSafety"])){
        $editMateriSafety = "SELECT * FROM tabel_materi_safety WHERE id_materi_safety = $_POST[editDataMateriSafetyLink_idMateriSafety]";
        $resultEditMateriSafety = mysqli_query($con, $editMateriSafety);
    
        if(mysqli_num_rows($resultEditMateriSafety) > 0){
            $i = 1;
            while($rowEditMateriSafety=mysqli_fetch_assoc($resultEditMateriSafety)){
                ?>
                    <div class="form-group">
                        <input type="hidden" name="id_materiSafetyLinkUpdate" value="<?=$rowEditMateriSafety["id_materi_safety"]?>" > 
                        <input type="text" class="form-control border-0" id="linkMateriSafetyLink2" name="linkMateriSafetyLink2" placeholder="Link Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["file_materi"]?>" required>
                        <div class="col-sm-6">
                            <div id="linkMateriSafetyLink2Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="judulMateriSafetyLink2" name="judulMateriSafetyLink2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["judul_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="judulMateriSafetyLink2Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="kategoriMateriSafetyLink2" name="kategoriMateriSafetyLink2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["kategori_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="kategoriMateriSafetyLink2Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea id="keteranganMateriSafetyLink2" name="keteranganMateriSafetyLink2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0" required><?=$rowEditMateriSafety["keterangan_materi"]?></textarea>
                        <div class="col-sm-12">
                            <div id="keteranganMateriSafetyLink2Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
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
                            <button class="btn btn-primary" name="editDataMateriSafetyLink" type="submit" onclick="ValidasiEditDataMateriSafetyLink();"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    </div>
                <?php
    }
?>