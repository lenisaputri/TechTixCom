<?php
    include "../config/connection.php";

    function tampilJabatan($con)
    {
        $tampilJabatan="select * from tabel_jabatan";
        $resultTampilJabatan=mysqli_query($con, $tampilJabatan);
        return $resultTampilJabatan;
    }
?>