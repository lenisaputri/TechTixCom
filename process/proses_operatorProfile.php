<?php
include "../config/connection.php";

function tampilProfilOperator($con, $idUser){
    
    $tampilProfilOperator = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_operator a, tabel_jabatan b , tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
    $resultTampilProfilOperator = mysqli_query($con, $tampilProfilOperator);
    return $resultTampilProfilOperator;
   }

   
?>