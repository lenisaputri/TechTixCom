<!-- MENAMPILKAN DATA -->
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Score Quality</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Food Safety System</th>
                            <th>GMP</th>
                            <th>Halal</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $queryTampilData = "SELECT tsqd.*, tsq.*, tp.id_operator, tp.nik 
                        FROM tabel_score_quality_detail tsqd, tabel_score_quality tsq, tabel_operator tp 
                        WHERE tsq.id_operator = tp.id_operator
                        AND tsqd.id_score_quality = tsq.id_score_quality;
                            ";
                        
                        $resultTampilData = mysqli_query($con, $queryTampilData);
                        $index = 1;

                        if(mysqli_num_rows($resultTampilData) > 0){
                            while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                    ?>
                        <tr class="text-center" id-score-quality-detail="<?php echo $rowTampilData["id_score_quality_detail"] ?>">
                            <td ><?php echo $index; ?></td>
                            <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                            <td class="judulMateri"><?php echo $rowTampilData["fss"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["gmp"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["halal"]; ?></td>
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