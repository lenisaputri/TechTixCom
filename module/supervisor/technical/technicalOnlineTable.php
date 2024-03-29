<?php
include "../config/connection.php";
include "../process/proses_supervisorScoreTechnical.php";
?>
<head>
<script src="../vendor/chart.js/Chart.min.js"></script>
</head>
<body>
  <div class="container-fluid" id="technical">
    <nav aria-label="breadcrumb" class="shadow">
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
            <span>Beranda</span>
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          <i class="fas fa-fw fa-shield-alt"></i>
            <span>Data Nilai Training Technical Online</span>
        </li>
      </ol>
    </nav>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Nilai Training Technical Online</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kategori Technical</th>
                                <th>Total Nilai</th>
                                <th>Total Poin</th>
                                <th>Tanggal Assessment</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryTampilData = "SELECT tst.*, tp.id_operator, tp.nik, tp.nama AS nama_operator FROM tabel_score_technical tst, tabel_operator tp WHERE tst.id_operator = tp.id_operator;
                                    ";
                                
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;

                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                            <tr class="text-center" id-score-technical="<?php echo $rowTampilData["id_score_technical"] ?>">
                                                <td ><?php echo $index; ?></td>
                                                <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                                                <td class="kategoriMateri"><?php echo $rowTampilData["nama_operator"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["kategori_technical"]; ?></td>
                                                <td class="judulMateri"><?php echo $rowTampilData["poin"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["nilai"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["tanggal_training"]; ?></td>
                                                <td> 
                                                  <button type="button" class="btn btn-warning info-dataNilaiTechnicalOnline-supervisor mb-2 mb-sm-2" data-toggle="modal" data-target="#infoDataNilaiTechnicalOnlineSupervisorModal" id_nilaiTechnicalOnlineSupervisorInfo="<?php echo $rowTampilData["id_score_technical"];?>">
                                                  <span>
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                    <span class="text">Detail Nilai</span>
                                                  </button>
                                                  <button type="button" class="btn btn-danger spider-dataNilaiTechnicalOnline-supervisor mb-2 mb-sm-2" data-toggle="modal" data-target="#spiderDataNilaiTechnicalOnlineSupervisorModal" id_nilaiTechnicalOnlineSupervisorSpider="<?php echo $rowTampilData["id_score_technical"];?>">
                                                  <span>
                                                        <i class="fas fa-chart-pie"></i>
                                                    </span>
                                                    <span class="text">Spider Chart</span>
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
  <div class="modal fade" id="infoDataNilaiTechnicalOnlineSupervisorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiTechnicalOnlineSupervisorInfo border-0">
          <h5 class="modal-title text-white w-100 text-center">Detail Nilai Training Technical Online</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="info-dataNilaiTechnicalOnlineSupervisor"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="spiderDataNilaiTechnicalOnlineSupervisorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiTechnicalOnlineSupervisorSpider border-0">
          <h5 class="modal-title text-white w-100 text-center">Spider Training Technical Online</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="spider-dataNilaiTechnicalOnlineSupervisor"></div>
        </div>
      </div>
    </div>
  </div>
</body>