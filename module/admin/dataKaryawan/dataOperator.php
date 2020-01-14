<?php
  include "../config/connection.php";
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
            <form class="user">
                <div class = "row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="username" style="font-weight: bold">USERNAME</label>
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="USERNAME">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">PASSWORD</label>
                                <div class="input-group">
                                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="PASSWORD">
                                    <div class="input-group-append">
                                        <span class="far fa-eye input-group-text form-control form-control-user" id="eye" onclick="showPassword();"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">GAMBAR</label>
                                <div class="input-group col-sm-10">
                                    <img src="../attachment/img/avatar.jpeg" id="fotoPrevOperatorAdmin3" height="200px" width="200px">
                                </div>
                                <div class="col-md-2"></div>
                                <div class="col-md-10">
                                    <br>
                                    <input id='fileid2' type='file' name='fileid2' onchange="preview_images22(event);"  hidden required />
                                    <input id='buttonid2' type='button' value='Load Gambar'class="btn btn-loading btn-primary tmbl-loading ml-2"  />
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9">
                                    <div id="fileidOperatorAdminBlank" class="text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nik" style="font-weight: bold">NIK</label>
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="NIK">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nama" style="font-weight: bold">NAMA LENGKAP</label>
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="NAMA LENGKAP">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="jabatan" style="font-weight: bold">JABATAN</label>
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="JABATAN">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">STATUS</label>
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-8">
                                    <a href="#" class="btn btn-success btn-icon-split">
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
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Gambar</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Status</th>
                            <th colspan="2">Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>jjj</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-circle">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-circle">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- MENAMPILKAN DATA SELESAI-->
</div>
<!-- /.container-fluid -->

</body>