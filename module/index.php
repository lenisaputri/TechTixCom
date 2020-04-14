<?php
  session_start();
  include "../config/connection.php";
  include "../process/proses_modalPengaturan.php";

  if (isset($_SESSION["id"])) {
    $level = $_SESSION['level'];
    $idUser = $_SESSION['id'];
  } 
  else {
    $message = "Login terlebih dahulu!";
    echo ("<script LANGUAGE='JavaScript'>
      window.alert('$message');
      window.location.href='../';
      </script>");
  }

  $queryModalPengaturan = "SELECT * FROM tabel_user WHERE id_user = '$idUser'";
  $resultModalPengaturan = mysqli_query($con, $queryModalPengaturan);

  $item = '';
  if (mysqli_num_rows($resultModalPengaturan) == 1) {
    $item = mysqli_fetch_assoc($resultModalPengaturan);
  }
?>

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
    <div id="wrapper">
      <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
          <div class="sidebar-brand-icon">
            <img src="../img/logo/logo_book.png" width="40" height="45" >
          </div>
          <div class="sidebar-brand-text mx-3">MATRIX DEVELOPMENT</div>
        </a>
        <?php
          if ($level != "admin"){
            ?>
              <hr class="sidebar-divider my-0">
              <li class="nav-item active">
                <a class="nav-link" href="index.php?module=home">
                  <i class="fas fa-fw fa-home"></i>
                  <span>Beranda</span>
                </a>
              </li>
            <?php
              if ($level == "operator") {
                ?>
                  <hr class="sidebar-divider">
                  <div class="sidebar-heading">Materi Training</div>
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

            <hr class="sidebar-divider">
            <div class="sidebar-heading">Nilai Assasment</div>
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=safetyTable">
                  <i class="fas fa-fw fa-shield-alt"></i>
                  <span>Nilai Safety</span>
                </a>
                <!-- <div id="collapseSafety" class="collapse" aria-labelledby="headingSafety" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="index.php?module=safetyTable">Tabel Nilai Online Training</a>
                    <a class="collapse-item" href="index.php?module=safetySpider">Spider Nilai Safety</a>
                    <div class="collapse-divider"></div>
                  </div>
                </div> -->
              </li>
              <li class="nav-item">
                <a class="nav-link collapsed" href="index.php?module=generalHrdTable">
                  <i class="fas fa-fw fa-sitemap"></i>
                  <span>Nilai General HRD</span>
                </a>
                <!-- <div id="collapseGeneralHRD" class="collapse" aria-labelledby="headingGeneralHRD" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="index.php?module=generalHrdTable">Tabel Nilai Online Training</a>
                    <a class="collapse-item" href="index.php?module=generalHrdSpider">Spider Nilai General HRD</a>
                    <div class="collapse-divider"></div>
                  </div>
                </div> -->
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?module=qualityTable">
                <i class="fas fa-fw fa-certificate"></i>
                <span>Nilai Quality</span></a>
                <!-- <div id="collapseQuality" class="collapse" aria-labelledby="headingQuality" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="index.php?module=qualityTable">Tabel Nilai Online Training</a>
                    <a class="collapse-item" href="index.php?module=qualitySpider">Spider Nilai Quality</a>
                    <div class="collapse-divider"></div>
                  </div>
                </div> -->
              </li>      
              <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTechnical" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Nilai Technical</span></a>
                <div id="collapseTechnical" class="collapse" aria-labelledby="headingTechnical" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="index.php?module=technicalNilaiObservasi">Tabel Nilai Observasi</a>
                    <a class="collapse-item" href="index.php?module=technicalNilaiOnlineTraining">Tabel Nilai Online Training</a>
                    <a class="collapse-item" href="index.php?module=technicalNilaiPraktek">Tabel Nilai Praktek</a>
                    <div class="collapse-divider"></div>
                  </div>
                </div>
              </li>
              <hr class="sidebar-divider d-none d-md-block">
              <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
              </div>
          </ul>
          <?php
          } 
          else {
            ?>
              <hr class="sidebar-divider my-0">
              <li class="nav-item active">
                <a class="nav-link" href="index.php?module=home">
                  <i class="fas fa-fw fa-home"></i>
                  <span>Beranda</span>
                </a>
              </li>     
              <hr class="sidebar-divider">
              <div class="sidebar-heading">Data Karyawan</div>
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
                <hr class="sidebar-divider">
                <div class="sidebar-heading">Jabatan</div>     
                  <li class="nav-item">
                    <a class="nav-link" href="index.php?module=jabatan" aria-expanded="true" aria-controls="collapsePages">
                      <i class="fas fa-fw fa-sitemap"></i>
                      <span>Jabatan</span>
                    </a>
                  </li>      
                  <hr class="sidebar-divider">
                  <div class="sidebar-heading">Materi Training</div>     
                  <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages">
                      <i class="fas fa-fw fa-file"></i>
                      <span>Data Materi</span>
                    </a>        
                    <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                      <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?module=dataMateriSafety">Materi Safety</a>
                        <a class="collapse-item" href="index.php?module=dataMateriQuality">Materi Quality</a>
                        <a class="collapse-item" href="index.php?module=dataMateriGeneralHrd">Materi General HRD</a>
                        <a class="collapse-item" href="index.php?module=dataMateriTechnical">Materi Technical</a>
                        <div class="collapse-divider"></div>
                      </div>
                    </div>
                  </li>
      <hr class="sidebar-divider">
       <div class="sidebar-heading">NILAI ASSESSMENT</div>      
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseScore" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-trophy"></i>
            <span>Data Nilai Assessment</span>
          </a>        
          <div id="collapseScore" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="index.php?module=dataScoreSafety">Data Nilai Safety</a>
              <a class="collapse-item" href="index.php?module=dataScoreQuality">Data Nilai Quality</a>
              <a class="collapse-item" href="index.php?module=dataScoreGeneralHrd">Data Nilai General HRD</a>
              <a class="collapse-item" href="index.php?module=dataScoreTechnical">Data Nilai Technical</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>
        <hr class="sidebar-divider">
       <div class="sidebar-heading">TECHNICAL PRAKTEK & OBSERVASI</div>      
        <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTechnical" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Praktek & Observasi</span>
          </a>        
          <div id="collapseTechnical" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="index.php?module=technicalNilaiPraktek">Data Nilai Praktek</a>
              <a class="collapse-item" href="index.php?module=technicalNilaiObservasi">Data Nilai Observasi</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>
        <hr class="sidebar-divider">
        <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
      </ul>
      <?php
    } 
    ?>
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>         
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo ($namaUser); ?></span>
              </a>             
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="index.php?module=setting" data-target="#editPengaturan" data-toggle="modal">
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
                  case "generalHrdTable":
                    include "operator/generalHrd/generalHrdTable.php";
                    break;
                  case "qualityTable":
                    include "operator/quality/qualityTable.php";
                    break;
                  case "technicalNilaiObservasi":
                    include "operator/technical/technicalScoreObservasi.php";
                    break;
                  case "technicalNilaiOnlineTraining":
                    include "operator/technical/technicalOnlineTable.php";
                    break;
                  case "technicalNilaiPraktek":
                    include "operator/technical/technicalScorePraktek.php";
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
                  case "generalHrdTable":
                    include "supervisor/generalHrd/generalHrdTable.php";
                    break;
                  case "qualityTable":
                    include "supervisor/quality/qualityTable.php";
                    break;
                  case "technicalNilaiObservasi":
                    include "supervisor/technical/technicalScoreObservasi.php";
                    break;
                  case "technicalNilaiOnlineTraining":
                    include "supervisor/technical/technicalOnlineTable.php";
                    break;
                  case "technicalNilaiPraktek":
                    include "supervisor/technical/technicalScorePraktek.php";
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

                  case "technicalNilaiObservasi":
                    include "admin/dataScoreTechnical/technicalScoreObservasi.php";
                    break;
                  case "technicalNilaiPraktek":
                    include "admin/dataScoreTechnical/technicalScorePraktek.php";
                    break;

                  case "dataMateriSafety":
                    include "admin/materiTraining/dataMateriSafety.php";
                    break;
                  case "dataMateriGeneralHrd":
                    include "admin/materiTraining/dataMateriGeneralHrd.php";
                    break;
                  case "dataMateriQuality":
                    include "admin/materiTraining/dataMateriQuality.php";
                    break;
                  case "dataMateriTechnical":
                    include "admin/materiTraining/dataMateriTechnical.php";
                    break;
                  case "dataScoreSafety":
                    include "admin/dataScore/dataScoreSafety.php";
                    break;
                  case "dataScoreQuality":
                    include "admin/dataScore/dataScoreQuality.php";
                    break;
                  case "dataScoreGeneralHrd":
                    include "admin/dataScore/dataScoreGeneralHrd.php";
                    break;
                  case "dataScoreTechnical":
                    include "admin/dataScore/dataScoreTechnical.php";
                    break;
                  case "dataScoreSafetyDetail":
                    include "admin/dataScoreDetail/dataScoreSafetyDetail.php";
                    break;
                  case "dataScoreQualityDetail":
                    include "admin/dataScoreDetail/dataScoreQualityDetail.php";
                    break;
                  case "dataScoreGeneralHrdDetail":
                    include "admin/dataScoreDetail/dataScoreGeneralHrdDetail.php";
                    break;
                  case "dataScoreTechnicalDetail":
                    include "admin/dataScoreDetail/dataScoreTechnicalDetail.php";
                    break;
                  case "dataMateriSafetyLink":
                    include "admin/materiTraining/dataMateriSafetyLink.php";
                    break;
                  case "dataMateriQualityLink":
                    include "admin/materiTraining/dataMateriQualityLink.php";
                    break;
                  case "dataMateriGeneralHrdLink":
                    include "admin/materiTraining/dataMateriGeneralHrdLink.php";
                    break;
                  case "dataMateriTechnicalLink":
                    include "admin/materiTraining/dataMateriTechnicalLink.php";
                    break;
                  default:
                    include "404.php";
                }
              }
            ?>
        </div>
      </div>
    </div>
  </div>

    <a class="scroll-to-top rounded" href="#home">
      <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="editPengaturan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header d-flex justify-content-center bg-editPengaturan border-0">
            <h5 class="modal-title text-white w-100 text-center">Pengaturan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <input type="hidden" id="passwordModal" value="<?php echo $item['password'] ?>">
          <div class="modal-body" id="edit-jabatan">  
            <div class="row">
              <div class="col-md-12">
                <center><img src="../attachment/img/<?php echo ($rowUser['foto'] == null) ? 'avatar.jpeg' : $rowUser['foto']; ?>" id="fotoPrev" height="150px" width="150px" class="rounded-circle" /></center>
                <br>
                <center><?php echo ($namaUser); ?></center>
                <br>
                <form action="../process/proses_modalPengaturan.php?module=modalPengaturan&act=edit" id="formModalPengaturan2" method="POST" enctype="multipart/form-data">
                  <div class="form-group row">
                    <input type="hidden" name="id_usernya" id="id_usernya" value="<?php echo $idUser ?>">
                    <input type="hidden" name="id_levelnya" id="id_levelnya" value="<?php echo $level ?>">
                    <label class="col-sm-3 small d-flex flex-column justify-content-center" for="foto" style="font-weight: bold">GANTI FOTO</label>
                    <div class="input-group col-sm-9">
                      <input type="file" id="foto" name="foto" onblur="reset_Blank(); reset_Size(); reset_Check();" onchange="preview_image(event);" accept="image/*">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 small d-flex flex-column justify-content-center" for="passwordLama" style="font-weight: bold">PASSWORD LAMA</label>
                    <div class="col-sm-9 input-group">
                      <input type="password" class="form-control form-control-user" name="passwordLama" id="passwordLama" placeholder="Password Lama" onblur="reset_Blank();">
                      <div class="input-group-append">
                        <span class="far fa-eye input-group-text form-control form-control-user" id="eyeA" onclick="showPasswordLama();"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 small d-flex flex-column justify-content-center" for="passwordBaru" style="font-weight: bold">PASSWORD BARU</label>
                    <div class="col-sm-9 input-group">
                      <input type="password" class="form-control form-control-user" id="passwordBaru" placeholder="Password Baru" name="passwordBaru" onblur="reset_Blank();">
                      <div class="input-group-append">
                        <span class="far fa-eye input-group-text form-control form-control-user" id="eyeB" onclick="showPasswordBaru();"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 small d-flex flex-column justify-content-center" for="konfirmasiPassword" style="font-weight: bold">KONFIRMASI PASSWORD</label>
                    <div class="col-sm-9 input-group">
                      <input type="password" class="form-control form-control-user" id="konfirmasiPassword" placeholder="Konfirmasi Password" name="konfirmasiPassword" onblur="reset_Blank();">
                      <div class="input-group-append">
                        <span class="far fa-eye input-group-text form-control form-control-user" id="eyeC" onclick="showPasswordKonfirmasi();"></span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <div id="Blank" class="small d-flex flex-column justify-content-center text-danger"></div>
                      <div id="fotoSize" class="small d-flex flex-column justify-content-center text-danger"></div>
                      <div id="fotoType" class="small d-flex flex-column justify-content-center text-danger"></div>
                      <div id="konfirmasipasswordSalah" class="small d-flex flex-column justify-content-center text-danger"></div>
                      <div id="konfirmasipasswordLamaSalah" class="small d-flex flex-column justify-content-center text-danger"></div>
                    </div>
                  </div>
                  <div class="modal-footer border-0">
                    <button class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
                    <button class="btn btn-primary"  name="update" type="submit" onclick="showFilesSize(event);"><i class="fa fa-check"></i> Simpan</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-center" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../process/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

    <?php
      include "../config/scripts.php";
    ?>

  </body>
</html>
