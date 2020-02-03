<!-- MENAMPILKAN DATA -->
<div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Score General HRD</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Code Of Conduct</th>
                            <th>PKB & Compensation and Benefit</th>
                            <th>Peraturan Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $queryTampilData = "SELECT tsgd.*, tsg.*, tp.id_operator, tp.nik 
                        FROM tabel_score_generalhrd_detail tsgd, tabel_score_generalhrd tsg, tabel_operator tp 
                        WHERE tsg.id_operator = tp.id_operator
                        AND tsgd.id_score_generalHrd = tsg.id_score_generalHrd;
                            ";
                        
                        $resultTampilData = mysqli_query($con, $queryTampilData);
                        $index = 1;

                        if(mysqli_num_rows($resultTampilData) > 0){
                            while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                    ?>
                        <tr class="text-center" id-score-generalHrd-detail="<?php echo $rowTampilData["id_score_generalHrd_detail"] ?>">
                            <td ><?php echo $index; ?></td>
                            <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                            <td class="judulMateri"><?php echo $rowTampilData["coc"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["pkb_cab"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["perperus"]; ?></td>
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