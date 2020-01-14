<?php
include "../config/connection.php";

function tampilJabatan($con)
{
    $tampilJabatan="select * from tabel_jabatan";
    $resultTampilJabatan=mysqli_query($con, $tampilJabatan);
    return $resultTampilJabatan;
}

if(isset($_POST["tambahJabatan"])){

    if($_GET["module"]=="jabatan" && $_GET["act"]=="tambah"){
    //   $nama = $_POST['nama']; 
      $JabatanQuery= "INSERT INTO tabel_jabatan (nama) VALUES ('$_POST[nama]')";
      mysqli_query($con, $JabatanQuery);
      header('location:../module/index.php?module=' . $_GET["module"]);
    }
    
    // else if($_GET["module"]=="beasiswa" && $_GET["act"]=="hapus"){
    //   $BeasiswaQuery="DELETE FROM tabel_info_beasiswa WHERE id_beasiswa='$_POST[idBeasiswa]'";
    //   mysqli_query($con, $BeasiswaQuery);
    //   header('location:../module/index.php?module=' . $_GET["module"]);
    // }
}

?>