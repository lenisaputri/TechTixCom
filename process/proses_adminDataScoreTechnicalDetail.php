<?php
    include "../config/connection.php";

    function tampilScoreTechnical($con)
    {
        $tampilScoreTechnical="SELECT DISTINCT(tst.id_operator), tst.id_score_technical ,tst.*, tp.id_operator, tp.nik FROM tabel_score_technical tst, tabel_operator tp
        WHERE tst.id_operator = tp.id_operator GROUP BY tst.id_operator";
        $resultTampilScoreTechnical=mysqli_query($con, $tampilScoreTechnical);
        return $resultTampilScoreTechnical;
    }

    function tampilScoreTechnicalDate($con)
    {
        $tampilScoreTechnicalDate="SELECT DISTINCT(tst.tanggal_training), tst.id_score_technical ,tst.*, tp.id_operator, tp.nik FROM tabel_score_technical tst, tabel_operator tp
        WHERE tst.id_operator = tp.id_operator GROUP BY tst.tanggal_training";
        $resultTampilScoreTechnicalDate=mysqli_query($con, $tampilScoreTechnicalDate);
        return $resultTampilScoreTechnicalDate;
    }

    function tampilScoreTechnicalDateEdit($con)
    {
        $tampilScoreTechnicalDateEdit="SELECT DISTINCT(tst.tanggal_training), tst.id_score_technical ,tst.*, tp.id_operator, tp.nik FROM tabel_score_technical tst, tabel_operator tp
        WHERE tst.id_operator = tp.id_operator GROUP BY tst.tanggal_training";
        $resultTampilScoreTechnicalDateEdit=mysqli_query($con, $tampilScoreTechnicalDateEdit);
        $output="";

        if(mysqli_num_rows($resultTampilScoreTechnicalDateEdit) > 0){
            while($rowDateTechnicalDetail=mysqli_fetch_assoc($resultTampilScoreTechnicalDateEdit)){
                if($rowDateTechnicalDetail["tanggal_training"]==$tanggal_trainingEdit){
                    $output.="<option value='$rowDateTechnicalDetail[tanggal_training]' selected>".$rowDateTechnicalDetail["tanggal_training"]."</option>";
                }
                else{
                    $output.="<option value='$rowDateTechnicalDetail[tanggal_training]'>$rowDateTechnicalDetail[tanggal_training]</option>";
                }
            }
        }
        return $output;
    }

    if (isset($_POST["tambahDataScoreTechnicalDetail"]) || isset($_POST["editDataScoreTechnicalDetail"]) || isset($_POST["hapusDataScoreTechnicalDetail"])){
        if($_GET["module"]=="dataScoreTechnicalDetail" && $_GET["act"]=="tambah"){
            $query2 = "INSERT INTO tabel_score_technical_detail (
                id_score_technical,
                sftp,
                equipment,
                operational,
                mainten,
                trouble
            )

            values(  
                '$_POST[nikOperatorDetail]',
                '$_POST[sftpDetail]',
                '$_POST[equipmentDetail]',
                '$_POST[operationalDetail]',
                '$_POST[maintenDetail]',
                '$_POST[troubleDetail]'
            );";
        
            if(mysqli_query($con, $query2)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        } 
        else if ($_GET["module"]=="dataScoreTechnicalDetail" && $_GET["act"]=="edit"){
            $id_scoreTechnicalDetailUpdate = $_POST["id_scoreTechnicalDetailUpdate"];            
            $query10="UPDATE tabel_score_technical_detail
                set
                sftp = '$_POST[sftpTechnicalEditDetail]',
                equipment = '$_POST[equipmentTechnicalEditDetail]',
                operational = '$_POST[operationalTechnicalEditDetail]',
                mainten = '$_POST[maintenTechnicalEditDetail]',
                trouble = '$_POST[troubleTechnicalEditDetail]'
                where id_score_technical_detail='$id_scoreTechnicalDetailUpdate';";

                if(mysqli_query($con,$query10)){
                    header('location:../module/index.php?module=' . $_GET["module"]);
                }
                else{            
                    echo("Error description: " . mysqli_error($con));
                }
        }
        else if ($_GET["module"]=="dataScoreTechnicalDetail" && $_GET["act"]=="hapus"){
            $idnya = $_POST['id_score_technical_detail'];
            $queryDelete = "DELETE FROM tabel_score_technical_detail WHERE id_score_technical_detail='$idnya';";

            if(mysqli_query($con,$queryDelete)){
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }

    if(isset($_POST["editDataScoreTechnicalDetail_idScoreTechnical"])){
        $editScoreTechnicalDetail = "SELECT tstd.*, tst.*, tst.tanggal_training, tp.id_operator, tp.nik 
            FROM tabel_score_technical_detail tstd, tabel_score_technical tst, tabel_operator tp 
            WHERE tst.id_operator = tp.id_operator
            AND tstd.id_score_technical = tst.id_score_technical
            AND tstd.id_score_technical_detail = $_POST[editDataScoreTechnicalDetail_idScoreTechnical]";

        $resultEditScoreTechnicalDetail = mysqli_query($con, $editScoreTechnicalDetail);
    
        if(mysqli_num_rows($resultEditScoreTechnicalDetail) > 0){
            $i = 1;
            while($rowEditScoreTechnicalDetail=mysqli_fetch_assoc($resultEditScoreTechnicalDetail)){
                ?>
                    <div class ="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <input type="hidden" name="id_scoreTechnicalDetailUpdate" value="<?=$rowEditScoreTechnicalDetail["id_score_technical_detail"]?>" > 
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikTechnicalEditDetail" style="font-weight: bold">NIK OPERATOR</label>
                                    <input type="number" class="form-control" placeholder="NIK OPERATOR" id="nikTechnicalEditDetail" name="nikTechnicalEditDetail" value="<?=$rowEditScoreTechnicalDetail["nik"]?>" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nikTechnicalEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="tanggalTrainingDetail" style="font-weight: bold">TANGGAL TRAINING</label>
                                    <input type="text" class="form-control" placeholder="TANGGAL TRAINING" id="tanggalTrainingDetail" name="tanggalTrainingDetail" value="<?=$rowEditScoreTechnicalDetail["tanggal_training"]?>" disabled>
                                </div>
                                <div class="col-sm-12">
                                <div id="tanggalTrainingDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="sftpTechnicalEditDetail" style="font-weight: bold">SAFETY PROCEDURE</label>
                                    <input type="number" class="form-control" placeholder="NILAI SAFETY PROCEDURE" id="sftpTechnicalEditDetail" name="sftpTechnicalEditDetail" value="<?=$rowEditScoreTechnicalDetail["sftp"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="sftpTechnicalEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="equipmentTechnicalEditDetail" style="font-weight: bold">EQUIPMENT LIST</label>
                                    <input type="number" class="form-control" placeholder="NILAI EQUIPMENT LIST" id="equipmentTechnicalEditDetail" name="equipmentTechnicalEditDetail" value="<?=$rowEditScoreTechnicalDetail["equipment"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="equipmentTechnicalEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="operationalTechnicalEditDetail" style="font-weight: bold">OPERASIONAL PARAMETER</label>
                                    <input type="number" class="form-control" placeholder="NILAI OPERASIONAL PARAMETER" id="operationalTechnicalEditDetail" name="operationalTechnicalEditDetail" value="<?=$rowEditScoreTechnicalDetail["operational"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="operationalTechnicalEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="maintenTechnicalEditDetail" style="font-weight: bold">MAINTENANCE PARAMETER</label>
                                    <input type="number" class="form-control" placeholder="NILAI MAINTENANCE PARAMETER" id="maintenTechnicalEditDetail" name="maintenTechnicalEditDetail" value="<?=$rowEditScoreTechnicalDetail["mainten"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="maintenTechnicalEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="troubleTechnicalEditDetail" style="font-weight: bold">TROUBLE SHOOTING</label>
                                    <input type="number" class="form-control" placeholder="NILAI TROUBLE SHOOTING" id="troubleTechnicalEditDetail" name="troubleTechnicalEditDetail" value="<?=$rowEditScoreTechnicalDetail["trouble"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="troubleTechnicalEditDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                    <button class="btn btn-primary" name="editDataScoreTechnicalDetail" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        <?php
    }    
?>