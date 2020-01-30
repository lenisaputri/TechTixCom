<?php
    include "../config/connection.php";

    if (isset($_POST["tambahDataMateriQualityLink"]) || isset($_POST["editDataMateriQualityLink"]) || isset($_POST["hapusDataMateriQualityLink"])){
        if($_GET["module"]=="dataMateriQualityLink" && $_GET["act"]=="tambah"){
            $query2 = "INSERT INTO tabel_materi_quality (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )

            VALUES(  
                '$_POST[kategoriMateriQualityLink]',
                '$_POST[judulMateriQualityLink]',
                '$_POST[keteranganMateriQualityLink]',
                '$_POST[linkMateriQualityLink]',
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
        else if($_GET["module"]=="dataMateriQualityLink" && $_GET["act"]=="edit"){
            $id_materiQualityLinkUpdate = $_POST["id_materiQualityLinkUpdate"];
            $query10 = "UPDATE tabel_materi_quality set kategori_materi = '$_POST[kategoriMateriQualityLink2]',
                judul_materi = '$_POST[judulMateriQualityLink2]', keterangan_materi = '$_POST[keteranganMateriQualityLink2]',
                file_materi = '$_POST[linkMateriQualityLink2]', tipe = 'link' WHERE id_materi_quality = '$id_materiQualityLinkUpdate'
            ";
                
            if(mysqli_query($con, $query10)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));           
            }
        }
        else if($_GET["module"]=="dataMateriQualityLink" && $_GET["act"]=="hapus"){
            $HapusMateriQualityQuery="DELETE FROM tabel_materi_quality WHERE id_materi_quality ='$_POST[id_materi_quality]'";
            mysqli_query($con, $HapusMateriQualityQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
    }
       
    if(isset($_POST["editDataMateriQualityLink_idMateriQuality"])){
        $editMateriQuality = "SELECT * FROM tabel_materi_quality WHERE id_materi_quality = $_POST[editDataMateriQualityLink_idMateriQuality]";
        $resultEditMateriQuality = mysqli_query($con, $editMateriQuality);
            
        if(mysqli_num_rows($resultEditMateriQuality) > 0){
            $i = 1;
            while($rowEditMateriQuality=mysqli_fetch_assoc($resultEditMateriQuality)){
                ?>
                    <div class="form-group">
                        <input type="hidden" name="id_materiQualityLinkUpdate" value="<?=$rowEditMateriQuality["id_materi_quality"]?>" > 
                        <input type="text" class="form-control border-0" id="linkMateriQualityLink2" name="linkMateriQualityLink2" placeholder="Link Materi ..." style="width=100%" value="<?=$rowEditMateriQuality["file_materi"]?>" required>
                            <div class="col-sm-6">
                                <div id="linkMateriQualityLinkBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="judulMateriQualityLink2" name="judulMateriQualityLink2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriQuality["judul_materi"]?>" required>
                            <div class="col-sm-12">
                                <div id="judulMateriQualityLinkBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="kategoriMateriQualityLink2" name="kategoriMateriQualityLink2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriQuality["kategori_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="kategoriMateriQualityLinkBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea id="keteranganMateriQualityLink2" name="keteranganMateriQualityLink2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0" required><?=$rowEditMateriQuality["keterangan_materi"]?></textarea>
                        <div class="col-sm-12">
                            <div id="keteranganMateriQualityLinkBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
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
                            <button class="btn btn-primary" name="editDataMateriQualityLink" type="submit" onclick="ValidasiEditDataMateriQualityLink();"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    </div>
                <?php
    }
?>