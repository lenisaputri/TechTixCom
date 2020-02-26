<?php
    include "../config/connection.php";

    if (isset($_POST["tambahDataMateriGeneralHrdLink"]) || isset($_POST["editDataMateriGeneralHrdLink"]) || isset($_POST["hapusDataMateriGeneralHrdLink"])){
        if($_GET["module"]=="dataMateriGeneralHrdLink" && $_GET["act"]=="tambah"){            
            $query2 = "INSERT INTO tabel_materi_generalhrd (
                kategori_materi,
                judul_materi,
                keterangan_materi,
                file_materi,
                tipe,
                tanggal_upload
            )
            
            VALUES(  
                '$_POST[kategoriMateriGeneralHrdLink]',
                '$_POST[judulMateriGeneralHrdLink]',
                '$_POST[keteranganMateriGeneralHrdLink]',
                '$_POST[linkMateriLinkGeneralHrdLink]',
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
        else if($_GET["module"]=="dataMateriGeneralHrdLink" && $_GET["act"]=="edit"){
            $id_materiGeneralHrdLinkUpdate = $_POST["id_materiGeneralHrdLinkUpdate"];
            $query10 = "UPDATE tabel_materi_generalhrd set kategori_materi = '$_POST[kategoriMateriGeneralHrdLink2]',
                judul_materi = '$_POST[judulMateriGeneralHrdLink2]', keterangan_materi = '$_POST[keteranganMateriGeneralHrdLink2]',
                file_materi = '$_POST[linkMateriLinkGeneralHrdLink2]', tipe = 'link' WHERE id_materi_generalhrd = '$id_materiGeneralHrdLinkUpdate'
            ";
            
            if(mysqli_query($con, $query10)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));           
            }
        } 
        else if($_GET["module"]=="dataMateriGeneralHrdLink" && $_GET["act"]=="hapus"){
            $HapusMateriGeneralHrdQuery="DELETE FROM tabel_materi_generalhrd WHERE id_materi_generalhrd ='$_POST[id_materi_generalhrd]'";
            mysqli_query($con, $HapusMateriGeneralHrdQuery);
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
    }

    if(isset($_POST["editDataMateriGeneralHrdLink_idMateriGeneralHrd"])){
        $editMateriGeneralHrd = "SELECT * FROM tabel_materi_generalhrd WHERE id_materi_generalhrd = $_POST[editDataMateriGeneralHrdLink_idMateriGeneralHrd]";
        $resultEditMateriGeneralHrd = mysqli_query($con, $editMateriGeneralHrd);
    
        if(mysqli_num_rows($resultEditMateriGeneralHrd) > 0){
            $i = 1;
            while($rowEditMateriGeneralHrd=mysqli_fetch_assoc($resultEditMateriGeneralHrd)){
                ?>
                    <div class="form-group">
                        <input type="hidden" name="id_materiGeneralHrdLinkUpdate" value="<?=$rowEditMateriGeneralHrd["id_materi_generalhrd"]?>" > 
                        <input type="text" class="form-control border-0" id="linkMateriLinkGeneralHrdLink2" name="linkMateriLinkGeneralHrdLink2" placeholder="Link Materi ..." style="width=100%" value="<?=$rowEditMateriGeneralHrd["file_materi"]?>" required>
                        <div class="col-sm-6">
                            <div id="linkMateriLinkGeneralHrdLinkBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="judulMateriGeneralHrdLink2" name="judulMateriGeneralHrdLink2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriGeneralHrd["judul_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="judulMateriGeneralHrdLinkBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="kategoriMateriGeneralHrdLink2" name="kategoriMateriGeneralHrdLink2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriGeneralHrd["kategori_materi"]?>" required>
                        <div class="col-sm-12">
                            <div id="kategoriMateriGeneralHrdLinkBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea id="keteranganMateriGeneralHrdLink2" name="keteranganMateriGeneralHrdLink2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0" required><?=$rowEditMateriGeneralHrd["keterangan_materi"]?></textarea>
                        <div class="col-sm-12">
                            <div id="keteranganMateriGeneralHrdLinkBlank2" class="small d-flex flex-column justify-content-center text-danger"></div>
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
                    <button class="btn btn-primary" name="editDataMateriGeneralHrdLink" type="submit" onclick="ValidasiEditDataMateriGeneralHrdLink();"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        <?php
    }
?>