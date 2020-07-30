<?php
include('bbdd.php');
include ('../yo.php');

if ($lemp!=$pemp){;
$title1=$demp.' '.$cpemp.' '.$lemp.' '.$pemp;
}else{;
$title1=$demp.' '.$cpemp.' '.$pemp;
};
$title2='N.I.F. -'.$nifemp;
$title3=$vemp;
$title4='Telefono/s -'.$telf.' - '.$telm;
$title5='Fax -'.$fax;
$imgemp='../img/'.$img;
$firmaemp='../img/'.$firma;

$sql="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$dato."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$resultado=mysqli_fetch_array($result);
$nombre=$resultado['nombre'];
$apellido1=$resultado['1apellido']; 
$apellido2=$resultado['2apellido'];
$foto=$resultado['foto'];
$fotoa='../img/emp/'.$foto;
$imgemppeq='../img/'.$imgpeq;
$imgcarnet='../img/'.$plantillacarnet;






$today=getdate();
$año=$today['year'];
$mes=$today['mon'];
$d1=date("d");
$ws=strlen($d1);
if ($ws<2){;
$d1='0'.$d1;
};

switch ($mes){;
case '1': $nmes='Enero';$am='01';break;
case '2': $nmes='Febrero';$am='02';break;
case '3': $nmes='Marzo';$am='03';break;
case '4': $nmes='Abril';$am='04';break;
case '5': $nmes='Mayo';$am='05';break;
case '6': $nmes='Junio';$am='06';break;
case '7': $nmes='Julio';$am='07';break;
case '8': $nmes='Agosto';$am='08';break;
case '9': $nmes='Septiembre';$am='09';break;
case '10': $nmes='Octubre';$am='10';break;
case '11': $nmes='Noviembre';$am='11';break;
case '12': $nmes='Diciembre';$am='12';break;
};



define('FPDF_FONTPATH','font/');
require('../fpdf.php');
require_once('../qrcode/qrcode.class.php');


class PDF extends FPDF
{


function Footer()
{

global $title1;
global $title2;
global $title3;
global $title4;
global $title5;


$this->SetTextColor(0);
    $this->SetFont('Arial','B',8);

$title=$title3." ".$title2." ".$title1." ".$title4." ".$title5;
$this->TextWithRotation(10,560,$title,90,0);

/*
if ($this->PageNo()!=1){;
    $this->SetY(-15);
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
};
*/
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




function Document(){
	
global $imgemp;
global $nombre;
global $apellidop;
global $apellidos;
global $user;
global $pass;
global $d1;
global $nmes;
global $año;
global $firmaemp;
global $web;
global $imgemppeq;
global $ide;
global $dato;
global $nomproyectos;

$this->AddPage();
if ($imgemp!='../img/'){;
$this->Image($imgemp,10,8,0,50);
};

$title2=$nombre.' '.$apellidop.' '.$apellidos;
	
	//espacio de letras	
	$el=14;	
		
$texto1="OPERATIVA BASICA SOBRE EL USO DEL SMARTPHONE Y LA APP ".$nomproyectos;
		$this->SetFont('Arial','B',14);
		$this->SetXY(30,70);
		$this->MultiCell(500,$el,$texto1,0,'C');

$texto2="La Empresa, para tener un conocimiento en tiempo real de lo que ocurre durante toda la jornada laboral y mejorar la productividad, tal y como faculta el art. 5 del Estatuto de los Trajadores, ha incorporado a la gestion de su personal una aplicacion llamada ".$nomproyectos.". 
Con la presente, ponemos en comunicacion al empleado D. ".$title2." de las acciones de obligado cumplimiento en su puesto de trabajo que debe tener, respecto al movil que la Empresa le entrega y la aplicacion ".$nomproyectos." insertada en el mismo:";
		$this->SetFont('Arial','B',10);		
		$this->SetXY(30,110);
		$this->MultiCell(500,$el,$texto2,0,'J');

$texto31="1.	El smartphone es propiedad de la Empresa. Se entrega unica y exclusivamente para el ejercicio de las funciones del puesto de trabajo. Cualquier uso personal o inapropiado del mismo sera considerado como negligencia en las funciones del puesto de trabajo por lo que tendra la consideracion de falta grave, tal y como nos faculta el art 58.1 del Estatuto de los Trabajadores.";
$texto32="2.	El smartphones que se entrega lleva incluida una tarifa con acceso a internet. Se prohibe cualquier uso personal en el acceso a internet, incluidas descargas y archivos sin que previamente tengan el visto bueno de la Direccion de esta Empresa. Internet sera usado exclusivamente para el correcto funcionamiento de la aplicacion ".$nomproyectos.". El uso indebido de internet para otros menesteres distintos de los descritos en este parrafo, tendran la consideracion de negligencia en el ejercicio de las funciones del puesto de y trabajo, por lo que sera considerado como falta grave, tal y como nos faculta el art 58.1 del Estatuto de los Trabajadores.";
$texto33="3.	El smartphone debera estar operativo durante toda la jornada laboral por lo que el Empleado debera cerciorarse que siempre este cargada su bateria.";
$texto34="4.	Se le entrega un carnet identificativo que debera usar para entrar en la aplicacion. En su defecto, podra ingresar en la aplicacion con una clave y usuario que tambien se le adjunta en este momento."; 
$texto35="5.	No usar la aplicacion ".$nomproyectos." sera considerado como indisciplina e incomplimiento en el ejercicio de sus funciones en el puesto de trabajo, por lo que sera considerado como falta grave, tal y como nos faculta el art 58.1 del Estatuto de los Trabajadores.";
$texto36="6.	Cualquier anomalia tanto en el smartphone como en la aplicacion que impida su finalidad, debe comunicarlo de inmediato a la Empresa.";

		$this->SetXY(50,200);
		$this->MultiCell(480,$el,$texto31,0,'J');
	   $this->SetX(50);
		$this->MultiCell(480,$el,$texto32,0,'J');
		$this->SetX(50);
		$this->MultiCell(480,$el,$texto33,0,'J');
		$this->SetX(50);
		$this->MultiCell(480,$el,$texto34,0,'J');
		$this->SetX(50);
		$this->MultiCell(480,$el,$texto35,0,'J');
		$this->SetX(50);	
		$this->MultiCell(480,$el,$texto36,0,'J');		

$texto4="Y para que surta los efectos oportunos, firma la presente Comunicacion para dar su conformidad a las operativas basicas sobre el uso del smartphone y la aplicacion ".$nomproyectos.".";
$texto5="En Madrid, a ".$d1." de ".$nmes." de ".$año;

		$this->SetXY(30,500);
		$this->MultiCell(500,$el,$texto4,0,'J');
		$this->SetX(30);	
		$this->MultiCell(500,$el,$texto5,0,'J');


$texto6="Fdo. D. .................................................";
$texto7="DNI/NIE: ...............................................";

		$this->SetXY(80,650);
		$this->MultiCell(420,$el,$texto6,0,'J');
		$this->SetX(80);	
		$this->MultiCell(420,$el,$texto7,0,'J');




}



function Portada()
{

global $imgemp;
global $nombre;
global $apellidop;
global $apellidos;
global $user;
global $pass;
global $d1;
global $nmes;
global $año;
global $firmaemp;
global $web;
global $imgemppeq;
global $ide;
global $dato;

$title2='Estimado Sr/Sra '.$nombre.' '.$apellidop.' '.$apellidos.':';

$title3='Para poder acceder a la app tienes dos opciones:';


$titulo1='Madrid, '.$d1.' de '.$nmes.' de '.$año.' ';
			$this->AddPage();
if ($imgemp!='../img/'){;
$this->Image($imgemp,10,8,0,50);
};

		$this->SetFont('Arial','B',15);
		$this->SetXY(50,80);
		$this->Cell(100,20,'ASUNTO: CLAVES DE ACCESO AL SISTEMA',0,1,'L');

		   
		$this->SetFont('Arial','B',10);
		 $this->SetXY(350,50);
        		$this->Cell(100,$h,$titulo1,0,0,'L');
		$this->SetXY(50,200);
		$this->MultiCell(500,22,strtoupper($title2),0,'J');

		$this->SetX(80);
		$this->MultiCell(500,22,strtoupper($title3),0,'J');

$title3='- Usuario y Password:';

		$this->SetX(80);
		$this->MultiCell(500,22,strtoupper($title3),0,'J');

    $this->SetFont('Arial','B',10);
    $this->SetXY(200,260);
    $this->Cell(100,20,'USUARIO:  '.$user,0,0,'L');
     $this->SetXY(200,280);
    $this->Cell(100,20,'CLAVE:  '.$pass,0,0,'L');



//espacio del carnet

$x=400;
$codserv='1';

$codemp=$ide;
$temp=strlen($codemp);
if ($temp<4){;
for($remp=0;$remp<(4-$temp);$remp++){;
$codemp='0'.$codemp;
};
};


$codcom=$dato;
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
$title2=$apellidop.' '.$apellidos;
$title1=$nombre;

$p0=$x+6;
$p6=$x+8;
$p1=$x+11;
$p7=$x+57;
$p2=$x+80;
$p3=$x+100;
$p5=$x+114;
$p4=$x+143;



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
$pv=200;
$pv0=$x+6;
$pv4=$pv0+240;
$pf=$pv+137;
//$this->Line($pv,$pv0,$pf,$pv0);
//$this->Line($pv,$pv4,$pf,$pv4);
//$this->Line($pv,$pv0,$pv,$pv4);
//$this->Line($pf,$pv0,$pf,$pv4);


//horizontal
//$pdf->Image($imgemp,5,$p1,0,15);

//vertical
//if ($plantillacarnet!=""){;
//$this->Image($imgcarnet,$pv,$p1,0,40);
//};

//$this->Image($imgemp,$pv,$p1,0,50);

/*
if ($foto!=null){;
$pdf->Image($fotoa,60,$p6,0,25);
};
*/
/*
$this->SetFont('Arial','B',8);
$title0=$nombre.' '.$apellidop.' '.$apellidos;
*/
/*
//Horizontal;
$espw=100;
$p2=$x+28;
$p3=$x+35;
$p5=$x+40;
$p4=$x+50;
*/

//vertical
$espw=128;
$p2=$x+43;
$p3=$x+70;
$p5=$x+90;

//$this->SetXY(205,$p3);
//$this->MultiCell($espw,10,strtoupper($title0),0,'J',0);
//$this->SetXY(205,$p5);
//$this->MultiCell($espw,10,strtoupper($title0),1,'J',0);
//$this->SetXY(205,$p5);
//$this->MultiCell($espw,5,strtoupper($title1),0,'J',0);

$title0=$nombre.' '.$apellidop.' '.$apellidos;
//$code2=$ide.';'.$idempl.';'.strtoupper($title0).';e';
$code2=$ide.';'.$dato.';'.strtoupper($title0);

		$mensajeQR =($code2);
	
/*
//horizontal
$pqw=57;
$pqh=20;
$pqt=40;
*/


$title3='- Codigo QR:';

		$this->SetXY(80,320);
		$this->MultiCell(500,22,strtoupper($title3),0,'J');


//verticales
$pqw=190;
$pqh=350;
$pqt=158;
	
		$qr = new QRcode($mensajeQR, 'L'); // error level: L, M, Q, H 
    	$qr->displayFPDF ($this, $pqw, $pqh , $pqt, array(255,255,255), array(0,0,0), $imgemppeq); 


// espacio del carnet final









$this->SetFont('Arial','B',10);
    
    $this->SetXY(50,650);
    $this->Cell(100,20,'Atentamente,',0,0,'L');

if ($firmaemp!='../img/'){;
$this->Image($firmaemp,300,690,0,90);
};

}


}
//$pdf=new PDF();
$pdf=new PDF('P','pt','A4');
//Titulos de las columnas




//Carga de datos
//$data=$pdf->LoadData('inicio.html');
$pdf->SetFont('Arial','',14);
$pdf->AliasNbPages();

if ($dato=='todo'){;
$sql="SELECT * from empleados where idempresa='".$ide."' and estado='1'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
for ($i=0;$i<$row;$i++){;
mysqli_data_seek($result,$i);
$resultado=mysqli_fetch_array($result);
$idempl1=$resultado['idempleado'];
$nombre=$resultado['nombre'];
$apellidop=$resultado['1apellido'];
$apellidos=$resultado['2apellido'];
$nif=$resultado['nif'];
$entrada=$resultado['entrada'];
$incidencia=$resultado['incidencia'];
$alarma=$resultado['alarma'];
$mensajes=$resultado['mensaje'];
$accdiarias=$resultado['accdiarias'];
$accmantenimiento=$resultado['accmantenimiento'];
$niveles=$resultado['niveles'];
$productos=$resultado['productos'];
$revision=$resultado['revision'];
$trabajo=$resultado['trabajo'];
$siniestro=$resultado['siniestro'];
$control=$resultado['control'];
$mediciones=$resultado['mediciones'];


$sql3="SELECT * from usuarios where idempresas='".$ide."' and idempleados='".$idempl1."'"; 
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result2");
$row3=mysqli_num_rows($result3);
$resultado3=mysqli_fetch_array($result3);
if ($row3!=0){;
$user=$resultado3['user'];
$pass=$resultado3['password'];

	
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($pass), METHOD, $key, 0, $iv);
			$pass=$output;



}else{;
$user="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
$pass="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
};


$pdf->Portada();
$pdf->Document();
};



}else{;


$sql="SELECT * from empleados where idempresa='".$ide."' and idempleado='".$dato."'";
$result=mysqli_query ($conn,$sql) or die ("Invalid result");
$row=mysqli_num_rows($result);
$resultado=mysqli_fetch_array($result);
$nif=$resultado['nif'];
$nombre=$resultado['nombre'];
$apellidop=$resultado['1apellido'];
$apellidos=$resultado['2apellido'];
$nif=$resultado['nif'];
$entrada=$resultado['entrada'];
$incidencia=$resultado['incidencia'];
$alarma=$resultado['alarma'];
$mensajes=$resultado['mensaje'];
$accdiarias=$resultado['accdiarias'];
$accmantenimiento=$resultado['accmantenimiento'];
$niveles=$resultado['niveles'];
$productos=$resultado['productos'];
$revision=$resultado['revision'];
$trabajo=$resultado['trabajo'];
$siniestro=$resultado['siniestro'];
$control=$resultado['control'];
$mediciones=$resultado['mediciones'];


$sql3="SELECT * from usuarios where idempresas='".$ide."' and idempleados='".$dato."'"; 
$result3=mysqli_query ($conn,$sql3) or die ("Invalid result2");
$row3=mysqli_num_rows($result);
$resultado3=mysqli_fetch_array($result3);
if ($row3!=0){;
$user=$resultado3['user'];
$pass=$resultado3['password'];

			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($pass), METHOD, $key, 0, $iv);
			$pass=$output;

}else{;
$user="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
$pass="HABLE CON EL DEPARTAMENTO DE INFORMATICA";
};
$pdf->Portada();
$pdf->Document();

};
$pdf->Output();
?>1