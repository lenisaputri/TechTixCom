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
                <h2>Online Result Training</h2>
            </div>
            <form class="user" action="../process/loginProcess.php" action="../process/loginProcess.php" method="post" onsubmit="return validateOnSubmit();">
                <div class="row form-group"style="color:#ffff;">
                    <span><i class="fas fa-user"></i></span>
                    <label class="d-flex flex-column justify-content-center" for="password">Username</label>
                    <div class="input-group">
                        <input type="text" class="form-control form-control-user" name="username" id="username" placeholder="Username" onkeyup="validateUsername(this)">
                    </div>
                </div>
                <div class="row form-group" style="margin-top: 15px; color:#ffff;">
                    <span><i class="fas fa-lock"></i></span>
                    <label class="d-flex flex-column justify-content-center" for="password">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" onkeyup="validatePassword(this)">
                        <div class="input-group-append">
                            <span class="far fa-eye input-group-text form-control form-control-user" id="eye" onclick="showPassword();"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div id="parent-error" class="align-self-start mt-4">
                        <small class="rounded border border-danger text-danger align-self-start p-1 ml-3 d-none" id="error-handling"></small>
                        <?php
                        if(isset($_GET["error"]))
                        {
                            $error = $_GET["error"];
                            ?>
                            <small class="rounded border border-danger text-danger align-self-start p-1 ml-3 d-flex" id="error-handling2">
                                <?php
                                echo $error;
                        }
                                ?>
                            </small>
                    </div>
                </div>
                <input type="submit" name="submit" class="col-md-4-center btn btn-primary btn-user btn-block text-center" style="margin-top: 35px;" id="masuk" value="Login">
            </form>
        <?php
            include "../config/scripts.php";
        ?>
    </body>
</html>