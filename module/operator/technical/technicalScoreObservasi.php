<?php
include "../config/connection.php";
include "../process/proses_operatorScoreTechnicalObservasi.php";
?>
<head>
<script src="../vendor/chart.js/Chart.min.js"></script>
</head>
<body>
  <div class="container-fluid" id="technical">
  <?php 
      $resultTampilProfilOperator = tampilProfilOperator($con, $idUser);
      if (mysqli_num_rows($resultTampilProfilOperator) > 0){
        while ($row = mysqli_fetch_assoc($resultTampilProfilOperator)) {
          ?>
            <h1 class="h3 mb-2 text-gray-800"><?= $row["nik"]?> / <?= $row["nama"]?></h1>
          <?php
        } 
      }
    ?>
    <nav aria-label="breadcrumb" class="shadow">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
            <span>Beranda</span>
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fas fa-fw fa-shield-alt"></i>
            <span>Data Nilai Training Technical Observasi</span>
        </li>
      </ol>
    </nav>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Nilai Training Technical Observasi</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Kategori Technical</th>
                                <th>Total</th>
                                <th>Rata - Rata</th>
                                <th>Tanggal Observasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $resultTampilScoreTechnicalObservasiOperator = tampilScoreTechnicalObservasiOperator($con, $idUser);
                      $index = 1;
                      if (mysqli_num_rows($resultTampilScoreTechnicalObservasiOperator) > 0){
                        while ($rowTampilData = mysqli_fetch_assoc($resultTampilScoreTechnicalObservasiOperator)) {
                          ?>
                                            <tr class="text-center" id-score-technical-observasi="<?php echo $rowTampilData["id_score_technical_observasi"] ?>">
                                                <td ><?php echo $index; ?></td>
                                                <td><?php echo $rowTampilData["kategori_technical"]; ?></td>
                                                <td><?php echo $rowTampilData["total"]; ?></td>
                                                <td><?php echo $rowTampilData["ratarata"]; ?></td>
                                                <td><?php echo $rowTampilData["tanggal_observasi"]; ?></td>
                                                <td> 
                                                  <button type="button" class="btn btn-warning info-dataNilaiTechnicalObservasi-operator mb-2 mb-sm-2" data-toggle="modal" data-target="#infoDataNilaiTechnicalObservasiOperatorModal" id_nilaiTechnicalObservasiOperatorInfo="<?php echo $rowTampilData["id_score_technical_observasi"];?>">
                                                    <i class="fas fa-info-circle"></i>
                                                    <span>Detail Nilai</span>
                                                  </button>
                                                  <button type="button" class="btn btn-danger spider-dataNilaiTechnicalObservasi-operator mb-2 mb-sm-2" data-toggle="modal" data-target="#spiderDataNilaiTechnicalObservasiOperatorModal" id_nilaiTechnicalObservasiOperatorSpider="<?php echo $rowTampilData["id_score_technical_observasi"];?>">
                                                    <i class="fas fa-chart-pie"></i>
                                                    <span>Spider Chart</span>
                                                  </button>
                                                </td>
                                            </tr>
                                        <?php 
                                        $index++;
                                    }
                                    ?>
                                    <?php
                                }   
                                else{
                                    ?>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
          </div>
          <div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="infoDataNilaiTechnicalObservasiOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiTechnicalObservasiOperatorInfo border-0">
          <h5 class="modal-title text-white w-100 text-center">Data Nilai Training Technical Observasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="info-dataNilaiTechnicalObservasiOperator"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="spiderDataNilaiTechnicalObservasiOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiTechnicalObservasiOperatorSpider border-0">
          <h5 class="modal-title text-white w-100 text-center">Spider Training Technical Observasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="spider-dataNilaiTechnicalObservasiOperator"></div>
        </div>
      </div>
    </div>
  </div>
</body>