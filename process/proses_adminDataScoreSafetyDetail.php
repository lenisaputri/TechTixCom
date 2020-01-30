<?php
include "../config/connection.php";

function tampilScoreSafety($con)
{
    $tampilScoreSafety="SELECT DISTINCT(tss.id_operator), tss.id_score_safety ,tss.*, tp.id_operator, tp.nik FROM tabel_score_safety tss, tabel_operator tp
    WHERE tss.id_operator = tp.id_operator GROUP BY tss.id_operator";
    $resultTampilScoreSafety=mysqli_query($con, $tampilScoreSafety);
    return $resultTampilScoreSafety;
}

function tampilScoreSafetyDate($con)
{
    $tampilScoreSafetyDate="SELECT DISTINCT(tss.tanggal_training), tss.id_score_safety ,tss.*, tp.id_operator, tp.nik FROM tabel_score_safety tss, tabel_operator tp
    WHERE tss.id_operator = tp.id_operator GROUP BY tss.tanggal_training";
    $resultTampilScoreSafetyDate=mysqli_query($con, $tampilScoreSafetyDate);
    return $resultTampilScoreSafetyDate;
}

function tampilScoreSafetyDateEdit($con)
{
    $tampilScoreSafetyDateEdit="SELECT DISTINCT(tss.tanggal_training), tss.id_score_safety ,tss.*, tp.id_operator, tp.nik FROM tabel_score_safety tss, tabel_operator tp
    WHERE tss.id_operator = tp.id_operator GROUP BY tss.tanggal_training";
    $resultTampilScoreSafetyDateEdit=mysqli_query($con, $tampilScoreSafetyDateEdit);

     $output="";

    if(mysqli_num_rows($resultTampilScoreSafetyDateEdit) > 0){
        while($rowDateSafetyDetail=mysqli_fetch_assoc($resultTampilScoreSafetyDateEdit)){
            if($rowDateSafetyDetail["tanggal_training"]==$tanggal_trainingEdit){
                $output.="<option value='$rowDateSafetyDetail[tanggal_training]' selected>".$rowDateSafetyDetail["tanggal_training"]."</option>";
            }

            else{
                $output.="<option value='$rowDateSafetyDetail[tanggal_training]'>$rowDateSafetyDetail[tanggal_training]</option>";
            }
        }
    }

    return $output;
}



if (isset($_POST["tambahDataScoreSafetyDetail"]) || isset($_POST["editDataScoreSafetyDetail"])){

    if($_GET["module"]=="dataScoreSafetyDetail" && $_GET["act"]=="tambah"){

       $query2 = "INSERT INTO tabel_score_safety_detail (
         id_score_safety,
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
    } else if ($_GET["module"]=="dataScoreSafetyDetail" && $_GET["act"]=="edit"){
        $id_scoreSafetyUpdate = $_POST["id_scoreSafetyUpdate"];
        
        $dateSafetyEdit =  date('Y-m-d', strtotime($_POST[dateSafetyEdit]));

        $query10="UPDATE tabel_score_safety
            set
            poin = '$_POST[poinSafetyEdit]',
            nilai = '$_POST[nilaiSafetyEdit]',
            tanggal_training = '$dateSafetyEdit'
            where id_score_safety='$id_scoreSafetyUpdate';";

            if(mysqli_query($con,$query10)){

                header('location:../module/index.php?module=' . $_GET["module"]);
            }

            else{            
                echo("Error description: " . mysqli_error($con));
            }
    }
}

// MODAL EDIT OPERATOR
if(isset($_POST["editDataScoreSafetyDetail_idScoreSafety"])){
    $editScoreSafetyDetail = "SELECT tssd.*, tss.*, tp.id_operator, tp.nik 
    FROM tabel_score_safety_detail tssd, tabel_score_safety tss, tabel_operator tp 
    WHERE tss.id_operator = tp.id_operator
    AND tssd.id_score_safety = tss.id_score_safety
    AND tssd.id_score_safety_detail = $_POST[editDataScoreSafetyDetail_idScoreSafety]";

    $resultEditScoreSafetyDetail = mysqli_query($con, $editScoreSafetyDetail);
  
    if(mysqli_num_rows($resultEditScoreSafetyDetail) > 0){
        $i = 1;
        while($rowEditScoreSafetyDetail=mysqli_fetch_assoc($resultEditScoreSafetyDetail)){
            ?>
            <div class ="row">
                    <div class="col-sm-6">
                    <div class="form-group row">
                    <input type="hidden" name="id_scoreSafetyDetailUpdate" value="<?=$rowEditScoreSafetyDetail["id_score_safety_detail"]?>" > 
                            <div class="col-sm-12">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikSafetyEditDetail" style="font-weight: bold">NIK OPERATOR</label>
                                <input type="number" class="form-control" placeholder="NIK OPERATOR" id="nikSafetyEditDetail" name="nikSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["nik"]?>" disabled>
                            </div>
                            <div class="col-sm-12">
                                <div id="nikSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class='form-group row'>
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <label class="col-sm-6 small d-flex flex-column justify-content-center" for="tanggalTrainingSafetyEditDetail" style="font-weight: bold">JABATAN</label>
                        <select class="custom-select" name="jabatanAdminAdmin2"><?=tampilScoreSafetyDateEdit($con,$rowEditScoreSafetyDetail['tanggal_training'])?></select>
                    </div>
                    <div class="col-sm-12">
                        <div id="jabatanAdminAdminBlank2" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                    <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="smk3Detail" style="font-weight: bold">SMK3</label>
                                <input type="number" class="form-control" placeholder="NILAI SMK3" id="smk3Detail" name="smk3Detail" value="<?=$rowEditScoreSafetyDetail["smk3"]?>" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="smk3DetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="eaHiraDetail" style="font-weight: bold">EA-HIRA</label>
                                    <input type="number" class="form-control" placeholder="NILAI EA-HIRA" id="eaHiraDetail" name="eaHiraDetail" value="<?=$rowEditScoreSafetyDetail["ea_hira"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="ea-hiraDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="movForkliftDetail" style="font-weight: bold">NILAI MOVEMENT FORKLIFT</label>
                                    <input type="number" class="form-control" placeholder="NILAI MOVEMENT FORKLIFT" id="movForkliftDetail" name="movForkliftDetail" value="<?=$rowEditScoreSafetyDetail["movement_forklift"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="movForkliftDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="conSpaceDetail" style="font-weight: bold">NILAI CONFINED SPACE</label>
                                    <input type="number" class="form-control" placeholder="NILAI CONFINED SPACE" id="conSpaceDetail" name="conSpaceDetail" value="<?=$rowEditScoreSafetyDetail["confined_space"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="conSpaceDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="lotoDetail" style="font-weight: bold">NILAI LOTO</label>
                                    <input type="number" class="form-control" placeholder="NILAI LOTO" id="lotoDetail" name="lotoDetail" value="<?=$rowEditScoreSafetyDetail["loto"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="lotoDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-6">
                    <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="apdDetail" style="font-weight: bold">NILAI APD</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI APD" id="apdDetail" name="apdDetail" value="<?=$rowEditScoreSafetyDetail["apd"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="apdDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="bbsDetail" style="font-weight: bold">NILAI BBS</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI BBS" id="bbsDetail" name="bbsDetail" value="<?=$rowEditScoreSafetyDetail["bbs"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="bbsDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="fireFightingDetail" style="font-weight: bold">NILAI FIRE FIGHTING</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI FIRE FIGHTING" id="fireFightingDetail" name="fireFightingDetail" value="<?=$rowEditScoreSafetyDetail["fire_fighting"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="fireFightingDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="wahDetail" style="font-weight: bold">NILAI WAH</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI WAH" id="wahDetail" name="wahDetail" value="<?=$rowEditScoreSafetyDetail["wah"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="wahDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="environmentDetail" style="font-weight: bold">NILAI ENVIRONMENT</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI ENVIRONMENT" id="environmentDetail" name="environmentDetail" value="<?=$rowEditScoreSafetyDetail["environment"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="environmentDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="p3kDetail" style="font-weight: bold">NILAI P3K</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI P3K" id="p3kDetail" name="p3kDetail" value="<?=$rowEditScoreSafetyDetail["p3k"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="p3kDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                        <button class="btn btn-primary" name="editDataScoreSafetyDetail" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            <?php
  }
    
?>