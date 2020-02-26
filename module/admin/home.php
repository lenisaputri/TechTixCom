<?php
  include "../config/connection.php";
  include "../process/proses_dashboardAdmin.php";
?>
<div class="container-fluid" id="dataKaryawan">
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-md font-weight-bold text-primary text-uppercase mb-1">Data Admin</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
                    $admin = jumlah($con, "tabel_admin");
                    $rowAdmin = mysqli_fetch_assoc($admin);
                    echo $rowAdmin["jumlah"];
                  ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-user fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-md font-weight-bold text-success text-uppercase mb-1">Data Operator</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php
                      $operator = jumlah($con, "tabel_operator");
                      $rowOperator = mysqli_fetch_assoc($operator);
                      echo $rowOperator["jumlah"];
                    ?>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-md font-weight-bold text-warning text-uppercase mb-1">Data Supervisor</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                        $supervisor = jumlah($con, "tabel_supervisor");
                        $rowSupervisor = mysqli_fetch_assoc($supervisor);
                        echo $rowSupervisor["jumlah"];
                      ?>
                    </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>  
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-md font-weight-bold text-danger text-uppercase mb-1">Data Jabatan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                          $jabatan = jumlah($con, "tabel_jabatan");
                          $rowJabatan = mysqli_fetch_assoc($jabatan);
                          echo $rowJabatan["jumlah"];
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-sitemap fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-danger text-uppercase mb-1">materi safety</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                            $materiSafety = jumlah($con, "tabel_materi_safety");
                            $rowMateriSafety = mysqli_fetch_assoc($materiSafety);
                            echo $rowMateriSafety["jumlah"];
                          ?>
                        </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-shield-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-md font-weight-bold text-warning text-uppercase mb-1">materi quality</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                          <?php
                            $materiQuality = jumlah($con, "tabel_materi_quality");
                            $rowMateriQuality = mysqli_fetch_assoc($materiQuality);
                            echo $rowMateriQuality["jumlah"];
                          ?>
                        </div>
                      </div>
                      <div class="col-auto">
                        <i class="fas fa-certificate fa-2x text-gray-300"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-md font-weight-bold text-success text-uppercase mb-1">materi generalhrd</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                              $materiGeneralHrd = jumlah($con, "tabel_materi_generalhrd");
                              $rowMateriGeneralHrd = mysqli_fetch_assoc($materiGeneralHrd);
                              echo $rowMateriGeneralHrd["jumlah"];
                            ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-danger shadow h-100 py-2">
                  <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      <div class="col mr-2">
                        <div class="text-md font-weight-bold text-danger text-uppercase mb-1">materi technical</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                              $materiTechnical = jumlah($con, "tabel_materi_technical");
                              $rowMateriTechnical = mysqli_fetch_assoc($materiTechnical);
                              echo $rowMateriTechnical["jumlah"];
                            ?>
                          </div>
                        </div>
                        <div class="col-auto">
                          <i class="fas fa-cogs fa-2x text-gray-300"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary text-uppercase">Profil Karyawan</h6>   
                </div>
                <div class="card-body">
                  <?php 
                    $resultTampilProfilAdmin = tampilProfilAdmin($con, $idUser);
                    if (mysqli_num_rows($resultTampilProfilAdmin) > 0){
                      while ($row = mysqli_fetch_assoc($resultTampilProfilAdmin)) {
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