<?php
    include "../config/connection.php";

    function tampilTanggal($con){
        $tampilTanggal = "SELECT tanggal_training FROM tabel_score_safety";
        $resultTampilTanggal = mysqli_query($con, $tampilTanggal);
        return $resultTampilTanggal;
    }

    function tampilHasil($con, $idUser){
        $tampilHasil = "SELECT tss.*, tssd.*, tssd.id_score_safety_detail,tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
        FROM tabel_score_safety tss, tabel_operator tp , tabel_jabatan tj, tabel_score_safety_detail tssd
        WHERE tss.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tss.id_score_safety = tssd.id_score_safety
        AND tu.id_user = '$idUser'";
        $resultTampilHasil = mysqli_query($con, $tampilHasil);
        return $resultTampilHasil;
    }
?>