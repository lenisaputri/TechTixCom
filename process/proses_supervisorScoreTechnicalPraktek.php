<?php
    include "../config/connection.php";

    if(isset($_POST["infoDataScoreTechnicalPraktekSupervisor_idScoreSupervisor"])){
        $infoScoreTechnicalPraktek = "SELECT tstp.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_technical_praktek tstp, tabel_operator tp , tabel_jabatan tj 
            WHERE tstp.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tstp.id_score_technical_praktek = $_POST[infoDataScoreTechnicalPraktekSupervisor_idScoreSupervisor]";
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
                            <p>TOTAL : <?php echo $rowInfoScoreTechnicalPraktek["total"]; ?></p>
                            <p>RATA-RATA : <?php echo $rowInfoScoreTechnicalPraktek["ratarata"]; ?></p>
                        </div>
                    </div>
                    <p class="row d-flex justify-content-end">TANGGAL PRAKTEK : <?php echo $rowInfoScoreTechnicalPraktek["tanggal_praktek"]; ?></p>
                    <hr>
                <?php
                    $infoScoreTechnicalPraktekDetail = "SELECT tstp.*, tp.id_operator, tp.nik
                        FROM tabel_score_technical_praktek tstp, tabel_operator tp
                        WHERE tstp.id_operator = tp.id_operator 
                        AND tstp.id_score_technical_praktek = $_POST[infoDataScoreTechnicalPraktekSupervisor_idScoreSupervisor]";
                    
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
    
    if(isset($_POST["spiderDataScoreTechnicalPraktekSupervisor_idScoreTechnicalPraktek"])){
        $spiderScoreTechnicalPraktek= "SELECT tstp.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
        FROM tabel_score_technical_praktek tstp, tabel_operator tp , tabel_jabatan tj
        WHERE tstp.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tstp.id_score_technical_praktek = $_POST[spiderDataScoreTechnicalPraktekSupervisor_idScoreTechnicalPraktek]";
        $resultSpiderScoreTechnicalPraktek = mysqli_query($con, $spiderScoreTechnicalPraktek);
    
        if(mysqli_num_rows($resultSpiderScoreTechnicalPraktek) > 0){
        $rowSpiderScoreTechnicalPraktek=mysqli_fetch_assoc($resultSpiderScoreTechnicalPraktek);
            ?>
             <canvas id="marksChartTechnicalPraktekSupervisor"></canvas>
                <script>
                var marksCanvas = document.getElementById("marksChartTechnicalPraktekSupervisor");
                
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