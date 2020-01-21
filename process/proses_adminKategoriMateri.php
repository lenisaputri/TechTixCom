<?php
include "../config/connection.php";

function tampilKategoriMateri($con)
{
    $tampilKategoriMateri="select * from tabel_kategori_materi";
    $resultTampilKategoriMateri=mysqli_query($con, $tampilKategoriMateri);
    return $resultTampilKategoriMateri;
}

?>