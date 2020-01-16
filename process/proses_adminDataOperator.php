<?php
include "../config/connection.php";

function linkYAYAYA($Foto){

    $ling = "";

    if($Foto == null){
        $ling = "../attachment/img/avatar.jpeg";
    }

    else if($Foto != null){
        $link = "../attachment/img/";

        $ling = ($link . $Foto);
        
    }

    return $ling;    
    
}

function tampilJabatan($con){
    $jabatan="SELECT * FROM tabel_jabatan";
    $resultJabatan = mysqli_query($con, $jabatan);
    return $resultJabatan;
}

if (isset($_POST["tambahDataOperator"])){

    if($_GET["module"]=="dataOperator" && $_GET["act"]=="tambah"){

         $nama_folder = "img";
         $tmp = $_FILES["fileid2"]["tmp_name"];
         $nama_file = $_FILES["fileid2"]["name"];
         move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

     $query1 = "INSERT INTO tabel_user (username, password, level) values (
         '$_POST[usernameOperatorAdmin]',
         '$_POST[passwordOperatorAdmin]',
         'operator'
     ); ";

     $query2 = "INSERT INTO tabel_operator (
         id_user,
         id_jabatan,
         nama,
         nik,
         foto,
         status_aktif,
         waktu_tambah
    )

     values
    (  (select id_user from tabel_user where username='$_POST[usernameOperatorAdmin]'),
        '$_POST[jabatanOperatorAdmin]',
        '$_POST[namaOperatorAdmin]',
        '$_POST[nikOperatorAdmin]',
        '$nama_file',
        '$_POST[statusOperatorAdmin]',
        curdate()
    );";
    
        if(mysqli_query($con, $query1) AND mysqli_query($con, $query2)){ 
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
        else{            
            echo("Error description: " . mysqli_error($con));
        }
    } 
}

?>