<?php
include('bbdd.php');


$imgemp='../img/'.$img;
$sql="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempl."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$nombre=mysqli_result($result,0,'nombre');
$apellido1=mysqli_result($result,0,'1apellido'); 
$apellido2=mysqli_result($result,0,'2apellido');
$foto=mysqli_result($result,0,'foto');
$fotoa='../img/emp/'.$foto;
$imgemppeq='../img/'.$imgpeq;
$imgcarnet='../img/'.$plantillacarnet;


define('FPDF_FONTPATH','font/');
require('../fpdf.php');
//require_once('../qrcode/qrcode.class.php');
include('../php-barcode.php');
  
class PDF extends FPDF
{

    function TextWithRotation($x, $y, $txt, $txt_angle, $font_angle=0)
    {
        $font_angle+=90+$txt_angle;
        $txt_angle*=M_PI/180;
        $font_angle*=M_PI/180;
    
        $txt_dx=cos($txt_angle);
        $txt_dy=sin($txt_angle);
        $font_dx=cos($font_angle);
        $font_dy=sin($font_angle);
    
        $s=sprintf('BT %.2F %.2F %.2F %.2F %.2F %.2F Tm (%s) Tj ET',$txt_dx,$txt_dy,$font_dx,$font_dy,$x*$this->k,($this->h-$y)*$this->k,$this->_escape($txt));
        if ($this->ColorFlag)
            $s='q '.$this->TextColor.' '.$s.' Q';
        $this->_out($s);
    }


}

$pdf=new PDF();
//$pdf->Open();
$pdf->AddPage();
$x=0;
$codserv='1';

$codemp=$ide;
$temp=strlen($codemp);
if ($temp<4){;
for($remp=0;$remp<(4-$temp);$remp++){;
$codemp='0'.$codemp;
};
};


$codcom=$idempl;
$tcom=strlen($codcom);
if ($tcom<4){;
for($rcom=0;$rcom<(4-$tcom);$rcom++){;
$codcom='0'.$codcom;
};
};

$codpuntcont=$idafiliaciones;
$tpunt=strlen($codpuntcont);
if ($tpunt<3){;
for($rpunt=0;$rpunt<(3-$tpunt);$rpunt++){;
$codpuntcont='0'.$codpuntcont;
};
};


$codigo=$codserv.$codemp.$codcom.$codpuntcont;
$title2=$apellido1.' '.$apellido2;
$title1=$nombreaf;

$p0=$x+2;
$p6=$x+3;
$p1=$x+4;
$p7=$x+20;
$p2=$x+28;
$p3=$x+35;
$p5=$x+40;
$p4=$x+50;



/*
//horizontal
$pv=3;
$pv0=$x+2;
$pv4=$pv0+50;
$pf=$pv+84;
$pdf->Line($pv,$pv0,$pf,$pv0);
$pdf->Line($pv,$pv4,$pf,$pv4);
$pdf->Line($pv,$pv0,$pv,$pv4);
$pdf->Line($pf,$pv0,$pf,$pv4);
*/


//vertical
$pv=3;
$pv0=$x+2;
$pv4=$pv0+84;
$pf=$pv+48;
$pdf->Line($pv,$pv0,$pf,$pv0);
$pdf->Line($pv,$pv4,$pf,$pv4);
$pdf->Line($pv,$pv0,$pv,$pv4);
$pdf->Line($pf,$pv0,$pf,$pv4);


//horizontal
//$pdf->Image($imgemp,5,$p1,0,15);

//vertical
if ($plantillacarnet!=""){;
$pdf->Image($imgcarnet,$pv,$p1,0,80);
};
$pdf->Image($imgemp,$pv,$p1,0,10);

/*
if ($foto!=null){;
$pdf->Image($fotoa,60,$p6,0,25);
};
*/
$pdf->SetFont('Arial','B',10);
$title0=$apellido1.' '.$apellido2;

/*
//Horizontal;
$espw=100;
$p2=$x+28;
$p3=$x+35;
$p5=$x+40;
$p4=$x+50;
*/

//vertical
$espw=40;
$p2=$x+15;
$p3=$x+25;
$p5=$x+35;

$pdf->SetXY(5,$p2);
$pdf->MultiCell($espw,5,strtoupper($nombre),0,'J',0);
$pdf->SetXY(5,$p3);
$pdf->MultiCell($espw,5,strtoupper($title0),0,'J',0);
$pdf->SetXY(5,$p5);
$pdf->MultiCell($espw,5,strtoupper($title1),0,'J',0);

$title0=$nombre.' '.$apellido1.' '.$apellido2;
//$code2=$ide.';'.$idempl.';'.strtoupper($title0).';e';
$code2=$ide.';'.$idempl.';'.strtoupper($title0);

		$mensajeQR =($code2);
	
/*
//horizontal
$pqw=57;
$pqh=20;
$pqt=40;
*/
//verticales
$pqw=4;
$pqh=41;
$pqt=45;
	
		//$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	//$qr->displayFPDF ($pdf, $pqw, $pqh , $pqt, array(255,255,255), array(0,0,0), $imgemppeq); 


  // -------------------------------------------------- //
  //                  PROPERTIES
  // -------------------------------------------------- //
  
  $fontSize = 5;
  $marge    = 5;   // between barcode and hri in pixel
  $x        = 27;  // barcode center
  $y        = 60;  // barcode center
  $height   = 10;   // barcode height in 1D ; module size in 2D
  $width    = 1.5;    // barcode height in 1D ; not use in 2D
  $angle    = 90;   // rotation in degrees
  
  $code     = $mensajeQR; // barcode, of course ;)
  $type     = 'datamatrix';
  $black    = '000000'; // color in hexa
  
  
  // -------------------------------------------------- //
  //            ALLOCATE FPDF RESSOURCE
  // -------------------------------------------------- //
    
//  $pdf = new eFPDF('P', 'pt');
//  $pdf->AddPage();
  
  // -------------------------------------------------- //
  //                      BARCODE
  // -------------------------------------------------- //
  
  $data = Barcode::fpdf($pdf, $black, $x, $y, $angle, $type, array('code'=>$code), $width, $height);
  
  // -------------------------------------------------- //
  //                      HRI
  // -------------------------------------------------- //
  
  $pdf->SetFont('Arial','B',$fontSize);
  $pdf->SetTextColor(0, 0, 0);
  $len = $pdf->GetStringWidth($data['hri']);
  Barcode::rotate(-$len / 2, ($data['height'] / 2) + $fontSize + $marge, $angle, $xt, $yt);
 // $pdf->TextWithRotation($x + $xt, $y + $yt, $data['hri'], $angle);
  
 



	
$pdf->Output();
?>

