<?php
    include "../config/connection.php";

    function tampilProfilOperator($con, $idUser){
        
        $tampilProfilOperator = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_operator a, tabel_jabatan b , 
        tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
        $resultTampilProfilOperator = mysqli_query($con, $tampilProfilOperator);
        return $resultTampilProfilOperator;
    }

    function tampilScoreTechnicalPraktekOperator($con, $idUser){
        $tampilScoreTechnicalPraktekOperator = "SELECT tstp.*, tp.id_operator, tp.nik, tu.* FROM tabel_score_technical_praktek tstp, 
        tabel_operator tp, tabel_user tu WHERE tstp.id_operator = tp.id_operator AND tu.username = tp.nik AND tu.id_user = '$idUser'";
        $resultTampilScoreTechnicalPraktekOperator = mysqli_query($con, $tampilScoreTechnicalPraktekOperator);
        return $resultTampilScoreTechnicalPraktekOperator;
    }

    if(isset($_POST["infoDataScoreTechnicalPraktekOperator_idScoreTechnicalOperator"])){
        $infoScoreTechnicalPraktek = "SELECT tstp.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_technical_praktek tstp, tabel_operator tp , tabel_jabatan tj 
            WHERE tstp.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tstp.id_score_technical_praktek = $_POST[infoDataScoreTechnicalPraktekOperator_idScoreTechnicalOperator]";
        $resultInfoScoreTechnicalPraktek = mysqli_query($con, $infoScoreTechnicalPraktek);
    
        if(mysqli_num_rows($resultInfoScoreTechnicalPraktek) > 0){
        $rowInfoScoreTechnicalPraktek=mysqli_fetch_assoc($resultInfoScoreTechnicalPraktek);
            ?>
                <div class="form-group">
                    <div class="modal-footer border-0">
                        <a class="btn btn-success" href="../process/proses_print_technicalPraktekOperator.php?id_score_technical_praktek=<?=$rowInfoScoreTechnicalPraktek["id_score_technical_praktek"]?>">
                            <span class="icon text-white-50">
                                <i class="fas fa-fw fa-print"></i>
                            </span>
                            <span class="text">Cetak Nilai</span>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>NAMA : <?php echo $rowInfoScoreTechnicalPraktek["nama_lengkap"]; ?></p>
                        <p>NIK : <?php echo $rowInfoScoreTechnicalPraktek["nik"]; ?></p>
                        <p>JABATAN : <?php echo $rowInfoScoreTechnicalPraktek["nama_jabatan"]; ?></p>          
                    </div>
                    <div class="col-sm-6">
                        <p>TOTAL : <?php echo $rowInfoScoreTechnicalPraktek["total"]; ?></p>
                        <p>RATA - RATA : <?php echo $rowInfoScoreTechnicalPraktek["ratarata"]; ?></p>
                    </div>
                </div>
                    <p class="row d-flex justify-content-end">TANGGAL PRAKTEK : <?php echo $rowInfoScoreTechnicalPraktek["tanggal_praktek"]; ?></p>
                <hr>
                <?php
                    $infoScoreTechnicalPraktekDetail = "SELECT DISTINCT(tstp.id_score_technical_praktek), tstp.*, tp.id_operator, tp.nik
                        FROM tabel_score_technical_praktek tstp, tabel_operator tp , tabel_score_technical_detail tstd 
                        WHERE tstp.id_operator = tp.id_operator 
                        AND tstp.id_score_technical_praktek = $_POST[infoDataScoreTechnicalPraktekOperator_idScoreTechnicalOperator]
                        ";
                    
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
            <div class='text-center col-md-12'>
                <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                <div class="text-center text-muted">Data Tidak Ditemukan</div>
            </div>
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

    if(isset($_POST["spiderDataScoreTechnicalPraktekOperator_idScoreTechnicalOperator"])){
        $spiderScoreTechnicalPraktek= "SELECT tstp.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
        FROM tabel_score_technical_praktek tstp, tabel_operator tp , tabel_jabatan tj
        WHERE tstp.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tstp.id_score_technical_praktek = $_POST[spiderDataScoreTechnicalPraktekOperator_idScoreTechnicalOperator]";
        $resultSpiderScoreTechnicalPraktek = mysqli_query($con, $spiderScoreTechnicalPraktek);
    
        if(mysqli_num_rows($resultSpiderScoreTechnicalPraktek) > 0){
            $rowSpiderScoreTechnicalPraktek=mysqli_fetch_assoc($resultSpiderScoreTechnicalPraktek);
            ?>
             <canvas id="marksChartTechnicalPraktekOperator"></canvas>
                <script>
                var marksCanvas = document.getElementById("marksChartTechnicalPraktekOperator");
                
                var marksData = {
                  labels: ["Safety Procedure", "Equipment List", "Operasional Parameter", "Maintenance Parameter", "Trouble Shooting", "", ""],
                  datasets: [{
                    label: [<?php echo '"' . $rowSpiderScoreTechnicalPraktek['tanggal_praktek'] . '"';?>],
                    backgroundColor: "rgba(200,0,0,0.2)",
                    data: [<?php echo '"' . $rowSpiderScoreTechnicalPraktek['sftp'] . '","' . $rowSpiderScoreTechnicalPraktek['equipment'] . '","' . $rowSpiderScoreTechnicalPraktek['operational'] . '","' . $rowSpiderScoreTechnicalPraktek['mainten'] . '","' . $rowSpiderScoreTechnicalPraktek['trouble'] . '"';?>]
                  }]
                  };
                  
                  var radarChart = new Chart(marksCanvas, {
                    type: 'radar',
                    data: marksData
                  });
                </script>
            <?php
        } 
        else {
            ?> 
            <div class='text-center col-md-12'>
                <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                <div class="text-center text-muted">Data Tidak Ditemukan</div>
            </div>
            <?php
        }
        ?>                
            <div class="form-group">
            </div>
        <?php
    }  
?>