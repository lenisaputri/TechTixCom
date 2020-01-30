<?php
include "../config/connection.php";

function tampilScoreQuality($con)
{
    $tampilScoreQuality="SELECT DISTINCT(tss.id_operator), tss.id_score_quality ,tss.*, tp.id_operator, tp.nik FROM tabel_score_quality tss, tabel_operator tp
    WHERE tss.id_operator = tp.id_operator GROUP BY tss.id_operator";
    $resultTampilScoreQuality=mysqli_query($con, $tampilScoreQuality);
    return $resultTampilScoreQuality;
}

function tampilScoreQualityDate($con)
{
    $tampilScoreQualityDate="SELECT DISTINCT(tss.tanggal_training), tss.id_score_quality ,tss.*, tp.id_operator, tp.nik FROM tabel_score_quality tss, tabel_operator tp
    WHERE tss.id_operator = tp.id_operator GROUP BY tss.tanggal_training";
    $resultTampilScoreQualityDate=mysqli_query($con, $tampilScoreQualityDate);
    return $resultTampilScoreQualityDate;
}

function tampilScoreQualityDateEdit($con)
{
    $tampilScoreQualityDateEdit="SELECT DISTINCT(tss.tanggal_training), tss.id_score_quality ,tss.*, tp.id_operator, tp.nik FROM tabel_score_quality tss, tabel_operator tp
    WHERE tss.id_operator = tp.id_operator GROUP BY tss.tanggal_training";
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



if (isset($_POST["tambahDataScoreQualityDetail"]) || isset($_POST["editDataScoreQualityDetail"]) || isset($_POST["hapusDataScoreQualityDetail"])){

    if($_GET["module"]=="dataScoreQualityDetail" && $_GET["act"]=="tambah"){

       $query2 = "INSERT INTO tabel_score_quality_detail (
         id_score_quality,
         smk3,
         ea_hira,
         movement_forklift,
         confined_space,
         loto,
         apd,
         bbs,
         fire_fighting,
         wah,
         environment,
         p3k,
         tanggal_training
    )

     values
    (  '$_POST[nikOperatorDetail]',
        '$_POST[smk3Detail]',
        '$_POST[eaHiraDetail]',
        '$_POST[movForkliftDetail]',
        '$_POST[conSpaceDetail]',
        '$_POST[lotoDetail]',
        '$_POST[apdDetail]',
        '$_POST[bbsDetail]',
        '$_POST[fireFightingDetail]',
        '$_POST[wahDetail]',
        '$_POST[environmentDetail]',
        '$_POST[p3kDetail]',
        '$_POST[tanggalTrainingDetail]'
    );";
    
        if(mysqli_query($con, $query2)){ 
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
        else{            
            echo("Error description: " . mysqli_error($con));
        }
    } else if ($_GET["module"]=="dataScoreQualityDetail" && $_GET["act"]=="edit"){
        $id_scoreQualityDetailUpdate = $_POST["id_scoreQualityDetailUpdate"];
        
        $query10="UPDATE tabel_score_quality_detail
            set
            smk3 = '$_POST[smk3QualityEditDetail]',
            ea_hira = '$_POST[eaHiraQualityEditDetail]',
            movement_forklift = '$_POST[movForkliftQualityEditDetail]',
            confined_space = '$_POST[conSpaceQualityEditDetail]',
            loto = '$_POST[lotoQualityEditDetail]',
            apd = '$_POST[apdQualityEditDetail]',
            bbs = '$_POST[bbsQualityEditDetail]',
            fire_fighting = '$_POST[fireFightingQualityEditDetail]',
            wah = '$_POST[wahQualityEditDetail]',
            environment = '$_POST[environmentQualityEditDetail]',
            p3k = '$_POST[p3kQualityEditDetail]',
            tanggal_training = '$_POST[tanggalTrainingQualityEditDetail]'
            where id_score_quality_detail='$id_scoreQualityDetailUpdate';";

            if(mysqli_query($con,$query10)){

                header('location:../module/index.php?module=' . $_GET["module"]);
            }

            else{            
                echo("Error description: " . mysqli_error($con));
            }
    }else if ($_GET["module"]=="dataScoreQualityDetail" && $_GET["act"]=="hapus"){
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

// MODAL EDIT OPERATOR
if(isset($_POST["editDataScoreQualityDetail_idScoreQuality"])){
    $editScoreQualityDetail = "SELECT tssd.*, tss.*, tp.id_operator, tp.nik 
    FROM tabel_score_quality_detail tssd, tabel_score_quality tss, tabel_operator tp 
    WHERE tss.id_operator = tp.id_operator
    AND tssd.id_score_quality = tss.id_score_quality
    AND tssd.id_score_quality_detail = $_POST[editDataScorequalityDetail_idScoreQuality]";

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
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="smk3QualityEditDetail" style="font-weight: bold">SMK3</label>
                                <input type="number" class="form-control" placeholder="NILAI SMK3" id="smk3QualityEditDetail" name="smk3QualityEditDetail" value="<?=$rowEditScoreQualityDetail["smk3"]?>" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="smk3QualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="eaHiraQualityEditDetail" style="font-weight: bold">EA-HIRA</label>
                                    <input type="number" class="form-control" placeholder="NILAI EA-HIRA" id="eaHiraQualityEditDetail" name="eaHiraQualityEditDetail" value="<?=$rowEditScoreQualityDetail["ea_hira"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="eaHiraQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="movForkliftQualityEditDetail" style="font-weight: bold">NILAI MOVEMENT FORKLIFT</label>
                                    <input type="number" class="form-control" placeholder="NILAI MOVEMENT FORKLIFT" id="movForkliftQualityEditDetail" name="movForkliftQualityEditDetail" value="<?=$rowEditScoreQualityDetail["movement_forklift"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="movForkliftQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="conSpaceQualityEditDetail" style="font-weight: bold">NILAI CONFINED SPACE</label>
                                    <input type="number" class="form-control" placeholder="NILAI CONFINED SPACE" id="conSpaceQualityEditDetail" name="conSpaceQualityEditDetail" value="<?=$rowEditScoreQualityDetail["confined_space"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="conSpaceQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="lotoQualityEditDetail" style="font-weight: bold">NILAI LOTO</label>
                                    <input type="number" class="form-control" placeholder="NILAI LOTO" id="lotoQualityEditDetail" name="lotoQualityEditDetail" value="<?=$rowEditScoreQualityDetail["loto"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="lotoQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="apdQualityEditDetail" style="font-weight: bold">NILAI APD</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI APD" id="apdQualityEditDetail" name="apdQualityEditDetail" value="<?=$rowEditScoreQualityDetail["apd"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="apdQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="bbsQualityEditDetail" style="font-weight: bold">NILAI BBS</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI BBS" id="bbsQualityEditDetail" name="bbsQualityEditDetail" value="<?=$rowEditScoreQualityDetail["bbs"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="bbsQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="fireFightingQualityEditDetail" style="font-weight: bold">NILAI FIRE FIGHTING</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI FIRE FIGHTING" id="fireFightingQualityEditDetail" name="fireFightingQualityEditDetail" value="<?=$rowEditScoreQualityDetail["fire_fighting"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="fireFightingQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="wahQualityEditDetail" style="font-weight: bold">NILAI WAH</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI WAH" id="wahQualityEditDetail" name="wahQualityEditDetail" value="<?=$rowEditScoreQualityDetail["wah"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="wahQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="environmentQualityEditDetail" style="font-weight: bold">NILAI ENVIRONMENT</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI ENVIRONMENT" id="environmentQualityEditDetail" name="environmentQualityEditDetail" value="<?=$rowEditScoreQualityDetail["environment"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="environmentQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="p3kQualityEditDetail" style="font-weight: bold">NILAI P3K</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI P3K" id="p3kQualityEditDetail" name="p3kQualityEditDetail" value="<?=$rowEditScoreQualityDetail["p3k"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="p3kQualityEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
            <?php
  }
    
?>