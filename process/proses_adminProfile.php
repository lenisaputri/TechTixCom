<?php
include "../config/connection.php";

function tampilProfilAdmin($con, $idUser){
    
    $tampilProfilAdmin = "SELECT ta.*, tj.nama AS nama_jabatan, tu.* FROM tabel_admin ta, tabel_jabatan tj , tabel_user tu 
    WHERE ta.id_jabatan = tj.id_jabatan AND tu.username = ta.nik AND tu.id_user = '$idUser'";
    $resultTampilProfilAdmin = mysqli_query($con, $tampilProfilAdmin);
    return $resultTampilProfilAdmin;
   } 
?>