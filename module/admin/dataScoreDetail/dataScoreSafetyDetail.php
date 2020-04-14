<?php
  include "../config/connection.php";
  include "../process/proses_adminDataScoreSafetyDetail.php";
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
                    <a href="index.php?module=dataScoreSafety" >
                        <i class="fas fa-fw fa-trophy"></i>
                        <span>Data Nilai Safety Online</span>
                    </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <i class="fas fa-fw fa-info"></i>
                    <span>Data Nilai Safety Detail Online</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Nilai Safety Detail Online</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataScoreSafetyDetail.php?module=dataScoreSafetyDetail&act=tambah" method="POST" enctype="multipart/form-data">
                    <div class ="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikOperatorDetail" style="font-weight: bold">NIK OPERATOR</label>
                                    <?php
                                        $resultTampilScoreSafety = tampilScoreSafety($con);
                                    ?>
                                    <select class="custom-select-karyawan" name="nikOperatorDetail"> 
                                        <?php
                                            if(mysqli_num_rows($resultTampilScoreSafety) > 0){
                                                while($row = mysqli_fetch_assoc($resultTampilScoreSafety)){
                                                    echo "<option value='".$row['id_score_safety']."'>".$row['nik']." - ".$row['tanggal_training']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="smk3Detail" style="font-weight: bold">NILAI SMK3</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI SMK3" id="smk3Detail" name="smk3Detail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="smk3DetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="eaHiraDetail" style="font-weight: bold">NILAI EA-HIRA</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI EA-HIRA" id="eaHiraDetail" name="eaHiraDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="ea-hiraDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="movForkliftDetail" style="font-weight: bold">NILAI MOVEMENT FORKLIFT</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI MOVEMENT FORKLIFT" id="movForkliftDetail" name="movForkliftDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="movForkliftDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="conSpaceDetail" style="font-weight: bold">NILAI CONFINED SPACE</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI CONFINED SPACE" id="conSpaceDetail" name="conSpaceDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="conSpaceDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="lotoDetail" style="font-weight: bold">NILAI LOTO</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI LOTO" id="lotoDetail" name="lotoDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="lotoDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="apdDetail" style="font-weight: bold">NILAI APD</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI APD" id="apdDetail" name="apdDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="apdDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="bbsDetail" style="font-weight: bold">NILAI BBS</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI BBS" id="bbsDetail" name="bbsDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="bbsDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="fireFightingDetail" style="font-weight: bold">NILAI FIRE FIGHTING</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI FIRE FIGHTING" id="fireFightingDetail" name="fireFightingDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="fireFightingDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="wahDetail" style="font-weight: bold">NILAI WAH</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI WAH" id="wahDetail" name="wahDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="wahDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="environmentDetail" style="font-weight: bold">NILAI ENVIRONMENT</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI ENVIRONMENT" id="environmentDetail" name="environmentDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="environmentDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="p3kDetail" style="font-weight: bold">NILAI P3K</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI P3K" id="p3kDetail" name="p3kDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="p3kDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split mb-2 mb-sm-0" name="tambahDataScoreSafetyDetail" onclick="ValidasiTambahScoreSafetyDetail();">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Nilai Safety Detail Online</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>NIK</th>
                                <th>SMK3</th>
                                <th>EA-Hira</th>
                                <th>Movement Forklift</th>
                                <th>Confined Space</th>
                                <th>Loto</th>
                                <th>APD</th>
                                <th>BBS</th>
                                <th>Fire Fighting</th>
                                <th>WAH</th>
                                <th>Environment</th>
                                <th>P3K</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryTampilData = "SELECT tssd.*, tss.*, tp.id_operator, tp.nik 
                                FROM tabel_score_safety_detail tssd, tabel_score_safety tss, tabel_operator tp 
                                WHERE tss.id_operator = tp.id_operator
                                AND tssd.id_score_safety = tss.id_score_safety;
                                    ";
                                
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;

                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                            <tr class="text-center" id-score-safety-detail="<?php echo $rowTampilData["id_score_safety_detail"] ?>">
                                                <td ><?php echo $index; ?></td>
                                                <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                                                <td class="judulMateri"><?php echo $rowTampilData["smk3"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["ea_hira"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["movement_forklift"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["confined_space"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["loto"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["apd"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["bbs"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["fire_fighting"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["wah"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["environment"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["p3k"]; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary edit-dataScoreSafetyDetail-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#editDataScoreSafetyDetailModal" id_scoreSafetyDetailEdit="<?php echo $rowTampilData["id_score_safety_detail"];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <p></p>
                                                    <button type="button" class="btn btn-danger hapus-dataScoreSafetyDetail-admin" data-toggle="modal" data-target="#hapusDataScoreSafetyDetailModal" id_score_safety_detail="<?php echo $rowTampilData["id_score_safety_detail"];?>">
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
    <div class="modal fade" id="editDataScoreSafetyDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreSafetyDetail border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Nilai Safety Detail Online</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataScoreSafetyDetail.php?module=dataScoreSafetyDetail&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_score_safety_detail" id="id_scoreSafetyDetailUpdate">
                        <div class="container-fluid" id="edit-dataScoreSafetyDetail"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataScoreSafetyDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataScoreSafetyDetail.php?module=dataScoreSafetyDetail&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_score_safety_detail" id="id_scoreSafetyDetailHapus" >
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataScoreSafetyDetail" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>