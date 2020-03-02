<?php
include "../config/connection.php";

$coba = mysqli_query($con, "SELECT tss.*, tssd.*, tssd.id_score_safety_detail,tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
FROM tabel_score_safety tss, tabel_operator tp , tabel_jabatan tj, tabel_score_safety_detail tssd
WHERE tss.id_operator = tp.id_operator 
AND tp.id_jabatan = tj.id_jabatan
AND tss.id_score_safety = tssd.id_score_safety AND tssd.id_score_safety_detail = 2");
?>
<head>
<script src="../vendor/chart.js/Chart.min.js"></script>
</head>
<body>
        <!-- Begin Page Content (Bawah Navbar)-->
        <div class="container-fluid" id="safety">
          <div class="row">
            <!-- Spider Matrix Chart -->
            <div class="col-lg-12 mb-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Spider Matrix</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <canvas id="marksChartSafetyOperator"></canvas>
                </div>
                <script>
                var marksCanvas = document.getElementById("marksChartSafetyOperator");
                
                var marksData = {
                  labels: ["SMK3", "EA-HIRA", "MOVEMENT FORKLIFT", "CONFINED SPACE", "LOTO", "APD", "BBS", "FIRE FIGHTING", "WAH", "ENVIRONMENT", "P3K"],
                  datasets: [{
                    label: "",
                    backgroundColor: "rgba(200,0,0,0.2)",
                    data: [<?php while ($p = mysqli_fetch_array($coba)) { echo '"' . $p['smk3'] . '","' . $p['ea_hira'] . '","' . $p['movement_forklift'] . '","' . $p['confined_space'] . '","' . $p['loto'] . '","' . $p['apd'] . '","' . $p['bbs'] . '","' . $p['fire_fighting'] . '","' . $p['wah'] . '","' . $p['environment'] . '","' . $p['p3k'] . '"';}?>]
                  }]
                  };
                  
                  var radarChart = new Chart(marksCanvas, {
                    type: 'radar',
                    data: marksData
                  });
                </script>
              </div>
            </div>
          </div>

          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6 mb-4"></div>
          </div>
        </div>
        <!-- /.container-fluid -->
        </body>