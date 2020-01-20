<?php
session_start();
include "../config/connection.php";

if (isset($_SESSION["id"])) {
  $level = $_SESSION['level'];
  $idUser = $_SESSION['id'];
} else {
  $message = "Login terlebih dahulu!";
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('$message');
    window.location.href='../';
    </script>");
  // header("Location: ../");
}
?>
<!-- <input id="idUser" type="hidden" name="idUser" value="<?php echo $idUser ?>"> -->
<?php

switch ($level) {
  case 'admin':
    $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_admin b WHERE a.id_user=$idUser and a.id_user=b.id_user";
    $resultUser = mysqli_query($con, $queryUser);
    $rowUser = mysqli_fetch_assoc($resultUser);
    $namaUser = $rowUser["nama"];
    break;
  case 'operator':
    $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_operator b WHERE a.id_user=$idUser and a.id_user=b.id_user";
    $resultUser = mysqli_query($con, $queryUser);
    $rowUser = mysqli_fetch_assoc($resultUser);
    $namaUser = $rowUser["nama"];
    break;
  case 'supervisor':
    $queryUser = "SELECT a.*, b.* FROM tabel_user a, tabel_supervisor b WHERE a.id_user=$idUser and a.id_user=b.id_user";
    $resultUser = mysqli_query($con, $queryUser);
    $rowUser = mysqli_fetch_assoc($resultUser);
    $namaUser = $rowUser["nama"];
    break;
  default:
    $namaUser = "User tidak ditemukan";
    break;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Online Result Training</title>

    <?php
            include "../config/styles.php";
        ?>
  </head>
  
  <body id="home">
  <!-- navigation Admin & Supervisor & Operator -->
    <!-- Page Wrapper (Untuk Menu) -->
    <?php
    if ($level != "admin"){
      ?>
      <div id="wrapper">
      <!-- Sidebar (Menu)-->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand (Judul) -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="../img/logo/logo_book.png" width="40" height="45" >
        </div>
        <div class="sidebar-brand-text mx-3">NAMA LOGO</div>
      </a>

      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?module=home">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span>
        </a>
      </li>

      <?php
      if ($level == "operator") {
            ?>
            <!-- Divider (Garis Pembagi)-->
            <hr class="sidebar-divider">

            <!-- Heading (Main Isi Menu 4)-->
            <div class="sidebar-heading">Materi Training</div>
            
            <!-- Nav Item - Technical(Sub Isi Menu)-->
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-file"></i>
            <span>Materi Training</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?module=materiSafety">Materi Safety</a>
            <a class="collapse-item" href="index.php?module=materiGeneralHrd">Materi General HRD</a>
            <a class="collapse-item" href="index.php?module=materiQuality">Materi Quality</a>
            <a class="collapse-item" href="index.php?module=materiTechnical">Materi Technical Machine</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>
            <?php
          } 
            ?>
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 1)-->
      <div class="sidebar-heading">Score Assasment</div>

      <!-- Nav Item - Safety (Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#"  data-toggle="collapse" data-target="#collapseSafety" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-shield-alt"></i>
          <span>Score Safety</span>
        </a>
        <div id="collapseSafety" class="collapse" aria-labelledby="headingSafety" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?module=safetyTable">Table Score</a>
            <a class="collapse-item" href="index.php?module=safetySpider">Spider Score</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>

      <!-- Nav Item - General HRD(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGeneralHRD" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Score General HRD</span>
        </a>
        <div id="collapseGeneralHRD" class="collapse" aria-labelledby="headingGeneralHRD" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?module=generalHrdTable">Table Score</a>
            <a class="collapse-item" href="index.php?module=generalHrdSpider">Spider Score</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>

      <!-- Nav Item - Quality(Sub Isi Menu)-->
      <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseQuality" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-certificate"></i>
          <span>Score Quality</span></a>
          <div id="collapseQuality" class="collapse" aria-labelledby="headingQuality" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?module=qualityTable">Table Score</a>
            <a class="collapse-item" href="index.php?module=qualitySpider">Spider Score</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>
      
      <!-- Nav Item - Technical(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?module=technical" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Score Technical</span>
        </a>
        <div id="collapseUtilities" class="collapse list-group" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <a href="#sub-menu1" class="collapse-item nav-link collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#sub-menu1">Body Welder Operator<span class="caret"></span></a>
            <div class="collapse list-group" id="sub-menu1">
              <a href="#" class="list-group-item" data-parent="#sub-menu">Observasi</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Online Training</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Praktek</a>
            </div>
            <a href="#sub-menu2" class="collapse-item nav-link collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#sub-menu2">Can O Mat Operator<span class="caret"></span></a>
            <div class="collapse list-group" id="sub-menu2">
              <a href="#" class="list-group-item" data-parent="#sub-menu">Observasi</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Online Training</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Praktek</a>
            </div>
            <a href="#sub-menu3" class="collapse-item nav-link collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#sub-menu3">End O Mat Operator<span class="caret"></span></a>
            <div class="collapse list-group" id="sub-menu3">
              <a href="#" class="list-group-item" data-parent="#sub-menu">Observasi</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Online Training</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Praktek</a>
            </div>
            <a href="#sub-menu4" class="collapse-item nav-link collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#sub-menu4">Palleteizer Operator<span class="caret"></span></a>
            <div class="collapse list-group" id="sub-menu4">
              <a href="#" class="list-group-item" data-parent="#sub-menu">Observasi</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Online Training</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Praktek</a>
            </div>
            <a href="#sub-menu5" class="collapse-item nav-link collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#sub-menu5">Area Engineer Technician<span class="caret"></span></a>
            <div class="collapse list-group" id="sub-menu5">
              <a href="#" class="list-group-item" data-parent="#sub-menu">Observasi</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Online Training</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Praktek</a>
            </div>
            <a href="#sub-menu6" class="collapse-item nav-link collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#sub-menu6">Admin SAP<span class="caret"></span></a>
            <div class="collapse list-group" id="sub-menu6">
              <a href="#" class="list-group-item" data-parent="#sub-menu">Observasi</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Online Training</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Praktek</a>
            </div>
            <a href="#sub-menu7" class="collapse-item nav-link collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#sub-menu7">Production SPV<span class="caret"></span></a>
            <div class="collapse list-group" id="sub-menu7">
              <a href="#" class="list-group-item" data-parent="#sub-menu">Observasi</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Online Training</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Praktek</a>
            </div>
            <a href="#sub-menu8" class="collapse-item nav-link collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#sub-menu8">Area Engineer SPV<span class="caret"></span></a>
            <div class="collapse list-group" id="sub-menu8">
              <a href="#" class="list-group-item" data-parent="#sub-menu">Observasi</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Online Training</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Praktek</a>
            </div>
            <a href="#sub-menu9" class="collapse-item nav-link collapsed" data-toggle="collapse" aria-expanded="true" data-parent="#sub-menu9">Can Making Manager<span class="caret"></span></a>
            <div class="collapse list-group" id="sub-menu9">
              <a href="#" class="list-group-item" data-parent="#sub-menu">Observasi</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Online Training</a>
              <a href="#" class="list-group-item" data-parent="#sub-menu">Praktek</a>
            </div>
        </div>

        <!-- <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Body Welder Operator</a>
            <a class="collapse-item" href="#">Can O Mat Operator</a>
            <a class="collapse-item" href="#">End O Mat Operator</a>
            <a class="collapse-item" href="#">Palleteizer Operator</a>
            <a class="collapse-item" href="#">Area Engineer Technician</a>
            <a class="collapse-item" href="#">Admin SAP</a>
            <a class="collapse-item" href="#">Production SPV</a>
            <a class="collapse-item" href="#">Area Engineer SPV</a>
            <a class="collapse-item" href="#">Can Making Manager</a>
            <div class="collapse-divider"></div>
          </div>
        </div> -->
      </li>
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper (Konten Samping)-->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar (Navbar atas)-->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <!-- Topbar Navbar User-->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ($namaUser); ?></span>
              </a>
              
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?module=profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile
                </a>
                <a class="dropdown-item" href="index.php?module=setting">
                  <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <?php
    } else {
      ?>
            <div id="wrapper">
      <!-- Sidebar (Menu)-->
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand (Judul) -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img src="../img/logo/logo_book.png" width="40" height="45" >
        </div>
        <div class="sidebar-brand-text mx-3">NAMA LOGO</div>
      </a>

      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?module=home">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span>
        </a>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 3)-->
      <div class="sidebar-heading">Data Karyawan</div>
      
      <!-- Nav Item - Technical(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-id-card"></i>
          <span>Data Karyawan</span>
        </a>
        
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?module=dataAdmin">Data Admin</a>
            <a class="collapse-item" href="index.php?module=dataOperator">Data Operator</a>
            <a class="collapse-item" href="index.php?module=dataSupervisor">Data Supervisor</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

            <!-- Heading (Main Isi Menu 3)-->
            <div class="sidebar-heading">Jabatan</div>
      
      <!-- Nav Item - Technical(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=jabatan" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-sitemap"></i>
          <span>Jabatan</span>
        </a>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 4)-->
      <div class="sidebar-heading">Materi Training</div>
      
      <!-- Nav Item - Technical(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-file"></i>
          <span>Materi Training</span>
        </a>
        
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="index.php?module=materiSafety">Materi Safety</a>
            <a class="collapse-item" href="#">Materi General HRD</a>
            <a class="collapse-item" href="#">Materi Quality</a>
            <a class="collapse-item" href="#">Materi Technical Machine</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper (Konten Samping)-->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar (Navbar atas)-->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          
          <!-- Topbar Navbar User-->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ($namaUser); ?></span>
              </a>
              
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?module=profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Profile
                </a>
                <a class="dropdown-item" href="index.php?module=setting">
                  <i class="fas fa-wrench fa-sm fa-fw mr-2 text-gray-400"></i>Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <?php
    } 
    ?>
        <!-- Begin Page Content (Bawah Navbar)-->
        <div class="container-fluid">
            <?php
              $module = $_GET['module'];
              if ($level == "operator"){
                switch ($module){
                  case "home":
                    include "operator/home.php";
                    break;
                  case "safetyTable":
                    include "operator/safety/safetyTable.php";
                    break;
                  case "safetySpider":
                    include "operator/safety/safetySpider.php";
                    break;
                  case "generalHrdTable":
                    include "operator/generalHrd/generalHrdTable.php";
                    break;
                  case "generalHrdSpider":
                    include "operator/generalHrd/generalHrdSpider.php";
                    break;
                  case "qualityTable":
                    include "operator/quality/qualityTable.php";
                    break;
                  case "qualitySpider":
                    include "operator/quality/qualitySpider.php";
                    break;
                  case "technical":
                    include "operator/technical.php";
                    break;
                  case "materiSafety":
                    include "operator/materiOperator/materiSafety.php";
                    break;
                  case "materiGeneralHrd":
                    include "operator/materiOperator/materiGeneralHrd.php";
                    break;
                  case "materiQuality":
                    include "operator/materiOperator/materiQuality.php";
                    break;
                  case "materiTechnical":
                    include "operator/materiOperator/materiTechnical.php";
                    break;
                  default:
                    include "404.php";
                }
              } else if ($level == "supervisor"){
                switch ($module){
                  case "home":
                    include "supervisor/home.php";
                    break;
                  case "safetyTable":
                    include "supervisor/safety/safetyTable.php";
                    break;
                  case "safetySpider":
                    include "supervisor/safety/safetySpider.php";
                    break;
                  case "generalHrdTable":
                    include "supervisor/generalHrd/generalHrdTable.php";
                    break;
                  case "generalHrdSpider":
                    include "supervisor/generalHrd/generalHrdSpider.php";
                    break;
                  case "qualityTable":
                    include "supervisor/quality/qualityTable.php";
                    break;
                  case "qualitySpider":
                    include "supervisor/quality/qualitySpider.php";
                    break;
                  case "technical":
                    include "supervisor/technical.php";
                    break;
                  default:
                    include "404.php";
                }
              } else if ($level == "admin"){
                switch ($module){
                  case "home":
                    include "admin/home.php";
                    break;
                  case "safety":
                    include "admin/safety.php";
                    break;
                  case "generalHrd":
                    include "admin/generalHrd.php";
                    break;
                  case "technical":
                    include "admin/technical.php";
                    break;
                  case "dataAdmin":
                    include "admin/dataKaryawan/dataAdmin.php";
                    break;
                  case "dataOperator":
                    include "admin/dataKaryawan/dataOperator.php";
                    break;
                  case "dataSupervisor":
                    include "admin/dataKaryawan/dataSupervisor.php";
                    break;
                  case "jabatan":
                    include "admin/jabatan/jabatan.php";
                    break;
                  case "materiSafety":
                    include "admin/materiTraining/materiSafety.php";
                    break;
                  case "quality":
                    include "admin/quality.php";
                    break;
                  default:
                    include "404.php";
                }
              }
            ?>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->
  
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#home">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../process/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <?php
  include "../config/scripts.php";
  ?>

</body>

</html>
