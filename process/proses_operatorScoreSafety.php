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
?>