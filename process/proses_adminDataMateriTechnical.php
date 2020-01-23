<?php
include "../config/connection.php";

if (isset($_POST["tambahDataMateri"])){
    if($_GET["module"]=="dataMateriTechnical" && $_GET["act"]=="tambah"){
        $nama_folder = "file";
        $tmp = $_FILES["fileMateri"]["tmp_name"];
        $nama_file = $_FILES["fileMateri"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

        $query2 = "INSERT INTO tabel_technical (
            kategori_materi,
            judul_materi,
            keterangan_materi,
            file_materi,
            tanggal_upload
        )
    
        values
        (  '$_POST[kategoriMateri]',
           '$_POST[judulMateri]',
           '$_POST[keteranganMateri]',
           '$nama_file',
           curdate()
        );";
       
        if(mysqli_query($con, $query2)){ 
            header('location:../module/index.php?module=' . $_GET["module"]);
        }
        else{            
           echo("Error description: " . mysqli_error($con));           
        }
    }
}
?>