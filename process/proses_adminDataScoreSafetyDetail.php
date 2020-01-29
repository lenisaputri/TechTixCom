<?php
include "../config/connection.php";

function tampilScoreSafety($con)
{
    $tampilScoreSafety="SELECT DISTINCT(tss.id_operator), tss.*,  tss.nik, tp.* FROM tabel_score_safety tss, tp tabel_operator
    WHERE tss.id_operator = tp.id_operator
    GROUP BY tss.id_operator";
    $resultTampilScoreSafety=mysqli_query($con, $tampilScoreSafety);
    return $resultTampilScoreSafety;
}
    
?>