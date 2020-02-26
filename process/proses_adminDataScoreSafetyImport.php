<?php
  include "../config/connection.php";
  include "../process/excel_reader2.php";

  if (isset($_POST["importDataScoreSafety"])){
    if($_GET["module"]=="dataScoreSafetyImport" && $_GET["act"]=="import"){
      $target = basename($_FILES['importScoreSafety']['name']) ;
      move_uploaded_file($_FILES['importScoreSafety']['tmp_name'], $target);
      chmod($_FILES['importScoreSafety']['name'],0777);

      $data = new Spreadsheet_Excel_Reader($_FILES['importScoreSafety']['name'],false);
      $jumlah_baris = $data->rowcount($sheet_index=0);

      for ($i=2; $i<=$jumlah_baris; $i++){
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

      unlink($_FILES['importScoreSafety']['name']);

      if(mysqli_query($con, $query2)){ 
        header('location:../module/index.php?module=' . $_GET["module"]);
      }
      else{            
        echo("Error description: " . mysqli_error($con));
      }
    }
  }
?>