<?php
  include "../config/connection.php";
  include "../process/proses_adminJabatan.php";
?>
<body>
    <div class="container-fluid" id="jabatan">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-sitemap"></i>
                    <span>Jabatan</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Jabatan</h6>
            </div>
            <div class="card-body">
                <form action="../process/proses_adminJabatan.php?module=jabatan&act=tambah" method="POST" class="user">
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="jabatan" style="font-weight: bold">JABATAN</label>
                            <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="JABATAN" required>
                        </div>
                        <div class="col-sm-12">
                            <div id="namaBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-4 mb-sm-3">
                            <button type="submit" class="btn btn-success btn-icon-split float-right" name="tambahJabatan" onclick="ValidasiTambahJabatan();">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Jabatan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <?php
                    $resultTampilJabatan=tampilJabatan($con);
                    $index=1;
                    if (mysqli_num_rows($resultTampilJabatan) > 0){
                ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>NO.</th>
                                <th>Jabatan</th>
                                <th>Proses</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            while ($row = mysqli_fetch_assoc($resultTampilJabatan)) {
                        ?>
                            <tr>
                                <td class="text-center"><?= $index?></td>
                                <td><?= $row["nama"]?></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary edit-jabatan" data-toggle="modal" data-target="#editJabatanModal" id-jabatan="<?php echo $row["id_jabatan"];?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger hapus-jabatan" data-toggle="modal" data-target="#hapusJabatanModal" id-jabatan="<?php echo $row["id_jabatan"];?>">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                            $index++;
                            }
                        ?>
                        </tbody>
                    </table>
                    <?php
                        }else{
                    ?>
                        <div class="text-center">
                            <p class="text-muted">Data Jabatan kosong</p>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editJabatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-jabatan border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Jabatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="edit-jabatan"></div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusJabatanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminJabatan.php?module=jabatan&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_jabatan" id="id_jabatanHapus">
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusJabatan" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>