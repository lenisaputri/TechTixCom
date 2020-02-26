<?php
    include "../config/connection.php";

    function tampilScoreGeneralHrd($con)
    {
        $tampilScoreGeneralHrd="SELECT DISTINCT(tsg.id_operator), tsg.id_score_generalhrd ,tsg.*, tp.id_operator, tp.nik FROM tabel_score_generalhrd tsg, tabel_operator tp
        WHERE tsg.id_operator = tp.id_operator GROUP BY tsg.id_operator";
        $resultTampilScoreGeneralHrd=mysqli_query($con, $tampilScoreGeneralHrd);
        return $resultTampilScoreGeneralHrd;
    }

    function tampilScoreGeneralHrdDate($con)
    {
        $tampilScoreGeneralHrdDate="SELECT DISTINCT(tsg.tanggal_training), tsg.id_score_generalhrd ,tsg.*, tp.id_operator, tp.nik FROM tabel_score_generalhrd tsg, tabel_operator tp
        WHERE tsg.id_operator = tp.id_operator GROUP BY tsg.tanggal_training";
        $resultTampilScoreGeneralHrdDate=mysqli_query($con, $tampilScoreGeneralHrdDate);
        return $resultTampilScoreGeneralHrdDate;
    }

    function tampilScoreGeneralHrdDateEdit($con)
    {
        $tampilScoreGeneralHrdDateEdit="SELECT DISTINCT(tsg.tanggal_training), tsg.id_score_generalhrd ,tsg.*, tp.id_operator, tp.nik FROM tabel_score_generalhrd tsg, tabel_operator tp
        WHERE tsg.id_operator = tp.id_operator GROUP BY tsg.tanggal_training";
        $resultTampilScoreGeneralHrdDateEdit=mysqli_query($con, $tampilScoreGeneralHrdDateEdit);
        $output="";

        if(mysqli_num_rows($resultTampilScoreGeneralHrdDateEdit) > 0){
            while($rowDateGeneralHrdDetail=mysqli_fetch_assoc($resultTampilScoreGeneralHrdDateEdit)){
                if($rowDateGeneralHrdDetail["tanggal_training"]==$tanggal_trainingEdit){
                    $output.="<option value='$rowDateGeneralHrdDetail[tanggal_training]' selected>".$rowDateGeneralHrdDetail["tanggal_training"]."</option>";
                }
                else{
                    $output.="<option value='$rowDateGeneralHrdDetail[tanggal_training]'>$rowDateGeneralHrdDetail[tanggal_training]</option>";
                }
            }
        }
        return $output;
    }

    if (isset($_POST["tambahDataScoreGeneralHrdDetail"]) || isset($_POST["editDataScoreGeneralHrdDetail"]) || isset($_POST["hapusDataScoreGeneralHrdDetail"])){
        if($_GET["module"]=="dataScoreGeneralHrdDetail" && $_GET["act"]=="tambah"){
            $query2 = "INSERT INTO tabel_score_generalhrd_detail (
                id_score_generalhrd,
                coc,
                pkb_cab,
                perperus,
                tanggal_training
            )

            values(  
                '$_POST[nikOperatorDetail]',
                '$_POST[cocDetail]',
                '$_POST[pkbcabDetail]',
                '$_POST[perperusDetail]',
                '$_POST[tanggalTrainingDetail]'
            );";
        
            if(mysqli_query($con, $query2)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        } 
        else if ($_GET["module"]=="dataScoreGeneralHrdDetail" && $_GET["act"]=="edit"){
            $id_scoreGeneralHrdDetailUpdate = $_POST["id_scoreGeneralHrdDetailUpdate"];            
            $query10="UPDATE tabel_score_generalhrd_detail
                set
                coc = '$_POST[cocGeneralHrdEditDetail]',
                pkb_cab = '$_POST[pkbcabGeneralHrdEditDetail]',
                perperus = '$_POST[perperusGeneralHrdEditDetail]',
                tanggal_training = '$_POST[tanggalTrainingGeneralHrdEditDetail]'
                where id_score_generalhrd_detail='$id_scoreGeneralHrdDetailUpdate';";

                if(mysqli_query($con,$query10)){
                    header('location:../module/index.php?module=' . $_GET["module"]);
                }
                else{            
                    echo("Error description: " . mysqli_error($con));
                }
        }
        else if ($_GET["module"]=="dataScoreGeneralHrdDetail" && $_GET["act"]=="hapus"){
            $idnya = $_POST['id_score_generalHrd_detail'];
            $queryDelete = "DELETE FROM tabel_score_generalhrd_detail WHERE id_score_generalHrd_detail='$idnya';";

            if(mysqli_query($con,$queryDelete)){
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }

    if(isset($_POST["editDataScoreGeneralHrdDetail_idScoreGeneralHrd"])){
        $editScoreGeneralHrdDetail = "SELECT tsgd.*, tsg.*, tsg.tanggal_training, tp.id_operator, tp.nik 
            FROM tabel_score_generalhrd_detail tsgd, tabel_score_generalhrd tsg, tabel_operator tp 
            WHERE tsg.id_operator = tp.id_operator
            AND tsgd.id_score_generalHrd = tsg.id_score_generalHrd
            AND tsgd.id_score_generalHrd_detail = $_POST[editDataScoreGeneralHrdDetail_idScoreGeneralHrd]";

        $resultEditScoreGeneralHrdDetail = mysqli_query($con, $editScoreGeneralHrdDetail);
    
        if(mysqli_num_rows($resultEditScoreGeneralHrdDetail) > 0){
            $i = 1;
            while($rowEditScoreGeneralHrdDetail=mysqli_fetch_assoc($resultEditScoreGeneralHrdDetail)){
                ?>
                    <div class ="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <input type="hidden" name="id_scoreGeneralHrdDetailUpdate" value="<?=$rowEditScoreGeneralHrdDetail["id_score_generalHrd_detail"]?>" > 
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikGeneralHrdEditDetail" style="font-weight: bold">NIK OPERATOR</label>
                                    <input type="number" class="form-control" placeholder="NIK OPERATOR" id="nikGeneralHrdEditDetail" name="nikGeneralHrdEditDetail" value="<?=$rowEditScoreGeneralHrdDetail["nik"]?>" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nikGeneralHrdEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="tanggalTrainingDetail" style="font-weight: bold">TANGGAL TRAINING</label>
                                    <input type="text" class="form-control" placeholder="TANGGAL TRAINING" id="tanggalTrainingDetail" name="tanggalTrainingDetail" value="<?=$rowEditScoreGeneralHrdDetail["tanggal_training"]?>" disabled>
                                </div>
                                <div class="col-sm-12">
                                <div id="tanggalTrainingDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="cocGeneralHrdEditDetail" style="font-weight: bold">Code Of Conduct</label>
                                    <input type="number" class="form-control" placeholder="Nilai Code Of Conduct" id="cocGeneralHrdEditDetail" name="cocGeneralHrdEditDetail" value="<?=$rowEditScoreGeneralHrdDetail["coc"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="cocGeneralHrdEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="pkbcabGeneralHrdEditDetail" style="font-weight: bold">PKB, Compensation & Benefit</label>
                                    <input type="number" class="form-control" placeholder="NILAI PKB, Compensation & Benefit" id="pkbcabGeneralHrdEditDetail" name="pkbcabGeneralHrdEditDetail" value="<?=$rowEditScoreGeneralHrdDetail["pkb_cab"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="pkbcabGeneralHrdEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="perperusGeneralHrdEditDetail" style="font-weight: bold">NILAI Peraturan Perusahaan</label>
                                    <input type="number" class="form-control" placeholder="NILAI Peraturan Perusahaan" id="perperusGeneralHrdEditDetail" name="perperusGeneralHrdEditDetail" value="<?=$rowEditScoreGeneralHrdDetail["perperus"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="perperusGeneralHrdEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                    <button class="btn btn-primary" name="editDataScoreGeneralHrdDetail" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        <?php
    }    
?>