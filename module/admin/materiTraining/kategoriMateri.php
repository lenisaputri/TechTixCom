<?php
include "../config/connection.php";
include "../process/proses_adminKategoriMateri.php";
?>
<body>
<!-- Begin Page Content -->
<div class="container-fluid" id="kategoriMateri">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Kategori Materi</h6>
        </div>
        <div class="card-body">
            <!-- FORM MENAMBAH DATA -->
            <form action="../process/proses_adminKategoriMateri.php?module=kategoriMateri&act=tambah" method="POST" class="user">
                <div class = "row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="kategori_materi" style="font-weight: bold">KATEGORI MATERI</label>
                                <input type="text" class="form-control form-control-user" id="kategori_materi" name="kategori_materi" placeholder="KATEGORI MATERI" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="kategori_materiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <button type="submit" class="btn btn-success btn-icon-split" name="tambahKategoriMateri" onclick="ValidasiTambahKategoriMateri();">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Data</span>
                                </button>
                            </div>
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
            <h6 class="m-0 font-weight-bold text-primary">Data Kategori Materi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <?php
                $resultTampilKategoriMateri=tampilKategoriMateri($con);
                $index=1;
                if (mysqli_num_rows($resultTampilKategoriMateri) > 0){
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Kategori Materi</th>
                            <th>Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        while ($row = mysqli_fetch_assoc($resultTampilKategoriMateri)) {
                    ?>
                        <tr>
                            <td class="text-center"><?= $index?></td>
                            <td><?= $row["kategori_materi"]?></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-primary edit-kategoriMateri" data-toggle="modal" data-target="#editKategoriMateriModal" id-kategori-materi="<?php echo $row["id_kategori_materi"];?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger hapus-kategoriMateri" data-toggle="modal" data-target="#hapusKategoriMateriModal" id-kategori-materi="<?php echo $row["id_kategori_materi"];?>">
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
                            <p class="text-muted">Data Kategori Materi kosong</p>
                        </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
<!-- MENAMPILKAN DATA SELESAI-->
</div>
<!-- /.container-fluid -->

<!-- Modal Edit Jabatan-->
<div class="modal fade" id="editKategoriMateriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-kategoriMateri border-0">
          <h5 class="modal-title text-white w-100 text-center">Edit Data Kategori Materi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="edit-kategoriMateri">
          
        </div>
      </div>
    </div>
  </div>
          <!-- End Modal Edit Jabatan -->

    <!-- Modal Hapus Jabatan-->
    <div class="modal fade" id="hapusKategoriMateriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="../process/proses_adminKategoriMateri.php?module=kategoriMateri&act=hapus" method="post">
            <div class="modal-body pt-5 text-center">
              <input type="hidden" name="id_kategori_materi" id="id_kategoriMateriHapus">
              <strong>Apakah Anda yakin?</strong>
            </div>
            <div class="pb-4 pt-4 d-flex justify-content-around">
              <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
              <button type="submit" name="hapusKategoriMateri" class="btn btn-success btn-ok">Ya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Modal Hapus Jabatan -->

</body>