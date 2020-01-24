<?php
    include "../config/connection.php";

    function tampilMateriTechnical($con)
    {
        $tampilMateriTechnical="select * from tabel_materi_technical";
        $resultTampilMateriTechnical=mysqli_query($con, $tampilMateriTechnical);
        return $resultTampilMateriTechnical;
    }
?>