<?php
include "../config/connection.php";

function tampilJabatan($con){
    $jabatan="SELECT * FROM tabel_jabatan";
    $resultJabatan = mysqli_query($con, $jabatan);
    return $resultJabatan;
}

?>