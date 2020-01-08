<?php 
  session_start();
  $level=$_SESSION['level'];
  if($level=="operator" || $level=="supervisor" || $level=="admin"){
    header("location: module/index.php?module=home");
        exit();
  }else{
    header("location: module/login.php");
        exit();
  }
?>