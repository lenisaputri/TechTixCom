<?php
  include "../config/connection.php";
  include "../process/proses_materiTechnicalOperator.php";
?>

<body>
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
                <span>Materi Technical</span>
            </li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Materi Technical</h6>   
        </div>
        <div class="card-body">
            <?php
                $resultTampilMateriTechnical = tampilMateriTechnical($con);
                $index=1;
                if (mysqli_num_rows($resultTampilMateriTechnical) > 0){
                    ?>
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <?php
                                    while ($row = mysqli_fetch_assoc($resultTampilMateriTechnical)) {
                                        ?>
                                            <div class="panel-heading" role="tab" id="headingMateriOne" style="word-break: break-all;">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMateriOne<?= $index?>" aria-expanded="true" aria-controls="collapseMateriOne<?= $index?>">
                                                        <?= $row["judul_materi"]?>
                                                        <i class="more-less fas fa-fw fa-plus"></i>
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
                                                                if($row["file_materi"] != null){
                                                                    ?>
                                                                    <p class="col-sm-12 d-flex flex-column justify-content-center" style="font-weight: bold;">FILE :</p>
                                                                        <div class="form-group row">
                                                                        <img src="../img/file.png" height="90px" width="70px;" class="d-flex flex-column justify-content-center ml-4">
                                                                        <p class="col-sm-12 mb-3 mb-sm-2 ml-3 d-flex flex-column justify-content-center" style="word-break: break-all;"><?= $row["file_materi"]?></p>
                                                                            <div class="col-sm-12 mb-3 mb-sm-2 ml-3">
                                                                                <a class="btn btn-primary btn-icon-split" href="../process/proses_download_safety.php?file=<?=$row["file_materi"]?>">
                                                                                    <span class="icon text-white-50">
                                                                                        <i class="fas fa-fw fa-download"></i>
                                                                                    </span>
                                                                                    <span class="text">Download</span>
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <p class="col-sm-12 d-flex flex-column justify-content-center" style="font-weight: bold;">FILE :</p>
                                                                    <div class='col-md-12'>
                                                                        <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                                                                        <p class='text-muted'>File Belum Tersedia</p>
                                                                    </div>
                                                                    <?php
                                                                }

                                                                ?>
                                                                <?php
                                                            } 
                                                            else if($row["tipe"] == "link"){
                                                                if($row["file_materi"] != null){
                                                                    ?>
                                                                    <p class="col-sm-12 d-flex flex-column justify-content-center" style="font-weight: bold;">LINK :</p>
                                                                    <div class="embed-responsive embed-responsive-16by9 mb-3">
                                                                        <iframe class="embed-responsive-item" src="<?= $row["file_materi"]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                    </div>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?>
                                                                    <p class="col-sm-12 d-flex flex-column justify-content-center" style="font-weight: bold;">LINK :</p>
                                                                    <div class='col-md-12'>
                                                                        <img src='../img/magnifier.svg' alt='pencarian' class='p-3'>
                                                                        <p class='text-muted'>Link Belum Tersedia</p>
                                                                    </div>
                                                                    <?php
                                                                }

                                                                ?>
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
                    <?php
                }
                else{
                    ?>
                        <div class="text-center">
                            <p class="text-muted">Data Materi Technical kosong!!</p>
                        </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
            </body>