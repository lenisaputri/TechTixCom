<?php
    include "../config/connection.php";

    if(isset($_POST["infoDataScoreTechnicalOnlineSupervisor_idScoreSupervisor"])){
        $infoScoreTechnical = "SELECT tst.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_technical tst, tabel_operator tp , tabel_jabatan tj 
            WHERE tst.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tst.id_score_technical = $_POST[infoDataScoreTechnicalOnlineSupervisor_idScoreSupervisor]";
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
                        AND tst.id_score_technical = $_POST[infoDataScoreTechnicalOnlineSupervisor_idScoreSupervisor]";
                    
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
            <div class="form-group">
                <div class="modal-footer border-0">
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                </div>
            </div>
        <?php
    }       
?>