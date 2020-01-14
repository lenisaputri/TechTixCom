<?php
  include "../config/connection.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid" id="dataKaryawan">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Supervisor</h6>
        </div>
        <div class="card-body">
            <!-- FORM MENAMBAH DATA -->
            <form class="user">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="col-sm-6 mb-3 mb-sm-0 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">USERNAME</label>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="col-sm-6 mb-3 mb-sm-0 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">NIK</label>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="col-sm-6 mb-3 mb-sm-0 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">PASSWORD</label>
                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label class="col-sm-6 mb-3 mb-sm-0 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">NAMA
                            LENGKAP</label>
                            <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <label class="col-sm-6 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">JABATAN</label>
                        <select class="custom-select mr-sm-2 form-control form-control-user" id="exampleFormControlSelect1">
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0"></div>
                    <div class="col-sm-6">
                        <label class="col-sm-6 small d-flex flex-column justify-content-center" for="password" style="font-weight: bold">STATUS</label>
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9"></div>
                    <div class="col-sm-3">
                        <a href="#" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </a>
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
            <h6 class="m-0 font-weight-bold text-primary">Data Supervisor</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td><a href="#" class="btn btn-primary btn-circle">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="btn btn-primary btn-circle">
                                    <i class="fab fa-facebook-f"></i>
                                </a></td>
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