<?php
    include "../config/connection.php";

    if(isset($_POST["infoDataScoreTechnicalObservasiSupervisor_idScoreSupervisor"])){
        $infoScoreTechnicalObservasi = "SELECT tsto.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_technical_observasi tsto, tabel_operator tp , tabel_jabatan tj 
            WHERE tsto.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tsto.id_score_technical_observasi = $_POST[infoDataScoreTechnicalObservasiSupervisor_idScoreSupervisor]";
        $resultInfoScoreTechnicalObservasi = mysqli_query($con, $infoScoreTechnicalObservasi);
    
        if(mysqli_num_rows($resultInfoScoreTechnicalObservasi) > 0){
            $rowInfoScoreTechnicalObservasi=mysqli_fetch_assoc($resultInfoScoreTechnicalObservasi);
                ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <p>NAMA : <?php echo $rowInfoScoreTechnicalObservasi["nama_lengkap"]; ?></p>
                            <p>NIK : <?php echo $rowInfoScoreTechnicalObservasi["nik"]; ?></p>
                            <p>JABATAN : <?php echo $rowInfoScoreTechnicalObservasi["nama_jabatan"]; ?></p>          
                        </div>
                        <div class="col-sm-6">
                            <p>TOTAL : <?php echo $rowInfoScoreTechnicalObservasi["total"]; ?></p>
                            <p>RATA-RATA : <?php echo $rowInfoScoreTechnicalObservasi["ratarata"]; ?></p>
                        </div>
                    </div>
                    <p class="row d-flex justify-content-end">TANGGAL OBSERVASI : <?php echo $rowInfoScoreTechnicalObservasi["tanggal_observasi"]; ?></p>
                    <hr>
                <?php
                    $infoScoreTechnicalObservasiDetail = "SELECT tsto.*, tp.id_operator, tp.nik
                        FROM tabel_score_technical_observasi tsto, tabel_operator tp
                        WHERE tsto.id_operator = tp.id_operator 
                        AND tsto.id_score_technical_observasi = $_POST[infoDataScoreTechnicalObservasiSupervisor_idScoreSupervisor]";
                    
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
                <div class='text-center col-md-12'>
                    <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                    <div class="text-center text-muted">Data Tidak Ditemukan</div>
                </div>
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
    
    if(isset($_POST["spiderDataScoreTechnicalObservasiSupervisor_idScoreTechnicalObservasi"])){
        $spiderScoreTechnicalObservasi= "SELECT tsto.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
        FROM tabel_score_technical_observasi tsto, tabel_operator tp , tabel_jabatan tj
        WHERE tsto.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tsto.id_score_technical_observasi = $_POST[spiderDataScoreTechnicalObservasiSupervisor_idScoreTechnicalObservasi]";
        $resultSpiderScoreTechnicalObservasi = mysqli_query($con, $spiderScoreTechnicalObservasi);
    
        if(mysqli_num_rows($resultSpiderScoreTechnicalObservasi) > 0){
        $rowSpiderScoreTechnicalObservasi=mysqli_fetch_assoc($resultSpiderScoreTechnicalObservasi);
            ?>
             <canvas id="marksChartTechnicalObservasiSupervisor"></canvas>
                <script>
                var marksCanvas = document.getElementById("marksChartTechnicalObservasiSupervisor");
                
                var marksData = {
                  labels: ["Safety Procedure", "Equipment List", "Operasional Parameter", "Maintenance Parameter", "Trouble Shooting", "", ""],
                  datasets: [{
                    label: [<?php echo '"' . $rowSpiderScoreTechnicalObservasi['tanggal_observasi'] . '"';?>],
                    backgroundColor: "rgba(200,0,0,0.2)",
                    data: [<?php echo '"' . $rowSpiderScoreTechnicalObservasi['sftp'] . '","' . $rowSpiderScoreTechnicalObservasi['equipment'] . '","' . $rowSpiderScoreTechnicalObservasi['operational'] . '","' . $rowSpiderScoreTechnicalObservasi['mainten'] . '","' . $rowSpiderScoreTechnicalObservasi['trouble'] . '"';?>]
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