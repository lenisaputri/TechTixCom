<?php
  include "../config/connection.php";
  include "../process/proses_operatorProfile.php";
?>

<div class="container-fluid" id="dataKaryawan">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <center><h4 class="m-0 font-weight-bold text-primary">PROFILE KARYAWAN</h4></center>   
    </div>
    <div class="card-body">
      <?php 
        $resultTampilProfilOperator = tampilProfilOperator($con, $idUser);
        if (mysqli_num_rows($resultTampilProfilOperator) > 0){
          while ($row = mysqli_fetch_assoc($resultTampilProfilOperator)) {
            ?>
              <div class="row">
                <div class="col-lg-4">
                <center><img src="../attachment/img/<?php echo ($row['foto'] == null)? 'avatar.jpeg' : $row['foto'] ; ?>" height="250px" width="250px;"></center>
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
                      <h6 class="text-gray-900 mb-4">Jenis Kelamin : <?= $row["jenis_kelamin"];?> </h6>
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