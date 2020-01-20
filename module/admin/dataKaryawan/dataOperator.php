<?php
  include "../config/connection.php";
  include "../process/proses_adminDataOperator.php";
?>
<body onload="setup2();">
<!-- Begin Page Content -->
<div class="container-fluid" id="dataKaryawan" onload="setup2();">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Operator</h6>
        </div>
        <div class="card-body">
            <!-- FORM MENAMBAH DATA -->
            <form class="user" action="../process/proses_adminDataOperator.php?module=dataOperator&act=tambah" id="formDataOperatorAdmin" method="POST" enctype="multipart/form-data">
                <div class = "row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="username" style="font-weight: bold">USERNAME</label>
                                <input type="text" class="form-control form-control-user" placeholder="USERNAME" id="usernameOperatorAdmin" name="usernameOperatorAdmin" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="usernameOperatorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="passwordOperatorAdmin" style="font-weight: bold">PASSWORD</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-user" name="passwordOperatorAdmin" id="passwordOperatorAdmin" placeholder="**********" required >
                                    <div class="input-group-append">
                                        <span class="far fa-eye input-group-text form-control form-control-user" id="eyeOperator" onclick="showPasswordOperator();"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div id="passwordOperatorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="gambar" style="font-weight: bold">GAMBAR</label>
                                <div class="input-group col-sm-10">
                                    <img src="../attachment/img/avatar.jpeg" id="fotoPrevOperatorAdmin3" height="200px" width="200px">
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <br>
                                    <input id='fileid2' type='file' name='fileid2' onchange="preview_images22(event);"  hidden required />
                                    <input id='buttonid2' type='button' value='Load Gambar'class="btn btn-loading btn-primary tmbl-loading ml-2"  />
                                </div>
                                <div class="col-sm-12">
                                    <div id="fileidOperatorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nik" style="font-weight: bold">NIK</label>
                                <input type="text" class="form-control form-control-user" placeholder="NIK OPERATOR" id="nikOperatorAdmin" name="nikOperatorAdmin" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="nikOperatorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nama" style="font-weight: bold">NAMA LENGKAP</label>
                                <input type="text" class="form-control form-control-user" placeholder="NAMA OPERATOR" id="namaOperatorAdmin" name="namaOperatorAdmin" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="namaOperatorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="jabatan" style="font-weight: bold">JABATAN</label>
                                <?php
                                    $resultJabatan = tampilJabatan($con);
                                ?>
                               <select class="custom-select my-1 mr-sm-2" name="jabatanOperatorAdmin">  <!-- tampilannya belum -->
                                    <?php
                                        if(mysqli_num_rows($resultJabatan) > 0){
                                            while($row = mysqli_fetch_assoc($resultJabatan)){
                                                echo "<option value='".$row['id_jabatan']."'>".$row['nama']."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">STATUS KARYAWAN</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input form-control-user" type="radio" name="statusOperatorAdmin" id="statusOperatorAdmin1" value="Aktif">
                                    <label class="form-check-label" for="statusOperatorAdmin1">Aktif</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="statusOperatorAdmin" id="statusOperatorAdmin2" value="Non-Aktif">
                                    <label class="form-check-label" for="statusOperatorAdmin2">Non-Aktif</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-success btn-icon-split" name="tambahDataOperator" onclick="ValidasiTambah(); preventDefaultAction(event);">
                                        <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Data</span>
                                    </a>
                                </div>
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
            <h6 class="m-0 font-weight-bold text-primary">Data Operator</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Gambar</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $queryTampilData = "SELECT tp.*, tp.nama AS nama_lengkap ,tj.*, tj.nama AS nama_jabatan, tu.* FROM tabel_operator tp,tabel_jabatan tj,tabel_user tu WHERE tp.id_jabatan = tj.id_jabatan
                            AND tp.id_user = tu.id_user;
                            ";
                        
                        $resultTampilData = mysqli_query($con, $queryTampilData);
                        $index = 1;

                        if(mysqli_num_rows($resultTampilData) > 0){
                            while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                    ?>
                        <tr class="text-center" id-operator="<?php echo $rowTampilData["id_operator"] ?>">
                            <td ><?php echo $index; ?></td>
                            <td class="usernameOperator"><?php echo $rowTampilData["username"]; ?></td>
                            <td class="passwordOperator">**********</td>
                            <td class="fotoOperator"><img src="../attachment/img/<?php echo ($rowTampilData['foto'] == null)? 'avatar.jpeg' : $rowTampilData['foto'] ; ?>" style="width:50px;height:50px;border-radius:50%;"></td>
                            <td class="nikOperator"><?php echo $rowTampilData["nik"]; ?></td>
                            <td class="namaOperator"><?php echo $rowTampilData["nama_lengkap"]; ?></td>
                            <td class="jabatanOperator"><?php echo $rowTampilData["nama_jabatan"]; ?></td>
                            <td class="statusOperator"><?php echo $rowTampilData["status_aktif"]; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary edit-dataOperator-admin" data-toggle="modal" data-target="#editDataOperatorModal" id_userEdit="<?php echo $rowTampilData["id_user"];?>" id_operatorEdit="<?php echo $rowTampilData["id_operator"];?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger hapus-jabatan" data-toggle="modal" data-target="#hapusJabatanModal" id_userHapus="<?php echo $row["id_user"];?>" id_operatorHapus="<?php echo $row["id_operator"];?>">
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
                        <div>
                            <p>Data Operator tidak tersedia</p>
                        </div>
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
<div class="modal fade" id="editDataOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-operator border-0">
          <h5 class="modal-title text-white w-100 text-center">Edit Data Operator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../process/proses_adminDataOperator.php?module=dataOperator&act=edit" id="formEditDataOperatorAdmin" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_user" id="id_userUpdate" >
                <input type="hidden" name="id_operator" id="id_operatorUpdate" >
                <div class="container-fluid" id="edit-dataOperator">

                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
          <!-- End Modal Edit Jabatan -->

</body>