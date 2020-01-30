<?php
    include "../config/connection.php";

    if (isset($_POST["tambahDataMateriLink"]) || isset($_POST["editDataMateriTechnicalLink"]) || isset($_POST["hapusDataMateriTechnicalLink"])){
        if($_GET["module"]=="dataMateriTechnicalLink" && $_GET["act"]=="tambah"){            
            $query2 = "INSERT INTO tabel_materi_technical (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )
            
            VALUES(  
                '$_POST[kategoriMateriLink]',
                '$_POST[judulMateriLink]',
                '$_POST[keteranganMateriLink]',
                '$_POST[linkMateri]',
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
        else if($_GET["module"]=="dataMateriTechnicalLink" && $_GET["act"]=="edit"){
            $id_materiTechnicalLinkUpdate = $_POST["id_materiTechnicalLinkUpdate"];
            $query10 = "UPDATE tabel_materi_technical set kategori_materi = '$_POST[kategoriMateriLink2]',
                judul_materi = '$_POST[judulMateriLink2]', keterangan_materi = '$_POST[keteranganMateriLink2]',
                file_materi = '$_POST[linkMateriLink2]', tipe = 'link' WHERE id_materi_technical = '$id_materiTechnicalLinkUpdate'
            ";

            if(mysqli_query($con, $query10)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));           
            }
        } 
        else if($_GET["module"]=="dataMateriTechnicalLink" && $_GET["act"]=="hapus"){
            $HapusMateriTechnicalQuery="DELETE FROM tabel_materi_technical WHERE id_materi_technical ='$_POST[id_materi_technical]'";
            mysqli_query($con, $HapusMateriTechnicalQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
    }

    if(isset($_POST["editDataMateriTechnicalLink_idMateriTechnical"])){
        $editMateriTechnical = "SELECT * FROM tabel_materi_technical WHERE id_materi_technical = $_POST[editDataMateriTechnicalLink_idMateriTechnical]";
        $resultEditMateriTechnical = mysqli_query($con, $editMateriTechnical);
    
        if(mysqli_num_rows($resultEditMateriTechnical) > 0){
            $i = 1;
            while($rowEditMateriTechnical=mysqli_fetch_assoc($resultEditMateriTechnical)){
                ?>
                    <div class="form-group">
                        <input type="hidden" name="id_materiTechnicalLinkUpdate" value="<?=$rowEditMateriTechnical["id_materi_technical"]?>" > 
                        <input type="text" class="form-control border-0" id="linkMateriLink2" name="linkMateriLink2" placeholder="Link Materi ..." style="width=100%" value="<?=$rowEditMateriTechnical["file_materi"]?>">
                        <div class="col-sm-6">
                            <div id="linkMateriLink2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="judulMateriLink2" name="judulMateriLink2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriTechnical["judul_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="judulMateriLink2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="kategoriMateriLink2" name="kategoriMateriLink2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriTechnical["kategori_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="kategoriMateriLink2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea id="keteranganMateriLink2" name="keteranganMateriLink2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0"><?=$rowEditMateriTechnical["keterangan_materi"]?></textarea>
                        <div class="col-sm-12">
                            <div id="keteranganMateriLink2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                            <button class="btn btn-primary" name="editDataMateriTechnicalLink" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    </div>
                <?php
    }
?>