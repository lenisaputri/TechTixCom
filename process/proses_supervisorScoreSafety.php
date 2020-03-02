<?php
    include "../config/connection.php";

    if(isset($_POST["infoDataScoreSafetySupervisor_idScoreSupervisor"])){
        $infoScoreSafety = "SELECT tss.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_safety tss, tabel_operator tp , tabel_jabatan tj 
            WHERE tss.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tss.id_score_safety = $_POST[infoDataScoreSafetySupervisor_idScoreSupervisor]";
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
                        AND tss.id_score_safety = $_POST[infoDataScoreSafetySupervisor_idScoreSupervisor]";
                    
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

    if(isset($_POST["spiderDataScoreSafetySupervisor_idScoreSafety"])){
        $spiderScoreSafety = "SELECT tss.*, tssd.*, tssd.id_score_safety_detail,tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
            FROM tabel_score_safety tss, tabel_operator tp , tabel_jabatan tj, tabel_score_safety_detail tssd
            WHERE tss.id_operator = tp.id_operator 
            AND tp.id_jabatan = tj.id_jabatan
            AND tss.id_score_safety = tssd.id_score_safety
            AND tss.id_score_safety = $_POST[spiderDataScoreSafetySupervisor_idScoreSafety]";
        $resultSpiderScoreSafety = mysqli_query($con, $spiderScoreSafety);
    
        if(mysqli_num_rows($resultSpiderScoreSafety) > 0){
        $rowSpiderScoreSafety=mysqli_fetch_assoc($resultSpiderScoreSafety);
            ?>
             <canvas id="marksChartSafetySupervisor"></canvas>
                <script>
                var marksCanvas = document.getElementById("marksChartSafetySupervisor");
                
                var marksData = {
                  labels: ["SMK3", "EA-HIRA", "MOVEMENT FORKLIFT", "CONFINED SPACE", "LOTO", "APD", "BBS", "FIRE FIGHTING", "WAH", "ENVIRONMENT", "P3K"],
                  datasets: [{
                    label: [<?php echo '"' . $rowSpiderScoreSafety['tanggal_training'] . '"';?>],
                    backgroundColor: "rgba(200,0,0,0.2)",
                    data: [<?php echo '"' . $rowSpiderScoreSafety['smk3'] . '","' . $rowSpiderScoreSafety['ea_hira'] . '","' . $rowSpiderScoreSafety['movement_forklift'] . '","' . $rowSpiderScoreSafety['confined_space'] . '","' . $rowSpiderScoreSafety['loto'] . '","' . $rowSpiderScoreSafety['apd'] . '","' . $rowSpiderScoreSafety['bbs'] . '","' . $rowSpiderScoreSafety['fire_fighting'] . '","' . $rowSpiderScoreSafety['wah'] . '","' . $rowSpiderScoreSafety['environment'] . '","' . $rowSpiderScoreSafety['p3k'] . '"';?>]
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