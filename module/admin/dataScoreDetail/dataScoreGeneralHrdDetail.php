<?php
  include "../config/connection.php";
  include "../process/proses_adminDataScoreGeneralHrdDetail.php";
?>
<body>
    <div class="container-fluid" id="dataScore">
        <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="index.php?module=dataScoreGeneralHrd" >
                        <i class="fas fa-fw fa-trophy"></i>
                        <span>Data Score General Hrd</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Data Score General Hrd Detail</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Score General Hrd Detail</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataScoreGeneralHrdDetail.php?module=dataScoreGeneralHrdDetail&act=tambah" method="POST" enctype="multipart/form-data">
                    <div class ="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikOperatorDetail" style="font-weight: bold">NIK OPERATOR</label>
                                    <?php
                                        $resultTampilScoreGeneralHrd = tampilScoreGeneralHrd($con);
                                    ?>
                                    <select class="custom-select-karyawan" name="nikOperatorDetail">
                                        <?php
                                            if(mysqli_num_rows($resultTampilScoreGeneralHrd) > 0){
                                                while($row = mysqli_fetch_assoc($resultTampilScoreGeneralHrd)){
                                                    echo "<option value='".$row['id_score_generalhrd']."'>".$row['nik']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="tanggalTrainingDetail" style="font-weight: bold">TANGGAL TRAINING</label>
                                    <?php
                                        $resultTampilScoreGeneralHrdDate = tampilScoreGeneralHrdDate($con);
                                    ?>
                                <select class="custom-select-karyawan" name="tanggalTrainingDetail">
                                        <?php
                                            if(mysqli_num_rows($resultTampilScoreGeneralHrdDate) > 0){
                                                while($row = mysqli_fetch_assoc($resultTampilScoreQualityDate)){
                                                    echo "<option value='".$row['tanggal_training']."'>".$row['tanggal_training']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="cocDetail" style="font-weight: bold">CODE OF CONDUCT</label>
                                    <input type="number" class="form-control form-control-user" placeholder="Nilai Code Of Conduct" id="cocDetail" name="cocDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="cocDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="pkbcabDetail" style="font-weight: bold">PKB, COMPENSATION & BENEFIT</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI PKB, Compensation & Benefit" id="pkbcabDetail" name="pkbcabDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="pkbcabDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="perperusDetail" style="font-weight: bold">NILAI PERATURAN PERUSAHAAN</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI Peraturan Perpustakaan" id="perperusDetail" name="perperusDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="perperusDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split mb-2 mb-sm-0" name="tambahDataScoreGeneralHrdDetail">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </button>
                        <button type="button" class="btn btn-warning btn-icon-split" onclick="location.href='index.php?module=dataScoreGeneralHrdDetailImport';">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-circle-up"></i>
                            </span>
                            <span class="text">Import xlxs</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Materi General Hrd</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Code Of Conduct</th>
                                <th>PKB & Compensation And Benefit</th>
                                <th>Peraturan Perusahaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryTampilData = "SELECT tsgd.*, tsg.*, tp.id_operator, tp.nik 
                                    FROM tabel_score_generalhrd_detail tssd, tabel_score_generalhrd tsg, tabel_operator tp 
                                    WHERE tsg.id_operator = tp.id_operator
                                    AND tsgd.id_score_generalhrd = tsg.id_score_generalhrd;
                                        ";
                                
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;

                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                            <tr class="text-center" id-score-quality-detail="<?php echo $rowTampilData["id_score_generalhrd_detail"] ?>">
                                                <td ><?php echo $index; ?></td>
                                                <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                                                <td class="judulMateri"><?php echo $rowTampilData["coc"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["pkb_cab"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["perperus"]; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary edit-dataScoreGeneralHrdDetail-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#editDataScoreGeneralHrdDetailModal" id_scoregeneralhrdDetailEdit="<?php echo $rowTampilData["id_score_generalhrd_detail"];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <p></p>
                                                    <button type="button" class="btn btn-danger hapus-dataScoreGeneralHrdDetail-admin" data-toggle="modal" data-target="#hapusDataScoreGeneralHrdDetailModal" id_score_generalhrd_detail="<?php echo $rowTampilData["id_score_generalhrd_detail"];?>">
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
                                else
                                {
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
    <div class="modal fade" id="editDataScoreGeneralHrdDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreGeneralHrdDetail border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Score General Hrd Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataScoreGeneralHrdDetail.php?module=dataScoreGeneralHrdDetail&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_score_generalhrd_detail" id="id_scoreGeneralHrdDetailUpdate">
                        <div class="container-fluid" id="edit-dataScoregeneralhrdDetail"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataScoreGeneralHrdDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataScoreGeneralHrdDetail.php?module=dataScoreGeneralHrdDetail&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_score_generalhrd_detail" id="id_scoreGeneralHrdDetailHapus" >
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataScoreGeneralHrdDetail" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>