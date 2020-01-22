<?php
include "../config/connection.php";

function tampilKategoriMateri($con){
    $kategoriMateri ="SELECT * FROM tabel_kategori_materi";
    $resultKategoriMateri = mysqli_query($con, $kategoriMateri);
    return $resultKategoriMateri;
}

if (isset($_POST["tambahDataMateri"])){
    if($_GET["module"]=="dataMateri" && $_GET["act"]=="tambah"){
        $nama_folder = "file";
        $tmp = $_FILES["file1"]["tmp_name"];
        $nama_file = $_FILES["file1"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");

        $query2 = "INSERT INTO tabel_materi (
            id_kategori_materi,
            judul_materi,
            keterangan_materi,
            file_materi,
            tanggal_upload
        )
    
        values
        (  '$_POST[kategoriMateriAdmin]',
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