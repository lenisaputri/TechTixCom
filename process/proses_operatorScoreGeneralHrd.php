<?php
    include "../config/connection.php";

    function tampilProfilOperator($con, $idUser){
        
        $tampilProfilOperator = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_operator a, tabel_jabatan b , 
        tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
        $resultTampilProfilOperator = mysqli_query($con, $tampilProfilOperator);
        return $resultTampilProfilOperator;
    }

    function tampilScoreGeneralHrdOperator($con, $idUser){
        $tampilScoreGeneralHrdOperator = "SELECT tsg.*, tp.id_operator, tp.nik, tu.* FROM tabel_score_generalhrd tsg, 
        tabel_operator tp, tabel_user tu WHERE tsg.id_operator = tp.id_operator AND tu.username = tp.nik AND tu.id_user = '$idUser'";
        $resultTampilScoreGeneralHrdOperator = mysqli_query($con, $tampilScoreGeneralHrdOperator);
        return $resultTampilScoreGeneralHrdOperator;
    }

    function tampilScoreGeneralHrdDetailOperator($con, $idUser){
        $tampilScoreGeneralHrdDetailOperator = "SELECT tsg.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan , tu.*
        FROM tabel_score_generalhrd tsg, tabel_operator tp , tabel_jabatan tj , tabel_user tu 
        WHERE tsg.id_operator = tp.id_operator 
        AND tp.id_jabatan = tj.id_jabatan
        AND tu.username = tp.nik 
        AND tu.id_user = '$idUser'";
        $resultTampilScoreGeneralHrdDetailOperator = mysqli_query($con, $tampilScoreGeneralHrdDetailOperator);
        return $resultTampilScoreGeneralHrdDetailOperator;
    }

    function tampilScoreGeneralHrdDetailNilaiOperator($con, $idUser){
        $tampilScoreGeneralHrdDetailNilaiOperator = "SELECT tsg.*, tp.id_operator, tp.nik, tssg.*, tu.*
        FROM tabel_score_generalhrd tsg, tabel_operator tp , tabel_score_generalhrd_detail tssg , tabel_user tu 
        WHERE tsg.id_operator = tp.id_operator 
        AND tsg.id_score_generalHrd = tssg.id_score_generalHrd
        AND tu.username = tp.nik
        AND tu.id_user = '$idUser'";
        $resultTampilScoreGeneralHrdDetailNilaiOperator = mysqli_query($con, $tampilScoreGeneralHrdDetailNilaiOperator);
        return $resultTampilScoreGeneralHrdDetailNilaiOperator;
    }
?>