<?php
    include "../config/connection.php";

    function tampilScoreSafety($con)
    {
        $tampilScoreSafety="SELECT tss.id_operator, tss.id_score_safety ,tss.*, tp.id_operator, tp.nik FROM tabel_score_safety tss, tabel_operator tp
        WHERE tss.id_operator = tp.id_operator";
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

    if (isset($_POST["tambahDataScoreSafetyDetail"]) || isset($_POST["editDataScoreSafetyDetail"]) || isset($_POST["hapusDataScoreSafetyDetail"])){
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
                p3k
            )

            values(  
                '$_POST[nikOperatorDetail]',
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
                '$_POST[p3kDetail]'
            );";
        
            if(mysqli_query($con, $query2)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        } 
        else if ($_GET["module"]=="dataScoreSafetyDetail" && $_GET["act"]=="edit"){
            $id_scoreSafetyDetailUpdate = $_POST["id_scoreSafetyDetailUpdate"];            
            $query10="UPDATE tabel_score_safety_detail
                set
                smk3 = '$_POST[smk3SafetyEditDetail]',
                ea_hira = '$_POST[eaHiraSafetyEditDetail]',
                movement_forklift = '$_POST[movForkliftSafetyEditDetail]',
                confined_space = '$_POST[conSpaceSafetyEditDetail]',
                loto = '$_POST[lotoSafetyEditDetail]',
                apd = '$_POST[apdSafetyEditDetail]',
                bbs = '$_POST[bbsSafetyEditDetail]',
                fire_fighting = '$_POST[fireFightingSafetyEditDetail]',
                wah = '$_POST[wahSafetyEditDetail]',
                environment = '$_POST[environmentSafetyEditDetail]',
                p3k = '$_POST[p3kSafetyEditDetail]'
                where id_score_safety_detail='$id_scoreSafetyDetailUpdate';";

                if(mysqli_query($con,$query10)){
                    header('location:../module/index.php?module=' . $_GET["module"]);
                }
                else{            
                    echo("Error description: " . mysqli_error($con));
                }
        }
        else if ($_GET["module"]=="dataScoreSafetyDetail" && $_GET["act"]=="hapus"){
            $idnya = $_POST['id_score_safety_detail'];
            $queryDelete = "DELETE FROM tabel_score_safety_detail WHERE id_score_safety_detail='$idnya';";

            if(mysqli_query($con,$queryDelete)){
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }

    if(isset($_POST["editDataScoreSafetyDetail_idScoreSafety"])){
        $editScoreSafetyDetail = "SELECT tssd.*, tss.*, tss.tanggal_training, tp.id_operator, tp.nik 
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
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="tanggalTrainingDetail" style="font-weight: bold">TANGGAL TRAINING</label>
                                    <input type="text" class="form-control" placeholder="TANGGAL TRAINING" id="tanggalTrainingDetail" name="tanggalTrainingDetail" value="<?=$rowEditScoreSafetyDetail["tanggal_training"]?>" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <div id="tanggalTrainingDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="smk3SafetyEditDetail" style="font-weight: bold">SMK3</label>
                                    <input type="number" class="form-control" placeholder="NILAI SMK3" id="smk3SafetyEditDetail" name="smk3SafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["smk3"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="smk3SafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="eaHiraSafetyEditDetail" style="font-weight: bold">EA-HIRA</label>
                                    <input type="number" class="form-control" placeholder="NILAI EA-HIRA" id="eaHiraSafetyEditDetail" name="eaHiraSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["ea_hira"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="eaHiraSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="movForkliftSafetyEditDetail" style="font-weight: bold">NILAI MOVEMENT FORKLIFT</label>
                                    <input type="number" class="form-control" placeholder="NILAI MOVEMENT FORKLIFT" id="movForkliftSafetyEditDetail" name="movForkliftSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["movement_forklift"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="movForkliftSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="conSpaceSafetyEditDetail" style="font-weight: bold">NILAI CONFINED SPACE</label>
                                    <input type="number" class="form-control" placeholder="NILAI CONFINED SPACE" id="conSpaceSafetyEditDetail" name="conSpaceSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["confined_space"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="conSpaceSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="lotoSafetyEditDetail" style="font-weight: bold">NILAI LOTO</label>
                                    <input type="number" class="form-control" placeholder="NILAI LOTO" id="lotoSafetyEditDetail" name="lotoSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["loto"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="lotoSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="apdSafetyEditDetail" style="font-weight: bold">NILAI APD</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI APD" id="apdSafetyEditDetail" name="apdSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["apd"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="apdSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="bbsSafetyEditDetail" style="font-weight: bold">NILAI BBS</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI BBS" id="bbsSafetyEditDetail" name="bbsSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["bbs"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="bbsSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="fireFightingSafetyEditDetail" style="font-weight: bold">NILAI FIRE FIGHTING</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI FIRE FIGHTING" id="fireFightingSafetyEditDetail" name="fireFightingSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["fire_fighting"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="fireFightingSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="wahSafetyEditDetail" style="font-weight: bold">NILAI WAH</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI WAH" id="wahSafetyEditDetail" name="wahSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["wah"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="wahSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="environmentSafetyEditDetail" style="font-weight: bold">NILAI ENVIRONMENT</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI ENVIRONMENT" id="environmentSafetyEditDetail" name="environmentSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["environment"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="environmentSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="p3kSafetyEditDetail" style="font-weight: bold">NILAI P3K</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI P3K" id="p3kSafetyEditDetail" name="p3kSafetyEditDetail" value="<?=$rowEditScoreSafetyDetail["p3k"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="p3kSafetyEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                </div>
            <?php
    }    
?>