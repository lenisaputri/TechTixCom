<?php
    include "../config/connection.php";

    function tampilOperator($con)
    {
        $tampilOperator="select * from tabel_operator";
        $resultTampilOperator=mysqli_query($con, $tampilOperator);
        return $resultTampilOperator;
    }

    if (isset($_POST["tambahDataScoreTechnicalObservasi"]) || isset($_POST["editDataScoreTechnicalObservasi"]) || isset($_POST["hapusDataScoreTechnicalObservasi"])){
        if($_GET["module"]=="technicalNilaiObservasi" && $_GET["act"]=="tambah"){
            $dateTechnicalObservasi =  date('Y-m-d', strtotime($_POST[dateTechnicalObservasi]));
            $sftpObservasi = $_POST[sftpObservasi];
            $equipmentObservasi = $_POST[equipmentObservasi];
            $operationalObservasi = $_POST[operationalObservasi];
            $maintenObservasi = $_POST[maintenObservasi];
            $troubleObservasi = $_POST[troubleObservasi];

            $jumlahObservasi = $sftpObservasi + $equipmentObservasi + $operationalObservasi + $maintenObservasi + $troubleObservasi;
            $rata2Observasi = $jumlahObservasi / 5;

            $query2 = "INSERT INTO tabel_score_technical_observasi(
                id_operator,
                kategori_technical,
                sftp,
                equipment,
                operational,
                mainten,
                trouble,
                total,
                ratarata,
                tanggal_observasi
            )

            values(  
                '$_POST[nikTechnicalObservasi]',
                '$_POST[kategoriTechnicalObservasi]',
                '$sftpObservasi',
                '$equipmentObservasi',
                '$operationalObservasi',
                '$maintenObservasi',
                '$troubleObservasi',
                '$jumlahObservasi',
                '$rata2Observasi',
                '$dateTechnicalObservasi'
            );";
        
            if(mysqli_query($con, $query2)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        } 

        else if ($_GET["module"]=="technicalNilaiObservasi" && $_GET["act"]=="edit"){
            $id_scoreTechnicalObservasiUpdate = $_POST["id_scoreTechnicalObservasiUpdate"]; 
            
            $sftpTechnicalEditObservasi = $_POST[sftpTechnicalEditObservasi];
            $equipmentTechnicalEditObservasi= $_POST[equipmentTechnicalEditObservasi];
            $operationalTechnicalEditObservasi = $_POST[operationalTechnicalEditObservasi];
            $maintenTechnicalEditObservasi = $_POST[maintenTechnicalEditObservasi];
            $troubleTechnicalEditObservasi = $_POST[troubleTechnicalEditObservasi];

            $jumlahObservasiEdit = $sftpTechnicalEditObservasi + $equipmentTechnicalEditObservasi + $operationalTechnicalEditObservasi + $maintenTechnicalEditObservasi + $troubleTechnicalEditObservasi;
            $rata2ObservasiEdit = $jumlahObservasiEdit / 5;

            $dateTechnicalObservasiEdit =  date('Y-m-d', strtotime($_POST[dateTechnicalObservasiEdit]));

            $query10="UPDATE tabel_score_technical_observasi
                set
                kategori_technical = '$_POST[kategoriTechnicalEditObservasi]',
                sftp = '$sftpTechnicalEditObservasi' ,
                equipment = '$equipmentTechnicalEditObservasi',
                operational = '$maintenTechnicalEditObservasi',
                mainten = '$maintenTechnicalEditObservasi',
                trouble = '$troubleTechnicalEditObservasi' ,
                total = '$jumlahObservasiEdit',
                ratarata = '$rata2ObservasiEdit',
                tanggal_observasi = '$dateTechnicalObservasiEdit'
                where id_score_technical_observasi ='$id_scoreTechnicalObservasiUpdate';";

                if(mysqli_query($con,$query10)){
                    header('location:../module/index.php?module=' . $_GET["module"]);
                }
                else{            
                    echo("Error description: " . mysqli_error($con));
                }
        }

        else if ($_GET["module"]=="technicalNilaiObservasi" && $_GET["act"]=="hapus"){
            $idnya = $_POST['id_score_technical_observasi'];
            $queryDelete = "DELETE FROM tabel_score_technical_observasi WHERE id_score_technical_observasi='$idnya';";

            if(mysqli_query($con,$queryDelete)){
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }

    if(isset($_POST["infoDataScoreTechnicalObservasi_idScoreTechnicalObservasi"])){
        $infoScoreTechnicalObservasi = "SELECT tsto.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_technical_observasi tsto, tabel_operator tp , tabel_jabatan tj 
            WHERE tsto.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tsto.id_score_technical_observasi = $_POST[infoDataScoreTechnicalObservasi_idScoreTechnicalObservasi]";
        $resultInfoScoreTechnicalObservasi = mysqli_query($con, $infoScoreTechnicalObservasi);
    
        if(mysqli_num_rows($resultInfoScoreTechnicalObservasi) > 0){
            $rowInfoScoreTechnicalObservasi = mysqli_fetch_assoc($resultInfoScoreTechnicalObservasi);
                ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>NAMA : <?php echo $rowInfoScoreTechnicalObservasi["nama_lengkap"]; ?></p>
                            <p>NIK : <?php echo $rowInfoScoreTechnicalObservasi["nik"]; ?></p>
                            <p>JABATAN : <?php echo $rowInfoScoreTechnicalObservasi["nama_jabatan"]; ?></p>          
                        </div>
                        <div class="col-sm-6">
                            <p>JUMLAH : <?php echo $rowInfoScoreTechnicalObservasi["total"]; ?></p>
                            <p>RATA - RATA : <?php echo $rowInfoScoreTechnicalObservasi["ratarata"]; ?></p>
                        </div>
                    </div>
                    <p class="row d-flex justify-content-end">TANGGAL OBSERVASI : <?php echo $rowInfoScoreTechnicalObservasi["tanggal_observasi"]; ?></p>
                    <hr>
                <?php
                    $infoScoreTechnicalObservasiDetail = "SELECT tsto.*, tp.id_operator, tp.nik
                        FROM tabel_score_technical_observasi tsto, tabel_operator tp 
                        WHERE tsto.id_operator = tp.id_operator 
                        AND tsto.id_score_technical_observasi = $_POST[infoDataScoreTechnicalObservasi_idScoreTechnicalObservasi]";
                    
                    $resultInfoScoreTechnicalObservasiDetail = mysqli_query($con, $infoScoreTechnicalObservasiDetail);
                    if(mysqli_num_rows($resultInfoScoreTechnicalObservasiDetail) > 0){
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
                                            while($row1 = mysqli_fetch_assoc($resultInfoScoreTechnicalObservasiDetail)){
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

    if(isset($_POST["editDataScoreTechnicalObservasi_idScoreTechnicalObservasi"])){
        $editScoreTechnicalObservasi = "SELECT tsto.*, tp.id_operator, tp.nik 
            FROM tabel_score_technical_observasi tsto, tabel_operator tp 
            WHERE tsto.id_operator = tp.id_operator
            AND tsto.id_score_technical_observasi = $_POST[editDataScoreTechnicalObservasi_idScoreTechnicalObservasi]";

        $resultEditScoreTechnicalObservasi = mysqli_query($con, $editScoreTechnicalObservasi);
    
        if(mysqli_num_rows($resultEditScoreTechnicalObservasi) > 0){
            $i = 1;
            while($rowEditScoreTechnicalObservasi = mysqli_fetch_assoc($resultEditScoreTechnicalObservasi)){
                ?>
                    <div class ="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <input type="hidden" name="id_scoreTechnicalObservasiUpdate" value="<?=$rowEditScoreTechnicalObservasi["id_score_technical_observasi"]?>" > 
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikTechnicalEditObservasi" style="font-weight: bold">NIK OPERATOR</label>
                                    <input type="number" class="form-control" placeholder="NIK OPERATOR" id="nikTechnicalEditObservasi" name="nikTechnicalEditObservasi" value="<?=$rowEditScoreTechnicalObservasi["nik"]?>" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nikTechnicalEditObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateTechnicalObservasiEdit" style="font-weight: bold">TANGGAL ASSESMENT</label>
                                    <div class="input-group date" id="datepickerTanggalPraktekTechnicalObservasiEdit" data-provide="datepicker">
                                        <input type="text" id="dateTechnicalObservasiEdit" class="form-control form-control-user datepicker" value="<?=$rowEditScoreTechnicalObservasi["tanggal_observasi"]?>" name="dateTechnicalObservasiEdit">
                                        <div class="input-group-addon">
                                            <span class="input-group-text form-control form-control-user">
                                                <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div id="dateTechnicalObservasiEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class='form-group row'>
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="kategoriTechnicalEditObservasi" style="font-weight: bold">KATEGORI TECHNICAL</label>
                                    <input type="text" class="form-control" placeholder="KATEGORI TECHNICAL" id="kategoriTechnicalEditObservasi" name="kategoriTechnicalEditObservasi" value="<?=$rowEditScoreTechnicalObservasi["kategori_technical"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                <div id="kategoriTechnicalEditObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="sftpTechnicalEditObservasi" style="font-weight: bold">SAFETY PROCEDURE</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI SAFETY PROCEDURE" id="sftpTechnicalEditObservasi" name="sftpTechnicalEditObservasi" value="<?=$rowEditScoreTechnicalObservasi["sftp"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="sftpTechnicalEditObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="equipmentTechnicalEditObservasi" style="font-weight: bold">EQUIPMENT LIST</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI EQUIPMENT LIST" id="equipmentTechnicalEditObservasi" name="equipmentTechnicalEditObservasi" value="<?=$rowEditScoreTechnicalObservasi["equipment"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="equipmentTechnicalEditObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="operationalTechnicalEditObservasi" style="font-weight: bold">OPERASIONAL PARAMETER</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI OPERASIONAL PARAMETER" id="operationalTechnicalEditObservasi" name="operationalTechnicalEditObservasi" value="<?=$rowEditScoreTechnicalObservasi["operational"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="operationalTechnicalEditObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="maintenTechnicalEditObservasi" style="font-weight: bold">MAINTENANCE PARAMETER</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI MAINTENANCE PARAMETER" id="maintenTechnicalEditObservasi" name="maintenTechnicalEditObservasi" value="<?=$rowEditScoreTechnicalObservasi["mainten"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="maintenTechnicalEditObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="troubleTechnicalEditObservasi" style="font-weight: bold">TROUBLE SHOOTING</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control" placeholder="NILAI TROUBLE SHOOTING" id="troubleTechnicalEditObservasi" name="troubleTechnicalEditObservasi" value="<?=$rowEditScoreTechnicalObservasi["trouble"]?>" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="troubleTechnicalEditObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                    <button class="btn btn-primary" name="editDataScoreTechnicalObservasi" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </div>
        <?php
    } 
?>