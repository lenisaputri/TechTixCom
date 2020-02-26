<?php
    include "../config/connection.php";

    function tampilProfilOperator($con, $idUser){
        
        $tampilProfilOperator = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_operator a, tabel_jabatan b , 
        tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
        $resultTampilProfilOperator = mysqli_query($con, $tampilProfilOperator);
        return $resultTampilProfilOperator;
    }

    function tampilScoreTechnicalOperator($con, $idUser){
        $tampilScoreTechnicalOperator = "SELECT tst.*, tp.id_operator, tp.nik, tu.* FROM tabel_score_technical tst, 
        tabel_operator tp, tabel_user tu WHERE tst.id_operator = tp.id_operator AND tu.username = tp.nik AND tu.id_user = '$idUser'";
        $resultTampilScoreTechnicalOperator = mysqli_query($con, $tampilScoreTechnicalOperator);
        return $resultTampilScoreTechnicalOperator;
    }

    function kategoriTechnical($con){
        $kategoriTechnical = "SELECT kategori_technical FROM tabel_score_technical";
        $resultKategoriTechnical = mysqli_query($con, $kategoriTechnical);
        return $resultKategoriTechnical;
    }

    function tampilScoreTechnicalKategoriOperator($con, $kategoriTechnical){
        $tampilScoreTechnicalKategoriOperator = "SELECT tst.*, tst.kategori_technical ,tp.id_operator, tp.nik, tu.* FROM tabel_score_technical tst, 
        tabel_operator tp, tabel_user tu 
        WHERE tst.id_operator = tp.id_operator 
        AND tu.username = tp.nik 
        AND tst.kategori_technical = $kategoriTechnical ";
        $resultTampilScoreTechnicalKategoriOperator = mysqli_query($con, $tampilScoreTechnicalKategoriOperator);
        return $resultTampilScoreTechnicalKategoriOperator;
    }

    if(isset($_POST["infoDataScoreTechnicalOnlineOperator_idScoreTechnicalOnline"])){
        $infoScoreTechnicalOnline = "SELECT tst.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_technical tst, tabel_operator tp , tabel_jabatan tj 
            WHERE tst.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tst.id_score_technical = $_POST[infoDataScoreTechnicalOnlineOperator_idScoreTechnicalOnline]";
        $resultInfoScoreTechnicalOnline = mysqli_query($con, $infoScoreTechnicalOnline);
    
        if(mysqli_num_rows($resultInfoScoreTechnicalOnline) > 0){
        $rowInfoScoreTechnicalOnline=mysqli_fetch_assoc($resultInfoScoreTechnicalOnline);
            ?>
                <div class="form-group">
                    <div class="modal-footer border-0">
                        <button class="btn btn-success"><i class="fa fa-print"></i> Cetak Nilai</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>NAMA : <?php echo $rowInfoScoreTechnicalOnline["nama_lengkap"]; ?></p>
                        <p>NIK : <?php echo $rowInfoScoreTechnicalOnline["nik"]; ?></p>
                        <p>JABATAN : <?php echo $rowInfoScoreTechnicalOnline["nama_jabatan"]; ?></p>          
                    </div>
                    <div class="col-sm-6">
                        <p>POIN : <?php echo $rowInfoScoreTechnicalOnline["poin"]; ?></p>
                        <p>NILAI : <?php echo $rowInfoScoreTechnicalOnline["nilai"]; ?></p>
                    </div>
                </div>
                    <p class="row d-flex justify-content-end">TANGGAL TRAINING : <?php echo $rowInfoScoreTechnicalOnline["tanggal_training"]; ?></p>
                <hr>
                <?php
                    $infoScoreTechnicalOnlineDetail = "SELECT DISTINCT(tst.id_score_technical), tst.*, tp.id_operator, tp.nik, tstd.*
                        FROM tabel_score_technical tst, tabel_operator tp , tabel_score_technical_detail tstd 
                        WHERE tst.id_operator = tp.id_operator 
                        AND tst.id_score_technical = tstd.id_score_technical
                        AND tst.id_score_technical = $_POST[infoDataScoreTechnicalOnlineOperator_idScoreTechnicalOnline]
                        ";
                    
                    $resultInfoScoreTechnicalOnlineDetail = mysqli_query($con, $infoScoreTechnicalOnlineDetail);
                    if(mysqli_num_rows($resultInfoScoreTechnicalOnlineDetail) > 0){
                        ?>
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: .8rem;">
                                            <th>No.</th>
                                            <th>SMK3</th>
                                            <th>EQUIPMENT</th>
                                            <th>OPERATIONAL</th>
                                            <th>CONFINED SPACE</th>
                                            <th>LOTO</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $index=1;
                                            while($row1 = mysqli_fetch_assoc($resultInfoScoreTechnicalOnlineDetail)){
                                                ?>
                                                    <tr>
                                                        <td><?php echo $index;?></td>
                                                        <td><?php echo $row1["sftp"];?></td>
                                                        <td><?php echo $row1["equipment"];?></td>
                                                        <td><?php echo $row1["operational"];?></td>
                                                        <td><?php echo $row1["mainten"];?></td>
                                                        <td><?php echo $row1["trouble"];?></td>
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