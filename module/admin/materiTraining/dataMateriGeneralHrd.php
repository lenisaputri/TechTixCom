<?php
  include "../config/connection.php";
  include "../process/proses_adminDataMateriGeneralHrd.php";
?>
<body>
    <div class="container-fluid" id="dataMateri">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Materi General HRD</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Materi General HRD</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataMateriGeneralHrd.php?module=dataMateriGeneralHrd&act=tambah" id="formDataMateriAdmin" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control border-0" id="inputFile" name="fileMateri">
                        <div class="col-sm-6">
                            <div id="fileMateriAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
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
                        <button type="submit" class="btn btn-success btn-icon-split" name="tambahDataMateri" onclick="ValidasiTambahDataMateri();">
                            <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <div class="row d-flex justify-content-end">
                            <button type="button" class="btn btn-info btn-icon-split" name="tambahDataMateriLink" onclick="location.href='index.php?module=dataMateriGeneralHrdLink';">
                                <span class="text">Tambah Data Link</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Materi General HRD</h6>
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
                                $queryTampilData = "SELECT * FROM tabel_materi_generalhrd WHERE tipe LIKE '%file%';";
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;
                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                            ?>
                            <tr class="text-center" id-materi="<?php echo $rowTampilData["id_materi_generalhrd"] ?>">
                                <td ><?php echo $index; ?></td>
                                <td class="kategoriMateri"><?php echo $rowTampilData["kategori_materi"]; ?></td>
                                <td class="judulMateri"><?php echo $rowTampilData["judul_materi"]; ?></td>
                                <td class="fileMateri"><?php echo $rowTampilData["file_materi"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary edit-dataMateriGeneralHrd-admin mb-3 mb-sm-0" data-toggle="modal" data-target="#editDataMateriGeneralHrdModal" id_materiGeneralHrdEdit="<?php echo $rowTampilData["id_materi_generalhrd"];?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <br>
                                    <button type="button" class="btn btn-danger hapus-dataMateriGeneralHrd-admin" data-toggle="modal" data-target="#hapusDataMateriGeneralHrdModal" id_materi_generalhrd="<?php echo $rowTampilData["id_materi_generalhrd"];?>">
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
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editDataMateriGeneralHrdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-materiGeneralHrd border-0">
                <h5 class="modal-title text-white w-100 text-center">Edit Data Materi General HRD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataMateriGeneralHrd.php?module=dataMateriGeneralHrd&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_materi_generalhrd" id="id_materiGeneralHrdUpdate" >
                        <div class="container-fluid" id="edit-dataMateriGeneralHrd"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataMateriGeneralHrdModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataMateriGeneralHrd.php?module=dataMateriGeneralHrd&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_materi_generalhrd" id="id_materiGeneralHrdHapus" >
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <p></p>
                        <button type="submit" name="hapusDataMateriGeneralHrd" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>