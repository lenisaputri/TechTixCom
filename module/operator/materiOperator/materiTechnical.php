<?php
  include "../config/connection.php";
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
            <h6 class="m-0 font-weight-bold text-primary">Materi Technical</h6>   
        </div>
        <div class="card-body">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingMateriOne">
                        <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseMateriOne" aria-expanded="true" aria-controls="collapseMateriOne">
                                Materi Technical 1
                                <i class="more-less glyphicon fas fa-fw fa-plus"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseMateriOne" class="panel-collapse collapse ml-3" role="tabpanel" aria-labelledby="headingMateriOne">
                        <div class="panel-body">
                            <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid.</p>
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
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            <!-- panel-group -->
        </div>
    </div>
</div>
<!-- /.container-fluid -->