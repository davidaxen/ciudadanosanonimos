<?php 
require_once('dompdf/autoload.inc.php');
use Dompdf\Dompdf; 

$pdf = new Dompdf();
$pdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>');
$pdf->setPaper('A4', 'landscape'); 
$pdf->render();
$pdf->stream();

//$pdf->Image('marca4.png',80,22,35,38,'PNG','http://www.desarrolloweb.com');
//$pdf->Output();

 ?>