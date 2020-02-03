<!-- MENAMPILKAN DATA -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Score Safety</h6>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>SMK3</th>
                            <th>EA-Hira</th>
                            <th>Movement Forklift</th>
                            <th>Confined Space</th>
                            <th>Loto</th>
                            <th>APD</th>
                            <th>BBS</th>
                            <th>Fire Fighting</th>
                            <th>WAH</th>
                            <th>Environment</th>
                            <th>P3K</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $queryTampilData = "SELECT tssd.*, tss.*, tp.id_operator, tp.nik 
                        FROM tabel_score_safety_detail tssd, tabel_score_safety tss, tabel_operator tp 
                        WHERE tss.id_operator = tp.id_operator
                        AND tssd.id_score_safety = tss.id_score_safety;
                            ";
                        
                        $resultTampilData = mysqli_query($con, $queryTampilData);
                        $index = 1;

                        if(mysqli_num_rows($resultTampilData) > 0){
                            while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                    ?>
                        <tr class="text-center" id-score-safety-detail="<?php echo $rowTampilData["id_score_safety_detail"] ?>">
                            <td ><?php echo $index; ?></td>
                            <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                            <td class="judulMateri"><?php echo $rowTampilData["smk3"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["ea_hira"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["movement_forklift"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["confined_space"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["loto"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["apd"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["bbs"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["fire_fighting"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["wah"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["environment"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["p3k"]; ?></td>
                        </tr>
                    <?php 
                        $index++;
                        }
                    ?>
                    <?php
                    }   else{
                    ?>
                        <!-- <div>
                            <p>Data Operator tidak tersedia</p>
                        </div> -->
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- MENAMPILKAN DATA SELESAI-->
</div>
<!-- /.container-fluid -->