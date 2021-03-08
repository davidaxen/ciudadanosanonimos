<?php
require_once('../fpdf.php');
require_once('../fpdi/fpdi.php');

// initiate FPDI
$pdf = new FPDI();

// add a page
//$pdf->AddPage();
//
$file = $_REQUEST['file'];
$total = "pdfs/".$file;
// set the source file
//$pdf->setSourceFile("prueba.pdf");
$pageCount = $pdf->setSourceFile($total);
//echo $pageCount;

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    // import a page
    $templateId = $pdf->importPage($pageNo);
    // get the size of the imported page
    $size = $pdf->getTemplateSize($templateId);

    // create a page (landscape or portrait depending on the imported page size)
    if ($size['w'] > $size['h']) {
        $pdf->AddPage('L', array($size['w'], $size['h']));
    } else {
        $pdf->AddPage('P', array($size['w'], $size['h']));
    }
	 $pdf->Image('../administracion_n/marca/marca6.jpeg',0,0, 210,300);
    // use the imported page
    $pdf->useTemplate($templateId);
/*
    $pdf->SetFont('Helvetica');
    $pdf->SetXY(5, 5);
    $pdf->Write(8, 'A complete document imported with FPDI');
 */
    
}

// import page 1
//$tplIdx = $pdf->importPage(1);
// use the imported page and place it at point 10,10 with a width of 100 mm
//$pdf->useTemplate($tplIdx, 10, 10, 200);

// now write some text above the imported page
/*
$pdf->SetFont('Times');
$pdf->SetTextColor(255, 0, 0);
$pdf->SetXY(30, 30);
$pdf->Write(0, 'This is just a simple text');
*/


$pdf->Output();

?>
