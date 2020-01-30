<?php
include "../config/connection.php";

function tampilOperator($con)
{
    $tampilOperator="select * from tabel_operator";
    $resultTampilOperator=mysqli_query($con, $tampilOperator);
    return $resultTampilOperator;
}

if (isset($_POST["tambahDataScoreSafety"]) || isset($_POST["editDataScoreSafety"]) || isset($_POST["hapusDataMateriSafety"])){

    if($_GET["module"]=="dataScoreSafety" && $_GET["act"]=="tambah"){

        $dateSafety =  date('Y-m-d', strtotime($_POST[dateSafety]));
       $query2 = "INSERT INTO tabel_score_safety (
         id_operator,
         poin,
         nilai,
         tanggal_training
    )

     values
    (  '$_POST[nikSafety]',
        '$_POST[poinSafety]',
        '$_POST[nilaiSafety]',
        '$dateSafety'
    );";
    
        if(mysqli_query($con, $query2)){ 
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
        else{            
            echo("Error description: " . mysqli_error($con));
        }
    } else if ($_GET["module"]=="dataScoreSafety" && $_GET["act"]=="edit"){
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
    } else if ($_GET["module"]=="dataScoreSafety" && $_GET["act"]=="hapus"){
        $idnya = $_POST['id_score_safety'];

        $queryDelete2 = "DELETE FROM tabel_score_safety_detail WHERE id_score_safety='$idnya';";
        $queryDelete = "DELETE FROM tabel_score_safety WHERE id_score_safety='$idnya';";

        if(mysqli_query($con,$queryDelete2) && mysqli_query($con,$queryDelete)){

            header('location:../module/index.php?module=' . $_GET["module"]);
        }

        else{            
            echo("Error description: " . mysqli_error($con));
        }
    }
}

// MODAL EDIT OPERATOR
if(isset($_POST["editDataScoreSafety_idScoreSafety"])){
    $editScoreSafety = "SELECT tss.*, tp.id_operator, tp.nik FROM tabel_score_safety tss, tabel_operator tp WHERE tss.id_operator = tp.id_operator AND tss.id_score_safety = $_POST[editDataScoreSafety_idScoreSafety]";
    $resultEditScoreSafety = mysqli_query($con, $editScoreSafety);
  
    if(mysqli_num_rows($resultEditScoreSafety) > 0){
        $i = 1;
        while($rowEditScoreSafety=mysqli_fetch_assoc($resultEditScoreSafety)){
            ?>
            <div class="form-group row">
                <input type="hidden" name="id_scoreSafetyUpdate" value="<?=$rowEditScoreSafety["id_score_safety"]?>" > 
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikSafetyEdit" style="font-weight: bold">NIK OPERATOR</label>
                                    <input type="number" class="form-control" value="<?=$rowEditScoreSafety["nik"]?>" id="nikSafetyEdit" name="nikSafetyEdit" disabled>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nikSafetyBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="poinSafetyEdit" style="font-weight: bold">POIN OPERATOR</label>
                                    <input type="number" class="form-control" value="<?=$rowEditScoreSafety["poin"]?>" id="poinSafetyEdit" name="poinSafetyEdit" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="poinSafetyEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nilaiSafetyEdit" style="font-weight: bold">TOTAL NILAI</label>
                                    <input type="number" class="form-control" value="<?=$rowEditScoreSafety["nilai"]?>" id="nilaiSafetyEdit" name="nilaiSafetyEdit" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="nilaiSafetyBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateSafetyEdit" style="font-weight: bold">TANGGAL ASSESMENT</label>
                                <div class="input-group date" id="datepickerTanggalTrainingEdit" data-provide="datepicker">
                                    <input type="text" id="dateSafetyEdit" class="form-control form-control-user datepicker" value="<?=$rowEditScoreSafety["tanggal_training"]?>" name="dateSafetyEdit">
                                    <div class="input-group-addon">
                                        <span class="input-group-text form-control form-control-user">
                                            <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <div id="dateSafetyEditBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                        <button class="btn btn-primary" name="editDataScoreSafety" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            <?php
  }


  // MODAL EDIT OPERATOR
if(isset($_POST["infoDataScoreSafety_idScoreSafety"])){
    $infoScoreSafety = "SELECT tss.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
    FROM tabel_score_safety tss, tabel_operator tp , tabel_jabatan tj 
    WHERE tss.id_operator = tp.id_operator 
    AND tp.id_jabatan = tj.id_jabatan
    AND tss.id_score_safety = $_POST[infoDataScoreSafety_idScoreSafety]";
    $resultInfoScoreSafety = mysqli_query($con, $infoScoreSafety);
  
    if(mysqli_num_rows($resultInfoScoreSafety) > 0){
       $rowInfoScoreSafety=mysqli_fetch_assoc($resultInfoScoreSafety);
            ?>
            <div class="row">
                <div class="col-sm-6">
                <p>NAMA : <?php echo $rowInfoScoreSafety["nama_lengkap"]; ?></p>
                <p>NIK : <?php echo $rowInfoScoreSafety["nik"]; ?></p>
                <p>JABATAN : <?php echo $rowInfoScoreSafety["nama_jabatan"]; ?></p>          
                </div>
                <div class="col-sm-6">
                <p>POIN : <?php echo $rowInfoScoreSafety["poin"]; ?></p>
                <p>NILAI : <?php echo $rowInfoScoreSafety["nilai"]; ?></p>
                </div>
            </div>
                <p class="row d-flex justify-content-end">TANGGAL TRAINING : <?php echo $rowInfoScoreSafety["tanggal_training"]; ?></p>
            <hr>

            <?php
                $infoScoreSafetyDetail = "SELECT tss.*, tp.id_operator, tp.nik, tssd.*
                    FROM tabel_score_safety tss, tabel_operator tp , tabel_score_safety_detail tssd 
                    WHERE tss.id_operator = tp.id_operator 
                    AND tss.id_score_safety = tssd.id_score_safety
                    AND tss.id_score_safety = $_POST[infoDataScoreSafety_idScoreSafety]";
                
                $resultInfoScoreSafetyDetail = mysqli_query($con, $infoScoreSafetyDetail);
                if(mysqli_num_rows($resultInfoScoreSafetyDetail) > 0){
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
                    while($row1 = mysqli_fetch_assoc($resultInfoScoreSafetyDetail)){
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
            } else {
                 ?>
                <div class='text-center col-md-12'>
                    <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                    <p class='text-muted'>Data Nilai Masih Kosong</p>
                </div>
                <?php
            }
            ?>
            </div>
            <?php
        } else {
            ?> 
                <div class="text-center text-muted">Data Tidak Ditemukan</div>
            <?php
        }
            ?>
            
                <div class="form-group">
                    <div class="modal-footer border-0">
                        <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                        <button class="btn btn-primary" name="editDataScoreSafety" type="submit"><i class="fa fa-check"></i> Simpan</button>
                </div>
            <?php
  }
    
?>