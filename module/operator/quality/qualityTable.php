<?php
include "../config/connection.php";
include "../process/proses_operatorScoreQuality.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid" id="safety">

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
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>Data Score Quality</span>
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
        $resultTampilScoreQualityOperator = tampilScoreQualityOperator($con, $idUser);
        $index = 1;

        if (mysqli_num_rows($resultTampilScoreQualityOperator) > 0){
          while ($rowTampilData = mysqli_fetch_assoc($resultTampilScoreQualityOperator)) {
            ?>
          <tr class="text-center">
            <td><?php echo $index; ?></td>
            <td><?php echo $rowTampilData["poin"]; ?></td>
            <td><?php echo $rowTampilData["nilai"]; ?></td>
            <td><?php echo $rowTampilData["tanggal_training"]; ?></td>
            <td>
              <button type="submit" class="btn btn-warning btn-icon-split mb-2 mb-sm-0" onclick="location.href='index.php?module=qualityTableDetail';">
                        <span class="icon text-white-50">
                            <i class="fas fa-info"></i>
                        </span>
                        <span class="text">Detail Score</span>
                        </button></td>
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
<!-- /.container-fluid -->