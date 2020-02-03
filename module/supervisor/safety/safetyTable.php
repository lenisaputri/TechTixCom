<?php
include "../config/connection.php";
?>

<div class="container-fluid" id="safety">
  <h1 class="h3 mb-2 text-gray-800">Score Training Safety</h1>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Nilai Training</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th>No.</th>
                <th>Nik</th>
                <th>Total Point</th>
                <th>Total Nilai</th>
                <th>Tanggal Training</th>
                <th>Aksi</th>
              </tr>
            </thead>
              <tbody>
              <?php
              $queryTampilData = "SELECT tss.*, tp.id_operator, tp.nik FROM tabel_score_safety tss, tabel_operator tp WHERE tss.id_operator = tp.id_operator;
              ";
              $resultTampilData = mysqli_query($con, $queryTampilData);
              $index = 1;
              
                if(mysqli_num_rows($resultTampilData) > 0){
                  while($rowTampilData = mysqli_fetch_assoc($resultTampilData)) {
                    ?>
                    <tr class="text-center" id-score-safety="<?php echo $rowTampilData["id_score_safety"] ?>">
                      <td ><?php echo $index; ?></td>
                      <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                      <td class="judulMateri"><?php echo $rowTampilData["poin"]; ?></td>
                      <td class="fileMateri"><?php echo $rowTampilData["nilai"]; ?></td>
                      <td class="fileMateri"><?php echo $rowTampilData["tanggal_training"]; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning info-dataScoreSafety-admin mb-2 mb-sm-0" onclick="location.href='index.php?module=safetyTableDetail';">
                        <span class="icon text-white-50">
                            <i class="fas fa-info"></i>
                        </span>
                        <span class="text">Detail Score Safety</span>
                        </button>
                      </td>
                    </tr>
                    <?php
                    $index++;
                  }
                  ?>
                  <?php
                  } else {
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
<!-- /.container-fluid -->