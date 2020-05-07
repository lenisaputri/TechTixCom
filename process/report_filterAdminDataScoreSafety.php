<?php
session_start();
error_reporting(0);
include('../config/connection.php');
require('../phpfpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');// change according timezone

$currentTime = date( 'd-m-Y h:i:s A', time () );


$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(0.5,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','B',14);

$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PT. INDOLAKTO PURWOSARI',0,'C');
$pdf->SetFont('Arial','',12);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Jl. Raya Purwosari',0,'C');   
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Purwosari, Pasuruan, Jawa Timur 67162',0,'C');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Nomor Telp (0343) 611466',0,'C');
$pdf->SetX(4);
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(26.8,0.5,"HASIL NILAI TRAINING SAFETY ONLINE",0,1,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'NIK', 1, 0, 'C');
$pdf->Cell(4.2, 0.8, 'NAMA', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'SMK3', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'E-H', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'MF', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'CS', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'L', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'APD', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'BBS', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'FF', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'WAH', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'E', 1, 0, 'C');
$pdf->Cell(1.5, 0.8, 'P3K', 1, 0, 'C');
$pdf->Cell(1.6, 0.8, 'POIN', 1, 0, 'C');
$pdf->Cell(1.6, 0.8, 'NILAI', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'TANGGAL', 1, 1, 'C');
$pdf->SetFont('Arial','',9);
$no=1;

$from=$_POST['from'];
$end=$_POST['end'];
$query=mysqli_query($con,"SELECT tss.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan,tssd.* 
FROM tabel_score_safety tss, tabel_operator tp , tabel_score_safety_detail tssd, tabel_jabatan tj 
WHERE tss.id_operator = tp.id_operator 
AND tp.id_jabatan = tj.id_jabatan 
AND tss.id_score_safety = tssd.id_score_safety 
AND (tss.tanggal_training BETWEEN '$from' AND '$end')");
while($lihat=mysqli_fetch_array($query)){

	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(2, 0.8, $lihat['nik'], 1, 0,'C');
	$pdf->Cell(4.2, 0.8, $lihat['nama_lengkap'], 1, 0,'C');
	$pdf->Cell(1.5, 0.8, $lihat['smk3'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['ea_hira'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['movement_forklift'], 1, 0,'C');
	$pdf->Cell(1.5, 0.8, $lihat['confined_space'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['loto'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['apd'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['bbs'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['fire_fighting'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['wah'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['environment'],1, 0, 'C');
	$pdf->Cell(1.5, 0.8, $lihat['p3k'],1, 0, 'C');
	$pdf->Cell(1.6, 0.8, $lihat['poin'], 1, 0,'C');
	$pdf->Cell(1.6, 0.8, $lihat['nilai'], 1, 0,'C');
	$pdf->Cell(2, 0.8, $lihat['tanggal_training'], 1, 1,'C');
	$no++;
}
$pdf->Cell(40.5,0.7,"",0,1,'L');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"KETERANGAN : ",0,1,'L');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(40.5,0.7,"1. SMK3 = SMK3",0,1,'L');
$pdf->Cell(40.5,0.7,"2. E-H = EA-HIRA",0,1,'L');
$pdf->Cell(40.5,0.7,"3. MF = MOVEMENT FORKLIFT",0,1,'L');
$pdf->Cell(40.5,0.7,"4. CS = CONFINED SPACE",0,1,'L');
$pdf->Cell(40.5,0.7,"5. L = LOTO",0,1,'L');
$pdf->Cell(40.5,0.7,"6. APD = APD",0,1,'L');
$pdf->Cell(40.5,0.7,"7. BBS = BBS",0,1,'L');
$pdf->Cell(40.5,0.7,"8. FF = FIRE FIGHTING",0,1,'L');
$pdf->Cell(40.5,0.7,"9. WAH = WAH",0,1,'L');
$pdf->Cell(40.5,0.7,"10. E = ENVIRONMENT",0,1,'L');
$pdf->Cell(40.5,0.7,"11. P3K = P3K",0,1,'L');
$pdf->Cell(40.5,0.7,"12. HALAL = HALAL",0,1,'L');
$pdf->Cell(40.5,0.7,"13. POIN = TOTAL POIN",0,1,'L');
$pdf->Cell(40.5,0.7,"14. NILAI = TOTAL NILAI",0,1,'L');

$pdf->Output("Laporan-Full-Nilai-Safety-Online-Training.pdf","I");

?>