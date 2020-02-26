<?php
  include "../config/connection.php";
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
                    <a href="index.php?module=dataScoreTechnical" ><i class="fas fa-fw fa-trophy"></i>
                        <span>Data Score Technical</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-arrow-circle-up"></i>
                    <span>Import Data Score Technical</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Score Technical</h6>
            </div>
            <div class="card-body">
                <form class="user" action="" id="formDataMateriAdmin" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control border-0" id="inputFile" name="fileMateri">
                        <div class="col-sm-12">
                            <div id="fileMateriAdminBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div> 
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split mb-2 mb-sm-0" name="tambahDataMateri" onclick="ValidasiTambahDataMateri();">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>