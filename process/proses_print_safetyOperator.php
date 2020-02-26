<?php
include('../config/connection.php');
session_start();
require('../phpfpdf/fpdf.php');

//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm

$pdf = new FPDF('P','mm','A4');

$pdf->AddPage();

//Image( file name , x position , y position , width [optional] , height [optional] )
// $pdf->Image('watermark.png',60,30,89);


//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'PT. INDOLAKTO PURWOSARI',0,0);
$pdf->Cell(59 ,5,'ONLINE TRAINING',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(130 ,5,'Jl. Raya Purwosari',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(130 ,5,'Purwosari, Pasuruan, Jawa Timur 67162',0,0);


$query=mysqli_query($con,"SELECT tss.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan,tssd.* 
FROM tabel_score_safety tss, tabel_operator tp , tabel_score_safety_detail tssd, tabel_jabatan tj 
WHERE tss.id_operator = tp.id_operator 
AND tp.id_jabatan = tj.id_jabatan 
AND tss.id_score_safety = tssd.id_score_safety 
AND tssd.id_score_safety_detail = '".$_GET['id_score_safety_detail']."'");
while($row=mysqli_fetch_array($query)){

$pdf->Cell(25 ,5,'Tanggal   :',0,0);
$pdf->Cell(34 ,5,$row['tanggal_training'],0,1);//end of line

$pdf->Cell(130 ,5,'Nomor Telp (0343) 611466',0,0);
$pdf->Cell(25 ,5,'NIK       :',0,0);
$pdf->Cell(34 ,5,$row['nik'],0,1);//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Nama      :',0,0);
$pdf->Cell(34 ,5,$row['nama_lengkap'],0,1);//end of line


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100 ,5,'DETAIL NILAI SAFETY ONLINE TRAINING',0,1);//end of line
$pdf->Cell(100 ,5,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Jabatan Operator',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['nama_jabatan'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['poin'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['nilai'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['smk3'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['ea_hira'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['movement_forklift'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['confined_space'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['loto'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['apd'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['bbs'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['fire_fighting'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['wah'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['environment'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',10);
$pdf->Cell(45 ,5,'Rumah Department',0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90 ,5, $row['p3k'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',10);
$pdf->Cell(182,4,"Di Cetak Pada : ".date("D-d/m/Y"),0,0,'R');
//set font to arial, bold, 14pt

}

$pdf->Output("Laporan-Nilai-Safety-Online-Training.pdf","I");
?>