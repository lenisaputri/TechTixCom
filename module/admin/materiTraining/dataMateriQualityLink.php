<?php
  include "../config/connection.php";
  include "../process/proses_adminDataMateriQualityLink.php";
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
                <li class="breadcrumb-item">
                    <a href="index.php?module=dataMateriQuality"><i class="fas fa-fw fa-file"></i>
                        <span>Materi Quality</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-link"></i>
                    <span>Materi Quality Link</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Materi Quality Link</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataMateriQualityLink.php?module=dataMateriQualityLink&act=tambah" id="formDataMateriAdmin" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="linkMateriQualityLink" name="linkMateriQualityLink" placeholder="Link Materi ..." style="width=100%" required>
                        <div class="col-sm-6">
                            <div id="linkMateriQualityLinkBlank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="judulMateriQualityLink" name="judulMateriQualityLink" placeholder="Judul Materi ..." style="width=100%" required>
                        <div class="col-sm-12">
                            <div id="judulMateriQualityLinkBlank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <input type="text" class="form-control border-0" id="kategoriMateriQualityLink" name="kategoriMateriQualityLink" placeholder="Kategori Materi ..." style="width=100%" required>
                        <div class="col-sm-12">
                            <div id="kategoriMateriQualityLinkBlank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <textarea id="keteranganMateriQualityLink" name="keteranganMateriQualityLink" cols="30" rows="6" placeholder="Keterangan ..." class="form-control border-0" required></textarea>
                        <div class="col-sm-12">
                            <div id="keteranganMateriQualityLinkBlank" class="small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split" name="tambahDataMateriQualityLink" onclick="ValidasiTambahDataMateriQualityLink();">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data Link</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Materi Quality Link</h6>
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
                                $queryTampilData = "SELECT * FROM tabel_materi_quality WHERE tipe LIKE '%link%';";
                                
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;

                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                            <tr class="text-center" id-materi-qualityLink="<?php echo $rowTampilData["id_materi_quality"] ?>">
                                                <td ><?php echo $index; ?></td>
                                                <td class="kategoriMateri"><?php echo $rowTampilData["kategori_materi"]; ?></td>
                                                <td class="judulMateri"><?php echo $rowTampilData["judul_materi"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["file_materi"]; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary edit-dataMateriQualityLink-admin mb-3 mb-sm-0" data-toggle="modal" data-target="#editDataMateriQualityLinkModal" id_materiQualityLinkEdit="<?php echo $rowTampilData["id_materi_quality"];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger hapus-dataMateriQualityLink-admin" data-toggle="modal" data-target="#hapusDataMateriQualityLinkModal" id_materi_quality="<?php echo $rowTampilData["id_materi_quality"];?>">
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
    <div class="modal fade" id="editDataMateriQualityLinkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-materiQualityLink border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Materi Quality Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataMateriQualityLink.php?module=dataMateriQualityLink&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_materi_quality" id="id_materiQualityLinkUpdate" >
                        <div class="container-fluid" id="edit-dataMateriQualityLink"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataMateriQualityLinkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataMateriQualityLink.php?module=dataMateriQualityLink&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_materi_quality" id="id_materiQualityLinkHapus">
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataMateriQualityLink" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>