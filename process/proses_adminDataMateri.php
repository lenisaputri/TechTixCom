<?php

function tampilKategoriMateri($con){
    $kategoriMateri ="SELECT * FROM tabel_kategori_materi";
    $resultKategoriMateri = mysqli_query($con, $kategoriMateri);
    return $resultKategoriMateri;
}

if (isset($_POST["tambahDataMateri"])){
    if($_GET["module"]=="dataMateri" && $_GET["act"]=="tambah"){
        $nama_folder = "file";
        $tmp = $_FILES["file"]["tmp_name"];
        $nama_file = $_FILES["file"]["name"];
        move_uploaded_file($tmp, "../attachment/$nama_folder/$nama_file");
    }

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
?>