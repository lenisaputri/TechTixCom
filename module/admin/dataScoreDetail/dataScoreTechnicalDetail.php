<?php
  include "../config/connection.php";
  include "../process/proses_adminDataScoreTechnicalDetail.php";
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
                    <a href="index.php?module=dataScoreTechnical" >
                        <i class="fas fa-fw fa-trophy"></i>
                        <span>Data Score Technical</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Data Score Technical Detail</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Score Technical Detail</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataScoreTechnicalDetail.php?module=dataScoreTechnicalDetail&act=tambah" method="POST" enctype="multipart/form-data">
                    <div class ="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikOperatorDetail" style="font-weight: bold">NIK OPERATOR</label>
                                    <?php
                                        $resultTampilScoreTechnical = tampilScoreTechnical($con);
                                    ?>
                                    <select class="custom-select-karyawan" name="nikOperatorDetail">
                                        <?php
                                            if(mysqli_num_rows($resultTampilScoreTechnical) > 0){
                                                while($row = mysqli_fetch_assoc($resultTampilScoreTechnical)){
                                                    echo "<option value='".$row['id_score_technical']."'>".$row['nik']."</option>";
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
                                        $resultTampilScoreTechnicalDate = tampilScoreTechnicalDate($con);
                                    ?>
                                    <select class="custom-select-karyawan" name="tanggalTrainingDetail">
                                        <?php
                                            if(mysqli_num_rows($resultTampilScoreTechnicalDate) > 0){
                                                while($row = mysqli_fetch_assoc($resultTampilScoreTechnicalDate)){
                                                    echo "<option value='".$row['tanggal_training']."'>".$row['tanggal_training']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="sftpDetail" style="font-weight: bold">SAFETY PROCEDURE</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI SAFETY PROCEDURE" id="sftpDetail" name="sftpDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="sftpDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="equipmentDetail" style="font-weight: bold">EQUIPMENT</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI EQUIPMENT" id="equipmentDetail" name="equipmentDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="equipmentDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">                            
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="operationalDetail" style="font-weight: bold">NILAI OPERATIONAL PARAMETER</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI OPERATIONAL PARAMETER" id="operationalDetail" name="operationalDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="operationalDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="maintenDetail" style="font-weight: bold">NILAI MAINTENANCE PARAMETER</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI MAINTENANCE PARAMETER" id="maintenDetail" name="maintenDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="maintenDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="troubleDetail" style="font-weight: bold">NILAI TROUBLE SHOOTING</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI TROUBLE SHOOTING" id="troubleDetail" name="troubleDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="troubleDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div></div>
                        <hr>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-icon-split mb-2 mb-sm-0" name="tambahDataScoreTechnicalDetail">
                                <span class="icon text-white-50">
                                    <i class="fas fa-plus"></i>
                                </span>
                                <span class="text">Tambah Data</span>
                            </button>
                            <button type="button" class="btn btn-warning btn-icon-split" onclick="location.href='index.php?module=dataScoreTechnicalDetailImport';">
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
                <h6 class="m-0 font-weight-bold text-primary">Data Materi Technical</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Safety Procedure</th>
                                <th>Equipment List</th>
                                <th>Operasional Parameter</th>
                                <th>Maintenance Parameter</th>
                                <th>Trouble Shooting</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryTampilData = "SELECT tstd.*, tst.*, tp.id_operator, tp.nik 
                                    FROM tabel_score_technical_detail tstd, tabel_score_technical tst, tabel_operator tp 
                                    WHERE tst.id_operator = tp.id_operator
                                    AND tstd.id_score_technical = tst.id_score_technical;
                                        ";
                                
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;

                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                            <tr class="text-center" id-score-technical-detail="<?php echo $rowTampilData["id_score_technical_detail"] ?>">
                                                <td ><?php echo $index; ?></td>
                                                <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                                                <td class="judulMateri"><?php echo $rowTampilData["sftp"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["equipment"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["operational"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["mainten"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["trouble"]; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary edit-dataScoreTechnicalDetail-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#editDataScoreTechnicalDetailModal" id_scoreTechnicalDetailEdit="<?php echo $rowTampilData["id_score_technical_detail"];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <p></p>
                                                    <button type="button" class="btn btn-danger hapus-dataScoreTechnicalDetail-admin" data-toggle="modal" data-target="#hapusDataScoreTechnicalDetailModal" id_score_technical_detail="<?php echo $rowTampilData["id_score_technical_detail"];?>">
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
                                else{
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
    <div class="modal fade" id="editDataScoreTechnicalDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreTechnicalDetail border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Score Technical Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataScoreTechnicalDetail.php?module=dataScoreTechnicalDetail&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_score_technical_detail" id="id_scoreTechnicalDetailUpdate">
                        <div class="container-fluid" id="edit-dataScoreTechnicalDetail"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataScoreTechnicalDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataScoreTechnicalDetail.php?module=dataScoreTechnicalDetail&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_score_technical_detail" id="id_scoreTechnicalDetailHapus" >
                        <strong>Apakah Anda yakin?</strong>
                        </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataScoreTechnicalDetail" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>