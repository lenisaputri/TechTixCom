<?php
    include "../config/connection.php";

    function tampilProfilOperator($con, $idUser){
        
        $tampilProfilOperator = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_operator a, tabel_jabatan b , 
        tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
        $resultTampilProfilOperator = mysqli_query($con, $tampilProfilOperator);
        return $resultTampilProfilOperator;
    }

    function tampilScoreQualityOperator($con, $idUser){
        $tampilScoreQualityOperator = "SELECT tsq.*, tp.id_operator, tp.nik, tu.* FROM tabel_score_quality tsq, 
        tabel_operator tp, tabel_user tu WHERE tsq.id_operator = tp.id_operator AND tu.username = tp.nik AND tu.id_user = '$idUser'";
        $resultTampilScoreQualityOperator = mysqli_query($con, $tampilScoreQualityOperator);
        return $resultTampilScoreQualityOperator;
    }

    function tampilScoreQualityDetailOperator($con, $idUser){
        $tampilScoreQualityDetailOperator = "SELECT tsq.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan , tu.*
        FROM tabel_score_quality tsq, tabel_operator tp , tabel_jabatan tj , tabel_user tu 
        WHERE tsq.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tu.username = tp.nik 
        AND tu.id_user = '$idUser'";
        $resultTampilScoreQualityDetailOperator = mysqli_query($con, $tampilScoreQualityDetailOperator);
        return $resultTampilScoreQualityDetailOperator;
    }

    function tampilScoreQualityDetailNilaiOperator($con, $idUser){
        $tampilScoreQualityDetailNilaiOperator = "SELECT tsq.*, tp.id_operator, tp.nik, tssq.*, tu.*
        FROM tabel_score_quality tsq, tabel_operator tp , tabel_score_quality_detail tssq , tabel_user tu 
        WHERE tsq.id_operator = tp.id_operator 
        AND tsq.id_score_quality = tssq.id_score_quality
        AND tu.username = tp.nik
        AND tu.id_user = '$idUser'";
        $resultTampilScoreQualityDetailNilaiOperator = mysqli_query($con, $tampilScoreQualityDetailNilaiOperator);
        return $resultTampilScoreQualityDetailNilaiOperator;
    }
?>