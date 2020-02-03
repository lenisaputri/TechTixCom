<?php
    include "../config/connection.php";

    function tampilProfilOperator($con, $idUser){
        
        $tampilProfilOperator = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_operator a, tabel_jabatan b , 
        tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
        $resultTampilProfilOperator = mysqli_query($con, $tampilProfilOperator);
        return $resultTampilProfilOperator;
    }

    function tampilScoreSafetyOperator($con, $idUser){
        $tampilScoreSafetyOperator = "SELECT tss.*, tp.id_operator, tp.nik, tu.* FROM tabel_score_safety tss, 
        tabel_operator tp, tabel_user tu WHERE tss.id_operator = tp.id_operator AND tu.username = tp.nik AND tu.id_user = '$idUser'";
        $resultTampilScoreSafetyOperator = mysqli_query($con, $tampilScoreSafetyOperator);
        return $resultTampilScoreSafetyOperator;
    }

    function tampilScoreSafetyDetailOperator($con, $idUser){
        $tampilScoreSafetyDetailOperator = "SELECT tss.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan , tu.*
        FROM tabel_score_safety tss, tabel_operator tp , tabel_jabatan tj , tabel_user tu 
        WHERE tss.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tu.username = tp.nik 
        AND tu.id_user = '$idUser'";
        $resultTampilScoreSafetyDetailOperator = mysqli_query($con, $tampilScoreSafetyDetailOperator);
        return $resultTampilScoreSafetyDetailOperator;
    }

    function tampilScoreSafetyDetailNilaiOperator($con, $idUser){
        $tampilScoreSafetyDetailNilaiOperator = "SELECT tss.*, tp.id_operator, tp.nik, tssd.*, tu.*
        FROM tabel_score_safety tss, tabel_operator tp , tabel_score_safety_detail tssd , tabel_user tu 
        WHERE tss.id_operator = tp.id_operator 
        AND tss.id_score_safety = tssd.id_score_safety
        AND tu.username = tp.nik
        AND tu.id_user = '$idUser'";
        $resultTampilScoreSafetyDetailNilaiOperator = mysqli_query($con, $tampilScoreSafetyDetailNilaiOperator);
        return $resultTampilScoreSafetyDetailNilaiOperator;
    }
?>