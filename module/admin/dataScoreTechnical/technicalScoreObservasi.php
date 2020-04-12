<?php
  include "../config/connection.php";
  include "../process/proses_adminDataScoreTechnicalObservasi.php";
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
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-trophy"></i>
                    <span>Data Nilai Technical Observasi</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Nilai Technical Observasi</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataScoreTechnicalObservasi.php?module=technicalNilaiObservasi&act=tambah" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikTechnicalObservasi" style="font-weight: bold">NIK OPERATOR</label>
                                    <?php
                                        $resultOperator = tampilOperator($con);
                                    ?>
                                    <select class="custom-select-karyawan my-1 mr-sm-2" name="nikTechnicalObservasi">
                                        <?php
                                        if(mysqli_num_rows($resultOperator) > 0){
                                            while($row = mysqli_fetch_assoc($resultOperator)){
                                                echo "<option value='".$row['id_operator']."'>".$row['nik']."</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="kategoriTechnicalObservasi" style="font-weight: bold">KATEGORI TECHNICAL</label>
                                    <input type="text" class="form-control form-control-user" placeholder="KATEGORI TECHNICAL" id="kategoriTechnicalObservasi" name="kategoriTechnicalObservasi" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="kategoriTechnicalObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="sftpObservasi" style="font-weight: bold">NILAI SAFETY PROCEDURE</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI SAFETY PROCEDURE" id="sftpObservasi" name="sftpObservasi" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="sftpObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="equipmentObservasi" style="font-weight: bold">NILAI EQUIPMENT</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI EQUIPMENT" id="equipmentObservasi" name="equipmentObservasi" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="equipmentObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="operationalObservasi" style="font-weight: bold">NILAI OPERATIONAL PARAMETER</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI EQUIPMENT" id="operationalObservasi" name="operationalObservasi" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="operationalObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="maintenObservasi" style="font-weight: bold">NILAI MAINTENANCE PARAMETER</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI MAINTENANCE PARAMETER" id="maintenObservasi" name="maintenObservasi" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="maintenObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="troubleObservasi" style="font-weight: bold">NILAI TROUBLE SHOOTING</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI TROUBLE SHOOTING" id="troubleObservasi" name="troubleObservasi" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="troubleDetailObservasi" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateTechnicalObservasi" style="font-weight: bold">TANGGAL OBSERVASI</label>
                                    <div class="input-group date" id="datepickerTanggalTrainingTechnicalObservasi" data-provide="datepicker">
                                        <input type="text" id="dateTechnicalObservasi" class="form-control form-control-user datepicker" placeholder="TANGGAL OBSERVASI" name="dateTechnicalObservasi">
                                            <div class="input-group-addon">
                                                <span class="input-group-text form-control form-control-user">
                                                    <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div id="dateTechnicalObservasiBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-4 mb-sm-3">
                            <button type="submit" class="btn btn-success btn-icon-split float-right" name="tambahDataScoreTechnicalObservasi">
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
                <h6 class="m-0 font-weight-bold text-primary">Data Nilai Technical Observasi</h6>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Kategori Technical</th>
                                <th>Total</th>
                                <th>Rata-Rata</th>
                                <th>Tanggal Observasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryTampilData = "SELECT tsto.*, tp.id_operator, tp.nik, tp.nama AS nama_operator FROM tabel_score_technical_observasi tsto, tabel_operator tp WHERE tsto.id_operator = tp.id_operator;
                                    ";
                                
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;

                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                            <tr class="text-center" id-score-technical-observasi="<?php echo $rowTampilData["id_score_technical_observasi"] ?>">
                                                <td><?php echo $index; ?></td>
                                                <td><?php echo $rowTampilData["nik"]; ?></td>
                                                <td><?php echo $rowTampilData["nama_operator"]; ?></td>
                                                <td><?php echo $rowTampilData["kategori_technical"]; ?></td>
                                                <td><?php echo $rowTampilData["total"]; ?></td>
                                                <td><?php echo $rowTampilData["ratarata"]; ?></td>
                                                <td><?php echo $rowTampilData["tanggal_observasi"]; ?></td>
                                                <td> 
                                                    <button type="button" class="btn btn-warning info-dataScoreTechnicalObservasi-admin mb-2 mb-sm-2" data-toggle="modal" data-target="#infoDataScoreTechnicalObservasiModal" id_scoreTechnicalObservasiInfo="<?php echo $rowTampilData["id_score_technical_observasi"];?>">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary edit-dataScoreTechnicalObservasi-admin mb-2 mb-sm-2" data-toggle="modal" data-target="#editDataScoreTechnicalObservasiModal" id_scoreTechnicalObservasiEdit="<?php echo $rowTampilData["id_score_technical_observasi"];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger hapus-dataScoreTechnicalObservasi-admin mb-2 mb-sm-2" data-toggle="modal" data-target="#hapusDataScoreTechnicalObservasiModal" id_score_technical_observasi="<?php echo $rowTampilData["id_score_technical_observasi"];?>">
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
    <div class="modal fade" id="editDataScoreTechnicalObservasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreTechnicalObservasi border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Nilai Technical Observasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataScoreTechnicalObservasi.php?module=technicalNilaiObservasi&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_score_technical_observasi" id="id_scoreTechnicalObservasiUpdate" >
                        <div class="container-fluid" id="edit-dataScoreTechnicalObservasi"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataScoreTechnicalObservasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataScoreTechnicalObservasi.php?module=technicalNilaiObservasi&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_score_technical_observasi" id="id_scoreTechnicalObservasiHapus" >
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataScoreTechnicalObservasi" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="infoDataScoreTechnicalObservasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreTechnicalObservasiInfo border-0">
                    <h5 class="modal-title text-white w-100 text-center">Data Nilai Technical Observasi Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" id="info-dataScoreTechnicalObservasi"></div>
                </div>
            </div>
        </div>
    </div>
</body>