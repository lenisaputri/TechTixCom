<?php
    include "../config/connection.php";

    if(isset($_POST["infoDataScoreQualitySupervisor_idScoreSupervisor"])){
        $infoScoreQuality = "SELECT tsq.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_quality tsq, tabel_operator tp , tabel_jabatan tj 
            WHERE tsq.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tsq.id_score_quality = $_POST[infoDataScoreQualitySupervisor_idScoreSupervisor]";
        $resultInfoScoreQuality = mysqli_query($con, $infoScoreQuality);
    
        if(mysqli_num_rows($resultInfoScoreQuality) > 0){
            $rowInfoScoreQuality=mysqli_fetch_assoc($resultInfoScoreQuality);
                ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>NAMA : <?php echo $rowInfoScoreQuality["nama_lengkap"]; ?></p>
                            <p>NIK : <?php echo $rowInfoScoreQuality["nik"]; ?></p>
                            <p>JABATAN : <?php echo $rowInfoScoreQuality["nama_jabatan"]; ?></p>          
                        </div>
                        <div class="col-sm-6">
                            <p>POIN : <?php echo $rowInfoScoreQuality["poin"]; ?></p>
                            <p>NILAI : <?php echo $rowInfoScoreQuality["nilai"]; ?></p>
                        </div>
                    </div>
                        <p class="row d-flex justify-content-end">TANGGAL TRAINING : <?php echo $rowInfoScoreQuality["tanggal_training"]; ?></p>
                    <hr>
                <?php
                    $infoScoreQualityDetail = "SELECT tsq.*, tp.id_operator, tp.nik, tsqd.*
                        FROM tabel_score_quality tsq, tabel_operator tp , tabel_score_quality_detail tsqd 
                        WHERE tsq.id_operator = tp.id_operator 
                        AND tsq.id_score_quality = tsqd.id_score_quality
                        AND tsq.id_score_quality = $_POST[infoDataScoreQualitySupervisor_idScoreSupervisor]";
                    
                    $resultInfoScoreQualityDetail = mysqli_query($con, $infoScoreQualityDetail);
                    if(mysqli_num_rows($resultInfoScoreQualityDetail) > 0){
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: .8rem;">
                                            <th>No.</th>
                                            <th>Food Safety System</th>
                                            <th>GMP</th>
                                            <th>Halal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $index=1;
                                            while($row1 = mysqli_fetch_assoc($resultInfoScoreQualityDetail)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $index;?></td>
                                                        <td><?php echo $row1["fss"];?></td>
                                                        <td><?php echo $row1["gmp"];?></td>
                                                        <td><?php echo $row1["halal"];?></td>
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