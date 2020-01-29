<?php
  include "../config/connection.php";
  include "../process/proses_materiGeneralHrdOperator.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid" id="materiOperator">
    <nav aria-label="breadcrumb" class="shadow">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.php?module=home" ><i class="fas fa-fw fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Materi General HRD</span>
                </li>
            </ol>
        </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Materi General HRD</h6>   
        </div>
        <div class="card-body">
            <?php
                $resultTampilMateriGeneralHrd = tampilMateriGeneralHrd($con);
                $index=1;
                if (mysqli_num_rows($resultTampilMateriGeneralHrd) > 0){
            ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                <?php
                        while ($row = mysqli_fetch_assoc($resultTampilMateriGeneralHrd)) {
                    ?>
                    <div class="panel-heading" role="tab" id="headingMateriOne" style="word-break: break-all;">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMateriOne<?= $index?>" aria-expanded="true" aria-controls="collapseMateriOne<?= $index?>">
                                    <?= $row["judul_materi"]?>
                                <i class="more-less glyphicon fas fa-fw fa-plus"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseMateriOne<?= $index?>" class="panel-collapse collapse ml-3" role="tabpanel" aria-labelledby="headingMateriOne<?= $index?>">
                        <div class="panel-body">
                            <div class="row">
                                <p class="col-sm-12 d-flex flex-column justify-content-center">KATEGORI MATERI :</p>
                                <div class="form-group row">
                                    <div class="col-sm-12" style="word-break: break-all;">
                                        <label class="col-sm-12 d-flex flex-column justify-content-center" for="nik" style="font-weight: bold"> <?= $row["kategori_materi"]?></label>
                                    </div>
                                </div>
                                <p class="col-sm-12 d-flex flex-column justify-content-center">KETERANGAN :</p>
                                <div class="form-group row">
                                    <div class="col-sm-12" style="word-break: break-all;">
                                        <p class="col-sm-12 d-flex flex-column justify-content-center" for="nik" style="font-weight: bold;"><?= $row["keterangan_materi"]?></p>
                                    </div>
                                </div>
                                <?php
                                    if($row["tipe"] == "file"){
                                    ?>
                                        <img src="../img/pdf.jpg" height="150px" width="150px;" class="d-flex flex-column justify-content-center">
                                        <p class="col-sm-12 d-flex flex-column justify-content-center" style="word-break: break-all;"><?= $row["file_materi"]?></p>
                                        <div class="form-group row">
                                            <div class="col-sm-12 d-flex flex-column justify-content-center">
                                            <a class="btn btn-primary btn-icon-split" href="../process/proses_download_generalhrd.php?file=<?=$row["file_materi"]?>">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-fw fa-download"></i>
                                                </span>
                                                <span class="text">Download</span>
                                            </a>
                                            </div>
                                        </div>
                                    <?php
                                    } else if($row["tipe"] == "link"){
                                    ?>
                                        <div class="embed-responsive embed-responsive-16by9 mb-3">
                                            <iframe class="embed-responsive-item" src="<?= $row["file_materi"]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </div>
                                    <?php
                                    }
                                ?>
                            </div>
                        </div>  
                    </div>
                    <?php
                        $index++;
                        }
                    ?>
                </div>
            </div>
            <!-- panel-group -->
            <?php
                }else{
                    ?>
                        <div class="text-center">
                            <p class="text-muted">Data Materi General HRD kosong!!</p>
                        </div>
                    <?php
                }
                ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->