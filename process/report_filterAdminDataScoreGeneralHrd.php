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
$pdf->Cell(26.8,0.5,"HASIL NILAI TRAINING GENERAL HRD ONLINE",0,1,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Printed On : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NIK', 1, 0, 'C');
$pdf->Cell(6, 0.8, 'NAMA', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'COC', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'PKB & CAB', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'PP', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'POIN', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NILAI', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'TANGGAL', 1, 1, 'C');
$pdf->SetFont('Arial','',9);
$no=1;

$from=$_POST['from'];
$end=$_POST['end'];
$query=mysqli_query($con,"SELECT tsg.*, tp.id_operator, tp.nik, tp.nama as nama_lengkap, tj.nama as nama_jabatan,tsgd.* 
FROM tabel_score_generalHrd tsg, tabel_operator tp , tabel_score_generalHrd_detail tsgd, tabel_jabatan tj 
WHERE tsg.id_operator = tp.id_operator 
AND tp.id_jabatan = tj.id_jabatan 
AND tsg.id_score_generalHrd = tsgd.id_score_generalHrd
AND (tsg.tanggal_training BETWEEN '$from' AND '$end')");
while($lihat=mysqli_fetch_array($query)){

	$pdf->Cell(1, 0.8, $no, 1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['nik'], 1, 0,'C');
	$pdf->Cell(6, 0.8, $lihat['nama_lengkap'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['coc'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['pkb_cab'],1, 0, 'C');
	$pdf->Cell(3, 0.8, $lihat['perperus'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['poin'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['nilai'], 1, 0,'C');
	$pdf->Cell(3, 0.8, $lihat['tanggal_training'], 1, 1,'C');
	$no++;
}
$pdf->Cell(40.5,0.7,"",0,1,'L');
$pdf->SetFont('Arial','B',9);
$pdf->Cell(40.5,0.7,"KETERANGAN : ",0,1,'L');
$pdf->SetFont('Arial','',8.5);
$pdf->Cell(40.5,0.7,"1. COC = CODE OF CONDUCT",0,1,'L');
$pdf->Cell(40.5,0.7,"2. PKB & CAB = PKB & COMPENSATION AND BENEFIT",0,1,'L');
$pdf->Cell(40.5,0.7,"3. PP = PERATURAN PERUSAHAAN",0,1,'L');
$pdf->Cell(40.5,0.7,"4. POIN = TOTAL POIN",0,1,'L');
$pdf->Cell(40.5,0.7,"5. NILAI = TOTAL NILAI",0,1,'L');

$pdf->Output("Laporan-Full-Nilai-GeneralHrd-Online-Training.pdf","I");

?>