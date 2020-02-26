<?php
    include "../config/connection.php";

    function tampilProfilOperator($con, $idUser){
        
        $tampilProfilOperator = "SELECT a.*, b.nama AS nama_jabatan, c.* FROM tabel_operator a, tabel_jabatan b , 
        tabel_user c WHERE a.id_jabatan = b.id_jabatan AND c.username = a.nik AND c.id_user = '$idUser'";
        $resultTampilProfilOperator = mysqli_query($con, $tampilProfilOperator);
        return $resultTampilProfilOperator;
    }

    function tampilKategoriTechnical($con, $idUser){
        
        $tampilKategoriTechnical = "SELECT tst.*, tst.kategori_technical,tp.id_operator, tp.nik, tu.* FROM tabel_score_technical tst, 
        tabel_operator tp, tabel_user tu WHERE tst.id_operator = tp.id_operator AND tu.username = tp.nik AND tu.id_user = '$idUser'";
        $resultTampilKategoriTechnical = mysqli_query($con, $tampilKategoriTechnical);
        return $resultTampilKategoriTechnical;
    }

    function tampilScoreTechnicalOperator($con, $idUser){
        $tampilScoreTechnicalOperator = "SELECT tst.*, tp.id_operator, tp.nik, tu.* FROM tabel_score_technical tst, 
        tabel_operator tp, tabel_user tu WHERE tst.id_operator = tp.id_operator AND tu.username = tp.nik AND tu.id_user = '$idUser'";
        $resultTampilScoreTechnicalOperator = mysqli_query($con, $tampilScoreTechnicalOperator);
        return $resultTampilScoreTechnicalOperator;
    }
?>