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
        
        <title>Online Training Cam</title>
        
        <?php
            include "../config/styles.php";
        ?>
    </head>
    
    <body class="bg-gradient-primary">
        <div class="container">
            <div class="fullscreen d-flex flex-column justify-content-center align-items-center">
                <h1 style="font-weight: 800; color: #40407A;">LOGIN</h1>
                <h3 style="font-weight: 800; color: #40407A;">Online Assement</h3>
            </div>
            
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-4 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <form class="user">
                                            <div class="row form-group">
                                                <label class="col-md-2 small d-flex flex-column justify-content-center" for="password">Username</label>
                                                <div class="input-group col-md-10">
                                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-md-2 small d-flex flex-column justify-content-center" for="password">Password</label>
                                                <div class="input-group col-md-10">
                                                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" onkeyup="validatePassword(this)">
                                                    <div class="input-group-append">
                                                        <span class="far fa-eye form-control form-control-user" id="eye" onclick="showPassword();"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary btn-user btn-block">Login</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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