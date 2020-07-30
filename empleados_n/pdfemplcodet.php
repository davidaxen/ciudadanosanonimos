<?php
include('bbdd.php');

$imgemp='../img/'.$img;

$sql="SELECT * from empleados where idempresa='".$ide."' and estado='1'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);





$sql2="SELECT * from puntcont where idclientes='".$idclientes."' and idempresas='".$ide."' order by idpuntcont asc"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result");


define('FPDF_FONTPATH','font/');
require('../fpdf.php');

class PDF extends FPDF
{
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

$pdf=new PDF();
$pdf->Open();
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

for ($j=0;$j<$row;$j++){;
$i=$j+2;
mysqli_data_seek($result,$j);
$resultado=mysqli_fetch_array($result);
//izquierda
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido']; 
$apellido2=$resultado['2apellido'];
$idempl=$resultado['idempleado'];
$foto=$resultado['foto'];
$fotoa="img/emp/".$foto;

$sql1="SELECT * from altass where idempresa='".$ide."' and idempleado='".$idempl."' order by añoalta desc"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$idafiliaciones=$resultado1['idafiliaciones'];

$sql2="SELECT * from afiliacion where idempresa='".$ide."' and id='".$idafiliaciones."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result2");
$resultado2=mysqli_fetch_array($result2);
$nombreaf=$resultado2['nombre'];




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
$p1=$x+4;
$p2=$x+28;
$p3=$x+35;
$p4=$x+50;
$p5=$x+21;
$pdf->Line(3,$p0,87,$p0);
$pdf->Line(3,$p4,87,$p4);
$pdf->Line(3,$p0,3,$p4);
$pdf->Line(87,$p0,87,$p4);
$pdf->Image($imgemp,5,$p1,0,15);
if ($foto!=null){;
$pdf->Image($fotoa,65,$p5,0,25);
};
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(50,$p1);
$pdf->MultiCell(45,5,strtoupper($nombre),0,'L',0);
$pdf->SetX(50);
$pdf->MultiCell(45,5,strtoupper($apellido1),0,'L',0);
$pdf->SetX(50);
$pdf->MultiCell(45,5,strtoupper($apellido2),0,'L',0);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(5,$p2);
$pdf->MultiCell(100,5,strtoupper($title1),0,'J',0);
$pdf->EAN13(6,$p3,$codigo,10,0.6);
//derecha
$j=$j+1;
if ($j<$row){;
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido']; 
$apellido2=$resultado['2apellido'];
$idempl=$resultado['idempleado'];
$foto=$resultado['foto'];
$fotoa="img/emp/".$foto;

$sql1="SELECT * from altass where idempresa='".$ide."' and idempleado='".$idempl."' order by añoalta desc"; 
$result1=mysqli_query ($conn,$sql1) or die ("Invalid result1");
$resultado1=mysqli_fetch_array($result1);
$idafiliaciones=$resultado1['idafiliaciones'];

$sql2="SELECT * from afiliacion where idempresa='".$ide."' and id='".$idafiliaciones."'"; 
$result2=mysqli_query ($conn,$sql2) or die ("Invalid result2");
$resultado2=mysqli_fetch_array($result2);
$nombreaf=$resultado2['nombre'];




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
$p1=$x+4;
$p2=$x+28;
$p3=$x+35;
$p4=$x+50;
$p5=$x+21;
$pdf->Line(103,$p0,187,$p0);
$pdf->Line(103,$p4,187,$p4);
$pdf->Line(103,$p0,103,$p4);
$pdf->Line(187,$p0,187,$p4);
$pdf->Image($imgemp,105,$p1,0,15);
if ($foto!=null){;
$pdf->Image($fotoa,165,$p5,0,25);
};
$pdf->SetFont('Arial','B',9);
$pdf->SetXY(150,$p1);
$pdf->MultiCell(45,5,strtoupper($nombre),0,'L',0);
$pdf->SetX(150);
$pdf->MultiCell(45,5,strtoupper($apellido1),0,'L',0);
$pdf->SetX(150);
$pdf->MultiCell(45,5,strtoupper($apellido2),0,'L',0);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(105,$p2);
$pdf->MultiCell(100,5,strtoupper($title1),0,'J',0);
$pdf->EAN13(106,$p3,$codigo,10,0.6);



};
//fin
if ($j<$row){;
$x=$x+55;
$k=10;
$h=fmod($i, $k);
if ($h==0){;
$pdf->AddPage();
$x=0;
};
};
};
$pdf->Output();
?>
