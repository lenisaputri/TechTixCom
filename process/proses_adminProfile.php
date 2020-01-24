<?php
include "../config/connection.php";

function tampilProfilAdmin($con, $idUser){
    
    $tampilProfilAdmin = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_admin a, tabel_jabatan b , tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
    $resultTampilProfilAdmin = mysqli_query($con, $tampilProfilAdmin);
    return $resultTampilProfilAdmin;
   }

   
?>