<?php
    include "../config/connection.php";

    function tampilScoreSafetyDetailSupervisor($con, $id){
        $tampilScoreSafetyDetailSupervisor = "SELECT tss.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan
        FROM tabel_score_safety tss, tabel_operator tp , tabel_jabatan tj
        WHERE tss.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tss.id_score_safety = '$id'";
        $resultTampilScoreSafetyDetailSupervisor = mysqli_query($con, $tampilScoreSafetyDetailSupervisor);
        return $resultTampilScoreSafetyDetailSupervisor;
    }

    function tampilScoreSafetyDetailNilaiSupervisor($con, $id){
        $tampilScoreSafetyDetailNilaiSupervisor = "SELECT tss.*, tp.id_operator, tp.nik, tssd.*
        FROM tabel_score_safety tss, tabel_operator tp , tabel_score_safety_detail tssd
        WHERE tss.id_operator = tp.id_operator 
        AND tss.id_score_safety = tssd.id_score_safety
        AND tss.id_score_safety = '$id'";
        $resultTampilScoreSafetyDetailNilaiSupervisor = mysqli_query($con, $tampilScoreSafetyDetailNilaiSupervisor);
        return $resultTampilScoreSafetyDetailNilaiSupervisor;
    }
?>