<?php
include "../config/connection.php";
include "../process/proses_operatorScoreTechnical.php";
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
            <span>Data Nilai Technical Online Training</span>
        </li>
      </ol>
    </nav>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Hasil Nilai Training</h6>
      </div>
      <div class="card-body">
        <form class="user" action="?module=technicalNilaiOnlineTraining" method="post">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group row">
                <div class="col-sm-12 mb-3 mb-sm-0">
                  <select class="custom-select-karyawan my-1 mr-sm-2" name="kategoriTechnical">
                    <option value="0" class="text">Pilih Kategori Technical</option>
                      <?php
                        $resultKategoriTechnical = kategoriTechnical($con);
                        if(mysqli_num_rows($resultKategoriTechnical) > 0){
                            while($row = mysqli_fetch_assoc($resultKategoriTechnical)){
                                echo "<option value='".$row['id_score_technical']."'>".$row['kategori_technical']."</option>";
                            }
                        } 
                        else {
                          ?>
                            <option value="0" class="text">Kategori Technical Kosong</option>
                          <?php
                        }
                      ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <button type="submit" class="btn btn-success mb-2 mb-sm-0" name="cariKategoriTechnical">
                  <span class="text">Cari</span>
                </button>
              </div>
            </div>
          </div>
        </form>
        <div class="table-responsive">
          <?php
            if(isset($_POST["cariKategoriTechnical"])){
                $result=tampilScoreTechnicalKategoriOperator($con,$_POST["kategoriTechnical"]);
              }
              else{
                $result=tampilScoreTechnicalOperator($con, $idUser);
              }
            if (mysqli_num_rows($result) > 0){
            ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr class="text-center">
                        <th>No.</th>
                        <th>Poin</th>
                        <th>Nilai</th>
                        <th>Kategori Technical</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      if(mysqli_num_rows($result) > 0){
                        $index=1;
                          while($rowTampilData = mysqli_fetch_assoc($result)){
                            if(tampilScoreTechnicalOperator($con, $idUser)!=NULL){
                      ?>
                      <tr class="text-center">
                        <td><?php echo $index; ?></td>
                        <td><?php echo $rowTampilData["poin"]; ?></td>
                        <td><?php echo $rowTampilData["nilai"]; ?></td>
                        <td><?php echo $rowTampilData["kategori_technical"]; ?></td>
                        <td><?php echo $rowTampilData["tanggal_training"]; ?></td>
                        <td>
                          <button type="button" class="btn btn-warning info-dataNilaiTechnicalOnline-operator mb-2 mb-sm-0" data-toggle="modal" data-target="#infoDataNilaiTechnicalOnlineOperatorModal" id_nilaiTechnicalOnlineOperatorInfo="<?php echo $rowTampilData["id_score_technical"];?>">
                            <i class="fas fa-info-circle"></i>
                            <span>Detail Nilai</span>
                          </button>
                          <button type="button" class="btn btn-danger spider-dataNilaiTechnicalOnline-operator mb-2 mb-sm-0" data-toggle="modal" data-target="#spiderDataNilaiTechnicalOnlineOperatorModal" id_nilaiTechnicalOnlineOperatorSpider="<?php echo $rowTampilData["id_score_technical"];?>">
                          <i class="fas fa-pie-chart"></i>
                            <span>Spider Chart</span>
                          </button>
                        </td>
                      </tr>
                      <?php
                        } else if(tampilScoreTechnicalOperator($con, $idUser)==NULL){
                      ?>
                      <tr class="text-center">
                        <td><?php echo $index; ?></td>
                        <td><?php echo $rowTampilData["poin"]; ?></td>
                        <td><?php echo $rowTampilData["nilai"]; ?></td>
                        <td><?php echo $rowTampilData["kategori_technical"]; ?></td>
                        <td><?php echo $rowTampilData["tanggal_training"]; ?></td>
                        <td>
                        <button type="button" class="btn btn-warning info-dataNilaiTechnicalOnline-operator mb-2 mb-sm-0" data-toggle="modal" data-target="#infoDataNilaiTechnicalOnlineOperatorModal" id_nilaiTechnicalOnlineOperatorInfo="<?php echo $rowTampilData["id_score_technical"];?>">
                            <i class="fas fa-info-circle"></i>
                            <span>Detail Nilai</span>
                          </button>
                          <button type="button" class="btn btn-danger spider-dataNilaiTechnicalOnline-operator mb-2 mb-sm-0" data-toggle="modal" data-target="#spiderDataNilaiTechnicalOnlineOperatorModal" id_nilaiTechnicalOnlineOperatorSpider="<?php echo $rowTampilData["id_score_technical"];?>">
                          <i class="fas fa-pie-chart"></i>
                            <span>Spider Chart</span>
                          </button>
                        </td>
                      </tr>
                      <?php
                                                    }
                                                $index++;
                                                }
                                                ?>
                    </tbody>
                    <?php
                                        } else{
                                        ?>
                                        <div class="text-center">
                                            <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                                            <p class="text-muted">Nilai Kategori Tidak Ditemukan</p>
                                        </div>
                                        <?php
                                        }
                                        ?>
                  </table>
                  <?php
            } else{
            ?>
            <div class="text-center">
                                        <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                                        <p class="text-muted">Data Nilai Per-Kategori Tidak Ditemukan</p>
                                    </div>
                                    <?php
                                    }
                                    ?>
          </div>
          <div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="infoDataNilaiTechnicalOnlineOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiTechnicalOnlineOperatorInfo border-0">
          <h5 class="modal-title text-white w-100 text-center">Data Nilai Online Training Technical Online</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="info-dataNilaiTechnicalOnlineOperator"></div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="spiderDataNilaiTechnicalOnlineOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-nilaiTechnicalOnlineOperatorSpider border-0">
          <h5 class="modal-title text-white w-100 text-center">Spider Online Training Technical Online</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid" id="spider-dataNilaiTechnicalOnlineOperator"></div>
        </div>
      </div>
    </div>
  </div>
</body>