<?php
  include "../config/connection.php";
  include "../process/proses_materiSafetyOperator.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid" id="materiOperator">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Materi Safety</h6>   
        </div>
        <div class="card-body">
            <?php
                $resultTampilMateriSafety = tampilMateriSafety($con);
                $index=1;
                if (mysqli_num_rows($resultTampilMateriSafety) > 0){
            ?>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                <?php
                        while ($row = mysqli_fetch_assoc($resultTampilMateriSafety)) {
                    ?>
                    <div class="panel-heading" role="tab" id="headingMateriOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMateriOne<?= $index?>" aria-expanded="true" aria-controls="collapseMateriOne<?= $index?>">
                                    <?= $row["judul_materi"]?>
                                <i class="more-less glyphicon fas fa-fw fa-plus"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseMateriOne<?= $index?>" class="panel-collapse collapse ml-3" role="tabpanel" aria-labelledby="headingMateriOne<?= $index?>">
                        <div class="panel-body">
                            <p>KATEGORI MATERI : <?= $row["kategori_materi"]?></p>
                            <p>KETERANGAN : <?= $row["keterangan_materi"]?></p>
                            <div>
                            <img src="../img/pdf.jpg" height="150px" width="150px;">
                            <p>Download dengan klik button download</p>
                            </div>
                            <div>
                            <button type="submit" class="btn btn-primary btn-icon-split" name="download">
                                <span class="icon text-white-50">
                                    <i class="fas fa-fw fa-download"></i>
                                </span>
                                <span class="text">Download</span>
                            </button>
                            </div>
                            <iframe width="560" height="315" src="<?= $row["file_materi"]?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <br>
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
                            <p class="text-muted">Data Jabatan kosong</p>
                        </div>
                    <?php
                }
                ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->