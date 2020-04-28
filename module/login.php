<?php 
    include "../config/connection.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">        
        <title>Login - Online Result Training</title>
        
        <?php
            include "../config/styles.php";
        ?>
    </head>    
    <body id="login">
        <div class="contact-form">
            <img src="../img/logo/logo_login.png" class="avatar">
            <div class="text-center">
                <h3 class="font-weight-bold text-white">ONLINE RESULT TRAINING</h3>
            </div>
            <br>
            <form class="user mb-5" action="../process/loginProcess.php" action="../process/loginProcess.php" method="post" onsubmit="return validateOnSubmit();">
                <div class="row form-group" style="color:#ffff;">
                    <span><i class="fas fa-user"></i></span>&nbsp
                    <label class="d-flex flex-column justify-content-center font-weight-bold " for="password"> Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username" onkeyup="validateUsername(this)">
                    </div>
                </div>
                <div class="row form-group" style="margin-top: 15px; color:#ffff;">
                    <span><i class="fas fa-lock"></i></span>&nbsp
                    <label class="d-flex flex-column justify-content-center font-weight-bold" for="password"> Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" onkeyup="validatePassword(this)">
                        <div class="input-group-append">
                            <span class="far fa-eye input-group-text form-control form-control-user" id="eye" onclick="showPassword();"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div id="parent-error" class="align-self-start">
                        <small class="rounded border border-danger text-danger align-self-start p-1 d-none mt-2" id="error-handling"></small>
                        <?php
                        if(isset($_GET["error"]))
                        {
                            $error = $_GET["error"];
                            ?>
                            <small class="rounded border border-danger text-danger align-self-start p-1 d-flex mt-2" id="error-handling2">
                                <?php
                                echo $error;
                        }
                                ?>
                            </small>
                    </div>
                </div>
                <input type="submit" name="submit" class="col-md-4-center btn btn-primary btn-user btn-block text-center" style="margin-top: 20px;"  id="masuk" value="Login">
                <a href="" data-toggle="modal" data-target="#lupaPassword" class="d-flex flex-column justify-content-center text-white text-center mt-3" style="font-size: 10pt;">Lupa
              Password Anda ?</a>
            </form>
            
        </div>
  <!-- Modal lupa password -->
  <div class="modal fade" id="lupaPassword" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header d-flex justify-content-center">
          <h5 class="modal-title">Lupa Password ??</h5>
        </div>
        <div class="modal-body pb-0">
          <ol>
            <li>Temui admin di ruang admin</li>
            <li>Tanyakan password untuk akun anda kepada admin</li>
            <li>Tunggu sampai admin memberikan password anda lalu login</li>
            <li>Jika ingin mengganti password, pilih opsi Ganti Password pada setting akun anda</li>
          </ol>
        </div>
        <div class="align-self-end p-3">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

              <!-- Modal lupa password -->
        <?php
            include "../config/scripts.php";
        ?>
    </body>
</html>