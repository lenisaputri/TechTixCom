<?php
include "../config/connection.php";

function tampilProfilOperator($con, $idUser){
    $tampilProfilOperator = "SELECT * FROM tabel_operator td INNER JOIN tabel_user tu ON tu.username = td.nik where tu.id_user = '$idUser'";
    $resultTampilProfilOperator = mysqli_query($con, $tampilProfilOperator);
    return $resultTampilProfilOperator;
   }

function tampilJabatan($con){
    $tampilJabatan="select * from tabel_jabatan";
    $resultJabatan = mysqli_query($con, $tampilJabatan);
    return $resultJabatan;
}
?>