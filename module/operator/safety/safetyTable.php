<?php
  include "../config/connection.php";
  include "../process/proses_operatorScoreSafety.php";
?>
<head>
<script src="../vendor/chart.js/Chart.min.js"></script>
</head>
<body>
  <div class="container-fluid" id="safety">
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
          <span>Data Nilai Training Safety Online</span>
        </li>
      </ol>
    </nav>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Nilai Training Safety Online</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr class="text-center">
                <th>No.</th>
                <th>Poin</th>
                <th>Nilai</th>
                <th>Tanggal</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $resultTampilScoreSafetyOperator = tampilScoreSafetyOperator($con, $idUser);
                $index = 1;
                if (mysqli_num_rows($resultTampilScoreSafetyOperator) > 0){
                  while ($rowTampilData = mysqli_fetch_assoc($resultTampilScoreSafetyOperator)) {
                    ?>
                      <tr class="text-center">
                        <td><?php echo $index; ?></td>
                        <td><?php echo $rowTampilData["poin"]; ?></td>
                        <td><?php echo $rowTampilData["nilai"]; ?></td>
                        <td><?php echo $rowTampilData["tanggal_training"]; ?></td>
                        <td>
                          <button type="button" class="btn btn-warning info-dataNilaiSafety-operator mb-2 mb-sm-2" data-toggle="modal" data-target="#infoDataNilaiSafetyOperatorModal" id_nilaiSafetyOperatotInfo="<?php echo $rowTampilData["id_score_safety"];?>">
                            <i class="fas fa-info-circle"></i>
                            <span>Detail Nilai</span>
                          </button>
                          <button type="button" class="btn btn-danger spider-dataNilaiSafety-operator mb-2 mb-sm-2" data-toggle="modal" data-target="#spiderDataNilaiSafetyOperatorModal" id_nilaiSafetyOperatorSpider="<?php echo $rowTampilData["id_score_safety"];?>">
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
      </div>
    </div>
  </div>
  <div class="modal fade" id="infoDataNilaiSafetyOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiSafetyOperatorInfo border-0">
          <h5 class="modal-title text-white w-100 text-center">Detail Nilai Training Safety Online</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="info-dataNilaiSafetyOperator"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="spiderDataNilaiSafetyOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiSafetyOperatorSpider border-0">
          <h5 class="modal-title text-white w-100 text-center">Spider Training Safety Online</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="spider-dataNilaiSafetyOperator"></div>
        </div>
      </div>
    </div>
  </div>
</body>