<?php
  include "../config/connection.php";
  include "../process/proses_adminJabatan.php";
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
            <h6 class="m-0 font-weight-bold text-primary">Tambah Jabatan</h6>
        </div>
        <div class="card-body">
            <!-- FORM MENAMBAH DATA -->
            <form action="../process/proses_adminJabatan.php?module=jabatan&act=tambah" method="POST" class="user">
                <div class = "row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="jabatan" style="font-weight: bold">JABATAN</label>
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="JABATAN">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-4 mb-sm-3">
                                    <button type="submit" class="btn btn-success btn-icon-split" name="tambahJabatan">
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
                                <a href="#" class="btn btn-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
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
                            <p class="text-muted">Data beasiswa kosong</p>
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

</body>