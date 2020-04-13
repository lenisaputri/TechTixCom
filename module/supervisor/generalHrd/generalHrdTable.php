<?php
  include "../config/connection.php";
  include "../process/proses_supervisorScoreGeneralHrd.php";
?>
<head>
<script src="../vendor/chart.js/Chart.min.js"></script>
</head>
<body>
<div class="container-fluid" id="generalHrd">
<nav aria-label="breadcrumb" class="shadow">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
            <span>Beranda</span>
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fas fa-fw fa-users"></i>
            <span>Data Nilai Training GeneralHRD Online</span>
        </li>
      </ol>
    </nav>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Hasil Nilai Training GeneralHRD Online</h6>
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
              $queryTampilData = "SELECT tsg.*, tp.id_operator, tp.nik, tp.nama AS nama_lengkap FROM tabel_score_generalhrd tsg, tabel_operator tp WHERE tsg.id_operator = tp.id_operator;
              ";
              $resultTampilData = mysqli_query($con, $queryTampilData);
              $index = 1;
              
              if(mysqli_num_rows($resultTampilData) > 0){
                while($rowTampilData = mysqli_fetch_assoc($resultTampilData)) {
                  ?>
                    <tr class="text-center" id-score-generalHrd="<?php echo $rowTampilData["id_score_generalhrd"] ?>">
                      <td ><?php echo $index; ?></td>
                      <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                      <td class="kategoriMateri"><?php echo $rowTampilData["nama_lengkap"]; ?></td>
                      <td class="judulMateri"><?php echo $rowTampilData["poin"]; ?></td>
                      <td class="fileMateri"><?php echo $rowTampilData["nilai"]; ?></td>
                      <td class="fileMateri"><?php echo $rowTampilData["tanggal_training"]; ?></td>
                      <td>
                      <button type="button" class="btn btn-warning info-dataNilaiGeneralHrd-supervisor mb-2 mb-sm-2" data-toggle="modal" data-target="#infoDataNilaiGeneralHrdSupervisorModal" id_nilaiGeneralHrdSupervisorInfo="<?php echo $rowTampilData["id_score_generalHrd"];?>">
                            <i class="fas fa-info-circle"></i>
                            <span>Detail Nilai</span>
                          </button>
                          <button type="button" class="btn btn-danger spider-dataNilaiGeneralHrd-supervisor mb-2 mb-sm-2" data-toggle="modal" data-target="#spiderDataNilaiGeneralHrdSupervisorModal" id_nilaiGeneralHrdSupervisorSpider="<?php echo $rowTampilData["id_score_generalHrd"];?>">
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
              else {
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
<div class="modal fade" id="infoDataNilaiGeneralHrdSupervisorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiGeneralHrdSupervisorInfo border-0">
          <h5 class="modal-title text-white w-100 text-center">Detail Nilai Training GeneralHRD Online</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="info-dataNilaiGeneralHrdSupervisor"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="spiderDataNilaiGeneralHrdSupervisorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiGeneralHrdSupervisorSpider border-0">
          <h5 class="modal-title text-white w-100 text-center">Spider Training GeneralHRD Online</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="spider-dataNilaiGeneralHrdSupervisor"></div>
        </div>
      </div>
    </div>
  </div>
</body>