<?php
  include "../config/connection.php";
  include "../process/proses_adminDataScoreTechnical.php";
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
                    <span>Data Score Technical</span>
                </li>
            </ol>
        </nav>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Data Score Technical</h6>
            </div>
            <div class="card-body">
                <form class="user" action="../process/proses_adminDataScoreTechnical.php?module=dataScoreTechnical&act=tambah" method="POST">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nikTechnical" style="font-weight: bold">NIK OPERATOR</label>
                            <?php
                                $resultOperator = tampilOperator($con);
                            ?>
                            <select class="custom-select-karyawan my-1 mr-sm-2" name="nikTechnical">
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
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="kategoriTechnical" style="font-weight: bold">KATEGORI TECHNICAL</label>
                            <input type="text" class="form-control form-control-user" placeholder="KATEGORI TECHNICAL" id="kategoriTechnical" name="kategoriTechnical" required>
                        </div>
                        <div class="col-sm-12">
                            <div id="kategoriTechnicalBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="col-sm-6 small d-flex flex-column justify-content-center" for="poinTechnical" style="font-weight: bold">TOTAL POIN</label>
                                <input type="number" class="form-control form-control-user" placeholder="TOTAL POIN" id="poinTechnical" name="poinTechnical" required>
                            </div>
                            <div class="col-sm-12">
                                <div id="poinTechnicalBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                            </div>
                        </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="nilaiTechnical" style="font-weight: bold">TOTAL NILAI</label>
                            <input type="number" class="form-control form-control-user" placeholder="TOTAL NILAI" id="nilaiTechnical" name="nilaiTechnical" required>
                        </div>
                        <div class="col-sm-12">
                            <div id="nilaiTechnicalBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label class="col-sm-6 small d-flex flex-column justify-content-center" for="dateTechnical" style="font-weight: bold">TANGGAL ASSESMENT</label>
                            <div class="input-group date" id="datepickerTanggalTrainingTechnical" data-provide="datepicker">
                                <input type="text" id="dateTechnical" class="form-control form-control-user datepicker" placeholder="TANGGAL ASSESMENT" name="dateTechnical">
                                <div class="input-group-addon">
                                    <span class="input-group-text form-control form-control-user">
                                        <i class='far fa-calendar-alt' aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div id="dateTechnicalBlank" class="col-sm-12 small d-flex flex-column justify-content-center text-danger"></div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-icon-split mb-2 mb-sm-0" name="tambahDataScoreTechnical">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="text">Tambah Data</span>
                        </button>
                        <button type="button" class="btn btn-warning btn-icon-split" onclick="location.href='index.php?module=dataScoreTechnicalImport';">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-circle-up"></i>
                            </span>
                            <span class="text">Import xlxs</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <div class="row d-flex justify-content-end">
                            <button type="button" class="btn btn-info btn-icon-split" name="tambahDataMateri" onclick="location.href='index.php?module=dataScoreTechnicalDetail';">
                                <span class="text">Tambah Data Detail</span>
                            </button>
                        </div>
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
                                <th>Kategori Technical</th>
                                <th>Total Nilai</th>
                                <th>Total Poin</th>
                                <th>Tanggal Assessment</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $queryTampilData = "SELECT tst.*, tp.id_operator, tp.nik FROM tabel_score_technical tst, tabel_operator tp WHERE tst.id_operator = tp.id_operator;
                                    ";
                                
                                $resultTampilData = mysqli_query($con, $queryTampilData);
                                $index = 1;

                                if(mysqli_num_rows($resultTampilData) > 0){
                                    while($rowTampilData = mysqli_fetch_assoc($resultTampilData)){
                                        ?>
                                            <tr class="text-center" id-score-technical="<?php echo $rowTampilData["id_score_technical"] ?>">
                                                <td ><?php echo $index; ?></td>
                                                <td class="kategoriMateri"><?php echo $rowTampilData["nik"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["kategori_technical"]; ?></td>
                                                <td class="judulMateri"><?php echo $rowTampilData["poin"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["nilai"]; ?></td>
                                                <td class="fileMateri"><?php echo $rowTampilData["tanggal_training"]; ?></td>
                                                <td> 
                                                    <button type="button" class="btn btn-warning info-dataScoreTechnical-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#infoDataScoreTechnicalModal" id_scoreTechnicalInfo="<?php echo $rowTampilData["id_score_technical"];?>">
                                                        <i class="fas fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-primary edit-dataScoreTechnical-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#editDataScoreTechnicalModal" id_scoreTechnicalEdit="<?php echo $rowTampilData["id_score_technical"];?>">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-danger hapus-dataScoreTechnical-admin mb-2 mb-sm-0" data-toggle="modal" data-target="#hapusDataScoreTechnicalModal" id_score_technical="<?php echo $rowTampilData["id_score_technical"];?>">
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
    <div class="modal fade" id="editDataScoreTechnicalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreTechnical border-0">
                    <h5 class="modal-title text-white w-100 text-center">Edit Data Score Technical</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../process/proses_adminDataScoreTechnical.php?module=dataScoreTechnical&act=edit" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_score_technical" id="id_scoreTechnicalUpdate" >
                        <div class="container-fluid" id="edit-dataScoreTechnical"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hapusDataScoreTechnicalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="../process/proses_adminDataScoreTechnical.php?module=dataScoreTechnical&act=hapus" method="post">
                    <div class="modal-body pt-5 text-center">
                        <input type="hidden" name="id_score_technical" id="id_scoreTechnicalHapus" >
                        <strong>Apakah Anda yakin?</strong>
                    </div>
                    <div class="pb-4 pt-4 d-flex justify-content-around">
                        <button type="button" class="btn btn-danger mr-4 btn-batal" data-dismiss="modal">Tidak</button>
                        <button type="submit" name="hapusDataScoreTechnical" class="btn btn-success btn-ok">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="infoDataScoreTechnicalModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header d-flex justify-content-center bg-scoreTechnicalInfo border-0">
                    <h5 class="modal-title text-white w-100 text-center">Data Score Technical Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid" id="info-dataScoreTechnical"></div>
                </div>
            </div>
        </div>
    </div>
</body>