<?php
  include "../config/connection.php";
  include "../process/proses_adminDataMateriTechnical.php";
?>
<body>
<!-- Begin Page Content -->
<div class="container-fluid" id="dataKaryawan">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Materi Technical</h6>
        </div>
        <div class="card-body">
            <!-- FORM MENAMBAH DATA -->
            <form class="user" action="../process/proses_adminDataMateriTechnical.php?module=dataMateriTechnical&act=tambah" id="formDataMateriAdmin" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="file" class="form-control border-0" id="inputGroupFile02" name="fileMateri">
                    <div class="col-sm-12">
                        <div id="namaOperatorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div> 
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="judulMateri" name="judulMateri" placeholder="Judul Materi ..." style="width=100%" required>
                    <div class="col-sm-12">
                        <div id="judulMateriBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <input type="text" class="form-control border-0" id="kategoriMateri" name="kategoriMateri" placeholder="Kategori Materi ..." style="width=100%" required>
                    <div class="col-sm-12">
                        <div id="kategoriMateriBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <textarea id="keteranganMateri" name="keteranganMateri" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0"></textarea>
                    <div class="col-sm-12">
                        <div id="keteranganMateriBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <div class="row">
                       <div class="col-6">
                        </div>
                        <div class="col-6 text-right d-flex justify-content-end ">
                            <button type="submit" class="btn btn-success btn-icon-split" name="tambahDataMateri" onclick="ValidasiTambahDataMateri();">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </button>
                        </div>
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
            <h6 class="m-0 font-weight-bold text-primary">Data Operator</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Kategori Materi</th>
                            <th>Judul</th>
                            <th>File</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $queryTampilData = "SELECT * FROM tabel_technical;
                            ";
                        
                        $resultTampilData = mysqli_query($con, $queryTampilData);
                        $index = 1;

                        if(mysqli_num_rows($resultTampilData) > 0){
                            while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                    ?>
                        <tr class="text-center" id-materi="<?php echo $rowTampilData["id_materi_technical"] ?>">
                            <td ><?php echo $index; ?></td>
                            <td class="kategoriMateri"><?php echo $rowTampilData["kategori_materi"]; ?></td>
                            <td class="judulMateri"><?php echo $rowTampilData["judul_materi"]; ?></td>
                            <td class="fileMateri"><?php echo $rowTampilData["file_materi"]; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary edit-dataMateri-admin" data-toggle="modal" data-target="#editDataMateriTechnicalModal" id_materiTechnicalEdit="<?php echo $rowTampilData["id_materi_technical"];?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger hapus-dataMateri-admin" data-toggle="modal" data-target="#hapusDataMateriTechnicalModal" id_materiTechnicalEdit="<?php echo $rowTampilData["id_materi_technical"];?>">
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
        <div class="modal-header d-flex justify-content-center bg-operator border-0">
          <h5 class="modal-title text-white w-100 text-center">Edit Data Materi Technical</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../process/proses_adminDataMateriTechnical.php?module=dataMateriTechnical&act=edit" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_user" id="id_userUpdate" >
                <div class="container-fluid" id="edit-dataOperator">

                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
 <!-- End Modal Edit Jabatan -->

    <!-- Modal Hapus Jabatan-->
    <div class="modal fade" id="hapusDataOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="../process/proses_adminDataOperator.php?module=dataOperator&act=hapus" method="post">
            <div class="modal-body pt-5 text-center">
            <input type="hidden" name="id_user" id="id_userHapus" >
            <input type="hidden" name="id_operator" id="id_operatorHapus" >
              <strong>Apakah Anda yakin?</strong>
            </div>
            <div class="pb-4 pt-4 d-flex justify-content-around">
              <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
              <button type="submit" name="hapusDataOperator" class="btn btn-success btn-ok">Ya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal Hapus Jabatan -->
</body>