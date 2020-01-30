<?php
  include "../config/connection.php";
  include "../process/proses_adminDataOperator.php";
?>
<body onload="setupOperator2();">
    <div class="container-fluid" id="dataKaryawan" onload="setupOperator2();">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>Data Operator</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Operator</h6>
            </div>
            <div class="card-body">
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
                                        <input id='fileid2' type='file' name='fileid2' onchange="preview_imagesOperator22(event);"  hidden required />
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
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">JENIS KELAMIN</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input form-control-user" type="radio" name="jkOperatorAdmin" id="jkOperatorAdmin1" value="Laki-Laki">
                                        <label class="form-check-label" for="jkOperatorAdmin1">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jkOperatorAdmin" id="jkOperatorAdmin2" value="Perempuan">
                                        <label class="form-check-label" for="jkOperatorAdmin2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="jabatan" style="font-weight: bold">JABATAN</label>
                                    <?php
                                        $resultJabatan = tampilJabatan($con);
                                    ?>
                                    <select class="custom-select-karyawan my-1 mr-sm-2" name="jabatanOperatorAdmin">  <!-- tampilannya belum -->
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
                            <button type="submit" class="btn btn-success btn-icon-split float-right" name="tambahDataOperator" onclick="ValidasiTambahOperator(); preventDefaultActionOperator(event);">
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
                                <th>Jenis Kelamin</th>
                                <th>Jabatan</th>
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
                                <td class="jkOperator"><?php echo $rowTampilData["jenis_kelamin"]; ?></td>
                                <td class="jabatanOperator"><?php echo $rowTampilData["nama_jabatan"]; ?></td>
                                <td>
                                    <button type="button" class="btn btn-primary edit-dataOperator-admin" data-toggle="modal" data-target="#editDataOperatorModal" id_userEdit="<?php echo $rowTampilData["id_user"];?>" id_operatorEdit="<?php echo $rowTampilData["id_operator"];?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <p></p>
                                    <button type="button" class="btn btn-danger hapus-dataOperator-admin" data-toggle="modal" data-target="#hapusDataOperatorModal" id_user="<?php echo $rowTampilData["id_user"];?>" id_operator="<?php echo $rowTampilData["id_operator"];?>">
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
                        <div class="container-fluid" id="edit-dataOperator"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataOperatorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
</body>