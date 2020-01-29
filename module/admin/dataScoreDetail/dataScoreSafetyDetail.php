<?php
  include "../config/connection.php";
?>
<body>
<!-- Begin Page Content -->
<div class="container-fluid" id="dataMateri">
    <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="index.php?module=dataScoreSafety" >
                    <i class="fas fa-fw fa-trophy"></i>
                        <span>Data Score Safety</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Data Score Safety Detail</span>
                </li>
            </ol>
        </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Score Safety Detail</h6>
        </div>
        <div class="card-body">
            <!-- FORM MENAMBAH DATA -->
            <form class="user" action="" id="formDataMateriAdmin" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                        <input type="file" class="form-control border-0" id="inputFile" name="fileMateri">
                        <div class="col-sm-12">
                            <div id="fileMateriAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                </div> 
                <hr>
                <div class="form-group">
                            <button type="submit" class="btn btn-success btn-icon-split" name="tambahDataMateri" onclick="ValidasiTambahDataMateri();">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </button>
                </div>
                <!-- NANTI DIGANTI TYPE BUTTON TAMBAH BUKA A HREF -->
            </form>
            <!-- PROSES FORM MENAMBAH DATA SELESAI -->
        </div>
    </div>
    <!-- MENAMPILKAN DATA -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Materi Safety</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>NIK</th>
                            <th>SMK3</th>
                            <th>EA-Hira</th>
                            <th>Movement Forklift</th>
                            <th>Confined Space</th>
                            <th>Loto</th>
                            <th>APD</th>
                            <th>BBS</th>
                            <th>Fire Fighting</th>
                            <th>WAH</th>
                            <th>Environment</th>
                            <th>P3K</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $queryTampilData = "SELECT * FROM tabel_score_safety_detail;
                            ";
                        
                        $resultTampilData = mysqli_query($con, $queryTampilData);
                        $index = 1;

                        if(mysqli_num_rows($resultTampilData) > 0){
                            while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                    ?>
                        <tr class="text-center" id-score-safety-detail="<?php echo $rowTampilData["id_score_safety_detail"] ?>">
                            <td ><?php echo $index; ?></td>
                            <td class="kategoriMateri"><?php echo $rowTampilData["kategori_materi"]; ?></td>
                            <td class="judulMateri"><?php echo $rowTampilData["smk3"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["ea-hira"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["movement_forklift"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["confined_space"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["loto"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["apd"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["bbs"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["fire_fighting"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["wah"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["environment"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["p3k"]; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary edit-dataMateriSafety-admin" data-toggle="modal" data-target="#editDataMateriSafetyModal" id_materiSafetyEdit="<?php echo $rowTampilData["id_materi_safety"];?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger hapus-dataMateriSafety-admin" data-toggle="modal" data-target="#hapusDataMateriSafetyModal" id_materi_safety="<?php echo $rowTampilData["id_materi_safety"];?>">
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
<div class="modal fade" id="editDataMateriSafetyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-materiSafety border-0">
          <h5 class="modal-title text-white w-100 text-center">Edit Data Materi Safety</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../process/proses_adminDataMateriSafety.php?module=dataMateriSafety&act=edit" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_materi_safety" id="id_materiSafetyUpdate" >
                <div class="container-fluid" id="edit-dataMateriSafety">

                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
 <!-- End Modal Edit Jabatan -->

    <!-- Modal Hapus Jabatan-->
    <div class="modal fade" id="hapusDataMateriSafetyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="../process/proses_adminDataMateriSafety.php?module=dataMateriSafety&act=hapus" method="post">
            <div class="modal-body pt-5 text-center">
            <input type="hidden" name="id_materi_safety" id="id_materiSafetyHapus" >
              <strong>Apakah Anda yakin?</strong>
            </div>
            <div class="pb-4 pt-4 d-flex justify-content-around">
              <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
              <button type="submit" name="hapusDataMateriSafety" class="btn btn-success btn-ok">Ya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal Hapus Jabatan -->
</body>