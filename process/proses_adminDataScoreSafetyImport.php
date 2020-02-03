<?php
  include "../config/connection.php";
  include "../process/excel_reader2.php";

  if (isset($_POST["importDataScoreSafety"])){
    if($_GET["module"]=="dataScoreSafety" && $_GET["act"]=="import"){
        // upload file xls
$target = basename($_FILES['importScoreSafety']['name']) ;
move_uploaded_file($_FILES['importScoreSafety']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['importScoreSafety']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['importScoreSafety']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$nik     = $data->val($i, 1);
	$poin   = $data->val($i, 2);
	$nilai  = $data->val($i, 3);
    $tanggal_training  = $data->val($i, 4);
    
    $query2 = "INSERT INTO tabel_score_safety values
    ('', (select id_operator from tabel_operator where nik='$nik'),
        '$poin',
        '$nilai',
        '$tanggal_training'
        )";
}

 
// hapus kembali file .xls yang di upload tadi
unlink($_FILES['importScoreSafety']['name']);

// alihkan halaman ke index.php
if(mysqli_query($con, $query2)){ 
    header('location:../module/index.php?module=' . $_GET["module"]);
}
else{            
    echo("Error description: " . mysqli_error($con));
}

    }
  }
?>