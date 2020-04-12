<?php
    include "../config/connection.php";

    function tampilOperator($con)
    {
        $tampilOperator="select * from tabel_operator";
        $resultTampilOperator=mysqli_query($con, $tampilOperator);
        return $resultTampilOperator;
    }

    if (isset($_POST["tambahDataScoreTechnicalPraktek"]) || isset($_POST["editDataScoreTechnicalPraktek"]) || isset($_POST["hapusDataScoreTechnicalPraktek"])){
        if($_GET["module"]=="technicalNilaiPraktek" && $_GET["act"]=="tambah"){
            $dateTechnicalPraktek =  date('Y-m-d', strtotime($_POST[dateTechnicalPraktek]));
            $sftpPraktek = $_POST[sftpPraktek];
            $equipmentPraktek = $_POST[equipmentPraktek];
            $operationalPraktek = $_POST[operationalPraktek];
            $maintenPraktek = $_POST[maintenPraktek];
            $troublePraktek = $_POST[troublePraktek];

            $jumlah = $sftpPraktek + $equipmentPraktek + $operationalPraktek + $maintenPraktek + $troublePraktek;
            $rata2 = $jumlah / 5;

            $query2 = "INSERT INTO tabel_score_technical_praktek (
                id_operator,
                kategori_technical,
                sftp,
                equipment,
                operational,
                mainten,
                trouble,
                total,
                ratarata,
                tanggal_praktek
            )

            values(  
                '$_POST[nikTechnicalPraktek]',
                '$_POST[kategoriTechnicalPraktek]',
                '$sftpPraktek',
                '$equipmentPraktek',
                '$operationalPraktek',
                '$maintenPraktek',
                '$troublePraktek',
                '$jumlah',
                '$rata2',
                '$dateTechnicalPraktek'
            );";
        
            if(mysqli_query($con, $query2)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        } 

        else if ($_GET["module"]=="technicalNilaiPraktek" && $_GET["act"]=="edit"){
            $id_scoreTechnicalPraktekUpdate = $_POST["id_scoreTechnicalPraktekUpdate"]; 
            
            $sftpTechnicalEditPraktek = $_POST[sftpTechnicalEditPraktek];
            $equipmentTechnicalEditPraktek= $_POST[equipmentTechnicalEditPraktek];
            $operationalTechnicalEditPraktek = $_POST[operationalTechnicalEditPraktek];
            $maintenTechnicalEditPraktek = $_POST[maintenTechnicalEditPraktek];
            $troubleTechnicalEditPraktek = $_POST[troubleTechnicalEditPraktek];

            $jumlahEdit = $sftpTechnicalEditPraktek + $equipmentTechnicalEditPraktek + $operationalTechnicalEditPraktek + $maintenTechnicalEditPraktek + $troubleTechnicalEditPraktek;
            $rata2Edit = $jumlahEdit / 5;

            $dateTechnicalPraktekEdit =  date('Y-m-d', strtotime($_POST[dateTechnicalPraktekEdit]));

            $query10="UPDATE tabel_score_technical_praktek
                set
                kategori_technical = '$_POST[kategoriTechnicalEditPraktek]',
                sftp = '$sftpTechnicalEditPraktek' ,
                equipment = '$equipmentTechnicalEditPraktek',
                operational = '$maintenTechnicalEditPraktek',
                mainten = '$maintenTechnicalEditPraktek',
                trouble = '$troubleTechnicalEditPraktek' ,
                total = '$jumlahEdit',
                ratarata = '$rata2Edit',
                tanggal_praktek = '$dateTechnicalPraktekEdit'
                where id_score_technical_praktek='$id_scoreTechnicalPraktekUpdate';";

                if(mysqli_query($con,$query10)){
                    header('location:../module/index.php?module=' . $_GET["module"]);
                }
                else{            
                    echo("Error description: " . mysqli_error($con));
                }
        }

        else if ($_GET["module"]=="technicalNilaiPraktek" && $_GET["act"]=="hapus"){
            $idnya = $_POST['id_score_technical_praktek'];
            $queryDelete = "DELETE FROM tabel_score_technical_praktek WHERE id_score_technical_praktek='$idnya';";

            if(mysqli_query($con,$queryDelete)){
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }

    if(isset($_POST["infoDataScoreTechnicalPraktek_idScoreTechnicalPraktek"])){
        $infoScoreTechnicalPraktek = "SELECT tstp.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_technical_praktek tstp, tabel_operator tp , tabel_jabatan tj 
            WHERE tstp.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tstp.id_score_technical_praktek = $_POST[infoDataScoreTechnicalPraktek_idScoreTechnicalPraktek]";
        $resultInfoScoreTechnicalPraktek = mysqli_query($con, $infoScoreTechnicalPraktek);
    
        if(mysqli_num_rows($resultInfoScoreTechnicalPraktek) > 0){
            $rowInfoScoreTechnicalPraktek=mysqli_fetch_assoc($resultInfoScoreTechnicalPraktek);
                ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>NAMA : <?php echo $rowInfoScoreTechnicalPraktek["nama_lengkap"]; ?></p>
                            <p>NIK : <?php echo $rowInfoScoreTechnicalPraktek["nik"]; ?></p>
                            <p>JABATAN : <?php echo $rowInfoScoreTechnicalPraktek["nama_jabatan"]; ?></p>          
                        </div>
                        <div class="col-sm-6">
                            <p>JUMLAH : <?php echo $rowInfoScoreTechnicalPraktek["total"]; ?></p>
                            <p>RATA - RATA : <?php echo $rowInfoScoreTechnicalPraktek["ratarata"]; ?></p>
                        </div>
                    </div>
                    <p class="row d-flex justify-content-end">TANGGAL PRAKTEK : <?php echo $rowInfoScoreTechnicalPraktek["tanggal_praktek"]; ?></p>
                    <hr>
                <?php
                    $infoScoreTechnicalPraktekDetail = "SELECT tstp.*, tp.id_operator, tp.nik
                        FROM tabel_score_technical_praktek tstp, tabel_operator tp 
                        WHERE tstp.id_operator = tp.id_operator 
                        AND tstp.id_score_technical_praktek = $_POST[infoDataScoreTechnicalPraktek_idScoreTechnicalPraktek]";
                    
                    $resultInfoScoreTechnicalPraktekDetail = mysqli_query($con, $infoScoreTechnicalPraktekDetail);
                    if(mysqli_num_rows($resultInfoScoreTechnicalPraktekDetail) > 0){
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: .8rem;">
                                            <th>No.</th>
                                            <th>Safety Procedure</th>
                                            <th>Equipment List</th>
                                            <th>Operasional Parameter</th>
                                            <th>Maintenance Parameter</th>
                                            <th>Trouble Shooting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $index=1;
                                            while($row1 = mysqli_fetch_assoc($resultInfoScoreTechnicalPraktekDetail)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $index;?></td>
                                                        <td><?php echo $row1["sftp"];?></td>
                                                        <td><?php echo $row1["equipment"];?></td>
                                                        <td><?php echo $row1["operational"];?></td>
                                                        <td><?php echo $row1["mainten"];?></td>
                                                        <td><?php echo $row1["trouble"];?></td>
                                                    </tr>
                                            <?php
                                            $index++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php
                    } 
                    else {
                        ?>
                            <div class='text-center col-md-12'>
                                <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                                <p class='text-muted'>Data Nilai Masih Kosong</p>
                            </div>
                        <?php
                    }
                ?>
            <?php
        } 
        else {
            ?> 
                <div class="text-center text-muted">Data Tidak Ditemukan</div>
            <?php
        }
        ?>                
            <div class="form-group">
                <div class="modal-footer border-0">
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                </div>
            </div>
        <?php
    }  

    if(isset($_POST["editDataScoreTechnicalPraktek_idScoreTechnicalPraktek"])){
        $editScoreTechnicalPraktek = "SELECT tstp.*, tp.id_operator, tp.nik 
            FROM tabel_score_technical_praktek tstp, tabel_operator tp 
            WHERE tstp.id_operator = tp.id_operator
            AND tstp.id_score_technical_praktek = $_POST[editDataScoreTechnicalPraktek_idScoreTechnicalPraktek]";

        $resultEditScoreTechnicalPraktek = mysqli_query($con, $editScoreTechnicalPraktek);
    
        if(mysqli_num_rows($resultEditScoreTechnicalPraktek) > 0){
            $i = 1;
            while($rowEditScoreTechnicalPraktek = mysqli_fetch_assoc($resultEditScoreTechnicalPraktek)){
                ?>
                    <div class ="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <input type="hidden" name="id_scoreTechnicalPraktekUpdate" value="<?=$rowEditScoreTechnicalPraktek["id_score_technical_praktek"]?>" > 
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikTechnicalEditPraktek" style="font-weight: bold">NIK OPERATOR</label>
                                    <input type="number" class="form-control" placeholder="NIK OPERATOR" id="nikTechnicalEditPraktek" name="nikTechnicalEditPraktek" value="<?=$rowEditScoreTechnicalPraktek["nik"]?>" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nikTechnicalEditPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateTechnicalPraktekEdit" style="font-weight: bold">TANGGAL ASSESMENT</label>
                                    <div class="input-group date" id="datepickerTanggalPraktekTechnicalPraktekEdit" data-provide="datepicker">
                                        <input type="text" id="dateTechnicalPraktekEdit" class="form-control form-control-user datepicker" value="<?=$rowEditScoreTechnicalPraktek["tanggal_praktek"]?>" name="dateTechnicalPraktekEdit">
                                        <div class="input-group-addon">
                                            <span class="input-group-text form-control form-control-user">
                                                <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div id="dateTechnicalPraktekEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="kategoriTechnicalEditPraktek" style="font-weight: bold">KATEGORI TECHNICAL</label>
                                    <input type="text" class="form-control" placeholder="KATEGORI TECHNICAL" id="kategoriTechnicalEditPraktek" name="kategoriTechnicalEditPraktek" value="<?=$rowEditScoreTechnicalPraktek["kategori_technical"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                <div id="kategoriTechnicalEditPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="sftpTechnicalEditPraktek" style="font-weight: bold">SAFETY PROCEDURE</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI SAFETY PROCEDURE" id="sftpTechnicalEditPraktek" name="sftpTechnicalEditPraktek" value="<?=$rowEditScoreTechnicalPraktek["sftp"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="sftpTechnicalEditPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="equipmentTechnicalEditPraktek" style="font-weight: bold">EQUIPMENT LIST</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI EQUIPMENT LIST" id="equipmentTechnicalEditPraktek" name="equipmentTechnicalEditPraktek" value="<?=$rowEditScoreTechnicalPraktek["equipment"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="equipmentTechnicalEditPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="operationalTechnicalEditPraktek" style="font-weight: bold">OPERASIONAL PARAMETER</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI OPERASIONAL PARAMETER" id="operationalTechnicalEditPraktek" name="operationalTechnicalEditPraktek" value="<?=$rowEditScoreTechnicalPraktek["operational"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="operationalTechnicalEditPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="maintenTechnicalEditPraktek" style="font-weight: bold">MAINTENANCE PARAMETER</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI MAINTENANCE PARAMETER" id="maintenTechnicalEditPraktek" name="maintenTechnicalEditPraktek" value="<?=$rowEditScoreTechnicalPraktek["mainten"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="maintenTechnicalEditPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="troubleTechnicalEditPraktek" style="font-weight: bold">TROUBLE SHOOTING</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI TROUBLE SHOOTING" id="troubleTechnicalEditPraktek" name="troubleTechnicalEditPraktek" value="<?=$rowEditScoreTechnicalPraktek["trouble"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="troubleTechnicalEditPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                    <button class="btn btn-primary" name="editDataScoreTechnicalPraktek" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        <?php
    } 
?>