<?php
    include "../config/connection.php";

    function tampilScoreQuality($con)
    {
        $tampilScoreQuality="SELECT DISTINCT(tsq.id_operator), tsq.id_score_quality ,tsq.*, tp.id_operator, tp.nik FROM tabel_score_quality tsq, tabel_operator tp
        WHERE tsq.id_operator = tp.id_operator GROUP BY tsq.id_operator";
        $resultTampilScoreQuality=mysqli_query($con, $tampilScoreQuality);
        return $resultTampilScoreQuality;
    }

    function tampilScoreQualityDate($con)
    {
        $tampilScoreQualityDate="SELECT DISTINCT(tsq.tanggal_training), tsq.id_score_quality ,tsq.*, tp.id_operator, tp.nik FROM tabel_score_quality tsq, tabel_operator tp
        WHERE tsq.id_operator = tp.id_operator GROUP BY tsq.tanggal_training";
        $resultTampilScoreQualityDate=mysqli_query($con, $tampilScoreQualityDate);
        return $resultTampilScoreQualityDate;
    }

    function tampilScoreQualityDateEdit($con)
    {
        $tampilScoreQualityDateEdit="SELECT DISTINCT(tsq.tanggal_training), tsq.id_score_quality ,tsq.*, tp.id_operator, tp.nik FROM tabel_score_quality tsq, tabel_operator tp
        WHERE tsq.id_operator = tp.id_operator GROUP BY tsq.tanggal_training";
        $resultTampilScoreQualityDateEdit=mysqli_query($con, $tampilScoreQualityDateEdit);
        $output="";

        if(mysqli_num_rows($resultTampilScoreQualityDateEdit) > 0){
            while($rowDateQualityDetail=mysqli_fetch_assoc($resultTampilScoreQualityDateEdit)){
                if($rowDateQualityDetail["tanggal_training"]==$tanggal_trainingEdit){
                    $output.="<option value='$rowDateQualityDetail[tanggal_training]' selected>".$rowDateQualityDetail["tanggal_training"]."</option>";
                }
                else{
                    $output.="<option value='$rowDateQualityDetail[tanggal_training]'>$rowDateQualityDetail[tanggal_training]</option>";
                }
            }
        }
        return $output;
    }

    if (isset($_POST["tambahDataScoreQualityyDetail"]) || isset($_POST["editDataScoreQualityDetail"]) || isset($_POST["hapusDataScoreQualityDetail"])){
        if($_GET["module"]=="dataScoreQualityDetail" && $_GET["act"]=="tambah"){
            $query2 = "INSERT INTO tabel_score_quality_detail (
                id_score_quality,
                fss,
                gmp,
                halal,
                tanggal_training
            )

            values(  
                '$_POST[nikOperatorDetail]',
                '$_POST[fssDetail]',
                '$_POST[gmpDetail]',
                '$_POST[halaDetail]',
                '$_POST[tanggalTrainingDetail]'
            );";
        
            if(mysqli_query($con, $query2)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        } 
        else if ($_GET["module"]=="dataScoreQualityDetail" && $_GET["act"]=="edit"){
            $id_scoreQualityDetailUpdate = $_POST["id_scoreQualityDetailUpdate"];            
            $query10="UPDATE tabel_score_quality_detail
                set
                fss = '$_POST[fssQualityEditDetail]',
                gmp = '$_POST[gmpQualityEditDetail]',
                halal = '$_POST[halalQualityEditDetail]',
                tanggal_training = '$_POST[tanggalTrainingQualityEditDetail]'
                where id_score_quality_detail='$id_scoreQualityDetailUpdate';";

                if(mysqli_query($con,$query10)){
                    header('location:../module/index.php?module=' . $_GET["module"]);
                }
                else{            
                    echo("Error description: " . mysqli_error($con));
                }
        }
        else if ($_GET["module"]=="dataScoreQualityDetail" && $_GET["act"]=="hapus"){
            $idnya = $_POST['id_score_quality_detail'];
            $queryDelete = "DELETE FROM tabel_score_quality_detail WHERE id_score_quality_detail='$idnya';";

            if(mysqli_query($con,$queryDelete)){
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }

    if(isset($_POST["editDataScoreQualityDetail_idScoreQuality"])){
        $editScoreQualityDetail = "SELECT tsqd.*, tsq.*, tp.id_operator, tp.nik 
            FROM tabel_score_quality_detail tsqd, tabel_score_quality tsq, tabel_operator tp 
            WHERE tsq.id_operator = tp.id_operator
            AND tsqd.id_score_quality = tsq.id_score_quality
            AND tsqd.id_score_quality_detail = $_POST[editDataScoreQualityDetail_idScoreQuality]";

        $resultEditScoreQualityDetail = mysqli_query($con, $editScoreQualityDetail);
    
        if(mysqli_num_rows($resultEditScoreQualityDetail) > 0){
            $i = 1;
            while($rowEditScoreQualityDetail=mysqli_fetch_assoc($resultEditScoreQualityDetail)){
                ?>
                    <div class ="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <input type="hidden" name="id_scoreQualityDetailUpdate" value="<?=$rowEditScoreQualityDetail["id_score_quality_detail"]?>" > 
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikQualityEditDetail" style="font-weight: bold">NIK OPERATOR</label>
                                    <input type="number" class="form-control" placeholder="NIK OPERATOR" id="nikQualityEditDetail" name="nikQualityEditDetail" value="<?=$rowEditScoreQualityDetail["nik"]?>" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nikQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="tanggalTrainingQualityEditDetail" style="font-weight: bold">TANGGAL TRAINING</label>
                                    <select class="custom-select" name="tanggalTrainingQualityEditDetail"><?=tampilScoreQualityDateEdit($con,$rowEditScoreQualityDetail['tanggal_training'])?></select>
                                </div>
                                <div class="col-sm-12">
                                    <div id="tanggalTrainingQualityEditDetailBlank2" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="fssQualityEditDetail" style="font-weight: bold">Food Safety System</label>
                                    <input type="number" class="form-control" placeholder="NILAI Food Safety System" id="fssQualityEditDetail" name="fssQualityEditDetail" value="<?=$rowEditScoreQualityDetail["fss"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="fssQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="gmpQualityEditDetail" style="font-weight: bold">EA-HIRA</label>
                                    <input type="number" class="form-control" placeholder="NILAI GMP" id="gmpQualityEditDetail" name="gmpQualityEditDetail" value="<?=$rowEditScoreQualityDetail["ea_hira"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="gmpQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="halalQualityEditDetail" style="font-weight: bold">NILAI MOVEMENT FORKLIFT</label>
                                    <input type="number" class="form-control" placeholder="NILAI HALAL" id="halalQualityEditDetail" name="halalQualityEditDetail" value="<?=$rowEditScoreQualityDetail["movement_forklift"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="halalQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
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
                         <button class="btn btn-primary" name="editDataScoreQualityDetail" type="submit"><i class="fa fa-check"></i> Simpan</button>
                    </div>
                </div>
            <?php
    }    
?>