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

$pdf->Cell(190 ,7,'PT. INDOLAKTO PURWOSARI',0,0,'C');
$pdf->Cell(59 ,5,'',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

$pdf->Cell(190 ,7,'Jl. Raya Purwosari',0,0,'C');
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(190 ,7,'Purwosari, Pasuruan, Jawa Timur 67162',0,0,'C');
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(190 ,7,'Nomor Telp (0343) 611466',0,0,'C');

//Garis atas untuk header
$pdf->Line(10,33,200,33);
$pdf->Line(10,34,200,34);  
$pdf->Ln(1);

$query=mysqli_query($con,"SELECT tsg.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan,tsgd.* 
FROM tabel_score_generalHrd tsg, tabel_operator tp , tabel_score_generalHrd_detail tsgd, tabel_jabatan tj 
WHERE tsg.id_operator = tp.id_operator 
AND tp.id_jabatan = tj.id_jabatan 
AND tsg.id_score_generalHrd = tsgd.id_score_generalHrd
AND tsgd.id_score_generalHrd_detail = '".$_GET['id_score_generalHrd_detail']."'");
while($row=mysqli_fetch_array($query)){


//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190 ,7,'HASIL NILAI TRAINING GENERAL HRD ONLINE',0,1,'C');//end of line
$pdf->Cell(100 ,5,'',0,1);//end of line

$pdf->SetFont('Arial','', 11);
$pdf->Cell(35 ,5,'NIK                        :',0,0);
$pdf->Cell(90 ,5, $row['nik'],0,0);

$pdf->Cell(25 ,5,'Nilai             :',0,0);
$pdf->Cell(34 ,5,$row['nilai'],0,1);//end of line
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','', 11);
$pdf->Cell(35 ,5,'Nama Lengkap      :',0,0);
$pdf->Cell(90 ,5, $row['nama_lengkap'],0,0);

$pdf->Cell(25 ,5,'Poin             :',0,0);
$pdf->Cell(34 ,5,$row['poin'],0,1);//end of line
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','',11);
$pdf->Cell(35 ,5,'Jabatan Operator  :',0,0);
$pdf->Cell(90 ,5, $row['nama_jabatan'],0,1);
$pdf->Cell(100 ,2,'',0,1);//end of line

$pdf->SetFont('Arial','B',11);
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(38 ,5,'Tanggal Training    :',0,0);
$pdf->Cell(25 ,5,$row['tanggal_training'],0,1);//end of line

$pdf->Ln(5);   


$pdf->SetFont('Arial','B',11);
$pdf->Cell(15,6,'NO',1,0,'C');
$pdf->Cell(125,6,'KATEGORI',1,0, 'C');
$pdf->Cell(50,6,'NILAI PER-KATEGORI',1,1, 'C');

$pdf->SetFont('Arial','',11);
$pdf->Cell(15,6,'1',1,0, 'C');
$pdf->Cell(125,6,'Code Of Conduct',1,0);
$pdf->Cell(50,6,$row['coc'],1,1, 'C');

$pdf->Cell(15,6,'2',1,0, 'C');
$pdf->Cell(125,6,'PKB & Compensation And Benefit',1,0);
$pdf->Cell(50,6,$row['pkb_cab'],1,1, 'C');

$pdf->Cell(15,6,'3',1,0, 'C');
$pdf->Cell(125,6,'Peraturan Perusahaan',1,0);
$pdf->Cell(50,6,$row['perperus'],1,1, 'C');

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line
$pdf->SetFont('Arial','B',9);
$pdf->Cell(182,4,"Di Cetak Pada : ".date("D-d/m/Y"),0,0,'R');
//set font to arial, bold, 14pt

}

$pdf->Output("Laporan-Nilai-GeneralHrd-Online-Training.pdf","I");
?>