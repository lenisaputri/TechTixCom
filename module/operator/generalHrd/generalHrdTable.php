<?php
include "../config/connection.php";
include "../process/proses_operatorScoreGeneralHrd.php";
?>

<body>
<!-- Begin Page Content -->
<div class="container-fluid" id="generalHrd">
  <?php
    $resultTampilProfilOperator = tampilProfilOperator($con, $idUser);
      if (mysqli_num_rows($resultTampilProfilOperator) > 0){
        while ($row = mysqli_fetch_assoc($resultTampilProfilOperator)) {
  ?>
<!-- Page Heading -->
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
        <i class="fas fa-fw fa-users"></i>
          <span>Data Score GeneralHRD</span>
      </li>
    </ol>
  </nav>
  
  <!-- DataTales Example -->
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
              <th>Poin</th>
              <th>Nilai</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
            <tbody>
              <?php 
                $resultTampilScoreGeneralHrdOperator = tampilScoreGeneralHrdOperator($con, $idUser);
                $index = 1;
                
                if (mysqli_num_rows($resultTampilScoreGeneralHrdOperator) > 0){
                  while ($rowTampilData = mysqli_fetch_assoc($resultTampilScoreGeneralHrdOperator)) {
              ?>
                <tr class="text-center">
                  <td><?php echo $index; ?></td>
                  <td><?php echo $rowTampilData["poin"]; ?></td>
                  <td><?php echo $rowTampilData["nilai"]; ?></td>
                  <td><?php echo $rowTampilData["tanggal_training"]; ?></td>
                  <td>
                  <button type="button" class="btn btn-warning info-dataNilaiGeneralHrd-operator mb-2 mb-sm-0" data-toggle="modal" data-target="#infoDataNilaiGeneralHrdOperatorModal" id_nilaiGeneralHrdOperatorInfo="<?php echo $rowTampilData["id_score_generalHrd"];?>">
                                                    <i class="fas fa-info-circle"></i>
                                                    <span>Detail Nilai</span>
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

<div class="modal fade" id="infoDataNilaiGeneralHrdOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-nilaiGeneralHrdOperatorInfo border-0">
                <h5 class="modal-title text-white w-100 text-center">Data Nilai Online Training GeneralHrd</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" id="info-dataNilaiGeneralHrdOperator"></div>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
</body>