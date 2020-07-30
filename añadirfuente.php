<?php
define('FPDF_FONTPATH','font/');
require('fpdf.php');

$pdf=new FPDF();
$pdf->AddFont('Futura','','futuramc.php');
$pdf->AddPage();
$pdf->SetFont('Futura','',35);
$pdf->Cell(0,10,'Enjoy new fonts with FPDF!');
$pdf->Output();
?> 








