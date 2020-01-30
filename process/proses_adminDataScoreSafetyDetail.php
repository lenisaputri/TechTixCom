<?php
include "../config/connection.php";

function tampilScoreSafety($con)
{
    $tampilScoreSafety="SELECT DISTINCT(tss.id_operator), tss.id_score_safety ,tss.*, tp.id_operator, tp.nik FROM tabel_score_safety tss, tabel_operator tp
    WHERE tss.id_operator = tp.id_operator GROUP BY tss.id_operator";
    $resultTampilScoreSafety=mysqli_query($con, $tampilScoreSafety);
    return $resultTampilScoreSafety;
}

function tampilScoreSafetyDate($con)
{
    $tampilScoreSafetyDate="SELECT DISTINCT(tss.tanggal_training), tss.id_score_safety ,tss.*, tp.id_operator, tp.nik FROM tabel_score_safety tss, tabel_operator tp
    WHERE tss.id_operator = tp.id_operator GROUP BY tss.tanggal_training";
    $resultTampilScoreSafetyDate=mysqli_query($con, $tampilScoreSafetyDate);
    return $resultTampilScoreSafetyDate;
}
    
?>