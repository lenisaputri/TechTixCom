<?php
  include "../config/connection.php";
  include "../process/proses_adminDataScoreQualityDetail.php";
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
                    <a href="index.php?module=dataScoreQuality" >
                    <i class="fas fa-fw fa-trophy"></i>
                        <span>Data Score Quality</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-info"></i>
                    <span>Data Score Quality Detail</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Score Quality Detail</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataScoreQualityDetail.php?module=dataScoreQualityDetail&act=tambah" method="POST" enctype="multipart/form-data">
                    <div class ="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikOperatorDetail" style="font-weight: bold">NIK OPERATOR</label>
                                    <?php
                                        $resultTampilScoreQuality = tampilScoreQuality($con);
                                    ?>
                                    <select class="custom-select-karyawan" name="nikOperatorDetail">  <!-- tampilannya belum -->
                                    <?php
                                            if(mysqli_num_rows($resultTampilScoreQuality) > 0){
                                                while($row = mysqli_fetch_assoc($resultTampilScoreQuality)){
                                                    echo "<option value='".$row['id_score_quality']."'>".$row['nik']." - ".$row['tanggal_training']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="tanggalTrainingDetail" style="font-weight: bold">TANGGAL TRAINING</label>
                                    <?php
                                        $resultTampilScoreQualityDate = tampilScoreQualityDate($con);
                                    ?>
                                    <select class="custom-select-karyawan" name="tanggalTrainingDetail"> 
                                        <?php
                                            if(mysqli_num_rows($resultTampilScoreQualityDate) > 0){
                                                while($row = mysqli_fetch_assoc($resultTampilScoreQualityDate)){
                                                    echo "<option value='".$row['tanggal_training']."'>".$row['tanggal_training']."</option>";
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="fssDetail" style="font-weight: bold">Food Safety System</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI Food Safety System" id="fssDetail" name="fssDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="fssDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="gmpDetail" style="font-weight: bold">GMP</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI GMP" id="gmpDetail" name="gmpDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="gmpDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="halalDetail" style="font-weight: bold">HALAL</label>
                                    <input type="number" class="form-control form-control-user" placeholder="NILAI HALAL" id="halalDetail" name="halalDetail" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="halalDetailBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split mb-2 mb-sm-0" name="tambahDataScoreQualityDetail">
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
                <h6 class="m-0 font-weight-bold text-primary">Data Materi Quality</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Food Safety System</th>
                                <th>GMP</th>
                                <th>Halal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryTampilData = "SELECT tsqd.*, tsq.*, tp.id_operator, tp.nik 
                                    FROM tabel_score_quality_detail tsqd, tabel_score_quality tsq, tabel_operator tp 
                                    WHERE tsq.id_operator = tp.id_operator
                                    AND tsqd.id_score_quality = tsq.id_score_quality;
                                        ";
                                
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;

                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                            <tr class="text-center" id-score-quality-detail="<?php echo $rowTampilData["id_score_quality_detail"] ?>">
                                                <td ><?php echo $index; ?></td>
                                                <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                                                <td class="judulMateri"><?php echo $rowTampilData["fss"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["gmp"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["halal"]; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-primary edit-dataScoreQualityDetail-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#editDataScoreQualityDetailModal" id_scoreQualityDetailEdit="<?php echo $rowTampilData["id_score_quality_detail"];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <p></p>
                                                    <button type="button" class="btn btn-danger hapus-dataScoreQualityDetail-admin" data-toggle="modal" data-target="#hapusDataScoreQualityDetailModal" id_score_quality_detail="<?php echo $rowTampilData["id_score_quality_detail"];?>">
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
    <div class="modal fade" id="editDataScoreQualityDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreQualityDetail border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Score Quality Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataScoreQualityDetail.php?module=dataScoreQualityDetail&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_score_quality_detail" id="id_scoreQualityDetailUpdate">
                        <div class="container-fluid" id="edit-dataScoreQualityDetail"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataScoreQualityDetailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataScoreQualityDetail.php?module=dataScoreQualityDetail&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_score_quality_detail" id="id_scoreQualityDetailHapus" >
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataScoreQualityDetail" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>