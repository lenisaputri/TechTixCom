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
?>