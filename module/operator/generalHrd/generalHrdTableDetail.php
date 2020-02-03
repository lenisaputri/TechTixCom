<?php
include "../config/connection.php";
include "../process/proses_operatorScoreGeneralHrd.php";
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
        <li class="breadcrumb-item">
            <a href="index.php?module=safetyTable" ><i class="fas fa-fw fa-users"></i>
                    <span>Data Score GeneralHrd</span>
            </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            <i class="fas fa-fw fa-info"></i>
                <span>Data Score GeneralHrd Detail</span>
        </li>
    </ol>
</nav>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Detail Score Safety Training</h6>
  </div>
  <div class="card-body">
  <?php 
        $resultTampilScoreGeneralHrdDetailOperator = tampilScoreGeneralHrdDetailOperator($con, $idUser);

        if (mysqli_num_rows($resultTampilScoreGeneralHrdDetailOperator) > 0){
          while ($rowDetailData = mysqli_fetch_assoc($resultTampilScoreGeneralHrdDetailOperator)) {
            ?>
    <div class="row">
        <div class="col-sm-6">
            <p>NAMA : <?php echo $rowDetailData["nama_lengkap"]; ?></p>
            <p>NIK : <?php echo $rowDetailData["nik"]; ?></p>
            <p>JABATAN : <?php echo $rowDetailData["nama_jabatan"]; ?></p>          
        </div>
        <div class="col-sm-6">
            <p>POIN : <?php echo $rowDetailData["poin"]; ?></p>
            <p>NILAI : <?php echo $rowDetailData["nilai"]; ?></p>
        </div>
    </div>
        <p class="row d-flex justify-content-end">TANGGAL TRAINING : <?php echo $rowDetailData["tanggal_training"]; ?></p>
        <hr>
            <?php 
            $resultTampilScoreGeneralHrdDetailNilaiOperator = tampilScoreGeneralHrdDetailNilaiOperator($con, $idUser);
            
            if (mysqli_num_rows($resultTampilScoreGeneralHrdDetailNilaiOperator) > 0){
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered text-center" width="100%" cellspacing="0">
                        <thead>
                            <tr style="font-size: .8rem;">
                                <th>No.</th>
                                <th>CODE OF CONDUCT</th>
                                <th>PKB, COMPENSATION & BENEFIT</th>
                                <th>NILAI PERATURAN PERUSAHAAN</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $index=1;
                        while($row1 = mysqli_fetch_assoc($resultTampilScoreGeneralHrdDetailNilaiOperator)){
                            ?>
                            <tr>
                            <td><?php echo $index;?></td>
                            <td><?php echo $row1["coc"];?></td>
                            <td><?php echo $row1["pkb_cab"];?></td>
                            <td><?php echo $row1["perperus"];?></td>
                            </tr>
                            <?php
                            $index++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
                <?php
                } 
                else {
                    ?>
                    <div class='text-center col-md-12'>
                        <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                            <p class='text-muted'>Data Nilai Masih Kosong</p>
                    </div>
                    <?php
                    }
                    ?>
                    <?php
                    }
                }
            ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->