<?php
    include "../config/connection.php";

    if(isset($_POST["infoDataScoreGeneralHrdSupervisor_idScoreSupervisor"])){
        $infoScoreGeneralHrd = "SELECT tsg.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
        FROM tabel_score_generalhrd tsg, tabel_operator tp , tabel_jabatan tj 
        WHERE tsg.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tsg.id_score_generalHrd = $_POST[infoDataScoreGeneralHrdSupervisor_idScoreSupervisor]";
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
                            AND tsg.id_score_generalhrd = $_POST[infoDataScoreGeneralHrdSupervisor_idScoreSupervisor]";
                        
                        $resultInfoScoreGeneralHrdDetail = mysqli_query($con, $infoScoreGeneralHrdDetail);
                        if(mysqli_num_rows($resultInfoScoreGeneralHrdDetail) > 0){
                            ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                        <thead>
                                            <tr style="font-size: .8rem;">
                                                <th>No.</th>
                                                <th>Code Of Conduct</th>
                                                <th>PKB & Compensation And Benefit</th>
                                                <th>Peraturan Perusahaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $index=1;
                                                while($row1 = mysqli_fetch_assoc($resultInfoScoreGeneralHrdDetail)){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $index;?></td>
                                                            <td><?php echo $row1["coc"];?></td>
                                                            <td><?php echo $row1["pkb_cab"];?></td>
                                                            <td><?php echo $row1["perperus"];?></td>
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

    if(isset($_POST["spiderDataScoreGeneralHrdSupervisor_idScoreGeneralHrd"])){
        $spiderScoreGeneralHrd = "SELECT tsg.*, tsgd.*, tsgd.id_score_generalHrd_detail ,tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
        FROM tabel_score_generalHrd tsg, tabel_operator tp , tabel_jabatan tj, tabel_score_generalHrd_detail tsgd
        WHERE tsg.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tsg.id_score_generalHrd = tsgd.id_score_generalHrd
        AND tsg.id_score_generalHrd = $_POST[spiderDataScoreGeneralHrdSupervisor_idScoreGeneralHrd]";
        $resultSpiderScoreGeneralHrd = mysqli_query($con, $spiderScoreGeneralHrd);
    
        if(mysqli_num_rows($resultSpiderScoreGeneralHrd) > 0){
        $rowSpiderScoreGeneralHrd=mysqli_fetch_assoc($resultSpiderScoreGeneralHrd);
            ?>
             <canvas id="marksChartGeneralHrdOperator"></canvas>
                <script>
                var marksCanvas = document.getElementById("marksChartGeneralHrdOperator");
                
                var marksData = {
                  labels: ["Code Of Conduct", "PKB & Compensation And Benefit", "Peraturan Perusahaan", "", "", "", ""],
                  datasets: [{
                    label: [<?php echo '"' . $rowSpiderScoreGeneralHrd['tanggal_training'] . '"';?>],
                    backgroundColor: "rgba(200,0,0,0.2)",
                    data: [<?php echo '"' . $rowSpiderScoreGeneralHrd['coc'] . '","' . $rowSpiderScoreGeneralHrd['pkb_cab'] . '","' . $rowSpiderScoreGeneralHrd['perperus'] . '"';?>]
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