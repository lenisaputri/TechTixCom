<?php
    include "../config/connection.php";

    function tampilMateriQuality($con)
    {
        $tampilMateriQuality="select * from tabel_materi_quality";
        $resultTampilMateriQuality=mysqli_query($con, $tampilMateriQuality);
        return $resultTampilMateriQuality;
    }
?>