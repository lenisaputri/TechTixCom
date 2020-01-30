<?php
include "../config/connection.php";

function tampilOperator($con)
{
    $tampilOperator="select * from tabel_operator";
    $resultTampilOperator=mysqli_query($con, $tampilOperator);
    return $resultTampilOperator;
}

if (isset($_POST["tambahDataScoreQuality"]) || isset($_POST["editDataScoreQuality"]) || isset($_POST["hapusDataScoreQuality"])){

    if($_GET["module"]=="dataScoreQuality" && $_GET["act"]=="tambah"){

        $dateQuality =  date('Y-m-d', strtotime($_POST[dateQuality]));
       $query2 = "INSERT INTO tabel_score_quality (
         id_operator,
         poin,
         nilai,
         tanggal_training
    )

     values
    (  '$_POST[nikQuality]',
        '$_POST[poinQuality]',
        '$_POST[nilaiQuality]',
        '$dateQuality'
    );";
    
        if(mysqli_query($con, $query2)){ 
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
        else{            
            echo("Error description: " . mysqli_error($con));
        }
    } else if ($_GET["module"]=="dataScoreQuality" && $_GET["act"]=="edit"){
        $id_scoreQualityUpdate = $_POST["id_scoreQualityUpdate"];
        
        $dateQualityEdit =  date('Y-m-d', strtotime($_POST[dateQualityEdit]));

        $query10="UPDATE tabel_score_quality
            set
            poin = '$_POST[poinQualityEdit]',
            nilai = '$_POST[nilaiQualityEdit]',
            tanggal_training = '$dateQualityEdit'
            where id_score_quality='$id_scoreQualityUpdate';";

            if(mysqli_query($con,$query10)){

                header('location:../module/index.php?module=' . $_GET["module"]);
            }

            else{            
                echo("Error description: " . mysqli_error($con));
            }
    }else if ($_GET["module"]=="dataScoreQuality" && $_GET["act"]=="hapus"){
        $idnya = $_POST['id_score_quality'];

        $queryDelete2 = "DELETE FROM tabel_score_quality_detail WHERE id_score_quality='$idnya';";
        $queryDelete = "DELETE FROM tabel_score_quality WHERE id_score_quality='$idnya';";

        if(mysqli_query($con,$queryDelete2) && mysqli_query($con,$queryDelete)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }
}

// MODAL EDIT OPERATOR
if(isset($_POST["editDataScoreQuality_idScoreQuality"])){
    $editScoreQuality = "SELECT tsq.*, tp.id_operator, tp.nik FROM tabel_score_quality tsq, tabel_operator tp WHERE tsq.id_operator = tp.id_operator AND tsq.id_score_quality = $_POST[editDataScoreQuality_idScoreQuality]";
    $resultEditScoreQuality = mysqli_query($con, $editScoreQuality);
  
    if(mysqli_num_rows($resultEditScoreQuality) > 0){
        $i = 1;
        while($rowEditScoreQuality=mysqli_fetch_assoc($resultEditScoreQuality)){
            ?>
            <div class="form-group row">
                <input type="hidden" name="id_scoreQualityUpdate" value="<?=$rowEditScoreQuality["id_score_quality"]?>" > 
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikQualityEdit" style="font-weight: bold">NIK OPERATOR</label>
                                    <input type="number" class="form-control" value="<?=$rowEditScoreQuality["nik"]?>" id="nikQualityEdit" name="nikQualityEdit" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nikQualityEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="poinQualityEdit" style="font-weight: bold">POIN OPERATOR</label>
                                    <input type="number" class="form-control" value="<?=$rowEditScoreQuality["poin"]?>" id="poinQualityEdit" name="poinQualityEdit" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="poinQualityEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nilaiQualityEdit" style="font-weight: bold">TOTAL NILAI</label>
                                    <input type="number" class="form-control" value="<?=$rowEditScoreQuality["nilai"]?>" id="nilaiQualityEdit" name="nilaiQualityEdit" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nilaiQualityBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateQualityEdit" style="font-weight: bold">TANGGAL ASSESMENT</label>
                                <div class="input-group date" id="datepickerTanggalTrainingEdit" data-provide="datepicker">
                                    <input type="text" id="dateQualityEdit" class="form-control form-control-user datepicker" value="<?=$rowEditScoreQuality["tanggal_training"]?>" name="dateQualityEdit">
                                    <div class="input-group-addon">
                                        <span class="input-group-text form-control form-control-user">
                                            <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <div id="dateQualityEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                        <button class="btn btn-primary" name="editDataScoreQuality" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            <?php
  }
  
   // MODAL EDIT OPERATOR
if(isset($_POST["infoDataScoreQuality_idScoreQuality"])){
    $infoScoreQuality = "SELECT tsq.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
    FROM tabel_score_quality tsq, tabel_operator tp , tabel_jabatan tj 
    WHERE tsq.id_operator = tp.id_operator 
    AND tp.id_jabatan = tj.id_jabatan
    AND tsq.id_score_quality = $_POST[infoDataScoreQuality_idScoreQuality]";
    $resultInfoScoreQuality = mysqli_query($con, $infoScoreQuality);
  
    if(mysqli_num_rows($resultInfoScoreQuality) > 0){
       $rowInfoScoreQuality=mysqli_fetch_assoc($resultInfoScoreQuality);
            ?>
            <div class="row">
                <div class="col-sm-6">
                <p>NAMA : <?php echo $rowInfoScoreQuality["nama_lengkap"]; ?></p>
                <p>NIK : <?php echo $rowInfoScoreQuality["nik"]; ?></p>
                <p>JABATAN : <?php echo $rowInfoScoreQuality["nama_jabatan"]; ?></p>          
                </div>
                <div class="col-sm-6">
                <p>POIN : <?php echo $rowInfoScoreQuality["poin"]; ?></p>
                <p>NILAI : <?php echo $rowInfoScoreQuality["nilai"]; ?></p>
                </div>
            </div>
                <p class="row d-flex justify-content-end">TANGGAL TRAINING : <?php echo $rowInfoScoreQuality["tanggal_training"]; ?></p>
            <hr>

            <?php
                $infoScoreQualityDetail = "SELECT tsq.*, tp.id_operator, tp.nik, tsqd.*
                    FROM tabel_score_quality tsq, tabel_operator tp , tabel_score_quality_detail tsqd 
                    WHERE tsq.id_operator = tp.id_operator 
                    AND tsq.id_score_quality = tsqd.id_score_quality
                    AND tsq.id_score_quality = $_POST[infoDataScoreQuality_idScoreQuality]";
                
                $resultInfoScoreQualityDetail = mysqli_query($con, $infoScoreQualityDetail);
                if(mysqli_num_rows($resultInfoScoreQualityDetail) > 0){
                    ?>
                    <div class="table-responsive">
                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                    <thead>
                        <tr style="font-size: .8rem;">
                            <th>No.</th>
                            <th>FOOD SAFETY SYSTEM</th>
                            <th>GMP</th>
                            <th>HALAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $index=1;
                    while($row1 = mysqli_fetch_assoc($resultInfoScoreQualityDetail)){
                    ?>
                    <tr>
                        <td><?php echo $index;?></td>
                        <td><?php echo $row1["fss"];?></td>
                        <td><?php echo $row1["gmp"];?></td>
                        <td><?php echo $row1["halal"];?></td>
                    </tr>
                    <?php
                    $index++;
                }
                ?>
                </tbody>
                </table>
                <?php
            } else {
                 ?>
                <div class='text-center col-md-12'>
                    <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                    <p class='text-muted'>Data Nilai Masih Kosong</p>
                </div>
                <?php
            }
            ?>
            </div>
            <?php
        } else {
            ?> 
                <div class="text-center text-muted">Data Tidak Ditemukan</div>
            <?php
        }
            ?>
            
                <div class="form-group">
                    <div class="modal-footer border-0">
                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                        <button class="btn btn-primary" name="editDataScoreQuality" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            <?php
  }
?>