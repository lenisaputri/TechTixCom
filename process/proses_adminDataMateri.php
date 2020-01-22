<?php

function tampilKategoriMateri($con){
    $kategoriMateri ="SELECT * FROM tabel_kategori_materi";
    $resultKategoriMateri = mysqli_query($con, $kategoriMateri);
    return $resultKategoriMateri;
}

?>