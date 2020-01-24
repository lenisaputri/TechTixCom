<?php
    include "../config/connection.php";

    function tampilMateriGeneralHrd($con)
    {
        $tampilMateriGeneralHrd="select * from tabel_materi_generalhrd";
        $resultTampilMateriGeneralHrd=mysqli_query($con, $tampilMateriGeneralHrd);
        return $resultTampilMateriGeneralHrd;
    }
?>