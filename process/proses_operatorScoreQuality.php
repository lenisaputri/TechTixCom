<?php
    include "../config/connection.php";

    function tampilProfilOperator($con, $idUser){
        
        $tampilProfilOperator = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_operator a, tabel_jabatan b , 
        tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
        $resultTampilProfilOperator = mysqli_query($con, $tampilProfilOperator);
        return $resultTampilProfilOperator;
    }

    function tampilScoreQualityOperator($con, $idUser){
        $tampilScoreQualityOperator = "SELECT tsq.*, tp.id_operator, tp.nik, tu.* FROM tabel_score_quality tsq, 
        tabel_operator tp, tabel_user tu WHERE tsq.id_operator = tp.id_operator AND tu.username = tp.nik AND tu.id_user = '$idUser'";
        $resultTampilScoreQualityOperator = mysqli_query($con, $tampilScoreQualityOperator);
        return $resultTampilScoreQualityOperator;
    }

    function tampilScoreQualityDetailOperator($con, $idUser){
        $tampilScoreQualityDetailOperator = "SELECT tsq.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan , tu.*
        FROM tabel_score_quality tsq, tabel_operator tp , tabel_jabatan tj , tabel_user tu 
        WHERE tsq.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tu.username = tp.nik 
        AND tu.id_user = '$idUser'";
        $resultTampilScoreQualityDetailOperator = mysqli_query($con, $tampilScoreQualityDetailOperator);
        return $resultTampilScoreQualityDetailOperator;
    }

    function tampilScoreQualityDetailNilaiOperator($con, $idUser){
        $tampilScoreQualityDetailNilaiOperator = "SELECT tsq.*, tp.id_operator, tp.nik, tssq.*, tu.*
        FROM tabel_score_quality tsq, tabel_operator tp , tabel_score_quality_detail tssq , tabel_user tu 
        WHERE tsq.id_operator = tp.id_operator 
        AND tsq.id_score_quality = tssq.id_score_quality
        AND tu.username = tp.nik
        AND tu.id_user = '$idUser'";
        $resultTampilScoreQualityDetailNilaiOperator = mysqli_query($con, $tampilScoreQualityDetailNilaiOperator);
        return $resultTampilScoreQualityDetailNilaiOperator;
    }

    if(isset($_POST["infoDataScoreQualityOperator_idScoreQuality"])){
        $infoScoreQuality = "SELECT tsq.*, tsqd.*, tsqd.id_score_quality_detail,tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
        FROM tabel_score_quality tsq, tabel_operator tp , tabel_jabatan tj, tabel_score_quality_detail tsqd
        WHERE tsq.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tsq.id_score_quality = tsqd.id_score_quality
        AND tsq.id_score_quality = $_POST[infoDataScoreQualityOperator_idScoreQuality]";
        $resultInfoScoreQuality = mysqli_query($con, $infoScoreQuality);
    
        if(mysqli_num_rows($resultInfoScoreQuality) > 0){
        $rowInfoScoreQuality=mysqli_fetch_assoc($resultInfoScoreQuality);
            ?>
                <div class="form-group">
                    <div class="modal-footer border-0">
                        <a class="btn btn-success" href="../process/proses_print_qualityOperator.php?id_score_quality_detail=<?=$rowInfoScoreQuality["id_score_quality_detail"]?>">
                            <span class="icon text-white-50">
                                <i class="fas fa-fw fa-print"></i>
                            </span>
                            <span class="text">Cetak Nilai</span>
                        </a>
                    </div>
                </div>
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
                    $infoScoreSafetyDetail = "SELECT DISTINCT(tsq.id_score_quality), tsq.*, tp.id_operator, tp.nik, tsqd.*
                        FROM tabel_score_quality tsq, tabel_operator tp , tabel_score_quality_detail tsqd 
                        WHERE tsq.id_operator = tp.id_operator 
                        AND tsq.id_score_quality= tsqd.id_score_quality
                        AND tsq.id_score_quality = $_POST[infoDataScoreQualityOperator_idScoreQuality]
                        ";
                    
                    $resultInfoScoreSafetyDetail = mysqli_query($con, $infoScoreSafetyDetail);
                    if(mysqli_num_rows($resultInfoScoreSafetyDetail) > 0){
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
                                            while($row1 = mysqli_fetch_assoc($resultInfoScoreSafetyDetail)){
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