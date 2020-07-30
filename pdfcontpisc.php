<?php 
include('bbdd.php');


if ($lemp!=$pemp){;
$title1=$demp.' '.$cpemp.' '.$lemp.' '.$pemp;
}else{;
$title1=$demp.' '.$cpemp.' '.$pemp;
};

$title2='N.I.F. -'.$nifemp;
$title3=$vemp;
$title4='Telefono/s -'.$telf.' - '.$telm;
$title44=$telf.' - '.$telm;
$title5='Fax -'.$fax;
$imgemp='../img/'.$img;
$firmaemp='../img/'.$firma;
//$imgpeq='24-log-peq.png';
$imgemppeq='../img/'.$imgpeq;
$plantillaemp='../img/'.$plantilla;
$imghoja1='../img/'.$imghoja1;
$imghoja2='../img/'.$imghoja2;

$sql="SELECT nombre from clientes where idclientes='".$idclientes."' and idempresas='".$ide."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$nombre=mysql_result($result,0,'nombre');



define('FPDF_FONTPATH','font/');

require('../fpdf.php');
require_once('../qrcode/qrcode.class.php');


class PDF extends FPDF

{



function Header0()

{

global $imgemp;
global $nombre;
global $codserv;
global $codemp;
global $codcom;
global $imghoja2;


if ($imghoja2=="../img/"){;
$this->Image($imgemp,10,8,0,50);
}else{;
$this->Image($imghoja2,0,0,595,830);
};

		$this->SetFont('Arial','B',15);
		$this->SetXY(250,10);
		//$this->Cell(100,20,strtoupper($nombre),0,0,'J');
		$this->MultiCell(320,20,strtoupper($nombre),0,'C',0);
}

function Header1()

{

global $imgemp;
global $plantillaemp;
global $imghoja1;

//$this->Image($imgemp,10,8,0,100);
if ($imghoja1=="../img/"){;
$this->Image($imgemp,10,8,0,50);
}else{;
$this->Image($imghoja1,0,0,595,830);
};
//$this->Image($plantillaemp,0,0,595,830);

}

function Footer0()

{

global $title1;
global $title2;
global $title3;
global $title4;
global $title5;

$this->SetTextColor(0);
    $this->SetFont('Arial','B',8);


$title=$title3." ".$title2." ".$title1." ".$title4." ".$title5;
$this->TextWithRotation(10,660,$title,90,0);

}

function Footer1()

{


global $title44;
global $frase;

    $this->SetTextColor(0);
    $this->SetFont('Arial','B',8);

$dat="Gracias por comunicarnos las sugerencia o incidencias que estimen convenientes. Se gestionaran a la mayor brevedad.";
$title="BUZON DE SUGERENCIAS  ".$title44;
$this->SetXY(50,700);
    $this->SetFont('Arial','B',12);
$this->MultiCell(520,15,$frase,'LTR','C',0);
$this->SetX(50);
   $this->SetFont('Arial','B',8);
$this->MultiCell(520,15,$dat,'LR','C',0);
$this->SetX(50);
    $this->SetFont('Arial','B',14);
$this->MultiCell(520,15,$title,'LBR','C',0);
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

	$this->Text($x,$y+$h+11/$this->k,substr($barcode,-$len));

}




function Listado($idpccat,$titulo)
{
	
global $idclientes;
global $ide;
global $codserv;
global $codemp;
global $codcom;
global $nombre;
global $imgemppeq;
$ty=80;

/*
$sql="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$categoria=mysql_result($result,0,'nombre');
$codcat=$idpccat;
$tcer793=strlen($idpccat);
if ($idpccat==2){;
$ty=220;
};
*/

$this->SetFont('Arial','B',14);
$this->SetXY(50,$ty);
$this->Cell(520,20,strtoupper($titulo),1,1,'C');


//$sql1="SELECT * from pcsubcat where idpccat='".$idpccat."' and idempresas='".$ide."'"; 
$sql1="SELECT * from codservicios where idpccat='".$idpccat."' and idclientes='".$idclientes."' and idempresas='".$ide."' and activo='1'"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$row1=mysql_affected_rows();

for ($t=0;$t<$row1;$t++){;

$hto=fmod($t,12);
if (($hto==0) and ($t>0)){;
$this->AddPage();
$this->Header0();
$this->Footer0();
$this->SetFont('Arial','B',14);
$this->SetXY(50,$ty);
$this->Cell(520,20,strtoupper($titulo),1,1,'C');
};


if($t<$row1){;
$idpcsubcat=mysql_result($result1,$t,'idpcsubcat');

$sql11="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result");
$subcategoria=strtoupper(mysql_result($result11,0,'subcategoria'));
$rellr=mysql_result($result11,0,'rellr');
$rellg=mysql_result($result11,0,'rellg');
$rellb=mysql_result($result11,0,'rellb');$codcat=$idpccat;
$codsubcat=$idpcsubcat;    

$this->SetFont('Arial','B',10);

$codigo=$codemp.';'.$codcom.';'.strtoupper($nombre).';'.$codcat.';'.$codsubcat.';'.strtoupper($subcategoria);
$mensajeQR =($codigo);

$p1=50;
$p2=$ini=$this->GetY();
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($this, $p1, $p2 , 100, array(255,255,255), array(0,0,0), $imgemppeq);
$this->SetDrawColor(0,0,0); 
$this->SetFillColor($rellr,$rellg,$rellb);
$this->SetXY($p1+100,$p2+40);
$this->MultiCell(110,15,strtoupper($subcategoria),1,'C',1);
$this->SetFillColor(0,0,0);
};


$t=$t+1;
if($t<$row1){;
$idpcsubcat=mysql_result($result1,$t,'idpcsubcat');
$sql11="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result");
$subcategoria=strtoupper(mysql_result($result11,0,'subcategoria'));
$rellr=mysql_result($result11,0,'rellr');
$rellg=mysql_result($result11,0,'rellg');
$rellb=mysql_result($result11,0,'rellb');
$codsubcat=$idpcsubcat;    
$this->SetFont('Arial','B',10);
$codigo=$codemp.';'.$codcom.';'.strtoupper($nombre).';'.$codcat.';'.$codsubcat.';'.strtoupper($subcategoria);
$mensajeQR =($codigo);
$p1=300;
$this->SetXY($p1,$ini);
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($this, $p1, $p2 , 100, array(255,255,255), array(0,0,0), $imgemppeq);
    	$this->SetDrawColor(0,0,0); 
$this->SetFillColor($rellr,$rellg,$rellb);
$this->SetXY($p1+100,$p2+40);
$this->MultiCell(110,15,strtoupper($subcategoria),1,'C',1);
$this->SetFillColor(0,0,0);


};
/*
$t=$t+1;
if($t<$row1){;
$idpcsubcat=mysql_result($result1,$t,'idpcsubcat');
$sql11="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result");
$subcategoria=mysql_result($result11,0,'subcategoria');
$rellr=mysql_result($result11,0,'rellr');
$rellg=mysql_result($result11,0,'rellg');
$rellb=mysql_result($result11,0,'rellb');
$codsubcat=$idpcsubcat;    
$this->SetFont('Arial','B',10);
$codigo=$codemp.';'.$codcom.';'.$nombre.';'.$codcat.';'.$codsubcat.';'.$subcategoria;
$mensajeQR =($codigo);
$p1=390;
$this->SetXY($p1,$ini);
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($this, $p1, $p2 , 70, array(255,255,255), array(0,0,0), $imgemppeq);
    	$this->SetDrawColor(0,0,0); 
$this->SetFillColor($rellr,$rellg,$rellb);
$this->SetXY($p1+70,$p2);
$this->MultiCell(110,15,$subcategoria,1,'C',1);
$this->SetFillColor(0,0,0);


};
*/
$this->Ln(50);




};



}






function Listadop($idpccat,$titulo)
{
	
global $idclientes;
global $ide;
global $codserv;
global $codemp;
global $codcom;
global $nombre;
global $imgemppeq;
global $frase;
$ty=140;


/*
$sql="SELECT * from categorias where idpccat='".$idpccat."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$categoria=mysql_result($result,0,'nombre');
$codcat=$idpccat;
$tcer793=strlen($idpccat);
if ($idpccat==2){;
$ty=220;
};
*/
$titulo1="Instrucciones de uso";
$titulo2="PASO 1: FICHAR ENTRADA";
$titulo3="PASO 2: FICHAR LAS TAREAS REALIZADAS";
$titulo4="PASO 3: FICHAR SALIDA";

$this->SetFont('Arial','B',14);
$this->SetXY(50,$ty);
$this->Cell(520,20,strtoupper($titulo1),0,1,'J');
$this->SetX(50);
$this->Cell(520,20,strtoupper($titulo2),0,1,'J');
$this->SetX(50);
$this->Cell(520,20,strtoupper($titulo3),0,1,'J');
$this->SetX(50);
$this->Cell(520,20,strtoupper($titulo4),0,1,'J');
$this->Ln(30);
		$this->SetFont('Arial','B',30);
		$this->SetX(50);
		//$this->Cell(550,100,strtoupper($nombre),1,1,'C');
		$this->MultiCell(520,50,strtoupper($nombre),1,'C',0);

//$sql1="SELECT * from pcsubcat where idpccat='".$idpccat."' and idempresas='".$ide."'"; 
$sql1="SELECT * from codservicios where idpccat='".$idpccat."' and idclientes='".$idclientes."' and idempresas='".$ide."' and activo='1'"; 
$result1=mysql_query ($sql1) or die ("Invalid result");
$row1=mysql_affected_rows();


//entrada
$idpcsubcat=mysql_result($result1,$t,'idpcsubcat');
$sql11="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result");
$subcategoria=strtoupper(mysql_result($result11,0,'subcategoria'));
$rellr=mysql_result($result11,0,'rellr');
$rellg=mysql_result($result11,0,'rellg');
$rellb=mysql_result($result11,0,'rellb');$codcat=$idpccat;
$codsubcat=$idpcsubcat;    

$this->SetFont('Arial','B',10);

$codigo=$codemp.';'.$codcom.';'.strtoupper($nombre).';'.$codcat.';'.$codsubcat.';'.strtoupper($subcategoria);
$mensajeQR =($codigo);

$p1=200;
$p2=$ini=$this->GetY()+40;
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($this, $p1, $p2 , 100, array(255,255,255), array(0,0,0), $imgemppeq);
$this->SetDrawColor(0,0,0); 
$this->SetFillColor($rellr,$rellg,$rellb);
$this->SetXY($p1+100,$p2+40);
$this->MultiCell(110,15,strtoupper($subcategoria),1,'C',1);
$this->SetFillColor(0,0,0);



//salida
$t=$t+1;
$idpcsubcat=mysql_result($result1,$t,'idpcsubcat');
$sql11="SELECT * from puntservicios where idpccat='".$idpccat."' and idpcsubcat='".$idpcsubcat."' and idempresas='".$ide."'"; 
$result11=mysql_query ($sql11) or die ("Invalid result");
$subcategoria=strtoupper(mysql_result($result11,0,'subcategoria'));
$rellr=mysql_result($result11,0,'rellr');
$rellg=mysql_result($result11,0,'rellg');
$rellb=mysql_result($result11,0,'rellb');
$codsubcat=$idpcsubcat;    
$this->SetFont('Arial','B',10);
$codigo=$codemp.';'.$codcom.';'.strtoupper($nombre).';'.$codcat.';'.$codsubcat.';'.strtoupper($subcategoria);
$mensajeQR =($codigo);
$p1=200;
$p2=$ini=$this->GetY()+140;
$this->SetXY($p1,$p2);
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($this, $p1, $p2 , 100, array(255,255,255), array(0,0,0), $imgemppeq);
    	$this->SetDrawColor(0,0,0); 
$this->SetFillColor($rellr,$rellg,$rellb);
$this->SetXY($p1+100,$p2+40);
$this->MultiCell(110,15,strtoupper($subcategoria),1,'C',1);
$this->SetFillColor(0,0,0);


$this->Ln(70);








}





}



$pdf=new PDF('P','pt','A4');

$x=0;
$codserv='3';

$codemp=$ide;


$codcom=$idclientes;



$sql="SELECT * from hoja where idempresa='".$ide."'"; 
$result=mysql_query ($sql) or die ("Invalid result");
$valores=array ('Entrada/Salida','Parametros','Tareas Habituales','Tareas Adicionales','Existencias');
$ipcat=array('1','2','3','4','5');
$dato[]=mysql_result($result,0,'entrada');
$dato[]=mysql_result($result,0,'niveles');
$dato[]=mysql_result($result,0,'accdiarias');
$dato[]=mysql_result($result,0,'accmantenimiento');
$dato[]=mysql_result($result,0,'productos');

$sql2="SELECT * from clientes where idempresas='".$ide."' and idclientes='".$idclientes."'"; 
$result2=mysql_query ($sql2) or die ("Invalid result clientes");
$dato2[]=mysql_result($result2,0,'entrada');
$dato2[]=mysql_result($result2,0,'niveles');
$dato2[]=mysql_result($result2,0,'accdiarias');
$dato2[]=mysql_result($result2,0,'accmantenimiento');
$dato2[]=mysql_result($result2,0,'productos');

//$dato[]=mysql_result($result,0,'trabajo');
$row=count($valores);
for ($lis=0;$lis<$row;$lis++){;
if ($dato[$lis]=='1' and $dato2[$lis]=='1'){;


if ($ipcat[$lis]=='1'){;
$pdf->AddPage();
$pdf->Header1();
$pdf->Footer1();
$pdf->Listadop($ipcat[$lis],$valores[$lis]);
}else{;
$pdf->AddPage();
$pdf->Header0();
$pdf->Footer0();
$pdf->Listado($ipcat[$lis],$valores[$lis]);
};

};
};





$pdf->Output();

?>

