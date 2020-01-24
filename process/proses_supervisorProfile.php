<?php
include "../config/connection.php";

function tampilProfilSupervisor($con, $idUser){
    
    $tampilProfilSupervisor = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_supervisor a, tabel_jabatan b , tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
    $resultTampilProfilSupervisor = mysqli_query($con, $tampilProfilSupervisor);
    return $resultTampilProfilSupervisor;
   }
?>