<?php
    include "../config/connection.php";

    function tampilMateriSafety($con)
    {
        $tampilMateriSafety="select * from tabel_materi_safety";
        $resultTampilMateriSafety=mysqli_query($con, $tampilMateriSafety);
        return $resultTampilMateriSafety;
    }
?>