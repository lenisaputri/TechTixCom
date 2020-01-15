<?php
  include "../config/connection.php";
  include "../process/proses_operatorProfile.php";
?>

<!-- Begin Page Content -->
<div class="container-fluid" id="dataKaryawan">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-2 text-gray-800">Data Operator</h1>
        <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>
    -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Profil Karyawan</h6>   
        </div>
        <div class="card-body">
        <?php 
        $resultTampilProfilOperator = tampilProfilOperator($con, $idUser);
        if (mysqli_num_rows($resultTampilProfilOperator) > 0){
          while ($row = mysqli_fetch_assoc($resultTampilProfilOperator)) {
            ?>
        <div class="row">
        <div class="col-lg-4 ml-5">
        <center><img src="../img/profile.png" height="250px" width="250px;"></center>
        </div>
              <div class="col-lg-5">
                <div class="p-5">
                <div class="text">
                    <h6 class="text-gray-900 mb-4">ID Karyawan : <?= $row["nik"]?> </h6>
                  </div>
                  <div class="text">
                    <h6 class="text-gray-900 mb-4">Nama Karyawan : <?= $row["nama"]?> </h6>
                  </div>
                  <div class="text">
                    <h6 class="text-gray-900 mb-4">Jabatan : <?= $row["nama_jabatan"];?> </h6>
                  </div>
                </div>
              </div>
            </div>
            <?php
          } 
        }
        ?>
        </div>
    </div>
</div>
<!-- /.container-fluid -->