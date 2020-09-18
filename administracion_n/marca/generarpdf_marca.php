<?php 
require_once('fpdf/fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Hello World!');
$pdf->Image('marca5.jpg',80,22,35,38,'PNG','http://www.desarrolloweb.com');
$pdf->Output();

 ?>