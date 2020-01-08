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
        <div class="container justify-content-center">
            <!-- Outer Row -->
            <div class="row d-flex justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-4 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Online Result Training</h1>
                                        </div>
                                        <form class="user">
                                            <div class="row form-group">
                                                <label class="col-md-2 small d-flex flex-column justify-content-center" for="password">Username</label>
                                                <div class="input-group col-md-10">
                                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                                                </div>
                                            </div>
                                            <div class="row form-group" style="margin-top: 35px;">
                                                <label class="col-md-2 small d-flex flex-column justify-content-center" for="password">Password</label>
                                                <div class="input-group col-md-10">
                                                    <input type="password" class="form-control form-control-user" name="password" id="password" placeholder="Password" onkeyup="validatePassword(this)">
                                                    <div class="input-group-append">
                                                        <span class="far fa-eye input-group-text form-control form-control-user" id="eye" onclick="showPassword();">
                                                            
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                
                                            </div>
                                            <a href="#" class="btn btn-primary btn-user btn-block" style="margin-top: 35px;">Login</a>
                                        </form>

                                        <!-- button hak akses -->
                                        <!-- <form action="../process/loginProcess.php" method="post" style="margin-top: 35px;">
                                            <input type="submit" name="operator" class="btn btn-primary align-self-end shadow-none mr-3" value="Operator">
                                            <input type="submit" name="supervisor" class="btn btn-secondary align-self-end shadow-none mr-3" value="Supervisor">
                                            <input type="submit" name="admin" class="btn btn-warning align-self-end shadow-none mr-3" value="Admin">
                                        </form> -->
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