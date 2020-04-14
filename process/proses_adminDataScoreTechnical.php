<?php
    include "../config/connection.php";

    function tampilOperator($con)
    {
        $tampilOperator="select * from tabel_operator";
        $resultTampilOperator=mysqli_query($con, $tampilOperator);
        return $resultTampilOperator;
    }

    if (isset($_POST["tambahDataScoreTechnical"]) || isset($_POST["editDataScoreTechnical"]) || isset($_POST["hapusDataScoreTechnical"])){
        if($_GET["module"]=="dataScoreTechnical" && $_GET["act"]=="tambah"){
            $dateTechnical =  date('Y-m-d', strtotime($_POST[dateTechnical]));
            $query2 = "INSERT INTO tabel_score_technical (
                id_operator,
                kategori_technical,
                poin,
                nilai,
                tanggal_training
            )

            values(  
                '$_POST[nikTechnical]',
                '$_POST[kategoriTechnical]',
                '$_POST[poinTechnical]',
                '$_POST[nilaiTechnical]',
                '$dateTechnical'
            );";
        
            if(mysqli_query($con, $query2)){ 
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        } 
        else if ($_GET["module"]=="dataScoreTechnical" && $_GET["act"]=="edit"){
            $id_scoreTechnicalUpdate = $_POST["id_scoreTechnicalUpdate"];            
            $dateTechnicalEdit =  date('Y-m-d', strtotime($_POST[dateTechnicalEdit]));
            $query10="UPDATE tabel_score_technical
                set
                kategori_technical = '$_POST[kategoriTechnicalEdit]',
                poin = '$_POST[poinTechnicalEdit]',
                nilai = '$_POST[nilaiTechnicalEdit]',
                tanggal_training = '$dateTechnicalEdit'
                where id_score_technical='$id_scoreTechnicalUpdate';";

                if(mysqli_query($con,$query10)){
                    header('location:../module/index.php?module=' . $_GET["module"]);
                }
                else{            
                    echo("Error description: " . mysqli_error($con));
                }
        } 
        else if ($_GET["module"]=="dataScoreTechnical" && $_GET["act"]=="hapus"){
            $idnya = $_POST['id_score_technical'];
            $queryDelete2 = "DELETE FROM tabel_score_technical_detail WHERE id_score_technical='$idnya';";
            $queryDelete = "DELETE FROM tabel_score_technical WHERE id_score_technical='$idnya';";

            if(mysqli_query($con,$queryDelete2) && mysqli_query($con,$queryDelete)){
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }

    if(isset($_POST["editDataScoreTechnical_idScoreTechnical"])){
        $editScoreTechnical = "SELECT tst.*, tp.id_operator, tp.nik FROM tabel_score_technical tst, tabel_operator tp WHERE tst.id_operator = tp.id_operator AND tst.id_score_technical = $_POST[editDataScoreTechnical_idScoreTechnical]";
        $resultEditScoreTechnical = mysqli_query($con, $editScoreTechnical);
    
        if(mysqli_num_rows($resultEditScoreTechnical) > 0){
            $i = 1;
            while($rowEditScoreTechnical=mysqli_fetch_assoc($resultEditScoreTechnical)){
                ?>
                    <div class="form-group row">
                        <input type="hidden" name="id_scoreTechnicalUpdate" value="<?=$rowEditScoreTechnical["id_score_technical"]?>" > 
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikTechnicalEdit" style="font-weight: bold">NIK OPERATOR</label>
                            <input type="number" class="form-control" value="<?=$rowEditScoreTechnical["nik"]?>" id="nikTechnicalEdit" name="nikTechnicalEdit" disabled>
                        </div>
                        <div class="col-sm-12">
                            <div id="nikTechnicalBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <input type="hidden" name="id_scoreTechnicalUpdate" value="<?=$rowEditScoreTechnical["id_score_technical"]?>" > 
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="kategoriTechnicalEdit" style="font-weight: bold">KATEGORI TECHNICAL</label>
                            <input type="text" class="form-control" value="<?=$rowEditScoreTechnical["kategori_technical"]?>" id="kategoriTechnicalEdit" name="kategoriTechnicalEdit" required>
                        </div>
                        <div class="col-sm-12">
                            <div id="kategoriTechnicalEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="poinTechnicalEdit" style="font-weight: bold">POIN OPERATOR</label>
                            <input type="number" class="form-control" value="<?=$rowEditScoreTechnical["poin"]?>" id="poinTechnicalEdit" name="poinTechnicalEdit" required>
                        </div>
                        <div class="col-sm-12">
                            <div id="poinTechnicalEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nilaiTechnicalEdit" style="font-weight: bold">TOTAL NILAI</label>
                            <input type="number" class="form-control" value="<?=$rowEditScoreTechnical["nilai"]?>" id="nilaiTechnicalEdit" name="nilaiTechnicalEdit" required>
                        </div>
                        <div class="col-sm-12">
                            <div id="nilaiTechnicalEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateTechnicalEdit" style="font-weight: bold">TANGGAL ASSESMENT</label>
                            <div class="input-group date" id="datepickerTanggalTrainingTechnicalEdit" data-provide="datepicker">
                                <input type="text" id="dateTechnicalEdit" class="form-control form-control-user datepicker" value="<?=$rowEditScoreTechnical["tanggal_training"]?>" name="dateTechnicalEdit" required>
                                <div class="input-group-addon">
                                    <span class="input-group-text form-control form-control-user">
                                        <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div id="dateTechnicalEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                        <button class="btn btn-primary" name="editDataScoreTechnical" type="submit" onclick="ValidasiEditScoreTechnical();"><i class="fa fa-check"></i> Simpan</button>
                    </div>
                <?php
    }

    if(isset($_POST["infoDataScoreTechnical_idScoreTechnical"])){
        $infoScoreTechnical = "SELECT tst.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_technical tst, tabel_operator tp , tabel_jabatan tj 
            WHERE tst.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tst.id_score_technical = $_POST[infoDataScoreTechnical_idScoreTechnical]";
        $resultInfoScoreTechnical = mysqli_query($con, $infoScoreTechnical);
    
        if(mysqli_num_rows($resultInfoScoreTechnical) > 0){
            $rowInfoScoreTechnical=mysqli_fetch_assoc($resultInfoScoreTechnical);
                ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>NAMA : <?php echo $rowInfoScoreTechnical["nama_lengkap"]; ?></p>
                            <p>NIK : <?php echo $rowInfoScoreTechnical["nik"]; ?></p>
                            <p>JABATAN : <?php echo $rowInfoScoreTechnical["nama_jabatan"]; ?></p>          
                        </div>
                        <div class="col-sm-6">
                            <p>POIN : <?php echo $rowInfoScoreTechnical["poin"]; ?></p>
                            <p>NILAI : <?php echo $rowInfoScoreTechnical["nilai"]; ?></p>
                        </div>
                    </div>
                    <p class="row d-flex justify-content-end">TANGGAL TRAINING : <?php echo $rowInfoScoreTechnical["tanggal_training"]; ?></p>
                    <hr>
                <?php
                    $infoScoreTechnicalDetail = "SELECT tst.*, tp.id_operator, tp.nik, tstd.*
                        FROM tabel_score_technical tst, tabel_operator tp , tabel_score_technical_detail tstd 
                        WHERE tst.id_operator = tp.id_operator 
                        AND tst.id_score_technical = tstd.id_score_technical
                        AND tst.id_score_technical = $_POST[infoDataScoreTechnical_idScoreTechnical]";
                    
                    $resultInfoScoreTechnicalDetail = mysqli_query($con, $infoScoreTechnicalDetail);
                    if(mysqli_num_rows($resultInfoScoreTechnicalDetail) > 0){
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
                                            while($row1 = mysqli_fetch_assoc($resultInfoScoreTechnicalDetail)){
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
        <hr>      
            <div class="form-group">
                <div class="modal-footer border-0">
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                </div>
            </div>
        <?php
    }    
?>