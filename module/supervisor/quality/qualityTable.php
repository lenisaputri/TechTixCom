<?php
include "../config/connection.php";
?>

<div class="container-fluid" id="quality">
  <h1 class="h3 mb-2 text-gray-800">Score Training Quality</h1>
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
                <th>Nama</th>
                <th>Total Point</th>
                <th>Total Nilai</th>
                <th>Tanggal Training</th>
                <th>Aksi</th>
              </tr>
            </thead>
              <tbody>
              <?php
              $queryTampilData = "SELECT tsq.*, tp.id_operator, tp.nik, tp.nama AS nama_lengkap FROM tabel_score_quality tsq, tabel_operator tp WHERE tsq.id_operator = tp.id_operator;
              ";
              $resultTampilData = mysqli_query($con, $queryTampilData);
              $index = 1;
              
                if(mysqli_num_rows($resultTampilData) > 0){
                  while($rowTampilData = mysqli_fetch_assoc($resultTampilData)) {
                    ?>
                    <tr class="text-center" id-score-quality="<?php echo $rowTampilData["id_score_quality"] ?>">
                      <td ><?php echo $index; ?></td>
                      <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                      <td class="kategoriMateri"><?php echo $rowTampilData["nama_lengkap"]; ?></td>
                      <td class="judulMateri"><?php echo $rowTampilData["poin"]; ?></td>
                      <td class="fileMateri"><?php echo $rowTampilData["nilai"]; ?></td>
                      <td class="fileMateri"><?php echo $rowTampilData["tanggal_training"]; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning info-dataScoreQuality-admin mb-2 mb-sm-0" onclick="location.href='index.php?module=qualityTableDetail';">
                        <span class="icon text-white-50">
                            <i class="fas fa-info"></i>
                        </span>
                        <span class="text">Detail Score Quality</span>
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