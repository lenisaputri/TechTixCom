<?php
    include "../config/connection.php";

    function tampilOperator($con)
    {
        $tampilOperator="select * from tabel_operator";
        $resultTampilOperator=mysqli_query($con, $tampilOperator);
        return $resultTampilOperator;
    }

    if (isset($_POST["tambahDataScoreGeneralHrd"]) || isset($_POST["editDataScoreGeneralHrd"]) || isset($_POST["hapusDataMateriGeneralHrd"])){
        if($_GET["module"]=="dataScoreGeneralHrd" && $_GET["act"]=="tambah"){
            $dateGeneralHrd =  date('Y-m-d', strtotime($_POST[dateGeneralHrd]));
            $query2 = "INSERT INTO tabel_score_generalhrd (
                id_operator,
                poin,
                nilai,
                tanggal_training
            )

            values(  
                '$_POST[nikGeneralHrd]',
                '$_POST[poinGeneralHrd]',
                '$_POST[nilaiGeneralHrd]',
                '$dateGeneralHrd'
            );";
        
        $dateGeneralHrdEdit =  date('Y-m-d', strtotime($_POST[dateGeneralHrdEdit]));

        $query10="UPDATE tabel_score_generalhrd
            set
            poin = '$_POST[poinGeneralHrdEdit]',
            nilai = '$_POST[nilaiGeneralHrdEdit]',
            tanggal_training = '$dateGeneralHrdEdit'
            where id_score_generalhrd='$id_scoreGeneralHrdUpdate';";

            if(mysqli_query($con,$query10)){

                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        } 
        else if ($_GET["module"]=="dataScoreGeneralHrd" && $_GET["act"]=="edit"){
            $id_scoreGeneralHrdUpdate = $_POST["id_scoreGeneralHrdUpdate"];            
            $dateGeneralHrdEdit =  date('Y-m-d', strtotime($_POST[dateGeneralHrdEdit]));
            $query10="UPDATE tabel_score_generalhrd
                set
                poin = '$_POST[poinGeneralHrdEdit]',
                nilai = '$_POST[nilaiGeneralHrdEdit]',
                tanggal_training = '$dateGeneralHrdEdit'
                where id_score_generalhrd='$id_scoreGeneralHrdUpdate';";

                if(mysqli_query($con,$query10)){
                    header('location:../module/index.php?module=' . $_GET["module"]);
                }
                else{            
                    echo("Error description: " . mysqli_error($con));
                }
        } 
        else if ($_GET["module"]=="dataScoreGeneralHrd" && $_GET["act"]=="hapus"){
            $idnya = $_POST['id_score_generalhrd'];
            $queryDelete2 = "DELETE FROM tabel_score_generalhrd_detail WHERE id_score_generalhrd='$idnya';";
            $queryDelete = "DELETE FROM tabel_score_generalhrd WHERE id_score_generalhrd='$idnya';";

            if(mysqli_query($con,$queryDelete2) && mysqli_query($con,$queryDelete)){
                header('location:../module/index.php?module=' . $_GET["module"]);
            }
            else{            
                echo("Error description: " . mysqli_error($con));
            }
        }
    }

// MODAL EDIT OPERATOR
if(isset($_POST["editDataScoreGeneralHrd_idScoreGeneralHrd"])){
    $editScoreGeneralHrd = "SELECT tsg.*, tp.id_operator, tp.nik FROM tabel_score_generalhrd tsg, tabel_operator tp WHERE tsg.id_operator = tp.id_operator AND tsg.id_score_generalhrd = $_POST[editDataScoreGeneralHrd_idScoreGeneralHrd]";
    $resultEditScoreGeneralHrd = mysqli_query($con, $editScoreGeneralHrd);
  
    if(mysqli_num_rows($resultEditScoreGeneralHrd) > 0){
        $i = 1;
        while($rowEditScoreGeneralHrd=mysqli_fetch_assoc($resultEditScoreGeneralHrd)){
            ?>
            <div class="form-group row">
                <input type="hidden" name="id_scoreGeneralHrdUpdate" value="<?=$rowEditScoreGeneralHrd["id_score_generalhrd"]?>" > 
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikGeneralHrdEdit" style="font-weight: bold">NIK OPERATOR</label>
                                    <input type="number" class="form-control" value="<?=$rowEditScoreGeneralHrd["nik"]?>" id="nikGeneralHrdEdit" name="nikGeneralHrdEdit" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nikGeneralHrdBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="poinGeneralHrdEdit" style="font-weight: bold">POIN OPERATOR</label>
                                    <input type="number" class="form-control" value="<?=$rowEditScoreGeneralHrd["poin"]?>" id="poinGeneralHrdEdit" name="poinGeneralHrdEdit" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="poinGeneralHrdyEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nilaiGeneralHrdEdit" style="font-weight: bold">TOTAL NILAI</label>
                                    <input type="number" class="form-control" value="<?=$rowEditScoreGeneralHrd["nilai"]?>" id="nilaiGeneralHrdEdit" name="nilaiGeneralHrdEdit" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nilaiGeneralHrdBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateGeneralHrdEdit" style="font-weight: bold">TANGGAL ASSESMENT</label>
                                <div class="input-group date" id="datepickerTanggalTrainingEdit" data-provide="datepicker">
                                    <input type="text" id="dateGeneralHrdEdit" class="form-control form-control-user datepicker" value="<?=$rowEditScoreGeneralHrd["tanggal_training"]?>" name="dateGeneralHrdEdit">
                                    <div class="input-group-addon">
                                        <span class="input-group-text form-control form-control-user">
                                            <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div id="dateGeneralHrdEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                            <button class="btn btn-primary" name="editDataScoreGeneralHrd" type="submit"><i class="fa fa-check"></i> Simpan</button>
                        </div>
                    </div>
                <?php
    }

  //MODAL EDIT OPERATOR
if(isset($_POST["infoDataScoreGeneralHrd_idScoreGeneralHrd"])){
    $infoScoreGeneralHrd = "SELECT tsg.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
    FROM tabel_score_generalhrd tsg, tabel_operator tp , tabel_jabatan tj 
    WHERE tsg.id_operator = tp.id_operator 
    AND tp.id_jabatan = tj.id_jabatan
    AND tsg.id_score_generalhrd = $_POST[infoDataScoreGeneralHrd_idScoreGeneralHrd]";
    $resultInfoScoreGeneralHrd = mysqli_query($con, $infoScoreGeneralHrd);
  
    if(mysqli_num_rows($resultInfoScoreGeneralHrd) > 0){
       $rowInfoScoreGeneralHrd=mysqli_fetch_assoc($resultInfoScoreGeneralHrd);
            ?>
                <div class="row">
                    <div class="col-sm-6">
                        <p>NAMA : <?php echo $rowInfoScoreGeneralHrd["nama_lengkap"]; ?></p>
                        <p>NIK : <?php echo $rowInfoScoreGeneralHrd["nik"]; ?></p>
                        <p>JABATAN : <?php echo $rowInfoScoreGeneralHrd["nama_jabatan"]; ?></p>          
                    </div>
                    <div class="col-sm-6">
                        <p>POIN : <?php echo $rowInfoScoreGeneralHrd["poin"]; ?></p>
                        <p>NILAI : <?php echo $rowInfoScoreGeneralHrd["nilai"]; ?></p>
                    </div>
                </div>
                    <p class="row d-flex justify-content-end">TANGGAL TRAINING : <?php echo $rowInfoScoreGeneralHrd["tanggal_training"]; ?></p>
                <hr>
                <?php
                    $infoScoreGeneralHrdDetail = "SELECT tsg.*, tp.id_operator, tp.nik, tsgd.*
                        FROM tabel_score_generalhrd tsg, tabel_operator tp , tabel_score_generalhrd_detail tsgd 
                        WHERE tsg.id_operator = tp.id_operator 
                        AND tsg.id_score_generalhrd = tsgd.id_score_generalhrd
                        AND tsg.id_score_generalhrd = $_POST[infoDataScoreGeneralHrd_idScoreGeneralHrd]";
                    
                    $resultInfoScoreGeneralHrdDetail = mysqli_query($con, $infoScoreGeneralHrdDetail);
                    if(mysqli_num_rows($resultInfoScoreGeneralHrdDetail) > 0){
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: .8rem;">
                                            <th>No.</th>
                                            <th>SMK3</th>
                                            <th>EA-HIRA</th>
                                            <th>MOVEMENT FORKLIFT</th>
                                            <th>CONFINED SPACE</th>
                                            <th>LOTO</th>
                                            <th>APD</th>
                                            <th>BBS</th>
                                            <th>FIRE FIGHTING</th>
                                            <th>WAH</th>
                                            <th>ENVIRONMENT</th>
                                            <th>P3K</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $index=1;
                                        while($row1 = mysqli_fetch_assoc($resultInfoScoreGeneralHrdDetail)){
                                        ?>
                                        <tr>
                                            <td><?php echo $index;?></td>
                                            <td><?php echo $row1["smk3"];?></td>
                                            <td><?php echo $row1["ea_hira"];?></td>
                                            <td><?php echo $row1["movement_forklift"];?></td>
                                            <td><?php echo $row1["confined_space"];?></td>
                                            <td><?php echo $row1["loto"];?></td>
                                            <td><?php echo $row1["apd"];?></td>
                                            <td><?php echo $row1["bbs"];?></td>
                                            <td><?php echo $row1["fire_fighting"];?></td>
                                            <td><?php echo $row1["wah"];?></td>
                                            <td><?php echo $row1["environment"];?></td>
                                            <td><?php echo $row1["p3k"];?></td>
                                        </tr>
                                        <?php
                                        $index++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
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
                        <button class="btn btn-primary" name="editDataScoreGeneralHrd" type="submit"><i class="fa fa-check"></i> Simpan</button>
                    </div>
                </div>
            <?php
    }
?>