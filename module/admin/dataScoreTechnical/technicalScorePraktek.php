<?php
  include "../config/connection.php";
  include "../process/proses_adminDataScoreTechnicalPraktek.php";
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
                    <span>Data Nilai Technical Praktek</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Nilai Technical Praktek</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataScoreTechnicalPraktek.php?module=technicalNilaiPraktek&act=tambah" method="POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikTechnicalPraktek" style="font-weight: bold">NIK OPERATOR</label>
                                    <?php
                                        $resultOperator = tampilOperator($con);
                                    ?>
                                    <select class="custom-select-karyawan" name="nikTechnicalPraktek">
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
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="kategoriTechnicalPraktek" style="font-weight: bold">KATEGORI TECHNICAL</label>
                                    <input type="text" class="form-control form-control-user" placeholder="KATEGORI TECHNICAL" id="kategoriTechnicalPraktek" name="kategoriTechnicalPraktek" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="kategoriTechnicalPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="sftpPraktek" style="font-weight: bold">NILAI SAFETY PROCEDURE</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI SAFETY PROCEDURE" id="sftpPraktek" name="sftpPraktek" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="sftpPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="equipmentPraktek" style="font-weight: bold">NILAI EQUIPMENT</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI EQUIPMENT" id="equipmentPraktek" name="equipmentPraktek" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="equipmentPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="operationalPraktek" style="font-weight: bold">NILAI OPERATIONAL PARAMETER</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI EQUIPMENT" id="operationalPraktek" name="operationalPraktek" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="operationalPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="maintenPraktek" style="font-weight: bold">NILAI MAINTENANCE PARAMETER</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI MAINTENANCE PARAMETER" id="maintenPraktek" name="maintenPraktek" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="maintenPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="troublePraktek" style="font-weight: bold">NILAI TROUBLE SHOOTING</label>
                                    <input type="number" step="0.01" min="1" max="5" class="form-control form-control-user" placeholder="NILAI TROUBLE SHOOTING" id="troublePraktek" name="troublePraktek" required>
                                </div>
                                <div class="col-sm-12">
                                    <div id="troublePraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateTechnicalPraktek" style="font-weight: bold">TANGGAL ASSESMENT</label>
                                    <div class="input-group date" id="datepickerTanggalPraktekTechnicalPraktek" data-provide="datepicker">
                                        <input type="text" id="dateTechnicalPraktek" class="form-control form-control-user datepicker" placeholder="TANGGAL ASSESMENT" name="dateTechnicalPraktek">
                                            <div class="input-group-addon">
                                                <span class="input-group-text form-control form-control-user">
                                                    <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                                </span>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div id="dateTechnicalPraktekBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-4 mb-sm-3">
                            <button type="submit" class="btn btn-success btn-icon-split float-right" name="tambahDataScoreTechnicalPraktek" onclick="ValidasiTambahScoreTechnicalPraktek();"> 
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
                <h6 class="m-0 font-weight-bold text-primary">Data Nilai Technical Praktek</h6>
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
                                <th>Tanggal Praktek</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryTampilData = "SELECT tstp.*, tp.id_operator, tp.nik, tp.nama AS nama_operator FROM tabel_score_technical_praktek tstp, tabel_operator tp WHERE tstp.id_operator = tp.id_operator;
                                    ";
                                
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;

                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                            <tr class="text-center" id-score-technical-praktek="<?php echo $rowTampilData["id_score_technical_praktek"] ?>">
                                                <td><?php echo $index; ?></td>
                                                <td><?php echo $rowTampilData["nik"]; ?></td>
                                                <td><?php echo $rowTampilData["nama_operator"]; ?></td>
                                                <td><?php echo $rowTampilData["kategori_technical"]; ?></td>
                                                <td><?php echo $rowTampilData["total"]; ?></td>
                                                <td><?php echo $rowTampilData["ratarata"]; ?></td>
                                                <td><?php echo $rowTampilData["tanggal_praktek"]; ?></td>
                                                <td> 
                                                    <button type="button" class="btn btn-warning info-dataScoreTechnicalPraktek-admin mb-2 mb-sm-2" data-toggle="modal" data-target="#infoDataScoreTechnicalPraktekModal" id_scoreTechnicalPraktekInfo="<?php echo $rowTampilData["id_score_technical_praktek"];?>">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary edit-dataScoreTechnicalPraktek-admin mb-2 mb-sm-2" data-toggle="modal" data-target="#editDataScoreTechnicalPraktekModal" id_scoreTechnicalPraktekEdit="<?php echo $rowTampilData["id_score_technical_praktek"];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger hapus-dataScoreTechnicalPraktek-admin mb-2 mb-sm-2" data-toggle="modal" data-target="#hapusDataScoreTechnicalPraktekModal" id_score_technical_praktek="<?php echo $rowTampilData["id_score_technical_praktek"];?>">
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
    <div class="modal fade" id="editDataScoreTechnicalPraktekModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreTechnicalPraktek border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Nilai Technical Praktek</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataScoreTechnicalPraktek.php?module=technicalNilaiPraktek&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_score_technical_praktek" id="id_scoreTechnicalPraktekUpdate" >
                        <div class="container-fluid" id="edit-dataScoreTechnicalPraktek"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataScoreTechnicalPraktekModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataScoreTechnicalPraktek.php?module=technicalNilaiPraktek&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_score_technical_praktek" id="id_scoreTechnicalPraktekHapus" >
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataScoreTechnicalPraktek" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="infoDataScoreTechnicalPraktekModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreTechnicalPraktekInfo border-0">
                    <h5 class="modal-title text-white w-100 text-center">Data Nilai Technical Praktek Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" id="info-dataScoreTechnicalPraktek"></div>
                </div>
            </div>
        </div>
    </div>
</body>