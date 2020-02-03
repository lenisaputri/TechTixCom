<?php
include "../config/connection.php";
include "../process/proses_supervisorScoreSafety.php";
?>
<!-- Begin Page Content -->
<div class="container-fluid" id="safety">
<nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="index.php?module=safetyTable" ><i class="fas fa-fw fa-shield-alt"></i>
                        <span>Data Score Safety</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Data Score Safety Detail</span>
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
        $resultTampilScoreSafetyDetailSupervisor = tampilScoreSafetyDetailSupervisor($con);

        if (mysqli_num_rows($resultTampilScoreSafetyDetailSupervisor) > 0){
          while ($rowDetailData = mysqli_fetch_assoc($resultTampilScoreSafetyDetailSupervisor)) {
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
                $resultTampilScoreSafetyDetailNilaiSupervisor = tampilScoreSafetyDetailNilaiSupervisor($con);

                if (mysqli_num_rows($resultTampilScoreSafetyDetailNilaiSupervisor) > 0){
                    ?>
                        <div class="table-responsive">
                                <table class="table table-bordered text-center" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="font-size: .8rem;">
                                            <th>No.</th>
                                            <th>SMK3</th>
                                            <th>EA-HIRA</th>
                                            <th>MOVEMENT FORKLIFT</th>
                                            <th>CONFINED SPACE</th>
                                            <th>LOTO</th>
                                            <th>APD</th>
                                            <th>BBS</th>
                                            <th>FIRE FIGHTING</th>
                                            <th>WAH</th>
                                            <th>ENVIRONMENT</th>
                                            <th>P3K</th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                    <?php 
                                            $index=1;
                                            while($row1 = mysqli_fetch_assoc($resultTampilScoreSafetyDetailNilaiSupervisor)){
                                                ?>
                                                 <tr>
                                                        <td><?php echo $index;?></td>
                                                        <td><?php echo $row1["smk3"];?></td>
                                                        <td><?php echo $row1["ea_hira"];?></td>
                                                        <td><?php echo $row1["movement_forklift"];?></td>
                                                        <td><?php echo $row1["confined_space"];?></td>
                                                        <td><?php echo $row1["loto"];?></td>
                                                        <td><?php echo $row1["apd"];?></td>
                                                        <td><?php echo $row1["bbs"];?></td>
                                                        <td><?php echo $row1["fire_fighting"];?></td>
                                                        <td><?php echo $row1["wah"];?></td>
                                                        <td><?php echo $row1["environment"];?></td>
                                                        <td><?php echo $row1["p3k"];?></td>
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