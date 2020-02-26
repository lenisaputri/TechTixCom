<?php
include "../config/connection.php";
include "../process/proses_operatorScoreTechnical.php";
?>
<body>
<!-- Begin Page Content -->
<div class="container-fluid" id="technical">

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
                    <i class="fas fa-fw fa-shield-alt"></i>
                    <span>Data Nilai Technical Online Training</span>
                </li>
            </ol>
        </nav>

<!-- DataTales Example -->
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
                <select class="custom-select-karyawan my-1 mr-sm-2" name="jabatanAdminAdmin">  <!-- tampilannya belum -->
                <option value="0" class="text">Pilih Kategori Technical</option>
                    <?php
                    $resultTampilKategoriTechnical = tampilKategoriTechnical($con, $idUser);
                    if(mysqli_num_rows($resultTampilKategoriTechnical) > 0){
                        while($row = mysqli_fetch_assoc($resultTampilKategoriTechnical)){
                            echo "<option value='".$row['id_score_technical']."'>".$row['kategori_technical']."</option>";
                        }
                    } else {
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
                            <span class="text">Search</span>
                        </button>
                    </div>
      </div>
      </div>
      </form>
      <div class="table-responsive">
      <?php
                                    if(isset($_POST["cariKategoriTechnical"])){
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
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        if(mysqli_num_rows($result) > 0){
            $index=1;
            while($row = mysqli_fetch_assoc($result)){
                if(tampilScoreTechnicalOperator($con, $row["kategori_technical"]!=0){
            ?>
          <tr class="text-center">
            <td><?php echo $index; ?></td>
            <td><?php echo $row["poin"]; ?></td>
            <td><?php echo $row["nilai"]; ?></td>
            <td><?php echo $row["tanggal_training"]; ?></td>
            <td>
            <button type="button" class="btn btn-warning info-dataNilaiSafety-operator mb-2 mb-sm-0" data-toggle="modal" data-target="#infoDataNilaiSafetyOperatorModal" id_nilaiSafetyOperatotInfo="<?php echo $rowTampilData["id_score_safety"];?>">
                                                    <i class="fas fa-info-circle"></i>
                                                    <span>Detail Nilai</span>
                                                </button>
            </td>
          </tr>
          <?php
                }
                else if(tampilScoreTechnicalOperator($con, $row["kategori_technical"]==0){
                    ?>
                    <tr class="text-center">
            <td><?php echo $index; ?></td>
            <td><?php echo $row["poin"]; ?></td>
            <td><?php echo $row["nilai"]; ?></td>
            <td><?php echo $row["tanggal_training"]; ?></td>
            <td>
            <button type="button" class="btn btn-warning info-dataNilaiSafety-operator mb-2 mb-sm-0" data-toggle="modal" data-target="#infoDataNilaiSafetyOperatorModal" id_nilaiSafetyOperatotInfo="<?php echo $rowTampilData["id_score_safety"];?>">
                                                    <i class="fas fa-info-circle"></i>
                                                    <span>Detail Nilai</span>
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
          }   else{
            ?>
            <div class="text-center">
                                            <img src="../img/magnifier.svg" alt="pencarian" class="p-3">
                                            <p class="text-muted">Mahasiswa Tidak Ditemukan</p>
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
                                        <p class="text-muted">Data Mahasiswa Per-Kelas Tidak Ditemukan</p>
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

<div class="modal fade" id="infoDataNilaiSafetyOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-nilaiSafetyOperatorInfo border-0">
                <h5 class="modal-title text-white w-100 text-center">Data Nilai Online Training Safety</h5>
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
<!-- /.container-fluid -->
</body>