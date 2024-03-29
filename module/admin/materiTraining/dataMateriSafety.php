<?php
  include "../config/connection.php";
  include "../process/proses_adminDataMateriSafety.php";
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
                    <span>Materi Safety</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Materi Safety File</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataMateriSafety.php?module=dataMateriSafety&act=tambah" id="formDataMateriAdmin" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control border-0" id="fileMateriSafety" name="fileMateriSafety" required>
                        <div class="col-sm-6">
                            <div id="fileMateriSafetyBlank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div> 
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="judulMateriSafety" name="judulMateriSafety" placeholder="Judul Materi ..." style="width=100%" required>
                        <div class="col-sm-12">
                            <div id="judulMateriSafetyBlank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="kategoriMateriSafety" name="kategoriMateriSafety" placeholder="Kategori Materi ..." style="width=100%" required>
                        <div class="col-sm-12">
                            <div id="kategoriMateriSafetyBlank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea id="keteranganMateriSafety" name="keteranganMateriSafety" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0" required></textarea>
                        <div class="col-sm-12">
                            <div id="keteranganMateriSafetyBlank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split" name="tambahDataMateriSafety" onclick="ValidasiTambahDataMateriSafety();">
                            <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <div class="row d-flex justify-content-end">
                            <button type="button" class="btn btn-info btn-icon-split" onclick="location.href='index.php?module=dataMateriSafetyLink';">
                                <span class="text">Tambah Data Link</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Materi Safety File</h6>
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
                                $queryTampilData = "SELECT * FROM tabel_materi_safety WHERE tipe LIKE '%file%';";
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;
                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                        <tr class="text-center" id-materi-safety="<?php echo $rowTampilData["id_materi_safety"] ?>">
                                            <td ><?php echo $index; ?></td>
                                            <td class="kategoriMateri"><?php echo $rowTampilData["kategori_materi"]; ?></td>
                                            <td class="judulMateri"><?php echo $rowTampilData["judul_materi"]; ?></td>
                                            <td class="fileMateri"><?php echo $rowTampilData["file_materi"]; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary edit-dataMateriSafety-admin mb-3 mb-sm-0" data-toggle="modal" data-target="#editDataMateriSafetyModal" id_materiSafetyEdit="<?php echo $rowTampilData["id_materi_safety"];?>">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <p></p>
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
                                }   
                                else{
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
    <div class="modal fade" id="editDataMateriSafetyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-materiSafety border-0">
                <h5 class="modal-title text-white w-100 text-center">Edit Data Materi Safety File</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataMateriSafety.php?module=dataMateriSafety&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_materi_safety" id="id_materiSafetyUpdate" >
                        <div class="container-fluid" id="edit-dataMateriSafety"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataMateriSafetyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</body>