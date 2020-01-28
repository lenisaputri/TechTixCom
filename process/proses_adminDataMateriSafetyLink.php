<?php
include "../config/connection.php";

if (isset($_POST["tambahDataMateriLink"]) || isset($_POST["editDataMateriSafetyLink"]) || isset($_POST["hapusDataMateriSafetyLink"])){
    if($_GET["module"]=="dataMateriSafetyLink" && $_GET["act"]=="tambah"){
        
        $query2 = "INSERT INTO tabel_materi_safety (
            kategori_materi,
            judul_materi,
            keterangan_materi,
            file_materi,
            tipe,
            tanggal_upload
            )
        
            VALUES
            (  '$_POST[kategoriMateriLink]',
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
            
        }else if($_GET["module"]=="dataMateriSafetyLink" && $_GET["act"]=="edit"){
        $id_materiSafetyLinkUpdate = $_POST["id_materiSafetyLinkUpdate"];

            $query10 = "UPDATE tabel_materi_safety set kategori_materi = '$_POST[kategoriMateriLink2]',
            judul_materi = '$_POST[judulMateriLink2]', keterangan_materi = '$_POST[keteranganMateriLink2]',
            file_materi = '$_POST[linkMateriLink2]', tipe = 'link' WHERE id_materi_safety = '$id_materiSafetyLinkUpdate'
            ";
           
            if(mysqli_query($con, $query10)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
               echo("Error description: " . mysqli_error($con));           
            }
    } else if($_GET["module"]=="dataMateriSafetyLink" && $_GET["act"]=="hapus"){
        $HapusMateriSafetyQuery="DELETE FROM tabel_materi_safety WHERE id_materi_safety ='$_POST[id_materi_safety]'";
        mysqli_query($con, $HapusMateriSafetyQuery);
        header('location:../module/index.php?module=' . $_GET["module"]);
    }
}

// MODAL EDIT OPERATOR
if(isset($_POST["editDataMateriSafetyLink_idMateriSafety"])){
    $editMateriSafety = "SELECT * FROM tabel_materi_safety WHERE id_materi_safety = $_POST[editDataMateriSafetyLink_idMateriSafety]";
    $resultEditMateriSafety = mysqli_query($con, $editMateriSafety);
  
    if(mysqli_num_rows($resultEditMateriSafety) > 0){
        $i = 1;
        while($rowEditMateriSafety=mysqli_fetch_assoc($resultEditMateriSafety)){
            ?>
            <div class="form-group">
                <input type="hidden" name="id_materiSafetyLinkUpdate" value="<?=$rowEditMateriSafety["id_materi_safety"]?>" > 
                        <input type="text" class="form-control border-0" id="linkMateriLink2" name="linkMateriLink2" placeholder="Link Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["file_materi"]?>">
                        <div class="col-sm-6">
                            <div id="linkMateriLink2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
            </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="judulMateriLink2" name="judulMateriLink2" placeholder="Judul Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["judul_materi"]?>" required>
                    <div class="col-sm-12">
                        <div id="judulMateriLink2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="kategoriMateriLink2" name="kategoriMateriLink2" placeholder="Kategori Materi ..." style="width=100%" value="<?=$rowEditMateriSafety["kategori_materi"]?>" required>
                    <div class="col-sm-12">
                        <div id="kategoriMateriLink2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <textarea id="keteranganMateriLink2" name="keteranganMateriLink2" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0"><?=$rowEditMateriSafety["keterangan_materi"]?></textarea>
                    <div class="col-sm-12">
                        <div id="keteranganMateriLink2Blank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                        <button class="btn btn-primary" name="editDataMateriSafetyLink" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            <?php
  }
?>