<?php
  include "../config/connection.php";
  include "../process/proses_dashboardAdmin.php";
?>
<head>
<script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
</head>
<body>
  <div class="container-fluid" id="dataKaryawan">
    <div class="row"> 
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">  
                <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                  Data Admin
                </div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">
                  <?php
                    $admin = jumlah($con, "tabel_admin");
                    $rowAdmin = mysqli_fetch_assoc($admin);
                    echo $rowAdmin["jumlah"];
                  ?>
                </div>
              </div>
              <div class="col-auto">
                <i class="fas fa-fw fa-id-card fa-2x text-gray-300"></i>
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
                <i class="fas fa-fw fa-id-card fa-2x text-gray-300"></i>
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
                <i class="fas fa-fw fa-id-card fa-2x text-gray-300"></i>
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
                <i class="fas fa-fw fa-sitemap fa-2x text-gray-300"></i>
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
                <i class="fas fa-fw fa-file fa-2x text-gray-300"></i>
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
                <i class="fas fa-fw fa-file fa-2x text-gray-300"></i>
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
                <i class="fas fa-fw fa-file fa-2x text-gray-300"></i>
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
                <i class="fas fa-fw fa-file fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- -->

     <!--chart 1-->
  <!-- <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
    </div>
    <div class="card-body">
      <div class="chart-bar">
        <canvas id="graphCanvas"></canvas>
      </div>
      <hr>
      Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
    </div>
  </div>
   chart 2-->
  <!-- </div>
  <script>
        $(document).ready(function () {
            showGraph();
        });

        function showGraph()
        {
            {
                $.post("../process/proses_chartSafetyAdmin.php",
                function (data)
                {
                    console.log(data);
                     var nama = [];
                     var nilai = [];

                    for (var i in data) {
                        nama.push(data[i].nama);
                        nilai.push(data[i].nilai);
                    }

                    var chartdata = {
                        labels: nama,
                        datasets: [
                            {
                                label: 'Operator',
                                backgroundColor: "#4e73df",
                                hoverBackgroundColor: "#2e59d9",
                                borderColor: "#4e73df",
                                hoverBorderColor: '#666666',
                                data: nilai
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script> -->
<body>