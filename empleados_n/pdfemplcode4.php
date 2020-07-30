<?php
include('bbdd.php');


$imgemp='../img/'.$img;

$sql="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$idempl."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido']; 
$apellido2=$resultado['2apellido'];
$foto=$resultado['foto'];
$fotoa="../img/emp/".$foto;


define('FPDF_FONTPATH','font/');
require('../fpdf.php');
require_once('../qrcode/qrcode.class.php');
//require('rotation.php');

class PDF extends FPDF
//class PDF extends PDF_Rotate

{
	var $angle=0;

function Rotate($angle,$x=-1,$y=-1)
{
    if($x==-1)
        $x=$this->x;
    if($y==-1)
        $y=$this->y;
    if($this->angle!=0)
        $this->_out('Q');
    $this->angle=$angle;
    if($angle!=0)
    {
        $angle*=M_PI/180;
        $c=cos($angle);
        $s=sin($angle);
        $cx=$x*$this->k;
        $cy=($this->h-$y)*$this->k;
        $this->_out(sprintf('q %.5F %.5F %.5F %.5F %.2F %.2F cm 1 0 0 1 %.2F %.2F cm',$c,$s,-$s,$c,$cx,$cy,-$cx,-$cy));
    }
}

function _endpage()
{
    if($this->angle!=0)
    {
        $this->angle=0;
        $this->_out('Q');
    }
    parent::_endpage();
}
	
function EAN13($x,$y,$barcode,$h=16,$w=.35)
{
	$this->Barcode($x,$y,$barcode,$h,$w,13);
}

function UPC_A($x,$y,$barcode,$h=16,$w=.35)
{
	$this->Barcode($x,$y,$barcode,$h,$w,12);
}

function GetCheckDigit($barcode)
{
	//Compute the check digit
	$sum=0;
	for($i=1;$i<=11;$i+=2)
		$sum+=3*$barcode{$i};
	for($i=0;$i<=10;$i+=2)
		$sum+=$barcode{$i};
	$r=$sum%10;
	if($r>0)
		$r=10-$r;
	return $r;
}

function TestCheckDigit($barcode)
{
	//Test validity of check digit
	$sum=0;
	for($i=1;$i<=11;$i+=2)
		$sum+=3*$barcode{$i};
	for($i=0;$i<=10;$i+=2)
		$sum+=$barcode{$i};
	return ($sum+$barcode{12})%10==0;
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
    //Image rotated around its upper-left corner
    $this->Rotate($angle,$x,$y);
    $this->Image($file,$x,$y,$w,$h);
    $this->Rotate(0);
}


function Barcode($x,$y,$barcode,$h,$w,$len)
{
	//Padding
	$barcode=str_pad($barcode,$len-1,'0',STR_PAD_LEFT);
	if($len==12)
		$barcode='0'.$barcode;
	//Add or control the check digit
	if(strlen($barcode)==12)
		$barcode.=$this->GetCheckDigit($barcode);
	elseif(!$this->TestCheckDigit($barcode))
		$this->Error('Incorrect check digit');
	//Convert digits to bars
	$codes=array(
		'A'=>array(
			'0'=>'0001101','1'=>'0011001','2'=>'0010011','3'=>'0111101','4'=>'0100011',
			'5'=>'0110001','6'=>'0101111','7'=>'0111011','8'=>'0110111','9'=>'0001011'),
		'B'=>array(
			'0'=>'0100111','1'=>'0110011','2'=>'0011011','3'=>'0100001','4'=>'0011101',
			'5'=>'0111001','6'=>'0000101','7'=>'0010001','8'=>'0001001','9'=>'0010111'),
		'C'=>array(
			'0'=>'1110010','1'=>'1100110','2'=>'1101100','3'=>'1000010','4'=>'1011100',
			'5'=>'1001110','6'=>'1010000','7'=>'1000100','8'=>'1001000','9'=>'1110100')
		);
	$parities=array(
		'0'=>array('A','A','A','A','A','A'),
		'1'=>array('A','A','B','A','B','B'),
		'2'=>array('A','A','B','B','A','B'),
		'3'=>array('A','A','B','B','B','A'),
		'4'=>array('A','B','A','A','B','B'),
		'5'=>array('A','B','B','A','A','B'),
		'6'=>array('A','B','B','B','A','A'),
		'7'=>array('A','B','A','B','A','B'),
		'8'=>array('A','B','A','B','B','A'),
		'9'=>array('A','B','B','A','B','A')
		);
	$code='101';
	$p=$parities[$barcode{0}];
	for($i=1;$i<=6;$i++)
		$code.=$codes[$p[$i-1]][$barcode{$i}];
	$code.='01010';
	for($i=7;$i<=12;$i++)
		$code.=$codes['C'][$barcode{$i}];
	$code.='101';
	//Draw bars
	for($i=0;$i<strlen($code);$i++)
	{
		if($code{$i}=='1')
			$this->Rect($x+$i*$w,$y,$w,$h,'F');
	}
	//Print text uder barcode
	$this->SetFont('Arial','',12);
	//$this->Text($x,$y+$h+11/$this->k,substr($barcode,-$len));
}
}

$pdf=new PDF('L', 'mm','etiqc');
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
$title2=$nombre.' '.$apellido1.' '.$apellido2;
$title1=$nombreaf;
$p0=$x+2;
$p1=$x+3;
$p2=$x+7;
$p3=$x+34;
$p4=$x+18;
$p5=$x+22;
$p6=$x+63;
$p7=$x+15;
/*
$pdf->Image($imgemp,1,$p0,0,9);
if ($foto!=null){;
$pdf->Image($fotoa,65,6,0,25);
};
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(1,15);
$pdf->MultiCell(34,3,strtoupper($title2),0,'L',0);

$pdf->MultiCell(45,3,strtoupper($nombre),1,'L',0);
$pdf->SetX(20);
$pdf->MultiCell(45,3,strtoupper($apellido1),0,'L',0);
$pdf->SetX(20);
$pdf->MultiCell(45,3,strtoupper($apellido2),0,'L',0);

$pdf->SetFont('Arial','B',7);
$pdf->SetXY(1,40);
$pdf->MultiCell(34,5,strtoupper($title1),0,'J',0);
*/

//$pdf->EAN13(15,$p5,$codigo,10,0.5);

//$codigo=$ide.';'.$idempl.';'.$title2.';e';
$codigo=$ide.';'.$idempl.';'.$title2;
$mensajeQR =($codigo);
$ini=0;
$pdf->SetXY($p1,$ini);
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
		
$pqw=-2;
$pqh=-2;	
$pgt=29;	
		
    	$qr->displayFPDF ($pdf, $pqw, $pqh, $pgt, array(255,255,255) , array(0,0,0) ,$imgpeq );
    	

$pdf->Output();
?>