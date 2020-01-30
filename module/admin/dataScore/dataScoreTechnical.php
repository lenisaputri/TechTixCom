<?php
  include "../config/connection.php";
  include "../process/proses_adminDataScoreTechnical.php";
?>
<body>
<!-- Begin Page Content -->
<div class="container-fluid" id="dataScore">
    <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-trophy"></i>
                    <span>Data Score Technical</span>
                </li>
            </ol>
        </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Score Technical</h6>
        </div>
        <div class="card-body">
            <!-- FORM MENAMBAH DATA -->
            <form class="user" action="" method="POST">
                <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="jabatan" style="font-weight: bold">NIK OPERATOR</label>
                                <?php
                                    $resultOperator = tampilOperator($con);
                                ?>
                               <select class="custom-select-karyawan my-1 mr-sm-2" name="jabatanOperatorAdmin">  <!-- tampilannya belum -->
                                    <?php
                                        if(mysqli_num_rows($resultOperator) > 0){
                                            while($row = mysqli_fetch_assoc($resultOperator)){
                                                echo "<option value='".$row['id_operator']."'>".$row['nik']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="username" style="font-weight: bold">TOTAL POIN</label>
                                    <input type="number" class="form-control form-control-user" placeholder="TOTAL POIN" id="usernameAdminAdmin" name="usernameAdminAdmin" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="usernameAdminAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="username" style="font-weight: bold">TOTAL NILAI</label>
                                    <input type="number" class="form-control form-control-user" placeholder="TOTAL NILAI" id="usernameAdminAdmin" name="usernameAdminAdmin" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="usernameAdminAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="username" style="font-weight: bold">TANGGAL ASSESMENT</label>
                                <div class="input-group date" id="datepickerTanggalTraining" data-provide="datepicker">
                                    <input type="text" id="batasTanggal" class="form-control form-control-user datepicker" placeholder="TANGGAL ASSESMENT" name="batasTanggal">
                                    <div class="input-group-addon">
                                        <span class="input-group-text form-control form-control-user">
                                            <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                    <div id="usernameAdminAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                        </div>
                        <hr>
                        <div class="form-group">
                    <button type="submit" class="btn btn-success btn-icon-split mb-2 mb-sm-0" name="tambahDataMateri" onclick="ValidasiTambahDataMateri();">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                        </button>
                    <button type="button" class="btn btn-warning btn-icon-split" onclick="location.href='index.php?module=dataScoreTechnicalImport';">
                            <span class="icon text-white-50">
                            <i class="fas fa-arrow-circle-up"></i>
                                </span>
                                <span class="text">Import xlxs</span>
                            </button>
                </div>
                <div class="form-group">
                    <div class="row d-flex justify-content-end">
                        <button type="button" class="btn btn-info btn-icon-split" name="tambahDataMateri" onclick="location.href='index.php?module=dataScoreTechnicalDetail';">
                            <span class="text">Tambah Data Detail</span>
                        </button>
                    </div>
                </div>
                <!-- NANTI DIGANTI TYPE BUTTON TAMBAH BUKA A HREF -->
            </form>
            <!-- PROSES FORM MENAMBAH DATA SELESAI -->
        </div>
    </div>
    <!-- MENAMPILKAN DATA -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Materi Technical</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Total Nilai</th>
                            <th>Total Poin</th>
                            <th>Tanggal Assessment</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $queryTampilData = "SELECT * FROM tabel_score_technical;
                            ";
                        
                        $resultTampilData = mysqli_query($con, $queryTampilData);
                        $index = 1;

                        if(mysqli_num_rows($resultTampilData) > 0){
                            while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                    ?>
                        <tr class="text-center" id-score-technical="<?php echo $rowTampilData["id_score_technical"] ?>">
                            <td ><?php echo $index; ?></td>
                            <td class="kategoriMateri"><?php echo $rowTampilData["kategori_materi"]; ?></td>
                            <td class="judulMateri"><?php echo $rowTampilData["poin"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["nilai"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["tanggal_training"]; ?></td>
                            <td> 
                                <button type="button" class="btn btn-warning hapus-dataMateriTechnical-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#hapusDataMateriTechnicalModal" id_materi_technical="<?php echo $rowTampilData["id_materi_technical"];?>">
                                    <i class="fas fa-info-circle"></i>
                                </button>
                                <button type="button" class="btn btn-primary edit-dataMateriTechnical-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#editDataMateriTechnicalModal" id_materiTechnicalEdit="<?php echo $rowTampilData["id_materi_technical"];?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger hapus-dataMateriTechnical-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#hapusDataMateriTechnicalModal" id_materi_technical="<?php echo $rowTampilData["id_materi_technical"];?>">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
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
<!-- MENAMPILKAN DATA SELESAI-->
</div>
<!-- /.container-fluid -->

<!-- Modal Edit Jabatan-->
<div class="modal fade" id="editDataMateriTechnicalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-materiTechnical border-0">
          <h5 class="modal-title text-white w-100 text-center">Edit Data Materi Technical</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../process/proses_adminDataMateriTechnical.php?module=dataMateriTechnical&act=edit" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_materi_technical" id="id_materiTechnicalUpdate" >
                <div class="container-fluid" id="edit-dataMateriTechnical">

                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
 <!-- End Modal Edit Jabatan -->

    <!-- Modal Hapus Jabatan-->
    <div class="modal fade" id="hapusDataMateriTechnicalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="../process/proses_adminDataMateriTechnical.php?module=dataMateriTechnical&act=hapus" method="post">
            <div class="modal-body pt-5 text-center">
            <input type="hidden" name="id_materi_technical" id="id_materiTechnicalHapus" >
              <strong>Apakah Anda yakin?</strong>
            </div>
            <div class="pb-4 pt-4 d-flex justify-content-around">
              <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
              <button type="submit" name="hapusDataMateriTechnical" class="btn btn-success btn-ok">Ya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal Hapus Jabatan -->
</body>