<?php
  include "../config/connection.php";
  include "../process/proses_adminDataSupervisor.php";
?>
<body onload="setupSupervisor2();">
<!-- Begin Page Content -->
<div class="container-fluid" id="dataKaryawan" onload="setupSupervisor2();">
<nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>Data Supevisor</span>
                </li>
            </ol>
        </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Supervisor</h6>
        </div>
        <div class="card-body">
            <!-- FORM MENAMBAH DATA -->
            <form class="user" action="../process/proses_adminDataSupervisor.php?module=dataSupervisor&act=tambah" id="formDataSupervisorAdmin" method="POST" enctype="multipart/form-data">
                <div class = "row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="username" style="font-weight: bold">USERNAME</label>
                                <input type="text" class="form-control form-control-user" placeholder="USERNAME" id="usernameSupervisorAdmin" name="usernameSupervisorAdmin" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="usernameSupervisorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="passwordSupervisorAdmin" style="font-weight: bold">PASSWORD</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-user" name="passwordSupervisorAdmin" id="passwordSupervisorAdmin" placeholder="**********" required >
                                    <div class="input-group-append">
                                        <span class="far fa-eye input-group-text form-control form-control-user" id="eyeSupervisor" onclick="showPasswordSupervisor();"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div id="passwordSupervisorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="gambar" style="font-weight: bold">GAMBAR</label>
                                <div class="input-group col-sm-10">
                                    <img src="../attachment/img/avatar.jpeg" id="fotoPrevSupervisorAdmin3" height="200px" width="200px">
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <br>
                                    <input id='fileid2' type='file' name='fileid2' onchange="preview_imagesSupervisor22(event);"  hidden required />
                                    <input id='buttonid2' type='button' value='Load Gambar'class="btn btn-loading btn-primary tmbl-loading ml-2"  />
                                </div>
                                <div class="col-sm-12">
                                    <div id="fileidSupervisorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nik" style="font-weight: bold">NIK</label>
                                <input type="text" class="form-control form-control-user" placeholder="NIK SUPERVISOR" id="nikSupervisorAdmin" name="nikSupervisorAdmin" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="nikSupervisorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nama" style="font-weight: bold">NAMA LENGKAP</label>
                                <input type="text" class="form-control form-control-user" placeholder="NAMA SUPERVISOR" id="namaSupervisorAdmin" name="namaSupervisorAdmin" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="namaSupervisorAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">JENIS KELAMIN</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input form-control-user" type="radio" name="jkSupervisorAdmin" id="jkSupervisorAdmin1" value="Laki-Laki">
                                    <label class="form-check-label" for="jkSupervisorAdmin1">Laki-Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jkSupervisorAdmin" id="jkSupervisorAdmin2" value="Perempuan">
                                    <label class="form-check-label" for="jkSupervisorAdmin2">Perempuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="jabatan" style="font-weight: bold">JABATAN</label>
                                <?php
                                    $resultJabatan = tampilJabatan($con);
                                ?>
                               <select class="custom-select-karyawan my-1 mr-sm-2" name="jabatanSupervisorAdmin">  <!-- tampilannya belum -->
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
                    </div>
                </div>

                <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                    <button type="submit" class="btn btn-success btn-icon-split float-right" name="tambahDataSupervisor" onclick="ValidasiTambahSupervisor(); preventDefaultActionSupervisor(event);">
                                        <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Data</span>
                                    </a>
                                </div>
                        </div>
            </form>
            <!-- PROSES FORM MENAMBAH DATA SELESAI -->
        </div>
    </div>
    <!-- MENAMPILKAN DATA -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Supervisor</h6>
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
                            <th>Jenis Kelamin</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $queryTampilData = "SELECT ts.*, ts.nama AS nama_lengkap ,tj.*, tj.nama AS nama_jabatan, tu.* FROM tabel_supervisor ts,tabel_jabatan tj,tabel_user tu WHERE ts.id_jabatan = tj.id_jabatan
                            AND ts.id_user = tu.id_user;
                            ";
                        
                        $resultTampilData = mysqli_query($con, $queryTampilData);
                        $index = 1;

                        if(mysqli_num_rows($resultTampilData) > 0){
                            while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                    ?>
                        <tr class="text-center" id-supervisor="<?php echo $rowTampilData["id_supervisor"] ?>">
                            <td ><?php echo $index; ?></td>
                            <td class="usernameSupervisor"><?php echo $rowTampilData["username"]; ?></td>
                            <td class="passwordSupervisor">**********</td>
                            <td class="fotoSupervisor"><img src="../attachment/img/<?php echo ($rowTampilData['foto'] == null)? 'avatar.jpeg' : $rowTampilData['foto'] ; ?>" style="width:50px;height:50px;border-radius:50%;"></td>
                            <td class="nikSupervisor"><?php echo $rowTampilData["nik"]; ?></td>
                            <td class="namaSupervisor"><?php echo $rowTampilData["nama_lengkap"]; ?></td>
                            <td class="jkSupervisor"><?php echo $rowTampilData["jenis_kelamin"]; ?></td>
                            <td class="jabatanSupervisor"><?php echo $rowTampilData["nama_jabatan"]; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary edit-dataSupervisor-admin" data-toggle="modal" data-target="#editDataSupervisorModal" id_userEdit="<?php echo $rowTampilData["id_user"];?>" id_supervisorEdit="<?php echo $rowTampilData["id_supervisor"];?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-danger hapus-dataSupervisor-admin" data-toggle="modal" data-target="#hapusDataSupervisorModal" id_user="<?php echo $rowTampilData["id_user"];?>" id_supervisor="<?php echo $rowTampilData["id_supervisor"];?>">
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
<div class="modal fade" id="editDataSupervisorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center bg-supervisor border-0">
          <h5 class="modal-title text-white w-100 text-center">Edit Data Operator</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="../process/proses_adminDataSupervisor.php?module=dataSupervisor&act=edit" id="formEditDataSupervisorAdmin" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_user" id="id_userUpdate" >
                <input type="hidden" name="id_supervisor" id="id_supervisorUpdate" >
                <div class="container-fluid" id="edit-dataSupervisor">

                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
 <!-- End Modal Edit Jabatan -->

<!-- Modal Hapus Jabatan-->
     <div class="modal fade" id="hapusDataSupervisorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <form action="../process/proses_adminDataSupervisor.php?module=dataSupervisor&act=hapus" method="post">
            <div class="modal-body pt-5 text-center">
            <input type="hidden" name="id_user" id="id_userHapus" >
            <input type="hidden" name="id_supervisor" id="id_supervisorHapus" >
              <strong>Apakah Anda yakin?</strong>
            </div>
            <div class="pb-4 pt-4 d-flex justify-content-around">
              <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
              <button type="submit" name="hapusDataSupervisor" class="btn btn-success btn-ok">Ya</button>
            </div>
          </form>
        </div>
      </div>
    </div>
<!-- End Modal Hapus Jabatan -->
</body>