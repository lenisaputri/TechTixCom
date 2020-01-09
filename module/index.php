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
<input id="idUser" type="hidden" name="idUser" value="<?php echo $idUser ?>">
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
  
  <body id="page-top">
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
          <img src="../img/logo/logo_book.png" width="45" height="45" >
        </div>
        <div class="sidebar-brand-text mx-3">NAMA LOGO</div>
      </a>

      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?module=home">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 1)-->
      <div class="sidebar-heading">Safety</div>

      <!-- Nav Item - Safety (Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=safety">
          <i class="fas fa-fw fa-shield-alt"></i>
          <span>Safety</span>
        </a>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 2)-->
      <div class="sidebar-heading">General HRD</div>

      <!-- Nav Item - General HRD(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=generalHrd">
          <i class="fas fa-fw fa-cogs"></i>
          <span>General HRD</span>
        </a>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 3)-->
      <div class="sidebar-heading">Technical</div>
      
      <!-- Nav Item - Technical(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?module=technical" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Technical</span>
        </a>
<!--         
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Technical Machine :</h6>
            <a class="collapse-item" href="#">1</a>
            <a class="collapse-item" href="#">2</a>
            <a class="collapse-item" href="#">3</a>
            <div class="collapse-divider"></div>
          </div>
        </div> -->
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 4)-->
      <div class="sidebar-heading">Quality</div>

      <!-- Nav Item - Quality(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=quality">
          <i class="fas fa-fw fa-certificate"></i>
          <span>Quality</span></a>
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
          
          <!-- Topbar Navbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          
          <!-- Topbar Navbar User-->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">LEVEL</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
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
          <img src="../img/logo/logo_book.png" width="45" height="45" >
        </div>
        <div class="sidebar-brand-text mx-3">NAMA LOGO</div>
      </a>

      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?module=home">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 1)-->
      <div class="sidebar-heading">Safety</div>

      <!-- Nav Item - Safety (Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=safety">
          <i class="fas fa-fw fa-shield-alt"></i>
          <span>Safety</span>
        </a>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 2)-->
      <div class="sidebar-heading">General HRD</div>

      <!-- Nav Item - General HRD(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=generalHrd">
          <i class="fas fa-fw fa-cogs"></i>
          <span>General HRD</span>
        </a>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 3)-->
      <div class="sidebar-heading">Technical</div>
      
      <!-- Nav Item - Technical(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link collapsed" href="index.php?module=technical" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-cogs"></i>
          <span>Technical</span>
        </a>
        
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Technical Machine :</h6>
            <a class="collapse-item" href="#">1</a>
            <a class="collapse-item" href="#">2</a>
            <a class="collapse-item" href="#">3</a>
            <div class="collapse-divider"></div>
          </div>
        </div>
      </li>
      
      <!-- Divider (Garis Pembagi)-->
      <hr class="sidebar-divider">

      <!-- Heading (Main Isi Menu 4)-->
      <div class="sidebar-heading">Quality</div>

      <!-- Nav Item - Quality(Sub Isi Menu)-->
      <li class="nav-item">
        <a class="nav-link" href="index.php?module=quality">
          <i class="fas fa-fw fa-certificate"></i>
          <span>Quality</span></a>
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
          
          <!-- Topbar Navbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          
          <!-- Topbar Navbar User-->
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">LEVEL</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
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
  <a class="scroll-to-top rounded" href="#page-top">
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
