<?php 
include('bbdd.php');

//$idclientes='7';
$imgemp='../img/'.$img;
//$imgpeq='24-log-peq.png';
$imgemppeq='../img/'.$imgpeq;

$sql="SELECT nombre from clientes where idclientes='".$idclientes."' and idempresas='".$ide."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$nombre=mysql_result($result,0,'nombre');





define('FPDF_FONTPATH','font/');
require('../fpdf.php');
require_once('../qrcode/qrcode.class.php');

//require('rotation.php');

class PDF extends FPDF
{
	
var $angle=0;
/*
function Header(){

}

function TextWithRotation($x,$y,$txt,$txt_angle,$font_angle=0)

{

	$txt=str_replace(')','\\)',str_replace('(','\\(',str_replace('\\','\\\\',$txt)));


	$font_angle+=90+$txt_angle;
	$txt_angle*=M_PI/180;
	$font_angle*=M_PI/180;


	$txt_dx=cos($txt_angle);
	$txt_dy=sin($txt_angle);
	$font_dx=cos($font_angle);
	$font_dy=sin($font_angle);

	$s=sprintf('BT %.2f %.2f %.2f %.2f %.2f %.2f Tm (%s) Tj ET',

			 $txt_dx,$txt_dy,$font_dx,$font_dy,
			 $x*$this->k,($this->h-$y)*$this->k,$txt);

	if ($this->ColorFlag)
		$s='q '.$this->TextColor.' '.$s.' Q';
	$this->_out($s);

}

*/
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

$pdf=new PDF('L', 'mm','etiq');

$pdf->AddPage();
$title1="Pegatinas - Address 99012 - DYMO" ;
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(5,20);
$pdf->MultiCell(55,4,strtoupper($title1),0,'J',0);

$x=0;

$sql="SELECT * from etiquetas where idempresa='".$ide."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$valores=array ('Entrada/Salida','Parametros','Tareas Habituales','Tareas Adicionales','Existencias','Trabajo');
$ipcat=array('1','2','3','4','5','7');
$dato[]=mysql_result($result,0,'entrada');
$dato[]=mysql_result($result,0,'niveles');
$dato[]=mysql_result($result,0,'accdiarias');
$dato[]=mysql_result($result,0,'accmantenimiento');
$dato[]=mysql_result($result,0,'productos');
$dato[]=mysql_result($result,0,'trabajo');
$row=count($valores);

$sql2="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result2=mysql_query ($sql2) or die ("Invalid result");
$dato2[]=mysql_result($result2,0,'entrada');
$dato2[]=mysql_result($result2,0,'niveles');
$dato2[]=mysql_result($result2,0,'accdiarias');
$dato2[]=mysql_result($result2,0,'accmantenimiento');
$dato2[]=mysql_result($result2,0,'productos');



for ($j=0;$j<$row;$j++){;
if (($dato[$j]=='1') and ($dato2[$j]=='1')){;

$pdf->AddPage();
$i=$j+1;
$idpccat=$ipcat[$j];
$title1=$nombre;
$title2=$valores[$j];

$sql3="SELECT * from codservicios where idempresas='".$ide."' and idpccat='".$idpccat."' and idclientes='".$idclientes."' and activo='1'"; 
$result3=mysql_query ($sql3) or die ("Invalid result");
$row3=mysql_affected_rows();

for ($h=0;$h<$row3;$h++){;

$t=$h+1;
$idpcsubcat=mysql_result($result3,$h,'idpcsubcat');

$sql11="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result");
$subcategoria=mysql_result($result11,0,'subcategoria');

$title3=$subcategoria;

$p0=$x+1;
$p1=$x+4;
$p2=$x+7;
$p3=$x+26;
$p4=$x+12;
$p5=$x+22;
$p6=$x+63;
$p7=$x+15;

/*
$pdf->RotatedImage($imgemp,2,$p3,32,10,90);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY(15,$p0);
$pdf->MultiCell(40,5,strtoupper($title1),0,'J',0);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(15,$p7);
$pdf->MultiCell(40,5,strtoupper($title2),0,'J',0);
$pdf->SetXY(15,$p5);
$pdf->MultiCell(40,5,strtoupper($title3),0,'J',0);
*/

$pdf->Image($imgemp,$p0,$p0,32,10);
$pdf->SetFont('Arial','B',10);
$pdf->SetXY($p0,$p4);
$pdf->MultiCell(55,4,strtoupper($title1),0,'J',0);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY($p0,$p5);
$pdf->MultiCell(55,3,strtoupper($title2),0,'J',0);
$pdf->SetXY($p0,$p3);
$pdf->MultiCell(55,3,strtoupper($title3),0,'J',0);

$codigo=$ide.';'.$idclientes.';'.strtoupper($title1).';'.$idpccat.';'.$idpcsubcat.';'.strtoupper($title3);

$mensajeQR =($codigo);
$ini=0;
$pdf->SetXY($p1,$ini);

$pqw=52;
$pqh=-2;	
$pgt=40;	
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($pdf, $pqw, $pqh , $pgt, array(255,255,255), array(0,0,0), $imgemppeq);





if ($t<$row3){;
$pdf->AddPage();
};

};
/*
if ($i<$row-1){;
$pdf->AddPage();
};
*/

};

};

$pdf->Output();
?>

